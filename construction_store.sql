-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 06:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction_store`
--
CREATE DATABASE IF NOT EXISTS `construction_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `construction_store`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `cart`
--

TRUNCATE TABLE `cart`;
--
-- Dumping data for table `cart`
--

INSERT DELAYED IGNORE INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `date_added`) VALUES
(49, 3, 3, 1, '2023-03-10 18:22:35'),
(50, 2, 0, 1, '2023-03-15 13:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `category`
--

TRUNCATE TABLE `category`;
-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `checkout`
--

TRUNCATE TABLE `checkout`;
--
-- Dumping data for table `checkout`
--

INSERT DELAYED IGNORE INTO `checkout` (`order_id`, `user_id`, `product_id`, `quantity`, `purchase_date`) VALUES
(9, 3, 4, 1, '2023-03-10 17:58:00'),
(10, 3, 3, 1, '2023-03-10 17:58:00'),
(11, 3, 2, 1, '2023-03-10 18:05:28'),
(12, 3, 1, 1, '2023-03-10 18:05:28'),
(13, 3, 5, 1, '2023-03-10 18:05:28'),
(14, 3, 6, 1, '2023-03-10 18:05:28'),
(15, 3, 2, 2, '2023-03-10 18:05:43'),
(16, 3, 4, 2, '2023-03-10 18:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT DELAYED IGNORE INTO `products` (`product_id`, `name`, `price`, `quantity`, `img`) VALUES
(1, 'Blocks', 35, 4988, 'blocks.jpg'),
(2, 'Cement', 260, 2987, 'cement.jpg'),
(3, 'Grinder', 1200, 486, 'grinder.jpg'),
(4, 'Paint', 600, 787, 'paint.jpg'),
(5, 'Pipe', 800, 494, 'pipe.jpg'),
(6, 'Plyboard', 1070, 396, 'plyboard.jpg'),
(7, 'Sink', 800, 192, 'sink.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(2, 'Cathy Leen', 'cat@gmail.com', '$2y$10$O74jqsG6zpe.VSYmpXhzQey64CLcUGMn90AsCTfxlUzcwfUdmBVQ.'),
(3, 'Jerome Nel Populi', 'jerome@gmail.com', '$2y$10$xBgmdAN850DIJd00LoHOGurKk6BgunMqRsqlzRpj7cUf9VfwfyR5K'),
(4, 'Sean Jerico', 'sean@gmail.com', '$2y$10$bN9D/Nb1cPuuzbzVspCZHOONa4fWYIwpl50TdQduzq31i41JsGkGO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
