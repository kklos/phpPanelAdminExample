-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2017 at 07:48 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `announcementSystemDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addedBy` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`, `addedBy`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 336, 4, '2014-06-01 01:12:26', '2014-05-31 15:12:26', 1),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 299, 4, '2014-06-01 01:12:26', '2014-05-31 15:12:26', 1),
(3, 'Samsung Galaxy S4', 'How about no?', 600, 4, '2014-06-01 01:12:26', '2014-05-31 15:12:26', 1),
(6, 'Bench Shirt', 'The best shirt!', 29, 4, '2014-06-01 01:12:26', '2014-05-31 00:12:21', 1),
(7, 'Lenovo Laptop', 'My business partner.', 399, 4, '2014-06-01 01:13:45', '2014-05-31 00:13:39', 2),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, 4, '2014-06-01 01:14:13', '2014-05-31 00:14:08', 2),
(9, 'Spalding Watch', 'My sports watch.', 199, 4, '2014-06-01 01:18:36', '2014-05-31 00:18:31', 2),
(10, 'Sony Smart Watch', 'The coolest smart watch!', 300, 4, '2014-06-06 17:10:01', '2014-06-05 16:09:51', 2),
(11, 'Huawei Y300', 'For testing purposes.', 100, 9, '2014-06-06 17:11:04', '2014-06-05 16:10:54', 1),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60, 9, '2014-06-06 17:12:21', '2014-06-05 16:12:11', 1),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, 9, '2014-06-06 17:12:59', '2014-06-05 16:12:49', 1),
(25, 'Abercrombie Allen Anew Shirt', 'Awesome new shirt!', 999, 9, '2014-11-22 18:42:13', '2014-11-21 18:42:13', 1),
(26, 'Another product', 'Awesome product!', 555, 9, '2014-11-22 19:07:34', '2014-11-21 19:07:34', 1),
(27, 'Bag', 'Awesome bag for you!', 999, 4, '2014-12-04 21:11:36', '2014-12-03 21:11:36', 2),
(28, 'Wallet', 'You can absolutely use this one!', 799, 4, '2014-12-04 21:12:03', '2014-12-03 21:12:03', 2),
(30, 'Wal-mart Shirt', '', 555, 4, '2014-12-13 00:52:29', '2014-12-12 00:52:29', 2),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 333, 9, '2014-12-13 00:52:54', '2014-12-12 00:52:54', 1),
(32, 'Washing Machine Model PTRR', 'Some new product.', 999, 9, '2015-01-08 22:44:15', '2015-01-07 22:44:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parentId`, `name`, `created`, `modified`) VALUES
(1, 0, 'Odziez damska', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(2, 0, 'Odziez meska', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(3, 0, 'Odziez dziecięca', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(4, 1, 'Ubrania', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(5, 1, 'Buty', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(6, 1, 'Dodatki', '2014-06-01 00:35:07', '2014-05-30 15:34:54'),
(7, 1, 'Bielizna', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(8, 1, 'Odzież sportowa', '2014-06-01 00:35:07', '2014-05-30 15:34:54'),
(9, 2, 'Ubrania', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(10, 2, 'Buty', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(11, 2, 'Dodatki', '2014-06-01 00:35:07', '2014-05-30 15:34:54'),
(12, 2, 'Bielizna', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(13, 2, 'Odzież sportowa', '2014-06-01 00:35:07', '2014-05-30 15:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `addedBy`, `announcement_id`, `created`, `modified`) VALUES
(1, 'My first awesome phone!', 1, 3, '2014-06-01 01:12:26', '2014-05-31 15:12:26'),
(2, 'The most awesome phone of 2013!', 2, 2, '2014-06-01 01:12:26', '2014-05-31 15:12:26'),
(3, 'How about no?', 3, 3, '2014-06-01 01:12:26', '2014-05-31 15:12:26'),
(6, 'The best shirt!', 1, 1, '2014-06-01 01:12:26', '2014-05-31 00:12:21'),
(7, 'My business partner.', 2, 2, '2014-06-01 01:13:45', '2014-05-31 00:13:39'),
(8, 'Good tablet.', 3, 2, '2014-06-01 01:14:13', '2014-05-31 00:14:08'),
(9, 'My sports watch.', 1, 1, '2014-06-01 01:18:36', '2014-05-31 00:18:31'),
(10, 'The coolest smart watch!', 2, 2, '2014-06-06 17:10:01', '2014-06-05 16:09:51'),
(11, 'For testing purposes.', 3, 2, '2014-06-06 17:11:04', '2014-06-05 16:10:54'),
(12, 'Perfect as gift!', 1, 1, '2014-06-06 17:12:21', '2014-06-05 16:12:11'),
(13, 'Cool red shirt!', 2, 1, '2014-06-06 17:12:59', '2014-06-05 16:12:49'),
(25, 'Awesome new shirt!', 3, 1, '2014-11-22 18:42:13', '2014-11-21 18:42:13'),
(26, 'Awesome product!', 1, 2, '2014-11-22 19:07:34', '2014-11-21 19:07:34'),
(27, 'Awesome bag for you!', 2, 1, '2014-12-04 21:11:36', '2014-12-03 21:11:36'),
(28, 'You can absolutely use this one!', 3, 1, '2014-12-04 21:12:03', '2014-12-03 21:12:03'),
(30, 'Wal-mart Shirt', 1, 2, '2014-12-13 00:52:29', '2014-12-12 00:52:29'),
(31, 'New awesome shirt!', 2, 1, '2014-12-13 00:52:54', '2014-12-12 00:52:54'),
(32, 'Some new product.', 3, 1, '2015-01-08 22:44:15', '2015-01-07 22:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_USER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(255) NOT NULL DEFAULT 'NOT NULL',
  `last_name` varchar(255) DEFAULT 'NOT NULL',
  `status` varchar(255) NOT NULL DEFAULT 'Unactivate',
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`, `first_name`, `last_name`, `status`, `role_id`) VALUES
(15, 'daswefwe', 'kklos@gmail.com', '$2y$10$YQcXo9Pq4H76kId2GpWdPOBB2Dv/5FIsYiPYudcRRmK1iJr5hdBv6', '2017-06-04 17:44:17', 'daswefwe', 'daswefwe', 'Unactivate', 0),
(2, 'kklos2', 'kklos2@gmail.com', '$2y$10$SRYRUZWYmbcg/QR9m5tu6eNVAfizKJQeDA5UVHRhFQOcMbd9A.Zbe', '2017-05-04 19:59:26', 'NOT NULLasadasdas', 'NOT NULLwww', 'active', 0),
(17, 'kklos222s', 'klaudiakarolinaklosowska@gmail.com', '$2y$10$/aTFSUT/qbT/KJZmj4/DNOu.n2YqV7dn8iQlfMRdUd.XztNxrBLKa', '2017-06-04 17:46:22', 'kklos222s', 'kklos222s', 'Unactivate', 0),
(16, 'kklos55', 'klaudiaklosowska94@gmail.com', '$2y$10$ohcjJpOE4P6CTlhkEiDDge4MCjpzBzEYHFeXTEZUM5ldaDKHtMJ9i', '2017-06-04 17:45:12', 'kklos55', 'kklos55', 'Unactivate', 0),
(14, 'qwerty123w', 'kklos23@gmail.com', '$2y$10$vGHZFCWTSj05rFzrREvJguM9DhLbZgfN4JgOkSe7RJHoyGnBEt2jK', '2017-06-04 17:39:45', 'qwerty123w', 'qwerty123w', 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;