-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 05:48 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `patient_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `patientregister`
--

CREATE TABLE IF NOT EXISTS `patientregister` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `phone` decimal(10,0) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientregister`
--

INSERT INTO `patientregister` (`first_name`, `last_name`, `age`, `dob`, `gender`, `phone`, `message`) VALUES
('Rupam', 'Bhadra', 23, '2006-11-09', 'Male', 9748965640, 'B Tech passout'),
('Arijit', 'Roy', 22, '1984-11-05', 'Male', 8981626794, 'Urgent!'),
('Sunny', 'Sinhababu', 23, '1994-11-17', 'Male', 9856712300, 'Medical attendance needed'),
('Anuska', 'Dey', 25, '2016-11-17', 'Female', 7025689123, 'Hey there'),
('Subho', 'Basak', 22, '1994-01-10', 'Male', 8583866670, 'Hello');
