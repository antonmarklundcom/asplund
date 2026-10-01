<?php
/**
 * Local preview only:  php -S 127.0.0.1:8080 router.php
 * Mirrors .htaccess (sitemap/robots rewrites, denied directories, index.php
 * canonicalisation, trailing slash, route.php fallback). Apache never runs it.
 */

declare(strict_types=1);

$path = rawurldecode((string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH));

if ($path === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    return true;
}
if ($path === '/robots.txt') {
    require __DIR__ . '/robots.php';
    return true;
}
if (preg_match('#^/(lib|content|templates|tools|docs|logs|dist)(/|$)#', $path) || preg_match('#^/(config(\.example)?|router|route)\.php$#', $path)) {
    require __DIR__ . '/route.php';
    return true;
}
if (preg_match('#^(.*/)index\.php$#', $path, $m)) {
    header('Location: ' . $m[1], true, 301);
    return true;
}

$file = __DIR__ . $path;
if (is_file($file)) {
    if (str_ends_with($file, '.php')) {
        require $file;
        return true;
    }
    return false; // static asset
}
if (is_dir($file) && is_file(rtrim($file, '/') . '/index.php')) {
    if (!str_ends_with($path, '/')) {
        header('Location: ' . $path . '/', true, 301);
        return true;
    }
    require rtrim($file, '/') . '/index.php';
    return true;
}

require __DIR__ . '/route.php';
return true;
