-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 10:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Web development', 'ceva despre web'),
(2, 'Web design', 'Ceva cu design');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `user_id`, `body`, `create_date`) VALUES
(1, 1, 2, 'Praesent sit amet lorem lobortis, suscipit eros eu, accumsan enim. Phasellus eget molestie purus. Mauris varius bibendum sem, eu dapibus neque finibus sed. In tristique odio tortor. ', '2016-07-22 12:27:41'),
(2, 2, 2, 'Praesent sit amet lorem lobortis, suscipit eros eu, accumsan enim. Phasellus eget molestie purus. Mauris varius bibendum sem, eu dapibus neque finibus sed. In tristique odio tortor. Praesent sit amet lorem lobortis, suscipit eros eu, accumsan enim. Phasellus eget molestie purus. Mauris varius bibendum sem, eu dapibus neque finibus sed. In tristique odio tortor. ', '2016-07-22 12:27:41'),
(3, 2, 1, '<p>great post</p>', '2016-07-27 12:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `user_id`, `title`, `body`, `last_activity`, `create_date`) VALUES
(1, 1, 1, 'Favorites server side language', 'What is your favorite server side language?', '0000-00-00 00:00:00', '2016-07-21 11:52:20'),
(2, 2, 2, 'How did you learn HTML and CSS?', 'Ceva ceva ceva ceva Ceva ceva ceva ceva Ceva ceva ceva ceva Ceva ceva ceva ceva', '0000-00-00 00:00:00', '2016-07-21 11:52:20'),
(3, 2, 1, 'This is a test', '2', '2016-07-27 15:34:31', '2016-07-27 12:34:31'),
(4, 1, 1, 'd', '<p>ddddddddddddddddddd</p>', '2016-08-30 10:13:14', '2016-08-30 08:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `username`, `password`, `about`, `last_activity`, `join_date`) VALUES
(1, 'test', 'test@test.com', 'avatar.jpg', 'test', '8287458823facb8ff918dbfabcd22ccb', 'Ceva despre mine.', '0000-00-00 00:00:00', '2016-07-21 11:48:35'),
(2, 'Jane Doe', 'cb@ymail.ro', 'Mesto.jpg', 'JD', '8287458823facb8ff918dbfabcd22ccb', 'I am Jane', '2016-07-27 10:23:22', '2016-07-27 07:23:22'),
(4, 'Ana Maria', 'ceva@jjj.po', 'google.jpg', 'AM', '8287458823facb8ff918dbfabcd22ccb', '', '2016-07-27 14:27:52', '2016-07-27 11:27:52'),
(5, 'Ion Ion', 'cb@ymail.ro', 'Mesto.jpg', 'ion', '8287458823facb8ff918dbfabcd22ccb', '', '2016-07-27 14:29:55', '2016-07-27 11:29:55'),
(6, 'Vaivai', 'cb@ymail.ro', 'google.jpg', 'JD', '8287458823facb8ff918dbfabcd22ccb', '', '2016-07-27 14:35:12', '2016-07-27 11:35:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
