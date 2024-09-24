-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 08:38 PM
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
-- Table structure for table `chaintercom_appointment`
--

CREATE TABLE `chaintercom_appointment` (
  `chaintercomappointid` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `meeting_url` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'confirm' COMMENT 'confirm, completed, rejected',
  `account_id` int(11) DEFAULT NULL,
  `chainavailability` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chaintercom_appointment`
--

INSERT INTO `chaintercom_appointment` (`chaintercomappointid`, `product`, `meeting_url`, `date`, `start_time`, `end_time`, `status`, `account_id`, `chainavailability`) VALUES
(12, 'PRODUCT 1, PRODUCT 2', 'https://meet.jit.si/meeting_1', '2024-09-30', '07:00:00', '09:00:00', 'confirm', 69, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chaintercom_appointment`
--
ALTER TABLE `chaintercom_appointment`
  ADD PRIMARY KEY (`chaintercomappointid`),
  ADD KEY `fk_account` (`account_id`),
  ADD KEY `fk_chainavailability` (`chainavailability`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chaintercom_appointment`
--
ALTER TABLE `chaintercom_appointment`
  MODIFY `chaintercomappointid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chaintercom_appointment`
--
ALTER TABLE `chaintercom_appointment`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `fk_chainavailability` FOREIGN KEY (`chainavailability`) REFERENCES `chaintercom_availability` (`chainavailability`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
