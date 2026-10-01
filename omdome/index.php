<?php
declare(strict_types=1);

require dirname(__DIR__) . '/lib/app.php';

$p    = page_meta('/omdome/');
$done = ($_GET['tack'] ?? '') === '1';
$g    = site('googleReviewUrl');
page_start(['title' => $p['title'], 'description' => $p['description'], 'path' => '/omdome/', 'noindex' => true, 'bodyClass' => 'is-thanks']);
?>
<section class="thanks">
  <div class="wrap wrap-narrow">
    <h1><?= e($p['h1']) ?></h1>
    <p class="thanks-lead"><?= e($p['lead']) ?></p>
<?php if ($done): ?>
    <div class="thanks-box">
      <p class="side-h">Tack för din feedback</p>
      <p>Den går direkt till Didrik. Vill du dessutom dela din upplevelse med andra går det bra att göra det på Google också.</p>
    </div>
<?php endif; ?>
<?php if ($g): ?>
    <div class="thanks-box">
      <p class="side-h">Skriv ett omdöme på Google</p>
      <p>Det tar en minut och hjälper andra som letar efter elektriker – och oss mest av allt.</p>
      <p><a class="btn btn-primary btn-lg" href="<?= e($g) ?>" rel="noopener" target="_blank" data-ev="review_click">Skriv omdöme på Google <?= icon('arrow', 18) ?></a></p>
    </div>
<?php endif; ?>
    <form class="lead" action="/feedback.php" method="post" data-lead>
      <div class="lead-head"><p class="lead-title">Något vi kan göra bättre?</p><p class="lead-sub">Skriv några rader. Det går direkt till Didrik.</p></div>
      <input type="hidden" name="t" value="">
      <div class="hp" aria-hidden="true"><label>Lämna tomt <input name="website" tabindex="-1" autocomplete="off"></label></div>
      <div class="f-row">
        <label class="f"><span>Namn</span><input name="name" autocomplete="name" maxlength="120" placeholder="Valfritt"></label>
        <label class="f"><span>Telefon eller e-post</span><input name="contact" maxlength="120" placeholder="Om du vill att vi hör av oss"></label>
      </div>
      <label class="f"><span>Din feedback <em>*</em></span><textarea name="message" rows="5" required minlength="3" maxlength="3000" placeholder="Vad gick bra, och vad kunde vi gjort bättre?"></textarea></label>
      <button class="btn btn-primary btn-block btn-lg" type="submit">Skicka feedback <?= icon('arrow', 18) ?></button>
      <p class="lead-legal">Vi använder uppgifterna bara för att svara dig och förbättra vårt jobb. <a href="/integritetspolicy/">Integritetspolicy</a></p>
    </form>
    <p class="fine">Båda alternativen är öppna för alla – du väljer själv var du vill lämna din åsikt.</p>
  </div>
</section>
<?php page_end(); ?>
