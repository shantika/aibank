-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2010 at 08:46 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9-2

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

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
(30, 'Lê Quang T', 1971, 'aibank data', 0, 2, 3, 3, 2, 4, 2, 3, 2, 1, 2, 1500, 22, 8, 5, 'low', 1289893147, 1),
(31, 'Vương Trọng M', 1982, 'aibank', 6, 2, 3, 3, 2, 4, 2, 2, 2, 1, 1, 1500, 11, 7, 6, 'low', 1289906737, 1),
(32, 'Nguyễn Quỳnh C', 1979, 'aibank', 5, 5, 3, 3, 2, 4, 2, 3, 2, 1, 2, 1500, 8, 8, 7, 'low', 1289932257, 1),
(33, 'Nguyễn Thị Ánh C', 1977, '', 5, 5, 1, 3, 2, 3, 2, 3, 2, 1, 1, 3000, 16, 3, 5, 'low', 1289932473, 1),
(34, 'Nguyễn Thị C', 1970, 'aibank', 6, 5, 3, 3, 3, 3, 2, 2, 2, 1, 2, 6000, 34, 0, 8, 'medium', 1289932659, 1),
(35, 'Nguyễn Thị Hoàng T', 1987, 'aibank', 4, 5, 3, 3, 2, 3, 4, 1, 2, 2, 0, 0, 10, 0, 4, 'medium', 1289932825, 1),
(36, 'Nguyễn Thị Kim Q', 1983, 'aibank', 5, 4, 3, 3, 2, 3, 2, 2, 1, 1, 0, 1500, 18, 2, 7, 'low', 1289932946, 1),
(37, 'Nguyễn Thị Ngọc H', 1981, 'aibank', 4, 2, 2, 2, 2, 3, 2, 3, 1, 1, 1, 0, 7, 8, 6, 'medium', 1289933115, 1),
(38, 'Nguyễn Thị Thanh H', 1973, 'aibank', 4, 2, 1, 3, 2, 2, 1, 3, 2, 2, 0, 1500, 38, 0, 5000000, 'low', 1289933294, 1),
(39, 'Nguyễn Thị Thanh H', 1978, 'aibank', 4, 2, 1, 3, 2, 3, 2, 1, 2, 1, 0, 0, 7, 14, 4, 'medium', 1289933452, 1),
(40, 'Nguyễn Thị Th', 1960, 'aibank', 5, 5, 3, 3, 3, 3, 3, 3, 1, 2, 0, 1500, 20, 0, 4, 'low', 1289933589, 1),
(41, 'Nguyễn Trung H', 1963, 'aibank', 6, 5, 4, 3, 3, 4, 2, 3, 2, 1, 2, 1500, 85, 0, 20, 'low', 1289933708, 1),
(42, 'Nguyễn Tuấn A', 1977, 'aibank', 4, 5, 3, 3, 2, 3, 1, 3, 2, 1, 1, 0, 7, 6, 5, 'medium', 1289933823, 1),
(43, 'Nguyễn Văn D', 1970, 'aibank', 6, 2, 3, 3, 3, 3, 2, 3, 1, 1, 4, 1500, 45, 0, 8, 'low', 1289933971, 1),
(44, 'Nguyễn Văn H', 1957, '', 6, 5, 4, 3, 2, 4, 2, 3, 2, 1, 0, 1500, 14, 6, 7, 'low', 1289934236, 1),
(45, 'Nguyễn Văn N', 1984, 'aibank', 6, 2, 3, 3, 2, 4, 1, 1, 2, 1, 0, 1500, 37, 3, 8, 'low', 1289934488, 1),
(46, 'Nhữ Xuân B', 1987, 'aibank', 4, 4, 1, 3, 2, 3, 2, 1, 1, 2, 0, 0, 19, 0, 5, 'medium', 1289934609, 1),
(47, 'Phạm Thị D', 1979, 'aibank', 4, 5, 3, 3, 2, 3, 2, 3, 2, 1, 1, 50, 5, 9, 5, 'medium', 1289934744, 1),
(48, 'Phạm Thu H', 1977, 'aibank', 5, 5, 3, 3, 2, 4, 2, 3, 2, 1, 1, 1000, 12, 5, 9, 'low', 1289934851, 1),
(49, 'Phạm Xuân T', 1976, 'aibank', 5, 5, 1, 3, 2, 3, 2, 3, 2, 1, 0, 1500, 20, 10, 6, 'low', 1289935088, 1),
(50, 'Quách Dần L', 1974, 'aibank', 0, 4, 1, 3, 2, 3, 2, 2, 2, 1, 2, 1500, 35, 5, 29, 'low', 1289935214, 1),
(51, 'Hà Quang H', 1979, 'aibank', 4, 5, 1, 3, 2, 3, 2, 3, 2, 1, 1, 0, 7, 3, 3, 'medium', 1289935342, 1),
(52, 'Tạ Hữu P', 1983, 'aibank', 4, 3, 2, 3, 2, 2, 2, 2, 2, 2, 0, 0, 5, 0, 3, 'high', 1289935474, 1),
(53, 'Tạ Ngọc T', 1982, 'aibank', 4, 2, 2, 2, 2, 3, 2, 3, 1, 1, 1, 0, 15, 5, 6, 'high', 1289935643, 1),
(54, 'Tạ Thanh S', 1977, 'aibank', 5, 4, 3, 3, 2, 3, 1, 3, 2, 2, 0, 500, 14, 0, 3, 'medium', 1289935758, 1),
(55, 'Tạ Thu H', 1976, 'aibank', 5, 5, 3, 3, 2, 4, 2, 3, 2, 1, 2, 1500, 15, 22, 8, 'low', 1289935895, 1),
(56, 'Tạ Thị Thu H', 1982, 'aibank', 5, 4, 1, 3, 2, 3, 2, 3, 1, 1, 0, 0, 9, 0, 3, 'high', 1289936057, 1),
(57, 'Tô Thị Khánh H', 1971, 'aibank', 0, 4, 3, 3, 2, 4, 2, 2, 2, 2, 1, 1500, 42, 0, 8, 'medium', 1289936165, 1),
(58, 'Trần Ánh T', 1984, 'aibank', 5, 5, 1, 3, 2, 3, 5, 2, 2, 1, 0, 1500, 28, 8, 10, 'low', 1289936271, 1),
(59, 'Trần Đình D', 1981, 'aibank', 4, 5, 1, 3, 2, 3, 2, 3, 1, 2, 0, 0, 11, 0, 4, 'medium', 1289936399, 1),
(60, 'Trần Hoàng L', 1981, 'aibank', 5, 2, 4, 3, 2, 3, 2, 3, 2, 1, 0, 0, 9, 2, 3, 'low', 1289936498, 1),
(61, 'Trần Thị D', 1979, 'aibank', 4, 4, 1, 3, 3, 4, 2, 3, 2, 1, 1, 0, 5, 8, 5, 'high', 1289936639, 1),
(62, 'Trần Thị Thu Tr', 1983, 'aibank', 4, 5, 1, 3, 2, 3, 2, 2, 2, 1, 0, 0, 5, 4, 2, 'high', 1289936769, 1),
(63, 'Trần Thúy V', 1984, 'aibank', 3, 4, 3, 3, 3, 3, 2, 2, 2, 1, 0, 1500, 4, 36, 7, 'low', 1289936885, 1),
(64, 'Trần Tiến D', 1973, 'aibank', 6, 2, 1, 3, 3, 3, 2, 3, 2, 1, 2, 1500, 81, 3, 8, 'low', 1289936987, 1),
(65, 'Trần Trọng K', 1982, 'aibank', 6, 5, 3, 3, 2, 3, 2, 3, 2, 1, 0, 1500, 12, 5, 7, 'low', 1289937068, 1),
(66, 'Vũ Trung T', 1963, 'aibank', 5, 2, 4, 3, 2, 3, 2, 3, 1, 1, 2, 4000, 30, 5, 6, 'low', 1289937209, 1),
(67, 'Vũ Công T', 1971, 'aibank', 5, 4, 4, 3, 2, 3, 4, 3, 2, 1, 3, 1500, 30, 10, 10, 'low', 1289937300, 1),
(68, 'Vũ Đức P', 1980, 'aibank', 5, 5, 4, 3, 2, 3, 2, 1, 2, 1, 1, 1500, 13, 11, 7, 'low', 1289937379, 1),
(69, 'Lê Thị Quỳnh A', 1986, 'aibank data', 4, 2, 3, 3, 2, 4, 2, 1, 2, 1, 0, 500, 8, 39, 7, 'medium', 1289893147, 1),
(70, 'Lương Quang B', 1981, 'aibank data', 5, 2, 1, 3, 2, 3, 2, 3, 2, 2, 0, 0, 18, 0, 3, 'medium', 1289893147, 1),
(71, 'Ngô Thị Minh T', 1982, 'aibank data', 5, 5, 1, 3, 2, 3, 2, 5, 2, 1, 1, 0, 9, 0, 3, 'medium', 1289893147, 1),
(72, 'Tạ Ngọc T', 1982, 'aibank data', 6, 5, 2, 2, 2, 3, 2, 3, 1, 1, 1, 0, 15, 5, 6, 'medium', 1289893147, 1),
(73, 'Nguyễn Bảo Q', 1973, 'aibank data', 5, 2, 1, 3, 2, 3, 2, 3, 2, 1, 2, 1500, 5, 35, 10, 'low', 1289893147, 1),
(74, 'Nguyễn Đình T', 1984, 'aibank data', 6, 5, 2, 3, 3, 3, 2, 2, 2, 2, 0, 4000, 47, 0, 5, 'low', 1289893147, 1),
(75, 'Nguyễn Ngọc M', 1977, 'aibank data', 5, 5, 1, 3, 2, 3, 2, 3, 2, 1, 1, 1500, 8, 7, 7, 'medium', 1289893147, 1),
(76, 'Nguyễn Quỳnh C', 1979, 'aibank data', 5, 5, 3, 3, 2, 4, 2, 3, 2, 1, 2, 1500, 8, 8, 7, 'medium', 1289893147, 1),
(77, 'Vũ Trung T', 1963, 'aibank data', 5, 5, 4, 3, 2, 3, 2, 3, 1, 1, 2, 4000, 30, 5, 6, 'low', 1289893147, 1),
(78, 'Vũ Trọng M', 1963, 'aibank data', 4, 5, 3, 3, 3, 3, 2, 3, 2, 1, 1, 1500, 23, 7, 8, 'low', 1289893147, 1),
(79, 'Vũ Thúy H', 1962, 'aibank data', 6, 2, 3, 3, 2, 3, 4, 3, 2, 1, 1, 1500, 20, 20, 8, 'low', 1289893147, 1),
(80, 'Vũ Công T', 1974, 'aibank data', 5, 5, 1, 3, 2, 0, 2, 3, 2, 2, 0, 1500, 60, 0, 8, 'low', 1289893147, 1),
(81, 'Vũ Ngọc Q', 1986, 'aibank data', 5, 2, 1, 3, 2, 4, 2, 1, 2, 2, 0, 600, 12, 0, 3, 'medium', 1289893147, 1),
(82, 'Lê Thị P', 1978, 'aibank data', 5, 5, 3, 3, 3, 3, 2, 3, 2, 1, 1, 3, 33, 5, 7, 'low', 1289893147, 1),
(83, 'Lê Tất T', 1978, 'aibank data', 4, 5, 1, 3, 2, 3, 2, 3, 2, 1, 2, 0, 9, 0, 4, 'medium', 1289893147, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `password` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `status`, `password`) VALUES
(1, 'superadmin', 'quangle.hut@gmail.com', 'active', '17c4520f6cfd1ab53d8745e84681eb49');
