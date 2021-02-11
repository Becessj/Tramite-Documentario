-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2018 a las 19:07:44
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `php_contenidomodal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modal_contenido`
--

CREATE TABLE IF NOT EXISTS `modal_contenido` (
`IdModal` int(11) NOT NULL,
  `Modal` varchar(200) DEFAULT NULL,
  `Contenido_modal` text,
  `Img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modal_contenido`
--

INSERT INTO `modal_contenido` (`IdModal`, `Modal`, `Contenido_modal`, `Img`) VALUES
(1, 'oracle', 'Oracle ofrece un paquete completo y totalmente integrado de aplicaciones en la nube y servicios de plataforma.', 'oracle.jpg'),
(2, 'sql-server', 'SQL Server 2017 Developer es una edición gratuita con todo el conjunto de características, que se puede usar como una base de datos de desarrollo', 'sql-server.jpg'),
(3, 'mysql', 'El conjunto más completo de funciones avanzadas, herramientas de gestión y soporte técnico para alcanzar los niveles más altos de escalabilidad MySQL, seguridad', 'mysql.jpg'),
(4, 'postgresql', 'PostgreSQL es un sistema de gestión de bases de datos relacional orientado a objetos y libre, publicado bajo la licencia PostgreSQL.', 'postgresql.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modal_contenido`
--
ALTER TABLE `modal_contenido`
 ADD PRIMARY KEY (`IdModal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modal_contenido`
--
ALTER TABLE `modal_contenido`
MODIFY `IdModal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
