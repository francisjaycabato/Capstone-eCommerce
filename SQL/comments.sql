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
-- Table structure for table `comments`
--
USE ecommerce;
DROP TABLE IF EXISTS ecommerce.comments;
CREATE TABLE IF NOT EXISTS ecommerce.comments (
	`COMMENT_ID` int NOT NULL AUTO_INCREMENT,
    `COMMENT_TEXT` text(1000) NOT NULL,
	`STORE_ID` int NOT NULL,
	`USER_ID` int NOT NULL,
    `RATING` int NOT NULL, -- 0 to 5 -- 
	PRIMARY KEY (`COMMENT_ID`),
    FOREIGN KEY (`STORE_ID`) REFERENCES store(`STORE_ID`),
    FOREIGN KEY (`USER_ID`) REFERENCES user(`USER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--	
-- Dumping data for table `comments`
INSERT INTO `comments` (`COMMENT_ID`, `COMMENT_TEXT`, `STORE_ID`, `USER_ID`, `RATING`) VALUES
(3, 'Great service. Super fast delivery!', 6, 30, 4),
(4, 'Amazing products. Super happy with my purchase.', 6, 32, 5),
(5, 'Amazing selection and friendly staff! Found everything I needed in one place.', 6, 33, 4),
(6, 'Love the unique items this store offers. Always something new to discover with each visit.', 7, 35, 5),
(7, 'Clean and well-organized store. Makes shopping a breeze, and the staff is super helpful', 7, 36, 4),
(8, 'Fantastic deals and discounts! This store is a budget-friendly shoppers paradise.', 8, 33, 5),
(9, 'The store layout is intuitive, and the checkout process is quick. A very efficient shopping experience.', 8, 38, 4),
(10, 'Wide variety of products, from essentials to specialty items. Something for everyone!', 9, 36, 5),
(11, 'Great sales and promotions. This store knows how to keep customers coming back for more!', 9, 39, 4),
(12, 'Too many hidden fees during checkout. Be transparent with costs!', 9, 32, 2),
(13, 'The return policy is fair, and they handled my issue promptly.', 8, 31, 3),
(14, 'Prices are too high. Found the same items cheaper elsewhere.', 7, 34, 1);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

