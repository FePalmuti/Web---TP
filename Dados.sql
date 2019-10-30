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

CREATE TABLE Pergunta (
	numero int,
	instrucoes varchar(100),
	descricao varchar(100),
	sem_descricao boolean,
	tipo enum('discreto', 'continuo'),
	id_teste int,
	CONSTRAINT fk_Pergunta_Teste
		FOREIGN KEY (id_teste)
		REFERENCES Teste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (numero, id_teste)
);

CREATE TABLE Imagem (
	arquivo varchar(200),
	grau int,
    num_pergunta int,
    id_teste int,
	CONSTRAINT fk_Imagem_Num_Pergunta
		FOREIGN KEY (num_pergunta)
		REFERENCES Pergunta (numero)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT fk_Imagem_ID_Teste
		FOREIGN KEY (id_teste)
		REFERENCES Teste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (grau, num_pergunta, id_teste)
);
