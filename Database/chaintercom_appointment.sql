-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 05:50 PM
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
  `name` varchar(50) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `meeting_url` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` enum('confirm','payment','approval','delivery','completed','rejected') NOT NULL DEFAULT 'confirm',
  `account_id` int(11) DEFAULT NULL,
  `chainavailability` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chaintercom_appointment`
--


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
  MODIFY `chaintercomappointid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
