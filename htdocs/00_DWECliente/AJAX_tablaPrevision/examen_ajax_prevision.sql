-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 05:20:27
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_ajax_prevision`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`) VALUES
(1, 'Utrera'),
(3, 'Chipiona'),
(5, 'Rute'),
(7, 'Madrid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prevision`
--

CREATE TABLE `prevision` (
  `id` int(11) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `temperatura` varchar(10) NOT NULL,
  `icono` varchar(20) NOT NULL,
  `viento` varchar(20) NOT NULL,
  `velocidad` varchar(20) NOT NULL,
  `lluvias` varchar(20) NOT NULL,
  `idlocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prevision`
--

INSERT INTO `prevision` (`id`, `hora`, `temperatura`, `icono`, `viento`, `velocidad`, `lluvias`, `idlocalidad`) VALUES
(1, '9:00', '26ºC', 'dia', 'norte', '4 Km/h', '0 mm', 1),
(2, '14:00', '30ºC', 'dia', 'oeste', '6 Km/h', '0 mm', 1),
(3, '18:00', '36ºC', 'dia', 'oeste', '11 Km/h', '0 mm', 1),
(4, '23:00', '20ºC', 'noche', 'sur', '5 Km/h', '10 mm', 1),
(5, '9:00', '20ºC', 'dia', 'sur', '4 Km/h', '0 mm', 3),
(6, '14:00', '25ºC', 'dia', 'sur', '6 Km/h', '5 mm', 3),
(7, '18:00', '31ºC', 'dia', 'este', '11 Km/h', '10 mm', 3),
(8, '23:00', '15ºC', 'noche', 'norte', '5 Km/h', '5 mm', 3),
(9, '9:00', '28ºC', 'dia', 'norte', '2 Km/h', '0 mm', 5),
(10, '14:00', '32ºC', 'dia', 'norte', '2 Km/h', '0 mm', 5),
(11, '18:00', '39ºC', 'dia', 'este', '0 Km/h', '0 mm', 5),
(12, '23:00', '22ºC', 'noche', 'este', '5 Km/h', '0 mm', 5),
(13, '9:00', '29ºC', 'dia', 'sur', '11Km/h', '5 mm', 7),
(14, '14:00', '30ºC', 'dia', 'sur', '11 Km/h', '10 mm', 7),
(15, '18:00', '32ºC', 'dia', 'oeste', '18 Km/h', '15 mm', 7),
(16, '23:00', '25ºC', 'noche', 'oeste', '11 Km/h', '25 mm', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prevision`
--
ALTER TABLE `prevision`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `prevision`
--
ALTER TABLE `prevision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
