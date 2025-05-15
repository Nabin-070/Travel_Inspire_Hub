-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 02:41 PM
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
-- Database: `travel_inspire_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `travel_date` date NOT NULL,
  `persons` int(11) NOT NULL DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `package_id`, `booking_date`, `travel_date`, `persons`, `total_price`, `status`) VALUES
(1, 4, 1, '2025-05-14 09:29:12', '2025-05-17', 3, 3600.00, 'confirmed'),
(3, 3, 2, '2025-05-14 09:33:06', '2025-05-22', 5, 7500.00, 'confirmed'),
(4, 4, 1, '2025-05-14 10:44:42', '2025-06-14', 1, 1200.00, 'pending'),
(5, 5, 1, '2025-05-14 12:02:20', '2025-05-30', 6, 7200.00, 'confirmed'),
(6, 6, 3, '2025-05-14 17:30:04', '2025-05-22', 8, 7200.00, 'confirmed'),
(7, 3, 1, '2025-05-15 11:06:50', '2025-05-16', 1, 1200.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `service`, `message`, `created_at`) VALUES
(6, 'Ayesa', 'ayesa@gmail.com', '0198276366', 'Flight Booking', 'please confirm it.', '2025-05-15 12:09:36'),
(7, 'xyz', 'xyz@yahoo.com', '01425626788920', 'Visa Assistance', 'check it.', '2025-05-15 12:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`, `duration`, `image_url`, `created_at`) VALUES
(1, 'Paris Getaway', '5-day tour of Paris including Eiffel Tower ', 1200.00, 5, 'http://localhost/project/images/Paris_Getaway.jpg', '2025-05-14 09:17:52'),
(2, 'Beach Paradise', '7-day relaxing beach vacation in Bali', 1500.00, 7, 'http://localhost/project/images/Beach_Paradise.png', '2025-05-14 09:17:52'),
(3, 'Mountain Adventure', '4-day hiking trip in the Swiss Alps', 900.00, 4, 'http://localhost/project/images/Mountain_Adventure.jpg', '2025-05-14 09:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT '',
  `user_role` varchar(20) DEFAULT 'user',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `user_role`, `first_name`, `last_name`, `email`, `phone`, `password`, `created_at`, `role`) VALUES
(3, NULL, NULL, 'user', 'Tanim', 'Hossain ', 'tanim@gmail.com', '01746446237', '$2y$10$lu.WCVIeW8YdeEih3Lg2o.so5pi1dh3cMbLROuNX0tRLItaBwFHx2', '2025-05-14 08:21:37', 'user'),
(4, NULL, NULL, 'user', 'DD', 'ds', 'd@gmail.com', '01722127848', '$2y$10$UuPY0cGa.idD8hfWgjhFc.czYFxM9RtI8SXp0ITLgFIn3DitJu0bi', '2025-05-14 09:15:27', 'user'),
(5, NULL, NULL, 'user', 'Zahidul Islam', 'Nabin', 'nabin@gmail.com', '01617197575', '$2y$10$0HDIQlYmssVmm6E591yjHO8S9KxTxNsB6XuIr5vZL0/p6FySZb60y', '2025-05-14 12:02:02', 'admin'),
(6, NULL, NULL, 'user', 'Touhidul Islam', 'Nahid', 'nahid@gmail.com', '01752264880', '$2y$10$lN7/PHamfJjy7/DzaqIetOtPYvwvfCLhMsrzZjKT4FRnAqk6AraBq', '2025-05-14 17:29:31', 'user'),
(7, NULL, NULL, 'user', 'j', 'Nabin', 'jn@gmail.com', '12481789340681', '$2y$10$Gb58KqWKk0JRnpebgdQ0r.yNuYoPEooLtcshniDE5eC9fmpgTcUhm', '2025-05-15 03:45:42', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
