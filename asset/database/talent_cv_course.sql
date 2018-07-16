-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2018 at 06:37 AM
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
-- Table structure for table `talent_cv_course`
--

CREATE TABLE `talent_cv_course` (
  `id_talent_cv_course` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `associated_education` int(11) DEFAULT NULL COMMENT 'talent_cv_education_id',
  `associated_work` int(11) DEFAULT NULL COMMENT 'talent_cv_achievement_id',
  `organizer` varchar(150) DEFAULT NULL,
  `year` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent_cv_course`
--

INSERT INTO `talent_cv_course` (`id_talent_cv_course`, `id_talent`, `title`, `associated_education`, `associated_work`, `organizer`, `year`) VALUES
(1, 3, 'Pelatihan 1', NULL, NULL, 'Qarck', 2014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `talent_cv_course`
--
ALTER TABLE `talent_cv_course`
  ADD PRIMARY KEY (`id_talent_cv_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talent_cv_course`
--
ALTER TABLE `talent_cv_course`
  MODIFY `id_talent_cv_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
