<?php
/**
 * Builds dist/asplundeltjanst-YYYY-MM-DD.zip with exactly what belongs in
 * Hostinger public_html/ (flat — no wrapper folder).
 *   php tools/make-zip.php
 * Left out: docs/, tools/, dist/, verify.sh, router.php, config.php, lead logs.
 */

declare(strict_types=1);

$root = dirname(__DIR__);
$skipDirs  = ['docs', 'tools', 'dist', '.git', 'node_modules'];
$skipFiles = ['verify.sh', 'router.php', 'config.php', 'README.md'];

@mkdir($root . '/dist');
$zipPath = $root . '/dist/asplundeltjanst-' . date('Y-m-d') . '.zip';
@unlink($zipPath);

$zip = new ZipArchive();
if ($zip->open($zipPath, ZipArchive::CREATE) !== true) {
    fwrite(STDERR, "cannot create {$zipPath}\n");
    exit(1);
}

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));
$n = 0;
foreach ($it as $file) {
    $rel = str_replace('\\', '/', substr($file->getPathname(), strlen($root) + 1));
    $top = explode('/', $rel)[0];
    if (in_array($top, $skipDirs, true) || in_array($rel, $skipFiles, true)) {
        continue;
    }
    if (str_starts_with($rel, 'logs/') && $rel !== 'logs/.htaccess') {
        continue;
    }
    $zip->addFile($file->getPathname(), $rel);
    $n++;
}
$zip->close();
echo "{$n} files → {$zipPath}\n";
