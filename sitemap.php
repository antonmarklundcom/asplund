<?php
/** /sitemap.xml — every indexable route from all_routes(). */

declare(strict_types=1);

require __DIR__ . '/lib/app.php';

header('Content-Type: application/xml; charset=utf-8');
if (!indexing_allowed()) {
    header('X-Robots-Tag: noindex, nofollow');
}

$guideDates = [];
foreach (guides() as $g) {
    $guideDates[$g['path']] = $g['updated'];
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach (all_routes() as $path => $r) {
    if ($r['noindex']) {
        continue;
    }
    $file    = __DIR__ . $path . 'index.php';
    $lastmod = $guideDates[$path] ?? (is_file($file) ? date('Y-m-d', (int) filemtime($file)) : date('Y-m-d'));
    echo '  <url><loc>' . e(abs_url($path)) . '</loc><lastmod>' . $lastmod . '</lastmod><priority>' . e($r['priority']) . "</priority></url>\n";
}
echo "</urlset>\n";
