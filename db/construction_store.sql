-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 04:19 AM
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
(49, 3, 3, 1, '2023-03-10 18:22:35'),
(59, 2, 1, 15, '2023-04-03 14:09:28'),
(60, 2, 4, 7, '2023-04-03 14:09:44'),
(61, 2, 5, 7, '2023-04-03 14:09:44'),
(62, 2, 8, 4, '2023-04-03 14:09:46'),
(63, 2, 9, 3, '2023-04-03 14:09:47'),
(64, 2, 7, 27, '2023-04-03 14:16:08'),
(65, 2, 6, 5, '2023-04-03 14:16:09'),
(66, 2, 3, 2, '2023-04-03 14:17:58'),
(67, 2, 12, 2, '2023-04-03 14:38:23'),
(68, 2, 11, 2, '2023-04-03 14:38:24'),
(69, 2, 10, 3, '2023-04-03 14:38:25'),
(70, 6, 1, 2, '2023-04-03 14:45:12'),
(71, 6, 4, 2, '2023-04-03 14:45:16'),
(72, 6, 5, 4, '2023-04-03 14:45:19'),
(73, 6, 3, 3, '2023-04-03 14:45:20'),
(74, 6, 7, 4, '2023-04-03 14:45:22'),
(75, 6, 8, 4, '2023-04-03 14:45:24'),
(76, 6, 9, 8, '2023-04-03 14:45:25'),
(77, 6, 10, 3, '2023-04-03 14:47:01'),
(78, 6, 11, 7, '2023-04-03 14:47:02'),
(79, 6, 12, 5, '2023-04-03 14:47:05'),
(80, 8, 1, 4, '2023-04-03 14:50:05'),
(81, 8, 4, 11, '2023-04-03 14:50:14'),
(82, 8, 5, 3, '2023-04-03 14:52:59'),
(83, 8, 9, 4, '2023-04-03 14:53:02'),
(84, 8, 8, 3, '2023-04-03 14:53:03'),
(85, 8, 7, 5, '2023-04-03 14:53:04'),
(86, 8, 12, 40, '2023-04-03 14:53:10'),
(87, 8, 11, 38, '2023-04-03 14:53:14'),
(88, 8, 10, 6, '2023-04-03 14:53:16'),
(89, 8, 6, 20, '2023-04-03 14:54:39'),
(90, 8, 3, 4, '2023-04-03 15:09:01'),
(91, 7, 4, 6, '2023-04-03 15:47:03'),
(92, 7, 5, 1, '2023-04-03 15:47:06'),
(93, 7, 3, 2, '2023-04-03 15:47:07'),
(94, 7, 1, 1, '2023-04-03 15:47:08'),
(95, 7, 8, 1, '2023-04-03 15:47:09'),
(96, 7, 12, 1, '2023-04-03 16:33:33'),
(97, 7, 11, 1, '2023-04-03 16:33:34'),
(98, 6, 6, 1, '2023-04-04 05:32:50'),
(99, 5, 3, 4, '2023-04-04 09:09:47'),
(100, 5, 12, 2, '2023-04-04 09:14:31'),
(101, 5, 6, 8, '2023-04-04 09:32:37'),
(102, 5, 7, 8, '2023-04-04 09:32:39'),
(103, 5, 4, 3, '2023-04-04 10:02:01'),
(104, 5, 5, 3, '2023-04-04 10:02:03'),
(105, 5, 11, 1, '2023-04-04 10:02:11'),
(106, 5, 10, 2, '2023-04-04 10:02:12'),
(107, 5, 8, 2, '2023-04-04 10:02:15'),
(108, 5, 9, 4, '2023-04-04 10:02:16'),
(109, 5, 1, 2, '2023-04-04 10:02:21');

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
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `description`, `img`, `category`) VALUES
(1, 'ordinary portland cement 40kg', '261', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(3, 'portland pozzolona cement 40kg', '280', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(4, 'rapid hardening cement 40kg', '274', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(5, 'low heat cement 40kg', '290', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, pariatur.', 'cement-sack.png', 'cement'),
(6, 'mexican beach pebble 3/4\" (1 cbm)', '1550', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, quo.', 'gravel-sack.png', 'gravel'),
(7, 'pea gravel 3/8\" (1 cbm)', '1680', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, quo.', 'gravel-sack.png', 'gravel'),
(8, 'carbon steel pipe 1m', '2000', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, cupiditate.', 'metal-pipes.png', 'pipes'),
(9, 'cast iron pipe 1m', '1800', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, cupiditate.', 'metal-pipes.png', 'pipes'),
(10, 'galvanized steel pipe 1m', '3000', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, cupiditate.', 'metal-pipes.png', 'pipes'),
(11, 'enamel paint 1gal', '2500', 0, '', 'paint-bucket.png', 'paint'),
(12, 'oil paint 1gal', '2450', 0, '', 'paint-bucket.png', 'paint');

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
(4, 'Jerome', 'Populi', 'sean@gmail.com', '$2y$10$XNkuQZAYK3aFXOiDZ27qNudEtJaini/RRGZQ5ZeBYnDDbAbUVfGha'),
(5, 'Naruto', 'Uzumaki', 'naruto@gmail.com', '$2y$10$xTz7sib6V827g7cFEASYt.7BH71RM2w0af4JeQoknIuVJjlJrfNdm'),
(6, 'Jerome', 'Nel', 'jerome@gmail.com', '$2y$10$qZdMuKztDq3lSErqWPQZSeRGZ75C6dtK39Sm3Z6lA.XVk/9Y54waC'),
(7, 'Sean', 'Centro', 'sean123@gmail.com', '$2y$10$8P774NYTWB4Q4VTa3VRsPe.N4xMyiaLFLs23jAC8ARwsdY3ZY1CBy'),
(8, 'Kelly', 'Centro', 'kelly@gmail.com', '$2y$10$RH2B9Z2fwc5828SgjlZn5elgTPYCYdBYY3sbz324XPgukTQZAUrGi'),
(9, 'Jerome', 'Nel', 'jerome1234@gmail.com', '$2y$10$uj0/ZU48p3nlJSYHJ3EFeuQodSrQheRsczp4inN6mVHZabhe77LfK');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
