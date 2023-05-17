-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 05:40 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makelupr_ratefy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_users`
--

CREATE TABLE `bank_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `account_name` varchar(191) NOT NULL,
  `account_number` varchar(191) NOT NULL,
  `bank_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `longcode` varchar(191) DEFAULT NULL,
  `gateway` varchar(191) DEFAULT NULL,
  `active` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_users`
--

INSERT INTO `bank_users` (`id`, `users_id`, `account_name`, `account_number`, `bank_name`, `created_at`, `updated_at`, `bank_id`, `code`, `slug`, `longcode`, `gateway`, `active`) VALUES
(1, 24, 'victor femi odeyemi', '7064530382', 'PalmPay', '2023-05-04 21:27:18', '2023-05-04 21:27:18', 169, '999991', NULL, NULL, NULL, 'false'),
(5, 28, 'OLADOJA ADESHINA ADEOLA', '0121690965', 'Guaranty Trust Bank', '2023-05-05 19:41:40', '2023-05-05 19:41:40', 9, '058', NULL, NULL, NULL, 'false'),
(6, 30, 'victor femi odeyemi', '7064530382', 'PalmPay', '2023-05-05 21:29:29', '2023-05-05 21:29:29', 169, '999991', NULL, NULL, NULL, 'false'),
(7, 32, 'victor femi odeyemi', '7064530382', 'PalmPay', '2023-05-06 22:08:09', '2023-05-06 22:08:09', 169, '999991', NULL, NULL, NULL, 'false'),
(8, 33, 'ADEBAYO ADEWALE ADESOLA', '2265953619', 'Zenith Bank', '2023-05-08 13:55:29', '2023-05-08 13:55:29', 21, '057', NULL, NULL, NULL, 'false'),
(9, 37, 'Dauda Olawale Sikiru', '9063369572', 'Paycom', '2023-05-08 23:03:43', '2023-05-08 23:03:43', 171, '999992', NULL, NULL, NULL, 'false'),
(10, 43, 'AROGBESAN EMMANUEL BAMIDELE', '0079032592', 'Sterling Bank', '2023-05-12 08:50:27', '2023-05-12 08:51:01', 16, '232', NULL, NULL, NULL, 'false'),
(11, 28, 'OLADOJA ADESHINA ADEOLA', '0121690965', 'Guaranty Trust Bank', '2023-05-13 13:03:07', '2023-05-13 13:03:07', 9, '058', NULL, NULL, NULL, 'false'),
(12, 28, 'OLADOJA ADESHINA ADEOLA', '0121690965', 'Guaranty Trust Bank', '2023-05-13 13:03:09', '2023-05-13 13:03:09', 9, '058', NULL, NULL, NULL, 'false'),
(13, 30, 'Eyiwuoluwa Ruth Bamidele', '7045489688', 'PalmPay', '2023-05-13 14:23:15', '2023-05-13 14:23:15', 169, '999991', NULL, NULL, NULL, 'false'),
(14, 32, 'Damilare Samuel Olufemi', '2005872462', 'Kuda Bank', '2023-05-15 18:28:45', '2023-05-15 18:28:45', 67, '50211', NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `blog_social_media`
--

CREATE TABLE `blog_social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bsm_facebook` varchar(191) DEFAULT NULL,
  `bsm_instagram` varchar(191) DEFAULT NULL,
  `bsm_linkedin` varchar(191) DEFAULT NULL,
  `bsm_youtube` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_social_media`
--

INSERT INTO `blog_social_media` (`id`, `bsm_facebook`, `bsm_instagram`, `bsm_linkedin`, `bsm_youtube`, `created_at`, `updated_at`) VALUES
(1, 'https://facebook.com/ratefy', NULL, NULL, NULL, NULL, '2022-12-31 02:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `business_profile`
--

CREATE TABLE `business_profile` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `logo_path` varchar(191) NOT NULL,
  `business_name` varchar(191) NOT NULL,
  `category` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `linkedin` varchar(191) NOT NULL,
  `siteprofiles` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `business_profile`
--

INSERT INTO `business_profile` (`id`, `users_id`, `logo_path`, `business_name`, `category`, `description`, `linkedin`, `siteprofiles`) VALUES
(1, 28, '1684165651_gallery-1.jpg', 'Dev Adeola Properties', 'programming-others', 'Real estate development, or property development, is a business process, encompassing activities that range from the renovation and re-lease of existing buildings to the purchase of raw land and the sale of developed land or parcels to others. Real estate developers are the people and companies who coordinate all of these activities, converting ideas from paper to real property.[1] Real estate development is different from construction or housebuilding, although many developers also manage the construction process or engage in housebuilding.', 'https://www.linkedin.com/in/israel-oladoja/', 'https://www.linkedin.com/in/israel-oladoja/'),
(2, 32, '1684160763_new-DN-Logo2.png', 'Designnotch', 'graphic-designs-others', 'design', 'https://www.linkedin.com/in/mrfem/', 'https://www.instagram.com/femiivictorr/');

-- --------------------------------------------------------

--
-- Table structure for table `buyings`
--

CREATE TABLE `buyings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `wallets` varchar(191) NOT NULL,
  `available` int(11) NOT NULL DEFAULT 0,
  `capacity` double(8,2) NOT NULL,
  `currency` enum('USD','GBP','EUR') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selling_id` int(11) NOT NULL,
  `note` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Accept Payment', 2, '2023-01-01 19:19:20', '2023-01-13 00:50:14'),
(2, 'Currency Exchange', 1, '2023-01-01 19:52:28', '2023-01-12 20:58:41'),
(3, 'Payoneer', 10000, '2023-01-13 00:50:34', '2023-01-13 00:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `chat_histories`
--

CREATE TABLE `chat_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) NOT NULL,
  `history` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_subscriptions`
--

CREATE TABLE `chat_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('attended','attention') NOT NULL DEFAULT 'attention'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_subscriptions`
--

INSERT INTO `chat_subscriptions` (`id`, `user_id`, `session_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 28, 'D0LiwW4a5cl0lSdgEJlBZRKIGAU7a98CyLJFK9bXI7SihixMLliJjnDag8H3', '2023-05-09 20:43:02', '2023-05-13 18:11:06', 'attended'),
(2, 28, 'NWVNH5ifQHdOgYzqFj15r6NyDKgX7anSEgRuHHk8UkGhddfdAgheFXZM2w5z', '2023-05-09 20:46:10', '2023-05-13 18:17:29', 'attended'),
(3, 28, '0cUfo4lg9t19v11XBQ8gsT6QbSctl3vo8BuCjD4GrR6Tf1v0gqv5rTOY7Jlq', '2023-05-09 20:56:14', '2023-05-09 20:56:14', 'attention'),
(4, 28, 'VrG6Ry9CsErInobpcMmHs32O4VXn1ecZSfxnqLa8aIBgWylmX3ts5SN1lW4x', '2023-05-09 21:00:31', '2023-05-09 21:00:31', 'attention'),
(5, 28, 'r6c0HRFbEXPcphY0CRGoJdYIMoAsPNhGSlJYMdXuNlyizplgCt5aISJoMXTK', '2023-05-09 21:01:08', '2023-05-13 18:19:07', 'attended'),
(6, 28, 'bNwgZoIOhczw4GE9pXRDAU44aUeBpxk3RAQ7NWEuJd04uCjqKy8Q2zML7sEE', '2023-05-09 21:01:52', '2023-05-09 21:01:52', 'attention'),
(7, 28, 'mAovJhmLcVNpaQJcKp2wUTbMRmyIRUFQI3PeKudvLVzB8jHa6XbqjghCowB4', '2023-05-09 21:02:53', '2023-05-09 21:02:53', 'attention'),
(8, 28, 'F0Qy7SnN6QEoTfxm6C0PKyNezRzyKQt7P8VbOJ7qsniMcMudb9L1SibqUWxI', '2023-05-09 22:47:44', '2023-05-09 22:47:44', 'attention'),
(9, 32, 'nJJ4uMq4vtDDYEpZ08KoMJEJyEwovj12uEfHwdbxjn3tbMV4IlykLUChzj9W', '2023-05-09 23:01:52', '2023-05-09 23:01:52', 'attention'),
(10, 28, 'MpC9RMJ5TzAmkhVvOslmVkeWORnuWMVah8CsvFtJcfOQJ5NTEDfgjaqJU8gH', '2023-05-10 18:21:24', '2023-05-10 18:21:24', 'attention'),
(11, 32, '307r28txaLfMvWsuItULyJSDJc1JfwcGvI1hOaS14WXmYRBxXOQt63S0WP0v', '2023-05-10 21:41:10', '2023-05-13 18:17:48', 'attended'),
(12, 28, 'NP0ZkSnk5Jc4Pk65T2XN4AFeH1dsRPnfFB1J8mDkhx95MOF5KyYUrLrSgX7b', '2023-05-12 12:56:04', '2023-05-12 12:56:04', 'attention');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(191) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_items`
--

CREATE TABLE `exchange_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(191) NOT NULL,
  `sub_item` varchar(255) NOT NULL,
  `labels` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `percntage` double(8,2) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(191) NOT NULL,
  `currency` varchar(191) DEFAULT NULL,
  `seller_note` text DEFAULT NULL,
  `duration_cap` varchar(191) DEFAULT NULL,
  `duration` varchar(191) DEFAULT NULL,
  `confirmation_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exchange_items`
--

