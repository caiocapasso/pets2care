CREATE DATABASE IF NOT EXISTS pets2care default character set utf8 default collate utf8_general_ci;
USE pets2care;

CREATE TABLE USUARIOS (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(60) NOT NULL,
    senha VARCHAR(30) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    genero VARCHAR(10) NOT NULL,
    nascimento DATE NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(200) NOT NULL
);

CREATE TABLE ANIMAIS (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Usuario INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(30) NOT NULL,
    raca VARCHAR(20) NOT NULL,
    nascimento DATE,
    sexo VARCHAR(10) NOT NULL,
    vacinado VARCHAR(5) NOT NULL,
    vermifugado VARCHAR(5) NOT NULL,
    castrado VARCHAR(5) NOT NULL,
    deficit VARCHAR(2000),
    descricao VARCHAR(2000) NOT NULL,
    foto VARCHAR(200),
    FOREIGN KEY (id_Usuario) REFERENCES USUARIOS (id)
);