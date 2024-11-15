-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 08:18 AM
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
(95, 133, 'user@gmail.com', '$2y$10$/tL.pCUL4KCdErVQ3zcqbeuojI0XeQUmhnPi0gGu7RpE48LE3GJaS', 'client', 0, 1, '2024-11-06 20:05:22', '49752de8a662d6b0966f76a3b28b0a79', 1, '2024-11-06 20:05:22', '2024-11-07 19:17:35'),
(96, 134, 'tesT@gmail.com', '$2y$10$6tn65XUvgqGHl7AYmfb87OdkCzYdAo.lXFH6XE71j8E8DPgv8mdyK', 'admin', 0, 0, '2024-11-11 17:15:07', NULL, 1, '2024-11-11 17:15:07', '2024-11-11 17:15:07'),
(97, 135, 'worker1@gmail.com', '$2y$10$xty0Kg83lyQ4ls0bgStK5eE/8ELVc2.cLGQ/jlZ6UnnbZVq3gMgTa', 'worker', 0, 0, '2024-11-11 20:50:25', NULL, 1, '2024-11-11 20:50:25', '2024-11-11 20:52:21'),
(99, 147, 'worker2@gmail.com', '$2y$10$KhreQtQ7KO5rSQRzs1u61ePEYysXg9reVHxQ.KOfQXTchkmjrfDqK', 'worker', 0, 0, '2024-11-12 19:07:30', NULL, 1, '2024-11-12 19:07:30', '2024-11-12 19:07:30');

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
(7, 94, '2024-11-30', '07:30:00', '10:00:00'),
(8, 94, '2024-11-21', '07:00:00', '08:30:00');

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
-- Table structure for table `landing_page_info`
--

