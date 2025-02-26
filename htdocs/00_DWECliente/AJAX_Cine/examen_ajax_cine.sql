-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2024 a las 17:20:51
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_ajax_cine`
--
CREATE DATABASE IF NOT EXISTS `examen_ajax_cine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `examen_ajax_cine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `CodActor` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `FNacimiento` datetime DEFAULT NULL,
  `LNacimiento` varchar(50) DEFAULT NULL,
  `Nacionalidad` varchar(50) DEFAULT NULL,
  `FMuerte` datetime DEFAULT NULL,
  `LMuerte` varchar(50) DEFAULT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`CodActor`, `Nombre`, `FNacimiento`, `LNacimiento`, `Nacionalidad`, `FMuerte`, `LMuerte`) VALUES
(1, 'Kevin Costner', '1955-01-18 00:00:00', 'Lywood, California', 'Estados Unidos', NULL, NULL),
(2, 'Héctor Alterio', '1929-10-21 00:00:00', 'Buenos Aires', 'Argentina', NULL, NULL),
(3, 'Ricardo Darín', '1957-01-16 00:00:00', 'Buenos Aires', 'Argentina', NULL, NULL),
(4, 'Viggo Mortensen', '1958-10-20 00:00:00', 'Manhattan, New York', 'Estados Unidos', NULL, NULL),
(5, 'Liv Tyler', '1977-07-01 00:00:00', 'Portland, Maine', 'Estados Unidos', NULL, NULL),
(6, 'Orlando Bloom', '1977-01-13 00:00:00', 'Canterbury, Kent', 'Gran Bretaña', NULL, NULL),
(7, 'Javier Bardem', '1969-03-01 00:00:00', 'Las Palmas de Gran Canaria', 'España', NULL, NULL),
(8, 'Belén Rueda', '1965-03-16 00:00:00', 'Madrid', 'España', NULL, NULL),
(9, 'Lola Dueñas', NULL, NULL, 'España', NULL, NULL),
(10, 'Humphrey Bogart', '1899-12-25 00:00:00', 'New York, New York', 'Estados Unidos', '1957-01-14 00:00:00', 'Los Angeles, California'),
(11, 'Ingrid Bergman', '1915-08-29 00:00:00', ' Stockholm', 'Suecia', '1982-08-28 00:00:00', 'Londres'),
(12, 'Juan Jose Ballesta', '1987-11-12 00:00:00', NULL, 'España', NULL, NULL),
(13, 'Chus Lampreave', '1930-12-11 00:00:00', 'Madrid', 'España', NULL, NULL),
(14, 'Tony Leblanc', '1922-05-07 00:00:00', 'Madrid', 'España', NULL, NULL),
(15, 'Ana Fernández', '1968-01-01 00:00:00', 'Valenciana de la Consepción, Sevilla', 'España', NULL, NULL),
(16, 'Maria Galiana', '1935-01-01 00:00:00', 'Sevilla', 'España', NULL, NULL),
(22, 'Tom Hanks', '1956-09-07 00:00:00', 'Concord (California)', 'Estados Unidos', NULL, NULL),
(23, 'Antonio Banderas', '1960-10-08 00:00:00', 'Málaga', 'España', NULL, NULL),
(33, 'Tom Cruise', '1962-07-03 00:00:00', 'Syracuse, Nueva York', 'Estados Unidos', NULL, NULL),
(34, 'Jonh Travolta', '1954-02-18 00:00:00', 'Englewood, Nueva Jersey', 'Estados Unidos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actorfilm`
--

