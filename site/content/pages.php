<?php
/**
 * Static pages keyed by path: title (≤60), description (120–160), h1, lead,
 * noindex, priority. Bodies live in each page's route file.
 */

declare(strict_types=1);

return [
    '/' => [
        'title'       => 'Elektriker i Nynäshamn & Södertörn – Asplund Eltjänst',
        'description' => 'Behörig elektriker i Nynäshamn och på Södertörn. Laddbox, solceller, luftvärmepump, elcentral och belysning. Fast pris och ROT direkt på fakturan.',
        'h1'          => 'Elektriker i Nynäshamn och på Södertörn',
        'lead'        => 'Laddbox, solceller, luftvärmepump, elcentral, belysning och felsökning – för villa, fritidshus, BRF och företag. Du får ett fast pris innan vi börjar, och vi drar ROT eller grönt avdrag direkt på fakturan.',
        'priority'    => '1.0',
    ],
    '/tjanster/' => [
        'title'       => 'Våra eltjänster – allt inom el | Asplund Eltjänst',
        'description' => 'Alla våra eltjänster: laddbox, solceller, värmepump, elcentral, jordfelsbrytare, belysning, badrum, golvvärme och felsökning. Nynäshamn och Södertörn.',
        'h1'          => 'Våra eltjänster',
        'lead'        => 'Från ett nytt eluttag till en hel solcellsanläggning – här är allt vi hjälper till med. Hittar du inte det du söker? Ring oss, det är troligen något vi gör.',
        'priority'    => '0.8',
    ],
    '/priser/' => [
        'title'       => 'Vad kostar en elektriker? Priser & ROT-avdrag',
        'description' => 'Så sätter vi pris på elarbeten: fast pris eller löpande, vad som påverkar kostnaden och hur ROT-avdrag och grönt avdrag dras direkt på fakturan.',
        'h1'          => 'Vad kostar en elektriker? Priser och avdrag',
        'lead'        => 'Vi lämnar fast pris innan vi börjar när jobbet går att avgränsa – och drar ROT-avdrag eller grönt avdrag direkt på fakturan. Här är hur prissättningen fungerar.',
        'priority'    => '0.8',
    ],
    '/om-oss/' => [
        'title'       => 'Om Asplund Eltjänst – behörig elektriker i Nynäshamn',
        'description' => 'Asplund Eltjänst är ett lokalt elföretag i Nynäshamn, grundat 2019 av Didrik Asplund. Behörig elektriker för privatpersoner, BRF och företag på Södertörn.',
        'h1'          => 'Om Asplund Eltjänst',
        'lead'        => 'Ett lokalt elföretag i Nynäshamn som gör jobbet ordentligt, håller vad vi lovar och svarar i telefon.',
        'priority'    => '0.6',
    ],
    '/projekt/' => [
        'title'       => 'Tidigare projekt – elarbeten på Södertörn',
        'description' => 'Exempel på elarbeten vi har gjort i Nynäshamn och på Södertörn: belysning, poolbelysning, elinstallation och el vid badrumsrenovering.',
        'h1'          => 'Tidigare projekt',
        'lead'        => 'Ett urval av jobb vi har gjort. Fler bilder hittar du på vår [Instagram](https://www.instagram.com/asplundeltjanst/).',
        'priority'    => '0.5',
    ],
    '/blogg/' => [
        'title'       => 'Guider om el, laddbox och avdrag | Asplund Eltjänst',
        'description' => 'Guider från elektrikern: vad kostar en laddbox, grönt avdrag 2026, får man dra el själv och hur byter man proppskåp till automatsäkringar.',
        'h1'          => 'Guider och tips om el',
        'lead'        => 'Praktiska svar på frågor vi ofta får – om kostnader, avdrag, regler och säkerhet.',
        'priority'    => '0.6',
    ],
    '/kontakt/' => [
        'title'       => 'Kontakta oss – Asplund Eltjänst i Nynäshamn',
        'description' => 'Ring 070-960 20 71, mejla eller skicka en förfrågan. Asplund Eltjänst, Brunnsgatan 18, Nynäshamn. Öppet måndag–lördag 08–20.',
        'h1'          => 'Kontakta oss',
        'lead'        => 'Snabbast når du oss på telefon. Du kan också mejla eller skicka formuläret – vi återkommer med pris och förslag på tid.',
        'priority'    => '0.7',
    ],
    '/boka/' => [
        'title'       => 'Begär offert från elektriker – Asplund Eltjänst',
        'description' => 'Begär en kostnadsfri offert på elarbete i Nynäshamn och på Södertörn. Beskriv jobbet så återkommer vi med fast pris. ROT och grönt avdrag direkt.',
        'h1'          => 'Begär kostnadsfri offert',
        'lead'        => 'Berätta vad du behöver hjälp med. Du får ett fast pris innan vi börjar, och inga förpliktelser.',
        'priority'    => '0.7',
    ],
    '/integritetspolicy/' => [
        'title'       => 'Integritetspolicy och cookies – Asplund Eltjänst',
        'description' => 'Så hanterar Asplund Eltjänst personuppgifter som du lämnar via formulär, telefon och e-post, och hur vi använder cookies på webbplatsen.',
        'h1'          => 'Integritetspolicy',
        'lead'        => 'Så hanterar vi dina personuppgifter.',
        'priority'    => '0.2',
    ],
    '/tack/' => [
        'title'       => 'Tack för din förfrågan – Asplund Eltjänst',
        'description' => 'Tack för din förfrågan till Asplund Eltjänst. Vi återkommer så snart vi kan med pris och förslag på tid.',
        'h1'          => 'Tack – vi har fått din förfrågan',
        'lead'        => '',
        'noindex'     => true,
    ],
];
