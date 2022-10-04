-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 09:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `final_decision`
--

CREATE TABLE `final_decision` (
  `id` int(11) NOT NULL,
  `pre_decision_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `pdf` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pre_decision`
--

CREATE TABLE `pre_decision` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(250) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name_ar` text DEFAULT NULL,
  `name_eng` varchar(100) DEFAULT NULL,
  `social_id` bigint(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `shoaba` varchar(10) DEFAULT NULL,
  `schoolType` varchar(15) DEFAULT NULL,
  `schoolName` text DEFAULT NULL,
  `student_phone` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `fatherPhone` varchar(11) DEFAULT NULL,
  `firstLanguage` varchar(10) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `eng1` float DEFAULT NULL,
  `finalTotal` float DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_requirments`
--

CREATE TABLE `student_requirments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `raghba_1` int(11) DEFAULT NULL,
  `raghba_2` int(11) DEFAULT NULL,
  `raghba_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `theem`
--

CREATE TABLE `theem` (
  `id` int(11) NOT NULL,
  `them` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `remeber_token` varchar(100) DEFAULT NULL,
  `theem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_decision`
--
ALTER TABLE `final_decision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `pre_decision_id` (`pre_decision_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_decision`
--
ALTER TABLE `pre_decision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requirments`
--
ALTER TABLE `student_requirments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `raghba_1` (`raghba_1`),
  ADD KEY `raghba_2` (`raghba_2`),
  ADD KEY `raghba_3` (`raghba_3`);

--
-- Indexes for table `theem`
--
ALTER TABLE `theem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `final_decision`
--
ALTER TABLE `final_decision`
  ADD CONSTRAINT `final_decision_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `final_decision_ibfk_2` FOREIGN KEY (`pre_decision_id`) REFERENCES `pre_decision` (`id`);

--
-- Constraints for table `pre_decision`
--
ALTER TABLE `pre_decision`
  ADD CONSTRAINT `pre_decision_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `student_requirments`
--
ALTER TABLE `student_requirments`
  ADD CONSTRAINT `student_requirments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_requirments_ibfk_2` FOREIGN KEY (`raghba_1`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `student_requirments_ibfk_3` FOREIGN KEY (`raghba_2`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `student_requirments_ibfk_4` FOREIGN KEY (`raghba_3`) REFERENCES `programs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
