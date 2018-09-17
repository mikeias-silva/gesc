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
-- Temporary table structure for view `dadosresponsavel`
--

DROP TABLE IF EXISTS `dadosresponsavel`;
/*!50001 DROP VIEW IF EXISTS `dadosresponsavel`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `dadosresponsavel` AS SELECT 
 1 AS `idpessoa`,
 1 AS `idresponsavel`,
 1 AS `nomeresponsavel`,
 1 AS `nascimentoresponsavel`,
 1 AS `logradouro`,
 1 AS `bairro`,
 1 AS `ncasa`,
 1 AS `complementoendereco`,
 1 AS `cep`,
 1 AS `cpfresponsavel`,
 1 AS `rgresposnavel`,
 1 AS `sexoresponsavel`,
 1 AS `emissorresponsavel`,
 1 AS `outrasobs`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `dadosfamilia`
--

DROP TABLE IF EXISTS `dadosfamilia`;
/*!50001 DROP VIEW IF EXISTS `dadosfamilia`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `dadosfamilia` AS SELECT 
 1 AS `idfamilia`,
 1 AS `arearisco`,
 1 AS `bolsafamilia`,
 1 AS `moradia`,
 1 AS `numnis`,
 1 AS `tipohabitacao`,
 1 AS `beneficiopc`,
 1 AS `nomecras`,
 1 AS `idcras`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `dadoscrianca2`
--

DROP TABLE IF EXISTS `dadoscrianca2`;
/*!50001 DROP VIEW IF EXISTS `dadoscrianca2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `dadoscrianca2` AS SELECT 
 1 AS `idcrianca`,
 1 AS `nomecrianca`,
 1 AS `nascimentocrianca`,
 1 AS `logradouro`,
 1 AS `bairro`,
 1 AS `ncasa`,
 1 AS `complementoendereco`,
 1 AS `cep`,
 1 AS `cpfcrianca`,
 1 AS `rgcrianca`,
 1 AS `sexocrianca`,
 1 AS `emissorcrianca`,
 1 AS `idmatricula`,
 1 AS `obssaude`,
 1 AS `nomeescola`,
 1 AS `idescola`,
 1 AS `publicoprioritario`,
 1 AS `idpublicoprioritario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `parentes`
--

DROP TABLE IF EXISTS `parentes`;
/*!50001 DROP VIEW IF EXISTS `parentes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `parentes` AS SELECT 
 1 AS `idpessoa`,
 1 AS `nomeresponsavel`,
 1 AS `nascimentoresponsavel`,
 1 AS `cpfresponsavel`,
 1 AS `rgresponsavel`,
 1 AS `emissorresponsavel`,
 1 AS `sexoresponsavel`,
 1 AS `complementoendereco`,
 1 AS `bairro`,
 1 AS `logradouro`,
 1 AS `cep`,
 1 AS `ncasa`,
 1 AS `idresponsavel`,
 1 AS `idcrianca`,
 1 AS `idfamilia`,
 1 AS `estadocivil`,
 1 AS `localtrabalho`,
 1 AS `profissao`,
 1 AS `escolaridade`,
 1 AS `telefone`,
 1 AS `telefone2`,
 1 AS `outrasobs`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `nomeidadematricula`
--

DROP TABLE IF EXISTS `nomeidadematricula`;
/*!50001 DROP VIEW IF EXISTS `nomeidadematricula`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `nomeidadematricula` AS SELECT 
 1 AS `nomepessoa`,
 1 AS `datanascimento`,
 1 AS `idmatricula`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `dadoscrianca`
--

DROP TABLE IF EXISTS `dadoscrianca`;
/*!50001 DROP VIEW IF EXISTS `dadoscrianca`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `dadoscrianca` AS SELECT 
 1 AS `idpessoa`,
 1 AS `idcrianca`,
 1 AS `nomecrianca`,
 1 AS `nascimentocrianca`,
 1 AS `logradouro`,
 1 AS `bairro`,
 1 AS `ncasa`,
 1 AS `complementoendereco`,
 1 AS `cep`,
 1 AS `cpfcrianca`,
 1 AS `rgcrianca`,
 1 AS `sexocrianca`,
 1 AS `emissorcrianca`,
 1 AS `idmatricula`,
 1 AS `obssaude`,
 1 AS `nomeescola`,
 1 AS `idescola`,
 1 AS `publicoprioritario`,
 1 AS `idpublicoprioritario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `identificacao`
--

DROP TABLE IF EXISTS `identificacao`;
/*!50001 DROP VIEW IF EXISTS `identificacao`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `identificacao` AS SELECT 
 1 AS `nomeresponsavel1`,
 1 AS `nascimentoresponsavel1`,
 1 AS `cpfresponsavel1`,
 1 AS `rgresponsavel1`,
 1 AS `emissorresponsavel1`,
 1 AS `sexoresponsavel1`,
 1 AS `estadocivil`,
 1 AS `escolaridade`,
 1 AS `profissao`,
 1 AS `telefone`,
 1 AS `telefone2`,
 1 AS `localtrabalho`,
 1 AS `idfamilia`,
 1 AS `arearisco`,
 1 AS `beneficiopc`,
 1 AS `bolsafamilia`,
 1 AS `moradia`,
 1 AS `numnis`,
 1 AS `tipohabitacao`,
 1 AS `nomecras`,
 1 AS `idcrianca`,
 1 AS `nomecrianca`,
 1 AS `nascimentocrianca`,
 1 AS `logradouro`,
 1 AS `bairro`,
 1 AS `ncasa`,
 1 AS `complementoendereco`,
 1 AS `cpfcrianca`,
 1 AS `rgcrianca`,
 1 AS `sexocrianca`,
 1 AS `emissorcrianca`,
 1 AS `idmatricula`,
 1 AS `nomeescola`,
 1 AS `grupoconvivencia`,
 1 AS `turno`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vagasdasmatriculas`
--

DROP TABLE IF EXISTS `vagasdasmatriculas`;
/*!50001 DROP VIEW IF EXISTS `vagasdasmatriculas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vagasdasmatriculas` AS SELECT 
 1 AS `idmatricula`,
 1 AS `idvaga`,
 1 AS `anomatricula`,
 1 AS `idcrianca`,
 1 AS `statuscadastro`,
 1 AS `anovaga`,
 1 AS `numvaga`,
 1 AS `idademax`,
 1 AS `idademin`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `dadosmatricula`
--

DROP TABLE IF EXISTS `dadosmatricula`;
/*!50001 DROP VIEW IF EXISTS `dadosmatricula`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `dadosmatricula` AS SELECT 
 1 AS `idmatricula`,
 1 AS `datamatricula`,
 1 AS `serieescolar`,
 1 AS `anomatricula`,
 1 AS `grupoconvivencia`,
 1 AS `idturma`,
 1 AS `idcrianca`,
 1 AS `statuscadastro`,
 1 AS `idvaga`,
 1 AS `anovaga`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `dadosresponsavel`
--

/*!50001 DROP VIEW IF EXISTS `dadosresponsavel`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dadosresponsavel` AS select `pessoa`.`idpessoa` AS `idpessoa`,`responsavel`.`idresponsavel` AS `idresponsavel`,`pessoa`.`nomepessoa` AS `nomeresponsavel`,`pessoa`.`datanascimento` AS `nascimentoresponsavel`,`pessoa`.`logradouro` AS `logradouro`,`pessoa`.`bairro` AS `bairro`,`pessoa`.`ncasa` AS `ncasa`,`pessoa`.`complementoendereco` AS `complementoendereco`,`pessoa`.`cep` AS `cep`,`pessoa`.`cpf` AS `cpfresponsavel`,`pessoa`.`rg` AS `rgresposnavel`,`pessoa`.`sexo` AS `sexoresponsavel`,`pessoa`.`emissorrg` AS `emissorresponsavel`,`responsavel`.`outrasobs` AS `outrasobs` from (`responsavel` join `pessoa`) where (`responsavel`.`idpessoa` = `pessoa`.`idpessoa`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `dadosfamilia`
--

/*!50001 DROP VIEW IF EXISTS `dadosfamilia`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dadosfamilia` AS select `familia`.`idfamilia` AS `idfamilia`,`familia`.`arearisco` AS `arearisco`,`familia`.`bolsafamilia` AS `bolsafamilia`,`familia`.`moradia` AS `moradia`,`familia`.`numnis` AS `numnis`,`familia`.`tipohabitacao` AS `tipohabitacao`,`familia`.`beneficiopc` AS `beneficiopc`,`cras`.`nomecras` AS `nomecras`,`cras`.`idcras` AS `idcras` from (`familia` join `cras`) where (`cras`.`idcras` = `familia`.`idcras`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `dadoscrianca2`
--

/*!50001 DROP VIEW IF EXISTS `dadoscrianca2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dadoscrianca2` AS select `crianca`.`idcrianca` AS `idcrianca`,`pessoa`.`nomepessoa` AS `nomecrianca`,`pessoa`.`datanascimento` AS `nascimentocrianca`,`pessoa`.`logradouro` AS `logradouro`,`pessoa`.`bairro` AS `bairro`,`pessoa`.`ncasa` AS `ncasa`,`pessoa`.`complementoendereco` AS `complementoendereco`,`pessoa`.`cep` AS `cep`,`pessoa`.`cpf` AS `cpfcrianca`,`pessoa`.`rg` AS `rgcrianca`,`pessoa`.`sexo` AS `sexocrianca`,`pessoa`.`emissorrg` AS `emissorcrianca`,`matriculas`.`idmatricula` AS `idmatricula`,`crianca`.`obssaude` AS `obssaude`,`escola`.`nomeescola` AS `nomeescola`,`escola`.`idescola` AS `idescola`,`publicoprioritario`.`publicoprioritario` AS `publicoprioritario`,`publicoprioritario`.`idpublicoprioritario` AS `idpublicoprioritario` from ((((`matriculas` join `crianca`) join `pessoa`) join `escola`) join `publicoprioritario`) where (((`crianca`.`idcrianca` = `matriculas`.`idcrianca`) and (`crianca`.`idpessoa` = `pessoa`.`idpessoa`)) or (`crianca`.`idpublicoprioritario` = `publicoprioritario`.`idpublicoprioritario`) or (`crianca`.`idescola` = `escola`.`idescola`)) */;
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
/*!50001 VIEW `parentes` AS select `re`.`idpessoa` AS `idpessoa`,`re`.`nomepessoa` AS `nomeresponsavel`,`re`.`datanascimento` AS `nascimentoresponsavel`,`re`.`cpf` AS `cpfresponsavel`,`re`.`rg` AS `rgresponsavel`,`re`.`emissorrg` AS `emissorresponsavel`,`re`.`sexo` AS `sexoresponsavel`,`re`.`complementoendereco` AS `complementoendereco`,`re`.`bairro` AS `bairro`,`re`.`logradouro` AS `logradouro`,`re`.`cep` AS `cep`,`re`.`ncasa` AS `ncasa`,`parentesco`.`idresponsavel` AS `idresponsavel`,`parentesco`.`idcrianca` AS `idcrianca`,`responsavel`.`idfamilia` AS `idfamilia`,`responsavel`.`estadocivil` AS `estadocivil`,`responsavel`.`localtrabalho` AS `localtrabalho`,`responsavel`.`profissao` AS `profissao`,`responsavel`.`escolaridade` AS `escolaridade`,`responsavel`.`telefone` AS `telefone`,`responsavel`.`telefone2` AS `telefone2`,`responsavel`.`outrasobs` AS `outrasobs` from (((((`parentesco` join `pessoa` `re`) join `responsavel`) join `familia`) join `cras`) join `crianca`) where ((`responsavel`.`idpessoa` = `re`.`idpessoa`) and (`parentesco`.`idcrianca` = `crianca`.`idcrianca`) and (`parentesco`.`idresponsavel` = `responsavel`.`idresponsavel`) and (`responsavel`.`idfamilia` = `familia`.`idfamilia`) and (`cras`.`idcras` = `familia`.`idcras`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nomeidadematricula`
--

/*!50001 DROP VIEW IF EXISTS `nomeidadematricula`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nomeidadematricula` AS select `pessoa`.`nomepessoa` AS `nomepessoa`,`pessoa`.`datanascimento` AS `datanascimento`,`matriculas`.`idmatricula` AS `idmatricula` from ((`matriculas` join `crianca`) join `pessoa`) where ((`crianca`.`idcrianca` = `matriculas`.`idcrianca`) and (`crianca`.`idpessoa` = `pessoa`.`idpessoa`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `dadoscrianca`
--

/*!50001 DROP VIEW IF EXISTS `dadoscrianca`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dadoscrianca` AS select `pessoa`.`idpessoa` AS `idpessoa`,`crianca`.`idcrianca` AS `idcrianca`,`pessoa`.`nomepessoa` AS `nomecrianca`,`pessoa`.`datanascimento` AS `nascimentocrianca`,`pessoa`.`logradouro` AS `logradouro`,`pessoa`.`bairro` AS `bairro`,`pessoa`.`ncasa` AS `ncasa`,`pessoa`.`complementoendereco` AS `complementoendereco`,`pessoa`.`cep` AS `cep`,`pessoa`.`cpf` AS `cpfcrianca`,`pessoa`.`rg` AS `rgcrianca`,`pessoa`.`sexo` AS `sexocrianca`,`pessoa`.`emissorrg` AS `emissorcrianca`,`matriculas`.`idmatricula` AS `idmatricula`,`crianca`.`obssaude` AS `obssaude`,`escola`.`nomeescola` AS `nomeescola`,`escola`.`idescola` AS `idescola`,`publicoprioritario`.`publicoprioritario` AS `publicoprioritario`,`publicoprioritario`.`idpublicoprioritario` AS `idpublicoprioritario` from ((((`crianca` join `matriculas`) join `pessoa`) join `escola`) join `publicoprioritario`) where ((`crianca`.`idcrianca` = `matriculas`.`idcrianca`) and (`crianca`.`idpessoa` = `pessoa`.`idpessoa`) and (`crianca`.`idescola` = `escola`.`idescola`) and (`crianca`.`idpublicoprioritario` = `publicoprioritario`.`idpublicoprioritario`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `identificacao`
--

/*!50001 DROP VIEW IF EXISTS `identificacao`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `identificacao` AS select `pre1`.`nomepessoa` AS `nomeresponsavel1`,`pre1`.`datanascimento` AS `nascimentoresponsavel1`,`pre1`.`cpf` AS `cpfresponsavel1`,`pre1`.`rg` AS `rgresponsavel1`,`pre1`.`emissorrg` AS `emissorresponsavel1`,`pre1`.`sexo` AS `sexoresponsavel1`,`resp1`.`estadocivil` AS `estadocivil`,`resp1`.`escolaridade` AS `escolaridade`,`resp1`.`profissao` AS `profissao`,`resp1`.`telefone` AS `telefone`,`resp1`.`telefone2` AS `telefone2`,`resp1`.`localtrabalho` AS `localtrabalho`,`resp1`.`idfamilia` AS `idfamilia`,`familia`.`arearisco` AS `arearisco`,`familia`.`beneficiopc` AS `beneficiopc`,`familia`.`bolsafamilia` AS `bolsafamilia`,`familia`.`moradia` AS `moradia`,`familia`.`numnis` AS `numnis`,`familia`.`tipohabitacao` AS `tipohabitacao`,`cras`.`nomecras` AS `nomecras`,`crianca`.`idcrianca` AS `idcrianca`,`cr`.`nomepessoa` AS `nomecrianca`,`cr`.`datanascimento` AS `nascimentocrianca`,`cr`.`logradouro` AS `logradouro`,`cr`.`bairro` AS `bairro`,`cr`.`ncasa` AS `ncasa`,`cr`.`complementoendereco` AS `complementoendereco`,`cr`.`cpf` AS `cpfcrianca`,`cr`.`rg` AS `rgcrianca`,`cr`.`sexo` AS `sexocrianca`,`cr`.`emissorrg` AS `emissorcrianca`,`matriculas`.`idmatricula` AS `idmatricula`,`escola`.`nomeescola` AS `nomeescola`,`turma`.`grupoconvivencia` AS `grupoconvivencia`,`turma`.`turno` AS `turno` from ((((((((`responsavel` `resp1` join `pessoa` `cr`) join `pessoa` `pre1`) join `escola`) join `familia`) join `cras`) join `crianca`) join `matriculas`) join `turma`) where ((`resp1`.`idpessoa` = `pre1`.`idpessoa`) and (`resp1`.`idfamilia` = `familia`.`idfamilia`) and (`crianca`.`idpessoa` = `cr`.`idpessoa`) and (`matriculas`.`idturma` = `turma`.`idturma`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vagasdasmatriculas`
--

/*!50001 DROP VIEW IF EXISTS `vagasdasmatriculas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vagasdasmatriculas` AS select `matriculas`.`idmatricula` AS `idmatricula`,`vagas`.`idvaga` AS `idvaga`,`matriculas`.`anomatricula` AS `anomatricula`,`matriculas`.`idcrianca` AS `idcrianca`,`matriculas`.`statuscadastro` AS `statuscadastro`,`vagas`.`anovaga` AS `anovaga`,`vagas`.`numvaga` AS `numvaga`,`vagas`.`idademax` AS `idademax`,`vagas`.`idademin` AS `idademin` from ((`matriculas` join `vagas`) join `crianca`) where ((`matriculas`.`idvaga` = `vagas`.`idvaga`) and (`matriculas`.`idcrianca` = `crianca`.`idcrianca`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `dadosmatricula`
--

/*!50001 DROP VIEW IF EXISTS `dadosmatricula`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dadosmatricula` AS select `matriculas`.`idmatricula` AS `idmatricula`,`matriculas`.`anomatricula` AS `datamatricula`,`matriculas`.`serieescolar` AS `serieescolar`,`matriculas`.`anomatricula` AS `anomatricula`,`turma`.`grupoconvivencia` AS `grupoconvivencia`,`turma`.`idturma` AS `idturma`,`matriculas`.`idcrianca` AS `idcrianca`,`matriculas`.`statuscadastro` AS `statuscadastro`,`vagas`.`idvaga` AS `idvaga`,`vagas`.`anovaga` AS `anovaga` from (((`matriculas` join `crianca`) join `turma`) join `vagas`) where ((`matriculas`.`idcrianca` = `crianca`.`idcrianca`) and (`matriculas`.`idturma` = `turma`.`idturma`) and (`matriculas`.`idvaga` = `vagas`.`idvaga`)) */;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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

-- Dump completed on 2018-09-16 12:32:16
