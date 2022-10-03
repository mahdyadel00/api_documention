-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2020 at 11:20 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsamat_ejarly`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  `en_description` varchar(255) DEFAULT NULL,
  `ar_description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `en_title`, `en_description`, `ar_description`, `image`, `link`, `product_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'adv 1', 'adv 1', 'adv 1', '15941572203398.JPG', 'https://www.google.com/', 180, 1, '2019-12-10 14:21:06', '2020-10-11 10:55:03'),
(3, 'dfdf2222', 'fff', 'fff', '15999989036069.jpg', 'https://www.google.com/', 180, 1, '2019-12-10 14:36:49', '2020-10-11 10:54:33'),
(5, 'asasd', 'sdsss', 'dddddddddddd', '15999991202506.jpg', 'https://www.lendmeit.com', 181, 1, '2019-12-10 15:13:38', '2020-10-11 10:53:47'),
(6, 'sdd', 'sd', 'sd', '15999988575894.jpg', NULL, 182, 1, '2020-08-29 20:11:21', '2020-10-11 10:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `application_transactions`
--

CREATE TABLE `application_transactions` (
  `id` int(11) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `model_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_transactions`
--

INSERT INTO `application_transactions` (`id`, `amount`, `type`, `user_id`, `model_id`, `created_at`, `updated_at`) VALUES
(1, 8.80, 'order_commission', 54, 72, '2020-10-28 08:23:06', '2020-10-28 08:23:06'),
(2, 8.80, 'order_commission', 54, 75, '2020-10-28 11:43:45', '2020-10-28 11:43:45'),
(3, 8.80, 'order_commission', 54, 77, '2020-10-28 16:00:35', '2020-10-28 16:00:35'),
(4, 0.40, 'order_commission', 63, 84, '2020-10-28 16:43:54', '2020-10-28 16:43:54'),
(5, 8.80, 'order_commission', 54, 86, '2020-10-28 18:37:56', '2020-10-28 18:37:56'),
(6, 8.80, 'order_commission', 54, 87, '2020-10-29 07:37:31', '2020-10-29 07:37:31'),
(7, 56.00, 'order_commission', 24, 88, '2020-11-01 09:39:21', '2020-11-01 09:39:21'),
(8, 4.00, 'order_commission', 24, 90, '2020-11-01 10:19:15', '2020-11-01 10:19:15'),
(9, 5.00, 'order_commission', 24, 93, '2020-11-01 12:54:11', '2020-11-01 12:54:11'),
(10, 5.00, 'order_commission', 24, 94, '2020-11-01 13:14:43', '2020-11-01 13:14:43'),
(11, 65.00, 'order_commission', 24, 95, '2020-11-01 13:52:22', '2020-11-01 13:52:22'),
(12, 5.00, 'order_commission', 24, 97, '2020-11-01 14:04:39', '2020-11-01 14:04:39'),
(13, 1.00, 'order_commission', 59, 73, '2020-11-01 14:06:15', '2020-11-01 14:06:15'),
(14, 2.50, 'order_commission', 59, 98, '2020-11-01 14:41:02', '2020-11-01 14:41:02'),
(15, 2.50, 'order_commission', 59, 99, '2020-11-01 15:13:10', '2020-11-01 15:13:10'),
(16, 45.00, 'order_commission', 24, 101, '2020-11-02 11:44:08', '2020-11-02 11:44:08'),
(17, 2.50, 'order_commission', 59, 102, '2020-11-02 12:46:25', '2020-11-02 12:46:25'),
(18, 2.50, 'order_commission', 35, 103, '2020-11-02 13:49:33', '2020-11-02 13:49:33'),
(19, 1.00, 'order_commission', 24, 104, '2020-11-02 15:25:05', '2020-11-02 15:25:05'),
(20, 2.50, 'order_commission', 59, 106, '2020-11-02 16:04:48', '2020-11-02 16:04:48'),
(21, 5.00, 'order_commission', 24, 107, '2020-11-03 08:56:45', '2020-11-03 08:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `en_name`, `ar_name`, `image`, `parent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'اخرئ', 'Others', '16009866504077.jpg', 0, 1, NULL, '2020-09-24 22:30:51'),
(3, 'Photography', 'التصوير', '16009865653228.jpg', 0, 1, '2020-03-03 09:44:55', '2020-09-24 22:29:26'),
(4, 'Trips and camping', 'رحلات وتخيم', '16009865801802.jpg', 0, 1, '2020-03-03 09:46:00', '2020-09-24 22:29:40'),
(5, 'Electronics', 'الكترونيات', '16009866188846.jpg', 0, 1, '2020-03-03 09:49:21', '2020-09-24 22:30:18'),
(6, 'Home & Garden', 'المنزل والحديقة', '15941522554562.jpg', 0, 1, '2020-05-10 12:32:50', '2020-07-07 18:04:16'),
(8, 'Books', 'كتب', '15941555511184.jpg', 0, 1, '2020-05-10 12:52:56', '2020-07-07 18:59:11'),
(9, 'Clothing and accessories', 'ملابس وإكسسوارات', '15941480686462.jpg', 0, 1, '2020-05-10 12:53:21', '2020-07-07 16:54:28'),
(10, 'space', 'مساحات', '15941571295213.jpg', 0, 1, '2020-07-07 13:52:35', '2020-07-07 19:25:29'),
(11, 'Concerts and Events', 'حفلات ومناسبات', '15941563608741.jpg', 0, 1, '2020-07-07 13:53:26', '2020-07-07 19:12:40'),
(12, 'Music', 'موسيقئ', '15941512574018.jpg', 0, 1, '2020-07-07 13:54:37', '2020-07-07 17:47:37'),
(13, 'sport', 'رياضة', '15941484089353.jpg', 0, 1, '2020-07-07 13:55:15', '2020-07-07 17:00:08'),
(14, 'Tools and equipment', 'أدوات ومعدات', '15941506151705.jpg', 0, 1, '2020-07-07 13:55:55', '2020-07-07 17:36:56'),
(15, 'Toys', 'العاب اطفال', '15941491362982.jpg', 0, 1, '2020-07-07 13:56:38', '2020-07-07 17:12:16'),
(16, 'Games for adults', 'العاب للكبار', '15941518194256.jpg', 0, 1, '2020-07-07 13:57:22', '2020-07-07 17:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ar_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `en_name`, `ar_name`, `country_id`) VALUES
(5, 'Makkah', 'مكة', 1),
(6, 'المدينة المنورة', 'المدينة المنورة', 1),
(7, 'الدمام', 'الدمام', 1),
(8, 'الطائف', 'الطائف', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_types`
--

CREATE TABLE `delivery_types` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `delivery_types`
--

INSERT INTO `delivery_types` (`id`, `en_name`, `ar_name`) VALUES
(1, 'Receipt from a specified location', 'استلام من مكان محدد'),
(2, 'Free delivery to the store', 'توصيل مجانى للمستاجر');

-- --------------------------------------------------------

--
-- Table structure for table `distinction_statuses`
--

CREATE TABLE `distinction_statuses` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL,
  `en_description` text,
  `ar_description` text,
  `image` varchar(255) DEFAULT NULL,
  `price_for_once` float NOT NULL,
  `price_for_twice` float DEFAULT NULL,
  `price_for_three_times` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `distinction_statuses`
--

INSERT INTO `distinction_statuses` (`id`, `en_name`, `ar_name`, `en_description`, `ar_description`, `image`, `price_for_once`, `price_for_twice`, `price_for_three_times`) VALUES
(1, 'Send alerts to all users', 'إرسال تنبيهات لجميع المستخدمين', NULL, NULL, NULL, 60, 120, 180),
(2, 'Advertisement in Instagram only', 'الاعلان فى انستقرام فقط', 'Description on InstagramKNLINOIJOJOJا', 'Description on InstagramJVKVJVBKHBKHBKHIHIHIHKزنازمنزمتزرهتخت', '15966380842773.png', 20, 40, 60),
(3, 'Advertise on Twitter only', 'الاعلان فى تويتر فقط', NULL, NULL, '15966382947163.png', 5, 10, 15),
(4, 'Advertise on Facebook only', 'الاعلان فى الفيسبوك فقط', NULL, NULL, '15966381925055.png', 10, 20, 30),
(5, 'Advertising on all social media sites only Twitter - Instagram - Facebook', 'الاعلان فى جميع مواقع التواصل الاجتماعى فقط تويتر - انستجرام - فيسبوك', NULL, NULL, '15966383506400.jpeg', 50, 100, 150),
(6, 'The ad appears at the top of the search page', 'ظهور الإعلان فى أعلى صفحة البحث', NULL, NULL, NULL, 5, 15, 30),
(7, 'The ad appears on the home page', 'ظهور الإعلان فى الصفحة الرئيسية', NULL, NULL, NULL, 20, 40, 60);

-- --------------------------------------------------------

--
-- Table structure for table `distinguish_products`
--

CREATE TABLE `distinguish_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `distinction_status_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `rental_times` int(11) DEFAULT '1',
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distinguish_products`
--

INSERT INTO `distinguish_products` (`id`, `user_id`, `distinction_status_id`, `product_id`, `link`, `from_date`, `to_date`, `rental_times`, `message`, `created_at`, `updated_at`) VALUES
(26, 35, 2, 166, 'https://www.google.com/', '2020-09-16', '2020-09-16', 1, 'رسالة الطلب', '2020-09-16 15:04:13', '2020-09-16 15:04:13'),
(27, 35, 1, 166, NULL, '2020-09-16', '2020-09-16', 1, 'عزة النفس و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت فى مصر بيخسر و الله يا ريهام سعيد في اي وقت', '2020-09-16 15:11:56', '2020-09-16 15:11:56'),
(28, 35, 2, 166, NULL, '2020-09-17', '2020-09-17', 1, 'نتنوةلل', '2020-09-17 07:58:35', '2020-09-17 07:58:35'),
(29, 32, 2, 180, NULL, '2020-10-12', '2020-10-13', 1, 'تفاصيل أكثر من ضوابط جديدة لتخصيص أسماء بنت أبي', '2020-10-12 09:47:59', '2020-10-12 09:47:59'),
(30, 32, 2, 180, NULL, '2020-10-16', '2020-10-29', 1, 'ن', '2020-10-12 09:48:54', '2020-10-12 09:48:54'),
(31, 32, 2, 175, NULL, '2020-10-13', '2020-10-13', 1, 'ا', '2020-10-13 13:59:54', '2020-10-13 13:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `id_create_date` varchar(50) DEFAULT NULL,
  `id_expire_date` varchar(50) DEFAULT NULL,
  `id_image` varchar(255) DEFAULT NULL,
  `birth_day` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `full_name_ar` varchar(255) DEFAULT NULL,
  `full_name_en` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentations`
--

INSERT INTO `documentations` (`id`, `user_id`, `id_number`, `id_create_date`, `id_expire_date`, `id_image`, `birth_day`, `nationality`, `bank_name`, `account_name`, `iban`, `full_name_ar`, `full_name_en`, `gender`, `seen`, `created_at`, `updated_at`) VALUES
(2, 49, '151541515145', '15-10-2020', '15-12-2020', NULL, '20-10-2020', 'saudi', NULL, NULL, NULL, 'name ar', 'name en', 'male', 0, '2020-10-25 16:08:18', '2020-10-25 16:10:27'),
(3, 35, '15799778448', '30-10-2020', '13-10-2020', '16038143824559.', '15-10-2020', 'Gdhssjsk', NULL, NULL, NULL, 'Nxnssbsv', 'Bxbzmz', 'male', 0, '2020-10-27 15:57:23', '2020-10-27 15:59:42'),
(4, 59, '575598774', '24-10-2020', '15-10-2020', '16039626992644.', '14-10-2020', 'Cxxzz', NULL, NULL, NULL, 'Mmmm', 'Mcxxsss', 'male', 1, '2020-10-29 08:13:16', '2020-11-03 10:51:29'),
(5, 61, '54185415415', '29-10-2020', '29-10-2020', '16039645012481.', '29-10-2020', 'Jvjcjcjcjc', 'alahly', 'Marwa1 Marwa1', NULL, 'Marwa1', 'Marws2', 'female', 1, '2020-10-29 09:41:41', '2020-11-03 10:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `input_request` text CHARACTER SET utf8,
  `error` longtext CHARACTER SET utf8,
  `message` text CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `error_logs`
--

INSERT INTO `error_logs` (`id`, `type`, `input_request`, `error`, `message`, `created_at`, `updated_at`) VALUES
(183, 'checkout', '{\"order_id\":103,\"payment_method\":\"cash_on_received\"}', '', '', '2020-11-02 13:49:27', '2020-11-02 13:49:27'),
(184, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 13:51:44', '2020-11-02 13:51:44'),
(185, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\"}', '', '', '2020-11-02 13:52:38', '2020-11-02 13:52:38'),
(186, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\"}', '', '', '2020-11-02 13:56:17', '2020-11-02 13:56:17'),
(187, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 13:57:01', '2020-11-02 13:57:01'),
(188, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 13:58:13', '2020-11-02 13:58:13'),
(189, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 13:59:26', '2020-11-02 13:59:26'),
(190, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:09:48', '2020-11-02 14:09:48'),
(191, 'search product', '{\"search_str\":\"\\u0632\\u064a\\u0646\\u0629\"}', '', '', '2020-11-02 14:10:13', '2020-11-02 14:10:13'),
(192, 'search product', '{\"search_str\":\"\\u0632\\u0649\\u0646\\u0629\"}', '', '', '2020-11-02 14:10:27', '2020-11-02 14:10:27'),
(193, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:10:41', '2020-11-02 14:10:41'),
(194, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:10:43', '2020-11-02 14:10:43'),
(195, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u0649\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:10:47', '2020-11-02 14:10:47'),
(196, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:11:00', '2020-11-02 14:11:00'),
(197, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 14:11:17', '2020-11-02 14:11:17'),
(198, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:11:30', '2020-11-02 14:11:30'),
(199, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:11:35', '2020-11-02 14:11:35'),
(200, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 14:12:21', '2020-11-02 14:12:21'),
(201, 'search product', '{\"search_str\":\"\\u062f\\u0631\\u0627\\u062c\\u0629\"}', '', '', '2020-11-02 14:13:02', '2020-11-02 14:13:02'),
(202, 'search product', '{\"search_str\":\"\\u062f\\u0631\\u0627\\u062c\\u0629\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:13:18', '2020-11-02 14:13:18'),
(203, 'search product', '{\"search_str\":\"\\u0639\\u0635\\u0627\\u0641\\u064a\\u0631\",\"job_id\":\"[]\"}', '', '', '2020-11-02 14:19:57', '2020-11-02 14:19:57'),
(204, 'search product', '{\"categories\":[3]}', '', '', '2020-11-02 14:49:45', '2020-11-02 14:49:45'),
(205, 'search product', '{\"categories\":[4]}', '', '', '2020-11-02 14:49:49', '2020-11-02 14:49:49'),
(206, 'search product', '{\"categories\":[5]}', '', '', '2020-11-02 14:49:52', '2020-11-02 14:49:52'),
(207, 'search product', '{\"categories\":[6]}', '', '', '2020-11-02 14:49:56', '2020-11-02 14:49:56'),
(213, 'checkout', '{\"order_id\":104,\"payment_method\":\"cash_on_received\"}', '', '', '2020-11-02 15:25:00', '2020-11-02 15:25:00'),
(214, 'search product', '{\"price_from\":0,\"price_to\":\"28\",\"job_id\":\"[6]\"}', '', '', '2020-11-02 15:29:38', '2020-11-02 15:29:38'),
(215, 'checkout', '{\"order_id\":72,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2020\",\"expiry_month\":\"11\",\"cvv\":\"123\"}', '', '', '2020-11-02 15:36:08', '2020-11-02 15:36:08'),
(216, 'checkout', '{\"order_id\":72,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2020\",\"expiry_month\":\"11\",\"cvv\":\"123\"}', '', '', '2020-11-02 15:37:44', '2020-11-02 15:37:44'),
(217, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 15:41:12', '2020-11-02 15:41:12'),
(218, 'checkout', '{\"order_id\":72,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2021\",\"expiry_month\":\"11\",\"cvv\":\"123\",\"is_extended\":1}', '', '', '2020-11-02 15:43:21', '2020-11-02 15:43:21'),
(219, 'checkout', '{\"order_id\":72,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2021\",\"expiry_month\":\"11\",\"cvv\":\"123\",\"is_extended\":1}', '{\"result\":{\"code\":\"200.300.404\",\"description\":\"invalid or missing parameter\",\"parameterErrors\":[{\"name\":\"amount\",\"value\":\"0.00\",\"message\":\"must be greater than 0.00 for paymentBrand VISA and paymentType DB\"}]},\"buildNumber\":\"7263c2ce459aef679459ea5401573bddea9f6562@2020-11-02 07:42:05 +0000\",\"timestamp\":\"2020-11-02 15:43:21+0000\",\"ndc\":\"8ac7a4c874958483017496843ded0405_8a9c64c993954695a0d3a8745834853c\"}', 'invalid or missing parameter', '2020-11-02 15:43:22', '2020-11-02 15:43:22'),
(220, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 15:43:54', '2020-11-02 15:43:54'),
(221, 'search product', '{\"categories\":\"[3]\",\"job_id\":\"[]\"}', '', '', '2020-11-02 15:44:13', '2020-11-02 15:44:13'),
(222, 'checkout', '{\"order_id\":106,\"payment_method\":\"cash_on_received\"}', '', '', '2020-11-02 16:04:40', '2020-11-02 16:04:40'),
(223, 'checkout', '{\"order_id\":106,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2022\",\"expiry_month\":\"11\",\"cvv\":\"222\",\"is_extended\":1}', '', '', '2020-11-02 16:06:14', '2020-11-02 16:06:14'),
(224, 'checkout', '{\"order_id\":106,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2021\",\"expiry_month\":\"11\",\"cvv\":\"123\",\"is_extended\":1}', '', '', '2020-11-02 16:10:50', '2020-11-02 16:10:50'),
(225, 'checkout', '{\"order_id\":106,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2021\",\"expiry_month\":\"11\",\"cvv\":\"222\",\"is_extended\":1}', '', '', '2020-11-02 16:16:48', '2020-11-02 16:16:48'),
(226, 'search product', '{\"categories\":[3]}', '', '', '2020-11-02 16:26:32', '2020-11-02 16:26:32'),
(227, 'search product', '{\"categories\":[14]}', '', '', '2020-11-02 16:26:47', '2020-11-02 16:26:47'),
(228, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 16:26:59', '2020-11-02 16:26:59'),
(229, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 16:27:19', '2020-11-02 16:27:19'),
(230, 'search product', '{\"categories\":\"[10]\",\"job_id\":\"[]\"}', '', '', '2020-11-02 16:27:29', '2020-11-02 16:27:29'),
(231, 'search product', '{\"categories\":\"[10]\",\"job_id\":\"[2]\"}', '', '', '2020-11-02 16:27:42', '2020-11-02 16:27:42'),
(232, 'search product', '{\"categories\":\"[10]\",\"job_id\":\"[]\"}', '', '', '2020-11-02 16:27:46', '2020-11-02 16:27:46'),
(233, 'search product', '{\"categories\":\"[6]\",\"job_id\":\"[]\"}', '', '', '2020-11-02 16:28:10', '2020-11-02 16:28:10'),
(234, 'search product', '{\"categories\":\"[6]\",\"job_id\":\"[6]\"}', '', '', '2020-11-02 16:28:30', '2020-11-02 16:28:30'),
(235, 'search product', '{\"categories\":\"[6]\",\"job_id\":\"[6]\"}', '', '', '2020-11-02 16:28:43', '2020-11-02 16:28:43'),
(236, 'search product', '{\"city_id\":7,\"job_id\":\"[]\"}', '', '', '2020-11-02 16:29:05', '2020-11-02 16:29:05'),
(237, 'search product', '{\"categories\":[3]}', '', '', '2020-11-02 16:33:11', '2020-11-02 16:33:11'),
(238, 'search product', '{\"categories\":[4]}', '', '', '2020-11-02 16:33:13', '2020-11-02 16:33:13'),
(239, 'search product', '{\"categories\":[5]}', '', '', '2020-11-02 16:33:15', '2020-11-02 16:33:15'),
(240, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 16:33:35', '2020-11-02 16:33:35'),
(241, 'search product', '{\"categories\":[3]}', '', '', '2020-11-02 16:33:54', '2020-11-02 16:33:54'),
(242, 'search product', '{\"categories\":[4]}', '', '', '2020-11-02 16:33:59', '2020-11-02 16:33:59'),
(243, 'search product', '{\"categories\":[15]}', '', '', '2020-11-02 16:34:11', '2020-11-02 16:34:11'),
(244, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 16:42:02', '2020-11-02 16:42:02'),
(245, 'search product', '{\"price_from\":0,\"price_to\":\"50\",\"job_id\":\"[]\"}', '', '', '2020-11-02 16:42:26', '2020-11-02 16:42:26'),
(246, 'search product', '{\"categories\":[3]}', '', '', '2020-11-02 16:43:00', '2020-11-02 16:43:00'),
(247, 'search product', '{\"categories\":[4]}', '', '', '2020-11-02 16:43:06', '2020-11-02 16:43:06'),
(248, 'search product', '{\"categories\":[12]}', '', '', '2020-11-02 16:43:10', '2020-11-02 16:43:10'),
(249, 'search product', '{\"job_id\":\"[]\"}', '', '', '2020-11-02 16:43:54', '2020-11-02 16:43:54'),
(250, 'search product', '{\"job_id\":\"[6]\"}', '', '', '2020-11-02 16:44:12', '2020-11-02 16:44:12'),
(251, 'search product', '{\"price_from\":0,\"price_to\":\"100\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:06:50', '2020-11-03 08:06:50'),
(252, 'search product', '{\"categories\":\"[3]\",\"price_from\":0,\"price_to\":\"100\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:07:06', '2020-11-03 08:07:06'),
(253, 'search product', '{\"categories\":\"[3]\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:07:14', '2020-11-03 08:07:14'),
(254, 'search product', '{\"categories\":\"[3]\",\"price_from\":0,\"price_to\":\"0\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:07:21', '2020-11-03 08:07:21'),
(255, 'search product', '{\"categories\":\"[3]\",\"price_from\":\"010\",\"price_to\":\"050\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:07:33', '2020-11-03 08:07:33'),
(256, 'search product', '{\"categories\":\"[3]\",\"price_from\":\"010\",\"price_to\":\"050\",\"job_id\":\"[3]\"}', '', '', '2020-11-03 08:07:42', '2020-11-03 08:07:42'),
(257, 'search product', '{\"search_str\":\"\\u0631\\u0633\\u0648\\u0645\\u0627\\u062a \\u0639\\u0644\\u0649\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:19:49', '2020-11-03 08:19:49'),
(258, 'search product', '{\"search_str\":\"\\u0631\\u0633\\u0648\\u0645\\u0627\\u062a\",\"job_id\":\"[]\"}', '', '', '2020-11-03 08:53:14', '2020-11-03 08:53:14'),
(259, 'checkout', '{\"order_id\":107,\"payment_method\":\"cash_on_received\"}', '', '', '2020-11-03 08:56:07', '2020-11-03 08:56:07'),
(260, 'checkout', '{\"order_id\":107,\"payment_method\":\"visa\",\"card_number\":\"4200000000000000\",\"expiry_year\":\"2034\",\"expiry_month\":\"05\",\"cvv\":\"123\",\"is_extended\":1}', '', '', '2020-11-03 08:58:16', '2020-11-03 08:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `extended_requests`
--

CREATE TABLE `extended_requests` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `to_date` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `sub_total` float(8,2) NOT NULL DEFAULT '0.00',
  `total` float(8,2) DEFAULT '0.00',
  `owner_total` float(8,2) NOT NULL DEFAULT '0.00',
  `cash_back_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `application_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `tax_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `cash_back_amount` float(8,2) NOT NULL DEFAULT '0.00',
  `application_amount` float(8,2) NOT NULL DEFAULT '0.00',
  `tax_amount` float(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `extended_requests`
--

INSERT INTO `extended_requests` (`id`, `order_id`, `user_id`, `status_id`, `duration`, `from_date`, `to_date`, `payment_method`, `reason`, `sub_total`, `total`, `owner_total`, `cash_back_percentage`, `application_percentage`, `tax_percentage`, `cash_back_amount`, `application_amount`, `tax_amount`, `created_at`, `updated_at`) VALUES
(19, 72, 59, 14, 2, NULL, NULL, 'cash_on_received', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2020-10-28 08:26:20', '2020-10-28 08:26:25'),
(20, 86, 61, 14, 4, NULL, NULL, 'cash_on_received', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2020-10-28 18:38:36', '2020-10-28 18:38:42'),
(21, 87, 61, 14, 3, NULL, NULL, 'cash_on_received', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2020-10-29 07:42:08', '2020-10-29 07:42:14'),
(22, 91, 27, 14, 1, NULL, NULL, 'cash_on_received', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2020-11-01 11:39:55', '2020-11-01 11:40:40'),
(23, 93, 54, 14, 2, NULL, NULL, 'wallet', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2020-11-01 12:55:38', '2020-11-01 12:56:27'),
(24, 94, 54, 14, 3, NULL, NULL, 'cash_on_received', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2020-11-01 13:15:30', '2020-11-01 13:15:35'),
(26, 97, 58, 13, 2, NULL, NULL, 'visa', NULL, 100.00, 115.00, 90.00, 0.00, 0.00, 0.00, 0.00, 10.00, 15.00, '2020-11-01 14:15:51', '2020-11-01 14:15:51'),
(27, 96, 62, 14, 1, NULL, NULL, 'cash_on_received', NULL, 25.00, 28.75, 22.50, 0.00, 0.00, 0.00, 0.00, 2.50, 3.75, '2020-11-01 14:16:24', '2020-11-01 14:16:40'),
(28, 98, 62, 14, 1, NULL, NULL, 'cash_on_received', NULL, 25.00, 28.75, 22.50, 0.00, 0.00, 0.00, 0.00, 2.50, 3.75, '2020-11-01 14:41:41', '2020-11-01 14:41:50'),
(29, 98, 62, 13, 3, NULL, NULL, 'visa', NULL, 75.00, 86.25, 67.50, 0.00, 0.00, 0.00, 0.00, 7.50, 11.25, '2020-11-01 14:42:08', '2020-11-01 14:42:08'),
(30, 98, 62, 13, 2, NULL, NULL, 'master', NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, '2020-11-01 14:43:01', '2020-11-01 14:43:01'),
(31, 98, 58, 14, 2, NULL, NULL, 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, '2020-11-01 14:53:43', '2020-11-01 14:53:55'),
(32, 98, 62, 14, 3, NULL, NULL, 'visa', NULL, 75.00, 86.25, 67.50, 0.00, 0.00, 0.00, 0.00, 7.50, 11.25, '2020-11-01 14:59:59', '2020-11-01 15:00:08'),
(33, 98, 62, 14, 2, NULL, NULL, 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, '2020-11-01 15:06:15', '2020-11-01 15:06:21'),
(34, 99, 62, 14, 2, NULL, NULL, 'cash_on_received', NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, '2020-11-01 16:52:19', '2020-11-01 16:52:30'),
(35, 99, 62, 13, 3, NULL, NULL, 'wallet', NULL, 75.00, 86.25, 67.50, 0.00, 0.00, 0.00, 0.00, 7.50, 11.25, '2020-11-01 17:16:33', '2020-11-01 17:16:33'),
(36, 101, 54, 14, 2, NULL, NULL, 'cash_on_received', NULL, 100.00, 115.00, 90.00, 0.00, 10.00, 15.00, 0.00, 10.00, 15.00, '2020-11-02 12:08:51', '2020-11-02 12:08:58'),
(37, 101, 54, 14, 8, NULL, NULL, 'cash_on_received', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-02 12:13:07', '2020-11-02 12:13:18'),
(38, 101, 54, 14, 4, NULL, NULL, 'cash_on_received', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-02 12:32:45', '2020-11-02 12:33:09'),
(39, 101, 54, 14, 2, NULL, NULL, 'visa', NULL, 100.00, 115.00, 90.00, 0.00, 10.00, 15.00, 0.00, 10.00, 15.00, '2020-11-02 12:33:26', '2020-11-02 12:33:36'),
(40, 102, 24, 14, 2, NULL, NULL, 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-02 12:47:35', '2020-11-02 12:47:47'),
(41, 101, 28, 13, 4, '2020-11-11 00:00:00', '2020-11-15 00:00:00', 'visa', NULL, 200.00, 230.00, 180.00, 0.00, 10.00, 15.00, 0.00, 20.00, 30.00, '2020-11-02 14:49:08', '2020-11-02 14:49:08'),
(42, 104, 54, 13, 1, '2020-11-02 00:00:00', '2020-11-03 00:00:00', 'cash_on_received', NULL, 10.00, 11.50, 9.00, 0.00, 10.00, 15.00, 0.00, 1.00, 1.50, '2020-11-02 15:25:30', '2020-11-02 15:25:30'),
(43, 106, 62, 14, 2, '2020-11-02 00:00:00', '2020-11-04 00:00:00', 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-02 16:05:22', '2020-11-02 16:05:33'),
(44, 106, 62, 14, 2, '2020-11-02 00:00:00', '2020-11-04 00:00:00', 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-02 16:09:55', '2020-11-02 16:10:05'),
(45, 106, 62, 14, 2, '2020-11-02 00:00:00', '2020-11-04 00:00:00', 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-02 16:15:31', '2020-11-02 16:15:35'),
(46, 107, 54, 14, 1, '2020-11-03 00:00:00', '2020-11-04 00:00:00', 'visa', NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, '2020-11-03 08:57:17', '2020-11-03 08:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `extension_status`
--

CREATE TABLE `extension_status` (
  `id` int(11) NOT NULL,
  `ar_neme` varchar(255) NOT NULL,
  `en_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `extension_status`
--

INSERT INTO `extension_status` (`id`, `ar_neme`, `en_name`) VALUES
(1, 'لا يوجد تمديد', 'There is no extension'),
(2, 'طلب التمديد', 'Extension request'),
(3, 'الموافقة على التمديد', 'Extension approval'),
(4, 'رفض التمديد', 'Extension rejected');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `cash_back_percentage` int(11) DEFAULT NULL,
  `tax_percentage` float(8,2) DEFAULT '0.00',
  `application_percentage` float(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `cash_back_percentage`, `tax_percentage`, `application_percentage`) VALUES
(1, 0, 15.00, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `en_name`, `ar_name`, `image`) VALUES
(2, 'sewing', 'الخياطة', NULL),
(3, 'carpentry', 'النجارة والسباكة (البناء)', NULL),
(4, 'Photography', 'التصوير', NULL),
(5, 'Cooking', 'الطبخ', NULL),
(6, 'Drawing', 'الرسم', NULL),
(7, 'health and beauty', 'الصحة والجمال', NULL),
(8, 'Handcrafts', 'حرف يدوية', NULL),
(9, 'Engineering', 'الهندسة', NULL),
(10, 'Education', 'التعليم', NULL),
(11, 'Accounting and economics', 'محاسبة واقتصاد', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `message` text,
  `to` int(11) NOT NULL,
  `additions` json DEFAULT NULL,
  `readed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `order_id`, `message`, `to`, `additions`, `readed`, `created_at`, `updated_at`) VALUES
(60, 59, 72, 'عملتي حاجه', 54, '{}', 0, '2020-10-28 08:39:03', '2020-10-28 08:39:03'),
(61, 24, 88, 'السلام عليكم', 24, '{}', 0, '2020-11-01 09:38:18', '2020-11-01 09:38:18'),
(62, 54, 88, 'و عليكم السلام', 24, '{}', 0, '2020-11-01 09:38:28', '2020-11-01 09:38:28'),
(63, 24, 88, 'اقبل الدفع النقدى فقط', 24, '{}', 0, '2020-11-01 09:38:43', '2020-11-01 09:38:43'),
(64, 54, 88, 'حسنا', 24, '{}', 0, '2020-11-01 09:38:50', '2020-11-01 09:38:50'),
(65, 24, 89, 'السلام عليكم', 24, '{}', 0, '2020-11-01 09:52:43', '2020-11-01 09:52:43'),
(66, 54, 89, 'و عليكم السلام', 24, '{}', 0, '2020-11-01 09:52:57', '2020-11-01 09:52:57'),
(67, 24, 89, 'كم سعر التاجير ؟', 24, '{}', 0, '2020-11-01 09:53:01', '2020-11-01 09:53:01'),
(68, 54, 89, '50 لليوم الواحد', 24, '{}', 0, '2020-11-01 09:53:13', '2020-11-01 09:53:13'),
(69, 24, 90, 'السلام عليكم', 24, '{}', 0, '2020-11-01 10:18:04', '2020-11-01 10:18:04'),
(70, 54, 90, 'و عليكم السلام', 24, '{}', 0, '2020-11-01 10:18:13', '2020-11-01 10:18:13'),
(71, 54, 90, 'كم سعر التاجير ؟', 24, '{}', 0, '2020-11-01 10:18:14', '2020-11-01 10:18:14'),
(72, 24, 90, '50 لليوم الواحد', 24, '{}', 0, '2020-11-01 10:18:25', '2020-11-01 10:18:25'),
(73, 32, 91, 'كم سعر التاجير ؟', 32, '{}', 0, '2020-11-01 11:32:51', '2020-11-01 11:32:51'),
(74, 27, 91, 'كم سعر التاجير ؟', 32, '{}', 0, '2020-11-01 11:33:49', '2020-11-01 11:33:49'),
(75, 27, 91, 'مرحبا بك', 32, '{}', 0, '2020-11-01 11:33:50', '2020-11-01 11:33:50'),
(76, 27, 91, NULL, 32, '{\"image\": \"16042304623894.jpeg\"}', 0, '2020-11-01 11:34:23', '2020-11-01 11:34:23'),
(77, 24, 92, 'مرحبا بك', 24, '{}', 0, '2020-11-01 12:38:19', '2020-11-01 12:38:19'),
(78, 24, 92, 'مرحبا بك', 24, '{}', 0, '2020-11-01 12:38:20', '2020-11-01 12:38:20'),
(79, 24, 92, 'مرحبا بك', 24, '{}', 0, '2020-11-01 12:38:21', '2020-11-01 12:38:21'),
(80, 54, 92, 'هلا', 24, '{}', 0, '2020-11-01 12:38:27', '2020-11-01 12:38:27'),
(81, 54, 92, 'هلا', 24, '{}', 0, '2020-11-01 12:38:30', '2020-11-01 12:38:30'),
(82, 54, 92, 'هلا', 24, '{}', 0, '2020-11-01 12:38:32', '2020-11-01 12:38:32'),
(83, 24, 92, 'كيف حالك', 24, '{}', 0, '2020-11-01 12:39:20', '2020-11-01 12:39:20'),
(84, 59, 98, 'اتتت', 59, '{}', 0, '2020-11-01 14:44:18', '2020-11-01 14:44:18');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(13, '2016_06_01_000004_create_oauth_clients_table', 2),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(15, '2020_03_19_125627_create_websockets_statistics_entries_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_logs`
--

CREATE TABLE `notifications_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `body` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `model_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications_logs`
--

INSERT INTO `notifications_logs` (`id`, `user_id`, `title`, `body`, `type`, `model_id`, `created_at`, `updated_at`, `is_read`) VALUES
(3931, 35, 'The Order #64 has been Rented successfully!', 'From:  - To: ', 'order', 64, '2020-10-27 15:30:50', '2020-10-27 15:30:50', 0),
(3932, 58, 'The Order #64 has been Rented successfully!', 'From:  - To: ', 'order', 64, '2020-10-27 15:30:50', '2020-10-27 15:30:50', 0),
(3933, 35, 'The Order #65 has been Rented successfully!', 'From:  - To: ', 'order', 65, '2020-10-27 16:18:18', '2020-10-27 16:18:18', 0),
(3934, 58, 'The Order #65 has been Rented successfully!', 'From:  - To: ', 'order', 65, '2020-10-27 16:18:18', '2020-10-27 16:18:18', 0),
(3935, 49, 'The Order #66 has been Rented successfully!', 'From:  - To: ', 'order', 66, '2020-10-27 17:41:13', '2020-10-27 17:41:13', 0),
(3936, 58, 'The Order #66 has been Rented successfully!', 'From:  - To: ', 'order', 66, '2020-10-27 17:41:13', '2020-10-27 17:41:13', 0),
(3937, 49, 'The Order #67 has been Rented successfully!', 'From:  - To: ', 'order', 67, '2020-10-27 17:58:13', '2020-10-27 17:58:13', 0),
(3938, 58, 'The Order #67 has been Rented successfully!', 'From:  - To: ', 'order', 67, '2020-10-27 17:58:13', '2020-10-27 17:58:13', 0),
(3939, 49, 'The Order #68 has been Rented successfully!', 'From:  - To: ', 'order', 68, '2020-10-27 18:26:14', '2020-10-27 18:26:14', 0),
(3940, 58, 'The Order #68 has been Rented successfully!', 'From:  - To: ', 'order', 68, '2020-10-27 18:26:14', '2020-10-27 18:26:14', 0),
(3941, 49, 'The Order #69 has been Rented successfully!', 'From:  - To: ', 'order', 69, '2020-10-27 18:29:26', '2020-10-27 18:29:26', 0),
(3942, 58, 'The Order #69 has been Rented successfully!', 'From:  - To: ', 'order', 69, '2020-10-27 18:29:26', '2020-10-27 18:29:26', 0),
(3943, 49, 'The Order #70 has been Rented successfully!', 'From:  - To: ', 'order', 70, '2020-10-27 18:31:32', '2020-10-27 18:31:32', 0),
(3944, 58, 'The Order #70 has been Rented successfully!', 'From:  - To: ', 'order', 70, '2020-10-27 18:31:32', '2020-10-27 18:31:32', 0),
(3945, 49, 'The Order #71 has been Rented successfully!', 'From:  - To: ', 'order', 71, '2020-10-27 18:40:32', '2020-10-27 18:40:32', 0),
(3946, 58, 'The Order #71 has been Rented successfully!', 'From:  - To: ', 'order', 71, '2020-10-27 18:40:32', '2020-10-27 18:40:32', 0),
(3947, 54, 'The Order #72 has been Rented successfully!', 'From:  - To: ', 'order', 72, '2020-10-28 08:16:09', '2020-10-28 08:16:09', 0),
(3948, 59, 'The Order #72 has been Rented successfully!', 'From:  - To: ', 'order', 72, '2020-10-28 08:16:11', '2020-10-28 08:16:11', 0),
(3949, 54, 'The Order #72', 'Status changed to Pending', 'order', 72, '2020-10-28 08:17:22', '2020-10-28 08:17:22', 0),
(3950, 59, 'The Order #72', 'Status changed to Pending', 'order', 72, '2020-10-28 08:17:22', '2020-10-28 08:17:22', 0),
(3951, 54, 'The Order #72', 'Status changed to Approved', 'order', 72, '2020-10-28 08:17:53', '2020-10-28 08:17:53', 0),
(3952, 59, 'The Order #72', 'Status changed to Approved', 'order', 72, '2020-10-28 08:17:53', '2020-10-28 08:17:53', 0),
(3953, 54, 'The Order #72', 'Status changed to Request a preview', 'order', 72, '2020-10-28 08:17:57', '2020-10-28 08:17:57', 0),
(3954, 59, 'The Order #72', 'Status changed to Request a preview', 'order', 72, '2020-10-28 08:17:57', '2020-10-28 08:17:57', 0),
(3955, 54, 'The Order #72', 'Status changed to Agree to the preview', 'order', 72, '2020-10-28 08:21:55', '2020-10-28 08:21:55', 0),
(3956, 59, 'The Order #72', 'Status changed to Agree to the preview', 'order', 72, '2020-10-28 08:21:55', '2020-10-28 08:21:55', 0),
(3957, 54, 'The Order #72', 'Status changed to Paid', 'order', 72, '2020-10-28 08:23:06', '2020-10-28 08:23:06', 0),
(3958, 59, 'The Order #72', 'Status changed to Paid', 'order', 72, '2020-10-28 08:23:06', '2020-10-28 08:23:06', 0),
(3959, 54, 'The Order #72', 'Status changed to Payment received', 'order', 72, '2020-10-28 08:25:52', '2020-10-28 08:25:52', 0),
(3960, 59, 'The Order #72', 'Status changed to Payment received', 'order', 72, '2020-10-28 08:25:52', '2020-10-28 08:25:52', 0),
(3961, 54, 'The Order #72', 'Status changed to Delivery', 'order', 72, '2020-10-28 08:25:56', '2020-10-28 08:25:56', 0),
(3962, 59, 'The Order #72', 'Status changed to Delivery', 'order', 72, '2020-10-28 08:25:56', '2020-10-28 08:25:56', 0),
(3963, 59, 'The Order #72', 'The order extension has been sent to the lessor', 'order', 72, '2020-10-28 08:26:20', '2020-10-28 08:26:20', 0),
(3964, 54, 'The Order #72', 'Status changed to Paid', 'order', 72, '2020-10-28 08:31:35', '2020-10-28 08:31:35', 0),
(3965, 59, 'The Order #72', 'Status changed to Paid', 'order', 72, '2020-10-28 08:31:35', '2020-10-28 08:31:35', 0),
(3966, 54, 'The Order #72', 'Status changed to Paid', 'order', 72, '2020-10-28 08:34:10', '2020-10-28 08:34:10', 0),
(3967, 59, 'The Order #72', 'Status changed to Paid', 'order', 72, '2020-10-28 08:34:10', '2020-10-28 08:38:33', 1),
(3968, 59, 'The Order #73 has been Rented successfully!', 'From:  - To: ', 'order', 73, '2020-10-28 09:49:38', '2020-10-28 09:49:38', 0),
(3969, 62, 'The Order #73 has been Rented successfully!', 'From:  - To: ', 'order', 73, '2020-10-28 09:49:38', '2020-10-28 09:49:38', 0),
(3970, 59, 'The Order #73', 'Status changed to Pending', 'order', 73, '2020-10-28 09:49:59', '2020-10-28 09:49:59', 0),
(3971, 62, 'The Order #73', 'Status changed to Pending', 'order', 73, '2020-10-28 09:49:59', '2020-10-28 09:49:59', 0),
(3972, 59, 'The Order #73', 'Status changed to Approved', 'order', 73, '2020-10-28 09:50:04', '2020-10-28 09:50:04', 0),
(3973, 62, 'The Order #73', 'Status changed to Approved', 'order', 73, '2020-10-28 09:50:04', '2020-10-28 09:50:04', 0),
(3974, 59, 'The Order #73', 'Status changed to Request a preview', 'order', 73, '2020-10-28 09:50:31', '2020-10-28 09:50:31', 0),
(3975, 62, 'The Order #73', 'Status changed to Request a preview', 'order', 73, '2020-10-28 09:50:31', '2020-10-28 09:50:31', 0),
(3976, 54, 'The Order #74 has been Rented successfully!', 'From:  - To: ', 'order', 74, '2020-10-28 11:21:35', '2020-10-28 11:21:35', 0),
(3977, 63, 'The Order #74 has been Rented successfully!', 'From:  - To: ', 'order', 74, '2020-10-28 11:21:35', '2020-10-28 11:21:35', 0),
(3978, 54, 'The Order #74', 'Status changed to Pending', 'order', 74, '2020-10-28 11:21:55', '2020-10-28 11:21:55', 0),
(3979, 63, 'The Order #74', 'Status changed to Pending', 'order', 74, '2020-10-28 11:21:56', '2020-10-28 11:22:03', 1),
(3980, 54, 'The Order #74', 'Status changed to Approved', 'order', 74, '2020-10-28 11:22:35', '2020-10-28 11:22:35', 0),
(3981, 63, 'The Order #74', 'Status changed to Approved', 'order', 74, '2020-10-28 11:22:35', '2020-10-28 11:22:35', 0),
(3982, 54, 'The Order #74', 'Status changed to Request a preview', 'order', 74, '2020-10-28 11:22:42', '2020-10-28 11:22:42', 0),
(3983, 63, 'The Order #74', 'Status changed to Request a preview', 'order', 74, '2020-10-28 11:22:42', '2020-10-28 11:28:13', 1),
(3984, 54, 'The Order #74', 'Status changed to Agree to the preview', 'order', 74, '2020-10-28 11:36:46', '2020-10-28 11:36:46', 0),
(3985, 63, 'The Order #74', 'Status changed to Agree to the preview', 'order', 74, '2020-10-28 11:36:46', '2020-10-28 11:36:46', 0),
(3986, 54, 'The Order #74', 'Status changed to Payment received', 'order', 74, '2020-10-28 11:41:39', '2020-10-28 11:41:39', 0),
(3987, 63, 'The Order #74', 'Status changed to Payment received', 'order', 74, '2020-10-28 11:41:39', '2020-10-28 11:41:39', 0),
(3988, 54, 'The Order #74', 'Status changed to Delivery', 'order', 74, '2020-10-28 11:41:51', '2020-10-28 11:41:51', 0),
(3989, 63, 'The Order #74', 'Status changed to Delivery', 'order', 74, '2020-10-28 11:41:51', '2020-10-28 11:41:51', 0),
(3990, 54, 'The Order #74', 'Status changed to Received', 'order', 74, '2020-10-28 11:42:01', '2020-10-28 11:42:01', 0),
(3991, 63, 'The Order #74', 'Status changed to Received', 'order', 74, '2020-10-28 11:42:01', '2020-10-28 11:42:01', 0),
(3992, 54, 'The Order #74', 'Status changed to Retrieval', 'order', 74, '2020-10-28 11:42:10', '2020-10-28 11:42:10', 0),
(3993, 63, 'The Order #74', 'Status changed to Retrieval', 'order', 74, '2020-10-28 11:42:10', '2020-10-28 11:42:10', 0),
(3994, 54, 'The Order #75 has been Rented successfully!', 'From:  - To: ', 'order', 75, '2020-10-28 11:42:56', '2020-10-28 11:42:56', 0),
(3995, 63, 'The Order #75 has been Rented successfully!', 'From:  - To: ', 'order', 75, '2020-10-28 11:42:56', '2020-10-28 11:42:56', 0),
(3996, 54, 'The Order #75', 'Status changed to Pending', 'order', 75, '2020-10-28 11:43:11', '2020-10-28 11:43:11', 0),
(3997, 63, 'The Order #75', 'Status changed to Pending', 'order', 75, '2020-10-28 11:43:11', '2020-10-28 11:43:11', 0),
(3998, 54, 'The Order #75', 'Status changed to Approved', 'order', 75, '2020-10-28 11:43:17', '2020-10-28 11:43:17', 0),
(3999, 63, 'The Order #75', 'Status changed to Approved', 'order', 75, '2020-10-28 11:43:17', '2020-10-28 11:43:17', 0),
(4000, 54, 'The Order #75', 'Status changed to Request a preview', 'order', 75, '2020-10-28 11:43:22', '2020-10-28 11:43:22', 0),
(4001, 63, 'The Order #75', 'Status changed to Request a preview', 'order', 75, '2020-10-28 11:43:22', '2020-10-28 11:43:22', 0),
(4002, 54, 'The Order #75', 'Status changed to Agree to the preview', 'order', 75, '2020-10-28 11:43:38', '2020-10-28 11:43:38', 0),
(4003, 63, 'The Order #75', 'Status changed to Agree to the preview', 'order', 75, '2020-10-28 11:43:38', '2020-10-28 11:43:38', 0),
(4004, 54, 'The Order #75', 'Status changed to Paid', 'order', 75, '2020-10-28 11:43:45', '2020-10-28 11:43:45', 0),
(4005, 63, 'The Order #75', 'Status changed to Paid', 'order', 75, '2020-10-28 11:43:45', '2020-10-28 11:43:45', 0),
(4006, 54, 'The Order #75', 'Status changed to Payment received', 'order', 75, '2020-10-28 11:43:52', '2020-10-28 11:43:52', 0),
(4007, 63, 'The Order #75', 'Status changed to Payment received', 'order', 75, '2020-10-28 11:43:52', '2020-10-28 11:43:52', 0),
(4008, 54, 'The Order #75', 'Status changed to Delivery', 'order', 75, '2020-10-28 11:43:57', '2020-10-28 11:43:57', 0),
(4009, 63, 'The Order #75', 'Status changed to Delivery', 'order', 75, '2020-10-28 11:43:58', '2020-10-28 11:43:58', 0),
(4010, 54, 'The Order #75', 'Status changed to Received', 'order', 75, '2020-10-28 11:44:14', '2020-10-28 11:44:14', 0),
(4011, 63, 'The Order #75', 'Status changed to Received', 'order', 75, '2020-10-28 11:44:14', '2020-10-28 11:44:14', 0),
(4012, 54, 'The Order #75', 'Status changed to Retrieval', 'order', 75, '2020-10-28 11:44:46', '2020-10-28 11:44:46', 0),
(4013, 63, 'The Order #75', 'Status changed to Retrieval', 'order', 75, '2020-10-28 11:44:46', '2020-10-28 11:44:46', 0),
(4014, 54, 'The Order #76 has been Rented successfully!', 'From:  - To: ', 'order', 76, '2020-10-28 11:45:38', '2020-10-28 11:45:38', 0),
(4015, 63, 'The Order #76 has been Rented successfully!', 'From:  - To: ', 'order', 76, '2020-10-28 11:45:38', '2020-10-28 11:45:38', 0),
(4016, 54, 'The Order #76', 'Status changed to Pending', 'order', 76, '2020-10-28 11:45:59', '2020-10-28 11:45:59', 0),
(4017, 63, 'The Order #76', 'Status changed to Pending', 'order', 76, '2020-10-28 11:46:00', '2020-10-28 11:46:00', 0),
(4018, 54, 'The Order #76', 'Status changed to Approved', 'order', 76, '2020-10-28 11:46:04', '2020-10-28 11:46:04', 0),
(4019, 63, 'The Order #76', 'Status changed to Approved', 'order', 76, '2020-10-28 11:46:05', '2020-10-28 11:46:05', 0),
(4020, 54, 'The Order #76', 'Status changed to Request a preview', 'order', 76, '2020-10-28 11:46:08', '2020-10-28 11:46:08', 0),
(4021, 63, 'The Order #76', 'Status changed to Request a preview', 'order', 76, '2020-10-28 11:46:08', '2020-10-28 11:46:08', 0),
(4022, 54, 'The Order #76', 'Status changed to Agree to the preview', 'order', 76, '2020-10-28 11:58:56', '2020-10-28 11:58:56', 0),
(4023, 63, 'The Order #76', 'Status changed to Agree to the preview', 'order', 76, '2020-10-28 11:58:56', '2020-10-28 11:58:56', 0),
(4024, 54, 'The Order #76', 'Status changed to Payment received', 'order', 76, '2020-10-28 11:59:18', '2020-10-28 11:59:18', 0),
(4025, 63, 'The Order #76', 'Status changed to Payment received', 'order', 76, '2020-10-28 11:59:18', '2020-10-28 11:59:18', 0),
(4026, 54, 'The Order #76', 'Status changed to Delivery', 'order', 76, '2020-10-28 11:59:24', '2020-10-28 11:59:24', 0),
(4027, 63, 'The Order #76', 'Status changed to Delivery', 'order', 76, '2020-10-28 11:59:24', '2020-10-28 11:59:24', 0),
(4028, 54, 'The Order #76', 'Status changed to Received', 'order', 76, '2020-10-28 11:59:34', '2020-10-28 11:59:34', 0),
(4029, 63, 'The Order #76', 'Status changed to Received', 'order', 76, '2020-10-28 11:59:34', '2020-10-28 11:59:34', 0),
(4030, 54, 'The Order #76', 'Status changed to Retrieval', 'order', 76, '2020-10-28 12:43:42', '2020-10-28 12:43:42', 0),
(4031, 63, 'The Order #76', 'Status changed to Retrieval', 'order', 76, '2020-10-28 12:43:42', '2020-10-28 12:43:42', 0),
(4032, 54, 'The Order #77 has been Rented successfully!', 'From:  - To: ', 'order', 77, '2020-10-28 15:55:43', '2020-10-28 15:55:43', 0),
(4033, 63, 'The Order #77 has been Rented successfully!', 'From:  - To: ', 'order', 77, '2020-10-28 15:55:44', '2020-10-28 15:55:44', 0),
(4034, 54, 'The Order #77', 'Status changed to Pending', 'order', 77, '2020-10-28 16:00:09', '2020-10-28 16:00:09', 0),
(4035, 63, 'The Order #77', 'Status changed to Pending', 'order', 77, '2020-10-28 16:00:09', '2020-10-28 16:00:09', 0),
(4036, 54, 'The Order #77', 'Status changed to Approved', 'order', 77, '2020-10-28 16:00:16', '2020-10-28 16:00:16', 0),
(4037, 63, 'The Order #77', 'Status changed to Approved', 'order', 77, '2020-10-28 16:00:17', '2020-10-28 16:00:17', 0),
(4038, 54, 'The Order #77', 'Status changed to Request a preview', 'order', 77, '2020-10-28 16:00:22', '2020-10-28 16:00:22', 0),
(4039, 63, 'The Order #77', 'Status changed to Request a preview', 'order', 77, '2020-10-28 16:00:22', '2020-10-28 16:00:22', 0),
(4040, 54, 'The Order #77', 'Status changed to Agree to the preview', 'order', 77, '2020-10-28 16:00:29', '2020-10-28 16:00:29', 0),
(4041, 63, 'The Order #77', 'Status changed to Agree to the preview', 'order', 77, '2020-10-28 16:00:29', '2020-10-28 16:00:29', 0),
(4042, 54, 'The Order #77', 'Status changed to Paid', 'order', 77, '2020-10-28 16:00:35', '2020-10-28 16:00:35', 0),
(4043, 63, 'The Order #77', 'Status changed to Paid', 'order', 77, '2020-10-28 16:00:35', '2020-10-28 16:00:35', 0),
(4044, 54, 'The Order #77', 'Status changed to Payment received', 'order', 77, '2020-10-28 16:08:43', '2020-10-28 16:08:43', 0),
(4045, 63, 'The Order #77', 'Status changed to Payment received', 'order', 77, '2020-10-28 16:08:43', '2020-10-28 16:08:43', 0),
(4046, 54, 'The Order #77', 'Status changed to Delivery', 'order', 77, '2020-10-28 16:08:49', '2020-10-28 16:08:49', 0),
(4047, 63, 'The Order #77', 'Status changed to Delivery', 'order', 77, '2020-10-28 16:08:49', '2020-10-28 16:08:49', 0),
(4048, 54, 'The Order #77', 'Status changed to Received', 'order', 77, '2020-10-28 16:08:54', '2020-10-28 16:08:54', 0),
(4049, 63, 'The Order #77', 'Status changed to Received', 'order', 77, '2020-10-28 16:08:54', '2020-10-28 16:08:54', 0),
(4050, 54, 'The Order #77', 'Status changed to Retrieval', 'order', 77, '2020-10-28 16:09:00', '2020-10-28 16:09:00', 0),
(4051, 63, 'The Order #77', 'Status changed to Retrieval', 'order', 77, '2020-10-28 16:09:00', '2020-10-28 16:09:00', 0),
(4052, 54, 'The Order #78 has been Rented successfully!', 'From:  - To: ', 'order', 78, '2020-10-28 16:09:23', '2020-10-28 16:09:23', 0),
(4053, 63, 'The Order #78 has been Rented successfully!', 'From:  - To: ', 'order', 78, '2020-10-28 16:09:23', '2020-10-28 16:09:23', 0),
(4054, 54, 'The Order #78', 'Status changed to Pending', 'order', 78, '2020-10-28 16:09:48', '2020-10-28 16:09:48', 0),
(4055, 63, 'The Order #78', 'Status changed to Pending', 'order', 78, '2020-10-28 16:09:48', '2020-10-28 16:09:48', 0),
(4056, 54, 'The Order #78', 'Status changed to Approved', 'order', 78, '2020-10-28 16:09:54', '2020-10-28 16:09:54', 0),
(4057, 63, 'The Order #78', 'Status changed to Approved', 'order', 78, '2020-10-28 16:09:54', '2020-10-28 16:09:54', 0),
(4058, 54, 'The Order #78', 'Status changed to Request a preview', 'order', 78, '2020-10-28 16:09:58', '2020-10-28 16:09:58', 0),
(4059, 63, 'The Order #78', 'Status changed to Request a preview', 'order', 78, '2020-10-28 16:09:59', '2020-10-28 16:09:59', 0),
(4060, 54, 'The Order #78', 'Status changed to Agree to the preview', 'order', 78, '2020-10-28 16:10:51', '2020-10-28 16:10:51', 0),
(4061, 63, 'The Order #78', 'Status changed to Agree to the preview', 'order', 78, '2020-10-28 16:10:51', '2020-10-28 16:10:51', 0),
(4062, 54, 'The Order #78', 'Status changed to Payment received', 'order', 78, '2020-10-28 16:17:15', '2020-10-28 16:17:15', 0),
(4063, 63, 'The Order #78', 'Status changed to Payment received', 'order', 78, '2020-10-28 16:17:15', '2020-10-28 16:17:15', 0),
(4064, 54, 'The Order #78', 'Status changed to Delivery', 'order', 78, '2020-10-28 16:18:28', '2020-10-28 16:18:28', 0),
(4065, 63, 'The Order #78', 'Status changed to Delivery', 'order', 78, '2020-10-28 16:18:28', '2020-10-28 16:18:28', 0),
(4066, 54, 'The Order #78', 'Status changed to Received', 'order', 78, '2020-10-28 16:18:36', '2020-10-28 16:18:36', 0),
(4067, 63, 'The Order #78', 'Status changed to Received', 'order', 78, '2020-10-28 16:18:36', '2020-10-28 16:18:36', 0),
(4068, 54, 'The Order #78', 'Status changed to Retrieval', 'order', 78, '2020-10-28 16:18:52', '2020-10-28 16:18:52', 0),
(4069, 63, 'The Order #78', 'Status changed to Retrieval', 'order', 78, '2020-10-28 16:18:52', '2020-10-28 16:18:52', 0),
(4070, 54, 'The Order #83 has been Rented successfully!', 'From:  - To: ', 'order', 83, '2020-10-28 16:20:48', '2020-10-28 16:20:48', 0),
(4071, 63, 'The Order #83 has been Rented successfully!', 'From:  - To: ', 'order', 83, '2020-10-28 16:20:48', '2020-10-28 16:20:48', 0),
(4072, 54, 'The Order #83', 'Status changed to Pending', 'order', 83, '2020-10-28 16:21:49', '2020-10-28 16:21:49', 0),
(4073, 63, 'The Order #83', 'Status changed to Pending', 'order', 83, '2020-10-28 16:21:49', '2020-10-28 16:21:49', 0),
(4074, 54, 'The Order #83', 'Status changed to Approved', 'order', 83, '2020-10-28 16:22:05', '2020-10-28 16:22:05', 0),
(4075, 63, 'The Order #83', 'Status changed to Approved', 'order', 83, '2020-10-28 16:22:05', '2020-10-28 16:22:05', 0),
(4076, 54, 'The Order #83', 'Status changed to Request a preview', 'order', 83, '2020-10-28 16:22:09', '2020-10-28 16:22:09', 0),
(4077, 63, 'The Order #83', 'Status changed to Request a preview', 'order', 83, '2020-10-28 16:22:09', '2020-10-28 16:22:09', 0),
(4078, 54, 'The Order #83', 'Status changed to Agree to the preview', 'order', 83, '2020-10-28 16:25:37', '2020-10-28 16:25:37', 0),
(4079, 63, 'The Order #83', 'Status changed to Agree to the preview', 'order', 83, '2020-10-28 16:25:37', '2020-10-28 16:25:37', 0),
(4080, 54, 'The Order #83', 'Status changed to Payment received', 'order', 83, '2020-10-28 16:26:06', '2020-10-28 16:26:06', 0),
(4081, 63, 'The Order #83', 'Status changed to Payment received', 'order', 83, '2020-10-28 16:26:06', '2020-10-28 16:26:06', 0),
(4082, 54, 'The Order #83', 'Status changed to Delivery', 'order', 83, '2020-10-28 16:26:12', '2020-10-28 16:26:12', 0),
(4083, 63, 'The Order #83', 'Status changed to Delivery', 'order', 83, '2020-10-28 16:26:12', '2020-10-28 16:26:12', 0),
(4084, 54, 'The Order #83', 'Status changed to Received', 'order', 83, '2020-10-28 16:28:51', '2020-10-28 16:28:51', 0),
(4085, 63, 'The Order #83', 'Status changed to Received', 'order', 83, '2020-10-28 16:28:52', '2020-10-28 16:28:52', 0),
(4086, 54, 'The Order #83', 'Status changed to Retrieval', 'order', 83, '2020-10-28 16:28:56', '2020-10-28 16:28:56', 0),
(4087, 63, 'The Order #83', 'Status changed to Retrieval', 'order', 83, '2020-10-28 16:28:57', '2020-10-28 16:28:57', 0),
(4088, 63, 'The Order #84 has been Rented successfully!', 'From:  - To: ', 'order', 84, '2020-10-28 16:39:37', '2020-10-28 16:39:37', 0),
(4089, 54, 'The Order #84 has been Rented successfully!', 'From:  - To: ', 'order', 84, '2020-10-28 16:39:37', '2020-10-28 16:39:37', 0),
(4090, 63, 'The Order #84', 'Status changed to Pending', 'order', 84, '2020-10-28 16:43:03', '2020-10-28 16:43:03', 0),
(4091, 54, 'The Order #84', 'Status changed to Pending', 'order', 84, '2020-10-28 16:43:03', '2020-10-28 16:43:03', 0),
(4092, 63, 'The Order #84', 'Status changed to Approved', 'order', 84, '2020-10-28 16:43:07', '2020-10-28 16:43:07', 0),
(4093, 54, 'The Order #84', 'Status changed to Approved', 'order', 84, '2020-10-28 16:43:07', '2020-10-28 16:43:07', 0),
(4094, 63, 'The Order #84', 'Status changed to Approved', 'order', 84, '2020-10-28 16:43:20', '2020-10-28 16:43:20', 0),
(4095, 54, 'The Order #84', 'Status changed to Approved', 'order', 84, '2020-10-28 16:43:20', '2020-10-28 16:43:20', 0),
(4096, 63, 'The Order #84', 'Status changed to Request a preview', 'order', 84, '2020-10-28 16:43:38', '2020-10-28 16:43:38', 0),
(4097, 54, 'The Order #84', 'Status changed to Request a preview', 'order', 84, '2020-10-28 16:43:38', '2020-10-28 16:43:38', 0),
(4098, 63, 'The Order #84', 'Status changed to Agree to the preview', 'order', 84, '2020-10-28 16:43:48', '2020-10-28 16:43:48', 0),
(4099, 54, 'The Order #84', 'Status changed to Agree to the preview', 'order', 84, '2020-10-28 16:43:48', '2020-10-28 16:43:48', 0),
(4100, 63, 'The Order #84', 'Status changed to Paid', 'order', 84, '2020-10-28 16:43:54', '2020-10-28 16:43:54', 0),
(4101, 54, 'The Order #84', 'Status changed to Paid', 'order', 84, '2020-10-28 16:43:54', '2020-10-28 16:43:54', 0),
(4102, 63, 'The Order #84', 'Status changed to Payment received', 'order', 84, '2020-10-28 16:49:37', '2020-10-28 16:49:37', 0),
(4103, 54, 'The Order #84', 'Status changed to Payment received', 'order', 84, '2020-10-28 16:49:37', '2020-10-28 16:49:37', 0),
(4104, 63, 'The Order #84', 'Status changed to Delivery', 'order', 84, '2020-10-28 17:35:03', '2020-10-28 17:35:03', 0),
(4105, 54, 'The Order #84', 'Status changed to Delivery', 'order', 84, '2020-10-28 17:35:04', '2020-10-28 17:35:04', 0),
(4106, 63, 'The Order #84', 'Status changed to Received', 'order', 84, '2020-10-28 17:35:12', '2020-10-28 17:35:12', 0),
(4107, 54, 'The Order #84', 'Status changed to Received', 'order', 84, '2020-10-28 17:35:13', '2020-10-28 17:35:13', 0),
(4108, 63, 'The Order #85 has been Rented successfully!', 'From:  - To: ', 'order', 85, '2020-10-28 17:36:02', '2020-10-28 17:36:02', 0),
(4109, 54, 'The Order #85 has been Rented successfully!', 'From:  - To: ', 'order', 85, '2020-10-28 17:36:02', '2020-10-28 17:36:02', 0),
(4110, 54, 'The Order #86 has been Rented successfully!', 'From:  - To: ', 'order', 86, '2020-10-28 18:36:59', '2020-10-28 18:36:59', 0),
(4111, 61, 'The Order #86 has been Rented successfully!', 'From:  - To: ', 'order', 86, '2020-10-28 18:36:59', '2020-10-28 18:36:59', 0),
(4112, 54, 'The Order #86', 'Status changed to Pending', 'order', 86, '2020-10-28 18:37:27', '2020-10-28 18:37:27', 0),
(4113, 61, 'The Order #86', 'Status changed to Pending', 'order', 86, '2020-10-28 18:37:27', '2020-10-28 18:37:27', 0),
(4114, 54, 'The Order #86', 'Status changed to Approved', 'order', 86, '2020-10-28 18:37:33', '2020-10-28 18:37:33', 0),
(4115, 61, 'The Order #86', 'Status changed to Approved', 'order', 86, '2020-10-28 18:37:33', '2020-10-28 18:37:33', 0),
(4116, 54, 'The Order #86', 'Status changed to Request a preview', 'order', 86, '2020-10-28 18:37:40', '2020-10-28 18:37:40', 0),
(4117, 61, 'The Order #86', 'Status changed to Request a preview', 'order', 86, '2020-10-28 18:37:40', '2020-10-28 18:37:40', 0),
(4118, 54, 'The Order #86', 'Status changed to Agree to the preview', 'order', 86, '2020-10-28 18:37:48', '2020-10-28 18:37:48', 0),
(4119, 61, 'The Order #86', 'Status changed to Agree to the preview', 'order', 86, '2020-10-28 18:37:48', '2020-10-28 18:37:48', 0),
(4120, 54, 'The Order #86', 'Status changed to Paid', 'order', 86, '2020-10-28 18:37:56', '2020-10-28 18:37:56', 0),
(4121, 61, 'The Order #86', 'Status changed to Paid', 'order', 86, '2020-10-28 18:37:56', '2020-10-28 18:37:56', 0),
(4122, 54, 'The Order #86', 'Status changed to Payment received', 'order', 86, '2020-10-28 18:38:01', '2020-10-28 18:38:01', 0),
(4123, 61, 'The Order #86', 'Status changed to Payment received', 'order', 86, '2020-10-28 18:38:02', '2020-10-28 18:38:02', 0),
(4124, 54, 'The Order #86', 'Status changed to Delivery', 'order', 86, '2020-10-28 18:38:15', '2020-10-28 18:38:15', 0),
(4125, 61, 'The Order #86', 'Status changed to Delivery', 'order', 86, '2020-10-28 18:38:15', '2020-10-28 18:38:15', 0),
(4126, 61, 'The Order #86', 'The order extension has been sent to the lessor', 'order', 86, '2020-10-28 18:38:36', '2020-10-28 18:38:36', 0),
(4127, 54, 'The Order #87 has been Rented successfully!', 'From:  - To: ', 'order', 87, '2020-10-29 07:36:35', '2020-10-29 07:36:35', 0),
(4128, 61, 'The Order #87 has been Rented successfully!', 'From:  - To: ', 'order', 87, '2020-10-29 07:36:35', '2020-10-29 07:36:35', 0),
(4129, 54, 'The Order #87', 'Status changed to Pending', 'order', 87, '2020-10-29 07:37:00', '2020-10-29 07:37:00', 0),
(4130, 61, 'The Order #87', 'Status changed to Pending', 'order', 87, '2020-10-29 07:37:00', '2020-10-29 07:37:00', 0),
(4131, 54, 'The Order #87', 'Status changed to Approved', 'order', 87, '2020-10-29 07:37:05', '2020-10-29 07:37:05', 0),
(4132, 61, 'The Order #87', 'Status changed to Approved', 'order', 87, '2020-10-29 07:37:05', '2020-10-29 07:37:05', 0),
(4133, 54, 'The Order #87', 'Status changed to Request a preview', 'order', 87, '2020-10-29 07:37:10', '2020-10-29 07:37:10', 0),
(4134, 61, 'The Order #87', 'Status changed to Request a preview', 'order', 87, '2020-10-29 07:37:10', '2020-10-29 07:37:10', 0),
(4135, 54, 'The Order #87', 'Status changed to Agree to the preview', 'order', 87, '2020-10-29 07:37:24', '2020-10-29 07:37:24', 0),
(4136, 61, 'The Order #87', 'Status changed to Agree to the preview', 'order', 87, '2020-10-29 07:37:24', '2020-10-29 07:37:24', 0),
(4137, 54, 'The Order #87', 'Status changed to Paid', 'order', 87, '2020-10-29 07:37:31', '2020-10-29 07:37:31', 0),
(4138, 61, 'The Order #87', 'Status changed to Paid', 'order', 87, '2020-10-29 07:37:31', '2020-10-29 07:37:31', 0),
(4139, 54, 'The Order #87', 'Status changed to Payment received', 'order', 87, '2020-10-29 07:40:45', '2020-10-29 07:40:45', 0),
(4140, 61, 'The Order #87', 'Status changed to Payment received', 'order', 87, '2020-10-29 07:40:45', '2020-10-29 07:40:45', 0),
(4141, 54, 'The Order #87', 'Status changed to Delivery', 'order', 87, '2020-10-29 07:40:51', '2020-10-29 07:40:51', 0),
(4142, 61, 'The Order #87', 'Status changed to Delivery', 'order', 87, '2020-10-29 07:40:51', '2020-10-29 07:40:51', 0),
(4143, 61, 'The Order #87', 'The order extension has been sent to the lessor', 'order', 87, '2020-10-29 07:42:09', '2020-10-29 07:42:09', 0),
(4144, 24, 'The Order #88 has been Rented successfully!', 'From:  - To: ', 'order', 88, '2020-11-01 09:37:13', '2020-11-01 09:37:13', 0),
(4145, 54, 'The Order #88 has been Rented successfully!', 'From:  - To: ', 'order', 88, '2020-11-01 09:37:13', '2020-11-01 09:37:13', 0),
(4146, 24, 'The Order #88', 'Status changed to Pending', 'order', 88, '2020-11-01 09:37:38', '2020-11-01 09:37:38', 0),
(4147, 54, 'The Order #88', 'Status changed to Pending', 'order', 88, '2020-11-01 09:37:38', '2020-11-01 09:37:38', 0),
(4148, 24, 'The Order #88', 'Status changed to Approved', 'order', 88, '2020-11-01 09:37:51', '2020-11-01 09:37:51', 0),
(4149, 54, 'The Order #88', 'Status changed to Approved', 'order', 88, '2020-11-01 09:37:51', '2020-11-01 09:37:51', 0),
(4150, 24, 'The Order #88', 'Status changed to Request a preview', 'order', 88, '2020-11-01 09:38:00', '2020-11-01 09:38:00', 0),
(4151, 54, 'The Order #88', 'Status changed to Request a preview', 'order', 88, '2020-11-01 09:38:00', '2020-11-01 09:38:00', 0),
(4152, 24, 'The Order #88', 'Status changed to Agree to the preview', 'order', 88, '2020-11-01 09:39:00', '2020-11-01 09:39:00', 0),
(4153, 54, 'The Order #88', 'Status changed to Agree to the preview', 'order', 88, '2020-11-01 09:39:00', '2020-11-01 09:39:00', 0),
(4154, 24, 'The Order #88', 'Status changed to Paid', 'order', 88, '2020-11-01 09:39:16', '2020-11-01 09:39:16', 0),
(4155, 54, 'The Order #88', 'Status changed to Paid', 'order', 88, '2020-11-01 09:39:16', '2020-11-01 09:39:16', 0),
(4156, 24, 'The Order #88', 'Status changed to Paid', 'order', 88, '2020-11-01 09:39:22', '2020-11-01 09:39:22', 0),
(4157, 54, 'The Order #88', 'Status changed to Paid', 'order', 88, '2020-11-01 09:39:22', '2020-11-01 09:39:22', 0),
(4158, 24, 'The Order #88', 'Status changed to Payment received', 'order', 88, '2020-11-01 09:39:49', '2020-11-01 09:39:49', 0),
(4159, 54, 'The Order #88', 'Status changed to Payment received', 'order', 88, '2020-11-01 09:39:49', '2020-11-01 09:39:49', 0),
(4160, 24, 'The Order #88', 'Status changed to Delivery', 'order', 88, '2020-11-01 09:39:55', '2020-11-01 09:39:55', 0),
(4161, 54, 'The Order #88', 'Status changed to Delivery', 'order', 88, '2020-11-01 09:39:55', '2020-11-01 09:39:55', 0),
(4162, 24, 'The Order #88', 'Status changed to Received', 'order', 88, '2020-11-01 09:40:12', '2020-11-01 09:40:12', 0),
(4163, 54, 'The Order #88', 'Status changed to Received', 'order', 88, '2020-11-01 09:40:12', '2020-11-01 09:40:12', 0),
(4164, 24, 'The Order #88', 'Status changed to Retrieval', 'order', 88, '2020-11-01 09:40:20', '2020-11-01 09:40:20', 0),
(4165, 54, 'The Order #88', 'Status changed to Retrieval', 'order', 88, '2020-11-01 09:40:20', '2020-11-01 09:40:20', 0),
(4166, 24, 'The Order #89 has been Rented successfully!', 'From:  - To: ', 'order', 89, '2020-11-01 09:52:09', '2020-11-01 09:52:09', 0),
(4167, 54, 'The Order #89 has been Rented successfully!', 'From:  - To: ', 'order', 89, '2020-11-01 09:52:09', '2020-11-01 09:52:09', 0),
(4168, 24, 'The Order #89', 'Status changed to Pending', 'order', 89, '2020-11-01 09:53:36', '2020-11-01 09:53:36', 0),
(4169, 54, 'The Order #89', 'Status changed to Pending', 'order', 89, '2020-11-01 09:53:36', '2020-11-01 09:53:36', 0),
(4170, 24, 'The Order #89', 'Status changed to Approved', 'order', 89, '2020-11-01 09:59:02', '2020-11-01 09:59:02', 0),
(4171, 54, 'The Order #89', 'Status changed to Approved', 'order', 89, '2020-11-01 09:59:02', '2020-11-01 09:59:02', 0),
(4172, 24, 'The Order #89', 'Status changed to Request a preview', 'order', 89, '2020-11-01 09:59:18', '2020-11-01 09:59:18', 0),
(4173, 54, 'The Order #89', 'Status changed to Request a preview', 'order', 89, '2020-11-01 09:59:18', '2020-11-01 09:59:18', 0),
(4174, 24, 'The Order #89', 'Status changed to Agree to the preview', 'order', 89, '2020-11-01 09:59:31', '2020-11-01 09:59:31', 0),
(4175, 54, 'The Order #89', 'Status changed to Agree to the preview', 'order', 89, '2020-11-01 09:59:31', '2020-11-01 09:59:31', 0),
(4176, 24, 'The Order #89', 'Status changed to Payment received', 'order', 89, '2020-11-01 09:59:42', '2020-11-01 09:59:42', 0),
(4177, 54, 'The Order #89', 'Status changed to Payment received', 'order', 89, '2020-11-01 09:59:42', '2020-11-01 09:59:42', 0),
(4178, 24, 'The Order #89', 'Status changed to Delivery', 'order', 89, '2020-11-01 09:59:53', '2020-11-01 09:59:53', 0),
(4179, 54, 'The Order #89', 'Status changed to Delivery', 'order', 89, '2020-11-01 09:59:53', '2020-11-01 09:59:53', 0),
(4180, 24, 'The Order #89', 'Status changed to Received', 'order', 89, '2020-11-01 10:00:06', '2020-11-01 10:00:06', 0),
(4181, 54, 'The Order #89', 'Status changed to Received', 'order', 89, '2020-11-01 10:00:06', '2020-11-01 10:00:06', 0),
(4182, 24, 'The Order #89', 'Status changed to Retrieval', 'order', 89, '2020-11-01 10:00:13', '2020-11-01 10:00:13', 0),
(4183, 54, 'The Order #89', 'Status changed to Retrieval', 'order', 89, '2020-11-01 10:00:13', '2020-11-01 10:00:13', 0),
(4184, 24, 'The Order #90 has been Rented successfully!', 'From:  - To: ', 'order', 90, '2020-11-01 10:17:14', '2020-11-01 10:17:14', 0),
(4185, 54, 'The Order #90 has been Rented successfully!', 'From:  - To: ', 'order', 90, '2020-11-01 10:17:14', '2020-11-01 10:17:14', 0),
(4186, 24, 'The Order #90', 'Status changed to Pending', 'order', 90, '2020-11-01 10:17:39', '2020-11-01 10:17:39', 0),
(4187, 54, 'The Order #90', 'Status changed to Pending', 'order', 90, '2020-11-01 10:17:39', '2020-11-01 10:17:39', 0),
(4188, 24, 'The Order #90', 'Status changed to Approved', 'order', 90, '2020-11-01 10:18:44', '2020-11-01 10:18:44', 0),
(4189, 54, 'The Order #90', 'Status changed to Approved', 'order', 90, '2020-11-01 10:18:44', '2020-11-01 10:18:44', 0),
(4190, 24, 'The Order #90', 'Status changed to Request a preview', 'order', 90, '2020-11-01 10:18:52', '2020-11-01 10:18:52', 0),
(4191, 54, 'The Order #90', 'Status changed to Request a preview', 'order', 90, '2020-11-01 10:18:52', '2020-11-01 10:18:52', 0),
(4192, 24, 'The Order #90', 'Status changed to Agree to the preview', 'order', 90, '2020-11-01 10:19:09', '2020-11-01 10:19:09', 0),
(4193, 54, 'The Order #90', 'Status changed to Agree to the preview', 'order', 90, '2020-11-01 10:19:09', '2020-11-01 10:19:09', 0),
(4194, 24, 'The Order #90', 'Status changed to Paid', 'order', 90, '2020-11-01 10:19:15', '2020-11-01 10:19:15', 0),
(4195, 54, 'The Order #90', 'Status changed to Paid', 'order', 90, '2020-11-01 10:19:15', '2020-11-01 10:19:15', 0),
(4196, 24, 'The Order #90', 'Status changed to Payment received', 'order', 90, '2020-11-01 10:19:28', '2020-11-01 10:19:28', 0),
(4197, 54, 'The Order #90', 'Status changed to Payment received', 'order', 90, '2020-11-01 10:19:28', '2020-11-01 10:19:28', 0),
(4198, 24, 'The Order #90', 'Status changed to Delivery', 'order', 90, '2020-11-01 10:19:39', '2020-11-01 10:19:39', 0),
(4199, 54, 'The Order #90', 'Status changed to Delivery', 'order', 90, '2020-11-01 10:19:39', '2020-11-01 10:19:39', 0),
(4200, 24, 'The Order #90', 'Status changed to Received', 'order', 90, '2020-11-01 10:19:55', '2020-11-01 10:19:55', 0),
(4201, 54, 'The Order #90', 'Status changed to Received', 'order', 90, '2020-11-01 10:19:55', '2020-11-01 10:19:55', 0),
(4202, 24, 'The Order #90', 'Status changed to Retrieval', 'order', 90, '2020-11-01 10:20:02', '2020-11-01 10:20:02', 0),
(4203, 54, 'The Order #90', 'Status changed to Retrieval', 'order', 90, '2020-11-01 10:20:02', '2020-11-01 10:20:02', 0),
(4204, 5, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:43', '2020-11-01 11:09:43', 0),
(4205, 16, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:43', '2020-11-01 11:09:43', 0),
(4206, 24, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:43', '2020-11-01 11:09:43', 0),
(4207, 32, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:43', '2020-11-01 11:10:00', 1),
(4208, 33, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:44', '2020-11-01 11:09:44', 0),
(4209, 45, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:44', '2020-11-01 11:09:44', 0),
(4210, 47, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:44', '2020-11-01 11:09:44', 0),
(4211, 54, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:44', '2020-11-01 11:09:44', 0),
(4212, 58, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:45', '2020-11-01 11:09:45', 0),
(4213, 59, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:45', '2020-11-01 11:09:45', 0),
(4214, 60, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:45', '2020-11-01 11:09:45', 0),
(4215, 62, 'مرحبا', 'مرحبا بك', NULL, 0, '2020-11-01 11:09:45', '2020-11-01 11:09:45', 0),
(4216, 32, 'The Order #91 has been Rented successfully!', 'From:  - To: ', 'order', 91, '2020-11-01 11:31:26', '2020-11-01 11:31:36', 1),
(4217, 27, 'The Order #91 has been Rented successfully!', 'From:  - To: ', 'order', 91, '2020-11-01 11:31:26', '2020-11-01 11:32:19', 1),
(4218, 32, 'The Order #91', 'Status changed to Pending', 'order', 91, '2020-11-01 11:34:38', '2020-11-01 11:48:22', 1),
(4219, 27, 'The Order #91', 'Status changed to Pending', 'order', 91, '2020-11-01 11:34:38', '2020-11-01 11:35:32', 1),
(4220, 32, 'The Order #91', 'Status changed to Approved', 'order', 91, '2020-11-01 11:36:18', '2020-11-01 11:48:20', 1),
(4221, 27, 'The Order #91', 'Status changed to Approved', 'order', 91, '2020-11-01 11:36:18', '2020-11-01 11:48:59', 1),
(4222, 32, 'The Order #91', 'Status changed to Request a preview', 'order', 91, '2020-11-01 11:36:27', '2020-11-01 11:48:21', 1),
(4223, 27, 'The Order #91', 'Status changed to Request a preview', 'order', 91, '2020-11-01 11:36:27', '2020-11-01 11:48:57', 1),
(4224, 32, 'The Order #91', 'Status changed to Agree to the preview', 'order', 91, '2020-11-01 11:36:38', '2020-11-01 11:48:17', 1),
(4225, 27, 'The Order #91', 'Status changed to Agree to the preview', 'order', 91, '2020-11-01 11:36:38', '2020-11-01 11:48:54', 1),
(4226, 32, 'The Order #91', 'Status changed to Payment received', 'order', 91, '2020-11-01 11:37:05', '2020-11-01 11:48:11', 1),
(4227, 27, 'The Order #91', 'Status changed to Payment received', 'order', 91, '2020-11-01 11:37:05', '2020-11-01 11:48:46', 1),
(4228, 32, 'The Order #91', 'Status changed to Delivery', 'order', 91, '2020-11-01 11:37:14', '2020-11-01 11:41:31', 1),
(4229, 27, 'The Order #91', 'Status changed to Delivery', 'order', 91, '2020-11-01 11:37:14', '2020-11-01 11:38:47', 1),
(4230, 27, 'The Order #91', 'The order extension has been sent to the lessor', 'order', 91, '2020-11-01 11:39:55', '2020-11-01 11:41:36', 1),
(4231, 32, 'The Order #91', 'Status changed to Paid', 'order', 91, '2020-11-01 11:44:21', '2020-11-01 11:44:30', 1),
(4232, 27, 'The Order #91', 'Status changed to Paid', 'order', 91, '2020-11-01 11:44:21', '2020-11-01 11:48:32', 1),
(4233, 32, 'The Order #91', 'Status changed to Retrieval', 'order', 91, '2020-11-01 11:44:37', '2020-11-01 11:44:41', 1),
(4234, 27, 'The Order #91', 'Status changed to Retrieval', 'order', 91, '2020-11-01 11:44:37', '2020-11-01 11:48:30', 1),
(4235, 32, 'The Order #91', 'Status changed to Retrieved', 'order', 91, '2020-11-01 11:44:44', '2020-11-01 11:44:53', 1),
(4236, 27, 'The Order #91', 'Status changed to Retrieved', 'order', 91, '2020-11-01 11:44:44', '2020-11-01 11:44:51', 1),
(4237, 32, 'The Order #91', 'Status changed to Retrieved', 'order', 91, '2020-11-01 11:45:46', '2020-11-01 11:45:52', 1),
(4238, 27, 'The Order #91', 'Status changed to Retrieved', 'order', 91, '2020-11-01 11:45:46', '2020-11-01 11:45:50', 1),
(4239, 24, 'The Order #92 has been Rented successfully!', 'From:  - To: ', 'order', 92, '2020-11-01 12:37:27', '2020-11-01 12:37:27', 0),
(4240, 54, 'The Order #92 has been Rented successfully!', 'From:  - To: ', 'order', 92, '2020-11-01 12:37:27', '2020-11-01 12:37:27', 0),
(4241, 24, 'The Order #92', 'Status changed to Pending', 'order', 92, '2020-11-01 12:37:49', '2020-11-01 12:37:49', 0),
(4242, 54, 'The Order #92', 'Status changed to Pending', 'order', 92, '2020-11-01 12:37:49', '2020-11-01 12:37:49', 0),
(4243, 24, 'The Order #92', 'Status changed to Approved', 'order', 92, '2020-11-01 12:38:08', '2020-11-01 12:38:08', 0),
(4244, 54, 'The Order #92', 'Status changed to Approved', 'order', 92, '2020-11-01 12:38:08', '2020-11-01 12:38:08', 0),
(4245, 24, 'The Order #92', 'Status changed to Request a preview', 'order', 92, '2020-11-01 12:40:33', '2020-11-01 12:40:33', 0),
(4246, 54, 'The Order #92', 'Status changed to Request a preview', 'order', 92, '2020-11-01 12:40:33', '2020-11-01 12:40:33', 0),
(4247, 24, 'The Order #92', 'Status changed to Agree to the preview', 'order', 92, '2020-11-01 12:41:29', '2020-11-01 12:41:29', 0),
(4248, 54, 'The Order #92', 'Status changed to Agree to the preview', 'order', 92, '2020-11-01 12:41:29', '2020-11-01 12:41:29', 0),
(4249, 24, 'The Order #92', 'Status changed to Payment received', 'order', 92, '2020-11-01 12:41:57', '2020-11-01 12:41:57', 0),
(4250, 54, 'The Order #92', 'Status changed to Payment received', 'order', 92, '2020-11-01 12:41:57', '2020-11-01 12:41:57', 0),
(4251, 24, 'The Order #92', 'Status changed to Delivery', 'order', 92, '2020-11-01 12:46:09', '2020-11-01 12:46:09', 0),
(4252, 54, 'The Order #92', 'Status changed to Delivery', 'order', 92, '2020-11-01 12:46:10', '2020-11-01 12:46:10', 0),
(4253, 24, 'The Order #92', 'Status changed to Received', 'order', 92, '2020-11-01 12:46:20', '2020-11-01 12:46:20', 0),
(4254, 54, 'The Order #92', 'Status changed to Received', 'order', 92, '2020-11-01 12:46:20', '2020-11-01 12:46:20', 0),
(4255, 24, 'The Order #92', 'Status changed to Retrieval', 'order', 92, '2020-11-01 12:46:25', '2020-11-01 12:46:25', 0),
(4256, 54, 'The Order #92', 'Status changed to Retrieval', 'order', 92, '2020-11-01 12:46:25', '2020-11-01 12:46:25', 0),
(4257, 24, 'The Order #93 has been Rented successfully!', 'From:  - To: ', 'order', 93, '2020-11-01 12:53:05', '2020-11-01 12:53:05', 0),
(4258, 54, 'The Order #93 has been Rented successfully!', 'From:  - To: ', 'order', 93, '2020-11-01 12:53:05', '2020-11-01 12:53:05', 0),
(4259, 24, 'The Order #93', 'Status changed to Pending', 'order', 93, '2020-11-01 12:53:44', '2020-11-01 12:53:44', 0),
(4260, 54, 'The Order #93', 'Status changed to Pending', 'order', 93, '2020-11-01 12:53:44', '2020-11-01 12:53:44', 0),
(4261, 24, 'The Order #93', 'Status changed to Approved', 'order', 93, '2020-11-01 12:53:48', '2020-11-01 12:53:48', 0),
(4262, 54, 'The Order #93', 'Status changed to Approved', 'order', 93, '2020-11-01 12:53:48', '2020-11-01 12:53:48', 0),
(4263, 24, 'The Order #93', 'Status changed to Request a preview', 'order', 93, '2020-11-01 12:53:53', '2020-11-01 12:53:53', 0),
(4264, 54, 'The Order #93', 'Status changed to Request a preview', 'order', 93, '2020-11-01 12:53:53', '2020-11-01 12:53:53', 0),
(4265, 24, 'The Order #93', 'Status changed to Agree to the preview', 'order', 93, '2020-11-01 12:54:06', '2020-11-01 12:54:06', 0),
(4266, 54, 'The Order #93', 'Status changed to Agree to the preview', 'order', 93, '2020-11-01 12:54:06', '2020-11-01 12:54:06', 0),
(4267, 24, 'The Order #93', 'Status changed to Paid', 'order', 93, '2020-11-01 12:54:11', '2020-11-01 12:54:11', 0),
(4268, 54, 'The Order #93', 'Status changed to Paid', 'order', 93, '2020-11-01 12:54:11', '2020-11-01 12:54:11', 0),
(4269, 24, 'The Order #93', 'Status changed to Payment received', 'order', 93, '2020-11-01 12:54:34', '2020-11-01 12:54:34', 0),
(4270, 54, 'The Order #93', 'Status changed to Payment received', 'order', 93, '2020-11-01 12:54:34', '2020-11-01 12:54:34', 0),
(4271, 24, 'The Order #93', 'Status changed to Delivery', 'order', 93, '2020-11-01 12:54:41', '2020-11-01 12:54:41', 0),
(4272, 54, 'The Order #93', 'Status changed to Delivery', 'order', 93, '2020-11-01 12:54:41', '2020-11-01 12:54:41', 0),
(4273, 54, 'The Order #93', 'The order extension has been sent to the lessor', 'order', 93, '2020-11-01 12:55:38', '2020-11-01 12:55:38', 0),
(4274, 24, 'The Order #94 has been Rented successfully!', 'From:  - To: ', 'order', 94, '2020-11-01 13:13:22', '2020-11-01 13:13:22', 0),
(4275, 54, 'The Order #94 has been Rented successfully!', 'From:  - To: ', 'order', 94, '2020-11-01 13:13:22', '2020-11-01 13:13:22', 0),
(4276, 24, 'The Order #94', 'Status changed to Pending', 'order', 94, '2020-11-01 13:13:58', '2020-11-01 13:13:58', 0),
(4277, 54, 'The Order #94', 'Status changed to Pending', 'order', 94, '2020-11-01 13:13:58', '2020-11-01 13:13:58', 0),
(4278, 24, 'The Order #94', 'Status changed to Approved', 'order', 94, '2020-11-01 13:14:05', '2020-11-01 13:14:05', 0),
(4279, 54, 'The Order #94', 'Status changed to Approved', 'order', 94, '2020-11-01 13:14:05', '2020-11-01 13:14:05', 0),
(4280, 24, 'The Order #94', 'Status changed to Request a preview', 'order', 94, '2020-11-01 13:14:10', '2020-11-01 13:14:10', 0),
(4281, 54, 'The Order #94', 'Status changed to Request a preview', 'order', 94, '2020-11-01 13:14:10', '2020-11-01 13:14:10', 0),
(4282, 24, 'The Order #94', 'Status changed to Agree to the preview', 'order', 94, '2020-11-01 13:14:32', '2020-11-01 13:14:32', 0),
(4283, 54, 'The Order #94', 'Status changed to Agree to the preview', 'order', 94, '2020-11-01 13:14:32', '2020-11-01 13:14:32', 0),
(4284, 24, 'The Order #94', 'Status changed to Paid', 'order', 94, '2020-11-01 13:14:43', '2020-11-01 13:14:43', 0),
(4285, 54, 'The Order #94', 'Status changed to Paid', 'order', 94, '2020-11-01 13:14:43', '2020-11-01 13:14:43', 0),
(4286, 24, 'The Order #94', 'Status changed to Payment received', 'order', 94, '2020-11-01 13:14:54', '2020-11-01 13:14:54', 0),
(4287, 54, 'The Order #94', 'Status changed to Payment received', 'order', 94, '2020-11-01 13:14:54', '2020-11-01 13:14:54', 0),
(4288, 24, 'The Order #94', 'Status changed to Delivery', 'order', 94, '2020-11-01 13:15:00', '2020-11-01 13:15:00', 0),
(4289, 54, 'The Order #94', 'Status changed to Delivery', 'order', 94, '2020-11-01 13:15:00', '2020-11-01 13:15:00', 0),
(4290, 54, 'The Order #94', 'The order extension has been sent to the lessor', 'order', 94, '2020-11-01 13:15:30', '2020-11-01 13:15:30', 0),
(4291, 24, 'The Order #95 has been Rented successfully!', 'From:  - To: ', 'order', 95, '2020-11-01 13:34:00', '2020-11-01 13:34:00', 0),
(4292, 54, 'The Order #95 has been Rented successfully!', 'From:  - To: ', 'order', 95, '2020-11-01 13:34:01', '2020-11-01 13:34:01', 0),
(4293, 24, 'The Order #95', 'Status changed to Pending', 'order', 95, '2020-11-01 13:34:35', '2020-11-01 13:34:35', 0),
(4294, 54, 'The Order #95', 'Status changed to Pending', 'order', 95, '2020-11-01 13:34:35', '2020-11-01 13:34:35', 0),
(4295, 24, 'The Order #95', 'Status changed to Approved', 'order', 95, '2020-11-01 13:34:41', '2020-11-01 13:34:41', 0),
(4296, 54, 'The Order #95', 'Status changed to Approved', 'order', 95, '2020-11-01 13:34:41', '2020-11-01 13:34:41', 0),
(4297, 24, 'The Order #95', 'Status changed to Request a preview', 'order', 95, '2020-11-01 13:34:51', '2020-11-01 13:34:51', 0),
(4298, 54, 'The Order #95', 'Status changed to Request a preview', 'order', 95, '2020-11-01 13:34:51', '2020-11-01 13:34:51', 0),
(4299, 24, 'The Order #95', 'Status changed to Agree to the preview', 'order', 95, '2020-11-01 13:36:02', '2020-11-01 13:36:02', 0),
(4300, 54, 'The Order #95', 'Status changed to Agree to the preview', 'order', 95, '2020-11-01 13:36:02', '2020-11-01 13:36:02', 0),
(4301, 24, 'The Order #95', 'Status changed to Paid', 'order', 95, '2020-11-01 13:52:22', '2020-11-01 13:52:22', 0),
(4302, 54, 'The Order #95', 'Status changed to Paid', 'order', 95, '2020-11-01 13:52:22', '2020-11-01 13:52:22', 0),
(4303, 24, 'The Order #95', 'Status changed to Payment received', 'order', 95, '2020-11-01 13:52:30', '2020-11-01 13:52:30', 0),
(4304, 54, 'The Order #95', 'Status changed to Payment received', 'order', 95, '2020-11-01 13:52:30', '2020-11-01 13:52:30', 0),
(4305, 24, 'The Order #95', 'Status changed to Delivery', 'order', 95, '2020-11-01 13:52:38', '2020-11-01 13:52:38', 0),
(4306, 54, 'The Order #95', 'Status changed to Delivery', 'order', 95, '2020-11-01 13:52:38', '2020-11-01 13:52:38', 0),
(4307, 54, 'The Order #95', 'The order extension has been sent to the lessor', 'order', 95, '2020-11-01 13:53:03', '2020-11-01 13:53:03', 0),
(4308, 59, 'The Order #96 has been Rented successfully!', 'From:  - To: ', 'order', 96, '2020-11-01 13:54:03', '2020-11-01 13:54:03', 0),
(4309, 62, 'The Order #96 has been Rented successfully!', 'From:  - To: ', 'order', 96, '2020-11-01 13:54:03', '2020-11-01 13:54:03', 0),
(4310, 24, 'The Order #97 has been Rented successfully!', 'From:  - To: ', 'order', 97, '2020-11-01 14:03:25', '2020-11-01 14:03:25', 0),
(4311, 54, 'The Order #97 has been Rented successfully!', 'From:  - To: ', 'order', 97, '2020-11-01 14:03:25', '2020-11-01 14:03:25', 0),
(4312, 24, 'The Order #97', 'Status changed to Pending', 'order', 97, '2020-11-01 14:03:51', '2020-11-01 14:03:51', 0),
(4313, 54, 'The Order #97', 'Status changed to Pending', 'order', 97, '2020-11-01 14:03:51', '2020-11-01 14:03:51', 0),
(4314, 24, 'The Order #97', 'Status changed to Approved', 'order', 97, '2020-11-01 14:03:55', '2020-11-01 14:03:55', 0),
(4315, 54, 'The Order #97', 'Status changed to Approved', 'order', 97, '2020-11-01 14:03:55', '2020-11-01 14:03:55', 0),
(4316, 24, 'The Order #97', 'Status changed to Request a preview', 'order', 97, '2020-11-01 14:04:22', '2020-11-01 14:04:22', 0),
(4317, 54, 'The Order #97', 'Status changed to Request a preview', 'order', 97, '2020-11-01 14:04:22', '2020-11-01 14:04:22', 0),
(4318, 24, 'The Order #97', 'Status changed to Agree to the preview', 'order', 97, '2020-11-01 14:04:31', '2020-11-01 14:04:31', 0),
(4319, 54, 'The Order #97', 'Status changed to Agree to the preview', 'order', 97, '2020-11-01 14:04:31', '2020-11-01 14:04:31', 0),
(4320, 24, 'The Order #97', 'Status changed to Paid', 'order', 97, '2020-11-01 14:04:39', '2020-11-01 14:04:39', 0),
(4321, 54, 'The Order #97', 'Status changed to Paid', 'order', 97, '2020-11-01 14:04:39', '2020-11-01 14:04:39', 0),
(4322, 24, 'The Order #97', 'Status changed to Payment received', 'order', 97, '2020-11-01 14:04:49', '2020-11-01 14:04:49', 0),
(4323, 54, 'The Order #97', 'Status changed to Payment received', 'order', 97, '2020-11-01 14:04:49', '2020-11-01 14:04:49', 0),
(4324, 24, 'The Order #97', 'Status changed to Delivery', 'order', 97, '2020-11-01 14:05:04', '2020-11-01 14:05:04', 0),
(4325, 54, 'The Order #97', 'Status changed to Delivery', 'order', 97, '2020-11-01 14:05:04', '2020-11-01 14:05:04', 0),
(4326, 59, 'The Order #73', 'Status changed to Agree to the preview', 'order', 73, '2020-11-01 14:05:58', '2020-11-01 14:05:58', 0),
(4327, 62, 'The Order #73', 'Status changed to Agree to the preview', 'order', 73, '2020-11-01 14:05:58', '2020-11-01 14:05:58', 0),
(4328, 59, 'The Order #73', 'Status changed to Paid', 'order', 73, '2020-11-01 14:06:15', '2020-11-01 14:06:15', 0),
(4329, 62, 'The Order #73', 'Status changed to Paid', 'order', 73, '2020-11-01 14:06:15', '2020-11-01 14:06:15', 0),
(4330, 59, 'The Order #73', 'Status changed to Payment received', 'order', 73, '2020-11-01 14:06:25', '2020-11-01 14:06:25', 0),
(4331, 62, 'The Order #73', 'Status changed to Payment received', 'order', 73, '2020-11-01 14:06:26', '2020-11-01 14:06:26', 0),
(4332, 59, 'The Order #73', 'Status changed to Delivery', 'order', 73, '2020-11-01 14:06:32', '2020-11-01 14:06:32', 0),
(4333, 62, 'The Order #73', 'Status changed to Delivery', 'order', 73, '2020-11-01 14:06:32', '2020-11-01 14:06:32', 0);
INSERT INTO `notifications_logs` (`id`, `user_id`, `title`, `body`, `type`, `model_id`, `created_at`, `updated_at`, `is_read`) VALUES
(4334, 59, 'The Order #96', 'Status changed to Pending', 'order', 96, '2020-11-01 14:12:48', '2020-11-01 14:12:48', 0),
(4335, 62, 'The Order #96', 'Status changed to Pending', 'order', 96, '2020-11-01 14:12:48', '2020-11-01 14:12:48', 0),
(4336, 59, 'The Order #96', 'Status changed to Approved', 'order', 96, '2020-11-01 14:12:57', '2020-11-01 14:12:57', 0),
(4337, 62, 'The Order #96', 'Status changed to Approved', 'order', 96, '2020-11-01 14:12:57', '2020-11-01 14:12:57', 0),
(4338, 59, 'The Order #96', 'Status changed to Request a preview', 'order', 96, '2020-11-01 14:13:04', '2020-11-01 14:13:04', 0),
(4339, 62, 'The Order #96', 'Status changed to Request a preview', 'order', 96, '2020-11-01 14:13:04', '2020-11-01 14:13:04', 0),
(4340, 59, 'The Order #96', 'Status changed to Agree to the preview', 'order', 96, '2020-11-01 14:14:00', '2020-11-01 14:14:00', 0),
(4341, 62, 'The Order #96', 'Status changed to Agree to the preview', 'order', 96, '2020-11-01 14:14:00', '2020-11-01 14:14:00', 0),
(4342, 59, 'The Order #96', 'Status changed to Payment received', 'order', 96, '2020-11-01 14:15:48', '2020-11-01 14:15:48', 0),
(4343, 62, 'The Order #96', 'Status changed to Payment received', 'order', 96, '2020-11-01 14:15:48', '2020-11-01 14:15:48', 0),
(4344, 54, 'The Order #97', 'The order extension has been sent to the lessor', 'order', 97, '2020-11-01 14:15:52', '2020-11-01 14:15:52', 0),
(4345, 59, 'The Order #96', 'Status changed to Delivery', 'order', 96, '2020-11-01 14:15:56', '2020-11-01 14:15:56', 0),
(4346, 62, 'The Order #96', 'Status changed to Delivery', 'order', 96, '2020-11-01 14:15:56', '2020-11-01 14:15:56', 0),
(4347, 62, 'The Order #96', 'The order extension has been sent to the lessor', 'order', 96, '2020-11-01 14:16:24', '2020-11-01 14:16:24', 0),
(4348, 59, 'The Order #98 has been Rented successfully!', 'From:  - To: ', 'order', 98, '2020-11-01 14:40:07', '2020-11-01 14:40:07', 0),
(4349, 62, 'The Order #98 has been Rented successfully!', 'From:  - To: ', 'order', 98, '2020-11-01 14:40:07', '2020-11-01 14:40:07', 0),
(4350, 59, 'The Order #98', 'Status changed to Pending', 'order', 98, '2020-11-01 14:40:26', '2020-11-01 14:40:26', 0),
(4351, 62, 'The Order #98', 'Status changed to Pending', 'order', 98, '2020-11-01 14:40:26', '2020-11-01 14:40:26', 0),
(4352, 59, 'The Order #98', 'Status changed to Approved', 'order', 98, '2020-11-01 14:40:35', '2020-11-01 14:40:35', 0),
(4353, 62, 'The Order #98', 'Status changed to Approved', 'order', 98, '2020-11-01 14:40:35', '2020-11-01 14:40:35', 0),
(4354, 59, 'The Order #98', 'Status changed to Request a preview', 'order', 98, '2020-11-01 14:40:41', '2020-11-01 14:40:41', 0),
(4355, 62, 'The Order #98', 'Status changed to Request a preview', 'order', 98, '2020-11-01 14:40:41', '2020-11-01 14:40:41', 0),
(4356, 59, 'The Order #98', 'Status changed to Agree to the preview', 'order', 98, '2020-11-01 14:40:55', '2020-11-01 14:40:55', 0),
(4357, 62, 'The Order #98', 'Status changed to Agree to the preview', 'order', 98, '2020-11-01 14:40:55', '2020-11-01 14:40:55', 0),
(4358, 59, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 14:41:02', '2020-11-01 14:41:02', 0),
(4359, 62, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 14:41:02', '2020-11-01 14:41:02', 0),
(4360, 59, 'The Order #98', 'Status changed to Payment received', 'order', 98, '2020-11-01 14:41:14', '2020-11-01 14:41:14', 0),
(4361, 62, 'The Order #98', 'Status changed to Payment received', 'order', 98, '2020-11-01 14:41:14', '2020-11-01 14:41:14', 0),
(4362, 59, 'The Order #98', 'Status changed to Delivery', 'order', 98, '2020-11-01 14:41:20', '2020-11-01 14:41:20', 0),
(4363, 62, 'The Order #98', 'Status changed to Delivery', 'order', 98, '2020-11-01 14:41:20', '2020-11-01 14:41:20', 0),
(4364, 62, 'The Order #98', 'The order extension has been sent to the lessor', 'order', 98, '2020-11-01 14:41:41', '2020-11-01 14:41:41', 0),
(4365, 62, 'The Order #98', 'The order extension has been sent to the lessor', 'order', 98, '2020-11-01 14:42:09', '2020-11-01 14:42:09', 0),
(4366, 62, 'The Order #98', 'The order extension has been sent to the lessor', 'order', 98, '2020-11-01 14:43:01', '2020-11-01 14:43:01', 0),
(4367, 62, 'The Order #98', 'The order extension has been sent to the lessor', 'order', 98, '2020-11-01 14:53:43', '2020-11-01 14:53:43', 0),
(4368, 59, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 14:57:15', '2020-11-01 14:57:15', 0),
(4369, 62, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 14:57:15', '2020-11-01 14:57:15', 0),
(4370, 59, 'The Order #98', 'Status changed to Payment received', 'order', 98, '2020-11-01 14:59:29', '2020-11-01 14:59:29', 0),
(4371, 62, 'The Order #98', 'Status changed to Payment received', 'order', 98, '2020-11-01 14:59:29', '2020-11-01 14:59:29', 0),
(4372, 59, 'The Order #98', 'Status changed to Delivery', 'order', 98, '2020-11-01 14:59:37', '2020-11-01 14:59:37', 0),
(4373, 62, 'The Order #98', 'Status changed to Delivery', 'order', 98, '2020-11-01 14:59:37', '2020-11-01 14:59:37', 0),
(4374, 62, 'The Order #98', 'The order extension has been sent to the lessor', 'order', 98, '2020-11-01 15:00:00', '2020-11-01 15:00:00', 0),
(4375, 59, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 15:00:55', '2020-11-01 15:00:55', 0),
(4376, 62, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 15:00:55', '2020-11-01 15:00:55', 0),
(4377, 59, 'The Order #98', 'Status changed to Payment received', 'order', 98, '2020-11-01 15:05:53', '2020-11-01 15:05:53', 0),
(4378, 62, 'The Order #98', 'Status changed to Payment received', 'order', 98, '2020-11-01 15:05:53', '2020-11-01 15:05:53', 0),
(4379, 59, 'The Order #98', 'Status changed to Delivery', 'order', 98, '2020-11-01 15:05:59', '2020-11-01 15:05:59', 0),
(4380, 62, 'The Order #98', 'Status changed to Delivery', 'order', 98, '2020-11-01 15:05:59', '2020-11-01 15:05:59', 0),
(4381, 62, 'The Order #98', 'The order extension has been sent to the lessor', 'order', 98, '2020-11-01 15:06:15', '2020-11-01 15:06:15', 0),
(4382, 59, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 15:06:55', '2020-11-01 15:06:55', 0),
(4383, 62, 'The Order #98', 'Status changed to Paid', 'order', 98, '2020-11-01 15:06:55', '2020-11-01 15:06:55', 0),
(4384, 59, 'The Order #99 has been Rented successfully!', 'From:  - To: ', 'order', 99, '2020-11-01 15:09:58', '2020-11-01 15:09:58', 0),
(4385, 62, 'The Order #99 has been Rented successfully!', 'From:  - To: ', 'order', 99, '2020-11-01 15:09:58', '2020-11-01 15:09:58', 0),
(4386, 59, 'The Order #99', 'Status changed to Pending', 'order', 99, '2020-11-01 15:10:51', '2020-11-01 15:10:51', 0),
(4387, 62, 'The Order #99', 'Status changed to Pending', 'order', 99, '2020-11-01 15:10:51', '2020-11-01 15:10:51', 0),
(4388, 59, 'The Order #99', 'Status changed to Approved', 'order', 99, '2020-11-01 15:12:27', '2020-11-01 15:12:27', 0),
(4389, 62, 'The Order #99', 'Status changed to Approved', 'order', 99, '2020-11-01 15:12:27', '2020-11-01 15:12:27', 0),
(4390, 59, 'The Order #99', 'Status changed to Request a preview', 'order', 99, '2020-11-01 15:12:33', '2020-11-01 15:12:33', 0),
(4391, 62, 'The Order #99', 'Status changed to Request a preview', 'order', 99, '2020-11-01 15:12:34', '2020-11-01 15:12:34', 0),
(4392, 59, 'The Order #99', 'Status changed to Agree to the preview', 'order', 99, '2020-11-01 15:13:02', '2020-11-01 15:13:02', 0),
(4393, 62, 'The Order #99', 'Status changed to Agree to the preview', 'order', 99, '2020-11-01 15:13:02', '2020-11-01 15:13:02', 0),
(4394, 59, 'The Order #99', 'Status changed to Paid', 'order', 99, '2020-11-01 15:13:10', '2020-11-01 15:13:10', 0),
(4395, 62, 'The Order #99', 'Status changed to Paid', 'order', 99, '2020-11-01 15:13:10', '2020-11-01 15:13:10', 0),
(4396, 59, 'The Order #99', 'Status changed to Payment received', 'order', 99, '2020-11-01 16:43:58', '2020-11-01 16:43:58', 0),
(4397, 62, 'The Order #99', 'Status changed to Payment received', 'order', 99, '2020-11-01 16:43:58', '2020-11-01 16:43:58', 0),
(4398, 59, 'The Order #99', 'Status changed to Delivery', 'order', 99, '2020-11-01 16:52:02', '2020-11-01 16:52:02', 0),
(4399, 62, 'The Order #99', 'Status changed to Delivery', 'order', 99, '2020-11-01 16:52:03', '2020-11-01 16:52:03', 0),
(4400, 62, 'The Order #99', 'The order extension has been sent to the lessor', 'order', 99, '2020-11-01 16:52:19', '2020-11-01 16:52:19', 0),
(4401, 62, 'The Order #99', 'The order extension has been sent to the lessor', 'order', 99, '2020-11-01 17:16:33', '2020-11-01 17:16:33', 0),
(4402, 35, 'The Order #100 has been Rented successfully!', 'From:  - To: ', 'order', 100, '2020-11-01 21:50:25', '2020-11-01 21:50:25', 0),
(4403, 32, 'The Order #100 has been Rented successfully!', 'From:  - To: ', 'order', 100, '2020-11-01 21:50:25', '2020-11-01 21:50:25', 0),
(4404, 24, 'The Order #101 has been Rented successfully!', 'From:  - To: ', 'order', 101, '2020-11-02 08:03:10', '2020-11-02 08:03:10', 0),
(4405, 54, 'The Order #101 has been Rented successfully!', 'From:  - To: ', 'order', 101, '2020-11-02 08:03:10', '2020-11-02 08:03:10', 0),
(4406, 24, 'The Order #101', 'Status changed to Pending', 'order', 101, '2020-11-02 11:40:18', '2020-11-02 11:40:18', 0),
(4407, 54, 'The Order #101', 'Status changed to Pending', 'order', 101, '2020-11-02 11:40:18', '2020-11-02 11:40:18', 0),
(4408, 24, 'The Order #101', 'Status changed to Approved', 'order', 101, '2020-11-02 11:40:29', '2020-11-02 11:40:29', 0),
(4409, 54, 'The Order #101', 'Status changed to Approved', 'order', 101, '2020-11-02 11:40:29', '2020-11-02 11:40:29', 0),
(4410, 24, 'The Order #101', 'Status changed to Request a preview', 'order', 101, '2020-11-02 11:40:34', '2020-11-02 11:40:34', 0),
(4411, 54, 'The Order #101', 'Status changed to Request a preview', 'order', 101, '2020-11-02 11:40:34', '2020-11-02 11:40:34', 0),
(4412, 24, 'The Order #101', 'Status changed to Agree to the preview', 'order', 101, '2020-11-02 11:43:17', '2020-11-02 11:43:17', 0),
(4413, 54, 'The Order #101', 'Status changed to Agree to the preview', 'order', 101, '2020-11-02 11:43:17', '2020-11-02 11:43:17', 0),
(4414, 24, 'The Order #101', 'Status changed to Paid', 'order', 101, '2020-11-02 11:44:08', '2020-11-02 11:44:08', 0),
(4415, 54, 'The Order #101', 'Status changed to Paid', 'order', 101, '2020-11-02 11:44:08', '2020-11-02 11:44:08', 0),
(4416, 24, 'The Order #101', 'Status changed to Payment received', 'order', 101, '2020-11-02 11:44:14', '2020-11-02 11:44:14', 0),
(4417, 54, 'The Order #101', 'Status changed to Payment received', 'order', 101, '2020-11-02 11:44:14', '2020-11-02 11:44:14', 0),
(4418, 24, 'The Order #101', 'Status changed to Delivery', 'order', 101, '2020-11-02 11:44:20', '2020-11-02 11:44:20', 0),
(4419, 54, 'The Order #101', 'Status changed to Delivery', 'order', 101, '2020-11-02 11:44:20', '2020-11-02 11:44:20', 0),
(4420, 54, 'The Order #101', 'The order extension has been sent to the lessor', 'order', 101, '2020-11-02 12:08:51', '2020-11-02 12:08:51', 0),
(4421, 54, 'The Order #101', 'The order extension has been sent to the lessor', 'order', 101, '2020-11-02 12:13:07', '2020-11-02 12:13:07', 0),
(4422, 54, 'The Order #101', 'The order extension has been sent to the lessor', 'order', 101, '2020-11-02 12:32:45', '2020-11-02 12:32:45', 0),
(4423, 54, 'The Order #101', 'The order extension has been sent to the lessor', 'order', 101, '2020-11-02 12:33:26', '2020-11-02 12:33:26', 0),
(4424, 59, 'The Order #102 has been Rented successfully!', 'From:  - To: ', 'order', 102, '2020-11-02 12:41:38', '2020-11-02 12:41:38', 0),
(4425, 24, 'The Order #102 has been Rented successfully!', 'From:  - To: ', 'order', 102, '2020-11-02 12:41:38', '2020-11-02 12:41:38', 0),
(4426, 59, 'The Order #102', 'Status changed to Pending', 'order', 102, '2020-11-02 12:43:27', '2020-11-02 12:43:27', 0),
(4427, 24, 'The Order #102', 'Status changed to Pending', 'order', 102, '2020-11-02 12:43:27', '2020-11-02 12:43:27', 0),
(4428, 59, 'The Order #102', 'Status changed to Approved', 'order', 102, '2020-11-02 12:43:32', '2020-11-02 12:43:32', 0),
(4429, 24, 'The Order #102', 'Status changed to Approved', 'order', 102, '2020-11-02 12:43:32', '2020-11-02 12:43:32', 0),
(4430, 59, 'The Order #102', 'Status changed to Request a preview', 'order', 102, '2020-11-02 12:43:37', '2020-11-02 12:43:37', 0),
(4431, 24, 'The Order #102', 'Status changed to Request a preview', 'order', 102, '2020-11-02 12:43:37', '2020-11-02 12:43:37', 0),
(4432, 59, 'The Order #102', 'Status changed to Agree to the preview', 'order', 102, '2020-11-02 12:44:21', '2020-11-02 12:44:21', 0),
(4433, 24, 'The Order #102', 'Status changed to Agree to the preview', 'order', 102, '2020-11-02 12:44:21', '2020-11-02 12:44:21', 0),
(4434, 59, 'The Order #102', 'Status changed to Paid', 'order', 102, '2020-11-02 12:46:25', '2020-11-02 12:46:25', 0),
(4435, 24, 'The Order #102', 'Status changed to Paid', 'order', 102, '2020-11-02 12:46:25', '2020-11-02 12:46:25', 0),
(4436, 59, 'The Order #102', 'Status changed to Payment received', 'order', 102, '2020-11-02 12:46:32', '2020-11-02 12:46:32', 0),
(4437, 24, 'The Order #102', 'Status changed to Payment received', 'order', 102, '2020-11-02 12:46:32', '2020-11-02 12:46:32', 0),
(4438, 59, 'The Order #102', 'Status changed to Delivery', 'order', 102, '2020-11-02 12:46:38', '2020-11-02 12:46:38', 0),
(4439, 24, 'The Order #102', 'Status changed to Delivery', 'order', 102, '2020-11-02 12:46:38', '2020-11-02 12:46:38', 0),
(4440, 24, 'The Order #102', 'The order extension has been sent to the lessor', 'order', 102, '2020-11-02 12:47:35', '2020-11-02 12:47:35', 0),
(4441, 59, 'The Order #102', 'Status changed to Paid', 'order', 102, '2020-11-02 12:49:04', '2020-11-02 12:49:04', 0),
(4442, 24, 'The Order #102', 'Status changed to Paid', 'order', 102, '2020-11-02 12:49:05', '2020-11-02 12:49:05', 0),
(4443, 59, 'The Order #102', 'Status changed to Payment received', 'order', 102, '2020-11-02 12:49:34', '2020-11-02 12:49:34', 0),
(4444, 24, 'The Order #102', 'Status changed to Payment received', 'order', 102, '2020-11-02 12:49:34', '2020-11-02 12:49:34', 0),
(4445, 59, 'The Order #102', 'Status changed to Delivery', 'order', 102, '2020-11-02 13:15:16', '2020-11-02 13:15:16', 0),
(4446, 24, 'The Order #102', 'Status changed to Delivery', 'order', 102, '2020-11-02 13:15:16', '2020-11-02 13:15:16', 0),
(4447, 35, 'The Order #103 has been Rented successfully!', 'From:  - To: ', 'order', 103, '2020-11-02 13:46:44', '2020-11-02 13:46:44', 0),
(4448, 54, 'The Order #103 has been Rented successfully!', 'From:  - To: ', 'order', 103, '2020-11-02 13:46:44', '2020-11-02 13:46:44', 0),
(4449, 35, 'The Order #103', 'Status changed to Pending', 'order', 103, '2020-11-02 13:49:05', '2020-11-02 13:49:05', 0),
(4450, 54, 'The Order #103', 'Status changed to Pending', 'order', 103, '2020-11-02 13:49:05', '2020-11-02 13:49:05', 0),
(4451, 35, 'The Order #103', 'Status changed to Approved', 'order', 103, '2020-11-02 13:49:12', '2020-11-02 13:49:12', 0),
(4452, 54, 'The Order #103', 'Status changed to Approved', 'order', 103, '2020-11-02 13:49:12', '2020-11-02 13:49:12', 0),
(4453, 35, 'The Order #103', 'Status changed to Request a preview', 'order', 103, '2020-11-02 13:49:18', '2020-11-02 13:49:18', 0),
(4454, 54, 'The Order #103', 'Status changed to Request a preview', 'order', 103, '2020-11-02 13:49:18', '2020-11-02 13:49:18', 0),
(4455, 35, 'The Order #103', 'Status changed to Agree to the preview', 'order', 103, '2020-11-02 13:49:27', '2020-11-02 13:49:27', 0),
(4456, 54, 'The Order #103', 'Status changed to Agree to the preview', 'order', 103, '2020-11-02 13:49:27', '2020-11-02 13:49:27', 0),
(4457, 35, 'The Order #103', 'Status changed to Paid', 'order', 103, '2020-11-02 13:49:33', '2020-11-02 13:49:33', 0),
(4458, 54, 'The Order #103', 'Status changed to Paid', 'order', 103, '2020-11-02 13:49:33', '2020-11-02 13:49:33', 0),
(4459, 35, 'The Order #103', 'Status changed to Payment received', 'order', 103, '2020-11-02 13:49:40', '2020-11-02 13:49:40', 0),
(4460, 54, 'The Order #103', 'Status changed to Payment received', 'order', 103, '2020-11-02 13:49:40', '2020-11-02 13:49:40', 0),
(4461, 35, 'The Order #103', 'Status changed to Delivery', 'order', 103, '2020-11-02 13:49:45', '2020-11-02 13:49:45', 0),
(4462, 54, 'The Order #103', 'Status changed to Delivery', 'order', 103, '2020-11-02 13:49:45', '2020-11-02 13:49:45', 0),
(4463, 54, 'The Order #101', 'The order extension has been sent to the lessor', 'order', 101, '2020-11-02 14:49:08', '2020-11-02 14:49:08', 0),
(4464, 24, 'The Order #104 has been Rented successfully!', 'From:  - To: ', 'order', 104, '2020-11-02 15:22:22', '2020-11-02 15:22:22', 0),
(4465, 54, 'The Order #104 has been Rented successfully!', 'From:  - To: ', 'order', 104, '2020-11-02 15:22:22', '2020-11-02 15:22:22', 0),
(4466, 24, 'The Order #104', 'Status changed to Pending', 'order', 104, '2020-11-02 15:24:41', '2020-11-02 15:24:41', 0),
(4467, 54, 'The Order #104', 'Status changed to Pending', 'order', 104, '2020-11-02 15:24:41', '2020-11-02 15:24:41', 0),
(4468, 24, 'The Order #104', 'Status changed to Approved', 'order', 104, '2020-11-02 15:24:46', '2020-11-02 15:24:46', 0),
(4469, 54, 'The Order #104', 'Status changed to Approved', 'order', 104, '2020-11-02 15:24:46', '2020-11-02 15:24:46', 0),
(4470, 24, 'The Order #104', 'Status changed to Request a preview', 'order', 104, '2020-11-02 15:24:51', '2020-11-02 15:24:51', 0),
(4471, 54, 'The Order #104', 'Status changed to Request a preview', 'order', 104, '2020-11-02 15:24:51', '2020-11-02 15:24:51', 0),
(4472, 24, 'The Order #104', 'Status changed to Agree to the preview', 'order', 104, '2020-11-02 15:25:00', '2020-11-02 15:25:00', 0),
(4473, 54, 'The Order #104', 'Status changed to Agree to the preview', 'order', 104, '2020-11-02 15:25:00', '2020-11-02 15:25:00', 0),
(4474, 24, 'The Order #104', 'Status changed to Paid', 'order', 104, '2020-11-02 15:25:06', '2020-11-02 15:25:06', 0),
(4475, 54, 'The Order #104', 'Status changed to Paid', 'order', 104, '2020-11-02 15:25:06', '2020-11-02 15:25:06', 0),
(4476, 24, 'The Order #104', 'Status changed to Payment received', 'order', 104, '2020-11-02 15:25:13', '2020-11-02 15:25:13', 0),
(4477, 54, 'The Order #104', 'Status changed to Payment received', 'order', 104, '2020-11-02 15:25:13', '2020-11-02 15:25:13', 0),
(4478, 24, 'The Order #104', 'Status changed to Delivery', 'order', 104, '2020-11-02 15:25:19', '2020-11-02 15:25:19', 0),
(4479, 54, 'The Order #104', 'Status changed to Delivery', 'order', 104, '2020-11-02 15:25:19', '2020-11-02 15:25:19', 0),
(4480, 54, 'The Order #104', 'The order extension has been sent to the lessor', 'order', 104, '2020-11-02 15:25:31', '2020-11-02 15:25:31', 0),
(4481, 63, 'The Order #105 has been Rented successfully!', 'From:  - To: ', 'order', 105, '2020-11-02 15:34:26', '2020-11-02 15:34:26', 0),
(4482, 59, 'The Order #105 has been Rented successfully!', 'From:  - To: ', 'order', 105, '2020-11-02 15:34:26', '2020-11-02 15:34:26', 0),
(4483, 59, 'The Order #106 has been Rented successfully!', 'From:  - To: ', 'order', 106, '2020-11-02 16:01:49', '2020-11-02 16:01:49', 0),
(4484, 62, 'The Order #106 has been Rented successfully!', 'From:  - To: ', 'order', 106, '2020-11-02 16:01:49', '2020-11-02 16:01:49', 0),
(4485, 59, 'The Order #106', 'Status changed to Pending', 'order', 106, '2020-11-02 16:02:45', '2020-11-02 16:02:45', 0),
(4486, 62, 'The Order #106', 'Status changed to Pending', 'order', 106, '2020-11-02 16:02:45', '2020-11-02 16:02:45', 0),
(4487, 59, 'The Order #106', 'Status changed to Approved', 'order', 106, '2020-11-02 16:04:23', '2020-11-02 16:04:23', 0),
(4488, 62, 'The Order #106', 'Status changed to Approved', 'order', 106, '2020-11-02 16:04:23', '2020-11-02 16:04:23', 0),
(4489, 59, 'The Order #106', 'Status changed to Request a preview', 'order', 106, '2020-11-02 16:04:29', '2020-11-02 16:04:29', 0),
(4490, 62, 'The Order #106', 'Status changed to Request a preview', 'order', 106, '2020-11-02 16:04:29', '2020-11-02 16:04:29', 0),
(4491, 59, 'The Order #106', 'Status changed to Agree to the preview', 'order', 106, '2020-11-02 16:04:40', '2020-11-03 10:00:31', 1),
(4492, 62, 'The Order #106', 'Status changed to Agree to the preview', 'order', 106, '2020-11-02 16:04:40', '2020-11-02 16:04:40', 0),
(4493, 59, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:04:48', '2020-11-03 10:00:30', 1),
(4494, 62, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:04:49', '2020-11-02 16:04:49', 0),
(4495, 59, 'The Order #106', 'Status changed to Payment received', 'order', 106, '2020-11-02 16:05:01', '2020-11-03 10:00:29', 1),
(4496, 62, 'The Order #106', 'Status changed to Payment received', 'order', 106, '2020-11-02 16:05:01', '2020-11-02 16:05:01', 0),
(4497, 59, 'The Order #106', 'Status changed to Delivery', 'order', 106, '2020-11-02 16:05:06', '2020-11-03 10:00:28', 1),
(4498, 62, 'The Order #106', 'Status changed to Delivery', 'order', 106, '2020-11-02 16:05:06', '2020-11-02 16:05:06', 0),
(4499, 62, 'The Order #106', 'The order extension has been sent to the lessor', 'order', 106, '2020-11-02 16:05:22', '2020-11-02 16:05:22', 0),
(4500, 59, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:06:23', '2020-11-03 10:00:26', 1),
(4501, 62, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:06:23', '2020-11-02 16:06:23', 0),
(4502, 62, 'The Order #106', 'The order extension has been sent to the lessor', 'order', 106, '2020-11-02 16:09:55', '2020-11-02 16:09:55', 0),
(4503, 59, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:10:59', '2020-11-03 10:00:24', 1),
(4504, 62, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:10:59', '2020-11-02 16:10:59', 0),
(4505, 62, 'The Order #106', 'The order extension has been sent to the lessor', 'order', 106, '2020-11-02 16:15:31', '2020-11-02 16:15:31', 0),
(4506, 59, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:17:02', '2020-11-03 10:00:19', 1),
(4507, 62, 'The Order #106', 'Status changed to Paid', 'order', 106, '2020-11-02 16:17:03', '2020-11-02 16:17:03', 0),
(4508, 24, 'The Order #107 has been Rented successfully!', 'From:  - To: ', 'order', 107, '2020-11-03 08:53:49', '2020-11-03 08:53:49', 0),
(4509, 54, 'The Order #107 has been Rented successfully!', 'From:  - To: ', 'order', 107, '2020-11-03 08:53:49', '2020-11-03 08:53:49', 0),
(4510, 24, 'The Order #107', 'Status changed to Pending', 'order', 107, '2020-11-03 08:55:26', '2020-11-03 08:55:26', 0),
(4511, 54, 'The Order #107', 'Status changed to Pending', 'order', 107, '2020-11-03 08:55:26', '2020-11-03 08:55:26', 0),
(4512, 24, 'The Order #107', 'Status changed to Approved', 'order', 107, '2020-11-03 08:55:41', '2020-11-03 08:55:41', 0),
(4513, 54, 'The Order #107', 'Status changed to Approved', 'order', 107, '2020-11-03 08:55:41', '2020-11-03 08:55:41', 0),
(4514, 24, 'The Order #107', 'Status changed to Request a preview', 'order', 107, '2020-11-03 08:55:55', '2020-11-03 08:55:55', 0),
(4515, 54, 'The Order #107', 'Status changed to Request a preview', 'order', 107, '2020-11-03 08:55:55', '2020-11-03 08:55:55', 0),
(4516, 24, 'The Order #107', 'Status changed to Agree to the preview', 'order', 107, '2020-11-03 08:56:07', '2020-11-03 08:56:07', 0),
(4517, 54, 'The Order #107', 'Status changed to Agree to the preview', 'order', 107, '2020-11-03 08:56:07', '2020-11-03 08:56:07', 0),
(4518, 24, 'The Order #107', 'Status changed to Paid', 'order', 107, '2020-11-03 08:56:45', '2020-11-03 08:56:45', 0),
(4519, 54, 'The Order #107', 'Status changed to Paid', 'order', 107, '2020-11-03 08:56:45', '2020-11-03 08:56:45', 0),
(4520, 24, 'The Order #107', 'Status changed to Payment received', 'order', 107, '2020-11-03 08:56:53', '2020-11-03 08:56:53', 0),
(4521, 54, 'The Order #107', 'Status changed to Payment received', 'order', 107, '2020-11-03 08:56:53', '2020-11-03 08:56:53', 0),
(4522, 24, 'The Order #107', 'Status changed to Delivery', 'order', 107, '2020-11-03 08:57:00', '2020-11-03 08:57:00', 0),
(4523, 54, 'The Order #107', 'Status changed to Delivery', 'order', 107, '2020-11-03 08:57:00', '2020-11-03 08:57:00', 0),
(4524, 54, 'The Order #107', 'The order extension has been sent to the lessor', 'order', 107, '2020-11-03 08:57:17', '2020-11-03 08:57:17', 0),
(4525, 24, 'The Order #107', 'Status changed to Paid', 'order', 107, '2020-11-03 08:58:30', '2020-11-03 08:58:30', 0),
(4526, 54, 'The Order #107', 'Status changed to Paid', 'order', 107, '2020-11-03 08:58:30', '2020-11-03 08:58:30', 0),
(4527, 24, 'The Order #107', 'Status changed to Received', 'order', 107, '2020-11-03 08:58:43', '2020-11-03 08:58:43', 0),
(4528, 54, 'The Order #107', 'Status changed to Received', 'order', 107, '2020-11-03 08:58:43', '2020-11-03 08:58:43', 0),
(4529, 24, 'The Order #107', 'Status changed to Received', 'order', 107, '2020-11-03 08:58:52', '2020-11-03 08:58:52', 0),
(4530, 54, 'The Order #107', 'Status changed to Received', 'order', 107, '2020-11-03 08:58:52', '2020-11-03 08:58:52', 0),
(4531, 24, 'The Order #107', 'Status changed to Retrieval', 'order', 107, '2020-11-03 08:59:04', '2020-11-03 08:59:04', 0),
(4532, 54, 'The Order #107', 'Status changed to Retrieval', 'order', 107, '2020-11-03 08:59:04', '2020-11-03 08:59:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('009c9696772b6b1bd9fa5b90a6d9f87eee34e7bd855e24277ff6cd1916f8333da8764639451ad3da', 35, 1, 'ejarly', '[]', 0, '2020-09-27 11:26:36', '2020-09-27 11:26:36', '2021-09-27 11:26:36'),
('017c0a91e80c403533b7655215ffdaebfdb630161a27f43337577bf75eb7fa1041ccb06bd7bd85af', 44, 1, 'ejarly', '[]', 0, '2020-09-20 15:45:50', '2020-09-20 15:45:50', '2021-09-20 15:45:50'),
('02307566d255dc5b2b99e1e67a8860b46e5e4d3b2f94fb66d8d2cc791e8f98d74a103e95d27ddc1b', 24, 1, 'ejarly', '[]', 0, '2020-11-02 08:01:10', '2020-11-02 08:01:10', '2021-11-02 08:01:10'),
('028974363d752e08eb47dd08721d00b79853f662771e79c7498310b5e9e50f7176c5e861bb786354', 42, 1, 'ejarly', '[]', 0, '2020-09-15 10:07:02', '2020-09-15 10:07:02', '2021-09-15 10:07:02'),
('02a5801e836453b61b6089aa84f562a94b922a83b73012ca396121e30e2c367ac5445e0fc28122d2', 3, 1, 'ejarly', '[]', 0, '2019-12-12 14:51:07', '2019-12-12 14:51:07', '2020-12-12 14:51:07'),
('02cf007dd332c7f6074c611330b00a7aeec90f444c32d354626ede8e294574709ea9d5fd09ba75b8', 4, 1, 'ejarly', '[]', 0, '2020-08-06 11:14:48', '2020-08-06 11:14:48', '2021-08-06 11:14:48'),
('02e730ccb9b3372575274c78c1dea676f16c5b939298d6b66503f78dcfa515f0f4e43dee55739072', 30, 1, 'ejarly', '[]', 0, '2020-07-12 13:25:48', '2020-07-12 13:25:48', '2021-07-12 15:25:48'),
('0321acf0b94432bab904c0375e489893dca9b376c60259b9f3ede9f51e70ccc146a4caf12c7030a6', 58, 1, 'ejarly', '[]', 0, '2020-10-27 18:36:35', '2020-10-27 18:36:35', '2021-10-27 18:36:35'),
('03a1c3c88500ce4cd9e160e89fb7a62692ef1bc58e603b87bd79b801afb69f0a3a4a61974c270c53', 21, 1, 'ejarly', '[]', 0, '2020-05-10 12:06:08', '2020-05-10 12:06:08', '2021-05-10 14:06:08'),
('05043721855c6d94c6cc76b22fb48a47cf6ad44f3a0b665f52df3e7d715ec337ac2b506ed64a5dd8', 22, 1, 'ejarly', '[]', 0, '2020-06-29 17:21:40', '2020-06-29 17:21:40', '2021-06-29 19:21:40'),
('058d8d5195cf5ad02870b266091683452f02ad47b68263f8e2356f6fcc8e5c8ca002d90b495a5ad1', 4, 1, 'ejarly', '[]', 0, '2020-07-22 08:45:16', '2020-07-22 08:45:16', '2021-07-22 10:45:16'),
('05ed5473031795f28568fd09b084ab1109972af5425340ce1aba014caeb89e6b22188133b2996d2d', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:17:10', '2020-09-10 08:17:10', '2021-09-10 08:17:10'),
('0602a95eeb0d3a5d403371dc1d079a474e3bf2fd6e0ff3699a53b965d21925611466e855e8883b0a', 31, 1, 'ejarly', '[]', 0, '2020-07-11 22:06:23', '2020-07-11 22:06:23', '2021-07-12 00:06:23'),
('065833cc0deb1be5983b49b397952d416eb6e54ddfdf31edeaf77b894739548b45e6d4a93b2a7f4b', 35, 1, 'ejarly', '[]', 0, '2020-09-16 14:20:09', '2020-09-16 14:20:09', '2021-09-16 14:20:09'),
('0658373bfcc88651d999387e3d022ff0ab5e77f827b022677462db847ba7265d8ce7fd0de2216195', 49, 1, 'ejarly', '[]', 0, '2020-10-20 17:43:21', '2020-10-20 17:43:21', '2021-10-20 17:43:21'),
('06770b4fa3cf9e28f29ee9267cfbe707430c89fe28fcf9490c32488e17f03c991dc450cb380ec068', 50, 1, 'ejarly', '[]', 0, '2020-10-18 11:42:15', '2020-10-18 11:42:15', '2021-10-18 11:42:15'),
('0836b437ca74e6359a38a51e01672af4410b55326dd842a3b468b1c18b5c9151ad01b4111a551d15', 33, 1, 'ejarly', '[]', 0, '2020-07-23 04:39:15', '2020-07-23 04:39:15', '2021-07-23 06:39:15'),
('083f296ff4f1e9461ee5f38db64fd3b2bb278cea78468e46e95e6b65ebf96d1cf10b7239188a0670', 35, 1, 'ejarly', '[]', 0, '2020-09-21 15:29:25', '2020-09-21 15:29:25', '2021-09-21 15:29:25'),
('08cf744ed6072d926af4d0a12d1d8a4468848f7f458ef51a4c45448e0e246ad67ab94b0545f83c03', 63, 1, 'ejarly', '[]', 0, '2020-10-28 10:37:42', '2020-10-28 10:37:42', '2021-10-28 10:37:42'),
('08f63acbc3823c5c3256ae3d40773dbe6459cae6e9e4d0aae50912b264fe50c07d188676976fead3', 49, 1, 'ejarly', '[]', 0, '2020-10-12 16:34:22', '2020-10-12 16:34:22', '2021-10-12 16:34:22'),
('0a0e8d454dc1a349750a0d8d6baa8187e5268d40c220541a29fbf576f15e2147f6690962df56c147', 26, 1, 'ejarly', '[]', 0, '2020-06-23 15:42:36', '2020-06-23 15:42:36', '2021-06-23 17:42:36'),
('0a1aff14c47ad1ea50751e57b440fb2a8a333568e6e00c899b4e76ba6c207dce40a8052e8898c185', 50, 1, 'ejarly', '[]', 0, '2020-10-01 06:59:19', '2020-10-01 06:59:19', '2021-10-01 06:59:19'),
('0ac8e5455f044b3a5dec8419880f83d1df0a5be0c3cc0c99402df0f42bdbfac56ac16f13b874473d', 35, 1, 'ejarly', '[]', 0, '2020-09-15 10:09:42', '2020-09-15 10:09:42', '2021-09-15 10:09:42'),
('0b2c8823c44db7da5c3f69e9ae0ea8f34181995b943e7a577824329c89a202fa0473e4f69097a41a', 7, 1, 'ejarly', '[]', 0, '2020-02-02 19:19:41', '2020-02-02 19:19:41', '2021-02-02 13:19:41'),
('0bca9ba87a33f90f87b41e3cff33b3c4e416633bdfda0b4e900c498ac634902ed638bb11ff68f303', 50, 1, 'ejarly', '[]', 0, '2020-10-18 08:28:31', '2020-10-18 08:28:31', '2021-10-18 08:28:31'),
('0c1dd118a8fb12fb077ed0957d7581407d527b55bd7794eb435ca2afcd2462a4c4dad31e15978294', 22, 1, 'ejarly', '[]', 0, '2020-06-29 17:28:03', '2020-06-29 17:28:03', '2021-06-29 19:28:03'),
('0cc41deac9307b94402faec3cb35683e611207277d5fd49824d0fc96b4279360d0fdd915db82f898', 32, 1, 'ejarly', '[]', 0, '2020-08-08 21:31:19', '2020-08-08 21:31:19', '2021-08-08 21:31:19'),
('0ccdb6e0fd79cb6f7706794896deec30100d22b143c7e8edb34488b4f934f3ea22df5eef217c2181', 28, 1, 'ejarly', '[]', 0, '2020-08-27 09:30:39', '2020-08-27 09:30:39', '2021-08-27 09:30:39'),
('0cd1e73801fa1f63811c73f0e7bc532eabc09e176522bc0ef6b118709832a07126eb25f005c00e32', 35, 1, 'ejarly', '[]', 0, '2020-09-20 10:31:48', '2020-09-20 10:31:48', '2021-09-20 10:31:48'),
('0d1342f36ab63fd45a294d703a2b21332004b7565605c3c543d93e138e1adcd61f95ec2529de5d82', 8, 1, 'ejarly', '[]', 0, '2020-01-26 21:09:40', '2020-01-26 21:09:40', '2021-01-26 15:09:40'),
('0d349ed2b1fb81ab1b22435e01058574a6a83de456a9866e85dfcf38bf165c71cc6b140653741c0c', 36, 1, 'ejarly', '[]', 0, '2020-09-15 09:56:11', '2020-09-15 09:56:11', '2021-09-15 09:56:11'),
('0db24d899b4b49c745ed4eb579f470abab00fc7776c34ab8111d3ac855af544e4468c5ed36c8d570', 38, 1, 'ejarly', '[]', 0, '2020-09-15 10:33:07', '2020-09-15 10:33:07', '2021-09-15 10:33:07'),
('0dcc0921c260b3b6eeb37b8615aa4052c28b091ed95ca4d6155e54ee319e769bad4de6e858ad421a', 3, 1, 'ejarly', '[]', 0, '2020-09-20 12:13:32', '2020-09-20 12:13:32', '2021-09-20 12:13:32'),
('0df155ef601a59d993e5420af7e35149d5afe99bba18530d613bf2995526b3adf386544348367305', 48, 1, 'ejarly', '[]', 0, '2020-09-23 10:30:57', '2020-09-23 10:30:57', '2021-09-23 10:30:57'),
('0e250b169749442b89ea2e70ffd8127caa2f32b1d436bd6c35aef336b9ae5d720a9a2fd8a4e276ac', 24, 1, 'ejarly', '[]', 0, '2020-09-06 14:07:59', '2020-09-06 14:07:59', '2021-09-06 14:07:59'),
('102111a289518d57116c4f9e00a44806f47ff1eb6da81aee687bc67494edb15e3b4482410ee764e5', 28, 1, 'ejarly', '[]', 0, '2020-09-08 18:14:43', '2020-09-08 18:14:43', '2021-09-08 18:14:43'),
('10a8a6df5f90f072cede0c0aa370e67de17f3450334f24a737b17b153ee0e18d15ffb4f97621ff80', 31, 1, 'ejarly', '[]', 0, '2020-07-14 14:18:08', '2020-07-14 14:18:08', '2021-07-14 16:18:08'),
('116f5232a46805d74dd313dbf75e281d5a2fa8c572d563975747c6ee93376aaff9f202c1ba13f8aa', 21, 1, 'ejarly', '[]', 0, '2020-06-29 16:37:02', '2020-06-29 16:37:02', '2021-06-29 18:37:02'),
('11e68984af668caf3bed328b35d7c1794d5b521079505ebb1ff0992c3bf627d4025e3819f8ce0c7e', 35, 1, 'ejarly', '[]', 0, '2020-09-23 08:29:01', '2020-09-23 08:29:01', '2021-09-23 08:29:01'),
('121ed4c0ea995f87c39490ae34f56615aab41bd29d17f81542f72d94ca8239374c53061df2b78be0', 3, 1, 'ejarly', '[]', 0, '2020-06-18 15:52:44', '2020-06-18 15:52:44', '2021-06-18 17:52:44'),
('12230ed5df00b89eb3024524b2529e1ca206ed8efca04afc00d294368dde351b8c2fb629b24466e6', 24, 1, 'ejarly', '[]', 0, '2020-09-03 07:57:32', '2020-09-03 07:57:32', '2021-09-03 07:57:32'),
('12aea9714e5c203a37c70ce113c3f1f96d5745d073f71e6504ab67e51243b118f839e448487da5ff', 49, 1, 'ejarly', '[]', 0, '2020-10-12 14:47:48', '2020-10-12 14:47:48', '2021-10-12 14:47:48'),
('12eca30e7beb84b01ed65c7b6e845ee3d4ba22252fa79400fba7edf09f3a4855491af469becde9d4', 31, 1, 'ejarly', '[]', 0, '2020-07-12 09:38:23', '2020-07-12 09:38:23', '2021-07-12 11:38:23'),
('135db11805f083805db2d0c6613acf316bfa38c07077089aac2b3ffe0f1f693e37aaf765a0b34b09', 35, 1, 'ejarly', '[]', 0, '2020-09-01 07:41:31', '2020-09-01 07:41:31', '2021-09-01 07:41:31'),
('13b07a736e8f1b6c07e9825a85bcc404293e768d9b5feb3b457e62f15ff1411f73749cc2e18030c0', 50, 1, 'ejarly', '[]', 0, '2020-09-27 15:45:51', '2020-09-27 15:45:51', '2021-09-27 15:45:51'),
('13ee03a96e6128810589d3f71bab01d722477de182401eb402e1860c36fea457620f7b4e7eec812c', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:57:08', '2020-09-10 08:57:08', '2021-09-10 08:57:08'),
('1523111631b559b5c03658afd5f19b03456a9c8f25d406ffb0aa7185c63f9b553fd2c710c8b5e37e', 47, 1, 'ejarly', '[]', 0, '2020-10-12 15:57:51', '2020-10-12 15:57:51', '2021-10-12 15:57:51'),
('155dcaf0a5f4d7efd28f6d173cab55ebdaac401c90eb1a858ecec95695b53e7dbc488293998b5555', 63, 1, 'ejarly', '[]', 0, '2020-10-28 10:38:11', '2020-10-28 10:38:11', '2021-10-28 10:38:11'),
('156783dee07a6e6eb7d72287816afdd9174d8a7554925bd39c2fdc0ec3a9df2a7c2b1e6ed4e11b70', 4, 1, 'ejarly', '[]', 0, '2020-05-07 07:40:30', '2020-05-07 07:40:30', '2021-05-07 09:40:30'),
('17398dcd55bdc35c4dceb48dd4bee1cec397354658a0cf31597c2c7af1c94290fc49018eaa05869e', 28, 1, 'ejarly', '[]', 0, '2020-07-12 10:09:23', '2020-07-12 10:09:23', '2021-07-12 12:09:23'),
('17b52e19074109af7f278d41d85e79af02fd56c74fb00ad3c6ef843be13749ae5434e5481ce0b289', 4, 1, 'ejarly', '[]', 0, '2020-06-18 14:37:12', '2020-06-18 14:37:12', '2021-06-18 16:37:12'),
('182a331b59f92fee12671c18aa917b484c1c9432bf6e61b9c361aed5214645a72b5e6d3867d88f15', 62, 1, 'ejarly', '[]', 0, '2020-11-02 14:58:29', '2020-11-02 14:58:29', '2021-11-02 14:58:29'),
('18627ae17a26419b7f2885c3d8d540b3937638774ea88c8fd8eac498c86c684d3f49a90e75a2b566', 32, 1, 'ejarly', '[]', 0, '2020-10-12 08:20:53', '2020-10-12 08:20:53', '2021-10-12 08:20:53'),
('18dff803d4ab5eab604c93964725457233ab13e43911b9cb3a0279b138db664d2d5da6d2ca6376ac', 4, 1, 'ejarly', '[]', 0, '2020-06-10 21:34:28', '2020-06-10 21:34:28', '2021-06-10 23:34:28'),
('191bac903ea90ac2eb206f5f3ab37aa296a8f634abd7056f952bde01dd0b492be44a1b87132a2644', 4, 1, 'ejarly', '[]', 0, '2020-08-27 14:06:41', '2020-08-27 14:06:41', '2021-08-27 14:06:41'),
('19912064ac359f348af305c89dd1c3ade8e57b4e75d6e92c3a8028f91ca76e742c22370f81934842', 49, 1, 'ejarly', '[]', 0, '2020-10-20 08:02:35', '2020-10-20 08:02:35', '2021-10-20 08:02:35'),
('19cce25c15b8a37f6bafce0e1f406f46ae162a0c0d09d6c7f8674221e029c2c5f6e3fd3c201b5096', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:44:42', '2020-09-21 09:44:42', '2021-09-21 09:44:42'),
('1b525b4a6f0fb1d4e88ca1f24b5e2b3b6bf57d8dfdf580c5b18375b37f474a7684eab6041f449f71', 22, 1, 'ejarly', '[]', 0, '2020-06-29 17:14:12', '2020-06-29 17:14:12', '2021-06-29 19:14:12'),
('1d00fbb7a4b88df16b3b20f475146c40f6a8a452dadd4e69b74d5e415662c0d4805cf77616282050', 5, 1, 'ejarly', '[]', 0, '2020-06-11 15:03:24', '2020-06-11 15:03:24', '2021-06-11 17:03:24'),
('1d0785e1115470cbcbf5f85914f358418a780fb4b248b0fd4a6d4cc84baa1c93450aba90217a2fa0', 21, 1, 'ejarly', '[]', 0, '2020-05-10 17:23:44', '2020-05-10 17:23:44', '2021-05-10 19:23:44'),
('1da4bd622b670ba7ae5593a43971adaede6b23163d8cda91de5743357ba242e11c412123b8ebc42e', 35, 1, 'ejarly', '[]', 0, '2020-09-17 16:28:59', '2020-09-17 16:28:59', '2021-09-17 16:28:59'),
('1dd5d966c33b932228b9fc4397398aeec7c2db15e7752847d3da41d38d1109c2468cde1968c51b60', 25, 1, 'ejarly', '[]', 0, '2020-06-17 10:00:24', '2020-06-17 10:00:24', '2021-06-17 12:00:24'),
('1df9f26349cbaf46b5e043a350fce4d6a6d2ec30cd07cf0e809aae5379d30c91ee99bc0953373872', 50, 1, 'ejarly', '[]', 0, '2020-09-29 07:46:01', '2020-09-29 07:46:01', '2021-09-29 07:46:01'),
('1dfca0f715f02cd7d4c9dab1ab504779f4dd6249276af4df2102e8bf2d6a40845596758538a8f0d2', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:56:11', '2020-09-10 08:56:11', '2021-09-10 08:56:11'),
('1e620d6c73385eea9fe57f201ad6122deb9b44b5ea0d1388e3cd75f43be7381cba6b056c1ff848d2', 54, 1, 'ejarly', '[]', 0, '2020-10-21 14:57:59', '2020-10-21 14:57:59', '2021-10-21 14:57:59'),
('1e9f8e531e41963815567cf67e2f396821bf607f12137f0c1eb208e025ffe6c8687eed41aad73153', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:28:00', '2020-09-10 08:28:00', '2021-09-10 08:28:00'),
('1edf795ad27d9f4e51646efd176af596c68de10a246c1f874801099a1a8481e407c188225a26b013', 35, 1, 'ejarly', '[]', 0, '2020-09-30 15:37:14', '2020-09-30 15:37:14', '2021-09-30 15:37:14'),
('1ee757437ce23848548542c42adde4c90bf1fb395acc0802d5cb6590d612d7078a51c2cc772d9f21', 35, 1, 'ejarly', '[]', 0, '2020-09-16 09:10:22', '2020-09-16 09:10:22', '2021-09-16 09:10:22'),
('1f3cf7f11c490477a56b13f98304e186dab2b0727023b04d72f18024beb5c36659160d622e8cfbe7', 35, 1, 'ejarly', '[]', 0, '2020-09-17 15:08:39', '2020-09-17 15:08:39', '2021-09-17 15:08:39'),
('1f517be9222afd3d5a33d5aa37ba02b1785c674e5d8928e8a59f46da227417fc25747c90c878ba54', 59, 1, 'ejarly', '[]', 0, '2020-10-27 16:48:44', '2020-10-27 16:48:44', '2021-10-27 16:48:44'),
('200d001f8b7ee28d91ffbd66fa450d3fd77fe6ee560335899d19688a01c161835e27c8fab2a0d260', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:22:41', '2020-01-28 13:22:41', '2021-01-28 07:22:41'),
('20540504cda2d97699b9acf60ba7ceb2cc411a5873ae18f4a7df4003194e79abb3f97b15954ac2ff', 49, 1, 'ejarly', '[]', 0, '2020-09-29 07:44:02', '2020-09-29 07:44:02', '2021-09-29 07:44:02'),
('217b6728cbe7202cf5c717ef27b1f26085187d6ac86bacee750afcad4b5f547cdc1439ffd8f7a77e', 35, 1, 'ejarly', '[]', 0, '2020-09-17 13:37:23', '2020-09-17 13:37:23', '2021-09-17 13:37:23'),
('21a01c91fc48f149f802a3d177ad11c39735f891ad4bd8220adae9ece1c5e36c52f561f203d33e94', 35, 1, 'ejarly', '[]', 0, '2020-09-20 12:25:35', '2020-09-20 12:25:35', '2021-09-20 12:25:35'),
('21e80582140a97ff07f375924139a19de88848c52572bbd09667dbe37f15778bd9a28842d4edabb8', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:24:47', '2020-01-05 17:24:47', '2021-01-05 17:24:47'),
('22035992069b50d0aea05a17d7905def4e8592a970cd95789849b88be4bfdf6f04979f7dbf8777eb', 59, 1, 'ejarly', '[]', 0, '2020-11-02 12:56:13', '2020-11-02 12:56:13', '2021-11-02 12:56:13'),
('2277b771327da2e1952e2e85810245a68e279593ada6209e12b6caac4684e5baa7504215b896bacc', 35, 1, 'ejarly', '[]', 0, '2020-10-22 13:06:15', '2020-10-22 13:06:15', '2021-10-22 13:06:15'),
('22969627fd4d27492c1fd381b73bd8c4949ba9d5e461a9faf048814199d3211face2ab89b5635f9a', 35, 1, 'ejarly', '[]', 0, '2020-09-06 15:32:28', '2020-09-06 15:32:28', '2021-09-06 15:32:28'),
('23853a9049ca6ac59e3ae37af2b3ec190b040b86797056ae417a3ac046e55679523d66b032c679e4', 49, 1, 'ejarly', '[]', 0, '2020-10-20 14:01:20', '2020-10-20 14:01:20', '2021-10-20 14:01:20'),
('23fc052982b2a02bac12a79c7a3dc6d2479b6e2e484767e7b111f35f1f291c756051e617d3406a8e', 5, 1, 'ejarly', '[]', 0, '2020-02-04 15:55:05', '2020-02-04 15:55:05', '2021-02-04 09:55:05'),
('246d7949882a76a1ac5fc0f412f2fb7460db61b62e0c49fba4107599106cca0e23d9fe9c0109892d', 24, 1, 'ejarly', '[]', 0, '2020-11-01 09:33:57', '2020-11-01 09:33:57', '2021-11-01 09:33:57'),
('246f0254daf484e9ee38634a67974a3be379b0019ff4d6101e5b8af9accfdda8f7087b096a83d97a', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:40:45', '2020-09-10 08:40:45', '2021-09-10 08:40:45'),
('25fed2df9c08942fe10962070aee24883a0480c9149e6a017ef84fe9430107ae85c68d2a28e84a2a', 59, 1, 'ejarly', '[]', 0, '2020-11-01 16:29:28', '2020-11-01 16:29:28', '2021-11-01 16:29:28'),
('2616148f980c5ba7ddb9a8602c02717a5116ea9661e9f14e6ab46b0a71b0fbfb04b2cf288963b215', 49, 1, 'ejarly', '[]', 0, '2020-10-22 13:26:41', '2020-10-22 13:26:41', '2021-10-22 13:26:41'),
('261ab89c83fcd1de3207673bc3bacec08582ebc6dee6a187e1d71f1464fbe9e5c439ceefceeadb5e', 49, 1, 'ejarly', '[]', 0, '2020-10-25 14:19:27', '2020-10-25 14:19:27', '2021-10-25 14:19:27'),
('27dbeb72c8096e7b27bdd6707eb7c853424698f8b25b9305be963f008a174b3e5b5e00d05df1df83', 24, 1, 'ejarly', '[]', 0, '2020-09-15 11:55:58', '2020-09-15 11:55:58', '2021-09-15 11:55:58'),
('283d24bfcb2b85cfe72bad3e690cdd21d4ecbf94cbf6bab2a10a6bcd369f44639471b58484921493', 35, 1, 'ejarly', '[]', 0, '2020-09-17 09:55:51', '2020-09-17 09:55:51', '2021-09-17 09:55:51'),
('2895929af2e7cce9624a96672e8c4eeef322ed2f5a21fd63ed4913c692136516bd9c43e17053463d', 28, 1, 'ejarly', '[]', 0, '2020-10-11 08:42:13', '2020-10-11 08:42:13', '2021-10-11 08:42:13'),
('28fe99028131e0aa674a878204e855eb1807c0a5d4f2c535130c7bf5816cbd1801342bbc38bbef17', 55, 1, 'ejarly', '[]', 0, '2020-10-26 11:42:11', '2020-10-26 11:42:11', '2021-10-26 11:42:11'),
('290983926bdf95a11809158999a7636b05fb731f7ae1060d96b53790882ed9737036fc31aaa4a831', 38, 1, 'ejarly', '[]', 0, '2020-09-15 10:35:37', '2020-09-15 10:35:37', '2021-09-15 10:35:37'),
('29918e79cfe1575a965d1d36edf3f325ad027403ed36c693454db9fe17dcb0947f278ffaa06fb2ec', 4, 1, 'ejarly', '[]', 0, '2020-09-14 18:04:06', '2020-09-14 18:04:06', '2021-09-14 18:04:06'),
('29b35f8173cdace8ee491286996d24ea637946d7b6297d1958fcc2b6b8257961623e258ee4171227', 30, 1, 'ejarly', '[]', 0, '2020-07-14 14:29:58', '2020-07-14 14:29:58', '2021-07-14 16:29:58'),
('29fada823a5b1d223e85679edc82f7fe34cd7fe9f0eead48f2fb61cb81be47d0e729e82ae3711a88', 28, 1, 'ejarly', '[]', 0, '2020-09-23 10:52:00', '2020-09-23 10:52:00', '2021-09-23 10:52:00'),
('2ad774d1844b58a4f7611ebb4d37cb14ed0f19cfaebfd0c814babb378be2d0211a784b6dedcfa931', 14, 1, 'ejarly', '[]', 0, '2020-04-01 12:49:32', '2020-04-01 12:49:32', '2021-04-01 14:49:32'),
('2ba30675eb47044d7a0600bc9cab73473e9a9c0f3f6903754f4c217be1174f170f060cc4ca42c4a1', 47, 1, 'ejarly', '[]', 0, '2020-10-21 17:51:41', '2020-10-21 17:51:41', '2021-10-21 17:51:41'),
('2bb219b4269bdea9ba09ae8297a2a88dd69a546c559efd7c4f9f09a30d92145c58a1fea480674f2d', 24, 1, 'ejarly', '[]', 0, '2020-09-23 07:37:27', '2020-09-23 07:37:27', '2021-09-23 07:37:27'),
('2c9a4e76414fda8d212d29fef13f6dd879c452cfe9e769621d6de472f083df1954d22e4718b9a776', 30, 1, 'ejarly', '[]', 0, '2020-07-11 22:10:48', '2020-07-11 22:10:48', '2021-07-12 00:10:48'),
('2d15540e62269387564d1ec23287ed07bab4ab3f2601330555d59585b53939a6771e507662a7506a', 22, 1, 'ejarly', '[]', 0, '2020-06-29 17:17:47', '2020-06-29 17:17:47', '2021-06-29 19:17:47'),
('2e16c2a45f5253aeed77175d40c6ab8da997bf2f3bd8d53cca40e275cad6b9e7a0971c7e291ee564', 46, 1, 'ejarly', '[]', 0, '2020-09-21 13:10:02', '2020-09-21 13:10:02', '2021-09-21 13:10:02'),
('2eb9ccd1a703e14cd1215b9cd35bb0c74034ef02d20a71c89dd9c6781b7ee97eeebc8853228d9b20', 44, 1, 'ejarly', '[]', 0, '2020-09-22 07:23:10', '2020-09-22 07:23:10', '2021-09-22 07:23:10'),
('2f152d1f0a0eef5ada7534a4c54e7b3d4c22704ba95a1281276997a4eaf3e3024fc17020b760e55e', 21, 1, 'ejarly', '[]', 0, '2020-06-18 17:06:11', '2020-06-18 17:06:11', '2021-06-18 19:06:11'),
('3031b0931a086f0697ef4a1fee41666e8cd70978324b0630241002400a647ba7155372f9e25f13a5', 24, 1, 'ejarly', '[]', 0, '2020-06-15 07:26:00', '2020-06-15 07:26:00', '2021-06-15 09:26:00'),
('30a3659be6496d66e2ae4583d765fede366d620326fb4fb7a6bf6c03c33318d434001c58a654edcb', 49, 1, 'ejarly', '[]', 0, '2020-10-21 17:31:22', '2020-10-21 17:31:22', '2021-10-21 17:31:22'),
('30b4fe534102f32337fc9b97509c699317ff28bdad6595ebb10132b0ebe7f5fc27ca7078e1553d24', 24, 1, 'ejarly', '[]', 0, '2020-09-16 09:10:06', '2020-09-16 09:10:06', '2021-09-16 09:10:06'),
('30fff22321e2bb35940b7d2ba5f9e64f22efb30bd1b72650c4181ee31a537ef23ed02fe56cc5597b', 3, 1, 'ejarly', '[]', 0, '2020-06-18 15:39:07', '2020-06-18 15:39:07', '2021-06-18 17:39:07'),
('315acf0a338a9f3c9911d7b5f344949533624a46116d998c37b653fb9ec56464d3e5eb31a90191be', 49, 1, 'ejarly', '[]', 0, '2020-10-12 10:45:39', '2020-10-12 10:45:39', '2021-10-12 10:45:39'),
('31f35f77ca18783140b51df7f405cfe77ad148507d25f2a165ffc5f0d3c9102fb75ce1a2bfc00e32', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:30:17', '2020-01-28 13:30:17', '2021-01-28 07:30:17'),
('31f84e2ef31928b208daef0e4544b4518c63a6ea678f68522bdf8e634a87f1b4fc93bbb0985b0307', 30, 1, 'ejarly', '[]', 0, '2020-07-11 22:21:14', '2020-07-11 22:21:14', '2021-07-12 00:21:14'),
('323efc35dfca8076236f996140c94bf5216d339bf85812b448ee8eb85635ed17f37321e13747d9ad', 35, 1, 'ejarly', '[]', 0, '2020-09-21 07:27:05', '2020-09-21 07:27:05', '2021-09-21 07:27:05'),
('33699bcdbc83eb4e024f9a32a553c50fd6bcd14d942d7eb66def2e55d38c4ae0f1859e3893f4bed0', 30, 1, 'ejarly', '[]', 0, '2020-07-14 14:15:11', '2020-07-14 14:15:11', '2021-07-14 16:15:11'),
('337c3b8fa255cdf8b472523ce0ec47c073b73f61306bc12a32745c9b964897732e51d7a2ab41300d', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:29:26', '2020-09-21 09:29:26', '2021-09-21 09:29:26'),
('33b3ff03a33c21c5c091385a8972a7218d7421df3046c6200da5bdff26897ece94baa69e94cd876e', 54, 1, 'ejarly', '[]', 0, '2020-11-02 14:19:36', '2020-11-02 14:19:36', '2021-11-02 14:19:36'),
('34c863f1aaa8189a2cf01f8948316eee5f2fff7a89df42629e180d642624db58611e8614deb14a27', 33, 1, 'ejarly', '[]', 0, '2020-09-09 14:28:32', '2020-09-09 14:28:32', '2021-09-09 14:28:32'),
('356b27e486a1d413bf4920e25c432fe88dd68ce5922c2d8fea11158e39491ffcaa3fd41f60c58e0c', 33, 1, 'ejarly', '[]', 0, '2020-08-09 18:45:35', '2020-08-09 18:45:35', '2021-08-09 18:45:35'),
('35eff207fd9ed883ebfb411ad5a0c555b88ad9db52b0dcc085e41062a0c1b05ecf563b894754887b', 35, 1, 'ejarly', '[]', 0, '2020-09-16 11:47:41', '2020-09-16 11:47:41', '2021-09-16 11:47:41'),
('3690aa0fd7504df1571045a2de6bb9a702facecf238ab885104d47ae2e6ddb159964eb58758f2009', 35, 1, 'ejarly', '[]', 0, '2020-09-20 13:34:08', '2020-09-20 13:34:08', '2021-09-20 13:34:08'),
('369ddfc01e77763f4b75cf65287a1883fd7c56e11157bf838da2db5e1bf30899eae02382774bc2b8', 5, 1, 'ejarly', '[]', 0, '2020-04-06 05:50:40', '2020-04-06 05:50:40', '2021-04-06 07:50:40'),
('36c6fe31816f4958db875f3a609ecf5c9a6f963e2faab600961c9adc282e0792ff8044c7f1ece61c', 49, 1, 'ejarly', '[]', 0, '2020-10-15 16:22:07', '2020-10-15 16:22:07', '2021-10-15 16:22:07'),
('36ccd7a5c13ccbe74f009d06603ab79cec683f6cd7cff3b17f784ee237a389b82bdec026bcf2a998', 24, 1, 'ejarly', '[]', 0, '2020-09-06 11:03:04', '2020-09-06 11:03:04', '2021-09-06 11:03:04'),
('37853f4c4df3fe282270d0baf0b2de1b0ce413be399c54a8d2de42839a7e52bff040d718be791da1', 28, 1, 'ejarly', '[]', 0, '2020-09-01 10:55:16', '2020-09-01 10:55:16', '2021-09-01 10:55:16'),
('37ea51d1482c94d650b59ca859c40a86986a1b1d2abf3e3fe68a573fa9803da4876182bd4496f1d4', 35, 1, 'ejarly', '[]', 0, '2020-09-08 08:30:58', '2020-09-08 08:30:58', '2021-09-08 08:30:58'),
('3833376280c74d28a92def2a2b5932a8fc5e76ad26009dd9022fb20058f1ba397d634e60d309cc18', 49, 1, 'ejarly', '[]', 0, '2020-10-20 14:34:34', '2020-10-20 14:34:34', '2021-10-20 14:34:34'),
('38b63aad0bf3703e7a290582cf018fadee9fba6b8632eca6d13e0dcd3d61dd32f815c1b34de59c49', 24, 1, 'ejarly', '[]', 0, '2020-09-15 10:38:56', '2020-09-15 10:38:56', '2021-09-15 10:38:56'),
('3a04aae11d4a827528b46355727d09f372227a490e16cc5d9cbc374f02e95f61c84030082861cbc5', 44, 1, 'ejarly', '[]', 0, '2020-09-22 10:39:20', '2020-09-22 10:39:20', '2021-09-22 10:39:20'),
('3a166707f98e3b382aec228d6ad4e7d3db3357e4d943e5e18fdbed83bffe8eb0dd7ebf07e280bd73', 31, 1, 'ejarly', '[]', 0, '2020-07-11 22:19:29', '2020-07-11 22:19:29', '2021-07-12 00:19:29'),
('3a90bc54099fd77b3659d9fcadb21f91b35d85bb251d1ba45b08e340a0d58d42454bb57b9532cded', 49, 1, 'ejarly', '[]', 0, '2020-09-27 11:20:54', '2020-09-27 11:20:54', '2021-09-27 11:20:54'),
('3af02b85a8023b7f21298a20d1467ff11979fb4771a731129c79f63d2cf81fe45670b6218707d7a0', 31, 1, 'ejarly', '[]', 0, '2020-07-12 12:40:06', '2020-07-12 12:40:06', '2021-07-12 14:40:06'),
('3b6bdbc3bc58f213c015250a76cf8f07ce95b00abdaf50f4ff86fae8c25a34f1f6ee3180c4cec21f', 33, 1, 'ejarly', '[]', 0, '2020-11-01 09:56:35', '2020-11-01 09:56:35', '2021-11-01 09:56:35'),
('3b813ec6d861076eadc658370c3af729c0cedd78cffb6e91d019199ef8c5b59bae61215a20747054', 4, 1, 'ejarly', '[]', 0, '2020-09-14 18:01:56', '2020-09-14 18:01:56', '2021-09-14 18:01:56'),
('3b9263a0ab88cf91e70a94a921de17099b8cf01f1208c42d9999218cdf0803461a73d8801b1bbc3a', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:18:05', '2020-01-28 13:18:05', '2021-01-28 07:18:05'),
('3b99dcc103839ecb4e7b0b8d1a7c8d6c3b8d234e05e76c025ef08e010babda4a3afc2df113888e08', 35, 1, 'ejarly', '[]', 0, '2020-09-10 16:49:32', '2020-09-10 16:49:32', '2021-09-10 16:49:32'),
('3ba345438560a2350e1fd7eccd9ddf492ed4ffa2cfffb829995d8d8e925b74909ae3798bb06a9bf2', 35, 1, 'ejarly', '[]', 0, '2020-09-30 11:21:41', '2020-09-30 11:21:41', '2021-09-30 11:21:41'),
('3ba96890e72ee475e79f6e4cdbea4dc0bca2904c6f6b3467ee66ac16b1bb1d5b8cf98b50eb509a91', 32, 1, 'ejarly', '[]', 0, '2020-09-21 16:03:49', '2020-09-21 16:03:49', '2021-09-21 16:03:49'),
('3bcd3d4bd253902eb6eec51078e1a5693363b196bebf31a2faadf4cfe61d94ff1e7d55cace6446a0', 43, 1, 'ejarly', '[]', 0, '2020-09-20 14:24:51', '2020-09-20 14:24:51', '2021-09-20 14:24:51'),
('3c1bcbfaf74046ee80f70e1fed8147c976bae16f6227b33840e15862d2cba4a3b3381ac45151053d', 11, 1, 'ejarly', '[]', 0, '2020-02-25 21:08:09', '2020-02-25 21:08:09', '2021-02-25 15:08:09'),
('3cbe788a7d54865940a6eeb3c13ec7ff1c18eb6011e884be6ba3aac98c97c17992e1620f4b64ae9f', 7, 1, 'ejarly', '[]', 0, '2020-01-26 21:21:36', '2020-01-26 21:21:36', '2021-01-26 15:21:36'),
('3dc959007b0e30e05bc1b4af8f7de4787eb2558456078da4ebe1acb18f9ab17d39a418a1a395bbea', 28, 1, 'ejarly', '[]', 0, '2020-08-27 15:58:42', '2020-08-27 15:58:42', '2021-08-27 15:58:42'),
('3e720608301050b2e2bb4d49566817a0faa6dd6f0290fda7e1d5c44c6af401bfc53d76b6d5eb367b', 1, 1, 'TutsForWeb', '[]', 0, '2019-12-09 16:04:25', '2019-12-09 16:04:25', '2020-12-09 16:04:25'),
('3e8c66a141f98ebd5fe08510f7e8c9ed780dd91b9e6ac406fff6040f0974757a45c5da17179cf424', 4, 1, 'ejarly', '[]', 0, '2020-08-27 18:40:01', '2020-08-27 18:40:01', '2021-08-27 18:40:01'),
('3ebe8c372d5bb96df49c06d2898b3d6bb30a25e092b0921cf87ab41f3701af10dda2827df2ea1903', 4, 1, 'ejarly', '[]', 0, '2020-06-10 13:04:01', '2020-06-10 13:04:01', '2021-06-10 15:04:01'),
('3f37e38856e445f0dfe60dc5893a3b462939098ba62ccc0da484b59b5215ab1c1a24511012e31a64', 43, 1, 'ejarly', '[]', 0, '2020-11-02 13:58:03', '2020-11-02 13:58:03', '2021-11-02 13:58:03'),
('3f59a23ccde97a7c241cf64e9a82dccbe02938a444c43b5ae2d08dce559bd0ca901682432294764a', 54, 1, 'ejarly', '[]', 0, '2020-11-03 07:57:43', '2020-11-03 07:57:43', '2021-11-03 07:57:43'),
('402052d24dd2410b2e6e9bf3c4ac863d27e69909b2f547e523e402ab9c88ffee46e996226d504cbe', 4, 1, 'ejarly', '[]', 0, '2020-08-06 11:15:02', '2020-08-06 11:15:02', '2021-08-06 11:15:02'),
('403a2b1988aeced7268daff8f579c73e9fa8423de4b0aa824a8406406256b2b77baef127b07d8746', 28, 1, 'ejarly', '[]', 0, '2020-08-26 08:11:30', '2020-08-26 08:11:30', '2021-08-26 08:11:30'),
('416e9cbdcad5d7bf517045d290e9f5a5d1a05928d9ec28f8bbb3c80afa070e63aece146c59c1ec75', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:25:50', '2020-09-10 08:25:50', '2021-09-10 08:25:50'),
('41883d788c36cea2aa301302fda9f324ca6881e7651ed3c9a63a3bab29b2d0c74598074ec5a51c01', 24, 1, 'ejarly', '[]', 0, '2020-09-06 08:39:39', '2020-09-06 08:39:39', '2021-09-06 08:39:39'),
('427dd671444dfaf1cd6893111acea27066724232bec55b5e7dfe6fcab26bdb7a441cd3ffada45e4d', 4, 1, 'ejarly', '[]', 0, '2020-09-14 18:03:44', '2020-09-14 18:03:44', '2021-09-14 18:03:44'),
('432a9ad322930c5efdb9cfbd0266f3a09d459ff22fb53daf88a34b085d24f83ce2ef04b5b76c172b', 26, 1, 'ejarly', '[]', 0, '2020-06-23 13:57:14', '2020-06-23 13:57:14', '2021-06-23 15:57:14'),
('43a162cac384ae64eee74f0428b9c2ffd89dec72aeecec12c07bea33841aaa038f6bbe2ad11a1568', 53, 1, 'ejarly', '[]', 0, '2020-10-21 08:41:08', '2020-10-21 08:41:08', '2021-10-21 08:41:08'),
('43aa37cb064c71b875cbdc04c10b2f93f2e416b833d7501623152263355918309ac1c9585b8cc48f', 5, 1, 'ejarly', '[]', 0, '2020-02-23 20:29:00', '2020-02-23 20:29:00', '2021-02-23 14:29:00'),
('44f1ede80499bf95e01572de5ca6b64ebdf80c9bec481da8f18d680701f8f9c8b70fed98f61fc49e', 18, 1, 'ejarly', '[]', 0, '2020-05-04 06:23:18', '2020-05-04 06:23:18', '2021-05-04 08:23:18'),
('4597c5778062d8cfeaedc60cadce7933d077d7f5a850ca89d5a2b5d4e03c8162d04d7dd58bdc1d70', 21, 1, 'ejarly', '[]', 0, '2020-07-15 20:20:23', '2020-07-15 20:20:23', '2021-07-15 22:20:23'),
('463561482e5789fb30a11ab29a86b043ebcd4245ec90c3e11a04cb4b1640aae919f78f3cedbc5fc8', 28, 1, 'ejarly', '[]', 0, '2020-09-21 10:03:03', '2020-09-21 10:03:03', '2021-09-21 10:03:03'),
('466e7caaa2334846ea8174ff9a22b903338e6053e9d0f96d4e5762fe0e2f963326d499ca95391e9a', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:26:42', '2020-01-05 17:26:42', '2021-01-05 17:26:42'),
('46780d971ccf467fddae78359ff0abc2c80b996d683ed48b49e15e03bcfd135333b212e16c0394c3', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:57:55', '2020-09-10 08:57:55', '2021-09-10 08:57:55'),
('4698777236fdca64b2db4d7a15be38994b29020653642367a00e6629eea50d94431929dd3c06ca92', 49, 1, 'ejarly', '[]', 0, '2020-10-11 12:35:01', '2020-10-11 12:35:01', '2021-10-11 12:35:01'),
('46ddea513b4dd4eb8fb032d9a9030caaf9d244f83df902d1d6c161e22fd303f5960aa252b64a624b', 33, 1, 'ejarly', '[]', 0, '2020-09-21 15:40:06', '2020-09-21 15:40:06', '2021-09-21 15:40:06'),
('46f992dd01ad99ca2a3ee7014429998b9ce8e02927c4e64b7578df05571f29e1973314ab1d4c8eb2', 35, 1, 'ejarly', '[]', 0, '2020-09-20 14:42:19', '2020-09-20 14:42:19', '2021-09-20 14:42:19'),
('4727494a972fce7a42663f5d72d55d316fdc747800f03dc38ac4704e9ed4e83a9b0a4904ded65855', 50, 1, 'ejarly', '[]', 0, '2020-10-19 13:15:17', '2020-10-19 13:15:17', '2021-10-19 13:15:17'),
('479bd10c55bdffa8ad9a8b4392439ffc6f95869d5e2e8d2fd116134e6099139b25fa40a469cd6314', 49, 1, 'ejarly', '[]', 0, '2020-10-19 10:37:27', '2020-10-19 10:37:27', '2021-10-19 10:37:27'),
('48379d75ff1f3a07c80a590383243225dae2b18007154400b91372a87b7b94fe7bf7bbcf723395d7', 35, 1, 'ejarly', '[]', 0, '2020-09-27 09:59:38', '2020-09-27 09:59:38', '2021-09-27 09:59:38'),
('48960d30582102c5852495760eedd6c81bfd5b093885474ce1c0a17c46454037dfd6c633103576a5', 30, 1, 'ejarly', '[]', 0, '2020-07-14 11:16:44', '2020-07-14 11:16:44', '2021-07-14 13:16:44'),
('48ff04cf673d1c7435eff2ce06f13fbb7f62ae4064754da918b93315f5059f9bc12a51ebb40748d0', 24, 1, 'ejarly', '[]', 0, '2020-09-24 08:06:22', '2020-09-24 08:06:22', '2021-09-24 08:06:22'),
('495e0393d4ebb2ac9a74cda40d2a843d31e932fc5171824bfadbe4cc8159a586c060272c376d366b', 50, 1, 'ejarly', '[]', 0, '2020-10-13 07:54:33', '2020-10-13 07:54:33', '2021-10-13 07:54:33'),
('497f7fae2a82626abdad0f53f0d4c843746999658daad25bee734a0ac27c82ea0b79c6799f7d21ea', 28, 1, 'ejarly', '[]', 0, '2020-09-24 12:04:45', '2020-09-24 12:04:45', '2021-09-24 12:04:45'),
('4a8ea283470548c337979e3dc425f61cbc562440fb5dc119494cfacecf4114015db5bc9d694a4141', 3, 1, 'ejarly', '[]', 0, '2020-01-26 21:03:25', '2020-01-26 21:03:25', '2021-01-26 15:03:25'),
('4b07fb163194eb86c3566d2c589c4b56008daa2fad81975c5762d545b46654e978c1446abbf76b62', 28, 1, 'ejarly', '[]', 0, '2020-09-20 14:27:36', '2020-09-20 14:27:36', '2021-09-20 14:27:36'),
('4b51ee9f908a6a22170bdeff48a9c852e0ea352eb29d612b6bd267c23362e967639461422e132343', 5, 1, 'ejarly', '[]', 0, '2020-05-05 10:51:43', '2020-05-05 10:51:43', '2021-05-05 12:51:43'),
('4b5bff88a927b2da97a3a6ade7aed0436abfa6c7279adde26c88a65a8519e17e26ed501ceffc12e4', 26, 1, 'ejarly', '[]', 0, '2020-07-08 13:35:49', '2020-07-08 13:35:49', '2021-07-08 15:35:49'),
('4bd52eb89fbae22e5a438bcdf32c4993cb84b69147e12bb1c4e780e2768f3682022f07af829fd93e', 35, 1, 'ejarly', '[]', 0, '2020-09-20 13:19:13', '2020-09-20 13:19:13', '2021-09-20 13:19:13'),
('4bdef201be98233f801e1c0c0828f545387161277bbc953d8fe9e0a5f49286d47a59da9ec8085a4d', 28, 1, 'ejarly', '[]', 0, '2020-08-06 11:21:15', '2020-08-06 11:21:15', '2021-08-06 11:21:15'),
('4bdfc78cc8bccbb4e44d1aa5c0cf44e6545ac37381183397392feb64c8e57fc658b86cf9b9095f6f', 5, 1, 'ejarly', '[]', 0, '2020-01-26 21:10:41', '2020-01-26 21:10:41', '2021-01-26 15:10:41'),
('4cfcc474e406f41f45b9f4ffd706e0ab08ebece89743750ecda23c524e632d4b34147b6293b52091', 38, 1, 'ejarly', '[]', 0, '2020-09-15 09:28:54', '2020-09-15 09:28:54', '2021-09-15 09:28:54'),
('4d3707e6306f1c474c488fd6292eb9325c58f15e74ecae10b0771801d6df1f664db570f10ba37d7e', 5, 1, 'ejarly', '[]', 0, '2020-06-18 12:49:32', '2020-06-18 12:49:32', '2021-06-18 14:49:32'),
('4e3d4409af5517c9910e9a73192e81468eea60dcb75d003ad89e800df6c1a65587f92564f05a4540', 50, 1, 'ejarly', '[]', 0, '2020-09-27 12:10:37', '2020-09-27 12:10:37', '2021-09-27 12:10:37'),
('4e8cb033d8555a05bf0533e46292ff71950ee5f7b3f527fdfcd518c7f3fd59ea21dfd6f2f1b8d164', 65, 1, 'ejarly', '[]', 0, '2020-11-01 16:12:43', '2020-11-01 16:12:43', '2021-11-01 16:12:43'),
('4e945d0531e7bf5139c18f520e9ee81a5a2e7c749479e446bbd64aa88b0f57392bf761ea9fa04b01', 31, 1, 'ejarly', '[]', 0, '2020-07-12 12:31:09', '2020-07-12 12:31:09', '2021-07-12 14:31:09'),
('4ec28b83dd705b73232c243a11da8fee1bdb1dbb2083a60069224f740974aab3819e51ea4cf74f35', 3, 1, 'ejarly', '[]', 0, '2020-01-08 16:49:10', '2020-01-08 16:49:10', '2021-01-08 10:49:10'),
('4f171b86373202416ade50c4b3d027ec5887a75350b18ef302c4e46d2f6a534094ab7fbc6543b5c0', 31, 1, 'ejarly', '[]', 0, '2020-07-21 13:15:28', '2020-07-21 13:15:28', '2021-07-21 15:15:28'),
('4f40c7f6c5d965649423b90fbdd24a20f2b709b9cb1b680a6b10a48ce09f3e7a18dd361752a7ffb0', 47, 1, 'ejarly', '[]', 0, '2020-10-12 08:16:06', '2020-10-12 08:16:06', '2021-10-12 08:16:06'),
('4ff6e5ba2a187c0a3b609eff8efff52a3ecb1b3d5d022f9566dd082d26071585ce62a6a1bb9d4cdb', 35, 1, 'ejarly', '[]', 0, '2020-09-15 09:42:15', '2020-09-15 09:42:15', '2021-09-15 09:42:15'),
('50c0366468ae89541d7703ae94393c6884b5e5387437bf6d87b181e3290c1e44610f0ec03201ade0', 43, 1, 'ejarly', '[]', 0, '2020-10-26 16:05:36', '2020-10-26 16:05:36', '2021-10-26 16:05:36'),
('50e9cff2ab1bf4577f431ae52616cf864f6d7875907a92e91c0886325c91c9d1d7789879c1e8fc50', 32, 1, 'ejarly', '[]', 0, '2020-11-01 10:18:28', '2020-11-01 10:18:28', '2021-11-01 10:18:28'),
('51015d1c0b8a5ba83a0d52ecd2e3a0861c2bdcb3d88792534694c856322a72521f1400a663648008', 30, 1, 'ejarly', '[]', 0, '2020-07-14 11:25:26', '2020-07-14 11:25:26', '2021-07-14 13:25:26'),
('51d4e17d083ddb3b5deb81c4e0033d30ed78c4e9cd13d2126dfd6df4751b8259bb9e336c102d1fdd', 43, 1, 'ejarly', '[]', 0, '2020-09-20 14:28:08', '2020-09-20 14:28:08', '2021-09-20 14:28:08'),
('52c8cccf248cbd266d910813dfef78ad0c91e68afd7689b6575eeb2d4c007f54890c0b785983ddc9', 54, 1, 'ejarly', '[]', 0, '2020-11-01 10:16:10', '2020-11-01 10:16:10', '2021-11-01 10:16:10'),
('52ef0d1cd947a950e7d1500b1dfd866a143f593ac6a9d1d5e86b71a2dd0f0d5e79bc9eb0bcf25dd9', 43, 1, 'ejarly', '[]', 0, '2020-10-22 15:00:52', '2020-10-22 15:00:52', '2021-10-22 15:00:52'),
('53a539c183d667523c69dc5c82c55d2b6f831b2ccaf159d39091ef0b651c690135cbad21668e1e08', 5, 1, 'ejarly', '[]', 0, '2020-06-22 07:48:48', '2020-06-22 07:48:48', '2021-06-22 09:48:48'),
('5464c376656dc31b745b733b524cbe375fc49000bbd2b3947886586ed90062c694604c83ccf069c0', 20, 1, 'ejarly', '[]', 0, '2020-05-05 12:14:49', '2020-05-05 12:14:49', '2021-05-05 14:14:49'),
('554b39a9219cab08144fe0d89b98039eec11cb1e492ba847d01cd8fc1485614831cc46995bfdfdb1', 35, 1, 'ejarly', '[]', 0, '2020-09-17 08:48:43', '2020-09-17 08:48:43', '2021-09-17 08:48:43'),
('562f4abb0ed81f0c2d968a6876101e6abf88136cbe213428ca5780c56d7e5045bddd443c4b3f4203', 40, 1, 'ejarly', '[]', 0, '2020-09-15 09:56:59', '2020-09-15 09:56:59', '2021-09-15 09:56:59'),
('574931d6d9d8b2e4960e13ec31574f42696cdf9dcf2743f6a57102de9938e422a7274854ede26723', 28, 1, 'ejarly', '[]', 0, '2020-07-08 12:30:58', '2020-07-08 12:30:58', '2021-07-08 14:30:58'),
('576054aec3f2aa61ddf04fe0edb04543f5b5537e24229e04fbc4c458e50bad6a70709fb60db47989', 31, 1, 'ejarly', '[]', 0, '2020-07-14 11:06:34', '2020-07-14 11:06:34', '2021-07-14 13:06:34'),
('57a5a510327443d65823b21fa2e6f26e129677c7d27b5f26dea04d8796d308e70b59f8d73e90d0f1', 24, 1, 'ejarly', '[]', 0, '2020-09-15 14:22:49', '2020-09-15 14:22:49', '2021-09-15 14:22:49'),
('581f3f67fc9247f42dd34aa2f67b74df87dc2dd044e2572f3c7a078e0694f272396eb0f3e4f90535', 28, 1, 'ejarly', '[]', 0, '2020-08-06 09:49:39', '2020-08-06 09:49:39', '2021-08-06 09:49:39'),
('5866b5e80839cb08bfc840f938e5ef0088845558d97da0fae56a875163bd61b33388fa1c604429e1', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:36:20', '2020-09-21 09:36:20', '2021-09-21 09:36:20'),
('589bf443c04ebcc372032e4a4c54a8e546f8f048809baa79f306eb5a38dd908ba45da27d0f5c3d92', 21, 1, 'ejarly', '[]', 0, '2020-06-29 17:03:13', '2020-06-29 17:03:13', '2021-06-29 19:03:13'),
('59bf76d853bd16806f29b9cc785f2f5ca3862455885d9b3884a46efff655bff39f043b14d23e0370', 35, 1, 'ejarly', '[]', 0, '2020-09-14 08:52:01', '2020-09-14 08:52:01', '2021-09-14 08:52:01'),
('59d61a6d0053d5ba01e8f4ae8b5670fc17ca9931a4b9077821653dcf5115d0b967f7a2a523d6c94b', 33, 1, 'ejarly', '[]', 0, '2020-08-18 15:25:19', '2020-08-18 15:25:19', '2021-08-18 15:25:19'),
('5ad653580cf7071f6c2b3d27865ab1239b6bfd6b2f0764c88a2d9b3d55c354384235d3b208f3e0d1', 35, 1, 'ejarly', '[]', 0, '2020-09-17 10:17:42', '2020-09-17 10:17:42', '2021-09-17 10:17:42'),
('5b11f1be5a81ce5e462be30dd243403fb83d12e61fe451ea3f7cd364f2d490f102f7c2ddcebd2b16', 32, 1, 'ejarly', '[]', 0, '2020-10-13 14:21:47', '2020-10-13 14:21:47', '2021-10-13 14:21:47'),
('5b24278cb5e805bb0d7f1c43b3492bfec9760ff19f692d80b279ce37426eb6ac987ae07e07fc1bd7', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:16:28', '2020-01-05 17:16:28', '2021-01-05 17:16:28'),
('5c1b568a32a0d7a8849864aa5fec7217c04bdf71d9f26191cfc75ee288c865f83c2b914377478759', 24, 1, 'ejarly', '[]', 0, '2020-09-02 14:05:57', '2020-09-02 14:05:57', '2021-09-02 14:05:57'),
('5d090174d8b3298af657d02cc1096a5986562795421c287c4475215c68c70b404a20b9647b5787d0', 35, 1, 'ejarly', '[]', 0, '2020-09-15 14:57:16', '2020-09-15 14:57:16', '2021-09-15 14:57:16'),
('5d0ddafd1178595fe7af24eaa34d10cf5a55c68c7cac00bc1c05d7fef470f040ae5c4566fd7a1f8b', 24, 1, 'ejarly', '[]', 0, '2020-09-08 08:49:49', '2020-09-08 08:49:49', '2021-09-08 08:49:49'),
('5dd407e94b8f849754a58996d2c577f9081136d617ee140d9a10c98b2e09c53079dd617fac17d7be', 32, 1, 'ejarly', '[]', 0, '2020-08-21 07:45:26', '2020-08-21 07:45:26', '2021-08-21 07:45:26'),
('5df725367013b744c46ce63798cd16048113b5d0a77aaa2c2ee1025eb8ac08b3e731940a92a080e7', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:14:39', '2020-01-28 13:14:39', '2021-01-28 07:14:39'),
('5e7b41f3a0c8700880786932a3369e4da3078dbfa0488376fcbfc939baa8d0fcb327d27fdd663f1a', 49, 1, 'ejarly', '[]', 0, '2020-10-15 15:03:27', '2020-10-15 15:03:27', '2021-10-15 15:03:27'),
('5e9a5c31e19124e8510e6046622c1cc7b367e66784cf86c9bc38474e049ae69046eda9004d72009f', 35, 1, 'ejarly', '[]', 0, '2020-10-28 17:04:16', '2020-10-28 17:04:16', '2021-10-28 17:04:16'),
('5fd344c63677bfd8d35b3b00ab84b2067be1bd3eba55a4b08c2bc4756171c6aa7b3551d99b332424', 32, 1, 'ejarly', '[]', 0, '2020-10-08 07:36:26', '2020-10-08 07:36:26', '2021-10-08 07:36:26'),
('5ff1cb9e6c47345e023658414570434757fd0ca990282bcfda4364a3c30d68c3f3efba193c811555', 24, 1, 'ejarly', '[]', 0, '2020-09-03 15:33:10', '2020-09-03 15:33:10', '2021-09-03 15:33:10'),
('5ff2b46224b93a8d437180356d0c2ae758bdf9b70eeb13e45239baac860d92149d40d98d5e9456f4', 30, 1, 'ejarly', '[]', 0, '2020-07-22 09:26:26', '2020-07-22 09:26:26', '2021-07-22 11:26:26'),
('60fde555a3374367ff5650291d1cd120e01445d98c7802ee5ca3045de75173b92ffd3a8e59ae597a', 28, 1, 'ejarly', '[]', 0, '2020-09-15 10:16:43', '2020-09-15 10:16:43', '2021-09-15 10:16:43'),
('61060b7f4c11b20fffff8be4b35eb14c66bd86838625a105f63e7bdfda65b11d646309beac1af558', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:22:46', '2020-09-21 09:22:46', '2021-09-21 09:22:46'),
('621929fb172b1b7c8895a0dc762998117c8d1395dadbadb8af51a0954fd30dfc73c162a5eb26b1fe', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:20:03', '2020-01-28 13:20:03', '2021-01-28 07:20:03'),
('622175876c74704ce0930630e859ecb763635a79a9e3c227d0920dcf15341e87b5bdfb4ccb2d2d4e', 49, 1, 'ejarly', '[]', 0, '2020-10-19 09:24:00', '2020-10-19 09:24:00', '2021-10-19 09:24:00'),
('623c9c7c16fd588b1c6e347e575dc5e59f680f15dc2c39fcd1d9c87c869096825661035cf5e50b75', 3, 1, 'ejarly', '[]', 0, '2019-12-12 15:14:44', '2019-12-12 15:14:44', '2020-12-12 15:14:44'),
('6253ad1a346e959ddb9fb395db6d60ea900343afaef46d1f5471371d642b1b55098151362d1e43c5', 53, 1, 'ejarly', '[]', 0, '2020-10-22 11:47:22', '2020-10-22 11:47:22', '2021-10-22 11:47:22'),
('6299500c8fa20f7fdabe91def27d1fa15b88e330efdf1c45b77ad9bff1b79e3908cdd02513114217', 26, 1, 'ejarly', '[]', 0, '2020-06-29 11:52:57', '2020-06-29 11:52:57', '2021-06-29 13:52:57'),
('629efe3aa8804019d6ea254970ddd5234d1915d970cad3d8fb1d8927ef3c2d90f0e11f1e5ae1d0a2', 24, 1, 'ejarly', '[]', 0, '2020-11-01 09:35:30', '2020-11-01 09:35:30', '2021-11-01 09:35:30'),
('63672482d2fec818e5a7d9b7239dd6811a55665c8ee81dc7d40ede4eefc44148a582af0c0ec84ab6', 24, 1, 'ejarly', '[]', 0, '2020-09-09 15:37:09', '2020-09-09 15:37:09', '2021-09-09 15:37:09'),
('6450a97db36ab97a128e1ab1c530b4adf2c3f4dbdc82c79fbeed125fb3287356257c85dbdc6d132b', 32, 1, 'ejarly', '[]', 0, '2020-10-21 15:28:21', '2020-10-21 15:28:21', '2021-10-21 15:28:21'),
('645b60115e6da9f0c5f8cee4df5d452929f237d88bde2a2f339a2f895d64f31d67e9834717568134', 16, 1, 'ejarly', '[]', 0, '2020-04-30 16:17:39', '2020-04-30 16:17:39', '2021-04-30 18:17:39'),
('6521f7858fd72bda83a8455cc74d386562d12826172ea8a39c3019facc82b0b050a84604e60d83db', 24, 1, 'ejarly', '[]', 0, '2020-09-09 09:01:15', '2020-09-09 09:01:15', '2021-09-09 09:01:15'),
('656fe2c83f94f541803a91ebbbb4772ccbc4831c06ddef46024cf54ad76cc8727e4814579b022813', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:18:57', '2020-01-28 13:18:57', '2021-01-28 07:18:57'),
('65ba590ec13afbe71f997052febdae3a2c909c7546a45d259d26d5dd92fd3aaa27381af4f816f566', 21, 1, 'ejarly', '[]', 0, '2020-06-11 18:14:31', '2020-06-11 18:14:31', '2021-06-11 20:14:31'),
('66284b3daff1ee3e757eb2ef3362a8400955b2a1e06005944b978a4acdd6e336c319cf33f9b3dd50', 49, 1, 'ejarly', '[]', 0, '2020-10-11 13:55:52', '2020-10-11 13:55:52', '2021-10-11 13:55:52'),
('6684dab7aa43059bdaedaa4984c29f737dc54336edbaba6adcb8892f44ceeb2990bf13c09cd008cf', 5, 1, 'ejarly', '[]', 0, '2020-01-26 20:35:48', '2020-01-26 20:35:48', '2021-01-26 14:35:48'),
('6717d4782ba32af8b399e3d1f40c1e5a4168364582638f50d3b25d0d0cfa6b8c5902ab5bd18c006d', 4, 1, 'ejarly', '[]', 0, '2020-03-26 12:49:41', '2020-03-26 12:49:41', '2021-03-26 13:49:41'),
('6785140b57f128dba08ed4af5542811551006d3d02c05cdaf932efb893269472e6390190c89e2b2c', 61, 1, 'ejarly', '[]', 0, '2020-10-28 18:36:04', '2020-10-28 18:36:04', '2021-10-28 18:36:04'),
('697718430204dae9ac4b30a7d4c0e04a74b97461f0dadb93052cc32ea8abd9832e5c9e0f18d28fa6', 49, 1, 'ejarly', '[]', 0, '2020-10-25 13:37:43', '2020-10-25 13:37:43', '2021-10-25 13:37:43'),
('6a5314f2dfaa6894019921c78947de97b9ee9e4e8b1b3297696fb9e6e5d569d09efd0ecea7c5a5fb', 49, 1, 'ejarly', '[]', 0, '2020-10-15 13:07:41', '2020-10-15 13:07:41', '2021-10-15 13:07:41'),
('6b232ff033ef3294cf67258404d2daaa109589b5eeec954f75e8b1541732d9fa4885e5f57b33cb97', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:39:29', '2020-01-05 17:39:29', '2021-01-05 17:39:29'),
('6b377b3920063e21693fe7029b7291357e0c3db84aad0ad2151fbb940f6286d7083f91e5e6eb0614', 50, 1, 'ejarly', '[]', 0, '2020-10-20 14:30:45', '2020-10-20 14:30:45', '2021-10-20 14:30:45'),
('6b6cff2d319370eff42c312dd1f48e2950e8d3d505575da13a5539d05d5584ed80569c7cadab313a', 35, 1, 'ejarly', '[]', 0, '2020-09-09 11:27:35', '2020-09-09 11:27:35', '2021-09-09 11:27:35'),
('6b9c09a34c6283896f30c5dfe522d4fddc9d4dee06d769f393e34405b52600c9092e24cad2df4aca', 16, 1, 'ejarly', '[]', 0, '2020-06-18 17:09:23', '2020-06-18 17:09:23', '2021-06-18 19:09:23'),
('6bc6d9bb9bdf45684299de2372755441a146f93db1126dfd16b6e65442ed9449e7bb8c28aad2437f', 16, 1, 'ejarly', '[]', 0, '2020-06-18 16:41:13', '2020-06-18 16:41:13', '2021-06-18 18:41:13'),
('6bd375a19c58061f2169a7bfa5b77ef74dbf18a5d84cfe022243ab9e00d2f81a65f21180c09a4e9a', 5, 1, 'ejarly', '[]', 0, '2020-06-09 13:08:20', '2020-06-09 13:08:20', '2021-06-09 15:08:20'),
('6be929985b864c50baaba346666f5f47fe498281954c08a6b2037599f140e6d548558168468c70a0', 35, 1, 'ejarly', '[]', 0, '2020-09-27 11:29:15', '2020-09-27 11:29:15', '2021-09-27 11:29:15'),
('6c9a112da231ed28255f33aaec7581d85d499646e513f8e4ec7bbb296e21d0c794dd4e6038e7c8d6', 35, 1, 'ejarly', '[]', 0, '2020-10-25 13:17:52', '2020-10-25 13:17:52', '2021-10-25 13:17:52'),
('6ca6af26f10cdc8e335ed7ab5c8b61b26ec6680614b4ddddb9f141b3deaabb5498ec46770b55a596', 53, 1, 'ejarly', '[]', 0, '2020-10-21 15:11:39', '2020-10-21 15:11:39', '2021-10-21 15:11:39'),
('6d12d0f1a0ebf0e5df99e7a2f7aff12c9991e5b34501a2e02ac9f3cffc1927b512c28fc924e30561', 28, 1, 'ejarly', '[]', 0, '2020-09-16 12:26:34', '2020-09-16 12:26:34', '2021-09-16 12:26:34'),
('6d9bfa9b59bcef3a7e9913f1ca87925d20df889e6cd5d31a8a7e62b32b4da7788e341fdd702151e8', 30, 1, 'ejarly', '[]', 0, '2020-07-12 12:26:48', '2020-07-12 12:26:48', '2021-07-12 14:26:48'),
('6db1c6be68d716a438a1a8e63d0b50135499945601975aae1c8bf56b60e101bcf880a76380fe7a92', 4, 1, 'ejarly', '[]', 0, '2020-06-09 10:28:46', '2020-06-09 10:28:46', '2021-06-09 12:28:46'),
('6df8b13b8d8523d183e9f5d45691ec4ded991018086b630ae31b45e81ae5e475a1c033ed90275c5c', 49, 1, 'ejarly', '[]', 0, '2020-09-29 15:38:54', '2020-09-29 15:38:54', '2021-09-29 15:38:54'),
('6f239b6e7eda5b6569ac8800737e3eaeb68b39040e86a713fe9bb7f2c3395c13c3f328cff68205ff', 49, 1, 'ejarly', '[]', 0, '2020-09-27 15:43:58', '2020-09-27 15:43:58', '2021-09-27 15:43:58'),
('6f45a42c1dd8d4a205094431de11f1b5f8d4a8c97f378010abeb661e6fdc68cd372e33b0ca790b5c', 5, 1, 'ejarly', '[]', 0, '2020-06-10 14:40:39', '2020-06-10 14:40:39', '2021-06-10 16:40:39'),
('6f6aeb446d80aaa955b9601f41b7304851ab16c902e1d214c9d5e9023857abc30546176bffcc5ae5', 49, 1, 'ejarly', '[]', 0, '2020-10-19 13:16:12', '2020-10-19 13:16:12', '2021-10-19 13:16:12'),
('6fc57399a5d4f8e397c8c6363c9732e9b347bcac92654673b818235c252c223033a6b93ce2d2dd34', 4, 1, 'ejarly', '[]', 0, '2020-06-18 15:39:17', '2020-06-18 15:39:17', '2021-06-18 17:39:17'),
('7013bd7fea19d1b10c23ad15f4c2ac97c4c9df291d11fc3542196fa31b4e07dfa3293c40264bbce6', 48, 1, 'ejarly', '[]', 0, '2020-09-22 14:01:37', '2020-09-22 14:01:37', '2021-09-22 14:01:37'),
('7072f1a6fa9e20d7a27998f06cc72738a5cb799f161071da8ab5f8d48fc5f1503cc719593de42b69', 4, 1, 'ejarly', '[]', 0, '2020-06-09 14:25:22', '2020-06-09 14:25:22', '2021-06-09 16:25:22'),
('70ac52f098bebc17454e379594dc1506894a6a8cbef95de0d617b92196d4f3dd39a3cb2d83fc94ea', 35, 1, 'ejarly', '[]', 0, '2020-10-21 15:03:59', '2020-10-21 15:03:59', '2021-10-21 15:03:59'),
('70fe8e925da752217244d709b92d65723a05d58f05368357444e12cae02756ba97fa041e0cdff3a7', 54, 1, 'ejarly', '[]', 0, '2020-11-02 14:09:37', '2020-11-02 14:09:37', '2021-11-02 14:09:37'),
('713bb520fbee0253d286bbda114f86f2d024e4e1096f401d1fc4ab6a518f86fe5cb456471a84a042', 49, 1, 'ejarly', '[]', 0, '2020-10-11 08:54:46', '2020-10-11 08:54:46', '2021-10-11 08:54:46'),
('721fb70a6cab1c0bf602e20a8d2f6ced51cf4b7076d2431151d0ffac0f443d8c14d190101e866e50', 19, 1, 'ejarly', '[]', 0, '2020-05-05 11:57:49', '2020-05-05 11:57:49', '2021-05-05 13:57:49'),
('723880bcf9b387d747955ae64d5a430a92a55d3728075ecc0ad2f91a4ea367b2014bdd2a4f1c551a', 50, 1, 'ejarly', '[]', 0, '2020-10-18 13:01:20', '2020-10-18 13:01:20', '2021-10-18 13:01:20'),
('7275643a671e5ff9e5672f17fe5d4d8a9cca663dfa806e89de9482eb888df3b570a15d1e7d0fed33', 35, 1, 'ejarly', '[]', 0, '2020-09-06 12:22:41', '2020-09-06 12:22:41', '2021-09-06 12:22:41'),
('728e0d02113aa879410b1f2eeb73612318aa8bfaf2f93a18b3976079ac2e53e27146d690ae6aa17d', 21, 1, 'ejarly', '[]', 0, '2020-06-11 17:46:21', '2020-06-11 17:46:21', '2021-06-11 19:46:21'),
('73128e501c7c43932db149efb2c89f5711794d4c877ad20ba2de9364bd2a03bffe4a5f2c195e6076', 47, 1, 'ejarly', '[]', 0, '2020-09-30 08:28:45', '2020-09-30 08:28:45', '2021-09-30 08:28:45'),
('7472df67c11ebd12d8d4a47afdb79df6a61fad9732d5725a36a2571373551bc46fe093f4bb80a5d4', 59, 1, 'ejarly', '[]', 0, '2020-10-27 16:14:41', '2020-10-27 16:14:41', '2021-10-27 16:14:41'),
('74e02bf8f1facc3bef2073692973f1d026640c7bb8f13ccae298b334b8e8c48ed3f01a733ab4e1f5', 31, 1, 'ejarly', '[]', 0, '2020-07-14 11:13:39', '2020-07-14 11:13:39', '2021-07-14 13:13:39'),
('7508375f58f2fce6a8f7b56ac042599e3a5ad0a159f20393a80ce5c7a2d5a765a62f15318ae05919', 35, 1, 'ejarly', '[]', 0, '2020-09-20 08:45:26', '2020-09-20 08:45:26', '2021-09-20 08:45:26'),
('75d8110bb8301868a5d5b9d7116d8aaf48c7d0ae571a72fad8c8f5fa74fb815298bcfabbb0b15ce3', 7, 1, 'ejarly', '[]', 0, '2020-01-26 21:21:43', '2020-01-26 21:21:43', '2021-01-26 15:21:43'),
('75ffb02f2e5f61f2f933ce89a8105580d20890c56037c0ba9a8433a4c83b9d8c74bb223565057a4a', 35, 1, 'ejarly', '[]', 0, '2020-10-22 13:12:04', '2020-10-22 13:12:04', '2021-10-22 13:12:04'),
('763195a75532d3a37b47353f168f44ac6fd83f78af5252347d619d3d966aab63caf4fc8b0857ad8f', 28, 1, 'ejarly', '[]', 0, '2020-09-20 09:11:06', '2020-09-20 09:11:06', '2021-09-20 09:11:06'),
('76384c5926aa305fc32d712d5dfd65eac3302779d02d3b5da9dc86bafaa22976c1480006d3b86086', 35, 1, 'ejarly', '[]', 0, '2020-09-09 09:02:45', '2020-09-09 09:02:45', '2021-09-09 09:02:45'),
('7769036d9c3641fbf5de3f73f8b334f295311153fd665a61162a5a94c7a77d17104e481f70f6494e', 49, 1, 'ejarly', '[]', 0, '2020-10-01 07:02:58', '2020-10-01 07:02:58', '2021-10-01 07:02:58'),
('77e9d5e43f2278b1ad172d327d7ee876541aadfe0268b7ee57af7c2d1bbe3fc2b801ce1839d1de55', 54, 1, 'ejarly', '[]', 0, '2020-10-28 18:35:52', '2020-10-28 18:35:52', '2021-10-28 18:35:52'),
('7833dc1e53a55aaab9387159b125750b18c405d0563b96081b1c02f65d234a0a29753535f23578d2', 35, 1, 'ejarly', '[]', 0, '2020-09-02 14:22:04', '2020-09-02 14:22:04', '2021-09-02 14:22:04'),
('790f8772badf6fdb63a5968d26de298900bbe657fdd6791baf2d3c9d0b6eb3819a3edfe4c513c32d', 64, 1, 'ejarly', '[]', 0, '2020-11-01 15:54:40', '2020-11-01 15:54:40', '2021-11-01 15:54:40'),
('79b1e9ada2730ee5ad2b13e7635220be9995209d58fc687cc4c9ac2a3fed4a52766af3f35568f343', 32, 1, 'ejarly', '[]', 0, '2020-09-23 14:17:26', '2020-09-23 14:17:26', '2021-09-23 14:17:26'),
('7a2c113ef9e28a8562563f52130f8590411366834be60cd322832e529ebbf863f9871c10fa1071ec', 35, 1, 'ejarly', '[]', 0, '2020-09-17 15:05:36', '2020-09-17 15:05:36', '2021-09-17 15:05:36'),
('7a404e93989f4c9140f3f6de3e0188062466b4d3cddf2547db5fba53463159fcfafbfab98e248284', 49, 1, 'ejarly', '[]', 0, '2020-10-19 15:03:48', '2020-10-19 15:03:48', '2021-10-19 15:03:48'),
('7a5c062dca0e485b2e8c12c51dd3c581bcbc184687d30d8180bb85a012b690b79d228a96849b3e20', 4, 1, 'ejarly', '[]', 0, '2020-08-06 11:14:55', '2020-08-06 11:14:55', '2021-08-06 11:14:55'),
('7acf5deee7230177d1b433130b84e12bbd6db1eb497eefd4998f63827cbdbffdbc96335ed5c00c59', 28, 1, 'ejarly', '[]', 0, '2020-09-13 16:10:12', '2020-09-13 16:10:12', '2021-09-13 16:10:12'),
('7b0705127baec7f8d7ccc94f3486aa38fe45abad873a43d1e7a0033a03c9ffe077ca804b21564732', 35, 1, 'ejarly', '[]', 0, '2020-09-17 16:25:30', '2020-09-17 16:25:30', '2021-09-17 16:25:30'),
('7b667d784f32b34aaee163e84809acae665c8dd35ec06783ac6fb7110632814f81eed61c4d36be6a', 32, 1, 'ejarly', '[]', 0, '2020-07-16 11:23:46', '2020-07-16 11:23:46', '2021-07-16 13:23:46'),
('7b7320521118a8d0596b29cf69103596df2c2ec5ed0951c00c20e04b1bbd009fba526594575f3205', 36, 1, 'ejarly', '[]', 0, '2020-09-15 09:32:29', '2020-09-15 09:32:29', '2021-09-15 09:32:29');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('7b781042ef99b28182f2df648080961b885c7c3ad02421461d5e22380cdb48dff53018bf862f0587', 5, 1, 'ejarly', '[]', 0, '2020-02-04 19:31:21', '2020-02-04 19:31:21', '2021-02-04 13:31:21'),
('7bc82eeae5cdef06861f4c24797b673ce4b93871cad01ae311e2f7c0ecafe0d418eefc606b160246', 56, 1, 'ejarly', '[]', 0, '2020-10-26 12:04:15', '2020-10-26 12:04:15', '2021-10-26 12:04:15'),
('7c26f369d9d77b1297e2173787d7e2cdc1e50a23196d1304d06da88100ab9d01eef3a7f1dac6b1b4', 49, 1, 'ejarly', '[]', 0, '2020-10-13 09:17:05', '2020-10-13 09:17:05', '2021-10-13 09:17:05'),
('7c48edb5feff916ec47fb944282a667f802c3d21e86081b431348cf4514a4d158715d38f305ccd0f', 21, 1, 'ejarly', '[]', 0, '2020-06-24 16:50:48', '2020-06-24 16:50:48', '2021-06-24 18:50:48'),
('7ca30bfa05d6f6151232d0862f62b57824dabcf14f4ad2af6dc20dc2217adf78e8094384f5dfc323', 33, 1, 'ejarly', '[]', 0, '2020-08-09 18:40:02', '2020-08-09 18:40:02', '2021-08-09 18:40:02'),
('7d5411a86a10e2222b4951b49ff2b56c9e812ef89214be790ba5ef1ff9fc7d6e19a75141473ae0a9', 5, 1, 'ejarly', '[]', 0, '2020-01-28 21:11:18', '2020-01-28 21:11:18', '2021-01-28 15:11:18'),
('7e2b66138539419fd76707d7463ab318389b3c0517bd67501bb22db338debcf96e8dd0b95034e746', 35, 1, 'ejarly', '[]', 0, '2020-09-20 09:00:00', '2020-09-20 09:00:00', '2021-09-20 09:00:00'),
('7e4013374599c3a88f26f3d63c30053aa90936c751a8096d1b612eecf50683ec3ab170fd2808e026', 26, 1, 'ejarly', '[]', 0, '2020-06-23 15:16:49', '2020-06-23 15:16:49', '2021-06-23 17:16:49'),
('7fa93e54736e8a8db94b516120c30687b4ef2e1353959c5ca5c38b88014c60aaaa36d4d9a04cffab', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:50:38', '2020-01-05 17:50:38', '2021-01-05 17:50:38'),
('8049096ee85dd7f90bd6244cf78962bcd8c4711d7ecc46d29cbf63353ae74c7094071713dc7af263', 50, 1, 'ejarly', '[]', 0, '2020-10-12 08:31:56', '2020-10-12 08:31:56', '2021-10-12 08:31:56'),
('804f4a5bb4e7028d68edb0263ed1a5fc9c2dbf3a1d9f0272e0369815db7f19672caa7d2aa36e69f0', 49, 1, 'ejarly', '[]', 0, '2020-09-27 12:13:48', '2020-09-27 12:13:48', '2021-09-27 12:13:48'),
('808a665d982fce77eb0a270583b60a31d5256183811d927057afc7b930c9666ea41d9b284a20288e', 49, 1, 'ejarly', '[]', 0, '2020-09-28 12:12:39', '2020-09-28 12:12:39', '2021-09-28 12:12:39'),
('8096a3ed6774ce8cd7c960ca71a71da2d27589ec3fafe69bd5a456407c6c5d9b7e445c6e844973cb', 50, 1, 'ejarly', '[]', 0, '2020-10-13 11:40:18', '2020-10-13 11:40:18', '2021-10-13 11:40:18'),
('80c51545827bcbbc17275643d2d40dc4f135680aba18212110209eadc9a6aacc37efbfcfd5de6d0a', 3, 1, 'ejarly', '[]', 0, '2020-06-18 15:40:29', '2020-06-18 15:40:29', '2021-06-18 17:40:29'),
('80e78b8837aab1726effd159770e562dff1390da48d2f91aebd183cbc99778dd8bfd35a0cce0c85e', 49, 1, 'ejarly', '[]', 0, '2020-10-13 11:37:11', '2020-10-13 11:37:11', '2021-10-13 11:37:11'),
('813f14ea3eacbf83725ffb7022bd52f83979df13bfd81a81d01931621536c48c32f380c1a7bf49f6', 5, 1, 'ejarly', '[]', 0, '2020-02-03 15:18:11', '2020-02-03 15:18:11', '2021-02-03 09:18:11'),
('81af5c542e0bd3e5f025b892b31b97f5e6e683c1ba429fe0932c249e47ad1f6d52823c7eb21a4d69', 28, 1, 'ejarly', '[]', 0, '2020-09-10 10:02:38', '2020-09-10 10:02:38', '2021-09-10 10:02:38'),
('81e445474013990fd0b6f6f41cf14eecac8af5f30c99a4dbaba3ecdcf3a3dbb4f3a30b73e3bd77e2', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:37:48', '2020-01-05 17:37:48', '2021-01-05 17:37:48'),
('8244e94935c188c08d3609924e2e39d1638d052fa88361377663024f947fa5609678627f206a769a', 24, 1, 'ejarly', '[]', 0, '2020-09-09 11:51:57', '2020-09-09 11:51:57', '2021-09-09 11:51:57'),
('82b19726ae093a0f28ebcef914b51d12470074f5b237faba291b1adfe1509253b95d700d4a63f271', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:49:07', '2020-09-10 08:49:07', '2021-09-10 08:49:07'),
('835c428afc652867411efde96198573224dedf0cd0a63503b9bbffeb746cf608a4ace133639fc001', 27, 1, 'ejarly', '[]', 0, '2020-07-06 17:29:18', '2020-07-06 17:29:18', '2021-07-06 19:29:18'),
('83a2d3737b2daec0c9832c9942cd1ef8625421f4a686c628d9f395a134a9609ed72e95107a32e932', 4, 1, 'ejarly', '[]', 0, '2020-06-17 12:36:21', '2020-06-17 12:36:21', '2021-06-17 14:36:21'),
('85493677d65380eff43e14643812083fa64f5ab9fbe465105d89c860500419e763029324c69f4d78', 24, 1, 'ejarly', '[]', 0, '2020-11-03 07:49:06', '2020-11-03 07:49:06', '2021-11-03 07:49:06'),
('85d542e0738517d05120c39642e7dfc641873cc7a5b46c7e9972deb27069e7724eed5a1859f1beb5', 24, 1, 'ejarly', '[]', 0, '2020-09-02 11:46:25', '2020-09-02 11:46:25', '2021-09-02 11:46:25'),
('864c38f608ca7cae9d02086637721baeda60b50c0dc856b633b9581827a0b51593a87f89844aa5f3', 35, 1, 'ejarly', '[]', 0, '2020-09-03 15:41:49', '2020-09-03 15:41:49', '2021-09-03 15:41:49'),
('864cea086ac510cc9c44d319a77bc54c1ae1a8cd628152344af79634b1683ef69538a5075542db01', 35, 1, 'ejarly', '[]', 0, '2020-09-29 15:38:03', '2020-09-29 15:38:03', '2021-09-29 15:38:03'),
('871c62c887ae3ede963fdc78161f9216183387dcbefea7c90cfa19714de3a20389e2f2a557e6b224', 24, 1, 'ejarly', '[]', 0, '2020-09-01 07:46:04', '2020-09-01 07:46:04', '2021-09-01 07:46:04'),
('880089b2093a8211efd4cdfdaca078d151f6c4fc8fffcf77b57bdb5ff52b2528e3d361bacef8fda9', 35, 1, 'ejarly', '[]', 0, '2020-09-17 09:46:36', '2020-09-17 09:46:36', '2021-09-17 09:46:36'),
('8859f49bdffaed3cb0f85d7a25fb2203d07404f435911746191f0feae493e1272e8d893278e58cab', 32, 1, 'ejarly', '[]', 0, '2020-10-13 04:57:56', '2020-10-13 04:57:56', '2021-10-13 04:57:56'),
('89a325f95ea5079af9204d5f4f83028c1101aa8ebf3419525194b6b04dc6c1f4f66f54445da83a2b', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:21:10', '2020-01-05 17:21:10', '2021-01-05 17:21:10'),
('89f863782f374a788ff23f8f0c01dfeb80a23b6ab09e28be6758a9282caaad2a52547451c93c1987', 33, 1, 'ejarly', '[]', 0, '2020-09-14 14:09:22', '2020-09-14 14:09:22', '2021-09-14 14:09:22'),
('8a47da9250568d3b165dea28970d35db375ef7db9060ba0ae45d46cdd0e2a2adfe0547a20a8dc558', 17, 1, 'ejarly', '[]', 0, '2020-05-05 17:02:41', '2020-05-05 17:02:41', '2021-05-05 19:02:41'),
('8af995045de6b663d4cd728ab8180479d787d688e7be722c70bfc84e728a918e4f23167a9a69e0a3', 50, 1, 'ejarly', '[]', 0, '2020-10-20 07:37:21', '2020-10-20 07:37:21', '2021-10-20 07:37:21'),
('8b77abf3b2b79d612a481b2d19b75eed85a1c9f51a25d2fff5ab81381feb4777c70e742334542d36', 35, 1, 'ejarly', '[]', 0, '2020-09-22 10:41:46', '2020-09-22 10:41:46', '2021-09-22 10:41:46'),
('8ce8877fb50a0649f6eda6d6237f1e4ccc54de4ff80368f1a838c26e2a35157f7ba33a9f97385a13', 47, 1, 'ejarly', '[]', 0, '2020-09-23 22:14:18', '2020-09-23 22:14:18', '2021-09-23 22:14:18'),
('8d24f05c595c4555397079c519475a5bba0d9f88396bd823d46cb21ce919e57e75c1bd0fa06c8778', 8, 1, 'ejarly', '[]', 0, '2020-01-26 21:07:56', '2020-01-26 21:07:56', '2021-01-26 15:07:56'),
('8d60784065d9126611284c693f01b1387a6957d688b1a3575fafb9e115f6c3c7d0bc3d07e1b48ed8', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:52:58', '2020-09-10 08:52:58', '2021-09-10 08:52:58'),
('8e3d2a0fef6153454878e21f0731c1f22e7ac2b2c68291dae3b1aca8f8fc2d27303089a40f8cbea4', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:30:15', '2020-09-10 08:30:15', '2021-09-10 08:30:15'),
('8f391e8f688eb242a3d45488c22110a50a3bff8d13cef3a5eb1ca63ca123d9422505013c5b295f9f', 28, 1, 'ejarly', '[]', 0, '2020-09-17 10:31:34', '2020-09-17 10:31:34', '2021-09-17 10:31:34'),
('8feac2690c0038a8bea70da527a6723eec05a68e6d723fd6a0ab354314f208d14eaad4f8b3c8749f', 51, 1, 'ejarly', '[]', 0, '2020-10-12 08:10:42', '2020-10-12 08:10:42', '2021-10-12 08:10:42'),
('901b0e8ad435973f045b455ec46f753996e750880230dda94f26f09e129e674d7511339882ef163a', 49, 1, 'ejarly', '[]', 0, '2020-10-19 07:35:23', '2020-10-19 07:35:23', '2021-10-19 07:35:23'),
('90df712c2437ecb8b080befbe6074845ca6a255724710e7987b81c217aacbd83949dbcce29ac8792', 46, 1, 'ejarly', '[]', 0, '2020-09-21 13:29:17', '2020-09-21 13:29:17', '2021-09-21 13:29:17'),
('91252ccb8060dea7fe3a62518174d00925368d1b5578d6b67a3f983ceab68cc54f1f6251ce8135ff', 35, 1, 'ejarly', '[]', 0, '2020-09-08 16:49:52', '2020-09-08 16:49:52', '2021-09-08 16:49:52'),
('913b6f89e017c3128761892ff8b956a0f53095fbcd5ffa00b44d184fc05a2375775cd13703ac1398', 35, 1, 'ejarly', '[]', 0, '2020-09-15 14:31:52', '2020-09-15 14:31:52', '2021-09-15 14:31:52'),
('91c7e1fdc8403fc4dc671e69ad724255de377d1116f81b2437be9f48764b8ee72dbe269c10ef0bca', 49, 1, 'ejarly', '[]', 0, '2020-10-15 13:59:02', '2020-10-15 13:59:02', '2021-10-15 13:59:02'),
('91d8b5673ed2433f3070556f53960dacf8c9850975af8161adfc49b1c7160ba254f5fe1108be9b8d', 9, 1, 'ejarly', '[]', 0, '2020-01-28 21:18:28', '2020-01-28 21:18:28', '2021-01-28 15:18:28'),
('9248f08fc0e45d5a22c9d81246911aba79af2a796bf7fc4d1c5653bbef902b0a8880dc8b8820c87f', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:30:58', '2020-01-28 13:30:58', '2021-01-28 07:30:58'),
('92c80f7dd9d37195febcf4a6d75694871fd942bcaefa3756ce39059e1bfa9023840386c303ff7450', 62, 1, 'ejarly', '[]', 0, '2020-10-28 09:31:31', '2020-10-28 09:31:31', '2021-10-28 09:31:31'),
('930a4adbeb545998913510aae8eb1686db2afe392de271e086c91a30a1ff1b7659c7ce8cd8f81a7e', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:39:03', '2020-01-05 17:39:03', '2021-01-05 17:39:03'),
('934a3fdbaab91e36b68d691a06aaf8e901d4389b864b613d05ae2ff0c2edb9f25eeef64039e8d7ec', 59, 1, 'ejarly', '[]', 0, '2020-11-03 09:39:27', '2020-11-03 09:39:27', '2021-11-03 09:39:27'),
('9351279b621d1e7304fd8e02648c4279ec8046907b2b3d1209ce309fb4db6a0192fc379be80cc6a6', 13, 1, 'ejarly', '[]', 0, '2020-03-22 15:37:37', '2020-03-22 15:37:37', '2021-03-22 16:37:37'),
('9389d43454e7102726c159342fdffd3b448987337dedc833014e34c026c68ed12f5eae85a85a166c', 4, 1, 'ejarly', '[]', 0, '2020-06-10 22:22:21', '2020-06-10 22:22:21', '2021-06-11 00:22:21'),
('939304ba703f9d9a6fae6df4df621e8854c7231f6bf53296ed80958f5e0bf91f185be13e0978f900', 35, 1, 'ejarly', '[]', 0, '2020-09-24 12:06:38', '2020-09-24 12:06:38', '2021-09-24 12:06:38'),
('946374038cdcd2762c52800446235697859b4a924a56ec492f5887c0d092ea49ccf457f13669354a', 30, 1, 'ejarly', '[]', 0, '2020-07-14 12:54:20', '2020-07-14 12:54:20', '2021-07-14 14:54:20'),
('949beecb4914ba5f1fd9f0e239a6d483b2198fa289e2783e582d4d6d8f28f3e9595bbe4038c7a5e8', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:50:51', '2020-01-05 17:50:51', '2021-01-05 17:50:51'),
('94ad805b5ff2f2a6fc420685ae114063ee3e1df3ca3c7d8e357d9574967d0671a71a3a52ac8f49b8', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:50:27', '2020-01-05 17:50:27', '2021-01-05 17:50:27'),
('94d0186caafa2595f59f006c0b03843ccfb3961c1677fe2026a7396908c6700dee34335b629bc1a1', 3, 1, 'ejarly', '[]', 0, '2020-06-18 15:39:24', '2020-06-18 15:39:24', '2021-06-18 17:39:24'),
('94debb865bea32e7a99188bdb789ae118e523956942bf01526909eddd28b10a73ef47df60585b449', 24, 1, 'ejarly', '[]', 0, '2020-09-23 17:26:42', '2020-09-23 17:26:42', '2021-09-23 17:26:42'),
('94e44af2d363d75bdbbea4eb8ab24189b116ccf34889653ab373a6995e2883d5e5c366d620c4aff8', 27, 1, 'ejarly', '[]', 0, '2020-11-01 11:29:04', '2020-11-01 11:29:04', '2021-11-01 11:29:04'),
('953566d78b2d8166fe8c0088a1309f61abd3a6d30366093d8ec28b8bcf515a2cd6c68962943ad4fb', 35, 1, 'ejarly', '[]', 0, '2020-09-21 15:02:53', '2020-09-21 15:02:53', '2021-09-21 15:02:53'),
('9552300da9dd2811e0c0a7a4363c9982641e140ed7106070d750115a030aac08792a41ac1d630f0e', 49, 1, 'ejarly', '[]', 0, '2020-10-18 13:06:24', '2020-10-18 13:06:24', '2021-10-18 13:06:24'),
('95f8ab5c4fcbc75d0084d1a241af74dd079a396eedb49a83278a4317eaf09293bd39eedee2fc8b7d', 33, 1, 'ejarly', '[]', 0, '2020-07-24 10:02:46', '2020-07-24 10:02:46', '2021-07-24 12:02:46'),
('96599e20eecf552f17f0a35943f78b8e2a1d022c68a4c69eeda9397440c7e4317372bf286d860448', 5, 1, 'ejarly', '[]', 0, '2020-03-08 07:20:49', '2020-03-08 07:20:49', '2021-03-08 09:20:49'),
('96f5ba0b201d8013beb41112a8e9cff5ae8a6b58d128403d124584aa2ca2b312f36999745c3015fa', 24, 1, 'ejarly', '[]', 0, '2020-11-01 10:15:59', '2020-11-01 10:15:59', '2021-11-01 10:15:59'),
('97446148250e52a6dfdb2c8ca3be714f5cd6834ef34eff2b7f36b15998faf5d5784738dcc86236d9', 47, 1, 'ejarly', '[]', 0, '2020-10-21 05:39:28', '2020-10-21 05:39:28', '2021-10-21 05:39:28'),
('974729acfd390f088c95701cd171511904613722dd26252097d294e8376885a367cdf54b8e146e99', 7, 1, 'ejarly', '[]', 0, '2020-01-26 20:55:24', '2020-01-26 20:55:24', '2021-01-26 14:55:24'),
('97aa8925ff079c40a87c42a8aed581ab2689a545f9339946c9d1f7b3e7ca89b957d7b0fe234c572b', 49, 1, 'ejarly', '[]', 0, '2020-10-12 15:20:13', '2020-10-12 15:20:13', '2021-10-12 15:20:13'),
('97cb420e63e3a3039324b50795b29ec7705d1c6e58b49f453eb5808369e2045d52b29ba760a80161', 4, 1, 'ejarly', '[]', 0, '2020-08-27 11:35:25', '2020-08-27 11:35:25', '2021-08-27 11:35:25'),
('9894e4aafdeeda3a8ca16e431cb8ce5b4edd452d3c0e51f0a2563994a3cc687d0a56975e09832036', 30, 1, 'ejarly', '[]', 0, '2020-07-21 13:18:02', '2020-07-21 13:18:02', '2021-07-21 15:18:02'),
('9898cd429f64138e0c5e109b184a26159d0c520bbe9e425f53273a832d0966273de5c1be98b35c40', 12, 1, 'ejarly', '[]', 0, '2020-03-02 13:49:29', '2020-03-02 13:49:29', '2021-03-02 15:49:29'),
('98ae4dd99f34b55dde7f7cc5081e2fe7640dbfadff9217fc915f96b68858b398b5d5f988a9c917be', 35, 1, 'ejarly', '[]', 0, '2020-10-12 17:12:36', '2020-10-12 17:12:36', '2021-10-12 17:12:36'),
('98d922127f000358ab5b71efcf970229879c3ee48db9779592da9190193c250a226626fa2cca1dee', 24, 1, 'ejarly', '[]', 0, '2020-11-01 09:50:49', '2020-11-01 09:50:49', '2021-11-01 09:50:49'),
('99023f67a5b80ef9907fa2cf6a277dd2abc5a7a8ff2ef140ba4592625072b01b36d8b852bfe838b3', 15, 1, 'ejarly', '[]', 0, '2020-04-30 10:17:41', '2020-04-30 10:17:41', '2021-04-30 12:17:41'),
('9a361bcd1f615de039cafd990a338dc78e57cdd2158baa20318105a5651f91f38dd6cae9406517c4', 35, 1, 'ejarly', '[]', 0, '2020-10-28 17:17:10', '2020-10-28 17:17:10', '2021-10-28 17:17:10'),
('9b1f93f5ccfe0bde2a054a9e57dae8103e74e56303348886f53e44ef19c6dcee8422e6e3cf5d12b7', 32, 1, 'ejarly', '[]', 0, '2020-08-10 09:17:06', '2020-08-10 09:17:06', '2021-08-10 09:17:06'),
('9b84ab446f3f01afbd881c525f09abb44f6d5438a6efe34d9ba0e1efa2e4898660082532f9bdc496', 35, 1, 'ejarly', '[]', 0, '2020-09-13 10:36:30', '2020-09-13 10:36:30', '2021-09-13 10:36:30'),
('9bc957b0a7be3e190e7f3f3528aa4926d1eff220fe7d1a6ea3963411e1c659d4672076f186a13466', 5, 1, 'ejarly', '[]', 0, '2020-03-22 15:42:39', '2020-03-22 15:42:39', '2021-03-22 16:42:39'),
('9bf52b3529ad70cdddcf971aac0bafe6c90325ce5de0bc6a6375585a157d51df943b858c933e1339', 58, 1, 'ejarly', '[]', 0, '2020-11-02 14:11:10', '2020-11-02 14:11:10', '2021-11-02 14:11:10'),
('9c6fb6ce776b80b2379edfd0efe9535ab63b46e4df481f9dc4d352093d818cd8f265be28b57465b7', 41, 1, 'ejarly', '[]', 0, '2020-09-15 10:06:12', '2020-09-15 10:06:12', '2021-09-15 10:06:12'),
('9c71d67b1ec5e0b635b7b0bdc7f1a0ce08f401e1ac057b9e6b47cb8fdfbbb6417f1981c00f6544de', 28, 1, 'ejarly', '[]', 0, '2020-09-27 14:01:27', '2020-09-27 14:01:27', '2021-09-27 14:01:27'),
('9cbfcd8c282b74595f73edd3669177ba3987e0549f96ca777215c4bd234231f38e8a082d0ad92b97', 24, 1, 'ejarly', '[]', 0, '2020-09-17 08:24:42', '2020-09-17 08:24:42', '2021-09-17 08:24:42'),
('9e8a5a5b8942b6c6ae4ace892467023f69c2abfa31415c91acd127f23184d1a655bc9224c3259e66', 50, 1, 'ejarly', '[]', 0, '2020-09-27 12:48:24', '2020-09-27 12:48:24', '2021-09-27 12:48:24'),
('9ed1d034479a7e25a3cdbbae3d075ddf10c0fa475277fe9f0f1e6793cfd01b82f10d530b72a79db6', 28, 1, 'ejarly', '[]', 0, '2020-09-21 16:02:49', '2020-09-21 16:02:49', '2021-09-21 16:02:49'),
('9f978fc8028e000cef24c1e50235bcb4a9b75e12fd880bde6d970601d7a9197b331a988ad4cba023', 28, 1, 'ejarly', '[]', 0, '2020-07-13 15:35:40', '2020-07-13 15:35:40', '2021-07-13 17:35:40'),
('9fafeb4a42a1e13fc23d598f3a6782cff81b5a2140832fe419ec2df0fe1e2c1b30a8db8527059d40', 44, 1, 'ejarly', '[]', 0, '2020-09-21 08:55:48', '2020-09-21 08:55:48', '2021-09-21 08:55:48'),
('9fe2992228f21d3776c6316d18dcbf398554cd0d4e9dde9e7515f9d925d5ceb5193d9f90c79c3265', 21, 1, 'ejarly', '[]', 0, '2020-06-22 16:03:35', '2020-06-22 16:03:35', '2021-06-22 18:03:35'),
('9fe92fa663f45bf5893e96029c1a3fe3e3a7d3efc3000aa6ea14a4972ce3081779be0ce1dbb86920', 28, 1, 'ejarly', '[]', 0, '2020-09-20 08:07:58', '2020-09-20 08:07:58', '2021-09-20 08:07:58'),
('a0193409f55bc22eb603b237cf767307d1a0af8fee76624eaf8d87bc447018c615ec793ae9f22219', 3, 1, 'ejarly', '[]', 0, '2020-08-27 18:40:48', '2020-08-27 18:40:48', '2021-08-27 18:40:48'),
('a0e1d73c92b9135beb0e309cbb2709f093f607281b23463eb9ffe1e0202e359f30b69684f3516051', 33, 1, 'ejarly', '[]', 0, '2020-08-29 19:51:53', '2020-08-29 19:51:53', '2021-08-29 19:51:53'),
('a0f3688315269ffec1159e9f2c4277a73ed9be0ee1006e73d3d4b84f789f14fc3cbe6167df10fccc', 50, 1, 'ejarly', '[]', 0, '2020-10-15 13:36:04', '2020-10-15 13:36:04', '2021-10-15 13:36:04'),
('a1377112df9d0001e41ebdffe5cd83934d82d879e84d9d3f6c5f7f7a627823f5ad99f291a2819e78', 32, 1, 'ejarly', '[]', 0, '2020-09-30 08:28:46', '2020-09-30 08:28:46', '2021-09-30 08:28:46'),
('a14383911041455f1ddecdb7f517fb683be38bd9626fee024148332f614aa82d8b2bbef8c5f7815a', 35, 1, 'ejarly', '[]', 0, '2020-09-15 09:42:59', '2020-09-15 09:42:59', '2021-09-15 09:42:59'),
('a2f0ef4a36e67cc5c51602fe459dacf46a235bcbb75ddbdee1876eb3e00cf471d3b4ce281031a1ce', 59, 1, 'ejarly', '[]', 0, '2020-10-27 16:53:14', '2020-10-27 16:53:14', '2021-10-27 16:53:14'),
('a30ee788b745862e31b4551d55ff2431915ee58fc9318ffbad893b3cb12be708345283200d99320e', 6, 1, 'ejarly', '[]', 0, '2020-01-26 20:41:34', '2020-01-26 20:41:34', '2021-01-26 14:41:34'),
('a31451a10f94d387529486eddfc44d68eb306cf162786ae740a2aeaadd0233b2f6606e168b0e8dd1', 3, 1, 'ejarly', '[]', 0, '2020-01-09 17:17:23', '2020-01-09 17:17:23', '2021-01-09 11:17:23'),
('a358c7a899796913712d648c797962e33c0adcb231d8040dc2e2e3893b1819f03e0b6e1b02656b06', 62, 1, 'ejarly', '[]', 0, '2020-10-28 09:32:14', '2020-10-28 09:32:14', '2021-10-28 09:32:14'),
('a3e3f7cb35d783dff00bbdefde9e013f35e24633b4e385ffc1dcf59ad405df5b29802b057ecbe68a', 33, 1, 'ejarly', '[]', 0, '2020-07-16 11:24:58', '2020-07-16 11:24:58', '2021-07-16 13:24:58'),
('a42e56872428c6ba65ff5e8378ce732164cde5edf2d7849478f41317f1442ad639bad7a4d5e34c06', 35, 1, 'ejarly', '[]', 0, '2020-09-17 10:37:16', '2020-09-17 10:37:16', '2021-09-17 10:37:16'),
('a471a436bf9c86e33bbb5cac944c4ec150c2d95b7636cd19edae2676afcbcb85d421541afc7d6c44', 30, 1, 'ejarly', '[]', 0, '2020-07-14 11:22:58', '2020-07-14 11:22:58', '2021-07-14 13:22:58'),
('a4e2d8d4550f9b6e12dd1f76afbd861f57cabf51701a51ec0914ec963ff7c2df60f04b5d6e8b3f6a', 49, 1, 'ejarly', '[]', 0, '2020-11-02 14:53:55', '2020-11-02 14:53:55', '2021-11-02 14:53:55'),
('a5de0e3673b74ebddfc5c0e392ab8877cb06c2e44d8b517a518dbc6204e76fe622b11651d4e6902c', 50, 1, 'ejarly', '[]', 0, '2020-10-20 14:02:31', '2020-10-20 14:02:31', '2021-10-20 14:02:31'),
('a6a76ebd54a00b28ca10d0e302d35e78bda34e13158d4dcf283ca2a4d396b1c17c3df1beca3c49ec', 21, 1, 'ejarly', '[]', 0, '2020-07-06 17:28:07', '2020-07-06 17:28:07', '2021-07-06 19:28:07'),
('a7a0c3360541baf0161b2f359c96cdee162cbe16ebf66282d71e349cb459ac4e8e1a9e27564e97e4', 28, 1, 'ejarly', '[]', 0, '2020-07-22 09:24:15', '2020-07-22 09:24:15', '2021-07-22 11:24:15'),
('a7ba3fae2b636a0f0eae495f95cfa28468d4aed583404ac773bf667ada256342dc8c41fdaa3c49b6', 49, 1, 'ejarly', '[]', 0, '2020-10-12 15:51:51', '2020-10-12 15:51:51', '2021-10-12 15:51:51'),
('a80caa883b97ac066acb202ec774a6983de961d0bfe6bcfcbf7bf726205018134c6acc4fa2c6dac2', 4, 1, 'ejarly', '[]', 0, '2020-07-21 16:42:18', '2020-07-21 16:42:18', '2021-07-21 18:42:18'),
('a912c8cfea440c88802951a8d94091f6e05cded601f5b48545894e30253444a96502a2cc03542310', 3, 1, 'ejarly', '[]', 0, '2020-07-22 08:48:18', '2020-07-22 08:48:18', '2021-07-22 10:48:18'),
('a944c2defcd9205cbd8b82911f8cef322684eb4302bbe6837c558c8252e3bcb9a9f88183497cb421', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:25:45', '2020-01-05 17:25:45', '2021-01-05 17:25:45'),
('a95a8fc9cf1bf283cd889572f7e69bfbaecdedf0bf920a6b9bee3afe5e3fdfb78c38e8112d83bf4a', 28, 1, 'ejarly', '[]', 0, '2020-07-29 12:19:51', '2020-07-29 12:19:51', '2021-07-29 12:19:51'),
('a98b8b4e742dcb8b1046b557bb7fffa4ec2e4b728862d0a8c9e37dd55ef221ee21041bec1488331b', 28, 1, 'ejarly', '[]', 0, '2020-10-22 12:57:03', '2020-10-22 12:57:03', '2021-10-22 12:57:03'),
('a9d08211eea05b593a13de9500cbc2d28bba1be5a617db293b7a332961c5296e24ff236c44f1c7b5', 30, 1, 'ejarly', '[]', 0, '2020-07-12 12:36:27', '2020-07-12 12:36:27', '2021-07-12 14:36:27'),
('ab0e0ed7149c9d5a66cbb0c3faadb695ee062657512c9027b46ad3b7cef9df42dcf56921f4a29b64', 4, 1, 'ejarly', '[]', 0, '2020-06-10 13:13:46', '2020-06-10 13:13:46', '2021-06-10 15:13:46'),
('ab2ce5c8b740966c12e71692c5ed8d17670746b8ce443f7fec6ea4a40f15d57a969f9c2b7d09c26c', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:21:33', '2020-01-05 17:21:33', '2021-01-05 17:21:33'),
('ab3dc925bd870ed392cb44ad316002e57ffb2244e24ae79fd9a6d82703be9acc43697dce72f87c93', 59, 1, 'ejarly', '[]', 0, '2020-10-29 08:26:11', '2020-10-29 08:26:11', '2021-10-29 08:26:11'),
('ab7b3897e76566b6efcafa812e5fad241030cdca13ede8e1204ba4067be3e542a261d3507bc03e1a', 50, 1, 'ejarly', '[]', 0, '2020-10-11 09:05:43', '2020-10-11 09:05:43', '2021-10-11 09:05:43'),
('abd46e3d4e4bcdae0e734debc2fc91e9794072c3e79f6a53824269dcbf0b50a9884508ff01506c31', 35, 1, 'ejarly', '[]', 0, '2020-09-15 14:12:04', '2020-09-15 14:12:04', '2021-09-15 14:12:04'),
('ac3deac1e9d6fa11b68c2f92fadd2dc3324b2ac77bedd29ab711c2c877f2d0b27afcc478c9c9e506', 33, 1, 'ejarly', '[]', 0, '2020-08-21 07:44:44', '2020-08-21 07:44:44', '2021-08-21 07:44:44'),
('ad8af36f8cbfbedd0c6cd4936154e34ce20b5cf960b33d48f1533ba78071869bb30541f20803f165', 28, 1, 'ejarly', '[]', 0, '2020-09-14 07:53:50', '2020-09-14 07:53:50', '2021-09-14 07:53:50'),
('aed08541ffcc0e89e309a8b1dc9ba1c19ee475bdf6f1b6d5abe1661045382ef73290e98bc68e2c32', 43, 1, 'ejarly', '[]', 0, '2020-09-20 14:24:29', '2020-09-20 14:24:29', '2021-09-20 14:24:29'),
('aee7030db6e01a323713ff63e647503a35daea4588890e44c3fc862c613402e8234e6c033c3fa1eb', 47, 1, 'ejarly', '[]', 0, '2020-10-29 18:10:52', '2020-10-29 18:10:52', '2021-10-29 18:10:52'),
('aee99ed275ba6179779966cc51509a8b1e47bfdc5fe6d11f4697281e5601c6cca6bebb172de4dfea', 5, 1, 'ejarly', '[]', 0, '2020-02-18 13:31:13', '2020-02-18 13:31:13', '2021-02-18 07:31:13'),
('b046dd78ba7949c6f28e3c7dbf17a230aeaaf9beeefc19b45991c2f7830c8e7bc79eeb2caf16ffb4', 32, 1, 'ejarly', '[]', 0, '2020-08-29 20:03:00', '2020-08-29 20:03:00', '2021-08-29 20:03:00'),
('b0f27f0820fa062f1984816f02698bff023748fb7bbd2b2547f5b866dec89a0fd9e3396ad6e30f58', 47, 1, 'ejarly', '[]', 0, '2020-09-23 13:59:26', '2020-09-23 13:59:26', '2021-09-23 13:59:26'),
('b12975b37c4202ce7e222391f453dddefa5e92b8ab52f35497875f3cc444128d6d074d60dbb50b16', 28, 1, 'ejarly', '[]', 0, '2020-09-20 11:54:27', '2020-09-20 11:54:27', '2021-09-20 11:54:27'),
('b1b7a89cdb9cb799b35bf47dbdab6fb3d6fb027255989b0108eeaa8b821811d19240bb0af80a13c8', 4, 1, 'ejarly', '[]', 0, '2020-06-09 10:28:29', '2020-06-09 10:28:29', '2021-06-09 12:28:29'),
('b1c2a7754dbaa11e9454caef9f5e97b524cb929cfa0dbbf348b00901855823aa58dbbc13d1f7241b', 1, 1, 'TutsForWeb', '[]', 0, '2019-12-09 16:03:48', '2019-12-09 16:03:48', '2020-12-09 16:03:48'),
('b2de53a760e38cab996de8cc0d566a56b8143f2a4623f867a4abfcda3e5fa8fb0e9af4824f10e0f9', 31, 1, 'ejarly', '[]', 0, '2020-07-14 13:47:18', '2020-07-14 13:47:18', '2021-07-14 15:47:18'),
('b32459afc8b1b80ac8a1a85fb2f9ba0101ec415f1acee00d4e8b438fb540c2dd8a4ce863d5634556', 30, 1, 'ejarly', '[]', 0, '2020-07-21 13:09:41', '2020-07-21 13:09:41', '2021-07-21 15:09:41'),
('b36fe246d3bbcf3c6d29ef118ba33cbb66719f85e2a67e07256bbab30f178aa8365021359806f4d1', 3, 1, 'ejarly', '[]', 0, '2020-09-20 12:11:39', '2020-09-20 12:11:39', '2021-09-20 12:11:39'),
('b42b03c4e6f73a8e9d4b3cc82f5a2772d188fddcfbe59171ce8b7caff987604bc598f267a980d931', 44, 1, 'ejarly', '[]', 0, '2020-09-21 06:55:46', '2020-09-21 06:55:46', '2021-09-21 06:55:46'),
('b4589ba612c7c3097613c378b6518d83a2742b12efa9bf289a9d6663464bb5493b23da29d75ed961', 44, 1, 'ejarly', '[]', 0, '2020-09-20 15:46:17', '2020-09-20 15:46:17', '2021-09-20 15:46:17'),
('b47ba2d16e27a8f0cabcea97e53c6eb4ee46b45be7d66a832ce4a2f0843dd233aea1331955525e2c', 45, 1, 'ejarly', '[]', 0, '2020-09-21 17:52:06', '2020-09-21 17:52:06', '2021-09-21 17:52:06'),
('b495bdee1afdc28ef274d25918e3d83073415e6a45c688bc80f282e566953050b56f3a3788bba420', 50, 1, 'ejarly', '[]', 0, '2020-10-11 14:34:52', '2020-10-11 14:34:52', '2021-10-11 14:34:52'),
('b49bf4bc0ace99a895202a49a4fc83f463288db055ddaf7adedd5cc55d6c9ec2afcbd84d938a644d', 35, 1, 'ejarly', '[]', 0, '2020-09-21 13:48:03', '2020-09-21 13:48:03', '2021-09-21 13:48:03'),
('b4c886a4bd90b52aff5fe1206d94df6cbd178ced373f3536a2a108273ea7fff0537c397ae22840ba', 57, 1, 'ejarly', '[]', 0, '2020-10-26 12:06:28', '2020-10-26 12:06:28', '2021-10-26 12:06:28'),
('b4dac5229beb62ecdeeef842ab1d11a657370ec50d50c2c5557963620bdfd4e0ab24245b45581eb1', 4, 1, 'ejarly', '[]', 0, '2020-06-09 14:04:05', '2020-06-09 14:04:05', '2021-06-09 16:04:05'),
('b50fa063cd046781d27213b96172aa6ac31965d606eafb03f87c0add621c5a7d2bc17fc76a351bb5', 43, 1, 'ejarly', '[]', 0, '2020-10-21 15:41:54', '2020-10-21 15:41:54', '2021-10-21 15:41:54'),
('b6336e9abd6b936bf6010d4c5a03b9417ec9c8f150571fb2a4a94645d1ae9cf130dfff035625363e', 30, 1, 'ejarly', '[]', 0, '2020-07-12 13:23:29', '2020-07-12 13:23:29', '2021-07-12 15:23:29'),
('b66ebc40e4ddbb4155e542830e90c746257b87e92de46d961cb422dadc733f6955f3088d876d4c71', 47, 1, 'ejarly', '[]', 0, '2020-09-21 16:14:31', '2020-09-21 16:14:31', '2021-09-21 16:14:31'),
('b71befaa7a7416bd4f941caac1d48e9a43b782d3172f4b345f91e3601f75c0e82f8753610d28e833', 5, 1, 'ejarly', '[]', 0, '2020-03-04 07:04:59', '2020-03-04 07:04:59', '2021-03-04 09:04:59'),
('b72a2faced83325f114418be21b0f8993e898e52ce5549c7721d0f03454b9c88ec69341d2b81af49', 63, 1, 'ejarly', '[]', 0, '2020-10-28 17:12:57', '2020-10-28 17:12:57', '2021-10-28 17:12:57'),
('b7d85df9bc7f458e89c1d6b3b41f4dc117b51a4c4fcbc703c530eeaa83aff1dc9be43767b6554e53', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:22:14', '2020-01-28 13:22:14', '2021-01-28 07:22:14'),
('b8a15bed997249665307a14e567dd95fb2eff49e493f624b75a8fd30a08ac446e2dd4c13891c5e53', 58, 1, 'ejarly', '[]', 0, '2020-10-26 12:09:29', '2020-10-26 12:09:29', '2021-10-26 12:09:29'),
('b8ca6be4280a7183b6db4da2094bdb0ebc2d779149713bc58e6c094c6d824db2ab9a09d574e4f6f0', 35, 1, 'ejarly', '[]', 0, '2020-11-02 13:29:51', '2020-11-02 13:29:51', '2021-11-02 13:29:51'),
('b930dc86c86369df224ec975745c549ff90468848830c4324ed7610fae124ffd7a29fadc327367af', 37, 1, 'ejarly', '[]', 0, '2020-09-07 15:57:50', '2020-09-07 15:57:50', '2021-09-07 15:57:50'),
('b98e13a58fb6d90f4b7d87dffaa1e3b3b7b0469d4db60c8ff4e7d1fdd8d0cbb462c33566b16ac0ae', 35, 1, 'ejarly', '[]', 0, '2020-08-30 08:36:10', '2020-08-30 08:36:10', '2021-08-30 08:36:10'),
('b9df856a3a1887b732eadceeb192abb2a4c75c1e8f881da8098e597edcbad7cb181fdb9006167ddc', 50, 1, 'ejarly', '[]', 0, '2020-10-20 09:39:53', '2020-10-20 09:39:53', '2021-10-20 09:39:53'),
('b9e1ff2876e7fdaee4a893b944e6bb0d26cd71361fc342dca457ad65497248b275cd51ce46a3c409', 35, 1, 'ejarly', '[]', 0, '2020-09-10 16:45:12', '2020-09-10 16:45:12', '2021-09-10 16:45:12'),
('b9fe06cf9cf6fb987987cc1b49c66f3c79460c531a18970c46907e4216d274d5d43320116375f263', 49, 1, 'ejarly', '[]', 0, '2020-10-25 13:19:15', '2020-10-25 13:19:15', '2021-10-25 13:19:15'),
('ba20ba69d79c6a0a2a489490d43d8d072495b12d75ff1c5f5f2fa9944d3d15ef1912f2e1c74954c8', 28, 1, 'ejarly', '[]', 0, '2020-09-22 11:01:32', '2020-09-22 11:01:32', '2021-09-22 11:01:32'),
('ba74366b5037b1de952bd475fc4d934f5b6977a1ce4e88a99461de0a469348fb05285b23b26e2ee6', 30, 1, 'ejarly', '[]', 0, '2020-07-13 08:13:00', '2020-07-13 08:13:00', '2021-07-13 10:13:00'),
('ba949b43d4d2366d6437487e714420bc6027f8eac5ae248f17e246cf133196a3edd8d9fb4e9c094f', 43, 1, 'ejarly', '[]', 0, '2020-09-20 14:06:24', '2020-09-20 14:06:24', '2021-09-20 14:06:24'),
('bacf27bf37d712a9305009f0bf76e0f2c70f62911ecca78a6b65546e08bc7db95d0c8b6eda4137db', 33, 1, 'ejarly', '[]', 0, '2020-08-06 12:51:11', '2020-08-06 12:51:11', '2021-08-06 12:51:11'),
('bb42099dcb07c4194485fd8b3a6b9e5b6155de72d7e70d660057bfa5b9dd94335a6905d1aa61d3a9', 7, 1, 'ejarly', '[]', 0, '2020-02-02 19:23:27', '2020-02-02 19:23:27', '2021-02-02 13:23:27'),
('bbe0fd96b69a64d4b352568cb64afcea14786937455a9573b7d09937d12472f244d0a902f86a4ea6', 35, 1, 'ejarly', '[]', 0, '2020-09-14 08:56:24', '2020-09-14 08:56:24', '2021-09-14 08:56:24'),
('bc67766b4f16843a4b2db5fdac843efb1bd238e2a2e0f55a01e44e68b680fcad604f6a45734f26e2', 47, 1, 'ejarly', '[]', 0, '2020-10-21 17:08:14', '2020-10-21 17:08:14', '2021-10-21 17:08:14'),
('be019bbc1fe502defa9fdaeb7c51cf99791a61f5ea8c7f9ba34039e7fdfdade2956d8230dfc1bb16', 36, 1, 'ejarly', '[]', 0, '2020-09-06 11:46:45', '2020-09-06 11:46:45', '2021-09-06 11:46:45'),
('be33d91647f8efb26e92f15665c72c09afe538f41c1ececc9e3ea94423b4f735c37164c9bc6e95d5', 54, 1, 'ejarly', '[]', 0, '2020-10-28 11:18:00', '2020-10-28 11:18:00', '2021-10-28 11:18:00'),
('beb8a9b85f3d37ce9736cdf4a32bcedab9cbd56fc0bf5bf2c46cec7dff000ec2826509a5a7c484f2', 47, 1, 'ejarly', '[]', 0, '2020-09-29 06:20:53', '2020-09-29 06:20:53', '2021-09-29 06:20:53'),
('bf1e5699e172097f4094f8044ccf61a753c2c4a5e99ad9561cec40ebcc177aa40564f11dbd945ba8', 21, 1, 'ejarly', '[]', 0, '2020-06-25 18:31:44', '2020-06-25 18:31:44', '2021-06-25 20:31:44'),
('bff2534378cbe93aa5958d194a145a194e869b555f63aaf02756f30f974d8c6549346ba7d1f5885f', 35, 1, 'ejarly', '[]', 0, '2020-09-08 05:20:16', '2020-09-08 05:20:16', '2021-09-08 05:20:16'),
('c0b7c00d1e62ef3c08bea966d85df79835da4948a3eb3bc7dd79e68e0d8deb7e369c3682de7caf62', 3, 1, 'ejarly', '[]', 0, '2020-06-15 07:25:06', '2020-06-15 07:25:06', '2021-06-15 09:25:06'),
('c17b6a038d5342ea9a01094ba27d5c9131e1c771ef1ce94b5060810f99f1f6deaa579fd8220005df', 5, 1, 'ejarly', '[]', 0, '2020-02-23 20:25:05', '2020-02-23 20:25:05', '2021-02-23 14:25:05'),
('c19411db5674374d9c54b8996462d53d9fa00b9eaca4441fa09d3ab9d150416a1cae21fef3e2f3fb', 10, 1, 'ejarly', '[]', 0, '2020-02-23 20:26:21', '2020-02-23 20:26:21', '2021-02-23 14:26:21'),
('c1a6b76c77668eaef62a0bd5055c715c86e30ac17cacc9e4126dc909170bc55239bccaed8d171794', 61, 1, 'ejarly', '[]', 0, '2020-10-28 08:20:09', '2020-10-28 08:20:09', '2021-10-28 08:20:09'),
('c1d6fa2c64bb2d36791e50749853a1e1e95e62fb8c8434649540b85f0d0cd9b87fb3790799ebf9b2', 54, 1, 'ejarly', '[]', 0, '2020-10-22 13:16:25', '2020-10-22 13:16:25', '2021-10-22 13:16:25'),
('c1ea602e2bf68ec6ab0086e8b951e25ab9fbeb902a8a6a873ea21e459c2c41ded18c76e782d11812', 27, 1, 'ejarly', '[]', 0, '2020-07-08 16:50:30', '2020-07-08 16:50:30', '2021-07-08 18:50:30'),
('c34c32fa07e881b4c5ccbe4ff69aeb07fa1af7217d76dace3c1e4876aaf14cb00bacf732079a3a75', 35, 1, 'ejarly', '[]', 0, '2020-09-02 11:30:33', '2020-09-02 11:30:33', '2021-09-02 11:30:33'),
('c3730dc50d73f72f8cf54bfdc35b897364ce29fef70d31ff9ec1daf4045b6b5521d26a883b23fd1d', 3, 1, 'ejarly', '[]', 0, '2020-07-22 09:13:42', '2020-07-22 09:13:42', '2021-07-22 11:13:42'),
('c45f63bcf2658eabf5925b372aea81df9d997485dd34c4eeb0e96866fc7b8a054ff43fc0acc50fdb', 5, 1, 'ejarly', '[]', 0, '2020-02-04 12:51:07', '2020-02-04 12:51:07', '2021-02-04 06:51:07'),
('c4c0803695d366afd46994409aaa4e3fab20759db0bc0e0bf1f717565ff6d9cc7b516ef5a4b3c5d2', 35, 1, 'ejarly', '[]', 0, '2020-09-24 07:41:21', '2020-09-24 07:41:21', '2021-09-24 07:41:21'),
('c4e50f9259fecd152d9ecf8a7c80bf1c6163a4431945e72a1088af2054cdf1152bfdf3fddae18398', 35, 1, 'ejarly', '[]', 0, '2020-09-13 10:00:16', '2020-09-13 10:00:16', '2021-09-13 10:00:16'),
('c505fd9da34c56fed951f12b892f142de66fe0c8753228f9eccaaed2fffcd2944a1db86f187d4bdf', 30, 1, 'ejarly', '[]', 0, '2020-07-29 12:14:54', '2020-07-29 12:14:54', '2021-07-29 12:14:54'),
('c6083e4cd116c3a1baa7a6b75b96e844787afd78af761fe916f8a0a0023527c40eb2a470d2d45089', 6, 1, 'ejarly', '[]', 0, '2020-08-27 15:57:57', '2020-08-27 15:57:57', '2021-08-27 15:57:57'),
('c6be42733d163d8bc34232605c8865063b3c408c6511e516f5dc6cd5b8cb46f7eea538ebb8afa920', 35, 1, 'ejarly', '[]', 0, '2020-09-02 15:19:08', '2020-09-02 15:19:08', '2021-09-02 15:19:08'),
('c796e1927c973b7dd3e67e4163bc27601141ae6f323ddc19db8f2f8c956ccfedb9514de9bcbab060', 54, 1, 'ejarly', '[]', 0, '2020-11-01 09:51:00', '2020-11-01 09:51:00', '2021-11-01 09:51:00'),
('c8860898f7debf12288cf695f8febdf62b6a14ccc2463bdd9027b2929adf34c0bc44fef23b4cc479', 9, 1, 'ejarly', '[]', 0, '2020-02-20 19:58:48', '2020-02-20 19:58:48', '2021-02-20 13:58:48'),
('c996671db455bd5823760d51778869c2a86e635c7a85bde2b707165167275df5efb169b25f5d39a7', 21, 1, 'ejarly', '[]', 0, '2020-06-25 18:17:49', '2020-06-25 18:17:49', '2021-06-25 20:17:49'),
('c9fbfc4eb38675341c7acb12802453ec38325546c72507fe2266e65e178820ae60deaa89688658f7', 9, 1, 'ejarly', '[]', 0, '2020-03-08 14:44:42', '2020-03-08 14:44:42', '2021-03-08 16:44:42'),
('ca80456ee27fd213dc4ff109a0ba188431360501104d3f2edae1f730a85a8429f2ec983272fafcf7', 26, 1, 'ejarly', '[]', 0, '2020-06-24 16:43:02', '2020-06-24 16:43:02', '2021-06-24 18:43:02'),
('ca9b5da0c883cf54c14e10f376cbb8d2b7782075d3ca884d6b78f0df14c4204e33e9986a738231f8', 24, 1, 'ejarly', '[]', 0, '2020-09-23 14:19:23', '2020-09-23 14:19:23', '2021-09-23 14:19:23'),
('cbb40e6dc27340aee7100d759988aa16353e4e1f02d820405cfc69ecd995734dfcf2acb4a7012e24', 34, 1, 'ejarly', '[]', 0, '2020-08-30 08:29:21', '2020-08-30 08:29:21', '2021-08-30 08:29:21'),
('cbfd353da54809be97fe8e7a8cf20c5a6e2af44d76b16b7702b99a9a49615c07cef8bfdd16847c32', 26, 1, 'ejarly', '[]', 0, '2020-06-22 08:42:13', '2020-06-22 08:42:13', '2021-06-22 10:42:13'),
('cc2d219bed762072e02603dcfda9948130fccaaf7c6d11e03e661226328a8a035a93689182b759dc', 53, 1, 'ejarly', '[]', 0, '2020-10-21 14:58:17', '2020-10-21 14:58:17', '2021-10-21 14:58:17'),
('cc4fa5a28f8693a7f320e292b78432eb2753de39ae48ee36b956ef1619096ebb6e8bcab269004bee', 28, 1, 'ejarly', '[]', 0, '2020-09-21 13:05:02', '2020-09-21 13:05:02', '2021-09-21 13:05:02'),
('cc7f907ebe23da39a7420620e45423910a135600a969b6daf477a82a69bfc64000edcfaabf9016ba', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:51:44', '2020-09-21 09:51:44', '2021-09-21 09:51:44'),
('ccaab71b3a539fea0528477fbcab50deeb9a48741ec849e86dd1a0dbeb74a6c2e5ba000c53d62f74', 35, 1, 'ejarly', '[]', 0, '2020-09-27 09:59:01', '2020-09-27 09:59:01', '2021-09-27 09:59:01'),
('ce1eb5fd601ce5b30a9b61e0a515562997f5234bf4bf6f793b3205436fdd1781d266e347916975e3', 29, 1, 'ejarly', '[]', 0, '2020-07-08 13:33:20', '2020-07-08 13:33:20', '2021-07-08 15:33:20'),
('d062f9679cc92cd26544601f71443baf73f1747c460e2c389dd63dfae572245784cb228cbc131e87', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:20:24', '2020-01-28 13:20:24', '2021-01-28 07:20:24'),
('d111de5d3c03d2768293d07eaa1a946d790a281739f0ef99941daa244b63f153d6ca7437452f86d6', 50, 1, 'ejarly', '[]', 0, '2020-10-15 15:08:45', '2020-10-15 15:08:45', '2021-10-15 15:08:45'),
('d1c9ea49f044806ebdac64dc6ca972944f13e092e182b89ffc908eb6b0fd6df6d84cece4fe2e881f', 49, 1, 'ejarly', '[]', 0, '2020-10-13 08:59:18', '2020-10-13 08:59:18', '2021-10-13 08:59:18'),
('d23e7fb58b237337942f9bf79db22231dadda69c3e6c6ddcf3f3df1be01a9e303531b1fe74e9d4cc', 22, 1, 'ejarly', '[]', 0, '2020-06-11 18:07:55', '2020-06-11 18:07:55', '2021-06-11 20:07:55'),
('d3a3f1041e6da407efa71f721f37b5f03dd14ac65874afb7761625bd46343ede4657ec021de9b42f', 30, 1, 'ejarly', '[]', 0, '2020-07-12 12:57:11', '2020-07-12 12:57:11', '2021-07-12 14:57:11'),
('d3f05d7119533813979780df08f2a73e6c9d2b2857a59e87c139c8af641efb471cc142100f19c65a', 41, 1, 'ejarly', '[]', 0, '2020-09-15 10:03:45', '2020-09-15 10:03:45', '2021-09-15 10:03:45'),
('d45004e321fca43c9653ea2cbcc6f95c7ea94d3a445ff404651e2f47c44b5271d10444b7575fa8e6', 47, 1, 'ejarly', '[]', 0, '2020-10-30 16:36:40', '2020-10-30 16:36:40', '2021-10-30 16:36:40'),
('d45414f6d77db1f49ec83a095b8d001d9834139eb3cbb6e995a9f1d62770f70c7380157f570c4720', 11, 1, 'ejarly', '[]', 0, '2020-02-25 21:12:14', '2020-02-25 21:12:14', '2021-02-25 15:12:14'),
('d5066976291e12bbda9849b4310175f8dede64181ef37c7cf7d461c70f963f39bb1790dfc03e6750', 6, 1, 'ejarly', '[]', 0, '2020-08-27 15:46:58', '2020-08-27 15:46:58', '2021-08-27 15:46:58'),
('d5229acb1aadf49da774bb7eea97d41caf86412b1e0a7b32cf6495ede13ffd9ad0653eb19d9aac36', 54, 1, 'ejarly', '[]', 0, '2020-11-01 09:35:48', '2020-11-01 09:35:48', '2021-11-01 09:35:48'),
('d5e56e57de41c9aaa008c7df88a35e5feb6724dbabc331b8b52ce4cea108cf36489c1fed89c957c4', 35, 1, 'ejarly', '[]', 0, '2020-09-24 08:07:02', '2020-09-24 08:07:02', '2021-09-24 08:07:02'),
('d642a5d1683e427a009e7f45c62d5a8ea5f363037e7532a14bdb59d4cb8528371116cef9fb95874d', 21, 1, 'ejarly', '[]', 0, '2020-06-24 17:04:17', '2020-06-24 17:04:17', '2021-06-24 19:04:17'),
('d7225708f749d57d9b9043197a2e7d9995f7bddb6e3cb27cd4c4a92ec53cc726d0a87714637553e7', 60, 1, 'ejarly', '[]', 0, '2020-10-28 07:32:19', '2020-10-28 07:32:19', '2021-10-28 07:32:19'),
('d7286197b25afc20373d537935186ff8c9d100752ac49eabc7ae0675af352482279800a5cab93c18', 32, 1, 'ejarly', '[]', 0, '2020-08-09 18:55:10', '2020-08-09 18:55:10', '2021-08-09 18:55:10'),
('d731537e0986fb63aae5ac87c1519d280c1f621db029ed39a56146c12b18656b7be5f7866f84c188', 4, 1, 'ejarly', '[]', 0, '2020-06-10 15:48:14', '2020-06-10 15:48:14', '2021-06-10 17:48:14'),
('d7b6bc4aecd7bbddf3fcde5a864a02cc1ed4866a31cf395124ea0ee4f6fd0983459880e64b3948df', 35, 1, 'ejarly', '[]', 0, '2020-09-22 06:09:24', '2020-09-22 06:09:24', '2021-09-22 06:09:24'),
('d7fa55ec153232d960c6249fe1016f17c44ea05c3876f75a10b1770b4ad20b4226972c7e8a7ec9cc', 35, 1, 'ejarly', '[]', 0, '2020-09-22 14:41:32', '2020-09-22 14:41:32', '2021-09-22 14:41:32'),
('d90f6d8c3d49ecdbafe18a6f9a0c1a1c28fa616ea1a0e56b92c2f85229d8eac32ff3b4c3f70d5cb5', 54, 1, 'ejarly', '[]', 0, '2020-10-21 08:52:13', '2020-10-21 08:52:13', '2021-10-21 08:52:13'),
('d92e21bd0a818711d23bfb1cd20c64919ee33732cae7a77758efa0d46282323fe53cbedecd763df4', 50, 1, 'ejarly', '[]', 0, '2020-10-19 15:03:41', '2020-10-19 15:03:41', '2021-10-19 15:03:41'),
('d93436ff5b3bc392a5bfffbc36f7bf6830e78bee3781c53f4801aa5f3dcf1dd4f99a9473f6cb7412', 35, 1, 'ejarly', '[]', 0, '2020-09-17 15:03:28', '2020-09-17 15:03:28', '2021-09-17 15:03:28'),
('da566e250c43f49f49afda50a058b177588a2e0f545579651d7c2d3873ec5511c3bc9507580f896e', 32, 1, 'ejarly', '[]', 0, '2020-10-21 05:52:58', '2020-10-21 05:52:58', '2021-10-21 05:52:58'),
('daeb286d9c8cbefa8e95f33f2bca040eb5f47eedacbe8f165398d0e69afe0b7db29f2c3fe7343a0f', 50, 1, 'ejarly', '[]', 0, '2020-10-15 13:03:41', '2020-10-15 13:03:41', '2021-10-15 13:03:41'),
('dbbe48d9db38632ebefe8684dd5e9d0a910161c349dfa583bb79f34362662cb71843219849a702cc', 22, 1, 'ejarly', '[]', 0, '2020-06-29 17:15:35', '2020-06-29 17:15:35', '2021-06-29 19:15:35'),
('dd1677d92a864fc4670d98df805f10910269e5a92118e0d7a1a72d59842aa984a2a9d0ad398306d6', 50, 1, 'ejarly', '[]', 0, '2020-09-28 12:20:16', '2020-09-28 12:20:16', '2021-09-28 12:20:16'),
('dd4c88c4cf9eebeb83968c46efdffb80701c5dac102ca3f215a8a082617e49ef9d82445cdd2d935e', 4, 1, 'ejarly', '[]', 0, '2020-05-05 11:52:48', '2020-05-05 11:52:48', '2021-05-05 13:52:48'),
('dd8c72f6c792c55aac59445e99ad61d68d5b6e49857f4e4d532063ab53cfda73b0680426992317ee', 5, 1, 'ejarly', '[]', 0, '2020-01-28 13:23:05', '2020-01-28 13:23:05', '2021-01-28 07:23:05'),
('de398985fa7eec2e6e43938ef5f65a42acf85107cd913119a714bd5395b5dfd8fc6b7b304ae51403', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:33:16', '2020-09-10 08:33:16', '2021-09-10 08:33:16'),
('df460db8791c6dfcaff28a7971f17526474420c701e8c4fac720261e527dfa3fd6188b401281aa9b', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:50:17', '2020-01-05 17:50:17', '2021-01-05 17:50:17'),
('df4659ee84720ffde758e93442996d85a12e783a05bbb0891499a082a9e024b19e070ceaf5468c12', 35, 1, 'ejarly', '[]', 0, '2020-10-12 15:58:31', '2020-10-12 15:58:31', '2021-10-12 15:58:31'),
('df9eac74c5393a0f4a2efaadf9674762a17b024fb32701e5f97bd89fddee93144e552e30f769c07a', 33, 1, 'ejarly', '[]', 0, '2020-09-08 09:27:29', '2020-09-08 09:27:29', '2021-09-08 09:27:29'),
('dfb77259033ace34ec0317baa37394f432648a070bd4a3a7779508b5695f1626283b7440e764207e', 35, 1, 'ejarly', '[]', 0, '2020-10-12 15:51:08', '2020-10-12 15:51:08', '2021-10-12 15:51:08'),
('e20aec72b423662a34934bf87c9ee7898c9189ed5db19a32524bfab4512a0d935721e83f75f22f83', 3, 1, 'ejarly', '[]', 0, '2020-06-18 15:41:55', '2020-06-18 15:41:55', '2021-06-18 17:41:55'),
('e25c25e8fea71c523891e972eeda916c9a71c9ef6ffaa5852ecf27aa53c2bf2333890c6e90a0a83b', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:10:54', '2020-09-21 09:10:54', '2021-09-21 09:10:54'),
('e30470cb39262f41a675039ca4bcb09078be539770248d00e770d5bb54b7280565450e421585bc44', 3, 1, 'ejarly', '[]', 0, '2020-01-05 17:19:37', '2020-01-05 17:19:37', '2021-01-05 17:19:37'),
('e325f469aa0141af8e736ecd631e753eccf8a06daa79cb9d95fbbcfb58d478ca1a97da889d27fcc6', 58, 1, 'ejarly', '[]', 0, '2020-11-01 12:36:39', '2020-11-01 12:36:39', '2021-11-01 12:36:39'),
('e341ac294f9bc55743fe817d0d8399e38f2809493840b0088c107183c6445ceb538801fb153cba69', 33, 1, 'ejarly', '[]', 0, '2020-08-15 10:02:25', '2020-08-15 10:02:25', '2021-08-15 10:02:25'),
('e35edc0d4703eee3d16c780dadf9bfa47c4fed84919f6198b5f2a00dbc27de11e0dd7c7a3c5b6659', 24, 1, 'ejarly', '[]', 0, '2020-09-23 17:28:00', '2020-09-23 17:28:00', '2021-09-23 17:28:00'),
('e3974c3e4b8e91ea443dfd07a63c4f95da7e139f3401d6e1a607c90dec1485748f79098cdc5839e2', 30, 1, 'ejarly', '[]', 0, '2020-07-11 22:00:04', '2020-07-11 22:00:04', '2021-07-12 00:00:04'),
('e3a85aac5bdd518b4665ddc9d35f1809ebbd09192d9b41ba24b45ad781c5928eb12b77d00de004b5', 28, 1, 'ejarly', '[]', 0, '2020-09-20 11:27:33', '2020-09-20 11:27:33', '2021-09-20 11:27:33'),
('e3bed932a50f957960f5333648df135bdcd6ea900f6d991bac1e42ca1c4e62d83d7e594cb8e634af', 32, 1, 'ejarly', '[]', 0, '2020-09-24 07:48:10', '2020-09-24 07:48:10', '2021-09-24 07:48:10'),
('e3d9e67ba0dc28fc535168455f12e1f85da98c7ad771750e877bb4b3fcd9c0d8b2640dd3fd8d6f27', 4, 1, 'ejarly', '[]', 0, '2020-09-17 10:04:45', '2020-09-17 10:04:45', '2021-09-17 10:04:45'),
('e461280dbe18e0c9529592a8204856311e9b92deca58a1f78060efbbf0b2892a70f0bc39245cfef3', 35, 1, 'ejarly', '[]', 0, '2020-09-02 11:47:47', '2020-09-02 11:47:47', '2021-09-02 11:47:47'),
('e491f2bc8976d92690a2b1f4ce3a459d15f948c36fde8042aa81cfd1daf323b89ec5f8deba627354', 47, 1, 'ejarly', '[]', 0, '2020-10-12 14:56:32', '2020-10-12 14:56:32', '2021-10-12 14:56:32'),
('e544982d684005b32273592e9f9252bd99a4afd649d52e206b7038dddb7a94c9a307f902351b0fc9', 4, 1, 'ejarly', '[]', 0, '2020-07-22 09:21:10', '2020-07-22 09:21:10', '2021-07-22 11:21:10'),
('e54e7f6556d27a1c74fcc0ad5ac5fde5a1f11f2c1bceed58127ea3b0ccb0c3bba2e1cd8c11499c99', 28, 1, 'ejarly', '[]', 0, '2020-09-10 08:35:26', '2020-09-10 08:35:26', '2021-09-10 08:35:26'),
('e58008d72085b93d91138a0caadc545f4f43d2bb899b9185659a5b673af8bb64182b3186553a4e38', 4, 1, 'ejarly', '[]', 0, '2020-07-16 13:43:03', '2020-07-16 13:43:03', '2021-07-16 15:43:03'),
('e6414a8059477245a5d83cf93cfc83e3f369cb8be70eed391542363b5be705520ee07544b55b9106', 21, 1, 'ejarly', '[]', 0, '2020-05-10 11:58:09', '2020-05-10 11:58:09', '2021-05-10 13:58:09'),
('e6bb386954747ff85cbd3350bfbc42d0e49f6837fbc97cf80b750de5baf6bdfd0815dcb37ef06f82', 49, 1, 'ejarly', '[]', 0, '2020-10-12 15:14:16', '2020-10-12 15:14:16', '2021-10-12 15:14:16'),
('e7324269f3eaa79555e4dfa81204cbe576f9798d8a6d845948dcdc9f851683a7929aa7ba0a5ac242', 32, 1, 'ejarly', '[]', 0, '2020-09-08 13:04:18', '2020-09-08 13:04:18', '2021-09-08 13:04:18'),
('e73ccc37220d9c59105f5d7101726f15802883020046ac6bc45f8fb4d683c78166ee3d10c777ba19', 52, 1, 'ejarly', '[]', 0, '2020-10-12 08:11:31', '2020-10-12 08:11:31', '2021-10-12 08:11:31'),
('e7eec5e523175ae13605f794f63729d7b3b52bcd5fbd34cd4c3d5491b61a9f29e39caa505b323153', 3, 1, 'ejarly', '[]', 0, '2019-12-11 14:17:12', '2019-12-11 14:17:12', '2020-12-11 14:17:12'),
('e8eaffb8e6602150601ee85b99c99752f9247eeada627c8081c5dce0b4ab86db00d39b48a2af2ab5', 16, 1, 'ejarly', '[]', 0, '2020-06-18 16:38:09', '2020-06-18 16:38:09', '2021-06-18 18:38:09'),
('ea5aabb25276c2cbf6afd61d65f0b61768c4a57198854acb5340bec377a2867719ff7cbc244c24e1', 24, 1, 'ejarly', '[]', 0, '2020-09-24 07:40:36', '2020-09-24 07:40:36', '2021-09-24 07:40:36'),
('ea7b6622a463f89520f0afd4579258f1601a1fcbb1acacc5c2b56edf508c4fceec22964347d13e37', 49, 1, 'ejarly', '[]', 0, '2020-10-18 07:55:51', '2020-10-18 07:55:51', '2021-10-18 07:55:51'),
('ea7c0d78a9b862005aafb797701abb7d4445d0b7ae181be6c108060e9bc90268320d87bba1594a37', 7, 1, 'ejarly', '[]', 0, '2020-02-03 16:29:51', '2020-02-03 16:29:51', '2021-02-03 10:29:51'),
('ed28ed60c641a2636b810b04e8e03fd981f6d9c06bf9ba65e1c3d1dd8fc8a776a5cadc783b7fe7c7', 4, 1, 'ejarly', '[]', 0, '2020-08-06 11:14:59', '2020-08-06 11:14:59', '2021-08-06 11:14:59'),
('ed3b07789da7bcbd5c909a21c88028d6d6d60ceb70196562ad40920a98534e6c8c3c86f3d435ed57', 61, 1, 'ejarly', '[]', 0, '2020-10-29 09:40:43', '2020-10-29 09:40:43', '2021-10-29 09:40:43'),
('ed5d2557380617d6288b52efb92e4e916f5073fd735d31ec99c25c530cb13ddf6a17d1464ef12ca6', 59, 1, 'ejarly', '[]', 0, '2020-10-27 16:51:02', '2020-10-27 16:51:02', '2021-10-27 16:51:02'),
('ee218a08c6ec9f576c1b5451c033a79cc0bfbceb11b5208165fa7e0972e9a1e250a93ab2da485843', 21, 1, 'ejarly', '[]', 0, '2020-07-08 16:51:19', '2020-07-08 16:51:19', '2021-07-08 18:51:19'),
('ee25a7c3b9abe0e20cf9f85cac59203630a67a8c849d5da2052a29de205b933094a152e1ece8fc6e', 30, 1, 'ejarly', '[]', 0, '2020-07-14 11:10:49', '2020-07-14 11:10:49', '2021-07-14 13:10:49'),
('ee26f2850ab483bd76433c80e0afbf83d57ff43811ff793ed0fe9032574dd4c3e5d363b29849cd3e', 21, 1, 'ejarly', '[]', 0, '2020-07-06 13:58:34', '2020-07-06 13:58:34', '2021-07-06 15:58:34'),
('ee91d6fb797c1138d882ccf0b70da9a44ab78066c6cf1ad49090a7d3ed86b8711241645998c4e5be', 20, 1, 'ejarly', '[]', 0, '2020-05-05 12:06:27', '2020-05-05 12:06:27', '2021-05-05 14:06:27'),
('eee24fc9d47fae84035ce9657a144ae2229b9b8f3fcb91afd9452d1a3f648966dfee0c543b0f7e31', 5, 1, 'ejarly', '[]', 0, '2020-02-20 18:42:27', '2020-02-20 18:42:27', '2021-02-20 12:42:27'),
('efe8ee730987ae6bdc6ab087c4c29a147d6389e978c61a9b5e14e0f02267e337060c9e8fbe01489e', 59, 1, 'ejarly', '[]', 0, '2020-11-02 12:54:58', '2020-11-02 12:54:58', '2021-11-02 12:54:58'),
('f04df12e92e1908198cd798c4d96fe279f8c2200f59214da0bdd23100647a737fa76238582e07c9b', 35, 1, 'ejarly', '[]', 0, '2020-09-14 08:25:49', '2020-09-14 08:25:49', '2021-09-14 08:25:49'),
('f0584a4555c63934037571c614d64c49394ae4ec1f799ff7da0626c7bf4b5cda485034c381504db7', 47, 1, 'ejarly', '[]', 0, '2020-10-08 06:20:17', '2020-10-08 06:20:17', '2021-10-08 06:20:17'),
('f11d9286db0958ae6ce8c0609c233b5064053f89c49aa5152b42253c88d3779e5ae921f3f2d71034', 3, 1, 'ejarly', '[]', 0, '2020-06-09 14:32:37', '2020-06-09 14:32:37', '2021-06-09 16:32:37'),
('f1842639463e7e3c48c79f4f4e2769fd1729f675db20c3ee4f89010de0bb36b718976bda06a24526', 30, 1, 'ejarly', '[]', 0, '2020-07-14 13:45:24', '2020-07-14 13:45:24', '2021-07-14 15:45:24'),
('f19299b37b776bd5a45ac3c69f1f2e1d68d87c7e8d535f5a560db13f566fb692f0e3285735df5f35', 24, 1, 'ejarly', '[]', 0, '2020-09-09 12:04:56', '2020-09-09 12:04:56', '2021-09-09 12:04:56'),
('f20419e04667ede3e0e3e0fe18d0f739bfbdbbb13d532f3b0d4778af615c42548fdae9c8c5411709', 35, 1, 'ejarly', '[]', 0, '2020-09-16 09:11:10', '2020-09-16 09:11:10', '2021-09-16 09:11:10'),
('f2b957e018352f9208f898a37be3cd0addf45689e4216e3bc34747c9a1fb6c29da45f9ad2dfa2e89', 61, 1, 'ejarly', '[]', 0, '2020-10-29 09:28:48', '2020-10-29 09:28:48', '2021-10-29 09:28:48'),
('f2bf4187fe46f1ae3240f9136bf1f0b60317ab5783dc6823954743247f5f659f8e292da4b5e7b057', 45, 1, 'ejarly', '[]', 0, '2020-09-21 09:26:28', '2020-09-21 09:26:28', '2021-09-21 09:26:28'),
('f2ffed30cf66044ba109babfdce03bd1a5cb730db5f9ab44b69a30fd99dafb8a36d82a0194230b4d', 50, 1, 'ejarly', '[]', 0, '2020-10-19 07:34:36', '2020-10-19 07:34:36', '2021-10-19 07:34:36'),
('f3b38068ef791603d77518c4f70f6fd663078e429e0bbcba93a52eca6c19b84dabc33268bf8f05f3', 39, 1, 'ejarly', '[]', 0, '2020-09-15 09:34:04', '2020-09-15 09:34:04', '2021-09-15 09:34:04'),
('f3dbb32f6e241840d41cc47af7bf637dc6c6441c8676ed350d3a2bce161e2221e0a85729b6585647', 43, 1, 'ejarly', '[]', 0, '2020-09-20 14:11:09', '2020-09-20 14:11:09', '2021-09-20 14:11:09'),
('f55f260488334cb8c7b14fe6aebacc5364fde13c95f457cdf41167eaedebbec2a0befa0d04a4f329', 28, 1, 'ejarly', '[]', 0, '2020-08-09 10:19:10', '2020-08-09 10:19:10', '2021-08-09 10:19:10'),
('f58f67780462ba9f82bde78b0ffd38a45418c415619b811f1ffa5ab135826dcbd2a7d92a82da6294', 35, 1, 'ejarly', '[]', 0, '2020-09-21 13:21:55', '2020-09-21 13:21:55', '2021-09-21 13:21:55'),
('f5e1d0a3fe2b26d289c69793bee74fd485440ef0d1576471b833e3eaafec8e99d0ac81b5e9d87370', 33, 1, 'ejarly', '[]', 0, '2020-09-09 17:44:06', '2020-09-09 17:44:06', '2021-09-09 17:44:06'),
('f5e2afdf098324fb6f9ec65a71602bdf84174fcffe4f46247f781078fad46381617c10b19c802162', 54, 1, 'ejarly', '[]', 0, '2020-10-21 14:14:34', '2020-10-21 14:14:34', '2021-10-21 14:14:34'),
('f66565e807bec18ef0df01f8b274410e3c73ecdf2111c05a8631d52f3e0ebe4ce0a691022c814beb', 49, 1, 'ejarly', '[]', 0, '2020-10-12 08:32:23', '2020-10-12 08:32:23', '2021-10-12 08:32:23'),
('f66c4a65b50fecd4a490df94f6072a3e4a85d7f7d7ca3bab539e8303a1ae5f26aa47868ed287819f', 28, 1, 'ejarly', '[]', 0, '2020-08-30 08:42:07', '2020-08-30 08:42:07', '2021-08-30 08:42:07'),
('f6730ffc3333d60901ccceb01550e07bcb2874b8030d6db4c390bff1de521f6b5921f1dc3a2835e5', 24, 1, 'ejarly', '[]', 0, '2020-11-02 15:21:20', '2020-11-02 15:21:20', '2021-11-02 15:21:20'),
('f6d89346892d206789f748d8eec7192d6ff65801f6b55735a948af2eab81b54e463a5346cf013adc', 24, 1, 'ejarly', '[]', 0, '2020-09-02 11:27:07', '2020-09-02 11:27:07', '2021-09-02 11:27:07'),
('f727a7740ed1b2e136bce0f1167e17a5aeeb1ec86b38263cbca74081685bb71a99b6f640ed138d43', 31, 1, 'ejarly', '[]', 0, '2020-07-14 11:21:56', '2020-07-14 11:21:56', '2021-07-14 13:21:56'),
('f9800620a244accd3001ed401059307657f18f5a2ecce9e928abad0f8fe7f0044d1ff5faba1f373c', 35, 1, 'ejarly', '[]', 0, '2020-09-08 16:31:39', '2020-09-08 16:31:39', '2021-09-08 16:31:39'),
('f9baa3d28582cf8d6ed471615a0b1239def4e6f0b29a833d8ba40f7eec08125efb192106fa15eb5b', 35, 1, 'ejarly', '[]', 0, '2020-09-15 14:10:18', '2020-09-15 14:10:18', '2021-09-15 14:10:18'),
('facec22272706e3643a8955f0295ebb816787497f03dfbb44083774cbd4abd45cc79b7e4d26d69e6', 24, 1, 'ejarly', '[]', 0, '2020-09-21 15:06:57', '2020-09-21 15:06:57', '2021-09-21 15:06:57'),
('fae4faaaec4ecb79657f03dfa19a99eb693f35977875d6fcdce8000189d8260f93a59a235f6977c4', 3, 1, 'TutsForWeb', '[]', 0, '2019-12-09 17:07:51', '2019-12-09 17:07:51', '2020-12-09 17:07:51'),
('faf2ca0c6911ef852bd7ff33672c1db9f80d9ef2bfdc220ecf38b4ebeb56c7f20efc6b69825ddceb', 17, 1, 'ejarly', '[]', 0, '2020-05-03 17:24:07', '2020-05-03 17:24:07', '2021-05-03 19:24:07'),
('fb68fa78402be734e151a00c3f92417a2c19a8c3c46bd5c7d2fca88b760b44a5398b38130a97feb5', 28, 1, 'ejarly', '[]', 0, '2020-07-28 12:03:08', '2020-07-28 12:03:08', '2021-07-28 12:03:08'),
('fc04c1f04ebcd74c4ebf7262ec18a2119771481bfed3ee9da3537135ba663642e9a240e56c2378c0', 21, 1, 'ejarly', '[]', 0, '2020-05-10 12:05:23', '2020-05-10 12:05:23', '2021-05-10 14:05:23');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('fc764a646aed7dbd001f364f7e76139dc96e038f95ce471036b70d60c76117185f249746989f78c5', 50, 1, 'ejarly', '[]', 0, '2020-10-19 09:24:21', '2020-10-19 09:24:21', '2021-10-19 09:24:21'),
('fd371c65dd2cb9da2f6ec55ace00dad34226e3b170abfbaad4904d13d9be1d73109e861d03b11d41', 23, 1, 'ejarly', '[]', 0, '2020-06-15 07:24:17', '2020-06-15 07:24:17', '2021-06-15 09:24:17'),
('fd8adf2ab239919c362b8e500a9c6d1ba324d9c6c82ac8e8a3126b769d5af3c7395a670661a39cbb', 28, 1, 'ejarly', '[]', 0, '2020-09-22 10:30:28', '2020-09-22 10:30:28', '2021-09-22 10:30:28'),
('fe2f332d994f997d5cb9a9586ab066c6a76983c9bf2754fdacc3cf66258e775258bf8deb15ed2a20', 32, 1, 'ejarly', '[]', 0, '2020-10-29 18:28:31', '2020-10-29 18:28:31', '2021-10-29 18:28:31'),
('fe48040991e194916ba355f24c39a685d43eaf7b5e5ff16950f30a99b210f77f966086a4232d15ca', 28, 1, 'ejarly', '[]', 0, '2020-09-21 14:39:10', '2020-09-21 14:39:10', '2021-09-21 14:39:10'),
('fe7ed15fd5093e00643b05a9aa90913a80c2280412d934d611ee90290690aa6abec185179780a1c7', 24, 1, 'ejarly', '[]', 0, '2020-09-15 13:33:41', '2020-09-15 13:33:41', '2021-09-15 13:33:41'),
('ff47f840ff9ad7367f91d4b1250a50aacf1221c36559d991ffa2d5078f28e4dcd0a8486f3983e4cc', 32, 1, 'ejarly', '[]', 0, '2020-10-21 15:28:24', '2020-10-21 15:28:24', '2021-10-21 15:28:24'),
('ffad7f1e4156c971a02b95afa37bd8f9da4c8cfd5c79b6a607ac92d0e3bb77f63851717247587e4c', 3, 1, 'ejarly', '[]', 0, '2020-01-08 16:49:38', '2020-01-08 16:49:38', '2021-01-08 10:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'FOafN76eNLqMbMiMZfoiItFPlbUOudpMify1fg4S', 'http://localhost', 1, 0, 0, '2019-12-09 15:49:55', '2019-12-09 15:49:55'),
(2, NULL, 'Laravel Password Grant Client', 'lXSNdFLam0SZPpVREBrCjx8OPKxghZQPVgBgoxN3', 'http://localhost', 0, 1, 0, '2019-12-09 15:49:55', '2019-12-09 15:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-12-09 15:49:55', '2019-12-09 15:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `submitted_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1',
  `extension_status_id` int(11) NOT NULL DEFAULT '1',
  `note` varchar(255) DEFAULT NULL,
  `owner_note` text,
  `owner_refuse_reason` varchar(255) DEFAULT NULL,
  `renter_refuse_reason` varchar(255) DEFAULT NULL,
  `sub_total` float(8,2) NOT NULL DEFAULT '0.00',
  `total` float(8,2) NOT NULL DEFAULT '0.00',
  `owner_total` float(8,2) NOT NULL DEFAULT '0.00',
  `cash_back_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `application_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `tax_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `cash_back_amount` float(8,2) NOT NULL DEFAULT '0.00',
  `application_amount` float(8,2) NOT NULL DEFAULT '0.00',
  `tax_amount` float(8,2) NOT NULL DEFAULT '0.00',
  `is_extended` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `owner_id`, `status_id`, `extension_status_id`, `note`, `owner_note`, `owner_refuse_reason`, `renter_refuse_reason`, `sub_total`, `total`, `owner_total`, `cash_back_percentage`, `application_percentage`, `tax_percentage`, `cash_back_amount`, `application_amount`, `tax_amount`, `is_extended`, `created_at`, `updated_at`) VALUES
(66, 58, 49, 1, 1, 'Ggccg', NULL, NULL, NULL, 10.00, 10.10, 9.50, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-27 17:41:13', '2020-10-27 17:41:13'),
(67, 58, 49, 1, 1, 'Ugfuihg', NULL, NULL, NULL, 10.00, 10.10, 9.50, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-27 17:58:13', '2020-10-27 17:58:13'),
(68, 58, 49, 1, 1, 'Bhhgy', NULL, NULL, NULL, 10.00, 10.10, 9.50, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-27 18:26:14', '2020-10-27 18:26:14'),
(69, 58, 49, 1, 1, 'Hgggy', NULL, NULL, NULL, 10.00, 10.10, 9.50, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-27 18:29:26', '2020-10-27 18:29:26'),
(70, 58, 49, 1, 1, 'Ugghfffh', NULL, NULL, NULL, 10.00, 10.10, 9.50, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-27 18:31:32', '2020-10-27 18:31:32'),
(71, 58, 49, 1, 1, 'Jhhuuh', NULL, NULL, NULL, 10.00, 10.10, 9.50, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-27 18:40:32', '2020-10-27 18:40:32'),
(72, 59, 54, 5, 3, 'Mmmm', NULL, NULL, NULL, 220.00, 222.20, 209.00, 0.00, 0.00, 0.00, 0.00, 8.80, 2.20, 1, '2020-10-28 08:16:09', '2020-11-02 15:43:21'),
(73, 62, 59, 13, 2, 'Bbbbbb', NULL, NULL, NULL, 25.00, 25.25, 23.75, 0.00, 0.00, 0.00, 0.00, 1.00, 0.25, 0, '2020-10-28 09:49:38', '2020-11-01 14:07:08'),
(74, 63, 54, 10, 1, 'مةنةنةةنهه', 'عيب ١', NULL, NULL, 220.00, 222.20, 209.00, 0.00, 0.00, 0.00, 0.00, 8.80, 2.20, 0, '2020-10-28 11:21:35', '2020-10-28 11:42:10'),
(75, 63, 54, 10, 1, 'ومةهعا', NULL, NULL, NULL, 220.00, 222.20, 209.00, 0.00, 0.00, 0.00, 0.00, 8.80, 2.20, 0, '2020-10-28 11:42:56', '2020-10-28 11:44:46'),
(84, 54, 63, 9, 1, 'مةمنتلع', NULL, NULL, NULL, 10.00, 10.10, 9.60, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-28 16:39:37', '2020-10-28 17:35:12'),
(85, 54, 63, 1, 1, 'تتللللاغ', NULL, NULL, NULL, 10.00, 10.10, 9.60, 0.00, 0.00, 0.00, 0.00, 0.40, 0.10, 0, '2020-10-28 17:36:02', '2020-10-28 17:36:02'),
(86, 61, 54, 5, 3, '٧لتلوى', NULL, NULL, NULL, 220.00, 222.20, 211.20, 0.00, 0.00, 0.00, 0.00, 8.80, 2.20, 0, '2020-10-28 18:36:59', '2020-10-28 18:38:42'),
(87, 61, 54, 5, 3, 'ةنةزةنى', NULL, NULL, NULL, 220.00, 222.20, 211.20, 0.00, 0.00, 0.00, 0.00, 8.80, 2.20, 0, '2020-10-29 07:36:35', '2020-10-29 07:42:14'),
(88, 54, 24, 10, 1, 'وصف الطلب', NULL, NULL, NULL, 1400.00, 1414.00, 1344.00, 0.00, 0.00, 0.00, 0.00, 56.00, 14.00, 0, '2020-11-01 09:37:13', '2020-11-01 09:40:20'),
(89, 54, 24, 10, 1, 'رسالة للمالك', 'المنتج خالى من العيوب برجاء التسليم فى الميعاد', NULL, NULL, 100.00, 101.00, 96.00, 0.00, 0.00, 0.00, 0.00, 4.00, 1.00, 0, '2020-11-01 09:52:09', '2020-11-01 10:00:12'),
(90, 54, 24, 10, 1, 'رسالة للمالك', 'لا يوجد اى عيوب فى المنتج', NULL, NULL, 100.00, 101.00, 96.00, 0.00, 0.00, 0.00, 0.00, 4.00, 1.00, 0, '2020-11-01 10:17:14', '2020-11-01 10:20:02'),
(91, 27, 32, 10, 3, 'التلببيير', 'الاتصالات في عونك من قبل أن يكون في عونك من قبل أن يكون في', NULL, NULL, 60.00, 69.00, 54.00, 0.00, 0.00, 0.00, 0.00, 6.00, 9.00, 0, '2020-11-01 11:31:26', '2020-11-01 11:44:36'),
(92, 54, 24, 10, 1, 'الوصف', NULL, NULL, NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, 0, '2020-11-01 12:37:27', '2020-11-01 12:46:25'),
(93, 54, 24, 5, 3, 'Higiguug', NULL, NULL, NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, 0, '2020-11-01 12:53:05', '2020-11-01 12:56:27'),
(94, 54, 24, 5, 3, 'Description', NULL, NULL, NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, 0, '2020-11-01 13:13:22', '2020-11-01 13:15:35'),
(95, 54, 24, 5, 3, '123456', NULL, NULL, NULL, 650.00, 747.50, 585.00, 0.00, 0.00, 0.00, 0.00, 65.00, 97.50, 0, '2020-11-01 13:34:00', '2020-11-01 13:53:17'),
(96, 62, 59, 5, 3, 'Mmmmm', NULL, NULL, NULL, 25.00, 28.75, 22.50, 0.00, 0.00, 0.00, 0.00, 2.50, 3.75, 0, '2020-11-01 13:54:03', '2020-11-01 14:16:40'),
(97, 54, 24, 13, 2, 'Nchchchc', NULL, NULL, NULL, 50.00, 57.50, 45.00, 0.00, 0.00, 0.00, 0.00, 5.00, 7.50, 0, '2020-11-01 14:03:25', '2020-11-01 14:15:51'),
(98, 62, 59, 5, 3, 'Hhhhh', NULL, NULL, NULL, 25.00, 28.75, 22.50, 0.00, 0.00, 0.00, 0.00, 2.50, 3.75, 0, '2020-11-01 14:40:07', '2020-11-01 15:07:23'),
(99, 62, 59, 13, 2, 'Hhh', NULL, NULL, NULL, 25.00, 28.75, 22.50, 0.00, 0.00, 0.00, 0.00, 2.50, 3.75, 0, '2020-11-01 15:09:58', '2020-11-01 17:16:33'),
(100, 32, 35, 1, 1, 'وةاتتتو', NULL, NULL, NULL, 20.00, 23.00, 18.00, 0.00, 0.00, 0.00, 0.00, 2.00, 3.00, 0, '2020-11-01 21:50:25', '2020-11-01 21:50:25'),
(101, 54, 24, 13, 2, 'Owner', NULL, NULL, NULL, 450.00, 517.50, 405.00, 0.00, 0.00, 0.00, 0.00, 45.00, 67.50, 0, '2020-11-02 08:03:10', '2020-11-02 14:49:08'),
(102, 24, 59, 5, 3, 'مروة', NULL, NULL, NULL, 25.00, 28.75, 22.50, 0.00, 10.00, 15.00, 0.00, 2.50, 3.75, 0, '2020-11-02 12:41:38', '2020-11-02 15:33:05'),
(103, 54, 35, 13, 2, 'رورتترت', NULL, NULL, NULL, 25.00, 28.75, 22.50, 0.00, 10.00, 15.00, 0.00, 2.50, 3.75, 0, '2020-11-02 13:46:44', '2020-11-02 13:52:03'),
(104, 54, 24, 13, 2, 'للللل', NULL, NULL, NULL, 10.00, 11.50, 9.00, 0.00, 10.00, 15.00, 0.00, 1.00, 1.50, 0, '2020-11-02 15:22:22', '2020-11-02 15:25:30'),
(105, 59, 63, 1, 1, 'نؤيو', NULL, NULL, NULL, 10.00, 11.50, 9.00, 0.00, 10.00, 15.00, 0.00, 1.00, 1.50, 0, '2020-11-02 15:34:26', '2020-11-02 15:34:26'),
(106, 62, 59, 8, 3, 'Ggt', NULL, NULL, NULL, 25.00, 28.75, 22.50, 0.00, 10.00, 15.00, 0.00, 2.50, 3.75, 1, '2020-11-02 16:01:49', '2020-11-02 16:17:02'),
(107, 54, 24, 10, 3, 'رسالة', NULL, NULL, NULL, 50.00, 57.50, 45.00, 0.00, 10.00, 15.00, 0.00, 5.00, 7.50, 1, '2020-11-03 08:53:48', '2020-11-03 08:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price_per_day` float(8,2) NOT NULL DEFAULT '0.00',
  `price_per_week` float(8,2) NOT NULL DEFAULT '0.00',
  `price_per_month` float(8,2) NOT NULL DEFAULT '0.00',
  `total` float(8,2) NOT NULL DEFAULT '0.00',
  `from_date` timestamp NULL DEFAULT NULL,
  `to_date` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `rent_price` double NOT NULL,
  `delivery_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `owner_id`, `product_id`, `price_per_day`, `price_per_week`, `price_per_month`, `total`, `from_date`, `to_date`, `quantity`, `rent_price`, `delivery_type`, `created_at`, `updated_at`) VALUES
(69, 66, 58, 49, 185, 10.00, 20.00, 30.00, 10.00, '2020-10-27 00:00:00', '2020-10-27 00:00:00', 1, 0, 1, '2020-10-27 17:41:13', '2020-10-27 17:41:13'),
(70, 67, 58, 49, 185, 10.00, 20.00, 30.00, 10.00, '2020-10-27 00:00:00', '2020-10-27 00:00:00', 1, 0, 1, '2020-10-27 17:58:13', '2020-10-27 17:58:13'),
(71, 68, 58, 49, 185, 10.00, 20.00, 30.00, 10.00, '2020-10-27 00:00:00', '2020-10-27 00:00:00', 1, 0, 1, '2020-10-27 18:26:14', '2020-10-27 18:26:14'),
(72, 69, 58, 49, 185, 10.00, 20.00, 30.00, 10.00, '2020-10-27 00:00:00', '2020-10-27 00:00:00', 1, 0, 1, '2020-10-27 18:29:26', '2020-10-27 18:29:26'),
(73, 70, 58, 49, 185, 10.00, 20.00, 30.00, 10.00, '2020-10-27 00:00:00', '2020-10-27 00:00:00', 1, 0, 1, '2020-10-27 18:31:32', '2020-10-27 18:31:32'),
(74, 71, 58, 49, 185, 10.00, 20.00, 30.00, 10.00, '2020-10-27 00:00:00', '2020-10-27 00:00:00', 1, 0, 1, '2020-10-27 18:40:32', '2020-10-27 18:40:32'),
(75, 72, 59, 54, 190, 220.00, 33.00, 44.00, 220.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 08:16:09', '2020-10-28 08:16:09'),
(76, 73, 62, 59, 192, 25.00, 88.00, 666.00, 25.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 09:49:38', '2020-10-28 09:49:38'),
(77, 74, 63, 54, 190, 220.00, 33.00, 44.00, 220.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 11:21:35', '2020-10-28 11:21:35'),
(78, 75, 63, 54, 190, 220.00, 33.00, 44.00, 220.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 11:42:56', '2020-10-28 11:42:56'),
(83, 84, 54, 63, 193, 10.00, 100.00, 100.00, 10.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 16:39:37', '2020-10-28 16:39:37'),
(84, 85, 54, 63, 193, 10.00, 100.00, 100.00, 10.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 17:36:02', '2020-10-28 17:36:02'),
(85, 86, 61, 54, 190, 220.00, 33.00, 44.00, 220.00, '2020-10-28 00:00:00', '2020-10-28 00:00:00', 1, 0, 1, '2020-10-28 18:36:59', '2020-10-28 18:36:59'),
(86, 87, 61, 54, 190, 220.00, 33.00, 44.00, 220.00, '2020-10-29 00:00:00', '2020-10-29 00:00:00', 1, 0, 1, '2020-10-29 07:36:35', '2020-10-29 07:36:35'),
(87, 88, 54, 24, 173, 50.00, 0.00, 0.00, 1400.00, '2020-11-02 00:00:00', '2020-11-30 00:00:00', 1, 0, 1, '2020-11-01 09:37:13', '2020-11-01 09:37:13'),
(88, 89, 54, 24, 173, 50.00, 0.00, 0.00, 100.00, '2020-11-02 00:00:00', '2020-11-04 00:00:00', 1, 0, 1, '2020-11-01 09:52:09', '2020-11-01 09:52:09'),
(89, 90, 54, 24, 173, 50.00, 0.00, 0.00, 100.00, '2020-11-02 00:00:00', '2020-11-04 00:00:00', 1, 0, 1, '2020-11-01 10:17:14', '2020-11-01 10:17:14'),
(90, 91, 27, 32, 188, 60.00, 200.00, 500.00, 60.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 11:31:26', '2020-11-01 11:31:26'),
(91, 91, 27, 32, 180, 50.00, 200.00, 1000.00, 50.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 11:35:24', '2020-11-01 11:35:24'),
(92, 92, 54, 24, 173, 50.00, 0.00, 0.00, 50.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 12:37:27', '2020-11-01 12:37:27'),
(93, 93, 54, 24, 173, 50.00, 0.00, 0.00, 50.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 12:53:05', '2020-11-01 12:53:05'),
(94, 94, 54, 24, 173, 50.00, 0.00, 0.00, 50.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 13:13:22', '2020-11-01 13:13:22'),
(95, 95, 54, 24, 173, 50.00, 0.00, 0.00, 650.00, '2020-11-02 00:00:00', '2020-11-15 00:00:00', 1, 0, 1, '2020-11-01 13:34:00', '2020-11-01 13:34:00'),
(96, 96, 62, 59, 192, 25.00, 88.00, 666.00, 25.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 13:54:03', '2020-11-01 13:54:03'),
(97, 97, 54, 24, 173, 50.00, 0.00, 0.00, 50.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 14:03:25', '2020-11-01 14:03:25'),
(98, 98, 62, 59, 192, 25.00, 88.00, 666.00, 25.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 2, '2020-11-01 14:40:07', '2020-11-01 14:40:07'),
(99, 99, 62, 59, 192, 25.00, 88.00, 666.00, 25.00, '2020-11-01 00:00:00', '2020-11-01 00:00:00', 1, 0, 1, '2020-11-01 15:09:58', '2020-11-01 15:09:58'),
(100, 100, 32, 35, 165, 20.00, 30.00, 40.00, 20.00, '2020-11-02 00:00:00', '2020-11-02 00:00:00', 1, 0, 1, '2020-11-01 21:50:25', '2020-11-01 21:50:25'),
(101, 101, 54, 24, 173, 50.00, 0.00, 0.00, 450.00, '2020-11-02 00:00:00', '2020-11-11 00:00:00', 1, 0, 1, '2020-11-02 08:03:10', '2020-11-02 08:03:10'),
(102, 102, 24, 59, 192, 25.00, 88.00, 666.00, 25.00, '2020-11-02 00:00:00', '2020-11-02 00:00:00', 1, 0, 1, '2020-11-02 12:41:38', '2020-11-02 12:41:38'),
(103, 103, 54, 35, 184, 25.00, 0.00, 0.00, 25.00, '2020-11-02 00:00:00', '2020-11-02 00:00:00', 1, 0, 1, '2020-11-02 13:46:44', '2020-11-02 13:46:44'),
(104, 104, 54, 24, 172, 10.00, 0.00, 0.00, 10.00, '2020-11-02 00:00:00', '2020-11-02 00:00:00', 1, 0, 1, '2020-11-02 15:22:22', '2020-11-02 15:22:22'),
(105, 105, 59, 63, 193, 10.00, 100.00, 100.00, 10.00, '2020-11-02 00:00:00', '2020-11-02 00:00:00', 1, 0, 1, '2020-11-02 15:34:26', '2020-11-02 15:34:26'),
(106, 106, 62, 59, 195, 25.00, 55.00, 255.00, 25.00, '2020-11-02 00:00:00', '2020-11-02 00:00:00', 1, 0, 1, '2020-11-02 16:01:49', '2020-11-02 16:01:49'),
(107, 107, 54, 24, 173, 50.00, 0.00, 0.00, 50.00, '2020-11-03 00:00:00', '2020-11-03 00:00:00', 1, 0, 1, '2020-11-03 08:53:48', '2020-11-03 08:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL,
  `owner` tinyint(1) NOT NULL,
  `tenant` tinyint(1) NOT NULL,
  `is_rent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `en_name`, `ar_name`, `owner`, `tenant`, `is_rent`) VALUES
(1, 'Pending', 'قيد الانتظار', 1, 1, 0),
(2, 'Approved', 'تم الموافقة', 1, 1, 1),
(3, 'Request a preview', 'طلب معاينة', 0, 1, 1),
(4, 'Agree to the preview', 'الموافقة على المعاينة', 1, 0, 1),
(5, 'Paid', 'الدفع', 0, 1, 1),
(6, 'Payment received', 'تم استلام الدفع', 1, 0, 1),
(7, 'Delivery', 'التسليم', 0, 1, 1),
(8, 'Received', 'تم الإستلام', 1, 0, 1),
(9, 'Retrieval', 'الأسترجاع', 0, 1, 1),
(10, 'Retrieved', 'تم الإسترجاع', 1, 0, 1),
(11, 'rejected', 'تم الرفض', 1, 0, 0),
(12, 'Cancel Order', 'إلغاء الطلب', 0, 1, 0),
(13, 'Extension request', 'طلب التمديد', 0, 1, 1),
(14, 'Extension approval', 'الموافقة على التمديد', 1, 0, 1),
(15, 'Extension rejected', 'رفض التمديد', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_logs`
--

CREATE TABLE `order_status_logs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status_logs`
--

INSERT INTO `order_status_logs` (`id`, `order_id`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(342, 63, 1, 58, '2020-10-27 14:35:56', '2020-10-27 14:35:56'),
(343, 64, 1, 58, '2020-10-27 15:30:50', '2020-10-27 15:30:50'),
(344, 65, 1, 58, '2020-10-27 16:18:17', '2020-10-27 16:18:17'),
(345, 66, 1, 58, '2020-10-27 17:41:13', '2020-10-27 17:41:13'),
(346, 67, 1, 58, '2020-10-27 17:58:13', '2020-10-27 17:58:13'),
(347, 68, 1, 58, '2020-10-27 18:26:14', '2020-10-27 18:26:14'),
(348, 69, 1, 58, '2020-10-27 18:29:26', '2020-10-27 18:29:26'),
(349, 70, 1, 58, '2020-10-27 18:31:32', '2020-10-27 18:31:32'),
(350, 71, 1, 58, '2020-10-27 18:40:32', '2020-10-27 18:40:32'),
(351, 72, 1, 59, '2020-10-28 08:16:09', '2020-10-28 08:16:09'),
(352, 72, 2, 54, '2020-10-28 08:17:21', '2020-10-28 08:17:21'),
(353, 72, 3, 54, '2020-10-28 08:17:53', '2020-10-28 08:17:53'),
(354, 72, 4, 59, '2020-10-28 08:17:57', '2020-10-28 08:17:57'),
(355, 72, 6, 54, '2020-10-28 08:23:06', '2020-10-28 08:23:06'),
(356, 72, 7, 54, '2020-10-28 08:25:51', '2020-10-28 08:25:51'),
(357, 72, 8, 59, '2020-10-28 08:25:56', '2020-10-28 08:25:56'),
(358, 72, 13, 59, '2020-10-28 08:26:20', '2020-10-28 08:26:20'),
(359, 72, 14, 54, '2020-10-28 08:26:25', '2020-10-28 08:26:25'),
(360, 73, 1, 62, '2020-10-28 09:49:38', '2020-10-28 09:49:38'),
(361, 73, 2, 59, '2020-10-28 09:49:59', '2020-10-28 09:49:59'),
(362, 73, 3, 59, '2020-10-28 09:50:04', '2020-10-28 09:50:04'),
(363, 73, 4, 62, '2020-10-28 09:50:31', '2020-10-28 09:50:31'),
(364, 74, 1, 63, '2020-10-28 11:21:35', '2020-10-28 11:21:35'),
(365, 74, 2, 54, '2020-10-28 11:21:55', '2020-10-28 11:21:55'),
(366, 74, 3, 54, '2020-10-28 11:22:35', '2020-10-28 11:22:35'),
(367, 74, 4, 63, '2020-10-28 11:22:42', '2020-10-28 11:22:42'),
(368, 74, 7, 54, '2020-10-28 11:41:39', '2020-10-28 11:41:39'),
(369, 74, 8, 63, '2020-10-28 11:41:51', '2020-10-28 11:41:51'),
(370, 74, 9, 63, '2020-10-28 11:42:01', '2020-10-28 11:42:01'),
(371, 74, 10, 54, '2020-10-28 11:42:10', '2020-10-28 11:42:10'),
(372, 75, 1, 63, '2020-10-28 11:42:56', '2020-10-28 11:42:56'),
(373, 75, 2, 54, '2020-10-28 11:43:11', '2020-10-28 11:43:11'),
(374, 75, 3, 54, '2020-10-28 11:43:17', '2020-10-28 11:43:17'),
(375, 75, 4, 63, '2020-10-28 11:43:22', '2020-10-28 11:43:22'),
(376, 75, 6, 54, '2020-10-28 11:43:45', '2020-10-28 11:43:45'),
(377, 75, 7, 54, '2020-10-28 11:43:52', '2020-10-28 11:43:52'),
(378, 75, 8, 63, '2020-10-28 11:43:57', '2020-10-28 11:43:57'),
(379, 75, 9, 63, '2020-10-28 11:44:14', '2020-10-28 11:44:14'),
(380, 75, 10, 54, '2020-10-28 11:44:46', '2020-10-28 11:44:46'),
(381, 76, 1, 63, '2020-10-28 11:45:38', '2020-10-28 11:45:38'),
(382, 76, 2, 54, '2020-10-28 11:45:59', '2020-10-28 11:45:59'),
(383, 76, 3, 54, '2020-10-28 11:46:04', '2020-10-28 11:46:04'),
(384, 76, 4, 63, '2020-10-28 11:46:08', '2020-10-28 11:46:08'),
(385, 76, 7, 54, '2020-10-28 11:59:18', '2020-10-28 11:59:18'),
(386, 76, 8, 63, '2020-10-28 11:59:24', '2020-10-28 11:59:24'),
(387, 76, 9, 63, '2020-10-28 11:59:34', '2020-10-28 11:59:34'),
(388, 76, 10, 54, '2020-10-28 12:43:42', '2020-10-28 12:43:42'),
(389, 77, 1, 63, '2020-10-28 15:55:43', '2020-10-28 15:55:43'),
(390, 77, 2, 54, '2020-10-28 16:00:09', '2020-10-28 16:00:09'),
(391, 77, 3, 54, '2020-10-28 16:00:16', '2020-10-28 16:00:16'),
(392, 77, 4, 63, '2020-10-28 16:00:22', '2020-10-28 16:00:22'),
(393, 77, 6, 54, '2020-10-28 16:00:35', '2020-10-28 16:00:35'),
(394, 77, 7, 54, '2020-10-28 16:08:43', '2020-10-28 16:08:43'),
(395, 77, 8, 63, '2020-10-28 16:08:48', '2020-10-28 16:08:48'),
(396, 77, 9, 63, '2020-10-28 16:08:54', '2020-10-28 16:08:54'),
(397, 77, 10, 54, '2020-10-28 16:09:00', '2020-10-28 16:09:00'),
(398, 78, 1, 63, '2020-10-28 16:09:23', '2020-10-28 16:09:23'),
(399, 78, 2, 54, '2020-10-28 16:09:48', '2020-10-28 16:09:48'),
(400, 78, 3, 54, '2020-10-28 16:09:54', '2020-10-28 16:09:54'),
(401, 78, 4, 63, '2020-10-28 16:09:58', '2020-10-28 16:09:58'),
(402, 78, 7, 54, '2020-10-28 16:17:15', '2020-10-28 16:17:15'),
(403, 78, 8, 63, '2020-10-28 16:18:28', '2020-10-28 16:18:28'),
(404, 78, 9, 63, '2020-10-28 16:18:36', '2020-10-28 16:18:36'),
(405, 78, 10, 54, '2020-10-28 16:18:52', '2020-10-28 16:18:52'),
(406, 79, 1, 63, '2020-10-28 16:19:23', '2020-10-28 16:19:23'),
(407, 80, 1, 63, '2020-10-28 16:19:50', '2020-10-28 16:19:50'),
(408, 81, 1, 63, '2020-10-28 16:19:54', '2020-10-28 16:19:54'),
(409, 82, 1, 63, '2020-10-28 16:20:31', '2020-10-28 16:20:31'),
(410, 83, 1, 63, '2020-10-28 16:20:48', '2020-10-28 16:20:48'),
(411, 83, 2, 54, '2020-10-28 16:21:49', '2020-10-28 16:21:49'),
(412, 83, 3, 54, '2020-10-28 16:22:05', '2020-10-28 16:22:05'),
(413, 83, 4, 63, '2020-10-28 16:22:09', '2020-10-28 16:22:09'),
(414, 83, 7, 54, '2020-10-28 16:26:06', '2020-10-28 16:26:06'),
(415, 83, 8, 63, '2020-10-28 16:26:12', '2020-10-28 16:26:12'),
(416, 83, 9, 63, '2020-10-28 16:28:51', '2020-10-28 16:28:51'),
(417, 83, 10, 54, '2020-10-28 16:28:56', '2020-10-28 16:28:56'),
(418, 84, 1, 54, '2020-10-28 16:39:37', '2020-10-28 16:39:37'),
(419, 84, 2, 63, '2020-10-28 16:43:03', '2020-10-28 16:43:03'),
(420, 84, 2, 63, '2020-10-28 16:43:07', '2020-10-28 16:43:07'),
(421, 84, 3, 63, '2020-10-28 16:43:20', '2020-10-28 16:43:20'),
(422, 84, 4, 54, '2020-10-28 16:43:38', '2020-10-28 16:43:38'),
(423, 84, 6, 63, '2020-10-28 16:43:54', '2020-10-28 16:43:54'),
(424, 84, 7, 63, '2020-10-28 16:49:37', '2020-10-28 16:49:37'),
(425, 84, 8, 54, '2020-10-28 17:35:03', '2020-10-28 17:35:03'),
(426, 84, 9, 54, '2020-10-28 17:35:12', '2020-10-28 17:35:12'),
(427, 85, 1, 54, '2020-10-28 17:36:02', '2020-10-28 17:36:02'),
(428, 86, 1, 61, '2020-10-28 18:36:59', '2020-10-28 18:36:59'),
(429, 86, 2, 54, '2020-10-28 18:37:27', '2020-10-28 18:37:27'),
(430, 86, 3, 54, '2020-10-28 18:37:33', '2020-10-28 18:37:33'),
(431, 86, 4, 61, '2020-10-28 18:37:40', '2020-10-28 18:37:40'),
(432, 86, 6, 54, '2020-10-28 18:37:56', '2020-10-28 18:37:56'),
(433, 86, 7, 54, '2020-10-28 18:38:01', '2020-10-28 18:38:01'),
(434, 86, 8, 61, '2020-10-28 18:38:15', '2020-10-28 18:38:15'),
(435, 86, 13, 61, '2020-10-28 18:38:36', '2020-10-28 18:38:36'),
(436, 86, 14, 54, '2020-10-28 18:38:42', '2020-10-28 18:38:42'),
(437, 87, 1, 61, '2020-10-29 07:36:35', '2020-10-29 07:36:35'),
(438, 87, 2, 54, '2020-10-29 07:36:59', '2020-10-29 07:36:59'),
(439, 87, 3, 54, '2020-10-29 07:37:05', '2020-10-29 07:37:05'),
(440, 87, 4, 61, '2020-10-29 07:37:10', '2020-10-29 07:37:10'),
(441, 87, 6, 54, '2020-10-29 07:37:31', '2020-10-29 07:37:31'),
(442, 87, 7, 54, '2020-10-29 07:40:45', '2020-10-29 07:40:45'),
(443, 87, 8, 61, '2020-10-29 07:40:51', '2020-10-29 07:40:51'),
(444, 87, 13, 61, '2020-10-29 07:42:08', '2020-10-29 07:42:08'),
(445, 87, 14, 54, '2020-10-29 07:42:14', '2020-10-29 07:42:14'),
(446, 88, 1, 54, '2020-11-01 09:37:13', '2020-11-01 09:37:13'),
(447, 88, 2, 24, '2020-11-01 09:37:38', '2020-11-01 09:37:38'),
(448, 88, 3, 24, '2020-11-01 09:37:51', '2020-11-01 09:37:51'),
(449, 88, 4, 54, '2020-11-01 09:38:00', '2020-11-01 09:38:00'),
(450, 88, 6, 24, '2020-11-01 09:39:21', '2020-11-01 09:39:21'),
(451, 88, 7, 24, '2020-11-01 09:39:49', '2020-11-01 09:39:49'),
(452, 88, 8, 54, '2020-11-01 09:39:55', '2020-11-01 09:39:55'),
(453, 88, 9, 54, '2020-11-01 09:40:12', '2020-11-01 09:40:12'),
(454, 88, 10, 24, '2020-11-01 09:40:20', '2020-11-01 09:40:20'),
(455, 89, 1, 54, '2020-11-01 09:52:09', '2020-11-01 09:52:09'),
(456, 89, 2, 24, '2020-11-01 09:53:36', '2020-11-01 09:53:36'),
(457, 89, 3, 24, '2020-11-01 09:59:02', '2020-11-01 09:59:02'),
(458, 89, 4, 54, '2020-11-01 09:59:18', '2020-11-01 09:59:18'),
(459, 89, 7, 24, '2020-11-01 09:59:42', '2020-11-01 09:59:42'),
(460, 89, 8, 54, '2020-11-01 09:59:53', '2020-11-01 09:59:53'),
(461, 89, 9, 54, '2020-11-01 10:00:06', '2020-11-01 10:00:06'),
(462, 89, 10, 24, '2020-11-01 10:00:12', '2020-11-01 10:00:12'),
(463, 90, 1, 54, '2020-11-01 10:17:14', '2020-11-01 10:17:14'),
(464, 90, 2, 24, '2020-11-01 10:17:38', '2020-11-01 10:17:38'),
(465, 90, 3, 24, '2020-11-01 10:18:44', '2020-11-01 10:18:44'),
(466, 90, 4, 54, '2020-11-01 10:18:52', '2020-11-01 10:18:52'),
(467, 90, 6, 24, '2020-11-01 10:19:15', '2020-11-01 10:19:15'),
(468, 90, 7, 24, '2020-11-01 10:19:28', '2020-11-01 10:19:28'),
(469, 90, 8, 54, '2020-11-01 10:19:39', '2020-11-01 10:19:39'),
(470, 90, 9, 54, '2020-11-01 10:19:55', '2020-11-01 10:19:55'),
(471, 90, 10, 24, '2020-11-01 10:20:02', '2020-11-01 10:20:02'),
(472, 91, 1, 27, '2020-11-01 11:31:26', '2020-11-01 11:31:26'),
(473, 91, 2, 32, '2020-11-01 11:34:38', '2020-11-01 11:34:38'),
(474, 91, 3, 32, '2020-11-01 11:36:18', '2020-11-01 11:36:18'),
(475, 91, 4, 27, '2020-11-01 11:36:27', '2020-11-01 11:36:27'),
(476, 91, 7, 32, '2020-11-01 11:37:05', '2020-11-01 11:37:05'),
(477, 91, 8, 27, '2020-11-01 11:37:14', '2020-11-01 11:37:14'),
(478, 91, 13, 27, '2020-11-01 11:39:55', '2020-11-01 11:39:55'),
(479, 91, 14, 32, '2020-11-01 11:40:40', '2020-11-01 11:40:40'),
(480, 91, 9, 27, '2020-11-01 11:44:21', '2020-11-01 11:44:21'),
(481, 91, 10, 32, '2020-11-01 11:44:36', '2020-11-01 11:44:36'),
(482, 91, 10, 32, '2020-11-01 11:44:44', '2020-11-01 11:44:44'),
(483, 91, 10, 32, '2020-11-01 11:45:46', '2020-11-01 11:45:46'),
(484, 92, 1, 54, '2020-11-01 12:37:27', '2020-11-01 12:37:27'),
(485, 92, 2, 24, '2020-11-01 12:37:49', '2020-11-01 12:37:49'),
(486, 92, 3, 24, '2020-11-01 12:38:08', '2020-11-01 12:38:08'),
(487, 92, 4, 54, '2020-11-01 12:40:33', '2020-11-01 12:40:33'),
(488, 92, 7, 24, '2020-11-01 12:41:57', '2020-11-01 12:41:57'),
(489, 92, 8, 54, '2020-11-01 12:46:09', '2020-11-01 12:46:09'),
(490, 92, 9, 54, '2020-11-01 12:46:20', '2020-11-01 12:46:20'),
(491, 92, 10, 24, '2020-11-01 12:46:25', '2020-11-01 12:46:25'),
(492, 93, 1, 54, '2020-11-01 12:53:05', '2020-11-01 12:53:05'),
(493, 93, 2, 24, '2020-11-01 12:53:44', '2020-11-01 12:53:44'),
(494, 93, 3, 24, '2020-11-01 12:53:48', '2020-11-01 12:53:48'),
(495, 93, 4, 54, '2020-11-01 12:53:53', '2020-11-01 12:53:53'),
(496, 93, 6, 24, '2020-11-01 12:54:11', '2020-11-01 12:54:11'),
(497, 93, 7, 24, '2020-11-01 12:54:34', '2020-11-01 12:54:34'),
(498, 93, 8, 54, '2020-11-01 12:54:41', '2020-11-01 12:54:41'),
(499, 93, 13, 54, '2020-11-01 12:55:38', '2020-11-01 12:55:38'),
(500, 93, 14, 24, '2020-11-01 12:56:27', '2020-11-01 12:56:27'),
(501, 94, 1, 54, '2020-11-01 13:13:22', '2020-11-01 13:13:22'),
(502, 94, 2, 24, '2020-11-01 13:13:58', '2020-11-01 13:13:58'),
(503, 94, 3, 24, '2020-11-01 13:14:05', '2020-11-01 13:14:05'),
(504, 94, 4, 54, '2020-11-01 13:14:10', '2020-11-01 13:14:10'),
(505, 94, 6, 24, '2020-11-01 13:14:43', '2020-11-01 13:14:43'),
(506, 94, 7, 24, '2020-11-01 13:14:54', '2020-11-01 13:14:54'),
(507, 94, 8, 54, '2020-11-01 13:15:00', '2020-11-01 13:15:00'),
(508, 94, 13, 54, '2020-11-01 13:15:30', '2020-11-01 13:15:30'),
(509, 94, 14, 24, '2020-11-01 13:15:35', '2020-11-01 13:15:35'),
(510, 95, 1, 54, '2020-11-01 13:34:00', '2020-11-01 13:34:00'),
(511, 95, 2, 24, '2020-11-01 13:34:35', '2020-11-01 13:34:35'),
(512, 95, 3, 24, '2020-11-01 13:34:41', '2020-11-01 13:34:41'),
(513, 95, 4, 54, '2020-11-01 13:34:51', '2020-11-01 13:34:51'),
(514, 95, 6, 24, '2020-11-01 13:52:22', '2020-11-01 13:52:22'),
(515, 95, 7, 24, '2020-11-01 13:52:30', '2020-11-01 13:52:30'),
(516, 95, 8, 54, '2020-11-01 13:52:38', '2020-11-01 13:52:38'),
(517, 95, 13, 54, '2020-11-01 13:53:02', '2020-11-01 13:53:02'),
(518, 95, 14, 24, '2020-11-01 13:53:17', '2020-11-01 13:53:17'),
(519, 96, 1, 62, '2020-11-01 13:54:03', '2020-11-01 13:54:03'),
(520, 97, 1, 54, '2020-11-01 14:03:25', '2020-11-01 14:03:25'),
(521, 97, 2, 24, '2020-11-01 14:03:51', '2020-11-01 14:03:51'),
(522, 97, 3, 24, '2020-11-01 14:03:55', '2020-11-01 14:03:55'),
(523, 97, 4, 54, '2020-11-01 14:04:22', '2020-11-01 14:04:22'),
(524, 97, 6, 24, '2020-11-01 14:04:39', '2020-11-01 14:04:39'),
(525, 97, 7, 24, '2020-11-01 14:04:48', '2020-11-01 14:04:48'),
(526, 97, 8, 54, '2020-11-01 14:05:04', '2020-11-01 14:05:04'),
(527, 73, 6, 59, '2020-11-01 14:06:15', '2020-11-01 14:06:15'),
(528, 73, 7, 59, '2020-11-01 14:06:25', '2020-11-01 14:06:25'),
(529, 73, 8, 62, '2020-11-01 14:06:32', '2020-11-01 14:06:32'),
(530, 96, 2, 59, '2020-11-01 14:12:48', '2020-11-01 14:12:48'),
(531, 96, 3, 59, '2020-11-01 14:12:57', '2020-11-01 14:12:57'),
(532, 96, 4, 62, '2020-11-01 14:13:04', '2020-11-01 14:13:04'),
(533, 96, 7, 59, '2020-11-01 14:15:48', '2020-11-01 14:15:48'),
(534, 97, 13, 58, '2020-11-01 14:15:51', '2020-11-01 14:15:51'),
(535, 96, 8, 62, '2020-11-01 14:15:56', '2020-11-01 14:15:56'),
(536, 96, 13, 62, '2020-11-01 14:16:24', '2020-11-01 14:16:24'),
(537, 96, 14, 59, '2020-11-01 14:16:40', '2020-11-01 14:16:40'),
(538, 98, 1, 62, '2020-11-01 14:40:07', '2020-11-01 14:40:07'),
(539, 98, 2, 59, '2020-11-01 14:40:26', '2020-11-01 14:40:26'),
(540, 98, 3, 59, '2020-11-01 14:40:35', '2020-11-01 14:40:35'),
(541, 98, 4, 62, '2020-11-01 14:40:41', '2020-11-01 14:40:41'),
(542, 98, 6, 59, '2020-11-01 14:41:02', '2020-11-01 14:41:02'),
(543, 98, 7, 59, '2020-11-01 14:41:14', '2020-11-01 14:41:14'),
(544, 98, 8, 62, '2020-11-01 14:41:20', '2020-11-01 14:41:20'),
(545, 98, 13, 62, '2020-11-01 14:41:41', '2020-11-01 14:41:41'),
(546, 98, 14, 59, '2020-11-01 14:41:50', '2020-11-01 14:41:50'),
(547, 98, 13, 62, '2020-11-01 14:42:08', '2020-11-01 14:42:08'),
(548, 98, 14, 59, '2020-11-01 14:42:18', '2020-11-01 14:42:18'),
(549, 98, 13, 62, '2020-11-01 14:43:01', '2020-11-01 14:43:01'),
(550, 98, 14, 59, '2020-11-01 14:43:09', '2020-11-01 14:43:09'),
(551, 98, 13, 58, '2020-11-01 14:53:43', '2020-11-01 14:53:43'),
(552, 98, 14, 59, '2020-11-01 14:53:55', '2020-11-01 14:53:55'),
(553, 98, 7, 59, '2020-11-01 14:59:29', '2020-11-01 14:59:29'),
(554, 98, 8, 62, '2020-11-01 14:59:37', '2020-11-01 14:59:37'),
(555, 98, 13, 62, '2020-11-01 14:59:59', '2020-11-01 14:59:59'),
(556, 98, 14, 59, '2020-11-01 15:00:08', '2020-11-01 15:00:08'),
(557, 98, 7, 59, '2020-11-01 15:05:53', '2020-11-01 15:05:53'),
(558, 98, 8, 62, '2020-11-01 15:05:59', '2020-11-01 15:05:59'),
(559, 98, 13, 62, '2020-11-01 15:06:15', '2020-11-01 15:06:15'),
(560, 98, 14, 59, '2020-11-01 15:06:21', '2020-11-01 15:06:21'),
(561, 98, 14, 45, '2020-11-01 15:07:23', '2020-11-01 15:07:23'),
(562, 99, 1, 62, '2020-11-01 15:09:58', '2020-11-01 15:09:58'),
(563, 99, 2, 59, '2020-11-01 15:10:51', '2020-11-01 15:10:51'),
(564, 99, 3, 59, '2020-11-01 15:12:27', '2020-11-01 15:12:27'),
(565, 99, 4, 62, '2020-11-01 15:12:33', '2020-11-01 15:12:33'),
(566, 99, 6, 59, '2020-11-01 15:13:10', '2020-11-01 15:13:10'),
(567, 99, 7, 59, '2020-11-01 16:43:58', '2020-11-01 16:43:58'),
(568, 99, 8, 62, '2020-11-01 16:52:02', '2020-11-01 16:52:02'),
(569, 99, 13, 62, '2020-11-01 16:52:19', '2020-11-01 16:52:19'),
(570, 99, 14, 59, '2020-11-01 16:52:30', '2020-11-01 16:52:30'),
(571, 99, 13, 62, '2020-11-01 17:16:33', '2020-11-01 17:16:33'),
(572, 100, 1, 32, '2020-11-01 21:50:25', '2020-11-01 21:50:25'),
(573, 101, 1, 54, '2020-11-02 08:03:10', '2020-11-02 08:03:10'),
(574, 101, 2, 24, '2020-11-02 11:40:18', '2020-11-02 11:40:18'),
(575, 101, 3, 24, '2020-11-02 11:40:29', '2020-11-02 11:40:29'),
(576, 101, 4, 54, '2020-11-02 11:40:34', '2020-11-02 11:40:34'),
(577, 101, 6, 24, '2020-11-02 11:44:08', '2020-11-02 11:44:08'),
(578, 101, 7, 24, '2020-11-02 11:44:14', '2020-11-02 11:44:14'),
(579, 101, 8, 54, '2020-11-02 11:44:20', '2020-11-02 11:44:20'),
(580, 101, 13, 54, '2020-11-02 12:08:51', '2020-11-02 12:08:51'),
(581, 101, 14, 24, '2020-11-02 12:08:58', '2020-11-02 12:08:58'),
(582, 101, 13, 54, '2020-11-02 12:13:07', '2020-11-02 12:13:07'),
(583, 101, 14, 24, '2020-11-02 12:13:18', '2020-11-02 12:13:18'),
(584, 101, 13, 54, '2020-11-02 12:32:45', '2020-11-02 12:32:45'),
(585, 101, 14, 24, '2020-11-02 12:33:09', '2020-11-02 12:33:09'),
(586, 101, 13, 54, '2020-11-02 12:33:26', '2020-11-02 12:33:26'),
(587, 101, 14, 24, '2020-11-02 12:33:36', '2020-11-02 12:33:36'),
(588, 102, 1, 24, '2020-11-02 12:41:38', '2020-11-02 12:41:38'),
(589, 102, 2, 59, '2020-11-02 12:43:27', '2020-11-02 12:43:27'),
(590, 102, 3, 59, '2020-11-02 12:43:32', '2020-11-02 12:43:32'),
(591, 102, 4, 24, '2020-11-02 12:43:37', '2020-11-02 12:43:37'),
(592, 102, 6, 59, '2020-11-02 12:46:25', '2020-11-02 12:46:25'),
(593, 102, 7, 59, '2020-11-02 12:46:32', '2020-11-02 12:46:32'),
(594, 102, 8, 24, '2020-11-02 12:46:38', '2020-11-02 12:46:38'),
(595, 102, 13, 24, '2020-11-02 12:47:35', '2020-11-02 12:47:35'),
(596, 102, 14, 59, '2020-11-02 12:47:47', '2020-11-02 12:47:47'),
(597, 102, 7, 59, '2020-11-02 12:49:34', '2020-11-02 12:49:34'),
(598, 102, 8, 24, '2020-11-02 13:15:16', '2020-11-02 13:15:16'),
(599, 103, 1, 54, '2020-11-02 13:46:44', '2020-11-02 13:46:44'),
(600, 103, 2, 35, '2020-11-02 13:49:05', '2020-11-02 13:49:05'),
(601, 103, 3, 35, '2020-11-02 13:49:12', '2020-11-02 13:49:12'),
(602, 103, 4, 54, '2020-11-02 13:49:18', '2020-11-02 13:49:18'),
(603, 103, 6, 35, '2020-11-02 13:49:33', '2020-11-02 13:49:33'),
(604, 103, 7, 35, '2020-11-02 13:49:39', '2020-11-02 13:49:39'),
(605, 103, 8, 54, '2020-11-02 13:49:45', '2020-11-02 13:49:45'),
(606, 101, 13, 28, '2020-11-02 14:49:08', '2020-11-02 14:49:08'),
(607, 104, 1, 54, '2020-11-02 15:22:22', '2020-11-02 15:22:22'),
(608, 104, 2, 24, '2020-11-02 15:24:41', '2020-11-02 15:24:41'),
(609, 104, 3, 24, '2020-11-02 15:24:46', '2020-11-02 15:24:46'),
(610, 104, 4, 54, '2020-11-02 15:24:51', '2020-11-02 15:24:51'),
(611, 104, 6, 24, '2020-11-02 15:25:05', '2020-11-02 15:25:05'),
(612, 104, 7, 24, '2020-11-02 15:25:13', '2020-11-02 15:25:13'),
(613, 104, 8, 54, '2020-11-02 15:25:18', '2020-11-02 15:25:18'),
(614, 104, 13, 54, '2020-11-02 15:25:30', '2020-11-02 15:25:30'),
(615, 102, 14, 59, '2020-11-02 15:33:05', '2020-11-02 15:33:05'),
(616, 105, 1, 59, '2020-11-02 15:34:26', '2020-11-02 15:34:26'),
(617, 106, 1, 62, '2020-11-02 16:01:49', '2020-11-02 16:01:49'),
(618, 106, 2, 59, '2020-11-02 16:02:44', '2020-11-02 16:02:44'),
(619, 106, 3, 59, '2020-11-02 16:04:23', '2020-11-02 16:04:23'),
(620, 106, 4, 62, '2020-11-02 16:04:29', '2020-11-02 16:04:29'),
(621, 106, 6, 59, '2020-11-02 16:04:48', '2020-11-02 16:04:48'),
(622, 106, 7, 59, '2020-11-02 16:05:01', '2020-11-02 16:05:01'),
(623, 106, 8, 62, '2020-11-02 16:05:06', '2020-11-02 16:05:06'),
(624, 106, 13, 62, '2020-11-02 16:05:22', '2020-11-02 16:05:22'),
(625, 106, 14, 59, '2020-11-02 16:05:33', '2020-11-02 16:05:33'),
(626, 106, 13, 62, '2020-11-02 16:09:55', '2020-11-02 16:09:55'),
(627, 106, 14, 59, '2020-11-02 16:10:05', '2020-11-02 16:10:05'),
(628, 106, 13, 62, '2020-11-02 16:15:31', '2020-11-02 16:15:31'),
(629, 106, 14, 59, '2020-11-02 16:15:35', '2020-11-02 16:15:35'),
(630, 107, 1, 54, '2020-11-03 08:53:48', '2020-11-03 08:53:48'),
(631, 107, 2, 24, '2020-11-03 08:55:26', '2020-11-03 08:55:26'),
(632, 107, 3, 24, '2020-11-03 08:55:41', '2020-11-03 08:55:41'),
(633, 107, 4, 54, '2020-11-03 08:55:55', '2020-11-03 08:55:55'),
(634, 107, 6, 24, '2020-11-03 08:56:45', '2020-11-03 08:56:45'),
(635, 107, 7, 24, '2020-11-03 08:56:53', '2020-11-03 08:56:53'),
(636, 107, 8, 54, '2020-11-03 08:57:00', '2020-11-03 08:57:00'),
(637, 107, 13, 54, '2020-11-03 08:57:17', '2020-11-03 08:57:17'),
(638, 107, 14, 24, '2020-11-03 08:57:22', '2020-11-03 08:57:22'),
(639, 107, 8, 54, '2020-11-03 08:58:42', '2020-11-03 08:58:42'),
(640, 107, 9, 54, '2020-11-03 08:58:52', '2020-11-03 08:58:52'),
(641, 107, 10, 24, '2020-11-03 08:59:03', '2020-11-03 08:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `en_description` text NOT NULL,
  `ar_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `en_title`, `ar_title`, `en_description`, `ar_description`) VALUES
(1, 'about', 'من نحن', '<p>من نحن</p>', '<p>about</p>'),
(2, 'Terms & Policy', 'الشروط والسياسات', '<p>Terms &amp; Policy</p>', '<p>انا كشروط و احكام برجع من الباك اند</p>\r\n\r\n<p>الشروط والسياسات</p>\r\n\r\n<p>السياسه الاولى</p>\r\n\r\n<p>شسيشسيشسيشسيشسيشسيشسيشسيشسيشسيشسيشسي</p>\r\n\r\n<p>شسييشسيسسسسسسسسسسسسسسسسسسسسسسسسسسس</p>\r\n\r\n<p>السياسه التانيه</p>\r\n\r\n<p>ششششششششششششششششششششششششششششششششششششش</p>\r\n\r\n<p>شششششششششششششششششششششششششششششششششش</p>\r\n\r\n<p>شششششششششششششششششششششششششششششششششششششش</p>\r\n\r\n<p>السياسه التالته</p>\r\n\r\n<p>شششششششششششششششششششششششششششششششششششششششششششش</p>\r\n\r\n<p>ششششششششششششششششششششششششششششششششششششش</p>\r\n\r\n<p>شيسشسيشسيشسيشسيشسيشسشسسسسسسسسسسسسسسسسسسسسس</p>\r\n\r\n<p>ششششششششششششششششششششششششششششششششششششششششششش</p>'),
(3, 'contact', 'اتصل بنا', '<p>contact</p>', '<p>أتصل بنا&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@site.com', '$2y$10$4uB3FaHe0qL9SeUFq8/Qc.3hZHFoJsWUzHslDS3W.mALOUyKjMOsW', '2019-12-10 15:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_logs`
--

INSERT INTO `payment_logs` (`id`, `order_id`, `user_id`, `payment_method`, `amount`, `transaction_id`, `created_at`, `updated_at`) VALUES
(28, 77, 63, 'cash_on_received', 222.20, '', '2020-10-28 16:00:29', '2020-10-28 16:00:29'),
(29, 78, 63, 'visa', 222.20, '8ac7a4a2756ef9fc01756ff9c65b1ecc', '2020-10-28 16:10:50', '2020-10-28 16:10:50'),
(30, 83, 63, 'wallet', 222.20, '', '2020-10-28 16:25:36', '2020-10-28 16:25:36'),
(31, 84, 54, 'cash_on_received', 10.10, '', '2020-10-28 16:43:48', '2020-10-28 16:43:48'),
(32, 86, 61, 'cash_on_received', 222.20, '', '2020-10-28 18:37:48', '2020-10-28 18:37:48'),
(33, 87, 61, 'cash_on_received', 222.20, '', '2020-10-29 07:37:23', '2020-10-29 07:37:23'),
(34, 88, 54, 'cash_on_received', 1414.00, '', '2020-11-01 09:39:00', '2020-11-01 09:39:00'),
(35, 88, 54, 'cash_on_received', 1414.00, '', '2020-11-01 09:39:16', '2020-11-01 09:39:16'),
(36, 89, 54, 'wallet', 101.00, '', '2020-11-01 09:59:31', '2020-11-01 09:59:31'),
(37, 90, 54, 'cash_on_received', 101.00, '', '2020-11-01 10:19:09', '2020-11-01 10:19:09'),
(38, 91, 27, 'wallet', 69.00, '', '2020-11-01 11:36:38', '2020-11-01 11:36:38'),
(39, 92, 54, 'master', 57.50, '8ac7a4a27578dead017583d380e443c3', '2020-11-01 12:41:29', '2020-11-01 12:41:29'),
(40, 93, 54, 'cash_on_received', 57.50, '', '2020-11-01 12:54:06', '2020-11-01 12:54:06'),
(41, 94, 54, 'cash_on_received', 57.50, '', '2020-11-01 13:14:32', '2020-11-01 13:14:32'),
(42, 95, 54, 'cash_on_received', 747.50, '', '2020-11-01 13:36:02', '2020-11-01 13:36:02'),
(43, 97, 54, 'cash_on_received', 57.50, '', '2020-11-01 14:04:31', '2020-11-01 14:04:31'),
(44, 73, 62, 'cash_on_received', 25.25, '', '2020-11-01 14:05:57', '2020-11-01 14:05:57'),
(45, 96, 62, 'visa', 28.75, '8ac7a4a17578db9b017584284241326d', '2020-11-01 14:14:00', '2020-11-01 14:14:00'),
(46, 98, 62, 'cash_on_received', 28.75, '', '2020-11-01 14:40:55', '2020-11-01 14:40:55'),
(47, 98, 62, 'visa', 28.75, '8ac7a49f7578db9b0175844f9cf819db', '2020-11-01 14:57:14', '2020-11-01 14:57:14'),
(48, 98, 62, 'visa', 28.75, '8ac7a4a17578db9b01758453328423e5', '2020-11-01 15:00:55', '2020-11-01 15:00:55'),
(49, 98, 62, 'visa', 28.75, '8ac7a49f7578db9b01758458bc7236f6', '2020-11-01 15:06:55', '2020-11-01 15:06:55'),
(50, 99, 62, 'cash_on_received', 28.75, '', '2020-11-01 15:13:02', '2020-11-01 15:13:02'),
(51, 101, 54, 'cash_on_received', 517.50, '', '2020-11-02 11:43:17', '2020-11-02 11:43:17'),
(52, 102, 24, 'cash_on_received', 28.75, '', '2020-11-02 12:44:20', '2020-11-02 12:44:20'),
(53, 102, 24, 'visa', 28.75, '8ac7a4a1758866e001758900d131181b', '2020-11-02 12:49:04', '2020-11-02 12:49:04'),
(54, 103, 54, 'cash_on_received', 28.75, '', '2020-11-02 13:49:27', '2020-11-02 13:49:27'),
(55, 104, 54, 'cash_on_received', 11.50, '', '2020-11-02 15:25:00', '2020-11-02 15:25:00'),
(56, 106, 62, 'cash_on_received', 28.75, '', '2020-11-02 16:04:40', '2020-11-02 16:04:40'),
(57, 106, 62, 'visa', 57.50, '8ac7a49f758866bf017589b581da2041', '2020-11-02 16:06:23', '2020-11-02 16:06:23'),
(58, 106, 62, 'visa', 57.50, '8ac7a49f758866bf017589b9b7d927fa', '2020-11-02 16:10:59', '2020-11-02 16:10:59'),
(59, 106, 62, 'visa', 57.50, '8ac7a49f758866bf017589bf2c6c315f', '2020-11-02 16:17:02', '2020-11-02 16:17:02'),
(60, 107, 54, 'cash_on_received', 57.50, '', '2020-11-03 08:56:07', '2020-11-03 08:56:07'),
(61, 107, 54, 'visa', 57.50, '8ac7a49f758866bf01758d540e0e48c0', '2020-11-03 08:58:30', '2020-11-03 08:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `en_description` text,
  `ar_description` text,
  `user_id` int(11) NOT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `job_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `delivery_types` json DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `replacement_cost` double DEFAULT NULL,
  `price_per_day` int(11) NOT NULL,
  `price_per_week` int(11) DEFAULT NULL,
  `price_per_month` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `en_title`, `ar_title`, `en_description`, `ar_description`, `user_id`, `categories`, `job_id`, `city_id`, `delivery_types`, `quantity`, `replacement_cost`, `price_per_day`, `price_per_week`, `price_per_month`, `status`, `is_active`, `is_blocked`, `longitude`, `latitude`, `is_deleted`, `created_at`, `updated_at`) VALUES
(163, 'Test order add note. Nxxn', 'Test order add note. Nxxn', 'Testing 😀🤗🤗 yet', 'Testing 😀🤗🤗 yet', 28, '[0,6]', 3, NULL, '[1, 2]', 5, 250, 128, 0, 0, 2, 1, 0, '29.226984567940235', '28.527114941934034', 0, '2020-09-16 08:32:02', '2020-09-17 13:40:46'),
(165, 'عصافير زينة', 'عصافير زينة', 'وصف المنتج', 'وصف المنتج', 35, '[6]', 8, NULL, '[1, 2]', 5, 5, 20, 30, 40, 1, 1, 1, '31.6543454', '31.3214152', 0, '2020-09-16 14:32:12', '2020-11-02 13:46:29'),
(166, 'لوجو', 'لوجو', 'وصف المنتج', 'وصف المنتج', 35, '[3]', 4, NULL, '[1]', 3, 22, 32, 34, 35, 1, 1, 0, '31.6545651', '31.3209432', 0, '2020-09-16 14:49:49', '2020-09-16 14:49:49'),
(167, 'Tegsnsnn', 'Tegsnsnn', 'Bznzznzk', 'Bznzznzk', 28, '[5,6]', 6, NULL, '[1, 2]', 1, NULL, 25, 33, 679, 2, 1, 0, '32.3006541', '30.6144145', 0, '2020-09-16 15:06:50', '2020-09-20 10:59:39'),
(168, 'Rrrrrrr', 'Rrrrrrr', 'Rrrrr the offer letter and resume', 'Rrrrr the offer letter and resume', 35, '[6]', 3, NULL, '[1, 2]', 1, NULL, 22, NULL, NULL, 1, 1, 0, '31.6568299', '31.3233121', 0, '2020-09-20 12:57:17', '2020-09-20 12:57:17'),
(169, 'Tets empty job', 'Tets empty job', 'Bznzn', 'Bznzn', 28, '[6,5]', 6, NULL, '[1, 2]', 1, NULL, 25, 0, 0, 2, 0, 0, '32.294302', '30.6048463', 0, '2020-09-21 16:23:40', '2020-10-22 13:01:06'),
(170, 'سمك زينة', 'سمك زينة', 'سمك زينة نادر', 'سمك زينة نادر', 35, '[15]', 10, NULL, '[1]', 6, NULL, 100, 200, 300, 3, 1, 0, '31.6545428', '31.320965', 0, '2020-09-22 07:29:47', '2020-09-27 11:42:51'),
(171, 'Toys', 'Toys', 'Toys description', 'Toys description', 48, '[15]', 0, NULL, '[1, 2]', 1, 55, 10, 60, NULL, 2, 1, 0, '31.6545453', '31.3209638', 0, '2020-09-22 14:27:18', '2020-09-22 14:27:18'),
(172, 'منتج تست', 'منتج تست', 'وصن منتج', 'وصن منتج', 24, '[3]', 3, NULL, '[1, 2]', 1, NULL, 10, NULL, NULL, 1, 1, 0, '31.6545417', '31.3209596', 0, '2020-09-23 14:22:39', '2020-09-23 14:22:39'),
(173, 'رسومات على احجار', 'رسومات على احجار', 'رسومات على احجار', 'رسومات على احجار', 24, '[3]', 0, NULL, '[1]', 50, NULL, 50, NULL, NULL, 1, 1, 0, '31.6545451', '31.320964', 0, '2020-09-23 14:38:02', '2020-09-24 22:27:01'),
(174, 'لاب توب', 'لاب توب', 'HIV aids patients with his age group of children and he is a', 'HIV aids patients with his age group of children and he is a', 47, '[13]', 0, NULL, '[1]', 1, NULL, 5, 0, 0, 2, 1, 0, '49.604892', '25.3659276', 0, '2020-09-23 22:17:29', '2020-10-08 06:59:08'),
(175, 'درون', 'درون', 'البابا من قبل أن يكون في ٦عونك قراءة فنون مسرحية موسيقى رائعة رائعة من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل', 'البابا من قبل أن يكون في ٦عونك قراءة فنون مسرحية موسيقى رائعة رائعة من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل', 32, '[10]', 0, NULL, '[1, 2]', 1, NULL, 30, NULL, NULL, 4, 1, 0, '49.6014586', '25.3657494', 0, '2020-09-24 07:52:30', '2020-10-12 13:17:03'),
(176, 'منتج جديد', 'منتج جديد', 'الوصف', 'الوصف', 35, '[0,3]', 2, NULL, '[1, 2]', 1, NULL, 100, 0, 200, 2, 1, 0, '31.6545429', '31.3209902', 0, '2020-09-27 09:31:50', '2020-09-29 15:38:24'),
(177, 'Upload product', 'Upload product', 'Test product', 'Test product', 35, '[5,6]', 0, NULL, '[1, 2]', 5, NULL, 120, NULL, NULL, 2, 0, 0, '32.3007661', '30.6145305', 0, '2020-09-27 09:32:21', '2020-09-27 09:45:43'),
(178, 'محل ورد', 'محل ورد', 'الوصف', 'الوصف', 49, '[0,3]', 2, NULL, '[1, 2]', 1, NULL, 100, NULL, 300, 2, 1, 0, '31.6545429', '31.3209912', 0, '2020-09-27 12:42:31', '2020-10-13 11:00:29'),
(179, 'Test delivery types', 'Test delivery types', 'Zhshsj', 'Zhshsj', 35, '[3]', 0, NULL, '[1, 2]', 25, NULL, 50, 25, 1000, 2, 0, 0, '32.3006212', '30.6144933', 0, '2020-09-27 14:14:11', '2020-10-07 16:03:13'),
(180, 'لاب توب', 'لاب توب', 'مسنينين من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون', 'مسنينين من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون', 32, '[5,16]', 0, NULL, '[1]', 1, 3000, 50, 200, 1000, 3, 1, 0, '49.60193758830428', '25.3717774288453', 0, '2020-10-10 16:58:30', '2020-10-12 08:37:03'),
(181, 'Marwa', 'Marwa', 'Description', 'Description', 49, '[16,15]', 11, NULL, '[2]', 5, 500, 10, 20, 30, 1, 1, 0, '31.6545676', '31.3210007', 0, '2020-10-11 08:57:24', '2020-10-11 08:57:24'),
(182, 'منتج تست تست', 'منتج تست تست', 'تست تست تست', 'تست تست تست', 50, '[5]', 2, NULL, '\"\"', 55, 55, 50, 600, 80, 2, 0, 0, '31.65415', '31.3207894', 0, '2020-10-11 09:11:53', '2020-10-18 11:38:26'),
(183, 'عربة ايجار', 'عربة ايجار', 'الوصف', 'الوصف', 50, '[15,16]', 0, NULL, '[1]', 5, 25, 22, 0, 0, 1, 1, 0, '31.65415', '31.3207894', 0, '2020-10-11 09:16:52', '2020-10-21 12:56:43'),
(184, 'City test', 'City test', 'Xbznz', 'Xbznz', 35, '[6,5]', 0, 6, '[1, 2]', 1, NULL, 25, NULL, NULL, 2, 1, 0, '32.300581', '30.614484', 0, '2020-10-12 09:33:25', '2020-10-12 09:33:25'),
(185, 'لوجو', 'لوجو', 'مروة', 'مروة', 49, '[6]', 6, 5, '[1]', 1, NULL, 10, 20, 30, 2, 1, 0, '31.6545675', '31.3210137', 0, '2020-10-13 10:59:54', '2020-10-13 10:59:54'),
(186, 'اسم المنتج', 'اسم المنتج', 'وصف المنتج', 'وصف المنتج', 49, '[3]', 3, 7, '[1]', 5, 2, 10, 20, 30, 1, 1, 1, '31.6545639', '31.321013', 0, '2020-10-13 13:37:39', '2020-11-01 21:49:30'),
(187, 'Test test test', 'Test test test', 'Description', 'Description', 49, '[6]', 4, 8, '[1, 2]', 12, 12, 1, 2, 3, 2, 1, 0, '31.6550687', '31.3203277', 0, '2020-10-18 12:40:41', '2020-10-18 12:40:41'),
(188, 'Then you', 'Then you', 'HTC is the most powerful and a capable player for a generation with the best technology in its world to build on', 'HTC is the most powerful and a capable player for a generation with the best technology in its world to build on', 32, '[3]', 4, 7, '[1]', 1, NULL, 60, 200, 500, 2, 1, 0, '50.0848737', '26.4290886', 0, '2020-10-21 05:55:37', '2020-10-21 06:04:11'),
(189, 'ال في عونك', 'ال في عونك', 'ما فيك و المحدد ع من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون في', 'ما فيك و المحدد ع من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون في عونك من قبل أن يكون في', 32, '[10]', 0, 7, '[1]', 1, NULL, 50, NULL, NULL, 1, 1, 1, '50.0848737', '26.4290886', 0, '2020-10-21 06:17:30', '2020-11-01 21:45:58'),
(190, 'منتج تست تعديل', 'منتج تست تعديل', 'وصف المنتج تعديل', 'وصف المنتج تعديل', 54, '[5,4]', 9, 7, '[1]', 50, 500, 220, 33, 44, 2, 1, 0, '31.6541542', '31.3207944', 0, '2020-10-21 08:57:02', '2020-10-21 12:17:11'),
(191, 'mmmmmmmm', 'mmmmmmmm', 'Thanks again and I hope you have a', 'Thanks again and I hope you have a', 49, '[5]', 0, NULL, '[1, 2]', 1, NULL, 25, 100, 500, 3, 1, 0, '-122.0839664', '37.4217642', 0, '2020-10-25 10:04:43', '2020-10-25 10:04:43'),
(192, 'Tegsvsna', 'Tegsvsna', 'Bsnzznzbzvznzmzmzbzvshjsmshz', 'Bsnzznzbzvznzmzmzbzvshjsmshz', 59, '[6,8]', 0, 7, '[1, 2]', 1, NULL, 25, 88, 666, 2, 0, 0, '32.3006447', '30.6144695', 0, '2020-10-28 09:45:45', '2020-11-02 15:46:33'),
(193, 'Birds', 'Birds', 'Birds of prey to the offer letter and resume for your time and consideration and I will be the first time in', 'Birds of prey to the offer letter and resume for your time and consideration and I will be the first time in', 63, '[6]', 4, 7, '[1]', 5, 5, 10, 100, 100, 1, 1, 0, '31.6545698', '31.3210171', 0, '2020-10-28 16:39:02', '2020-11-02 11:55:26'),
(194, 'دراجة هوائية', 'دراجة هوائية', 'دراجة هوائية للسائق في عونك من قبل أن يكون في عونك من قبل أن يكون في عونك من', 'دراجة هوائية للسائق في عونك من قبل أن يكون في عونك من قبل أن يكون في عونك من', 32, '[13]', 0, 7, '[2, 1]', 1, NULL, 50, 200, 400, 2, 0, 1, '50.074103605002165', '26.470397232011198', 0, '2020-11-01 10:21:52', '2020-11-02 14:12:44'),
(195, 'Ttttttt', 'Ttttttt', 'Bdbbzznsvsjseh', 'Bdbbzznsvsjseh', 59, '[5,6]', 0, 7, '[1, 2]', 22, NULL, 25, 55, 255, 1, 1, 0, '32.2910849', '30.6044207', 0, '2020-11-02 15:52:37', '2020-11-02 15:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_photos`
--

CREATE TABLE `product_photos` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `product_photos`
--

INSERT INTO `product_photos` (`id`, `image`, `product_id`) VALUES
(281, '16002451223116.jpeg', 163),
(282, '16002451237319.jpeg', 163),
(283, '16002451247217.jpeg', 163),
(300, '16002667329339.jpeg', 165),
(301, '16002667328932.jpeg', 165),
(302, '16002667323518.jpeg', 165),
(303, '16002677896301.jpeg', 166),
(304, '16002677895222.jpeg', 166),
(305, '16002677891370.jpeg', 166),
(306, '16002688108190.jpeg', 167),
(307, '16002688113660.jpeg', 167),
(308, '16002688125160.jpeg', 167),
(309, '16006066378740.jpeg', 168),
(310, '16006066373673.jpeg', 168),
(311, '16006066377727.jpeg', 168),
(312, '16007054208140.jpeg', 169),
(313, '16007054209710.jpeg', 169),
(314, '16007054203999.jpeg', 169),
(315, '16007597878434.jpeg', 170),
(316, '16007597874750.jpeg', 170),
(317, '16007597878602.jpeg', 170),
(318, '16007848385682.jpeg', 171),
(319, '16007848381917.jpeg', 171),
(320, '16007848383628.jpeg', 171),
(321, '16008709591458.jpeg', 172),
(322, '16008709596712.jpeg', 172),
(323, '16008709591823.jpeg', 172),
(324, '16008718823148.jpeg', 173),
(325, '16008718826786.jpeg', 173),
(326, '16008718824278.jpeg', 173),
(327, '16008994494896.jpeg', 174),
(328, '16008994503270.jpeg', 174),
(329, '16008994515785.jpeg', 174),
(330, '16009339507209.jpeg', 175),
(331, '16009339517812.jpeg', 175),
(332, '16011991109435.jpeg', 176),
(333, '16011991117138.jpeg', 176),
(334, '16011991111237.jpeg', 176),
(335, '16011991414528.jpeg', 177),
(336, '16011991411181.jpeg', 177),
(337, '16011991427209.jpeg', 177),
(338, '16012105512530.jpeg', 178),
(339, '16012105512550.jpeg', 178),
(340, '16012105511220.jpeg', 178),
(341, '16012160519061.jpeg', 179),
(342, '16012160511059.jpeg', 179),
(343, '16012160521124.jpeg', 179),
(344, '16023491108697.jpeg', 180),
(345, '16023491113680.jpeg', 180),
(346, '16023491113618.jpeg', 180),
(347, '16024066446849.jpeg', 181),
(348, '16024066442422.jpeg', 181),
(349, '16024066455206.jpeg', 181),
(350, '16024075134355.jpeg', 182),
(351, '16024075142532.jpeg', 182),
(352, '16024075143996.jpeg', 182),
(353, '16024078123524.jpeg', 183),
(354, '16024078127351.jpeg', 183),
(355, '16024078124930.jpeg', 183),
(356, '16024952051523.jpeg', 184),
(357, '16024952069906.jpeg', 184),
(358, '16024952065323.jpeg', 184),
(359, '16025867949605.jpeg', 185),
(360, '16025867949366.jpeg', 185),
(361, '16025867944090.jpeg', 185),
(362, '16025962591926.jpeg', 186),
(363, '16025962594830.jpeg', 186),
(364, '16025962599550.jpeg', 186),
(365, '16030248415018.jpeg', 187),
(366, '16030248418323.jpeg', 187),
(367, '16032597375223.jpeg', 188),
(368, '16032597381542.jpeg', 188),
(369, '16032597386756.jpeg', 188),
(370, '16032610509785.jpeg', 189),
(371, '16032610508963.jpeg', 189),
(372, '16032610507700.jpeg', 189),
(373, '16032706224687.jpeg', 190),
(374, '16032706238519.jpeg', 190),
(375, '16032706233105.jpeg', 190),
(376, '16036202834331.jpeg', 191),
(377, '16036202834882.jpeg', 191),
(378, '16036202847927.jpeg', 191),
(379, '16038783451085.jpeg', 192),
(380, '16038783469395.jpeg', 192),
(381, '16038783464053.jpeg', 192),
(382, '16039031426565.jpeg', 193),
(383, '16039031421093.jpeg', 193),
(384, '16039031422689.jpeg', 193),
(385, '16042261122000.jpeg', 194),
(386, '16042261132577.jpeg', 194),
(387, '16042261138514.jpeg', 194),
(388, '16043323577675.jpeg', 195),
(389, '16043323583078.jpeg', 195),
(390, '16043323582882.jpeg', 195);

-- --------------------------------------------------------

--
-- Table structure for table `product_reports`
--

CREATE TABLE `product_reports` (
  `id` int(11) NOT NULL,
  `report_status_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `product_reports`
--

INSERT INTO `product_reports` (`id`, `report_status_id`, `product_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(18, 3, 163, 35, 'Gggggggg the offer letter and resume for your time and consideration and I will be the first time', '2020-09-17 12:56:19', '2020-09-17 12:56:19'),
(19, 4, 163, 35, 'Bibjvjv hvhv h gvgc h gvgvg', '2020-09-17 12:59:44', '2020-09-17 12:59:44'),
(20, 1, 163, 35, 'اخر ريبورت', '2020-09-17 13:20:32', '2020-09-17 13:20:32'),
(21, 4, 163, 35, 'عشوائى', '2020-09-17 13:21:41', '2020-09-17 13:21:41'),
(22, 4, 166, 35, 'Test', '2020-09-17 13:40:30', '2020-09-17 13:40:30'),
(23, 1, 166, 35, 'Test9', '2020-09-17 13:41:29', '2020-09-17 13:41:29'),
(24, 4, 167, 35, 'عشوائى', '2020-09-17 14:35:31', '2020-09-17 14:35:31'),
(25, 3, 167, 28, 'mmmm', '2020-09-20 08:48:18', '2020-09-20 08:48:18'),
(26, 1, 167, 35, 'كراهية', '2020-09-20 14:42:44', '2020-09-20 14:42:44'),
(27, 2, 167, 35, 'عشوائى', '2020-09-20 14:43:01', '2020-09-20 14:43:01'),
(28, 3, 167, 35, 'غير اخلاقى', '2020-09-20 14:43:17', '2020-09-20 14:43:17'),
(29, 4, 167, 35, 'مكرر', '2020-09-20 14:43:34', '2020-09-20 14:43:34'),
(30, 5, 167, 35, 'اخرى', '2020-09-20 14:43:52', '2020-09-20 14:43:52'),
(31, 2, 193, 59, 'Hhh', '2020-11-01 16:45:10', '2020-11-01 16:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `model` enum('product','user') NOT NULL,
  `model_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `report_status`
--

CREATE TABLE `report_status` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `report_status`
--

INSERT INTO `report_status` (`id`, `en_name`, `ar_name`) VALUES
(1, 'Hatred', 'كراهية'),
(2, 'Random', 'عشوائي'),
(3, 'Unethical', 'غير أخلاقي'),
(4, 'Duplicate', 'مكرر'),
(5, 'Other', 'أخرى');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard`) VALUES
(1, 'super_admin', 'admin'),
(2, 'admin', 'admin'),
(3, 'user', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `share_list`
--

CREATE TABLE `share_list` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share_list`
--

INSERT INTO `share_list` (`id`, `product_id`, `user_id`) VALUES
(17, 91, 23),
(21, 100, 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `en_name`, `ar_name`) VALUES
(1, 'new', 'جديد'),
(2, 'excellent', 'ممتاز'),
(3, 'very good', 'جيد جدا'),
(4, 'good', 'جيد'),
(5, 'Never mind', 'لابأس');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_orders`
--

CREATE TABLE `submitted_orders` (
  `id` int(11) NOT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `user_id` int(11) NOT NULL,
  `en_description` text,
  `ar_description` text,
  `images` json DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `price_from` double DEFAULT NULL,
  `price_to` double DEFAULT NULL,
  `date_from` timestamp NULL DEFAULT NULL,
  `date_to` timestamp NULL DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `delivery_types` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `submitted_orders`
--

INSERT INTO `submitted_orders` (`id`, `en_title`, `ar_title`, `categories`, `user_id`, `en_description`, `ar_description`, `images`, `job_id`, `price_from`, `price_to`, `date_from`, `date_to`, `longitude`, `latitude`, `city_id`, `delivery_types`, `created_at`, `updated_at`) VALUES
(47, 'لابتوب', 'لابتوب', NULL, 32, 'لاب توب قبل نظيف يكون', 'لاب توب قبل نظيف يكون', NULL, NULL, NULL, NULL, '2020-11-01 00:00:00', '2020-11-01 00:00:00', NULL, NULL, NULL, NULL, '2020-11-01 10:24:33', '2020-11-01 10:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `status` enum('activated','deactivated','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activated',
  `cash_back_percentage` float(8,2) DEFAULT NULL,
  `tax_percentage` float(8,2) DEFAULT NULL,
  `application_percentage` float(8,2) NOT NULL DEFAULT '0.00',
  `android_token` text COLLATE utf8mb4_unicode_ci,
  `verification_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_online` int(11) DEFAULT '0',
  `is_documented` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `username`, `phone`, `longitude`, `city_id`, `latitude`, `avatar`, `email_verified`, `email_verified_at`, `password`, `remember_token`, `role_id`, `status`, `cash_back_percentage`, `tax_percentage`, `application_percentage`, `android_token`, `verification_code`, `is_online`, `is_documented`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@site.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$eR1MvSS68ZAx00qUwiKyZu5vu4PUiTJvGz7un5ffJhnwEqlTWeYhu', '5olLjzdYrlkGfwkB9RdVzBwLvjBZ7x0xZvcS0e1iUO3XaiLPoLRTihEFROrE', 1, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2019-12-08 21:42:41', '2019-12-08 21:42:41'),
(3, 'test', NULL, 'user@site.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$r/zbhXX6GvrbyfSHYl4gy.N6pAJSfxOs8xB9UakCy8u4HfCWB5crq', NULL, 3, 'deactivated', 0.00, 0.00, 0.00, 'cdb7hkiHjVE:APA91bFBKUJv3u3fswxC8WIgiKiGwzXDR3hbKNjSNb4gU0J0Rw5E4UP_pFZ3CRWju3MkjMXSXlswGG0R4pzCahgTBT8itz7YNvbW7SnOreOX_68DdUft18hQAeVM8KeTcQU6bl5DYm3a', NULL, 0, 0, '2019-12-09 17:07:51', '2020-10-27 12:36:28'),
(4, 'test2', NULL, 'user2@site.com', 'test2', '12345678', NULL, NULL, NULL, '15927389184320.png', 1, NULL, '$2y$10$.wh/.UUULylNg8bfUBoyCOmYjDzAnCzkP4vTJBUNkJENAx9IJxg0W', NULL, 3, 'deactivated', 0.00, 0.00, 0.00, '212121', '4809', 0, 0, '2019-12-09 17:07:51', '2020-10-27 12:37:19'),
(5, 'nam', NULL, 'Sh@sh.com', 'Shawky', '01212002456', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$SGmL1g3.oHffvR9VQnyHAuFaDQR/dCpy494n2XjRbAXWVkJfrnohe', NULL, 3, 'blocked', NULL, NULL, 0.00, 'c6fU1j4HCy0:APA91bESbujkGeV5H9A304wC_y8MOdeNOrHd5-4udGc1acdMkaBShIpffXFcXBG4zkpqYQVf-utC59Dk_MUtTcJyokEvxrY1tCqpR95jZ09RY-I_WVBORThqxGl2tyyvVS5DsUyR7y81', NULL, 0, 0, '2020-01-26 20:35:47', '2020-10-27 16:52:02'),
(6, 'Shawhh', NULL, 'S@s.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$eRUHnetgnK7eoWm/93WVaeOYsJVl9TE9awkEWExzRWKoiSiVkCeMu', NULL, 3, 'activated', NULL, NULL, 0.00, 'dn56KyDJnGc:APA91bGCoa5KI5kLkfThOr4tmocSK9Xy7Pqkiaq8EajJv_B3B9Pm2iIDcuhWvz8IOieYG89aneUkdXYoSmARdyVUtgDLELSHBFTCgaABZh5tmk89RjHLmDCSySmg4fp1FNzY7sPRV8jU', NULL, 0, 0, '2020-01-26 20:41:34', '2020-08-27 15:57:57'),
(7, 'Shawkyfudex', NULL, 'Ss@s.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$SGmL1g3.oHffvR9VQnyHAuFaDQR/dCpy494n2XjRbAXWVkJfrnohe', NULL, 3, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-01-26 20:55:24', '2020-01-26 20:55:24'),
(8, 'test8', NULL, 'test8@email.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$YJ7qlQGuFRX1Fv16.uxKwex646.Sj4slDqEme79trOP53mYp5qE22', NULL, 3, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-01-26 21:07:56', '2020-01-26 21:07:56'),
(9, 'Osama', NULL, 'Os@os.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$Hql30rbHZhGUFo.htlO/du47kjy7USyUUxUfkivIEKNVjqch9Grty', NULL, 3, 'activated', 15.00, NULL, 0.00, NULL, NULL, 0, 0, '2020-01-28 21:18:28', '2020-10-13 14:37:36'),
(10, 'osama', NULL, 'oo@oo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$8KMiBdgekDmUryElVcarSusvkFH8OlxOtm7J701yBkGvvAa6q/3LO', NULL, 3, 'activated', 5.00, NULL, 0.00, NULL, NULL, 0, 0, '2020-02-23 20:26:21', '2020-07-22 14:29:02'),
(11, 'Test22', NULL, 'Test22@test.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$Q1HbRDV3w0PWSi5X5qK39eERMTl.0k/4TE4itcQKWHrjb2.fvxbX2', NULL, 3, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-02-25 21:08:09', '2020-02-25 21:08:09'),
(12, 'Mohamed', NULL, 'Moh@moh.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$xCqHucRV.bq.RPTEl1EzRONMQQIIMUIMtJpsVVdOjh5J36VdFeDCy', NULL, 3, 'activated', 5.00, NULL, 0.00, NULL, NULL, 0, 0, '2020-03-02 13:49:28', '2020-07-22 14:29:21'),
(13, 'mohamed', NULL, 'm@m.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$opZ4pSTvu13.1K4yTKZWGe390USn7HRmgkZDA5rrFM.tROXh53aTS', NULL, 2, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-03-22 15:37:37', '2020-03-22 15:37:37'),
(14, 'Mohamed', NULL, 'mohamed@mohamed.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$TIcPLEeUJAm3UN.cm/ApI.fUuZkU/uNhNg4lSayJLP0J1TzSqAA6G', NULL, 2, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-04-01 12:49:32', '2020-04-01 12:49:32'),
(15, 'Hstem mohsen', NULL, 'hh@hh.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$VBTSRQokjgGvCV1hyjD1z.nK/QQ/FsswfXLJYWOr2A3azXnp7hl02', NULL, 2, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-04-30 10:17:41', '2020-04-30 10:17:41'),
(16, 'Hatem mohsen 2', NULL, 'hh2@hh.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$jZ4ol7UhyL.7dAdxTjotrOgsPBjGD0Wuas98hEm4dA1/klk.tLHkK', NULL, 3, 'activated', NULL, NULL, 0.00, 'cfipwkHdVAM:APA91bENw1ILksORopEQ-BP48gBAVeNvyyndWanigH-q92zSrvVgefjCH0YVdxucS-7_WSVqAPAvWTuxfDs8HHiVEFIMNRZ0cR803dO1PoxIlPb73NsoAAKCA5ku_bWUIY7DMKpq9IQf', NULL, 0, 0, '2020-04-30 16:17:39', '2020-06-18 17:09:23'),
(17, 'Hatem', NULL, 'hmm@hmm.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$BUhklknPhRR6xFy70Bcze.IZNoKC7CdgHynKidMYPDLB8sZyLfTsG', NULL, 3, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-05-03 17:24:07', '2020-05-03 17:24:07'),
(18, 'Jdjrjd', NULL, 'Kk@kk.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$cmvgz/adhoyhl7c50Qb3FuUDFy4I2jOgMdOCDsVbDE1rdReAn0wOq', NULL, 2, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-05-04 06:23:18', '2020-05-04 06:23:18'),
(20, 'test4', NULL, 'test4@site.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$2nQ98eUcMe7zaNmDw5oEueKMifz7/nLxMYFIC6UsqocFTIw3FYAUS', NULL, 3, 'activated', NULL, NULL, 0.00, NULL, NULL, 0, 0, '2020-05-05 12:06:27', '2020-05-05 12:06:27'),
(21, 'Malahmed', 'alahmed', 'Mohxxdmedic1@hh.com', 'Malahmed', '563114446', NULL, NULL, NULL, '15931167051421.jpeg', 1, NULL, '$2y$10$RmDN2tVoeFZ1v/i8qY0k/.q2YhMEebIJ5n5yRMzYNWkQpPSEI7Ise', NULL, 3, 'activated', 10.00, NULL, 0.00, 'eVhuXXgzVVM:APA91bGe1pUP621DgPKafcwE2bsaVkOrSt4b-vj_1498p0TiuEmZlcrc695B_tstnlQx5pYBHvlLiR-seV_zkU5KZKsOXQ91q-L5W_o2Jks_6lD4t3h0H2aOBBxI4q6M1frn-ppuJfUX', NULL, 0, 0, '2020-05-10 11:58:09', '2020-07-16 11:21:18'),
(22, 'Mghaflli', NULL, 'Malakalghafli@live.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$O2Dl8yn5.T3FUVMKRMQCwOA.YrS964pYQiMzBXgbH5h2.tjQDYXfm', NULL, 3, 'activated', 100.00, NULL, 0.00, 'el8VVFSS_cY:APA91bHLRIfHL26nSUyDKoUsYy4kErfCmsIXOMFxZCt6ao4ddlKI62Yq4RtqXdlWLUrf8j35rhPMMt0mFX1UkC1h88m1vAZ3dfJNLsHIeXngpHaIsyki0QzsiQEcraCv8Ay78q5KgetT', NULL, 0, 0, '2020-06-11 18:07:55', '2020-06-29 17:14:12'),
(23, 'Reham', NULL, 'reham.khairy@fudex.com.sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$CxkrphJP207ELKLKvJo9mOZc2O61RffXV3NyP3h8jEvH5K/SfdPsG', NULL, 3, 'activated', NULL, NULL, 0.00, 'c4iruyE8x40:APA91bGUMknftC7vB7k2-TzCUHwpTxwf5UYn4QnV5-tY16rKPiAyZmzLtKoXYFbx4-zlspaAeL6THh0Jb3LjODGE2xi7gBqif-UIBCuwdEzBkGBuyB9ldYl2ktXLTAhuRczCv_YwdDHu', NULL, 0, 0, '2020-06-15 07:24:17', '2020-06-15 07:24:17'),
(24, 'مروة مستاجر', 'مستاجر', 'marwa.atia.elbelasy@gmail.com', 'مروة', '222222222', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$F8PIybc8AijWbaik8rSdOObhkf0pF1kwDcCh7o8mDc5PcqW9PtME2', NULL, 3, 'activated', NULL, NULL, 0.00, 'dZDWpwFtXMg:APA91bGch_2wOfSIVIKSObyl6WWDp4ZbWF3jXKA6Xv2v5M9Omi7lGK4-_9EtRZ2FzZB-3uwg-pek0G-tsPjXcypPiSJ-GUtA9QZiv7DQ0zhCVDY3xXKew3vLR-q1Z-DSqS75dnf1QxPt', NULL, 0, 0, '2020-06-15 07:26:00', '2020-11-03 07:49:06'),
(25, 'ريهام', NULL, 'Rr@rr.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$O.3bewhqT963R7j.KguA7eUmQVQY3wuzEhbO.SJcxyaKOs89MFvDe', NULL, 3, 'activated', NULL, NULL, 0.00, 'f84IsxDFobQ:APA91bFTwgZXul3blkHi_AWxyUPUfBi4ZrNfx3A0BWIs_H6Qz-s16H14i9xKxU7IwfSysbP2f78ZpbKTsu5b9UXwVpqxSm9F7On8c59qZKYBwB9WM8nhLt59W9StP2lY2BprvfJS65_v', NULL, 0, 0, '2020-06-17 10:00:24', '2020-06-17 10:00:24'),
(26, 'osama', NULL, 'usoo2002@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$1OCGQEPFhuYixRNLZd4f2O1bpW6jzG74GAvYV17kw264CxLsFJYZe', NULL, 3, 'activated', NULL, NULL, 0.00, 'dmGfeBOU2Q4:APA91bHSL2Q7BmVrV6MhbLqIiiiXxTyeD0z5ZohU_ei8tGjI1uiZIU-RnYkGEICF_kduJVXWJ5Z3Pzb-yEsPLiOxlHvBRwXxbaU32FQa8kl84EOIfoAgpZ8e-3REYGJnE3Tnnm2pGsB-', NULL, 0, 0, '2020-06-22 08:42:13', '2020-07-08 13:35:49'),
(27, 'Ejarly', NULL, 'Ejarly.app@h.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$N/CdRjE6B.qLCtNG1gj68.Iyg9YXUkRNkNqJcJTDRxr5eOeTNRiL2', NULL, 3, 'activated', 1.00, NULL, 0.00, 'ds6WBiArB3A:APA91bEv_KJu4UBG0_adfoSIbKgovay-N29PEwcpmhj39GPdOX6sW3dxUmw0DO9D9ys6KvWcoYFldIxirM603eOW_zgHSrwQln5dLqbDe0d-kZkwronU5NDqW6SNM7MWYfLLdhrbTrNI', NULL, 0, 0, '2020-07-06 17:29:18', '2020-11-01 11:29:04'),
(28, 'محمد ugd', 'شوقي ali', 'Shawky@s.com', 'ممممحمدjsggggffghh', '0121220245', NULL, NULL, NULL, '16005932569563.jpeg', 1, NULL, '$2y$10$kFf.oWBUOjK9w3U9EgdeMOsEhGcob2wuwuaesjllYtBs0ag8SdC0S', NULL, 3, 'activated', NULL, NULL, 0.00, 'diPclbJkT7s:APA91bGKd9LEE9ohhTLseUjMIAjhcc_XV1qx5ivOGN4ACS5cTMJmfcaeM_C9e73BXshxD5jcpcepLtIEylVQIhJISisQ7TSAQGylp-dyvxN-3bo6bCivtsZ6v3pvfDimbKGTyx5161wS', '2840', 0, 0, '2020-07-08 12:30:58', '2020-10-27 16:08:11'),
(29, 'osama3', NULL, 'oa79701@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$IRGx9tFty/5CMxBgjRj/XurixK9IKn4eT9va0w6vGky9TXxPk8gHW', NULL, 3, 'activated', NULL, NULL, 0.00, 'dmGfeBOU2Q4:APA91bHSL2Q7BmVrV6MhbLqIiiiXxTyeD0z5ZohU_ei8tGjI1uiZIU-RnYkGEICF_kduJVXWJ5Z3Pzb-yEsPLiOxlHvBRwXxbaU32FQa8kl84EOIfoAgpZ8e-3REYGJnE3Tnnm2pGsB-', NULL, 0, 0, '2020-07-08 13:33:20', '2020-07-08 13:33:20'),
(30, 'owner1', 'Thanks', 'owner1@o.com', 'owner1 Mohammed', '01212002755', NULL, NULL, NULL, '15947446548119.jpeg', 1, NULL, '$2y$10$CKhzHPMIBUwfxEUyBS9lpOND0cTTypvFsox26fus40ENxixN69cIa', NULL, 3, 'activated', NULL, NULL, 0.00, 'eWJKOZ5O93A:APA91bEN38P1Czknvu-aycqz9VA5BuW6QlpCWafbdjH6-JLp-C0tMGhTWxc-ayXVQE28-lMnEcv1x1fQPAddsk7TJPTMaTpikxSNxdrAwqlfduX3gBn1kOEcJeUk_knReM5c5hlyecTQ', NULL, 0, 0, '2020-07-11 22:00:04', '2020-07-21 13:09:41'),
(31, 'rent1', NULL, 'rent1@o.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$GVVl07P2fvSvHRvzKxjz8ORoIMwkQR6cDXewsy1JEZ8LtdxRzpsfi', NULL, 3, 'activated', NULL, NULL, 0.00, 'eWJKOZ5O93A:APA91bEN38P1Czknvu-aycqz9VA5BuW6QlpCWafbdjH6-JLp-C0tMGhTWxc-ayXVQE28-lMnEcv1x1fQPAddsk7TJPTMaTpikxSNxdrAwqlfduX3gBn1kOEcJeUk_knReM5c5hlyecTQ', NULL, 0, 0, '2020-07-11 22:06:23', '2020-07-14 13:47:18'),
(32, 'Mohammed', 'alahmed', 'Mohdmedic1@gmail.com', 'Mohammed alahmed', '0000000000', NULL, NULL, NULL, '16025105227621.jpeg', 1, NULL, '$2y$10$uBTG34cXsxP9QKI1we1tO.w3s5LlhHsbQ0ck88ra9MITEm3w80RhK', NULL, 3, 'activated', NULL, NULL, 0.00, 'eWg_xHJH1bQ:APA91bHyTQb96jF4bvSQM0nA5xd6F9TnKDqLXqX6DraQNyAY2RUEU4vWBnyt2gen8Xe2zTDdi7NOoAg_YDsp187XosQzGn0xjQXY-xEI79mafrnFkdI-A5OF9Omf4KsMOHNMWFJcXuy0', NULL, 0, 0, '2020-07-16 11:23:46', '2020-11-01 21:48:36'),
(33, 'Ejarly', NULL, 'Ejarly.app@kygyvb.com', 'Ejarly', '000000000', NULL, NULL, NULL, '16042248554126.jpeg', 1, NULL, '$2y$10$H6DgfDcyJDxcWijoSeOQAOs8kD9tTRJ7Kb215xx6gC5Grk5V3FAXu', NULL, 3, 'activated', 1.00, NULL, 0.00, 'ds6WBiArB3A:APA91bEv_KJu4UBG0_adfoSIbKgovay-N29PEwcpmhj39GPdOX6sW3dxUmw0DO9D9ys6KvWcoYFldIxirM603eOW_zgHSrwQln5dLqbDe0d-kZkwronU5NDqW6SNM7MWYfLLdhrbTrNI', NULL, 0, 0, '2020-07-16 11:24:58', '2020-11-01 10:00:56'),
(34, 'mohamred', NULL, 'mm@mm.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$j78tU3.ToDfnyyk/hKBjO.c2TsYnX2nVoKcE3KDWhJY7LcTWECUzS', NULL, 3, 'activated', NULL, NULL, 0.00, 'fZXsDUDaiw0:APA91bEoOQUfhYwCVrcO7h8996nTHul7hpHBWoaCNrzSI-u-Ljxid5RZxloB6hSrlGHRE8yc0-Fwp30GYdkOXOGkB8W9scKD3rsYi96apNT7UD5wYUDXPzF5AUc9-jUeT9ekVqwf7TQy', NULL, 0, 0, '2020-08-30 08:29:21', '2020-08-30 08:29:21'),
(35, 'Marwa 1', 'Product o', 'marwa.a@fudex.com.sa', 'Marwa fudex', '666666666', NULL, NULL, NULL, '16005927601591.jpeg', 1, NULL, '$2y$10$QfHvyqp/zrW2tWsgvB.kweW1nMcZVAvJUQg5AkbLNo1Otl1Lg/puK', NULL, 3, 'activated', NULL, NULL, 0.00, 'd92GATcxOK4:APA91bHRLWLTCEbXv7KGpp2e-ieEbQPq7cehkzsJCujvg5j0xQ00K_nD2QL4OgapThBpdU5XEA5H_9BIQVwnon-62dSTX8M-nURbB2-Cx2d-XUSac8q2pMgeWK_FXydJjodkrOCG-nYU', '', 0, 0, '2020-08-30 08:36:10', '2020-11-02 13:29:51'),
(36, 'Meroo', NULL, 'eng_meroocs@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$eKb0nSuXwnHwStTuBFWFW.PNip0sG8y1Wq.xu4bdZVvZRlDljpdqu', NULL, 3, 'activated', NULL, NULL, 0.00, 'cRLrWdHyAfE:APA91bEk_bz8QM5dJ9tyD8ZA3xGX_lnRE-qSpMxVJIa-uTqA-aAVqsKw_TgfXd2SYgCMbT8Slb3ql2KrITUuOyNnoVrd0BiNMXMwcyKCr2MULH22JxbMCpzBKlnmr5pHPA3VKOQOL_hw', NULL, 0, 2, '2020-09-06 11:46:45', '2020-09-15 09:56:11'),
(37, 'فارس', 'مستاجرر', 'fares@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$4NjhlmnmOD4ZsuLNt1Q.Xe3JHdeL/g7RQ0n6dcmqWR0OQdb/y4NzG', NULL, 3, 'activated', NULL, NULL, 0.00, 'dIDEwMJF4E0:APA91bHckWYu6w6CllRnnW5Kp6fskahUXyolehnf9PMTEex4TDO4UeeBp4yU1MRNt2kDUqH6jlqxSOx9AEq_Fb5M7t2lIMmWymRZVxNqfA7rW0SbF9Qsg3jc9fzjTjWLi-0qV2IqFWOw', NULL, 0, 0, '2020-09-07 15:57:50', '2020-09-07 15:57:50'),
(38, 'Hamasa', NULL, 'H@h.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$ru9XTcYn.8ciV4HEu2sHSewydYgOgZ/EfQFjBeUPBuEz8QU0Kb1ge', NULL, 3, 'activated', NULL, NULL, 0.00, 'fB2c7x-sNps:APA91bGH_mC8-U47vCj2jxJymugIx3FHsgBwWi5Fp0FGUmBWzBTcfBo3n9GBQJyS1jumhD1VSkG4nyqIN0fT57pDFEXu29l0h2fQZIihqzYicaT6u9clHprYx0ZtKeaPsJrJ2iQi9Qyh', NULL, 0, 0, '2020-09-15 09:28:54', '2020-09-15 10:35:37'),
(39, 'Marwa', NULL, 'marwa.elbelasy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$62UHzWP42ZFd/uEpazp9g.30fhHU80nArhhXnbBGDZ2Bthbz4XbV6', NULL, 3, 'activated', NULL, NULL, 0.00, 'fKz8WH8Itu0:APA91bGHBwy3C1nle7U_nwDJlKdLtIHnxnYSYGN_EPWNLuDr5cKiAFHXzMS7CrrVkObS7ThZYxM1I5RkIEEpTyc-DdOLh0ABfw6Xqq57rLeB1_dzg0PpPxuNec0cary_gIbE9IV4urw5', NULL, 0, 0, '2020-09-15 09:34:04', '2020-09-15 09:34:04'),
(40, 'Hamajsbs', NULL, 'A@a.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$wGR4HqZGJ8KbkaOoaEDiL.//Uu4VAzYPe4KU2fg.qpXd3SXSzhfxa', NULL, 3, 'activated', NULL, NULL, 0.00, 'fYigDmEimQE:APA91bEvwe2RSqFXZVN7h6NBpiaGfV1oNU5iFNAnCr-RInsw9eI6byIhOummzkVPl4IoKpXfin3EqjAUEp9UHuOivc17keBp4cJLEP4dJTmyoz7GKmu88rtdqPGGI2EoPVilBfaFZhEP', NULL, 0, 0, '2020-09-15 09:56:59', '2020-09-15 09:56:59'),
(41, 'Marwa', NULL, 'W@w.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$rQBHgvs.qvA0zPHBKn1M5OIm03sBPJsExdPiO1dggwnouYEjfQgJ.', NULL, 3, 'activated', NULL, NULL, 0.00, 'cRLrWdHyAfE:APA91bEk_bz8QM5dJ9tyD8ZA3xGX_lnRE-qSpMxVJIa-uTqA-aAVqsKw_TgfXd2SYgCMbT8Slb3ql2KrITUuOyNnoVrd0BiNMXMwcyKCr2MULH22JxbMCpzBKlnmr5pHPA3VKOQOL_hw', NULL, 0, 0, '2020-09-15 10:03:45', '2020-09-15 10:03:45'),
(42, 'Marwa', NULL, 'D@d.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$8YffIJOO5VQEsznbdIj0BetKFlu9INlWJDqeclcYB5KPw165KGp8y', NULL, 3, 'activated', NULL, NULL, 0.00, 'etuvARecYoI:APA91bFv8KaqSwZ5vmu8I8AMz_sqEhM0_l1rgtizhJzWrM6xPsmWnP17mo4mJ15I2DFZ0QEjQHmNHPVvuVkzgGQSkDYs5Pr5AK5X_5jZbRQWdn1dx5CZHHIZXJnXcd_hqxd3ZN6F6285', NULL, 0, 0, '2020-09-15 10:07:02', '2020-09-15 10:07:02'),
(43, 'Meroo', NULL, 'matwa@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$eHtmk3W7gczk/qlq.GRqkOqy8qKCwDvdYDBqlbgsbtsT/3/lHFMqO', NULL, 3, 'activated', NULL, NULL, 0.00, 'd92GATcxOK4:APA91bHRLWLTCEbXv7KGpp2e-ieEbQPq7cehkzsJCujvg5j0xQ00K_nD2QL4OgapThBpdU5XEA5H_9BIQVwnon-62dSTX8M-nURbB2-Cx2d-XUSac8q2pMgeWK_FXydJjodkrOCG-nYU', '6812', 0, 0, '2020-09-20 14:06:24', '2020-11-02 13:58:03'),
(44, 'Meroo renter', 'Last', 'renter@yahoo.com', 'Meroo renter', '01212005588', NULL, NULL, NULL, '16007594262272.jpeg', 1, NULL, '$2y$10$am0w4pl.4SLyiOmeBDI9uezxpoxOGAONBm0H9AhmRF6KFe99xqi5m', NULL, 3, 'activated', NULL, NULL, 0.00, 'diPclbJkT7s:APA91bGKd9LEE9ohhTLseUjMIAjhcc_XV1qx5ivOGN4ACS5cTMJmfcaeM_C9e73BXshxD5jcpcepLtIEylVQIhJISisQ7TSAQGylp-dyvxN-3bo6bCivtsZ6v3pvfDimbKGTyx5161wS', NULL, 0, 0, '2020-09-20 15:45:50', '2020-09-22 10:39:20'),
(45, 'Mohama', NULL, 'hh@h.com', 'Mohama', '01212002588', NULL, NULL, NULL, '16006823976621.jpeg', 1, NULL, '$2y$10$iOq/xT86IuNfdW6GpF4F3.8IxBP7ngjpRvoXfV...7b3Q9IMJtaiS', NULL, 3, 'activated', NULL, NULL, 0.00, 'fv0-CwpH9HM:APA91bG9oaPLFeMxRarkord_ag7ctftGeBXO4dQrEEayNy-G1Nm6da1yUld5hNBHFienX9mIqtuN8t_9uRU_RYM-sw3Vw_pAdXyS8gSd2uHUFI1oRPBpWm_L05srBITx3vf-GWdTXPih', NULL, 0, 0, '2020-09-21 09:10:54', '2020-09-21 17:52:06'),
(46, 'Meroo', NULL, 'test@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$2KhtTIbcJfjk4VYOzzK24u7hsi3JI8ccPvpJ1WjSGH0xVwH0V95xa', NULL, 3, 'activated', NULL, NULL, 0.00, 'cIxq5HPctRc:APA91bHQJJHKJDXNdzIlgw8xucgymeyzsk33sav4D3rxTe6CM-fnNdaxYAJw4p4OS02Z0n25S2FNJIpH1o8uaIYCupfYlAnRIRuOcAB0AH9-SU4u2v6lWHZHpSus7uBf6B8fpsaxVFem', NULL, 0, 0, '2020-09-21 13:10:02', '2020-09-21 13:10:02'),
(47, 'Ejarly', NULL, 'ejarly.a@gmail.com', 'Ejarly', '563114446', NULL, NULL, NULL, '16008703921442.jpeg', 1, NULL, '$2y$10$P0Z1jrCAf7kCb559w92/3uAoIT4fJ5/cGhATQtmaYUqnw68Q8BjyK', NULL, 3, 'activated', NULL, NULL, 0.00, 'd2IL0_b59hg:APA91bGJ1utRvP92WF-Kr2fwVHWhWEKQUgNOxVEGJ7A-vSKe4rX-wjk-4E8KPV0IYztUHaPSe2s-egqikilFaEQth-vtbZ2SHFEIj83oSC71MDyIvNgItSU4GOmmEMnpx_rnWMSCTBsK', NULL, 0, 0, '2020-09-21 16:14:31', '2020-11-01 09:46:17'),
(48, 'Renter 1', NULL, 'renter1@yahoo.com', 'Renter 1', '22123555555', NULL, NULL, NULL, '16007849027671.jpeg', 1, NULL, '$2y$10$oFNZCVl1RQjtkkXjDC9EVOxaxFCLcuuOtIy/6BFx4SGRbtd.mE6ci', NULL, 3, 'activated', NULL, NULL, 0.00, 'ft8QQIN8T1g:APA91bFAt-4P0Y0LWXTo6a1FPng5DPXV7xxBNoiIAHTjYIDoEWgkya0kXmJpp9MyzwfXHKqxGv-OOE2haGkwJXkOvzqMVslkMH53ciCni-Q5J4v2uA_0rlFpWVSZdkAb9cHMNq_p1bKb', NULL, 0, 0, '2020-09-22 14:01:37', '2020-09-23 10:30:57'),
(49, 'Gogo', NULL, 'gogo@yahoo.com', 'Gogo 1', '12345612345', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$4QeivsFy1CING8PY0rBoceplEbLpoEOctbaKhH8sS4tT0iWFL2U4O', NULL, 3, 'activated', NULL, NULL, 0.00, 'eP4jnSFZK44:APA91bH-g7xTn2dJbIyCeDLUchKq_6K6fnFNOVbKt2eNXQL5l6Kt-mwWnOx1y-yv-dwf9tIxfj9acHvujUJy5kEy1-I5VMbUe_7Vqh9nEQqSBQq81mho5UK6hJoz6Yh0TdiefiY5r5JQ', '8751', 1, 2, '2020-09-27 11:20:54', '2020-11-02 14:53:55'),
(50, 'Mohamed', NULL, 'mohamed@yahoo.com', 'Mohamed', '012077507', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$SjpFMG7rOn2.S4njhfwyTOVl4GQhw4XbS8dz5nS7arG/3lbe0Kk0m', NULL, 3, 'activated', NULL, NULL, 0.00, 'fITazSSp7tM:APA91bHKkg_GNrmJjo8P6QQpsUmF3GCTsobeMaG04Vq_FRLxqz12EqiZOGr8WneIT_lZDeN-s_c0LJ4WT17pTsYiEF9UhjLOIbDr8_upSh00Uww9wjs9Db4-Jp5KKUqs9l3WSF9ZnFvQ', NULL, 0, 0, '2020-09-27 12:10:37', '2020-10-20 14:30:45'),
(51, 'Meroo', NULL, 'dd@dd.dd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$bKiPGOoa6QtfSnP6JGZYROhBak5AKX8j0CpAmcvo/9sPHa9BQloIq', NULL, 3, 'activated', NULL, NULL, 0.00, 'd96clZ2X0XA:APA91bGYlsJMzPcgoq853xPudqGDX0SGucvNe3-jsZmJpmv8lbKDkI5TOGGvsD_auGesWjzJBFJK33jfvJS69kjT-yBJ_UJqMdJ3rJGwfQRdDLvzgQ9TKjPUY8tBl0Alfu2GH93a1pU3', NULL, 0, 0, '2020-10-12 08:10:42', '2020-10-12 08:10:42'),
(52, 'Medo', NULL, 'mm@mm.mm', 'Medo', '0123131313', NULL, NULL, NULL, '16024914404730.jpeg', 1, NULL, '$2y$10$r8SfqL2MIRxR3P4NFzrR1./oZ79We6BpRcaUFn9kYAsUde7kj7Jjm', NULL, 3, 'activated', NULL, NULL, 0.00, 'eqEJIcUoX4E:APA91bH0J82BGBnRfjNsSaPfr-tgr-eCta2VCwSDwXwjA07dXE-OlAGrIPpvZQSvVXeeYYeB7A4iIzBozDx0KrRM-tlGvNYApLdapVLJJ4dWVQhkxvyLivdkcKLRjY8w6nBzkTIinbbE', NULL, 0, 0, '2020-10-12 08:11:31', '2020-10-12 08:30:40'),
(53, 'Marwa', NULL, 'marwa@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$qxJeM2U2uAhGAsVIQ8Yxr.DTd0ag3QaOaLbOaAK25jtubs2UWwtHq', NULL, 3, 'activated', NULL, NULL, 0.00, 'eGD0-Jxrz5Q:APA91bGMRx6q5WgRzh2U7ZSOPWWIjBHvfqQ7yDER-bJFp1x4KlvfyzBiAKtjeluxOwTrm0SHHKpEZnCYp7GwAiojdbY7ORfsyvsQDMMPSzvR6KJOOGWbzAZgSttCbxfSC0I8uzLhHLQf', NULL, 0, 0, '2020-10-21 08:41:08', '2020-10-22 11:47:22'),
(54, 'Ebrahim', NULL, 'ebrahim@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$6RoJmP8pXNoRWKggVlgdwutZUb/aJxvb.wVAqc/ebky6alvwE7AQW', NULL, 3, 'activated', NULL, NULL, 0.00, 'fhjofKD1YKE:APA91bGUXsrM6JgEgCnrTYuzWNkYJZoeTOyq3H-BM-URW4XIjftKztVEIOSqaW1v-l6T7BXOUT02bl_bbjnq90tWXk5ADeLJZCtL0s8qYfC_NjG9G1yb1dmvGtMhTDyY9pRsvDuHu8iO', '5642', 0, 0, '2020-10-21 08:52:13', '2020-11-03 07:57:43'),
(58, 'badr', NULL, 'badr@fudex.com.sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$TKl9eyfhrcyGFtC4BLa91OmCTLhfe9iIGq1sXSsJjwlDM4zItTgyC', NULL, 3, 'activated', NULL, NULL, 0.00, 'fWdEbFuySEY:APA91bEcl9FEf0p4b12-71zYZCdEeqZt2CwVTBLyHdunUmxaw205Qfeqa2t9CFa1HRmoAgaL9SMmNY2uxZDPeeWWxT1nYj2qYqZv_PFtQD-LR0TG7ZISrRjKSLImFAyxEvpF0aXHQmn6', '', 0, 0, '2020-10-26 12:09:29', '2020-10-27 18:36:10'),
(59, 'Mohandas', NULL, 'shawkymohamed138@gmail.com', NULL, '+96655000888', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$F.Y2ePQieTd7E7ZzNwPNF./Sq.YV8xrJBj5GhPEP9c/YZD.9iXj7K', NULL, 3, 'activated', NULL, NULL, 0.00, 'd3tw6ljtp84:APA91bGf4fZx_zBQm6fuRQ7YTPpjgD5bIrnX5Qf5rlv5Iw4b9zcFmk0_gFa3LmlLLoyg3GyXP-8u4nGS-kw30Y0qY-jlgM6E-DZIkgaRyWvlGEwl6s9Ee02ovxcwqvTAFqjYIfMnblCZ', '', 0, 2, '2020-10-27 16:14:41', '2020-11-03 09:39:27'),
(60, 'hmasa', NULL, 'hmasa@h.com', NULL, '96655000123', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$qP0PqYOlehfuVLjip/GIVexm.NGNzyVl7HgfVE0oVQ07h2h35B6pG', NULL, 3, 'deactivated', NULL, NULL, 0.00, 'eP_vxCIL3uc:APA91bH9nvG0dWndxdqWFi6ye67oo-gtBCe_6psOfh4J033wTdgpuWVjVSkTOF_LVcShm9eeob6y9t6FfX4_kmNoskbfJD45tzVZM1x5-CVAIglfkclQNV58_ioo-OLySV4iGihRmuOh', '1445', 0, 0, '2020-10-28 07:32:19', '2020-10-28 07:34:22'),
(61, 'Marwa', NULL, 'marwa.elsayed.elbelasy@gmail.com', NULL, '01017127744', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$Bqe1oC4R4YeORGxQ6pzeE.DylXbUNRzFvmLwXQ97z0qEesi.qPW3m', NULL, 3, 'activated', NULL, NULL, 0.00, 'dxzT2MeLTho:APA91bFMEFWqJiDsLHInCI5mSW65dhKadhFIoNjy40KeaDClURn75kShrGRdE1iL2di6tmdp-1DvNxsbPmI9fEjE-oyf-8XIaBX5Tdxc134Lrvmb5PBk6ALCx8812wemYTCA0I5fYcEb', '', 0, 2, '2020-10-28 08:20:09', '2020-11-03 11:17:42'),
(62, 'mmmmmmmm', NULL, 'soo@soo.com', NULL, '96655000222', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$jjmGyqd6GNrx.RgsOnqR1uxRdpGG5zyCSQq.IW5XjxcGDgKpr.OF6', NULL, 3, 'activated', NULL, NULL, 0.00, 'eP4jnSFZK44:APA91bH-g7xTn2dJbIyCeDLUchKq_6K6fnFNOVbKt2eNXQL5l6Kt-mwWnOx1y-yv-dwf9tIxfj9acHvujUJy5kEy1-I5VMbUe_7Vqh9nEQqSBQq81mho5UK6hJoz6Yh0TdiefiY5r5JQ', '', 0, 2, '2020-10-28 09:31:31', '2020-11-02 14:58:29'),
(63, 'Mohamed', NULL, 'mohamed.elbelasy9922@gmail.com', NULL, '01235678654', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$UYf5mPF8.wq94vCMHQYereIkXxaqq7LCLQXin11XQKzSOd0.XZ0sC', NULL, 3, 'blocked', NULL, NULL, 0.00, 'fTrdsbiI_RU:APA91bE5Y99zwZvDr1dbghJdezrErz4UkY3YoFHpy9VWLfHRq7rEmne8vu2YF2ucrHzRA6UXeLCpB3pFXkRmnSbTUbXr8A-No5oizFDpHBiNWMTdIsLRLjXbk2X5JEtwOgimsaqe9F0a', '', 0, 0, '2020-10-28 10:37:42', '2020-10-28 17:13:40'),
(64, 'Mmmm', NULL, 'hhh@jj.com', NULL, '96655000987', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$q1jAzst7EGgWOcYJbnFNbOU2D0WK75ELVmrKN7AV9Sm9CmeikLcs2', NULL, 3, 'deactivated', NULL, NULL, 0.00, 'eRean1KK_bM:APA91bF9brwxI632uNubooydZCt34PjPozchLyLKJR1ucC-nFFRTw9Yo8PyGR8TQ4c8JQyoMJ88YAcc04bQRs_YfPZUKiYO_UBWS0KT8_JAlkJGxIl9vwIK0AFfBZ2Up_LSLA0ADWr08', '3502', 0, 0, '2020-11-01 15:54:40', '2020-11-01 15:54:40'),
(65, 'Mmmm', NULL, 'mmm@m.com', NULL, '96655000999', NULL, 7, NULL, NULL, 0, NULL, '$2y$10$sz2UJzRo1.WRLFCOdeYwLOyKEN9hwh0QRRLnfB5UVQlqeTJ6dYJgG', NULL, 3, 'activated', NULL, NULL, 0.00, 'eRean1KK_bM:APA91bF9brwxI632uNubooydZCt34PjPozchLyLKJR1ucC-nFFRTw9Yo8PyGR8TQ4c8JQyoMJ88YAcc04bQRs_YfPZUKiYO_UBWS0KT8_JAlkJGxIl9vwIK0AFfBZ2Up_LSLA0ADWr08', '4400', 0, 0, '2020-11-01 16:12:43', '2020-11-03 10:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_logs`
--

CREATE TABLE `wallet_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `amount` double(8,2) NOT NULL,
  `type` enum('cash_back','deposit','withdrawal','refunds','received_order','payed_order','debts') CHARACTER SET utf8 DEFAULT NULL,
  `payment_method` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_logs`
--

INSERT INTO `wallet_logs` (`id`, `user_id`, `from_id`, `order_id`, `amount`, `type`, `payment_method`, `transaction_id`, `approved`, `created_at`, `updated_at`) VALUES
(193, 63, NULL, 0, 222.20, 'deposit', 'visa', '8ac7a4a0756ef9fb01757005cfe82f10', 1, '2020-10-28 16:23:59', '2020-10-28 16:23:59'),
(192, 54, NULL, 78, 211.20, 'received_order', 'visa', NULL, 1, '2020-10-28 16:10:50', '2020-10-28 16:10:50'),
(191, 54, NULL, 77, 11.00, 'debts', 'wallet', NULL, 1, '2020-10-28 16:00:29', '2020-10-28 16:00:29'),
(194, 63, NULL, 83, 222.20, 'payed_order', 'wallet', NULL, 1, '2020-10-28 16:25:36', '2020-10-28 16:25:36'),
(195, 54, NULL, 83, 211.20, 'received_order', 'wallet', NULL, 1, '2020-10-28 16:25:36', '2020-10-28 16:25:36'),
(196, 54, NULL, 0, 88.60, 'deposit', 'visa', '8ac7a49f756eef900175700c7d3e6c37', 1, '2020-10-28 16:31:17', '2020-10-28 16:31:17'),
(197, 54, NULL, 0, 88.60, 'withdrawal', '', NULL, 1, '2020-10-28 16:33:30', '2020-11-01 11:38:50'),
(198, 63, NULL, 84, 0.50, 'debts', 'wallet', NULL, 1, '2020-10-28 16:43:48', '2020-10-28 16:43:48'),
(199, 63, 1, 0, 50.00, 'deposit', 'from_admin', NULL, 1, '2020-10-28 17:27:16', '2020-10-28 17:27:16'),
(200, 12, 1, 0, 50.00, 'withdrawal', 'from_admin', NULL, 1, '2020-10-28 17:34:19', '2020-10-28 17:34:19'),
(201, 54, NULL, 86, 11.00, 'debts', 'wallet', NULL, 1, '2020-10-28 18:37:48', '2020-10-28 18:37:48'),
(202, 54, NULL, 0, 0.40, 'withdrawal', '', NULL, 1, '2020-10-29 07:27:38', '2020-10-29 11:19:10'),
(203, 54, 1, 0, 100.00, 'deposit', 'from_admin', NULL, 1, '2020-10-29 07:30:21', '2020-10-29 07:30:21'),
(204, 54, 1, 0, 100.00, 'withdrawal', 'from_admin', NULL, 1, '2020-10-29 07:30:48', '2020-10-29 07:30:48'),
(205, 54, 1, 0, 50.00, 'refunds', 'from_admin', NULL, 1, '2020-10-29 07:34:15', '2020-10-29 07:34:15'),
(206, 54, NULL, 87, 11.00, 'debts', 'wallet', NULL, 1, '2020-10-29 07:37:23', '2020-10-29 07:37:23'),
(207, 22, 1, 0, 1.00, 'deposit', 'from_admin', NULL, 1, '2020-10-29 11:59:36', '2020-10-29 11:59:36'),
(208, 22, 1, 0, 4.00, 'deposit', 'from_admin', NULL, 1, '2020-10-29 11:59:54', '2020-10-29 11:59:54'),
(209, 22, 1, 0, 1.00, 'withdrawal', 'from_admin', NULL, 1, '2020-10-29 12:00:07', '2020-10-29 12:00:07'),
(210, 22, 1, 0, 1.00, 'withdrawal', 'from_admin', NULL, 1, '2020-10-29 12:00:26', '2020-10-29 12:00:26'),
(211, 22, 1, 0, 1.00, 'refunds', 'from_admin', NULL, 1, '2020-10-29 12:00:36', '2020-10-29 12:00:36'),
(212, 27, 1, 0, 100.00, 'deposit', 'from_admin', NULL, 1, '2020-10-30 09:44:22', '2020-10-30 09:44:22'),
(213, 21, 1, 0, 100.00, 'deposit', 'from_admin', NULL, 1, '2020-10-30 09:49:29', '2020-10-30 09:49:29'),
(214, 24, NULL, 88, 70.00, 'debts', 'wallet', NULL, 1, '2020-11-01 09:39:00', '2020-11-01 09:39:00'),
(215, 24, NULL, 88, 70.00, 'debts', 'wallet', NULL, 1, '2020-11-01 09:39:16', '2020-11-01 09:39:16'),
(216, 54, NULL, 89, 101.00, 'payed_order', 'wallet', NULL, 1, '2020-11-01 09:59:31', '2020-11-01 09:59:31'),
(217, 24, NULL, 89, 96.00, 'received_order', 'wallet', NULL, 1, '2020-11-01 09:59:31', '2020-11-01 09:59:31'),
(218, 33, 1, 0, 100.00, 'deposit', 'from_admin', NULL, 1, '2020-11-01 10:04:40', '2020-11-01 10:04:40'),
(219, 33, NULL, 0, 50.00, 'withdrawal', '', NULL, 1, '2020-11-01 10:05:22', '2020-11-01 10:05:50'),
(220, 33, NULL, 0, 50.00, 'withdrawal', '', NULL, 1, '2020-11-01 10:06:23', '2020-11-01 10:07:43'),
(221, 33, NULL, 0, 50.00, 'withdrawal', '', NULL, 1, '2020-11-01 10:06:56', '2020-11-01 10:08:13'),
(222, 33, NULL, 0, 50.00, 'withdrawal', '', NULL, 1, '2020-11-01 10:07:04', '2020-11-01 10:08:17'),
(223, 24, NULL, 90, 5.00, 'debts', 'wallet', NULL, 1, '2020-11-01 10:19:09', '2020-11-01 10:19:09'),
(224, 27, NULL, 91, 69.00, 'payed_order', 'wallet', NULL, 1, '2020-11-01 11:36:38', '2020-11-01 11:36:38'),
(225, 32, NULL, 91, 54.00, 'received_order', 'wallet', NULL, 1, '2020-11-01 11:36:38', '2020-11-01 11:36:38'),
(226, 24, NULL, 92, 45.00, 'received_order', 'master', NULL, 1, '2020-11-01 12:41:29', '2020-11-01 12:41:29'),
(227, 24, NULL, 93, 12.50, 'debts', 'wallet', NULL, 1, '2020-11-01 12:54:06', '2020-11-01 12:54:06'),
(228, 24, NULL, 94, 12.50, 'debts', 'wallet', NULL, 1, '2020-11-01 13:14:32', '2020-11-01 13:14:32'),
(229, 24, NULL, 95, 162.50, 'debts', 'wallet', NULL, 1, '2020-11-01 13:36:02', '2020-11-01 13:36:02'),
(230, 24, NULL, 97, 12.50, 'debts', 'wallet', NULL, 1, '2020-11-01 14:04:31', '2020-11-01 14:04:31'),
(231, 59, NULL, 73, 1.25, 'debts', 'wallet', NULL, 1, '2020-11-01 14:05:57', '2020-11-01 14:05:57'),
(232, 59, NULL, 96, 22.50, 'received_order', 'visa', NULL, 1, '2020-11-01 14:14:00', '2020-11-01 14:14:00'),
(233, 59, NULL, 98, 6.25, 'debts', 'wallet', NULL, 1, '2020-11-01 14:40:55', '2020-11-01 14:40:55'),
(234, 59, NULL, 98, 22.50, 'received_order', 'visa', NULL, 1, '2020-11-01 14:57:14', '2020-11-01 14:57:14'),
(235, 59, NULL, 98, 22.50, 'received_order', 'visa', NULL, 1, '2020-11-01 15:00:55', '2020-11-01 15:00:55'),
(236, 59, NULL, 98, 22.50, 'received_order', 'visa', NULL, 1, '2020-11-01 15:06:55', '2020-11-01 15:06:55'),
(237, 59, NULL, 99, 6.25, 'debts', 'wallet', NULL, 1, '2020-11-01 15:13:02', '2020-11-01 15:13:02'),
(238, 24, NULL, 101, 112.50, 'debts', 'wallet', NULL, 1, '2020-11-02 11:43:17', '2020-11-02 11:43:17'),
(239, 24, NULL, 0, 316.50, 'deposit', 'visa', '8ac7a4a0758869cd017588df72f92464', 1, '2020-11-02 12:12:34', '2020-11-02 12:12:34'),
(240, 59, NULL, 102, 6.25, 'debts', 'wallet', NULL, 1, '2020-11-02 12:44:20', '2020-11-02 12:44:20'),
(241, 59, NULL, 102, 22.50, 'received_order', 'visa', NULL, 1, '2020-11-02 12:49:04', '2020-11-02 12:49:04'),
(242, 35, NULL, 103, 6.25, 'debts', 'wallet', NULL, 1, '2020-11-02 13:49:27', '2020-11-02 13:49:27'),
(243, 24, NULL, 104, 2.50, 'debts', 'wallet', NULL, 1, '2020-11-02 15:25:00', '2020-11-02 15:25:00'),
(244, 59, NULL, 106, 6.25, 'debts', 'wallet', NULL, 1, '2020-11-02 16:04:40', '2020-11-02 16:04:40'),
(245, 59, NULL, 106, 45.00, 'received_order', 'visa', NULL, 1, '2020-11-02 16:06:23', '2020-11-02 16:06:23'),
(246, 59, NULL, 106, 45.00, 'received_order', 'visa', NULL, 1, '2020-11-02 16:10:59', '2020-11-02 16:10:59'),
(247, 59, NULL, 106, 45.00, 'received_order', 'visa', NULL, 1, '2020-11-02 16:17:02', '2020-11-02 16:17:02'),
(248, 24, NULL, 0, 2.50, 'deposit', 'visa', '8ac7a49f758866bf01758d2ed4287949', 1, '2020-11-03 08:17:48', '2020-11-03 08:17:48'),
(249, 24, NULL, 107, 12.50, 'debts', 'wallet', NULL, 1, '2020-11-03 08:56:07', '2020-11-03 08:56:07'),
(250, 24, NULL, 107, 45.00, 'received_order', 'visa', NULL, 1, '2020-11-03 08:58:30', '2020-11-03 08:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(89, 4, 166, '2020-09-17 13:29:09', '2020-09-17 13:29:09'),
(90, 44, 170, '2020-09-22 13:13:17', '2020-09-22 13:13:17'),
(93, 44, 168, '2020-09-22 13:59:12', '2020-09-22 13:59:12'),
(94, 44, 169, '2020-09-22 14:00:21', '2020-09-22 14:00:21'),
(95, 24, 173, '2020-09-23 17:29:33', '2020-09-23 17:29:33'),
(96, 24, 172, '2020-09-23 17:29:35', '2020-09-23 17:29:35'),
(100, 32, 185, '2020-10-13 15:47:32', '2020-10-13 15:47:32'),
(101, 32, 186, '2020-10-13 15:47:32', '2020-10-13 15:47:32'),
(102, 32, 183, '2020-10-13 15:47:33', '2020-10-13 15:47:33'),
(104, 32, 182, '2020-10-13 15:47:34', '2020-10-13 15:47:34'),
(106, 50, 186, '2020-10-15 11:54:35', '2020-10-15 11:54:35'),
(109, 54, 173, '2020-11-03 10:00:09', '2020-11-03 10:00:09'),
(110, 59, 190, '2020-11-03 10:14:50', '2020-11-03 10:14:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_transactions`
--
ALTER TABLE `application_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_types`
--
ALTER TABLE `delivery_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distinction_statuses`
--
ALTER TABLE `distinction_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distinguish_products`
--
ALTER TABLE `distinguish_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_logs`
--
ALTER TABLE `error_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extended_requests`
--
ALTER TABLE `extended_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extension_status`
--
ALTER TABLE `extension_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_logs`
--
ALTER TABLE `notifications_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reports`
--
ALTER TABLE `product_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_status`
--
ALTER TABLE `report_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_list`
--
ALTER TABLE `share_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitted_orders`
--
ALTER TABLE `submitted_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallet_logs`
--
ALTER TABLE `wallet_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `application_transactions`
--
ALTER TABLE `application_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_types`
--
ALTER TABLE `delivery_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distinction_statuses`
--
ALTER TABLE `distinction_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distinguish_products`
--
ALTER TABLE `distinguish_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `error_logs`
--
ALTER TABLE `error_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `extended_requests`
--
ALTER TABLE `extended_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `extension_status`
--
ALTER TABLE `extension_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications_logs`
--
ALTER TABLE `notifications_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4533;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `product_reports`
--
ALTER TABLE `product_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_status`
--
ALTER TABLE `report_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `share_list`
--
ALTER TABLE `share_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submitted_orders`
--
ALTER TABLE `submitted_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `wallet_logs`
--
ALTER TABLE `wallet_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
