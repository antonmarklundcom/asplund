# Facts to verify with Didrik before go-live

Everything the site states about the business comes from `content/site.php`.
Unconfirmed values are `null` and their component hides. These claims ARE live
on the staging site and need a yes/no from Didrik:

| # | Claim on site | Where | Source today | Action |
|---|---|---|---|---|
| 1 | "Topp 3-nominerad till Årets Unga Företagare" | home hero pill, /om-oss/ | Anton's pitch, year/arrangör unknown | Confirm exact wording; set `award` to null if unsure |
| 2 | "2000+ utförda jobb" | home stats, trust row, /om-oss/ | Anton 2026-09-09 (old site said 600+) | Confirm number |
| 3 | Grundat 2019 | home, /om-oss/, schema foundingDate | Anton 2026-09-09 | Confirm |
| 4 | "Behörig elektriker" / behörigt elföretag | trust row, FAQ | PLAN.md | Get Elsäkerhetsverket registration → `registration` |
| 5 | Öppettider mån–lör 08–20 | header, footer, kontakt, schema | old website | Confirm |
| 6 | "Vi hör av oss senast nästa arbetsdag" | /tack/ | placeholder promise | Confirm or reword `responseText` |
| 7 | Sells + installs luft-luftvärmepump | /luftvarmepump/ | PLAN.md (Didrik wants to sell) | Confirm köldmedie-certifiering (own or partner) |
| 8 | Solceller incl. panels on roof | /solceller/ | old website listed solceller | Confirm he mounts panels or partners |
| 9 | El-installation for luft-vatten/berg/frånluft, poolvärmepump | /varmepump/ | assumption (standard electrician work) | Confirm |
| 10 | Works in Haninge, Tyresö, Huddinge, Södertälje, skärgården | area pages | old site "Södertörn" | Confirm each; drop a page he won't drive to |
| 11 | Elbesiktning / elkontroll with protocol | /elbesiktning/ | assumption | Confirm he offers it |
| 12 | Instagram link | footer, schema sameAs | old website | Confirm active |

Missing (component hidden until filled in `content/site.php`):
org.nr + juridiskt namn, Elsäkerhetsverket registration, Google Business Profile
URL + review link, real Google reviews (paste verbatim into `reviews`), photo of
Didrik, Facebook.

Tax rules (content/deductions.php) were checked 2026-10-01: ROT 30 % of labour;
grön teknik 50 % laddbox + batteri, 15 % solceller; max 50 000 kr/person/år.
Re-check every January.
