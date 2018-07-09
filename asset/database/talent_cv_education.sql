-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 07:22 AM
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
-- Table structure for table `talent_cv_education`
--

CREATE TABLE `talent_cv_education` (
  `id_talent_cv_education` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `school` varchar(200) NOT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `field_of_study` varchar(200) DEFAULT NULL COMMENT 'city of company',
  `grade` varchar(20) DEFAULT NULL,
  `activity` text,
  `from_year` date DEFAULT NULL,
  `to_year` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent_cv_education`
--

INSERT INTO `talent_cv_education` (`id_talent_cv_education`, `id_talent`, `school`, `degree`, `field_of_study`, `grade`, `activity`, `from_year`, `to_year`, `description`) VALUES
(1, 3, 'S1 Undip', 'S1', 'T. Informatika', '', '', '2013-01-01', '2018-01-01', 'Lorem Ipsum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `talent_cv_education`
--
ALTER TABLE `talent_cv_education`
  ADD PRIMARY KEY (`id_talent_cv_education`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talent_cv_education`
--
ALTER TABLE `talent_cv_education`
  MODIFY `id_talent_cv_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
