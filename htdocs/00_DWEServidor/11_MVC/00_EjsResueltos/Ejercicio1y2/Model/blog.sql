-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2020 a las 20:47:48
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
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `titulo`, `fecha`, `contenido`) VALUES
(1, 'Mi primer POST español', '2018-12-18', 'Quiero dedicar este primer post para explicar un poco quien soy, a que me dedico y por qué voy a crear un blog.Soy fernandito, me dedico a la programación y voy a postear cosillas interesantes y útiles para facilitar la progamacion de aplicaciones web.Si te ha gustado, dame un LIKE!!!'),
(2, 'Mis andanzas con el lenguaje PHP', '2018-12-24', 'PHP, es un lenguaje molón, que permite la programación web en el entorno del servidor. No es tipado, es decir que las variables no tienen que ser definidas de un tipo determinad, incluso la misma variable puede contener un valor de un determinado tipo y posteriormente almacenar un valor de un tipo diferente.'),
(4, 'Hablemos de Tecnología', '2019-01-01', 'Los avances tecnologicos cada vez son más inapreciables, pues estamos acostumbrados a los cambios que se han estado produciendo en los ultimos años, de tal manera que dichos cambios se ven como una evolución natural de la vida, y no como algo prodigioso que se ha conseguido.'),
(6, 'Internet de las cosas', '2019-01-04', 'Cada día necesitamos que cualquier objeto diario de nuestra vida cotidiana sea más inteligente y capaz de realizar acciones que nos faciliten la vida, y ahí es donde entra en juego el internet de las cosas, posibilitando que objetos inteligentes se conecten a internet para realizar intercambio de información en ambos sentidos.'),
(7, 'TWIG. Un motor de plantillas de moda', '2019-01-29', 'Recientemente el desarrollo web del lado del servidor ha evolucionado proporcionando distintos Frameworks que facilitan el desarrollo y propiciando aplicaciones mas robustas y fáciles de mantener. Muchos de esos frameworks usan un motor de plantillas y uno de los más conocidos es TWIG, en el próximo artículo explicaremos más detalladamente en que consite.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
