-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: main
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `director`
--

DROP TABLE IF EXISTS `director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `director` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videojuego_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1E90D3F082925A85` (`videojuego_id`),
  CONSTRAINT `FK_1E90D3F082925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director`
--

LOCK TABLES `director` WRITE;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` VALUES (1,'Cory Barlog',5),(2,'Mathijs de Jonge',6),(3,'Hidetaka Miyazaki',7),(4,'William Pellen',8),(5,'Tatsuya Kamiyama',9),(6,'Colas Koola',10),(7,'Eric Williams',5),(8,'Shinya Kumazaki',9),(9,'Vivien Mermet-Guyenet',10);
/*!40000 ALTER TABLE `director` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20221114092455','2022-11-14 10:25:14',172),('DoctrineMigrations\\Version20221114093717','2022-11-14 10:37:40',220),('DoctrineMigrations\\Version20221114095004','2022-11-14 10:50:26',142),('DoctrineMigrations\\Version20221114123808','2022-11-14 13:38:42',383),('DoctrineMigrations\\Version20221115131709','2022-11-15 14:17:31',427),('DoctrineMigrations\\Version20221115132027','2022-11-15 14:20:34',126),('DoctrineMigrations\\Version20221116072747','2022-11-16 08:28:11',242),('DoctrineMigrations\\Version20221116085415','2022-11-16 09:54:30',273),('DoctrineMigrations\\Version20221117073737','2022-11-17 08:37:54',808),('DoctrineMigrations\\Version20221118074742','2022-11-18 08:48:06',849),('DoctrineMigrations\\Version20221118081018','2022-11-18 09:10:55',242),('DoctrineMigrations\\Version20221118094316','2022-11-18 10:43:22',542),('DoctrineMigrations\\Version20221118095103','2022-11-18 10:51:33',342),('DoctrineMigrations\\Version20221118095404','2022-11-18 10:54:07',476),('DoctrineMigrations\\Version20221118102757','2022-11-18 11:28:05',369),('DoctrineMigrations\\Version20221118121338','2022-11-18 13:13:47',606),('DoctrineMigrations\\Version20221118125200','2022-11-18 13:52:16',804),('DoctrineMigrations\\Version20221121074117','2022-11-21 08:41:40',498),('DoctrineMigrations\\Version20221121075142','2022-11-21 08:51:56',573),('DoctrineMigrations\\Version20221121090053','2022-11-21 10:01:36',241),('DoctrineMigrations\\Version20221121090644','2022-11-21 10:07:33',646),('DoctrineMigrations\\Version20221121091424','2022-11-21 10:14:48',235),('DoctrineMigrations\\Version20221121091832','2022-11-21 10:19:43',498),('DoctrineMigrations\\Version20221121094644','2022-11-21 10:48:05',900),('DoctrineMigrations\\Version20221121100713','2022-11-21 11:07:42',278),('DoctrineMigrations\\Version20221121102905','2022-11-21 11:29:14',1180),('DoctrineMigrations\\Version20221121103521','2022-11-21 11:37:15',609),('DoctrineMigrations\\Version20221121104039','2022-11-21 11:41:02',552),('DoctrineMigrations\\Version20221121104846','2022-11-21 11:51:31',460),('DoctrineMigrations\\Version20221121113759','2022-11-21 12:38:04',473),('DoctrineMigrations\\Version20221122073039','2022-11-22 08:31:37',434),('DoctrineMigrations\\Version20221122073702','2022-11-22 08:37:07',182),('DoctrineMigrations\\Version20221122075454','2022-11-22 08:55:46',174),('DoctrineMigrations\\Version20221122080414','2022-11-22 09:04:23',569),('DoctrineMigrations\\Version20221122084903','2022-11-22 09:49:35',315),('DoctrineMigrations\\Version20221122085328','2022-11-22 09:54:10',594),('DoctrineMigrations\\Version20221122100319','2022-11-22 11:04:30',163),('DoctrineMigrations\\Version20221123073247','2022-11-23 08:33:32',263),('DoctrineMigrations\\Version20221123073539','2022-11-23 08:35:57',425),('DoctrineMigrations\\Version20221125093523','2022-11-25 10:36:02',342),('DoctrineMigrations\\Version20221129081431','2022-11-29 09:14:48',199),('DoctrineMigrations\\Version20221129084936','2022-11-29 09:49:59',171),('DoctrineMigrations\\Version20221129085257','2022-11-29 09:53:03',283),('DoctrineMigrations\\Version20221129090739','2022-11-29 10:08:12',218),('DoctrineMigrations\\Version20221129091058','2022-11-29 10:11:31',435),('DoctrineMigrations\\Version20221129092615','2022-11-29 10:26:33',417),('DoctrineMigrations\\Version20221129095237','2022-11-29 10:52:57',468),('DoctrineMigrations\\Version20221129115407','2022-11-29 12:54:30',323),('DoctrineMigrations\\Version20221129115647','2022-11-29 12:57:07',207),('DoctrineMigrations\\Version20221129121216','2022-11-29 13:13:20',553);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_desarrolladora`
--

