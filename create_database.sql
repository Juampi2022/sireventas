CREATE DATABASE ventas_db;

USE ventas_db;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    origin VARCHAR(50),
    project VARCHAR(50),
    eventType VARCHAR(50),
    nextEventDate DATE,
    horaVisita TIME,
    observation TEXT,
    notAnswered BOOLEAN,
    asistio BOOLEAN,
    ultimoResultado VARCHAR(50)
);

CREATE TABLE templates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);