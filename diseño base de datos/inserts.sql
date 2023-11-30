/* EMPRESAS */

INSERT INTO company (id, email, name, cif) VALUES ('1', 'gerencia@goltratec99.com', 'Goltratec', 'R5270737I');
INSERT INTO company (id, email, name, cif) VALUES ('2', 'gerencia@vegared99.com', 'VegaRed', 'F4115348G');
INSERT INTO company (id, email, name, cif) VALUES ('3', 'gerencia@redmapa99.com', 'RedMapa', 'J1192985H');


/********* Categorias *****/

INSERT INTO category (name, company_id) VALUES ('Ordenadores', '1');
INSERT INTO category (name, company_id) VALUES ('Servidores', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Red', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Almacenamiento', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos Móviles', '1');
INSERT INTO category (name, company_id) VALUES ('Impresoras y Escáneres', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Seguridad', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos Perifericos', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Comunicación', '1');
INSERT INTO category (name, company_id) VALUES ('Copia de Seguridad y Recuperación', '1');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Audio', '2');
INSERT INTO category (name, company_id) VALUES ('Mobiliario', '2');
INSERT INTO category (name, company_id) VALUES ('Ordenadores', '2');
INSERT INTO category (name, company_id) VALUES ('Servidores', '2');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Red', '2');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Almacenamiento', '2');
INSERT INTO category (name, company_id) VALUES ('Dispositivos Móviles', '2');
INSERT INTO category (name, company_id) VALUES ('Impresoras y Escáneres', '2');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Seguridad', '2');
INSERT INTO category (name, company_id) VALUES ('Dispositivos Perifericos', '2');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Comunicación', '3');
INSERT INTO category (name, company_id) VALUES ('Copia de Seguridad y Recuperación', '3');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Audio', '3');
INSERT INTO category (name, company_id) VALUES ('Mobiliario', '3');
INSERT INTO category (name, company_id) VALUES ('Ordenadores', '3');
INSERT INTO category (name, company_id) VALUES ('Servidores', '3');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Red', '3');
INSERT INTO category (name, company_id) VALUES ('Dispositivos de Almacenamiento', '3');
INSERT INTO category (name, company_id) VALUES ('Dispositivos Móviles', '3');
INSERT INTO category (name, company_id) VALUES ('Impresoras y Escáneres', '3');


/* CLIENTES */

INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('1', 'ClientGoltra-1', 'Desarrollos GreenScape', 'W2778182B', '1', '672345678', 'Construyendo espacios sostenibles y verdes para tu hogar.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('2', 'ClientGoltra-2', 'Granjas AgroUrban', 'U7524102F', '1', '610987654', 'Agricultura urbana comprometida con la calidad y frescura.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('3', 'ClientGoltra-3', 'Marinos OceanScape', 'G4800661C', '1', '666123456', 'Descubre el mundo marino a través de productos y experiencias únicas.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('4', 'ClientGoltra-4', 'Aprendizaje EduQuest', 'E09504531', '1', '655789012', 'Educación creativa y estimulante para todas las edades.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('5', 'ClientGoltra-5', 'Mascotas PetWise', 'G5998961F', '1', '688234567', 'Cuidado y productos para el bienestar de tus queridas mascotas.');

INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('6', 'ClientVega-1', 'Sabores del Campo', 'Q1900918B', '2', '655432109', 'Delicias culinarias con ingredientes frescos y de origen local.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('7', 'ClientVega-2', 'Muebles de Autor', 'P3102882B', '2', '633210987', 'Piezas de mobiliario diseñadas con creatividad y maestría.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('8', 'ClientVega-3', 'Arte en Madera', 'U9592214B', '2', '699876543', 'Creaciones artísticas talladas con pasión y destreza.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('9', 'ClientVega-4', 'Vinos y Tradición', 'C5406440G', '2', '677890123', 'Descubre la riqueza de los vinos con historias que perduran.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('10', 'ClientVega-5', 'Café del Valle', 'W8733332D', '2', '622345678', 'Disfruta de aromas y sabores únicos en nuestro rincón cafetero.');

INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('11', 'ClientMapa-1', 'Jugos Naturales', 'E76216753', '3', '633987654', 'Bebidas refrescantes y saludables para revitalizar tu día.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('12', 'ClientMapa-2', 'Deportes Urbanos', 'B10749638', '3', '699567890', 'Equipo y accesorios para disfrutar de la actividad física en la ciudad.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('13', 'ClientMapa-3', 'Artesanía Textil', 'P2116673A', '3', '655678901', 'Piezas únicas tejidas con habilidad y pasión por el arte textil.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('14', 'ClientMapa-4', 'Pastelería Gourmet', 'P0641600B', '3', '688345678', 'Deliciosos postres que son una obra de arte para tu paladar.');





/* OFICNIAS */
INSERT INTO office (name, address, postal_code, phone, customer_id,hours) VALUES 
	('Torre GreenScape', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '612345678', '1', '9:00 AM - 5:00 PM'),
	('Centro de Innovaciones GreenScape', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655432198', '1', '9:15 AM - 5:15 PM'),
	('Sede EcoGreenScape', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677894561', '1', '9:30 AM - 5:30 PM'),
	('Hub GreenScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '634567890', '1', '9:45 AM - 5:45 PM'),
	('Plaza GreenScape', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '689012345', '1', '10:00 AM - 6:00 PM'),
	('Centro de Granjas AgroUrban', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '622345678', '2', '10:15 AM - 6:15 PM'),
	('Hub de Cosechas AgroUrban', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '666789012', '2', '10:30 AM - 6:30 PM'),
	('Oficina de Campos AgroUrban', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '2', '10:45 AM - 6:45 PM'),
	('Sede AgroUrban Invernadero', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '655789012', '2', '11:00 AM - 7:00 PM'),
	( 'Plaza de Agronomía AgroUrban', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '633456789', '2', '11:15 AM - 7:15 PM'),
	('Centro Marino OceanScape', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '688901234', '3', '11:30 AM - 7:30 PM'),
	('Hub Azul OceanScape', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '611234567', '3', '11:45 AM - 7:45 PM'),
	('Sede OceanScape Olas', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '655789012', '3', '12:00 PM - 8:00 PM'),
	('Oficina Costera OceanScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '677654321', '3', '12:15 PM - 8:15 PM'),
	('Plaza Náutica OceanScape', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '644567890', '3', '12:30 PM - 8:30 PM'),
	('Centro de Aprendizaje EduQuest', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '699012345', '4', '12:45 PM - 8:45 PM'),
	('Hub de Conocimiento EduQuest', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '611234567', '4', '1:00 PM - 9:00 PM'),
	('Sede de Sabiduría EduQuest', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '4', '1:15 PM - 9:15 PM'),
	('Oficina de la Academia EduQuest', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', '4', '1:30 PM - 9:30 PM'),
	('Plaza de la Perspicacia EduQuest', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', '4', '1:45 PM - 9:45 PM'),
	('Sede Principal PetWise', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', '5', '2:00 PM - 10:00 PM'),
	('Centro de Cuidado Animal PetWise', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', '5', '2:15 PM - 10:15 PM'),
	('Refugio PetWise', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', '5', '2:30 PM - 10:30 PM'),
	('Oficina de Patas PetWise', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', '5', '2:45 PM - 10:45 PM'),
	('Plaza de Compañía PetWise', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', '5', '3:00 PM - 11:00 PM'),
	('Sede de Sabores del Campo', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', '6', '9:30 PM - 5:30 AM'),
	('Centro Culinario Sabores del Campo', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', '6', '9:45 PM - 5:45 AM'),
	('Plaza de Cocina Sabores del Campo', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', '6', '10:00 PM - 6:00 AM'),
	('Oficina Gourmet Sabores del Campo', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', '6', '10:15 PM - 6:15 AM'),
	('Hub de Delicias del Campo', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', '6', '10:30 PM - 6:30 AM'),
	('Estudio de Muebles de Autor', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', '7', '10:45 PM - 6:45 AM'),
	('Centro de Diseño Muebles de Autor', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', '7', '11:00 PM - 7:00 AM'),
	('Sede de Creaciones de Autor', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '7', '11:15 PM - 7:15 AM'),
	('Oficina de Estilo de Autor', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', '7', '11:30 PM - 7:30 AM'),
	('Plaza de Diseño Exclusivo', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', '7', '11:45 PM - 7:45 AM'),
	('Taller de Arte en Madera', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', '8', '12:00 AM - 8:00 AM'),
	('Centro de Esculturas en Madera', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', '8', '12:15 AM - 8:15 AM'),
	('Sede de Creaciones en Madera', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', '8', '12:30 AM - 8:30 AM'),
	('Oficina de Diseño en Madera', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', '8', '12:45 AM - 8:45 AM'),
	('Plaza de Arte Natural en Madera', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', '8', '1:00 AM - 9:00 AM'),
	('Sede de Vinos y Tradición', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', '9', '1:15 AM - 9:15 AM'),
	('Centro de Catas y Tradición', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', '9', '1:30 AM - 9:30 AM'),
	('Bodega de Tradición Vínica', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '9', '1:45 AM - 9:45 AM'),
	('Oficina de Sabores Vínicos', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', '9', '2:00 AM - 10:00 AM'),
	('Plaza de Tradición en Copas', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', '9', '2:15 AM - 10:15 AM'),
	('Sede de Café del Valle', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', '10', '2:30 AM - 10:30 AM'),
	('Centro Cafetero del Valle', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', '10', '2:45 AM - 10:45 AM'),
	('Plaza de Aromas del Valle', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', '10', '3:00 AM - 11:00 AM'),
	('Oficina de Cafés Especiales', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', '10', '3:15 AM - 11:15 AM'),
	('Hub de Sabores del Café', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', '10', '3:30 AM - 11:30 AM'),
	('Sede de Jugos Naturales', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', '11', '12:45 PM - 8:45 PM'),
	('Centro de Extracción Natural', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', '11', '1:00 PM - 9:00 PM'),
	('Plaza de Sabores Naturales', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', '11', '1:15 PM - 9:15 PM'),
	('Oficina de Bebidas Frescas', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', '11', '1:30 PM - 9:30 PM'),
	('Hub de Jugos Refrescantes', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', '11', '1:45 PM - 9:45 PM'),
	('Centro de Deportes Urbanos', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', '12', '2:00 PM - 10:00 PM'),
	('Sede de Actividades Urbanas', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', '12', '2:15 PM - 10:15 PM'),
	('Plaza de Entrenamiento Urbano', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '12', '2:30 PM - 10:30 PM'),
	('Oficina de Deportes en la Ciudad', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', '12', '2:45 PM - 10:45 PM'),
	('Hub de Experiencias Urbanas', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', '12', '3:00 PM - 11:00 PM'),
	('Taller de Artesanía Textil', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '611234567', '13', '3:15 PM - 11:15 PM'),
	('Centro de Creaciones Textiles', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655789012', '13', '3:30 PM - 11:30 PM'),
	('Sede de Tejidos Artesanales', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677654321', '13', '3:45 PM - 11:45 PM'),
	('Oficina de Diseño Textil', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '644567890', '13', '4:00 PM - 12:00 AM'),
	('Plaza de Texturas Artesanales', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '688901234', '13', '4:15 PM - 12:15 AM'),
	('Sede de Pastelería Gourmet', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '611234567', '14', '4:30 PM - 12:30 AM'),
	('Centro de Delicias Gourmet', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '655789012', '14', '4:45 PM - 12:45 AM'),
	('Plaza de Sabores Exquisitos', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '14', '5:00 PM - 1:00 AM'),
	('Oficina de Creaciones Dulces', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '644567890', '14', '5:15 PM - 1:15 AM'),
	('Hub de Postres Gourmet', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '688901234', '14', '5:30 PM - 1:30 AM');




/*Usuarios las claves son 1234*/

INSERT INTO `user` (`username`, `surname`, `dni`, `phone`, `company_id`, `role`, `password`, `auth_key`, `email`) VALUES
	('carlos', 'Apellido 1', 'DNI1', '612345678', '1', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '_8qgDXiqY-SCmSvYzcnthsfU5BO0wU04', 'carlos@1.com'),
	('pruebatrabajdor', 'Apellido 2', 'DNI2', '634567890', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '9VWxfl26_YR8Mw0c3DERVbd-VbwWcDt1', 'daniel@1.com'),
	('pruebacliente', 'Apellido 3', 'DNI3', '656789012', '1', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '79AINscZsZXwr1drBPltHF6EIFC6Bja6', 'jose@1.com'),
	('Antonio', 'Garcia Gonzalez', '17987172E', '677890123', '1', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '2ypjN1csYk6cHMGgqcR3rajlytBkpLgF', 'antonio.garcia@1.com'),
	('Lorena', 'Barrera Rodríguez', '76265457X', '633543210', '1', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'wI5yOlHqNVb1q4SD21UmB_YJuJx9WLWI', 'lorena.barrera@1.com'),
	('Jose', 'Rodriguez Fernandez', '33541805P', '699012345', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'GGrkSWuHjk9ZKCisXRlfTg_9S1z8Tr_j', 'jose.rodriguez@1.com'),
	('Manuel', 'Lopez Martinez', '58709775K', '611223344', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'wvCr24OCqckZiZWY47Wbfkv14Ilwmw1P', 'manuel.lopez@1.com'),
	('Francisco', 'Sanchez Perez', '62591068H', '633445566', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '029TuyWiTV-WquX0pCM56uCr6xLYT6vx', 'francisco.sanchez@1.com'),
	('Juan', 'Gomez Martin', '14333594V', '655667788', '1', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'koCzocLzS-ZnSDgrSMLtIy-W-cepn7Y8', 'juan.gomez@1.com'),
	('David', 'Jimenez Ruiz', '32929978G', '677889900', '1', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'NqrgAYyoNBx-lcn5nliZxf-emmK-eJXF', 'david.jimenez@1.com'),
	('Jose Antonio', 'Hernandez Diaz', '23122636T', '699001122', '2', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'O0CfERb9jta71sEqMhyK_aT200eALaVk', 'joseantonio.hernandez@1.com'),
	('Jose Luis', 'Moreno Alvarez', '70058129Z', '611122233', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'ATrLEfhH2wGa28VWt5z8IK7BLuR7hOiK', 'joseluis.moreno@1.com'),
	('Javier', 'Muñoz Romero', '37955306Q', '633334444', '2', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'J2kQQT-g3wqhRvXOBC1EMivwkXOjbP8_', 'javier.munoz@1.com'),
	('Jesus', 'Alonso Gutierrez', '76483453N', '655555555', '2', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'dm-iYjCENdUHJ_A03zlLRkk7NiiuU5iR', 'jesus.alonso@1.com'),
	('Carlos', 'Navarro Torres', '36753582L', '677777777', '2', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'Ri4YeKrLSEm3eLZs_o_wzeDFiCzGqhCI', 'carlos.navarro@1.com'),
	('Daniel', 'Dominguez Vazquez', '16441139A', '699999999', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '4OHVjGk9mbp9GPkPGvsvVPasePZicypr', 'daniel.dominguez@1.com'),
	('Miguel', 'Ramos Gil', '94634491W', '611112222', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'dqGh9l5aW1868QNGxfGwQLac2QmkY9t5', 'miguel.ramos@1.com'),
	('Rafael', 'Ramirez Serrano', '24083136C', '633221133', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'wp52kogJDUXX67tIMPnCy8VEqtBJc303', 'rafael.ramirez@1.com'),
	('Jose Manuel', 'Blanco Suarez', '95857467E', '655443322', '2', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'kGp2iAIkZYFGBp8Cv4rTD5cgFffMqdl9', 'josemanuel.blanco@1.com'),
	('Pedro', 'Molina Morales', '45340260S', '677788899', '2', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'yqRClnGEwKKoupwtaahSNERf5MJrWyEN', 'pedro.molina@1.com'),
	('Alejandro', 'Ortega Delgado', '90744214Z', '699998877', '3', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'zCeyQ2XqRx9K4vrxjvJTDKvKVsErhaCd', 'alejandro.ortega@1.com'),
	('Angel', 'Castro Ortiz', '26134394T', '611334455', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'ErnQZwq8Zp92qaOqJ_AGNfofZmm4rq_m', 'angel.castro@1.com'),
	('Fernando', 'Rubio Marin', '62349286N', '633556677', '3', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '624RNsBkJlaLvx1_Jddl2JUAK3vBSD-K', 'fernando.rubio@1.com'),
	('Luis', 'Sanz Nuñez', '25134082G', '655778899', '3', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'T4FXGkZ7Y0EH2ZD0qsa_52oXRyhlak7g', 'luis.sanz@1.com'),
	('Pablo', 'Iglesias Medina', '78821731H', '677123456', '3', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'iqUb2pLTFYFF0ECXuNO6ztUoDzu1zdui', 'pablo.iglesias@1.com'),
	('Sergio', 'Garrido Santos', '70365312D', '699876543', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'MmNOLDvZbKinXXD-s4a-5NTxECAD0uDg', 'sergio.garrido@1.com'),
	('Jorge', 'Castillo Cortes', '61010001V', '611234567', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'jiz8CIRpEzhAsrfEUZGkzAjOHRePqc6Z', 'jorge.castillo@1.com'),
	('Alberto', 'Lozano Guerrero', '59909030X', '633765432', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'esywKHiVrzQE6YrxQYttlXlYNwy1Nbj8', 'alberto.lozano@1.com'),
	('Juan Carlos', 'Cano Prieto', '74989744S', '655234567', '3', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'pVa7qpEoUAGWGUZ2q_lJzTmbiTgYIJPC', 'juancarlos.cano@1.com'),
	('Juan Jose', 'Mendez Calvo', '49782661N', '677765432', '3', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'E4iaE1r8PSy4sTF-ptX84XiyWOu9qLZQ', 'juanjose.mendez@1.com');

