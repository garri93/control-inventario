INSERT INTO categoria (nombre) VALUES ('Categoría 1');
INSERT INTO categoria (nombre) VALUES ('Categoría 2');
INSERT INTO categoria (nombre) VALUES ('Categoría 3');
INSERT INTO categoria (nombre) VALUES ('Categoría 4');
INSERT INTO categoria (nombre) VALUES ('Categoría 5');


INSERT INTO nombre_dispositivo (nombre, categoria) VALUES ('Dispositivo 1', 1);
INSERT INTO nombre_dispositivo (nombre, categoria) VALUES ('Dispositivo 2', 2);
INSERT INTO nombre_dispositivo (nombre, categoria) VALUES ('Dispositivo 3', 1);
INSERT INTO nombre_dispositivo (nombre, categoria) VALUES ('Dispositivo 4', 2);
INSERT INTO nombre_dispositivo (nombre, categoria) VALUES ('Dispositivo 5', 1);


INSERT INTO empresa (correo, nombre, cif) VALUES ('empresa1@ejemplo.com', 'Empresa 1', 'CIF1');
INSERT INTO empresa (correo, nombre, cif) VALUES ('empresa2@ejemplo.com', 'Empresa 2', 'CIF2');
INSERT INTO empresa (correo, nombre, cif) VALUES ('empresa3@ejemplo.com', 'Empresa 3', 'CIF3');
INSERT INTO empresa (correo, nombre, cif) VALUES ('empresa4@ejemplo.com', 'Empresa 4', 'CIF4');
INSERT INTO empresa (correo, nombre, cif) VALUES ('empresa5@ejemplo.com', 'Empresa 5', 'CIF5');

INSERT INTO cliente (codigo_interno, nombre, cif, empresa_id) VALUES ('CI1', 'Cliente 1', 'CIFC1', 1);
INSERT INTO cliente (codigo_interno, nombre, cif, empresa_id) VALUES ('CI2', 'Cliente 2', 'CIFC2', 2);
INSERT INTO cliente (codigo_interno, nombre, cif, empresa_id) VALUES ('CI3', 'Cliente 3', 'CIFC3', 3);
INSERT INTO cliente (codigo_interno, nombre, cif, empresa_id) VALUES ('CI4', 'Cliente 4', 'CIFC4', 4);
INSERT INTO cliente (codigo_interno, nombre, cif, empresa_id) VALUES ('CI5', 'Cliente 5', 'CIFC5', 5);

INSERT INTO oficina (nombre, calle, codigo_postal, telefono, empresa_id) VALUES ('Oficina 1', 'Calle 1', 'CP1', '111111111', 1);
INSERT INTO oficina (nombre, calle, codigo_postal, telefono, empresa_id) VALUES ('Oficina 2', 'Calle 2', 'CP2', '222222222', 2);
INSERT INTO oficina (nombre, calle, codigo_postal, telefono, empresa_id) VALUES ('Oficina 3', 'Calle 3', 'CP3', '333333333', 3);
INSERT INTO oficina (nombre, calle, codigo_postal, telefono, empresa_id) VALUES ('Oficina 4', 'Calle 4', 'CP4', '444444444', 4);
INSERT INTO oficina (nombre, calle, codigo_postal, telefono, empresa_id) VALUES ('Oficina 5', 'Calle 5', 'CP5', '555555555', 5);

INSERT INTO dispositivo (dispositivo_padre, descripcion, nombre_dispositivo_id, oficina_id) VALUES (null, 'Descripción 1', 1, 1);
INSERT INTO dispositivo (dispositivo_padre, descripcion, nombre_dispositivo_id, oficina_id) VALUES (null, 'Descripción 2', 2, 2);
INSERT INTO dispositivo (dispositivo_padre, descripcion, nombre_dispositivo_id, oficina_id) VALUES (null, 'Descripción 3', 1, 3);
INSERT INTO dispositivo (dispositivo_padre, descripcion, nombre_dispositivo_id, oficina_id) VALUES (null, 'Descripción 4', 2, 4);
INSERT INTO dispositivo (dispositivo_padre, descripcion, nombre_dispositivo_id, oficina_id) VALUES (null, 'Descripción 5', 1, 5);

INSERT INTO atributo (nombre, categoria) VALUES ('Atributo 1', 1);
INSERT INTO atributo (nombre, categoria) VALUES ('Atributo 2', 2);
INSERT INTO atributo (nombre, categoria) VALUES ('Atributo 3', 1);
INSERT INTO atributo (nombre, categoria) VALUES ('Atributo 4', 2);
INSERT INTO atributo (nombre, categoria) VALUES ('Atributo 5', 1);


