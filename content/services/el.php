<?php
/** Group: El & säkerhet. See content/services.php for the shape. */

declare(strict_types=1);

return [

'elcentral' => [
    'path'        => '/elcentral/',
    'nav'         => 'Elcentral & proppskåp',
    'group'       => 'el',
    'icon'        => 'panel',
    'priority'    => '0.8',
    'title'       => 'Byta elcentral & proppskåp – pris | Asplund Eltjänst',
    'description' => 'Byt gammalt proppskåp mot en modern elcentral med automatsäkringar, jordfelsbrytare och överspänningsskydd. Fast pris och ROT-avdrag.',
    'keyword'     => 'elcentral',
    'variants'    => ['proppskåp', 'säkringsskåp', 'byta elcentral', 'byta elcentral pris', 'byta proppskåp till automatsäkringar', 'överspänningsskydd', 'gruppförteckning elcentral'],
    'h1'          => 'Byta elcentral – från gammalt proppskåp till modern central',
    'lead'        => 'En modern elcentral med automatsäkringar och jordfelsbrytare gör huset säkrare och har plats för laddbox, värmepump och solceller. Vi byter elcentralen på en dag i de flesta villor.',
    'card'        => 'Automatsäkringar, jordfelsbrytare och plats för laddbox och värmepump.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/elcentral-automatsakringar.webp', 'alt' => 'Ny elcentral med automatsäkringar och jordfelsbrytare i en villa'],
    'includes'    => [
        'Ny elcentral med automatsäkringar',
        'Jordfelsbrytare för husets grupper',
        'Överspänningsskydd om du vill skydda elektroniken',
        'Märkning och ny gruppförteckning',
        'Kontroll och mätning innan strömmen slås på',
        'Kontakt med nätbolaget när det behövs',
    ],
    'sections' => [
        [
            'h2' => 'När behöver elcentralen bytas?',
            'checks' => [
                'Du har ett gammalt proppskåp med skruvsäkringar i porslin',
                'Det saknas jordfelsbrytare',
                'Säkringarna går ofta eller elcentralen blir varm',
                'Det finns ingen plats för nya grupper till laddbox, värmepump eller bastu',
                'Du ska renovera eller bygga ut och dra om elen',
                'En elkontroll eller försäkringsbolaget har anmärkt på centralen',
            ],
        ],
        [
            'h2' => 'Från proppar till automatsäkringar',
            'p'  => [
                'Med automatsäkringar slipper du leta proppar när något löser ut – du fäller bara upp spaken igen. Samtidigt passar bytet perfekt för att installera [jordfelsbrytare](/jordfelsbrytare/), som skyddar mot elolyckor och brand, och för att förbereda för framtida behov som [laddbox](/elbilsladdare/).',
            ],
        ],
        [
            'h2' => 'Vad kostar det att byta elcentral?',
            'p'  => [
                'Priset beror på hur många grupper huset har, hur många jordfelsbrytare som behövs, om du vill ha överspänningsskydd och om centralen ska flyttas. Ibland behöver även mätartavlan eller huvudledningen åtgärdas, och då kopplar vi in nätbolaget.',
                'Du får ett fast pris efter att vi har tittat på din befintliga central, och ROT-avdraget på 30 % dras direkt på arbetskostnaden.',
            ],
        ],
        [
            'h2' => 'Överspänningsskydd',
            'id' => 'overspanningsskydd',
            'p'  => [
                'Ett överspänningsskydd i elcentralen skyddar husets elektronik mot spänningstoppar, till exempel vid åska eller fel i elnätet. Det är särskilt värdefullt om du har dyr elektronik, värmepump, solceller eller bor på landet med luftledningar. Det monteras enklast i samband med ett centralbyte.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Hur lång tid tar det att byta elcentral?', 'a' => 'I en vanlig villa tar bytet oftast en arbetsdag. Huset är strömlöst under några timmar medan själva bytet görs.'],
        ['q' => 'Är det krav på jordfelsbrytare?', 'a' => 'I nya elinstallationer i bostäder krävs jordfelsbrytare. Äldre installationer behöver inte byggas om, men jordfelsbrytare är det enskilt viktigaste skyddet mot elolyckor och rekommenderas starkt.'],
        ['q' => 'Får jag byta säkringar själv?', 'a' => 'Ja, du får byta en trasig propp och återställa en utlöst automatsäkring. Allt arbete inne i elcentralen ska däremot göras av ett elinstallationsföretag.'],
        ['q' => 'Får jag ROT-avdrag för ny elcentral?', 'a' => 'Ja, ROT-avdraget på 30 % gäller arbetskostnaden.'],
    ],
    'related' => ['jordfelsbrytare', 'elbilsladdare', 'elbesiktning'],
],

'jordfelsbrytare' => [
    'path'        => '/jordfelsbrytare/',
    'nav'         => 'Jordfelsbrytare',
    'group'       => 'el',
    'icon'        => 'shield',
    'priority'    => '0.8',
    'title'       => 'Jordfelsbrytare – installation & krav | Asplund Eltjänst',
    'description' => 'Jordfelsbrytaren skyddar mot elolyckor och brand. Vi installerar jordfelsbrytare i elcentralen, i villa och fritidshus på Södertörn. ROT-avdrag.',
    'keyword'     => 'jordfelsbrytare',
    'variants'    => ['elcentral med jordfelsbrytare', 'portabel jordfelsbrytare', 'jordfelsbrytare vägguttag', 'jordfelsbrytare typ b'],
    'h1'          => 'Installera jordfelsbrytare – hemmets viktigaste elskydd',
    'lead'        => 'En jordfelsbrytare bryter strömmen på bråkdelen av en sekund om något är fel – innan det hinner bli en olycka. Saknar ditt hus jordfelsbrytare installerar vi den i elcentralen, ofta på bara några timmar.',
    'card'        => 'Skydd mot elolyckor och brand. Installeras i elcentralen.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/jordfelsbrytare-elcentral.webp', 'alt' => 'Jordfelsbrytare monterad i en elcentral'],
    'includes'    => [
        'Kontroll av befintlig elcentral',
        'Installation av jordfelsbrytare på husets grupper',
        'Rätt typ för laddbox, värmepump och solceller',
        'Funktionstest och mätning',
        'Felsökning om den löser ut efter installationen',
    ],
    'sections' => [
        [
            'h2' => 'Vad gör en jordfelsbrytare?',
            'p'  => [
                'Jordfelsbrytaren jämför strömmen som går ut i en krets med strömmen som kommer tillbaka. Om en del av strömmen läcker – genom en trasig apparat, fukt eller en människa – bryter den direkt. En jordfelsbrytare för personskydd löser ut redan vid 30 milliampere.',
                'Den skyddar alltså både mot elchock och mot bränder som börjar med en läckström.',
            ],
        ],
        [
            'h2' => 'Är jordfelsbrytare krav?',
            'p'  => [
                'I nya elinstallationer i bostäder krävs jordfelsbrytare. Har du ett äldre hus finns inget krav på att bygga om, men Elsäkerhetsverket och försäkringsbolagen rekommenderar jordfelsbrytare starkt – det är den enskilt viktigaste säkerhetsåtgärden du kan göra för elen i hemmet.',
                'Har du gamla proppar och ingen plats i centralen är det ofta smartast att [byta elcentral](/elcentral/) samtidigt.',
            ],
        ],
        [
            'h2' => 'Rätt typ för laddbox och solceller',
            'p'  => [
                'Laddboxar, vissa värmepumpar och solcellsanläggningar kan ge upphov till likström som en vanlig jordfelsbrytare inte känner av. Därför krävs ibland en jordfelsbrytare av typ B, eller en laddbox med inbyggt likströmsskydd. Vi väljer rätt skydd för din installation.',
            ],
        ],
        [
            'h2' => 'Portabel jordfelsbrytare',
            'p'  => [
                'En portabel jordfelsbrytare sätts mellan vägguttaget och till exempel ett elverktyg eller en högtryckstvätt. Den är ett bra tillfälligt skydd, men ersätter inte en fast jordfelsbrytare i elcentralen.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Jordfelsbrytaren löser ut – vad ska jag göra?', 'a' => 'Börja med att dra ur apparater och slå på jordfelsbrytaren igen för att hitta felet. Vi har en steg-för-steg-guide på sidan om [felsökning av elfel](/felsokning/). Löser den ut direkt igen, ring oss.'],
        ['q' => 'Hur ofta ska jag testa jordfelsbrytaren?', 'a' => 'Tryck på testknappen några gånger om året. Den ska lösa ut direkt – gör den inte det behöver den bytas.'],
        ['q' => 'Vad kostar det att installera jordfelsbrytare?', 'a' => 'Det beror på hur många grupper som ska skyddas och om det finns plats i elcentralen. Du får ett fast pris innan vi börjar, och ROT-avdrag på arbetskostnaden.'],
        ['q' => 'Räcker en jordfelsbrytare för hela huset?', 'a' => 'Det fungerar, men med en enda jordfelsbrytare blir hela huset strömlöst när den löser ut. Med flera jordfelsbrytare, eller personskyddsautomater per grupp, påverkas bara den del där felet finns.'],
    ],
    'related' => ['felsokning', 'elcentral', 'elbesiktning'],
],

'felsokning' => [
    'path'        => '/felsokning/',
    'nav'         => 'Felsökning & elfel',
    'group'       => 'el',
    'icon'        => 'search',
    'priority'    => '0.8',
    'title'       => 'Jordfelsbrytaren löser ut? Vi felsöker elfel',
    'description' => 'Löser jordfelsbrytaren ut, blinkar lamporna eller har ett uttag slutat fungera? Så felsöker du själv – och när du ska ringa en elektriker.',
    'keyword'     => 'jordfelsbrytare löser ut',
    'variants'    => ['elfel', 'blinkande lampor elfel', 'jordfelsbrytare löser ut utan belastning', 'felsökning el', 'säkringen går'],
    'h1'          => 'Felsökning av elfel – när jordfelsbrytaren löser ut',
    'lead'        => 'Jordfelsbrytaren som slår ifrån, säkringar som går eller lampor som blinkar – elfel är irriterande och ibland farliga. Här är vad du kan kontrollera själv, och när det är dags att ringa oss.',
    'card'        => 'Jordfelsbrytare som löser ut, säkringar som går, blinkande lampor.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/felsokning-elfel.webp', 'alt' => 'Elektriker mäter med instrument vid en elcentral under felsökning'],
    'includes'    => [
        'Felsökning med mätinstrument, grupp för grupp',
        'Isolationsmätning för att hitta dolda fel i kablar',
        'Åtgärd på plats när det går',
        'Tydligt besked om vad som var fel och vad som har gjorts',
    ],
    'sections' => [
        [
            'h2' => 'Vanliga orsaker när jordfelsbrytaren löser ut',
            'list' => [
                '**En trasig apparat** – vattenkokare, diskmaskin, tvättmaskin, kyl eller ett element är vanliga syndare.',
                '**Fukt** – i ett utomhusuttag, en utebelysning eller en kopplingsdosa efter regn eller snösmältning.',
                '**Skadad kabel** – en spik i väggen, en gnagare eller en kabel som skavts sönder.',
                '**Många små läckströmmar** – flera apparater som var för sig är okej men tillsammans når gränsen.',
                '**Åska och spänningstoppar** – kan få jordfelsbrytaren att lösa ut utan att något är trasigt.',
            ],
        ],
        [
            'h2' => 'Så felsöker du själv – steg för steg',
            'list' => [
                'Dra ur alla apparater på den del av huset som blev strömlös.',
                'Slå på jordfelsbrytaren igen.',
                'Koppla in en apparat i taget. Löser den ut när en viss apparat ansluts har du hittat felet.',
                'Löser den ut även när allt är urkopplat sitter felet troligen i den fasta installationen – kontrollera utebelysning och utomhusuttag efter fukt.',
                'Löser den fortfarande ut, eller har du inte jordfelsbrytare på alla grupper? Ring oss.',
            ],
            'note' => 'Öppna aldrig elcentral, kopplingsdosor eller uttag själv. Arbete i den fasta installationen ska göras av ett elinstallationsföretag.',
        ],
        [
            'h2' => 'Blinkande lampor och andra elfel',
            'p'  => [
                'Lampor som blinkar eller lyser svagare när något annat slås på kan bero på en glappkontakt, en dimmer som inte passar LED-lampan – eller i värsta fall ett nollfel. Ett nollfel kan ge för hög spänning i delar av huset och förstöra elektronik.',
            ],
            'checks' => [
                'Ring direkt om lampor blir starkare eller svagare när andra apparater slås på',
                'Ring direkt om ett uttag eller en strömbrytare är varm, luktar bränt eller gnistrar',
                'Ring direkt om du får stötar från en apparat, kran eller badkar',
            ],
        ],
        [
            'h2' => 'Så felsöker vi',
            'p'  => [
                'Vi går systematiskt igenom installationen grupp för grupp och mäter isolationen i kablarna. På så sätt hittar vi också fel som inte syns. När felet är hittat åtgärdar vi det på plats om det går, och du får ett tydligt besked om vad som var fel.',
                'Saknar huset jordfelsbrytare eller är centralen gammal, föreslår vi hur det kan åtgärdas – läs mer om [jordfelsbrytare](/jordfelsbrytare/) och att [byta elcentral](/elcentral/).',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Varför löser jordfelsbrytaren ut utan att något är påslaget?', 'a' => 'Då sitter felet oftast i den fasta installationen – fukt i ett utomhusuttag eller en utebelysning, eller en skadad kabel. Det behöver felsökas med mätinstrument.'],
        ['q' => 'Varför blinkar lamporna?', 'a' => 'Vanligast är en dimmer eller transformator som inte passar LED-lampan, eller en glappkontakt. Blinkar flera lampor samtidigt, eller ändras ljuset när andra apparater slås på, kan det vara ett nollfel – ring en elektriker direkt.'],
        ['q' => 'Kan jag byta en säkring själv?', 'a' => 'Ja. Du får byta en trasig propp och återställa en automatsäkring. Går den direkt igen finns ett fel som behöver felsökas.'],
        ['q' => 'Vad kostar felsökning?', 'a' => 'Felsökning debiteras på löpande räkning eftersom det är svårt att veta i förväg hur lång tid det tar. ROT-avdraget på 30 % dras på arbetskostnaden.'],
    ],
    'related' => ['jordfelsbrytare', 'elcentral', 'elbesiktning'],
],

'eljour' => [
    'path'        => '/eljour/',
    'nav'         => 'Eljour & akuta elfel',
    'group'       => 'el',
    'icon'        => 'bolt',
    'priority'    => '0.8',
    'title'       => 'Eljour – akut elektriker i Nynäshamn | Asplund',
    'description' => 'Akut elfel? Strömlöst, jordfelsbrytaren löser ut eller det luktar bränt? Så agerar du först – och ring behörig elektriker i Nynäshamn för hjälp.',
    'keyword'     => 'eljour',
    'variants'    => ['elektriker jour', 'jour elektriker', 'akut elektriker', 'elektriker akut', 'elfel akut', 'jourelektriker'],
    'h1'          => 'Eljour – akut elektriker vid elfel',
    'lead'        => 'Strömlöst, jordfelsbrytaren löser ut igen eller det luktar bränt från ett uttag? Här är vad du gör först – och när du ska ringa en elektriker direkt.',
    'card'        => 'Strömlöst, jordfelsbrytare som löser ut, bränd lukt eller varma uttag.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/eljour-akut-elfel.webp', 'alt' => 'Elektriker med ficklampa vid en elcentral en kväll vid akut elfel'],
    'includes'    => [
        'Felsökning med mätinstrument, grupp för grupp',
        'Åtgärd på plats när det går',
        'Tydligt besked om vad som var fel och vad som har gjorts',
        'Förslag på att åtgärda orsaken, till exempel ny elcentral eller jordfelsbrytare',
    ],
    'sections' => [
        [
            'h2' => 'Gör det här först vid ett akut elfel',
            'list' => [
                '**Brand, rök eller elolycka:** ring 112 först. Ring inte en elektriker i ett akut läge där liv eller egendom är i fara.',
                '**Bränd lukt eller ett varmt uttag:** stäng av strömmen till gruppen i elcentralen, rör inte uttaget och ring en elektriker.',
                '**Strömlöst i hela huset:** titta efter om grannarna också har strömavbrott. Då är det ett fel i elnätet och ditt elnätsbolag är rätt kontakt.',
                '**Bara en del av huset är strömlöst:** kontrollera jordfelsbrytare och säkringar i elcentralen. Löser de ut igen direkt finns ett fel som behöver felsökas.',
                '**Fuktskada eller vatten vid el:** gå inte nära, stäng av strömmen om du kan göra det säkert och ring en elektriker.',
            ],
            'note' => 'Öppna aldrig elcentral, kopplingsdosor eller uttag själv. Arbete i den fasta installationen ska göras av ett elinstallationsföretag.',
        ],
        [
            'h2' => 'Ring en elektriker direkt om…',
            'checks' => [
                'ett uttag, en strömbrytare eller en kabel är varm, luktar bränt eller gnistrar',
                'jordfelsbrytaren löser ut igen så fort du slår på den, utan att något är inkopplat',
                'lampor blir starkare eller svagare när andra apparater slås på – det kan vara ett nollfel',
                'du får stötar från en apparat, kran eller badkar',
                'det finns synlig skada på elcentral, kabel eller mätare efter åska, vatten eller brand',
            ],
        ],
        [
            'h2' => 'Så hjälper vi vid elfel',
            'p'  => [
                'Ring oss på ' . site('phone') . ' så får du besked direkt om när vi kan komma. Vi arbetar ' . mb_strtolower(site('hoursText')) . ' och utgår från Nynäshamn, med jobb i hela Södertörn.',
                'På plats felsöker vi systematiskt grupp för grupp och mäter isolationen i kablarna, så att vi hittar även fel som inte syns. Går felet att åtgärda direkt gör vi det, och du får ett tydligt besked om vad som var fel. Är installationen gammal föreslår vi hur den kan göras säker – läs mer om [jordfelsbrytare](/jordfelsbrytare/) och att [byta elcentral](/elcentral/).',
            ],
        ],
        [
            'h2' => 'Förebygg nästa elfel',
            'p'  => [
                'Många akuta elfel går att undvika. Testa jordfelsbrytaren några gånger om året, byt gamla proppskåp mot modern elcentral och lägg överspänningsskydd i centralen om du bor med luftledning. Du kan också boka en [elbesiktning](/elbesiktning/) för att få veta skicket på installationen innan något går fel.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Vad gör jag om det är strömlöst i hela huset?', 'a' => 'Kolla först om grannarna också saknar ström – då är det ett fel i elnätet och du kontaktar ditt elnätsbolag. Är det bara ditt hus, kontrollera jordfelsbrytare och säkringar i elcentralen. Löser de ut igen ska en elektriker felsöka.'],
        ['q' => 'Är det farligt när jordfelsbrytaren löser ut?', 'a' => 'Jordfelsbrytaren löser ut för att skydda dig, så själva utlösningen är ingen fara. Löser den ut om och om igen finns ett fel som behöver felsökas – dra ur apparater en i taget för att se om en av dem är orsaken.'],
        ['q' => 'Vad kostar det när ni felsöker ett akut elfel?', 'a' => 'Felsökning debiteras på löpande räkning eftersom det är svårt att veta i förväg hur lång tid det tar. Fråga oss om pris när du ringer. ROT-avdraget på 30 % dras på arbetskostnaden.'],
        ['q' => 'Vilka öppettider har ni?', 'a' => 'Vi arbetar ' . mb_strtolower(site('hoursText')) . '. Är det fara för liv eller brand ringer du 112 oavsett tid.'],
    ],
    'related' => ['felsokning', 'jordfelsbrytare', 'elcentral'],
],

'eluttag' => [
    'path'        => '/eluttag/',
    'nav'         => 'Eluttag & strömbrytare',
    'group'       => 'el',
    'icon'        => 'outlet',
    'priority'    => '0.7',
    'title'       => 'Eluttag & vägguttag – installation | Asplund Eltjänst',
    'description' => 'Fler eller flyttade eluttag, uttag utomhus, strömbrytare och dimmers – installerat av behörig elektriker i Nynäshamn och på Södertörn. ROT-avdrag.',
    'keyword'     => 'eluttag',
    'variants'    => ['vägguttag', 'eluttag utomhus', 'utanpåliggande eluttag', 'jordat uttag', 'strömbrytare', 'dimmer', 'led dimmer', 'dimmer strömbrytare'],
    'h1'          => 'Nya eluttag, strömbrytare och dimmers',
    'lead'        => 'För få uttag, sladdar överallt eller en strömbrytare på fel ställe? Vi installerar nya och flyttar befintliga eluttag, sätter uttag utomhus och byter till dimmers som fungerar med LED.',
    'card'        => 'Fler och flyttade uttag, utomhusuttag, strömbrytare och dimmers.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/eluttag-vagguttag.webp', 'alt' => 'Nytt dubbelt vägguttag monterat i ett vardagsrum'],
    'includes'    => [
        'Nya vägguttag, infällda eller utanpåliggande',
        'Flytt av befintliga uttag och strömbrytare',
        'Eluttag utomhus med rätt kapslingsklass',
        'Dimmers och smarta strömbrytare',
        'Kontroll av jordning och jordfelsskydd',
    ],
    'sections' => [
        [
            'h2' => 'Fler eller flyttade vägguttag',
            'p'  => [
                'Många hus har för få uttag för hur vi lever i dag. Grenuttag och skarvsladdar är både fula och en brandrisk om de överbelastas. Vi installerar nya uttag där du behöver dem – vid tv:n, sängen, köksbänken eller skrivbordet – infällda i väggen eller utanpåliggande i snygg kanal när infällt inte går.',
            ],
        ],
        [
            'h2' => 'Eluttag utomhus',
            'p'  => [
                'Ett utomhusuttag för grästrimmer, högtryckstvätt, julbelysning eller motorvärmare ska vara av rätt kapslingsklass och skyddas av jordfelsbrytare. Vill du styra belysning eller motorvärmare kan uttaget kompletteras med timer eller smart styrning.',
                'Ska elen ut i trädgården, till garaget eller en friggebod? Läs om [att dra el](/dra-el/) och om [trädgårdsbelysning](/tradgardsbelysning/).',
            ],
        ],
        [
            'h2' => 'Strömbrytare och dimmer',
            'p'  => [
                'En dimmer som inte är gjord för LED kan få lamporna att flimra, surra eller inte dimra ner ordentligt. Vi installerar dimmers som passar dina lampor, trappkopplingar där du vill tända och släcka från två håll, och smarta strömbrytare som kan styras från mobilen.',
            ],
        ],
        [
            'h2' => 'Från ojordat till jordat uttag',
            'p'  => [
                'I äldre hus finns ofta ojordade uttag. Du kan inte bara byta till ett jordat uttag – det krävs en skyddsledare hela vägen från elcentralen, annars ger det falsk trygghet. Vi kontrollerar installationen och drar ny kabel där det behövs.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får jag byta eluttag själv?', 'a' => 'Du får byta ut ett befintligt vägguttag eller en strömbrytare (högst 16 A) som sitter i en egen dosa. Att installera nya, flytta uttag eller byta ojordat mot jordat får du inte göra själv. Läs mer i vår guide [Får man dra el själv?](/blogg/fa-man-dra-el-sjalv/)'],
        ['q' => 'Vad kostar det att installera ett nytt eluttag?', 'a' => 'Det beror främst på hur kabeln kan dras från närmaste uttag eller från elcentralen. Ofta blir det billigare per uttag om flera görs samtidigt. Du får ett fast pris och ROT-avdrag.'],
        ['q' => 'Kan jag få USB-uttag?', 'a' => 'Ja, det finns vägguttag med inbyggda USB-laddare som passar bra vid sängen, köksbänken och skrivbordet.'],
        ['q' => 'Varför flimrar mina LED-lampor när jag dimrar?', 'a' => 'Oftast är dimmern inte anpassad för LED, eller så är lamporna inte dimbara. Vi byter till en dimmer som passar.'],
    ],
    'related' => ['dra-el', 'smarta-hem', 'elcentral'],
],

'dra-el' => [
    'path'        => '/dra-el/',
    'nav'         => 'Dra el & kabeldragning',
    'group'       => 'el',
    'icon'        => 'cable',
    'priority'    => '0.6',
    'title'       => 'Dra el och kabeldragning | Asplund Eltjänst',
    'description' => 'Vi drar el vid renovering, tillbyggnad och nybygge – och till garage, friggebod och attefallshus. Behörig elektriker på Södertörn, ROT-avdrag.',
    'keyword'     => 'kabeldragning',
    'variants'    => ['dra el', 'dra el i vägg', 'dra om el i hus', 'dra om el i hus kostnad', 'dra el utomhus', 'dra el till friggebod'],
    'h1'          => 'Dra el – vid renovering, tillbyggnad och nybygge',
    'lead'        => 'Ska du renovera, bygga ut eller få el till garaget? Vi drar ny el och byter gammal – planerat tillsammans med dig och dina andra hantverkare så att allt hamnar rätt från början.',
    'card'        => 'Ny el vid renovering och tillbyggnad. El till garage och attefallshus.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/dra-el-renovering.webp', 'alt' => 'Elektriker drar ny kabel i en vägg under renovering'],
    'includes'    => [
        'Planering av uttag, belysning och grupper med dig',
        'Kabeldragning i vägg, tak och golv',
        'El till garage, carport, friggebod och attefallshus',
        'Kabel i mark med rätt skydd',
        'Anpassning av elcentralen och dokumentation',
    ],
    'sections' => [
        [
            'h2' => 'Dra om elen i ett äldre hus',
            'p'  => [
                'Tygklädda kablar, ojordade uttag och gamla proppskåp är vanliga i hus byggda före 1970-talet. En omdragning gör huset säkrare och ger plats för det du behöver i dag. Vi kan göra det i etapper, rum för rum, i samband med att du renoverar.',
            ],
            'checks' => [
                'Tygisolerade eller spröda kablar',
                'Ojordade uttag i kök och våtrum',
                'Säkringar som går ofta',
                'För få uttag och mycket skarvsladdar',
            ],
        ],
        [
            'h2' => 'El till garage, friggebod och attefallshus',
            'p'  => [
                'Kabel i mark ska ligga på rätt djup och skyddas mot skador, och byggnaden behöver ofta en egen liten elcentral. Vi planerar dragningen, hjälper till att samordna grävningen och kopplar in allt – belysning, uttag, [laddbox](/elbilsladdare/) eller [bastu](/bastu/).',
            ],
        ],
        [
            'h2' => 'Infällt eller utanpåliggande?',
            'p'  => [
                'Vid renovering när väggarna ändå är öppna är infälld el självklar. I befintliga rum där väggarna ska vara orörda kan utanpåliggande kanal vara ett snyggt och prisvärt alternativ. Vi föreslår det som passar ditt hus och din budget.',
            ],
        ],
        [
            'h2' => 'Vad kostar det att dra om el i ett hus?',
            'p'  => [
                'Priset beror på husets storlek, hur mycket som ska bytas, om väggarna är öppna och hur många uttag och lampor du vill ha. Vi lämnar fast pris för ett tydligt avgränsat jobb och ROT-avdrag på arbetskostnaden.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får man dra el själv?', 'a' => 'Nej. Att dra nya kablar, installera uttag och ändra i elcentralen kräver ett registrerat elinstallationsföretag. Läs vår guide [Får man dra el själv?](/blogg/fa-man-dra-el-sjalv/)'],
        ['q' => 'Hur lång tid tar det att dra om elen i en villa?', 'a' => 'Det beror på husets storlek och om väggarna är öppna. Ett enskilt rum tar ofta en eller ett par dagar; ett helt hus planeras i etapper.'],
        ['q' => 'Kan ni samarbeta med min snickare?', 'a' => 'Ja, vi planerar gärna tillsammans med dina andra hantverkare så att el dras innan väggarna stängs.'],
    ],
    'related' => ['eluttag', 'elcentral', 'elbesiktning'],
],

'elbesiktning' => [
    'path'        => '/elbesiktning/',
    'nav'         => 'Elbesiktning & elkontroll',
    'group'       => 'el',
    'icon'        => 'clipboard',
    'priority'    => '0.6',
    'title'       => 'Elbesiktning av villa – genomgång av el | Asplund',
    'description' => 'Elkontroll av villa, fritidshus och BRF: vi går igenom elcentral, jordfelsbrytare, uttag och kablar och ger dig råd om vad som bör åtgärdas.',
    'keyword'     => 'elbesiktning',
    'variants'    => ['elrevision', 'elbesiktning villa', 'elbesiktning pris', 'elkontroll', 'genomgång av elanläggning'],
    'h1'          => 'Elbesiktning och elkontroll – vet hur säker din el är',
    'lead'        => 'Ska du köpa hus, har du ärvt ett fritidshus eller känns elen bara gammal? Vi går igenom installationen och berättar tydligt vad som är bra, vad som bör åtgärdas och i vilken ordning.',
    'card'        => 'Genomgång av elen vid husköp, i äldre hus och i BRF.',
    'deduction'   => null,
    'image'       => ['src' => '/assets/img/tjanster/elbesiktning-elkontroll.webp', 'alt' => 'Elektriker kontrollerar en elcentral med mätinstrument'],
    'includes'    => [
        'Genomgång av elcentral, säkringar och jordfelsbrytare',
        'Test av jordfelsbrytare och kontroll av jordning',
        'Isolationsmätning där det behövs',
        'Kontroll av uttag, strömbrytare och synliga kablar',
        'Konsultation: råd om vad som bör åtgärdas och i vilken ordning',
    ],
    'sections' => [
        [
            'h2' => 'När är en elkontroll smart?',
            'checks' => [
                'Inför husköp – innan du skriver på',
                'När du flyttat in i ett äldre hus eller ärvt ett fritidshus',
                'Efter en vattenskada eller ett åsknedslag',
                'Inför försäljning, så att köparen ser att elen är i ordning',
                'När säkringar går ofta eller något känns fel',
            ],
        ],
        [
            'h2' => 'Det här kontrollerar vi',
            'p'  => [
                'Vi börjar i [elcentralen](/elcentral/) och tittar på säkringar, märkning och [jordfelsbrytare](/jordfelsbrytare/). Sedan går vi igenom husets uttag, strömbrytare, synliga kablar och särskilt utsatta platser som badrum, kök och utomhus. Där det behövs mäter vi isolation och jordning.',
            ],
        ],
        [
            'h2' => 'Genomgång för BRF och företag',
            'p'  => [
                'För fastigheter och verksamheter är regelbunden kontroll av elanläggningen ett sätt att uppfylla innehavarens ansvar för elsäkerheten och ofta ett krav från försäkringsbolaget. Vi går igenom gemensamma utrymmen, tvättstugor, belysning och elcentraler och ger råd om vad som bör åtgärdas.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Vad kostar en elbesiktning av en villa?', 'a' => 'Det beror på husets storlek och hur omfattande kontroll du vill ha. Hör av dig så lämnar vi ett fast pris för genomgången.'],
        ['q' => 'Ingår elen i en vanlig överlåtelsebesiktning?', 'a' => 'En överlåtelsebesiktning tittar sällan närmare på elinstallationen. Vill du veta hur elen mår behöver den kontrolleras separat.'],
        ['q' => 'Kan ni åtgärda det ni hittar?', 'a' => 'Ja. Du får råd om vad som bör åtgärdas och i vilken ordning, och kan välja att låta oss göra det direkt eller senare.'],
    ],
    'related' => ['elcentral', 'jordfelsbrytare', 'felsokning'],
],

];
