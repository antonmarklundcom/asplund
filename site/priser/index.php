<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/priser/');
$d = content('deductions');

$faq = [
    ['q' => 'Vad kostar en elektriker i timmen?', 'a' => 'Timpriset varierar mellan elfirmor och beror bland annat på restid och typ av jobb. Vi talar alltid om vårt timpris innan vi börjar vid löpande räkning, och med ROT-avdrag betalar du 70 % av arbetskostnaden.'],
    ['q' => 'Tar ni betalt för offerten?', 'a' => 'Nej, offerten är kostnadsfri och utan förpliktelser.'],
    ['q' => 'Ingår material i ROT-avdraget?', 'a' => 'Nej, ROT gäller bara arbetskostnaden. För laddbox, solceller och batteri gäller i stället grönt avdrag, som omfattar både arbete och material.'],
    ['q' => 'Kan jag få ROT-avdrag i en bostadsrätt?', 'a' => 'Ja, för arbete inne i din lägenhet som du själv bekostar. Arbete på föreningens gemensamma delar ger inte ROT till dig som medlem.'],
    ['q' => 'Vad krävs för att ni ska kunna dra av ROT på fakturan?', 'a' => 'Ditt personnummer och fastighetsbeteckning eller bostadsrättsföreningens organisationsnummer och lägenhetsnummer. Du behöver också ha betalat tillräckligt med skatt under året.'],
];

page_start([
    'title'       => $p['title'],
    'description' => $p['description'],
    'path'        => '/priser/',
    'crumbs'      => [['Priser & avdrag', '/priser/']],
    'schema'      => [schema_faq($faq)],
]);
?>
<?= page_hero('Priser', $p['h1'], $p['lead']) ?>

<div class="wrap page-grid">
  <article class="prose">
    <?= blocks([
        [
            'h2' => 'Fast pris eller löpande räkning?',
            'p'  => [
                'När jobbet går att avgränsa – till exempel en [laddbox](/elbilsladdare/), ett [byte av elcentral](/elcentral/) eller nya [spotlights](/spotlights/) – lämnar vi ett **fast pris** innan vi börjar. Då vet du exakt vad det kostar.',
                'När det är svårt att veta i förväg hur lång tid något tar, som vid [felsökning av elfel](/felsokning/) eller arbete i äldre hus med okänd el, arbetar vi på **löpande räkning**. Då får du timpris och en uppskattning innan vi startar, och vi hör av oss om något oväntat dyker upp.',
            ],
        ],
        [
            'h2' => 'Det här påverkar priset',
            'checks' => [
                'Hur mycket kabel som ska dras och hur – infällt, i kanal eller i mark',
                'Om elcentralen har plats eller behöver byggas ut',
                'Materialval: laddbox, armaturer, dimmers, elcentral',
                'Husets ålder och hur tillgängligt det är att jobba',
                'Om flera jobb kan göras vid samma besök',
            ],
            'note' => 'Tips: samla flera småjobb till ett besök – det blir nästan alltid billigare per jobb.',
        ],
    ]) ?>

    <section class="prose-sec" id="avdrag">
      <h2>ROT-avdrag och grönt avdrag 2026</h2>
      <p>Vi drar avdraget direkt på fakturan och sköter ansökan hos Skatteverket. Du betalar bara din del.</p>
      <div class="table-wrap">
        <table class="tbl tbl-stack">
          <thead><tr><th>Arbete</th><th>Avdrag</th><th>Gäller</th></tr></thead>
          <tbody>
            <tr><td>Elarbete i hemmet: elcentral, belysning, uttag, värmepump, golvvärme m.m.</td><td><b><?= (int) $d['rot']['percent'] ?> %</b> ROT</td><td>Arbetskostnaden</td></tr>
            <tr><td><a href="/elbilsladdare/">Laddbox för elbil</a></td><td><b><?= (int) $d['gron-laddbox']['percent'] ?> %</b> grönt</td><td>Arbete och material</td></tr>
            <tr><td><a href="/solcellsbatteri/">Batteri för egen solel</a></td><td><b><?= (int) $d['gron-batteri']['percent'] ?> %</b> grönt</td><td>Arbete och material</td></tr>
            <tr><td><a href="/solceller/">Solceller</a></td><td><b><?= (int) $d['gron-sol']['percent'] ?> %</b> grönt</td><td>Arbete och material</td></tr>
          </tbody>
        </table>
      </div>
      <p><?= rich('Både ROT och grönt avdrag är begränsade till 50 000 kr per person och år. Samma kostnad kan bara ge ett av avdragen. Läs mer i vår guide om [grönt avdrag](/blogg/gront-avdrag/).') ?></p>
      <h3>Räkneexempel med ROT</h3>
      <p>Ett jobb med 10 000 kr i arbetskostnad och 4 000 kr i material (inklusive moms): ROT-avdraget blir 3 000 kr, och du betalar 11 000 kr. Exemplet visar hur avdraget räknas – ditt pris får du i offerten.</p>
    </section>

    <?= faq_html($faq, 'Vanliga frågor om priser') ?>
  </article>
  <aside class="side">
    <div class="side-card">
      <p class="side-h">Få ett fast pris</p>
      <p class="side-small">Beskriv jobbet så återkommer vi med pris. Kostnadsfritt och utan förpliktelser.</p>
      <a class="btn btn-primary btn-block" href="/boka/">Begär offert</a>
      <a class="side-phone" href="<?= e(tel_href()) ?>" data-ev="phone_click"><?= icon('phone', 22) ?><?= e(site('phone')) ?></a>
    </div>
  </aside>
</div>
<?= cta_band('Vill du veta vad ditt jobb kostar?', 'Skicka en förfrågan eller ring – offerten är kostnadsfri.') ?>
<?php page_end(); ?>
