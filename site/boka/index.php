<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p   = page_meta('/boka/');
$sel = is_string($_GET['tjanst'] ?? null) ? service($_GET['tjanst']) : null;
page_start([
    'title'       => $p['title'],
    'description' => $p['description'],
    'path'        => '/boka/',
    'crumbs'      => [['Begär offert', '/boka/']],
    'service'     => $sel['slug'] ?? null,
]);
?>
<section class="shero shero-book">
  <div class="wrap shero-grid">
    <div class="shero-copy">
      <?= crumbs_html() ?>
      <p class="eyebrow eyebrow-ico"><?= icon('clipboard', 18) ?>Kostnadsfritt</p>
      <h1><?= e($sel ? 'Begär offert på ' . mb_strtolower($sel['nav']) : $p['h1']) ?></h1>
      <p class="shero-lead"><?= e($p['lead']) ?></p>
      <ol class="mini-steps">
        <li><b>1</b><span>Du skickar förfrågan – det tar en minut.</span></li>
        <li><b>2</b><span>Vi ringer upp, ställer några frågor och bokar ev. ett kort besök.</span></li>
        <li><b>3</b><span>Du får ett fast pris. Säger du ja bokar vi in jobbet.</span></li>
      </ol>
      <p class="shero-alt">Hellre prata direkt? <a href="<?= e(tel_href()) ?>" data-ev="phone_click">Ring <?= e(site('phone')) ?></a> · <?= e(site('hoursText')) ?></p>
    </div>
    <div class="shero-form">
      <?= lead_form(['service' => $sel['slug'] ?? null, 'title' => 'Din förfrågan']) ?>
    </div>
  </div>
</section>
<?= trust_row('trust-center') ?>
<?php page_end(); ?>
