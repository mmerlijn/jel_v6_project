-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                8.0.18 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Versie:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van v6 wordt geschreven
DROP DATABASE IF EXISTS `v6`;
CREATE DATABASE IF NOT EXISTS `v6` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `v6`;

-- Structuur van  tabel v6.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `voornaam` varchar(80) NOT NULL,
  `tussenvoegsel` varchar(20) DEFAULT NULL,
  `achternaam` varchar(80) NOT NULL,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'admin / user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel v6.users: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `voornaam`, `tussenvoegsel`, `achternaam`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(8, 'admin@psg.nl', '$2y$10$fFJWFVRonZXEL//P5yMAwuWDt.v6S1nj/teqgaeu1Oswx9wqU7T2.', 'Admin', NULL, 'Administrator', 'admin', '2021-10-27 17:34:18', '2021-10-27 17:34:18', NULL),
	(9, 'user@psg.nl', '$2y$10$09t08hp9Xuo7mJU3.rhVQ.Vf4TlrMpIBwXDv.Le/0bRrzULpKlxJS', 'U', NULL, 'User', 'user', '2021-10-27 17:34:18', '2021-10-27 17:34:18', NULL),
	(10, 'test@mail.nl', '$2y$10$veB.7S1hZJAdw9qqqLqjauTW42DgbJtywmYdXj0eSn2gKrmRpfuvK', 'Tinus', NULL, 'Test', 'user', '2021-10-27 17:34:18', '2021-10-27 17:34:18', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
