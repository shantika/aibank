-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2010 at 04:26 PM
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
  `job_position` int(2) NOT NULL,
  `job_contract_period` int(2) NOT NULL,
  `housing_status` int(2) NOT NULL,
  `resident` int(2) NOT NULL,
  `vehicle` int(2) NOT NULL,
  `credit_quality` int(2) NOT NULL,
  `education_level` int(2) NOT NULL,
  `work_ex` int(2) NOT NULL,
  `insurance` int(2) NOT NULL,
  `is_marriage` int(2) NOT NULL,
  `dependants` int(2) NOT NULL,
  `money_owned` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `familiar_income` int(11) NOT NULL,
  `outcome` int(11) NOT NULL,
  `class` enum('high','medium','low') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'high',
  `since` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `dob_year`, `info`, `job_position`, `job_contract_period`, `housing_status`, `resident`, `vehicle`, `credit_quality`, `education_level`, `work_ex`, `insurance`, `is_marriage`, `dependants`, `money_owned`, `income`, `familiar_income`, `outcome`, `class`, `since`, `status`) VALUES
(8, 'Nguyễn Việt Hà', 1989, 'aibank data', 6, 5, 1, 3, 3, 4, 1, 1, 1, 2, 0, 10000, 50, 30, 20, 'low', 1289893147, 1),
(9, 'Trần Ánh T', 1985, 'aibank data', 5, 5, 3, 3, 2, 3, 2, 2, 1, 1, 0, 1500, 28, 8, 10, 'low', 1289893147, 1),
(10, 'Đặng Văn H', 1956, 'aibank data', 6, 4, 3, 3, 2, 2, 4, 2, 2, 1, 0, 100, 23, 5, 8, 'high', 1289893147, 1),
(11, 'Bùi Công A', 1972, 'aibank data', 4, 2, 1, 3, 2, 3, 2, 1, 2, 1, 2, 1500, 137, 0, 14, 'medium', 1289893147, 1),
(12, 'Bùi Thanh V', 1960, 'aibank data', 6, 2, 1, 3, 2, 4, 2, 3, 2, 2, 1, 1500, 49, 0, 8, 'low', 1289893147, 1),
(13, 'Bùi Thị Ngọc H', 1978, 'aibank data', 5, 5, 1, 3, 2, 4, 2, 2, 2, 1, 1, 0, 10, 9, 4, 'medium', 1289893147, 1),
(14, 'Bùi Thu H', 1978, 'aibank data', 6, 5, 3, 3, 2, 3, 1, 3, 2, 1, 1, 1500, 15, 6, 7, 'low', 1289893147, 1),
(15, 'Chu Hưng C', 1977, 'aibank data', 5, 5, 3, 3, 2, 3, 2, 3, 2, 1, 2, 1500, 8, 2, 5, 'medium', 1289893147, 1),
(16, 'Chu Tuấn D', 1967, 'aibank data', 4, 2, 3, 3, 2, 3, 4, 3, 2, 1, 2, 0, 6, 5, 5, 'medium', 1289893147, 1),
(17, 'Chung Duy T', 1981, 'aibank data', 5, 2, 1, 3, 2, 3, 2, 3, 2, 2, 0, 2100, 18, 0, 3, 'medium', 1289893147, 1),
(18, 'Cù Minh T', 1976, 'aibank data', 4, 5, 1, 3, 2, 3, 3, 3, 2, 2, 0, 100, 6, 0, 2, 'medium', 1289893147, 1),
(19, 'Trần Thị D', 1987, 'aibank data', 4, 2, 1, 2, 2, 3, 2, 1, 2, 2, 0, 0, 4, 0, 2, 'high', 1289893147, 1),
(20, 'Đinh Thanh H', 1983, 'aibank data', 4, 2, 1, 3, 2, 3, 2, 3, 1, 2, 0, 0, 7, 0, 1, 'medium', 1289893147, 1),
(21, 'Đỗ Quốc A', 1979, 'aibank data', 5, 5, 1, 3, 2, 3, 2, 3, 2, 2, 0, 500, 14, 0, 3, 'medium', 1289893147, 1),
(22, 'Đỗ Thị Thanh N', 1979, 'aibank data', 6, 5, 1, 3, 2, 3, 1, 3, 1, 2, 0, 0, 16, 0, 4, 'low', 1289893147, 1),
(23, 'Đỗ Văn T', 1980, 'aibank data', 5, 5, 3, 3, 2, 3, 2, 3, 2, 1, 0, 1500, 11, 7, 6, 'low', 1289893147, 1),
(24, 'Đỗ Văn T', 1970, 'aibank data', 5, 5, 4, 3, 2, 3, 2, 3, 2, 1, 3, 1500, 29, 8, 7, 'low', 1289893147, 1),
(25, 'Vương Đức T', 1983, 'aibank data', 5, 2, 1, 3, 2, 3, 2, 3, 2, 2, 0, 0, 9, 0, 2, 'medium', 1289893147, 1),
(26, 'Hà Quang H', 1979, 'aibank data', 4, 5, 1, 3, 2, 3, 2, 3, 2, 1, 1, 0, 7, 3, 3, 'medium', 1289893147, 1),
(27, 'Hoàng Thu L', 1981, 'aibank data', 4, 5, 1, 3, 2, 4, 2, 3, 2, 2, 0, 0, 7, 0, 2, 'medium', 1289893147, 1),
(28, 'Hoàng Văn L', 1959, 'aibank data', 5, 5, 3, 3, 2, 3, 2, 1, 2, 1, 0, 1500, 40, 3, 5, 'low', 1289893147, 1),
(29, 'Lã Thị Y', 1988, 'aibank data', 4, 2, 2, 3, 2, 3, 4, 1, 1, 2, 0, 100, 4, 0, 2, 'high', 1289893147, 1),
(30, 'Lê Quang T', 1971, 'aibank data', 0, 2, 3, 3, 2, 4, 2, 3, 2, 1, 2, 1500, 22, 8, 5, 'low', 1289893147, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
