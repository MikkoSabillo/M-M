-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2025 at 07:55 AM
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
-- Database: `carwash`
--
DROP DATABASE IF EXISTS `carwash`;
CREATE DATABASE IF NOT EXISTS `carwash` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `carwash`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `svr_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `return_date` date DEFAULT NULL,
  `splash_theme` varchar(100) DEFAULT NULL,
  `emoji_feedback_enabled` tinyint(1) DEFAULT 1,
  `status` enum('Confirmed','Completed','Cancelled') DEFAULT 'Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`booking_id`, `user_id`, `vehicle_id`, `svr_id`, `booking_date`, `booking_time`, `return_date`, `splash_theme`, `emoji_feedback_enabled`, `status`) VALUES
(33, 35, 5, 3, '2025-09-17', '14:32:00', '2025-09-17', 'ABC Car Washing Point | ', 1, 'Completed'),
(34, 35, 5, 3, '2025-09-17', '15:09:00', '2025-09-17', 'ABC Car Washing Point | ', 1, 'Completed'),
(35, 35, 5, 3, '2025-09-17', '15:11:00', '2025-09-18', 'ABC Car Washing Point | ', 1, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `feedback_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `emoji_rating` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `mood_tag` varchar(30) DEFAULT NULL,
  `animated_reaction` tinyint(1) DEFAULT 1,
  `date_submitted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_tb`
--

