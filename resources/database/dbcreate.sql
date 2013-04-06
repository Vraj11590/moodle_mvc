-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql.njit.edu
-- Generation Time: Apr 06, 2013 at 05:15 PM
-- Server version: 5.0.91
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `thh4`  random change randsafasdklajdljasfjslfdjfljfajf
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseid` varchar(8) NOT NULL,
  `coursename` varchar(40) NOT NULL,
  PRIMARY KEY  (`courseid`),
  UNIQUE KEY `courseid` (`courseid`),
  UNIQUE KEY `coursename` (`coursename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `coursename`) VALUES
('CS100', 'ROADMAP TO COMPUTING'),
('CS101', 'COMP PRO & PROB SOLVING'),
('CS103', 'COMPUT SCI BUSINESS PROB'),
('CS104', 'COMPUT PROG & GRAPH PROB'),
('CS106', 'ROADMAP TO COMPUTING ENGINEERS'),
('CS107', 'COMPUTING AS A CAREER'),
('CS113', 'INTRO COMPUTER SCI I'),
('CS114', 'INTRO COMPUTER SCI II'),
('CS115', 'INTRO COM SCI I C++'),
('CS116', 'INTRO COM SCI II C++'),
('CS241', 'FOUNDATION OF COMPUTER SCIENCE I'),
('CS252', 'COMPUTER ORG & ARCHITECT'),
('CS266', 'GAME MOD DEVELOPMENT'),
('CS280', 'PROGRAMING LANG CONCEPT'),
('CS288', 'INTENSIVE PROGRAMING IN LINUX'),
('CS310', 'WORK EXPERIENCE'),
('CS332', 'PRINCIPLES OF OPER SYS'),
('CS341', 'FOUND OF COMP SCIENCE II'),
('CS345', 'WEB SEARCH'),
('CS490', 'DESIGN IN SOTFWARE ENGINEERING'),
('MATH326', 'MATH THEORY FOR ENGINEER'),
('MATH211', 'CALCULUS III A'),
('MATH111', 'CALCULUS I'),
('MATH112', 'CALCULUS II'),
('MATH213', 'CALCULUS III B'),
('MATH139', 'GENERAL CALCULUS '),
('MATH222', 'DIFERENTIAL EQUATIONS'),
('MATH132', 'CALCULUS B'),
('ENG333', 'CYBER TEXT'),
('ENG340', 'ORAL PRESENTATION'),
('ENG352', 'TECHNICAL WRITING'),
('PHYS121', 'PHYSICS II'),
('PHYS111', 'PHYSICS I'),
('PHYS203', 'EARTH IN SPACE'),
('PHYS234', 'PHYSICS III'),
('HUM101', 'WRITING - SPEAKING - THINKING I'),
('HUM102', 'WRITING - SPEAKING - THINKING II');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `crn` int(3) NOT NULL,
  `ucid` varchar(6) NOT NULL,
  `grade` int(3) default NULL,
  KEY `enrolledFK` (`crn`),
  KEY `ENROLLMENT_FK` (`ucid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`crn`, `ucid`, `grade`) VALUES
(2, 'thh4', 98),
(3, 'thh4', 90),
(5, 'thh4', 100),
(9, 'thh4', 98),
(22, 'thh4', 98),
(27, 'thh4', 87),
(30, 'thh4', 98),
(25, 'thh4', 98),
(2, 'gt35', 98),
(3, 'gt35', 90),
(5, 'gt35', 100),
(9, 'gt35', 98),
(22, 'gt35', 98),
(27, 'gt35', 87),
(30, 'gt35', 98),
(25, 'gt35', 98),
(2, 'vp78', 98),
(3, 'vp78', 90),
(5, 'vp78', 100),
(9, 'vp78', 98),
(22, 'vp78', 98),
(27, 'vp78', 87),
(30, 'vp78', 98),
(25, 'vp78', 98);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `crn` int(3) NOT NULL,
  `pid` int(5) NOT NULL auto_increment,
  `ucid` varchar(6) NOT NULL,
  `text_post` varchar(500) default NULL,
  `post_title` varchar(100) NOT NULL,
  PRIMARY KEY  (`pid`),
  KEY `postFK_1` (`ucid`),
  KEY `postFK_2` (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `teacherid` varchar(6) NOT NULL,
  `courseid` varchar(7) NOT NULL,
  `sectionid` char(3) NOT NULL,
  `crn` int(3) NOT NULL auto_increment,
  `semesterid` int(5) default NULL,
  PRIMARY KEY  (`crn`),
  UNIQUE KEY `crn` (`crn`),
  KEY `sectionFK_1` (`teacherid`),
  KEY `sectionFK_2` (`courseid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`teacherid`, `courseid`, `sectionid`, `crn`, `semesterid`) VALUES
('theo', 'CS490', '001', 1, 20131),
('theo', 'CS280', '004', 2, 20131),
('abc123', 'CS332', '002', 3, 20131),
('abc123', 'CS288', '003', 4, 20131),
('theo', 'CS341', '002', 5, 20131),
('no1', 'MATH326', '002', 6, 20131),
('no1', 'MATH222', '003', 7, 20131),
('no1', 'MATH326', '001', 8, 20131),
('no1', 'MATH112', '004', 9, 20131),
('no2', 'HUM101', '002', 10, 20131),
('no2', 'HUM102', '006', 11, 20131),
('no3', 'PHYS121', '005', 12, 20131),
('no3', 'PHYS111', '003', 13, 20131),
('no3', 'PHYS203', '008', 14, 20131),
('no3', 'PHYS234', '011', 15, 20131),
('theo', 'CS490', '001', 16, 20124),
('theo', 'CS280', '004', 17, 20124),
('abc123', 'CS332', '002', 18, 20124),
('abc123', 'CS288', '003', 19, 20124),
('theo', 'CS341', '002', 20, 20124),
('no1', 'MATH326', '002', 21, 20124),
('no1', 'MATH222', '003', 22, 20124),
('no1', 'MATH326', '001', 23, 20124),
('no1', 'MATH112', '004', 24, 20124),
('no2', 'HUM101', '002', 25, 20124),
('no2', 'HUM102', '006', 26, 20124),
('no3', 'PHYS121', '005', 27, 20124),
('no3', 'PHYS111', '003', 28, 20124),
('no3', 'PHYS203', '008', 29, 20124),
('no3', 'PHYS234', '011', 30, 20124);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ucid` varchar(6) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` char(1) default NULL,
  `name` tinytext,
  PRIMARY KEY  (`ucid`),
  UNIQUE KEY `ucid` (`ucid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ucid`, `password`, `type`, `name`) VALUES
('thh4', 'password', 's', 'Vuong Huynh'),
('gt35', 'password', 's', 'Giaspur Tabangay'),
('vp78', 'password', 's', 'Vrajesh Patel'),
('theo', 'password', 't', 'Theo Nicholson'),
('abc123', 'password', 't', 'John Smith'),
('no1', 'password', 't', 'Rihana Ganga'),
('no2', 'password', 't', 'Zainab Rachel'),
('no3', 'password', 't', 'Brown Will');
