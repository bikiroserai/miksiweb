-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 03:17 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sudip Katwal', 'sudip@gmail.com', '$2y$10$LqOCkwzSvzBJ2XPthagmMe8DuzK6r3g6h6aaQDdjcWi3YknuoWtxK', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnails` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_id`, `thumbnails`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Sports', '1', NULL, 1, NULL, '2017-11-30 09:03:48', '2017-11-30 09:03:48'),
(2, 'Trendy', '1', NULL, 1, NULL, '2017-11-30 09:05:36', '2017-11-30 09:05:36'),
(3, 'Tradtional', '1', NULL, 1, NULL, '2017-11-30 09:05:51', '2017-11-30 09:05:51'),
(4, 'Trendy', '2', NULL, 1, NULL, '2017-11-30 09:37:53', '2017-11-30 09:37:53'),
(5, 'Sports', '2', NULL, 1, NULL, '2017-11-30 09:38:03', '2017-11-30 09:38:03'),
(6, 'Local', '2', NULL, 1, NULL, '2017-11-30 09:38:24', '2017-11-30 09:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `product_id`, `img_name`, `img_status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '1', '20171130033626-LB8209.png', 1, NULL, '2017-11-30 09:51:28', '2017-11-30 09:51:28'),
(2, '1', '20171130033628-RCij6I.png', 1, NULL, '2017-11-30 09:51:28', '2017-11-30 09:51:28'),
(3, '2', '20171201071529-Hq5sL9.jpg', 1, NULL, '2017-12-01 01:30:30', '2017-12-01 01:30:30'),
(4, '2', '20171201071531-pts4NY.jpg', 1, NULL, '2017-12-01 01:30:31', '2017-12-01 01:30:31'),
(5, '3', '20171201081946-k2IFQs.png', 1, NULL, '2017-12-01 02:34:47', '2017-12-01 02:34:47'),
(6, '3', '20171201081947-DJCzW1.png', 1, NULL, '2017-12-01 02:34:47', '2017-12-01 02:34:47'),
(7, '4', '20171201082100-9gdCJ8.png', 1, NULL, '2017-12-01 02:36:00', '2017-12-01 02:36:00'),
(8, '4', '20171201082100-7bF2MN.png', 1, NULL, '2017-12-01 02:36:01', '2017-12-01 02:36:01'),
(9, '5', '20171201082158-aZfU5R.png', 1, NULL, '2017-12-01 02:36:58', '2017-12-01 02:36:58'),
(10, '5', '20171201082158-0QCS0O.png', 1, NULL, '2017-12-01 02:36:58', '2017-12-01 02:36:58'),
(11, '6', '20171201082252-CM78aY.png', 1, NULL, '2017-12-01 02:37:52', '2017-12-01 02:37:52'),
(12, '6', '20171201082252-wiU0uY.png', 1, NULL, '2017-12-01 02:37:53', '2017-12-01 02:37:53'),
(13, '7', '20171201082442-XWt9Jd.png', 1, NULL, '2017-12-01 02:39:42', '2017-12-01 02:39:42'),
(14, '7', '20171201082442-uLPpBY.png', 1, NULL, '2017-12-01 02:39:43', '2017-12-01 02:39:43'),
(15, '8', '20171201082559-ECRXst.png', 1, NULL, '2017-12-01 02:40:59', '2017-12-01 02:40:59'),
(16, '8', '20171201082559-tjECG3.png', 1, NULL, '2017-12-01 02:41:00', '2017-12-01 02:41:00'),
(17, '9', '20171201111721-5u5V7O.png', 1, NULL, '2017-12-01 17:32:22', '2017-12-01 17:32:22'),
(18, '9', '20171201111722-0ugBNi.png', 1, NULL, '2017-12-01 17:32:22', '2017-12-01 17:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_30_070756_create_categories_table', 1),
(2, '2017_10_30_084158_create_pages_table', 1),
(3, '2017_10_31_061902_create_products_table', 1),
(4, '2017_11_01_071443_create_users_table', 1),
(5, '2017_11_23_150139_create_admins_table', 1),
(6, '2017_11_28_181824_create_product_infos_table', 1),
(7, '2017_11_30_025802_create_images_table', 1),
(8, '2017_12_01_213326_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `notification` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `product_id`, `product_name`, `size`, `price`, `quantity`, `city`, `address`, `phone`, `status`, `notification`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '5', 'sujan rai', '5', 'Trendy t-shirt', 'Large', 1150, 2, 'Kathmandu', 'putalisadak', '797873453', 1, 0, NULL, '2017-12-11 21:01:17', '2017-12-11 21:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, NULL, '2017-11-30 08:35:22', '2017-11-30 08:35:22'),
(2, 'Women', 1, NULL, '2017-11-30 08:35:31', '2017-11-30 08:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `parent_cat_id`, `category_id`, `product_discount`, `thumbnail`, `product_details`, `product_price`, `product_status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Nepali T-Shirt', 1, 1, 20, NULL, 'It is high quality t-shirt and available in different colors.', 900, 1, NULL, '2017-11-30 09:49:58', '2017-11-30 09:51:29'),
(2, 'Pure cotton 100%', 1, 2, 30, NULL, 'thwoh weoriihwo weor cieurfwefiw ofwer  kfjwi  kfwnrio fonoif  wdfnwoefb', 750, 1, NULL, '2017-12-01 01:29:02', '2017-12-01 05:10:53'),
(3, 'Typical Nepali t-shirt', 1, 2, 20, NULL, 'This is very nice tshirt made in Nepal with pure Nepali cotton wool. This is very warm in this winter season.', 800, 1, NULL, '2017-12-01 02:33:30', '2017-12-01 02:34:47'),
(4, 'Sport T-shirt for girl', 2, 5, 5, NULL, 'This is very nice tshirt made in Nepal with pure Nepali cotton wool. This is very warm in this winter season.', 1200, 1, NULL, '2017-12-01 02:35:42', '2017-12-01 02:36:01'),
(5, 'Trendy t-shirt', 1, 3, 40, NULL, 'This is very nice tshirt made in Nepal with pure Nepali cotton wool. This is very warm in this winter season.', 1150, 1, NULL, '2017-12-01 02:36:44', '2017-12-01 02:36:59'),
(6, 'Latest t-shirt for women', 2, 6, 45, NULL, 'This is very nice tshirt made in Nepal with pure Nepali cotton wool. This is very warm in this winter season.', 1300, 1, NULL, '2017-12-01 02:37:32', '2017-12-01 02:37:53'),
(7, 'Western t-shirt', 1, 3, 2, NULL, 'This is very nice tshirt made in Nepal with pure Nepali cotton wool. This is very warm in this winter season.', 500, 1, NULL, '2017-12-01 02:39:19', '2017-12-01 02:39:43'),
(8, 'Special t-shirt for girl', 2, 4, 40, NULL, 'This is very nice tshirt made in Nepal with pure Nepali cotton wool. This is very warm in this winter season.', 1050, 1, NULL, '2017-12-01 02:40:24', '2017-12-01 02:41:00'),
(9, 'Ladies t-shirt', 2, 5, 20, NULL, 'This bis id rio ojie  siodj wnor fsdj oiw vijern ier', 20, 1, NULL, '2017-12-01 17:30:24', '2017-12-01 19:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_infos`
--

CREATE TABLE `product_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_infos`
--

INSERT INTO `product_infos` (`id`, `product_id`, `size`, `quantity`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '1', 'Small', 50, 1, NULL, '2017-11-30 09:49:58', '2017-11-30 09:49:58'),
(2, '2', 'Large', 21, 1, NULL, '2017-12-01 01:29:02', '2017-12-01 05:10:53'),
(3, '3', 'Medium', 20, 0, NULL, '2017-12-01 02:33:31', '2017-12-11 09:31:03'),
(4, '4', 'Large', 40, 1, NULL, '2017-12-01 02:35:42', '2017-12-01 02:35:42'),
(5, '5', 'Large', 30, 1, NULL, '2017-12-01 02:36:44', '2017-12-01 02:36:44'),
(6, '6', 'Large', 100, 1, NULL, '2017-12-01 02:37:32', '2017-12-01 02:37:32'),
(7, '7', 'Extra Large', 55, 1, NULL, '2017-12-01 02:39:19', '2017-12-01 02:39:19'),
(8, '8', 'Medium', 25, 1, NULL, '2017-12-01 02:40:24', '2017-12-01 02:40:24'),
(9, '7', 'Medium', 40, 1, NULL, '2017-12-01 03:22:51', '2017-12-01 03:22:51'),
(10, '9', 'Large', 23, 1, NULL, '2017-12-01 17:30:24', '2017-12-01 19:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `notification` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `status`, `notification`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sudip Katwal', 'katwal@gmail.com', '$2y$10$p.oUQ1vHLnooc4gFGCFowujJ80K.owkBZAMKUlgl2bHnnAROA1NSe', 'Bhaktapur', 0, 0, 'pUpbLr8yAbpBULyLPPvDcWiVxGF9B8RZZoJwFHHKbY6tSVEFOCKDGqamnZxy', '2017-12-01 14:57:35', '2017-12-11 21:09:35'),
(2, 'Biki Rose', 'Biki@gmail.com', '$2y$10$MT3P06Kko5wEJkxxlbqvOehG8QDV9XmidRneNX4vpwvublL2mrmUy', 'Kathmandu', 1, 0, 'gTw9vZar0sdRgd5UPNxHWYNGV2OTZLWAl9s5XU0B9oVkGFQcDzNe6BI6V8rk', '2017-12-01 16:27:22', '2017-12-01 16:27:22'),
(3, 'raj', 'raj@gmail.com', '$2y$10$uNFokhzqvAKRU2mOCfY9B.ca6H4.Mwy3zjAPxLRlA3/9aSXBFh112', 'satungal', 1, 0, 'k0lDxlD6RNghwwAIzww4QJ6xwj4soFWKkIqJ431AKOXVOUq0xI7ruv6UYlw2', '2017-12-01 17:02:25', '2017-12-01 17:02:25'),
(5, 'sujan rai', 'sujan@gmail.com', '$2y$10$//0rHWs/qxjiPS2j5PVle.i8n9fFQvSqIHfd0IeXIS0jZcDpaTXEK', 'ktm', 1, 0, 'fjudSq6NeN6zsDWh1vBhTHpSMkcoC0yY1Wpkv59qDtRWuCXmk1ccaf5Q1B9F', '2017-12-11 20:58:31', '2017-12-11 20:58:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_infos`
--
ALTER TABLE `product_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_infos`
--
ALTER TABLE `product_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
