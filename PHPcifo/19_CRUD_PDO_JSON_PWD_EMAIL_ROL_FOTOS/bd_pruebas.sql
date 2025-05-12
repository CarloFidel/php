-- Active: 1742225238351@@127.0.0.1@3306@usuarisrol
DROP DATABASE IF EXISTS usuarisrolc;
CREATE DATABASE  usuarisrolc DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE usuarisrolc;
CREATE TABLE datos_usuarios (
      id INT PRIMARY KEY AUTO_INCREMENT,
      nombre VARCHAR(50),
      usuario VARCHAR(30),
      email VARCHAR(100) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL,
      tipo_usuario TINYINT NOT NULL CHECK (tipo_usuario IN (1, 2)),
      foto VARCHAR(255),
      CONSTRAINT chk_tipo_usuario CHECK (tipo_usuario IN (1, 2))
      );
INSERT INTO datos_usuarios (nombre, usuario, email, password, tipo_usuario, foto) 
VALUES ('Oscar', 'Eroles', 'oscar@ejemplo.com', '$2y$14$y8C1SGalwVADZyBLGgaSAuic7RRzb4J6EDLrwBd6OykjxALzH7hZC', 1, "default_user.svg");
INSERT INTO datos_usuarios (nombre, usuario, email, password, tipo_usuario, foto) 
VALUES ('Santiago', 'Perolillos', 'santiago@ejemplo.com', '$2y$14$T8abg7yuw4iMXyvmr9oQneX5aoxz0Oy29StkxakzH9h6.jjQXGXMS', 2, "default_user.svg");
