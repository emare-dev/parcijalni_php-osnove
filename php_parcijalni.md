# PHP OSNOVE - parcijalni ispit

Potrebno je napraviti aplikaciju koja će preko skripte `provjera1.php` preko forme1 upisivati neki
podatak te ga prosljeđivati preko POST metode u skriptu `provjera2.php` koja će, nakon što primi
podatak, provjeriti da li se radi o numeričkoj vrijednosti ili stringu.

Ako se radi o stringu (is_string), tada će ta vrijednost prikazati u tekst polju unutar forme2, te će se ponuditi odabir sljedećih vrijednosti preko checkbox-a:

- izračunaj duljinu stringa
- izračunaj broj riječi
- izračunaj broj interpukcijskih znakova (.!?,;:)
- ispis prve riječi - prvu riječ iz stringa ispisati onoliko puta koliko ima sveukupno riječi u
poslanom stringu.

Poslani string spremiti u session, te nakon toga u datoteku `storage/tekstovi.json`.
Ispisati koliko do sad je obrađeno stringova.

Ako se radi o numeričkoj vrijednosti (is_numeric), zaokružiti je na veći integer (ceil funkcija), tada će ta vrijednost prikazati u tekst polju unutar forme2, te će se ponuditi odabir sljedećih vrijednosti preko radio button-a:

- izračun složenosti (prost/složen) - napraviti funkciju koja će vratiti rezultat
- izračun faktorijela (samo ako je broj manji od 10), inače ispisati: Broj je prevelik za izračun
faktorijela! - napraviti funkciju koja će vratiti rezultat
- prikaz broja u binarnom obliku prema priloženom algoritmu pretvorbe - napraviti funkciju
koja će vratiti rezultat.

Poslanu vrijednost spremiti u cookie u trajanju od 5 min, te nakon toga u datoteku
`storage/brojevi.json`.
Ispisati koliko do sad je obrađeno vrijednosti.

Funkcije držati u odvojenoj datoteci `helpers.php`.

Na kraju ispisati dan, datum i vrijeme u sljedećem formatu:

    Parcijalni ispit: Četvrtak, 26. ožujak 2026 u 19:30:00.