DROP TABLE IF EXISTS `empresa_desarrolladora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa_desarrolladora` (
  `id` int NOT NULL AUTO_INCREMENT,
  `videojuego_id` int DEFAULT NULL,
  `desarrolladora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F616848482925A85` (`videojuego_id`),
  CONSTRAINT `FK_F616848482925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_desarrolladora`
--

LOCK TABLES `empresa_desarrolladora` WRITE;
/*!40000 ALTER TABLE `empresa_desarrolladora` DISABLE KEYS */;
INSERT INTO `empresa_desarrolladora` VALUES (1,5,'Santa Monica Studios'),(2,6,'Guerrilla Games'),(3,7,'FromSoftware'),(4,8,'Team Cherry'),(5,9,'Hal Laboratory'),(6,10,'BlueTwelve Studio');
/*!40000 ALTER TABLE `empresa_desarrolladora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `videojuego_id` int DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A000883A82925A85` (`videojuego_id`),
  CONSTRAINT `FK_A000883A82925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,5,'Accion'),(2,5,'Aventura'),(3,6,'Accion'),(4,6,'Aventura'),(5,6,'Rol'),(6,7,'Accion'),(7,7,'Rol'),(8,8,'Metroidvania'),(9,9,'Plataformas'),(10,10,'Aventura');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_juegos`
--

DROP TABLE IF EXISTS `lista_juegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lista_juegos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `videojuego_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F6AD149BDB38439E` (`usuario_id`),
  KEY `IDX_F6AD149B82925A85` (`videojuego_id`),
  CONSTRAINT `FK_F6AD149B82925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`),
  CONSTRAINT `FK_F6AD149BDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_juegos`
--

LOCK TABLES `lista_juegos` WRITE;
/*!40000 ALTER TABLE `lista_juegos` DISABLE KEYS */;
INSERT INTO `lista_juegos` VALUES (4,'Eso si que no me lo esperaba',86,5),(5,'Muy bonito todo',86,6),(6,NULL,86,7),(8,'esto es un comentario',96,5),(9,'como mola',97,5);
/*!40000 ALTER TABLE `lista_juegos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `contra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (86,'jaime','[]','$2y$13$s5EBgiWPb7f49onmjsQCfOVt3bWMgKKGMj5uOrCIuMDeXzD6oA8sy'),(87,'miguel','[]','$2y$13$MVHcJ4Yzg2uwM1JCTq1W.ezb9RT5IHmZUZwlMWfoyI1Px3SqQXRGm'),(95,'admin','[\"ROLE_ADMIN\"]','$2y$10$PK404kz8bOkITUWea4Iru./fmWfQEPWVK7T20JkvVkIhcBaVIcOJu'),(96,'daniel','[]','$2y$10$IEEmTOqw2d23nI.vsmtiPeytfzjLMHPovRsna9JB7G36GtsotlLNC'),(97,'javier','[]','$2y$10$I2vXVTPj5avAejY9WT7quO/JoifVJ3JlPCS4uZSpyNK0NNdUHOpvq');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego`
--

DROP TABLE IF EXISTS `videojuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuego` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_publicacion` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego`
--

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES (5,'God Of War: Ragnarok','2022',NULL),(6,'Horizon Forbiden West','2022',NULL),(7,'Elden Ring','2022',NULL),(8,'Hollow Knight','2017',NULL),(9,'Kirby and the Forgotten Land','2022',NULL),(10,'Stray','2022',NULL);
/*!40000 ALTER TABLE `videojuego` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-30 14:52:00
