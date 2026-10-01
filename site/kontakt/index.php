<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/kontakt/');
$s = site();
$maps = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($s['name'] . ', ' . $s['street'] . ', ' . $s['postalCode'] . ' ' . $s['city']);
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/kontakt/', 'crumbs' => [['Kontakt', '/kontakt/']]]);
?>
<?= page_hero('Kontakt', $p['h1'], $p['lead']) ?>

<section class="sec sec-compact">
  <div class="wrap contact-grid">
    <div class="contact-cards">
      <a class="ccard ccard-hi" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 26) ?><span><small>Ring oss</small><b><?= e($s['phone']) ?></b><em><?= e($s['hoursText']) ?></em></span></a>
      <a class="ccard" href="<?= e(sms_href()) ?>" data-ev="sms_click"><?= icon('message', 26) ?><span><small>SMS – gärna med bild</small><b><?= e($s['phone']) ?></b><em>Vi svarar så snart vi kan</em></span></a>
      <a class="ccard" href="mailto:<?= e($s['email']) ?>"><?= icon('mail', 26) ?><span><small>E-post</small><b><?= e($s['email']) ?></b><em>Bra för ritningar och underlag</em></span></a>
      <a class="ccard" href="<?= e($maps) ?>" rel="noopener" target="_blank"><?= icon('pin', 26) ?><span><small>Adress</small><b><?= e($s['street']) ?></b><em><?= e($s['postalCode']) ?> <?= e($s['city']) ?> · Visa på karta</em></span></a>
      <div class="ccard ccard-plain"><?= icon('clock', 26) ?><span><small>Öppettider</small><b>Måndag–lördag 08–20</b><em>Söndag stängt</em></span></div>
    </div>
    <div>
      <?= lead_form(['title' => 'Skicka en förfrågan']) ?>
    </div>
  </div>
</section>
<?php page_end(); ?>
