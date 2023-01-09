CREATE DATABASE  IF NOT EXISTS `main` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `main`;
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
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director`
--

LOCK TABLES `director` WRITE;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` VALUES (1,'Cory Barlog'),(2,'Mathijs de Jonge'),(3,'Hidetaka Miyazaki'),(4,'William Pellen'),(5,'Tatsuya Kamiyama'),(6,'Colas Koola'),(7,'Eric Williams'),(8,'Shinya Kumazaki'),(9,'Vivien Mermet-Guyenet'),(10,'Shigeru Ohmori'),(11,'Hidemaro Fujibayashi'),(12,'Kaname Fujioka'),(13,'Yuya Tokuda'),(15,'Isamu Okano'),(16,'Yui Tanimura'),(17,'Takeshi Kawachimaru'),(18,'Hideo Kojima'),(19,'Fumito Ueda'),(20,'Tom Cadwell'),(21,'Oren Faz'),(22,'Markus Persson'),(23,'Jens Bergensten'),(24,'Nathan Adams');
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
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20221114092455','2022-11-14 10:25:14',172),('DoctrineMigrations\\Version20221114093717','2022-11-14 10:37:40',220),('DoctrineMigrations\\Version20221114095004','2022-11-14 10:50:26',142),('DoctrineMigrations\\Version20221114123808','2022-11-14 13:38:42',383),('DoctrineMigrations\\Version20221115131709','2022-11-15 14:17:31',427),('DoctrineMigrations\\Version20221115132027','2022-11-15 14:20:34',126),('DoctrineMigrations\\Version20221116072747','2022-11-16 08:28:11',242),('DoctrineMigrations\\Version20221116085415','2022-11-16 09:54:30',273),('DoctrineMigrations\\Version20221117073737','2022-11-17 08:37:54',808),('DoctrineMigrations\\Version20221118074742','2022-11-18 08:48:06',849),('DoctrineMigrations\\Version20221118081018','2022-11-18 09:10:55',242),('DoctrineMigrations\\Version20221118094316','2022-11-18 10:43:22',542),('DoctrineMigrations\\Version20221118095103','2022-11-18 10:51:33',342),('DoctrineMigrations\\Version20221118095404','2022-11-18 10:54:07',476),('DoctrineMigrations\\Version20221118102757','2022-11-18 11:28:05',369),('DoctrineMigrations\\Version20221118121338','2022-11-18 13:13:47',606),('DoctrineMigrations\\Version20221118125200','2022-11-18 13:52:16',804),('DoctrineMigrations\\Version20221121074117','2022-11-21 08:41:40',498),('DoctrineMigrations\\Version20221121075142','2022-11-21 08:51:56',573),('DoctrineMigrations\\Version20221121090053','2022-11-21 10:01:36',241),('DoctrineMigrations\\Version20221121090644','2022-11-21 10:07:33',646),('DoctrineMigrations\\Version20221121091424','2022-11-21 10:14:48',235),('DoctrineMigrations\\Version20221121091832','2022-11-21 10:19:43',498),('DoctrineMigrations\\Version20221121094644','2022-11-21 10:48:05',900),('DoctrineMigrations\\Version20221121100713','2022-11-21 11:07:42',278),('DoctrineMigrations\\Version20221121102905','2022-11-21 11:29:14',1180),('DoctrineMigrations\\Version20221121103521','2022-11-21 11:37:15',609),('DoctrineMigrations\\Version20221121104039','2022-11-21 11:41:02',552),('DoctrineMigrations\\Version20221121104846','2022-11-21 11:51:31',460),('DoctrineMigrations\\Version20221121113759','2022-11-21 12:38:04',473),('DoctrineMigrations\\Version20221122073039','2022-11-22 08:31:37',434),('DoctrineMigrations\\Version20221122073702','2022-11-22 08:37:07',182),('DoctrineMigrations\\Version20221122075454','2022-11-22 08:55:46',174),('DoctrineMigrations\\Version20221122080414','2022-11-22 09:04:23',569),('DoctrineMigrations\\Version20221122084903','2022-11-22 09:49:35',315),('DoctrineMigrations\\Version20221122085328','2022-11-22 09:54:10',594),('DoctrineMigrations\\Version20221122100319','2022-11-22 11:04:30',163),('DoctrineMigrations\\Version20221123073247','2022-11-23 08:33:32',263),('DoctrineMigrations\\Version20221123073539','2022-11-23 08:35:57',425),('DoctrineMigrations\\Version20221125093523','2022-11-25 10:36:02',342),('DoctrineMigrations\\Version20221129081431','2022-11-29 09:14:48',199),('DoctrineMigrations\\Version20221129084936','2022-11-29 09:49:59',171),('DoctrineMigrations\\Version20221129085257','2022-11-29 09:53:03',283),('DoctrineMigrations\\Version20221129090739','2022-11-29 10:08:12',218),('DoctrineMigrations\\Version20221129091058','2022-11-29 10:11:31',435),('DoctrineMigrations\\Version20221129092615','2022-11-29 10:26:33',417),('DoctrineMigrations\\Version20221129095237','2022-11-29 10:52:57',468),('DoctrineMigrations\\Version20221129115407','2022-11-29 12:54:30',323),('DoctrineMigrations\\Version20221129115647','2022-11-29 12:57:07',207),('DoctrineMigrations\\Version20221129121216','2022-11-29 13:13:20',553),('DoctrineMigrations\\Version20221216090515','2022-12-16 10:11:07',1226),('DoctrineMigrations\\Version20221216091704','2022-12-16 10:19:42',196),('DoctrineMigrations\\Version20221216091957','2022-12-16 10:20:33',440),('DoctrineMigrations\\Version20221216093030','2022-12-16 10:30:49',859),('DoctrineMigrations\\Version20221216101515','2022-12-16 11:15:20',224),('DoctrineMigrations\\Version20221216122639','2022-12-16 13:27:03',432),('DoctrineMigrations\\Version20221216125550','2022-12-16 13:55:55',158),('DoctrineMigrations\\Version20221219071651','2022-12-19 08:17:00',543),('DoctrineMigrations\\Version20221222075444','2022-12-22 08:55:26',205),('DoctrineMigrations\\Version20221222082320','2022-12-22 09:23:24',177),('DoctrineMigrations\\Version20221222082429','2022-12-22 09:24:58',138);
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
  `desarrolladora` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_desarrolladora`
--

LOCK TABLES `empresa_desarrolladora` WRITE;
/*!40000 ALTER TABLE `empresa_desarrolladora` DISABLE KEYS */;
INSERT INTO `empresa_desarrolladora` VALUES (1,'Santa Monica Studios'),(2,'Guerrilla Games'),(3,'FromSoftware'),(4,'Team Cherry'),(5,'Hal Laboratory'),(6,'BlueTwelve Studio'),(7,'Game Freak'),(8,'Nintendo'),(9,'Monolith Soft'),(10,'Capcom'),(13,'Kojima Productions'),(14,'Team ICO'),(15,'Riot Games'),(16,'Mojang Studios'),(17,'Electronic Arts');
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
  `genero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Accion'),(2,'Aventura'),(5,'Rol'),(8,'Metroidvania'),(9,'Plataformas'),(19,'RPG'),(21,'Exploracion'),(24,'Multiplayer'),(25,'Sandbox'),(26,'Hack and Slash'),(27,'Deportes');
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
  `comentario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `videojuego_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F6AD149BDB38439E` (`usuario_id`),
  KEY `IDX_F6AD149B82925A85` (`videojuego_id`),
  CONSTRAINT `FK_F6AD149B82925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`),
  CONSTRAINT `FK_F6AD149BDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_juegos`
--

LOCK TABLES `lista_juegos` WRITE;
/*!40000 ALTER TABLE `lista_juegos` DISABLE KEYS */;
INSERT INTO `lista_juegos` VALUES (4,'Eso si que no me lo esperaba',86,5),(5,'Muy bonito todo',86,6),(6,'GOTY',86,7),(8,'Esto es un comentario',96,5),(11,'El mejor metroidvania de la historia',86,8),(12,'Que bonito es el Kirby',86,9),(13,'Que majo es el michi',86,10),(16,'Este juego es demasiado largo',87,7),(18,'El primer mundo abierto pokemon',86,11),(19,'Que ganas tengo de que salga su secuela',86,12),(20,'Le he metido mas de 1000 horas y aun asi me dan ganas de jugarlo',86,13),(21,'El souls mas perfecto',86,14),(22,'El juego de pokemon que mas me ha costado pasarme',86,15),(23,'Lo he completado y sigo sin entenderlo',86,16),(24,'Lo mejor es el trayecto hasta los colosos',86,17),(25,'Yo empece en este juego por Arcane',86,18),(26,'Me encanta que con lo sencillo que es la de posibilidades que te da',86,19),(29,'El mejor juego del año',87,5),(34,NULL,86,20);
/*!40000 ALTER TABLE `lista_juegos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma`
--

DROP TABLE IF EXISTS `plataforma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `plataforma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma`
--

