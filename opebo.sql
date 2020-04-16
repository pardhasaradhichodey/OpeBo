-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opebo`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustumerId` varchar(50) NOT NULL,
  `workerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustumerId`, `workerId`) VALUES
(5, 'aravindchalamalasetti2000@gmail.com', 1),
(6, 'aravindchalamalasetti2000@gmail.com', 1),
(7, 'aravindchalamalasetti2000@gmail.com', 1),
(8, 'aravindchalamalasetti2000@gmail.com', 1),
(9, 'aravindchalamalasetti2000@gmail.com', 1),
(10, 'aravindchalamalasetti2000@gmail.com', 1),
(11, 'aravindchalamalasetti2000@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `Name`, `Description`) VALUES
(1, 'Plumbers', ''),
(2, 'Drivers', ''),
(4, 'Electricians', ''),
(5, 'Beauticians', ''),
(6, 'Cook', ''),
(7, 'Security Guards', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `Name`, `phone`, `password`) VALUES
('aravindchalamalasetti2000@gmail.com', 'Ch Ranga Aravind', '6281820896', '1234567890'),
('user2459@gmail.com', 'User2459', '9182433432', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `serviceid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `phone`, `latitude`, `longitude`, `serviceid`) VALUES
(0, 'Chode Naveen', '8634534463', 17.9307, 83.4246, 1),
(1, 'Chodey Pardha Saradhi', '8374651144', 17.9283, 83.422, 6),
(2, 'D Sri Ram', '8957548951', 17.9294, 83.4234, 2),
(3, 'G Karthik', '9110234567', 17.9275, 83.4221, 4),
(4, 'K Rama Chandra', '9121026599', 17.9276, 83.4211, 5),
(6, 'Kiran Kumar', '9213324312', 17.929, 83.4219, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustumerId` (`CustumerId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceid` (`serviceid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustumerId`) REFERENCES `users` (`Email`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`workerId`) REFERENCES `workers` (`id`);

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`serviceid`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
