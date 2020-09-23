-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2020 a las 00:18:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Base de datos: `prueba-xml`
  --
  CREATE DATABASE IF NOT EXISTS `prueba-xml` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prueba-xml`;
-- --------------------------------------------------------
  --
  -- Estructura de tabla para la tabla `personas`
  --
  DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
    `id` int(11) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `ape_paterno` varchar(50) NOT NULL,
    `ape_materno` varchar(50) NOT NULL,
    `genero` char(1) NOT NULL,
    `dni` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
  -- Volcado de datos para la tabla `personas`
  --
INSERT INTO
  `personas` (
    `id`,
    `nombre`,
    `ape_paterno`,
    `ape_materno`,
    `genero`,
    `dni`
  )
VALUES
  (
    1,
    'DENIS YEYSON',
    'ESPINOZA',
    'PONCIANO',
    'M',
    74947185
  ),
  (2, 'PEDRO', 'RAMIREZ', 'ZAPATA', 'M', 15967545),
  (3, 'SARA', 'POMA', 'RAULETI', 'F', 45678922);