<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p   = page_meta('/tack/');
$sel = is_string($_GET['s'] ?? null) ? service($_GET['s']) : null;
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/tack/', 'noindex' => true, 'bodyClass' => 'is-thanks']);
?>
<section class="thanks">
  <div class="wrap wrap-narrow">
    <span class="thanks-ico"><?= icon('check', 40) ?></span>
    <h1><?= heading_text($p['h1']) ?></h1>
    <p class="thanks-lead"><?= e(site('responseText')) ?> – oftast med ett samtal där vi ställer några frågor om jobbet<?= $sel ? ' (' . e(mb_strtolower($sel['nav'])) . ')' : '' ?>.</p>
    <div class="thanks-box">
      <p class="side-h">Snabba upp det</p>
      <ul class="checks">
        <li><?= icon('check', 18) ?><span>SMS:a gärna en bild på elcentralen eller platsen för jobbet till <a href="<?= e(sms_href()) ?>" data-ev="sms_click"><?= e(site('phone')) ?></a>.</span></li>
        <li><?= icon('check', 18) ?><span>Har du bråttom? <a href="<?= e(tel_href()) ?>" data-ev="phone_click">Ring oss direkt</a> – <?= e(site('hoursText')) ?>.</span></li>
      </ul>
    </div>
    <p><a class="link-arrow" href="/blogg/">Under tiden: läs våra guider <?= icon('arrow', 16) ?></a></p>
  </div>
</section>
<?php page_end(); ?>
