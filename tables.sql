-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 10:43 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceeveebi_mpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
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
  `job_preference2` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `f_name`, `l_name`, `dob`, `gender`, `marital_st`, `mobile`, `email`, `indusrty`, `proffesion`, `education`, `experiance`, `job_preference`, `exp_salary`, `exp_country`, `status`, `img_id`, `country`, `passport`, `job_preference2`, `added_by`, `added_date`) VALUES
(1, 'qwqwqw', 'qnnnnn', '2016-07-05', 'M', 'Married', 'q', 'qqq@gmail.com', 'qwqwqwqw', 'w', 'w,', 'ww,', 'ww', 'www', 'w', 'Available', '1_2016_07_28.png', 'nnnn', 'njnjnj', 'w', 'Michael Heenpalla', '2016-07-28 12:02:00'),
(2, 'aaaaaaaaaaa', 'qqqqqqqqq', '2016-07-08', 'M', 'Married', '12333hddhab', 'wkjndkqkwd@hhh.xjj', 'ssww', 'www', 'q,', 'q,', 'q', 'qqq', 'q', 'Available', '2_2016_07_28.png', 'qqqqqqqqqqq', '112133', 'q', 'Michael Heenpalla', '2016-07-28 12:53:13'),
(3, 'q', 'q', '2016-07-15', 'M', 'Married', '1111', 'qqww@ss.ss', '@ww', 'q', 'q,', 'q,', 'q', 'qq', 'qq', 'Available', '3_2016_07_28.png', 'q', 'q', 'q', 'Michael Heenpalla', '2016-07-28 20:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `position` varchar(200) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `sallary` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `overview` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `position`, `industry`, `sallary`, `country`, `overview`, `added_by`, `added_date`, `company`) VALUES
(13, 'CARPENTER', 'CONSTRUCTION', 'US 500', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(14, 'ENGINEER', 'I T', 'US 2000', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(15, 'ACCOUNTANT', 'PROJECT', 'US 3000', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(16, 'ACCOUNTANT', 'HOSPITALITY', 'US 2000', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(17, 'FIN. CONT.', 'HOSPITALITY', 'US 3000', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(18, 'ENGINEER', 'CONSTRUCTION', 'US 2000', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(19, 'BARMAN', 'HOSPITALITY', 'US 300', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(20, 'COMMI 1', 'HOSPITALITY', 'US 300', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(21, 'C D P', 'HOSPITALITY', 'US 400', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(22, 'SOUS CHEF', 'HOSPITALITY', 'US 500', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(23, 'SPA MGR', 'HOSPITALITY', 'US 1500', 'MALDIVES', '', '', '2016-07-20 18:56:18', ''),
(24, 'W3DFSF', 'SDFS', 'FAWERE', 'DSFAF', 'wqweqwr', '', '2016-07-20 18:56:18', ''),
(25, 'SE', 'no', '123545', 'SL', 'ssssssssssssssssssssssssssss', 'Michael Heenpalla', '2016-07-20 19:14:03', ''),
(26, 'AaAa', 'a', 'a', 'a', 'a', 'Michael Heenpalla', '2016-07-28 19:19:26', 'a'),
(27, 'aAaA', 'A', '00000000000000000', 'A', 'A', 'Michael Heenpalla', '2016-07-28 19:20:50', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `fname` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `fname`) VALUES
('admin', 'pass', 'Michael Heenpalla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
