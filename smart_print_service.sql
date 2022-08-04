-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 11:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_print_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE `amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `print_file_id` int(10) UNSIGNED DEFAULT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `add_money` decimal(8,2) NOT NULL DEFAULT 0.00,
  `deduct_money` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`id`, `user_id`, `print_file_id`, `shop_id`, `add_money`, `deduct_money`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 9, '0.00', '600.00', '2022-07-25 02:06:40', '2022-07-25 02:06:40'),
(5, 2, NULL, 9, '0.00', '500.00', '2022-07-25 02:37:43', '2022-07-25 02:37:43'),
(6, 2, NULL, 9, '500.00', '0.00', '2022-07-25 02:38:06', '2022-07-25 02:38:06'),
(7, 2, 13, 9, '0.00', '600.00', '2022-07-25 02:38:29', '2022-07-25 02:38:29'),
(11, 2, NULL, 9, '400.00', '0.00', '2022-07-25 03:30:56', '2022-07-25 03:30:56'),
(12, 2, NULL, 9, '300.00', '0.00', '2022-07-25 03:31:16', '2022-07-25 03:31:16'),
(13, 2, NULL, 9, '400.00', '0.00', '2022-07-25 03:31:47', '2022-07-25 03:31:47'),
(14, 2, NULL, 9, '400.00', '0.00', '2022-07-25 03:33:03', '2022-07-25 03:33:03'),
(20, 2, NULL, 9, '100.00', '0.00', '2022-07-25 03:43:17', '2022-07-25 03:43:17'),
(21, 2, NULL, 9, '500.00', '0.00', '2022-07-25 03:43:55', '2022-07-25 03:43:55'),
(22, 2, NULL, 9, '500.00', '0.00', '2022-07-25 03:47:24', '2022-07-25 03:47:24'),
(23, 2, NULL, 9, '0.00', '2000.00', '2022-07-25 03:47:38', '2022-07-25 03:47:38'),
(24, 12, NULL, 9, '200.00', '0.00', '2022-07-25 08:04:25', '2022-07-25 08:04:25'),
(25, 12, NULL, 9, '500.00', '0.00', '2022-07-25 08:05:15', '2022-07-25 08:05:15'),
(26, 12, 16, 9, '0.00', '400.00', '2022-07-25 08:06:33', '2022-07-25 08:06:33'),
(27, 12, NULL, 9, '0.00', '200.00', '2022-07-25 08:06:53', '2022-07-25 08:06:53'),
(28, 11, NULL, 9, '50.00', '0.00', '2022-07-26 02:58:58', '2022-07-26 02:58:58'),
(29, 11, NULL, 9, '500.00', '0.00', '2022-07-26 03:01:09', '2022-07-26 03:01:09'),
(30, 11, 19, 9, '0.00', '0.00', '2022-07-26 03:01:41', '2022-07-26 03:01:41'),
(31, 12, NULL, 9, '50.00', '0.00', '2022-07-26 03:31:38', '2022-07-26 03:31:38'),
(32, 12, NULL, 9, '50.00', '0.00', '2022-07-26 03:31:48', '2022-07-26 03:31:48'),
(33, 11, NULL, 9, '100.00', '0.00', '2022-07-26 03:38:36', '2022-07-26 03:38:36'),
(34, 2, NULL, 9, '100.00', '0.00', '2022-07-26 03:43:05', '2022-07-26 03:43:05'),
(35, 2, NULL, 9, '100.00', '0.00', '2022-07-26 03:45:42', '2022-07-26 03:45:42'),
(36, 11, NULL, 9, '500.00', '0.00', '2022-07-26 03:47:12', '2022-07-26 03:47:12'),
(37, 12, NULL, 9, '200.00', '0.00', '2022-07-26 03:47:24', '2022-07-26 03:47:24'),
(38, 12, NULL, 9, '200.00', '0.00', '2022-07-26 03:48:00', '2022-07-26 03:48:00'),
(39, 2, NULL, 9, '100.00', '0.00', '2022-07-26 03:48:28', '2022-07-26 03:48:28'),
(40, 2, NULL, 9, '100.00', '0.00', '2022-07-26 03:49:23', '2022-07-26 03:49:23'),
(41, 2, NULL, 9, '100.00', '0.00', '2022-07-26 03:49:30', '2022-07-26 03:49:30'),
(42, 2, NULL, 9, '100.00', '0.00', '2022-07-26 03:53:20', '2022-07-26 03:53:20'),
(43, 12, NULL, 9, '50.00', '0.00', '2022-07-26 04:15:54', '2022-07-26 04:15:54'),
(44, 12, NULL, 9, '0.00', '50.00', '2022-07-26 04:17:09', '2022-07-26 04:17:09'),
(45, 2, NULL, 9, '100.00', '0.00', '2022-07-26 04:27:10', '2022-07-26 04:27:10'),
(46, 2, 17, 9, '0.00', '0.00', '2022-07-26 06:52:15', '2022-07-26 06:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_of_pages` int(11) DEFAULT NULL,
  `num_of_copies` int(11) DEFAULT NULL,
  `recto_verso` tinyint(1) NOT NULL DEFAULT 0,
  `black_white` tinyint(1) NOT NULL DEFAULT 0,
  `color` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `name`, `original_name`, `num_of_pages`, `num_of_copies`, `recto_verso`, `black_white`, `color`, `created_at`, `updated_at`) VALUES
