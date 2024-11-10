-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 06:47 PM
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
  `role` enum('client','admin','worker','agent') DEFAULT 'client' COMMENT 'user,admin,agent,service_worker\r\n',
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
(94, 132, 'janariesimpuerto13@gmail.com', '$2y$10$e6Tqx/lUPaD5KrxLOUYOIegpApyNuNNv.C94gIXilx/GT6.mnuoaS', 'admin', 0, 0, '2024-11-06 18:58:45', '809cd573caa6a5e505f3af6f092898c3', 1, '2024-11-06 18:58:45', '2024-11-06 20:10:24'),
(95, 133, 'user@gmail.com', '$2y$10$/tL.pCUL4KCdErVQ3zcqbeuojI0XeQUmhnPi0gGu7RpE48LE3GJaS', 'client', 0, 1, '2024-11-06 20:05:22', '49752de8a662d6b0966f76a3b28b0a79', 1, '2024-11-06 20:05:22', '2024-11-07 19:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_availability`
--

CREATE TABLE `admin_availability` (
  `availability_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_availability`
--

INSERT INTO `admin_availability` (`availability_id`, `account_id`, `date`, `start_time`, `end_time`) VALUES
(40, 94, '2024-11-30', '07:00:00', '09:00:00');

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
  `status` enum('Pending','Approved','Canceled','Waiting','Checking','Completed') DEFAULT 'Pending',
  `worker_update` varchar(50) NOT NULL DEFAULT 'No update' COMMENT 'no update, on the way, worker is on the site',
  `date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('solar','generator','','') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `type`, `amount`, `created_at`) VALUES
(2, 'SOLAR TEST', 'solar', 2000.00, '2024-11-09 14:36:34'),
(3, 'MARVIE', 'solar', 1000.00, '2024-11-09 17:25:14'),
(4, 'GENERATOR ', 'generator', 20000.00, '2024-11-09 20:02:34'),
(5, 'GENERATOR2', 'generator', 200000.00, '2024-11-09 20:39:04'),
(6, 'TEST', 'generator', 11.00, '2024-11-10 17:44:50');

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

INSERT INTO `chaintercom_appointment` (`chaintercomappointid`, `name`, `product`, `meeting_url`, `date`, `start_time`, `end_time`, `status`, `account_id`, `chainavailability`) VALUES
(22, 'Jan aries Solis', 'asd, Product 2, Product 2', 'https://meet.jit.si/meeting_7', '2024-11-30', '07:30:00', '10:00:00', 'confirm', 94, 7);

-- --------------------------------------------------------

--
-- Table structure for table `chaintercom_availability`
--

CREATE TABLE `chaintercom_availability` (
  `chainavailability` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chaintercom_availability`
--

INSERT INTO `chaintercom_availability` (`chainavailability`, `account_id`, `date`, `start_time`, `end_time`) VALUES
(7, 94, '2024-11-30', '07:30:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chaintercom_chatbox`
--

CREATE TABLE `chaintercom_chatbox` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `chaintercom_quotation`
--

CREATE TABLE `chaintercom_quotation` (
  `quotation_id` int(11) NOT NULL,
  `chaintercomappointid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kanban`
--

CREATE TABLE `kanban` (
  `kanban_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `products` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('waiting','ongoing','approved','completed','cancelled','checking') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_installation_generator`
--

CREATE TABLE `package_installation_generator` (
  `installation_id` int(11) NOT NULL,
  `unit` enum('items','job','set','lot') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 50,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_installation_generator`
--

INSERT INTO `package_installation_generator` (`installation_id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(4, 'items', 'TEST', 2, 1000.00, 2000.00, '2024-11-09 20:28:54'),
(5, 'job', 'TEST 2', 2, 2000.00, 4000.00, '2024-11-09 20:28:54'),
(6, 'items', 'TEST', 2, 1000.00, 2000.00, '2024-11-09 20:28:54'),
(7, 'job', 'TEST 2', 2, 2000.00, 4000.00, '2024-11-09 20:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `package_installation_solar`
--

CREATE TABLE `package_installation_solar` (
  `installation_id` int(11) NOT NULL,
  `unit` enum('items','set','job','lot') NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_installation_solar`
--

INSERT INTO `package_installation_solar` (`installation_id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(33, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:46:31'),
(34, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:46:31'),
(35, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `package_maintenance_generator`
--

CREATE TABLE `package_maintenance_generator` (
  `id` int(11) NOT NULL,
  `unit` enum('items','job','set','lot') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_maintenance_generator`
--

INSERT INTO `package_maintenance_generator` (`id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(2, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:45:18'),
(3, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `package_maintenance_solar`
--

CREATE TABLE `package_maintenance_solar` (
  `id` int(11) NOT NULL,
  `unit` enum('items','job','set','lot') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_maintenance_solar`
--

INSERT INTO `package_maintenance_solar` (`id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(2, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:45:59'),
(3, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:45:59'),
(4, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `package_repair_generator`
--

CREATE TABLE `package_repair_generator` (
  `id` int(11) NOT NULL,
  `unit` enum('items','job','set','lot') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_repair_generator`
--

INSERT INTO `package_repair_generator` (`id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(2, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:45:03'),
(3, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `package_repair_solar`
--

CREATE TABLE `package_repair_solar` (
  `id` int(11) NOT NULL,
  `unit` enum('items','job','set','lot') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_repair_solar`
--

INSERT INTO `package_repair_solar` (`id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(2, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:45:11'),
(3, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `package_tuneup_generator`
--

CREATE TABLE `package_tuneup_generator` (
  `id` int(11) NOT NULL,
  `unit` enum('items','job','set','lot') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_tuneup_generator`
--

INSERT INTO `package_tuneup_generator` (`id`, `unit`, `description`, `quantity`, `amount`, `total_cost`, `created_at`) VALUES
(3, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:46:11'),
(4, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 17:46:11'),
(5, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 17:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(20) NOT NULL,
  `ProductType` varchar(20) NOT NULL,
  `Watts_KVA` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `min_price` int(11) NOT NULL,
  `max_price` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Availability` tinyint(1) DEFAULT 1,
  `Image` varchar(255) DEFAULT NULL,
  `Specification` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductType`, `Watts_KVA`, `stock`, `min_price`, `max_price`, `Description`, `Availability`, `Image`, `Specification`, `created_at`, `updated_at`) VALUES
(1062, 'SOLAR', 'Solar Panel', 650, 20, 20000, 50000, '', 1, NULL, '', '2024-11-08 20:12:34', '2024-11-08 20:12:34'),
(1064, 'GENERATOR', 'Generator', 111, 50, 10000, 200000, '', 1, NULL, '', '2024-11-09 20:00:38', '2024-11-09 20:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `running_hours`
--

CREATE TABLE `running_hours` (
  `running_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `running_hours`
--

INSERT INTO `running_hours` (`running_id`, `name`, `amount`, `created_at`) VALUES
(1, '0 - 200 hrs', 1000.00, '2024-11-07 18:28:31'),
(2, '200 - 100 hrs', 2000.00, '2024-11-07 18:43:19');

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

-- --------------------------------------------------------

--
-- Table structure for table `service_payment`
--

CREATE TABLE `service_payment` (
  `payment_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `payment_status` enum('pending','checking','rejected','approved','completed') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `reference_number` int(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `payment_method` enum('bank_to_bank','cheque') NOT NULL,
  `total_cost` int(50) NOT NULL,
  `bank_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_pricing`
--

CREATE TABLE `service_pricing` (
  `pricingid` int(11) NOT NULL,
  `unit` enum('items','set','job','lot') NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_pricing`
--

INSERT INTO `service_pricing` (`pricingid`, `unit`, `description`, `quantity`, `amount`) VALUES
(61, 'items', 'TEST', 20, 1000.00),
(62, 'job', 'TEST 2', 10, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `service_quotation`
--

CREATE TABLE `service_quotation` (
  `quotation_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_worker`
--

CREATE TABLE `service_worker` (
  `service_id` int(11) NOT NULL,
  `worker_name` varchar(50) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `log_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `module` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `user_type` enum('organization','individual') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `email`, `first_name`, `middle_name`, `last_name`, `address`, `city`, `province`, `zip_code`, `user_type`, `created_at`, `updated_at`) VALUES
(132, 'janariesimpuerto13@gmail.com', 'Jan aries', 'Admin', 'Solis', 'Address', 'Qc', 'Metro manila', 1111, 'individual', '2024-11-06 18:58:45', '2024-11-06 18:58:45'),
(133, 'user@gmail.com', 'User', 'User', 'User', 'Address', 'Test', 'Test', 1111, 'individual', '2024-11-06 20:05:22', '2024-11-06 20:05:22');

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
-- Indexes for table `admin_availability`
--
ALTER TABLE `admin_availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD UNIQUE KEY `date` (`date`,`start_time`,`end_time`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `availability_id` (`availability_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `chaintercom_appointment`
--
ALTER TABLE `chaintercom_appointment`
  ADD PRIMARY KEY (`chaintercomappointid`),
  ADD KEY `fk_account` (`account_id`),
  ADD KEY `fk_chainavailability` (`chainavailability`);

--
-- Indexes for table `chaintercom_availability`
--
ALTER TABLE `chaintercom_availability`
  ADD PRIMARY KEY (`chainavailability`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `chaintercom_chatbox`
--
ALTER TABLE `chaintercom_chatbox`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `chaintercom_payment`
--
ALTER TABLE `chaintercom_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_quotation_id` (`quotation_id`),
  ADD KEY `fk_appointment_id` (`appointment_id`);

--
-- Indexes for table `chaintercom_quotation`
--
ALTER TABLE `chaintercom_quotation`
  ADD PRIMARY KEY (`quotation_id`),
  ADD KEY `chaintercomappointid` (`chaintercomappointid`),
  ADD KEY `account_id` (`user_id`);

--
-- Indexes for table `kanban`
--
ALTER TABLE `kanban`
  ADD PRIMARY KEY (`kanban_id`),
  ADD KEY `user_id_constraint` (`user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `package_installation_generator`
--
ALTER TABLE `package_installation_generator`
  ADD PRIMARY KEY (`installation_id`);

--
-- Indexes for table `package_installation_solar`
--
ALTER TABLE `package_installation_solar`
  ADD PRIMARY KEY (`installation_id`);

--
-- Indexes for table `package_maintenance_generator`
--
ALTER TABLE `package_maintenance_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_maintenance_solar`
--
ALTER TABLE `package_maintenance_solar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_repair_generator`
--
ALTER TABLE `package_repair_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_repair_solar`
--
ALTER TABLE `package_repair_solar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_tuneup_generator`
--
ALTER TABLE `package_tuneup_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `running_hours`
--
ALTER TABLE `running_hours`
  ADD PRIMARY KEY (`running_id`);

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
-- Indexes for table `service_payment`
--
ALTER TABLE `service_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_service_payment_account` (`account_id`),
  ADD KEY `fk_service_payment_appointment` (`appointment_id`);

--
-- Indexes for table `service_pricing`
--
ALTER TABLE `service_pricing`
  ADD PRIMARY KEY (`pricingid`);

--
-- Indexes for table `service_quotation`
--
ALTER TABLE `service_quotation`
  ADD PRIMARY KEY (`quotation_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `service_worker`
--
ALTER TABLE `service_worker`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `fk_appointment` (`appointment_id`),
  ADD KEY `admin_id` (`admin_id`) USING BTREE,
  ADD KEY `fk_payment` (`payment_id`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `admin_availability`
--
ALTER TABLE `admin_availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chaintercom_appointment`
--
ALTER TABLE `chaintercom_appointment`
  MODIFY `chaintercomappointid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chaintercom_availability`
--
ALTER TABLE `chaintercom_availability`
  MODIFY `chainavailability` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chaintercom_chatbox`
--
ALTER TABLE `chaintercom_chatbox`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chaintercom_payment`
--
ALTER TABLE `chaintercom_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chaintercom_quotation`
--
ALTER TABLE `chaintercom_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kanban`
--
ALTER TABLE `kanban`
  MODIFY `kanban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_installation_generator`
--
ALTER TABLE `package_installation_generator`
  MODIFY `installation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_installation_solar`
--
ALTER TABLE `package_installation_solar`
  MODIFY `installation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `package_maintenance_generator`
--
ALTER TABLE `package_maintenance_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_maintenance_solar`
--
ALTER TABLE `package_maintenance_solar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_repair_generator`
--
ALTER TABLE `package_repair_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_repair_solar`
--
ALTER TABLE `package_repair_solar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_tuneup_generator`
--
ALTER TABLE `package_tuneup_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1065;

--
-- AUTO_INCREMENT for table `running_hours`
--
ALTER TABLE `running_hours`
  MODIFY `running_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_or`
--
ALTER TABLE `service_or`
  MODIFY `receiptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `service_payment`
--
ALTER TABLE `service_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `service_pricing`
--
ALTER TABLE `service_pricing`
  MODIFY `pricingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `service_quotation`
--
ALTER TABLE `service_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_worker`
--
ALTER TABLE `service_worker`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `admin_availability`
--
ALTER TABLE `admin_availability`
  ADD CONSTRAINT `admin_availability_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`availability_id`) REFERENCES `admin_availability` (`availability_id`);

--
-- Constraints for table `chaintercom_appointment`
--
ALTER TABLE `chaintercom_appointment`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `fk_chainavailability` FOREIGN KEY (`chainavailability`) REFERENCES `chaintercom_availability` (`chainavailability`);

--
-- Constraints for table `chaintercom_availability`
--
ALTER TABLE `chaintercom_availability`
  ADD CONSTRAINT `chaintercom_availability_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `chaintercom_chatbox`
--
ALTER TABLE `chaintercom_chatbox`
  ADD CONSTRAINT `chaintercom_chatbox_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chaintercom_chatbox_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE;

--
-- Constraints for table `chaintercom_payment`
--
ALTER TABLE `chaintercom_payment`
  ADD CONSTRAINT `fk_appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `chaintercom_appointment` (`chaintercomappointid`),
  ADD CONSTRAINT `fk_quotation_id` FOREIGN KEY (`quotation_id`) REFERENCES `chaintercom_quotation` (`quotation_id`);

--
-- Constraints for table `chaintercom_quotation`
--
ALTER TABLE `chaintercom_quotation`
  ADD CONSTRAINT `chaintercom_quotation_ibfk_1` FOREIGN KEY (`chaintercomappointid`) REFERENCES `chaintercom_appointment` (`chaintercomappointid`),
  ADD CONSTRAINT `chaintercom_quotation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `kanban`
--
ALTER TABLE `kanban`
  ADD CONSTRAINT `user_id_constraint` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `service_or`
--
ALTER TABLE `service_or`
  ADD CONSTRAINT `fk_worker_id` FOREIGN KEY (`worker_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `service_or_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `service_or_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`),
  ADD CONSTRAINT `service_or_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `service_payment` (`payment_id`);

--
-- Constraints for table `service_payment`
--
ALTER TABLE `service_payment`
  ADD CONSTRAINT `fk_service_payment_account` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_service_payment_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_quotation`
--
ALTER TABLE `service_quotation`
  ADD CONSTRAINT `service_quotation_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `service_quotation_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);

--
-- Constraints for table `service_worker`
--
ALTER TABLE `service_worker`
  ADD CONSTRAINT `fk_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`payment_id`) REFERENCES `service_payment` (`payment_id`),
  ADD CONSTRAINT `service_worker_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
