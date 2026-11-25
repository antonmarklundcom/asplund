<?php
/**
 * Spam protection for the lead form (enviar.php) and the feedback form (feedback.php).
 *
 * Layers, cheapest first. A human never sees any of them unless noted:
 *  1. honeypot        field "website" filled
 *  2. origin          Origin header from another host
 *  3. token           hidden field "ft" = signed render time. Missing/forged, or
 *                     submitted < MIN_FILL_SECONDS after the page was rendered.
 *                     Works without JavaScript.
 *  4. content         links in name/place/contact, 2+ links or HTML/BBCode in the
 *                     message, text mostly in a non-Latin alphabet
 *  5. Turnstile       only when TURNSTILE_SITE_KEY + TURNSTILE_SECRET are set.
 *                     Fails open if Cloudflare cannot be reached.          (visible: 422 page)
 *  6. rate limit      RATE_HOUR / RATE_DAY accepted posts per IP          (visible: 429 page)
 *  7. duplicate       same content from the same IP within 10 minutes → thanks, sent once
 *
 * Caught posts are never deleted: they go to logs/spam-YYYY-MM.jsonl with the
 * reason, so a false positive can be recovered. Nothing is e-mailed for them.
 *
 * State lives in logs/ (denied by logs/.htaccess, ignored by Git):
 *  logs/.form-secret   HMAC key, created on first use (or FORM_SECRET in config.php)
 *  logs/rate/*.json    per-IP timestamps, pruned after 24 h
 */

declare(strict_types=1);

const SPAM_MIN_FILL_SECONDS = 3;
const SPAM_TOKEN_MAX_AGE    = 7 * 86400;
const SPAM_RATE_HOUR        = 5;
const SPAM_RATE_DAY         = 15;
const SPAM_DUPLICATE_WINDOW = 600;

function spam_secret(): string
{
    static $secret = null;
    if ($secret !== null) {
        return $secret;
    }
    $configured = cfg('FORM_SECRET');
    if ($configured) {
        return $secret = $configured;
    }
    $file = ROOT . '/logs/.form-secret';
    $read = is_file($file) ? trim((string) @file_get_contents($file)) : '';
    if (strlen($read) >= 32) {
        return $secret = $read;
    }
    if (!is_dir(dirname($file))) {
        @mkdir(dirname($file), 0775, true);
    }
    $new = bin2hex(random_bytes(32));
    // "x" fails when another request created the file first: then use that one.
    $fh = @fopen($file, 'x');
    if ($fh) {
        fwrite($fh, $new);
        fclose($fh);
        @chmod($file, 0600);

        return $secret = $new;
    }
    $read = trim((string) @file_get_contents($file));

    // Unwritable logs/: fall back to a per-install constant so forms still work.
    return $secret = strlen($read) >= 32 ? $read : hash('sha256', ROOT . '|' . php_uname('n'));
}

/** Signed render time for the hidden "ft" field. */
function form_token(?int $time = null): string
{
    $ts = base_convert((string) ($time ?? time()), 10, 36);

    return $ts . '.' . substr(hash_hmac('sha256', $ts, spam_secret()), 0, 32);
}

/** Seconds since the token was issued, or null when it is missing or forged. */
function form_token_age(string $token): ?int
{
    if (!preg_match('/^([0-9a-z]{1,10})\.([0-9a-f]{32})$/', $token, $m)) {
        return null;
    }
    if (!hash_equals(substr(hash_hmac('sha256', $m[1], spam_secret()), 0, 32), $m[2])) {
        return null;
    }

    return time() - (int) base_convert($m[1], 36, 10);
}

/** Hidden inputs every protected form needs: token, honeypot and (optional) Turnstile. */
function form_guard_fields(): string
{
    $out = '<input type="hidden" name="ft" value="' . e(form_token()) . '">'
         . '<div class="hp" aria-hidden="true"><label>Lämna tomt <input name="website" tabindex="-1" autocomplete="off"></label></div>';

    return $out;
}

/** Turnstile widget, placed just above the submit button. Empty unless configured. */
function form_turnstile(): string
{
    $key = cfg('TURNSTILE_SITE_KEY');
    if (!$key || !cfg('TURNSTILE_SECRET')) {
        return '';
    }
    $GLOBALS['__turnstile'] = true;

    return '<div class="cf-turnstile" data-sitekey="' . e($key) . '" data-language="sv" data-size="flexible"></div>';
}

/** Script tag for the page footer; printed once, only on pages that rendered a widget. */
function turnstile_script(): string
{
    return empty($GLOBALS['__turnstile'])
        ? ''
        : '<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>';
}