LOCK TABLES `plataforma` WRITE;
/*!40000 ALTER TABLE `plataforma` DISABLE KEYS */;
INSERT INTO `plataforma` VALUES (1,'PS'),(2,'PS2'),(3,'PS3'),(4,'PS4'),(5,'PS5'),(6,'Xbox'),(7,'Xbox 360'),(8,'Xbox One'),(9,'Xbox Series X/S'),(10,'Wii'),(11,'Wii U'),(12,'DS'),(13,'3DS'),(14,'Switch'),(15,'Steam Deck'),(16,'PC');
/*!40000 ALTER TABLE `plataforma` ENABLE KEYS */;
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
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (86,'jaime','[]','$2y$13$s5EBgiWPb7f49onmjsQCfOVt3bWMgKKGMj5uOrCIuMDeXzD6oA8sy','jgb20dioda'),(87,'miguel','[]','$2y$13$MVHcJ4Yzg2uwM1JCTq1W.ezb9RT5IHmZUZwlMWfoyI1Px3SqQXRGm','1234567890'),(95,'admin','[\"ROLE_ADMIN\"]','$2y$10$PK404kz8bOkITUWea4Iru./fmWfQEPWVK7T20JkvVkIhcBaVIcOJu',''),(96,'daniel','[]','$2y$10$IEEmTOqw2d23nI.vsmtiPeytfzjLMHPovRsna9JB7G36GtsotlLNC',''),(97,'javier','[]','$2y$10$I2vXVTPj5avAejY9WT7quO/JoifVJ3JlPCS4uZSpyNK0NNdUHOpvq',''),(103,'angel','[]','$2y$10$G41I8G0PVW3ZsA7xQqhAk./NFfgQsXaXKt7yJXT86G3h5FmteLEV2',''),(104,'luis','[]','$2y$10$T.V/2Brk1GH3NZDUebCwH.9cMpW9MDj8oy0.EsA7RlvbpZocfrRDq',''),(143,'luna','[]','$2y$10$nV1Dc.TxfSQ6chRsCujwnu15KlNVQ2fCWf6RL5xYQcblV.dG.VDn.',''),(144,'antonio','[]','$2y$10$toLXZOJRcjghR8TlPkAu.eYb0y14OAdvVLj3R2mckImCDcCpC4q6e',''),(145,'aurora','[]','$2y$10$Vh9HqOYC.MbF2I1t7TNkkesRPRiVAcgKKv313HvUFgY1JnvCDMvQa',''),(146,'jorge','[]','$2y$10$7k.cQmZctXT6gsXzlI1CfOIzscLYXn1kc0q44G6X7M.a3RNw1EYEq','');
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
  `fecha_publicacion` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego`
--

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES (5,'God Of War: Ragnarok','2022',NULL,'GodOfWarRagnarok'),(6,'Horizon Forbidden West','2022',NULL,'HorizonForbiddenWest'),(7,'Elden Ring','2022',NULL,'EldenRing'),(8,'Hollow Knight','2017',NULL,'HollowKnight'),(9,'Kirby and the Forgotten Land','2022',NULL,'KirbyandtheForgottenLand'),(10,'Stray','2022',NULL,'Stray'),(11,'Pokemon Violet','2022',NULL,'PokemonViolet'),(12,'The Legend of Zelda: Breath of the Wild','2017',NULL,'TheLegendofZeldaBreathoftheWild'),(13,'Monster Hunter: World','2018',NULL,'MonsterHunterWorld'),(14,'Dark Souls III','2016',NULL,'DarkSoulsIII'),(15,'Pokemon Platinum','2009',NULL,'PokemonPlatinum'),(16,'Death Stranding','2019',NULL,'DeathStranding'),(17,'Shadow of the Colossus','2005',NULL,'ShadowoftheColossus'),(18,'League of Legends','2009',NULL,'LeagueofLegends'),(19,'Minecraft','2009',NULL,'Minecraft'),(20,'Bloodborne','2015',NULL,'Bloodborne'),(21,'Fifa 2023','2022',NULL,'Fifa2023'),(22,'Battlefront 2','2017',NULL,'Battlefront2');
/*!40000 ALTER TABLE `videojuego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego_director`
--

DROP TABLE IF EXISTS `videojuego_director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuego_director` (
  `videojuego_id` int NOT NULL,
  `director_id` int NOT NULL,
  PRIMARY KEY (`videojuego_id`,`director_id`),
  KEY `IDX_B30BCA9C82925A85` (`videojuego_id`),
  KEY `IDX_B30BCA9C899FB366` (`director_id`),
  CONSTRAINT `FK_B30BCA9C82925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B30BCA9C899FB366` FOREIGN KEY (`director_id`) REFERENCES `director` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego_director`
