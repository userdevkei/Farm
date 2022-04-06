-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 01:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `rain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harvest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `region`, `season`, `from`, `to`, `rain`, `activities`, `harvest`, `created_at`, `updated_at`) VALUES
(1, 'Central', 'Rainy', '2019-04-25', '2019-07-21', '1501mm - 2500mm', 'tea, coffee, yams, maize \r\navoid peas and green grams', 'Medium - High', '2019-08-23 10:02:47', '2019-08-24 04:31:05'),
(2, 'Coast', 'Hot Dry', '2019-08-31', '2019-12-31', 'Below 500mm', 'cassava, dry harvest', 'No Harvest', '2019-08-23 14:55:29', '2019-08-23 15:02:00'),
(3, 'Eastern', 'Rainy', '2019-10-21', '2019-11-22', '501mm - 1000mm', 'farmers to plant maize beans cowpeas and sorghum in lower eastern', 'Low - High', '2019-08-24 08:50:07', '2019-09-01 14:14:27'),
(4, 'North Eastern', 'Cold Dry', '2019-08-01', '2019-11-30', 'Below 500mm', 'plant dates and clothe heavily at night temparatures may fall to 10degrees celcius', 'Low - Medium', '2019-08-24 08:51:48', '2019-08-24 08:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 'comment', '8', '4', NULL, '2019-08-27 07:41:02', '2019-08-27 07:41:02'),
(5, 'comment 7', '1', '7', NULL, '2019-08-27 09:30:17', '2019-08-27 09:30:17'),
(6, 'comments', '1', '7', NULL, '2019-08-27 09:36:40', '2019-08-27 09:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `market` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `units` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `market`, `type`, `product`, `quantity`, `units`, `b_price`, `s_price`, `day`, `created_at`, `updated_at`, `cover_image`) VALUES
(1, 'Kongowea', 'Farm Produce', 'Tomatoes', '1', 'Crates', '1,000', '1,3000', '2019-08-07', '2019-08-24 06:44:28', '2019-09-01 08:27:28', 'tomatoes_1567337248.jpeg'),
(2, 'Kikomba Market', 'Animal Produce', 'Milk', '10', 'Litres', '250', '300', '2019-08-25', '2019-08-24 07:55:20', '2019-09-01 08:23:08', 'milk_1567336988.jpg'),
(3, 'Kalundu', 'Farm Produce', 'Onions', '1', 'Nets', '500', '700', '2019-08-05', '2019-08-24 07:59:54', '2019-09-01 08:28:31', 'onions_1567337310.jpg'),
(4, 'Marikiti', 'Farm Produce', 'Coconut', '1', 'Bags', '1,000', '1,5000', '2019-08-30', '2019-08-24 08:01:33', '2019-09-01 08:17:40', 'coconut_1567336660.jpg'),
(5, 'Kunda Kindu', 'Animal Produce', 'eggs', '1', 'Crates', '250', '300', '2019-08-29', '2019-08-24 08:02:41', '2019-09-01 08:17:58', 'eggs_1567336678.jpg'),
(6, 'Kongowea', 'Farm Produce', 'Maize', '1', 'Bags', '3025', '3500', '2019-08-04', '2019-08-31 12:36:26', '2019-09-01 08:02:21', 'grains_1567335741.jpeg'),
(7, 'Kalundu', 'Farm Produce', 'Maize', '1', 'Bags', '3000', '3200', '2019-09-04', '2019-08-31 12:37:36', '2019-09-01 08:01:10', 'grains_1567335670.jpeg'),
(8, 'Kitale', 'Farm Produce', 'Maize', '1', 'Bags', '2500', '2700', '2019-09-04', '2019-08-31 12:38:20', '2019-09-01 08:01:30', 'grains_1567335690.jpeg'),
(9, 'Tana-River', 'Farm Produce', 'Maize', '1', 'Bags', '4200', '4450', '2019-09-04', '2019-08-31 12:39:19', '2019-09-01 08:01:40', 'grains_1567335700.jpeg'),
(10, 'Kiambu', 'Farm Produce', 'Maize', '1', 'Bags', '2850', '3000', '2019-09-04', '2019-08-31 12:40:08', '2019-09-01 08:01:51', 'grains_1567335711.jpeg'),
(11, 'Nairobi', 'Farm Produce', 'Maize', '1', 'Bags', '2950', '3180', '2019-09-04', '2019-08-31 12:40:45', '2019-09-01 08:02:01', 'grains_1567335721.jpeg'),
(12, 'Kiambu', 'Animal Produce', 'Milk', '10', 'Litres', 'Ksh. 200', '250', '2019-09-05', '2019-09-01 04:09:03', '2019-09-01 08:23:19', 'milk_1567336999.jpg'),
(13, 'Kongowea', 'Animal Produce', 'eggs', '1', 'Crates', '280', '320', '2019-09-04', '2019-09-01 04:12:51', '2019-09-01 08:11:46', 'eggs_1567336306.jpg'),
(14, 'Kiambu', 'Animal Produce', 'eggs', '1', 'Crates', '220', '290', '2019-09-06', '2019-09-01 04:14:15', '2019-09-01 08:10:50', 'eggs_1567336249.jpg'),
(15, 'Marikiti', 'Animal Produce', 'eggs', '1', 'Crates', '290', '340', '2019-09-06', '2019-09-01 04:14:49', '2019-09-01 08:11:19', 'eggs_1567336279.jpg'),
(16, 'Kikomba Market', 'Animal Produce', 'eggs', '1', 'Crates', '270', '350', '2019-09-04', '2019-09-01 04:16:28', '2019-09-01 08:12:02', 'eggs_1567336322.jpg');

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
(3, '2019_08_19_051804_add_level_to_users', 2),
(4, '2019_08_20_190229_create_websites_table', 3),
(5, '2019_08_20_205120_create_sponsors_table', 4),
(6, '2019_08_21_115208_create_posts_table', 5),
(7, '2019_08_21_135552_add_cover_image_to_posts', 6),
(8, '2019_08_23_102405_create_calendars_table', 7),
(9, '2019_08_23_154906_create_markets_table', 8),
(10, '2019_08_24_074048_add_cover_image_to_markets', 9),
(11, '2019_08_24_125620_create_soils_table', 10),
(12, '2019_08_26_130320_create_comments_table', 11),
(13, '2019_08_27_082033_create_posts_comments_table', 12),
(14, '2019_08_27_082315_add_image_to_posts', 13),
(15, '2019_08_28_061928_create_services_table', 14),
(16, '2019_09_01_184414_create_supports_table', 15),
(17, '2019_09_01_200926_create_supports_table', 16);

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
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `message`, `user_id`, `created_at`, `updated_at`, `cover_image`) VALUES
(4, 'Post 1', 'message for post 1 bla bla', '8', '2019-08-27 07:34:10', '2019-08-27 08:13:25', '47337A7500000578-0-image-a-43_1512949273735_1566902050.jpg'),
(5, 'Post 2', 'drtgf', '8', '2019-08-27 07:41:49', '2019-08-27 07:41:49', 'maxresdefault (1)_1566902508.jpg'),
(6, 'post 3', 'message for post', '5', '2019-08-27 08:36:36', '2019-08-27 08:36:36', 'disabled_1566905795.jpg'),
(7, 'post 4', 'message content about post 4', '5', '2019-08-27 08:38:48', '2019-08-27 08:38:48', 'cbo_1566905928.jpg'),
(8, 'I have maize with dwarf growth', 'I am a maize farmer for a long period but now am facing a challenge with my maize is not growing as fast as before', '1', '2019-08-27 09:50:58', '2019-08-27 09:50:58', '47337A7500000578-0-image-a-43_1512949273735_1566910257.jpg'),
(9, 'Support', 'am interested in supporting a tea farmer', '6', '2019-09-01 16:03:42', '2019-09-01 16:04:13', 'chicken_1567364653.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `farmer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `description`, `cover_image`, `farmer_id`, `officer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Type of Fertilizers to use', '1234567890 1234567890', 'images_1566984367.jpg', '8', '5', 'Pending', '2019-08-28 06:26:07', '2019-08-28 06:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `soils`
--

CREATE TABLE `soils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drainage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aeration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_crops` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soils`
--

