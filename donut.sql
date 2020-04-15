-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 01:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donut`
--
CREATE DATABASE IF NOT EXISTS `donut` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `donut`;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `city_id` varchar(2) NOT NULL,
  `area_id` varchar(32) NOT NULL,
  `area_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`city_id`, `area_id`, `area_name`) VALUES
('CH', 'AN', 'Anna Nagar'),
('CH', 'BN', 'Besant Nagar'),
('CH', 'NN', 'Nungambakkam');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` varchar(2) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
('CH', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `area_id` varchar(2) NOT NULL,
  `place_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(4) NOT NULL,
  `info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`area_id`, `place_id`, `name`, `price`, `info`) VALUES
('AN', 0, 'Asian Street Fries', 299, ''),
('NN', 0, 'BBQ Chicken Burger', 225, ''),
('BN', 0, 'Belgian Waffles', 219, ''),
('NN', 0, 'Butter Chicken Burger', 195, ''),
('BN', 0, 'Chicken Arrabiata Pasta', 406, ''),
('NN', 0, 'Chicken Boom Burger', 275, ''),
('AN', 0, 'Chicken Fried Rice', 289, ''),
('BN', 0, 'Chicken Satay', 274, ''),
('AN', 0, 'Chicken Siu Mai', 279, ''),
('NN', 0, 'Choco Brownie Milkshake', 165, ''),
('NN', 0, 'Classic Chicken Burger', 175, ''),
('NN', 0, 'Classic Veggie Burger', 165, ''),
('AN', 0, 'Dragon Chicken ', 369, ''),
('NN', 0, 'German Currywurst\r\n', 205, ''),
('NN', 0, 'Grilled Hash Brown With Salsa', 135, ''),
('BN', 0, 'Honey Garlic Chicken\r\n', 274, ''),
('AN', 0, 'Honey Noodles with Ice Cream', 189, ''),
('AN', 0, 'Hot Thai Chilli Chicken', 369, ''),
('AN', 0, 'Kung Pao Chicken', 399, ''),
('AN', 0, 'Kung Pao Potato', 349, ''),
('NN', 0, 'Lemonade', 85, ''),
('AN', 0, 'Mahalak Mushroom', 299, ''),
('BN', 0, 'Non Veg European Mini Breakfast Combo\r\n', 294, ''),
('BN', 0, 'Pan Fried Fish', 472, ''),
('BN', 0, 'Panko Chicken', 274, ''),
('BN', 0, 'Plain Salted Potato Wedges', 186, ''),
('NN', 0, 'Teriyaki Chicken Burger', 255, ''),
('BN', 0, 'Veg European Mini Breakfast Combo\r\n', 274, ''),
('AN', 0, 'Veg Fried Rice', 115, ''),
('BN', 0, 'Veg Pink Sauce Pasta', 362, ''),
('BN', 1, 'All Meat Burger', 385, ''),
('BN', 1, 'BBQ Burger', 225, ''),
('AN', 1, 'Berry Lemonade Splash', 96, ''),
('BN', 1, 'BLT Sandwich', 355, ''),
('NN', 1, 'Blueberry White Chocolate Milkshake', 200, ''),
('NN', 1, 'CFCH Chicken with Garlic Herb Rice', 335, 'Chicken with Garlic Herb Rice'),
('AN', 1, 'Chicken Nuggets', 143, ''),
('BN', 1, 'Chilli Cheese Fries', 205, ''),
('AN', 1, 'Chocolate Chip Muffin', 113, ''),
('BN', 1, 'Classic Burger', 205, ''),
('NN', 1, 'Creamy Veggie and Mushroom Pasta', 400, 'Penne freshly cooked with imported cheese.'),
('NN', 1, 'Creamy Veggie Pasta', 375, 'Penne freshly cooked with imported cheese.'),
('BN', 1, 'Fish Fingers', 225, ''),
('AN', 1, 'French Fries', 89, ''),
('BN', 1, 'Fried Potato Sandwich', 265, ''),
('NN', 1, 'Grilled Paneer with Garlic Herb Rice', 285, ''),
('BN', 1, 'Malai Kabab', 305, ''),
('AN', 1, 'McChicken Burger', 118, ''),
('AN', 1, 'McEgg Burger', 53, ''),
('AN', 1, 'McSpicy Chicken Burger', 180, ''),
('AN', 1, 'McSpicy Fried Chicken - 2Pc', 213, ''),
('AN', 1, 'McVeggie Burger', 103, ''),
('NN', 1, 'Nutella Crepe', 200, ''),
('NN', 1, 'Paneer Red Curry with Garlic Herb Rice\r\n', 335, ''),
('AN', 1, 'Strawberry Green Tea', 123, ''),
('BN', 1, 'Supreme Cheese Sandwich', 258, ''),
('NN', 1, 'Teriyaki Wings', 310, ''),
('NN', 1, 'Veg Penne Arrabbiata', 375, 'Penne freshly cooked with imported cheese.'),
('NN', 1, 'Veg Platter', 450, 'Corn cheese balls, crispy mushroom paneer.'),
('BN', 1, 'Veg Steak Burger', 265, ''),
('AN', 2, '7-Up', 57, ''),
('AN', 2, 'Cheese Garlic Bread', 139, ''),
('AN', 2, 'Cheesy Garlic Bread Stix', 159, ''),
('AN', 2, 'Chicken Sausage', 229, ''),
('AN', 2, 'Chicken Supreme', 399, ''),
('AN', 2, 'Choco Volcano Cake', 99, ''),
('AN', 2, 'Classic Corn', 179, ''),
('AN', 2, 'Double Cheese', 229, ''),
('AN', 2, 'Margherita', 149, ''),
('AN', 2, 'Spiced Paneer', 229, '');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(3) NOT NULL,
  `city_id` varchar(2) NOT NULL,
  `area_id` varchar(32) NOT NULL,
  `place_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `city_id`, `area_id`, `place_name`) VALUES
