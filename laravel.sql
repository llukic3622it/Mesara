-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `kupacs`
--

DROP TABLE IF EXISTS `kupacs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kupacs` (
  `KupacID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Ime` varchar(255) NOT NULL,
  `Prezime` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `adresa` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`KupacID`),
  UNIQUE KEY `kupacs_email_unique` (`Email`),
  KEY `kupacs_user_id_foreign` (`user_id`),
  CONSTRAINT `kupacs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupacs`
--

LOCK TABLES `kupacs` WRITE;
/*!40000 ALTER TABLE `kupacs` DISABLE KEYS */;
INSERT INTO `kupacs` VALUES (1,'Marko','Markovic','marko@example.com',NULL,NULL,'2025-08-23 16:06:20','2025-08-23 16:06:20',NULL),(2,'Jovana','Jovanovic','jovana@example.com',NULL,NULL,'2025-08-23 16:06:20','2025-08-23 16:06:20',NULL),(3,'Luka','Lukic','lukic7032@gmail.com','312312','dada','2025-08-24 11:36:47','2025-08-24 11:36:47',2),(4,'Nina','Marjanovic','nina@gm.com','0612069881','321312','2025-08-24 11:45:01','2025-08-24 11:45:01',4),(15,'Luka','Lukic','lukic70322@gmail.com','532523523','dada','2025-08-24 13:40:20','2025-08-24 13:40:20',NULL),(16,'Nikolass','dada','lukic70sss32@gmail.com','0635554444','rrrr','2025-08-24 13:40:47','2025-08-24 13:40:47',NULL),(17,'Marko','Lukic','lukic70aaaa32@gmail.com','0611234567','dadadada','2025-08-24 13:49:54','2025-08-24 13:49:54',NULL),(18,'qqq','qqq','lukaaaic7032@gmail.com','0611234567','adad','2025-08-24 13:50:11','2025-08-24 13:50:11',NULL),(19,'rADJA','Marković','lukic7032@AAAgmail.com','421412','DADA','2025-08-24 13:58:13','2025-08-24 13:58:13',NULL),(20,'rera','rwea','lukaaic7032@gmail.com','0612069881','dada','2025-08-24 14:08:21','2025-08-24 14:08:21',NULL),(21,'Niko','aaaaa','a@gmail.com','0612069881','dada','2025-08-25 05:50:36','2025-08-25 05:50:36',NULL),(22,'Marko','dada','lukic7032@213123gmail.com','421412','3121','2025-08-27 09:49:25','2025-08-27 09:49:25',NULL),(23,'Marko','MarkovićAA','lukic7032222@gmail.com','0612069881','mAART','2025-08-29 20:46:27','2025-08-29 20:46:27',NULL),(24,'Niko','Marković','dff@f.rs','0635554444','dada','2025-08-31 18:23:18','2025-08-31 18:23:18',NULL);
/*!40000 ALTER TABLE `kupacs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_08_23_170057_create_kupacs_table',1),(6,'2025_08_23_170058_create_tip_proizvodas_table',1),(7,'2025_08_23_170059_create_proizvods_table',1),(8,'2025_08_23_170100_create_pozicijas_table',1),(9,'2025_08_23_170101_create_zaposlenis_table',1),(10,'2025_08_23_170102_create_porudzbinas_table',1),(11,'2025_08_23_232817_add_kolicina_and_naziv_to_proizvods_table',2),(12,'2025_08_23_233546_add_kolicina_and_naziv_to_proizvods_table',3),(13,'2025_08_24_083642_add_phone_and_address_to_kupac_table',4),(15,'2025_08_24_102758_add_naziv_i_cena_to_porudzbinas_table',5),(16,'2025_08_27_081947_remove_proizvod_id_from_porudzbinas',6),(17,'2025_08_27_083528_add_proizvod_id_with_foreign_key_to_porudzbinas',7),(20,'2025_08_27_091818_add_admin_user',8),(21,'2025_08_27_112057_add_kolicina_to_porudzbinas_table',8),(22,'2025_08_27_112534_add_naziv_to_porudzbinas_table',9),(23,'2025_08_27_172558_add_user_id_to_kupacs_table',10),(26,'2025_08_27_173936_populate_user_id_in_kupacs_by_email',11),(29,'2025_08_28_113929_add_pitanje_to_users_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `pitanja`
--

DROP TABLE IF EXISTS `pitanja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pitanja` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `proizvod_id` bigint(20) unsigned NOT NULL,
  `pitanje` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pitanja_user_id_foreign` (`user_id`),
  CONSTRAINT `pitanja_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pitanja`
--

LOCK TABLES `pitanja` WRITE;
/*!40000 ALTER TABLE `pitanja` DISABLE KEYS */;
INSERT INTO `pitanja` VALUES (1,2,'Luka Lukic',5,'dadada','2025-08-28 11:13:32','2025-08-28 11:13:32'),(2,4,'Nina Marjanovic',4,'imate li dva kilograma','2025-08-28 11:28:00','2025-08-28 11:28:00'),(3,8,'marko',9,'Da li je pecenje sveze??','2025-08-29 19:03:37','2025-08-29 19:03:37'),(4,3,'Pera Peric',4,'posto su  bate ?','2025-08-31 18:24:32','2025-08-31 18:24:32');
/*!40000 ALTER TABLE `pitanja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `porudzbinas`
--

DROP TABLE IF EXISTS `porudzbinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `porudzbinas` (
  `PorudzbinaID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `KupacID` bigint(20) unsigned NOT NULL,
  `Datum_prijave` datetime NOT NULL,
  `ZaposleniID` bigint(20) unsigned NOT NULL,
  `proizvod_id` bigint(20) unsigned DEFAULT NULL,
  `Naziv` varchar(255) DEFAULT NULL,
  `kolicina` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PorudzbinaID`),
  KEY `porudzbinas_kupacid_foreign` (`KupacID`),
  KEY `porudzbinas_zaposleniid_foreign` (`ZaposleniID`),
  KEY `porudzbinas_proizvod_id_foreign` (`proizvod_id`),
  CONSTRAINT `porudzbinas_kupacid_foreign` FOREIGN KEY (`KupacID`) REFERENCES `kupacs` (`KupacID`) ON DELETE CASCADE,
  CONSTRAINT `porudzbinas_proizvod_id_foreign` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvods` (`ProizvodID`) ON DELETE SET NULL,
  CONSTRAINT `porudzbinas_zaposleniid_foreign` FOREIGN KEY (`ZaposleniID`) REFERENCES `zaposlenis` (`ZaposleniID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `porudzbinas`
--

LOCK TABLES `porudzbinas` WRITE;
/*!40000 ALTER TABLE `porudzbinas` DISABLE KEYS */;
INSERT INTO `porudzbinas` VALUES (12,2,'2025-08-01 11:02:00',7,9,NULL,1,'2025-08-27 07:02:30','2025-08-31 17:48:07'),(13,3,'2025-08-04 18:10:00',7,9,NULL,1,'2025-08-27 07:02:30','2025-08-31 17:48:20'),(14,3,'2025-08-27 11:56:00',12,4,NULL,1,'2025-08-27 07:53:57','2025-08-31 17:48:52'),(20,4,'2025-08-27 13:00:57',12,4,'Sveže jagnjećea',8,'2025-08-27 11:00:57','2025-08-27 11:00:57'),(30,4,'2025-08-02 21:53:00',20,15,NULL,1,'2025-08-31 17:53:22','2025-08-31 17:53:22');
/*!40000 ALTER TABLE `porudzbinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pozicijas`
--

DROP TABLE IF EXISTS `pozicijas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pozicijas` (
  `PozicijaID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NazivPozicije` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PozicijaID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pozicijas`
--

LOCK TABLES `pozicijas` WRITE;
/*!40000 ALTER TABLE `pozicijas` DISABLE KEYS */;
INSERT INTO `pozicijas` VALUES (1,'Admin','2025-08-23 16:06:22','2025-08-23 16:06:22'),(3,'Mesar',NULL,NULL);
/*!40000 ALTER TABLE `pozicijas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proizvods`
--

DROP TABLE IF EXISTS `proizvods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proizvods` (
  `ProizvodID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TipProizvodaID` bigint(20) unsigned NOT NULL,
  `Naziv` varchar(255) NOT NULL,
  `Kolicina` int(11) NOT NULL DEFAULT 0,
  `Status` varchar(255) NOT NULL,
  `Cena` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ProizvodID`),
  KEY `proizvods_tipproizvodaid_foreign` (`TipProizvodaID`),
  CONSTRAINT `proizvods_tipproizvodaid_foreign` FOREIGN KEY (`TipProizvodaID`) REFERENCES `tip_proizvodas` (`TipProizvodaID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proizvods`
--

LOCK TABLES `proizvods` WRITE;
/*!40000 ALTER TABLE `proizvods` DISABLE KEYS */;
INSERT INTO `proizvods` VALUES (4,1,'Mleveno za cevape 1kg',302,'Dostupno',1499.00,NULL,'2025-08-29 20:40:50'),(5,2,'Pileca prsa 1kg',100,'Dostupno',899.00,NULL,'2025-08-31 18:26:21'),(9,2,'Pileci batak 1 kg',1,'Dostupno',2000.00,'2025-08-25 11:02:08','2025-08-31 17:49:36'),(15,1,'But 1kg',2,'Dostupno',2500.00,'2025-08-31 17:52:28','2025-08-31 17:52:28');
/*!40000 ALTER TABLE `proizvods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_proizvodas`
--

DROP TABLE IF EXISTS `tip_proizvodas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tip_proizvodas` (
  `TipProizvodaID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TipProizvoda` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TipProizvodaID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_proizvodas`
--

LOCK TABLES `tip_proizvodas` WRITE;
/*!40000 ALTER TABLE `tip_proizvodas` DISABLE KEYS */;
INSERT INTO `tip_proizvodas` VALUES (1,'Svinjetina','2025-08-23 16:06:21','2025-08-23 16:06:21'),(2,'Piletina','2025-08-23 16:06:21','2025-08-23 16:06:21'),(3,'Jagnjetina','2025-08-23 16:06:21','2025-08-23 16:06:21');
/*!40000 ALTER TABLE `tip_proizvodas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pitanje` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Luka Lukic','lukic7032@gmail.com',NULL,NULL,'$2y$12$Ig5JFqRDDxuHoPeuyQIg7Oh9HsWiYfN/oO0h.MIj43SV3M6aGPrEO',NULL,'2025-08-27 08:28:36','2025-08-27 08:28:36'),(3,'Pera Peric','pera@com',NULL,NULL,'$2y$12$AGwoOPxOCsrDB1yaaKKqyeELoSe5bi/ftg3zZD9n.UllHhpSjo2e6',NULL,'2025-08-27 08:33:33','2025-08-27 08:33:33'),(4,'Nina Marjanovic','nina@gm.com',NULL,NULL,'$2y$12$.zC32jQ7HPRpFB3vfJGPDO0le0Zrzayb9XdI4L3D1eXTIWEy5y2y.',NULL,'2025-08-27 08:34:39','2025-08-27 08:34:39'),(6,'admin','admin@example.com',NULL,'2025-08-27 09:24:12','$2y$12$kn7.mwYU1y8l0wPgHiOTMePJFsDmClIZxz9eYnxZa30EwBQHLaj3W','EC2XMIZO0RwQ9ImfpTwNI8sjdNnjkmocp3NaK5oOHvhNP6Uvljn0SW8C0Qco','2025-08-27 09:24:12','2025-08-27 09:24:12'),(7,'Nesa Katic','nesa@gmail.com',NULL,NULL,'$2y$12$39i2Zm42cTgsPeGzZByCaOiFEZ2uM6AOsdrWELR8xnXiXrbRt.fRW',NULL,'2025-08-27 15:17:56','2025-08-27 15:17:56'),(8,'marko','marko@example.com',NULL,NULL,'$2y$12$6XMsr1Nju67GEVyT6LkN8uGb8J.8VRP2M3Dtzdc5bYd2Cxdxhuqa.',NULL,'2025-08-29 18:58:36','2025-08-29 18:58:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zaposlenis`
--

DROP TABLE IF EXISTS `zaposlenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zaposlenis` (
  `ZaposleniID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Ime` varchar(255) NOT NULL,
  `Prezime` varchar(255) NOT NULL,
  `PozicijaID` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ZaposleniID`),
  KEY `zaposlenis_pozicijaid_foreign` (`PozicijaID`),
  CONSTRAINT `zaposlenis_pozicijaid_foreign` FOREIGN KEY (`PozicijaID`) REFERENCES `pozicijas` (`PozicijaID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zaposlenis`
--

LOCK TABLES `zaposlenis` WRITE;
/*!40000 ALTER TABLE `zaposlenis` DISABLE KEYS */;
INSERT INTO `zaposlenis` VALUES (7,'Nikolas','Nikic',1,'2025-08-25 13:05:24','2025-08-25 13:23:33'),(12,'Maja','Petrovic',1,'2025-08-25 13:20:47','2025-08-25 13:20:47'),(19,'Igor','Nikovec',3,'2025-08-31 16:37:53','2025-08-31 16:37:53'),(20,'Perica','Korisic',3,'2025-08-31 17:52:57','2025-08-31 17:52:57');
/*!40000 ALTER TABLE `zaposlenis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-01 19:06:28
