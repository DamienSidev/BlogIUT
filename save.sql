-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: game_web_db
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66F675F31B` (`author_id`),
  CONSTRAINT `FK_23A0E66F675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(2,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(3,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(4,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(5,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(6,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(7,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(8,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(9,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(10,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(11,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(12,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(13,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(14,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(15,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(16,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(17,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(18,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(19,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(20,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(21,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(22,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(23,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(24,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(25,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(26,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(27,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(28,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(29,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(30,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(31,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(32,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(33,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(34,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(35,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(36,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(37,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(38,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(39,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(40,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(41,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(42,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(43,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(44,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(45,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(46,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(47,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(48,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(49,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(50,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(51,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(52,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(53,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(54,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(55,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(56,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(57,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(58,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(59,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(60,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(61,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(62,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(63,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(64,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(65,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(66,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(67,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(68,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(69,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(70,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(71,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(72,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(73,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(74,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(75,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(76,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(77,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(78,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(79,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(80,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(81,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(82,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(83,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(84,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(85,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(86,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(87,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(88,1,'Article 1','Du contenu pour mon premier article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL),(89,2,'Article 2','Du contenu pour mon second article qui vient du CSV','2027-05-09 11:00:00','2027-05-09 11:05:00',NULL),(90,3,'Article 3','Du contenu pour mon troisième article qui vient du CSV','2027-05-09 11:00:00',NULL,NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20251013090635','2025-10-13 09:15:12',374);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_connection` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'d@d.fr','[\"ROLE_EDITEUR\"]','$2y$13$72Q56DHPXr61lrnb.m/JZ.jakf.0YqzpqTBT8qMuJS8iTqCkhDcAS',1,'2025-10-13 09:25:12','HENRY','Thierry'),(2,'a@a.fr','[\"ROLE_EDITEUR\"]',' $2y$13$72Q56DHPXr61lrnb.m/JZ.jakf.0YqzpqTBT8qMuJS8iTqCkhDcAS',1,NULL,'DUPOND','Antoine'),(3,'b@b.fr','[\"ROLE_EDITEUR\"]',' $2y$13$72Q56DHPXr61lrnb.m/JZ.jakf.0YqzpqTBT8qMuJS8iTqCkhDcAS',1,NULL,'ZIDANE','Zinedine');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-13 13:53:02
