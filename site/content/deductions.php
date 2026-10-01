<?php
/**
 * Skatteavdrag som visas på tjänstesidorna. Kontrollerat mot Skatteverkets
 * regler för 2026 (rotavdrag 30 %, grön teknik: solceller 15 %, laddpunkt och
 * batteri 50 %, max 50 000 kr per person och år). Kontrollera igen varje
 * januari — ändra bara här, alla sidor läser filen.
 */

declare(strict_types=1);

return [
    'checked' => '2026-10-01',
    'rot' => [
        'label'   => 'ROT-avdrag',
        'percent' => 30,
        'base'    => 'arbetskostnaden',
        'cap'     => 'upp till 50 000 kr per person och år',
        'text'    => 'Du betalar bara 70 % av arbetskostnaden – vi drar av ROT direkt på fakturan och sköter ansökan hos Skatteverket.',
    ],
    'gron-laddbox' => [
        'label'   => 'Grön teknik-avdrag',
        'percent' => 50,
        'base'    => 'arbete och material',
        'cap'     => 'upp till 50 000 kr per person och år',
        'text'    => 'För laddbox hemma får du 50 % avdrag på både arbete och material. Vi drar av det direkt på fakturan.',
    ],
    'gron-batteri' => [
        'label'   => 'Grön teknik-avdrag',
        'percent' => 50,
        'base'    => 'arbete och material',
        'cap'     => 'upp till 50 000 kr per person och år',
        'text'    => 'Ett batteri som lagrar egen solel ger 50 % avdrag på arbete och material, direkt på fakturan.',
    ],
    'gron-sol' => [
        'label'   => 'Grön teknik-avdrag',
        'percent' => 15,
        'base'    => 'arbete och material',
        'cap'     => 'upp till 50 000 kr per person och år',
        'text'    => 'Solceller ger 15 % avdrag på arbete och material. Avdraget görs direkt på fakturan – inget ROT på samma kostnad.',
    ],
];
