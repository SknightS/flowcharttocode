-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 02:03 PM
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
(2, '$num1,$num2\n', NULL);

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

--
-- Dumping data for table `linkdataarray`
--

INSERT INTO `linkdataarray` (`id`, `linkfrom`, `linkto`, `fromPort`, `toPort`, `text`, `points`, `userId`) VALUES
(1, '-1', '-2', 'B', 'T', NULL, NULL, 1),
(4, '-2', '-3', 'B', 'T', NULL, NULL, 1),
(7, '-3', '-4', 'B', 'T', NULL, NULL, 1),
(11, '-4', '-6', 'R', 'L', NULL, NULL, 1),
(16, '-4', '-5', 'L', 'R', NULL, NULL, 1),
(36, NULL, '-5', 'L', 'R', 'NO', NULL, 1);

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
(1, 'Start', 'Start', -1, '-353 -329', NULL),
(3, 'step', 'Step', -2, '-356 -250', NULL),
(5, 'step', 'Declare variable num1 , num2\n', -2, '-356 -250', NULL),
(8, 'step', 'Step', -3, '-359 -140', NULL),
(11, 'step', 'Read num1 and num2', -3, '-359 -140', NULL),
(15, 'Conditional', '???', -4, '-362 -36', NULL),
(19, 'Conditional', 'num1 > num2', -4, '-362 -36', NULL),
(24, 'step', 'Step', -5, '-562 43', NULL),
(30, 'step', 'Step', -6, '-93 26', NULL),
(42, 'step', 'Display num1 is big', -6, '-93 26', NULL),
(47, 'step', 'Display num2 is big ', -5, '-566 30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `converttext`
--
ALTER TABLE `converttext`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `linkdataarray`
--
ALTER TABLE `linkdataarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nodedataarray`
--
ALTER TABLE `nodedataarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
