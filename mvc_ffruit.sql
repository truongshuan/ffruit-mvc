-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2023 at 03:15 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_ffruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` int(5) NOT NULL,
  `status` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullname`, `email`, `password`, `created_at`, `code`, `status`) VALUES
(4, 'shuan', 'Pham Truong Xuan', 'truongshuan0310@gmail.com', '$2y$10$koKQTTkfjxXGpTZtzFg9Xeu5RG0jHi1XgFOZV/KKs2ieS0gP9YM56', '2023-03-22 15:33:36', 32345, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', '<p>1</p>', '2023-04-09 04:37:10', '2023-04-09 04:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `phone`, `email`, `address`, `note`, `status`, `payment_method`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:37:37', '2023-04-09 04:37:37', 1),
(2, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:38:31', '2023-04-09 04:38:31', 1),
(3, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:40:58', '2023-04-09 04:40:58', 1),
(4, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:43:06', '2023-04-09 04:43:06', 1),
(5, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:45:34', '2023-04-09 04:45:34', 1),
(6, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:47:05', '2023-04-09 04:47:05', 1),
(7, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:47:38', '2023-04-09 04:47:38', 1),
(8, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:48:43', '2023-04-09 04:48:43', 1),
(9, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:50:39', '2023-04-09 04:50:39', 1),
(10, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 04:50:58', '2023-04-09 04:50:58', 1),
(11, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 06:49:49', '2023-04-09 06:49:49', 1),
(12, '0961518977', 'khanhnam03102002@gmail.com', '125/2 Hòa Hưng', '123', 0, 'cod', '2023-04-09 06:50:38', '2023-04-09 06:50:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` float NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`order_id`, `product_id`, `name`, `price`, `path_image`, `amount`, `total`) VALUES
(1, 1, '1', 2500, 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', 1, 2500),
(4, 1, '1', 2500, 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', 1, 2500),
(7, 1, '1', 2500, 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', 1, 2500),
(9, 1, '1', 2500, 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', 2, 5000),
(11, 1, '1', 2500, 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', 1, 2500),
(12, 1, '1', 2500, 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', 2, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_author` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `path_image`, `created_at`, `updated_at`, `id_category`) VALUES
(1, '1', 2500, '<p>123</p>', 'public/uploads/products/2023_04/1681015038_643240fed74d0.jpg', '2023-04-09 04:37:18', '2023-04-09 04:37:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `fullname`, `password`, `created_at`, `address`, `phone`, `code`, `status`) VALUES
(1, '123', 'khanhnam03102002@gmail.com', '123', '$2y$10$EwxYoLIqHoENoHi.rVKx2uHNUnGXPlLRvAIfSCgoFhVlr4LLnveAO', '2023-04-09 04:29:53', NULL, '961518977', '0', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill` (`customer_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_topic` (`topic_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Product` (`id_category`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_bill` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_Product` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
