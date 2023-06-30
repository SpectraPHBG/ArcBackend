-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 03:24 PM
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
-- Database: `arcpcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
(3, 2, 32, 'Users', 'fa-users', 'auth/users', NULL, NULL, '2023-02-28 14:10:39'),
(4, 2, 33, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, '2023-02-28 14:10:39'),
(5, 2, 34, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, '2023-02-28 14:10:39'),
(6, 2, 35, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, '2023-02-28 14:10:39'),
(7, 2, 36, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, '2023-02-28 14:10:39'),
(10, 2, 21, 'Support Tables', 'fa-bars', NULL, '*', '2023-02-27 14:15:52', '2023-02-28 14:10:39'),
(11, 10, 23, 'Brands', 'fa-bars', 'brands', '*', '2023-02-27 14:16:26', '2023-02-28 14:10:39'),
(12, 10, 24, 'Case Form Factors', 'fa-bars', 'caseForms', '*', '2023-02-27 14:27:47', '2023-02-28 14:10:39'),
(13, 10, 25, 'Sockets', 'fa-bars', 'sockets', '*', '2023-02-27 14:39:43', '2023-02-28 14:10:39'),
(14, 10, 26, 'Storage Interfaces', 'fa-bars', 'storageInterfaces', '*', '2023-02-27 14:48:17', '2023-02-28 14:10:39'),
(15, 10, 27, 'Memory Types', 'fa-bars', 'memoryTypes', '*', '2023-02-27 14:49:12', '2023-02-28 14:10:39'),
(16, 10, 28, 'Graphic Memory', 'fa-bars', 'gpuMemories', '*', '2023-02-27 14:50:48', '2023-02-28 14:10:39'),
(17, 10, 29, 'Chipsets', 'fa-bars', 'chipsets', '*', '2023-02-27 14:51:44', '2023-02-28 14:10:39'),
(18, 10, 30, 'Expansion Slots', 'fa-bars', 'expansionSlots', '*', '2023-02-27 14:54:23', '2023-02-28 14:10:39'),
(19, 10, 31, 'Form Factors', 'fa-bars', 'formFactors', '*', '2023-02-27 14:59:22', '2023-02-28 14:10:39'),
(20, 2, 6, 'Cpus', 'fa-codepen', 'cpus', '*', '2023-02-27 15:01:27', '2023-02-28 14:10:39'),
(21, 2, 7, 'Rams', 'fa-adjust', 'rams', '*', '2023-02-27 15:04:05', '2023-02-28 14:10:39'),
(22, 2, 8, 'Sata SSDS', 'fa-building-o', 'sataSSDs', '*', '2023-02-27 15:05:49', '2023-02-28 14:10:39'),
(23, 2, 9, 'M2 SSDs', 'fa-building-o', 'm2SSDs', '*', '2023-02-27 15:06:39', '2023-02-28 14:10:39'),
(24, 2, 10, 'Power Supplies', 'fa-american-sign-language-interpreting', 'powerSupplies', '*', '2023-02-28 09:33:29', '2023-02-28 14:10:39'),
(25, 2, 11, 'Motherboards', 'fa-bars', 'motherboards', '*', '2023-02-28 09:40:31', '2023-02-28 14:10:39'),
(26, 2, 12, 'M2 Form Factors', 'fa-bars', 'm2FormFactors', '*', '2023-02-28 09:45:21', '2023-02-28 14:10:39'),
(27, 2, 13, 'Liquid Cooler Sockets', 'fa-bars', 'liquidCoolerSockets', '*', '2023-02-28 09:46:34', '2023-02-28 14:10:39'),
(28, 2, 14, 'Liquid Coolers', 'fa-bars', 'liquidColers', '*', '2023-02-28 09:47:13', '2023-02-28 14:10:39'),
(29, 2, 15, 'Hard Drives', 'fa-bars', 'hardDrives', '*', '2023-02-28 09:50:36', '2023-02-28 14:10:39'),
(30, 2, 16, 'Gpus', 'fa-bars', 'gpus', '*', '2023-02-28 09:51:29', '2023-02-28 14:10:39'),
(31, 2, 17, 'Expansion Slots Motherboards', 'fa-bars', 'expansionSlotsMB', '*', '2023-02-28 10:14:02', '2023-02-28 14:10:39'),
(32, 2, 18, 'Cases', 'fa-bars', 'cases', '*', '2023-02-28 10:29:24', '2023-02-28 14:10:39'),
(33, 2, 19, 'Case Fans', 'fa-bars', 'caseFans', '*', '2023-02-28 10:30:12', '2023-02-28 14:10:39'),
(34, 2, 20, 'Case Form Factors', 'fa-bars', 'caseFormFactors', '*', '2023-02-28 10:30:33', '2023-02-28 14:10:39'),
(35, 2, 5, 'Case Motherboard Support', 'fa-bars', 'casesMotherboards', '*', '2023-02-28 10:31:04', '2023-02-28 14:10:39'),
(36, 2, 3, 'Air Coolers', 'fa-bars', 'airCoolers', '*', '2023-02-28 10:43:59', '2023-02-28 14:10:39'),
(37, 10, 22, 'Air Cooler Sockets', 'fa-bars', 'airCoolerSockets', '*', '2023-02-28 10:44:15', '2023-02-28 14:10:39'),
(39, 2, 4, 'Storage Interfaces Motherboards', 'fa-bars', 'storageInterfacesMotherboards', '*', '2023-02-28 10:51:12', '2023-02-28 14:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `method` varchar(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `input` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-02-27 13:42:52', '2023-02-27 13:42:52'),
(2, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 13:43:14', '2023-02-27 13:43:14'),
(3, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 13:43:42', '2023-02-27 13:43:42'),
(4, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 13:58:29', '2023-02-27 13:58:29'),
(5, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:02:37', '2023-02-27 14:02:37'),
(6, 1, 'admin/auth/menu/3/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:02:45', '2023-02-27 14:02:45'),
(7, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:02:49', '2023-02-27 14:02:49'),
(8, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-02-27 14:10:29', '2023-02-27 14:10:29'),
(9, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:11:59', '2023-02-27 14:11:59'),
(10, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"CPU\",\"icon\":\"fa-bars\",\"uri\":\"cpus\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:12:55', '2023-02-27 14:12:55'),
(11, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:12:56', '2023-02-27 14:12:56'),
(12, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:13:01', '2023-02-27 14:13:01'),
(13, 1, 'admin/auth/menu/8', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:13:14', '2023-02-27 14:13:14'),
(14, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:13:15', '2023-02-27 14:13:15'),
(15, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:13:17', '2023-02-27 14:13:17'),
(16, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"cpus\",\"icon\":\"fa-tencent-weibo\",\"uri\":\"cpus\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:13:48', '2023-02-27 14:13:48'),
(17, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:13:49', '2023-02-27 14:13:49'),
(18, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:13:52', '2023-02-27 14:13:52'),
(19, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Support Tables\",\"icon\":\"fa-bars\",\"uri\":null,\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:15:52', '2023-02-27 14:15:52'),
(20, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:15:52', '2023-02-27 14:15:52'),
(21, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":10},{\\\"id\\\":9},{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]}]\"}', '2023-02-27 14:16:10', '2023-02-27 14:16:10'),
(22, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:16:10', '2023-02-27 14:16:10'),
(23, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:16:11', '2023-02-27 14:16:11'),
(24, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Brands\",\"icon\":\"fa-bars\",\"uri\":\"brands\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:16:26', '2023-02-27 14:16:26'),
(25, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:16:27', '2023-02-27 14:16:27'),
(26, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:16:35', '2023-02-27 14:16:35'),
(27, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:18:48', '2023-02-27 14:18:48'),
(28, 1, 'admin/brands', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:18:51', '2023-02-27 14:18:51'),
(29, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:26:53', '2023-02-27 14:26:53'),
(30, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Case Form Factors\",\"icon\":\"fa-bars\",\"uri\":\"caseForms\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:27:47', '2023-02-27 14:27:47'),
(31, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:27:48', '2023-02-27 14:27:48'),
(32, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:28:37', '2023-02-27 14:28:37'),
(33, 1, 'admin/caseForms', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:29:00', '2023-02-27 14:29:00'),
(34, 1, 'admin/caseForms/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:29:05', '2023-02-27 14:29:05'),
(35, 1, 'admin/caseForms', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:29:09', '2023-02-27 14:29:09'),
(36, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:39:31', '2023-02-27 14:39:31'),
(37, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Sockets\",\"icon\":\"fa-bars\",\"uri\":\"sockets\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:39:43', '2023-02-27 14:39:43'),
(38, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:39:44', '2023-02-27 14:39:44'),
(39, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:40:07', '2023-02-27 14:40:07'),
(40, 1, 'admin/sockets', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:40:13', '2023-02-27 14:40:13'),
(41, 1, 'admin/sockets/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:40:15', '2023-02-27 14:40:15'),
(42, 1, 'admin/sockets', 'POST', '127.0.0.1', '{\"brand_id\":\"143\",\"name\":\"awdawd\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/sockets\"}', '2023-02-27 14:40:22', '2023-02-27 14:40:22'),
(43, 1, 'admin/sockets/create', 'GET', '127.0.0.1', '[]', '2023-02-27 14:40:23', '2023-02-27 14:40:23'),
(44, 1, 'admin/caseForms', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:47:10', '2023-02-27 14:47:10'),
(45, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:47:12', '2023-02-27 14:47:12'),
(46, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Storage Interfaces\",\"icon\":\"fa-bars\",\"uri\":\"storageInterfaces\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:48:16', '2023-02-27 14:48:16'),
(47, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:48:17', '2023-02-27 14:48:17'),
(48, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Memory Types\",\"icon\":\"fa-bars\",\"uri\":\"memoryTypes\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:49:12', '2023-02-27 14:49:12'),
(49, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:49:12', '2023-02-27 14:49:12'),
(50, 1, 'admin/storageInterfaces', 'GET', '127.0.0.1', '[]', '2023-02-27 14:49:17', '2023-02-27 14:49:17'),
(51, 1, 'admin/memoryTypes', 'GET', '127.0.0.1', '[]', '2023-02-27 14:49:19', '2023-02-27 14:49:19'),
(52, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Graphic Memory\",\"icon\":\"fa-bars\",\"uri\":\"gpuMemory\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:50:48', '2023-02-27 14:50:48'),
(53, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:50:48', '2023-02-27 14:50:48'),
(54, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Chipsets\",\"icon\":\"fa-bars\",\"uri\":\"chipsets\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:51:44', '2023-02-27 14:51:44'),
(55, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:51:44', '2023-02-27 14:51:44'),
(56, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Expansion Slots\",\"icon\":\"fa-bars\",\"uri\":\"expansionSlots\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:54:23', '2023-02-27 14:54:23'),
(57, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:54:24', '2023-02-27 14:54:24'),
(58, 1, 'admin/expansionSlots', 'GET', '127.0.0.1', '[]', '2023-02-27 14:54:44', '2023-02-27 14:54:44'),
(59, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Form Factors\",\"icon\":\"fa-bars\",\"uri\":\"formFactors\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 14:59:22', '2023-02-27 14:59:22'),
(60, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:59:22', '2023-02-27 14:59:22'),
(61, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 14:59:33', '2023-02-27 14:59:33'),
(62, 1, 'admin/memoryTypes', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 14:59:38', '2023-02-27 14:59:38'),
(63, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 15:01:14', '2023-02-27 15:01:14'),
(64, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Cpus\",\"icon\":\"fa-bars\",\"uri\":\"cpus\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 15:01:27', '2023-02-27 15:01:27'),
(65, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:01:28', '2023-02-27 15:01:28'),
(66, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:01:29', '2023-02-27 15:01:29'),
(67, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 15:01:33', '2023-02-27 15:01:33'),
(68, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 15:01:38', '2023-02-27 15:01:38'),
(69, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 15:01:57', '2023-02-27 15:01:57'),
(70, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 15:02:01', '2023-02-27 15:02:01'),
(71, 1, 'admin/auth/menu/20/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-27 15:02:04', '2023-02-27 15:02:04'),
(72, 1, 'admin/auth/menu/20', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Cpus\",\"icon\":\"fa-codepen\",\"uri\":\"cpus\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-02-27 15:02:39', '2023-02-27 15:02:39'),
(73, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:02:39', '2023-02-27 15:02:39'),
(74, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:02:41', '2023-02-27 15:02:41'),
(75, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Rams\",\"icon\":\"fa-adjust\",\"uri\":\"rams\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 15:04:05', '2023-02-27 15:04:05'),
(76, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:04:06', '2023-02-27 15:04:06'),
(77, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Sata SSDS\",\"icon\":\"fa-building-o\",\"uri\":\"sataSSDs\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 15:05:48', '2023-02-27 15:05:48'),
(78, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:05:49', '2023-02-27 15:05:49'),
(79, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"M2 SSDs\",\"icon\":\"fa-bars\",\"uri\":\"m2SSDs\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"SpORxbalcjCmI9swDKkDKvvStjjP5olcCSJKsxm4\"}', '2023-02-27 15:06:39', '2023-02-27 15:06:39'),
(80, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-27 15:06:39', '2023-02-27 15:06:39'),
(81, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-02-28 09:16:47', '2023-02-28 09:16:47'),
(82, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 09:32:28', '2023-02-28 09:32:28'),
(83, 1, 'admin/auth/menu/23/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 09:32:37', '2023-02-28 09:32:37'),
(84, 1, 'admin/auth/menu/23', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"M2 SSDs\",\"icon\":\"fa-building-o\",\"uri\":\"m2SSDs\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-02-28 09:33:00', '2023-02-28 09:33:00'),
(85, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:33:01', '2023-02-28 09:33:01'),
(86, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:33:02', '2023-02-28 09:33:02'),
(87, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Power Supplies\",\"icon\":\"fa-american-sign-language-interpreting\",\"uri\":\"powerSupplies\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:33:29', '2023-02-28 09:33:29'),
(88, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:33:30', '2023-02-28 09:33:30'),
(89, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:34:15', '2023-02-28 09:34:15'),
(90, 1, 'admin/powerSupplies', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 09:34:18', '2023-02-28 09:34:18'),
(91, 1, 'admin/powerSupplies/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 09:34:21', '2023-02-28 09:34:21'),
(92, 1, 'admin/powerSupplies', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 09:34:35', '2023-02-28 09:34:35'),
(93, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 09:40:18', '2023-02-28 09:40:18'),
(94, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Motherboards\",\"icon\":\"fa-bars\",\"uri\":\"motherboards\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:40:31', '2023-02-28 09:40:31'),
(95, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:40:32', '2023-02-28 09:40:32'),
(96, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"M2 Form Factors\",\"icon\":\"fa-bars\",\"uri\":\"m2FormFactors\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:45:21', '2023-02-28 09:45:21'),
(97, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:45:21', '2023-02-28 09:45:21'),
(98, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Liquid Cooler Sockets\",\"icon\":\"fa-bars\",\"uri\":\"liquidCoolerSockets\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:46:34', '2023-02-28 09:46:34'),
(99, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:46:34', '2023-02-28 09:46:34'),
(100, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Liquid Coolers\",\"icon\":\"fa-bars\",\"uri\":\"liquidColers\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:47:13', '2023-02-28 09:47:13'),
(101, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:47:13', '2023-02-28 09:47:13'),
(102, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Hard Drives\",\"icon\":\"fa-bars\",\"uri\":\"hardDrives\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:50:36', '2023-02-28 09:50:36'),
(103, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:50:37', '2023-02-28 09:50:37'),
(104, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Gpus\",\"icon\":\"fa-bars\",\"uri\":\"gpus\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 09:51:29', '2023-02-28 09:51:29'),
(105, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 09:51:29', '2023-02-28 09:51:29'),
(106, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Expansion Slots Motherboards\",\"icon\":\"fa-bars\",\"uri\":\"expansionSlotsMB\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:14:01', '2023-02-28 10:14:01'),
(107, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:14:02', '2023-02-28 10:14:02'),
(108, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Cases\",\"icon\":\"fa-bars\",\"uri\":\"cases\",\"roles\":[null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:29:23', '2023-02-28 10:29:23'),
(109, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:29:24', '2023-02-28 10:29:24'),
(110, 1, 'admin/auth/menu/32/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:29:31', '2023-02-28 10:29:31'),
(111, 1, 'admin/auth/menu/32', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Cases\",\"icon\":\"fa-bars\",\"uri\":\"cases\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-02-28 10:29:34', '2023-02-28 10:29:34'),
(112, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:29:35', '2023-02-28 10:29:35'),
(113, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Case Fans\",\"icon\":\"fa-bars\",\"uri\":\"caseFans\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:30:12', '2023-02-28 10:30:12'),
(114, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:30:12', '2023-02-28 10:30:12'),
(115, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Case Form Factors\",\"icon\":\"fa-bars\",\"uri\":\"caseFormFactors\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:30:33', '2023-02-28 10:30:33'),
(116, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:30:33', '2023-02-28 10:30:33'),
(117, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Case Motherboard Support\",\"icon\":\"fa-bars\",\"uri\":\"casesMotherboards\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:31:04', '2023-02-28 10:31:04'),
(118, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:31:04', '2023-02-28 10:31:04'),
(119, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:43:39', '2023-02-28 10:43:39'),
(120, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":35},{\\\"id\\\":20},{\\\"id\\\":21},{\\\"id\\\":22},{\\\"id\\\":23},{\\\"id\\\":24},{\\\"id\\\":25},{\\\"id\\\":26},{\\\"id\\\":27},{\\\"id\\\":28},{\\\"id\\\":29},{\\\"id\\\":30},{\\\"id\\\":31},{\\\"id\\\":32},{\\\"id\\\":33},{\\\"id\\\":34},{\\\"id\\\":10,\\\"children\\\":[{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14},{\\\"id\\\":15},{\\\"id\\\":16},{\\\"id\\\":17},{\\\"id\\\":18},{\\\"id\\\":19}]},{\\\"id\\\":9},{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]}]\"}', '2023-02-28 10:43:44', '2023-02-28 10:43:44'),
(121, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:43:45', '2023-02-28 10:43:45'),
(122, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:43:46', '2023-02-28 10:43:46'),
(123, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Air Coolers\",\"icon\":\"fa-bars\",\"uri\":\"airCoolers\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:43:59', '2023-02-28 10:43:59'),
(124, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:44:00', '2023-02-28 10:44:00'),
(125, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Air Cooler Sockets\",\"icon\":\"fa-bars\",\"uri\":\"airCoolerSockets\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:44:15', '2023-02-28 10:44:15'),
(126, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:44:15', '2023-02-28 10:44:15'),
(127, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:44:21', '2023-02-28 10:44:21'),
(128, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:44:26', '2023-02-28 10:44:26'),
(129, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:46:46', '2023-02-28 10:46:46'),
(130, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Graphic Chipsets\",\"icon\":\"fa-bars\",\"uri\":\"graphicChipsets\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:47:01', '2023-02-28 10:47:01'),
(131, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:47:02', '2023-02-28 10:47:02'),
(132, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:47:03', '2023-02-28 10:47:03'),
(133, 1, 'admin/graphicChipsets', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:47:12', '2023-02-28 10:47:12'),
(134, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:47:45', '2023-02-28 10:47:45'),
(135, 1, 'admin/auth/menu/38', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:48:42', '2023-02-28 10:48:42'),
(136, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:48:43', '2023-02-28 10:48:43'),
(137, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:48:58', '2023-02-28 10:48:58'),
(138, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:48:59', '2023-02-28 10:48:59'),
(139, 1, 'admin/auth/menu/9', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:49:04', '2023-02-28 10:49:04'),
(140, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:49:05', '2023-02-28 10:49:05'),
(141, 1, 'admin/auth/menu/16/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 10:49:13', '2023-02-28 10:49:13'),
(142, 1, 'admin/auth/menu/16', 'PUT', '127.0.0.1', '{\"parent_id\":\"10\",\"title\":\"Graphic Memory\",\"icon\":\"fa-bars\",\"uri\":\"gpuMemories\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-02-28 10:49:24', '2023-02-28 10:49:24'),
(143, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:49:24', '2023-02-28 10:49:24'),
(144, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Storage Interfaces Motherboards\",\"icon\":\"fa-bars\",\"uri\":\"storageInterfacesMotherboards\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 10:51:11', '2023-02-28 10:51:11'),
(145, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 10:51:12', '2023-02-28 10:51:12'),
(146, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-02-28 11:34:21', '2023-02-28 11:34:21'),
(147, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 11:34:34', '2023-02-28 11:34:34'),
(148, 1, 'admin/sockets', 'GET', '127.0.0.1', '[]', '2023-02-28 11:47:52', '2023-02-28 11:47:52'),
(149, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 11:47:54', '2023-02-28 11:47:54'),
(150, 1, 'admin/brands', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 11:48:19', '2023-02-28 11:48:19'),
(151, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 11:48:20', '2023-02-28 11:48:20'),
(152, 1, 'admin/brands', 'GET', '127.0.0.1', '[]', '2023-02-28 11:48:22', '2023-02-28 11:48:22'),
(153, 1, 'admin/memoryTypes', 'GET', '127.0.0.1', '[]', '2023-02-28 11:49:43', '2023-02-28 11:49:43'),
(154, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '[]', '2023-02-28 11:53:25', '2023-02-28 11:53:25'),
(155, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '[]', '2023-02-28 11:54:29', '2023-02-28 11:54:29'),
(156, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"1\",\"name\":\"Ryzen 5 5600X\",\"socket_id\":\"5\",\"cores\":\"6\",\"threads\":\"12\",\"base_clock\":\"3.7\",\"turbo_clock\":\"4.6\",\"base_clock2\":null,\"turbo_clock2\":null,\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":null,\"memory2_speed\":null,\"hyperthread_support\":\"on\",\"caches\":\"L2: 3MB, L3: 32MB\",\"tdp\":\"65\",\"max_temp\":\"95\",\"max_memory\":\"0\",\"supported_oc\":\"Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":null,\"gpu_frequency\":\"0\",\"features\":null,\"official_link\":\"https:\\/\\/www.amd.com\\/en\\/products\\/cpu\\/amd-ryzen-5-5600x\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 12:01:50', '2023-02-28 12:01:50'),
(157, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '[]', '2023-02-28 12:01:52', '2023-02-28 12:01:52'),
(158, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"1\",\"name\":\"Ryzen 5 5600X\",\"socket_id\":\"5\",\"cores\":\"6\",\"threads\":\"12\",\"base_clock\":\"3.7\",\"turbo_clock\":\"4.6\",\"base_clock2\":null,\"turbo_clock2\":null,\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":null,\"memory2_speed\":null,\"hyperthread_support\":\"on\",\"caches\":\"L2: 3MB, L3: 32MB\",\"tdp\":\"65\",\"max_temp\":\"95\",\"max_memory\":\"0\",\"supported_oc\":\"Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":null,\"gpu_frequency\":\"0\",\"features\":null,\"official_link\":\"https:\\/\\/www.amd.com\\/en\\/products\\/cpu\\/amd-ryzen-5-5600x\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 12:02:26', '2023-02-28 12:02:26'),
(159, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 12:02:26', '2023-02-28 12:02:26'),
(160, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:03:09', '2023-02-28 12:03:09'),
(161, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:03:15', '2023-02-28 12:03:15'),
(162, 1, 'admin/cpus/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:03:19', '2023-02-28 12:03:19'),
(163, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:03:23', '2023-02-28 12:03:23'),
(164, 1, 'admin/cpus/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:44:13', '2023-02-28 12:44:13'),
(165, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:44:18', '2023-02-28 12:44:18'),
(166, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 12:50:09', '2023-02-28 12:50:09'),
(167, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 12:50:21', '2023-02-28 12:50:21'),
(168, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:50:28', '2023-02-28 12:50:28'),
(169, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"1\",\"name\":\"Ryzen 7 5800X\",\"socket_id\":\"5\",\"cores\":\"8\",\"threads\":\"16\",\"base_clock\":\"3.8\",\"turbo_clock\":\"4.7\",\"base_clock2\":null,\"turbo_clock2\":null,\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":\"0\",\"memory2_speed\":null,\"hyperthread_support\":\"on\",\"caches\":\"L2: 4MB, L3: 32MB\",\"tdp\":\"105\",\"max_temp\":\"90\",\"supported_oc\":\"Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":null,\"gpu_frequency\":null,\"features\":null,\"official_link\":\"https:\\/\\/www.amd.com\\/en\\/products\\/cpu\\/amd-ryzen-7-5800x\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/cpus\"}', '2023-02-28 12:57:33', '2023-02-28 12:57:33'),
(170, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '[]', '2023-02-28 12:57:34', '2023-02-28 12:57:34'),
(171, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"1\",\"name\":\"Ryzen 7 5800X\",\"socket_id\":\"5\",\"cores\":\"8\",\"threads\":\"16\",\"base_clock\":\"3.8\",\"turbo_clock\":\"4.7\",\"base_clock2\":null,\"turbo_clock2\":null,\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":\"3\",\"memory2_speed\":null,\"hyperthread_support\":\"on\",\"caches\":\"L2: 4MB, L3: 32MB\",\"tdp\":\"105\",\"max_temp\":\"90\",\"supported_oc\":\"Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":null,\"gpu_frequency\":null,\"features\":null,\"official_link\":\"https:\\/\\/www.amd.com\\/en\\/products\\/cpu\\/amd-ryzen-7-5800x\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 12:58:58', '2023-02-28 12:58:58'),
(172, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 12:58:59', '2023-02-28 12:58:59'),
(173, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:59:13', '2023-02-28 12:59:13'),
(174, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '[]', '2023-02-28 12:59:22', '2023-02-28 12:59:22'),
(175, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 12:59:25', '2023-02-28 12:59:25'),
(176, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 13:09:49', '2023-02-28 13:09:49'),
(177, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"1\",\"name\":\"Ryzen 9 5950X\",\"socket_id\":\"5\",\"cores\":\"16\",\"threads\":\"32\",\"base_clock\":\"3.4\",\"turbo_clock\":\"4.9\",\"base_clock2\":null,\"turbo_clock2\":null,\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":null,\"memory2_speed\":null,\"hyperthread_support\":\"on\",\"caches\":\"L2: 8MB, L3: 64MB\",\"tdp\":\"105\",\"max_temp\":\"90\",\"supported_oc\":\"Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":null,\"gpu_frequency\":null,\"features\":null,\"official_link\":\"https:\\/\\/www.amd.com\\/en\\/products\\/cpu\\/amd-ryzen-9-5950x\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/cpus\"}', '2023-02-28 13:13:35', '2023-02-28 13:13:35'),
(178, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 13:13:35', '2023-02-28 13:13:35'),
(179, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 13:29:29', '2023-02-28 13:29:29'),
(180, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"2\",\"name\":\"Core i5-12600K\",\"socket_id\":\"3\",\"cores\":\"10 (6P+4E)\",\"threads\":\"16\",\"base_clock\":\"3.7\",\"turbo_clock\":\"4.9\",\"base_clock2\":\"2.8\",\"turbo_clock2\":\"3.6\",\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":\"5\",\"memory2_speed\":\"4800\",\"hyperthread_support\":\"on\",\"caches\":\"L2: 9.5MB, Intel Smart Cache: 20MB\",\"tdp\":\"125\",\"max_temp\":\"100\",\"supported_oc\":\"Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":null,\"gpu_frequency\":null,\"features\":null,\"official_link\":\"https:\\/\\/ark.intel.com\\/content\\/www\\/us\\/en\\/ark\\/products\\/134589\\/intel-core-i512600k-processor-20m-cache-up-to-4-90-ghz.html\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/cpus\"}', '2023-02-28 13:44:24', '2023-02-28 13:44:24'),
(181, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 13:44:24', '2023-02-28 13:44:24'),
(182, 1, 'admin/cpus/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 13:45:31', '2023-02-28 13:45:31'),
(183, 1, 'admin/cpus', 'POST', '127.0.0.1', '{\"brand_id\":\"2\",\"name\":\"CORE I7-13700K\",\"socket_id\":\"3\",\"cores\":\"16 (8P+8E)\",\"threads\":\"24\",\"base_clock\":\"3.4\",\"turbo_clock\":\"5.3\",\"base_clock2\":\"2.5\",\"turbo_clock2\":\"4.2\",\"memory_id\":\"4\",\"memory_speed\":\"3200\",\"memory2_id\":\"5\",\"memory2_speed\":\"5600\",\"hyperthread_support\":\"on\",\"caches\":\"L2: 24MB, L3: 30MB\",\"tdp\":\"125\",\"max_temp\":\"100\",\"supported_oc\":\"Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.\",\"integrated_gpu\":\"Intel UHD Graphics 770\",\"gpu_frequency\":\"300\",\"features\":null,\"official_link\":\"https:\\/\\/www.intel.com\\/content\\/www\\/us\\/en\\/products\\/sku\\/230500\\/intel-core-i713700k-processor-30m-cache-up-to-5-40-ghz\\/specifications.html\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/cpus\"}', '2023-02-28 13:49:09', '2023-02-28 13:49:09'),
(184, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-02-28 13:49:10', '2023-02-28 13:49:10'),
(185, 1, 'admin/airCoolers', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:09:37', '2023-02-28 14:09:37'),
(186, 1, 'admin/airCoolerSockets', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:09:38', '2023-02-28 14:09:38'),
(187, 1, 'admin/airCoolerSockets', 'GET', '127.0.0.1', '[]', '2023-02-28 14:10:15', '2023-02-28 14:10:15'),
(188, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:10:26', '2023-02-28 14:10:26'),
(189, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":36},{\\\"id\\\":39},{\\\"id\\\":35},{\\\"id\\\":20},{\\\"id\\\":21},{\\\"id\\\":22},{\\\"id\\\":23},{\\\"id\\\":24},{\\\"id\\\":25},{\\\"id\\\":26},{\\\"id\\\":27},{\\\"id\\\":28},{\\\"id\\\":29},{\\\"id\\\":30},{\\\"id\\\":31},{\\\"id\\\":32},{\\\"id\\\":33},{\\\"id\\\":34},{\\\"id\\\":10,\\\"children\\\":[{\\\"id\\\":37},{\\\"id\\\":11},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14},{\\\"id\\\":15},{\\\"id\\\":16},{\\\"id\\\":17},{\\\"id\\\":18},{\\\"id\\\":19}]},{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]}]\"}', '2023-02-28 14:10:39', '2023-02-28 14:10:39'),
(190, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:10:39', '2023-02-28 14:10:39'),
(191, 1, 'admin/rams', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:10:45', '2023-02-28 14:10:45'),
(192, 1, 'admin/rams/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:17:26', '2023-02-28 14:17:26'),
(193, 1, 'admin/brands/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:17:49', '2023-02-28 14:17:49'),
(194, 1, 'admin/brands', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:17:51', '2023-02-28 14:17:51'),
(195, 1, 'admin/brands/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-02-28 14:17:54', '2023-02-28 14:17:54'),
(196, 1, 'admin/brands', 'POST', '127.0.0.1', '{\"name\":\"Corsair\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\"}', '2023-02-28 14:17:59', '2023-02-28 14:17:59'),
(197, 1, 'admin/brands', 'GET', '127.0.0.1', '[]', '2023-02-28 14:18:00', '2023-02-28 14:18:00'),
(198, 1, 'admin/rams', 'POST', '127.0.0.1', '{\"brand_id\":\"9\",\"name\":\"Vengeance LPX Series black\",\"capacity\":\"16\",\"memory_type_id\":\"4\",\"modules\":\"2x8\",\"speed\":\"3200\",\"voltage\":\"1.35\",\"latency\":\"16\",\"heat_spreader\":\"on\",\"rgb_support\":\"off\",\"ecc_support\":\"off\",\"features\":\"Designed for high-performance overclocking\\r\\nEach Vengeance LPX module is built with a pure aluminum heatspreader for faster heat dissipation and cooler operation; and the eight-layer PCB helps manage heat and provides superior overclocking headroom.\\r\\nEach IC is individually screened for performance potential.\\r\\n\\r\\nDesigned for great looks\\r\\nAvailable in multiple colors to match your motherboard, your components, or just your style.\\r\\n\\r\\nPerformance and Compatibility\\r\\nVengeance LPX is optimized and compatibility tested for the latest Intel 100 Series motherboards and offers higher frequencies, greater bandwidth, and lower power consumption.\\r\\nXMP 2.0 support for trouble-free automatic overclocking.\\r\\n\\r\\nLow-profile heatspreader design\\r\\nThe Vengeance LPX module height is carefully designed to fit smaller spaces.\",\"official_link\":\"https:\\/\\/www.corsair.com\\/us\\/en\\/Categories\\/Products\\/Memory\\/VENGEANCE-LPX\\/p\\/CMK16GX4M2B3200C16#tab-tech-specs\",\"_token\":\"FybWOcdVgitMCJzwn0qY4QdYTTJKWNEXYqHa37bt\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/rams\"}', '2023-02-28 14:36:59', '2023-02-28 14:36:59'),
(199, 1, 'admin/rams', 'GET', '127.0.0.1', '[]', '2023-02-28 14:36:59', '2023-02-28 14:36:59'),
(200, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-03-03 08:56:20', '2023-03-03 08:56:20'),
(201, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-03-03 08:56:35', '2023-03-03 08:56:35'),
(202, 1, 'admin/cpus', 'GET', '127.0.0.1', '[]', '2023-03-03 13:30:46', '2023-03-03 13:30:46'),
(203, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-05-09 08:56:35', '2023-05-09 08:56:35'),
(204, 1, 'admin/expansionSlotsMB', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-09 08:56:55', '2023-05-09 08:56:55'),
(205, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-05-10 12:04:46', '2023-05-10 12:04:46'),
(206, 1, 'admin/caseFormFactors', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-10 12:04:56', '2023-05-10 12:04:56'),
(207, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-10 12:04:59', '2023-05-10 12:04:59'),
(208, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-10 12:05:05', '2023-05-10 12:05:05'),
(209, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-05-10 12:05:07', '2023-05-10 12:05:07'),
(210, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-10 12:05:27', '2023-05-10 12:05:27'),
(211, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-05-11 09:00:21', '2023-05-11 09:00:21'),
(212, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:00:29', '2023-05-11 09:00:29'),
(213, 1, 'admin/rams', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:01:02', '2023-05-11 09:01:02'),
(214, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:01:06', '2023-05-11 09:01:06'),
(215, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:01:12', '2023-05-11 09:01:12'),
(216, 1, 'admin/auth/permissions/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:01:15', '2023-05-11 09:01:15'),
(217, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:01:20', '2023-05-11 09:01:20'),
(218, 1, 'admin/casesMotherboards', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:39:44', '2023-05-11 09:39:44'),
(219, 1, 'admin/m2SSDs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:39:48', '2023-05-11 09:39:48'),
(220, 1, 'admin/m2SSDs/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:39:53', '2023-05-11 09:39:53'),
(221, 1, 'admin/m2SSDs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:40:00', '2023-05-11 09:40:00'),
(222, 1, 'admin/m2SSDs/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:42:03', '2023-05-11 09:42:03'),
(223, 1, 'admin/m2SSDs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:42:11', '2023-05-11 09:42:11'),
(224, 1, 'admin/m2SSDs/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 09:45:19', '2023-05-11 09:45:19'),
(225, 1, 'admin/sataSSDs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:28', '2023-05-11 10:40:28'),
(226, 1, 'admin/rams', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:42', '2023-05-11 10:40:42'),
(227, 1, 'admin/cpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:43', '2023-05-11 10:40:43'),
(228, 1, 'admin/airCoolers', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:45', '2023-05-11 10:40:45'),
(229, 1, 'admin/caseFans', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:52', '2023-05-11 10:40:52'),
(230, 1, 'admin/expansionSlotsMB', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:54', '2023-05-11 10:40:54'),
(231, 1, 'admin/gpus', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-05-11 10:40:56', '2023-05-11 10:40:56'),
(232, 1, 'admin/gpus', 'GET', '127.0.0.1', '[]', '2023-05-11 10:41:02', '2023-05-11 10:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `http_method` varchar(255) DEFAULT NULL,
  `http_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2023-02-27 13:41:53', '2023-02-27 13:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(1, 10, NULL, NULL),
