-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220811.d237752642
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2022 at 09:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `skandi`
--

CREATE TABLE `skandi` (
  `id` int(11) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `productType` varchar(100) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Weight` varchar(255) NOT NULL,
  `Height` varchar(255) NOT NULL,
  `Length` varchar(255) NOT NULL,
  `Width` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skandi`
--

INSERT INTO `skandi` (`id`, `SKU`, `Name`, `Price`, `productType`, `Size`, `Weight`, `Height`, `Length`, `Width`) VALUES
(156, 'sg', 'a', '10', 'book', '', '2', '', '', ''),
(157, 'sag', 'af', '10', 'dvd', '500', '', '', '', ''),
(160, 'dn', 'afbxf', '10', 'dvd', '500', '', '', '', ''),
(162, 'sgbr', 'sg', '10', '', '', '', '', '', ''),
(202, 'sge', 'gse', '10', 'dvd', '500', '', '', '', ''),
(236, '', '', '', '', '', '', '', '', ''),
(261, 'djtdjdtgj', 'jdgt', '10', 'dvd', '500', '', '', '', ''),
(262, 'esggsgsdegsg', 'absfg', '', 'dvd', '500', '', '', '', ''),
(263, 'herhdrrhh', 'gddr', '10', 'dvd', '500', '', '', '', ''),
(264, 'sgesggdhdr', 'hshrh', '10', 'dvd', '500', '', '', '', ''),
(265, 'eahrtjhdejndet', 'mdgm', '10', 'book', '', '4', '', '', ''),
(266, 'shbsrhshsh', 'hsrh', '10', 'furniture', '', '', '45', '25', '25'),
(267, 'dhrhderjdr', 'jdj', '10', 'book', '', '1', '', '', ''),
(268, 'ehetjerjej', 'jedtj', '100', 'book', '', '5', '', '', ''),
(269, 'sjhsrfnjsfrjs', 'mdmdm', '10', 'dvd', '500', '', '', '', ''),
(270, 'dhfdjnfdjdj', 'hdxfndfn', '10', 'book', '', '2', '', '', ''),
(272, 'dgndcfmncdm%20c', 'm%20fg%20mfc%20m', '10', 'book', '', '3', '', '', ''),
(275, 'jfykfmygsrdh', 'etgs', '10', 'furniture', '', '', '35', '35', '35'),
(276, 'rjfrtjfjyj', 'hdthdr', '10', 'dvd', '500', '', '', '', ''),
(278, 'asgwsbhdrh', 'shrhshs', '10', 'dvd', '500', '', '', '', ''),
(279, 'htdnhdnjdn', 'Bo', '10', 'dvd', '500', '', '', '', ''),
(287, 'nbfrhsrnhfn', 'fbxdbrh', '10', '', '', '', '', '', ''),
(288, 'hdftdh', 'dnhf', '10', 'dvd', '', '', '', '', ''),
(290, 'hdftdhhd', 'dnhfhdt', '10', 'dvd', '', '', '', '', ''),
(291, 'dehdr', 'dhh', '10', 'book', '', '', '', '', ''),
(294, 'sege', 'gsd', '10', 'dvd', '', '', '', '', ''),
(295, 'sgs', 'gs', '10', 'dvd', '500', '', '', '', ''),
(296, 'dhdrh', 'dhdt', '10', 'book', '', '2', '', '', ''),
(297, 'rhsh', 'dhr', '10', 'dvd', '500', '', '', '', ''),
(298, 'rgrg', 'sefe', '434', 'dvd', '', '', '', '', ''),
(300, 'rgrgf', 'sefef', '434', 'furniture', '', '', '25', '25', '25'),
(313, 'afsedg', 'sbfrh', '10', 'dvd', '', '', '', '', ''),
(314, 'hddrh', 'dfnhd', '10', 'dvd', '', '', '', '', ''),
(333, 'sdhrdh', 'drhdrh', '10', 'dvd', '', '', '', '', ''),
(334, 'xfnhxfn', 'xfnfn', '10', 'dvd', '', '', '', '', ''),
(336, 'dndjdthd', 'adndr', '10', 'dvd', '', '', '', '', ''),
(337, 'sbsdrh', 'dhrd', '10', 'dvd', '', '', '', '', ''),
(338, 'edhdernj', 'mfgmy', '10', 'dvd', '', '', '', '', ''),
(339, 'dnfgnfnt', 'dbfbndfnb', '10', 'dvd', '500', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skandi`
--
ALTER TABLE `skandi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skandi`
--
ALTER TABLE `skandi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