function spam_ip_key(): string
{
    return substr(hash_hmac('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? ''), spam_secret()), 0, 24);
}

function spam_link_count(string $text): int
{
    return (int) preg_match_all('~(https?://|www\.)\S+|\b[a-z0-9-]+\.(ru|cn|xyz|top|click|link|online|site|shop|store|icu|buzz)\b~iu', $text);
}

/** Share of letters that are not Latin (Cyrillic, CJK, Arabic …). */
function spam_foreign_ratio(string $text): float
{
    $letters = (int) preg_match_all('/\p{L}/u', $text);
    if ($letters < 12) {
        return 0.0;
    }

    return (int) preg_match_all('/[^\p{Latin}\P{L}]/u', $text) / $letters;
}

/** true = verified or not configured or Cloudflare unreachable; false = explicit failure. */
function spam_turnstile_ok(string $response): bool
{
    $secret = cfg('TURNSTILE_SECRET');
    if (!$secret || !cfg('TURNSTILE_SITE_KEY')) {
        return true;
    }
    if ($response === '') {
        return false;
    }
    if (!function_exists('curl_init')) {
        return true;
    }
    $ch = curl_init(cfg('TURNSTILE_VERIFY_URL', 'https://challenges.cloudflare.com/turnstile/v0/siteverify'));
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query(['secret' => $secret, 'response' => $response, 'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '']),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 6,
        CURLOPT_CONNECTTIMEOUT => 4,
    ]);
    $body = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $json = is_string($body) ? json_decode($body, true) : null;
    if ($code !== 200 || !is_array($json) || !array_key_exists('success', $json)) {
        return true; // fail open: never lose a customer because Cloudflare is down
    }

    return $json['success'] === true;
}

/**
 * Per-IP counter. $fingerprint identifies the content of this post.
 * Returns 'ok' (and records the post), 'rate' or 'duplicate'.
 */
function spam_rate(string $fingerprint): string
{
    $dir = ROOT . '/logs/rate';
    if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
        return 'ok'; // no writable state: do not block real customers
    }
    $fh = @fopen($dir . '/' . spam_ip_key() . '.json', 'c+');
    if (!$fh) {
        return 'ok';
    }
    flock($fh, LOCK_EX);
    $now  = time();
    $rows = json_decode((string) stream_get_contents($fh), true);
    $rows = array_values(array_filter(is_array($rows) ? $rows : [], static fn ($r) => is_array($r) && ($r[0] ?? 0) > $now - 86400));

    $result = 'ok';
    $hour   = 0;
    foreach ($rows as [$at, $fp]) {
        if ($fp === $fingerprint && $at > $now - SPAM_DUPLICATE_WINDOW) {
            $result = 'duplicate';
        }
        if ($at > $now - 3600) {
            $hour++;
        }
    }
    if ($result === 'ok' && ($hour >= SPAM_RATE_HOUR || count($rows) >= SPAM_RATE_DAY)) {
        $result = 'rate';
    }
    if ($result === 'ok') {
        $rows[] = [$now, $fingerprint];
    }
    ftruncate($fh, 0);
    rewind($fh);
    fwrite($fh, json_encode($rows));
    flock($fh, LOCK_UN);
    fclose($fh);

    if (random_int(1, 50) === 1) { // housekeeping: drop counters untouched for two days
        foreach (glob($dir . '/*.json') ?: [] as $old) {
            if (@filemtime($old) < $now - 2 * 86400) {
                @unlink($old);
            }
        }
        // The privacy policy promises caught spam is kept at most 12 months.
        $cutoff = date('Y-m', strtotime('-12 months'));
        foreach (glob(ROOT . '/logs/spam-*.jsonl') ?: [] as $old) {
            if (preg_match('/spam-(\d{4}-\d{2})\.jsonl$/', $old, $m) && $m[1] < $cutoff) {
                @unlink($old);
            }
        }
    }

    return $result;
}

/**
 * Decide what to do with a POST.
 *
 * @param array{message:string, short:array<string,string>} $input  message = free text; short = one-line fields (name, place, contact)
 * @return array{verdict:string, reason:string}  verdict: ok | spam | duplicate | rate | challenge
 *   ok         handle normally
 *   spam       pretend success, log to spam file, send nothing
 *   duplicate  already handled a moment ago: show thanks, send nothing
 *   rate       show the 429 page
 *   challenge  Turnstile failed: show the 422 "try again" page
 */
function spam_check(array $input): array
{
    $post = static fn (string $k): string => is_string($_POST[$k] ?? null) ? trim($_POST[$k]) : '';

    if ($post('website') !== '') {
        return ['verdict' => 'spam', 'reason' => 'honeypot'];
    }

    $origin = (string) ($_SERVER['HTTP_ORIGIN'] ?? '');
    $host   = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
    if ($origin !== '' && $origin !== 'null' && $host !== '') {
        $oHost = strtolower((string) parse_url($origin, PHP_URL_HOST));
        $oPort = parse_url($origin, PHP_URL_PORT);
        if ($oHost . ($oPort ? ':' . $oPort : '') !== $host && $oHost !== preg_replace('/:\d+$/', '', $host)) {
            return ['verdict' => 'spam', 'reason' => 'origin ' . mb_substr($origin, 0, 80)];
        }
    }

    $age = form_token_age($post('ft'));
    if ($age === null) {
        return ['verdict' => 'spam', 'reason' => 'token missing or invalid'];
    }
    if ($age < SPAM_MIN_FILL_SECONDS) {
        return ['verdict' => 'spam', 'reason' => 'too fast (' . $age . ' s)'];
    }
    if ($age > SPAM_TOKEN_MAX_AGE) {
        return ['verdict' => 'spam', 'reason' => 'token older than 7 days'];
    }

    foreach ($input['short'] as $name => $value) {
        if (spam_link_count($value) > 0 || preg_match('/[<>\[\]]/', $value)) {
            return ['verdict' => 'spam', 'reason' => 'link or markup in ' . $name];
        }
    }
    $message = $input['message'];
    if (preg_match('~<\s*a\s|</\s*a\s*>|\[/?(url|link)\b~i', $message)) {
        return ['verdict' => 'spam', 'reason' => 'markup in message'];
    }
    if (spam_link_count($message) >= 2) {
        return ['verdict' => 'spam', 'reason' => '2+ links in message'];
    }
    if (spam_foreign_ratio($message . ' ' . implode(' ', $input['short'])) > 0.3) {
        return ['verdict' => 'spam', 'reason' => 'non-Latin text'];
    }

    if (!spam_turnstile_ok($post('cf-turnstile-response'))) {
        return ['verdict' => 'challenge', 'reason' => 'turnstile failed'];
    }

    $rate = spam_rate(hash('sha256', $message . '|' . implode('|', $input['short'])));
    if ($rate === 'rate') {
        return ['verdict' => 'rate', 'reason' => 'rate limit'];
    }
    if ($rate === 'duplicate') {
        return ['verdict' => 'duplicate', 'reason' => 'duplicate within 10 min'];
    }

    return ['verdict' => 'ok', 'reason' => ''];
}

/** Keep what was caught, with the reason. Never e-mailed, never sent to the CRM. */
function spam_log(string $form, string $reason, array $fields): void
{
    $dir = ROOT . '/logs';
    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }
    $fields = array_map(static fn ($v) => is_string($v) ? mb_substr($v, 0, 1000) : $v, $fields);
    @file_put_contents(
        $dir . '/spam-' . date('Y-m') . '.jsonl',
        json_encode(['time' => date('c'), 'form' => $form, 'reason' => $reason] + $fields + ['ua' => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 200)], JSON_UNESCAPED_UNICODE) . "\n",
        FILE_APPEND | LOCK_EX
    );
}

