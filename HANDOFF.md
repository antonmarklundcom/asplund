# Handoff — asplundeltjanst.se v2 (2026-10-01)

Paste the prompt below into a NEW Claude Code window opened on
`C:\Claude 1\asplundeltjanst-se` (Opus 5.5, or Sonnet 5.5 for steps 2–4).
Higgsfield MCP must be connected. If it runs as a cloud session, the
environment needs Network access → Custom → Allowed domains:
`*.cloudfront.net` (Higgsfield result downloads), `github.com`,
`codeload.github.com`, `asplundeltjanst.se` + tick "include default list of
common package managers" (npm for webimg). On Anton's PC no allowlist is
needed; PHP is at `C:\php\php.exe`.

---

```
Continue the asplundeltjanst.se v2 rebuild. Repo: C:\Claude 1\asplundeltjanst-se
(GitHub antonmarklundcom/asplund). The new site is ONLY the site/ folder — the old
September template build at the repo root is archived, ignore it, never delete it.

Read first, in this order: site/docs/seo-keyword-map.md, site/docs/facts-to-verify.md,
site/docs/image-slots.md, then lib/app.php, lib/layout.php, lib/components.php and one
content file (content/services/energi.php). Content is data (content/*.php); templates
render it; route files are 3 lines (php tools/make-routes.php creates missing ones).

Gate before every commit: cd site && PHP=/c/php/php.exe ./verify.sh → must print PASS
(lint, 39 routes 200, titles ≤60 unique, descriptions 110–165 unique, one h1, internal
links, 35 redirects, 404, robots noindex, sitemap, lead form). Preview:
C:\php\php.exe -S 127.0.0.1:8091 router.php (from site/).

Work in this order, one PR per step, merge when verify is green:

1. VISUAL QA (Opus). Open every page type in the browser at 1366px and 375px:
   /, /tjanster/, /elbilsladdare/, /varmepump/, /elektriker-haninge/, /priser/,
   /om-oss/, /kontakt/, /boka/, /projekt/, /blogg/, /blogg/gront-avdrag/, /tack/,
   a 404, the mega menu (hover desktop, tap mobile) and the mobile menu. Only the home
   hero and one service hero have been checked so far. Fix anything that is not
   9/10: spacing, overflow (scrollWidth must equal innerWidth), wrapping, contrast,
   sticky sidebar, footer, consent banner. Keep the design system in
   assets/css/site.css (:root tokens); add, don't rewrite.

2. IMAGES (Sonnet is fine). Follow the web-images skill. Generate the 23 MISSING slots
   in site/docs/image-slots.md + og-default.jpg (1200x630) with Higgsfield, convert
   to WebP (+ AVIF) at the exact paths listed, alt text is already in content. Slots
   show a designed placeholder until the file exists, so no code changes needed.
   Regenerate docs/image-slots.md status afterwards. Never generate a slot twice.

3. DEPLOY TO TEMP DOMAIN. cd site && C:\php\php.exe tools/make-zip.php → upload
   dist/asplundeltjanst-<date>.zip to the Hostinger temp domain's public_html and
   extract flat. Create config.php on the server from config.example.php with
   ALLOW_INDEXING='' (stays noindex + robots Disallow), LEAD_EMAIL set to Anton's
   address for testing (NOT Didrik's yet). Check https://<temp>/robots.txt shows
   Disallow: /, submit one test lead, confirm logs/leads-*.jsonl on the server.
   Ask Anton before anything that needs his Hostinger login.

4. FACTS. Turn site/docs/facts-to-verify.md into a short Swedish SMS/e-mail draft
   for Anton to send Didrik. Do not change any fact on the site until Didrik answers.

Go-live later (only when Anton says so): point asplundeltjanst.se to the new site,
config.php ALLOW_INDEXING='1', LEAD_EMAIL=didrik@…, optional VENDERCRM_URL/KEY and
GA4_ID, then Search Console: submit /sitemap.xml and spot-check the old WordPress
URLs (/elektriker/, /luftvarmepumpar/, /ny-hemsida/, /author/eric/) return 301.

Rules: no invented facts, prices or reviews (see content/site.php header). Natural
Swedish, du-tilltal, no keyword stuffing. Report what was verified and how.
```
