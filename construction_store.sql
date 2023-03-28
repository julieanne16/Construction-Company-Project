-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:54 AM
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

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `date_added`) VALUES
(49, 3, 3, 1, '2023-03-10 18:22:35'),
(50, 2, 0, 1, '2023-03-15 13:59:28'),
(51, 7, 1, 1, '2023-03-28 10:28:39'),
(52, 7, 4, 1, '2023-03-28 10:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE `checkout` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`order_id`, `user_id`, `product_id`, `quantity`, `purchase_date`) VALUES
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

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `img`) VALUES
(1, 'Cement', 35, 4988, 'cement-sack.png'),
(2, 'Block', 260, 2987, 'cinderblock.png'),
(3, 'Gravel Sack', 1200, 486, 'gravel-sack.png'),
(4, 'Paint', 600, 787, 'paint-bucket.png'),
(5, 'Pipe', 800, 494, 'metal-pipes.png'),
(6, 'Plyboard', 1070, 396, 'plyboard.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(2, 'Cathy Leen', 'cat@gmail.com', '$2y$10$O74jqsG6zpe.VSYmpXhzQey64CLcUGMn90AsCTfxlUzcwfUdmBVQ.'),
(3, 'Jerome Nel Populi', 'jerome@gmail.com', '$2y$10$xBgmdAN850DIJd00LoHOGurKk6BgunMqRsqlzRpj7cUf9VfwfyR5K'),
(4, 'Sean Jerico', 'sean@gmail.com', '$2y$10$bN9D/Nb1cPuuzbzVspCZHOONa4fWYIwpl50TdQduzq31i41JsGkGO'),
(5, 'asd', 'seanjericobaymax@gmail.com', '$2y$10$xSzIIPlAEz2O7y1z4yki3uWtY4.fJiI6/SPCMwgBEQj5qIfBa/R8e'),
(6, 'adsad', 'shimmy@gmail.com', '$2y$10$MfGEtJtKW/G9Xmfw5h4tHeae0U.Ff5NFUwYR9T1SqDHwchl1LLYze'),
(7, 'Sean Jerico Centro', 'test@gmail.com', '$2y$10$UlL4i9es/.3z1dpX1c0B0eX56J7TYrb3HcGonqe3vhIPHGnDyyxGS'),
(8, 'jerome', 'jerome@gmail.com', 'jerome123');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
