-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 06:24 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dd`
--

CREATE TABLE `dd` (
  `user_id` varchar(250) NOT NULL,
  `benificiary` varchar(250) NOT NULL,
  `remitter` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `amount_in_rupees` varchar(500) NOT NULL,
  `mode_of_payment` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dd`
--

INSERT INTO `dd` (`user_id`, `benificiary`, `remitter`, `amount`, `amount_in_rupees`, `mode_of_payment`) VALUES
(' 4ub16cs052', 'dadsf', 'fsdfsda', 36000, 'thssadf;lsajh', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `user_last_transactions`
--

CREATE TABLE `user_last_transactions` (
  `user_id` varchar(250) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `is_approved` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_last_transactions`
--

INSERT INTO `user_last_transactions` (`user_id`, `transaction_type`, `is_approved`) VALUES
('4ub16cs052', 'Cheque', 'pending'),
('4ub16cs052', 'DD', 'pending'),
('4ub16cs052', 'Cheque', 'pending'),
('4ub16cs052', 'NEFT/RTGS', 'pending'),
('4ub16cs052', 'DD', 'pending');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
