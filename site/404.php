<?php
/** 404 page. Served by route.php with a 404 status; never indexed. */

declare(strict_types=1);

require_once __DIR__ . '/lib/app.php';

if (!headers_sent()) {
    http_response_code(404);
}

page_start([
    'title'       => 'Sidan hittades inte – Asplund Eltjänst',
    'description' => 'Sidan du letade efter finns inte. Här hittar du våra eltjänster och hur du når oss.',
    'path'        => '/404',
    'noindex'     => true,
]);
?>
<section class="thanks">
  <div class="wrap wrap-narrow">
    <span class="thanks-ico thanks-ico-muted"><?= icon('search', 40) ?></span>
    <h1>Sidan hittades inte</h1>
    <p class="thanks-lead">Länken kan vara gammal eller felstavad. Här är det de flesta letar efter:</p>
  </div>
  <div class="wrap">
    <?= service_cards(['elbilsladdare', 'luftvarmepump', 'elcentral', 'felsokning', 'belysning', 'eljour'], 'cards-3') ?>
    <p class="sec-more"><a class="btn btn-primary" href="/">Till startsidan</a> <a class="btn btn-light" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 18) ?> <?= e(site('phone')) ?></a></p>
  </div>
</section>
<?php page_end(); ?>
