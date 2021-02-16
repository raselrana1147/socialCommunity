-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'superadmin',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `bio`, `address`, `description`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rasel Rana', 'admin@gmail.com', '$2y$10$QR3mDQHQ3DhzIhwlXFnPnOprnBNmvvFYAw6LkpfG7XhkD8fU330sS', 'xuyhegjwcy1608726498.jpg', NULL, 'Tallaba, dhaka', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat no proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'superadmin', 1, '2020-12-21 07:45:49', '2020-12-23 06:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `title`, `description`, `icon`, `qty`, `credit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bronze User', 'Has posted more than 1 post on their profile', 'front/img/badge/bronze-b.png', 1, 20, 2, '2020-11-25 20:06:15', '2020-12-24 07:15:54'),
(2, 'Silver User', 'Has posted more than 100 posts on their profile', 'front/img/badge/silver-b.png', 3, 40, 1, '2020-11-25 20:06:15', '2020-11-25 20:06:15'),
(3, 'Gold User', 'Has posted more than 500 posts on their profile', 'front/img/badge/gold-b.png', 4, 60, 1, '2020-11-25 20:08:23', '2020-11-25 20:08:23'),
(4, 'Platinum User', 'Has posted more than 1000 posts on their profile', 'front/img/badge/platinum-b.png', 5, 100, 1, '2020-11-29 21:33:32', '2020-11-29 21:33:32'),
(5, 'Forum Traveller', 'Created at least 1 topic on 5 different groups forums', 'front/img/badge/traveller-b.png', 6, 20, 1, '2020-11-29 21:33:32', '2020-12-24 07:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `license_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=regular,2=extended',
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=text,2=image or emoji',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `type`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 25, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 05:28:18', '2020-12-10 05:28:18'),
(2, 1, 22, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 05:30:43', '2020-12-10 05:30:43'),
(3, 3, 29, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 06:24:13', '2020-12-10 06:24:13'),
(4, 2, 29, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 06:26:39', '2020-12-10 06:26:39'),
(5, 3, 29, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 06:43:33', '2020-12-10 06:43:33'),
(6, 6, 29, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 07:03:58', '2020-12-10 07:03:58'),
(7, 3, 29, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-10 07:07:10', '2020-12-10 07:07:10'),
(8, 1, 29, 1, 'czxvxfgddf', 1, '2020-12-10 07:28:06', '2020-12-10 07:28:06'),
(9, 3, 28, 1, 'this is nice post', 1, '2020-12-10 07:33:32', '2020-12-10 07:33:32'),
(10, 6, 28, 1, 'czxvxfgddf', 1, '2020-12-10 07:36:24', '2020-12-10 07:36:24'),
(11, 3, 28, 1, 'czxvxfgddf', 1, '2020-12-10 07:36:28', '2020-12-10 07:36:28'),
(12, 2, 28, 1, 'czxvxfgddf', 1, '2020-12-10 07:36:53', '2020-12-10 07:36:53'),
(13, 3, 24, 1, 'czxvxfgddf', 1, '2020-12-10 07:37:31', '2020-12-10 07:37:31'),
(14, 3, 23, 1, 'czxvxfgddf', 1, '2020-12-10 07:52:52', '2020-12-10 07:52:52'),
(15, 3, 15, 1, 'czxvxfgddf', 1, '2020-12-10 07:54:12', '2020-12-10 07:54:12'),
(16, 3, 20, 1, 'czxvxfgddf', 1, '2020-12-10 07:55:48', '2020-12-10 07:55:48'),
(18, 3, 1, 1, 'this is nice post', 1, '2020-12-10 08:00:45', '2020-12-10 08:00:45'),
(19, 3, 26, 1, 'czxvxfgddf', 1, '2020-12-12 01:08:43', '2020-12-12 01:08:43'),
(21, 3, 23, 1, 'czxvxfgddf', 1, '2020-12-13 07:01:35', '2020-12-13 07:01:35'),
(22, 3, 26, 1, 'czxvxfgddf', 1, '2020-12-13 07:14:18', '2020-12-13 07:14:18'),
(23, 3, 26, 1, 'cdfdfs', 1, '2020-12-13 07:14:21', '2020-12-13 07:14:21'),
(24, 3, 26, 1, 'weqwe', 1, '2020-12-13 07:14:26', '2020-12-13 07:14:26'),
(25, 3, 23, 1, 'czxc', 1, '2020-12-13 07:14:52', '2020-12-13 07:14:52'),
(26, 3, 23, 1, 'wewqeqeqwre', 1, '2020-12-13 07:14:56', '2020-12-13 07:14:56'),
(27, 3, 22, 1, 'premerr nam bedona', 1, '2020-12-13 07:16:03', '2020-12-13 07:16:03'),
(28, 3, 28, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1, '2020-12-13 07:27:31', '2020-12-13 07:27:31'),
(29, 3, 27, 1, 'czxvxfgddf', 1, '2020-12-13 07:27:51', '2020-12-13 07:27:51'),
(31, 6, 32, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1, '2020-12-13 07:40:14', '2020-12-13 07:40:14'),
(32, 3, 35, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1, '2020-12-13 07:48:24', '2020-12-13 07:48:24'),
(33, 3, 35, 1, 'czxvxfgddf', 1, '2020-12-15 02:23:32', '2020-12-15 02:23:32'),
(34, 3, 33, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1, '2020-12-15 02:24:14', '2020-12-15 02:24:14'),
(35, 6, 35, 1, 'ssdsfsfs fsdfd', 1, '2020-12-15 02:24:33', '2020-12-15 02:24:33'),
(36, 6, 35, 1, 'xxzczcz', 1, '2020-12-15 02:39:28', '2020-12-15 02:39:28'),
(37, 3, 35, 1, 'czxvxfgddf', 1, '2020-12-15 06:50:51', '2020-12-15 06:50:51'),
(38, 3, 31, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1, '2020-12-15 07:14:41', '2020-12-15 07:14:41'),
(39, 3, 36, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 1, '2020-12-15 08:08:57', '2020-12-15 08:08:57'),
(40, 3, 36, 1, 'czxvxfgddf', 1, '2020-12-15 08:14:59', '2020-12-15 08:14:59'),
(41, 3, 35, 1, 'ssdsfsfs fsdfd', 1, '2020-12-15 08:18:34', '2020-12-15 08:18:34'),
(42, 3, 35, 1, 'xxzczcz', 1, '2020-12-19 02:19:23', '2020-12-19 02:19:23'),
(43, 3, 37, 1, 'Wowww', 1, '2020-12-23 10:23:25', '2020-12-23 10:23:25'),
(44, 3, 38, 1, 'tui mother fucker', 1, '2020-12-23 10:33:32', '2020-12-23 10:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_from` int(10) UNSIGNED NOT NULL,
  `request_to` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=pending,2=accepted,3=Canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `request_from`, `request_to`, `status`, `created_at`, `updated_at`) VALUES
(89, 6, 3, 2, '2020-12-15 07:22:11', '2020-12-15 07:22:58'),
(102, 3, 1, 1, '2020-12-23 10:25:53', '2020-12-23 10:25:53'),
(103, 3, 1, 1, '2020-12-23 10:26:00', '2020-12-23 10:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Airport', 1, NULL, NULL),
(4, 'Airline', 1, NULL, NULL),
(5, 'Balcony', 1, NULL, NULL),
(6, 'Beach', 2, NULL, '2020-12-24 02:50:10'),
(7, 'Bedroom', 1, NULL, '2020-12-24 02:50:33'),
(8, 'Bus', 1, NULL, NULL),
(9, 'Chair', 1, NULL, NULL),
(10, 'Cinema', 1, NULL, NULL),
(11, 'Classroom', 1, NULL, '2020-12-24 01:03:17'),
(12, 'Couch', 1, NULL, '2020-12-24 02:50:04'),
(13, 'Garage', 1, NULL, NULL),
(14, 'Grocery Store', 1, NULL, NULL),
(15, 'Kitchen', 1, NULL, NULL),
(16, 'Library', 1, NULL, NULL),
(17, 'Museum', 1, NULL, NULL),
(18, 'Office', 1, NULL, NULL),
(19, 'Park', 1, NULL, NULL),
(20, 'School', 1, NULL, NULL),
(21, 'Shower', 1, NULL, '2020-12-24 02:49:58');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_23_085347_create_badges_table', 1),
(5, '2020_11_23_085828_create_quests_table', 1),
(6, '2020_11_25_091838_create_posts_table', 1),
(7, '2020_11_25_140815_create_user_badges_table', 1),
(8, '2020_11_26_085735_create_user_quests_table', 2),
(10, '2020_11_27_200304_create_reacts_table', 3),
(11, '2020_11_29_071403_create_product_categories_table', 4),
(13, '2020_11_30_090625_create_carts_table', 6),
(14, '2020_12_01_153550_create_orders_table', 7),
(16, '2020_12_08_091748_create_locations_table', 9),
(17, '2020_12_08_122758_create_products_table', 10),
(18, '2020_12_10_072132_create_comments_table', 11),
(20, '2020_12_12_103345_create_friends_table', 12),
(22, '2020_12_14_072329_create_product_comments_table', 14),
(23, '2020_12_14_112535_create_product_rattings_table', 15),
(24, '2020_12_12_095138_create_notifications_table', 16),
(26, '2020_12_21_121524_create_admins_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=affiliate user sing up,2=product sell,3=product comment,4=product review,5=post reaction,6=post comment,7=friend request send,8=accept friend request',
  `notification_to` int(10) UNSIGNED NOT NULL,
  `notification_from` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=unread,2=read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `type`, `notification_to`, `notification_from`, `post_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(39, 'has reacted on your post', 5, 3, 3, 35, NULL, 2, '2020-12-15 07:14:07', '2020-12-23 10:24:36'),
(42, 'You have new a sell', 2, 3, 6, NULL, 8, 2, '2020-12-15 07:15:34', '2020-12-23 10:24:36'),
(43, 'You have new a sell', 2, 3, 6, NULL, 4, 2, '2020-12-15 07:15:34', '2020-12-23 10:24:36'),
(44, 'Send a friend request', 7, 3, 6, NULL, NULL, 2, '2020-12-15 07:22:11', '2020-12-23 10:24:36'),
(45, 'Send a friend request', 7, 3, 6, NULL, NULL, 2, '2020-12-15 07:22:12', '2020-12-23 10:24:36'),
(52, 'Comment on your post', 6, 6, 3, 36, NULL, 1, '2020-12-15 08:14:59', '2020-12-15 08:23:19'),
(53, 'Comment on your product', 3, 6, 6, NULL, 9, 1, '2020-12-15 08:15:52', '2020-12-15 08:23:19'),
(54, 'Comment on your post', 6, 3, 3, 35, NULL, 2, '2020-12-15 08:18:34', '2020-12-23 10:24:36'),
(55, 'Has reacted on your post', 5, 6, 3, 33, NULL, 1, '2020-12-15 08:19:13', '2020-12-15 08:23:19'),
(56, 'Provide review on your product', 3, 3, 6, NULL, 8, 2, '2020-12-15 08:19:42', '2020-12-23 10:24:36'),
(57, 'Comment on your post', 6, 3, 3, 35, NULL, 2, '2020-12-19 02:19:23', '2020-12-23 10:24:36'),
(58, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:21:03', '2020-12-21 05:16:46'),
(59, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:30:08', '2020-12-21 05:16:46'),
(60, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:31:16', '2020-12-21 05:16:46'),
(61, 'Send a friend request', 7, 2, 3, NULL, NULL, 1, '2020-12-21 01:31:34', '2020-12-21 01:31:34'),
(62, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:32:32', '2020-12-21 05:16:46'),
(63, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:34:10', '2020-12-21 05:16:46'),
(64, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:35:53', '2020-12-21 05:16:46'),
(65, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:37:58', '2020-12-21 05:16:46'),
(66, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 01:40:03', '2020-12-21 05:16:46'),
(67, 'Send a friend request', 7, 2, 3, NULL, NULL, 1, '2020-12-21 01:41:26', '2020-12-21 01:41:26'),
(68, 'Send a friend request', 7, 1, 3, NULL, NULL, 2, '2020-12-21 02:36:15', '2020-12-21 05:16:46'),
(69, 'Accept your friend request', 8, 3, 1, NULL, NULL, 2, '2020-12-21 02:36:49', '2020-12-23 10:24:36'),
(70, 'has reacted on your post', 5, 3, 1, 34, NULL, 2, '2020-12-21 04:16:14', '2020-12-23 10:24:36'),
(71, 'Has reacted on your post', 5, 3, 1, 34, NULL, 2, '2020-12-21 04:16:39', '2020-12-23 10:24:36'),
(72, 'Has reacted on your post', 5, 3, 3, 35, NULL, 2, '2020-12-21 04:17:20', '2020-12-23 10:24:36'),
(73, 'Has reacted on your post', 5, 3, 3, 35, NULL, 2, '2020-12-22 05:08:19', '2020-12-23 10:24:36'),
(74, 'Has reacted on your post', 5, 3, 3, 35, NULL, 2, '2020-12-22 05:08:22', '2020-12-23 10:24:36'),
(75, 'Has reacted on your post', 5, 3, 3, 35, NULL, 2, '2020-12-22 05:08:38', '2020-12-23 10:24:36'),
(76, 'Has reacted on your post', 5, 3, 3, 35, NULL, 2, '2020-12-22 05:08:41', '2020-12-23 10:24:36'),
(77, 'has reacted on your post', 5, 3, 3, 30, NULL, 2, '2020-12-22 05:12:27', '2020-12-23 10:24:36'),
(78, 'has reacted on your post', 5, 1, 3, 37, NULL, 1, '2020-12-23 10:22:47', '2020-12-23 10:22:47'),
(79, 'Has reacted on your post', 5, 1, 3, 37, NULL, 1, '2020-12-23 10:22:51', '2020-12-23 10:22:51'),
(80, 'Comment on your post', 6, 1, 3, 37, NULL, 1, '2020-12-23 10:23:25', '2020-12-23 10:23:25'),
(81, 'Send a friend request', 7, 1, 3, NULL, NULL, 1, '2020-12-23 10:25:53', '2020-12-23 10:25:53'),
(82, 'Send a friend request', 7, 1, 3, NULL, NULL, 1, '2020-12-23 10:26:00', '2020-12-23 10:26:00'),
(83, 'has reacted on your post', 5, 3, 3, 38, NULL, 1, '2020-12-23 10:32:57', '2020-12-23 10:32:57'),
(84, 'Comment on your post', 6, 3, 3, 38, NULL, 1, '2020-12-23 10:33:33', '2020-12-23 10:33:33'),
(85, 'You have new a sell', 2, 3, 3, NULL, 8, 1, '2020-12-23 10:35:22', '2020-12-23 10:35:22'),
(86, 'You have new a sell', 2, 3, 3, NULL, 10, 1, '2020-12-23 14:09:29', '2020-12-23 14:09:29'),
(87, 'You have new a sell', 2, 6, 3, NULL, 9, 1, '2020-12-23 14:09:29', '2020-12-23 14:09:29'),
(88, 'You have a new sell', 2, 3, 3, NULL, 10, 1, '2020-12-23 14:54:11', '2020-12-23 14:54:11'),
(89, 'You have a new sell', 2, 3, 3, NULL, 10, 1, '2020-12-23 14:58:58', '2020-12-23 14:58:58'),
(90, 'You have a new sell', 2, 3, 3, NULL, 10, 1, '2020-12-23 15:01:28', '2020-12-23 15:01:28'),
(91, 'You have a new sell', 2, 3, 3, NULL, 10, 1, '2020-12-23 15:06:38', '2020-12-23 15:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=pending,2=approved,3=cancelled',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_data`, `total_price`, `order_id`, `transaction_id`, `user_ip`, `order_note`, `status`, `created_at`, `updated_at`) VALUES
(12, 3, '[{\"id\":44,\"user_id\":3,\"product_id\":6,\"license_type\":1,\"price\":60,\"created_at\":\"2020-12-09 13:07:33\",\"updated_at\":\"2020-12-09 13:07:33\"},{\"id\":45,\"user_id\":3,\"product_id\":5,\"license_type\":1,\"price\":205.6,\"created_at\":\"2020-12-09 13:07:54\",\"updated_at\":\"2020-12-09 13:07:54\"},{\"id\":47,\"user_id\":3,\"product_id\":4,\"license_type\":1,\"price\":1000,\"created_at\":\"2020-12-09 13:31:59\",\"updated_at\":\"2020-12-09 13:31:59\"}]', 1266, '5fd0d26fa1996', NULL, NULL, NULL, 3, '2020-12-09 19:34:39', NULL),
(13, 3, '[{\"id\":48,\"user_id\":3,\"product_id\":6,\"license_type\":1,\"price\":60,\"created_at\":\"2020-12-09 14:21:46\",\"updated_at\":\"2020-12-09 14:21:46\"},{\"id\":49,\"user_id\":3,\"product_id\":7,\"license_type\":1,\"price\":66.67,\"created_at\":\"2020-12-09 14:22:07\",\"updated_at\":\"2020-12-09 14:22:07\"}]', 127, '5fd0dd9915388', NULL, NULL, NULL, 3, '2020-12-09 20:22:17', NULL),
(14, 3, '[{\"id\":54,\"user_id\":3,\"product_id\":9,\"license_type\":1,\"price\":3.75,\"created_at\":\"2020-12-15 09:47:48\",\"updated_at\":\"2020-12-15 09:47:48\"},{\"id\":55,\"user_id\":3,\"product_id\":8,\"license_type\":1,\"price\":13.33,\"created_at\":\"2020-12-15 09:48:06\",\"updated_at\":\"2020-12-15 09:48:06\"}]', 17, '5fd8866b814db', NULL, NULL, NULL, 1, '2020-12-15 15:48:27', NULL),
(15, 6, '[{\"id\":56,\"user_id\":6,\"product_id\":7,\"license_type\":1,\"price\":66.67,\"created_at\":\"2020-12-15 11:31:50\",\"updated_at\":\"2020-12-15 11:31:50\"},{\"id\":57,\"user_id\":6,\"product_id\":4,\"license_type\":1,\"price\":1000,\"created_at\":\"2020-12-15 11:32:04\",\"updated_at\":\"2020-12-15 11:32:04\"}]', 1067, '5fd8866b514db', NULL, NULL, NULL, 1, '2020-12-15 17:50:10', NULL),
(16, 6, '[{\"id\":58,\"user_id\":6,\"product_id\":9,\"license_type\":1,\"price\":3.75,\"created_at\":\"2020-12-15 11:56:18\",\"updated_at\":\"2020-12-15 11:56:18\"},{\"id\":59,\"user_id\":6,\"product_id\":8,\"license_type\":1,\"price\":13.33,\"created_at\":\"2020-12-15 11:56:26\",\"updated_at\":\"2020-12-15 11:56:26\"}]', 17, '67115', NULL, NULL, NULL, 1, '2020-12-15 18:00:12', NULL),
(17, 6, '[{\"id\":60,\"user_id\":6,\"product_id\":8,\"license_type\":1,\"price\":13.33,\"created_at\":\"2020-12-15 12:01:06\",\"updated_at\":\"2020-12-15 12:01:06\"},{\"id\":61,\"user_id\":6,\"product_id\":5,\"license_type\":1,\"price\":205.6,\"created_at\":\"2020-12-15 12:01:14\",\"updated_at\":\"2020-12-15 12:01:14\"},{\"id\":62,\"user_id\":6,\"product_id\":6,\"license_type\":1,\"price\":60,\"created_at\":\"2020-12-15 12:01:23\",\"updated_at\":\"2020-12-15 12:01:23\"}]', 279, '31944', NULL, NULL, NULL, 1, '2020-12-15 18:01:36', NULL),
(18, 6, '[{\"id\":63,\"user_id\":6,\"product_id\":8,\"license_type\":1,\"price\":13.33,\"created_at\":\"2020-12-15 12:22:37\",\"updated_at\":\"2020-12-15 12:22:37\"},{\"id\":64,\"user_id\":6,\"product_id\":6,\"license_type\":1,\"price\":60,\"created_at\":\"2020-12-15 12:22:47\",\"updated_at\":\"2020-12-15 12:22:47\"},{\"id\":65,\"user_id\":6,\"product_id\":9,\"license_type\":1,\"price\":3.75,\"created_at\":\"2020-12-15 12:23:00\",\"updated_at\":\"2020-12-15 12:23:00\"}]', 77, '1100', NULL, NULL, NULL, 1, '2020-12-15 18:23:13', NULL),
(19, 6, '[{\"id\":66,\"user_id\":6,\"product_id\":8,\"license_type\":1,\"price\":13.33,\"created_at\":\"2020-12-15 13:15:12\",\"updated_at\":\"2020-12-15 13:15:12\"},{\"id\":67,\"user_id\":6,\"product_id\":4,\"license_type\":1,\"price\":1000,\"created_at\":\"2020-12-15 13:15:21\",\"updated_at\":\"2020-12-15 13:15:21\"}]', 1013, '43809', NULL, NULL, NULL, 1, '2020-12-15 19:15:35', NULL),
(20, 3, '[{\"id\":69,\"user_id\":3,\"product_id\":8,\"license_type\":1,\"price\":13.33,\"created_at\":\"2020-12-23 16:35:07\",\"updated_at\":\"2020-12-23 16:35:07\"}]', 13, '58073', NULL, NULL, NULL, 1, '2020-12-23 22:35:22', NULL),
(21, 3, '[{\"id\":72,\"user_id\":3,\"product_id\":10,\"license_type\":1,\"price\":175,\"created_at\":\"2020-12-23 19:59:30\",\"updated_at\":\"2020-12-23 19:59:30\"},{\"id\":73,\"user_id\":3,\"product_id\":9,\"license_type\":1,\"price\":75,\"created_at\":\"2020-12-23 20:00:29\",\"updated_at\":\"2020-12-23 20:00:29\"}]', 250, '92787', NULL, NULL, NULL, 1, '2020-12-24 02:09:29', NULL),
(22, 3, '[{\"id\":74,\"user_id\":3,\"product_id\":10,\"license_type\":1,\"price\":175,\"created_at\":\"2020-12-23 20:22:12\",\"updated_at\":\"2020-12-23 20:22:12\"}]', 175, '26900', NULL, NULL, NULL, 2, '2020-12-24 02:54:11', NULL),
(23, 3, '[{\"id\":75,\"user_id\":3,\"product_id\":10,\"license_type\":1,\"price\":175,\"created_at\":\"2020-12-23 20:58:47\",\"updated_at\":\"2020-12-23 20:58:47\"}]', 175, '5871', NULL, NULL, NULL, 2, '2020-12-24 02:58:58', NULL),
(24, 3, '[]', 0, '91990', NULL, NULL, NULL, 2, '2020-12-24 02:59:17', NULL),
(25, 3, '[{\"id\":76,\"user_id\":3,\"product_id\":10,\"license_type\":1,\"price\":175,\"created_at\":\"2020-12-23 21:01:05\",\"updated_at\":\"2020-12-23 21:01:05\"}]', 175, '42100', NULL, NULL, NULL, 2, '2020-12-24 03:01:28', NULL),
(26, 3, '[{\"id\":77,\"user_id\":3,\"product_id\":10,\"license_type\":1,\"price\":175,\"created_at\":\"2020-12-23 21:06:29\",\"updated_at\":\"2020-12-23 21:06:29\"}]', 175, '71853', NULL, NULL, NULL, 2, '2020-12-24 03:06:39', NULL);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_text`, `user_id`, `tag`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 1, NULL, 1, NULL, '2020-11-25 21:05:13', '2020-11-25 21:05:13'),
(2, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. \r\n\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 1, NULL, 1, NULL, '2020-11-25 21:05:13', '2020-11-25 21:05:13'),
(3, 'hggf jhgk', 1, NULL, 1, NULL, '2020-11-26 05:21:32', '2020-11-26 05:21:32'),
(4, 'test', 1, NULL, 1, 'ch8b1xxfgw1606389746.jpg', '2020-11-26 05:22:26', '2020-11-26 05:22:26'),
(5, 'fgbfgb gfby', 1, NULL, 1, NULL, '2020-11-26 06:48:33', '2020-11-26 06:48:33'),
(6, 'test', 1, NULL, 1, NULL, '2020-11-26 06:58:05', '2020-11-26 06:58:05'),
(7, 'Test now', 1, NULL, 1, 'izcfbi5vlm1606396587.webp', '2020-11-26 07:16:28', '2020-11-26 07:16:28'),
(8, 'test after', 1, NULL, 1, NULL, '2020-11-28 02:09:30', '2020-11-28 02:09:30'),
(9, 'The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', 1, NULL, 1, NULL, '2020-11-28 04:38:43', '2020-11-28 04:38:43'),
(10, 'test', 2, NULL, 1, NULL, '2020-11-28 04:52:46', '2020-11-28 04:52:46'),
(11, 'React test', 1, NULL, 1, NULL, '2020-11-28 08:18:27', '2020-11-28 08:18:27'),
(12, 'Complete your profile by filling profile info fields, completing quests & unlocking badges', 1, NULL, 1, NULL, '2020-11-28 08:24:23', '2020-11-28 08:24:23'),
(13, 'again', 1, NULL, 1, NULL, '2020-11-28 08:36:23', '2020-11-28 08:36:23'),
(14, 'mango', 2, NULL, 1, NULL, '2020-11-28 11:13:13', '2020-11-28 11:13:13'),
(15, 'Meskat Ahosan', 2, NULL, 1, NULL, '2020-11-30 04:29:55', '2020-11-30 04:29:55'),
(17, 'test', 1, NULL, 1, 'dmamhvsl7w1606754324.jpg', '2020-11-30 10:38:45', '2020-11-30 10:38:45'),
(19, 'zSXzXzX', 3, NULL, 1, NULL, '2020-12-02 07:01:55', '2020-12-02 07:01:55'),
(20, 'xzCxzcxz', 3, NULL, 1, 'wkr1r8xuqb1606914135.jpg', '2020-12-02 07:02:15', '2020-12-02 07:02:15'),
(21, 'cxczxc', 3, NULL, 1, NULL, '2020-12-02 09:03:28', '2020-12-02 09:03:28'),
(22, 'Hello World', 6, NULL, 1, 'zvkdgvbe551606932519.jpg', '2020-12-02 12:08:39', '2020-12-02 12:08:39'),
(23, 'New Post', 6, NULL, 1, 'i3dn73evfd1606939176.jpg', '2020-12-02 13:59:38', '2020-12-02 13:59:38'),
(24, 'czxczx', 3, NULL, 1, NULL, '2020-12-05 02:41:10', '2020-12-05 02:41:10'),
(25, 'cxczxc', 1, NULL, 1, NULL, '2020-12-05 06:08:17', '2020-12-05 06:08:17'),
(26, 'xczxczxc', 3, NULL, 1, NULL, '2020-12-05 06:08:28', '2020-12-05 06:08:28'),
(27, 'czxcxz', 3, NULL, 1, NULL, '2020-12-05 06:09:26', '2020-12-05 06:09:26'),
(28, 'cvcv', 3, NULL, 1, NULL, '2020-12-05 07:50:59', '2020-12-05 07:50:59'),
(29, 'cxzzcxz', 3, NULL, 1, NULL, '2020-12-05 07:52:02', '2020-12-05 07:52:02'),
(31, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6, NULL, 1, 'gjwj6fhqv21607866710.jpg', '2020-12-13 07:38:31', '2020-12-13 07:38:31'),
(32, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6, NULL, 1, 'vnbvme7dyh1607866801.webp', '2020-12-13 07:40:02', '2020-12-13 07:40:02'),
(33, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6, NULL, 1, 'uq9vkx7ye21607866977.jpg', '2020-12-13 07:42:57', '2020-12-13 07:42:57'),
(34, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, NULL, 1, 'y7rkn3jxd81607867114.jpg', '2020-12-13 07:45:14', '2020-12-24 08:04:05'),
(35, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, NULL, 1, 'wktwgyttd61607867135.jpg', '2020-12-13 07:45:35', '2020-12-24 08:04:03'),
(36, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6, NULL, 1, 'kk5toieoy31607867233.jpg', '2020-12-13 07:47:13', '2020-12-24 08:04:04'),
(37, 'fdff', 1, NULL, 1, NULL, '2020-12-21 02:42:16', '2020-12-21 02:42:16'),
(38, 'hello mother fucker', 3, NULL, 1, NULL, '2020-12-23 10:32:46', '2020-12-23 10:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `product_type` tinyint(4) NOT NULL COMMENT '1=single product,2=four set photo',
  `location_id` int(10) UNSIGNED NOT NULL,
  `skin_level` tinyint(4) NOT NULL COMMENT '1=lingerie,2=topless,3=nude',
  `require_token` int(11) NOT NULL,
  `item_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'single and fourset',
  `single_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_view` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `product_type`, `location_id`, `skin_level`, `require_token`, `item_url`, `description`, `image_type`, `single_image`, `image_view`, `thumbnail`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Test Gardener', 1000, 1, 4, 2, 75000, 'https://mitailoring.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'single', 'oxlls9duul1607512637.jpg', '{\"front\":\"\",\"side\":\"\",\"rear\":\"\",\"angel\":\"\"}', 'ab7lqgstir1607512511.jpg', 3, 1, '2020-12-09 01:13:07', '2020-12-09 07:00:27'),
(5, 'Flap Pockets X2', 205.6, 2, 3, 2, 15420, 'https://mitailoring.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fourset', '325e4b5znv1607515225.jpg', '{\"front\":\"cr0lhl7umh1607515313.jpg\",\"side\":\"svicm7iefq1607514922.jpg\",\"rear\":\"ik5cnphjd81607514954.jpg\",\"angel\":\"1ps3x3h9lv1607514877.jpg\"}', '5n8jgswvq21607514877.jpg', 3, 1, '2020-12-09 05:54:37', '2020-12-09 07:01:15'),
(6, 'Flap Pockets X2', 60, 2, 12, 1, 4500, 'https://mitailoring.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fourset', NULL, '{\"front\":\"pqorn8nebt1607516822.jpg\",\"side\":\"q3vcgyxgms1607516823.jpg\",\"rear\":\"9xkpdlbie11607516823.jpg\",\"angel\":\"z44hiy3sfo1607516823.jpg\"}', '76ljytkufz1607516822.jpg', 3, 1, '2020-12-09 06:27:03', '2020-12-09 07:00:40'),
(7, 'Test Gardener ok', 66.6667, 1, 14, 2, 5000, 'https://mitailoring.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'single', 'e3ai96o7ah1607516911.jpg', '{\"front\":\"\",\"side\":\"\",\"rear\":\"\",\"angel\":\"\"}', '7hyse02owi1607516910.jpg', 3, 1, '2020-12-09 06:28:31', '2020-12-09 07:01:02'),
(8, 'Flap Pockets X2', 13.3333, 1, 6, 3, 1000, 'https://mitailoring.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'single', 'mtwxelw2gl1607516996.jpg', '{\"front\":\"\",\"side\":\"\",\"rear\":\"\",\"angel\":\"\"}', 'khgfipdtfw1607516996.jpg', 3, 1, '2020-12-09 06:29:57', '2020-12-09 07:00:51'),
(9, 'New style', 3.75, 1, 6, 2, 75, 'https://mitailoring.com', 'dsfsfdgd', 'single', 'v9zxx5gh3x1608025556.jpg', '{\"front\":\"\",\"side\":\"\",\"rear\":\"\",\"angel\":\"\"}', 'aw6ncokm1p1608025555.jpg', 6, 1, '2020-12-15 03:45:56', '2020-12-15 03:45:56'),
(10, 'Test M', 2.33333, 2, 3, 2, 175, 'www.test.com/picture', 'Thudi na', 'fourset', 'ypt7cpjtlu1608749645.png', '{\"front\":\"yqc0ixv6nc1608752051.png\",\"side\":\"bimnojo8cu1608752051.png\",\"rear\":\"cvphuzg3qq1608752051.png\",\"angel\":\"jdhfqaywxt1608752051.jpg\"}', 'vg8sjrbczh1608749644.png', 3, 1, '2020-12-23 12:54:05', '2020-12-23 13:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=text,2=image or emoji',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `user_id`, `product_id`, `type`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 7, 1, 'Hi! I just purchased this item and I have a question, does it have the PSD files included? Thanks!', 1, '2020-12-14 01:47:44', '2020-12-14 01:47:44'),
(2, 3, 7, 1, 'this is nice photo :-)', 1, '2020-12-14 01:57:22', '2020-12-14 01:57:22'),
(3, 6, 5, 1, 'dsdfsafs', 1, '2020-12-14 02:17:46', '2020-12-14 02:17:46'),
(4, 3, 7, 1, 'this is nice product', 1, '2020-12-14 02:19:44', '2020-12-14 02:19:44'),
(5, 3, 4, 1, 'bvbvc', 1, '2020-12-14 02:21:05', '2020-12-14 02:21:05'),
(6, 6, 4, 1, 'xvv', 1, '2020-12-14 02:25:02', '2020-12-14 02:25:02'),
(7, 3, 4, 1, 'dsadsdfg', 1, '2020-12-14 02:25:35', '2020-12-14 02:25:35'),
(8, 6, 4, 1, 'vxvx  ff', 1, '2020-12-14 02:27:15', '2020-12-14 02:27:15'),
(9, 6, 4, 1, 'xvxc', 1, '2020-12-14 02:27:32', '2020-12-14 02:27:32'),
(10, 3, 4, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-14 02:36:06', '2020-12-14 02:36:06'),
(11, 3, 8, 1, 'fsg', 1, '2020-12-14 02:59:01', '2020-12-14 02:59:01'),
(12, 6, 4, 1, 'sghjhjhgfdssdfhgj', 1, '2020-12-14 03:22:18', '2020-12-14 03:22:18'),
(13, 3, 8, 1, 'f', 1, '2020-12-14 05:03:19', '2020-12-14 05:03:19'),
(14, 3, 8, 1, 'sdasds', 1, '2020-12-14 06:05:28', '2020-12-14 06:05:28'),
(15, 3, 8, 1, 'dsafsfd', 1, '2020-12-14 06:05:37', '2020-12-14 06:05:37'),
(16, 3, 8, 1, 'ffdf', 1, '2020-12-14 06:05:46', '2020-12-14 06:05:46'),
(17, 3, 8, 1, 'fsfd', 1, '2020-12-14 06:05:55', '2020-12-14 06:05:55'),
(18, 3, 7, 1, 'dfs', 1, '2020-12-14 06:07:46', '2020-12-14 06:07:46'),
(19, 3, 7, 1, 'gfgdf', 1, '2020-12-14 06:07:54', '2020-12-14 06:07:54'),
(20, 3, 7, 1, 'gff', 1, '2020-12-14 06:08:02', '2020-12-14 06:08:02'),
(21, 3, 6, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2020-12-14 06:53:07', '2020-12-14 06:53:07'),
(22, 3, 6, 1, 'sdsfd', 1, '2020-12-14 06:58:19', '2020-12-14 06:58:19'),
(23, 6, 7, 1, 'vxvdfsdgd', 1, '2020-12-15 02:52:10', '2020-12-15 02:52:10'),
(24, 6, 7, 1, 'vxvdfsdgd', 1, '2020-12-15 02:53:02', '2020-12-15 02:53:02'),
(25, 3, 9, 1, 'sdfghjkjhgfs', 1, '2020-12-15 07:35:46', '2020-12-15 07:35:46'),
(26, 3, 9, 1, 'vvxvx', 1, '2020-12-15 07:50:55', '2020-12-15 07:50:55'),
(27, 3, 4, 1, 'cxcxx', 1, '2020-12-15 08:05:50', '2020-12-15 08:05:50'),
(28, 6, 9, 1, 'cxzxvxc', 1, '2020-12-15 08:15:52', '2020-12-15 08:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_rattings`
--

CREATE TABLE `product_rattings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=text,2=image or emoji',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratting` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_rattings`
--

INSERT INTO `product_rattings` (`id`, `user_id`, `product_id`, `type`, `content`, `ratting`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 8, 1, 'Best template I have ever had. Good documentation and code practices.', 5, 1, '2020-12-14 05:36:59', '2020-12-14 05:36:59'),
(2, 6, 4, 1, 'Best template I have ever had. Good documentation and code practices.', 3, 1, '2020-12-14 05:38:45', '2020-12-14 05:38:45'),
(3, 3, 8, 1, 'this is nice product', 4, 1, '2020-12-14 05:42:33', '2020-12-14 05:42:33'),
(4, 3, 8, 1, 'Best template I have ever had. Good documentation and code practices.', 5, 1, '2020-12-14 05:42:48', '2020-12-14 05:42:48'),
(5, 3, 8, 1, 'Best template I have ever had. Good documentation and code practices.', 1, 1, '2020-12-14 05:42:56', '2020-12-14 05:42:56'),
(6, 6, 8, 1, 'Best template I have ever had. Good documentation and code practices.', 1, 1, '2020-12-14 05:43:07', '2020-12-14 05:43:07'),
(7, 6, 8, 1, 'Best template I have ever had. Good documentation and code practices.', 1, 1, '2020-12-14 05:43:14', '2020-12-14 05:43:14'),
(8, 3, 7, 1, 'dffsd', 1, 1, '2020-12-14 06:08:27', '2020-12-14 06:08:27'),
(9, 3, 7, 1, 'trttrr', 5, 1, '2020-12-14 06:08:43', '2020-12-14 06:08:43'),
(10, 3, 7, 1, 'dfsdgf', 5, 1, '2020-12-14 06:27:29', '2020-12-14 06:27:29'),
(11, 3, 8, 1, 'dasfsgfgf', 5, 1, '2020-12-14 06:42:48', '2020-12-14 06:42:48'),
(12, 3, 8, 1, 'fdfdgdgdfg  vvvggg', 4, 1, '2020-12-14 06:43:11', '2020-12-14 06:43:11'),
(13, 3, 8, 1, 'wwww', 4, 1, '2020-12-14 06:43:38', '2020-12-14 06:43:38'),
(14, 3, 8, 1, 'cxcxcxcxcxcxcxcxc', 4, 1, '2020-12-14 06:44:37', '2020-12-14 06:44:37'),
(15, 3, 8, 1, 'cxcxcxcxcwwwwwwwwwwwwwwwwwwwww', 5, 1, '2020-12-14 06:44:54', '2020-12-14 06:44:54'),
(16, 3, 6, 1, 'rasdsadasjfh', 4, 1, '2020-12-14 06:45:44', '2020-12-14 06:45:44'),
(17, 3, 6, 1, 'SSSS', 3, 1, '2020-12-14 06:46:20', '2020-12-14 06:46:20'),
(18, 3, 6, 1, 'aaa', 4, 1, '2020-12-14 06:48:03', '2020-12-14 06:48:03'),
(19, 3, 6, 1, 'ddd', 4, 1, '2020-12-14 06:48:21', '2020-12-14 06:48:21'),
(20, 3, 6, 1, 'www', 2, 1, '2020-12-14 06:48:33', '2020-12-14 06:48:33'),
(21, 3, 6, 1, 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 3, 1, '2020-12-14 06:53:23', '2020-12-14 06:53:23'),
(22, 3, 6, 1, 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 4, 1, '2020-12-14 07:08:39', '2020-12-14 07:08:39'),
(23, 6, 7, 1, '5 start', 5, 1, '2020-12-15 02:55:31', '2020-12-15 02:55:31'),
(24, 3, 8, 1, 'dsdsd', 1, 1, '2020-12-15 07:34:04', '2020-12-15 07:34:04'),
(25, 6, 8, 1, 'cxcx', 5, 1, '2020-12-15 08:19:41', '2020-12-15 08:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `quests`
--

CREATE TABLE `quests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `type` int(3) DEFAULT NULL COMMENT '1=social links,2=likes,3=profile info,4=product',
  `is_featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quests`
--

INSERT INTO `quests` (`id`, `title`, `cover_picture`, `description`, `icon`, `qty`, `credit`, `status`, `type`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Social King', 'front/img/quest/cover/01.png', 'You have linked at least 8 social networks to your profile', 'front/img/quest/openq-b.png', 8, 60, 1, 1, 1, '2020-11-25 20:50:11', '2020-11-25 20:50:11'),
(2, 'Friendly User', 'front/img/quest/cover/02.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'front/img/quest/completedq-b.png', 55, 45, 1, 2, 1, '2020-11-25 20:50:11', '2020-12-24 05:37:57'),
(3, 'Store Manager', 'front/img/quest/cover/04.png', 'You have uploaded at least 10 items in your shop', 'front/img/quest/openq-b.png', 10, 100, 1, 4, 0, '2020-11-25 20:56:39', '2020-12-24 03:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `reacts`
--

CREATE TABLE `reacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `react_type` int(11) NOT NULL COMMENT '1=like,2=love,3=dislike,4=happy,5=funny,6=wow,7=angry,8=sad',
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `post_or_comment_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=post,2=comment',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reacts`
--

INSERT INTO `reacts` (`id`, `react_type`, `user_id`, `owner_id`, `post_or_comment_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, 10, 1, 1, NULL, NULL),
(2, 2, 2, NULL, 9, 1, 1, NULL, NULL),
(3, 3, 1, NULL, 10, 1, 1, NULL, NULL),
(4, 7, 1, NULL, 8, 1, 1, NULL, NULL),
(5, 2, 1, NULL, 7, 1, 1, NULL, NULL),
(6, 2, 1, NULL, 6, 1, 1, NULL, NULL),
(7, 2, 1, NULL, 4, 1, 1, NULL, NULL),
(8, 1, 1, NULL, 9, 1, 1, NULL, NULL),
(9, 1, 1, NULL, 1, 1, 1, NULL, NULL),
(10, 2, 1, NULL, 2, 1, 1, NULL, NULL),
(11, 4, 1, NULL, 3, 1, 1, NULL, NULL),
(12, 4, 1, NULL, 5, 1, 1, NULL, NULL),
(13, 8, 1, NULL, 11, 1, 1, NULL, NULL),
(14, 2, 1, NULL, 12, 1, 1, NULL, NULL),
(15, 8, 2, NULL, 12, 1, 1, NULL, NULL),
(16, 2, 2, NULL, 14, 1, 1, NULL, NULL),
(17, 8, 1, NULL, 13, 1, 1, NULL, NULL),
(18, 8, 1, NULL, 14, 1, 1, NULL, NULL),
(19, 5, 2, NULL, 8, 1, 1, NULL, NULL),
(20, 3, 2, NULL, 1, 1, 1, NULL, NULL),
(21, 8, 2, NULL, 13, 1, 1, NULL, NULL),
(22, 2, 2, NULL, 15, 1, 1, NULL, NULL),
(24, 2, 1, NULL, 17, 1, 1, NULL, NULL),
(26, 4, 3, NULL, 20, 1, 1, NULL, NULL),
(27, 2, 6, NULL, 22, 1, 1, NULL, NULL),
(28, 5, 6, NULL, 21, 1, 1, NULL, NULL),
(29, 2, 3, NULL, 23, 1, 1, NULL, NULL),
(31, 4, 3, NULL, 24, 1, 1, NULL, NULL),
(32, 2, 3, NULL, 22, 1, 1, NULL, NULL),
(33, 2, 3, NULL, 29, 1, 1, NULL, NULL),
(34, 5, 3, NULL, 33, 1, 1, NULL, NULL),
(35, 2, 3, NULL, 36, 1, 1, NULL, NULL),
(36, 8, 3, NULL, 35, 1, 1, NULL, NULL),
(37, 5, 3, NULL, 34, 1, 1, NULL, NULL),
(38, 3, 6, NULL, 36, 1, 1, NULL, NULL),
(39, 4, 3, NULL, 32, 1, 1, NULL, NULL),
(40, 2, 1, NULL, 34, 1, 1, NULL, NULL),
(42, 1, 3, NULL, 37, 1, 1, NULL, NULL),
(43, 2, 3, NULL, 38, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `life_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=single,2=engaged,3=maried,4=divorced,5=In a relationship',
  `credit` int(11) NOT NULL DEFAULT 0,
  `balance` double(8,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_affiliate` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=No,2=Pending,3=Approved,4=canceled',
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=pending,2=activated,3=inactive,4=locked,5=suspended',
  `email_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=inactive,1=activated',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `parent_id`, `email`, `username`, `phone`, `email_verified_at`, `password`, `salt`, `country`, `city`, `dob`, `birth_place`, `occupation`, `website`, `life_status`, `credit`, `balance`, `payment_method`, `payment_email`, `avatar`, `cover_photo`, `about`, `is_affiliate`, `affiliate_id`, `status`, `email_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdullah Al  Mamun', 3, 'maamun79@gmail.com', 'maamun79', '015485685865', NULL, '$2y$10$vQGkWubtNCyNl9wbD2YUeuL3lLOqmGQLG9fSI8aVzCf6Yy6Hn7LjO', 'MTIzNDU2', 'Bangladesh', 'Lakshmipur', '03-01-1995', 'Lakshmipur', 'beker', 'https://misujon.com', 4, 90, 0.00, NULL, NULL, 'zwhkkxbsgo1606916074.png', 't6wfisoouj1606917190.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 'aff47536', 1, 1, NULL, '2020-11-25 08:04:28', '2020-12-24 03:34:15'),
(2, NULL, 3, 'islamrakib361@gmail.com', 'rakib', NULL, NULL, '$2y$10$ScufAuZ5cNtQpGmgXzgQz.NWCE/4tLJ1.ySpHJ4jUZ2lGkkLDClxu', 'MTIzNDU2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0.00, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2020-11-27 06:15:26', '2020-11-27 06:16:05'),
(3, 'Rasel Rana', NULL, 'raselrana1147@gmail.com', 'raselrana1147', '01620193118', NULL, '$2y$10$2IBBTRXiGbgNXi3jBgBrkuOkDkT/eqr0Nc5uo1rKNyovkRkH1HD4e', 'MTE0Nw==', 'Bangladesh', 'Dhaka', '12/10/1997', 'Kishoregong', 'Software Engineer', 'https://www.raselrana.com', 4, 5, 1000.00, 'payoneer', 'raselrana1147@gmail.com', '5j4rjhdshu1607607179.jpg', 'gdanjs6itu1606747306.jpg', 'This is new socila platform', 3, 'aff37991', 2, 1, '3EhFYwpM32R8j0tpmKdXLxvvgU4FPUuydssHiKrqmNbO5lx4TKWq1OLPHu3N', '2020-11-27 19:54:40', '2020-12-23 08:05:52'),
(6, 'Monirul Islam', 3, 'misujon58262@gmail.com', 'misujon', '01676707068', NULL, '$2y$10$vQGkWubtNCyNl9wbD2YUeuL3lLOqmGQLG9fSI8aVzCf6Yy6Hn7LjO', 'MTIzNA==', 'Bangladesh', 'Narshingdi', '20-06-1994', 'Narsingdi', 'Full Stack Web Developer', 'https://misujon.com', 4, 20, 0.00, 'paypal', 'info@mitailoring.com', 'dgk9ddgp7s1606925094.jpg', 'iobr9xzpha1606925113.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 'aff95016', 1, 1, NULL, '2020-12-02 08:20:49', '2020-12-22 07:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `badge_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`id`, `user_id`, `badge_id`, `created_at`, `updated_at`) VALUES
(10, 3, 1, NULL, NULL),
(11, 3, 2, NULL, NULL),
(12, 6, 1, NULL, NULL),
(13, 3, 3, NULL, NULL),
(15, 3, 4, NULL, NULL),
(17, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `meta_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `user_id`, `meta_type`, `meta_key`, `meta_value`, `status`, `created_at`, `updated_at`) VALUES
(10, 3, 'interest', 'tv_shows', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n              quis nostru', 1, '2020-11-29 00:06:41', '2020-11-29 00:27:35'),
(11, 3, 'interest', 'brand_artist', 'Dilwale Dulhani Le Jayunga', 1, '2020-11-29 00:11:46', '2020-11-29 00:28:10'),
(12, 3, 'interest', 'movies', 'Cricket, Badminton, Cheese,', 1, '2020-11-29 00:20:23', '2020-11-29 00:31:05'),
(13, 3, 'interest', 'games', 'Travellig, Hearing song, Learning new thing', 1, '2020-11-29 00:20:40', '2020-11-29 00:26:56'),
(15, 3, 'interest', 'books', 'Homlet, Shesher Kobita, Agnibina', 1, '2020-11-29 00:24:35', '2020-11-29 00:25:05'),
(16, 3, 'interest', 'hobbies', 'Mirrakel, Filefear, Natok, Movie', 1, '2020-11-30 19:38:23', '2020-11-30 19:38:23'),
(22, 1, 'interest', 'tv_shows', 'Gmae of thrones', 1, '2020-12-02 07:51:27', '2020-12-02 07:51:27'),
(23, 1, 'interest', 'brand_artist', 'De Caprio', 1, '2020-12-02 07:51:27', '2020-12-02 07:51:27'),
(24, 1, 'interest', 'movies', 'Blood Dimond', 1, '2020-12-02 07:51:27', '2020-12-02 07:51:27'),
(25, 1, 'interest', 'books', 'Advance Data structure & Algorithm in JAVA Chapter-2', 1, '2020-12-02 07:51:27', '2020-12-02 07:51:27'),
(26, 1, 'interest', 'games', 'Football', 1, '2020-12-02 07:51:27', '2020-12-02 07:51:27'),
(27, 1, 'interest', 'hobbies', 'cfdfdsasfsdcsdfsd', 1, '2020-12-02 07:51:59', '2020-12-02 07:51:59'),
(28, 6, 'interest', 'tv_shows', 'Bangla Natok', 1, '2020-12-02 10:08:32', '2020-12-02 10:08:32'),
(29, 6, 'interest', 'brand_artist', 'R3HAB', 1, '2020-12-02 10:08:32', '2020-12-02 10:08:32'),
(30, 6, 'interest', 'movies', 'KGF', 1, '2020-12-02 10:08:32', '2020-12-02 10:08:32'),
(31, 6, 'interest', 'games', 'Cricket', 1, '2020-12-02 10:08:32', '2020-12-02 10:08:32'),
(32, 6, 'interest', 'hobbies', 'Develop the most authentic web application', 1, '2020-12-02 10:08:40', '2020-12-02 10:08:40'),
(33, 3, 'social', 'facebook', 'raselrana1147', 1, '2020-12-03 03:27:25', '2020-12-03 04:38:10'),
(34, 3, 'social', 'instagram', 'raselrana1147', 1, '2020-12-03 03:50:54', '2020-12-03 03:50:54'),
(35, 3, 'social', 'twitter', 'raselrana1147', 1, '2020-12-03 03:51:23', '2020-12-03 03:51:23'),
(36, 3, 'social', 'twitch', 'vxvzadasds', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(37, 3, 'social', 'googleplus', 'cxcvxdxdgf', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(38, 3, 'social', 'youtube', 'vvsdvcbngg', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(39, 3, 'social', 'patreon', 'vcffnbnvnbb', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(40, 3, 'social', 'discord', 'vxvdsadsaf', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(41, 3, 'social', 'deviantart', 'vcvmnbmjh,', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(42, 3, 'social', 'behance', 'vxvtryrtrhfg', 1, '2020-12-03 03:51:48', '2020-12-03 03:51:48'),
(46, 3, 'social', 'dribbble', 'dfd', 1, '2020-12-03 04:09:53', '2020-12-03 04:09:53'),
(47, 3, 'social', 'artstation', 'fgdf', 1, '2020-12-03 04:12:05', '2020-12-03 04:12:05'),
(48, 6, 'social', 'facebook', 'raselrana1147', 1, '2020-12-03 06:50:38', '2020-12-03 06:50:38'),
(49, 6, 'social', 'twitter', 'sff', 1, '2020-12-03 06:50:38', '2020-12-03 06:50:38'),
(50, 6, 'social', 'instagram', 'gfg', 1, '2020-12-03 06:50:38', '2020-12-03 06:50:38'),
(51, 6, 'social', 'twitch', 'fdfd', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(52, 6, 'social', 'googleplus', 'dfs', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(53, 6, 'social', 'youtube', 'zxz', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(54, 6, 'social', 'patreon', 'dasdafs', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(55, 6, 'social', 'discord', 'czx', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(56, 6, 'social', 'deviantart', 'cvcbc', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(57, 6, 'social', 'behance', 'fefe', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(58, 6, 'social', 'dribbble', 'werweg', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39'),
(59, 6, 'social', 'artstation', 'cxzcsfsdf', 1, '2020-12-03 06:50:39', '2020-12-03 06:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_quests`
--

CREATE TABLE `user_quests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quest_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=pending,2=approved,3=canceled,4=complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `user_id`, `amount`, `payment_method`, `payment_email`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 5.00, 'payoneer', 'raselrana1147@gmail.com', 1, '2020-11-29 22:25:00', '2020-11-29 22:25:00'),
(2, 3, 15.00, 'payoneer', 'raselrana1147@gmail.com', 4, '2020-11-29 22:40:23', '2020-11-29 22:40:23'),
(3, 3, 21.00, 'paypal', 'raselrana1147@gmail.com', 2, '2020-11-29 22:42:21', '2020-11-29 22:42:21'),
(4, 3, 15.00, 'paypal', 'raselrana1147@gmail.com', 1, '2020-11-29 23:03:48', '2020-11-29 23:03:48'),
(5, 3, 5.00, 'paypal', 'raselrana1147@gmail.com', 1, '2020-12-02 06:49:49', '2020-12-02 06:49:49'),
(6, 3, 238.00, 'paypal', 'raselrana1147@gmail.com', 1, '2020-12-02 14:20:26', '2020-12-02 14:20:26');

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
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location` (`location`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_rattings`
--
ALTER TABLE `product_rattings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_rattings_user_id_foreign` (`user_id`),
  ADD KEY `product_rattings_product_id_foreign` (`product_id`);

--
-- Indexes for table `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reacts`
--
ALTER TABLE `reacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reacts_post_or_comment_id_foreign` (`post_or_comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_badges_user_id_foreign` (`user_id`),
  ADD KEY `user_badges_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_quests`
--
ALTER TABLE `user_quests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_quests_user_id_foreign` (`user_id`),
  ADD KEY `user_quests_quest_id_foreign` (`quest_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_rattings`
--
ALTER TABLE `product_rattings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quests`
--
ALTER TABLE `quests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reacts`
--
ALTER TABLE `reacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_quests`
--
ALTER TABLE `user_quests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_rattings`
--
ALTER TABLE `product_rattings`
  ADD CONSTRAINT `product_rattings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_rattings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reacts`
--
ALTER TABLE `reacts`
  ADD CONSTRAINT `reacts_post_or_comment_id_foreign` FOREIGN KEY (`post_or_comment_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_quests`
--
ALTER TABLE `user_quests`
  ADD CONSTRAINT `user_quests_quest_id_foreign` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_quests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
