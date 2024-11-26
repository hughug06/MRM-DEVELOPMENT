-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 06:53 PM
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
-- Table structure for table `service_availability`
--

CREATE TABLE `service_availability` (
  `availability_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_availability`
--

INSERT INTO `service_availability` (`availability_id`, `account_id`, `date`, `start_time`, `end_time`) VALUES
(40, 94, '2024-11-30', '07:00:00', '09:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_availability`
--
ALTER TABLE `service_availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD UNIQUE KEY `date` (`date`,`start_time`,`end_time`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_availability`
--
ALTER TABLE `service_availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_availability`
--
ALTER TABLE `service_availability`
  ADD CONSTRAINT `service_availability_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
