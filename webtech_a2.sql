-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 02:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech_a2`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `JobReferenceNumber` varchar(5) DEFAULT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `StreetAddress` varchar(40) DEFAULT NULL,
  `SuburbTown` varchar(40) DEFAULT NULL,
  `State` varchar(3) DEFAULT NULL,
  `Postcode` varchar(4) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(12) DEFAULT NULL,
  `Project_Management` varchar(3) DEFAULT NULL,
  `Digital_Marketing` varchar(3) DEFAULT NULL,
  `Data_Management` varchar(3) DEFAULT NULL,
  `Communication_Skills` varchar(3) DEFAULT NULL,
  `Skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `JobReferenceNumber`, `FirstName`, `LastName`, `date`, `Gender`, `StreetAddress`, `SuburbTown`, `State`, `Postcode`, `email`, `PhoneNumber`, `Project_Management`, `Digital_Marketing`, `Data_Management`, `Communication_Skills`, `Skills`, `status`) VALUES
(2, '1234', 'lachie', 'colville', '2026-04-29', 'Male', '17 Burger Road', 'Melbourne', 'VIC', '3000', 'email@emaiul.com', '1234123123', 'No', 'Yes', 'Yes', 'No', 'No other skills ever', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `job positions`
--

CREATE TABLE `job positions` (
  `reference number` varchar(5) NOT NULL,
  `job title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `reports to` varchar(25) NOT NULL,
  `key responsibilities` text NOT NULL,
  `essential requirements` text NOT NULL,
  `preferable requirements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job positions`
--

INSERT INTO `job positions` (`reference number`, `job title`, `description`, `salary`, `reports to`, `key responsibilities`, `essential requirements`, `preferable requirements`) VALUES
('WWD01', 'Web Developer', 'The Web Developer is responsible for designing, developing, and maintaining Website Wellness’s online patient platforms and health information websites. The role ensures systems are secure, responsive, accessible, and easy for patients and healthcare professionals to use.', '$70,000 – $90,000', 'Digital Services Manager', 'Develop and maintain company websites and patient portals\r\nImplement responsive and accessible web designs\r\nIntegrate appointment booking and healthcare management systems\r\nPerform website testing, debugging, and performance optimisation\r\nMaintain website security and data protection standards', 'Experience with HTML, CSS, JavaScript, and modern web frameworks\r\nUnderstanding of responsive web design principles\r\nKnowledge of web security and privacy practices\r\nAbility to work collaboratively within a development team', 'Experience working with healthcare or booking platforms\r\nKnowledge of UX/UI design principles'),
('WWD02', 'Digital Health Support Specialist', 'The Digital Health Support Specialist assists patients and staff in using Website Wellness digital services, including appointment systems, online health platforms, and telehealth tools. The role focuses on improving user experience and providing technical support.', '$60,000 – $75,000', 'Operations Manager', 'Provide technical support for online patient systems\r\nAssist users with account setup and troubleshooting\r\nMonitor digital platform performance and report issues\r\nSupport telehealth and online appointment services\r\nCreate user guides and support documentation', 'Strong communication and customer support skills\r\nBasic understanding of web-based systems and digital platforms\r\nProblem-solving and troubleshooting abilities\r\nAbility to explain technical concepts clearly to users', 'Experience in healthcare administration or IT support\r\nFamiliarity with telehealth or patient management systems');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(25) NOT NULL,
  `a1Contribution` varchar(25) NOT NULL,
  `a2Contribution` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`studentID`, `studentName`, `a1Contribution`, `a2Contribution`) VALUES
(106278803, 'Lachie Colville', 'Index Page', 'Task 1, 2 & 7'),
(106499138, 'Niranjan Nair', 'About Page', 'Task 6'),
(106518240, 'Stephanie Hammet', 'Apply Page', 'Task 5 & 6'),
(106522034, 'Ahmed Agan', 'Jobs Page', 'Task 3 & 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
