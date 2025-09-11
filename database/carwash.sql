-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2025 at 08:30 AM
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
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `splash_theme` varchar(50) DEFAULT NULL,
  `emoji_feedback_enabled` tinyint(1) DEFAULT 1,
  `status` enum('Pending','Confirmed','Completed','Cancelled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`booking_id`, `user_id`, `vehicle_id`, `booking_date`, `booking_time`, `return_date`, `splash_theme`, `emoji_feedback_enabled`, `status`) VALUES
(21, 1, 1, '2025-09-03', '15:13:00', '2025-09-03', 'sunrise-glow', 1, 'Pending'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `booking_services_tb`
--

CREATE TABLE `booking_services_tb` (
  `booking_service_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `glow_level` int(11) DEFAULT 0,
  `interactive_feedback` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_services_tb`
--

INSERT INTO `booking_services_tb` (`booking_service_id`, `booking_id`, `service_id`, `quantity`, `glow_level`, `interactive_feedback`) VALUES
(14, 24, NULL, 1, 3, 1);

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

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`feedback_id`, `booking_id`, `emoji_rating`, `comments`, `mood_tag`, `animated_reaction`, `date_submitted`) VALUES
(1, 1, '🌟🌟🌟🌟🌟', 'Super clean and shiny! Loved the glow effect!', 'happy', 1, '2025-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `payments_tb`
--

CREATE TABLE `payments_tb` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` enum('Cash','Card','GCash','PayPal') DEFAULT NULL,
  `payment_emoji` varchar(10) DEFAULT NULL,
  `is_confirmed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_tb`
--

INSERT INTO `payments_tb` (`payment_id`, `booking_id`, `amount`, `payment_date`, `payment_method`, `payment_emoji`, `is_confirmed`) VALUES
(1, 1, 899.00, '2025-09-05', 'GCash', '💸', 1);

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
(1, 'exterior hand wash', 'Exterior hand wash with rinse and dry', 'Basic', 150.00, '00:30:00', 0, 'fade-in'),
(2, 'Interior Clean', 'Vacuum, dashboard wipe, and window polish', 'Advance', 350.00, '01:00:00', 1, 'slide-up'),
(3, 'Wax & Polish', 'Hand wax with full-body polish and tire shine', 'Prime', 899.00, '01:30:00', 1, 'bounce-in'),
(4, 'Full Detailing', 'Complete interior and exterior detailing with engine bay clean', 'Prime', 1500.00, '02:00:00', 1, 'zoom-in');

-- --------------------------------------------------------

--
-- Table structure for table `service_assignments_tb`
--

CREATE TABLE `service_assignments_tb` (
  `assignment_id` int(11) NOT NULL,
  `booking_service_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `urgency_level` enum('Low','Medium','High') DEFAULT NULL,
  `assignment_emoji` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_tb`
--

CREATE TABLE `staff_tb` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `specialty_tags` varchar(100) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_tb`
--

INSERT INTO `staff_tb` (`staff_id`, `first_name`, `last_name`, `avatar`, `phone`, `position`, `specialty_tags`, `is_available`) VALUES
(1, 'Jake', 'Reyes', 'uploads/jake.png', '09181234567', 'Detailing Specialist', 'waxing, polishing, glow', 1);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `username`, `password`, `profile_pic`, `first_name`, `last_name`, `nickname`, `gender`, `phone`, `email`, `preferred_contact`, `address`, `city`, `state`, `zip_code`, `created_at`) VALUES
(31, 'admin', '$2y$10$AMOTym3E1OlzoGpxyCLvken8Zut/cm.9YCpLKYmep5bqqjLkY6qNq', '../images/Screenshot 2025-07-04 135100.png', 'Mikko', 'Sabillo', 'mik', 'Male', '09685690087', 'kwjfasLJK@GAMIL.COM', 'Phone', 'admin', 'Tacloban', 'Eastern Visayas', '6500', '2025-09-10 01:14:20'),
(32, 'death', '$2y$10$W8eipyHXagraCOaQS1ZXYu.lblA5bXpB7x/pEQm56xN/Kx5gwsbi.', '../images/Screenshot 2025-07-11 145217.png', 'Mikko', 'Sabillo', 'mik', 'Male', '09685690087', 'gggg@gamil.com', 'Phone', 'death', 'Tacloban', 'Eastern Visayas', '6500', '2025-09-10 02:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_tb`
--

CREATE TABLE `vehicles_tb` (
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plate_no` varchar(20) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `fuel_type` enum('Gasoline','Diesel','Electric','Hybrid') DEFAULT NULL,
  `emoji_tag` varchar(10) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles_tb`
--

INSERT INTO `vehicles_tb` (`vehicle_id`, `user_id`, `plate_no`, `make`, `model`, `year`, `color`, `fuel_type`, `emoji_tag`, `notes`) VALUES
(1, 1, 'ABC-1234', 'Toyota', 'Vios', 2020, 'Pearl White', 'Gasoline', '🚗', 'Daily driver with ceramic coating');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `booking_services_tb`
--
ALTER TABLE `booking_services_tb`
  ADD PRIMARY KEY (`booking_service_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `payments_tb`
--
ALTER TABLE `payments_tb`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_assignments_tb`
--
ALTER TABLE `service_assignments_tb`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `booking_service_id` (`booking_service_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_tb`
--
ALTER TABLE `staff_tb`
  ADD PRIMARY KEY (`staff_id`);

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
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `booking_services_tb`
--
ALTER TABLE `booking_services_tb`
  MODIFY `booking_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments_tb`
--
ALTER TABLE `payments_tb`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_assignments_tb`
--
ALTER TABLE `service_assignments_tb`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `staff_tb`
--
ALTER TABLE `staff_tb`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vehicles_tb`
--
ALTER TABLE `vehicles_tb`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD CONSTRAINT `bookings_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`),
  ADD CONSTRAINT `bookings_tb_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles_tb` (`vehicle_id`);

--
-- Constraints for table `booking_services_tb`
--
ALTER TABLE `booking_services_tb`
  ADD CONSTRAINT `booking_services_tb_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings_tb` (`booking_id`),
  ADD CONSTRAINT `booking_services_tb_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services_tb` (`service_id`);

--
-- Constraints for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD CONSTRAINT `feedback_tb_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings_tb` (`booking_id`);

--
-- Constraints for table `payments_tb`
--
ALTER TABLE `payments_tb`
  ADD CONSTRAINT `payments_tb_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings_tb` (`booking_id`);

--
-- Constraints for table `service_assignments_tb`
--
ALTER TABLE `service_assignments_tb`
  ADD CONSTRAINT `service_assignments_tb_ibfk_1` FOREIGN KEY (`booking_service_id`) REFERENCES `booking_services_tb` (`booking_service_id`),
  ADD CONSTRAINT `service_assignments_tb_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff_tb` (`staff_id`);

--
-- Constraints for table `vehicles_tb`
--
ALTER TABLE `vehicles_tb`
  ADD CONSTRAINT `vehicles_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
