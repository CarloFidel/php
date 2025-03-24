-- Active: 1742312937282@@127.0.0.1@3306@plantas
DROP DATABASE IF EXISTS Plantas;

CREATE DATABASE Plantas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE Plantas;

CREATE TABLE firma_comercial (
  Nom_firma VARCHAR (20) PRIMARY KEY
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

CREATE TABLE mètodes_de_reproducció(
  id_reproduccion SMALLINT(4),
  métode ENUM ('Llavors', 'Esqueix', 'Estaques', 'Bulbs', 'Capificats', 'Estolons'),
  PRIMARY KEY (id_reproduccion)
)ENGINE=innoDB;

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

INSERT INTO planta VALUES ('Geranium', 'Gerani', 'Primavera' );
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
INSERT INTO metode_reproduccio VALUES ('Bulbs');
