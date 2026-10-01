<?php
/**
 * Build gate. Run via ./verify.sh (lints, boots php -S, then calls this).
 *   php tools/verify.php http://127.0.0.1:8099
 *
 * Checks: every route 200 · title unique, ≤ 60 chars · description unique,
 * 110–165 chars · exactly one <h1> · canonical present · no PHP warnings in
 * output · every internal link answers 200 (or 301 to a 200) · every redirect
 * in content/redirects.php answers 301 to its target · unknown URL → 404 ·
 * robots.txt blocks when indexing is off · sitemap lists every indexable route ·
 * lead form: honeypot and real submit both 303 to /tack/ · content shape.
 */

declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$base = rtrim($argv[1] ?? 'http://127.0.0.1:8099', '/');
$fail = 0;
$ok   = 0;
$bad  = static function (string $msg) use (&$fail): void { $fail++; echo "  FAIL  {$msg}\n"; };
$good = static function () use (&$ok): void { $ok++; };

function fetch(string $url, array $post = null): array
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => false, CURLOPT_HEADER => true, CURLOPT_TIMEOUT => 20]);
    if ($post !== null) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    }
    $raw  = (string) curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $hs   = (int) curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    curl_close($ch);
    $headers = substr($raw, 0, $hs);
    $loc = preg_match('/^Location:\s*(\S+)/mi', $headers, $m) ? $m[1] : null;

    return ['code' => $code, 'body' => substr($raw, $hs), 'location' => $loc, 'headers' => $headers];
}

/* ---- content shape ---- */
echo "== content\n";
$need = ['path', 'nav', 'group', 'icon', 'title', 'description', 'keyword', 'h1', 'lead', 'card', 'image', 'includes', 'sections', 'faq', 'related'];
foreach (services() as $slug => $s) {
    foreach ($need as $k) {
        if (!array_key_exists($k, $s)) { $bad("service {$slug}: missing '{$k}'"); }
    }
    foreach ($s['related'] ?? [] as $r) {
        if (!service($r)) { $bad("service {$slug}: related '{$r}' does not exist"); }
    }
    if (!isset(service_groups()[$s['group'] ?? ''])) { $bad("service {$slug}: unknown group"); }
    if (!is_file(ROOT . $s['path'] . 'index.php')) { $bad("service {$slug}: no route file (run php tools/make-routes.php)"); }
}
foreach (areas() as $k => $a) {
    foreach ($a['services'] as $r) { if (!service($r)) { $bad("area {$k}: service '{$r}' does not exist"); } }
    if (!is_file(ROOT . $a['path'] . 'index.php')) { $bad("area {$k}: no route file"); }
}
foreach (guides() as $k => $g) {
    if (!service($g['service'])) { $bad("guide {$k}: service '{$g['service']}' does not exist"); }
    if (!is_file(ROOT . $g['path'] . 'index.php')) { $bad("guide {$k}: no route file"); }
}
echo "  ok    content arrays checked\n";

/* ---- routes ---- */
echo "== routes\n";
$titles = $descs = [];
$links  = [];
foreach (all_routes() as $path => $r) {
    $res = fetch($base . $path);
    if ($res['code'] !== 200) { $bad("{$path} → {$res['code']}"); continue; }
    $html = $res['body'];
    if (preg_match('/(Warning|Notice|Deprecated|Fatal error|Parse error|Uncaught)\b.*?(on line|in \/)/', $html)) { $bad("{$path}: PHP error in output"); }
    $title = preg_match('/<title>(.*?)<\/title>/s', $html, $m) ? html_entity_decode($m[1], ENT_QUOTES, 'UTF-8') : '';
    $desc  = preg_match('/<meta name="description" content="([^"]*)"/', $html, $m) ? html_entity_decode($m[1], ENT_QUOTES, 'UTF-8') : '';
    if ($title === '') { $bad("{$path}: no title"); }
    if (mb_strlen($title) > 60) { $bad("{$path}: title " . mb_strlen($title) . " chars > 60: {$title}"); }
    if (isset($titles[$title])) { $bad("{$path}: duplicate title with {$titles[$title]}"); }
    $titles[$title] = $path;
    if (!$r['noindex']) {
        $len = mb_strlen($desc);
        if ($len < 110 || $len > 165) { $bad("{$path}: description {$len} chars (want 110–165)"); }
        if (isset($descs[$desc])) { $bad("{$path}: duplicate description with {$descs[$desc]}"); }
        $descs[$desc] = $path;
    }
    $h1 = preg_match_all('/<h1[\s>]/', $html);
    if ($h1 !== 1) { $bad("{$path}: {$h1} <h1> elements"); }
    if (!str_contains($html, '<link rel="canonical"')) { $bad("{$path}: no canonical"); }
    if (!indexing_allowed() && !str_contains($html, 'noindex')) { $bad("{$path}: indexing is off but page lacks noindex"); }
    if (preg_match_all('/href="(\/[^"#?]*)/', $html, $mm)) {
        foreach ($mm[1] as $l) { $links[$l][] = $path; }
    }
    $good();
}
echo "  ok    {$ok} routes answered 200\n";