--

LOCK TABLES `videojuego_director` WRITE;
/*!40000 ALTER TABLE `videojuego_director` DISABLE KEYS */;
INSERT INTO `videojuego_director` VALUES (5,1),(5,7),(6,2),(7,3),(7,16),(8,4),(9,5),(9,8),(10,6),(10,9),(11,10),(12,11),(13,12),(13,13),(14,3),(14,15),(15,17),(16,18),(17,19),(18,20),(18,21),(19,22),(19,23),(19,24),(20,3);
/*!40000 ALTER TABLE `videojuego_director` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego_empresa_desarrolladora`
--

DROP TABLE IF EXISTS `videojuego_empresa_desarrolladora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuego_empresa_desarrolladora` (
  `videojuego_id` int NOT NULL,
  `empresa_desarrolladora_id` int NOT NULL,
  PRIMARY KEY (`videojuego_id`,`empresa_desarrolladora_id`),
  KEY `IDX_4408E7EF82925A85` (`videojuego_id`),
  KEY `IDX_4408E7EF2B469E84` (`empresa_desarrolladora_id`),
  CONSTRAINT `FK_4408E7EF2B469E84` FOREIGN KEY (`empresa_desarrolladora_id`) REFERENCES `empresa_desarrolladora` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_4408E7EF82925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego_empresa_desarrolladora`
--

LOCK TABLES `videojuego_empresa_desarrolladora` WRITE;
/*!40000 ALTER TABLE `videojuego_empresa_desarrolladora` DISABLE KEYS */;
INSERT INTO `videojuego_empresa_desarrolladora` VALUES (5,1),(6,2),(7,3),(8,4),(9,5),(10,6),(11,7),(12,8),(12,9),(13,10),(14,3),(15,7),(16,13),(17,14),(18,15),(19,16),(20,3),(21,17);
/*!40000 ALTER TABLE `videojuego_empresa_desarrolladora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego_genero`
--

DROP TABLE IF EXISTS `videojuego_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuego_genero` (
  `videojuego_id` int NOT NULL,
  `genero_id` int NOT NULL,
  PRIMARY KEY (`videojuego_id`,`genero_id`),
  KEY `IDX_88A29E6182925A85` (`videojuego_id`),
  KEY `IDX_88A29E61BCE7B795` (`genero_id`),
  CONSTRAINT `FK_88A29E6182925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_88A29E61BCE7B795` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego_genero`
--

LOCK TABLES `videojuego_genero` WRITE;
/*!40000 ALTER TABLE `videojuego_genero` DISABLE KEYS */;
INSERT INTO `videojuego_genero` VALUES (5,1),(5,2),(5,26),(6,1),(6,2),(6,5),(7,1),(7,5),(8,8),(9,9),(10,2),(11,5),(12,1),(12,2),(12,5),(13,1),(13,5),(14,1),(14,5),(15,19),(16,1),(16,21),(17,1),(17,2),(18,24),(19,25),(20,1),(20,5),(21,27);
/*!40000 ALTER TABLE `videojuego_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego_plataforma`
--

DROP TABLE IF EXISTS `videojuego_plataforma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videojuego_plataforma` (
  `videojuego_id` int NOT NULL,
  `plataforma_id` int NOT NULL,
  PRIMARY KEY (`videojuego_id`,`plataforma_id`),
  KEY `IDX_DDDABEE82925A85` (`videojuego_id`),
  KEY `IDX_DDDABEEEB90E430` (`plataforma_id`),
  CONSTRAINT `FK_DDDABEE82925A85` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuego` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DDDABEEEB90E430` FOREIGN KEY (`plataforma_id`) REFERENCES `plataforma` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego_plataforma`
--

LOCK TABLES `videojuego_plataforma` WRITE;
/*!40000 ALTER TABLE `videojuego_plataforma` DISABLE KEYS */;
INSERT INTO `videojuego_plataforma` VALUES (5,4),(5,5),(6,4),(6,5),(7,4),(7,5),(7,8),(7,9),(7,16),(8,4),(8,8),(8,14),(8,16),(9,14),(10,4),(10,5),(10,16),(11,14),(12,11),(12,14),(13,4),(13,8),(13,16),(14,4),(14,8),(14,16),(15,12),(16,4),(16,5),(16,16),(17,2),(17,3),(17,4),(17,5),(18,16),(19,3),(19,4),(19,7),(19,8),(19,9),(19,11),(19,13),(19,14),(19,16),(20,4),(21,4),(21,5),(21,8),(21,9),(21,14),(21,16);
/*!40000 ALTER TABLE `videojuego_plataforma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-09 11:53:59
