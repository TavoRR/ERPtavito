/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 10.1.26-MariaDB : Database - pinkboutique
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pinkboutique` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `pinkboutique`;

/*Table structure for table `cart_items` */

DROP TABLE IF EXISTS `cart_items`;

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `cart_items` */

/*Table structure for table `envios` */

DROP TABLE IF EXISTS `envios`;

CREATE TABLE `envios` (
  `idEnvios` int(11) NOT NULL AUTO_INCREMENT,
  `ProveedorCorreos` varchar(45) DEFAULT NULL,
  `Cliente` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idEnvios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `envios` */

/*Table structure for table `envios_has_productos` */

DROP TABLE IF EXISTS `envios_has_productos`;

CREATE TABLE `envios_has_productos` (
  `Envios_idEnvios` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `Envios_idEnvios1` int(11) NOT NULL,
  PRIMARY KEY (`Envios_idEnvios`,`Productos_idProductos`),
  KEY `fk_Envios_has_Productos_Productos1_idx` (`Productos_idProductos`),
  KEY `fk_Envios_has_Productos_Envios1_idx` (`Envios_idEnvios`),
  KEY `fk_Envios_has_Productos_Envios2_idx` (`Envios_idEnvios1`),
  CONSTRAINT `fk_Envios_has_Productos_Envios1` FOREIGN KEY (`Envios_idEnvios`) REFERENCES `envios` (`idEnvios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Envios_has_Productos_Envios2` FOREIGN KEY (`Envios_idEnvios1`) REFERENCES `envios` (`idEnvios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Envios_has_Productos_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `envios_has_productos` */

/*Table structure for table `envios_has_productos1` */

DROP TABLE IF EXISTS `envios_has_productos1`;

CREATE TABLE `envios_has_productos1` (
  `Envios_idEnvios` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  PRIMARY KEY (`Envios_idEnvios`,`Productos_idProductos`),
  KEY `fk_Envios_has_Productos1_Productos1_idx` (`Productos_idProductos`),
  KEY `fk_Envios_has_Productos1_Envios1_idx` (`Envios_idEnvios`),
  CONSTRAINT `fk_Envios_has_Productos1_Envios1` FOREIGN KEY (`Envios_idEnvios`) REFERENCES `envios` (`idEnvios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Envios_has_Productos1_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `envios_has_productos1` */

/*Table structure for table `inventario` */

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL AUTO_INCREMENT,
  `Movimiento` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  PRIMARY KEY (`idInventario`),
  KEY `fk_Inventario_Productos_idx` (`Productos_idProductos`),
  CONSTRAINT `fk_Inventario_Productos` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inventario` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProductos`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `productos` */

insert  into `productos`(`idProductos`,`Nombre`,`Tipo`,`Precio`,`Cantidad`,`Marca`,`Descripcion`) values 
(28,'no se que es','3',0,123,'asd','asd'),
(29,'producto','2',34534500,43,'drter','dfgdf'),
(30,'asdfasf','2',34534500,43,'drter','dfgdf'),
(31,'dfg','1',432,34,'dfg','dfg'),
(32,'dfg','1',432,34,'dfg','dfg'),
(33,'dfg','1',432,34,'dfg','dfg'),
(34,'dfg','1',432,34,'dfg','dfg'),
(35,'qqqq','1',12,12,'qq','qqq'),
(36,'sdf','3',345,345,'345','354'),
(37,'','',0,0,'',''),
(38,'','',0,0,'',''),
(39,'','',0,0,'','');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `Nombre_UNIQUE` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idUsuarios`,`Nombre`,`Tipo`,`Password`) values 
(7,'daniel','1','daniel'),
(8,'dfgdfg','2','dfg');

/*Table structure for table `venta` */

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `Monto` double DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Vendedor` varchar(45) DEFAULT NULL,
  `producto` text,
  PRIMARY KEY (`idVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `venta` */

insert  into `venta`(`idVenta`,`Monto`,`Fecha`,`Vendedor`,`producto`) values 
(8,132,'2018-08-10','daniel',NULL),
(9,534,'0000-00-00','daniel',NULL),
(10,0,'2018-08-16','daniel','no se que es'),
(11,345,'2018-08-10','daniel','qqqq'),
(12,234,'0000-00-00','daniel','producto'),
(13,234,'2018-08-29','daniel','no se que es');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
