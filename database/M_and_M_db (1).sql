-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2025 at 08:37 AM
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
-- Database: `exp_db`
--
DROP DATABASE IF EXISTS `exp_db`;
CREATE DATABASE IF NOT EXISTS `exp_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `exp_db`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `id` int(11) NOT NULL,
  `Bookings_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`id`, `Bookings_name`) VALUES
(1, 'SQL Basics'),
(3, 'SQL Basics'),
(1, 'Data Science 101'),
(2, 'Ai Fundamentals'),
(3, ' Web Development\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `booking_orders`
--

CREATE TABLE `booking_orders` (
  `id` int(11) NOT NULL,
  `Customer` varchar(200) DEFAULT NULL,
  `Books` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_orders`
--

INSERT INTO `booking_orders` (`id`, `Customer`, `Books`) VALUES
(1, 'Maria', 'SQL Basics, Data Science 101'),
(2, 'Juan', 'Ai Fundamentals'),
(3, 'Ana', 'SQL Basics, Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `customerbookingsorder`
--

CREATE TABLE `customerbookingsorder` (
  `id` int(11) NOT NULL,
  `Customer_name` varchar(200) NOT NULL,
  `Bookings` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerbookingsorder`
--

INSERT INTO `customerbookingsorder` (`id`, `Customer_name`, `Bookings`) VALUES
(1, 'Maria', 'SQL Basic'),
(1, 'Maria', 'Data Science 101'),
(2, 'Juan', 'Ai Fundamentals'),
(3, 'Ana', 'SQL Basics'),
(3, 'Ana', 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `id` int(11) NOT NULL,
  `Customer_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`id`, `Customer_name`) VALUES
(1, 'Maria'),
(2, 'Juan'),
(3, 'Ana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD KEY `id` (`id`);

--
-- Indexes for table `booking_orders`
--
ALTER TABLE `booking_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerbookingsorder`
--
ALTER TABLE `customerbookingsorder`
  ADD KEY `id` (`id`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_orders`
--
ALTER TABLE `booking_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD CONSTRAINT `bookings_tb_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
