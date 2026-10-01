<?php
/**
 * A service page. Route file: $slug = '<slug>'; require ROOT.'/templates/service.php';
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/lib/app.php';

$svc = service($slug ?? '');
if ($svc === null) {
    http_response_code(404);
    require ROOT . '/404.php';
    return;
}

$schema = [schema_service($svc)];
if (!empty($svc['faq'])) {
    $schema[] = schema_faq($svc['faq']);
}

page_start([
    'title'       => $svc['title'],
    'description' => $svc['description'],
    'path'        => $svc['path'],
    'crumbs'      => [['Tjänster', '/tjanster/'], [$svc['nav'], $svc['path']]],
    'schema'      => $schema,
    'service'     => $svc['slug'],
    'ogImage'     => is_file(ROOT . $svc['image']['src']) ? $svc['image']['src'] : null,
]);
$group = service_groups()[$svc['group']];
?>
<section class="shero">
  <div class="wrap shero-grid">
    <div class="shero-copy">
      <?= crumbs_html() ?>
      <p class="eyebrow eyebrow-ico"><?= icon($svc['icon'], 18) ?><?= e($group) ?></p>
      <h1><?= e($svc['h1']) ?></h1>
      <p class="shero-lead"><?= rich($svc['lead']) ?></p>
      <div class="hero-ctas">
        <a class="btn btn-spark btn-lg" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 20) ?> Ring <?= e(site('phone')) ?></a>
        <a class="btn btn-onDark btn-lg" href="#offert">Få pris <?= icon('arrow', 18) ?></a>
      </div>
      <?= trust_row('trust-dark') ?>
    </div>
    <div class="shero-form">
      <?= lead_form(['service' => $svc['slug'], 'title' => 'Få pris på ' . mb_strtolower($svc['nav']), 'sub' => 'Beskriv jobbet kort – du får ett fast pris innan vi börjar.']) ?>
    </div>
  </div>
</section>

<div class="wrap page-grid">
  <article class="prose">
    <section class="includes">
      <h2>Det här ingår</h2>
      <ul class="checks checks-2">
<?php foreach ($svc['includes'] as $inc): ?>
        <li><?= icon('check', 18) ?><span><?= rich($inc) ?></span></li>
<?php endforeach; ?>
      </ul>
    </section>
<?php if (!empty($svc['deduction'])): ?>
    <?= deduction_box($svc['deduction']) ?>
<?php endif; ?>
    <?= blocks($svc['sections']) ?>
    <?= faq_html($svc['faq'] ?? []) ?>
  </article>
  <aside class="side">
    <?= media($svc['image'], $svc['icon'], ['class' => 'side-media']) ?>
    <div class="side-card">
      <p class="side-h">Snabbast är att ringa</p>
      <a class="side-phone" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 22) ?><?= e(site('phone')) ?></a>
      <p class="side-small"><?= e(site('hoursText')) ?> · Nynäshamn &amp; Södertörn</p>
      <a class="btn btn-primary btn-block" href="#offert">Begär offert</a>
      <a class="side-sms" href="<?= e(sms_href()) ?>" data-ev="sms_click"><?= icon('message', 18) ?> Eller SMS:a en bild på jobbet</a>
    </div>
    <nav class="side-links" aria-label="Relaterade tjänster">
      <p class="side-h">Relaterat</p>
      <ul>
<?php foreach ($svc['related'] as $rel): $r = service($rel); if (!$r) { continue; } ?>
        <li><a href="<?= e($r['path']) ?>"><?= icon($r['icon'], 18) ?><?= e($r['nav']) ?></a></li>
<?php endforeach; ?>
        <li><a href="/priser/"><?= icon('receipt', 18) ?>Priser &amp; ROT-avdrag</a></li>
      </ul>
    </nav>
  </aside>
</div>

<?= process_steps() ?>

<section class="sec sec-tint">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">Fler tjänster</p><h2>Andra brukar också fråga om</h2></div>
    <?= service_cards($svc['related']) ?>
    <div class="areas-inline">
      <p><?= icon('pin', 18) ?> Vi utför <?= e(mb_strtolower($svc['nav'])) ?> i hela Nynäshamn och på Södertörn:</p>
      <?= area_chips() ?>
    </div>
  </div>
</section>

<?= cta_band('Vill du ha pris på ' . mb_strtolower($svc['nav']) . '?', 'Ring direkt eller skicka en förfrågan – du får ett fast pris innan vi börjar.', $svc['slug']) ?>
<?php page_end(); ?>
