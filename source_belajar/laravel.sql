/*
Navicat MySQL Data Transfer

Source Server         : MySQL_Local
Source Server Version : 50733
Source Host           : 127.0.0.1:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50733
File Encoding         : 65001

Date: 2022-03-23 12:03:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for hobi
-- ----------------------------
DROP TABLE IF EXISTS `hobi`;
CREATE TABLE `hobi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_hobi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hobi
-- ----------------------------
INSERT INTO `hobi` VALUES ('1', 'BERENANG', '2022-02-22 08:49:29', '2022-03-22 08:49:30');
INSERT INTO `hobi` VALUES ('2', 'MEMBACA', '2022-03-22 08:49:41', '2022-03-22 08:49:42');
INSERT INTO `hobi` VALUES ('3', 'SEPAK BOLA', '2022-03-22 08:49:54', '2022-03-22 08:49:54');

-- ----------------------------
-- Table structure for hobi_siswa
-- ----------------------------
DROP TABLE IF EXISTS `hobi_siswa`;
CREATE TABLE `hobi_siswa` (
  `id_siswa` bigint(20) unsigned NOT NULL,
  `id_hobi` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`,`id_hobi`),
  KEY `hobi_siswa_id_siswa_index` (`id_siswa`),
  KEY `hobi_siswa_id_hobi_index` (`id_hobi`),
  CONSTRAINT `hobi_siswa_id_hobi_foreign` FOREIGN KEY (`id_hobi`) REFERENCES `hobi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hobi_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hobi_siswa
-- ----------------------------
INSERT INTO `hobi_siswa` VALUES ('12', '1', null, null);
INSERT INTO `hobi_siswa` VALUES ('12', '2', null, null);
INSERT INTO `hobi_siswa` VALUES ('12', '3', null, null);
INSERT INTO `hobi_siswa` VALUES ('13', '1', null, null);
INSERT INTO `hobi_siswa` VALUES ('13', '2', null, null);
INSERT INTO `hobi_siswa` VALUES ('13', '3', null, null);

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('1', 'A-101', '2022-03-21 11:32:55', '2022-03-21 11:32:57');
INSERT INTO `kelas` VALUES ('2', 'A-102', '2022-03-21 11:33:14', '2022-03-21 11:33:15');
INSERT INTO `kelas` VALUES ('3', 'A-201', '2022-03-21 11:33:21', '2022-03-21 11:33:22');
INSERT INTO `kelas` VALUES ('4', 'A-202', '2022-03-21 11:33:28', '2022-03-21 11:33:28');
INSERT INTO `kelas` VALUES ('5', 'A-301', '2022-03-21 11:33:37', '2022-03-21 11:33:38');
INSERT INTO `kelas` VALUES ('6', 'A-302', '2022-03-21 11:33:48', '2022-03-21 11:33:48');

-- ----------------------------
-- Table structure for log_error_import_siswa
-- ----------------------------
DROP TABLE IF EXISTS `log_error_import_siswa`;
CREATE TABLE `log_error_import_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pesan_error` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_error_import_siswa
-- ----------------------------
INSERT INTO `log_error_import_siswa` VALUES ('1', 'nisn sudah ada maka error', 'A003', '2022-03-23 12:01:54');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2022_03_17_021824_create_table_siswa', '1');
INSERT INTO `migrations` VALUES ('8', '2022_03_21_084034_create_table_telepon', '2');
INSERT INTO `migrations` VALUES ('9', '2022_03_21_112611_add_id_kelas_to_siswa_table', '3');
INSERT INTO `migrations` VALUES ('10', '2022_03_21_112902_create_table_kelas', '4');
INSERT INTO `migrations` VALUES ('11', '2022_03_22_084439_create_table_hobi', '5');
INSERT INTO `migrations` VALUES ('12', '2022_03_22_085441_create_table_hobi_siswa', '6');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nisn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kelas` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  KEY `siswa_id_kelas_foreign` (`id_kelas`),
  CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('12', 'A001', 'BUDI', 'SURABAYA', '1880-01-19', 'L', '2022-03-21 11:02:32', '2022-03-23 08:38:43', '1');
INSERT INTO `siswa` VALUES ('13', 'A002', 'FULAN', 'SURABAYA', '1990-01-19', 'L', '2022-03-21 11:42:17', '2022-03-21 11:44:29', '5');
INSERT INTO `siswa` VALUES ('15', 'A003', 'TINI', 'NGAWI', '1990-08-09', 'P', '2022-03-23 11:55:17', '2022-03-23 11:55:17', '1');

-- ----------------------------
-- Table structure for telepon
-- ----------------------------
DROP TABLE IF EXISTS `telepon`;
CREATE TABLE `telepon` (
  `id_siswa` bigint(20) unsigned NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `telepon_no_telepon_unique` (`no_telepon`),
  CONSTRAINT `telepon_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of telepon
-- ----------------------------
INSERT INTO `telepon` VALUES ('12', '08562322541', '2022-03-21 11:02:32', '2022-03-21 11:02:32');
INSERT INTO `telepon` VALUES ('13', '085652441211', '2022-03-21 11:42:17', '2022-03-21 11:42:17');
INSERT INTO `telepon` VALUES ('15', '08562522121', '2022-03-23 11:55:17', '2022-03-23 11:55:17');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'abdan nafik', 'abdannafik@email.com', null, '$2y$10$lKkxq4GxxNfD5QEKDPDe0efRxlp.71koGe1IpPPis62RkCd/jCwea', null, '2022-03-22 10:55:33', '2022-03-22 10:55:33', 'admin');
