# Facts to verify with Didrik before go-live

Everything the site states about the business comes from `content/site.php`.
Unconfirmed values are `null` and their component hides.

## Answered by Didrik 2026-10-01 (applied on the site)

| Item | Answer | Applied |
|---|---|---|
| Award arrangör | Företagarna i Nynäshamn | award text now names Företagarna Nynäshamn. Year still unknown |
| Grundat 2019 | Yes | confirmed |
| Behörig / registrering | "Räcker väl med att vi är registrerade där" (Elsäkerhetsverket) | no registration number stored; "behörig" wording kept |
| Öppettider | 07–16 | now "Mån–fre 07–16, lör–sön stängt". **Weekdays are my assumption — confirm** |
| Svarstid | "Inom några dagar?" (unsure) | neutral "Vi hör av oss så snart vi kan" until confirmed |
| Eljour / akuta jobb | "Ibland" (assumed to be Anton's call-out question) | /eljour/ wording is already conditional ("besked om när vi kan komma"); no night/24-7 claims. Confirm which question this answered |
| Luftvärmepump | Återförsäljare åt Mitsubishi Electric, Toshiba, Gree; kan köpa in vilket märke som helst | brand section on /luftvarmepump/. Köldmedie-certifiering still unanswered (not claimed) |
| Solceller | "Nej inga solceller" | applied: /solceller/ + /solcellsbatteri/ removed (301 → /tjanster/), mentions stripped. Neutral tax info remains in the grönt-avdrag guide |
| Luft-vatten / berg / frånluft | Ja luft-vatten värmepumpar | /varmepump/ keeps luft-vatten; bergvärme/frånluft/pool not confirmed |
| Områden | "Allt söder om stan" | area pages Haninge/Tyresö/Huddinge/Södertälje/Stockholm (södra) confirmed. **Nacka not explicitly confirmed** |
| Elbesiktning | "Genomgång av elanläggningar, konsultation" | page reworded: genomgång + råd. No written protocol/revision claim |
| Instagram / Facebook | Instagram asplundeltjanst; Facebook "Asplund eltjänst" | Instagram link matches. **Facebook URL needed** (not guessed) |

## Still open

| # | Claim on site | Where | Action |
|---|---|---|---|
| 1 | "2000+ utförda jobb" | home stats, trust row, /om-oss/ | Didrik: "måste kolla upp". Keep or change |
| 2 | Award year | home pill, /om-oss/ | Add year if known |
| 3 | Elarbete för solceller / hembatteri | (removed) | Ask: does he do the electrical connection of someone else's panels/battery? If yes, a reframed page can return |
| 4 | Nacka | /elektriker-nacka/ | Confirm he drives there |
| 5 | Köldmedie-certifiering (luft-luft) | /luftvarmepump/ | Own or partner? Not claimed today |
| 6 | Bergvärme / frånluft / poolvärmepump el-installation | /varmepump/ | Confirm or trim |
| 7 | Svarstid på förfrågan | /tack/ | Confirm real promise |
| 8 | Facebook URL | footer, schema sameAs | Get link |
| 9 | Öppettider veckodagar | everywhere | Confirm mån–fre |

Missing (component hidden until filled in `content/site.php`):
org.nr + juridiskt namn, Elsäkerhetsverket registration, Google Business Profile
URL + review link, real Google reviews (paste verbatim into `reviews`), photo of
Didrik, Facebook.

Tax rules (content/deductions.php) were checked 2026-10-01: ROT 30 % of labour;
grön teknik 50 % laddbox + batteri, 15 % solceller; max 50 000 kr/person/år.
Re-check every January.