(1, 11, NULL, NULL),
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(1, 14, NULL, NULL),
(1, 15, NULL, NULL),
(1, 16, NULL, NULL),
(1, 17, NULL, NULL),
(1, 18, NULL, NULL),
(1, 19, NULL, NULL),
(1, 20, NULL, NULL),
(1, 21, NULL, NULL),
(1, 22, NULL, NULL),
(1, 23, NULL, NULL),
(1, 24, NULL, NULL),
(1, 25, NULL, NULL),
(1, 26, NULL, NULL),
(1, 27, NULL, NULL),
(1, 28, NULL, NULL),
(1, 29, NULL, NULL),
(1, 30, NULL, NULL),
(1, 31, NULL, NULL),
(1, 32, NULL, NULL),
(1, 33, NULL, NULL),
(1, 34, NULL, NULL),
(1, 35, NULL, NULL),
(1, 36, NULL, NULL),
(1, 37, NULL, NULL),
(1, 39, NULL, NULL),
(1, 2, NULL, NULL),
(1, 10, NULL, NULL),
(1, 11, NULL, NULL),
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(1, 14, NULL, NULL),
(1, 15, NULL, NULL),
(1, 16, NULL, NULL),
(1, 17, NULL, NULL),
(1, 18, NULL, NULL),
(1, 19, NULL, NULL),
(1, 20, NULL, NULL),
(1, 21, NULL, NULL),
(1, 22, NULL, NULL),
(1, 23, NULL, NULL),
(1, 24, NULL, NULL),
(1, 25, NULL, NULL),
(1, 26, NULL, NULL),
(1, 27, NULL, NULL),
(1, 28, NULL, NULL),
(1, 29, NULL, NULL),
(1, 30, NULL, NULL),
(1, 31, NULL, NULL),
(1, 32, NULL, NULL),
(1, 33, NULL, NULL),
(1, 34, NULL, NULL),
(1, 35, NULL, NULL),
(1, 36, NULL, NULL),
(1, 37, NULL, NULL),
(1, 39, NULL, NULL),
(1, 2, NULL, NULL),
(1, 10, NULL, NULL),
(1, 11, NULL, NULL),
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(1, 14, NULL, NULL),
(1, 15, NULL, NULL),
(1, 16, NULL, NULL),
(1, 17, NULL, NULL),
(1, 18, NULL, NULL),
(1, 19, NULL, NULL),
(1, 20, NULL, NULL),
(1, 21, NULL, NULL),
(1, 22, NULL, NULL),
(1, 23, NULL, NULL),
(1, 24, NULL, NULL),
(1, 25, NULL, NULL),
(1, 26, NULL, NULL),
(1, 27, NULL, NULL),
(1, 28, NULL, NULL),
(1, 29, NULL, NULL),
(1, 30, NULL, NULL),
(1, 31, NULL, NULL),
(1, 32, NULL, NULL),
(1, 33, NULL, NULL),
(1, 34, NULL, NULL),
(1, 35, NULL, NULL),
(1, 36, NULL, NULL),
(1, 37, NULL, NULL),
(1, 39, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 1, NULL, NULL),
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 1, NULL, NULL),
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$PSfG28.274FgTGbG5BDdv.D7aGcVZ4rXTbY.zsYO5EIrAzGPYUT9i', 'Administrator', NULL, 'Y6WFebZs1umQ0t5P8FMCWlr3jTm1wc82SECs3uhi3S3zCOVhgfcl3TN0a7Or', '2023-02-27 13:41:52', '2023-02-27 13:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `air_coolers`
--

