<?php
/** Homepage — targets "elektriker" + "elektriker nynäshamn". */

declare(strict_types=1);

require __DIR__ . '/lib/app.php';

$p = page_meta('/');
$s = site();
$d = content('deductions');

$faq = [
    ['q' => 'Vilka områden jobbar ni i?', 'a' => 'Vi utgår från Nynäshamn och tar jobb i hela kommunen – Ösmo, Sorunda, Torö och Stora Vika – och på resten av Södertörn: [Haninge](/elektriker-haninge/), [Tyresö](/elektriker-tyreso/), [Huddinge](/elektriker-huddinge/) och [Södertälje](/elektriker-sodertalje/).'],
    ['q' => 'Vad kostar en elektriker?', 'a' => 'Vi lämnar fast pris när jobbet går att avgränsa, och talar alltid om timpriset i förväg vid löpande räkning. ROT-avdraget sänker arbetskostnaden med 30 %. Läs mer om [priser och avdrag](/priser/).'],
    ['q' => 'Sköter ni ROT-avdraget och grönt avdrag?', 'a' => 'Ja. Vi drar avdraget direkt på fakturan och ansöker hos Skatteverket – du betalar bara din del.'],
    ['q' => 'Är ni behöriga elektriker?', 'a' => 'Ja, Asplund Eltjänst är ett behörigt elföretag. Allt arbete i den fasta installationen görs enligt elsäkerhetslagen och gällande standarder.'],
    ['q' => 'Tar ni jobb åt företag och bostadsrättsföreningar?', 'a' => 'Ja. Vi hjälper företag, BRF och samfälligheter med till exempel laddplatser, belysning, felsökning och elkontroller.'],
];

page_start([
    'title'       => $p['title'],
    'description' => $p['description'],
    'path'        => '/',
    'schema'      => [schema_faq($faq)],
    'bodyClass'   => 'home',
]);
?>
<section class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="wrap hero-grid">
    <div class="hero-copy">
<?php if ($s['award']): ?>
      <p class="pill"><?= icon('award', 16) ?><?= e($s['award']) ?></p>
<?php else: ?>
      <p class="pill"><span class="pulse" aria-hidden="true"></span>Tar emot nya uppdrag</p>
<?php endif; ?>
      <h1><?= e($p['h1']) ?></h1>
      <p class="hero-lead"><?= rich($p['lead']) ?></p>
      <div class="hero-ctas">
        <a class="btn btn-spark btn-lg" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 20) ?> Ring <?= e($s['phone']) ?></a>
        <a class="btn btn-onDark btn-lg" href="#offert">Begär offert <?= icon('arrow', 18) ?></a>
      </div>
      <dl class="hero-stats">
        <div><dt><?= e($s['jobsDone']) ?></dt><dd>utförda jobb</dd></div>
        <div><dt><?= e((string) $s['foundedYear']) ?></dt><dd>grundat i Nynäshamn</dd></div>
        <div><dt>30–50&nbsp;%</dt><dd>avdrag direkt på fakturan</dd></div>
      </dl>
    </div>
    <div class="hero-form">
      <?= lead_form(['title' => 'Begär kostnadsfri offert', 'sub' => 'Beskriv jobbet kort – vi återkommer med pris och förslag på tid.']) ?>
    </div>
  </div>
</section>

<div class="trust-band"><div class="wrap"><?= trust_row() ?></div></div>

<section class="sec">
  <div class="wrap">
    <div class="sec-head sec-head-split">
      <div><p class="eyebrow">Tjänster</p><h2>Vad behöver du hjälp med?</h2></div>
      <p>Vi är en lokal elfirma för allt inom el – från ett nytt eluttag till laddbox, solceller och en ny elcentral.</p>
    </div>
    <?= service_cards(['elbilsladdare', 'solceller', 'luftvarmepump', 'elcentral', 'felsokning', 'belysning', 'utomhusbelysning', 'badrum'], 'cards-4') ?>
    <div class="groups">
<?php foreach (service_groups() as $gid => $glabel): ?>
      <div class="group">
        <p class="group-h"><?= e($glabel) ?></p>
        <ul>
<?php foreach (services_in($gid) as $slug): $sv = service($slug); ?>
          <li><a href="<?= e($sv['path']) ?>"><?= e($sv['nav']) ?></a></li>
<?php endforeach; ?>
        </ul>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

