<?php
/**
 * Creates the 3-line route file for every service, area and guide that lacks
 * one. Idempotent: existing files are left alone.
 *   php tools/make-routes.php
 */

declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$made = 0;
$write = static function (string $path, string $var, string $key, string $template) use (&$made): void {
    $dir  = ROOT . rtrim($path, '/');
    $file = $dir . '/index.php';
    if (is_file($file)) {
        return;
    }
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    $depth = substr_count(trim($path, '/'), '/') + 1;
    $up    = str_repeat('/..', $depth);
    file_put_contents($file, "<?php\n\${$var} = '{$key}';\nrequire __DIR__ . '{$up}/templates/{$template}.php';\n");
    echo "created {$path}index.php\n";
    $made++;
};

foreach (services() as $slug => $s) {
    $write($s['path'], 'slug', $slug, 'service');
}
foreach (areas() as $key => $a) {
    $write($a['path'], 'area', $key, 'area');
}
foreach (guides() as $key => $g) {
    $write($g['path'], 'guide', $key, 'guide');
}

echo $made === 0 ? "all route files exist\n" : "{$made} route files created\n";
