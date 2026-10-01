# asplundeltjanst.se — v2

Static PHP site for Asplund Eltjänst (elektriker, Nynäshamn & Södertörn). No database,
no build step. Hostinger shared hosting, PHP 8.2+.

```
php -S 127.0.0.1:8091 router.php     # preview (router.php mirrors .htaccess)
PHP=/c/php/php.exe ./verify.sh       # build gate — must print PASS
php tools/make-routes.php            # create route files for new content records
php tools/make-zip.php               # dist/asplundeltjanst-<date>.zip for public_html
```

- **Content is data:** `content/site.php` (business facts), `services/*.php` (21 service
  pages), `areas.php` (4 location pages), `guides.php` (blog), `pages.php` (static page
  meta), `redirects.php` (301s from the old WordPress site), `deductions.php` (ROT/grönt).
- **Code:** `lib/app.php` (config, SEO, schema, icons, images), `lib/layout.php` (head,
  header with mega menu, footer, mobile call bar), `lib/components.php` (lead form, FAQ,
  cards …), `templates/` (service, area, guide), `enviar.php` (lead handler: log → e-mail →
  VenderCRM), `route.php` (redirects, slash fix, 404).
- **Indexing is OFF by default** (noindex + robots Disallow). Set `ALLOW_INDEXING => '1'`
  in the server's `config.php` only on the real domain at go-live.
- Docs: `docs/seo-keyword-map.md`, `docs/facts-to-verify.md`, `docs/image-slots.md`.
