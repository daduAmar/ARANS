-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 07:26 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` int(11) NOT NULL,
  `uname` varchar(80) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `uname`, `pswd`) VALUES
(1, 'admin', 'arans');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignid` int(11) NOT NULL,
  `subid` int(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignid`, `subid`, `content`, `date`) VALUES
(1, 1, 'Maths \r\nDefine set.', '2018-05-29'),
(2, 6, 'Define JOIN operation', '2018-05-29'),
(3, 2, 'What is OOP? Describe.', '2018-05-29'),
(4, 12, 'Analysis of Algorithm', '2018-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(11) NOT NULL,
  `tid` int(50) NOT NULL,
  `stdid` int(50) NOT NULL,
  `subid` int(80) NOT NULL,
  `status` int(40) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`aid`, `tid`, `stdid`, `subid`, `status`, `date`) VALUES
(1, 405, 56, 2, 1, '2018-05-25'),
(2, 405, 57, 2, 1, '2018-05-26'),
(3, 405, 61, 2, 1, '2018-05-27'),
(4, 405, 47, 12, 1, '2018-05-28'),
(5, 405, 50, 12, 1, '2018-05-29'),
(6, 405, 63, 12, 0, '2018-05-29'),
(7, 405, 56, 2, 0, '2018-05-29'),
(8, 405, 57, 2, 0, '2018-05-28'),
(9, 405, 61, 2, 1, '2018-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `nid` int(11) NOT NULL,
  `subid` int(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`nid`, `subid`, `path`, `date`) VALUES
(1, 2, 'uploads/5b0cde497b5902.04405143.docx', '2018-05-29'),
(2, 2, 'uploads/5b0ce00e82ef46.03699816.docx', '2018-05-29'),
(3, 2, 'uploads/5b0ce023c3c7c2.77942899.pdf', '2018-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stdid` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `sem` varchar(40) NOT NULL,
  `uname` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stdid`, `name`, `rollno`, `email`, `sem`, `uname`, `password`, `status`) VALUES
(45, 'Dipsikha Phukan', '13', 'dipphukan@gmail.com', '4th', 'dips', 'dips', NULL),
(46, 'Amarjyoti Gautam', '30', 'amar@gmail.com', '4th', 'amar', 'amar', NULL),
(47, 'Zyandeep Baruah', '3', 'zb@gmail.com', '5th', 'zb3', 'zyan', NULL),
(48, 'Deepak Neog', '5', 'deepak@gmail.com', '3rd', 'deepak5', 'deepak', NULL),
(49, 'Saswati Kotoky', '11', 's@gmail.com', '4th', 'sas11', 'sas', NULL),
(50, 'Neha Baruah', '15', 'nb@gmail.com', '5th', 'nb', 'nb', NULL),
(51, 'Gaurav Das', '1', 'gd@gmail.com', '1st', 'gaurav', 'gaurav', NULL),
(56, 'Sana Jain', '3', 'sj@gmail.com', '2nd', 'sana', 'sana', NULL),
(57, 'Radha Sen', '5', 'rs@gmail.com', '2nd', 'radha', 'radha', NULL),
(58, 'Krishna Saikia', '9', 'ks@gmail.com', '6th', 'krishna', 'krishna', NULL),
(59, 'Silpa Bora', '10', 'sb@gmail.com', '6th', 'silpa', 'silpa', NULL),
(60, 'Chandan Kalita', '14', 'ck@gmail.com', '4th', 'chandan', 'chandan', NULL),
(61, 'Neha Baruah', '15', 'nb@gmail.com', '2nd', 'neha', 'neha', NULL),
(62, 'Munmi Lahon', '29', 'ml@gmail.com', '3rd', 'munmi', 'munmi', NULL),
(63, 'Priya Singh', '17', 'ps@gmail.com', '5th', 'priya', 'priya', NULL),
(64, 'Lata Dutta', '21', 'ld@gmail.com', '3rd', 'lata', 'lata', NULL),
(65, 'Pinak Jyoti Deka', '33', 'pjd@gmail.com', '3rd', 'pinak', 'pinak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `tid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `sem`, `tid`) VALUES
(1, 'Maths', '1st', 406),
(2, 'C++', '2nd', 405),
(3, 'OTQT', '2nd', 406),
(4, 'Science', '3rd', 406),
(5, 'Java', '4th', 406),
(6, 'DBMS-1', '2nd', 405),
(7, 'TOC', '1st', 421),
(8, 'Economics', '2nd', 405),
(9, 'English', '2nd', 406),
(10, 'Hindi', '6th', 421),
(11, 'CC', '5th', 406),
(12, 'DAA', '5th', 405);

-- --------------------------------------------------------

--
-- Table structure for table `s_assignment`
--

