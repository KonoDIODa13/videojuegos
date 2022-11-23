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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
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
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20221114092455','2022-11-14 10:25:14',172),('DoctrineMigrations\\Version20221114093717','2022-11-14 10:37:40',220),('DoctrineMigrations\\Version20221114095004','2022-11-14 10:50:26',142),('DoctrineMigrations\\Version20221114123808','2022-11-14 13:38:42',383),('DoctrineMigrations\\Version20221115131709','2022-11-15 14:17:31',427),('DoctrineMigrations\\Version20221115132027','2022-11-15 14:20:34',126),('DoctrineMigrations\\Version20221116072747','2022-11-16 08:28:11',242),('DoctrineMigrations\\Version20221116085415','2022-11-16 09:54:30',273),('DoctrineMigrations\\Version20221117073737','2022-11-17 08:37:54',808),('DoctrineMigrations\\Version20221118074742','2022-11-18 08:48:06',849),('DoctrineMigrations\\Version20221118081018','2022-11-18 09:10:55',242),('DoctrineMigrations\\Version20221118094316','2022-11-18 10:43:22',542),('DoctrineMigrations\\Version20221118095103','2022-11-18 10:51:33',342),('DoctrineMigrations\\Version20221118095404','2022-11-18 10:54:07',476),('DoctrineMigrations\\Version20221118102757','2022-11-18 11:28:05',369),('DoctrineMigrations\\Version20221118121338','2022-11-18 13:13:47',606),('DoctrineMigrations\\Version20221118125200','2022-11-18 13:52:16',804),('DoctrineMigrations\\Version20221121074117','2022-11-21 08:41:40',498),('DoctrineMigrations\\Version20221121075142','2022-11-21 08:51:56',573),('DoctrineMigrations\\Version20221121090053','2022-11-21 10:01:36',241),('DoctrineMigrations\\Version20221121090644','2022-11-21 10:07:33',646),('DoctrineMigrations\\Version20221121091424','2022-11-21 10:14:48',235),('DoctrineMigrations\\Version20221121091832','2022-11-21 10:19:43',498),('DoctrineMigrations\\Version20221121094644','2022-11-21 10:48:05',900),('DoctrineMigrations\\Version20221121100713','2022-11-21 11:07:42',278),('DoctrineMigrations\\Version20221121102905','2022-11-21 11:29:14',1180),('DoctrineMigrations\\Version20221121103521','2022-11-21 11:37:15',609),('DoctrineMigrations\\Version20221121104039','2022-11-21 11:41:02',552),('DoctrineMigrations\\Version20221121104846','2022-11-21 11:51:31',460),('DoctrineMigrations\\Version20221121113759','2022-11-21 12:38:04',473),('DoctrineMigrations\\Version20221122073039','2022-11-22 08:31:37',434),('DoctrineMigrations\\Version20221122073702','2022-11-22 08:37:07',182),('DoctrineMigrations\\Version20221122075454','2022-11-22 08:55:46',174),('DoctrineMigrations\\Version20221122080414','2022-11-22 09:04:23',569),('DoctrineMigrations\\Version20221122084903','2022-11-22 09:49:35',315),('DoctrineMigrations\\Version20221122085328','2022-11-22 09:54:10',594),('DoctrineMigrations\\Version20221122100319','2022-11-22 11:04:30',163),('DoctrineMigrations\\Version20221123073247','2022-11-23 08:33:32',263),('DoctrineMigrations\\Version20221123073539','2022-11-23 08:35:57',425);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `contra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (86,'jaime','[]','$2y$13$s5EBgiWPb7f49onmjsQCfOVt3bWMgKKGMj5uOrCIuMDeXzD6oA8sy'),(87,'miguel','[]','$2y$13$MVHcJ4Yzg2uwM1JCTq1W.ezb9RT5IHmZUZwlMWfoyI1Px3SqQXRGm');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_videojuego`
--

DROP TABLE IF EXISTS `usuario_videojuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_videojuego` (
  `usuario_id` int NOT NULL,
  `videojuego_id` int NOT NULL,
  PRIMARY KEY (`usuario_id`,`videojuego_id`),
  KEY `IDX_596E2758DB38439E` (`usuario_id`),
  KEY `IDX_596E275882925A85` (`videojuego_id`),
  CONSTRAINT `FK_596E275882925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_596E2758DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_videojuego`
--

LOCK TABLES `usuario_videojuego` WRITE;
/*!40000 ALTER TABLE `usuario_videojuego` DISABLE KEYS */;
INSERT INTO `usuario_videojuego` VALUES (86,5),(86,6);
/*!40000 ALTER TABLE `usuario_videojuego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego`
--

DROP TABLE IF EXISTS `videojuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuego` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `tema` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `fecha_publicacion` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desarrollador` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego`
--

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES (5,'God Of War: Ragnarok','a:2:{i:0;s:11:\"Cory Barlog\";i:1;s:13:\"Eric Williams\";}','a:2:{i:0;s:6:\"Accion\";i:1;s:8:\"Aventura\";}','2022','a:1:{i:0;s:20:\"Santa Monica Studios\";}',NULL,'GodOfWarRagnarok'),(6,'Horizon Forbiden West','a:1:{i:1;s:16:\"Mathijs de Jonge\";}','a:3:{i:1;s:6:\"Accion\";i:2;s:8:\"Aventura\";i:3;s:3:\"Rol\";}','2022','a:1:{i:1;s:15:\"Guerrilla Games\";}',NULL,'HorizonForbidenWest'),(7,'Elden Ring','a:1:{i:1;s:17:\"Hidetaka Miyazaki\";}','a:2:{i:1;s:6:\"Accion\";i:2;s:3:\"Rol\";}','2022','a:1:{i:1;s:12:\"FromSoftware\";}',NULL,'EldenRing'),(8,'Hollow Knight','a:1:{i:1;s:14:\"William Pellen\";}','a:1:{i:1;s:12:\"Metroidvania\";}','2017','a:1:{i:1;s:11:\"Team Cherry\";}',NULL,'HollowKnight'),(9,'Kirby and the Forgotten Land','a:2:{i:1;s:16:\"Tatsuya Kamiyama\";i:2;s:15:\"Shinya Kumazaki\";}','a:1:{i:1;s:11:\"Plataformas\";}','2022','a:1:{i:1;s:14:\"HAL Laboratory\";}',NULL,'KirbyandtheForgottenLand'),(10,'Stray','a:2:{i:1;s:11:\"Colas Koola\";i:2;s:21:\"Vivien Mermet-Guyenet\";}','a:1:{i:1;s:8:\"Aventura\";}','2022','a:1:{i:1;s:17:\"BlueTwelve Studio\";}',NULL,'Stray');
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

-- Dump completed on 2022-11-23 14:51:58
