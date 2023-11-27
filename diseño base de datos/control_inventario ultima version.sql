-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-11-2023 a las 23:55:20
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(6, 'ClientGoltra-6', 'Construcciones EcoViviendas', 'F4998269G', 1, 677890123, 0x43617361732065636f6cc3b367696361732064697365c3b161646173207061726120756e20657374696c6f206465207669646120736f7374656e69626c652e),
(7, 'ClientGoltra-7', 'Belleza Natural', 'P7457970G', 1, 699345678, 0x50726f647563746f73206e61747572616c657320717565207265616c7a616e2074752062656c6c657a61206465206d616e6572612073616c756461626c652e),
(8, 'ClientGoltra-8', 'Agricultura Sostenible', 'H65631152', 1, 644567890, 0x436f6d70726f6d657469646f7320636f6e206c612070726f6475636369c3b36e20616772c3ad636f6c6120726573706574756f736120636f6e20656c206d6564696f20616d6269656e74652e),
(9, 'ClientGoltra-9', 'Viajes Rurales', 'A59179887', 1, 622678901, 0x4465736375627265206c6120617574656e74696369646164206465206c61207669646120727572616c20656e2064657374696e6f7320656e63616e7461646f7265732e),
(10, 'ClientGoltra-10', 'Moda Artesanal', 'S1915130G', 1, 677890123, 0x526f706120c3ba6e69636120792068656368612061206d616e6f20717565207265666c656a6120747520657374696c6f20696e646976696475616c2e),
(11, 'ClientVega-1', 'Sabores del Campo', 'Q1900918B', 2, 655432109, 0x44656c69636961732063756c696e617269617320636f6e20696e6772656469656e7465732066726573636f732079206465206f726967656e206c6f63616c2e),
(12, 'ClientVega-2', 'Muebles de Autor', 'P3102882B', 2, 633210987, 0x5069657a6173206465206d6f62696c696172696f2064697365c3b16164617320636f6e2063726561746976696461642079206d6165737472c3ad612e),
(13, 'ClientVega-3', 'Arte en Madera', 'U9592214B', 2, 699876543, 0x4372656163696f6e657320617274c3ad7374696361732074616c6c6164617320636f6e2070617369c3b36e2079206465737472657a612e),
(14, 'ClientVega-4', 'Vinos y Tradición', 'C5406440G', 2, 677890123, 0x4465736375627265206c612072697175657a61206465206c6f732076696e6f7320636f6e20686973746f726961732071756520706572647572616e2e),
(15, 'ClientVega-5', 'Café del Valle', 'W8733332D', 2, 622345678, 0x44697366727574612064652061726f6d61732079207361626f72657320c3ba6e69636f7320656e206e75657374726f2072696e63c3b36e20636166657465726f2e),
(16, 'ClientVega-6', 'Boutique Floral', 'C5430085J', 2, 655678901, 0x466c6f726573206672657363617320792061727265676c6f7320c3ba6e69636f7320706172612063616461206f63617369c3b36e20657370656369616c2e),
(17, 'ClientVega-7', 'Decoración Vintage', 'A59295162', 2, 644123456, 0x5069657a617320656e63616e7461646f726173207175652061c3b16164656e20756e20746f71756520726574726f2061207475206573706163696f2e),
(18, 'ClientVega-8', 'Librería del Barrio', 'W1221097G', 2, 611234567, 0x556e207265667567696f206c697465726172696f20636f6e20686973746f726961732071756520696e73706972616e207920636175746976616e2e),
(19, 'ClientVega-9', 'Alimentación Saludable', 'A50281716', 2, 688789012, 0x4e757472696369c3b36e20636f6e736369656e7465207061726120756e20657374696c6f206465207669646120657175696c69627261646f2e),
(20, 'ClientVega-10', 'Panadería Artesanal', 'B20423067', 2, 677345678, 0x50616e657320792064756c63657320656c61626f7261646f7320636f6e20616d6f7220792074726164696369c3b36e2e),
(21, 'ClientMapa-1', 'Jugos Naturales', 'E76216753', 3, 633987654, 0x426562696461732072656672657363616e74657320792073616c756461626c65732070617261207265766974616c697a61722074752064c3ad612e),
(22, 'ClientMapa-2', 'Deportes Urbanos', 'B10749638', 3, 699567890, 0x45717569706f20792061636365736f72696f73207061726120646973667275746172206465206c61206163746976696461642066c3ad7369636120656e206c61206369756461642e),
(23, 'ClientMapa-3', 'Artesanía Textil', 'P2116673A', 3, 655678901, 0x5069657a617320c3ba6e696361732074656a6964617320636f6e20686162696c6964616420792070617369c3b36e20706f7220656c20617274652074657874696c2e),
(24, 'ClientMapa-4', 'Pastelería Gourmet', 'P0641600B', 3, 688345678, 0x44656c6963696f736f7320706f73747265732071756520736f6e20756e61206f627261206465206172746520706172612074752070616c616461722e),
(25, 'ClientMapa-5', 'Bicicletas del Valle', 'G4862483G', 3, 611234567, 0x4578706c6f726120656c2070616973616a6520636f6e206e756573747261732062696369636c657461732064697365c3b1616461732070617261206c61206176656e747572612e),
(26, 'ClientMapa-6', 'Reciclaje Creativo', 'S8714076J', 3, 633987654, 0x5472616e73666f726d616d6f73206d6174657269616c65732072656369636c61646f7320656e206f626a65746f7320c3ba6e69636f7320792066756e63696f6e616c65732e),
(27, 'ClientMapa-7', 'Mercado del Arte', 'E51524460', 3, 655567890, 0x556e206573706163696f20646f6e646520656c2061727465206c6f63616c20636f6272612076696461207920656e6375656e74726120737520686f6761722e),
(28, 'ClientMapa-8', 'Rincón Gastronómico', 'Q0011901F', 3, 699678901, 0x5361626f72657320617574c3a96e7469636f73207920706c61746f732064656c6963696f736f73207061726120736174697366616365722074752070616c616461722e),
(29, 'ClientMapa-9', 'Vestidos de Novia', 'U0757020C', 3, 677345678, 0x44697365c3b16f73206578636c757369766f732071756520686163656e207265616c6964616420656c20737565c3b16f2064652063616461206e6f7669612e),
(30, 'ClientMapa-10', 'Flores y Detalles', 'W2976630J', 3, 688987654, 0x466c6f7265732066726573636173207920646574616c6c657320656e63616e7461646f726573207061726120636164612063656c656272616369c3b36e2e);

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
(1, 'Torre GreenScape', 'Calle187, Carretera de San Vicente del Raspeig Comunidad Valenciana', '03690', '612345678', 1, '9:00 AM - 5:00 PM', NULL),
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
(14, 'Oficina Costera OceanScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '677654321', 3, '12:15 PM - 8:15 PM', NULL);

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
(33, 'pruebaadmin', 'Apellido 1', 'DNI1', 612345678, 1, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '_8qgDXiqY-SCmSvYzcnthsfU5BO0wU04', NULL, 'carlos@1.com'),
(34, 'pruebatrabajdor', 'Apellido 2', 'DNI2', 634567890, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '9VWxfl26_YR8Mw0c3DERVbd-VbwWcDt1', NULL, 'daniel@1.com'),
(35, 'pruebacliente', 'Apellido 3', 'DNI3', 656789012, 1, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '79AINscZsZXwr1drBPltHF6EIFC6Bja6', NULL, 'jose@1.com'),
(36, 'Antonio', 'Garcia Gonzalez', '17987172E', 677890123, 1, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '2ypjN1csYk6cHMGgqcR3rajlytBkpLgF', NULL, 'antonio.garcia@1.com'),
(37, 'Lorena', 'Barrera Rodríguez', '76265457X', 633543210, 1, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'wI5yOlHqNVb1q4SD21UmB_YJuJx9WLWI', NULL, 'lorena.barrera@1.com'),
(38, 'Jose', 'Rodriguez Fernandez', '33541805P', 699012345, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'GGrkSWuHjk9ZKCisXRlfTg_9S1z8Tr_j', NULL, 'jose.rodriguez@1.com'),
(39, 'Manuel', 'Lopez Martinez', '58709775K', 611223344, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'wvCr24OCqckZiZWY47Wbfkv14Ilwmw1P', NULL, 'manuel.lopez@1.com'),
(40, 'Francisco', 'Sanchez Perez', '62591068H', 633445566, 1, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '029TuyWiTV-WquX0pCM56uCr6xLYT6vx', NULL, 'francisco.sanchez@1.com'),
(41, 'Juan', 'Gomez Martin', '14333594V', 655667788, 1, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'koCzocLzS-ZnSDgrSMLtIy-W-cepn7Y8', NULL, 'juan.gomez@1.com'),
(42, 'David', 'Jimenez Ruiz', '32929978G', 677889900, 1, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'NqrgAYyoNBx-lcn5nliZxf-emmK-eJXF', NULL, 'david.jimenez@1.com'),
(43, 'Jose Antonio', 'Hernandez Diaz', '23122636T', 699001122, 2, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'O0CfERb9jta71sEqMhyK_aT200eALaVk', NULL, 'joseantonio.hernandez@1.com'),
(44, 'Jose Luis', 'Moreno Alvarez', '70058129Z', 611122233, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'ATrLEfhH2wGa28VWt5z8IK7BLuR7hOiK', NULL, 'joseluis.moreno@1.com'),
(45, 'Javier', 'Muñoz Romero', '37955306Q', 633334444, 2, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'J2kQQT-g3wqhRvXOBC1EMivwkXOjbP8_', NULL, 'javier.munoz@1.com'),
(46, 'Jesus', 'Alonso Gutierrez', '76483453N', 655555555, 2, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'dm-iYjCENdUHJ_A03zlLRkk7NiiuU5iR', NULL, 'jesus.alonso@1.com'),
(47, 'Carlos', 'Navarro Torres', '36753582L', 677777777, 2, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'Ri4YeKrLSEm3eLZs_o_wzeDFiCzGqhCI', NULL, 'carlos.navarro@1.com'),
(48, 'Daniel', 'Dominguez Vazquez', '16441139A', 699999999, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '4OHVjGk9mbp9GPkPGvsvVPasePZicypr', NULL, 'daniel.dominguez@1.com'),
(49, 'Miguel', 'Ramos Gil', '94634491W', 611112222, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'dqGh9l5aW1868QNGxfGwQLac2QmkY9t5', NULL, 'miguel.ramos@1.com'),
(50, 'Rafael', 'Ramirez Serrano', '24083136C', 633221133, 2, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'wp52kogJDUXX67tIMPnCy8VEqtBJc303', NULL, 'rafael.ramirez@1.com'),
(51, 'Jose Manuel', 'Blanco Suarez', '95857467E', 655443322, 2, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'kGp2iAIkZYFGBp8Cv4rTD5cgFffMqdl9', NULL, 'josemanuel.blanco@1.com'),
(52, 'Pedro', 'Molina Morales', '45340260S', 677788899, 2, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'yqRClnGEwKKoupwtaahSNERf5MJrWyEN', NULL, 'pedro.molina@1.com'),
(53, 'Alejandro', 'Ortega Delgado', '90744214Z', 699998877, 3, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'zCeyQ2XqRx9K4vrxjvJTDKvKVsErhaCd', NULL, 'alejandro.ortega@1.com'),
(54, 'Angel', 'Castro Ortiz', '26134394T', 611334455, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'ErnQZwq8Zp92qaOqJ_AGNfofZmm4rq_m', NULL, 'angel.castro@1.com'),
(55, 'Fernando', 'Rubio Marin', '62349286N', 633556677, 3, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '624RNsBkJlaLvx1_Jddl2JUAK3vBSD-K', NULL, 'fernando.rubio@1.com'),
(56, 'Luis', 'Sanz Nuñez', '25134082G', 655778899, 3, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'T4FXGkZ7Y0EH2ZD0qsa_52oXRyhlak7g', NULL, 'luis.sanz@1.com'),
(57, 'Pablo', 'Iglesias Medina', '78821731H', 677123456, 3, 1, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'iqUb2pLTFYFF0ECXuNO6ztUoDzu1zdui', NULL, 'pablo.iglesias@1.com'),
(58, 'Sergio', 'Garrido Santos', '70365312D', 699876543, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'MmNOLDvZbKinXXD-s4a-5NTxECAD0uDg', NULL, 'sergio.garrido@1.com'),
(59, 'Jorge', 'Castillo Cortes', '61010001V', 611234567, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'jiz8CIRpEzhAsrfEUZGkzAjOHRePqc6Z', NULL, 'jorge.castillo@1.com'),
(60, 'Alberto', 'Lozano Guerrero', '59909030X', 633765432, 3, 2, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'esywKHiVrzQE6YrxQYttlXlYNwy1Nbj8', NULL, 'alberto.lozano@1.com'),
(61, 'Juan Carlos', 'Cano Prieto', '74989744S', 655234567, 3, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'pVa7qpEoUAGWGUZ2q_lJzTmbiTgYIJPC', NULL, 'juancarlos.cano@1.com'),
(62, 'Juan Jose', 'Mendez Calvo', '49782661N', 677765432, 3, 3, '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'E4iaE1r8PSy4sTF-ptX84XiyWOu9qLZQ', NULL, 'juanjose.mendez@1.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
