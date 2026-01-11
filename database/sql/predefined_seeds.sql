-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: webdev
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
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Student',NULL,NULL),(2,'Faculty',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sanctions`
--

LOCK TABLES `sanctions` WRITE;
/*!40000 ALTER TABLE `sanctions` DISABLE KEYS */;
INSERT INTO `sanctions` VALUES (1,'Warning slip by the Student Affairs Section of OSS',NULL,NULL),(2,'1 week suspension',NULL,NULL),(3,'2 weeks suspension',NULL,NULL),(4,'1 month suspension',NULL,NULL),(5,'Warning and payment for the cost of printing of new ID',NULL,NULL),(6,'Warning and requiring of 16-hour student assistance service to be rendered within 5 school days upon report of loss, on top of payment for the cost of ID printing',NULL,NULL),(7,'24-hour student-assistance service to be rendered within 7 schooldays, and payment for the ost of ID printing.',NULL,NULL),(8,'1 semester suspension',NULL,NULL),(9,'Dismissal from the University',NULL,NULL),(10,'3 hours campus service',NULL,NULL),(11,'6 hours campus service',NULL,NULL),(12,'2 day suspension',NULL,NULL),(13,'Failing grade in the examination/quiz',NULL,NULL),(14,'Failing grade in the course',NULL,NULL),(15,'Dismissal, and filing of criminal case',NULL,NULL),(16,'Expulsion',NULL,NULL),(17,'1 day campus service',NULL,NULL),(18,'1 week campus service',NULL,NULL),(19,'1 month campus service',NULL,NULL),(20,'Action on Drug Test Result',NULL,NULL),(21,'One-week suspension of the incumbent  officers and all members who participated  ',NULL,NULL),(22,'Two-week suspension of the incumbent  officers and all members who participated  ',NULL,NULL),(23,'Expulsion of all incumbent officers, all members present  during the hazing, members who has actual knowledge of  hazing, and all members who participated in the planning of  hazing; and revocation of the registration of the organization ',NULL,NULL),(24,'Handled by SDB from ODSS',NULL,NULL),(25,'Revocation of degree',NULL,NULL);
/*!40000 ALTER TABLE `sanctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Under review',NULL,NULL,NULL),(2,'In progress',NULL,NULL,NULL),(3,'Resolved',NULL,NULL,NULL),(4,'Sanction revoked', NULL,NULL,NULL);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `violation_sanctions`
--

LOCK TABLES `violation_sanctions` WRITE;
/*!40000 ALTER TABLE `violation_sanctions` DISABLE KEYS */;
INSERT INTO `violation_sanctions` VALUES (1,1,1,1,NULL,NULL),(2,1,2,2,NULL,NULL),(3,1,3,3,NULL,NULL),(4,1,4,4,NULL,NULL),(5,2,1,1,NULL,NULL),(6,2,2,2,NULL,NULL),(7,2,3,3,NULL,NULL),(8,2,4,4,NULL,NULL),(9,3,1,5,NULL,NULL),(10,3,2,6,NULL,NULL),(11,3,3,7,NULL,NULL),(12,4,1,4,NULL,NULL),(13,4,2,8,NULL,NULL),(14,4,3,9,NULL,NULL),(15,5,1,1,NULL,NULL),(16,5,2,2,NULL,NULL),(17,5,3,3,NULL,NULL),(18,5,4,4,NULL,NULL),(19,6,1,10,NULL,NULL),(20,6,2,11,NULL,NULL),(21,6,3,12,NULL,NULL),(22,6,4,4,NULL,NULL),(23,7,1,2,NULL,NULL),(24,7,2,4,NULL,NULL),(25,7,3,8,NULL,NULL),(26,7,4,9,NULL,NULL),(27,8,1,10,NULL,NULL),(28,8,2,11,NULL,NULL),(29,8,3,12,NULL,NULL),(30,8,4,4,NULL,NULL),(31,9,1,2,NULL,NULL),(32,9,2,4,NULL,NULL),(33,9,3,8,NULL,NULL),(34,9,4,9,NULL,NULL),(35,10,1,11,NULL,NULL),(36,10,2,2,NULL,NULL),(37,10,3,4,NULL,NULL),(38,10,4,8,NULL,NULL),(39,11,1,3,NULL,NULL),(40,11,2,4,NULL,NULL),(41,11,3,8,NULL,NULL),(42,11,4,9,NULL,NULL),(43,12,1,11,NULL,NULL),(44,12,2,1,NULL,NULL),(45,12,3,4,NULL,NULL),(46,12,4,8,NULL,NULL),(47,13,1,11,NULL,NULL),(48,13,2,2,NULL,NULL),(49,13,3,4,NULL,NULL),(50,13,4,8,NULL,NULL),(51,14,1,11,NULL,NULL),(52,13,2,17,NULL,NULL),(53,13,3,18,NULL,NULL),(54,13,4,19,NULL,NULL),(55,15,1,2,NULL,NULL),(56,15,2,4,NULL,NULL),(57,15,3,8,NULL,NULL),(58,15,4,9,NULL,NULL),(59,16,1,4,NULL,NULL),(60,16,2,8,NULL,NULL),(61,16,3,9,NULL,NULL),(62,17,1,2,NULL,NULL),(63,17,2,4,NULL,NULL),(64,17,3,8,NULL,NULL),(65,17,4,9,NULL,NULL),(66,18,1,2,NULL,NULL),(67,18,2,4,NULL,NULL),(68,18,3,8,NULL,NULL),(69,18,4,9,NULL,NULL),(70,19,1,4,NULL,NULL),(71,19,2,8,NULL,NULL),(72,19,3,9,NULL,NULL),(73,20,1,4,NULL,NULL),(74,20,2,8,NULL,NULL),(75,20,3,9,NULL,NULL),(76,21,1,4,NULL,NULL),(77,21,2,8,NULL,NULL),(78,21,3,9,NULL,NULL),(79,22,1,2,NULL,NULL),(80,22,2,4,NULL,NULL),(81,22,3,8,NULL,NULL),(82,22,4,9,NULL,NULL),(83,23,1,4,NULL,NULL),(84,23,2,8,NULL,NULL),(85,23,3,9,NULL,NULL),(86,24,1,8,NULL,NULL),(87,24,2,9,NULL,NULL),(88,25,1,4,NULL,NULL),(89,25,2,8,NULL,NULL),(90,25,3,9,NULL,NULL),(91,26,1,11,NULL,NULL),(92,26,2,17,NULL,NULL),(93,26,3,18,NULL,NULL),(94,26,4,19,NULL,NULL),(95,27,1,4,NULL,NULL),(96,27,2,8,NULL,NULL),(97,27,3,9,NULL,NULL),(98,28,1,4,NULL,NULL),(99,28,2,8,NULL,NULL),(100,28,3,9,NULL,NULL),(101,29,1,13,NULL,NULL),(102,29,2,14,NULL,NULL),(103,29,3,9,NULL,NULL),(104,30,1,15,NULL,NULL),(105,31,1,4,NULL,NULL),(106,31,2,8,NULL,NULL),(107,31,3,9,NULL,NULL),(108,32,1,21,NULL,NULL),(109,32,2,22,NULL,NULL),(110,32,3,9,NULL,NULL),(111,33,1,21,NULL,NULL),(112,33,2,22,NULL,NULL),(113,33,3,9,NULL,NULL),(114,34,1,23,NULL,NULL),(115,35,1,24,NULL,NULL),(116,36,1,20,NULL,NULL),(117,37,1,8,NULL,NULL),(118,37,2,9,NULL,NULL),(119,37,3,25,NULL,NULL);
/*!40000 ALTER TABLE `violation_sanctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `violations`
--

LOCK TABLES `violations` WRITE;
/*!40000 ALTER TABLE `violations` DISABLE KEYS */;
INSERT INTO `violations` VALUES (1,'Non-Validated ID',NULL,NULL),(2,'Not wearing ID/No Registration Card/No Student\'s Entry Slip (SES)',NULL,NULL),(3,'Loss of ID/Registration Card',NULL,NULL),(4,'Fake ID/Another person\'s ID/Lending of ID',NULL,NULL),(5,'Failure to secure ID on time',NULL,NULL),(6,'Inappropriate attire',NULL,NULL),(7,'Overnight stay in university',NULL,NULL),(8,'Unauthorized use of university Name/Logo/Seal',NULL,NULL),(9,'Damage to university facilities',NULL,NULL),(10,'Unofficial or unauthorized participation in any off-campus activity',NULL,NULL),(11,'Unauthorized release to the press/similar channels of public communication notices and other announcements about or on behalf of the university',NULL,NULL),(12,'Unauthorized entry of visitors/guests invited by students/organizations (e.g., lecturers, speakers, seminar participants, viewers of exhibits, and the like.',NULL,NULL),(13,'Illegal posting of bills, posters, tarpaulins, and the like',NULL,NULL),(14,'Littering',NULL,NULL),(15,'Smoking (including vape/e-cigarette',NULL,NULL),(16,'Intoxicated while on campus/Bringing in intoxicating drinks into University premises',NULL,NULL),(17,'Gambling',NULL,NULL),(18,'Use of internet/IT facilities for gaming, pornography, cyberbullying, etc.',NULL,NULL),(19,'Theft',NULL,NULL),(20,'Vandalism',NULL,NULL),(21,'Destruction/Intentional damage to University/other person\'s property',NULL,NULL),(22,'Deliberate disruption of classes, academic function, official meeting or school activity',NULL,NULL),(23,'Gross acts of disrespect',NULL,NULL),(24,'Public and malicious accusation which causes dishonor, discredit, or contempt of the University and its reputation',NULL,NULL),(25,'Direct or indirect assault',NULL,NULL),(26,'Scandalous display of affection',NULL,NULL),(27,'Brawls on campus or at off-campus school functions',NULL,NULL),(28,'Tampering/Falsifying official ddocuments',NULL,NULL),(29,'Dishonesty/Plagiarism',NULL,NULL),(30,'Carrying of deadly weapons',NULL,NULL),(31,'All forms of bullying and/or harassment, threat, and intimidation',NULL,NULL),(32,'Filing of a false or inaccurate application form for the conduct of an initiation rite which does not constitute hazing',NULL,NULL),(33,'Holding of an initiation rite that does not constitute hazing without approval from the University',NULL,NULL),(34,'Hazing',NULL,NULL),(35,'Sexual Harassment',NULL,NULL),(36,'Possession or use of prohibited drugs, such as LSD, marijuana,  heroin, shabu or opiate of any kind ',NULL,NULL),(37,'Submission of falsified documents for admission  ',NULL,NULL);
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

-- Dump completed on 2026-01-02  2:52:51
