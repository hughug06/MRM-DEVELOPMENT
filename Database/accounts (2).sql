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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user' COMMENT 'user,admin,agent,service_worker\r\n',
  `is_ban` tinyint(1) DEFAULT 0 COMMENT '0 = not ban , 11',
  `service_count` int(50) NOT NULL DEFAULT 0 COMMENT '0, 1 , 2 , 3 , 4 , 5 ',
  `account_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify_token` varchar(255) DEFAULT NULL,
  `verify_status` tinyint(1) DEFAULT 0 COMMENT '0 = not verify , 1 = verify',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `user_id`, `email`, `password`, `role`, `is_ban`, `service_count`, `account_created`, `verify_token`, `verify_status`, `created_at`, `updated_at`) VALUES
(18, 30, 'janariesimpuerto13@gmail.com', '$2y$10$bSEfLQl4THLwAnGqfk3JVeU06/8vYia5E8Ty6KilLcpoyUL/trVzS', 'admin', 0, 0, '2024-09-03 09:26:00', 'be8bc181a023d4b3e43fe89ac52774d2', 1, '2024-09-03 09:26:00', '2024-09-03 20:16:13'),
(69, 100, 'user@gmail.com', '$2y$10$qinegeMLFrd1CPK3J5yJwubBZvSmT7t6IMsrWXZT4uy5JzEo3pVg6', 'user', 0, 5, '2024-09-11 19:07:41', '8a805f8d3761cc9263bbcc2db540275d', 1, '2024-09-11 19:07:41', '2024-09-26 21:16:06'),
(78, 109, 'worker1@gmail.com', '$2y$10$hOuMidPeq4vtBQHMuRFUEugicSOBHVXAFgUmP9.tdyc3CQ3fznjIq', 'service_worker', 0, 0, '2024-09-14 19:05:59', 'cc2cab9ba3961b992363735d1f4cd382', 1, '2024-09-14 19:05:59', '2024-09-14 19:08:26'),
(81, 112, 'test1@gmail.com2', '$2y$10$he.SivYzqi5eqkmu/ahKsO8fFw1c7vvEcXZ0B3EkaURdnWyHl2aR6', 'user', 0, 0, '2024-09-25 05:59:01', '1ee0475a8d5034eec81147e05ce6d191', 0, '2024-09-25 05:59:01', '2024-09-25 05:59:01');

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
