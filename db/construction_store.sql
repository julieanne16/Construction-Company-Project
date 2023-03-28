-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:56 PM
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
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `date_added`) VALUES
(49, 3, 3, 1, '2023-03-10 18:22:35');

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
(16, 3, 4, 2, '2023-03-10 18:14:11'),
(17, 2, 3, 1, '2023-03-10 18:37:20'),
(18, 2, 7, 2, '2023-03-10 18:38:24'),
(19, 2, 7, 1, '2023-03-10 18:38:45'),
(20, 4, 6, 1, '2023-03-10 18:44:24'),
(21, 4, 2, 4, '2023-03-10 18:44:24'),
(22, 4, 3, 1, '2023-03-10 18:44:24');

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
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `img`) VALUES
(1, 'Blocks', 35, 4988, 'blocks.jpg'),
(2, 'Cement', 260, 2983, 'cement.jpg'),
(3, 'Grinder', 1200, 484, 'grinder.jpg'),
(4, 'Paint', 600, 787, 'paint.jpg'),
(5, 'Pipe', 800, 494, 'pipe.jpg'),
(6, 'Plyboard', 1070, 395, 'plyboard.jpg'),
(7, 'Sink', 800, 189, 'sink.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Jerome', 'Populi', 'jeromerandom@gmail.com', '$2y$10$zX4asCShpPfNKcKhQLh.weLy8uBZbkkphyhElPUe/fITNzVu0Fj1O'),
(2, 'Cathleen', 'Avilla', 'cat@gmail.com', '$2y$10$0yHSbfZHG36N3aevXrCksOTfDpbT7liETk3KQ1PnejfvODMyL5oii'),
(3, '', '', '', '$2y$10$22ObfwJ6pLDlhjUKkYVyBeCC2g7u63ko54eldQO.KDudXzTKSbOz6'),
(4, 'Jerome', 'Populi', 'sean@gmail.com', '$2y$10$XNkuQZAYK3aFXOiDZ27qNudEtJaini/RRGZQ5ZeBYnDDbAbUVfGha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
