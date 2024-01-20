user - id - auto increment - username - password - phone number - address - email optional - full name

DROP DATABASE IF EXISTS GYM;

CREATE DATABASE GYM;

USE GYM;

CREATE TABLE USER (
    id int, username varchar(255), password varchar(255), phone_no varchar(30), address varchar(255), email varchar(255), full_name varchar(255)
);

INSERT INTO
    USER (id, username, password,)
VALUES (1, 'remon', 'remon');