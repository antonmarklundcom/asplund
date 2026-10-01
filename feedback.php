<?php
/**
 * Customer feedback handler (POST from /omdome/). Private note to the owner.
 * It is NOT a review filter: /omdome/ shows the Google review link to everyone.
 *
 * Spam (honeypot / < 2.5 s) → pretend success. Message required.
 * Appends to logs/feedback-YYYY-MM.jsonl, e-mails LEAD_EMAIL when set,
 * then 303 to /omdome/?tack=1.
 */

declare(strict_types=1);

require __DIR__ . '/lib/app.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: /omdome/', true, 303);
    exit;
}

$field = static function (string $key, int $max = 500): string {
    $v = $_POST[$key] ?? '';
    $v = is_string($v) ? trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/u', '', $v) ?? '') : '';

    return mb_substr($v, 0, $max);
};

$thanks = '/omdome/?tack=1';
$t      = (int) $field('t', 20);
if ($field('website') !== '' || ($t > 0 && (int) (microtime(true) * 1000) - $t < 2500)) {
    header('Location: ' . $thanks, true, 303);
    exit;
}

$message = $field('message', 3000);
if (mb_strlen($message) < 3) {
    http_response_code(422);
    page_start(['title' => 'Skriv en rad – Asplund Eltjänst', 'description' => 'Skriv din feedback så att den kan skickas.', 'path' => '/omdome/', 'noindex' => true]);
    echo '<section class="thanks"><div class="wrap wrap-narrow"><h1>Skriv några rader</h1>'
       . '<p class="thanks-lead">Feedbacken var tom. Gå tillbaka och skriv några rader.</p>'
       . '<p><a class="btn btn-primary" href="javascript:history.back()">Tillbaka</a></p></div></section>';
    page_end();
    exit;
}

$row = [
    'time'    => date('c'),
    'name'    => $field('name', 120),
    'contact' => $field('contact', 120),
    'message' => $message,
    'ip_hash' => substr(hash('sha256', ($_SERVER['REMOTE_ADDR'] ?? '') . date('Y-m')), 0, 16),
];

$logDir = __DIR__ . '/logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0775, true);
}

$mailStatus = 'skipped';
$to = cfg('LEAD_EMAIL');
if ($to) {
    $text = "Ny feedback från asplundeltjanst.se/omdome/\n\n"
          . 'Namn: ' . ($row['name'] ?: '–') . "\n"
          . 'Kontakt: ' . ($row['contact'] ?: '–') . "\n\n"
          . $row['message'] . "\n";
    $headers = 'From: ' . cfg('LEAD_EMAIL_FROM', 'webb@asplundeltjanst.se') . "\r\n"
             . "Content-Type: text/plain; charset=UTF-8\r\n";
    $mailStatus = @mail($to, '=?UTF-8?B?' . base64_encode('Kundfeedback') . '?=', $text, $headers) ? 'ok' : 'error';
}

@file_put_contents(
    $logDir . '/feedback-' . date('Y-m') . '.jsonl',
    json_encode($row + ['mail' => $mailStatus], JSON_UNESCAPED_UNICODE) . "\n",
    FILE_APPEND | LOCK_EX
);

header('Location: ' . $thanks, true, 303);
exit;
