-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2014 a las 03:43:35
-- Versión del servidor: 6.0.10-alpha-community
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto1`
--
CREATE DATABASE IF NOT EXISTS `u974710561_proy1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `u974710561_proy1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `PROD_CODIGO` decimal(50,0) NOT NULL,
  `PROD_TITULO` longtext NOT NULL,
  `PROD_RESUMEN` longtext NOT NULL,
  `PROD_FECHA_PUBLICACION` date NOT NULL,
  `PROD_GRUPO_INVESTIGACION` longtext NOT NULL,
  `PROD_PERMISO` int(11) NOT NULL,
  `PROD_ESTADO` longtext NOT NULL,
  `ART_ARCHIVO_ADJUNTO` longtext NOT NULL,
  `ART_FACTOR_IMPACTO` char(2) NOT NULL,
  PRIMARY KEY (`PROD_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monografia`
--

CREATE TABLE IF NOT EXISTS `monografia` (
  `PROD_CODIGO` decimal(50,0) NOT NULL,
  `PROD_TITULO` longtext NOT NULL,
  `PROD_RESUMEN` longtext NOT NULL,
  `PROD_FECHA_PUBLICACION` date NOT NULL,
  `PROD_GRUPO_INVESTIGACION` longtext NOT NULL,
  `PROD_PERMISO` int(11) NOT NULL,
  `PROD_ESTADO` longtext NOT NULL,
  `MONOGRAFIA_TIPO` varchar(100) NOT NULL,
  `MONOGRAFIA_ARCHIVO_ADJUNTO` longtext NOT NULL,
  `MONOGRAFIA_AUTOR1` varchar(500) NOT NULL,
  `MONOGRAFIA_AUTOR2` longtext,
  `MONOGRAFIA_CODIRECTOR` longtext,
  PRIMARY KEY (`PROD_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE IF NOT EXISTS `produccion` (
  `PROD_CODIGO` decimal(50,0) NOT NULL,
  `PROD_TITULO` longtext NOT NULL,
  `PROD_RESUMEN` longtext NOT NULL,
  `PROD_FECHA_PUBLICACION` date NOT NULL,
  `PROD_GRUPO_INVESTIGACION` longtext NOT NULL,
  `PROD_PERMISO` int(11) NOT NULL,
  `PROD_ESTADO` longtext NOT NULL,
  PRIMARY KEY (`PROD_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_tecnico`
--

CREATE TABLE IF NOT EXISTS `reporte_tecnico` (
  `PROD_CODIGO` decimal(50,0) NOT NULL,
  `PROD_TITULO` longtext NOT NULL,
  `PROD_RESUMEN` longtext NOT NULL,
  `PROD_FECHA_PUBLICACION` date NOT NULL,
  `PROD_GRUPO_INVESTIGACION` longtext NOT NULL,
  `PROD_PERMISO` int(11) NOT NULL,
  `PROD_ESTADO` longtext NOT NULL,
  PRIMARY KEY (`PROD_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_CODIGO` decimal(10,0) NOT NULL,
  `ROL_NOMBRE` longtext NOT NULL,
  PRIMARY KEY (`ROL_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ROL_CODIGO`, `ROL_NOMBRE`) VALUES
('1', 'Administrador'),
('2', 'Jefe de Departamento'),
('3', 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `USU_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `USU_NOMBRE` varchar(50) NOT NULL,
  `USU_APELLIDO` varchar(50) NOT NULL,
  `USU_EMAIL` varchar(50) NOT NULL,
  `USU_CONTRASENA` varchar(50) NOT NULL,
  `USU_ESTADO` varchar(20) NOT NULL,
  PRIMARY KEY (`USU_CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USU_CODIGO`, `USU_NOMBRE`, `USU_APELLIDO`, `USU_EMAIL`, `USU_CONTRASENA`, `USU_ESTADO`) VALUES
(1, 'administrador', '', 'administrador@example.com', '12345', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_produccion`
--

CREATE TABLE IF NOT EXISTS `usuario_produccion` (
  `USU_CODIGO` int(11) NOT NULL,
  `PROD_CODIGO` decimal(50,0) NOT NULL,
  PRIMARY KEY (`USU_CODIGO`,`PROD_CODIGO`),
  KEY `FK_USUARIO_PRODUCCION2` (`PROD_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `USU_CODIGO` int(11) NOT NULL,
  `ROL_CODIGO` decimal(10,0) NOT NULL DEFAULT '3',
  PRIMARY KEY (`USU_CODIGO`,`ROL_CODIGO`),
  KEY `FK_USUARIO_ROL2` (`ROL_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS  `tp1_sess` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);


--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`USU_CODIGO`, `ROL_CODIGO`) VALUES
(14, '3');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `FK_PRODUCCIONES_HERENCIA3` FOREIGN KEY (`PROD_CODIGO`) REFERENCES `produccion` (`PROD_CODIGO`);

--
-- Filtros para la tabla `monografia`
--
ALTER TABLE `monografia`
  ADD CONSTRAINT `FK_PRODUCCIONES_HERENCIA` FOREIGN KEY (`PROD_CODIGO`) REFERENCES `produccion` (`PROD_CODIGO`);

--
-- Filtros para la tabla `reporte_tecnico`
--
ALTER TABLE `reporte_tecnico`
  ADD CONSTRAINT `FK_PRODUCCIONES_HERENCIA2` FOREIGN KEY (`PROD_CODIGO`) REFERENCES `produccion` (`PROD_CODIGO`);

--
-- Filtros para la tabla `usuario_produccion`
--
ALTER TABLE `usuario_produccion`
  ADD CONSTRAINT `FK_USUARIO_PRODUCCION` FOREIGN KEY (`USU_CODIGO`) REFERENCES `usuario` (`USU_CODIGO`),
  ADD CONSTRAINT `FK_USUARIO_PRODUCCION2` FOREIGN KEY (`PROD_CODIGO`) REFERENCES `produccion` (`PROD_CODIGO`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `FK_USUARIO_ROL` FOREIGN KEY (`USU_CODIGO`) REFERENCES `usuario` (`USU_CODIGO`),
  ADD CONSTRAINT `FK_USUARIO_ROL2` FOREIGN KEY (`ROL_CODIGO`) REFERENCES `rol` (`ROL_CODIGO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
