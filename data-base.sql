-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for takaful
CREATE DATABASE IF NOT EXISTS `takaful` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `takaful`;

-- Dumping structure for table takaful.agen
CREATE TABLE IF NOT EXISTS `agen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table takaful.agen: ~0 rows (approximately)
/*!40000 ALTER TABLE `agen` DISABLE KEYS */;
/*!40000 ALTER TABLE `agen` ENABLE KEYS */;

-- Dumping structure for table takaful.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `akad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mudharabah',
  `jenisproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Takaful Dana Penidikan (FULNADI)',
  `namaortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglortu` date NOT NULL,
  `usiaortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkortu` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaanak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglanak` date NOT NULL,
  `usiaanak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkanak` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `perokok` enum('perokok','non-perokok') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standart` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontribusi` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `carabayar` enum('Tahunan','Bulanan','Harian') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahapan` enum('TK','SD','SMP','SMA','PT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table takaful.anggota: ~1 rows (approximately)
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` (`id`, `akad`, `jenisproduk`, `namaortu`, `tglortu`, `usiaortu`, `jkortu`, `namaanak`, `tglanak`, `usiaanak`, `jkanak`, `perokok`, `alamat`, `pekerjaan`, `no_telp`, `email`, `standart`, `kontribusi`, `carabayar`, `tahapan`, `nama_agen`, `no_agen`, `created_at`, `updated_at`) VALUES
	(2, 'Mudharabah', 'Takaful Dana Penidikan (FULNADI)', 'Rey Ahmad Maulana', '2021-09-16', '40', 'l', 'Royan Junior', '2021-09-21', '16', 'l', 'perokok', 'Bekasi', 'PNS', '0881231231', 'ahmadriki9512@gmail.com', 'Y', 'Yes', 'Tahunan', 'TK', 'Sunaryo', '1231321', '2021-09-22 00:01:37', '2021-09-22 00:01:37');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

-- Dumping structure for table takaful.angsuran
CREATE TABLE IF NOT EXISTS `angsuran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idpolis` bigint(20) unsigned NOT NULL,
  `namaortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paketkontribusi` int(11) NOT NULL DEFAULT 0,
  `sisa_angsuran` int(11) NOT NULL DEFAULT 0,
  `masaperjanjian` enum('5','6','12','15','18') COLLATE utf8mb4_unicode_ci NOT NULL,
  `carabayar` enum('1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persentabarru` enum('0,123') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlhtabarru` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagihasil` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table takaful.angsuran: ~1 rows (approximately)
/*!40000 ALTER TABLE `angsuran` DISABLE KEYS */;
INSERT INTO `angsuran` (`id`, `idpolis`, `namaortu`, `paketkontribusi`, `sisa_angsuran`, `masaperjanjian`, `carabayar`, `mta`, `persentabarru`, `jmlhtabarru`, `bagihasil`, `created_at`, `updated_at`) VALUES
	(3, 2, 'Rey Ahmad Maulana', 1000000, 1000000, '5', '1', 'test', '0,123', '2', 68000, '2021-09-22 01:20:34', '2021-09-22 01:20:34');
/*!40000 ALTER TABLE `angsuran` ENABLE KEYS */;

-- Dumping structure for table takaful.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table takaful.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2021_07_22_103318_create_anggota_table', 1),
	(3, '2021_07_23_162147_create_angsuran_table', 1),
	(4, '2021_07_23_171553_create_transaksi_table', 1),
	(5, '2021_08_23_110132_create_agens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table takaful.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idtransaksi` bigint(20) unsigned NOT NULL,
  `namaortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idpolis` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `premi` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_transaksi_angsuran` (`idtransaksi`),
  CONSTRAINT `FK_transaksi_angsuran` FOREIGN KEY (`idtransaksi`) REFERENCES `angsuran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table takaful.transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table takaful.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('agen','keuangan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'agen',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table takaful.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', '$2y$10$ZyazuVawl1uQPAOowZBbT.DQretCA4lvXVkxDGaFD2q6otA2lMABa', 'agen', NULL, '2021-08-25 00:00:00', '2021-08-25 00:00:00'),
	(2, 'user', 'user', '$2y$10$ZyazuVawl1uQPAOowZBbT.DQretCA4lvXVkxDGaFD2q6otA2lMABa', 'keuangan', NULL, '2021-08-25 00:00:00', '2021-08-25 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
