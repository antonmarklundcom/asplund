<?php
/**
 * Reusable markup. Every function returns a string; every value goes
 * through e() or rich().
 */

declare(strict_types=1);

/* ------------------------------------------------------------ breadcrumbs -- */

function crumbs_html(): string
{
    $crumbs = $GLOBALS['__crumbs'] ?? [];
    if (!$crumbs) {
        return '';
    }
    $out  = '<nav class="crumbs" aria-label="Brödsmulor"><ol>';
    $last = count($crumbs) - 1;
    foreach ($crumbs as $i => [$label, $path]) {
        $out .= $i === $last
            ? '<li aria-current="page">' . e($label) . '</li>'
            : '<li><a href="' . e($path) . '">' . e($label) . '</a></li>';
    }

    return $out . '</ol></nav>';
}

/* --------------------------------------------------------------- lead form -- */

/**
 * The quote form. Posts to /enviar.php. $o: service (preselect slug),
 * title, sub, id, compact (bool).
 */
function lead_form(array $o = []): string
{
    $sel   = $o['service'] ?? ($_GET['tjanst'] ?? '');
    $sel   = is_string($sel) && service($sel) ? $sel : '';
    $id    = $o['id'] ?? 'offert';
    $title = $o['title'] ?? 'Begär kostnadsfri offert';
    $sub   = $o['sub'] ?? 'Berätta kort vad du behöver – vi återkommer med pris och förslag på tid.';
    $page  = $GLOBALS['__page']['path'] ?? '/';

    $opts = '<option value="">Välj tjänst (valfritt)</option>';
    foreach (service_groups() as $gid => $glabel) {
        $opts .= '<optgroup label="' . e($glabel) . '">';
        foreach (services_in($gid) as $slug) {
            $opts .= '<option value="' . e($slug) . '"' . ($slug === $sel ? ' selected' : '') . '>' . e(service($slug)['nav']) . '</option>';
        }
        $opts .= '</optgroup>';
    }
    $opts .= '<option value="annat">Annat / vet inte</option>';

    $f  = '<form class="lead" id="' . e($id) . '" action="/enviar.php" method="post" data-lead>';
    $f .= '<div class="lead-head"><p class="lead-title">' . e($title) . '</p><p class="lead-sub">' . e($sub) . '</p></div>';
    $f .= '<input type="hidden" name="page" value="' . e($page) . '">';
    $f .= '<input type="hidden" name="t" value="">';
    foreach (['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid', 'referrer'] as $k) {
        $f .= '<input type="hidden" name="' . $k . '" value="">';
    }
    $f .= '<div class="hp" aria-hidden="true"><label>Lämna tomt <input name="website" tabindex="-1" autocomplete="off"></label></div>';
    $f .= '<div class="f-row">'
        . '<label class="f"><span>Namn</span><input name="name" autocomplete="name" maxlength="120" placeholder="Ditt namn"></label>'
        . '<label class="f"><span>Telefon <em>*</em></span><input type="tel" name="phone" required autocomplete="tel" inputmode="tel" minlength="6" maxlength="30" placeholder="070-123 45 67"></label>'
        . '</div>';
    $f .= '<div class="f-row">'
        . '<label class="f"><span>Tjänst</span><select name="service">' . $opts . '</select></label>'
        . '<label class="f"><span>Ort</span><input name="place" autocomplete="address-level2" maxlength="120" placeholder="t.ex. Ösmo"></label>'
        . '</div>';
    $f .= '<label class="f"><span>Beskriv jobbet</span><textarea name="message" rows="3" maxlength="3000" placeholder="Vad behöver du hjälp med? Ungefär när?"></textarea></label>';
    $f .= '<button class="btn btn-primary btn-block btn-lg" type="submit">Skicka förfrågan ' . icon('arrow', 18) . '</button>';
    $f .= '<ul class="lead-ticks"><li>' . icon('check', 16) . 'Kostnadsfritt</li><li>' . icon('check', 16) . 'Inga förpliktelser</li><li>' . icon('check', 16) . 'ROT direkt på fakturan</li></ul>';
    $f .= '<p class="lead-alt">Hellre bild direkt? SMS:a en bild på jobbet till <a href="' . e(sms_href()) . '" data-ev="sms_click">' . e(site('phone')) . '</a>.</p>';
    $f .= '<p class="lead-legal">Vi använder uppgifterna bara för att svara på din förfrågan. <a href="/integritetspolicy/">Integritetspolicy</a></p>';

    return $f . '</form>';
}

