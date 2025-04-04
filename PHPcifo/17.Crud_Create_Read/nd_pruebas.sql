-- Active: 1742225238351@@127.0.0.1@3306@pruebas
DROP DATABASE IF EXISTS pruebas;

CREATE DATABASE pruebas DEFAULT CHARACTER SET utf8mb4;

USE pruebas;

CREATE TABLE datos_usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  Nombres varchar(50),
  Apellidos varchar(50)
); 
ENGINE=InnoDB;

INSERT INTO datos_usuarios (Nombres, Apellidos) VALUES ('Oscar','Eroles'),('Santiago', 'Perolillos')