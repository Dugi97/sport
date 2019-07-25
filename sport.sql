-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 11:19 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE IF NOT EXISTS `athlete` (
  `id` int(11) NOT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`, `type`) VALUES
(1, 'Football', 'Group'),
(3, 'Basketball', 'Group'),
(4, 'Volleyball', 'Group'),
(5, 'Vatepoolo', 'Group'),
(6, 'Tennis', 'Single'),
(7, 'Box', 'Single'),
(8, 'MMA', 'Single'),
(9, 'Sprint 200m', 'Single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C03B8321AC78BCF8` (`sport_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `athlete`
--
ALTER TABLE `athlete`
  ADD CONSTRAINT `FK_C03B8321AC78BCF8` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
