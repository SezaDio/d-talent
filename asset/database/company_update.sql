-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 03:31 PM
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
-- Table structure for table `company_update`
--

CREATE TABLE `company_update` (
  `id_company_update` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: draft, 1: publish',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_update`
--

INSERT INTO `company_update` (`id_company_update`, `id_company`, `title`, `content`, `image`, `status`, `created_at`) VALUES
(2, 1, 'Title 1 Edit', '111 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'beautiful_red_poppy_green_wheat_field-wallpaper-1366x768.jpg', 0, '2018-07-13 05:25:07'),
(3, 1, 'Title 2', 'Konten 2', 'autumn-1572822_640.png', 1, '2018-07-13 06:38:32'),
(4, 1, 'Title 3', 'Konten 3', '3D-Diamond-Design-Wallpaper.jpg', 1, '2018-07-13 13:15:43'),
(5, 1, 'Title 4 Edit', 'Konten 4', 'background-1462755_1920.jpg', 1, '2018-07-13 13:16:05'),
(6, 1, 'Title 5', 'Konten 5', 'americana-1512910.png', 1, '2018-07-13 13:24:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_update`
--
ALTER TABLE `company_update`
  ADD PRIMARY KEY (`id_company_update`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_update`
--
ALTER TABLE `company_update`
  MODIFY `id_company_update` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
