-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 11:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `co_number` int(11) DEFAULT NULL,
  `levels` varchar(100) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`name`, `email`, `co_number`, `levels`, `subjects`, `rate`) VALUES
('Peter_Brown', 'peter@distantclass.com', 111, 'Year 3', 'English', 35),
('John_White', 'john@distantclass.com', 111222, 'Year 3', 'Mathematics', 40),
('David_Red', 'david@distantclass.com', 222333, 'Year 3', 'Science', 40),
('Sue_Black', 'sue@distantclass.com', 333444, 'Year 4', 'History', 38),
('Jane_Red', 'jane@distantclass.com', 444555, 'Year 5', 'History', 45),
('Abigai_Blue', 'abigai@distantclass.com', 555666, 'Year 6', 'Science', 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
