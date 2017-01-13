-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2017 at 11:30 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `event_id`, `user_id`) VALUES
(1, 5, 3),
(2, 2, 1),
(3, 4, 4),
(4, 3, 1),
(5, 1, 3),
(6, 2, 2),
(7, 1, 1),
(8, 4, 1),
(9, 5, 1),
(10, 1, 6),
(11, 4, 6),
(12, 3, 6),
(13, 4, 3),
(14, 1, 4),
(15, 3, 4);

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
(1, 'Classical'),
(2, 'Hip Hop'),
(3, 'Rock'),
(4, 'Techno'),
(5, 'Jazz'),
(6, 'R&B'),
(7, 'Rap'),
(8, 'Other');

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
  `location` varchar(70) NOT NULL,
  `date_time` datetime NOT NULL,
  `Price` varchar(11) NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `remaining_tickets` int(11) NOT NULL,
  `sale_end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `host_id`, `event_name`, `category_id`, `description`, `location`, `date_time`, `Price`, `no_of_tickets`, `remaining_tickets`, `sale_end_date`) VALUES
(1, 1, 'John from the park and friends ', 2, 'A London acid Techno Legend under the name John Cater, will be putting on a live show on the Camden Ballroom.', 'Ballroom Square, Camden London, NW3 6SQ', '2017-01-12 06:00:00', 'GBP 5.00', 50, 46, '2017-01-09 00:00:00'),
(2, 3, 'Snowman', 3, 'This is a once in a lifetime opportunity to see Snowman live at the O2 arena, and hes guaranteed to tear the roof down.', 'O2 arena, London, E8 5JS', '2016-12-29 08:00:00', 'GBP 8.00', 300, 298, '2016-12-13 00:00:00'),
(3, 3, 'DJ collar with the Jurassic nobles', 4, 'Known for his EPIC shows in the country lands, DJ Collar comes to London for a night full of crazy fun with the nobles! Don\'t miss it.', 'Lords Cricket Ground, Russel Square, London, SE1 6UR', '2017-02-09 00:00:00', 'GBP 4.00', 65, 62, '2017-02-01 00:00:00'),
(4, 1, 'Absolute Frisky', 4, 'There will only ever be one Frank Friskal, he was unique in every way and an inspiration to millions. A tribute to the legend for the fans in London to experience a unique night out. ', 'Royal Variety Centre, Shoreditch, London, E9 4SW', '2017-02-03 00:00:00', 'GBP 12.00', 45, 41, '2017-01-26 00:00:00'),
(5, 4, 'Cognition - Night of Jazz', 5, 'Crosby’s leadership and drive continue to ensure the evolution of Jazz - encapsulated by the recent headline grabbing collaborative project that saw the band join the Urban Soul Orchestra and Brinsley Forde at Festival Hall in 2017.', 'The Flapper, Birmingham, BI7 2QS', '2017-01-18 00:00:00', 'GBP 7.00', 90, 88, '2017-01-01 00:00:00');

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
(1, 'Enes', 'Arican', '...@...com', 'EArican', 'rootroot'),
(2, 'Hillary', 'Trump', 'foo@gmail.com', 'jhonny', 'p250'),
(3, 'Martin', 'skirtel', 'hello@gmailcom', 'Martin21', '1993tiy'),
(4, 'Osborne', 'Lee', 'leefds@hotmial.com', 'heeler', 'ggg'),
(5, 'Martin', 'Kolo', 'kolo@mail.com', 'Martin', 'Kol00'),
(6, 'shenbao', 'wnag', 'wangshenbao.ben@gmail.com', 'wangshenbao', 'wang1997224');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
