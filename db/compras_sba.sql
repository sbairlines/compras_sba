-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2015 a las 23:05:55
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `compras_sba`
--
CREATE DATABASE IF NOT EXISTS `compras_sba` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `compras_sba`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `nombre`) VALUES
(1, 'Papeleria'),
(2, 'Insumos Electronicos'),
(3, 'Insumos Informaticos'),
(4, 'Materiales de Oficina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_pago`
--

CREATE TABLE IF NOT EXISTS `condicion_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `estatus` int(11) NOT NULL COMMENT '0.- Activo, 1.- Inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `condicion_pago`
--

INSERT INTO `condicion_pago` (`id`, `nombre`, `estatus`) VALUES
(1, '30 Dias', 0),
(2, '60 Dias', 0),
(3, 'Contado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_oferta`
--

CREATE TABLE IF NOT EXISTS `detalle_oferta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_detalle_requerimiento` int(11) NOT NULL,
  `id_requerimiento` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` decimal(9,2) NOT NULL,
  `unidad_medida` varchar(100) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `condicion_pago` varchar(250) DEFAULT NULL,
  `precio_unitario` decimal(9,2) NOT NULL,
  `cantidad_disponible` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `detalle_oferta`
--

INSERT INTO `detalle_oferta` (`id`, `id_detalle_requerimiento`, `id_requerimiento`, `id_proveedor`, `id_usuario`, `cantidad`, `unidad_medida`, `descripcion`, `condicion_pago`, `precio_unitario`, `cantidad_disponible`) VALUES
(2, 4, 8, 16, 8, '200.00', 'Unidad', 'papel 125 cuadritos', '30 Dias', '33.00', '55.00'),
(3, 3, 8, 16, 8, '100.00', 'Unidad', 'papel 250 cuadritos', 'Contado', '8001.00', '80022.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_requerimiento`
--

CREATE TABLE IF NOT EXISTS `detalle_requerimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_requerimiento` int(11) NOT NULL,
  `cantidad` decimal(9,2) NOT NULL,
  `unidad_medida` varchar(100) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `condicion_pago` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `detalle_requerimiento`
--

INSERT INTO `detalle_requerimiento` (`id`, `id_requerimiento`, `cantidad`, `unidad_medida`, `descripcion`, `condicion_pago`) VALUES
(1, 3, '1.00', 'asd', 'asdasd', '30 Dias'),
(2, 6, '100.00', 'unidad', 'hoja de papel', '30 Dias'),
(3, 8, '100.00', 'Unidad', 'papel 250 cuadritos', 'Contado'),
(4, 8, '200.00', 'Unidad', 'papel 125 cuadritos', '30 Dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `nombre`) VALUES
(1, 'Agregar/Editar Requerimientos'),
(2, 'Agregar/Editar Proveedores'),
(3, 'Agregar/Editar Usuarios'),
(4, 'Agregar/Editar Ofertas'),
(5, 'Ver Ofertas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `razon_social` varchar(250) NOT NULL,
  `rif` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `pais` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `codigo`, `razon_social`, `rif`, `email`, `direccion`, `ciudad`, `pais`, `telefono`) VALUES
(1, 'A000001', 'SANTA BARBARA AIRLINES S,A,', 'J52365236', '', 'LA URBINA', 'CARACAS', 'VE', '2122042022'),
(2, 'A95508556', ' AGENCIA DE VIAJES BARCELONA TUR, C', 'J080086074', '', '', 'LECHERIAS', 'VE', '2812864932'),
(3, 'A95500112', ' AGENCIA DE VIAJES DEL PLATA TRAVEL', 'J302024943', '', ' CENTROSEGUROS SUD AMERICA, PB, LOC', 'CARACAS', 'VE', '2129540315'),
(4, 'A95510531', ' AGENCIA DE VIAJES Y TURISMO APOLO', 'J075059956', '', '', 'MARACAY', 'VE', '2432450220'),
(5, 'A95510240', ' AGENCIA DE VIAJES Y TURISMO FRANCO', 'J075083270', '', 'IA,LOCAL NRO. 03 :ENTRE AV. DIAZ MO', 'VALENCIA', 'VE', '2418583340'),
(6, 'A95971864', ' AGENCIA DE VIAJES Y TURISMO FRANCO', 'J075083270', '', '', 'VALENCIA', 'VE', '41'),
(7, 'A95601284', ' AGENCIA DE VIAJES Y TURISMO HALLEY', 'J002241152', '', '', 'CARACAS', 'VE', '2129923212'),
(8, 'A95502094', ' AGENCIA DE VIAJES Y TURISMO NOSA T', 'J085317945', '', '', 'BARQUISIMETO', 'VE', '2512546738'),
(9, 'A95012444', ' AGENCIA DE VIAJES Y TURISMO TUPAHU', 'J002564539', '', '', 'CARACAS', 'VE', ''),
(10, 'A95541972', ' GRUPO ALBORADA VENEZUELA C.A.', 'J295156901', '', '', 'CARACAS', 'VE', '2122631820'),
(11, '503766', ' INVERSIONES ISCE COMPUTERS 0.6 C.A', 'J315410176', '', 'AV. LA ESTANCIA , CCCT PRIMERA ETAPA P.B, LOCAL 43SB09 CHUAO', 'CARACAS', 'VE', '0212-9591249'),
(12, '503720', ' INVERSIONES JJKG 2005, C.A.', 'J312558202', '', 'CALLE PICHINCHA RES. STA TERESA MEZZ 1 URB. LA PAZ, EL PARAISO ', 'CARACAS', 'VE', '0212-4711862/4434841'),
(13, 'A95501313', ' LAS OLAS VIAJES Y TURISMO, C.A.', 'J304235739', '', '', 'VALENCIA', 'VE', '2418259942'),
(14, '502765', ' MAGAZINE BEL 2004, C.A.', 'J312359676', '', 'AV PPAL URBANIZACION LEBRUN EDF LIDER EDF', 'CARACAS', 'VE', '0212 7004126'),
(15, 'A95500451', ' MERCY''S TOURS, C.A.', 'J080246918', '', '', 'MATURIN', 'VE', '291'),
(16, 'A95529011', ' AGENCIA DE VIAJES AMERICA C A', 'J070000287', '', '', 'MARACAIBO', 'VE', '2617982173'),
(19, 'peraza', 'peraza', 'peraza', 'peraza', 'peraza', 'peraza', 'ES', 'peraza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_clasificacion`
--

CREATE TABLE IF NOT EXISTS `proveedores_clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_clasificacion` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `proveedores_clasificacion`
--

INSERT INTO `proveedores_clasificacion` (`id`, `id_clasificacion`, `id_proveedor`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15),
(34, 1, 19),
(35, 3, 19),
(36, 4, 19),
(37, 1, 16),
(38, 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimientos`
--

CREATE TABLE IF NOT EXISTS `requerimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo` int(1) NOT NULL COMMENT '0.- Subasta, 1.- Licitacion',
  `estatus` int(1) NOT NULL COMMENT '0.- Activa, 1.- Inactiva, 2.- Suspendida',
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `requerimientos`
--

INSERT INTO `requerimientos` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`, `tipo`, `estatus`, `fecha`, `id_usuario`) VALUES
(6, 'Una prueba', '2015-06-12', '2015-06-26', 1, 0, '2015-06-17 15:21:39', 5),
(7, 'Otra prueba', '2015-06-12', '2015-06-26', 1, 0, '2015-06-17 15:45:44', 5),
(8, 'Papel Toalet', '2015-06-22', '2015-06-30', 0, 0, '2015-06-23 14:40:15', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento_clasificacion`
--

CREATE TABLE IF NOT EXISTS `requerimiento_clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_requerimiento` int(11) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `requerimiento_clasificacion`
--

INSERT INTO `requerimiento_clasificacion` (`id`, `id_requerimiento`, `id_clasificacion`) VALUES
(9, 6, 1),
(10, 6, 2),
(11, 6, 3),
(12, 6, 4),
(13, 7, 3),
(16, 8, 1),
(17, 8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `tipo` tinyint(1) NOT NULL COMMENT '0.- Usuario Interno 1.- Proveedor',
  `estatus` tinyint(1) NOT NULL COMMENT '0.- Activo, 1.- Forzar cambio clave. 2.- Inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `clave`, `id_proveedor`, `tipo`, `estatus`) VALUES
(2, 'Marquiel', 'Romero', 'mromero', '1234', 1, 0, 0),
(5, 'Jorge', 'Peraza', 'jperaza', '1234', 1, 0, 0),
(8, 'america', 'america', 'america01', '1234', 16, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_privilegio`
--

CREATE TABLE IF NOT EXISTS `usuario_privilegio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_privilegio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuario_privilegio`
--

INSERT INTO `usuario_privilegio` (`id`, `id_usuario`, `id_privilegio`) VALUES
(6, 7, 1),
(7, 6, 1),
(10, 5, 1),
(11, 5, 2),
(12, 2, 1),
(13, 2, 3),
(14, 8, 4),
(15, 5, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
