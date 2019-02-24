-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2019 at 06:26 PM
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
-- Database: `login_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `description` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`description`, `time`, `marks`) VALUES
('All questions are mutiple choice', 90, 90),
('asdasds', 0, 0),
('There is no negative marking', 10, 5),
('There is no negative marking', 10, 5),
('There is no negative marking', 10, 5),
('There is no negative marking', 10, 5),
('There is no negative marking', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Name` varchar(30) NOT NULL,
  `DOB` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Roll` varchar(30) NOT NULL,
  `Branch` varchar(30) NOT NULL,
  `SGPA` float NOT NULL,
  `CGPA` float NOT NULL,
  `Tenth` float NOT NULL,
  `Twelth` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Name`, `DOB`, `Email`, `Mobile`, `Password`, `Roll`, `Branch`, `SGPA`, `CGPA`, `Tenth`, `Twelth`) VALUES
('mohammad hsain Dilshad', '1998-07-08', 'admin@gmail.com', '9631127140', 'Admin@123', 'b160589cs', 'CSE', 7, 7, 82, 81),
('RAHUL KUMAR', '2019-02-14', 'rg54622@gmail.com', 'rg54622@gm', 'Rahul@123', 'B160756CS', 'CSE', 7.26, 7.44, 9.6, 78.6);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question` varchar(200) NOT NULL,
  `op1` varchar(20) NOT NULL,
  `op2` varchar(20) NOT NULL,
  `op3` varchar(20) NOT NULL,
  `op4` varchar(20) NOT NULL,
  `ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `op1`, `op2`, `op3`, `op4`, `ans`) VALUES
('what is your name??', 'mohammad', 'husain', 'dilshad', 'aurangzeb', 'a b c d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`Email`,`DOB`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
