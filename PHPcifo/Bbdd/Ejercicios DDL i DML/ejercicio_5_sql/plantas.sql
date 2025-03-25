-- Active: 1742312937282@@127.0.0.1@3306@plantas
DROP DATABASE IF EXISTS Plantas;

CREATE DATABASE Plantas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE Plantas;

CREATE TABLE firma_comercial (
  nom_firma VARCHAR (20) PRIMARY KEY
)ENGINE=InnoDB;
CREATE TABLE adob(
  nom_adob VARCHAR(20) UNIQUE,
  firma_comercial VARCHAR(20) NOT NULL ,
  tipus_adob ENUM ('LLD', 'AI'),
  PRIMARY KEY (nom_adob),
  FOREIGN KEY (Firma_comercial) REFERENCES firma_comercial(Nom_firma)
)ENGINE=InnoDB;

CREATE TABLE estacio (
  estacio VARCHAR (10) PRIMARY KEY
)ENGINE=InnoDB;

CREATE TABLE planta (
  nom_cientific  VARCHAR (30) NOT NULL, 
  nom_popular  VARCHAR(20) UNIQUE,
  floracio VARCHAR (10),
  FOREIGN KEY (floracio) REFERENCES estacio(estacio),
  PRIMARY KEY (nom_cientific)
)ENGINE=innoDB;

CREATE TABLE metodes_reproduccio(
  nom_metode VARCHAR(10),
  PRIMARY KEY (nom_metode)
)ENGINE=innoDB;

CREATE TABLE planta_interior(
  nom_planta VARCHAR(30) PRIMARY KEY,
  ubicacio VARCHAR (40) NOT NULL,
  temperatura SMALLINT (2) NOT NULL,
  FOREIGN KEY (nom_planta) REFERENCES planta(nom_cientific)
)ENGINE=innoDB;

CREATE TABLE planta_exterior(
  nom_planta VARCHAR(30) PRIMARY KEY,
  tipus_planta ENUM('P', 'T'),
  FOREIGN KEY (nom_planta) REFERENCES planta(nom_cientific)
)ENGINE=innoDB;


CREATE TABLE exemplars_plantes(
  nom_planta VARCHAR (30) NOT NULL, 
  num_examplar SMALLINT(2),
  PRIMARY KEY (nom_planta, num_examplar),
  FOREIGN KEY (nom_planta) REFERENCES planta(nom_cientific)
)ENGINE=innoDB;

CREATE TABLE dosi_adob (
  nom_planta VARCHAR(30) NOT NULL,  
  estacio VARCHAR (10) NOT NULL,
  nom_adob VARCHAR(15) NOT NULL,
  quantitat_adob SMALLINT(3) NOT NULL CHECK (quantitat_adob>=20 AND quantitat_adob<=100),
  PRIMARY KEY (nom_planta, estacio, nom_adob),
  FOREIGN KEY (nom_planta) REFERENCES planta(nom_cientific),
  FOREIGN KEY (estacio) REFERENCES estacio(estacio),
  FOREIGN KEY (nom_adob) REFERENCES adob(nom_adob)
  )ENGINE=InnoDB;

CREATE TABLE reproduccio(
  met_reproducc VARCHAR(10),
  nom_planta VARCHAR (30) NOT NULL,
  grau_exit ENUM('Alt', 'Baix', 'Mitjà'),
  PRIMARY KEY (met_reproducc, nom_planta ),
  FOREIGN KEY (nom_planta) REFERENCES planta(nom_cientific),
  FOREIGN KEY (met_reproducc) REFERENCES metodes_reproduccio(nom_metode)
  )ENGINE=InnoDB;


INSERT INTO firma_comercial VALUES ('UOCADOB');
INSERT INTO firma_comercial VALUES ('TIRSADOB');
INSERT INTO firma_comercial VALUES ('PRISADOB');
INSERT INTO firma_comercial VALUES ('CIRSADOB');

INSERT INTO adob VALUES ('Plantavit', 'UOCADOB', 'LLD');
INSERT INTO adob VALUES ('Vitaplant', 'TIRSADOB', 'AI');
INSERT INTO adob VALUES ('Nutreplant', 'CIRSADOB', 'LLD');
INSERT INTO adob VALUES ('Creixplant', 'PRISADOB', 'AI');
INSERT INTO adob VALUES ('Casadob', 'TIRSADOB', 'AI');
INSERT INTO adob VALUES ('Superplant', 'PRISADOB', 'LLD');
INSERT INTO adob VALUES ('Plantadob', 'CIRSADOB', 'AI');
INSERT INTO adob VALUES ('Sanexplant', 'UOCADOB', 'LLD');

