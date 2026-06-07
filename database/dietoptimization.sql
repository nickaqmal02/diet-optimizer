-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: dietoptimization
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-admin@test.com|127.0.0.1','i:4;',1780833197),('laravel-cache-admin@test.com|127.0.0.1:timer','i:1780833197;',1780833197);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
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
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
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
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `carbs` int(11) NOT NULL,
  `fats` int(11) NOT NULL,
  `fiber` int(11) NOT NULL DEFAULT 0,
  `serving_size` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` VALUES (1,'Sardines (3 pieces)','Protein',4.50,220,25,0,12,0,'3 pieces',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(2,'Fried Chicken (1 Piece)','Protein',4.00,290,20,15,18,0,'1 piece',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(3,'Fried Egg','Protein',1.80,90,7,1,7,0,'1 piece',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(4,'Boiled Egg (2 pieces)','Protein',2.00,140,12,1,10,0,'2 pieces',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(5,'Tofu (3 pieces)','Plant Protein',2.00,120,10,4,7,1,'3 pieces',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(6,'Tempeh (2 pieces)','Plant Protein',1.50,150,12,8,7,2,'2 pieces',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(7,'White Rice','Carbs',1.50,200,4,45,0,1,'1 plate',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(8,'Mixed Vegetables','Vegetables',2.50,80,3,10,3,4,'1 serving',1,'2026-05-27 20:01:30','2026-05-27 20:01:30'),(9,'Chicken Tenders','Protein',2.00,209,40,0,0,0,'2 piece',1,'2026-05-27 21:54:49','2026-05-27 21:54:49'),(10,'Chicken Tenders','Protein',2.00,209,40,0,0,0,'2 piece',1,'2026-05-27 21:55:57','2026-05-27 21:55:57'),(11,'Chicken Tenders','Protein',2.00,209,40,0,0,0,'2 piece',1,'2026-05-27 21:58:04','2026-05-27 21:58:04'),(12,'Sardines (3 pieces)','Protein',4.50,220,25,0,12,0,'3 pieces',1,'2026-05-28 06:52:56','2026-05-28 06:52:56');
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal_recommendations`
--

DROP TABLE IF EXISTS `meal_recommendations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meal_recommendations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `budget_used` decimal(8,2) NOT NULL,
  `total_calories` int(11) NOT NULL,
  `total_protein` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `food_combination` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`food_combination`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meal_recommendations_user_id_foreign` (`user_id`),
  CONSTRAINT `meal_recommendations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal_recommendations`
--

