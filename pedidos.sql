-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-12-2018 a las 13:01:58
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pruebasphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pedido` int(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `contrato` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `cp` int(255) NOT NULL,
  `poblacion` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `telefono` int(255) NOT NULL,
  `movil` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `no_pedido`, `fecha`, `empresa`, `departamento`, `contrato`, `observaciones`, `cliente`, `cp`, `poblacion`, `provincia`, `telefono`, `movil`, `email`, `direccion`) VALUES
(1, 1, '2018-12-04', 'La Consentida', 'AlmerÃ­a', 'C777', 'Ninguna.', 'Prueba uno', 1, '300', 'AlmerÃ­a', 41455555, 25522, 'diego@gmail.com', 'Calle uno'),
(4, 5, '2018-12-18', 'Don Pedro', 'Almería', 'C999', 'En espera ... de la prueba', 'pepe', 7, 'Almería', 'Almería', 41455555, 2255788, 'diego@gmail.com', 'Avenida uno');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
