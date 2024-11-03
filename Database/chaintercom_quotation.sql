-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 05:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `chaintercom_quotation`
--

CREATE TABLE `chaintercom_quotation` (
  `quotation_id` int(11) NOT NULL,
  `chaintercomappointid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chaintercom_quotation`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `chaintercom_quotation`
--
ALTER TABLE `chaintercom_quotation`
  ADD PRIMARY KEY (`quotation_id`),
  ADD KEY `chaintercomappointid` (`chaintercomappointid`),
  ADD KEY `account_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chaintercom_quotation`
--
ALTER TABLE `chaintercom_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chaintercom_quotation`
--
ALTER TABLE `chaintercom_quotation`
  ADD CONSTRAINT `chaintercom_quotation_ibfk_1` FOREIGN KEY (`chaintercomappointid`) REFERENCES `chaintercom_appointment` (`chaintercomappointid`),
  ADD CONSTRAINT `chaintercom_quotation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
