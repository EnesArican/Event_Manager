-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2016 at 11:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`) VALUES
(1, 'Football'),
(2, 'Tennis'),
(3, 'Cricket'),
(4, 'Rugby'),
(5, 'Boxing'),
(6, 'Squash');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(350) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `remaining_tickets` int(11) NOT NULL,
  `sale_end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `host_id`, `event_name`, `category_id`, `description`, `location`, `date_time`, `no_of_tickets`, `remaining_tickets`, `sale_end_date`) VALUES
(1, 1, 'Barcelona vs Madrid', 2, 'An amazing game', 'Madrid stadium', '2016-12-29 06:00:00', 50, 25, '2016-12-21 00:00:00'),
(2, 3, 'Tennis match', 2, 'good game of tennis to what at wimbeldon. Will be perfomed for a charity event. Dont miss this amazing opportunity.', 'O2 arena, London, N22 5JS', '2016-12-29 08:00:00', 30, 12, '2016-12-13 00:00:00'),
(3, 3, 'England vs Bangladesh', 4, 'International cricket games at lords cricket ground', 'Lords Cricket Ground, Russel Square , London', '2017-02-09 00:00:00', 899, 67, '2017-02-01 00:00:00'),
(4, 1, 'Boxing tournament', 4, 'boxing tournament in central london ', 'Knightsbridge', '2017-02-03 00:00:00', 45, 44, '2016-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'Enes', 'Arican', '...@...com', 'root', 'root'),
(2, 'Hillary', 'Trump', 'foo@gmail.com', 'jhonny', 'p250'),
(3, 'Martin', 'skirtel', 'hello@gmailcom', 'Martin21', '1993tiy'),
(4, 'Osborne', 'Lee', 'leefds@hotmial.com', 'heeler', 'ggg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
