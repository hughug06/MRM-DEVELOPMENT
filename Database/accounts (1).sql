-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 07:57 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user' COMMENT 'user,admin,agent,service_worker\r\n',
  `is_ban` tinyint(1) DEFAULT 0 COMMENT '0 = not ban , 11',
  `account_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify_token` varchar(255) DEFAULT NULL,
  `verify_status` tinyint(1) DEFAULT 0 COMMENT '0 = not verify , 1 = verify',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `user_id`, `email`, `password`, `role`, `is_ban`, `account_created`, `verify_token`, `verify_status`, `created_at`, `updated_at`) VALUES
(18, 30, 'janariesimpuerto13@gmail.com', '$2y$10$bSEfLQl4THLwAnGqfk3JVeU06/8vYia5E8Ty6KilLcpoyUL/trVzS', 'admin', 0, '2024-09-03 09:26:00', 'be8bc181a023d4b3e43fe89ac52774d2', 1, '2024-09-03 09:26:00', '2024-09-03 20:16:13'),
(69, 100, 'user@gmail.com', '$2y$10$qinegeMLFrd1CPK3J5yJwubBZvSmT7t6IMsrWXZT4uy5JzEo3pVg6', 'user', 0, '2024-09-11 19:07:41', '8a805f8d3761cc9263bbcc2db540275d', 1, '2024-09-11 19:07:41', '2024-09-11 19:08:04'),
(78, 109, 'worker1@gmail.com', '$2y$10$hOuMidPeq4vtBQHMuRFUEugicSOBHVXAFgUmP9.tdyc3CQ3fznjIq', 'service_worker', 0, '2024-09-14 19:05:59', 'cc2cab9ba3961b992363735d1f4cd382', 1, '2024-09-14 19:05:59', '2024-09-14 19:08:26'),
(79, 110, 'asdasdsad@gmail.com', '$2y$10$nfvZUrlpSWLo8oFaDZOLMumOAnK4ycB96IAcGXppbxT0C/ocrnngW', 'user', 0, '2024-09-14 20:23:35', '883e28a171f8a0f19f1305a7fc15c698', 0, '2024-09-14 20:23:35', '2024-09-14 20:23:35'),
(80, 111, 'worker2@gmail.com', '$2y$10$S.UXwEc81ZDjPHtUuRQqv.q8IHv2eHIacQs8pNsO/bESVxGn3qvPe', 'service_worker', 0, '2024-09-14 20:37:57', '924b6ddec9d37d6702fc5a6ccb247a06', 1, '2024-09-14 20:37:57', '2024-09-14 20:38:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
