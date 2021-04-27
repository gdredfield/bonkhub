-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 02:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `usrname` varchar(50) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `activity`, `usrname`, `usr_id`, `date`) VALUES
(1, 'Forgot Password Attempt', 'kanchigai', 4, '2021-04-21 10:28:39'),
(5, 'Forgot Password Attempt', 'Bonkclub', 5, '2020-04-21 04:50:18'),
(8, 'Login', 'kanchigai', 4, '2020-04-21 05:22:45'),
(10, 'Logout', 'kanchigai', 4, '2020-04-21 05:23:48'),
(11, 'Login', 'ADMIN', 1, '2020-04-21 05:24:36'),
(36, 'Change Password', 'Elticol', 3, '2020-04-21 06:23:39'),
(37, 'Login', 'kanchigai', 4, '2020-04-21 06:28:22'),
(38, 'Logout', 'kanchigai', 4, '2020-04-21 06:28:45'),
(39, 'Forgot Password Attempt', 'kanchigai', 4, '2020-04-21 06:29:40'),
(40, 'Change Password', 'kanchigai', 4, '2020-04-21 06:31:35'),
(41, 'Login', 'ADMIN', 1, '2020-04-21 06:32:36'),
(42, 'Logout', 'ADMIN', 1, '2020-04-21 06:33:13'),
(43, 'Login', 'ADMIN', 1, '2020-04-21 06:34:37'),
(44, 'Logout', 'ADMIN', 1, '2020-04-21 06:34:40'),
(45, 'Login', 'ADMIN', 1, '2020-04-21 06:37:48'),
(46, 'Logout', 'ADMIN', 1, '2020-04-21 06:37:54'),
(47, 'Login', 'ADMIN', 1, '2020-04-21 06:38:24'),
(48, 'Logout', 'ADMIN', 1, '2020-04-21 06:38:26'),
(49, 'Login', 'ADMIN', 1, '2020-04-21 06:40:23'),
(50, 'Logout', 'ADMIN', 1, '2020-04-21 06:40:27'),
(51, 'Login', 'ADMIN', 1, '2020-04-21 06:40:55'),
(52, 'Logout', 'ADMIN', 1, '2020-04-21 06:43:08'),
(53, 'Login', 'ADMIN', 1, '2020-04-21 06:43:36'),
(54, 'Logout', 'ADMIN', 1, '2020-04-21 06:43:47'),
(55, 'Forgot Password Attempt', 'kanchigai', 4, '2020-04-21 06:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `auth_code`) VALUES
(1, 'ADMIN', 'ADMIN123', 'Ecchi@yahoo.com', 548623),
(2, 'Chikara', '123', 'Chikaratbu@yahoo.com', 930917),
(3, 'Elticol', '12345', 'Elticolonianism@gmail.com', 780032),
(4, 'kanchigai', '00001', 'misunderstand@yahoo.com', 586773),
(5, 'Bonkclub', '00000', 'Badonkers@rocketmail.com', 0),
(6, 'user', 'Userman11!', 'peopleuser@jkmail.com', 229008),
(7, 'userop', '1234567Aa!', 'useropjkl@gmail.com', 291764);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `usrname` (`usrname`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_log`
--
ALTER TABLE `event_log`
  ADD CONSTRAINT `userid` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `username` FOREIGN KEY (`usrname`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
