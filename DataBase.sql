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
INSERT INTO `registrarpuente` VALUES ('Prueba1','Santa',123,'nacional primaria','Cartago','coronado',7.850000,'vigas','acero',0.08,6,1,'2026-08-10','puente esencial','alcantarillado',0.1,0.17,'/Proyecto_Grupo1/View/Uploads/puentes-ebridge-tec-7.png'),('SB-001','Puente sobre río Cedro',1,'nacional primaria','San José','Pérez Zeledón',9.365420,'vigas','concreto preesforzado',92.50,3,2,'1994-04-15','otro puente','electricidad,telecomunicaciones',10.5,5.20,'/Proyecto_Grupo1/View/Uploads/SB-001.png'),('SB-002','Puente sobre río Diamante',2,'nacional primaria','Cartago','El Guarco',9.788310,'marco rígido','concreto reforzado',68.40,2,2,'2002-08-21','puente convencional','agua potable,electricidad',9.8,4.90,'/Proyecto_Grupo1/View/Uploads/SB-002.png'),('SB-003','Puente sobre río Esmeralda',27,'nacional primaria','San José','Escazú',9.934120,'vigas','concreto preesforzado',105.75,4,3,'1998-11-10','puente crítico','agua potable,electricidad,telecomunicaciones',14.2,5.50,'/Proyecto_Grupo1/View/Uploads/SB-003.png'),('SB-004','Puente sobre río Fortuna',32,'nacional primaria','Limón','Limón',9.991840,'cercha','acero',130.60,4,2,'1989-02-18','puente esencial','electricidad,telecomunicaciones',11.7,5.10,'/Proyecto_Grupo1/View/Uploads/SB-004.png'),('SB-005','Puente sobre quebrada Granada',118,'nacional secundaria','Alajuela','Grecia',10.072350,'vigas','concreto reforzado',45.80,2,2,'2008-06-12','puente esencial','agua potable',9.4,4.60,'/Proyecto_Grupo1/View/Uploads/SB-005.png'),('SB-006','Puente sobre río Horizonte',4,'nacional primaria','Heredia','Sarapiquí',10.412680,'arco','concreto reforzado',88.90,3,2,'1996-09-27','puente crítico','electricidad,telecomunicaciones',10.8,5.00,'/Proyecto_Grupo1/View/Uploads/SB-006.png'),('SB-007','Puente sobre quebrada Ilusión',804,'cantonal','Guanacaste','Santa Cruz',10.267540,'modular provisional','acero',29.70,1,1,'2017-03-05','otro puente','ninguno',4.8,3.80,'/Proyecto_Grupo1/View/Uploads/SB-007.png'),('SB-008','Puente sobre río Jacaranda',141,'nacional secundaria','Alajuela','San Carlos',10.355740,'vigas','concreto preesforzado',76.30,3,2,'2011-12-14','puente esencial','agua potable,electricidad',9.9,4.70,'/Proyecto_Grupo1/View/Uploads/SB-008.png'),('SB-009','Puente sobre río Kandela',21,'nacional primaria','Puntarenas','Esparza',9.998630,'colgante','acero',112.40,3,2,'2005-01-29','puente crítico','electricidad,telecomunicaciones',10.6,5.30,'/Proyecto_Grupo1/View/Uploads/SB-009.png'),('SB-010','Puente sobre quebrada Luna',301,'cantonal','Cartago','Paraíso',9.838970,'vigas','concreto reforzado',36.20,2,1,'2019-07-16','otro puente','agua potable',5.5,4.10,'/Proyecto_Grupo1/View/Uploads/SB-010.png');
/*!40000 ALTER TABLE `registrarpuente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_calificacion`
--

DROP TABLE IF EXISTS `tb_calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_calificacion` (
  `ConsecutivoCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `Valor` tinyint(4) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ConsecutivoCalificacion`),
  UNIQUE KEY `uq_calificacion_valor` (`Valor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_calificacion`
--

LOCK TABLES `tb_calificacion` WRITE;
/*!40000 ALTER TABLE `tb_calificacion` DISABLE KEYS */;
INSERT INTO `tb_calificacion` VALUES (1,1,'Buena',_binary ''),(2,2,'Leve',_binary ''),(3,3,'Moderada',_binary ''),(4,4,'Severa',_binary ''),(5,5,'Crítica',_binary '');
/*!40000 ALTER TABLE `tb_calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_clasificacion_ruta`
--

DROP TABLE IF EXISTS `tb_clasificacion_ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_clasificacion_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_clasificacion_ruta`
--

LOCK TABLES `tb_clasificacion_ruta` WRITE;
/*!40000 ALTER TABLE `tb_clasificacion_ruta` DISABLE KEYS */;
INSERT INTO `tb_clasificacion_ruta` VALUES (4,'cantonal'),(1,'nacional primaria'),(2,'nacional secundaria'),(3,'nacional terciaria'),(5,'otra');
/*!40000 ALTER TABLE `tb_clasificacion_ruta` ENABLE KEYS */;
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
  `Imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ConsecutivoDetalle`),
  UNIQUE KEY `uq_inspeccion_elemento` (`ConsecutivoInspeccion`,`ConsecutivoElemento`),
  KEY `idx_detalle_elemento` (`ConsecutivoElemento`),
  CONSTRAINT `fk_detalle_elemento` FOREIGN KEY (`ConsecutivoElemento`) REFERENCES `tb_elemento` (`ConsecutivoElemento`),
  CONSTRAINT `fk_detalle_inspeccion` FOREIGN KEY (`ConsecutivoInspeccion`) REFERENCES `tb_inspeccion` (`ConsecutivoInspeccion`) ON DELETE CASCADE,
  CONSTRAINT `chk_calificacion` CHECK (`Calificacion` is null or `Calificacion` between 1 and 5)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_inspeccion`
--

LOCK TABLES `tb_detalle_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_detalle_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_detalle_inspeccion` VALUES (1,1,1,_binary '',4,'Se observa deterioro severo en la superficie de rodamiento, con pérdida localizada de material y desgaste significativo.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-004_superficie_rodamiento.png'),(2,1,2,_binary '',4,'Las juntas de expansión presentan deterioro severo, pérdida de material y separación visible en algunos sectores.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-004_juntas_expansion.png'),(3,1,3,_binary '',4,'Se identifican zonas de corrosión y deformación localizada en las barandas del puente.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-004_barandas.png'),(4,1,4,_binary '',3,'El sistema de drenaje presenta obstrucciones parciales y acumulación de sedimentos.',NULL),(5,1,5,_binary '',3,'Se observan fisuras moderadas y desgaste superficial en la losa.',NULL),(6,1,6,_binary '',3,'Las vigas principales presentan deterioro moderado y signos localizados de humedad.',NULL),(7,1,7,_binary '',3,'Se identifican signos de deterioro moderado en las vigas secundarias.',NULL),(8,1,8,_binary '',3,'Los diafragmas presentan deterioro moderado y desgaste localizado.',NULL),(9,1,9,_binary '',3,'Los apoyos presentan desgaste y deterioro moderado que requiere seguimiento.',NULL),(10,1,10,_binary '',3,'Se observan fisuras menores y deterioro superficial en los bastiones.',NULL),(11,1,11,_binary '',3,'Las pilas presentan deterioro moderado sin evidencia visual de falla crítica.',NULL),(12,1,12,_binary '',3,'Se observa deterioro moderado en las zonas visibles de las cimentaciones.',NULL),(13,1,13,_binary '',3,'Se identifica erosión moderada en los taludes y pérdida localizada de material de protección.',NULL),(14,1,14,_binary '',3,'Se observa acumulación moderada de sedimentos y material vegetal en el cauce.',NULL),(15,2,1,_binary '',2,'Desgaste superficial leve en la capa de rodamiento.',NULL),(16,2,2,_binary '',2,'Se observa deterioro menor en las juntas de expansión.',NULL),(17,2,3,_binary '',2,'Se observan signos menores de corrosión superficial.',NULL),(18,2,4,_binary '',2,'Se observa acumulación menor de sedimentos.',NULL),(19,2,10,_binary '',2,'Se observan fisuras superficiales menores.',NULL),(20,2,11,_binary '',3,'Se observa deterioro superficial localizado.',NULL),(21,2,12,_binary '',2,'No se identifican daños severos en las zonas visibles.',NULL),(22,2,13,_binary '',2,'Se observa erosión superficial menor.',NULL),(23,2,14,_binary '',2,'Se observa acumulación menor de sedimentos.',NULL),(24,2,5,_binary '',2,'Se identifican fisuras superficiales menores.',NULL),(25,2,6,_binary '',4,'Se observa deterioro severo con desprendimiento del concreto, exposición del acero de refuerzo y signos de corrosión.','/Proyecto_Grupo1/View/Uploads/Inspecciones/inspeccion_2_elemento_6.png'),(26,2,7,_binary '',3,'Se observa deterioro moderado y fisuración localizada.',NULL),(27,2,8,_binary '',3,'Se identifican fisuras y deterioro moderado.',NULL),(28,2,9,_binary '',3,'Los apoyos presentan desgaste y deterioro moderado.',NULL),(29,3,1,_binary '',3,'Se observan fisuras y desgaste moderado en la superficie de rodamiento.',NULL),(30,3,2,_binary '',4,'Se observa deterioro severo y pérdida de material en las juntas de expansión.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-007_juntas_expansion.png'),(31,3,3,_binary '',3,'Se observa corrosión superficial y desprendimiento localizado de pintura en las barandas.',NULL),(32,3,4,_binary '',2,'Se observa acumulación menor de sedimentos en algunos puntos del sistema de drenaje.',NULL),(33,3,5,_binary '',3,'Se observan fisuras moderadas y desgaste localizado en la losa.',NULL),(34,3,6,_binary '',5,'Se observa corrosión avanzada en elementos de las vigas principales de la cercha de acero, con pérdida localizada de sección y deterioro del sistema de protección.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-007_vigas_principales.png'),(35,3,7,_binary '',3,'Se observa corrosión moderada en elementos secundarios de acero y deterioro localizado del recubrimiento protector.',NULL),(36,3,8,_binary '',2,'Se observa corrosión superficial localizada sin evidencia de pérdida significativa de sección.',NULL),(37,3,9,_binary '',3,'Los apoyos presentan desgaste moderado, acumulación de residuos y signos localizados de corrosión.',NULL),(38,3,10,_binary '',2,'Se observan fisuras superficiales menores en los bastiones.',NULL),(39,3,11,_binary '',2,'Se observa deterioro superficial menor en las zonas visibles de las pilas.',NULL),(40,3,12,_binary '',2,'No se observan daños significativos en las zonas visibles asociadas con las cimentaciones.',NULL),(41,3,13,_binary '',3,'Se observa erosión moderada y crecimiento de vegetación en las zonas de protección.',NULL),(42,3,14,_binary '',2,'Se observa acumulación ligera de sedimentos y material vegetal en el cauce.',NULL),(43,4,1,_binary '',4,'Se observa deterioro severo de la superficie de rodamiento, con pérdida localizada de material, agrietamiento y desgaste avanzado.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-009_superficie_rodamiento.png'),(44,4,2,_binary '',4,'Las juntas de expansión presentan deterioro severo, separación irregular y pérdida localizada de material.','/Proyecto_Grupo1/View/Uploads/Inspecciones/SB-009_juntas_expansion.png'),(45,4,3,_binary '',3,'Las barandas presentan corrosión moderada y deterioro localizado del sistema de protección.',NULL),(46,4,4,_binary '',3,'El sistema de drenaje presenta obstrucciones parciales y acumulación moderada de residuos.',NULL),(47,4,5,_binary '',3,'La losa presenta fisuración moderada y deterioro superficial localizado.',NULL),(48,4,6,_binary '',3,'Las vigas principales presentan signos de deterioro moderado y corrosión superficial localizada.',NULL),(49,4,7,_binary '',3,'Las vigas secundarias presentan deterioro moderado del recubrimiento protector.',NULL),(50,4,8,_binary '',3,'Los diafragmas presentan corrosión moderada sin evidencia de pérdida significativa de sección.',NULL),(51,4,9,_binary '',2,'Los apoyos presentan desgaste menor y acumulación localizada de residuos.',NULL),(52,4,10,_binary '',2,'Los bastiones presentan fisuración superficial menor.',NULL),(53,4,11,_binary '',2,'Las pilas presentan deterioro superficial menor en las zonas visibles.',NULL),(54,4,12,_binary '',2,'No se observan deterioros importantes en las zonas visibles de las cimentaciones.',NULL),(55,4,13,_binary '',2,'Se observa erosión superficial menor en los taludes y zonas de protección.',NULL),(56,4,14,_binary '',2,'Se observa acumulación menor de sedimentos sin obstrucción significativa del cauce.',NULL),(57,5,1,_binary '',3,'La superficie de rodamiento presenta desgaste moderado y fisuración localizada.',NULL),(58,5,2,_binary '',3,'Las juntas de expansión presentan deterioro moderado y acumulación de residuos.',NULL),(59,5,3,_binary '',3,'Las barandas presentan corrosión moderada y deterioro localizado del recubrimiento.',NULL),(60,5,4,_binary '',2,'El sistema de drenaje presenta acumulación menor de sedimentos.',NULL),(61,5,5,_binary '',2,'La losa presenta fisuración superficial menor.',NULL),(62,5,6,_binary '',2,'Las vigas principales presentan deterioro superficial menor.',NULL),(63,5,7,_binary '',2,'Las vigas secundarias presentan desgaste localizado menor.',NULL),(64,5,8,_binary '',2,'Los diafragmas presentan deterioro superficial menor.',NULL),(65,5,9,_binary '',2,'Los apoyos presentan desgaste menor sin evidencia de deterioro severo.',NULL),(66,5,10,_binary '',2,'Los bastiones presentan fisuración superficial menor.',NULL),(67,5,11,_binary '',2,'Las pilas presentan deterioro superficial localizado.',NULL),(68,5,12,_binary '',2,'Las zonas visibles de las cimentaciones presentan deterioro menor.',NULL),(69,5,13,_binary '',2,'Se observa erosión superficial menor en los taludes.',NULL),(70,5,14,_binary '',2,'Se observa acumulación menor de sedimentos en el cauce.',NULL),(71,6,1,_binary '',2,'La superficie de rodamiento presenta desgaste superficial menor.',NULL),(72,6,2,_binary '',2,'Las juntas de expansión presentan deterioro menor.',NULL),(73,6,3,_binary '',2,'Las barandas presentan desgaste superficial del sistema de protección.',NULL),(74,6,4,_binary '',2,'El sistema de drenaje presenta acumulación menor de sedimentos.',NULL),(75,6,5,_binary '',2,'La losa presenta fisuras superficiales menores.',NULL),(76,6,6,_binary '',2,'Las vigas principales presentan deterioro superficial menor.',NULL),(77,6,7,_binary '',1,NULL,NULL),(78,6,8,_binary '',1,NULL,NULL),(79,6,9,_binary '',1,NULL,NULL),(80,6,10,_binary '',1,NULL,NULL),(81,6,11,_binary '',1,NULL,NULL),(82,6,12,_binary '',1,NULL,NULL),(83,6,13,_binary '',1,NULL,NULL),(84,6,14,_binary '',1,NULL,NULL),(85,7,1,_binary '',2,'Desgaste superficial leve.',NULL),(86,7,2,_binary '',2,'Deterioro menor en las juntas.',NULL),(87,7,3,_binary '',1,NULL,NULL),(88,7,4,_binary '',2,'Acumulación menor de sedimentos.',NULL),(89,7,10,_binary '',2,'Fisuras superficiales menores.',NULL),(90,7,11,_binary '',1,NULL,NULL),(91,7,12,_binary '',1,NULL,NULL),(92,7,13,_binary '',2,'Erosión superficial menor.',NULL),(93,7,14,_binary '',1,NULL,NULL),(94,7,5,_binary '',3,'Fisuración moderada localizada.',NULL),(95,7,6,_binary '',2,'Deterioro superficial menor.',NULL),(96,7,7,_binary '',2,'Desgaste localizado.',NULL),(97,7,8,_binary '',1,NULL,NULL),(98,7,9,_binary '',2,'Desgaste menor.',NULL),(99,8,1,_binary '',3,'Sobrecapas.',NULL),(100,8,2,_binary '',5,'Se observa deterioro severo localizado, pérdida de material y abertura irregular en la junta.','/Proyecto_Grupo1/View/Uploads/Inspecciones/inspeccion_8_elemento_2.png'),(101,8,3,_binary '',3,'Desprendimiento severo.',NULL),(102,8,4,_binary '\0',NULL,NULL,NULL),(103,8,10,_binary '',3,'Desprendimiento severo.',NULL),(104,8,11,_binary '\0',NULL,NULL,NULL),(105,8,12,_binary '',3,'Socavación.',NULL),(106,8,13,_binary '\0',NULL,NULL,NULL),(107,8,14,_binary '\0',NULL,NULL,NULL),(108,8,5,_binary '',3,'Desprendimiento de concreto.',NULL),(109,8,6,_binary '',5,'Se observa corrosión severa localizada y deterioro del sistema de protección en un elemento de la cercha de acero.','/Proyecto_Grupo1/View/Uploads/Inspecciones/inspeccion_8_elemento_6.png'),(110,8,7,_binary '\0',NULL,NULL,NULL),(111,8,8,_binary '\0',NULL,NULL,NULL),(112,8,9,_binary '',3,'Corrosión con pérdida de sección.',NULL);
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
-- Table structure for table `tb_importancia`
--

DROP TABLE IF EXISTS `tb_importancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_importancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_importancia`
--

LOCK TABLES `tb_importancia` WRITE;
/*!40000 ALTER TABLE `tb_importancia` DISABLE KEYS */;
INSERT INTO `tb_importancia` VALUES (4,'otro puente'),(3,'puente convencional'),(1,'puente crítico'),(2,'puente esencial');
/*!40000 ALTER TABLE `tb_importancia` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inspeccion`
--