CREATE TABLE `landing_page_info` (
  `id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`description`)),
  `goals` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`goals`)),
  `faq` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`faq`)),
  `projects` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`projects`)),
  `user_experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_experience`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landing_page_info`
--

INSERT INTO `landing_page_info` (`id`, `title`, `description`, `goals`, `faq`, `projects`, `user_experience`) VALUES
(1, '{\"title1_f\": \"Power\",\n\"title1_d\": \"Your Home with Clean, Reliable\",  \n\"title1_l\": \"Energy\",\n\"title2\": \"What is Clean Energy?\"}', '{\"desc1\": \"At MRM Electric Power Generation Services, we deliver reliable solar solutions that promote a cleaner planet by reducing fossil fuel reliance and empowering communities to embrace renewable energy for a sustainable future.\",\r\n\"desc2\": \"At MRM Electric Power Generation Services, we deliver reliable solar solutions that promote a cleaner planet by reducing fossil fuel reliance and empowering communities to embrace renewable energy for a sustainable future.\",\r\n\"desc3\": \"The services offered are varied and vast to help accommodate costumers with their needs within the comforts of their own homes or businesses. The main function of our services is to cater towards a goal of helping organizations and businesses to have a smooth and stable product that works and can be used at a moment’s notice.\",    \r\n\"desc4\": \"We’re here to help you make the switch to solar energy and backup power as easy and seamless as possible. Our team understands that every home is unique, with different energy    requirements and concerns. That’s why we’re dedicated to providing you with a personalized energy solution that fits your specific needs, lifestyle, and budget.\",\r\n\"about\": \"Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni laboriosam sint, pariatur eos ullam laudantium!\"}', '{\"goal1\": \"To enhance livelihoods across various sectors within communities in the Philippines.\",\r\n\"goal2\": \"To foster new connections by providing sustainable energy opportunities for local communities.\",\r\n\"goal3\": \"To cultivate a culture of clean energy consumption that benefits both individuals and their communities.\",\r\n\"goal4\": \"To raise awareness about the advantages of using clean and solar-based energy products and generators within the community.\"}', '{\"faqdesc\": \"Find answers to common questions about our generators, solar panels, and services. For further inquiries, please reach out through our contact page!\",\r\n\"faq_q1\": \"What types of generators do you offer?\",\r\n\"faq_q2\": \"What types of solar panels do you provide?\",\r\n\"faq_q3\": \"Do you provide installation services?\",\r\n\"faq_q4\": \"Can you help with generator or solar panel maintenance?\",\r\n\"faq_q5\": \"What repair services do you offer?\",\r\n\"faq_q6\": \"How often should I schedule maintenance for my generator?\",\r\n\"faq_q7\": \"Can you help with system tuning for better performance?\",\r\n\"faq_q8\": \"Are there financing options available for generator and solar panel installations?\",\r\n\"faq_q9\": \"Do you offer warranties on your products and services?\",\r\n\"faq_q10\": \"How can I request a quote or consultation?\",\r\n\"faq_a1\": \" MRM E-G Electric Power Generation Services offers a range of generators to meet diverse power needs, from residential units to heavy-duty commercial and industrial generators. Our options include diesel, gas, and portable models to fit various applications and preferences.\",\r\n\"faq_a2\": \"We offer high-efficiency solar panels suitable for residential, commercial, and industrial installations. Our solar panels are chosen for their durability, performance, and cost-effectiveness, helping you achieve sustainable energy solutions.\",\r\n\"faq_a3\": \"Yes, we offer comprehensive installation services for both generators and solar panels. Our skilled technicians ensure safe, efficient, and compliant installation, helping you get your system up and running smoothly.\",\r\n\"faq_a4\": \"Absolutely! We provide maintenance services for both generators and solar panel systems. Regular maintenance extends the lifespan of your equipment and ensures it operates at peak efficiency.\",\r\n\"faq_a5\": \"MRM E-G Electric Power Generation Services offers complete repair services for generators and solar panel systems. Whether it\'s a minor issue or a major repair, our team can diagnose and resolve problems efficiently to get your system back to optimal performance.\",\r\n\"faq_a6\": \"For optimal performance, we recommend generator maintenance at least once a year, though heavy-use generators may need more frequent checks. Regular maintenance reduces the risk of breakdowns and extends the lifespan of your equipment.\",\r\n\"faq_a7\": \"Yes, we offer tuning services for generators to ensure they perform at their best. Our technicians adjust settings and calibrate components for maximum efficiency and reliability.\",\r\n\"faq_a8\": \"We understand that investing in a power generation system is significant. We offer flexible financing options to help you achieve energy independence affordably. Please reach out to discuss available plans.\",\r\n\"faq_a9\": \"Yes, all our products come with a manufacturer’s warranty, and we also provide warranties on our installation and repair services. Our goal is to give you peace of mind and confidence in your purchase.\",\r\n\"faq_a10\": \"You can easily request a quote or consultation by contacting us via phone or email, or by visiting our website. We’ll assess your power needs and provide a detailed proposal tailored to your specific requirements.\"}', '{\"pj1_title\": \"Cagayan Solar Farm Project\",\r\n\"pj2_title\": \"Ilocos Solar Farm Irrigation Project\",\r\n\"pj3_title\": \"Boracay Clean Water Irrigation Project\",\r\n\"pj4_title\": \"Cebu Solar Farm Project\",\r\n\"pj5_title\": \"Isabela Farm Project\",\r\n\"pj6_title\": \"Samar Potato Farm Project\",\r\n\"pj1_desc\": \"Develop a large-scale solar farm in Cagayan to provide renewable energy for local communities and reduce reliance on fossil fuels.\",\r\n\"pj2_desc\": \"Utilize solar energy to power irrigation systems in Ilocos, enhancing agricultural productivity in areas with limited access to consistent water resources.\",\r\n\"pj3_desc\": \"Establish an eco-friendly irrigation system in Boracay to support sustainable landscaping, local agriculture, and clean water access.\",\r\n\"pj4_desc\": \"Construct a solar farm in Cebu to supply renewable energy to industrial areas and reduce electricity costs for local businesses.\",\r\n\"pj5_desc\": \"Establish a sustainable farming project in Isabela that combines renewable energy and modern agricultural practices to improve crop yields and farmer income.\",\r\n\"pj6_desc\": \"Launch a solar-powered potato farm in Samar, aimed at bolstering local food production and creating a sustainable agricultural model for root crops.\"}', '{\"xp1_name\": \"James Velasco\",\r\n\"xp1_comment\": \"MRM E-G Electric Power Generation Services offers exceptional service and knowledgeable staff. The website is user-friendly, making it easy to find what I need among their quality generators and solar solutions. Their commitment to sustainability and prompt support truly sets them apart!\",\r\n\"xp2_name\": \"Alyssa Rivera\",\r\n\"xp2_comment\": \"MRM E-G provides reliable and professional power solutions with a full range of services from solar installations to generator maintenance. The website is clear and concise, offering all the details needed. heir team is always available and helpful—I highly recommend them!\",\r\n\"xp3_name\": \"Carlos Mendoza\",\r\n\"xp3_comment\": \"MRM E-G Electric Power Generation Services is a one-stop shop for green energy needs. The website offers extensive information on eco-friendly products, making it easy to make informed decisions. They truly prioritize customer satisfaction in every interaction.\"}\r\n');

--
-- Triggers `landing_page_info`
--
DELIMITER $$
CREATE TRIGGER `limit_one_row` BEFORE INSERT ON `landing_page_info` FOR EACH ROW BEGIN
    IF (SELECT COUNT(*) FROM landing_page_info) >= 1 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Only one row is allowed in this table';
    END IF;
END
$$
DELIMITER ;

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
(4, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 19:46:28'),
(5, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 19:46:28'),
(6, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 19:46:28'),
(7, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 19:46:28');

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
(7, 'items', 'TEST', 1, 1000.00, 1000.00, '2024-11-10 18:24:24'),
(8, 'job', 'TEST 2', 1, 2000.00, 2000.00, '2024-11-10 18:24:24');

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
-- Table structure for table `service_availability`
--

CREATE TABLE `service_availability` (
  `availability_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_availability`
--

INSERT INTO `service_availability` (`availability_id`, `admin_id`, `date`, `start_time`, `end_time`) VALUES
(41, 94, '2024-11-30', '07:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

CREATE TABLE `service_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `availability_id` int(11) NOT NULL,
  `service_type` enum('installation','tune-up','repair','maintenance') NOT NULL,
  `product_type` enum('solar','generator') NOT NULL,
  `pin_location` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `KVA` int(11) DEFAULT NULL,
  `running_hours` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `is_custom_brand` tinyint(1) NOT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `payment_method` enum('bank_to_bank','cheque') NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `reference_number` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_status` enum('advance_payment','delivery_payment','final_payment') NOT NULL,
  `booking_status` enum('pending','ongoing','completed') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`booking_id`, `user_id`, `availability_id`, `service_type`, `product_type`, `pin_location`, `quantity`, `KVA`, `running_hours`, `brand`, `is_custom_brand`, `total_cost`, `payment_method`, `bank_name`, `reference_number`, `payment_date`, `payment_status`, `booking_status`, `created_at`, `updated_at`) VALUES
(7, 133, 41, 'maintenance', 'solar', 'Villa Bota, Quezon, Calabarzon, 4306, Philippines', 1, 1, 1, 'MARVIE', 0, 6600.00, 'cheque', '12', 12, '2024-11-14', 'delivery_payment', 'ongoing', '2024-11-14 19:40:02', '2024-11-14 19:46:53');

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
(133, 'user@gmail.com', 'User', 'User', 'User', 'Address', 'Test', 'Test', 1111, 'individual', '2024-11-06 20:05:22', '2024-11-06 20:05:22'),
(134, 'tesT@gmail.com', 'TEST', 'TEST', 'TEST', '', '', '', 0, 'organization', '2024-11-11 17:15:07', '2024-11-11 17:15:07'),
(135, 'worker1@gmail.com', 'WORKER1', 'WORKER1', 'WORKER1', '', '', '', 0, 'organization', '2024-11-11 20:50:25', '2024-11-11 20:50:25'),
(147, 'worker2@gmail.com', 'WORKER2', 'WORKER2', 'WORKER2', '', '', '', 0, 'organization', '2024-11-12 19:07:30', '2024-11-12 19:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `worker_availability`
--

CREATE TABLE `worker_availability` (
  `worker_id` int(10) NOT NULL,
  `account_id` int(10) NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worker_availability`
--

INSERT INTO `worker_availability` (`worker_id`, `account_id`, `is_available`) VALUES
(1, 97, 0),
(2, 99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `worker_ongoing`
--

CREATE TABLE `worker_ongoing` (
  `working_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `availability_id` int(11) DEFAULT NULL,
  `worker_id` int(11) NOT NULL,
  `status` enum('pick_up','delivery','arrive','ongoing_construction','checking','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worker_ongoing`
--

INSERT INTO `worker_ongoing` (`working_id`, `booking_id`, `admin_id`, `client_id`, `availability_id`, `worker_id`, `status`) VALUES
(5, 7, 94, 133, 41, 99, 'delivery');

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
-- Indexes for table `landing_page_info`
--
ALTER TABLE `landing_page_info`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `service_availability`
--
ALTER TABLE `service_availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD UNIQUE KEY `date` (`date`,`start_time`,`end_time`),
  ADD KEY `account_id` (`admin_id`);

--
-- Indexes for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `availability_id` (`availability_id`),
  ADD KEY `user_info_fk_3` (`user_id`);

--
-- Indexes for table `service_pricing`
--
ALTER TABLE `service_pricing`
  ADD PRIMARY KEY (`pricingid`);

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
-- Indexes for table `worker_availability`
--
ALTER TABLE `worker_availability`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `reference_account_id` (`account_id`);

--
-- Indexes for table `worker_ongoing`
--
ALTER TABLE `worker_ongoing`
  ADD PRIMARY KEY (`working_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `availability_id` (`availability_id`),
  ADD KEY `fk_worker_id` (`worker_id`),
  ADD KEY `worker_ongoing_ibfk_3` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
  MODIFY `chainavailability` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `landing_page_info`
--
ALTER TABLE `landing_page_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1065;

--
-- AUTO_INCREMENT for table `service_availability`
--
ALTER TABLE `service_availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_pricing`
--
ALTER TABLE `service_pricing`
  MODIFY `pricingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `worker_availability`
--
ALTER TABLE `worker_availability`
  MODIFY `worker_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worker_ongoing`
--
ALTER TABLE `worker_ongoing`
  MODIFY `working_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `service_availability`
--
ALTER TABLE `service_availability`
  ADD CONSTRAINT `service_availability_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD CONSTRAINT `service_booking_ibfk_2` FOREIGN KEY (`availability_id`) REFERENCES `service_availability` (`availability_id`),
  ADD CONSTRAINT `user_info_fk_3` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `worker_availability`
--
ALTER TABLE `worker_availability`
  ADD CONSTRAINT `reference_account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `worker_ongoing`
--
ALTER TABLE `worker_ongoing`
  ADD CONSTRAINT `fk_worker_id` FOREIGN KEY (`worker_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `worker_ongoing_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `service_booking` (`booking_id`),
  ADD CONSTRAINT `worker_ongoing_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `worker_ongoing_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `worker_ongoing_ibfk_4` FOREIGN KEY (`availability_id`) REFERENCES `service_availability` (`availability_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
