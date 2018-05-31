-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 08:41 AM
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
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
`id_testimoni` int(4) NOT NULL,
  `nama_testimoni` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama_testimoni`, `job`, `deskripsi`, `tanggal_posting`, `path_gambar`) VALUES
(1, 'Yusuf Dwi Santoso', 'CPNS Kementerian Hukum dan HAM', 'Mengikuti pelatihan dari D-Talent merupakan keputusan tepat bagi saya, sistem pelatihan yang sistematis oleh praktisi yang profesional memberikan bekal kepada saya untuk menghadapi test kerja, sehingga membuat saya mendapatkan pekerjaan yang saya impikan dan menikmati hasilnya sekarang.\r\n\r\nTerima kasih, D-Talent. ', '2018-05-22 14:00:00', ''),
(2, 'Adilia Rismawati', 'Bank BTN', 'D-Talent menjadi salah satu support system dalam kesuksesan saya mendapatkan pekerjaan. Banyak pelatihan yang diberikan yang dapat meng-improve diri agar sesuai kebutuhan dunia kerja. Sekarang saya ', '2018-05-21 23:13:22', 'file_1527005602.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
 ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
MODIFY `id_testimoni` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
