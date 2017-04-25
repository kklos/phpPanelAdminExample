-- Table structure for table `comments`
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;
 
-- Dumping data for table `comments`
INSERT INTO `comments` (`id`, `content`, `announcement_id`, `created`, `modified`, `addedBy`) VALUES
(1, 'My first awesome phone!', 3, '2014-06-01 01:12:26', '2014-05-31 17:12:26', '1'),
(2, 'The most awesome phone of 2013!', 2, '2014-06-01 01:12:26', '2014-05-31 17:12:26', '2'),
(3, 'How about no?', 3, '2014-06-01 01:12:26', '2014-05-31 17:12:26', '3'),
(6, 'The best shirt!', 1, '2014-06-01 01:12:26', '2014-05-31 02:12:21', '1'),
(7, 'My business partner.', 2, '2014-06-01 01:13:45', '2014-05-31 02:13:39', '2'),
(8, 'Good tablet.', 2, '2014-06-01 01:14:13', '2014-05-31 02:14:08', '3'),
(9, 'My sports watch.', 1, '2014-06-01 01:18:36', '2014-05-31 02:18:31', '1'),
(10, 'The coolest smart watch!', 2, '2014-06-06 17:10:01', '2014-06-05 18:09:51', '2'),
(11, 'For testing purposes.', 2, '2014-06-06 17:11:04', '2014-06-05 18:10:54', '3'),
(12, 'Perfect as gift!', 1, '2014-06-06 17:12:21', '2014-06-05 18:12:11', '1'),
(13, 'Cool red shirt!', 1, '2014-06-06 17:12:59', '2014-06-05 18:12:49', '2'),
(25, 'Awesome new shirt!', 1, '2014-11-22 18:42:13', '2014-11-21 19:42:13', '3'),
(26, 'Awesome product!', 2, '2014-11-22 19:07:34', '2014-11-21 20:07:34', '1'),
(27, 'Awesome bag for you!', 1, '2014-12-04 21:11:36', '2014-12-03 22:11:36', '2'),
(28, 'You can absolutely use this one!', 1, '2014-12-04 21:12:03', '2014-12-03 22:12:03', '3'),
(30, 'Wal-mart Shirt', 2, '2014-12-13 00:52:29', '2014-12-12 01:52:29', '1'),
(31, 'New awesome shirt!', 1, '2014-12-13 00:52:54', '2014-12-12 01:52:54', '2'),
(32, 'Some new product.', 1, '2015-01-08 22:44:15', '2015-01-07 23:44:15', '3');

-- Table structure for table `announcements`
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;
 
-- Dumping data for table `announcements`
INSERT INTO `announcements` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`, `addedBy`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 336, 4, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 299, 4, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(3, 'Samsung Galaxy S4', 'How about no?', 600, 4, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(6, 'Bench Shirt', 'The best shirt!', 29, 4, '2014-06-01 01:12:26', '2014-05-31 02:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', 399, 4, '2014-06-01 01:13:45', '2014-05-31 02:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, 4, '2014-06-01 01:14:13', '2014-05-31 02:14:08'),
(9, 'Spalding Watch', 'My sports watch.', 199, 4, '2014-06-01 01:18:36', '2014-05-31 02:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', 300, 4, '2014-06-06 17:10:01', '2014-06-05 18:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', 100, 9, '2014-06-06 17:11:04', '2014-06-05 18:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60, 9, '2014-06-06 17:12:21', '2014-06-05 18:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, 9, '2014-06-06 17:12:59', '2014-06-05 18:12:49'),
(25, 'Abercrombie Allen Anew Shirt', 'Awesome new shirt!', 999, 9, '2014-11-22 18:42:13', '2014-11-21 19:42:13'),
(26, 'Another product', 'Awesome product!', 555, 9, '2014-11-22 19:07:34', '2014-11-21 20:07:34'),
(27, 'Bag', 'Awesome bag for you!', 999, 4, '2014-12-04 21:11:36', '2014-12-03 22:11:36'),
(28, 'Wallet', 'You can absolutely use this one!', 799, 4, '2014-12-04 21:12:03', '2014-12-03 22:12:03'),
(30, 'Wal-mart Shirt', '', 555, 4, '2014-12-13 00:52:29', '2014-12-12 01:52:29'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 333, 9, '2014-12-13 00:52:54', '2014-12-12 01:52:54'),
(32, 'Washing Machine Model PTRR', 'Some new product.', 999, 9, '2015-01-08 22:44:15', '2015-01-07 23:44:15');

-- Table structure for table `categories`
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  'parentId' NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
 
-- Dumping data for table `categories`
INSERT INTO `categories` (`id`,  `name`, `parentId`, `created`, `modified`) VALUES
(1, 'Odziez damska', 0,  '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(2, 'Odziez meska', 0, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(3, 'Odziez dziecięca', 0, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(4, 'Ubrania', 1, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(5, 'Buty', 1, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(6, 'Dodatki', 1, '2014-06-01 00:35:07', '2014-05-30 17:34:54');
(7, 'Bielizna', 1, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(8, 'Odzież sportowa', 1, '2014-06-01 00:35:07', '2014-05-30 17:34:54');
(9, 'Ubrania', 2, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(10, 'Buty', 2, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(11, 'Dodatki', 2, '2014-06-01 00:35:07', '2014-05-30 17:34:54');
(12, 'Bielizna', 2, '2014-06-01 00:35:07', '2014-05-30 17:34:33'),
(13, 'Odzież sportowa', 2, '2014-06-01 00:35:07', '2014-05-30 17:34:54');

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;