INSERT INTO estacio VALUES ('ivern');
INSERT INTO estacio VALUES ('estiu');
INSERT INTO estacio VALUES ('tardor');
INSERT INTO estacio VALUES ('primavera');

INSERT INTO planta VALUES ('Geranium', 'Gerani', 'Primavera');
INSERT INTO planta VALUES ('Begonia ', 'Begònia', 'Estiu');
INSERT INTO planta VALUES ('Camellia ', 'Camèlia', 'Primavera');
INSERT INTO planta VALUES ('Cyclamen ', 'Ciclamen', 'ivern');
INSERT INTO planta VALUES ('Rosa ', 'Roser', 'Primavera');
INSERT INTO planta VALUES ('Polystichum ', 'Falguera', NULL);
INSERT INTO planta VALUES ('Tulipa ', 'Tulipa', 'Primavera');
INSERT INTO planta VALUES ('Chrysanthemum ', 'Crisantem', 'Estiu');
INSERT INTO planta VALUES ('Philodendron ', 'Potus', NULL);
INSERT INTO planta VALUES ('Chlorophytum ', 'Cintes', NULL);
INSERT INTO planta VALUES ('Euphorbia ', 'Poinsetia', 'ivern');
INSERT INTO planta VALUES ('Hedera ', 'Heura', NULL);
INSERT INTO planta VALUES ('Ficus ', 'Ficus Benjamina', NULL);
INSERT INTO planta VALUES ('Codiaeum ', 'Croton', NULL);


INSERT INTO metodes_reproduccio VALUES ('Llavors');
INSERT INTO metodes_reproduccio VALUES ('Esqueix');
INSERT INTO metodes_reproduccio VALUES ('Estaques');
INSERT INTO metodes_reproduccio VALUES ('Bulbs');
INSERT INTO metodes_reproduccio VALUES ('Capficats ');
INSERT INTO metodes_reproduccio VALUES ('Estolons ');
INSERT INTO planta_interior VALUES ('Philodendron ', 'LLum directa', 15);
INSERT INTO planta_interior VALUES ('Euphorbia ', 'LLum indirecta', 18);
INSERT INTO planta_interior VALUES ('Ficus ', 'LLum indirecta', 19);
INSERT INTO planta_interior VALUES ('Codiaeum ', 'No corrents', 17);

INSERT INTO planta_exterior VALUES ('Geranium ', 'P');
INSERT INTO planta_exterior VALUES ('Begonia rex ', 'P');
INSERT INTO planta_exterior VALUES ('Camellia ', 'P');
INSERT INTO planta_exterior VALUES ('Cyclamen ', 'P');
INSERT INTO planta_exterior VALUES ('Rosa ', 'P');
INSERT INTO planta_exterior VALUES ('Tulipa ', 'T');
INSERT INTO planta_exterior VALUES ('Chrysanthemum ', 'T');
INSERT INTO planta_exterior VALUES ('Chlorophytum ', 'P');
INSERT INTO planta_exterior VALUES ('Hedera ', 'P');

INSERT INTO exemplars_plantes VALUES ('Geranium ', 6);
INSERT INTO exemplars_plantes VALUES ('Begonia ', 4);
INSERT INTO exemplars_plantes VALUES ('Rosa  ', 3);
INSERT INTO exemplars_plantes VALUES ('Hedera  ', 4);
INSERT INTO exemplars_plantes VALUES ('Ficus  ', 2);
INSERT INTO exemplars_plantes VALUES ('Euphorbia  ', 3);
INSERT INTO exemplars_plantes VALUES ('Codiaeum  ', 2);
INSERT INTO exemplars_plantes VALUES ('Cyclamen   ', 2);


INSERT INTO dosi_adob VALUES ('Geranium','Primavera','Casadob', 30);
INSERT INTO dosi_adob VALUES ('Geranium','ivern','Vitaplant', 20);
INSERT INTO dosi_adob VALUES ('Begonia ','Estiu','Casadob', 25);
INSERT INTO dosi_adob VALUES ('Camellia','ivern','Plantavit', 50);
INSERT INTO dosi_adob VALUES ('Camellia','Primavera','Casadob', 75);
INSERT INTO dosi_adob VALUES ('Cyclamen','Tardor','Casadob', 30);
INSERT INTO dosi_adob VALUES ('Chrysanthemum','Primavera','Casadob', 45);
INSERT INTO dosi_adob VALUES ('Begonia','Primavera',
'Nutreplant', 50);
INSERT INTO dosi_adob VALUES ('Rosa ','Primavera','Creixplant', 50);
INSERT INTO dosi_adob VALUES ('Rosa ','Primavera','Casadob', 30);

