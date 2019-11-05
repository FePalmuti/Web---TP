DROP DATABASE Dados;
CREATE DATABASE Dados;
USE Dados;

CREATE TABLE Pesquisador (
	id int NOT NULL,
	nome varchar(30),
	senha varchar(30),
	adm boolean DEFAULT true,
	PRIMARY KEY (id),
	UNIQUE (nome, senha)
);

CREATE TABLE Teste (
	id int NOT NULL,
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
	tipo enum('discreta', 'continua'),
	id_teste int,
	CONSTRAINT fk_Pergunta_Teste
		FOREIGN KEY (id_teste)
		REFERENCES Teste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (numero, id_teste)
);

CREATE TABLE Imagem (
	id int NOT NULL,
	arquivo varchar(30),
	PRIMARY KEY (id),
	UNIQUE (arquivo)
);

CREATE TABLE Alternativa (
	arquivo_imagem varchar(30),
	grau int,
	num_pergunta int,
	id_teste int,
	CONSTRAINT fk_Alternativa_ID_Imagem
		FOREIGN KEY (arquivo_imagem)
		REFERENCES Imagem (arquivo)
		ON DELETE SET NULL
		ON UPDATE SET NULL,
	CONSTRAINT fk_Alternativa_Num_Pergunta
		FOREIGN KEY (num_pergunta)
		REFERENCES Pergunta (numero)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT fk_Alternativa_ID_Teste
		FOREIGN KEY (id_teste)
		REFERENCES Teste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (grau, num_pergunta, id_teste)
);

CREATE TABLE RespostaTeste (
	id int NOT NULL,
	id_teste int,
	CONSTRAINT fk_RespostaTeste_ID_Teste
		FOREIGN KEY (id_teste)
		REFERENCES Teste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (id)
);

CREATE TABLE RespostaPergunta (
	entrada_participante varchar(30),
	grau_escolhido int,
	numero_pergunta int,
	id_resposta_teste int,
	CONSTRAINT fk_RespostaPergunta_RespostaTeste
		FOREIGN KEY (id_resposta_teste)
		REFERENCES RespostaTeste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (numero_pergunta, id_resposta_teste)
);

CREATE TABLE DadosDemograficos (
	email varchar(30),
	telefone varchar(30),
	idade int,
	sexo enum('masculino', 'feminino'),
	cep varchar(10),
	etnia enum('branco', 'pardo', 'negro', 'amarelo', 'indigena'),
	id_resposta_teste int,
	CONSTRAINT fk_DadosDemograficos_RespostaTeste
		FOREIGN KEY (id_resposta_teste)
		REFERENCES RespostaTeste (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (id_resposta_teste)
);
