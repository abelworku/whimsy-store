-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 09:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Apparel'),
(2, 'Aviation'),
(3, 'Luxury'),
(4, 'Motor'),
(5, 'Decor'),
(6, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `InventoryAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `ProductID`, `InventoryAmount`) VALUES
(1, 1, 500),
(2, 2, 100),
(3, 3, 1200),
(4, 4, 2500),
(5, 5, 750),
(6, 6, 5000),
(7, 7, 20),
(8, 8, 450),
(9, 9, 3550),
(10, 10, 4000),
(11, 11, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` date DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Zip` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `TotalAmount` decimal(19,2) DEFAULT NULL,
  `ItemsPurchased` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `LastName`, `FirstName`, `Address`, `City`, `State`, `Zip`, `PhoneNumber`, `Country`, `TotalAmount`, `ItemsPurchased`) VALUES
(1, '2020-04-21', 'Smith', 'John', NULL, 'Chicago', 'Illinois', NULL, NULL, 'United States of America', '141.24', 1),
(2, '2020-04-05', 'Larson', 'Casper', NULL, 'Seattle', 'Washington', NULL, NULL, 'United States of America', '316.39', 1),
(3, '2020-03-19', 'Gustafson', 'Darill', NULL, 'Milan', 'Italy', NULL, NULL, 'Italy', '56.49', 1),
(4, '2020-02-18', 'Haynes', 'Tyler', NULL, 'Manchester', 'Greater Manchester', NULL, NULL, 'United Kingdom', '96.03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `TagID` int(11) DEFAULT NULL,
  `InventoryID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `ShippingSpeed` varchar(50) DEFAULT NULL,
  `ReturnPolicy` varchar(50) DEFAULT NULL,
  `ImageFileName` varchar(50) NOT NULL,
  `Price` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `TagID`, `InventoryID`, `CategoryID`, `Name`, `Description`, `ShippingSpeed`, `ReturnPolicy`, `ImageFileName`, `Price`) VALUES
