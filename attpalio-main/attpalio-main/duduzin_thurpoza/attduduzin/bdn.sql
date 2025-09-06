create database bdn;
use bdn;

create table personas (
    id int auto_increment primary key,
    nome varchar(255) not null,
    cpf varchar(15) unique not null,
    telefone varchar(20) not null
);
