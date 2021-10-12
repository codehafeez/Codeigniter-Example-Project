-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2021 at 01:40 PM
-- Server version: 10.3.25-MariaDB
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
-- Database: `codehafe_flm`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_image` varchar(255) DEFAULT NULL,
  `ad_page` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_title`, `ad_image`, `ad_page`) VALUES
(1, 'Ad 1', 'pic1.jpg', 'Landing Page 1'),
(2, 'Ad 2', 'pic2.jpg', 'Landing Page 1'),
(3, 'Ad 3', 'pic1.jpg', 'Landing Page 1'),
(4, 'Ad 4', 'pic2.jpg', 'Landing Page 1'),
(5, 'Ad 1', 'pic1.jpg', 'Landing Page 2'),
(6, 'Ad 2', 'pic1.jpg', 'Landing Page 2'),
(7, 'Ad 3', 'pic1.jpg', 'Landing Page 2'),
(8, 'Ad 4', 'pic1.jpg', 'Landing Page 2');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_datetime`) VALUES
(1, 'Ciencia', '2021-03-12 16:00:29'),
(2, 'Deportes', '2021-03-12 16:00:44'),
(3, 'Farandula', '2021-03-12 16:00:55'),
(4, 'Internacional', '2021-03-12 16:01:03'),
(5, 'Local', '2021-03-12 16:01:10'),
(6, 'Nacional', '2021-03-12 16:01:19'),
(7, 'Tecnologia', '2021-03-12 16:01:25'),
(10, 'test1', '2021-03-14 18:05:07'),
(11, 'tes2', '2021-03-14 18:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_value1` varchar(255) DEFAULT NULL,
  `news_value2` varchar(255) DEFAULT NULL,
  `news_value3` varchar(255) DEFAULT NULL,
  `news_value4` varchar(255) DEFAULT NULL,
  `news_img` varchar(500) DEFAULT 'default-image.jpg',
  `news_txt` text DEFAULT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `news_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_value1`, `news_value2`, `news_value3`, `news_value4`, `news_img`, `news_txt`, `user_id_fk`, `news_datetime`) VALUES
