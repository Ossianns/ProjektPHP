-- --------------------------------------------------------
-- Värd:                         127.0.0.1
-- Serverversion:                10.4.28-MariaDB - mariadb.org binary distribution
-- Server-OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumpar databasstruktur för projekt2
DROP DATABASE IF EXISTS `projekt2`;
CREATE DATABASE IF NOT EXISTS `projekt2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `projekt2`;

-- Dumpar struktur för tabell projekt2.artister
DROP TABLE IF EXISTS `artister`;
CREATE TABLE IF NOT EXISTS `artister` (
  `artistid` int(11) NOT NULL AUTO_INCREMENT,
  `artistnamn` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`artistid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumpar data för tabell projekt2.artister: ~5 rows (ungefär)
DELETE FROM `artister`;
INSERT INTO `artister` (`artistid`, `artistnamn`) VALUES
	(7, 'Pink Floyd'),
	(16, 'Radiohead'),
	(17, 'Nirvana'),
	(18, 'Primus'),
	(26, 'Big E. Cheese');

-- Dumpar struktur för tabell projekt2.skivor
DROP TABLE IF EXISTS `skivor`;
CREATE TABLE IF NOT EXISTS `skivor` (
  `skivid` int(11) NOT NULL AUTO_INCREMENT,
  `artistid` int(11) DEFAULT NULL,
  `skivnamn` varchar(60) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `betyg` int(2) NOT NULL,
  PRIMARY KEY (`skivid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumpar data för tabell projekt2.skivor: ~10 rows (ungefär)
DELETE FROM `skivor`;
INSERT INTO `skivor` (`skivid`, `artistid`, `skivnamn`, `genre`, `betyg`) VALUES
	(3, 7, 'DSOTM', 'Rock', 10),
	(4, 7, 'Meddle', 'Rock', 8),
	(5, 7, 'The Wall', 'Rock', 9),
	(14, 16, 'In Rainbows', 'Rock', 10),
	(15, 16, 'OK Computer', 'Rock', 9),
	(16, 18, 'Pork Soda', 'Funkmetal', 7),
	(17, 17, 'Nevermind', 'Grunge', 9),
	(18, 17, 'In Utero', 'Grunge', 8),
	(19, 16, 'In Rainbows (Disk 2)', 'Rock', 10),
	(20, 16, 'Kid A', 'Ambient', 8),
	(32, 26, 'Mr. Boombastic', 'Rap', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