(1, 'CH', 'AN', 'Asian Station'),
(2, 'CH', 'AN', 'McDonalds'),
(3, 'CH', 'AN', 'Pizza Hut'),
(1, 'CH', 'BN', 'Jonahs Bistro'),
(2, 'CH', 'BN', 'Pupil'),
(1, 'CH', 'NN', 'Blind Ch3mistry'),
(2, 'CH', 'NN', 'Burgerman');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(2) DEFAULT NULL,
  `item` varchar(50) NOT NULL DEFAULT '',
  `cuisine` varchar(10) NOT NULL DEFAULT '',
  `restaurant` varchar(35) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `area` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `item`, `cuisine`, `restaurant`, `city`, `area`) VALUES
(1, 'French Fries', 'Fast Food', 'McDonalds', 'Chennai', 'Anna Nagar'),
(2, 'McSpicy Chicken Burger', 'Fast Food', 'McDonalds', 'Chennai', 'Anna Nagar'),
(3, 'Pizza', 'Fast Food', 'Pizza Hut', 'Chennai', 'Anna Nagar'),
(4, 'Garlic Bread', 'Fast Food', 'Pizza Hut', 'Chennai', 'Anna Nagar'),
(5, 'Chicken Wings', 'Chinese', 'Asian Station', 'Chennai', 'Anna Nagar'),
(6, 'McSpicy Chicken Burger', 'Chinese', 'Asian Station', 'Chennai', 'Anna Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `user`, `pass`) VALUES
('Taranya', 'Elangovan', 'taranya@hotmail.co.uk', 'abc', '123'),
('abcd', 'xyzw', 'abcd@gmail.com', 'abcd', '123'),
('abc', 'def', 'abc@gmail.com', 'admin1', '123'),
('xyz', 'pqr', 'pqr@hotmail.com', 'admin2', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`city_id`,`area_id`),
  ADD KEY `area_name` (`area_name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_name` (`city_name`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`place_id`,`name`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`city_id`,`area_id`,`place_name`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