INSERT INTO dosi_adob VALUES ('Polystichum','Primavera','Casadob', 40);
INSERT INTO dosi_adob VALUES ('Polystichum','Tardor','Plantadob', 20);
INSERT INTO dosi_adob VALUES ('Tulipa','ivern','Casadob', 40);
INSERT INTO dosi_adob VALUES ('Philodendron','Primavera','Casadob', 40);
INSERT INTO dosi_adob VALUES ('Chlorophytum','Tardor','Casadob', 30);
INSERT INTO dosi_adob VALUES ('Chlorophytum','ivern','Superplant', 40);
INSERT INTO dosi_adob VALUES ('Euphorbia','ivern','Casadob', 50);
INSERT INTO dosi_adob VALUES ('Euphorbia','ivern','Sanexplant', 40);
INSERT INTO dosi_adob VALUES ('Hedera','Primavera','Casadob', 45);
INSERT INTO dosi_adob VALUES ('Codiaeum','Primavera','Casadob', 60);
INSERT INTO dosi_adob VALUES ('Codiaeum','Estiu','Casadob', 50);
INSERT INTO dosi_adob VALUES ('Geranium','Estiu','Sanexplant', 40);
INSERT INTO dosi_adob VALUES ('Ficus','Primavera','Casadob', 50);

INSERT INTO reproduccio VALUES ('Esqueix', 'Geranium', 'Alt'),('Esqueix','Begonia', 'Alt'),('Capficats','Begonia', 'Alt'),('Llavors','Begonia', 'Baix'),('Estaques','Rosa', 'Mitjà'),('Bulbs','Rosa', 'Alt'),('Estolons','Chlorophytum', 'Alt'),('Esqueix','Cyclamen', 'Alt'),('Capficats','Cyclamen', 'Mitjà'),('Capficats','Philodendron', 'Alt'),('Esqueix','Philodendron', 'Alt')

SELECT *FROM planta

SELECT nom_cientific, floracio FROM planta;

SELECT nom_cientific, AS nom, floracio AS estacio_de_floracio FROM planta;

SELECT nom_cientific AS nom, floracio estacio_de_floracio
FROM planta
WHERE floracio='ivern';

/* a) Mostra les firmes comercials que existeixen.
b) Mostra el nom científic de les plantes que necessiten llum directa.
c) Mostra el nom científic de les plantes i les quantitats d’adobs de les que el reben major o igual a 50.
d) Mostra el nom científic de les plantes que el seu mètode de reproducció és Esqueix amb un grau d’èxit alt.
e) Mostra el nom científic de les plantes que tenen 4 o més exemplars */
SELECT  nom_firma FROM firma_comercial;
SELECT nom_cientific, floracio FROM planta;

SELECT nom_planta, quantitat_adob FROM dosi_adob WHERE quantitat_adob>=50;

SELECT nom_planta
FROM reproduccio
WHERE met_reproducc='Esqueix' AND grau_exit = 'Alt';

SELECT nom_planta
FROM exemplars_plantes
WHERE num_examplar = 4;

SELECT DISTINCT nom_planta FROM dosi_adob WHERE estacio='primavera'

SELECT DISTINCT nom_adob
FROM dosi_adob
WHERE quantitat_adob BETWEEN 40 AND 50 AND
estacio='primavera';

SELECT nom_adob
FROM adob
WHERE firma_comercial IN ('TIRSADOB','PRISADOB');

SELECT nom_adob
FROM adob
WHERE firma_comercial NOT IN ('TIRSADOB', 'PRISADOB');

/*Mostra el nom popular de les plantes que el seu nom comença amb C*/
SELECT nom_cientific
FROM planta
WHERE nom_popular LIKE 'C%';

/* Mostra el nom popular de les plantes que el seu nom comença amb C i tenen sis caràcters */
SELECT nom_popular
FROM planta
WHERE nom_popular LIKE 'C_____';

/* Exercici 23 */
SELECT nom_cientific, nom_popular FROM planta