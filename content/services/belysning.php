<?php
/** Group: Belysning. See content/services.php for the shape. */

declare(strict_types=1);

return [

'belysning' => [
    'path'        => '/belysning/',
    'nav'         => 'Belysning – översikt',
    'group'       => 'belysning',
    'icon'        => 'bulb',
    'priority'    => '0.8',
    'title'       => 'Belysning inne och ute – planering och installation',
    'description' => 'Belysning som gör hemmet trivsammare: planering, LED, spotlights, utebelysning och byte av lysrörsarmaturer. Elektriker i Nynäshamn och på Södertörn.',
    'keyword'     => 'belysning',
    'variants'    => ['led belysning', 'smart belysning', 'belysningsplanering', 'lysrörsarmatur', 'led armatur', 'byta lysrör till led', 'led armatur garage'],
    'h1'          => 'Belysning inne och ute – planering och installation',
    'lead'        => 'Rätt ljus på rätt plats gör stor skillnad för hur ett hem känns. Vi hjälper dig planera och installera belysning i hela huset – från spotlights i taket till fasad och trädgård.',
    'card'        => 'Planering och installation av belysning inne och ute. LED och smart styrning.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/projekt/indoor-lighting-1.webp', 'alt' => 'Inomhusbelysning installerad av Asplund Eltjänst'],
    'includes'    => [
        'Belysningsplanering rum för rum',
        'Installation av taklampor, spotlights och vägglampor',
        'LED-lister, bänkbelysning och dimmers',
        'Byte av lysrörsarmaturer till LED',
        'Utebelysning, fasad och trädgård',
    ],
    'sections' => [
        [
            'h2' => 'Planera belysningen i lager',
            'p'  => [
                'Bra belysning byggs i tre lager: **allmänbelysning** som lyser upp hela rummet, **arbetsbelysning** där du läser, lagar mat eller sminkar dig, och **stämningsbelysning** som skapar mys på kvällen. När alla tre finns och kan styras var för sig blir rummet både praktiskt och trivsamt.',
                'Vi går igenom rummen med dig och föreslår placering av ljuspunkter, uttag och strömbrytare innan något monteras.',
            ],
        ],
        [
            'h2' => 'LED-belysning',
            'p'  => [
                'LED drar en bråkdel av el jämfört med glödlampor och halogen och håller i många år. Välj varmvitt ljus (2700–3000 K) i vardagsrum och sovrum, och lite kallare ljus där du arbetar. Ett högt färgåtergivningsindex (Ra/CRI 90 eller mer) gör att färger ser naturliga ut.',
            ],
        ],
        [
            'h2' => 'Byt lysrörsarmaturer till LED',
            'id' => 'lysrorsarmatur',
            'p'  => [
                'Gamla lysrörsarmaturer i garage, verkstad, tvättstuga och förråd blinkar, surrar och drar onödigt mycket el. En ny LED-armatur tänds direkt även när det är kallt, ger bättre ljus och kräver i princip inget underhåll. Vi byter ut armaturerna och ser över kopplingen samtidigt.',
            ],
        ],
        [
            'h2' => 'Belysning för varje del av hemmet',
            'p'  => [
                'Läs mer om [spotlights i tak](/spotlights/), [köksbelysning](/koksbelysning/), [badrumsbelysning](/badrum/), [utomhusbelysning](/utomhusbelysning/), [fasadbelysning](/fasadbelysning/) och [trädgårdsbelysning](/tradgardsbelysning/). Vill du styra allt från mobilen? Se [smarta hem](/smarta-hem/).',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får jag sätta upp en taklampa själv?', 'a' => 'Du får byta lamphållare och ansluta lampor via stickpropp. Fast installation av nya ljuspunkter, strömbrytare och kablar ska göras av ett elinstallationsföretag. Läs mer i vår guide [Får man dra el själv?](/blogg/fa-man-dra-el-sjalv/)'],
        ['q' => 'Vilken färgtemperatur ska jag välja?', 'a' => 'Varmvitt, 2700–3000 K, i vardagsrum, sovrum och matplats. 3000–4000 K fungerar bra i kök, badrum och arbetsrum.'],
        ['q' => 'Får jag ROT-avdrag för belysning?', 'a' => 'Ja, ROT-avdraget på 30 % gäller arbetskostnaden för installationen i din bostad.'],
    ],
    'related' => ['spotlights', 'utomhusbelysning', 'koksbelysning'],
],

'spotlights' => [
    'path'        => '/spotlights/',
    'nav'         => 'Spotlights i tak',
    'group'       => 'belysning',
    'icon'        => 'spot',
    'priority'    => '0.7',
    'title'       => 'Installera spotlights i tak | Asplund Eltjänst',
    'description' => 'Infällda eller utanpåliggande spotlights i tak, badrum och takfot. Vi planerar placering och dimmer och installerar – med ROT-avdrag på arbetet.',
    'keyword'     => 'spotlights',
    'variants'    => ['spotlight tak', 'spotlights i tak', 'spottar i tak', 'spotlight badrum', 'spotlight utomhus', 'utanpåliggande spotlights'],
    'h1'          => 'Spotlights i taket – infällda, utanpåliggande och i badrum',
    'lead'        => 'Spotlights ger ett jämnt, modernt ljus och gör taket rent från lampor. Vi hjälper dig med antal, placering och dimmer – och installerar snyggt och säkert.',
    'card'        => 'Infällda och utanpåliggande spotlights i tak, badrum och takfot.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/spotlights-tak.webp', 'alt' => 'Infällda LED-spotlights i ett vitt innertak'],
    'includes'    => [
        'Förslag på antal och placering',
        'Håltagning och montering av infällda spotlights',
        'Utanpåliggande spotlights där infällt inte går',
        'LED-dimmer som passar lamporna',
        'Rätt kapslingsklass i badrum och utomhus',
    ],
    'sections' => [
        [
            'h2' => 'Infällda eller utanpåliggande?',
            'p'  => [
                'Infällda spotlights kräver ett tak där det går att ta hål och utrymme ovanför – till exempel gips eller ett nedpendlat tak. I betongtak eller där det saknas utrymme blir utanpåliggande spotlights eller en spotlightskena ett bra alternativ.',
                'Ovanför isolering behövs spotlights som är godkända för kontakt med isolering, så att värmen inte blir ett problem.',
            ],
        ],
        [
            'h2' => 'Hur många spotlights behövs?',
            'p'  => [
                'En tumregel är ungefär en meter mellan spotlightsen och hälften så långt till väggen, men det beror på takhöjd, spridningsvinkel och vad rummet används till. Hellre färre spotlights med rätt ljus än för många. Vi ritar upp ett förslag innan vi monterar.',
            ],
        ],
        [
            'h2' => 'Spotlights i badrum och utomhus',
            'p'  => [
                'I badrummet styr säkerhetszonerna vilken kapslingsklass som krävs – nära dusch och badkar behövs högre skydd. Utomhus, i takfoten eller under ett skärmtak, ska spotlightsen tåla fukt och kyla. Läs mer om [el i badrum](/badrum/) och [utomhusbelysning](/utomhusbelysning/).',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Kan man sätta spotlights i ett befintligt tak?', 'a' => 'Ja, i de flesta gipstak går det att installera infällda spotlights utan att riva taket. Kablarna dras ovanför taket genom hålen.'],
        ['q' => 'Går det att dimra spotlights?', 'a' => 'Ja, om både lampor och dimmer är gjorda för det. Vi väljer en LED-dimmer som passar så att ljuset inte flimrar.'],
        ['q' => 'Vad kostar det att installera spotlights?', 'a' => 'Priset beror på antal spotlights, taktyp och hur kabeln kan dras. Du får ett fast pris innan vi börjar och ROT-avdrag på arbetet.'],
    ],
    'related' => ['belysning', 'koksbelysning', 'badrum'],
],

'utomhusbelysning' => [
    'path'        => '/utomhusbelysning/',
    'nav'         => 'Utomhusbelysning',
    'group'       => 'belysning',
    'icon'        => 'house',
    'priority'    => '0.8',
    'title'       => 'Utomhusbelysning – installation av utebelysning',
    'description' => 'Utebelysning för entré, altan, uppfart, flaggstång och pool. Vi installerar utomhusbelysning med skymningsrelä eller smart styrning på Södertörn.',
    'keyword'     => 'utomhusbelysning',
    'variants'    => ['utebelysning', 'belysning utomhus', 'utebelysning vägg', 'altanbelysning', 'balkongbelysning', 'flaggstångsbelysning', 'poolbelysning'],
    'h1'          => 'Utomhusbelysning – för trygghet och trivsel',
    'lead'        => 'Bra utebelysning gör det lättare att hitta hem, svårare för obehöriga och skönare att sitta ute en sensommarkväll. Vi planerar och installerar belysning runt hela huset.',
    'card'        => 'Entré, altan, uppfart, flaggstång och pool. Styrning med skymningsrelä.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/projekt/pool-lighting.webp', 'alt' => 'Utomhusbelysning vid en pool, installerad av Asplund Eltjänst'],
    'includes'    => [
        'Belysningsförslag för entré, gångar, altan och uppfart',
        'Vägglampor, pollare och markspotlights',
        'Skymningsrelä, rörelsevakt, timer eller smart styrning',
        'Kabel i mark och utomhusuttag',
        'Jordfelsskydd och rätt kapslingsklass',
    ],
    'sections' => [
        [
            'h2' => 'Planera belysningen runt huset',
            'p'  => [
                'Börja med det praktiska: entrén, trappor, gångar och uppfarten. Lägg sedan till stämning – altanen, trädgården och fasaden. Med olika grupper kan du ha trygghetsljus tänt hela kvällen och stämningsljuset bara när du sitter ute.',
            ],
        ],
        [
            'h2' => 'Altan- och balkongbelysning',
            'id' => 'altan',
            'p'  => [
                'Infällda spotlights i altangolvet eller trappstegen, vägglampor och dimbar belysning under ett tak gör altanen användbar långt in på hösten. Vi monterar fast installerad belysning och utomhusuttag så att du slipper sladdar.',
            ],
        ],
        [
            'h2' => 'Flaggstångs- och poolbelysning',
            'id' => 'flaggstang-pool',
            'p'  => [
                'Flaggstångsbelysning med en spotlight vid foten eller en armatur i toppen ger en fin effekt på tomten. Vid poolen ska belysning och el uppfylla särskilda säkerhetskrav – vi installerar poolbelysning och elen till poolens pump och [värmepump](/varmepump/).',
            ],
        ],
        [
            'h2' => 'Styrning: skymningsrelä, rörelsevakt eller app',
            'p'  => [
                'Ett skymningsrelä tänder belysningen när det mörknar och släcker vid gryningen. En rörelsevakt tänder bara när någon rör sig. Med [smart styrning](/smarta-hem/) kan du ställa in scener och tider i mobilen.',
            ],
        ],
    ],
    'faq' => [
        ['q' => '230 volt eller 12 volt utomhus?', 'a' => '12 eller 24 volt är enkelt och säkert för trädgårdsbelysning. 230 volt behövs för kraftigare armaturer och vägglampor på fasaden. Vi föreslår det som passar – läs mer om [trädgårdsbelysning](/tradgardsbelysning/).'],
        ['q' => 'Får jag gräva ner kabel själv?', 'a' => 'Du kan gräva diket själv, men förläggning och inkoppling av kabel i mark ska göras av ett elinstallationsföretag.'],
        ['q' => 'Vilken kapslingsklass behövs utomhus?', 'a' => 'Minst IP44 under tak och högre där armaturen utsätts för regn eller spolning. Markspotlights behöver ännu högre klass.'],
    ],
    'related' => ['fasadbelysning', 'tradgardsbelysning', 'eluttag'],
],

'fasadbelysning' => [
    'path'        => '/fasadbelysning/',
    'nav'         => 'Fasadbelysning',
    'group'       => 'belysning',
    'icon'        => 'house',
    'priority'    => '0.7',
    'title'       => 'Fasadbelysning – installation på villa | Asplund Eltjänst',
    'description' => 'Fasadbelysning som lyfter huset och ger trygghet. Upp- och nedljus, vägglampor och skymningsrelä – installerat av elektriker i Nynäshamn.',
    'keyword'     => 'fasadbelysning',
    'variants'    => ['fasadbelysning utomhus', 'fasadbelysning äldre hus', 'fasadbelysning med skymningsrelä', 'fasadbelysning upp och ner', 'fasadbelysning led'],
    'h1'          => 'Fasadbelysning som lyfter huset',
    'lead'        => 'Rätt fasadbelysning framhäver husets arkitektur, lyser upp entrén och gör det tryggare runt huset. Vi hjälper dig välja armaturer och placering och installerar med snygg kabeldragning.',
    'card'        => 'Upp- och nedljus, vägglampor och skymningsrelä på fasaden.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/fasadbelysning-villa.webp', 'alt' => 'Villa i skymning med fasadbelysning som lyser upp och ner'],
    'includes'    => [
        'Förslag på armaturer och placering',
        'Infälld eller dold kabeldragning i fasaden',
        'Upp- och nedljus, vägglampor och spotlights i takfot',
        'Skymningsrelä eller timer',
        'Rätt kapslingsklass och jordfelsskydd',
    ],
    'sections' => [
        [
            'h2' => 'Upp- och nedljus',
            'p'  => [
                'Armaturer som lyser både uppåt och nedåt skapar ljuskäglor som ger fasaden djup och rytm. De passar särskilt bra på moderna hus och vid entréer. Avståndet mellan armaturerna bestämmer hur effekten blir – vi provar gärna placeringen med dig innan montering.',
            ],
        ],
        [
            'h2' => 'Fasadbelysning på äldre hus',
            'p'  => [
                'På en äldre villa eller ett torp passar ofta en klassisk vägglykta vid entrén, diskret ljus i takfoten och varmt ljus som inte bländar. Kabeln kan dras dolt bakom panel eller i snygga kanaler så att fasaden behåller sin karaktär.',
            ],
        ],
        [
            'h2' => 'Styr belysningen automatiskt',
            'p'  => [
                'Med skymningsrelä tänds fasadbelysningen när det blir mörkt och släcks på morgonen. Kombinera gärna med en timer eller [smart styrning](/smarta-hem/) så att belysningen släcks mitt i natten.',
                'Se också [utomhusbelysning](/utomhusbelysning/) och [trädgårdsbelysning](/tradgardsbelysning/) för resten av tomten.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Hur högt ska fasadbelysningen sitta?', 'a' => 'Vid entrén ofta strax ovanför dörrkarmen eller i ögonhöjd vid sidan av dörren. Upp- och nedljus placeras ofta på omkring två meters höjd, men det beror på fasaden.'],
        ['q' => 'Vilken färgtemperatur passar utomhus?', 'a' => 'Varmvitt ljus, omkring 2700–3000 K, ger ett ombonat intryck och passar de flesta fasader.'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, på arbetskostnaden för installationen.'],
    ],
    'related' => ['utomhusbelysning', 'tradgardsbelysning', 'spotlights'],
],

'tradgardsbelysning' => [
    'path'        => '/tradgardsbelysning/',
    'nav'         => 'Trädgårdsbelysning',
    'group'       => 'belysning',
    'icon'        => 'tree',
    'priority'    => '0.7',
    'title'       => 'Trädgårdsbelysning – planering och installation',
    'description' => 'Trädgårdsbelysning som syns från fönstret och gör tomten användbar efter mörkrets inbrott. 12 V eller 230 V, nedgrävd kabel och smart styrning.',
    'keyword'     => 'trädgårdsbelysning',
    'variants'    => ['belysning trädgård', 'trädgårdsbelysning 12v', 'trädgårdsbelysning stolpe', 'trädgårdsbelysning el'],
    'h1'          => 'Trädgårdsbelysning – planerad, nedgrävd och klar',
    'lead'        => 'Ljus i trädgården förlänger säsongen och gör utsikten från fönstret vacker även i november. Vi planerar belysningen med dig, gräver ner kabeln och kopplar in allt.',
    'card'        => 'Belysning för träd, gångar och rabatter. 12 V eller 230 V.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/tradgardsbelysning.webp', 'alt' => 'Trädgård i kvällsljus med belysta träd och gångar'],
    'includes'    => [
        'Belysningsförslag för träd, gångar och rabatter',
        'Markspotlights, pollare och stolplampor',
        'Kabel i mark med rätt skydd',
        'Transformator, timer eller skymningsrelä',
        'Utomhusuttag för säsongsbelysning',
    ],
    'sections' => [
        [
            'h2' => '12 volt eller 230 volt?',
            'p'  => [
                '**12 eller 24 volt** är vanligast i trädgården: armaturerna är små, kabeln är lätt att flytta och systemet är säkert om en kabel skadas av en spade. **230 volt** behövs för kraftigare belysning, längre avstånd och stolplampor längs uppfarten. Ofta blir det en kombination.',
            ],
        ],
        [
            'h2' => 'Planera ljuset i trädgården',
            'list' => [
                'Belys ett eller ett par större träd underifrån – det ger djup.',
                'Lägg lågt ljus längs gångar och trappor där man går.',
                'Lyft fram rabatter, stenar eller en damm med små spotlights.',
                'Tänk på utsikten från vardagsrum och kök – det är där du ser trädgården mest.',
            ],
        ],
        [
            'h2' => 'Fast belysning eller solcellslampor?',
            'p'  => [
                'Solcellslampor är enkla att ställa ut, men ger svagt ljus och fungerar dåligt under den mörka delen av året. Fast installerad belysning lyser lika bra i december som i juni och kan styras med timer eller app.',
                'Komplettera gärna med [fasadbelysning](/fasadbelysning/) och [utomhusbelysning](/utomhusbelysning/) vid entré och altan.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Hur djupt ska kabeln ligga?', 'a' => 'Kabel för 230 volt ska ligga på rätt djup och skyddas mot skador, ofta i rör. Lågvoltskabel kan ligga grundare. Vi förlägger kabeln enligt gällande regler.'],
        ['q' => 'Kan jag bygga ut belysningen senare?', 'a' => 'Ja, om vi planerar för det från början med en transformator och kabel som klarar fler armaturer.'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, på arbetskostnaden för installationen.'],
    ],
    'related' => ['utomhusbelysning', 'fasadbelysning', 'eluttag'],
],

];
