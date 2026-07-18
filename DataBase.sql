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
  `ruta` varchar(255) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `longitud` decimal(10,6) NOT NULL,
  `fecha` date DEFAULT NULL,
  `calificacion` tinyint(4) DEFAULT NULL CHECK (`calificacion` between 1 and 5),
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrarpuente`
--

LOCK TABLES `registrarpuente` WRITE;
/*!40000 ALTER TABLE `registrarpuente` DISABLE KEYS */;
INSERT INTO `registrarpuente` VALUES ('CP-001','Puente sobre Río Virilla','32','6.12',85.400000,'2008-01-01',NULL),('CP-002','Puente sobre Río Grande de Tárcoles','27','41.80',132.600000,'2010-01-01',NULL),('CP-003','Puente sobre Río Tempisque','21','14.75',118.300000,'2004-01-01',NULL),('CP-004','Puente sobre Río Reventazón','10','51.40',98.700000,'1999-01-01',NULL),('CP-005','Puente sobre Río Barranca','1','97.30',72.500000,'1995-01-01',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_inspeccion`
--

LOCK TABLES `tb_detalle_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_detalle_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_detalle_inspeccion` VALUES (1,1,1,_binary '\0',NULL,NULL),(2,1,2,_binary '\0',NULL,NULL),(3,1,3,_binary '',1,NULL),(4,1,4,_binary '',1,NULL),(5,1,5,_binary '',1,NULL),(6,1,6,_binary '',2,'Corrosión superficial.'),(7,1,7,_binary '',1,NULL),(8,1,8,_binary '',1,NULL),(9,1,9,_binary '',2,'Desgaste leve.'),(10,1,10,_binary '',1,NULL),(11,1,11,_binary '\0',NULL,NULL),(12,1,12,_binary '\0',NULL,NULL),(13,1,13,_binary '',2,'Fisuras menores.'),(14,1,14,_binary '',1,NULL),(15,2,1,_binary '\0',NULL,NULL),(16,2,2,_binary '\0',NULL,NULL),(17,2,3,_binary '',2,'Desgaste superficial.'),(18,2,4,_binary '',2,'Corrosión leve.'),(19,2,5,_binary '',1,NULL),(20,2,6,_binary '',2,'Pintura deteriorada.'),(21,2,7,_binary '',2,'Fisuración menor.'),(22,2,8,_binary '',1,NULL),(23,2,9,_binary '',2,'Desgaste leve.'),(24,2,10,_binary '',1,NULL),(25,2,11,_binary '\0',NULL,NULL),(26,2,12,_binary '\0',NULL,NULL),(27,2,13,_binary '',2,'Corrosión menor.'),(28,2,14,_binary '',1,NULL),(29,3,1,_binary '\0',NULL,NULL),(30,3,2,_binary '',2,'Corrosión superficial.'),(31,3,3,_binary '',2,'Desgaste leve.'),(32,3,4,_binary '',1,NULL),(33,3,5,_binary '',2,'Fisuras menores.'),(34,3,6,_binary '',2,'Desgaste superficial.'),(35,3,7,_binary '',3,'Deterioro moderado.'),(36,3,8,_binary '',2,'Pérdida de recubrimiento.'),(37,3,9,_binary '',1,NULL),(38,3,10,_binary '',2,'Corrosión leve.'),(39,3,11,_binary '\0',NULL,NULL),(40,3,12,_binary '',1,NULL),(41,3,13,_binary '',2,'Fisuras pequeñas.'),(42,3,14,_binary '',2,'Desgaste menor.'),(43,4,1,_binary '\0',NULL,NULL),(44,4,2,_binary '',3,'Corrosión moderada.'),(45,4,3,_binary '',2,'Desgaste superficial.'),(46,4,4,_binary '',2,'Fisuración leve.'),(47,4,5,_binary '',3,'Daño moderado.'),(48,4,6,_binary '',2,'Pintura deteriorada.'),(49,4,7,_binary '',3,'Corrosión visible.'),(50,4,8,_binary '',2,'Desgaste leve.'),(51,4,9,_binary '',2,'Fisuras menores.'),(52,4,10,_binary '',2,'Corrosión superficial.'),(53,4,11,_binary '\0',NULL,NULL),(54,4,12,_binary '',1,NULL),(55,4,13,_binary '',3,'Deterioro moderado.'),(56,4,14,_binary '',2,'Desgaste superficial.'),(57,5,1,_binary '',5,'Corrosión severa con pérdida significativa de sección.'),(58,5,2,_binary '',5,'Fisuras abiertas y desprendimiento de concreto.'),(59,5,3,_binary '',4,'Apoyos con daño importante.'),(60,5,4,_binary '',5,'Socavación severa detectada.'),(61,5,5,_binary '',4,'Juntas con deterioro avanzado.'),(62,5,6,_binary '',5,'Vigas con corrosión generalizada.'),(63,5,7,_binary '',4,'Barandas con deformaciones importantes.'),(64,5,8,_binary '',5,'Losa con grietas extensas y desprendimientos.'),(65,5,9,_binary '',5,'Elementos secundarios con daño estructural.'),(66,5,10,_binary '',4,'Desgaste crítico en superficie de rodamiento.'),(67,5,11,_binary '',5,'Apoyo con pérdida de capacidad resistente.'),(68,5,12,_binary '',4,'Drenajes obstruidos con afectación estructural.'),(69,5,13,_binary '',5,'Corrosión severa en conexiones.'),(70,5,14,_binary '',5,'Condición crítica del elemento.'),(71,6,1,_binary '\0',NULL,NULL),(72,6,2,_binary '',1,NULL),(73,6,3,_binary '',1,NULL),(74,6,10,_binary '',1,NULL),(75,6,11,_binary '',1,NULL),(76,6,12,_binary '',1,NULL),(77,6,13,_binary '',1,NULL),(78,6,14,_binary '',1,NULL),(79,6,4,_binary '',1,NULL),(80,6,5,_binary '',1,NULL),(81,6,6,_binary '',1,NULL),(82,6,7,_binary '',1,NULL),(83,6,8,_binary '',1,NULL),(84,6,9,_binary '',1,NULL);
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
INSERT INTO `tb_elemento` VALUES (1,'Accesorios','Pavimento',_binary ''),(2,'Accesorios','Barandas de acero o concreto',_binary ''),(3,'Accesorios','Juntas de expansión',_binary ''),(4,'Superestructura','Losa',_binary ''),(5,'Superestructura','Vigas principales de acero',_binary ''),(6,'Superestructura','Sistema de arriostramiento',_binary ''),(7,'Superestructura','Pintura',_binary ''),(8,'Superestructura','Vigas principales de concreto',_binary ''),(9,'Superestructura','Vigas diafragma',_binary ''),(10,'Subestructura','Apoyos',_binary ''),(11,'Subestructura','Viga cabezal y aletones del bastión',_binary ''),(12,'Subestructura','Cuerpo principal del bastión',_binary ''),(13,'Subestructura','Martillo de la pila',_binary ''),(14,'Subestructura','Cuerpo principal de la pila',_binary '');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inspeccion`
--

LOCK TABLES `tb_inspeccion` WRITE;
/*!40000 ALTER TABLE `tb_inspeccion` DISABLE KEYS */;
INSERT INTO `tb_inspeccion` VALUES (1,'CP-001',4,'2024-03-15','Inspección rutinaria.',13,10,1.30,'Buena','2026-07-18 14:33:35',_binary ''),(2,'CP-001',4,'2025-03-18','Inspección anual.',16,10,1.60,'Buena','2026-07-18 14:33:49',_binary ''),(3,'CP-002',4,'2024-05-10','Inspección rutinaria.',22,12,1.83,'Buena','2026-07-18 14:34:11',_binary ''),(4,'CP-002',4,'2025-05-15','Inspección de seguimiento.',27,12,2.25,'Regular','2026-07-18 14:36:03',_binary ''),(5,'CP-003',4,'2026-07-18','Inspección extraordinaria por deterioro severo del puente.',65,14,4.64,'Critica','2026-07-18 14:36:59',_binary ''),(6,'CP-001',4,'2026-07-18','',13,13,1.00,'Buena','2026-07-18 15:01:09',_binary '');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (4,'Sergio Álvarez González','sergio.ag1993@gmail.com','620100',_binary '');
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
        ruta,
        ubicacion,
        longitud
    FROM registrarpuente
    ORDER BY
        ruta ASC,
        ubicacion ASC,
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
    p_codigo VARCHAR(20),
    p_nombre VARCHAR(100),
    p_ruta VARCHAR(255),
    p_ubicacion VARCHAR(100),
    p_longitud DECIMAL(10,6),
    p_fecha DATE,
    p_calificacion TINYINT
)
BEGIN
    INSERT INTO RegistrarPuente (codigo, nombre, ruta, ubicacion, longitud, fecha, calificacion)
    VALUES (p_codigo, p_nombre, p_ruta, p_ubicacion, p_longitud, p_fecha, p_calificacion);
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

-- Dump completed on 2026-07-18 15:04:34
