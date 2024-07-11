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


-- Dumping database structure for gymwebsite
DROP DATABASE IF EXISTS `gymwebsite`;
CREATE DATABASE IF NOT EXISTS `gymwebsite` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gymwebsite`;

-- Dumping structure for table gymwebsite.gymapp
DROP TABLE IF EXISTS `gymapp`;
CREATE TABLE IF NOT EXISTS `gymapp` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `trainer_id` varchar(60) NOT NULL,
  PRIMARY KEY (`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gymwebsite.gymapp: ~12 rows (approximately)
INSERT INTO `gymapp` (`fname`, `lname`, `email`, `contact`, `trainer_id`) VALUES
	('ram', 'thapa', 'ramthapa@gamil.com', '103', '102'),
	('bhabishya', 'thapa', 'bhabishyabhattnepal@gmail.com', '109', '1001'),
	('Saswot', 'b', 'bs@gmail.com', '110', '1001'),
	('RAM', 'RAM', '1231@GMAIL.COM', '111', '1001'),
	('Raj', 'kumar', 'kumar@gmail.com', '201', '101'),
	('Aadarsh', 'thakur', 'thakur@gmail.com', '205', '103');

-- Dumping structure for table gymwebsite.logintb
DROP TABLE IF EXISTS `logintb`;
CREATE TABLE IF NOT EXISTS `logintb` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gymwebsite.logintb: ~0 rows (approximately)
INSERT INTO `logintb` (`username`, `password`) VALUES
	('admin', 'pass');

-- Dumping structure for table gymwebsite.package
DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `Package_id` varchar(40) NOT NULL,
  `Package_name` varchar(40) NOT NULL,
  `Amount` int NOT NULL,
  PRIMARY KEY (`Package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gymwebsite.package: ~3 rows (approximately)
INSERT INTO `package` (`Package_id`, `Package_name`, `Amount`) VALUES
	('121', 'preliminary', 800),
	('122', 'Wt. gain', 1500),
	('123', 'Wt.loss', 1000);

-- Dumping structure for table gymwebsite.payment
DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `Payment_id` int NOT NULL,
  `Amount` int NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  PRIMARY KEY (`Payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gymwebsite.payment: ~4 rows (approximately)
INSERT INTO `payment` (`Payment_id`, `Amount`, `customer_id`, `payment_type`) VALUES
	(301, 1500, '201', 'cash'),
	(302, 800, '202', 'card'),
	(303, 1000, '203', 'cheque'),
	(304, 1500, '204', 'cash'),
	(305, 5000, '10', 'cash'),
	(306, 1500, '104', 'cash');

-- Dumping structure for table gymwebsite.trainer
DROP TABLE IF EXISTS `trainer`;
CREATE TABLE IF NOT EXISTS `trainer` (
  `Trainer_id` int NOT NULL,
  `Name` varchar(40) NOT NULL,
  `phone` int NOT NULL,
  PRIMARY KEY (`Trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gymwebsite.trainer: ~4 rows (approximately)
INSERT INTO `trainer` (`Trainer_id`, `Name`, `phone`) VALUES
	(1001, 'Rijan', 659450);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
