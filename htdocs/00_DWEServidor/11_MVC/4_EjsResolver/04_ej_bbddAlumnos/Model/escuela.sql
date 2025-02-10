-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2025 a las 17:11:40
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
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `apellidos`, `curso`) VALUES
(1, 'Pepe', 'sada', 'dada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_asignatura`
--

CREATE TABLE `alumno_asignatura` (
  `matricula` int(11) NOT NULL,
  `codigo_asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`codigo`, `nombre`) VALUES
(1, 'DWEC'),
(2, 'DIW'),
(3, 'EEIE'),
(4, 'DWES'),
(5, 'HLC'),
(6, 'DAW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `dia` varchar(20) NOT NULL,
  `primera` varchar(255) DEFAULT NULL,
  `segunda` varchar(255) DEFAULT NULL,
  `tercera` varchar(255) DEFAULT NULL,
  `cuarta` varchar(255) DEFAULT NULL,
  `quinta` varchar(255) DEFAULT NULL,
  `sexta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`dia`, `primera`, `segunda`, `tercera`, `cuarta`, `quinta`, `sexta`) VALUES
('Jueves', 'DWEC', 'DWEC', 'EEIE', 'EEIE', 'EEIE', 'DIW'),
('Lunes', 'DWEC', 'DIW', 'EEIE', 'RECREO', 'EEIE', 'DWES'),
('Martes', 'DWES', 'DWES', 'DWES', 'HLC', 'HLC', 'HLC'),
('Miércoles', 'DWEC', 'DWEC', 'DWEC', 'DIW', 'DIW', 'DIW'),
('Viernes', 'DAW', 'DAW', 'DAW', 'DWES', 'DWES', 'DWES');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `alumno_asignatura`
--
ALTER TABLE `alumno_asignatura`
  ADD PRIMARY KEY (`matricula`,`codigo_asignatura`),
  ADD KEY `codigo_asignatura` (`codigo_asignatura`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`dia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_asignatura`
--
ALTER TABLE `alumno_asignatura`
  ADD CONSTRAINT `alumno_asignatura_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumno` (`matricula`),
  ADD CONSTRAINT `alumno_asignatura_ibfk_2` FOREIGN KEY (`codigo_asignatura`) REFERENCES `asignatura` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
