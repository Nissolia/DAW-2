-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2025 a las 21:46:11
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
-- Base de datos: `clima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lluvias`
--

CREATE TABLE `lluvias` (
  `id` int(11) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `lluvia` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lluvias`
--

INSERT INTO `lluvias` (`id`, `mes`, `lluvia`) VALUES
(1, 'Enero', 78.50),
(2, 'Febrero', 60.20),
(3, 'Marzo', 95.00),
(4, 'Abril', 110.30),
(5, 'Mayo', 85.70),
(6, 'Junio', 50.10),
(7, 'Julio', 30.00),
(8, 'Agosto', 25.60),
(9, 'Septiembre', 70.20),
(10, 'Octubre', 90.40),
(11, 'Noviembre', 120.80),
(12, 'Diciembre', 140.90);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lluvias`
--
ALTER TABLE `lluvias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lluvias`
--
ALTER TABLE `lluvias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
