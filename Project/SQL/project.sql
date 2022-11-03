-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2022 at 02:07 PM
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
(1, 1, '2', '3', '2022-11-24', '10:00:00', '20:24:00', 1, 1),
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
(21, 8, '1', '1', '2022-11-22', '12:00:00', '13:50:00', 1, 1),
(22, 1, '1', '1', '2022-11-17', '10:00:00', '19:39:00', 0, 1),
(23, 1, '1', '1', '2022-11-17', '10:00:00', '20:30:00', 0, 0),
(24, 1, '1', '1', '2022-11-17', '10:00:00', '19:44:00', 0, 1),
(25, 1, '1', '1', '2022-11-17', '10:00:00', '19:45:00', 1, 1),
(26, 1, '1', '1', '2022-11-08', '08:00:00', '21:21:00', 1, 1),
(27, 1, '1', '1', '2022-11-08', '09:00:00', '21:21:00', 1, 1),
(28, 1, '1', '1', '2022-11-08', '10:00:00', '21:22:00', 1, 1),
(29, 1, '1', '1', '2022-11-08', '11:00:00', '21:22:00', 1, 1),
(30, 1, '1', '1', '2022-11-08', '12:00:00', '21:23:00', 1, 1),
(31, 1, '1', '1', '2022-11-08', '13:00:00', '21:24:00', 1, 1),
(32, 1, '1', '1', '2022-11-08', '14:00:00', '21:24:00', 1, 1),
(33, 1, '1', '1', '2022-11-08', '15:00:00', '21:25:00', 1, 1),
(34, 1, '1', '1', '2022-11-08', '16:00:00', '21:25:00', 1, 1),
(35, 1, '1', '1', '2022-11-08', '17:00:00', '21:26:00', 1, 1);

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
(1, 'Dr. Mark Liew', 'Professional doctor in the field of family medicine. Dr. Liew is an accredited Family Physician by the College of Family Physicians, Singapore.\r\n				', 1, 'mark_liew.png', '1233-2323', '2022-10-07', '2027-10-20', 'doc.mark@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'Dr. Usman Yousuf', 'Dr. Usman is a family physician who believes in providing holistic and comprehensive care to his patients and their families. He has special interests in managing chronic diseases and performing joint injections for various Orthopaedic conditions such as frozen shoulder, trigger finger, tennis/golfer’s elbow, plantar fasciitis (heel spur), etc.', 1, 'usman_yousaf.png', '1233-2323', '2022-10-07', '2027-10-20', 'doc.usman@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'Dr. Tan Jiayi', 'As a female doctor and a mother of two, Dr Tan is particularly passionate about promoting women’s health in Singapore. Her special interests are contraception, cancer screening, weight management, sexually transmitted disease screening and menopause. She believes that early detection and screening can potentially save lives.', 2, 'tan_jiayi.png', '1233-2323', '2022-10-07', '2028-11-07', 'doc.tan@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'Dr. Thomas Soh', 'Dr Soh believes that maintenance of the elderly patients’ daily functions and optimal management of their chronic conditions can add more life to their remaining years.', 2, 'thomas_soh.png', '1233-2323', '2022-10-07', '2026-08-13', 'doc.soh@clinic.com', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'Dr. Johan Tang', 'Dr. Tang is currently registered as a Family Physician in the registry of Family Physicians in the Ministry of Health (MOH). Besides being involved in the practice of Family Medicine on a day-to-day basis for the past 20 years, he also sees a lot of dermatological cases in a primary care setting. He has a vested interest in non-procedural Aesthetic Dermatology and has built up a significant client base who go to him for treatment of acne vulgaris, hyperpigmentation and anti-aging skin care.', 2, 'johan_tang.png', '1233-2323', '2022-10-07', '2028-03-12', 'doc.tang@clinic.com', '098f6bcd4621d373cade4e832627b4f6');

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
  MODIFY `appointmentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
