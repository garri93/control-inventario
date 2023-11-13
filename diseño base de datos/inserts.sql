
/********* Categorioas *****/

INSERT INTO category (name) VALUES ('Categoría 1');
INSERT INTO category (name) VALUES ('Categoría 2');
INSERT INTO category (name) VALUES ('Categoría 3');
INSERT INTO category (name) VALUES ('Categoría 4');
INSERT INTO category (name) VALUES ('Categoría 5');

/* EMPRESAS */

INSERT INTO company (email, name, cif) VALUES ('company1@ejemplo.com', 'company 1', 'CIF1');
INSERT INTO company (email, name, cif) VALUES ('company2@ejemplo.com', 'company 2', 'CIF2');
INSERT INTO company (email, name, cif) VALUES ('company3@ejemplo.com', 'company 3', 'CIF3');
INSERT INTO company (email, name, cif) VALUES ('company4@ejemplo.com', 'company 4', 'CIF4');
INSERT INTO company (email, name, cif) VALUES ('company5@ejemplo.com', 'company 5', 'CIF5');

/* CLIENTES */

INSERT INTO customer (internal_code, name, cif, company_id) VALUES ('CI1', 'customer 1', 'CIFC1', 1);
INSERT INTO customer (internal_code, name, cif, company_id) VALUES ('CI2', 'customer 2', 'CIFC2', 2);
INSERT INTO customer (internal_code, name, cif, company_id) VALUES ('CI3', 'customer 3', 'CIFC3', 3);
INSERT INTO customer (internal_code, name, cif, company_id) VALUES ('CI4', 'customer 4', 'CIFC4', 4);
INSERT INTO customer (internal_code, name, cif, company_id) VALUES ('CI5', 'customer 5', 'CIFC5', 5);

/* OFICNIAS */
INSERT INTO office (name, address, postal_code, phone, customer_id) VALUES ('office 1', 'Calle 1', 'CP1', '111111111', 1);
INSERT INTO office (name, address, postal_code, phone, customer_id) VALUES ('office 2', 'Calle 2', 'CP2', '222222222', 2);
INSERT INTO office (name, address, postal_code, phone, customer_id) VALUES ('office 3', 'Calle 3', 'CP3', '333333333', 3);
INSERT INTO office (name, address, postal_code, phone, customer_id) VALUES ('office 4', 'Calle 4', 'CP4', '444444444', 4);
INSERT INTO office (name, address, postal_code, phone, customer_id) VALUES ('office 5', 'Calle 5', 'CP5', '555555555', 5);

/* DISPOSITIVOS */
INSERT INTO device (parent_device, name, office_id) VALUES (null, 'Descripción 1',  1);
INSERT INTO device (parent_device, name, office_id) VALUES (null, 'Descripción 2', 2);
INSERT INTO device (parent_device, name,  office_id) VALUES (null, 'Descripción 3', 3);
INSERT INTO device (parent_device, name, office_id) VALUES (null, 'Descripción 4', 4);
INSERT INTO device (parent_device, name, office_id) VALUES (null, 'Descripción 5', 5);

/* Atributos */
INSERT INTO attribute (name, device_id, description) VALUES ("name1", 1, 'description');
INSERT INTO attribute (name, device_id, description) VALUES ("name2", 2, 'description');
INSERT INTO attribute (name, device_id, description) VALUES ("name6", 3, 'description');
INSERT INTO attribute (name, device_id, description) VALUES ("name5", 4, 'description');
INSERT INTO attribute (name, device_id, description) VALUES ("name3", 5, 'description');

/** configuraciones **/
INSERT INTO setting (name, description, device_id, creation_date, edition_date) VALUES ('Configuración 1', 'Descripción de Configuración 1', 1, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO setting (name, description, device_id, creation_date, edition_date) VALUES ('Configuración 2', 'Descripción de Configuración 2', 2, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO setting (name, description, device_id, creation_date, edition_date) VALUES ('Configuración 3', 'Descripción de Configuración 3', 3, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO setting (name, description, device_id, creation_date, edition_date) VALUES ('Configuración 4', 'Descripción de Configuración 4', 4, '2023-10-11 00:00:00', '2023-10-12 00:00:00');
INSERT INTO setting (name, description, device_id, creation_date, edition_date) VALUES ('Configuración 5', 'Descripción de Configuración 5', 5, '2023-10-11 00:00:00', '2023-10-12 00:00:00');

/* Actuaciones */
INSERT INTO performance (description, device_id, date) VALUES ('Actuación 1', 1, '2023-10-11 00:00:00');
INSERT INTO performance (description, device_id, date) VALUES ('Actuación 2', 2, '2023-10-11 00:00:00');
INSERT INTO performance (description, device_id, date) VALUES ('Actuación 3', 3, '2023-10-11 00:00:00');
INSERT INTO performance (description, device_id, date) VALUES ('Actuación 4', 4, '2023-10-11 00:00:00');
INSERT INTO performance (description, device_id, date) VALUES ('Actuación 5', 5, '2023-10-11 00:00:00');

/*Usuarios*/
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('user 1', 'Apellido 1', 'DNI1', 111111111, 1, '1','user1@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('user 2', 'Apellido 2', 'DNI2', 222222222, 2, '2','user2@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('user 3', 'Apellido 3', 'DNI3', 333333333, 3, '3','user3@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('user 4', 'Apellido 4', 'DNI4', 444444444, 4, '2','user4@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('user 5', 'Apellido 5', 'DNI5', 555555555, 5, '3','user5@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('user 5', 'Apellido 5', 'DNI6', 555555555, 5, '1','user6@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('pruebaadmin', 'Apellido 5', 'DNI7', 555555555, 5, '1','pruebaadmin@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('pruebatrabajdor', 'Apellido 5', 'DNI8', 555555555, 5, '2','pruebatrabajador@1.com', '1234');
INSERT INTO user (username, surname, dni, phone, company_id, role, email, password	) VALUES ('pruebacliente', 'Apellido 5', 'DNI9', 555555555, 5, '3','preubacliente@1.com', '1234');


/* User oficinas */
INSERT INTO office_assignment (user_id, office_id) VALUES (1, 1);
INSERT INTO office_assignment (user_id, office_id) VALUES (2, 2);
INSERT INTO office_assignment (user_id, office_id) VALUES (3, 3);
INSERT INTO office_assignment (user_id, office_id) VALUES (4, 4);
INSERT INTO office_assignment (user_id, office_id) VALUES (5, 5);

/* user acuaxiones */
INSERT INTO user_performance (user_id, performance_id) VALUES (1, 1);
INSERT INTO user_performance (user_id, performance_id) VALUES (2, 2);
INSERT INTO user_performance (user_id, performance_id) VALUES (3, 3);
INSERT INTO user_performance (user_id, performance_id) VALUES (4, 4);
INSERT INTO user_performance (user_id, performance_id) VALUES (5, 5);
