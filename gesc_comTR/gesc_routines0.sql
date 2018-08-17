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
-- Temporary table structure for view `p`
--

DROP TABLE IF EXISTS `p`;
/*!50001 DROP VIEW IF EXISTS `p`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `p` AS SELECT 
 1 AS `nomeresponsavel`,
 1 AS `nomecrianca`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `parentes`
--

DROP TABLE IF EXISTS `parentes`;
/*!50001 DROP VIEW IF EXISTS `parentes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `parentes` AS SELECT 
 1 AS `nomeresponsavel`,
 1 AS `nomecrianca`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `mariculas_tumas`
--

DROP TABLE IF EXISTS `mariculas_tumas`;
/*!50001 DROP VIEW IF EXISTS `mariculas_tumas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `mariculas_tumas` AS SELECT 
 1 AS `nomecrianca`,
 1 AS `idmatricula`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `p`
--

/*!50001 DROP VIEW IF EXISTS `p`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `p` AS select `re`.`nomepessoa` AS `nomeresponsavel`,`cr`.`nomepessoa` AS `nomecrianca` from ((`pessoa` `re` join `pessoa` `cr`) join `parentesco` `p`) where ((`p`.`idresponsavel` = `re`.`idpessoa`) and (`p`.`idcrianca` = `cr`.`idpessoa`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `parentes`
--

/*!50001 DROP VIEW IF EXISTS `parentes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `parentes` AS select `re`.`nomepessoa` AS `nomeresponsavel`,`cr`.`nomepessoa` AS `nomecrianca` from ((`pessoa` `re` join `pessoa` `cr`) join `parentesco` `p`) where ((`p`.`idresponsavel` = `re`.`idpessoa`) and (`p`.`idcrianca` = `cr`.`idpessoa`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `mariculas_tumas`
--

/*!50001 DROP VIEW IF EXISTS `mariculas_tumas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `mariculas_tumas` AS select `pessoa`.`nomepessoa` AS `nomecrianca`,`matriculas`.`idmatricula` AS `idmatricula` from ((`matriculas` join `crianca`) join `pessoa`) where ((`crianca`.`idcrianca` = `matriculas`.`idcrianca`) and (`crianca`.`idpessoa` = `pessoa`.`idpessoa`) and (`matriculas`.`idturma` = 1) and (`matriculas`.`statuscadastro` = 1) and (extract(month from `crianca`.`datacadastro`) = 8) and (extract(year from `matriculas`.`anomatricula`) = 2018)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'gesc'
--

--
-- Dumping routines for database 'gesc'
--
/*!50003 DROP FUNCTION IF EXISTS `fn_validacep` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_validacep`(cep varchar(8)) RETURNS tinyint(4)
BEGIN
    if(length(cep) = 8 )then
RETURN true;
else return false;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fn_validaemail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_validaemail`(email varchar(255)) RETURNS tinyint(4)
BEGIN
    if(email rlike '@')then
RETURN true;
else return false;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `validaCPF` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `validaCPF`(`CPF` VARCHAR(11)) RETURNS tinyint(4)
BEGIN 
DECLARE INDICE, SOMA, DIG1, DIG2 INT; 
SET INDICE = 1;  
SET SOMA = 0;  
 
WHILE (INDICE <= 9 )  
DO
SET SOMA = SOMA + CAST(SUBSTRING(CPF,  INDICE,  1)  AS  UNSIGNED) * (11 - INDICE);  
SET INDICE = INDICE + 1; 
END WHILE;  
SET DIG1 = 11 - (SOMA % 11);
 
IF DIG1 > 9 THEN 
SET DIG1 = 0; 
END IF;
 
SET INDICE = 1; 
SET SOMA = 0; 
WHILE (INDICE <= 10)  
DO  
SET SOMA = SOMA + CAST(SUBSTRING(CPF, INDICE, 1) AS UNSIGNED) * (12 - INDICE);  
SET INDICE = INDICE + 1; 
END WHILE; 
SET DIG2 = 11 - (SOMA % 11);  

IF DIG2 > 9 THEN  
SET DIG2 = 0; 
END IF; 

IF ((DIG1 = SUBSTRING(CPF, LENGTH(CPF)-1, 1))AND (DIG2 = SUBSTRING(CPF, LENGTH(CPF), 1) OR (CPF = ''))
AND NOT((CPF = "11111111111") OR (CPF = "22222222222")  
OR (CPF = "33333333333") OR (CPF = "44444444444") OR (CPF = "55555555555")  
OR (CPF = "66666666666") OR (CPF = "77777777777") OR (CPF = "88888888888") 
OR (CPF = "99999999999") OR (CPF = "00000000000"))) THEN  
RETURN TRUE;  
ELSE RETURN FALSE;  
END IF;  
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

-- Dump completed on 2018-08-17 20:57:56
