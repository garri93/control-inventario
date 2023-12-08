-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 28-11-2023 a las 17:03:36
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
-- Estructura de tabla para la tabla `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `device_id` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `device_id`, `description`) VALUES
(1, 'Sistema Operativo', 1, 'Windows 11'),
(2, 'Procesador', 1, 'Intel® Core™ i5-12400'),
(3, 'MEMORIA RAM', 1, '16 GB'),
(4, 'Disco Duro', 1, 'SSD 512 GB NVM'),
(5, 'Nombre del Equipo', 1, 'DG-001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `company_id`) VALUES
(1, 'Ordenadores', 1),
(2, 'Servidores', 1),
(3, 'Dispositivos de Red', 1),
(4, 'Dispositivos de Almacenamiento', 1),
(5, 'Dispositivos Móviles', 1),
(6, 'Impresoras y Escáneres', 1),
(7, 'Dispositivos de Seguridad', 1),
(8, 'Dispositivos Perifericos', 1),
(9, 'Dispositivos de Comunicación', 1),
(10, 'Copia de Seguridad y Recuperación', 1),
(11, 'Dispositivos de Audio', 2),
(12, 'Mobiliario', 2),
(13, 'Ordenadores', 2),
(14, 'Servidores', 2),
(15, 'Dispositivos de Red', 2),
(16, 'Dispositivos de Almacenamiento', 2),
(17, 'Dispositivos Móviles', 2),
(18, 'Impresoras y Escáneres', 2),
(19, 'Dispositivos de Seguridad', 2),
(20, 'Dispositivos Perifericos', 2),
(21, 'Dispositivos de Comunicación', 3),
(22, 'Copia de Seguridad y Recuperación', 3),
(23, 'Dispositivos de Audio', 3),
(24, 'Mobiliario', 3),
(25, 'Ordenadores', 3),
(26, 'Servidores', 3),
(27, 'Dispositivos de Red', 3),
(28, 'Dispositivos de Almacenamiento', 3),
(29, 'Dispositivos Móviles', 3),
(30, 'Impresoras y Escáneres', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cif` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `email`, `name`, `cif`) VALUES
(1, 'gerencia@goltratec99.com', 'Goltratec', 'R5270737I'),
(2, 'gerencia@vegared99.com', 'VegaRed', 'F4115348G'),
(3, 'gerencia@redmapa99.com', 'RedMapa', 'J1192985H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `internal_code` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `company_id` int(11) NOT NULL,
  `phone` int(9) NOT NULL,
  `notes` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `internal_code`, `name`, `cif`, `company_id`, `phone`, `notes`) VALUES