(5, 'value1', 'value2', '3', NULL, 'img1.png', '<div style=\"text-align: center;\"><b><h2><b>test msg hello world</b></h2><span style=\"font-size:18px;\"></span></b></div>', 1, '2021-03-14 09:48:01'),
(6, 'txt1', 'txt2', '4', NULL, 'default-image.jpg', '<div>txt msg - hello world</div>', 1, '2021-03-14 09:48:26'),
(7, 'vaaalue1', 'vaaalue2', '3', NULL, 'img2.jpeg', '<div style=\"text-align: center;\">tx msg&nbsp;vaaalue1 hello world</div>', 1, '2021-03-14 09:49:03'),
(8, 'asdasd', 'sadasd', '1', NULL, 'default-image.jpg', '<div><br></div>', 1, '2021-03-14 16:30:02'),
(9, 'asdas', 'sadasd', '1', NULL, 'img2.jpeg', '<div>sdasdasd</div>', 1, '2021-03-14 16:30:12'),
(10, 'asd', 'sdsd', '1', NULL, 'default-image.jpg', '<div><br></div>', 1, '2021-03-14 16:30:22'),
(11, 'sdf', 'df', '3', NULL, 'default-image.jpg', '<div><br></div>', 1, '2021-03-14 16:30:29'),
(12, 'sdasd', 'sasa', '1', NULL, 'default-image.jpg', '<div>sdfsdf</div>', 1, '2021-03-14 16:30:45'),
(13, 'sdsad', 'safas', '1', NULL, 'img3.jpg', '<div>sdfsdf</div>', 1, '2021-03-14 16:31:01'),
(14, 'df', 'dsfsd', '1', NULL, 'img4.jpg', '<div><u><b>dsfsdf</b></u></div>', 1, '2021-03-14 16:31:18'),
(15, 'aaaa', 'bbb', '2', NULL, 'img1.png', '<div style=\"text-align: center;\"><b>ccccccccccccccc</b></div>', 1, '2021-03-14 16:32:56'),
(17, 'value1', 'sadasd', '1', NULL, 'img2.jpeg', '<div>sdasdas</div>', 3, '2021-03-14 18:13:30'),
(18, 'Testing', 'Testing News', '1', NULL, 'default-image.jpg', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><br><div><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\"><br></span></div>', 1, '2021-03-26 13:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `receiver_id` varchar(255) DEFAULT NULL,
  `send_datetime` varchar(255) DEFAULT NULL,
  `receiver_datetime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `sender_id`, `receiver_id`, `send_datetime`, `receiver_datetime`) VALUES
(6, 'email send by user', NULL, '3', '1', '2021-03-20 02:07:41', '2021-03-20 02:13:40'),
(7, 'email send by admin', NULL, '1', '3', '2021-03-20 02:20:12', NULL),
(8, 'email send by admin', NULL, '1', '4', '2021-03-20 02:20:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `send_emails_subscribes`
--

CREATE TABLE `send_emails_subscribes` (
  `id` int(11) NOT NULL,
  `subscribe_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `system_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `send_emails_subscribes`
--

INSERT INTO `send_emails_subscribes` (`id`, `subscribe_id`, `category_id`, `message`, `system_datetime`) VALUES
(1, 13, 6, '<div>test msg</div>', '2021-03-15 15:01:53'),
(2, 3, 2, '<div style=\"text-align: center;\"><b></b></div><h2 style=\"text-align: center;\"><b>test msg hello world</b></h2><h2 style=\"text-align: center;\"><b>Test Emai</b></h2><div style=\"text-align: center;\"><b></b></div>', '2021-03-15 15:39:02'),
(3, 4, 2, '<div style=\"text-align: center;\"><b></b></div><h2 style=\"text-align: center;\"><b>test msg hello world</b></h2><h2 style=\"text-align: center;\"><b>Test Emai</b></h2><div style=\"text-align: center;\"><b></b></div>', '2021-03-15 15:39:02'),
(4, 5, 2, '<div style=\"text-align: center;\"><b></b></div><h2 style=\"text-align: center;\"><b>test msg hello world</b></h2><h2 style=\"text-align: center;\"><b>Test Emai</b></h2><div style=\"text-align: center;\"><b></b></div>', '2021-03-15 15:39:02'),
(6, 4, NULL, '<div><b>adsfsdf test msg - hello</b></div>', '2021-03-15 16:14:14'),
(7, 3, 2, '<div style=\"text-align: center;\"><b>sdasdasd sfsdfsf</b></div>', '2021-03-15 16:15:55'),
(8, 5, 2, '<div style=\"text-align: center;\"><b>asdasdasd</b></div>', '2021-03-15 16:16:20'),
(9, 2, 1, '<div><i>aaaaaaaaaaaaaaaa</i></div>', '2021-03-15 16:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `send_emails_users`
--

CREATE TABLE `send_emails_users` (
  `send_id` int(11) NOT NULL,
  `send_msg` text DEFAULT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `send_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `send_emails_users`
--

INSERT INTO `send_emails_users` (`send_id`, `send_msg`, `user_id_fk`, `send_datetime`, `sender_id_fk`) VALUES
(10, '<div>user1 = send</div>', 1, '2021-03-20 00:55:39', 3),
(11, '<div>asdasdads</div>', 1, '2021-03-20 01:07:41', 3),
(12, '<div style=\"text-align: center;\"><b>test msg send by admin</b></div>', 3, '2021-03-20 01:20:12', 1),
(13, '<div style=\"text-align: center;\"><b>test msg send by admin</b></div>', 4, '2021-03-20 01:20:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT 'user',
  `user_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `user_datetime`) VALUES
(1, 'admin', 'admin@gmail.com', 'MTIzMTIz', 'admin', '2021-03-12 15:58:02'),
(3, 'test1', 'test1@gmail.com', 'MTIzMTIz', 'user', '2021-03-12 22:10:18'),
(4, 'test2', 'test2@gmail.com', 'MTIzMTIz', 'user', '2021-03-12 22:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscribes_categories`
--

CREATE TABLE `user_subscribes_categories` (
  `subscribe_id` int(11) NOT NULL,
  `subscribe_email` varchar(255) DEFAULT NULL,
  `category_id_fk` int(11) DEFAULT NULL,
  `subscribe_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subscribes_categories`
--

INSERT INTO `user_subscribes_categories` (`subscribe_id`, `subscribe_email`, `category_id_fk`, `subscribe_datetime`) VALUES
(2, 'test_2@gmail.com', 1, '2021-03-12 16:02:16'),
(3, 'test_3@gmail.com', 2, '2021-03-12 16:02:24'),
(4, 'test_4@gmail.com', 2, '2021-03-12 16:02:30'),
(5, 'test_5@gmail.com', 2, '2021-03-12 16:02:36'),
(6, 'test_6@gmail.com', 4, '2021-03-12 16:02:49'),
(7, 'test_7@gmail.com', 4, '2021-03-12 16:02:55'),
(8, 'test_8@gmail.com', 4, '2021-03-12 16:03:00'),
(9, 'test_1@gmail.com', 4, '2021-03-12 16:03:25'),
(10, 'test_1@gmail.com', 3, '2021-03-12 16:03:32'),
(11, 'test_3@gmail.com', 5, '2021-03-12 16:03:53'),
(12, 'test_4@gmail.com', 5, '2021-03-12 16:03:59'),
(13, 'test_4@gmail.com', 6, '2021-03-12 16:04:09'),
(14, 'test_4@gmail.com', 7, '2021-03-12 16:04:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_emails_subscribes`
--
ALTER TABLE `send_emails_subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_emails_users`
--
ALTER TABLE `send_emails_users`
  ADD PRIMARY KEY (`send_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_subscribes_categories`
--
ALTER TABLE `user_subscribes_categories`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `send_emails_subscribes`
--
ALTER TABLE `send_emails_subscribes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `send_emails_users`
--
ALTER TABLE `send_emails_users`
  MODIFY `send_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_subscribes_categories`
--
ALTER TABLE `user_subscribes_categories`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
