<?php
/**
 * 301 redirects from the old WordPress site (crawled 2026-10-01) and common
 * variants. route.php serves these on Apache and router.php locally, so this
 * file is the only place to add one.
 *
 * Old URLs that still exist with the same path (kept on purpose so their
 * rankings carry over): /, /blogg/, /kontakt/, /om-oss/, /boka/, /belysning/,
 * /elbilsladdare/, /solceller/, /felsokning/, /luftvarmepump/.
 *
 * Exact paths map to a target. Prefix rules (ending in *) catch whole trees.
 */

declare(strict_types=1);

return [
    'exact' => [
        '/elektriker/'        => '/tjanster/',
        '/luftvarmepumpar/'   => '/luftvarmepump/',
        '/ny-hemsida/'        => '/',
        '/recensioner/'       => '/om-oss/',
        '/omdomen/'           => '/om-oss/',
        '/laddbox/'           => '/elbilsladdare/',
        '/laddstolpe/'        => '/elbilsladdare/',
        '/elinstallation/'    => '/dra-el/',
        '/sladdragning/'      => '/dra-el/',
        '/servicearbeten/'    => '/felsokning/',
        '/elsakerhet/'        => '/elbesiktning/',
        '/varmepumpar/'       => '/varmepump/',
        '/kontakta-oss/'      => '/kontakt/',
        '/offert/'            => '/boka/',
        '/tjanster/laddbox/'        => '/elbilsladdare/',
        '/tjanster/belysning/'      => '/belysning/',
        '/tjanster/felsokning/'     => '/felsokning/',
        '/tjanster/elinstallation/' => '/dra-el/',
        '/tjanster/solceller/'      => '/solceller/',
        '/tjanster/el-i-badrum/'    => '/badrum/',
        '/tjanster/elsakerhet/'     => '/elbesiktning/',
        '/omraden/nynashamn/'       => '/',
        '/omraden/haninge/'         => '/elektriker-haninge/',
        '/omraden/vasterhaninge/'   => '/elektriker-haninge/',
        '/omraden/tungelsta/'       => '/elektriker-haninge/',
        '/omraden/tyreso/'          => '/elektriker-tyreso/',
        '/omraden/'                 => '/',
        '/feed/'              => '/blogg/',
        '/comments/feed/'     => '/blogg/',
        '/wp-sitemap.xml'     => '/sitemap.xml',
        '/sitemap_index.xml'  => '/sitemap.xml',
    ],
    'prefix' => [
        '/author/'    => '/om-oss/',
        '/category/'  => '/blogg/',
        '/tag/'       => '/blogg/',
        '/wp-content/uploads/' => '/projekt/',
    ],
];
