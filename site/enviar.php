<?php
/**
 * Lead handler. POST from every lead form (lib/components.php lead_form()).
 *
 * 1. Spam: honeypot field "website" filled, or submitted < 2.5 s after the
 *    page loaded (field "t", set by JS) → pretend success, store nothing.
 * 2. Validate: phone (≥ 6 digits) is the only required field.
 * 3. Always append to logs/leads-YYYY-MM.jsonl (the fallback that never fails).
 * 4. E-mail LEAD_EMAIL when configured.
 * 5. POST to VenderCRM when VENDERCRM_URL + VENDERCRM_API_KEY are set —
 *    server-side only, idempotency key, 10 s timeout, never blocks the visitor.
 * 6. 303 to /tack/?s=<service>.
 */

declare(strict_types=1);

require __DIR__ . '/lib/app.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: /boka/', true, 303);
    exit;
}

$field = static function (string $key, int $max = 500): string {
    $v = $_POST[$key] ?? '';
    $v = is_string($v) ? trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/u', '', $v) ?? '') : '';

    return mb_substr($v, 0, $max);
};

$service = $field('service', 60);
$thanks  = '/tack/' . (service($service) ? '?s=' . rawurlencode($service) : '');

/* 1. spam */
$t = (int) $field('t', 20);
if ($field('website') !== '' || ($t > 0 && (int) (microtime(true) * 1000) - $t < 2500)) {
    header('Location: ' . $thanks, true, 303);
    exit;
}

/* 2. validate */
$phone  = $field('phone', 30);
$digits = preg_replace('/\D+/', '', $phone) ?? '';
if (strlen($digits) < 6) {
    http_response_code(422);
    page_start(['title' => 'Telefonnummer saknas – Asplund Eltjänst', 'description' => 'Ange ett telefonnummer så att vi kan nå dig.', 'path' => '/boka/', 'noindex' => true]);
    echo '<section class="thanks"><div class="wrap wrap-narrow"><h1>Vi behöver ditt telefonnummer</h1>'
       . '<p class="thanks-lead">Ange ett telefonnummer så att vi kan ringa upp dig om jobbet.</p>'
       . '<p><a class="btn btn-primary" href="javascript:history.back()">Gå tillbaka till formuläret</a></p></div></section>';
    page_end();
    exit;
}

/* Swedish numbers → E.164 for the CRM (0701234567 → +46701234567). */
$e164 = $phone;
if (str_starts_with($digits, '0') && strlen($digits) >= 8) {
    $e164 = '+46' . substr($digits, 1);
} elseif (str_starts_with($digits, '46')) {
    $e164 = '+' . $digits;
}

$svc  = service($service);
$lead = [
    'time'     => date('c'),
    'name'     => $field('name', 120),
    'phone'    => $phone,
    'phoneE164' => $e164,
    'service'  => $svc['nav'] ?? ($service === 'annat' ? 'Annat / vet inte' : ''),
    'slug'     => $svc ? $service : null,
    'place'    => $field('place', 120),
    'message'  => $field('message', 3000),
    'page'     => $field('page', 300),
    'referrer' => $field('referrer', 500),
    'utm'      => array_filter([
        'utm_source'   => $field('utm_source', 200),
        'utm_medium'   => $field('utm_medium', 200),
        'utm_campaign' => $field('utm_campaign', 200),
        'utm_term'     => $field('utm_term', 200),
        'utm_content'  => $field('utm_content', 200),
        'gclid'        => $field('gclid', 200),
        'fbclid'       => $field('fbclid', 200),
    ]),
    'ip_hash'  => substr(hash('sha256', ($_SERVER['REMOTE_ADDR'] ?? '') . date('Y-m')), 0, 16),
];

/* 3. log (always) */
$logDir = __DIR__ . '/logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0775, true);
}
$crmStatus = 'skipped';

/* 5. VenderCRM */
$crmUrl = cfg('VENDERCRM_URL');
$crmKey = cfg('VENDERCRM_API_KEY');
if ($crmUrl && $crmKey && function_exists('curl_init')) {
    // vc_attr cookie (first touch) wins over the form's own last-touch fields.
    $attr = [];
    if (!empty($_COOKIE['vc_attr'])) {
        $decoded = json_decode((string) $_COOKIE['vc_attr'], true);
        $attr    = is_array($decoded) ? $decoded : [];
    }
    $payload = array_filter([
        'phone'           => $e164,
        'idempotency_key' => hash('sha256', $digits . '|' . date('Y-m-d-H')),
        'name'            => $lead['name'] ?: null,
        'message'         => trim(($lead['service'] ? 'Tjänst: ' . $lead['service'] . "\n" : '') . ($lead['place'] ? 'Ort: ' . $lead['place'] . "\n" : '') . $lead['message']) ?: null,
        'source'          => 'site:asplundeltjanst.se',
        'page_url'        => $lead['page'] ? abs_url($lead['page']) : null,
        'referrer'        => $lead['referrer'] ?: null,
        'fields'          => array_filter(['tjanst' => $lead['service'], 'ort' => $lead['place']]) ?: null,
    ] + array_map(static fn ($v) => is_string($v) ? mb_substr($v, 0, 200) : null, array_intersect_key($attr, array_flip(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid']))) + $lead['utm'], static fn ($v) => $v !== null && $v !== '');

    $ch = curl_init(rtrim($crmUrl, '/') . '/api/v1/leads');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_UNICODE),
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'X-Api-Key: ' . $crmKey],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
    ]);
    $body = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $crmStatus = in_array($code, [200, 201], true) ? 'ok' : 'error ' . $code . ': ' . mb_substr((string) $body, 0, 300);
}

/* 4. e-mail */
$mailStatus = 'skipped';
$to = cfg('LEAD_EMAIL');
if ($to) {
    $subject = 'Ny förfrågan: ' . ($lead['service'] ?: 'Elarbete') . ($lead['place'] ? ' – ' . $lead['place'] : '');
    $text    = "Ny förfrågan från asplundeltjanst.se\n\n"
             . 'Namn: ' . ($lead['name'] ?: '–') . "\n"
             . 'Telefon: ' . $lead['phone'] . "\n"
             . 'Tjänst: ' . ($lead['service'] ?: '–') . "\n"
             . 'Ort: ' . ($lead['place'] ?: '–') . "\n\n"
             . ($lead['message'] ?: '(inget meddelande)') . "\n\n"
             . 'Sida: ' . $lead['page'] . "\n"
             . ($lead['utm'] ? 'Kampanj: ' . http_build_query($lead['utm']) . "\n" : '');
    $headers = 'From: ' . cfg('LEAD_EMAIL_FROM', 'webb@asplundeltjanst.se') . "\r\n"
             . "Content-Type: text/plain; charset=UTF-8\r\n";
    $mailStatus = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $text, $headers) ? 'ok' : 'error';
}

@file_put_contents(
    $logDir . '/leads-' . date('Y-m') . '.jsonl',
    json_encode($lead + ['crm' => $crmStatus, 'mail' => $mailStatus], JSON_UNESCAPED_UNICODE) . "\n",
    FILE_APPEND | LOCK_EX
);

/* 6. thank-you */
header('Location: ' . $thanks, true, 303);
