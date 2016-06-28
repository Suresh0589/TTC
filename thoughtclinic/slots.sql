-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2016 at 07:15 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thought_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `slot` varchar(225) NOT NULL,
  `reason` varchar(2500) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `slot_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `doc_id`, `uid`, `cdate`, `slot`, `reason`, `name`, `email`, `mobile`, `slot_time`) VALUES
(1, 7, 190, '2016-06-19', '16:15', 'sample reason sample reason sample reason sample reason sample reason sample reason sample reason', 'suresh', 'sureshsweb@gmail.com', '8125336235', '2016-06-19 06:55:23'),
(2, 7, 190, '2016-06-19', '07:15', 'sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason', 'suresh', 'sureshsweb@gmail.com', '9030018008', '2016-06-19 06:56:00'),
(3, 7, 190, '2016-06-19', '10:15', 'sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason sample reason', 'suresh', 'sureshsweb@gmail.com', '8125336235', '2016-06-19 06:56:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
