<?php
/**
 * Guides under /blogg/<slug>/, newest first. Each targets an informational
 * keyword group and links to the service page that sells the job.
 *
 * Shape: path, title (≤60), description, h1, date, updated, lead, keyword,
 * service (slug for the CTA + form), image, sections[] (blocks()), faq[].
 */

declare(strict_types=1);

return [

'gront-avdrag' => [
    'path'        => '/blogg/gront-avdrag/',
    'title'       => 'Grönt avdrag 2026 – så fungerar grön teknik-avdraget',
    'description' => 'Grönt avdrag 2026: 50 % för laddbox och batteri, 15 % för solceller, max 50 000 kr per person och år. Så fungerar det och så skiljer det sig från ROT.',
    'h1'          => 'Grönt avdrag 2026 – så fungerar avdraget för grön teknik',
    'date'        => '2026-10-01',
    'updated'     => '2026-10-01',
    'keyword'     => 'grön teknik avdrag',
    'service'     => 'elbilsladdare',
    'image'       => ['src' => '/assets/img/blogg/gront-avdrag.webp', 'alt' => 'Villa med solpaneler på taket och laddbox vid uppfarten'],
    'lead'        => 'Ska du installera laddbox? Då kan du få en stor del av kostnaden tillbaka direkt på fakturan genom skattereduktionen för grön teknik. Här är reglerna för 2026.',
    'sections'    => [
        [
            'h2' => 'Så mycket får du i grönt avdrag 2026',
            'list' => [
                '**Laddbox / laddpunkt för elbil:** 50 % av arbete och material.',
                '**System för lagring av egen el (batteri):** 50 % av arbete och material.',
                '**Solceller (nätanslutet solcellssystem):** 15 % av arbete och material.',
            ],
            'p'  => [
                'Avdraget är som mest 50 000 kr per person och år. Är ni två som äger bostaden och båda har betalat tillräckligt med skatt kan ni alltså få upp till 100 000 kr tillsammans.',
            ],
        ],
        [
            'h2' => 'Avdraget görs direkt på fakturan',
            'p'  => [
                'Precis som med ROT gör installationsföretaget avdraget direkt på fakturan. Du betalar din del, och företaget begär resten från Skatteverket. Du behöver alltså inte vänta på pengarna eller göra något särskilt i deklarationen – men du måste ha betalat tillräckligt med skatt under året för att avdraget ska godkännas.',
            ],
        ],
        [
            'h2' => 'Exempel: laddbox med installation',
            'p'  => [
                'Säg att laddbox och installation kostar 20 000 kr inklusive moms (ett räkneexempel, inte ett pris). Med 50 % grönt avdrag betalar du 10 000 kr, och företaget begär de andra 10 000 kr från Skatteverket. För solceller med samma totalbelopp hade avdraget i stället blivit 3 000 kr.',
            ],
            'note' => 'Räkneexemplet visar hur avdraget fungerar. Ditt pris får du i offerten – [begär offert på laddbox](/boka/?tjanst=elbilsladdare).',
        ],
        [
            'h2' => 'Grönt avdrag eller ROT?',
            'p'  => [
                'Du kan inte få både ROT och grönt avdrag för samma kostnad. För laddbox, solceller och batteri är grönt avdrag nästan alltid bättre eftersom det gäller både arbete och material, medan ROT bara gäller arbetskostnaden (30 %).',
                'Övrigt elarbete – som att [byta elcentral](/elcentral/), installera [luftvärmepump](/luftvarmepump/) eller ny belysning – ger i stället ROT-avdrag. Läs mer på vår sida om [priser och avdrag](/priser/).',
            ],
        ],
        [
            'h2' => 'Villkor att känna till',
            'checks' => [
                'Installationen ska göras i eller i anslutning till en bostad som du äger – villa, fritidshus, ägarlägenhet eller bostadsrätt',
                'Avdraget gäller privatpersoner – inte företag eller bostadsrättsföreningens gemensamma installationer',
                'Arbetet ska utföras av ett företag med F-skatt',
                'Du behöver ha betalat tillräckligt med skatt under året',
                'Ett batteri ska lagra el från din egen produktion för att ge avdrag',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Kan jag få grönt avdrag för laddbox i en bostadsrätt?', 'a' => 'Ja, om laddboxen installeras i anslutning till din bostad och du själv betalar. Gemensamma laddplatser som föreningen beställer omfattas inte.'],
        ['q' => 'Gäller grönt avdrag för solceller på fritidshuset?', 'a' => 'Ja, avdraget kan gälla även för ett fritidshus som du äger.'],
        ['q' => 'Hur mycket grönt avdrag kan jag få per år?', 'a' => 'Upp till 50 000 kr per person och år.'],
        ['q' => 'Var hittar jag de officiella reglerna?', 'a' => 'På [Skatteverkets webbplats](https://www.skatteverket.se/) under skattereduktion för grön teknik.'],
    ],
],

'vad-kostar-laddbox' => [
    'path'        => '/blogg/vad-kostar-laddbox/',
    'title'       => 'Vad kostar det att installera laddbox? Guide 2026',
    'description' => 'Vad påverkar priset när du installerar laddbox hemma? Laddboxen, kabeldragning, elcentral och grävning – och hur 50 % grönt avdrag halverar kostnaden.',
    'h1'          => 'Vad kostar det att installera en laddbox?',
    'date'        => '2026-09-28',
    'updated'     => '2026-10-01',
    'keyword'     => 'installera laddbox pris',
    'service'     => 'elbilsladdare',
    'image'       => ['src' => '/assets/img/blogg/vad-kostar-laddbox.webp', 'alt' => 'Elbil som laddas från en laddbox i ett garage'],
    'lead'        => 'Kostnaden för en laddbox med installation varierar mer än många tror. Två grannar med samma laddbox kan få helt olika priser – det beror nästan alltid på installationen, inte på boxen. Så här hänger det ihop.',
    'sections'    => [
        [
            'h2' => 'Det här påverkar priset mest',
            'h3s' => [
                ['h3' => '1. Avståndet från elcentralen', 'p' => ['Sitter elcentralen i garaget och laddboxen ska upp på samma vägg blir installationen enkel. Ska kabeln dras genom huset, upp på vinden och ut på andra sidan tar det längre tid och kräver mer material.']],
                ['h3' => '2. Inomhus, utanpåliggande eller i mark', 'p' => ['Kan kabeln dras inomhus eller i kanal längs fasaden är det billigast. Står bilen en bit från huset behövs kabel i mark och ofta en [laddstolpe](/elbilsladdare/) – då tillkommer grävning.']],
                ['h3' => '3. Elcentralen och huvudsäkringen', 'p' => ['Laddboxen behöver en egen grupp och rätt jordfelsskydd. Finns det plats i centralen är det enkelt; är centralen full eller gammal kan den behöva byggas ut eller [bytas](/elcentral/).']],
                ['h3' => '4. Själva laddboxen', 'p' => ['Laddboxar skiljer sig i effekt, lastbalansering, app-styrning och om kabeln sitter fast eller inte. En box med lastbalansering kan spara pengar genom att du slipper höja huvudsäkringen.']],
            ],
        ],
        [
            'h2' => 'Grönt avdrag halverar kostnaden',
            'p'  => [
                'Laddbox i bostaden ger **50 % grönt avdrag på både arbete och material**, upp till 50 000 kr per person och år. Avdraget dras direkt på fakturan. Har du en installation för 20 000 kr betalar du alltså 10 000 kr. Läs mer i vår guide om [grönt avdrag](/blogg/gront-avdrag/).',
            ],
        ],
        [
            'h2' => 'Så får du ett exakt pris',
            'p'  => [
                'Det snabbaste sättet är att skicka bilder på elcentralen och platsen där bilen står, och berätta ungefär hur kabeln kan gå. Då kan vi ofta lämna ett fast pris utan hembesök.',
            ],
            'checks' => [
                'Bild på elcentralen (med luckan öppen)',
                'Bild på platsen där laddboxen ska sitta',
                'Huvudsäkringens storlek (står på elräkningen)',
                'Vilken bil du har eller ska köpa',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Behöver jag höja huvudsäkringen för att installera laddbox?', 'a' => 'Oftast inte, särskilt inte med en laddbox som har lastbalansering. Vi kontrollerar det innan vi lämnar pris.'],
        ['q' => 'Finns det bidrag för laddbox?', 'a' => 'För privatpersoner är det grönt avdrag som gäller: 50 % av arbete och material. Föreningar och företag kan ibland söka andra stöd.'],
        ['q' => 'Hur lång tid tar installationen?', 'a' => 'Några timmar upp till en dag för en vanlig villa. Med grävning till laddstolpe tar det längre.'],
    ],
],

'fa-man-dra-el-sjalv' => [
    'path'        => '/blogg/fa-man-dra-el-sjalv/',
    'title'       => 'Får man dra el själv? Det här säger reglerna',
    'description' => 'Vilka elarbeten får du göra själv, och vilka kräver elektriker? Elsäkerhetsverkets regler förklarade – plus vad som händer om du gör fel.',
    'h1'          => 'Får man dra el själv? Det här får du – och inte – göra',
    'date'        => '2026-09-24',
    'updated'     => '2026-10-01',
    'keyword'     => 'dra el själv',
    'service'     => 'dra-el',
    'image'       => ['src' => '/assets/img/blogg/fa-man-dra-el-sjalv.webp', 'alt' => 'Händer som byter ett vägguttag med skruvmejsel'],
    'lead'        => 'Svaret är kort: nej, du får inte dra ny el själv. Men det finns en del enklare elarbeten som du som privatperson får göra – om du har kunskapen. Här går vi igenom Elsäkerhetsverkets regler.',
    'sections'    => [
        [
            'h2' => 'Det här får du göra själv',
            'p'  => ['Enligt Elsäkerhetsverket får du som privatperson utföra vissa enklare elarbeten, under förutsättning att du vet hur det ska göras:'],
            'checks' => [
                'Byta en trasig propp och återställa en utlöst automatsäkring',
                'Byta glödlampor och lamphållare',
                'Montera skarvsladdar, strömbrytare och stickproppar på sladdar',
                'Laga eller byta skadade delar på skarv- och apparatsladdar',
                'Byta en befintlig strömbrytare eller ett vägguttag (högst 16 A) som sitter i en egen dosa',
            ],
        ],
        [
            'h2' => 'Det här får du inte göra själv',
            'list' => [
                'Dra nya kablar eller [dra om el](/dra-el/) i huset',
                'Installera nya eller flytta befintliga [eluttag och strömbrytare](/eluttag/)',
                'Byta ett ojordat uttag mot ett jordat',
                'Göra ändringar i [elcentralen](/elcentral/)',
                'Installera eller byta elektrisk [golvvärme](/golvvarme/)',
                'Förlägga kabel i mark',
                'Elarbeten i [badrum](/badrum/) och andra våtutrymmen',
            ],
        ],
        [
            'h2' => 'Varför reglerna finns',
            'p'  => [
                'Ett felkopplat uttag kan fungera i åratal innan det orsakar en brand eller en elolycka – ofta för någon annan än den som gjorde felet. Därför ska fasta elinstallationer göras av ett registrerat elinstallationsföretag som har kunskapen, mäter installationen och ansvarar för den.',
            ],
        ],
        [
            'h2' => 'Vad händer om man drar el själv?',
            'p'  => [
                'Att utföra elinstallationsarbete utan att få göra det är straffbart enligt elsäkerhetslagen. Ännu viktigare i praktiken: orsakar en egen installation en brand kan försäkringsbolaget sätta ner eller neka ersättningen. Och när du säljer huset kan felaktig el bli en dyr fråga.',
            ],
        ],
        [
            'h2' => 'Spara pengar på rätt sätt',
            'p'  => [
                'Du kan ofta göra en hel del av förarbetet själv – till exempel öppna väggar, gräva diket för markkabel och måla efteråt – och låta oss göra själva elarbetet. Samla gärna flera jobb till ett besök. Och glöm inte att ROT-avdraget sänker arbetskostnaden med 30 %.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får jag sätta upp en taklampa själv?', 'a' => 'Du får byta lamphållare och ansluta lampor via stickpropp. Ny fast installation av ljuspunkter ska göras av ett elinstallationsföretag.'],
        ['q' => 'Får jag byta ett vägguttag själv?', 'a' => 'Ja, om det är ett befintligt uttag för högst 16 A som sitter i en egen dosa, och du byter till samma typ. Ojordat till jordat får du inte byta själv.'],
        ['q' => 'Var finns de officiella reglerna?', 'a' => 'Hos [Elsäkerhetsverket](https://www.elsakerhetsverket.se/privatpersoner/detta-far-du-gora-sjalv-med-el/).'],
    ],
],

'byta-proppskap-till-automatsakringar' => [
    'path'        => '/blogg/byta-proppskap-till-automatsakringar/',
    'title'       => 'Byta proppskåp till automatsäkringar – så går det till',
    'description' => 'Dags att byta proppskåpet mot en elcentral med automatsäkringar? Tecken på att det är dags, vad bytet innebär och vad som påverkar kostnaden.',
    'h1'          => 'Byta proppskåp till automatsäkringar – så går det till',
    'date'        => '2026-09-20',
    'updated'     => '2026-10-01',
    'keyword'     => 'byta proppskåp till automatsäkringar',
    'service'     => 'elcentral',
    'image'       => ['src' => '/assets/img/blogg/byta-proppskap.webp', 'alt' => 'Gammalt proppskåp med skruvsäkringar bredvid en ny elcentral'],
    'lead'        => 'Det gamla proppskåpet med skruvsäkringar har gjort sitt jobb i årtionden. Men ska du skaffa laddbox, värmepump eller bara slippa leta proppar i mörkret är det dags för en modern elcentral.',
    'sections'    => [
        [
            'h2' => 'Tecken på att det är dags',
            'checks' => [
                'Du har porslinssäkringar och letar proppar när något löser ut',
                'Det finns ingen jordfelsbrytare',
                'Säkringar går ofta eller skåpet känns varmt',
                'Du planerar laddbox, värmepump eller bastu',
                'Försäkringsbolaget eller en besiktning har anmärkt',
            ],
        ],
        [
            'h2' => 'Vad händer vid ett byte?',
            'list' => [
                'Vi går igenom husets grupper och vad som ska finnas i den nya centralen.',
                'Strömmen bryts – oftast några timmar.',
                'Det gamla skåpet demonteras och den nya centralen monteras med automatsäkringar och [jordfelsbrytare](/jordfelsbrytare/).',
                'Alla grupper kopplas in, märks och mäts.',
                'Du får en ny gruppförteckning och genomgång.',
            ],
        ],
        [
            'h2' => 'Vad påverkar kostnaden?',
            'p'  => [
                'Antalet grupper, hur många jordfelsbrytare som behövs, om du vill ha [överspänningsskydd](/elcentral/#overspanningsskydd) och om centralen ska flyttas. Ibland behöver även mätartavlan åtgärdas i samråd med nätbolaget. ROT-avdraget på 30 % gäller arbetskostnaden.',
                'Läs mer och begär pris på sidan om att [byta elcentral](/elcentral/).',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Hur lång tid tar det att byta proppskåp?', 'a' => 'Oftast en arbetsdag i en vanlig villa.'],
        ['q' => 'Måste jag byta proppskåpet?', 'a' => 'Det finns inget krav på att byta en fungerande äldre central, men jordfelsbrytare rekommenderas starkt och många behöver mer plats för nya grupper.'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, 30 % på arbetskostnaden.'],
    ],
],

];
