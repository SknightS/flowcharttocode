-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 10:32 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowchart`
--

-- --------------------------------------------------------

--
-- Table structure for table `linkdataarray`
--

CREATE TABLE `linkdataarray` (
  `id` int(11) NOT NULL,
  `linkfrom` varchar(255) DEFAULT NULL,
  `linkto` varchar(255) DEFAULT NULL,
  `fromPort` varchar(255) DEFAULT NULL,
  `toPort` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `points` varchar(255) DEFAULT NULL,
  `userId` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nodedataarray`
--

CREATE TABLE `nodedataarray` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `keyto` int(11) DEFAULT NULL,
  `loc` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodedataarray`
--

INSERT INTO `nodedataarray` (`id`, `category`, `text`, `keyto`, `loc`, `userId`) VALUES
(1, 'Start', 'Start', -1, '-357 -326', NULL),
(3, 'step', 'Step', -2, '-378 -173', NULL),
(8, 'Conditional', '???', -3, '-364 -68', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `linkdataarray`
--
ALTER TABLE `linkdataarray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nodedataarray`
--
ALTER TABLE `nodedataarray`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checkUnique` (`category`,`text`,`keyto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `linkdataarray`
--
ALTER TABLE `linkdataarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nodedataarray`
--
ALTER TABLE `nodedataarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
