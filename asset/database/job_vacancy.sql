-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 04:32 PM
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
  `job_city_location_id` varchar(14) NOT NULL COMMENT 'lokasi_kode',
  `job_date_start` date NOT NULL,
  `job_date_end` date NOT NULL,
  `job_description` text NOT NULL,
  `job_required_skill` text NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`id_job`, `id_company`, `job_title`, `job_type`, `job_role`, `job_category`, `job_province_location_id`, `job_city_location_id`, `job_date_start`, `job_date_end`, `job_description`, `job_required_skill`, `publish_date`) VALUES
(2, 1, 'Tes', 'jt-1', 'AA', 'jc-1', 12, '32.12.00.0000', '2018-07-01', '2018-07-23', 'BBB', 'Desain,HTML,CSS,JavaScript', '2018-07-12 07:54:29'),
(3, 1, 'Job 2', 'jt-1', 'Staf', 'jc-4', 12, '32.09.00.0000', '2018-07-07', '2018-07-19', 'Lorem Desc', 'Skill 1,Skill 2,Skill 3', '2018-07-13 14:05:29'),
(4, 1, 'Job 3', 'jt-1', 'Staf', 'jc-4', 12, '32.09.00.0000', '2018-07-07', '2018-07-19', 'Lorem Desc 3', 'Skill 1,Skill 2,Skill 3', '2018-07-13 14:05:29'),
(5, 1, 'Job 4', 'jt-1', 'Staf', 'jc-4', 12, '32.09.00.0000', '2018-07-07', '2018-07-19', 'Lorem Desc 4', 'Skill 1,Skill 2,Skill 3', '2018-07-13 14:05:29'),
(6, 1, 'Job 5', 'jt-1', 'Staf', 'jc-4', 12, '32.09.00.0000', '2018-07-07', '2018-07-19', 'Lorem Desc 5', 'Skill 1,Skill 2,Skill 3', '2018-07-13 14:05:29');

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
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
