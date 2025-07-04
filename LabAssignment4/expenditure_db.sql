-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2025 at 03:06 PM
-- Server version: 9.2.0
-- PHP Version: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expenditure_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `domestic_visitors`
--

CREATE TABLE `domestic_visitors` (
  `id` int NOT NULL,
  `component` varchar(100) DEFAULT NULL,
  `expenditure_2010` int DEFAULT NULL,
  `expenditure_2011` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `domestic_visitors`
--

INSERT INTO `domestic_visitors` (`id`, `component`, `expenditure_2010`, `expenditure_2011`) VALUES
(1, 'Shopping', 8914, 13149),
(2, 'Transport', 8098, 10019),
(3, 'Food & beverages', 7975, 9691),
(4, 'Accommodation', 6130, 5028),
(5, 'Expenditure before trip/tickets', 894, 1097),
(6, 'Other activities', 2667, 3362);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domestic_visitors`
--
ALTER TABLE `domestic_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domestic_visitors`
--
ALTER TABLE `domestic_visitors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
