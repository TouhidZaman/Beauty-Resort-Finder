-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2019 at 04:40 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_resort_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_histories`
--

CREATE TABLE `booking_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `single_bedrooms` int(11) NOT NULL,
  `double_bedrooms` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `resort_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_histories`
--

INSERT INTO `booking_histories` (`id`, `check_in_date`, `check_out_date`, `single_bedrooms`, `double_bedrooms`, `total_cost`, `resort_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, '2019-09-07', '2019-09-09', 3, 3, 24000, 22, 18, '2019-09-05 19:37:58', '2019-09-05 19:37:58'),
(14, '2019-09-28', '2019-09-30', 1, 2, 13000, 23, 18, '2019-09-05 19:38:39', '2019-09-05 19:38:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_29_215043_create_roles_table', 2),
(4, '2019_08_29_220024_create_role_user_table', 2),
(7, '2019_08_30_213256_create_resort_categories_table', 3),
(8, '2019_08_30_213421_create_resorts_table', 3),
(9, '2019_09_04_201324_create_booking_histories_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resorts`
--

CREATE TABLE `resorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resort_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_bed` int(11) NOT NULL,
  `single_bed_cost` int(11) NOT NULL,
  `single_bed_sample` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `double_bed` int(11) NOT NULL,
  `double_bed_cost` int(11) NOT NULL,
  `double_bed_sample` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `resort_category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resorts`
--

INSERT INTO `resorts` (`id`, `name`, `location`, `resort_image`, `single_bed`, `single_bed_cost`, `single_bed_sample`, `double_bed`, `double_bed_cost`, `double_bed_sample`, `active_status`, `resort_category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 'Ocean Paradise Hotel & Resort', '28-29, Hotel Motel Zone, Road, Cox\'s Bazar', '1567731331.PNG', 15, 5000, '1567731331.webp', 12, 8000, '1567731331.webp', 1, 1, 18, '2019-09-05 18:55:31', '2019-09-05 19:10:06'),
(22, 'Neeshorgo Hotel & Resort Ltd', 'Plot No, 492 Cox\'s Bazar Marine Dr, Cox\'s Bazar', '1567731467.jpg', 10, 3000, '1567731467.jpg', 12, 5000, '1567731467.jpg', 1, 2, 17, '2019-09-05 18:57:47', '2019-09-05 19:10:11'),
(23, 'Divine Eco Resort', 'Hotel Motel Zone-2, Kolatali Beach Point', '1567731690.webp', 8, 3000, '1567731690.webp', 10, 5000, '1567731690.webp', 1, 2, 10, '2019-09-05 19:01:30', '2019-09-05 19:10:15'),
(26, 'White Orchid', 'Plot No, 492 Cox\'s Bazar Marine Dr, Cox\'s Bazar', '1567732173.jpg', 12, 3300, '1567732173.jpg', 16, 5000, '1567732173.jpg', 0, 1, 19, '2019-09-05 19:09:34', '2019-09-05 19:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `resort_categories`
--

CREATE TABLE `resort_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resort_categories`
--

INSERT INTO `resort_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Five Star', '2019-08-30 17:35:14', '2019-08-30 17:35:14'),
(2, 'Three Star', '2019-08-30 17:35:14', '2019-08-30 17:35:14'),
(3, 'Normal', '2019-08-30 17:35:14', '2019-08-30 17:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'A Admin', '2019-08-30 17:35:12', '2019-08-30 17:35:12'),
(2, 'Moderator', 'An Moderator', '2019-08-30 17:35:12', '2019-08-30 17:35:12'),
(3, 'User', 'A Normal user', '2019-08-30 17:35:12', '2019-08-30 17:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(11, 1, 5, NULL, NULL),
(12, 1, 1, NULL, NULL),
(13, 2, 2, NULL, NULL),
(14, 3, 3, NULL, NULL),
(15, 1, 1, NULL, NULL),
(16, 2, 2, NULL, NULL),
(17, 3, 3, NULL, NULL),
(18, 1, 1, NULL, NULL),
(19, 2, 2, NULL, NULL),
(20, 3, 3, NULL, NULL),
(21, 1, 1, NULL, NULL),
(22, 2, 2, NULL, NULL),
(23, 3, 3, NULL, NULL),
(24, 1, 1, NULL, NULL),
(25, 2, 2, NULL, NULL),
(26, 3, 3, NULL, NULL),
(27, 1, 1, NULL, NULL),
(28, 2, 2, NULL, NULL),
(29, 3, 3, NULL, NULL),
(31, 3, 5, NULL, NULL),
(32, 3, 6, NULL, NULL),
(33, 3, 7, NULL, NULL),
(34, 3, 8, NULL, NULL),
(35, 1, 4, NULL, NULL),
(36, 3, 9, NULL, NULL),
(37, 3, 10, NULL, NULL),
(38, 3, 11, NULL, NULL),
(39, 3, 12, NULL, NULL),
(40, 3, 13, NULL, NULL),
(41, 3, 14, NULL, NULL),
(42, 3, 15, NULL, NULL),
(43, 3, 16, NULL, NULL),
(44, 3, 17, NULL, NULL),
(45, 3, 18, NULL, NULL),
(46, 3, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `mobile`, `email`, `address`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Male', '01681941159', 'admin@brfbd.com', 'Shankar, Dhanmondi', '1567379647.png', NULL, '$2y$10$ryeNnCZOlITPCTULt51vZu64rSlXrYRuAjzgfcvZZ0Dh4EVYecxO2', NULL, '2019-08-30 17:35:13', '2019-09-01 17:14:07'),
(2, 'Moderator', 'Male', '01681941159', 'moderator@brfbd.com', 'Shankar, Dhanmondi', NULL, NULL, '$2y$10$FwOnY/aRpSqELRQhyI7rW.cMaUNfkn23SkNckiO7fP2VUSpyuRXgi', NULL, '2019-08-30 17:35:13', '2019-08-30 17:35:13'),
(4, 'Muhammad Touhiduzzaman', 'Male', '01681941159', 'ssp.touhid@gmail.com', 'Shankar, Dhanmondi', '1567365905.jpg', NULL, '$2y$10$jXbrDYVJnX5wc5yvkLq1EerTB94T0lj1TBpxe1qsgcqt2EE1gDr6e', NULL, '2019-09-01 13:07:35', '2019-09-01 13:25:07'),
(10, 'Nayeem Akand', 'Male', '01246585854', 'nayeem4589@gmail.com', 'Dhaka', NULL, NULL, '$2y$10$n4QpaKBHunBXf9vGf7uehulFVEZPmH78rKTrCqi6SpYuiqj0cxtYC', NULL, '2019-09-05 15:13:29', '2019-09-05 15:13:29'),
(14, 'guest', 'Male', '01246585854', 'guest@gmail.com', 'Dhaka', NULL, NULL, '$2y$10$xS95W/3mppDQoGQVnbyT3.I2h2ccEFbfU0PNrPPe3Nmcz6HGyVA0q', NULL, '2019-09-05 17:44:39', '2019-09-05 17:44:39'),
(17, 'Torab Khan', 'Male', '01965472894', 'torab4575@gmail.com', 'Dhaka', NULL, NULL, '$2y$10$17ZAMhnJAQyM4wp95.7S4OTI7q6Z5h0HrGJl.YZo2arL3x0coVY9K', NULL, '2019-09-05 18:15:58', '2019-09-05 18:15:58'),
(18, 'Nahian Chowdhury', 'Female', '01246585854', 'nahian@gmail.com', 'Dhaka', NULL, NULL, '$2y$10$WgY7c7pWDxkLxNdxiK5The6X0ruvgY.o65G8Sme5OkUSlWMi2fgOu', NULL, '2019-09-05 18:50:01', '2019-09-05 18:50:01'),
(19, 'Rayhan Parvez', 'Male', '01246585854', 'rayhan@gmail.com', 'Dhaka', NULL, NULL, '$2y$10$Hc9fut0NuZW69yAkBOtuiuWcG8xr1sAlrUZMIgbEyP4eO6Lfxb6Pq', NULL, '2019-09-05 19:03:29', '2019-09-05 19:03:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_histories`
--
ALTER TABLE `booking_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `resorts`
--
ALTER TABLE `resorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resort_categories`
--
ALTER TABLE `resort_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resort_categories_category_unique` (`category`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
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
-- AUTO_INCREMENT for table `booking_histories`
--
ALTER TABLE `booking_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resorts`
--
ALTER TABLE `resorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `resort_categories`
--
ALTER TABLE `resort_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
