-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-12-2018 a las 13:01:16
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
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(255) NOT NULL,
  `cif` varchar(50) NOT NULL,
  `tarifa` int(20) NOT NULL,
  `formapago` varchar(14) NOT NULL,
  `serie` varchar(30) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `telefono1` int(255) NOT NULL,
  `movil` int(255) NOT NULL,
  `nombre2` varchar(40) NOT NULL,
  `direccion2` varchar(100) NOT NULL,
  `poblacion2` varchar(255) NOT NULL,
  `provincia2` varchar(255) NOT NULL,
  `telefono2` int(255) NOT NULL,
  `observaciones2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `codigo`, `cif`, `tarifa`, `formapago`, `serie`, `nombre`, `direccion`, `provincia`, `observaciones`, `telefono1`, `movil`, `nombre2`, `direccion2`, `poblacion2`, `provincia2`, `telefono2`, `observaciones2`) VALUES
(2, 2, '12', 10, 'Transferencia', '55', 'Sucursal', 'Calle uno', 'Almería', 'Una', 41455555, 77777, 'Sucursal Norte', 'Calle uno', '300', 'Almería', 41455555, 'Ninguna');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
