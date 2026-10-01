<?php
/** Group: Rum & hem. See content/services.php for the shape. */

declare(strict_types=1);

return [

'koksbelysning' => [
    'path'        => '/koksbelysning/',
    'nav'         => 'Köksbelysning & el i kök',
    'group'       => 'hem',
    'icon'        => 'pendant',
    'priority'    => '0.7',
    'title'       => 'Bänkbelysning & köksbelysning | Asplund Eltjänst',
    'description' => 'Bänkbelysning under skåp, spotlights och lampa över köksön – plus all el vid köksrenovering. Elektriker i Nynäshamn och på Södertörn, ROT-avdrag.',
    'keyword'     => 'bänkbelysning kök',
    'variants'    => ['bänkbelysning', 'köksbelysning', 'belysning kök', 'underskåpsbelysning kök', 'led belysning kök', 'belysning köksö'],
    'h1'          => 'Köksbelysning – bänkbelysning, spotlights och lampa över köksön',
    'lead'        => 'Köket är rummet där ljuset gör mest nytta. Vi installerar bänkbelysning, takbelysning och pendlar över köksön – och drar all el när du renoverar köket.',
    'card'        => 'Bänkbelysning, spotlights och el vid köksrenovering.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/koksbelysning-bankbelysning.webp', 'alt' => 'Kök med LED-bänkbelysning under överskåpen och pendellampor över köksön'],
    'includes'    => [
        'LED-bänkbelysning under överskåp, med dold driver',
        'Spotlights och takbelysning',
        'Uttag och centrering för lampor över köksö och matbord',
        'Eluttag på bänken, för spis, ugn, diskmaskin och kyl',
        'Dimmer och gruppindelning',
    ],
    'sections' => [
        [
            'h2' => 'Bänkbelysning under överskåpen',
            'p'  => [
                'Bänkbelysning är den viktigaste arbetsbelysningen i köket – den lyser där du skär och lagar mat, utan att du står i din egen skugga. En LED-list i en aluminiumprofil ger jämnt ljus utan prickar, och drivern döljs ovanpå eller inne i skåpet. Styr den med egen strömbrytare, dimmer eller rörelsesensor.',
            ],
        ],
        [
            'h2' => 'Takbelysning och lampa över köksön',
            'p'  => [
                'Allmänbelysning från [spotlights i taket](/spotlights/) kompletteras med pendlar över köksön eller matbordet. Det lönar sig att bestämma placeringen innan köket monteras, så att takuttaget hamnar exakt mitt över ön eller bordet.',
            ],
        ],
        [
            'h2' => 'El vid köksrenovering',
            'p'  => [
                'Ett nytt kök behöver ofta fler uttag på bänken, egen grupp till induktionshällen och ugnen, och uttag till diskmaskin, kyl och mikro. Vi går igenom ritningen med dig eller köksleverantören och drar elen innan skåpen monteras.',
            ],
            'checks' => [
                'Uttag för spis/häll – ofta trefas för induktion',
                'Tillräckligt många bänkuttag, gärna med USB',
                'Belysning i grupper som kan styras var för sig',
                'Förberedelse för köksfläkt och belysning i överskåp',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Vilken färgtemperatur passar i köket?', 'a' => 'Omkring 3000 K är ett bra mellanläge: tillräckligt klart för matlagning men fortfarande ombonat. Välj gärna LED med högt färgåtergivningsindex så att maten ser naturlig ut.'],
        ['q' => 'Kan jag installera bänkbelysning själv?', 'a' => 'En LED-list med stickpropp kan du ansluta själv. Fast inkoppling, nya uttag och strömbrytare ska göras av ett elinstallationsföretag.'],
        ['q' => 'Behöver induktionshällen trefas?', 'a' => 'De flesta induktionshällar ansluts på trefas för full effekt. Vi kontrollerar vad din häll kräver och drar rätt matning.'],
    ],
    'related' => ['spotlights', 'eluttag', 'belysning'],
],

'badrum' => [
    'path'        => '/badrum/',
    'nav'         => 'El i badrum',
    'group'       => 'hem',
    'icon'        => 'droplet',
    'priority'    => '0.8',
    'title'       => 'El i badrum – handdukstork, belysning & golvvärme',
    'description' => 'Elektrisk handdukstork, badrumsbelysning, spegelbelysning och golvvärme – installerat säkert enligt badrumszonerna. Elektriker i Nynäshamn.',
    'keyword'     => 'handdukstork el',
    'variants'    => ['badrumsbelysning', 'belysning badrum', 'badrumsbelysning vägg', 'badrumsbelysning tak', 'el golvvärme badrum', 'elektrisk handdukstork', 'spegelbelysning badrum'],
    'h1'          => 'El i badrummet – handdukstork, belysning och golvvärme',
    'lead'        => 'I badrummet ställer elen högre krav än någon annanstans. Vi installerar elektrisk handdukstork, badrumsbelysning och golvvärme säkert – ofta i samband med att du renoverar.',
    'card'        => 'Handdukstork, badrumsbelysning och golvvärme. Säkert i våtrum.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/projekt/bathroom.webp', 'alt' => 'Badrum där Asplund Eltjänst gjort elinstallationen'],
    'includes'    => [
        'Fast ansluten elektrisk handdukstork med timer',
        'Tak-, vägg- och spegelbelysning med rätt kapslingsklass',
        'Elektrisk golvvärme med termostat',
        'Uttag för rakapparat, tvättmaskin och torktumlare',
        'Jordfelsskydd för alla grupper i badrummet',
    ],
    'sections' => [
        [
            'h2' => 'Elektrisk handdukstork',
            'p'  => [
                'En elektrisk handdukstork håller handdukarna torra och badrummet fräscht. Fast ansluten blir den snyggast – ingen sladd, och den kan styras med timer eller kopplas till golvvärmens termostat. Placeringen ska följa badrummets säkerhetszoner.',
            ],
        ],
        [
            'h2' => 'Badrumsbelysning',
            'p'  => [
                'Kombinera jämn takbelysning, gärna [spotlights](/spotlights/), med bra ljus vid spegeln. Ljus från sidorna av spegeln ger minst skuggor i ansiktet. Alla armaturer måste ha rätt kapslingsklass för den zon de sitter i.',
            ],
        ],
        [
            'h2' => 'Golvvärme i badrummet',
            'p'  => [
                '[Elektrisk golvvärme](/golvvarme/) är det mest populära tillvalet vid badrumsrenovering. Den läggs under klinkern innan plattsättaren börjar, och styrs med en termostat med golvgivare.',
            ],
        ],
        [
            'h2' => 'Säkerhetszoner och regler',
            'p'  => [
                'Badrummet delas in i zoner beroende på avståndet till dusch och badkar. Ju närmare vattnet, desto högre krav på kapsling och placering – och vissa saker får inte sitta där alls. All elinstallation i badrum ska göras av ett elinstallationsföretag och alla grupper ska ha jordfelsskydd.',
                'Vid renovering samordnar vi med plattsättare och rörmokare så att el dras innan tätskiktet läggs.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får jag byta lampa i badrummet själv?', 'a' => 'Du får byta glödlampa och ansluta apparater med stickpropp, men fast elinstallation i badrum och andra våtutrymmen ska göras av ett elinstallationsföretag.'],
        ['q' => 'Ska handdukstorken vara fast ansluten?', 'a' => 'Det är både snyggast och säkrast. Då slipper du ett uttag nära vattnet och kan styra torken med timer.'],
        ['q' => 'När ska elektrikern komma in vid en badrumsrenovering?', 'a' => 'Två gånger: först innan väggar och golv stängs, för att dra kablar och lägga golvvärme, och sedan när plattorna är på plats för att montera belysning, handdukstork och uttag.'],
    ],
    'related' => ['golvvarme', 'spotlights', 'koksbelysning'],
],

'bastu' => [
    'path'        => '/bastu/',
    'nav'         => 'Bastu & bastuaggregat',
    'group'       => 'hem',
    'icon'        => 'flame',
    'priority'    => '0.6',
    'title'       => 'Installera bastuaggregat – el till bastun | Asplund',
    'description' => 'Vi installerar elektriska bastuaggregat och drar elen till bastun – med rätt effekt, säkring och styrning. Villa och fritidshus på Södertörn.',
    'keyword'     => 'bastuaggregat',
    'variants'    => ['bastu el', 'bastuaggregat wifi', 'infraröd bastu', 'installera bastu'],
    'h1'          => 'Bastuaggregat – vi installerar elen till din bastu',
    'lead'        => 'Ett elektriskt bastuaggregat drar mycket ström och står i en het miljö – installationen måste bli rätt. Vi hjälper dig med effekt, matning och styrning och kopplar in aggregatet säkert.',
    'card'        => 'Elektriskt bastuaggregat, matning och styrning – villa och fritidshus.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/bastuaggregat-installation.webp', 'alt' => 'Elektriskt bastuaggregat i en nybyggd bastu med träpanel'],
    'includes'    => [
        'Råd om rätt aggregateffekt för bastuns volym',
        'Ny matning och säkring från elcentralen',
        'Värmetålig kabel och korrekt placering',
        'Inkoppling av aggregat och styrpanel',
        'Belysning anpassad för bastu',
    ],
    'sections' => [
        [
            'h2' => 'Rätt effekt för bastun',
            'p'  => [
                'Aggregatets effekt väljs efter bastuns volym och hur väl den är isolerad. Glasdörrar och kalla väggar kräver mer effekt. Ett för litet aggregat tar lång tid att värma; ett för stort ger ojämn värme. Tillverkaren anger vilken volym varje aggregat passar för.',
            ],
        ],
        [
            'h2' => 'Matning och säkringar',
            'p'  => [
                'De flesta bastuaggregat ansluts på trefas och behöver en egen grupp i elcentralen. Ibland behöver centralen byggas ut eller huvudsäkringen ses över. Vi kontrollerar det innan installationen – läs mer om [elcentral](/elcentral/).',
            ],
        ],
        [
            'h2' => 'Styrning och wifi',
            'p'  => [
                'Med en modern styrpanel kan du ställa in temperatur och tid, och med wifi-styrning sätta igång bastun från mobilen på väg hem – praktiskt i fritidshuset. Se också [smarta hem](/smarta-hem/).',
            ],
        ],
        [
            'h2' => 'Bastu i fritidshus och friggebod',
            'p'  => [
                'Ska bastun stå i en egen byggnad behövs kabel i mark och ofta en liten egen elcentral. Läs om att [dra el](/dra-el/) till friggebod och attefallshus.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får jag installera bastuaggregatet själv?', 'a' => 'Nej. Bastuaggregat ansluts fast till elnätet och ska installeras av ett elinstallationsföretag.'],
        ['q' => 'Behöver bastun trefas?', 'a' => 'De flesta elektriska bastuaggregat för villa ansluts på trefas. Små aggregat finns för enfas, men de passar bara mindre bastur.'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, på arbetskostnaden för installationen i din bostad.'],
    ],
    'related' => ['elcentral', 'dra-el', 'smarta-hem'],
],

'smarta-hem' => [
    'path'        => '/smarta-hem/',
    'nav'         => 'Smarta hem',
    'group'       => 'hem',
    'icon'        => 'wifi',
    'priority'    => '0.6',
    'title'       => 'Smarta hem – smart belysning och styrning | Asplund',
    'description' => 'Styr belysning, golvvärme och laddbox från mobilen. Vi installerar smarta strömbrytare, dimmers och styrning som fungerar i vardagen.',
    'keyword'     => 'smarta hem',
    'variants'    => ['hemautomation', 'smarta hem system', 'smart belysning', 'smarta hem belysning'],
    'h1'          => 'Smarta hem – styr belysning, värme och laddning enkelt',
    'lead'        => 'Ett smart hem ska göra vardagen enklare, inte krångligare. Vi installerar smarta strömbrytare, dimmers och styrning för belysning, värme och laddning – så att allt fungerar även om internet ligger nere.',
    'card'        => 'Smart belysning, värme och laddning – styrt från mobilen.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/smarta-hem-styrning.webp', 'alt' => 'Smart strömbrytare på vägg och mobilapp som styr belysningen i ett vardagsrum'],
    'includes'    => [
        'Smarta strömbrytare och dimmers i befintliga dosor',
        'Scener och tidsstyrning för belysning',
        'Styrning av golvvärme och element',
        'Laddbox i samma app',
        'Genomgång så att hela familjen kan använda det',
    ],
    'sections' => [
        [
            'h2' => 'Smart belysning',
            'p'  => [
                'Med smarta dimmers och strömbrytare kan du tända och släcka från mobilen, skapa scener som "middag" eller "film" och låta belysningen följa solnedgången. Det fungerar fortfarande med vanliga strömbrytare på väggen – viktigt för gäster och barn.',
            ],
        ],
        [
            'h2' => 'Värme styrd efter behov och elpris',
            'p'  => [
                'Smarta termostater för [golvvärme](/golvvarme/) och element sänker temperaturen när ingen är hemma och kan styras efter timpriset på el. Det ger både komfort och lägre kostnad.',
            ],
        ],
        [
            'h2' => 'Laddbox i samma system',
            'p'  => [
                'Många [laddboxar](/elbilsladdare/) kan styras så att bilen laddas när elen är billig.',
            ],
        ],
        [
            'h2' => 'Trådlöst eller trådbundet?',
            'p'  => [
                'Trådlösa system är enklast att installera i befintliga hus. Vid nybygge eller större renovering kan ett trådbundet system vara mer robust. Vi hjälper dig välja ett system som inte låser in dig och som går att bygga ut.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Fungerar belysningen om internet ligger nere?', 'a' => 'Med rätt system ja – strömbrytarna på väggen fungerar som vanligt, och tidsstyrning kan ligga lokalt i systemet.'],
        ['q' => 'Kan jag behålla mina vanliga strömbrytare?', 'a' => 'Ofta byter vi dem mot smarta brytare i samma dosa, så att de ser ut och fungerar som vanliga brytare men också kan styras från mobilen.'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, på arbetskostnaden för den fasta installationen.'],
    ],
    'related' => ['belysning', 'golvvarme', 'elbilsladdare'],
],

];
