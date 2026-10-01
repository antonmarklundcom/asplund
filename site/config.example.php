<?php
/**
 * Defaults. On the server, copy to config.php (never committed) and fill in.
 * Every key is optional — the site works without config.php.
 */

return [
    // '1' lets search engines index this deployment. Keep '' on the temp
    // domain; set '1' only on asplundeltjanst.se at go-live.
    'ALLOW_INDEXING'   => '',

    // Canonical/OG/sitemap origin. Stays the real domain even on the temp domain.
    'CANONICAL_ORIGIN' => 'https://asplundeltjanst.se',

    // Leads: every submission is always logged to logs/leads-YYYY-MM.jsonl.
    'LEAD_EMAIL'       => '',          // e.g. didrik@asplundeltjanst.se — empty = no e-mail
    'LEAD_EMAIL_FROM'  => 'webb@asplundeltjanst.se',
    'VENDERCRM_URL'    => '',          // e.g. https://crm.example.com
    'VENDERCRM_API_KEY' => '',         // site key from VenderCRM → Sitios

    // Analytics (optional). Loaded only after the visitor accepts statistics cookies.
    'GA4_ID'           => '',          // G-XXXXXXX
    'ADS_SEND_TO'      => '',          // AW-XXXXXXX/abcDEF — lead conversion on /tack/
];