(1, 'ClientGoltra-1', 'Desarrollos GreenScape', 'W2778182B', 1, 672345678, 0x436f6e7374727579656e646f206573706163696f7320736f7374656e69626c6573207920766572646573207061726120747520686f6761722e),
(2, 'ClientGoltra-2', 'Granjas AgroUrban', 'U7524102F', 1, 610987654, 0x4167726963756c7475726120757262616e6120636f6d70726f6d657469646120636f6e206c612063616c6964616420792066726573637572612e),
(3, 'ClientGoltra-3', 'Marinos OceanScape', 'G4800661C', 1, 666123456, 0x446573637562726520656c206d756e646f206d6172696e6f20612074726176c3a9732064652070726f647563746f73207920657870657269656e6369617320c3ba6e696361732e),
(4, 'ClientGoltra-4', 'Aprendizaje EduQuest', 'E09504531', 1, 655789012, 0x45647563616369c3b36e206372656174697661207920657374696d756c616e7465207061726120746f646173206c6173206564616465732e),
(5, 'ClientGoltra-5', 'Mascotas PetWise', 'G5998961F', 1, 688234567, 0x4375696461646f20792070726f647563746f73207061726120656c206269656e657374617220646520747573207175657269646173206d6173636f7461732e),
(6, 'ClientVega-1', 'Sabores del Campo', 'Q1900918B', 2, 655432109, 0x44656c69636961732063756c696e617269617320636f6e20696e6772656469656e7465732066726573636f732079206465206f726967656e206c6f63616c2e),
(7, 'ClientVega-2', 'Muebles de Autor', 'P3102882B', 2, 633210987, 0x5069657a6173206465206d6f62696c696172696f2064697365c3b16164617320636f6e2063726561746976696461642079206d6165737472c3ad612e),
(8, 'ClientVega-3', 'Arte en Madera', 'U9592214B', 2, 699876543, 0x4372656163696f6e657320617274c3ad7374696361732074616c6c6164617320636f6e2070617369c3b36e2079206465737472657a612e),
(9, 'ClientVega-4', 'Vinos y Tradición', 'C5406440G', 2, 677890123, 0x4465736375627265206c612072697175657a61206465206c6f732076696e6f7320636f6e20686973746f726961732071756520706572647572616e2e),
(10, 'ClientVega-5', 'Café del Valle', 'W8733332D', 2, 622345678, 0x44697366727574612064652061726f6d61732079207361626f72657320c3ba6e69636f7320656e206e75657374726f2072696e63c3b36e20636166657465726f2e),
(11, 'ClientMapa-1', 'Jugos Naturales', 'E76216753', 3, 633987654, 0x426562696461732072656672657363616e74657320792073616c756461626c65732070617261207265766974616c697a61722074752064c3ad612e),
(12, 'ClientMapa-2', 'Deportes Urbanos', 'B10749638', 3, 699567890, 0x45717569706f20792061636365736f72696f73207061726120646973667275746172206465206c61206163746976696461642066c3ad7369636120656e206c61206369756461642e),
(13, 'ClientMapa-3', 'Artesanía Textil', 'P2116673A', 3, 655678901, 0x5069657a617320c3ba6e696361732074656a6964617320636f6e20686162696c6964616420792070617369c3b36e20706f7220656c20617274652074657874696c2e),
(14, 'ClientMapa-4', 'Pastelería Gourmet', 'P0641600B', 3, 688345678, 0x44656c6963696f736f7320706f73747265732071756520736f6e20756e61206f627261206465206172746520706172612074752070616c616461722e);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `parent_device` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `office_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `device`
--

INSERT INTO `device` (`id`, `parent_device`, `name`, `office_id`, `category_id`) VALUES
(1, NULL, 'DG-001', 1, 1),
(2, 1, '2', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `hours` text,
  `notes` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `office`
--

INSERT INTO `office` (`id`, `name`, `address`, `postal_code`, `phone`, `customer_id`, `hours`, `notes`) VALUES
(1, 'Torre GreenScape', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '612345678', 1, '9:00 AM - 5:00 PM', NULL),
(2, 'Centro de Innovaciones GreenScape', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655432198', 1, '9:15 AM - 5:15 PM', NULL),
(3, 'Sede EcoGreenScape', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677894561', 1, '9:30 AM - 5:30 PM', NULL),
(4, 'Hub GreenScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '634567890', 1, '9:45 AM - 5:45 PM', NULL),
(5, 'Plaza GreenScape', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '689012345', 1, '10:00 AM - 6:00 PM', NULL),
(6, 'Centro de Granjas AgroUrban', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '622345678', 2, '10:15 AM - 6:15 PM', NULL),
(7, 'Hub de Cosechas AgroUrban', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '666789012', 2, '10:30 AM - 6:30 PM', NULL),
(8, 'Oficina de Campos AgroUrban', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', 2, '10:45 AM - 6:45 PM', NULL),
(9, 'Sede AgroUrban Invernadero', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '655789012', 2, '11:00 AM - 7:00 PM', NULL),
(10, 'Plaza de Agronomía AgroUrban', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '633456789', 2, '11:15 AM - 7:15 PM', NULL),
(11, 'Centro Marino OceanScape', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '688901234', 3, '11:30 AM - 7:30 PM', NULL),
(12, 'Hub Azul OceanScape', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '611234567', 3, '11:45 AM - 7:45 PM', NULL),
(13, 'Sede OceanScape Olas', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '655789012', 3, '12:00 PM - 8:00 PM', NULL),
(14, 'Oficina Costera OceanScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '677654321', 3, '12:15 PM - 8:15 PM', NULL),
(15, 'Plaza Náutica OceanScape', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '644567890', 3, '12:30 PM - 8:30 PM', NULL),
(16, 'Centro de Aprendizaje EduQuest', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '699012345', 4, '12:45 PM - 8:45 PM', NULL),
(17, 'Hub de Conocimiento EduQuest', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '611234567', 4, '1:00 PM - 9:00 PM', NULL),
(18, 'Sede de Sabiduría EduQuest', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', 4, '1:15 PM - 9:15 PM', NULL),
(19, 'Oficina de la Academia EduQuest', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', 4, '1:30 PM - 9:30 PM', NULL),
(20, 'Plaza de la Perspicacia EduQuest', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', 4, '1:45 PM - 9:45 PM', NULL),
(21, 'Sede Principal PetWise', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', 5, '2:00 PM - 10:00 PM', NULL),
(22, 'Centro de Cuidado Animal PetWise', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', 5, '2:15 PM - 10:15 PM', NULL),
(23, 'Refugio PetWise', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', 5, '2:30 PM - 10:30 PM', NULL),
(24, 'Oficina de Patas PetWise', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', 5, '2:45 PM - 10:45 PM', NULL),
(25, 'Plaza de Compañía PetWise', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', 5, '3:00 PM - 11:00 PM', NULL),
(26, 'Sede de Sabores del Campo', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', 6, '9:30 PM - 5:30 AM', NULL),
(27, 'Centro Culinario Sabores del Campo', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', 6, '9:45 PM - 5:45 AM', NULL),
(28, 'Plaza de Cocina Sabores del Campo', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', 6, '10:00 PM - 6:00 AM', NULL),
(29, 'Oficina Gourmet Sabores del Campo', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', 6, '10:15 PM - 6:15 AM', NULL),
(30, 'Hub de Delicias del Campo', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', 6, '10:30 PM - 6:30 AM', NULL),
(31, 'Estudio de Muebles de Autor', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', 7, '10:45 PM - 6:45 AM', NULL),
(32, 'Centro de Diseño Muebles de Autor', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', 7, '11:00 PM - 7:00 AM', NULL),
(33, 'Sede de Creaciones de Autor', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', 7, '11:15 PM - 7:15 AM', NULL),
(34, 'Oficina de Estilo de Autor', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', 7, '11:30 PM - 7:30 AM', NULL),
(35, 'Plaza de Diseño Exclusivo', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', 7, '11:45 PM - 7:45 AM', NULL),
(36, 'Taller de Arte en Madera', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', 8, '12:00 AM - 8:00 AM', NULL),
(37, 'Centro de Esculturas en Madera', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', 8, '12:15 AM - 8:15 AM', NULL),
(38, 'Sede de Creaciones en Madera', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', 8, '12:30 AM - 8:30 AM', NULL),
(39, 'Oficina de Diseño en Madera', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', 8, '12:45 AM - 8:45 AM', NULL),
(40, 'Plaza de Arte Natural en Madera', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', 8, '1:00 AM - 9:00 AM', NULL),
(41, 'Sede de Vinos y Tradición', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', 9, '1:15 AM - 9:15 AM', NULL),
(42, 'Centro de Catas y Tradición', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', 9, '1:30 AM - 9:30 AM', NULL),
(43, 'Bodega de Tradición Vínica', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', 9, '1:45 AM - 9:45 AM', NULL),
(44, 'Oficina de Sabores Vínicos', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', 9, '2:00 AM - 10:00 AM', NULL),
(45, 'Plaza de Tradición en Copas', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', 9, '2:15 AM - 10:15 AM', NULL),
(46, 'Sede de Café del Valle', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', 10, '2:30 AM - 10:30 AM', NULL),
(47, 'Centro Cafetero del Valle', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', 10, '2:45 AM - 10:45 AM', NULL),
(48, 'Plaza de Aromas del Valle', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', 10, '3:00 AM - 11:00 AM', NULL),
(49, 'Oficina de Cafés Especiales', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', 10, '3:15 AM - 11:15 AM', NULL),
(50, 'Hub de Sabores del Café', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', 10, '3:30 AM - 11:30 AM', NULL),
(51, 'Sede de Jugos Naturales', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', 11, '12:45 PM - 8:45 PM', NULL),
(52, 'Centro de Extracción Natural', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', 11, '1:00 PM - 9:00 PM', NULL),
(53, 'Plaza de Sabores Naturales', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', 11, '1:15 PM - 9:15 PM', NULL),
(54, 'Oficina de Bebidas Frescas', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', 11, '1:30 PM - 9:30 PM', NULL),
(55, 'Hub de Jugos Refrescantes', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', 11, '1:45 PM - 9:45 PM', NULL),
(56, 'Centro de Deportes Urbanos', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', 12, '2:00 PM - 10:00 PM', NULL),
(57, 'Sede de Actividades Urbanas', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', 12, '2:15 PM - 10:15 PM', NULL),
(58, 'Plaza de Entrenamiento Urbano', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', 12, '2:30 PM - 10:30 PM', NULL),
(59, 'Oficina de Deportes en la Ciudad', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', 12, '2:45 PM - 10:45 PM', NULL),
(60, 'Hub de Experiencias Urbanas', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', 12, '3:00 PM - 11:00 PM', NULL),
(61, 'Taller de Artesanía Textil', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', 13, '3:15 PM - 11:15 PM', NULL),
(62, 'Centro de Creaciones Textiles', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', 13, '3:30 PM - 11:30 PM', NULL),
(63, 'Sede de Tejidos Artesanales', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', 13, '3:45 PM - 11:45 PM', NULL),
(64, 'Oficina de Diseño Textil', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', 13, '4:00 PM - 12:00 AM', NULL),
(65, 'Plaza de Texturas Artesanales', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', 13, '4:15 PM - 12:15 AM', NULL),
(66, 'Sede de Pastelería Gourmet', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', 14, '4:30 PM - 12:30 AM', NULL),
(67, 'Centro de Delicias Gourmet', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', 14, '4:45 PM - 12:45 AM', NULL),
(68, 'Plaza de Sabores Exquisitos', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', 14, '5:00 PM - 1:00 AM', NULL),
(69, 'Oficina de Creaciones Dulces', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', 14, '5:15 PM - 1:15 AM', NULL),
(70, 'Hub de Postres Gourmet', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', 14, '5:30 PM - 1:30 AM', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `office_assignment`
--

CREATE TABLE `office_assignment` (
  `user_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `device_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `device_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `edition_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `phone` int(9) NOT NULL,
  `company_id` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `password` varchar(250) NOT NULL,
  `auth_key` varchar(250) DEFAULT NULL,
  `accessToken` varchar(250) DEFAULT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `surname`, `dni`, `phone`, `company_id`, `role`, `password`, `auth_key`, `accessToken`, `email`) VALUES
(1, 'pruebaadmin', 'Apellido 1', 'DNI1', 612345678, 1, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'carlos@1.com'),
(2, 'pruebatrabajdor', 'Apellido 2', 'DNI2', 634567890, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'daniel@1.com'),
(3, 'pruebacliente', 'Apellido 3', 'DNI3', 656789012, 1, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'jose@1.com'),
(4, 'Antonio', 'Garcia Gonzalez', '17987172E', 677890123, 1, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'antonio.garcia@1.com'),
(5, 'Lorena', 'Barrera Rodríguez', '76265457X', 633543210, 1, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'lorena.barrera@1.com'),
(6, 'Jose', 'Rodriguez Fernandez', '33541805P', 699012345, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'jose.rodriguez@1.com'),
(7, 'Manuel', 'Lopez Martinez', '58709775K', 611223344, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'manuel.lopez@1.com'),
(8, 'Francisco', 'Sanchez Perez', '62591068H', 633445566, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'francisco.sanchez@1.com'),
(9, 'Juan', 'Gomez Martin', '14333594V', 655667788, 1, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'juan.gomez@1.com'),
(10, 'David', 'Jimenez Ruiz', '32929978G', 677889900, 1, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'david.jimenez@1.com'),
(11, 'Jose Antonio', 'Hernandez Diaz', '23122636T', 699001122, 2, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'joseantonio.hernandez@1.com'),
(12, 'Jose Luis', 'Moreno Alvarez', '70058129Z', 611122233, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'joseluis.moreno@1.com'),
(13, 'Javier', 'Muñoz Romero', '37955306Q', 633334444, 2, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'javier.munoz@1.com'),
(14, 'Jesus', 'Alonso Gutierrez', '76483453N', 655555555, 2, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'jesus.alonso@1.com'),
(15, 'Carlos', 'Navarro Torres', '36753582L', 677777777, 2, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'carlos.navarro@1.com'),
(16, 'Daniel', 'Dominguez Vazquez', '16441139A', 699999999, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'daniel.dominguez@1.com'),
(17, 'Miguel', 'Ramos Gil', '94634491W', 611112222, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'miguel.ramos@1.com'),
(18, 'Rafael', 'Ramirez Serrano', '24083136C', 633221133, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'rafael.ramirez@1.com'),
(19, 'Jose Manuel', 'Blanco Suarez', '95857467E', 655443322, 2, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'josemanuel.blanco@1.com'),
(20, 'Pedro', 'Molina Morales', '45340260S', 677788899, 2, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'pedro.molina@1.com'),
(21, 'Alejandro', 'Ortega Delgado', '90744214Z', 699998877, 3, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'alejandro.ortega@1.com'),
(22, 'Angel', 'Castro Ortiz', '26134394T', 611334455, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'angel.castro@1.com'),
(23, 'Fernando', 'Rubio Marin', '62349286N', 633556677, 3, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'fernando.rubio@1.com'),
(24, 'Luis', 'Sanz Nuñez', '25134082G', 655778899, 3, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'luis.sanz@1.com'),
(25, 'Pablo', 'Iglesias Medina', '78821731H', 677123456, 3, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'pablo.iglesias@1.com'),
(26, 'Sergio', 'Garrido Santos', '70365312D', 699876543, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'sergio.garrido@1.com'),
(27, 'Jorge', 'Castillo Cortes', '61010001V', 611234567, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'jorge.castillo@1.com'),
(28, 'Alberto', 'Lozano Guerrero', '59909030X', 633765432, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'alberto.lozano@1.com'),
(29, 'Juan Carlos', 'Cano Prieto', '74989744S', 655234567, 3, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'juancarlos.cano@1.com'),
(30, 'Juan Jose', 'Mendez Calvo', '49782661N', 677765432, 3, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', NULL, NULL, 'juanjose.mendez@1.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_performance`
--

