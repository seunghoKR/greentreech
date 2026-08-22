-- MySQL dump 10.19  Distrib 10.3.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: greentreech
-- ------------------------------------------------------
-- Server version	10.3.32-MariaDB-log

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
-- Table structure for table `rx_action_forward`
--

DROP TABLE IF EXISTS `rx_action_forward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_action_forward` (
  `act` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_regexp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `global_route` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`act`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_action_forward`
--

LOCK TABLES `rx_action_forward` WRITE;
/*!40000 ALTER TABLE `rx_action_forward` DISABLE KEYS */;
INSERT INTO `rx_action_forward` VALUES ('atom','rss','view','N;','N;','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberActiveLogins','member','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:18:\"#^active_logins$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:18:\"#^active_logins$#u\";}}','a:1:{s:13:\"active_logins\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberInfo','member','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:16:\"#^member_info$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:16:\"#^member_info$#u\";}}','a:1:{s:11:\"member_info\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberLoginForm','member','view','a:9:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:10:\"#^login$#u\";}i:1;a:2:{i:0;s:3:\"GET\";i:1;s:33:\"#^login(?P<document_srl>[^/]+)$#u\";}i:2;a:2:{i:0;s:3:\"GET\";i:1;s:48:\"#^login(?P<document_srl>[^/]+)(?P<page>[^/]+)$#u\";}i:3;a:2:{i:0;s:3:\"GET\";i:1;s:31:\"#^login(?P<member_srl>[^/]+)$#u\";}i:4;a:2:{i:0;s:3:\"GET\";i:1;s:25:\"#^login(?P<page>[^/]+)$#u\";}i:5;a:2:{i:0;s:4:\"POST\";i:1;s:33:\"#^login(?P<document_srl>[^/]+)$#u\";}i:6;a:2:{i:0;s:4:\"POST\";i:1;s:48:\"#^login(?P<document_srl>[^/]+)(?P<page>[^/]+)$#u\";}i:7;a:2:{i:0;s:4:\"POST\";i:1;s:31:\"#^login(?P<member_srl>[^/]+)$#u\";}i:8;a:2:{i:0;s:4:\"POST\";i:1;s:25:\"#^login(?P<page>[^/]+)$#u\";}}','a:5:{s:5:\"login\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}s:25:\"login$document_srl:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:1:{s:12:\"document_srl\";s:6:\"delete\";}}s:37:\"login$document_srl:delete$page:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:2:{s:12:\"document_srl\";s:6:\"delete\";s:4:\"page\";s:6:\"delete\";}}s:23:\"login$member_srl:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:1:{s:10:\"member_srl\";s:6:\"delete\";}}s:17:\"login$page:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:1:{s:4:\"page\";s:6:\"delete\";}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberOwnComment','member','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:16:\"#^my_comments$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:16:\"#^my_comments$#u\";}}','a:1:{s:11:\"my_comments\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberOwnDocument','member','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:17:\"#^my_documents$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:17:\"#^my_documents$#u\";}}','a:1:{s:12:\"my_documents\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberSavedDocument','member','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:23:\"#^my_saved_documents$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:23:\"#^my_saved_documents$#u\";}}','a:1:{s:18:\"my_saved_documents\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberScrappedDocument','member','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:13:\"#^my_scrap$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:13:\"#^my_scrap$#u\";}}','a:1:{s:8:\"my_scrap\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispMemberSignUpForm','member','view','a:9:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:11:\"#^signup$#u\";}i:1;a:2:{i:0;s:3:\"GET\";i:1;s:34:\"#^signup(?P<document_srl>[^/]+)$#u\";}i:2;a:2:{i:0;s:3:\"GET\";i:1;s:49:\"#^signup(?P<document_srl>[^/]+)(?P<page>[^/]+)$#u\";}i:3;a:2:{i:0;s:3:\"GET\";i:1;s:32:\"#^signup(?P<member_srl>[^/]+)$#u\";}i:4;a:2:{i:0;s:3:\"GET\";i:1;s:26:\"#^signup(?P<page>[^/]+)$#u\";}i:5;a:2:{i:0;s:4:\"POST\";i:1;s:34:\"#^signup(?P<document_srl>[^/]+)$#u\";}i:6;a:2:{i:0;s:4:\"POST\";i:1;s:49:\"#^signup(?P<document_srl>[^/]+)(?P<page>[^/]+)$#u\";}i:7;a:2:{i:0;s:4:\"POST\";i:1;s:32:\"#^signup(?P<member_srl>[^/]+)$#u\";}i:8;a:2:{i:0;s:4:\"POST\";i:1;s:26:\"#^signup(?P<page>[^/]+)$#u\";}}','a:5:{s:6:\"signup\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}s:26:\"signup$document_srl:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:1:{s:12:\"document_srl\";s:6:\"delete\";}}s:38:\"signup$document_srl:delete$page:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:2:{s:12:\"document_srl\";s:6:\"delete\";s:4:\"page\";s:6:\"delete\";}}s:24:\"signup$member_srl:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:1:{s:10:\"member_srl\";s:6:\"delete\";}}s:18:\"signup$page:delete\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:1:{s:4:\"page\";s:6:\"delete\";}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispNcenterliteInsertUnsubscribe','ncenterlite','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:35:\"#^notififcations/unsubscribe/add$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:35:\"#^notififcations/unsubscribe/add$#u\";}}','a:1:{s:30:\"notififcations/unsubscribe/add\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispNcenterliteNotifyList','ncenterlite','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:18:\"#^notifications$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:18:\"#^notifications$#u\";}}','a:1:{s:13:\"notifications\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispNcenterliteUnsubscribeList','ncenterlite','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:31:\"#^notififcations/unsubscribe$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:31:\"#^notififcations/unsubscribe$#u\";}}','a:1:{s:26:\"notififcations/unsubscribe\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('dispNcenterliteUserConfig','ncenterlite','view','a:2:{i:0;a:2:{i:0;s:3:\"GET\";i:1;s:26:\"#^notififcations/config$#u\";}i:1;a:2:{i:0;s:4:\"POST\";i:1;s:26:\"#^notififcations/config$#u\";}}','a:1:{s:21:\"notififcations/config\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('IS','integration_search','view','N;','N;','N');
INSERT INTO `rx_action_forward` VALUES ('procMemberInsert','member','controller','a:1:{i:0;a:2:{i:0;s:4:\"POST\";i:1;s:11:\"#^signup$#u\";}}','a:1:{s:6:\"signup\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('procMemberLogin','member','controller','a:1:{i:0;a:2:{i:0;s:4:\"POST\";i:1;s:10:\"#^login$#u\";}}','a:1:{s:5:\"login\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('procMemberLoginWithDevice','member','controller','a:1:{i:0;a:2:{i:0;s:4:\"POST\";i:1;s:17:\"#^device/login$#u\";}}','a:1:{s:12:\"device/login\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('procMemberRegisterDevice','member','controller','a:1:{i:0;a:2:{i:0;s:4:\"POST\";i:1;s:20:\"#^device/register$#u\";}}','a:1:{s:15:\"device/register\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('procMemberUnregisterDevice','member','controller','a:1:{i:0;a:2:{i:0;s:4:\"POST\";i:1;s:22:\"#^device/unregister$#u\";}}','a:1:{s:17:\"device/unregister\";a:2:{s:8:\"priority\";i:0;s:4:\"vars\";a:0:{}}}','N');
INSERT INTO `rx_action_forward` VALUES ('rss','rss','view','N;','N;','N');
/*!40000 ALTER TABLE `rx_action_forward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_addons`
--

DROP TABLE IF EXISTS `rx_addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_addons` (
  `addon` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `is_used` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `is_used_m` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `is_fixed` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`addon`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_addons`
--

LOCK TABLES `rx_addons` WRITE;
/*!40000 ALTER TABLE `rx_addons` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_addons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_addons_site`
--

DROP TABLE IF EXISTS `rx_addons_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_addons_site` (
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `addon` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `is_used` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `is_used_m` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  UNIQUE KEY `unique_addon_site` (`site_srl`,`addon`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_addons_site`
--

LOCK TABLES `rx_addons_site` WRITE;
/*!40000 ALTER TABLE `rx_addons_site` DISABLE KEYS */;
INSERT INTO `rx_addons_site` VALUES (0,'autolink','Y','Y','N;','20230117022724');
INSERT INTO `rx_addons_site` VALUES (0,'photoswipe','Y','Y','N;','20230117022724');
/*!40000 ALTER TABLE `rx_addons_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_admin_favorite`
--

DROP TABLE IF EXISTS `rx_admin_favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_admin_favorite` (
  `admin_favorite_srl` bigint(20) NOT NULL,
  `site_srl` bigint(20) DEFAULT 0,
  `module` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`admin_favorite_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_admin_favorite`
--

LOCK TABLES `rx_admin_favorite` WRITE;
/*!40000 ALTER TABLE `rx_admin_favorite` DISABLE KEYS */;
INSERT INTO `rx_admin_favorite` VALUES (70,0,'advanced_mailer','module');
INSERT INTO `rx_admin_favorite` VALUES (71,0,'ncenterlite','module');
/*!40000 ALTER TABLE `rx_admin_favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_admin_log`
--

DROP TABLE IF EXISTS `rx_admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_admin_log` (
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `site_srl` bigint(20) DEFAULT 0,
  `module` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `idx_admin_ip` (`ipaddress`),
  KEY `idx_admin_date` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_admin_log`
--

LOCK TABLES `rx_admin_log` WRITE;
/*!40000 ALTER TABLE `rx_admin_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_advanced_mailer_log`
--

DROP TABLE IF EXISTS `rx_advanced_mailer_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_advanced_mailer_log` (
  `mail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mail_from` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calling_script` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sending_method` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `errors` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_advanced_mailer_log`
--

LOCK TABLES `rx_advanced_mailer_log` WRITE;
/*!40000 ALTER TABLE `rx_advanced_mailer_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_advanced_mailer_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_advanced_mailer_push_log`
--

DROP TABLE IF EXISTS `rx_advanced_mailer_push_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_advanced_mailer_push_log` (
  `push_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `push_from` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `push_to` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `calling_script` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_count` int(11) NOT NULL,
  `deleted_count` int(11) NOT NULL,
  `updated_count` int(11) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `errors` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`push_id`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_advanced_mailer_push_log`
--

LOCK TABLES `rx_advanced_mailer_push_log` WRITE;
/*!40000 ALTER TABLE `rx_advanced_mailer_push_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_advanced_mailer_push_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_advanced_mailer_sms_log`
--

DROP TABLE IF EXISTS `rx_advanced_mailer_sms_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_advanced_mailer_sms_log` (
  `sms_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sms_from` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `calling_script` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sending_method` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `errors` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sms_id`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_advanced_mailer_sms_log`
--

LOCK TABLES `rx_advanced_mailer_sms_log` WRITE;
/*!40000 ALTER TABLE `rx_advanced_mailer_sms_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_advanced_mailer_sms_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_ai_installed_packages`
--

DROP TABLE IF EXISTS `rx_ai_installed_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_ai_installed_packages` (
  `package_srl` bigint(20) NOT NULL DEFAULT 0,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_update` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  KEY `idx_package_srl` (`package_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_ai_installed_packages`
--

LOCK TABLES `rx_ai_installed_packages` WRITE;
/*!40000 ALTER TABLE `rx_ai_installed_packages` DISABLE KEYS */;
INSERT INTO `rx_ai_installed_packages` VALUES (18325662,'1.11.6','2.0.24','N');
INSERT INTO `rx_ai_installed_packages` VALUES (22753677,'1.8.4','RX_VERSION','N');
INSERT INTO `rx_ai_installed_packages` VALUES (18324167,'1.7.1.1','RX_VERSION','N');
INSERT INTO `rx_ai_installed_packages` VALUES (22646443,'0.4.21','0.4.21','N');
INSERT INTO `rx_ai_installed_packages` VALUES (18324266,'0.1','1.9','N');
INSERT INTO `rx_ai_installed_packages` VALUES (22590697,'1.0.0','1.0.0','N');
INSERT INTO `rx_ai_installed_packages` VALUES (21374711,'3.0.9','RX_VERSION','N');
INSERT INTO `rx_ai_installed_packages` VALUES (18324327,'0.1','RX_VERSION','N');
INSERT INTO `rx_ai_installed_packages` VALUES (18378362,'0.2','1.7','N');
/*!40000 ALTER TABLE `rx_ai_installed_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_ai_remote_categories`
--

DROP TABLE IF EXISTS `rx_ai_remote_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_ai_remote_categories` (
  `category_srl` bigint(20) NOT NULL DEFAULT 0,
  `parent_srl` bigint(20) NOT NULL DEFAULT 0,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_order` bigint(20) NOT NULL,
  PRIMARY KEY (`category_srl`),
  KEY `idx_parent_srl` (`parent_srl`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_ai_remote_categories`
--

LOCK TABLES `rx_ai_remote_categories` WRITE;
/*!40000 ALTER TABLE `rx_ai_remote_categories` DISABLE KEYS */;
INSERT INTO `rx_ai_remote_categories` VALUES (18322907,18322917,'XE 코어',1);
INSERT INTO `rx_ai_remote_categories` VALUES (18322917,0,'프로그램',0);
INSERT INTO `rx_ai_remote_categories` VALUES (18322919,0,'스킨',7);
INSERT INTO `rx_ai_remote_categories` VALUES (18322923,18322917,'모듈',2);
INSERT INTO `rx_ai_remote_categories` VALUES (18322925,18322917,'애드온',3);
INSERT INTO `rx_ai_remote_categories` VALUES (18322927,18322917,'위젯',4);
INSERT INTO `rx_ai_remote_categories` VALUES (18322929,18322917,'에디터컴포넌트',5);
INSERT INTO `rx_ai_remote_categories` VALUES (18322943,18322919,'모듈 스킨',10);
INSERT INTO `rx_ai_remote_categories` VALUES (18322950,18322919,'위젯 스킨',12);
INSERT INTO `rx_ai_remote_categories` VALUES (18322952,18322919,'위젯 스타일',13);
INSERT INTO `rx_ai_remote_categories` VALUES (18322954,18322919,'레이아웃',8);
INSERT INTO `rx_ai_remote_categories` VALUES (18322977,18322919,'회원레벨 아이콘',15);
INSERT INTO `rx_ai_remote_categories` VALUES (18631347,18322917,'단락에디터컴포넌트',6);
INSERT INTO `rx_ai_remote_categories` VALUES (18904838,18322919,'에디터 스타일',14);
INSERT INTO `rx_ai_remote_categories` VALUES (18994170,18322919,'모듈 모바일 스킨',11);
INSERT INTO `rx_ai_remote_categories` VALUES (18994172,18322919,'모바일 레이아웃',9);
/*!40000 ALTER TABLE `rx_ai_remote_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_autoinstall_packages`
--

DROP TABLE IF EXISTS `rx_autoinstall_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_autoinstall_packages` (
  `package_srl` bigint(20) NOT NULL DEFAULT 0,
  `category_srl` bigint(20) DEFAULT 0,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `have_instance` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `updatedate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `latest_item_srl` bigint(20) NOT NULL DEFAULT 0,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `unique_path` (`path`),
  KEY `idx_package_srl` (`package_srl`),
  KEY `idx_category_srl` (`category_srl`),
  KEY `idx_regdate` (`updatedate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_autoinstall_packages`
--

LOCK TABLES `rx_autoinstall_packages` WRITE;
/*!40000 ALTER TABLE `rx_autoinstall_packages` DISABLE KEYS */;
INSERT INTO `rx_autoinstall_packages` VALUES (18325662,18322907,'.','N','20230117160020',22756225,'1.11.6');
INSERT INTO `rx_autoinstall_packages` VALUES (20118343,18322925,'./addon/cufon','N','20221209043613',20190605,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18790298,18322925,'./addon/hellomaster','N','20221213062557',18794783,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21382622,18322925,'./addon/jquery_snow','N','20221209044348',21391227,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22260417,18322925,'./addons/301moved','N','20230113075330',22265949,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19274574,18322925,'./addons/a_soo_wikidoc_pointfixer','N','20230113052533',19274579,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (21805731,18322925,'./addons/activescrollbar','N','20230113074518',21805732,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18777712,18322925,'./addons/add_document','N','20230113101638',18794485,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18982154,18322925,'./addons/addfooter','N','20221220133145',18983942,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18982156,18322925,'./addons/additional_mid','N','20230113043545',18983989,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22228663,18322925,'./addons/addon_insert_sticker','N','20230113075244',22228684,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753419,18322925,'./addons/addon_insert_video','N','20230113083737',22754313,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753417,18322925,'./addons/addon_write_insert_media','N','20230113205924',22754309,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18459111,18322925,'./addons/addthis','N','20230113031547',18459913,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18539546,18322925,'./addons/addvote','N','20221209044053',21244042,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753748,18322925,'./addons/admin_hide','N','20230113085232',22755416,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753706,18322925,'./addons/adsense_helper','N','20230113085042',22755268,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18511514,18322925,'./addons/adult_keyword','N','20230113031722',22754386,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18681809,18322925,'./addons/age_restrictions','N','20221209044404',18687595,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19145884,18322925,'./addons/always_follower','N','20230104184441',19503998,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19503269,18322925,'./addons/analysis','N','20221216114408',19527972,'0.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21788706,18322925,'./addons/AntiProxy','N','20230113074415',21788708,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21015635,18322925,'./addons/appoint_view_user','N','20230108191415',22755995,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753564,18322925,'./addons/apporix','N','20230113084334',22754645,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753581,18322925,'./addons/apporix_native_alert','N','20230113084509',22754678,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22654408,18322925,'./addons/authentication_change','N','20230113082552',22654433,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753745,18322925,'./addons/auto_comment_allow','N','20230113085226',22755397,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753982,18322925,'./addons/auto_comment_secret','N','20230108191022',22756201,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753416,18322925,'./addons/auto_multimedia','N','20230113083731',22754308,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753466,18322925,'./addons/auto_nick','N','20230113083850',22754428,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753534,18322925,'./addons/auto_reply','N','20230113084107',22754579,'0.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22753723,18322925,'./addons/auto_secret','N','20230113085120',22755355,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753797,18322925,'./addons/autoattach','N','20230116194923',22755954,'1.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22716407,18322925,'./addons/autodeny','N','20230113082926',22716411,'0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753640,18322925,'./addons/autolang','N','20230113084717',22754915,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19600206,18322925,'./addons/autowww','N','20230116132021',19604227,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753851,18322925,'./addons/backspace_killer','N','20230113085551',22755676,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22736353,18322925,'./addons/bbCode','N','20230113083022',22736356,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18388093,18322925,'./addons/bekmeProhibite','N','20230113024633',18388181,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753411,18322925,'./addons/block_control','N','20230116182412',22754291,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22752234,18322925,'./addons/block_country','N','20230113083148',22752338,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22455366,18322925,'./addons/block_document','N','20230113080917',22755330,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22653449,18322925,'./addons/block_ip','N','20230113082546',22754567,'2.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22753849,18322925,'./addons/block_search','N','20230113085545',22755674,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22622633,18322925,'./addons/blockact','N','20230108145355',22755957,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20453531,18322925,'./addons/bodyfade','N','20221209043727',21401825,'0.2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21194850,18322925,'./addons/bootstrap_btn','N','20221209044052',21194883,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21195053,18322925,'./addons/bootstrap_icon','N','20221209044054',21202617,'1.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22537451,18322925,'./addons/bootstrap3_css','N','20230113081320',22537493,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753648,18322925,'./addons/bot_challenge','N','20230113084738',22755249,'1.0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22643750,18322925,'./addons/bot_title_control','N','20230113082422',22643845,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22634250,18322925,'./addons/browser_helper','N','20230113082354',22634254,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22605220,18322925,'./addons/cameron_plugin','N','20230114031849',22754521,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22715595,18322925,'./addons/captbha','N','20230113082913',22715603,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (21354767,18322925,'./addons/change_nickname','N','20230113072718',22754182,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22649328,18322925,'./addons/checkkorean','N','20230113082503',22651662,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22618830,18322925,'./addons/checklen','N','20230108145353',22754320,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753881,18322925,'./addons/clamav','N','20230116194935',22755764,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20520855,18322925,'./addons/color_message','N','20221209043809',20520858,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20522778,18322925,'./addons/color_message_for_14','N','20230113070021',20522789,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18342939,18322925,'./addons/comment_new','N','20230113023624',18670429,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20649732,18322925,'./addons/commentwritedownload','N','20221209043817',20681999,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22652987,18322925,'./addons/confirm_declare','N','20230113082539',22754564,'1.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22753653,18322925,'./addons/content_regex_filter','N','20230113084755',22754961,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20277901,18322925,'./addons/controlbox','N','20221215221433',20632434,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19069946,18322925,'./addons/cookie-free_domains','N','20221212121100',19070012,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21889835,18322925,'./addons/counter_ex','N','20230113074932',22754574,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19555887,18322925,'./addons/css3pie','N','20230113060706',20878725,'1.3.3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20951206,18322925,'./addons/css3pie_js','N','20230113072136',20966650,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20949728,18322925,'./addons/CssOutPlus','N','20230108144940',20952200,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753898,18322925,'./addons/datasaver_warning','N','20230113085752',22755847,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18779239,18322925,'./addons/daumview_vote','N','20230113041713',18898435,'0.5.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19608490,18322925,'./addons/del-www','N','20221209043412',19608585,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753608,18322925,'./addons/denied_exist','N','20230113084607',22754798,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753515,18322925,'./addons/denied_word','N','20230113084049',22754797,'1.002');
INSERT INTO `rx_autoinstall_packages` VALUES (22753633,18322925,'./addons/Ding_Fixed_Banner','N','20230113084652',22755314,'1.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753639,18322925,'./addons/Ding_Light_Box','N','20230113084711',22755312,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21289114,18322925,'./addons/division','N','20230104145408',21294767,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20959091,18322925,'./addons/doc_viewer','N','20230116150719',20959094,'0.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753702,18322925,'./addons/document_permission_control_by_author','N','20230113085034',22755263,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19049200,18322925,'./addons/domain_check','N','20230113044606',19050476,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753462,18322925,'./addons/download_wanna_reply','N','20230113083840',22754407,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21384926,18322925,'./addons/dragcolor','N','20221210002734',21385023,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22610154,18322925,'./addons/dsori_ckeditor_setting','N','20230108145343',22624891,'0.1740.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22611192,18322925,'./addons/dsori_facebook_comment','N','20230108145351',22613855,'0.1740.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753994,18322925,'./addons/dsori_notifier_comment','N','20230117092452',22756246,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753992,18322925,'./addons/dsori_notifier_document','N','20230108190918',22756244,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753993,18322925,'./addons/dsori_notifier_member','N','20230108190918',22756245,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22607524,18322925,'./addons/dsori_submanager_free','N','20230113082208',22608742,'0.1740.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22723913,18322925,'./addons/dyform_no_spam','N','20230113082955',22754947,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (20466120,18322925,'./addons/elfinder','N','20230102181641',20480086,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20092760,18322925,'./addons/elkha_packer','N','20230113064513',20702463,'0.11');
INSERT INTO `rx_autoinstall_packages` VALUES (22359020,18322925,'./addons/elkha_simple_spam','N','20230108145207',22359071,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19804189,18322925,'./addons/elkha_www','N','20230113063221',20702493,'0.11');
INSERT INTO `rx_autoinstall_packages` VALUES (18334990,18322925,'./addons/entry','N','20230113022550',18685479,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19527443,18322925,'./addons/event_board','N','20221209043255',19527447,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20547035,18322925,'./addons/exif','N','20230108144934',21378417,'0.9.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753885,18322925,'./addons/ext_ad_membership','N','20230113085735',22755775,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22718477,18322925,'./addons/fa_fileicon','N','20230114125132',22754338,'1.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22649096,18322925,'./addons/fa_loader','N','20230114232004',22754343,'4.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18882151,18322925,'./addons/facebook_social','N','20221209044724',18882152,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20673640,18322925,'./addons/falling_snow','N','20221209043819',20697610,'1.5.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22526528,18322925,'./addons/falling_snow2','N','20230113081206',22528351,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22526756,18322925,'./addons/falling_snow3','N','20230113081219',22528554,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19431519,18322925,'./addons/favicon','N','20221222125852',19434038,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22673162,18322925,'./addons/fileicon','N','20230114231910',22716823,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753646,18322925,'./addons/fix_domain','N','20230113084723',22754935,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753796,18322925,'./addons/fix_mysql_utf8','N','20230113140515',22755521,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753755,18322925,'./addons/fixed_img','N','20230113085236',22755449,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753627,18322925,'./addons/fixed_notice','N','20230113084646',22754875,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753897,18322925,'./addons/floating_video','N','20230113100759',22755842,'0.6.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753336,18322925,'./addons/font_awesome_new','N','20230113083233',22754115,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753340,18322925,'./addons/font_nanum_gothic','N','20230113083241',22754124,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22208653,18322925,'./addons/font-awesome','N','20230113075214',22226740,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753958,18322925,'./addons/fontawesome5','N','20230108191231',22756130,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18334989,18322925,'./addons/func_include','N','20230113022519',18336654,'v1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753770,18322925,'./addons/ggwoorimailscrap','N','20230108150135',22755522,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19157569,18322925,'./addons/google_analytics','N','20230113051148',19157571,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753909,18322925,'./addons/google_recaptcha','N','20230108150602',22756168,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753972,18322925,'./addons/google_tagmanager','N','20230108150840',22756167,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19859881,18322925,'./addons/googleplus','N','20221209043503',19864516,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19875631,18322925,'./addons/gosite','N','20221209043507',19875632,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18326352,18322925,'./addons/guest_name','N','20221209043818',19010744,'1.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753681,18322925,'./addons/hashtags','N','20230113084945',22755203,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18982164,18322925,'./addons/header_editor','N','20230117091931',18984012,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753807,18322925,'./addons/hello_member','N','20230113085446',22755565,'1.1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18326011,18322925,'./addons/hidden_module','N','20230113021051',18337264,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22706212,18322925,'./addons/hide_mid','N','20230113082856',22706230,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753506,18322925,'./addons/hot_document','N','20230116194804',22754766,'1.2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21606824,18322925,'./addons/href_fixed1','N','20230113073914',21606841,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20673638,18322925,'./addons/html5audio_flash','N','20230113070559',22541039,'1.5.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753484,18322925,'./addons/html5multimedia_flash','N','20230113083935',22754465,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22544858,18322925,'./addons/html5video_flash','N','20230113081521',22544908,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18982175,18322925,'./addons/id_rejection','N','20230113043613',18984037,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18990092,18322925,'./addons/IEblock','N','20230113043835',18993329,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21154641,18322925,'./addons/iframe_resize','N','20230115194659',21189969,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753703,18322925,'./addons/image_new_windows','N','20230113085038',22755252,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753463,18322925,'./addons/image_preview','N','20230113083844',22754413,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20340640,18322925,'./addons/iphone_checkbox','N','20221209043618',20409821,'1.0a');
INSERT INTO `rx_autoinstall_packages` VALUES (19433415,18322925,'./addons/jquery_external_load','N','20230108144739',22674018,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22677441,18322925,'./addons/jquerycdn','N','20230113082737',22714080,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22673736,18322925,'./addons/jqueryuicdn','N','20230113082733',22673740,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22678880,18322925,'./addons/jsecure_xe','N','20230113082802',22684436,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20971314,18322925,'./addons/kakao_link','N','20230110085703',20975200,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18324226,18322925,'./addons/keyword_link','N','20230112222016',18325653,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21736776,18322925,'./addons/kru_dab','N','20230108145059',21748943,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21439563,18322925,'./addons/kru_sslhelper','N','20230108145054',21711242,'3.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22516532,18322925,'./addons/langfilter','N','20230113081140',22754507,'0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753722,18322925,'./addons/latex','N','20230113085117',22755316,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (21752944,18322925,'./addons/layerAlert','N','20230113074213',21753018,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21298003,18322925,'./addons/layerpopup','N','20230116183138',22754287,'1.10');
INSERT INTO `rx_autoinstall_packages` VALUES (22753606,18322925,'./addons/level_permit','N','20230113084557',22754795,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21220010,18322925,'./addons/limit_message','N','20221209044105',21229637,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753546,18322925,'./addons/login_2sisstore','N','20230110211719',22755326,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22650410,18322925,'./addons/login_defencer','N','20230113082510',22650418,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753850,18322925,'./addons/login_redirect','N','20230113085548',22755675,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753684,18322925,'./addons/lua_external_file','N','20230113084949',22755147,'0.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753695,18322925,'./addons/lua_hashtag','N','20230113085027',22755190,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753696,18322925,'./addons/lua_shortcut','N','20230113085030',22755315,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21391263,18322925,'./addons/mbanner','N','20221209044352',21391414,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20526823,18322925,'./addons/me2plugin_for_14','N','20230113070104',20526828,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22511691,18322925,'./addons/member_activity_check','N','20230113081128',22754292,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753489,18322925,'./addons/member_ajaxboard','N','20230113083947',22754483,'2.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753510,18322925,'./addons/member_block_addon','N','20230113084039',22754665,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22644317,18322925,'./addons/member_control','N','20230113082430',22644546,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753607,18322925,'./addons/member_doc','N','20230113084604',22754796,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753408,18322925,'./addons/member_extra_vars_check','N','20230113083719',22754283,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18956315,18322925,'./addons/member_icon_print','N','20230113043242',18968140,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18853350,18322925,'./addons/member_join_captcha','N','20230113162853',18855317,'0.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22194465,18322925,'./addons/member_join_ex','N','20230113075144',22194483,'0.2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18324227,18322925,'./addons/member_join_extend','N','20230112222046',18325647,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18766704,18322925,'./addons/member_layer_config','N','20221209044616',18766875,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18410868,18322925,'./addons/member_pointsend','N','20230117013557',21227458,'0.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753815,18322925,'./addons/member_realname','N','20230113085505',22755592,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22736227,18322925,'./addons/memberinfo','N','20230108145442',22754342,'1.10');
INSERT INTO `rx_autoinstall_packages` VALUES (20954749,18322925,'./addons/message_alarm','N','20221222072247',21041089,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753570,18322925,'./addons/message_btn','N','20230116212441',22754743,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18982191,18322925,'./addons/meta_add','N','20230108144639',19814958,'0.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753971,18322925,'./addons/meta_remove','N','20230108150838',22756165,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22631178,18322925,'./addons/mobile_redirect','N','20230113082307',22631183,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21352623,18322925,'./addons/mresizer','N','20230108145042',22755552,'1.6');
INSERT INTO `rx_autoinstall_packages` VALUES (21354730,18322925,'./addons/msg_point','N','20230113072701',21354731,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21876999,18322925,'./addons/multidomain','N','20230113074854',22280906,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753343,18322925,'./addons/multimedia_thumbnail','N','20230113083317',22756019,'2.5.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19692912,18322925,'./addons/music24','N','20221213045347',19692913,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21369594,18322925,'./addons/my_comment_addon','N','20221209044329',21394119,'1.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753359,18322925,'./addons/my_reading','N','20230113083447',22754203,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19906026,18322925,'./addons/mypeople','N','20221209043510',19906139,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21221462,18322925,'./addons/naver_analytics','N','20230113072527',22658323,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22672196,18322925,'./addons/new_document_notify','N','20230113082720',22754335,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753312,18322925,'./addons/new_document_notify2','N','20230113083150',22754204,'1.0.12');
INSERT INTO `rx_autoinstall_packages` VALUES (22753846,18322925,'./addons/no_act','N','20230113085542',22755661,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753685,18322925,'./addons/no_adblock','N','20230113084956',22755161,'1.1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21526323,18322925,'./addons/noclick','N','20230116182813',22754294,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753852,18322925,'./addons/noduplicate','N','20230113085554',22755677,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20806148,18322925,'./addons/nonebutton','N','20221213024036',20823285,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753930,18322925,'./addons/number_dice','N','20230113085820',22755945,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21204144,18322925,'./addons/number_display','N','20221209044056',21204145,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753492,18322925,'./addons/okiz_easyadmin_logout','N','20230113083951',22754522,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21717279,18322925,'./addons/okname','N','20230113074158',21726233,'0.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753904,18322925,'./addons/only_once_comment','N','20230116202053',22755872,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21620531,18322925,'./addons/opengraph','N','20230113073930',21620532,'0.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753693,18322925,'./addons/outdated_browser','N','20230113085024',22755188,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18664319,18322925,'./addons/P3P','N','20230113034743',18668421,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21398290,18322925,'./addons/pagechange','N','20230113073626',21432465,'3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18334980,18322925,'./addons/piclens','N','20221212120930',20168732,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22736372,18322925,'./addons/placeHolders','N','20230113083024',22736378,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324228,18322925,'./addons/planet_bookmark','N','20221221213017',21017018,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324233,18322925,'./addons/planet_todo','N','20221221213137',21016986,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753652,18322925,'./addons/point_pangpang','N','20230113084747',22755059,'1.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753528,18322925,'./addons/point_pangpang_plus','N','20230113084103',22754951,'0.2b');
INSERT INTO `rx_autoinstall_packages` VALUES (22753610,18322925,'./addons/poll_point','N','20230113084617',22754813,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18640943,18322925,'./addons/pop_up','N','20230117013510',19149746,'0.0.8');
INSERT INTO `rx_autoinstall_packages` VALUES (18334979,18322925,'./addons/popup','N','20230116132150',18335423,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20525058,18322925,'./addons/popup_menu_like_1_4','N','20221216004441',20798880,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19555797,18322925,'./addons/prettyphoto','N','20230108144748',21336236,'1.1.3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753950,18322925,'./addons/prevent_deletion','N','20230108150751',22756080,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753946,18322925,'./addons/prohibit_backlink','N','20230108150738',22756053,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (20644220,18322925,'./addons/prohibit_monologue','N','20230113070429',20644221,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22616427,18322925,'./addons/pushwing','N','20230113082214',22663888,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22616439,18322925,'./addons/pushwing_comment','N','20230113082219',22639689,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18982192,18322925,'./addons/q_emphasis','N','20230113043641',18984109,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19519186,18322925,'./addons/qrcode','N','20230116151259',19528193,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21591779,18322925,'./addons/radarURL','N','20221215040757',21594258,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19137447,18322925,'./addons/rainbow_link','N','20221221213220',19431548,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22549104,18322925,'./addons/recommend','N','20230113081527',22549119,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21626541,18322925,'./addons/Redirection','N','20230113073948',21626542,'1.0a');
INSERT INTO `rx_autoinstall_packages` VALUES (20673999,18322925,'./addons/referer','N','20230116212242',22755559,'3.5.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324241,18322925,'./addons/referer_old','N','20230112222117',18325632,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18990133,18322925,'./addons/referercheck','N','20230113043903',19009627,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19187623,18322925,'./addons/refhide','N','20221209043004',19191147,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753609,18322925,'./addons/regdate_edit','N','20230113084614',22754803,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753657,18322925,'./addons/remail','N','20230113084807',22754984,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18326351,18322925,'./addons/remove_id_search','N','20230113021227',18326429,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753902,18322925,'./addons/replace_word','N','20230113085755',22755873,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21190663,18322925,'./addons/report_addon','N','20230106120841',21194703,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753667,18322925,'./addons/requirefile','N','20230113084929',22755038,'1.01');
INSERT INTO `rx_autoinstall_packages` VALUES (22648862,18322925,'./addons/robotcontrol','N','20230113082448',22649123,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21651786,18322925,'./addons/scmplayer','N','20230113074111',22299133,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (21262112,18322925,'./addons/scrollbar','N','20221209044107',21262114,'0.9.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21373345,18322925,'./addons/searchhighlight','N','20230111201050',21394152,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21400134,18322925,'./addons/securityPlus','N','20221210001003',21400135,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753500,18322925,'./addons/sejin7940_addvote','N','20230108145656',22755698,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (20564368,18322925,'./addons/sejin7940_align','N','20230113070252',20564370,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753508,18322925,'./addons/sejin7940_all_notice','N','20230108145659',22754697,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (21978106,18322925,'./addons/sejin7940_autotrash','N','20230113075030',21978124,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753481,18322925,'./addons/sejin7940_kakao_link','N','20230113083925',22754488,'0.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22735026,18322925,'./addons/sejin7940_mobile_resize','N','20230113083015',22735066,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21950613,18322925,'./addons/sejin7940_mustlogin','N','20230113075015',21959492,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19960240,18322925,'./addons/sejin7940_readed_count','N','20230113063945',19960243,'1.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19923002,18322925,'./addons/sejin7940_write_limit','N','20230113063924',22687892,'1.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753612,18322925,'./addons/select_addon','N','20230116201938',22754818,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753594,18322925,'./addons/session_shield','N','20230116213007',22756003,'2.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21415137,18322925,'./addons/setitle2','N','20221219234927',21415140,'2.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21189057,18322925,'./addons/settitle','N','20221209044033',21383555,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19442769,18322925,'./addons/sex_restrictions','N','20221209043246',19455388,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19306395,18322925,'./addons/shortcut','N','20221209043154',19306492,'0.9.9.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753622,18322925,'./addons/signoutdel','N','20230113084642',22754837,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753988,18322925,'./addons/simple_mp3_player','N','20230117105226',22756219,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19574799,18322925,'./addons/smenubox_scaleupdown','N','20230110163918',19576713,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18325951,18322925,'./addons/sms_alert','N','20230113020950',18326173,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753315,18322925,'./addons/sns_card','N','20230113100741',22754099,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19513447,18322925,'./addons/sns_linker_lite','N','20230113055013',22754189,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19518196,18322925,'./addons/socialxe_helper','N','20230114031657',20361435,'1.0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19550402,18322925,'./addons/socialxe_mid_forwarder','N','20230113060620',20361446,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18982195,18322925,'./addons/soo_add_content','N','20230113043709',22755412,'0.6a');
INSERT INTO `rx_autoinstall_packages` VALUES (21124707,18322925,'./addons/soo_add_ssl','N','20221221091459',21124708,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18982196,18322925,'./addons/soo_autolang','N','20230113043739',19687115,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19336589,18322925,'./addons/soo_block_UA','N','20230113053418',19336590,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19565911,18322925,'./addons/soo_body_content','N','20230113060841',19565912,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19458868,18322925,'./addons/soo_feed_delay','N','20221219062511',19458869,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18648969,18322925,'./addons/soo_for_muzik_player','N','20230108144551',19687129,'0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19862381,18322925,'./addons/soo_googleplus','N','20221219062139',19890691,'0.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18682481,18322925,'./addons/soo_js_exif','N','20230113035019',18859459,'0.3.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18990588,18322925,'./addons/soo_mcrblog_link','N','20230113043931',21924371,'1.2.14');
INSERT INTO `rx_autoinstall_packages` VALUES (19293487,18322925,'./addons/soo_mobile_top','N','20230113052756',20892008,'3');
INSERT INTO `rx_autoinstall_packages` VALUES (18982221,18322925,'./addons/soo_parking','N','20230113043807',22755425,'0.25');
INSERT INTO `rx_autoinstall_packages` VALUES (19549401,18322925,'./addons/source_marking','N','20230113153001',19549402,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753501,18322925,'./addons/ssl_support','N','20230113084027',22754509,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18326038,18322925,'./addons/statistics','N','20230113021157',18327083,'1.0.1b');
INSERT INTO `rx_autoinstall_packages` VALUES (22753550,18322925,'./addons/stats','N','20230116171148',22754602,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22744282,18322925,'./addons/stop_spambot_xe','N','20230117092051',22756215,'2.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22753387,18322925,'./addons/sxe_bbcode_lite','N','20230113083520',22754233,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753381,18322925,'./addons/sxe_block_write','N','20230113083456',22754220,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753393,18322925,'./addons/sxe_ncenter_plus','N','20230113083526',22754245,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753382,18322925,'./addons/sxe_now_connected','N','20230113083500',22754221,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753390,18322925,'./addons/sxe_writing_format','N','20230113083522',22754246,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753989,18322925,'./addons/tag_off','N','20230117092443',22756227,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18325813,18322925,'./addons/tag_relation','N','20230114090048',22274979,'1.4.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753482,18322925,'./addons/tag_relation_add','N','20230113083930',22754457,'1.4.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19555926,18322925,'./addons/tag_relation/skins/default','N','20230114031728',19915132,'0.9.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18324247,18322925,'./addons/tccommentnotify','N','20230112222148',18365845,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21189175,18322925,'./addons/texteffect','N','20221209044035',21197591,'0.2 beta');
INSERT INTO `rx_autoinstall_packages` VALUES (22753940,18322925,'./addons/theme_admin','N','20230113085834',22756006,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21933112,18322925,'./addons/to_sns','N','20230116085749',22756009,'0.2.6');
INSERT INTO `rx_autoinstall_packages` VALUES (21901097,18322925,'./addons/today_fortune','N','20230113074946',21908882,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22594585,18322925,'./addons/trolley','N','20230113082017',22596756,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19081914,18322925,'./addons/tweet_button','N','20221213164031',19083524,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22640952,18322925,'./addons/twoc_memo_del','N','20230113082401',22640972,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753969,18322925,'./addons/typofix','N','20230108150835',22756154,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18338697,18322925,'./addons/uccup','N','20230113023516',18338747,'v2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753373,18322925,'./addons/updatecategory','N','20230116233217',22754190,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22497371,18322925,'./addons/url_shortener','N','20230113081041',22574332,'1.12');
INSERT INTO `rx_autoinstall_packages` VALUES (20957609,18322925,'./addons/wating_message','N','20221213023842',20957612,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753800,18322925,'./addons/web_fonts','N','20230117133633',22755550,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19555878,18322925,'./addons/webfont','N','20230108144752',21378394,'1.1.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19202629,18322925,'./addons/webfontface','N','20221209043107',19206513,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22223413,18322925,'./addons/wiki_extend','N','20230113075230',22223443,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324248,18322925,'./addons/wiki_link','N','20230112222220',21813902,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19583417,18322925,'./addons/wiki-link','N','20221209043407',19600787,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18326353,18322925,'./addons/write_limit','N','20230113021257',18637861,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21092346,18322925,'./addons/xdt_button','N','20230108145000',21739119,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22553944,18322925,'./addons/xdt_css','N','20230113081534',22553960,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22657234,18322925,'./addons/xdt_google_analytics','N','20230117092041',22756278,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22456939,18322925,'./addons/xdt_scrollbar','N','20230113080928',22456955,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22580059,18322925,'./addons/xesticky','N','20230113081724',22580144,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22703904,18322925,'./addons/xetrace','N','20230113082844',22703936,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753449,18322925,'./addons/xss_session_protector','N','20230113083807',22754383,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753458,18322925,'./addons/youtube_control','N','20230113083837',22754991,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753901,18322925,'./addons/zhttps','N','20230108150556',22755861,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753934,18322925,'./addons/zipdownload','N','20230113152112',22756123,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22235916,18322925,'./addons/zipped_xe','N','20230113075302',22278143,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753658,18322925,'./addons/zipperupper','N','20230113084813',22755026,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22572362,18322954,'./layout/book_layout','N','20230113081628',22572485,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18649613,18322954,'./layouts/2010_jowrney','N','20230113034711',19060126,'0.2.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18347510,18322954,'./layouts/aginet_official_v2','N','20221209043824',18575161,'2.0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753576,18322954,'./layouts/ASXE_FLAT','N','20230113084455',22754715,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22115065,18322954,'./layouts/awake','N','20230113075113',22754348,'1.0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22678527,18322954,'./layouts/awake2','N','20230113082755',22755684,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753386,18322954,'./layouts/b_black','N','20230113083505',22754231,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753742,18322954,'./layouts/basic_tpl_c','N','20230113085147',22755404,'1.04');
INSERT INTO `rx_autoinstall_packages` VALUES (18327285,18322954,'./layouts/bcptwta','N','20230113021444',18328111,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18818977,18322954,'./layouts/blackcity','N','20221209044700',18832088,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18662544,18322954,'./layouts/blooz_layout_ver3','N','20221209044248',18701665,'3.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22348667,18322954,'./layouts/blue','N','20230113080640',22348685,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18716138,18322954,'./layouts/bom','N','20221209044456',18722236,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21862798,18322954,'./layouts/brownwhite','N','20230113233146',21863022,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324292,18322954,'./layouts/cafeXE','N','20230112222403',21802168,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20989209,18322954,'./layouts/Chemistry_lite','N','20230113072253',20989210,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19532779,18322954,'./layouts/church_layout','N','20230115234344',19532784,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19918823,18322954,'./layouts/cimple_plus','N','20230113063903',19921280,'1.3c');
INSERT INTO `rx_autoinstall_packages` VALUES (19340331,18322954,'./layouts/CN_No1','N','20230113053444',19344956,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19440527,18322954,'./layouts/CN_No2','N','20230113054046',19440528,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19570840,18322954,'./layouts/CN_No3','N','20230113060927',19582438,'1.0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19707750,18322954,'./layouts/CN_No4','N','20230113062049',19708324,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19816429,18322954,'./layouts/CN_No5','N','20230113063326',19816430,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19767397,18322954,'./layouts/columnist','N','20230113062710',20270404,'1.5.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753710,18322954,'./layouts/creative_sim','N','20230113085046',22755295,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19088764,18322954,'./layouts/crom_black_box_layout','N','20221209042841',19089573,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19351727,18322954,'./layouts/crom_eco','N','20230116185323',19351728,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19050369,18322954,'./layouts/crom_fixy_layout_private','N','20230116185551',19053826,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19098862,18322954,'./layouts/crom_groove_eco_private','N','20221211155802',19099350,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19529399,18322954,'./layouts/crom_iXE','N','20230113055948',19600243,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22669010,18322954,'./layouts/css3_simple','N','20230113082701',22687348,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753476,18322954,'./layouts/CustomStrap','N','20230116202719',22754447,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18748689,18322954,'./layouts/daerew_v4_layout','N','20221209044604',18926143,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22473723,18322954,'./layouts/daol_official','N','20230110230301',22755920,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22501977,18322954,'./layouts/dark_white','N','20230113081105',22508454,'v1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19320728,18322954,'./layouts/darkdream','N','20230113052944',19320733,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19322818,18322954,'./layouts/darkgrid','N','20230113053011',19322819,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753660,18322954,'./layouts/ding_default_layout','N','20230113084817',22755044,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753867,18322954,'./layouts/Door_cpA_limit','N','20230112080200',22755752,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753871,18322954,'./layouts/Door_cpB_limit','N','20230113085715',22755754,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753538,18322954,'./layouts/doorweb_basic','N','20230116194821',22754722,'1.7.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753316,18322954,'./layouts/doorweb_v4','N','20230114230715',22754256,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (19974913,18322954,'./layouts/Dynamic','N','20230113064047',20429124,'3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18855088,18322954,'./layouts/elkha_dr4','N','20230113042545',19703575,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18606308,18322954,'./layouts/elkha_fge','N','20230114003146',18657582,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18642464,18322954,'./layouts/elkha_graystyle','N','20230117091912',22756125,'2.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18766685,18322954,'./layouts/elkha_graystyle2_lite','N','20230116201752',18844159,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19700913,18322954,'./layouts/elkha_monochrome','N','20230113061854',19803893,'0.12');
INSERT INTO `rx_autoinstall_packages` VALUES (19031365,18322954,'./layouts/elkha_neutral','N','20230116201933',20692034,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19684891,18322954,'./layouts/elkha_pieces','N','20230113061722',19788968,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18612951,18322954,'./layouts/elkha_simple','N','20221209044122',18633735,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18606314,18322954,'./layouts/elkha_sky','N','20230113032732',19822870,'1.4.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18650492,18322954,'./layouts/elkha_sky2','N','20230108230808',18865308,'1.4.5');
INSERT INTO `rx_autoinstall_packages` VALUES (20074878,18322954,'./layouts/elkha_tskorea','N','20230114003407',22755825,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19034752,18322954,'./layouts/elkha_x610','N','20221209042752',19072093,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22655078,18322954,'./layouts/emergence','N','20230113082558',22660012,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753892,18322954,'./layouts/ena_creamy','N','20230108150528',22755817,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753955,18322954,'./layouts/ena_paper','N','20230117092325',22756099,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21782412,18322954,'./layouts/eond_compact','N','20230116184602',21782413,'0.8.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19234197,18322954,'./layouts/eond_mynote','N','20230116184614',21723208,'1.4.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19230703,18322954,'./layouts/eond_official','N','20230115153933',21382865,'1.4.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18714842,18322954,'./layouts/eond_portal_main_2col_right','N','20230113041143',21776053,'0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (21761048,18322954,'./layouts/eond_rosso','N','20230113074229',21791719,'0.3.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21776217,18322954,'./layouts/eond_starter','N','20230116184550',21776218,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753937,18322954,'./layouts/equeer_layout','N','20230117142108',22755985,'1.4.5');
INSERT INTO `rx_autoinstall_packages` VALUES (21643233,18322954,'./layouts/Express999','N','20230113074040',21838875,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22716306,18322954,'./layouts/firstkenta','N','20230113082919',22754179,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22631837,18322954,'./layouts/five_start','N','20230113082332',22631859,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22651543,18322954,'./layouts/flat_series','N','20230117070504',22754140,'1.0.22');
INSERT INTO `rx_autoinstall_packages` VALUES (22753769,18322954,'./layouts/freelancer','N','20230114060736',22755465,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22542943,18322954,'./layouts/Fresh','N','20230113081410',22543307,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19073125,18322954,'./layouts/fsfsdas_neutral','N','20230113050252',19848942,'0.4.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19428586,18322954,'./layouts/fullmetal_by_daramkun','N','20230113053954',19432660,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19510234,18322954,'./layouts/gallery_layout','N','20230113054857',19532739,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753949,18322954,'./layouts/game_layout','N','20230110232228',22756074,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19302110,18322954,'./layouts/gardenoforchids','N','20230113052848',19302111,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18414428,18322954,'./layouts/Gom-e.net_Hankooktown2_Layout','N','20230113031201',18445386,'1.0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (19226818,18322954,'./layouts/gom2net_2nd_layout','N','20230113051857',19273763,'2.0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19283251,18322954,'./layouts/gom2net_3rd_layout','N','20230113052703',19283257,'3.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19202617,18322954,'./layouts/gom2net_layout','N','20221209043059',19204527,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18447927,18322954,'./layouts/Gom2netLayoutEngland','N','20221209044019',18454140,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18424676,18322954,'./layouts/gomenet_xe_official_v2','N','20230113031306',18426534,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18326553,18322954,'./layouts/habile_layout','N','20230113021351',18330571,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19509849,18322954,'./layouts/hankooktown','N','20230113054832',19509864,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18409541,18322954,'./layouts/hankooktown2','N','20230113031028',19512809,'1.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20259612,18322954,'./layouts/HappyTravel_v1','N','20230113065109',20261781,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19512714,18322954,'./layouts/heaven','N','20230113054947',19514431,'Alpha');
INSERT INTO `rx_autoinstall_packages` VALUES (22377937,18322954,'./layouts/hestia','N','20230113080718',22754444,'2.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18703356,18322954,'./layouts/how','N','20221209044429',18707091,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324297,18322954,'./layouts/ideation','N','20230114003124',18325198,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19818901,18322954,'./layouts/ikarusv1simple','N','20230113063457',19829113,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22641332,18322954,'./layouts/Imagemonster','N','20230113082408',22754363,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19456969,18322954,'./layouts/impress-06','N','20230113054252',19464583,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753917,18322954,'./layouts/J_Finder','N','20230115212040',22756013,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753920,18322954,'./layouts/J_Flex','N','20230111144636',22755939,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753915,18322954,'./layouts/J_Furniture','N','20230114003352',22755994,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753925,18322954,'./layouts/J_Maltese','N','20230114060930',22755949,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753921,18322954,'./layouts/J_Smart','N','20230108150647',22755938,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18706109,18322954,'./layouts/jimseung_biz','N','20221209044443',18711864,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18703085,18322954,'./layouts/jimseung_nate','N','20221209044424',18705555,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18706113,18322954,'./layouts/jimseung_simplesub','N','20221209044448',18709461,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (18383233,18322954,'./layouts/Jungbok_layout_V3.0','N','20230113024518',18389790,'V3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753353,18322954,'./layouts/kbfree','N','20230113083349',22754197,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19219093,18322954,'./layouts/kia','N','20221216004919',19219094,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753820,18322954,'./layouts/kimtajo_onepage_widget_layout','N','20230116215559',22755601,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753787,18322954,'./layouts/kimtajo_responsive_one_page','N','20230113085354',22755594,'1.03');
INSERT INTO `rx_autoinstall_packages` VALUES (18631835,18322954,'./layouts/kindguyLayout(201001_Kindguy4_1_xe1.3.1.2)','N','20221209044126',18634134,'201001');
INSERT INTO `rx_autoinstall_packages` VALUES (18631838,18322954,'./layouts/kindguyLayout(201001_Kindguy4_2_xe1.3.1.2)','N','20221227201312',18634163,'201001');
INSERT INTO `rx_autoinstall_packages` VALUES (18512505,18322954,'./layouts/kindguyLayout(BlueN_200912_1)','N','20221209044034',18516495,'200912');
INSERT INTO `rx_autoinstall_packages` VALUES (18512506,18322954,'./layouts/kindguyLayout(BlueN_200912_2)','N','20221209044037',18516511,'200912');
INSERT INTO `rx_autoinstall_packages` VALUES (18419537,18322954,'./layouts/kindguyLayout(joins_200911_1)','N','20230113031235',18422597,'v.200911');
INSERT INTO `rx_autoinstall_packages` VALUES (18454611,18322954,'./layouts/kindguyLayout(khan_200911_1)','N','20221209044027',18454709,'v.200911');
INSERT INTO `rx_autoinstall_packages` VALUES (18454629,18322954,'./layouts/kindguyLayout(khan_200911_2)','N','20221209044031',18454718,'v.200911');
INSERT INTO `rx_autoinstall_packages` VALUES (18432183,18322954,'./layouts/kindguyLayout(munhwa_200911_1)','N','20230113031414',18432699,'v.200911');
INSERT INTO `rx_autoinstall_packages` VALUES (18432187,18322954,'./layouts/kindguyLayout(munhwa_200911_2)','N','20230113031445',18432723,'v.200911');
INSERT INTO `rx_autoinstall_packages` VALUES (19201015,18322954,'./layouts/kinesis_cs01f','N','20230116202950',19201021,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19280154,18322954,'./layouts/kinesis_pl001f','N','20230116185418',19280155,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18968288,18322954,'./layouts/kinesis_sitelist','N','20230113043410',19348039,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19044000,18322954,'./layouts/kom','N','20221209042757',19050135,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18700386,18322954,'./layouts/koo','N','20221209044415',18707058,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18677776,18322954,'./layouts/lay','N','20230116185720',18682153,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22470148,18322954,'./layouts/layout_intermission','N','20230113080952',22545808,'0.9.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19623994,18322954,'./layouts/layout_newsMagazine_free','N','20230113061346',19623995,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19513978,18322954,'./layouts/layout_photoGalleryA_Free','N','20230113055038',19514630,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19623904,18322954,'./layouts/layout_photoGalleyA_sub','N','20230116194524',19623910,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18900548,18322954,'./layouts/layout_skin(kindguy1.0_type1_xe1.4.1.1)','N','20230104150428',18901309,'201005');
INSERT INTO `rx_autoinstall_packages` VALUES (18900551,18322954,'./layouts/layout_skin(kindguy1.1_type2_xe1.4.1.1)','N','20221217081522',18901322,'201005');
INSERT INTO `rx_autoinstall_packages` VALUES (18975451,18322954,'./layouts/layout_skin(kindguy5.0_type2_xe1.4.1.1)','N','20221212114444',18981166,'201006');
INSERT INTO `rx_autoinstall_packages` VALUES (18975452,18322954,'./layouts/layout_skin(kindguy5.1_type2_xe1.4.1.1)','N','20221212114442',18981176,'201006');
INSERT INTO `rx_autoinstall_packages` VALUES (19360170,18322954,'./layouts/layout_skin(xenara_v1.0_type1_xe1.4.4.1)','N','20230113053837',19360187,'201010');
INSERT INTO `rx_autoinstall_packages` VALUES (19360171,18322954,'./layouts/layout_skin(xenara_v1.1_type3_xe1.4.4.1)','N','20230113053903',19360205,'201010');
INSERT INTO `rx_autoinstall_packages` VALUES (19712751,18322954,'./layouts/layout_skin(xenara_v1.2_type2_xe1.4.5.2)','N','20230113062230',19712752,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19831182,18322954,'./layouts/layout_skin(xenara_v3.0_type2_xe1.4.4.4)','N','20230113063519',19831183,'3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19831194,18322954,'./layouts/layout_skin(xenara_v3.1_type2_xe1.4.4.4)','N','20230113063541',19831195,'3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18849332,18322954,'./layouts/layout_skin(xenara1.1_xe1.4.0.10)','N','20230104150443',18853151,'201004');
INSERT INTO `rx_autoinstall_packages` VALUES (18959079,18322954,'./layouts/layoutskin_wave_blue','N','20230113043341',21382225,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18705012,18322954,'./layouts/layoutSkin(kindguy5.1_xe1.4.0.5)','N','20221216005159',18708750,'201002');
INSERT INTO `rx_autoinstall_packages` VALUES (18705013,18322954,'./layouts/layoutSkin(kindguy5.2_xe1.4.0.5)','N','20221217014950',18708767,'201002');
INSERT INTO `rx_autoinstall_packages` VALUES (20330088,18322954,'./layouts/layoutwotc_portal','N','20230113065438',20691619,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19749792,18322954,'./layouts/layoutwotc_text','N','20230113062457',22596494,'1.0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (21535219,18322954,'./layouts/live_login','N','20230113073825',21768603,'1.5.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753856,18322954,'./layouts/magik','N','20230113085557',22755690,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18929288,18322954,'./layouts/mcube','N','20221219044802',18957849,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18735942,18322954,'./layouts/mediaOn','N','20221209044514',18746917,'1.02');
INSERT INTO `rx_autoinstall_packages` VALUES (18330814,18322954,'./layouts/messenger','N','20230113022137',18331384,'Messenger_v0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753967,18322954,'./layouts/mh_fullpage','N','20230117133633',22756147,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18327419,18322954,'./layouts/mh_simple','N','20230108144515',18327611,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753587,18322954,'./layouts/miku_daisuki','N','20230116194850',22754733,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19116278,18322954,'./layouts/modern_line','N','20230114084100',19135412,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19090619,18322954,'./layouts/nabul2_milate_8T','N','20221209042844',19092504,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19232784,18322954,'./layouts/nabul2_Wishful','N','20230113052104',19232785,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18381054,18322954,'./layouts/naver_photo_style','N','20230113024446',18429470,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19657758,18322954,'./layouts/NetCabin_X2','N','20230113061609',19657761,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19655120,18322954,'./layouts/NetCabin_X3','N','20230113061542',20430977,'0.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22563158,18322954,'./layouts/nextep','N','20230113081557',22581078,'nextep v1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18712555,18322954,'./layouts/nom','N','20221209044451',18712759,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22627992,18322954,'./layouts/orange_simple','N','20230113082245',22670250,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18606318,18322954,'./layouts/paper_layer','N','20221209044111',18611976,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19097462,18322954,'./layouts/pb','N','20221209042849',19125110,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19711536,18322954,'./layouts/people blue','N','20230113062144',19744693,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22583972,18322954,'./layouts/phizRWDThemes','N','20230108145308',22714063,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21090780,18322954,'./layouts/pleasure','N','20230113072356',21092056,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19532317,18322954,'./layouts/portal_layout','N','20230113060154',19533824,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22730560,18322954,'./layouts/purexe','N','20230113083009',22754180,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19506416,18322954,'./layouts/PXE_clio','N','20230113054737',19506418,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19100570,18322954,'./layouts/PXE_koi','N','20230113050653',19504533,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18328672,18322954,'./layouts/PXE_leaflet_lite','N','20230113021857',18339574,'1.02 Final');
INSERT INTO `rx_autoinstall_packages` VALUES (19624858,18322954,'./layouts/Quad','N','20230113061432',19630832,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19133654,18322954,'./layouts/Rebirth_A','N','20230104085001',19224091,'1.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753322,18322954,'./layouts/rkt001','N','20230113083208',22754084,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753339,18322954,'./layouts/rkt002','N','20230113083238',22754118,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18832037,18322954,'./layouts/rom','N','20221209044704',18837238,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753942,18322954,'./layouts/root_basic_layout','N','20230117092219',22756191,'1.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22540074,18322954,'./layouts/s4us_1.0','N','20230113081344',22540131,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19135133,18322954,'./layouts/seven','N','20230113050943',19955250,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18663182,18322954,'./layouts/shx_chameleon','N','20221209044256',18668568,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20579823,18322954,'./layouts/SilverCloud','N','20230115141734',20579824,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753711,18322954,'./layouts/sim_blog','N','20230114144915',22755296,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753720,18322954,'./layouts/simblog2','N','20230113085106',22755305,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753344,18322954,'./layouts/simple_is_best','N','20230116201831',22754147,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19630138,18322954,'./layouts/SimpleDropDown','N','20230116184847',20467486,'2.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22280542,18322954,'./layouts/simplestrap','N','20230117092005',22756198,'2.4.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753457,18322954,'./layouts/simplicity','N','20230116184359',22754391,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19555890,18322954,'./layouts/sketchbook5','N','20230116184634',21336191,'1.6.3.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19712183,18322954,'./layouts/smart','N','20230113062207',20902184,'0.9.9');
INSERT INTO `rx_autoinstall_packages` VALUES (18846103,18322954,'./layouts/SORRENT_LAYOUT_RELEASE','N','20230115113338',18851320,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19891355,18322954,'./layouts/steelblue4_Basic','N','20230113063730',19891356,'4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753847,18322954,'./layouts/stellar','N','20230114060449',22755946,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20401336,18322954,'./layouts/style_a_lite','N','20230117142202',22754751,'2.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (21883072,18322954,'./layouts/the_bootstrap','N','20230116162010',22755641,'3.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753341,18322954,'./layouts/The_Simple_Classic_Lite','N','20230116212843',22754141,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19618448,18322954,'./layouts/Tony','N','20230113061016',19620083,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18877427,18322954,'./layouts/Treasurej_Craftwork','N','20221215221516',19032188,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19032971,18322954,'./layouts/Treasurej_Craftwork_C','N','20221215221351',19038047,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18327743,18322954,'./layouts/Treasurej_Heart_Note','N','20230113021653',19334770,'1.6');
INSERT INTO `rx_autoinstall_packages` VALUES (18866481,18322954,'./layouts/Treasurej_Lifestyle','N','20230113042643',21971882,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753561,18322954,'./layouts/ts_basic','N','20230116202800',22754619,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18682907,18322954,'./layouts/ueo','N','20230116185611',19051858,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753900,18322954,'./layouts/undeviating','N','20230114060853',22755942,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19099015,18322954,'./layouts/ure','N','20221215175909',19099016,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753328,18322954,'./layouts/verti','N','20230108145511',22754108,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18716480,18322954,'./layouts/voo','N','20230116164556',18722243,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18634838,18322954,'./layouts/vz_clear_blue','N','20221209044135',18635623,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20458826,18322954,'./layouts/we_home','N','20230113065612',20980624,'1.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22591861,18322954,'./layouts/webbuilder_layout','N','20230108145327',22610423,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22610502,18322954,'./layouts/webbuilder_layout2','N','20230116212833',22614812,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22488105,18322954,'./layouts/webengine_white','N','20230113081030',22602278,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753572,18322954,'./layouts/websitebuilder','N','20230116194842',22754679,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20531619,18322954,'./layouts/white_square_layout','N','20230113070125',20882875,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18572882,18322954,'./layouts/xdom_v2','N','20230115210547',19595474,'2.5.2.4');
INSERT INTO `rx_autoinstall_packages` VALUES (21810388,18322954,'./layouts/xdt_black_time','N','20230113074552',22403080,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20966755,18322954,'./layouts/xdt_community','N','20230116184732',21002067,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21009029,18322954,'./layouts/xdt_community_2','N','20230108144949',21009030,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22332211,18322954,'./layouts/xdt_cool','N','20230114041630',22595789,'1.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20687933,18322954,'./layouts/xdt_offical_2','N','20230113071716',20949015,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (21302525,18322954,'./layouts/xdt_pure','N','20230116201822',22755554,'1.6');
INSERT INTO `rx_autoinstall_packages` VALUES (21428178,18322954,'./layouts/xdt_simple_home','N','20230113073809',22403086,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22568598,18322954,'./layouts/xdt_simple_home2','N','20230108145300',22715996,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22396862,18322954,'./layouts/xdt_style_b','N','20230113080744',22658304,'1.2.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18378357,18322954,'./layouts/xe_cafe','N','20230113024345',21803889,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20276726,18322954,'./layouts/xe_cafe_hub','N','20230113065209',21803871,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20168220,18322954,'./layouts/xe_cafe_site','N','20230113064743',21803913,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753662,18322954,'./layouts/xe_kimtajo_layout','N','20230115122016',22755545,'2.03');
INSERT INTO `rx_autoinstall_packages` VALUES (18324299,18322954,'./layouts/xe_official_v2','N','20230112222505',20391868,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19178969,18322954,'./layouts/xe_official_v2_TmaKing','N','20221209042959',19186638,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19248816,18322954,'./layouts/xe_official_v2_Toyou','N','20230113052335',19258583,'c');
INSERT INTO `rx_autoinstall_packages` VALUES (18595504,18322954,'./layouts/xe_official_v2_xgenesis','N','20221213162618',18596408,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21245296,18322954,'./layouts/xe_official_v2.2','N','20230113072602',21295736,'v.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20472943,18322954,'./layouts/xe_solid_enterprise_LeCiel_v1','N','20230113065656',20613484,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (19515672,18322954,'./layouts/xe_sunooBCLg','N','20230113055218',19515673,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18357476,18322954,'./layouts/xe_sunooDMLg','N','20230113023931',19462033,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18362403,18322954,'./layouts/xe_sunooDMRg','N','20230113024107',19462101,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18722759,18322954,'./layouts/xe_sunooEmLg','N','20230116131419',19462122,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18790924,18322954,'./layouts/xe_sunooEmRg','N','20230116133502',19462147,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19462173,18322954,'./layouts/xe_sunooNSLg','N','20230113054409',19462174,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19491937,18322954,'./layouts/xe_sunooTALg','N','20230113054620',19491938,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19462195,18322954,'./layouts/xe_sunooWALg','N','20230113054438',19462196,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753713,18322954,'./layouts/xecafe','N','20230113085058',22755285,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753801,18322954,'./layouts/xedition_r','N','20230116090316',22755551,'1.9');
INSERT INTO `rx_autoinstall_packages` VALUES (19765252,18322954,'./layouts/XEgrid_Free','N','20230113062635',19765321,'1.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22711628,18322954,'./layouts/xelab_ll1','N','20230113082907',22712736,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19138636,18322954,'./layouts/xenoriter_simple','N','20221209042954',19138637,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22535332,18322954,'./layouts/xeschool_red','N','20230113081308',22535344,'red');
INSERT INTO `rx_autoinstall_packages` VALUES (22753559,18322954,'./layouts/xet_onecolor','N','20230116232557',22754842,'1.0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18917848,18322954,'./layouts/xeVector','N','20221209044936',18918526,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22631822,18322954,'./layouts/xeview_layout','N','20230113110455',22631830,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18637860,18322954,'./layouts/xgenesis_official','N','20230113033519',19516685,'0.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753712,18322954,'./layouts/xit','N','20230113085054',22755284,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19060827,18322954,'./layouts/xom','N','20221209042806',19092257,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753743,18322954,'./layouts/yourfoliomain','N','20230113085207',22755394,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18607483,18322954,'./layouts/zirho_layout','N','20221213162342',18645390,'0.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19051939,18322954,'./layouts/zom','N','20221209042803',19087062,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19060125,18994172,'./m.layouts/2010_jowrney_mobile','N','20230116201757',19063585,'0.1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753780,18994172,'./m.layouts/BlueRock','N','20230117092146',22755477,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18998734,18994172,'./m.layouts/naverstyle','N','20230108144648',19000655,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753835,18994172,'./m.layouts/phizmobile_m','N','20230117092149',22755630,'1.8.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22660923,18994172,'./m.layouts/phizMobileThemes','N','20230116202007',22754202,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753345,18994172,'./m.layouts/simple_is_best_mobile','N','20230116212902',22754148,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19594292,18994172,'./m.layouts/sketchbook5Mobile','N','20230117091945',20557098,'1.2.2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753542,18994172,'./m.layouts/sweetMobile','N','20230117092119',22754694,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22589792,18994172,'./m.layouts/webbuilder','N','20230117092037',22589821,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753573,18994172,'./m.layouts/xenon_hs','N','20230117092126',22754659,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22514693,18994172,'./m.layouts/xenon_nx','N','20230114153951',22754354,'0.9.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21290627,18994172,'./m.layouts/XenonMoblie','N','20230110202359',21815540,'1.9.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22454021,18322923,'./messageTalk','N','20230113080900',22460914,'2.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19431275,18322943,'./module/board/skins','N','20230113054019',19432793,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18325790,18322923,'./modules/ad','N','20230115113916',22756258,'0.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753935,18322923,'./modules/admin_menu','N','20230113085827',22755982,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753677,18322923,'./modules/advanced_mailer','N','20230116213011',22756149,'1.8.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753326,18322923,'./modules/ajaxboard','N','20230113083217',22754482,'2.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19497436,18322923,'./modules/analysis','N','20230113054712',19528063,'0.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19130198,18322923,'./modules/analytics','N','20230116194459',22755256,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753637,18322923,'./modules/androidpushapp','N','20230113084708',22755682,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19323693,18322923,'./modules/antiaccess','N','20230113053112',20181898,'1.0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753563,18322923,'./modules/apporix','N','20230113084324',22754631,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19519182,18322923,'./modules/aroundmap','N','20230113055515',19519377,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753313,18322923,'./modules/attendance','N','20230115162450',22756122,'7.2.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19030768,18322943,'./modules/attendance/skins/sky_at_board','N','20230115161921',19038444,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (20236415,18322943,'./modules/attendance/skins/sr_at_skin','N','20230113123954',20236418,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21195185,18322923,'./modules/authentication','N','20230116194540',22754169,'3.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753636,18322923,'./modules/auto_login','N','20230113084700',22754942,'1.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22617898,18322923,'./modules/automail','N','20230113082235',22617911,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19522899,18322923,'./modules/bannermgm','N','20230113055630',19523059,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753655,18322923,'./modules/beluxe','N','20230116173311',22755255,'2.8.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753674,18322943,'./modules/beluxe/skins/dxblog','N','20230113115804',22755246,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753680,18322943,'./modules/beluxe/skins/dxreview','N','20230116173310',22755245,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753890,18322923,'./modules/blind','N','20230115023513',22755799,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18773076,18322923,'./modules/blogshop','N','20230113041545',18920619,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324167,18322923,'./modules/board','N','20230108144333',21940502,'1.7.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753397,18322923,'./modules/board_extend','N','20230117020951',22754254,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19901434,18994170,'./modules/board/m.skins','N','20230116120006',19902394,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753779,18994170,'./modules/board/m.skins/BlueRock','N','20230117092143',22755476,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20290703,18994170,'./modules/board/m.skins/m_sr_memo','N','20230117022927',20300033,'0.3.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753497,18994170,'./modules/board/m.skins/ms_m_board','N','20230117092113',22755358,'1.5.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753840,18994170,'./modules/board/m.skins/phiz_mboard','N','20230113141327',22755633,'1.8.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21378491,18994170,'./modules/board/m.skins/sketchbook5','N','20230116201941',22754337,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19594435,18994170,'./modules/board/m.skins/sketchbook5Mobile','N','20230114031719',20973906,'1.2.3.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22587055,18994170,'./modules/board/m.skins/sm','N','20230116212245',22693248,'0.5.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22658404,18994170,'./modules/board/m.skins/sosifam_memo','N','20230116212258',22738369,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753558,18994170,'./modules/board/m.skins/sweetMobileBoard','N','20230116202045',22754647,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19056755,18994170,'./modules/board/m.skins/xe_official_planner123','N','20230117091934',22756194,'5.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21290615,18994170,'./modules/board/m.skins/xenon_m_board','N','20230108145014',21393065,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753943,18322943,'./modules/board/skins/aplos_v2','N','20230117092236',22756132,'2.2.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753575,18322943,'./modules/board/skins/ASXE_FLAT','N','20230116212500',22754714,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753475,18322943,'./modules/board/skins/bbsmusic','N','20230117024024',22754834,'1.7.105');
INSERT INTO `rx_autoinstall_packages` VALUES (19918081,18322943,'./modules/board/skins/CNboard','N','20230113185818',19918082,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22530581,18322943,'./modules/board/skins/contact_write','N','20230116212801',22755840,'1.14');
INSERT INTO `rx_autoinstall_packages` VALUES (18686122,18322943,'./modules/board/skins/elkha_xe_official','N','20230113035050',18687734,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753893,18322943,'./modules/board/skins/ena_board_set_mellow','N','20230114204637',22756262,'1.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753727,18322943,'./modules/board/skins/ena_board_set_simpledashed','N','20230114215828',22755328,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753996,18322943,'./modules/board/skins/ena_board_set_simplemellow','N','20230117105447',22756265,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19235403,18322943,'./modules/board/skins/eond_board','N','20230113052210',19235419,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18632016,18322943,'./modules/board/skins/faq','N','20230113033244',18636828,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753833,18322943,'./modules/board/skins/Horizon','N','20230113185432',22755713,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753933,18322943,'./modules/board/skins/insp_yotube','N','20230117141857',22755979,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19637507,18322943,'./modules/board/skins/JB_erebus_board','N','20230113061518',22450338,'1.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18731809,18322943,'./modules/board/skins/loser_guestbook','N','20230113041244',19235463,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19526573,18322943,'./modules/board/skins/lune_board','N','20230113114714',20290780,'1.04');
INSERT INTO `rx_autoinstall_packages` VALUES (22753464,18322943,'./modules/board/skins/mixitup','N','20230113083846',22754418,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19182698,18322943,'./modules/board/skins/new_faq','N','20230113051215',20467493,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18331803,18322943,'./modules/board/skins/p_board_p','N','20230113022209',18845219,'3.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19020313,18322943,'./modules/board/skins/pastel_light_purple','N','20230113044250',19028626,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22467273,18322943,'./modules/board/skins/phiz_A_zine2','N','20230113080940',22471747,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753841,18322943,'./modules/board/skins/phiz_mboard','N','20230108150332',22755634,'1.8.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18766699,18322943,'./modules/board/skins/quiet_board','N','20230113041515',18766890,'2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22597855,18322943,'./modules/board/skins/rest_default','N','20230113185637',22723910,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18980346,18322943,'./modules/board/skins/sejin7940_board','N','20230113114651',20120497,'3.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753817,18322943,'./modules/board/skins/simple_banner','N','20230111201353',22755613,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19018202,18322943,'./modules/board/skins/simple_blue','N','20230113044222',19023717,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20514706,18322943,'./modules/board/skins/simple_board','N','20230114122634',22754093,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19348911,18322943,'./modules/board/skins/simpleborder_guestbook','N','20230113053601',19356183,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19555903,18322943,'./modules/board/skins/sketchbook5','N','20230117104805',22754336,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22301990,18322943,'./modules/board/skins/sketchbook5_youtube','N','20230115194659',22304077,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22585779,18322943,'./modules/board/skins/sm','N','20230113081751',22696276,'1.9.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753429,18322943,'./modules/board/skins/sosi_memo','N','20230113083754',22754360,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19885185,18322943,'./modules/board/skins/sr_memo','N','20230113162643',20959847,'0.9.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753941,18322943,'./modules/board/skins/uikit','N','20230117092215',22756000,'1.0.15.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19197549,18322943,'./modules/board/skins/webhard','N','20230113051311',19291163,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19285120,18322943,'./modules/board/skins/win_guestbook','N','20230113052730',19295125,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22566102,18322943,'./modules/board/skins/wmboard','N','20230113081610',22573020,'2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20279332,18322943,'./modules/board/skins/xe_auction','N','20230113065314',20369078,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324211,18322943,'./modules/board/skins/xe_board','N','20230112221654',18325569,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19349000,18322943,'./modules/board/skins/xe_board_extended','N','20230113053627',19349001,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324212,18322943,'./modules/board/skins/xe_default','N','20230112221728',18325513,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18335090,18322943,'./modules/board/skins/xe_naradesign','N','20230113023202',18335100,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18448761,18322943,'./modules/board/skins/xe_official_hancoma_title_skin','N','20230116212239',18461302,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18398352,18322943,'./modules/board/skins/xe_official_planner123','N','20230117091849',22756196,'5.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21802016,18322943,'./modules/board/skins/xe_official_planner123/colorset','N','20230113074447',22754341,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18953963,18322943,'./modules/board/skins/xe_official_sky','N','20230113043143',18971884,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18338699,18322943,'./modules/board/skins/xe_uccup','N','20230113023550',18338792,'v2.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21813965,18322943,'./modules/board/skins/xe_v3_gallery_haan','N','20230113074607',21814028,'0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20279228,18322923,'./modules/boardauction','N','20230113065249',20295567,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18943118,18322943,'./modules/bodex/skins','N','20230113043108',18953950,'완성버전');
INSERT INTO `rx_autoinstall_packages` VALUES (19894029,18322943,'./modules/bodex/skins/sw_contact','N','20230113063755',19902554,'0.9');
INSERT INTO `rx_autoinstall_packages` VALUES (22753517,18322923,'./modules/bulkmsg','N','20230113084059',22754543,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22073155,18322923,'./modules/cash','N','20230113075059',22074809,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18589320,18322923,'./modules/cashbook','N','20230113151959',19603368,'0.3.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753351,18322923,'./modules/cashpay','N','20230116212400',22755800,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20710471,18322923,'./modules/checkip','N','20230113071818',20765854,'0.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22660953,18994170,'./modules/communication/m.skin/phizMobile','N','20230108145424',22660956,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22646488,18994170,'./modules/communication/m.skins/sketchbook5_communication_m.skin','N','20230117014235',22755494,'0.4.21');
INSERT INTO `rx_autoinstall_packages` VALUES (18595711,18322943,'./modules/communication/skins/name','N','20230113032426',18597241,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22283657,18322943,'./modules/communication/skins/simplestrap','N','20230116165941',22756200,'2.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22646443,18322943,'./modules/communication/skins/sketchbook5_communication_skin','N','20230117162155',22755495,'0.4.21');
INSERT INTO `rx_autoinstall_packages` VALUES (21861251,18322943,'./modules/communication/skins/tb','N','20230113074738',21861263,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20155171,18322943,'./modules/communication/skins/XET_communication','N','20230115112139',21344485,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20187450,18322923,'./modules/contact','N','20230116201815',21968983,'1.7.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20476937,18322943,'./modules/contact/skins/cameron','N','20230114031904',21970579,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22540502,18322943,'./modules/contact/skins/phizContact','N','20230113081359',22540527,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21411172,18322943,'./modules/contact/skins/tb','N','20230113073714',21411184,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18997930,18322923,'./modules/coupon','N','20230113044029',21627586,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753863,18322923,'./modules/couponsms','N','20230113085622',22755709,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753346,18322923,'./modules/currency','N','20230116202032',22755801,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22597112,18322923,'./modules/cympusadmin','N','20230116201959',22755802,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753891,18322923,'./modules/cympuser','N','20230113085739',22755803,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753983,18322923,'./modules/dable','N','20230117092409',22756257,'0.9.4');
INSERT INTO `rx_autoinstall_packages` VALUES (20908270,18322923,'./modules/detail_search','N','20230113072018',20949711,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753947,18322923,'./modules/devcenter','N','20230108150741',22756118,'0.4.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19551431,18322977,'./modules/document/tpl/icons','N','20230113060643',19551432,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753465,18322923,'./modules/easyxe','N','20230116212412',22755347,'1.43.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753689,18322929,'./modules/editor/components/btn_add','N','20230117092140',22755152,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18324261,18322929,'./modules/editor/components/cc_license','N','20230112222251',18325227,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19657941,18322929,'./modules/editor/components/chess','N','20230109071038',19688815,'1.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18325803,18322929,'./modules/editor/components/code_highlighter','N','20230116201737',22754829,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19817434,18322929,'./modules/editor/components/eh_player','N','20230117091951',22755204,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18324266,18322929,'./modules/editor/components/emoticon','N','20230112222322',18325232,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19983564,18322977,'./modules/editor/components/emoticon/tpl/images','N','20230113064130',19984752,'1.4.5.10');
INSERT INTO `rx_autoinstall_packages` VALUES (19009872,18904838,'./modules/editor/components/emoticon/tpl/images/congcon','N','20230116103848',19010544,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19306873,18904838,'./modules/editor/components/emoticon/tpl/images/hicon','N','20230108144731',19310220,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18994748,18904838,'./modules/editor/components/emoticon/tpl/images/pink','N','20230108144641',18995710,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18325989,18322929,'./modules/editor/components/google_translate','N','20230114191434',18777700,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18730576,18322929,'./modules/editor/components/interpark_book_search','N','20230108144612',18740294,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18649607,18322929,'./modules/editor/components/jowrney_logmap','N','20230108144553',19533339,'0.4.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753406,18322929,'./modules/editor/components/map_components','N','20230117092101',22755647,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753545,18322929,'./modules/editor/components/markdown','N','20230117092122',22756056,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22540996,18322929,'./modules/editor/components/multimedia_link','N','20230116104021',22616932,'1.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324273,18322929,'./modules/editor/components/quotation','N','20230108144352',18325248,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21194822,18322929,'./modules/editor/components/simple_jw','N','20230116212759',21364752,'0.3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18673912,18322929,'./modules/editor/components/soo_google_map','N','20230116201750',22231835,'0.9');
INSERT INTO `rx_autoinstall_packages` VALUES (18650580,18322929,'./modules/editor/components/soo_naver_bookinfo','N','20230108144559',19044122,'0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18679839,18322929,'./modules/editor/components/soo_naver_image','N','20230108144609',18690439,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21014822,18322929,'./modules/editor/components/soo_youtube','N','20230108144952',21039496,'0.5.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753654,18322929,'./modules/editor/components/srook_maker','N','20230117092136',22754966,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18326005,18322929,'./modules/editor/components/textbox','N','20230108144513',18326938,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753638,18322943,'./modules/editor/skins/ck_xpress','N','20230116103914',22754981,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22590697,18322943,'./modules/editor/skins/ckeditor','N','20230113081758',22590711,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324213,18322943,'./modules/editor/skins/dreditor','N','20230112221759',18865892,'1.3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18773077,18631347,'./modules/editor/skins/dreditor/drcomponents/blogshop_writer','N','20230108144621',18920604,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18652557,18631347,'./modules/editor/skins/dreditor/drcomponents/code','N','20230108144601',18652761,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18646646,18631347,'./modules/editor/skins/dreditor/drcomponents/iframe','N','20230108144546',18646655,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22610153,18322943,'./modules/editor/skins/dsori_ckeditor','N','20230108145332',22624901,'0.1740.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18324214,18322943,'./modules/editor/skins/fckeditor','N','20230112221832',18325501,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20473328,18904838,'./modules/editor/skins/fckplus','N','20230108172553',20487316,'1.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (20476783,18904838,'./modules/editor/skins/fckplus_SimpleWhite','N','20230116103048',20487172,'1.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (19529916,18322943,'./modules/editor/skins/jowrneyEditor','N','20230113060013',19533373,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753568,18322943,'./modules/editor/skins/sejin7940_editor_blank','N','20230113084353',22754639,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753566,18322943,'./modules/editor/skins/sejin7940_editor_fileupload','N','20230116113512',22754637,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19355511,18904838,'./modules/editor/skins/simple_editor','N','20230116102911',19355526,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18809955,18322943,'./modules/editor/skins/tinyMCE','N','20230113042111',18810260,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19197538,18322950,'./modules/editor/skins/webhard','N','20230113051243',19291157,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20473753,18322943,'./modules/editor/skins/xeed','N','20230113065724',20473754,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22450636,18322943,'./modules/editor/skins/xpresseditor_axupload5','N','20230116113518',22755307,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753334,18322943,'./modules/editor/skins/xpresseditor_datauri','N','20230112203100',22754114,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18324221,18322943,'./modules/editor/skins/xquared','N','20230112221911',18325496,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18910976,18904838,'./modules/editor/styles/dreditor','N','20230108144636',18910977,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19674194,18904838,'./modules/editor/styles/misol','N','20230116103811',19674198,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19673444,18904838,'./modules/editor/styles/NomarginPTag','N','20230108144813',19675462,'0.0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22452877,18904838,'./modules/editor/styles/simplestrap','N','20230116165940',22452885,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753617,18322923,'./modules/encryption','N','20230113084633',22755121,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22594556,18322923,'./modules/epay','N','20230116212831',22755804,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753895,18322923,'./modules/etorrent','N','20230108150536',22755829,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753571,18322923,'./modules/exam','N','20230116212447',22754771,'0.8');
INSERT INTO `rx_autoinstall_packages` VALUES (20187411,18322923,'./modules/faq','N','20230113064947',21854296,'1.7.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753936,18322923,'./modules/file_log','N','20230113085831',22755983,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (21854312,18322923,'./modules/forum','N','20230113074652',21956789,'1.7.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22351328,18322943,'./modules/forum/skins/flat_forum_lite','N','20230113080653',22374400,'1.0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753724,18322923,'./modules/freedownload','N','20230113085124',22755331,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18621989,18322923,'./modules/gagafilemd5','N','20230113033111',18684166,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753356,18322923,'./modules/gdata','N','20230113083436',22754185,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753957,18322923,'./modules/geoipxe','N','20230108150757',22756186,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22726124,18322923,'./modules/ggmailing','N','20230116194602',22756092,'0.4.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753953,18322923,'./modules/google_calendar','N','20230111234931',22756094,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20187337,18322923,'./modules/guestbook','N','20230115160813',21962590,'1.7.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324168,18322923,'./modules/homepage','N','20230112221106',21854391,'1.7.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20277082,18322943,'./modules/homepage/skins/xe_cafe_v2','N','20230113065229',20309227,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18956310,18322923,'./modules/iconshop','N','20230113043212',18999633,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753726,18322923,'./modules/imageprocess','N','20230116202048',22756180,'2.6.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753977,18322923,'./modules/import_excel','N','20230117092406',22756192,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753348,18322923,'./modules/inipay','N','20230116201837',22754422,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753349,18322923,'./modules/inipaymobile','N','20230116202034',22755895,'2.6.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753783,18322923,'./modules/inipaystandard','N','20230113085339',22755887,'2.6.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18595500,18322943,'./modules/integration_search/skins/default_xgenesis','N','20230113032356',18596361,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21861282,18322943,'./modules/integration_search/skins/tb','N','20230113074809',21861307,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19473533,18322943,'./modules/integration_search/skins/xgenesis_official','N','20230113054530',19473716,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22356670,18322943,'./modules/integration_search/skins/yjsoft_ggcse','N','20230117092029',22756280,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19514473,18322943,'./modules/issuetracker','N','20230113055103',19539420,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18335281,18322923,'./modules/join_extend','N','20230113023236',18988537,'0.5.3.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18366133,18322943,'./modules/join_extend/skins','N','20230115112340',18366143,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753350,18322923,'./modules/kcp','N','20230116212345',22755806,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18334938,18322923,'./modules/kin','N','20230113022416',21965762,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19073195,18322923,'./modules/krzip_popup','N','20230113050320',19073196,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753759,18322923,'./modules/laweb_xe','N','20230113085238',22755702,'3.10');
INSERT INTO `rx_autoinstall_packages` VALUES (22753864,18322923,'./modules/layout_manager','N','20230113085630',22755722,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22597020,18322923,'./modules/license','N','20230113082123',22635123,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20670102,18322923,'./modules/lisense','N','20230113070534',20692149,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324171,18322923,'./modules/livexe','N','20230112221215',19624726,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (18905882,18322923,'./modules/loginlog','N','20230115122918',22756183,'1.5.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19024107,18322923,'./modules/lottery','N','20230113044319',19027139,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753474,18322943,'./modules/lottery/skins/eond_v1','N','20230116194625',22754439,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20415487,18322943,'./modules/lottery/skins/simple','N','20230113065550',20451828,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19212262,18322923,'./modules/lucene','N','20230113051637',19315303,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19202124,18322923,'./modules/lunar','N','20230113051452',19213083,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19201082,18322923,'./modules/mail_m9','N','20230113051337',19201083,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753806,18322923,'./modules/mailing','N','20230108150215',22755557,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753459,18322923,'./modules/maps','N','20230108145636',22755385,'1.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753541,18322923,'./modules/marketplace','N','20230116232343',22754737,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18324175,18322923,'./modules/material','N','20230112221247',18669818,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18929292,18322923,'./modules/mcubeimg','N','20230115045748',18983143,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18334996,18322923,'./modules/media','N','20230113022621',18336696,'v0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753624,18322923,'./modules/member_condition','N','20230111091603',22755317,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753717,18322923,'./modules/member_expire','N','20230116213024',22756005,'1.2.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22547855,18994170,'./modules/member/m.skins/Blouse','N','20230108145254',22568070,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22660940,18994170,'./modules/member/m.skins/phizMobile','N','20230108145422',22660950,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22646468,18994170,'./modules/member/m.skins/sketchbook5_member_m.skin','N','20230117014319',22755493,'0.4.21');
INSERT INTO `rx_autoinstall_packages` VALUES (21290626,18994170,'./modules/member/m.skins/xenon_m_member','N','20230108145019',21429905,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19344633,18322943,'./modules/member/skins','N','20230113053510',19349355,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19073227,18322943,'./modules/member/skins/default_krzip','N','20230113050347',19073228,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19202128,18322943,'./modules/member/skins/default(lunar)','N','20230113051519',19467792,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19962621,18322943,'./modules/member/skins/noangel_black','N','20230113064006',19962952,'1.0a');
INSERT INTO `rx_autoinstall_packages` VALUES (19560898,18322943,'./modules/member/skins/photoGalleryA','N','20230113060817',19560902,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20495669,18322943,'./modules/member/skins/simple','N','20230115112227',20507441,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20519604,18322943,'./modules/member/skins/simple_for_14','N','20230115112208',21193099,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22283649,18322943,'./modules/member/skins/simplestrap','N','20230117092024',22756205,'2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22646356,18322943,'./modules/member/skins/sketchbook5_member_skin','N','20230117014224',22755492,'0.4.21');
INSERT INTO `rx_autoinstall_packages` VALUES (21861240,18322943,'./modules/member/skins/tb','N','20230113074723',21861246,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20155119,18322943,'./modules/member/skins/XET_member','N','20230115112138',21197586,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753907,18994170,'./modules/message/m.skins/stalla','N','20230117092204',22755892,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20502461,18322943,'./modules/message/skins/cmd_message','N','20230113065852',20502462,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21715889,18322943,'./modules/message/skins/eond','N','20230113074127',21715890,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19976643,18322950,'./modules/message/skins/naruCD','N','20230113064109',19984421,'0.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753906,18322943,'./modules/message/skins/stalla','N','20230108150558',22755891,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21861272,18322943,'./modules/message/skins/tb','N','20230113074753',21861277,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18325946,18322923,'./modules/minishop','N','20230113020918',22754398,'1.3.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21388442,18322923,'./modules/mobileex','N','20230113073552',22107721,'0.6.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22579388,18322923,'./modules/money','N','20230113081718',22702291,'0.1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753588,18322923,'./modules/moneyhistory','N','20230113084530',22754731,'0.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22705169,18322923,'./modules/moneysend','N','20230113082849',22705176,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18610979,18322923,'./modules/msg_admin','N','20230113032937',18614159,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21876980,18322923,'./modules/multidomain','N','20230113074839',22755400,'1.4.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22594549,18322923,'./modules/ncart','N','20230116212819',22755807,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21374711,18322923,'./modules/ncenterlite','N','20230117104551',22756275,'3.0.9');
INSERT INTO `rx_autoinstall_packages` VALUES (21798677,18322943,'./modules/ncenterlite/skins/playerplace','N','20230113074431',21798682,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753399,18322943,'./modules/ncenterlite/skins/wild_ones','N','20230113083531',22754258,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20393822,18322923,'./modules/newposts','N','20230115122946',22755538,'2.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22594557,18322923,'./modules/nmileage','N','20230116201949',22755808,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18335043,18322923,'./modules/nms','N','20230113023008',19520872,'0.9.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20324311,18322923,'./modules/notification','N','20230116212241',22755762,'2.4.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753857,18322923,'./modules/notifymessage','N','20230113085559',22755694,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753986,18322923,'./modules/nowconnect','N','20230112111358',22756267,'1.0.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22594541,18322923,'./modules/nproduct','N','20230116212820',22755889,'2.6.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22594546,18322923,'./modules/nstore','N','20230113081839',22755810,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22596809,18322923,'./modules/nstore_digital','N','20230113082025',22755812,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22596810,18322923,'./modules/nstore_digital_contents','N','20230114032915',22755811,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21717275,18322923,'./modules/okname','N','20230113074142',21726208,'0.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18527888,18322923,'./modules/oneban','N','20230113031753',18529981,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753811,18322923,'./modules/opensearch','N','20230113085457',22755570,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22115651,18322923,'./modules/pa','N','20230113075129',22121058,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753552,18322923,'./modules/pado_ajax_newsModule','N','20230113084222',22754727,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753837,18994170,'./modules/page/m.skins/main02_MobileM','N','20230117092156',22755631,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21290617,18994170,'./modules/page/m.skins/xenon_m_page','N','20230108145017',21295253,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20509760,18322943,'./modules/page/skins/sejin7940_page','N','20230113105910',22572810,'1.4.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753975,18322923,'./modules/pagelocker','N','20230117092355',22756270,'1.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22597227,18322923,'./modules/paynoty','N','20230113082141',22755890,'2.6.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753352,18322923,'./modules/paypal','N','20230116194627',22755814,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753838,18322923,'./modules/phizeditormobile','N','20230113141328',22755632,'1.8.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753818,18322923,'./modules/phpexcel_module','N','20230116144205',22755598,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19325680,18322923,'./modules/pipingxe','N','20230115021839',19546936,'1.0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18324188,18322923,'./modules/planet','N','20230112221445',21015994,'0.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18399622,18322977,'./modules/poin/954','N','20230113030922',18404551,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19988049,18322977,'./modules/point/icons','N','20230113064153',19988222,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22245529,18322977,'./modules/point/icons/2sis_icon','N','20230111104024',22245577,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (18997142,18322977,'./modules/point/icons/300','N','20230113043959',18998204,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22402420,18322977,'./modules/point/icons/500-983','N','20230108145210',22402437,'fort');
INSERT INTO `rx_autoinstall_packages` VALUES (19015269,18322977,'./modules/point/icons/CA_L_Mark','N','20230113044153',19026360,'0.1v');
INSERT INTO `rx_autoinstall_packages` VALUES (19754728,18322977,'./modules/point/icons/ca_ladder_60','N','20230113062520',19755182,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19015265,18322977,'./modules/point/icons/cool','N','20230113044126',19026346,'0.1v');
INSERT INTO `rx_autoinstall_packages` VALUES (18864982,18322977,'./modules/point/icons/cs_level','N','20230114214258',18866619,'0.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22481310,18322977,'./modules/point/icons/Dandy_TJ','N','20230108145231',22481349,'I\'m very Dandy');
INSERT INTO `rx_autoinstall_packages` VALUES (18669571,18322977,'./modules/point/icons/dark','N','20230113034916',18672429,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22266089,18322977,'./modules/point/icons/default_J','N','20230108145143',22266113,'PK_CP');
INSERT INTO `rx_autoinstall_packages` VALUES (22303618,18322977,'./modules/point/icons/donek','N','20230108145153',22303661,'Acc');
INSERT INTO `rx_autoinstall_packages` VALUES (19806836,18322977,'./modules/point/icons/elkha_poporina_zerostar50','N','20230113063242',19806837,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19064264,18322977,'./modules/point/icons/getam','N','20230113050106',19064959,'0.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22305559,18322977,'./modules/point/icons/KJA_Love','N','20230108145158',22305588,'R');
INSERT INTO `rx_autoinstall_packages` VALUES (22753886,18322977,'./modules/point/icons/las_icon','N','20230108150514',22755781,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21344825,18322977,'./modules/point/icons/level','N','20230108224217',21360732,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22141994,18322977,'./modules/point/icons/level_icon','N','20230111103929',22734341,'SSS');
INSERT INTO `rx_autoinstall_packages` VALUES (18354463,18322977,'./modules/point/icons/lv','N','20230113023828',19013505,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19566135,18322977,'./modules/point/icons/NetCabin_Lvic','N','20230113060904',19576465,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19068106,18322977,'./modules/point/icons/nova2','N','20230113050159',19068107,'0.1a');
INSERT INTO `rx_autoinstall_packages` VALUES (22535360,18322977,'./modules/point/icons/plusalpine','N','20230111100727',22535364,'plusAlpha');
INSERT INTO `rx_autoinstall_packages` VALUES (18904819,18322977,'./modules/point/icons/raycity_f','N','20230113042844',18908837,'0.1v');
INSERT INTO `rx_autoinstall_packages` VALUES (18904767,18322977,'./modules/point/icons/raycity_m','N','20230113042814',18908827,'0.1v');
INSERT INTO `rx_autoinstall_packages` VALUES (22535350,18322977,'./modules/point/icons/redskiicons','N','20230111100744',22535354,'redski');
INSERT INTO `rx_autoinstall_packages` VALUES (22737353,18322977,'./modules/point/icons/semo','N','20230109132437',22737363,'Volkswagen');
INSERT INTO `rx_autoinstall_packages` VALUES (19064410,18322977,'./modules/point/icons/simple_TS','N','20230113050133',19064414,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22186881,18322977,'./modules/point/icons/star','N','20230108145130',22186890,'S');
INSERT INTO `rx_autoinstall_packages` VALUES (19299608,18322977,'./modules/point/icons/ToYou_level','N','20230113052822',19299609,'ToYou_level_icon v1.');
INSERT INTO `rx_autoinstall_packages` VALUES (22337183,18322977,'./modules/point/icons/typical-t','N','20230108145201',22337194,'Timeless');
INSERT INTO `rx_autoinstall_packages` VALUES (22160991,18322977,'./modules/point/icons/wf_lv','N','20230108221734',22161011,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19533731,18322977,'./modules/point/icons/xeicon_coa','N','20230113060244',19736559,'3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22356680,18322977,'./modules/point/icons/zanazana','N','20230108145205',22356690,'I don\'t no');
INSERT INTO `rx_autoinstall_packages` VALUES (22753420,18322923,'./modules/pointhistory','N','20230113083741',22755663,'0.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18410867,18322923,'./modules/pointsend','N','20230116212234',22756269,'1.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19426823,18322943,'./modules/poll/skins/clevis_poll','N','20230113053928',19440072,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18640942,18322923,'./modules/pop_up','N','20230116213753',18646378,'0.0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (19510889,18322923,'./modules/portalpoint','N','20230113054922',19741258,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753314,18322923,'./modules/privilege','N','20230116212346',22756207,'0.1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753434,18322923,'./modules/profiler','N','20230116202037',22754941,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18867310,18322923,'./modules/project','N','20230113042713',21278683,'1.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753894,18322923,'./modules/randocument','N','20230113085745',22755828,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21933295,18322923,'./modules/realnotice','N','20230113075001',21933310,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (21412475,18322923,'./modules/recruit','N','20230113073730',21412476,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20673970,18322923,'./modules/referer','N','20230117091956',22756252,'3.12.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324189,18322923,'./modules/referer_old','N','20230112221519',18325389,'0.15');
INSERT INTO `rx_autoinstall_packages` VALUES (21231044,18322923,'./modules/reset_password','N','20230113072544',22728311,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18324191,18322923,'./modules/resource','N','20230116140920',21854259,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753861,18322923,'./modules/roulette','N','20230113085604',22755708,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19519188,18322923,'./modules/rssboard','N','20230113055540',19539111,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18800584,18322923,'./modules/sboard','N','20230113105929',18878072,'2.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753647,18322923,'./modules/schedule','N','20230113084726',22754990,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21211103,18322923,'./modules/sejin7940_comment','N','20230114043620',22755699,'1.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22730395,18994170,'./modules/sejin7940_comment/m.skins/sketchbook5_mycomment_mskin','N','20230117092047',22755497,'1.0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22730394,18322943,'./modules/sejin7940_comment/skins/sketchbook5_mycomment_skin','N','20230114031616',22755498,'1.0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22577184,18322923,'./modules/sejin7940_copy','N','20230117092033',22756190,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753388,18322923,'./modules/sejin7940_nick','N','20230112005037',22755824,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22690074,18322923,'./modules/sejin7940_vote','N','20230108145426',22755593,'1.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753488,18322923,'./modules/sitemap','N','20230113140756',22755639,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753842,18322923,'./modules/sitemaplite','N','20230116162624',22756007,'1.1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21370287,18322923,'./modules/smartux','N','20230113072908',21370289,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753565,18322923,'./modules/smith','N','20230113084338',22754636,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18325941,18322923,'./modules/sms','N','20230113020843',18745231,'1.3.10');
INSERT INTO `rx_autoinstall_packages` VALUES (18561875,18322923,'./modules/smsontextyle','N','20230113031957',18569729,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19518187,18322923,'./modules/socialxe','N','20230114031658',22123379,'1.0.11');
INSERT INTO `rx_autoinstall_packages` VALUES (20789735,18322943,'./modules/socialxe/skins/bootstrap.single','N','20230113071838',20789736,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21411060,18322943,'./modules/socialxe/skins/tb','N','20230113073642',22122003,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19518188,18322923,'./modules/socialxeserver','N','20230113055312',22120897,'1.0.11');
INSERT INTO `rx_autoinstall_packages` VALUES (21411087,18322943,'./modules/socialxeserver/skins/tb','N','20230113073658',21411095,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753945,18322923,'./modules/something','N','20230113090350',22756057,'1.0.10');
INSERT INTO `rx_autoinstall_packages` VALUES (22753663,18322923,'./modules/speedlimiter','N','20230113084910',22755981,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19519235,18322923,'./modules/sphinx','N','20230113055605',19519336,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18326030,18322923,'./modules/statistics','N','20230113021122',18327023,'1.0.1b');
INSERT INTO `rx_autoinstall_packages` VALUES (22753540,18322923,'./modules/stats','N','20230113124204',22754620,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18666669,18322923,'./modules/stopsmoking','N','20230113034814',19493136,'0.2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22594548,18322923,'./modules/store_review','N','20230113081850',22755815,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22597120,18322923,'./modules/store_search','N','20230113082135',22755816,'2.5.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753865,18322923,'./modules/supercache','N','20230116194923',22756150,'1.3.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18745485,18322923,'./modules/syndication','N','20230116212749',22755525,'5.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324199,18322923,'./modules/tccommentnotify','N','20230112221623',18365815,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20324298,18322923,'./modules/textmessage','N','20230115122931',22755760,'3.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324186,18322923,'./modules/textyle','N','20230113163327',21795348,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21749702,18994170,'./modules/textyle/m.skins','N','20230108145101',21762837,'0.9');
INSERT INTO `rx_autoinstall_packages` VALUES (18386463,18322943,'./modules/textyle/skins','N','20230113024558',19100013,'2.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18915805,18322943,'./modules/textyle/skins/babyBlack','N','20230113042913',18918781,'v0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19744664,18322943,'./modules/textyle/skins/BlueMood','N','20230113062433',19757584,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18335356,18322943,'./modules/textyle/skins/corporate','N','20230113115817',18335357,'0.9');
INSERT INTO `rx_autoinstall_packages` VALUES (19740680,18322943,'./modules/textyle/skins/DESIGNER','N','20230113062343',19757652,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19740711,18322943,'./modules/textyle/skins/designspiration','N','20230113062410',19757610,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18678675,18322943,'./modules/textyle/skins/Emplode','N','20230113034947',18700716,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19525249,18322943,'./modules/textyle/skins/fotowallXE','N','20230113185926',19526784,'0.4.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19740666,18322943,'./modules/textyle/skins/PHOTOGRAPHER','N','20230113062315',19757669,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18617496,18322943,'./modules/textyle/skins/Viewfinder','N','20230113033008',18678663,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18324225,18322943,'./modules/textyle/skins/wordPressDefault','N','20230112221945',18325484,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18510031,18322943,'./modules/textyle/skins/zirho','N','20230113031618',18569108,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324187,18322923,'./modules/textylehub','N','20230112221414',21795365,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753504,18322923,'./modules/timeline','N','20230116141938',22755266,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20936395,18322923,'./modules/umessage','N','20230113072117',20943903,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22446815,18322923,'./modules/upgletyle','N','20230113080809',22692647,'0.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22648755,18322923,'./modules/upgletyle_plugin_daumview','N','20230113082441',22648765,'0.1.0.b1');
INSERT INTO `rx_autoinstall_packages` VALUES (22720710,18322943,'./modules/upgletyle/skins/emplode','N','20230113082949',22720745,'0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (20832931,18322923,'./modules/user_finder','N','20230113071958',20836347,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753651,18322923,'./modules/vote','N','20230113104949',22755019,'1.1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753905,18322923,'./modules/voteextend','N','20230113104914',22755884,'1.88');
INSERT INTO `rx_autoinstall_packages` VALUES (18324210,18322923,'./modules/wiki','N','20230116212156',21985871,'1.7.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18607436,18322923,'./modules/wizardxe','N','20230113032803',19150177,'0.0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (21305881,18322923,'./modules/xewall','N','20230113072638',22754355,'0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753396,18322923,'./modules/ximember','N','20230115110532',22754333,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753791,18322923,'./modules/yeyak','N','20230114075834',22756169,'2.2.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753675,18322923,'./modules/youtube','N','20230113084936',22755418,'1.1.1.');
INSERT INTO `rx_autoinstall_packages` VALUES (18351409,18322923,'./modules/zzz_menu_new','N','20230113023726',21832040,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19125571,18322943,'./moudles/board/skins','N','20230113050817',19128667,'v2');
INSERT INTO `rx_autoinstall_packages` VALUES (19130808,18322927,'./widgets/analytics_flash_counter','N','20230113050848',19157494,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753692,18322927,'./widgets/androidapp_login','N','20230113085013',22755388,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18324320,18322927,'./widgets/archive_list','N','20230112222539',18325093,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19027281,18322950,'./widgets/attendance_check/skins/sky_next_line','N','20230113123956',19029151,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (20185969,18322927,'./widgets/autoredirect','N','20230113064844',20185972,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18607471,18322927,'./widgets/bangbang_alltogether','N','20230113032905',18645219,'0.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18627986,18322927,'./widgets/banner_script','N','20230113033142',18634779,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19522900,18322927,'./widgets/bannermgm_widget','N','20230113055654',19525794,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18604859,18322927,'./widgets/bannerWidget','N','20230117091907',22756248,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753688,18322927,'./widgets/best_content','N','20230116142112',22755148,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19270268,18322950,'./widgets/bgw_menu/skins/naradesign','N','20230113052439',19270269,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19526505,18322927,'./widgets/bible_read','N','20230113055810',19585818,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20522820,18322950,'./widgets/bible_read/skins/KnDol','N','20230113070042',20590447,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19218468,18322927,'./widgets/birthday','N','20230113051802',19218473,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22529898,18322950,'./widgets/browserWidget/skins/simplestrap','N','20230113081245',22529948,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324321,18322927,'./widgets/calendar','N','20230116184615',20591626,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18697182,18322927,'./widgets/calendar_plannerXE123','N','20230117091918',22756195,'5.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753437,18322950,'./widgets/calendar/skins/UXF_CALENDER_TYPE_01','N','20230116201842',22754368,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22664861,18322927,'./widgets/cameronSlider','N','20230114031756',22754523,'1.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22665526,18322950,'./widgets/cameronSlider/skins/bxSlider','N','20230114031806',22754330,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22664862,18322950,'./widgets/cameronSlider/skins/cameraSlider','N','20230114031803',22754329,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22665670,18322950,'./widgets/cameronSlider/skins/FlexSlider2','N','20230116212314',22754331,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21196855,18322927,'./widgets/camtv','N','20230113072509',21228634,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324326,18322927,'./widgets/category','N','20230112222642',18325077,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22594576,18322927,'./widgets/category_menu','N','20230113082008',22596721,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19775958,18322950,'./widgets/category/skins/BlogskinDesigner','N','20230113063114',19775962,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775971,18322950,'./widgets/category/skins/default_new','N','20230113063137',19775972,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775942,18322950,'./widgets/category/skins/Designspiration','N','20230113063052',19775943,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18577507,18322927,'./widgets/chat25','N','20230113032211',18587408,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19208301,18322927,'./widgets/coinslider','N','20230113051611',20182294,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22753768,18322927,'./widgets/contactfree','N','20230113085243',22755456,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19109313,18322927,'./widgets/content_specificdoc','N','20230113050723',19109314,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19530900,18322950,'./widgets/content/skins/church_skin','N','20230113060104',19532808,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18802611,18322950,'./widgets/content/skins/daerew_webzine_notice','N','20230113042013',18810316,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19775788,18322950,'./widgets/content/skins/default_new','N','20230113062757',19775789,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775816,18322950,'./widgets/content/skins/default2','N','20230113062819',19775820,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753868,18322950,'./widgets/content/skins/Door_cpA','N','20230111002659',22755724,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753872,18322950,'./widgets/content/skins/Door_cpB','N','20230112202339',22755744,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22753317,18322950,'./widgets/content/skins/doorweb','N','20230114225612',22754080,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (22440981,18322950,'./widgets/content/skins/eond_ygh','N','20230113080757',22440999,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753327,18322950,'./widgets/content/skins/funnyxeGallery','N','20230113083230',22754107,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753919,18322950,'./widgets/content/skins/J_Finder','N','20230108150631',22755915,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753918,18322950,'./widgets/content/skins/J_Finder_scroll','N','20230108150625',22755914,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753916,18322950,'./widgets/content/skins/J_Furniture','N','20230117092209',22755993,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753926,18322950,'./widgets/content/skins/J_Maltese_Left','N','20230108150719',22755928,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753927,18322950,'./widgets/content/skins/J_Maltese_Right','N','20230108150721',22755948,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753922,18322950,'./widgets/content/skins/J_Smart','N','20230108150707',22755918,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21643081,18322950,'./widgets/content/skins/mynote','N','20230116184615',21643082,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18335369,18322950,'./widgets/content/skins/naradesign','N','20230113023341',18335372,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753645,18322950,'./widgets/content/skins/notice_slider','N','20230108145949',22754937,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18631776,18322950,'./widgets/content/skins/official_board_style','N','20230113033213',18638860,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22583905,18322950,'./widgets/content/skins/phiz_rwd_images','N','20230113081744',22583963,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19775760,18322950,'./widgets/content/skins/Photographer','N','20230113062734',19775761,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22563110,18322950,'./widgets/content/skins/s4utabview','N','20230113081548',22563143,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22282486,18322950,'./widgets/content/skins/simplestrap_sb','N','20230117092019',22756081,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21038825,18322950,'./widgets/content/skins/sketchbook5_style','N','20230116194532',22756032,'1.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20792413,18322950,'./widgets/content/skins/sticky_note','N','20230113071858',20792414,'1.0.3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21648251,18322950,'./widgets/content/skins/tb_cw','N','20230113074056',21978061,'2.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21396254,18322950,'./widgets/content/skins/tb_sb','N','20230113073610',21396255,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20493834,18322950,'./widgets/content/skins/updatenews','N','20230113065808',21134264,'1.8');
INSERT INTO `rx_autoinstall_packages` VALUES (20557173,18322950,'./widgets/content/skins/xe2011_contributor_present','N','20230113070209',20557174,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19705472,18322927,'./widgets/content/skins/XEgrid_content','N','20230113062002',19705666,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324391,18322950,'./widgets/content/skins/xeHome','N','20230112223803',18324681,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21127741,18322927,'./widgets/contentextended','N','20230113072414',21189359,'2.45');
INSERT INTO `rx_autoinstall_packages` VALUES (19260194,18322927,'./widgets/contentslider','N','20230113052403',20199435,'2.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20350195,18322927,'./widgets/contentslist','N','20230113065500',20350196,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (20612563,18322927,'./widgets/contentsmedia','N','20230115225712',20696865,'0.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18328243,18322927,'./widgets/CoolirisPlayer','N','20230113021755',18332482,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324327,18322927,'./widgets/counter_status','N','20230108144422',18325071,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753984,18322950,'./widgets/counter_status/skins/counter','N','20230117092420',22756202,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18802619,18322950,'./widgets/counter_status/skins/daerew_counter','N','20230113042042',19433478,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775908,18322950,'./widgets/counter_status/skins/default_new','N','20230113063009',19775909,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775924,18322950,'./widgets/counter_status/skins/default2','N','20230113063031',19775928,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775899,18322950,'./widgets/counter_status/skins/Designspiration','N','20230113062947',19775901,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20079764,18322950,'./widgets/counter_status/skins/flash','N','20230113064402',20079797,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18327995,18322950,'./widgets/counter_status/skins/miznkiz_simple_counter','N','20230113021725',18339071,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19235579,18322950,'./widgets/counter_status/skins/mynote','N','20230116184615',19252856,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18555205,18322950,'./widgets/counter_status/skins/sworld_counter','N','20230117091903',22756184,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18618046,18322950,'./widgets/counter_status/skins/tingenara','N','20230113033041',18620661,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (18957505,18322927,'./widgets/cu3er','N','20230113043310',18983161,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22539420,18322927,'./widgets/cute_clock','N','20230113081331',22539425,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753721,18322927,'./widgets/daum_postcode','N','20230113085109',22755318,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753629,18322927,'./widgets/Ding_Button_Collection','N','20230113084649',22754874,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753582,18322927,'./widgets/ding_loginWidget','N','20230113084517',22755210,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753600,18322927,'./widgets/ding_member_ranking','N','20230116194900',22754905,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18335021,18322927,'./widgets/division','N','20230113022759',20582119,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753535,18322927,'./widgets/doorweb_content','N','20230113084110',22754622,'1.7.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18324328,18322927,'./widgets/DroArc_clock','N','20230112222713',18325065,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753995,18322927,'./widgets/dsori_sms_form_solapi','N','20230117092457',22756247,'0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (20908354,18322950,'./widgets/dswidget','N','20230113072038',20950044,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22263678,18322927,'./widgets/eh_whcarousel','N','20230108145136',22754205,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753741,18322927,'./widgets/eond_fileboxBanner','N','20230113085144',22755364,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753896,18322927,'./widgets/etorrent_pop','N','20230108150545',22755830,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753963,18322927,'./widgets/exchangeRateXE123','N','20230115205428',22756142,'1.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19723352,18322927,'./widgets/facebook','N','20230113062252',19723353,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753620,18322927,'./widgets/fixedNotice','N','20230113084639',22754854,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18360610,18322927,'./widgets/flowing_pictures','N','20230116141820',18648791,'1.1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (21838367,18322927,'./widgets/foodin','N','20230113074623',21845017,'0.0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21838368,18322950,'./widgets/foodin/skin/simple','N','20230113074637',21845033,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324330,18322927,'./widgets/forum','N','20230112222744',18325054,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22594571,18322927,'./widgets/frontdisplay','N','20230113082001',22596682,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18327462,18322927,'./widgets/gagachat','N','20230116212744',22555267,'3.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18607444,18322927,'./widgets/gallery_frame','N','20230113032835',18619741,'0.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19527550,18322927,'./widgets/gallery_layout_widget','N','20230113055900',19532746,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753306,18322927,'./widgets/ggboardmailing_widget','N','20230108145449',22755528,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753799,18322927,'./widgets/ggnewsletter','N','20230108150201',22755533,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753798,18322927,'./widgets/ggward','N','20230108150156',22755532,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753478,18322927,'./widgets/ggwmmemberexcel_widget','N','20230108145652',22754450,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19759864,18322927,'./widgets/google_map','N','20230113062612',19759892,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19346257,18322927,'./widgets/googlesearch','N','20230113053535',19349099,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19355038,18322950,'./widgets/googlesearch/skin/multi_box','N','20230113053745',19355039,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19355521,18322950,'./widgets/googlesearch/skin/translate','N','20230113053812',19355602,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22658524,18322927,'./widgets/hb_bank','N','20230113082619',22658668,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22572346,18322927,'./widgets/hindole','N','20230114002223',22572496,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324331,18322927,'./widgets/ideationBanner','N','20230112222815',18325042,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324332,18322927,'./widgets/ideationPopular','N','20230116212735',18325026,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324335,18322927,'./widgets/image_counter','N','20230115221252',19099243,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18712640,18322927,'./widgets/JW_player','N','20230113041112',18712773,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753666,18322927,'./widgets/jwplayer','N','20230113084923',22755048,'2.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753733,18322927,'./widgets/kimtajo_subpage_widget','N','20230113085139',22755346,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20168297,18322950,'./widgets/language_select/skins/cafe_site','N','20230113064824',21802140,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19702419,18322950,'./widgets/language_select/skins/monochrome','N','20230113061940',19702444,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20075809,18322950,'./widgets/language_select/skins/tskorea','N','20230113064319',20092424,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20276676,18322950,'./widgets/language_select/skins/xe_cafe_language','N','20230113065149',20276677,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20075810,18322927,'./widgets/layout_info','N','20230113064339',20092486,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18435775,18322927,'./widgets/level_point','N','20230113031516',22595479,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18325791,18322927,'./widgets/lineadWidget','N','20230108190932',22756231,'0.9');
INSERT INTO `rx_autoinstall_packages` VALUES (18634632,18322927,'./widgets/lnb_menu','N','20230117022940',20558937,'0.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20558958,18322950,'./widgets/lnb_menu/skins','N','20230113070230',20558964,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324336,18322927,'./widgets/logged_members','N','20230113053446',18325004,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22245450,18322943,'./widgets/logged_members/skins/w_redtokbox','N','20230113075316',22277385,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18649610,18322950,'./widgets/login_info/skins/2010_jowrney_release','N','20230113034640',18654744,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20276661,18322950,'./widgets/login_info/skins/cafe_official','N','20230115112926',21801927,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20168286,18322950,'./widgets/login_info/skins/cafe_site','N','20230115112916',21802090,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19530901,18322950,'./widgets/login_info/skins/church_layout_login','N','20230113060130',19530913,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19964934,18322950,'./widgets/login_info/skins/cronos_free','N','20230116103915',20187569,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18750254,18322950,'./widgets/login_info/skins/daerew_v4_login','N','20230113041416',18751630,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18378362,18322950,'./widgets/login_info/skins/default','N','20230113024416',20168245,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19684961,18322950,'./widgets/login_info/skins/eond_gateway','N','20230113061745',19684962,'0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (19235552,18322950,'./widgets/login_info/skins/eond_mynote','N','20230116184616',21651021,'0.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22753498,18322950,'./widgets/login_info/skins/eond_ppomppu','N','20230117063101',22754494,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22651552,18322950,'./widgets/login_info/skins/flat_series','N','20230113094140',22744104,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19524346,18322950,'./widgets/login_info/skins/gallery_layout_login','N','20230113055718',19527566,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18827207,18322950,'./widgets/login_info/skins/git_login_simple','N','20230115113313',18993961,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19623082,18322950,'./widgets/login_info/skins/graystyle','N','20230117091948',22756124,'0.22');
INSERT INTO `rx_autoinstall_packages` VALUES (18409634,18322950,'./widgets/login_info/skins/hk','N','20230113031100',18547214,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22753929,18322950,'./widgets/login_info/skins/j_maltese_login','N','20230108150724',22755940,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18939397,18322950,'./widgets/login_info/skins/kan_login','N','20230115113332',18948357,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18999302,18322950,'./widgets/login_info/skins/kan_login_v2','N','20230115113251',19002080,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19702417,18322950,'./widgets/login_info/skins/monochrome','N','20230113061917',20803243,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19623053,18322950,'./widgets/login_info/skins/neutral','N','20230115113002',20803425,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20927819,18322950,'./widgets/login_info/skins/photo15','N','20230113072057',22253694,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19624853,18322950,'./widgets/login_info/skins/Quad','N','20230113061409',19624859,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18335028,18322950,'./widgets/login_info/skins/rnq_login','N','20230113022830',18337247,'v0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753567,18322950,'./widgets/login_info/skins/simplicity_login','N','20230116212943',22754649,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18330288,18322950,'./widgets/login_info/skins/sleepless_simple','N','20230113022002',18332123,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18846109,18322950,'./widgets/login_info/skins/SORRENT_LOGIN','N','20230115113338',18851330,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19044001,18322950,'./widgets/login_info/skins/tingenara','N','20230115113225',19050124,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18579525,18322950,'./widgets/login_info/skins/tingenaralogin','N','20230113032242',18587232,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (19618480,18322950,'./widgets/login_info/skins/Tony','N','20230113061039',19618481,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18328730,18322950,'./widgets/login_info/skins/treasurej_simple150px','N','20230115113257',18953730,'1.5.3');
INSERT INTO `rx_autoinstall_packages` VALUES (19807569,18322950,'./widgets/login_info/skins/webengine_black','N','20230113063304',19827659,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18335382,18322950,'./widgets/login_info/skins/webmini','N','20230113023412',18336191,'3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18572883,18322950,'./widgets/login_info/skins/xdom_login_v2','N','20230113032137',19051343,'2.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18635216,18322950,'./widgets/login_info/skins/xgenesis_login','N','20230113033417',18638870,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19462008,18322927,'./widgets/login_sunoo','N','20230116132041',19462009,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753512,18322927,'./widgets/magiccontentWidget','N','20230116212430',22754746,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753460,18322927,'./widgets/maps_widget','N','20230108145639',22755384,'1.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22634955,18322950,'./widgets/mcontent/skins/m_cronos_w','N','20230108145400',22647135,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753543,18322950,'./widgets/mcontent/skins/sweetMobileContent','N','20230116194827',22754588,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324337,18322927,'./widgets/member_group','N','20230112223018',18324998,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19515289,18322927,'./widgets/minion4','N','20230113055154',19635737,'2.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18636930,18322927,'./widgets/MinionInXE','N','20230113033448',18835506,'1.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22556480,18322927,'./widgets/moonchat','N','20230108191540',22755858,'3.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19692489,18322927,'./widgets/music24_kr_clock','N','20230113061808',19692490,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19708869,18322927,'./widgets/navigation','N','20230113062113',19712189,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (18324338,18322927,'./widgets/navigator','N','20230112223049',21801528,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324343,18322927,'./widgets/newest_comment','N','20230116000106',18324984,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18411910,18322950,'./widgets/newest_comment/skins','N','20230116201747',18413214,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19816486,18322950,'./widgets/newest_comment/skins/CN_No5','N','20230113063412',19816487,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19136412,18322950,'./widgets/newest_comment/skins/factory_basic_2','N','20230113051052',19136413,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22572358,18322950,'./widgets/newest_comment/skins/hindole_v1_com','N','20230113081624',22572455,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22505945,18322950,'./widgets/newest_comment/skins/luke_doc','N','20230113081117',22505955,'v1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21364832,18322950,'./widgets/newest_comment/skins/mynote','N','20230113072736',21364833,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21369690,18322950,'./widgets/newest_comment/skins/xenon_m_com','N','20230113072816',21370425,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324344,18322927,'./widgets/newest_document','N','20230113180029',20893807,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19133209,18322927,'./widgets/newest_document_category','N','20230113050916',19134377,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19548524,18322927,'./widgets/newest_document_tab','N','20230113060532',19548663,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19707673,18322950,'./widgets/newest_document/skins/CN_No_series','N','20230113062027',19707678,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19816467,18322950,'./widgets/newest_document/skins/CN_No5','N','20230113063351',19816468,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19135768,18322950,'./widgets/newest_document/skins/factory_basic_2','N','20230113051024',19135769,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22572375,18322950,'./widgets/newest_document/skins/hindole_v1_doc','N','20230113180029',22572430,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19081557,18322950,'./widgets/newest_document/skins/layoutskin_webzine_v2','N','20230113050533',21596748,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22501400,18322950,'./widgets/newest_document/skins/luke_doc','N','20230113081053',22502529,'v1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21369691,18322950,'./widgets/newest_document/skins/xenon_m_doc','N','20230113072833',21369734,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21369692,18322950,'./widgets/newest_document/skins/xenon_m_gel','N','20230113072850',21369738,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18328356,18322927,'./widgets/newest_medias','N','20230113021826',18330464,'v0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324345,18322927,'./widgets/newest_trackback','N','20230112223223',18324957,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753615,18322927,'./widgets/nkoclock','N','20230113084625',22754823,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18335048,18322927,'./widgets/nms_info','N','20230113023128',18349106,'0.1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (20796792,18322927,'./widgets/notice','N','20230113071918',22755365,'1.0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (22753822,18322927,'./widgets/onepage_about','N','20230116221534',22755603,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753823,18322927,'./widgets/onepage_features','N','20230116221541',22755604,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753824,18322927,'./widgets/onepage_pricing','N','20230116221531',22755605,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753825,18322927,'./widgets/onepage_service','N','20230116221539',22755606,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753826,18322927,'./widgets/onepage_team','N','20230116221528',22755607,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753827,18322927,'./widgets/onepage_testimonial','N','20230116221536',22755608,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753828,18322927,'./widgets/onepage_work','N','20230116221525',22755609,'1.00');
INSERT INTO `rx_autoinstall_packages` VALUES (22753403,18322927,'./widgets/opageWidget','N','20230113083546',22754271,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753556,18322927,'./widgets/pado_ajax_newsWidget','N','20230113084226',22754726,'1.9');
INSERT INTO `rx_autoinstall_packages` VALUES (22753560,18322927,'./widgets/pado_board_rankingWidget','N','20230113084258',22755211,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753725,18322927,'./widgets/pado_comment_rankingWidget','N','20230113085133',22755325,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753614,18322927,'./widgets/pado_image_news','N','20230113084623',22755163,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753605,18322927,'./widgets/padoLittleBanner','N','20230113084554',22754817,'0.4');
INSERT INTO `rx_autoinstall_packages` VALUES (22641961,18322927,'./widgets/photoslider','N','20230117151958',22641966,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753358,18322927,'./widgets/picasa_recent_images','N','20230113083443',22754183,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324346,18322927,'./widgets/planet_document','N','20230112223254',18327255,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19231437,18322950,'./widgets/planet_document/skins/eond','N','20230113052021',19283934,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753699,18322950,'./widgets/planet_document/skins/eond_on','N','20230108150106',22755212,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21038796,18322950,'./widgets/point_status/skins/bootstrap','N','20230113072337',21146775,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19071245,18322950,'./widgets/point_status/skins/cloverworld_skin','N','20230113050226',19071386,'1.0.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19271512,18322950,'./widgets/point_status/skins/eond_official_login','N','20230113052505',19271513,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753939,18322950,'./widgets/point_status/skins/equeer_point','N','20230117092212',22755987,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18325755,18322927,'./widgets/popular_planet_document','N','20230113020739',18325772,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19854096,18322927,'./widgets/qrcode_creator','N','20230113063625',19854097,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18634568,18322927,'./widgets/quick_menu','N','20230113033315',18638902,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18346921,18322927,'./widgets/randomchat','N','20230113023655',18517236,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18324348,18322927,'./widgets/rank_count','N','20230112223325',18324851,'1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18324352,18322927,'./widgets/rank_point','N','20230112223426',18324818,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19080637,18322950,'./widgets/rank_point/skins/elkha','N','20230113050506',19080640,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18335009,18322927,'./widgets/rnq_newest_document','N','20230113022653',18336745,'1.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18335040,18322950,'./widgets/rnq_newest_document/skins/rnq_newest_default','N','20230113022936',18798214,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18335034,18322950,'./widgets/rnq_newest_document/skins/rnq_newest_integrate','N','20230113022904',18798607,'0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18337279,18322950,'./widgets/rnq_newest_document/skins/rnq_newest_notice','N','20230113023444',18798196,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (18324353,18322927,'./widgets/rss_reader','N','20230112223457',18324791,'#7');
INSERT INTO `rx_autoinstall_packages` VALUES (19076083,18322927,'./widgets/sayradio','N','20230113050413',19077336,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19534671,18322927,'./widgets/sejin7940_calendar','N','20230113060308',19534672,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753428,18322927,'./widgets/sejin7940_navermap','N','20230115183848',22754347,'0.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21855754,18322927,'./widgets/server_status','N','20230113074708',21885905,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20091784,18322927,'./widgets/shopxeslider','N','20230113064424',20123108,'V1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22529686,18322927,'./widgets/simple_calendar','N','20230114222345',22579892,'1.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22526030,18322927,'./widgets/simple_clock','N','20230113081152',22537348,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324355,18322927,'./widgets/site_info','N','20230112223528',21801496,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19527787,18322927,'./widgets/sitemap','N','20230113055924',19527788,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753413,18322927,'./widgets/sitemap_selectbox','N','20230108145627',22754293,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753698,18322950,'./widgets/sitemap/skins/eond_hmap','N','20230108150028',22755200,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22562932,18322950,'./widgets/sitemap/skins/select','N','20230113081542',22585636,'0.3.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753889,18322927,'./widgets/sitemap7','N','20230108150521',22755786,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753342,18322927,'./widgets/slideimg','N','20230117092056',22756263,'1.1.5');
INSERT INTO `rx_autoinstall_packages` VALUES (18325952,18322927,'./widgets/sms','N','20230113021020',18326180,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18561895,18322927,'./widgets/sms_textyle','N','20230113032028',18569743,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19518201,18322927,'./widgets/socialxe_comment','N','20230114031658',20361452,'1.0.8');
INSERT INTO `rx_autoinstall_packages` VALUES (19555927,18322950,'./widgets/socialxe_comment/skins/sketchbook5','N','20230114031657',22509535,'1.7.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19518204,18322927,'./widgets/socialxe_info','N','20230113055426',19679127,'1.0.6');
INSERT INTO `rx_autoinstall_packages` VALUES (19213125,18322927,'./widgets/solarlunar','N','20230113051705',19213126,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753634,18322927,'./widgets/soo_kma_rss','N','20230116172116',22755438,'0.3.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18835470,18322927,'./widgets/splanner','N','20230113042312',18878338,'0.3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19219428,18322927,'./widgets/srchat','N','20230116201759',22754692,'219.48');
INSERT INTO `rx_autoinstall_packages` VALUES (22692901,18322927,'./widgets/srchat_count','N','20230113082819',22692906,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19476930,18322927,'./widgets/stopsmoking_status','N','20230113054555',19476931,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20999893,18322927,'./widgets/sys_status','N','20230108144943',21005314,'3.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21004386,18322950,'./widgets/sys_status/skin/simple','N','20230108144946',21004387,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21146815,18322950,'./widgets/sys_status/skins/tb','N','20230113072433',21146816,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324359,18322927,'./widgets/tab_newest_document','N','20230112223559',18324658,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19330741,18322950,'./widgets/tab_newest_document/skins/colorful','N','20230113053256',19330742,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324395,18322950,'./widgets/tab_newest_document/skins/ideationTab','N','20230112223834',18324647,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19353209,18322950,'./widgets/tab_newest_document/skins/tab_flash','N','20230113053720',19353210,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19030767,18322950,'./widgets/tab_newest_document/skins/tab_sky','N','20230113044414',19039476,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19519171,18322950,'./widgets/tab_newest_document/skins/xe_official','N','20230113055451',19519369,'xe_official');
INSERT INTO `rx_autoinstall_packages` VALUES (18324360,18322927,'./widgets/tag_list','N','20230116184615',18324768,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775829,18322950,'./widgets/tag_list/skins/default1','N','20230113062842',19775830,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775849,18322950,'./widgets/tag_list/skins/default2','N','20230113062903',19775850,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19775878,18322950,'./widgets/tag_list/skins/default3','N','20230113062925',19775879,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18327287,18322950,'./widgets/tag_list/skins/tagcloud','N','20230116184615',18328078,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18330513,18322950,'./widgets/tag_list/skins/treasurej_tagcloud','N','20230113022104',18778301,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22288778,18322927,'./widgets/talkbox','N','20230112151932',22460980,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753439,18322927,'./widgets/tocplus','N','20230113083804',22754373,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22581369,18322927,'./widgets/towc_new_docu','N','20230113081735',22638452,'1.9');
INSERT INTO `rx_autoinstall_packages` VALUES (22069845,18322927,'./widgets/traffic_status','N','20230113075045',22069874,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20120961,18322927,'./widgets/treasurej_popular','N','20230117090312',22550390,'1.0.5');
INSERT INTO `rx_autoinstall_packages` VALUES (22531811,18322950,'./widgets/treasurej_popular/skins/neat_popular_tabs','N','20230114031845',22754295,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753422,18322950,'./widgets/treasurej_popular/skins/smart_popular_tabs','N','20230117090133',22754327,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20122381,18322950,'./widgets/treasurej_popular/skins/treasurej_popular_tabr','N','20230114090610',21972737,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20186750,18322950,'./widgets/treasurej_popular/skins/treasurej_popular_tabs','N','20230114090559',21972593,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19674471,18322927,'./widgets/twitter','N','20230113061659',19676523,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19077792,18322927,'./widgets/twitter_follow','N','20230113050440',19077793,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22753870,18322927,'./widgets/uchat2','N','20230117092201',22756220,'1.0.8');
INSERT INTO `rx_autoinstall_packages` VALUES (22753616,18322927,'./widgets/uhachat','N','20230116202051',22755376,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (22753802,18322950,'./widgets/uhachat/skins/pinklet','N','20230108150211',22755553,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20832909,18322927,'./widgets/user_finder','N','20230113071938',20836373,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20464644,18322927,'./widgets/vanner','N','20230116142728',20464663,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22699529,18322927,'./widgets/webcon_carousel','N','20230116194553',22699542,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22718180,18322927,'./widgets/webcon_effectSlider','N','20230116202022',22718196,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22735793,18322927,'./widgets/webcon_mosaicContents','N','20230116202023',22735808,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22692696,18322927,'./widgets/webcon_mosaicGallery','N','20230116202012',22692724,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22703498,18322927,'./widgets/webcon_N_newsSearch','N','20230116212834',22703507,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22668729,18322927,'./widgets/webcon_newswidget','N','20230116212322',22700746,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22678118,18322927,'./widgets/webcon_smartTab','N','20230116201826',22680181,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22703903,18322927,'./widgets/webcon_verticalTab','N','20230116212330',22708158,'1.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324361,18322927,'./widgets/webzine','N','20230112223701',18324711,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19141813,18322950,'./widgets/webzine/skins','N','20230113051121',19141814,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18330488,18322927,'./widgets/webzine/skins/LILY_GoodStyle','N','20230113022033',18333192,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20070033,18322927,'./widgets/widget_kgcalendar','N','20230113064236',20117642,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20070206,18322927,'./widgets/widget_kgcontent','N','20230114222348',20315271,'1.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20605745,18322927,'./widgets/widget_kgmedia','N','20230115155007',20695833,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753603,18322927,'./widgets/widget_marketplace','N','20230116201930',22754783,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753859,18322927,'./widgets/widget_rssreader','N','20230108150418',22755695,'1.8.25');
INSERT INTO `rx_autoinstall_packages` VALUES (22753866,18322927,'./widgets/widget_update_document','N','20230108150428',22755718,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19122280,18322952,'./widgets/widgetstyles','N','20230111221739',19122812,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19310933,18322927,'./widgets/xclient','N','20230113052917',19660872,'1.2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324362,18322927,'./widgets/xeBanner','N','20230112223732',18324697,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20533710,18322950,'./widgets/xeBanner/skins','N','20230113070148',20533711,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21413017,18322927,'./widgets/xegallery','N','20230113073746',21433519,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21807603,18322927,'./widgets/xehoverdir','N','20230113074533',21807604,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753374,18322927,'./widgets/xelayout_weather','N','20230113083451',22754198,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (21003996,18322927,'./widgets/xestream','N','20230113072312',21014531,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (19514688,18322927,'./widgets/xgenesis_login','N','20230113055129',19539957,'0.1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753678,18322927,'./widgets/youtube','N','20230113084938',22755381,'1.3.0.');
INSERT INTO `rx_autoinstall_packages` VALUES (18852198,18322952,'./widgetstyle','N','20230113042438',18853308,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20427455,18322952,'./widgetstyles/admin_ws','N','20230111221346',20454155,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22753845,18322952,'./widgetstyles/clearstrap_ws','N','20230108150343',22755645,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19707730,18322952,'./widgetstyles/CN_No_series','N','20230108144819',19707731,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324396,18322952,'./widgetstyles/colorbox','N','20230112223904',18324641,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19231756,18322952,'./widgetstyles/eond_doubleline','N','20230111221731',19231762,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19231709,18322952,'./widgetstyles/eond_webzine','N','20230108144725',19231710,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (18642836,18322952,'./widgetstyles/gray_style','N','20230116103819',18826509,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753876,18322952,'./widgetstyles/greenButtonStyle','N','20230108150504',22755756,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22572365,18322952,'./widgetstyles/hindole_box','N','20230117142418',22600170,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19639463,18322952,'./widgetstyles/lineBox','N','20230112022934',19639464,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22634927,18322952,'./widgetstyles/m_cronos_ws','N','20230116120417',22647143,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324398,18322952,'./widgetstyles/memo','N','20230112224006',18324622,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18647145,18322952,'./widgetstyles/mo_colorline','N','20230113034610',18654291,'0.3');
INSERT INTO `rx_autoinstall_packages` VALUES (21305288,18322952,'./widgetstyles/nico','N','20230108145033',21532773,'2.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324401,18322952,'./widgetstyles/postitWire','N','20230112224038',18324610,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324402,18322952,'./widgetstyles/roundFace','N','20230112224110',18324603,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324403,18322952,'./widgetstyles/roundWire','N','20230112224140',18324590,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19833041,18322952,'./widgetstyles/sctb','N','20230109040755',20213631,'6.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22572369,18322952,'./widgetstyles/simple-style','N','20230108145305',22572466,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18324404,18322952,'./widgetstyles/simpleRound','N','20230112224211',18324575,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324405,18322952,'./widgetstyles/simpleSquare','N','20230112224242',18324565,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18324406,18322952,'./widgetstyles/simpleTitle','N','20230112224313',18324546,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20520233,18322952,'./widgetstyles/sketchbook5_wincomi','N','20230114031732',20798858,'3.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18995899,18322952,'./widgetstyles/sorrent_simplebox','N','20230108144645',18998803,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19849619,18322952,'./widgetstyles/SteelblueRound','N','20230108144828',19849620,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22753562,18322952,'./widgetstyles/sweetMobileWidgetStyle','N','20230108145752',22754626,'1.7');
INSERT INTO `rx_autoinstall_packages` VALUES (18354173,18322952,'./widgetstyles/sz_gradient','N','20230113023757',18354312,'0.1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18555654,18322952,'./widgetstyles/tingenara','N','20230113031926',18557124,'1');
INSERT INTO `rx_autoinstall_packages` VALUES (18334573,18322952,'./widgetstyles/webslice','N','20230113022345',18338237,'0.0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (21410063,18322952,'./widgetstyles/xdt_windless','N','20230114045252',21410071,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18536532,18322952,'./widgetstyles/xe_official','N','20230111134911',22756206,'1.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18655593,18322954,'./xe/layouts','N','20221220015300',18667484,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20117694,18322943,'.modules/board/skins','N','20230113064559',20117695,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (18354979,18322977,'/ modules / point / icons','N','20230113023859',18355002,'SuddenAttack + 확장');
INSERT INTO `rx_autoinstall_packages` VALUES (18832352,18322923,'/editer/skins','N','20230113042242',18838645,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (21367559,18322954,'/layout','N','20230113072753',21389903,'0.0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (22337993,18322954,'/layouts','N','20230113080626',22337998,'1.0.0');
INSERT INTO `rx_autoinstall_packages` VALUES (22208650,18322923,'/messageTalk','N','20230113075159',22208679,'1.1');
INSERT INTO `rx_autoinstall_packages` VALUES (20707031,18322943,'/modules/contact/skins','N','20230113071759',20707032,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (20242228,18322943,'/modules/editor/skins','N','20230113065050',20624981,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (19456847,18322977,'modules/point/icons','N','20230113054227',19456896,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20092690,18322950,'widgets/content/skins/elkha_nivo','N','20230113064448',20092697,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18739967,18322950,'widgets/content/skins/YGH_line','N','20230113041315',18741565,'0.1');
INSERT INTO `rx_autoinstall_packages` VALUES (22393789,18322950,'widgets/counter_status/skins/hestia_status','N','20230113080732',22393813,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19834157,18322954,'xe/layouts','N','20230113063603',19834158,'0.2.1');
INSERT INTO `rx_autoinstall_packages` VALUES (18775186,18322950,'xe/modules/member/skins/default','N','20230113041614',18784334,'0.2');
INSERT INTO `rx_autoinstall_packages` VALUES (20003560,18322977,'레이아웃에서 직접 업로드','N','20230113064214',20003621,'1.0');
INSERT INTO `rx_autoinstall_packages` VALUES (19529917,18322977,'해당사항없음','N','20230113060040',19533355,'0.1.0');
/*!40000 ALTER TABLE `rx_autoinstall_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_comment_declared`
--

DROP TABLE IF EXISTS `rx_comment_declared`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_comment_declared` (
  `comment_srl` bigint(20) NOT NULL,
  `declared_count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_srl`),
  KEY `idx_declared_count` (`declared_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_comment_declared`
--

LOCK TABLES `rx_comment_declared` WRITE;
/*!40000 ALTER TABLE `rx_comment_declared` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_comment_declared` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_comment_declared_log`
--

DROP TABLE IF EXISTS `rx_comment_declared_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_comment_declared_log` (
  `comment_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `declare_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  KEY `idx_comment_srl` (`comment_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_comment_declared_log`
--

LOCK TABLES `rx_comment_declared_log` WRITE;
/*!40000 ALTER TABLE `rx_comment_declared_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_comment_declared_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_comment_voted_log`
--

DROP TABLE IF EXISTS `rx_comment_voted_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_comment_voted_log` (
  `comment_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `point` bigint(20) NOT NULL,
  KEY `idx_comment_srl` (`comment_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_comment_voted_log`
--

LOCK TABLES `rx_comment_voted_log` WRITE;
/*!40000 ALTER TABLE `rx_comment_voted_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_comment_voted_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_comments`
--

DROP TABLE IF EXISTS `rx_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_comments` (
  `comment_srl` bigint(20) NOT NULL,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `parent_srl` bigint(20) NOT NULL DEFAULT 0,
  `is_secret` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `voted_count` bigint(20) NOT NULL DEFAULT 0,
  `blamed_count` bigint(20) NOT NULL DEFAULT 0,
  `notify_message` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `email_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_count` bigint(20) NOT NULL DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_update` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `list_order` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  PRIMARY KEY (`comment_srl`),
  UNIQUE KEY `idx_module_list_order` (`module_srl`,`list_order`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_parent_srl` (`parent_srl`),
  KEY `idx_voted_count` (`voted_count`),
  KEY `idx_blamed_count` (`blamed_count`),
  KEY `idx_nick_name` (`nick_name`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_uploaded_count` (`uploaded_count`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_last_update` (`last_update`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_list_order` (`list_order`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_comments`
--

LOCK TABLES `rx_comments` WRITE;
/*!40000 ALTER TABLE `rx_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_comments_list`
--

DROP TABLE IF EXISTS `rx_comments_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_comments_list` (
  `comment_srl` bigint(20) NOT NULL,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `head` bigint(20) NOT NULL DEFAULT 0,
  `arrange` bigint(20) NOT NULL DEFAULT 0,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `depth` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_srl`),
  KEY `idx_list` (`document_srl`,`head`,`arrange`),
  KEY `idx_date` (`module_srl`,`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_comments_list`
--

LOCK TABLES `rx_comments_list` WRITE;
/*!40000 ALTER TABLE `rx_comments_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_comments_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_counter_log`
--

DROP TABLE IF EXISTS `rx_counter_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_counter_log` (
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `user_agent` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `idx_site_counter_log` (`site_srl`,`ipaddress`),
  KEY `idx_counter_log` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_counter_log`
--

LOCK TABLES `rx_counter_log` WRITE;
/*!40000 ALTER TABLE `rx_counter_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_counter_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_counter_status`
--

DROP TABLE IF EXISTS `rx_counter_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_counter_status` (
  `regdate` bigint(20) NOT NULL,
  `unique_visitor` bigint(20) DEFAULT 0,
  `pageview` bigint(20) DEFAULT 0,
  PRIMARY KEY (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_counter_status`
--

LOCK TABLES `rx_counter_status` WRITE;
/*!40000 ALTER TABLE `rx_counter_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_counter_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_aliases`
--

DROP TABLE IF EXISTS `rx_document_aliases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_aliases` (
  `alias_srl` bigint(20) NOT NULL DEFAULT 0,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `alias_title` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`alias_srl`),
  UNIQUE KEY `idx_module_title` (`module_srl`,`alias_title`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_alias_title` (`alias_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_aliases`
--

LOCK TABLES `rx_document_aliases` WRITE;
/*!40000 ALTER TABLE `rx_document_aliases` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_aliases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_categories`
--

DROP TABLE IF EXISTS `rx_document_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_categories` (
  `category_srl` bigint(20) NOT NULL,
  `module_srl` bigint(20) NOT NULL,
  `parent_srl` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expand` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `document_count` bigint(20) NOT NULL DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_update` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  `group_srls` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_srl`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_categories`
--

LOCK TABLES `rx_document_categories` WRITE;
/*!40000 ALTER TABLE `rx_document_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_declared`
--

DROP TABLE IF EXISTS `rx_document_declared`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_declared` (
  `document_srl` bigint(20) NOT NULL,
  `declared_count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`document_srl`),
  KEY `idx_declared_count` (`declared_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_declared`
--

LOCK TABLES `rx_document_declared` WRITE;
/*!40000 ALTER TABLE `rx_document_declared` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_declared` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_declared_log`
--

DROP TABLE IF EXISTS `rx_document_declared_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_declared_log` (
  `document_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `declare_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_declared_log`
--

LOCK TABLES `rx_document_declared_log` WRITE;
/*!40000 ALTER TABLE `rx_document_declared_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_declared_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_extra_keys`
--

DROP TABLE IF EXISTS `rx_document_extra_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_extra_keys` (
  `module_srl` bigint(20) NOT NULL,
  `var_idx` bigint(20) NOT NULL,
  `var_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `var_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `var_is_required` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `var_search` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `var_default` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `var_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eid` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `unique_module_keys` (`module_srl`,`var_idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_extra_keys`
--

LOCK TABLES `rx_document_extra_keys` WRITE;
/*!40000 ALTER TABLE `rx_document_extra_keys` DISABLE KEYS */;
INSERT INTO `rx_document_extra_keys` VALUES (134,1,'날짜','date','N','N','','','date');
INSERT INTO `rx_document_extra_keys` VALUES (138,1,'예배 날짜','date','Y','N',NULL,'','date');
INSERT INTO `rx_document_extra_keys` VALUES (138,2,'성경 본문','text','Y','N',NULL,'','text');
/*!40000 ALTER TABLE `rx_document_extra_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_extra_vars`
--

DROP TABLE IF EXISTS `rx_document_extra_vars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_extra_vars` (
  `module_srl` bigint(20) NOT NULL,
  `document_srl` bigint(20) NOT NULL,
  `var_idx` bigint(20) NOT NULL,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eid` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `unique_extra_vars` (`module_srl`,`document_srl`,`var_idx`,`lang_code`),
  KEY `idx_document_list_order` (`document_srl`,`module_srl`,`var_idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_extra_vars`
--

LOCK TABLES `rx_document_extra_vars` WRITE;
/*!40000 ALTER TABLE `rx_document_extra_vars` DISABLE KEYS */;
INSERT INTO `rx_document_extra_vars` VALUES (134,149,1,'ko','20230119','date');
INSERT INTO `rx_document_extra_vars` VALUES (134,152,1,'ko','20230119','date');
INSERT INTO `rx_document_extra_vars` VALUES (134,170,1,'ko','20220814','date');
INSERT INTO `rx_document_extra_vars` VALUES (134,190,1,'ko','20221217','date');
INSERT INTO `rx_document_extra_vars` VALUES (134,219,1,'ko','20220924','date');
INSERT INTO `rx_document_extra_vars` VALUES (134,243,1,'ko','20221127','date');
INSERT INTO `rx_document_extra_vars` VALUES (138,271,1,'ko','20230115','date');
INSERT INTO `rx_document_extra_vars` VALUES (138,271,2,'ko','요한복음 3:22-30','text');
INSERT INTO `rx_document_extra_vars` VALUES (138,273,1,'ko','20230108','date');
INSERT INTO `rx_document_extra_vars` VALUES (138,273,2,'ko','요한복음 3:1-16','text');
INSERT INTO `rx_document_extra_vars` VALUES (138,274,1,'ko','20230101','date');
INSERT INTO `rx_document_extra_vars` VALUES (138,274,2,'ko','요한1서 1:1-4','text');
INSERT INTO `rx_document_extra_vars` VALUES (138,297,1,'ko','20230122','date');
INSERT INTO `rx_document_extra_vars` VALUES (138,297,2,'ko','요한복음 4:46-52','text');
/*!40000 ALTER TABLE `rx_document_extra_vars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_histories`
--

DROP TABLE IF EXISTS `rx_document_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_histories` (
  `history_srl` bigint(20) NOT NULL DEFAULT 0,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`history_srl`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_ipaddress` (`ipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_histories`
--

LOCK TABLES `rx_document_histories` WRITE;
/*!40000 ALTER TABLE `rx_document_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_readed_log`
--

DROP TABLE IF EXISTS `rx_document_readed_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_readed_log` (
  `document_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_readed_log`
--

LOCK TABLES `rx_document_readed_log` WRITE;
/*!40000 ALTER TABLE `rx_document_readed_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_readed_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_trash`
--

DROP TABLE IF EXISTS `rx_document_trash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_trash` (
  `trash_srl` bigint(20) NOT NULL DEFAULT 0,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `trash_date` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  PRIMARY KEY (`trash_srl`),
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_trash_date` (`trash_date`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_member_srl` (`member_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_trash`
--

LOCK TABLES `rx_document_trash` WRITE;
/*!40000 ALTER TABLE `rx_document_trash` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_trash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_update_log`
--

DROP TABLE IF EXISTS `rx_document_update_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_update_log` (
  `update_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `document_srl` bigint(20) NOT NULL,
  `update_member_srl` bigint(20) NOT NULL,
  `module_srl` bigint(20) NOT NULL,
  `category_srl` bigint(20) DEFAULT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bold` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `title_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_nick_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_update` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`update_id`),
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_is_admin` (`is_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_update_log`
--

LOCK TABLES `rx_document_update_log` WRITE;
/*!40000 ALTER TABLE `rx_document_update_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_update_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_document_voted_log`
--

DROP TABLE IF EXISTS `rx_document_voted_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_document_voted_log` (
  `document_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `point` bigint(20) NOT NULL,
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_document_voted_log`
--

LOCK TABLES `rx_document_voted_log` WRITE;
/*!40000 ALTER TABLE `rx_document_voted_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_document_voted_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_documents`
--

DROP TABLE IF EXISTS `rx_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_documents` (
  `document_srl` bigint(20) NOT NULL,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `category_srl` bigint(20) NOT NULL DEFAULT 0,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_notice` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bold` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `title_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `readed_count` bigint(20) NOT NULL DEFAULT 0,
  `voted_count` bigint(20) NOT NULL DEFAULT 0,
  `blamed_count` bigint(20) NOT NULL DEFAULT 0,
  `comment_count` bigint(20) NOT NULL DEFAULT 0,
  `trackback_count` bigint(20) NOT NULL DEFAULT 0,
  `uploaded_count` bigint(20) NOT NULL DEFAULT 0,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `email_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_update` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_updater` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `list_order` bigint(20) NOT NULL,
  `update_order` bigint(20) NOT NULL,
  `allow_trackback` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `notify_message` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'PUBLIC',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'ALLOW',
  PRIMARY KEY (`document_srl`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_category_srl` (`category_srl`),
  KEY `idx_is_notice` (`is_notice`),
  KEY `idx_readed_count` (`readed_count`),
  KEY `idx_voted_count` (`voted_count`),
  KEY `idx_blamed_count` (`blamed_count`),
  KEY `idx_comment_count` (`comment_count`),
  KEY `idx_trackback_count` (`trackback_count`),
  KEY `idx_uploaded_count` (`uploaded_count`),
  KEY `idx_nick_name` (`nick_name`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_last_update` (`last_update`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_list_order` (`list_order`),
  KEY `idx_update_order` (`update_order`),
  KEY `idx_module_list_order` (`module_srl`,`list_order`),
  KEY `idx_module_update_order` (`module_srl`,`update_order`),
  KEY `idx_module_readed_count` (`module_srl`,`readed_count`),
  KEY `idx_module_voted_count` (`module_srl`,`voted_count`),
  KEY `idx_module_regdate` (`module_srl`,`regdate`),
  KEY `idx_module_notice` (`module_srl`,`is_notice`),
  KEY `idx_module_document_srl` (`module_srl`,`document_srl`),
  KEY `idx_module_blamed_count` (`module_srl`,`blamed_count`),
  KEY `idx_module_status` (`module_srl`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_documents`
--

LOCK TABLES `rx_documents` WRITE;
/*!40000 ALTER TABLE `rx_documents` DISABLE KEYS */;
INSERT INTO `rx_documents` VALUES (149,134,0,'ko','N','푸른나무교회 예배실','N','N','<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20220410_160423458.jpg\" data-file-srl=\"150\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/4c1a0123eddc4626390297d06097d7ee.jpg\" /></p>\r\n\r\n<hr />\r\n<p>주일에는 푸른나무교회 공동체가 예배하는 장소로, 청년들이 모여 성경공부 모임을 진행하는 곳입니다.</p>',5,0,0,0,0,1,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','','','O:8:\"stdClass\":0:{}','20230117170310','20230119103037',NULL,'118.42.24.197',-151,-292,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (152,134,0,'ko','N','푸른나무교회 친교실','N','N','<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20220410_160425315.jpg\" data-file-srl=\"153\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/0fee47e2abd98ae070f5f90174e8eb55.jpg\" /></p>\r\n\r\n<hr />\r\n<p>푸른나무 성도분들이 언제든지 편안하게 담소를 나누고, 마음껏 음식을 나누는 정겨운 공간입니다.</p>',8,0,0,0,0,1,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','','','O:8:\"stdClass\":0:{}','20230117170335','20230119103022',NULL,'118.42.24.197',-154,-291,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (157,136,0,'ko','N','푸른나무교회 홈페이지가 세워지고 있습니다.','N','N','<p>푸른나무교회 홈페이지가 세워지고 있습니다.</p>\r\n\r\n<p>조금만 기다려주시면, 누구든지 행복하게 소통할 수 있는 예쁜 공간으로 오픈하겠습니다.</p>',2,0,0,0,0,0,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','',NULL,'O:8:\"stdClass\":0:{}','20230117170636','20230117170636',NULL,'118.42.24.197',-157,-157,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (158,136,0,'ko','N','행복한 명절, 풍성한 명절 보내세요.','N','N','<p>푸른나무교회 공동체에 속해 있는 분들..</p>\r\n\r\n<p>모두모두 행복하고 풍성한 명절 보내세요. ^^</p>',2,0,0,0,0,0,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','',NULL,'O:8:\"stdClass\":0:{}','20230117170741','20230117170741',NULL,'118.42.24.197',-158,-158,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (170,134,0,'ko','N','22년 침례식','N','N','<p style=\"text-align:center;\"><img alt=\"IMG_6968.JPG\" data-file-srl=\"176\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/f583c5f54a4397926d6e28aac1221a5d.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6971.JPG\" data-file-srl=\"177\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/fa019729c0f85be1cbf7ee936bbd66fe.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6972.JPG\" data-file-srl=\"178\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/0a2c9649995be26f866319e0281827c1.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6976.JPG\" data-file-srl=\"179\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/6323fba4e4606a4055c1e7ecf2724d7f.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6985.JPG\" data-file-srl=\"180\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/37c6b24d74945d3014263d8361523c6c.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6987.JPG\" data-file-srl=\"181\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/3893634f5911923d1bff015f3113f875.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6988.JPG\" data-file-srl=\"182\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/b7d3928c67a7e4e174741c3d831fae28.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6989.JPG\" data-file-srl=\"183\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/0d406a2084a885835ffdac126d3589ac.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6994.JPG\" data-file-srl=\"184\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/d7f4f89db6d348890f8fb919dbc1b918.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_6996.JPG\" data-file-srl=\"185\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/96a44004fe348cae9e0d116c1436a2d7.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_7000.JPG\" data-file-srl=\"186\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/452b0b2990bce3563ed120b5572677c0.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"IMG_7003.JPG\" data-file-srl=\"187\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/eae4fa00c667439aedc5c6b141d810d0.jpg\" /></p>',5,0,0,0,0,12,NULL,'jasper5','심민보','담임목사',169,'minbo91@naver.com','','','O:8:\"stdClass\":0:{}','20230117201850','20230118214414',NULL,'118.43.182.117',-188,-289,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (174,136,0,'ko','N','토요일10시에  설명절 음식준비합니다~~','N','N','<p>이번 주 토요일(1.21) 10시에 함께 모여 </p>\n\n<p>설명절 음식준비 하겠습니다~~</p>\n\n<p>앞치마 들고 오세요&#x1f60a;</p>',3,0,0,0,0,0,NULL,'soonie','이순석','soonie',172,'cusoon55@naver.com','',NULL,'O:8:\"stdClass\":0:{}','20230117200943','20230117200943',NULL,'118.43.182.117',-174,-174,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (190,134,0,'ko','N','22년 성탄 파티','N','N','<p><img alt=\"IMG_7204.JPG\" data-file-srl=\"191\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/d414694ef46f1d3934489fc1931291f1.jpg\" /></p>\n\n<p><img alt=\"IMG_7250.JPG\" data-file-srl=\"192\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/5b93290c5a5aa53a2febdef41ef8a90f.jpg\" /></p>\n\n<p><img alt=\"IMG_7268.JPG\" data-file-srl=\"193\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/44fd147fe0bb8178c354f41146f36972.jpg\" /></p>\n\n<p><img alt=\"IMG_7286.JPG\" data-file-srl=\"194\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/ed9a7b323e41c11ded67832a5855c660.jpg\" /></p>\n\n<p><img alt=\"IMG_7294.JPG\" data-file-srl=\"195\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/951aef0a4e64eff3ad270cab9fa1d435.jpg\" /></p>\n\n<p><img alt=\"IMG_7305.JPG\" data-file-srl=\"196\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/217192142b2bb0d31c04ffec956c2069.jpg\" /></p>\n\n<p><img alt=\"IMG_7317.JPG\" data-file-srl=\"197\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/3fcd00b77d0760593286f0b45f35e984.jpg\" /></p>\n\n<p><img alt=\"IMG_7325.JPG\" data-file-srl=\"198\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/578f50232ff755acc43ca804652168d2.jpg\" /></p>\n\n<p><img alt=\"IMG_7353.JPG\" data-file-srl=\"199\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/d59f29b83b5c1b797d9296bf221956c9.jpg\" /></p>\n\n<p><img alt=\"IMG_7356.JPG\" data-file-srl=\"200\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/12160ebd12da227e1f6e6e07fc1ee860.jpg\" /></p>\n\n<p><img alt=\"IMG_7357.JPG\" data-file-srl=\"201\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/dc5ac9c1141e0491dabdade4dd0306a6.jpg\" /></p>\n\n<p><img alt=\"IMG_7383.JPG\" data-file-srl=\"202\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/b135c59e2345e2d2a20d25393282fb82.jpg\" /></p>\n\n<p><img alt=\"IMG_7384.JPG\" data-file-srl=\"203\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/a277ca9965b4288b75b7023cad66054c.jpg\" /></p>\n\n<p><img alt=\"IMG_7456.JPG\" data-file-srl=\"204\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/729c9c6a7bdb69f330c6b3cda9798dd9.jpg\" /></p>\n\n<p><img alt=\"IMG_7471.JPG\" data-file-srl=\"205\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/ef290ba2e3a0be9eae3018824bd48e47.jpg\" /></p>\n\n<p><img alt=\"IMG_7472.JPG\" data-file-srl=\"206\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/4df6406fc089a6526ef1a509b6a68906.jpg\" /></p>\n\n<p><img alt=\"IMG_7474.JPG\" data-file-srl=\"207\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/1fa6784731bac006e633c590814e37a4.jpg\" /></p>\n\n<p><img alt=\"IMG_7482.JPG\" data-file-srl=\"208\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/91992c3dc3c02bbd23088b2ed8f72dca.jpg\" /></p>\n\n<p><img alt=\"IMG_7485.JPG\" data-file-srl=\"209\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/b7b61a593f4fb4628534a09e91178e48.jpg\" /></p>\n\n<p><img alt=\"IMG_7492.JPG\" data-file-srl=\"210\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/410efb7f7d3ae6dab978e5a0fb1254ec.jpg\" /></p>\n\n<p><img alt=\"IMG_7497.JPG\" data-file-srl=\"211\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/d48917683353c23a397f38004f25a746.jpg\" /></p>\n\n<p><img alt=\"IMG_7508.JPG\" data-file-srl=\"212\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/34e11fd85f10830101405cc4673f003d.jpg\" /></p>\n\n<p><img alt=\"IMG_7511.JPG\" data-file-srl=\"213\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/f3bf08889efc646712c14397d8c90f99.jpg\" /></p>\n\n<p><img alt=\"IMG_7514.JPG\" data-file-srl=\"214\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/eccd55e32a88c923acb67494d962f20e.jpg\" /></p>\n\n<p><img alt=\"IMG_7517.JPG\" data-file-srl=\"215\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/626a5b714473fa36c780a6b74283ab2f.jpg\" /></p>\n\n<p><img alt=\"IMG_7522.JPG\" data-file-srl=\"216\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/abdd80cef5b45c257616482f1bd87a59.jpg\" /></p>\n\n<p> </p>',8,0,0,0,0,26,NULL,'jasper5','심민보','담임목사',169,'minbo91@naver.com','','','O:8:\"stdClass\":0:{}','20230117202051','20230118214346',NULL,'118.43.182.117',-217,-287,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (219,134,0,'ko','N','22년 선교 바자회','N','N','<p style=\"text-align: center;\"><img alt=\"IMG_7171.JPG\" data-file-srl=\"220\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/3e041b0fa69c2246531b5b2a7e41fb7d.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7172.JPG\" data-file-srl=\"221\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/10bd3d29ea01f6673fda2db8890e297b.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7173.JPG\" data-file-srl=\"222\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/07daee5bb4d732e43a3adad11985d388.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7174.JPG\" data-file-srl=\"223\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/edff36452ea845498045be36438931d4.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7175.JPG\" data-file-srl=\"224\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/15d19d36a2b016ad221bdcc35b348fcb.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7176.JPG\" data-file-srl=\"225\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/fc7b666c91af1b5593f42726fc5d926b.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7177.JPG\" data-file-srl=\"226\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/73dc34bbe9d3f2af65e1cf6265cd49f0.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7178.JPG\" data-file-srl=\"227\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/52944ae3c311547110ebb4e07f8d0e33.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7181.JPG\" data-file-srl=\"228\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/2f43440c38a785e5c95894a154431679.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7182.JPG\" data-file-srl=\"229\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/5811da4bbdaadf73588522a3023110c6.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7183.JPG\" data-file-srl=\"230\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/7f772d593f5b56744a3ad7d2f944be71.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7184.JPG\" data-file-srl=\"231\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/50eab9768d6c70976dff8abb74416954.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7186.JPG\" data-file-srl=\"232\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/81f1a6f63beab206153b11d8c9c59bc5.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"IMG_7188.JPG\" data-file-srl=\"233\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/7a54819de24c4922fe7e61380071c9ba.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_02.jpg\" data-file-srl=\"234\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/282d88dc7863f3ba17f2c027eb4a10f0.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_03.jpg\" data-file-srl=\"235\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/f33f1cc976af64d15e60e7a49e13af27.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_04.jpg\" data-file-srl=\"236\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/8437fbef879cf6eb6df2727903a59e5d.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_05.jpg\" data-file-srl=\"237\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/fff865309083a5fd40100a6b87dffc9a.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_06.jpg\" data-file-srl=\"238\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/c92910ec33d5b3968a04435c589ede0b.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_07.jpg\" data-file-srl=\"239\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/cd6b8f674e86eaf9882fc9443e53d515.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"KakaoTalk_20230117_202627734_08.jpg\" data-file-srl=\"240\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/7fdef6f7a14f63502e46443d826a7e5b.jpg\" /></p>',9,0,0,0,0,21,NULL,'jasper5','심민보','담임목사',169,'minbo91@naver.com','','','O:8:\"stdClass\":0:{}','20230117202924','20230119102913',NULL,'118.43.182.117',-241,-290,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (243,134,0,'ko','N','22년 김장','N','N','<hr /><p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221119_221929782.jpg\" data-file-srl=\"244\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/bde29fd27527b7c4f23eff8e639c0557.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_175137162.jpg\" data-file-srl=\"245\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/eec7e6d6fee370941681d86e52a48ec8.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_175137162_01.jpg\" data-file-srl=\"246\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/b7e19b5b6e83e1d0f3772b84c8da5890.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_175137162_02.jpg\" data-file-srl=\"247\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/74d5287f18f354a214eb023ec0e95207.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_175137162_03.jpg\" data-file-srl=\"248\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/2451527eae7b74ef0276818d5bbb67a3.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_181151035.jpg\" data-file-srl=\"249\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/729704f40338f741fa044415f0f14a19.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_181151035_01.jpg\" data-file-srl=\"250\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/3753a8e6907103a5dae778747eba4820.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_181151035_02.jpg\" data-file-srl=\"251\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/2b3bee6ed02ef3ffdd62f5dc031011c8.jpg\" /></p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"> </p>\n\n<p style=\"text-align:center;\"><img alt=\"KakaoTalk_20221127_181151035_03.jpg\" data-file-srl=\"252\" editor_component=\"image_link\" src=\"/files/attach/images/2023/01/17/d2da29c18714296a830f887246cb385a.jpg\" /></p>',8,0,0,0,0,9,NULL,'jasper5','심민보','담임목사',169,'minbo91@naver.com','','','O:8:\"stdClass\":0:{}','20230117203055','20230118214202',NULL,'118.43.182.117',-253,-283,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (271,138,0,'ko','N','그는 흥하고, 나는 쇠하고..','N','N','<style type=\"text/css\">.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }\r\n</style>\r\n<div class=\"embed-container\"><iframe allowfullscreen=\"\" frameborder=\"0\" src=\"https://www.youtube.com/embed//pjLEdYtIBSs\"></iframe></div>',5,0,0,0,0,0,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','','','O:8:\"stdClass\":0:{}','20230118141044','20230118141226',NULL,'118.42.24.197',-271,-272,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (273,138,0,'ko','N','거듭나지 아니하면','N','N','<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class=\'embed-container\'><iframe src=\'https://www.youtube.com/embed//OudiwP5eNQM\' frameborder=\'0\' allowfullscreen></iframe></div>',2,0,0,0,0,0,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','',NULL,'O:8:\"stdClass\":0:{}','20230118141430','20230118141430',NULL,'118.42.24.197',-273,-273,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (274,138,0,'ko','N','우리의 사귐','N','N','<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class=\'embed-container\'><iframe src=\'https://www.youtube.com/embed//2ybAt1LBNsc\' frameborder=\'0\' allowfullscreen></iframe></div>',5,0,0,0,0,0,NULL,'admin','admin','최고관리자',4,'nuriohga@gmail.com','',NULL,'O:8:\"stdClass\":0:{}','20230118142622','20230118142622',NULL,'118.42.24.197',-274,-274,'N','N','PUBLIC','ALLOW');
INSERT INTO `rx_documents` VALUES (297,138,0,'ko','N','https://www.youtube.c...','N','N','<p><a href=\"https://www.youtube.com/live/lPuIp8oQ-yQ?feature=share\">https://www.youtube.com/live/lPuIp8oQ-yQ?feature=share</a></p>',0,0,0,0,0,0,NULL,'wodud7209','김재영','green',294,'wodud7209@naver.com','',NULL,'O:8:\"stdClass\":0:{}','20230402134052','20230402134052',NULL,'211.33.241.28',-297,-297,'N','N','TEMP','ALLOW');
/*!40000 ALTER TABLE `rx_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_domains`
--

DROP TABLE IF EXISTS `rx_domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_domains` (
  `domain_srl` bigint(20) NOT NULL,
  `domain` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default_domain` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `index_module_srl` bigint(20) NOT NULL,
  `index_document_srl` bigint(20) NOT NULL,
  `default_layout_srl` bigint(20) NOT NULL DEFAULT 0,
  `default_mlayout_srl` bigint(20) NOT NULL DEFAULT 0,
  `default_menu_srl` bigint(20) NOT NULL DEFAULT 0,
  `http_port` bigint(20) DEFAULT NULL,
  `https_port` bigint(20) DEFAULT NULL,
  `security` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`domain_srl`),
  KEY `idx_domain` (`domain`),
  KEY `idx_is_default_domain` (`is_default_domain`),
  KEY `idx_index_module_srl` (`index_module_srl`),
  KEY `idx_index_document_srl` (`index_document_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_domains`
--

LOCK TABLES `rx_domains` WRITE;
/*!40000 ALTER TABLE `rx_domains` DISABLE KEYS */;
INSERT INTO `rx_domains` VALUES (111,'greentreech.kr','Y',124,0,0,0,0,0,0,'always','','{\"title\":\"\\ud478\\ub978\\ub098\\ubb34\\uad50\\ud68c\",\"subtitle\":\"\\uae30\\ub3c5\\uad50\\ud55c\\uad6d\\uce68\\ub840\\ud68c\",\"language\":\"default\",\"timezone\":\"Asia\\/Seoul\",\"meta_keywords\":\"\",\"meta_description\":\"\",\"html_header\":\"\",\"html_footer\":\"\",\"color_scheme\":\"auto\"}','20230117134657');
/*!40000 ALTER TABLE `rx_domains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_editor_autosave`
--

DROP TABLE IF EXISTS `rx_editor_autosave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_editor_autosave` (
  `member_srl` bigint(20) DEFAULT 0,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `module_srl` bigint(20) DEFAULT NULL,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `certify_key` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_certify_key` (`certify_key`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_editor_autosave`
--

LOCK TABLES `rx_editor_autosave` WRITE;
/*!40000 ALTER TABLE `rx_editor_autosave` DISABLE KEYS */;
INSERT INTO `rx_editor_autosave` VALUES (169,NULL,136,0,'부활절및 창립 9주년 감사예배','',NULL,'20230321174201');
INSERT INTO `rx_editor_autosave` VALUES (169,NULL,134,0,'부활절및 창립9주년 예배에 초대합니다.','',NULL,'20230321174434');
INSERT INTO `rx_editor_autosave` VALUES (0,'211.33.241.28',138,0,NULL,'<p><a href=\"https://www.youtube.com/live/lPuIp8oQ-yQ?feature=share\">https://www.youtube.com/live/lPuIp8oQ-yQ?feature=share</a></p>','cZW9nHN1JpPmZgTt3NhHekt8BYkJO0aW','20230402133234');
/*!40000 ALTER TABLE `rx_editor_autosave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_editor_components`
--

DROP TABLE IF EXISTS `rx_editor_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_editor_components` (
  `component_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  PRIMARY KEY (`component_name`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_editor_components`
--

LOCK TABLES `rx_editor_components` WRITE;
/*!40000 ALTER TABLE `rx_editor_components` DISABLE KEYS */;
INSERT INTO `rx_editor_components` VALUES ('emoticon','N',NULL,42);
INSERT INTO `rx_editor_components` VALUES ('image_gallery','N',NULL,44);
INSERT INTO `rx_editor_components` VALUES ('image_link','N',NULL,43);
INSERT INTO `rx_editor_components` VALUES ('poll_maker','Y',NULL,45);
/*!40000 ALTER TABLE `rx_editor_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_editor_components_site`
--

DROP TABLE IF EXISTS `rx_editor_components_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_editor_components_site` (
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `component_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  UNIQUE KEY `unique_component_site` (`site_srl`,`component_name`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_editor_components_site`
--

LOCK TABLES `rx_editor_components_site` WRITE;
/*!40000 ALTER TABLE `rx_editor_components_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_editor_components_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_files`
--

DROP TABLE IF EXISTS `rx_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_files` (
  `file_srl` bigint(20) NOT NULL,
  `upload_target_srl` bigint(20) NOT NULL DEFAULT 0,
  `upload_target_type` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sid` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `member_srl` bigint(20) NOT NULL,
  `download_count` bigint(20) NOT NULL DEFAULT 0,
  `direct_download` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `source_filename` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_filename` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_filename` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` bigint(20) NOT NULL DEFAULT 0,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` bigint(20) DEFAULT NULL,
  `height` bigint(20) DEFAULT NULL,
  `duration` bigint(20) DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isvalid` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `cover_image` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`file_srl`),
  KEY `idx_upload_target_srl` (`upload_target_srl`),
  KEY `idx_upload_target_type` (`upload_target_type`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_download_count` (`download_count`),
  KEY `idx_file_size` (`file_size`),
  KEY `idx_mime_type` (`mime_type`),
  KEY `idx_is_valid` (`isvalid`),
  KEY `idx_list_order` (`cover_image`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_ipaddress` (`ipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_files`
--

LOCK TABLES `rx_files` WRITE;
/*!40000 ALTER TABLE `rx_files` DISABLE KEYS */;
INSERT INTO `rx_files` VALUES (150,149,'doc','d65150e1df70950b680cf9e240c25985',134,4,0,'Y','KakaoTalk_20220410_160423458.jpg','./files/attach/images/2023/01/17/4c1a0123eddc4626390297d06097d7ee.jpg',NULL,435352,'image/jpeg',NULL,1280,720,NULL,NULL,'Y','N','20230117170253','118.42.24.197');
INSERT INTO `rx_files` VALUES (153,152,'doc','a1a8c50db427c1450013f75fac2b15a0',134,4,0,'Y','KakaoTalk_20220410_160425315.jpg','./files/attach/images/2023/01/17/0fee47e2abd98ae070f5f90174e8eb55.jpg',NULL,386155,'image/jpeg',NULL,1280,720,NULL,NULL,'Y','N','20230117170322','118.42.24.197');
INSERT INTO `rx_files` VALUES (176,170,'doc','345de34b09178f37763670248ca40028',134,169,0,'Y','IMG_6968.JPG','./files/attach/images/2023/01/17/f583c5f54a4397926d6e28aac1221a5d.jpg',NULL,143838,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201811','118.43.182.117');
INSERT INTO `rx_files` VALUES (177,170,'doc','ac2d1c557aac3559c65894969020bd54',134,169,0,'Y','IMG_6971.JPG','./files/attach/images/2023/01/17/fa019729c0f85be1cbf7ee936bbd66fe.jpg',NULL,143661,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201813','118.43.182.117');
INSERT INTO `rx_files` VALUES (178,170,'doc','44d7da35de2d2743254f2bddd548e356',134,169,0,'Y','IMG_6972.JPG','./files/attach/images/2023/01/17/0a2c9649995be26f866319e0281827c1.jpg',NULL,149176,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201814','118.43.182.117');
INSERT INTO `rx_files` VALUES (179,170,'doc','266002d6471cfdc6bde9056b1e278184',134,169,0,'Y','IMG_6976.JPG','./files/attach/images/2023/01/17/6323fba4e4606a4055c1e7ecf2724d7f.jpg',NULL,146493,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201816','118.43.182.117');
INSERT INTO `rx_files` VALUES (180,170,'doc','89275f4db0ed904e96956d1e87a701ab',134,169,0,'Y','IMG_6985.JPG','./files/attach/images/2023/01/17/37c6b24d74945d3014263d8361523c6c.jpg',NULL,147879,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201817','118.43.182.117');
INSERT INTO `rx_files` VALUES (181,170,'doc','0b8172bfac6829108b07f4b52c6fd446',134,169,0,'Y','IMG_6987.JPG','./files/attach/images/2023/01/17/3893634f5911923d1bff015f3113f875.jpg',NULL,162468,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201819','118.43.182.117');
INSERT INTO `rx_files` VALUES (182,170,'doc','b5bce4a594663ac550b0314a5f100b7e',134,169,0,'Y','IMG_6988.JPG','./files/attach/images/2023/01/17/b7d3928c67a7e4e174741c3d831fae28.jpg',NULL,103138,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201821','118.43.182.117');
INSERT INTO `rx_files` VALUES (183,170,'doc','e059eb798ed0cc1ec280c1a11c833ed4',134,169,0,'Y','IMG_6989.JPG','./files/attach/images/2023/01/17/0d406a2084a885835ffdac126d3589ac.jpg',NULL,122614,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201822','118.43.182.117');
INSERT INTO `rx_files` VALUES (184,170,'doc','0fb31f83f4c7230caf6b2677bc0fd3f6',134,169,0,'Y','IMG_6994.JPG','./files/attach/images/2023/01/17/d7f4f89db6d348890f8fb919dbc1b918.jpg',NULL,92715,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201824','118.43.182.117');
INSERT INTO `rx_files` VALUES (185,170,'doc','b53bc8574feb058a7c4ecaa600fad58b',134,169,0,'Y','IMG_6996.JPG','./files/attach/images/2023/01/17/96a44004fe348cae9e0d116c1436a2d7.jpg',NULL,173447,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201825','118.43.182.117');
INSERT INTO `rx_files` VALUES (186,170,'doc','7aa73bd137e9a5c627f0f94cbf342d20',134,169,0,'Y','IMG_7000.JPG','./files/attach/images/2023/01/17/452b0b2990bce3563ed120b5572677c0.jpg',NULL,148818,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201827','118.43.182.117');
INSERT INTO `rx_files` VALUES (187,170,'doc','9b9def23d91bb4052c77653605837015',134,169,0,'Y','IMG_7003.JPG','./files/attach/images/2023/01/17/eae4fa00c667439aedc5c6b141d810d0.jpg',NULL,163410,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117201828','118.43.182.117');
INSERT INTO `rx_files` VALUES (191,190,'doc','957e836af44e94d00723cbcb3c35419e',134,169,0,'Y','IMG_7204.JPG','./files/attach/images/2023/01/17/d414694ef46f1d3934489fc1931291f1.jpg',NULL,156163,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202000','118.43.182.117');
INSERT INTO `rx_files` VALUES (192,190,'doc','b241e77d87df32679f6004a49beef889',134,169,0,'Y','IMG_7250.JPG','./files/attach/images/2023/01/17/5b93290c5a5aa53a2febdef41ef8a90f.jpg',NULL,207879,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202002','118.43.182.117');
INSERT INTO `rx_files` VALUES (193,190,'doc','2f5935e8bdd895d23da2c7063313e64c',134,169,0,'Y','IMG_7268.JPG','./files/attach/images/2023/01/17/44fd147fe0bb8178c354f41146f36972.jpg',NULL,123626,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202004','118.43.182.117');
INSERT INTO `rx_files` VALUES (194,190,'doc','70c4bd1b52f010daec7c270885bb9f08',134,169,0,'Y','IMG_7286.JPG','./files/attach/images/2023/01/17/ed9a7b323e41c11ded67832a5855c660.jpg',NULL,162246,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202009','118.43.182.117');
INSERT INTO `rx_files` VALUES (195,190,'doc','93a6e4cc09a6ea1ddaa08301790ae52a',134,169,0,'Y','IMG_7294.JPG','./files/attach/images/2023/01/17/951aef0a4e64eff3ad270cab9fa1d435.jpg',NULL,178658,'image/jpeg',NULL,666,1000,NULL,NULL,'Y','N','20230117202011','118.43.182.117');
INSERT INTO `rx_files` VALUES (196,190,'doc','44083e405c7b7742b0a098f1c179baa2',134,169,0,'Y','IMG_7305.JPG','./files/attach/images/2023/01/17/217192142b2bb0d31c04ffec956c2069.jpg',NULL,138896,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202013','118.43.182.117');
INSERT INTO `rx_files` VALUES (197,190,'doc','3736ec4f7eebe983fdc2c776b6c62c85',134,169,0,'Y','IMG_7317.JPG','./files/attach/images/2023/01/17/3fcd00b77d0760593286f0b45f35e984.jpg',NULL,116701,'image/jpeg',NULL,666,1000,NULL,NULL,'Y','N','20230117202015','118.43.182.117');
INSERT INTO `rx_files` VALUES (198,190,'doc','47c5b6bde749590519fab5cd8f2f1dc8',134,169,0,'Y','IMG_7325.JPG','./files/attach/images/2023/01/17/578f50232ff755acc43ca804652168d2.jpg',NULL,107306,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202016','118.43.182.117');
INSERT INTO `rx_files` VALUES (199,190,'doc','3a9f9f99e85875c12b114c5098131843',134,169,0,'Y','IMG_7353.JPG','./files/attach/images/2023/01/17/d59f29b83b5c1b797d9296bf221956c9.jpg',NULL,147465,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202018','118.43.182.117');
INSERT INTO `rx_files` VALUES (200,190,'doc','dcf1d24a03da32797da3ee5fbb053b8d',134,169,0,'Y','IMG_7356.JPG','./files/attach/images/2023/01/17/12160ebd12da227e1f6e6e07fc1ee860.jpg',NULL,131999,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202019','118.43.182.117');
INSERT INTO `rx_files` VALUES (201,190,'doc','4aba12034514f096590de5bb39dc8412',134,169,0,'Y','IMG_7357.JPG','./files/attach/images/2023/01/17/dc5ac9c1141e0491dabdade4dd0306a6.jpg',NULL,162852,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202021','118.43.182.117');
INSERT INTO `rx_files` VALUES (202,190,'doc','2f8058edd3a732e7919b54be2d277272',134,169,0,'Y','IMG_7383.JPG','./files/attach/images/2023/01/17/b135c59e2345e2d2a20d25393282fb82.jpg',NULL,129385,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202022','118.43.182.117');
INSERT INTO `rx_files` VALUES (203,190,'doc','79f795ae1b38d22d7af5568b0a436803',134,169,0,'Y','IMG_7384.JPG','./files/attach/images/2023/01/17/a277ca9965b4288b75b7023cad66054c.jpg',NULL,148720,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202024','118.43.182.117');
INSERT INTO `rx_files` VALUES (204,190,'doc','02cc37b9f24d9b2ef2c1b3f38db6fe30',134,169,0,'Y','IMG_7456.JPG','./files/attach/images/2023/01/17/729c9c6a7bdb69f330c6b3cda9798dd9.jpg',NULL,166003,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202026','118.43.182.117');
INSERT INTO `rx_files` VALUES (205,190,'doc','2373ce73930083e0fed329863b38db5d',134,169,0,'Y','IMG_7471.JPG','./files/attach/images/2023/01/17/ef290ba2e3a0be9eae3018824bd48e47.jpg',NULL,163301,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202027','118.43.182.117');
INSERT INTO `rx_files` VALUES (206,190,'doc','79fef47247a988f041df566882e1e6d0',134,169,0,'Y','IMG_7472.JPG','./files/attach/images/2023/01/17/4df6406fc089a6526ef1a509b6a68906.jpg',NULL,160853,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202029','118.43.182.117');
INSERT INTO `rx_files` VALUES (207,190,'doc','4b71d4c1b152666b6a438823d2543886',134,169,0,'Y','IMG_7474.JPG','./files/attach/images/2023/01/17/1fa6784731bac006e633c590814e37a4.jpg',NULL,163424,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202030','118.43.182.117');
INSERT INTO `rx_files` VALUES (208,190,'doc','d531d721918c8b897e2c297b1d958371',134,169,0,'Y','IMG_7482.JPG','./files/attach/images/2023/01/17/91992c3dc3c02bbd23088b2ed8f72dca.jpg',NULL,110123,'image/jpeg',NULL,666,1000,NULL,NULL,'Y','N','20230117202032','118.43.182.117');
INSERT INTO `rx_files` VALUES (209,190,'doc','1227b5757da5af1e3d835402ac80658a',134,169,0,'Y','IMG_7485.JPG','./files/attach/images/2023/01/17/b7b61a593f4fb4628534a09e91178e48.jpg',NULL,130903,'image/jpeg',NULL,666,1000,NULL,NULL,'Y','N','20230117202035','118.43.182.117');
INSERT INTO `rx_files` VALUES (210,190,'doc','a8c03352f3a154e1d3cff143064abe9c',134,169,0,'Y','IMG_7492.JPG','./files/attach/images/2023/01/17/410efb7f7d3ae6dab978e5a0fb1254ec.jpg',NULL,170095,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202036','118.43.182.117');
INSERT INTO `rx_files` VALUES (211,190,'doc','4dc58cf41496ad6192012e1dee45b359',134,169,0,'Y','IMG_7497.JPG','./files/attach/images/2023/01/17/d48917683353c23a397f38004f25a746.jpg',NULL,190833,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202038','118.43.182.117');
INSERT INTO `rx_files` VALUES (212,190,'doc','33cd280a62a5d9bf50bb75183c8b7d15',134,169,0,'Y','IMG_7508.JPG','./files/attach/images/2023/01/17/34e11fd85f10830101405cc4673f003d.jpg',NULL,220336,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202039','118.43.182.117');
INSERT INTO `rx_files` VALUES (213,190,'doc','f4a2ac0cb01ea25b8b166940cebece1a',134,169,0,'Y','IMG_7511.JPG','./files/attach/images/2023/01/17/f3bf08889efc646712c14397d8c90f99.jpg',NULL,197881,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202041','118.43.182.117');
INSERT INTO `rx_files` VALUES (214,190,'doc','2049ec64d794c3ed7b351a67ab9aeb17',134,169,0,'Y','IMG_7514.JPG','./files/attach/images/2023/01/17/eccd55e32a88c923acb67494d962f20e.jpg',NULL,219523,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202043','118.43.182.117');
INSERT INTO `rx_files` VALUES (215,190,'doc','c9319e956cdf46b40fde7928f70a207a',134,169,0,'Y','IMG_7517.JPG','./files/attach/images/2023/01/17/626a5b714473fa36c780a6b74283ab2f.jpg',NULL,218006,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202045','118.43.182.117');
INSERT INTO `rx_files` VALUES (216,190,'doc','b8c0712c87807aea5f7f8cb40a46788f',134,169,0,'Y','IMG_7522.JPG','./files/attach/images/2023/01/17/abdd80cef5b45c257616482f1bd87a59.jpg',NULL,172257,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202046','118.43.182.117');
INSERT INTO `rx_files` VALUES (220,219,'doc','60692efeaead012e96026ad5459b73ea',134,169,0,'Y','IMG_7171.JPG','./files/attach/images/2023/01/17/3e041b0fa69c2246531b5b2a7e41fb7d.jpg',NULL,217278,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202849','118.43.182.117');
INSERT INTO `rx_files` VALUES (221,219,'doc','230a319f3baddf21c86badd54d2ddbf7',134,169,0,'Y','IMG_7172.JPG','./files/attach/images/2023/01/17/10bd3d29ea01f6673fda2db8890e297b.jpg',NULL,221682,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202851','118.43.182.117');
INSERT INTO `rx_files` VALUES (222,219,'doc','7c37c4031d3c01028659a262b38aeb9c',134,169,0,'Y','IMG_7173.JPG','./files/attach/images/2023/01/17/07daee5bb4d732e43a3adad11985d388.jpg',NULL,200226,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202853','118.43.182.117');
INSERT INTO `rx_files` VALUES (223,219,'doc','e675063949d0174a8b8718ec0009354c',134,169,0,'Y','IMG_7174.JPG','./files/attach/images/2023/01/17/edff36452ea845498045be36438931d4.jpg',NULL,229545,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202855','118.43.182.117');
INSERT INTO `rx_files` VALUES (224,219,'doc','8c0355b2dc51386ff59d212896b0cda1',134,169,0,'Y','IMG_7175.JPG','./files/attach/images/2023/01/17/15d19d36a2b016ad221bdcc35b348fcb.jpg',NULL,237516,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202857','118.43.182.117');
INSERT INTO `rx_files` VALUES (225,219,'doc','401f1de9558527f94ad67a3aa1215e0c',134,169,0,'Y','IMG_7176.JPG','./files/attach/images/2023/01/17/fc7b666c91af1b5593f42726fc5d926b.jpg',NULL,208842,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202859','118.43.182.117');
INSERT INTO `rx_files` VALUES (226,219,'doc','30f7d88c68077bca949fb255ae42598e',134,169,0,'Y','IMG_7177.JPG','./files/attach/images/2023/01/17/73dc34bbe9d3f2af65e1cf6265cd49f0.jpg',NULL,246386,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202901','118.43.182.117');
INSERT INTO `rx_files` VALUES (227,219,'doc','d5527cce194bf74fcee2532675b07f5a',134,169,0,'Y','IMG_7178.JPG','./files/attach/images/2023/01/17/52944ae3c311547110ebb4e07f8d0e33.jpg',NULL,160744,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202903','118.43.182.117');
INSERT INTO `rx_files` VALUES (228,219,'doc','5af3ceafd64ef8fdbcff154c776f7d88',134,169,0,'Y','IMG_7181.JPG','./files/attach/images/2023/01/17/2f43440c38a785e5c95894a154431679.jpg',NULL,199818,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202904','118.43.182.117');
INSERT INTO `rx_files` VALUES (229,219,'doc','a59da371cbabb774053d36e751a61bb6',134,169,0,'Y','IMG_7182.JPG','./files/attach/images/2023/01/17/5811da4bbdaadf73588522a3023110c6.jpg',NULL,248167,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202906','118.43.182.117');
INSERT INTO `rx_files` VALUES (230,219,'doc','242370f3a8fcfb9a2766d706e7880a2e',134,169,0,'Y','IMG_7183.JPG','./files/attach/images/2023/01/17/7f772d593f5b56744a3ad7d2f944be71.jpg',NULL,198077,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202908','118.43.182.117');
INSERT INTO `rx_files` VALUES (231,219,'doc','ae807b5c6f1138d735aa0784e614f8c6',134,169,0,'Y','IMG_7184.JPG','./files/attach/images/2023/01/17/50eab9768d6c70976dff8abb74416954.jpg',NULL,215359,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202910','118.43.182.117');
INSERT INTO `rx_files` VALUES (232,219,'doc','544f71427cc310f5cc8803255d04e46c',134,169,0,'Y','IMG_7186.JPG','./files/attach/images/2023/01/17/81f1a6f63beab206153b11d8c9c59bc5.jpg',NULL,215696,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202912','118.43.182.117');
INSERT INTO `rx_files` VALUES (233,219,'doc','dba9ebbda9b4ffd511e2b7591abf3457',134,169,0,'Y','IMG_7188.JPG','./files/attach/images/2023/01/17/7a54819de24c4922fe7e61380071c9ba.jpg',NULL,228212,'image/jpeg',NULL,1000,666,NULL,NULL,'Y','N','20230117202913','118.43.182.117');
INSERT INTO `rx_files` VALUES (234,219,'doc','24476460e9cd7bbf156408fe61b75452',134,169,0,'Y','KakaoTalk_20230117_202627734_02.jpg','./files/attach/images/2023/01/17/282d88dc7863f3ba17f2c027eb4a10f0.jpg',NULL,190023,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117202914','118.43.182.117');
INSERT INTO `rx_files` VALUES (235,219,'doc','dd652fe9db301e2d8d1fe7c9a7efa195',134,169,0,'Y','KakaoTalk_20230117_202627734_03.jpg','./files/attach/images/2023/01/17/f33f1cc976af64d15e60e7a49e13af27.jpg',NULL,184649,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117202914','118.43.182.117');
INSERT INTO `rx_files` VALUES (236,219,'doc','d1094507d910471f5d357c1499d56e63',134,169,0,'Y','KakaoTalk_20230117_202627734_04.jpg','./files/attach/images/2023/01/17/8437fbef879cf6eb6df2727903a59e5d.jpg',NULL,219499,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117202914','118.43.182.117');
INSERT INTO `rx_files` VALUES (237,219,'doc','45da6f3ef39596973d6c10fd2c61287a',134,169,0,'Y','KakaoTalk_20230117_202627734_05.jpg','./files/attach/images/2023/01/17/fff865309083a5fd40100a6b87dffc9a.jpg',NULL,197853,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117202914','118.43.182.117');
INSERT INTO `rx_files` VALUES (238,219,'doc','9dea9441fb4aed1dfcf1d5058bee9e73',134,169,0,'Y','KakaoTalk_20230117_202627734_06.jpg','./files/attach/images/2023/01/17/c92910ec33d5b3968a04435c589ede0b.jpg',NULL,222143,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117202915','118.43.182.117');
INSERT INTO `rx_files` VALUES (239,219,'doc','eb00c392bb62b09321cbdfe263b208ef',134,169,0,'Y','KakaoTalk_20230117_202627734_07.jpg','./files/attach/images/2023/01/17/cd6b8f674e86eaf9882fc9443e53d515.jpg',NULL,238704,'image/jpeg',NULL,1000,750,NULL,NULL,'Y','N','20230117202915','118.43.182.117');
INSERT INTO `rx_files` VALUES (240,219,'doc','197a10fa28420d880c98caa458bd059b',134,169,0,'Y','KakaoTalk_20230117_202627734_08.jpg','./files/attach/images/2023/01/17/7fdef6f7a14f63502e46443d826a7e5b.jpg',NULL,156115,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117202915','118.43.182.117');
INSERT INTO `rx_files` VALUES (244,243,'doc','b0c9a2733767d3d635637a3bc70e2f50',134,169,0,'Y','KakaoTalk_20221119_221929782.jpg','./files/attach/images/2023/01/17/bde29fd27527b7c4f23eff8e639c0557.jpg',NULL,143913,'image/jpeg',NULL,1000,1000,NULL,NULL,'Y','N','20230117203049','118.43.182.117');
INSERT INTO `rx_files` VALUES (245,243,'doc','20e5569c812d8727546505096760beae',134,169,0,'Y','KakaoTalk_20221127_175137162.jpg','./files/attach/images/2023/01/17/eec7e6d6fee370941681d86e52a48ec8.jpg',NULL,278833,'image/jpeg',NULL,901,924,NULL,NULL,'Y','N','20230117203049','118.43.182.117');
INSERT INTO `rx_files` VALUES (246,243,'doc','917a2ceeb66eed771358ab02284af5fa',134,169,0,'Y','KakaoTalk_20221127_175137162_01.jpg','./files/attach/images/2023/01/17/b7e19b5b6e83e1d0f3772b84c8da5890.jpg',NULL,319440,'image/jpeg',NULL,1000,750,NULL,NULL,'Y','N','20230117203049','118.43.182.117');
INSERT INTO `rx_files` VALUES (247,243,'doc','1b0f52f8180733f84f8c16a4976f0b28',134,169,0,'Y','KakaoTalk_20221127_175137162_02.jpg','./files/attach/images/2023/01/17/74d5287f18f354a214eb023ec0e95207.jpg',NULL,334177,'image/jpeg',NULL,1000,681,NULL,NULL,'Y','N','20230117203050','118.43.182.117');
INSERT INTO `rx_files` VALUES (248,243,'doc','bde8dc415080d13d914b2dd9325f2767',134,169,0,'Y','KakaoTalk_20221127_175137162_03.jpg','./files/attach/images/2023/01/17/2451527eae7b74ef0276818d5bbb67a3.jpg',NULL,289673,'image/jpeg',NULL,1000,626,NULL,NULL,'Y','N','20230117203050','118.43.182.117');
INSERT INTO `rx_files` VALUES (249,243,'doc','327d4a933c9b021ab3fff1f8f1d479d3',134,169,0,'Y','KakaoTalk_20221127_181151035.jpg','./files/attach/images/2023/01/17/729704f40338f741fa044415f0f14a19.jpg',NULL,302649,'image/jpeg',NULL,750,1000,NULL,NULL,'Y','N','20230117203050','118.43.182.117');
INSERT INTO `rx_files` VALUES (250,243,'doc','b196614665345dee353280939df96424',134,169,0,'Y','KakaoTalk_20221127_181151035_01.jpg','./files/attach/images/2023/01/17/3753a8e6907103a5dae778747eba4820.jpg',NULL,255120,'image/jpeg',NULL,1000,750,NULL,NULL,'Y','N','20230117203051','118.43.182.117');
INSERT INTO `rx_files` VALUES (251,243,'doc','be99eef3ac125efec1d5a9c4cde4ca18',134,169,0,'Y','KakaoTalk_20221127_181151035_02.jpg','./files/attach/images/2023/01/17/2b3bee6ed02ef3ffdd62f5dc031011c8.jpg',NULL,226515,'image/jpeg',NULL,1000,750,NULL,NULL,'Y','N','20230117203051','118.43.182.117');
INSERT INTO `rx_files` VALUES (252,243,'doc','f35909307937974d28f1af2a7de42e35',134,169,0,'Y','KakaoTalk_20221127_181151035_03.jpg','./files/attach/images/2023/01/17/d2da29c18714296a830f887246cb385a.jpg',NULL,294926,'image/jpeg',NULL,1000,750,NULL,NULL,'Y','N','20230117203051','118.43.182.117');
/*!40000 ALTER TABLE `rx_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_files_changelog`
--

DROP TABLE IF EXISTS `rx_files_changelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_files_changelog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `change_type` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `file_srl` bigint(20) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `uploaded_filename` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_filename` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_change_type` (`change_type`),
  KEY `idx_file_srl` (`file_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_files_changelog`
--

LOCK TABLES `rx_files_changelog` WRITE;
/*!40000 ALTER TABLE `rx_files_changelog` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_files_changelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_lang`
--

DROP TABLE IF EXISTS `rx_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_lang` (
  `site_srl` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `idx_site_srl` (`site_srl`),
  KEY `idx_name` (`name`),
  KEY `idx_lang_code` (`lang_code`),
  KEY `idx_lang` (`site_srl`,`name`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_lang`
--

LOCK TABLES `rx_lang` WRITE;
/*!40000 ALTER TABLE `rx_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_layouts`
--

DROP TABLE IF EXISTS `rx_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_layouts` (
  `layout_srl` bigint(20) NOT NULL,
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `layout` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout_path` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_srl` bigint(20) DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `layout_type` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'P',
  PRIMARY KEY (`layout_srl`),
  KEY `menu_site_srl` (`site_srl`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_layouts`
--

LOCK TABLES `rx_layouts` WRITE;
/*!40000 ALTER TABLE `rx_layouts` DISABLE KEYS */;
INSERT INTO `rx_layouts` VALUES (66,0,'xedition','XEDITION','O:8:\"stdClass\":6:{s:8:\"use_demo\";s:1:\"Y\";s:18:\"use_ncenter_widget\";s:1:\"Y\";s:19:\"content_fixed_width\";s:1:\"Y\";s:3:\"GNB\";i:49;s:3:\"UNB\";i:58;s:3:\"FNB\";i:61;}',NULL,0,'20230117022724','P');
INSERT INTO `rx_layouts` VALUES (67,0,'default','welcome_mobile_layout','O:8:\"stdClass\":7:{s:8:\"use_demo\";s:1:\"Y\";s:18:\"use_ncenter_widget\";s:1:\"Y\";s:19:\"content_fixed_width\";s:1:\"Y\";s:3:\"GNB\";i:49;s:3:\"UNB\";i:58;s:3:\"FNB\";i:61;s:9:\"main_menu\";i:49;}',NULL,0,'20230117022724','M');
INSERT INTO `rx_layouts` VALUES (105,0,'layouts','layouts',NULL,NULL,0,'20230117113754','P');
INSERT INTO `rx_layouts` VALUES (106,0,'default','기본 레이아웃',NULL,NULL,0,'20230117113754','P');
INSERT INTO `rx_layouts` VALUES (107,0,'user_layout','테스트 레이아웃',NULL,NULL,0,'20230117113754','P');
INSERT INTO `rx_layouts` VALUES (108,0,'layouts','layouts',NULL,NULL,0,'20230117113759','P');
INSERT INTO `rx_layouts` VALUES (109,0,'layouts','layouts',NULL,NULL,0,'20230117113802','P');
INSERT INTO `rx_layouts` VALUES (110,0,'KSO_LayoutFree','KSO 레이아웃(KSODESIGN)','O:8:\"stdClass\":27:{s:16:\"error_return_url\";s:1:\"/\";s:7:\"ruleset\";s:12:\"updateLayout\";s:12:\"_layout_type\";s:1:\"P\";s:15:\"xe_validator_id\";s:37:\"modules/layout/tpl/layout_info_view/1\";s:11:\"layout_type\";s:4:\"main\";s:8:\"logo_img\";s:62:\"./files/attach/images/110/497e407b20207efca4774638f8d0d651.png\";s:9:\"index_url\";s:22:\"https://greentreech.kr\";s:13:\"footer_title1\";s:24:\"기독교한국침례회\";s:12:\"footer_cont1\";s:24:\"기독교한국침례회\";s:13:\"footer_title2\";s:18:\"푸른나무교회\";s:12:\"footer_cont2\";s:117:\"주소: 전북 익산시 선화로73길 25 (3층)<br>\r\n전화번호: 000-0000-0000<br>\r\n이메일: nuriohga@gmail.com\";s:10:\"slide_time\";s:1:\"0\";s:10:\"slide_img1\";s:62:\"./files/attach/images/110/c6f45e3530a3848e660ef062bbb93683.png\";s:10:\"slide_img2\";s:62:\"./files/attach/images/110/f9d26cb3df50e8fa60b57ee60b79dcf9.png\";s:12:\"section_icon\";s:1:\"N\";s:13:\"section_about\";s:1:\"Y\";s:19:\"section_title_about\";s:24:\"GREENTREE BAPTIST CHURCH\";s:17:\"section_about_img\";s:62:\"./files/attach/images/110/7b0036c34527f45b2f55f93a5701df47.jpg\";s:19:\"section_about_title\";s:18:\"푸른나무교회\";s:18:\"section_about_cont\";s:43:\"기독교한국침례회 푸른나무교회\";s:16:\"section_parallax\";s:1:\"Y\";s:19:\"section_bg_parallax\";s:62:\"./files/attach/images/110/5e42e94e063df32bff421a8a877b685b.png\";s:22:\"section_title_parallax\";s:35:\"아름다운 예수 사람되길 ^^\";s:21:\"section_parallax_cont\";s:35:\"아름다운 예수 사람되길 ^^\";s:15:\"section_service\";s:1:\"N\";s:9:\"main_menu\";s:2:\"49\";s:14:\"menu_name_list\";a:1:{i:49;s:9:\"Main Menu\";}}',NULL,0,'20230117113844','P');
INSERT INTO `rx_layouts` VALUES (126,0,'KSO_Gravity','KSO 그래비티 레이아웃','O:8:\"stdClass\":80:{s:16:\"error_return_url\";s:1:\"/\";s:7:\"ruleset\";s:12:\"updateLayout\";s:12:\"_layout_type\";s:1:\"P\";s:15:\"xe_validator_id\";s:37:\"modules/layout/tpl/layout_info_view/1\";s:11:\"layout_type\";s:4:\"main\";s:10:\"edge_space\";s:1:\"0\";s:16:\"header_container\";s:9:\"container\";s:15:\"header_position\";s:3:\"off\";s:8:\"logo_img\";s:62:\"./files/attach/images/126/323624d6d9f2df003eb925c3dc16624e.png\";s:11:\"logo_img_on\";s:62:\"./files/attach/images/126/575d3f68536e31e08c8842a7ec219f61.png\";s:9:\"nav_space\";s:2:\"50\";s:11:\"lang_header\";s:1:\"N\";s:11:\"footer_logo\";s:62:\"./files/attach/images/126/ec354ebab1ea0a6e44457b577db3c432.png\";s:12:\"footer_icon1\";s:37:\"<i class=\"fas fa-map-marker-alt\"></i>\";s:12:\"footer_info1\";s:62:\"<b>주소:</b> 전라북도 익산시 선화로73길 25 (3층)\";s:12:\"footer_icon2\";s:28:\"<i class=\"fas fa-phone\"></i>\";s:12:\"footer_info2\";s:34:\"<b>전화번호:</b> 000-0000-0000\";s:12:\"footer_icon3\";s:36:\"<i class=\"far fa-envelope-open\"></i>\";s:12:\"footer_info3\";s:36:\"<b>이메일:</b> nuriohga@gmail.com\";s:9:\"copyright\";s:137:\"© 2023 GreenTreeChurch. ALL RIGHTS RESERVED.<br>\r\n이 홈페이지 안에 있는 모든 내용은 푸른나무교회의 소유입니다.\";s:9:\"nav_fixed\";s:1:\"Y\";s:9:\"nav_login\";s:1:\"Y\";s:18:\"sidebar_profile_bg\";s:62:\"./files/attach/images/126/d71dd294d7bf910cf6a1436096796f52.png\";s:12:\"login_header\";s:1:\"Y\";s:13:\"search_header\";s:1:\"Y\";s:10:\"sub_header\";s:1:\"Y\";s:7:\"submenu\";s:1:\"Y\";s:12:\"board_sketch\";s:1:\"Y\";s:10:\"aside_menu\";s:1:\"Y\";s:11:\"main_visual\";s:6:\"slider\";s:9:\"auto_play\";s:4:\"true\";s:4:\"mute\";s:4:\"true\";s:16:\"optimize_display\";s:4:\"true\";s:10:\"slide_dots\";s:5:\"false\";s:10:\"slide_img1\";s:62:\"./files/attach/images/126/bb8e7bc6ca1cd2a032bc1926d41b03b9.png\";s:12:\"slide_img_m1\";s:62:\"./files/attach/images/126/2bbedb748daeb610b2ab7a7180940b74.png\";s:10:\"slide_img2\";s:62:\"./files/attach/images/126/e5139182045cbf60e6d95820d6875793.png\";s:12:\"slide_img_m2\";s:62:\"./files/attach/images/126/cb0804eb585563a4074ee2c4514948ce.png\";s:13:\"section_quick\";s:1:\"Y\";s:10:\"icon_linea\";s:1:\"Y\";s:10:\"icon_menu1\";s:13:\"교회 소개\";s:10:\"icon_code1\";s:11:\"basic-signs\";s:10:\"icon_menu2\";s:19:\"섬기는 사람들\";s:10:\"icon_code2\";s:12:\"basic-mixer2\";s:10:\"icon_menu3\";s:23:\"예배와 모임 안내\";s:10:\"icon_code3\";s:11:\"basic-watch\";s:10:\"icon_menu4\";s:13:\"주일 설교\";s:10:\"icon_code4\";s:21:\"arrows-keyboard-right\";s:10:\"icon_menu5\";s:16:\"알리는 말씀\";s:10:\"icon_code5\";s:17:\"basic-message-txt\";s:10:\"icon_menu6\";s:13:\"오시는 길\";s:10:\"icon_code6\";s:20:\"basic-geolocalize-05\";s:14:\"section_widget\";s:1:\"Y\";s:13:\"widget_title1\";s:16:\"알리는 말씀\";s:12:\"widget_type1\";s:6:\"normal\";s:11:\"widget_srl1\";s:3:\"136\";s:12:\"widget_link1\";s:12:\"board_eqqA48\";s:13:\"widget_title2\";s:22:\"푸른나무 사진첩\";s:12:\"widget_type2\";s:19:\"image_title_content\";s:11:\"widget_srl2\";s:3:\"134\";s:12:\"widget_link2\";s:12:\"board_CBHH38\";s:14:\"section_banner\";s:1:\"N\";s:16:\"section_parallax\";s:1:\"Y\";s:23:\"section_parallax_header\";s:39:\"<b>ANNOUNCEMENT</b> of GREENTREE CHURCH\";s:12:\"parallax_img\";s:62:\"./files/attach/images/126/f835afb48d90b89780ce3c1236f56bb8.png\";s:14:\"parallax_cover\";s:11:\"cover-light\";s:13:\"parallax_cont\";s:223:\"푸른나무교회는 안으로는 성도분들과 함께 하나님을 배우는 공동체로 활동하고, 밖으로는 이웃으로써 최선을 다해 지역 사회를 섬기는 건강한 교회로 걸어가겠습니다.\";s:12:\"parallax_btn\";s:9:\"더보기\";s:16:\"section_carousel\";s:1:\"Y\";s:23:\"section_carousel_header\";s:29:\"푸른나무 <b>사진첩</b>\";s:20:\"section_carousel_srl\";s:3:\"134\";s:21:\"section_carousel_view\";s:23:\"thumbnail,title,content\";s:19:\"section_contact_bnr\";s:1:\"Y\";s:17:\"column_bnr_height\";s:3:\"100\";s:18:\"contact_bnr_title1\";s:17:\"청년 BIBLE TIME\";s:16:\"contact_bnr_img1\";s:62:\"./files/attach/images/126/99b983892094b5c6d2fc3736e15da7d1.png\";s:9:\"main_menu\";s:2:\"49\";s:11:\"footer_menu\";s:1:\"0\";s:11:\"select_menu\";s:3:\"159\";s:14:\"menu_name_list\";a:2:{i:49;s:9:\"Main Menu\";i:159;s:11:\"Family Site\";}}',NULL,0,'20230117151105','P');
INSERT INTO `rx_layouts` VALUES (148,0,'KSO_LayoutFree','KSO 레이아웃(KSODESIGN)(2)','O:8:\"stdClass\":27:{s:16:\"error_return_url\";s:1:\"/\";s:7:\"ruleset\";s:12:\"updateLayout\";s:12:\"_layout_type\";s:1:\"P\";s:15:\"xe_validator_id\";s:37:\"modules/layout/tpl/layout_info_view/1\";s:11:\"layout_type\";s:3:\"sub\";s:8:\"logo_img\";s:62:\"./files/attach/images/148/497e407b20207efca4774638f8d0d651.png\";s:9:\"index_url\";s:22:\"https://greentreech.kr\";s:13:\"footer_title1\";s:24:\"기독교한국침례회\";s:12:\"footer_cont1\";s:24:\"기독교한국침례회\";s:13:\"footer_title2\";s:18:\"푸른나무교회\";s:12:\"footer_cont2\";s:117:\"주소: 전북 익산시 선화로73길 25 (3층)<br>\r\n전화번호: 000-0000-0000<br>\r\n이메일: nuriohga@gmail.com\";s:10:\"slide_time\";s:1:\"0\";s:10:\"slide_img1\";s:62:\"./files/attach/images/148/c6f45e3530a3848e660ef062bbb93683.png\";s:10:\"slide_img2\";s:62:\"./files/attach/images/148/f9d26cb3df50e8fa60b57ee60b79dcf9.png\";s:12:\"section_icon\";s:1:\"N\";s:13:\"section_about\";s:1:\"Y\";s:19:\"section_title_about\";s:24:\"GREENTREE BAPTIST CHURCH\";s:17:\"section_about_img\";s:62:\"./files/attach/images/148/7b0036c34527f45b2f55f93a5701df47.jpg\";s:19:\"section_about_title\";s:18:\"푸른나무교회\";s:18:\"section_about_cont\";s:43:\"기독교한국침례회 푸른나무교회\";s:16:\"section_parallax\";s:1:\"Y\";s:19:\"section_bg_parallax\";s:62:\"./files/attach/images/148/5e42e94e063df32bff421a8a877b685b.png\";s:22:\"section_title_parallax\";s:35:\"아름다운 예수 사람되길 ^^\";s:21:\"section_parallax_cont\";s:35:\"아름다운 예수 사람되길 ^^\";s:15:\"section_service\";s:1:\"N\";s:9:\"main_menu\";s:2:\"49\";s:14:\"menu_name_list\";a:1:{i:49;s:9:\"Main Menu\";}}',NULL,0,'20230117170210','P');
INSERT INTO `rx_layouts` VALUES (168,0,'KSO_Gravity','KSO 그래비티 레이아웃(2)','O:8:\"stdClass\":80:{s:16:\"error_return_url\";s:1:\"/\";s:7:\"ruleset\";s:12:\"updateLayout\";s:12:\"_layout_type\";s:1:\"P\";s:15:\"xe_validator_id\";s:37:\"modules/layout/tpl/layout_info_view/1\";s:11:\"layout_type\";s:6:\"asideA\";s:10:\"edge_space\";s:1:\"0\";s:16:\"header_container\";s:9:\"container\";s:15:\"header_position\";s:3:\"off\";s:8:\"logo_img\";s:62:\"./files/attach/images/168/dd91d63b05dbff96dd38f114add04d3d.png\";s:11:\"logo_img_on\";s:62:\"./files/attach/images/168/3aa589f4337795fb1743ee27d6b03712.png\";s:9:\"nav_space\";s:2:\"50\";s:11:\"lang_header\";s:1:\"N\";s:11:\"footer_logo\";s:62:\"./files/attach/images/168/ec354ebab1ea0a6e44457b577db3c432.png\";s:12:\"footer_icon1\";s:37:\"<i class=\"fas fa-map-marker-alt\"></i>\";s:12:\"footer_info1\";s:62:\"<b>주소:</b> 전라북도 익산시 선화로73길 25 (3층)\";s:12:\"footer_icon2\";s:28:\"<i class=\"fas fa-phone\"></i>\";s:12:\"footer_info2\";s:34:\"<b>전화번호:</b> 000-0000-0000\";s:12:\"footer_icon3\";s:36:\"<i class=\"far fa-envelope-open\"></i>\";s:12:\"footer_info3\";s:36:\"<b>이메일:</b> nuriohga@gmail.com\";s:9:\"copyright\";s:137:\"© 2023 GreenTreeChurch. ALL RIGHTS RESERVED.<br>\r\n이 홈페이지 안에 있는 모든 내용은 푸른나무교회의 소유입니다.\";s:9:\"nav_fixed\";s:1:\"Y\";s:9:\"nav_login\";s:1:\"Y\";s:18:\"sidebar_profile_bg\";s:62:\"./files/attach/images/168/d71dd294d7bf910cf6a1436096796f52.png\";s:12:\"login_header\";s:1:\"Y\";s:13:\"search_header\";s:1:\"Y\";s:10:\"sub_header\";s:1:\"Y\";s:7:\"submenu\";s:1:\"Y\";s:12:\"board_sketch\";s:1:\"Y\";s:10:\"aside_menu\";s:1:\"Y\";s:11:\"main_visual\";s:6:\"slider\";s:9:\"auto_play\";s:4:\"true\";s:4:\"mute\";s:4:\"true\";s:16:\"optimize_display\";s:4:\"true\";s:10:\"slide_dots\";s:5:\"false\";s:10:\"slide_img1\";s:62:\"./files/attach/images/168/bb8e7bc6ca1cd2a032bc1926d41b03b9.png\";s:12:\"slide_img_m1\";s:62:\"./files/attach/images/168/2bbedb748daeb610b2ab7a7180940b74.png\";s:10:\"slide_img2\";s:62:\"./files/attach/images/168/e5139182045cbf60e6d95820d6875793.png\";s:12:\"slide_img_m2\";s:62:\"./files/attach/images/168/cb0804eb585563a4074ee2c4514948ce.png\";s:13:\"section_quick\";s:1:\"Y\";s:10:\"icon_linea\";s:1:\"Y\";s:10:\"icon_menu1\";s:13:\"교회 소개\";s:10:\"icon_code1\";s:11:\"basic-signs\";s:10:\"icon_menu2\";s:19:\"섬기는 사람들\";s:10:\"icon_code2\";s:12:\"basic-mixer2\";s:10:\"icon_menu3\";s:23:\"예배와 모임 안내\";s:10:\"icon_code3\";s:11:\"basic-watch\";s:10:\"icon_menu4\";s:13:\"주일 설교\";s:10:\"icon_code4\";s:21:\"arrows-keyboard-right\";s:10:\"icon_menu5\";s:16:\"알리는 말씀\";s:10:\"icon_code5\";s:17:\"basic-message-txt\";s:10:\"icon_menu6\";s:13:\"오시는 길\";s:10:\"icon_code6\";s:20:\"basic-geolocalize-05\";s:14:\"section_widget\";s:1:\"Y\";s:13:\"widget_title1\";s:16:\"알리는 말씀\";s:12:\"widget_type1\";s:6:\"normal\";s:11:\"widget_srl1\";s:3:\"136\";s:12:\"widget_link1\";s:12:\"board_eqqA48\";s:13:\"widget_title2\";s:22:\"푸른나무 사진첩\";s:12:\"widget_type2\";s:19:\"image_title_content\";s:11:\"widget_srl2\";s:3:\"134\";s:12:\"widget_link2\";s:12:\"board_CBHH38\";s:14:\"section_banner\";s:1:\"N\";s:16:\"section_parallax\";s:1:\"Y\";s:23:\"section_parallax_header\";s:39:\"<b>ANNOUNCEMENT</b> of GREENTREE CHURCH\";s:12:\"parallax_img\";s:62:\"./files/attach/images/168/f835afb48d90b89780ce3c1236f56bb8.png\";s:14:\"parallax_cover\";s:11:\"cover-light\";s:13:\"parallax_cont\";s:223:\"푸른나무교회는 안으로는 성도분들과 함께 하나님을 배우는 공동체로 활동하고, 밖으로는 이웃으로써 최선을 다해 지역 사회를 섬기는 건강한 교회로 걸어가겠습니다.\";s:12:\"parallax_btn\";s:9:\"더보기\";s:16:\"section_carousel\";s:1:\"Y\";s:23:\"section_carousel_header\";s:29:\"푸른나무 <b>사진첩</b>\";s:20:\"section_carousel_srl\";s:3:\"134\";s:21:\"section_carousel_view\";s:23:\"thumbnail,title,content\";s:19:\"section_contact_bnr\";s:1:\"Y\";s:17:\"column_bnr_height\";s:3:\"100\";s:18:\"contact_bnr_title1\";s:26:\"<font color=white>.</font>\";s:16:\"contact_bnr_img1\";s:62:\"./files/attach/images/168/867b7ca8826f1c5a00e0dcca180f0418.png\";s:9:\"main_menu\";s:2:\"49\";s:11:\"footer_menu\";s:1:\"0\";s:11:\"select_menu\";s:3:\"159\";s:14:\"menu_name_list\";a:2:{i:49;s:9:\"Main Menu\";i:159;s:11:\"Family Site\";}}',NULL,0,'20230117194424','P');
INSERT INTO `rx_layouts` VALUES (263,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118135629','P');
INSERT INTO `rx_layouts` VALUES (266,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118135708','P');
INSERT INTO `rx_layouts` VALUES (270,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118135838','P');
INSERT INTO `rx_layouts` VALUES (275,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118143109','P');
INSERT INTO `rx_layouts` VALUES (276,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118162531','P');
INSERT INTO `rx_layouts` VALUES (277,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118162554','P');
INSERT INTO `rx_layouts` VALUES (278,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118163225','P');
INSERT INTO `rx_layouts` VALUES (279,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118163350','P');
INSERT INTO `rx_layouts` VALUES (280,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230118174136','P');
INSERT INTO `rx_layouts` VALUES (293,0,'KSO_LayoutFree','KSO_LayoutFree',NULL,NULL,0,'20230320125520','P');
/*!40000 ALTER TABLE `rx_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member`
--

DROP TABLE IF EXISTS `rx_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member` (
  `member_srl` bigint(20) NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_host` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_country` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `find_account_question` bigint(20) DEFAULT NULL,
  `find_account_answer` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_mailing` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `allow_message` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `denied` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_login` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_login_ipaddress` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_date` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `change_password_date` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `is_admin` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_vars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  PRIMARY KEY (`member_srl`),
  UNIQUE KEY `unique_user_id` (`user_id`),
  UNIQUE KEY `unique_email_address` (`email_address`),
  KEY `idx_email_host` (`email_host`),
  KEY `idx_phone_number` (`phone_number`),
  KEY `idx_phone_country` (`phone_country`),
  KEY `idx_phone_type` (`phone_type`),
  KEY `idx_nick_name` (`nick_name`),
  KEY `idx_allow_mailing` (`allow_mailing`),
  KEY `idx_is_denied` (`denied`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_last_login` (`last_login`),
  KEY `idx_last_login_ipaddress` (`last_login_ipaddress`),
  KEY `idx_is_admin` (`is_admin`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member`
--

LOCK TABLES `rx_member` WRITE;
/*!40000 ALTER TABLE `rx_member` DISABLE KEYS */;
INSERT INTO `rx_member` VALUES (4,'admin','$2y$10$nyjrO6DSWlBLUFqaxHWzT.7CMXL1tfIQkS5tRGG6H.dK65emCVlYK','nuriohga@gmail.com','nuriohga','gmail.com','','','','admin','최고관리자',NULL,'','','',NULL,'N','Y','N','20230117022724','118.42.24.197','20230520151203','211.231.90.44','','20230117022724','Y','','O:8:\"stdClass\":2:{s:14:\"refused_reason\";s:0:\"\";s:14:\"limited_reason\";s:0:\"\";}',-4);
INSERT INTO `rx_member` VALUES (169,'jasper5','$2y$10$DgVTbi6OEvFnsTPWRSNVhujZoZtFuaJBjNlh3LkdK9uvh.1xP.l7K','minbo91@naver.com','minbo91','naver.com','','','','심민보','담임목사',NULL,'','','',NULL,'N','Y','N','20230117195820','118.43.182.117','20230415114421','14.55.170.106','','20230117195820','N','','O:8:\"stdClass\":2:{s:14:\"refused_reason\";s:0:\"\";s:14:\"limited_reason\";s:0:\"\";}',-169);
INSERT INTO `rx_member` VALUES (172,'soonie','$2y$10$6wkzzYbkFa9uB6WZMKoQw.TaFvAXdbP5kDQBwh239y6m2I1lyqVLy','cusoon55@naver.com','cusoon55','naver.com','','','','이순석','soonie',NULL,'','','',NULL,'N','Y','N','20230117200305','118.43.182.117','20230117200305','118.43.182.117','','20230117200305','N','','O:8:\"stdClass\":2:{s:14:\"refused_reason\";s:0:\"\";s:14:\"limited_reason\";s:0:\"\";}',-172);
INSERT INTO `rx_member` VALUES (262,'leeshkr','$2y$10$HH1Fn4yR0D3jZRLkcqhox.MzLPReB2DQqSvH2k7ksRapHsIL9t.y6','leeshkr@gmail.com','leeshkr','gmail.com','','','','이승호','푸른나무머슴',NULL,'','','',NULL,'Y','Y','N','20230118121559','118.42.24.197','20230118122032','118.42.24.197','','20230118121559','N','','O:8:\"stdClass\":2:{s:14:\"refused_reason\";s:0:\"\";s:14:\"limited_reason\";s:0:\"\";}',-262);
INSERT INTO `rx_member` VALUES (294,'wodud7209','$2y$10$ShUQCJnPVcv4dTzjDzvCsOK98jgj8hFuljx6J8NaczBbXPCpKM97.','wodud7209@naver.com','wodud7209','naver.com','','','','김재영','green',NULL,NULL,'','',NULL,'N','Y','N','20230326134820','211.33.241.28','20230423143638','211.33.241.28',NULL,'20230326134820','N',NULL,'O:8:\"stdClass\":0:{}',-294);
/*!40000 ALTER TABLE `rx_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_agreed`
--

DROP TABLE IF EXISTS `rx_member_agreed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_agreed` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_srl` bigint(20) NOT NULL,
  `agreement_sequence` bigint(20) NOT NULL,
  `agreed` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_agreement_sequence` (`agreement_sequence`),
  KEY `idx_agreed` (`agreed`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_agreed`
--

LOCK TABLES `rx_member_agreed` WRITE;
/*!40000 ALTER TABLE `rx_member_agreed` DISABLE KEYS */;
INSERT INTO `rx_member_agreed` VALUES (1,169,1,'Y','118.43.182.117','20230117195820');
INSERT INTO `rx_member_agreed` VALUES (2,172,1,'Y','118.43.182.117','20230117200305');
INSERT INTO `rx_member_agreed` VALUES (3,294,1,'Y','211.33.241.28','20230326134820');
/*!40000 ALTER TABLE `rx_member_agreed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_auth_mail`
--

DROP TABLE IF EXISTS `rx_member_auth_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_auth_mail` (
  `auth_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_register` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  UNIQUE KEY `unique_key` (`auth_key`,`member_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_auth_mail`
--

LOCK TABLES `rx_member_auth_mail` WRITE;
/*!40000 ALTER TABLE `rx_member_auth_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_auth_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_auth_sms`
--

DROP TABLE IF EXISTS `rx_member_auth_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_auth_sms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_srl` bigint(20) NOT NULL,
  `phone_number` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_country` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_phone_number` (`phone_number`),
  KEY `idx_phone_country` (`phone_country`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_ipaddress` (`ipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_auth_sms`
--

LOCK TABLES `rx_member_auth_sms` WRITE;
/*!40000 ALTER TABLE `rx_member_auth_sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_auth_sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_autologin`
--

DROP TABLE IF EXISTS `rx_member_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_autologin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `autologin_key` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_key` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_visit` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_ipaddress` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_autologin_key` (`autologin_key`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_last_visited` (`last_visit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_autologin`
--

LOCK TABLES `rx_member_autologin` WRITE;
/*!40000 ALTER TABLE `rx_member_autologin` DISABLE KEYS */;
INSERT INTO `rx_member_autologin` VALUES (1,'mqoXWo4gJLXmpvy2vuEAaXx6','StarE4VZSD3zZ5tAnrbpD4k9jHUsCzWk3XpRIfsAN4U=',4,'20230117165912','118.42.24.197','20230118174228','118.42.24.197','{\"browser\":\"Whale\",\"version\":\"3.18\",\"os\":\"Windows\",\"os_version\":\"10.0\",\"device\":null,\"is_mobile\":false,\"is_tablet\":false,\"is_webview\":false,\"is_robot\":false}');
INSERT INTO `rx_member_autologin` VALUES (2,'S6Nzc6iFatAPzH8KsTDkeQKX','pXh7qHXO0krcYm2UYVP94QuILdKrFQQJO03MwHgvV8M=',4,'20230118094658','121.159.188.133','20230124193711','121.159.188.133','{\"browser\":\"Whale\",\"version\":\"3.18\",\"os\":\"Windows\",\"os_version\":\"10.0\",\"device\":null,\"is_mobile\":false,\"is_tablet\":false,\"is_webview\":false,\"is_robot\":false}');
/*!40000 ALTER TABLE `rx_member_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_count_history`
--

DROP TABLE IF EXISTS `rx_member_count_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_count_history` (
  `member_srl` bigint(20) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_update` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`member_srl`),
  KEY `idx_last_update` (`last_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_count_history`
--

LOCK TABLES `rx_member_count_history` WRITE;
/*!40000 ALTER TABLE `rx_member_count_history` DISABLE KEYS */;
INSERT INTO `rx_member_count_history` VALUES (4,'a:1:{i:0;a:3:{i:0;s:13:\"118.42.24.197\";i:1;s:66:\"이메일 주소 또는 비밀번호가 일치하지 않습니다.\";i:2;i:1673933895;}}','20230117143815');
INSERT INTO `rx_member_count_history` VALUES (169,'a:1:{i:0;a:3:{i:0;s:13:\"211.33.241.28\";i:1;s:66:\"이메일 주소 또는 비밀번호가 일치하지 않습니다.\";i:2;i:1676779732;}}','20230219130852');
INSERT INTO `rx_member_count_history` VALUES (294,'a:1:{i:0;a:3:{i:0;s:13:\"211.33.241.28\";i:1;s:66:\"이메일 주소 또는 비밀번호가 일치하지 않습니다.\";i:2;i:1680411295;}}','20230402135455');
/*!40000 ALTER TABLE `rx_member_count_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_denied_nick_name`
--

DROP TABLE IF EXISTS `rx_member_denied_nick_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_denied_nick_name` (
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nick_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_denied_nick_name`
--

LOCK TABLES `rx_member_denied_nick_name` WRITE;
/*!40000 ALTER TABLE `rx_member_denied_nick_name` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_denied_nick_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_denied_user_id`
--

DROP TABLE IF EXISTS `rx_member_denied_user_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_denied_user_id` (
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_denied_user_id`
--

LOCK TABLES `rx_member_denied_user_id` WRITE;
/*!40000 ALTER TABLE `rx_member_denied_user_id` DISABLE KEYS */;
INSERT INTO `rx_member_denied_user_id` VALUES ('addon','20230117022724','',-5);
INSERT INTO `rx_member_denied_user_id` VALUES ('admin','20230117022724','',-6);
INSERT INTO `rx_member_denied_user_id` VALUES ('administrator','20230117022724','',-38);
INSERT INTO `rx_member_denied_user_id` VALUES ('adminlogging','20230117022724','',-7);
INSERT INTO `rx_member_denied_user_id` VALUES ('advanced_mailer','20230117022724','',-8);
INSERT INTO `rx_member_denied_user_id` VALUES ('autoinstall','20230117022724','',-9);
INSERT INTO `rx_member_denied_user_id` VALUES ('board','20230117022724','',-10);
INSERT INTO `rx_member_denied_user_id` VALUES ('comment','20230117022724','',-11);
INSERT INTO `rx_member_denied_user_id` VALUES ('communication','20230117022724','',-12);
INSERT INTO `rx_member_denied_user_id` VALUES ('counter','20230117022724','',-13);
INSERT INTO `rx_member_denied_user_id` VALUES ('document','20230117022724','',-14);
INSERT INTO `rx_member_denied_user_id` VALUES ('editor','20230117022724','',-15);
INSERT INTO `rx_member_denied_user_id` VALUES ('file','20230117022724','',-16);
INSERT INTO `rx_member_denied_user_id` VALUES ('ftp','20230117022724','',-40);
INSERT INTO `rx_member_denied_user_id` VALUES ('http','20230117022724','',-41);
INSERT INTO `rx_member_denied_user_id` VALUES ('importer','20230117022724','',-17);
INSERT INTO `rx_member_denied_user_id` VALUES ('install','20230117022724','',-18);
INSERT INTO `rx_member_denied_user_id` VALUES ('integration_search','20230117022724','',-19);
INSERT INTO `rx_member_denied_user_id` VALUES ('krzip','20230117022724','',-20);
INSERT INTO `rx_member_denied_user_id` VALUES ('layout','20230117022724','',-21);
INSERT INTO `rx_member_denied_user_id` VALUES ('member','20230117022724','',-22);
INSERT INTO `rx_member_denied_user_id` VALUES ('menu','20230117022724','',-23);
INSERT INTO `rx_member_denied_user_id` VALUES ('message','20230117022724','',-24);
INSERT INTO `rx_member_denied_user_id` VALUES ('module','20230117022724','',-25);
INSERT INTO `rx_member_denied_user_id` VALUES ('ncenterlite','20230117022724','',-26);
INSERT INTO `rx_member_denied_user_id` VALUES ('page','20230117022724','',-27);
INSERT INTO `rx_member_denied_user_id` VALUES ('point','20230117022724','',-28);
INSERT INTO `rx_member_denied_user_id` VALUES ('poll','20230117022724','',-29);
INSERT INTO `rx_member_denied_user_id` VALUES ('root','20230117022724','',-37);
INSERT INTO `rx_member_denied_user_id` VALUES ('rss','20230117022724','',-30);
INSERT INTO `rx_member_denied_user_id` VALUES ('session','20230117022724','',-31);
INSERT INTO `rx_member_denied_user_id` VALUES ('spamfilter','20230117022724','',-32);
INSERT INTO `rx_member_denied_user_id` VALUES ('tag','20230117022724','',-33);
INSERT INTO `rx_member_denied_user_id` VALUES ('telnet','20230117022724','',-39);
INSERT INTO `rx_member_denied_user_id` VALUES ('trash','20230117022724','',-34);
INSERT INTO `rx_member_denied_user_id` VALUES ('widget','20230117022724','',-35);
INSERT INTO `rx_member_denied_user_id` VALUES ('www','20230117022724','',-36);
/*!40000 ALTER TABLE `rx_member_denied_user_id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_devices`
--

DROP TABLE IF EXISTS `rx_member_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_devices` (
  `device_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_key` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_version` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_model` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `last_active_date` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`device_srl`),
  UNIQUE KEY `unique_device_token` (`device_token`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_device_token_type` (`device_token_type`),
  KEY `idx_device_type` (`device_type`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_last_active_date` (`last_active_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_devices`
--

LOCK TABLES `rx_member_devices` WRITE;
/*!40000 ALTER TABLE `rx_member_devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_friend`
--

DROP TABLE IF EXISTS `rx_member_friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_friend` (
  `friend_srl` bigint(20) NOT NULL,
  `friend_group_srl` bigint(20) NOT NULL DEFAULT 0,
  `member_srl` bigint(20) NOT NULL,
  `target_srl` bigint(20) NOT NULL,
  `list_order` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`friend_srl`),
  KEY `idx_friend_group_srl` (`friend_group_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_target_srl` (`target_srl`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_friend`
--

LOCK TABLES `rx_member_friend` WRITE;
/*!40000 ALTER TABLE `rx_member_friend` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_friend_group`
--

DROP TABLE IF EXISTS `rx_member_friend_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_friend_group` (
  `friend_group_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`friend_group_srl`),
  KEY `index_owner_member_srl` (`member_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_friend_group`
--

LOCK TABLES `rx_member_friend_group` WRITE;
/*!40000 ALTER TABLE `rx_member_friend_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_friend_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_group`
--

DROP TABLE IF EXISTS `rx_member_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_group` (
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `group_srl` bigint(20) NOT NULL,
  `list_order` bigint(20) NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `is_default` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `is_admin` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `image_mark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`group_srl`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_group`
--

LOCK TABLES `rx_member_group` WRITE;
/*!40000 ALTER TABLE `rx_member_group` DISABLE KEYS */;
INSERT INTO `rx_member_group` VALUES (0,1,1,'관리그룹','20230117022724','N','Y','','');
INSERT INTO `rx_member_group` VALUES (0,2,2,'준회원','20230117022724','Y','N','','');
INSERT INTO `rx_member_group` VALUES (0,3,4,'담임목사','20230117022724','N','N','','');
INSERT INTO `rx_member_group` VALUES (0,130,3,'찬양팀','20230117162625','N','N','','');
INSERT INTO `rx_member_group` VALUES (0,131,5,'푸른나무가족','20230117162646','N','N','','');
/*!40000 ALTER TABLE `rx_member_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_group_member`
--

DROP TABLE IF EXISTS `rx_member_group_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_group_member` (
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `group_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_group_member` (`group_srl`,`member_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_group_member`
--

LOCK TABLES `rx_member_group_member` WRITE;
/*!40000 ALTER TABLE `rx_member_group_member` DISABLE KEYS */;
INSERT INTO `rx_member_group_member` VALUES (0,1,4,'20230117022724');
INSERT INTO `rx_member_group_member` VALUES (0,1,262,'20230118121947');
INSERT INTO `rx_member_group_member` VALUES (0,131,262,'20230118121947');
INSERT INTO `rx_member_group_member` VALUES (0,131,172,'20230123183607');
INSERT INTO `rx_member_group_member` VALUES (0,1,169,'20230123183628');
INSERT INTO `rx_member_group_member` VALUES (0,3,169,'20230123183628');
INSERT INTO `rx_member_group_member` VALUES (0,2,294,'20230326134820');
/*!40000 ALTER TABLE `rx_member_group_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_join_form`
--

DROP TABLE IF EXISTS `rx_member_join_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_join_form` (
  `member_join_form_srl` bigint(20) NOT NULL,
  `column_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `default_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'Y',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL DEFAULT 1,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`member_join_form_srl`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_join_form`
--

LOCK TABLES `rx_member_join_form` WRITE;
/*!40000 ALTER TABLE `rx_member_join_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_join_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_login_count`
--

DROP TABLE IF EXISTS `rx_member_login_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_login_count` (
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `last_update` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_last_update` (`last_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_login_count`
--

LOCK TABLES `rx_member_login_count` WRITE;
/*!40000 ALTER TABLE `rx_member_login_count` DISABLE KEYS */;
INSERT INTO `rx_member_login_count` VALUES ('118.42.24.197',1,'20230117143815','20230117143815');
INSERT INTO `rx_member_login_count` VALUES ('211.33.241.28',1,'20230219130852','20230402135455');
/*!40000 ALTER TABLE `rx_member_login_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_managed_email_hosts`
--

DROP TABLE IF EXISTS `rx_member_managed_email_hosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_managed_email_hosts` (
  `email_host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`email_host`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_managed_email_hosts`
--

LOCK TABLES `rx_member_managed_email_hosts` WRITE;
/*!40000 ALTER TABLE `rx_member_managed_email_hosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_managed_email_hosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_message`
--

DROP TABLE IF EXISTS `rx_member_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_message` (
  `message_srl` bigint(20) NOT NULL,
  `related_srl` bigint(20) NOT NULL,
  `sender_srl` bigint(20) NOT NULL,
  `receiver_srl` bigint(20) NOT NULL,
  `message_type` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'S',
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `readed` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `list_order` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `readed_date` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`message_srl`),
  KEY `idx_related_srl` (`related_srl`),
  KEY `idx_sender_srl` (`sender_srl`),
  KEY `idx_receiver_srl` (`receiver_srl`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_message`
--

LOCK TABLES `rx_member_message` WRITE;
/*!40000 ALTER TABLE `rx_member_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_nickname_log`
--

DROP TABLE IF EXISTS `rx_member_nickname_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_nickname_log` (
  `member_srl` bigint(20) NOT NULL,
  `before_nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `after_nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_before_nick_name` (`before_nick_name`),
  KEY `idx_after_nick_name` (`after_nick_name`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_nickname_log`
--

LOCK TABLES `rx_member_nickname_log` WRITE;
/*!40000 ALTER TABLE `rx_member_nickname_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_nickname_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_scrap`
--

DROP TABLE IF EXISTS `rx_member_scrap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_scrap` (
  `member_srl` bigint(20) NOT NULL,
  `document_srl` bigint(20) NOT NULL,
  `folder_srl` bigint(20) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_member_srl` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  UNIQUE KEY `unique_scrap` (`member_srl`,`document_srl`),
  KEY `idx_folder_srl` (`folder_srl`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_scrap`
--

LOCK TABLES `rx_member_scrap` WRITE;
/*!40000 ALTER TABLE `rx_member_scrap` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_member_scrap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_member_scrap_folders`
--

DROP TABLE IF EXISTS `rx_member_scrap_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_member_scrap_folders` (
  `folder_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  PRIMARY KEY (`folder_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_member_scrap_folders`
--

LOCK TABLES `rx_member_scrap_folders` WRITE;
/*!40000 ALTER TABLE `rx_member_scrap_folders` DISABLE KEYS */;
INSERT INTO `rx_member_scrap_folders` VALUES (295,294,'/DEFAULT/','20230326134825',295);
/*!40000 ALTER TABLE `rx_member_scrap_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_menu`
--

DROP TABLE IF EXISTS `rx_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_menu` (
  `menu_srl` bigint(20) NOT NULL,
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `title` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listorder` bigint(20) DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`menu_srl`),
  KEY `menu_site_srl` (`site_srl`),
  KEY `idx_title` (`title`),
  KEY `idx_listorder` (`listorder`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_menu`
--

LOCK TABLES `rx_menu` WRITE;
/*!40000 ALTER TABLE `rx_menu` DISABLE KEYS */;
INSERT INTO `rx_menu` VALUES (49,0,'Main Menu',-49,'20230117022724');
INSERT INTO `rx_menu` VALUES (58,0,'Pages & Boards',-58,'20230117022724');
INSERT INTO `rx_menu` VALUES (61,0,'Footer Menu',-61,'20230117022724');
INSERT INTO `rx_menu` VALUES (72,0,'__ADMINMENU_V17__',-72,'20230117112731');
INSERT INTO `rx_menu` VALUES (112,0,'*',-112,'20230117135442');
INSERT INTO `rx_menu` VALUES (159,0,'Family Site',-159,'20230117174643');
/*!40000 ALTER TABLE `rx_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_menu_item`
--

DROP TABLE IF EXISTS `rx_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_menu_item` (
  `menu_item_srl` bigint(20) NOT NULL,
  `parent_srl` bigint(20) NOT NULL DEFAULT 0,
  `menu_srl` bigint(20) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_shortcut` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `open_window` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `expand` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `normal_btn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hover_btn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_btn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_srls` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listorder` bigint(20) DEFAULT 0,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`menu_item_srl`),
  KEY `idx_menu_srl` (`menu_srl`),
  KEY `idx_listorder` (`listorder`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_menu_item`
--

LOCK TABLES `rx_menu_item` WRITE;
/*!40000 ALTER TABLE `rx_menu_item` DISABLE KEYS */;
INSERT INTO `rx_menu_item` VALUES (63,0,61,'Terms of Service','','','terms','N','N','N',NULL,NULL,NULL,NULL,-63,'20230117022724');
INSERT INTO `rx_menu_item` VALUES (65,0,61,'Privacy Policy','','','privacy','N','N','N',NULL,NULL,NULL,NULL,-65,'20230117022724');
INSERT INTO `rx_menu_item` VALUES (73,0,72,'{$lang->menu_gnb[\'dashboard\']}',NULL,NULL,'/index.php?module=admin','N','N','N',NULL,NULL,NULL,NULL,-73,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (74,0,72,'{$lang->menu_gnb[\'menu\']}',NULL,NULL,'#','N','N','N',NULL,NULL,NULL,NULL,-74,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (75,0,72,'{$lang->menu_gnb[\'user\']}',NULL,NULL,'#','N','N','N',NULL,NULL,NULL,NULL,-75,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (76,0,72,'{$lang->menu_gnb[\'content\']}',NULL,NULL,'#','N','N','N',NULL,NULL,NULL,NULL,-76,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (77,0,72,'{$lang->menu_gnb[\'configuration\']}',NULL,NULL,'#','N','N','N',NULL,NULL,NULL,NULL,-77,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (78,0,72,'{$lang->menu_gnb[\'advanced\']}',NULL,NULL,'#','N','N','N',NULL,NULL,NULL,NULL,-78,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (79,74,72,'{$lang->menu_gnb_sub[\'siteMap\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispMenuAdminSiteMap','N','N','N','','','','1',-79,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (80,74,72,'{$lang->menu_gnb_sub[\'siteDesign\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispMenuAdminSiteDesign','N','N','N','','','','1',-80,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (81,75,72,'{$lang->menu_gnb_sub[\'userList\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispMemberAdminList','N','N','N','','','','1',-81,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (82,75,72,'{$lang->menu_gnb_sub[\'userSetting\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispMemberAdminConfig','N','N','N','','','','1',-82,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (83,75,72,'{$lang->menu_gnb_sub[\'userGroup\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispMemberAdminGroupList','N','N','N','','','','1',-83,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (84,75,72,'{$lang->menu_gnb_sub[\'point\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispPointAdminConfig','N','N','N','','','','1',-84,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (85,76,72,'{$lang->menu_gnb_sub[\'board\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispBoardAdminContent','N','N','N','','','','1',-85,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (86,76,72,'{$lang->menu_gnb_sub[\'page\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispPageAdminContent','N','N','N','','','','1',-86,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (87,76,72,'{$lang->menu_gnb_sub[\'document\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispDocumentAdminList','N','N','N','','','','1',-87,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (88,76,72,'{$lang->menu_gnb_sub[\'comment\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispCommentAdminList','N','N','N','','','','1',-88,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (89,76,72,'{$lang->menu_gnb_sub[\'file\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispFileAdminList','N','N','N','','','','1',-89,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (90,76,72,'{$lang->menu_gnb_sub[\'poll\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispPollAdminList','N','N','N','','','','1',-90,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (91,76,72,'{$lang->menu_gnb_sub[\'editor\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispEditorAdminIndex','N','N','N','','','','1',-91,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (92,76,72,'{$lang->menu_gnb_sub[\'spamFilter\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispSpamfilterAdminDeniedIPList','N','N','N','','','','1',-92,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (93,76,72,'{$lang->menu_gnb_sub[\'trash\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispTrashAdminList','N','N','N','','','','1',-93,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (94,77,72,'{$lang->menu_gnb_sub[\'adminConfigurationGeneral\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispAdminConfigGeneral','N','N','N','','','','1',-94,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (95,77,72,'{$lang->menu_gnb_sub[\'adminMenuSetup\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispAdminSetup','N','N','N','','','','1',-95,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (96,77,72,'{$lang->menu_gnb_sub[\'filebox\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispModuleAdminFileBox','N','N','N','','','','1',-96,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (97,78,72,'{$lang->menu_gnb_sub[\'easyInstall\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispAutoinstallAdminIndex','N','N','N','','','','1',-97,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (98,78,72,'{$lang->menu_gnb_sub[\'installedLayout\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispLayoutAdminInstalledList','N','N','N','','','','1',-98,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (99,78,72,'{$lang->menu_gnb_sub[\'installedModule\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispModuleAdminContent','N','N','N','','','','1',-99,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (100,78,72,'{$lang->menu_gnb_sub[\'installedAddon\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispAddonAdminIndex','N','N','N','','','','1',-100,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (101,78,72,'{$lang->menu_gnb_sub[\'installedWidget\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispWidgetAdminDownloadedList','N','N','N','','','','1',-101,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (102,78,72,'{$lang->menu_gnb_sub[\'multilingual\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispModuleAdminLangcode','N','N','N','','','','1',-102,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (103,78,72,'{$lang->menu_gnb_sub[\'importer\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispImporterAdminImportForm','N','N','N','','','','1',-103,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (104,78,72,'{$lang->menu_gnb_sub[\'rss\']}',NULL,NULL,'/index.php?module=admin&amp;act=dispRssAdminIndex','N','N','N','','','','1',-104,'20230117112731');
INSERT INTO `rx_menu_item` VALUES (113,0,49,'소개합니다','','소개합니다','page_QUYQ27','Y','N','N',NULL,NULL,NULL,NULL,-113,'20230117135500');
INSERT INTO `rx_menu_item` VALUES (114,0,49,'나눔터','','나눔터','board_eqqA48','Y','N','N',NULL,NULL,NULL,NULL,-115,'20230117135518');
INSERT INTO `rx_menu_item` VALUES (115,114,49,'알리는 말씀','','알리는 말씀','board_eqqA48','Y','N','N',NULL,NULL,NULL,NULL,-115,'20230117135550');
INSERT INTO `rx_menu_item` VALUES (116,114,49,'사진첩','','사진첩','board_CBHH38','Y','N','N',NULL,NULL,NULL,NULL,-116,'20230117135602');
INSERT INTO `rx_menu_item` VALUES (117,113,49,'푸른나무교회','','푸른나무교회','page_QUYQ27','Y','N','N',NULL,NULL,NULL,NULL,-117,'20230117135613');
INSERT INTO `rx_menu_item` VALUES (118,113,49,'섬기는 사람들','','섬기는 사람들','page_tYfP94','Y','N','N',NULL,NULL,NULL,NULL,-118,'20230117135628');
INSERT INTO `rx_menu_item` VALUES (119,0,49,'모임과 예배','','모임과 예배','board_rIml75','Y','N','N',NULL,NULL,NULL,NULL,-114,'20230117135701');
INSERT INTO `rx_menu_item` VALUES (120,119,49,'주일 설교','','주일 설교','board_rIml75','Y','N','N',NULL,NULL,NULL,NULL,0,'20230117135723');
INSERT INTO `rx_menu_item` VALUES (121,113,49,'모임과 예배 안내','','모임과 예배 안내','page_LZvD46','Y','N','N',NULL,NULL,NULL,NULL,-121,'20230117135739');
INSERT INTO `rx_menu_item` VALUES (122,113,49,'오시는 길','','오시는 길','page_UcGl66','Y','N','N',NULL,NULL,NULL,NULL,-122,'20230117135751');
INSERT INTO `rx_menu_item` VALUES (123,119,49,'제자 훈련','','제자 훈련','#','Y','N','N',NULL,NULL,NULL,NULL,-123,'20230117135809');
INSERT INTO `rx_menu_item` VALUES (125,0,112,'푸른나무교회 HOME','','푸른나무교회 HOME','page_RcbH56','N','N','N',NULL,NULL,NULL,NULL,-125,'20230117150416');
INSERT INTO `rx_menu_item` VALUES (127,0,49,'푸른나무 섬김이','','푸른나무 섬김이','#','Y','N','N',NULL,NULL,NULL,'1,130,3',-127,'20230117162453');
INSERT INTO `rx_menu_item` VALUES (128,127,49,'찬양팀 게시판','','찬양팀 게시판','board_CMCf70','Y','N','N',NULL,NULL,NULL,NULL,-128,'20230117162509');
INSERT INTO `rx_menu_item` VALUES (129,127,49,'담임목사','','담임목사','board_REiI25','Y','N','N',NULL,NULL,NULL,'3',-129,'20230117162539');
INSERT INTO `rx_menu_item` VALUES (132,0,58,'Pages','','Pages','#','Y','N','N',NULL,NULL,NULL,NULL,-132,'20230117162836');
INSERT INTO `rx_menu_item` VALUES (133,0,58,'Boards','','Boards','#','Y','N','N',NULL,NULL,NULL,NULL,-133,'20230117162845');
INSERT INTO `rx_menu_item` VALUES (135,133,58,'푸른나무 사진첩','','푸른나무 사진첩','board_CBHH38','N','N','N',NULL,NULL,NULL,NULL,-136,'20230117162859');
INSERT INTO `rx_menu_item` VALUES (137,133,58,'알리는 말씀','','알리는 말씀','board_eqqA48','N','N','N',NULL,NULL,NULL,NULL,-138,'20230117162908');
INSERT INTO `rx_menu_item` VALUES (139,133,58,'주일 설교','','주일 설교','board_rIml75','N','N','N',NULL,NULL,NULL,NULL,-141,'20230117162935');
INSERT INTO `rx_menu_item` VALUES (141,132,58,'섬기는 사람들','','섬기는 사람들','page_tYfP94','N','N','N',NULL,NULL,NULL,NULL,-142,'20230117162954');
INSERT INTO `rx_menu_item` VALUES (143,132,58,'푸른나무교회','','푸른나무교회','page_QUYQ27','N','N','N',NULL,NULL,NULL,NULL,-141,'20230117163027');
INSERT INTO `rx_menu_item` VALUES (145,132,58,'모임과 예배 안내','','모임과 예배 안내','page_LZvD46','N','N','N',NULL,NULL,NULL,NULL,-145,'20230117163046');
INSERT INTO `rx_menu_item` VALUES (147,132,58,'오시는 길','','오시는 길','page_UcGl66','N','N','N',NULL,NULL,NULL,NULL,-147,'20230117163106');
INSERT INTO `rx_menu_item` VALUES (160,0,159,'누리오','','누리오','http://nurioh.kr','Y','N','N',NULL,NULL,NULL,NULL,-160,'20230117174717');
INSERT INTO `rx_menu_item` VALUES (162,133,58,'담임목사','','담임목사','board_REiI25','N','N','N',NULL,NULL,NULL,'1,3',-164,'20230117193845');
INSERT INTO `rx_menu_item` VALUES (164,133,58,'찬양팀 게시판','','찬양팀 게시판','board_CMCf70','N','N','N',NULL,NULL,NULL,'1,130,3',-166,'20230117193930');
INSERT INTO `rx_menu_item` VALUES (166,133,58,'캘리그라피','','캘리그라피','board_xtmO59','N','N','N',NULL,NULL,NULL,NULL,-139,'20230117194059');
INSERT INTO `rx_menu_item` VALUES (167,114,49,'캘리그라피','','캘리그라피','board_xtmO59','Y','N','N',NULL,NULL,NULL,NULL,-167,'20230117194059');
INSERT INTO `rx_menu_item` VALUES (259,127,49,'홈페이지 회원 명단','','홈페이지 회원 명단','page_kpBO77','Y','N','N',NULL,NULL,NULL,NULL,-259,'20230118115947');
INSERT INTO `rx_menu_item` VALUES (261,132,58,'회원 명단','','회원 명단','page_kpBO77','N','N','N',NULL,NULL,NULL,NULL,-261,'20230118120617');
INSERT INTO `rx_menu_item` VALUES (269,132,58,'CONTACT','','CONTACT','page_TQNb00','N','N','N',NULL,NULL,NULL,NULL,-269,'20230118135820');
INSERT INTO `rx_menu_item` VALUES (281,114,49,'선교소식','','선교소식','#','Y','N','N',NULL,NULL,NULL,NULL,-281,'20230118213500');
/*!40000 ALTER TABLE `rx_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_menu_layout`
--

DROP TABLE IF EXISTS `rx_menu_layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_menu_layout` (
  `menu_srl` bigint(20) NOT NULL,
  `layout_srl` bigint(20) NOT NULL,
  PRIMARY KEY (`menu_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_menu_layout`
--

LOCK TABLES `rx_menu_layout` WRITE;
/*!40000 ALTER TABLE `rx_menu_layout` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_menu_layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_admins`
--

DROP TABLE IF EXISTS `rx_module_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_admins` (
  `module_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  UNIQUE KEY `unique_module_admin` (`module_srl`,`member_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_admins`
--

LOCK TABLES `rx_module_admins` WRITE;
/*!40000 ALTER TABLE `rx_module_admins` DISABLE KEYS */;
INSERT INTO `rx_module_admins` VALUES (134,169,'20230119103127');
INSERT INTO `rx_module_admins` VALUES (136,169,'20230119103152');
INSERT INTO `rx_module_admins` VALUES (165,172,'20230119103206');
/*!40000 ALTER TABLE `rx_module_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_categories`
--

DROP TABLE IF EXISTS `rx_module_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_categories` (
  `module_category_srl` bigint(20) NOT NULL DEFAULT 0,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`module_category_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_categories`
--

LOCK TABLES `rx_module_categories` WRITE;
/*!40000 ALTER TABLE `rx_module_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_module_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_config`
--

DROP TABLE IF EXISTS `rx_module_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_config` (
  `module` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `site_srl` bigint(20) NOT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_config`
--

LOCK TABLES `rx_module_config` WRITE;
/*!40000 ALTER TABLE `rx_module_config` DISABLE KEYS */;
INSERT INTO `rx_module_config` VALUES ('advanced_mailer',0,'O:8:\"stdClass\":10:{s:13:\"log_sent_mail\";b:1;s:10:\"log_errors\";b:1;s:12:\"log_sent_sms\";b:0;s:14:\"log_sms_errors\";b:0;s:13:\"log_sent_push\";b:0;s:15:\"log_push_errors\";b:0;s:11:\"sender_name\";s:28:\"푸른나무교회 관리자\";s:12:\"sender_email\";s:18:\"nuriohga@gmail.com\";s:12:\"force_sender\";b:0;s:8:\"reply_to\";s:18:\"nuriohga@gmail.com\";}','20230119124002');
INSERT INTO `rx_module_config` VALUES ('document',0,'O:8:\"stdClass\":3:{s:16:\"thumbnail_target\";s:3:\"all\";s:14:\"thumbnail_type\";s:4:\"fill\";s:17:\"thumbnail_quality\";i:75;}','20230117142351');
INSERT INTO `rx_module_config` VALUES ('file',0,'O:8:\"stdClass\":17:{s:16:\"allowed_filesize\";s:3:\"512\";s:19:\"allowed_attach_size\";s:3:\"512\";s:17:\"allowed_filetypes\";s:3:\"*.*\";s:14:\"image_autoconv\";a:4:{s:7:\"bmp2jpg\";b:1;s:7:\"png2jpg\";b:1;s:8:\"webp2jpg\";b:1;s:7:\"gif2mp4\";b:0;}s:15:\"max_image_width\";i:1000;s:16:\"max_image_height\";i:1000;s:21:\"max_image_size_action\";s:6:\"resize\";s:26:\"max_image_size_same_format\";s:1:\"N\";s:20:\"max_image_size_admin\";s:1:\"N\";s:24:\"image_quality_adjustment\";i:95;s:16:\"image_autorotate\";b:1;s:22:\"image_remove_exif_data\";b:0;s:15:\"video_thumbnail\";b:0;s:18:\"video_mp4_gif_time\";i:0;s:14:\"ffmpeg_command\";s:15:\"/usr/bin/ffmpeg\";s:15:\"ffprobe_command\";s:16:\"/usr/bin/ffprobe\";s:18:\"allowed_extensions\";a:0:{}}','20230117162728');
INSERT INTO `rx_module_config` VALUES ('member',0,'O:8:\"stdClass\":67:{s:10:\"identifier\";s:13:\"email_address\";s:10:\"signupForm\";a:13:{i:0;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:1;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:7:\"user_id\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:9:\"아이디\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:1;s:5:\"isUse\";b:1;s:8:\"isPublic\";s:1:\"Y\";}i:1;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:1;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:13:\"email_address\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:16:\"이메일 주소\";s:12:\"mustRequired\";b:1;s:9:\"imageType\";b:0;s:8:\"required\";b:1;s:5:\"isUse\";b:1;s:8:\"isPublic\";s:1:\"N\";}i:2;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:8:\"password\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:12:\"비밀번호\";s:12:\"mustRequired\";b:1;s:9:\"imageType\";b:0;s:8:\"required\";b:1;s:5:\"isUse\";b:1;s:8:\"isPublic\";s:1:\"N\";}i:3;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:9:\"user_name\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:6:\"이름\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:1;s:5:\"isUse\";b:1;s:8:\"isPublic\";s:1:\"Y\";}i:4;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:9:\"nick_name\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:9:\"닉네임\";s:12:\"mustRequired\";b:1;s:9:\"imageType\";b:0;s:8:\"required\";b:1;s:5:\"isUse\";b:1;s:8:\"isPublic\";s:1:\"Y\";}i:5;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:12:\"phone_number\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:12:\"전화번호\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";}i:6;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:8:\"homepage\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:12:\"홈페이지\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";}i:7;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:4:\"blog\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:9:\"블로그\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";}i:8;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:8:\"birthday\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:6:\"생일\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";}i:9;O:8:\"stdClass\":10:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:9:\"signature\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:6:\"서명\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:0;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";}i:10;O:8:\"stdClass\":14:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:13:\"profile_image\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:16:\"프로필 사진\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:1;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";s:9:\"max_width\";N;s:10:\"max_height\";N;s:12:\"max_filesize\";N;s:11:\"force_ratio\";s:1:\"Y\";}i:11;O:8:\"stdClass\":14:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:10:\"image_name\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:16:\"이미지 이름\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:1;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";s:9:\"max_width\";N;s:10:\"max_height\";N;s:12:\"max_filesize\";N;s:11:\"force_ratio\";s:1:\"Y\";}i:12;O:8:\"stdClass\":14:{s:12:\"isIdentifier\";b:0;s:13:\"isDefaultForm\";b:1;s:4:\"name\";s:10:\"image_mark\";s:13:\"isCustomTitle\";b:0;s:5:\"title\";s:16:\"이미지 마크\";s:12:\"mustRequired\";b:0;s:9:\"imageType\";b:1;s:8:\"required\";b:0;s:5:\"isUse\";b:0;s:8:\"isPublic\";s:1:\"N\";s:9:\"max_width\";N;s:10:\"max_height\";N;s:12:\"max_filesize\";N;s:11:\"force_ratio\";s:1:\"Y\";}}s:10:\"agreements\";a:5:{i:1;O:8:\"stdClass\":4:{s:5:\"title\";s:37:\"개인정보 수집 및 이용 동의\";s:7:\"content\";s:4152:\"<meta charset=\"UTF-8\"><script src=\"https://cdnjs.cloudflare.com/ajax/libs/antd/4.21.0/antd.min.js\" integrity=\"sha512-7qCI7Sj8uh4Xi/S3WpGrMdkWIlg2fZiUnUzJ2lXSgzrEH//c5lRJwVYJg9+RuuCEqeuOeHWSPZu8ek0S/QUDrw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>\r\n<link crossorigin=\"anonymous\" href=\"https://cdnjs.cloudflare.com/ajax/libs/antd/4.21.0/antd.min.css\" integrity=\"sha512-NoegHjPzYkB+efx/TZk4ky1PEaqqb8db3BLlEiS9imt/00XUdIrBMI2MWUn9aa/QIz2yyfUuVm5xJ2+UamoWYg==\" referrerpolicy=\"no-referrer\" rel=\"stylesheet\" />\r\n<div style=\"padding: 74px 56px 16px 56px;\">\r\n<div id=\"report\" style=\"display: flex; flex-direction: column;\">\r\n<h1 style=\"font-weight: 700; font-size: 24px; width: 100%; text-align: center;\">서비스 제공을 위한 개인정보 수집 및 이용 동의서</h1>\r\n<span style=\"display: flex; flex-direction: column; margin: 1rem;\"><span>푸른나무교회은(는) &quot;개인정보 보호법&quot;에 따라 아래와 같이 수집하는 개인정보의 항목, 수집 및 이용 목적, 보유 및 이용 기간을 안내드리고 동의를 받고자 합니다.</span></span>\r\n\r\n<div style=\"display: flex; flex-direction: column; justify-content: center; margin-top: 2rem;\">\r\n<h2 style=\"white-space: pre-line; display: flex; flex-direction: row; font-weight: 600; font-size: 16px; text-align: left;\"><span style=\"margin-top: 0.1rem; margin-right: 0.5rem;\">◾️</span><span>개인정보 수집&middot;이용 내역</span></h2>\r\n\r\n<div class=\"ant-table-wrapper\">\r\n<div class=\"ant-spin-nested-loading\">\r\n<div class=\"ant-spin-container\">\r\n<div class=\"ant-table\">\r\n<div class=\"ant-table-container\">\r\n<div class=\"ant-table-content\">\r\n<table style=\"table-layout: auto;\">\r\n	<colgroup>\r\n		<col style=\"width: 14%;\" />\r\n		<col style=\"width: 23%;\" />\r\n		<col style=\"width: 18%;\" />\r\n		<col style=\"width: 23%;\" />\r\n	</colgroup>\r\n	<thead class=\"ant-table-thead\">\r\n		<tr>\r\n			<th class=\"ant-table-cell\">\r\n			<div class=\"Table__StyledTableHeader-sc-utkcsp-5 czeiwa\">구분(업무명)</div>\r\n			</th>\r\n			<th class=\"ant-table-cell\">\r\n			<div class=\"Table__StyledTableHeader-sc-utkcsp-5 czeiwa\">처리 목적</div>\r\n			</th>\r\n			<th class=\"ant-table-cell\">\r\n			<div class=\"Table__StyledTableHeader-sc-utkcsp-5 czeiwa\">수집 항목</div>\r\n			</th>\r\n			<th class=\"ant-table-cell\">\r\n			<div class=\"Table__StyledTableHeader-sc-utkcsp-5 czeiwa\">보유 및 이용 기간</div>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody class=\"ant-table-tbody\">\r\n		<tr class=\"ant-table-row ant-table-row-level-0\" data-row-key=\"8a5872d4-baee-42b0-b7b2-0461f43b88e9\">\r\n			<td class=\"ant-table-cell\">회원가입 및 관리</td>\r\n			<td class=\"ant-table-cell\">\r\n			<ul class=\"Table__StyledList-sc-utkcsp-10 itlvjX\">\r\n				<li class=\"Table__StyledListItem-sc-utkcsp-11 gKAoSR\">회원자격 유지&middot;관리</li>\r\n			</ul>\r\n			</td>\r\n			<td class=\"ant-table-cell\">\r\n			<div style=\"display: flex; flex-direction: column;\"><span>필수 : <span>이름, 휴대전화번호, 이메일주소, 아이디, 비밀번호, 닉네임</span></span></div>\r\n			</td>\r\n			<td class=\"ant-table-cell\">\r\n			<ul class=\"Table__StyledList-sc-utkcsp-10 itlvjX\">\r\n				<li class=\"Table__StyledListItem-sc-utkcsp-11 gKAoSR\"><span style=\"font-weight: bold; text-decoration: underline;\">회원 탈퇴 시까지</span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<span style=\"white-space: pre-line; margin-top: 16px;\">정보주체는 위와 같이 개인정보를 처리하는 것에 대한 동의를 거부할 권리가 있습니다. 그러나 동의를 거부할 경우 &quot;로그인이 필요한 서비스 이용&quot;이 제한될 수 있습니다</span></div>\r\n<span style=\"white-space: pre-line; margin-top: 16px;\">위와 같이 개인정보를 제공하는데 동의합니다.</span>\r\n\r\n<div style=\"font-weight: 700; font-size: 20px; margin-top: 32px; text-align: center;\">푸른나무교회&nbsp;귀중</div>\r\n</div>\r\n</div>\r\n<script>\r\ndocument.getElementById(\"prev-list\").addEventListener(\"change\", function(e) {\r\n    if (e.target.value !== \'none\') {\r\n        window.open(e.target.value, \"_blank\");\r\n    }\r\n});\r\n</script>\";s:10:\"use_editor\";N;s:4:\"type\";s:8:\"required\";}i:2;O:8:\"stdClass\":4:{s:5:\"title\";s:0:\"\";s:7:\"content\";N;s:10:\"use_editor\";N;s:4:\"type\";s:8:\"disabled\";}i:3;O:8:\"stdClass\":4:{s:5:\"title\";s:0:\"\";s:7:\"content\";N;s:10:\"use_editor\";N;s:4:\"type\";s:8:\"disabled\";}i:4;O:8:\"stdClass\":4:{s:5:\"title\";s:0:\"\";s:7:\"content\";N;s:10:\"use_editor\";N;s:4:\"type\";s:8:\"disabled\";}i:5;O:8:\"stdClass\":4:{s:5:\"title\";s:0:\"\";s:7:\"content\";N;s:10:\"use_editor\";N;s:4:\"type\";s:8:\"disabled\";}}s:11:\"enable_join\";s:1:\"Y\";s:14:\"enable_confirm\";s:1:\"N\";s:16:\"authmail_expires\";i:1;s:21:\"authmail_expires_unit\";i:86400;s:19:\"member_profile_view\";s:1:\"N\";s:19:\"update_nickname_log\";s:1:\"N\";s:16:\"nickname_symbols\";s:1:\"Y\";s:29:\"nickname_symbols_allowed_list\";s:0:\"\";s:17:\"password_strength\";s:4:\"high\";s:26:\"password_hashing_algorithm\";s:6:\"bcrypt\";s:28:\"password_hashing_work_factor\";i:10;s:29:\"password_hashing_auto_upgrade\";s:1:\"Y\";s:41:\"password_change_invalidate_other_sessions\";s:1:\"N\";s:8:\"features\";a:6:{s:18:\"scrapped_documents\";b:1;s:15:\"saved_documents\";b:1;s:12:\"my_documents\";b:1;s:11:\"my_comments\";b:1;s:13:\"active_logins\";b:1;s:12:\"nickname_log\";b:1;}s:9:\"limit_day\";i:0;s:15:\"emailhost_check\";s:7:\"allowed\";s:20:\"special_phone_number\";s:0:\"\";s:18:\"special_phone_code\";s:0:\"\";s:12:\"redirect_mid\";N;s:12:\"redirect_url\";N;s:28:\"phone_number_default_country\";s:3:\"KOR\";s:25:\"phone_number_hide_country\";s:1:\"N\";s:28:\"phone_number_allow_duplicate\";s:1:\"N\";s:26:\"phone_number_verify_by_sms\";s:1:\"N\";s:21:\"signature_editor_skin\";s:8:\"ckeditor\";s:19:\"sel_editor_colorset\";s:10:\"moono-lisa\";s:9:\"signature\";s:1:\"N\";s:14:\"signature_html\";s:1:\"Y\";s:23:\"signature_html_retroact\";s:1:\"N\";s:23:\"member_allow_fileupload\";s:1:\"N\";s:13:\"profile_image\";s:1:\"N\";s:23:\"profile_image_max_width\";i:90;s:24:\"profile_image_max_height\";i:90;s:26:\"profile_image_max_filesize\";N;s:10:\"image_name\";s:1:\"N\";s:20:\"image_name_max_width\";i:90;s:21:\"image_name_max_height\";i:20;s:23:\"image_name_max_filesize\";N;s:10:\"image_mark\";s:1:\"N\";s:20:\"image_mark_max_width\";i:20;s:21:\"image_mark_max_height\";i:20;s:23:\"image_mark_max_filesize\";N;s:11:\"identifiers\";a:2:{i:0;s:7:\"user_id\";i:1;s:13:\"email_address\";}s:20:\"change_password_date\";i:0;s:24:\"enable_login_fail_report\";s:1:\"Y\";s:15:\"max_error_count\";i:10;s:20:\"max_error_count_time\";i:300;s:31:\"login_invalidate_other_sessions\";s:1:\"N\";s:15:\"after_login_url\";N;s:16:\"after_logout_url\";N;s:10:\"layout_srl\";i:0;s:4:\"skin\";s:7:\"default\";s:8:\"colorset\";s:5:\"white\";s:11:\"mlayout_srl\";i:0;s:5:\"mskin\";s:7:\"default\";s:16:\"group_image_mark\";s:1:\"N\";s:21:\"limit_day_description\";s:0:\"\";s:18:\"max_auth_sms_count\";i:5;s:23:\"max_auth_sms_count_time\";i:600;s:25:\"profile_image_force_ratio\";s:1:\"Y\";s:15:\"enable_join_key\";N;s:24:\"allow_duplicate_nickname\";s:1:\"N\";s:14:\"webmaster_name\";s:28:\"푸른나무교회 관리자\";s:15:\"webmaster_email\";s:18:\"nuriohga@gmail.com\";}','20230119124002');
INSERT INTO `rx_module_config` VALUES ('point',0,'O:8:\"stdClass\":20:{s:11:\"able_module\";s:1:\"N\";s:10:\"point_name\";s:5:\"point\";s:10:\"level_icon\";s:7:\"default\";s:21:\"disable_read_document\";s:1:\"N\";s:16:\"disable_download\";s:1:\"N\";s:11:\"group_reset\";s:1:\"Y\";s:13:\"group_ratchet\";s:1:\"N\";s:9:\"max_level\";i:30;s:10:\"level_step\";a:30:{i:1;i:90;i:2;i:360;i:3;i:810;i:4;i:1440;i:5;i:2250;i:6;i:3240;i:7;i:4410;i:8;i:5760;i:9;i:7290;i:10;i:9000;i:11;i:10890;i:12;i:12960;i:13;i:15210;i:14;i:17640;i:15;i:20250;i:16;i:23040;i:17;i:26010;i:18;i:29160;i:19;i:32490;i:20;i:36000;i:21;i:39690;i:22;i:43560;i:23;i:47610;i:24;i:51840;i:25;i:56250;i:26;i:60840;i:27;i:65610;i:28;i:70560;i:29;i:75690;i:30;i:81000;}s:12:\"signup_point\";i:10;s:11:\"login_point\";i:5;s:15:\"insert_document\";i:10;s:14:\"insert_comment\";i:5;s:11:\"upload_file\";i:5;s:13:\"download_file\";i:-5;s:13:\"read_document\";i:0;s:5:\"voted\";i:0;s:6:\"blamed\";i:0;s:13:\"voted_comment\";i:0;s:14:\"blamed_comment\";i:0;}','20230117022724');
INSERT INTO `rx_module_config` VALUES ('poll',0,'O:8:\"stdClass\":2:{s:4:\"skin\";s:7:\"default\";s:8:\"colorset\";s:6:\"normal\";}','20230117022724');
INSERT INTO `rx_module_config` VALUES ('spamfilter',0,'O:8:\"stdClass\":1:{s:7:\"captcha\";O:8:\"stdClass\":1:{s:4:\"type\";s:4:\"none\";}}','20230117022724');
/*!40000 ALTER TABLE `rx_module_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_extend`
--

DROP TABLE IF EXISTS `rx_module_extend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_extend` (
  `parent_module` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extend_module` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_extend`
--

LOCK TABLES `rx_module_extend` WRITE;
/*!40000 ALTER TABLE `rx_module_extend` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_module_extend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_extra_vars`
--

DROP TABLE IF EXISTS `rx_module_extra_vars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_extra_vars` (
  `module_srl` bigint(20) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `unique_module_vars` (`module_srl`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_extra_vars`
--

LOCK TABLES `rx_module_extra_vars` WRITE;
/*!40000 ALTER TABLE `rx_module_extra_vars` DISABLE KEYS */;
INSERT INTO `rx_module_extra_vars` VALUES (62,'page_type','ARTICLE');
INSERT INTO `rx_module_extra_vars` VALUES (62,'regdate','20230117022724');
INSERT INTO `rx_module_extra_vars` VALUES (64,'page_type','ARTICLE');
INSERT INTO `rx_module_extra_vars` VALUES (64,'regdate','20230117022724');
INSERT INTO `rx_module_extra_vars` VALUES (124,'page_type','WIDGET');
INSERT INTO `rx_module_extra_vars` VALUES (124,'regdate','20230117150416');
INSERT INTO `rx_module_extra_vars` VALUES (134,'anonymous_except_admin','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'anonymous_name','anonymous');
INSERT INTO `rx_module_extra_vars` VALUES (134,'cancel_vote','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'comment_delete_message','no');
INSERT INTO `rx_module_extra_vars` VALUES (134,'comment_length_limit','128');
INSERT INTO `rx_module_extra_vars` VALUES (134,'consultation','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'document_length_limit','1024');
INSERT INTO `rx_module_extra_vars` VALUES (134,'except_notice','Y');
INSERT INTO `rx_module_extra_vars` VALUES (134,'filter_specialchars','Y');
INSERT INTO `rx_module_extra_vars` VALUES (134,'list','no,title,regdate,readed_count');
INSERT INTO `rx_module_extra_vars` VALUES (134,'list_count','12');
INSERT INTO `rx_module_extra_vars` VALUES (134,'mobile_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (134,'mobile_page_count','5');
INSERT INTO `rx_module_extra_vars` VALUES (134,'mobile_search_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (134,'non_login_vote','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'order_target','date');
INSERT INTO `rx_module_extra_vars` VALUES (134,'order_type','desc');
INSERT INTO `rx_module_extra_vars` VALUES (134,'page_count','10');
INSERT INTO `rx_module_extra_vars` VALUES (134,'protect_admin_content_delete','Y');
INSERT INTO `rx_module_extra_vars` VALUES (134,'protect_admin_content_update','Y');
INSERT INTO `rx_module_extra_vars` VALUES (134,'protect_content','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'search_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (134,'skip_bottom_list_days','30');
INSERT INTO `rx_module_extra_vars` VALUES (134,'skip_bottom_list_for_olddoc','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'skip_bottom_list_for_robot','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'trash_use','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'update_order_on_comment','Y');
INSERT INTO `rx_module_extra_vars` VALUES (134,'use_anonymous','N');
INSERT INTO `rx_module_extra_vars` VALUES (134,'use_bottom_list','Y');
INSERT INTO `rx_module_extra_vars` VALUES (134,'use_status','PUBLIC');
INSERT INTO `rx_module_extra_vars` VALUES (136,'anonymous_except_admin','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'anonymous_name','anonymous');
INSERT INTO `rx_module_extra_vars` VALUES (136,'cancel_vote','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'comment_delete_message','no');
INSERT INTO `rx_module_extra_vars` VALUES (136,'comment_length_limit','128');
INSERT INTO `rx_module_extra_vars` VALUES (136,'consultation','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'document_length_limit','1024');
INSERT INTO `rx_module_extra_vars` VALUES (136,'except_notice','Y');
INSERT INTO `rx_module_extra_vars` VALUES (136,'filter_specialchars','Y');
INSERT INTO `rx_module_extra_vars` VALUES (136,'list','no,title,regdate,readed_count');
INSERT INTO `rx_module_extra_vars` VALUES (136,'list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (136,'mobile_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (136,'mobile_page_count','5');
INSERT INTO `rx_module_extra_vars` VALUES (136,'mobile_search_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (136,'non_login_vote','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'order_target','list_order');
INSERT INTO `rx_module_extra_vars` VALUES (136,'order_type','asc');
INSERT INTO `rx_module_extra_vars` VALUES (136,'page_count','10');
INSERT INTO `rx_module_extra_vars` VALUES (136,'protect_admin_content_delete','Y');
INSERT INTO `rx_module_extra_vars` VALUES (136,'protect_admin_content_update','Y');
INSERT INTO `rx_module_extra_vars` VALUES (136,'protect_content','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'search_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (136,'skip_bottom_list_days','30');
INSERT INTO `rx_module_extra_vars` VALUES (136,'skip_bottom_list_for_olddoc','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'skip_bottom_list_for_robot','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'trash_use','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'update_order_on_comment','Y');
INSERT INTO `rx_module_extra_vars` VALUES (136,'use_anonymous','N');
INSERT INTO `rx_module_extra_vars` VALUES (136,'use_bottom_list','Y');
INSERT INTO `rx_module_extra_vars` VALUES (136,'use_status','PUBLIC');
INSERT INTO `rx_module_extra_vars` VALUES (138,'anonymous_except_admin','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'anonymous_name','anonymous');
INSERT INTO `rx_module_extra_vars` VALUES (138,'cancel_vote','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'comment_delete_message','no');
INSERT INTO `rx_module_extra_vars` VALUES (138,'comment_length_limit','128');
INSERT INTO `rx_module_extra_vars` VALUES (138,'consultation','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'document_length_limit','1024');
INSERT INTO `rx_module_extra_vars` VALUES (138,'except_notice','Y');
INSERT INTO `rx_module_extra_vars` VALUES (138,'filter_specialchars','Y');
INSERT INTO `rx_module_extra_vars` VALUES (138,'list','no,title,extra_vars2,extra_vars1');
INSERT INTO `rx_module_extra_vars` VALUES (138,'list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (138,'mobile_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (138,'mobile_page_count','5');
INSERT INTO `rx_module_extra_vars` VALUES (138,'mobile_search_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (138,'non_login_vote','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'order_target','date');
INSERT INTO `rx_module_extra_vars` VALUES (138,'order_type','desc');
INSERT INTO `rx_module_extra_vars` VALUES (138,'page_count','10');
INSERT INTO `rx_module_extra_vars` VALUES (138,'protect_admin_content_delete','Y');
INSERT INTO `rx_module_extra_vars` VALUES (138,'protect_admin_content_update','Y');
INSERT INTO `rx_module_extra_vars` VALUES (138,'protect_content','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'search_list_count','20');
INSERT INTO `rx_module_extra_vars` VALUES (138,'skip_bottom_list_days','30');
INSERT INTO `rx_module_extra_vars` VALUES (138,'skip_bottom_list_for_olddoc','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'skip_bottom_list_for_robot','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'trash_use','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'update_order_on_comment','Y');
INSERT INTO `rx_module_extra_vars` VALUES (138,'use_anonymous','N');
INSERT INTO `rx_module_extra_vars` VALUES (138,'use_bottom_list','Y');
INSERT INTO `rx_module_extra_vars` VALUES (138,'use_status','PUBLIC');
INSERT INTO `rx_module_extra_vars` VALUES (140,'page_type','WIDGET');
INSERT INTO `rx_module_extra_vars` VALUES (140,'regdate','20230117162954');
INSERT INTO `rx_module_extra_vars` VALUES (142,'page_type','WIDGET');
INSERT INTO `rx_module_extra_vars` VALUES (142,'regdate','20230117163027');
INSERT INTO `rx_module_extra_vars` VALUES (144,'page_type','WIDGET');
INSERT INTO `rx_module_extra_vars` VALUES (144,'regdate','20230117163046');
INSERT INTO `rx_module_extra_vars` VALUES (146,'page_type','WIDGET');
INSERT INTO `rx_module_extra_vars` VALUES (146,'regdate','20230117163106');
INSERT INTO `rx_module_extra_vars` VALUES (161,'regdate','20230117193845');
INSERT INTO `rx_module_extra_vars` VALUES (163,'regdate','20230117193930');
INSERT INTO `rx_module_extra_vars` VALUES (165,'regdate','20230117194059');
INSERT INTO `rx_module_extra_vars` VALUES (260,'page_type','WIDGET');
INSERT INTO `rx_module_extra_vars` VALUES (260,'regdate','20230118120617');
INSERT INTO `rx_module_extra_vars` VALUES (268,'page_type','ARTICLE');
INSERT INTO `rx_module_extra_vars` VALUES (268,'regdate','20230118135820');
/*!40000 ALTER TABLE `rx_module_extra_vars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_filebox`
--

DROP TABLE IF EXISTS `rx_module_filebox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_filebox` (
  `module_filebox_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `filename` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileextension` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filesize` bigint(20) NOT NULL DEFAULT 0,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`module_filebox_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_fileextension` (`fileextension`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_filebox`
--

LOCK TABLES `rx_module_filebox` WRITE;
/*!40000 ALTER TABLE `rx_module_filebox` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_module_filebox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_grants`
--

DROP TABLE IF EXISTS `rx_module_grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_grants` (
  `module_srl` bigint(20) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_srl` bigint(20) NOT NULL,
  UNIQUE KEY `unique_module` (`module_srl`,`name`,`group_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_grants`
--

LOCK TABLES `rx_module_grants` WRITE;
/*!40000 ALTER TABLE `rx_module_grants` DISABLE KEYS */;
INSERT INTO `rx_module_grants` VALUES (134,'access',0);
INSERT INTO `rx_module_grants` VALUES (134,'consultation_read',-3);
INSERT INTO `rx_module_grants` VALUES (134,'list',0);
INSERT INTO `rx_module_grants` VALUES (134,'manager',-3);
INSERT INTO `rx_module_grants` VALUES (134,'update_view',0);
INSERT INTO `rx_module_grants` VALUES (134,'view',0);
INSERT INTO `rx_module_grants` VALUES (134,'vote_log_view',0);
INSERT INTO `rx_module_grants` VALUES (134,'write_comment',0);
INSERT INTO `rx_module_grants` VALUES (134,'write_document',0);
INSERT INTO `rx_module_grants` VALUES (136,'access',0);
INSERT INTO `rx_module_grants` VALUES (136,'consultation_read',-3);
INSERT INTO `rx_module_grants` VALUES (136,'list',0);
INSERT INTO `rx_module_grants` VALUES (136,'manager',-3);
INSERT INTO `rx_module_grants` VALUES (136,'update_view',0);
INSERT INTO `rx_module_grants` VALUES (136,'view',0);
INSERT INTO `rx_module_grants` VALUES (136,'vote_log_view',0);
INSERT INTO `rx_module_grants` VALUES (136,'write_comment',0);
INSERT INTO `rx_module_grants` VALUES (136,'write_document',0);
INSERT INTO `rx_module_grants` VALUES (161,'access',1);
INSERT INTO `rx_module_grants` VALUES (161,'access',3);
INSERT INTO `rx_module_grants` VALUES (161,'consultation_read',-3);
INSERT INTO `rx_module_grants` VALUES (161,'manager',-3);
INSERT INTO `rx_module_grants` VALUES (163,'access',1);
INSERT INTO `rx_module_grants` VALUES (163,'access',3);
INSERT INTO `rx_module_grants` VALUES (163,'access',130);
INSERT INTO `rx_module_grants` VALUES (163,'consultation_read',-3);
INSERT INTO `rx_module_grants` VALUES (163,'manager',-3);
INSERT INTO `rx_module_grants` VALUES (165,'access',0);
INSERT INTO `rx_module_grants` VALUES (165,'consultation_read',-3);
INSERT INTO `rx_module_grants` VALUES (165,'list',0);
INSERT INTO `rx_module_grants` VALUES (165,'manager',-3);
INSERT INTO `rx_module_grants` VALUES (165,'update_view',0);
INSERT INTO `rx_module_grants` VALUES (165,'view',0);
INSERT INTO `rx_module_grants` VALUES (165,'vote_log_view',0);
INSERT INTO `rx_module_grants` VALUES (165,'write_comment',0);
INSERT INTO `rx_module_grants` VALUES (165,'write_document',0);
/*!40000 ALTER TABLE `rx_module_grants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_locks`
--

DROP TABLE IF EXISTS `rx_module_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_locks` (
  `lock_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `member_srl` bigint(20) DEFAULT NULL,
  UNIQUE KEY `unique_lock_name` (`lock_name`),
  KEY `idx_deadline` (`deadline`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_locks`
--

LOCK TABLES `rx_module_locks` WRITE;
/*!40000 ALTER TABLE `rx_module_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_module_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_mobile_skins`
--

DROP TABLE IF EXISTS `rx_module_mobile_skins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_mobile_skins` (
  `module_srl` bigint(20) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `unique_module_mobile_skins` (`module_srl`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_mobile_skins`
--

LOCK TABLES `rx_module_mobile_skins` WRITE;
/*!40000 ALTER TABLE `rx_module_mobile_skins` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_module_mobile_skins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_part_config`
--

DROP TABLE IF EXISTS `rx_module_part_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_part_config` (
  `module` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `module_srl` bigint(20) NOT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  UNIQUE KEY `unique_module_part_config` (`module`,`module_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_part_config`
--

LOCK TABLES `rx_module_part_config` WRITE;
/*!40000 ALTER TABLE `rx_module_part_config` DISABLE KEYS */;
INSERT INTO `rx_module_part_config` VALUES ('board',134,'a:4:{i:0;s:2:\"no\";i:1;s:5:\"title\";i:2;s:7:\"regdate\";i:3;s:12:\"readed_count\";}','20230119103059');
INSERT INTO `rx_module_part_config` VALUES ('board',136,'a:4:{i:0;s:2:\"no\";i:1;s:5:\"title\";i:2;s:7:\"regdate\";i:3;s:12:\"readed_count\";}','20230119103146');
INSERT INTO `rx_module_part_config` VALUES ('board',138,'a:4:{i:0;s:2:\"no\";i:1;s:5:\"title\";i:2;s:1:\"2\";i:3;s:1:\"1\";}','20230123151539');
INSERT INTO `rx_module_part_config` VALUES ('layout',110,'O:8:\"stdClass\":1:{s:13:\"header_script\";N;}','20230117150219');
INSERT INTO `rx_module_part_config` VALUES ('layout',126,'O:8:\"stdClass\":1:{s:13:\"header_script\";N;}','20230118174135');
INSERT INTO `rx_module_part_config` VALUES ('layout',148,'O:8:\"stdClass\":1:{s:13:\"header_script\";N;}','20230117170220');
INSERT INTO `rx_module_part_config` VALUES ('layout',168,'O:8:\"stdClass\":1:{s:13:\"header_script\";N;}','20230117194839');
/*!40000 ALTER TABLE `rx_module_part_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_skins`
--

DROP TABLE IF EXISTS `rx_module_skins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_skins` (
  `module_srl` bigint(20) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `unique_module_skins` (`module_srl`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_skins`
--

LOCK TABLES `rx_module_skins` WRITE;
/*!40000 ALTER TABLE `rx_module_skins` DISABLE KEYS */;
INSERT INTO `rx_module_skins` VALUES (134,'color','333333');
INSERT INTO `rx_module_skins` VALUES (134,'colorset','white');
INSERT INTO `rx_module_skins` VALUES (134,'default_style','gallery');
INSERT INTO `rx_module_skins` VALUES (134,'duration_new','12');
INSERT INTO `rx_module_skins` VALUES (134,'gall_ribbon','N');
INSERT INTO `rx_module_skins` VALUES (134,'rd_cate','N');
INSERT INTO `rx_module_skins` VALUES (134,'rd_cmt','N');
INSERT INTO `rx_module_skins` VALUES (134,'rd_date','N');
INSERT INTO `rx_module_skins` VALUES (134,'rd_nick','N');
INSERT INTO `rx_module_skins` VALUES (134,'rd_view','N');
INSERT INTO `rx_module_skins` VALUES (134,'rd_vote','N');
INSERT INTO `rx_module_skins` VALUES (134,'thumbnail_height','150');
INSERT INTO `rx_module_skins` VALUES (134,'thumbnail_width','235');
INSERT INTO `rx_module_skins` VALUES (134,'trans_window','N');
INSERT INTO `rx_module_skins` VALUES (134,'zine_ribbon','N');
INSERT INTO `rx_module_skins` VALUES (136,'color','333333');
INSERT INTO `rx_module_skins` VALUES (136,'default_style','list');
INSERT INTO `rx_module_skins` VALUES (136,'display_sign','N');
INSERT INTO `rx_module_skins` VALUES (136,'duration_new','12');
INSERT INTO `rx_module_skins` VALUES (136,'rd_cate','N');
INSERT INTO `rx_module_skins` VALUES (136,'rd_date','N');
INSERT INTO `rx_module_skins` VALUES (136,'rd_nav','N');
INSERT INTO `rx_module_skins` VALUES (136,'rd_nick','N');
INSERT INTO `rx_module_skins` VALUES (138,'color','333333');
INSERT INTO `rx_module_skins` VALUES (138,'default_style','list');
INSERT INTO `rx_module_skins` VALUES (138,'display_sign','N');
INSERT INTO `rx_module_skins` VALUES (138,'duration_new','12');
INSERT INTO `rx_module_skins` VALUES (138,'rd_cate','N');
INSERT INTO `rx_module_skins` VALUES (138,'rd_cmt','N');
INSERT INTO `rx_module_skins` VALUES (138,'rd_date','N');
INSERT INTO `rx_module_skins` VALUES (138,'rd_nav','N');
INSERT INTO `rx_module_skins` VALUES (138,'rd_nick','N');
INSERT INTO `rx_module_skins` VALUES (138,'rd_view','N');
INSERT INTO `rx_module_skins` VALUES (138,'rd_vote','N');
INSERT INTO `rx_module_skins` VALUES (138,'votes','N');
/*!40000 ALTER TABLE `rx_module_skins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_trigger`
--

DROP TABLE IF EXISTS `rx_module_trigger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_trigger` (
  `trigger_name` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `called_position` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `module` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `type` varchar(120) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `called_method` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  KEY `idx_trigger_name` (`trigger_name`,`called_position`),
  KEY `idx_trigger_target` (`module`,`type`,`called_method`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_trigger`
--

LOCK TABLES `rx_module_trigger` WRITE;
/*!40000 ALTER TABLE `rx_module_trigger` DISABLE KEYS */;
INSERT INTO `rx_module_trigger` VALUES ('document.deleteDocument','after','comment','controller','triggerDeleteDocumentComments');
INSERT INTO `rx_module_trigger` VALUES ('module.deleteModule','after','comment','controller','triggerDeleteModuleComments');
INSERT INTO `rx_module_trigger` VALUES ('module.dispAdditionSetup','before','comment','view','triggerDispCommentAdditionSetup');
INSERT INTO `rx_module_trigger` VALUES ('module.procModuleAdminCopyModule','after','comment','controller','triggerCopyModule');
INSERT INTO `rx_module_trigger` VALUES ('document.moveDocumentModule','after','comment','controller','triggerMoveDocument');
INSERT INTO `rx_module_trigger` VALUES ('document.copyDocumentModule','add','comment','controller','triggerAddCopyDocument');
INSERT INTO `rx_module_trigger` VALUES ('module.deleteModule','after','document','controller','triggerDeleteModuleDocuments');
INSERT INTO `rx_module_trigger` VALUES ('module.dispAdditionSetup','before','document','view','triggerDispDocumentAdditionSetup');
INSERT INTO `rx_module_trigger` VALUES ('module.procModuleAdminCopyModule','after','document','controller','triggerCopyModuleExtraKeys');
INSERT INTO `rx_module_trigger` VALUES ('module.procModuleAdminCopyModule','after','document','controller','triggerCopyModule');
INSERT INTO `rx_module_trigger` VALUES ('file.deleteFile','after','document','controller','triggerAfterDeleteFile');
INSERT INTO `rx_module_trigger` VALUES ('document.deleteDocument','after','file','controller','triggerDeleteAttached');
INSERT INTO `rx_module_trigger` VALUES ('comment.deleteComment','after','file','controller','triggerCommentDeleteAttached');
INSERT INTO `rx_module_trigger` VALUES ('editor.deleteSavedDoc','after','file','controller','triggerDeleteAttached');
INSERT INTO `rx_module_trigger` VALUES ('module.deleteModule','after','file','controller','triggerDeleteModuleFiles');
INSERT INTO `rx_module_trigger` VALUES ('module.dispAdditionSetup','before','file','view','triggerDispFileAdditionSetup');
INSERT INTO `rx_module_trigger` VALUES ('module.procModuleAdminCopyModule','after','file','controller','triggerCopyModule');
INSERT INTO `rx_module_trigger` VALUES ('document.moveDocumentModule','after','file','controller','triggerMoveDocument');
INSERT INTO `rx_module_trigger` VALUES ('document.copyDocumentModule','add','file','controller','triggerAddCopyDocument');
INSERT INTO `rx_module_trigger` VALUES ('comment.copyCommentByDocument','add','file','controller','triggerAddCopyCommentByDocument');
INSERT INTO `rx_module_trigger` VALUES ('document.insertDocument','after','poll','controller','triggerInsertDocumentPoll');
INSERT INTO `rx_module_trigger` VALUES ('comment.insertComment','after','poll','controller','triggerInsertCommentPoll');
INSERT INTO `rx_module_trigger` VALUES ('document.updateDocument','after','poll','controller','triggerUpdateDocumentPoll');
INSERT INTO `rx_module_trigger` VALUES ('comment.updateComment','after','poll','controller','triggerUpdateCommentPoll');
INSERT INTO `rx_module_trigger` VALUES ('document.deleteDocument','after','poll','controller','triggerDeleteDocumentPoll');
INSERT INTO `rx_module_trigger` VALUES ('comment.deleteComment','after','poll','controller','triggerDeleteCommentPoll');
INSERT INTO `rx_module_trigger` VALUES ('document.insertDocument','before','tag','controller','triggerArrangeTag');
INSERT INTO `rx_module_trigger` VALUES ('document.insertDocument','after','tag','controller','triggerInsertTag');
INSERT INTO `rx_module_trigger` VALUES ('document.updateDocument','before','tag','controller','triggerArrangeTag');
INSERT INTO `rx_module_trigger` VALUES ('document.updateDocument','after','tag','controller','triggerInsertTag');
INSERT INTO `rx_module_trigger` VALUES ('document.deleteDocument','after','tag','controller','triggerDeleteTag');
INSERT INTO `rx_module_trigger` VALUES ('module.deleteModule','after','tag','controller','triggerDeleteModuleTags');
INSERT INTO `rx_module_trigger` VALUES ('document.moveDocumentModule','after','tag','controller','triggerMoveDocument');
INSERT INTO `rx_module_trigger` VALUES ('moduleHandler.init','before','communication','controller','triggerModuleHandlerBefore');
INSERT INTO `rx_module_trigger` VALUES ('member.getMemberMenu','before','communication','controller','triggerMemberMenu');
INSERT INTO `rx_module_trigger` VALUES ('document.getDocumentMenu','after','member','controller','triggerGetDocumentMenu');
INSERT INTO `rx_module_trigger` VALUES ('comment.getCommentMenu','after','member','controller','triggerGetCommentMenu');
INSERT INTO `rx_module_trigger` VALUES ('document.insertDocument','after','editor','controller','triggerDeleteSavedDoc');
INSERT INTO `rx_module_trigger` VALUES ('document.updateDocument','after','editor','controller','triggerDeleteSavedDoc');
INSERT INTO `rx_module_trigger` VALUES ('module.dispAdditionSetup','before','editor','view','triggerDispEditorAdditionSetup');
INSERT INTO `rx_module_trigger` VALUES ('display','before','editor','controller','triggerEditorComponentCompile');
INSERT INTO `rx_module_trigger` VALUES ('module.procModuleAdminCopyModule','after','editor','controller','triggerCopyModule');
INSERT INTO `rx_module_trigger` VALUES ('moduleHandler.proc','after','rss','controller','triggerRssUrlInsert');
INSERT INTO `rx_module_trigger` VALUES ('module.dispAdditionSetup','before','rss','view','triggerDispRssAdditionSetup');
INSERT INTO `rx_module_trigger` VALUES ('module.procModuleAdminCopyModule','after','rss','controller','triggerCopyModule');
INSERT INTO `rx_module_trigger` VALUES ('mail.send','before','advanced_mailer','controller','triggerBeforeMailSend');
INSERT INTO `rx_module_trigger` VALUES ('mail.send','after','advanced_mailer','controller','triggerAfterMailSend');
INSERT INTO `rx_module_trigger` VALUES ('sms.send','after','advanced_mailer','controller','triggerAfterSMSSend');
INSERT INTO `rx_module_trigger` VALUES ('push.send','after','advanced_mailer','controller','triggerAfterPushSend');
INSERT INTO `rx_module_trigger` VALUES ('member.getMemberMenu','after','board','controller','triggerMemberMenu');
INSERT INTO `rx_module_trigger` VALUES ('menu.getModuleListInSitemap','after','board','model','triggerModuleListInSitemap');
INSERT INTO `rx_module_trigger` VALUES ('comment.insertComment','after','ncenterlite','controller','triggerAfterInsertComment');
INSERT INTO `rx_module_trigger` VALUES ('comment.deleteComment','after','ncenterlite','controller','triggerAfterDeleteComment');
INSERT INTO `rx_module_trigger` VALUES ('document.insertDocument','after','ncenterlite','controller','triggerAfterInsertDocument');
INSERT INTO `rx_module_trigger` VALUES ('document.deleteDocument','after','ncenterlite','controller','triggerAfterDeleteDocument');
INSERT INTO `rx_module_trigger` VALUES ('display','before','ncenterlite','controller','triggerBeforeDisplay');
INSERT INTO `rx_module_trigger` VALUES ('moduleHandler.proc','after','ncenterlite','controller','triggerAfterModuleHandlerProc');
INSERT INTO `rx_module_trigger` VALUES ('member.deleteMember','after','ncenterlite','controller','triggerAfterDeleteMember');
INSERT INTO `rx_module_trigger` VALUES ('communication.sendMessage','after','ncenterlite','controller','triggerAfterSendMessage');
INSERT INTO `rx_module_trigger` VALUES ('document.updateVotedCount','after','ncenterlite','controller','triggerAfterDocumentVotedUpdate');
INSERT INTO `rx_module_trigger` VALUES ('document.updateVotedCountCancel','after','ncenterlite','controller','triggerAfterDocumentVotedCancel');
INSERT INTO `rx_module_trigger` VALUES ('member.procMemberScrapDocument','after','ncenterlite','controller','triggerAfterScrap');
INSERT INTO `rx_module_trigger` VALUES ('moduleHandler.init','after','ncenterlite','controller','triggerAddMemberMenu');
INSERT INTO `rx_module_trigger` VALUES ('document.moveDocumentToTrash','after','ncenterlite','controller','triggerAfterMoveToTrash');
INSERT INTO `rx_module_trigger` VALUES ('comment.updateVotedCount','after','ncenterlite','controller','triggerAfterCommentVotedCount');
INSERT INTO `rx_module_trigger` VALUES ('comment.updateVotedCountCancel','after','ncenterlite','controller','triggerAfterCommentVotedCancel');
INSERT INTO `rx_module_trigger` VALUES ('document.getDocumentMenu','after','ncenterlite','controller','triggerGetDocumentMenu');
INSERT INTO `rx_module_trigger` VALUES ('comment.getCommentMenu','after','ncenterlite','controller','triggerGetCommentMenu');
INSERT INTO `rx_module_trigger` VALUES ('display','before','widget','controller','triggerWidgetCompile');
INSERT INTO `rx_module_trigger` VALUES ('document.insertDocument','before','spamfilter','controller','triggerInsertDocument');
INSERT INTO `rx_module_trigger` VALUES ('document.updateDocument','before','spamfilter','controller','triggerInsertDocument');
INSERT INTO `rx_module_trigger` VALUES ('document.manage','before','spamfilter','controller','triggerManageDocument');
INSERT INTO `rx_module_trigger` VALUES ('comment.insertComment','before','spamfilter','controller','triggerInsertComment');
INSERT INTO `rx_module_trigger` VALUES ('comment.updateComment','before','spamfilter','controller','triggerInsertComment');
INSERT INTO `rx_module_trigger` VALUES ('communication.sendMessage','before','spamfilter','controller','triggerSendMessage');
INSERT INTO `rx_module_trigger` VALUES ('moduleObject.proc','before','spamfilter','controller','triggerCheckCaptcha');
/*!40000 ALTER TABLE `rx_module_trigger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_module_update`
--

DROP TABLE IF EXISTS `rx_module_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_module_update` (
  `update_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_module_update`
--

LOCK TABLES `rx_module_update` WRITE;
/*!40000 ALTER TABLE `rx_module_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_module_update` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_modules`
--

DROP TABLE IF EXISTS `rx_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_modules` (
  `module_srl` bigint(20) NOT NULL,
  `module` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_category_srl` bigint(20) DEFAULT 0,
  `menu_srl` bigint(20) DEFAULT 0,
  `site_srl` bigint(20) NOT NULL DEFAULT 0,
  `mid` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout_srl` bigint(20) DEFAULT 0,
  `mlayout_srl` bigint(20) DEFAULT 0,
  `use_mobile` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `skin` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_skin_fix` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `mskin` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_mskin_fix` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `browser_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcontent` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `open_rss` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `header_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`module_srl`),
  UNIQUE KEY `idx_site_mid` (`site_srl`,`mid`),
  KEY `idx_module` (`module`),
  KEY `idx_module_category` (`module_category_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_modules`
--

LOCK TABLES `rx_modules` WRITE;
/*!40000 ALTER TABLE `rx_modules` DISABLE KEYS */;
INSERT INTO `rx_modules` VALUES (62,'page',0,61,0,'terms',168,-1,'Y','/USE_DEFAULT/','N','/USE_DEFAULT/','N','Terms of Service','',NULL,NULL,'N','Y','','','20230117022724');
INSERT INTO `rx_modules` VALUES (64,'page',0,61,0,'privacy',168,-1,'Y','/USE_DEFAULT/','N','/USE_DEFAULT/','N','Privacy Policy','',NULL,NULL,'N','Y','','','20230117022724');
INSERT INTO `rx_modules` VALUES (124,'page',0,112,0,'page_RcbH56',126,-1,'N','/USE_DEFAULT/','N','/USE_DEFAULT/','N','푸른나무교회 HOME','',NULL,NULL,'N','Y','','','20230117150416');
INSERT INTO `rx_modules` VALUES (134,'board',0,58,0,'board_CBHH38',168,-1,'N','sketchbook5_172','Y','/USE_DEFAULT/','N','푸른나무 사진첩','',NULL,NULL,'N','Y','','','20230117162859');
INSERT INTO `rx_modules` VALUES (136,'board',0,58,0,'board_eqqA48',168,-1,'N','sketchbook5_172','Y','/USE_DEFAULT/','N','알리는 말씀','',NULL,NULL,'N','Y','','','20230117162908');
INSERT INTO `rx_modules` VALUES (138,'board',0,58,0,'board_rIml75',168,-1,'N','sketchbook5_172','Y','/USE_DEFAULT/','N','주일 설교','',NULL,NULL,'N','Y','<style type=\"text/css\">.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }\r\n</style>','','20230117162935');
INSERT INTO `rx_modules` VALUES (140,'page',0,58,0,'page_tYfP94',168,-1,'N','/USE_DEFAULT/','N','/USE_DEFAULT/','N','섬기는 사람들','',NULL,NULL,'N','Y','','','20230117162954');
INSERT INTO `rx_modules` VALUES (142,'page',0,58,0,'page_QUYQ27',168,-1,'N','/USE_DEFAULT/','N','/USE_DEFAULT/','N','푸른나무교회','',NULL,NULL,'N','Y','','','20230117163027');
INSERT INTO `rx_modules` VALUES (144,'page',0,58,0,'page_LZvD46',168,-1,'N','/USE_DEFAULT/','N','/USE_DEFAULT/','N','모임과 예배 안내','',NULL,NULL,'N','Y','','','20230117163046');
INSERT INTO `rx_modules` VALUES (146,'page',0,58,0,'page_UcGl66',168,-1,'N',NULL,'Y',NULL,'Y','오시는 길','',NULL,NULL,'N','Y','','','20230117163106');
INSERT INTO `rx_modules` VALUES (161,'board',0,58,0,'board_REiI25',168,-1,'N','sketchbook5_172','Y','/USE_DEFAULT/','N','담임목사','',NULL,NULL,'N','Y','','','20230117193845');
INSERT INTO `rx_modules` VALUES (163,'board',0,58,0,'board_CMCf70',168,-1,'N','sketchbook5_172','Y','/USE_DEFAULT/','N','찬양팀 게시판','',NULL,NULL,'N','Y','','','20230117193930');
INSERT INTO `rx_modules` VALUES (165,'board',0,58,0,'board_xtmO59',168,-1,'N','sketchbook5_172','Y','/USE_DEFAULT/','N','캘리그라피','',NULL,NULL,'N','Y','','','20230117194059');
INSERT INTO `rx_modules` VALUES (260,'page',0,58,0,'page_kpBO77',168,-1,'N',NULL,'Y',NULL,'Y','회원 명단','','<img class=\"zbxe_widget_output\" style=\"float:left;width:100%;margin:none;padding:none;\" widget=\"ap_member_list\" widget_padding_top=\"0\" widget_padding_right=\"0\" widget_padding_bottom=\"0\" widget_padding_left=\"0\" skin=\"ap_list\" widget_cache=\"0m\" target_group=\"1%2C2%2C130%2C3%2C131\" sort_index=\"regdate\" sort_order=\"asc\" view_group_tab=\"Y\" view_page_navigation=\"Y\" option_view=\"user_name%2Cnick_name%2Cemail_address%2Cmember_group%2Cregdate\" ajax=\"Y\" widget_sequence=\"0\"  />',NULL,'N','Y','','','20230118120617');
INSERT INTO `rx_modules` VALUES (268,'page',0,58,0,'page_TQNb00',168,-1,'N','/USE_DEFAULT/','N','/USE_DEFAULT/','N','CONTACT','',NULL,NULL,'N','Y','','','20230118135820');
/*!40000 ALTER TABLE `rx_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_ncenterlite_notify`
--

DROP TABLE IF EXISTS `rx_ncenterlite_notify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_ncenterlite_notify` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `notify` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srl` bigint(20) NOT NULL,
  `target_srl` bigint(20) NOT NULL,
  `target_p_srl` bigint(20) NOT NULL,
  `type` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `target_type` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `notify_type` bigint(20) DEFAULT NULL,
  `member_srl` bigint(20) NOT NULL,
  `target_member_srl` bigint(20) NOT NULL,
  `target_nick_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_user_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_email_address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_browser` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_summary` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `readed` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_notify` (`notify`),
  KEY `idx_srl` (`srl`),
  KEY `idx_target_srl` (`target_srl`),
  KEY `idx_target_p_srl` (`target_p_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_target_member_srl` (`target_member_srl`),
  KEY `idx_readed` (`readed`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_member_srl_and_readed` (`member_srl`,`readed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_ncenterlite_notify`
--

LOCK TABLES `rx_ncenterlite_notify` WRITE;
/*!40000 ALTER TABLE `rx_ncenterlite_notify` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_ncenterlite_notify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_ncenterlite_notify_type`
--

DROP TABLE IF EXISTS `rx_ncenterlite_notify_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_ncenterlite_notify_type` (
  `notify_type_srl` bigint(20) NOT NULL,
  `notify_type_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notify_type_args` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_string` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`notify_type_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_ncenterlite_notify_type`
--

LOCK TABLES `rx_ncenterlite_notify_type` WRITE;
/*!40000 ALTER TABLE `rx_ncenterlite_notify_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_ncenterlite_notify_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_ncenterlite_unsubscribe`
--

DROP TABLE IF EXISTS `rx_ncenterlite_unsubscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_ncenterlite_unsubscribe` (
  `unsubscribe_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_srl` bigint(20) NOT NULL,
  `unsubscribe_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`unsubscribe_srl`),
  KEY `idx_member_srl` (`member_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_ncenterlite_unsubscribe`
--

LOCK TABLES `rx_ncenterlite_unsubscribe` WRITE;
/*!40000 ALTER TABLE `rx_ncenterlite_unsubscribe` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_ncenterlite_unsubscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_ncenterlite_user_set`
--

DROP TABLE IF EXISTS `rx_ncenterlite_user_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_ncenterlite_user_set` (
  `member_srl` bigint(20) NOT NULL,
  `comment_notify` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_comment_notify` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mention_notify` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote_notify` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scrap_notify` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_notify` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`member_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_ncenterlite_user_set`
--

LOCK TABLES `rx_ncenterlite_user_set` WRITE;
/*!40000 ALTER TABLE `rx_ncenterlite_user_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_ncenterlite_user_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_point`
--

DROP TABLE IF EXISTS `rx_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_point` (
  `member_srl` bigint(20) NOT NULL,
  `point` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`member_srl`),
  KEY `idx_point` (`point`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_point`
--

LOCK TABLES `rx_point` WRITE;
/*!40000 ALTER TABLE `rx_point` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_poll`
--

DROP TABLE IF EXISTS `rx_poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_poll` (
  `poll_srl` bigint(20) NOT NULL,
  `stop_date` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `upload_target_srl` bigint(20) NOT NULL,
  `poll_count` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL,
  `poll_type` bigint(20) NOT NULL,
  PRIMARY KEY (`poll_srl`),
  KEY `idx_upload_target_srl` (`upload_target_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_list_order` (`list_order`),
  KEY `idx_poll_type` (`poll_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_poll`
--

LOCK TABLES `rx_poll` WRITE;
/*!40000 ALTER TABLE `rx_poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_poll_item`
--

DROP TABLE IF EXISTS `rx_poll_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_poll_item` (
  `poll_item_srl` bigint(20) NOT NULL,
  `poll_srl` bigint(20) NOT NULL,
  `poll_index_srl` bigint(20) NOT NULL,
  `upload_target_srl` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_count` bigint(20) NOT NULL,
  `add_user_srl` bigint(20) NOT NULL,
  PRIMARY KEY (`poll_item_srl`),
  KEY `index_poll_srl` (`poll_srl`),
  KEY `idx_poll_index_srl` (`poll_index_srl`),
  KEY `idx_upload_target_srl` (`upload_target_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_poll_item`
--

LOCK TABLES `rx_poll_item` WRITE;
/*!40000 ALTER TABLE `rx_poll_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_poll_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_poll_log`
--

DROP TABLE IF EXISTS `rx_poll_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_poll_log` (
  `poll_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `poll_item` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  KEY `idx_poll_srl` (`poll_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_poll_log`
--

LOCK TABLES `rx_poll_log` WRITE;
/*!40000 ALTER TABLE `rx_poll_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_poll_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_poll_title`
--

DROP TABLE IF EXISTS `rx_poll_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_poll_title` (
  `poll_srl` bigint(20) NOT NULL,
  `poll_index_srl` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkcount` bigint(20) NOT NULL DEFAULT 1,
  `poll_count` bigint(20) NOT NULL,
  `upload_target_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `list_order` bigint(20) NOT NULL DEFAULT 0,
  KEY `idx_poll_srl` (`poll_srl`,`poll_index_srl`),
  KEY `idx_upload_target_srl` (`upload_target_srl`),
  KEY `idx_member_srl` (`member_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_list_order` (`list_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_poll_title`
--

LOCK TABLES `rx_poll_title` WRITE;
/*!40000 ALTER TABLE `rx_poll_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_poll_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_sequence`
--

DROP TABLE IF EXISTS `rx_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_sequence` (
  `seq` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_sequence`
--

LOCK TABLES `rx_sequence` WRITE;
/*!40000 ALTER TABLE `rx_sequence` DISABLE KEYS */;
INSERT INTO `rx_sequence` VALUES (1);
INSERT INTO `rx_sequence` VALUES (2);
INSERT INTO `rx_sequence` VALUES (3);
INSERT INTO `rx_sequence` VALUES (4);
INSERT INTO `rx_sequence` VALUES (5);
INSERT INTO `rx_sequence` VALUES (6);
INSERT INTO `rx_sequence` VALUES (7);
INSERT INTO `rx_sequence` VALUES (8);
INSERT INTO `rx_sequence` VALUES (9);
INSERT INTO `rx_sequence` VALUES (10);
INSERT INTO `rx_sequence` VALUES (11);
INSERT INTO `rx_sequence` VALUES (12);
INSERT INTO `rx_sequence` VALUES (13);
INSERT INTO `rx_sequence` VALUES (14);
INSERT INTO `rx_sequence` VALUES (15);
INSERT INTO `rx_sequence` VALUES (16);
INSERT INTO `rx_sequence` VALUES (17);
INSERT INTO `rx_sequence` VALUES (18);
INSERT INTO `rx_sequence` VALUES (19);
INSERT INTO `rx_sequence` VALUES (20);
INSERT INTO `rx_sequence` VALUES (21);
INSERT INTO `rx_sequence` VALUES (22);
INSERT INTO `rx_sequence` VALUES (23);
INSERT INTO `rx_sequence` VALUES (24);
INSERT INTO `rx_sequence` VALUES (25);
INSERT INTO `rx_sequence` VALUES (26);
INSERT INTO `rx_sequence` VALUES (27);
INSERT INTO `rx_sequence` VALUES (28);
INSERT INTO `rx_sequence` VALUES (29);
INSERT INTO `rx_sequence` VALUES (30);
INSERT INTO `rx_sequence` VALUES (31);
INSERT INTO `rx_sequence` VALUES (32);
INSERT INTO `rx_sequence` VALUES (33);
INSERT INTO `rx_sequence` VALUES (34);
INSERT INTO `rx_sequence` VALUES (35);
INSERT INTO `rx_sequence` VALUES (36);
INSERT INTO `rx_sequence` VALUES (37);
INSERT INTO `rx_sequence` VALUES (38);
INSERT INTO `rx_sequence` VALUES (39);
INSERT INTO `rx_sequence` VALUES (40);
INSERT INTO `rx_sequence` VALUES (41);
INSERT INTO `rx_sequence` VALUES (42);
INSERT INTO `rx_sequence` VALUES (43);
INSERT INTO `rx_sequence` VALUES (44);
INSERT INTO `rx_sequence` VALUES (45);
INSERT INTO `rx_sequence` VALUES (46);
INSERT INTO `rx_sequence` VALUES (47);
INSERT INTO `rx_sequence` VALUES (48);
INSERT INTO `rx_sequence` VALUES (49);
INSERT INTO `rx_sequence` VALUES (50);
INSERT INTO `rx_sequence` VALUES (51);
INSERT INTO `rx_sequence` VALUES (52);
INSERT INTO `rx_sequence` VALUES (53);
INSERT INTO `rx_sequence` VALUES (54);
INSERT INTO `rx_sequence` VALUES (55);
INSERT INTO `rx_sequence` VALUES (56);
INSERT INTO `rx_sequence` VALUES (57);
INSERT INTO `rx_sequence` VALUES (58);
INSERT INTO `rx_sequence` VALUES (59);
INSERT INTO `rx_sequence` VALUES (60);
INSERT INTO `rx_sequence` VALUES (61);
INSERT INTO `rx_sequence` VALUES (62);
INSERT INTO `rx_sequence` VALUES (63);
INSERT INTO `rx_sequence` VALUES (64);
INSERT INTO `rx_sequence` VALUES (65);
INSERT INTO `rx_sequence` VALUES (66);
INSERT INTO `rx_sequence` VALUES (67);
INSERT INTO `rx_sequence` VALUES (68);
INSERT INTO `rx_sequence` VALUES (69);
INSERT INTO `rx_sequence` VALUES (70);
INSERT INTO `rx_sequence` VALUES (71);
INSERT INTO `rx_sequence` VALUES (72);
INSERT INTO `rx_sequence` VALUES (73);
INSERT INTO `rx_sequence` VALUES (74);
INSERT INTO `rx_sequence` VALUES (75);
INSERT INTO `rx_sequence` VALUES (76);
INSERT INTO `rx_sequence` VALUES (77);
INSERT INTO `rx_sequence` VALUES (78);
INSERT INTO `rx_sequence` VALUES (79);
INSERT INTO `rx_sequence` VALUES (80);
INSERT INTO `rx_sequence` VALUES (81);
INSERT INTO `rx_sequence` VALUES (82);
INSERT INTO `rx_sequence` VALUES (83);
INSERT INTO `rx_sequence` VALUES (84);
INSERT INTO `rx_sequence` VALUES (85);
INSERT INTO `rx_sequence` VALUES (86);
INSERT INTO `rx_sequence` VALUES (87);
INSERT INTO `rx_sequence` VALUES (88);
INSERT INTO `rx_sequence` VALUES (89);
INSERT INTO `rx_sequence` VALUES (90);
INSERT INTO `rx_sequence` VALUES (91);
INSERT INTO `rx_sequence` VALUES (92);
INSERT INTO `rx_sequence` VALUES (93);
INSERT INTO `rx_sequence` VALUES (94);
INSERT INTO `rx_sequence` VALUES (95);
INSERT INTO `rx_sequence` VALUES (96);
INSERT INTO `rx_sequence` VALUES (97);
INSERT INTO `rx_sequence` VALUES (98);
INSERT INTO `rx_sequence` VALUES (99);
INSERT INTO `rx_sequence` VALUES (100);
INSERT INTO `rx_sequence` VALUES (101);
INSERT INTO `rx_sequence` VALUES (102);
INSERT INTO `rx_sequence` VALUES (103);
INSERT INTO `rx_sequence` VALUES (104);
INSERT INTO `rx_sequence` VALUES (105);
INSERT INTO `rx_sequence` VALUES (106);
INSERT INTO `rx_sequence` VALUES (107);
INSERT INTO `rx_sequence` VALUES (108);
INSERT INTO `rx_sequence` VALUES (109);
INSERT INTO `rx_sequence` VALUES (110);
INSERT INTO `rx_sequence` VALUES (111);
INSERT INTO `rx_sequence` VALUES (112);
INSERT INTO `rx_sequence` VALUES (113);
INSERT INTO `rx_sequence` VALUES (114);
INSERT INTO `rx_sequence` VALUES (115);
INSERT INTO `rx_sequence` VALUES (116);
INSERT INTO `rx_sequence` VALUES (117);
INSERT INTO `rx_sequence` VALUES (118);
INSERT INTO `rx_sequence` VALUES (119);
INSERT INTO `rx_sequence` VALUES (120);
INSERT INTO `rx_sequence` VALUES (121);
INSERT INTO `rx_sequence` VALUES (122);
INSERT INTO `rx_sequence` VALUES (123);
INSERT INTO `rx_sequence` VALUES (124);
INSERT INTO `rx_sequence` VALUES (125);
INSERT INTO `rx_sequence` VALUES (126);
INSERT INTO `rx_sequence` VALUES (127);
INSERT INTO `rx_sequence` VALUES (128);
INSERT INTO `rx_sequence` VALUES (129);
INSERT INTO `rx_sequence` VALUES (130);
INSERT INTO `rx_sequence` VALUES (131);
INSERT INTO `rx_sequence` VALUES (132);
INSERT INTO `rx_sequence` VALUES (133);
INSERT INTO `rx_sequence` VALUES (134);
INSERT INTO `rx_sequence` VALUES (135);
INSERT INTO `rx_sequence` VALUES (136);
INSERT INTO `rx_sequence` VALUES (137);
INSERT INTO `rx_sequence` VALUES (138);
INSERT INTO `rx_sequence` VALUES (139);
INSERT INTO `rx_sequence` VALUES (140);
INSERT INTO `rx_sequence` VALUES (141);
INSERT INTO `rx_sequence` VALUES (142);
INSERT INTO `rx_sequence` VALUES (143);
INSERT INTO `rx_sequence` VALUES (144);
INSERT INTO `rx_sequence` VALUES (145);
INSERT INTO `rx_sequence` VALUES (146);
INSERT INTO `rx_sequence` VALUES (147);
INSERT INTO `rx_sequence` VALUES (148);
INSERT INTO `rx_sequence` VALUES (149);
INSERT INTO `rx_sequence` VALUES (150);
INSERT INTO `rx_sequence` VALUES (151);
INSERT INTO `rx_sequence` VALUES (152);
INSERT INTO `rx_sequence` VALUES (153);
INSERT INTO `rx_sequence` VALUES (154);
INSERT INTO `rx_sequence` VALUES (155);
INSERT INTO `rx_sequence` VALUES (156);
INSERT INTO `rx_sequence` VALUES (157);
INSERT INTO `rx_sequence` VALUES (158);
INSERT INTO `rx_sequence` VALUES (159);
INSERT INTO `rx_sequence` VALUES (160);
INSERT INTO `rx_sequence` VALUES (161);
INSERT INTO `rx_sequence` VALUES (162);
INSERT INTO `rx_sequence` VALUES (163);
INSERT INTO `rx_sequence` VALUES (164);
INSERT INTO `rx_sequence` VALUES (165);
INSERT INTO `rx_sequence` VALUES (166);
INSERT INTO `rx_sequence` VALUES (167);
INSERT INTO `rx_sequence` VALUES (168);
INSERT INTO `rx_sequence` VALUES (169);
INSERT INTO `rx_sequence` VALUES (170);
INSERT INTO `rx_sequence` VALUES (171);
INSERT INTO `rx_sequence` VALUES (172);
INSERT INTO `rx_sequence` VALUES (173);
INSERT INTO `rx_sequence` VALUES (174);
INSERT INTO `rx_sequence` VALUES (175);
INSERT INTO `rx_sequence` VALUES (176);
INSERT INTO `rx_sequence` VALUES (177);
INSERT INTO `rx_sequence` VALUES (178);
INSERT INTO `rx_sequence` VALUES (179);
INSERT INTO `rx_sequence` VALUES (180);
INSERT INTO `rx_sequence` VALUES (181);
INSERT INTO `rx_sequence` VALUES (182);
INSERT INTO `rx_sequence` VALUES (183);
INSERT INTO `rx_sequence` VALUES (184);
INSERT INTO `rx_sequence` VALUES (185);
INSERT INTO `rx_sequence` VALUES (186);
INSERT INTO `rx_sequence` VALUES (187);
INSERT INTO `rx_sequence` VALUES (188);
INSERT INTO `rx_sequence` VALUES (189);
INSERT INTO `rx_sequence` VALUES (190);
INSERT INTO `rx_sequence` VALUES (191);
INSERT INTO `rx_sequence` VALUES (192);
INSERT INTO `rx_sequence` VALUES (193);
INSERT INTO `rx_sequence` VALUES (194);
INSERT INTO `rx_sequence` VALUES (195);
INSERT INTO `rx_sequence` VALUES (196);
INSERT INTO `rx_sequence` VALUES (197);
INSERT INTO `rx_sequence` VALUES (198);
INSERT INTO `rx_sequence` VALUES (199);
INSERT INTO `rx_sequence` VALUES (200);
INSERT INTO `rx_sequence` VALUES (201);
INSERT INTO `rx_sequence` VALUES (202);
INSERT INTO `rx_sequence` VALUES (203);
INSERT INTO `rx_sequence` VALUES (204);
INSERT INTO `rx_sequence` VALUES (205);
INSERT INTO `rx_sequence` VALUES (206);
INSERT INTO `rx_sequence` VALUES (207);
INSERT INTO `rx_sequence` VALUES (208);
INSERT INTO `rx_sequence` VALUES (209);
INSERT INTO `rx_sequence` VALUES (210);
INSERT INTO `rx_sequence` VALUES (211);
INSERT INTO `rx_sequence` VALUES (212);
INSERT INTO `rx_sequence` VALUES (213);
INSERT INTO `rx_sequence` VALUES (214);
INSERT INTO `rx_sequence` VALUES (215);
INSERT INTO `rx_sequence` VALUES (216);
INSERT INTO `rx_sequence` VALUES (217);
INSERT INTO `rx_sequence` VALUES (218);
INSERT INTO `rx_sequence` VALUES (219);
INSERT INTO `rx_sequence` VALUES (220);
INSERT INTO `rx_sequence` VALUES (221);
INSERT INTO `rx_sequence` VALUES (222);
INSERT INTO `rx_sequence` VALUES (223);
INSERT INTO `rx_sequence` VALUES (224);
INSERT INTO `rx_sequence` VALUES (225);
INSERT INTO `rx_sequence` VALUES (226);
INSERT INTO `rx_sequence` VALUES (227);
INSERT INTO `rx_sequence` VALUES (228);
INSERT INTO `rx_sequence` VALUES (229);
INSERT INTO `rx_sequence` VALUES (230);
INSERT INTO `rx_sequence` VALUES (231);
INSERT INTO `rx_sequence` VALUES (232);
INSERT INTO `rx_sequence` VALUES (233);
INSERT INTO `rx_sequence` VALUES (234);
INSERT INTO `rx_sequence` VALUES (235);
INSERT INTO `rx_sequence` VALUES (236);
INSERT INTO `rx_sequence` VALUES (237);
INSERT INTO `rx_sequence` VALUES (238);
INSERT INTO `rx_sequence` VALUES (239);
INSERT INTO `rx_sequence` VALUES (240);
INSERT INTO `rx_sequence` VALUES (241);
INSERT INTO `rx_sequence` VALUES (242);
INSERT INTO `rx_sequence` VALUES (243);
INSERT INTO `rx_sequence` VALUES (244);
INSERT INTO `rx_sequence` VALUES (245);
INSERT INTO `rx_sequence` VALUES (246);
INSERT INTO `rx_sequence` VALUES (247);
INSERT INTO `rx_sequence` VALUES (248);
INSERT INTO `rx_sequence` VALUES (249);
INSERT INTO `rx_sequence` VALUES (250);
INSERT INTO `rx_sequence` VALUES (251);
INSERT INTO `rx_sequence` VALUES (252);
INSERT INTO `rx_sequence` VALUES (253);
INSERT INTO `rx_sequence` VALUES (254);
INSERT INTO `rx_sequence` VALUES (255);
INSERT INTO `rx_sequence` VALUES (256);
INSERT INTO `rx_sequence` VALUES (257);
INSERT INTO `rx_sequence` VALUES (258);
INSERT INTO `rx_sequence` VALUES (259);
INSERT INTO `rx_sequence` VALUES (260);
INSERT INTO `rx_sequence` VALUES (261);
INSERT INTO `rx_sequence` VALUES (262);
INSERT INTO `rx_sequence` VALUES (263);
INSERT INTO `rx_sequence` VALUES (264);
INSERT INTO `rx_sequence` VALUES (265);
INSERT INTO `rx_sequence` VALUES (266);
INSERT INTO `rx_sequence` VALUES (267);
INSERT INTO `rx_sequence` VALUES (268);
INSERT INTO `rx_sequence` VALUES (269);
INSERT INTO `rx_sequence` VALUES (270);
INSERT INTO `rx_sequence` VALUES (271);
INSERT INTO `rx_sequence` VALUES (272);
INSERT INTO `rx_sequence` VALUES (273);
INSERT INTO `rx_sequence` VALUES (274);
INSERT INTO `rx_sequence` VALUES (275);
INSERT INTO `rx_sequence` VALUES (276);
INSERT INTO `rx_sequence` VALUES (277);
INSERT INTO `rx_sequence` VALUES (278);
INSERT INTO `rx_sequence` VALUES (279);
INSERT INTO `rx_sequence` VALUES (280);
INSERT INTO `rx_sequence` VALUES (281);
INSERT INTO `rx_sequence` VALUES (282);
INSERT INTO `rx_sequence` VALUES (283);
INSERT INTO `rx_sequence` VALUES (284);
INSERT INTO `rx_sequence` VALUES (285);
INSERT INTO `rx_sequence` VALUES (286);
INSERT INTO `rx_sequence` VALUES (287);
INSERT INTO `rx_sequence` VALUES (288);
INSERT INTO `rx_sequence` VALUES (289);
INSERT INTO `rx_sequence` VALUES (290);
INSERT INTO `rx_sequence` VALUES (291);
INSERT INTO `rx_sequence` VALUES (292);
INSERT INTO `rx_sequence` VALUES (293);
INSERT INTO `rx_sequence` VALUES (294);
INSERT INTO `rx_sequence` VALUES (295);
INSERT INTO `rx_sequence` VALUES (296);
INSERT INTO `rx_sequence` VALUES (297);
INSERT INTO `rx_sequence` VALUES (298);
INSERT INTO `rx_sequence` VALUES (299);
INSERT INTO `rx_sequence` VALUES (300);
INSERT INTO `rx_sequence` VALUES (301);
INSERT INTO `rx_sequence` VALUES (302);
INSERT INTO `rx_sequence` VALUES (303);
/*!40000 ALTER TABLE `rx_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_session`
--

DROP TABLE IF EXISTS `rx_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_session` (
  `session_key` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `expired` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `val` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `last_update` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cur_mid` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`session_key`),
  KEY `idx_session_member_srl` (`member_srl`),
  KEY `idx_session_expired` (`expired`),
  KEY `idx_session_update` (`last_update`),
  KEY `idx_session_cur_mid` (`cur_mid`),
  KEY `idx_session_update_mid` (`member_srl`,`last_update`,`cur_mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_session`
--

LOCK TABLES `rx_session` WRITE;
/*!40000 ALTER TABLE `rx_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_site_admin`
--

DROP TABLE IF EXISTS `rx_site_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_site_admin` (
  `site_srl` bigint(20) NOT NULL,
  `member_srl` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  UNIQUE KEY `idx_site_admin` (`site_srl`,`member_srl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_site_admin`
--

LOCK TABLES `rx_site_admin` WRITE;
/*!40000 ALTER TABLE `rx_site_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_site_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_sites`
--

DROP TABLE IF EXISTS `rx_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_sites` (
  `site_srl` bigint(20) NOT NULL,
  `index_module_srl` bigint(20) DEFAULT 0,
  `domain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`site_srl`),
  UNIQUE KEY `unique_domain` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_sites`
--

LOCK TABLES `rx_sites` WRITE;
/*!40000 ALTER TABLE `rx_sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_spamfilter_denied_ip`
--

DROP TABLE IF EXISTS `rx_spamfilter_denied_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_spamfilter_denied_ip` (
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hit` bigint(20) NOT NULL DEFAULT 0,
  `latest_hit` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `except_member` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ipaddress`),
  KEY `idx_hit` (`hit`),
  KEY `idx_latest_hit` (`latest_hit`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_spamfilter_denied_ip`
--

LOCK TABLES `rx_spamfilter_denied_ip` WRITE;
/*!40000 ALTER TABLE `rx_spamfilter_denied_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_spamfilter_denied_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_spamfilter_denied_word`
--

DROP TABLE IF EXISTS `rx_spamfilter_denied_word`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_spamfilter_denied_word` (
  `word` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` bigint(20) NOT NULL DEFAULT 0,
  `latest_hit` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `except_member` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `filter_html` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `is_regexp` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'N',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`word`),
  KEY `idx_hit` (`hit`),
  KEY `idx_latest_hit` (`latest_hit`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_spamfilter_denied_word`
--

LOCK TABLES `rx_spamfilter_denied_word` WRITE;
/*!40000 ALTER TABLE `rx_spamfilter_denied_word` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_spamfilter_denied_word` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_spamfilter_log`
--

DROP TABLE IF EXISTS `rx_spamfilter_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_spamfilter_log` (
  `spamfilter_log_srl` bigint(20) NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`spamfilter_log_srl`),
  KEY `idx_ipaddress` (`ipaddress`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_spamfilter_log`
--

LOCK TABLES `rx_spamfilter_log` WRITE;
/*!40000 ALTER TABLE `rx_spamfilter_log` DISABLE KEYS */;
INSERT INTO `rx_spamfilter_log` VALUES (173,'118.43.182.117','20230117200943');
INSERT INTO `rx_spamfilter_log` VALUES (189,'118.43.182.117','20230117201850');
INSERT INTO `rx_spamfilter_log` VALUES (218,'118.43.182.117','20230117202051');
INSERT INTO `rx_spamfilter_log` VALUES (242,'118.43.182.117','20230117202924');
INSERT INTO `rx_spamfilter_log` VALUES (254,'118.43.182.117','20230117203055');
INSERT INTO `rx_spamfilter_log` VALUES (255,'118.43.182.117','20230117203811');
INSERT INTO `rx_spamfilter_log` VALUES (282,'118.43.182.117','20230118214202');
INSERT INTO `rx_spamfilter_log` VALUES (284,'118.43.182.117','20230118214313');
INSERT INTO `rx_spamfilter_log` VALUES (286,'118.43.182.117','20230118214346');
INSERT INTO `rx_spamfilter_log` VALUES (288,'118.43.182.117','20230118214413');
INSERT INTO `rx_spamfilter_log` VALUES (296,'211.33.241.28','20230402134052');
INSERT INTO `rx_spamfilter_log` VALUES (298,'211.33.241.28','20230402135222');
INSERT INTO `rx_spamfilter_log` VALUES (300,'211.33.241.28','20230402135334');
INSERT INTO `rx_spamfilter_log` VALUES (302,'211.33.241.28','20230402135415');
/*!40000 ALTER TABLE `rx_spamfilter_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_tags`
--

DROP TABLE IF EXISTS `rx_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_tags` (
  `tag_srl` bigint(20) NOT NULL,
  `module_srl` bigint(20) NOT NULL DEFAULT 0,
  `document_srl` bigint(20) NOT NULL DEFAULT 0,
  `tag` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`tag_srl`),
  KEY `idx_module_srl` (`module_srl`),
  KEY `idx_document_srl` (`document_srl`),
  KEY `idx_regdate` (`regdate`),
  KEY `idx_tag` (`document_srl`,`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_tags`
--

LOCK TABLES `rx_tags` WRITE;
/*!40000 ALTER TABLE `rx_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rx_trash`
--

DROP TABLE IF EXISTS `rx_trash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx_trash` (
  `trash_srl` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_module` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'document',
  `serialized_object` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `remover_srl` bigint(20) NOT NULL,
  `regdate` char(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`trash_srl`),
  KEY `idx_regdate` (`regdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx_trash`
--

LOCK TABLES `rx_trash` WRITE;
/*!40000 ALTER TABLE `rx_trash` DISABLE KEYS */;
/*!40000 ALTER TABLE `rx_trash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'greentreech'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-06 12:21:55
