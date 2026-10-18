-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: tes-minat-bakat-nabilahjunita17.a.aivencloud.com    Database: defaultdb
-- ------------------------------------------------------
-- Server version	8.4.8

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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
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
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
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
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
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
-- Table structure for table `jurusan_kuliahs`
--

DROP TABLE IF EXISTS `jurusan_kuliahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan_kuliahs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan_kuliahs`
--

LOCK TABLES `jurusan_kuliahs` WRITE;
/*!40000 ALTER TABLE `jurusan_kuliahs` DISABLE KEYS */;
INSERT INTO `jurusan_kuliahs` VALUES (1,'S1 Teknik Dirgantara',NULL,'2026-09-02 08:39:59','2026-09-02 08:39:59'),(2,'S1 Teknik Mesin',NULL,'2026-09-02 08:40:00','2026-09-02 08:40:00'),(3,'D3 Aeronautika',NULL,'2026-09-02 08:40:00','2026-09-02 08:40:00'),(4,'S1 Teknik Industri',NULL,'2026-09-02 08:40:00','2026-09-02 08:40:00'),(5,'S1 Informatika',NULL,'2026-09-02 08:40:00','2026-09-02 08:40:00'),(6,'S1 Teknik Elektro',NULL,'2026-09-02 08:40:01','2026-09-02 08:40:01'),(7,'S1 Manajemen',NULL,'2026-09-02 08:40:01','2026-09-02 08:40:01'),(8,'S1 Hukum',NULL,'2026-09-02 08:40:01','2026-09-02 08:40:01'),(9,'D3 Farmasi',NULL,'2026-09-02 08:40:01','2026-09-02 08:40:01'),(10,'D3 Gizi',NULL,'2026-09-02 08:40:02','2026-09-02 08:40:02'),(11,'D3 Radiologi',NULL,'2026-09-02 08:40:02','2026-09-02 08:40:02');
/*!40000 ALTER TABLE `jurusan_kuliahs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_12_080755_add_student_fields_to_users_table',2),(5,'2026_08_13_040200_create_jurusan_kuliahs_table',3),(6,'2026_08_13_040224_create_tes_results_table',3),(7,'2026_08_13_081247_add_otp_fields_to_password_reset_tokens_table',3),(8,'2026_08_20_080541_add_profile_photo_to_users_table',4),(9,'2026_09_02_025708_create_pertanyaans_table',5),(10,'2026_09_02_025743_create_opsi_jawabans_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opsi_jawabans`
--

DROP TABLE IF EXISTS `opsi_jawabans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opsi_jawabans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` bigint unsigned NOT NULL,
  `label` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_opsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_kuliah_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opsi_jawabans_pertanyaan_id_foreign` (`pertanyaan_id`),
  KEY `opsi_jawabans_jurusan_kuliah_id_foreign` (`jurusan_kuliah_id`),
  CONSTRAINT `opsi_jawabans_jurusan_kuliah_id_foreign` FOREIGN KEY (`jurusan_kuliah_id`) REFERENCES `jurusan_kuliahs` (`id`),
  CONSTRAINT `opsi_jawabans_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opsi_jawabans`
--

LOCK TABLES `opsi_jawabans` WRITE;
/*!40000 ALTER TABLE `opsi_jawabans` DISABLE KEYS */;
INSERT INTO `opsi_jawabans` VALUES (1,1,'A','soal/1/1A.jpe',2,'2026-09-02 08:40:11','2026-09-02 08:40:11'),(2,1,'B','soal/1/1B.jpe',5,'2026-09-02 08:40:12','2026-09-02 08:40:12'),(3,1,'C','soal/1/1C.jpe',4,'2026-09-02 08:40:12','2026-09-02 08:40:12'),(4,1,'D','soal/1/1D.jpe',6,'2026-09-02 08:40:12','2026-09-02 08:40:12'),(5,2,'A','soal/2/2A.jpe',1,'2026-09-02 08:40:13','2026-09-02 08:40:13'),(6,2,'B','soal/2/2B.jpe',3,'2026-09-02 08:40:13','2026-09-02 08:40:13'),(7,2,'C','soal/2/2C.jpe',9,'2026-09-02 08:40:13','2026-09-02 08:40:13'),(8,2,'D','soal/2/2D.jpe',11,'2026-09-02 08:40:14','2026-09-02 08:40:14'),(9,3,'A','soal/3/3A.jpe',7,'2026-09-02 08:40:14','2026-09-02 08:40:14'),(10,3,'B','soal/3/3B.jpe',8,'2026-09-02 08:40:14','2026-09-02 08:40:14'),(11,3,'C','soal/3/3C.jpe',10,'2026-09-02 08:40:15','2026-09-02 08:40:15'),(12,3,'D','soal/3/3D.jpe',5,'2026-09-02 08:40:15','2026-09-02 08:40:15'),(13,4,'A','soal/4/4A.jpe',2,'2026-09-02 08:40:15','2026-09-02 08:40:15'),(14,4,'B','soal/4/4B.jpe',6,'2026-09-02 08:40:16','2026-09-02 08:40:16'),(15,4,'C','soal/4/4C.jpe',4,'2026-09-02 08:40:16','2026-09-02 08:40:16'),(16,4,'D','soal/4/4D.jpe',1,'2026-09-02 08:40:16','2026-09-02 08:40:16'),(17,5,'A','soal/5/5A.jpe',1,'2026-09-02 08:40:17','2026-09-02 08:40:17'),(18,5,'B','soal/5/5B.jpe',3,'2026-09-02 08:40:17','2026-09-02 08:40:17'),(19,5,'C','soal/5/5C.jpe',9,'2026-09-02 08:40:17','2026-09-02 08:40:17'),(20,5,'D','soal/5/5D.jpe',11,'2026-09-02 08:40:17','2026-09-02 08:40:17'),(21,6,'A','soal/6/6A.jpe',4,'2026-09-02 08:40:18','2026-09-02 08:40:18'),(22,6,'B','soal/6/6B.jpe',7,'2026-09-02 08:40:18','2026-09-02 08:40:18'),(23,6,'C','soal/6/6C.jpe',8,'2026-09-02 08:40:18','2026-09-02 08:40:18'),(24,6,'D','soal/6/6D.jpe',10,'2026-09-02 08:40:19','2026-09-02 08:40:19'),(25,7,'A','soal/7/7A.jpe',5,'2026-09-02 08:40:19','2026-09-02 08:40:19'),(26,7,'B','soal/7/7B.jpe',6,'2026-09-02 08:40:20','2026-09-02 08:40:20'),(27,7,'C','soal/7/7C.jpe',2,'2026-09-02 08:40:20','2026-09-02 08:40:20'),(28,7,'D','soal/7/7D.jpe',3,'2026-09-02 08:40:20','2026-09-02 08:40:20'),(29,8,'A','soal/8/8A.jpe',1,'2026-09-02 08:40:21','2026-09-02 08:40:21'),(30,8,'B','soal/8/8B.jpe',2,'2026-09-02 08:40:21','2026-09-02 08:40:21'),(31,8,'C','soal/8/8C.jpe',9,'2026-09-02 08:40:21','2026-09-02 08:40:21'),(32,8,'D','soal/8/8D.jpe',11,'2026-09-02 08:40:21','2026-09-02 08:40:21'),(33,9,'A','soal/9/9A.jpe',7,'2026-09-02 08:40:22','2026-09-02 08:40:22'),(34,9,'B','soal/9/9B.jpe',8,'2026-09-02 08:40:22','2026-09-02 08:40:22'),(35,9,'C','soal/9/9C.jpe',10,'2026-09-02 08:40:22','2026-09-02 08:40:22'),(36,9,'D','soal/9/9D.jpe',5,'2026-09-02 08:40:23','2026-09-02 08:40:23'),(37,10,'A','soal/10/10A.jpe',4,'2026-09-02 08:40:23','2026-09-02 08:40:23'),(38,10,'B','soal/10/10B.jpe',6,'2026-09-02 08:40:23','2026-09-02 08:40:23'),(39,10,'C','soal/10/10C.jpe',2,'2026-09-02 08:40:24','2026-09-02 08:40:24'),(40,10,'D','soal/10/10D.jpe',3,'2026-09-02 08:40:24','2026-09-02 08:40:24'),(41,11,'A','soal/11/11A.jpe',1,'2026-09-02 08:40:25','2026-09-02 08:40:25'),(42,11,'B','soal/11/11B.jpe',2,'2026-09-02 08:40:25','2026-09-02 08:40:25'),(43,11,'C','soal/11/11C.jpe',9,'2026-09-02 08:40:25','2026-09-02 08:40:25'),(44,11,'D','soal/11/11D.jpe',11,'2026-09-02 08:40:25','2026-09-02 08:40:25'),(45,12,'A','soal/12/12A.jpe',7,'2026-09-02 08:40:26','2026-09-02 08:40:26'),(46,12,'B','soal/12/12B.jpe',8,'2026-09-02 08:40:26','2026-09-02 08:40:26'),(47,12,'C','soal/12/12C.jpe',10,'2026-09-02 08:40:27','2026-09-02 08:40:27'),(48,12,'D','soal/12/12D.jpe',5,'2026-09-02 08:40:27','2026-09-02 08:40:27'),(49,13,'A','soal/13/13A.jpe',4,'2026-09-02 08:40:27','2026-09-02 08:40:27'),(50,13,'B','soal/13/13B.jpe',6,'2026-09-02 08:40:28','2026-09-02 08:40:28'),(51,13,'C','soal/13/13C.jpe',2,'2026-09-02 08:40:28','2026-09-02 08:40:28'),(52,13,'D','soal/13/13D.jpe',3,'2026-09-02 08:40:28','2026-09-02 08:40:28'),(53,14,'A','soal/14/14A.jpe',1,'2026-09-02 08:40:29','2026-09-02 08:40:29'),(54,14,'B','soal/14/14B.jpe',2,'2026-09-02 08:40:29','2026-09-02 08:40:29'),(55,14,'C','soal/14/14C.jpe',9,'2026-09-02 08:40:29','2026-09-02 08:40:29'),(56,14,'D','soal/14/14D.jpe',11,'2026-09-02 08:40:29','2026-09-02 08:40:29'),(57,15,'A','soal/15/15A.jpe',7,'2026-09-02 08:40:30','2026-09-02 08:40:30'),(58,15,'B','soal/15/15B.jpe',8,'2026-09-02 08:40:30','2026-09-02 08:40:30'),(59,15,'C','soal/15/15C.jpe',10,'2026-09-02 08:40:31','2026-09-02 08:40:31'),(60,15,'D','soal/15/15D.jpe',5,'2026-09-02 08:40:31','2026-09-02 08:40:31'),(61,16,'A','soal/16/16A.jpe',4,'2026-09-02 08:40:31','2026-09-02 08:40:31'),(62,16,'B','soal/16/16B.jpe',6,'2026-09-02 08:40:32','2026-09-02 08:40:32'),(63,16,'C','soal/16/16C.jpe',2,'2026-09-02 08:40:32','2026-09-02 08:40:32'),(64,16,'D','soal/16/16D.jpe',3,'2026-09-02 08:40:32','2026-09-02 08:40:32'),(65,17,'A','soal/17/17A.jpe',1,'2026-09-02 08:40:33','2026-09-02 08:40:33'),(66,17,'B','soal/17/17B.jpe',2,'2026-09-02 08:40:33','2026-09-02 08:40:33'),(67,17,'C','soal/17/17C.jpe',9,'2026-09-02 08:40:33','2026-09-02 08:40:33'),(68,17,'D','soal/17/17D.jpe',11,'2026-09-02 08:40:33','2026-09-02 08:40:33'),(69,18,'A','soal/18/18A.jpe',7,'2026-09-02 08:40:34','2026-09-02 08:40:34'),(70,18,'B','soal/18/18B.jpe',8,'2026-09-02 08:40:34','2026-09-02 08:40:34'),(71,18,'C','soal/18/18C.jpe',10,'2026-09-02 08:40:34','2026-09-02 08:40:34'),(72,18,'D','soal/18/18D.jpe',5,'2026-09-02 08:40:35','2026-09-02 08:40:35'),(73,19,'A','soal/19/19A.jpe',4,'2026-09-02 08:40:35','2026-09-02 08:40:35'),(74,19,'B','soal/19/19B.jpe',6,'2026-09-02 08:40:35','2026-09-02 08:40:35'),(75,19,'C','soal/19/19C.jpe',2,'2026-09-02 08:40:36','2026-09-02 08:40:36'),(76,19,'D','soal/19/19D.jpe',3,'2026-09-02 08:40:36','2026-09-02 08:40:36'),(77,20,'A','soal/20/20A.jpe',1,'2026-09-02 08:40:36','2026-09-02 08:40:36'),(78,20,'B','soal/20/20B.jpe',2,'2026-09-02 08:40:37','2026-09-02 08:40:37'),(79,20,'C','soal/20/20C.jpe',9,'2026-09-02 08:40:37','2026-09-02 08:40:37'),(80,20,'D','soal/20/20D.jpe',11,'2026-09-02 08:40:37','2026-09-02 08:40:37'),(81,21,'A','soal/21/21A.jpe',7,'2026-09-02 08:40:38','2026-09-02 08:40:38'),(82,21,'B','soal/21/21B.jpe',8,'2026-09-02 08:40:38','2026-09-02 08:40:38'),(83,21,'C','soal/21/21C.jpe',10,'2026-09-02 08:40:38','2026-09-02 08:40:38'),(84,21,'D','soal/21/21D.jpe',5,'2026-09-02 08:40:39','2026-09-02 08:40:39'),(85,22,'A','soal/22/22A.jpe',4,'2026-09-02 08:40:39','2026-09-02 08:40:39'),(86,22,'B','soal/22/22B.jpe',6,'2026-09-02 08:40:39','2026-09-02 08:40:39'),(87,22,'C','soal/22/22C.jpe',2,'2026-09-02 08:40:40','2026-09-02 08:40:40'),(88,22,'D','soal/22/22D.jpe',3,'2026-09-02 08:40:40','2026-09-02 08:40:40'),(89,23,'A','soal/23/23A.jpe',1,'2026-09-02 08:40:40','2026-09-02 08:40:40'),(90,23,'B','soal/23/23B.jpe',2,'2026-09-02 08:40:41','2026-09-02 08:40:41'),(91,23,'C','soal/23/23C.jpe',9,'2026-09-02 08:40:41','2026-09-02 08:40:41'),(92,23,'D','soal/23/23D.jpe',11,'2026-09-02 08:40:41','2026-09-02 08:40:41'),(93,24,'A','soal/24/24A.jpe',7,'2026-09-02 08:40:42','2026-09-02 08:40:42'),(94,24,'B','soal/24/24B.jpe',8,'2026-09-02 08:40:42','2026-09-02 08:40:42'),(95,24,'C','soal/24/24C.jpe',10,'2026-09-02 08:40:42','2026-09-02 08:40:42'),(96,24,'D','soal/24/24D.jpe',5,'2026-09-02 08:40:42','2026-09-02 08:40:42'),(97,25,'A','soal/25/25A.jpe',4,'2026-09-02 08:40:43','2026-09-02 08:40:43'),(98,25,'B','soal/25/25B.jpe',6,'2026-09-02 08:40:43','2026-09-02 08:40:43'),(99,25,'C','soal/25/25C.jpe',2,'2026-09-02 08:40:43','2026-09-02 08:40:43'),(100,25,'D','soal/25/25D.jpe',3,'2026-09-02 08:40:44','2026-09-02 08:40:44'),(101,26,'A','soal/26/26A.jpe',1,'2026-09-02 08:40:44','2026-09-02 08:40:44'),(102,26,'B','soal/26/26B.jpe',2,'2026-09-02 08:40:44','2026-09-02 08:40:44'),(103,26,'C','soal/26/26C.jpe',9,'2026-09-02 08:40:45','2026-09-02 08:40:45'),(104,26,'D','soal/26/26D.jpe',11,'2026-09-02 08:40:45','2026-09-02 08:40:45'),(105,27,'A','soal/27/27A.jpe',7,'2026-09-02 08:40:45','2026-09-02 08:40:45'),(106,27,'B','soal/27/27B.jpe',8,'2026-09-02 08:40:46','2026-09-02 08:40:46'),(107,27,'C','soal/27/27C.jpe',10,'2026-09-02 08:40:46','2026-09-02 08:40:46'),(108,27,'D','soal/27/27D.jpe',5,'2026-09-02 08:40:46','2026-09-02 08:40:46'),(109,28,'A','soal/28/28A.jpe',4,'2026-09-02 08:40:47','2026-09-02 08:40:47'),(110,28,'B','soal/28/28B.jpe',6,'2026-09-02 08:40:47','2026-09-02 08:40:47'),(111,28,'C','soal/28/28C.jpe',2,'2026-09-02 08:40:47','2026-09-02 08:40:47'),(112,28,'D','soal/28/28D.jpe',3,'2026-09-02 08:40:48','2026-09-02 08:40:48'),(113,29,'A','soal/29/29A.jpe',1,'2026-09-02 08:40:48','2026-09-02 08:40:48'),(114,29,'B','soal/29/29B.jpe',2,'2026-09-02 08:40:48','2026-09-02 08:40:48'),(115,29,'C','soal/29/29C.jpe',9,'2026-09-02 08:40:49','2026-09-02 08:40:49'),(116,29,'D','soal/29/29D.jpe',11,'2026-09-02 08:40:49','2026-09-02 08:40:49'),(117,30,'A','soal/30/30A.jpe',7,'2026-09-02 08:40:49','2026-09-02 08:40:49'),(118,30,'B','soal/30/30B.jpe',8,'2026-09-02 08:40:50','2026-09-02 08:40:50'),(119,30,'C','soal/30/30C.jpe',10,'2026-09-02 08:40:50','2026-09-02 08:40:50'),(120,30,'D','soal/30/30D.jpe',5,'2026-09-02 08:40:50','2026-09-02 08:40:50'),(121,31,'A','soal/31/31A.jpe',4,'2026-09-02 08:40:51','2026-09-02 08:40:51'),(122,31,'B','soal/31/31B.jpe',6,'2026-09-02 08:40:51','2026-09-02 08:40:51'),(123,31,'C','soal/31/31C.jpe',2,'2026-09-02 08:40:51','2026-09-02 08:40:51'),(124,31,'D','soal/31/31D.jpe',3,'2026-09-02 08:40:51','2026-09-02 08:40:51'),(125,32,'A','soal/32/32A.jpe',1,'2026-09-02 08:40:52','2026-09-02 08:40:52'),(126,32,'B','soal/32/32B.jpe',2,'2026-09-02 08:40:52','2026-09-02 08:40:52'),(127,32,'C','soal/32/32C.jpe',9,'2026-09-02 08:40:52','2026-09-02 08:40:52'),(128,32,'D','soal/32/32D.jpe',11,'2026-09-02 08:40:53','2026-09-02 08:40:53'),(129,33,'A','soal/33/33A.jpe',7,'2026-09-02 08:40:53','2026-09-02 08:40:53'),(130,33,'B','soal/33/33B.jpe',8,'2026-09-02 08:40:54','2026-09-02 08:40:54'),(131,33,'C','soal/33/33C.jpe',10,'2026-09-02 08:40:54','2026-09-02 08:40:54'),(132,33,'D','soal/33/33D.jpe',5,'2026-09-02 08:40:54','2026-09-02 08:40:54'),(133,34,'A','soal/34/34A.jpe',4,'2026-09-02 08:40:55','2026-09-02 08:40:55'),(134,34,'B','soal/34/34B.jpe',6,'2026-09-02 08:40:55','2026-09-02 08:40:55'),(135,34,'C','soal/34/34C.jpe',2,'2026-09-02 08:40:55','2026-09-02 08:40:55'),(136,34,'D','soal/34/34D.jpe',3,'2026-09-02 08:40:55','2026-09-02 08:40:55'),(137,35,'A','soal/35/35A.jpe',1,'2026-09-02 08:40:56','2026-09-02 08:40:56'),(138,35,'B','soal/35/35B.jpe',2,'2026-09-02 08:40:56','2026-09-02 08:40:56'),(139,35,'C','soal/35/35C.jpe',9,'2026-09-02 08:40:57','2026-09-02 08:40:57'),(140,35,'D','soal/35/35D.jpe',11,'2026-09-02 08:40:57','2026-09-02 08:40:57'),(141,36,'A','soal/36/36A.jpe',7,'2026-09-02 08:40:57','2026-09-02 08:40:57'),(142,36,'B','soal/36/36B.jpe',8,'2026-09-02 08:40:58','2026-09-02 08:40:58'),(143,36,'C','soal/36/36C.jpe',10,'2026-09-02 08:40:58','2026-09-02 08:40:58'),(144,36,'D','soal/36/36D.jpe',5,'2026-09-02 08:40:58','2026-09-02 08:40:58'),(145,37,'A','soal/37/37A.jpe',4,'2026-09-02 08:40:59','2026-09-02 08:40:59'),(146,37,'B','soal/37/37B.jpe',6,'2026-09-02 08:40:59','2026-09-02 08:40:59'),(147,37,'C','soal/37/37C.jpe',2,'2026-09-02 08:40:59','2026-09-02 08:40:59'),(148,37,'D','soal/37/37D.jpe',3,'2026-09-02 08:41:00','2026-09-02 08:41:00'),(149,38,'A','soal/38/38A.jpe',1,'2026-09-02 08:41:00','2026-09-02 08:41:00'),(150,38,'B','soal/38/38B.jpe',2,'2026-09-02 08:41:00','2026-09-02 08:41:00'),(151,38,'C','soal/38/38C.jpe',9,'2026-09-02 08:41:01','2026-09-02 08:41:01'),(152,38,'D','soal/38/38D.jpe',11,'2026-09-02 08:41:01','2026-09-02 08:41:01'),(153,39,'A','soal/39/39A.jpe',7,'2026-09-02 08:41:01','2026-09-02 08:41:01'),(154,39,'B','soal/39/39B.jpe',8,'2026-09-02 08:41:02','2026-09-02 08:41:02'),(155,39,'C','soal/39/39C.jpe',10,'2026-09-02 08:41:02','2026-09-02 08:41:02'),(156,39,'D','soal/39/39D.jpe',5,'2026-09-02 08:41:02','2026-09-02 08:41:02'),(157,40,'A','soal/40/40A.jpe',4,'2026-09-02 08:41:03','2026-09-02 08:41:03'),(158,40,'B','soal/40/40B.jpe',6,'2026-09-02 08:41:03','2026-09-02 08:41:03'),(159,40,'C','soal/40/40C.jpe',2,'2026-09-02 08:41:03','2026-09-02 08:41:03'),(160,40,'D','soal/40/40D.jpe',3,'2026-09-02 08:41:04','2026-09-02 08:41:04'),(161,41,'A','soal/41/41A.jpe',1,'2026-09-02 08:41:04','2026-09-02 08:41:04'),(162,41,'B','soal/41/41B.jpe',2,'2026-09-02 08:41:04','2026-09-02 08:41:04'),(163,41,'C','soal/41/41C.jpe',9,'2026-09-02 08:41:05','2026-09-02 08:41:05'),(164,41,'D','soal/41/41D.jpe',11,'2026-09-02 08:41:05','2026-09-02 08:41:05'),(165,42,'A','soal/42/42A.jpe',7,'2026-09-02 08:41:06','2026-09-02 08:41:06'),(166,42,'B','soal/42/42B.jpe',8,'2026-09-02 08:41:06','2026-09-02 08:41:06'),(167,42,'C','soal/42/42C.jpe',10,'2026-09-02 08:41:06','2026-09-02 08:41:06'),(168,42,'D','soal/42/42D.jpe',5,'2026-09-02 08:41:06','2026-09-02 08:41:06'),(169,43,'A','soal/43/43A.jpe',4,'2026-09-02 08:41:07','2026-09-02 08:41:07'),(170,43,'B','soal/43/43B.jpe',6,'2026-09-02 08:41:07','2026-09-02 08:41:07'),(171,43,'C','soal/43/43C.jpe',2,'2026-09-02 08:41:07','2026-09-02 08:41:07'),(172,43,'D','soal/43/43D.jpe',3,'2026-09-02 08:41:08','2026-09-02 08:41:08'),(173,44,'A','soal/44/44A.jpe',1,'2026-09-02 08:41:08','2026-09-02 08:41:08'),(174,44,'B','soal/44/44B.jpe',2,'2026-09-02 08:41:08','2026-09-02 08:41:08'),(175,44,'C','soal/44/44C.jpe',9,'2026-09-02 08:41:09','2026-09-02 08:41:09'),(176,44,'D','soal/44/44D.jpe',11,'2026-09-02 08:41:09','2026-09-02 08:41:09'),(177,45,'A','soal/45/45A.jpe',7,'2026-09-02 08:41:09','2026-09-02 08:41:09'),(178,45,'B','soal/45/45B.jpe',8,'2026-09-02 08:41:10','2026-09-02 08:41:10'),(179,45,'C','soal/45/45C.jpe',10,'2026-09-02 08:41:10','2026-09-02 08:41:10'),(180,45,'D','soal/45/45D.jpe',5,'2026-09-02 08:41:10','2026-09-02 08:41:10'),(181,46,'A','soal/46/46A.jpe',4,'2026-09-02 08:41:11','2026-09-02 08:41:11'),(182,46,'B','soal/46/46B.jpe',6,'2026-09-02 08:41:11','2026-09-02 08:41:11'),(183,46,'C','soal/46/46C.jpe',2,'2026-09-02 08:41:11','2026-09-02 08:41:11'),(184,46,'D','soal/46/46D.jpe',3,'2026-09-02 08:41:12','2026-09-02 08:41:12'),(185,47,'A','soal/47/47A.jpe',1,'2026-09-02 08:41:12','2026-09-02 08:41:12'),(186,47,'B','soal/47/47B.jpe',2,'2026-09-02 08:41:12','2026-09-02 08:41:12'),(187,47,'C','soal/47/47C.jpe',9,'2026-09-02 08:41:13','2026-09-02 08:41:13'),(188,47,'D','soal/47/47D.jpe',11,'2026-09-02 08:41:13','2026-09-02 08:41:13'),(189,48,'A','soal/48/48A.jpe',7,'2026-09-02 08:41:13','2026-09-02 08:41:13'),(190,48,'B','soal/48/48B.jpe',8,'2026-09-02 08:41:14','2026-09-02 08:41:14'),(191,48,'C','soal/48/48C.jpe',10,'2026-09-02 08:41:14','2026-09-02 08:41:14'),(192,48,'D','soal/48/48D.jpe',5,'2026-09-02 08:41:14','2026-09-02 08:41:14'),(193,49,'A','soal/49/49A.jpe',4,'2026-09-02 08:41:15','2026-09-02 08:41:15'),(194,49,'B','soal/49/49B.jpe',6,'2026-09-02 08:41:15','2026-09-02 08:41:15'),(195,49,'C','soal/49/49C.jpe',2,'2026-09-02 08:41:15','2026-09-02 08:41:15'),(196,49,'D','soal/49/49D.jpe',3,'2026-09-02 08:41:15','2026-09-02 08:41:15'),(197,50,'A','soal/50/50A.jpe',1,'2026-09-02 08:41:16','2026-09-02 08:41:16'),(198,50,'B','soal/50/50B.jpe',2,'2026-09-02 08:41:16','2026-09-02 08:41:16'),(199,50,'C','soal/50/50C.jpe',5,'2026-09-02 08:41:16','2026-09-02 08:41:16'),(200,50,'D','soal/50/50D.jpe',7,'2026-09-02 08:41:17','2026-09-02 08:41:17');
/*!40000 ALTER TABLE `opsi_jawabans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('andi.web2ti23a3@gmail.com','$2y$12$5rIysN5v7TZEY1KbvciwC.rWAEZYssY2YWhu4VYWoe3Qru.TfJdby','2026-09-30 14:59:47','2026-09-30 15:09:47'),('biancaamoo272@gmail.com','$2y$12$xVg0dm92j7Ge16qSuzl2quV27Go0NdfS1nQ2v.mqDuWHLpEiWNvJK','2026-09-08 03:49:54','2026-09-08 03:59:54'),('gavbastian12@gmail.com','$2y$12$9ZnGcPfeWlaOnmGp/UNbieNiT71W7uxm0..HDgnp90wfvToc86R0u','2026-10-15 04:42:03','2026-10-15 04:52:03'),('nabilahjunita05@gmail.com','$2y$12$/8uORqk9f4sENeQGpfhR9.Vz8GuYyNnBm8hFtG2EcgPolgBh6jxVe','2026-08-12 20:29:51',NULL),('nabilahjunita17@gmail.com','$2y$12$wZc2cC/h1TQJqx.5R/OIY.2LjxV1kxBRkMpyO.M9RSCHftf3SmIxq','2026-09-15 03:12:46','2026-09-15 03:22:46');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pertanyaans`
--

DROP TABLE IF EXISTS `pertanyaans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pertanyaans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_urut` int NOT NULL,
  `teks_pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pertanyaans`
--

LOCK TABLES `pertanyaans` WRITE;
/*!40000 ALTER TABLE `pertanyaans` DISABLE KEYS */;
INSERT INTO `pertanyaans` VALUES (1,1,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:11','2026-09-02 08:40:11'),(2,2,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:13','2026-09-02 08:40:13'),(3,3,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:14','2026-09-02 08:40:14'),(4,4,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:15','2026-09-02 08:40:15'),(5,5,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:16','2026-09-02 08:40:16'),(6,6,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:18','2026-09-02 08:40:18'),(7,7,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:19','2026-09-02 08:40:19'),(8,8,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:20','2026-09-02 08:40:20'),(9,9,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:22','2026-09-02 08:40:22'),(10,10,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:23','2026-09-02 08:40:23'),(11,11,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:24','2026-09-02 08:40:24'),(12,12,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:26','2026-09-02 08:40:26'),(13,13,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:27','2026-09-02 08:40:27'),(14,14,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:28','2026-09-02 08:40:28'),(15,15,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:30','2026-09-02 08:40:30'),(16,16,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:31','2026-09-02 08:40:31'),(17,17,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:32','2026-09-02 08:40:32'),(18,18,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:34','2026-09-02 08:40:34'),(19,19,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:35','2026-09-02 08:40:35'),(20,20,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:36','2026-09-02 08:40:36'),(21,21,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:38','2026-09-02 08:40:38'),(22,22,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:39','2026-09-02 08:40:39'),(23,23,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:40','2026-09-02 08:40:40'),(24,24,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:41','2026-09-02 08:40:41'),(25,25,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:43','2026-09-02 08:40:43'),(26,26,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:44','2026-09-02 08:40:44'),(27,27,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:45','2026-09-02 08:40:45'),(28,28,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:47','2026-09-02 08:40:47'),(29,29,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:48','2026-09-02 08:40:48'),(30,30,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:49','2026-09-02 08:40:49'),(31,31,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:50','2026-09-02 08:40:50'),(32,32,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:52','2026-09-02 08:40:52'),(33,33,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:53','2026-09-02 08:40:53'),(34,34,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:54','2026-09-02 08:40:54'),(35,35,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:56','2026-09-02 08:40:56'),(36,36,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:57','2026-09-02 08:40:57'),(37,37,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:40:59','2026-09-02 08:40:59'),(38,38,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:00','2026-09-02 08:41:00'),(39,39,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:01','2026-09-02 08:41:01'),(40,40,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:03','2026-09-02 08:41:03'),(41,41,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:04','2026-09-02 08:41:04'),(42,42,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:05','2026-09-02 08:41:05'),(43,43,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:07','2026-09-02 08:41:07'),(44,44,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:08','2026-09-02 08:41:08'),(45,45,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:09','2026-09-02 08:41:09'),(46,46,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:11','2026-09-02 08:41:11'),(47,47,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:12','2026-09-02 08:41:12'),(48,48,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:13','2026-09-02 08:41:13'),(49,49,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:14','2026-09-02 08:41:14'),(50,50,'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!','2026-09-02 08:41:16','2026-09-02 08:41:16');
/*!40000 ALTER TABLE `pertanyaans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
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
INSERT INTO `sessions` VALUES ('7KnWLKesZp84fWmBB1oDPXNDXyVg9LRoywhdGs5O',NULL,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVFCUHViTVhlcWlsNVdCbFJEYVR6NHhvdlprdUdGR0hNMkQ3UUc5dyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1792047484),('7UmEz7TBLhbWZjNAFQSRgdSAZiKUvNNOfvuSqH9H',13,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoieXJYc1g4bUM1cXBtZEZ2a3NKWk1EMm1IWWxQSVpFdTRUQTBsdVBocyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTc6InN0dWRlbnQuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7fQ==',1792047504),('hpz4YN1py9JOYyMpCH2MaSGbBU8Ilz44AbZDD0B8',13,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMkpNUHNyc2gzQkx0SkhuSkdGTXRhYnpCalpVbjV5OWJFM2VqWkJIMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTc6InN0dWRlbnQuZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7czoxMToiamF3YWJhbl90ZXMiO2E6MDp7fX0=',1792037884),('pRr7tUjVGNBzyFEp7h4zQEvmPMLtP63pWqq4dQY3',13,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiY0w3RGNNUUlzSFEzUEZWaWVFcVV3U0VHZGlCcjBwRDZjdDJtdHVVTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTc6InN0dWRlbnQuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO3M6MTE6Imphd2FiYW5fdGVzIjthOjA6e319',1792047581),('w1Di7BwaCRmYfQMOL8vTIKBo8qWZuzvpSBtf880b',12,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjlGdjVyUUNaZ0QwZWR5bzNGeXh4Qmc2bjJPaDdVMndRRTVyN1R6QyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9oYXNpbCI7czo1OiJyb3V0ZSI7czo5OiJoYXNpbC50ZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjt9',1792032331),('XNe3y9RuQPQAzoceJvXqQ6LhjTHrqyv4Xf3HLlzO',13,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYWh3SVAwOGlNa21ibFhHQmpXS1dac1FRQzdxQlhJT2xQaXlNWGhRMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTc6InN0dWRlbnQuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7fQ==',1792214025),('XUIDHNkOncCl5KIkhWHp8IJNf5y649tnBlIkglYg',NULL,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmlmZGdMdU1LV2RYdHNNYkljd1c4cW90TEFaRlp6MkloSFgxNlpoMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1792047486),('Z5HtvdEjO91xEkfKnSFUUwvKXY20ZK41dovbH5Df',NULL,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjF2eG02alV4blFIaDA5QzBabnk2SURrRHN4S2c2U0FGVzFidVVqSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92ZXJpZnktb3RwIjtzOjU6InJvdXRlIjtzOjEyOiJwYXNzd29yZC5vdHAiO31zOjExOiJyZXNldF9lbWFpbCI7czoyMjoiZ2F2YmFzdGlhbjEyQGdtYWlsLmNvbSI7fQ==',1792039327);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tes_results`
--

DROP TABLE IF EXISTS `tes_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tes_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `jurusan_rekomendasi_id` bigint unsigned NOT NULL,
  `persentase` decimal(5,2) NOT NULL,
  `detail_skor` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tanggal_tes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tes_results_user_id_foreign` (`user_id`),
  KEY `tes_results_jurusan_rekomendasi_id_foreign` (`jurusan_rekomendasi_id`),
  CONSTRAINT `tes_results_jurusan_rekomendasi_id_foreign` FOREIGN KEY (`jurusan_rekomendasi_id`) REFERENCES `jurusan_kuliahs` (`id`),
  CONSTRAINT `tes_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tes_results_chk_1` CHECK (json_valid(`detail_skor`))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tes_results`
--

LOCK TABLES `tes_results` WRITE;
/*!40000 ALTER TABLE `tes_results` DISABLE KEYS */;
INSERT INTO `tes_results` VALUES (1,13,1,33.33,'[{\"jurusan_id\":1,\"nama_jurusan\":\"S1 Teknik Dirgantara\",\"jawaban_dipilih\":6,\"total_kemunculan\":18,\"persentase\":33.33},{\"jurusan_id\":10,\"nama_jurusan\":\"D3 Gizi\",\"jawaban_dipilih\":5,\"total_kemunculan\":16,\"persentase\":31.25},{\"jurusan_id\":3,\"nama_jurusan\":\"D3 Aeronautika\",\"jawaban_dipilih\":5,\"total_kemunculan\":17,\"persentase\":29.41},{\"jurusan_id\":7,\"nama_jurusan\":\"S1 Manajemen\",\"jawaban_dipilih\":5,\"total_kemunculan\":17,\"persentase\":29.41},{\"jurusan_id\":2,\"nama_jurusan\":\"S1 Teknik Mesin\",\"jawaban_dipilih\":8,\"total_kemunculan\":32,\"persentase\":25},{\"jurusan_id\":11,\"nama_jurusan\":\"D3 Radiologi\",\"jawaban_dipilih\":4,\"total_kemunculan\":16,\"persentase\":25},{\"jurusan_id\":6,\"nama_jurusan\":\"S1 Teknik Elektro\",\"jawaban_dipilih\":4,\"total_kemunculan\":17,\"persentase\":23.53},{\"jurusan_id\":5,\"nama_jurusan\":\"S1 Informatika\",\"jawaban_dipilih\":4,\"total_kemunculan\":18,\"persentase\":22.22},{\"jurusan_id\":8,\"nama_jurusan\":\"S1 Hukum\",\"jawaban_dipilih\":3,\"total_kemunculan\":16,\"persentase\":18.75},{\"jurusan_id\":9,\"nama_jurusan\":\"D3 Farmasi\",\"jawaban_dipilih\":3,\"total_kemunculan\":16,\"persentase\":18.75},{\"jurusan_id\":4,\"nama_jurusan\":\"S1 Teknik Industri\",\"jawaban_dipilih\":3,\"total_kemunculan\":17,\"persentase\":17.65}]','2026-09-02 08:59:18','2026-09-02 08:59:18','2026-09-02 08:59:18'),(2,13,5,100.00,'[{\"jurusan_id\":5,\"nama_jurusan\":\"S1 Informatika\",\"jawaban_dipilih\":18,\"total_kemunculan\":18,\"persentase\":100},{\"jurusan_id\":1,\"nama_jurusan\":\"S1 Teknik Dirgantara\",\"jawaban_dipilih\":16,\"total_kemunculan\":18,\"persentase\":88.89},{\"jurusan_id\":6,\"nama_jurusan\":\"S1 Teknik Elektro\",\"jawaban_dipilih\":5,\"total_kemunculan\":17,\"persentase\":29.41},{\"jurusan_id\":2,\"nama_jurusan\":\"S1 Teknik Mesin\",\"jawaban_dipilih\":8,\"total_kemunculan\":32,\"persentase\":25},{\"jurusan_id\":4,\"nama_jurusan\":\"S1 Teknik Industri\",\"jawaban_dipilih\":2,\"total_kemunculan\":17,\"persentase\":11.76},{\"jurusan_id\":10,\"nama_jurusan\":\"D3 Gizi\",\"jawaban_dipilih\":1,\"total_kemunculan\":16,\"persentase\":6.25},{\"jurusan_id\":3,\"nama_jurusan\":\"D3 Aeronautika\",\"jawaban_dipilih\":0,\"total_kemunculan\":17,\"persentase\":0},{\"jurusan_id\":7,\"nama_jurusan\":\"S1 Manajemen\",\"jawaban_dipilih\":0,\"total_kemunculan\":17,\"persentase\":0},{\"jurusan_id\":8,\"nama_jurusan\":\"S1 Hukum\",\"jawaban_dipilih\":0,\"total_kemunculan\":16,\"persentase\":0},{\"jurusan_id\":9,\"nama_jurusan\":\"D3 Farmasi\",\"jawaban_dipilih\":0,\"total_kemunculan\":16,\"persentase\":0},{\"jurusan_id\":11,\"nama_jurusan\":\"D3 Radiologi\",\"jawaban_dipilih\":0,\"total_kemunculan\":16,\"persentase\":0}]','2026-09-03 07:19:33','2026-09-03 07:19:33','2026-09-03 07:19:33'),(3,12,3,70.59,'[{\"jurusan_id\":3,\"nama_jurusan\":\"D3 Aeronautika\",\"jawaban_dipilih\":12,\"total_kemunculan\":17,\"persentase\":70.59},{\"jurusan_id\":7,\"nama_jurusan\":\"S1 Manajemen\",\"jawaban_dipilih\":9,\"total_kemunculan\":17,\"persentase\":52.94},{\"jurusan_id\":9,\"nama_jurusan\":\"D3 Farmasi\",\"jawaban_dipilih\":8,\"total_kemunculan\":16,\"persentase\":50},{\"jurusan_id\":8,\"nama_jurusan\":\"S1 Hukum\",\"jawaban_dipilih\":5,\"total_kemunculan\":16,\"persentase\":31.25},{\"jurusan_id\":1,\"nama_jurusan\":\"S1 Teknik Dirgantara\",\"jawaban_dipilih\":4,\"total_kemunculan\":18,\"persentase\":22.22},{\"jurusan_id\":2,\"nama_jurusan\":\"S1 Teknik Mesin\",\"jawaban_dipilih\":6,\"total_kemunculan\":32,\"persentase\":18.75},{\"jurusan_id\":4,\"nama_jurusan\":\"S1 Teknik Industri\",\"jawaban_dipilih\":3,\"total_kemunculan\":17,\"persentase\":17.65},{\"jurusan_id\":10,\"nama_jurusan\":\"D3 Gizi\",\"jawaban_dipilih\":2,\"total_kemunculan\":16,\"persentase\":12.5},{\"jurusan_id\":6,\"nama_jurusan\":\"S1 Teknik Elektro\",\"jawaban_dipilih\":1,\"total_kemunculan\":17,\"persentase\":5.88},{\"jurusan_id\":5,\"nama_jurusan\":\"S1 Informatika\",\"jawaban_dipilih\":0,\"total_kemunculan\":18,\"persentase\":0},{\"jurusan_id\":11,\"nama_jurusan\":\"D3 Radiologi\",\"jawaban_dipilih\":0,\"total_kemunculan\":16,\"persentase\":0}]','2026-09-03 08:25:26','2026-09-03 08:25:26','2026-09-03 08:25:26'),(4,19,4,52.94,'[{\"jurusan_id\":4,\"nama_jurusan\":\"S1 Teknik Industri\",\"jawaban_dipilih\":9,\"total_kemunculan\":17,\"persentase\":52.94},{\"jurusan_id\":1,\"nama_jurusan\":\"S1 Teknik Dirgantara\",\"jawaban_dipilih\":8,\"total_kemunculan\":18,\"persentase\":44.44},{\"jurusan_id\":6,\"nama_jurusan\":\"S1 Teknik Elektro\",\"jawaban_dipilih\":7,\"total_kemunculan\":17,\"persentase\":41.18},{\"jurusan_id\":8,\"nama_jurusan\":\"S1 Hukum\",\"jawaban_dipilih\":6,\"total_kemunculan\":16,\"persentase\":37.5},{\"jurusan_id\":7,\"nama_jurusan\":\"S1 Manajemen\",\"jawaban_dipilih\":6,\"total_kemunculan\":17,\"persentase\":35.29},{\"jurusan_id\":10,\"nama_jurusan\":\"D3 Gizi\",\"jawaban_dipilih\":3,\"total_kemunculan\":16,\"persentase\":18.75},{\"jurusan_id\":11,\"nama_jurusan\":\"D3 Radiologi\",\"jawaban_dipilih\":3,\"total_kemunculan\":16,\"persentase\":18.75},{\"jurusan_id\":2,\"nama_jurusan\":\"S1 Teknik Mesin\",\"jawaban_dipilih\":4,\"total_kemunculan\":32,\"persentase\":12.5},{\"jurusan_id\":3,\"nama_jurusan\":\"D3 Aeronautika\",\"jawaban_dipilih\":2,\"total_kemunculan\":17,\"persentase\":11.76},{\"jurusan_id\":5,\"nama_jurusan\":\"S1 Informatika\",\"jawaban_dipilih\":2,\"total_kemunculan\":18,\"persentase\":11.11},{\"jurusan_id\":9,\"nama_jurusan\":\"D3 Farmasi\",\"jawaban_dipilih\":0,\"total_kemunculan\":16,\"persentase\":0}]','2026-09-07 07:24:26','2026-09-07 07:24:26','2026-09-07 07:24:26');
/*!40000 ALTER TABLE `tes_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_level` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin ITD Adisutjipto','admin@itd.ac.id',NULL,'$2y$12$2qJO48XmHof7TnwMKafoHObVG8Aa2fQHsZkuKS3wIqTLmcHD3ryKm',NULL,'2026-08-12 01:11:26','2026-08-12 01:11:26','080000000000',NULL,NULL,NULL,NULL,NULL,NULL,'admin'),(9,'Luis','andi.web2ti23a3@gmail.com',NULL,'$2y$12$FDHywHcAaj2vcHcEmL42ku2i2F4yDvZK5aXofD2gCOwGmrg7Vn9sS',NULL,'2026-08-13 01:03:41','2026-09-15 03:28:53','08123644569','SMA 1 SURAKARTA','BOYOLALI','SMA','XII','IPA','profile-photos/Vzq9uDxUiiksoOcsUVm9HeojsL5raUxF2DFb8C72.jpg','student'),(12,'bianca','biancaamoo272@gmail.com',NULL,'$2y$12$HE63SEs2UIhqICyDZ5I0KuQvbc.dXTtv.9RnadEBtpXooSJKiUrWS',NULL,'2026-08-13 01:51:35','2026-09-23 05:56:00','081236456595555','SMA 1 SOLO','Jawa Tengah','SMA','XII','IPA','profile-photos/Xpd63BxoGU3VuacIZLtbnEGOKJ6VTJODRk0lzzkK.jpg','student'),(13,'Gavin Bastian','gavbastian12@gmail.com',NULL,'$2y$12$eH6sEXHZwa3ov7bSeW84dO3Cuol6pmaBMut/dDWbbhPvRQxQgpIMm',NULL,'2026-08-18 07:18:21','2026-10-15 03:01:35','081230287700','SMA BATIK 1 SURAKARTA','JAWA TENGAH','SMA','XII','IPA','profile-photos/2OdXHBPshb3tQ3ZNiTR0bwx2CQnCXbzXabjIztGw.jpg','student'),(14,'Administrator','admin@tesminatbakat.com',NULL,'$2y$12$p0MSzLn.b7sjIdRZ9GAAwOpj45v.rwbvInrujWWpHDvZsPtP6uIJq',NULL,'2026-08-26 07:46:46','2026-08-26 07:46:52','000000000000',NULL,NULL,NULL,NULL,NULL,NULL,'admin'),(18,'nayra','nabilahjunita17@gmail.com',NULL,'$2y$12$beI16HHu/yaYGjrSrhAXte4iAPO1TPyQptoYiCqU8kZNFbklxHvZG',NULL,'2026-09-07 04:26:23','2026-09-15 03:14:44','082345167899','SMK 1 SKH','Jawa Tengah','SMK','XII','TKJ','profile-photos/0M62ngAdZJiJ3c1llylv29BrXUgE3c9lZcmHiflf.jpg','student'),(19,'Antok TES','admisi.itda@gmail.com',NULL,'$2y$12$W81P3Gz14rcGJ9JTqFAImOACHedyW/65797gw.heLZ2Xi0bmhafca',NULL,'2026-09-07 07:06:21','2026-09-07 07:06:21','085743039590','SEKOLAH SUKA SUKA','Yogyarta','SMA','XI','IA',NULL,'student'),(20,'Claudea Cahaya Cinta','claucahaya@gmail.com',NULL,'$2y$12$vZG0dXNSkRxI9GP60APs9OV/ZiG2H2ochJYX61qlK2lxpqrodf3pa',NULL,'2026-09-30 14:12:32','2026-09-30 14:12:32','088888','udb','bandung','SMA','XI','bisnis digital',NULL,'student'),(21,'Claudea Cahaya Cinta','ciakim28@gmail.com',NULL,'$2y$12$7NifayK8ayMQ2EKVbk5NMOd1dXPmCTW8lfyCYjMPd3AjdUc8TVjv.',NULL,'2026-09-30 14:15:05','2026-09-30 14:15:05','088888','udb','bandung','SMA','XI','bisnis digital',NULL,'student');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'defaultdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-18 18:15:44
