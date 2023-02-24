create database filmova_kartoteka;
use filmova_kartoteka;
create table film(
     id int not null AUTO_INCREMENT,
     nazev varchar(100),
     popis varchar(2000),
     delka int,
     datum_vydani date,
     primary key (id));

create table kategorie(
     id int not null AUTO_INCREMENT,
     nazev varchar (150),
     primary key (id));

create table herec(
     id int not null AUTO_INCREMENT,
     jmeno varchar (100),
     prijmeni varchar(150),
     primary key (id));

create table oceneni(
     id int not null AUTO_INCREMENT,
     nazev varchar (150),
     popis varchar (2000),
     datum date,
     misto varchar (200),
     primary key (id));

alter table oceneni add column film_id int not null;
alter table oceneni add constraint oceneni_fk foreign key (film_id) references film(id);

create table filmsherec(
     id int not null AUTO_INCREMENT,
     film_id int not null,
     herec_id int not null,
     primary key (id));

alter table filmsherec add constraint film_fk foreign key (film_id) references film(id);
alter table filmsherec add constraint herec_fk foreign key (herec_id) references herec(id);

create table filmskategorie (
     id int not null AUTO_INCREMENT,
     film_id int not null,
     kategorie_id int not null,
     primary key (id));

alter table filmskategorie add constraint filmk_fk foreign key (film_id) references film(id);
alter table filmskategorie add constraint kategorief_fk foreign key (kategorie_id) references kategorie(id);