INSERT INTO `exchange_items` (`id`, `item`, `sub_item`, `labels`, `ordering`, `percntage`, `active`, `created_at`, `updated_at`, `image_path`, `currency`, `seller_note`, `duration_cap`, `duration`, `confirmation_note`) VALUES
(6, 'PayPal', 'Any amount', 'Fiverr', 3, 18.50, 1, '2023-01-17 18:42:36', '2023-05-13 22:16:08', '1673962956_2504802.png', NULL, '✅ PayPal email will be provided when you initiate an exchange transaction by clicking on the continue button below or requesting for it on WhatsApp.⌛After the PayPal email address has been linked to your Fiverr account, It takes about 2 minutes to receive the funds. 💬 You can choose to either continue the exchange on this platform or on WhatsApp. 💳 Proceed to withdraw the funds immediately after the order is initiated.', 'mins', '15', 'Kindly ask for PayPal email to link to your Fiverr account through the Chat.'),
(10, 'Skrill', 'Any amount', 'Transfer', 12, 9.00, 0, '2023-01-17 19:07:30', '2023-05-11 14:25:00', '1673964450_skrill 02.png', 'USD', 'good', 'Day', '6', 'good'),
(12, 'Cash App', '500 and more', 'Transfer', 10, 21.00, 0, '2023-02-01 17:53:59', '2023-05-04 14:39:31', '1675256039_Square_Cash_app_logo_on_ratefy.png', NULL, NULL, NULL, NULL, NULL),
(14, 'Wise', '$500 or more', 'Transfer', 8, 4.60, 0, '2023-02-02 18:38:35', '2023-05-06 21:43:22', '1675345115_Wise.png', NULL, NULL, NULL, NULL, NULL),
(15, 'Payoneer', '$500 or more', 'Transfer', 1, 3.70, 1, '2023-02-02 18:39:37', '2023-05-13 21:34:24', '1675345177_Payoneerr.png', 'USD', '⌛ It takes about 8 minutes to receive Payoneer transfer payment. \r\n&#13;&#10;\r\n💬 You can choose to either continue the exchange on this platform or on WhatsApp.\r\n&#13;&#10; \r\n✅ A payment tag and description will be provided when you initiate an exchange transaction by clicking on the continue button below.\r\n&#13;&#10;\r\n💳 Proceed to make the payment immediately after the order is initiated.', 'mins', '8', 'Pay to this account:👇\r\nPayoneer tag: Textxony@gmail.com\r\nPurpose of payment: Graphic Design Project'),
(19, 'Payoneer', '$499 or less', 'Transfer', 2, 4.30, 1, '2023-02-28 03:08:45', '2023-05-13 21:35:43', '1677535725_Payoneerr.png', NULL, '⌛ It takes about 8 minutes to receive Payoneer transfer payment. \r\n&#13;&#10;\r\n💬 You can choose to either continue the exchange on this platform or on WhatsApp.\r\n&#13;&#10; \r\n✅ A payment tag and description will be provided when you initiate an exchange transaction by clicking on the continue button below.\r\n&#13;&#10;\r\n💳 Proceed to make the payment immediately after the order is initiated.', 'mins', '8', 'Pay to this account:👇\r\nPayoneer tag: Textxony@gmail.com\r\nPurpose of payment: Graphic Design Project'),
(20, 'Payoneer', 'Any amount', 'Payment Request', 6, 12.00, 1, '2023-02-28 03:11:49', '2023-05-14 17:27:00', '1677535909_Payoneerr.png', NULL, '✅It is advisable to have delivered the service offered to the payer before receiving payment through Payoneer. The following details of the payer are to be provided to process a Payoneer payment request; -Email Address -Price -Company Name -Website URL -Contact first name -Contact Last name  -Country and -Description.⌛After the payment has been made, It takes about 10 minutes to confirm the payment and about 2 days for the funds to be deposited. 💬 You can choose to either start the process on this platform or on WhatsApp. 💳 Proceed to provide the payer\'s details listed above immediately after the order is initiated.', 'day', '2', 'Kindly proceed to provide the payer\'s details as listed on the previous page.  You can ask your payer if you don\'t know them. After that, I will create an invoice with other details and request the payment. I will send you the Payment link and keep you updated when the payment is made and deposited to the balance.'),
(21, 'Payoneer', 'Any amount', 'Fiverr (-$5)', 7, 4.30, 1, '2023-02-28 03:15:35', '2023-05-14 16:55:29', '1677536135_Payoneerr.png', NULL, '✅ Payoneer is linked to Fiverr by signing in, so you will have to send your Fiverr login details to the admin to link and withdraw the funds. ⌛After the Payoneer has been linked to your Fiverr account, It takes about 5 minutes to receive the funds. 💬 You can choose to either continue the exchange on this platform or on WhatsApp. 💳 Payoneer charges a $3 fee on every withdrawal and Ratefy charges a one-time $5 service fee for providing a Payoneer account to use.', 'mins', '30', 'Kindly provide your email and Fiverr account login details through Chat.'),
(22, 'PayPal', 'Any amount', 'Friends & Family', 4, 19.50, 1, '2023-02-28 03:31:23', '2023-05-13 22:24:33', '1677537083_2504802.png', NULL, '✅ PayPal email address and \'purpose of payment\' to use will be provided when you initiate an exchange transaction by clicking on the continue button below or requesting it on WhatsApp.⌛After the payment has been made, It takes about 5 minutes to confirm the payment. 💬 You can choose to either continue the exchange on this platform or on WhatsApp. 💳 Proceed to make the payment immediately after the order is initiated.', 'mins', '5', 'PayPal email address and \'purpose of payment\' to pay through the Chat.'),
(23, '2 Cash App', '$499 or less', 'Transfer', 11, 23.00, 0, '2023-02-28 03:53:17', '2023-05-04 14:37:57', '1677538397_Square_Cash_app_logo_on_ratefy.png', NULL, NULL, NULL, NULL, NULL),
(24, '2 Wise', '$499 or less', 'Transfer', 9, 6.00, 0, '2023-02-28 03:58:47', '2023-05-06 21:43:21', '1677538727_Wise.png', NULL, NULL, NULL, NULL, NULL),
(25, 'PayPal', 'Any amount', 'Goods & Services', 5, 20.00, 1, '2023-03-23 13:23:15', '2023-05-13 22:35:37', '1679563395_2504802.png', NULL, '✅ PayPal email address and \'purpose of payment\' to use will be provided when you initiate an exchange transaction by clicking on the continue button below or requesting it on WhatsApp.⌛After the payment has been made, It takes about 4 minutes to confirm the payment. 💬 You can choose to either continue the exchange on this platform or on WhatsApp. 💳 Proceed to make the payment immediately after the order is initiated.', 'mins', '4', 'PayPal email address and \'purpose of payment\' to pay through the Chat.');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate_decimal` double NOT NULL,
  `rate_normal` varchar(191) NOT NULL,
  `assets_id_from` varchar(191) NOT NULL,
  `assets_id_to` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `compare` varchar(191) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exchange_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`id`, `rate_decimal`, `rate_normal`, `assets_id_from`, `assets_id_to`, `status`, `compare`, `ordering`, `created_at`, `updated_at`, `exchange_time`) VALUES
(1, 746.42101094, '746', 'USDT', 'NGN', 1, NULL, 10000, '2023-01-04 05:41:05', '2023-01-04 05:41:05', '2023-01-04 05:41:00'),
(2, 746.50499869144, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 05:52:34', '2023-01-04 05:52:34', '2023-01-04 05:52:28'),
(3, 747.47946190183, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 05:58:02', '2023-01-04 05:58:02', '2023-01-04 05:57:51'),
(4, 748.41316989738, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 11:30:24', '2023-01-04 11:30:24', '2023-01-04 11:30:22'),
(5, 748.98819591261, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 11:41:42', '2023-01-04 11:41:42', '2023-01-04 11:41:38'),
(6, 749.18885792077, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 11:42:33', '2023-01-04 11:42:33', '2023-01-04 11:42:30'),
(7, 749.13172103487, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 11:46:23', '2023-01-04 11:46:23', '2023-01-04 11:46:20'),
(8, 749.3711560253, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-04 11:50:06', '2023-01-04 11:50:06', '2023-01-04 11:50:03'),
(9, 747.58150053591, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-05 16:45:02', '2023-01-05 16:45:02', '2023-01-05 16:45:00'),
(10, 742.33978939451, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-06 14:55:01', '2023-01-06 14:55:01', '2023-01-06 14:55:00'),
(11, 745.35221307257, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-09 18:06:45', '2023-01-09 18:06:45', '2023-01-09 18:06:35'),
(12, 745.35221307257, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-09 18:07:14', '2023-01-09 18:07:14', '2023-01-09 18:06:44'),
(13, 745.10419570574, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-10 20:31:06', '2023-01-10 20:31:06', '2023-01-10 20:31:02'),
(14, 746.11683615819, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-11 21:13:46', '2023-01-11 21:13:46', '2023-01-11 21:12:35'),
(15, 747.3540521978, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-12 15:15:29', '2023-01-12 15:15:29', '2023-01-12 15:14:29'),
(16, 748.17541425819, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-14 02:24:48', '2023-01-14 02:24:48', '2023-01-14 02:24:43'),
(17, 748.75183290708, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-14 04:47:53', '2023-01-14 04:47:53', '2023-01-14 04:47:31'),
(18, 745.60884173298, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-16 05:50:21', '2023-01-16 05:50:21', '2023-01-16 05:50:09'),
(19, 746.41657489606, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-16 18:18:59', '2023-01-16 18:18:59', '2023-01-16 18:18:54'),
(20, 746.99142266621, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-16 19:10:57', '2023-01-16 19:10:57', '2023-01-16 19:10:50'),
(21, 746.99744429882, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-16 19:11:17', '2023-01-16 19:11:17', '2023-01-16 19:10:55'),
(22, 747.92269110686, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-17 14:09:30', '2023-01-17 14:09:30', '2023-01-17 14:09:26'),
(23, 748.08747375787, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-18 03:17:47', '2023-01-18 03:17:47', '2023-01-18 03:17:35'),
(24, 746.85508066799, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-18 04:36:35', '2023-01-18 04:36:35', '2023-01-18 04:36:31'),
(25, 747.2346348031, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-18 16:11:04', '2023-01-18 16:11:04', '2023-01-18 16:10:59'),
(26, 746.85545252226, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-18 23:52:33', '2023-01-18 23:52:33', '2023-01-18 23:52:29'),
(27, 747.49747076421, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-20 02:05:23', '2023-01-20 02:05:23', '2023-01-20 02:05:20'),
(28, 745.20600978337, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-20 14:42:10', '2023-01-20 14:42:10', '2023-01-20 14:42:06'),
(29, 745.69240506329, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-20 20:30:45', '2023-01-20 20:30:45', '2023-01-20 20:30:43'),
(30, 745.51722438212, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-20 20:35:31', '2023-01-20 20:35:31', '2023-01-20 20:35:29'),
(31, 745.6981937854, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-20 20:40:30', '2023-01-20 20:40:30', '2023-01-20 20:40:28'),
(32, 742.94443905985, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-20 23:00:10', '2023-01-20 23:00:10', '2023-01-20 23:00:08'),
(33, 743.94885262621, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 02:00:49', '2023-01-21 02:00:49', '2023-01-21 02:00:48'),
(34, 741.0274763564, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 05:00:44', '2023-01-21 05:00:44', '2023-01-21 05:00:42'),
(35, 740.3, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 08:00:16', '2023-01-21 08:00:16', '2023-01-21 08:00:15'),
(36, 745.46507745267, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 11:00:36', '2023-01-21 11:00:36', '2023-01-21 11:00:35'),
(37, 743.88994225217, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 14:00:50', '2023-01-21 14:00:50', '2023-01-21 14:00:48'),
(38, 744.9854303087, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 17:00:22', '2023-01-21 17:00:22', '2023-01-21 17:00:20'),
(39, 742.69841332804, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 20:00:19', '2023-01-21 20:00:19', '2023-01-21 20:00:17'),
(40, 743.51380231523, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-21 23:00:50', '2023-01-21 23:00:50', '2023-01-21 23:00:49'),
(41, 742.45667351129, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 02:00:33', '2023-01-22 02:00:33', '2023-01-22 02:00:31'),
(42, 742.00148883375, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 05:00:24', '2023-01-22 05:00:24', '2023-01-22 05:00:22'),
(43, 742.52481996523, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 08:00:04', '2023-01-22 08:00:04', '2023-01-22 08:00:02'),
(44, 743.72429454448, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 11:00:29', '2023-01-22 11:00:29', '2023-01-22 11:00:26'),
(45, 745.9312293578, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 14:00:33', '2023-01-22 14:00:33', '2023-01-22 14:00:32'),
(46, 744.08017160197, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 17:00:22', '2023-01-22 17:00:22', '2023-01-22 17:00:20'),
(47, 743.35710367526, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 20:00:22', '2023-01-22 20:00:22', '2023-01-22 20:00:20'),
(48, 743.68153821981, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-22 23:00:33', '2023-01-22 23:00:33', '2023-01-22 23:00:32'),
(49, 741.86472266244, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 02:00:05', '2023-01-23 02:00:05', '2023-01-23 02:00:04'),
(50, 742.37101273499, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 05:00:45', '2023-01-23 05:00:45', '2023-01-23 05:00:43'),
(51, 740.15693367786, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 08:00:18', '2023-01-23 08:00:18', '2023-01-23 08:00:16'),
(52, 743.32730750837, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 11:00:42', '2023-01-23 11:00:42', '2023-01-23 11:00:40'),
(53, 744.64626715768, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 14:00:07', '2023-01-23 14:00:07', '2023-01-23 14:00:05'),
(54, 740.91492537313, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 17:00:50', '2023-01-23 17:00:50', '2023-01-23 17:00:49'),
(55, 743.98301813219, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 20:00:26', '2023-01-23 20:00:26', '2023-01-23 20:00:24'),
(56, 743.01444652908, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-23 23:00:18', '2023-01-23 23:00:18', '2023-01-23 23:00:16'),
(57, 743.96677667767, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 02:00:17', '2023-01-24 02:00:17', '2023-01-24 02:00:16'),
(58, 743.23333333333, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 05:00:22', '2023-01-24 05:00:22', '2023-01-24 05:00:20'),
(59, 742.74881474978, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 08:00:37', '2023-01-24 08:00:37', '2023-01-24 08:00:36'),
(60, 743.13258237116, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 11:00:06', '2023-01-24 11:00:06', '2023-01-24 11:00:04'),
(61, 746.29474248927, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 14:00:47', '2023-01-24 14:00:47', '2023-01-24 14:00:45'),
(62, 744.81815, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 17:00:19', '2023-01-24 17:00:19', '2023-01-24 17:00:18'),
(63, 746.79209533128, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 20:00:48', '2023-01-24 20:00:48', '2023-01-24 20:00:46'),
(64, 747.95755834829, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-24 23:00:34', '2023-01-24 23:00:34', '2023-01-24 23:00:33'),
(65, 748.30795425006, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 02:00:40', '2023-01-25 02:00:40', '2023-01-25 02:00:39'),
(66, 747.60680851064, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 05:00:17', '2023-01-25 05:00:17', '2023-01-25 05:00:16'),
(67, 746.37072135785, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 08:00:32', '2023-01-25 08:00:32', '2023-01-25 08:00:30'),
(68, 745.80709459459, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 11:00:36', '2023-01-25 11:00:36', '2023-01-25 11:00:35'),
(69, 746.3832357637, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 14:00:23', '2023-01-25 14:00:23', '2023-01-25 14:00:22'),
(70, 747.46404230317, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 17:00:16', '2023-01-25 17:00:16', '2023-01-25 17:00:15'),
(71, 749.67297147605, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 20:00:16', '2023-01-25 20:00:16', '2023-01-25 20:00:14'),
(72, 748.4814000814, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-25 23:00:42', '2023-01-25 23:00:42', '2023-01-25 23:00:40'),
(73, 748.77983301615, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 02:00:42', '2023-01-26 02:00:42', '2023-01-26 02:00:40'),
(74, 748.20948180816, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 05:00:08', '2023-01-26 05:00:08', '2023-01-26 05:00:06'),
(75, 745.63293556086, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 08:00:30', '2023-01-26 08:00:30', '2023-01-26 08:00:28'),
(76, 749.04470494735, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 11:00:22', '2023-01-26 11:00:22', '2023-01-26 11:00:20'),
(77, 748.71408450704, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 14:00:06', '2023-01-26 14:00:06', '2023-01-26 14:00:04'),
(78, 749.57231129864, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 17:00:42', '2023-01-26 17:00:42', '2023-01-26 17:00:41'),
(79, 748.03423843869, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 20:00:31', '2023-01-26 20:00:31', '2023-01-26 20:00:29'),
(80, 747.72834101382, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-26 23:00:41', '2023-01-26 23:00:41', '2023-01-26 23:00:39'),
(81, 746.2534477906, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 02:00:09', '2023-01-27 02:00:09', '2023-01-27 02:00:07'),
(82, 744.87084793273, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 05:00:09', '2023-01-27 05:00:09', '2023-01-27 05:00:07'),
(83, 742.55, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 08:00:05', '2023-01-27 08:00:05', '2023-01-27 08:00:04'),
(84, 744.56568166555, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 11:00:36', '2023-01-27 11:00:36', '2023-01-27 11:00:34'),
(85, 746.95026112907, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 14:00:42', '2023-01-27 14:00:42', '2023-01-27 14:00:41'),
(86, 745.57203225806, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 17:00:23', '2023-01-27 17:00:23', '2023-01-27 17:00:21'),
(87, 745.75007488767, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 20:00:30', '2023-01-27 20:00:30', '2023-01-27 20:00:28'),
(88, 744.9657000993, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-27 23:00:07', '2023-01-27 23:00:07', '2023-01-27 23:00:05'),
(89, 745.95219206681, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 02:00:11', '2023-01-28 02:00:11', '2023-01-28 02:00:09'),
(90, 743.85400576369, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 05:00:06', '2023-01-28 05:00:06', '2023-01-28 05:00:05'),
(91, 744.9, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 08:00:24', '2023-01-28 08:00:24', '2023-01-28 08:00:22'),
(92, 746.81483216237, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 11:00:13', '2023-01-28 11:00:13', '2023-01-28 11:00:11'),
(93, 746.20066115702, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 14:00:11', '2023-01-28 14:00:11', '2023-01-28 14:00:09'),
(94, 748.1540436949, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 17:00:19', '2023-01-28 17:00:19', '2023-01-28 17:00:17'),
(95, 746.86721447543, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 20:00:26', '2023-01-28 20:00:26', '2023-01-28 20:00:24'),
(96, 747.18841221887, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-28 23:00:46', '2023-01-28 23:00:46', '2023-01-28 23:00:44'),
(97, 746.62248308794, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 02:00:15', '2023-01-29 02:00:15', '2023-01-29 02:00:13'),
(98, 747.83838945827, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 05:00:26', '2023-01-29 05:00:26', '2023-01-29 05:00:24'),
(99, 747.37863568216, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 08:00:13', '2023-01-29 08:00:13', '2023-01-29 08:00:11'),
(100, 746.6990248227, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 11:00:14', '2023-01-29 11:00:14', '2023-01-29 11:00:12'),
(101, 748.73060538117, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 14:00:07', '2023-01-29 14:00:07', '2023-01-29 14:00:05'),
(102, 749.45059288538, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 17:00:29', '2023-01-29 17:00:29', '2023-01-29 17:00:27'),
(103, 748.93333333333, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 20:00:27', '2023-01-29 20:00:27', '2023-01-29 20:00:26'),
(104, 748.42424500213, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-29 23:00:47', '2023-01-29 23:00:47', '2023-01-29 23:00:46'),
(105, 748.89669393889, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 02:00:21', '2023-01-30 02:00:21', '2023-01-30 02:00:19'),
(106, 749.34518779343, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 05:00:32', '2023-01-30 05:00:32', '2023-01-30 05:00:30'),
(107, 747.96351791531, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 08:00:11', '2023-01-30 08:00:11', '2023-01-30 08:00:09'),
(108, 748.64027704717, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 11:00:37', '2023-01-30 11:00:37', '2023-01-30 11:00:35'),
(109, 748.66479674797, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 14:00:48', '2023-01-30 14:00:48', '2023-01-30 14:00:46'),
(110, 750.68218198136, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 17:00:48', '2023-01-30 17:00:48', '2023-01-30 17:00:46'),
(111, 752.06826525099, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 20:00:11', '2023-01-30 20:00:11', '2023-01-30 20:00:10'),
(112, 751.41487238979, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-30 23:00:28', '2023-01-30 23:00:28', '2023-01-30 23:00:27'),
(113, 752.15275574328, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 02:00:29', '2023-01-31 02:00:29', '2023-01-31 02:00:28'),
(114, 751.67513542795, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 05:00:11', '2023-01-31 05:00:11', '2023-01-31 05:00:09'),
(115, 749.12294617564, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 08:00:26', '2023-01-31 08:00:26', '2023-01-31 08:00:24'),
(116, 751.48737333119, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 11:00:45', '2023-01-31 11:00:45', '2023-01-31 11:00:43'),
(117, 753.84047939671, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 14:00:25', '2023-01-31 14:00:25', '2023-01-31 14:00:23'),
(118, 753.54260820686, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 17:00:13', '2023-01-31 17:00:13', '2023-01-31 17:00:12'),
(119, 752.40056697977, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 20:00:40', '2023-01-31 20:00:40', '2023-01-31 20:00:38'),
(120, 749.75943358596, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-01-31 23:00:28', '2023-01-31 23:00:28', '2023-01-31 23:00:26'),
(121, 749.88142785821, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 02:00:47', '2023-02-01 02:00:47', '2023-02-01 02:00:45'),
(122, 749.17319305916, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 05:00:17', '2023-02-01 05:00:17', '2023-02-01 05:00:16'),
(123, 746.71266308519, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 08:00:13', '2023-02-01 08:00:13', '2023-02-01 08:00:12'),
(124, 748.09522513944, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 11:00:01', '2023-02-01 11:00:01', '2023-02-01 11:00:00'),
(125, 746.93121387283, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 14:00:07', '2023-02-01 14:00:07', '2023-02-01 14:00:06'),
(126, 748.58319783198, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 17:00:02', '2023-02-01 17:00:02', '2023-02-01 17:00:01'),
(127, 746.3393591933, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 20:00:44', '2023-02-01 20:00:44', '2023-02-01 20:00:42'),
(128, 746.98913234005, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-01 23:00:08', '2023-02-01 23:00:08', '2023-02-01 23:00:06'),
(129, 745.08565482699, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 02:00:45', '2023-02-02 02:00:45', '2023-02-02 02:00:43'),
(130, 745.15, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 05:00:49', '2023-02-02 05:00:49', '2023-02-02 05:00:48'),
(131, 745.35517609392, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 08:00:19', '2023-02-02 08:00:19', '2023-02-02 08:00:17'),
(132, 747.03236289777, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 11:00:28', '2023-02-02 11:00:28', '2023-02-02 11:00:26'),
(133, 748.09719087188, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 14:00:36', '2023-02-02 14:00:36', '2023-02-02 14:00:34'),
(134, 747.51518550475, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 17:00:06', '2023-02-02 17:00:06', '2023-02-02 17:00:05'),
(135, 747.95613373339, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 20:00:04', '2023-02-02 20:00:04', '2023-02-02 20:00:02'),
(136, 748.50219092332, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-02 23:00:03', '2023-02-02 23:00:03', '2023-02-02 23:00:01'),
(137, 746.15062739631, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 02:00:31', '2023-02-03 02:00:31', '2023-02-03 02:00:29'),
(138, 748.08617332955, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 05:00:23', '2023-02-03 05:00:23', '2023-02-03 05:00:22'),
(139, 745.22672981402, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 08:00:13', '2023-02-03 08:00:13', '2023-02-03 08:00:11'),
(140, 747.8852498787, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 11:00:16', '2023-02-03 11:00:16', '2023-02-03 11:00:15'),
(141, 747.31660591923, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 14:00:51', '2023-02-03 14:00:51', '2023-02-03 14:00:49'),
(142, 746.2091954023, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 17:00:06', '2023-02-03 17:00:06', '2023-02-03 17:00:04'),
(143, 742.26068193926, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 20:00:05', '2023-02-03 20:00:05', '2023-02-03 20:00:03'),
(144, 744.41114369501, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-03 23:00:22', '2023-02-03 23:00:22', '2023-02-03 23:00:20'),
(145, 744.85487882653, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 02:00:08', '2023-02-04 02:00:08', '2023-02-04 02:00:07'),
(146, 745.73952211818, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 05:00:44', '2023-02-04 05:00:44', '2023-02-04 05:00:42'),
(147, 744.70974401321, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 08:00:18', '2023-02-04 08:00:18', '2023-02-04 08:00:16'),
(148, 746.22072072072, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 11:00:49', '2023-02-04 11:00:49', '2023-02-04 11:00:47'),
(149, 745.92687930634, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 14:00:26', '2023-02-04 14:00:26', '2023-02-04 14:00:25'),
(150, 747.58190107765, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 17:00:30', '2023-02-04 17:00:30', '2023-02-04 17:00:28'),
(151, 748.47313107511, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 20:00:36', '2023-02-04 20:00:36', '2023-02-04 20:00:34'),
(152, 746.90330327934, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-04 23:00:41', '2023-02-04 23:00:41', '2023-02-04 23:00:39'),
(153, 747.26033826165, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 02:00:07', '2023-02-05 02:00:07', '2023-02-05 02:00:05'),
(154, 746.96237204377, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 05:00:41', '2023-02-05 05:00:41', '2023-02-05 05:00:39'),
(155, 746.02816254964, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 08:00:09', '2023-02-05 08:00:09', '2023-02-05 08:00:06'),
(156, 746.81875761267, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 11:00:05', '2023-02-05 11:00:05', '2023-02-05 11:00:03'),
(157, 747.51039398139, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 14:00:03', '2023-02-05 14:00:03', '2023-02-05 14:00:01'),
(158, 748.09361217163, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 17:00:35', '2023-02-05 17:00:35', '2023-02-05 17:00:33'),
(159, 747.75458290422, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 20:00:05', '2023-02-05 20:00:05', '2023-02-05 20:00:03'),
(160, 747.25141373746, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-05 23:00:30', '2023-02-05 23:00:30', '2023-02-05 23:00:28'),
(161, 746.64995832639, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 02:00:03', '2023-02-06 02:00:03', '2023-02-06 02:00:01'),
(162, 747.99916097327, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 05:00:47', '2023-02-06 05:00:47', '2023-02-06 05:00:45'),
(163, 746.15371812081, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 08:00:31', '2023-02-06 08:00:31', '2023-02-06 08:00:29'),
(164, 744.03620889803, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 11:00:47', '2023-02-06 11:00:47', '2023-02-06 11:00:46'),
(165, 745.87356932153, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 14:00:05', '2023-02-06 14:00:05', '2023-02-06 14:00:03'),
(166, 745.45128685073, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 17:00:31', '2023-02-06 17:00:31', '2023-02-06 17:00:29'),
(167, 746.43705616527, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 20:00:01', '2023-02-06 20:00:01', '2023-02-06 20:00:00'),
(168, 745.9195781282, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-06 23:00:07', '2023-02-06 23:00:07', '2023-02-06 23:00:06'),
(169, 746.67119665597, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 02:00:38', '2023-02-07 02:00:38', '2023-02-07 02:00:36'),
(170, 745.58387774594, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 05:00:48', '2023-02-07 05:00:48', '2023-02-07 05:00:47'),
(171, 746.03921568627, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 08:00:29', '2023-02-07 08:00:29', '2023-02-07 08:00:27'),
(172, 746.38193315266, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 11:00:17', '2023-02-07 11:00:17', '2023-02-07 11:00:15'),
(173, 746.63931168202, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 14:00:47', '2023-02-07 14:00:47', '2023-02-07 14:00:45'),
(174, 747.23723739083, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 17:00:46', '2023-02-07 17:00:46', '2023-02-07 17:00:44'),
(175, 746.94245408067, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 20:00:14', '2023-02-07 20:00:14', '2023-02-07 20:00:12'),
(176, 748.48815789474, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-07 23:00:46', '2023-02-07 23:00:46', '2023-02-07 23:00:45'),
(177, 747.07550284478, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 02:00:35', '2023-02-08 02:00:35', '2023-02-08 02:00:33'),
(178, 747.97840984257, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 05:00:44', '2023-02-08 05:00:44', '2023-02-08 05:00:42'),
(179, 747.55432098765, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 08:00:29', '2023-02-08 08:00:29', '2023-02-08 08:00:27'),
(180, 747.29185587364, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 11:00:35', '2023-02-08 11:00:35', '2023-02-08 11:00:33'),
(181, 748.35534062237, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 14:00:19', '2023-02-08 14:00:19', '2023-02-08 14:00:17'),
(182, 748.26517363315, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 17:00:13', '2023-02-08 17:00:13', '2023-02-08 17:00:12'),
(183, 747.41706263499, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 20:00:29', '2023-02-08 20:00:29', '2023-02-08 20:00:27'),
(184, 747.43716488523, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-08 23:00:43', '2023-02-08 23:00:43', '2023-02-08 23:00:42'),
(185, 746.9506147541, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 02:00:18', '2023-02-09 02:00:18', '2023-02-09 02:00:16'),
(186, 745.6430609699, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 05:00:39', '2023-02-09 05:00:39', '2023-02-09 05:00:37'),
(187, 746.69955595027, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 08:00:13', '2023-02-09 08:00:13', '2023-02-09 08:00:10'),
(188, 748.05853493867, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 11:00:45', '2023-02-09 11:00:45', '2023-02-09 11:00:44'),
(189, 748.92505709625, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 14:00:13', '2023-02-09 14:00:13', '2023-02-09 14:00:10'),
(190, 747.41024042743, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 17:00:21', '2023-02-09 17:00:21', '2023-02-09 17:00:20'),
(191, 745.86980082015, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 20:00:06', '2023-02-09 20:00:06', '2023-02-09 20:00:05'),
(192, 747.55344988104, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-09 23:00:08', '2023-02-09 23:00:08', '2023-02-09 23:00:06'),
(193, 747.73097603741, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 02:00:14', '2023-02-10 02:00:14', '2023-02-10 02:00:12'),
(194, 748.53931502972, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 05:00:20', '2023-02-10 05:00:20', '2023-02-10 05:00:18'),
(195, 749.24897159647, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 08:00:27', '2023-02-10 08:00:27', '2023-02-10 08:00:24'),
(196, 749.23867623604, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 11:00:15', '2023-02-10 11:00:15', '2023-02-10 11:00:12'),
(197, 748.51831007514, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 14:00:17', '2023-02-10 14:00:17', '2023-02-10 14:00:16'),
(198, 750.66915168641, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 17:00:48', '2023-02-10 17:00:48', '2023-02-10 17:00:47'),
(199, 748.98080240722, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 20:00:48', '2023-02-10 20:00:48', '2023-02-10 20:00:46'),
(200, 748.81982022472, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-10 23:00:49', '2023-02-10 23:00:49', '2023-02-10 23:00:47'),
(201, 748.47070884872, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 02:00:14', '2023-02-11 02:00:14', '2023-02-11 02:00:12'),
(202, 749.03209876543, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 05:00:48', '2023-02-11 05:00:48', '2023-02-11 05:00:47'),
(203, 748.1514973262, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 08:00:50', '2023-02-11 08:00:50', '2023-02-11 08:00:49'),
(204, 749.37277490721, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 11:00:18', '2023-02-11 11:00:18', '2023-02-11 11:00:16'),
(205, 748.50101860053, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 14:00:51', '2023-02-11 14:00:51', '2023-02-11 14:00:49'),
(206, 751.766, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 17:00:29', '2023-02-11 17:00:29', '2023-02-11 17:00:27'),
(207, 751.54443168772, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 20:00:48', '2023-02-11 20:00:48', '2023-02-11 20:00:46'),
(208, 750.21199314677, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-11 23:00:44', '2023-02-11 23:00:44', '2023-02-11 23:00:42'),
(209, 749.85767366721, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 02:00:04', '2023-02-12 02:00:04', '2023-02-12 02:00:02'),
(210, 750.76433589829, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 05:00:20', '2023-02-12 05:00:20', '2023-02-12 05:00:18'),
(211, 752.7, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 08:00:17', '2023-02-12 08:00:17', '2023-02-12 08:00:16'),
(212, 751.49829031177, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 11:00:15', '2023-02-12 11:00:15', '2023-02-12 11:00:13'),
(213, 751.40125932836, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 14:00:17', '2023-02-12 14:00:17', '2023-02-12 14:00:15'),
(214, 751.58247933884, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 17:00:16', '2023-02-12 17:00:16', '2023-02-12 17:00:15'),
(215, 751.34476623914, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 20:00:26', '2023-02-12 20:00:26', '2023-02-12 20:00:24'),
(216, 749.55214536296, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-12 23:00:44', '2023-02-12 23:00:44', '2023-02-12 23:00:42'),
(217, 750.54677483182, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 02:00:34', '2023-02-13 02:00:34', '2023-02-13 02:00:33'),
(218, 750.82786610879, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 05:00:01', '2023-02-13 05:00:01', '2023-02-13 05:00:00'),
(219, 750.01720629047, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 08:00:51', '2023-02-13 08:00:51', '2023-02-13 08:00:49'),
(220, 751.19633195782, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 11:00:19', '2023-02-13 11:00:19', '2023-02-13 11:00:18'),
(221, 751.17990519722, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 14:00:19', '2023-02-13 14:00:19', '2023-02-13 14:00:17'),
(222, 752.75310319501, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 17:00:13', '2023-02-13 17:00:13', '2023-02-13 17:00:11'),
(223, 753.67754503183, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 20:00:08', '2023-02-13 20:00:08', '2023-02-13 20:00:06'),
(224, 751.14807933718, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 21:04:44', '2023-02-13 21:04:44', '2023-02-13 21:04:34'),
(225, 751.3, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-13 23:00:39', '2023-02-13 23:00:39', '2023-02-13 23:00:37'),
(226, 753.22500824085, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 02:00:48', '2023-02-14 02:00:48', '2023-02-14 02:00:47'),
(227, 752.85217391304, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 03:18:05', '2023-02-14 03:18:05', '2023-02-14 03:18:00'),
(228, 752.38689994216, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 05:00:11', '2023-02-14 05:00:11', '2023-02-14 05:00:09'),
(229, 751.62749073469, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 08:00:50', '2023-02-14 08:00:50', '2023-02-14 08:00:49'),
(230, 752.21430451953, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 11:00:35', '2023-02-14 11:00:35', '2023-02-14 11:00:33'),
(231, 751.78355, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 14:00:11', '2023-02-14 14:00:11', '2023-02-14 14:00:09'),
(232, 752.74781010057, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 17:00:05', '2023-02-14 17:00:05', '2023-02-14 17:00:03'),
(233, 755.79624325218, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 20:00:28', '2023-02-14 20:00:28', '2023-02-14 20:00:26'),
(234, 753.70195237074, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-14 23:00:35', '2023-02-14 23:00:35', '2023-02-14 23:00:33'),
(235, 753.59482684294, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 02:00:08', '2023-02-15 02:00:08', '2023-02-15 02:00:06'),
(236, 753.67595500352, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 05:00:30', '2023-02-15 05:00:30', '2023-02-15 05:00:28'),
(237, 754.47838196286, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 08:00:15', '2023-02-15 08:00:15', '2023-02-15 08:00:13'),
(238, 755.37579031613, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 11:00:50', '2023-02-15 11:00:50', '2023-02-15 11:00:48'),
(239, 755.42373417722, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 14:00:14', '2023-02-15 14:00:14', '2023-02-15 14:00:12'),
(240, 757.1447012909, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 17:00:38', '2023-02-15 17:00:38', '2023-02-15 17:00:36'),
(241, 759.79343106851, '759', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 20:00:14', '2023-02-15 20:00:14', '2023-02-15 20:00:12'),
(242, 757.46299045599, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-15 23:00:31', '2023-02-15 23:00:31', '2023-02-15 23:00:29'),
(243, 756.45241549022, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 02:00:51', '2023-02-16 02:00:51', '2023-02-16 02:00:49'),
(244, 755.86088840737, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 05:00:11', '2023-02-16 05:00:11', '2023-02-16 05:00:08'),
(245, 757.4, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 08:00:36', '2023-02-16 08:00:36', '2023-02-16 08:00:34'),
(246, 759.46221261725, '759', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 11:00:20', '2023-02-16 11:00:20', '2023-02-16 11:00:18'),
(247, 754.2431372549, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 14:00:35', '2023-02-16 14:00:35', '2023-02-16 14:00:33'),
(248, 757.52066354795, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 17:00:42', '2023-02-16 17:00:42', '2023-02-16 17:00:41'),
(249, 756.7181561086, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 20:00:48', '2023-02-16 20:00:48', '2023-02-16 20:00:47'),
(250, 756.26102124068, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-16 23:00:19', '2023-02-16 23:00:19', '2023-02-16 23:00:17'),
(251, 754.08645432912, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 02:00:38', '2023-02-17 02:00:38', '2023-02-17 02:00:36'),
(252, 755.64184483812, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 05:00:42', '2023-02-17 05:00:42', '2023-02-17 05:00:41'),
(253, 753.87835820896, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 08:00:37', '2023-02-17 08:00:37', '2023-02-17 08:00:35'),
(254, 757.99019607843, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 11:00:19', '2023-02-17 11:00:19', '2023-02-17 11:00:18'),
(255, 757.99573488015, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 14:00:08', '2023-02-17 14:00:08', '2023-02-17 14:00:04'),
(256, 758.0810212766, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 17:00:39', '2023-02-17 17:00:39', '2023-02-17 17:00:37'),
(257, 758.50509761388, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 20:00:48', '2023-02-17 20:00:48', '2023-02-17 20:00:47'),
(258, 757.24059607135, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-17 23:00:14', '2023-02-17 23:00:14', '2023-02-17 23:00:12'),
(259, 758.08119891008, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 02:00:24', '2023-02-18 02:00:24', '2023-02-18 02:00:23'),
(260, 756.53977086743, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 05:00:11', '2023-02-18 05:00:11', '2023-02-18 05:00:10'),
(261, 757.95959186007, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 08:00:03', '2023-02-18 08:00:03', '2023-02-18 08:00:01'),
(262, 758.19028268551, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 11:00:30', '2023-02-18 11:00:30', '2023-02-18 11:00:29'),
(263, 758.88917280208, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 14:00:27', '2023-02-18 14:00:27', '2023-02-18 14:00:25'),
(264, 758.12366449711, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 17:00:21', '2023-02-18 17:00:21', '2023-02-18 17:00:19'),
(265, 757.17835159103, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 20:00:17', '2023-02-18 20:00:17', '2023-02-18 20:00:15'),
(266, 758.21834849263, '758', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-18 23:00:42', '2023-02-18 23:00:42', '2023-02-18 23:00:40'),
(267, 757.31714285714, '757', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 02:00:14', '2023-02-19 02:00:14', '2023-02-19 02:00:12'),
(268, 756.64493307839, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 05:00:03', '2023-02-19 05:00:03', '2023-02-19 05:00:02'),
(269, 756.40718294052, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 08:00:08', '2023-02-19 08:00:08', '2023-02-19 08:00:07'),
(270, 756.59538508424, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 11:00:21', '2023-02-19 11:00:21', '2023-02-19 11:00:19'),
(271, 756.74702688386, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 14:00:37', '2023-02-19 14:00:37', '2023-02-19 14:00:35'),
(272, 756.71733430067, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 17:00:29', '2023-02-19 17:00:29', '2023-02-19 17:00:27'),
(273, 756.6176300578, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 20:00:12', '2023-02-19 20:00:12', '2023-02-19 20:00:09'),
(274, 755.61789055491, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 22:12:29', '2023-02-19 22:12:29', '2023-02-19 22:12:25'),
(275, 755.91052698493, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-19 23:00:41', '2023-02-19 23:00:41', '2023-02-19 23:00:39'),
(276, 751.69698279744, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 02:00:27', '2023-02-20 02:00:27', '2023-02-20 02:00:25'),
(277, 750.44043303122, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 05:00:46', '2023-02-20 05:00:46', '2023-02-20 05:00:45'),
(278, 750.26347407198, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 08:00:15', '2023-02-20 08:00:15', '2023-02-20 08:00:13'),
(279, 750.82872486738, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 11:00:20', '2023-02-20 11:00:20', '2023-02-20 11:00:19'),
(280, 756.269238553, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 14:00:19', '2023-02-20 14:00:19', '2023-02-20 14:00:17'),
(281, 755.42907227302, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 17:00:46', '2023-02-20 17:00:46', '2023-02-20 17:00:44'),
(282, 753.95097010396, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 20:00:50', '2023-02-20 20:00:50', '2023-02-20 20:00:48'),
(283, 753.5674368849, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-20 23:00:43', '2023-02-20 23:00:43', '2023-02-20 23:00:41'),
(284, 751.4987782968, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 02:00:02', '2023-02-21 02:00:02', '2023-02-21 02:00:01'),
(285, 752.93759096846, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 05:00:38', '2023-02-21 05:00:38', '2023-02-21 05:00:36'),
(286, 751.80641113081, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 08:00:11', '2023-02-21 08:00:11', '2023-02-21 08:00:09'),
(287, 754.08393630179, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 11:00:28', '2023-02-21 11:00:28', '2023-02-21 11:00:25'),
(288, 754.30784625881, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 14:00:33', '2023-02-21 14:00:33', '2023-02-21 14:00:31'),
(289, 753.74490793362, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 17:00:09', '2023-02-21 17:00:09', '2023-02-21 17:00:08'),
(290, 753.48944629645, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 20:00:30', '2023-02-21 20:00:30', '2023-02-21 20:00:28'),
(291, 753.65769911504, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-21 23:00:03', '2023-02-21 23:00:03', '2023-02-21 23:00:02'),
(292, 753.71220368745, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 02:00:36', '2023-02-22 02:00:36', '2023-02-22 02:00:32'),
(293, 756.39445703329, '756', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 05:00:19', '2023-02-22 05:00:19', '2023-02-22 05:00:18'),
(294, 753.70604035554, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 08:00:02', '2023-02-22 08:00:02', '2023-02-22 08:00:01'),
(295, 753.82363112392, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 11:00:10', '2023-02-22 11:00:10', '2023-02-22 11:00:08'),
(296, 755.41320049813, '755', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 14:00:34', '2023-02-22 14:00:34', '2023-02-22 14:00:32'),
(297, 754.72325166315, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 17:00:19', '2023-02-22 17:00:19', '2023-02-22 17:00:18'),
(298, 754.95378758449, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 20:00:44', '2023-02-22 20:00:44', '2023-02-22 20:00:42'),
(299, 754.11388409262, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-22 23:00:04', '2023-02-22 23:00:04', '2023-02-22 23:00:03'),
(300, 753.12541871921, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 02:00:20', '2023-02-23 02:00:20', '2023-02-23 02:00:18'),
(301, 753.47013935868, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 05:00:02', '2023-02-23 05:00:02', '2023-02-23 04:59:59'),
(302, 753.61268330582, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 08:00:35', '2023-02-23 08:00:35', '2023-02-23 08:00:34'),
(303, 754.31085730808, '754', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 11:00:47', '2023-02-23 11:00:47', '2023-02-23 11:00:45'),
(304, 753.94398496241, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 14:00:11', '2023-02-23 14:00:11', '2023-02-23 14:00:09'),
(305, 752.85070089512, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 17:00:21', '2023-02-23 17:00:21', '2023-02-23 17:00:19'),
(306, 751.2534028436, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 20:00:28', '2023-02-23 20:00:28', '2023-02-23 20:00:26'),
(307, 752.39169785641, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-23 23:00:14', '2023-02-23 23:00:14', '2023-02-23 23:00:12'),
(308, 751.19529780564, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 02:00:38', '2023-02-24 02:00:38', '2023-02-24 02:00:36'),
(309, 752.56786967419, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 05:00:23', '2023-02-24 05:00:23', '2023-02-24 05:00:21'),
(310, 751.58398155722, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 08:00:43', '2023-02-24 08:00:43', '2023-02-24 08:00:41'),
(311, 752.13697703137, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 11:00:33', '2023-02-24 11:00:33', '2023-02-24 11:00:31'),
(312, 752.14602713178, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 14:00:35', '2023-02-24 14:00:35', '2023-02-24 14:00:34'),
(313, 751.43068868304, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 17:00:09', '2023-02-24 17:00:09', '2023-02-24 17:00:06'),
(314, 751.65578449328, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 20:00:32', '2023-02-24 20:00:32', '2023-02-24 20:00:31'),
(315, 750.23598286368, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-24 23:00:26', '2023-02-24 23:00:26', '2023-02-24 23:00:24'),
(316, 750.27992535848, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 02:00:39', '2023-02-25 02:00:39', '2023-02-25 02:00:37'),
(317, 748.14777374355, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 05:00:38', '2023-02-25 05:00:38', '2023-02-25 05:00:37'),
(318, 746.30942028986, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 08:00:06', '2023-02-25 08:00:06', '2023-02-25 08:00:05'),
(319, 745.49670905011, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 11:00:42', '2023-02-25 11:00:42', '2023-02-25 11:00:41'),
(320, 745.75076400679, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 14:00:14', '2023-02-25 14:00:14', '2023-02-25 14:00:12'),
(321, 747.3794275492, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 17:00:46', '2023-02-25 17:00:46', '2023-02-25 17:00:44'),
(322, 749.98725447673, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 20:00:16', '2023-02-25 20:00:16', '2023-02-25 20:00:14'),
(323, 746.93806489676, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-25 23:00:48', '2023-02-25 23:00:48', '2023-02-25 23:00:46'),
(324, 748.18380628074, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 02:00:32', '2023-02-26 02:00:32', '2023-02-26 02:00:31'),
(325, 746.69921969055, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 05:00:06', '2023-02-26 05:00:06', '2023-02-26 05:00:05'),
(326, 749.33837778987, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 08:00:24', '2023-02-26 08:00:24', '2023-02-26 08:00:22'),
(327, 748.85352459825, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 11:00:04', '2023-02-26 11:00:04', '2023-02-26 11:00:03'),
(328, 750.52939912318, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 14:00:33', '2023-02-26 14:00:33', '2023-02-26 14:00:32'),
(329, 748.17945872801, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 17:00:39', '2023-02-26 17:00:39', '2023-02-26 17:00:37'),
(330, 749.50989885948, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 20:00:43', '2023-02-26 20:00:43', '2023-02-26 20:00:41'),
(331, 750.1227684868, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-26 23:00:32', '2023-02-26 23:00:32', '2023-02-26 23:00:29'),
(332, 751.41513455054, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 02:00:02', '2023-02-27 02:00:02', '2023-02-27 02:00:00'),
(333, 750.43925009235, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 05:00:23', '2023-02-27 05:00:23', '2023-02-27 05:00:22'),
(334, 749.40375932922, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 08:00:42', '2023-02-27 08:00:42', '2023-02-27 08:00:41'),
(335, 750.0896129263, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 11:00:25', '2023-02-27 11:00:25', '2023-02-27 11:00:24'),
(336, 749.72437891335, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 14:00:19', '2023-02-27 14:00:19', '2023-02-27 14:00:17'),
(337, 751.39439701174, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 17:00:42', '2023-02-27 17:00:42', '2023-02-27 17:00:41'),
(338, 751.27143843896, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 20:00:51', '2023-02-27 20:00:51', '2023-02-27 20:00:49'),
(339, 751.82017561365, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-27 23:00:15', '2023-02-27 23:00:15', '2023-02-27 23:00:13'),
(340, 750.65391052462, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 02:00:06', '2023-02-28 02:00:06', '2023-02-28 02:00:05'),
(341, 750.61850009816, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 05:00:44', '2023-02-28 05:00:44', '2023-02-28 05:00:42'),
(342, 750.93549363552, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 08:00:05', '2023-02-28 08:00:05', '2023-02-28 08:00:04'),
(343, 751.64654635917, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 11:00:16', '2023-02-28 11:00:16', '2023-02-28 11:00:14'),
(344, 751.25222725653, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 14:00:18', '2023-02-28 14:00:18', '2023-02-28 14:00:17'),
(345, 750.93030528164, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 17:00:09', '2023-02-28 17:00:09', '2023-02-28 17:00:07'),
(346, 750.80254050427, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 20:00:27', '2023-02-28 20:00:27', '2023-02-28 20:00:25'),
(347, 751.4560726274, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-02-28 23:00:15', '2023-02-28 23:00:15', '2023-02-28 23:00:13'),
(348, 749.36054421769, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 02:00:50', '2023-03-01 02:00:50', '2023-03-01 02:00:48'),
(349, 747.88506224066, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 08:00:49', '2023-03-01 08:00:49', '2023-03-01 08:00:48'),
(350, 750.01948685906, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 11:00:50', '2023-03-01 11:00:50', '2023-03-01 11:00:48'),
(351, 747.76678144255, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 14:00:41', '2023-03-01 14:00:41', '2023-03-01 14:00:39'),
(352, 745.12101394648, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 17:00:16', '2023-03-01 17:00:16', '2023-03-01 17:00:14'),
(353, 743.16015189873, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 20:00:38', '2023-03-01 20:00:38', '2023-03-01 20:00:36'),
(354, 740.4920893934, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-01 23:00:14', '2023-03-01 23:00:14', '2023-03-01 23:00:12'),
(355, 740.26449275362, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 02:00:39', '2023-03-02 02:00:39', '2023-03-02 02:00:37'),
(356, 742.90473824312, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 05:00:14', '2023-03-02 05:00:14', '2023-03-02 05:00:12'),
(357, 741.86115107914, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 08:00:31', '2023-03-02 08:00:31', '2023-03-02 08:00:30'),
(358, 742.94474401062, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 11:00:40', '2023-03-02 11:00:40', '2023-03-02 11:00:39'),
(359, 740.50818302639, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 14:00:23', '2023-03-02 14:00:23', '2023-03-02 14:00:22'),
(360, 742.56763195998, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 17:00:45', '2023-03-02 17:00:45', '2023-03-02 17:00:43'),
(361, 742.93895184136, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 20:00:19', '2023-03-02 20:00:19', '2023-03-02 20:00:17'),
(362, 743.2698617072, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-02 23:00:30', '2023-03-02 23:00:30', '2023-03-02 23:00:28'),
(363, 740.50315917375, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 02:00:10', '2023-03-03 02:00:10', '2023-03-03 02:00:09'),
(364, 740.73661971831, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 05:00:09', '2023-03-03 05:00:09', '2023-03-03 05:00:08'),
(365, 735.90684676293, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 08:00:05', '2023-03-03 08:00:05', '2023-03-03 08:00:04'),
(366, 742.67157513579, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 11:00:43', '2023-03-03 11:00:43', '2023-03-03 11:00:42'),
(367, 742.0184860807, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 14:00:19', '2023-03-03 14:00:19', '2023-03-03 14:00:17'),
(368, 743.31051133476, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 17:00:25', '2023-03-03 17:00:25', '2023-03-03 17:00:23'),
(369, 740.25, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 20:00:45', '2023-03-03 20:00:45', '2023-03-03 20:00:43'),
(370, 740.25533653355, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-03 23:00:30', '2023-03-03 23:00:30', '2023-03-03 23:00:28'),
(371, 739.7405642866, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 02:00:48', '2023-03-04 02:00:48', '2023-03-04 02:00:47'),
(372, 740.64358103117, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 05:00:41', '2023-03-04 05:00:41', '2023-03-04 05:00:40'),
(373, 741.97672513123, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 08:00:36', '2023-03-04 08:00:36', '2023-03-04 08:00:34'),
(374, 739.22182271078, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 11:00:28', '2023-03-04 11:00:28', '2023-03-04 11:00:27'),
(375, 740.9961605463, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 14:00:09', '2023-03-04 14:00:09', '2023-03-04 14:00:07'),
(376, 741.34357388042, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 17:00:03', '2023-03-04 17:00:03', '2023-03-04 17:00:01'),
(377, 740.63791534301, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 20:00:35', '2023-03-04 20:00:35', '2023-03-04 20:00:34'),
(378, 739.42120578436, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-04 23:00:30', '2023-03-04 23:00:30', '2023-03-04 23:00:27'),
(379, 738.39715698393, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 02:00:16', '2023-03-05 02:00:16', '2023-03-05 02:00:15'),
(380, 739.210526969, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 05:00:02', '2023-03-05 05:00:02', '2023-03-05 05:00:01'),
(381, 738.99384755266, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 08:00:19', '2023-03-05 08:00:19', '2023-03-05 08:00:18'),
(382, 738.9256926395, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 11:00:51', '2023-03-05 11:00:51', '2023-03-05 11:00:49'),
(383, 739.83437532081, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 14:00:23', '2023-03-05 14:00:23', '2023-03-05 14:00:22'),
(384, 738.81461136774, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 17:00:34', '2023-03-05 17:00:34', '2023-03-05 17:00:32'),
(385, 739.76408598675, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 20:00:27', '2023-03-05 20:00:27', '2023-03-05 20:00:25'),
(386, 739.75862322842, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-05 23:00:46', '2023-03-05 23:00:46', '2023-03-05 23:00:44'),
(387, 740.4, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 02:00:03', '2023-03-06 02:00:03', '2023-03-06 02:00:01'),
(388, 739.90734647568, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 05:00:17', '2023-03-06 05:00:17', '2023-03-06 05:00:15');
INSERT INTO `exchange_rates` (`id`, `rate_decimal`, `rate_normal`, `assets_id_from`, `assets_id_to`, `status`, `compare`, `ordering`, `created_at`, `updated_at`, `exchange_time`) VALUES
(389, 739.38032911912, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 08:00:14', '2023-03-06 08:00:14', '2023-03-06 08:00:12'),
(390, 738.98214804494, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 11:00:38', '2023-03-06 11:00:38', '2023-03-06 11:00:36'),
(391, 739.2421744325, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 14:00:29', '2023-03-06 14:00:29', '2023-03-06 14:00:28'),
(392, 739.51347397435, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 17:00:28', '2023-03-06 17:00:28', '2023-03-06 17:00:26'),
(393, 737.7633776678, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 20:00:34', '2023-03-06 20:00:34', '2023-03-06 20:00:32'),
(394, 738.87929285775, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-06 23:00:38', '2023-03-06 23:00:38', '2023-03-06 23:00:36'),
(395, 738.6400742115, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 02:00:15', '2023-03-07 02:00:15', '2023-03-07 02:00:14'),
(396, 738.50822401615, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 05:00:27', '2023-03-07 05:00:27', '2023-03-07 05:00:26'),
(397, 738.41334881021, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 08:00:38', '2023-03-07 08:00:38', '2023-03-07 08:00:37'),
(398, 737.75, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 11:00:37', '2023-03-07 11:00:37', '2023-03-07 11:00:36'),
(399, 737.24134660977, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 14:00:50', '2023-03-07 14:00:50', '2023-03-07 14:00:48'),
(400, 738.19375033586, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 17:00:14', '2023-03-07 17:00:14', '2023-03-07 17:00:12'),
(401, 736.75877991237, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 20:00:21', '2023-03-07 20:00:21', '2023-03-07 20:00:20'),
(402, 734.07327394209, '734', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-07 23:00:04', '2023-03-07 23:00:04', '2023-03-07 23:00:03'),
(403, 733.83425827108, '733', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 02:00:02', '2023-03-08 02:00:02', '2023-03-08 02:00:00'),
(404, 735.5, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 05:00:37', '2023-03-08 05:00:37', '2023-03-08 05:00:35'),
(405, 736.56710775047, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 08:00:50', '2023-03-08 08:00:50', '2023-03-08 08:00:48'),
(406, 739.64523009741, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 11:00:21', '2023-03-08 11:00:21', '2023-03-08 11:00:19'),
(407, 736.0376127868, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 14:00:24', '2023-03-08 14:00:24', '2023-03-08 14:00:22'),
(408, 738.83269155206, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 17:00:07', '2023-03-08 17:00:07', '2023-03-08 17:00:05'),
(409, 740.87557251908, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 20:00:48', '2023-03-08 20:00:48', '2023-03-08 20:00:46'),
(410, 737.85836012862, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-08 23:00:03', '2023-03-08 23:00:03', '2023-03-08 23:00:02'),
(411, 741.24362081254, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 02:00:24', '2023-03-09 02:00:24', '2023-03-09 02:00:22'),
(412, 741.81934481419, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 05:00:34', '2023-03-09 05:00:34', '2023-03-09 05:00:33'),
(413, 741.14298600884, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 08:00:07', '2023-03-09 08:00:07', '2023-03-09 08:00:05'),
(414, 744.11531671859, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 11:00:04', '2023-03-09 11:00:04', '2023-03-09 11:00:02'),
(415, 745.95459933007, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 14:00:19', '2023-03-09 14:00:19', '2023-03-09 14:00:17'),
(416, 746.55592515593, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 17:00:25', '2023-03-09 17:00:25', '2023-03-09 17:00:23'),
(417, 745.99442231076, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 20:00:10', '2023-03-09 20:00:10', '2023-03-09 20:00:08'),
(418, 744.5853820598, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-09 23:00:43', '2023-03-09 23:00:43', '2023-03-09 23:00:40'),
(419, 745.32130214918, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 02:00:35', '2023-03-10 02:00:35', '2023-03-10 02:00:33'),
(420, 742.27899838449, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 05:00:45', '2023-03-10 05:00:45', '2023-03-10 05:00:44'),
(421, 744.59081976162, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 08:00:25', '2023-03-10 08:00:25', '2023-03-10 08:00:23'),
(422, 746.07632946821, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 11:00:47', '2023-03-10 11:00:47', '2023-03-10 11:00:45'),
(423, 744.79853904282, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 14:00:08', '2023-03-10 14:00:08', '2023-03-10 14:00:06'),
(424, 745.62828058859, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 17:00:18', '2023-03-10 17:00:18', '2023-03-10 17:00:15'),
(425, 745.95803604266, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 20:00:32', '2023-03-10 20:00:32', '2023-03-10 20:00:30'),
(426, 745.20566829951, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-10 23:00:13', '2023-03-10 23:00:13', '2023-03-10 23:00:11'),
(427, 744.63832773879, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 02:00:09', '2023-03-11 02:00:09', '2023-03-11 02:00:06'),
(428, 743.49251093812, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 05:00:16', '2023-03-11 05:00:16', '2023-03-11 05:00:14'),
(429, 743.12875970649, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 08:00:18', '2023-03-11 08:00:18', '2023-03-11 08:00:16'),
(430, 743.81489361702, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 11:00:09', '2023-03-11 11:00:09', '2023-03-11 11:00:08'),
(431, 743.34274603339, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 14:00:07', '2023-03-11 14:00:07', '2023-03-11 14:00:04'),
(432, 744.60318342597, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 17:00:33', '2023-03-11 17:00:33', '2023-03-11 17:00:32'),
(433, 743.55318586669, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 20:00:48', '2023-03-11 20:00:48', '2023-03-11 20:00:46'),
(434, 741.71731823164, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-11 23:00:24', '2023-03-11 23:00:24', '2023-03-11 23:00:23'),
(435, 742.05, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 02:00:34', '2023-03-12 02:00:34', '2023-03-12 02:00:32'),
(436, 741.75438546693, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 05:00:08', '2023-03-12 05:00:08', '2023-03-12 05:00:07'),
(437, 742.12091085809, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 07:00:06', '2023-03-12 07:00:06', '2023-03-12 07:00:04'),
(438, 744.76586842532, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 10:00:15', '2023-03-12 10:00:15', '2023-03-12 10:00:13'),
(439, 745.29564389934, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 13:00:24', '2023-03-12 13:00:24', '2023-03-12 13:00:22'),
(440, 744.16917614424, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 16:00:37', '2023-03-12 16:00:37', '2023-03-12 16:00:36'),
(441, 745.48993759526, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 19:00:23', '2023-03-12 19:00:23', '2023-03-12 19:00:21'),
(442, 743.12181085044, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-12 22:00:33', '2023-03-12 22:00:33', '2023-03-12 22:00:31'),
(443, 744.15222865136, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 01:00:47', '2023-03-13 01:00:47', '2023-03-13 01:00:45'),
(444, 744.31225722918, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 07:00:15', '2023-03-13 07:00:15', '2023-03-13 07:00:14'),
(445, 744.93481493075, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 10:00:29', '2023-03-13 10:00:29', '2023-03-13 10:00:27'),
(446, 744.86598711762, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 13:00:42', '2023-03-13 13:00:42', '2023-03-13 13:00:40'),
(447, 744.23260006616, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 16:00:33', '2023-03-13 16:00:33', '2023-03-13 16:00:31'),
(448, 745.3, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 19:00:09', '2023-03-13 19:00:09', '2023-03-13 19:00:07'),
(449, 742.97496111975, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-13 22:00:19', '2023-03-13 22:00:19', '2023-03-13 22:00:18'),
(450, 742.30516832622, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 01:00:16', '2023-03-14 01:00:16', '2023-03-14 01:00:15'),
(451, 740.58249816671, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 04:00:02', '2023-03-14 04:00:02', '2023-03-14 03:59:59'),
(452, 742.19710816864, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 07:00:14', '2023-03-14 07:00:14', '2023-03-14 07:00:11'),
(453, 742.315261959, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 10:00:09', '2023-03-14 10:00:09', '2023-03-14 10:00:06'),
(454, 742.06077170418, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 13:00:14', '2023-03-14 13:00:14', '2023-03-14 13:00:11'),
(455, 742.79233550253, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 16:00:08', '2023-03-14 16:00:08', '2023-03-14 16:00:07'),
(456, 742.62827868852, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 19:00:09', '2023-03-14 19:00:09', '2023-03-14 19:00:07'),
(457, 741.23009049774, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-14 22:00:46', '2023-03-14 22:00:46', '2023-03-14 22:00:44'),
(458, 740.88167345778, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 01:00:24', '2023-03-15 01:00:24', '2023-03-15 01:00:22'),
(459, 740.94044348465, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 04:00:20', '2023-03-15 04:00:20', '2023-03-15 04:00:19'),
(460, 741.6627865193, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 07:00:10', '2023-03-15 07:00:10', '2023-03-15 07:00:09'),
(461, 742.83746829021, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 10:00:44', '2023-03-15 10:00:44', '2023-03-15 10:00:43'),
(462, 742.47764350453, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 13:00:42', '2023-03-15 13:00:42', '2023-03-15 13:00:40'),
(463, 742.50211803414, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 16:00:43', '2023-03-15 16:00:43', '2023-03-15 16:00:41'),
(464, 742.13114454594, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 19:00:25', '2023-03-15 19:00:25', '2023-03-15 19:00:23'),
(465, 742.87985611511, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-15 22:00:48', '2023-03-15 22:00:48', '2023-03-15 22:00:46'),
(466, 742.44684453566, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 01:00:23', '2023-03-16 01:00:23', '2023-03-16 01:00:21'),
(467, 742.3091662283, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 04:00:27', '2023-03-16 04:00:27', '2023-03-16 04:00:25'),
(468, 743.69322684497, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 07:00:05', '2023-03-16 07:00:05', '2023-03-16 07:00:03'),
(469, 743.64797894341, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 10:00:24', '2023-03-16 10:00:24', '2023-03-16 10:00:23'),
(470, 743.79868816223, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 13:00:20', '2023-03-16 13:00:20', '2023-03-16 13:00:19'),
(471, 744.85987841945, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 16:00:35', '2023-03-16 16:00:35', '2023-03-16 16:00:33'),
(472, 742.70845378633, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 19:00:33', '2023-03-16 19:00:33', '2023-03-16 19:00:32'),
(473, 743, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-16 22:00:49', '2023-03-16 22:00:49', '2023-03-16 22:00:45'),
(474, 741.26724376731, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 01:00:19', '2023-03-17 01:00:19', '2023-03-17 01:00:18'),
(475, 743.23710294362, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 04:00:50', '2023-03-17 04:00:50', '2023-03-17 04:00:48'),
(476, 743.28138195777, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 07:00:45', '2023-03-17 07:00:45', '2023-03-17 07:00:43'),
(477, 743.25882463792, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 10:00:46', '2023-03-17 10:00:46', '2023-03-17 10:00:44'),
(478, 744.87704855114, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 13:00:41', '2023-03-17 13:00:41', '2023-03-17 13:00:40'),
(479, 742.736, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 16:00:49', '2023-03-17 16:00:49', '2023-03-17 16:00:48'),
(480, 741.48760262726, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 19:00:31', '2023-03-17 19:00:31', '2023-03-17 19:00:29'),
(481, 738.17857638889, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-17 22:00:24', '2023-03-17 22:00:24', '2023-03-17 22:00:23'),
(482, 737.54285714286, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 01:00:46', '2023-03-18 01:00:46', '2023-03-18 01:00:44'),
(483, 740.2475200816, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 04:00:38', '2023-03-18 04:00:38', '2023-03-18 04:00:37'),
(484, 738.80010380623, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 07:00:05', '2023-03-18 07:00:05', '2023-03-18 07:00:03'),
(485, 740.23717687075, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 10:00:10', '2023-03-18 10:00:10', '2023-03-18 10:00:08'),
(486, 740.88676894219, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 13:00:42', '2023-03-18 13:00:42', '2023-03-18 13:00:40'),
(487, 743.6777928785, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 16:00:17', '2023-03-18 16:00:17', '2023-03-18 16:00:15'),
(488, 744.13590217434, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 19:00:20', '2023-03-18 19:00:20', '2023-03-18 19:00:18'),
(489, 743.17404534157, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-18 22:00:12', '2023-03-18 22:00:12', '2023-03-18 22:00:11'),
(490, 742.87391120507, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 01:00:33', '2023-03-19 01:00:33', '2023-03-19 01:00:32'),
(491, 742.84376357431, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 04:00:18', '2023-03-19 04:00:18', '2023-03-19 04:00:17'),
(492, 743.33245614035, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 07:00:07', '2023-03-19 07:00:07', '2023-03-19 07:00:06'),
(493, 743.74627133872, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 10:00:02', '2023-03-19 10:00:02', '2023-03-19 10:00:00'),
(494, 744.10178571429, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 13:00:02', '2023-03-19 13:00:02', '2023-03-19 13:00:01'),
(495, 744.3905027933, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 16:00:45', '2023-03-19 16:00:45', '2023-03-19 16:00:43'),
(496, 745.15741332678, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 19:00:41', '2023-03-19 19:00:41', '2023-03-19 19:00:39'),
(497, 743.81958103362, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-19 22:00:50', '2023-03-19 22:00:50', '2023-03-19 22:00:49'),
(498, 743.18315988647, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 01:00:39', '2023-03-20 01:00:39', '2023-03-20 01:00:37'),
(499, 743.91559067774, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 04:00:38', '2023-03-20 04:00:38', '2023-03-20 04:00:36'),
(500, 743.41090844426, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 07:00:03', '2023-03-20 07:00:03', '2023-03-20 07:00:02'),
(501, 744.63782548149, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 10:00:28', '2023-03-20 10:00:28', '2023-03-20 10:00:26'),
(502, 743.59126984127, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 13:00:04', '2023-03-20 13:00:04', '2023-03-20 13:00:03'),
(503, 743.56720422435, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 16:00:13', '2023-03-20 16:00:13', '2023-03-20 16:00:10'),
(504, 743.90456131605, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 19:00:14', '2023-03-20 19:00:14', '2023-03-20 19:00:13'),
(505, 744.04424505467, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-20 22:00:43', '2023-03-20 22:00:43', '2023-03-20 22:00:42'),
(506, 743.81381981982, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 01:00:26', '2023-03-21 01:00:26', '2023-03-21 01:00:24'),
(507, 743.50176431425, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 04:00:02', '2023-03-21 04:00:02', '2023-03-21 04:00:01'),
(508, 743.10687200548, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 07:00:24', '2023-03-21 07:00:24', '2023-03-21 07:00:23'),
(509, 745.69507640902, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 10:00:45', '2023-03-21 10:00:45', '2023-03-21 10:00:43'),
(510, 745.4955248023, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 13:00:22', '2023-03-21 13:00:22', '2023-03-21 13:00:20'),
(511, 745.26159742595, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 16:00:01', '2023-03-21 16:00:01', '2023-03-21 16:00:00'),
(512, 744.81382563293, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 19:00:40', '2023-03-21 19:00:40', '2023-03-21 19:00:38'),
(513, 744.71097720343, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-21 22:00:17', '2023-03-21 22:00:17', '2023-03-21 22:00:15'),
(514, 744.46357516829, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 01:00:39', '2023-03-22 01:00:39', '2023-03-22 01:00:38'),
(515, 745.40376919497, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 04:00:02', '2023-03-22 04:00:02', '2023-03-22 04:00:00'),
(516, 744.58029914826, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 07:00:09', '2023-03-22 07:00:09', '2023-03-22 07:00:08'),
(517, 745.07041433005, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 10:00:06', '2023-03-22 10:00:06', '2023-03-22 10:00:04'),
(518, 745.18133632077, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 13:00:12', '2023-03-22 13:00:12', '2023-03-22 13:00:10'),
(519, 744.70557880056, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 16:00:03', '2023-03-22 16:00:03', '2023-03-22 16:00:01'),
(520, 745.16825175672, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 19:00:43', '2023-03-22 19:00:43', '2023-03-22 19:00:42'),
(521, 746.0864581503, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-22 22:00:38', '2023-03-22 22:00:38', '2023-03-22 22:00:37'),
(522, 749.89958524253, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 01:00:13', '2023-03-23 01:00:13', '2023-03-23 01:00:12'),
(523, 743.4846, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 04:00:35', '2023-03-23 04:00:35', '2023-03-23 04:00:33'),
(524, 743.34162075889, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 07:00:28', '2023-03-23 07:00:28', '2023-03-23 07:00:27'),
(525, 744.23330472103, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 10:00:21', '2023-03-23 10:00:21', '2023-03-23 10:00:19'),
(526, 746.76507936508, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 13:00:25', '2023-03-23 13:00:25', '2023-03-23 13:00:23'),
(527, 744.43387458189, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 16:00:36', '2023-03-23 16:00:36', '2023-03-23 16:00:34'),
(528, 745.17744136461, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 19:00:16', '2023-03-23 19:00:16', '2023-03-23 19:00:14'),
(529, 745.04433962264, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-23 22:00:07', '2023-03-23 22:00:07', '2023-03-23 22:00:05'),
(530, 744.84102072929, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 01:00:16', '2023-03-24 01:00:16', '2023-03-24 01:00:14'),
(531, 744.48734536174, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 04:00:31', '2023-03-24 04:00:31', '2023-03-24 04:00:29'),
(532, 745.00078742963, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 07:00:31', '2023-03-24 07:00:31', '2023-03-24 07:00:30'),
(533, 744.32909267636, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 10:00:05', '2023-03-24 10:00:05', '2023-03-24 10:00:03'),
(534, 744.30855855856, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 13:00:34', '2023-03-24 13:00:34', '2023-03-24 13:00:32'),
(535, 744.78778718429, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 16:00:22', '2023-03-24 16:00:22', '2023-03-24 16:00:20'),
(536, 743.5165862261, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 19:00:26', '2023-03-24 19:00:26', '2023-03-24 19:00:24'),
(537, 744.16387235659, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-24 22:00:19', '2023-03-24 22:00:19', '2023-03-24 22:00:18'),
(538, 744.80355233853, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 01:00:29', '2023-03-25 01:00:29', '2023-03-25 01:00:27'),
(539, 744.88828520393, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 04:00:37', '2023-03-25 04:00:37', '2023-03-25 04:00:35'),
(540, 744.45784753363, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 07:00:11', '2023-03-25 07:00:11', '2023-03-25 07:00:09'),
(541, 744.46211358735, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 10:00:04', '2023-03-25 10:00:04', '2023-03-25 10:00:02'),
(542, 745.98545246277, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 13:00:24', '2023-03-25 13:00:24', '2023-03-25 13:00:22'),
(543, 746.27540847411, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 16:00:44', '2023-03-25 16:00:44', '2023-03-25 16:00:42'),
(544, 746.59270248597, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 19:00:10', '2023-03-25 19:00:10', '2023-03-25 19:00:08'),
(545, 746.2276568999, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-25 22:00:28', '2023-03-25 22:00:28', '2023-03-25 22:00:26'),
(546, 745.38775981524, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 01:00:47', '2023-03-26 01:00:47', '2023-03-26 01:00:45'),
(547, 745.60628296538, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 04:00:37', '2023-03-26 04:00:37', '2023-03-26 04:00:34'),
(548, 745.73158852981, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 07:00:45', '2023-03-26 07:00:45', '2023-03-26 07:00:44'),
(549, 744.8815443112, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 10:00:31', '2023-03-26 10:00:31', '2023-03-26 10:00:29'),
(550, 746.44129928758, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 13:00:27', '2023-03-26 13:00:27', '2023-03-26 13:00:25'),
(551, 745.99494526722, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 16:00:34', '2023-03-26 16:00:34', '2023-03-26 16:00:33'),
(552, 746.32301358584, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 19:00:18', '2023-03-26 19:00:18', '2023-03-26 19:00:16'),
(553, 745.27343651956, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-26 22:00:31', '2023-03-26 22:00:31', '2023-03-26 22:00:29'),
(554, 746.65114784206, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 01:00:04', '2023-03-27 01:00:04', '2023-03-27 01:00:02'),
(555, 746.37601384768, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 04:00:08', '2023-03-27 04:00:08', '2023-03-27 04:00:06'),
(556, 745.48731038982, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 07:00:27', '2023-03-27 07:00:27', '2023-03-27 07:00:25'),
(557, 746.32213755765, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 10:00:37', '2023-03-27 10:00:37', '2023-03-27 10:00:36'),
(558, 745.95228681688, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 13:00:36', '2023-03-27 13:00:36', '2023-03-27 13:00:35'),
(559, 746.34190745896, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 16:00:17', '2023-03-27 16:00:17', '2023-03-27 16:00:16'),
(560, 746.2359646539, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 19:00:09', '2023-03-27 19:00:09', '2023-03-27 19:00:05'),
(561, 749.1619047619, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-27 22:00:31', '2023-03-27 22:00:31', '2023-03-27 22:00:29'),
(562, 746.2272344605, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 01:00:02', '2023-03-28 01:00:02', '2023-03-28 01:00:00'),
(563, 745.90928906091, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 04:00:02', '2023-03-28 04:00:02', '2023-03-28 04:00:01'),
(564, 745.50371293987, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 07:00:14', '2023-03-28 07:00:14', '2023-03-28 07:00:12'),
(565, 745.51529196524, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 10:00:38', '2023-03-28 10:00:38', '2023-03-28 10:00:36'),
(566, 746.53395032179, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 13:00:10', '2023-03-28 13:00:10', '2023-03-28 13:00:08'),
(567, 748.38351365276, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 16:00:04', '2023-03-28 16:00:04', '2023-03-28 16:00:02'),
(568, 748.16977598792, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 19:00:31', '2023-03-28 19:00:31', '2023-03-28 19:00:29'),
(569, 747.191208106, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-28 22:00:50', '2023-03-28 22:00:50', '2023-03-28 22:00:48'),
(570, 747.5483490566, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 01:00:26', '2023-03-29 01:00:26', '2023-03-29 01:00:25'),
(571, 746.62269442347, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 04:00:48', '2023-03-29 04:00:48', '2023-03-29 04:00:47'),
(572, 747.19942714819, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 07:00:19', '2023-03-29 07:00:19', '2023-03-29 07:00:17'),
(573, 747.82936346638, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 10:00:07', '2023-03-29 10:00:07', '2023-03-29 10:00:04'),
(574, 747.22158263773, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 13:00:48', '2023-03-29 13:00:48', '2023-03-29 13:00:47'),
(575, 747.69000936622, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 16:00:04', '2023-03-29 16:00:04', '2023-03-29 16:00:03'),
(576, 746.93130677848, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 19:00:43', '2023-03-29 19:00:43', '2023-03-29 19:00:41'),
(577, 746.29594991544, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-29 22:00:45', '2023-03-29 22:00:45', '2023-03-29 22:00:44'),
(578, 748.20193630573, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 01:00:50', '2023-03-30 01:00:50', '2023-03-30 01:00:48'),
(579, 746.93102836339, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 04:00:34', '2023-03-30 04:00:34', '2023-03-30 04:00:33'),
(580, 747.72394271146, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 07:00:05', '2023-03-30 07:00:05', '2023-03-30 07:00:03'),
(581, 748.07249307624, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 10:00:08', '2023-03-30 10:00:08', '2023-03-30 10:00:06'),
(582, 748.47966050318, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 13:00:25', '2023-03-30 13:00:25', '2023-03-30 13:00:24'),
(583, 749.09957743262, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 16:00:24', '2023-03-30 16:00:24', '2023-03-30 16:00:22'),
(584, 747.78664527629, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 19:00:17', '2023-03-30 19:00:17', '2023-03-30 19:00:15'),
(585, 748.85317109145, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-30 22:00:36', '2023-03-30 22:00:36', '2023-03-30 22:00:34'),
(586, 748.21664065113, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 01:00:34', '2023-03-31 01:00:34', '2023-03-31 01:00:31'),
(587, 747.99930705024, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 04:00:13', '2023-03-31 04:00:13', '2023-03-31 04:00:11'),
(588, 748.08316076003, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 07:00:11', '2023-03-31 07:00:11', '2023-03-31 07:00:08'),
(589, 747.79740061162, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 10:00:32', '2023-03-31 10:00:32', '2023-03-31 10:00:30'),
(590, 747.23806470417, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 13:00:04', '2023-03-31 13:00:04', '2023-03-31 13:00:03'),
(591, 746.95608772044, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 16:00:47', '2023-03-31 16:00:47', '2023-03-31 16:00:46'),
(592, 747.21805040235, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 19:00:04', '2023-03-31 19:00:04', '2023-03-31 19:00:02'),
(593, 744.23760763634, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-03-31 22:00:27', '2023-03-31 22:00:27', '2023-03-31 22:00:25'),
(594, 744.13554166081, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 01:00:04', '2023-04-01 01:00:04', '2023-04-01 01:00:03'),
(595, 742.73583551465, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 04:00:11', '2023-04-01 04:00:11', '2023-04-01 04:00:09'),
(596, 743.00083217753, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 07:00:42', '2023-04-01 07:00:42', '2023-04-01 07:00:41'),
(597, 741.79719193662, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 10:00:50', '2023-04-01 10:00:50', '2023-04-01 10:00:48'),
(598, 740.65, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 13:00:48', '2023-04-01 13:00:48', '2023-04-01 13:00:47'),
(599, 745.24989993329, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 16:00:24', '2023-04-01 16:00:24', '2023-04-01 16:00:21'),
(600, 743.25363389998, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 19:00:43', '2023-04-01 19:00:43', '2023-04-01 19:00:42'),
(601, 741.84951182119, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-01 22:00:36', '2023-04-01 22:00:36', '2023-04-01 22:00:34'),
(602, 741.83612941881, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 01:00:18', '2023-04-02 01:00:18', '2023-04-02 01:00:16'),
(603, 742.45064935065, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 04:00:44', '2023-04-02 04:00:44', '2023-04-02 04:00:41'),
(604, 741.11754752101, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 07:00:10', '2023-04-02 07:00:10', '2023-04-02 07:00:09'),
(605, 743.65095090668, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 10:00:18', '2023-04-02 10:00:18', '2023-04-02 10:00:16'),
(606, 743.49089544772, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 13:00:49', '2023-04-02 13:00:49', '2023-04-02 13:00:47'),
(607, 742.6115826702, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 16:00:49', '2023-04-02 16:00:49', '2023-04-02 16:00:48'),
(608, 742.79781023898, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 19:00:43', '2023-04-02 19:00:43', '2023-04-02 19:00:42'),
(609, 744.091015625, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-02 22:00:12', '2023-04-02 22:00:12', '2023-04-02 22:00:10'),
(610, 743.81648099607, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 01:00:33', '2023-04-03 01:00:33', '2023-04-03 01:00:31'),
(611, 742.59900137377, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 04:00:48', '2023-04-03 04:00:48', '2023-04-03 04:00:46'),
(612, 742.55611149718, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 07:00:09', '2023-04-03 07:00:09', '2023-04-03 07:00:06'),
(613, 743.8234521576, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 10:00:14', '2023-04-03 10:00:14', '2023-04-03 10:00:13'),
(614, 744.9700729927, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 13:00:23', '2023-04-03 13:00:23', '2023-04-03 13:00:21'),
(615, 745.99244633638, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 16:00:19', '2023-04-03 16:00:19', '2023-04-03 16:00:18'),
(616, 745.73345854201, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 19:00:32', '2023-04-03 19:00:32', '2023-04-03 19:00:30'),
(617, 745.72103504043, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-03 22:00:28', '2023-04-03 22:00:28', '2023-04-03 22:00:26'),
(618, 745.43733119707, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 01:00:33', '2023-04-04 01:00:33', '2023-04-04 01:00:32'),
(619, 745.59742075613, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 04:00:02', '2023-04-04 04:00:02', '2023-04-04 04:00:00'),
(620, 745.34847577315, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 07:00:51', '2023-04-04 07:00:51', '2023-04-04 07:00:49'),
(621, 745.18657599481, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 10:00:16', '2023-04-04 10:00:16', '2023-04-04 10:00:15'),
(622, 744.82503748126, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 13:00:11', '2023-04-04 13:00:11', '2023-04-04 13:00:09'),
(623, 746.41802325581, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 16:00:45', '2023-04-04 16:00:45', '2023-04-04 16:00:44'),
(624, 743.50745656216, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 19:00:34', '2023-04-04 19:00:34', '2023-04-04 19:00:32'),
(625, 745.51271455817, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-04 22:00:26', '2023-04-04 22:00:26', '2023-04-04 22:00:24'),
(626, 744.19990176817, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 01:00:23', '2023-04-05 01:00:23', '2023-04-05 01:00:22'),
(627, 744.50725658298, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 04:00:22', '2023-04-05 04:00:22', '2023-04-05 04:00:21'),
(628, 743.72375886525, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 07:00:45', '2023-04-05 07:00:45', '2023-04-05 07:00:44'),
(629, 743.79096258065, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 10:00:43', '2023-04-05 10:00:43', '2023-04-05 10:00:41'),
(630, 743.76061158648, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 13:00:33', '2023-04-05 13:00:33', '2023-04-05 13:00:31'),
(631, 744.81915925627, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 16:00:47', '2023-04-05 16:00:47', '2023-04-05 16:00:45'),
(632, 743.65702584537, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 16:50:51', '2023-04-05 16:50:51', '2023-04-05 16:50:48'),
(633, 744.45927559786, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 19:00:18', '2023-04-05 19:00:18', '2023-04-05 19:00:17'),
(634, 743.16963873943, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-05 22:00:28', '2023-04-05 22:00:28', '2023-04-05 22:00:27'),
(635, 742.9628458498, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 01:00:45', '2023-04-06 01:00:45', '2023-04-06 01:00:42'),
(636, 740.12873657382, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 04:00:07', '2023-04-06 04:00:07', '2023-04-06 04:00:06'),
(637, 742.24983170795, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 07:00:20', '2023-04-06 07:00:20', '2023-04-06 07:00:18'),
(638, 743.65952873088, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 10:00:37', '2023-04-06 10:00:37', '2023-04-06 10:00:36'),
(639, 741.52370731707, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 13:00:30', '2023-04-06 13:00:30', '2023-04-06 13:00:28'),
(640, 743.03105053191, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 16:00:28', '2023-04-06 16:00:28', '2023-04-06 16:00:27'),
(641, 741.35903536977, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 19:00:04', '2023-04-06 19:00:04', '2023-04-06 19:00:03'),
(642, 741.05403284672, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-06 22:00:48', '2023-04-06 22:00:48', '2023-04-06 22:00:47'),
(643, 740.29733831719, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 01:00:21', '2023-04-07 01:00:21', '2023-04-07 01:00:20'),
(644, 739.97534246575, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 04:00:20', '2023-04-07 04:00:20', '2023-04-07 04:00:18'),
(645, 740.60070466843, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 07:00:21', '2023-04-07 07:00:21', '2023-04-07 07:00:20'),
(646, 740.41031315955, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 10:00:16', '2023-04-07 10:00:16', '2023-04-07 10:00:14'),
(647, 741.7693877551, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 13:00:16', '2023-04-07 13:00:16', '2023-04-07 13:00:15'),
(648, 739.7452991453, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 16:00:10', '2023-04-07 16:00:10', '2023-04-07 16:00:09'),
(649, 740.53657657658, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 19:00:42', '2023-04-07 19:00:42', '2023-04-07 19:00:41'),
(650, 736.27787811604, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-07 22:00:07', '2023-04-07 22:00:07', '2023-04-07 22:00:06'),
(651, 735.95948222724, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 01:00:39', '2023-04-08 01:00:39', '2023-04-08 01:00:38'),
(652, 735.01310923302, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 04:00:29', '2023-04-08 04:00:29', '2023-04-08 04:00:26'),
(653, 734.13255813953, '734', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 07:00:36', '2023-04-08 07:00:36', '2023-04-08 07:00:33'),
(654, 737.48499517308, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 10:00:12', '2023-04-08 10:00:12', '2023-04-08 10:00:10'),
(655, 737.54923857868, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 13:00:38', '2023-04-08 13:00:38', '2023-04-08 13:00:37'),
(656, 738.95, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 16:00:18', '2023-04-08 16:00:18', '2023-04-08 16:00:17'),
(657, 738.8005924018, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 19:00:19', '2023-04-08 19:00:19', '2023-04-08 19:00:18'),
(658, 736.41818896165, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-08 22:00:31', '2023-04-08 22:00:31', '2023-04-08 22:00:29'),
(659, 738.8, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 01:00:36', '2023-04-09 01:00:36', '2023-04-09 01:00:34'),
(660, 736.4549490437, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 04:00:51', '2023-04-09 04:00:51', '2023-04-09 04:00:48'),
(661, 738.87980818414, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 07:00:06', '2023-04-09 07:00:06', '2023-04-09 07:00:04'),
(662, 738.79930200673, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 10:00:43', '2023-04-09 10:00:43', '2023-04-09 10:00:42'),
(663, 739.23118514473, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 13:00:42', '2023-04-09 13:00:42', '2023-04-09 13:00:41'),
(664, 738.11435720988, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 19:00:23', '2023-04-09 19:00:23', '2023-04-09 19:00:22'),
(665, 738.64408332102, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-09 22:00:13', '2023-04-09 22:00:13', '2023-04-09 22:00:11'),
(666, 738.77230081906, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 01:00:27', '2023-04-10 01:00:27', '2023-04-10 01:00:25'),
(667, 737.29551598174, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 04:00:40', '2023-04-10 04:00:40', '2023-04-10 04:00:39'),
(668, 739.27579866697, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 07:00:16', '2023-04-10 07:00:16', '2023-04-10 07:00:14'),
(669, 739.001460387, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 10:00:19', '2023-04-10 10:00:19', '2023-04-10 10:00:17'),
(670, 740.29048780488, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 12:52:13', '2023-04-10 12:52:13', '2023-04-10 12:52:10'),
(671, 740.26545138889, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 13:00:44', '2023-04-10 13:00:44', '2023-04-10 13:00:42'),
(672, 739.98771008403, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 16:00:13', '2023-04-10 16:00:13', '2023-04-10 16:00:11'),
(673, 739.73006589786, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 19:00:28', '2023-04-10 19:00:28', '2023-04-10 19:00:26'),
(674, 738.69592439457, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-10 22:00:07', '2023-04-10 22:00:07', '2023-04-10 22:00:06'),
(675, 737.79382329945, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 01:00:23', '2023-04-11 01:00:23', '2023-04-11 01:00:21'),
(676, 737.48773084271, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 04:00:48', '2023-04-11 04:00:48', '2023-04-11 04:00:36'),
(677, 738.17771797632, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 07:00:31', '2023-04-11 07:00:31', '2023-04-11 07:00:28'),
(678, 732.59593306657, '732', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 10:00:49', '2023-04-11 10:00:49', '2023-04-11 10:00:47'),
(679, 734.08894241296, '734', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 13:00:41', '2023-04-11 13:00:41', '2023-04-11 13:00:40'),
(680, 734.52783195799, '734', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 16:00:44', '2023-04-11 16:00:44', '2023-04-11 16:00:42'),
(681, 731.68886973386, '731', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 19:00:49', '2023-04-11 19:00:49', '2023-04-11 19:00:47'),
(682, 725.030651341, '725', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-11 22:00:46', '2023-04-11 22:00:46', '2023-04-11 22:00:44'),
(683, 720.39316089434, '720', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 01:00:02', '2023-04-12 01:00:02', '2023-04-12 01:00:00'),
(684, 720.16231812577, '720', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 04:00:41', '2023-04-12 04:00:41', '2023-04-12 04:00:38'),
(685, 724.80983985541, '724', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 07:00:13', '2023-04-12 07:00:13', '2023-04-12 07:00:10'),
(686, 721.03993610224, '721', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 10:00:27', '2023-04-12 10:00:27', '2023-04-12 10:00:26'),
(687, 735.77024567789, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 13:00:08', '2023-04-12 13:00:08', '2023-04-12 13:00:07'),
(688, 735.24826935179, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 16:00:31', '2023-04-12 16:00:31', '2023-04-12 16:00:29'),
(689, 736.35, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 19:00:06', '2023-04-12 19:00:06', '2023-04-12 19:00:05'),
(690, 737.83620488941, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-12 22:00:05', '2023-04-12 22:00:05', '2023-04-12 22:00:03'),
(691, 738.16193960261, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 01:00:22', '2023-04-13 01:00:22', '2023-04-13 01:00:20'),
(692, 738.54617486339, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 04:00:43', '2023-04-13 04:00:43', '2023-04-13 04:00:41'),
(693, 739.02909983633, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 07:00:02', '2023-04-13 07:00:02', '2023-04-13 07:00:00'),
(694, 739.52563176895, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 10:00:07', '2023-04-13 10:00:07', '2023-04-13 10:00:06'),
(695, 741.05740905058, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 13:00:49', '2023-04-13 13:00:49', '2023-04-13 13:00:47'),
(696, 741.78148914168, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 14:57:02', '2023-04-13 14:57:02', '2023-04-13 14:56:59'),
(697, 742.54003150599, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 16:00:35', '2023-04-13 16:00:35', '2023-04-13 16:00:34'),
(698, 742.63193046661, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 19:00:32', '2023-04-13 19:00:32', '2023-04-13 19:00:30'),
(699, 739.71891891892, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-13 22:00:10', '2023-04-13 22:00:10', '2023-04-13 22:00:07'),
(700, 741.75389042848, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 01:00:12', '2023-04-14 01:00:12', '2023-04-14 01:00:11'),
(701, 742.48426197458, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 04:00:47', '2023-04-14 04:00:47', '2023-04-14 04:00:46'),
(702, 743.05, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 07:00:19', '2023-04-14 07:00:19', '2023-04-14 07:00:17'),
(703, 741.88559031742, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 10:00:41', '2023-04-14 10:00:41', '2023-04-14 10:00:39'),
(704, 742.21665735048, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 13:00:10', '2023-04-14 13:00:10', '2023-04-14 13:00:09'),
(705, 742.02737507036, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 16:00:49', '2023-04-14 16:00:49', '2023-04-14 16:00:48'),
(706, 743.76487603306, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 19:00:08', '2023-04-14 19:00:08', '2023-04-14 19:00:06'),
(707, 740.66731866341, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-14 22:00:31', '2023-04-14 22:00:31', '2023-04-14 22:00:29'),
(708, 738.34947473737, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 01:00:41', '2023-04-15 01:00:41', '2023-04-15 01:00:40'),
(709, 738.79681175402, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 04:00:50', '2023-04-15 04:00:50', '2023-04-15 04:00:47'),
(710, 740.08428885094, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 07:00:04', '2023-04-15 07:00:04', '2023-04-15 07:00:03'),
(711, 739.83593556949, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 10:00:29', '2023-04-15 10:00:29', '2023-04-15 10:00:27'),
(712, 739.8003342246, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 13:00:24', '2023-04-15 13:00:24', '2023-04-15 13:00:22'),
(713, 741.31119653269, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 16:00:03', '2023-04-15 16:00:03', '2023-04-15 16:00:01'),
(714, 740.61590023915, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 19:00:24', '2023-04-15 19:00:24', '2023-04-15 19:00:23'),
(715, 738.64328183824, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-15 22:00:16', '2023-04-15 22:00:16', '2023-04-15 22:00:14'),
(716, 740.59267105263, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 01:00:35', '2023-04-16 01:00:35', '2023-04-16 01:00:34'),
(717, 740.04552845528, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 04:00:41', '2023-04-16 04:00:41', '2023-04-16 04:00:22'),
(718, 741.45502975347, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 07:00:43', '2023-04-16 07:00:43', '2023-04-16 07:00:42'),
(719, 739.57944716221, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 10:00:39', '2023-04-16 10:00:39', '2023-04-16 10:00:37'),
(720, 740.99596258001, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 13:00:03', '2023-04-16 13:00:03', '2023-04-16 13:00:01'),
(721, 739.98658724058, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 16:00:23', '2023-04-16 16:00:23', '2023-04-16 16:00:22'),
(722, 742.07782189781, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 19:00:36', '2023-04-16 19:00:36', '2023-04-16 19:00:34'),
(723, 741.27685804168, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-16 22:00:16', '2023-04-16 22:00:16', '2023-04-16 22:00:13'),
(724, 741.34002800385, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 01:00:29', '2023-04-17 01:00:29', '2023-04-17 01:00:27'),
(725, 741.48612053222, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 04:00:06', '2023-04-17 04:00:06', '2023-04-17 04:00:04'),
(726, 741.82698064987, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 07:00:39', '2023-04-17 07:00:39', '2023-04-17 07:00:37'),
(727, 742.15526322624, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 10:00:09', '2023-04-17 10:00:09', '2023-04-17 10:00:07'),
(728, 742.30640883978, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 13:00:23', '2023-04-17 13:00:23', '2023-04-17 13:00:22'),
(729, 743.28519769521, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 16:00:13', '2023-04-17 16:00:13', '2023-04-17 16:00:12'),
(730, 743.56168831169, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 19:00:51', '2023-04-17 19:00:51', '2023-04-17 19:00:49'),
(731, 743.7644318749, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-17 22:00:32', '2023-04-17 22:00:32', '2023-04-17 22:00:31'),
(732, 742.61733835595, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 01:00:31', '2023-04-18 01:00:31', '2023-04-18 01:00:29'),
(733, 743.04304506017, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 04:00:09', '2023-04-18 04:00:09', '2023-04-18 04:00:07'),
(734, 742.91977985508, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 07:00:14', '2023-04-18 07:00:14', '2023-04-18 07:00:11'),
(735, 742.89368168488, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 10:00:51', '2023-04-18 10:00:51', '2023-04-18 10:00:50'),
(736, 743.37021276596, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 13:00:02', '2023-04-18 13:00:02', '2023-04-18 13:00:01'),
(737, 744.19624222395, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 16:00:50', '2023-04-18 16:00:50', '2023-04-18 16:00:48'),
(738, 743.15870702374, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 19:00:14', '2023-04-18 19:00:14', '2023-04-18 19:00:13'),
(739, 743.49021065675, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-18 22:00:38', '2023-04-18 22:00:38', '2023-04-18 22:00:36'),
(740, 743.39285714286, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 01:00:20', '2023-04-19 01:00:20', '2023-04-19 01:00:18'),
(741, 742.39678868772, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 04:00:36', '2023-04-19 04:00:36', '2023-04-19 04:00:35'),
(742, 743.28366684694, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 07:00:35', '2023-04-19 07:00:35', '2023-04-19 07:00:34'),
(743, 742.78828873224, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 10:00:08', '2023-04-19 10:00:08', '2023-04-19 10:00:07'),
(744, 744.17730661696, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 13:00:14', '2023-04-19 13:00:14', '2023-04-19 13:00:13'),
(745, 744.46888888889, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 16:00:13', '2023-04-19 16:00:13', '2023-04-19 16:00:12'),
(746, 744.7429983275, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 19:00:10', '2023-04-19 19:00:10', '2023-04-19 19:00:09'),
(747, 743.2196644534, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-19 22:00:22', '2023-04-19 22:00:22', '2023-04-19 22:00:20'),
(748, 742.57937362031, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 01:00:41', '2023-04-20 01:00:41', '2023-04-20 01:00:39'),
(749, 744.1147766323, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 04:00:16', '2023-04-20 04:00:16', '2023-04-20 04:00:14'),
(750, 744, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 07:00:31', '2023-04-20 07:00:31', '2023-04-20 07:00:30'),
(751, 743.88911294726, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 10:00:26', '2023-04-20 10:00:26', '2023-04-20 10:00:25'),
(752, 745.67534046693, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 13:00:14', '2023-04-20 13:00:14', '2023-04-20 13:00:12'),
(753, 742.33192771084, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 16:00:10', '2023-04-20 16:00:10', '2023-04-20 16:00:08'),
(754, 741.89868144468, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 19:00:44', '2023-04-20 19:00:44', '2023-04-20 19:00:43'),
(755, 739.19133105802, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-20 22:00:41', '2023-04-20 22:00:41', '2023-04-20 22:00:40'),
(756, 740.14307116105, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 01:00:21', '2023-04-21 01:00:21', '2023-04-21 01:00:20'),
(757, 738.26756756757, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 04:00:04', '2023-04-21 04:00:04', '2023-04-21 04:00:03'),
(758, 738.09736195231, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 07:00:41', '2023-04-21 07:00:41', '2023-04-21 07:00:40'),
(759, 738.89396551724, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 10:00:12', '2023-04-21 10:00:12', '2023-04-21 10:00:11'),
(760, 740.19576659039, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 13:00:39', '2023-04-21 13:00:39', '2023-04-21 13:00:38'),
(761, 738.69948563351, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 16:00:16', '2023-04-21 16:00:16', '2023-04-21 16:00:14'),
(762, 738.8035962877, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 19:00:41', '2023-04-21 19:00:41', '2023-04-21 19:00:39'),
(763, 737.36480689088, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-21 22:00:32', '2023-04-21 22:00:32', '2023-04-21 22:00:30'),
(764, 738.38208641894, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 01:00:12', '2023-04-22 01:00:12', '2023-04-22 01:00:10'),
(765, 739.35, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 04:00:25', '2023-04-22 04:00:25', '2023-04-22 04:00:24'),
(766, 735.49618999587, '735', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 07:00:19', '2023-04-22 07:00:19', '2023-04-22 07:00:18'),
(767, 739.04358452138, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 10:00:39', '2023-04-22 10:00:39', '2023-04-22 10:00:37'),
(768, 737.89290250769, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 13:00:46', '2023-04-22 13:00:46', '2023-04-22 13:00:44'),
(769, 738.58990189445, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 16:00:41', '2023-04-22 16:00:41', '2023-04-22 16:00:40'),
(770, 737.45, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 19:00:33', '2023-04-22 19:00:33', '2023-04-22 19:00:31'),
(771, 737.6138996139, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-22 22:00:18', '2023-04-22 22:00:18', '2023-04-22 22:00:17'),
(772, 739.17806857226, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 01:00:33', '2023-04-23 01:00:33', '2023-04-23 01:00:31'),
(773, 738.85059760956, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 04:00:15', '2023-04-23 04:00:15', '2023-04-23 04:00:14'),
(774, 739.80893566245, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 07:00:29', '2023-04-23 07:00:29', '2023-04-23 07:00:27'),
(775, 739.61119159947, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 10:00:28', '2023-04-23 10:00:28', '2023-04-23 10:00:24');
INSERT INTO `exchange_rates` (`id`, `rate_decimal`, `rate_normal`, `assets_id_from`, `assets_id_to`, `status`, `compare`, `ordering`, `created_at`, `updated_at`, `exchange_time`) VALUES
(776, 739.29984976506, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 13:00:24', '2023-04-23 13:00:24', '2023-04-23 13:00:23'),
(777, 740.51372162918, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 16:00:37', '2023-04-23 16:00:37', '2023-04-23 16:00:35'),
(778, 739.62053401144, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 19:00:20', '2023-04-23 19:00:20', '2023-04-23 19:00:18'),
(779, 738.86166591292, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-23 22:00:24', '2023-04-23 22:00:24', '2023-04-23 22:00:23'),
(780, 741.24517657577, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 01:00:02', '2023-04-24 01:00:02', '2023-04-24 01:00:01'),
(781, 741.16595174263, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 04:00:42', '2023-04-24 04:00:42', '2023-04-24 04:00:40'),
(782, 742.33993710692, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 07:00:32', '2023-04-24 07:00:32', '2023-04-24 07:00:30'),
(783, 742.81011366722, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 10:00:26', '2023-04-24 10:00:26', '2023-04-24 10:00:24'),
(784, 743.13391058491, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 13:00:34', '2023-04-24 13:00:34', '2023-04-24 13:00:32'),
(785, 742.16538293217, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 16:00:38', '2023-04-24 16:00:38', '2023-04-24 16:00:36'),
(786, 741.72254976447, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 19:00:40', '2023-04-24 19:00:40', '2023-04-24 19:00:39'),
(787, 741.19125248509, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-24 22:00:23', '2023-04-24 22:00:23', '2023-04-24 22:00:20'),
(788, 739.47855493998, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 01:00:16', '2023-04-25 01:00:16', '2023-04-25 01:00:14'),
(789, 738.73913582159, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 04:00:40', '2023-04-25 04:00:40', '2023-04-25 04:00:38'),
(790, 734.31567301782, '734', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 07:00:22', '2023-04-25 07:00:22', '2023-04-25 07:00:21'),
(791, 736.49417591125, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 10:00:06', '2023-04-25 10:00:06', '2023-04-25 10:00:04'),
(792, 739.19418514947, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 13:00:28', '2023-04-25 13:00:28', '2023-04-25 13:00:26'),
(793, 737.22133521724, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 16:00:32', '2023-04-25 16:00:32', '2023-04-25 16:00:30'),
(794, 738.88967290087, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 19:00:17', '2023-04-25 19:00:17', '2023-04-25 19:00:15'),
(795, 739.07816797123, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-25 22:00:22', '2023-04-25 22:00:22', '2023-04-25 22:00:20'),
(796, 740.56858668165, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 01:00:41', '2023-04-26 01:00:41', '2023-04-26 01:00:40'),
(797, 741.02628836132, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 04:00:50', '2023-04-26 04:00:50', '2023-04-26 04:00:48'),
(798, 738.68955466951, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 07:00:45', '2023-04-26 07:00:45', '2023-04-26 07:00:43'),
(799, 739.7079091621, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 10:00:36', '2023-04-26 10:00:36', '2023-04-26 10:00:35'),
(800, 743.5670995671, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 13:00:21', '2023-04-26 13:00:21', '2023-04-26 13:00:19'),
(801, 743.79759206799, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 16:00:10', '2023-04-26 16:00:10', '2023-04-26 16:00:08'),
(802, 741.49069767442, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 19:00:33', '2023-04-26 19:00:33', '2023-04-26 19:00:32'),
(803, 740.83591160221, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-26 22:00:10', '2023-04-26 22:00:10', '2023-04-26 22:00:09'),
(804, 744.02693701467, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 01:00:42', '2023-04-27 01:00:42', '2023-04-27 01:00:40'),
(805, 740.7, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 04:00:22', '2023-04-27 04:00:22', '2023-04-27 04:00:20'),
(806, 740.60227125243, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 07:00:17', '2023-04-27 07:00:17', '2023-04-27 07:00:16'),
(807, 747.42200452148, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 10:00:05', '2023-04-27 10:00:05', '2023-04-27 10:00:03'),
(808, 743.69328760412, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 13:00:35', '2023-04-27 13:00:35', '2023-04-27 13:00:33'),
(809, 743.7, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 16:00:29', '2023-04-27 16:00:29', '2023-04-27 16:00:27'),
(810, 742.93879755754, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 19:00:22', '2023-04-27 19:00:22', '2023-04-27 19:00:20'),
(811, 743.2153024911, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-27 22:00:24', '2023-04-27 22:00:24', '2023-04-27 22:00:22'),
(812, 743.24122211445, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 01:00:23', '2023-04-28 01:00:23', '2023-04-28 01:00:22'),
(813, 741.44749652295, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 04:00:20', '2023-04-28 04:00:20', '2023-04-28 04:00:19'),
(814, 740.57612263859, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 07:00:50', '2023-04-28 07:00:50', '2023-04-28 07:00:48'),
(815, 742.64013623978, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 10:00:37', '2023-04-28 10:00:37', '2023-04-28 10:00:35'),
(816, 738.83042218021, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 13:00:39', '2023-04-28 13:00:39', '2023-04-28 13:00:37'),
(817, 742.58337924702, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 16:00:19', '2023-04-28 16:00:19', '2023-04-28 16:00:18'),
(818, 741.45966534566, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 19:00:45', '2023-04-28 19:00:45', '2023-04-28 19:00:43'),
(819, 740.29834187848, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-28 22:00:38', '2023-04-28 22:00:38', '2023-04-28 22:00:36'),
(820, 738.39658315324, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 01:00:43', '2023-04-29 01:00:43', '2023-04-29 01:00:41'),
(821, 738.88653526228, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 04:00:21', '2023-04-29 04:00:21', '2023-04-29 04:00:19'),
(822, 740.597362683, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 07:00:11', '2023-04-29 07:00:11', '2023-04-29 07:00:09'),
(823, 740.46752333094, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 10:00:22', '2023-04-29 10:00:22', '2023-04-29 10:00:20'),
(824, 741.96486486486, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 13:00:32', '2023-04-29 13:00:32', '2023-04-29 13:00:30'),
(825, 739.89989545217, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 16:00:38', '2023-04-29 16:00:38', '2023-04-29 16:00:36'),
(826, 737.8397298519, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 19:00:17', '2023-04-29 19:00:17', '2023-04-29 19:00:14'),
(827, 737.16590878872, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-29 22:00:37', '2023-04-29 22:00:37', '2023-04-29 22:00:35'),
(828, 739.41241864098, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 01:00:16', '2023-04-30 01:00:16', '2023-04-30 01:00:14'),
(829, 740.0712160804, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 04:00:36', '2023-04-30 04:00:36', '2023-04-30 04:00:34'),
(830, 739.86209357653, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 07:00:36', '2023-04-30 07:00:36', '2023-04-30 07:00:33'),
(831, 738.49234577813, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 10:00:06', '2023-04-30 10:00:06', '2023-04-30 10:00:03'),
(832, 738.42356621481, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 13:00:34', '2023-04-30 13:00:34', '2023-04-30 13:00:33'),
(833, 739.92507836991, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 16:00:09', '2023-04-30 16:00:09', '2023-04-30 16:00:06'),
(834, 741.69386006166, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 19:00:29', '2023-04-30 19:00:29', '2023-04-30 19:00:27'),
(835, 738.19934689308, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-04-30 22:00:43', '2023-04-30 22:00:43', '2023-04-30 22:00:42'),
(836, 739.42273336311, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 01:00:29', '2023-05-01 01:00:29', '2023-05-01 01:00:27'),
(837, 740.37950418994, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 04:00:14', '2023-05-01 04:00:14', '2023-05-01 04:00:12'),
(838, 740.28262015818, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 07:00:07', '2023-05-01 07:00:07', '2023-05-01 07:00:04'),
(839, 740.74705882353, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 10:00:45', '2023-05-01 10:00:45', '2023-05-01 10:00:43'),
(840, 740.26338797814, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 13:00:46', '2023-05-01 13:00:46', '2023-05-01 13:00:42'),
(841, 740.20530227948, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 16:00:45', '2023-05-01 16:00:45', '2023-05-01 16:00:43'),
(842, 740.01030070377, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 19:00:43', '2023-05-01 19:00:43', '2023-05-01 19:00:41'),
(843, 738.15967399008, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-01 22:00:35', '2023-05-01 22:00:35', '2023-05-01 22:00:34'),
(844, 738.69402129402, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 01:00:07', '2023-05-02 01:00:07', '2023-05-02 01:00:06'),
(845, 737.62272291467, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 04:00:24', '2023-05-02 04:00:24', '2023-05-02 04:00:23'),
(846, 736.7537037037, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 07:00:38', '2023-05-02 07:00:38', '2023-05-02 07:00:36'),
(847, 737.50746122449, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 10:00:09', '2023-05-02 10:00:09', '2023-05-02 10:00:07'),
(848, 737.71903114187, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 13:00:10', '2023-05-02 13:00:10', '2023-05-02 13:00:08'),
(849, 739.08714909545, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 16:00:47', '2023-05-02 16:00:47', '2023-05-02 16:00:46'),
(850, 740.50921409214, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 19:00:28', '2023-05-02 19:00:28', '2023-05-02 19:00:25'),
(851, 739.02840423556, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-02 22:00:17', '2023-05-02 22:00:17', '2023-05-02 22:00:15'),
(852, 741.3849544428, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 01:00:50', '2023-05-03 01:00:50', '2023-05-03 01:00:49'),
(853, 739.64570982839, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 04:00:13', '2023-05-03 04:00:13', '2023-05-03 04:00:12'),
(854, 740.15897262589, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 07:00:44', '2023-05-03 07:00:44', '2023-05-03 07:00:42'),
(855, 740.60218646865, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 10:00:29', '2023-05-03 10:00:29', '2023-05-03 10:00:27'),
(856, 741.00400767939, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 13:00:49', '2023-05-03 13:00:49', '2023-05-03 13:00:48'),
(857, 742.01471637326, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 16:00:08', '2023-05-03 16:00:08', '2023-05-03 16:00:06'),
(858, 738.08301980367, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 19:00:33', '2023-05-03 19:00:33', '2023-05-03 19:00:31'),
(859, 736.8555416644, '736', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-03 22:00:42', '2023-05-03 22:00:42', '2023-05-03 22:00:41'),
(860, 737.85897837668, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 01:00:46', '2023-05-04 01:00:46', '2023-05-04 01:00:44'),
(861, 737.36515569027, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 04:00:23', '2023-05-04 04:00:23', '2023-05-04 04:00:21'),
(862, 737.31287239325, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 07:00:35', '2023-05-04 07:00:35', '2023-05-04 07:00:33'),
(863, 738.03392226148, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 10:00:48', '2023-05-04 10:00:48', '2023-05-04 10:00:47'),
(864, 737.77382586318, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 13:00:15', '2023-05-04 13:00:15', '2023-05-04 13:00:13'),
(865, 738.55458673933, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 15:29:54', '2023-05-04 15:29:54', '2023-05-04 15:29:51'),
(866, 739.34080566953, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 16:00:33', '2023-05-04 16:00:33', '2023-05-04 16:00:31'),
(867, 740.14698144233, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 19:00:43', '2023-05-04 19:00:43', '2023-05-04 19:00:41'),
(868, 739.61483728627, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-04 22:00:02', '2023-05-04 22:00:02', '2023-05-04 22:00:01'),
(869, 737.89998014297, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 01:00:49', '2023-05-05 01:00:49', '2023-05-05 01:00:48'),
(870, 740.90914597214, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 04:00:22', '2023-05-05 04:00:22', '2023-05-05 04:00:20'),
(871, 741.29265822785, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 07:00:40', '2023-05-05 07:00:40', '2023-05-05 07:00:39'),
(872, 739.66347609466, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 10:00:45', '2023-05-05 10:00:45', '2023-05-05 10:00:43'),
(873, 739.23111795775, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 13:00:11', '2023-05-05 13:00:11', '2023-05-05 13:00:09'),
(874, 738.55960791566, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 16:00:08', '2023-05-05 16:00:08', '2023-05-05 16:00:07'),
(875, 739.13793911007, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 19:00:43', '2023-05-05 19:00:43', '2023-05-05 19:00:41'),
(876, 737.35629963511, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-05 22:00:06', '2023-05-05 22:00:06', '2023-05-05 22:00:05'),
(877, 739.07155465037, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 01:00:27', '2023-05-06 01:00:27', '2023-05-06 01:00:26'),
(878, 738.44915953699, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 04:00:32', '2023-05-06 04:00:32', '2023-05-06 04:00:29'),
(879, 737.85177065767, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 07:00:05', '2023-05-06 07:00:05', '2023-05-06 07:00:03'),
(880, 738.65, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 10:00:38', '2023-05-06 10:00:38', '2023-05-06 10:00:36'),
(881, 737.68216229589, '737', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 13:00:42', '2023-05-06 13:00:42', '2023-05-06 13:00:41'),
(882, 738.92309042209, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 16:00:37', '2023-05-06 16:00:37', '2023-05-06 16:00:36'),
(883, 739.49800074506, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 19:00:46', '2023-05-06 19:00:46', '2023-05-06 19:00:44'),
(884, 739.32576791809, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-06 22:00:22', '2023-05-06 22:00:22', '2023-05-06 22:00:21'),
(885, 739.76159874608, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 01:00:38', '2023-05-07 01:00:38', '2023-05-07 01:00:37'),
(886, 739.49610728327, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 04:00:28', '2023-05-07 04:00:28', '2023-05-07 04:00:26'),
(887, 738.68590610329, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 07:00:40', '2023-05-07 07:00:40', '2023-05-07 07:00:38'),
(888, 738.94238235294, '738', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 10:00:08', '2023-05-07 10:00:08', '2023-05-07 10:00:05'),
(889, 740.25040935673, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 13:00:43', '2023-05-07 13:00:43', '2023-05-07 13:00:41'),
(890, 740.35136226034, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 16:00:08', '2023-05-07 16:00:08', '2023-05-07 16:00:07'),
(891, 741.00994169096, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 19:00:30', '2023-05-07 19:00:30', '2023-05-07 19:00:28'),
(892, 740.01121650462, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-07 22:00:03', '2023-05-07 22:00:03', '2023-05-07 22:00:01'),
(893, 740.52925170068, '740', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 01:00:19', '2023-05-08 01:00:19', '2023-05-08 01:00:18'),
(894, 739.90148126056, '739', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 04:00:25', '2023-05-08 04:00:25', '2023-05-08 04:00:24'),
(895, 751.16176251178, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 07:00:41', '2023-05-08 07:00:41', '2023-05-08 07:00:39'),
(896, 741.0974537037, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 10:00:11', '2023-05-08 10:00:11', '2023-05-08 10:00:10'),
(897, 742.00866141732, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 13:00:33', '2023-05-08 13:00:33', '2023-05-08 13:00:32'),
(898, 741.32811510395, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 16:00:34', '2023-05-08 16:00:34', '2023-05-08 16:00:32'),
(899, 741.85105315948, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 19:00:42', '2023-05-08 19:00:42', '2023-05-08 19:00:39'),
(900, 742.01836994588, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-08 22:00:15', '2023-05-08 22:00:15', '2023-05-08 22:00:13'),
(901, 742.25169219808, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 01:00:42', '2023-05-09 01:00:42', '2023-05-09 01:00:40'),
(902, 741.20069513406, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 04:00:39', '2023-05-09 04:00:39', '2023-05-09 04:00:38'),
(903, 741.8553064275, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 07:00:22', '2023-05-09 07:00:22', '2023-05-09 07:00:21'),
(904, 741.97733316287, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 10:00:03', '2023-05-09 10:00:03', '2023-05-09 10:00:02'),
(905, 741.62, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 13:00:48', '2023-05-09 13:00:48', '2023-05-09 13:00:47'),
(906, 742.98026219956, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 16:00:26', '2023-05-09 16:00:26', '2023-05-09 16:00:24'),
(907, 742.52949002217, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 19:00:17', '2023-05-09 19:00:17', '2023-05-09 19:00:15'),
(908, 742.18728809512, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-09 22:00:40', '2023-05-09 22:00:40', '2023-05-09 22:00:38'),
(909, 744.26291486291, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 01:00:23', '2023-05-10 01:00:23', '2023-05-10 01:00:22'),
(910, 745.95163070748, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 04:00:51', '2023-05-10 04:00:51', '2023-05-10 04:00:50'),
(911, 745.8942339374, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 07:00:35', '2023-05-10 07:00:35', '2023-05-10 07:00:34'),
(912, 743.82282157676, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 10:00:16', '2023-05-10 10:00:16', '2023-05-10 10:00:14'),
(913, 741.69278285249, '741', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 13:00:46', '2023-05-10 13:00:46', '2023-05-10 13:00:45'),
(914, 745.52768532526, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 16:00:33', '2023-05-10 16:00:33', '2023-05-10 16:00:32'),
(915, 743.19439379243, '743', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 19:00:39', '2023-05-10 19:00:39', '2023-05-10 19:00:36'),
(916, 742.75571486268, '742', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-10 22:00:43', '2023-05-10 22:00:43', '2023-05-10 22:00:41'),
(917, 746.09532327371, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 01:00:41', '2023-05-11 01:00:41', '2023-05-11 01:00:40'),
(918, 745.02254273504, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 04:00:15', '2023-05-11 04:00:15', '2023-05-11 04:00:13'),
(919, 744.07437901685, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 07:00:12', '2023-05-11 07:00:12', '2023-05-11 07:00:11'),
(920, 746.4, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 10:00:08', '2023-05-11 10:00:08', '2023-05-11 10:00:06'),
(921, 746.18956435596, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 13:00:32', '2023-05-11 13:00:32', '2023-05-11 13:00:30'),
(922, 746.17609469935, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 16:00:42', '2023-05-11 16:00:42', '2023-05-11 16:00:41'),
(923, 747.28341968912, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 19:00:06', '2023-05-11 19:00:06', '2023-05-11 19:00:04'),
(924, 746.70136276608, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-11 22:00:32', '2023-05-11 22:00:32', '2023-05-11 22:00:30'),
(925, 748.71271843833, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 01:00:29', '2023-05-12 01:00:29', '2023-05-12 01:00:27'),
(926, 745.41819645733, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 04:00:06', '2023-05-12 04:00:06', '2023-05-12 04:00:04'),
(927, 745.16363636364, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 07:00:27', '2023-05-12 07:00:27', '2023-05-12 07:00:25'),
(928, 744.40495049505, '744', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 10:00:17', '2023-05-12 10:00:17', '2023-05-12 10:00:16'),
(929, 746.4127459885, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 13:00:39', '2023-05-12 13:00:39', '2023-05-12 13:00:37'),
(930, 748.40882703777, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 16:00:28', '2023-05-12 16:00:28', '2023-05-12 16:00:25'),
(931, 749.00593640875, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 19:00:32', '2023-05-12 19:00:32', '2023-05-12 19:00:30'),
(932, 748.58659994911, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-12 22:00:09', '2023-05-12 22:00:09', '2023-05-12 22:00:08'),
(933, 747.51826579887, '747', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 01:00:24', '2023-05-13 01:00:24', '2023-05-13 01:00:23'),
(934, 746.27201166181, '746', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 04:00:20', '2023-05-13 04:00:20', '2023-05-13 04:00:18'),
(935, 745.61672371638, '745', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 07:00:20', '2023-05-13 07:00:20', '2023-05-13 07:00:18'),
(936, 748.5, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 10:00:34', '2023-05-13 10:00:34', '2023-05-13 10:00:32'),
(937, 748.28568291612, '748', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 13:00:42', '2023-05-13 13:00:42', '2023-05-13 13:00:40'),
(938, 750.91768692117, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 16:00:24', '2023-05-13 16:00:24', '2023-05-13 16:00:21'),
(939, 751.38068803753, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 19:00:21', '2023-05-13 19:00:21', '2023-05-13 19:00:20'),
(940, 749.35192878338, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 20:54:11', '2023-05-13 20:54:11', '2023-05-13 20:54:07'),
(941, 749.09857623493, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 21:15:31', '2023-05-13 21:15:31', '2023-05-13 21:15:28'),
(942, 749.09857623493, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 21:15:56', '2023-05-13 21:15:56', '2023-05-13 21:15:30'),
(943, 749.35222672065, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-13 22:00:42', '2023-05-13 22:00:42', '2023-05-13 22:00:41'),
(944, 749.71566951567, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 01:00:32', '2023-05-14 01:00:32', '2023-05-14 01:00:31'),
(945, 749.18904169635, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 04:00:47', '2023-05-14 04:00:47', '2023-05-14 04:00:45'),
(946, 751.80869565217, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 07:00:26', '2023-05-14 07:00:26', '2023-05-14 07:00:24'),
(947, 750.54807861028, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 10:00:13', '2023-05-14 10:00:13', '2023-05-14 10:00:11'),
(948, 750.59272001165, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 13:00:35', '2023-05-14 13:00:35', '2023-05-14 13:00:34'),
(949, 750.87084598698, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 16:00:49', '2023-05-14 16:00:49', '2023-05-14 16:00:48'),
(950, 749.8, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 19:00:10', '2023-05-14 19:00:10', '2023-05-14 19:00:08'),
(951, 749.34820801124, '749', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-14 22:00:06', '2023-05-14 22:00:06', '2023-05-14 22:00:04'),
(952, 750.59187969925, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 01:00:29', '2023-05-15 01:00:29', '2023-05-15 01:00:27'),
(953, 751.35642252484, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 04:00:23', '2023-05-15 04:00:23', '2023-05-15 04:00:21'),
(954, 750.78287990508, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 07:00:46', '2023-05-15 07:00:46', '2023-05-15 07:00:45'),
(955, 750.94739069111, '750', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 10:00:30', '2023-05-15 10:00:30', '2023-05-15 10:00:29'),
(956, 752.3264321608, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 13:00:17', '2023-05-15 13:00:17', '2023-05-15 13:00:16'),
(957, 752.55385315534, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 16:00:07', '2023-05-15 16:00:07', '2023-05-15 16:00:06'),
(958, 752.59400711386, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 19:00:27', '2023-05-15 19:00:27', '2023-05-15 19:00:26'),
(959, 751.69063393473, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-15 22:00:07', '2023-05-15 22:00:07', '2023-05-15 22:00:06'),
(960, 751.29985703052, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 01:00:14', '2023-05-16 01:00:14', '2023-05-16 01:00:13'),
(961, 753.92135135135, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 04:00:08', '2023-05-16 04:00:08', '2023-05-16 04:00:06'),
(962, 751.87497087702, '751', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 07:00:27', '2023-05-16 07:00:27', '2023-05-16 07:00:26'),
(963, 753.92993492408, '753', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 10:00:34', '2023-05-16 10:00:34', '2023-05-16 10:00:33'),
(964, 752.29856386999, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 12:49:49', '2023-05-16 12:49:49', '2023-05-16 12:49:46'),
(965, 752.29856386999, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 12:50:18', '2023-05-16 12:50:18', '2023-05-16 12:49:48'),
(966, 752.17878151261, '752', 'USDT', 'NGN', 2, NULL, 10000, '2023-05-16 13:00:35', '2023-05-16 13:00:35', '2023-05-16 13:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `express_payout_histories`
--

CREATE TABLE `express_payout_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tx_ref` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `bank` varchar(191) NOT NULL,
  `account_number` varchar(191) NOT NULL,
  `recipient_name` varchar(191) NOT NULL,
  `recipient_code` varchar(191) NOT NULL,
  `channel` varchar(191) NOT NULL,
  `status` enum('pending','fail','success','manual_confirmation') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `session_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `express_payout_histories`
