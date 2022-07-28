-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 06:21 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineoffer_today`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashback_payoom2`
--

CREATE TABLE `cashback_payoom2` (
  `payoom_id` int(11) NOT NULL,
  `poffer_id` int(11) NOT NULL,
  `pcampaign` longtext NOT NULL,
  `pcoupon_title` longtext NOT NULL,
  `pcoupon_code` varchar(255) NOT NULL,
  `pstart_date` date NOT NULL,
  `pend_date` date NOT NULL,
  `planding_page` longtext NOT NULL,
  `pupload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashback_payoom2`
--
ALTER TABLE `cashback_payoom2`
  ADD PRIMARY KEY (`payoom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashback_payoom2`
--
ALTER TABLE `cashback_payoom2`
  MODIFY `payoom_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
