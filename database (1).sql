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
  `fecha_construccion` date DEFAULT NULL,
  `importancia` enum('puente crítico','puente esencial','puente convencional','otro puente') NOT NULL,
  `servicios_publicos` set('agua potable','alcantarillado','electricidad','telecomunicaciones','tubería de combustible','otros','ninguno') DEFAULT NULL,
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
INSERT INTO `registrarpuente` VALUES ('P09','Santa Cruz',5,'nacional secundaria','Cartago','puriscal',12.000000,'modular provisional','acero',89.00,7,2,'2026-07-13','puente esencial','alcantarillado',0.0,0.00),('P9UY','Santa',3,'nacional secundaria','Guanacaste','M',12.000000,'atirantado','concreto preesforzado',0.09,1,3,'2026-06-19','puente esencial','electricidad',0.1,0.04),('Po7','Etse',4,'nacional secundaria','Guanacaste','p',12.000000,'atirantado','acero',0.01,2,3,'2026-06-30','puente convencional','agua potable',0.0,0.02);
/*!40000 ALTER TABLE `registrarpuente` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Juan José Salas Amador','jsalas80222@ufide.ac.cr','GW1FWWZN',_binary ''),(2,'Cristal Rodriguez','crodriguez60420@ufide.ac.cr','contrasenna123',_binary ''),(3,'Sofia','svarg@gmail.com','vargassalas',_binary '');
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

-- Dump completed on 2026-07-19  9:41:18
