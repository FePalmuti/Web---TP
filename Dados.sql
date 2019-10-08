DROP DATABASE Dados;
CREATE DATABASE Dados;
USE Dados;

CREATE TABLE Pesquisador (
	id int NOT NULL AUTO_INCREMENT,
	nome varchar(30),
	senha varchar(30),
	adm boolean DEFAULT true,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

SELECT * FROM Pesquisador;
