-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2010 at 01:24 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aibank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dob_year` int(4) NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `job` int(2) NOT NULL,
  `housing_status` int(2) NOT NULL,
  `credit_quality` int(2) NOT NULL,
  `education_level` int(2) NOT NULL,
  `work_ex` int(2) NOT NULL,
  `living_time` int(2) NOT NULL,
  `landline` int(2) NOT NULL,
  `is_marriage` int(2) NOT NULL,
  `dependants` int(2) NOT NULL,
  `accounts` int(2) NOT NULL,
  `money_owned` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `outcome` int(11) NOT NULL,
  `class` enum('high','medium','low') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'high',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `dob_year`, `info`, `job`, `housing_status`, `credit_quality`, `education_level`, `work_ex`, `living_time`, `landline`, `is_marriage`, `dependants`, `accounts`, `money_owned`, `income`, `outcome`, `class`) VALUES
(1, 'Nguyễn Việt Hà', 1989, '123456789', 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 0, 3, 0, 'medium'),
(2, 'Nguyễn Việt Hà', 1989, 'qưertyuiop', 6, 1, 4, 1, 1, 2, 1, 2, 5, 4, 1000, 500, 10, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE IF NOT EXISTS `tree` (
  `id` int(101) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL DEFAULT 'NORMAL',
  `label` varchar(21) NOT NULL,
  `parent_id` int(101) NOT NULL DEFAULT '-1',
  `data` varchar(255) NOT NULL,
  `level` int(101) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tree`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `memsince` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `memsince`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'sa@localhost.com', '2010-10-01 00:51:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
