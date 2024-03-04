-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 01:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freedb_studentclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2024_02_13_223238_create_sessions_table', 1),
(10, '2024_02_16_013943_add_new_column_to_users_table', 1),
(11, '2024_02_16_020638_create_todos_table', 1),
(14, '2024_03_01_162141_create_scores_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fepedivy@mailinator.com', '$2y$12$d7pLIDMgY9eL.xufnc7R1eVASqFITEqLr5r4uNosJ/npDb5ecUpW.', '2024-02-17 13:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sunday` int(11) NOT NULL,
  `monday` int(11) NOT NULL,
  `tuesday` int(11) NOT NULL,
  `wednesday` int(11) NOT NULL,
  `thursday` int(11) NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `weekly_total` int(11) GENERATED ALWAYS AS (`sunday` + `monday` + `tuesday` + `wednesday` + `thursday` + `friday` + `saturday`) STORED,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 2, 3, 4, 5, 6, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4pb5gY7TaqGPVOzT9qDGUTVYh0LHor2ov9bJXfwm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXk1R2Z5eDhDZ2UxeTQ0TUYzNlo2QXhSSDNwQVpvNUhkaTUyeEc3byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zaWRlYmFyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1709510628),
('xsd0IALHMD4O6e4yHdfMOBDILEk6X0OoXBhmsSaQ', 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibFZ2eVJ0SVlJVlB3UXE2WGlGQXAyQmlVTTd1NUFKNjc3d20wM2pPMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvc2lkZWJhciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE1O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJHJCc1pHWjlpMC9QWm9nb1FNZ0IzcGVwT293MHQyN2YuMXM2Z29TeGhYUEljT2JRWjJUeGhtIjt9', 1709510598);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tamara\'s Team', 1, '2024-02-16 03:01:07', '2024-02-16 03:01:07'),
(3, 3, 'Petra\'s Team', 1, '2024-02-17 16:55:44', '2024-02-17 16:55:44'),
(5, 14, 'Enas\'s Team', 1, '2024-02-20 08:53:54', '2024-02-20 08:53:54'),
(6, 15, 'Othman\'s Team', 1, '2024-02-27 20:52:09', '2024-02-27 20:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('undone','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'undone',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `todos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country`, `skills`, `bio`, `score`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Tamara Dennis', 'fepedivy@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$o9uaC1lizJ2E.DP0nwNDFO9SEr40XQNaA13WWhkit4f8nuJOQ85rW', NULL, NULL, NULL, 'fnH9YXPFOeLAKOd3TvRyDR2eefhapo5QYf142pP3nry5xaIwMaJgrH5QOvyw', 1, NULL, '2024-02-16 03:01:07', '2024-02-16 03:01:11'),
(3, 'Petra Young', 'jukojuqo@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(5, 'test 1', 'j1ukojuqo@mailinator.com', 'Egypt', NULL, NULL, 10, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(6, 'test 2', 'j11ukojuqo@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(7, 'test 3', 'afepedivy@mailinator.com', 'Egypt', '', NULL, 0, NULL, '$2y$12$o9uaC1lizJ2E.DP0nwNDFO9SEr40XQNaA13WWhkit4f8nuJOQ85rW', NULL, NULL, NULL, NULL, 1, NULL, '2024-02-16 03:01:07', '2024-02-16 03:01:11'),
(8, 'tes 4', 'aajukojuqo@mailinator.com', 'Egypt', '', NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(9, 'test 5', 'aaaaaj1ukojuqo@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(10, 'test 6', 'aaaaaaj11ukojuqo@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(11, 'test 7', 'aaaaa5j1ukojuqo@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(12, 'test 8', 'aaaa4j11ukojuqo@mailinator.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, '2024-02-17 16:55:44', '2024-02-17 16:55:47'),
(13, 'test 13', 'aaaa@gmail.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$06/SPuR0Tmew4XIAduz49.sY7ayaoxJ8dnJdsTD4o7h.9XgExAWgy', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(14, 'Enas Abd El Mageed', 'enasabdelkadermetwally23@gmail.com', 'Egypt', NULL, NULL, 0, NULL, '$2y$12$XebHUYJZ1Ydsg5VPSvzGu.6ABrj6k.PiNNyNbrsH1UskR/eZ9UL4.', NULL, NULL, NULL, NULL, 5, NULL, '2024-02-20 08:53:54', '2024-02-20 08:53:54'),
(15, 'Othman', 'trollingosman101@outlook.com', 'Cameroon', '10x dev', 'bio', 10, '2024-02-27 20:55:28', '$2y$12$rBsZGZ9i0/PZogoQMgB3pepOow0t27f.1s6goSxhXPIcObQZ2Txhm', NULL, NULL, NULL, 'BNIwS4yT59LzsTKKYLzLOA925mYbuhoxvuuLYS1uQsR45LrG0P5Tgpglg2Lb', 6, NULL, '2024-02-27 20:52:09', '2024-03-03 20:09:54');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