CREATE TABLE `s_assignment` (
  `s_upid` int(11) NOT NULL,
  `stdid` int(255) NOT NULL,
  `subid` int(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `s_path` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_assignment`
--

INSERT INTO `s_assignment` (`s_upid`, `stdid`, `subid`, `rollno`, `sem`, `s_path`, `date`) VALUES
(1, 56, 2, '3', '2nd', 'uploads/5b0ce2cc2f63d5.08085240.pdf', '2018-05-29'),
(2, 56, 2, '3', '2nd', 'uploads/5b0ce2fda6a590.15169246.docx', '2018-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(80) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `name`, `email`, `username`, `pswd`, `status`) VALUES
(405, 'John Wilson', 'jw@gmail.com', 'john', '$2y$10$jqyzUSIAn.z1ImmH6Ev7.O9j9Q8OpoobiqMZzp4P4sP1fGAbJmz..', 1),
(406, 'Eden Smith', 'es@gmail.com', 'eden', '$2y$10$XixvtR1r9XKbN8EOn8zoReHvxUiL5nrPbA.23ehV/rbMqkf3P63kW', 1),
(407, 'Chinmoy Dutta', 'cd@gmail.com', 'chinmoy', '$2y$10$dpOx0qLL5McAYzKpOR1sb.nfUnfRIGHUxpxIfb9SJ/MXa1x.Opv.W', NULL),
(408, 'Gita Kalita', 'gk@gmail.com', 'gita', '$2y$10$qfBV3RxxK2TSuMvaVmxKXOpxAdLA1zW9t7.eZOmNy.PdTZ5wt1Fvm', NULL),
(409, 'Ram Singh', 'rs@gmail.com', 'ram', '$2y$10$6qICxxzYkA5aEPZvlZCVguVd8fMFsAAN4YuyRvomAxA4nQoDSJ.we', NULL),
(410, 'Ziya Phukan', 'zp@gmail.com', 'ziya', '$2y$10$Ewok4K6ulbn6j3jo6haVweYxCQ2Td0aaHSvCwizqbvPvIcfz/DDre', NULL),
(411, 'Abhi Hazarika', 'ah@gmail.com', 'abhi', '$2y$10$tdF/0CvT.meI9eGKmUFbeu6Ab5qJl7cSbrLFRWL34Cis1d/yPklb.', NULL),
(412, 'Binita Das ', 'bd@gmail.com', 'binita', '$2y$10$aH7MExCt2YwrJNcuLoVZAux4q74lpPW5VIbgjpsiOi7p0ZInTUu.q', NULL),
(413, 'Sanju Roy', 'sr@gmail.com', 'sanju', '$2y$10$tXz4GXP.2eDE8mvGiVDe6.IC3LoCjmWpsu.0bHD5Svo8Y3M6MmTD.', NULL),
(418, 'Ravi Bora', 'rb@gmail.com', 'ravi', '$2y$10$bn07fSMcir4CxKyyJGukR.F0JURnrQ/J.D4jxwMnt4peK1qFq63yK', NULL),
(419, 'Heena Baishya', 'hb@gmail.com', 'heena', '$2y$10$qopBk1qwxRd7IEyGGyJbT.IlPN4nmfV7QrTGCE8rt83b.ikhl..yi', NULL),
(420, 'Manik Goswami', 'mg@gmail.com', 'manik', '$2y$10$NKLiXQyma3p0RPeB0ojZv.DkhvGT4ynsI2XiNH6zMlTkwdFfZj/ze', NULL),
(421, 'Dushmanta Phukan', 'dp@gmail.com', 'dushmanta', '$2y$10$LPR3N3VASG66GHDekIYE/uRbV2m.tERsdj/4NNcd2vKs3HYmSbIlS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `pswd` (`pswd`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `attendance_ibfk_1` (`tid`),
  ADD KEY `stdid` (`stdid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stdid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`),
  ADD UNIQUE KEY `subname_3` (`subname`),
  ADD KEY `tid` (`tid`),
  ADD KEY `subname` (`subname`) USING BTREE,
  ADD KEY `subname_2` (`subname`) USING BTREE;

--
-- Indexes for table `s_assignment`
--
ALTER TABLE `s_assignment`
  ADD PRIMARY KEY (`s_upid`),
  ADD KEY `subid` (`subid`),
  ADD KEY `stdid` (`stdid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `s_assignment`
--
ALTER TABLE `s_assignment`
  MODIFY `s_upid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`stdid`) REFERENCES `students` (`stdid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_assignment`
--
ALTER TABLE `s_assignment`
  ADD CONSTRAINT `s_assignment_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_assignment_ibfk_2` FOREIGN KEY (`stdid`) REFERENCES `students` (`stdid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
