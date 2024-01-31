CREATE DATABASE IF NOT EXISTS login;

USE login;

------ TABELA DE USUÁRIOS

CREATE TABLE users(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    `username` VARCHAR(20) NOT NULL,
    `password` VARCHAR(9) NOT NULL,
    `levelAccess` INT(10) DEFAULT 1 NOT NULL,
)