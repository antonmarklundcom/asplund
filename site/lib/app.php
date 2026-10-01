<?php
/**
 * Loaded first by every page: require dirname(__DIR__) . '/lib/app.php';
 *
 * Config, content loading, escaping, URLs, SEO/schema and the small helpers
 * every template uses. Markup components live in lib/components.php, the page
 * shell (head, header, footer) in lib/layout.php.
 */

declare(strict_types=1);

if (defined('ROOT')) {
    return;
}

define('ROOT', dirname(__DIR__));

/* ------------------------------------------------------------- config -- */

/**
 * A config value: config.php (server only, never committed) over
 * config.example.php defaults. Blank counts as unset.
 */
function cfg(string $key, ?string $default = null): ?string
{
    static $config = null;
    if ($config === null) {
        $defaults = require ROOT . '/config.example.php';
        $local    = is_file(ROOT . '/config.php') ? require ROOT . '/config.php' : [];
        $config   = array_merge($defaults, is_array($local) ? $local : []);
    }
    $value = $config[$key] ?? '';

    return $value === '' || $value === null ? $default : (string) $value;
}

/** Production origin used for canonical, OG, sitemap and schema. */
function canonical_origin(): string
{
    return rtrim((string) cfg('CANONICAL_ORIGIN', 'https://asplundeltjanst.se'), '/');
}

/**
 * Search engines may index this deployment only when config.php says so.
 * Default is OFF: a temp/staging domain is noindex + robots Disallow.
 */
function indexing_allowed(): bool
{
    return cfg('ALLOW_INDEXING') === '1';
}

/* ------------------------------------------------------------ content -- */

function content(string $name): array
{
    static $cache = [];
    if (!isset($cache[$name])) {
        $file = ROOT . '/content/' . $name . '.php';
        if (!is_file($file)) {
            throw new RuntimeException("Unknown content file: {$name}");
        }
        $cache[$name] = require $file;
    }

    return $cache[$name];
}

function site(?string $key = null)
{
    $site = content('site');

    return $key === null ? $site : ($site[$key] ?? null);
}

function services(): array
{
    return content('services');
}

function service(string $slug): ?array
{
    $all = services();

    return isset($all[$slug]) ? $all[$slug] + ['slug' => $slug] : null;
}

function areas(): array
{
    return content('areas');
}

function guides(): array
{
    return content('guides');
}

function page_meta(string $path): array
{
    return content('pages')[$path] ?? [];
}

/** Service groups in menu order: id => label. */
function service_groups(): array
{
    return [
        'energi'    => 'Laddbox, sol & värme',
        'el'        => 'El & säkerhet',
        'belysning' => 'Belysning',
        'hem'       => 'Rum & hem',
    ];
}

/** Service slugs of one group, in content order. */
function services_in(string $group): array
{
    return array_keys(array_filter(services(), static fn ($s) => ($s['group'] ?? '') === $group));
}

/**
 * Every route the site answers with 200, keyed by path:
 * ['type' => service|area|guide|page, 'noindex' => bool, 'changefreq', 'priority'].
 * The sitemap, the verify script and the 404 suggestions read this.
 */
function all_routes(): array
{
    $routes = [];
    foreach (content('pages') as $path => $p) {
        $routes[$path] = ['type' => 'page', 'noindex' => !empty($p['noindex']), 'priority' => $p['priority'] ?? '0.6'];
    }
    foreach (services() as $s) {
        $routes[$s['path']] = ['type' => 'service', 'noindex' => false, 'priority' => $s['priority'] ?? '0.8'];
    }
    foreach (areas() as $a) {
        $routes[$a['path']] = ['type' => 'area', 'noindex' => false, 'priority' => '0.7'];
    }
    foreach (guides() as $g) {
        $routes[$g['path']] = ['type' => 'guide', 'noindex' => false, 'priority' => '0.6'];
    }

    return $routes;
}

/* ----------------------------------------------------------- escaping -- */

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Typography for already-escaped HTML text: keeps "50 000 kr", "30 %" and
 * "070-960 20 71"-style figures on one line (non-breaking spaces).
 */
