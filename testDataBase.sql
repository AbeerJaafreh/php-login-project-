create database testDataBase;
use testDataBase;
create table users(
    id int auto_increment primary key ,
    name varchar(30) NOT NULL,
    email varchar(50)NOT NULL,
    password int ,
    role varchar(10)

);