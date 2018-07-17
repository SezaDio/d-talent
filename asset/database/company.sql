-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 07:49 AM
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
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id_company` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_telepon` varchar(15) DEFAULT NULL,
  `company_website` varchar(50) DEFAULT NULL,
  `company_address` text NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_province` varchar(100) NOT NULL,
  `company_industries` varchar(5) NOT NULL,
  `company_type` varchar(50) DEFAULT NULL,
  `company_specialties` varchar(1000) DEFAULT NULL,
  `company_year` int(11) NOT NULL,
  `company_description` text NOT NULL,
  `company_cover` varchar(100) DEFAULT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `company_date_join` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_membership` int(1) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_email`, `company_telepon`, `company_website`, `company_address`, `company_city`, `company_province`, `company_industries`, `company_type`, `company_specialties`, `company_year`, `company_description`, `company_cover`, `company_logo`, `company_date_join`, `company_membership`, `password`) VALUES
(1, 'PT Dash Indo Persada 2', 'company.service@d-talent.id', '085640357417', 'www.d-talent.com', 'Jalan Prof. Soedarto SH, Tembalang, Semarang 50211', '', '', 'bu-9', 'ct-1', 'Teknologi Informasi,Marketing', 2018, 'Lorem Ipsum . . .', 'company_cover_1531732127.jpg', 'company_logo_1531557707.jpg', '2018-07-16 09:08:48', 0, '26cac717deaa5188a5dc13c472741c5b'),
(2, 'PT Integer IT Solution', 'integer@gmail.com', NULL, NULL, '', '33.74.00.0000', '33', '', NULL, NULL, 0, '', NULL, NULL, '2018-07-14 15:54:09', 1, '26cac717deaa5188a5dc13c472741c5b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id_company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
