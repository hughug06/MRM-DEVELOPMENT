-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 05:57 PM
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
-- Table structure for table `inventory_logs`
--

CREATE TABLE `inventory_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `log_action` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_logs`
--

INSERT INTO `inventory_logs` (`log_id`, `user_id`, `product_name`, `log_action`, `date`, `time`) VALUES
(26, 67, '2sad', 'User User: Has added new Item: 2sad', '2024-09-25', '05:35:38'),
(27, 67, '2sad', 'User User: Has added new Item: 2sad', '2024-09-25', '05:37:19'),
(28, 67, '2sad', 'User User: Has added new Item: 2sad', '2024-09-25', '05:38:17'),
(29, 67, 'dsadsa', 'User User: Has added new Item: dsadsa', '2024-09-25', '05:40:47'),
(30, 67, 'dsadsa', 'User User: Has added new Item: dsadsa', '2024-09-25', '05:43:32'),
(31, 67, 'TEST', 'User User: Has added new Item: TEST', '2024-09-25', '05:43:59'),
(32, 67, 'test222', 'User User: Has edited the product: test222', '2024-09-25', '05:56:57'),
(33, 67, 'test222', 'User User: Has edited the product: test222', '2024-09-25', '05:58:13'),
(34, 67, 'test222', 'User User: Has edited the product: test222', '2024-09-25', '05:58:15'),
(35, 67, 'test222', 'User User: Has edited the product: test222', '2024-09-25', '06:04:03'),
(36, 67, 'test2', 'User User: Has edited the product: test2', '2024-09-25', '06:12:45'),
(37, 67, 'test2', 'User User: Has edited the item: test2', '2024-09-25', '06:14:27'),
(38, 67, 'MONO 350W', 'User User: Has added new item: MONO 350W', '2024-09-25', '15:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id constraint` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  ADD CONSTRAINT `user_id constraint` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
