create database mvcFilme;
use mvcFilme;

CREATE TABLE Filme (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) null,
    data_lancamento double null,
    sinopse  VARCHAR(100) null,
    genero VARCHAR(100) null,
    orcamento double null,
    created_at timestamp null,
    updated_at timestamp null
);

select * from Filme;
select * from Autor;

CREATE TABLE Autor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255) NULL,
    data_nascimento int NULL,
    email varchar(255) NULL,
    telefone int NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE Filme
ADD COLUMN autor_id INT NULL,
ADD CONSTRAINT fk_filme_autor
FOREIGN KEY (autor_id)
REFERENCES Autores(id)
ON DELETE SET NULL;