/** Small page for the two cases a human can meet: rate limit (429) and failed Turnstile (422). */
function spam_page(int $status, string $backPath): void
{
    http_response_code($status);
    $rate = $status === 429;
    page_start([
        'title'       => ($rate ? 'För många försök' : 'Kontrollen misslyckades') . ' – Asplund Eltjänst',
        'description' => 'Formuläret kunde inte skickas just nu. Ring oss så hjälper vi dig direkt.',
        'path'        => $backPath,
        'noindex'     => true,
    ]);
    echo '<section class="thanks"><div class="wrap wrap-narrow"><h1>' . ($rate ? 'Det kom många förfrågningar på kort tid' : 'Vi kunde inte bekräfta att du är en människa') . '</h1>'
       . '<p class="thanks-lead">' . ($rate
            ? 'Formuläret tar en paus för säkerhets skull. Ring eller SMS:a oss på ' . e(site('phone')) . ' så hjälper vi dig direkt.'
            : 'Gå tillbaka, vänta tills rutan ovanför knappen är klar och skicka igen. Du kan också ringa oss på ' . e(site('phone')) . '.') . '</p>'
       . '<p><a class="btn btn-primary" href="' . e(tel_href()) . '">Ring ' . e(site('phone')) . '</a> '
       . '<a class="btn btn-light" href="javascript:history.back()">Tillbaka till formuläret</a></p></div></section>';
    page_end();
}
