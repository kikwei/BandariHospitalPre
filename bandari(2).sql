-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 11:06 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `FULLNAME` varchar(255) NOT NULL,
  `NATIONALID` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `FULLNAME`, `NATIONALID`, `PHONE`, `EMAIL`, `image`, `USERNAME`, `PASSWORD`) VALUES
(19, 'JOSHUA MUTINDA', '32451850', '0707788383', 'joshuamutinda002@gmail.com', 'joshua.jpg', 'joshua', 'f30ebe1096be9727a691d4fe025f9732de3a65cb');

-- --------------------------------------------------------

--
-- Table structure for table `admitted_patients`
--

CREATE TABLE `admitted_patients` (
  `cardnumber` varchar(255) NOT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `Admission_date` datetime DEFAULT NULL,
  `AdmissionStatus` varchar(255) DEFAULT NULL,
  `discharge_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admitted_patients`
--

INSERT INTO `admitted_patients` (`cardnumber`, `ward`, `room`, `Admission_date`, `AdmissionStatus`, `discharge_date`) VALUES
('0000', 'Male Ward', '20', '2017-06-16 10:22:34', 'admitted', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alldiseases`
--

CREATE TABLE `alldiseases` (
  `id` int(250) NOT NULL,
  `diseasename` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alldiseases`
--

INSERT INTO `alldiseases` (`id`, `diseasename`) VALUES
(1, 'malaria'),
(2, 'cancer'),
(3, 'HIV/AIDS'),
(4, 'Tuberculosis'),
(5, 'Asthma'),
(6, 'Typhoid'),
(7, 'Amoeba'),
(8, 'Diabetes'),
(9, 'Blood Pressure');

-- --------------------------------------------------------

--
-- Table structure for table `consultpharm`
--

CREATE TABLE `consultpharm` (
  `id` int(30) NOT NULL,
  `cardnumber` varchar(100) DEFAULT NULL,
  `Drug` varchar(250) DEFAULT NULL,
  `Post_date` datetime DEFAULT NULL,
  `PharmStatus` varchar(50) DEFAULT 'unattended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultpharm`
--

INSERT INTO `consultpharm` (`id`, `cardnumber`, `Drug`, `Post_date`, `PharmStatus`) VALUES
(32, '0000', 'Asprin    200mg x 2,Amoxicillin   500mg x 3,', '2017-06-16 10:16:01', 'ATTENDED');

-- --------------------------------------------------------

--
-- Table structure for table `consult_ward`
--

CREATE TABLE `consult_ward` (
  `cardnumber` varchar(100) NOT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `WardStatus` varchar(30) NOT NULL DEFAULT 'unattended',
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consult_ward`
--

INSERT INTO `consult_ward` (`cardnumber`, `disease`, `post_date`, `WardStatus`, `id`) VALUES
('0000', 'Amoeba,malaria', '2017-06-16 10:15:18', 'attended', 7);

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

CREATE TABLE `deceased` (
  `id` int(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cardnumber` varchar(100) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `nationalid` varchar(50) DEFAULT NULL,
  `birthcert` varchar(50) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `deathdate` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'admitted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deceased`
--

INSERT INTO `deceased` (`id`, `name`, `cardnumber`, `gender`, `nationalid`, `birthcert`, `birthdate`, `deathdate`, `age`, `post_date`, `Status`) VALUES
(3, 'NICHOLUS NKUBU', '0001', 'Male', '23567489', '4567890', '12/13/1977', '17/04/2017', '40', '2017-06-16 10:25:48', 'admitted');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(100) NOT NULL,
  `cardnumber` varchar(250) DEFAULT NULL,
  `Age` int(250) DEFAULT NULL,
  `disease` varchar(100) NOT NULL,
  `post_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `cardnumber`, `Age`, `disease`, `post_date`) VALUES
(22, '1111', 20, 'cancer', '2017-05-17 11:51:53'),
(23, '1111', 20, 'Asthma', '2017-05-17 11:51:53'),
(24, '1111', 20, 'Amoeba', '2017-05-17 11:51:53'),
(25, '1111', 25, 'Blood Pressure', '2017-05-17 12:45:43'),
(26, '1111', 25, 'Asthma', '2017-05-17 12:45:43'),
(27, '1111', 25, 'Amoeba', '2017-05-17 12:45:43'),
(28, '1111', 25, 'HIV/AIDS', '2017-05-25 09:14:48'),
(29, '1111', 25, 'Asthma', '2017-05-25 09:14:48'),
(30, '1111', 25, 'Amoeba', '2017-05-25 09:14:48'),
(31, '1111', 25, 'Blood Pressure', '2017-05-25 00:00:00'),
(32, '1111', 25, 'Asthma', '2017-05-25 00:00:00'),
(33, '1111', 25, 'Amoeba', '2017-05-25 00:00:00'),
(34, '2222', 45, 'Diabetes', '2017-05-25 00:00:00'),
(35, '2222', 45, 'cancer', '2017-05-25 00:00:00'),
(36, '2222', 45, 'Asthma', '2017-05-25 00:00:00'),
(37, '0000', 27, 'malaria', '2017-06-16 00:00:00'),
(38, '0000', 27, 'Amoeba', '2017-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(250) NOT NULL,
  `drugname` varchar(250) DEFAULT NULL,
  `Quantity` int(100) NOT NULL DEFAULT '0',
  `Units` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `drugname`, `Quantity`, `Units`) VALUES
(1, 'Asprin', 400, 'Tablets'),
(2, 'Azinthromycin', 200, 'litres'),
(3, 'Amoxicillin', 550, 'Tablets'),
(4, 'ARVS', 250, 'Tablets'),
(5, 'Lisinopril', 200, 'litres'),
(6, 'Paracetamol', 200, 'Tablets'),
(7, 'Ibrufen', 200, 'Tablets'),
(8, 'Panadol', 200, 'Tablets'),
(9, 'Hydrocodone', 200, 'litres'),
(10, 'Generic Zocor', 200, 'Tablets'),
(11, 'Malaratab', 300, 'Tablets'),
(12, 'ABZ', 300, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `drug_issue_records`
--

CREATE TABLE `drug_issue_records` (
  `id` int(100) NOT NULL,
  `drugname` varchar(250) DEFAULT NULL,
  `Quantity` int(250) DEFAULT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_issue_records`
--

INSERT INTO `drug_issue_records` (`id`, `drugname`, `Quantity`, `post_date`) VALUES
(95, 'Amoxicillin', 200, '2017-06-16'),
(96, 'Amoxicillin', 0, '2017-06-16'),
(97, 'Amoxicillin', 500, '2017-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `tests` varchar(100) DEFAULT NULL,
  `test_date` varchar(20) DEFAULT NULL,
  `results` varchar(100) DEFAULT NULL,
  `results_date` varchar(20) DEFAULT NULL,
  `TestsStatus` varchar(30) DEFAULT 'unattended',
  `ResultsStatus` varchar(30) DEFAULT 'not received',
  `cardnumber` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`tests`, `test_date`, `results`, `results_date`, `TestsStatus`, `ResultsStatus`, `cardnumber`, `id`) VALUES
('Amoeba Test,Malaria Test', '2017-06-16 10:14:55', 'malaria found\r\namoeba not found', '2017-06-16', 'attended', 'received', '0000', 8);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` int(250) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Residential` varchar(100) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `PhoneOfKin` varchar(50) DEFAULT NULL,
  `NationalId` varchar(20) DEFAULT NULL,
  `BirthCertNo` varchar(50) DEFAULT NULL,
  `CardNumber` varchar(255) NOT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(30) NOT NULL DEFAULT 'unattended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`name`, `dob`, `age`, `Gender`, `Residential`, `Phone`, `PhoneOfKin`, `NationalId`, `BirthCertNo`, `CardNumber`, `registration_date`, `Status`) VALUES
('RAHEEM ABDALA', '1991', 27, 'Male', 'MOMBASA', '0756432123', '0756432123', '23564578', '234567824', '0000', '2017-06-16 07:09:44', 'ATTENDED');

-- --------------------------------------------------------

--
-- Table structure for table `patients_disease_record`
--

CREATE TABLE `patients_disease_record` (
  `id` int(100) NOT NULL,
  `cardnumber` varchar(30) DEFAULT NULL,
  `symptoms` varchar(250) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `prescribed_drugs` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT 'unattended',
  `TreatmentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_disease_record`
--

INSERT INTO `patients_disease_record` (`id`, `cardnumber`, `symptoms`, `disease`, `prescribed_drugs`, `Status`, `TreatmentDate`) VALUES
(30, '0000', '-headache\r\n-pain in joints\r\n-fever', 'Amoeba,malaria', 'Asprin    200mg x 2,Amoxicillin   500mg x 3,', 'attended', '2017-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` varchar(255) DEFAULT NULL,
  `PFNumber` varchar(250) DEFAULT NULL,
  `nationalid` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `staff_access` varchar(30) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `PFNumber`, `nationalid`, `department`, `phone`, `email`, `image`, `username`, `password`, `staff_access`) VALUES
('WILLIAM LANGATT', 'BD/104/17', '32378955', 'LABORATORY', '0707567432', 'willy@yahoo.com', 'willy.JPG', 'willy', '2936eca1ff4d69a5e0e44c7a77e8254c3f5d0056', 'active'),
('CS LEE JOSHUA', 'BD/105/17', '32458955', 'PHARMACY', '0707788383', 'lee@gmail.com', 'lee.JPG', 'lee', 'bd260f67c5937f9a6062bc8e3b67af62b85ef139', 'active'),
('FAITH JULIUS SYOKAU', 'BD/103/17', '32478955', 'WARD', '0715567432', 'faith@yahoo.com', 'faith.jpg', 'faith', 'c07aaecdc4ef524932c66881ea87d4dd64cb3d3b', 'active'),
('SHADRACK KIPRONO', 'BD/101/17', '32543213', 'RECEPTION', '0723456765', 'shady@gmail.com', 'shady.jpg', 'shady', '82629b1cf3ebe9adaa38e9c5709916d2b6cc4351', 'active'),
('LAWRENCE LANGAT', 'BD/102/17', '32678955', 'CONSULTATION', '0734567432', 'law@hotmail.com', 'law.JPG', 'law', 'b699400e5f620c466d32b8b03f8979d2ade7ea9c', 'active'),
('CELESTINE SHANIKWA', 'BD/106/17', '32768955', 'MORTUARY', '0708888383', 'celestine@yahoo.com', 'celestine.jpg', 'celestine', '1696c962e186e56fbe25586bfffaa6cbd485a246', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(250) NOT NULL,
  `testname` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `testname`) VALUES
(1, 'Malaria Test'),
(2, 'HIV Test'),
(3, 'Pregnancy Test'),
(4, 'STI Test'),
(5, 'Amoeba Test'),
(6, 'Typhoid Test'),
(7, 'Prostate Cancer Test'),
(8, 'X-ray');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admitted_patients`
--
ALTER TABLE `admitted_patients`
  ADD PRIMARY KEY (`cardnumber`);

--
-- Indexes for table `alldiseases`
--
ALTER TABLE `alldiseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultpharm`
--
ALTER TABLE `consultpharm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consult_ward`
--
ALTER TABLE `consult_ward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_issue_records`
--
ALTER TABLE `drug_issue_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`CardNumber`);

--
-- Indexes for table `patients_disease_record`
--
ALTER TABLE `patients_disease_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nationalid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `alldiseases`
--
ALTER TABLE `alldiseases`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `consultpharm`
--
ALTER TABLE `consultpharm`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `consult_ward`
--
ALTER TABLE `consult_ward`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `drug_issue_records`
--
ALTER TABLE `drug_issue_records`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `patients_disease_record`
--
ALTER TABLE `patients_disease_record`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
