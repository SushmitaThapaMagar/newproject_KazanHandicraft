-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 11:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `quantity`, `user_id`) VALUES
(27, 'Frames Nepal', 'f1.jpg', 900, 1, 13),
(28, 'Bow Couple', 'boa.jpg', 600, 1, 13),
(29, 'Wire Rings', 'abc.jpg', 600, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Number` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Username`, `Number`, `Email`, `Password`) VALUES
(1, 'sushmita', 2147483647, 'sushmitachan44@gmail.com', '12345'),
(2, 'Benjamin', 2147483647, 'benjamin@gmail.com', '12345'),
(3, 'alixjodan@gmail.com', 12, 'gggg@gmail.com', '$2y$10$K60EYr.LfQs.9RjvFjAvX.nPro9asCWCzeH87eChw7COQhpxCtjji'),
(4, 'hello', 12, 'hello@gmail.com', '$2y$10$sTuhSnMhuw1HEG/yg/oLt.M4nM/h83iC42GJV/7eds194T5BQo5gu'),
(5, 'hello1', 2147483647, 'hello1@gmail.com', '$2y$10$LGLKim7UDLOz9buCwzKS2erM.8RbqHgIp9sILoYfMnjw/Sl0ziBVe'),
(6, 'sushmita', 2147483647, '123@gmail.com', '$2y$10$jz9pA0AVHCXhGhZRij44WOoHtL.P.3i.8mah9Zptvr2Ui2oE3T31e'),
(7, 'hi', 2147483647, 'hi@gmail.com', '$2y$10$UfdN0eWirLWzu55wdch9GuFyNi33oyD1tEzn5ULHWAuhGLS9EnElu'),
(8, 'benjamin', 2147483647, 'benjaminshrestha@gmail.com', '$2y$10$jtkqvBJ/el6iDWXuLjPUXOpCCoxcosxM1z6.uH1i8ZCB0KhH2hTvW'),
(9, 'benjaminshrestha', 2147483647, 'benjaminshrestha2@gmaiol.com', '$2y$10$MMR6t58tihTp/20FRSlbWeMxiZx30XzEXxp/R.RnesgqXyM1pTz62'),
(10, 'hi', 2147483647, 'heie@gmal.com', '$2y$10$draxgKZMwbDEBmHhXa7lbO86YSyN438ufdkYblwi2F/dYe.nI0Bqm'),
(11, 'james', 2147483647, 'james@gmail.com', '$2y$10$SgFbXzrAZ41TqlSKOgAaeOoYvs8vygQYpKB0CwfdR9LjgdMtngD4y'),
(12, 'sushmita thapa magar', 2147483647, 'bible@gmail.com', '$2y$10$URbtcCoMo5XskUbOvS05jOQ03V/m0O3aneH4dbm2yMbb5rCGhGnhK'),
(13, 'sushmita thapa magar', 2147483647, 'sushmita@gmail.com', '$2y$10$ZZ9mJBWpdHHhK8OeU/hYy.M/GLtQXPbaw9SXTEcqGu1/o6PRvFpNu');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `stat` varchar(100) NOT NULL,
  `country` varchar(200) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `nam`, `user_id`, `num`, `email`, `method`, `flat`, `street`, `city`, `stat`, `country`, `pin_code`, `total_products`, `total_price`, `order_date`, `state`) VALUES
(84, 'hi', 7, 2147483647, 'hello@gmail.com', 'Cash on delivery', 'Chapagoun, lalitpur', 'chapagoun', 'Kathmandu', 'helliuma', 'Nepal', 23422, 'Embroidery Keyrings (1) , Scrunchies (1) , Wire Rings (1) , Bow Couple (1) ', 1950, '2024-08-18', 'Delivered'),
(86, 'SUSHMITA', 7, 2147483647, 'sushi@gmail.com', 'Cash on delivery', 'chapagoaun', 'gyan complex', 'lalitpur', 'bagmati', 'Nepal', 2342, 'Scrunchies (2) ', 900, '2024-08-18', 'Delivered'),
(89, 'sushmita', 7, 2147483647, 'mashahhi@gmail.com', 'Cash on delivery', 'Chapagoun, lalitpur', 'chapagoun', 'Kathmandu', 'bagmati', 'Nepal', 23422, 'Scrunchies (2) , Beads Necklace (1) , Hemp Bags Nepal (2) , Bow Couple (1) , Wire Rings (1) , Frames Nepal (1) , earings (1) ', 4101, '2024-08-18', 'Delivered'),
(90, 'SUSHMITA', 7, 2147483647, 'sushi@gmail.com', 'Cash on delivery', 'chapagoaun', 'gyan complex', 'lalitpur', 'bagmati', 'Nepal', 2342, 'Scrunchies (2) , Beads Necklace (1) , Hemp Bags Nepal (2) , Bow Couple (1) , Wire Rings (1) , Frames Nepal (1) , earings (1) , Scraf Satin (1) ', 4601, '2024-08-18', 'pending'),
(91, 'SUSHMITA', 7, 2147483647, 'sushi@gmail.com', 'Cash on delivery', 'chapagoaun', 'gyan complex', 'lalitpur', 'bagmati', 'Nepal', 2342, 'Frames Nepal (1) , Bow Couple (1) ', 1500, '2024-08-25', 'pending'),
(92, 'SUSHMITA', 13, 2147483647, 'sushi@gmail.com', 'Cash on delivery', 'chapagoaun', 'gyan complex', 'lalitpur', 'bagmati', 'Nepal', 2342, 'Bow Couple (2) ', 1, '2024-09-25', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(8, 'Scrunchies', 450, 'ea.jpg'),
(9, 'Embroidery Keyrings', 300, 'kring.jpg'),
(10, 'Bow Couple', 600, 'boa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
