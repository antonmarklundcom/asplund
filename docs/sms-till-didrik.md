# SMS till Didrik – faktakoll inför lansering

Skapad 2026-10-01 från `facts-to-verify.md` (punkt 1–7 och 9, plus eljour-frågan).
Punkt 8/8b (Google-länkar, GBP-öppettider/namn) är Antons egna uppgifter och ingår inte.

Skicka som två SMS. Frågorna är numrerade så att Didrik kan svara kort, t.ex. "1 ja, 2 nej, 3 ja".
**Ändra inget på sajten förrän svaren kommit.** Skriv in svaren i `facts-to-verify.md` och uppdatera sedan `content/site.php` / sidorna.

## SMS 1

> Hej Didrik! Nya hemsidan är nästan klar. Jag behöver bekräfta några saker så att den bara säger sånt som stämmer. Svara gärna med siffra + ja/nej/kort svar:
>
> 1. Vi skriver "2000+ utförda jobb". Stämmer det, eller vad är ett rimligt antal?
> 2. Vilket år var nomineringen till Årets Unga Företagare (Företagarna Nynäshamn)?
> 3. Jobbar du även i Nacka?
> 4. Är vi öppna mån–fre 07–16 (lör–sön stängt)?

## SMS 2

> Några till:
>
> 5. Vilken svarstid kan vi lova på en förfrågan? (t.ex. "samma dag" eller "inom 2 dagar")
> 6. Eljour: kan vi säga att ni "ibland" kan komma samma dag/kväll vid akuta fel, eller ska vi inte lova något?
> 7. Luftvärmepump: har du köldmedie-certifiering själv, eller tar någon annan den delen?
> 8. Gör ni elinstallation för bergvärme, frånluft eller poolvärmepump, eller bara luft-luft och luft-vatten?
> 9. Kopplar ni in el åt solceller/hemmabatteri som någon annan satt upp? (Vi säljer inga solceller på sajten.)

## Vad varje svar styr på sajten

| Nr | Svar ändrar | Fil / plats |
|---|---|---|
| 1 | Antal jobb (hero-statistik, trust-rad, /om-oss/) | `content/site.php` → `jobsDone` |
| 2 | Årtal i utmärkelsen (startsida, /om-oss/) | `content/site.php` → `award` |
| 3 | Om /elektriker-nacka/ ska vara kvar | `content/areas.php`, sitemap, menyer |
| 4 | Öppettider i header, footer, schema, /kontakt/ | `content/site.php` → `openingHours`, `hoursText` |
| 5 | Svarstid på /tack/ och kontaktsidan | `content/site.php` → `responseText` (+ `/tack/` i `content/pages.php`) |
| 6 | Ordalydelse på /eljour/ | `content/services/el.php` (eljour) |
| 7 | Om certifiering får nämnas på /luftvarmepump/ | `content/services/energi.php` |
| 8 | Vilka värmepumpstyper /varmepump/ visar | `content/services/energi.php` |
| 9 | Om en omformulerad el-för-solceller-sida får komma tillbaka | ny sida, annars ingen ändring |
