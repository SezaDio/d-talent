-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 08:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `d_talent`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_notification`
--

CREATE TABLE IF NOT EXISTS `job_notification` (
`id_notification` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `notification_status` int(1) NOT NULL COMMENT '1 accept, 2 decline, 3 expired, 0 menunggu',
  `notification_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_notification`
--

INSERT INTO `job_notification` (`id_notification`, `id_company`, `id_talent`, `notification_status`, `notification_date`) VALUES
(1, 1, 3, 0, '2018-07-17'),
(2, 2, 1, 1, '0000-00-00'),
(3, 2, 3, 1, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_notification`
--
ALTER TABLE `job_notification`
 ADD PRIMARY KEY (`id_notification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_notification`
--
ALTER TABLE `job_notification`
MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
