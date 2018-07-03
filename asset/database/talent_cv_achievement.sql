-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2018 at 12:08 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d_talent`
--

-- --------------------------------------------------------

--
-- Table structure for table `talent_cv_achievement`
--

CREATE TABLE `talent_cv_achievement` (
  `id_talent_cv_achievement` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `associated_education` int(11) DEFAULT NULL COMMENT 'talent_cv_education_id',
  `associated_work` int(11) DEFAULT NULL COMMENT 'talent_cv_achievement_id',
  `issuer` varchar(100) DEFAULT NULL,
  `month` date DEFAULT NULL,
  `year` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `talent_cv_achievement`
--
ALTER TABLE `talent_cv_achievement`
  ADD PRIMARY KEY (`id_talent_cv_achievement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talent_cv_achievement`
--
ALTER TABLE `talent_cv_achievement`
  MODIFY `id_talent_cv_achievement` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