--

INSERT INTO `express_payout_histories` (`id`, `tx_ref`, `amount`, `bank`, `account_number`, `recipient_name`, `recipient_code`, `channel`, `status`, `created_at`, `updated_at`, `session_id`) VALUES
(1, 'f492f998-a0d4-4315-afb5-29c5b0ba15e3', '500182.00', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'manual-payment--YKrAhyZ7MGuqtbTN9H5H', 'Bank/Mobil-money/transfer', 'manual_confirmation', '2023-05-13 18:11:52', '2023-05-13 18:11:52', 'D0LiwW4a5cl0lSdgEJlBZRKIGAU7a98CyLJFK9bXI7SihixMLliJjnDag8H3'),
(2, '05aa2b63-d09d-4896-a146-ad5bde2ae15b', '500182.00', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'manual-payment--lrMr2lFDT7hkSIAbaPuU', 'Bank/Mobil-money/transfer', 'manual_confirmation', '2023-05-13 18:12:03', '2023-05-13 18:12:03', 'D0LiwW4a5cl0lSdgEJlBZRKIGAU7a98CyLJFK9bXI7SihixMLliJjnDag8H3'),
(3, 'ddd0ab68-369d-4174-a14f-e7ab223b0eb5', '500182.00', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'manual-payment--Yk8oRip7DjU9KS12bizs', 'Bank/Mobil-money/transfer', 'manual_confirmation', '2023-05-13 18:12:06', '2023-05-13 18:12:06', 'D0LiwW4a5cl0lSdgEJlBZRKIGAU7a98CyLJFK9bXI7SihixMLliJjnDag8H3'),
(4, '68295d2d-275a-4fb0-87a8-75f417efb538', '500182.00', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'manual-payment--9L7m4ZKSy5zTAzGpMPvA', 'Bank/Mobil-money/transfer', 'manual_confirmation', '2023-05-13 18:12:08', '2023-05-13 18:12:08', 'D0LiwW4a5cl0lSdgEJlBZRKIGAU7a98CyLJFK9bXI7SihixMLliJjnDag8H3'),
(5, '144f89d9-0b7f-4baf-bf69-2cd2a9097bf1', '71551.00', 'PalmPay', '7064530382', 'victor femi odeyemi', 'manual-payment--nKYDJzAR6U1HLFBCZ5EP', 'Bank/Mobil-money/transfer', 'manual_confirmation', '2023-05-13 18:18:54', '2023-05-13 18:18:54', '307r28txaLfMvWsuItULyJSDJc1JfwcGvI1hOaS14WXmYRBxXOQt63S0WP0v');

