-- Database Create Command
CREATE DATABASE news;

-- TAble Create Command
CREATE TABLE users (
    id INT NOT NULL	AUTO_INCREMENT,
    username VARCHAR(200) NOT NULL ,
    email VARCHAR(200),
    password VARCHAR(400),
    number INT,
    gender VARCHAR(100),
    role INT,
    data VARCHAR(200),
    PRIMARY KEY (id)
);



