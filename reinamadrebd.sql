/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.4.19-MariaDB : Database - reinamadre
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reinamadre` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `reinamadre`;

/*Table structure for table `departamentos` */

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `departamentos` (
  `id_depa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_depa` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_At` datetime DEFAULT NULL,
  PRIMARY KEY (`id_depa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `departamentos` */

insert  into `departamentos`(`id_depa`,`nombre_depa`,`created_at`,`deleted_At`) values (1,'Desarrollo','2021-08-21 00:18:43',NULL),(2,'Salud','2021-08-21 00:18:43',NULL),(3,'Soporte Técnico','2021-08-21 00:18:44',NULL),(4,'Ventas','2021-08-21 00:18:46',NULL);

/*Table structure for table `det_empleado_empresa` */

DROP TABLE IF EXISTS `det_empleado_empresa`;

CREATE TABLE `det_empleado_empresa` (
  `id_det_em` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_depa` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_em`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_depa` (`id_depa`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `det_empleado_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`),
  CONSTRAINT `det_empleado_empresa_ibfk_2` FOREIGN KEY (`id_depa`) REFERENCES `departamentos` (`id_depa`),
  CONSTRAINT `det_empleado_empresa_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `det_empleado_empresa` */

insert  into `det_empleado_empresa`(`id_det_em`,`id_empresa`,`id_depa`,`id_empleado`) values (1,3,1,12),(2,2,1,13);

/*Table structure for table `det_empleado_grupo` */

DROP TABLE IF EXISTS `det_empleado_grupo`;

CREATE TABLE `det_empleado_grupo` (
  `id_det_eg` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_eg`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `det_empleado_grupo_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`),
  CONSTRAINT `det_empleado_grupo_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `det_empleado_grupo` */

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `apat_empleado` varchar(100) DEFAULT NULL,
  `amat_empleado` varchar(100) DEFAULT NULL,
  `nombre_empleado` varchar(100) DEFAULT NULL,
  `nacimiento_empleado` date DEFAULT NULL,
  `email_empleado` varchar(100) DEFAULT NULL,
  `genero_empleado` char(1) DEFAULT NULL,
  `tel_empleado` varchar(15) DEFAULT NULL,
  `cel_empleado` varchar(15) DEFAULT NULL,
  `ingreso` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_At` datetime DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `empleados` */

insert  into `empleados`(`id_empleado`,`apat_empleado`,`amat_empleado`,`nombre_empleado`,`nacimiento_empleado`,`email_empleado`,`genero_empleado`,`tel_empleado`,`cel_empleado`,`ingreso`,`created_at`,`deleted_At`) values (12,'Dina','Maravell','Hanks','2021-08-21','auditor@arguil3a.testing','f','77777','55555','2021-08-21','0000-00-00 00:00:00',NULL),(13,'Javier','Santillana','Bastida','2021-08-18','auditor@arguil3a.testing','m','257-9461','(755) 568-4560','2021-08-18','0000-00-00 00:00:00',NULL);

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `alias_empresa` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_At` datetime DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `empresas` */

insert  into `empresas`(`id_empresa`,`nombre_empresa`,`alias_empresa`,`created_at`,`deleted_At`) values (1,'Empresa A','EMA','2021-08-21 00:16:07',NULL),(2,'Empresa B','EMB','2021-08-21 00:16:35',NULL),(3,'Empresa C','EMC','2021-08-21 00:16:38',NULL);

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `grupos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) DEFAULT NULL,
  `nickname` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passwd` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_user`,`nivel`,`nickname`,`email`,`passwd`,`created_at`,`deleted_at`) values (1,1,'Super Usuario','email@reina.test','$2y$10$vyJG/UBOiScPwc5iOQRWcuWpWDdxEhu18cP6z9ffl3ZYZqECBlxTm','2021-08-20 23:09:51',NULL),(5,2,'reinamadre','email2@reina.test','$2y$10$.1llFFr2uSh/LkN/kd9xJ.MOcNfnS6Mki8exKA4qmuP6.gfNvTHSW','2021-08-21 12:22:47',NULL);

/*Table structure for table `empleados_view` */

DROP TABLE IF EXISTS `empleados_view`;

/*!50001 DROP VIEW IF EXISTS `empleados_view` */;
/*!50001 DROP TABLE IF EXISTS `empleados_view` */;

/*!50001 CREATE TABLE  `empleados_view`(
 `id_det_em` int(11) ,
 `id_empresa` int(11) ,
 `nombre_empresa` varchar(255) ,
 `id_depa` int(11) ,
 `nombre_depa` varchar(255) ,
 `id_empleado` int(11) ,
 `empleado` varchar(302) ,
 `apat_empleado` varchar(100) ,
 `amat_empleado` varchar(100) ,
 `nombre_empleado` varchar(100) ,
 `nacimiento_empleado` date ,
 `email_empleado` varchar(100) ,
 `genero_empleado` char(1) ,
 `tel_empleado` varchar(15) ,
 `cel_empleado` varchar(15) ,
 `ingreso` date ,
 `created_at` datetime ,
 `deleted_At` datetime 
)*/;

/*View structure for view empleados_view */

/*!50001 DROP TABLE IF EXISTS `empleados_view` */;
/*!50001 DROP VIEW IF EXISTS `empleados_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empleados_view` AS (select `det`.`id_det_em` AS `id_det_em`,`brand`.`id_empresa` AS `id_empresa`,`brand`.`nombre_empresa` AS `nombre_empresa`,`depa`.`id_depa` AS `id_depa`,`depa`.`nombre_depa` AS `nombre_depa`,`emp`.`id_empleado` AS `id_empleado`,concat(`emp`.`apat_empleado`,' ',`emp`.`amat_empleado`,' ',`emp`.`nombre_empleado`) AS `empleado`,`emp`.`apat_empleado` AS `apat_empleado`,`emp`.`amat_empleado` AS `amat_empleado`,`emp`.`nombre_empleado` AS `nombre_empleado`,`emp`.`nacimiento_empleado` AS `nacimiento_empleado`,`emp`.`email_empleado` AS `email_empleado`,`emp`.`genero_empleado` AS `genero_empleado`,`emp`.`tel_empleado` AS `tel_empleado`,`emp`.`cel_empleado` AS `cel_empleado`,`emp`.`ingreso` AS `ingreso`,`emp`.`created_at` AS `created_at`,`emp`.`deleted_At` AS `deleted_At` from (((`det_empleado_empresa` `det` join `empleados` `emp` on(`emp`.`id_empleado` = `det`.`id_empleado`)) join `empresas` `brand` on(`brand`.`id_empresa` = `det`.`id_empresa`)) join `departamentos` `depa` on(`depa`.`id_depa` = `det`.`id_depa`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
