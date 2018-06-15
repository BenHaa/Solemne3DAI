/*
SQLyog - Free MySQL GUI v5.11
Host - 5.6.17 : Database - bd
*********************************************************************
Server version : 5.6.17
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `bd`;

USE `bd`;

/*Data for the table `comuna` */

insert into `comuna` (`id_comuna`,`descripcion`) values (1,'Santiago'),(2,'Cerrillos'),(3,'Cerro Navia'),(4,'Conchalí'),(5,'El Bosque'),(6,'Huechuraba'),(7,'Independencia'),(8,'La Cisterna'),(9,'La Florida'),(10,'La Granja'),(11,'La Pintana'),(12,'La Reina'),(13,'Las Condes'),(14,'Lo Barnechea'),(15,'Lo Espejo'),(16,'Lo Prado'),(17,'Macul'),(18,'Maipú'),(19,'Ñuñoa'),(20,'Pedro Aguirre Cerda'),(21,'Peñalolén'),(22,'Providencia'),(23,'Pudahuel'),(24,'Quilicura'),(25,'Quinta Normal'),(26,'Recoleta'),(27,'Renca'),(28,'San Joaquín'),(29,'San Miguel'),(30,'San Ramón'),(31,'Vitacura'),(32,'Puente Alto'),(33,'Pirque'),(34,'San José de Maipo'),(35,'Colina'),(36,'Lampa'),(37,'Tiltil'),(38,'San Bernardo'),(39,'Buin'),(40,'Calera de Tango'),(41,'Paine'),(42,'Melipilla'),(43,'Alhué'),(44,'Curacaví'),(45,'María Pinto'),(46,'San Pedro'),(47,'Talagante'),(48,'El Monte'),(49,'Isla de Maipo'),(50,'Padre Hurtado'),(51,'Peñaflor');

/*Data for the table `estado_civil` */

insert into `estado_civil` (`id_est_civil`,`descripcion`) values (0,'SOLTERO'),(1,'CASADO'),(2,'VIUDO'),(3,'DIVORCIADO');

/*Data for the table `estado_solicitud` */

insert into `estado_solicitud` (`id_estado`,`descripcion`) values (1,'ACEPTADO'),(2,'PENDIENTE'),(3,'RECHAZADO');

/*Data for the table `nivel_educacion` */

insert into `nivel_educacion` (`id_educacion`,`descripcion`) values (1,'Profesional'),(2,'Técnico'),(3,'Media'),(4,'Básica'),(5,'No Posee');

/*Data for the table `perfil_usuario` */

insert into `perfil_usuario` (`id_perfil`,`descripcion`) values (1,'Postulante'),(2,'Ejecutivo');

/*Data for the table `persona` */

insert into `persona` (`rut`,`nombre`,`ap_paterno`,`ap_materno`,`sexo`,`fecha_nac`) values ('19.360.198-7','juan','lopez','garrido',3,'1990-01-01');

/*Data for the table `postulacion` */

/*Data for the table `postulante` */

/*Data for the table `sexo` */

insert into `sexo` (`id_sexo`,`descripcion`) values (1,'FEMENINO'),(2,'MASCULINO'),(3,'NO INDICA');

/*Data for the table `tipo_renta` */

insert into `tipo_renta` (`id_renta`,`descripcion`) values (1,'Fija'),(2,'Variable'),(3,'Boleta de Honorarios');

/*Data for the table `usuario` */

insert into `usuario` (`rut_persona`,`password`,`id_perfil`,`id_usuario`) values ('19.360.198-7','hola',1,1);
