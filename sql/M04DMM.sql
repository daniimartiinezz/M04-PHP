CREATE DATABASE M04DMM;
USE M04DMM;
CREATE TABLE USUARIOS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Apellidos VARCHAR(150),
    Email VARCHAR(150) UNIQUE,
    Telefono VARCHAR(20),
    FechaRegistro DATETIME DEFAULT CURRENT_TIMESTAMP
);