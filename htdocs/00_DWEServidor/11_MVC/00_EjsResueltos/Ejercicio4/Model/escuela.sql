-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2020 a las 20:35:57
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` varchar(6) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `curso` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `apellidos`, `curso`) VALUES
('111BBB', 'Ana María', 'Sierra Alvarez', '2ºDAW'),
('123AAA', 'Alejandro', 'Gomez Barbanegra', '1DAW'),
('aaa111', 'Fernando', 'García Gálvez', '1 DAW'),
('BBB222', 'Juanita', 'Arcos Medievo', '2 SMR'),
('cbo987', 'Manolito', 'Toro Bravo', '2 DAW'),
('ccc123', 'Anacleto', 'Antunez Abanderado', '2 SMR'),
('ddd321', 'Marcelo', 'Zamudio Fuentes', '2 DAW'),
('ñlk987', 'pepillo', 'de los palotes', '1 daw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoasignatura`
--

CREATE TABLE `alumnoasignatura` (
  `matricula` varchar(6) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnoasignatura`
--

INSERT INTO `alumnoasignatura` (`matricula`, `codigo`) VALUES
('111BBB', 1),
('111BBB', 3),
('111BBB', 4),
('123AAA', 2),
('123AAA', 3),
('123AAA', 4),
('123AAA', 5),
('aaa111', 1),
('aaa111', 4),
('aaa111', 6),
('BBB222', 4),
('BBB222', 5),
('ccc123', 3),
('ccc123', 4),
('ccc123', 5),
('ccc123', 6),
('ddd321', 1),
('ddd321', 2),
('ddd321', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`codigo`, `nombre`) VALUES
(1, 'Base de Datos'),
(2, 'Redes Locales'),
(3, 'Programacion'),
(4, 'Programación Entorno Servidor'),
(5, 'Diseño de Interfaces'),
(6, 'Lenguaje de Marcas'),
(7, 'Programacion en Entorno Client');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `alumnoasignatura`
--
ALTER TABLE `alumnoasignatura`
  ADD PRIMARY KEY (`matricula`,`codigo`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
