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
-- Table structure for table `talent_cv_work`
--

CREATE TABLE `talent_cv_work` (
  `id_talent_cv_work` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `position` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `id_location` varchar(100) DEFAULT NULL COMMENT 'lokasi_ID',
  `work_start` date DEFAULT NULL,
  `work_end` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent_cv_work`
--

INSERT INTO `talent_cv_work` (`id_talent_cv_work`, `id_talent`, `position`, `company`, `id_location`, `work_start`, `work_end`, `description`) VALUES
(1, 3, 'Developer', 'DCS1', '440', '2018-03-01', '2018-12-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `talent_cv_work`
--
ALTER TABLE `talent_cv_work`
  ADD PRIMARY KEY (`id_talent_cv_work`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talent_cv_work`
--
ALTER TABLE `talent_cv_work`
  MODIFY `id_talent_cv_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
