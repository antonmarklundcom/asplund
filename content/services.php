<?php
/**
 * Service pages, keyed by slug, in menu order. Split per group for
 * readability; every record has this shape (the verify script checks it):
 *
 *   path, nav, group, icon, title (≤60), description (120–160), keyword,
 *   h1, lead, card, deduction (rot|gron-laddbox|gron-batteri|gron-sol|null),
 *   image [src, alt], includes[], sections[], faq[[q,a]], related[slug],
 *   variants[] (keyword variants this page answers — documentation only).
 *
 * The keyword → page map behind these lives in docs/seo-keyword-map.md.
 */

declare(strict_types=1);

return array_merge(
    require __DIR__ . '/services/energi.php',
    require __DIR__ . '/services/el.php',
    require __DIR__ . '/services/belysning.php',
    require __DIR__ . '/services/hem.php',
);
