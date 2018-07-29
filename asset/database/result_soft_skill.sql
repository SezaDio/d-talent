-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 07:40 AM
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
-- Table structure for table `result_soft_skill`
--

CREATE TABLE IF NOT EXISTS `result_soft_skill` (
`id_result_soft_skill` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `pengambilan_keputusan` varchar(10) NOT NULL,
  `tanggung_jawab` varchar(10) NOT NULL,
  `integritas` varchar(10) NOT NULL,
  `resiliensi` varchar(10) NOT NULL,
  `keinginan_belajar` varchar(10) NOT NULL,
  `komunikasi` varchar(10) NOT NULL,
  `sikap_positif` varchar(10) NOT NULL,
  `antusiasme` varchar(10) NOT NULL,
  `kerja_tim` varchar(10) NOT NULL,
  `penyelesaian_masalah` varchar(10) NOT NULL,
  `test_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_soft_skill`
--

INSERT INTO `result_soft_skill` (`id_result_soft_skill`, `id_talent`, `pengambilan_keputusan`, `tanggung_jawab`, `integritas`, `resiliensi`, `keinginan_belajar`, `komunikasi`, `sikap_positif`, `antusiasme`, `kerja_tim`, `penyelesaian_masalah`, `test_date`) VALUES
(1, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 17:52:18'),
(2, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 17:58:33'),
(3, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:01:11'),
(4, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:01:25'),
(5, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:05:24'),
(6, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:07:12'),
(7, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:13:21'),
(8, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:13:54'),
(9, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:15:16'),
(10, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:15:48'),
(11, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:16:56'),
(12, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:19:04'),
(13, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:20:40'),
(14, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:21:37'),
(15, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:22:47'),
(16, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:24:44'),
(17, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:25:40'),
(18, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:25:55'),
(19, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:28:54'),
(20, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:29:57'),
(21, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:30:48'),
(22, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:31:13'),
(23, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:31:40'),
(24, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:34:52'),
(25, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:35:32'),
(26, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:38:26'),
(27, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:40:22'),
(28, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:40:38'),
(29, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:43:40'),
(30, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:45:07'),
(31, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:45:28'),
(32, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:49:06'),
(33, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:49:38'),
(34, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:50:01'),
(35, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:51:59'),
(36, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:52:23'),
(37, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:52:27'),
(38, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:52:43'),
(39, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:54:29'),
(40, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:54:59'),
(41, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:55:53'),
(42, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:56:15'),
(43, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:57:05'),
(44, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:57:18'),
(45, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:58:10'),
(46, 3, 'Tinggi', 'Tinggi', 'Menengah', 'Dasar', 'Menengah', 'Dasar', 'Menengah', 'Tinggi', 'Tinggi', 'Tinggi', '2018-07-28 18:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result_soft_skill`
--
ALTER TABLE `result_soft_skill`
 ADD PRIMARY KEY (`id_result_soft_skill`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result_soft_skill`
--
ALTER TABLE `result_soft_skill`
MODIFY `id_result_soft_skill` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
