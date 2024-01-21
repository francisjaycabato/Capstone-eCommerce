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
-- Table structure for table `products`
--
USE ecommerce;
DROP TABLE IF EXISTS ecommerce.products;
CREATE TABLE IF NOT EXISTS ecommerce.products (
	`PRODUCT_ID` int NOT NULL AUTO_INCREMENT,
	`PRODUCT_NAME` varchar(128) NOT NULL,
	`STORE_ID` int NOT NULL,
    `PRODUCT_PRICE` DECIMAL (10,2),
	`DESCRIPTION` text(50000) NOT NULL,
    `COLOR` varchar(128) DEFAULT NULL,
	`SIZE` varchar(128) DEFAULT NULL,
    `XS_QTY` int NOT NULL,
    `S_QTY` int NOT NULL,
    `M_QTY` int NOT NULL,
    `L_QTY` int NOT NULL,
    `XL_QTY` int NOT NULL,
	PRIMARY KEY (`PRODUCT_ID`),
	UNIQUE KEY `PRODUCT_NAME` (`PRODUCT_NAME`),
    FOREIGN KEY (`STORE_ID`) REFERENCES stores(`STORE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--	
-- Dumping data for table `stores`
-- Password: Password1!
INSERT INTO `products` (`PRODUCT_ID`, `PRODUCT_NAME`, `STORE_ID`, `PRODUCT_PRICE`, `DESCRIPTION`, `COLOR`, `SIZE`, `XS_QTY`, `S_QTY`, `M_QTY`, `L_QTY`, `XL_QTY`) VALUES
(000001, 'Shirt', 6, 24.99, 'Crafted from high-quality cotton, it offers a comfortable and breathable feel. The shirt boasts a sleek and modern design with a tailored fit, making it suitable for various occasions – from casual outings to more formal events. The black hue adds a touch of sophistication and allows for easy pairing with different bottoms and accessories. Whether worn solo or layered, this black shirt effortlessly combines style and comfort for a chic and fashionable look.', 'Select Color', 'Select Size', 0, 5, 5, 4, 2),
(000002, 'Sweatpants', 6, 38.95, 'Crafted from a soft and plush cotton blend, these sweatpants provide the ultimate coziness for lounging at home or running errands. The elastic waistband ensures a secure yet flexible fit, accommodating various body shapes. The relaxed, tapered silhouette offers a modern and stylish look without compromising on comfort. Featuring deep pockets for added convenience, these sweatpants are perfect for keeping your essentials close at hand. Whether you are relaxing on the couch or staying active, these comfortable sweatpants are an ideal choice for a laid-back and effortlessly cool style.', 'Select Color', 'Select Size', 5, 15, 8, 3, 4),
(000003, 'Hoodie', 6, 64.98,'Picture a hoodie that is a blend of casual charm and urban edge. This versatile piece boasts a loose fit and a kangaroo pocket, creating a laid-back vibe that is perfect for street-style enthusiasts. Crafted from a cozy cotton-polyester blend, it offers warmth without sacrificing breathability. The drawstring hood adds a touch of sporty flair, making it a go-to choice for a relaxed, effortlessly cool look. Whether you are strolling through the city or kicking back with friends, this hoodie combines comfort and style for a wardrobe essential that effortlessly complements your everyday adventures.', 'Select Color', 'Select Size', 2, 12, 14, 1, 4);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
