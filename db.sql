-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2025 at 10:16 AM
-- Server version: 8.0.43-0ubuntu0.24.04.1
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`) VALUES
(1, 'ahmed ali', 10000),
(2, 'samy ibrahim', 12000),
(3, 'adel ibrahem', 11000),
(4, 'tamer mahnoud', 9000),
(5, 'radwan ahmed', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `moduls`
--

CREATE TABLE `moduls` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moduls`
--

INSERT INTO `moduls` (`id`, `name`) VALUES
(1, 'analysis'),
(2, 'Design'),
(3, 'Development'),
(4, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`) VALUES
(1, 'web site'),
(2, 'deleivry app '),
(3, 'erp system '),
(4, 'shiping app ');

-- --------------------------------------------------------

--
-- Table structure for table `work_times`
--

CREATE TABLE `work_times` (
  `id` bigint NOT NULL,
  `date` date NOT NULL,
  `hours` double NOT NULL,
  `emp_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `modul_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_times`
--

INSERT INTO `work_times` (`id`, `date`, `hours`, `emp_id`, `project_id`, `modul_id`) VALUES
(1, '2025-10-05', 2, 3, 2, 1),
(2, '2025-10-05', 3, 3, 3, 4),
(3, '2025-10-05', 2, 3, 2, 1),
(4, '2025-10-05', 3, 3, 3, 4),
(5, '2025-10-01', 4.5, 1, 2, 3),
(6, '2025-10-01', 7, 2, 1, 4),
(7, '2025-10-02', 6.2, 3, 3, 2),
(8, '2025-10-02', 3.8, 4, 2, 1),
(9, '2025-10-03', 5.7, 5, 4, 2),
(10, '2025-10-03', 2, 1, 3, 1),
(11, '2025-10-04', 8, 2, 2, 4),
(12, '2025-10-04', 4.2, 3, 1, 3),
(13, '2025-10-05', 6.5, 4, 4, 2),
(14, '2025-10-05', 1.5, 5, 2, 3),
(15, '2025-10-06', 7.8, 1, 1, 4),
(16, '2025-10-06', 5, 2, 4, 2),
(17, '2025-10-07', 3.3, 3, 2, 1),
(18, '2025-10-07', 8, 4, 3, 3),
(19, '2025-10-08', 2.7, 5, 1, 2),
(20, '2025-10-08', 6.9, 1, 4, 3),
(21, '2025-10-09', 4, 2, 2, 1),
(22, '2025-10-09', 7.5, 3, 3, 4),
(23, '2025-10-10', 1.8, 4, 1, 2),
(24, '2025-10-10', 5.6, 5, 4, 1),
(25, '2025-10-11', 3.5, 1, 3, 2),
(26, '2025-10-11', 7.9, 2, 4, 1),
(27, '2025-10-12', 6, 3, 2, 4),
(28, '2025-10-12', 2.4, 4, 1, 3),
(29, '2025-10-12', 8, 5, 3, 2),
(30, '2025-10-13', 5.1, 1, 2, 4),
(31, '2025-10-13', 1.9, 2, 3, 2),
(32, '2025-10-14', 6.7, 3, 4, 1),
(33, '2025-10-14', 4.3, 4, 2, 3),
(34, '2025-10-14', 7.2, 5, 1, 4),
(35, '2025-10-15', 2.5, 1, 4, 2),
(36, '2025-10-15', 3.9, 2, 2, 3),
(37, '2025-10-16', 8, 3, 1, 1),
(38, '2025-10-16', 5.4, 4, 3, 4),
(39, '2025-10-16', 6.8, 5, 4, 2),
(40, '2025-10-17', 1.7, 1, 1, 3),
(41, '2025-10-17', 7.4, 2, 3, 4),
(42, '2025-10-18', 3, 3, 2, 2),
(43, '2025-10-18', 6.2, 4, 1, 4),
(44, '2025-10-18', 4.6, 5, 2, 1),
(45, '2025-10-19', 7.8, 1, 3, 2),
(46, '2025-10-19', 2.1, 2, 4, 3),
(47, '2025-10-20', 5.9, 3, 2, 4),
(48, '2025-10-20', 3.2, 4, 1, 2),
(49, '2025-10-20', 8, 5, 3, 1),
(50, '2025-10-21', 6.6, 1, 4, 2),
(51, '2025-10-21', 4, 2, 2, 4),
(52, '2025-10-22', 7.3, 3, 1, 3),
(53, '2025-10-22', 2.8, 4, 3, 2),
(54, '2025-10-22', 5, 5, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_times`
--
ALTER TABLE `work_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `modul_id` (`modul_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_times`
--
ALTER TABLE `work_times`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work_times`
--
ALTER TABLE `work_times`
  ADD CONSTRAINT `work_times_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_times_ibfk_2` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_times_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
