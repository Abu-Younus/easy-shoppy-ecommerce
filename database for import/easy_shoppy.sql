-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 09:53 AM
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
-- Database: `easy_shoppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `product_attribute_id`, `product_id`, `value`, `created_at`, `updated_at`) VALUES
(142, 1, 4, '6.7 inches', '2023-08-10 05:11:18', '2023-08-10 05:11:18'),
(143, 1, 4, ' 5.7 inches', '2023-08-10 05:11:18', '2023-08-10 05:11:18'),
(144, 3, 4, 'White', '2023-08-10 05:11:18', '2023-08-10 05:11:18'),
(145, 3, 4, 'Black', '2023-08-10 05:11:18', '2023-08-10 05:11:18'),
(146, 3, 4, 'Purple', '2023-08-10 05:11:18', '2023-08-10 05:11:18'),
(147, 3, 4, 'Gold', '2023-08-10 05:11:18', '2023-08-10 05:11:18'),
(148, 1, 3, '32', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(149, 1, 3, '42', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(150, 1, 3, '48', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(151, 1, 3, '52', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(152, 3, 3, 'blue', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(153, 3, 3, 'black', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(154, 3, 3, 'grey', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(155, 3, 3, 'darkgrey', '2023-08-10 05:19:52', '2023-08-10 05:19:52'),
(156, 3, 2, 'Golden', '2023-08-10 05:21:01', '2023-08-10 05:21:01'),
(157, 3, 2, 'Sky Blue', '2023-08-10 05:21:01', '2023-08-10 05:21:01'),
(158, 3, 2, 'Purple Blue', '2023-08-10 05:21:01', '2023-08-10 05:21:01'),
(159, 1, 1, '6.7 inches', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(160, 1, 1, ' 6.1 inches', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(161, 3, 1, 'Phantom Black', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(162, 3, 1, ' White', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(163, 3, 1, ' Burgundy', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(164, 3, 1, ' Green', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(165, 3, 1, ' Graphite', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(166, 3, 1, ' Red', '2023-08-10 05:21:45', '2023-08-10 05:21:45'),
(167, 3, 1, ' Sky Blue', '2023-08-10 05:21:46', '2023-08-10 05:21:46'),
(168, 3, 1, ' Bora Purple', '2023-08-10 05:21:46', '2023-08-10 05:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `published_date` varchar(255) NOT NULL,
  `schedule` tinyint(1) NOT NULL DEFAULT 0,
  `current` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `title`, `slug`, `description`, `image`, `tags`, `published_date`, `schedule`, `current`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Campaigns', 'campaigns', '<p>A successful ecommerce marketing campaign strategy&nbsp;aims to bring raise brand awareness, turn leads into customers, build a loyal customer base and grow their revenue without having to burn money all the time.</p>', '1691344006.png', 'campaigns, offers, ecommerce', '2023-08-13 10:00 AM', 1, 0, 1, '2023-08-06 17:46:46', '2023-08-08 08:52:50'),
(4, 3, 'Coupons', 'coupons', '<p>A successful ecommerce marketing campaign strategy&nbsp;aims to bring raise brand awareness, turn leads into customers, build a loyal customer base and grow their revenue without having to burn money all the time.</p>', '1691344413.png', 'coupons, offers, ecommerce', '2023-08-06 11:53 PM', 0, 1, 1, '2023-08-06 17:53:33', '2023-08-06 17:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Offers', 'offers', 1, '2023-08-06 17:44:59', '2023-08-06 17:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Samsung', 'samsung', '2022-12-27 09:45:41', '2023-02-18 16:15:50', '1676736949.png'),
(3, 'Apple', 'apple', '2022-12-27 09:46:06', '2023-02-18 16:18:51', '1676737131.png'),
(4, 'Dell', 'dell', '2022-12-27 09:46:56', '2023-02-18 16:26:38', '1676737597.png'),
(5, 'Asus', 'asus', '2022-12-27 09:47:13', '2023-02-18 16:27:48', '1676737667.png'),
(6, 'Acer', 'acer', '2022-12-27 09:47:19', '2023-02-18 16:27:27', '1676737645.png'),
(7, 'Intel', 'intel', '2022-12-27 09:48:09', '2023-02-18 16:29:37', '1676737777.png'),
(9, 'Xaiomi', 'xaiomi', '2023-01-28 16:06:46', '2023-02-18 16:13:56', '1676736833.png'),
(10, 'Vivo', 'vivo', '2023-02-18 16:10:18', '2023-02-18 16:22:18', '1676737337.png');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `discount` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `slug`, `subtitle`, `start_date`, `end_date`, `image`, `discount`, `status`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 'September Month Flash Offer', 'september-month-flash-offer', NULL, '2023-09-01', '2023-09-30', '1694406846.jpg', '15', 1, 'September', '2023', '2023-07-30 04:53:11', '2023-09-11 04:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_products`
--

CREATE TABLE `campaign_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_products`
--