CREATE TABLE `air_coolers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bearing` varchar(255) NOT NULL,
  `fans` int(11) NOT NULL,
  `fan_mounting` varchar(255) NOT NULL,
  `max_cooler_height` int(11) NOT NULL,
  `power_connector` varchar(255) NOT NULL,
  `rgb` tinyint(1) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `air_coolers`
--

INSERT INTO `air_coolers` (`id`, `brand_id`, `name`, `bearing`, `fans`, `fan_mounting`, `max_cooler_height`, `power_connector`, `rgb`, `dimensions`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 16, 'Enermax ETS-T50 Axe ARGB CPU Air Cooler', 'Twister Bearing', 1, 'Vertical', 160, '4', 1, '138.7x112.5x160', 'Synchronize RGB lighting via addressable RGB headers (5V/D/-/G) of motherboards from ASUS Aura Sync, GIGABYTE RGB Fusion, MSI Mystic Light Sync and ASRock Polychrome\n\nPWM power cable to connect the fan to create constant rainbow RGB lighting effects, no software or adaptor needed\n\nHigh pressure blade design is a precision engineering of the blade angle and shape calculation\n\nPatented air guide with rotatable grill for preferred airflow direction\n\nPatented Pressure Differential Flow (PDF) design uses differential wind pressure to increase 15% more airflow\n\nPatented Vortex Generation Flow (VGF) design to increase air convection around the heat pipe\n\nUnique air path creating high Vacuum Effect (VEF) to optimize airflow\n\nHeat-pipe Direct Touch (HDT) technology to ensure rapid thermal conduction and eliminate CPU hot spots\n\nAsymmetric heat pipe design allows extra space for ideal RAM compatibility', 'https://www.enermaxeu.com/products/cpu-cooling/air-cooling/ets-t50-axe-argb/', '2023-03-06 15:00:57', '2023-03-06 15:00:57', '/airCoolers/EnermaxETST50AARGB-min.jpg'),
(2, 15, 'Be Quiet! Pure Rock 2 Black', 'Rifle', 2, 'Vertical', 155, '4', 0, '88 x 121 x 155', 'Heat pipe direct touch', 'https://www.bequiet.com/en/cpucooler/1842', '2023-03-06 15:00:57', '2023-03-06 15:00:57', '/airCoolers/BeQuietPureRock2Black-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `air_coolers_sockets`
--

CREATE TABLE `air_coolers_sockets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socket_id` bigint(20) UNSIGNED NOT NULL,
  `cooler_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `air_coolers_sockets`
--

INSERT INTO `air_coolers_sockets` (`id`, `socket_id`, `cooler_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(2, 5, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(3, 8, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(4, 9, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(5, 10, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(6, 11, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(7, 14, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(8, 15, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(9, 19, 2, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(10, 4, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(11, 5, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(12, 6, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(13, 8, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(14, 9, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(15, 10, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(16, 11, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(17, 12, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(18, 13, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(19, 14, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(20, 15, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(21, 16, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(22, 17, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(23, 18, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(24, 24, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(25, 25, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(26, 20, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(27, 3, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02'),
(28, 19, 1, '2023-03-08 09:58:02', '2023-03-08 09:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AMD', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(2, 'Intel', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(3, 'NVIDIA', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(4, 'Sapphire', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(5, 'ASUS', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(6, 'EVGA', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(7, 'Gigabyte', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(8, 'MSI', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(9, 'Corsair', '2023-02-28 14:17:59', '2023-02-28 14:17:59'),
(10, 'SAMSUNG', '2023-03-04 11:53:16', '2023-03-04 11:53:16'),
(11, 'Crucial', '2023-03-04 11:53:16', '2023-03-04 11:53:16'),
(12, 'Kingston', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(13, 'Western Digital', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(14, 'Seagate', '2023-03-06 09:06:42', '2023-03-06 09:06:42'),
(15, 'Be Quiet!', '2023-03-06 15:00:57', '2023-03-06 15:00:57'),
(16, 'ENERMAX', '2023-03-06 15:00:57', '2023-03-06 15:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `factor_id` bigint(20) UNSIGNED NOT NULL,
  `io_ports` varchar(255) NOT NULL,
  `psu_mount` varchar(255) NOT NULL,
  `air_cooling_support` text NOT NULL,
  `liquid_cooling_support` text NOT NULL,
  `storage_25_bays` int(11) NOT NULL,
  `storage_35_bays` int(11) NOT NULL,
  `included_fans` varchar(255) DEFAULT NULL,
  `max_psu_length` int(11) NOT NULL,
  `max_cooler_height` int(11) NOT NULL,
  `max_gpu_length` int(11) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `brand_id`, `name`, `factor_id`, `io_ports`, `psu_mount`, `air_cooling_support`, `liquid_cooling_support`, `storage_25_bays`, `storage_35_bays`, `included_fans`, `max_psu_length`, `max_cooler_height`, `max_gpu_length`, `dimensions`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 9, 'Corsair 4000D Airflow CC-9011200-WW', 3, 'Front Ports: 1xUSB 3.1 Type-C, 1xUSB 3.0, Audio', 'Bottom', 'Front: 3x120, 2x140 | Top: 2x120, 2x140 | Rear: 1x120', 'Front: 360, 240 | Top: 360, 280, 240 | Rear: 120', 2, 2, '2x120', 180, 170, 360, '466x230x453', 'A Fitting Choice: Combining innovative cable management, concentrated airflow, and proven CORSAIR build quality, choose the 4000D for an immaculate high-performance PC.\n\nHigh-Airflow Front Panel: An optimized steel front panel delivers massive airflow to your system for maximum cooling.\n\nCORSAIR RapidRoute Cable Management System: Makes it simple and fast to route your major cables through a single channel, with a roomy 25mm of space behind the motherboard for all of your cables.\n\nTwo Included 120mm Fans: CORSAIR AirGuide fans utilize anti-vortex vanes to concentrate airflow and enhance cooling.\n\nExtreme Cooling Potential: A spacious interior fits up to 6x 120mm or 4x 140mm cooling fans, along with multiple radiators including a 360mm in front and 280mm in the roof (dependent on RAM height).\n\nModern Front Panel I/O: Puts your connections within easy reach, including a USB 3.1 Type-C Port, USB 3.0 port, and a combination audio/microphone jack.\n\nAll the Storage You Need: Fits up to 2x SSDs and 2x HDDs.\n\nTool-Free Tempered Glass Side Panel: Show off your high-profile components and RGB lighting.', 'https://www.corsair.com/us/en/Categories/Products/Cases/Mid-Tower-ATX-Cases/4000D-Airflow-Tempered-Glass-Mid-Tower-ATX-Case/p/CC-9011200-WW#tab-tech-specs', '2023-03-10 14:49:21', '2023-03-10 14:49:21', '/pc-cases/Corsair4000D-min.jpg'),
(2, 16, 'ENERMAX Makashi II MKT50', 4, 'Front Ports: 2xUSB 2.0, 1xUSB 3.0, Audio, Controls', 'Bottom', 'Front: 3x120 | Top: 3x120, 2x140 | Rear: 1x120', 'Front: 360, 240 | Top: 360, 280, 240 | Rear: 120', 6, 2, NULL, 258, 160, 410, '466x230x453', '', 'https://www.enermaxeu.com/products/cases/eatx/makashi-ii-mkt50/', '2023-03-10 14:49:21', '2023-03-10 14:49:21', '/pc-cases/MakashiII-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `case_fans`
--

CREATE TABLE `case_fans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bearing` varchar(255) NOT NULL,
  `rpm` int(11) NOT NULL,
  `air_flow` varchar(255) NOT NULL,
  `consumption` double NOT NULL,
  `power_connector` varchar(255) NOT NULL,
  `mtbf` int(11) NOT NULL,
  `rgb` tinyint(1) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_form_factors`
--

CREATE TABLE `case_form_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_form_factors`
--

INSERT INTO `case_form_factors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mini-ITX', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 'Micro-ATX', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 'Mid Tower', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(4, 'Full Tower', '2023-02-27 12:59:10', '2023-02-27 12:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `case_mb_size_support`
--

CREATE TABLE `case_mb_size_support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` bigint(20) UNSIGNED NOT NULL,
  `factor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_mb_size_support`
--

INSERT INTO `case_mb_size_support` (`id`, `case_id`, `factor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(2, 1, 2, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(3, 1, 3, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(4, 1, 4, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(5, 2, 1, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(6, 2, 2, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(7, 2, 3, '2023-03-11 10:10:38', '2023-03-11 10:10:38'),
(8, 2, 4, '2023-03-11 10:10:38', '2023-03-11 10:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `chipsets`
--

CREATE TABLE `chipsets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chipsets`
--

INSERT INTO `chipsets` (`id`, `brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Z690', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 2, 'H610', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 2, 'B760', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(4, 1, 'B550', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(5, 1, 'X570', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(6, 1, 'B450', '2023-02-27 12:59:10', '2023-02-27 12:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `cpus`
--

CREATE TABLE `cpus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `socket_id` bigint(20) UNSIGNED NOT NULL,
  `cores` varchar(255) NOT NULL,
  `threads` varchar(255) NOT NULL,
  `base_clock` double NOT NULL,
  `turbo_clock` double NOT NULL,
  `base_clock2` double DEFAULT NULL,
  `turbo_clock2` double DEFAULT NULL,
  `memory_id` bigint(20) UNSIGNED NOT NULL,
  `memory_speed` int(11) NOT NULL,
  `memory2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `memory2_speed` int(11) DEFAULT NULL,
  `hyperthread_support` tinyint(1) NOT NULL,
  `caches` varchar(255) NOT NULL,
  `tdp` double NOT NULL,
  `max_temp` int(11) NOT NULL,
  `supported_os` varchar(255) NOT NULL,
  `integrated_gpu` varchar(255) DEFAULT NULL,
  `gpu_frequency` int(11) DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpus`
--

INSERT INTO `cpus` (`id`, `brand_id`, `name`, `socket_id`, `cores`, `threads`, `base_clock`, `turbo_clock`, `base_clock2`, `turbo_clock2`, `memory_id`, `memory_speed`, `memory2_id`, `memory2_speed`, `hyperthread_support`, `caches`, `tdp`, `max_temp`, `supported_os`, `integrated_gpu`, `gpu_frequency`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 1, 'AMD Ryzen 5 5600X', 5, '6', '12', 3.7, 4.6, NULL, NULL, 4, 3200, NULL, NULL, 1, 'L2: 3MB, L3: 32MB', 65, 95, 'Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.', NULL, NULL, 'https://www.amd.com/en/products/cpu/amd-ryzen-5-5600x', '2023-02-28 12:02:26', '2023-02-28 12:02:26', '/cpus/ryzen5000-5-min.jpg'),
(3, 1, 'AMD Ryzen 7 5800X', 5, '8', '16', 3.8, 4.7, NULL, NULL, 4, 3200, NULL, NULL, 1, 'L2: 4MB, L3: 32MB', 105, 90, 'Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.', NULL, NULL, 'https://www.amd.com/en/products/cpu/amd-ryzen-7-5800x', '2023-02-28 12:58:58', '2023-02-28 12:58:58', '/cpus/ryzen5000-7-min.jpg'),
(4, 1, 'AMD Ryzen 9 5950X', 5, '16', '32', 3.4, 4.9, NULL, NULL, 4, 3200, NULL, NULL, 1, 'L2: 8MB, L3: 64MB', 105, 90, 'Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.', NULL, NULL, 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5950x', '2023-02-28 13:13:35', '2023-02-28 13:13:35', '/cpus/ryzen5000-9-min.jpg'),
(5, 2, 'Intel Core i5-12600K', 3, '10 (6P+4E)', '16', 3.7, 4.9, 2.8, 3.6, 4, 3200, 5, 4800, 1, 'L2: 9.5MB, Intel Smart Cache: 20MB', 125, 100, 'Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.', NULL, NULL, 'https://ark.intel.com/content/www/us/en/ark/products/134589/intel-core-i512600k-processor-20m-cache-up-to-4-90-ghz.html', '2023-02-28 13:44:24', '2023-02-28 13:44:24', '/cpus/i5-min.jpg'),
(6, 2, 'Intel Core i7-13700K', 3, '16 (8P+8E)', '24', 3.4, 5.3, 2.5, 4.2, 4, 3200, 5, 5600, 1, 'L2: 24MB, L3: 30MB', 125, 100, 'Windows 11 - 64-Bit Edition Windows 10 - 64-Bit Edition RHEL x86 64-Bit Ubuntu x86 64-Bit *Operating System (OS) support will vary by manufacturer.', 'Intel UHD Graphics 770', 300, 'https://www.intel.com/content/www/us/en/products/sku/230500/intel-core-i713700k-processor-30m-cache-up-to-5-40-ghz/specifications.html', '2023-02-28 13:49:10', '2023-02-28 13:49:10', '/cpus/i7-min.jpg'),
(7, 1, 'AMD Ryzen 9 5900X', 5, '12', '24', 3.7, 4.8, NULL, NULL, 4, 3200, NULL, NULL, 1, 'L2: 6MB, L3: 64MB', 105, 90, 'Windows 11 (64-bit) Edition\n                    Windows 10 - 64-Bit Edition\n                    RHEL x86 64-Bit\n                    Ubuntu x86 64-Bit\n                    *Operating System (OS) support will vary by manufacturer.', NULL, NULL, 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5900x', '2023-03-03 10:27:17', '2023-03-03 10:27:17', '/cpus/ryzen5000-9-min.jpg'),
(8, 1, 'AMD Ryzen 5 5600', 5, '6', '12', 3.7, 4.6, NULL, NULL, 4, 3200, NULL, NULL, 1, 'L1: 384KB L2: 3MB, L3: 32MB', 65, 90, 'Windows 11 - 64-Bit Edition\n                    Windows 10 - 64-Bit Edition\n                    RHEL x86 64-Bit\n                    Ubuntu x86 64-Bit\n                    *Operating System (OS) support will vary by manufacturer.', NULL, NULL, 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5900x', '2023-03-03 10:27:17', '2023-03-03 10:27:17', '/cpus/ryzen5000-5-min.jpg'),
(9, 2, 'Intel Core i9-12900K', 3, '16 (8P+8E)', '24', 3.2, 5.1, 2.4, 3.9, 4, 3200, 5, 4800, 1, 'L2: 6MB, L3: 64MB', 125, 100, 'Windows 11 (64-bit) Edition\n                    Windows 10 - 64-Bit Edition\n                    RHEL x86 64-Bit\n                    Ubuntu x86 64-Bit\n                    *Operating System (OS) support will vary by manufacturer.', 'Intel UHD Graphics 770', 300, 'https://ark.intel.com/content/www/us/en/ark/products/134599/intel-core-i912900k-processor-30m-cache-up-to-5-20-ghz.html', '2023-03-03 12:09:42', '2023-03-03 12:09:42', '/cpus/i9-min.jpg'),
(10, 2, 'Intel Core i7-12700', 3, '12 (8P+4E)', '20', 2.1, 1.6, 4.8, 3.6, 4, 3200, 5, 4800, 1, 'L2: 12MB, L3: 25MB', 65, 100, 'Windows 11 (64-bit) Edition\n                    Windows 10 - 64-Bit Edition\n                    RHEL x86 64-Bit\n                    Ubuntu x86 64-Bit\n                    *Operating System (OS) support will vary by manufacturer.', 'Intel UHD Graphics 770', 300, 'https://ark.intel.com/content/www/us/en/ark/products/134591/intel-core-i712700-processor-25m-cache-up-to-4-90-ghz.html', '2023-03-03 12:09:42', '2023-03-03 12:09:42', '/cpus/i7-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expansion_slots`
--

CREATE TABLE `expansion_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expansion_slots`
--

INSERT INTO `expansion_slots` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PCI Express 3.0 x16', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 'PCI Express 4.0 x16', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 'PCI Express 3.0 x8', '2023-03-09 14:30:23', '2023-03-09 14:30:23'),
(4, 'PCI Express 3.0 x4', '2023-03-09 14:30:23', '2023-03-09 14:30:23'),
(5, 'PCI Express 3.0 x1', '2023-03-09 14:30:23', '2023-03-09 14:30:23'),
(6, 'PCI Express 4.0 x8', '2023-03-09 14:30:23', '2023-03-09 14:30:23'),
(7, 'PCI Express 4.0 x4', '2023-03-09 14:30:23', '2023-03-09 14:30:23'),
(8, 'PCI Express 4.0 x1', '2023-03-09 14:30:23', '2023-03-09 14:30:23'),
(9, 'PCI Express 5.0 x16', '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(10, 'PCI Express 5.0 x8', '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(11, 'PCI Express 5.0 x4', '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(12, 'PCI Express 5.0 x1', '2023-03-09 15:25:26', '2023-03-09 15:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `expansion_slots_motherboards`
--

CREATE TABLE `expansion_slots_motherboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `motherboard_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expansion_slots_motherboards`
--

INSERT INTO `expansion_slots_motherboards` (`id`, `slot_id`, `motherboard_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(2, 2, 1, 1, '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(3, 5, 1, 2, '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(4, 9, 2, 2, '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(5, 1, 2, 2, '2023-03-09 15:25:26', '2023-03-09 15:25:26'),
(6, 5, 2, 1, '2023-03-09 15:25:26', '2023-03-09 15:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_factors`
--

CREATE TABLE `form_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_factors`
--

INSERT INTO `form_factors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mini-ITX', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 'Micro-ATX', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 'ATX', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(4, 'E-ATX', '2023-02-27 12:59:10', '2023-02-27 12:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `gpus`
--

CREATE TABLE `gpus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `expansion_slot_id` bigint(20) UNSIGNED NOT NULL,
  `clock_speeds` varchar(255) NOT NULL,
  `vram` int(11) NOT NULL,
  `vram_id` bigint(20) UNSIGNED NOT NULL,
  `memory_bus` int(11) NOT NULL,
  `apis` varchar(255) NOT NULL,
  `ports` varchar(255) NOT NULL,
  `max_resolution` varchar(255) NOT NULL,
  `cooler` varchar(255) NOT NULL,
  `tdp` varchar(255) NOT NULL,
  `recommended_wattage` int(11) NOT NULL,
  `power_connector` varchar(255) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `max_gpu_length` int(11) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gpus`
--

INSERT INTO `gpus` (`id`, `brand_id`, `name`, `expansion_slot_id`, `clock_speeds`, `vram`, `vram_id`, `memory_bus`, `apis`, `ports`, `max_resolution`, `cooler`, `tdp`, `recommended_wattage`, `power_connector`, `features`, `max_gpu_length`, `dimensions`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 5, 'ASUS Dual Radeon RX 6400', 2, 'Game Clock: 2039MHz, Boost Clock: 2321MHz', 4, 6, 64, 'DirectX 12, OpenGL 4.6', '1xHDMI 2.1, 1xDisplay Port 1.4a', '7680x4320', 'Double Fans', '53', 500, NULL, 'Axial-tech fan design features a smaller fan hub that facilitates longer blades and a barrier ring that increases downward air pressure.\n\nA 2-slot Design maximizes compatibility and cooling efficiency for superior performance in small chassis.\n\nDual ball fan bearings can last up to twice as long as sleeve bearing designs.\n\nAuto-Extreme Technology uses automation to enhance reliability.\n\nA protective backplate prevents PCB flex and trace damage.', 201, '201x124x40.5', 'https://www.asus.com/motherboards-components/graphics-cards/dual/dual-rx6400-4g/techspec/', '2023-03-08 11:55:40', '2023-03-08 11:55:40', '/gpus/AsusDualRadeonRX6400-min.jpg'),
(2, 8, 'MSI GeForce 3060 RTX Ventus 2X 12G OC', 2, 'Boost Clock: 2745MHz', 12, 7, 192, 'DirectX 12, OpenGL 4.6', '1xHDMI 2.1, 3xDisplay Port 1.4a', '7680x4320', 'Double Fans', '170', 550, '1x8', 'Dual Fan Thermal Design:\nTORX Fan 3.0: The award-winning MSI TORX Fan 3.0 design creates high static pressure and pushes the limits of thermal performance.\n\nAfterburner Overclocking Utility:\nSupports multi-GPU setups.\nOC Scanner: An automated function finds the highest stable overclock settings.\nOn Screen Display: Provides real-time information of your system\'s performance.\nPredator: In-game video recording.\n\nDragon Center:\nMSI\'s exclusive Dragon Center software lets you monitor, tweak and optimize MSI products in real-time.', 235, '235x124x42', 'https://www.msi.com/Graphics-Card/GeForce-RTX-3060-VENTUS-2X-12G-OC/Specification', '2023-03-08 11:55:40', '2023-03-08 11:55:40', '/gpus/MsiGeforce3060Ventus2x-min.jpg'),
(3, 8, 'MSI GeForce RTX 4070 Ti GAMING X TRIO 12G', 2, 'Boost Clock: 1807MHz', 12, 7, 192, 'DirectX 12, OpenGL 4.6', '1xHDMI 2.1, 3xDisplay Port 1.4a', '7680x4320', 'Triple Fans', '285', 750, '1x16', 'Dual Fan Thermal Design:\nTORX Fan 3.0: The award-winning MSI TORX Fan 3.0 design creates high static pressure and pushes the limits of thermal performance.\n\nAfterburner Overclocking Utility:\nSupports multi-GPU setups.\nOC Scanner: An automated function finds the highest stable overclock settings.\nOn Screen Display: Provides real-time information of your system\'s performance.\nPredator: In-game video recording.\n\nDragon Center:\nMSI\'s exclusive Dragon Center software lets you monitor, tweak and optimize MSI products in real-time.', 337, '337x140x62', 'https://www.msi.com/Graphics-Card/GeForce-RTX-4070-Ti-GAMING-X-TRIO-12G/Specification', '2023-03-08 11:55:40', '2023-03-08 11:55:40', '/gpus/MsiGeforge4070TiTrio-min.png');

-- --------------------------------------------------------

--
-- Table structure for table `graphic_memory_types`
--

CREATE TABLE `graphic_memory_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graphic_memory_types`
--

INSERT INTO `graphic_memory_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'GDDR1', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 'GDDR2', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 'GDDR3', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(4, 'GDDR4', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(5, 'GDDR5', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(6, 'GDDR6', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(7, 'GDDR6X', '2023-03-08 11:55:40', '2023-03-08 11:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `hard_drives`
--

CREATE TABLE `hard_drives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `interface_id` bigint(20) UNSIGNED NOT NULL,
  `form_factor` double NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `rpm` int(11) NOT NULL,
  `cache` int(11) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hard_drives`
--

INSERT INTO `hard_drives` (`id`, `brand_id`, `name`, `interface_id`, `form_factor`, `capacity`, `rpm`, `cache`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 14, 'Seagate BarraCuda ST2000DM008 2TB', 3, 3.5, '2TB', 7200, 256, 'Versatile HDDs for all your PC needs bring you industry-leading excellence in personal computing.\n\nFor over 20 years the BarraCuda family has delivered super-reliable storage for the hard drive industry.\n\nCapacities up to 8TB for desktops, BarraCuda leads the market with the widest range of storage options available.\n\nAdvanced Power modes help save energy without sacrificing performance.\n\nSATA 6Gb/s interface optimizes burst performance.', 'https://www.seagate.com/www-content/datasheets/pdfs/3-5-barracudaDS1900-7-1706US-en_US.pdf', '2023-03-06 09:14:41', '2023-03-06 09:14:41', '/hdds/SeagateBarraCudaST2000DM0082TB-min.jpg'),
(2, 14, 'Seagate BarraCuda ST1000DM010 1TB ', 3, 3.5, '1TB', 7200, 64, 'Versatile HDDs for all your PC needs bring you industry-leading excellence in personal computing.\n\nFor over 20 years the BarraCuda family has delivered super-reliable storage for the hard drive industry.\n\nCapacities up to 8TB for desktops, BarraCuda leads the market with the widest range of storage options available.\n\nAdvanced Power modes help save energy without sacrificing performance.\n\nSATA 6Gb/s interface optimizes burst performance.\n\nBest-Fit Applications\n- Desktop or all-in-one PCs\n- Home servers\n- Entry-level direct-attached storage devices (DAS)', 'https://www.seagate.com/content/dam/seagate/migrated-assets/www-content/product-content/barracuda-fam/barracuda-new/files/barracuda-ds-1900-3-1608us.pdf', '2023-03-06 09:14:41', '2023-03-06 09:14:41', '/hdds/SeagateBarraCudaST1000DM0101TB-min.jpg'),
(3, 13, 'Western Digital Blue Desktop Hard Disk Drive 2TB', 3, 3.5, '2TB', 5400, 256, 'Reliable everyday computing\n\nWestern Digital quality and reliability\n\nFree Acronis True Image WD Edition cloning software\n\nMassive capacity up to 6TB', 'https://www.westerndigital.com/products/internal-drives/wd-blue-desktop-sata-hdd#WD5000AZLX', '2023-03-06 09:14:41', '2023-03-06 09:14:41', '/hdds/WDBlueDesktop2TB-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `liquid_coolers`
--

CREATE TABLE `liquid_coolers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `radiator_size` varchar(255) NOT NULL,
  `fan_size` varchar(255) NOT NULL,
  `fan_connector` int(11) NOT NULL,
  `fan_count` int(11) NOT NULL,
  `fan_rpm` varchar(255) NOT NULL,
  `fan_noise` double NOT NULL,
  `fan_consumption` double NOT NULL,
  `pump_rpm` varchar(255) NOT NULL,
  `pump_consumption` double NOT NULL,
  `pump_noise` double NOT NULL,
  `tube_length` int(11) NOT NULL,
  `rgb` tinyint(1) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pump_connector` int(11) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liquid_coolers`
--

INSERT INTO `liquid_coolers` (`id`, `brand_id`, `name`, `radiator_size`, `fan_size`, `fan_connector`, `fan_count`, `fan_rpm`, `fan_noise`, `fan_consumption`, `pump_rpm`, `pump_consumption`, `pump_noise`, `tube_length`, `rgb`, `features`, `official_link`, `created_at`, `updated_at`, `pump_connector`, `image_link`) VALUES
(1, 8, 'MSI MAG Core Liquid 360R V2', '394x120x27', '120x120x25', 4, 3, '500~2000 ± 10%', 34.3, 1.8, '2100 ± 10%', 4.08, 18, 400, 1, '', 'https://www.msi.com/Liquid-Cooling/MAG-CORELIQUID-360R-V2/Specification', '2023-03-06 12:19:11', '2023-03-06 12:19:11', 4, '/liquidCoolers/MSIMagCoreLiquid360R-min.png'),
(2, 8, 'MSI MAG CORELIQUID P240', '276x120x27', '120x120x25', 4, 3, '500~2000 RPM ± 10%', 34.3, 1.8, '4200 ± 10%', 4.08, 18, 400, 1, '', 'https://www.msi.com/Liquid-Cooling/MAG-CORELIQUID-360R-V2', '2023-03-06 12:19:11', '2023-03-06 12:19:11', 4, '/liquidCoolers/MSIMagCoreLiquidP240-min.png');

-- --------------------------------------------------------

--
-- Table structure for table `liquid_coolers_sockets`
--

CREATE TABLE `liquid_coolers_sockets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socket_id` bigint(20) UNSIGNED NOT NULL,
  `cooler_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liquid_coolers_sockets`
--

INSERT INTO `liquid_coolers_sockets` (`id`, `socket_id`, `cooler_id`, `created_at`, `updated_at`) VALUES
(1, 23, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(2, 22, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(3, 21, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(4, 20, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(5, 19, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(6, 18, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(7, 17, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(8, 16, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(9, 15, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(10, 14, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(11, 13, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(12, 12, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(13, 11, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(14, 10, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(15, 9, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(16, 8, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(17, 3, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(18, 6, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(19, 4, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(20, 5, 1, '2023-03-06 12:35:49', '2023-03-06 12:35:49'),
(21, 25, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(22, 24, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(23, 8, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(24, 9, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(25, 10, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(26, 11, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(27, 12, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(28, 13, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(29, 14, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(30, 15, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(31, 3, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(32, 20, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(33, 19, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(34, 17, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(35, 18, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(36, 16, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(37, 4, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(38, 6, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(39, 5, 2, '2023-03-06 12:49:30', '2023-03-06 12:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `m2_form_factors`
--

CREATE TABLE `m2_form_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m2_form_factors`
--

INSERT INTO `m2_form_factors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'M.2 2280', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(2, 'M.2 2242', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(3, 'M.2 2230', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(4, 'M.2 22110', '2023-03-05 13:30:11', '2023-03-05 13:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `m2_ssds`
--

CREATE TABLE `m2_ssds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `interface_id` bigint(20) UNSIGNED NOT NULL,
  `form_factor_id` bigint(20) UNSIGNED NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `max_read` int(11) NOT NULL,
  `max_write` int(11) NOT NULL,
  `mtbf` int(11) NOT NULL,
  `terabyte_written` int(11) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m2_ssds`
--

INSERT INTO `m2_ssds` (`id`, `brand_id`, `name`, `interface_id`, `form_factor_id`, `capacity`, `max_read`, `max_write`, `mtbf`, `terabyte_written`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 10, 'SAMSUNG 970 EVO PLUS M.2 2280 1TB', 5, 1, '1TB', 3500, 3300, 1500000, 600, 'Always Evolving SSD\nThe ultimate in performance, upgraded. Faster than the 970 EVO, the 970 EVO Plus is powered by the latest V-NAND technology and firmware optimization. It maximizes the potential of NVMe bandwidth for unbeatable computing.\n\nLevel up Performance\nThe 970 EVO Plus reaches sequential read/write speeds up to 3,500/3,300 MB/s, up to 53% faster than the 970 EVO. Powered by the latest V-NAND technology - which brings greater NAND performance and higher power efficiency - along with optimized firmware, a proven Phoenix controller, and Intelligent TurboWrite boost speed.\n\nDesign Flexibility\nThe next advancement in NVMe SSDs. The 970 EVO Plus fits up to 1TB onto the compact M.2 (2280) form factor, greatly expanding storage capacity and saving space for other components. Samsung\'s innovative technology empowers you with the capacity to do more and accomplish more.\n\nExceptional Endurance\nThe new standard in sustainable performance. The 970 EVO Plus provides exceptional endurance powered by the latest V-NAND technology and Samsung\'s reputation for quality.\n\nUnparalleled Reliability\nAchieve a new level of drive confidence. Samsung\'s advanced nickel-coated controller and heat spreader on the 970 EVO Plus enable superior heat dissipation. The Dynamic Thermal Guard automatically monitors and maintains optimal operating temperatures to minimize performance drops.\n\nSamsung Magician\nAdvanced drive management made simple. The Samsung Magician software will help you keep an eye on your drive. A suite of user-friendly tools helps keep your drive up to date, monitor drive health and speed, and even boost performance.', 'https://www.samsung.com/us/computing/memory-storage/solid-state-drives/ssd-970-evo-plus-nvme-m-2-1-tb-mz-v7s1t0b-am/#specs', '2023-03-05 13:38:18', '2023-03-05 13:38:18', '/ssds/m2/SAMSUNG970EVO1TB-min.jpg'),
(2, 10, 'SAMSUNG 980 PRO M.2 2280 1TB', 7, 1, '2TB', 7000, 5100, 1500000, 1200, 'Next-level SSD performance\nUnleash the power of the Samsung 980 PRO PCIe 4.0 NVMe SSD for next-level computing. 980 PRO delivers 2x the data transfer rate of PCIe 3.0, while maintaining compatibility with PCIe 3.0.\n\nMaximum Speed\nGet read speeds up to 7,000 MB/s with 980 PRO and push the limits of what SSDs can do. Powered by a new Elpsis controller designed to harmonize the flash memory components and the interface for superior speed - with a PCIe 4.0 interface that\'s 2x faster than PCIe 3.0 SSDs and 12x faster than Samsung SATA SSDs - every component of this NVMe SSD is manufactured by Samsung for performance that lasts.\n\nA winning combination\nDesigned for hardcore gamers and tech-savvy users, the 980 PRO offers high-performance bandwidth and throughput for heavy-duty applications in gaming, graphics, data analytics, and more. It\'s fast at loading games, so you can play more and wait less.\n\nEfficient M.2 SSD\nThe 980 PRO comes in a compact M.2 2280 form factor, which can be easily plugged into desktops and laptops. Due to its size and thus optimized power efficiency, it\'s ideal for building high-performance computing systems.\n\nReliable thermal control\nHigh-performance SSDs usually require high-performance thermal control. To ensure stable performance, the 980 PRO uses nickel coating to help manage the controller\'s heat level and a heat spreader label to deliver effective thermal control of the NAND chip.\n\nSmart thermal solution\nEmbedded with Samsung\'s cutting-edge thermal control algorithm, 980 PRO manages heat on its own to deliver durable and reliable performance, while minimizing performance fluctuations during extended usage.\n\nSamsung Magician software\nUnlock the full potential of 980 PRO with Samsung Magician\'s advanced, yet intuitive optimization tools. Monitor drive health, optimize performance, protect valuable data, and receive important updates with Magician to ensure you\'re always getting the best performance out of you', 'https://www.crucial.com/ssd/mx500/ct500mx500ssd1', '2023-03-05 13:38:18', '2023-03-05 13:38:18', '/ssds/m2/SAMSUNG980PRO1TB-min.jpg'),
(3, 11, 'Crucial P3 Plus 1TB', 7, 1, '1TB', 5000, 3600, 0, 600, '', 'https://www.crucial.com/ssd/p3-plus/ct1000p3pssd8', '2023-03-05 13:38:18', '2023-03-05 13:38:18', '/ssds/m2/CrucialP3Plus1TB-min.png'),
(4, 13, 'WD Blue SN570 NVMe M.2 2280 1TB', 5, 1, '1TB', 3500, 3000, 0, 600, '', 'https://www.westerndigital.com/products/internal-drives/wd-blue-sn570-nvme-ssd#WDS100T3B0C', '2023-03-05 13:38:18', '2023-03-05 13:38:18', '/ssds/m2/WDBlueSN570NVMe1TB-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `memory_types`
--

CREATE TABLE `memory_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memory_types`
--

INSERT INTO `memory_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DDR1', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 'DDR2', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 'DDR3', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(4, 'DDR4', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(5, 'DDR5', '2023-02-27 12:59:10', '2023-02-27 12:59:10');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_24_114129_create_cpu_brands_table', 2),
(72, '2023_02_24_114129_create_brands_table', 3),
(73, '2023_02_24_132233_create_sockets_table', 3),
(74, '2023_02_24_132715_create_memory_types_table', 3),
(75, '2023_02_24_132736_create_cpus_table', 3),
(76, '2023_02_24_135304_create_chipsets_table', 3),
(77, '2023_02_24_135334_create_form_factors_table', 3),
(78, '2023_02_24_141058_create_storage_interfaces_table', 3),
(79, '2023_02_24_155330_create_expansion_slots_table', 3),
(80, '2023_02_24_160538_create_motherboards_table', 3),
(81, '2023_02_24_170413_create_expansion_slots_motherboards_table', 3),
(82, '2023_02_24_170442_create_storage_interfaces_motherboards_table', 3),
(83, '2023_02_24_171529_create_rams_table', 3),
(84, '2023_02_24_174620_create_graphic_memory_types_table', 3),
(85, '2023_02_24_174720_create_graphic_chipsets_table', 3),
(86, '2023_02_24_175129_create_gpus_table', 3),
(87, '2023_02_25_123245_create_power_supplies_table', 3),
(88, '2023_02_25_132219_create_hard_drives_table', 3),
(89, '2023_02_25_135315_create_sata_ssds_table', 3),
(90, '2023_02_25_150733_create_m2_form_factors_table', 3),
(91, '2023_02_25_151201_create_m2_ssds_table', 3),
(92, '2023_02_25_163849_create_air_coolers_table', 3),
(93, '2023_02_25_164704_create_air_coolers_sockets_table', 3),
(94, '2023_02_25_170150_create_liquid_coolers_table', 3),
(95, '2023_02_25_171509_create_liquid_coolers_sockets_table', 3),
(96, '2023_02_25_172041_create_case_fans_table', 3),
(97, '2023_02_26_121915_create_case_form_factors_table', 3),
(98, '2023_02_26_121955_create_cases_table', 3),
(99, '2023_02_26_123820_create_case_mb_size_support_table', 3),
(100, '2023_02_27_144632_update_gpus_table', 4),
(101, '2023_02_27_144807_delete_graphic_chipsets_table', 4),
(102, '2016_01_04_173148_create_admin_tables', 5),
(103, '2023_03_05_121701_add_interface_id_to_m2_ssds_table', 6),
(104, '2023_03_05_153100_add_terabyte_written_to_m2_ssds_table', 7),
(105, '2023_03_05_162947_change_hard_drives_table', 8),
(106, '2023_03_06_122424_change_liquid_coolers_table', 9),
(111, '2023_03_06_152006_add_max_cooler_height_to_air_coolers_table', 10),
(112, '2023_03_08_111133_add_to_air_coolers_sockets_table', 10),
(113, '2023_03_08_120701_update_gpus_table', 11),
(115, '2023_03_08_120717_add_to_gpus_table', 12),
(118, '2023_03_08_140705_edit_power_supplies_table', 13),
(120, '2023_03_08_140722_add_to_power_supplies_table', 14),
(121, '2023_03_09_074430_edit_motherboards_table', 15),
(122, '2023_03_09_161502_add_to_expansion_slots_table', 15),
(124, '2023_03_09_162810_add_to_motherboards_table', 16),
(125, '2023_03_09_170321_add_to_expansion_slots_motherboards_table', 17),
(131, '2023_03_10_104832_change_storage_interfaces_motherboards_table', 18),
(133, '2023_03_10_113316_add_to_storage_interfaces_motherboards_table', 19),
(136, '2023_03_10_134330_change_cases_table', 20),
(138, '2023_03_10_150741_add_to_cases_table', 21),
(139, '2023_03_11_111725_add_to_cases_mb_size_support_table', 22),
(140, '2023_04_05_134136_add_image_to_all_tables', 23),
(144, '2023_04_05_141540_insert_into_cpus_table', 24),
(145, '2023_04_06_130135_drop_features_column_in_cpus_table', 25),
(146, '2023_04_06_153048_insert_into_cases_table', 26),
(147, '2023_04_07_121505_insert_into_gpus_table', 27),
(148, '2023_04_08_091831_insert_into_rams_table', 28),
(149, '2023_04_06_153048_update_cases_table', 29),
(150, '2023_04_07_121505_update_gpus_table', 29),
(151, '2023_04_08_091831_update_rams_table', 29),
(152, '2023_04_08_112954_update_motherboards_table', 29),
(153, '2023_04_05_141540_update_cpus_table', 30),
(154, '2023_04_08_143557_update_liquid_coolers_table', 31),
(155, '2023_04_08_152529_update_air_coolers_table', 32),
(156, '2023_04_08_154651_update_psus_table', 33),
(157, '2023_04_08_163519_update_hard_drives_table', 34),
(158, '2023_04_08_170503_update_sata_ssds_table', 35),
(159, '2023_04_08_172334_update_m2_ssds_table', 36),
(160, '2023_04_15_110252_add_corsair_ddr5_to_rams_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE `motherboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `form_factor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `socket_id` bigint(20) UNSIGNED NOT NULL,
  `chipset_id` bigint(20) UNSIGNED NOT NULL,
  `memory_type_id` bigint(20) UNSIGNED NOT NULL,
  `memories_support` text NOT NULL,
  `max_memory` int(11) NOT NULL,
  `memory_slots` int(11) NOT NULL,
  `dual_ch_support` tinyint(1) NOT NULL,
  `ecc_support` varchar(255) NOT NULL,
  `buffer_support` varchar(255) NOT NULL,
  `onboard_video` varchar(255) DEFAULT NULL,
  `onboard_audio` varchar(255) DEFAULT NULL,
  `onboard_lan` varchar(255) DEFAULT NULL,
  `io_ports` varchar(255) NOT NULL,
  `usb_ports` varchar(255) NOT NULL,
  `features` text NOT NULL,
  `led` tinyint(1) NOT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motherboards`
--

INSERT INTO `motherboards` (`id`, `brand_id`, `form_factor_id`, `name`, `socket_id`, `chipset_id`, `memory_type_id`, `memories_support`, `max_memory`, `memory_slots`, `dual_ch_support`, `ecc_support`, `buffer_support`, `onboard_video`, `onboard_audio`, `onboard_lan`, `io_ports`, `usb_ports`, `features`, `led`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 8, 3, 'MSI MAG B550 TOMAHAWK', 5, 4, 4, '1866/ 2133/ 2400/ 2667/ 2800/ 2933/ 3000/ 3066/ 3200/ 2667/ 2800/ 2933/ 3000/ 3066/ 3200/ 3466/ 3600/ 3733/ 3866/ 4000/ 4133/ 4266/ 4400/ 4533/ 4600/ 4733/ 4800/ 4866/ 5000/ 5100+', 128, 4, 1, '1', 'Un-buffered', 'Supported only by CPU with integrated graphic', 'Realtek ALC1200, ALC1220P', 'Realtek RTL8125B, Realtek RTL8111H', '1 x Flash BIOS Button\n1 x PS/2 Keyboard/Mouse Combo\n1 x DisplayPort\n1 x HDMI\n2 x LAN (RJ45)\n2 x USB 2.0/1.1\n2 x USB 3.2 Gen 1 Type-A\n1 x USB 3.2 Gen 2 Type-A\n1 x USB 3.2 Gen 2 Type-C\n1 x Optical S/PDIF Out\n5 x Audio Jacks', '1 x USB 3.2 Gen 1 5Gbps Type-C port\n1 x USB 3.2 Gen 1 5Gbps connector (supports additional 2 USB 3.2 Gen 1 5Gbps ports)\n2 x USB 2.0 connectors (supports additional 4 USB 2.0 ports)', 'Supports AMD Ryzen 5000 & 3000 Series desktop processors (not compatible with AMD Ryzen 5 3400G & Ryzen 3 3200G) and AMD Ryzen 4000 G-Series desktop processors\n\nSupports DDR4 Memory, up to 5100+(OC) MHz\n\nLightning Fast Game experience: PCIe 4.0, Lightning Gen 4 x4 M.2 with M.2 Shield Frozr, AMD Turbo USB 3.2 Gen 2\n\nPremium Thermal Solution: Extended Heatsink Design with additional choke thermal pad rated for 7W/mk and PCB with 2oz thickened copper are built for high performance system and non-stop gaming experience\n\nEnhanced Power Design: 10+2+1 Duet Rail Power System, Digital PWM, Core Boost, DDR4 Boost\n\nLatest Network Solution: Onboard 2.5G LAN plus Gigabit LAN with LAN Manager deliver the best online experience without lag\n\nMystic Light: 16.8 million colors / 29 effects controlled in one click. Mystic Light Extension supports RGB and RAINBOW LED strip\n\nPre-installed I/O Shielding: Better EMI protection and more convenience for installation\n\nAudio Boost: Reward your ears with studio grade sound quality for the most immersive gaming experience\n\nMulti-GPU: With Steel Armor PCI-E slots. Supports 2-Way AMD Crossfire', 1, 'https://www.msi.com/Motherboard/MAG-B550-TOMAHAWK/Specification', '2023-03-09 14:46:59', '2023-03-09 14:46:59', '/motherboards/MSIMagB550Tomahawk-min.jpg'),
(2, 8, 3, 'MSI MPG Z690 EDGE', 3, 1, 4, '2133/ 2666/ 2933/ 3200 ', 128, 4, 1, '1', '0', NULL, 'Realtek ALC4080', 'Intel I225-V, Intel WIFI 6', '1 x DisplayPort\n1 x HDMI\n1 x Flash BIOS Button\n1 x LAN (RJ45)\n2 x Antenna Bracket\n1 x Optical S/PDIF Out\n5 x Audio Jacks\n1 x USB 3.2 Gen 2x2 Type-C\n5 x USB 3.2 Gen 2 Type-A\n2 x USB 2.0/1.1', '1 x USB 3.2 Gen 2 10Gbps Type-C port\n1 x USB 3.2 Gen 1 5Gbps connector (supports additional 2 USB 3.2 Gen 1 5Gbps ports)\n2 x USB 2.0 connectors (supports additional 4 USB 2.0 ports)', 'Supports 12th Gen Intel Core / Pentium Celeron processors for LGA 1700 socket\n\nSupports DDR4 Memory, up to 5200+(OC) MHz\n\nLightning Fast Game experience: PCIe 5.0 slot, Lightning Gen 4 x4 M.2, USB 3.2 Gen 2x2\n\nEnhanced Power Design: Direct 16+1+1 phases power, dual 8-pin CPU power connectors, Core Boost, Memory Boost\n\nPremium Thermal Solution: Aluminum cover with heatsink, heat-pipe, MOSFET thermal pads rated for 7W/mk, additional choke thermal pads and M.2 Shield Frozr are built for high performance system and non-stop gaming experience\n\nMYSTIC LIGHT: 16.8 million colors / fancy lighting effects controlled in one click. MYSTIC LIGHT SYNC supports RGB and RAINBOW(ARGB) LED strips and Ambient devices\n\n2.5G LAN with LAN Manager and Intel Wi-Fi 6 Solution: Upgraded network solution for professional and multimedia use. Delivers a secure, stable and fast network connection\n\nAUDIO BOOST 5: Reward your ears with studio grade sound quality for the most immersive gaming experience\n\nHigh Quality PCB: 6-layer PCB made by 2oz thickened copper and server grade level material\n\nPre-installed I/O Shield: Better EMI protection and more convenience for installation', 1, 'https://www.msi.com/Motherboard/MPG-Z690-EDGE-WIFI-DDR4/Specification', '2023-03-09 14:46:59', '2023-03-09 14:46:59', '/motherboards/MSIZ690Edge-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `power_supplies`
--

CREATE TABLE `power_supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `max_power` int(11) NOT NULL,
  `fans` varchar(255) NOT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `connectors` text NOT NULL,
  `input_voltage` varchar(255) NOT NULL,
  `max_psu_length` int(11) NOT NULL,
  `modular` varchar(255) DEFAULT NULL,
  `dimensions` varchar(255) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `power_supplies`
--

INSERT INTO `power_supplies` (`id`, `brand_id`, `name`, `max_power`, `fans`, `certificate`, `connectors`, `input_voltage`, `max_psu_length`, `modular`, `dimensions`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 16, 'ENERMAX CyberBron 500W', 500, '1 x 120mm fan', '	80 PLUS BRONZE Certified', '1 x 24 pin ATX\n1 x 8 pin (4+4) EPS (CPU)\n2 x 8 pin (6+2) PCIe\n6 x SATA\n4 x 4 pin Molex\n1 x FDD (adapter)', '115-230 V', 140, 'Non-Modular', '150x86x140', 'Fully Modular: Only connect the cables your system needs, making clean and tidy builds easier.\n135mm Magnetic Levitation Fan: Utilizes a magnetic levitation bearing and custom engineered rotors for high performance, low noise, and superior reliability.\nEPS12V Connector: For wide compatibility with modern graphics cards and motherboards.\n100% All Japanese 105°C Capacitors: Premium internal components ensure unwavering power delivery and long-term reliability.\nModern Standby Compatible: Extremely fast wake-from-sleep times and better low-load efficiency.\n80 PLUS Gold Certified: High efficiency operation for lower power consumption, less noise, and cooler temperatures.\nZero RPM Fan Mode: At low and medium loads the cooling fan switches off entirely for near-silent operation.\nResonant LLC Topology with DC-to-DC Conversion: Provides clean, consistent power, reduces coil whine for quieter operation, and enables use of more energy efficient sleep states.', 'https://www.enermax.com/en/products/cyberbron-500-watt-80-plus-bronze-non-modular-power-supply', '2023-03-08 12:56:13', '2023-03-08 12:56:13', '/psus/ENERMAXCyberBron500W-min.jpg'),
(2, 9, 'Corsair RMx Series (2021) RM850x', 850, '1 x 135mm Magnetic Levitation Fan', '80 PLUS GOLD Certified', '1 x 24 pin ATX\n3 x 8 pin (4+4) EPS (CPU)\n4 x 8 pin (6+2) PCIe\n14 x SATA\n4 x 4 pin Molex', '100-240 V', 160, 'Full Modular', '150x86x160', 'Fully Modular: Only connect the cables your system needs, making clean and tidy builds easier.\n135mm Magnetic Levitation Fan: Utilizes a magnetic levitation bearing and custom engineered rotors for high performance, low noise, and superior reliability.\nEPS12V Connector: For wide compatibility with modern graphics cards and motherboards.\n100% All Japanese 105°C Capacitors: Premium internal components ensure unwavering power delivery and long-term reliability.\nModern Standby Compatible: Extremely fast wake-from-sleep times and better low-load efficiency.\n80 PLUS Gold Certified: High efficiency operation for lower power consumption, less noise, and cooler temperatures.\nZero RPM Fan Mode: At low and medium loads the cooling fan switches off entirely for near-silent operation.\nResonant LLC Topology with DC-to-DC Conversion: Provides clean, consistent power, reduces coil whine for quieter operation, and enables use of more energy efficient sleep states.', 'https://www.corsair.com/us/en/Categories/Products/Power-Supply-Units/RMx-Series/p/CP-9020200-NA', '2023-03-08 12:56:13', '2023-03-08 12:56:13', '/psus/CorsairRMx2021RM850x-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rams`
--

CREATE TABLE `rams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `memory_type_id` bigint(20) UNSIGNED NOT NULL,
  `modules` varchar(255) NOT NULL,
  `speed` int(11) NOT NULL,
  `voltage` double NOT NULL,
  `latency` varchar(255) NOT NULL,
  `heat_spreader` tinyint(1) NOT NULL,
  `rgb_support` tinyint(1) NOT NULL,
  `ecc_support` tinyint(1) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rams`
--

INSERT INTO `rams` (`id`, `brand_id`, `name`, `capacity`, `memory_type_id`, `modules`, `speed`, `voltage`, `latency`, `heat_spreader`, `rgb_support`, `ecc_support`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 9, 'Corsair Vengeance LPX Series Black 2x8GB DDR4 CMK16GX4M2B3200C16', '16', 4, '2', 3200, 1.35, '16', 1, 0, 0, 'Designed for high-performance overclocking\r\nEach Vengeance LPX module is built with a pure aluminum heatspreader for faster heat dissipation and cooler operation; and the eight-layer PCB helps manage heat and provides superior overclocking headroom.\r\nEach IC is individually screened for performance potential.\r\n\r\nDesigned for great looks\r\nAvailable in multiple colors to match your motherboard, your components, or just your style.\r\n\r\nPerformance and Compatibility\r\nVengeance LPX is optimized and compatibility tested for the latest Intel 100 Series motherboards and offers higher frequencies, greater bandwidth, and lower power consumption.\r\nXMP 2.0 support for trouble-free automatic overclocking.\r\n\r\nLow-profile heatspreader design\r\nThe Vengeance LPX module height is carefully designed to fit smaller spaces.', 'https://www.corsair.com/us/en/Categories/Products/Memory/VENGEANCE-LPX/p/CMK16GX4M2B3200C16#tab-tech-specs', '2023-02-28 14:36:59', '2023-02-28 14:36:59', '/rams/VengeancePLXBlack-min.png'),
(2, 9, 'Corsair Vengeance RGB Pro Black 2x16GB DDR4 CMW32GX4M2D3600C18', '32', 4, '2', 3600, 1.35, '18', 1, 1, 0, 'Dynamic Multi-Zone RGB Lighting\n                10 Ultra-bright RGB LEDs per module.\n\n                Next Generation Software\n                Take control in CORSAIR iCUE software and synchronize lighting with other CORSAIR RGB products, including CPU coolers, keyboards and fans.\n\n                Custom Performance PCB\n                Provides the highest signal quality for the greatest level of performance and stability.\n                Tightly Screened Memory\n                Carefully screened ICs for extended overclocking potential.\n                Maximum Bandwidth and Tight Response Times\n                Optimized for peak performance on the latest Intel and AMD DDR4 motherboards.\n\n                No Wires Required\n                Requires no extra wires or cables for a clean and seamless install.\n\n                Maximum bandwidth and tight response time\n                Optimized on the latest AMD and Intel DDR4 motherboards.\n\n                Supports XMP 2.0\n                A single BIOS setting is all that\'s required to set your memory to its ideal performance settings, for for optimum performance.', 'https://www.corsair.com/us/en/Categories/Products/Memory/Vengeance-PRO-RGB-Black/p/CMW32GX4M2C3200C16', '2023-03-03 13:16:39', '2023-03-03 13:16:39', '/rams/VengeanceRGBProBlack-min.jpg'),
(3, 9, 'Corsair Dominator Platinum RGB White 2x16GB DDR4 CMT32GX4M2E3200C16W', '32', 4, '2', 3600, 1.35, '16', 1, 1, 0, 'Iconic and Refined High-Performance RGB Memory\n                    Iconic CORSAIR DOMINATOR PLATINUM design perfectly complements the world\'s best PCs, for unmistakable high-end system builds.\n\n                    High Speed and Tight Timings\n                    Hand-sorted, tightly-screened memory chips ensure high frequency performance and tight response times, with overclocking headroom to spare.\n\n                    Premium Craftsmanship\n                    A combination of precision die-casting and anodization creates premium memory that\'s built to last.\n\n                    Brilliant White Finish\n                    A white top bar and heatspreader with gold accents match the clean, refined look of other white CORSAIR products in your setup.\n\n                    12 Ultra-Bright CAPELLIX RGB LEDs Per Module\n                    Illuminate your PC with spectacular customizable lighting from 12 individually addressable RGB LEDs.\n\n                    Unique Dual-Channel DHX Cooling Technology\n                    A heatspreader embedded directly into the PCB pulls heat away from the modules, allowing DOMINATOR PLATINUM RGB to stay cool even under extreme stress.\n\n                    Custom High-Performance PCB\n                    Guarantees signal quality and stability for superior overclocking ability.\n\n                    Intelligent Control, Unlimited Possibilities\n                    CORSAIR iCUE software brings your system to life with dynamic RGB lighting control synchronized across all your iCUE compatible products, and keeps you informed with real-time temperature and frequency readings.\n\n                    Create and Customize\n                    Choose from dozens of stunning pre-set lighting profiles, or create your own with virtually limitless lighting patterns and effects in CORSAIR iCUE software.\n\n                    Wide Compatibility\n                    Optimized for the latest Intel and AMD DDR4 motherboards.\n\n                    Intel XMP 2.0 Support\n                    Simple one-setting installation and setup.', 'https://www.corsair.com/us/en/Categories/Products/Memory/Vengeance-PRO-RGB-Black/p/CMW32GX4M2C3200C16', '2023-03-03 13:16:39', '2023-03-03 13:16:39', '/rams/DominatorPlatinumRGBBlack-min.jpg'),
(4, 9, 'CORSAIR Vengeance RGB Black 2x16GB DDR5 CMH32GX5M2B6000C40', '32', 5, '2', 5200, 1.3, '40', 1, 1, 0, 'Welcome to the Cutting-Edge of Performance: Push the limits of your system like never before with CORSAIR DDR5 memory, unlocking even faster frequencies, greater capacities, and higher CPU processing.\n\nDynamic Ten-Zone RGB Lighting: Illuminate your system with ten individually addressable, ultra-bright RGB LEDs per module, encased in a panoramic light bar for vivid RGB lighting from any viewing angle.\n\nCreate and Customize: Choose from dozens of preset lighting profiles, or create your own in iCUE.\n\nCustom Intel XMP 3.0 Profiles: Customize and save your own XMP profiles via iCUE to tailor performance by app or task for greater efficiency.\n\nMaximum Bandwidth and Tight Response Times: Optimized for peak performance on the latest Intel DDR5 motherboards.\n\nCustom Performance PCB: Provides the highest signal quality for the greatest level of performance and stability.\n\nTightly Screened Memory: Carefully screened memory chips for extended overclocking potential.\n\nOnboard Voltage Regulation: Enables easier, more finely-tuned, and more stable overclocking through CORSAIR iCUE software than previous generation motherboard control.\n\nPowerful CORSAIR iCUE Software: Dynamic RGB lighting control synchronized across your entire iCUE setup, real-time temperature and frequency readings, onboard voltage regulation, and custom XMP profiles.\n\nStylish Solid Aluminum Heatspreader: Efficiently conducts heat away from your memory, with refined VENGEANCE styling to fit the look of modern systems.', 'https://www.corsair.com/us/en/Categories/Products/Memory/VENGEANCE-RGB-DDR5-%E2%80%94-Optimized-for-AMD/p/CMH32GX5M2B5600Z36K#tab-tech-specs', '2023-04-15 08:56:15', '2023-04-15 08:56:15', '/rams/VengeanceRGBBlackDDR5-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sata_ssds`
--

CREATE TABLE `sata_ssds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `interface_id` bigint(20) UNSIGNED NOT NULL,
  `form_factor` double NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `max_read` int(11) NOT NULL,
  `max_write` int(11) NOT NULL,
  `mtbf` double NOT NULL,
  `terabyte_written` int(11) NOT NULL,
  `features` text DEFAULT NULL,
  `official_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sata_ssds`
--

INSERT INTO `sata_ssds` (`id`, `brand_id`, `name`, `interface_id`, `form_factor`, `capacity`, `max_read`, `max_write`, `mtbf`, `terabyte_written`, `features`, `official_link`, `created_at`, `updated_at`, `image_link`) VALUES
(1, 10, 'SAMSUNG 870 EVO Series 2.5\" 1TB', 3, 2.5, '1TB', 560, 530, 1500000, 1200, '', 'https://www.samsung.com/us/computing/memory-storage/solid-state-drives/870-evo-sata-2-5-ssd-1tb-mz-77e1t0b-am/#specs', '2023-03-04 11:53:16', '2023-03-04 11:53:16', '/ssds/sata/SAMSUNG870EVO1TB-min.jpg'),
(2, 11, 'Crucial MX500 SATA 2.5\" 500GB', 3, 2.5, '500GB', 560, 510, 1800000, 360, 'Dynamic Write Acceleration\n                            Redundant Array of Independent NAND (RAIN)\n                            Multistep Data Integrity Algorithm\n                            Adaptive Thermal Protection\n                            Integrated Power Loss Immunity\n                            Active Garbage Collection\n                            TRIM Support\n                            Self-Monitoring and Reporting Technology (SMART)\n                            Error Correction Code (ECC)\n                            Device Sleep Support', 'https://www.crucial.com/ssd/mx500/ct500mx500ssd1', '2023-03-04 11:53:16', '2023-03-04 11:53:16', '/ssds/sata/CrucialMX50050GB-min.jpg'),
(3, 11, 'Crucial BX500 SATA 2.5\" 240GB', 3, 2.5, '240GB', 540, 500, 80000, 360, 'Multistep Data Integrity Algorithm\n                            Thermal Monitoring\n                            SLC Write Acceleration\n                            Active Garbage Collection\n                            TRIM Support\n                            Self-Monitoring and Reporting Technology (SMART)\n                            Error Correction Code (ECC)', 'https://www.crucial.com/ssd/bx500/ct240bx500ssd1', '2023-03-04 11:53:16', '2023-03-04 11:53:16', '/ssds/sata/CrucialBX500240GB-min.jpg'),
(4, 10, 'SAMSUNG 870 QVO Series SATA 2.5\" 2TB', 3, 2.5, '2TB', 560, 530, 1500000, 720, '', 'https://www.samsung.com/us/computing/memory-storage/solid-state-drives/870-qvo-sata-iii-2-5--ssd-2tb-mz-77q2t0b-am/#specs', '2023-03-04 11:53:16', '2023-03-04 11:53:16', '/ssds/sata/SAMSUNG8702TB-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sockets`
--

CREATE TABLE `sockets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sockets`
--

INSERT INTO `sockets` (`id`, `brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'LGA 7529', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(2, 2, 'LGA 4677', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(3, 2, 'LGA 1700', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(4, 1, 'AM5', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(5, 1, 'AM4', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(6, 1, 'AM3', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(7, 1, 'TRX40', '2023-02-27 10:37:30', '2023-02-27 10:37:30'),
(8, 2, 'LGA 1150', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(9, 2, 'LGA 1151', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(10, 2, 'LGA 1155', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(11, 2, 'LGA 1200', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(12, 2, 'LGA 1366', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(13, 2, 'LGA 2011', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(14, 2, 'LGA 2011-3', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(15, 2, 'LGA 2066', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(16, 1, 'FM2+', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(17, 1, 'FM1', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(18, 1, 'FM2', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(19, 1, 'AM3+', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(20, 1, 'AM2+', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(21, 1, 'SocketTR4', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(22, 1, 'sTRX4', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(23, 1, 'SP3', '2023-03-06 12:21:02', '2023-03-06 12:21:02'),
(24, 2, 'LGA 1156', '2023-03-06 12:49:30', '2023-03-06 12:49:30'),
(25, 1, 'AM2', '2023-03-06 12:49:30', '2023-03-06 12:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `storage_interfaces`
--

CREATE TABLE `storage_interfaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_interfaces`
--

INSERT INTO `storage_interfaces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SATA', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(2, 'SATA2', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(3, 'SATA3', '2023-02-27 12:59:10', '2023-02-27 12:59:10'),
(4, 'PCI Express 3.0 x2', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(5, 'PCI Express 3.0 x4', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(6, 'PCI Express 3.0 x8', '2023-03-05 13:30:11', '2023-03-05 13:30:11'),
(7, 'PCI Express 4.0 x4', '2023-03-05 13:30:11', '2023-03-05 13:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `storage_interfaces_motherboards`
--

CREATE TABLE `storage_interfaces_motherboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `interface_id` bigint(20) UNSIGNED NOT NULL,
  `board_id` bigint(20) UNSIGNED NOT NULL,
  `m2_form_factors` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_interfaces_motherboards`
--

INSERT INTO `storage_interfaces_motherboards` (`id`, `name`, `interface_id`, `board_id`, `m2_form_factors`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Sata', 3, 1, NULL, 6, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(2, 'M2_1', 3, 1, 'M.2 2242/ M.2 2260/ M.2 2280/ M.2 22110', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(3, 'M2_1', 5, 1, 'M.2 2242/ M.2 2260/ M.2 2280/ M.2 22110', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(4, 'M2_1', 7, 1, 'M.2 2242/ M.2 2260/ M.2 2280/ M.2 22110', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(5, 'M2_2', 5, 1, 'M.2 2242/ M.2 2260/ M.2 2280', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(6, 'Sata', 3, 2, NULL, 6, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(7, 'M2_1', 7, 2, 'M.2 2260/ M.2 2280/ M.2 22110', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(8, 'M2_2', 7, 2, 'M.2 2260/ M.2 2280', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(9, 'M2_3', 3, 2, 'M.2 2242/ M.2 2260/ M.2 2280', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(10, 'M2_3', 7, 2, 'M.2 2242/ M.2 2260/ M.2 2280', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(11, 'M2_4', 3, 2, 'M.2 2242/ M.2 2260/ M.2 2280', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02'),
(12, 'M2_4', 7, 2, 'M.2 2242/ M.2 2260/ M.2 2280', 1, '2023-03-10 11:34:02', '2023-03-10 11:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'awedawd', 'a@abv.bg', NULL, '1234', NULL, '2023-02-05 14:47:53', '2023-02-05 14:47:53'),
(5, 'SpectraPHBG', 'vgamingbg@gmail.com', NULL, '$2y$10$2SdQJLZ6X5Kb.mDn9WwJC.qbyPkbgsicf49o2xpa6POdDUf9pwcBW', NULL, '2023-04-09 11:11:09', '2023-04-09 11:24:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Indexes for table `air_coolers`
--
ALTER TABLE `air_coolers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `air_coolers_name_unique` (`name`),
  ADD KEY `air_coolers_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `air_coolers_sockets`
--
ALTER TABLE `air_coolers_sockets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `air_coolers_sockets_socket_id_cooler_id_unique` (`socket_id`,`cooler_id`),
  ADD KEY `air_coolers_sockets_cooler_id_foreign` (`cooler_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cases_name_unique` (`name`),
  ADD KEY `cases_brand_id_foreign` (`brand_id`),
  ADD KEY `cases_factor_id_foreign` (`factor_id`);

--
-- Indexes for table `case_fans`
--
ALTER TABLE `case_fans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case_fans_name_unique` (`name`),
  ADD KEY `case_fans_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `case_form_factors`
--
ALTER TABLE `case_form_factors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case_form_factors_name_unique` (`name`);

--
-- Indexes for table `case_mb_size_support`
--
ALTER TABLE `case_mb_size_support`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case_mb_size_support_case_id_factor_id_unique` (`case_id`,`factor_id`),
  ADD KEY `case_mb_size_support_factor_id_foreign` (`factor_id`);

--
-- Indexes for table `chipsets`
--
ALTER TABLE `chipsets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chipsets_name_unique` (`name`),
  ADD KEY `chipsets_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `cpus`
--
ALTER TABLE `cpus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpus_name_unique` (`name`),
  ADD KEY `cpus_brand_id_foreign` (`brand_id`),
  ADD KEY `cpus_socket_id_foreign` (`socket_id`),
  ADD KEY `cpus_memory_id_foreign` (`memory_id`),
  ADD KEY `cpus_memory2_id_foreign` (`memory2_id`);

--
-- Indexes for table `expansion_slots`
--
ALTER TABLE `expansion_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expansion_slots_name_unique` (`name`);

--
-- Indexes for table `expansion_slots_motherboards`
--
ALTER TABLE `expansion_slots_motherboards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expansion_slots_motherboards_slot_id_motherboard_id_unique` (`slot_id`,`motherboard_id`),
  ADD KEY `expansion_slots_motherboards_motherboard_id_foreign` (`motherboard_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_factors`
--
ALTER TABLE `form_factors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `form_factors_name_unique` (`name`);

--
-- Indexes for table `gpus`
--
ALTER TABLE `gpus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gpus_name_unique` (`name`),
  ADD KEY `gpus_brand_id_foreign` (`brand_id`),
  ADD KEY `gpus_expansion_slot_id_foreign` (`expansion_slot_id`),
  ADD KEY `gpus_vram_id_foreign` (`vram_id`);

--
-- Indexes for table `graphic_memory_types`
--
ALTER TABLE `graphic_memory_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `graphic_memory_types_name_unique` (`name`);

--
-- Indexes for table `hard_drives`
--
ALTER TABLE `hard_drives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hard_drives_name_unique` (`name`),
  ADD KEY `hard_drives_brand_id_foreign` (`brand_id`),
  ADD KEY `hard_drives_interface_id_foreign` (`interface_id`);

--
-- Indexes for table `liquid_coolers`
--
ALTER TABLE `liquid_coolers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `liquid_coolers_name_unique` (`name`),
  ADD KEY `liquid_coolers_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `liquid_coolers_sockets`
--
ALTER TABLE `liquid_coolers_sockets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `liquid_coolers_sockets_socket_id_cooler_id_unique` (`socket_id`,`cooler_id`),
  ADD KEY `liquid_coolers_sockets_cooler_id_foreign` (`cooler_id`);

--
-- Indexes for table `m2_form_factors`
--
ALTER TABLE `m2_form_factors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m2_form_factors_name_unique` (`name`);

--
-- Indexes for table `m2_ssds`
--
ALTER TABLE `m2_ssds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m2_ssds_name_unique` (`name`),
  ADD KEY `m2_ssds_brand_id_foreign` (`brand_id`),
  ADD KEY `m2_ssds_form_factor_id_foreign` (`form_factor_id`),
  ADD KEY `m2_ssds_interface_id_foreign` (`interface_id`);

--
-- Indexes for table `memory_types`
--
ALTER TABLE `memory_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `memory_types_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `motherboards_name_unique` (`name`),
  ADD KEY `motherboards_brand_id_foreign` (`brand_id`),
  ADD KEY `motherboards_form_factor_id_foreign` (`form_factor_id`),
  ADD KEY `motherboards_socket_id_foreign` (`socket_id`),
  ADD KEY `motherboards_chipset_id_foreign` (`chipset_id`),
  ADD KEY `motherboards_memory_type_id_foreign` (`memory_type_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `power_supplies`
--
ALTER TABLE `power_supplies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `power_supplies_name_unique` (`name`),
  ADD KEY `power_supplies_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `rams`
--
ALTER TABLE `rams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rams_name_unique` (`name`,`capacity`,`modules`) USING BTREE,
  ADD KEY `rams_brand_id_foreign` (`brand_id`),
  ADD KEY `rams_memory_type_id_foreign` (`memory_type_id`);

--
-- Indexes for table `sata_ssds`
--
ALTER TABLE `sata_ssds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sata_ssds_name_unique` (`name`),
  ADD KEY `sata_ssds_brand_id_foreign` (`brand_id`),
  ADD KEY `sata_ssds_interface_id_foreign` (`interface_id`);

--
-- Indexes for table `sockets`
--
ALTER TABLE `sockets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sockets_name_unique` (`name`),
  ADD KEY `sockets_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `storage_interfaces`
--
ALTER TABLE `storage_interfaces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `storage_interfaces_name_unique` (`name`);

--
-- Indexes for table `storage_interfaces_motherboards`
--
ALTER TABLE `storage_interfaces_motherboards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_name_interface_board_name_form_factor` (`interface_id`,`board_id`,`name`,`m2_form_factors`),
  ADD KEY `storage_interfaces_motherboards_board_id_foreign` (`board_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `air_coolers`
--
ALTER TABLE `air_coolers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `air_coolers_sockets`
--
ALTER TABLE `air_coolers_sockets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `case_fans`
--
ALTER TABLE `case_fans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_form_factors`
--
ALTER TABLE `case_form_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_mb_size_support`
--
ALTER TABLE `case_mb_size_support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chipsets`
--
ALTER TABLE `chipsets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cpus`
--
ALTER TABLE `cpus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expansion_slots`
--
ALTER TABLE `expansion_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expansion_slots_motherboards`
--
ALTER TABLE `expansion_slots_motherboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_factors`
--
ALTER TABLE `form_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gpus`
--
ALTER TABLE `gpus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `graphic_memory_types`
--
ALTER TABLE `graphic_memory_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hard_drives`
--
ALTER TABLE `hard_drives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `liquid_coolers`
--
ALTER TABLE `liquid_coolers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `liquid_coolers_sockets`
--
ALTER TABLE `liquid_coolers_sockets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `m2_form_factors`
--
ALTER TABLE `m2_form_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m2_ssds`
--
ALTER TABLE `m2_ssds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memory_types`
--
ALTER TABLE `memory_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `motherboards`
--
ALTER TABLE `motherboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `power_supplies`
--
ALTER TABLE `power_supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rams`
--
ALTER TABLE `rams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sata_ssds`
--
ALTER TABLE `sata_ssds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sockets`
--
ALTER TABLE `sockets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `storage_interfaces`
--
ALTER TABLE `storage_interfaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storage_interfaces_motherboards`
--
ALTER TABLE `storage_interfaces_motherboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `air_coolers`
--
ALTER TABLE `air_coolers`
  ADD CONSTRAINT `air_coolers_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `air_coolers_sockets`
--
ALTER TABLE `air_coolers_sockets`
  ADD CONSTRAINT `air_coolers_sockets_cooler_id_foreign` FOREIGN KEY (`cooler_id`) REFERENCES `air_coolers` (`id`),
  ADD CONSTRAINT `air_coolers_sockets_socket_id_foreign` FOREIGN KEY (`socket_id`) REFERENCES `sockets` (`id`);

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `cases_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `case_form_factors` (`id`);

--
-- Constraints for table `case_fans`
--
ALTER TABLE `case_fans`
  ADD CONSTRAINT `case_fans_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `case_mb_size_support`
--
ALTER TABLE `case_mb_size_support`
  ADD CONSTRAINT `case_mb_size_support_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `case_mb_size_support_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `form_factors` (`id`);

--
-- Constraints for table `chipsets`
--
ALTER TABLE `chipsets`
  ADD CONSTRAINT `chipsets_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `cpus`
--
ALTER TABLE `cpus`
  ADD CONSTRAINT `cpus_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `cpus_memory2_id_foreign` FOREIGN KEY (`memory2_id`) REFERENCES `memory_types` (`id`),
  ADD CONSTRAINT `cpus_memory_id_foreign` FOREIGN KEY (`memory_id`) REFERENCES `memory_types` (`id`),
  ADD CONSTRAINT `cpus_socket_id_foreign` FOREIGN KEY (`socket_id`) REFERENCES `sockets` (`id`);

--
-- Constraints for table `expansion_slots_motherboards`
--
ALTER TABLE `expansion_slots_motherboards`
  ADD CONSTRAINT `expansion_slots_motherboards_motherboard_id_foreign` FOREIGN KEY (`motherboard_id`) REFERENCES `motherboards` (`id`),
  ADD CONSTRAINT `expansion_slots_motherboards_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `expansion_slots` (`id`);

--
-- Constraints for table `gpus`
--
ALTER TABLE `gpus`
  ADD CONSTRAINT `gpus_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `gpus_expansion_slot_id_foreign` FOREIGN KEY (`expansion_slot_id`) REFERENCES `expansion_slots` (`id`),
  ADD CONSTRAINT `gpus_vram_id_foreign` FOREIGN KEY (`vram_id`) REFERENCES `graphic_memory_types` (`id`);

--
-- Constraints for table `hard_drives`
--
ALTER TABLE `hard_drives`
  ADD CONSTRAINT `hard_drives_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `hard_drives_interface_id_foreign` FOREIGN KEY (`interface_id`) REFERENCES `storage_interfaces` (`id`);

--
-- Constraints for table `liquid_coolers`
--
ALTER TABLE `liquid_coolers`
  ADD CONSTRAINT `liquid_coolers_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `liquid_coolers_sockets`
--
ALTER TABLE `liquid_coolers_sockets`
  ADD CONSTRAINT `liquid_coolers_sockets_cooler_id_foreign` FOREIGN KEY (`cooler_id`) REFERENCES `liquid_coolers` (`id`),
  ADD CONSTRAINT `liquid_coolers_sockets_socket_id_foreign` FOREIGN KEY (`socket_id`) REFERENCES `sockets` (`id`);

--
-- Constraints for table `m2_ssds`
--
ALTER TABLE `m2_ssds`
  ADD CONSTRAINT `m2_ssds_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `m2_ssds_form_factor_id_foreign` FOREIGN KEY (`form_factor_id`) REFERENCES `m2_form_factors` (`id`),
  ADD CONSTRAINT `m2_ssds_interface_id_foreign` FOREIGN KEY (`interface_id`) REFERENCES `storage_interfaces` (`id`);

--
-- Constraints for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD CONSTRAINT `motherboards_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `motherboards_chipset_id_foreign` FOREIGN KEY (`chipset_id`) REFERENCES `chipsets` (`id`),
  ADD CONSTRAINT `motherboards_form_factor_id_foreign` FOREIGN KEY (`form_factor_id`) REFERENCES `form_factors` (`id`),
  ADD CONSTRAINT `motherboards_memory_type_id_foreign` FOREIGN KEY (`memory_type_id`) REFERENCES `memory_types` (`id`),
  ADD CONSTRAINT `motherboards_socket_id_foreign` FOREIGN KEY (`socket_id`) REFERENCES `sockets` (`id`);

--
-- Constraints for table `power_supplies`
--
ALTER TABLE `power_supplies`
  ADD CONSTRAINT `power_supplies_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `rams`
--
ALTER TABLE `rams`
  ADD CONSTRAINT `rams_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `rams_memory_type_id_foreign` FOREIGN KEY (`memory_type_id`) REFERENCES `memory_types` (`id`);

--
-- Constraints for table `sata_ssds`
--
ALTER TABLE `sata_ssds`
  ADD CONSTRAINT `sata_ssds_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `sata_ssds_interface_id_foreign` FOREIGN KEY (`interface_id`) REFERENCES `storage_interfaces` (`id`);

--
-- Constraints for table `sockets`
--
ALTER TABLE `sockets`
  ADD CONSTRAINT `sockets_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `storage_interfaces_motherboards`
--
ALTER TABLE `storage_interfaces_motherboards`
  ADD CONSTRAINT `storage_interfaces_motherboards_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `motherboards` (`id`),
  ADD CONSTRAINT `storage_interfaces_motherboards_interface_id_foreign` FOREIGN KEY (`interface_id`) REFERENCES `storage_interfaces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
