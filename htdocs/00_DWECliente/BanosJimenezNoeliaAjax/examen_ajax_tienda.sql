-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2025 a las 10:52:44
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_ajax_tienda`
--
CREATE DATABASE IF NOT EXISTS `examen_ajax_tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `examen_ajax_tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Ratones'),
(2, 'Teclados'),
(3, 'Monitores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `caracteristicas` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `precio`, `descripcion`, `imagen`, `caracteristicas`) VALUES
(1, 1, 'Ratón Logitech G2023', '24.90', 'Tecnología LIGHTSYNC, un sensor para gaming y un diseño clásico con 6 botones', 'logitech-g203.webp', '[{\"atributo\": \"Ancho\", \"valor\": \"34mm\"}, {\"atributo\": \"Profundidad\", \"valor\": \"116mm\"}, {\"atributo\": \"Alto\", \"valor\": \"42mm\"}, {\"atributo\": \"Peso\", \"valor\": \"85g\"}]'),
(2, 1, 'Ratón MSI Clutch GM08', '9.99', 'Con un preciso Sensor PAW-3519 óptico de hasta 3200 DPI', 'msi-gm08.webp', '[{\"atributo\": \"Ancho\", \"valor\": \"40mm\"}, {\"atributo\": \"Profundidad\", \"valor\": \"128mm\"}, {\"atributo\": \"Alto\", \"valor\": \"40mm\"}, {\"atributo\": \"Peso\", \"valor\": \"92g\"}]'),
(3, 1, 'Ratón Tempest MS300', '15.23', 'Ratón gaming diseñado para ofrecer precisión y estilo a los gamers más exigentes', 'tempest-ms300.webp', '[{\"atributo\": \"Ancho\", \"valor\": \"41mm\"}, {\"atributo\": \"Profundidad\", \"valor\": \"108mm\"}, {\"atributo\": \"Alto\", \"valor\": \"38mm\"}, {\"atributo\": \"Peso\", \"valor\": \"75g\"}]'),
(5, 2, 'Teclado Corsair K55', '72.19', 'Ilumine sus sesiones de juego con retroiluminación RGB de diez zonas', 'teclado_corsair_k55.webp', '[{\"atributo\": \"Color\", \"valor\": \"Negro\"}, {\"atributo\": \"Iluminación\", \"valor\": \"Sí\"}]'),
(6, 2, 'Teclado Tempest K20', '83.55', 'Un teclado con un diseño gaming exclusivo', 'teclado_tempest_k20.webp', '[{\"atributo\": \"Color\", \"valor\": \"Blanco\"}, {\"atributo\": \"Tipo\", \"valor\": \"Mecánico\"}, {\"atributo\": \"Layout\", \"valor\": \"Español\"}, {\"atributo\": \"Peso\", \"valor\": \"450gr\"}, {\"atributo\": \"Nº teclas\", \"valor\": \"68\"}]'),
(7, 2, 'Teclado Owlotech EMK500', '34.99', 'Está diseñado para proporcionar una experiencia de uso ergonómica y comodísima', 'teclado_owlotech.webp', '[{\"atributo\": \"Color\", \"valor\": \"Negro\"}, {\"atributo\": \"Tipo\", \"valor\": \"Mecánico\"}, {\"atributo\": \"Peso\", \"valor\": \"112g\"}]'),
(8, 3, 'Monitor LG 24GS50F', '150.12', 'Monitor diseñado especialmente para gamers', 'monitor_lg.webp', '[{\"atributo\": \"Tipo HD\", \"valor\": \"Full HD\"}, {\"atributo\": \"Pantalla táctil\", \"valor\": \"No\"}]'),
(9, 3, 'Monitor MSG G27', '169.55', 'Equipado con un panel de 1920x1080, 250hz', 'monitor_msi.webp', '[{\"atributo\": \"Curvatura\", \"valor\": \"1500R\"}, {\"atributo\": \"Relación de aspecto\", \"valor\": \"16:9\"}]');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
