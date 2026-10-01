<?php
/**
 * The page shell: <head>, header with mega menu, footer, mobile call bar.
 *
 * page_start($m) keys:
 *   title (≤60, full <title>), description (120–160), path (canonical path),
 *   crumbs  [[label, path], …] (Hem is added automatically when non-empty),
 *   schema  extra JSON-LD nodes, noindex bool, ogImage path, service slug
 *   (preselects the lead form and the mobile bar), bodyClass.
 */

declare(strict_types=1);

function page_start(array $m): void
{
    $GLOBALS['__page'] = $m;
    $noindex = !indexing_allowed() || !empty($m['noindex']);
    if ($noindex) {
        header('X-Robots-Tag: noindex, nofollow');
    }

    $crumbs = $m['crumbs'] ?? [];
    if ($crumbs) {
        array_unshift($crumbs, ['Hem', '/']);
    }
    $GLOBALS['__crumbs'] = $crumbs;

    $nodes = [schema_business(), schema_website()];
    $nodes[] = [
        '@type'      => 'WebPage',
        '@id'        => abs_url($m['path']) . '#sida',
        'url'        => abs_url($m['path']),
        'name'       => $m['title'],
        'description' => $m['description'],
        'isPartOf'   => ['@id' => abs_url('/') . '#webbplats'],
        'about'      => ['@id' => business_id()],
        'inLanguage' => 'sv-SE',
    ];
    if ($crumbs) {
        $nodes[] = schema_breadcrumbs($crumbs);
    }
    foreach ($m['schema'] ?? [] as $n) {
        $nodes[] = $n;
    }

    $og = abs_url($m['ogImage'] ?? '/assets/img/og-default.jpg');
    $ga = cfg('GA4_ID');
    ?>
<!doctype html>
<html lang="sv">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($m['title']) ?></title>
<meta name="description" content="<?= e($m['description']) ?>">
<link rel="canonical" href="<?= e(abs_url($m['path'])) ?>">
<?php if ($noindex): ?>
<meta name="robots" content="noindex, nofollow">
<?php endif; ?>
<meta property="og:type" content="<?= isset($m['article']) ? 'article' : 'website' ?>">
<meta property="og:locale" content="sv_SE">
<meta property="og:site_name" content="<?= e(site('name')) ?>">
<meta property="og:title" content="<?= e($m['title']) ?>">
<meta property="og:description" content="<?= e($m['description']) ?>">
<meta property="og:url" content="<?= e(abs_url($m['path'])) ?>">
<meta property="og:image" content="<?= e($og) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="theme-color" content="#0b1424">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
<link rel="preload" href="/assets/fonts/bricolage-grotesque-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/fonts/onest-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="<?= e(asset('/assets/css/site.css')) ?>">
<?= json_ld($nodes) ?>
<?php if ($ga): ?>
<script>window.GA4_ID=<?= json_encode($ga) ?>;window.ADS_SEND_TO=<?= json_encode((string) cfg('ADS_SEND_TO')) ?>;</script>
<?php endif; ?>
<?php if (cfg('VENDERCRM_URL')): ?>
<script src="<?= e(rtrim((string) cfg('VENDERCRM_URL'), '/')) ?>/vc-attribution.js" defer></script>
<?php endif; ?>
</head>
<body class="<?= e($m['bodyClass'] ?? '') ?>">
<a class="skip" href="#main">Hoppa till innehållet</a>
<?php site_header($m['path']); ?>
<main id="main">
<?php
}

function page_end(): void
{
    $m = $GLOBALS['__page'] ?? [];
    ?>
</main>
<?php site_footer(); ?>
<nav class="mbar" aria-label="Kontakta oss">
  <a class="mbar-btn" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 20) ?><span>Ring</span></a>
  <a class="mbar-btn" href="<?= e(sms_href()) ?>" data-ev="sms_click"><?= icon('message', 20) ?><span>SMS</span></a>
  <a class="mbar-btn mbar-primary" href="<?= e(isset($m['service']) ? '/boka/?tjanst=' . $m['service'] : '/boka/') ?>"><?= icon('arrow', 20) ?><span>Begär offert</span></a>
