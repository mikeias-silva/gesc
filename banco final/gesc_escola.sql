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
-- Table structure for table `escola`
--

DROP TABLE IF EXISTS `escola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escola` (
  `idescola` int(10) NOT NULL AUTO_INCREMENT,
  `nomeescola` varchar(255) NOT NULL,
  PRIMARY KEY (`idescola`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escola`
--

LOCK TABLES `escola` WRITE;
/*!40000 ALTER TABLE `escola` DISABLE KEYS */;
INSERT INTO `escola` VALUES (1,'Sem escola'),(2,'Escola Municipal Rubens'),(3,'Escola Estadual Drº Epaminondas'),(4,'Escola Estadual Pres. Kennedy'),(5,'Escola Municipal São Jorge'),(6,'Colégio Estadual 31 de Março'),(7,'Colégio Estadual Alberto Rebello Valente'),(8,'Colégio Estadual Professor Amálio Pinheiro'),(9,'Colégio Estadual Ana Divanir Borato'),(10,'Colégio Estadual General Antônio Sampaio'),(11,'Colégio Estadual Padre Arnaldo Jansen'),(12,'Colégio Agrícola Estadual Augusto Ribas'),(13,'Colégio Estadual Professor Becker E Silva'),(14,'Colégio Estadual Maestro Bento Mussurunga'),(15,'Escola Estadual do Campo Brasílio Antunes da Silva'),(16,'Colégio Estadual Padre Carlos Zelesny'),(17,'Centro Estadual de Educação Básica de Jovens e Adultos Professor Odair Pasqualini'),(18,'Centro Estadual de Educação Básica de Jovens e Adultos Professor Paschoal Salles Rosa'),(19,'Centro Estadual de Educação Básica de Jovens e Adultos da Universidade Estadual de Ponta Grossa'),(20,'Centro Estadual de Educação Profissional de Ponta Grossa'),(21,'Colégio Estadual Professor Colares'),(22,'Colégio Estadual Colônia Dona Luiza'),(23,'Colégio Estadual Senador Correia'),(24,'Escola Estadual do Campo de Vila Velha'),(25,'Colégio Estadual Dorah Gomes Daitschman'),(26,'Colégio Estadual Frei Doroteu de Pádua'),(27,'Colégio Estadual Professor Edison Pietrobelli'),(28,'Colégio Estadual Professora Elzira Correia de Sá'),(29,'Colégio Estadual Doutor Epaminondas Novaes Ribas'),(30,'Escola Modalidade Educação Especial Esperança'),(31,'Colégio Estadual Espírito Santo'),(32,'Colégio Estadual Professor Eugênio Malanski'),(33,'Colégio Estadual Francisco Pires Machado'),(34,'Centro Pontagrossense de Reabilitação Auditiva e da Fala Geny de Jesus S Ribas'),(35,'Colégio Estadual Professora Hália Terezinha Gruba'),(36,'Instituto de Educação Professor Cesár Prieto Martinez'),(37,'Instituição Educação Especial Nova Visão'),(38,'Instituição Especial Professora Raquel S M'),(39,'Escola Estadual Professor Iolando Taques Fonseca'),(40,'Escola Estadual Jesus Divino Operário'),(41,'Colégio Estadual Professor João Ricardo Von Borell du Vernay'),(42,'Colégio Estadual José Elias da Rocha'),(43,'Colégio Estadual Professor José Gomes do Amaral'),(44,'Colégio Estadual Professor Júlio Teodorico'),(45,'Colégio Estadual Presidente Kennedy'),(46,'Colégio Estadual Professora Linda Salamuni Bacila'),(47,'Colégio Estadual Professora Margarete Márcia Mazur'),(48,'Escola Modalidade Educação Especial Professora Maria de Lourdes Canziani'),(49,'Escola Modalidade Educação Especial Maria Dolores'),(50,'Escola Estadual Medalha Milagrosa'),(51,'Colégio Estadual Professor Meneleu de Almeida Torres'),(52,'Escola Estadual Monteiro Lobato'),(53,'Colégio Estadual do Campo Doutor Munhoz da Rocha'),(54,'Escola Modalidade Educação Especial Noly Zander'),(55,'Colégio Estadual Nossa Senhora da Glória'),(56,'Colégio Estadual Nossa Senhora das Graças'),(57,'Colégio Estadual General Osório'),(58,'Colégio Estadual Padre Pedro Grzelczaki'),(59,'Colégio Estadual Polivalente'),(60,'Colégio Estadual Regente Feijó'),(61,'Escola Modalidade Educação Especial Professora Rosa Maria Bueno'),(62,'Colégio Estadual Santa Maria'),(63,'Colégio Estadual Professora Sirley Jagas'),(64,'Escola Modalidade Educação Especial Zilda Arns');
/*!40000 ALTER TABLE `escola` ENABLE KEYS */;
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