CREATE TABLE `user_performance` (
  `user_id` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`,`device_id`),
  ADD KEY `fk_attribute_device1_idx` (`device_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`company_id`),
  ADD KEY `fk_category_company1_idx` (`company_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`email`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif`),
  ADD KEY `fk_empresa_cuenta1_idx` (`company_id`);

--
-- Indices de la tabla `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dispositivo_oficina1_idx` (`office_id`),
  ADD KEY `fk_device_category1_idx` (`category_id`);

--
-- Indices de la tabla `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_oficina_empresa1_idx` (`customer_id`);

--
-- Indices de la tabla `office_assignment`
--
ALTER TABLE `office_assignment`
  ADD PRIMARY KEY (`user_id`,`office_id`),
  ADD KEY `fk_usuario_has_empresa_usuario1_idx` (`user_id`),
  ADD KEY `fk_asignacion_oficina_oficina1_idx` (`office_id`);

--
-- Indices de la tabla `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_configuracion_dispositivo1_idx` (`device_id`);

--
-- Indices de la tabla `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_configuracion_dispositivo1_idx` (`device_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_UNIQUE` (`email`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_usuario_cuenta1_idx` (`company_id`);

--
-- Indices de la tabla `user_performance`
--
ALTER TABLE `user_performance`
  ADD PRIMARY KEY (`user_id`,`performance_id`),
  ADD KEY `fk_usuario_has_actuaciones_actuaciones1_idx` (`performance_id`),
  ADD KEY `fk_usuario_has_actuaciones_usuario1_idx` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `office_assignment`
--
ALTER TABLE `office_assignment`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `fk_attribute_device1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_empresa_cuenta1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `fk_device_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dispositivo_oficina1` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `fk_oficina_empresa1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `office_assignment`
--
ALTER TABLE `office_assignment`
  ADD CONSTRAINT `fk_asignacion_oficina_oficina1` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_empresa_usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `fk_configuracion_dispositivo10` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `fk_configuracion_dispositivo1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_usuario_cuenta1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_performance`
--
ALTER TABLE `user_performance`
  ADD CONSTRAINT `fk_usuario_has_actuaciones_actuaciones1` FOREIGN KEY (`performance_id`) REFERENCES `performance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_actuaciones_usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
