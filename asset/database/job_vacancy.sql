-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2018 at 12:15 PM
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
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `id_job` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_type` varchar(50) NOT NULL COMMENT 'get from array in controller',
  `job_role` varchar(200) NOT NULL,
  `job_category` varchar(50) NOT NULL COMMENT 'get from array in controller',
  `job_province_location_id` int(11) NOT NULL COMMENT 'lokasi_ID',
  `job_city_location_id` int(11) NOT NULL COMMENT 'lokasi_ID',
  `job_date_start` date NOT NULL,
  `job_date_end` date NOT NULL,
  `job_description` text NOT NULL,
  `job_required_skill` text NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`id_job`, `id_company`, `job_title`, `job_type`, `job_role`, `job_category`, `job_province_location_id`, `job_city_location_id`, `job_date_start`, `job_date_end`, `job_description`, `job_required_skill`, `publish_date`) VALUES
(1, 1, 'AA', 'jt-1', 'Bb', 'jc-12', 0, 0, '2018-07-01', '2018-07-28', 'CCCC', 'DDD,eee,FFF', '2018-07-11 09:40:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`id_job`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
