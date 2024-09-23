CREATE DATABASE crudAulas;

USE crudAulas;

CREATE TABLE professores(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL

);
CREATE TABLE aulas(
	id INT PRIMARY KEY AUTO_INCREMENT,
    sala VARCHAR(100) NOT NULL,
    materia VARCHAR(100) NOT NULL,
    data_aula DATE NOT NULL
    
);
CREATE TABLE diario (
	id INT PRIMARY KEY AUTO_INCREMENT,
    hora_aula VARCHAR(100) NOT NULL,
	id_aulas INT,
    FOREIGN KEY (id_aulas) REFERENCES aulas(id),
    id_professores INT,
    FOREIGN KEY (id_professores) REFERENCES professores(id)
);