(1, 4, 1, 6, 'Pogo-Stick Boots', 'Guaranteed to give you at least 20 metres of clearance from sea-level, these pogo stick boots are a new addition to our lineup of gadgetry apparel. Equipped with state-of-the-art absorption springs, you\'ll feel a new spring in your step in time for our spring catalogue! Machine wash cold. Tumble dry only. No ironing required.', 'Basic', 'Returnable', '1', '49.99'),
(2, 3, 2, 2, 'Hot Air Balloon', 'Gridlock. Rush hour. Traffic congestion. These are but a few symptoms of traditional vehicular transport systems. With our inflatable motorless vehicle, you\'ll be able to bring the cloud to your step. Infused with our patented helium formula, our hot air balloon will allow you to coast past traffic in style. Comes in 3 different colours.', 'Express', 'Non-returnable', '2', '279.99'),
(3, 7, 3, 2, 'Propeller Umbrella', 'Shorten your walking distance by picking up this rotor-powered, all-electric marvel of personal aviation! Equipped with GPS and a suite of spatial sensors, you can send your navigational directions via bluetooth on your phone and our propeller umbrella will whisk you to your destination! Caution - may not shelter a passenger completely from any form of precipitation. 1 passenger only. Lasts for 20 minutes on a single charge. While supplies last.', 'Expedited', 'Returnable', '3', '124.99'),
(4, 7, 4, 6, 'Bluetooth Typewriter', 'Ever wanted the convenience of modern living juxtaposed with the tabular carriage-return style of mechanical works? With this bluetooth typewriter, you can enjoy the same pioneering experiences as the early days of the printing press while removing any need for cables, ink, or paper. Stimulate your creative imagination and pick up this bluetooth typewriter today!', 'Express', 'Returnable', '4', '75.99'),
(5, 4, 5, 5, 'Mars Globe', 'You\'ve heard of the snowglobe, but have you heard of the Mars Globe? Shake the Mars Globe, and you\'ll see a number of sand storms scurrying about on the surface. Wait for the dust to settle, and press the rover button underneath to see NASA\'s Mars rovers probing and exploring the Martian terrain!', 'Basic', 'Non-returnable', '5', '15.99'),
(6, 1, 6, 1, 'Thermal Jacket', 'We at Whimsy were perplexed when we heard news of jackets that could not keep people warm during the winter season. After months of research and development, and partnering with leading battery makers, Whimsy has developed the first battery-powered thermal winter suit! By slowly releasing warm air through small ventilators located throughout the jacket, Whimsy\'s patented thermal winter suit is guaranteed to keep you warm against temperatures down to 30 degrees below 0. Although not designed for warmer temperatures above 0, the thermal winter suit\'s ventilators will sense when the temperature is warmer and turn off its built-in heating feature, instead ventilating the air throughout your jacket.', 'Expedited', 'Returnable', '6', '99.99'),
(7, 5, 7, 4, 'Formula-One Car', 'While we can\'t guarantee this to be an all-terrain vehicle with its 5 centimetres of ground clearance, we can guarantee that you can clear corners with more g-force than the launch of the space shuttle. Recommended to be driven on a closed track with a trained driver.', 'Special', 'Returnable', '7', '499.99'),
(8, 2, 8, 3, 'Marine Chronometer', 'Just in case you are in need of determining longitude aboard a seafaring wind-sail vessel, this vintage marine chronometer will supply you with many of your oceanic navigational needs as you circumnavigate the globe.', 'Express', 'Returnable', '8', '24.99'),
(9, 6, 9, 5, 'Gramophone', 'Styled from the finest combinations of heat-treated brass, our Gramophone is sure to add a vintage touch to any room. Assembly in less than 20 minutes.', 'Special', 'Non-returnable', '9', '59.99'),
(10, 1, 10, 1, 'Flashlight Sunglasses', 'Introducing our Flashlight Sunglasses, a new way to quickly illuminate your surroundings with customizable colours and luminous distance.', 'Expedited', 'Returnable', '10', '34.99'),
(11, 3, 11, 3, 'Portable Beverage Heater', 'A familiar encounter with hot beverages, and an ode to that perfect temperature: Reheat your hot beverages on the go with Whimsy\'s Portable Beverage Heater! Stylish. Slim. Stainless steel for the spills. Battery-powered. And oh so handy for the moments where a microwave isn\'t nearby.', 'Basic', 'Returnable', '11', '16.99');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `RatingNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `ProductID`, `RatingNumber`) VALUES
(1, 1, 5),
(2, 2, 4),
(3, 3, 4),
(4, 4, 3),
(5, 5, 4),
(7, 6, 5),
(8, 7, 4),
(9, 8, 5),
(10, 9, 4),
(11, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `ReviewText` longtext DEFAULT NULL,
  `ReviewDate` date DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `ProductID`, `ReviewText`, `ReviewDate`, `LastName`, `FirstName`, `Country`) VALUES
(1, 3, 'This propeller umbrella is sure to be a hit! Apart from regulatory approval, I approve of this aerodynamic marvel of personal aviation!', '2020-04-20', 'Smith', 'John', 'United States of America'),
(2, 2, 'Wow! I didn\'t know hot air balloons could be purchased on Whimsy! The takeoff and landing procedures leave room for improvement, as it gets quite difficult to parallel park a hot air balloon, but it sure saves a trip to the gas station!', '2020-04-04', 'Larson', 'Casper', 'United States of America'),
(3, 1, 'Disappointed - I accidentally washed my pogo stick boots in warm water and they shrunk! They still work but can only now reach a height of about 4 metres. ', '2020-03-20', 'Gustafson', 'Darill', 'Italy'),
(4, 2, 'To the reviewer who gave a bad rating, you have to wash your pogo stick boots in cold water only, that way the springs can still retain their shape. Whimsy is generous with their refund policy so contact them first before you give a bad rating. ', '2020-01-26', 'Haynes', 'Tyler', 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`TagID`, `TagName`) VALUES
(1, 'New Release'),
(2, 'Family'),
(3, 'Environmentally-friendly'),
(4, 'Best Seller'),
(5, 'Recreation'),
(6, 'Featured'),
(7, 'Gift-ready');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `InventoryID` (`InventoryID`),
  ADD KEY `FK_inventory_products` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ImageFileName` (`ImageFileName`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `TagID` (`TagID`),
  ADD KEY `InventoryID` (`InventoryID`),
  ADD KEY `FK_products_category` (`CategoryID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `RatingID` (`RatingID`),
  ADD KEY `FK_rating_products` (`ProductID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ReviewID` (`ReviewID`),
  ADD KEY `FK_review_products` (`ProductID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`TagID`),
  ADD KEY `TagID` (`TagID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_inventory_products` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_category` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_products_inventory` FOREIGN KEY (`InventoryID`) REFERENCES `inventory` (`InventoryID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_products_tag` FOREIGN KEY (`TagID`) REFERENCES `tag` (`TagID`) ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_rating_products` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_review_products` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
