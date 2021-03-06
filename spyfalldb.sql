-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 01:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spyfalldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `r_id` int(100) NOT NULL,
  `guest_uid` int(100) NOT NULL,
  `roles_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `click`
--

CREATE TABLE `click` (
  `r_id` int(100) NOT NULL,
  `host_uid` int(100) NOT NULL,
  `clicked` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostjguest`
--

CREATE TABLE `hostjguest` (
  `r_id` int(100) NOT NULL,
  `host_uid` int(100) NOT NULL,
  `guest_uid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locationjroom`
--

CREATE TABLE `locationjroom` (
  `r_id` int(100) NOT NULL,
  `l_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `l_id` int(100) NOT NULL,
  `l_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`l_id`, `l_name`) VALUES
(1, 'Beach'),
(2, 'Ship'),
(3, 'Bank'),
(4, 'Hotel'),
(5, 'Restaurant'),
(6, 'Hospital'),
(7, 'School'),
(8, 'University'),
(9, 'Airplane'),
(10, 'Train'),
(11, 'Movie Theatre'),
(12, 'Space Station'),
(13, 'Police Station'),
(14, 'Supermarket'),
(15, 'Circus');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `l_id` int(100) NOT NULL,
  `roles_name` varchar(100) NOT NULL,
  `roles_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`l_id`, `roles_name`, `roles_number`) VALUES
(1, 'Spy', 1),
(1, 'Life Guard', 2),
(1, 'Icecream Vendor', 3),
(1, 'Surfer', 4),
(1, 'Child', 5),
(1, 'Tourist', 6),
(2, 'Spy', 6),
(2, 'Captain', 5),
(2, 'First mate', 4),
(2, 'VIP', 3),
(2, 'Passenger', 2),
(2, 'Medical Purser', 1),
(3, 'Spy', 4),
(3, 'Security Guard', 3),
(3, 'Robber', 2),
(3, 'Manager', 5),
(3, 'Customer', 6),
(3, 'Consultant', 1),
(4, 'Spy', 5),
(4, 'Receptionist ', 3),
(4, 'Room service', 2),
(4, 'Manager', 4),
(4, 'Customer', 6),
(4, 'Head Chef', 1),
(5, 'Spy', 1),
(5, 'Waiter', 5),
(5, 'Security Guard', 4),
(5, 'Manager', 3),
(5, 'Chef', 2),
(5, 'Customer', 6),
(6, 'Spy', 6),
(6, 'Doctor', 2),
(6, 'Nurse', 1),
(6, 'Patient', 5),
(6, 'Receptionist', 4),
(6, 'Intern Doctor', 3),
(7, 'Spy', 2),
(7, 'Teacher', 4),
(7, 'Student', 6),
(7, 'Headmaster', 1),
(7, 'Janitor', 3),
(7, 'Librarian', 5),
(8, 'Student', 2),
(8, 'Spy', 5),
(8, 'Professor ', 3),
(8, 'Teaching Assistant ', 1),
(8, 'VC', 4),
(8, 'Club Member', 6),
(9, 'Pilot', 1),
(9, 'Spy', 4),
(9, 'Co Pilot ', 3),
(9, 'Air Hostess', 5),
(9, 'Passenger', 6),
(9, 'Passenger', 2),
(10, 'Spy', 2),
(10, 'Passenger', 5),
(10, 'Ticket Checker ', 3),
(10, 'Driver', 1),
(10, 'Hawker', 4),
(10, 'Mechanic', 6),
(11, 'Spy', 2),
(11, 'Usher', 3),
(11, 'Ticket Seller', 6),
(11, 'Manager', 4),
(11, 'Projectionist', 1),
(11, 'Customer', 5),
(12, 'Commander', 2),
(12, 'Engineer', 3),
(12, 'Scientist', 6),
(12, 'Spy', 4),
(12, 'Space tourist', 1),
(12, 'Alien', 5),
(13, 'Captain', 2),
(13, 'Spy', 3),
(13, 'Lawyer', 6),
(13, 'Journalist', 4),
(13, 'Theif', 1),
(13, 'Detective', 5),
(14, 'Spy', 2),
(14, 'Cashier', 3),
(14, 'Security Guard', 6),
(14, 'Customer', 4),
(14, 'Stock Clerk', 1),
(14, 'Manager', 5),
(15, 'Spy', 3),
(15, 'Clown', 1),
(15, 'Ring Master', 2),
(15, 'Magician', 5),
(15, 'Visitor', 6),
(15, 'Acrobat', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(100) NOT NULL,
  `host_uid` int(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_pass` varchar(100) NOT NULL,
  `r_status` varchar(100) NOT NULL,
  `playerCount` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(100) NOT NULL,
  `u_fname` varchar(100) NOT NULL,
  `u_lname` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_pass`) VALUES
(14, 'Admin', 'Admin', 'admin@admin.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0'),
(15, 'Ali Iktider', 'Sayam', 'aisayam.sayam@gmail.com', '4e7b8452eacb6dc143e0d04bf3443524'),
(16, 'Fatema', 'Iqbal', 'fatemaiqbal99@gmail.com', '72a207ccf7c1d1715495ab30878bd7ad'),
(17, 'Fatema', 'Iqbal', 'iqbal_fatema@yahoo.com', '72a207ccf7c1d1715495ab30878bd7ad'),
(18, 'Ali Intisar ', 'Samin', 'aisamin.samin@gmail.com', '23e018c376f7bb3e2c1eed5673869329'),
(19, 'Nahida ', 'Farjana', 'nfs.snigdha@gmail.com', '0395a1c00181a1839d5e7f3325ddcbb4'),
(20, 'Neil', 'Barry', 'neilbarry@gmail.com', '5cc433b405f7da107e4f5533fe858203'),
(21, 'fahmida', 'iqbal', 'fahmida.nijhum@gmail.com', 'b8b5a34bed956999c3443424bfd7369e'),
(22, 'Ali', 'Rukun', 'rukun111@gmail.com', '1329d4c89c736e63ee29bad973dcf595'),
(23, 'Afif', 'Ahnaf', 'hasnahenarenu@gmail.com', '091bdb04724e94dc0a55abed3e4899dd'),
(24, 'Mr', 'Boo', 'boo@boo.com', '0b189d34246fdb5e49ff587dff6931f7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD KEY `r_id` (`r_id`),
  ADD KEY `guest_uid` (`guest_uid`);

--
-- Indexes for table `click`
--
ALTER TABLE `click`
  ADD KEY `r_id` (`r_id`),
  ADD KEY `host_uid` (`host_uid`);

--
-- Indexes for table `hostjguest`
--
ALTER TABLE `hostjguest`
  ADD KEY `r_id` (`r_id`),
  ADD KEY `guest_uid` (`guest_uid`),
  ADD KEY `host_uid` (`host_uid`);

--
-- Indexes for table `locationjroom`
--
ALTER TABLE `locationjroom`
  ADD KEY `r_id` (`r_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `host_uid` (`host_uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `l_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`),
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`guest_uid`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `click`
--
ALTER TABLE `click`
  ADD CONSTRAINT `click_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`),
  ADD CONSTRAINT `click_ibfk_2` FOREIGN KEY (`host_uid`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `hostjguest`
--
ALTER TABLE `hostjguest`
  ADD CONSTRAINT `hostjguest_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`),
  ADD CONSTRAINT `hostjguest_ibfk_2` FOREIGN KEY (`guest_uid`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `hostjguest_ibfk_3` FOREIGN KEY (`host_uid`) REFERENCES `room` (`host_uid`);

--
-- Constraints for table `locationjroom`
--
ALTER TABLE `locationjroom`
  ADD CONSTRAINT `locationjroom_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`),
  ADD CONSTRAINT `locationjroom_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `locations` (`l_id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `locations` (`l_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`host_uid`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
