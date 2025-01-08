-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 11:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminID` int(11) NOT NULL,
  `adminUsername` varchar(30) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminEmail` varchar(60) NOT NULL,
  `adminFirstName` varchar(60) NOT NULL,
  `adminLastName` varchar(60) NOT NULL,
  `adminSchool` int(11) NOT NULL,
  `adminStatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `adminUsername`, `adminPassword`, `adminEmail`, `adminFirstName`, `adminLastName`, `adminSchool`, `adminStatus`) VALUES
(1, 'daddonyone@gmail.com', '123456', 'daddonyone@gmail.com', 'Babangida ', 'Zachariah', 1, 1),
(2, 'saniadamu@gmail.com', '123456', 'saniadamu@gmail.com', 'Adamu', 'Sani', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complainID` int(11) NOT NULL,
  `complainSender` varchar(60) NOT NULL,
  `complainTitle` varchar(200) NOT NULL,
  `complainBody` varchar(1000) NOT NULL,
  `complainDate` varchar(20) NOT NULL,
  `complainStatus` int(11) NOT NULL,
  `complainComment` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complainID`, `complainSender`, `complainTitle`, `complainBody`, `complainDate`, `complainStatus`, `complainComment`) VALUES
(1, 'daddonyone@gmail.com', 'CSC 709 Final Results', 'I hereby wish to request that my final result for csc709 be verified as the awarded score is far below expectation. Thank you.', '2016-12-09', 1, 'Jesus is Lord!!!'),
(2, 'daddonyone@gmail.com ', 'Unfair Play In Test ', 'I hereby wish to complain that the CSC709 test conducted on 26th December, 2017 was not free and fair. Thus, I request that the parameters around the test be investigated', '2016-12-09', 1, 'Jesus is Love!!!'),
(3, 'daddonyone@gmail.com ', 'Test', 'I Missed CSC707 test wich held on 27th December 2017', '2016-12-11', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblinstitution`
--

CREATE TABLE `tblinstitution` (
  `institutionID` int(11) NOT NULL,
  `institutionName` varchar(150) NOT NULL,
  `institutionLogo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinstitution`
--

INSERT INTO `tblinstitution` (`institutionID`, `institutionName`, `institutionLogo`) VALUES
(1, 'Kaduna State University', 'kasu.jpg'),
(2, 'Ahmadu Bello University', 'abu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbllecturer`
--

CREATE TABLE `tbllecturer` (
  `lecturerID` int(11) NOT NULL,
  `lecturerNumber` varchar(25) NOT NULL,
  `lecturerTitle` varchar(30) NOT NULL,
  `lecturerLevel` varchar(30) NOT NULL,
  `lecturerFirstName` varchar(60) NOT NULL,
  `lecturerLastName` varchar(60) NOT NULL,
  `lecturerEmail` varchar(60) NOT NULL,
  `lecturerPhone` varchar(20) NOT NULL,
  `lecturerSchool` int(11) NOT NULL,
  `lecturerPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllecturer`
--

INSERT INTO `tbllecturer` (`lecturerID`, `lecturerNumber`, `lecturerTitle`, `lecturerLevel`, `lecturerFirstName`, `lecturerLastName`, `lecturerEmail`, `lecturerPhone`, `lecturerSchool`, `lecturerPassword`) VALUES
(1, 'KASU/CSC/1011', 'Prof.', '1', 'BABANGIDA', 'ZACHARIAH', 'daddonyone@gmail.com', '07066504742', 1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `studentID` int(11) NOT NULL,
  `studentMatricNumber` varchar(25) NOT NULL,
  `studentFirstName` varchar(60) NOT NULL,
  `studentLastName` varchar(60) NOT NULL,
  `studentEmail` varchar(60) NOT NULL,
  `studentPhone` varchar(20) NOT NULL,
  `studentSchool` int(11) NOT NULL,
  `studentPassword` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`studentID`, `studentMatricNumber`, `studentFirstName`, `studentLastName`, `studentEmail`, `studentPhone`, `studentSchool`, `studentPassword`) VALUES
(1, 'KASU/08/CSC/1011', 'BABANGIDA', 'ZACHARIAH', 'daddonyone@gmail.com', '+60109622964', 1, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complainID`);

--
-- Indexes for table `tblinstitution`
--
ALTER TABLE `tblinstitution`
  ADD PRIMARY KEY (`institutionID`);

--
-- Indexes for table `tbllecturer`
--
ALTER TABLE `tbllecturer`
  ADD PRIMARY KEY (`lecturerID`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblinstitution`
--
ALTER TABLE `tblinstitution`
  MODIFY `institutionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbllecturer`
--
ALTER TABLE `tbllecturer`
  MODIFY `lecturerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
