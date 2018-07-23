-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 01:28 AM
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
-- Table structure for table `test_passion`
--

CREATE TABLE `test_passion` (
  `id_test_passion` int(11) NOT NULL,
  `category` varchar(12) NOT NULL COMMENT 'realistis, investigasi, artistik, enterpreuner, konvensional',
  `statement` varchar(75) NOT NULL COMMENT 'the answer: corresponding or not'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_passion`
--

INSERT INTO `test_passion` (`id_test_passion`, `category`, `statement`) VALUES
(1, 'Realistis', 'Saya senang bekerja dengan benda yang memiliki motor'),
(2, 'Realistis', 'Saya senang mendaur ulang barang-barang'),
(3, 'Realistis', 'Saya senang merawat hewan-hewan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_passion`
--
ALTER TABLE `test_passion`
  ADD PRIMARY KEY (`id_test_passion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_passion`
--
ALTER TABLE `test_passion`
  MODIFY `id_test_passion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
