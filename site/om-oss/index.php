<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/om-oss/');
$s = site();
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/om-oss/', 'crumbs' => [['Om oss', '/om-oss/']]]);
?>
<?= page_hero('Om oss', $p['h1'], $p['lead']) ?>

<section class="sec">
  <div class="wrap split">
    <div class="split-media">
      <?= media(['src' => '/assets/img/work/van.webp', 'alt' => 'Asplund Eltjänsts servicebil på plats hos en kund'], 'bolt', ['class' => 'media-tall']) ?>
    </div>
    <div class="split-copy prose">
      <h2>Ett lokalt elföretag från Nynäshamn</h2>
      <p>Asplund Eltjänst grundades <?= e((string) $s['foundedYear']) ?> av <?= e($s['owner']) ?>. Idén var enkel: att vara elektrikern man faktiskt får tag på, som kommer när vi har sagt, gör jobbet ordentligt och lämnar ett tydligt besked om vad som är gjort.</p>
      <p>Sedan starten har det blivit <?= e($s['jobsDone']) ?> uppdrag – allt från ett nytt eluttag i en lägenhet till laddboxar, luftvärmepumpar, nya elcentraler och kompletta elinstallationer vid renovering. Våra kunder är villaägare, fritidshusägare, bostadsrättsföreningar och företag i Nynäshamn och på hela Södertörn.</p>
<?php if ($s['award']): ?>
      <p class="badge-line"><?= icon('award', 20) ?><span><?= e($s['award']) ?></span></p>
<?php endif; ?>
    </div>
  </div>
</section>

<section class="sec sec-tint">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">Så jobbar vi</p><h2>Det här kan du räkna med</h2></div>
    <ul class="values">
      <li><?= icon('shield', 26) ?><h3>Behörig och säker</h3><p>Allt arbete i den fasta installationen görs av behörig elektriker enligt elsäkerhetslagen och gällande standarder – och mäts innan vi lämnar.</p></li>
      <li><?= icon('receipt', 26) ?><h3>Tydliga priser</h3><p>Fast pris när jobbet går att avgränsa, och timpris i förväg vid löpande räkning. ROT och grönt avdrag drar vi direkt på fakturan.</p></li>
      <li><?= icon('clock', 26) ?><h3>Vi håller tider</h3><p>Vi kommer när vi har sagt. Blir något försenat hör vi av oss – du ska aldrig behöva jaga din elektriker.</p></li>
      <li><?= icon('house', 26) ?><h3>Respekt för ditt hem</h3><p>Skoskydd, täckning där vi borrar och städat efteråt. Du får dokumentation på det som är gjort.</p></li>
    </ul>
  </div>
</section>

<section class="sec">
  <div class="wrap wrap-narrow prose">
    <h2>Här jobbar vi</h2>
    <p>Vi utgår från Brunnsgatan 18 i Nynäshamn och tar jobb i hela Nynäshamns kommun – Ösmo, Sorunda, Torö, Stora Vika och skärgården – och på resten av Södertörn.</p>
    <?= area_chips() ?>
    <h2>Företagsuppgifter</h2>
    <ul class="facts">
      <li><span>Företag</span><b><?= e($s['legalName'] ?? $s['name']) ?></b></li>
<?php if ($s['orgNr']): ?>
      <li><span>Org.nr</span><b><?= e($s['orgNr']) ?></b></li>
<?php endif; ?>
      <li><span>Adress</span><b><?= e($s['street']) ?>, <?= e($s['postalCode']) ?> <?= e($s['city']) ?></b></li>
      <li><span>Telefon</span><b><a href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= e($s['phone']) ?></a></b></li>
      <li><span>E-post</span><b><a href="mailto:<?= e($s['email']) ?>"><?= e($s['email']) ?></a></b></li>
      <li><span>Öppettider</span><b><?= e($s['hoursText']) ?>, lör–sön stängt</b></li>
<?php if ($s['registration']): ?>
      <li><span>Registrerat hos Elsäkerhetsverket</span><b><?= e($s['registration']) ?></b></li>
<?php endif; ?>
    </ul>
  </div>
</section>

<?= reviews_html() ?>
<?= cta_band() ?>
<?php page_end(); ?>
