CREATE DATABASE GetInfo;

USE GetInfo;

CREATE TABLE Users (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Gender CHAR(1) NOT NULL,
    Email VARCHAR(100)
);

INSERT INTO Users (Username, Gender, Email) VALUES
    ('Lucia', 'F', 'lucia@getinfo.app'),
    ('Lucy', 'F', 'lucy@getinfo.app'),
    ('Albert', 'M', 'albert@getinfo.app'),
    ('Blake', 'M', 'blake@getinfo.app');
