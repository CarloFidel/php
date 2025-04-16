-- Active: 1742225238351@@127.0.0.1@3306@usuarisrol2
DROP DATABASE IF EXISTS usuarisrol2;
CREATE DATABASE  usuarisrol2 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE usuarisrol2;
CREATE TABLE datos_usuarios (
      id INT PRIMARY KEY AUTO_INCREMENT,
      nombre VARCHAR(50),
      apellido VARCHAR(50),
      email VARCHAR(100) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL,
      tipo_usuario TINYINT NOT NULL CHECK (tipo_usuario IN (1, 2)),
      foto VARCHAR(255) DEFAULT NULL,
      CONSTRAINT chk_tipo_usuario CHECK (tipo_usuario IN (1, 2))
      );
INSERT INTO datos_usuarios (nombre, apellido, email, password, tipo_usuario, foto) 
VALUES ('Oscar', 'Eroles', 'oscar@ejemplo.com', '$2y$14$y8C1SGalwVADZyBLGgaSAuic7RRzb4J6EDLrwBd6OykjxALzH7hZC', 1, "default-user.svg");
INSERT INTO datos_usuarios (nombre, apellido, email, password, tipo_usuario, foto) 
VALUES ('Santiago', 'Perolillos', 'santiago@ejemplo.com', '$2y$14$T8abg7yuw4iMXyvmr9oQneX5aoxz0Oy29StkxakzH9h6.jjQXGXMS', 2, "default-user.svg");
