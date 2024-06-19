-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 08:53 AM
-- Server version: 5.7.26
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iccc`
--

-- --------------------------------------------------------

--
-- Table structure for table `ictr_acl`
--

CREATE TABLE `ictr_acl` (
  `id` int(11) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `is_protected` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictr_acl`
--

INSERT INTO `ictr_acl` (`id`, `class`, `action`, `is_protected`) VALUES
(1, 'product', 'edit', 1),
(2, 'product', 'add_new', 1),
(3, 'product', 'delete', 1),
(4, 'product', 'delete_confirmation', 1),
(5, 'product', 'index', 1),
(6, 'product', 'get_products', 1),
(7, 'product', 'update', 1),
(8, 'shop', 'add_new', 1),
(9, 'shop', 'edit', 1),
(10, 'shop', 'delete', 1),
(11, 'shop', 'delete_confirmation', 1),
(12, 'shop', 'index', 1),
(13, 'shop', 'get_shops', 1),
(14, 'shop', 'update', 1),
(15, 'shopproduct', 'edit', 1),
(16, 'shopproduct', 'add_new', 1),
(17, 'shopproduct', 'delete', 1),
(18, 'shopproduct', 'delete_confirmation', 1),
(19, 'shopproduct', 'index', 1),
(21, 'shopproduct', 'update', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ictr_city`
--

CREATE TABLE `ictr_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ictr_city`
--

INSERT INTO `ictr_city` (`id`, `name`, `region_id`) VALUES
(1, 'Mt Hagen', 1),
(2, 'Port Moreby', 3),
(3, 'Lae', 4),
(4, 'Kokopo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ictr_product`
--

CREATE TABLE `ictr_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `size` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_by` longtext COLLATE utf8_bin,
  `created_date` datetime(6) DEFAULT NULL,
  `last_updated_by` longtext COLLATE utf8_bin,
  `last_updated_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ictr_product`
--

INSERT INTO `ictr_product` (`id`, `name`, `product_category_id`, `size`, `description`, `image`, `created_by`, `created_date`, `last_updated_by`, `last_updated_date`) VALUES
(29, 'Roots Rice', 7, '20kg', '', 'roots_rice_20kg08082019163252.jpg', 'iccc', '2019-08-08 16:22:42.000000', 'iccc', '2019-08-08 17:04:47.000000'),
(30, 'Roots Rice', 7, '10kg', '', 'roots_rice_10kg08082019164349.jpg', 'iccc', '2019-08-08 16:43:53.000000', 'iccc', '2019-08-08 17:04:58.000000'),
(31, 'Roots Rice', 7, '5kg', '', 'roots_rice_5kg08082019165037.jpg', 'iccc', '2019-08-08 16:50:40.000000', 'iccc', '2019-08-08 17:05:08.000000'),
(32, 'Roots Rice', 7, '1kg', '', 'roots_rice_1kg08082019165718.jpg', 'iccc', '2019-08-08 16:57:20.000000', 'iccc', '2019-08-08 17:05:20.000000'),
(33, 'Roots Rice', 7, '500g', '', 'roots_rice_500g08082019170415.jpg', 'iccc', '2019-08-08 17:04:18.000000', 'iccc', '2019-08-08 17:05:30.000000'),
(34, 'Trukai Rice', 7, '20kg', '', 'trukai_rice_20kg08082019171846.jpg', 'iccc', '2019-08-08 17:18:49.000000', NULL, NULL),
(35, 'Trukai Rice', 7, '10kg', '', 'trukai_rice_10kg08082019171913.jpg', 'iccc', '2019-08-08 17:19:14.000000', NULL, NULL),
(36, 'Ezy Cook Rice', 7, '20kg', '', 'ezy_cook_rice_20kg08082019172705.jpg', 'iccc', '2019-08-08 17:27:11.000000', NULL, NULL),
(37, 'Ezy Cook Rice', 7, '10kg', '', 'ezy_cook_rice_10kg08082019172728.jpg', 'iccc', '2019-08-08 17:27:32.000000', NULL, NULL),
(39, 'Ezy Cook Rice', 7, '1kg', '', 'ezy_cook_rice_1kg08082019172819.jpg', 'iccc', '2019-08-08 17:28:20.000000', NULL, NULL),
(40, 'Ezy Cook Rice', 7, '500g', '', 'ezy_cook_rice_500g08082019172834.jpg', 'iccc', '2019-08-08 17:28:36.000000', NULL, NULL),
(41, 'Trukai Rice', 7, '5kg', '', 'trukai_rice_5kg08082019182113.jpg', 'iccc', '2019-08-08 18:21:15.000000', NULL, NULL),
(42, 'Trukai Rice', 7, '1kg', '', 'trukai_rice_1kg08082019182134.jpg', 'iccc', '2019-08-08 18:21:37.000000', NULL, NULL),
(43, 'Trukai Rice', 7, '500g', '', 'trukai_rice_500g08082019182203.jpg', 'iccc', '2019-08-08 18:22:04.000000', NULL, NULL),
(44, 'Ramu Sugar', 8, '1kg', '', 'ramu_sugar_1kg08082019185641.jpg', 'iccc', '2019-08-08 18:56:44.000000', NULL, NULL),
(45, 'Ramu Sugar', 8, '500g', '', 'ramu_sugar_500g08082019185659.jpg', 'iccc', '2019-08-08 18:57:01.000000', NULL, NULL),
(46, 'Ramu Sugar', 8, '250g', '', 'ramu_sugar_250g08082019185717.jpg', 'iccc', '2019-08-08 18:57:20.000000', NULL, NULL),
(47, 'Goodman Fielders Self Raising Flour', 9, '10kg', '', 'goodman_fielders_self_raising_10kg08082019191149.jpg', 'iccc', '2019-08-08 19:11:53.000000', NULL, NULL),
(48, 'Goodman Fielders Self Raising Flour', 9, '5kg', '', 'goodman_fielders_self_raising_5kg08082019192444.jpg', 'iccc', '2019-08-08 19:25:04.000000', NULL, NULL),
(49, 'Goodman Fielders Self Raising Flour', 9, '2kg', '', 'goodman_fielders_self_raising_2kg08082019193245.jpg', 'iccc', '2019-08-08 19:32:48.000000', NULL, NULL),
(50, 'Goodman Fielders Self Raising Flour', 9, '1kg', '', 'goodman_fielders_self_raising_1kg08082019194555.jpg', 'iccc', '2019-08-08 19:45:57.000000', NULL, NULL),
(51, 'Goodman Fielders Plain Flour', 9, '10kg', '', 'goodman_fielders_plain_10kg08082019211032.jpg', 'iccc', '2019-08-08 21:10:39.000000', NULL, NULL),
(52, 'Goodman Fielders Plain Flour', 9, '5kg', '', 'goodman_fielders_plain_5kg08082019211103.jpg', 'iccc', '2019-08-08 21:11:08.000000', NULL, NULL),
(53, 'Goodman Fielders Plain Flour', 9, '2kg', '', 'goodman_fielders_plain_2kg08082019211128.jpg', 'iccc', '2019-08-08 21:11:30.000000', NULL, NULL),
(54, 'Goodman Fielders Plain Flour', 9, '1kg', '', 'goodman_fielders_plain_1kg08082019211147.jpg', 'iccc', '2019-08-08 21:11:49.000000', NULL, NULL),
(55, 'Goodman Fielders Wholemeal Flour', 9, '10kg', '', 'goodman_fielders_wholemeal_10kg08082019212701.jpg', 'iccc', '2019-08-08 21:27:06.000000', NULL, NULL),
(56, 'Goodman Fielders Wholemeal Flour', 9, '5kg', '', 'goodman_fielders_wholemeal_5kg08082019212726.jpg', 'iccc', '2019-08-08 21:27:40.000000', NULL, NULL),
(57, 'Goodman Fielders Wholemeal Flour', 9, '1kg', '', 'goodman_fielders_wholemeal_1kg08082019212800.jpg', 'iccc', '2019-08-08 21:28:04.000000', NULL, NULL),
(58, 'Tablebirds Self Raising Flour', 9, '10kg', '', 'tablebirds_self_raising_10kg08082019214824.jpg', 'iccc', '2019-08-08 21:48:39.000000', NULL, NULL),
(59, 'Tablebirds Self Raising Flour', 9, '5kg', '', 'tablebirds_self_raising_5kg08082019214857.jpg', 'iccc', '2019-08-08 21:49:00.000000', NULL, NULL),
(60, 'Tablebirds Self Raising Flour', 9, '2kg', '', 'tablebirds_self_raising_2kg08082019214918.jpg', 'iccc', '2019-08-08 21:49:24.000000', NULL, NULL),
(61, 'Tablebirds Self Raising Flour', 9, '1kg', '', 'tablebirds_self_raising_1kg08082019214940.jpg', 'iccc', '2019-08-08 21:49:47.000000', NULL, NULL),
(62, 'Tablebirds Plain Flour', 9, '10kg', '', 'tablebirds_plain_10kg08082019220507.jpg', 'iccc', '2019-08-08 22:05:09.000000', NULL, NULL),
(63, 'Tablebirds Plain Flour', 9, '5kg', '', 'tablebirds_plain_5kg08082019220523.jpg', 'iccc', '2019-08-08 22:05:27.000000', NULL, NULL),
(64, 'Tablebirds Plain Flour', 9, '2kg', '', 'tablebirds_plain_2kg08082019220546.jpg', 'iccc', '2019-08-08 22:05:48.000000', NULL, NULL),
(65, 'Tablebirds Plain Flour', 9, '1kg', '', 'tablebirds_plain_1kg08082019220607.jpg', 'iccc', '2019-08-08 22:06:11.000000', NULL, NULL),
(66, 'Tablebirds Wholemeal Flour', 9, '10kg', '', 'tablebirds_wholemeal_10kg08082019222206.jpg', 'iccc', '2019-08-08 22:22:11.000000', NULL, NULL),
(67, 'Tablebirds Wholemeal Flour', 9, '5kg', '', 'tablebirds_wholemeal_5kg08082019222226.jpg', 'iccc', '2019-08-08 22:22:29.000000', NULL, NULL),
(68, 'Tablebirds Wholemeal Flour', 9, '2kg', '', 'tablebirds_wholemeal_2kg08082019222252.jpg', 'iccc', '2019-08-08 22:22:56.000000', NULL, NULL),
(69, 'Tablebirds Wholemeal Flour', 9, '1kg', '', 'tablebirds_wholemeal_1kg08082019222316.jpg', 'iccc', '2019-08-08 22:23:24.000000', NULL, NULL),
(70, 'Besta Mackeral Tomato Tinned Fish', 1, '425g', '', 'besta_mackeral_tomato_425g09082019074956.jpg', 'iccc', '2019-08-09 07:50:02.000000', 'iccc', '2019-08-09 07:50:57.000000'),
(71, 'Diana Tuna Tinned Fish', 1, '425g', '', 'diana_tuna_425g09082019075031.jpg', 'iccc', '2019-08-09 07:50:35.000000', NULL, NULL),
(72, '777 Mackeral Oil Tinned Fish', 1, '425g', '', '777_mackeral_oil_425g09082019075159.jpg', 'iccc', '2019-08-09 07:52:00.000000', 'iccc', '2019-08-10 21:08:22.000000'),
(73, 'Ocean Blue Oil Tinned Fish', 1, '425g', '', 'ocean_blue_oil_425g09082019075230.jpg', 'iccc', '2019-08-09 07:52:32.000000', NULL, NULL),
(74, 'Diana Flakes in Oil Tinned Fish', 1, '170g', '', 'diana_flakes_oil_170g09082019075318.jpg', 'iccc', '2019-08-09 07:53:24.000000', NULL, NULL),
(75, 'Ox & Palm Red Tinned Meat', 2, '340g', '', 'oxandpalm_red_340g09082019082558.jpg', 'iccc', '2019-08-09 08:25:09.000000', 'iccc', '2019-08-09 08:26:03.000000'),
(76, 'Ox & Palm Blue Tinned Meat', 2, '340g', '', 'oxandpalm_blue_340g09082019082641.jpg', 'iccc', '2019-08-09 08:26:45.000000', 'iccc', '2019-08-09 08:30:35.000000'),
(77, 'Tulip Pork Luncheon', 2, '340g', '', 'tulip_pork_luncheon_340g09082019082734.jpg', 'iccc', '2019-08-09 08:28:14.000000', NULL, NULL),
(78, 'Curried Chicken Tinned Meat', 2, '312g', '', 'curried_chicken_312g,jpg09082019082908.jpg', 'iccc', '2019-08-09 08:29:12.000000', 'iccc', '2019-08-09 16:23:59.000000'),
(79, 'Nestle Coffee', 3, '50g', '', 'nestle_coffee_50g09082019093047.jpg', 'iccc', '2019-08-09 09:30:53.000000', NULL, NULL),
(80, 'Nestle Coffee', 3, '30g', '', 'nestle_coffee_30g09082019093106.jpg', 'iccc', '2019-08-09 09:31:12.000000', NULL, NULL),
(81, 'Nestle Milo', 3, '50g', '', NULL, 'iccc', '2019-08-09 09:31:42.000000', NULL, NULL),
(82, 'Nestle Coffee Mate', 3, '50g', '', 'nestle_coffee_mate_50g09082019093228.jpg', 'iccc', '2019-08-09 09:32:34.000000', NULL, NULL),
(83, 'Nestle Coffee Mate', 3, '30g', '', NULL, 'iccc', '2019-08-09 09:32:54.000000', NULL, NULL),
(84, 'No.1 Tea Bag', 3, '25s', '', 'no1_tea_bag_25s09082019093327.jpg', 'iccc', '2019-08-09 09:33:31.000000', NULL, NULL),
(85, 'Nestle Sunshine Milk', 3, '100g', '', 'nestle_sunshine_milk_100g09082019093416.jpg', 'iccc', '2019-08-09 09:34:25.000000', NULL, NULL),
(86, 'Nestle Sunshine Milk', 3, '55g', '', 'nestle_sunshine_milk_55g09082019093438.jpg', 'iccc', '2019-08-09 09:34:43.000000', NULL, NULL),
(87, 'Ezy Cook Rice', 7, '5kg', '', '', 'iccc', '2019-08-09 10:15:26.000000', 'iccc', '2019-08-09 11:09:32.000000'),
(88, 'Klina Soap', 4, 'Single', '', 'klina_soap_single09082019112138.jpg', 'iccc', '2019-08-09 11:21:41.000000', NULL, NULL),
(89, 'Waswas Soap', 4, 'Single', '', 'waswas_soap_single09082019112203.jpg', 'iccc', '2019-08-09 11:22:08.000000', NULL, NULL),
(90, 'Dazzle Bleach', 4, '200ml', '', 'dazzle_bleach_200ml09082019112237.jpg', 'iccc', '2019-08-09 11:22:40.000000', NULL, NULL),
(91, 'Giv Soap White', 4, '76g', '', 'giv_soap_white_76g09082019112310.jpg', 'iccc', '2019-08-09 11:23:14.000000', NULL, NULL),
(92, 'Protex Soap Gentle', 4, '90g', '', 'protex_soap_gentle_90g09082019112340.jpg', 'iccc', '2019-08-09 11:23:43.000000', NULL, NULL),
(93, 'So Klin Softener Pink', 4, '250g', '', 'so_klin_softener_pink_250g09082019112411.jpg', 'iccc', '2019-08-09 11:24:15.000000', NULL, NULL),
(94, 'Arrow Beef Biscuit', 5, '85g', '', 'arrow_beef_bisket_85g09082019162623.jpg', 'iccc', '2019-08-09 12:05:22.000000', 'iccc', '2019-08-09 16:26:25.000000'),
(95, 'Em Nau Beef Biscuit', 5, '70g', '', 'em_nau_beef_70g09082019120616.jpg', 'iccc', '2019-08-09 12:06:19.000000', NULL, NULL),
(96, 'Hiway Beef Biscuit', 5, '140g', '', 'hiway_beef_140g09082019120644.jpg', 'iccc', '2019-08-09 12:06:47.000000', NULL, NULL),
(97, 'Navy Biscuit', 5, '125g', '', 'navy_biscuit_125g09082019134941.jpg', 'iccc', '2019-08-09 12:07:43.000000', 'iccc', '2019-08-09 13:49:42.000000'),
(98, 'Snax Chicken Biscuit', 5, '80g', '', 'snax_chicken_80g09082019120818.jpg', 'iccc', '2019-08-09 12:08:22.000000', NULL, NULL),
(99, 'Wopa Biscuit', 5, '125g', '', 'wopa_biscuit_125g09082019120851.jpg', 'iccc', '2019-08-09 12:09:00.000000', NULL, NULL),
(107, 'Highlands Cooking Oil', 6, '1ltr', '', 'highlands_cooking_oil_1ltr09082019184632.jpg', 'iccc', '2019-08-09 18:46:35.000000', NULL, NULL),
(108, 'Highlands Cooking Oil', 6, '500ml', '', 'highlands_cooking_oil_500ml09082019184656.jpg', 'iccc', '2019-08-09 18:47:05.000000', NULL, NULL),
(109, 'Highlands Cooking Oil', 6, '2ltr', '', 'highlands_cooking_oil_2ltr09082019184719.jpg', 'iccc', '2019-08-09 18:47:23.000000', NULL, NULL),
(110, 'Highlands Cooking Oil', 6, '250ml', '', 'highlands_cooking_oil_250ml09082019184730.jpg', 'iccc', '2019-08-09 18:47:40.000000', NULL, NULL),
(111, 'Laga Cooking Oil', 6, '1ltr', '', 'laga_cooking_oil_1ltr09082019184748.jpg', 'iccc', '2019-08-09 18:48:11.000000', NULL, NULL),
(112, 'Laga Cooking Oil', 6, '500ml', '', 'laga_cooking_oil_500ml09082019184826.jpg', 'iccc', '2019-08-09 18:48:27.000000', NULL, NULL),
(113, 'Laga Cooking Oil', 6, '250ml', '', 'laga_cooking_oil_250ml09082019184839.jpg', 'iccc', '2019-08-09 18:48:42.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictr_product_category`
--

CREATE TABLE `ictr_product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `product_category_type_id` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ictr_product_category`
--

INSERT INTO `ictr_product_category` (`id`, `name`, `product_category_type_id`, `image`) VALUES
(1, 'Tinned Fish', 2, 'tinned_fish.jpg'),
(2, 'Tinned Meat', 2, 'tinned_meat.jpg'),
(3, 'Beverage Item', 2, 'beverage_item.jpg'),
(4, 'Laundery and Toiletry', 2, 'laundery_toiletry.jpg'),
(5, 'Biscuit', 2, 'biscuit.jpg'),
(6, 'Cooking Oil', 2, 'cooking_oil.jpg'),
(7, 'Rice', 1, 'rice.jpg'),
(8, 'Sugar', 1, 'sugar.jpg'),
(9, 'Flour', 1, 'flour.jpg'),
(10, 'Fuel', 2, 'fuel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ictr_product_category_type`
--

CREATE TABLE `ictr_product_category_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ictr_product_category_type`
--

INSERT INTO `ictr_product_category_type` (`id`, `name`) VALUES
(1, 'Declared Goods'),
(2, 'Non-Declared Goods');

-- --------------------------------------------------------

--
-- Table structure for table `ictr_region`
--

CREATE TABLE `ictr_region` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ictr_region`
--

INSERT INTO `ictr_region` (`id`, `name`) VALUES
(1, 'Highlands Region'),
(2, 'Islands Region'),
(3, 'Southern Region'),
(4, 'Momase Region');

-- --------------------------------------------------------

--
-- Table structure for table `ictr_shop`
--

CREATE TABLE `ictr_shop` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `city_id` int(11) NOT NULL,
  `location_latitude` longtext COLLATE utf8_bin,
  `location_longtitude` longtext COLLATE utf8_bin,
  `website` longtext COLLATE utf8_bin,
  `description` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `created_by` longtext COLLATE utf8_bin,
  `created_date` datetime(6) DEFAULT NULL,
  `last_updated_by` longtext COLLATE utf8_bin,
  `last_updated_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ictr_shop`
--

INSERT INTO `ictr_shop` (`id`, `name`, `city_id`, `location_latitude`, `location_longtitude`, `website`, `description`, `created_by`, `created_date`, `last_updated_by`, `last_updated_date`) VALUES
(33, 'Boroko Foodworld', 2, ' -9.448938', '147.196326', 'www.facebook.com/pages/Boroko-Foodworld', '', 'iccc', '2019-08-08 15:22:03.000000', NULL, NULL),
(34, 'J Mart', 2, ' -9.437193', '147.203983', 'www.jmartpng.com', '', 'iccc', '2019-08-08 15:22:44.000000', NULL, NULL),
(35, 'Mosin Plaza', 2, ' -9.387699', '147.156668', 'www.mosinplazapng.com', '', 'iccc', '2019-08-08 15:23:20.000000', NULL, NULL),
(36, 'RH Hypermart Vision City', 2, ' -9.445940', '147.190024', 'www.rhtradingpng.com', '', 'iccc', '2019-08-08 15:23:55.000000', 'iccc', '2019-08-10 15:19:42.000000'),
(37, 'TST Boroko', 2, ' -9.462139', '147.195800', 'www.tstpng.com', '', 'iccc', '2019-08-08 15:24:24.000000', NULL, NULL),
(38, 'Puma - 4 Mile Fuel Station', 2, ' -9.461852', '147.196484', '', '', 'iccc', '2019-08-08 15:26:41.000000', NULL, NULL),
(39, 'Puma - Manu Autoport Fuel Station', 2, ' -9.477583', '147.199702', '', '', 'iccc', '2019-08-08 15:27:07.000000', NULL, NULL),
(40, 'Puma - Badili Fuel Station', 2, ' -9.477300', '147.172942', '', '', 'iccc', '2019-08-08 15:27:26.000000', NULL, NULL),
(41, 'Puma - Koki Fish Market Fuel Station', 2, ' -9.481181', '147.167239', '', '', 'iccc', '2019-08-08 15:27:59.000000', NULL, NULL),
(42, 'Puma - Kone Harbour Fuel Station', 2, ' -9.467583', '147.155163', '', '', 'iccc', '2019-08-08 15:28:41.000000', NULL, NULL),
(43, 'Puma - Kone Hillside Fuel Station', 2, ' -9.466707', '147.158592', '', '', 'iccc', '2019-08-08 15:29:05.000000', NULL, NULL),
(44, 'Puma - Hohola Fuel Station', 2, ' -9.460631', ' 147.177607', '', '', 'iccc', '2019-08-08 15:29:58.000000', NULL, NULL),
(45, 'Puma - Waigani Tunnel Fuel Station', 2, ' -9.451020', '147.186106', '', '', 'iccc', '2019-08-08 15:30:23.000000', NULL, NULL),
(46, 'Puma - Metro 9 Mile Fuel Station', 2, ' -9.394478', '147.226527', '', '', 'iccc', '2019-08-08 15:30:45.000000', NULL, NULL),
(47, 'Mobil - Lahara Fuel Station', 2, ' -9.467331', ' 147.192435', '', '', 'iccc', '2019-08-08 15:31:09.000000', NULL, NULL),
(48, 'Mobil - 5 Mile Fuel Station', 2, ' -9.458177', '147.201376', '', '', 'iccc', '2019-08-08 15:31:37.000000', NULL, NULL),
(49, 'Mobil - Ela Beach Fuel Station', 2, ' -9.478033', '147.160381', '', '', 'iccc', '2019-08-08 15:32:07.000000', NULL, NULL),
(50, 'Mobil - Waigani BSP Fuel Station', 2, ' -9.446613', '147.183170', '', '', 'iccc', '2019-08-08 15:32:31.000000', NULL, NULL),
(51, 'Mobil - Tokarara Fuel Station', 2, ' -9.425603', '147.178829', '', '', 'iccc', '2019-08-08 15:32:52.000000', NULL, NULL),
(52, 'Mobil - Rainbow Fuel Station', 2, ' -9.401184', '147.161110', '', '', 'iccc', '2019-08-08 15:33:15.000000', NULL, NULL),
(53, 'Mobil - RH Vision City Fuel Station', 2, ' -9.436791', '147.180168', '', '', 'iccc', '2019-08-08 15:33:37.000000', NULL, NULL),
(54, 'Mobil - 8 Mile Fuel Station', 2, ' -9.417573', '147.217624', '', '', 'iccc', '2019-08-08 15:33:58.000000', NULL, NULL),
(55, 'Total - Badili Fuel Station', 2, ' -9.476263', '147.173007', '', '', 'iccc', '2019-08-08 15:34:22.000000', NULL, NULL),
(56, 'Total - Wild Life Erima Fuel Station', 2, ' -9.430580', '147.205898', '', '', 'iccc', '2019-08-08 15:34:44.000000', NULL, NULL),
(57, 'Total - Mira 9 Mile Fuel Station', 2, ' -9.409462', '147.225524', '', '', 'iccc', '2019-08-08 15:35:04.000000', NULL, NULL),
(58, 'NOC - Gordons Fuel Station', 2, ' -9.442127', '147.195196', '', '', 'iccc', '2019-08-08 15:35:25.000000', NULL, NULL),
(59, 'Bige - Taurama Fuel Station', 2, ' -9.513127', '147.241994', '', '', 'iccc', '2019-08-08 15:35:47.000000', NULL, NULL),
(60, 'Bige - Dogura Road Fuel Station', 2, ' -9.477385', '147.242555', '', '', 'iccc', '2019-08-08 15:36:07.000000', NULL, NULL),
(61, 'IP - 6 Mile Fuel Station', 2, ' -9.464892', '147.216935', '', '', 'iccc', '2019-08-08 15:36:25.000000', NULL, NULL),
(62, 'IP - 9 Mile Fuel Station', 2, ' -9.397097', '147.229995', '', '', 'iccc', '2019-08-08 15:36:44.000000', NULL, NULL),
(63, 'Bismillah - Gerehu Fuel Station', 2, ' -9.392216', '147.161641', '', '', 'iccc', '2019-08-08 15:37:01.000000', NULL, NULL),
(64, 'Gera - Bomana Fuel Station', 2, ' -9.393028', '147.233805', '', '', 'iccc', '2019-08-08 15:37:23.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictr_shop_product`
--

CREATE TABLE `ictr_shop_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `current_price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `discount_price_start` datetime DEFAULT NULL,
  `discount_price_end` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated_by` varchar(50) DEFAULT NULL,
  `last_updated_date` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictr_shop_product`
--

INSERT INTO `ictr_shop_product` (`id`, `product_id`, `shop_id`, `current_price`, `discount_price`, `discount_price_start`, `discount_price_end`, `created_by`, `created_date`, `last_updated_by`, `last_updated_date`, `description`) VALUES
(22, 84, 36, '3.65', '0.00', NULL, NULL, 'iccc', '2019-08-10 21:30:24', NULL, NULL, 'Test entry 1'),
(23, 88, 36, '0.90', '0.00', NULL, NULL, 'iccc', '2019-08-10 21:31:27', NULL, NULL, 'Test entry 2'),
(24, 75, 36, '12.50', '0.00', NULL, NULL, 'iccc', '2019-08-10 21:32:34', 'iccc', '2019-08-10 21:35:08', 'Test entry 2'),
(25, 34, 37, '94.05', '0.00', NULL, NULL, 'iccc', '2019-08-10 21:33:33', 'iccc', '2019-08-10 21:34:57', 'Test entry 4');

-- --------------------------------------------------------

--
-- Table structure for table `ictr_user`
--

CREATE TABLE `ictr_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `position_title` varchar(100) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictr_user`
--

INSERT INTO `ictr_user` (`id`, `user_name`, `full_name`, `position_title`, `company`, `image`) VALUES
(1, 'suthzy', 'Sutherland Nele', 'Software Engineer', 'Cloudcode PNG Limited', 'snele.jpg'),
(2, 'cakuani', 'Cyril Akuani', 'Senior PR Officer', 'PNG ICCC', 'cakuani.jpg'),
(3, 'cgabesoa', 'Christopher Gabesoa', 'Investigation Officer', 'PNG ICCC', ''),
(4, 'csali', 'Cliveson Sali', 'Senior ICT Officer', 'PNG ICCC', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ictr_acl`
--
ALTER TABLE `ictr_acl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ictr_city`
--
ALTER TABLE `ictr_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_ictr_city_RegionId` (`region_id`);

--
-- Indexes for table `ictr_product`
--
ALTER TABLE `ictr_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_ictr_product_ProductCategoryId` (`product_category_id`);

--
-- Indexes for table `ictr_product_category`
--
ALTER TABLE `ictr_product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`product_category_type_id`);

--
-- Indexes for table `ictr_product_category_type`
--
ALTER TABLE `ictr_product_category_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ictr_region`
--
ALTER TABLE `ictr_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ictr_shop`
--
ALTER TABLE `ictr_shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_ictr_shop_CityId` (`city_id`);

--
-- Indexes for table `ictr_shop_product`
--
ALTER TABLE `ictr_shop_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`product_id`),
  ADD KEY `id_idx1` (`shop_id`);

--
-- Indexes for table `ictr_user`
--
ALTER TABLE `ictr_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ictr_acl`
--
ALTER TABLE `ictr_acl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ictr_city`
--
ALTER TABLE `ictr_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ictr_product`
--
ALTER TABLE `ictr_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `ictr_product_category`
--
ALTER TABLE `ictr_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ictr_product_category_type`
--
ALTER TABLE `ictr_product_category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ictr_region`
--
ALTER TABLE `ictr_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ictr_shop`
--
ALTER TABLE `ictr_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `ictr_shop_product`
--
ALTER TABLE `ictr_shop_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ictr_user`
--
ALTER TABLE `ictr_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ictr_city`
--
ALTER TABLE `ictr_city`
  ADD CONSTRAINT `FK_ictr_city_ictr_region_RegionId` FOREIGN KEY (`region_id`) REFERENCES `ictr_region` (`id`);

--
-- Constraints for table `ictr_product`
--
ALTER TABLE `ictr_product`
  ADD CONSTRAINT `FK_ictr_product_ictr_product_category_ProductCategoryId` FOREIGN KEY (`product_category_id`) REFERENCES `ictr_product_category` (`id`);

--
-- Constraints for table `ictr_product_category`
--
ALTER TABLE `ictr_product_category`
  ADD CONSTRAINT `id` FOREIGN KEY (`product_category_type_id`) REFERENCES `ictr_product_category_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictr_shop`
--
ALTER TABLE `ictr_shop`
  ADD CONSTRAINT `FK_ictr_shop_ictr_city_CityId` FOREIGN KEY (`city_id`) REFERENCES `ictr_city` (`id`);

--
-- Constraints for table `ictr_shop_product`
--
ALTER TABLE `ictr_shop_product`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `ictr_product` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_shop_id` FOREIGN KEY (`shop_id`) REFERENCES `ictr_shop` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
