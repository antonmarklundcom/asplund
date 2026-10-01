<?php
/**
 * Business facts. Everything the site says about itself comes from here.
 *
 * RULE: no invented facts. A value nobody has confirmed stays null and the
 * component that would show it hides. Open questions live in
 * docs/facts-to-verify.md — tick them off there when Didrik confirms.
 */

declare(strict_types=1);

return [
    'name'        => 'Asplund Eltjänst',
    'legalName'   => 'Asplund Eltjänst i Nynäshamn AB',   // bekräftat av Anton 2026-10-01
    'orgNr'       => '559284-3410',        // bekräftat av Anton 2026-10-01
    'owner'       => 'Didrik Asplund',
    'domain'      => 'asplundeltjanst.se',
    'tagline'     => 'Behörig elektriker i Nynäshamn och på Södertörn',
    'description' => 'Behörig elektriker i Nynäshamn och på Södertörn. Laddbox, '
                   . 'luftvärmepump, elcentral, belysning och felsökning för villa, fritidshus, '
                   . 'BRF och företag.',

    // --- contact (NAP — must match Google Business Profile exactly) ----------
    'phone'        => '070-960 20 71',
    'phoneE164'    => '+46709602071',
    'email'        => 'didrik@asplundeltjanst.se',
    'street'       => 'Brunnsgatan 18',
    'postalCode'   => '149 41',
    'city'         => 'Nynäshamn',
    'region'       => 'Stockholms län',
    'country'      => 'SE',
    'geo'          => ['lat' => 58.9034, 'lng' => 17.9479],   // Nynäshamn centrum (ungefärligt)

    // Didrik 2026-10-01: 07–16. Veckodagar (mån–fre) antagna — bekräfta.
    'hoursText'    => 'Mån–fre 07–16',
    'openingHours' => [
        ['days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '07:00', 'closes' => '16:00'],
    ],

    // --- trust ------------------------------------------------------------------
    'foundedYear'   => 2019,               // bekräftat av Anton 2026-09-09
    'jobsDone'      => '2000+',            // bekräftat av Anton 2026-09-09 (gamla sajten säger 600+)
    'registration'  => null,               // Elsäkerhetsverkets registrering — ej bekräftad
    'award'         => 'Topp 3-nominerad till Årets Unga Företagare (Företagarna Nynäshamn)',  // arrangör bekräftad av Didrik; år ej känt
    'responseText'  => 'Vi hör av oss så snart vi kan',                 // Didrik osäker ("inom några dagar?") — neutral formulering tills han bekräftar

    // --- links ------------------------------------------------------------------
    'googleProfileUrl' => null,            // publik Google-profil
    'googleReviewUrl'  => null,            // "Skriv ett omdöme"-länk: GBP → Få fler omdömen → kopiera länken. Visas på /omdome/ när den är ifylld
    'instagram'        => 'https://www.instagram.com/asplundeltjanst/',
    'facebook'         => 'https://www.facebook.com/people/Asplund-Eltj%C3%A4nst/100043632067221/',

    // --- service area -------------------------------------------------------------
    'areaServed' => ['Nynäshamn', 'Ösmo', 'Sorunda', 'Torö', 'Stora Vika', 'Västerhaninge',
                     'Haninge', 'Tyresö', 'Huddinge', 'Södertälje', 'Botkyrka', 'Nacka', 'södra Stockholm', 'Södertörn'],

    // Riktiga Google-omdömen klistras in ordagrant: ['name'=>, 'area'=>, 'text'=>, 'rating'=>5].
    // Tom lista = sektionen visas inte. Påhittade omdömen är förbjudna.
    'reviews' => [],
];
