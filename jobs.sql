-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2026 at 01:16 PM
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
-- Database: `jobs`
--

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
-- Table structure for table `jobs`
--
-- Error reading structure for table jobs.jobs: #1932 - Table &#039;jobs.jobs&#039; doesn&#039;t exist in engine
-- Error reading data for table jobs.jobs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `jobs`.`jobs`&#039; at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job positions`
--
ALTER TABLE `job positions`
  ADD PRIMARY KEY (`reference number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
