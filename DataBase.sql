CREATE DATABASE  IF NOT EXISTS `proyectogrupo1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `proyectogrupo1`;
-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyectogrupo1
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `registrarpuente`
--

DROP TABLE IF EXISTS `registrarpuente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrarpuente` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero_ruta` int(11) NOT NULL,
  `clasificacion_ruta` enum('nacional primaria','nacional secundaria','nacional terciaria','cantonal','otra') NOT NULL,
  `provincia` enum('San José','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limón') NOT NULL,
  `canton` varchar(100) NOT NULL,
  `coordenadas` decimal(9,6) NOT NULL,
  `tipo_estructura` enum('vigas','cercha','arco','marco rígido','colgante','atirantado','modular provisional','otra') NOT NULL,
  `material_principal` enum('concreto reforzado','concreto preesforzado','acero','madera','mampostería','mixto') NOT NULL,
  `longitud_total` decimal(10,2) NOT NULL,
  `numero_tramos` int(11) NOT NULL,
  `numero_superestructuras` int(11) NOT NULL,
  `fecha_construccion` date NOT NULL,
  `importancia` enum('puente crítico','puente esencial','puente convencional','otro puente') NOT NULL,
  `servicios_publicos` set('agua potable','alcantarillado','electricidad','telecomunicaciones','tubería de combustible','otros','ninguno') NOT NULL,
  `restriccion_peso` decimal(5,1) DEFAULT NULL,
  `restriccion_altura` decimal(5,2) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrarpuente`
--

LOCK TABLES `registrarpuente` WRITE;
/*!40000 ALTER TABLE `registrarpuente` DISABLE KEYS */;
INSERT INTO `registrarpuente` VALUES ('SB-001','Puente sobre río Cedro',1,'nacional primaria','San José','Pérez Zeledón',9.365420,'vigas','concreto preesforzado',92.50,3,2,'1994-04-15','otro puente','electricidad,telecomunicaciones',10.5,5.20,NULL),('SB-002','Puente sobre río Diamante',2,'nacional primaria','Cartago','El Guarco',9.788310,'marco rígido','concreto reforzado',68.40,2,2,'2002-08-21','puente convencional','agua potable,electricidad',9.8,4.90,NULL),('SB-003','Puente sobre río Esmeralda',27,'nacional primaria','San José','Escazú',9.934120,'vigas','concreto preesforzado',105.75,4,3,'1998-11-10','puente crítico','agua potable,electricidad,telecomunicaciones',14.2,5.50,NULL),('SB-004','Puente sobre río Fortuna',32,'nacional primaria','Limón','Limón',9.991840,'cercha','acero',130.60,4,2,'1989-02-18','puente esencial','electricidad,telecomunicaciones',11.7,5.10,NULL),('SB-005','Puente sobre quebrada Granada',118,'nacional secundaria','Alajuela','Grecia',10.072350,'vigas','concreto reforzado',45.80,2,2,'2008-06-12','puente esencial','agua potable',9.4,4.60,NULL),('SB-006','Puente sobre río Horizonte',4,'nacional primaria','Heredia','Sarapiquí',10.412680,'arco','concreto reforzado',88.90,3,2,'1996-09-27','puente crítico','electricidad,telecomunicaciones',10.8,5.00,NULL),('SB-007','Puente sobre quebrada Ilusión',804,'cantonal','Guanacaste','Santa Cruz',10.267540,'modular provisional','acero',29.70,1,1,'2017-03-05','otro puente','ninguno',4.8,3.80,NULL),('SB-008','Puente sobre río Jacaranda',141,'nacional secundaria','Alajuela','San Carlos',10.355740,'vigas','concreto preesforzado',76.30,3,2,'2011-12-14','puente esencial','agua potable,electricidad',9.9,4.70,NULL),('SB-009','Puente sobre río Kandela',21,'nacional primaria','Puntarenas','Esparza',9.998630,'colgante','acero',112.40,3,2,'2005-01-29','puente crítico','electricidad,telecomunicaciones',10.6,5.30,NULL),('SB-010','Puente sobre quebrada Luna',301,'cantonal','Cartago','Paraíso',9.838970,'vigas','concreto reforzado',36.20,2,1,'2019-07-16','otro puente','agua potable',5.5,4.10,NULL);
/*!40000 ALTER TABLE `registrarpuente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detalle_inspeccion`
--

DROP TABLE IF EXISTS `tb_detalle_inspeccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_detalle_inspeccion` (
  `ConsecutivoDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `ConsecutivoInspeccion` int(11) NOT NULL,
  `ConsecutivoElemento` int(11) NOT NULL,
  `EsAplicable` bit(1) NOT NULL DEFAULT b'1',
  `Calificacion` tinyint(4) DEFAULT NULL,
  `Observacion` text DEFAULT NULL,
  PRIMARY KEY (`ConsecutivoDetalle`),
  UNIQUE KEY `uq_inspeccion_elemento` (`ConsecutivoInspeccion`,`ConsecutivoElemento`),
  KEY `idx_detalle_elemento` (`ConsecutivoElemento`),
  CONSTRAINT `fk_detalle_elemento` FOREIGN KEY (`ConsecutivoElemento`) REFERENCES `tb_elemento` (`ConsecutivoElemento`),
  CONSTRAINT `fk_detalle_inspeccion` FOREIGN KEY (`ConsecutivoInspeccion`) REFERENCES `tb_inspeccion` (`ConsecutivoInspeccion`) ON DELETE CASCADE,
  CONSTRAINT `chk_calificacion` CHECK (`Calificacion` is null or `Calificacion` between 1 and 5)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_inspeccion`
--

LOCK TABLES `tb_detalle_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_detalle_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_detalle_inspeccion` VALUES (1,1,1,_binary '',5,'Daño crítico que requiere atención inmediata.'),(2,2,1,_binary '',4,'Deterioro severo que requiere intervención.'),(3,3,1,_binary '',4,'Deterioro severo que requiere intervención.'),(4,4,1,_binary '',4,'Deterioro severo que requiere intervención.'),(5,5,1,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(6,6,1,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(7,7,1,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(8,8,1,_binary '',2,'Deterioro menor observado.'),(9,9,1,_binary '',2,'Deterioro menor observado.'),(10,10,1,_binary '',2,'Deterioro menor observado.'),(11,1,2,_binary '',5,'Daño crítico que requiere atención inmediata.'),(12,2,2,_binary '',4,'Deterioro severo que requiere intervención.'),(13,3,2,_binary '',4,'Deterioro severo que requiere intervención.'),(14,4,2,_binary '',4,'Deterioro severo que requiere intervención.'),(15,5,2,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(16,6,2,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(17,7,2,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(18,8,2,_binary '',2,'Deterioro menor observado.'),(19,9,2,_binary '',2,'Deterioro menor observado.'),(20,10,2,_binary '',2,'Deterioro menor observado.'),(21,1,3,_binary '',5,'Daño crítico que requiere atención inmediata.'),(22,2,3,_binary '',4,'Deterioro severo que requiere intervención.'),(23,3,3,_binary '',4,'Deterioro severo que requiere intervención.'),(24,4,3,_binary '',4,'Deterioro severo que requiere intervención.'),(25,5,3,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(26,6,3,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(27,7,3,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(28,8,3,_binary '',2,'Deterioro menor observado.'),(29,9,3,_binary '',2,'Deterioro menor observado.'),(30,10,3,_binary '',1,'Elemento en buenas condiciones.'),(31,1,4,_binary '',5,'Daño crítico que requiere atención inmediata.'),(32,2,4,_binary '',4,'Deterioro severo que requiere intervención.'),(33,3,4,_binary '',4,'Deterioro severo que requiere intervención.'),(34,4,4,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(35,5,4,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(36,6,4,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(37,7,4,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(38,8,4,_binary '',2,'Deterioro menor observado.'),(39,9,4,_binary '',2,'Deterioro menor observado.'),(40,10,4,_binary '',1,'Elemento en buenas condiciones.'),(41,1,5,_binary '',5,'Daño crítico que requiere atención inmediata.'),(42,2,5,_binary '',4,'Deterioro severo que requiere intervención.'),(43,3,5,_binary '',4,'Deterioro severo que requiere intervención.'),(44,4,5,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(45,5,5,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(46,6,5,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(47,7,5,_binary '',2,'Deterioro menor observado.'),(48,8,5,_binary '',2,'Deterioro menor observado.'),(49,9,5,_binary '',2,'Deterioro menor observado.'),(50,10,5,_binary '',1,'Elemento en buenas condiciones.'),(51,1,6,_binary '',5,'Daño crítico que requiere atención inmediata.'),(52,2,6,_binary '',4,'Deterioro severo que requiere intervención.'),(53,3,6,_binary '',4,'Deterioro severo que requiere intervención.'),(54,4,6,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(55,5,6,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(56,6,6,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(57,7,6,_binary '',2,'Deterioro menor observado.'),(58,8,6,_binary '',2,'Deterioro menor observado.'),(59,9,6,_binary '',2,'Deterioro menor observado.'),(60,10,6,_binary '',1,'Elemento en buenas condiciones.'),(61,1,7,_binary '',5,'Daño crítico que requiere atención inmediata.'),(62,2,7,_binary '',4,'Deterioro severo que requiere intervención.'),(63,3,7,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(64,4,7,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(65,5,7,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(66,6,7,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(67,7,7,_binary '',2,'Deterioro menor observado.'),(68,8,7,_binary '',2,'Deterioro menor observado.'),(69,9,7,_binary '',1,'Elemento en buenas condiciones.'),(70,10,7,_binary '',1,'Elemento en buenas condiciones.'),(71,1,8,_binary '',5,'Daño crítico que requiere atención inmediata.'),(72,2,8,_binary '',4,'Deterioro severo que requiere intervención.'),(73,3,8,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(74,4,8,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(75,5,8,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(76,6,8,_binary '',2,'Deterioro menor observado.'),(77,7,8,_binary '',2,'Deterioro menor observado.'),(78,8,8,_binary '',2,'Deterioro menor observado.'),(79,9,8,_binary '',1,'Elemento en buenas condiciones.'),(80,10,8,_binary '',1,'Elemento en buenas condiciones.'),(81,1,9,_binary '',4,'Deterioro severo que requiere intervención.'),(82,2,9,_binary '',4,'Deterioro severo que requiere intervención.'),(83,3,9,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(84,4,9,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(85,5,9,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(86,6,9,_binary '',2,'Deterioro menor observado.'),(87,7,9,_binary '',2,'Deterioro menor observado.'),(88,8,9,_binary '',2,'Deterioro menor observado.'),(89,9,9,_binary '',1,'Elemento en buenas condiciones.'),(90,10,9,_binary '',1,'Elemento en buenas condiciones.'),(91,1,10,_binary '',4,'Deterioro severo que requiere intervención.'),(92,2,10,_binary '',4,'Deterioro severo que requiere intervención.'),(93,3,10,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(94,4,10,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(95,5,10,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(96,6,10,_binary '',2,'Deterioro menor observado.'),(97,7,10,_binary '',2,'Deterioro menor observado.'),(98,8,10,_binary '',2,'Deterioro menor observado.'),(99,9,10,_binary '',1,'Elemento en buenas condiciones.'),(100,10,10,_binary '',1,'Elemento en buenas condiciones.'),(101,1,11,_binary '',4,'Deterioro severo que requiere intervención.'),(102,2,11,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(103,3,11,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(104,4,11,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(105,5,11,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(106,6,11,_binary '',2,'Deterioro menor observado.'),(107,7,11,_binary '',2,'Deterioro menor observado.'),(108,8,11,_binary '',2,'Deterioro menor observado.'),(109,9,11,_binary '',1,'Elemento en buenas condiciones.'),(110,10,11,_binary '',1,'Elemento en buenas condiciones.'),(111,1,12,_binary '',4,'Deterioro severo que requiere intervención.'),(112,2,12,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(113,3,12,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(114,4,12,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(115,5,12,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(116,6,12,_binary '',2,'Deterioro menor observado.'),(117,7,12,_binary '',2,'Deterioro menor observado.'),(118,8,12,_binary '',2,'Deterioro menor observado.'),(119,9,12,_binary '',1,'Elemento en buenas condiciones.'),(120,10,12,_binary '',1,'Elemento en buenas condiciones.'),(121,1,13,_binary '',4,'Deterioro severo que requiere intervención.'),(122,2,13,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(123,3,13,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(124,4,13,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(125,5,13,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(126,6,13,_binary '',2,'Deterioro menor observado.'),(127,7,13,_binary '',2,'Deterioro menor observado.'),(128,8,13,_binary '',2,'Deterioro menor observado.'),(129,9,13,_binary '',1,'Elemento en buenas condiciones.'),(130,10,13,_binary '',1,'Elemento en buenas condiciones.'),(131,1,14,_binary '',4,'Deterioro severo que requiere intervención.'),(132,2,14,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(133,3,14,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(134,4,14,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(135,5,14,_binary '',3,'Deterioro moderado que requiere seguimiento.'),(136,6,14,_binary '',2,'Deterioro menor observado.'),(137,7,14,_binary '',2,'Deterioro menor observado.'),(138,8,14,_binary '',2,'Deterioro menor observado.'),(139,9,14,_binary '',1,'Elemento en buenas condiciones.'),(140,10,14,_binary '',1,'Elemento en buenas condiciones.');
/*!40000 ALTER TABLE `tb_detalle_inspeccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_elemento`
--

DROP TABLE IF EXISTS `tb_elemento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_elemento` (
  `ConsecutivoElemento` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(30) NOT NULL,
  `NombreElemento` varchar(120) NOT NULL,
  `Estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ConsecutivoElemento`),
  UNIQUE KEY `uq_elemento_nombre` (`Categoria`,`NombreElemento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_elemento`
--

LOCK TABLES `tb_elemento` WRITE;
/*!40000 ALTER TABLE `tb_elemento` DISABLE KEYS */;
INSERT INTO `tb_elemento` VALUES (1,'Accesorios','Superficie de rodamiento',_binary ''),(2,'Accesorios','Juntas de expansión',_binary ''),(3,'Accesorios','Barandas',_binary ''),(4,'Accesorios','Sistemas de drenaje',_binary ''),(5,'Superestructura','Losa',_binary ''),(6,'Superestructura','Vigas principales',_binary ''),(7,'Superestructura','Vigas secundarias',_binary ''),(8,'Superestructura','Diafragmas',_binary ''),(9,'Superestructura','Apoyos',_binary ''),(10,'Subestructura','Bastiones',_binary ''),(11,'Subestructura','Pilas',_binary ''),(12,'Subestructura','Cimentaciones',_binary ''),(13,'Subestructura','Taludes y protección',_binary ''),(14,'Subestructura','Cauce bajo el puente',_binary '');
/*!40000 ALTER TABLE `tb_elemento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_inspeccion`
--

DROP TABLE IF EXISTS `tb_inspeccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_inspeccion` (
  `ConsecutivoInspeccion` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoPuente` varchar(20) NOT NULL,
  `ConsecutivoInspector` int(11) NOT NULL,
  `FechaInspeccion` date NOT NULL,
  `ObservacionGeneral` text DEFAULT NULL,
  `DanioAcumulado` int(11) NOT NULL DEFAULT 0,
  `CantidadElementosAplicables` int(11) NOT NULL DEFAULT 0,
  `IndiceDeterioro` decimal(4,2) DEFAULT NULL,
  `CondicionPreliminar` varchar(20) DEFAULT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ConsecutivoInspeccion`),
  KEY `idx_inspeccion_puente` (`CodigoPuente`),
  KEY `idx_inspeccion_inspector` (`ConsecutivoInspector`),
  CONSTRAINT `fk_inspeccion_inspector` FOREIGN KEY (`ConsecutivoInspector`) REFERENCES `tb_usuario` (`Consecutivo`),
  CONSTRAINT `fk_inspeccion_puente` FOREIGN KEY (`CodigoPuente`) REFERENCES `registrarpuente` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inspeccion`