function nb(string $html): string
{
    $html = preg_replace('/(\d) (?=(?:%|kr\b|kronor\b|kW\b|kWh\b|A\b))/u', "$1\u{00A0}", $html) ?? $html;

    return preg_replace('/(?<=\d) (?=\d{3}(?!\d))/u', "\u{00A0}", $html) ?? $html;
}

/**
 * A heading: escaped, with hyphenated compounds (luft-luft) kept together so a
 * line never breaks inside them.
 */
function heading_text(string $text): string
{
    return preg_replace('/(?<![\p{L}\p{N}-])([\p{L}\p{N}]+(?:-[\p{L}\p{N}]+)+)(?![\p{L}\p{N}-])/u', '<span class="nb">$1</span>', e($text)) ?? e($text);
}

/**
 * Escaped text with two tiny markups for internal linking in content:
 * [label](/path/) and **bold**. Only site-relative or https links.
 */
function rich(string $text): string
{
    $html = nb(e($text));
    $html = preg_replace_callback(
        '/\[([^\]]+)\]\(((?:\/|https:\/\/)[^)\s]*)\)/',
        static function (array $m): string {
            $href = html_entity_decode($m[2], ENT_QUOTES, 'UTF-8');
            $ext  = str_starts_with($href, 'https://');

            return '<a href="' . e($href) . '"' . ($ext ? ' rel="noopener" target="_blank"' : '') . '>' . $m[1] . '</a>';
        },
        $html
    ) ?? $html;

    return preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $html) ?? $html;
}

/* --------------------------------------------------------------- urls -- */

function abs_url(string $path = '/'): string
{
    return canonical_origin() . '/' . ltrim($path, '/');
}

/** Asset path with an mtime cache-buster. */
function asset(string $path): string
{
    $path = '/' . ltrim($path, '/');
    $file = ROOT . $path;

    return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
}

function tel_href(): string
{
    return 'tel:' . site('phoneE164');
}

function sms_href(): string
{
    return 'sms:' . site('phoneE164');
}

/* ------------------------------------------------------------- images -- */

/**
 * <picture> for a site image, AVIF first when a sibling .avif exists. Returns
 * '' when the file is missing so callers can fall back to a placeholder.
 */
function picture(string $src, string $alt, array $opt = []): string
{
    $file = ROOT . $src;
    if (!is_file($file)) {
        return '';
    }
    $size  = @getimagesize($file) ?: [null, null];
    $w     = $opt['width'] ?? $size[0];
    $h     = $opt['height'] ?? $size[1];
    $lazy  = ($opt['eager'] ?? false) ? 'eager' : 'lazy';
    $prio  = ($opt['eager'] ?? false) ? ' fetchpriority="high"' : '';
    $class = isset($opt['class']) ? ' class="' . e($opt['class']) . '"' : '';
    $sizes = isset($opt['sizes']) ? ' sizes="' . e($opt['sizes']) . '"' : '';
    $avif  = preg_replace('/\.(webp|jpe?g|png)$/i', '.avif', $src);
    $out   = '<picture>';
    if ($avif !== $src && is_file(ROOT . $avif)) {
        $out .= '<source type="image/avif" srcset="' . e($avif) . '">';
    }
    $out .= '<img src="' . e($src) . '" alt="' . e($alt) . '"'
          . ($w ? ' width="' . (int) $w . '" height="' . (int) $h . '"' : '')
          . ' loading="' . $lazy . '" decoding="async"' . $prio . $class . $sizes . '>';

    return $out . '</picture>';
}

/**
 * An image slot: the real image when it exists, otherwise a designed
 * placeholder panel with the slot's icon (never a broken image). Slots and
 * their briefs are listed in docs/image-slots.md for the imagery session.
 */
function media(?array $image, string $icon = 'bolt', array $opt = []): string
{
    $class = 'media' . (isset($opt['class']) ? ' ' . $opt['class'] : '');
    if ($image !== null) {
        // The class belongs to the <figure> only; on the <img> too, its margins/aspect-ratio apply twice.
        unset($opt['class']);
        $pic = picture($image['src'], $image['alt'], $opt + ['sizes' => '(min-width: 960px) 540px, 100vw']);
        if ($pic !== '') {
            return '<figure class="' . e($class) . '">' . $pic . '</figure>';
        }
    }

    return '<div class="' . e($class) . ' media-ph" aria-hidden="true"><span class="media-ph-icon">' . icon($icon, 44) . '</span></div>';
}

