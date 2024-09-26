-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 11:28 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
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
  `status` enum('Pending','Confirmed','Canceled') DEFAULT 'Pending',
  `worker_update` varchar(50) NOT NULL DEFAULT 'No update' COMMENT 'no update, on the way, worker is on the site',
  `date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `account_id`, `availability_id`, `name`, `location`, `brand`, `product`, `power`, `running_hours`, `service_type`, `status`, `worker_update`, `date`, `start_time`, `end_time`) VALUES
(48, 69, 37, 'JAN ARIES IMPUERTO', '', 'honda', '', 0, 0, 'maintenance', 'Confirmed', 'No update', '2024-09-30', '07:00:00', '09:00:00'),
(49, 69, 37, 'JAN ARIES IMPUERTO', 'Mauban - Tignoan Roa', 'honda', 'solar', 20, 20, 'installation', 'Confirmed', 'No update', '2024-09-30', '07:00:00', '09:00:00'),
(50, 69, 37, 'JAN ARIES IMPUERTO', '', 'honda', '', 0, 0, 'maintenance', 'Confirmed', 'No update', '2024-09-30', '07:00:00', '09:00:00'),
(51, 69, 37, 'JAN ARIES IMPUERTO', 'Villa San Isidro, Ca', 'honda', 'solar', 23, 23, 'maintenance', 'Confirmed', 'No update', '2024-09-30', '07:00:00', '09:00:00'),
(52, 69, 37, 'JAN ARIES IMPUERTO', 'Chateau Verde, Atis ', 'honda', 'solar', 23, 23, 'installation', 'Pending', 'No update', '2024-09-30', '07:00:00', '09:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `availability_id` (`availability_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`availability_id`) REFERENCES `admin_availability` (`availability_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
