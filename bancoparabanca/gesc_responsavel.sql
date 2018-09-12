-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: gesc
-- ------------------------------------------------------
-- Server version	5.7.23-log

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
-- Table structure for table `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsavel` (
  `idresponsavel` int(10) NOT NULL AUTO_INCREMENT,
  `profissao` varchar(255) DEFAULT NULL,
  `salario` float(10,2) DEFAULT '0.00',
  `estadocivil` enum('Solteiro','Casado','Divorciado','Viúvo','Separado') DEFAULT NULL,
  `localtrabalho` varchar(255) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `telefone2` varchar(11) DEFAULT NULL,
  `escolaridade` enum('Ens. Fundamental incompleto','Ens. Fundaental completo','Ens. Médio incompleto','Ens. Médio completo','Ens. Superior incompleto','Ens. Superior Completo') DEFAULT NULL,
  `outrasobs` varchar(255) DEFAULT NULL,
  `idpessoa` int(10) NOT NULL,
  `idfamilia` int(10) NOT NULL,
  PRIMARY KEY (`idresponsavel`),
  KEY `idpessoa` (`idpessoa`),
  KEY `idfamilia` (`idfamilia`),
  CONSTRAINT `responsavel_ibfk_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`),
  CONSTRAINT `responsavel_ibfk_2` FOREIGN KEY (`idfamilia`) REFERENCES `familia` (`idfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-10 19:13:56
