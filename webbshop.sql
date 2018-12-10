-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Dec 10, 2018 at 08:41 PM
-- Server version: 10.3.9-MariaDB-1:10.3.9+maria~bionic
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Jewellery'),
(2, 'Furniture'),
(3, 'Deco');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `postcode` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `personnummer` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `full_name`, `date`, `user_id`, `address`, `postcode`, `city`, `personnummer`, `phone_number`) VALUES
(2, '', '2018-11-28 10:20:00', 5, 'hsdjg', 0, '', '', '6737446385'),
(3, '', '2018-11-28 10:31:09', 5, '', 0, '', '', ''),
(4, 'hhhhh', '2018-11-28 11:59:33', 5, 'ffffffff', 0, '', '65443342', '46657'),
(5, 'hhhhh', '2018-11-28 12:02:29', 5, 'ffffffff', 0, '', '65443342', '46657'),
(6, 'hhhhh', '2018-11-28 12:08:34', 5, 'ffffffff', 0, '', '65443342', '46657'),
(7, 'hhhhh', '2018-11-28 12:11:08', 5, 'ffffffff', 0, '', '65443342', '46657'),
(8, '', '2018-11-28 12:11:47', 5, '', 0, '', '', ''),
(9, '', '2018-11-28 12:14:36', 5, '', 0, '', '', ''),
(10, '', '2018-11-28 12:15:08', 5, '', 0, '', '', ''),
(11, '', '2018-11-28 12:16:23', 5, '', 0, '', '', ''),
(12, '', '2018-11-28 12:16:50', 5, '', 0, '', '', ''),
(13, '', '2018-11-28 12:17:16', 5, '', 0, '', '', ''),
(14, '', '2018-11-28 12:18:56', 5, '', 0, '', '', ''),
(15, '', '2018-11-28 12:19:00', 5, '', 0, '', '', ''),
(16, '', '2018-11-28 12:19:44', 5, '', 0, '', '', ''),
(17, '', '2018-11-28 12:20:25', 5, '', 0, '', '', ''),
(18, '', '2018-11-28 12:20:53', 5, '', 0, '', '', ''),
(19, '', '2018-11-28 12:21:13', 5, '', 0, '', '', ''),
(20, '', '2018-11-28 12:21:25', 5, '', 0, '', '', ''),
(21, '', '2018-11-28 12:21:54', 5, '', 0, '', '', ''),
(22, 'bbb', '2018-11-28 12:29:52', 5, 'dddddddddddddddddd', 33443, 'dddd', '', '434552'),
(23, 'bbb', '2018-11-28 12:31:27', 5, 'dddddddddddddddddd', 33443, 'dddd', '', '434552'),
(24, 'ffff', '2018-11-28 13:05:00', 5, 'rrrrr', 34556, 'ddfgh', '', '3456656645'),
(25, 'ffff', '2018-11-29 09:51:46', 5, 'ffff13', 45321, 'rte', '', '4556789000'),
(26, 'rickar', '2018-12-05 09:52:19', 6, 'qw 12', 12345, 'asfsadf', '', '1234567890'),
(27, 'dsgg', '2018-12-05 09:54:41', 6, 'assfd 12', 12345, 'safsdf', '1234567890', '1234567890'),
(28, 'frre', '2018-12-05 10:12:03', 5, 'hgfdytdfyy6', 12345, 'trrb', '', '1234567890'),
(29, 'dadasf', '2018-12-05 11:02:59', 5, 'hbdghdshfd', 12345, 'hgfd', '1234567890', '1234567890'),
(30, 'dadasf', '2018-12-05 11:11:52', 5, 'hbdghdshfd', 12345, 'hgfd', '1234567890', '1234567890'),
(31, 'dadasf', '2018-12-05 11:16:30', 5, 'hbdghdshfd', 12345, 'hgfd', '1234567890', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(4, 1, 0, 3000),
(4, 2, 1, 5000),
(4, 3, 2, 10000),
(4, 4, 0, 20000),
(4, 5, 0, 5000),
(4, 6, 0, 12000),
(4, 7, 0, 25000),
(5, 2, 1, 5000),
(5, 3, 2, 10000),
(6, 2, 1, 5000),
(6, 3, 2, 10000),
(7, 2, 1, 5000),
(7, 3, 2, 10000),
(8, 1, 2, 3000),
(8, 2, 1, 5000),
(9, 1, 2, 3000),
(9, 2, 1, 5000),
(10, 1, 2, 3000),
(10, 2, 1, 5000),
(11, 1, 2, 3000),
(11, 2, 1, 5000),
(12, 1, 2, 3000),
(12, 2, 1, 5000),
(13, 1, 2, 3000),
(13, 2, 1, 5000),
(14, 1, 2, 3000),
(14, 2, 1, 5000),
(15, 1, 2, 3000),
(15, 2, 1, 5000),
(16, 1, 2, 3000),
(16, 2, 1, 5000),
(17, 1, 2, 3000),
(17, 2, 1, 5000),
(18, 1, 2, 3000),
(18, 2, 1, 5000),
(19, 1, 2, 3000),
(19, 2, 1, 5000),
(20, 1, 2, 3000),
(20, 2, 1, 5000),
(21, 1, 2, 3000),
(21, 2, 1, 5000),
(22, 1, 4, 3000),
(22, 2, 1, 5000),
(23, 1, 4, 3000),
(23, 2, 1, 5000),
(24, 1, 1, 3000),
(24, 2, 1, 5000),
(25, 4, 1, 20000),
(25, 5, 1, 5000),
(26, 1, 1, 3000),
(27, 1, 1, 3000),
(28, 1, 1, 3000),
(29, 1, 1, 3000),
(30, 1, 1, 3000),
(31, 1, 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `info` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `info`, `category_id`) VALUES
(1, 'Indian bench', 7000, ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2),
(2, 'African statue', 25000, ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 3),
(3, 'Asian vase', 100000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 3),
(4, 'Australian ship', 20000, 'Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore.', 3),
(5, 'American jewellery box', 4000, ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 1),
(6, 'Inca broche', 12000, ' Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 1),
(7, 'Arabic horse', 25000, ' Excepteur sint occaecat cupidatat non proident, sunt in culpa, qui officia deserunt mollit anim id est laborum.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `hash`, `admin`) VALUES
(5, 'becky', 'mcbee@example.se', '$2y$10$sdDUelGhkUcz1JHwHccYQOZQbP0GeeG46uDTXSFTaN7DrB52EsNH.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_fk` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id_fk` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
