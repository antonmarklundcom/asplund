<?php
/**
 * Location pages. Only places with real search volume (Keyword Planner,
 * 2026-10-01: "elektriker haninge/tyresö/huddinge/södertälje" 260/mo each).
 * Nynäshamn (140/mo) is targeted by the homepage. Every page has unique,
 * local text — no copy-paste with a swapped town name.
 *
 * Shape: path, name, nav, title (≤60), description, h1, lead, districts[],
 * sections[] (blocks()), services[slug], faq[], nearby[path => label].
 */

declare(strict_types=1);

return [

'haninge' => [
    'path'        => '/elektriker-haninge/',
    'name'        => 'Haninge',
    'nav'         => 'Haninge & Västerhaninge',
    'title'       => 'Elektriker i Haninge – Asplund Eltjänst',
    'description' => 'Behörig elektriker i Haninge, Västerhaninge, Tungelsta, Handen och Jordbro. Laddbox, elcentral, belysning och felsökning – fast pris och ROT.',
    'h1'          => 'Elektriker i Haninge',
    'lead'        => 'Från Tungelsta och Västerhaninge till Handen, Brandbergen och Dalarö – Haninge ligger precis norr om oss i Nynäshamn, och vi är ofta på jobb i kommunen.',
    'districts'   => ['Västerhaninge', 'Tungelsta', 'Handen', 'Jordbro', 'Vendelsö', 'Brandbergen', 'Vega', 'Dalarö', 'Årsta havsbad', 'Muskö'],
    'sections'    => [
        [
            'h2' => 'Vi hjälper villaägare, BRF och företag i Haninge',
            'p'  => [
                'Haninge har allt från 70-talsvillor i Brandbergen och Vendelsö till nybyggda områden i Vega och fritidshus i skärgården vid Dalarö och Muskö. Det betyder väldigt olika elbehov: i äldre hus handlar det ofta om att [byta elcentral](/elcentral/) och installera [jordfelsbrytare](/jordfelsbrytare/), i nyare hus om [laddbox](/elbilsladdare/), [solceller](/solceller/) och [smart styrning](/smarta-hem/).',
                'Längs Nynäsvägen och väg 73 når vi Västerhaninge och Tungelsta på kort tid från Nynäshamn, så vi kan ofta komma ut snabbt för både mindre jobb och större installationer.',
            ],
        ],
        [
            'h2' => 'Vanliga elarbeten i Haninge',
            'checks' => [
                'Laddbox och laddstolpe vid villa, radhus och i bostadsrättsföreningar',
                'Byte från proppskåp till modern elcentral i äldre villor',
                'Luftvärmepump med installation – särskilt i hus med direktverkande el',
                'Utomhus- och fasadbelysning, och el till altan och pool',
                'El till fritidshus, gäststugor och bastu i skärgården',
                'Felsökning när jordfelsbrytaren löser ut',
            ],
        ],
    ],
    'services' => ['elbilsladdare', 'elcentral', 'luftvarmepump', 'solceller', 'utomhusbelysning', 'felsokning'],
    'faq'      => [
        ['q' => 'Kör ni ut till skärgården i Haninge?', 'a' => 'Ja, vi tar jobb på Dalarö, Muskö och i övriga Haninge skärgård. Hör av dig så planerar vi logistiken tillsammans.'],
        ['q' => 'Hur snabbt kan ni komma till Haninge?', 'a' => 'Det beror på hur fullbokade vi är, men Västerhaninge och Tungelsta ligger nära oss i Nynäshamn. Ring så får du besked direkt.'],
        ['q' => 'Tar ni jobb åt bostadsrättsföreningar i Haninge?', 'a' => 'Ja, till exempel laddplatser, belysning i gemensamma utrymmen och elkontroller.'],
    ],
    'nearby' => ['/' => 'Nynäshamn', '/elektriker-tyreso/' => 'Tyresö', '/elektriker-huddinge/' => 'Huddinge'],
],

'tyreso' => [
    'path'        => '/elektriker-tyreso/',
    'name'        => 'Tyresö',
    'nav'         => 'Tyresö',
    'title'       => 'Elektriker i Tyresö – Asplund Eltjänst',
    'description' => 'Behörig elektriker i Tyresö: Trollbäcken, Bollmora, Tyresö strand och Brevik. Laddbox, solceller, elcentral och belysning – fast pris och ROT.',
    'h1'          => 'Elektriker i Tyresö',
    'lead'        => 'Villor i Trollbäcken, radhus i Bollmora och sjönära hus i Brevik och Tyresö strand – vi hjälper Tyresöbor med allt från en ny laddbox till omdragning av el i äldre hus.',
    'districts'   => ['Trollbäcken', 'Bollmora', 'Tyresö strand', 'Brevik', 'Krusboda', 'Öringe', 'Tyresö centrum', 'Raksta'],
    'sections'    => [
        [
            'h2' => 'Elektriker för Tyresös villor och radhus',
            'p'  => [
                'En stor del av Tyresös hus är villor och radhus där många nu skaffar elbil, solceller och värmepump. Det ställer krav på elcentral och huvudsäkring. Vi tittar på helheten så att [laddbox](/elbilsladdare/), [solceller](/solceller/) och [luftvärmepump](/luftvarmepump/) fungerar tillsammans utan att säkringarna går.',
                'I de äldre villorna kring Brevik och Trollbäcken finns ofta original-el från 50- och 60-talet. Där gör en [elbesiktning](/elbesiktning/) och ett byte av [elcentral](/elcentral/) stor skillnad för säkerheten.',
            ],
        ],
        [
            'h2' => 'Vanliga elarbeten i Tyresö',
            'checks' => [
                'Laddbox för en eller två bilar – med lastbalansering',
                'Solceller och solcellsbatteri på villatak',
                'Byte av elcentral och installation av jordfelsbrytare',
                'Spotlights, köksbelysning och el vid renovering',
                'Fasad- och trädgårdsbelysning',
                'Elkontroll vid husköp',
            ],
        ],
    ],
    'services' => ['elbilsladdare', 'solceller', 'elcentral', 'spotlights', 'tradgardsbelysning', 'elbesiktning'],
    'faq'      => [
        ['q' => 'Tar ni mindre jobb i Tyresö?', 'a' => 'Ja. Har du flera små saker – ett par uttag, en lampa och en dimmer – samlar vi dem gärna i ett besök så att det blir prisvärt.'],
        ['q' => 'Kan ni installera laddbox i en radhusförening i Tyresö?', 'a' => 'Ja, både för enskilda radhus och som gemensam lösning för föreningen.'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, vi drar ROT eller grönt avdrag direkt på fakturan när arbetet görs i din bostad.'],
    ],
    'nearby' => ['/elektriker-haninge/' => 'Haninge', '/elektriker-huddinge/' => 'Huddinge', '/' => 'Nynäshamn'],
],

'huddinge' => [
    'path'        => '/elektriker-huddinge/',
    'name'        => 'Huddinge',
    'nav'         => 'Huddinge',
    'title'       => 'Elektriker i Huddinge – Asplund Eltjänst',
    'description' => 'Behörig elektriker i Huddinge: Stuvsta, Snättringe, Trångsund, Skogås och Vårby. Laddbox, elcentral, belysning och felsökning – fast pris och ROT.',
    'h1'          => 'Elektriker i Huddinge',
    'lead'        => 'Huddinge har några av Stockholms största villaområden – Stuvsta, Snättringe, Trångsund och Skogås. Vi hjälper villaägare och föreningar med el som håller i många år.',
    'districts'   => ['Stuvsta', 'Snättringe', 'Trångsund', 'Skogås', 'Länna', 'Vårby', 'Segeltorp', 'Flemingsberg', 'Huddinge centrum'],
    'sections'    => [
        [
            'h2' => 'El i Huddinges villaområden',
            'p'  => [
                'Många villor i Stuvsta och Snättringe är byggda under första halvan av 1900-talet och har byggts om i flera omgångar. Det syns ofta i elen: en blandning av gammalt och nytt, för få uttag och en elcentral utan jordfelsbrytare. Vi hjälper dig [dra om elen](/dra-el/) i etapper och [byta elcentral](/elcentral/) när det är dags.',
                'I nyare områden som Länna och Skogås handlar det oftare om [laddbox](/elbilsladdare/), [golvvärme](/golvvarme/) och [smart belysning](/smarta-hem/).',
            ],
        ],
        [
            'h2' => 'Vanliga elarbeten i Huddinge',
            'checks' => [
                'Omdragning av el i äldre villor, rum för rum',
                'Byte till elcentral med automatsäkringar',
                'Laddbox och laddstolpe',
                'El vid kök- och badrumsrenovering',
                'Felsökning av elfel och jordfelsbrytare som löser ut',
                'Belysning inne och ute',
            ],
        ],
    ],
    'services' => ['dra-el', 'elcentral', 'elbilsladdare', 'badrum', 'felsokning', 'belysning'],
    'faq'      => [
        ['q' => 'Kan ni dra om elen i en äldre villa i Huddinge utan att riva allt?', 'a' => 'Ofta ja. Vi kan använda befintliga rör, dra i bjälklag och välja snygga utanpåliggande lösningar där det passar.'],
        ['q' => 'Gör ni el i samband med badrumsrenovering?', 'a' => 'Ja, vi samordnar med plattsättare och rörmokare. Läs mer om [el i badrum](/badrum/).'],
        ['q' => 'Hur bokar jag?', 'a' => 'Ring oss eller skicka en förfrågan via formuläret, så återkommer vi med pris och tid.'],
    ],
    'nearby' => ['/elektriker-haninge/' => 'Haninge', '/elektriker-tyreso/' => 'Tyresö', '/elektriker-sodertalje/' => 'Södertälje'],
],

'sodertalje' => [
    'path'        => '/elektriker-sodertalje/',
    'name'        => 'Södertälje',
    'nav'         => 'Södertälje',
    'title'       => 'Elektriker i Södertälje – Asplund Eltjänst',
    'description' => 'Behörig elektriker i Södertälje, Järna, Mölnbo och Pershagen. Laddbox, solceller, luftvärmepump och el till fritidshus – fast pris och ROT.',
    'h1'          => 'Elektriker i Södertälje',
    'lead'        => 'Från villaområdena i Pershagen och Hölö till gårdar och fritidshus runt Järna och Mölnbo – vi tar elarbeten i hela Södertälje kommun.',
    'districts'   => ['Pershagen', 'Järna', 'Mölnbo', 'Hölö', 'Ronna', 'Västergård', 'Södertälje centrum', 'Enhörna'],
    'sections'    => [
        [
            'h2' => 'Elektriker för villa, gård och fritidshus',
            'p'  => [
                'Södertälje kommun är stor och varierad. Utanför tätorten finns många hus med egen brunn, ved och direktverkande el – där kan en [luftvärmepump](/luftvarmepump/) och [solceller](/solceller/) sänka kostnaderna rejält. Med långa luftledningar på landsbygden är också [överspänningsskydd](/elcentral/#overspanningsskydd) i elcentralen en klok investering.',
                'I villaområdena är [laddbox](/elbilsladdare/) och moderna elcentraler de vanligaste jobben.',
            ],
        ],
        [
            'h2' => 'Vanliga elarbeten i Södertälje',
            'checks' => [
                'Luftvärmepump med installation',
                'Solceller och solcellsbatteri',
                'Laddbox och laddstolpe – även för garage och carport',
                'Elcentral med överspänningsskydd',
                'El till uthus, garage och bastu',
                'Utomhus- och gårdsbelysning',
            ],
        ],
    ],
    'services' => ['luftvarmepump', 'solceller', 'elbilsladdare', 'elcentral', 'dra-el', 'utomhusbelysning'],
    'faq'      => [
        ['q' => 'Tar ni jobb i hela Södertälje kommun?', 'a' => 'Ja, både i tätorten och på landsbygden runt Järna, Mölnbo och Hölö. För mindre jobb långt bort försöker vi samla flera uppdrag samma dag.'],
        ['q' => 'Kan ni dra el till ett uthus eller en ladugård?', 'a' => 'Ja, med kabel i mark och egen elcentral i byggnaden. Läs mer om att [dra el](/dra-el/).'],
        ['q' => 'Får jag avdrag för solceller och laddbox?', 'a' => 'Ja, grönt avdrag: 15 % för solceller och 50 % för laddbox och batteri, direkt på fakturan.'],
    ],
    'nearby' => ['/elektriker-huddinge/' => 'Huddinge', '/elektriker-haninge/' => 'Haninge', '/' => 'Nynäshamn'],
],

];
