<?php
/**
 * Front controller for every request that is not an existing file or
 * directory (see .htaccess; router.php does the same locally):
 * 1. 301 redirects from content/redirects.php (old WordPress URLs),
 * 2. a missing trailing slash on a real route → 301 with slash,
 * 3. otherwise the 404 page with a 404 status.
 */

declare(strict_types=1);

require __DIR__ . '/lib/app.php';

$uri   = (string) ($_SERVER['REQUEST_URI'] ?? '/');
$path  = rawurldecode((string) (parse_url($uri, PHP_URL_PATH) ?? '/'));
$query = (string) (parse_url($uri, PHP_URL_QUERY) ?? '');

/** Redirect target for a path, or null. */
function redirect_target(string $path): ?string
{
    $map  = content('redirects');
    $norm = str_ends_with($path, '/') || str_contains(basename($path), '.') ? $path : $path . '/';
    if (isset($map['exact'][$norm])) {
        return $map['exact'][$norm];
    }
    if (isset($map['exact'][$path])) {
        return $map['exact'][$path];
    }
    foreach ($map['prefix'] as $prefix => $target) {
        if (str_starts_with($path, $prefix)) {
            return $target;
        }
    }
    if (!str_ends_with($path, '/') && isset(all_routes()[$path . '/'])) {
        return $path . '/';
    }

    return null;
}

$target = redirect_target($path);
if ($target !== null && $target !== $path) {
    header('Location: ' . $target . ($query !== '' && $target === $path . '/' ? '?' . $query : ''), true, 301);
    exit;
}

http_response_code(404);
require __DIR__ . '/404.php';
