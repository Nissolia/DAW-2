-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2025 a las 17:35:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mantenimiento`
--
CREATE DATABASE IF NOT EXISTS `mantenimiento` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `mantenimiento`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE `incidencia` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `profesor` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `descripcion`, `profesor`, `fecha`, `estado`, `admin`) VALUES
(1, 'El ordenador no arranca, la pantalla se queda en negro', 'Pepe', '2024-11-28', 'PENDIENTE', NULL),
(2, 'La pizarra digital del aula 9 no tiene sonido', 'Ana', '2024-10-12', 'PENDIENTE', NULL),
(3, 'No puedo abrir determinadas páginas de google', 'Matilde', '2024-11-22', 'PENDIENTE', NULL),
(4, 'El ordenador de dirección va muy lento y se queda bloqueado', 'Gines', '2024-12-04', 'PENDIENTE', NULL),
(5, 'El ordenador de la sala de profesores no detecta ninguna impresora', 'Juan', '2024-12-08', 'PENDIENTE', NULL),
(6, 'No hay conexión a internet en el pc del profesor', 'Matilde', '2024-12-03', 'PENDIENTE', NULL),
(7, 'No puedo instalar el libro digital de inglés, sin privilegios', 'Ana', '2024-11-22', 'PENDIENTE', NULL),
(8, 'Habría que cambiar el teclado en el aula de dibujo, fallan algunas teclas', 'Pepe', '2024-12-06', 'PENDIENTE', NULL),
(9, 'La imagen se reproduce en el monitor pero el proyector no muestra nada', 'Pepe', '2024-11-30', 'PENDIENTE', NULL),
(10, 'Algunas páginas web no se abren porque lo impide el cortafuegos', 'Juan', '2024-12-08', 'PENDIENTE', NULL),
(11, 'Debe contener algún virus, porque el funcionamiento en general es tremendamente lento', 'Gines', '2024-11-28', 'PENDIENTE', NULL),
(13, 'El proyector tiene un mensaje de cambiar bombilla y no deja cerrarlo', 'Pepe', '2025-02-10', 'PENDIENTE', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `perfil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `perfil`) VALUES
(1, 'Fernando', 'admin'),
(2, 'Matias', 'admin'),
(3, 'Soldado', 'admin'),
(4, 'Pepe', 'user'),
(5, 'Juan', 'user'),
(6, 'Ana', 'user'),
(7, 'Gines', 'user'),
(8, 'Matilde', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
