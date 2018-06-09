/*
SQLyog - Free MySQL GUI v5.11
Host - 5.5.24-log : Database - bd
*********************************************************************
Server version : 5.5.24-log
*/


SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `bd`;

USE `bd`;

/*Table structure for table `sexo` */

DROP TABLE IF EXISTS `sexo`;

CREATE TABLE `sexo` (
  `id_sexo` int(5) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sexo` */

insert into `sexo` (`id_sexo`,`descripcion`) values (1,'FEMENINO');
insert into `sexo` (`id_sexo`,`descripcion`) values (2,'MASCULINO');
insert into `sexo` (`id_sexo`,`descripcion`) values (3,'NO INDICA');

/*Table structure for table `tipo_renta` */

DROP TABLE IF EXISTS `tipo_renta`;

CREATE TABLE `tipo_renta` (
  `id_renta` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_renta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tipo_renta` */

insert into `tipo_renta` (`id_renta`,`descripcion`) values (1,'Fija');
insert into `tipo_renta` (`id_renta`,`descripcion`) values (2,'Variable');
insert into `tipo_renta` (`id_renta`,`descripcion`) values (3,'Boleta de Honorarios');

/*Table structure for table `usuario` */

/*Table structure for table `comuna` */

DROP TABLE IF EXISTS `comuna`;

CREATE TABLE `comuna` (
  `id_comuna` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_comuna`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `comuna` */

insert into `comuna` (`id_comuna`,`descripcion`) values (1,'Santiago');
insert into `comuna` (`id_comuna`,`descripcion`) values (2,'Cerrillos');
insert into `comuna` (`id_comuna`,`descripcion`) values (3,'Cerro Navia');
insert into `comuna` (`id_comuna`,`descripcion`) values (4,'Conchalí');
insert into `comuna` (`id_comuna`,`descripcion`) values (5,'El Bosque');
insert into `comuna` (`id_comuna`,`descripcion`) values (6,'Huechuraba');
insert into `comuna` (`id_comuna`,`descripcion`) values (7,'Independencia');
insert into `comuna` (`id_comuna`,`descripcion`) values (8,'La Cisterna');
insert into `comuna` (`id_comuna`,`descripcion`) values (9,'La Florida');
insert into `comuna` (`id_comuna`,`descripcion`) values (10,'La Granja');
insert into `comuna` (`id_comuna`,`descripcion`) values (11,'La Pintana');
insert into `comuna` (`id_comuna`,`descripcion`) values (12,'La Reina');
insert into `comuna` (`id_comuna`,`descripcion`) values (13,'Las Condes');
insert into `comuna` (`id_comuna`,`descripcion`) values (14,'Lo Barnechea');
insert into `comuna` (`id_comuna`,`descripcion`) values (15,'Lo Espejo');
insert into `comuna` (`id_comuna`,`descripcion`) values (16,'Lo Prado');
insert into `comuna` (`id_comuna`,`descripcion`) values (17,'Macul');
insert into `comuna` (`id_comuna`,`descripcion`) values (18,'Maipú');
insert into `comuna` (`id_comuna`,`descripcion`) values (19,'Maipú');
insert into `comuna` (`id_comuna`,`descripcion`) values (20,'Ñuñoa');
insert into `comuna` (`id_comuna`,`descripcion`) values (21,'Pedro Aguirre Cerda');
insert into `comuna` (`id_comuna`,`descripcion`) values (22,'Peñalolén');
insert into `comuna` (`id_comuna`,`descripcion`) values (23,'Providencia');
insert into `comuna` (`id_comuna`,`descripcion`) values (24,'Pudahuel');
insert into `comuna` (`id_comuna`,`descripcion`) values (25,'Quilicura');
insert into `comuna` (`id_comuna`,`descripcion`) values (26,'Quinta Normal');
insert into `comuna` (`id_comuna`,`descripcion`) values (27,'Recoleta');
insert into `comuna` (`id_comuna`,`descripcion`) values (28,'Renca');
insert into `comuna` (`id_comuna`,`descripcion`) values (29,'San Joaquín');
insert into `comuna` (`id_comuna`,`descripcion`) values (30,'San Miguel');
insert into `comuna` (`id_comuna`,`descripcion`) values (31,'San Ramón');
insert into `comuna` (`id_comuna`,`descripcion`) values (32,'Vitacura');
insert into `comuna` (`id_comuna`,`descripcion`) values (33,'Puente Alto');
insert into `comuna` (`id_comuna`,`descripcion`) values (34,'Pirque');
insert into `comuna` (`id_comuna`,`descripcion`) values (35,'San José de Maipo');
insert into `comuna` (`id_comuna`,`descripcion`) values (36,'Colina');
insert into `comuna` (`id_comuna`,`descripcion`) values (37,'Lampa');
insert into `comuna` (`id_comuna`,`descripcion`) values (38,'Tiltil');
insert into `comuna` (`id_comuna`,`descripcion`) values (39,'San Bernardo');
insert into `comuna` (`id_comuna`,`descripcion`) values (40,'Buin');
insert into `comuna` (`id_comuna`,`descripcion`) values (41,'Calera de Tango');
insert into `comuna` (`id_comuna`,`descripcion`) values (42,'Paine');
insert into `comuna` (`id_comuna`,`descripcion`) values (43,'Melipilla');
insert into `comuna` (`id_comuna`,`descripcion`) values (44,'Alhué');
insert into `comuna` (`id_comuna`,`descripcion`) values (45,'Curacaví');
insert into `comuna` (`id_comuna`,`descripcion`) values (46,'María Pinto');
insert into `comuna` (`id_comuna`,`descripcion`) values (47,'San Pedro');
insert into `comuna` (`id_comuna`,`descripcion`) values (48,'Talagante');
insert into `comuna` (`id_comuna`,`descripcion`) values (49,'El Monte');
insert into `comuna` (`id_comuna`,`descripcion`) values (50,'Isla de Maipo');
insert into `comuna` (`id_comuna`,`descripcion`) values (51,'Padre Hurtado');
insert into `comuna` (`id_comuna`,`descripcion`) values (52,'Peñaflor');

/*Table structure for table `estado_civil` */

DROP TABLE IF EXISTS `estado_civil`;

CREATE TABLE `estado_civil` (
  `id_est_civil` int(5) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_est_civil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estado_civil` */

insert into `estado_civil` (`id_est_civil`,`descripcion`) values (0,'SOLTERO');
insert into `estado_civil` (`id_est_civil`,`descripcion`) values (1,'CASADO');
insert into `estado_civil` (`id_est_civil`,`descripcion`) values (2,'VIUDO');
insert into `estado_civil` (`id_est_civil`,`descripcion`) values (3,'DIVORCIADO');

/*Table structure for table `estado_solicitud` */

DROP TABLE IF EXISTS `estado_solicitud`;

CREATE TABLE `estado_solicitud` (
  `id_estado` int(5) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estado_solicitud` */

insert into `estado_solicitud` (`id_estado`,`descripcion`) values (1,'ACEPTADO');
insert into `estado_solicitud` (`id_estado`,`descripcion`) values (2,'PENDIENTE');
insert into `estado_solicitud` (`id_estado`,`descripcion`) values (3,'RECHAZADO');

/*Table structure for table `nivel_educacion` */

DROP TABLE IF EXISTS `nivel_educacion`;

CREATE TABLE `nivel_educacion` (
  `id_educacion` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_educacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `nivel_educacion` */

insert into `nivel_educacion` (`id_educacion`,`descripcion`) values (1,'Profesional');
insert into `nivel_educacion` (`id_educacion`,`descripcion`) values (2,'Técnico');
insert into `nivel_educacion` (`id_educacion`,`descripcion`) values (3,'Media');
insert into `nivel_educacion` (`id_educacion`,`descripcion`) values (4,'Básica');
insert into `nivel_educacion` (`id_educacion`,`descripcion`) values (5,'No Posee');

/*Table structure for table `perfil_usuario` */

DROP TABLE IF EXISTS `perfil_usuario`;

CREATE TABLE `perfil_usuario` (
  `id_perfil` int(5) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perfil_usuario` */
INSERT INTO PERFIL_USUARIO (id_perfil, descripcion) VALUES(1, 'Postulante');
INSERT INTO PERFIL_USUARIO (id_perfil, descripcion) VALUES(2, 'Ejecutivo');

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `rut` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ap_paterno` varchar(30) NOT NULL,
  `ap_materno` varchar(30) NOT NULL,
  `sexo` int(5) NOT NULL,
  `fecha_nac` date NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `FK_persona` (`sexo`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`id_sexo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `persona` */



/*Table structure for table `postulante` */

DROP TABLE IF EXISTS `postulante`;

CREATE TABLE `postulante` (
  `id_postulante` int(20) NOT NULL,
  `est_civil` int(20) NOT NULL,
  `hijos` int(20) NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `comuna` int(5) NOT NULL,
  `nivel_educacion` int(5) NOT NULL,
  `renta` int(5) NOT NULL,
  `sueldo_liq` int(15) NOT NULL,
  `Emfermedad_cronica` varchar(60) NOT NULL,
  `rut_postulante` varchar(20) NOT NULL,
  PRIMARY KEY (`id_postulante`),
  KEY `FK_persona_est_civ` (`est_civil`),
  KEY `FK_persona_renta` (`renta`),
  KEY `FK_persona_comuna` (`comuna`),
  KEY `FK_persona_nivEducacion` (`nivel_educacion`),
  KEY `FK_postulante` (`rut_postulante`),
  CONSTRAINT `postulante_ibfk_5` FOREIGN KEY (`renta`) REFERENCES `tipo_renta` (`id_renta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `postulante_ibfk_1` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id_comuna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `postulante_ibfk_2` FOREIGN KEY (`est_civil`) REFERENCES `estado_civil` (`id_est_civil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `postulante_ibfk_3` FOREIGN KEY (`nivel_educacion`) REFERENCES `nivel_educacion` (`id_educacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `postulante_ibfk_4` FOREIGN KEY (`rut_postulante`) REFERENCES `persona` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `postulante` */

/*Table structure for table `postulacion` */

DROP TABLE IF EXISTS `postulacion`;

CREATE TABLE `postulacion` (
  `id_solicitud` int(5) NOT NULL,
  `id_postulante` int(20) NOT NULL,
  `estado_solicitud` int(5) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `FK_solicitud` (`id_postulante`),
  KEY `FK_solicitud_idEstado` (`estado_solicitud`),
  CONSTRAINT `postulacion_ibfk_2` FOREIGN KEY (`estado_solicitud`) REFERENCES `estado_solicitud` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `postulacion_ibfk_1` FOREIGN KEY (`id_postulante`) REFERENCES `postulante` (`id_postulante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `postulacion` */



DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `rut_persona` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_perfil` int(5) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_usuario` (`id_perfil`),
  KEY `FK_usuario_rut` (`rut_persona`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`rut_persona`) REFERENCES `persona` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil_usuario` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */
