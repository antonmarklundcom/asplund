<?php
/**
 * A guide (blog article). Route file: $guide = '<key>'; require ROOT.'/templates/guide.php';
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/lib/app.php';

$g = guides()[$guide ?? ''] ?? null;
if ($g === null) {
    http_response_code(404);
    require ROOT . '/404.php';
    return;
}

$words   = str_word_count(strip_tags(implode(' ', array_map(static fn ($s) => implode(' ', array_merge($s['p'] ?? [], $s['list'] ?? [], $s['checks'] ?? [])), $g['sections']))));
$minutes = max(2, (int) round($words / 200));
$svc     = service($g['service']);

$schema = [[
    '@type'         => 'Article',
    'headline'      => $g['h1'],
    'description'   => $g['description'],
    'datePublished' => $g['date'],
    'dateModified'  => $g['updated'],
    'inLanguage'    => 'sv-SE',
    'mainEntityOfPage' => abs_url($g['path']),
    'author'        => ['@type' => 'Organization', 'name' => site('name'), 'url' => abs_url('/')],
    'publisher'     => ['@id' => business_id()],
    'image'         => is_file(ROOT . $g['image']['src']) ? abs_url($g['image']['src']) : abs_url('/assets/img/og-default.jpg'),
]];
if (!empty($g['faq'])) {
    $schema[] = schema_faq($g['faq']);
}

page_start([
    'title'       => $g['title'],
    'description' => $g['description'],
    'path'        => $g['path'],
    'crumbs'      => [['Guider', '/blogg/'], [$g['h1'], $g['path']]],
    'schema'      => $schema,
    'service'     => $g['service'],
    'article'     => true,
]);
?>
<section class="ghero">
  <div class="wrap wrap-narrow">
    <?= crumbs_html() ?>
    <p class="eyebrow">Guide</p>
    <h1><?= heading_text($g['h1']) ?></h1>
    <p class="ghero-meta"><span><?= icon('calendar', 16) ?> Uppdaterad <time datetime="<?= e($g['updated']) ?>"><?= e(sv_date($g['updated'])) ?></time></span><span><?= $minutes ?> min läsning</span><span>Asplund Eltjänst</span></p>
    <p class="ghero-lead"><?= rich($g['lead']) ?></p>
  </div>
</section>

<div class="wrap wrap-narrow">
  <?= media($g['image'], $svc['icon'] ?? 'bolt', ['class' => 'guide-media', 'eager' => true]) ?>
  <article class="prose prose-guide">
    <?= blocks($g['sections']) ?>
    <?= faq_html($g['faq'] ?? []) ?>
  </article>

<?php if ($svc): ?>
  <aside class="guide-cta">
    <div>
      <p class="eyebrow eyebrow-ico"><?= icon($svc['icon'], 18) ?>Behöver du hjälp?</p>
      <p class="guide-cta-h"><?= e($svc['nav']) ?> i Nynäshamn och på Södertörn</p>
      <p><?= e($svc['card']) ?></p>
      <p><a class="link-arrow" href="<?= e($svc['path']) ?>">Läs mer om <?= e(mb_strtolower($svc['nav'])) ?> <?= icon('arrow', 16) ?></a></p>
    </div>
    <?= lead_form(['service' => $svc['slug'], 'title' => 'Få pris på ' . mb_strtolower($svc['nav']), 'id' => 'offert']) ?>
  </aside>
<?php endif; ?>

  <section class="more-guides">
    <h2>Fler guider</h2>
    <ul class="guide-list">
<?php foreach (guides() as $key => $other): if ($other['path'] === $g['path']) { continue; } ?>
      <li><a href="<?= e($other['path']) ?>"><span class="guide-list-t"><?= e($other['h1']) ?></span><span class="guide-list-d"><?= e($other['description']) ?></span></a></li>
<?php endforeach; ?>
    </ul>
  </section>
</div>

<?= cta_band() ?>
<?php page_end(); ?>
