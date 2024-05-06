-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 05:19 AM
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
-- Database: `sms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Isah Sulaiman Muhammad', 'admin', 'admins');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `student_class` varchar(100) NOT NULL,
  `sub_class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ca1` int(11) NOT NULL,
  `ca2` int(11) NOT NULL,
  `exam_score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `subject_position` int(11) NOT NULL,
  `exam_term` varchar(100) NOT NULL,
  `exam_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `regno`, `full_name`, `student_class`, `sub_class`, `subject`, `ca1`, `ca2`, `exam_score`, `total`, `grade`, `subject_position`, `exam_term`, `exam_year`) VALUES
(1, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'MATHEMATICS', 20, 18, 42, 80, 'A', 1, 'first term', '2023'),
(2, 'RGN2', 'Muhammad Sani', 'SS3', '', 'MATHEMATICS', 15, 15, 45, 75, 'A', 2, 'first term', '2023'),
(3, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'ENGLISH', 15, 17, 51, 83, 'A', 1, 'first term', '2023'),
(4, 'RGN2', 'Muhammad Sani', 'SS3', '', 'ENGLISH', 15, 18, 32, 65, 'B', 2, 'first term', '2023'),
(5, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'BIOLOGY', 15, 19, 49, 83, 'A', 1, 'first term', '2023'),
(6, 'RGN2', 'Muhammad Sani', 'SS3', '', 'BIOLOGY', 10, 9, 29, 48, 'D', 2, 'first term', '2023'),
(7, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'CHEMISTRY', 19, 15, 39, 73, 'B', 1, 'first term', '2023'),
(8, 'RGN2', 'Muhammad Sani', 'SS3', '', 'CHEMISTRY', 17, 13, 22, 52, 'D', 2, 'first term', '2023'),
(9, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'PHYSICS', 13, 17, 40, 70, 'B', 1, 'first term', '2023'),
(10, 'RGN2', 'Muhammad Sani', 'SS3', '', 'PHYSICS', 10, 10, 20, 40, 'E', 2, 'first term', '2023'),
(11, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'DATA PROCESSING', 20, 10, 44, 74, 'B', 1, 'first term', '2023'),
(12, 'RGN2', 'Muhammad Sani', 'SS3', '', 'DATA PROCESSING', 15, 16, 40, 71, 'B', 2, 'first term', '2023'),
(13, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'GEOGRAPHY', 17, 20, 40, 77, 'A', 1, 'first term', '2023'),
(14, 'RGN2', 'Muhammad Sani', 'SS3', '', 'GEOGRAPHY', 17, 18, 30, 65, 'B', 2, 'first term', '2023'),
(15, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'FURTHER MATHS', 15, 15, 30, 60, 'C', 2, 'first term', '2023'),
(16, 'RGN2', 'Muhammad Sani', 'SS3', '', 'FURTHER MATHS', 20, 17, 45, 82, 'A', 1, 'first term', '2023'),
(17, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'RELIGION', 15, 15, 40, 70, 'B', 1, 'first term', '2023'),
(18, 'RGN2', 'Muhammad Sani', 'SS3', '', 'RELIGION', 15, 15, 40, 70, 'B', 1, 'first term', '2023'),
(19, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'HAUSA', 15, 13, 37, 65, 'B', 2, 'first term', '2023'),
(20, 'RGN2', 'Muhammad Sani', 'SS3', '', 'HAUSA', 12, 18, 40, 70, 'B', 1, 'first term', '2023'),
(21, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'MATHEMATICS', 15, 15, 40, 70, 'B', 1, 'second term', '2023'),
(22, 'RGN2', 'Muhammad Sani', 'SS3', '', 'MATHEMATICS', 10, 15, 35, 60, 'C', 2, 'second term', '2023'),
(23, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'ENGLISH', 20, 20, 55, 95, 'A', 1, 'second term', '2023'),
(24, 'RGN2', 'Muhammad Sani', 'SS3', '', 'ENGLISH', 10, 10, 30, 50, 'D', 2, 'second term', '2023'),
(25, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'RELIGION', 20, 17, 56, 93, 'A', 1, 'second term', '2023'),
(26, 'RGN2', 'Muhammad Sani', 'SS3', '', 'RELIGION', 15, 17, 48, 80, 'A', 2, 'second term', '2023'),
(27, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'MATHEMATICS', 20, 10, 40, 70, 'B', 2, 'third term', '2023'),
(28, 'RGN2', 'Muhammad Sani', 'SS3', '', 'MATHEMATICS', 20, 20, 55, 95, 'A', 1, 'third term', '2023'),
(29, 'RGN1', 'Isah Sulaiman', 'SS3', '', 'ENGLISH', 15, 17, 30, 62, 'C', 1, 'third term', '2023'),
(30, 'RGN2', 'Muhammad Sani', 'SS3', '', 'ENGLISH', 20, 20, 10, 50, 'D', 2, 'third term', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `psychomotor_records`
--

CREATE TABLE `psychomotor_records` (
  `id` int(11) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `student_class` varchar(100) NOT NULL,
  `sub_class` varchar(100) NOT NULL,
  `exam_term` varchar(100) NOT NULL,
  `exam_year` varchar(100) NOT NULL,
  `psy_domain` varchar(1000) NOT NULL,
  `aff_domain` varchar(1000) NOT NULL,
  `completion_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psychomotor_records`
--

INSERT INTO `psychomotor_records` (`id`, `regno`, `student_class`, `sub_class`, `exam_term`, `exam_year`, `psy_domain`, `aff_domain`, `completion_status`) VALUES
(1, 'RGN1', 'SS3', '', 'first term', '2023', 'a:7:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";i:3;s:1:\"5\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"5\";}', 'a:11:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";i:3;s:1:\"5\";i:4;s:1:\"5\";i:5;s:1:\"5\";i:6;s:1:\"5\";i:7;s:1:\"5\";i:8;s:1:\"5\";i:9;s:1:\"5\";i:10;s:1:\"4\";}', 1),
(2, 'RGN2', 'SS3', '', 'first term', '2023', 'a:7:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"4\";i:6;s:1:\"3\";}', 'a:11:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"4\";i:3;s:1:\"3\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"4\";i:7;s:1:\"3\";i:8;s:1:\"5\";i:9;s:1:\"4\";i:10;s:1:\"3\";}', 1),
(3, 'RGN1', 'SS3', '', 'second term', '2023', 'a:7:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"4\";i:6;s:1:\"5\";}', 'a:11:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"4\";i:7;s:1:\"5\";i:8;s:1:\"4\";i:9;s:1:\"5\";i:10;s:1:\"4\";}', 1),
(4, 'RGN2', 'SS3', '', 'second term', '2023', 'a:7:{i:0;s:1:\"4\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"4\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"4\";}', 'a:11:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"4\";i:6;s:1:\"5\";i:7;s:1:\"4\";i:8;s:1:\"3\";i:9;s:1:\"4\";i:10;s:1:\"5\";}', 1),
(5, 'RGN1', 'SS3', '', 'third term', '2023', 'a:7:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"4\";i:3;s:1:\"4\";i:4;s:1:\"4\";i:5;s:1:\"4\";i:6;s:1:\"4\";}', 'a:11:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"4\";i:7;s:1:\"5\";i:8;s:1:\"4\";i:9;s:1:\"5\";i:10;s:1:\"4\";}', 1),
(6, 'RGN2', 'SS3', '', 'third term', '2023', 'a:7:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"4\";i:6;s:1:\"5\";}', 'a:11:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"4\";i:5;s:1:\"5\";i:6;s:1:\"4\";i:7;s:1:\"5\";i:8;s:1:\"4\";i:9;s:1:\"5\";i:10;s:1:\"4\";}', 1),
(7, 'RGN1', 'SS2', '', 'first term', '2023', 'a:7:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}', 'a:11:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";i:7;s:0:\"\";i:8;s:0:\"\";i:9;s:0:\"\";i:10;s:0:\"\";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `student_class` varchar(100) NOT NULL,
  `sub_class` varchar(100) NOT NULL,
  `dt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `regno`, `student_class`, `sub_class`, `dt`) VALUES
