-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-09-2020 a las 16:37:17
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

-- Borrar tablas
DROP TABLE DATOS;
DROP TABLE USUARIOS;


-- Crear tablas

CREATE TABLE USUARIOS (nombre varchar(50), dni varchar(10), telefono varchar(9), nacimiento varchar(10), email varchar(50), usuario varchar(50), contraseña varchar(50), primary key (usuario) );

CREATE TABLE DATOS (dato1 varchar(25), dato2 varchar(25), dato3 varchar(25), dato4 varchar(25), dato5 varchar(25), primary key (dato1));

INSERT INTO DATOS VALUES ('El beso', 'Gustav Klimt', '90', '60', '20');

INSERT INTO DATOS VALUES ('Mona Lisa', 'da Vinci', '60', '70', '30');
INSERT INTO DATOS VALUES ('El grito', 'Edvard Munch', '50', '90', '50');
INSERT INTO DATOS VALUES ('Guernica', 'Pablo Picaso', '30', '70', '40');
INSERT INTO DATOS VALUES ('Las Meninas', 'Diego de Velazquez', '40', '20', '70');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
