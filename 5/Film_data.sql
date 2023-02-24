INSERT INTO film (nazev, popis, delka, datum_vydani)
VALUES
('Piráti z Karibiku', 'Film o dobrodružství kapitána Jacka Sparrowa a jeho posádky', 143, '2011-05-18'),
('Kamarád taky rád', 'Romantická komedie o kamarádství a lásce', 111, '2000-02-24'),
('Babička', 'Drama o staré babičce, která pečuje o svého vnuka', 90, '2019-09-12'),
('Chlap na střídačku', 'Komedie o mladém muži, který se musí starat o svého bratra s Downovým syndromem', 95, '2014-11-20'),
('Kudykam', 'Dobrodružný film o skupině turistů, kteří se ztratí v divočině', 120, '2017-08-10');

INSERT INTO kategorie (nazev)
VALUES
('Akční'),
('Komedie'),
('Drama'),
('Horor');

INSERT INTO filmskategorie (film_id, kategorie_id)
VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 1),
(5, 4);

INSERT INTO herec (jmeno, prijmeni)
VALUES
('Johnny', 'Depp'),
('Orlando', 'Bloom'),
('Keira', 'Knightley'),
('Ashton', 'Kutcher'),
('Amanda', 'Peet'),
('Jan', 'Tříska'),
('Jiří', 'Bartoška'),
('Jana', 'Plodková');

INSERT INTO filmsherec (film_id, herec_id)
VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7),
(4, 6),
(4, 8),
(5, 7),
(5, 8);

INSERT INTO oceneni (nazev, popis, datum, misto, film_id)
VALUES
('Cena diváků', 'Ocenění pro nejoblíbenější film podle hlasování diváků', '2020-02-10', 'Praha', 1),
('Zlatá pecka', 'Ocenění pro nejlepší herečku', '2018-05-15', 'Brno', 3),
('Cena festivalu', 'Ocenění za nejlepší režii', '2017-09-20', 'Karlovy Vary', 4),
('Stříbrný glóbus', 'Ocenění za nejlepší kameru', '2019-12-05', 'Ostrava', 2),
('Zlatá nymfa', 'Ocenění za nejlepší scénář', '2016-06-30', 'Monte Carlo', 5);