</nav>
<?php if (cfg('GA4_ID')): ?>
<div class="consent" id="consent" hidden>
  <p>Vi använder statistikcookies (Google Analytics) för att förstå hur sajten används. <a href="/integritetspolicy/#cookies">Läs mer</a></p>
  <div class="consent-btns"><button type="button" class="btn btn-ghost btn-sm" data-consent="deny">Endast nödvändiga</button><button type="button" class="btn btn-primary btn-sm" data-consent="grant">Godkänn statistik</button></div>
</div>
<?php endif; ?>
<script src="<?= e(asset('/assets/js/site.js')) ?>" defer></script>
</body>
</html>
<?php
}

function site_header(string $path): void
{
    $groups = service_groups();
    $icons  = ['energi' => 'plug', 'el' => 'shield', 'belysning' => 'bulb', 'hem' => 'house'];
    ?>
<header class="hdr" id="top">
  <div class="wrap hdr-in">
    <a class="logo" href="/" aria-label="Asplund Eltjänst – till startsidan">
      <span class="logo-mark"><?= icon('bolt', 20) ?></span>
      <span class="logo-txt"><b>Asplund</b> Eltjänst</span>
    </a>
    <nav class="nav" id="nav" aria-label="Huvudmeny">
      <ul class="nav-list">
        <li class="nav-item has-mega">
          <button class="nav-link nav-trigger" type="button" aria-expanded="false" aria-controls="mega-tjanster">Tjänster <?= icon('chevron', 16) ?></button>
          <div class="mega" id="mega-tjanster">
            <div class="mega-grid">
<?php foreach ($groups as $gid => $glabel): ?>
              <div class="mega-col">
                <p class="mega-h"><?= icon($icons[$gid], 18) ?><?= e($glabel) ?></p>
                <ul>
<?php foreach (services_in($gid) as $slug): $s = service($slug); ?>
                  <li><a href="<?= e($s['path']) ?>"<?= $s['path'] === $path ? ' aria-current="page"' : '' ?>><?= e($s['nav']) ?></a></li>
<?php endforeach; ?>
                </ul>
              </div>
<?php endforeach; ?>
            </div>
            <div class="mega-foot">
              <a class="mega-all" href="/tjanster/">Se alla tjänster <?= icon('arrow', 16) ?></a>
              <span>Osäker på vad du behöver? <a href="<?= e(tel_href()) ?>" data-ev="phone_click">Ring <?= e(site('phone')) ?></a></span>
            </div>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="/priser/"<?= $path === '/priser/' ? ' aria-current="page"' : '' ?>>Priser</a></li>
        <li class="nav-item has-drop">
          <button class="nav-link nav-trigger" type="button" aria-expanded="false" aria-controls="drop-omraden">Områden <?= icon('chevron', 16) ?></button>
          <div class="drop" id="drop-omraden">
            <ul>
              <li><a href="/">Nynäshamn, Ösmo &amp; Sorunda</a></li>
<?php foreach (areas() as $a): ?>
              <li><a href="<?= e($a['path']) ?>"<?= $a['path'] === $path ? ' aria-current="page"' : '' ?>><?= e($a['nav']) ?></a></li>
<?php endforeach; ?>
            </ul>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="/projekt/"<?= $path === '/projekt/' ? ' aria-current="page"' : '' ?>>Projekt</a></li>
        <li class="nav-item"><a class="nav-link" href="/om-oss/"<?= $path === '/om-oss/' ? ' aria-current="page"' : '' ?>>Om oss</a></li>
        <li class="nav-item"><a class="nav-link" href="/blogg/"<?= str_starts_with($path, '/blogg/') ? ' aria-current="page"' : '' ?>>Guider</a></li>
        <li class="nav-item"><a class="nav-link" href="/kontakt/"<?= $path === '/kontakt/' ? ' aria-current="page"' : '' ?>>Kontakt</a></li>
      </ul>
      <div class="nav-mobile-cta">
        <a class="btn btn-primary btn-block" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 18) ?> Ring <?= e(site('phone')) ?></a>
        <a class="btn btn-light btn-block" href="/boka/">Begär kostnadsfri offert</a>
      </div>
    </nav>
    <div class="hdr-cta">
      <a class="hdr-phone" href="<?= e(tel_href()) ?>" data-ev="phone_click">
        <span class="hdr-phone-ico"><?= icon('phone', 18) ?></span>
        <span class="hdr-phone-txt"><small><?= e(site('hoursText')) ?></small><?= e(site('phone')) ?></span>
      </a>
      <a class="btn btn-primary btn-sm hdr-offer" href="/boka/">Begär offert</a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="nav" aria-label="Öppna menyn"><?= icon('menu', 24) ?></button>
    </div>
  </div>