/* --------------------------------------------------------------- icons -- */

function icon(string $name, int $size = 22, string $class = 'ico'): string
{
    static $paths = null;
    $paths ??= [
        'phone'     => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'message'   => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
        'mail'      => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'check'     => '<path d="M20 6 9 17l-5-5"/>',
        'arrow'     => '<path d="M5 12h14M13 5l7 7-7 7"/>',
        'chevron'   => '<path d="m6 9 6 6 6-6"/>',
        'menu'      => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'close'     => '<path d="M18 6 6 18M6 6l12 12"/>',
        'bolt'      => '<path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/>',
        'plug'      => '<path d="M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z"/><path d="m2 22 3-3M7.5 13.5 10 11M10.5 16.5 13 14M18 3l-4 4h6l-4 4"/>',
        'sun'       => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>',
        'battery'   => '<rect x="2" y="7" width="16" height="10" rx="2"/><path d="M22 11v2M6 10.5v3M10 10.5v3"/>',
        'wind'      => '<path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2M9.6 4.6A2 2 0 1 1 11 8H2M12.6 19.4A2 2 0 1 0 14 16H2"/>',
        'thermo'    => '<path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"/>',
        'bulb'      => '<path d="M9 18h6M10 22h4M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/>',
        'spot'      => '<path d="M3 4h18M7 4v2a5 5 0 0 0 10 0V4M12 15v2M6.5 18.5 5 21M17.5 18.5 19 21"/>',
        'tree'      => '<path d="M12 22v-6M12 2 5 12h4l-3 4h12l-3-4h4z"/>',
        'house'     => '<path d="M3 10.5 12 3l9 7.5M5 9.5V21h14V9.5M10 21v-6h4v6"/>',
        'pendant'   => '<path d="M12 2v6M5 16a7 7 0 0 1 14 0zM10 19a2 2 0 0 0 4 0"/>',
        'droplet'   => '<path d="M12 2.7s6 6.3 6 11.3a6 6 0 0 1-12 0c0-5 6-11.3 6-11.3z"/>',
        'flame'     => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.07-2.14-.22-4.05 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.15.43-2.29 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>',
        'wifi'      => '<path d="M5 12.55a11 11 0 0 1 14.08 0M1.42 9a16 16 0 0 1 21.16 0M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/>',
        'shield'    => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
        'panel'     => '<rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 7h2M14 7h2M8 12h2M14 12h2M8 17h8"/>',
        'search'    => '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>',
        'outlet'    => '<rect x="3" y="3" width="18" height="18" rx="5"/><path d="M9 9v2M15 9v2M9.5 15.5a3.5 3.5 0 0 0 5 0"/>',
        'cable'     => '<path d="M4 9a2 2 0 0 1-2-2V5h6v2a2 2 0 0 1-2 2ZM3 5V3M7 5V3M5 9v4a4 4 0 0 0 4 4h6a4 4 0 0 1 4 4v1"/>',
        'clipboard' => '<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2M9 14l2 2 4-4"/>',
        'star'      => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"/>',
        'pin'       => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
        'clock'     => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'receipt'   => '<path d="M4 2v20l3-2 3 2 3-2 3 2 3-2V2l-3 2-3-2-3 2-3-2-3 2zM8 8h8M8 12h8M8 16h5"/>',
        'award'     => '<circle cx="12" cy="8" r="6"/><path d="M15.48 12.89 17 22l-5-3-5 3 1.52-9.11"/>',
        'wrench'    => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        'calendar'  => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
        'users'     => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'building'  => '<rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M16 6h.01M12 6h.01M12 10h.01M12 14h.01M16 10h.01M16 14h.01M8 10h.01M8 14h.01"/>',
        'boat'      => '<path d="M2 21c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1 .6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1M19.38 20A11.6 11.6 0 0 0 21 14l-9-4-9 4c0 2.9.94 5.34 2.81 7.76M19 13V7a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v6M12 10v4M12 2v3"/>',
        'instagram' => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/>',
    ];
    $svg = $paths[$name] ?? $paths['bolt'];
    $fill = $name === 'star' ? 'currentColor' : 'none';

    return '<svg class="' . e($class) . '" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="' . $fill
         . '" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
         . $svg . '</svg>';
}

