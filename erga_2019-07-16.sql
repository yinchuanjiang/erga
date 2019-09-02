# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 106.14.184.98 (MySQL 5.7.23-log)
# Database: erga
# Generation Time: 2019-07-16 07:32:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_menu`;

CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`)
VALUES
	(1,0,1,'活动数据','fa-bar-chart','/',NULL,NULL,'2019-07-16 14:42:14'),
	(2,0,2,'Admin','fa-tasks','',NULL,NULL,NULL),
	(3,2,3,'Users','fa-users','auth/users',NULL,NULL,NULL),
	(4,2,4,'Roles','fa-user','auth/roles',NULL,NULL,NULL),
	(5,2,5,'Permission','fa-ban','auth/permissions',NULL,NULL,NULL),
	(6,2,6,'Menu','fa-bars','auth/menu',NULL,NULL,NULL),
	(7,2,7,'Operation log','fa-history','auth/logs',NULL,NULL,NULL),
	(8,0,0,'用户列表','fa-male','/users','*','2019-07-16 05:38:56','2019-07-16 05:38:56');

/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_operation_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_operation_log`;

CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_operation_log` WRITE;
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`)
VALUES
	(1,1,'admin','GET','127.0.0.1','[]','2019-07-16 05:37:18','2019-07-16 05:37:18'),
	(2,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 05:37:37','2019-07-16 05:37:37'),
	(3,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 05:37:42','2019-07-16 05:37:42'),
	(4,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 05:37:57','2019-07-16 05:37:57'),
	(5,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"\\u7528\\u6237\\u5217\\u8868\",\"icon\":\"fa-male\",\"uri\":\"\\/users\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"Uv32aWxgP1RZDsJdVrsalNlgP9KHNPYLV2AuPBuT\"}','2019-07-16 05:38:55','2019-07-16 05:38:55'),
	(6,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-07-16 05:38:57','2019-07-16 05:38:57'),
	(7,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-07-16 05:42:57','2019-07-16 05:42:57'),
	(8,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 05:43:01','2019-07-16 05:43:01'),
	(9,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 13:47:54','2019-07-16 13:47:54'),
	(10,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 13:56:21','2019-07-16 13:56:21'),
	(11,1,'admin','GET','127.0.0.1','[]','2019-07-16 13:56:26','2019-07-16 13:56:26'),
	(12,1,'admin','GET','127.0.0.1','[]','2019-07-16 13:56:36','2019-07-16 13:56:36'),
	(13,1,'admin','GET','127.0.0.1','[]','2019-07-16 13:57:45','2019-07-16 13:57:45'),
	(14,1,'admin','GET','127.0.0.1','[]','2019-07-16 13:57:59','2019-07-16 13:57:59'),
	(15,1,'admin','GET','127.0.0.1','[]','2019-07-16 13:59:54','2019-07-16 13:59:54'),
	(16,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 13:59:59','2019-07-16 13:59:59'),
	(17,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:01:12','2019-07-16 14:01:12'),
	(18,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:01:23','2019-07-16 14:01:23'),
	(19,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:01:48','2019-07-16 14:01:48'),
	(20,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:02:14','2019-07-16 14:02:14'),
	(21,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:04:58','2019-07-16 14:04:58'),
	(22,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:05:23','2019-07-16 14:05:23'),
	(23,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:05:56','2019-07-16 14:05:56'),
	(24,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:10:36','2019-07-16 14:10:36'),
	(25,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:10:58','2019-07-16 14:10:58'),
	(26,1,'admin/users','GET','127.0.0.1','{\"prize\":\"1\",\"d5b138222bc8ad601222ffddd5982ff0\":null,\"2518f7ddf1acef7325ccfc9d7a99759a\":null,\"created_at\":{\"start\":null,\"end\":null},\"_pjax\":\"#pjax-container\"}','2019-07-16 14:11:13','2019-07-16 14:11:13'),
	(27,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"prize\":\"0\",\"d5b138222bc8ad601222ffddd5982ff0\":null,\"2518f7ddf1acef7325ccfc9d7a99759a\":null,\"created_at\":{\"start\":null,\"end\":null}}','2019-07-16 14:11:16','2019-07-16 14:11:16'),
	(28,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:11:22','2019-07-16 14:11:22'),
	(29,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:13:35','2019-07-16 14:13:35'),
	(30,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:13:54','2019-07-16 14:13:54'),
	(31,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:14:35','2019-07-16 14:14:35'),
	(32,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:14:49','2019-07-16 14:14:49'),
	(33,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:25:12','2019-07-16 14:25:12'),
	(34,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:25:37','2019-07-16 14:25:37'),
	(35,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:25:57','2019-07-16 14:25:57'),
	(36,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:26:40','2019-07-16 14:26:40'),
	(37,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:26:50','2019-07-16 14:26:50'),
	(38,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:28:10','2019-07-16 14:28:10'),
	(39,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:29:57','2019-07-16 14:29:57'),
	(40,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:30:09','2019-07-16 14:30:09'),
	(41,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:30:27','2019-07-16 14:30:27'),
	(42,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:30:44','2019-07-16 14:30:44'),
	(43,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:40:23','2019-07-16 14:40:23'),
	(44,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:40:29','2019-07-16 14:40:29'),
	(45,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:40:56','2019-07-16 14:40:56'),
	(46,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:02','2019-07-16 14:41:02'),
	(47,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:04','2019-07-16 14:41:04'),
	(48,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:06','2019-07-16 14:41:06'),
	(49,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:07','2019-07-16 14:41:07'),
	(50,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:09','2019-07-16 14:41:09'),
	(51,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:35','2019-07-16 14:41:35'),
	(52,1,'admin','GET','127.0.0.1','[]','2019-07-16 14:41:40','2019-07-16 14:41:40'),
	(53,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:41:46','2019-07-16 14:41:46'),
	(54,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:41:52','2019-07-16 14:41:52'),
	(55,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:41:57','2019-07-16 14:41:57'),
	(56,1,'admin/auth/menu/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:42:04','2019-07-16 14:42:04'),
	(57,1,'admin/auth/menu/1','PUT','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"\\u6d3b\\u52a8\\u6570\\u636e\",\"icon\":\"fa-bar-chart\",\"uri\":\"\\/\",\"roles\":[null],\"permission\":null,\"_token\":\"Uv32aWxgP1RZDsJdVrsalNlgP9KHNPYLV2AuPBuT\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/erga.test\\/admin\\/auth\\/menu\"}','2019-07-16 14:42:13','2019-07-16 14:42:13'),
	(58,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-07-16 14:42:14','2019-07-16 14:42:14'),
	(59,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-07-16 14:42:17','2019-07-16 14:42:17'),
	(60,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:42:21','2019-07-16 14:42:21'),
	(61,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 14:42:23','2019-07-16 14:42:23'),
	(62,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:45:56','2019-07-16 14:45:56'),
	(63,1,'admin/users/send/3','GET','127.0.0.1','[]','2019-07-16 14:46:01','2019-07-16 14:46:01'),
	(64,1,'admin/users/send/3','GET','127.0.0.1','[]','2019-07-16 14:46:26','2019-07-16 14:46:26'),
	(65,1,'admin/users/send/3','GET','127.0.0.1','[]','2019-07-16 14:47:06','2019-07-16 14:47:06'),
	(66,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:47:09','2019-07-16 14:47:09'),
	(67,1,'admin/users','GET','127.0.0.1','[]','2019-07-16 14:47:51','2019-07-16 14:47:51'),
	(68,1,'admin','GET','127.0.0.1','[]','2019-07-16 15:19:50','2019-07-16 15:19:50'),
	(69,1,'admin','GET','127.0.0.1','[]','2019-07-16 15:20:07','2019-07-16 15:20:07'),
	(70,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 15:20:19','2019-07-16 15:20:19'),
	(71,1,'admin','GET','127.0.0.1','[]','2019-07-16 15:25:59','2019-07-16 15:25:59'),
	(72,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 15:26:21','2019-07-16 15:26:21'),
	(73,1,'admin','GET','127.0.0.1','[]','2019-07-16 15:28:03','2019-07-16 15:28:03'),
	(74,1,'admin','GET','127.0.0.1','[]','2019-07-16 15:28:33','2019-07-16 15:28:33'),
	(75,1,'admin/auth/logout','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-07-16 15:28:41','2019-07-16 15:28:41'),
	(76,1,'admin','GET','127.0.0.1','[]','2019-07-16 15:28:51','2019-07-16 15:28:51');

/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_permissions`;

CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`)
VALUES
	(1,'All permission','*','','*',NULL,NULL),
	(2,'Dashboard','dashboard','GET','/',NULL,NULL),
	(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),
	(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),
	(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL);

/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_role_menu`;

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`)
VALUES
	(1,2,NULL,NULL),
	(1,8,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_role_permissions`;

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_role_users`;

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_roles`;

CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'Administrator','administrator','2019-07-16 05:36:11','2019-07-16 05:36:11');

/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_user_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_user_permissions`;

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table admin_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','$2y$10$6lkiQ4RBy9.A8J6Ulz.nzOvGE4SAB8GOCjLvghHyrFkENk1DUkbV6','Administrator',NULL,'RLKVteBsjk3elgc4cZAb32BIgGALysd9tsYHdkkfBycWvKxpFzBdjXNIVfXV','2019-07-16 05:36:11','2019-07-16 05:36:11');

/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
