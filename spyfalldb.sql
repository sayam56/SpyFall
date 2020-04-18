-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 11:11 PM
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
-- Table structure for table `hostjguest`
--

CREATE TABLE `hostjguest` (
  `r_id` int(100) NOT NULL,
  `host_uid` int(100) NOT NULL,
  `guest_uid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostjguest`
--

INSERT INTO `hostjguest` (`r_id`, `host_uid`, `guest_uid`) VALUES
(4, 8, 8),
(1, 8, 8),
(1, 8, 9),
(1, 8, 8),
(1, 8, 9),
(1, 8, 8),
(1, 8, 8),
(1, 8, 10),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(1, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 10),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9),
(2, 8, 8),
(2, 8, 8),
(2, 8, 9);

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
(14, 'Supermarket');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `l_id` int(100) NOT NULL,
  `roles_name` varchar(100) NOT NULL,
  `roles_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(100) NOT NULL,
  `host_uid` int(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_pass` varchar(100) NOT NULL,
  `r_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `host_uid`, `r_name`, `r_pass`, `r_status`) VALUES
(1, 8, 'Boos Game Room', '202cb962ac59075b964b07152d234b70', 'active'),
(2, 8, 'Sayam Game Room', '81dc9bdb52d04dc20036dbd8313ed055', 'active'),
(3, 8, 'Fattyboo', '202cb962ac59075b964b07152d234b70', 'active'),
(4, 8, 'samin Motu', '202cb962ac59075b964b07152d234b70', 'active'),
(5, 8, 'Ami Boo', '202cb962ac59075b964b07152d234b70', 'active'),
(6, 8, 'host test', '202cb962ac59075b964b07152d234b70', 'active'),
(7, 8, 'host test2', '202cb962ac59075b964b07152d234b70', 'active'),
(8, 8, 'host test3 ', '202cb962ac59075b964b07152d234b70', 'inactive'),
(9, 8, 'Ami Boo2', '81dc9bdb52d04dc20036dbd8313ed055', 'active'),
(10, 8, 'Ami Boo3', '202cb962ac59075b964b07152d234b70', 'active'),
(11, 8, 'Ami Boo4', '202cb962ac59075b964b07152d234b70', 'active'),
(12, 8, 'Ami Boo5', '202cb962ac59075b964b07152d234b70', 'active');

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
(1, 'Ali', 'samin', 'email', 'amiSamin123'),
(2, 'example', 'guest', 'email', 'abc123ABC'),
(3, 'trainer', 'trainer', 'example@trainer.com', 'abc123ABC'),
(4, 'Ali ', 'Iktider ', 'aisayam.sayam@gmail.com', 'd88a20dde2c132f62f824425d4ba3337'),
(6, 'example', 'user', 'example@guest.com', 'f95719eba33075d11a66278d739e2f21'),
(7, 'Fatema', 'Iqbal', 'iqbal_fatema@yahoo.com', '72a207ccf7c1d1715495ab30878bd7ad'),
(8, 'Admin', 'Admin', 'admin@admin.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0'),
(9, 'Fatema', 'Iqbal', 'fatemaiqbal99@gmail.com', '72a207ccf7c1d1715495ab30878bd7ad'),
(10, 'Mr', 'Boo', 'boo@boo.com', '0b189d34246fdb5e49ff587dff6931f7');

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
-- Indexes for table `hostjguest`
--
ALTER TABLE `hostjguest`
  ADD KEY `r_id` (`r_id`),
  ADD KEY `guest_uid` (`guest_uid`),
  ADD KEY `host_uid` (`host_uid`);

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
  MODIFY `l_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `hostjguest`
--
ALTER TABLE `hostjguest`
  ADD CONSTRAINT `hostjguest_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`),
  ADD CONSTRAINT `hostjguest_ibfk_2` FOREIGN KEY (`guest_uid`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `hostjguest_ibfk_3` FOREIGN KEY (`host_uid`) REFERENCES `room` (`host_uid`);

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
