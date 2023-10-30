-- MySQL Script generated by MySQL Workbench
-- Fri Oct 27 16:31:32 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema control_inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema control_inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `control_inventario` DEFAULT CHARACTER SET utf8 ;
USE `control_inventario` ;

-- -----------------------------------------------------
-- Table `control_inventario`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`device_name`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`device_name` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_nombre_dispositivo_y_periferico_categorias_idx` (`category_id` ASC),
  CONSTRAINT `fk_nombre_dispositivo_y_periferico_categorias`
    FOREIGN KEY (`category_id`)
    REFERENCES `control_inventario`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`company` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `cif` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `correo_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cif_UNIQUE` (`cif` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `internal_code` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `cif` VARCHAR(9) NOT NULL,
  `company_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_empresa_cuenta1_idx` (`company_id` ASC),
  UNIQUE INDEX `cif_UNIQUE` (`cif` ASC),
  CONSTRAINT `fk_empresa_cuenta1`
    FOREIGN KEY (`company_id`)
    REFERENCES `control_inventario`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`office`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`office` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `address` VARCHAR(250) NOT NULL,
  `postal_code` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(9) NOT NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_oficina_empresa1_idx` (`customer_id` ASC),
  CONSTRAINT `fk_oficina_empresa1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `control_inventario`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`device`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`device` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `parent_device` INT NULL,
  `description` VARCHAR(250) NULL,
  `device_name_id` INT NOT NULL,
  `office_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dispositivo_nombre_dispositivo_y_periferico1_idx` (`device_name_id` ASC),
  INDEX `fk_dispositivo_oficina1_idx` (`office_id` ASC),
  CONSTRAINT `fk_dispositivo_nombre_dispositivo_y_periferico1`
    FOREIGN KEY (`device_name_id`)
    REFERENCES `control_inventario`.`device_name` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dispositivo_oficina1`
    FOREIGN KEY (`office_id`)
    REFERENCES `control_inventario`.`office` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`attribute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`attribute` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Atributo_categorias1_idx` (`category_id` ASC),
  CONSTRAINT `fk_Atributo_categorias1`
    FOREIGN KEY (`category_id`)
    REFERENCES `control_inventario`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`setting`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`setting` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` LONGBLOB NOT NULL,
  `device_id` INT NOT NULL,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_configuracion_dispositivo1_idx` (`device_id` ASC),
  CONSTRAINT `fk_configuracion_dispositivo1`
    FOREIGN KEY (`device_id`)
    REFERENCES `control_inventario`.`device` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`performance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`performance` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` LONGBLOB NOT NULL,
  `device_id` INT NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_configuracion_dispositivo1_idx` (`device_id` ASC),
  CONSTRAINT `fk_configuracion_dispositivo10`
    FOREIGN KEY (`device_id`)
    REFERENCES `control_inventario`.`device` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  `dni` VARCHAR(9) NULL,
  `phone` INT(9) NOT NULL,
  `company_id` INT NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `authKey` VARCHAR(250) NULL,
  `accessToken` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_cuenta1_idx` (`company_id` ASC),
  UNIQUE INDEX `dni_UNIQUE` (`dni` ASC),
  CONSTRAINT `fk_usuario_cuenta1`
    FOREIGN KEY (`company_id`)
    REFERENCES `control_inventario`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`device_attribute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`device_attribute` (
  `attribute_id` INT NOT NULL,
  `device_id` INT NOT NULL,
  `description` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`attribute_id`, `device_id`),
  INDEX `fk_atributo_has_dispositivo_dispositivo1_idx` (`device_id` ASC),
  INDEX `fk_atributo_has_dispositivo_atributo1_idx` (`attribute_id` ASC),
  CONSTRAINT `fk_atributo_has_dispositivo_atributo1`
    FOREIGN KEY (`attribute_id`)
    REFERENCES `control_inventario`.`attribute` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atributo_has_dispositivo_dispositivo1`
    FOREIGN KEY (`device_id`)
    REFERENCES `control_inventario`.`device` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`office_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`office_assignment` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `office_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `office_id`),
  INDEX `fk_usuario_has_empresa_usuario1_idx` (`user_id` ASC),
  INDEX `fk_asignacion_oficina_oficina1_idx` (`office_id` ASC),
  CONSTRAINT `fk_usuario_has_empresa_usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `control_inventario`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_oficina_oficina1`
    FOREIGN KEY (`office_id`)
    REFERENCES `control_inventario`.`office` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_inventario`.`user_performance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_inventario`.`user_performance` (
  `user_id` INT NOT NULL,
  `performance_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `performance_id`),
  INDEX `fk_usuario_has_actuaciones_actuaciones1_idx` (`performance_id` ASC),
  INDEX `fk_usuario_has_actuaciones_usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_usuario_has_actuaciones_usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `control_inventario`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_actuaciones_actuaciones1`
    FOREIGN KEY (`performance_id`)
    REFERENCES `control_inventario`.`performance` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
