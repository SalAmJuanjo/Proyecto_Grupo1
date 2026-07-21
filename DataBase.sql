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
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrarpuente`
--

LOCK TABLES `registrarpuente` WRITE;
/*!40000 ALTER TABLE `registrarpuente` DISABLE KEYS */;
INSERT INTO `registrarpuente` VALUES ('PN-101','Puente sobre río Segundo',1,'nacional primaria','Alajuela','Alajuela',10.016245,'vigas','concreto preesforzado',86.50,3,1,'2008-05-14','puente esencial','agua potable,electricidad,telecomunicaciones',40.0,4.80),('PN-102','Puente sobre río Torres',39,'nacional primaria','San José','San José',9.945680,'marco rígido','concreto reforzado',42.75,1,1,'1996-11-22','puente convencional','alcantarillado,electricidad',30.0,4.50),('PN-103','Puente sobre río Peñas Blancas',142,'nacional secundaria','Alajuela','San Ramón',10.218430,'cercha','acero',118.20,4,1,'1987-03-09','puente crítico','telecomunicaciones',25.0,4.20),('PN-104','Puente sobre río Pacuare',10,'nacional primaria','Cartago','Turrialba',9.897315,'arco','concreto reforzado',154.90,3,1,'2015-07-18','puente esencial','agua potable,electricidad,otros',45.0,5.10),('PN-105','Puente sobre quebrada Honda',804,'cantonal','Guanacaste','Santa Cruz',10.267840,'modular provisional','acero',24.60,2,1,'2021-02-12','otro puente','ninguno',18.0,3.90);
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_inspeccion`
--

LOCK TABLES `tb_detalle_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_detalle_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_detalle_inspeccion` VALUES (1,1,1,_binary '',1,NULL),(2,1,2,_binary '',1,NULL),(3,1,3,_binary '',2,'Corrosión superficial.'),(4,1,4,_binary '',1,NULL),(5,1,5,_binary '',1,NULL),(6,1,6,_binary '',1,NULL),(7,1,7,_binary '',1,NULL),(8,1,8,_binary '',2,'Fisura leve.'),(9,1,9,_binary '',1,NULL),(10,1,10,_binary '',1,NULL),(11,1,11,_binary '',1,NULL),(12,1,12,_binary '',1,NULL),(13,1,13,_binary '',1,NULL),(14,1,14,_binary '',1,NULL),(15,2,1,_binary '',2,'Desgaste moderado.'),(16,2,2,_binary '',2,'Juntas deterioradas.'),(17,2,3,_binary '',3,'Baranda golpeada.'),(18,2,4,_binary '',2,'Drenaje parcialmente obstruido.'),(19,2,5,_binary '',2,'Fisuras visibles.'),(20,2,6,_binary '',2,'Corrosión superficial.'),(21,2,7,_binary '',2,'Fisuras menores.'),(22,2,8,_binary '',3,'Daño moderado.'),(23,2,9,_binary '',2,'Desgaste.'),(24,2,10,_binary '',2,'Fisuras.'),(25,2,11,_binary '',2,'Daño menor.'),(26,2,12,_binary '',2,'Socavación leve.'),(27,2,13,_binary '',2,'Erosión ligera.'),(28,2,14,_binary '',2,'Sedimentos acumulados.'),(29,3,1,_binary '',1,NULL),(30,3,2,_binary '',1,NULL),(31,3,3,_binary '',1,NULL),(32,3,4,_binary '',1,NULL),(33,3,5,_binary '',2,'Fisura superficial.'),(34,3,6,_binary '',1,NULL),(35,3,7,_binary '',1,NULL),(36,3,8,_binary '',1,NULL),(37,3,9,_binary '',1,NULL),(38,3,10,_binary '',1,NULL),(39,3,11,_binary '',1,NULL),(40,3,12,_binary '',1,NULL),(41,3,13,_binary '',1,NULL),(42,3,14,_binary '',1,NULL),(43,4,1,_binary '',3,'Desgaste importante.'),(44,4,2,_binary '',3,'Juntas abiertas.'),(45,4,3,_binary '',4,'Baranda deformada.'),(46,4,4,_binary '',3,'Drenaje obstruido.'),(47,4,5,_binary '',4,'Fisuras severas.'),(48,4,6,_binary '',3,'Corrosión.'),(49,4,7,_binary '',3,'Fisuras.'),(50,4,8,_binary '',4,'Daño estructural.'),(51,4,9,_binary '',3,'Apoyo deteriorado.'),(52,4,10,_binary '',3,'Asentamiento.'),(53,4,11,_binary '',3,'Deterioro.'),(54,4,12,_binary '',4,'Socavación.'),(55,4,13,_binary '',3,'Erosión.'),(56,4,14,_binary '',4,'Obstrucción del cauce.'),(57,5,1,_binary '',5,'Daño severo.'),(58,5,2,_binary '',5,'Juntas destruidas.'),(59,5,3,_binary '',5,'Barandas colapsadas.'),(60,5,4,_binary '',5,'Sistema de drenaje inoperable.'),(61,5,5,_binary '',5,'Grietas profundas.'),(62,5,6,_binary '',5,'Corrosión generalizada.'),(63,5,7,_binary '',4,'Fisuras críticas.'),(64,5,8,_binary '',5,'Falla estructural.'),(65,5,9,_binary '',5,'Apoyos comprometidos.'),(66,5,10,_binary '',5,'Asentamiento severo.'),(67,5,11,_binary '',5,'Pilas dañadas.'),(68,5,12,_binary '',5,'Socavación severa.'),(69,5,13,_binary '',5,'Talud inestable.'),(70,5,14,_binary '',5,'Cauce obstruido.');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inspeccion`
--

LOCK TABLES `tb_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_inspeccion` VALUES (1,'PN-101',1,'2025-08-12','Inspección rutinaria.',16,14,1.14,'Buena','2026-07-21 14:12:32',_binary ''),(2,'PN-101',1,'2025-09-15','Inspección de seguimiento.',30,14,2.14,'Regular','2026-07-21 14:12:44',_binary ''),(3,'PN-102',1,'2025-08-20','Inspección anual.',15,14,1.07,'Buena','2026-07-21 14:12:56',_binary ''),(4,'PN-102',1,'2025-10-10','Inspección posterior a lluvias.',47,14,3.36,'Deficiente','2026-07-21 14:13:03',_binary ''),(5,'PN-103',1,'2025-11-05','Inspección extraordinaria.',69,14,4.93,'Critica','2026-07-21 14:13:12',_binary '');
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
    IN p_restriccion_altura DECIMAL(5,2)
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
        restriccion_altura
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
        p_restriccion_altura
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

-- Dump completed on 2026-07-21 14:19:54