INSERT INTO configuracion (nombre, descripcion, dispositivo_id, fecha_creacion, fecha_edicion) VALUES ('Configuración 1', 'Descripción de Configuración 1', 1, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO configuracion (nombre, descripcion, dispositivo_id, fecha_creacion, fecha_edicion) VALUES ('Configuración 2', 'Descripción de Configuración 2', 2, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO configuracion (nombre, descripcion, dispositivo_id, fecha_creacion, fecha_edicion) VALUES ('Configuración 3', 'Descripción de Configuración 3', 3, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO configuracion (nombre, descripcion, dispositivo_id, fecha_creacion, fecha_edicion) VALUES ('Configuración 4', 'Descripción de Configuración 4', 4, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO configuracion (nombre, descripcion, dispositivo_id, fecha_creacion, fecha_edicion) VALUES ('Configuración 5', 'Descripción de Configuración 5', 5, '2023-10-11 00:00:00', '2023-10-12 00:00:00');

INSERT INTO actuacion (descripcion, dispositivo_id, fecha) VALUES ('Actuación 1', 1, '2023-10-11 00:00:00');
INSERT INTO actuacion (descripcion, dispositivo_id, fecha) VALUES ('Actuación 2', 2, '2023-10-11 00:00:00');
INSERT INTO actuacion (descripcion, dispositivo_id, fecha) VALUES ('Actuación 3', 3, '2023-10-11 00:00:00');
INSERT INTO actuacion (descripcion, dispositivo_id, fecha) VALUES ('Actuación 4', 4, '2023-10-11 00:00:00');
INSERT INTO actuacion (descripcion, dispositivo_id, fecha) VALUES ('Actuación 5', 5, '2023-10-11 00:00:00');

INSERT INTO usuario (nombre, apellidos, dni, telefono, empresa_id, rol) VALUES ('Usuario 1', 'Apellido 1', 'DNI1', 111111111, 1, 'Rol 1');
INSERT INTO usuario (nombre, apellidos, dni, telefono, empresa_id, rol) VALUES ('Usuario 2', 'Apellido 2', 'DNI2', 222222222, 2, 'Rol 2');
INSERT INTO usuario (nombre, apellidos, dni, telefono, empresa_id, rol) VALUES ('Usuario 3', 'Apellido 3', 'DNI3', 333333333, 3, 'Rol 3');
INSERT INTO usuario (nombre, apellidos, dni, telefono, empresa_id, rol) VALUES ('Usuario 4', 'Apellido 4', 'DNI4', 444444444, 4, 'Rol 4');
INSERT INTO usuario (nombre, apellidos, dni, telefono, empresa_id, rol) VALUES ('Usuario 5', 'Apellido 5', 'DNI5', 555555555, 5, 'Rol 5');


INSERT INTO atributo_dispositivo (atributo_id, dispositivo_id) VALUES (1, 1);
INSERT INTO atributo_dispositivo (atributo_id, dispositivo_id) VALUES (2, 2);
INSERT INTO atributo_dispositivo (atributo_id, dispositivo_id) VALUES (3, 3);
INSERT INTO atributo_dispositivo (atributo_id, dispositivo_id) VALUES (4, 4);
INSERT INTO atributo_dispositivo (atributo_id, dispositivo_id) VALUES (5, 5);

INSERT INTO asignacion_oficina (usuario_id, oficina_id) VALUES (1, 1);
INSERT INTO asignacion_oficina (usuario_id, oficina_id) VALUES (2, 2);
INSERT INTO asignacion_oficina (usuario_id, oficina_id) VALUES (3, 3);
INSERT INTO asignacion_oficina (usuario_id, oficina_id) VALUES (4, 4);
INSERT INTO asignacion_oficina (usuario_id, oficina_id) VALUES (5, 5);

INSERT INTO usuario_actuacion (usuario_id, actuacion_id) VALUES (1, 1);
INSERT INTO usuario_actuacion (usuario_id, actuacion_id) VALUES (2, 2);
INSERT INTO usuario_actuacion (usuario_id, actuacion_id) VALUES (3, 3);
INSERT INTO usuario_actuacion (usuario_id, actuacion_id) VALUES (4, 4);
INSERT INTO usuario_actuacion (usuario_id, actuacion_id) VALUES (5, 5);
