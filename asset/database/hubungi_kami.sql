-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 10:30 AM
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
-- Table structure for table `hubungi_kami`
--

CREATE TABLE IF NOT EXISTS `hubungi_kami` (
`id_pesan` int(11) NOT NULL,
  `nama_lengkap` varchar(1000) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id_pesan`, `nama_lengkap`, `email`, `subject`, `telepon`, `pesan`, `tgl_pesan`, `status`) VALUES
(1, 'Devi', 'deviprnmsr@gmail.com', 'Training software Statistik', '087774404039', 'Selamat pagi ka saya Devi dari Statistics Center HIMASTA Universitas Diponegoro mau tanya ka, kalau mau share pamflet tentang pelatihan software bsa ka? procedurenya gmna ya ka? Makasih ka ', '2018-05-23 07:56:25', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
 ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
