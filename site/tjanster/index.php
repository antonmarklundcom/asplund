<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/tjanster/');
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/tjanster/', 'crumbs' => [['Tjänster', '/tjanster/']]]);
?>
<?= page_hero('Allt inom el', $p['h1'], $p['lead']) ?>
<?php foreach (service_groups() as $gid => $glabel): ?>
<section class="sec sec-compact">
  <div class="wrap">
    <h2 class="group-title"><?= e($glabel) ?></h2>
    <?= service_cards(services_in($gid), 'cards-3') ?>
  </div>
</section>
<?php endforeach; ?>
<?= process_steps() ?>
<?= cta_band('Hittar du inte det du söker?', 'Ring oss och berätta vad du behöver – det är troligen något vi gör.') ?>
<?php page_end(); ?>
