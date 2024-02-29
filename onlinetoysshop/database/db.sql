-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 05:41 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidzone`
--
CREATE DATABASE IF NOT EXISTS `kidzone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kidzone`;

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE `age_group` (
  `age_group_id` int(11) NOT NULL,
  `age_group_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age_group`
--

INSERT INTO `age_group` (`age_group_id`, `age_group_name`) VALUES
(4, '1.5 - 3 Years'),
(3, '10 - 18 Months'),
(2, '3 - 9 Months'),
(5, 'Above 3 - 5 Years'),
(6, 'Above 5 Years - 8 Years'),
(7, 'Above 8 Years - 10 Years'),
(1, 'New-born'),
(9, 'tttt');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `toy_id` int(11) NOT NULL,
  `cart_item_quantity` int(11) NOT NULL,
  `cart_item_time` varchar(100) NOT NULL,
  `cart_item_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `user_id`, `toy_id`, `cart_item_quantity`, `cart_item_time`, `cart_item_status`) VALUES
(14, 1, 3, 11111, '1618595295', 'Received'),
(16, 1, 1, 1, '1610595295', 'Received'),
(17, 1, 1, 15, '1618647091', 'Received'),
(18, 1, 6, 165, '1613650686', 'Canceled'),
(19, 1, 3, 154, '1618650690', 'Received'),
(20, 1, 3, 19, '1618595295', 'Received'),
(21, 1, 1, 16, '1610595295', 'Canceled'),
(22, 1, 1, 177, '1618647091', 'Reserved'),
(23, 1, 6, 167, '1613650686', 'Canceled'),
(24, 1, 3, 133, '1618350690', 'Reserved'),
(25, 1, 3, 19, '1618595295', 'Received'),
(26, 1, 3, 19, '1618395295', 'Received'),
(27, 1, 3, 19, '1618595295', 'Received'),
(28, 1, 3, 19, '1618595295', 'Received'),
(29, 1, 3, 1, '1618350690', 'Reserved'),
(30, 1, 3, 19, '1618595295', 'Received'),
(31, 1, 3, 19, '161395295', 'Received'),
(32, 1, 3, 19, '1618595295', 'Received'),
(33, 1, 3, 19, '1613595295', 'Received'),
(34, 1, 3, 19, '1618595295', 'Received'),
(35, 1, 3, 600, '1613595295', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `toy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_detail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `toy_id`, `user_id`, `feedback_detail`) VALUES
(1, 1, 1, 'new feedback'),
(2, 1, 1, 'ping'),
(3, 3, 1, 'ne wf faksdf lkaskdf'),
(4, 3, 1, 'ne wf faksdf lkaskdf'),
(5, 4, 1, 'ffff'),
(6, 4, 1, 'ffff'),
(7, 4, 1, 'ffff'),
(8, 1, 1, 'pppppppp'),
(9, 3, 1, 'new feed alksdjfla ksdfl alsdfkjas'),
(10, 3, 1, 'ping'),
(11, 3, 1, 'ping asda fe3 sendcond'),
(12, 3, 1, 'ne wfff ddd lksad 234');

-- --------------------------------------------------------

--
-- Table structure for table `toy`
--

CREATE TABLE `toy` (
  `toy_id` int(11) NOT NULL,
  `toy_name` varchar(100) NOT NULL,
  `toy_category_id` int(11) NOT NULL,
  `age_group_id` int(11) NOT NULL,
  `toy_price` int(11) NOT NULL,
  `toy_quantity` int(11) NOT NULL,
  `toy_picture_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toy`
--

INSERT INTO `toy` (`toy_id`, `toy_name`, `toy_category_id`, `age_group_id`, `toy_price`, `toy_quantity`, `toy_picture_path`) VALUES
(1, 't name334', 4, 9, 3003, 71, 'images/a.jpg'),
(3, 'toy name', 4, 2, 500, 33333, 'images/99739.jpg'),
(4, '45634', 4, 9, 546, 100, 'images/2123329-218x150.jpg'),
(6, 'a', 1, 3, 435, 343, 'images/acquirehowto-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `toy_category`
--

CREATE TABLE `toy_category` (
  `toy_category_id` int(11) NOT NULL,
  `toy_category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toy_category`
--

INSERT INTO `toy_category` (`toy_category_id`, `toy_category_name`) VALUES
(1, 'Action figures'),
(2, 'Animals'),
(4, 'gggggggggg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_contact` varchar(200) NOT NULL,
  `user_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_role`) VALUES
(1, 'skafjd', 'u@u.com', 'uuuu', '98739487', 'User'),
(2, 'Administrator', 'admin@gmail.com', 'admin', '0300123456789', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`age_group_id`),
  ADD UNIQUE KEY `age_group_name` (`age_group_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `toy`
--
ALTER TABLE `toy`
  ADD PRIMARY KEY (`toy_id`);

--
-- Indexes for table `toy_category`
--
ALTER TABLE `toy_category`
  ADD PRIMARY KEY (`toy_category_id`),
  ADD UNIQUE KEY `toy_category_name` (`toy_category_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `age_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `toy`
--
ALTER TABLE `toy`
  MODIFY `toy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toy_category`
--
ALTER TABLE `toy_category`
  MODIFY `toy_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