<section class="sec sec-tint">
  <div class="wrap split">
    <div class="split-media">
      <?= media(['src' => '/assets/img/work/van.webp', 'alt' => 'Asplund Eltjänsts servicebil på plats hos en kund'], 'bolt', ['class' => 'media-tall']) ?>
    </div>
    <div class="split-copy">
      <p class="eyebrow">Lokal elektriker</p>
      <h2>Din elektriker i Nynäshamn – inte ett callcenter</h2>
      <p>Asplund Eltjänst startades <?= e((string) $s['foundedYear']) ?> av <?= e($s['owner']) ?> i Nynäshamn. Sedan dess har det blivit <?= e($s['jobsDone']) ?> jobb åt villaägare, fritidshusägare, bostadsrättsföreningar och företag – från Torö i söder till Tyresö i norr.</p>
      <p>När du ringer pratar du med någon som kan el och som känner området. Vi ger raka besked, håller tider och lämnar platsen städad.</p>
      <ul class="checks">
        <li><?= icon('check', 18) ?><span>Behörig elektriker – allt enligt gällande regler</span></li>
        <li><?= icon('check', 18) ?><span>Fast pris innan vi börjar när jobbet går att avgränsa</span></li>
        <li><?= icon('check', 18) ?><span>ROT och grönt avdrag direkt på fakturan</span></li>
        <li><?= icon('check', 18) ?><span>Privatpersoner, BRF och företag</span></li>
      </ul>
      <a class="link-arrow" href="/om-oss/">Mer om oss <?= icon('arrow', 16) ?></a>
    </div>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow">Avdrag 2026</p><h2>Du betalar bara din del – vi sköter avdraget</h2></div>
    <ul class="deduct-cards">
      <li class="dcard"><span class="dcard-pct"><?= (int) $d['rot']['percent'] ?>&nbsp;%</span><p class="dcard-t">ROT-avdrag</p><p>På arbetskostnaden för elarbeten i hemmet – elcentral, belysning, värmepump, uttag och mycket mer.</p><a class="link-arrow" href="/priser/#avdrag">Så fungerar ROT <?= icon('arrow', 16) ?></a></li>
      <li class="dcard dcard-hi"><span class="dcard-pct"><?= (int) $d['gron-laddbox']['percent'] ?>&nbsp;%</span><p class="dcard-t">Laddbox &amp; batteri</p><p>Grönt avdrag på både arbete och material för laddbox och solcellsbatteri.</p><a class="link-arrow" href="/elbilsladdare/">Laddbox <?= icon('arrow', 16) ?></a></li>
      <li class="dcard"><span class="dcard-pct"><?= (int) $d['gron-sol']['percent'] ?>&nbsp;%</span><p class="dcard-t">Solceller</p><p>Grönt avdrag på arbete och material när du installerar solceller på ditt hus.</p><a class="link-arrow" href="/solceller/">Solceller <?= icon('arrow', 16) ?></a></li>
    </ul>
    <p class="fine">Max 50 000 kr per person och år för respektive avdrag. Regler enligt Skatteverket 2026.</p>
  </div>
</section>

<?= process_steps('Så går det till när du anlitar oss') ?>

<section class="sec">
  <div class="wrap">
    <div class="sec-head sec-head-split">
      <div><p class="eyebrow">Projekt</p><h2>Några av våra jobb</h2></div>
      <a class="link-arrow" href="/projekt/">Se fler projekt <?= icon('arrow', 16) ?></a>
    </div>
    <ul class="gallery">
<?php foreach (array_slice(content('projects'), 0, 4) as $pr): ?>
      <li><figure><?= picture($pr['image'], $pr['alt'], ['sizes' => '(min-width: 960px) 25vw, 50vw']) ?><figcaption><?= e($pr['caption']) ?></figcaption></figure></li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<?= reviews_html() ?>

<section class="sec sec-dark areas">
  <div class="wrap split split-center">
    <div>
      <p class="eyebrow eyebrow-spark">Områden</p>
      <h2>Elektriker på hela Södertörn</h2>
      <p>Vi utgår från Brunnsgatan i Nynäshamn och är snabbt på plats i Ösmo, Sorunda, Torö och Stora Vika. Vi tar också jobb i Haninge, Tyresö, Huddinge, Södertälje, Nacka och södra Stockholm – och i skärgården.</p>
      <?= area_chips() ?>
    </div>
    <ul class="area-cards">
<?php foreach (areas() as $a): ?>
      <li><a href="<?= e($a['path']) ?>"><?= icon('pin', 20) ?><span><b>Elektriker i <?= e($a['name']) ?></b><small><?= e(implode(', ', array_slice($a['districts'], 0, 3))) ?> …</small></span><?= icon('arrow', 18) ?></a></li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="sec-head sec-head-split">
      <div><p class="eyebrow">Guider</p><h2>Bra att veta innan du anlitar elektriker</h2></div>
      <a class="link-arrow" href="/blogg/">Alla guider <?= icon('arrow', 16) ?></a>
    </div>
    <ul class="guide-cards">
<?php foreach (array_slice(guides(), 0, 3) as $g): ?>
      <li><a href="<?= e($g['path']) ?>"><span class="guide-card-t"><?= e($g['h1']) ?></span><span class="guide-card-d"><?= e($g['description']) ?></span><span class="link-arrow">Läs guiden <?= icon('arrow', 16) ?></span></a></li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="sec sec-tint">
  <div class="wrap wrap-narrow">
    <?= faq_html($faq) ?>
  </div>
</section>

<?= cta_band('Behöver du en elektriker i Nynäshamn?', 'Ring direkt eller skicka en förfrågan – du får ett fast pris innan vi börjar.') ?>
<?php page_end(); ?>
