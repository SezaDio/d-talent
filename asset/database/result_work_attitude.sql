-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 07:41 AM
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
-- Table structure for table `result_work_attitude`
--

CREATE TABLE IF NOT EXISTS `result_work_attitude` (
`id_result_work_attitude` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `result` varchar(30) NOT NULL,
  `test_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_work_attitude`
--

INSERT INTO `result_work_attitude` (`id_result_work_attitude`, `id_talent`, `result`, `test_date`) VALUES
(4, 3, 'Rendah', '2018-07-28 17:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result_work_attitude`
--
ALTER TABLE `result_work_attitude`
 ADD PRIMARY KEY (`id_result_work_attitude`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result_work_attitude`
--
ALTER TABLE `result_work_attitude`
MODIFY `id_result_work_attitude` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
