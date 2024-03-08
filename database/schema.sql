-- user - id - auto increment - username - password - phone number - address - email optional - full name

DROP DATABASE IF EXISTS GYM;

CREATE DATABASE GYM;

USE GYM;

CREATE TABLE USER (
    ID INT,
    USERNAME VARCHAR(255),
    PASSWORD VARCHAR(255),
    PHONE_NO VARCHAR(30),
    ADDRESS VARCHAR(255),
    EMAIL VARCHAR(255),
    FULL_NAME VARCHAR(255)
);

INSERT INTO USER (
    ID,
    USERNAME,
    PASSWORD
) VALUES (
    1,
    'remon',
    'remon'
);