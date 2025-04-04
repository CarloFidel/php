-- Active: 1742225238351@@127.0.0.1@3306@permis
CREATE DATABASE usuariosonpassword DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE usuariosonpassword;

CREATE TABLE usuarios (
  id INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usuario VARCHAR(20) NOT NULL,
  email VARCHAR(33) NOT NULL,
  password VARCHAR(255) NOT NULL
) 
ENGINE=InnoDB;

DROP TABLE usuarios

ALTER TABLE usuarios AUTO_INCREMENT = 1;

SHOW CREATE TABLE usuarios;


