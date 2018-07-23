-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 03:49 PM
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
-- Table structure for table `test_softskill`
--

CREATE TABLE `test_softskill` (
  `id_test_softskill` int(11) NOT NULL,
  `category` tinyint(1) NOT NULL COMMENT '1: intrapersonal, 2: interpersonal',
  `sub_category` varchar(7) NOT NULL COMMENT 'the subcategory list is in TestSoftskill controller',
  `statement` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_softskill`
--

INSERT INTO `test_softskill` (`id_test_softskill`, `category`, `sub_category`, `statement`) VALUES
(1, 1, 'subc-1', 'Saya mengamati situasi terlebih dahulu sebelum mengambil keputusan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_softskill`
--
ALTER TABLE `test_softskill`
  ADD PRIMARY KEY (`id_test_softskill`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_softskill`
--
ALTER TABLE `test_softskill`
  MODIFY `id_test_softskill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
