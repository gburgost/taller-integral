-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 20, 2014 at 01:17 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
`id_departamento` int(255) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'SELECCIONE DEPARTAMENTO'),
(2, 'GERENCIA'),
(3, 'CONTABILIDAD'),
(4, 'ADMINSITRACION'),
(5, 'ADQUISICION'),
(6, 'VENTAS'),
(7, 'INFORMATICA'),
(8, 'PRODUCCION'),
(9, 'PREVENCION');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
`id_empleado` int(255) NOT NULL,
  `rut_persona` char(10) NOT NULL,
  `fecha_vinculacion` date NOT NULL,
  `fecha_desvinculacion` date NOT NULL,
  `tipo_contrato` varchar(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `id_departamento` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `rut_persona`, `fecha_vinculacion`, `fecha_desvinculacion`, `tipo_contrato`, `cargo`, `id_departamento`) VALUES
(7, '13015775-0', '2006-04-04', '0000-00-00', 'Indefinido', 'Secretaria de adminisitracion', 4),
(8, '7165887-2', '2006-07-17', '0000-00-00', 'Indefinido', 'Soldador', 8),
(9, '11469991-8', '2012-04-03', '0000-00-00', 'Indefinido', 'Soldador', 8),
(10, '12402211-8', '2006-01-09', '0000-00-00', 'Indefinido', 'Jefe de ventas', 6),
(11, '15611042-6', '2010-04-05', '0000-00-00', 'Indefinido', 'Prevencionista', 9),
(12, '9897840-2', '2006-10-01', '0000-00-00', 'Indefinido', 'Contador', 3),
(13, '1234567', '0000-00-00', '0000-00-00', 'Seleccione Tipo', '', 1),
(14, '18393479-1', '2013-10-03', '0000-00-00', 'Indefinido', 'tecnico informatico', 7);

-- --------------------------------------------------------

--
-- Table structure for table `guardia`
--

CREATE TABLE `guardia` (
  `rut_guardia` varchar(10) NOT NULL,
  `nombre_guardia` varchar(20) NOT NULL,
  `apellido_guardia` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardia`
--

INSERT INTO `guardia` (`rut_guardia`, `nombre_guardia`, `apellido_guardia`, `fecha_nac`) VALUES
('18393479-1', 'Gonzalo', 'Burgos', '1993-03-12'),
('18403314-3', 'Hector', 'Prieto', '1993-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `lista_negra`
--

CREATE TABLE `lista_negra` (
`id_lista` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `motivo` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lista_negra`
--

INSERT INTO `lista_negra` (`id_lista`, `rut_persona`, `motivo`) VALUES
(2, '7165887-2', 'Termino de contrato');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
`id_login` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `rol`) VALUES
(1, '18393479-1', 'gonzalo', 'administrador'),
(2, '18403314-3', 'hector', 'guardia');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
`id` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `tipo_persona` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id`, `rut_persona`, `nombre`, `apellido`, `fecha_nac`, `tipo_persona`) VALUES
(7, '13015775-0', 'Lorna', 'Carrizo', '1976-09-26', 'Empleado'),
(8, '7165887-2', 'Manuel', 'Cortes', '1954-01-31', 'Empleado'),
(9, '11469991-8', 'Raul', 'ZuÃ±iga', '1969-09-29', 'Empleado'),
(10, '12402211-8', 'Juan ', 'Hidalgo', '1973-04-07', 'Empleado'),
(11, '15611042-6', 'Marcelo', 'Antivilo', '1983-04-05', 'Empleado'),
(12, '9897840-2', 'Jose', 'Burgos', '1965-02-24', 'Empleado'),
(14, '18393479-1', 'Gonzalo', 'Burgos', '1993-03-12', 'Empleado');

-- --------------------------------------------------------

--
-- Table structure for table `punto_acceso`
--

CREATE TABLE `punto_acceso` (
  `nro_garita` int(2) NOT NULL,
  `descripcion` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registro_persona`
--

