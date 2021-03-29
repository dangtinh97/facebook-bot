-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 28, 2021 at 03:25 PM
-- Server version: 8.0.23
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `cookie` longtext NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `uid`, `cookie`, `status`, `created_at`, `update_at`, `user_id`) VALUES
(1, 'Vũ Đăng Tính', '100003973725211', 'sb=7jBcYGkg6mfoFvIXrUWQPw5u; wd=1920x947; datr=oDJcYLJgByPJ0VHzgLQfnvY9; c_user=100003973725211; spin=r.1003528333_b.trunk_t.1616843530_s.1_v.2_; xs=23%3AVQha1E9OLgefRA%3A2%3A1616655015%3A3659%3A6399%3A%3AAcXRiIIbEpDxR9wfZAhPZI_PKDX6waNoSad5qe4TGg; fr=0TNIR3U5sd9HeYDvZ.AWUv-uyTHqgyY_bkN5UvthO1SaE.BgXC8y.yM.GBc.0.0.BgXyVN.AWVolND7BWE', 'LIVE', '2021-03-27 13:06:32', '2021-03-27 13:06:32', 1),
(2, 'Vũ Đăng Tính', '100015803552075', 'datr=YIYkYKr2znoJX2lztAqXBzLO; sb=YIYkYDC5li60JwB8ykzceTQQ; c_user=100015803552075; dpr=1.25; spin=r.1003528355_b.trunk_t.1616853463_s.1_v.2_; xs=7%3AApvQpDUuBtbtHg%3A2%3A1614252750%3A3659%3A6399%3A%3AAcX33djgM9Clk3WdkCl-kPVXkQ4tYiRhLgckEjaB148; fr=1kUf3kWJUwPaPB79h.AWW0hv1H5FwGc4DIHhpOO26VR4o.BgJIZg.wz.AAA.0.0.BgXznb.AWWY1yldha4', 'LIVE', '2021-03-27 13:58:47', '2021-03-27 13:58:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_configs`
--

CREATE TABLE `account_configs` (
  `id` int NOT NULL,
  `type` varchar(35) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'OFF',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `run` tinyint(1) NOT NULL DEFAULT '0',
  `account_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_configs`
--

INSERT INTO `account_configs` (`id`, `type`, `status`, `created_at`, `updated_at`, `run`, `account_id`) VALUES
(9, 'comment_group', 'ON', '2021-03-27 16:29:55', '2021-03-27 16:29:55', 1, 1),
(10, 'comment_new_feed', 'OFF', '2021-03-27 16:29:56', '2021-03-27 16:29:56', 1, 1),
(11, 'comment_new_feed', 'OFF', '2021-03-27 16:30:19', '2021-03-27 16:30:19', 0, 2),
(12, 'comment_reaction_post', 'OFF', '2021-03-27 16:30:20', '2021-03-27 16:30:20', 0, 2),
(13, 'comment_group', 'OFF', '2021-03-27 16:30:21', '2021-03-27 16:30:21', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_data`
--

CREATE TABLE `account_data` (
  `type` varchar(25) NOT NULL,
  `data` longtext NOT NULL,
  `id` int NOT NULL,
  `account_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_data`
--

INSERT INTO `account_data` (`type`, `data`, `id`, `account_id`, `created_at`, `updated_at`) VALUES
('comment_group', '{\"group_ids\":\"1627991397487791\",\"content\":\"[time]\"}', 1, 1, '2021-03-28 04:26:03', '2021-03-28 04:26:03'),
('comment_group', '{\"group_ids\":\"d\\u00f2ng1\\r\\nd\\u00f2ng2\",\"content\":\"d\\u00f2ng2\"}', 2, 2, '2021-03-28 04:36:52', '2021-03-28 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `comment_logs`
--

CREATE TABLE `comment_logs` (
  `id` int NOT NULL,
  `content` longtext,
  `account_id` int NOT NULL,
  `post_id` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_logs`
--

INSERT INTO `comment_logs` (`id`, `content`, `account_id`, `post_id`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '', 'comment_group', '2021-03-28 13:28:54', '2021-03-28 13:28:54'),
(2, NULL, 1, '3020805978206319', 'comment_group', '2021-03-28 13:36:20', '2021-03-28 13:36:20'),
(3, NULL, 1, '3020805978206319', 'comment_group', '2021-03-28 13:40:38', '2021-03-28 13:40:38'),
(4, NULL, 1, '3020805978206319', 'comment_group', '2021-03-28 13:41:38', '2021-03-28 13:41:38'),
(5, NULL, 1, '3051118031841780', 'comment_group', '2021-03-28 13:45:12', '2021-03-28 13:45:12'),
(6, NULL, 1, '3051289945157922', 'comment_group', '2021-03-28 13:46:26', '2021-03-28 13:46:26'),
(7, NULL, 1, '3050318108588439', 'comment_group', '2021-03-28 13:47:17', '2021-03-28 13:47:17'),
(8, NULL, 1, '3049106298709620', 'comment_group', '2021-03-28 13:47:43', '2021-03-28 13:47:43'),
(9, NULL, 1, '3051121468508103', 'comment_group', '2021-03-28 15:08:59', '2021-03-28 15:08:59'),
(10, NULL, 1, '3051373798482870', 'comment_group', '2021-03-28 15:09:42', '2021-03-28 15:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`, `token`) VALUES
(1, 'dangtinh97', 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-03-27 10:05:13', '2021-03-27 10:05:13', '27a9b6405fbce5607d3eb24567a0fa3b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_configs`
--
ALTER TABLE `account_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_data`
--
ALTER TABLE `account_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_logs`
--
ALTER TABLE `comment_logs`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_configs`
--
ALTER TABLE `account_configs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `account_data`
--
ALTER TABLE `account_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment_logs`
--
ALTER TABLE `comment_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
