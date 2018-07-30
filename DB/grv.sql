-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for grvnce
CREATE DATABASE IF NOT EXISTS `grvnce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `grvnce`;

-- Dumping structure for table grvnce.grv
CREATE TABLE IF NOT EXISTS `grv` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` date NOT NULL,
  `userid` text NOT NULL,
  `username` text NOT NULL,
  `sub` text NOT NULL,
  `description` longtext NOT NULL,
  `done` int(11) NOT NULL,
  `reply` longtext NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table grvnce.grv: ~10 rows (approximately)
/*!40000 ALTER TABLE `grv` DISABLE KEYS */;
REPLACE INTO `grv` (`slno`, `datetime`, `userid`, `username`, `sub`, `description`, `done`, `reply`) VALUES
	(1, '2018-07-26', '', '170163', 'Test', 'This is a test', 0, ''),
	(2, '2018-07-26', '', '170163', 'Test', 'This is a test', 0, ''),
	(3, '2018-07-26', '', '170163', 'asdasd', 'sadasfasf', 0, ''),
	(4, '2018-07-26', '', '170163', 'Test', 'This is a test', 0, ''),
	(5, '2018-07-26', '', '12845', 'W434', 'SFSDGSDG', 0, ''),
	(6, '2018-07-26', '', '12845', 'SRSET', 'DXGDFXGBXF', 0, ''),
	(7, '2018-07-26', '', '170163', 'W34W3', 'SEDFSDF', 1, ''),
	(8, '2018-07-27', '12845', 'Kunji', 'tEST ASDPAKDP', 'ESDRMFSKDNFDSM', 1, 'awrlaesr;lw'),
	(9, '2018-07-27', '12845', 'Kunji', 'ASDA`PO', 'SLEMRSEL\r\n', 0, ''),
	(10, '2018-07-27', '12845', 'Kunji', 'ASDA`PO', 'SLEMRSEL\r\n', 0, ''),
	(11, '2018-07-27', '12845', 'Kunji', 'asd', 'sad', 0, '');
/*!40000 ALTER TABLE `grv` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
