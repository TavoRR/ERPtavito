-- MySQL Script generated by MySQL Workbench
-- Fri Aug 17 14:50:42 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema pinkboutique
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pinkboutique
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pinkboutique` DEFAULT CHARACTER SET utf8 ;
USE `pinkboutique` ;

-- -----------------------------------------------------
-- Table `pinkboutique`.`cart_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`cart_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_id` INT(11) NOT NULL,
  `quantity` DOUBLE NOT NULL,
  `user_id` INT(11) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`envios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`envios` (
  `idEnvios` INT(11) NOT NULL AUTO_INCREMENT,
  `ProveedorCorreos` VARCHAR(45) NULL DEFAULT NULL,
  `Cliente` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`idEnvios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`productos` (
  `idProductos` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Tipo` VARCHAR(45) NULL DEFAULT NULL,
  `Precio` FLOAT NULL DEFAULT NULL,
  `Cantidad` INT(11) NULL DEFAULT NULL,
  `Marca` VARCHAR(45) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idProductos`))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`envios_has_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`envios_has_productos` (
  `Envios_idEnvios` INT(11) NOT NULL,
  `Productos_idProductos` INT(11) NOT NULL,
  `Envios_idEnvios1` INT(11) NOT NULL,
  PRIMARY KEY (`Envios_idEnvios`, `Productos_idProductos`),
  INDEX `fk_Envios_has_Productos_Productos1_idx` (`Productos_idProductos` ASC),
  INDEX `fk_Envios_has_Productos_Envios1_idx` (`Envios_idEnvios` ASC),
  INDEX `fk_Envios_has_Productos_Envios2_idx` (`Envios_idEnvios1` ASC),
  CONSTRAINT `fk_Envios_has_Productos_Envios1`
    FOREIGN KEY (`Envios_idEnvios`)
    REFERENCES `pinkboutique`.`envios` (`idEnvios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Envios_has_Productos_Envios2`
    FOREIGN KEY (`Envios_idEnvios1`)
    REFERENCES `pinkboutique`.`envios` (`idEnvios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Envios_has_Productos_Productos1`
    FOREIGN KEY (`Productos_idProductos`)
    REFERENCES `pinkboutique`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`envios_has_productos1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`envios_has_productos1` (
  `Envios_idEnvios` INT(11) NOT NULL,
  `Productos_idProductos` INT(11) NOT NULL,
  PRIMARY KEY (`Envios_idEnvios`, `Productos_idProductos`),
  INDEX `fk_Envios_has_Productos1_Productos1_idx` (`Productos_idProductos` ASC),
  INDEX `fk_Envios_has_Productos1_Envios1_idx` (`Envios_idEnvios` ASC),
  CONSTRAINT `fk_Envios_has_Productos1_Envios1`
    FOREIGN KEY (`Envios_idEnvios`)
    REFERENCES `pinkboutique`.`envios` (`idEnvios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Envios_has_Productos1_Productos1`
    FOREIGN KEY (`Productos_idProductos`)
    REFERENCES `pinkboutique`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`inventario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`inventario` (
  `idInventario` INT(11) NOT NULL AUTO_INCREMENT,
  `Movimiento` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `Fecha` DATE NULL DEFAULT NULL,
  `Productos_idProductos` INT(11) NOT NULL,
  PRIMARY KEY (`idInventario`),
  INDEX `fk_Inventario_Productos_idx` (`Productos_idProductos` ASC),
  CONSTRAINT `fk_Inventario_Productos`
    FOREIGN KEY (`Productos_idProductos`)
    REFERENCES `pinkboutique`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`venta` (
  `idVenta` INT(11) NOT NULL AUTO_INCREMENT,
  `Monto` DOUBLE NULL DEFAULT NULL,
  `Fecha` DATE NULL DEFAULT NULL,
  `Vendedor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idVenta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pinkboutique`.`venta_has_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pinkboutique`.`venta_has_productos` (
  `Venta_idVenta` INT(11) NOT NULL,
  `Productos_idProductos` INT(11) NOT NULL,
  PRIMARY KEY (`Venta_idVenta`, `Productos_idProductos`),
  INDEX `fk_Venta_has_Productos_Productos1_idx` (`Productos_idProductos` ASC),
  INDEX `fk_Venta_has_Productos_Venta1_idx` (`Venta_idVenta` ASC),
  CONSTRAINT `fk_Venta_has_Productos_Productos1`
    FOREIGN KEY (`Productos_idProductos`)
    REFERENCES `pinkboutique`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_has_Productos_Venta1`
    FOREIGN KEY (`Venta_idVenta`)
    REFERENCES `pinkboutique`.`venta` (`idVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
