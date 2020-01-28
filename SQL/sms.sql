-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 11:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trx_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `trx_id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '6DK878E4ZK', 1, 10.00, 1, '2019-04-25 01:32:01', '2019-04-25 01:32:01'),
(2, '6DL97NWTW1', 1, 10.00, 1, '2019-04-25 01:32:13', '2019-04-25 01:32:13');

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
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_04_15_063000_create_phonebook_groups_table', 2),
(8, '2019_04_16_035439_create_phonebooks_table', 3),
(11, '2019_04_18_032330_create_balances_table', 5),
(14, '2019_04_23_034547_create_sms_reports_table', 8),
(15, '2014_10_12_000000_create_users_table', 9);

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
-- Table structure for table `phonebooks`
--

CREATE TABLE `phonebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phonebooks`
--

INSERT INTO `phonebooks` (`id`, `user_id`, `group_id`, `name`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(40, 2, 1, NULL, '01729890904', 1, '2019-04-16 21:31:59', '2019-04-16 21:31:59'),
(41, 2, 1, NULL, '01743459695', 1, '2019-04-16 21:31:59', '2019-04-17 00:34:49'),
(43, 2, 1, NULL, '01729890904', 1, '2019-04-16 23:55:07', '2019-04-16 23:55:07'),
(44, 2, 1, 'Name Here', '01729890903', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(45, 2, 1, 'Name Here', '01729890904', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(46, 2, 1, 'Name Here', '01729890905', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(47, 2, 1, 'Name Here', '01729890906', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(48, 2, 1, 'Name Here', '01729890907', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(49, 2, 1, 'Name Here', '01729890908', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(50, 2, 1, 'Name Here', '01729890909', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(51, 2, 1, 'Name Here', '01729890910', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(52, 2, 1, 'Name Here', '01729890911', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(53, 2, 1, 'Name Here', '01729890912', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(54, 2, 1, 'Name Here', '01729890913', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(55, 2, 1, 'Name Here', '01729890914', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(56, 2, 1, 'Name Here', '01729890915', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(57, 2, 1, 'Name Here', '01729890916', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(58, 2, 1, 'Name Here', '01729890917', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(59, 2, 1, 'Name Here', '01729890918', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(60, 2, 1, 'Name Here', '01729890919', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(61, 2, 1, 'Name Here', '01729890920', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(62, 2, 1, 'Name Here', '01729890921', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(63, 2, 1, 'Name Here', '01729890922', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(64, 2, 1, 'Name Here', '01729890923', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(65, 2, 1, 'Name Here', '01729890924', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26'),
(66, 2, 1, 'Name Here', '01729890925', 1, '2019-04-17 03:58:26', '2019-04-17 03:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `phonebook_groups`
--

CREATE TABLE `phonebook_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phonebook_groups`
--

INSERT INTO `phonebook_groups` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Family', 1, '2019-04-22 21:14:57', '2019-04-22 21:14:57'),
(3, 0, 'Friends', 1, '2019-04-15 06:20:20', '2019-04-17 00:37:38'),
(4, 2, 'Friends', 1, '2019-05-06 03:33:09', '2019-05-06 03:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `sms_reports`
--

CREATE TABLE `sms_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone_number` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `number_count` int(11) NOT NULL DEFAULT '1',
  `sms_rate` double(12,2) NOT NULL DEFAULT '0.00',
  `cost` double(12,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_reports`
--

INSERT INTO `sms_reports` (`id`, `user_id`, `phone_number`, `message`, `number_count`, `sms_rate`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(12, 1, NULL, 'Sonar Bangladesh', 1, 0.30, 0.30, 1, '2019-04-29 22:55:20', '2019-04-29 22:55:20'),
(13, 1, '8801729890904', 'Sonar Bangladesh', 1, 0.30, 0.30, 1, '2019-04-29 22:58:35', '2019-04-29 22:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `sms_rate` double(12,2) NOT NULL DEFAULT '0.30',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `photo`, `bio`, `company`, `address`, `sms_rate`, `role`, `sender_id`, `api_key`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Root User', 'root@user.com', '01700000000', NULL, NULL, NULL, NULL, 0.30, 'root', 'ZSGapPbWeuFt6HU', 'Tpb6Yr3tBE8RhiZD0xcInkPAosueLF', 1, '2019-04-29 00:03:35', '$2y$10$NnrmB.sT0qGtt2UQG6HSJek5uQ0ZESNgGjDsxaYu7A0OYuiweqxa2', 'BQvm2D75r6dW115Enu22ecVDnPLMkSKNM6bqR7zYKAffkC5NhsvRhOZyxCMt', '2019-04-29 00:03:35', '2019-04-29 00:03:35'),
(2, 'Demo Client', 'demo@gmail.com', '01700000001', NULL, NULL, 'Demo', NULL, 0.30, 'client', 'uJbOaLg8xXFqB3h', 'EZit7mu0rnhqeR9pl84aMcVjHGOg3I', 1, NULL, '$2y$10$.lNZZ1jV/SKJOx2N7q4l5u52Yh8NT/3I38p7/kSXI/1bK4eFSYZd6', NULL, '2019-05-03 21:47:27', '2019-05-03 21:47:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

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
-- Indexes for table `phonebooks`
--
ALTER TABLE `phonebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonebook_groups`
--
ALTER TABLE `phonebook_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_reports`
--
ALTER TABLE `sms_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phonebooks`
--
ALTER TABLE `phonebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `phonebook_groups`
--
ALTER TABLE `phonebook_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_reports`
--
ALTER TABLE `sms_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