(1, 'Isah Sulaiman', 'RGN1', 'SS3', '', '2023'),
(2, 'Muhammad Sani', 'RGN2', 'SS3', '', '2023'),
(3, 'ISAH SULAIMAN', 'RGN3', 'SS2', 'ART', '2024'),
(4, 'MUNEERAH HASSAN', 'RGN4', 'SS2', 'SCIENCE', '2024'),
(5, 'AMEER ALHAJI', 'RGN5', 'SS2', 'SCIENCE', '2024'),
(6, 'HASSANAH USAMN', 'RGN6', 'SS2', 'SCIENCE', '2024'),
(7, 'ASIHA SALISU', 'RGN7', 'SS2', 'SCIENCE', '2024'),
(8, 'HADIZA MUHAMMAD SABIU', 'RGN8', 'SS2', 'SCIENCE', '2024'),
(9, 'ISAH SULAIMAN', 'RGN9', 'JS2', '', '2024'),
(10, 'MUNEERAH HASSAN', 'RGN10', 'JS2', 'SCIENCE', '2024'),
(11, 'AMEER ALHAJI', 'RGN11', 'JS2', '', '2024'),
(12, 'HASSANAH USAMN', 'RGN12', 'JS2', '', '2024'),
(13, 'ASIHA SALISU', 'RGN13', 'JS2', '', '2024'),
(15, 'Maryam Muhammad Babe', 'RGN14', 'SS1', 'SCIENCE', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'MATHEMATICS'),
(2, 'ENGLISH'),
(3, 'SOCIAL STUDIES'),
(4, 'RELIGION'),
(5, 'BUSINESS STUDIES'),
(6, 'COMPUTER STUDIES'),
(7, 'GEOGRAPHY'),
(8, 'BIOLOGY'),
(9, 'CHEMISTRY'),
(10, 'PHYSICS'),
(11, 'DATA PROCESSING'),
(12, 'FURTHER MATHS'),
(13, 'CIVIC EDUCATION'),
(14, 'HAUSA');

-- --------------------------------------------------------

--
-- Table structure for table `term_details`
--

CREATE TABLE `term_details` (
  `id` int(11) NOT NULL,
  `current_term` varchar(100) NOT NULL,
  `term_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term_details`
--

INSERT INTO `term_details` (`id`, `current_term`, `term_year`) VALUES
(1, 'first term', '2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psychomotor_records`
--
ALTER TABLE `psychomotor_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_details`
--
ALTER TABLE `term_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `psychomotor_records`
--
ALTER TABLE `psychomotor_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `term_details`
--
ALTER TABLE `term_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
