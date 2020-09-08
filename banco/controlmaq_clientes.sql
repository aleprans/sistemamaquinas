-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: controlmaq
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'ALEXANDRE PRANSKUNAS','RUA ANTONIO GEREMIAS DE JESUS','10','ITATINGA','SÃO SEBASTIÃO','SP','(12)99187-9562'),(29,'ANA PAULA DOS SANTOS','RUA ANTONIO GEREMIAS DE JESUS','55','ITATINGA','SÃO SEBASTIÃO','SP','(12)99202-9308'),(30,'ADMINISTRADOR','','','','','','');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 17:54:02