-- --------------------------------------------------------

--
-- Table structure for table `express_transactions`
--

CREATE TABLE `express_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `wallet_name` varchar(191) NOT NULL,
  `wallet_currency` varchar(191) NOT NULL,
  `wallet_amount` double(8,2) NOT NULL,
  `conversion_name` varchar(191) NOT NULL,
  `conversion_amount` double(8,2) NOT NULL,
  `conversion_percentage` double(8,2) NOT NULL,
  `seller_name` varchar(191) NOT NULL,
  `seller_bank_name` varchar(191) NOT NULL,
  `seller_account_number` varchar(191) NOT NULL,
  `seller_account_name` varchar(191) NOT NULL,
  `express_binding_detail_note` text NOT NULL,
  `express_binding_detail_duration` int(11) NOT NULL DEFAULT 15,
  `express_binding_detail_start_time` datetime NOT NULL,
  `express_binding_detail_end_time` datetime NOT NULL,
  `express_binding_detail_expires` int(11) NOT NULL DEFAULT 0,
  `seller_recieved_payment_confirmation` int(11) NOT NULL DEFAULT 0,
  `buyer_disbursment_confirmation` int(11) NOT NULL DEFAULT 0,
  `transaction_status` enum('processing','pending','expires','success','failure','re_open','closed') NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pop_path` varchar(191) DEFAULT NULL,
  `wallet_name_id` int(11) NOT NULL DEFAULT 0,
  `seller_payment_approval` int(11) NOT NULL DEFAULT 0,
  `express_binding_confirmatio_note` text DEFAULT NULL,
  `pop_confirmation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `express_transactions`
--

INSERT INTO `express_transactions` (`id`, `seller_id`, `buyer_id`, `wallet_id`, `wallet_name`, `wallet_currency`, `wallet_amount`, `conversion_name`, `conversion_amount`, `conversion_percentage`, `seller_name`, `seller_bank_name`, `seller_account_number`, `seller_account_name`, `express_binding_detail_note`, `express_binding_detail_duration`, `express_binding_detail_start_time`, `express_binding_detail_end_time`, `express_binding_detail_expires`, `seller_recieved_payment_confirmation`, `buyer_disbursment_confirmation`, `transaction_status`, `order_id`, `created_at`, `updated_at`, `pop_path`, `wallet_name_id`, `seller_payment_approval`, `express_binding_confirmatio_note`, `pop_confirmation`) VALUES
(1, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 16:43:02', '2023-05-09 17:13:02', 0, 0, 0, 'processing', 'D0LiwW4a5cl0lSdgEJlBZRKIGAU7a98CyLJFK9bXI7SihixMLliJjnDag8H3', '2023-05-09 20:43:02', '2023-05-09 20:43:02', NULL, 0, 0, NULL, 0),
(2, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 16:46:10', '2023-05-09 17:16:10', 0, 0, 0, 'processing', 'NWVNH5ifQHdOgYzqFj15r6NyDKgX7anSEgRuHHk8UkGhddfdAgheFXZM2w5z', '2023-05-09 20:46:10', '2023-05-09 20:46:10', NULL, 0, 0, NULL, 0),
(3, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 16:56:14', '2023-05-09 17:26:14', 0, 0, 0, 'processing', '0cUfo4lg9t19v11XBQ8gsT6QbSctl3vo8BuCjD4GrR6Tf1v0gqv5rTOY7Jlq', '2023-05-09 20:56:14', '2023-05-09 20:56:14', NULL, 0, 0, NULL, 0),
(4, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 17:00:31', '2023-05-09 17:30:31', 0, 0, 0, 'processing', 'VrG6Ry9CsErInobpcMmHs32O4VXn1ecZSfxnqLa8aIBgWylmX3ts5SN1lW4x', '2023-05-09 21:00:31', '2023-05-09 21:00:31', NULL, 0, 0, NULL, 0),
(5, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 17:01:08', '2023-05-09 17:31:08', 0, 0, 0, 'processing', 'r6c0HRFbEXPcphY0CRGoJdYIMoAsPNhGSlJYMdXuNlyizplgCt5aISJoMXTK', '2023-05-09 21:01:08', '2023-05-09 21:01:08', NULL, 0, 0, NULL, 0),
(6, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 17:01:52', '2023-05-09 17:31:52', 0, 0, 0, 'processing', 'bNwgZoIOhczw4GE9pXRDAU44aUeBpxk3RAQ7NWEuJd04uCjqKy8Q2zML7sEE', '2023-05-09 21:01:52', '2023-05-09 21:01:52', NULL, 0, 0, NULL, 0),
(7, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 17:02:53', '2023-05-09 17:32:53', 0, 0, 0, 'processing', 'mAovJhmLcVNpaQJcKp2wUTbMRmyIRUFQI3PeKudvLVzB8jHa6XbqjghCowB4', '2023-05-09 21:02:53', '2023-05-09 21:02:53', NULL, 0, 0, NULL, 0),
(8, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 500182.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 18:47:44', '2023-05-09 19:17:44', 0, 0, 0, 'processing', 'F0Qy7SnN6QEoTfxm6C0PKyNezRzyKQt7P8VbOJ7qsniMcMudb9L1SibqUWxI', '2023-05-09 22:47:44', '2023-05-09 22:47:44', NULL, 0, 0, NULL, 0),
(9, 32, 19, NULL, 'Payoneer', 'USD', 100.00, 'NGN', 71455.00, 3.70, 'Femi Odeyemi', 'PalmPay', '7064530382', 'victor femi odeyemi', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-09 19:01:52', '2023-05-09 19:31:52', 0, 0, 0, 'processing', 'nJJ4uMq4vtDDYEpZ08KoMJEJyEwovj12uEfHwdbxjn3tbMV4IlykLUChzj9W', '2023-05-09 23:01:52', '2023-05-12 23:00:26', '1683659128_IMG-20230509-WA0022.jpg', 0, 1, NULL, 1),
(10, 28, 19, NULL, 'Payoneer', 'USD', 700.00, 'NGN', 502204.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-10 14:21:24', '2023-05-10 14:51:24', 0, 0, 0, 'processing', 'MpC9RMJ5TzAmkhVvOslmVkeWORnuWMVah8CsvFtJcfOQJ5NTEDfgjaqJU8gH', '2023-05-10 18:21:24', '2023-05-10 18:21:24', NULL, 0, 0, NULL, 0),
(11, 32, 19, NULL, 'Payoneer', 'USD', 100.00, 'NGN', 71551.00, 3.70, 'Femi Odeyemi', 'PalmPay', '7064530382', 'victor femi odeyemi', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-10 17:41:10', '2023-05-10 18:11:10', 0, 0, 0, 'processing', '307r28txaLfMvWsuItULyJSDJc1JfwcGvI1hOaS14WXmYRBxXOQt63S0WP0v', '2023-05-10 21:41:10', '2023-05-10 21:41:10', NULL, 0, 0, NULL, 0),
(12, 28, 19, 15, 'Payoneer', 'USD', 700.00, 'NGN', 501530.00, 3.70, 'adeola Oladoja', 'Guaranty Trust Bank', '0121690965', 'OLADOJA ADESHINA ADEOLA', 'The lazy dog lay prone, as if asleep. \n                                                        Nothing unusual there; \n                                                        he normally slept around that hour of the day, \n                                                        and many other hours too, being lazy. \n                                                        This time, however, \n                                                        he chose to rest by a hollow near the path in the forest clearing, \n                                                        where he knew the quick brown fox usually passed.', 30, '2023-05-12 08:56:04', '2023-05-12 09:26:04', 0, 0, 0, 'processing', 'NP0ZkSnk5Jc4Pk65T2XN4AFeH1dsRPnfFB1J8mDkhx95MOF5KyYUrLrSgX7b', '2023-05-12 12:56:04', '2023-05-12 12:56:04', NULL, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `express_transaction_chats`
--

CREATE TABLE `express_transaction_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_rates`
--

CREATE TABLE `feedback_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `question_a` varchar(191) NOT NULL,
  `question_b` varchar(191) NOT NULL,
  `rates` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `session_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_transaction_activities`
