-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 02:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `select2_plugin`
--
CREATE DATABASE IF NOT EXISTS `select2_plugin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `select2_plugin`;

-- --------------------------------------------------------

--
-- Table structure for table `hobby_list`
--

CREATE TABLE `hobby_list` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hobby_list`
--

INSERT INTO `hobby_list` (`id`, `name`) VALUES
(1, 'Hockey'),
(2, 'Cricket'),
(3, 'Football'),
(4, 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `user_hobbylist`
--

CREATE TABLE `user_hobbylist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hobby_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_hobbylist`
--

INSERT INTO `user_hobbylist` (`id`, `user_id`, `hobby_list_id`) VALUES
(20, 1, 1),
(23, 2, 4),
(24, 2, 1),
(25, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobby_list`
--
ALTER TABLE `hobby_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_hobbylist`
--
ALTER TABLE `user_hobbylist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hobby_list`
--
ALTER TABLE `hobby_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_hobbylist`
--
ALTER TABLE `user_hobbylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
