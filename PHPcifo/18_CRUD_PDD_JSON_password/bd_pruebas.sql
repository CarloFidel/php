-- Active: 1742225238351@@127.0.0.1@3306@bd_pruebas_ii
CREATE DATABASE IF NOT EXISTS bd_pruebas_II;

USE bd_pruebas_II

CREATE TABLE datos_usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),   
  apellido VARCHAR(50),
  email VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  tipo_usuario TINYINT NOT NULL CHECK (tipo_usuario IN (1, 2)),
  CONSTRAINT chk_tipo_usuario CHECK (tipo_usuario IN (1, 2))
);

DROP TABLE IF EXISTS datos_usuarios;

INSERT INTO datos_usuarios (nombre, apellido, email, password, tipo_usuario)
VALUES ('Oscar', 'Eroles', 'osacar@ejemplo.com', '$2y$10$EAQwHCMa2HlP/3NTFSlq2ewlxJ7yjsDsbZ8eKmgJmrOR9fN3u7ji6', 1);

INSERT INTO datos_usuarios (nombre, apellido, email, password, tipo_usuario) VALUES ('Santiago', 'Perolillos', 'santiago@ejemplo.com', '$2y$10$27TZyddljSDDSoLdkQkec.fUq5Oki9oRNnzwmYapTSp.Z7v0Ax9iW', 2)