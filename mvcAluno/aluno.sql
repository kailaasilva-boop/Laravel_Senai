create database alunoLaravel2;
use alunoLaravel2;

CREATE TABLE alunos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    created_at timestamp null,
    updated_at timestamp null
);