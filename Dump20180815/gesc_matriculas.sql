-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: gesc
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matriculas` (
  `idmatricula` int(10) NOT NULL AUTO_INCREMENT,
  `datasairespera` datetime NOT NULL,
  `statuscadastro` enum('Ativo','Espera','Inativo') NOT NULL,
  `dataespera` datetime NOT NULL,
  `serieescolar` enum('1º Fundamental','2º Fundamental','3º Fundamental','4º Fundamental','5º Fundamental','6º Fundamental','7º Fundamental','8º Fundamental','9º Fundamental','1º Médio','2º Médio','3º Médio') DEFAULT NULL,
  `anomatricula` date NOT NULL,
  `idturma` int(10) NOT NULL,
  `idvaga` int(10) NOT NULL,
  `idcrianca` int(10) NOT NULL,
  PRIMARY KEY (`idmatricula`),
  KEY `idturma` (`idturma`),
  KEY `idvaga` (`idvaga`),
  KEY `idcrianca` (`idcrianca`),
  CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`),
  CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`idvaga`) REFERENCES `vagas` (`idvaga`),
  CONSTRAINT `matriculas_ibfk_3` FOREIGN KEY (`idcrianca`) REFERENCES `crianca` (`idcrianca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER historico_matricula_dataativacao AFTER INSERT ON matriculas FOR EACH ROW
BEGIN

if((select last_insert_id() from matriculas where statuscadastro = 'ativo') = true) then
begin

	insert into historico_matricula(dataativacao, idmatricula)
    values(now(), 
    (select last_insert_id()
    from matriculas
    where statuscadastro = 'ativo'));
	end;
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER matriculas_datainativacao
 AFTER UPDATE ON matriculas FOR EACH ROW
BEGIN
	
    if((select datainativacao from historico_matricula 
    where datainativacao = null
    and idmatricula = new.idmatricula) = true) then 
    begin
	
		insert into historico_matricula(datainativacao, idmatricula)
		values(datainativacao = now(), 
		(select last_inser_id() from matriculas where statuscadastro = 'inativo'));
    
    end;
    else 
    begin
    
		update historico_matricula set datainativacao = now() 
        where idmatricula = new.idmatricula;
    end;
    end if;
    
    if((select datainativacao from historico_matricula 
    where datainativacao = '%'
    and idmatricula = new.idmatricula) = true) then 
    begin
		insert into historico_matricula(dataativacao, idmatricula)
        values(dataativacao = now(), new.idmatricula);
	end;
    end if;
END */;;
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

-- Dump completed on 2018-08-15  0:06:53
