-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2016 at 07:10 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobiledevicelendingproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `category`, `name`, `email`, `phone`, `address`, `details`) VALUES
(6, 'External Other Customer', 'Sample Customer 2', 'sample2@notreal.com', '222-222-2222', '22 Sample Street, Sample Town, Sample City', ' Mixes up iBeacons and iPads'),
(8, 'External UCL Customer', 'Sample Customer 3', 'sample3@notreal.com', '333-333-3333', '33 Sample Road, Sample Town, Sample City', ' '),
(9, 'Internal Customer', 'Sample Customer 1', 'sample1@notreal.com', '111-111-1111', 'Not Applicable', ' Sample Text');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passhash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `passhash`, `name`, `last_login`) VALUES
(1, 'user@ucl.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 'User', '2016-04-21 15:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `client` varchar(255) DEFAULT NULL,
  `beginDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` varchar(1023) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `IMEI` varchar(255) NOT NULL,
  `UDID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `category`, `manufacturer`, `name`, `OS`, `client`, `beginDate`, `endDate`, `description`, `serial`, `IMEI`, `UDID`) VALUES
(256, 'Phone', 'Sample Manufacturer 1', 'Sample Phone 1', 'Sample OS', 'Sample Customer 2', '2016-04-19', '2016-04-21', ' Sample Text', '     00000000  ', '  00-000000-000000-0', ''),
(512, 'Tablet', ' Sample Manufacturer 2', ' Sample Tablet 1 ', ' Sample OS', NULL, '0000-00-00', '0000-00-00', ' Longer Sample Text - Lorem Ipsum Dolor...', '    ', '  ', ' '),
(1024, 'Development Kit', ' Sample Manufacturer 1', ' Sample Devkit 1', 'Not Applicable', NULL, '0000-00-00', '0000-00-00', ' Development kit for Sample OS', '    ', '  ', ' '),
(2048, 'Phone', 'Sample Manufacturer 3', 'Sample Phone 2 ', 'Sample OS', NULL, '0000-00-00', '0000-00-00', ' Sample Text Modification for sort test 1', '     ', '  ', ''),
(4096, 'Others', ' Sample Manufacturer 1 ', ' Sample Item 2', ' Sample OS', 'Sample Customer 3', '2016-04-21', '2016-04-30', 'Sample Text', '  ', ' ', ' '),
(8192, 'Others', ' Sample Manufacturer 4 ', ' Sample Item 1', ' Sample OS', NULL, '0000-00-00', '0000-00-00', 'Sample Text', '  ', ' ', ' '),
(16384, 'Tablet', 'Sample Manufacturer 3', 'Sample Tablet 2', 'Sample OS', NULL, '0000-00-00', '0000-00-00', ' Sample Text', '   ', ' ', ' '),
(32768, 'iBeacon', ' Sample Manufacturer 5', ' Sample iBeacon 1 ', ' Not Applicable', NULL, '0000-00-00', '0000-00-00', ' Sample Text Modification for sort test 2', '    ', '  ', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000000;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
