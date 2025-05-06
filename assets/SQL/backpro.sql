-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_skripsi
DROP DATABASE IF EXISTS `db_skripsi`;
CREATE DATABASE IF NOT EXISTS `db_skripsi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_skripsi`;

-- Dumping structure for table db_skripsi.akun
DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Pimpinan') DEFAULT NULL,
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP,
  `tgl_ubah` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.akun: ~2 rows (approximately)
DELETE FROM `akun`;
INSERT INTO `akun` (`id`, `username`, `password`, `level`, `tgl_input`, `tgl_ubah`) VALUES
	(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin', '2024-06-29 20:01:32', '2024-06-29 20:01:32'),
	(2, 'pimpinan', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Pimpinan', '2024-06-29 22:04:38', '2024-06-29 22:04:38');

-- Dumping structure for table db_skripsi.data_akreditasi
DROP TABLE IF EXISTS `data_akreditasi`;
CREATE TABLE IF NOT EXISTS `data_akreditasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_sk` varchar(50) DEFAULT NULL,
  `akreditasi` enum('A','B') DEFAULT NULL,
  `tgl_berlaku` date DEFAULT NULL,
  `tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.data_akreditasi: ~0 rows (approximately)
DELETE FROM `data_akreditasi`;
INSERT INTO `data_akreditasi` (`id`, `no_sk`, `akreditasi`, `tgl_berlaku`, `tgl_input`) VALUES
	(1, 'AS23122', 'A', '2024-05-27', '2024-06-18 12:25:42');

-- Dumping structure for table db_skripsi.data_guru
DROP TABLE IF EXISTS `data_guru`;
CREATE TABLE IF NOT EXISTS `data_guru` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.data_guru: ~21 rows (approximately)
DELETE FROM `data_guru`;
INSERT INTO `data_guru` (`id`, `nip`, `nama`, `jenis_kelamin`, `jabatan`, `tgl_input`) VALUES
	(1, '1', 'guru_1', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(2, '2', 'guru_2', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(3, '3', 'guru_3', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(4, '4', 'guru_4', 'Perempuan', 'guru', '2024-06-24 23:51:43'),
	(5, '5', 'guru_5', 'Perempuan', 'guru', '2024-06-24 23:51:43'),
	(6, '6', 'guru_6', 'Perempuan', 'guru', '2024-06-24 23:51:43'),
	(7, '7', 'guru_7', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(8, '8', 'guru_8', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(9, '9', 'guru_9', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(10, '10', 'guru_10', 'Perempuan', 'guru', '2024-06-24 23:51:43'),
	(11, '11', 'guru_11', 'Perempuan', 'guru', '2024-06-24 23:51:43'),
	(12, '12', 'guru_12', 'Perempuan', 'guru', '2024-06-24 23:51:43'),
	(13, '13', 'guru_13', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(14, '14', 'guru_14', 'Laki - Laki', 'guru', '2024-06-24 23:51:43'),
	(15, '15', 'guru_15', 'Laki - Laki', 'guru', '2024-06-24 23:51:44'),
	(16, '16', 'guru_16', 'Perempuan', 'guru', '2024-06-24 23:51:44'),
	(17, '17', 'guru_17', 'Perempuan', 'guru', '2024-06-24 23:51:44'),
	(18, '18', 'guru_18', 'Perempuan', 'guru', '2024-06-24 23:51:44'),
	(19, '19', 'guru_19', 'Laki - Laki', 'guru', '2024-06-24 23:51:44'),
	(20, '20', 'guru_20', 'Laki - Laki', 'guru', '2024-06-24 23:51:44'),
	(21, '21', 'guru_21', 'Laki - Laki', 'guru', '2024-06-24 23:51:44');

-- Dumping structure for table db_skripsi.data_pendaftar
DROP TABLE IF EXISTS `data_pendaftar`;
CREATE TABLE IF NOT EXISTS `data_pendaftar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `tmpt_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('Laki - Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.data_pendaftar: ~103 rows (approximately)
DELETE FROM `data_pendaftar`;
INSERT INTO `data_pendaftar` (`id`, `nama`, `nisn`, `tmpt_lahir`, `tgl_lahir`, `jk`, `asal_sekolah`, `tgl_input`) VALUES
	(1, 'nama_1', '1', 'tempat_1', '2001-01-01', 'Laki - Laki', 'SD01', '2024-06-24 23:41:06'),
	(2, 'nama_2', '2', 'tempat_2', '2001-01-02', 'Laki - Laki', 'SD02', '2024-06-24 23:41:06'),
	(3, 'nama_3', '3', 'tempat_3', '2001-01-03', 'Laki - Laki', 'SD03', '2024-06-24 23:41:06'),
	(4, 'nama_4', '4', 'tempat_4', '2001-01-04', 'Laki - Laki', 'SD04', '2024-06-24 23:41:06'),
	(5, 'nama_5', '5', 'tempat_5', '2001-01-05', 'Perempuan', 'SD05', '2024-06-24 23:41:06'),
	(6, 'nama_6', '6', 'tempat_6', '2001-01-06', 'Perempuan', 'SD06', '2024-06-24 23:41:06'),
	(7, 'nama_7', '7', 'tempat_7', '2001-01-07', 'Perempuan', 'SD07', '2024-06-24 23:41:06'),
	(8, 'nama_8', '8', 'tempat_8', '2001-01-08', 'Perempuan', 'SD08', '2024-06-24 23:41:06'),
	(9, 'nama_9', '9', 'tempat_9', '2001-01-09', 'Laki - Laki', 'SD09', '2024-06-24 23:41:06'),
	(10, 'nama_10', '10', 'tempat_10', '2001-01-10', 'Laki - Laki', 'SD10', '2024-06-24 23:41:06'),
	(11, 'nama_11', '11', 'tempat_11', '2001-01-11', 'Laki - Laki', 'SD01', '2024-06-24 23:41:06'),
	(12, 'nama_12', '12', 'tempat_12', '2001-01-12', 'Laki - Laki', 'SD02', '2024-06-24 23:41:06'),
	(13, 'nama_13', '13', 'tempat_13', '2001-01-13', 'Perempuan', 'SD03', '2024-06-24 23:41:06'),
	(14, 'nama_14', '14', 'tempat_14', '2001-01-14', 'Perempuan', 'SD04', '2024-06-24 23:41:06'),
	(15, 'nama_15', '15', 'tempat_15', '2001-01-15', 'Perempuan', 'SD05', '2024-06-24 23:41:06'),
	(16, 'nama_16', '16', 'tempat_16', '2001-01-16', 'Perempuan', 'SD06', '2024-06-24 23:41:06'),
	(17, 'nama_17', '17', 'tempat_17', '2001-01-17', 'Laki - Laki', 'SD07', '2024-06-24 23:41:06'),
	(18, 'nama_18', '18', 'tempat_18', '2001-01-18', 'Laki - Laki', 'SD08', '2024-06-24 23:41:06'),
	(19, 'nama_19', '19', 'tempat_19', '2001-01-19', 'Laki - Laki', 'SD09', '2024-06-24 23:41:06'),
	(20, 'nama_20', '20', 'tempat_20', '2001-01-20', 'Laki - Laki', 'SD10', '2024-06-24 23:41:06'),
	(21, 'nama_21', '21', 'tempat_21', '2001-01-21', 'Perempuan', 'SD01', '2024-06-24 23:41:06'),
	(22, 'nama_22', '22', 'tempat_22', '2001-01-22', 'Perempuan', 'SD02', '2024-06-24 23:41:06'),
	(23, 'nama_23', '23', 'tempat_23', '2001-01-23', 'Perempuan', 'SD03', '2024-06-24 23:41:06'),
	(24, 'nama_24', '24', 'tempat_24', '2001-01-24', 'Perempuan', 'SD04', '2024-06-24 23:41:06'),
	(25, 'nama_25', '25', 'tempat_25', '2001-01-25', 'Laki - Laki', 'SD05', '2024-06-24 23:41:06'),
	(26, 'nama_26', '26', 'tempat_26', '2001-01-26', 'Laki - Laki', 'SD06', '2024-06-24 23:41:06'),
	(27, 'nama_27', '27', 'tempat_27', '2001-01-27', 'Laki - Laki', 'SD07', '2024-06-24 23:41:06'),
	(28, 'nama_28', '28', 'tempat_28', '2001-01-28', 'Laki - Laki', 'SD08', '2024-06-24 23:41:06'),
	(29, 'nama_29', '29', 'tempat_29', '2001-01-29', 'Perempuan', 'SD09', '2024-06-24 23:41:06'),
	(30, 'nama_30', '30', 'tempat_30', '2001-01-30', 'Perempuan', 'SD10', '2024-06-24 23:41:06'),
	(31, 'nama_31', '31', 'tempat_31', '2001-01-31', 'Perempuan', 'SD01', '2024-06-24 23:41:06'),
	(32, 'nama_32', '32', 'tempat_32', '2001-02-01', 'Perempuan', 'SD02', '2024-06-24 23:41:06'),
	(33, 'nama_33', '33', 'tempat_33', '2001-02-02', 'Laki - Laki', 'SD03', '2024-06-24 23:41:06'),
	(34, 'nama_34', '34', 'tempat_34', '2001-02-03', 'Laki - Laki', 'SD04', '2024-06-24 23:41:06'),
	(35, 'nama_35', '35', 'tempat_35', '2001-02-04', 'Laki - Laki', 'SD05', '2024-06-24 23:41:06'),
	(36, 'nama_36', '36', 'tempat_36', '2001-02-05', 'Laki - Laki', 'SD06', '2024-06-24 23:41:06'),
	(37, 'nama_37', '37', 'tempat_37', '2001-02-06', 'Perempuan', 'SD07', '2024-06-24 23:41:06'),
	(38, 'nama_38', '38', 'tempat_38', '2001-02-07', 'Perempuan', 'SD08', '2024-06-24 23:41:06'),
	(39, 'nama_39', '39', 'tempat_39', '2001-02-08', 'Perempuan', 'SD09', '2024-06-24 23:41:06'),
	(40, 'nama_40', '40', 'tempat_40', '2001-02-09', 'Perempuan', 'SD10', '2024-06-24 23:41:06'),
	(41, 'nama_41', '41', 'tempat_41', '2001-02-10', 'Laki - Laki', 'SD01', '2024-06-24 23:41:06'),
	(42, 'nama_42', '42', 'tempat_42', '2001-02-11', 'Laki - Laki', 'SD02', '2024-06-24 23:41:06'),
	(43, 'nama_43', '43', 'tempat_43', '2001-02-12', 'Laki - Laki', 'SD03', '2024-06-24 23:41:06'),
	(44, 'nama_44', '44', 'tempat_44', '2001-02-13', 'Laki - Laki', 'SD04', '2024-06-24 23:41:06'),
	(45, 'nama_45', '45', 'tempat_45', '2001-02-14', 'Perempuan', 'SD05', '2024-06-24 23:41:06'),
	(46, 'nama_46', '46', 'tempat_46', '2001-02-15', 'Perempuan', 'SD06', '2024-06-24 23:41:06'),
	(47, 'nama_47', '47', 'tempat_47', '2001-02-16', 'Perempuan', 'SD07', '2024-06-24 23:41:06'),
	(48, 'nama_48', '48', 'tempat_48', '2001-02-17', 'Perempuan', 'SD08', '2024-06-24 23:41:06'),
	(49, 'nama_49', '49', 'tempat_49', '2001-02-18', 'Laki - Laki', 'SD09', '2024-06-24 23:41:06'),
	(50, 'nama_50', '50', 'tempat_50', '2001-02-19', 'Laki - Laki', 'SD10', '2024-06-24 23:41:06'),
	(51, 'nama_51', '51', 'tempat_51', '2001-02-20', 'Laki - Laki', 'SD01', '2024-06-24 23:41:06'),
	(52, 'nama_52', '52', 'tempat_52', '2001-02-21', 'Laki - Laki', 'SD02', '2024-06-24 23:41:06'),
	(53, 'nama_53', '53', 'tempat_53', '2001-02-22', 'Perempuan', 'SD03', '2024-06-24 23:41:06'),
	(54, 'nama_54', '54', 'tempat_54', '2001-02-23', 'Perempuan', 'SD04', '2024-06-24 23:41:06'),
	(55, 'nama_55', '55', 'tempat_55', '2001-02-24', 'Perempuan', 'SD05', '2024-06-24 23:41:06'),
	(56, 'nama_56', '56', 'tempat_56', '2001-02-25', 'Perempuan', 'SD06', '2024-06-24 23:41:06'),
	(57, 'nama_57', '57', 'tempat_57', '2001-02-26', 'Laki - Laki', 'SD07', '2024-06-24 23:41:06'),
	(58, 'nama_58', '58', 'tempat_58', '2001-02-27', 'Laki - Laki', 'SD08', '2024-06-24 23:41:06'),
	(59, 'nama_59', '59', 'tempat_59', '2001-02-28', 'Laki - Laki', 'SD09', '2024-06-24 23:41:06'),
	(60, 'nama_60', '60', 'tempat_60', '2001-03-01', 'Laki - Laki', 'SD10', '2024-06-24 23:41:06'),
	(61, 'nama_61', '61', 'tempat_61', '2001-03-02', 'Perempuan', 'SD01', '2024-06-24 23:41:06'),
	(62, 'nama_62', '62', 'tempat_62', '2001-03-03', 'Perempuan', 'SD02', '2024-06-24 23:41:06'),
	(63, 'nama_63', '63', 'tempat_63', '2001-03-04', 'Perempuan', 'SD03', '2024-06-24 23:41:06'),
	(64, 'nama_64', '64', 'tempat_64', '2001-03-05', 'Perempuan', 'SD04', '2024-06-24 23:41:06'),
	(65, 'nama_65', '65', 'tempat_65', '2001-03-06', 'Laki - Laki', 'SD05', '2024-06-24 23:41:06'),
	(66, 'nama_66', '66', 'tempat_66', '2001-03-07', 'Laki - Laki', 'SD06', '2024-06-24 23:41:06'),
	(67, 'nama_67', '67', 'tempat_67', '2001-03-08', 'Laki - Laki', 'SD07', '2024-06-24 23:41:06'),
	(68, 'nama_68', '68', 'tempat_68', '2001-03-09', 'Laki - Laki', 'SD08', '2024-06-24 23:41:06'),
	(69, 'nama_69', '69', 'tempat_69', '2001-03-10', 'Perempuan', 'SD09', '2024-06-24 23:41:06'),
	(70, 'nama_70', '70', 'tempat_70', '2001-03-11', 'Perempuan', 'SD10', '2024-06-24 23:41:06'),
	(71, 'nama_71', '71', 'tempat_71', '2001-03-12', 'Perempuan', 'SD01', '2024-06-24 23:41:06'),
	(72, 'nama_72', '72', 'tempat_72', '2001-03-13', 'Perempuan', 'SD02', '2024-06-24 23:41:06'),
	(73, 'nama_73', '73', 'tempat_73', '2001-03-14', 'Laki - Laki', 'SD03', '2024-06-24 23:41:06'),
	(74, 'nama_74', '74', 'tempat_74', '2001-03-15', 'Laki - Laki', 'SD04', '2024-06-24 23:41:06'),
	(75, 'nama_75', '75', 'tempat_75', '2001-03-16', 'Laki - Laki', 'SD05', '2024-06-24 23:41:06'),
	(76, 'nama_76', '76', 'tempat_76', '2001-03-17', 'Laki - Laki', 'SD06', '2024-06-24 23:41:06'),
	(77, 'nama_77', '77', 'tempat_77', '2001-03-18', 'Perempuan', 'SD07', '2024-06-24 23:41:06'),
	(78, 'nama_78', '78', 'tempat_78', '2001-03-19', 'Perempuan', 'SD08', '2024-06-24 23:41:06'),
	(79, 'nama_79', '79', 'tempat_79', '2001-03-20', 'Perempuan', 'SD09', '2024-06-24 23:41:06'),
	(80, 'nama_80', '80', 'tempat_80', '2001-03-21', 'Perempuan', 'SD10', '2024-06-24 23:41:06'),
	(81, 'nama_81', '81', 'tempat_81', '2001-03-22', 'Laki - Laki', 'SD01', '2024-06-24 23:41:06'),
	(82, 'nama_82', '82', 'tempat_82', '2001-03-23', 'Laki - Laki', 'SD02', '2024-06-24 23:41:06'),
	(83, 'nama_83', '83', 'tempat_83', '2001-03-24', 'Laki - Laki', 'SD03', '2024-06-24 23:41:06'),
	(84, 'nama_84', '84', 'tempat_84', '2001-03-25', 'Laki - Laki', 'SD04', '2024-06-24 23:41:06'),
	(85, 'nama_85', '85', 'tempat_85', '2001-03-26', 'Perempuan', 'SD05', '2024-06-24 23:41:06'),
	(86, 'nama_86', '86', 'tempat_86', '2001-03-27', 'Perempuan', 'SD06', '2024-06-24 23:41:06'),
	(87, 'nama_87', '87', 'tempat_87', '2001-03-28', 'Perempuan', 'SD07', '2024-06-24 23:41:06'),
	(88, 'nama_88', '88', 'tempat_88', '2001-03-29', 'Perempuan', 'SD08', '2024-06-24 23:41:06'),
	(89, 'nama_89', '89', 'tempat_89', '2001-03-30', 'Laki - Laki', 'SD09', '2024-06-24 23:41:06'),
	(90, 'nama_90', '90', 'tempat_90', '2001-03-31', 'Laki - Laki', 'SD10', '2024-06-24 23:41:07'),
	(91, 'nama_91', '91', 'tempat_91', '2001-04-01', 'Laki - Laki', 'SD01', '2024-06-24 23:41:07'),
	(92, 'nama_92', '92', 'tempat_92', '2001-04-02', 'Laki - Laki', 'SD02', '2024-06-24 23:41:07'),
	(93, 'nama_93', '93', 'tempat_93', '2001-04-03', 'Perempuan', 'SD03', '2024-06-24 23:41:07'),
	(94, 'nama_94', '94', 'tempat_94', '2001-04-04', 'Perempuan', 'SD04', '2024-06-24 23:41:07'),
	(95, 'nama_95', '95', 'tempat_95', '2001-04-05', 'Perempuan', 'SD05', '2024-06-24 23:41:07'),
	(96, 'nama_96', '96', 'tempat_96', '2001-04-06', 'Perempuan', 'SD06', '2024-06-24 23:41:07'),
	(97, 'nama_97', '97', 'tempat_97', '2001-04-07', 'Laki - Laki', 'SD07', '2024-06-24 23:41:07'),
	(98, 'nama_98', '98', 'tempat_98', '2001-04-08', 'Laki - Laki', 'SD08', '2024-06-24 23:41:07'),
	(99, 'nama_99', '99', 'tempat_99', '2001-04-09', 'Laki - Laki', 'SD09', '2024-06-24 23:41:07'),
	(100, 'nama_100', '100', 'tempat_100', '2001-04-10', 'Laki - Laki', 'SD10', '2024-06-24 23:41:07'),
	(101, 'nama_101', '101', 'tempat_101', '2001-04-11', 'Laki - Laki', 'SD11', '2024-06-24 23:41:07'),
	(102, 'nama_102', '102', 'tempat_102', '2001-04-12', 'Laki - Laki', 'SD12', '2024-06-24 23:41:07'),
	(103, 'nama_103', '103', 'tempat_103', '2001-04-13', 'Laki - Laki', 'SD13', '2024-06-24 23:41:07');

-- Dumping structure for table db_skripsi.data_riwayat
DROP TABLE IF EXISTS `data_riwayat`;
CREATE TABLE IF NOT EXISTS `data_riwayat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jumlah_siswa` int DEFAULT NULL,
  `jumlah_guru` int DEFAULT NULL,
  `spp` int DEFAULT NULL,
  `akreditasi` enum('A','B') DEFAULT NULL,
  `hasil_prediksi` int DEFAULT NULL,
  `tgl_prediksi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.data_riwayat: ~4 rows (approximately)
DELETE FROM `data_riwayat`;
INSERT INTO `data_riwayat` (`id`, `jumlah_siswa`, `jumlah_guru`, `spp`, `akreditasi`, `hasil_prediksi`, `tgl_prediksi`) VALUES
	(3, 223, 25, 100000, 'A', 186, '2024-07-16 21:47:55'),
	(4, 223, 25, 100000, 'A', 186, '2024-07-16 21:52:13'),
	(5, 223, 25, 100000, 'A', 186, '2024-07-24 01:13:09'),
	(6, 223, 25, 100000, 'A', 186, '2024-07-24 01:19:15');

-- Dumping structure for table db_skripsi.data_siswabaru
DROP TABLE IF EXISTS `data_siswabaru`;
CREATE TABLE IF NOT EXISTS `data_siswabaru` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `tmpt_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.data_siswabaru: ~0 rows (approximately)
DELETE FROM `data_siswabaru`;

-- Dumping structure for table db_skripsi.data_spp
DROP TABLE IF EXISTS `data_spp`;
CREATE TABLE IF NOT EXISTS `data_spp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `biaya` int DEFAULT '0',
  `tgl_berlaku` date DEFAULT NULL,
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_skripsi.data_spp: ~0 rows (approximately)
DELETE FROM `data_spp`;
INSERT INTO `data_spp` (`id`, `biaya`, `tgl_berlaku`, `tgl_input`) VALUES
	(1, 300000, '2024-06-04', '2024-06-18 19:15:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
