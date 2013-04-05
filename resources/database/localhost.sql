-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2013 at 05:19 AM
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `coursename` text NOT NULL,
  `coursenumber` varchar(10) NOT NULL,
  `Department` text NOT NULL,
  `section` varchar(20) NOT NULL,
  `crn` int(11) NOT NULL,
  PRIMARY KEY (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Department` varchar(25) NOT NULL,
  `DeptName` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Department`),
  UNIQUE KEY `DeptName` (`DeptName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `crn` int(10) NOT NULL AUTO_INCREMENT,
  `semester` varchar(10) NOT NULL,
  `ucid` varchar(10) NOT NULL,
  `coursename` varchar(25) NOT NULL,
  `coursenumber` varchar(10) NOT NULL,
  `sectionnumber` varchar(10) NOT NULL,
  `grade` int(6) NOT NULL,
  `active` varchar(5) NOT NULL,
  PRIMARY KEY (`crn`),
  UNIQUE KEY `crn` (`crn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`crn`, `semester`, `ucid`, `coursename`, `coursenumber`, `sectionnumber`, `grade`, `active`) VALUES
(1, 'Spring2013', 'vp78', 'Pre-Modern History', 'HUM212', '1', 75, 'yes'),
(2, 'Spring2013', 'vp78', 'Pre-Modern History', 'HUM212', '1', 75, 'yes'),
(3, 'Spring2013', 'vp78', 'Software Development', 'CS490', '3', 100, 'yes'),
(4, 'Spring2013', 'vp78', 'Mobile App Dev.', 'IS332', '5', 80, 'yes'),
(5, 'Spring2013', 'vp78', 'Individualized Fitness', 'PE111', '6', 94, 'yes'),
(6, 'Spring2013', 'vp78', 'Digital Crime', 'IT332', '1', 100, 'yes'),
(7, 'Spring2013', 'gt35', 'Roman Helenistic History', 'HIS352', '5', 75, 'yes'),
(8, 'Spring2013', 'gt35', 'Software Development', 'CS490', '4', 100, 'yes'),
(9, 'Spring2013', 'gt35', 'Networking', 'CS356', '3', 95, 'yes'),
(10, 'Spring2013', 'gt35', 'Advanced Data Structures&', 'CS435', '2', 35, 'yes'),
(11, 'Spring2013', 'gt35', 'Vector Analysis', 'MAT335', '1', 15, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `coursenumber` varchar(10) NOT NULL,
  `sectionnumber` varchar(10) NOT NULL,
  `teacher` varchar(10) NOT NULL COMMENT 'teacher ucid',
  `time` text NOT NULL,
  `location` text NOT NULL,
  `capacity` int(10) NOT NULL,
  PRIMARY KEY (`coursenumber`,`sectionnumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `UCID` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ID` varchar(25) NOT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  `firstName` varchar(25) DEFAULT NULL,
  `class` char(15) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `state` char(15) DEFAULT NULL,
  `zipcode` char(5) DEFAULT NULL,
  `degree` varchar(25) DEFAULT NULL,
  `Department` varchar(25) DEFAULT NULL,
  `Hours` char(5) DEFAULT NULL,
  `Gpa` double DEFAULT NULL,
  PRIMARY KEY (`UCID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `STUDENT_FK` (`Department`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `UCID` varchar(25) NOT NULL,
  `ID` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `FirstName` varchar(25) DEFAULT NULL,
  `Department` varchar(25) DEFAULT NULL,
  `Office` varchar(25) DEFAULT NULL,
  `Phone` char(10) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`UCID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `TEACHER_FK` (`Department`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'each users unique id',
  `ucid` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ucid',
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user pass hashed',
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user full name',
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ucid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ucid`, `password`, `name`, `type`) VALUES
(1, 'vp78', 'password', 'Vrajesh Patel', 'Student'),
(2, 'gt35', 'password', 'Giaspur Tabanagay', 'Student'),
(3, 'abc123', 'teacher', 'John Smith', 'Teacher');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
