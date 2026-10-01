<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/projekt/');
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/projekt/', 'crumbs' => [['Projekt', '/projekt/']]]);
?>
<?= page_hero('Referenser', $p['h1'], $p['lead']) ?>
<section class="sec sec-compact">
  <div class="wrap">
    <ul class="gallery gallery-lg">
<?php foreach (content('projects') as $pr): $sv = service($pr['service']); ?>
      <li><figure><?= picture($pr['image'], $pr['alt'], ['sizes' => '(min-width: 960px) 33vw, 100vw']) ?><figcaption><?= e($pr['caption']) ?><?php if ($sv): ?> · <a href="<?= e($sv['path']) ?>"><?= e($sv['nav']) ?></a><?php endif; ?></figcaption></figure></li>
<?php endforeach; ?>
    </ul>
  </div>
</section>
<?= cta_band('Vill du ha något liknande gjort?') ?>
<?php page_end(); ?>
