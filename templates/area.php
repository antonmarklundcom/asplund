<?php
/**
 * A location page. Route file: $area = '<key>'; require ROOT.'/templates/area.php';
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/lib/app.php';

$a = areas()[$area ?? ''] ?? null;
if ($a === null) {
    http_response_code(404);
    require ROOT . '/404.php';
    return;
}

$schema = [];
if (!empty($a['faq'])) {
    $schema[] = schema_faq($a['faq']);
}

page_start([
    'title'       => $a['title'],
    'description' => $a['description'],
    'path'        => $a['path'],
    'crumbs'      => [['Elektriker i ' . $a['name'], $a['path']]],
    'schema'      => $schema,
]);
?>
<section class="shero">
  <div class="wrap shero-grid">
    <div class="shero-copy">
      <?= crumbs_html() ?>
      <p class="eyebrow eyebrow-ico"><?= icon('pin', 18) ?><?= e($a['region'] ?? 'Södertörn') ?></p>
      <h1><?= e($a['h1']) ?></h1>
      <p class="shero-lead"><?= rich($a['lead']) ?></p>
      <div class="hero-ctas">
        <a class="btn btn-spark btn-lg" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 20) ?> Ring <?= e(site('phone')) ?></a>
        <a class="btn btn-onDark btn-lg" href="#offert">Begär offert <?= icon('arrow', 18) ?></a>
      </div>
      <?= trust_row('trust-dark') ?>
    </div>
    <div class="shero-form">
      <?= lead_form(['title' => 'Elektriker i ' . $a['name'] . '?', 'sub' => 'Berätta vad du behöver och var – vi återkommer med pris och tid.']) ?>
    </div>
  </div>
</section>

<div class="wrap page-grid">
  <article class="prose">
    <?= blocks($a['sections']) ?>
    <section class="prose-sec">
      <h2>Här i <?= e($a['name']) ?> jobbar vi</h2>
      <ul class="chips chips-static">
<?php foreach ($a['districts'] as $d): ?>
        <li><?= e($d) ?></li>
<?php endforeach; ?>
      </ul>
    </section>
    <?= faq_html($a['faq'] ?? [], 'Vanliga frågor om elektriker i ' . $a['name']) ?>
  </article>
  <aside class="side">
    <div class="side-card">
      <p class="side-h">Elektriker i <?= e($a['name']) ?></p>
      <a class="side-phone" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 22) ?><?= e(site('phone')) ?></a>
      <p class="side-small"><?= e(site('hoursText')) ?></p>
      <a class="btn btn-primary btn-block" href="#offert">Begär offert</a>
    </div>
    <nav class="side-links" aria-label="Närliggande områden">
      <p class="side-h">Närliggande områden</p>
      <ul>
<?php foreach ($a['nearby'] as $path => $label): ?>
        <li><a href="<?= e($path) ?>"><?= icon('pin', 18) ?>Elektriker i <?= e($label) ?></a></li>
<?php endforeach; ?>
      </ul>
    </nav>
  </aside>
</div>

<section class="sec sec-tint">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">Tjänster</p><h2>Populära eltjänster i <?= e($a['name']) ?></h2></div>
    <?= service_cards($a['services']) ?>
    <p class="sec-more"><a class="link-arrow" href="/tjanster/">Se alla tjänster <?= icon('arrow', 16) ?></a></p>
  </div>
</section>

<?= process_steps() ?>
<?= cta_band('Behöver du en elektriker i ' . $a['name'] . '?') ?>
<?php page_end(); ?>
