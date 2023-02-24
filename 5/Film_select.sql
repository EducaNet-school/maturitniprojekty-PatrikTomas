SELECT f.nazev, COUNT(h.id) AS pocet FROM film as f JOIN filmsherec as fh ON f.id = fh.film_id JOIN herec as h ON fh.herec_id = h.id GROUP BY f.id;

SELECT h.jmeno, h.prijmeni, f.nazev AS nazev_filmu FROM herec as h JOIN filmsherec as fh ON h.id = fh.herec_id JOIN film as f ON fh.film_id = f.id;

SELECT f.nazev, COUNT(o.id) AS pocet_oceneni FROM film as f JOIN oceneni as o ON o.film_id = f.id GROUP BY f.id ORDER BY pocet_oceneni DESC;

SELECT DISTINCT h.jmeno, h.prijmeni FROM herec as h JOIN filmsherec as fh ON h.id = fh.herec_id JOIN film as f ON fh.film_id = f.id JOIN filmskategorie as fk ON f.id = fk.film_id JOIN kategorie as k ON fk.kategorie_id = k.id WHERE k.nazev = 'Komedie';

SELECT k.nazev, f.nazev, f.delka
FROM (
  SELECT fk.kategorie_id, MAX(f.delka) AS nejdelsi
  FROM filmskategorie as fk
  JOIN film as f ON fk.film_id = f.id
  GROUP BY fk.kategorie_id
) AS nedjelsif
JOIN film as f ON nejdelsif.nejdelsi = f.delka JOIN filmskategorie as fk ON f.id = fk.film_id JOIN kategorie as k ON fk.kategorie_id = k.id WHERE k.id = nejdelsif.kategorie_id;