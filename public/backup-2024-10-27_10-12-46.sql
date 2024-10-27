-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: jibon
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brrowers`
--

DROP TABLE IF EXISTS `brrowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brrowers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brrowers`
--

LOCK TABLES `brrowers` WRITE;
/*!40000 ALTER TABLE `brrowers` DISABLE KEYS */;
/*!40000 ALTER TABLE `brrowers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brrowers_addresses`
--

DROP TABLE IF EXISTS `brrowers_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brrowers_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `market` varchar(255) DEFAULT NULL,
  `post_office` varchar(255) DEFAULT NULL,
  `police_station` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brrowers_addresses`
--

LOCK TABLES `brrowers_addresses` WRITE;
/*!40000 ALTER TABLE `brrowers_addresses` DISABLE KEYS */;
INSERT INTO `brrowers_addresses` VALUES (1,6,'Eiusmod aspernatur b','Guthin','Nisi lorem in facili','Voluptatibus exceptu','78041','Error est dicta dic','2024-10-26 03:34:18','2024-10-26 03:34:18',NULL),(2,8,'Sunt est eum aliquid','1','Est aliquam quia ne','Commodi voluptatem','31247','Asperiores magna fug','2024-10-26 06:34:00','2024-10-26 06:34:00',NULL),(3,10,'Sunt est eum aliquid','1','Est aliquam quia ne','Commodi voluptatem','31247','Asperiores magna fug','2024-10-26 06:34:39','2024-10-26 06:34:39',NULL),(4,11,'Ea vitae doloremque','1','Blanditiis cupidatat','Eu consectetur sequi','58986','Aut eum ad rerum rer','2024-10-26 07:09:58','2024-10-26 07:09:58',NULL),(5,12,'Quo illo possimus q','1','Labore eligendi ipsu','Esse cillum obcaecat','66747','Aut excepteur non in','2024-10-26 09:23:38','2024-10-26 09:23:38',NULL);
/*!40000 ALTER TABLE `brrowers_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brrowers_bank_details`
--

DROP TABLE IF EXISTS `brrowers_bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brrowers_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `account_name` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brrowers_bank_details`
--

LOCK TABLES `brrowers_bank_details` WRITE;
/*!40000 ALTER TABLE `brrowers_bank_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `brrowers_bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brrowers_loan_details`
--

