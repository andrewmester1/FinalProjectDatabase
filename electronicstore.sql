-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 03:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronicstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `CUST_FNAME` varchar(30) NOT NULL,
  `CUST_LNAME` varchar(30) NOT NULL,
  `CUST_EMAIL` varchar(30) NOT NULL,
  `CUST_USERNAME` varchar(30) NOT NULL,
  `CUST_PASSWORD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `CUST_FNAME`, `CUST_LNAME`, `CUST_EMAIL`, `CUST_USERNAME`, `CUST_PASSWORD`) VALUES
(1, 'andrew', 'mester', 'email@email.com', 'andrew', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Guy', 'Fieri', 'guyfieri@flavortown.com', 'GuyF123', 'e06d7db9940a817c933d34869aa13798'),
(3, 'drew', 'bella', 'drewb@gmail.com', 'drewb', '0b9a54438fba2dc0d39be8f7c6c71a58'),
(5, 'BOB', 'dylan', 'bobdylan@music.com', 'Bobdylan', '319f4d26e3c536b5dd871bb2c52e3178'),
(6, 'ihab', 'darwish', 'idarwish@fdu.edu', 'ihabd', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `INV_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `CUST_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_PRICE` decimal(10,0) NOT NULL,
  `PRODUCT_QUANTITY` int(11) NOT NULL,
  `PRODUCT_DESC` varchar(30) NOT NULL,
  `PRODUCT_IMG` varchar(200) NOT NULL,
  `PRODUCT_TYPE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_PRICE`, `PRODUCT_QUANTITY`, `PRODUCT_DESC`, `PRODUCT_IMG`, `PRODUCT_TYPE`) VALUES
(1, '1250', 2, 'HP Spectre 13.5\"', '../resources/hpspectre14.jpg', 'laptop'),
(2, '1000', 2, 'Lenovo Thinkpad X1 Carbon', '../resources/thinkpad.jpg', 'laptop'),
(3, '1500', 1, 'Macbook Air', '../resources/macbookair.jpg', 'laptop'),
(4, '900', 1, 'Sony X90J 50 Inch TV', '../resources/SonyTV.jpg', 'TV'),
(5, '60', 2, 'Rainbow Six Siege', '../resources/rainbow.jpg', 'games'),
(6, '2000', 3, 'Apple Macbook Pro 14\"', '../resources/macbookpro14.jpg', 'laptop'),
(7, '1500', 5, 'SAMSUNG 75-Inch Q70A Series', '../resources/samsung75tv.jpg', 'TV'),
(8, '20', 10, 'Overwatch', '../resources/overwatch.jpg', 'games'),
(9, '250', 1, 'Farmer Dan Simulator', '../resources/farm.jpg', 'games'),
(10, '60', 10, 'Super Smash Bros: Ultimate', '../resources/smash.png', 'games'),
(11, '30', 10, 'Bioshock', '../resources/bioshock.jpg', 'games'),
(12, '700', 5, 'LG NanoCell 80 Series', '../resources/lgtv.jpg', 'TV'),
(13, '750', 5, 'VIZIO 65-Inch M-Series', '../resources/vizio.jpg', 'TV'),
(14, '650', 5, 'TCL 55-inch 6-Series 4K', '../resources/tcltv.jpg', 'TV'),
(16, '1600', 5, 'Apple Macbook Pro 13\"', '../resources/macbookair.jpg', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view games`
-- (See below for the actual view)
--
CREATE TABLE `view games` (
`PRODUCT_ID` int(11)
,`PRODUCT_PRICE` decimal(10,0)
,`PRODUCT_QUANTITY` int(11)
,`PRODUCT_DESC` varchar(30)
,`PRODUCT_IMG` varchar(200)
,`PRODUCT_TYPE` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view laptops`
-- (See below for the actual view)
--
CREATE TABLE `view laptops` (
`PRODUCT_ID` int(11)
,`PRODUCT_PRICE` decimal(10,0)
,`PRODUCT_QUANTITY` int(11)
,`PRODUCT_DESC` varchar(30)
,`PRODUCT_IMG` varchar(200)
,`PRODUCT_TYPE` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view shopping_cart`
-- (See below for the actual view)
--
CREATE TABLE `view shopping_cart` (
`item_id` int(11)
,`item_name` varchar(30)
,`item_price` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view tvs`
-- (See below for the actual view)
--
CREATE TABLE `view tvs` (
`PRODUCT_ID` int(11)
,`PRODUCT_PRICE` decimal(10,0)
,`PRODUCT_QUANTITY` int(11)
,`PRODUCT_DESC` varchar(30)
,`PRODUCT_IMG` varchar(200)
,`PRODUCT_TYPE` varchar(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view games`
--
DROP TABLE IF EXISTS `view games`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view games`  AS SELECT `product`.`PRODUCT_ID` AS `PRODUCT_ID`, `product`.`PRODUCT_PRICE` AS `PRODUCT_PRICE`, `product`.`PRODUCT_QUANTITY` AS `PRODUCT_QUANTITY`, `product`.`PRODUCT_DESC` AS `PRODUCT_DESC`, `product`.`PRODUCT_IMG` AS `PRODUCT_IMG`, `product`.`PRODUCT_TYPE` AS `PRODUCT_TYPE` FROM `product` WHERE `product`.`PRODUCT_TYPE` = 'games' ;

-- --------------------------------------------------------

--
-- Structure for view `view laptops`
--
DROP TABLE IF EXISTS `view laptops`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view laptops`  AS SELECT `product`.`PRODUCT_ID` AS `PRODUCT_ID`, `product`.`PRODUCT_PRICE` AS `PRODUCT_PRICE`, `product`.`PRODUCT_QUANTITY` AS `PRODUCT_QUANTITY`, `product`.`PRODUCT_DESC` AS `PRODUCT_DESC`, `product`.`PRODUCT_IMG` AS `PRODUCT_IMG`, `product`.`PRODUCT_TYPE` AS `PRODUCT_TYPE` FROM `product` WHERE `product`.`PRODUCT_TYPE` = 'laptop' ;

-- --------------------------------------------------------

--
-- Structure for view `view shopping_cart`
--
DROP TABLE IF EXISTS `view shopping_cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view shopping_cart`  AS SELECT `shopping_cart`.`item_id` AS `item_id`, `shopping_cart`.`item_name` AS `item_name`, `shopping_cart`.`item_price` AS `item_price` FROM `shopping_cart` ;

-- --------------------------------------------------------

--
-- Structure for view `view tvs`
--
DROP TABLE IF EXISTS `view tvs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view tvs`  AS SELECT `product`.`PRODUCT_ID` AS `PRODUCT_ID`, `product`.`PRODUCT_PRICE` AS `PRODUCT_PRICE`, `product`.`PRODUCT_QUANTITY` AS `PRODUCT_QUANTITY`, `product`.`PRODUCT_DESC` AS `PRODUCT_DESC`, `product`.`PRODUCT_IMG` AS `PRODUCT_IMG`, `product`.`PRODUCT_TYPE` AS `PRODUCT_TYPE` FROM `product` WHERE `product`.`PRODUCT_TYPE` = 'TV' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`INV_ID`),
  ADD KEY `CUST IN INVOICE` (`CUST_ID`),
  ADD KEY `PROD IN INVOICE` (`PRODUCT_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `INV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `CUST IN INVOICE` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `PROD IN INVOICE` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
