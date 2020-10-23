-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Oct 23, 2020 at 04:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `posted_to` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(73, 'dss', 'ahmed_atef', 'adam_hassan', '2020-10-13 02:58:56 PM', 'no', 29),
(74, 'dsfds', 'ahmed_atef', 'adam_hassan', '2020-10-13 03:00:45 PM', 'no', 29),
(76, 'gg', 'ahmed_atef', 'adam_hassan', '2020-10-14 01:55:27 PM', 'no', 29),
(77, 'tthg', 'ahmed_atef', 'ahmed_atef', '2020-10-14 03:52:52 PM', 'no', 3),
(78, 'e7lo awy', 'ahmed_atef', 'ahmed_atef', '2020-10-17 10:45:18 PM', 'no', 3),
(79, 'eh elgmdan dh 😍', 'ahmed_atef', 'ahmed_atef', '2020-10-17 10:46:19 PM', 'no', 33),
(80, 'gg', 'adam_hassan', 'ahmed_atef', '2020-10-22 04:53:35 PM', 'no', 35),
(81, 'gg', 'adam_hassan', 'ahmed_atef', '2020-10-22 04:55:20 PM', 'no', 35),
(82, 'hh', 'ahmed_atef', 'ahmed_atef', '2020-10-22 04:57:17 PM', 'no', 35),
(83, 'gg', 'adam_hassan', 'ahmed_atef', '2020-10-22 04:58:07 PM', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`, `date_added`) VALUES
(58, 'saad_elshazly', 'ahmed_atef', '2020-10-23 04:08:16 AM');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`, `date_added`) VALUES
(133, 'ahmed_atef', 3, '2020-10-17 10:45:27 PM'),
(134, 'ahmed_atef', 33, '2020-10-17 10:46:02 PM'),
(142, 'adam_hassan', 4, '2020-10-22 04:22:04 PM'),
(145, 'adam_hassan', 35, '2020-10-22 04:53:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(2, 'saad_elshazly', 'ahmed_atef', 'hello ya 5ra', '2020-10-19 10:19:07 PM', 'yes', 'yes', 'no'),
(3, 'ahmed_atef', 'saad_elshazly', 'hello from saad', '2020-10-19 10:25:33 PM', 'yes', 'yes', 'no'),
(4, 'saad_elshazly', 'ahmed_atef', 'ghgfh', '2020-10-19 10:43:08 PM', 'yes', 'yes', 'no'),
(5, 'saad_elshazly', 'ahmed_atef', 'gfhgfh', '2020-10-19 10:43:09 PM', 'yes', 'yes', 'no'),
(6, 'saad_elshazly', 'ahmed_atef', 'fgfhgdf', '2020-10-19 10:43:11 PM', 'yes', 'yes', 'no'),
(7, 'ahmed_atef', 'saad_elshazly', 'xfdsf', '2020-10-19 10:43:53 PM', 'yes', 'yes', 'no'),
(8, 'ahmed_atef', 'saad_elshazly', 'dsfsfsdg', '2020-10-19 10:43:54 PM', 'yes', 'yes', 'no'),
(9, 'ahmed_atef', 'saad_elshazly', 'fdsgfsg', '2020-10-19 10:43:56 PM', 'yes', 'yes', 'no'),
(10, 'ahmed_atef', 'saad_elshazly', 'dfsdf', '2020-10-19 10:43:58 PM', 'yes', 'yes', 'no'),
(16, 'saad_elshazly', 'ahmed_atef', 'hi', '2020-10-20 10:04:30 AM', 'yes', 'yes', 'no'),
(17, 'saad_elshazly', 'ahmed_atef', 'dsdsd', '2020-10-20 10:07:45 AM', 'yes', 'yes', 'no'),
(21, 'saad_elshazly', 'ahmed_atef', 'fgdgf', '2020-10-20 10:17:51 PM', 'yes', 'yes', 'no'),
(22, 'saad_elshazly', 'ahmed_atef', 'gfdg', '2020-10-20 10:17:53 PM', 'yes', 'yes', 'no'),
(24, 'saad_elshazly', 'ahmed_atef', 'dfsdfg', '2020-10-20 10:18:49 PM', 'yes', 'yes', 'no'),
(25, 'saad_elshazly', 'ahmed_atef', 'dfds', '2020-10-20 10:22:57 PM', 'yes', 'yes', 'no'),
(26, 'saad_elshazly', 'ahmed_atef', 'gdgdfdg', '2020-10-20 10:23:37 PM', 'yes', 'yes', 'no'),
(27, 'saad_elshazly', 'ahmed_atef', 'fdsdd', '2020-10-20 10:26:23 PM', 'yes', 'yes', 'no'),
(28, 'saad_elshazly', 'ahmed_atef', 'dsfdsf', '2020-10-20 10:27:17 PM', 'yes', 'yes', 'no'),
(29, 'saad_elshazly', 'ahmed_atef', 'hi', '2020-10-21 12:55:56 AM', 'yes', 'yes', 'no'),
(30, 'ahmed_atef', 'saad_elshazly', 'hi shit', '2020-10-21 12:40:19 PM', 'yes', 'yes', 'no'),
(31, 'ahmed_atef', 'saad_elshazly', 'fcbg', '2020-10-21 12:41:45 PM', 'yes', 'yes', 'no'),
(32, 'ahmed_atef', 'saad_elshazly', 'dfgdf', '2020-10-21 12:41:47 PM', 'yes', 'yes', 'no'),
(33, 'ahmed_atef', 'saad_elshazly', 'gg', '2020-10-21 12:41:50 PM', 'yes', 'yes', 'no'),
(34, 'ahmed_atef', 'adam_hassan', 'dgfg', '2020-10-21 12:43:02 PM', 'yes', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `date`, `opened`, `viewed`) VALUES
(1, 'saad_elshazly', 'ahmed_atef', 'Ahmed Atef liked your post', 'post.php?id=34', '2020-10-22 04:05:52 PM', 'no', 'yes'),
(3, 'adam_hassan', 'ahmed_atef', 'Ahmed Atef liked your post', 'post.php?id=29', '2020-10-22 04:11:12 PM', 'no', 'yes'),
(4, 'adam_hassan', 'ahmed_atef', 'Ahmed Atef posted on your profile', 'post.php?id=37', '2020-10-22 04:11:42 PM', 'no', 'yes'),
(5, 'saad_elshazly', 'adam_hassan', 'Adam Hassan liked your post', 'post.php?id=4', '2020-10-22 04:22:00 PM', 'no', 'no'),
(6, 'saad_elshazly', 'adam_hassan', 'Adam Hassan liked your post', 'post.php?id=4', '2020-10-22 04:22:04 PM', 'no', 'no'),
(7, 'adam_hassan', 'ahmed_atef', 'Ahmed Atef liked your post', 'post.php?id=29', '2020-10-22 04:52:34 PM', 'no', 'yes'),
(8, 'ahmed_atef', 'adam_hassan', 'Adam Hassan liked your post', 'post.php?id=35', '2020-10-22 04:53:30 PM', 'yes', 'yes'),
(9, 'ahmed_atef', 'adam_hassan', 'Adam Hassan commented on your post', 'post.php?id=35', '2020-10-22 04:53:35 PM', 'yes', 'yes'),
(10, '', 'adam_hassan', 'Adam Hassan commented on your profile post', 'post.php?id=35', '2020-10-22 04:53:35 PM', 'no', 'no'),
(11, 'ahmed_atef', 'adam_hassan', 'Adam Hassan commented on your post', 'post.php?id=35', '2020-10-22 04:55:20 PM', 'yes', 'yes'),
(12, 'ahmed_atef', 'adam_hassan', 'Adam Hassan commented on your profile post', 'post.php?id=35', '2020-10-22 04:55:20 PM', 'yes', 'yes'),
(13, 'adam_hassan', 'ahmed_atef', 'Ahmed Atef commented on a post you commented on', 'post.php?id=35', '2020-10-22 04:57:17 PM', 'yes', 'yes'),
(14, 'ahmed_atef', 'adam_hassan', 'Adam Hassan commented on your post', 'post.php?id=1', '2020-10-22 04:58:07 PM', 'yes', 'yes'),
(15, 'ahmed_atef', 'adam_hassan', 'Adam Hassan commented on your profile post', 'post.php?id=1', '2020-10-22 04:58:07 PM', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`, `image`) VALUES
(1, 'this is first post ', 'ahmed_atef', 'none', '2020-10-09 05:23:25 PM', 'no', 'yes', 0, ''),
(3, 'hola', 'ahmed_atef', 'none', '2020-10-11 11:16:30 AM', 'no', 'yes', 1, ''),
(4, 'hello', 'saad_elshazly', 'none', '2020-10-11 11:19:40 AM', 'no', 'no', 1, ''),
(29, 'gg i\'m adam hassan\r\n', 'adam_hassan', 'none', '2020-10-12 08:13:50 PM', 'no', 'no', 0, ''),
(33, 'post gamd gdn 😻', 'ahmed_atef', 'none', '2020-10-17 10:45:56 PM', 'no', 'yes', 1, ''),
(34, 'my best friend 👬', 'saad_elshazly', 'ahmed_atef', '2020-10-18 01:55:27 AM', 'no', 'no', 0, ''),
(35, 'hi', 'ahmed_atef', 'none', '2020-10-18 02:43:38 AM', 'no', 'yes', 1, ''),
(36, 'hi 2', 'ahmed_atef', 'saad_elshazly', '2020-10-22 04:06:07 PM', 'no', 'yes', 0, ''),
(37, 'hi', 'ahmed_atef', 'adam_hassan', '2020-10-22 04:11:42 PM', 'no', 'yes', 0, ''),
(38, 'gh', 'ahmed_atef', 'none', '2020-10-22 05:02:29 PM', 'no', 'yes', 0, ''),
(39, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/SKwq4QG2GQQ\'></iframe><br>', 'ahmed_atef', 'none', '2020-10-23 03:22:09 PM', 'no', 'yes', 0, ''),
(40, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/SKwq4QG2GQQ\'></iframe><br>', 'ahmed_atef', 'none', '2020-10-23 03:22:50 PM', 'no', 'yes', 0, ''),
(41, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/SKwq4QG2GQQ\'></iframe><br>', 'ahmed_atef', 'none', '2020-10-23 03:22:54 PM', 'no', 'yes', 0, ''),
(42, 'i am ahmed i love you', 'ahmed_atef', 'none', '2020-10-23 03:40:12 PM', 'no', 'yes', 0, ''),
(43, 'ss', 'ahmed_atef', 'none', '2020-10-23 04:00:15 PM', 'no', 'yes', 0, ''),
(44, 'dd', 'ahmed_atef', 'none', '2020-10-23 04:01:14 PM', 'no', 'yes', 0, ''),
(45, 'ddd', 'ahmed_atef', 'none', '2020-10-23 04:01:22 PM', 'no', 'yes', 0, ''),
(46, 'ddd', 'ahmed_atef', 'none', '2020-10-23 04:01:51 PM', 'no', 'yes', 0, ''),
(47, 'ddd', 'ahmed_atef', 'none', '2020-10-23 04:02:11 PM', 'no', 'yes', 0, ''),
(48, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:16 PM', 'no', 'yes', 0, ''),
(49, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:29 PM', 'no', 'yes', 0, ''),
(50, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:32 PM', 'no', 'yes', 0, ''),
(51, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:33 PM', 'no', 'yes', 0, ''),
(52, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:35 PM', 'no', 'yes', 0, ''),
(53, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:37 PM', 'no', 'yes', 0, ''),
(54, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:38 PM', 'no', 'yes', 0, ''),
(55, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:40 PM', 'no', 'yes', 0, ''),
(56, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:41 PM', 'no', 'yes', 0, ''),
(57, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:43 PM', 'no', 'yes', 0, ''),
(58, 'df', 'ahmed_atef', 'none', '2020-10-23 04:02:44 PM', 'no', 'yes', 0, ''),
(59, 'cdd', 'ahmed_atef', 'none', '2020-10-23 04:12:32 PM', 'no', 'no', 0, ''),
(60, 'dfd', 'ahmed_atef', 'none', '2020-10-23 04:12:38 PM', 'no', 'no', 0, ''),
(61, 'dcfdsfdsgh', 'ahmed_atef', 'none', '2020-10-23 04:14:15 PM', 'no', 'no', 0, 'assets/images/posts/5f92e537c0b10db.png');

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `title` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trends`
--

INSERT INTO `trends` (`title`, `hits`) VALUES
('Ahmed', 1),
('Love', 1),
('Ss', 1),
('Dd', 1),
('Ddd', 3),
('Df', 11),
('Cdd', 1),
('Dfd', 1),
('Dcfdsfdsgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(255) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(5, 'Ahmed', 'Atef', 'ahmed_atef', 'test@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-06 03:07:33 AM', 'assets/images/profile_pics/ahmed_atef8ef00b84b672726d4d03da2bdf7d0ee7n.jpeg', 29, 3, 'no', ',adam_hassan,'),
(26, 'Saad', 'Elshazly', 'saad_elshazly', 'test2@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-11 11:19:17 AM', 'assets/images/profile_pics/saad_elshazly140d4fcd0714a7e53c67644c698879a8n.jpeg', 2, 1, 'no', ',omar_ali,adam_hassan,'),
(27, 'Amany', 'Atef', 'amany_atef', 'test3@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-12 12:14:52 AM', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(28, 'Salma', 'Atef', 'salma_atef', 'test4@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-12 12:15:19 AM', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(29, 'Omar', 'Ali', 'omar_ali', 'test5@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-12 12:18:18 AM', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ',saad_elshazly,'),
(30, 'Adam', 'Hassan', 'adam_hassan', 'test6@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-12 12:19:02 AM', 'assets/images/profile_pics/defaults/head_emerald.png', 1, 0, 'no', ',saad_elshazly,ahmed_atef,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
