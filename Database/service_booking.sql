-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 06:52 PM
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
-- Table structure for table `service_booking`
--

CREATE TABLE `service_booking` (
  `appointment_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `availability_id` int(11) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `product` varchar(20) NOT NULL,
  `power` int(20) NOT NULL,
  `running_hours` int(20) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `status` enum('Pending','Approved','Canceled','Waiting','Checking','Completed') DEFAULT 'Pending',
  `worker_update` varchar(50) NOT NULL DEFAULT 'No update' COMMENT 'no update, on the way, worker is on the site',
  `date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `availability_id` (`availability_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD CONSTRAINT `service_booking_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `service_booking_ibfk_2` FOREIGN KEY (`availability_id`) REFERENCES `service_availability` (`availability_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