CREATE TABLE `message_tb` (
  `Message_id` int(11) NOT NULL,
  `Message_user_id` int(11) DEFAULT NULL,
  `Message_date` datetime DEFAULT current_timestamp(),
  `Message` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_tb`
--

CREATE TABLE `payments_tb` (
  `payment_id` int(11) NOT NULL,
  `Payment_booking_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` enum('Cash','Card','GCash','PayPal') DEFAULT NULL,
  `is_confirmed` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_tb`
--

INSERT INTO `payments_tb` (`payment_id`, `Payment_booking_id`, `amount`, `payment_date`, `payment_method`, `is_confirmed`) VALUES
(24, 33, 30.00, '2025-09-17', 'GCash', '1'),
(25, 34, 30.00, '2025-09-17', 'Card', '1'),
(26, 35, 30.00, '2025-09-18', 'Cash', '1');

-- --------------------------------------------------------

--
-- Table structure for table `services_tb`
--

CREATE TABLE `services_tb` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tier` enum('Basic','Advance','Prime') DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `glow_effect` tinyint(1) DEFAULT 0,
  `animation_hint` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`service_id`, `service_name`, `description`, `tier`, `price`, `duration`, `glow_effect`, `animation_hint`) VALUES
(1, 'Basic Cleaning', 'Entry-level wash with essential cleaning', 'Basic', 10.99, '00:30:00', 0, 'fade-in'),
(2, 'Premium Cleaning', 'Advanced wash with extra care.', 'Advance', 20.00, '01:00:00', 1, 'slide-up'),
(3, 'Complex Cleaning', 'Full service with all features.', 'Prime', 30.00, '01:30:00', 1, 'bounce-in');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `feature_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `is_included` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_features`
--

INSERT INTO `service_features` (`feature_id`, `service_id`, `feature_name`, `is_included`) VALUES
(6, 1, 'Seats Washing', 1),
(7, 1, 'Vacuum Cleaning', 1),
(8, 1, 'Exterior Cleaning', 1),
(9, 1, 'Interior Wet Cleaning', 0),
(10, 1, 'Window Wiping', 0),
(11, 2, 'Seats Washing', 1),
(12, 2, 'Vacuum Cleaning', 1),
(13, 2, 'Exterior Cleaning', 1),
(14, 2, 'Interior Wet Cleaning', 1),
(15, 2, 'Window Wiping', 0),
(16, 3, 'Seats Washing', 1),
(17, 3, 'Vacuum Cleaning', 1),
(18, 3, 'Exterior Cleaning', 1),
(19, 3, 'Interior Wet Cleaning', 1),
(20, 3, 'Window Wiping', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `preferred_contact` enum('Phone','Email','SMS') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `username`, `password`, `profile_pic`, `first_name`, `last_name`, `nickname`, `gender`, `phone`, `email`, `preferred_contact`, `address`, `city`, `state`, `zip_code`, `created_at`, `role`) VALUES
(31, 'admin', '$2y$10$AMOTym3E1OlzoGpxyCLvken8Zut/cm.9YCpLKYmep5bqqjLkY6qNq', '../images/Screenshot 2025-07-04 135100.png', 'Mikko', 'Sabillo', 'mik', 'Male', '09685690087', 'kwjfasLJK@GAMIL.COM', 'Phone', 'admin', 'Tacloban', 'Eastern Visayas', '6500', '2025-09-10 01:14:20', 'customer'),
(32, 'death', '$2y$10$W8eipyHXagraCOaQS1ZXYu.lblA5bXpB7x/pEQm56xN/Kx5gwsbi.', '../images/Screenshot 2025-07-11 145217.png', 'Mikko', 'Sabillo', 'mik', 'Male', '09685690087', 'gggg@gamil.com', 'Phone', 'death', 'Tacloban', 'Eastern Visayas', '6500', '2025-09-10 02:59:45', 'admin'),
(35, 'garf1707', '$2y$10$bF/tseS/SgxjgIDWtTpJ1uPjNrDMfhl3aM0Rq16NsshOqH2aVP9GW', '../images/Screenshot 2025-01-13 102335.png', 'Micky', 'Jabiñar', 'Micky', 'Female', '09685690087', 'example@gmail.com', 'Phone', 'Micky', 'tacloban', 'Eastern Visayas', '6500', '2025-09-15 02:45:34', 'customer'),
(36, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-16 00:41:33', 'customer'),
(37, 'shadow', '$2y$10$YlvY/oPEuaVJbL4B8iL88OeLT20A/h.4u4AeguXG.kR5L3PaUcdcC', '../images/Screenshot 2025-09-15 085517.png', 'Mikko', 'Sabillo', 'Miks', 'Male', '09685690087', 'mickyjabinar0@gmail.com', 'Email', 'Brgy. Uyawan Carigara leyte', '', 'Eastern Visayas', '6500', '2025-09-16 03:44:31', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_tb`
--

CREATE TABLE `vehicles_tb` (
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `license_plate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles_tb`
--

INSERT INTO `vehicles_tb` (`vehicle_id`, `user_id`, `make`, `model`, `year`, `license_plate`) VALUES
(1, 31, 'Toyota', 'Vios', '2019', 'ABC-1234'),
(2, 31, 'Honda', 'Civic', '2021', 'XYZ-5678'),
(3, 3, 'Mitsubishi', 'Montero', '2020', 'LMN-2468'),
(5, 0, 'no regesterd vehicle yet', '', '0000', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_booking_user` (`user_id`),
  ADD KEY `fk_booking_service` (`svr_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `message_tb`
--
ALTER TABLE `message_tb`
  ADD PRIMARY KEY (`Message_id`),
  ADD KEY `Message_user_id` (`Message_user_id`);

--
-- Indexes for table `payments_tb`
--
ALTER TABLE `payments_tb`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `Payment_booking_id` (`Payment_booking_id`);

--
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`feature_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicles_tb`
--
ALTER TABLE `vehicles_tb`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD UNIQUE KEY `license_plate` (`license_plate`),
  ADD KEY `fk_vehicle_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_tb`
--
ALTER TABLE `message_tb`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_tb`
--
ALTER TABLE `payments_tb`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vehicles_tb`
--
ALTER TABLE `vehicles_tb`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD CONSTRAINT `fk_booking_service` FOREIGN KEY (`svr_id`) REFERENCES `services_tb` (`service_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booking_user` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD CONSTRAINT `feedback_tb_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings_tb` (`booking_id`);

--
-- Constraints for table `payments_tb`
--
ALTER TABLE `payments_tb`
  ADD CONSTRAINT `payments_tb_ibfk_1` FOREIGN KEY (`Payment_booking_id`) REFERENCES `bookings_tb` (`booking_id`) ON UPDATE CASCADE;

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicles_tb`
--
ALTER TABLE `vehicles_tb`
  ADD CONSTRAINT `fk_vehicle_user` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
