-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 01:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `price`, `total`, `date_added`) VALUES
(23, '3', 4, 13, 274, 3562, '2023-04-28 10:22:34'),
(29, '1iq32gg5bspok0tvokbpl2ugbg', 4, 2, 274, 548, '2023-04-28 11:12:27'),
(35, '3', 9, 1, 1800, 1800, '2023-04-28 11:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_img`) VALUES
(1, 'gravel', 'gravel-sack.png'),
(2, 'cement', 'cement-sack.png'),
(3, 'pipes', 'metal-pipes.png'),
(4, 'paint', 'paint-bucket.png'),
(5, 'plyboard', 'plyboard.png'),
(6, 'cinderblock', 'cinderblock.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receivers_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL DEFAULT 100,
  `order_status` varchar(20) NOT NULL DEFAULT 'processing',
  `address` varchar(100) NOT NULL,
  `payment_opt` varchar(100) NOT NULL,
  `purchase_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `receivers_name`, `product_id`, `quantity`, `price`, `total`, `shipping_fee`, `order_status`, `address`, `payment_opt`, `purchase_date`) VALUES
(1, 1011, 1, 'Jerome Populi', 4, 1, 274, 274, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:21:58'),
(2, 1011, 1, 'Jerome Populi', 7, 2, 1680, 3360, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:21:58'),
(3, 1012, 1, 'Jerome Gaming', 4, 4, 274, 1096, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:32:08'),
(4, 1012, 1, 'Jerome Gaming', 7, 2, 1680, 3360, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:32:08'),
(5, 1013, 3, 'Jerome Nel Populi', 3, 2, 280, 560, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:46:49'),
(6, 1013, 3, 'Jerome Nel Populi', 4, 3, 274, 822, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:46:49'),
(7, 1014, 3, 'Jerome Nel Populi', 4, 1, 274, 274, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 07:50:46'),
(8, 1015, 3, ' ', 4, 2, 274, 548, 100, 'processing', '', 'cod', '2023-04-28 07:54:15'),
(9, 1015, 3, ' ', 5, 1, 290, 290, 100, 'processing', '', 'cod', '2023-04-28 07:54:15'),
(10, 1016, 3, 'Jerome Nel Populi', 4, 1, 274, 274, 100, 'processing', 'Baler, Aurora', 'gcash - 0964342', '2023-04-28 07:55:11'),
(11, 1016, 3, 'Jerome Nel Populi', 9, 1, 1800, 1800, 100, 'processing', 'Baler, Aurora', 'gcash - 0964342', '2023-04-28 07:55:11'),
(12, 1016, 3, 'Jerome Nel Populi', 7, 1, 1680, 1680, 100, 'processing', 'Baler, Aurora', 'gcash - 0964342', '2023-04-28 07:55:11'),
(13, 1017, 3, 'Jerome Nel Populi', 4, 1, 274, 274, 100, 'processing', 'Calabalabaan, Munoz City', 'gcash - 0964342', '2023-04-28 07:57:16'),
(14, 1017, 3, 'Jerome Nel Populi', 9, 1, 1800, 1800, 100, 'processing', 'Calabalabaan, Munoz City', 'gcash - 0964342', '2023-04-28 07:57:16'),
(15, 1018, 3, 'Jerome Nel Populi', 4, 15, 274, 4110, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 08:24:39'),
(16, 1019, 3, 'Jerome Nel Populi', 5, 1, 290, 290, 100, 'processing', 'Calabalabaan, Munoz City', 'gcash - 98989', '2023-04-28 08:28:10'),
(17, 1019, 3, 'Jerome Nel Populi', 4, 8, 274, 2192, 100, 'processing', 'Calabalabaan, Munoz City', 'gcash - 98989', '2023-04-28 08:28:10'),
(18, 1020, 3, ' ', 8, 2, 2000, 4000, 100, 'processing', '', 'cod', '2023-04-28 10:12:52'),
(19, 1020, 3, ' ', 3, 1, 280, 280, 100, 'processing', '', 'cod', '2023-04-28 10:12:52'),
(20, 1020, 3, ' ', 5, 1, 290, 290, 100, 'processing', '', 'cod', '2023-04-28 10:12:52'),
(21, 1020, 3, ' ', 7, 2, 1680, 3360, 100, 'processing', '', 'cod', '2023-04-28 10:12:52'),
(22, 1020, 3, ' ', 12, 2, 2450, 4900, 100, 'processing', '', 'cod', '2023-04-28 10:12:52'),
(23, 1021, 1, 'Jerome Populi', 4, 3, 274, 822, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 11:12:15'),
(24, 1021, 1, 'Jerome Populi', 5, 2, 290, 580, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 11:12:15'),
(25, 1021, 1, 'Jerome Populi', 3, 1, 280, 280, 100, 'processing', 'Calabalabaan, Munoz City', 'cod', '2023-04-28 11:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders_id_seq`
--

CREATE TABLE `orders_id_seq` (
  `next_not_cached_value` bigint(21) NOT NULL,
  `minimum_value` bigint(21) NOT NULL,
  `maximum_value` bigint(21) NOT NULL,
  `start_value` bigint(21) NOT NULL COMMENT 'start value when sequences is created or value if RESTART is used',
  `increment` bigint(21) NOT NULL COMMENT 'increment value',
  `cache_size` bigint(21) UNSIGNED NOT NULL,
  `cycle_option` tinyint(1) UNSIGNED NOT NULL COMMENT '0 if no cycles are allowed, 1 if the sequence should begin a new cycle when maximum_value is passed',
  `cycle_count` bigint(21) NOT NULL COMMENT 'How many cycles have been done'
) ENGINE=InnoDB;

--
-- Dumping data for table `orders_id_seq`
--

INSERT INTO `orders_id_seq` (`next_not_cached_value`, `minimum_value`, `maximum_value`, `start_value`, `increment`, `cache_size`, `cycle_option`, `cycle_count`) VALUES
(1000, 1, 9223372036854775806, 1000, 1, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`) VALUES
(1000),
(1001),
(1002),
(1003),
(1004),
(1005),
(1006),
(1007),
(1008),
(1009),
(1010),
(1011),
(1012),
(1013),
(1014),
(1015),
(1016),
(1017),
(1018),
(1019),
(1020),
(1021);

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stocks` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `stocks`, `description`, `img`, `category`) VALUES
(1, 'ordinary portland cement 40kg', '261', 50000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(3, 'portland pozzolona cement 40kg', '280', 49969, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(4, 'rapid hardening cement 40kg', '274', 49821, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(5, 'low heat cement 40kg', '290', 49950, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(6, 'mexican beach pebble 3/4\" (1 cbm)', '1550', 49985, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, quo.', 'gravel-sack.png', 'gravel'),
(7, 'pea gravel 3/8\" (1 cbm)', '1680', 49966, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, quo.', 'gravel-sack.png', 'gravel'),
(8, 'carbon steel pipe 1m', '2000', 49949, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, cupiditate.', 'metal-pipes.png', 'pipes'),
(9, 'cast iron pipe 1m', '1800', 49969, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, cupiditate.', 'metal-pipes.png', 'pipes'),
(10, 'galvanized steel pipe 1m', '3000', 49996, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, cupiditate.', 'metal-pipes.png', 'pipes'),
(11, 'enamel paint 1gal', '2500', 49981, '', 'paint-bucket.png', 'paint'),
(12, 'oil paint 1gal', '2450', 49956, '', 'paint-bucket.png', 'paint');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile`, `fname`, `lname`, `phone`, `address`, `email`, `password`) VALUES
(1, '', 'Jerome', 'Populi', '', 'Calabalabaan, Munoz City', 'jerome@gmail.com', '$2y$10$1drS2sg2w.MiB9ahFZabP.K0a/QcA05CT.WRwhku5pM84sEPLreU2'),
(2, '', 'Jerome', 'Gaming', '', 'Calabalabaan, Munoz City', 'casasasasat123@gmail.com', '$2y$10$JgVbIXLxG57DgU5g246nkuJ.bqSu9fMZHDGbCcSQj/crWSnMWphJS'),
(3, '', 'Jerome Nel', 'Populi', '09913437315', 'Calabalabaan, Munoz City', 'nel@gmail.com', '$2y$10$l4B9bKP.Wbqf3a8bB3cx3uGppmsPlE1X5agRlQo8FI46/UezEtrAO');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
