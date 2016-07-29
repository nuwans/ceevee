-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2016 at 09:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ceeveebi_ceevee`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `marital_st` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `indusrty` varchar(200) NOT NULL,
  `proffesion` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `experiance` varchar(200) NOT NULL,
  `job_preference` varchar(200) NOT NULL,
  `exp_salary` varchar(200) NOT NULL,
  `exp_country` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `img_id` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `passport` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `f_name`, `l_name`, `dob`, `gender`, `marital_st`, `mobile`, `email`, `indusrty`, `proffesion`, `education`, `experiance`, `job_preference`, `exp_salary`, `exp_country`, `status`, `img_id`, `country`, `passport`) VALUES
(13, 'SARATH', 'PERERA', '1111111111', 'M', 'Single', '+11111111111', 'sarath@gmail.com', 'CONSTRUCTION', 'MASON', 'O/L,', '5 YRS,', 'MASON', 'US 500', 'maldives', 'Available', '1_2016_07_08.jpg', 'SRI LANKAN', '000000000'),
(14, 'PUBUDU', 'SILVA', '999999999', 'M', 'Married', '99999999', 'pubudu@gmail.com', 'CONTRUCTION', 'MASON', 'O/L,', '7 YRS,', 'MASON', 'US 500', 'maldives', 'Available', '14_2016_07_08.jpg', 'SRI LANKAN', '000000000'),
(15, 'CYRIL', 'SAHABANDU', '222222222', 'M', 'Married', '99999999', 'cyril@gmail.com', 'CONSTRUCTION', 'MASON', 'O/L,', '6 YRS,', 'MASON', 'US 500', 'dubai', 'Available', '15_2016_07_08.jpg', 'SRI LANKAN', '888888888'),
(16, 'CHANNA', 'ATAPATTU', '00000000000', 'M', 'Married', '9999999999999', 'channa@gmail.com', 'CONSTRUCTION', 'CARPENTER', 'O/L,', '8 YRS,', 'CARPENTER', 'US 500', 'maldives', 'Available', '16_2016_07_08.jpg', 'SRI LANKAN', '88888888888'),
(17, 'CHULA', 'FERNANDO', '777777777', 'M', 'Married', '7777777777', 'chula@gmail.com', 'CONSTRUCTION', 'CARPENTER', 'O/L,', '5 YRS,', 'CARPENTER', 'US 500', 'maldives', 'Available', '17_2016_07_08.jpg', 'SRI LANKAN', '00000000'),
(18, 'LLOYD', 'PERERA', '222222222', 'M', 'Married', '6666666666666', 'lloyd@gmail.com', 'HOSPITALITY', 'F O MGR', 'A/L,HOTEL SCHOOL GRAD,', '10 YRS,', 'F O MGR', 'US 3000', 'MALDIVES/DUBAI', 'Available', '18_2016_07_08.jpg', 'SRI LANKAN', '00000000'),
(19, 'BERNARD', 'PERERA', '44444444', 'M', 'Single', '5555555555', 'bernard@gmail.com', 'I T', 'ENGINEER', 'A/L,CMB UNIVERCITY,', '8 YRS,', 'ENGINEER', 'US 5000', 'maldives', 'Available', '19_2016_07_08.jpg', 'SRI LANKAN', '33333333'),
(20, 'DUNCAN', 'FERNANDO', '44444444', 'M', 'Single', '77777777777', 'duncan@gmail.com', 'HOSPITALITY', 'ACCOUNTANT', 'A/L,CIMA/CHARTERED,', '7 YRS,', 'ACCOUNTANT', 'US 2000', 'maldives', 'Available', '20_2016_07_08.jpg', 'SRI LANKAN', '888888888'),
(21, 'SAMAN', 'SILVA', '777777777', 'M', 'Single', '00000000', 'saman@gmail.com', 'PROJECTS', 'ACCOUNTANT', 'A/L,CHARTERED,', '8 YRS,', 'ACCOUNTANT/FIN.CONT.', 'US 3000', 'MALDIVES/DUBAI', 'Available', '21_2016_07_08.jpg', 'SRI LANKAN', '666666666'),
(22, 'UPUL', 'PERERA', '99999999999', 'M', 'Married', '9999999', 'upul@gmail.com', 'hospitality', 'BARMAN', 'O/L,', '6 YRS,', 'BARMAN/BAR WAITER', 'US 300', 'maldives', 'Available', '22_2016_07_08.jpg', 'SRI LANKAN', '000000000'),
(23, 'SALIYA', 'PERERA', '2222222222', 'M', 'Single', '88888888888', 'saliya@gmail.com', 'HOSPITALITY', 'c d p', 'A/L,HOTEL SCHOOL GRAD,', '7 YRS,', 'C D P /COMMI 1', 'US 300', 'MALDIVES/DUBAI', 'Available', '23_2016_07_08.jpg', 'SRI LANKAN', '1111111111'),
(24, 'DENZIL', 'LULU', '3333333333333', 'M', 'Single', '777777777777', 'denzil@gmail.com', 'HOSPITALITY', 'COMMI 1', 'O/L,HOTEL SCHOOL GRAD,', '7 YRS,', 'COMMI 1/ COMMI 2', 'US 300', 'MALDIVES', 'Available', '24_2016_07_08.jpg', 'SRI LANKAN', '999999999'),
(25, 'test', 'test', 'test', 'M', 'Married', '09752626722', 'rajeshdewangan78@gmail.com', 'test', 'test', 'test,', 'test,', 'test', '1210', 'test', 'Available', '25_2016_07_09.jpg', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(200) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `sallary` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `overview` text NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `position`, `industry`, `sallary`, `country`, `overview`) VALUES
(11, 'MASON', 'CONSTRUCTION', 'US 500', 'MALDIVES', ''),
(12, 'MASON', 'CONSTRUCTION', 'US 500', 'DUBAI', ''),
(13, 'CARPENTER', 'CONSTRUCTION', 'US 500', 'MALDIVES', ''),
(14, 'ENGINEER', 'I T', 'US 2000', 'MALDIVES', ''),
(15, 'ACCOUNTANT', 'PROJECT', 'US 3000', 'MALDIVES', ''),
(16, 'ACCOUNTANT', 'HOSPITALITY', 'US 2000', 'MALDIVES', ''),
(17, 'FIN. CONT.', 'HOSPITALITY', 'US 3000', 'MALDIVES', ''),
(18, 'ENGINEER', 'CONSTRUCTION', 'US 2000', 'MALDIVES', ''),
(19, 'BARMAN', 'HOSPITALITY', 'US 300', 'MALDIVES', ''),
(20, 'COMMI 1', 'HOSPITALITY', 'US 300', 'MALDIVES', ''),
(21, 'C D P', 'HOSPITALITY', 'US 400', 'MALDIVES', ''),
(22, 'SOUS CHEF', 'HOSPITALITY', 'US 500', 'MALDIVES', ''),
(23, 'SPA MGR', 'HOSPITALITY', 'US 1500', 'MALDIVES', ''),
(24, 'W3DFSF', 'SDFS', 'FAWERE', 'DSFAF', 'wqweqwr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `fname` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `fname`) VALUES
('admin', 'pass', 'Michael Heenpalla');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