--

CREATE TABLE `merchant_transaction_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tnx_ref` varchar(191) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `success` int(11) NOT NULL DEFAULT 0,
  `failure` int(11) NOT NULL DEFAULT 0,
  `ratefy_ref` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(5, '2022_12_29_015051_create_types_table', 1),
(6, '2022_12_29_024756_add_alter_to_users', 1),
(7, '2022_12_30_044137_update_users', 1),
(8, '2022_12_30_044620_add_modify_to_users', 1),
(9, '2022_12_30_122712_add_altered_to_users', 2),
(10, '2022_12_30_152954_create_settings_table', 3),
(11, '2022_12_31_024913_create_blog_social_media_table', 4),
(12, '2022_12_31_220249_add_biography_modification_to_users', 5),
(13, '2022_12_31_220717_add_columns_modification_to_users', 6),
(14, '2023_01_01_052553_add_modified_block_to_users', 7),
(15, '2023_01_01_183636_create_categories_table', 8),
(16, '2023_01_01_183708_create_sub_categories_table', 8),
(17, '2023_01_02_032844_create_posts_table', 9),
(18, '2023_01_03_214929_create_exchange_rates_table', 10),
(19, '2023_01_04_063918_add_modification_time_to_exchange_rates', 11),
(20, '2023_01_04_064515_add_modification_rate_decimal_to_exchange_rates', 12),
(21, '2023_01_07_131929_create_sell_announcements_table', 13),
(22, '2023_01_07_145855_create_selling_profiles_table', 14),
(23, '2023_01_08_061827_add_column_post_tags_to_posts', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Femiivictorr@gmail.com', 'S0JzZG1WMnBiVlU0Vm1tZUhTeXlVZUswN3k2UU1XOW9WZ2xrWlViMGlUVFpPd0RrRGJ2aGJYVndyTXg3ZVhJTg==', '2023-02-03 13:13:33'),
('godwinomosemofa931@gmail.com', 'Rk1LTVVXejRzeUhKTkJHMW1EamNzWG1VdjZXV0kyUTdnZnlkV29LRDczdXJTZGIxRVpNVmlJNVNSVEtqUXZqTw==', '2023-05-04 14:12:47'),
('Femiivictorr@gmail.com', 'VUlOcmZpYTYyZU9yMDZEZzRJazNVMVh3Y2IwSUFVVWdPdWphVEJkcUpUS3MwOEhwbm9xaVNWSEFkV3h0SmFpbA==', '2023-05-05 21:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_title` varchar(191) DEFAULT NULL,
  `post_slug` varchar(191) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_tags` text DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `post_title`, `post_slug`, `post_content`, `post_tags`, `featured_image`, `created_at`, `updated_at`) VALUES
(5, 1, 2, '4 Signs that Shows You Payoneer Exchanger is Cheating You- Withdraw Your Payoneer at the Highest Exchange Rate', '4-signs-that-shows-you-payoneer-exchanger-is-cheating-you-withdraw-your-payoneer-at-the-highest-exchange-rate', '<p>You and I know that nobody will be reading this except they usually have money inside their Payoneer account,</p>\r\n\r\n<p>No matter the kind of work you do online man, you worked hard to get those bucks in it.</p>\r\n\r\n<p>But I know that it comes by <u>being busy with your business.</u>&nbsp; So I don&#39;t want to waste your time,</p>\r\n\r\n<p>I have shortened the stories I had in mind into short points you can read in less than 7 minutes.</p>\r\n\r\n<p>Some of which you know, but don&#39;t pay attention to,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And some of which you may never heard of, which will help you.</p>\r\n\r\n<p><br />\r\n<strong><u>These 4 main points will;</u></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Help you detect if your Payoneer exchanger is giving you a good rate or he has been cheating you.</p>\r\n\r\n<p>2. Let you detect quickly if your Payoneer exchanger is about to rip you.</p>\r\n\r\n<p>3. And as well, give you an escape route away from such Payoneer exchanger to getting you the most lavish dollar to naira transactions possible.<br />\r\n&nbsp;</p>\r\n\r\n<p>Rest your back, and calmly follow me as I start exposing those obvious signs your trusted and tested exchanger don&#39;t want you to notice.</p>\r\n\r\n<p>Let&#39;s get into it.</p>\r\n\r\n<p><strong><u>Is your dollar to naira exchanger in anyway like this?</u></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Then, he is most likely ripping you or planning to rip&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Your Payoneer exchanger doesn&#39;t update his exchange rate immediately naira falls.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>After deliberately following couples of Payoneer exchangers,&nbsp; one thing 90% of them have in common is letting guys fall into old exchange rate trap without knowing it.</p>\r\n\r\n<p>So, they can continue keeping a huge share of your earnings, which shouldn&#39;t be.</p>\r\n\r\n<p>This may presently be costing you ₦30k, ₦70K, ₦100K, depending on the amount of dollars you normally exchange.</p>\r\n\r\n<p><strong><em><u>Here is the clearer picture;</u></em></strong></p>\r\n\r\n<p>Imagine that you made an exchange rate last month at ₦750 per dollar.</p>\r\n\r\n<p>And you exchanged $500. You would get ₦375,000</p>\r\n\r\n<p>Now let&#39;s say you want to exchange another $500 this week, and you&#39;re not aware that the rate has increased to ₦850, While your &#39;tested and trusted&#39; as well didn&#39;t say anything,&nbsp;</p>\r\n\r\n<p>You would be given same ₦375,000</p>\r\n\r\n<p>While you should be given ₦425,00</p>\r\n\r\n<p>That is a whooping ₦50K rip off of your earnings.<br />\r\n&nbsp;</p>\r\n\r\n<p>A good Payoneer exchanger will update his status immediately the rate increases,</p>\r\n\r\n<p>And also send update into your DM to inform you, even if you&#39;re not exchanging yet.</p>\r\n\r\n<p>If you have to ask your Payoneer exchanger before he tells you the current rate, then he was expecting you to get into the trap of the old rate, so he can keep more of your money to himself.</p>\r\n\r\n<p>Look up, I know you won&#39;t believe that your trusted and tested exchanger may&nbsp;be doing you bad.</p>\r\n\r\n<p>So, in order to help you I will give you a safe option.</p>\r\n\r\n<p>👉 Always visit this website (<a href=\"https://www.ratefy.co/#\">Ratefy.co</a>) to check the current rate top Payoneer funds exchanger are giving.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The site updates to the current black market rate every single day, so always confirm the rate your exchanger tells you before moving on with the deal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If&nbsp; your exchanger&#39;s own is lower, then you have a reason to leave.&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>Another obvious sign you need to be aware of is</p>\r\n\r\n<p><strong>2. If your exchanger is acting suspicious after you ask him for rate, then you need to reconsider.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Think about how your exchanger makes you feel whenever you want to deal with him, and decide if this applies to him.</p>\r\n\r\n<p>If it does, normalize going to verify your exchangers rate at www.abc.com before dealing with him again to avoid ripping.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Another alarming sign you need to take note of is,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3. No DP Goons.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We all know them, they don&#39;t like using profile picture on WhatsApp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Most people trust them after making 20 transactions with them, but I stopped trusting them the day one started asking me questions about my Payoneer account.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I want you to understand that it is easy to stay loyal when they are making just consistent ₦20k from you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>But after building trust enough, and you want to exchange about $5,000 which is&nbsp;₦4 million in naira.</p>\r\n\r\n<p>Do you think this kind of person who has no means of identification and have nothing to lose will still remain loyal?&nbsp;Absolute Not.</p>\r\n\r\n<p>There is no exchanger who won&#39;t do the calculation of the #20k&#39;s they will have to make before making the ₦4 million.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And exchanging $1,000 $3,000, $7,000 dollars within the next few months is inevitable for you, base on believing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So, you better take note of who you are building trust with and make sure it is not someone hidden behind blank profile.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>Understand that $500 is not $2K, and such person won&#39;t care about the recurrent #20K from you when he can take away ₦1.6 million at once.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>Even, just ₦500k</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>So my advice?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Stop dealing with any exchanger who has no means of identification.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your suspicions might be right ⚠️</p>\r\n\r\n<p><br />\r\nIncase you are wondering,&nbsp;&nbsp;</p>\r\n\r\n<p><strong><u>Who do I recommend?</u></strong></p>\r\n\r\n<p>I recommend anybody who makes his profile available in public&nbsp;</p>\r\n\r\n<p>And also uses the standard rate as it is on the black Market rate website (<a href=\"https://www.ratefy.co/#\">Ratefy.co</a>)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I know that is not the response you were expecting,&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://wa.link/2h66kq\"><u>Click here</u></a>&nbsp; to message the fastest and award winning exchanger In Nigeria.&nbsp;&nbsp;</p>\r\n\r\n<p>He is the one most of my freelancer friends also use. So, you can rely on him.</p>\r\n\r\n<p>Let&#39;s move on,<br />\r\n&nbsp;</p>\r\n\r\n<p>Another obvious sign you need to be aware of is,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4. If the rate is constant within 3 funds exchange period.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Within the last one year, exchange rate has been fluctuating every single month.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>During my research, I discovered that there is a league of exchangers who don&#39;t like calling out the newest rate &#39;because it may change tomorrow&#39;.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So, they keep exchanging at the previous rate till they are sure that the new rate will maintain for&nbsp; few weeks.</p>\r\n\r\n<p>These ones will tell what the rate is, but won&#39;t tell you until they are sure the rate will be constant for a while.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>While the reason they do this is not obvious to me,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I couldn&#39;t have done you any better favor but letting you know that they will still do the exchange with the current rate,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So why using the previous rate for you?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>But guess what?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If naira increases a bit, this league of exchangers are the ones that post it first on their status.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So, is it fair to say they only care when they don&#39;t want to loose any cash, but doesn&#39;t care if you loose cash to them?</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>Do you notice this about your exchanger?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Then you don&#39;t want to keep being my old self who used to keep bursting his ass in front of computer, while an unfair exchanger is waiting for him to bring the share of his earning.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You don&#39;t want to keep loosing your hard earned money to exchangers who don&#39;t&nbsp;care about you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Would you like to connect with my personal dollar to naira exchanger?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://wa.link/2h66kq\"><u>Click here</u></a> to meet him on WhatsApp.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Note: He is most likely to be the one that sent you this, because I&#39;m gifting this to him for being my best exchanger since January 2022.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>👉$20,000/month soon bro.</strong> So, make sure you&#39;re safe with your exchanger</p>\r\n\r\n<h3>Thanks for reading,</h3>\r\n\r\n<p>Timileyin.</p>', 'Payoneer,Payoneer to Naira,minimum withdraw payoneer,withdraw payoneer account,Paypal to Naira,Fiverr to Naira,Withdraw on Fiverr,Wise to Naira,Exchange Payoner and Paypal to Naira,black market naira rate', '1673642016_Exchange-Payoneer-USD-to-Naira-NGN-at-high-rate-today-Ratefy.jpg', '2023-01-07 11:03:57', '2023-01-20 02:26:45'),
(12, 1, 1, '4 Ways to Exchange Your Dollar to Naira at Black Market Rate', '4-ways-to-exchange-your-dollar-to-naira-at-black-market-rate', '<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Quite a few people (especially freelancers who earn in dollars) have been searching the internet for ways to change the Dollars from their E-wallet(s) for Naira at the black market rate. If you belong to this group of people, then this article is being written specifically for you. We will discuss 4 ways you can exchange your dollars for naira in Nigeria. Let&#39;s begin.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:16pt\"><span style=\"font-family:Arial,sans-serif\"><strong><span dir=\"ltr\" lang=\"EN\" style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">1. Withdraw directly to Domiciliary bank account</span></span></strong></span></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">This is the most accurate way to convert your dollars to naira at the moment. To receive foreign currency, you would need a domiciliary account at a Nigerian bank. Open a domiciliary account at any of the well-known banks in your area by just walking in. You can then use it to receive dollars using the following information:</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Name of the bank</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Account name</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Account number</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">The Address of the bank</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Bank&rsquo;s Swift Code</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Bank&rsquo;s Routing Number</span></span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">The funds will be deposited into your new USD, &quot;domiciliary,&quot; bank account.&nbsp; Now you need to convert your cash to Naira at the best rate feasible. As such, you&#39;ll need to visit Aboki which specializes in currency exchange, make a transfer to them, and receive Naira in return.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:16pt\"><span style=\"font-family:Arial,sans-serif\"><strong><span dir=\"ltr\" lang=\"EN\" style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">2. Through Ratefy.co</span></span></strong></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Ratefy.co is another feasible and stress-free choice. We provide a competitive black market rate for the exchange of U.S. dollars for the Nigerian naira and you will get your Naira almost immediately. To see the current exchange rate, simply choose that option from the List.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Select the platform you are transferring from, be it Payoneer or PayPal. Tap the &quot;calculate&quot; button and enter the amount of USD you want to exchange. After entering the desired amount, tap the sell button and then click the chat icon to initiate a conversation with our staff on WhatsApp.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:16pt\"><span style=\"font-family:Arial,sans-serif\"><strong><span dir=\"ltr\" lang=\"EN\" style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">3. Withdraw through geegpay</span></span></strong></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Geegpay is another platform where you can send and receive money with. In addition to providing USD-only accounts for receiving payments globally, they also allow you to create GBP and EUR accounts. </span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">You must request the USD account when you create a free GeegPay account on their website. Send money to your Geegpay USD account using the account details given.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">Once you receive the money, you can check for the exchange rate from dollar to naira. Click on Convert, choose USD to NGN, and then enter the desired amount. Note that 0.9% of the money you get is deducted by Geegpay.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:16pt\"><span style=\"font-family:Arial,sans-serif\"><strong><span dir=\"ltr\" lang=\"EN\" style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">4. Withdraw through grey.co</span></span></strong></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">The website Grey.co will provide you with a foreign account number. You must then request a Dollar account after registering and verifying your account with them. You will now receive money into this dollar account and then utilize grey.co to convert it to naira at a very good rate.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">But keep in mind that companies like grey.co will buy your dollars at a lesser price because they are doing this as a full-fledged business and must cover employee salaries.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">The final rate you receive after their fees have been subtracted will thus be lower than whatever the current rate is on the Grey.co platform. Which makes the second method discussed in this post more viable.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:16pt\"><span style=\"font-family:Arial,sans-serif\"><strong><span dir=\"ltr\" lang=\"EN\" style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Conclusion</span></span></strong></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial,sans-serif\"><span dir=\"ltr\" lang=\"EN\" style=\"font-family:&quot;Calibri&quot;,sans-serif\">There you have it. Ratefy is your best choice if you want decent rates without the hassle of obtaining a domiciliary account or signing up for one of the platforms listed in this article. Just follow the procedure mentioned above if you want to do an immediate dollar exchange.</span></span></span></p>', 'Ways to Exchange Your Dollar,Dollar to Naira,Dollar to Naira at Black Market Rate,Exchange Payoneer,Excahnge Paypal,Withdraw Fiverr,Wisetransfer to Naira', '1673834617_Ratefy-Payoneer-Paypal-Wise-to-Naira-at-black-market-rate.jpg', '2023-01-16 07:03:38', '2023-01-16 07:03:38'),
(13, 1, 2, 'How to Receive Dollars in Nigeria using Payoneer And Exchange it at Black Market Rate', 'how-to-receive-dollars-in-nigeria-using-payoneer-and-exchange-it-at-black-market-rate', '<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Payment processing services like Payoneer and PayPal are widely used by people who earn money online. Freelancers on platforms like Fiverr and Upwork typically transfer funds to Payoneer.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">The issue they always run into with Payoneer is transferring their earnings to a local Nigerian bank account at the black market rate. In this article, we will discuss ways you can withdraw your Payoneer funds at the black market rate.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>What is Payoneer?</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Payoneer is an online payment platform that enables users to securely and quickly send and receive payments from more than 200 countries and territories worldwide. Payoneer is a great option for Nigerians who want to receive US dollars from abroad. It is a reliable, secure, and cost-effective way to receive and send money from any corner of the globe.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Exchanging Dollars for Naira at Black Market Rate From Payoneer</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Here are the easy ways you can exchange your Payoneer funds for naira at the black market rate.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Exchange With Ratefy.co</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">There is no shortage of websites where you can get this done. After you transfer money from your Payoneer account to a recipient in need, the recipient can deposit the Naira immediately into your bank account at a favorable exchange rate. Most people refrain from doing so because they lack confidence in strangers online.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">This is where Ratefy comes in. You can sell your Payoneer funds at a good black market rate and get the equivalent in Naira immediately. Simply select &quot;Exchange Rate&quot; from the menu. Select Payoneer and input the number of dollars you want to exchange by tapping on &quot;calculate&quot;. Tap on sell after inputting the amount and click the chat icon to message our sAdmin on WhatsApp.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Use a Nigerian Domiciliary Account</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">By using this approach, you may convert your Payoneer to dollars at the precise rate that is in effect at the time. Domiciliary accounts in Nigerian banks allow you to receive foreign currency.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">To create a domiciliary account, simply visit any of the local banks that allow for the creation of such accounts and fill out the necessary paperwork. If you already have a Payoneer account, you may simply sign in and add a new bank account.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Once you have a Domiciliary account, Payoneer will charge a fee whenever funds are sent there. Money will be deposited into your new U.S.-based, &quot;domiciliary,&quot; bank account. You&#39;re reading this blog post because you want to convert your cash to Naira at the best rate currently available.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">But with this method, you will need to go to several different Bureau de change aboki to make the necessary currency exchanges and get payment in Naira. We realize that going outside to complete the tasks at hand may seem burdensome.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">However, it&#39;s worth the effort if you are looking to exchange at the black market rate. Meanwhile, the first stress-free method provided above is still an option.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Conclusion</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">If you are looking to receive dollars in Nigeria, Payoneer is a great option. It is easy to use, reliable, and secure and provides an easy and cost-effective way to send and receive payments from anywhere in the world. Once you have received the dollar, you can then exchange it for Naira at the black market rate. By using a reputable money changer, you can be sure to get a good rate and make the most of your money.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>', 'Dollars,Payoneer,Exchange,Black Market', '1674165073_exchange.jpg', '2023-01-20 02:51:14', '2023-01-21 22:48:51'),
(14, 1, 1, 'How to make wise to wise transaction', 'how-to-make-wise-to-wise-transaction', '<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">I want to show you how you can do a wise-to-wise transfer. I believe you know transfer-wise. So I want to show you how you can transfer from one wise account to another transfer-wise account.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">And the good part about using transfer-wise over Payoneer is that transfer-wise has no threshold before you can do transfer-wise to transfer-wise transaction. As long as you have an activated account, and a USD account balance, or any other currency account balance, you can transfer from one transfer-wise account to another account. </span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">However, you must reach a one-thousand dollar ($1,000) threshold on Payoneer before a transfer can b made between two Payoneer accounts. This is why Transfer-wise is better. </span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Let&#39;s go through it quickly how you can do the transfer.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><img alt=\"\" src=\"https://ratefy.co/storage/my1files/Screenshot_20230122_100936.png\" style=\"height:166px; width:280px\" />&nbsp;</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">These is my transfer-wise account, and there is about $426 USD balance.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">The next step is clicking on the USD, and click on send. Then you have to wait for the page to load. Then get the recipient account detail ready.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Here, we will be sending the same currency from one account to another.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><img alt=\"\" src=\"https://ratefy.co/storage/my1files/Screenshot_20230122_101003.png\" style=\"height:202px; width:280px\" /></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;I will type in the email detail of the person the money will be sent to. This is the person that will be receive the $426.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">As you can see, the total fee is zero. And transfer-wise only deducts the amount I&#39;m sending, which is $426. So I&#39;ll click on Confirm and send. </span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">It should arrive in seconds. As you can see, it will arrive in seconds. </span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">So I enter my password just to confirm that I&#39;m the one sending the payment. Approved transfer using the app. So I need to approve the transfer using my app. So I click on approve of my app.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><img alt=\"\" src=\"https://ratefy.co/storage/my1files/Screenshot_20230122_101054.png\" style=\"height:272px; width:280px\" /></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">It is very fast and the person will receive the money in minutes. So it seems to be the fastest way to send money. It&#39;s an alternative to Payoneer. It&#39;s an alternative to PayPal and it is very fast. </span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">in case you want to sign up for a Wise account, I will attach my referral link below. I will attach my referral link in the description. And if you use my referral link, there will be a fee-free transfer of up to 500 euros when you sign up with my link. </span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">So they&#39;ll give me a commission too for that. Thanks for watching. See you in my next video. And in my next video, I&#39;ll cover the difference between Wise and Payoneer, the area in which Wise is better, and the area in which Payoneer is better.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">So thanks for watching. See you in my next video. You now can get the best deal for your dollar.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">https://youtu.be/lIc2SOl_sxM</span></span></span></p>', 'transfer-wise,account,opening account', '1674381297_Screenshot_20230122_100904.png', '2023-01-22 14:54:57', '2023-01-22 22:50:56'),
(15, 1, 1, 'FIVERR SELLER PROFILE NOT APPROVED . HOW TO OPEN FIVERR SELLER ACCOUNT IN 2023', 'fiverr-seller-profile-not-approved-how-to-open-fiverr-seller-account-in-2023', '<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">With the recent development on Fiverr, a lot of newly created accounts have issues getting their account profile approved. In this article, you will understand how to create a Fiverr profile that is acceptable and guaranteed to be approved by Fiverr.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Fiverr&#39;s active sellers have drastically increased to over three million online and active sellers. Many accounts on Fiverr have broader jobs and gigs. As a result, new Fiverr sellers are not getting jobs. The impact has made Fiverr take a step in regulating accounts created on Fiverr, either new or old accounts.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">According to the experiment carried out on Fiverr, it was discovered that the latest policy Fiverr adopted was seeing accounts narrowed down to a specific niched.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Some of the experiments carried out by Me and a team of Fiverr sellers were creating accounts in different countries, but these accounts were rejected by Fiverr with an explanation.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">We also tried contacting Fiverr for approval of these accounts based on empathy. But the account approvals were denied.&nbsp; </span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">According to our experiment, there is a higher tendency for your account to be rejected if you created a logo design niche on your Fiverr account. This is due to too many Logo design gigs on Fiverr and Fiverr observed that you might not get a job on that gig.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Fiverr only approves your account based on your first gig and only if the niche is narrowed down to an unpopular niche.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">To get more knowledge on how to become successful on Fiver, there is a Fiverr video course created in mind for you. It is free.</span></span></span></p>\r\n\r\n<p><strong><span style=\"color:#ffffff\">Link to Premium Fiverr course Playlist: </span><a href=\"https://www.youtube.com/playlist?list=PLPcZRHrXKW26thzxgEpapdiXWKieeFsNM\"><span style=\"color:#ffffff\">https://www.youtube.com/playlist?list=PLPcZRHrXKW26thzxgEpapdiXWKieeFsNM</span></a></strong></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">In addition, if you have started earning money on your Fiverr account or had been earning money with your Fiverr account. We have a solution to get your fund withdrawn at the black market rate.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">Ratefy. co is a platform that helps you exchange your Payoneer fund at the black-market rate while giving you fair, standard, and reasonable prices for your dollar. You can contact them at </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">https://ratefy.co</span></a></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">Ratefy. co has a track record of legit and successful transactions carried out. </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy. co</span></a><span style=\"color:#ffffff\"> is open 24/7 for your transaction needs and inquiries.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">Should you have any fund withdrawals from Payoneer, don&#39;t hesitate to contact </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">ratefy. co</span></a><span style=\"color:#ffffff\">. </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">https://ratefy.co</span></a></span></span><br />\r\n<br />\r\n<br />\r\n<span style=\"color:#ffffff\"><strong>Fiverr Seller Profile Not Approved- How To Open Fiverr Seller Account in 2022</strong></span><br />\r\n<a href=\"https://www.youtube.com/watch?v=5YZQKufKuAQ\"><span style=\"color:#ffffff\">https://www.youtube.com/watch?v=5YZQKufKuAQ</span></a></p>', 'Fiverr,Payoneer,Ratefy,exchange,freelance', '1674571508_fiverr.jpg', '2023-01-24 19:45:08', '2023-01-24 19:58:41'),
(16, 1, 2, 'PAYONEER FUNDS TO ACCESS BANK DOMICILIARY ACCOUNT NOT WORKING -  ALTERNATIVES', 'payoneer-funds-to-access-bank-domiciliary-account-not-working-alternatives', '<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Access bank of Nigeria has discontinued processing Payoneer inflow. It mean you are no more allowed to withdraw your Payoneer funds from your Payoneer account to your Access Bank Domiciliary account. As a result, the fund can either hang or reversed.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">The above action revealed that Access bank is no longer in partnership with Payoneer, and it is presumed to be a loss for any further transaction by Access bank customers who has Payoneer attached to their bank account.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">In recent times, Access bank customers enjoyed the privilege of zero percent charge when they withdraw from Payoneer to their domiciliary account. Payoneer only charges 2% for the transaction.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">A secular release by Access bank recently stated that. &ldquo;Pursuant to periodic due diligence standard employed by the bank.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">We have carried out a review of FX inflow that is foreign exchange inflow and noticed a consistent and unjustifiable pattern of structured inflows from Premier Inc. With no substantial documentary evidence or economic justification to support these FX transactions.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">This presents additional risks and challenges to the bank in terms of surveillance and transaction monitoring since we may not have adequate information and evidence to justify the source of funds for such transactions, which is against the bank&#39;s policy governing international payment and remittances.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">While we are happy to support your payment needs, we regret to inform you that we are no longer comfortable processing FX inflow from Fiverr Users and its subsidiaries as it does not align with our risk appetite as a bank.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">We, therefore, request you kindly ensure that your FX transfer from Payoneer and its subsidiaries is not directed to us so that there is no delay in your transaction. Access bank reserves the right to suspend or reject any or all FX permit transactions and subsequently close all accounts that receive or send money through the stated platform, the bank will no longer be liable for any loss in cure as a result of any delay or rejection on any payment that is not complying with requirements outlined above.&rdquo;</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">It is advisable to avoid any future transactions involving Payoneer funds transfer with Access bank and many merchant banks in Nigeria. In addition, it is predictable that many merchant banks may align with the newly adopted policy by Access Bank. Most importantly, withdrawing to a domiciliary account from your Payoneer could lead to many losses, both time, funds, inconveniences, and more.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Other platforms have emerged to mitigate this issue. Such platforms are Grey. co and GigPay. Another alternative method is to contact a peer-to-peer exchanger who will exchange your Payoneer fund at the black-market rate. These types of withdrawals or rather conversions can only be possible if you have reached the $1000 threshold stipulated by Payoneer.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy. co</span></a><span style=\"color:#ffffff\"> is a platform that helps you exchange your Payoneer fund at the black-market rate while giving you fair, standard, and reasonable prices for your dollar. You can contact them at </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">https://ratefy.co</span></a></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy. co</span></a><span style=\"color:#ffffff\"> has a track record of legit and successful transactions carried out. </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy. co</span></a><span style=\"color:#ffffff\"> is open 24/7 for your transaction needs and inquiries.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">Should you have any fund withdrawals from Payoneer, don&#39;t hesitate to contact </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">ratefy. co</span></a><span style=\"color:#ffffff\">. </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">https://ratefy.co</span></a></span></span></p>', 'Payoneer,Access Bank,Docimiliary,alternatives,freelance,freelancer', '1674572301_skyline-gd1e02c598_640.jpg', '2023-01-24 19:58:21', '2023-01-24 19:58:21'),
(17, 1, 1, 'How to Receive Dollars in Nigeria using Payoneer And Exchange it at The Black Market Rate', 'how-to-receive-dollars-in-nigeria-using-payoneer-and-exchange-it-at-the-black-market-rate', '<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">Payment processing services like Payoneer and PayPal are widely used by people who earn money online. Freelancers on platforms like Fiverr and Upwork typically transfer funds to Payoneer.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://ratefy.co/\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">The issue they always run into with Payoneer is transferring their earnings to a local Nigerian bank account at the black market rate. In this article, we will discuss ways you can withdraw your Payoneer funds at the black market rate.</span></span></span></a></p>\r\n\r\n<h2><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\"><strong>What is Payoneer?</strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">Payoneer is an online payment platform that enables users to securely and quickly send and receive payments from more than 200 countries and territories worldwide. Payoneer is a great option for Nigerians who want to receive US dollars from abroad. It is a reliable, secure, and cost-effective way to receive and send money from any corner of the globe.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\"><strong>Exchanging Dollars for Naira at Black Market Rate From Payoneer</strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">Here are the easy ways you can exchange your Payoneer funds for naira at the black market rate.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\"><strong>Exchange With <a href=\"https://ratefy.co\">Ratefy.co</a></strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">There is no shortage of websites where you can get this done. After you transfer money from your Payoneer account to a recipient in need, the recipient can deposit the Naira immediately into your bank account at a favorable exchange rate. Most people refrain from doing so because they lack confidence in strangers online.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">This is where Ratefy comes in. You can sell your Payoneer funds at a good black market rate and get the equivalent in Naira immediately. Simply select <a href=\"https://ratefy.co\">&quot;Exchange Rate&quot;</a> from the menu. Select Payoneer and input the number of dollars you want to exchange by tapping on &quot;calculate&quot;. Tap on sell after inputting the amount and click the chat icon to message our Admin on WhatsApp.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\"><strong>Use a Nigerian Domiciliary Account</strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">By using this approach, you may convert your Payoneer to dollars at the precise rate that is in effect at the time. Domiciliary accounts in Nigerian banks allow you to receive foreign currency.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">To create a domiciliary account, simply visit any of the local banks that allow for the creation of such accounts and fill out the necessary paperwork. If you already have a Payoneer account, you may simply sign in and add a new bank account.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">Once you have a Domiciliary account, Payoneer will charge a fee whenever funds are sent there. Money will be deposited into your new U.S.-based, &quot;domiciliary,&quot; bank account. You&#39;re reading this blog post because you want to convert your cash to Naira at the best rate currently available.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">But with this method, you will need to go to several different Bureau de change aboki to make the necessary currency exchanges and get payment in Naira. We realize that going outside to complete the tasks at hand may seem burdensome.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">However, <a href=\"https://ratefy.co/\">it&#39;s worth the effort if you are looking to exchange at the black market rate</a>. Meanwhile, the first stress-free method provided above is still an option.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\"><strong>Conclusion</strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#000000\">If you are looking to receive dollars in Nigeria, Payoneer is a great option. It is easy to use, reliable, and secure and provides an easy and cost-effective way to send and receive payments from anywhere in the world. Once you have received the dollar, you can then exchange it for Naira at the black market rate. <a href=\"https://ratefy.co/\">By using a reputable money changer, you can be sure to get a good rate and make the most of your money.</a></span></span></span></p>\r\n\r\n<p>&nbsp;</p>', 'Payoneer,Banks,Domiciliary,accounts', '1674574786_tech-daily-V06dt37iQFY-unsplash.jpg', '2023-01-24 20:39:47', '2023-01-24 20:39:47');
INSERT INTO `posts` (`id`, `author_id`, `category_id`, `post_title`, `post_slug`, `post_content`, `post_tags`, `featured_image`, `created_at`, `updated_at`) VALUES
(18, 1, 1, 'How to Receive Dollars in Nigeria using Payoneer And Exchange it at The Black Market Rate', 'how-to-receive-dollars-in-nigeria-using-payoneer-and-exchange-it-at-the-black-market-rate-2', '<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Payment processing services like Payoneer and PayPal are widely used by people who earn money online. Freelancers on platforms like Fiverr and Upwork typically transfer funds to Payoneer.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">The issue they always run into with Payoneer is transferring their earnings to a local Nigerian bank account at the black market rate. In this article, we will discuss ways you can withdraw your Payoneer funds at the black market rate.</span></span></span></a></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>What is Payoneer?</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Payoneer is an online payment platform that enables users to securely and quickly send and receive payments from more than 200 countries and territories worldwide. Payoneer is a great option for Nigerians who want to receive US dollars from abroad. It is a reliable, secure, and cost-effective way to receive and send money from any corner of the globe.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Exchanging Dollars for Naira at Black Market Rate From Payoneer</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Here are the easy ways you can exchange your Payoneer funds for naira at the black market rate.</span></span></span></p>\r\n\r\n<h2><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"color:#ffffff\">Exchange With </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a></strong></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">There is no shortage of websites where you can get this done. After you transfer money from your Payoneer account to a recipient in need, the recipient can deposit the Naira immediately into your bank account at a favorable exchange rate. Most people refrain from doing so because they lack confidence in strangers online.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">This is where Ratefy comes in. You can sell your Payoneer funds at a good black market rate and get the equivalent in Naira immediately. Simply select </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">&quot;Exchange Rate&quot;</span></a><span style=\"color:#ffffff\"> from the menu. Select Payoneer and input the number of dollars you want to exchange by tapping on &quot;calculate&quot;. Tap on sell after inputting the amount and click the chat icon to message our Admin on WhatsApp.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Use a Nigerian Domiciliary Account</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">By using this approach, you may convert your Payoneer to dollars at the precise rate that is in effect at the time. Domiciliary accounts in Nigerian banks allow you to receive foreign currency.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">To create a domiciliary account, simply visit any of the local banks that allow for the creation of such accounts and fill out the necessary paperwork. If you already have a Payoneer account, you may simply sign in and add a new bank account.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Once you have a Domiciliary account, Payoneer will charge a fee whenever funds are sent there. Money will be deposited into your new U.S.-based, &quot;domiciliary,&quot; bank account. You&#39;re reading this blog post because you want to convert your cash to Naira at the best rate currently available.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">But with this method, you will need to go to several different Bureau de change aboki to make the necessary currency exchanges and get payment in Naira. We realize that going outside to complete the tasks at hand may seem burdensome.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">However, </span><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\">it&#39;s worth the effort if you are looking to exchange at the black market rate</span></a><span style=\"color:#ffffff\">. Meanwhile, the first stress-free method provided above is still an option.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Conclusion</strong></span></span></span></h2>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">If you are looking to receive dollars in Nigeria, Payoneer is a great option. It is easy to use, reliable, and secure and provides an easy and cost-effective way to send and receive payments from anywhere in the world. Once you have received the dollar, you can then exchange it for Naira at the black market rate. </span><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\">By using a reputable money changer, you can be sure to get a good rate and make the most of your money.</span></a></span></span></p>\r\n\r\n<p>&nbsp;</p>', 'Payoneer,Banks,Domiciliary,accounts', '1674574786_tech-daily-V06dt37iQFY-unsplash.jpg', '2023-01-24 20:39:47', '2023-01-24 20:39:47'),
(19, 1, 2, '10 Websites That Pay You With Payoneer- 10 Ways to Earn Money Into Your Payoneer Account', '10-websites-that-pay-you-with-payoneer-10-ways-to-earn-money-into-your-payoneer-account', '<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Those that work as Freelancers or Affiliate Marketers are likely aware of Payoneer&#39;s significance. It&#39;s really convenient because it&#39;s one of the quickest and easiest ways to send and receive money worldwide. Therefore, we will discuss the top Payoneer-accepting sites. So, let&#39;s get started.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Google Adsense (Blog &amp; YouTube)</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">If you have a YouTube channel and are making money from Google Adsense, you may use Payoneer to withdraw your YouTube earnings. For monetization to be possible on your channel, however, you need to have at least 1,000 subscribers and 4,000 view hours in the past 12 months.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Dailymotion</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Dailymotion, like YouTube, is a video-hosting platform that compensates its users according to how many times their videos have been seen. Due to issues with previous payment processors, Dailymotion now provides Payoneer as a means of payment for its contributors.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Fiverr</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Fiverr is a fantastic platform through which to advertise your professional services to a wide audience. Payment options include the popular PayPal, the more secure Payoneer Revenue Card, and Payoneer Bank Transfer.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Upwork</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Upwork is an online platform for finding independent contracting jobs. You may use Payoneer to get paid as a freelancer if you win a bid. Payments may be received for as little as $10 using Payoneer.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Guru</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Like Upwork and Fiverr, Guru connects freelancers with businesses looking for their services. Since it is among the most reputable freelancing platforms, it naturally uses a reliable money-processing service which is Payoneer.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Freelancer</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Freelancer is an online marketplace where freelancers may find clients who need their services, whether temporarily or permanently. After signing up, you&#39;ll be able to place bids on the various tasks offered by the site&#39;s customers. The minimum payment amount is $30, and these funds may be withdrawn via Payoneer, Paypal, or Skrill.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Amazon Affiliate Program</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">The Amazon Associates program allows you to earn a fee of up to 10% on every sale made via your referrals of Amazon items. If you have more than $10 in profits, you may cash them out via Payoneer.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Shareasale</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Shareasale is yet another well-known affiliate network that offers many payment options, including direct deposit, cheques, and Payoneer. Affiliate programs may be found in many different niches ranging from interior design to fitness to WordPress plugins and themes etc.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Teespring</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">One of the most fascinating ways to make money online is provided by this website. T-shirt displays are its area of expertise. They will pay you a commission for each shirt you sell on their behalf. Your Payoneer account may very well receive the money.</span></span></span></p>\r\n\r\n<h2><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Clickbank</strong></span></span></span></h2>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Clickbank is a fantastic online store where people all around the world may buy digital goods. You can earn a commission on every sale made via your affiliate link after enrolling in the company&#39;s affiliate program and advertising their products. ClickBank also supports Payoneer as a payment option.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Conclusion</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:#ffffff\">If you want to keep your money secure when transacting online, Payoneer is one of your best choices. Withdrawing funds is not a major problem. </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\"> offers great exchange rates when selling your Payoneer funds, making it an ideal platform for those looking to make the most of their money.</span></span></span><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\">Ratefy. co is a platform that helps you exchange your Payoneer fund at the black-market rate while giving you fair, standard, and reasonable prices for your dollar. You can contact them at&nbsp;</span><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\">https://ratefy.co</span></a></p>\r\n\r\n<p><span style=\"color:#ffffff\">Ratefy. co has a track record of legit and successful transactions carried out.&nbsp;</span><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\">Ratefy. co</span></a><span style=\"color:#ffffff\">&nbsp;is open 24/7 for your transaction needs and inquiries.</span></p>\r\n\r\n<p><span style=\"color:#ffffff\">Should you have any fund withdrawals from Payoneer, don&#39;t hesitate to contact&nbsp;</span><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\">ratefy. co</span></a><span style=\"color:#ffffff\">.&nbsp;</span><a href=\"https://ratefy.co/\"><span style=\"color:#ffffff\">https://ratefy.co</span></a></p>\r\n\r\n<p>&nbsp;</p>', 'Dailymotion,Freelancer,Amazon Affiliate Program,sharesale,Teespring,Clickbank,Payoneer', '1674575741_makiel.jpg', '2023-01-24 20:55:42', '2023-01-24 20:55:42'),
(20, 1, 2, 'HOW TO GET THE FASTEST PAYNONEER EXCHANGE THAT WORKS', 'how-to-get-the-fastest-paynoneer-exchange-that-works', '<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Finding a better, fast, and safer way to exchange your Payoneer Funds in dollars to naira can be scary and somewhat difficult. The need to transact on trust is an issue. However, the strategic method of exchanging Payoneer funds is not known by many freelancers.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Have you been pondering and searching for the fast means available to exchange your Payoneer funds for naira? The fastest way is to find Payoneer exchangers who are willing to buy your Payoneer funds for a said amount and pay you the equivalent in naira.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:#ffffff\">At </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\">, we specialize in buying your Payoneer at the latest, standard rate with a guarantee of transparency. You can transact with us today via&nbsp;</span><a href=\"https://ratefy.co\" style=\"color:#0563c1; text-decoration:underline\" target=\"_blank\"><span style=\"color:#ffffff\">https://ratefy.co</span></a><span style=\"color:#ffffff\">. We have a track record of happy clients and the best rates.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;Getting ready to make your exchange? Navigate to Pay-to-recipient Payoneer account on your dashboard. Fill out the form with the said amount to transfer and the recipient details. Once the money is sent. The exchanger can then proceed with transferring the equivalent in naira to your account.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;It is also important to note that you can make a Payoneer to Payoneer transaction once you have the Payoneer $1000 threshold. Inclusively, it is advisable to work more on your paying platforms such as Clickbanks, Fiverr, Upwork, and more.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">However, if you are yet to attain the $1000 threshold Payoneer policy, you can make a convertible of your Payoneer funds from Payoneer to GeegPay or Grey.co and get an exchanger to buy your dollar at its said &ldquo;exchange rate&rdquo; for it equivalent in naira.</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">In addition, Grey.co and GeegPay exchanges take a long time before an exchange transaction is complete, but with the same result.</span></span></span></p>', 'payoneer,fiverr,upwork,ratefy,exchange', '1674927784_austin-distel-VvAcrVa56fc-unsplash (1).jpg', '2023-01-28 22:43:05', '2023-01-28 22:43:05'),
(21, 1, 2, 'UPWORK FREELANCER CAN HAVE THE HIGHEST RATE WITH TRANSFER-WISE', 'upwork-freelancer-can-have-the-highest-rate-with-transfer-wise', '<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Looking for the highest withdrawal rate as an Upwork freelancer? The current highest rate come with a Transfer-wise account. Transfer-wise has the highest rate in the market at the moment. It is advisable to withdraw your Upwork funds directly to your Transfer-wise account.</span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">However, to achieve this, Transfer-wise always asks it new users to get their account activated with about $20. Once you have funded your Transfer-wise account with $20, you are set to start making amazing transactions with your transfer-wise account.</span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">However, there may be issues arising getting your account funded or acquiring your transfer-wise card. If you ever encounter issues here, you can contact Business-with-Femi on YouTube to help solve these problems.</span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Withdrawing directly to your Transfer-wise account seems to be the best option these days.</span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Also, this method applies to Fiverr and other freelancing platforms. In addition, you can also withdraw with your Payoneer using this method. However, Payoneer stipulates you have to reach about a $1000 threshold from working for clients.</span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">We believe this information has been helpful in achieving your goals.</span></span></p>', 'upwork,transfer-wise,exchnage-rate,account', '1674927997_brandy-kennedy-wB9VldR8OHM-unsplash.jpg', '2023-01-28 22:46:37', '2023-01-28 22:46:37'),
(22, 1, 2, 'PAYONEER ACCOUNT AND WISE ACCOUNT EXPLAINED- WHAT YOU MUST KNOW', 'payoneer-account-and-wise-account-explained-what-you-must-know', '<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Choosing a payment platform for your online freelancing or business is critical. Hence, you need to critically examine what payment platform may perfectly suit your business. For this reason, Ratefy.co decided to help you navigate the advantages and disadvantages of using TransferWise and Payoneer as your payment methods.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>REGISTRATION:</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Setting up your Payoneer account for payments is easy and fast. However, the Payoneer verification process may seem to take a little longer than the Wise verification process.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Transfer-wise accounts, on the other hand, do not appear to be that slow to set up; the verification process appears to be fairly quick.Wise has a track record of verifying users in minutes, and in some cases, just a few hours.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">The Payoneer verification process can span up to a week or more. It is more of an internal verification process. After a week or more, Payoneer would get back with a response to certify your verification as approved or denied.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>VERIFICATION DOCUMENT</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Payoneer accepts a voter&rsquo;s card, an international passport, a national identity card, and a driver&rsquo;s license. However, TransferWise rejects the voter&rsquo;s card as a means of verification while accepting other identity cards such as an international passport, a national identity card, and more.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">It is important to note that, as easy and fast as Payoneer is, TransferWise is faster and better.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">&nbsp;</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>PARTNERSHIP</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Most freelancing platforms need a payment system they can trust in order to ensure a safe payment space for their freelancers. As a result, most online freelancing and business platforms follow the right policy of direct partnership.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Payoneer is known to have direct partnerships with freelancing platforms like Fiverr, Upwork, Clickbank, and many more. In contrast, Transfer-Wise has no direct partnership with most of the freelancing platforms. It has been recorded over the past years that freelancers have had issues connecting their TransferWise account to their freelancing platform or withdrawing directly to their TransferWise account.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">However, Upwork has paved way for it freelancers allowing them to link-up their Transfer-Wise account as any other bank account on it platform.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">It is important to note that this exception was only created for Upwork, while other service platforms such as Fiverr, Clickbank, and Amazon have yet to approve it.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\"> believes that Payoneer has more advantages as regards payment partnerships than its counterpart, TransferWise.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">&nbsp;</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>THRESHOLDS</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">The Nigerian naira over the years have found it value progressively depreciating. In the official market, the current value of a naira to a dollar is about $1 to ₦460 as of January 31, 2023. Yet, it doesn&rsquo;t depict the actual value of a service rendered by freelancers.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Freelancers believed that their service rendered should have an equal value to the money paid, and for this reason, most freelancers seek better solution such as exchanging their dollar at black market rate. &nbsp;As a result, most freelancers sell their dollars to exchangers at the ₦715 rate. One of the best places to exchange your Payoneer or TransferWise funds is Ratefy.co. It has a track record of successful transactions.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">However, exchanging an e-wallet fund at black market rates isn&rsquo;t an easy task. It involves exchanging wallet fund with wallet exchangers such as Payoneer to Payoneer transfer. A Payoneer-to-Payoneer transfer can only be achieved if, as a freelancer, you have attained a certain amount stipulated by Payoneer.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Payoneer stipulates that a Payoneer user can only make a user-to-user transfer if the user has reached or surpassed the $1000 threshold stipulated by Payoneer.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">TransferWise makes it much easier for its users to transfer funds between users as long as each has an activated account.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">TransferWise is a better choice if you&#39;re searching for a user-to-user transaction that happens more quickly.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">However, a TransferWise user ought to activate their account with the sum of $20 before a user-to-user transaction can be accomplished.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>Virtual Card and Account Creation</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">TransferWise can be easily funded with any secured virtual card to create an account, but Payoneer doesn&rsquo;t accept such a method. Payoneer preferred that new users be funded by another Payoneer user or through the Freelance platform before an account could be created.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">Payoneer expects a minimum of $50 for&nbsp; account creation, while TransferWise is $20.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>&nbsp;</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>VOLUME TRANSACTIONS</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">TransferWise gives it users the immunity of transferring both large or little among between each other. Having a TransferWise account gives you easy access to individuals and businesses transacting with you.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">However, Payoneer only allows businesses to transact with new Payoneer users until the new user attains or surpasses the $5000 threshold through services rendered on freelancing platforms.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\"> believes that TransferWise is a better option if you are looking forward to having transactions without limits and barriers.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">&nbsp;</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\"><strong>Virtual Card Creation</strong></span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">TransferWise is regarded as a bridge between a bank and a payment system, and it does not allow the creation of virtual cards for its members. Virtual cards are part of every online shopper because it helps provides a sense of security. However, TransferWise users are not allowed to enjoy such a feature on its platform.</span></span></p>\r\n\r\n<p><span style=\"color:#ffffff\"><span style=\"font-size:12pt\">In contrast, Payoneer gives its users the opportunity to create a virtual card that can be used anywhere on the internet if they have earned about $2000 via freelancing platforms.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"color:#ffffff\">as a freelancer, affiliate marketer, or online hustler needing to exchange your e-wallet funds for their equivalent in naira, such as Payoneer, TransferWise, PayPal, and more. You can exchange it now with ease on a trusted platform like </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\">.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\"> helps you exchange your e-wallet funds at a black-market rate with transparency, ease, trust, and an immediate response. It is safer and more secure to use </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co.</span></a></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"color:#ffffff\">If you want to know the black market rate of your e-wallet fund, you can visit Ratefy.co at anytime to check the current rate, as </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\"> updates the rate every three hours.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"color:#ffffff\">Visit </span><a href=\"https://ratefy.co\"><span style=\"color:#ffffff\">Ratefy.co</span></a><span style=\"color:#ffffff\"> for all e-wallet transactions today. https://ratefy.co</span></span><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><span style=\"color:#ffffff\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/wq6enfAD2TA?start=314\" title=\"YouTube video player\" width=\"560\"></iframe></span></p>', 'TransferWise,Payoneer,black-market rate,e-walet,funds,exchange,ratefy.co', '1675141145_tech-daily-h329GHs_lC8-unsplash.jpg', '2023-01-31 09:59:05', '2023-01-31 10:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `selling_profiles`
--

CREATE TABLE `selling_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `payment_type` varchar(191) NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selling_profiles`
--

INSERT INTO `selling_profiles` (`id`, `seller_id`, `payment_type`, `full_name`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 18, 'Paypal', 'Oladele Akinleye', '08141868261', '2023-01-07 14:17:14', '2023-01-07 14:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `sell_announcements`
--

CREATE TABLE `sell_announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_announcements`
--

INSERT INTO `sell_announcements` (`id`, `subject`, `amount`, `description`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Urgently needed', '500', 'Rust is a multi-paradigm, general-purpose programming language. Rust emphasizes performance, type safety, and concurrency. Rust enforces memory safety—that is, that all references point to valid memory—without requiring the use of a garbage collector or reference counting present in other memory-safe languages.', 10000, '2023-01-07 12:39:01', '2023-01-07 12:39:01'),
(2, 'Urgently needed', '7000', 'Rust is a multi-paradigm, general-purpose programming language. Rust emphasizes performance, type safety, and concurrency. Rust enforces memory safety—that is, that all references point to valid memory—without requiring the use of a garbage collector or reference counting present in other memory-safe languages.', 10000, '2023-01-07 12:40:37', '2023-01-07 12:40:37'),
(3, 'urgently needed', '2500', 'Rust is a multi-paradigm, general-purpose programming language. Rust emphasizes performance, type safety, and concurrency. Rust enforces memory safety—that is, that all references point to valid memory—without requiring the use of a garbage collector or reference counting present in other memory-safe languages.', 10000, '2023-01-07 12:43:56', '2023-01-07 12:43:56'),
(4, 'urgents', '500', 'Rust is a multi-paradigm, general-purpose programming language. Rust emphasizes performance, type safety, and concurrency. Rust enforces memory safety—that is, that all references point to valid memory—without requiring the use of a garbage collector or reference counting present in other memory-safe languages.', 10000, '2023-01-07 12:46:35', '2023-01-07 12:46:35'),
(5, 'Highly needed', '8000', 'This is needed asap. if you have. let me know.', 10000, '2023-01-07 15:17:11', '2023-01-07 15:17:11'),
(6, 'Partial needs', '20000', 'if you have it. contact me.', 10000, '2023-01-07 15:21:03', '2023-01-07 15:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_name` varchar(191) DEFAULT NULL,
  `blog_email` varchar(191) DEFAULT NULL,
  `blog_description` text DEFAULT NULL,
  `blog_logo` varchar(191) DEFAULT NULL,
  `blog_favicon` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `blog_name`, `blog_email`, `blog_description`, `blog_logo`, `blog_favicon`, `created_at`, `updated_at`) VALUES
(1, 'Ratefy | Payment & Exchange platform', 'hello@ratefy.co', 'Ratefy helps Nigerians to exchange foreign currencies to Naira at the best exchange rate. Accept payment around the world using payment methods like Payoneer, Paypal, Wise, PerfectMoney, Skill, Neteller, AirTM etc, which are best known to your client . No need for new account number. ', '1672449002_36064_ratefy_logo.png', '1672452931_525_ratefy_favicon.ico', NULL, '2023-01-12 02:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `set_labels`
--

CREATE TABLE `set_labels` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `set_labels`
--

INSERT INTO `set_labels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Transfer', '2023-02-27 19:11:37', '2023-02-27 20:21:14'),
(5, 'Payment Request', '2023-02-28 00:23:25', '2023-02-28 00:23:25'),
(6, 'Friends & Family', '2023-02-28 00:24:32', '2023-02-28 00:24:32'),
(7, 'Goods & Services', '2023-02-28 00:24:53', '2023-02-28 00:24:53'),
(8, 'Fiverr (-$5)', '2023-02-28 00:25:48', '2023-02-28 00:25:48'),
(9, 'Fiverr', '2023-02-28 03:29:14', '2023-02-28 03:29:14'),
(10, 'Wire transfer', '2023-03-16 01:28:40', '2023-03-16 01:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `parent_category` int(11) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_name`, `slug`, `parent_category`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Account', 'account', 3, 2, '2023-01-01 23:22:54', '2023-01-13 00:51:57'),
(2, 'Freelance', 'freelance', 1, 3, '2023-01-01 23:49:25', '2023-01-13 00:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `amount_release` double(8,2) NOT NULL,
  `selling` varchar(191) NOT NULL,
  `currency` enum('NGN','USD','GBP') NOT NULL,
  `start` int(11) NOT NULL DEFAULT 0,
  `end` int(11) NOT NULL DEFAULT 0,
  `hold` int(11) NOT NULL DEFAULT 0,
  `release` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `note_users` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin {super-author}', NULL, NULL),
(2, 'author', NULL, NULL),
(3, 'seller', NULL, NULL),
(4, 'users', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) DEFAULT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 2,
  `blocked` int(11) NOT NULL DEFAULT 0,
  `direct_publish` int(11) NOT NULL DEFAULT 0,
  `mobile_number` varchar(191) DEFAULT NULL,
  `emailcode` varchar(191) DEFAULT NULL,
  `activate` int(11) NOT NULL DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` varchar(191) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(4) NOT NULL DEFAULT 0,
  `messenger_color` varchar(191) NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `picture`, `biography`, `type`, `blocked`, `direct_publish`, `mobile_number`, `emailcode`, `activate`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'adeola oladoja', 'workizzy89@gmail.com', NULL, '$2y$10$Bnz/lOyVhQI5tDEeAod7ouRok54iaaZLrnXJZyYhXRFugsXphPCL.', NULL, NULL, '2022-12-30 13:34:06', 'dev_adeola', 'Ratefy-1167241084679570.jpg', 'I am a software developer from adventure and aspire to be an inventor like Leo nardoo da Vinci. I find pleasure working with people who allow me to show my creativity in products like Femi Odeyemi, Femi Adefemi, Oluwaseun Awotobi. Thank you all for believing in me.', 1, 0, 1, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(12, 'Femi Victor', 'femivictor@gmail.com', NULL, '$2y$10$xhEolcH5eJVg2z0o2Ek1q.55pv.FbNiQZbVLmra0TAklqPK50OL7K', NULL, '2023-01-01 07:26:36', '2023-01-03 08:50:26', 'femvic', 'Ratefy-12167256274325404.jpg', NULL, 2, 0, 0, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(13, 'Oladoja Timothy', 'timothyoladoja@gmail.com', NULL, '$2y$10$Q6b.C5o5PX2oCmJMtbiO0e0dYNt1hM2r8LSLwMZglvHHTTgO3xw4m', NULL, '2023-01-01 07:27:21', '2023-01-01 07:43:38', 'inioluwa', 'Ratefy-1316725626189760.jpg', NULL, 3, 0, 1, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(14, 'Sunday Ayinde', 'sundayayinde@gmail.com', NULL, '$2y$10$VoDOkV92DITDbSUKdM5TV.REZgZRNtMl4aqncpwraEM4zugTYwlKK', NULL, '2023-01-01 07:29:40', '2023-01-01 07:49:29', 'yinyen', 'Ratefy-14167256251698091.jpg', NULL, 1, 0, 0, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(16, 'babalola mary', 'marybabalola@gmail.com', NULL, '$2y$10$Z3onYQ/k/kkL6QXBqSpbZu/BynvK4ayZcTa9H5YSo38NlQXHqCYx.', NULL, '2023-01-01 07:32:07', '2023-01-01 07:38:54', 'lolababs', 'Ratefy-16167256233441775.jpg', NULL, 3, 0, 1, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(17, 'Andrey Tarsha', 'andreytash@gmail.com', NULL, '$2y$10$ku4adjG4gbVSCXGU6Crju.4GS.oqhRbXaCXcC4mivlf5yh8ldMlyC', NULL, '2023-01-01 07:33:29', '2023-01-01 07:37:59', 'andreytash', 'Ratefy-17167256227926635.jpg', NULL, 2, 0, 1, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(18, 'Pablo Mendes ', 'pablomendes@gmail.com', NULL, '$2y$10$jFW/tK6aSgcRYbDekTlDouK9Vs1WkFB2TwaR3K0aRuCfPC6HIqG6a', NULL, '2023-01-01 07:34:46', '2023-01-07 15:22:11', 'obrigado', 'Ratefy-18167256220052995.jpg', NULL, 3, 0, 1, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(19, 'Femi Odeyemi', 'FemiiVictorr@gmail.com', NULL, '$2y$10$2XUELGTf3/txGTEMr3hIYuON2Y.EQ0hX3TZB6MvJAdzfsKt9NY.QK', NULL, '2023-02-03 13:10:18', '2023-02-03 13:19:22', 'FemiiVictorr', 'Ratefy-19167541224792673.jpg', NULL, 1, 0, 0, NULL, NULL, 0, 0, 'avatar.png', 0, '#2180f3'),
(21, 'Godwin', 'godwinomosemofa931@gmail.com', NULL, '$2y$10$vlHcvmBaC.8Ogdpgi8oiEeFwaVbd7qxvVw88IvVDRXLtF2nkG4voq', NULL, '2023-05-04 14:11:46', '2023-05-04 14:11:46', '@Godwinpaul931', NULL, NULL, 4, 0, 0, '09067392615', '788b6dd2d468a272ace38e1c0bd5db18', 0, 0, 'avatar.png', 0, '#2180f3'),
(27, 'Kayode Arisekola', 'mrfem469@gmail.com', NULL, '$2y$10$lPbbBtg0FGnUPG3Aoq9i0eKWKdDz1tHzaH8/svK5RIK80zY/Uq9mi', NULL, '2023-05-05 16:24:54', '2023-05-05 16:24:54', 'Karise', NULL, NULL, 4, 0, 0, '07064530382', '127e256856cac88ed9d75877eae37915', 0, 0, 'avatar.png', 0, '#2180f3'),
(28, 'adeola Oladoja', 'adeola.a.oladoja@gmail.com', '2023-05-06 07:17:56', '$2y$10$DfkHXT/jR/crAo0Cd//EGOD5ccVp6rsuWeQnBLL7bpTXAjn8rTIMK', NULL, '2023-05-05 19:25:22', '2023-05-06 07:17:56', 'adeola', NULL, NULL, 4, 0, 0, '09032266089', 'd3a064ee82b65b2ebaee42beb4286da9', 1, 0, 'avatar.png', 0, '#2180f3'),
(29, 'MOHAMMED HAMMALI', 'ywmyta@gmail.com', '2023-05-05 19:50:06', '$2y$10$D06NIIh4DvB8G0ZYDPJV1e6awmef5dp6EDgg0voD7b1hko4g9Flmm', NULL, '2023-05-05 19:49:39', '2023-05-05 19:50:06', 'ryze1200', NULL, NULL, 4, 0, 0, '0645058901', '7bfeb5be6f63f37c3cac6377730cb62a', 1, 0, 'avatar.png', 0, '#2180f3'),
(30, 'Ka Ari', 'femisinbox@gmail.com', '2023-05-06 05:24:29', '$2y$10$IiDMR3TVz1q07teTGUnTzO1dkXCpzQS4eVWeJMZHgmT54BJdCptmi', NULL, '2023-05-05 21:14:57', '2023-05-06 05:24:29', 'Karisee', NULL, NULL, 4, 0, 0, '0908363383373', 'b03b0c97e90862479a850c867f9a6047', 1, 0, 'avatar.png', 0, '#2180f3'),
(31, 'Bbbbb', 'damsales500@gmail.com', NULL, '$2y$10$q3AQfLSdHZEJXMTsWhasPOG8JMqs9QKD64ZvHkhJuQuGHrCtX0Zb6', NULL, '2023-05-06 18:52:55', '2023-05-06 18:52:55', '@paidyy', NULL, NULL, 4, 0, 0, '09152484041', 'b849244fe891e60b4c94b66883e1fc7d', 0, 0, 'avatar.png', 0, '#2180f3'),
(32, 'Femi Odeyemi', 'Textxony@gmail.com', '2023-05-06 21:02:26', '$2y$10$J9pSGD6ti61WMSIUq6GbzOBSuXGtWpZEAU.se8kg6ms0ETMnTQYl2', NULL, '2023-05-06 21:01:02', '2023-05-06 21:02:26', 'Mrfem1', NULL, NULL, 4, 0, 0, '09908778723', 'f1695883f06a774d33bd32453510eabe', 1, 0, 'avatar.png', 0, '#2180f3'),
(33, 'Adesola ', 'adesolaadebayo1452@gmail.com', '2023-05-08 13:48:51', '$2y$10$0Cf0SWmMiBwQDNDt8yw4kOy.Yt83mSAqm0iHUscV0gtpVicXiQpk6', NULL, '2023-05-08 13:48:07', '2023-05-08 13:51:41', 'Adebayo ', NULL, NULL, 4, 0, 0, '0803 772 6216', '09262cb238dda8eb75c14bba28fba6fe', 1, 0, 'avatar.png', 0, '#2180f3'),
(36, 'adeola oladoja', 'adeola.screenplay@gmail.com', '2023-05-08 16:31:15', '$2y$10$fnbueDPpE6mTGuhBf9aa1ulECCLKAic2v3HGybufa2KcwsESSkkha', NULL, '2023-05-08 16:19:58', '2023-05-08 16:31:15', 'adesolah', NULL, NULL, 4, 0, 0, '08141868261', '027a1b9474a7670cb4245e4121dc0888', 1, 0, 'avatar.png', 0, '#2180f3'),
(37, 'Dauda Sikiru', 'olawale2508@gmail.com', '2023-05-09 00:32:48', '$2y$10$7893tInN9rgCFqnMhyiiYuRfELe.hRGplGTkO5bBD.lr8op6g9mpG', NULL, '2023-05-08 22:58:35', '2023-05-09 00:32:48', 'Daudask', 'Ratefy-37168357354964060.jpg', NULL, 4, 0, 0, '08103832627', '10d9406eecb612706e74ec91181addce', 1, 0, 'avatar.png', 0, '#2180f3'),
(38, 'Testy', 'pinescript3@gmail.com', '2023-05-09 00:34:06', '$2y$10$sAJgO8BTWb8w19rISkUiHO7hr7pM6aq6gPxO8J0Sf/ii9zXc49obG', NULL, '2023-05-09 00:33:03', '2023-05-09 00:34:06', 'Testy01', NULL, NULL, 4, 0, 0, '08033749968', '165622feeca6ca3334d61ecbcc9e7e13', 1, 0, 'avatar.png', 0, '#2180f3'),
(39, 'Aleem Habiir', 'boluwatifehabiir@gmail.com', '2023-05-09 11:47:39', '$2y$10$xPWYxC9ciFXrsABB6iVO1eiAgbUMDX0M64ECq9eveCBc2TUs6xodC', NULL, '2023-05-09 11:44:07', '2023-05-09 11:47:39', 'Habiir', NULL, NULL, 4, 0, 0, '08052268347', '4c2acce9bf7d8e42280cdc71cb9f4143', 1, 0, 'avatar.png', 0, '#2180f3'),
(40, 'Victor Adeniyi', 'victoradeniyi01@gmail.com', '2023-05-12 00:06:24', '$2y$10$lticSM39JAzQIgPnio0pYORBq7XEMYWZ.eat6LETHH5/KLMUeS76G', NULL, '2023-05-11 18:20:40', '2023-05-12 00:06:24', 'Vickymmm', NULL, NULL, 4, 0, 0, '08109926205', '2522e3b8feae98ff899b3398c82d6820', 1, 0, 'avatar.png', 0, '#2180f3'),
(41, 'Pelumi olufemi', 'pmichael3006@gmail.co', NULL, '$2y$10$8PjxGI2bGnJS1SIkAoC/x.i.olGOOGBarqVKWvGELsp4tpcHPF1Ai', NULL, '2023-05-11 20:23:55', '2023-05-11 20:23:55', 'Pmichael3006@gmai', NULL, NULL, 4, 0, 0, '09053489201', '255a41e5d318960c4f38e868f66be6a2', 0, 0, 'avatar.png', 0, '#2180f3'),
(42, 'Dominic Egwuagu', 'dominican714@yahoo.co.uk', NULL, '$2y$10$G8LUPpSFZs3RNEn6GZjCfufRCBo/6Gq9hqW3m7WWoLVqoRqTIMaAG', NULL, '2023-05-11 22:08:39', '2023-05-11 22:08:39', 'dominican', NULL, NULL, 4, 0, 0, '08155269704', 'a0bbb96abda555574c728cc08715a1c3', 0, 0, 'avatar.png', 0, '#2180f3'),
(43, 'Emmanuel Arogbesan ', 'emmanifold@yahoo.com', '2023-05-12 08:43:49', '$2y$10$hDpv7IzOX50fi.Xu1mUHDeKvnT0CBIcaXWbjCL49P33fb1N2yhCse', NULL, '2023-05-12 08:32:17', '2023-05-12 08:43:49', '@ Ibadan ', NULL, NULL, 4, 0, 0, '08164818993', 'a39fb21e129a2165723828dd21a07523', 1, 0, 'avatar.png', 0, '#2180f3'),
(44, 'DIVINE CHISOM', 'divinenwabueze2002@gmail.com', '2023-05-12 17:07:17', '$2y$10$fJrvv863t4W869QTK7FL3.x4pbdj8qIsjMh6PDvXz/ipXQsOcauRC', NULL, '2023-05-12 17:05:49', '2023-05-12 17:07:17', 'CHUKWUSOMAGA', NULL, NULL, 4, 0, 0, '09135537356', 'e161c4491b1551af642ac4ec55136303', 1, 0, 'avatar.png', 0, '#2180f3');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_addresses`
--

CREATE TABLE `user_profile_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_address` varchar(191) NOT NULL,
  `second_address` varchar(191) DEFAULT NULL,
  `landmark` varchar(191) DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile_addresses`
--

INSERT INTO `user_profile_addresses` (`id`, `first_address`, `second_address`, `landmark`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`, `users_id`) VALUES
(1, 'Alao akala street, ologun eru, eleyele', NULL, '', 'Modakeke', 'Osun', '220221', 'Nigeria', '2023-05-06 15:21:27', '2023-05-08 13:21:27', 28),
(2, 'No. 8, Surulere street Oke Ola, Gbongan', NULL, '', 'Gbongan', NULL, '221103', 'Nigeria', '2023-05-06 16:19:13', '2023-05-06 16:19:13', 30),
(3, 'Oke Ola', NULL, '', 'Gbongan', 'Osun', '11232', 'Nigeria', '2023-05-06 21:48:48', '2023-05-08 16:34:33', 32),
(4, '40 unity road Megida ', NULL, '', 'Ayobo ', 'Lagos', '100278', 'Nigeria', '2023-05-08 13:58:30', '2023-05-08 13:58:30', 33),
(5, 'Y51d', NULL, '', 'Ilesa ', 'Osun', '234111', 'Nigeria', '2023-05-08 23:12:54', '2023-05-08 23:12:54', 37);

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(191) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

CREATE TABLE `whatsapp` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `initiated` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `whatsapp`
--

INSERT INTO `whatsapp` (`id`, `users_id`, `name`, `initiated`) VALUES
(1, 28, 'adeola Oladoja', '2023-05-10 14:21:24'),
(2, 30, 'Ka Ari', '2023-05-10 17:25:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_users`
--
ALTER TABLE `bank_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_social_media`
--
ALTER TABLE `blog_social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_profile`
--
ALTER TABLE `business_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyings`
--
ALTER TABLE `buyings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_histories`
--
ALTER TABLE `chat_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_subscriptions`
--
ALTER TABLE `chat_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_items`
--
ALTER TABLE `exchange_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `express_payout_histories`
--
ALTER TABLE `express_payout_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `express_transactions`
--
ALTER TABLE `express_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `express_transaction_chats`
--
ALTER TABLE `express_transaction_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback_rates`
--
ALTER TABLE `feedback_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_transaction_activities`
--
ALTER TABLE `merchant_transaction_activities`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_profiles`
--
ALTER TABLE `selling_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_announcements`
--
ALTER TABLE `sell_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_labels`
--
ALTER TABLE `set_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `users_biography_fulltext` (`biography`);

--
-- Indexes for table `user_profile_addresses`
--
ALTER TABLE `user_profile_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_users`
--
ALTER TABLE `bank_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_social_media`
--
ALTER TABLE `blog_social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_profile`
--
ALTER TABLE `business_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyings`
--
ALTER TABLE `buyings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_histories`
--
ALTER TABLE `chat_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_subscriptions`
--
ALTER TABLE `chat_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exchange_items`
--
ALTER TABLE `exchange_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;

--
-- AUTO_INCREMENT for table `express_payout_histories`
--
ALTER TABLE `express_payout_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `express_transactions`
--
ALTER TABLE `express_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `express_transaction_chats`
--
ALTER TABLE `express_transaction_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_rates`
--
ALTER TABLE `feedback_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant_transaction_activities`
--
ALTER TABLE `merchant_transaction_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `selling_profiles`
--
ALTER TABLE `selling_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sell_announcements`
--
ALTER TABLE `sell_announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `set_labels`
--
ALTER TABLE `set_labels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_profile_addresses`
--
ALTER TABLE `user_profile_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
