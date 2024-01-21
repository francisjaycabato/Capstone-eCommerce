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
-- Table structure for table `stores`
--
USE ecommerce;
DROP TABLE IF EXISTS ecommerce.stores;
CREATE TABLE IF NOT EXISTS ecommerce.stores (
	`STORE_ID` int NOT NULL AUTO_INCREMENT,
	`STORE_NAME` varchar(128) NOT NULL,
	`USERNAME` varchar(128) NOT NULL,
    `USER_ID` int NOT NULL,
	`DESCRIPTION` text(50000) NOT NULL,
    `LOCATION` varchar(128) NOT NULL,
    `CONTACT_EMAIL` varchar(128) NOT NULL,
    `CONTACT_PHONE` varchar(128) NOT NULL,
	PRIMARY KEY (`STORE_ID`),
	UNIQUE KEY `STORE_NAME` (`STORE_NAME`),
    FOREIGN KEY (USER_ID) REFERENCES user(USER_ID)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--	
-- Dumping data for table `stores`
-- Password: Password1!
INSERT INTO `stores` (`STORE_ID`, `STORE_NAME`, `USERNAME`, `USER_ID`, `DESCRIPTION`, `LOCATION`, `CONTACT_EMAIL`, `CONTACT_PHONE`) VALUES
(6, 'STORE4EVER', 'newvendor01', 29, '#1 Store in North America in Sales', 'placeholder Address', 'vendorstore@store.com', '514-123-6543'),
(7, 'FORNEVER21', 'newvendor02', 40, '#1 Store in North America in Sales', 'placeholder Address', 'vendorVstore@store.com', '514-123-6543'),
(8, 'LIKE NIKE', 'newvendor03', 41, '#1 Store in North America in Sales', 'placeholder Address', 'vendorAstore@store.com', '514-123-6543'),
(9, 'BABA YAGA', 'newvendor04', 42, '#1 Store in North America in Sales', 'placeholder Address', 'vendorQstore@store.com', '514-123-6543');
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

