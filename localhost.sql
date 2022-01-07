-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 07, 2022 at 04:06 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingobuddy`
--
CREATE DATABASE IF NOT EXISTS `lingobuddy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lingobuddy`;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `code`) VALUES
(1, 'French', 'fr'),
(2, 'English', 'en'),
(3, 'Arabic', 'ar'),
(4, 'Spanish', 'es'),
(5, 'Portuguese', 'pt'),
(6, 'Italian', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `translator`
--

CREATE TABLE `translator` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `avatar_url` varchar(20) NOT NULL,
  `language` int(11) NOT NULL,
  `language_2` int(11) NOT NULL,
  `language_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `translator`
--

INSERT INTO `translator` (`id`, `first_name`, `last_name`, `avatar_url`, `language`, `language_2`, `language_3`) VALUES
(120, 'John', 'Smith', 'john.jpg', 3, 2, 1),
(121, 'Anna', 'Smith', 'anna.jpg', 3, 5, 4),
(122, 'Mohammed', 'Bakir', 'bakir.jpg', 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `avatar_url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `country`, `phone_number`, `avatar_url`) VALUES
(101, 'Peter', 'Brown', 'efsei@mail.com', 'zebra', 'France', 76775844, 'plumeria.jpg'),
(108, 'Sandra', 'Sanchez', 'sanchez@gmail.com', 'jedi1', 'Colombia', 76956845, NULL),
(109, 'Mike', 'Delfino', 'mike@delfino.com', 'snowbear', 'Italy', 76858238, NULL),
(110, 'Andre', 'Silva', 'silva@hotmail.com', 'adele1', 'Peru', 43857834, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `word_count` int(11) NOT NULL,
  `file_url` varchar(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `original_language` varchar(25) DEFAULT NULL,
  `target_language` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `user`, `word_count`, `file_url`, `created_on`, `price`, `original_language`, `target_language`) VALUES
(3, 101, 1000, 'essay.doc', '2022-01-05 10:05:43', 65, 'Arabic', 'Italian'),
(6, 101, 530, 'test2.pdf', '2022-01-06 23:09:50', 59, 'Arabic', 'English'),
(7, 101, 500, 'hello.txt', '2022-01-06 23:22:35', 90, 'English', 'Portuguese'),
(11, 101, 1000, 'hello.txt', '2022-01-07 14:01:27', 180, 'English', 'Portuguese'),
(12, 101, 500, 'hello.txt', '2022-01-07 14:53:51', 90, 'Arabic', 'English'),
(13, 101, 500, 'hello.txt', '2022-01-07 15:31:56', 90, 'English', 'Arabic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translator`
--
ALTER TABLE `translator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`) USING BTREE,
  ADD KEY `language_2` (`language_2`),
  ADD KEY `language_3` (`language_3`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `translator`
--
ALTER TABLE `translator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `translator`
--
ALTER TABLE `translator`
  ADD CONSTRAINT `translator_ibfk_1` FOREIGN KEY (`language`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `translator_ibfk_2` FOREIGN KEY (`language_2`) REFERENCES `language` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
