-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2022 at 07:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointments`
--

CREATE TABLE `Appointments` (
  `appointmentID` int(10) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `location` char(200) NOT NULL,
  `doctor` char(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `timeCompleted` time NOT NULL,
  `paid_status` tinyint(1) NOT NULL,
  `book_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Appointments`
--

INSERT INTO `Appointments` (`appointmentID`, `user`, `location`, `doctor`, `date`, `time`, `timeCompleted`, `paid_status`, `book_status`) VALUES
(1, 1, '2', '4', '2022-11-03', '11:00:00', '05:25:00', 1, 1),
(2, 1, '1', '1', '2022-10-31', '17:00:00', '02:15:00', 1, 0),
(3, 1, '1', '1', '2022-11-10', '12:00:00', '12:42:00', 1, 1),
(4, 1, '1', '1', '2022-10-31', '17:00:00', '02:16:00', 1, 1),
(5, 1, '1', '1', '2022-10-31', '17:00:00', '02:16:00', 1, 1),
(6, 8, '2', '4', '2022-11-03', '13:00:00', '13:05:00', 1, 1),
(7, 8, '2', '4', '2022-11-03', '13:00:00', '13:56:00', 1, 0),
(8, 8, '2', '4', '2022-11-03', '13:00:00', '13:54:00', 1, 0),
(9, 8, '2', '4', '2022-11-03', '13:00:00', '13:54:00', 1, 0),
(10, 8, '2', '4', '2022-11-03', '13:00:00', '13:56:00', 1, 0),
(11, 8, '2', '4', '2022-11-03', '13:00:00', '13:55:00', 1, 0),
(12, 8, '2', '4', '2022-11-03', '13:00:00', '13:56:00', 1, 0),
(13, 8, '1', '1', '2022-11-22', '10:00:00', '13:56:00', 1, 0),
(14, 8, '1', '1', '2022-11-22', '12:00:00', '13:38:00', 0, 1),
(15, 8, '1', '1', '2022-11-22', '12:00:00', '13:39:00', 0, 1),
(16, 8, '1', '1', '2022-11-22', '12:00:00', '13:44:00', 0, 1),
(17, 8, '1', '1', '2022-11-22', '12:00:00', '13:47:00', 0, 1),
(18, 8, '1', '1', '2022-11-22', '12:00:00', '13:48:00', 0, 1),
(19, 8, '1', '1', '2022-11-22', '12:00:00', '13:49:00', 0, 1),
(20, 8, '1', '1', '2022-11-22', '12:00:00', '13:49:00', 0, 1),
(21, 8, '1', '1', '2022-11-22', '12:00:00', '13:50:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Clinics`
--

CREATE TABLE `Clinics` (
  `clinicid` int(10) UNSIGNED NOT NULL,
  `clinicname` char(255) NOT NULL,
  `cliniclocation` char(255) DEFAULT NULL,
  `cliniccontact` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Clinics`
--

INSERT INTO `Clinics` (`clinicid`, `clinicname`, `cliniclocation`, `cliniccontact`) VALUES
(1, 'NTU Clinic Fullerton', 'Fullerton@NTU', '1233-2323'),
(2, 'NTU Clinic Raffles', 'Raffles@NTU', '1233-2323');

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `doctorid` int(10) UNSIGNED NOT NULL,
  `docname` char(255) NOT NULL,
  `description` text DEFAULT NULL,
  `clinicid` int(11) NOT NULL,
  `image` char(100) NOT NULL,
  `contact` char(10) NOT NULL,
  `joindate` varchar(11) NOT NULL,
  `certexp` varchar(11) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`doctorid`, `docname`, `description`, `clinicid`, `image`, `contact`, `joindate`, `certexp`, `email`, `password`) VALUES
(1, 'Dr. Tan Kim', '				Professional doctor \r\n				', 1, 'img', '1233-2323', '2022-10-07', '2027-10-20', 'doc.tan@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'Dr. Stanford', 'Professional doctor ', 1, 'img', '1233-2323', '2022-10-07', '2027-10-20', 'doc.stan@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'Dr. Tasha', 'Professional Doc', 2, 'img', '1233-2323', '2022-10-07', '', 'doc.tash@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'Dr. Strange', 'Professional Doc', 2, 'img', '1233-2323', '2022-10-07', '', 'doc.strange@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'Dr. Kang', 'Professional Doc', 2, 'img', '1233-2323', '2022-10-07', '', 'doc.kang@clinic.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `userid` int(10) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `image` char(100) NOT NULL,
  `contact` char(10) NOT NULL,
  `nric` char(10) NOT NULL,
  `signupdate` varchar(20) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`userid`, `name`, `image`, `contact`, `nric`, `signupdate`, `birthday`, `email`, `password`) VALUES
(1, 'Update NAME', 'img', '1231-2332', '21321', '2022-10-26', '2022-10-07', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Patient 1', 'img', '1231-2332', '21321', '2022-10-26', '2022-10-07', 'patient@ntu.com', '098f6bcd4621d373cade4e832627b4f6'),
(8, 'Joshua', 'img', '1231-3223', '21321', '2022-10-30', '2022-10-05', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(9, 'Sarah', '', '1231-2332', '21321', '2022-10-30', '2022-09-08', 'test2@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(10, 'name', 'workshop speaker zoom bg.png', '1231-2332', '21321', '2022-10-30', '2022-10-12', 'test3@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointments`
--
ALTER TABLE `Appointments`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `Clinics`
--
ALTER TABLE `Clinics`
  ADD PRIMARY KEY (`clinicid`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`doctorid`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointments`
--
ALTER TABLE `Appointments`
  MODIFY `appointmentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Clinics`
--
ALTER TABLE `Clinics`
  MODIFY `clinicid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `doctorid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
