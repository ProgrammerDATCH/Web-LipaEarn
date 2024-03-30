-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 11:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LipaEarn`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `pay_number` varchar(255) NOT NULL,
  `screenshot` text NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity`, `category`, `created_at`, `updated_at`) VALUES
(1, 1, 'You Registered On LipaEarn', 'auth', '2023-07-22 19:18:36', '2023-07-22 19:18:36'),
(2, 2, 'You Registered On LipaEarn', 'auth', '2023-07-22 20:10:25', '2023-07-22 20:10:25'),
(3, 3, 'You Registered On LipaEarn', 'auth', '2023-07-22 20:19:18', '2023-07-22 20:19:18'),
(4, 4, 'You Registered On LipaEarn', 'auth', '2023-07-23 20:12:20', '2023-07-23 20:12:20'),
(5, 5, 'You Registered On LipaEarn', 'auth', '2023-07-23 20:23:15', '2023-07-23 20:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `base_application`
--

CREATE TABLE `base_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boosting_accounts`
--

CREATE TABLE `boosting_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `booster_username` varchar(255) NOT NULL,
  `clicks` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boosting_accounts`
--

INSERT INTO `boosting_accounts` (`id`, `user_id`, `category`, `booster_username`, `clicks`, `title`, `thumbnail`, `link`, `created_at`, `updated_at`) VALUES
(4, 1, 'instagram', 'da_true_12', 0, 'Follow Me', 'storage/screenshots/PmKwobzg1ClxIlHaGfrV3lbrZkt5zQiQQapOGUvG.jpg', 'https://www.instagram.com/accounts/login/?oneClickLogin=True&username=da_true_12&identifier=dpHzC7m4tlF0jZKjF0likhpFxudUYAnYSZAO0pjbFNt20eRGFHtFyV6jES0W63Ea&lastFourDigits=1370', '2023-07-23 09:47:33', '2023-07-23 09:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `boosting_clicks`
--

CREATE TABLE `boosting_clicks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booster_id` bigint(20) UNSIGNED NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boosting_clicks`
--

INSERT INTO `boosting_clicks` (`id`, `user_id`, `booster_id`, `screenshot`, `name`, `created_at`, `updated_at`) VALUES
(5, 4, 4, 'storage/screenshots/2u7thLPEkTNYFsBm8vXu7FKoiWUGF29WO1ksLO98.jpg', 'da_true_12', '2023-07-23 20:20:27', '2023-07-23 20:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_06_28_143050_create_users_table', 1),
(18, '2023_06_28_143237_create_videos_table', 1),
(19, '2023_06_28_143339_create_referrals_table', 1),
(20, '2023_06_28_143405_create_trivia_quizzes_table', 1),
(21, '2023_07_01_081657__create_withdrawal_table', 1),
(22, '2023_07_03_235041_create_quiz_results_table', 1),
(23, '2023_07_03_235240_create_user_earnings_table', 1),
(24, '2023_07_03_235410_create_video_results_table', 1),
(25, '2023_07_07_192028___create_notification_table', 1),
(26, '2023_07_12_122841__create_boosting_accounts_table', 1),
(27, '2023_07_12_123320__create_activites_table', 1),
(28, '2023_07_13_143208__create_base_application_table', 1),
(29, '2023_07_13_204336___create_activation_table', 1),
(30, '2023_07_13_23208_create_sessions_table', 1),
(31, '2023_07_22_232854_create_boosting_clicks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `open` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `link`, `category`, `open`, `created_at`, `updated_at`) VALUES
(1, 1, 'Welcome To LipaEarn', 'http://127.0.0.1:8000/dashboard/analytics', 'Greeting', 1, '2023-07-22 19:18:36', '2023-07-22 20:38:30'),
(2, 1, 'You have earned $400', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 1, '2023-07-22 20:06:48', '2023-07-22 20:38:30'),
(3, 1, 'You have earned $500', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 1, '2023-07-22 20:09:49', '2023-07-22 20:38:30'),
(4, 1, 'You have earned $500', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 1, '2023-07-22 20:09:55', '2023-07-22 20:38:30'),
(5, 2, 'Welcome To LipaEarn', 'http://127.0.0.1:8000/dashboard/analytics', 'Greeting', 0, '2023-07-22 20:10:25', '2023-07-22 20:10:25'),
(6, 3, 'Your have new referral bob-m', 'http://127.0.0.1:8000/referrals', 'Announcements', 0, '2023-07-22 20:19:18', '2023-07-22 20:19:18'),
(7, 3, 'Welcome To LipaEarn', 'http://127.0.0.1:8000/dashboard/analytics', 'Greeting', 0, '2023-07-22 20:19:18', '2023-07-22 20:19:18'),
(8, 1, 'Your referral curly has comfirmed his account.', 'http://127.0.0.1:8000/referrals', 'Announcements', 1, '2023-07-22 20:23:35', '2023-07-22 20:38:30'),
(9, 1, 'Your referral bob-m has confirmed his account.', 'http://127.0.0.1:8000/referrals', 'Announcements', 1, '2023-07-22 20:24:20', '2023-07-22 20:38:30'),
(10, 1, 'Your request to withdraw  4999 FRW submitted successfully.', 'http://127.0.0.1:8000/withdrawal', 'Announcements', 1, '2023-07-22 20:28:44', '2023-07-22 20:38:30'),
(11, 1, 'Your request to withdraw  5000 FRW submitted successfully.', 'http://127.0.0.1:8000/withdrawal', 'Announcements', 1, '2023-07-22 20:29:29', '2023-07-22 20:38:30'),
(12, 1, 'Your withdrawal request of 5000 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:31:17', '2023-07-22 20:38:30'),
(13, 1, 'Your withdrawal request of 1200 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:31:48', '2023-07-22 20:38:30'),
(14, 1, 'Your withdrawal request of 4999 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:31:51', '2023-07-22 20:38:30'),
(15, 1, 'Your withdrawal request of 1200 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:36:44', '2023-07-22 20:38:30'),
(16, 1, 'Your withdrawal request of 6000 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:37:29', '2023-07-22 20:38:30'),
(17, 1, 'Your withdrawal request of 5000 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:37:37', '2023-07-22 20:38:30'),
(18, 1, 'Your withdrawal request of 4999 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:37:45', '2023-07-22 20:38:30'),
(19, 1, 'Your withdrawal request of 1200 FR has been approved', 'http://127.0.0.1:8000/withdrawal', 'Announcement', 1, '2023-07-22 20:37:49', '2023-07-22 20:38:30'),
(20, 2, 'You have earned $500', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 0, '2023-07-22 20:52:54', '2023-07-22 20:52:54'),
(21, 2, 'You have earned $500', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 0, '2023-07-22 20:52:58', '2023-07-22 20:52:58'),
(22, 2, 'You have earned $400', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 0, '2023-07-22 20:53:06', '2023-07-22 20:53:06'),
(23, 4, 'Welcome To LipaEarn', 'http://127.0.0.1:8000/dashboard/analytics', 'Greeting', 1, '2023-07-23 20:12:20', '2023-07-23 20:25:55'),
(24, 4, 'You have earned $400', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 1, '2023-07-23 20:21:42', '2023-07-23 20:25:55'),
(25, 4, 'You have earned $500', 'http://127.0.0.1:8000/dashboard/analytics', 'Transaction', 1, '2023-07-23 20:22:40', '2023-07-23 20:25:55'),
(26, 4, 'Your have new referral test', 'http://127.0.0.1:8000/referrals', 'Announcements', 1, '2023-07-23 20:23:14', '2023-07-23 20:25:55'),
(27, 5, 'Welcome To LipaEarn', 'http://127.0.0.1:8000/dashboard/analytics', 'Greeting', 0, '2023-07-23 20:23:14', '2023-07-23 20:23:14'),
(28, 4, 'Your referral test has confirmed his account.', 'http://127.0.0.1:8000/referrals', 'Announcements', 1, '2023-07-23 20:25:02', '2023-07-23 20:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `referral_id` bigint(20) UNSIGNED NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `user_id`, `referral_id`, `level`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2023-07-22 20:10:25', '2023-07-22 20:10:25'),
(2, 3, 1, 1, '2023-07-22 20:19:18', '2023-07-22 20:19:18'),
(3, 5, 4, 1, '2023-07-23 20:23:14', '2023-07-23 20:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `os` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `os`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-22 19:18:57', '2023-07-22 19:18:57'),
(2, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-22 20:10:30', '2023-07-22 20:10:30'),
(3, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-22 20:19:59', '2023-07-22 20:19:59'),
(4, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-22 20:52:30', '2023-07-22 20:52:30'),
(5, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 08:41:57', '2023-07-23 08:41:57'),
(6, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:12:30', '2023-07-23 20:12:30'),
(7, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:13:18', '2023-07-23 20:13:18'),
(8, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:14:40', '2023-07-23 20:14:40'),
(9, 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:23:20', '2023-07-23 20:23:20'),
(10, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:23:43', '2023-07-23 20:23:43'),
(11, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:24:14', '2023-07-23 20:24:14'),
(12, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:24:37', '2023-07-23 20:24:37'),
(13, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '\"Windows\"', '2023-07-23 20:25:13', '2023-07-23 20:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `trivia_quizzes`
--

CREATE TABLE `trivia_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `watch_day` varchar(255) NOT NULL DEFAULT 'Monday',
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trivia_quizzes`
--

INSERT INTO `trivia_quizzes` (`id`, `question`, `correct_answer`, `option1`, `option2`, `option3`, `option4`, `watch_day`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Who Is Datrue', 'Thierry', 'saint', 'vroy', 'don', 'none of them', 'Sunday', '400', '2023-07-22 19:40:16', '2023-07-22 19:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `trivia_quiz_results`
--

CREATE TABLE `trivia_quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trivia_quiz_results`
--

INSERT INTO `trivia_quiz_results` (`id`, `user_id`, `quiz_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2023-07-22 20:06:48', '2023-07-22 20:06:48'),
(3, 2, 1, '2023-07-22 20:53:05', '2023-07-22 20:53:05'),
(4, 4, 1, '2023-07-23 20:21:41', '2023-07-23 20:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `referral_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referrals` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `number`, `password`, `profile`, `country`, `referral_id`, `referrals`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, 'da_true_12', 'vpnzoe27@gmail.com', '0788451370', '$2y$10$Sd/ot6xyHdygKYRnh78bMeoxppEzoGr6Y6IQIldCuinRZi/g06bKC', 'storage/images/avatars/user-1.jpg', 'Rwanda', NULL, 0.00, 'Active', '2023-07-22 19:18:36', '2023-07-22 19:18:36', 'Admin'),
(2, 'curly', 'tnshutit3@gmail.com', '07388451370', '$2y$10$EA9azVKir2DrcWAVpDmD5OTS6O3EKtQn8PX1XchP2TTumGPJ06uU.', 'storage/images/avatars/user-1.jpg', 'Rwanda', 1, 0.00, 'Active', '2023-07-22 20:10:24', '2023-07-22 20:23:35', 'Standard'),
(3, 'bob-m', 'bob-m@gnail.com', '07288451370', '$2y$10$0Ej7pC7h2L9Vdh/xgs5G5.Lw.BgGqPswzHy7X61mO5XIffJowwGcq', 'storage/images/avatars/user-1.jpg', 'Rwanda', 1, 0.00, 'Active', '2023-07-22 20:19:18', '2023-07-22 20:24:20', 'Standard'),
(4, 'da_true_123', 'vpnzoe273@gmail.com', '07884351370', '$2y$10$9fwoAHZrTLqiAt5tSwajteCEcVyRez0Jx2lUzXevWoKtxy4DDaxuK', 'storage/users/S8kjwEiUwQMs5EZy4tOmeZplrSq2FRhGXvIY8Q8r.jpg', 'Rwanda', NULL, 0.00, 'Active', '2023-07-23 20:12:20', '2023-07-23 20:20:58', 'Standard'),
(5, 'test', 'test@gmail.com', '0788451301', '$2y$10$ogMhZejoaqYsYI639LkX9eBHBgQmDIOehft12v78l3ZuoYjf5EzES', 'storage/images/avatars/user-1.jpg', 'Rwanda', 4, 0.00, 'Active', '2023-07-23 20:23:14', '2023-07-23 20:25:02', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `user_earnings`
--

CREATE TABLE `user_earnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_earnings` int(11) NOT NULL DEFAULT 0,
  `referral_earnings` int(11) NOT NULL DEFAULT 0,
  `video_earnings` int(11) NOT NULL DEFAULT 0,
  `quiz_earnings` int(11) NOT NULL DEFAULT 0,
  `bonus_earnings` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_earnings`
--

INSERT INTO `user_earnings` (`id`, `user_id`, `total_earnings`, `referral_earnings`, `video_earnings`, `quiz_earnings`, `bonus_earnings`, `created_at`, `updated_at`) VALUES
(1, 1, 2001, 6000, 1000, 400, 500, '2023-07-22 19:18:37', '2023-07-22 20:29:29'),
(2, 2, 1900, 0, 1000, 400, 500, '2023-07-22 20:10:25', '2023-07-22 20:53:06'),
(3, 3, 500, 0, 0, 0, 500, '2023-07-22 20:19:18', '2023-07-22 20:19:18'),
(4, 4, 3400, 2000, 500, 400, 500, '2023-07-23 20:12:20', '2023-07-23 20:25:02'),
(5, 5, 500, 0, 0, 0, 500, '2023-07-23 20:23:15', '2023-07-23 20:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `watch_day` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `category`, `views`, `url`, `price`, `watch_day`, `created_at`, `updated_at`) VALUES
(1, 'Veve Video', 'Youtube', 0, 'https://www.youtube.com/watch?v=VHW5aOq6pF0', '500', 'Sunday', '2023-07-22 19:35:57', '2023-07-22 19:35:57'),
(2, 'Tiktok', 'Tiktok', 0, 'https://www.youtbe.com/watch?v=VHW5aOq6pF0', '500', 'Saturday', '2023-07-22 19:36:22', '2023-07-22 19:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `video_results`
--

CREATE TABLE `video_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_results`
--

INSERT INTO `video_results` (`id`, `user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-07-22 20:09:49', '2023-07-22 20:09:49'),
(2, 1, 1, '2023-07-22 20:09:55', '2023-07-22 20:09:55'),
(3, 2, 1, '2023-07-22 20:52:53', '2023-07-22 20:52:53'),
(4, 2, 2, '2023-07-22 20:52:58', '2023-07-22 20:52:58'),
(5, 4, 1, '2023-07-23 20:22:39', '2023-07-23 20:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `pay_through` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `amount`, `pay_through`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6000, '0788451370', 'Approved', '2023-07-22 20:24:57', '2023-07-22 20:37:29'),
(2, 1, 1200, '0788451370', 'Approved', '2023-07-22 20:26:51', '2023-07-22 20:37:49'),
(3, 1, 4999, '0788451370', 'Approved', '2023-07-22 20:28:44', '2023-07-22 20:37:45'),
(4, 1, 5000, '0788451370', 'Approved', '2023-07-22 20:29:29', '2023-07-22 20:37:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activations_user_id_foreign` (`user_id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `base_application`
--
ALTER TABLE `base_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boosting_accounts`
--
ALTER TABLE `boosting_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boosting_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `boosting_clicks`
--
ALTER TABLE `boosting_clicks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boosting_clicks_user_id_foreign` (`user_id`),
  ADD KEY `boosting_clicks_booster_id_foreign` (`booster_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_user_id_foreign` (`user_id`),
  ADD KEY `referrals_referral_id_foreign` (`referral_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_foreign` (`user_id`);

--
-- Indexes for table `trivia_quizzes`
--
ALTER TABLE `trivia_quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trivia_quiz_results`
--
ALTER TABLE `trivia_quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trivia_quiz_results_user_id_foreign` (`user_id`),
  ADD KEY `trivia_quiz_results_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_number_unique` (`number`),
  ADD KEY `users_referral_id_foreign` (`referral_id`);

--
-- Indexes for table `user_earnings`
--
ALTER TABLE `user_earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_earnings_user_id_foreign` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_results`
--
ALTER TABLE `video_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_results_user_id_foreign` (`user_id`),
  ADD KEY `video_results_video_id_foreign` (`video_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdrawals_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `base_application`
--
ALTER TABLE `base_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boosting_accounts`
--
ALTER TABLE `boosting_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `boosting_clicks`
--
ALTER TABLE `boosting_clicks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trivia_quizzes`
--
ALTER TABLE `trivia_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trivia_quiz_results`
--
ALTER TABLE `trivia_quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_earnings`
--
ALTER TABLE `user_earnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_results`
--
ALTER TABLE `video_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activations`
--
ALTER TABLE `activations`
  ADD CONSTRAINT `activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `boosting_accounts`
--
ALTER TABLE `boosting_accounts`
  ADD CONSTRAINT `boosting_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `boosting_clicks`
--
ALTER TABLE `boosting_clicks`
  ADD CONSTRAINT `boosting_clicks_booster_id_foreign` FOREIGN KEY (`booster_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `boosting_clicks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_referral_id_foreign` FOREIGN KEY (`referral_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `referrals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trivia_quiz_results`
--
ALTER TABLE `trivia_quiz_results`
  ADD CONSTRAINT `trivia_quiz_results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `trivia_quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trivia_quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_referral_id_foreign` FOREIGN KEY (`referral_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_earnings`
--
ALTER TABLE `user_earnings`
  ADD CONSTRAINT `user_earnings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video_results`
--
ALTER TABLE `video_results`
  ADD CONSTRAINT `video_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `video_results_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