LOCK TABLES `meal_recommendations` WRITE;
/*!40000 ALTER TABLE `meal_recommendations` DISABLE KEYS */;
INSERT INTO `meal_recommendations` VALUES (1,3,10.00,707,123,8.50,'\"[{\\\"id\\\":8,\\\"name\\\":\\\"Mixed Vegetables\\\",\\\"category\\\":\\\"Vegetables\\\",\\\"price\\\":\\\"2.50\\\",\\\"calories\\\":80,\\\"protein\\\":3,\\\"carbs\\\":10,\\\"fats\\\":3,\\\"fiber\\\":4,\\\"serving_size\\\":\\\"1 serving\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 03:03:21','2026-05-28 03:03:21'),(2,3,20.00,707,123,8.50,'\"[{\\\"id\\\":8,\\\"name\\\":\\\"Mixed Vegetables\\\",\\\"category\\\":\\\"Vegetables\\\",\\\"price\\\":\\\"2.50\\\",\\\"calories\\\":80,\\\"protein\\\":3,\\\"carbs\\\":10,\\\"fats\\\":3,\\\"fiber\\\":4,\\\"serving_size\\\":\\\"1 serving\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 03:09:21','2026-05-28 03:09:21'),(3,3,5.00,418,80,4.00,'\"[{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"}]\"','2026-05-28 03:09:35','2026-05-28 03:09:35'),(4,3,10.00,707,123,8.50,'\"[{\\\"id\\\":8,\\\"name\\\":\\\"Mixed Vegetables\\\",\\\"category\\\":\\\"Vegetables\\\",\\\"price\\\":\\\"2.50\\\",\\\"calories\\\":80,\\\"protein\\\":3,\\\"carbs\\\":10,\\\"fats\\\":3,\\\"fiber\\\":4,\\\"serving_size\\\":\\\"1 serving\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 03:13:22','2026-05-28 03:13:22'),(5,3,10.00,707,123,8.50,'\"[{\\\"id\\\":8,\\\"name\\\":\\\"Mixed Vegetables\\\",\\\"category\\\":\\\"Vegetables\\\",\\\"price\\\":\\\"2.50\\\",\\\"calories\\\":80,\\\"protein\\\":3,\\\"carbs\\\":10,\\\"fats\\\":3,\\\"fiber\\\":4,\\\"serving_size\\\":\\\"1 serving\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 03:16:29','2026-05-28 03:16:29'),(6,4,10.00,917,140,10.00,'\"[{\\\"id\\\":2,\\\"name\\\":\\\"Fried Chicken (1 Piece)\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"4.00\\\",\\\"calories\\\":290,\\\"protein\\\":20,\\\"carbs\\\":15,\\\"fats\\\":18,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"1 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 04:24:07','2026-05-28 04:24:07'),(7,4,10.00,498,83,6.50,'\"[{\\\"id\\\":8,\\\"name\\\":\\\"Mixed Vegetables\\\",\\\"category\\\":\\\"Vegetables\\\",\\\"price\\\":\\\"2.50\\\",\\\"calories\\\":80,\\\"protein\\\":3,\\\"carbs\\\":10,\\\"fats\\\":3,\\\"fiber\\\":4,\\\"serving_size\\\":\\\"1 serving\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"}]\"','2026-05-28 04:24:27','2026-05-28 04:24:27'),(8,4,50.00,847,145,10.50,'\"[{\\\"id\\\":1,\\\"name\\\":\\\"Sardines (3 pieces)\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"4.50\\\",\\\"calories\\\":220,\\\"protein\\\":25,\\\"carbs\\\":0,\\\"fats\\\":12,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"3 pieces\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 04:34:40','2026-05-28 04:34:40'),(9,4,20.00,847,145,10.50,'\"[{\\\"id\\\":1,\\\"name\\\":\\\"Sardines (3 pieces)\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"4.50\\\",\\\"calories\\\":220,\\\"protein\\\":25,\\\"carbs\\\":0,\\\"fats\\\":12,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"3 pieces\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 04:35:02','2026-05-28 04:35:02'),(10,4,30.00,847,145,10.50,'\"[{\\\"id\\\":1,\\\"name\\\":\\\"Sardines (3 pieces)\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"4.50\\\",\\\"calories\\\":220,\\\"protein\\\":25,\\\"carbs\\\":0,\\\"fats\\\":12,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"3 pieces\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 04:35:17','2026-05-28 04:35:17'),(11,5,8.00,747,130,8.00,'\"[{\\\"id\\\":5,\\\"name\\\":\\\"Tofu (3 pieces)\\\",\\\"category\\\":\\\"Plant Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":120,\\\"protein\\\":10,\\\"carbs\\\":4,\\\"fats\\\":7,\\\"fiber\\\":1,\\\"serving_size\\\":\\\"3 pieces\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-05-28 05:11:20','2026-05-28 05:11:20'),(12,4,10.00,917,140,10.00,'\"[{\\\"id\\\":2,\\\"name\\\":\\\"Fried Chicken (1 Piece)\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"4.00\\\",\\\"calories\\\":290,\\\"protein\\\":20,\\\"carbs\\\":15,\\\"fats\\\":18,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"1 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-06-03 18:25:58','2026-06-03 18:25:58'),(13,4,10.00,917,140,10.00,'\"[{\\\"id\\\":2,\\\"name\\\":\\\"Fried Chicken (1 Piece)\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"4.00\\\",\\\"calories\\\":290,\\\"protein\\\":20,\\\"carbs\\\":15,\\\"fats\\\":18,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"1 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"},{\\\"id\\\":11,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:58:04.000000Z\\\"}]\"','2026-06-03 18:26:24','2026-06-03 18:26:24'),(14,4,10.00,498,83,6.50,'\"[{\\\"id\\\":8,\\\"name\\\":\\\"Mixed Vegetables\\\",\\\"category\\\":\\\"Vegetables\\\",\\\"price\\\":\\\"2.50\\\",\\\"calories\\\":80,\\\"protein\\\":3,\\\"carbs\\\":10,\\\"fats\\\":3,\\\"fiber\\\":4,\\\"serving_size\\\":\\\"1 serving\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T04:01:30.000000Z\\\"},{\\\"id\\\":9,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:54:49.000000Z\\\"},{\\\"id\\\":10,\\\"name\\\":\\\"Chicken Tenders\\\",\\\"category\\\":\\\"Protein\\\",\\\"price\\\":\\\"2.00\\\",\\\"calories\\\":209,\\\"protein\\\":40,\\\"carbs\\\":0,\\\"fats\\\":0,\\\"fiber\\\":0,\\\"serving_size\\\":\\\"2 piece\\\",\\\"is_available\\\":true,\\\"created_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\",\\\"updated_at\\\":\\\"2026-05-28T05:55:57.000000Z\\\"}]\"','2026-06-06 18:50:32','2026-06-06 18:50:32');
/*!40000 ALTER TABLE `meal_recommendations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_27_144730_create_students_table',1),(5,'2026_05_28_004114_create_foods_table',1),(6,'2026_05_28_095925_add_is_admin_to_users_table',2),(7,'2026_05_28_100331_add_student_fields_to_users_table',3),(8,'2026_05_28_101258_create_meal_recommendations_table',4);
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
INSERT INTO `password_reset_tokens` VALUES ('ainur@gmail.com','$2y$12$BMuxX5GdP4hulz.a4NEGsOlE5yIz.jArEbDCIeusc/WnSjS6XcFhi','2026-05-28 05:04:21'),('nikabdulaqmal@gmail.com','$2y$12$LssIowPOBMafkSXmZVA0ruFTV/15L5Oen4sYc4YGWPNK.sCJ3wopa','2026-05-28 05:05:29');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('BAE7mPBP3n3vpjQmViy56ySIGaRokEQXXn5ilZdh',4,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJwaFhpb2pmWE5QeVUxNFRlTER4cDVjRUpiSWM4TWZLMEp3RkNLcm1wIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3N0dWRlbnRcL2Rhc2hib2FyZCIsInJvdXRlIjoic3R1ZGVudC5kYXNoYm9hcmQifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjR9',1780833687),('l5ggm6y3tlWJSvq35qXuWDjTngP5yF4nfi8kGWly',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJFWFhaVUdud09mRzA2ZjhBdTI1eXhXR0hGVXlOZ2s2Q1NWaENHSWFKIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6bnVsbH19',1780540007),('Pg4KhDuDV6chuYu2BFEbdD9IDYROUHUPsZkXFTSA',4,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJkam9udmlYVHJSUGkyWUFTQ2V5Z29EejVIUzNsWXlFaTBjMlc5WU16IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zdHVkZW50XC9wcm9maWxlIiwicm91dGUiOiJzdHVkZW50LnByb2ZpbGUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NH0=',1780800650);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `weight_kg` decimal(5,1) NOT NULL,
  `height_cm` decimal(5,1) NOT NULL,
  `activity_level` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `budget_rm` decimal(8,2) NOT NULL,
  `bmr_calories` decimal(8,2) NOT NULL,
  `tdee_calories` decimal(8,2) NOT NULL,
  `target_calories_per_day` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'ali','nkask@gamail.com',21,'male',69.5,170.0,'light','lose',5.00,1657.50,2279.06,1779.06,'2026-05-27 23:49:54','2026-05-27 23:49:54'),(2,'ainur mardiah','ainur@gmail.com',20,'female',50.0,155.0,'sedentary','gain',10.00,1207.75,1449.30,1749.30,'2026-05-27 23:50:37','2026-05-27 23:50:37');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `weight_kg` decimal(5,1) DEFAULT NULL,
  `height_cm` decimal(5,1) DEFAULT NULL,
  `activity_level` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `budget_rm` decimal(8,2) DEFAULT NULL,
  `bmr_calories` decimal(8,2) DEFAULT NULL,
  `tdee_calories` decimal(8,2) DEFAULT NULL,
  `target_calories_per_day` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2026-05-27 20:00:37','$2y$12$8ChpO7rmmi4cH.ySZC4QEuYG2xelC6OYexalbpvPZ4B8j0mCrmzBu','s6gjLRTfJu','2026-05-27 20:00:38','2026-05-27 20:00:38',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Admin User','admin@diet.com',NULL,'$2y$12$neh6tij.h0J54XIVmBukdOwcCu7PS/CNQYRDXs49eYTJYtCSKqPlO',NULL,'2026-05-28 02:04:38','2026-05-28 02:10:37',1,30,'male',70.0,170.0,'moderate','maintain',10.00,1617.50,2507.13,2507.13),(3,'bubadibako 😎','bubadibako@test.com',NULL,'$2y$12$Z5c7Ja0PlphLYewAHFt.5eJI4wI11VnfR0nPmEQ66Xl4BU/dKATb2',NULL,'2026-05-28 02:11:09','2026-05-28 04:20:34',0,26,'male',72.6,172.0,'light','lose',10.00,1676.00,2304.50,1804.50),(4,'aflin shauki','ainur@gmail.com',NULL,'$2y$12$BZ6SONjOfAOWwYh3PitVh.Djluby0YAjBvCTUjz49205YAm4om3cm',NULL,'2026-05-28 04:22:14','2026-06-06 18:50:16',0,NULL,NULL,49.0,156.0,'sedentary','lose',10.00,1304.00,1564.80,1200.00),(5,'nicki','nikabdulaqmal@gmail.com',NULL,'$2y$12$JOeCwSd3uoZtIpmjHjJiKuHVPNDN1cxMv9ddE1bBu6TcjmfG6ahOS',NULL,'2026-05-28 05:05:13','2026-05-28 05:11:14',0,NULL,NULL,67.0,171.0,'moderate','lose',6.00,1577.75,2445.51,1945.51),(6,'Admin User','admin@test.com',NULL,'$2y$12$d95mr2RpwsH4l9Q.Wvmwr.Ee8vhtjGkqP5sLwRQVkmQd/WVr5eK5C',NULL,'2026-05-28 05:29:30','2026-05-28 05:29:30',1,25,'male',70.0,170.0,'moderate','maintain',10.00,1642.50,2545.88,2545.88),(7,'Admin Ainur','AdminAinur@example.com',NULL,'$2y$12$c92ziVYfVw4l3sGXDr9N4uIrod0nZhzTWrnM5e.K5h8bR61uME3jq',NULL,'2026-06-07 03:57:16','2026-06-07 03:57:16',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-07 20:36:54
