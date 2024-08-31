-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 09:25 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Watts` int(100) NOT NULL,
  `Stock` int(100) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` varchar(512) NOT NULL,
  `Specification` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Type`, `Watts`, `Stock`, `Availability`, `Image`, `Description`, `Specification`) VALUES
(1013, 'SLF20GF', 'Generator', 20, 150, 1, NULL, '', ''),
(1014, 'SLF30GF', 'Generator', 33, 150, 1, NULL, '', ''),
(1015, 'SLF40GF', 'Generator', 40, 150, 1, NULL, '', ''),
(1016, 'SLF66GF', 'Generator', 66, 150, 1, NULL, '', ''),
(1017, 'MONO 350w', 'Solar Panel', 350, 150, 1, NULL, '', ''),
(1018, 'MONO 375w', 'Solar Panel', 375, 150, 1, NULL, '', ''),
(1019, 'MONO 400w', 'Solar Panel', 400, 150, 1, NULL, '', ''),
(1020, 'MONO 410w', 'Solar Panel', 410, 150, 1, NULL, '', ''),
(1042, 'MONO 350w', 'Solar Panel', 350, 150, 1, NULL, 'MONO 350-650 Solar Panels Experience high efficiency and reliable performance with our MONO series solar panels, ranging from 350 W to 650 W. Designed with advanced monocrystalline technology, these panels provide optimal power output and superior durability. Ideal for residential, commercial, and industrial applications, the MONO series ensures maximum energy production even in limited spaces.\r\n\r\nKey Features:\r\n• High Efficiency: Up to 25% efficiency for maximum energy generation.\r\n• Durable Design: Robust', 'Technical Specifications:\r\n• Power Output: 350 W\r\n• Efficiency: 20.0%\r\n• Dimensions: 175 cm (L) x 105 cm (W) x 4.0 cm (H)\r\n• Weight: 22 kg\r\n• Cell Type: Monocrystalline\r\n\r\nPerformance Features:\r\n• Maximum Power Voltage (Vmp): 34.0 V\r\n• Open Circuit Voltage (Voc): 40.0 V\r\n• Short Circuit Current (Isc): 10.3 A\r\n• Current at Maximum Power (Imp): 10.2 A\r\n\r\nAvailability:\r\n• Availability Status: In stock\r\n\r\nWarranty:\r\n• Warranty: 12 years product warranty, 25 years performance warranty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1043;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
