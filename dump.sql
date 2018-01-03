-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: reporte
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `reporte`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `reporte` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `reporte`;

--
-- Table structure for table `detallereport`
--

DROP TABLE IF EXISTS `detallereport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallereport` (
  `IdDetalleReport` int(11) NOT NULL AUTO_INCREMENT,
  `idLogin` int(11) NOT NULL,
  `IdServicio` int(11) NOT NULL,
  `IdTipoReporte` int(11) NOT NULL,
  `IdDetTipoRep` int(11) NOT NULL,
  `IdProcAsis` int(11) DEFAULT NULL,
  `NomPac` varchar(100) DEFAULT NULL,
  `Documento` varchar(12) DEFAULT NULL,
  `Medicamento` varchar(30) DEFAULT NULL,
  `Lote` varchar(30) DEFAULT NULL,
  `Fabricante` varchar(30) DEFAULT NULL,
  `DescSuceso` text,
  `Dispositivo` varchar(30) DEFAULT NULL,
  `FechaSuc` date DEFAULT NULL,
  `Clasificacion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IdDetalleReport`),
  KEY `IdProcAsis` (`IdProcAsis`),
  KEY `IdDetTipoRep` (`IdDetTipoRep`),
  KEY `IdServicio` (`IdServicio`),
  KEY `IdLogin` (`idLogin`),
  KEY `IdTipoReporte` (`IdTipoReporte`),
  CONSTRAINT `detallereport_ibfk_1` FOREIGN KEY (`IdDetTipoRep`) REFERENCES `dettiporep` (`IdDetTipoRep`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detallereport_ibfk_2` FOREIGN KEY (`IdServicio`) REFERENCES `servicio` (`IdServicio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detallereport_ibfk_3` FOREIGN KEY (`idLogin`) REFERENCES `login` (`idLogin`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detallereport_ibfk_4` FOREIGN KEY (`IdProcAsis`) REFERENCES `procasis` (`IdProcAsis`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detallereport_ibfk_5` FOREIGN KEY (`IdTipoReporte`) REFERENCES `tiporeporte` (`IdTipoReporte`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallereport`
--

LOCK TABLES `detallereport` WRITE;
/*!40000 ALTER TABLE `detallereport` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallereport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dettiporep`
--

DROP TABLE IF EXISTS `dettiporep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dettiporep` (
  `IdDetTipoRep` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoReporte` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`IdDetTipoRep`),
  KEY `IdTipoReporte` (`IdTipoReporte`),
  CONSTRAINT `dettiporep_ibfk_1` FOREIGN KEY (`IdTipoReporte`) REFERENCES `tiporeporte` (`IdTipoReporte`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dettiporep`
--

LOCK TABLES `dettiporep` WRITE;
/*!40000 ALTER TABLE `dettiporep` DISABLE KEYS */;
INSERT INTO `dettiporep` VALUES (1,1,'MEDICAMENTOS'),(2,1,'DISPOSITIVOS MÉDICOS/EQUIPOS BIOMEDICOS'),(3,1,'TRAMITES ADMINISTRATIVOS'),(4,1,'PROCESOS ASISTENCIALES'),(5,2,'MEDICAMENTOS'),(6,2,'DISPOSITIVOS MÉDICOS/EQUIPOS BIOMEDICOS'),(7,2,'TRAMITES ADMINISTRATIVOS'),(8,2,'PROCESOS ASISTENCIALES');
/*!40000 ALTER TABLE `dettiporep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`idLogin`),
  UNIQUE KEY `login_name_IDX` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'GERENCIA','ADMINISTRADOR','202cb962ac59075b964b07152d234b70'),(2,'SISTEMAS','CONSULTA','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procasis`
--

DROP TABLE IF EXISTS `procasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procasis` (
  `IdProcAsis` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`IdProcAsis`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procasis`
--

LOCK TABLES `procasis` WRITE;
/*!40000 ALTER TABLE `procasis` DISABLE KEYS */;
INSERT INTO `procasis` VALUES (1,'ERROR EN LA IDENTIFICACIÓN DEL PACIENTE'),(2,'CADENA DE CUSTODIA DE PERTENENCIAS DEL USUARIO'),(3,'CAIDAS'),(4,'ULCERAS POR PRESIÓN'),(5,'INFECCIONES RELACIONADAS CON EL CUIDADO DE LA SALUD'),(6,'INFECCIÓN EN SITIO OPERATORIO'),(7,'CIRUGIA EN SITIO EQUIVOCADO O EN PACIENTE EQUIVOCADO'),(8,'ERROR EN REPORTE DE LABORATORIO CLÍNICO'),(9,'FALLAS EN LOS REGISTROS CLÍNICOS '),(10,'FUGA DEL PACIENTE');
/*!40000 ALTER TABLE `procasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `IdServicio` int(11) NOT NULL AUTO_INCREMENT,
  `NomServicio` varchar(30) NOT NULL,
  PRIMARY KEY (`IdServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,'URGENCIAS'),(2,'HOSPITALIZACIÓN'),(3,'QUIROFANO'),(4,'LABORATORIO CLINICO'),(5,'RADIOLOGIA'),(6,'FARMACIA'),(7,'FACTURACIÓN'),(8,'ADMINISTRACION');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiporeporte`
--

DROP TABLE IF EXISTS `tiporeporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiporeporte` (
  `IdTipoReporte` int(11) NOT NULL AUTO_INCREMENT,
  `NomReport` varchar(50) NOT NULL,
  PRIMARY KEY (`IdTipoReporte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiporeporte`
--

LOCK TABLES `tiporeporte` WRITE;
/*!40000 ALTER TABLE `tiporeporte` DISABLE KEYS */;
INSERT INTO `tiporeporte` VALUES (1,'EVENTO ADVERSO (OCASIONA DAÑO AL PACIENTE)'),(2,'INCIDENTE (PUDO OCASIONAR DAÑO AL PACIENTE)');
/*!40000 ALTER TABLE `tiporeporte` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-02 20:07:54
