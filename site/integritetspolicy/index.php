<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p = page_meta('/integritetspolicy/');
$s = site();
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/integritetspolicy/', 'crumbs' => [['Integritetspolicy', '/integritetspolicy/']]]);
?>
<?= page_hero('Personuppgifter', $p['h1'], $p['lead']) ?>
<div class="wrap wrap-narrow">
  <article class="prose">
    <?= blocks([
        ['h2' => 'Personuppgiftsansvarig', 'p' => [
            $s['name'] . ', ' . $s['street'] . ', ' . $s['postalCode'] . ' ' . $s['city'] . '. E-post: ' . $s['email'] . ', telefon: ' . $s['phone'] . '.',
        ]],
        ['h2' => 'Vilka uppgifter vi samlar in', 'p' => [
            'När du skickar en förfrågan via formuläret, ringer, SMS:ar eller mejlar oss sparar vi de uppgifter du lämnar: namn, telefonnummer, ort eller adress, vad ärendet gäller och eventuella bilder. Formuläret sparar också vilken sida du skickade det från och, om du kom via en annons, kampanjparametrar.',
            'När du blir kund behöver vi dessutom de uppgifter som krävs för att utföra jobbet, fakturera och – om du vill ha ROT eller grönt avdrag – ansöka hos Skatteverket, till exempel personnummer och fastighetsbeteckning.',
        ]],
        ['h2' => 'Varför vi behandlar uppgifterna', 'list' => [
            'För att svara på din förfrågan och lämna offert (berättigat intresse och åtgärder innan avtal).',
            'För att utföra och fakturera arbetet (avtal).',
            'För att ansöka om ROT-avdrag eller grönt avdrag och uppfylla bokföringskrav (rättslig förpliktelse).',
        ]],
        ['h2' => 'Hur länge vi sparar dem', 'p' => [
            'Förfrågningar som inte leder till uppdrag raderas senast 12 månader efter senaste kontakt. Uppgifter om utförda uppdrag och fakturor sparas så länge bokföringslagen kräver, för närvarande sju år.',
        ]],
        ['h2' => 'Vilka som får ta del av uppgifterna', 'p' => [
            'Vi säljer aldrig dina uppgifter. De kan behandlas av leverantörer som hjälper oss med till exempel e-post, kundregister, webbhotell och bokföring, och lämnas till Skatteverket när du begär ROT eller grönt avdrag.',
        ]],
        ['h2' => 'Dina rättigheter', 'p' => [
            'Du har rätt att få veta vilka uppgifter vi har om dig, få dem rättade eller raderade, och invända mot behandlingen. Kontakta oss på ' . $s['email'] . '. Du kan också klaga hos Integritetsskyddsmyndigheten (IMY).',
        ]],
        ['h2' => 'Cookies', 'id' => 'cookies', 'p' => [
            'Webbplatsen använder bara cookies som behövs för att den ska fungera. Om vi använder statistikverktyg som Google Analytics laddas de först efter att du har godkänt det i cookierutan, och du kan när som helst ändra ditt val genom att rensa cookies i webbläsaren.',
        ]],
    ]) ?>
    <p class="fine">Senast uppdaterad <?= e(sv_date('2026-10-01')) ?>.</p>
  </article>
</div>
<?php page_end(); ?>
