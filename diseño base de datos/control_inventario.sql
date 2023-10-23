-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 23-10-2023 a las 16:05:52
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuacion`
--

CREATE TABLE `actuacion` (
  `id` int(11) NOT NULL,
  `descripcion` longblob NOT NULL,
  `dispositivo_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`id`, `descripcion`, `dispositivo_id`, `fecha`) VALUES
(1, 0x41637475616369c3b36e2031, 1, '2023-10-11 00:00:00'),
(2, 0x41637475616369c3b36e2032, 2, '2023-10-11 00:00:00'),
(3, 0x41637475616369c3b36e2033, 3, '2023-10-11 00:00:00'),
(4, 0x41637475616369c3b36e2034, 4, '2023-10-11 00:00:00'),
(5, 0x41637475616369c3b36e2035, 5, '2023-10-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_oficina`
--

CREATE TABLE `asignacion_oficina` (
  `usuario_id` int(11) NOT NULL,
  `oficina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacion_oficina`
--

INSERT INTO `asignacion_oficina` (`usuario_id`, `oficina_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo`
--

CREATE TABLE `atributo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atributo`
--

INSERT INTO `atributo` (`id`, `nombre`, `categoria`) VALUES
(1, 'Atributo 1', 1),
(2, 'Atributo 2', 2),
(3, 'Atributo 3', 1),
(4, 'Atributo 4', 2),
(5, 'Atributo 5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo_dispositivo`
--

CREATE TABLE `atributo_dispositivo` (
  `atributo_id` int(11) NOT NULL,
  `dispositivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atributo_dispositivo`
--

INSERT INTO `atributo_dispositivo` (`atributo_id`, `dispositivo_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Categoría 1'),
(2, 'Categoría 2'),
(3, 'Categoría 3'),
(4, 'Categoría 4'),
(5, 'Categoría 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `codigo_interno` varchar(45) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `codigo_interno`, `nombre`, `cif`, `empresa_id`) VALUES
(1, 'CI1', 'Cliente 1', 'CIFC1', 1),
(2, 'CI2', 'Cliente 2', 'CIFC2', 2),
(3, 'CI3', 'Cliente 3', 'CIFC3', 3),
(4, 'CI4', 'Cliente 4', 'CIFC4', 4),
(5, 'CI5', 'Cliente 5', 'CIFC5', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` longblob NOT NULL,
  `dispositivo_id` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_edicion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `descripcion`, `dispositivo_id`, `fecha_creacion`, `fecha_edicion`) VALUES
(1, 'Configuración 1', 0x446573637269706369c3b36e20646520436f6e6669677572616369c3b36e2031, 1, '2023-10-11 00:00:00', '2023-10-12 00:00:00'),
(2, 'Configuración 2', 0x446573637269706369c3b36e20646520436f6e6669677572616369c3b36e2032, 2, '2023-10-11 00:00:00', '2023-10-12 00:00:00'),
(3, 'Configuración 3', 0x446573637269706369c3b36e20646520436f6e6669677572616369c3b36e2033, 3, '2023-10-11 00:00:00', '2023-10-12 00:00:00'),
(4, 'Configuración 4', 0x446573637269706369c3b36e20646520436f6e6669677572616369c3b36e2034, 4, '2023-10-11 00:00:00', '2023-10-12 00:00:00'),
(5, 'Configuración 5', 0x446573637269706369c3b36e20646520436f6e6669677572616369c3b36e2035, 5, '2023-10-11 00:00:00', '2023-10-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id` int(11) NOT NULL,
  `dispositivo_padre` int(11) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `nombre_dispositivo_id` int(11) NOT NULL,
  `oficina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id`, `dispositivo_padre`, `descripcion`, `nombre_dispositivo_id`, `oficina_id`) VALUES
(1, NULL, 'Descripción 1', 1, 1),
(2, NULL, 'Descripción 2', 2, 2),
(3, NULL, 'Descripción 3', 1, 3),
(4, NULL, 'Descripción 4', 2, 4),
(5, NULL, 'Descripción 5', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cif` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `correo`, `nombre`, `cif`) VALUES
(1, 'empresa1@ejemplo.com', 'Empresa 1', 'CIF1'),
(2, 'empresa2@ejemplo.com', 'Empresa 2', 'CIF2'),
(3, 'empresa3@ejemplo.com', 'Empresa 3', 'CIF3'),
(4, 'empresa4@ejemplo.com', 'Empresa 4', 'CIF4'),
(5, 'empresa5@ejemplo.com', 'Empresa 5', 'CIF5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_dispositivo`
--

CREATE TABLE `nombre_dispositivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nombre_dispositivo`
--

INSERT INTO `nombre_dispositivo` (`id`, `nombre`, `categoria`) VALUES
(1, 'Dispositivo 1', 1),
(2, 'Dispositivo 2', 2),
(3, 'Dispositivo 3', 1),
(4, 'Dispositivo 4', 2),
(5, 'Dispositivo 5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `calle` varchar(250) NOT NULL,
  `codigo_postal` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`id`, `nombre`, `calle`, `codigo_postal`, `telefono`, `empresa_id`) VALUES
(1, 'Oficina 1', 'Calle 1', 'CP1', '111111111', 1),
(2, 'Oficina 2', 'Calle 2', 'CP2', '222222222', 2),
(3, 'Oficina 3', 'Calle 3', 'CP3', '333333333', 3),
(4, 'Oficina 4', 'Calle 4', 'CP4', '444444444', 4),
(5, 'Oficina 5', 'Calle 5', 'CP5', '555555555', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `telefono` int(9) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `dni`, `telefono`, `empresa_id`, `rol`) VALUES
(1, 'Usuario 1', 'Apellido 1', 'DNI1', 111111111, 1, 'Rol 1'),
(2, 'Usuario 2', 'Apellido 2', 'DNI2', 222222222, 2, 'Rol 2'),
(3, 'Usuario 3', 'Apellido 3', 'DNI3', 333333333, 3, 'Rol 3'),
(4, 'Usuario 4', 'Apellido 4', 'DNI4', 444444444, 4, 'Rol 4'),
(5, 'Usuario 5', 'Apellido 5', 'DNI5', 555555555, 5, 'Rol 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_actuacion`
--

CREATE TABLE `usuario_actuacion` (
  `usuario_id` int(11) NOT NULL,
  `actuacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_actuacion`
--

INSERT INTO `usuario_actuacion` (`usuario_id`, `actuacion_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_configuracion_dispositivo1_idx` (`dispositivo_id`);

--
-- Indices de la tabla `asignacion_oficina`
--
ALTER TABLE `asignacion_oficina`
  ADD PRIMARY KEY (`usuario_id`,`oficina_id`),
  ADD KEY `fk_usuario_has_empresa_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_asignacion_oficina_oficina1_idx` (`oficina_id`);

--
-- Indices de la tabla `atributo`
--
ALTER TABLE `atributo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Atributo_categorias1_idx` (`categoria`);

--
-- Indices de la tabla `atributo_dispositivo`
--
ALTER TABLE `atributo_dispositivo`
  ADD PRIMARY KEY (`atributo_id`,`dispositivo_id`),
  ADD KEY `fk_atributo_has_dispositivo_dispositivo1_idx` (`dispositivo_id`),
  ADD KEY `fk_atributo_has_dispositivo_atributo1_idx` (`atributo_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif`),
  ADD KEY `fk_empresa_cuenta1_idx` (`empresa_id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_configuracion_dispositivo1_idx` (`dispositivo_id`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dispositivo_nombre_dispositivo_y_periferico1_idx` (`nombre_dispositivo_id`),
  ADD KEY `fk_dispositivo_oficina1_idx` (`oficina_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif`);

--
-- Indices de la tabla `nombre_dispositivo`
--
ALTER TABLE `nombre_dispositivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nombre_dispositivo_y_periferico_categorias_idx` (`categoria`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefono_UNIQUE` (`telefono`),
  ADD KEY `fk_oficina_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_usuario_cuenta1_idx` (`empresa_id`);

--
-- Indices de la tabla `usuario_actuacion`
--
ALTER TABLE `usuario_actuacion`
  ADD PRIMARY KEY (`usuario_id`,`actuacion_id`),
  ADD KEY `fk_usuario_has_actuaciones_actuaciones1_idx` (`actuacion_id`),
  ADD KEY `fk_usuario_has_actuaciones_usuario1_idx` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignacion_oficina`
--
ALTER TABLE `asignacion_oficina`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `atributo`
--
ALTER TABLE `atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nombre_dispositivo`
--
ALTER TABLE `nombre_dispositivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `oficina`
--
ALTER TABLE `oficina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD CONSTRAINT `fk_configuracion_dispositivo10` FOREIGN KEY (`dispositivo_id`) REFERENCES `dispositivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignacion_oficina`
--
ALTER TABLE `asignacion_oficina`
  ADD CONSTRAINT `fk_asignacion_oficina_oficina1` FOREIGN KEY (`oficina_id`) REFERENCES `oficina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_empresa_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `atributo`
--
ALTER TABLE `atributo`
  ADD CONSTRAINT `fk_Atributo_categorias1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `atributo_dispositivo`
--
ALTER TABLE `atributo_dispositivo`
  ADD CONSTRAINT `fk_atributo_has_dispositivo_atributo1` FOREIGN KEY (`atributo_id`) REFERENCES `atributo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atributo_has_dispositivo_dispositivo1` FOREIGN KEY (`dispositivo_id`) REFERENCES `dispositivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_empresa_cuenta1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD CONSTRAINT `fk_configuracion_dispositivo1` FOREIGN KEY (`dispositivo_id`) REFERENCES `dispositivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `fk_dispositivo_nombre_dispositivo_y_periferico1` FOREIGN KEY (`nombre_dispositivo_id`) REFERENCES `nombre_dispositivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dispositivo_oficina1` FOREIGN KEY (`oficina_id`) REFERENCES `oficina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nombre_dispositivo`
--
ALTER TABLE `nombre_dispositivo`
  ADD CONSTRAINT `fk_nombre_dispositivo_y_periferico_categorias` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD CONSTRAINT `fk_oficina_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cuenta1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_actuacion`
--
ALTER TABLE `usuario_actuacion`
  ADD CONSTRAINT `fk_usuario_has_actuaciones_actuaciones1` FOREIGN KEY (`actuacion_id`) REFERENCES `actuacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_actuaciones_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
