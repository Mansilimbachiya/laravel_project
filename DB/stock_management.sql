-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 10:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bringerlist`
--

CREATE TABLE `bringerlist` (
  `bid` int(10) UNSIGNED NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bmobileno` varchar(255) NOT NULL,
  `bpersonname` varchar(255) NOT NULL,
  `bstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bringerlist`
--

INSERT INTO `bringerlist` (`bid`, `bname`, `bmobileno`, `bpersonname`, `bstatus`, `created_at`, `updated_at`) VALUES
(1, 'aman', '3211678656', 'xvxgf', 1, '2023-10-09 21:30:39', '2023-10-09 21:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cpprice` varchar(255) NOT NULL,
  `qty` varchar(9) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pid`, `uid`, `cpprice`, `qty`, `date`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 5, '70', '1', '2023-12-28', 0, '2023-12-28 03:36:29', '2023-12-28 03:36:29'),
(13, 3, 1, '375', '1', '2023-12-29', 0, '2023-12-28 23:51:13', '2023-12-28 23:51:13'),
(14, 3, 4, '375', '1', '2023-12-29', 0, '2023-12-29 01:14:24', '2023-12-29 01:14:24'),
(15, 2, 1, '70', '1', '2023-12-29', 0, '2023-12-29 03:21:36', '2023-12-29 03:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(10) UNSIGNED NOT NULL,
  `cname` varchar(255) NOT NULL,
  `subid` varchar(9) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `subid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ice Cream', '0', 1, '2023-10-09 23:19:37', '2023-10-09 23:19:37'),
(2, 'Cake', '0', 1, '2023-10-09 23:20:08', '2023-10-09 23:20:08'),
(3, 'Amul', '1', 0, '2023-10-09 23:20:32', '2023-10-10 18:07:28'),
(4, 'Monginis', '2', 0, '2023-10-09 23:22:04', '2023-10-10 18:05:59'),
(5, 'Havmor', '1', 1, '2023-10-09 23:27:50', '2023-10-09 23:27:50'),
(6, 'Vadilal', '1', 1, '2023-10-09 23:28:09', '2023-10-09 23:28:09'),
(7, 'Magnum', '1', 1, '2023-10-09 23:28:35', '2023-10-09 23:28:35'),
(8, 'Kulfi', '1', 1, '2023-10-09 23:28:51', '2023-10-09 23:28:51'),
(9, 'Vanilla', '1', 1, '2023-10-09 23:29:29', '2023-10-09 23:29:29'),
(10, 'Chocolate', '1', 1, '2023-10-09 23:29:52', '2023-10-09 23:29:52'),
(11, 'Kabhi B', '2', 1, '2023-10-09 23:33:59', '2023-10-09 23:33:59'),
(12, 'Seventh Heaven', '2', 1, '2023-10-09 23:36:08', '2023-10-09 23:36:08'),
(13, 'WS Bakers', '2', 1, '2023-10-09 23:36:30', '2023-10-09 23:36:30'),
(14, 'Bakingo', '2', 1, '2023-10-09 23:36:59', '2023-10-09 23:36:59'),
(15, 'CakeZone', '2', 1, '2023-10-09 23:37:23', '2023-10-09 23:37:23'),
(16, 'Mr. Brown Bakery.', '2', 1, '2023-10-09 23:39:15', '2023-10-09 23:39:15'),
(17, 'Mother Dairy', '1', 1, '2023-10-09 23:46:46', '2023-10-09 23:46:46'),
(18, 'Kwality Walls', '1', 1, '2023-10-09 23:51:54', '2023-10-09 23:51:54'),
(19, 'Baskin-Robbins', '1', 1, '2023-10-09 23:52:19', '2023-10-09 23:52:19'),
(20, 'Kayani Bakery', '2', 1, '2023-10-09 23:53:15', '2023-10-09 23:53:15'),
(21, 'German Bakery', '2', 0, '2023-10-09 23:53:50', '2023-12-25 06:48:47'),
(22, 'Sugar & Spice', '2', 0, '2023-10-09 23:54:09', '2023-10-10 19:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `contactno`
--

CREATE TABLE `contactno` (
  `coid` int(9) NOT NULL,
  `coname` varchar(255) NOT NULL,
  `coemail` varchar(50) NOT NULL,
  `cocontactno` varchar(10) NOT NULL,
  `comessage` longtext NOT NULL,
  `costatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactno`
--

INSERT INTO `contactno` (`coid`, `coname`, `coemail`, `cocontactno`, `comessage`, `costatus`, `created_at`, `updated_at`) VALUES
(1, 'Mansi', 'Man@gmail.com', '0123456789', 'demo', 1, '2023-12-27 00:52:15', '2023-12-27 03:14:34'),
(2, 'Darshan', 'dar@gmail.com', '1230456789', 'hello', 1, '2023-12-27 00:54:17', '2023-12-27 03:16:12'),
(3, 'akshay', 'ak@gmail.com', '0001232456', 'available not', 1, '2023-12-28 23:52:12', '2023-12-28 23:52:12');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_06_044017_create_admin_table', 1),
(6, '2023_10_06_044334_create_category_table', 2),
(7, '2023_10_06_044717_create_product_table', 3),
(8, '2023_10_06_050051_create_bringerlist_table', 4),
(9, '2023_10_06_050954_create_stockcarrier_table', 5),
(10, '2023_10_06_051356_create_stock_table', 6),
(11, '2023_10_16_110244_create_userlist_table', 7),
(12, '2023_10_20_102545_create_cart_table', 8),
(13, '2023_11_03_081130_create_orderlist_table', 9),
(14, '2023_11_03_101939_create_orderhistory_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `my_gallery`
--

CREATE TABLE `my_gallery` (
  `gid` int(9) NOT NULL,
  `gimage` mediumtext NOT NULL,
  `gimgname` varchar(255) NOT NULL,
  `gstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_gallery`
--

INSERT INTO `my_gallery` (`gid`, `gimage`, `gimgname`, `gstatus`, `created_at`, `updated_at`) VALUES
(1, '202312230533ee.webp', 'demo', 2, '2023-12-23 00:03:27', '2023-12-23 00:44:41'),
(2, '202312260433bg image.jpg', 'test.img', 2, '2023-12-23 00:03:48', '2023-12-28 01:07:10'),
(3, '202312230547ee.webp', 'trial', 2, '2023-12-23 00:17:36', '2023-12-23 00:47:34'),
(4, '202312280632cake.jpg', 'Black Forest Cake image', 1, '2023-12-28 01:02:25', '2023-12-28 23:58:15'),
(5, '202312280632cartoon.jpg', 'mickey mouse cartoon cake', 1, '2023-12-28 01:02:47', '2023-12-28 01:02:47'),
(6, '202312280633chocobar.jpg', 'chocobar ice-cream', 1, '2023-12-28 01:03:10', '2023-12-28 01:03:10'),
(7, '202312280633download.jpg', 'amul ice-cream', 1, '2023-12-28 01:03:33', '2023-12-28 01:03:33'),
(8, '202312280634icecream_cake.jpg', 'ice-cream with cake', 1, '2023-12-28 01:04:05', '2023-12-28 01:04:05'),
(9, '202312280636vadilal.jpg', 'vadilal kulfi.jpg', 1, '2023-12-28 01:06:40', '2023-12-28 01:06:40'),
(10, '202312280636havmor.jpg', 'havmor ice-cream', 1, '2023-12-28 01:06:54', '2023-12-28 01:06:54'),
(11, '202312280637strawberry.jpg', 'strabbery ice-cream', 1, '2023-12-28 01:07:38', '2023-12-28 01:07:38'),
(12, '202312280637cute.jpg', 'pink cake', 1, '2023-12-28 01:07:52', '2023-12-28 01:07:52'),
(13, '202312280638ee.webp', 'cake', 1, '2023-12-28 01:08:48', '2023-12-28 01:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `orderhistoryid` int(10) UNSIGNED NOT NULL,
  `orderaddress` longtext NOT NULL,
  `orderuserid` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `ordertotalamount` varchar(255) NOT NULL,
  `orderstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`orderhistoryid`, `orderaddress`, `orderuserid`, `orderdate`, `ordertotalamount`, `orderstatus`, `created_at`, `updated_at`) VALUES
(1, 'palanpur', 5, '2023-12-04', '300', 1, '2023-12-03 19:47:27', '2023-12-03 19:47:27'),
(2, 'palanpur', 5, '2023-12-04', '1040', 1, '2023-12-03 19:56:40', '2023-12-03 19:56:40'),
(3, 'mhu', 5, '2023-12-06', '70', 2, '2023-12-06 00:46:09', '2023-12-28 23:56:04'),
(4, 'deesa', 11, '2023-12-25', '790', 1, '2023-12-25 06:54:04', '2023-12-25 06:54:04'),
(5, 'deesa', 9, '2023-12-26', '750', 4, '2023-12-25 22:46:37', '2023-12-28 23:55:28'),
(6, 'plnord', 1, '2023-12-28', '0', 2, '2023-12-28 03:41:54', '2023-12-28 23:56:07'),
(7, 'plnpur', 1, '2023-12-28', '0', 3, '2023-12-28 03:42:03', '2023-12-28 23:53:12'),
(8, 'plnpuram', 2, '2023-12-28', '375', 4, '2023-12-28 05:08:30', '2023-12-28 23:57:04'),
(9, 'plnpur', 4, '2023-12-28', '750', 3, '2023-12-28 05:17:10', '2023-12-28 23:53:14'),
(10, 'palanpur', 1, '2023-12-29', '375', 3, '2023-12-28 23:15:18', '2023-12-28 23:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `orderhistoryid` int(11) NOT NULL,
  `opid` int(11) NOT NULL,
  `ouid` int(11) NOT NULL,
  `ocpprice` varchar(255) NOT NULL,
  `oqty` varchar(255) NOT NULL,
  `oamount` varchar(20) NOT NULL,
  `odate` date NOT NULL,
  `ostatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`orderid`, `orderhistoryid`, `opid`, `ouid`, `ocpprice`, `oqty`, `oamount`, `odate`, `ostatus`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, '70', '3', '210', '2023-12-04', 1, '2023-12-03 19:47:27', '2023-12-03 19:47:27'),
(2, 1, 6, 5, '300', '2', '600', '2023-12-04', 1, '2023-12-03 19:47:27', '2023-12-03 19:47:27'),
(3, 2, 2, 5, '70', '2', '140', '2023-12-04', 1, '2023-12-03 19:56:40', '2023-12-03 19:56:40'),
(4, 2, 6, 5, '300', '3', '900', '2023-12-04', 1, '2023-12-03 19:56:40', '2023-12-03 19:56:40'),
(5, 3, 2, 5, '70', '1', '70', '2023-12-06', 1, '2023-12-06 00:46:09', '2023-12-06 00:46:09'),
(6, 4, 5, 11, '20', '2', '40', '2023-12-25', 1, '2023-12-25 06:54:04', '2023-12-25 06:54:04'),
(7, 4, 3, 11, '375', '2', '750', '2023-12-25', 1, '2023-12-25 06:54:04', '2023-12-25 06:54:04'),
(8, 5, 3, 9, '375', '2', '750', '2023-12-26', 1, '2023-12-25 22:46:37', '2023-12-25 22:46:37'),
(9, 8, 3, 2, '375', '1', '375', '2023-12-28', 1, '2023-12-28 05:08:30', '2023-12-28 05:08:30'),
(10, 9, 3, 4, '375', '2', '750', '2023-12-28', 1, '2023-12-28 05:17:10', '2023-12-28 05:17:10'),
(11, 10, 3, 1, '375', '1', '375', '2023-12-29', 1, '2023-12-28 23:15:19', '2023-12-28 23:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `orderreview`
--

CREATE TABLE `orderreview` (
  `reviewid` int(9) NOT NULL,
  `orderhistoryid` int(9) NOT NULL,
  `orderuserid` int(9) NOT NULL,
  `reviewmsg` longtext NOT NULL,
  `reviewstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderreview`
--

INSERT INTO `orderreview` (`reviewid`, `orderhistoryid`, `orderuserid`, `reviewmsg`, `reviewstatus`, `created_at`, `updated_at`) VALUES
(1, 5, 9, 'jijuiuihi', 1, '2023-12-25 22:50:43', '2023-12-25 22:50:43'),
(2, 10, 1, 'good services', 1, '2023-12-28 23:48:09', '2023-12-28 23:48:09'),
(3, 10, 1, 'i\'m satisfy', 1, '2023-12-28 23:49:53', '2023-12-28 23:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) UNSIGNED NOT NULL,
  `pimage` tinytext NOT NULL,
  `pname` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `pcid` int(11) NOT NULL,
  `pprice` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `subid` varchar(9) NOT NULL,
  `pstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pimage`, `pname`, `description`, `pcid`, `pprice`, `pdate`, `subid`, `pstatus`, `created_at`, `updated_at`) VALUES
(1, '202310120754amul01.jpg', 'Amul Real Milk Ice Cream', 'We are one of the leading Wholesale Traders of Amul Product, Cream Bell Product, Dr. Oetker Fun Foods Product, Del Monte Product, etc. Our efficient supply network allows us to promptly deliver these products at our Clients\' end.', 1, '30', '2023-10-14', '3', 1, '2023-10-11 20:54:57', '2023-12-25 06:49:53'),
(2, '202310130609havmor_icecream.jpg', 'Havmor Cookie Cream', 'A chocolate-coated crunchy outer layer hides an inner creamy, delightful chocolate ice cream that is perfect as an anytime snack .', 1, '70', '2023-10-14', '5', 1, '2023-10-12 19:09:31', '2023-10-12 19:11:24'),
(3, '202310130617monginis_cake.jpg', 'Monginis Black Forest Cake', 'Everyone\'s favorite Black Forest Cake has silky chocolate sponge layered with fresh cream and coated with cream, choco flakes and garnish.', 2, '375', '2023-10-16', '4', 1, '2023-10-12 19:17:28', '2023-10-12 19:17:28'),
(4, '202310130623kabhi_b.jpg', 'Kabhi B Chocolate Cake', 'Our delicious cake is made from the finest Belgian chocolate and is guaranteed to satisfy your sweet tooth. \r\n                 Every bite is packed with rich and luxurious flavor .', 2, '450', '2023-10-12', '11', 1, '2023-10-12 19:23:23', '2023-10-12 19:23:23'),
(5, '202310130651Choco Crackle Flingo.jpg', 'Vadilal Choco Crackle Flingo ice cream', 'Key Features :No Added Sugar. High In Protein. Gluten Free  ,\r\n Unit : 110 ml,  Packaging Type : Stick , Flavour :  Chocolate .', 1, '20', '2023-10-07', '6', 1, '2023-10-12 19:51:29', '2023-10-12 19:51:29'),
(6, '202310130656cakezone.jpg', 'Pineapple Cake', 'Taste this classic Pineapple cake, which is loved by everyone by its simple texture and the classy taste .', 2, '300', '2023-10-14', '15', 1, '2023-10-12 19:56:04', '2023-10-12 19:56:04'),
(7, '202310130659mother_dairy_ice-cream-choco-chip.jpg', 'Choco Chip Mother Dairy Ice Cream', 'Buy Mother Dairy Choco Chip Ice Cream online at lowest price from bigbasket and get them delivered at your doorstep.', 1, '290', '2023-10-25', '17', 1, '2023-10-12 19:59:56', '2023-10-12 19:59:56'),
(8, '202310130703Bluebarry.jpg', 'Bluebarry Cake', 'Blueberry flavoured whipped cream sandwiched between moist layers of vanilla sponge.', 2, '749', '2023-10-20', '13', 1, '2023-10-12 20:03:34', '2023-10-12 20:03:34'),
(9, '202310130707kulffie.jpg', 'Kulfi Ice Pistachio Flavour Kulfi Ice Cream', 'About Pista Kulfi: A popular Indian Ice cream which is basically a popsicle made with milk .', 1, '50', '2023-10-04', '8', 1, '2023-10-12 20:07:34', '2023-10-12 20:07:34'),
(10, '202310130711redvelvet_cake.jpg', 'Red Velvet Cake', 'Freshly baked red velvet cake sponge cake layered with whipped cream and cream .', 2, '800', '2023-10-18', '12', 1, '2023-10-12 20:11:48', '2023-10-12 20:11:48'),
(12, '202312281404download.jpg', 'Amul Ice-cream', 'strabbery amul ice-cream', 1, '50', '2023-12-28', '3', 1, '2023-12-28 08:34:20', '2023-12-28 08:34:20'),
(13, '202312281406chocobar.jpg', 'Chocobar', 'Amul Chocobar', 1, '30', '2023-12-27', '3', 1, '2023-12-28 08:36:10', '2023-12-28 08:36:10'),
(14, '202312281407cone.jpg', 'Havmor ice-cream', 'Havmor ice-cream cone chocolate flavoure available', 1, '80', '2023-12-21', '5', 1, '2023-12-28 08:37:25', '2023-12-28 08:37:25'),
(15, '202312281408icecream_cake.jpg', 'Ice-cream with Cake', 'Ice-cream Or cake Both are availeble in one product', 2, '850', '2023-12-19', '16', 1, '2023-12-28 08:38:48', '2023-12-28 08:38:48'),
(16, '202312281409cake.jpg', 'Black Forest Cake', 'Black Forest Cake', 2, '450', '2023-12-15', '4', 1, '2023-12-28 08:39:45', '2023-12-28 08:39:45'),
(17, '202312281410cartoon.jpg', 'Cartoon Mickey Mouse Cake', 'Cartoon Mickey Mouse Cake', 2, '1500', '2023-12-30', '12', 1, '2023-12-28 08:40:59', '2023-12-28 08:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(10) UNSIGNED NOT NULL,
  `stockpid` int(11) NOT NULL,
  `stockcid` int(11) NOT NULL,
  `totalstock` varchar(255) NOT NULL,
  `stockpcs` varchar(255) NOT NULL,
  `stockstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `stockpid`, `stockcid`, `totalstock`, `stockpcs`, `stockstatus`, `created_at`, `updated_at`) VALUES
(1, 4, 4, '5', '5', 1, '2023-10-09 22:30:02', '2023-10-09 22:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `stockcarrier`
--

CREATE TABLE `stockcarrier` (
  `scid` int(10) UNSIGNED NOT NULL,
  `scname` varchar(255) NOT NULL,
  `scmobileno` varchar(255) NOT NULL,
  `scpersonname` varchar(255) NOT NULL,
  `scstatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockcarrier`
--

INSERT INTO `stockcarrier` (`scid`, `scname`, `scmobileno`, `scpersonname`, `scstatus`, `created_at`, `updated_at`) VALUES
(1, 'ggj', '5643237890', '4545354445', 1, '2023-10-09 21:39:25', '2023-10-09 21:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `uid` int(10) UNSIGNED NOT NULL,
  `uimage` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `umobileno` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `uusername` varchar(255) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `ustatus` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`uid`, `uimage`, `uname`, `umobileno`, `upassword`, `uusername`, `uaddress`, `ustatus`, `created_at`, `updated_at`) VALUES
(1, '202310170702user.jpg', 'Akshay', '7894561230', '540', 'Ak', 'Mumbai , Maharastra', 1, '2023-10-16 20:02:53', '2023-12-25 23:03:27'),
(2, '202310170705girl.jpg', 'Prisha', '8785858506', '2580', 'Prisha_501', 'Delhi', 1, '2023-10-16 20:05:09', '2023-10-16 20:05:09'),
(3, '202310170759boys.jpg', 'Ayush', '545200552', '7820', 'aayush_00', 'Palanpur , Gujarat', 1, '2023-10-16 20:59:01', '2023-10-16 20:59:01'),
(4, '202310170801186037.png', 'Hirava', '8068402542', '6040', 'hirava541', 'Surat', 1, '2023-10-16 21:01:55', '2023-10-16 21:01:55'),
(5, '202310170802user.jpg', 'Darshan', '2421254210', '5555', 'darshan3', 'Palanpur , Gujarat', 1, '2023-10-16 21:02:49', '2023-10-16 21:02:49'),
(6, '202310170818boys.jpg', 'Vijay', '4545645645', '6060', 'Vijay87', 'Siddhpur , Gujarat', 1, '2023-10-16 21:18:32', '2023-10-16 21:18:32'),
(7, '202311060927boys.jpg', 'Admin', '5467891230', '0987', 'Admin_20', 'Surat , Gujarat', 1, '2023-11-05 22:27:34', '2023-11-05 22:27:34'),
(8, '202311280836user.jpg', 'Vivek', '4569871230', '7890', 'Vivek_44', 'Valsad ,Gujarat', 1, '2023-11-27 21:36:09', '2023-11-27 21:36:09'),
(9, '202311280929boys.jpg', 'Pratham', '7841529630', '56489', 'pratham55', 'Rajkot , Gujarat', 1, '2023-11-27 22:29:25', '2023-11-27 22:29:25'),
(10, '202311280930girl.jpg', 'Vandana', '1230569874', '56204', 'vandana_99', 'Uttarpradesh', 1, '2023-11-27 22:30:16', '2023-11-27 22:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bringerlist`
--
ALTER TABLE `bringerlist`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contactno`
--
ALTER TABLE `contactno`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_gallery`
--
ALTER TABLE `my_gallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`orderhistoryid`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `orderreview`
--
ALTER TABLE `orderreview`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `stockcarrier`
--
ALTER TABLE `stockcarrier`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`uid`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bringerlist`
--
ALTER TABLE `bringerlist`
  MODIFY `bid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contactno`
--
ALTER TABLE `contactno`
  MODIFY `coid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `my_gallery`
--
ALTER TABLE `my_gallery`
  MODIFY `gid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `orderhistoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderreview`
--
ALTER TABLE `orderreview`
  MODIFY `reviewid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockcarrier`
--
ALTER TABLE `stockcarrier`
  MODIFY `scid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
