-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-22 13:33:05
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 7.0.13

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
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
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
-- 表的结构 `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `category` varchar(11) NOT NULL,
  `description` varchar(350) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `remaining_tickets` int(11) NOT NULL,
  `sale_end_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `time` time NOT NULL,
  `sale_end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `events`
--

INSERT INTO `events` (`id`, `username`, `event_name`, `category`, `description`, `location`, `date`, `no_of_tickets`, `remaining_tickets`, `sale_end_date`, `price`, `time`, `sale_end_time`) VALUES
(1, '1', 'Barcelona vs Madrid', '2', 'An amazing game', 'Madrid stadium', '2016-12-13', 50, 25, '2016-12-21', 0, '00:00:00', '00:00:00'),
(2, '3', 'Tennis match', '2', 'good game of tennis to what at wimbeldon. Will be perfomed for a charity event. Dont miss this amazing opportunity.', 'O2 arena, London, N22 5JS', '2016-12-29', 30, 12, '2016-12-13', 0, '00:00:00', '00:00:00'),
(3, '3', 'England vs Bangladesh', '4', 'International cricket games at lords cricket ground', 'Lords Cricket Ground, Russel Square , London', '2017-02-09', 899, 67, '2017-02-01', 0, '00:00:00', '00:00:00'),
(4, '1', 'Boxing tournament', '4', 'boxing tournament in central london ', 'Knightsbridge', '2017-02-03', 45, 44, '2016-12-22', 0, '00:00:00', '00:00:00'),
(19, 'wangshenbao', '1', '1', '1', '1', '2016-10-22', 1, 1, '2016-12-22', 1, '12:31:00', '12:31:00');

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
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
-- 转存表中的数据 `user_info`
--

INSERT INTO `user_info` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'Enes', 'Arican', '...@...com', 'root', 'root'),
(2, 'Hillary', 'Trump', 'foo@gmail.com', 'root', 'p250'),
(3, 'Martin', 'skirtel', 'hello@gmailcom', 'Martin21', '1993tiy'),
(4, 'Osborne', 'Lee', 'leefds@hotmial.com', 'heeler', 'ggg'),
(5, 'shenbao', 'wang', 'wangshenbao.ben@gmail.com', 'wangshenbao', 'wang1997224');

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
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
