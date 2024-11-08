-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 06:16 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `landing_page_info`
--
ALTER TABLE `landing_page_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `landing_page_info`
--
ALTER TABLE `landing_page_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
