<?php
/**
 * /robots.txt. Blocks everything unless config.php sets ALLOW_INDEXING=1
 * (temp/staging domain stays out of Google).
 */

declare(strict_types=1);

require __DIR__ . '/lib/app.php';

header('Content-Type: text/plain; charset=utf-8');

if (!indexing_allowed()) {
    header('X-Robots-Tag: noindex, nofollow');
    echo "User-agent: *\nDisallow: /\n";
    return;
}

echo "User-agent: *\nDisallow: /enviar.php\nDisallow: /tack/\n\nSitemap: " . abs_url('/sitemap.xml') . "\n";