--

LOCK TABLES `tb_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_inspeccion` VALUES (1,'SB-001',1,'2026-01-10','Inspección detallada de los elementos del puente.',64,14,4.57,'Critica','2026-07-27 21:45:59',_binary ''),(2,'SB-002',1,'2026-01-12','Inspección detallada de los elementos del puente.',52,14,3.71,'Critica','2026-07-27 21:45:59',_binary ''),(3,'SB-003',1,'2026-01-15','Inspección detallada de los elementos del puente.',48,14,3.43,'Deficiente','2026-07-27 21:45:59',_binary ''),(4,'SB-004',1,'2026-01-18','Inspección detallada de los elementos del puente.',45,14,3.21,'Deficiente','2026-07-27 21:45:59',_binary ''),(5,'SB-005',1,'2026-01-20','Inspección detallada de los elementos del puente.',42,14,3.00,'Deficiente','2026-07-27 21:45:59',_binary ''),(6,'SB-006',1,'2026-01-22','Inspección detallada de los elementos del puente.',35,14,2.50,'Regular','2026-07-27 21:45:59',_binary ''),(7,'SB-007',1,'2026-01-25','Inspección detallada de los elementos del puente.',32,14,2.29,'Regular','2026-07-27 21:45:59',_binary ''),(8,'SB-008',1,'2026-01-27','Inspección detallada de los elementos del puente.',28,14,2.00,'Regular','2026-07-27 21:45:59',_binary ''),(9,'SB-009',1,'2026-01-29','Inspección detallada de los elementos del puente.',20,14,1.43,'Buena','2026-07-27 21:45:59',_binary ''),(10,'SB-010',1,'2026-02-01','Inspección detallada de los elementos del puente.',16,14,1.14,'Buena','2026-07-27 21:45:59',_binary '');
/*!40000 ALTER TABLE `tb_inspeccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Contrasenna` varchar(45) NOT NULL,
  `Estado` bit(1) NOT NULL,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'SERGIO GABRIEL ALVAREZ GONZALEZ','sergio.ag1993@gmail.com','620100',_binary '');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'proyectogrupo1'
--
/*!50003 DROP PROCEDURE IF EXISTS `spActualizarContrasenna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarContrasenna`(
	pConsecutivo 	int, 
    pContrasenna	varchar(10)
)
BEGIN

	UPDATE 	tb_usuario
	SET		Contrasenna = pContrasenna
	WHERE 	Consecutivo = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spConsultarElementosInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarElementosInspeccion`()
BEGIN

    SELECT
        ConsecutivoElemento,
        Categoria,
        NombreElemento
    FROM tb_elemento
    WHERE Estado = 1
    ORDER BY
        Categoria,
        ConsecutivoElemento;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spConsultarPriorizacionPuentes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarPriorizacionPuentes`(
    IN pMetodo VARCHAR(50)
)
BEGIN
    SELECT
        p.codigo,
        p.nombre,
        p.numero_ruta,
        p.clasificacion_ruta,
        p.provincia,
        p.canton,
        p.importancia,

        i.ConsecutivoInspeccion AS consecutivo_inspeccion,
        i.FechaInspeccion AS fecha_inspeccion,
        i.IndiceDeterioro AS indice_deterioro,
        i.CondicionPreliminar AS condicion,

        CASE
            WHEN LOWER(i.CondicionPreliminar) = 'critica'
                THEN 4
            WHEN LOWER(i.CondicionPreliminar) = 'deficiente'
                THEN 3
            WHEN LOWER(i.CondicionPreliminar) = 'regular'
                THEN 2
            WHEN LOWER(i.CondicionPreliminar) = 'buena'
                THEN 1
            ELSE 0
        END AS puntaje_condicion,

        CASE
            WHEN LOWER(p.importancia) = 'puente crítico'
                THEN 4
            WHEN LOWER(p.importancia) = 'puente esencial'
                THEN 3
            WHEN LOWER(p.importancia) = 'puente convencional'
                THEN 2
            WHEN LOWER(p.importancia) = 'otro puente'
                THEN 1
            ELSE 0
        END AS puntaje_importancia,

        CASE
            WHEN pMetodo = 'condicion_importancia' THEN
                (
                    CASE
                        WHEN LOWER(i.CondicionPreliminar) = 'critica'
                            THEN 4
                        WHEN LOWER(i.CondicionPreliminar) = 'deficiente'
                            THEN 3
                        WHEN LOWER(i.CondicionPreliminar) = 'regular'
                            THEN 2
                        WHEN LOWER(i.CondicionPreliminar) = 'buena'
                            THEN 1
                        ELSE 0
                    END * 0.70
                )
                +
                (
                    CASE
                        WHEN LOWER(p.importancia) = 'puente crítico'
                            THEN 4
                        WHEN LOWER(p.importancia) = 'puente esencial'
                            THEN 3
                        WHEN LOWER(p.importancia) = 'puente convencional'
                            THEN 2
                        WHEN LOWER(p.importancia) = 'otro puente'
                            THEN 1
                        ELSE 0
                    END * 0.30
                )

            ELSE
                CASE
                    WHEN LOWER(i.CondicionPreliminar) = 'critica'
                        THEN 4
                    WHEN LOWER(i.CondicionPreliminar) = 'deficiente'
                        THEN 3
                    WHEN LOWER(i.CondicionPreliminar) = 'regular'
                        THEN 2
                    WHEN LOWER(i.CondicionPreliminar) = 'buena'
                        THEN 1
                    ELSE 0
                END
        END AS puntaje_prioridad

    FROM registrarpuente p

    INNER JOIN tb_inspeccion i
        ON i.CodigoPuente = p.codigo
        AND i.Estado = 1

    WHERE p.codigo <> ''


      AND i.ConsecutivoInspeccion = (
            SELECT i2.ConsecutivoInspeccion
            FROM tb_inspeccion i2
            WHERE i2.CodigoPuente = p.codigo
              AND i2.Estado = 1
            ORDER BY
                i2.FechaInspeccion DESC,
                i2.ConsecutivoInspeccion DESC
            LIMIT 1
      )

    ORDER BY

        CASE
            WHEN pMetodo = 'condicion_importancia' THEN
                (
                    CASE
                        WHEN LOWER(i.CondicionPreliminar) = 'critica'
                            THEN 4
                        WHEN LOWER(i.CondicionPreliminar) = 'deficiente'
                            THEN 3
                        WHEN LOWER(i.CondicionPreliminar) = 'regular'
                            THEN 2
                        WHEN LOWER(i.CondicionPreliminar) = 'buena'
                            THEN 1
                        ELSE 0
                    END * 0.70
                )
                +
                (
                    CASE
                        WHEN LOWER(p.importancia) = 'puente crítico'
                            THEN 4
                        WHEN LOWER(p.importancia) = 'puente esencial'
                            THEN 3
                        WHEN LOWER(p.importancia) = 'puente convencional'
                            THEN 2
                        WHEN LOWER(p.importancia) = 'otro puente'
                            THEN 1
                        ELSE 0
                    END * 0.30
                )

            ELSE
                CASE
                    WHEN LOWER(i.CondicionPreliminar) = 'critica'
                        THEN 4
                    WHEN LOWER(i.CondicionPreliminar) = 'deficiente'
                        THEN 3
                    WHEN LOWER(i.CondicionPreliminar) = 'regular'
                        THEN 2
                    WHEN LOWER(i.CondicionPreliminar) = 'buena'
                        THEN 1
                    ELSE 0
                END
        END DESC,

        i.IndiceDeterioro DESC,
        i.FechaInspeccion DESC,
        p.nombre ASC;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spConsultarPuentesInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarPuentesInspeccion`()
BEGIN
    SELECT
        codigo,
        nombre,
        numero_ruta,
        provincia,
        canton,
        longitud_total
    FROM registrarpuente
    ORDER BY
        numero_ruta ASC,
        nombre ASC,
        codigo ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spFinalizarInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spFinalizarInspeccion`(

    IN pConsecutivoInspeccion INT

)
BEGIN

    DECLARE vDanioAcumulado INT DEFAULT 0;
    DECLARE vCantidadElementos INT DEFAULT 0;
    DECLARE vIndiceDeterioro DECIMAL(4,2) DEFAULT NULL;
    DECLARE vCondicionPreliminar VARCHAR(20) DEFAULT NULL;


    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_inspeccion
        WHERE ConsecutivoInspeccion = pConsecutivoInspeccion
          AND Estado = 1
    )
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La inspección indicada no existe';
    END IF;


    SELECT
        COALESCE(SUM(Calificacion), 0),
        COUNT(Calificacion),
        ROUND(AVG(Calificacion), 2)
    INTO
        vDanioAcumulado,
        vCantidadElementos,
        vIndiceDeterioro
    FROM tb_detalle_inspeccion
    WHERE ConsecutivoInspeccion = pConsecutivoInspeccion
      AND EsAplicable = 1
      AND Calificacion IS NOT NULL;


    IF vCantidadElementos = 0
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT =
            'La inspección debe tener al menos un elemento aplicable';
    END IF;



    SET vCondicionPreliminar =
        CASE
            WHEN vIndiceDeterioro >= 1.00
             AND vIndiceDeterioro < 2.00
                THEN 'Buena'

            WHEN vIndiceDeterioro >= 2.00
             AND vIndiceDeterioro < 3.00
                THEN 'Regular'

            WHEN vIndiceDeterioro >= 3.00
             AND vIndiceDeterioro < 4.00
                THEN 'Deficiente'

            WHEN vIndiceDeterioro >= 4.00
             AND vIndiceDeterioro <= 5.00
                THEN 'Critica'

            ELSE 'Sin clasificar'
        END;



    UPDATE tb_inspeccion
    SET
        DanioAcumulado = vDanioAcumulado,
        CantidadElementosAplicables = vCantidadElementos,
        IndiceDeterioro = vIndiceDeterioro,
        CondicionPreliminar = vCondicionPreliminar
    WHERE ConsecutivoInspeccion = pConsecutivoInspeccion;



    SELECT
        ConsecutivoInspeccion,
        CodigoPuente,
        FechaInspeccion,
        DanioAcumulado,
        CantidadElementosAplicables,
        IndiceDeterioro,
        CondicionPreliminar
    FROM tb_inspeccion
    WHERE ConsecutivoInspeccion = pConsecutivoInspeccion;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spIniciarSesionUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spIniciarSesionUsuario`(
    IN pCorreoElectronico VARCHAR(100),
    IN pContrasenna VARCHAR(45)
)
BEGIN

    SELECT  Consecutivo,
            Nombre,
            CorreoElectronico,
            Estado
    FROM tb_usuario
    WHERE CorreoElectronico = pCorreoElectronico
      AND Contrasenna = pContrasenna
      AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spRegistrarDetalleInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarDetalleInspeccion`(
    IN pConsecutivoInspeccion INT,
    IN pConsecutivoElemento INT,
    IN pEsAplicable TINYINT,
    IN pCalificacion TINYINT,
    IN pObservacion TEXT
)
BEGIN



    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_inspeccion
        WHERE ConsecutivoInspeccion = pConsecutivoInspeccion
          AND Estado = 1
    )
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La inspección indicada no existe';
    END IF;




    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_elemento
        WHERE ConsecutivoElemento = pConsecutivoElemento
          AND Estado = 1
    )
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El elemento indicado no existe';
    END IF;




    IF pEsAplicable IS NULL
       OR pEsAplicable NOT IN (0, 1)
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El campo EsAplicable debe ser 0 o 1';
    END IF;


    IF pEsAplicable = 1
    THEN



        IF pCalificacion IS NULL
           OR pCalificacion < 1
           OR pCalificacion > 5
        THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'La calificación debe estar entre 1 y 5';
        END IF;



        IF pCalificacion > 1
           AND
           (
               pObservacion IS NULL
               OR TRIM(pObservacion) = ''
           )
        THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT =
                'Debe ingresar una observación para calificaciones mayores a 1';
        END IF;

    ELSE


        SET pCalificacion = NULL;

    END IF;



    INSERT INTO tb_detalle_inspeccion
    (
        ConsecutivoInspeccion,
        ConsecutivoElemento,
        EsAplicable,
        Calificacion,
        Observacion
    )
    VALUES
    (
        pConsecutivoInspeccion,
        pConsecutivoElemento,
        pEsAplicable,
        pCalificacion,
        NULLIF(TRIM(pObservacion), '')
    );

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spRegistrarInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarInspeccion`(

    IN pCodigoPuente VARCHAR(20),
    IN pConsecutivoInspector INT,
    IN pFechaInspeccion DATE,
    IN pObservacionGeneral TEXT

)
BEGIN


    IF NOT EXISTS
    (
        SELECT 1
        FROM registrarpuente
        WHERE codigo = pCodigoPuente
    )
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El puente no existe';
    END IF;



    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_usuario
        WHERE Consecutivo = pConsecutivoInspector
        AND Estado = 1
    )
    THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Inspector inválido';
    END IF;



    INSERT INTO tb_inspeccion
    (
        CodigoPuente,
        ConsecutivoInspector,
        FechaInspeccion,
        ObservacionGeneral
    )
    VALUES
    (
        pCodigoPuente,
        pConsecutivoInspector,
        pFechaInspeccion,
        pObservacionGeneral
    );



    SELECT LAST_INSERT_ID() AS ConsecutivoInspeccion;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spRegistrarPuente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarPuente`(
    IN p_codigo VARCHAR(20),
    IN p_nombre VARCHAR(100),
    IN p_numero_ruta INT,
    IN p_clasificacion_ruta ENUM(
        'nacional primaria',
        'nacional secundaria',
        'nacional terciaria',
        'cantonal',
        'otra'
    ),
    IN p_provincia ENUM(
        'San José',
        'Alajuela',
        'Cartago',
        'Heredia',
        'Guanacaste',
        'Puntarenas',
        'Limón'
    ),
    IN p_canton VARCHAR(100),
    IN p_coordenadas DECIMAL(9,6),
    IN p_tipo_estructura ENUM(
        'vigas',
        'cercha',
        'arco',
        'marco rígido',
        'colgante',
        'atirantado',
        'modular provisional',
        'otra'
    ),
    IN p_material_principal ENUM(
        'concreto reforzado',
        'concreto preesforzado',
        'acero',
        'madera',
        'mampostería',
        'mixto'
    ),
    IN p_longitud_total DECIMAL(10,2),
    IN p_numero_tramos INT,
    IN p_numero_superestructuras INT,
    IN p_fecha_construccion DATE,
    IN p_importancia ENUM(
        'puente crítico',
        'puente esencial',
        'puente convencional',
        'otro puente'
    ),
    IN p_servicios_publicos SET(
        'agua potable',
        'alcantarillado',
        'electricidad',
        'telecomunicaciones',
        'tubería de combustible',
        'otros',
        'ninguno'
    ),
    IN p_restriccion_peso DECIMAL(5,1),
    IN p_restriccion_altura DECIMAL(5,2),
    IN p_imagen VARCHAR(100)
)
BEGIN
    INSERT INTO registrarpuente (
        codigo,
        nombre,
        numero_ruta,
        clasificacion_ruta,
        provincia,
        canton,
        coordenadas,
        tipo_estructura,
        material_principal,
        longitud_total,
        numero_tramos,
        numero_superestructuras,
        fecha_construccion,
        importancia,
        servicios_publicos,
        restriccion_peso,
        restriccion_altura,
        imagen
    )
    VALUES (
        p_codigo,
        p_nombre,
        p_numero_ruta,
        p_clasificacion_ruta,
        p_provincia,
        p_canton,
        p_coordenadas,
        p_tipo_estructura,
        p_material_principal,
        p_longitud_total,
        p_numero_tramos,
        p_numero_superestructuras,
        p_fecha_construccion,
        p_importancia,
        p_servicios_publicos,
        p_restriccion_peso,
        p_restriccion_altura,
        p_imagen
    );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spRegistrarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarUsuario`(
    pNombre				varchar(250), 
    pCorreoElectronico	varchar(100), 
    pContrasenna		varchar(45)
)
BEGIN

	INSERT INTO tb_usuario (Nombre, CorreoElectronico, Contrasenna, Estado)
	VALUES (pNombre, pCorreoElectronico, pContrasenna, 1);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spValidarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spValidarCorreo`(
	pCorreoElectronico 	varchar(100)
)
BEGIN

	SELECT 	Consecutivo,
			Nombre,
			CorreoElectronico,
			Estado
	FROM 	tb_usuario
    WHERE	CorreoElectronico = pCorreoElectronico
        AND Estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-27 21:55:33