/* -------------------------------------------------------------- schema -- */

function business_id(): string
{
    return abs_url('/') . '#foretag';
}

/** The sitewide Electrician (LocalBusiness) node. */
function schema_business(): array
{
    $s = site();
    $node = [
        '@type'       => 'Electrician',
        '@id'         => business_id(),
        'name'        => $s['name'],
        'description' => $s['description'],
        'url'         => abs_url('/'),
        'telephone'   => $s['phoneE164'],
        'email'       => $s['email'],
        'image'       => abs_url('/assets/img/work/van.webp'),
        'logo'        => abs_url('/assets/img/logo.svg'),
        'address'     => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $s['street'],
            'postalCode'      => $s['postalCode'],
            'addressLocality' => $s['city'],
            'addressRegion'   => $s['region'],
            'addressCountry'  => $s['country'],
        ],
        'geo'         => ['@type' => 'GeoCoordinates', 'latitude' => $s['geo']['lat'], 'longitude' => $s['geo']['lng']],
        'areaServed'  => array_map(static fn ($c) => ['@type' => 'Place', 'name' => $c], $s['areaServed']),
        'openingHoursSpecification' => array_map(static fn ($o) => [
            '@type' => 'OpeningHoursSpecification', 'dayOfWeek' => $o['days'], 'opens' => $o['opens'], 'closes' => $o['closes'],
        ], $s['openingHours']),
        'foundingDate' => (string) $s['foundedYear'],
        'founder'      => ['@type' => 'Person', 'name' => $s['owner']],
        'priceRange'   => '$$',
    ];
    $same = array_values(array_filter([$s['instagram'], $s['facebook'], $s['googleProfileUrl']]));
    if ($same) {
        $node['sameAs'] = $same;
    }
    if (!empty($s['reviews'])) {
        $sum = array_sum(array_column($s['reviews'], 'rating'));
        $node['aggregateRating'] = [
            '@type' => 'AggregateRating', 'ratingValue' => round($sum / count($s['reviews']), 1), 'reviewCount' => count($s['reviews']),
        ];
    }

    return $node;
}

function schema_website(): array
{
    return [
        '@type'     => 'WebSite',
        '@id'       => abs_url('/') . '#webbplats',
        'url'       => abs_url('/'),
        'name'      => site('name'),
        'inLanguage' => 'sv-SE',
        'publisher' => ['@id' => business_id()],
    ];
}

function schema_breadcrumbs(array $crumbs): array
{
    $items = [];
    foreach (array_values($crumbs) as $i => [$label, $path]) {
        $items[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $label, 'item' => abs_url($path)];
    }

    return ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
}

function schema_faq(array $faq): array
{
    return [
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(static fn ($f) => [
            '@type'          => 'Question',
            'name'           => $f['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(rich($f['a']))],
        ], $faq),
    ];
}

function schema_service(array $svc): array
{
    return [
        '@type'       => 'Service',
        'name'        => $svc['nav'],
        'serviceType' => $svc['keyword'] ?? $svc['nav'],
        'description' => $svc['description'],
        'url'         => abs_url($svc['path']),
        'provider'    => ['@id' => business_id()],
        'areaServed'  => array_map(static fn ($c) => ['@type' => 'Place', 'name' => $c], ['Nynäshamn', 'Haninge', 'Tyresö', 'Huddinge', 'Södertälje', 'Nacka', 'södra Stockholm', 'Södertörn']),
    ];
}

function json_ld(array $nodes): string
{
    $graph = ['@context' => 'https://schema.org', '@graph' => array_values($nodes)];

    return '<script type="application/ld+json">'
         . json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG)
         . '</script>';
}

/* --------------------------------------------------------------- dates -- */

function sv_date(string $iso): string
{
    $months = ['januari', 'februari', 'mars', 'april', 'maj', 'juni', 'juli', 'augusti', 'september', 'oktober', 'november', 'december'];
    $t = strtotime($iso) ?: time();

    return (int) date('j', $t) . ' ' . $months[(int) date('n', $t) - 1] . ' ' . date('Y', $t);
}

require ROOT . '/lib/components.php';
require ROOT . '/lib/layout.php';
