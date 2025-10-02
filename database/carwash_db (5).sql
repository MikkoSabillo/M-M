-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2025 at 02:35 AM
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
(35, 35, 5, 3, '2025-09-17', '15:11:00', '2025-09-18', 'ABC Car Washing Point | ', 1, 'Completed'),
(36, 31, 1, 2, '2025-09-19', '10:46:00', '2025-09-19', 'Poto\'s War Wash | ', 1, 'Completed'),
(37, 35, 5, 2, '2025-09-19', '11:32:00', '2025-09-19', 'Cielo Car Washing Point | ', 1, 'Completed'),
(38, 37, 5, 2, '2025-09-22', '10:10:00', '2025-09-22', 'Matrix Car Washing Point | ', 1, 'Completed'),
(39, 37, 5, 3, '2025-09-22', '10:22:00', '2025-09-22', 'Matrix Car Washing Point | ', 1, 'Completed'),
(40, 37, 5, 3, '2025-09-22', '10:40:00', '2025-09-23', 'Cielo Car Washing Point | ', 1, 'Completed'),
(45, 37, 5, 3, '2025-09-24', '10:37:00', '2025-09-24', 'Matrix Car Washing Point | ', 1, 'Completed'),
(48, 31, 2, 3, '2025-09-29', '08:30:00', '2025-09-29', 'Poto\'s War Wash | ', 1, 'Completed'),
(49, 37, 8, 2, '2025-09-30', '13:17:00', '2025-09-30', 'Matrix Car Washing Point | ', 1, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_tb`
--

CREATE TABLE `carousel_tb` (
  `id` int(11) NOT NULL,
  `carousel_img` varchar(10000) DEFAULT NULL,
  `carousel_title` varchar(255) DEFAULT NULL,
  `carousel_desc` varchar(500) DEFAULT NULL,
  `carousel_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel_tb`
--

INSERT INTO `carousel_tb` (`id`, `carousel_img`, `carousel_title`, `carousel_desc`, `carousel_time`) VALUES
(1, 'https://lirp.cdn-website.com/263ba0d9/dms3rep/multi/opt/car+wash-640w.jpg', 'Interior Wet Cleaning', 'Deep-cleaning of interior surfaces using safe, moisture-based techniques to lift stains from dashboards, door panels, and upholstery.', '2025-09-23 16:39:00'),
(2, 'https://www.drbeasleys.com/wp-content/uploads/2023/04/Washing-Rivian-R1S-Section-BG-2-e1738616923513-1400x789.jpg', 'Premium Cleaning', 'Advanced wash with extra care.\r\n\r\n\r\n\r\n', '2025-09-23 16:39:00'),
(3, 'https://www.convoyhandcarwash.com/wp-content/uploads/2023/04/Seats-Shampoo.jpg', 'Exterior Cleaning', 'Gentle yet effective wash of the car body, wheels, and trim—restoring shine and removing dirt, mud, and road residue.', '2025-09-23 16:39:00');

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
  `Message` varchar(1000) DEFAULT NULL,
  `Subject` varchar(1000) DEFAULT NULL,
  `Username` varchar(250) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_tb`
--

INSERT INTO `message_tb` (`Message_id`, `Message`, `Subject`, `Username`, `Email`, `Time`) VALUES
(5, 'fanal na po', 'carwash', 'garf1707', 'example@gmail.com', '2025-09-23'),
(6, 'asfasfasfas', 'carwash', '', 'kwjfasLJK@GAMIL.COM', '2025-09-23'),
(7, 'Sdafsfasf', 'carwash', 'shadow', 'mickyjabinar0@gmail.com', '2025-09-23'),
(8, 'asfasfaf', 'carwash', '', 'example@gmail.com', '2025-09-23'),
(9, 'ewan!!', 'carwash', '', 'mickyjabinar0@gmail.com', '2025-09-24'),
(10, 'big problem\r\n', 'carwash', 'shadow', 'mickyjabinar0@gmail.com', '2025-10-01'),
(11, 'why? i can\'t login??', 'carwash', '', 'gggg@gamil.com', '2025-10-02');

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
(26, 35, 30.00, '2025-09-18', 'Cash', '1'),
(27, 36, 20.00, '2025-09-19', 'PayPal', '1'),
(28, 37, 20.00, '2025-09-19', 'Cash', '1'),
(29, 38, 20.00, '2025-09-22', 'Card', '1'),
(30, 39, 30.00, '2025-09-22', 'GCash', '1'),
(31, 40, 30.00, '2025-09-23', 'GCash', '1'),
(32, 45, 30.00, '2025-09-24', 'GCash', '1'),
(33, 48, 350.00, '2025-09-29', 'GCash', '1'),
(34, 49, 200.00, '2025-09-30', 'GCash', '1');

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
(1, 'Basic Cleaning ', 'Entry-level wash with essential cleaning', 'Basic', 100.99, '00:30:00', 0, 'fade-in'),
(2, 'Premium Cleaning', 'Advanced wash with extra care.', 'Advance', 200.00, '01:00:00', 1, 'slide-up'),
(3, 'Complex Cleaning', 'Full service with all features.', 'Prime', 300.00, '01:30:00', 1, 'bounce-in');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `feature_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `Description_tb` varchar(1000) DEFAULT NULL,
  `is_included` tinyint(1) DEFAULT 1,
  `Timeup` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_features`
--

INSERT INTO `service_features` (`feature_id`, `service_id`, `feature_name`, `Description_tb`, `is_included`, `Timeup`) VALUES
(6, 1, 'Seats Washing', 'Thorough cleaning of fabric or leather seats to remove stains, odors, and built-up grime—leaving them fresh, sanitized, and showroom-ready.', 1, '2025-09-23 15:31:00'),
(7, 1, 'Vacuum Cleaning', 'High-powered vacuuming of carpets, mats, and seat crevices to eliminate dust, crumbs, and hidden debris for a spotless interior.', 1, '2025-09-22 08:43:00'),
(8, 1, 'Exterior Cleaning', 'Gentle yet effective wash of the car body, wheels, and trim—restoring shine and removing dirt, mud, and road residue.', 1, '2025-09-19 13:56:09'),
(9, 1, 'Interior Cleaning', 'Deep-cleaning of interior surfaces using safe, moisture-based techniques to lift stains from dashboards, door panels, and upholstery.', 0, '2025-09-24 12:54:00'),
(10, 1, 'Window Wiping', 'Crystal-clear finish for all windows and mirrors—removing smudges, fingerprints, and haze for perfect visibility inside and out.', 0, '2025-09-19 13:56:09'),
(11, 2, 'Seats Washing', 'Thorough cleaning of fabric or leather seats to remove stains, odors, and built-up grime—leaving them fresh, sanitized, and showroom-ready.', 1, '2025-09-24 12:51:00'),
(12, 2, 'Vacuum Cleaning', 'High-powered vacuuming of carpets, mats, and seat crevices to eliminate dust, crumbs, and hidden debris for a spotless interior.', 1, '2025-09-24 12:48:00'),
(13, 2, 'Exterior Cleaning', 'Gentle yet effective wash of the car body, wheels, and trim—restoring shine and removing dirt, mud, and road residue.', 1, '2025-09-24 12:49:00'),
(14, 2, 'Interior Cleaning', 'Deep-cleaning of interior surfaces using safe, moisture-based techniques to lift stains from dashboards, door panels, and upholstery.', 1, '2025-09-24 12:54:00'),
(15, 2, 'Window Wiping', 'Crystal-clear finish for all windows and mirrors—removing smudges, fingerprints, and haze for perfect visibility inside and out.', 0, '2025-09-24 12:49:00'),
(16, 3, 'Seats Washing', 'Thorough cleaning of fabric or leather seats to remove stains, odors, and built-up grime—leaving them fresh, sanitized, and showroom-ready.', 1, '2025-09-24 12:52:00'),
(17, 3, 'Vacuum Cleaning', 'High-powered vacuuming of carpets, mats, and seat crevices to eliminate dust, crumbs, and hidden debris for a spotless interior.', 1, '2025-09-24 12:50:00'),
(18, 3, 'Exterior Cleaning', 'Gentle yet effective wash of the car body, wheels, and trim—restoring shine and removing dirt, mud, and road residue.', 1, '2025-09-24 12:50:00'),
(19, 3, 'Interior Cleaning', 'Deep-cleaning of interior surfaces using safe, moisture-based techniques to lift stains from dashboards, door panels, and upholstery.', 1, '2025-09-24 12:54:00'),
(20, 3, 'Window Wiping', 'Crystal-clear finish for all windows and mirrors—removing smudges, fingerprints, and haze for perfect visibility inside and out.', 1, '2025-09-24 12:51:00');

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
(31, 'mikko', '$2y$10$AMOTym3E1OlzoGpxyCLvken8Zut/cm.9YCpLKYmep5bqqjLkY6qNq', '../images/OIP.webp', 'Mikko', 'Sabillo', 'mik', 'Male', '09685690087', 'kwjfasLJK@GAMIL.COM', 'Phone', 'admin', 'Tacloban ', 'Eastern Visayas ', '6500', '2025-09-10 01:14:20', 'customer'),
(32, 'death', '$2y$10$W8eipyHXagraCOaQS1ZXYu.lblA5bXpB7x/pEQm56xN/Kx5gwsbi.', '../images/Screenshot 2025-07-11 145217.png', 'Mikko', 'Sabillo', 'mik', 'Male', '09685690087', 'gggg@gamil.com', 'Phone', 'death', 'Tacloban', 'Eastern Visayas', '6500', '2025-09-10 02:59:45', 'admin'),
(35, 'garf1707', '$2y$10$bF/tseS/SgxjgIDWtTpJ1uPjNrDMfhl3aM0Rq16NsshOqH2aVP9GW', '../images/445408349_1620315428753964_4331965025279243908_n.jpg', 'Micky', 'Jabiñar', 'Micky', 'Female', '09685690087', 'example@gmail.com', 'Phone', 'Micky', 'tacloban  ', 'Eastern Visayas  ', '6500', '2025-09-15 02:45:34', 'customer'),
(36, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-16 00:41:33', 'customer'),
(37, 'shadow', '$2y$10$YlvY/oPEuaVJbL4B8iL88OeLT20A/h.4u4AeguXG.kR5L3PaUcdcC', '../images/445408349_1620315428753964_4331965025279243908_n.jpg', 'Mikko ', 'Sabillo', 'Miks', 'Male', '09685690087', 'example@gmail.com', 'Email', 'Brgy. Uyawan Carigara leyte', '             ', 'Eastern Visayas             ', '6500', '2025-09-16 03:44:31', 'customer');

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
(5, 0, 'no registered vehicle yet', '', '0000', ''),
(8, 37, 'Toyota', 'Vios', '2025', 'ABC-4321'),
(9, 35, 'Toyota', 'Vios', '2025', 'ABC-9876');

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
-- Indexes for table `carousel_tb`
--
ALTER TABLE `carousel_tb`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`Message_id`);

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `carousel_tb`
--
ALTER TABLE `carousel_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_tb`
--
ALTER TABLE `message_tb`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments_tb`
--
ALTER TABLE `payments_tb`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD CONSTRAINT `bookings_tb_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles_tb` (`vehicle_id`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `service_features_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services_tb` (`service_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