/* ---------------------------------------------------------------- trust row -- */

function trust_row(string $variant = ''): string
{
    $s     = site();
    $items = [
        ['shield', 'Behörig elektriker'],
        ['receipt', 'ROT &amp; grönt avdrag på fakturan'],
        ['calendar', 'Sedan ' . e((string) $s['foundedYear'])],
        ['wrench', e($s['jobsDone']) . ' utförda jobb'],
    ];
    $out = '<ul class="trust ' . e($variant) . '">';
    foreach ($items as [$ic, $txt]) {
        $out .= '<li>' . icon($ic, 18) . '<span>' . $txt . '</span></li>';
    }

    return $out . '</ul>';
}

/* ---------------------------------------------------------------- content -- */

/**
 * Renders content sections: [h2, id?, p[], list[], checks[], h3s[[h3,p[]]], note].
 */
function blocks(array $sections): string
{
    $out = '';
    foreach ($sections as $sec) {
        $id   = $sec['id'] ?? slugify($sec['h2']);
        $out .= '<section class="prose-sec" id="' . e($id) . '"><h2>' . e($sec['h2']) . '</h2>';
        foreach ($sec['p'] ?? [] as $p) {
            $out .= '<p>' . rich($p) . '</p>';
        }
        if (!empty($sec['list'])) {
            $out .= '<ul class="list">';
            foreach ($sec['list'] as $li) {
                $out .= '<li>' . rich($li) . '</li>';
            }
            $out .= '</ul>';
        }
        if (!empty($sec['checks'])) {
            $out .= '<ul class="checks">';
            foreach ($sec['checks'] as $li) {
                $out .= '<li>' . icon('check', 18) . '<span>' . rich($li) . '</span></li>';
            }
            $out .= '</ul>';
        }
        foreach ($sec['h3s'] ?? [] as $h3) {
            $out .= '<h3>' . e($h3['h3']) . '</h3>';
            foreach ($h3['p'] ?? [] as $p) {
                $out .= '<p>' . rich($p) . '</p>';
            }
            if (!empty($h3['list'])) {
                $out .= '<ul class="list">';
                foreach ($h3['list'] as $li) {
                    $out .= '<li>' . rich($li) . '</li>';
                }
                $out .= '</ul>';
            }
        }
        if (!empty($sec['note'])) {
            $out .= '<p class="note">' . rich($sec['note']) . '</p>';
        }
        $out .= '</section>';
    }

    return $out;
}

function slugify(string $s): string
{
    $s = mb_strtolower($s, 'UTF-8');
    $s = strtr($s, ['å' => 'a', 'ä' => 'a', 'ö' => 'o', 'é' => 'e', 'ü' => 'u']);
    $s = preg_replace('/[^a-z0-9]+/', '-', $s) ?? $s;

    return trim($s, '-');
}

/* --------------------------------------------------------------------- faq -- */

function faq_html(array $faq, string $title = 'Vanliga frågor'): string
{
    if (!$faq) {
        return '';
    }
    $out = '<section class="faq" id="fragor"><h2>' . e($title) . '</h2><div class="faq-list">';
    foreach ($faq as $i => $f) {
        $out .= '<details class="faq-item"' . ($i === 0 ? ' open' : '') . '><summary>' . e($f['q']) . icon('chevron', 20) . '</summary><div class="faq-a"><p>' . rich($f['a']) . '</p></div></details>';
    }

    return $out . '</div></section>';
}

/* ------------------------------------------------------------- deductions -- */

function deduction_box(string $type): string
{
    $all = content('deductions');
    if (!isset($all[$type])) {
        return '';
    }
    $d = $all[$type];

    return '<aside class="deduct"><div class="deduct-pct"><b>' . (int) $d['percent'] . '&nbsp;%</b><span>' . e($d['label']) . '</span></div>'
         . '<div class="deduct-txt"><p>' . e($d['text']) . '</p><p class="deduct-small">Gäller ' . e($d['base']) . ', ' . e($d['cap'])
         . '. Regler enligt Skatteverket 2026. <a href="/priser/#avdrag">Så fungerar avdragen</a></p></div></aside>';
}

/* --------------------------------------------------------------- cards -- */

function service_cards(array $slugs, string $class = ''): string
{
    $out = '<ul class="cards ' . e($class) . '">';
    foreach ($slugs as $slug) {
        $s = service($slug);
        if (!$s) {
            continue;
        }
        $out .= '<li class="card"><a href="' . e($s['path']) . '"><span class="card-ico">' . icon($s['icon'], 24) . '</span>'
              . '<span class="card-t">' . e($s['nav']) . '</span><span class="card-d">' . e($s['card']) . '</span>'
              . '<span class="card-more">Läs mer ' . icon('arrow', 16) . '</span></a></li>';
    }

    return $out . '</ul>';
}