DROP TABLE IF EXISTS `brrowers_loan_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brrowers_loan_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loan_unique_id` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `loan_type_id` int(11) NOT NULL,
  `principle_amount` varchar(255) DEFAULT NULL,
  `loan_terms` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `amortization` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'processing',
  `final_paid` varchar(255) DEFAULT NULL,
  `drop_out` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brrowers_loan_details`
--

LOCK TABLES `brrowers_loan_details` WRITE;
/*!40000 ALTER TABLE `brrowers_loan_details` DISABLE KEYS */;
INSERT INTO `brrowers_loan_details` VALUES (1,6,'34189060','Guthin',0,'Et quis in nulla vol','Et quis in nulla vol','Et quis in nulla vol','Et quis in nulla vol','Et quis in nulla vol','Et quis in nulla vol',NULL,NULL,'Et quis in nulla vol','Et quis in nulla vol',NULL,NULL,'2024-10-26 03:34:18','2024-10-26 03:34:18',NULL),(2,8,'90931218','1',2,'1000','120','Day','16','1160.00','1160.00',NULL,NULL,'ssss','process',NULL,'Drop Out','2024-10-26 06:34:00','2024-10-27 02:35:49',NULL),(3,10,'74095234','1',2,'1000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ssss','process',NULL,NULL,'2024-10-26 06:34:39','2024-10-26 06:34:39',NULL),(4,11,'77776464','1',2,'1000','120','Day','16','1160.00','1160.00','2024-10-26','2025-02-23','ffffffffh','Approved',NULL,NULL,'2024-10-26 07:09:58','2024-10-26 08:12:46',NULL),(5,12,'68110944','1',2,'1000','120','Day','16','1160.00','1160.00','2024-10-26','2025-02-23','ssss','Approved','Paid',NULL,'2024-10-26 09:23:38','2024-10-26 09:32:28',NULL);
/*!40000 ALTER TABLE `brrowers_loan_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_name` text DEFAULT NULL,
  `table_name` text DEFAULT NULL,
  `item_id` text DEFAULT NULL,
  `dcocument_type` text DEFAULT NULL,
  `text_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'1729933458820_img-4.jpg','brrowers','6','attachment',NULL,NULL,NULL,NULL),(2,'1729933458820_img-4.jpg','brrowers','6','attachment',NULL,NULL,NULL,NULL),(3,'1729933458827_img-5.jpg','brrowers','6','attachment',NULL,NULL,NULL,NULL),(4,'1729944279228_img-5.jpg','brrowers','10','attachment',NULL,NULL,NULL,NULL),(5,'1729946398680_img-4.jpg','brrowers','11','attachment',NULL,NULL,NULL,NULL),(6,'1729954418911_img-4.jpg','brrowers','12','attachment',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emis`
--

DROP TABLE IF EXISTS `emis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `emi_date` date DEFAULT NULL,
  `emi_amount` double(8,2) DEFAULT NULL,
  `remaining_amount` float DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'due',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emis`
--

LOCK TABLES `emis` WRITE;
/*!40000 ALTER TABLE `emis` DISABLE KEYS */;
INSERT INTO `emis` VALUES (1,12,5,1,'2024-10-26',9.67,1150.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(2,12,5,1,'2024-10-27',9.67,1140.67,'paid','2024-10-26 09:32:28','2024-10-26 22:57:01',NULL),(3,12,5,1,'2024-10-28',9.67,1131,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(4,12,5,1,'2024-10-29',9.67,1121.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(5,12,5,1,'2024-10-30',9.67,1111.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(6,12,5,1,'2024-10-31',9.67,1102,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(7,12,5,1,'2024-11-01',9.67,1092.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(8,12,5,1,'2024-11-02',9.67,1082.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(9,12,5,1,'2024-11-03',9.67,1073,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(10,12,5,1,'2024-11-04',9.67,1063.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(11,12,5,1,'2024-11-05',9.67,1053.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(12,12,5,1,'2024-11-06',9.67,1044,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(13,12,5,1,'2024-11-07',9.67,1034.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(14,12,5,1,'2024-11-08',9.67,1024.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(15,12,5,1,'2024-11-09',9.67,1015,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(16,12,5,1,'2024-11-10',9.67,1005.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(17,12,5,1,'2024-11-11',9.67,995.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(18,12,5,1,'2024-11-12',9.67,986,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(19,12,5,1,'2024-11-13',9.67,976.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(20,12,5,1,'2024-11-14',9.67,966.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(21,12,5,1,'2024-11-15',9.67,957,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(22,12,5,1,'2024-11-16',9.67,947.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(23,12,5,1,'2024-11-17',9.67,937.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(24,12,5,1,'2024-11-18',9.67,928,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(25,12,5,1,'2024-11-19',9.67,918.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(26,12,5,1,'2024-11-20',9.67,908.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(27,12,5,1,'2024-11-21',9.67,899,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(28,12,5,1,'2024-11-22',9.67,889.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(29,12,5,1,'2024-11-23',9.67,879.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(30,12,5,1,'2024-11-24',9.67,870,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(31,12,5,1,'2024-11-25',9.67,860.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(32,12,5,1,'2024-11-26',9.67,850.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(33,12,5,1,'2024-11-27',9.67,841,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(34,12,5,1,'2024-11-28',9.67,831.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(35,12,5,1,'2024-11-29',9.67,821.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(36,12,5,1,'2024-11-30',9.67,812,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(37,12,5,1,'2024-12-01',9.67,802.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(38,12,5,1,'2024-12-02',9.67,792.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(39,12,5,1,'2024-12-03',9.67,783,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(40,12,5,1,'2024-12-04',9.67,773.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(41,12,5,1,'2024-12-05',9.67,763.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(42,12,5,1,'2024-12-06',9.67,754,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(43,12,5,1,'2024-12-07',9.67,744.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(44,12,5,1,'2024-12-08',9.67,734.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(45,12,5,1,'2024-12-09',9.67,725,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(46,12,5,1,'2024-12-10',9.67,715.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(47,12,5,1,'2024-12-11',9.67,705.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(48,12,5,1,'2024-12-12',9.67,696,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(49,12,5,1,'2024-12-13',9.67,686.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(50,12,5,1,'2024-12-14',9.67,676.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(51,12,5,1,'2024-12-15',9.67,667,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(52,12,5,1,'2024-12-16',9.67,657.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(53,12,5,1,'2024-12-17',9.67,647.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(54,12,5,1,'2024-12-18',9.67,638,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(55,12,5,1,'2024-12-19',9.67,628.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(56,12,5,1,'2024-12-20',9.67,618.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(57,12,5,1,'2024-12-21',9.67,609,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(58,12,5,1,'2024-12-22',9.67,599.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(59,12,5,1,'2024-12-23',9.67,589.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(60,12,5,1,'2024-12-24',9.67,580,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(61,12,5,1,'2024-12-25',9.67,570.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(62,12,5,1,'2024-12-26',9.67,560.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(63,12,5,1,'2024-12-27',9.67,551,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(64,12,5,1,'2024-12-28',9.67,541.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(65,12,5,1,'2024-12-29',9.67,531.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(66,12,5,1,'2024-12-30',9.67,522,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(67,12,5,1,'2024-12-31',9.67,512.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(68,12,5,1,'2025-01-01',9.67,502.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(69,12,5,1,'2025-01-02',9.67,493,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(70,12,5,1,'2025-01-03',9.67,483.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(71,12,5,1,'2025-01-04',9.67,473.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(72,12,5,1,'2025-01-05',9.67,464,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(73,12,5,1,'2025-01-06',9.67,454.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(74,12,5,1,'2025-01-07',9.67,444.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(75,12,5,1,'2025-01-08',9.67,435,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(76,12,5,1,'2025-01-09',9.67,425.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(77,12,5,1,'2025-01-10',9.67,415.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(78,12,5,1,'2025-01-11',9.67,406,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(79,12,5,1,'2025-01-12',9.67,396.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(80,12,5,1,'2025-01-13',9.67,386.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(81,12,5,1,'2025-01-14',9.67,377,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(82,12,5,1,'2025-01-15',9.67,367.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(83,12,5,1,'2025-01-16',9.67,357.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(84,12,5,1,'2025-01-17',9.67,348,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(85,12,5,1,'2025-01-18',9.67,338.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(86,12,5,1,'2025-01-19',9.67,328.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(87,12,5,1,'2025-01-20',9.67,319,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(88,12,5,1,'2025-01-21',9.67,309.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(89,12,5,1,'2025-01-22',9.67,299.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(90,12,5,1,'2025-01-23',9.67,290,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(91,12,5,1,'2025-01-24',9.67,280.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(92,12,5,1,'2025-01-25',9.67,270.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(93,12,5,1,'2025-01-26',9.67,261,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(94,12,5,1,'2025-01-27',9.67,251.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(95,12,5,1,'2025-01-28',9.67,241.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(96,12,5,1,'2025-01-29',9.67,232,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(97,12,5,1,'2025-01-30',9.67,222.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(98,12,5,1,'2025-01-31',9.67,212.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(99,12,5,1,'2025-02-01',9.67,203,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(100,12,5,1,'2025-02-02',9.67,193.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(101,12,5,1,'2025-02-03',9.67,183.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(102,12,5,1,'2025-02-04',9.67,174,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(103,12,5,1,'2025-02-05',9.67,164.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(104,12,5,1,'2025-02-06',9.67,154.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(105,12,5,1,'2025-02-07',9.67,145,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(106,12,5,1,'2025-02-08',9.67,135.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(107,12,5,1,'2025-02-09',9.67,125.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(108,12,5,1,'2025-02-10',9.67,116,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(109,12,5,1,'2025-02-11',9.67,106.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(110,12,5,1,'2025-02-12',9.67,96.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(111,12,5,1,'2025-02-13',9.67,87,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(112,12,5,1,'2025-02-14',9.67,77.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(113,12,5,1,'2025-02-15',9.67,67.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(114,12,5,1,'2025-02-16',9.67,58,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(115,12,5,1,'2025-02-17',9.67,48.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(116,12,5,1,'2025-02-18',9.67,38.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(117,12,5,1,'2025-02-19',9.67,29,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(118,12,5,1,'2025-02-20',9.67,19.33,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(119,12,5,1,'2025-02-21',9.67,9.67,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL),(120,12,5,1,'2025-02-22',9.67,0,'due','2024-10-26 09:32:28','2024-10-26 09:32:28',NULL);
/*!40000 ALTER TABLE `emis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan_types`
--

DROP TABLE IF EXISTS `loan_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loan_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` text DEFAULT NULL,
  `interest` double(8,2) DEFAULT NULL,
  `loan_terms` int(11) DEFAULT NULL,
  `day_month_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_types`
--

LOCK TABLES `loan_types` WRITE;
/*!40000 ALTER TABLE `loan_types` DISABLE KEYS */;
INSERT INTO `loan_types` VALUES (1,'abc',10.00,120,'Day','2024-10-26 03:36:04','2024-10-26 03:36:04',NULL),(2,'ShortTerm',16.00,120,'Day','2024-10-26 04:57:38','2024-10-26 04:57:38',NULL);
/*!40000 ALTER TABLE `loan_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markets`
--

DROP TABLE IF EXISTS `markets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `market_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markets`
--

LOCK TABLES `markets` WRITE;
/*!40000 ALTER TABLE `markets` DISABLE KEYS */;
INSERT INTO `markets` VALUES (1,'demo','2024-10-26 03:36:17','2024-10-26 03:36:17',NULL);
/*!40000 ALTER TABLE `markets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_10_26_043306_create_wallets_table',2),(6,'2024_10_26_043243_create_markets_table',3),(7,'2024_10_26_050044_create_loan_types_table',3),(8,'2024_10_26_061732_create_brrowers_table',3),(9,'2024_10_26_065610_create_brrowers_addresses_table',3),(10,'2024_10_26_065635_create_brrowers_loan_details_table',3),(11,'2024_10_26_075218_create_brrowers_bank_details_table',4),(12,'2024_10_26_124829_create_emis_table',5),(13,'2024_10_26_164201_create_transactions_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trans_user_id` int(11) NOT NULL,
  `trans_loan_id` int(11) NOT NULL,
  `trans_emi_id` int(11) NOT NULL,
  `trans_emi_amount` double(8,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,12,5,2,10.00,'2024-10-27',NULL,'pending','2024-10-26 22:57:01','2024-10-26 22:57:01');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `father_husband_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `aadhar_no` varchar(255) DEFAULT NULL,
  `pan_no` varchar(255) DEFAULT NULL,
  `voter_card_no` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `occupation_address` text DEFAULT NULL,
  `occupation_remarks` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `avater` text DEFAULT NULL,
  `avater_file` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Admin',NULL,NULL,NULL,'admin@gmail.com','admin',NULL,'$2y$10$qIxFOkPUkbkdqOsAQuSAoeceTOUd0MpfIWniMIE18mjt5eBTwJEZG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,'','Jarrod','Ariel Alvarez','Edwards','jiban@jiban.com','brrowers',NULL,'','Cyrus Valentine','Male','1996-11-05','202','83','540','477','Nobis eaque facilis','Molestiae quia id qu','Sed et fugiat nesciu','Blanditiis consectet','profile_images/671cb092c687a.jpg',NULL,NULL,NULL,'2024-10-26 03:34:18','2024-10-26 03:34:18'),(8,NULL,'','Laurel','Gil Dominguez','Lawrence','laurel@jiban.com','brrowers',NULL,'','Brody Cain','Male','2005-09-03','244','244','477','606','Occaecat eius eum es','Repellendus Eos co','Sit nisi sequi solu','Sit in unde cillum','profile_images/671cdab097fa4.jpg',NULL,NULL,NULL,'2024-10-26 06:34:00','2024-10-26 06:34:00'),(10,NULL,'','Laurelss','Gil Dominguez','Lawrence','laurelss@jiban.com','brrowers',NULL,'','Brody Cain','Male','2005-09-03','244','244','477','606','Occaecat eius eum es','Repellendus Eos co','Sit nisi sequi solu','Sit in unde cillum','profile_images/671cdad7352f6.jpg',NULL,NULL,NULL,'2024-10-26 06:34:39','2024-10-26 06:34:39'),(11,NULL,'','Adara','Ferris Frazier','Richardson','adara@jiban.com','brrowers',NULL,'','Zahir Camacho','Male','1981-08-05','716','164','292','93','Atque cupiditate aut','Aut aut non cum comm','Amet odio voluptate','Praesentium voluptat','profile_images/671ce31ea39c8.jpg',NULL,NULL,NULL,'2024-10-26 07:09:58','2024-10-26 07:09:58'),(12,NULL,'','Carlos','Octavius Cannon','Acosta','carlos@jiban.com','brrowers',NULL,'','Cailin Cohen','Male','1985-06-13','310','676','874','215','Cupiditate harum qua','Id et nostrum conseq','Error eum recusandae','Eligendi ab earum pr','profile_images/671d0272dc4fe.jpg',NULL,NULL,NULL,'2024-10-26 09:23:38','2024-10-26 09:23:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` VALUES (1,0,'admin','10002','adds','Cash','2024-10-25 23:43:34','2024-10-26 00:09:17',NULL),(2,0,'Lillian Villarreal','1000','wew','Cash','2024-10-25 23:43:59','2024-10-25 23:43:59',NULL),(3,0,'Idona Caldwell','2','Magnam ut dolor volu','Cash','2024-10-25 23:55:14','2024-10-25 23:55:14',NULL),(4,0,'Stacey Carroll','3','In cillum inventore','Cash','2024-10-26 00:04:31','2024-10-26 00:04:31',NULL);
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-27 15:42:47
