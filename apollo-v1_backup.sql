-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: apollo-v1
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `apollo-v1`
--

/*!40000 DROP DATABASE IF EXISTS `apollo-v1`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `apollo-v1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `apollo-v1`;

--
-- Table structure for table `avips`
--

DROP TABLE IF EXISTS `avips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correspondence_bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correspondence_ac_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corp_swift_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oracle_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_details` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avips_deleted_at_index` (`deleted_at`),
  KEY `pan_number` (`pan_number`),
  KEY `oracle_code` (`oracle_code`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avips`
--

LOCK TABLES `avips` WRITE;
/*!40000 ALTER TABLE `avips` DISABLE KEYS */;
/*!40000 ALTER TABLE `avips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_imports`
--

DROP TABLE IF EXISTS `email_imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intimation_date_time` datetime DEFAULT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_imports_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_imports`
--

LOCK TABLES `email_imports` WRITE;
/*!40000 ALTER TABLE `email_imports` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ips`
--

DROP TABLE IF EXISTS `ips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uhid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `ip_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_service_amount` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tax_amount` decimal(15,2) DEFAULT NULL,
  `total_bill_amount` decimal(15,2) DEFAULT NULL,
  `tcs_tax` decimal(15,2) DEFAULT NULL,
  `discount_amount` decimal(15,2) DEFAULT NULL,
  `doctor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surgical_package_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_pharmacy_amount` decimal(15,2) DEFAULT NULL,
  `pharmacy_amt` decimal(15,2) DEFAULT NULL,
  `total_consumables` decimal(15,2) DEFAULT NULL,
  `bill_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ips_deleted_at_index` (`deleted_at`),
  KEY `uhid` (`uhid`),
  KEY `bill_date` (`bill_date`),
  KEY `ip_no` (`ip_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ips`
--

LOCK TABLES `ips` WRITE;
/*!40000 ALTER TABLE `ips` DISABLE KEYS */;
/*!40000 ALTER TABLE `ips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_mappings`
--

DROP TABLE IF EXISTS `message_mappings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_mappings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intimation_date_time` datetime DEFAULT NULL,
  `channel` enum('Sms','WhatsApp','Email','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `uhid_id` int(10) unsigned DEFAULT NULL,
  `avip_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_mappings_deleted_at_index` (`deleted_at`),
  KEY `uhid_id` (`uhid_id`),
  KEY `avip_id` (`avip_id`),
  KEY `intimation_date_time` (`intimation_date_time`),
  KEY `channel` (`channel`),
  KEY `source` (`source`),
  KEY `message` (`message`),
  CONSTRAINT `309584_5ceecceb470b6` FOREIGN KEY (`uhid_id`) REFERENCES `patient_registrations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `309584_5ceed5658363c` FOREIGN KEY (`avip_id`) REFERENCES `avips` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_mappings`
--

LOCK TABLES `message_mappings` WRITE;
/*!40000 ALTER TABLE `message_mappings` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_mappings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_04_23_165825_create_1556027905_roles_table',1),(4,'2019_04_23_165830_create_1556027909_users_table',1),(5,'2019_04_23_165831_add_5cbf1a0c95644_relationships_to_user_table',1),(6,'2019_04_23_171224_create_1556028744_tests_table',1),(7,'2019_04_23_174650_create_1556030809_user_actions_table',1),(8,'2019_04_23_174651_add_5cbf2560acf15_relationships_to_useraction_table',1),(9,'2019_04_25_200451_create_1556211891_sms_imports_table',1),(10,'2019_04_25_200756_update_1556212076_sms_imports_table',1),(11,'2019_04_25_202725_update_1556213245_tests_table',1),(12,'2019_04_25_210012_create_1556215212_patient_registrations_table',1),(13,'2019_04_28_122831_add_5cc5723f4666c_relationships_to_test_table',1),(14,'2019_04_28_125335_add_5cc5781f73d67_relationships_to_test_table',1),(15,'2019_04_28_125335_create_5cc5781c4bc56_role_test_table',1),(16,'2019_04_28_125354_add_5cc57832b2319_relationships_to_test_table',1),(17,'2019_04_28_142249_add_5cc58d08ec3a4_relationships_to_smsimport_table',1),(18,'2019_05_01_155637_create_1556715397_opds_table',1),(19,'2019_05_01_161544_create_1556716544_ips_table',1),(20,'2019_05_01_161908_update_1556716748_opds_table',1),(21,'2019_05_01_162537_update_1556717137_ips_table',1),(22,'2019_05_03_070843_create_1556856522_whatsapps_table',1),(23,'2019_05_03_070844_add_5ccbbed205538_relationships_to_whatsapp_table',1),(24,'2019_05_03_070945_drop_5ccbbf09c0ed05ccbbf09be9d5_role_test_table',1),(25,'2019_05_03_070949_drop_5ccbbf0d64c94_tests_table',1),(26,'2019_05_03_074714_create_1556858834_avips_table',1),(27,'2019_05_06_073704_create_1557117424_referral_datas_table',1),(28,'2019_05_08_075057_update_1557291057_sms_imports_table',1),(29,'2019_05_08_075101_add_5cd2603513200_relationships_to_smsimport_table',1),(30,'2019_05_08_075230_update_1557291150_whatsapps_table',1),(31,'2019_05_08_075234_add_5cd2609269853_relationships_to_whatsapp_table',1),(32,'2019_05_15_190537_create_1557936337_system_settings_table',1),(33,'2019_05_16_093928_update_1557988768_sms_imports_table',1),(34,'2019_05_16_093932_add_5cdd05a3e47f3_relationships_to_smsimport_table',1),(35,'2019_05_16_094135_update_1557988895_sms_imports_table',1),(36,'2019_05_16_094138_add_5cdd0622a092f_relationships_to_smsimport_table',1),(37,'2019_05_16_132509_update_1558002309_whatsapps_table',1),(38,'2019_05_16_132513_add_5cdd3a897a23e_relationships_to_whatsapp_table',1),(39,'2019_05_29_211815_create_1559153894_message_mappings_table',1),(40,'2019_05_29_211816_add_5ceeccef87fbe_relationships_to_messagemapping_table',1),(41,'2019_05_29_212153_add_5ceecdc0bfc18_relationships_to_messagemapping_table',1),(42,'2019_05_29_213439_update_1559154879_sms_imports_table',1),(43,'2019_05_29_213523_drop_5ceed0ebee733_whatsapps_table',1),(44,'2019_05_29_213813_create_1559155093_whats_app_imports_table',1),(45,'2019_05_29_214145_create_1559155305_email_imports_table',1),(46,'2019_05_29_214610_update_1559155570_patient_registrations_table',1),(47,'2019_05_29_215429_update_1559156069_message_mappings_table',1),(48,'2019_05_29_215433_add_5ceed5699f16a_relationships_to_messagemapping_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opds`
--

DROP TABLE IF EXISTS `opds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bill_date` datetime DEFAULT NULL,
  `bill_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uhid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bill_amount` decimal(15,2) DEFAULT NULL,
  `discount_amount` decimal(15,2) DEFAULT NULL,
  `net_amount` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opds_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opds`
--

LOCK TABLES `opds` WRITE;
/*!40000 ALTER TABLE `opds` DISABLE KEYS */;
/*!40000 ALTER TABLE `opds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_registrations`
--

DROP TABLE IF EXISTS `patient_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_registrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uhid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_date` (`patient_name`,`registration_date`),
  KEY `patient_registrations_deleted_at_index` (`deleted_at`),
  KEY `uhid` (`uhid`),
  KEY `patient_name` (`patient_name`),
  KEY `registration_date` (`registration_date`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_registrations`
--

LOCK TABLES `patient_registrations` WRITE;
/*!40000 ALTER TABLE `patient_registrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referral_data_finals`
--

DROP TABLE IF EXISTS `referral_data_finals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referral_data_finals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time_of_int` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uhid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time_of_reg` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_discharged` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procedure_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dr_name_aic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bill_amount` decimal(15,2) DEFAULT NULL,
  `net_amount` decimal(15,2) DEFAULT NULL,
  `aic_fee` decimal(15,2) DEFAULT NULL,
  `fee_percent` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treating_consultant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oracle_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_date_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumable` decimal(15,2) DEFAULT NULL,
  `ward_pharmacy` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referral_datas_deleted_at_index` (`deleted_at`),
  KEY `uhid` (`uhid`),
  KEY `oracle_code` (`oracle_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referral_data_finals`
--

LOCK TABLES `referral_data_finals` WRITE;
/*!40000 ALTER TABLE `referral_data_finals` DISABLE KEYS */;
/*!40000 ALTER TABLE `referral_data_finals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `roles` VALUES (1,'Administrator (can create other users)','2019-06-05 06:46:44','2019-06-05 06:46:44'),(2,'Simple user','2019-06-05 06:46:44','2019-06-05 06:46:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_imports`
--

DROP TABLE IF EXISTS `sms_imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intimation_date_time` datetime DEFAULT NULL,
  `referrer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sms_imports_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_imports`
--

LOCK TABLES `sms_imports` WRITE;
/*!40000 ALTER TABLE `sms_imports` DISABLE KEYS */;
INSERT INTO `sms_imports` VALUES (1,'2019-06-05 06:46:44','2019-06-07 23:01:58','2019-06-07 23:01:58',NULL,NULL,NULL,NULL,NULL),(2,'2019-06-05 06:46:44','2019-06-07 23:01:54','2019-06-07 23:01:54',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sms_imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_settings_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_settings`
--

LOCK TABLES `system_settings` WRITE;
/*!40000 ALTER TABLE `system_settings` DISABLE KEYS */;
INSERT INTO `system_settings` VALUES (1,'PATIENT_SEARCH_DAYS','PATIENT_SEARCH_DAYS','10','2019-06-05 06:46:44','2019-06-05 06:46:44',NULL);
/*!40000 ALTER TABLE `system_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_actions`
--

DROP TABLE IF EXISTS `user_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `295784_5cbf255d75bf3` (`user_id`),
  CONSTRAINT `295784_5cbf255d75bf3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_actions`
--

LOCK TABLES `user_actions` WRITE;
/*!40000 ALTER TABLE `user_actions` DISABLE KEYS */;
INSERT INTO `user_actions` VALUES (1,'created','sms_imports',1,'2019-06-05 06:46:44','2019-06-05 06:46:44',1),(2,'created','patient_registrations',1,'2019-06-05 06:46:44','2019-06-05 06:46:44',1),(3,'created','tests',2,'2019-06-05 06:46:44','2019-06-05 06:46:44',1),(4,'created','tests',3,'2019-06-05 06:46:45','2019-06-05 06:46:45',1),(5,'created','tests',4,'2019-06-05 06:46:45','2019-06-05 06:46:45',1),(6,'created','sms_imports',2,'2019-06-05 06:46:45','2019-06-05 06:46:45',1),(7,'updated','patient_registrations',1,'2019-06-05 06:46:45','2019-06-05 06:46:45',1),(8,'created','ips',1,'2019-06-05 06:46:45','2019-06-05 06:46:45',1),(9,'created','system_settings',1,'2019-06-05 06:46:45','2019-06-05 06:46:45',1),(10,'deleted','patient_registrations',1,'2019-06-07 12:05:40','2019-06-07 12:05:40',1),(11,'updated','message_mappings',1,'2019-06-07 12:39:17','2019-06-07 12:39:17',1),(12,'deleted','sms_imports',2,'2019-06-07 23:01:54','2019-06-07 23:01:54',1),(13,'deleted','sms_imports',1,'2019-06-07 23:01:58','2019-06-07 23:01:58',1),(14,'updated','message_mappings',21,'2019-06-23 04:33:26','2019-06-23 04:33:26',1),(15,'updated','avips',11,'2019-06-23 07:28:39','2019-06-23 07:28:39',1),(16,'updated','avips',421,'2019-06-23 07:30:58','2019-06-23 07:30:58',1),(17,'updated','avips',436,'2019-06-23 07:56:14','2019-06-23 07:56:14',1),(18,'updated','avips',436,'2019-06-23 08:01:38','2019-06-23 08:01:38',1),(19,'updated','avips',164,'2019-06-23 08:03:00','2019-06-23 08:03:00',1),(20,'updated','avips',1,'2019-06-23 08:20:02','2019-06-23 08:20:02',1),(21,'updated','avips',1,'2019-06-23 08:20:02','2019-06-23 08:20:02',1),(22,'updated','message_mappings',1,'2019-06-24 03:54:39','2019-06-24 03:54:39',1),(23,'updated','message_mappings',4,'2019-06-25 05:25:51','2019-06-25 05:25:51',1),(24,'updated','message_mappings',3652,'2019-06-25 06:46:52','2019-06-25 06:46:52',1),(25,'updated','message_mappings',3652,'2019-06-25 06:48:38','2019-06-25 06:48:38',1),(26,'updated','message_mappings',1,'2019-06-26 22:53:19','2019-06-26 22:53:19',1);
/*!40000 ALTER TABLE `user_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `295768_5cbf1a08b8266` (`role_id`),
  CONSTRAINT `295768_5cbf1a08b8266` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$10$.FkHFArpObelytegXsZnW.u8r9.X4.E3WYU9rMk56TL6qBfipaoca','','2019-06-05 06:46:44','2019-06-05 06:46:44',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whats_app_imports`
--

DROP TABLE IF EXISTS `whats_app_imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `whats_app_imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intimation_date_time` datetime DEFAULT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `whats_app_imports_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whats_app_imports`
--

LOCK TABLES `whats_app_imports` WRITE;
/*!40000 ALTER TABLE `whats_app_imports` DISABLE KEYS */;
/*!40000 ALTER TABLE `whats_app_imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'apollo-v1'
--

--
-- Dumping routines for database 'apollo-v1'
--
/*!50003 DROP FUNCTION IF EXISTS `DELETE_DOUBLE_SPACES` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `DELETE_DOUBLE_SPACES`( title VARCHAR(250) ) RETURNS varchar(250) CHARSET latin1
    DETERMINISTIC
BEGIN
    DECLARE result VARCHAR(250);
    SET result = REPLACE( title, '  ', ' ' );
    WHILE (result <> title) DO 
        SET title = result;
        SET result = REPLACE( title, '  ', ' ' );
    END WHILE;
    RETURN result;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `soundex_match` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `soundex_match`(needle varchar(128), haystack text, splitChar varchar(1)) RETURNS tinyint(4)
    DETERMINISTIC
begin
    declare spacePos int;
    declare searchLen int default length(haystack);
    declare curWord varchar(128) default '';
    declare tempStr text default haystack;
    declare tmp text default '';
    declare soundx1 varchar(64) default soundex(needle);
    declare soundx2 varchar(64) default '';
    
    set spacePos = locate(splitChar, tempStr);
    
    while searchLen > 0 do
      if spacePos = 0 then
        set tmp = tempStr;
        select soundex(tmp) into soundx2;
        if soundx1 = soundx2 then
          return 1;
        else
          return 0;
        end if;
      end if;
      
      if spacePos != 0 then
        set tmp = substr(tempStr, 1, spacePos-1);
        set soundx2 = soundex(tmp);
        if soundx1 = soundx2 then
          return 1;
        end if;
        set tempStr = substr(tempStr, spacePos+1);
        set searchLen = length(tempStr);
      end if;
      
      set spacePos = locate(splitChar, tempStr);

    end while;
    
    return 0;
    
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-28 15:45:39
