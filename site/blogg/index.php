<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/blogg/');
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/blogg/', 'crumbs' => [['Guider', '/blogg/']]]);
?>
<?= page_hero('Guider', $p['h1'], $p['lead']) ?>
<section class="sec sec-compact">
  <div class="wrap">
    <ul class="guide-cards guide-cards-lg">
<?php foreach (guides() as $g): ?>
      <li><a href="<?= e($g['path']) ?>">
        <?= media($g['image'], 'bolt', ['class' => 'guide-card-media']) ?>
        <span class="guide-card-meta"><?= e(sv_date($g['updated'])) ?></span>
        <span class="guide-card-t"><?= e($g['h1']) ?></span>
        <span class="guide-card-d"><?= e($g['description']) ?></span>
        <span class="link-arrow">Läs guiden <?= icon('arrow', 16) ?></span>
      </a></li>
<?php endforeach; ?>
    </ul>
  </div>
</section>
<?= cta_band() ?>
<?php page_end(); ?>
