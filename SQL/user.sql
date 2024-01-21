SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
USE ecommerce;
DROP TABLE IF EXISTS ecommerce.user;
CREATE TABLE IF NOT EXISTS ecommerce.user (
	`USER_ID` int NOT NULL AUTO_INCREMENT,
	`USERNAME` varchar(128) NOT NULL,
	`FNAME` varchar(128) NOT NULL,
	`LNAME` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
	`COUNTRY` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
	`EMAIL` varchar(128) NOT NULL,
	`PASSWORD_HASH` varchar(255) NOT NULL,
    `IS_VENDOR` tinyint(1) NOT NULL,
	`IS_ADMIN` tinyint(1) NOT NULL,
	PRIMARY KEY (`USER_ID`),
	UNIQUE KEY `EMAIL` (`EMAIL`),
	UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--	
-- Dumping data for table `user`
-- 
INSERT INTO `user` (`USER_ID`, `USERNAME`, `FNAME`, `LNAME`, `COUNTRY`, `EMAIL`, `PASSWORD_HASH`,`IS_VENDOR`, `IS_ADMIN`) VALUES
(21, 'testvendor', 'testvendor', 'vendor', 'Canada', 'vendor@vendor.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 1, 0),
(22, 'testing', 'test', 'test', 'Bonaire, Sint Eustatius and Saba', 'test@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(23, 'Testing01', 'testing', 'testing', 'Macao', 'testing01@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 1),
(24, 'admin02', 'admin', 'admin', NULL, 'admin02@admin.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 1),
(25, 'ADmin514', 'admin', 'admin', NULL, 'ADmin514@admin.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 1),
(29, 'vendor01', 'vendorV', 'isVendor', 'Canada', 'Vendor514@vendor.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 1, 0),
(30, 'BlueSky88', 'Emma', 'Thompson', 'Canada', 'emma.thompson@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(31, 'QuantumCoder', 'Oliver', 'Rodriuez', 'Mexico', 'oliver.rodriguez@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(32, 'LunarExplorer', 'Mia', 'Anderson', 'Canada', 'mia.anderson@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(33, 'SparkingStar', 'Liam', 'Mitchell', 'Canada', ' liam.mitchell@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(34, 'GalaxySeeker', 'Sophia', 'Campbell', 'Canada', 'sophia.campbell@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(35, 'NebulaDreamer', 'Ethan', 'Walker', 'Canada', 'ethan.walker@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(36, 'TechSavvy42', 'Ava', 'Turner', 'Canada', 'ava.turner@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(37, 'QuantumPioneer', 'Jackson', 'Lewis', 'Canada', ' jackson.lewis@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(38, 'StellarCreator', 'Amelia', 'Cooper', 'Canada', 'amelia.cooper@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(39, 'SolarVoyager', 'Aiden', 'Bennett', 'Canada', 'aiden.bennett@test.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 0, 0),
(40, 'Vendor02', 'vendorS', 'isSVendor', 'Canada', 'Vendor500@vendor.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 1, 0),
(41, 'vendor03', 'vendorA', 'isAVendor', 'Canada', 'Vendor600@vendor.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 1, 0),
(42, 'Vendor04', 'vendorQ', 'isQVendor', 'Canada', 'Vendor700@vendor.com', '$2y$10$LzqPxFc8cN3edntaMuiKx.7KpL6Zj3z2FRssdo.YB7V0.XXKbMP66', 1, 0);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

