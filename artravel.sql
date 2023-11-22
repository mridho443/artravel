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


-- Dumping database structure for artravel
CREATE DATABASE IF NOT EXISTS `artravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `artravel`;

-- Dumping structure for table artravel.bus
CREATE TABLE IF NOT EXISTS `bus` (
  `id_bus` int NOT NULL AUTO_INCREMENT,
  `nama_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `plat_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_bus`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table artravel.bus: ~0 rows (approximately)

-- Dumping structure for table artravel.paket_bus
CREATE TABLE IF NOT EXISTS `paket_bus` (
  `id_paketbus` int NOT NULL AUTO_INCREMENT,
  `id_bus` int DEFAULT NULL,
  `rute_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jadwal_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_paketbus`) USING BTREE,
  KEY `id_bus` (`id_bus`) USING BTREE,
  CONSTRAINT `paket_bus_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table artravel.paket_bus: ~0 rows (approximately)

-- Dumping structure for table artravel.pesan_bus
CREATE TABLE IF NOT EXISTS `pesan_bus` (
  `id_pesanbus` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_paketbus` int DEFAULT NULL,
  `bukti_bayarbus` mediumblob,
  `status_pesanbus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `file_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_pesanbus`) USING BTREE,
  KEY `id_user` (`id_user`) USING BTREE,
  KEY `id_paketbus` (`id_paketbus`) USING BTREE,
  CONSTRAINT `pesan_bus_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `pesan_bus_ibfk_2` FOREIGN KEY (`id_paketbus`) REFERENCES `paket_bus` (`id_paketbus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table artravel.pesan_bus: ~0 rows (approximately)

-- Dumping structure for table artravel.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table artravel.role: ~3 rows (approximately)
REPLACE INTO `role` (`id_role`, `nama_role`) VALUES
	(1, 'super_admin'),
	(2, 'admin'),
	(3, 'user');

-- Dumping structure for table artravel.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` blob,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table artravel.user: ~2 rows (approximately)
REPLACE INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `image`) VALUES
	(1, 'jj', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 'asdasd', 'as@g.g', NULL),
	(2, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a@a.a', NULL);

-- Dumping structure for table artravel.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id_user` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  KEY `id_user` (`id_user`) USING BTREE,
  KEY `id_role` (`id_role`) USING BTREE,
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table artravel.user_role: ~2 rows (approximately)
REPLACE INTO `user_role` (`id_user`, `id_role`) VALUES
	(2, 2),
	(1, 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