CREATE TABLE `registro_persona` (
`cod_registro` int(255) NOT NULL,
  `nro_garita` int(2) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `rut_guardia` varchar(10) NOT NULL,
  `fecha_entrada` varchar(10) DEFAULT NULL,
  `hora_entrada` varchar(10) DEFAULT NULL,
  `fecha_salida` varchar(10) DEFAULT NULL,
  `hora_salida` varchar(10) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registro_persona`
--

INSERT INTO `registro_persona` (`cod_registro`, `nro_garita`, `rut_persona`, `rut_guardia`, `fecha_entrada`, `hora_entrada`, `fecha_salida`, `hora_salida`, `estado`) VALUES
(60, 0, '18393479-1', '', '13-11-2014', '23:37:32', '14-11-2014', '00:00:43', 'cerrado'),
(65, 0, '18393479-1', '', '14-11-2014', '00:00:24', '14-11-2014', '00:00:43', 'cerrado'),
(66, 0, '18393479-1', '', '14-11-2014', '00:13:25', '14-11-2014', '00:28:17', 'cerrado'),
(68, 0, '13015775-0', '', '14-11-2014', '00:35:45', '14-11-2014', '00:35:57', 'cerrado'),
(73, 0, '7165887-2', '', '14-11-2014', '00:43:00', '14-11-2014', '00:43:26', 'cerrado'),
(74, 0, '7165887-2', '', '14-11-2014', '00:50:27', '14-11-2014', '00:51:08', 'cerrado'),
(75, 0, '7165887-2', '', '14-11-2014', '00:51:13', '14-11-2014', '00:51:19', 'cerrado'),
(76, 0, '18393479-1', '', '14-11-2014', '01:12:18', '14-11-2014', '01:15:23', 'cerrado'),
(77, 0, '7165887-2', '', '14-11-2014', '01:16:24', '14-11-2014', '01:16:35', 'cerrado'),
(78, 0, '18393479-1', '', '14-11-2014', '01:34:36', '14-11-2014', '01:55:41', 'cerrado'),
(79, 0, '9897840-2', '', '14-11-2014', '01:54:19', '14-11-2014', '01:54:32', 'cerrado'),
(80, 0, '18393479-1', '', '14-11-2014', '02:10:20', '14-11-2014', '02:10:57', 'cerrado'),
(81, 0, '13015775-0', '', '14-11-2014', '12:21:10', '14-11-2014', '12:21:53', 'cerrado'),
(82, 0, '13015775-0', '', '14-11-2014', '17:44:45', '14-11-2014', '17:45:26', 'cerrado'),
(83, 0, '18393479-1', '', '16-11-2014', '19:32:05', '19-11-2014', '16:15:20', 'cerrado'),
(84, 0, '9897840-2', '', '19-11-2014', '15:52:09', '', '', 'abierto'),
(85, 0, '13015775-0', '', '19-11-2014', '15:53:44', '19-11-2014', '16:16:51', 'cerrado'),
(86, 0, '11469991-8', '', '19-11-2014', '15:55:40', '', '', 'abierto'),
(87, 0, '12402211-8', '', '19-11-2014', '16:00:04', '', '', 'abierto'),
(88, 0, '15611042-6', '', '19-11-2014', '16:01:25', '', '', 'abierto'),
(89, 0, '18393479-1', '', '19-11-2014', '16:17:44', '19-11-2014', '17:45:13', 'cerrado'),
(90, 0, '13015775-0', '', '19-11-2014', '17:42:21', '19-11-2014', '17:57:44', 'cerrado'),
(91, 0, '18393479-1', '', '19-11-2014', '17:45:31', '19-11-2014', '17:45:52', 'cerrado'),
(92, 0, '18393479-1', '', '19-11-2014', '17:56:47', '19-11-2014', '17:57:14', 'cerrado');

-- --------------------------------------------------------

--
-- Table structure for table `turno_guardia`
--

CREATE TABLE `turno_guardia` (
  `nro_garita` int(2) NOT NULL,
  `rut_guardia` varchar(10) NOT NULL,
  `jornada` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`id_empleado`);

--
-- Indexes for table `guardia`
--
ALTER TABLE `guardia`
 ADD PRIMARY KEY (`rut_guardia`);

--
-- Indexes for table `lista_negra`
--
ALTER TABLE `lista_negra`
 ADD PRIMARY KEY (`id_lista`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registro_persona`
--
ALTER TABLE `registro_persona`
 ADD PRIMARY KEY (`cod_registro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
MODIFY `id_departamento` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
MODIFY `id_empleado` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lista_negra`
--
ALTER TABLE `lista_negra`
MODIFY `id_lista` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `registro_persona`
--
ALTER TABLE `registro_persona`
MODIFY `cod_registro` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
