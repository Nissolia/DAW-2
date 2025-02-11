-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2022 a las 21:29:51
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
CREATE TABLE `catalogo` (
  `codigo` varchar(20) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  `detalle` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`codigo`, `nombre`, `precio`, `imagen`, `detalle`) VALUES
('parkduo', 'Parker Duofold International', '406.00', 'parkerduo.jpg', 'Plumín de oro 18K. Fabricada en Reino Unido. Cuerpo en resina de alta resistencia.'),
('peli1000', 'Pelikan Souvëran M-1000', '545.00', 'pelikan.jpg', 'Plumín de oro 18K.  Émbolo de bronce. Fabricación alemana. Excelentes acabados.'),
('viscvan', 'Visconti Van Gogh', '180.00', 'visconti.jpg', 'Diseño y acabados de lujo. Cuerpo fabricado en Italia. Plumín alemán.'),
('waterexp', 'Waterman Expert', '103.55', 'waterman.jpg', 'Excelente pluma de uso diario. Fabricada en Francia. Plumín de acero.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `nombre` varchar(30) NOT NULL,
  `token` varchar(10) NOT NULL,
  `peticiones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre`, `token`, `peticiones`) VALUES
('Ana', '321cba', 6),
('Pepe', '123abc', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `precio`, `imagen`, `stock`, `descripcion`) VALUES
(1, 'raton', 6, 'raton.png', 28, 'Raton de la marca logitech de muy buena calidad'),
(2, 'teclado', 11, 'teclado.png', 25, 'Teclado gaming de tacto mecánico muy resistente'),
(3, 'monitor', 90, 'monitor.png', 10, 'Monitor de 24 pulgadas 1ms y 75hz con panel LCD'),
(4, 'joystick', 35, 'joystick.png', 3, 'Joystick compatible con ps4 y PC con vibracion'),
(8, 'Impresora', 35, 'impresora.jpg', 4, 'Impresora de inyeccion tinta'),
(9, 'TorreGaming', 1200, 'torregaming.jpg', 10, 'Torre adaptada para videojuegos de alto rendimient'),
(15, 'Portátil', 550, 'portatil.jpg', 5, 'Portátil Aus Gaming RTX 3050 Ryzen 7 4500');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
