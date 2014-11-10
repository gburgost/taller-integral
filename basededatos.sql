-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2014 a las 02:14:05
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `mpc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
`id` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `tipo_persona` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `rut_persona`, `nombre`, `apellido`, `fecha_nac`, `tipo_persona`) VALUES
(7, '13015775-0', 'Lorna', 'Carrizo', '1976-09-26', 'Empleado'),
(8, '7165887-2', 'Manuel', 'Cortes', '1954-01-31', 'Empleado'),
(9, '11469991-8', 'Raul', 'ZuÃ±iga', '1969-09-29', 'Empleado'),
(10, '12402211-8', 'Juan ', 'Hidalgo', '1973-04-07', 'Empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
