-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 08:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agro_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0qrlsf61f93nck4hgss87vjhenkatfg0', '::1', 1643450552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634333435303438343b6c6f67676564496e7c613a323a7b733a323a226964223b733a313a2231223b733a393a226c6f676765645f696e223b623a313b7d757365725065726d697373696f6e737c613a343a7b693a303b733a31333a224d616e6167655f4d656d626572223b693a313b733a31313a224d616e6167655f526f6c65223b693a323b733a31373a224d616e6167655f5065726d697373696f6e223b693a333b733a32333a224d616e6167655f436f6d70616e795f53657474696e6773223b7d),
('q30k40lqs6sckhh90m478thck0vbumtg', '::1', 1643450484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634333435303438343b757365727c4f3a383a22737464436c617373223a31373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a31303a22737570657261646d696e223b733a383a2270617373776f7264223b733a33323a226163343937636661626132336334313834636230336239376538633531653061223b733a353a22656d61696c223b733a32353a22737570657261646d696e40737570657261646d696e2e636f6d223b733a31303a22637265617465645f6f6e223b733a31303a22323032322d30312d3239223b733a363a22616374697665223b733a313a2231223b733a31303a2266697273745f6e616d65223b733a353a225375706572223b733a393a226c6173745f6e616d65223b733a353a2241646d696e223b733a353a2270686f6e65223b733a31313a223031373634323538323132223b733a333a226e6964223b733a31353a22353436343136353436353635343435223b733a31323a226a6f696e696e675f64617465223b733a31303a22323032322d30312d3031223b733a383a226e69645f7363616e223b4e3b733a31363a22656d706c6f7965655f61646472657373223b733a31323a224468616b612062616e616e69223b733a31303a226465706572746d656e74223b733a383a22427573696e657373223b733a31313a2264657369676e6174696f6e223b733a333a2243464f223b733a31313a2270726f66696c655f696d67223b4e3b733a383a2267726f75705f6964223b733a313a2231223b7d6c6f67676564496e7c613a323a7b733a323a226964223b733a313a2231223b733a393a226c6f676765645f696e223b623a313b7d757365725065726d697373696f6e737c613a343a7b693a303b733a31333a224d616e6167655f4d656d626572223b693a313b733a31313a224d616e6167655f526f6c65223b693a323b733a31373a224d616e6167655f5065726d697373696f6e223b693a333b733a32333a224d616e6167655f436f6d70616e795f53657474696e6773223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `gstin` varchar(20) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `ac_no` varchar(50) DEFAULT NULL,
  `loginpage_image` varchar(200) NOT NULL,
  `invoice_image` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `name`, `short_name`, `email`, `phone`, `street`, `state`, `zip_code`, `country_id`, `gstin`, `bank_name`, `ac_no`, `loginpage_image`, `invoice_image`) VALUES
(1, 'JSR Agro.', 'JSR Agro.', 'md.abdulohab2020@gmail.com', '01755935047', 'Chapai Bypass Road', '1        ', '6000', 1, '458732FEY2542VGD', 'Al-Arafa Islami Bank Ltd.', '1203457968', 'asset/images/623f66633a7572022-03-26-20-15-47agro_asset.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'BD', 'Bangladesh', 880);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 NOT NULL,
  `delete_status` tinyint(4) DEFAULT 0,
  `delete_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `symbol`, `delete_status`, `delete_date`, `user_id`) VALUES
(1, 'BDT', '৳', 0, NULL, 1),
(2, 'Dollar', '$', 0, NULL, 1),
(3, 'Indian rupee', '₹', 0, NULL, 1),
(4, 'Turkish lira', '₺', 0, NULL, 1),
(5, 'CNY', '¥', 0, NULL, 25),
(6, 'Euro', '€', 0, NULL, 29);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `delete_status` tinyint(4) DEFAULT 0,
  `delete_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `delete_status`, `delete_date`) VALUES
(1, 'superadmin', 'All Access', NULL, 0, NULL),
(2, 'editor', 'any editing', NULL, 0, NULL),
(3, 'subadmin', 'sub admin', NULL, 0, NULL),
(4, 'fdrdfg', 'tfyhdrtyd', NULL, 0, NULL),
(5, 'fdrdfg', 'tfyhdrtyd', NULL, 0, NULL),
(6, 'new group', 'new', NULL, 0, NULL),
(7, 'ddfd', 'sdsg', NULL, 0, NULL),
(8, 'c', 'AAA', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Manage_Member', 'Managing Member', '2022-01-29 13:45:16'),
(2, 'Manage_Role', 'Managing Role', '2022-01-29 13:45:16'),
(3, 'Manage_Permission', 'Managing Permission', '2022-01-29 13:45:16'),
(4, 'Manage_Company_Settings', 'Managing Company Settings', '2022-01-29 13:45:16'),
(7, 'Manage_sales', 'Managing sales', '2022-01-30 18:06:08'),
(8, 'aa', 'aa', '2022-01-30 18:38:03'),
(9, 'jj', 'jj', '2022-01-30 19:11:18'),
(10, 's', 's', '2022-01-31 10:12:44'),
(11, 'RMR', 'RMRL', '2022-03-27 03:25:58'),
(12, 'DFDF', 'DFDF', '2022-03-27 03:27:13'),
(13, 'GHJHGJ', 'GHJGHJ', '2022-03-27 03:30:10'),
(14, 'LL;', 'L;L;', '2022-03-27 03:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 5),
(6, 2, 5),
(7, 3, 5),
(8, 4, 5),
(9, 2, 6),
(10, 4, 6),
(11, 2, 7),
(12, 1, 8),
(13, 2, 8),
(14, 3, 8),
(15, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Rajshahi', 18),
(2, 'Dhaka', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `nid` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `nid_scan` varchar(255) DEFAULT NULL,
  `employee_address` varchar(255) NOT NULL,
  `depertment` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `profile_img` varchar(50) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_on`, `active`, `first_name`, `last_name`, `phone`, `nid`, `joining_date`, `nid_scan`, `employee_address`, `depertment`, `designation`, `profile_img`, `group_id`) VALUES
(4, 'superadmin', 'b94e7a7707c2622433574aa55dbea0fbf93a5c1f', 'md.harana@yahoo.com', '2022-03-21 13:02:31', NULL, '', '', '', '', '0000-00-00', NULL, '', '', '', NULL, 1),
(10, 'RMR', 'f30e30365e0ba11034994e6cb923a70512fc9834', 'riyad.prof.bd@gmail.com', '2022-03-23 11:32:36', NULL, 'Riyad ', 'Mahmud', '01755935047', '4425416354', '0000-00-00', NULL, 'Dhaka', '', 'Chairman', NULL, 1),
(12, 'SLM', '31ce29bbbf2d6e13ae732991acd3e44f079b2004', 'riyad.prof.bd@gmail.com', '2022-03-27 01:16:47', NULL, 'SLM', 'K', '01755935047', '4425416354', '0000-00-00', NULL, 'Dhaka', '', 'MD', NULL, 3),
(13, 'RMRpplll', 'e4d56a0ed4c9c0f723e016e5280ef1c3d94d5700', 'md.abdulohab2020@gmail.com', '2022-03-27 03:04:02', NULL, 'Riyad ', '', '', '', '0000-00-00', NULL, 'Dhaka', '', 'mn', NULL, 3),
(14, 'rmpppL', '4d05b8954ebc75967579ae059a13052c90cc1f1a', 'md.abdulohab2020@gmail.com', '2022-03-27 03:11:46', NULL, '', '', '', '', '0000-00-00', NULL, '', '', '', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
