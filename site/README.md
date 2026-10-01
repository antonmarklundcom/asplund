# asplundeltjanst.se — v2

Static PHP site for Asplund Eltjänst (elektriker, Nynäshamn & Södertörn). No database,
no build step. Hostinger shared hosting, PHP 8.2+.

```
php -S 127.0.0.1:8091 router.php     # preview (router.php mirrors .htaccess)
PHP=/c/php/php.exe ./verify.sh       # build gate — must print PASS
php tools/make-routes.php            # create route files for new content records
php tools/make-zip.php               # dist/asplundeltjanst-<date>.zip for public_html
```

- **Content is data:** `content/site.php` (business facts), `services/*.php` (22 service
  pages), `areas.php` (6 location pages), `guides.php` (blog), `pages.php` (static page
  meta), `redirects.php` (301s from the old WordPress site), `deductions.php` (ROT/grönt).
- **Code:** `lib/app.php` (config, SEO, schema, icons, images), `lib/layout.php` (head,
  header with mega menu, footer, mobile call bar), `lib/components.php` (lead form, FAQ,
  cards …), `templates/` (service, area, guide), `enviar.php` (lead handler: log → e-mail →
  VenderCRM), `route.php` (redirects, slash fix, 404).
- **Indexing is OFF by default** (noindex + robots Disallow). Set `ALLOW_INDEXING => '1'`
  in the server's `config.php` only on the real domain at go-live.
- Docs: `docs/seo-keyword-map.md`, `docs/facts-to-verify.md`, `docs/image-slots.md`.

## Deploy (Hostinger Git)

Hostinger Git deploys a whole branch into the install folder, so `site/` is published as
the **root** of its own branch, `deploy`. Nothing is built on GitHub (no Actions): the
deploy webhook runs on Hostinger's servers.

**After every merge to `main`**, from the repo root:

```
bash site/tools/publish-deploy.sh
```

It fetches and fast-forwards `main`, runs `git subtree split --prefix site -b deploy-tmp`,
pushes `deploy-tmp` to `origin/deploy` and deletes the temp branch. The split is
deterministic, so each push just appends commits; never force-push. If a push is
rejected, find out why first (someone committed to `deploy` by hand?). Pushes to `main`
alone deploy nothing; a push to `deploy` redeploys automatically once Auto Deployment is on.

**Lives only on the server, survives deploys:** `config.php` (never committed) and
`logs/*.jsonl` (lead log, ignored by Git). `logs/.htaccess` is tracked and keeps the logs
private. Deploys only add/overwrite tracked files, so these are not touched.

**One-time setup in hPanel (temp domain):**

1. hPanel → Websites → the temp domain → Advanced → GIT.
2. If the repo is private, copy the SSH key shown there → GitHub repo Settings → Deploy
   keys → Add (read-only). Repository: `git@github.com:antonmarklundcom/asplund.git`
3. Branch: `deploy`. Install path: `public_html` (must be EMPTY: delete the default files).
4. Create → Deploy. Turn on Auto Deployment, copy the webhook URL → GitHub repo Settings →
   Webhooks → Add (content type `application/json`, push events).
5. File Manager → `public_html` → copy `config.example.php` to `config.php` and set
   `ALLOW_INDEXING => ''` and `LEAD_EMAIL => 'antonmarklund.com@gmail.com'` (test address;
   Didrik's address only at go-live).

The repo files that ride along (`README.md`, `verify.sh`, `.git`, `docs/`, `tools/`, `lib/`,
`content/`) are blocked by `.htaccess` and checked by `verify.sh`.
