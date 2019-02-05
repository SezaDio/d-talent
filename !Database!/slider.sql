-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 11:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(3) NOT NULL,
  `judul_slider` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path_gambar` varchar(50) NOT NULL,
  `extradata` text,
  `status` int(1) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `deskripsi`, `tanggal_posting`, `path_gambar`, `extradata`, `status`, `type`) VALUES
(3, 'Nature', 'Nature', '2018-09-25 08:28:28', 'file_1531116522.jpg', '<div class="carousel-caption d-none d-md-block">\n              <a href="talent/login/">\n                <h3 class="btn btn-slider">Join as Talent</h3>\n              </a>\n              <a href="AccountCompany/login/">\n                <h3 class="btn btn-slider">Join as Company</h3>\n              </a>					  \n					</div>', 1, 1),
(4, 'Nature 2', 'Nature 2', '2018-09-25 08:28:52', 'file_1531123992.jpg', NULL, 1, 2),
(5, 'Nature 3', 'Nature 3', '2018-08-07 07:46:16', 'small_file_1533627976.jpg', NULL, 1, 2),
(6, 'slider coba', 'hai', '2018-09-25 08:29:00', 'file_1537863884.jpg', '<div class="carousel-caption d-none d-md-block">\n              <a href="talent/login/">\n                <h3 class="btn btn-slider">Join as Talent</h3>\n              </a>\n              <a href="AccountCompany/login/">\n                <h3 class="btn btn-slider">Join as Company</h3>\n              </a>					  \n					</div>', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