(53, 12, '1658753904.pdf', '1658322314.pdf', 8, 2, 1, 1, 1, '2022-07-25 12:58:24', '2022-07-25 07:59:16'),
(57, 2, '1658819425.pdf', '1658753904.pdf', 8, 1, 0, 0, 0, '2022-07-26 07:10:25', '2022-07-26 07:10:25'),
(58, 11, '1658822150.pdf', '1658753904.pdf', 8, 1, 0, 0, 0, '2022-07-26 07:55:51', '2022-07-26 03:04:05'),
(60, 11, '165882289111.pdf', '1658753904.pdf', 8, 2, 1, 0, 1, '2022-07-26 08:08:11', '2022-07-26 03:22:44'),
(61, 11, '165882315011.pdf', '1658322314.pdf', 8, 1, 1, 1, 1, '2022-07-26 08:12:30', '2022-07-26 03:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_07_14_111256_create_permission_tables', 1),
(16, '2022_07_18_105925_create_files_table', 2),
(17, '2022_07_18_110248_create_files_table', 3),
(18, '2022_07_18_132123_create_files_table', 4),
(19, '2022_07_19_125546_create_rates_table', 5),
(20, '2022_07_20_105256_create_print_files_table', 6),
(26, '2022_07_22_072230_create_wallets_table', 9),
(27, '2022_07_22_120356_create_amounts_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `print_files`
--

CREATE TABLE `print_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_of_pages` int(11) DEFAULT NULL,
  `num_of_copies` int(11) DEFAULT NULL,
  `recto_verso` tinyint(1) NOT NULL DEFAULT 0,
  `black_white` tinyint(1) NOT NULL DEFAULT 0,
  `color` tinyint(1) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `is_downloaded` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_files`
--

INSERT INTO `print_files` (`id`, `user_id`, `shop_id`, `file_id`, `name`, `original_name`, `num_of_pages`, `num_of_copies`, `recto_verso`, `black_white`, `color`, `total`, `is_downloaded`, `created_at`, `updated_at`) VALUES
(11, 2, 9, 46, '1658322314.pdf', '1658142403.pdf', 8, 3, 1, 1, 1, 600, 1, '2022-07-01 06:40:17', '2022-07-25 02:06:40'),
(12, 2, 9, 46, '1658322314.pdf', '1658142403.pdf', 8, 3, 1, 0, 1, 600, 0, '2022-07-24 06:40:53', '2022-07-22 07:49:42'),
(13, 2, 9, 46, '1658322314.pdf', '1658142403.pdf', 8, 3, 1, 1, 1, 600, 1, '2022-07-23 06:41:07', '2022-07-25 02:38:29'),
(14, 2, 6, 46, '1658322314.pdf', '1658142403.pdf', 8, 3, 1, 1, 1, 84, 0, '2022-07-25 00:11:33', '2022-07-25 00:11:33'),
(15, 2, 6, 47, '1658499354.pdf', '1658322314.pdf', 8, 1, 0, 0, 0, 84, 0, '2022-07-25 00:11:33', '2022-07-25 00:11:33'),
(16, 12, 9, 53, '1658753904.pdf', '1658322314.pdf', 8, 2, 1, 1, 1, 400, 1, '2022-07-25 08:02:40', '2022-07-25 08:06:33'),
(17, 2, 9, 54, '1658818668.pdf', '1658214462.pdf', 8, 1, 1, 0, 0, 0, 1, '2022-07-26 01:58:41', '2022-07-26 06:52:15'),
(18, 2, 6, 57, '1658819425.pdf', '1658753904.pdf', 8, 1, 0, 0, 0, 0, 0, '2022-07-26 02:10:34', '2022-07-26 02:10:34'),
(19, 11, 9, 58, '1658822150.pdf', '1658753904.pdf', 8, 1, 0, 0, 0, 0, 1, '2022-07-26 02:57:01', '2022-07-26 03:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `black_white` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `black_white`, `color`, `created_at`, `updated_at`) VALUES
(2, 6, 5, 2, NULL, NULL),
(3, 7, 10, 5, NULL, NULL),
(4, 8, 15, 10, NULL, NULL),
(5, 9, 20, 5, NULL, NULL),
(6, 10, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'user', 'web', NULL, NULL),
(3, 'shopOwner', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disapproved',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `identifier`, `name`, `surname`, `email`, `password`, `email_verified_at`, `address`, `latitude`, `longitude`, `mobile`, `mobile_code`, `whatsapp_number`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', NULL, 'admin@gmail.com', '$2y$10$fupCwyAFiDr8olEb0sokG.wyRc9YbkgdxSPP4X2hZkKqCB7zH3TtO', NULL, NULL, NULL, NULL, '12345678', '92', NULL, 'admin', 'disapproved', NULL, '2022-07-15 07:53:04', '2022-07-15 07:53:04'),
(2, '12345', 'nabeel', 'shah', 'nabeel@gmail.com', '$2y$10$RAjDEv0h6QaFM6C9l1TJgeDL6VaXza.AUrf5onpFCxW1bYojJCaki', NULL, 'Akhrimint Stop, Rasheed Pura Road, Khan Colony, Lahore, Pakistan', '31.5858912', '74.3947681', '123456', '+92', '03004165312', 'user', 'disapproved', NULL, '2022-07-22 01:38:04', '2022-07-20 03:13:51'),
(6, NULL, 'nabeel mobies', 'beli', 'na@gmail.com', '$2y$10$IbtvAGXA.0.dx2pof59SH.JGDEm/9IbdFII2gp.jDONSH6TIfcPfi', NULL, 'Shalimar Link Road, Gunj, Lahore, Pakistan', '31.5654938', '74.380596', '12345', '+92', '+9212345887', 'shopOwner', 'approved', NULL, '2022-07-20 03:08:15', '2022-07-20 03:08:15'),
(7, NULL, 'Mobile Traders', 'mo', 'mubeen@gmail.com', '$2y$10$yZ4YF/.esYBu9LjTR/7Q..IZ0QgcLWH9P9mOY6IBSGL4qsSbH7PCG', NULL, 'Model Town Link Road, Phase 3 GECH Society, Lahore, Pakistan', '31.4674526', '74.31669090000001', '233432', '+92', '+921245', 'shopOwner', 'approved', NULL, '2022-07-20 03:10:55', '2022-07-20 03:10:55'),
(8, NULL, 'Shakeel Mobile Reparing', 'trader', 'johar@gmail.com', '$2y$10$edXwpfPhnj8NYjyBDJP7IuVVCAzQ9F6rNxcW2I0Rmznb71rPZyVzy', NULL, 'Johar Town, Lahore, Pakistan', '31.469693', '74.27284610000001', '12356767', '+92', '+9212345', 'shopOwner', 'approved', NULL, '2022-07-20 03:11:51', '2022-07-20 03:11:51'),
(9, NULL, 'shop corner', 'c', 'shop@gmail.com', '$2y$10$nsvqIWq9el.mm8nou1GR5OPvQj3uvc1ojgJ3xzlDnvwAh80QTwSdu', NULL, 'Pakistan Mint, Mint Gate Parkway, Pakistan Mint Colony, Lahore, Pakistan', '31.5842477', '74.3884364', '123342', '+92', '+9212345887', 'shopOwner', 'approved', NULL, '2022-07-20 04:08:22', '2022-07-20 04:08:22'),
(10, '123', 'peshawar shop', 'pe', 'pes@gmail.com', '$2y$10$gjhzoFLk0.KJXJ7p1Em/A.UjET.vSB9C1CET9CiO0Bm8Bqfmjq/Ze', NULL, 'Peshawar Mor Interchange, H-9, Islamabad, Pakistan', '33.6825094', '73.04834129999999', '232323232', '+92', '+9212345887', 'shopOwner', 'approved', NULL, '2022-07-20 04:19:36', '2022-07-20 04:19:36'),
(11, '1111', 'adil', 'you', 'adil@gmail.com', '$2y$10$FujyWfCqhFoOwHoAdrgczuyKu6smFRGN3HRJ8GY1Bz.xLAiFpTuxq', NULL, 'Shadman, Lahore, Pakistan', '31.5377616', '74.3308864', '112233445566', '+92', '+92123456', 'user', 'disapproved', NULL, '2022-07-22 01:38:04', '2022-07-26 02:56:22'),
(12, '6767', 'adil', 'you', 'ad@gmail.com', '$2y$10$XpgQ4mGXCxqQ0yAT2/c3iO6kiRTyQ9NvLhMfdntp7LfdanCjXOwSK', NULL, 'Baghbanpura, Lahore, Pakistan', '31.5849905', '74.3748754', '12345432', '+92', '+9212345678', 'user', 'blocked', NULL, '2022-07-25 07:49:22', '2022-07-26 06:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `remaining` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `total`, `remaining`, `created_at`, `updated_at`) VALUES
(2, 2, '5700.00', '0.00', '2022-07-22 07:45:23', '2022-07-26 06:52:15'),
(6, 9, '3550.00', '0.00', '2022-07-25 03:30:56', '2022-07-26 04:17:09'),
(7, 12, '-100.00', '0.00', '2022-07-25 08:06:33', '2022-07-26 04:17:09'),
(8, 11, '1100.00', '0.00', '2022-07-26 03:01:09', '2022-07-26 03:47:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `print_files`
--
ALTER TABLE `print_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amounts`
--
ALTER TABLE `amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `print_files`
--
ALTER TABLE `print_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
