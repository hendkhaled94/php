-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 11:19 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `post_id`, `user_id`, `status`) VALUES
(1, 'this is my first comment', 1, 1, 'approved'),
(2, 'comment 2', 2, 3, 'approved'),
(3, 'comment 3', 3, 4, 'approved'),
(4, 'comment 4', 4, 5, 'approved'),
(5, 'comment 5', 1, 3, 'approved'),
(6, 'comment 3', 2, 3, 'approved'),
(7, 'comment 3', 2, 3, 'approved'),
(8, 'comment new', 5, 4, 'approved'),
(9, 'my comment', 5, 4, 'approved'),
(10, 'sdfsdkl', 5, 1, 'deleted'),
(11, 'my new comment', 4, 3, 'approved'),
(12, 'try to comment', 4, 3, 'approved'),
(13, 'hhhhhhhh', 4, 3, 'approved'),
(14, 'wwwwww', 5, 3, 'approved'),
(15, 'qqqqqq', 2, 3, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_status` varchar(20) NOT NULL,
  `status_reason` varchar(255) DEFAULT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coverimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `category_id`, `user_id`, `post_status`, `status_reason`, `publish_time`, `coverimage`) VALUES
(1, 'myFirstPost', 'this is my first post', 1, 1, 'approved', NULL, '2018-02-17 16:53:16', '1.jpg'),
(2, 'post2', 'this is post num 2', 2, 3, 'approved', NULL, '2018-02-17 23:46:50', '1.jpg'),
(3, 'post3', 'this is post 3', 3, 4, 'approved', NULL, '2018-02-17 23:47:25', '1.jpg'),
(4, 'post4', 'this is post4', 1, 5, 'approved', NULL, '2018-02-17 23:47:55', '1.jpg'),
(5, 'post5', 'this is post 5', 1, 3, 'approved', NULL, '2018-02-18 00:24:21', '1.jpg'),
(6, 'what', 'sdjlakdjasd', 2, 3, 'pinding', 'waiting to approve', '2018-02-19 20:44:31', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `status_reason` text,
  `userimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `password`, `email`, `user_type`, `status`, `status_reason`, `userimage`) VALUES
(1, 'adel', 'mohy', '1234', 'adel@iti.com', 'user', 'active', NULL, 'user-default.png'),
(3, 'adel', 'mohy', '$2y$10$4eWNzY6nnaYguQHB6851AumP2OsMASuOBWTfFW36kS.Rw6NeFcZv6', 'adelmohy@iti.com', 'admin', 'active', 'waiting to activate', 'user-default.png'),
(4, 'ahmed', 'ali', '1234', 'ahmed@iti.com', 'user', 'active', NULL, 'user-default.png'),
(5, 'ali', 'mohamed', '1234', 'ali@iti.com', 'user', 'active', NULL, 'user-default.png'),
(6, 'admin', 'admin', '$2y$10$4eWNzY6nnaYguQHB6851AumP2OsMASuOBWTfFW36kS.Rw6NeFcZv6', 'admin@admin.com', 'admin', 'active', NULL, 'user-default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `cats` (`category_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