INSERT INTO `soils` (`id`, `name`, `color`, `cover_image`, `ph`, `drainage`, `aeration`, `s_crops`, `created_at`, `updated_at`) VALUES
(1, 'sandy soil', 'white', 'maxresdefault_1566677285.jpg', '11.6 - 14.0', 'Good', 'Good', 'coconut, dates,sorghum', '2019-08-24 17:08:05', '2019-08-24 17:37:02'),
(2, 'clay soil', 'red', 'rice-terraces-field-farming-village-longsheng-guangxi-china1000x600_0_1566679260.jpg', '3.6 - 6.9', 'Poor', 'Poor', 'cotton, maize, beans, others', '2019-08-24 17:37:59', '2019-08-24 17:41:01'),
(3, 'loam soil', 'black', '107689224-farmer-planting-potato-seeds-in-the-garden-organic-farming-on-field-seasonal-working-people_1566679140.jpg', '3.6 - 6.9', 'Medium', 'Good', 'all food crops', '2019-08-24 17:39:00', '2019-08-24 17:39:00'),
(4, 'loam soil', 'red', 'wedding_1566679181.jpg', '1 - 3.5', 'Good', 'Good', 'all food crops', '2019-08-24 17:39:41', '2019-08-24 17:39:41'),
(5, 'loam soil', 'grey', 'maxresdefault (1)_1566679236.jpg', '11.6 - 14.0', 'Good', 'Poor', 'maize, beans, peas, tea', '2019-08-24 17:40:36', '2019-08-24 17:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `cover_image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Technical University of Mombasa', 'rice-terraces-field-farming-village-longsheng-guangxi-china1000x600_0_1566335898.jpg', 'funding research guidance bla bla bla bla', '2019-08-20 18:18:18', '2019-08-20 18:18:18'),
(2, 'Another Sponsor', 'farmer broadcasting_1566387466.jpg', 'sponsorship details here', '2019-08-21 08:37:47', '2019-08-21 08:37:47'),
(4, 'Informal Agricultural Jobs', 'maxresdefault_1566576529.jpg', 'asasasa', '2019-08-23 13:08:49', '2019-08-23 13:08:49'),
(5, 'jasin', '47337A7500000578-0-image-a-43_1512949273735_1566640886.jpg', 'gyggggyygyygyyfy', '2019-08-24 07:01:26', '2019-08-24 07:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farming` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `investor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `investment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `farming`, `type`, `product`, `support`, `status`, `investor`, `investment`, `security`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Animal Farming', 'Small Scale', 'eggs', 'Both', 0, NULL, NULL, NULL, NULL, 'I would like to get support I start producing eggs for local market in Mombasa', '2019-09-02 04:59:08', '2019-09-02 04:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) DEFAULT NULL,
  `farming` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `investor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `investment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_crop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flexibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `id_number`, `farming`, `crop`, `county`, `sub_county`, `ward`, `investor`, `investment`, `support_crop`, `specialization`, `flexibility`, `cover_image`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Onesmus Mutie Kitili', 'onessykei@gmail.com', '254729434393', 32146754, 'Large Scale', 'Beans', 'kitui', 'katulani', 'mulango', NULL, NULL, NULL, NULL, NULL, '107689224-farmer-planting-potato-seeds-in-the-garden-organic-farming-on-field-seasonal-working-people_1566895677.jpg', 0, NULL, '$2y$10$AAxv1rMDqrrFb0l2KMsLhOGdiUAG2YxhJ9bKvaMbw9wJ5/TpoQFpy', NULL, '2019-08-19 03:35:06', '2019-08-19 03:35:06', 'Admin'),
(5, 'Cyrus Kitili mueke', 'mayuri.infospace@gmail.com', '254723456780', 2345678, NULL, NULL, 'kakamenga', 'kuisero', 'kuisero', NULL, NULL, NULL, 'manure and fertilizers', 'On Request', 'Capture4_1566203012.PNG', 1, NULL, '$2y$10$e4mptWR.PHPu.M6.VRWSNeefMj/ur9w1LW7I7gFS6lEosTmlMBdHa', NULL, '2019-08-19 05:23:32', '2019-08-23 07:19:40', 'Officer'),
(6, 'esther mueni kitili', 'ecssikei1@gmail.com', '254708130604', NULL, NULL, NULL, NULL, NULL, NULL, 'Individual', 'Farm Inputs', 'maize', NULL, NULL, NULL, 1, NULL, '$2y$10$slhcEtnGdjV1G6/tKlcKcuPaXnHaiJOOmt1/nRi8YlTVpQD6Wq7lm', NULL, '2019-08-20 04:48:03', '2019-08-23 07:19:53', 'Investor'),
(8, 'Cyrus Kitili mueke', 'mail1@mail.com', '254726434393', 4567888, 'Large Scale', 'Tea', 'kitui', 'kitui', 'kitui', NULL, NULL, NULL, NULL, NULL, 'cbo_1566640259.jpg', 1, NULL, '$2y$10$..oE/Ze23BLB5KaCB7YSNe.WUdZeXY8JLO/HGy.v6q6DPhxNccgme', NULL, '2019-08-22 05:57:54', '2019-08-23 07:18:30', 'Farmer'),
(9, 'Onesmus Mutie Kitili', 'onessykei18@gmail.com', '254732434393', 9876544, 'Large Scale', 'Cereals', 'mombasa', 'Nyali', 'Nyali', NULL, NULL, NULL, NULL, NULL, 'public/images1566997198-profilejpg', 0, NULL, '$2y$10$otpGHAsdznwstMqlzgwBWeSm866LsgoPTBJ0hMfv4LPpuuD5M3Lnq', NULL, '2019-08-28 09:59:58', '2019-08-28 09:59:58', 'Farmer'),
(10, 'Mwangi kinyanjui', 'mwangi@gmail.com', '254731494939', 2346789, 'Small Scale', 'Tea', 'kiambu', 'gatundu', 'gatundu', NULL, NULL, NULL, NULL, NULL, '1566998221-profilejpg', 1, NULL, '$2y$10$rqvItzXlActI4MAKNBwfzO40Ho7PWXiNUk6oblfCqBq5senZuxAOu', NULL, '2019-08-28 10:17:02', '2019-09-01 13:37:59', 'Farmer'),
(11, 'Yvonne Orwanda', 'yvonneorwanda13@gmail.com', '254791497494', 35007995, 'Small Scale', 'Maize and Soghurm', 'Homa bay', 'Mbita', 'Sindo', NULL, NULL, NULL, NULL, NULL, '1567418400-profilejpg', 0, NULL, '$2y$10$CP8BlWVAPnOCWVWtLqFsrOkBvccmoTvhR2LGQ8alnW5G.RXe2WqBO', NULL, '2019-09-02 07:00:00', '2019-09-02 07:00:00', 'Farmer');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `title`, `description`, `cover_image`, `created_at`, `updated_at`) VALUES
(9, 'Poultry', 'Domestic fowls, including chickens, turkeys, geese, and ducks, raised for the production of meat or eggs and the word is also used for the flesh of these birds used as food.', 'chicken_1567333766.jpg', '2019-09-01 07:29:27', '2019-09-01 07:29:27'),
(10, 'Horticulture', 'branch of plant agriculture dealing with garden crops, generally fruits, vegetables, and ornamental plants.', 'sukuma_1567334190.jpg', '2019-09-01 07:36:30', '2019-09-01 07:36:30'),
(11, 'Agriculture and Technology', 'Today\'s agriculture routinely uses sophisticated technologies such as robots, temperature and moisture sensors, aerial images, and GPS technology. These advanced devices and precision agriculture and robotic systems allow businesses to be more profitable, efficient, safer, and more environmentally friendly', 'tractor_1567334876.jpg', '2019-09-01 07:47:56', '2019-09-01 07:47:56'),
(12, 'Cereals Farming', 'growing of cereal crops for human food and livestock feed as well as for other uses, including industrial starch and biofuel. Cereals, or grains, are members of the grass family (Poaceae) cultivated primarily for their starchy dry fruits.', 'maiz_1567335011.jpg', '2019-09-01 07:50:11', '2019-09-01 07:50:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soils`
--
ALTER TABLE `soils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_id_number_unique` (`id_number`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soils`
--
ALTER TABLE `soils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
