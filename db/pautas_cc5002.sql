-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2018 a las 00:02:47
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pautas_cc5002`
--
CREATE DATABASE IF NOT EXISTS `pautas_cc5002` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `pautas_cc5002`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p3-c2-2018-2`
--
-- Creación: 07-11-2018 a las 22:30:09
--

DROP TABLE IF EXISTS `p3-c2-2018-2`;
CREATE TABLE `p3-c2-2018-2` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Base de datos pregunta 3 control 1 2018-2';

--
-- RELACIONES PARA LA TABLA `p3-c2-2018-2`:
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `p3-c2-2018-2`
--
ALTER TABLE `p3-c2-2018-2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `p3-c2-2018-2`
--
ALTER TABLE `p3-c2-2018-2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla p3-c2-2018-2
--

--
-- Metadatos para la base de datos pautas_cc5002
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
