-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 11:47 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

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
-- Table structure for table `converttext`
--

CREATE TABLE `converttext` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `converttext`
--

INSERT INTO `converttext` (`id`, `text`, `userId`) VALUES
(1, 'int a,int b', NULL),
(2, 'scanf(\"%d\", &a)', NULL),
(3, 'scanf(\"%d\", &b)', NULL),
(4, 'if (a > b) {', NULL),
(39, 'printf  ( \' a is big\' )', NULL),
(40, '} else {', NULL),
(47, 'printf  ( \' b is small \' )', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `linkdataarray`
--

CREATE TABLE `linkdataarray` (
  `id` int(11) NOT NULL,
  `linkfrom` varchar(255) NOT NULL,
  `linkto` varchar(255) DEFAULT NULL,
  `fromPort` varchar(255) DEFAULT NULL,
  `toPort` varchar(255) DEFAULT NULL,
  `text` varchar(255) NOT NULL DEFAULT 'YES',
  `points` varchar(255) DEFAULT NULL,
  `userId` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linkdataarray`
--

INSERT INTO `linkdataarray` (`id`, `linkfrom`, `linkto`, `fromPort`, `toPort`, `text`, `points`, `userId`) VALUES
(1, '-1', '-2', 'B', 'T', 'YES', NULL, 1),
(3, '-2', '-3', 'B', 'T', 'YES', NULL, 1),
(6, '-3', '-4', 'B', 'T', 'YES', NULL, 1),
(10, '-4', '-5', 'R', 'T', 'YES', NULL, 1),
(15, '-4', '-6', 'L', 'T', 'NO', NULL, 1);

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
(1, 'Start', 'Start', -1, '-112 -536', NULL),
(3, 'step', 'Step', -2, '-110 -450', NULL),
(6, 'step', 'Step', -3, '-105 -366', NULL),
(10, 'Conditional', '???', -4, '-95 -255', NULL),
(15, 'step', 'Step', -5, '49 -116', NULL),
(21, 'step', 'Step', -6, '-219 -84', NULL),
(23, 'step', 'Declare a , b', -2, '-110 -450', NULL),
(30, 'step', 'Read a , b', -3, '-105 -366', NULL),
(43, 'Conditional', 'a > b', -4, '-106 -257', NULL),
(56, 'step', 'Print a is big', -5, '40 -88', NULL),
(63, 'step', 'Print b is small ', -6, '-219 -84', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `converttext`
--
ALTER TABLE `converttext`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `text` (`text`) USING BTREE;

--
-- Indexes for table `linkdataarray`
--
ALTER TABLE `linkdataarray`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `linkunique` (`linkfrom`,`linkto`) USING BTREE;

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
-- AUTO_INCREMENT for table `converttext`
--
ALTER TABLE `converttext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `linkdataarray`
--
ALTER TABLE `linkdataarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nodedataarray`
--
ALTER TABLE `nodedataarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
