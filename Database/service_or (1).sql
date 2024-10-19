-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 05:30 PM
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
-- Table structure for table `service_or`
--

CREATE TABLE `service_or` (
  `receiptid` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_or`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_or`
--
ALTER TABLE `service_or`
  ADD PRIMARY KEY (`receiptid`),
  ADD KEY `account_id` (`client_id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `fk_worker_id` (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_or`
--
ALTER TABLE `service_or`
  MODIFY `receiptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_or`
--
ALTER TABLE `service_or`
  ADD CONSTRAINT `fk_worker_id` FOREIGN KEY (`worker_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `service_or_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `service_or_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`),
  ADD CONSTRAINT `service_or_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `service_payment` (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
