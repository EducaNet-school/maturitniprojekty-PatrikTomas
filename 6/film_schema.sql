delimiter ,,



CREATE PROCEDURE smazat_prazdne_kategorie()
BEGIN
  DECLARE hotovo INT DEFAULT FALSE;
  DECLARE kategorie_idp INT;
  DECLARE kurzor CURSOR FOR SELECT id FROM kategorie;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET hotovo = TRUE;
  OPEN kurzor;
  kategorie_loop: LOOP
    FETCH kurzor INTO kategorie_idp;
    IF hotovo THEN
      LEAVE kategorie_loop;
    END IF;
    SELECT COUNT(*) INTO @pocetfilmu FROM filmskategorie WHERE kategorie_id = kategorie_idp;
    IF @pocetfilmu = 0 THEN
      DELETE FROM kategorie WHERE id = kategorie_idp;
    END IF;
  END LOOP;
  CLOSE kurzor;
END,,

CREATE FUNCTION nejdelsi_film_kategorie(
nazev_kategorie VARCHAR(200))
RETURNS INT
DETERMINISTIC
BEGIN
	SELECT f.delka INTO @vysledek FROM film AS f JOIN filmskategorie AS fk ON f.id = fk.film_id JOIN kategorie AS k 	ON fk.kategorie_id = k.id WHERE k.nazev = nazev_kategorie ORDER BY f.delka DESC LIMIT 1;
	RETURN @vysledek;
END,,

delimiter ;

CREATE VIEW pocet_hercu_filmu AS SELECT f.nazev, COUNT(h.id) AS pocet FROM film as f JOIN filmsherec as fh ON f.id = fh.film_id JOIN herec as h ON fh.herec_id = h.id GROUP BY f.id;
