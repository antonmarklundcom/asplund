<?php
/** Group: Laddbox, sol & värme. See content/services.php for the shape. */

declare(strict_types=1);

return [

'elbilsladdare' => [
    'path'        => '/elbilsladdare/',
    'nav'         => 'Laddbox & elbilsladdare',
    'group'       => 'energi',
    'icon'        => 'plug',
    'priority'    => '0.9',
    'title'       => 'Elbilsladdare & laddbox – installation | Asplund Eltjänst',
    'description' => 'Vi installerar elbilsladdare och laddbox hemma i villa, fritidshus och BRF på Södertörn. Fast pris och 50 % grönt avdrag direkt på fakturan.',
    'keyword'     => 'elbilsladdare',
    'variants'    => ['laddbox', 'laddstolpe', 'laddbox hemma', 'installera laddbox', 'laddbox med installation', 'laddstation elbil', 'laddbox brf'],
    'h1'          => 'Elbilsladdare och laddbox – installerad hemma hos dig',
    'lead'        => 'Ladda bilen säkert och snabbt i din egen uppfart. Vi installerar laddbox och laddstolpe i villa, fritidshus, BRF och på företag i Nynäshamn och på hela Södertörn – med 50 % grönt avdrag dragit direkt på fakturan.',
    'card'        => 'Laddbox och laddstolpe hemma, i BRF och på företag. 50 % grönt avdrag.',
    'deduction'   => 'gron-laddbox',
    'image'       => ['src' => '/assets/img/tjanster/elbilsladdare-installation.webp', 'alt' => 'Laddbox för elbil monterad på husvägg vid en villa'],
    'includes'    => [
        'Genomgång av elcentral och huvudsäkring innan vi lämnar pris',
        'Kabeldragning från elcentralen, infälld eller i snygg kanal',
        'Rätt jordfelsskydd för elbilsladdning',
        'Lastbalansering så att säkringarna inte går när allt är igång',
        'Driftsättning, app-koppling och genomgång av laddboxen',
        'Grön teknik-avdraget sköts direkt på fakturan',
    ],
    'sections' => [
        [
            'h2' => 'Laddbox, laddstolpe eller vanligt eluttag?',
            'p'  => [
                'En **laddbox** sitter på husväggen eller i garaget och laddar bilen ungefär tre till sju gånger snabbare än ett vanligt eluttag – beroende på bil, laddbox och om du har en- eller trefas. Det är det vanligaste valet för villa och fritidshus.',
                'En **laddstolpe** är samma teknik monterad på en fristående stolpe. Den passar när bilen står en bit från huset, vid en carport eller på en gemensam parkering. Då behövs oftast en kabel i mark, och det planerar vi in i offerten.',
                'Ett vanligt eluttag är inte byggt för att leverera hög ström i många timmar varje natt. Det fungerar i nödfall, men för daglig laddning rekommenderar vi alltid en riktig laddbox – det är både säkrare och snabbare.',
            ],
        ],
        [
            'h2' => 'Vad kostar det att installera en laddbox?',
            'p'  => [
                'Priset beror främst på hur långt det är från elcentralen till platsen där bilen står, om kabeln kan dras inomhus eller behöver grävas ner, och om elcentralen har plats för en ny grupp. Själva laddboxen varierar också i pris beroende på effekt och funktioner.',
                'Du får alltid ett fast pris innan vi börjar. Eftersom laddbox räknas som grön teknik får du **50 % avdrag på både arbete och material** – avdraget gör vi direkt på fakturan, så du betalar bara din del.',
            ],
            'checks' => [
                'Avstånd och väg från elcentralen till laddplatsen',
                'Inomhusdragning, utanpåliggande kanal eller kabel i mark',
                'Ledig plats i elcentralen och storlek på huvudsäkringen',
                'Enfas eller trefas, och vilken laddeffekt du behöver',
            ],
        ],
        [
            'h2' => 'Räcker min huvudsäkring?',
            'p'  => [
                'I de flesta villor räcker huvudsäkringen gott, särskilt med en laddbox som har **lastbalansering**. Den känner av hur mycket el resten av huset använder och sänker laddeffekten tillfälligt när spis, värmepump och tvättmaskin går samtidigt. Då slipper du både utlösta säkringar och en dyrare säkringsuppgradering.',
                'Är din elcentral gammal eller full tittar vi på det i samma veva – läs mer om att [byta elcentral](/elcentral/).',
            ],
        ],
        [
            'h2' => 'Laddbox i BRF och samfällighet',
            'id' => 'brf',
            'p'  => [
                'Allt fler bostadsrättsföreningar och samfälligheter vill erbjuda laddplatser. Där är det styrelsen som beställer, och det behövs en lösning som klarar flera bilar på samma anslutning, rättvis debitering per användare och möjlighet att bygga ut fler platser senare.',
                'Vi hjälper styrelsen med ett tydligt underlag: hur många platser anslutningen klarar, vad som behöver göras i elcentralen och hur installationen kan byggas ut i etapper. Gemensamma installationer omfattas inte av privatpersoners gröna avdrag – däremot kan föreningen ibland söka andra stöd, så det är värt att kontrollera innan beslut.',
            ],
        ],
        [
            'h2' => 'Ladda med egen solel',
            'p'  => [
                'Har du eller planerar du [solceller](/solceller/) kan laddboxen styras så att bilen laddas när panelerna producerar överskott. Med ett [solcellsbatteri](/solcellsbatteri/) kan du dessutom spara dagens solel till kvällsladdningen.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Hur lång tid tar det att installera en laddbox?', 'a' => 'En vanlig installation i villa tar några timmar upp till en arbetsdag. Behöver kabeln grävas ner till en laddstolpe tar det längre – det framgår alltid av offerten.'],
        ['q' => 'Kan jag ladda elbilen i ett vanligt eluttag?', 'a' => 'Det går i nödfall, men ett vanligt eluttag är inte gjort för att leverera hög ström i många timmar varje natt. För daglig laddning är en laddbox säkrare och betydligt snabbare.'],
        ['q' => 'Hur mycket får jag i grönt avdrag för laddbox?', 'a' => 'Du får 50 % avdrag på arbete och material, upp till 50 000 kr per person och år. Vi drar av beloppet direkt på fakturan och sköter ansökan hos Skatteverket. Läs mer på [priser och avdrag](/priser/).'],
        ['q' => 'Vilken laddbox ska jag välja?', 'a' => 'Det beror på bilen, din huvudsäkring och om du vill styra laddningen i en app eller mot elpriset. Vi rekommenderar en laddbox med lastbalansering och hjälper dig välja en modell som passar – hör av dig så går vi igenom det.'],
        ['q' => 'Installerar ni laddstolpar i BRF?', 'a' => 'Ja. Vi tar fram ett underlag för styrelsen, föreslår en lösning som klarar flera bilar och kan byggas ut, och installerar när föreningen har beslutat.'],
    ],
    'related' => ['solceller', 'solcellsbatteri', 'elcentral'],
],

'solceller' => [
    'path'        => '/solceller/',
    'nav'         => 'Solceller',
    'group'       => 'energi',
    'icon'        => 'sun',
    'priority'    => '0.9',
    'title'       => 'Solceller & solpaneler – installation | Asplund Eltjänst',
    'description' => 'Solceller till villa och fritidshus i Nynäshamn och på Södertörn. Vi dimensionerar, installerar och anmäler anläggningen. 15 % grönt avdrag direkt.',
    'keyword'     => 'solceller',
    'variants'    => ['solpaneler', 'solpanel', 'pris solceller', 'installera solceller', 'solceller villa', 'solceller kostnad', 'växelriktare'],
    'h1'          => 'Solceller och solpaneler till villa och fritidshus',
    'lead'        => 'Producera din egen el och sänk elräkningen i många år framåt. Vi hjälper dig från första förslag till färdig anläggning – med växelriktare, inkoppling i elcentralen och färdiganmälan till nätbolaget.',
    'card'        => 'Egen el från taket – dimensionering, installation och anmälan. 15 % grönt avdrag.',
    'deduction'   => 'gron-sol',
    'image'       => ['src' => '/assets/img/tjanster/solceller-villa-tak.webp', 'alt' => 'Solpaneler monterade på taket till en villa på Södertörn'],
    'includes'    => [
        'Förslag på anläggningens storlek utifrån tak och elförbrukning',
        'Installation av solpaneler, växelriktare och skydd',
        'Inkoppling i elcentralen enligt gällande regler',
        'Färdiganmälan till nätbolaget så att du kan sälja överskottet',
        'Genomgång av appen där du följer produktionen',
        'Grönt avdrag direkt på fakturan',
    ],
    'sections' => [
        [
            'h2' => 'Vad kostar solceller?',
            'p'  => [
                'Priset styrs mest av hur stor anläggningen blir, alltså hur många solpaneler som får plats och behövs för din förbrukning. Takets material och lutning, avståndet till elcentralen och valet av växelriktare påverkar också.',
                'Solceller ger **15 % grönt avdrag på arbete och material**. Avdraget dras direkt på fakturan, och det går inte att kombinera med ROT för samma kostnad. Du får alltid ett fast pris innan vi börjar.',
            ],
            'checks' => [
                'Anläggningens storlek i kilowatt (antal paneler)',
                'Taktyp, lutning och hur panelerna fästs',
                'Växelriktare – och om den ska kunna kopplas till batteri',
                'Eventuella åtgärder i elcentralen',
            ],
        ],
        [
            'h2' => 'Lönar sig solceller?',
            'p'  => [
                'Solceller lönar sig bäst när du använder mycket av elen själv, eftersom egenförbrukad el ersätter el du annars hade köpt med skatt och nätavgift. Överskottet säljer du till ditt elbolag.',
                'Ett tak mot söder, sydost eller sydväst utan mycket skugga ger bäst produktion, men även öst–väst kan fungera bra. I Mellansverige producerar en anläggning ungefär 800–1 000 kWh per installerad kilowatt och år, beroende på läge och skuggning.',
                'Kombinerar du solcellerna med en [laddbox](/elbilsladdare/) eller ett [solcellsbatteri](/solcellsbatteri/) kan du använda mer av din egen el – och då blir kalkylen ofta ännu bättre.',
            ],
        ],
        [
            'h2' => 'Växelriktaren – hjärtat i anläggningen',
            'p'  => [
                'Solpanelerna ger likström. Växelriktaren omvandlar den till växelström som huset kan använda och visar produktionen i en app. Väljer du en så kallad hybridväxelriktare kan du koppla in ett batteri senare utan att byta ut den.',
                'Växelriktaren har kortare livslängd än panelerna, så det lönar sig att välja en kvalitetsmodell med bra garanti.',
            ],
        ],
        [
            'h2' => 'Från förslag till färdig anläggning',
            'checks' => [
                'Vi går igenom tak, elcentral och elförbrukning med dig',
                'Du får ett förslag med fast pris och beräknad produktion',
                'Installation och inkoppling – oftast några få arbetsdagar',
                'Vi färdiganmäler anläggningen till nätbolaget',
                'Du följer din produktion i appen från första soliga dagen',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Behöver jag bygglov för solceller?', 'a' => 'Oftast inte. Solpaneler som följer takets form är i de flesta fall bygglovsbefriade, men i kulturhistoriskt värdefulla områden och vissa detaljplaner kan det krävas. Kontrollera med kommunen om du är osäker.'],
        ['q' => 'Hur mycket el producerar solceller i Stockholms län?', 'a' => 'Ungefär 800–1 000 kWh per installerad kilowatt och år, beroende på takets riktning, lutning och skuggning.'],
        ['q' => 'Kan jag sälja överskottet?', 'a' => 'Ja. När anläggningen är färdiganmäld till nätbolaget kan du teckna avtal med ett elbolag som köper din överskottsel.'],
        ['q' => 'Får jag ROT-avdrag för solceller?', 'a' => 'Nej, solceller ger i stället grönt avdrag på 15 % av arbete och material. Det dras direkt på fakturan. Läs mer om [avdragen](/priser/#avdrag).'],
        ['q' => 'Fungerar solcellerna vid strömavbrott?', 'a' => 'En vanlig anläggning stängs av vid strömavbrott av säkerhetsskäl. Vill du ha reservkraft krävs en växelriktare och ett batteri med reservkraftsfunktion.'],
    ],
    'related' => ['solcellsbatteri', 'elbilsladdare', 'elcentral'],
],

'solcellsbatteri' => [
    'path'        => '/solcellsbatteri/',
    'nav'         => 'Solcellsbatteri',
    'group'       => 'energi',
    'icon'        => 'battery',
    'priority'    => '0.7',
    'title'       => 'Solcellsbatteri & hembatteri – installation och avdrag',
    'description' => 'Lagra din solel i ett solcellsbatteri och använd den när du behöver. Vi installerar hembatteri på Södertörn med 50 % grönt avdrag på fakturan.',
    'keyword'     => 'solcellsbatteri',
    'variants'    => ['hembatteri', 'solcellsbatteri pris', 'batterilager', 'energilager', 'batterilager villa'],
    'h1'          => 'Solcellsbatteri – spara dagens solel till kvällen',
    'lead'        => 'Ett hembatteri lagrar överskottet från dina solceller så att du använder mer av din egen el – på kvällen, till elbilen eller när elpriset är högt. Batteriet ger 50 % grönt avdrag på arbete och material.',
    'card'        => 'Lagra din egen solel och använd den på kvällen. 50 % grönt avdrag.',
    'deduction'   => 'gron-batteri',
    'image'       => ['src' => '/assets/img/tjanster/solcellsbatteri-hembatteri.webp', 'alt' => 'Hembatteri för solel monterat på vägg i ett teknikrum'],
    'includes'    => [
        'Genomgång av din solcellsanläggning och förbrukning',
        'Förslag på batteristorlek som passar ditt hus',
        'Installation och inkoppling mot växelriktare och elcentral',
        'Inställning av styrning och app',
        'Grönt avdrag direkt på fakturan',
    ],
    'sections' => [
        [
            'h2' => 'Så fungerar ett solcellsbatteri',
            'p'  => [
                'Mitt på dagen producerar solcellerna ofta mer än huset använder. Utan batteri säljs överskottet till ett lågt pris, och på kvällen köper du tillbaka el till fullt pris. Ett batteri jämnar ut det: överskottet laddas in och används när solen gått ner.',
                'Många batterier kan också styras mot elpriset – de laddas när elen är billig och används när den är dyr.',
            ],
        ],
        [
            'h2' => 'Lönar sig ett hembatteri?',
            'p'  => [
                'Det beror på hur stor skillnad det är mellan det du får för såld el och det du betalar för köpt el, och hur mycket av din förbrukning som sker på kvällar och nätter. Med 50 % grönt avdrag har kalkylen blivit betydligt bättre än för några år sedan.',
                'Har du ännu inga solceller är det smart att planera för batteri redan från början, med en växelriktare som klarar det. Läs mer om [solceller](/solceller/).',
            ],
        ],
        [
            'h2' => 'Vad påverkar priset?',
            'checks' => [
                'Batteriets kapacitet i kWh',
                'Om befintlig växelriktare kan användas eller behöver bytas',
                'Placering och kabeldragning',
                'Om du vill ha reservkraft vid strömavbrott',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Kan jag installera ett batteri utan solceller?', 'a' => 'Det går tekniskt, men grönt avdrag gäller system som lagrar egenproducerad el. För avdraget behöver batteriet alltså kopplas till din solcellsanläggning.'],
        ['q' => 'Hur stort batteri behöver jag?', 'a' => 'För en vanlig villa brukar ett batteri som täcker kvällens och nattens förbrukning räcka. Vi räknar på din förbrukning och anläggning innan vi föreslår en storlek.'],
        ['q' => 'Fungerar batteriet som reservkraft?', 'a' => 'Bara om systemet har reservkraftsfunktion. Det kräver rätt växelriktare och en särskild inkoppling – säg till om det är viktigt för dig.'],
        ['q' => 'Hur mycket grönt avdrag får jag?', 'a' => '50 % av arbete och material, upp till 50 000 kr per person och år. Vi drar det direkt på fakturan.'],
    ],
    'related' => ['solceller', 'elbilsladdare', 'smarta-hem'],
],

'luftvarmepump' => [
    'path'        => '/luftvarmepump/',
    'nav'         => 'Luftvärmepump',
    'group'       => 'energi',
    'icon'        => 'wind',
    'priority'    => '0.9',
    'title'       => 'Luftvärmepump med installation | Asplund Eltjänst',
    'description' => 'Luft-luftvärmepump med installation i Nynäshamn och på Södertörn. Rätt dimensionering, snygg placering och ROT-avdrag direkt på fakturan.',
    'keyword'     => 'luftvärmepump',
    'variants'    => ['luft luft värmepump', 'installation av luftvärmepump', 'luftvärmepump pris', 'installera luftvärmepump', 'luftvärmepump installation'],
    'h1'          => 'Luftvärmepump med installation – luft-luft för villa och fritidshus',
    'lead'        => 'Sänk uppvärmningskostnaden och få sval luft på sommaren. Vi hjälper dig välja rätt luft-luftvärmepump, placerar den där den gör mest nytta och installerar allt – med ROT-avdrag direkt på fakturan.',
    'card'        => 'Luft-luftvärmepump med installation. Sänk värmekostnaden, få kyla på sommaren.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/luftvarmepump-installation.webp', 'alt' => 'Utedel till luftvärmepump monterad på husvägg vid en villa'],
    'includes'    => [
        'Hembesök: vi tittar på planlösning, placering och elanslutning',
        'Förslag på värmepump med rätt effekt för huset',
        'Montering av inne- och utedel, rördragning och elinstallation',
        'Driftsättning och genomgång av styrning och filter',
        'ROT-avdraget sköts direkt på fakturan',
    ],
    'sections' => [
        [
            'h2' => 'Därför väljer många luft-luftvärmepump',
            'p'  => [
                'En luft-luftvärmepump hämtar värme ur uteluften och blåser ut den inomhus. Den ger flera gånger mer värme än den el den använder, och passar särskilt bra i hus med direktverkande el, elpanna eller vedeldning som komplement.',
                'På sommaren fungerar samma pump som luftkonditionering. I fritidshus kan den dessutom hålla underhållsvärme på vintern till en låg kostnad.',
            ],
        ],
        [
            'h2' => 'Vad kostar en luftvärmepump med installation?',
            'p'  => [
                'Totalpriset beror på vilken modell och effekt huset behöver, hur långt det är mellan inne- och utedel och hur rör och kabel kan dras. En placering där rören går rakt genom väggen är enklast; längre dragningar och ställning för utedelen kostar mer.',
                'Du får ett fast pris efter hembesöket. **ROT-avdraget på 30 %** gäller arbetskostnaden och dras direkt på fakturan.',
            ],
            'checks' => [
                'Värmepumpens effekt och modell',
                'Avstånd mellan innedel och utedel',
                'Väggmaterial, håltagning och rördragning',
                'Markstativ, väggkonsol och eventuellt skyddstak',
            ],
        ],
        [
            'h2' => 'Märken: Mitsubishi Electric, Toshiba och Gree',
            'p'  => [
                'Vi är återförsäljare åt Mitsubishi Electric, Toshiba och Gree. Föredrar du ett annat märke kan vi köpa in det också – berätta vad du har tittat på så hittar vi en modell som passar huset.',
            ],
        ],
        [
            'h2' => 'Rätt placering gör stor skillnad',
            'p'  => [
                'Innedelen ska sitta centralt och högt så att den varma luften sprids i så stor del av huset som möjligt – ofta i hallen eller i ett öppet vardagsrum. Utedelen placeras skyddat från snö och dropp, med fritt luftflöde och med hänsyn till grannar och sovrumsfönster.',
                'Vi går igenom huset med dig innan vi bestämmer placering, så att du får ut så mycket värme som möjligt.',
            ],
        ],
        [
            'h2' => 'Skötsel och service',
            'p'  => [
                'Rengör filtret i innedelen regelbundet – det är den enkla åtgärd som gör mest för verkningsgraden. Håll utedelen fri från snö och löv, och överväg ett skyddstak om den sitter under takfoten.',
                'Funderar du på luft-vatten, bergvärme eller frånluft? Läs vår översikt över [olika värmepumpar](/varmepump/).',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Hur mycket kan jag spara med en luftvärmepump?', 'a' => 'Det beror på hur huset värms i dag, hur stort och välisolerat det är och planlösningen. I hus med direktverkande el blir besparingen ofta stor, eftersom pumpen ger flera gånger mer värme än den använder.'],
        ['q' => 'Fungerar en luftvärmepump när det är riktigt kallt?', 'a' => 'Ja, moderna modeller gjorda för nordiskt klimat ger värme även vid sträng kyla, men effekten och verkningsgraden sjunker ju kallare det blir. Därför behåller de flesta sin befintliga värmekälla som komplement.'],
        ['q' => 'Får jag ROT-avdrag för luftvärmepump?', 'a' => 'Ja, ROT-avdraget på 30 % gäller arbetskostnaden för installationen. Vi drar det direkt på fakturan.'],
        ['q' => 'Behövs bygglov för en luftvärmepump?', 'a' => 'Normalt inte för en villa, men detaljplanen kan ha bestämmelser. Bor du i bostadsrätt eller radhusområde behövs ofta föreningens godkännande för utedelen.'],
        ['q' => 'Hur lång tid tar installationen?', 'a' => 'En vanlig installation görs oftast på en dag.'],
    ],
    'related' => ['varmepump', 'solceller', 'elcentral'],
],

'varmepump' => [
    'path'        => '/varmepump/',
    'nav'         => 'Värmepump – guide',
    'group'       => 'energi',
    'icon'        => 'thermo',
    'priority'    => '0.7',
    'title'       => 'Värmepump – vilken passar ditt hus? | Asplund Eltjänst',
    'description' => 'Luft-luft, luft-vatten, bergvärme eller frånluft? Så skiljer sig värmepumparna åt – och hur vi hjälper till med installation och elanslutning.',
    'keyword'     => 'värmepump',
    'variants'    => ['luft vattenvärmepump', 'luft och vatten värmepump', 'bergvärmepump', 'bergvärme', 'frånluftsvärmepump', 'poolvärmepump', 'värmepump pris'],
    'h1'          => 'Värmepump – luft-luft, luft-vatten, bergvärme eller frånluft?',
    'lead'        => 'Att byta till värmepump är ett av de bästa sätten att sänka uppvärmningskostnaden. Här är skillnaderna mellan de vanligaste typerna – och vad vi kan hjälpa dig med.',
    'card'        => 'Jämför luft-luft, luft-vatten, bergvärme och frånluft. Vi sköter elinstallationen.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/varmepump-villa.webp', 'alt' => 'Utedel till värmepump vid en villa på vintern'],
    'includes'    => [
        'Råd om vilken typ av värmepump som passar ditt hus',
        'Luft-luftvärmepump med komplett installation',
        'Elinstallation när du byter till luft-vatten, bergvärme eller frånluft',
        'Ny matning, säkringar och anpassning av elcentralen',
        'ROT-avdrag på arbetskostnaden',
    ],
    'sections' => [
        [
            'h2' => 'Luft-luftvärmepump',
            'p'  => [
                'Den enklaste och billigaste värmepumpen att installera. Den värmer luften inomhus och fungerar som AC på sommaren. Passar hus med direktverkande el och fritidshus. Vi säljer och installerar luft-luftvärmepumpar – läs mer om [luftvärmepump med installation](/luftvarmepump/).',
            ],
        ],
        [
            'h2' => 'Luft-vattenvärmepump',
            'p'  => [
                'Hämtar värme ur uteluften men levererar den till husets vattenburna system – element, golvvärme och varmvatten. Ett bra alternativ för hus med vattenburen värme där borrning inte är möjlig eller för dyr. Investeringen är högre än för luft-luft men täcker hela husets uppvärmning.',
            ],
        ],
        [
            'h2' => 'Bergvärme',
            'p'  => [
                'En bergvärmepump hämtar värme från ett borrhål. Den ger jämn värme året runt, även när det är som kallast, och har ofta lägst driftkostnad. Samtidigt är investeringen störst eftersom det krävs borrning. Kräver tillstånd från kommunen.',
            ],
        ],
        [
            'h2' => 'Frånluftsvärmepump',
            'p'  => [
                'Återvinner värmen i ventilationsluften som lämnar huset. Vanlig i hus byggda från 1970-talet och framåt med mekanisk frånluftsventilation. Ett byte till en modern frånluftsvärmepump kan ge märkbart lägre elförbrukning.',
            ],
        ],
        [
            'h2' => 'Elinstallation för värmepump',
            'p'  => [
                'Oavsett typ behöver en värmepump en korrekt elanslutning: egen matning från elcentralen, rätt säkringar och ibland en större huvudsäkring eller en ny [elcentral](/elcentral/). Vi gör elinstallationen så att pumpen kan driftsättas säkert – och samordnar gärna med den som installerar själva värmesystemet.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Vilken värmepump har lägst driftkostnad?', 'a' => 'Bergvärme har oftast lägst driftkostnad eftersom temperaturen i berget är jämn hela året. Luft-luft har lägst investering. Vad som lönar sig bäst beror på huset och hur det värms i dag.'],
        ['q' => 'Måste huvudsäkringen höjas när jag skaffar värmepump?', 'a' => 'Ibland. Det beror på pumpens effekt och vad mer som drar el i huset, till exempel laddbox. Vi räknar på det innan installationen.'],
        ['q' => 'Får jag ROT-avdrag för värmepump?', 'a' => 'Ja, ROT-avdraget på 30 % gäller arbetskostnaden för installationen.'],
        ['q' => 'Installerar ni poolvärmepump?', 'a' => 'Vi gör elinstallationen för poolvärmepumpar och poolbelysning. Hör av dig och berätta om din pool, så går vi igenom vad som behövs.'],
    ],
    'related' => ['luftvarmepump', 'golvvarme', 'elcentral'],
],

'golvvarme' => [
    'path'        => '/golvvarme/',
    'nav'         => 'Golvvärme (el)',
    'group'       => 'energi',
    'icon'        => 'thermo',
    'priority'    => '0.8',
    'title'       => 'Elektrisk golvvärme – installation | Asplund Eltjänst',
    'description' => 'Elektrisk golvvärme i badrum, kök och hall – installerad av behörig elektriker. Golvvärmetermostat, styrning och ROT-avdrag på arbetet.',
    'keyword'     => 'golvvärme',
    'variants'    => ['golvvärme el', 'elgolvvärme', 'golvvärmetermostat', 'el golvvärme badrum', 'installera golvvärme', 'el element'],
    'h1'          => 'Golvvärme med el – varma golv i badrum, kök och hall',
    'lead'        => 'Elektrisk golvvärme ger varma, torra golv och jämn värme. Vi installerar golvvärmekabel eller värmematta och kopplar in termostaten – oftast i samband med att golvet ändå byggs om.',
    'card'        => 'Varma golv i badrum, kök och hall. Termostat och smart styrning.',
    'deduction'   => 'rot',
    'image'       => ['src' => '/assets/img/tjanster/golvvarme-el-badrum.webp', 'alt' => 'Elektrisk golvvärmematta utlagd på badrumsgolv före plattsättning'],
    'includes'    => [
        'Val av golvvärmekabel eller matta för ditt golv',
        'Ny grupp och jordfelsskydd i elcentralen',
        'Inkoppling av termostat med golvgivare',
        'Isolationsmätning före och efter att golvet läggs',
        'Samordning med plattsättare eller golvläggare',
    ],
    'sections' => [
        [
            'h2' => 'Elgolvvärme eller vattenburen golvvärme?',
            'p'  => [
                'Elektrisk golvvärme är enkel och billig att installera och passar bra i enskilda rum som badrum, hall och kök. Vattenburen golvvärme kopplas till husets värmesystem och lönar sig främst när ett helt hus eller en stor yta ska värmas, men kräver rörmokare och mer bygghöjd.',
                'Vi installerar elektrisk golvvärme. Har du vattenburet system kan vi koppla in termostater, ställdon och [värmepumpens](/varmepump/) el.',
            ],
        ],
        [
            'h2' => 'Golvvärmetermostat och styrning',
            'p'  => [
                'Termostaten styr värmen med hjälp av en givare i golvet. En modern termostat med veckoprogram eller app gör att golvet bara är varmt när du behöver det – det sänker driftkostnaden märkbart.',
                'Vill du styra golvvärmen tillsammans med annan värme och belysning? Läs mer om [smarta hem](/smarta-hem/).',
            ],
        ],
        [
            'h2' => 'Under vilka golv fungerar det?',
            'p'  => [
                'Under klinker och sten fungerar elgolvvärme allra bäst eftersom materialet leder värme bra. Under trä, laminat och vinyl går det också, men då med lägre effekt och rätt underlag. Vi väljer kabel eller matta efter golvtyp.',
            ],
        ],
        [
            'h2' => 'Element och elvärme som komplement',
            'p'  => [
                'Behöver du mer värme i ett enskilt rum, till exempel en inglasad altan eller ett gästhus, kan ett fast anslutet elelement vara rätt lösning. Vi installerar element med termostat och rätt säkring.',
            ],
        ],
    ],
    'faq' => [
        ['q' => 'Får jag installera golvvärme själv?', 'a' => 'Nej. Enligt Elsäkerhetsverket får du inte installera eller byta elektrisk golvvärme själv – det ska göras av ett registrerat elinstallationsföretag.'],
        ['q' => 'Vad kostar elgolvvärme i drift?', 'a' => 'Det beror på rummets storlek, hur varmt du vill ha och hur länge golvvärmen är på. Med en termostat som sänker temperaturen när du inte behöver värmen blir kostnaden betydligt lägre.'],
        ['q' => 'Kan man lägga golvvärme i ett befintligt badrum?', 'a' => 'Golvvärme läggs i samband med att golvet byggs om, eftersom kabeln ligger under plattorna. Planerar du badrumsrenovering är det rätt tillfälle – läs mer om [el i badrum](/badrum/).'],
        ['q' => 'Får jag ROT-avdrag?', 'a' => 'Ja, ROT-avdraget på 30 % gäller arbetskostnaden för installationen.'],
    ],
    'related' => ['badrum', 'smarta-hem', 'elcentral'],
],

];
