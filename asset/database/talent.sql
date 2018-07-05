-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2018 at 05:59 AM
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
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `id_talent` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_ponsel` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_kota` varchar(100) NOT NULL,
  `id_provinsi` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `membership` int(1) NOT NULL,
  `foto_sampul` varchar(200) DEFAULT NULL,
  `foto_profil` varchar(200) DEFAULT NULL,
  `kemampuan` text,
  `tentang_saya` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id_talent`, `nama`, `email`, `nomor_ponsel`, `tanggal_lahir`, `id_kota`, `id_provinsi`, `password`, `membership`, `foto_sampul`, `foto_profil`, `kemampuan`, `tentang_saya`) VALUES
(1, 'Seza Dio Firmansyah, S.Kom', 'sefirman12@gmail.com', '085640357417', '1994-08-31', '33.74.00.0000', '33', '26cac717deaa5188a5dc13c472741c5b', 1, NULL, NULL, NULL, NULL),
(3, 'Febra', 'm.febras@yahoo.com', '0856', '1994-02-05', '33.75.00.0000', '33', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, 'autumn_winter-wallpaper-1366x768.jpg', 'Blibli_21.jpg', 'Web dev, PHP, Laravel, Code Igniter, Android, UI Design, Asana, Git, Inkscape, Ms. Word, Ms. Power Point, Libre Office, Linux', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

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
  MODIFY `id_talent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
