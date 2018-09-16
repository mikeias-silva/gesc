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
-- Table structure for table `publicoprioritario`
--

DROP TABLE IF EXISTS `publicoprioritario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicoprioritario` (
  `idpublicoprioritario` int(10) NOT NULL AUTO_INCREMENT,
  `publicoprioritario` varchar(100) NOT NULL,
  PRIMARY KEY (`idpublicoprioritario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicoprioritario`
--

LOCK TABLES `publicoprioritario` WRITE;
/*!40000 ALTER TABLE `publicoprioritario` DISABLE KEYS */;
INSERT INTO `publicoprioritario` VALUES (1,'Nenhum'),(2,'1 - Em situação de isolamento'),(3,'2 - Trabalho infantil'),(4,'3 - Vivência de violência e/ou negligência'),(5,'4 - Fora da escola ou com defasagem escolar superior a 2 anos'),(6,'5 - Em situação de acolhimento'),(7,'6 - Em cumprimento de medida socioeducativa em meio aberto'),(8,'7 - Egressos de medidas socioeducativas'),(9,'8 - Situação de abuso e/ou exploração  sexual'),(10,'9 - Com medidas de proteção do ECA'),(11,'10 - Crianças e adolescentes em situação de rua'),(12,'11 - Vulnerabilidade que diz respeito às pessoas com deficiência');
/*!40000 ALTER TABLE `publicoprioritario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-16 12:32:15