function area_chips(): string
{
    $out = '<ul class="chips"><li><a href="/">Nynäshamn</a></li>';
    foreach (['Ösmo', 'Sorunda', 'Torö', 'Stora Vika'] as $p) {
        $out .= '<li><a href="/">' . e($p) . '</a></li>';
    }
    foreach (areas() as $a) {
        $out .= '<li><a href="' . e($a['path']) . '">' . e($a['name']) . '</a></li>';
    }

    return $out . '</ul>';
}

/* ---------------------------------------------------------------- process -- */

function process_steps(string $title = 'Så går det till'): string
{
    $steps = [
        ['phone', 'Hör av dig', 'Ring, SMS:a eller skicka formuläret. Berätta vad du behöver – gärna med en bild.'],
        ['clipboard', 'Fast pris innan vi börjar', 'Vi går igenom jobbet, på plats eller på distans, och lämnar en tydlig offert. Inga överraskningar.'],
        ['bolt', 'Vi utför jobbet', 'Behörig elektriker gör installationen enligt gällande regler och städar efter sig.'],
        ['receipt', 'Avdraget sköter vi', 'ROT eller grön teknik dras direkt på fakturan. Du får dokumentation på det som är gjort.'],
    ];
    $out = '<section class="process"><div class="wrap"><h2>' . e($title) . '</h2><ol class="steps">';
    foreach ($steps as $i => [$ic, $t, $d]) {
        $out .= '<li class="step"><span class="step-n">' . ($i + 1) . '</span><span class="step-ico">' . icon($ic, 22) . '</span><h3>' . e($t) . '</h3><p>' . e($d) . '</p></li>';
    }

    return $out . '</ol></div></section>';
}

/* ----------------------------------------------------------------- reviews -- */

/** Real Google reviews only. Renders nothing while site('reviews') is empty. */
function reviews_html(): string
{
    $reviews = site('reviews') ?: [];
    if (!$reviews) {
        return '';
    }
    $out = '<section class="reviews"><div class="wrap"><div class="sec-head"><p class="eyebrow">Omdömen</p><h2>Vad kunderna säger</h2></div><ul class="review-list">';
    foreach (array_slice($reviews, 0, 6) as $r) {
        $out .= '<li class="review"><div class="stars" aria-label="' . (int) $r['rating'] . ' av 5 stjärnor">' . str_repeat(icon('star', 16), (int) $r['rating']) . '</div>'
              . '<blockquote>' . e($r['text']) . '</blockquote><p class="review-by">' . e($r['name']) . ($r['area'] ? ', ' . e($r['area']) : '') . '</p></li>';
    }
    $out .= '</ul>';
    if (site('googleProfileUrl')) {
        $out .= '<p class="reviews-more"><a href="' . e(site('googleProfileUrl')) . '" rel="noopener" target="_blank">Läs alla omdömen på Google</a></p>';
    }

    return $out . '</div></section>';
}

/* --------------------------------------------------------------- cta band -- */

function cta_band(string $title = 'Behöver du en elektriker?', string $text = 'Ring direkt eller skicka en förfrågan – du får ett fast pris innan vi börjar.', ?string $service = null): string
{
    $offer = $service ? '/boka/?tjanst=' . $service : '/boka/';

    return '<section class="cta-band"><div class="wrap cta-in"><div><h2>' . e($title) . '</h2><p>' . e($text) . '</p></div>'
         . '<div class="cta-btns"><a class="btn btn-spark btn-lg" href="' . e(tel_href()) . '" data-ev="phone_click">' . icon('phone', 20) . ' ' . e(site('phone')) . '</a>'
         . '<a class="btn btn-onDark btn-lg" href="' . e($offer) . '">Begär offert ' . icon('arrow', 18) . '</a></div></div></section>';
}

/* ------------------------------------------------------------- page hero -- */

/** Simple hero for static pages (no form). */
function page_hero(string $eyebrow, string $h1, string $lead): string
{
    return '<section class="phero"><div class="wrap">' . crumbs_html()
         . '<p class="eyebrow">' . e($eyebrow) . '</p><h1>' . e($h1) . '</h1><p class="phero-lead">' . rich($lead) . '</p></div></section>';
}
