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
-- Table structure for table `dias_funcionamento`
--

DROP TABLE IF EXISTS `dias_funcionamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dias_funcionamento` (
  `idano` int(4) NOT NULL,
  `jan` int(2) DEFAULT NULL,
  `fev` int(2) DEFAULT NULL,
  `mar` int(2) DEFAULT NULL,
  `mai` int(2) DEFAULT NULL,
  `abr` int(2) DEFAULT NULL,
  `jun` int(2) DEFAULT NULL,
  `jul` int(2) DEFAULT NULL,
  `ago` int(2) DEFAULT NULL,
  `setembro` int(2) DEFAULT NULL,
  `out` int(2) DEFAULT NULL,
  `nov` int(2) DEFAULT NULL,
  `dez` int(2) DEFAULT NULL,
  `idinstituicao` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idano`),
  KEY `fk_idinstituicao` (`idinstituicao`),
  CONSTRAINT `dias_funcionamento_ibfk_1` FOREIGN KEY (`idinstituicao`) REFERENCES `instituicao` (`idinstituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-10 19:13:57
