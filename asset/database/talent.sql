-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 06:06 PM
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
-- Table structure for table `talent`
--

CREATE TABLE IF NOT EXISTS `talent` (
`id_talent` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_ponsel` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_kota` varchar(100) NOT NULL,
  `id_provinsi` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `membership` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id_talent`, `nama`, `email`, `nomor_ponsel`, `tanggal_lahir`, `id_kota`, `id_provinsi`, `password`, `membership`) VALUES
(1, 'Seza Dio Firmansyah, S.Kom', 'sefirman12@gmail.com', '085640357417', '1994-08-31', '33.74.00.0000', '33', '26cac717deaa5188a5dc13c472741c5b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
 ADD PRIMARY KEY (`id_talent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
MODIFY `id_talent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
