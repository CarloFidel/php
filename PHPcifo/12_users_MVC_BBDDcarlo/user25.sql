-- Active: 1742235784523@@127.0.0.1@3306@user2025
DROP DATABASE IF EXISTS users2025;


CREATE DATABASE user2025 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE user2025;


CREATE TABLE usuarios(
  id INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT, /*not null quiere decir que no puede estar vacio*/
  usuario VARCHAR(20) NOT NULL,
  email VARCHAR(33) NOT NULL
)

ENGINE=InnoDB;