</header>
<?php
}

function site_footer(): void
{
    $s = site();
    ?>
<footer class="ftr">
  <div class="wrap ftr-grid">
    <div class="ftr-brand">
      <a class="logo logo-inv" href="/"><span class="logo-mark"><?= icon('bolt', 20) ?></span><span class="logo-txt"><b>Asplund</b> Eltjänst</span></a>
      <p><?= e($s['tagline']) ?>. Privatpersoner, BRF och företag – från Torö till Tyresö.</p>
      <ul class="ftr-contact">
        <li><a href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 18) ?><?= e($s['phone']) ?></a></li>
        <li><a href="mailto:<?= e($s['email']) ?>"><?= icon('mail', 18) ?><?= e($s['email']) ?></a></li>
        <li><?= icon('pin', 18) ?><span><?= e($s['street']) ?>, <?= e($s['postalCode']) ?> <?= e($s['city']) ?></span></li>
        <li><?= icon('clock', 18) ?><span><?= e($s['hoursText']) ?>, lör–sön stängt</span></li>
      </ul>
    </div>
    <div>
      <p class="ftr-h">Populära tjänster</p>
      <ul>
<?php foreach (['elbilsladdare', 'solceller', 'luftvarmepump', 'elcentral', 'felsokning', 'belysning', 'utomhusbelysning', 'golvvarme'] as $slug): $sv = service($slug); ?>
        <li><a href="<?= e($sv['path']) ?>"><?= e($sv['nav']) ?></a></li>
<?php endforeach; ?>
        <li><a href="/tjanster/">Alla tjänster →</a></li>
      </ul>
    </div>
    <div>
      <p class="ftr-h">Områden</p>
      <ul>
        <li><a href="/">Elektriker i Nynäshamn</a></li>
<?php foreach (areas() as $a): ?>
        <li><a href="<?= e($a['path']) ?>">Elektriker i <?= e($a['name']) ?></a></li>
<?php endforeach; ?>
      </ul>
    </div>
    <div>
      <p class="ftr-h">Företaget</p>
      <ul>
        <li><a href="/om-oss/">Om oss</a></li>
        <li><a href="/priser/">Priser &amp; ROT-avdrag</a></li>
        <li><a href="/projekt/">Tidigare projekt</a></li>
        <li><a href="/blogg/">Guider &amp; tips</a></li>
        <li><a href="/kontakt/">Kontakt</a></li>
        <li><a href="/boka/">Begär offert</a></li>
        <li><a href="/integritetspolicy/">Integritetspolicy</a></li>
<?php if ($s['instagram']): ?>
        <li><a href="<?= e($s['instagram']) ?>" rel="noopener" target="_blank">Instagram</a></li>
<?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="wrap ftr-bottom">
    <p>© <?= date('Y') ?> <?= e($s['name']) ?><?= $s['orgNr'] ? ' · Org.nr ' . e($s['orgNr']) : '' ?> · Behörig elektriker i Nynäshamn och på Södertörn</p>
    <a href="#top" class="ftr-top">Till toppen ↑</a>
  </div>
</footer>
<?php
}
