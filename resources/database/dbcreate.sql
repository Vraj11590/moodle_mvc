-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2013 at 07:21 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `localhost`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseid` varchar(8) NOT NULL COMMENT 'EX:CS332',
  `coursename` varchar(40) NOT NULL COMMENT 'EX:Computer Org&Archi',
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`) VALUES
('Acct117', 'Intro. to Accounting'),
('CS332', 'Computer Organization And Architecture'),
('CS490', 'Software Engineering'),
('Eng352', 'Technical Writing'),
('EPS202', 'Environmental Blah Blah'),
('Hum212', 'Pre-Modern History'),
('IS332', 'Mobile App. Development'),
('IT332', 'Digital Crime'),
('Math211', 'Calculus III'),
('Math335', 'Vector Analysis'),
('PE111', 'Individualized Fitness'),
('Phys111', 'Physics II');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `crn` int(15) DEFAULT NULL,
  `ucid` varchar(6) DEFAULT NULL,
  KEY `crn` (`crn`),
  KEY `ucid` (`ucid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `crn` int(15) DEFAULT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `posttext` longtext NOT NULL,
  `submission` int(1) DEFAULT NULL,
  `posttitle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid` (`pid`),
  KEY `crn` (`crn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `teachucid` varchar(6) NOT NULL,
  `courseid` varchar(8) NOT NULL,
  `sectionid` varchar(8) NOT NULL,
  `crn` int(15) NOT NULL,
  `semesterid` int(5) NOT NULL,
  PRIMARY KEY (`crn`),
  UNIQUE KEY `crn` (`crn`),
  KEY `teachucid` (`teachucid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ucid` varchar(6) NOT NULL COMMENT 'ucid',
  `password` text NOT NULL COMMENT 'user pass',
  `name` text NOT NULL COMMENT 'user full name',
  `type` text NOT NULL,
  PRIMARY KEY (`ucid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ucid`, `password`, `name`, `type`) VALUES
('abc123', 'teacher', 'John Smith', 'Teacher'),
('gt35', 'password', 'Giaspur Tabanagay', 'Student'),
('thh4', 'password', 'Hyunh Lastname', 'Student'),
('vp78', 'password', 'Vrajesh Patel', 'Student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`crn`) REFERENCES `sections` (`crn`),
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`ucid`) REFERENCES `users` (`ucid`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`crn`) REFERENCES `sections` (`crn`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`teachucid`) REFERENCES `users` (`ucid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