LOCK TABLES `tb_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_inspeccion` VALUES (1,'SB-004',1,'2026-08-10','Inspección visual detallada de los elementos del puente. Se identificaron deterioros localizados que requieren seguimiento e intervención.',45,14,3.21,'Deficiente','2026-08-10 20:51:17',_binary ''),(2,'SB-006',1,'2026-08-11','Inspección visual general del puente. Se identificaron deterioros menores y moderados en varios elementos, así como deterioro severo localizado en las vigas principales, con desprendimiento de concreto, exposición del acero de refuerzo y presencia de corrosión. Se recomienda seguimiento del elemento afectado.',34,14,2.43,'Regular','2026-08-10 21:08:05',_binary ''),(3,'SB-007',1,'2026-08-13','Inspección visual del puente de cercha de acero. Se identificó deterioro severo en las juntas de expansión y deterioro muy severo localizado en las vigas principales de la cercha. También se observaron deterioros menores y moderados en otros elementos.',39,14,2.79,'Regular','2026-08-10 21:21:30',_binary ''),(4,'SB-009',1,'2026-08-14','Inspección visual del puente. Aunque la condición general presenta deterioro moderado, se identificaron daños severos localizados en la superficie de rodamiento y las juntas de expansión. Debido a la importancia estratégica del puente, se recomienda mantener seguimiento prioritario.',38,14,2.71,'Regular','2026-08-10 21:25:24',_binary ''),(5,'SB-001',1,'2026-08-15','Inspección visual general del puente. Se identificaron deterioros moderados en algunos accesorios y deterioros menores en los demás elementos. No se observaron daños severos.',31,14,2.21,'Regular','2026-08-10 21:27:04',_binary ''),(6,'SB-003',1,'2026-08-16','Inspección visual general del puente. La estructura presenta una condición favorable, con deterioros menores principalmente en accesorios. Debido a su importancia estratégica se recomienda conservar un programa de seguimiento preventivo.',20,14,1.43,'Buena','2026-08-10 21:27:04',_binary ''),(7,'SB-002',1,'2026-08-18','Inspección visual general del puente. Se identificaron deterioros leves y moderados en varios elementos, sin presencia de daños severos.',24,14,1.71,'Buena','2026-08-17 22:14:21',_binary ''),(8,'SB-007',1,'2026-08-03','Inspección de seguimiento del puente. La mayoría de los elementos se encuentran en condición favorable; sin embargo, se identificaron dos deterioros severos localizados que requieren seguimiento y documentación fotográfica.',28,8,3.50,'Deficiente','2026-08-17 22:21:47',_binary '');
/*!40000 ALTER TABLE `tb_inspeccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_material_principal`
--

DROP TABLE IF EXISTS `tb_material_principal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_material_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_material_principal`
--

LOCK TABLES `tb_material_principal` WRITE;
/*!40000 ALTER TABLE `tb_material_principal` DISABLE KEYS */;
INSERT INTO `tb_material_principal` VALUES (3,'acero'),(2,'concreto preesforzado'),(1,'concreto reforzado'),(4,'madera'),(5,'mampostería'),(6,'mixto');
/*!40000 ALTER TABLE `tb_material_principal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_provincia`
--

DROP TABLE IF EXISTS `tb_provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_provincia`
--

LOCK TABLES `tb_provincia` WRITE;
/*!40000 ALTER TABLE `tb_provincia` DISABLE KEYS */;
INSERT INTO `tb_provincia` VALUES (2,'Alajuela'),(3,'Cartago'),(5,'Guanacaste'),(4,'Heredia'),(7,'Limón'),(6,'Puntarenas'),(1,'San José');
/*!40000 ALTER TABLE `tb_provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rol`
--

DROP TABLE IF EXISTS `tb_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_rol` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rol`
--

LOCK TABLES `tb_rol` WRITE;
/*!40000 ALTER TABLE `tb_rol` DISABLE KEYS */;
INSERT INTO `tb_rol` VALUES (1,'Administrador'),(2,'Inspector');
/*!40000 ALTER TABLE `tb_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_servicio_publico`
--

DROP TABLE IF EXISTS `tb_servicio_publico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_servicio_publico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_servicio_publico`
--

LOCK TABLES `tb_servicio_publico` WRITE;
/*!40000 ALTER TABLE `tb_servicio_publico` DISABLE KEYS */;
INSERT INTO `tb_servicio_publico` VALUES (1,'agua potable'),(2,'alcantarillado'),(3,'electricidad'),(7,'ninguno'),(6,'otros'),(4,'telecomunicaciones'),(5,'tubería de combustible');
/*!40000 ALTER TABLE `tb_servicio_publico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_estructura`
--

DROP TABLE IF EXISTS `tb_tipo_estructura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tipo_estructura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_estructura`
--

LOCK TABLES `tb_tipo_estructura` WRITE;
/*!40000 ALTER TABLE `tb_tipo_estructura` DISABLE KEYS */;
INSERT INTO `tb_tipo_estructura` VALUES (3,'arco'),(6,'atirantado'),(2,'cercha'),(5,'colgante'),(4,'marco rígido'),(7,'modular provisional'),(8,'otra'),(1,'vigas');
/*!40000 ALTER TABLE `tb_tipo_estructura` ENABLE KEYS */;
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
  `ConsecutivoRol` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`Consecutivo`),
  KEY `fk_usuario_rol` (`ConsecutivoRol`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`ConsecutivoRol`) REFERENCES `tb_rol` (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'SERGIO GABRIEL ALVAREZ GONZALEZ','sergio.ag1993@gmail.com','620100',_binary '',2),(2,'Juan Jose','admin@correo.com','123456',_binary '',1),(3,'Sofía Vargas','inspector@correo.com','123456',_binary '',2),(4,'GLADYS MARIA HINSON MENDEZ','gladys@ucr.ac.cr','620100',_binary '',2);
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
/*!50003 DROP PROCEDURE IF EXISTS `spConsultarCalificacionesInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarCalificacionesInspeccion`()
BEGIN

    SELECT
        ConsecutivoCalificacion,
        Valor,
        Descripcion

    FROM tb_calificacion

    WHERE Estado = b'1'

    ORDER BY Valor;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spConsultarDetalleInspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarDetalleInspeccion`(
    IN pConsecutivoInspeccion INT
)
BEGIN

    SELECT
        i.ConsecutivoInspeccion,
        i.CodigoPuente,
        i.FechaInspeccion,
        i.ObservacionGeneral,
        i.DanioAcumulado,
        i.CantidadElementosAplicables,
        i.IndiceDeterioro,
        i.CondicionPreliminar,

        p.nombre,
        p.numero_ruta,
        p.provincia,
        p.canton,

        e.ConsecutivoElemento,
        e.Categoria,
        e.NombreElemento,

        d.EsAplicable,
        d.Calificacion,
        d.Observacion,
        d.Imagen

    FROM tb_inspeccion i

    INNER JOIN registrarpuente p
        ON p.codigo = i.CodigoPuente

    INNER JOIN tb_detalle_inspeccion d
        ON d.ConsecutivoInspeccion =
           i.ConsecutivoInspeccion

    INNER JOIN tb_elemento e
        ON e.ConsecutivoElemento =
           d.ConsecutivoElemento

    WHERE i.ConsecutivoInspeccion =
          pConsecutivoInspeccion

    ORDER BY
        e.ConsecutivoElemento;

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
/*!50003 DROP PROCEDURE IF EXISTS `spConsultarInspeccionesPuente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarInspeccionesPuente`(
    IN pCodigoPuente VARCHAR(20)
)
BEGIN

    SELECT
        ConsecutivoInspeccion,
        CodigoPuente,
        FechaInspeccion,
        DanioAcumulado,
        CantidadElementosAplicables,
        IndiceDeterioro,
        CondicionPreliminar

    FROM tb_inspeccion

    WHERE CodigoPuente = pCodigoPuente
      AND Estado = 1

    ORDER BY
        FechaInspeccion DESC,
        ConsecutivoInspeccion DESC;

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
                    END * 0.50
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
                    END * 0.50
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
                    END * 0.50
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
                    END * 0.50
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
/*!50003 DROP PROCEDURE IF EXISTS `spListarPuentes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarPuentes`()
BEGIN
    SELECT
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
    FROM registrarpuente;
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
    IN pObservacion TEXT,
    IN pImagen VARCHAR(255)
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


        IF (
            pCalificacion = 4
            OR pCalificacion = 5
        )
        AND
        (
            pImagen IS NULL
            OR TRIM(pImagen) = ''
        )
        THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT =
                'Debe agregar una imagen para calificaciones 4 o 5';
        END IF;

    ELSE

        SET pCalificacion = NULL;
        SET pImagen = NULL;

    END IF;


    INSERT INTO tb_detalle_inspeccion
    (
        ConsecutivoInspeccion,
        ConsecutivoElemento,
        EsAplicable,
        Calificacion,
        Observacion,
        Imagen
    )
    VALUES
    (
        pConsecutivoInspeccion,
        pConsecutivoElemento,
        pEsAplicable,
        pCalificacion,
        NULLIF(TRIM(pObservacion), ''),
        NULLIF(TRIM(pImagen), '')
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

-- Dump completed on 2026-08-17 22:24:26
