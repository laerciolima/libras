CREATE DATABASE  IF NOT EXISTS `libras` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `libras`;
-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: libras
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `amizade`
--

DROP TABLE IF EXISTS `amizade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amizade` (
  `fk_id_usuario1` bigint(20) NOT NULL,
  `fk_id_usuario2` bigint(20) NOT NULL,
  `data` date DEFAULT NULL,
  `pendente` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fk_id_usuario1`,`fk_id_usuario2`),
  KEY `fk_amizade_2_idx` (`fk_id_usuario2`),
  CONSTRAINT `fk_amizade_1` FOREIGN KEY (`fk_id_usuario1`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_amizade_2` FOREIGN KEY (`fk_id_usuario2`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amizade`
--

LOCK TABLES `amizade` WRITE;
/*!40000 ALTER TABLE `amizade` DISABLE KEYS */;
INSERT INTO `amizade` VALUES (1,2,'2016-09-04',0);
/*!40000 ALTER TABLE `amizade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `fk_id_modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade_sinal`
--

DROP TABLE IF EXISTS `atividade_sinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade_sinal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_atividade` int(11) DEFAULT NULL,
  `fk_id_sinal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade_sinal`
--

LOCK TABLES `atividade_sinal` WRITE;
/*!40000 ALTER TABLE `atividade_sinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade_sinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `nota_configuracao_de_mao` float NOT NULL,
  `nota_expressao_facial` float NOT NULL,
  `nota_media` float NOT NULL,
  `nota_movimento` float NOT NULL,
  `nota_orientacao` float NOT NULL,
  `nota_ponto_articulacao` float NOT NULL,
  `fk_id_gravacao` bigint(20) DEFAULT NULL,
  `fk_id_usuario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK2xgbif9g4i9tlof40w4tnybrv` (`fk_id_gravacao`),
  KEY `FKbtyrfv47brffd6ettv6ax8moj` (`fk_id_usuario`),
  CONSTRAINT `FK2xgbif9g4i9tlof40w4tnybrv` FOREIGN KEY (`fk_id_gravacao`) REFERENCES `gravacao` (`id`),
  CONSTRAINT `FKbtyrfv47brffd6ettv6ax8moj` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `fk_id_modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_idx` (`fk_id_modulo`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`fk_id_modulo`) REFERENCES `modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Objetos escolares','sinais de objetos escolares','',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprovante`
--

DROP TABLE IF EXISTS `comprovante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprovante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprovante`
--

LOCK TABLES `comprovante` WRITE;
/*!40000 ALTER TABLE `comprovante` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprovante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracao_de_mao`
--

DROP TABLE IF EXISTS `configuracao_de_mao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracao_de_mao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracao_de_mao`
--

LOCK TABLES `configuracao_de_mao` WRITE;
/*!40000 ALTER TABLE `configuracao_de_mao` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracao_de_mao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracao_de_mao_sinal`
--

DROP TABLE IF EXISTS `configuracao_de_mao_sinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracao_de_mao_sinal` (
  `fk_id_sinal` bigint(20) NOT NULL,
  `fk_id_configuracao_de_mao` bigint(20) NOT NULL,
  KEY `fk_id_sinal` (`fk_id_sinal`),
  KEY `fk_id_configuracao_de_mao` (`fk_id_configuracao_de_mao`),
  CONSTRAINT `fk_id_configuracao_de_mao` FOREIGN KEY (`fk_id_configuracao_de_mao`) REFERENCES `configuracao_de_mao` (`id`),
  CONSTRAINT `fk_id_sinal` FOREIGN KEY (`fk_id_sinal`) REFERENCES `sinal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracao_de_mao_sinal`
--

LOCK TABLES `configuracao_de_mao_sinal` WRITE;
/*!40000 ALTER TABLE `configuracao_de_mao_sinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracao_de_mao_sinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expressao_facial`
--

DROP TABLE IF EXISTS `expressao_facial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expressao_facial` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expressao_facial`
--

LOCK TABLES `expressao_facial` WRITE;
/*!40000 ALTER TABLE `expressao_facial` DISABLE KEYS */;
/*!40000 ALTER TABLE `expressao_facial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gravacao`
--

DROP TABLE IF EXISTS `gravacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gravacao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fk_id_sinal` bigint(20) DEFAULT NULL,
  `fk_id_usuario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK4y4g80yljinxbgbsyjge6fa22` (`fk_id_sinal`),
  KEY `FKo3f7nqj7w7aydkgvu8py80vxh` (`fk_id_usuario`),
  CONSTRAINT `FK4y4g80yljinxbgbsyjge6fa22` FOREIGN KEY (`fk_id_sinal`) REFERENCES `sinal` (`id`),
  CONSTRAINT `FKo3f7nqj7w7aydkgvu8py80vxh` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gravacao`
--

LOCK TABLES `gravacao` WRITE;
/*!40000 ALTER TABLE `gravacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `gravacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Modulo 1','Modulo inicial do curso de libras',1),(2,'Modulo 2','Segundo modulo de curso de libras ',2);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimento`
--

DROP TABLE IF EXISTS `movimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimento`
--

LOCK TABLES `movimento` WRITE;
/*!40000 ALTER TABLE `movimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimento_sinal`
--

DROP TABLE IF EXISTS `movimento_sinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimento_sinal` (
  `fk_id_sinal` bigint(20) NOT NULL,
  `fk_id_movimento` bigint(20) NOT NULL,
  KEY `fk_movimento_sinal_2_idx` (`fk_id_movimento`),
  KEY `fk_movimento_sinal_1` (`fk_id_sinal`),
  CONSTRAINT `fk_movimento_sinal_1` FOREIGN KEY (`fk_id_sinal`) REFERENCES `sinal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimento_sinal_2` FOREIGN KEY (`fk_id_movimento`) REFERENCES `movimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimento_sinal`
--

LOCK TABLES `movimento_sinal` WRITE;
/*!40000 ALTER TABLE `movimento_sinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimento_sinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ponto_de_articulacao`
--

DROP TABLE IF EXISTS `ponto_de_articulacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ponto_de_articulacao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ponto_de_articulacao`
--

LOCK TABLES `ponto_de_articulacao` WRITE;
/*!40000 ALTER TABLE `ponto_de_articulacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `ponto_de_articulacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ponto_de_articulacao_sinal`
--

DROP TABLE IF EXISTS `ponto_de_articulacao_sinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ponto_de_articulacao_sinal` (
  `fk_id_sinal` bigint(20) NOT NULL,
  `fk_id_ponto_de_articulacao` bigint(20) NOT NULL,
  KEY `FKpocv13pt8ldvwukk4hujlawsw` (`fk_id_ponto_de_articulacao`),
  KEY `FK8dtipjve8hyqpwaumxuf16tmb` (`fk_id_sinal`),
  CONSTRAINT `FK8dtipjve8hyqpwaumxuf16tmb` FOREIGN KEY (`fk_id_sinal`) REFERENCES `sinal` (`id`),
  CONSTRAINT `FKpocv13pt8ldvwukk4hujlawsw` FOREIGN KEY (`fk_id_ponto_de_articulacao`) REFERENCES `ponto_de_articulacao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ponto_de_articulacao_sinal`
--

LOCK TABLES `ponto_de_articulacao_sinal` WRITE;
/*!40000 ALTER TABLE `ponto_de_articulacao_sinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `ponto_de_articulacao_sinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ranking`
--

DROP TABLE IF EXISTS `ranking`;
/*!50001 DROP VIEW IF EXISTS `ranking`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `ranking` AS SELECT 
 1 AS `id`,
 1 AS `email`,
 1 AS `nome`,
 1 AS `perfil`,
 1 AS `senha`,
 1 AS `usuario`,
 1 AS `nivel`,
 1 AS `pontuacao`,
 1 AS `imagem`,
 1 AS `status`,
 1 AS `url`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sinal`
--

DROP TABLE IF EXISTS `sinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sinal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_id_categoria` int(11) DEFAULT NULL,
  `dificuldade` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `orientacao` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fk_id_expressao_facial` bigint(20) DEFAULT NULL,
  `fk_id_ponto_de_articulacao` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKi9e3itky8jwl4qc2tfjjo4fk7` (`fk_id_expressao_facial`),
  KEY `FKldln178n6a4e3uknphcilafdh` (`fk_id_ponto_de_articulacao`),
  CONSTRAINT `FKi9e3itky8jwl4qc2tfjjo4fk7` FOREIGN KEY (`fk_id_expressao_facial`) REFERENCES `expressao_facial` (`id`),
  CONSTRAINT `FKldln178n6a4e3uknphcilafdh` FOREIGN KEY (`fk_id_ponto_de_articulacao`) REFERENCES `ponto_de_articulacao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinal`
--

LOCK TABLES `sinal` WRITE;
/*!40000 ALTER TABLE `sinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `sinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `perfil` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1',
  `pontuacao` int(11) NOT NULL DEFAULT '0',
  `imagem` varchar(155) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'','Marcos Junior','comum','','marcos',10,251,'lucas.jpg',1,NULL),(2,'laercio.lima@gmail.com','Gato chorÃ£o','comum','202cb962ac59075b964b07152d234b70','laercio',10,250,'c8d04ccc819dec8b79d7b7a7edee2a44.jpg',1,NULL),(3,'llaercio.lima@gmail.com','lucas','comum','202cb962ac59075b964b07152d234b70','lucas',1,0,'lucas.jpg',1,NULL),(4,'joao@mail.com','Joao Augusto','comum','202cb962ac59075b964b07152d234b70','joao',1,0,'joao.jpg',1,'537680438c473a778857de861b88c50e'),(5,'mateus@mail.com','Mateus Ferreira','comum','202cb962ac59075b964b07152d234b70','mateus',1,0,'mateus.jpg',1,'540b803563a1c9ebc7868b80f4d286bc'),(6,'fernanda@mail.com','Maria Fernanda','comum','202cb962ac59075b964b07152d234b70','fernanda',1,0,'fernanda.jpg',1,'13ac3b141e3354b2d49922db0c0b413d'),(7,'eunice@mail.com','Eunice Cardoso','comum','202cb962ac59075b964b07152d234b70','eunice',1,0,'1.jpg',1,'c9a63150bce2673d563ee2fe005035e6'),(8,'maria@mail.com','Maria Julia','comum','202cb962ac59075b964b07152d234b70','maria',1,0,'2.jpg',1,'6209112ed494aa9cf016e0482cec9d24'),(9,'rafaela@mail.com','Rafaela Campos','comum','202cb962ac59075b964b07152d234b70','rafaela',1,0,'3.jpg',1,'c909da7a7f46937c0ffbb4c8b36590d7'),(10,'marta@mail.com','Marta Helena','comum','202cb962ac59075b964b07152d234b70','marta',1,0,'4.jpg',1,'4aed5f0f2064be324c49677ac4e9af20'),(11,'talita@mail.com','Talita Fernandes','comum','202cb962ac59075b964b07152d234b70','talita',1,0,'5.jpg',1,'ad40af8af4d6344ca2dbcd8b7523b925'),(12,'romario@mail.com','Romario Vieira','comum','202cb962ac59075b964b07152d234b70','romario',1,0,'6.jpg',1,'c36ae9a4e962157a3385e34f9c5ac6dd'),(13,'italo@mail.com','Italo FranÃ§a','comum','202cb962ac59075b964b07152d234b70','italo',1,0,'7.jpg',1,'f1f3757828950d70481de64e1f16a86c'),(14,'paulo@mail.com','Paulo Roberto','comum','202cb962ac59075b964b07152d234b70','paulo',1,0,'8.jpg',1,'3fb25283a62013267e6e8fcbfd169d40');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `ranking`
--

/*!50001 DROP VIEW IF EXISTS `ranking`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ranking` AS select `usuario`.`id` AS `id`,`usuario`.`email` AS `email`,`usuario`.`nome` AS `nome`,`usuario`.`perfil` AS `perfil`,`usuario`.`senha` AS `senha`,`usuario`.`usuario` AS `usuario`,`usuario`.`nivel` AS `nivel`,`usuario`.`pontuacao` AS `pontuacao`,`usuario`.`imagem` AS `imagem`,`usuario`.`status` AS `status`,`usuario`.`url` AS `url` from `usuario` where (`usuario`.`perfil` = 'comum') order by `usuario`.`nivel`,`usuario`.`pontuacao` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-25 11:15:54
