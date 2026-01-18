CREATE DATABASE  IF NOT EXISTS `iskorrections` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `iskorrections`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: iskorrections
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `appeals`
--

DROP TABLE IF EXISTS `appeals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appeals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `appeal_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `violation_record_id` bigint unsigned NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appeals_violation_record_id_foreign` (`violation_record_id`),
  CONSTRAINT `appeals_violation_record_id_foreign` FOREIGN KEY (`violation_record_id`) REFERENCES `violation_records` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appeals`
--

LOCK TABLES `appeals` WRITE;
/*!40000 ALTER TABLE `appeals` DISABLE KEYS */;
INSERT INTO `appeals` VALUES (1,'asdfsdfsadfsafdasfdasfdasdfasdfasdf',1,0,'2026-01-13 12:08:55','2026-01-17 10:34:21'),(2,'gedfgndfnhggfddfghaohl;afghlasjkl;asdffdag',25,NULL,'2026-01-18 12:14:25','2026-01-18 12:14:25');
/*!40000 ALTER TABLE `appeals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_01_01_232427_create_violations_table',1),(2,'2026_01_01_232527_create_sanctions_table',1),(3,'2026_01_01_232639_create_violation_sanctions_table',1),(4,'2026_01_01_232731_create_status_table',1),(5,'2026_01_01_234929_create_roles_table',1),(6,'2026_01_01_234929_create_users_table',1),(7,'2026_01_01_235300_create_violation_records_table',1),(8,'2026_01_04_145855_create_appeals_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Student',NULL,NULL),(2,'Faculty',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanctions`
--

DROP TABLE IF EXISTS `sanctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanctions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sanction_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanctions`
--

LOCK TABLES `sanctions` WRITE;
/*!40000 ALTER TABLE `sanctions` DISABLE KEYS */;
INSERT INTO `sanctions` VALUES (1,'Warning slip by the Student Affairs Section of OSS',NULL,NULL),(2,'1 week suspension',NULL,NULL),(3,'2 weeks suspension',NULL,NULL),(4,'1 month suspension',NULL,NULL),(5,'Warning and payment for the cost of printing of new ID',NULL,NULL),(6,'Warning and requiring of 16-hour student assistance service to be rendered within 5 school days upon report of loss, on top of payment for the cost of ID printing',NULL,NULL),(7,'24-hour student-assistance service to be rendered within 7 schooldays, and payment for the ost of ID printing.',NULL,NULL),(8,'1 semester suspension',NULL,NULL),(9,'Dismissal from the University',NULL,NULL),(10,'3 hours campus service',NULL,NULL),(11,'6 hours campus service',NULL,NULL),(12,'2 day suspension',NULL,NULL),(13,'Failing grade in the examination/quiz',NULL,NULL),(14,'Failing grade in the course',NULL,NULL),(15,'Dismissal, and filing of criminal case',NULL,NULL),(16,'Expulsion',NULL,NULL),(17,'1 day campus service',NULL,NULL),(18,'1 week campus service',NULL,NULL),(19,'1 month campus service',NULL,NULL),(20,'Action on Drug Test Result',NULL,NULL),(21,'One-week suspension of the incumbent  officers and all members who participated',NULL,NULL),(22,'Two-week suspension of the incumbent  officers and all members who participated',NULL,NULL),(23,'Expulsion of all incumbent officers, all members present  during the hazing, members who has actual knowledge of  hazing, and all members who participated in the planning of  hazing; and revocation of the registration of the organization',NULL,NULL),(24,'Handled by SDB from ODSS',NULL,NULL),(25,'Revocation of degree',NULL,NULL);
/*!40000 ALTER TABLE `sanctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Under review',NULL,NULL,NULL),(2,'In progress',NULL,NULL,NULL),(3,'Resolved',NULL,NULL,NULL),(4,'Dismissed',NULL,NULL,NULL);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Admin','2026-00001-MN-0','admin@pup.edu.ph','$2y$12$d1xto9h/VBRCaAh/FsYpBeaWIwWWhxKbr1A2p240Uq05vaXQIXis2',2,'2026-01-13 11:54:28','2026-01-13 11:54:28'),(2,'Student','Student','2026-00002-MN-0','student@iskolarngbayan.pup.edu.ph','$2y$12$NtDCEb8vJa6WZoIjPR5MceNiD8eA2HmHgoTNfLIARJXbO0wmegTDq',1,'2026-01-13 11:54:28','2026-01-13 11:54:28'),(3,'Deontae','Kuphal','2025-66829-MN-0','kuphal@iskolarngbayan.pup.edu.ph','$2y$12$cF8ZyMFbwnA0vrQ3m74JN.WFavf0QpZwYucoHotKPh.BCQz1TTxiW',1,'2026-01-13 11:54:30','2026-01-13 11:54:30'),(4,'Ryley','Durgan','2016-28135-MN-0','durgan@iskolarngbayan.pup.edu.ph','$2y$12$cbG/gDPR31MhIgAVFsKUfOShSFt6xv6HTQfBiykVaFTdZ.688P87G',1,'2026-01-13 11:54:30','2026-01-13 11:54:30'),(5,'Celine','Stark','2022-53214-MN-0','stark@iskolarngbayan.pup.edu.ph','$2y$12$kd/mJVu.XPHsvLNEI25EpeoaGVMhCRGd6D3NeChWyAlVBQq.nUvZq',1,'2026-01-13 11:54:30','2026-01-13 11:54:30'),(6,'Theron','Balistreri','2019-71525-MN-0','balistreri@iskolarngbayan.pup.edu.ph','$2y$12$0JkcYh/5HGhJnmeKTHR.kuT1PVefD3MQtipBIOqsuaXL/dfEu3w9S',1,'2026-01-13 11:54:30','2026-01-13 11:54:30'),(7,'Kayli','Halvorson','2017-44412-MN-0','halvorson@iskolarngbayan.pup.edu.ph','$2y$12$YdzPZweHu6RIfjkHydwNsOD2Ccki8C6yuEQyt6643EsQKjPP/vTEm',1,'2026-01-13 11:54:31','2026-01-13 11:54:31'),(8,'Jaydon','Parisian','2026-81695-MN-0','parisian@iskolarngbayan.pup.edu.ph','$2y$12$Yk7ZB4Pgf0fRCM4P2.7mAOK.1ctdoHK5ZkngKJ8BcoWSxwcwWbqaK',1,'2026-01-13 11:54:31','2026-01-13 11:54:31'),(9,'Loma','Nitzsche','2025-13437-MN-0','nitzsche@iskolarngbayan.pup.edu.ph','$2y$12$HKp5Go6PurUQeXjT5XL3Bu3peGrC01QLgvgTIhhC9Oie99eI0zyX2',1,'2026-01-13 11:54:31','2026-01-13 11:54:31'),(10,'Felicia','Moen','2015-82667-MN-0','moen@iskolarngbayan.pup.edu.ph','$2y$12$EaL3jg89umCRzZSjbgCkx.PLxwqQ84FVC1trjn./5vhTzMYqpPgce',1,'2026-01-13 11:54:31','2026-01-13 11:54:31'),(11,'Westley','Maggio','2023-12510-MN-0','maggio@iskolarngbayan.pup.edu.ph','$2y$12$1SX4lz1wUZ1PZ902pP9iwOSN0vMpBAcbjpYLdpuOlwj03xFcQGGUO',1,'2026-01-13 11:54:31','2026-01-13 11:54:31'),(12,'Enola','Turcotte','2026-18100-MN-0','turcotte@iskolarngbayan.pup.edu.ph','$2y$12$X.GqzOHvzpQ6dfe9kMF2Ie0oUiZqiGrCSOI5HrXhADAzeilxmaKOO',1,'2026-01-13 11:54:31','2026-01-13 11:54:31'),(13,'Garrick','Kuhlman','2020-01490-MN-0','kuhlman@pup.edu.ph','$2y$12$xWILOPcvxe8W8s95UZMEsOhB1zGABVjYF99550BceL5gV5/7fI3O6',2,'2026-01-13 11:54:32','2026-01-13 11:54:32'),(14,'Jaylan','Dicki','2023-07910-MN-0','dicki@pup.edu.ph','$2y$12$AM76beREoidaBCzO7UrCF.KGM3bdc3GTk8SgCzVcC6/vJSYSY/1NO',2,'2026-01-13 11:54:32','2026-01-13 11:54:32'),(15,'Tabitha','Nikolaus','2021-96573-MN-0','nikolaus@pup.edu.ph','$2y$12$M044tbof6Vyu1IkVlGMXo.w2wJv6zCbnHGuozybG3CFqH3Dhl9O2C',2,'2026-01-13 11:54:32','2026-01-13 11:54:32'),(16,'Norene','Deckow','2026-31022-MN-0','deckow@pup.edu.ph','$2y$12$0STOqSl6YsVdODXVaWnCU.MrfKNJCT78nJ0Sy.xQMumTg13JBRagG',2,'2026-01-13 11:54:32','2026-01-13 11:54:32'),(17,'Tad','Fisher','2016-35318-MN-0','fisher@pup.edu.ph','$2y$12$0M3pjqJ0KBvYbj8rhM9Ha.QOtg76Q6dvwC1DZVLHULb5zEB0v1q7u',2,'2026-01-13 11:54:32','2026-01-13 11:54:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violation_records`
--

DROP TABLE IF EXISTS `violation_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `violation_records` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `vio_sanct_id` bigint unsigned NOT NULL,
  `status_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `violation_records_user_id_foreign` (`user_id`),
  KEY `violation_records_vio_sanct_id_foreign` (`vio_sanct_id`),
  KEY `violation_records_status_id_foreign` (`status_id`),
  CONSTRAINT `violation_records_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  CONSTRAINT `violation_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `violation_records_vio_sanct_id_foreign` FOREIGN KEY (`vio_sanct_id`) REFERENCES `violation_sanctions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violation_records`
--

LOCK TABLES `violation_records` WRITE;
/*!40000 ALTER TABLE `violation_records` DISABLE KEYS */;
INSERT INTO `violation_records` VALUES (1,2,31,3,'2026-01-13 11:54:32','2026-01-18 14:03:09',NULL),(2,12,43,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(3,7,73,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(4,7,62,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(5,2,39,1,'2026-01-09 11:54:32','2026-01-13 11:54:32',NULL),(6,9,83,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(7,7,95,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(8,4,43,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(9,10,70,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(10,5,66,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(11,9,104,1,'2026-01-13 11:54:32','2026-01-13 11:54:32',NULL),(12,2,9,1,'2026-01-14 03:00:04','2026-01-14 04:51:32',NULL),(13,7,101,1,'2026-01-17 13:48:27','2026-01-17 13:48:27',NULL),(14,7,102,1,'2026-01-17 14:10:46','2026-01-17 14:15:31','2026-01-17 14:15:31'),(15,7,103,1,'2026-01-17 14:10:47','2026-01-17 14:15:28','2026-01-17 14:15:28'),(16,7,103,1,'2026-01-17 14:11:01','2026-01-17 14:15:25','2026-01-17 14:15:25'),(17,7,9,1,'2026-01-17 14:15:42','2026-01-17 14:15:42',NULL),(18,7,10,1,'2026-01-17 14:16:08','2026-01-18 10:52:44','2026-01-18 10:52:44'),(19,7,11,1,'2026-01-17 14:16:44','2026-01-18 10:52:38','2026-01-18 10:52:38'),(20,7,11,1,'2026-01-17 14:17:27','2026-01-18 10:52:35','2026-01-18 10:52:35'),(21,7,11,1,'2026-01-17 14:18:37','2026-01-18 10:52:27','2026-01-18 10:52:27'),(22,7,11,1,'2026-01-17 14:19:58','2026-01-18 10:52:24','2026-01-18 10:52:24'),(23,7,27,2,'2026-01-18 10:52:55','2026-01-18 10:52:55',NULL),(24,7,12,1,'2026-01-18 11:03:15','2026-01-18 11:03:15',NULL),(25,2,10,1,'2026-01-18 12:13:58','2026-01-18 13:44:28',NULL);
/*!40000 ALTER TABLE `violation_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violation_sanctions`
--

DROP TABLE IF EXISTS `violation_sanctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `violation_sanctions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `violation_id` bigint unsigned NOT NULL,
  `no_of_offense` int NOT NULL,
  `sanction_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `violation_sanctions_violation_id_foreign` (`violation_id`),
  KEY `violation_sanctions_sanction_id_foreign` (`sanction_id`),
  CONSTRAINT `violation_sanctions_sanction_id_foreign` FOREIGN KEY (`sanction_id`) REFERENCES `sanctions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `violation_sanctions_violation_id_foreign` FOREIGN KEY (`violation_id`) REFERENCES `violations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violation_sanctions`
--

LOCK TABLES `violation_sanctions` WRITE;
/*!40000 ALTER TABLE `violation_sanctions` DISABLE KEYS */;
INSERT INTO `violation_sanctions` VALUES (1,1,1,1,NULL,NULL),(2,1,2,2,NULL,NULL),(3,1,3,3,NULL,NULL),(4,1,4,4,NULL,NULL),(5,2,1,1,NULL,NULL),(6,2,2,2,NULL,NULL),(7,2,3,3,NULL,NULL),(8,2,4,4,NULL,NULL),(9,3,1,5,NULL,NULL),(10,3,2,6,NULL,NULL),(11,3,3,7,NULL,NULL),(12,4,1,4,NULL,NULL),(13,4,2,8,NULL,NULL),(14,4,3,9,NULL,NULL),(15,5,1,1,NULL,NULL),(16,5,2,2,NULL,NULL),(17,5,3,3,NULL,NULL),(18,5,4,4,NULL,NULL),(19,6,1,10,NULL,NULL),(20,6,2,11,NULL,NULL),(21,6,3,12,NULL,NULL),(22,6,4,4,NULL,NULL),(23,7,1,2,NULL,NULL),(24,7,2,4,NULL,NULL),(25,7,3,8,NULL,NULL),(26,7,4,9,NULL,NULL),(27,8,1,10,NULL,NULL),(28,8,2,11,NULL,NULL),(29,8,3,12,NULL,NULL),(30,8,4,4,NULL,NULL),(31,9,1,2,NULL,NULL),(32,9,2,4,NULL,NULL),(33,9,3,8,NULL,NULL),(34,9,4,9,NULL,NULL),(35,10,1,11,NULL,NULL),(36,10,2,2,NULL,NULL),(37,10,3,4,NULL,NULL),(38,10,4,8,NULL,NULL),(39,11,1,3,NULL,NULL),(40,11,2,4,NULL,NULL),(41,11,3,8,NULL,NULL),(42,11,4,9,NULL,NULL),(43,12,1,11,NULL,NULL),(44,12,2,1,NULL,NULL),(45,12,3,4,NULL,NULL),(46,12,4,8,NULL,NULL),(47,13,1,11,NULL,NULL),(48,13,2,2,NULL,NULL),(49,13,3,4,NULL,NULL),(50,13,4,8,NULL,NULL),(51,14,1,11,NULL,NULL),(52,13,2,17,NULL,NULL),(53,13,3,18,NULL,NULL),(54,13,4,19,NULL,NULL),(55,15,1,2,NULL,NULL),(56,15,2,4,NULL,NULL),(57,15,3,8,NULL,NULL),(58,15,4,9,NULL,NULL),(59,16,1,4,NULL,NULL),(60,16,2,8,NULL,NULL),(61,16,3,9,NULL,NULL),(62,17,1,2,NULL,NULL),(63,17,2,4,NULL,NULL),(64,17,3,8,NULL,NULL),(65,17,4,9,NULL,NULL),(66,18,1,2,NULL,NULL),(67,18,2,4,NULL,NULL),(68,18,3,8,NULL,NULL),(69,18,4,9,NULL,NULL),(70,19,1,4,NULL,NULL),(71,19,2,8,NULL,NULL),(72,19,3,9,NULL,NULL),(73,20,1,4,NULL,NULL),(74,20,2,8,NULL,NULL),(75,20,3,9,NULL,NULL),(76,21,1,4,NULL,NULL),(77,21,2,8,NULL,NULL),(78,21,3,9,NULL,NULL),(79,22,1,2,NULL,NULL),(80,22,2,4,NULL,NULL),(81,22,3,8,NULL,NULL),(82,22,4,9,NULL,NULL),(83,23,1,4,NULL,NULL),(84,23,2,8,NULL,NULL),(85,23,3,9,NULL,NULL),(86,24,1,8,NULL,NULL),(87,24,2,9,NULL,NULL),(88,25,1,4,NULL,NULL),(89,25,2,8,NULL,NULL),(90,25,3,9,NULL,NULL),(91,26,1,11,NULL,NULL),(92,26,2,17,NULL,NULL),(93,26,3,18,NULL,NULL),(94,26,4,19,NULL,NULL),(95,27,1,4,NULL,NULL),(96,27,2,8,NULL,NULL),(97,27,3,9,NULL,NULL),(98,28,1,4,NULL,NULL),(99,28,2,8,NULL,NULL),(100,28,3,9,NULL,NULL),(101,29,1,13,NULL,NULL),(102,29,2,14,NULL,NULL),(103,29,3,9,NULL,NULL),(104,30,1,15,NULL,NULL),(105,31,1,4,NULL,NULL),(106,31,2,8,NULL,NULL),(107,31,3,9,NULL,NULL),(108,32,1,21,NULL,NULL),(109,32,2,22,NULL,NULL),(110,32,3,9,NULL,NULL),(111,33,1,21,NULL,NULL),(112,33,2,22,NULL,NULL),(113,33,3,9,NULL,NULL),(114,34,1,23,NULL,NULL),(115,35,1,24,NULL,NULL),(116,36,1,20,NULL,NULL),(117,37,1,8,NULL,NULL),(118,37,2,9,NULL,NULL),(119,37,3,25,NULL,NULL);
/*!40000 ALTER TABLE `violation_sanctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violations`
--

DROP TABLE IF EXISTS `violations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `violations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violations`
--

LOCK TABLES `violations` WRITE;
/*!40000 ALTER TABLE `violations` DISABLE KEYS */;
INSERT INTO `violations` VALUES (1,'Non-Validated ID',NULL,NULL),(2,'Not wearing ID/No Registration Card/No Student\'s Entry Slip (SES)',NULL,NULL),(3,'Loss of ID/Registration Card',NULL,NULL),(4,'Fake ID/Another person\'s ID/Lending of ID',NULL,NULL),(5,'Failure to secure ID on time',NULL,NULL),(6,'Inappropriate attire',NULL,NULL),(7,'Overnight stay in university',NULL,NULL),(8,'Unauthorized use of university Name/Logo/Seal',NULL,NULL),(9,'Damage to university facilities',NULL,NULL),(10,'Unofficial or unauthorized participation in any off-campus activity',NULL,NULL),(11,'Unauthorized release to the press/similar channels of public communication notices and other announcements about or on behalf of the university',NULL,NULL),(12,'Unauthorized entry of visitors/guests invited by students/organizations (e.g., lecturers, speakers, seminar participants, viewers of exhibits, and the like.',NULL,NULL),(13,'Illegal posting of bills, posters, tarpaulins, and the like',NULL,NULL),(14,'Littering',NULL,NULL),(15,'Smoking (including vape/e-cigarette',NULL,NULL),(16,'Intoxicated while on campus/Bringing in intoxicating drinks into University premises',NULL,NULL),(17,'Gambling',NULL,NULL),(18,'Use of internet/IT facilities for gaming, pornography, cyberbullying, etc.',NULL,NULL),(19,'Theft',NULL,NULL),(20,'Vandalism',NULL,NULL),(21,'Destruction/Intentional damage to University/other person\'s property',NULL,NULL),(22,'Deliberate disruption of classes, academic function, official meeting or school activity',NULL,NULL),(23,'Gross acts of disrespect',NULL,NULL),(24,'Public and malicious accusation which causes dishonor, discredit, or contempt of the University and its reputation',NULL,NULL),(25,'Direct or indirect assault',NULL,NULL),(26,'Scandalous display of affection',NULL,NULL),(27,'Brawls on campus or at off-campus school functions',NULL,NULL),(28,'Tampering/Falsifying official ddocuments',NULL,NULL),(29,'Dishonesty/Plagiarism',NULL,NULL),(30,'Carrying of deadly weapons',NULL,NULL),(31,'All forms of bullying and/or harassment, threat, and intimidation',NULL,NULL),(32,'Filing of a false or inaccurate application form for the conduct of an initiation rite which does not constitute hazing',NULL,NULL),(33,'Holding of an initiation rite that does not constitute hazing without approval from the University',NULL,NULL),(34,'Hazing',NULL,NULL),(35,'Sexual Harassment',NULL,NULL),(36,'Possession or use of prohibited drugs, such as LSD, marijuana,  heroin, shabu or opiate of any kind',NULL,NULL),(37,'Submission of falsified documents for admission',NULL,NULL);
/*!40000 ALTER TABLE `violations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-18 22:45:39