/* ---- internal links ---- */
echo "== internal links\n";
$checked = 0;
foreach ($links as $l => $from) {
    if (preg_match('#^/assets/#', $l)) {
        if (!is_file(ROOT . $l)) { $bad("missing asset {$l} (linked from {$from[0]})"); }
        continue;
    }
    $res = fetch($base . $l);
    if ($res['code'] === 301 && $res['location']) { $res = fetch($base . $res['location']); }
    if ($res['code'] !== 200) { $bad("link {$l} → {$res['code']} (from {$from[0]})"); }
    $checked++;
}
echo "  ok    {$checked} distinct internal links resolve\n";

/* ---- redirects ---- */
echo "== redirects\n";
$map = content('redirects');
foreach ($map['exact'] as $from => $to) {
    $res = fetch($base . $from);
    if ($res['code'] !== 301 || $res['location'] !== $to) { $bad("{$from} → {$res['code']} {$res['location']} (want 301 {$to})"); }
}
foreach ($map['prefix'] as $from => $to) {
    $res = fetch($base . $from . 'x/');
    if ($res['code'] !== 301 || $res['location'] !== $to) { $bad("{$from}x/ → {$res['code']} {$res['location']} (want 301 {$to})"); }
}
$res = fetch($base . '/elbilsladdare');
if ($res['code'] !== 301 || $res['location'] !== '/elbilsladdare/') { $bad("/elbilsladdare (no slash) → {$res['code']} {$res['location']}"); }
$res = fetch($base . '/finns-inte-alls/');
if ($res['code'] !== 404) { $bad("unknown URL → {$res['code']} (want 404)"); }
foreach (['/lib/app.php', '/content/site.php', '/config.example.php', '/logs/', '/README.md', '/verify.sh', '/.gitignore', '/.git/config'] as $p) {
    $res = fetch($base . $p);
    if ($res['code'] === 200 && !str_contains($res['body'], 'Sidan hittades inte')) { $bad("{$p} is publicly readable"); }
}
echo "  ok    " . (count($map['exact']) + count($map['prefix'])) . " redirects checked, 404 + denied paths checked\n";

/* ---- robots + sitemap ---- */
echo "== robots / sitemap\n";
$robots = fetch($base . '/robots.txt')['body'];
if (!indexing_allowed() && !str_contains($robots, 'Disallow: /')) { $bad('robots.txt does not block while indexing is off'); }
$sm = fetch($base . '/sitemap.xml')['body'];
foreach (all_routes() as $path => $r) {
    $in = str_contains($sm, '<loc>' . abs_url($path) . '</loc>');
    if (!$r['noindex'] && !$in) { $bad("sitemap missing {$path}"); }
    if ($r['noindex'] && $in) { $bad("sitemap lists noindex page {$path}"); }
}
echo "  ok    robots.txt and sitemap.xml\n";

/* ---- lead form ---- */
echo "== lead form\n";
$res = fetch($base . '/enviar.php', ['website' => 'spam', 'phone' => '0701234567']);
if ($res['code'] !== 303 || !str_starts_with((string) $res['location'], '/tack/')) { $bad("honeypot → {$res['code']} {$res['location']}"); }
$res = fetch($base . '/enviar.php', ['phone' => '12']);
if ($res['code'] !== 422) { $bad("invalid phone → {$res['code']} (want 422)"); }
$res = fetch($base . '/enviar.php', ['name' => 'VERIFY TEST', 'phone' => '070-000 00 00', 'service' => 'elbilsladdare', 'message' => 'verify.php test', 'page' => '/elbilsladdare/']);
if ($res['code'] !== 303 || $res['location'] !== '/tack/?s=elbilsladdare') { $bad("valid lead → {$res['code']} {$res['location']}"); }
echo "  ok    honeypot, validation and submit\n";

echo $fail === 0 ? "\nPASS\n" : "\nFAIL ({$fail})\n";
exit($fail === 0 ? 0 : 1);