INSERT INTO `campaign_products` (`id`, `campaign_id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 39941.50, '2023-09-12 04:05:32', '2023-09-12 04:05:32'),
(4, 2, 4, 141525.00, '2023-09-12 04:06:06', '2023-09-12 04:06:06'),
(5, 2, 2, 40799.15, '2023-09-12 04:06:28', '2023-09-12 04:06:28'),
(6, 2, 1, 42499.15, '2023-09-12 04:06:47', '2023-09-12 04:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `category_views` int(11) DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `category_views`, `active_status`, `created_at`, `updated_at`) VALUES
(4, 'Electronics', 'electronics', '1675615173.jpg', 34, 1, '2022-11-03 22:54:32', '2023-11-13 04:43:53'),
(5, 'Fashions', 'fashions', '1675615141.png', 3, 1, '2022-11-03 22:54:59', '2023-08-28 07:11:35'),
(6, 'Watches', 'watches', '1675614846.jpg', 2, 1, '2022-11-03 22:55:28', '2023-08-23 05:48:16'),
(7, 'Wear', 'wear', '1675614675.jpg', 27, 1, '2022-11-03 22:55:44', '2023-09-10 10:22:33'),
(10, 'Mobile', 'mobile', '1675614340.png', 55, 1, '2022-11-04 05:20:19', '2023-11-13 04:44:10'),
(11, 'Appliances', 'appliances', '1675614366.png', 2, 1, '2023-02-04 18:10:01', '2023-08-23 05:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 10, 12, 'iphone 14', 'iphone-14', '2023-02-04 17:33:52', '2023-02-04 17:33:52'),
(2, 10, 12, 'Iphone 13', 'iphone-13', '2023-02-05 15:23:25', '2023-02-05 15:23:25'),
(5, 7, 2, 'Jeans', 'jeans', '2023-02-05 16:31:58', '2023-02-05 16:31:58'),
(6, 7, 2, 'T-Shirt', 't-shirt', '2023-02-05 16:32:47', '2023-02-05 16:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `is_reply` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `is_reply`, `created_at`, `updated_at`) VALUES
(1, 'Md. Abu Younus', 'sanvolmunna33@gmail.com', '01647447774', 'This is test comment.', 1, '2022-12-14 08:15:33', '2023-08-13 10:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_replies`
--

CREATE TABLE `contact_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_message` text NOT NULL,
  `reply_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_replies`
--

INSERT INTO `contact_replies` (`id`, `contact_id`, `reply_message`, `reply_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thanks for feedback.', '2023-08-13 4:34 PM', '2023-08-13 10:34:24', '2023-08-13 10:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('fixed','percent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(2, 'OFF100', 'fixed', 100.00, 1500.00, '2022-11-12 00:35:03', '2022-11-12 09:57:24', '2023-11-01'),
(3, 'OFF20P', 'percent', 20.00, 2000.00, '2022-11-12 09:48:21', '2022-12-23 09:40:37', '2022-12-30');

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
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_products`, `created_at`, `updated_at`) VALUES
(1, '4,5,6,7,10,11', 8, '2022-11-10 15:40:37', '2023-07-26 05:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `price`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Slider Title', 'Slider Sub Title', 500.00, 'http://127.0.0.1:8000/shop', '1668012695.jpg', 1, '2022-11-09 10:38:27', '2022-11-09 10:51:35'),
(3, 'Slider Title 1', 'Slider Sub Title 1', 350.00, 'http://127.0.0.1:8000/shop', '1668012756.jpg', 1, '2022-11-09 10:38:50', '2022-11-09 10:52:36');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_18_184412_create_sessions_table', 1),
(7, '2022_10_19_164224_create_categories_table', 2),
(8, '2022_11_04_050056_create_subcategories_table', 3),
(9, '2022_11_04_120917_create_products_table', 4),
(10, '2022_11_08_180144_create_home_sliders_table', 5),
(11, '2022_11_10_152913_create_home_categories_table', 6),
(12, '2022_11_11_055557_create_sales_table', 7),
(13, '2022_11_11_185109_create_coupons_table', 8),
(14, '2022_11_12_105841_add_expiry_date_to_coupons_table', 9),
(15, '2022_11_12_160401_create_orders_table', 10),
(16, '2022_11_12_160537_create_order_items_table', 10),
(17, '2022_11_12_160810_create_shippings_table', 10),
(18, '2022_11_12_160959_create_transactions_table', 10),
(19, '2022_12_10_071816_add_delivered_canceled_date_to_orders_table', 11),
(20, '2022_12_10_182958_create_reviews_table', 12),
(21, '2022_12_10_185123_add_rstatus_to_order_items_table', 12),
(22, '2022_12_13_194904_create_contacts_table', 13),
(23, '2022_12_14_181326_create_settings_table', 14),
(24, '2022_12_15_203035_create_shoppingcart_table', 15),
(25, '2022_12_16_195237_create_profiles_table', 16),
(26, '2022_12_17_152050_create_product_attributes_table', 17),
(27, '2022_12_17_181159_create_attribute_values_table', 18),
(28, '2022_12_20_142732_add_options_to_order_items_table', 19),
(29, '2022_12_26_193112_create_brands_table', 20),
(30, '2022_12_26_193533_add_brand_id_to_products_table', 20),
(31, '2022_12_27_183631_add_images_to_reviews_table', 21),
(32, '2022_12_28_153656_add_product_id_to_reviews_table', 22),
(33, '2022_12_28_161346_add_user_id_to_reviews_table', 22),
(34, '2022_12_30_105104_add_product_views_to_products_table', 23),
(35, '2022_12_30_105853_add_image_to_brands_table', 23),
(36, '2022_12_31_191431_create_product_specifications_table', 24),
(37, '2022_12_31_191659_create_specification_values_table', 24),
(38, '2023_01_03_154417_add_is_specification_to_products_table', 25),
(39, '2023_01_24_003614_create_seos_table', 26),
(40, '2023_01_24_004031_create_smtps_table', 26),
(41, '2023_01_24_004336_create_pages_table', 26),
(42, '2023_01_26_001929_create_pickup_points_table', 27),
(43, '2023_01_26_002119_create_warehouses_table', 27),
(44, '2023_01_26_232757_create_child_categories_table', 28),
(45, '2023_01_26_233328_add_warehouse_id_to_products_table', 28),
(46, '2023_01_26_233545_add_pickup_point_id_to_products_table', 28),
(47, '2023_01_26_234107_add_childcategory_id_to_products_table', 29),
(48, '2023_02_03_123733_add_user_id_to_order_items_table', 30),
(49, '2023_07_16_152323_create_campaigns_table', 31),
(50, '2023_07_23_115006_create_website_reviews_table', 32),
(51, '2023_07_23_154136_create_news_letters_table', 33),
(52, '2023_07_24_153414_create_open_tickets_table', 34),
(53, '2023_07_25_101353_create_ticket_replies_table', 35),
(54, '2023_07_31_105405_add_user_id_ticket_replies_table', 36),
(55, '2023_08_02_121504_add_ordered_packed_shipped_refund_date_orders_table', 37),
(56, '2023_08_02_153514_create_product_questions_table', 38),
(57, '2023_08_04_174240_create_return_products_table', 39),
(58, '2023_08_06_201715_create_blog_categories_table', 40),
(59, '2023_08_06_201841_create_blogs_table', 40),
(60, '2023_08_13_161046_create_contact_replies_table', 41),
(61, '2023_08_20_070138_add_socialite_login_provider_to_users_table', 42),
(62, '2023_09_05_143620_create_question_replies_table', 43),
(63, '2023_09_11_153726_create_campaign_products_table', 44);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'younus.cse.ict@gmail.com', '2023-07-23 09:58:29', '2023-07-23 09:58:29'),
(2, 'sanvolmunna33@gmail.com', '2023-07-23 10:32:16', '2023-07-23 10:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `open_tickets`
--

CREATE TABLE `open_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `open_tickets`
--

INSERT INTO `open_tickets` (`id`, `user_id`, `subject`, `service`, `priority`, `message`, `image`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 'Personal opinion', 'return', 'medium', 'Easy Shoppy is one of the best ecommerce service.', '1690199346.jpg', 1, '2023-07-24', '2023-07-24 11:49:06', '2023-07-31 08:20:25'),
(2, 3, 'Refund of product amount', 'refund', 'medium', 'Refund of product return.', '1690792004.jpg', 0, '2023-07-31', '2023-07-31 08:26:44', '2023-07-31 08:37:48'),
(3, 2, 'Your product technical problem', 'technical', 'high', 'Your website ordered product is few technical issue.', '1690792143.png', 0, '2023-07-31', '2023-07-31 08:29:04', '2023-07-31 08:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `status` enum('pending','ordered','packed','shipped','delivered','refund','canceled') NOT NULL DEFAULT 'pending',
  `payment_mode` enum('cod','card','bkash') DEFAULT NULL,
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `is_return_order` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  `ordered_date` date DEFAULT NULL,
  `packed_date` date DEFAULT NULL,
  `shipped_date` date DEFAULT NULL,
  `refund_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `subtotal`, `discount`, `tax`, `total`, `first_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `state`, `country`, `zipcode`, `status`, `payment_mode`, `is_shipping_different`, `is_return_order`, `created_at`, `updated_at`, `delivered_date`, `canceled_date`, `ordered_date`, `packed_date`, `shipped_date`, `refund_date`) VALUES
(31, 3, '25642524', 166500.00, 0.00, 16650.00, 183150.00, 'Md.', 'Younus', '01647447774', 'younus.cse.ict@gmail.com', '01581003804', NULL, 'Khulna', 'Khulna', 'Bangladesh', '9100', 'refund', 'cod', 0, 1, '2023-07-31 09:18:08', '2023-08-04 12:50:22', '2023-08-03', NULL, '2023-07-31', '2023-08-01', '2023-08-01', '2023-08-04'),
(33, 3, '30260156', 49999.00, 0.00, 4999.90, 54998.90, 'Md.', 'Younus', '01647447774', 'younus.cse.ict@gmail.com', 'House No-264, 9 No. Road, 2nd Phase, Sonadanga R/A, Sonadanga, Khulna.', NULL, 'Khulna', 'Khulna', 'Bangladesh', '9100', 'pending', 'cod', 0, 0, '2023-08-24 09:01:52', '2023-08-24 09:01:52', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 3, '59240676', 49999.00, 0.00, 4999.90, 54998.90, 'Md.', 'Younus', '01647447774', 'younus.cse.ict@gmail.com', 'House No-264, 9 No. Road, 2nd Phase, Sonadanga R/A, Sonadanga, Khulna.', NULL, 'Khulna', 'Khulna', 'Bangladesh', '9100', 'pending', 'cod', 0, 0, '2023-09-03 11:16:33', '2023-09-03 11:16:33', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 3, '73459410', 47999.00, 0.00, 4799.90, 52798.90, 'Abu', 'Younus', '01647447774', 'younus.cse.ict@gmail.com', '2nd Phase, Sonadanga R/A, Sonadanga, Khulna', NULL, 'Khulna', 'Khulna', 'Bangladesh', '9100', 'pending', 'cod', 0, 0, '2023-11-11 18:23:36', '2023-11-11 18:23:36', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 3, '95641448', 214499.00, 0.00, 21449.90, 235948.90, 'Abu', 'Younus', '01647447774', 'younus.cse.ict@gmail.com', '2nd Phase, Sonadanga R/A, Sonadanga, Khulna.', NULL, 'Khulna', 'Khulna', 'Bangladesh', '9100', 'pending', 'cod', 0, 0, '2023-11-13 05:13:29', '2023-11-13 05:13:29', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `rstatus`, `options`, `user_id`) VALUES
(35, 4, 31, 166500.00, 1, '2023-07-31 09:18:08', '2023-08-02 10:14:34', 1, 'O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:2:{s:4:\"Size\";s:11:\" 5.7 inches\";s:5:\"Color\";s:5:\"Black\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3),
(37, 1, 33, 49999.00, 1, '2023-08-24 09:01:52', '2023-08-24 09:01:52', 0, 'O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:2:{s:4:\"Size\";s:10:\"6.7 inches\";s:5:\"Color\";s:9:\" Sky Blue\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3),
(39, 1, 35, 49999.00, 1, '2023-09-03 11:16:33', '2023-09-03 11:16:33', 0, 'O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3),
(40, 2, 36, 47999.00, 1, '2023-11-11 18:23:36', '2023-11-11 18:23:36', 0, 'O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3),
(41, 4, 37, 166500.00, 1, '2023-11-13 05:13:29', '2023-11-13 05:13:29', 0, 'O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:2:{s:4:\"Size\";s:11:\" 5.7 inches\";s:5:\"Color\";s:5:\"Black\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3),
(42, 2, 37, 47999.00, 1, '2023-11-13 05:13:29', '2023-11-13 05:13:29', 0, 'O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `position`, `name`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Terms & Conditions', 'Terms & Conditions', 'terms-conditions', '<p><strong>A website that allows people to buy and sell physical goods, services, and digital products over the internet rather than at a brick-and-mortar location</strong>. Through an e-commerce website, a business can process orders, accept payments, manage shipping and logistics, and provide customer service.</p>', '2023-01-24 18:13:34', '2023-01-24 18:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('younus.cse.ict@gmail.com', '$2y$10$6YOQELdbC2iX1CShMdAgse2OS7CayQQtCB8Fj1o6gciEaJjeO7Som', '2023-08-09 05:30:24'),
('sanvolmunna33@gmail.com', '$2y$10$V7VOS72W3TjiqxLbdwviGeMLNNQHqAu8leFM00GXk2sOW2KaC.0Fy', '2023-08-09 06:04:44');

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
-- Table structure for table `pickup_points`
--

CREATE TABLE `pickup_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_points`
--

INSERT INTO `pickup_points` (`id`, `name`, `address`, `phone`, `phone2`, `created_at`, `updated_at`) VALUES
(1, 'Sonadanga Branch', 'Second Phase, Sonadanga R/A, Sonadanga, Khulna.', '01647447774', '01581003804', '2023-01-26 15:12:43', '2023-01-26 15:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(1000) DEFAULT NULL,
  `description` varchar(3000) NOT NULL,
  `purchase_price` decimal(8,2) DEFAULT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `discounted_price` decimal(8,2) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `today_deal` int(11) NOT NULL DEFAULT 0,
  `cash_on_delivery` int(11) NOT NULL DEFAULT 0,
  `trendy_product` int(11) NOT NULL DEFAULT 0,
  `delivery_place` varchar(255) DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_views` bigint(20) NOT NULL DEFAULT 0,
  `is_specification` tinyint(1) NOT NULL DEFAULT 0,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pickup_point_id` bigint(20) UNSIGNED DEFAULT NULL,
  `childcategory_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `short_description`, `description`, `purchase_price`, `regular_price`, `discounted_price`, `unit`, `SKU`, `featured`, `today_deal`, `cash_on_delivery`, `trendy_product`, `delivery_place`, `quantity`, `image`, `images`, `video`, `status`, `created_at`, `updated_at`, `brand_id`, `product_views`, `is_specification`, `warehouse_id`, `pickup_point_id`, `childcategory_id`) VALUES
