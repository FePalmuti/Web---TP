DROP DATABASE Dados;
CREATE DATABASE Dados;
USE Dados;

CREATE TABLE Pesquisador (
	id int NOT NULL AUTO_INCREMENT,
	nome varchar(30),
	senha varchar(30),
	adm boolean DEFAULT true,
	PRIMARY KEY (id),
	UNIQUE (nome, senha)
);

CREATE TABLE Teste (
	id int NOT NULL AUTO_INCREMENT,
	codigo_acesso varchar(30),
	nome varchar(30),
	descricao varchar(100),
	id_pesquisador int,
	CONSTRAINT fk_Teste_Pesquisador
		FOREIGN KEY (id_pesquisador)
		REFERENCES Pesquisador (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (id),
	UNIQUE (codigo_acesso)
);

INSERT INTO Pesquisador (nome, senha) VALUES ("Felipe", "123");
INSERT INTO Teste (codigo_acesso, nome, descricao, id_pesquisador) VALUES ("abc", "oi", "tchau", "1");
INSERT INTO Teste (codigo_acesso, nome, descricao, id_pesquisador) VALUES ("abcde", "ola", "adeus", "1");
