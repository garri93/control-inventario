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


/* EMPRESAS */

INSERT INTO company (id, email, name, cif) VALUES ('1', 'gerencia@goltratec99.com', 'Goltratec', 'R5270737I');
INSERT INTO company (id, email, name, cif) VALUES ('2', 'gerencia@vegared99.com', 'VegaRed', 'F4115348G');
INSERT INTO company (id, email, name, cif) VALUES ('3', 'gerencia@redmapa99.com', 'RedMapa', 'J1192985H');


/* CLIENTES */

INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('1', 'ClientGoltra-1', 'Desarrollos GreenScape', 'W2778182B', '1', '672345678', 'Construyendo espacios sostenibles y verdes para tu hogar.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('2', 'ClientGoltra-2', 'Granjas AgroUrban', 'U7524102F', '1', '610987654', 'Agricultura urbana comprometida con la calidad y frescura.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('3', 'ClientGoltra-3', 'Marinos OceanScape', 'G4800661C', '1', '666123456', 'Descubre el mundo marino a través de productos y experiencias únicas.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('4', 'ClientGoltra-4', 'Aprendizaje EduQuest', 'E09504531', '1', '655789012', 'Educación creativa y estimulante para todas las edades.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('5', 'ClientGoltra-5', 'Mascotas PetWise', 'G5998961F', '1', '688234567', 'Cuidado y productos para el bienestar de tus queridas mascotas.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('6', 'ClientGoltra-6', 'Construcciones EcoViviendas', 'F4998269G', '1', '677890123', 'Casas ecológicas diseñadas para un estilo de vida sostenible.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('7', 'ClientGoltra-7', 'Belleza Natural', 'P7457970G', '1', '699345678', 'Productos naturales que realzan tu belleza de manera saludable.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('8', 'ClientGoltra-8', 'Agricultura Sostenible', 'H65631152', '1', '644567890', 'Comprometidos con la producción agrícola respetuosa con el medio ambiente.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('9', 'ClientGoltra-9', 'Viajes Rurales', 'A59179887', '1', '622678901', 'Descubre la autenticidad de la vida rural en destinos encantadores.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('10', 'ClientGoltra-10', 'Moda Artesanal', 'S1915130G', '1', '677890123', 'Ropa única y hecha a mano que refleja tu estilo individual.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('11', 'ClientVega-1', 'Sabores del Campo', 'Q1900918B', '2', '655432109', 'Delicias culinarias con ingredientes frescos y de origen local.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('12', 'ClientVega-2', 'Muebles de Autor', 'P3102882B', '2', '633210987', 'Piezas de mobiliario diseñadas con creatividad y maestría.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('13', 'ClientVega-3', 'Arte en Madera', 'U9592214B', '2', '699876543', 'Creaciones artísticas talladas con pasión y destreza.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('14', 'ClientVega-4', 'Vinos y Tradición', 'C5406440G', '2', '677890123', 'Descubre la riqueza de los vinos con historias que perduran.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('15', 'ClientVega-5', 'Café del Valle', 'W8733332D', '2', '622345678', 'Disfruta de aromas y sabores únicos en nuestro rincón cafetero.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('16', 'ClientVega-6', 'Boutique Floral', 'C5430085J', '2', '655678901', 'Flores frescas y arreglos únicos para cada ocasión especial.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('17', 'ClientVega-7', 'Decoración Vintage', 'A59295162', '2', '644123456', 'Piezas encantadoras que añaden un toque retro a tu espacio.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('18', 'ClientVega-8', 'Librería del Barrio', 'W1221097G', '2', '611234567', 'Un refugio literario con historias que inspiran y cautivan.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('19', 'ClientVega-9', 'Alimentación Saludable', 'A50281716', '2', '688789012', 'Nutrición consciente para un estilo de vida equilibrado.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('20', 'ClientVega-10', 'Panadería Artesanal', 'B20423067', '2', '677345678', 'Panes y dulces elaborados con amor y tradición.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('21', 'ClientMapa-1', 'Jugos Naturales', 'E76216753', '3', '633987654', 'Bebidas refrescantes y saludables para revitalizar tu día.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('22', 'ClientMapa-2', 'Deportes Urbanos', 'B10749638', '3', '699567890', 'Equipo y accesorios para disfrutar de la actividad física en la ciudad.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('23', 'ClientMapa-3', 'Artesanía Textil', 'P2116673A', '3', '655678901', 'Piezas únicas tejidas con habilidad y pasión por el arte textil.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('24', 'ClientMapa-4', 'Pastelería Gourmet', 'P0641600B', '3', '688345678', 'Deliciosos postres que son una obra de arte para tu paladar.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('25', 'ClientMapa-5', 'Bicicletas del Valle', 'G4862483G', '3', '611234567', 'Explora el paisaje con nuestras bicicletas diseñadas para la aventura.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('26', 'ClientMapa-6', 'Reciclaje Creativo', 'S8714076J', '3', '633987654', 'Transformamos materiales reciclados en objetos únicos y funcionales.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('27', 'ClientMapa-7', 'Mercado del Arte', 'E51524460', '3', '655567890', 'Un espacio donde el arte local cobra vida y encuentra su hogar.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('28', 'ClientMapa-8', 'Rincón Gastronómico', 'Q0011901F', '3', '699678901', 'Sabores auténticos y platos deliciosos para satisfacer tu paladar.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('29', 'ClientMapa-9', 'Vestidos de Novia', 'U0757020C', '3', '677345678', 'Diseños exclusivos que hacen realidad el sueño de cada novia.');
INSERT INTO customer (id, internal_code, name, cif, company_id, phone, notes) VALUES ('30', 'ClientMapa-10', 'Flores y Detalles', 'W2976630J', '3', '688987654', 'Flores frescas y detalles encantadores para cada celebración.');



/* OFICNIAS */
INSERT INTO office (name, address, postal_code, phone, customer_id) VALUES ('office 1', 'Calle 1', 'CP1', '111111111', 1);

    ('1', 'Torre GreenScape', 'Calle187, Carretera de San Vicente del Raspeig', 'Comunidad Valenciana', '03690', '612345678', '1', '9:00 AM - 5:00 PM') VALUES
	('2', 'Centro de Innovaciones GreenScape', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '655432198', '1', '9:15 AM - 5:15 PM'),
	('3', 'Sede EcoGreenScape', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '677894561', '1', '9:30 AM - 5:30 PM'),
	('4', 'Hub GreenScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '634567890', '1', '9:45 AM - 5:45 PM'),
	('5', 'Plaza GreenScape', 'Calle17, Camino Finca la Caholla, Comunidad Valenciana', '03698', '689012345', '1', '10:00 AM - 6:00 PM'),
	('6', 'Centro de Granjas AgroUrban', 'Calle47, Carretera de Agost, Comunidad Valenciana, El Moralet, Cases del Poll', '03698', '622345678', '2', '10:15 AM - 6:15 PM'),
	('7', 'Hub de Cosechas AgroUrban', 'Calle109, Camino Fondo Piqueres, Comunidad Valenciana', '03007', '666789012', '2', '10:30 AM - 6:30 PM'),
	('8', 'Oficina de Campos AgroUrban', 'Calle4, Carretera de San Vicente del Raspeig, Comunidad Valenciana, La Campaneta', '03113', '677654321', '2', '10:45 AM - 6:45 PM'),
	('9', 'Sede AgroUrban Invernadero', 'Calle54, Calle Orégano, Comunidad Valenciana, Santa Faz', '03559', '655789012', '2', '11:00 AM - 7:00 PM'),
	('10', 'Plaza de Agronomía AgroUrban', 'Calle33, Calle de Los Monegros, Polígon Industrial La Florida, Comunidad Valenciana, Mercalicante', '03007', '633456789', '2', '11:15 AM - 7:15 PM'),
	('11', 'Centro Marino OceanScape', 'Calle187, Carretera de San Vicente del Raspeig, Comunidad Valenciana', '03690', '688901234', '3', '11:30 AM - 7:30 PM'),
	('12', 'Hub Azul OceanScape', 'Calle120, Calle de la Salvia, Comunidad Valenciana', '03110', '611234567', '3', '11:45 AM - 7:45 PM'),
	('13', 'Sede OceanScape Olas', 'Calle81, Calle del Alcornoque, Comunidad Valenciana, Ermita de San Jaime', '03690', '655789012', '3', '12:00 PM - 8:00 PM'),
	('14', 'Oficina Costera OceanScape', 'Calle42, Camí dels Vivers, Comunidad Valenciana', '03114', '677654321', '3', '12:15 PM - 8:15 PM');


/*Usuarios las claves son 1234*/
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('pruebaadmin', 'Apellido 1', 'DNI1', '612345678', '1', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'jLhG5-tBubzu9lRsdfZKu5qLxagazdPF', 'pruebaadmin@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('pruebatrabajdor', 'Apellido 2', 'DNI2', '634567890', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'pruebatrabajador@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('pruebacliente', 'Apellido 3', 'DNI3', '656789012', '1', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'INwhox5vPTuOCUyfCkwfKll6W_sLruPt', 'preubacliente@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Antonio', 'Garcia Gonzalez', '17987172E', '677890123', '1', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'antonio.garcia@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Lorena', 'Barrera Rodríguez', '76265457X', '633543210', '1', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'YuGKs8wefCiFtSdudxzt8wGzbM3T_iK8', 'lorena.barrera@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Jose', 'Rodriguez Fernandez', '33541805P', '699012345', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'jose.rodriguez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Manuel', 'Lopez Martinez', '58709775K', '611223344', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'm2tE5fEIPbqHBAtK01IfkyH_7d3pEY1B', 'manuel.lopez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Francisco', 'Sanchez Perez', '62591068H', '633445566', '1', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'francisco.sanchez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Juan', 'Gomez Martin', '14333594V', '655667788', '1', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'pxZO6feoOk4mdJdIzsLjNALVq1V2arag', 'juan.gomez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('David', 'Jimenez Ruiz', '32929978G', '677889900', '1', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'david.jimenez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Jose Antonio', 'Hernandez Diaz', '23122636T', '699001122', '2', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '8vNuVi5AWlGqn42pECjprXHKmj8tKLeC', 'joseantonio.hernandez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Jose Luis', 'Moreno Alvarez', '70058129Z', '611122233', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'joseluis.moreno@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Javier', 'Muñoz Romero', '37955306Q', '633334444', '2', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'RKGozHpWGhZgtQ2f-zPVqKKgOH11KkaS', 'javier.munoz@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Jesus', 'Alonso Gutierrez', '76483453N', '655555555', '2', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'jesus.alonso@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Carlos', 'Navarro Torres', '36753582L', '677777777', '2', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'TGELSP_-kop3yazy-LTFBkOVdEulVc9D', 'carlos.navarro@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Daniel', 'Dominguez Vazquez', '16441139A', '699999999', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'daniel.dominguez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Miguel', 'Ramos Gil', '94634491W', '611112222', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '6iuZPUcuCBRrCh080efP8EPSUbF3X9nQ', 'miguel.ramos@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Rafael', 'Ramirez Serrano', '24083136C', '633221133', '2', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'rafael.ramirez@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Jose Manuel', 'Blanco Suarez', '95857467E', '655443322', '2', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'ua2yA3ucWMnXL3yiK3ExJ0HpBTAJXcLA', 'josemanuel.blanco@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Pedro', 'Molina Morales', '45340260S', '677788899', '2', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'pedro.molina@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Alejandro', 'Ortega Delgado', '90744214Z', '699998877', '3', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'JUNWlpNPichMCA4QO2SQDiuxymWGMMeQ', 'alejandro.ortega@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Angel', 'Castro Ortiz', '26134394T', '611334455', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'angel.castro@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Fernando', 'Rubio Marin', '62349286N', '633556677', '3', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'uXdq2NGEgxVHtiMSA5Bmh_eIaFcC_qRU', 'fernando.rubio@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Luis', 'Sanz Nuñez', '25134082G', '655778899', '3', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'luis.sanz@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Pablo', 'Iglesias Medina', '78821731H', '677123456', '3', '1', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '9ZaWIBpYFJoUunZ_h0Ou8O2rVEZAVEBW', 'pablo.iglesias@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Sergio', 'Garrido Santos', '70365312D', '699876543', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'sergio.garrido@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Jorge', 'Castillo Cortes', '61010001V', '611234567', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', '8sI9wW9cjQHIxV7Hx6eYBLSLQ-2r3dzW', 'jorge.castillo@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Alberto', 'Lozano Guerrero', '59909030X', '633765432', '3', '2', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'alberto.lozano@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Juan Carlos', 'Cano Prieto', '74989744S', '655234567', '3', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 's4t9MJ-_fWpNvORAViEcm1ZHdL_C4sqS', 'juancarlos.cano@1.com');
INSERT INTO user (username, surname, dni, phone, company_id, role, password, authkey, email) VALUES ('Juan Jose', 'Mendez Calvo', '49782661N', '677765432', '3', '3', '$2y$13$VlqY5H/MAJ1BSorFtTG29u42aO6pX0gBZ7e/i9OgfbYP2UWDgJLYW', 'juanjose.mendez@1.com');




