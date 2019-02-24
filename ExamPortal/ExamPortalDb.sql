-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2019 at 06:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ExamPortalDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `question_number` int(11) NOT NULL,
  `question_statement` varchar(10000) NOT NULL,
  `option_a` varchar(10000) NOT NULL,
  `option_b` varchar(10000) NOT NULL,
  `option_c` varchar(10000) NOT NULL,
  `option_d` varchar(10000) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`question_number`, `question_statement`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(1, 'What is printf(\"%d\",10+++10); in c language?', '20', '21', '12', 'error', 'd'),
(2, 'Who invented \n C language', 'Dennis Ritchie', 'Dennis Will', 'Gorge Watson', 'None', 'a'),
(3, 'Inside which HTML element do we put the JavaScript?', 'Scripting', 'javascript', 'js', 'script', 'd'),
(4, 'Which one is the highest level language?', 'C', 'Java', 'C++', 'Assembly Level', 'b'),
(5, 'asdsa', 'A', 'B', 'C', 'D', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `email` varchar(200) NOT NULL,
  `total_score` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`email`, `total_score`) VALUES
('rg54622@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