CREATE TABLE `actorfilm` (
  `CodiActor` int(11) NOT NULL,
  `CodiFilm` int(11) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `actorfilm`
--

INSERT INTO `actorfilm` (`CodiActor`, `CodiFilm`) VALUES
(1, 3),
(2, 4),
(3, 4),
(4, 5),
(5, 5),
(6, 5),
(7, 6),
(8, 6),
(9, 6),
(10, 7),
(11, 7),
(12, 8),
(13, 9),
(14, 9),
(15, 10),
(16, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actorpremiocertamen`
--

CREATE TABLE `actorpremiocertamen` (
  `CodiActor` int(11) NOT NULL,
  `CodiPremio` int(11) NOT NULL,
  `CodiCertamen` int(11) NOT NULL,
  `Año` int(11) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `actorpremiocertamen`
--

INSERT INTO `actorpremiocertamen` (`CodiActor`, `CodiPremio`, `CodiCertamen`, `Año`) VALUES
(7, 11, 3, 2005),
(7, 11, 5, 2004),
(8, 16, 3, 2005),
(9, 14, 3, 2005),
(12, 13, 3, 2001),
(15, 16, 3, 2000),
(16, 22, 3, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certamenes`
--

CREATE TABLE `certamenes` (
  `CodiCertamen` int(11) NOT NULL,
  `Certamen` varchar(50) DEFAULT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `certamenes`
--

INSERT INTO `certamenes` (`CodiCertamen`, `Certamen`) VALUES
(1, 'Festival de Berlín'),
(2, 'Oscar'),
(3, 'Premios Goya'),
(4, 'Academia Europea de Cine (EFA)'),
(5, 'Vestival de Venecia'),
(6, 'Globo de Oro'),
(7, 'Festival de Cine de Miami'),
(8, 'Festival de Cine Español de Toulouse'),
(9, 'Festival de Valenciennes'),
(10, 'Semana Internacional de Cine de Valladolid'),
(11, 'Festival de Cine de Cannes'),
(12, 'Festival Internacional de San Sebastian'),
(13, 'Festival de Venecia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `CodiDirec` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `FNacimiento` datetime DEFAULT NULL,
  `LNacimiento` varchar(50) DEFAULT NULL,
  `Nacionalidad` varchar(50) DEFAULT NULL,
  `FMuerte` datetime DEFAULT NULL,
  `LMuerte` varchar(50) DEFAULT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`CodiDirec`, `Nombre`, `FNacimiento`, `LNacimiento`, `Nacionalidad`, `FMuerte`, `LMuerte`) VALUES
(1, 'Achero Mañas', '1966-09-05 00:00:00', 'Madrid', 'España', NULL, NULL),
(3, 'Alejandro Amenábar', '1972-03-31 00:00:00', 'Santiago de Chile', 'Chile', NULL, NULL),
(4, 'Santiago Segura', '1965-07-17 00:00:00', 'Madrid', 'España', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `films`
--

CREATE TABLE `films` (
  `CodPel` int(11) NOT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Año` varchar(4) NOT NULL,
  `Nacionalidad` varchar(30) DEFAULT NULL,
  `Duracion` float DEFAULT NULL,
  `FechaEstreno` datetime DEFAULT NULL,
  `Genero` varchar(20) DEFAULT NULL,
  `Taquilla` double DEFAULT 0,
  `Productora` varchar(50) DEFAULT NULL,
  `Distribuidora` varchar(50) DEFAULT NULL,
  `Director` int(11) DEFAULT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `films`
--

INSERT INTO `films` (`CodPel`, `Titulo`, `Año`, `Nacionalidad`, `Duracion`, `FechaEstreno`, `Genero`, `Taquilla`, `Productora`, `Distribuidora`, `Director`) VALUES
(3, '31 dias', '2000', 'Estados Unidos', 145, '2001-03-23 00:00:00', 'Suspense Drama', 1103731.95, 'Beacon Pictures', 'Manga Films S.L.', 6),
(4, 'El hijo de la novia', '2001', 'España Argentina', 124, '2001-11-23 00:00:00', 'Drama', 7230415.69, 'Tornasol Films, S.A.', 'Alta Classics S.L.', 5),
(5, 'El Señor de los Anillos. La Comunidad del Anillo', '2001', 'Nueva Zelanda', 180, '2001-12-19 00:00:00', 'Aventura Fantástico', 31263314.97, 'Wingnut Films', 'Aurum Producciones S.A.', 7),
(6, 'Mar Adentro', '2004', 'España', 95, '2004-09-03 00:00:00', 'Drama', 19517968.62, 'SOGECINE', 'SOGEPAQ S.A.', 3),
(7, 'Casablanca', '1942', 'Estados Unidos', 98, '1946-12-19 00:00:00', 'Drama Romance', 318310.24, 'Warner Bros Pictures', 'C.B. Fimls S.A.', 8),
(8, 'El Bola', '2000', 'España', 88, '2000-10-20 00:00:00', 'Drama', 2998626.52, 'Tesela Producciones Cinematográficas', 'Wanda Vision, S.A.', 1),
(9, 'Torrente, el brazo tonto de la ley', '1998', 'España', 97, '1998-03-13 00:00:00', 'Comedia', 10902559.95, 'Cartel Producciones Audiovisuales, S.L.', 'Columbia Tri-Star Films de España, S.A.', 4),
(10, 'Solas', '1998', 'España', 101, '1999-03-05 00:00:00', 'Drama', 3675149.47, 'Maestranza Films, S.L.', 'Wanda Vision, S.A.', 9),
(11, 'Poseidón', '2005', 'Estados Unidos', 105, '2005-06-25 00:00:00', 'Aventuras', 0, NULL, NULL, 10),
(12, 'Flags of our fathers', '2005', 'Estados Unidos', 108, '2005-07-02 00:00:00', 'Drama', 0, 'Warner Bros', NULL, 11),
(13, 'Ágora', '2009', 'España', 95, '2004-09-03 00:00:00', 'Drama', 19517968.62, 'SOGECINE', 'SOGEPAQ S.A.', 3),
(14, 'Regresión', '2015', 'España', 95, '2004-09-03 00:00:00', 'Drama', 19517968.62, 'SOGECINE', 'SOGEPAQ S.A.', 3),
(15, 'Abre los ojos', '1997', 'España', 95, '2004-09-03 00:00:00', 'Drama', 19517968.62, 'SOGECINE', 'SOGEPAQ S.A.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filmspremiocertamen`
--

CREATE TABLE `filmspremiocertamen` (
  `CodiFilm` int(11) NOT NULL,
  `CodiPremio` int(11) NOT NULL,
  `CodiCertamen` int(11) NOT NULL,
  `Año` int(11) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `filmspremiocertamen`
--

INSERT INTO `filmspremiocertamen` (`CodiFilm`, `CodiPremio`, `CodiCertamen`, `Año`) VALUES
(4, 1, 10, 2001),
(4, 2, 10, 2001),
(5, 3, 2, 2002),
(5, 4, 2, 2002),
(5, 5, 2, 2002),
(5, 6, 2, 2002),
(6, 3, 3, 2005),
(6, 4, 3, 2005),
(6, 5, 3, 2005),
(6, 7, 3, 2005),
(6, 9, 3, 2005),
(6, 10, 3, 2005),
(6, 10, 4, 2004),
(6, 11, 3, 2005),
(6, 11, 13, 2004),
(6, 12, 2, 2005),
(6, 12, 6, 2005),
(6, 13, 3, 2005),
(6, 14, 3, 2005),
(6, 15, 3, 2005),
(6, 16, 3, 2005),
(6, 22, 3, 2005),
(6, 23, 13, 2004),
(6, 24, 3, 2005),
(7, 7, 2, 1943),
(7, 10, 2, 1943),
(7, 17, 2, 1943),
(8, 7, 3, 2001),
(8, 9, 3, 2001),
(8, 19, 3, 2001),
(10, 2, 1, 1999),
(10, 9, 3, 2000),
(10, 13, 3, 2000),
(10, 16, 3, 2000),
(10, 19, 3, 2000),
(10, 20, 3, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `CodiPremi` int(11) NOT NULL,
  `Premio` varchar(50) DEFAULT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`CodiPremi`, `Premio`) VALUES
(1, 'Espiga de Plata'),
(2, 'Premio del Público'),
(3, 'Mejor Banda Sonora'),
(4, 'Mejor Fotografía'),
(5, 'Mejor Maquillaje y/o Peluqueria'),
(6, 'Mejores Efectos Visuales'),
(7, 'Mejor Película'),
(8, 'Mejor Actriz de Reparto'),
(9, 'Mejor Guión Original'),
(10, 'Mejor Dirección'),
(11, 'Mejor Actor'),
(12, 'Mejor Película Extranjera'),
(13, 'Mejor Actor Revelación'),
(14, 'Mejor Actriz'),
(15, 'Mejor Actor de Reparto'),
(16, 'Mejor Actriz Revelación'),
(17, 'Mejor Guión'),
(18, 'Mejor Guión Original'),
(19, 'Mejor Dirección Novel'),
(20, 'Mejor Actriz Secundaria'),
(21, 'Mejor Actor Secundario'),
(22, 'Mejor Actriz de Reparto'),
(23, 'Gran Premio del Jurado'),
(24, 'Mejor Dirección de Producción');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`CodActor`),
  ADD UNIQUE KEY `CodActor` (`CodActor`);

--
-- Indices de la tabla `actorfilm`
--
ALTER TABLE `actorfilm`
  ADD PRIMARY KEY (`CodiActor`,`CodiFilm`);

--
-- Indices de la tabla `actorpremiocertamen`
--
ALTER TABLE `actorpremiocertamen`
  ADD PRIMARY KEY (`CodiActor`,`CodiPremio`,`CodiCertamen`,`Año`);

--
-- Indices de la tabla `certamenes`
--
ALTER TABLE `certamenes`
  ADD PRIMARY KEY (`CodiCertamen`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`CodiDirec`),
  ADD UNIQUE KEY `CodiDirec` (`CodiDirec`);

--
-- Indices de la tabla `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`CodPel`);

--
-- Indices de la tabla `filmspremiocertamen`
--
ALTER TABLE `filmspremiocertamen`
  ADD PRIMARY KEY (`CodiFilm`,`CodiPremio`,`CodiCertamen`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`CodiPremi`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `CodActor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `certamenes`
--
ALTER TABLE `certamenes`
  MODIFY `CodiCertamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `CodiDirec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `films`
--
ALTER TABLE `films`
  MODIFY `CodPel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `CodiPremi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