(1, 10, 24, 'Samsung Galaxy S22 Ultra 5G', 'samsung-galaxy-s22-ultra-5g', '<p><strong><em>Samsung Galaxy S22 Ultra</em> 5G</strong> &middot; Released 2022, February 25 &middot; 228g / 229g (mmWave), 8.9mm thickness &middot; Android 12, up to Android 13, One UI 5 &middot; 128GB/256GB/1TB storage.</p>', '<p><strong><em>Samsung Galaxy S22 Ultra</em> 5G</strong> &middot; Released 2022, February 25 &middot; 228g / 229g (mmWave), 8.9mm thickness &middot; Android 12, up to Android 13, One UI 5 &middot; 128GB/256GB/1TB storage.</p>', 45999.00, 49999.00, 49499.00, 'pcs', 'galaxys225g', 1, 0, 1, 0, 'All Bangladesh', 148, '1691644904.jpg', ',16916449040.jpg,16916449051.jpg', '', 1, '2022-11-04 14:42:16', '2023-09-13 05:17:15', 2, 621, 1, 1, 1, NULL),
(2, 10, 23, 'Vivo V25 5G', 'vivo-v25-5g', '<p>Vivo V25 5G comes with 6.44 inches Full HD+ AMOLED screen. It has a waterdrop notch front camera design. The back camera is of triple 64+8+2 MP with PDAF, OIS, ultrawide, macro lens, LED flash etc. and 4K video recording.</p>', '<p>Vivo V25 5G comes with 6.44 inches Full HD+ AMOLED screen. It has a waterdrop notch front camera design. The back camera is of triple 64+8+2 MP with PDAF, OIS, ultrawide, macro lens, LED flash etc. and 4K video recording.</p>', 43999.00, 47999.00, 47499.00, 'pcs', 'vivov255g', 1, 0, 1, 0, 'All Bangladesh', 158, '1691644860.jpg', NULL, '', 1, '2022-11-11 04:41:50', '2023-11-13 05:13:30', 10, 22, 1, 1, 1, NULL),
(3, 4, 7, 'Xiaomi Mi 4S L43M5-5ASP 43 Inch 4K UHD Android Smart TV with Netflix (Global Version)', 'xiaomi-mi-4s-l43m5-5asp-43-inch-4k-uhd-android-smart-tv-with-netflix-global-version', '<h2>Key Features</h2>\n<ul>\n<li>Model: Mi 4S</li>\n<li>MI Universal Remote Support Google Home</li>\n<li>43\" UHD 4K (3840 x 2160) Display</li>\n<li>Dolby + DTS Sound System</li>\n<li>RAM: 2 GB, Storage: 8GB</li>\n</ul>', '<p>The new Xiaomi Mi 4S&nbsp;43 \"4K Ultra HD Smart TV Android OS LED is one of the largest TVs of the Chinese brand. It has one of the most interesting resolutions, with a size of 43 inches, you will be able to see everything you want, enjoying it. Also, the new Xiaomi TV has 4K HDR resolutions, which provide great clarity. Another of the most attractive sections of the new Xiaomi Mi 4S&nbsp;43 \"4K UltraHD Smart TV Android OS LED is its incredible connectivity.</p>', 39990.00, 46990.00, 45990.00, 'pcs', 'xiaomimi43', 0, 0, 0, 0, NULL, 120, '1691644791.jpg', ',16916447910.jpg,16916447921.jpg', '', 1, '2022-12-17 13:48:17', '2023-09-12 04:26:42', 9, 36, 1, 1, 1, NULL),
(4, 10, 12, '2022 Global Version i14 Pro Max 5G Smartphone 12G+512GB 6.7 inch Cellular 6800mAh Phone 5G Network 50MP Unlocked Dual SIM Phone', '2022-global-version-i14-pro-max-5g-smartphone-12g512gb-67-inch-cellular-6800mah-phone-5g-network-50mp-unlocked-dual-sim-phone', '<h3 class=\"heading--1cooZo6n heading--h3--23mHEuMI\">Features</h3>\n<ul>\n<li>5.7 and 6.7-inch sizes</li>\n<li>No notch</li>\n<li>Dynamic Island camera cutout</li>\n<li>A16 chip</li>\n<li>Qualcomm X65 modem</li>\n<li>Satellite connectivity</li>\n</ul>', '<p>Announced on September 7, the iPhone 14 Pro and iPhone 14 Pro Max are Apple\'s new high-end flagship smartphones, being sold alongside the lower-cost iPhone 14 and iPhone 14 Plus. The iPhone 14 Pro models are much more feature rich than the iPhone 14 models, offering camera technology improvements, better display capabilities, a faster A16 chip, and more.</p>\n<p>The <strong>5.7&nbsp;and 6.7-inch</strong>&nbsp;iPhone 14 Pro models look like the iPhone 13 Pro models with&nbsp;<strong>flat edges</strong>,&nbsp;<strong>stainless steel enclosure</strong>, a&nbsp;<strong>textured matte glass back</strong>,&nbsp;<strong>IP68 water resistance</strong>, and a&nbsp;<strong>Ceramic Shield</strong>-protected display, but the camera bumps are larger to accommodate new lenses, and the display has also changed.</p>\n<p>There is&nbsp;<strong>no longer a notch</strong>&nbsp;for the TrueDepth camera system, with Apple instead adopting what it calls the&nbsp;<strong>Dynamic Island</strong>, a pill-shaped cutout at the front of the display that houses camera equipment and can&nbsp;<strong>change in shape and size using software</strong>&nbsp;depending on what\'s on the screen.</p>\n<p>Apple says the Dynamic Island is meant to&nbsp;<strong>blend the line between hardware and software</strong>. It is able to&nbsp;<strong>adapt in real time</strong>, showing alerts, notifications, and activities in the space where the notch used to be. There is still hardware under there, but the TrueDepth camera takes up less space and the Dynamic Island makes it blend into the background by taking better advantage of the screen. The Dynamic Island can show payment confirmations with Face ID, Maps directions, phone calls, music information, Live Activities like sports scores, timers, and more, plus it can be interacted with using a tap and hold gesture.</p>\n<p>The iPhone 14 Pro and Pro Max feature a new&nbsp;<strong>Super Retina XDR display</strong>&nbsp;with&nbsp;<strong>updated ProMotion technology</strong>&nbsp;that allows for an&nbsp;<strong>Always-On display</strong>, a first for an iPhone. The Always-On display is made possible through a new&nbsp;<strong>1Hz to 120Hz refresh rate</strong>&nbsp;along with improved power efficient technologies. When the Always-On display is active, the&nbsp;<strong>time, widgets, and Live Activities</strong>&nbsp;remain available at a glance at all times, and the wallpaper is dimmed.</p>\n<p>In addition to Always-On technology, the iPhone 14 Pro\'s Super Retina XDR display offers&nbsp;<strong>higher peak HDR brightness</strong>&nbsp;at&nbsp;<strong>up to 2000 nits</strong>, which puts it on par with the Pro Display XDR. It offers the highest outdoor peak brightness in a smartphone, and it is&nbsp;<strong>twice as bright as the iPhone 13 Pro</strong>&nbsp;when in sunny conditions.</p>', 150000.00, 166500.00, 164500.00, 'pcs', 'iphonemax14', 1, 0, 1, 0, 'All Bangladesh', 148, '1691644276.jpg', ',16916442760.jpg,16916442761.jpg,16916442772.jpg,16916442773.jpg,16916442774.jpg,16916442775.jpg,16916442776.jpg,16916442777.jpg,16916442778.jpg,16916442789.jpg,169164427810.jpg', '', 1, '2022-12-25 09:50:13', '2023-11-13 05:19:25', 3, 241, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2022-12-17 09:55:16', '2022-12-17 09:55:16'),
(3, 'Color', '2022-12-17 10:09:12', '2023-07-26 08:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_questions`
--

CREATE TABLE `product_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text DEFAULT NULL,
  `is_reply` tinyint(1) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_questions`
--

INSERT INTO `product_questions` (`id`, `user_id`, `product_id`, `question`, `is_reply`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'ai product ki dhaka te cash on delivery available.', 1, '2023-08-02', '2023-08-02 10:26:30', '2023-09-05 09:01:35'),
(7, 3, 1, 'mobile ta ki official.', 1, '2023-09-10', '2023-09-10 05:34:47', '2023-09-10 05:38:37'),
(8, 3, 1, 'mobile ta koi diner modde cash on delivery deya jabe.', 1, '2023-09-10', '2023-09-10 05:36:03', '2023-09-10 05:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Network', '2023-01-02 09:23:02', '2023-08-09 09:24:06'),
(2, 'Launch', '2023-01-02 09:24:43', '2023-01-02 09:24:43'),
(3, 'Body', '2023-01-02 09:25:06', '2023-01-02 09:25:06'),
(4, 'Display', '2023-01-02 09:25:20', '2023-01-02 09:25:20'),
(5, 'Platform', '2023-01-02 09:25:27', '2023-01-02 09:25:27'),
(6, 'Memory', '2023-01-02 09:25:41', '2023-01-02 09:25:41'),
(7, 'Main Camera', '2023-01-02 09:25:58', '2023-01-02 09:25:58'),
(8, 'Selfie Camera', '2023-01-02 09:26:07', '2023-01-02 09:26:07'),
(9, 'Sound', '2023-01-02 09:26:15', '2023-01-02 09:26:15'),
(10, 'COMMS', '2023-01-02 09:26:37', '2023-01-02 09:47:38'),
(11, 'Features', '2023-01-02 09:26:58', '2023-01-02 09:26:58'),
(12, 'Battery', '2023-01-02 09:27:08', '2023-01-02 09:27:08'),
(13, 'MISC', '2023-01-02 09:27:19', '2023-01-02 09:27:19'),
(15, 'Tests', '2023-01-02 09:45:05', '2023-01-02 09:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `line1` varchar(255) DEFAULT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `mobile`, `line1`, `line2`, `city`, `state`, `country`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 2, '1674214811.jpg', '01647447774', 'Sonadanga Abashik 2nd Paige, 3 No. Road, Sonadanga, Khulna.', 'Sonadanga Abashik 2nd Paige, 3 No. Road, Sonadanga, Khulna.', 'Khulna', 'Khulna', 'Bangladesh', '9100', '2022-12-16 14:51:02', '2023-01-20 05:40:11'),
(2, 3, '1690973070.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-04 11:30:26', '2023-08-02 10:44:30'),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-02 08:20:40', '2023-08-02 08:20:40'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09 08:13:07', '2023-08-09 08:13:07'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09 08:21:09', '2023-08-09 08:21:09'),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09 09:42:28', '2023-08-09 09:42:28'),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-13 04:28:14', '2023-08-13 04:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `question_replies`
--

CREATE TABLE `question_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_replies`
--

INSERT INTO `question_replies` (`id`, `product_question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yes, Available.', '2023-09-05 09:01:35', '2023-09-05 09:01:35'),
(2, 7, 'Ha, Official.', '2023-09-10 05:38:37', '2023-09-10 05:38:37'),
(3, 8, '4-5 diner modde peye jaben.', '2023-09-10 05:42:00', '2023-09-10 05:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `return_reason` text NOT NULL,
  `return_payment` enum('bkash','nagad','account') NOT NULL,
  `bkash_number` varchar(255) DEFAULT NULL,
  `nagad_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_products`
--

INSERT INTO `return_products` (`id`, `user_id`, `order_id`, `return_reason`, `return_payment`, `bkash_number`, `nagad_number`, `bank_name`, `account_number`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 3, 31, 'This product is some technical issue.', 'bkash', '01647447774', NULL, NULL, NULL, '2023-08-04', '2023-08-04 12:50:22', '2023-08-04 12:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` text DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `order_item_id`, `created_at`, `updated_at`, `images`, `product_id`, `user_id`) VALUES
(8, 5, 'This product is really nice.', 35, '2023-08-02 10:14:34', '2023-08-02 10:14:34', NULL, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-09-14 11:59:59', 1, '2022-11-11 06:10:25', '2023-09-12 09:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `meta_tags` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `google_verification` varchar(255) DEFAULT NULL,
  `google_analytics` varchar(255) DEFAULT NULL,
  `google_adsense` varchar(255) DEFAULT NULL,
  `alexa_verification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tags`, `meta_description`, `meta_keyword`, `google_verification`, `google_analytics`, `google_adsense`, `alexa_verification`, `created_at`, `updated_at`) VALUES
(1, 'Easy Shoppy Online Shop', 'Easy Shoppy Team', 'online shop, online market, ecommerce, shoppy, easy shoppy', '<p><strong>A website that allows people to buy and sell physical goods, services, and digital products over the internet rather than at a brick-and-mortar location</strong>. Through an e-commerce website, a business can process orders, accept payments, manage shipping and logistics, and provide customer service.</p>', 'online shop, online market, ecommerce, shoppy, easy shoppy', NULL, NULL, NULL, NULL, '2023-01-23 19:04:39', '2023-01-24 18:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JChHuQazAPrzFqgOTH5xFsVaaNt2nGV0CdHuBT8J', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaWlGYkZzblJOaUZaU0hkM1hDb3V5U3VrVVdab0MzdEwxbnBVaVRITCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2NhdGVnb3JpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiY2FydCI7YTozOntzOjQ6ImNhcnQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6ODoid2lzaGxpc3QiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6MTI6InNhdmVGb3JMYXRlciI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fX0=', 1700117484);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `support_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `map` varchar(500) DEFAULT NULL,
  `twiter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currency`, `email`, `support_email`, `phone`, `phone2`, `address`, `logo`, `favicon`, `map`, `twiter`, `facebook`, `pinterest`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '৳', 'mdabuyounus30@gmail.com', 'munnapatiya@hotmail.com', '01647447774', '01581003804', 'Sonadanga, Khulna', '1691661074.png', '1691656315.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29419.001926327837!2d89.51724503683907!3d22.825602648480604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9ab96e0f8897%3A0x9d77b9c214396364!2z4Ka44KeL4Kao4Ka-4Kah4Ka-4KaZ4KeN4KaX4Ka-LCDgppbgp4HgprLgpqjgpr4!5e0!3m2!1sbn!2sbd!4v1671116697094!5m2!1sbn!2sbd', '', 'https://www.facebook.com/AbuYounusMunna', NULL, 'https://www.instagram.com/abuyounusmunna', 'https://www.youtube.com/channel/UCaE1gU3lG4UKCm1t3yJeFQg', '2023-01-21 13:06:28', '2023-08-10 09:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('admin@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-08-09 10:58:21', NULL),
('admin@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-08-09 10:58:21', NULL),
('mdabuyounus30@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-09-12 10:20:41', NULL),
('mdabuyounus30@gmail.com', 'saveForLater', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-09-12 10:20:41', NULL),
('mdabuyounus30@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-09-12 10:19:58', NULL),
('sanvolmunna33@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-01-20 05:41:11', NULL),
('sanvolmunna33@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-12-30 14:14:09', NULL),
('younus.cse.ict@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"97a1fcf080d38adcd7fe7993c1a58d37\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"97a1fcf080d38adcd7fe7993c1a58d37\";s:2:\"id\";i:4;s:3:\"qty\";i:1;s:4:\"name\";s:127:\"2022 Global Version i14 Pro Max 5G Smartphone 12G+512GB 6.7 inch Cellular 6800mAh Phone 5G Network 50MP Unlocked Dual SIM Phone\";s:5:\"price\";d:166500;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:2:{s:4:\"Size\";s:11:\" 5.7 inches\";s:5:\"Color\";s:6:\"Purple\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:10;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-13 05:22:47', NULL),
('younus.cse.ict@gmail.com', 'saveForLater', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-13 05:22:47', NULL),
('younus.cse.ict@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-13 05:19:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smtps`
--

CREATE TABLE `smtps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `app_key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtps`
--

INSERT INTO `smtps` (`id`, `mailer`, `host`, `port`, `username`, `app_key`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp@gmail.com', 465, 'mdabuyounus30@gmail.com', 'xlgiurrxguixjpbe', '2023-01-25 16:36:53', '2023-07-30 09:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `specification_values`
--

CREATE TABLE `specification_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_specification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(2500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specification_values`
--

INSERT INTO `specification_values` (`id`, `product_specification_id`, `product_id`, `value`, `created_at`, `updated_at`) VALUES
(67, 1, 4, '2G bands/3G bands/4G bands/5G bands.', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(68, 2, 4, 'Launch 2022 September 07.  Released 2022 September 16.', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(69, 3, 4, '160.7 x 77.6 x 7.9 mm 240 g (8.47 oz).', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(70, 4, 4, '6.7 inches 110.2 cm2 (~88.3% screen-to-body ratio).', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(71, 5, 4, 'iOS 16 upgradable to iOS 16.2', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(72, 6, 4, '128GB 6GB RAM 256GB 6GB RAM 512GB 6GB RAM 1TB 6GB RAM.', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(73, 7, 4, '48 MP f/1.8 24mm (wide) 1/1.28\" 1.22µm dual pixel PDAF sensor-shift OIS 12 MP f/2.8 77mm (telephoto) 1/3.5\" PDAF OIS 3x optical zoom 12 MP f/2.2 13mm 120˚ (ultrawide) 1/2.55\" 1.4µm dual pixel PDAF TOF 3D LiDAR scanner (depth). Dual-LED dual-tone flash HDR (photo/panorama). 4K@24/25/30/60fps 1080p@25/30/60/120/240fps 10-bit HDR Dolby Vision HDR (up to 60fps) ProRes Cinematic mode (4K@24/30fps) stereo sound rec.', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(74, 8, 4, '12 MP f/1.9 23mm (wide) 1/3.6\" PDAF OIS (unconfirmed).', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(75, 9, 4, 'Yes. with stereo speakers', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(76, 10, 4, 'Wi-Fi 802.11 a/b/g/n/ac/6. dual-band hotspot.', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(77, 11, 4, 'Face ID; accelerometer; gyro; proximity; compass; barometer;  Ultra Wideband (UWB) support. Emergency SOS via satellite (SMS sending/receiving).', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(78, 12, 4, 'Li-Ion 4323 mAh; non-removable (16.68 Wh).', '2023-01-02 13:52:19', '2023-01-02 13:52:19'),
(79, 13, 4, 'Space Black; Silver; Gold; Deep Purple.', '2023-01-02 13:52:20', '2023-01-02 13:52:20'),
(80, 15, 4, 'AnTuTu: 955884 (v9).', '2023-01-02 13:52:20', '2023-01-02 13:52:20'),
(97, 1, 1, 'GSM / CDMA / HSPA / EVDO / LTE / 5G', '2023-01-03 12:21:22', '2023-01-03 12:21:22'),
(98, 2, 1, '163.3 x 77.9 x 8.9 mm (6.43 x 3.07 x 0.35 in).', '2023-01-03 12:21:22', '2023-01-03 12:21:22'),
(99, 3, 1, 'Dynamic AMOLED 2X, 120Hz, HDR10+, 1750 nits (peak). 6.8 inches, 114.7 cm2 (~90.2% screen-to-body ratio). 1440 x 3088 pixels (~500 ppi density). Corning Gorilla Glass Victus+;', '2023-01-03 12:21:22', '2023-01-03 12:21:22'),
(100, 4, 1, 'Dynamic AMOLED 2X, 120Hz, HDR10+, 1750 nits (peak). 6.8 inches, 114.7 cm2 (~90.2% screen-to-body ratio). 1440 x 3088 pixels (~500 ppi density). Corning Gorilla Glass Victus+;', '2023-01-03 12:21:22', '2023-01-03 12:21:22'),
(101, 5, 1, 'Android 12, upgradable to Android 13, One UI 5.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(102, 6, 1, '128GB 8GB RAM, 256GB 12GB RAM, 512GB 12GB RAM, 1TB 12GB RAM.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(103, 7, 1, '108 MP, f/1.8, 23mm (wide), 1/1.33\", 0.8µm, PDAF, Laser AF, OIS 10 MP, f/4.9, 230mm (periscope telephoto), 1/3.52\", 1.12µm, dual pixel PDAF, OIS, 10x optical zoom.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(104, 8, 1, '40 MP, f/2.2, 26mm (wide), 1/2.82\", 0.7µm, PDAF.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(105, 9, 1, 'Yes, with stereo speakers.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(106, 10, 1, 'Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(107, 11, 1, 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer, Samsung DeX, Samsung Wireless DeX (desktop experience support) Bixby natural language commands and dictation Samsung Pay (Visa, MasterCard certified) Ultra Wideband (UWB) support.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(108, 12, 1, 'Li-Ion 5000 mAh, non-removable.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(109, 13, 1, 'Phantom Black, White, Burgundy, Green, Graphite, Red, Sky Blue, Bora Purple.', '2023-01-03 12:21:23', '2023-01-03 12:21:23'),
(113, 1, 2, '2G bands/3G bands/4G bands/5G bands.', '2023-08-09 09:28:07', '2023-08-09 09:28:07'),
(114, 2, 2, '11 November, 2022', '2023-08-09 09:28:07', '2023-08-09 09:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Headphones', 'headphones', 4, 1, '2022-11-04 00:07:19', '2022-11-04 02:32:51'),
(2, 'Men\'s Wear', 'mens-wear', 7, 1, '2022-11-04 00:08:11', '2023-02-05 16:27:28'),
(3, 'Women\'s Wear', 'womens-wear', 7, 1, '2022-11-04 00:08:26', '2023-02-05 16:27:44'),
(7, 'Television', 'television', 4, 1, '2022-12-25 09:00:53', '2022-12-25 09:00:53'),
(8, 'Batteries', 'batteries', 4, 1, '2022-12-25 09:05:03', '2022-12-25 09:05:03'),
(9, 'Chargers', 'chargers', 4, 1, '2022-12-25 09:05:11', '2022-12-25 09:05:11'),
(10, 'TV Receivers', 'tv-receivers', 4, 1, '2022-12-25 09:05:25', '2022-12-25 09:05:25'),
(11, 'Projectors', 'projectors', 4, 1, '2022-12-25 09:05:49', '2022-12-25 09:05:49'),
(12, 'iphone', 'iphone', 10, 1, '2022-12-25 09:06:50', '2022-12-25 09:30:21'),
(13, 'One Plus', 'one-plus', 10, 1, '2022-12-25 09:07:23', '2022-12-25 09:07:23'),
(14, 'HUAWEI', 'huawei', 10, 1, '2022-12-25 09:07:43', '2022-12-25 09:07:43'),
(15, 'infinix', 'infinix', 10, 1, '2022-12-25 09:07:50', '2022-12-25 09:07:50'),
(16, 'poco', 'poco', 10, 1, '2022-12-25 09:07:56', '2022-12-25 09:07:56'),
(17, 'Men\'s Watches', 'mens-watches', 6, 1, '2022-12-25 09:10:08', '2022-12-25 09:10:08'),
(18, 'Women\'s Watches', 'womens-watches', 6, 1, '2022-12-25 09:10:16', '2022-12-25 09:10:16'),
(19, 'Men\'s Fashions', 'mens-fashions', 5, 1, '2022-12-25 09:11:53', '2022-12-25 09:11:53'),
(20, 'Women\'s Fashions', 'womens-fashions', 5, 1, '2022-12-25 09:15:23', '2022-12-25 09:15:23'),
(21, 'Xaiomi', 'xaiomi', 4, 1, '2023-01-28 15:55:22', '2023-01-28 15:55:22'),
(23, 'Vivo', 'vivo', 10, 1, '2023-01-28 15:56:08', '2023-01-28 15:56:08'),
(24, 'Samsung', 'samsung', 10, 1, '2023-01-28 16:07:45', '2023-01-28 16:07:45'),
(27, 'Home Appliances', 'home-appliances', 11, 1, '2023-02-04 18:10:46', '2023-02-04 18:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `reply_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `message`, `image`, `reply_date`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 'Thank you.', NULL, '2023-07-31', '2023-07-31 05:37:11', '2023-07-31 05:37:11', 3),
(2, 1, 'You are most welcome.', NULL, '2023-07-31', '2023-07-31 06:33:13', '2023-07-31 06:33:13', 1),
(3, 1, 'My product return is early as possible!', NULL, '2023-07-31', '2023-07-31 06:44:34', '2023-07-31 06:44:34', 3),
(4, 1, 'This issue acknowledge here.', NULL, '2023-07-31', '2023-07-31 06:46:19', '2023-07-31 06:46:19', 1),
(6, 1, 'Thanks for acknowledgement.', NULL, '2023-07-31', '2023-07-31 08:17:16', '2023-07-31 08:17:16', 3),
(7, 1, 'Thanks for feedback.', NULL, '2023-07-31', '2023-07-31 08:20:25', '2023-07-31 08:20:25', 1),
(8, 3, 'Is there a technical problem with the product you ordered?', NULL, '2023-07-31', '2023-07-31 08:35:56', '2023-07-31 08:35:56', 1),
(9, 2, 'Your refund sent as early.', NULL, '2023-07-31', '2023-07-31 08:36:53', '2023-07-31 08:36:53', 1),
(10, 2, 'Thanks for feedback.', NULL, '2023-07-31', '2023-07-31 08:37:48', '2023-07-31 08:37:48', 3),
(11, 3, 'Some feature is messing.', NULL, '2023-07-31', '2023-07-31 08:39:19', '2023-07-31 08:39:19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','bkash') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `transaction_date` date DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `declined_date` date DEFAULT NULL,
  `refunded_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `transaction_date`, `approved_date`, `declined_date`, `refunded_date`, `created_at`, `updated_at`) VALUES
(26, 3, 31, 'cod', 'refunded', '2023-07-31', '2023-08-03', NULL, '2023-08-08', '2023-07-31 09:18:08', '2023-08-08 07:29:48'),
(27, 3, 33, 'cod', 'pending', NULL, NULL, NULL, NULL, '2023-08-24 09:01:53', '2023-08-24 09:01:53'),
(28, 3, 35, 'cod', 'pending', NULL, NULL, NULL, NULL, '2023-09-03 11:16:33', '2023-09-03 11:16:33'),
(29, 3, 36, 'cod', 'pending', NULL, NULL, NULL, NULL, '2023-11-11 18:23:36', '2023-11-11 18:23:36'),
(30, 3, 37, 'cod', 'pending', NULL, NULL, NULL, NULL, '2023-11-13 05:13:29', '2023-11-13 05:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(20) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin, ROLE_ADM for Role Admin, USR for User',
  `categories` tinyint(1) NOT NULL DEFAULT 0,
  `brands` tinyint(1) NOT NULL DEFAULT 0,
  `products` tinyint(1) NOT NULL DEFAULT 0,
  `pickup_points` tinyint(1) NOT NULL DEFAULT 0,
  `warehouses` tinyint(1) NOT NULL DEFAULT 0,
  `home_slider` tinyint(1) NOT NULL DEFAULT 0,
  `sale_setting` tinyint(1) NOT NULL DEFAULT 0,
  `offers` tinyint(1) NOT NULL DEFAULT 0,
  `orders` tinyint(1) NOT NULL DEFAULT 0,
  `return_orders` tinyint(1) NOT NULL DEFAULT 0,
  `blog_categories` tinyint(1) NOT NULL DEFAULT 0,
  `blogs` tinyint(1) NOT NULL DEFAULT 0,
  `user_role` tinyint(1) NOT NULL DEFAULT 0,
  `contact_messages` tinyint(1) NOT NULL DEFAULT 0,
  `product_questions` tinyint(1) NOT NULL DEFAULT 0,
  `tickets` tinyint(1) NOT NULL DEFAULT 0,
  `all_reports` tinyint(1) NOT NULL DEFAULT 0,
  `settings` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `provider`, `provider_id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `access_token`, `current_team_id`, `profile_photo_path`, `utype`, `categories`, `brands`, `products`, `pickup_points`, `warehouses`, `home_slider`, `sale_setting`, `offers`, `orders`, `return_orders`, `blog_categories`, `blogs`, `user_role`, `contact_messages`, `product_questions`, `tickets`, `all_reports`, `settings`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Younus', 'mdabuyounus30@gmail.com', NULL, '$2y$10$eiIsCkzMQv1HBxFDVpY1u.aewpIfUpWPwTzFnd2x7B.N86nVcbVU.', NULL, NULL, NULL, 'MU1L28VrH75qSU304s6kfFWd8paEsKz7HPUVSxNQDrDVB66KifcUDJOTQeY8', NULL, NULL, NULL, 'ADM', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-10-18 13:01:35', '2022-12-15 10:23:43'),
(2, NULL, NULL, 'Munna', 'sanvolmunna33@gmail.com', NULL, '$2y$10$s4pxdzRnMcdKg/betL3ml.eSYXbi0uA7xt3aSa2LnPufSQmeIz/He', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-13 09:19:43', '2022-12-13 13:10:47'),
(3, 'google', '101156857165292085491', 'Md. Abu Younus', 'younus.cse.ict@gmail.com', NULL, '$2y$10$0.dAGSfy5vSL/DVN5ARqWOeLJouaT5X4POXFcEv4EsPL7paFblYQ6', NULL, NULL, NULL, 'MVdivorLNqyvvPGXZ7qymSPhLX89wUbEntZOO6fXcOFjnzbvkXDlezIR8DS5', 'ya29.a0AfB_byA3mlidIgZbx5OUMbmCzgfvINvThAzRVnvSUGCUoZlzCmzdLuz8NWbzFp5OhqDaIIIN-Hev0G2Mcx7371poSHFNFNAhNwMsoXyK-lO9PoboOWWkLBHVt6LHMrrm0yxNbhOXM3xW4CqTIGrxsDZJFlTIEkQKiI48aCgYKAb8SARESFQHGX2MiKDma8zz0g5XYuBjd5UJHZg0171', NULL, NULL, 'USR', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-02-04 11:29:13', '2023-11-11 18:21:44'),
(4, NULL, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$wRqd6rJlZiyuu5L.N1DKCuUHok1Y1P6sf8UwklT/6nnQHgNSVehqy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ROLE_ADM', 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, '2023-08-07 11:02:30', '2023-08-07 11:02:30'),
(5, NULL, NULL, 'User', 'user@gmail.com', NULL, '$2y$10$yggGfSD5tCweYHu057K9S.GivpiQh1j/dsd4TQBqdK038XpRwqApO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-09 08:20:53', '2023-08-09 08:20:53'),
(6, NULL, NULL, 'Customer', 'customer@gmail.com', NULL, '$2y$10$uhnOwReGXXUk.QVt36GI7e7F.lt5Dzty2qOFLNDF4QfgH0kghb4.S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-09 08:58:10', '2023-08-09 08:58:10'),
(7, NULL, NULL, 'Customer Name', 'customername@gmail.com', NULL, '$2y$10$L95votClerV9xJwQ/R91O.wkUQmxMcUtV3Yyfx96eTRpgwR7ndq0e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-13 04:28:14', '2023-08-13 04:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Shibbari Warehouse', 'City Trade Center, KDA Avenue, Khulna.', '01581003804', '2023-01-26 15:39:02', '2023-01-26 15:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `website_reviews`
--

CREATE TABLE `website_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `review_date` varchar(255) NOT NULL,
  `review_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_reviews`
--

INSERT INTO `website_reviews` (`id`, `user_id`, `review`, `rating`, `review_date`, `review_time`, `created_at`, `updated_at`) VALUES
(1, 3, 'This website services & product quality is good.', 5, '23 July, 2023', '13:06:27', '2023-07-23 07:06:27', '2023-07-23 07:06:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_product_attribute_id_foreign` (`product_attribute_id`),
  ADD KEY `attribute_values_product_id_foreign` (`product_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campaigns_title_unique` (`title`),
  ADD UNIQUE KEY `campaigns_slug_unique` (`slug`);

--
-- Indexes for table `campaign_products`
--
ALTER TABLE `campaign_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_products_campaign_id_foreign` (`campaign_id`),
  ADD KEY `campaign_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_categories_slug_unique` (`slug`),
  ADD KEY `child_categories_category_id_foreign` (`category_id`),
  ADD KEY `child_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_replies_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_letters_email_unique` (`email`);

--
-- Indexes for table `open_tickets`
--
ALTER TABLE `open_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `open_tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `products_pickup_point_id_foreign` (`pickup_point_id`),
  ADD KEY `products_childcategory_id_foreign` (`childcategory_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_questions`
--
ALTER TABLE `product_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_questions_user_id_foreign` (`user_id`),
  ADD KEY `product_questions_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `question_replies`
--
ALTER TABLE `question_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_replies_product_question_id_foreign` (`product_question_id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_products_user_id_foreign` (`user_id`),
  ADD KEY `return_products_order_id_foreign` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `smtps`
--
ALTER TABLE `smtps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_values`
--
ALTER TABLE `specification_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specification_values_product_specification_id_foreign` (`product_specification_id`),
  ADD KEY `specification_values_product_id_foreign` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_reviews`
--
ALTER TABLE `website_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_reviews_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaign_products`
--
ALTER TABLE `campaign_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_replies`
--
ALTER TABLE `contact_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `open_tickets`
--
ALTER TABLE `open_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_points`
--
ALTER TABLE `pickup_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_questions`
--
ALTER TABLE `product_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_replies`
--
ALTER TABLE `question_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `return_products`
--
ALTER TABLE `return_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smtps`
--
ALTER TABLE `smtps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specification_values`
--
ALTER TABLE `specification_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_reviews`
--
ALTER TABLE `website_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_product_attribute_id_foreign` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `campaign_products`
--
ALTER TABLE `campaign_products`
  ADD CONSTRAINT `campaign_products_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `campaign_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `child_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD CONSTRAINT `contact_replies_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `open_tickets`
--
ALTER TABLE `open_tickets`
  ADD CONSTRAINT `open_tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_childcategory_id_foreign` FOREIGN KEY (`childcategory_id`) REFERENCES `child_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_pickup_point_id_foreign` FOREIGN KEY (`pickup_point_id`) REFERENCES `pickup_points` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_questions`
--
ALTER TABLE `product_questions`
  ADD CONSTRAINT `product_questions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_replies`
--
ALTER TABLE `question_replies`
  ADD CONSTRAINT `question_replies_product_question_id_foreign` FOREIGN KEY (`product_question_id`) REFERENCES `product_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_products`
--
ALTER TABLE `return_products`
  ADD CONSTRAINT `return_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specification_values`
--
ALTER TABLE `specification_values`
  ADD CONSTRAINT `specification_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specification_values_product_specification_id_foreign` FOREIGN KEY (`product_specification_id`) REFERENCES `product_specifications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `open_tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `website_reviews`
--
ALTER TABLE `website_reviews`
  ADD CONSTRAINT `website_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
