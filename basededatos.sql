CREATE DATABASE asistenciatramvet;
/*
	Creacion de una base de datos
 */
USE asistenciatramvet;

CREATE TABLE rfid_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rfid_code VARCHAR(255),
    fecha DATE,
    hora TIME
);
