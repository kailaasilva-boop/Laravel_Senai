create database mvc_empresa;
use mvc_empresa;

CREATE TABLE Empresa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) null,
    tipo_materia_prima VARCHAR(100) null,
    data_fabricacao VARCHAR(100) NULL,
    quantidade double null,
    preco_venda double null,
    created_at timestamp null,
    updated_at timestamp null
);