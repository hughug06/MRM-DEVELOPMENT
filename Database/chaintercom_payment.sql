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
-- Table structure for table `chaintercom_payment`
--

CREATE TABLE `chaintercom_payment` (
  `payment_id` int(11) NOT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `reference_number` int(30) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `payment_method` enum('cheque','bank_to_bank') NOT NULL,
  `date` date NOT NULL,
  `payment_status` enum('confirmed','declined','approved') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chaintercom_payment`
--


-- Indexes for dumped tables
--

--
-- Indexes for table `chaintercom_payment`
--
ALTER TABLE `chaintercom_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_quotation_id` (`quotation_id`),
  ADD KEY `fk_appointment_id` (`appointment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chaintercom_payment`
--
ALTER TABLE `chaintercom_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chaintercom_payment`
--
ALTER TABLE `chaintercom_payment`
  ADD CONSTRAINT `fk_appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `chaintercom_appointment` (`chaintercomappointid`),
  ADD CONSTRAINT `fk_quotation_id` FOREIGN KEY (`quotation_id`) REFERENCES `chaintercom_quotation` (`quotation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
