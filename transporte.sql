-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-12-2018 a las 13:02:17
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
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE IF NOT EXISTS `transporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(255) NOT NULL,
  `nif` varchar(14) NOT NULL,
  `pesomax` int(20) NOT NULL,
  `tarifa` int(20) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono1` int(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `autonomo` char(2) NOT NULL,
  `modulo` char(2) NOT NULL,
  `cp` int(255) NOT NULL,
  `poblacion` varchar(255) NOT NULL,
  `formapago` varchar(14) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `telefono2` int(255) NOT NULL,
  `movil` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id`, `codigo`, `nif`, `pesomax`, `tarifa`, `matricula`, `nombre`, `telefono1`, `email`, `direccion`, `autonomo`, `modulo`, `cp`, `poblacion`, `formapago`, `observaciones`, `telefono2`, `movil`) VALUES
(2, 2, '44355335A', 300, 400, 'JIP688', 'María Colina', 5558478, 'diego@gmail.com', 'Calle uno', 'Sí', 'Sí', 34, '9292', 'Talón', 'Nada', 788558, 14255866),
(3, 3, '8453003J', 180, 100, 'HWE235', 'Diego Milan', 11111, 'diego@gmail.com', 'Calle uno', 'Sí', 'Sí', 40, 'Almería si', 'Talón', 'Ninguna ', 22222, 41522587),
(4, 1, '8453003H', 300, 300, 'XYZ123', 'Fuente', 33333, 'ejemplo@ejemplo.com', 'Avenida tres', 'Sí', 'Sí', 15, 'Almería', 'Transferencia', 'Veremos...', 44444, 888888);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
