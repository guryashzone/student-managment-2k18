-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 03:32 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagment2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_details`
--

CREATE TABLE IF NOT EXISTS `admin_login_details` (
  `sl_no` int(11) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login_details`
--

INSERT INTO `admin_login_details` (`sl_no`, `admin_id`, `admin_password`, `admin_name`) VALUES
(1, 'AD001', 'AD001', 'Admin 01'),
(2, 'AD002', 'AD002', 'Admin 02');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_roll` int(11) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_address` varchar(500) NOT NULL,
  `image_location` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `student_name`, `student_roll`, `student_email`, `student_address`, `image_location`) VALUES
(13, 'Gufd', 51, 'hjg@gg.ckjb', '8u765res', ''),
(14, 'Gufd', 51, 'hjg@gg.ckjb', '8u765res', ''),
(15, 'Guryashj', 5, 'hhg@gg.c', '765r', 'student_images/Screen Shot 2018-09-09 at 13.36.42.'),
(16, 'Guryash', 1, '7654@jh2v.cc', '7654es', 'student_images/17997-desktop-wallpapers-skull.jpg'),
(17, 'Guryash', 1, '7654@jh2v.cc', '7654es', 'student_images/17997-desktop-wallpapers-skull.jpg'),
(18, 'Guryash', 1, '7654@jh2v.cc', '7654es', 'student_images/17997-desktop-wallpapers-skull.jpg'),
(19, 'Guryash', 1, '7654@jh2v.cc', '7654es', 'student_images/17997-desktop-wallpapers-skull.jpg'),
(20, 'Gurt', 7, 'oiuhgfg@kjhgv.nbv', '876545678', 'student_images/chemistryTeacher1.jpg'),
(21, 'Gurt', 7, 'oiuhgfg@kjhgv.nbv', '876545678', 'student_images/chemistryTeacher1.jpg'),
(22, 'Gurt', 7, 'oiuhgfg@kjhgv.nbv', '876545678', 'student_images/chemistryTeacher1.jpg'),
(23, 'Gurt', 7, 'oiuhgfg@kjhgv.nbv', '876545678', 'student_images/chemistryTeacher1.jpg'),
(24, 'Gurt', 7, 'oiuhgfg@kjhgv.nbv', '876545678', 'student_images/chemistryTeacher1.jpg'),
(25, 'Gurt', 7, 'oiuhgfg@kjhgv.nbv', '876545678', 'student_images/chemistryTeacher1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE IF NOT EXISTS `student_login` (
  `sl_no` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  ADD PRIMARY KEY (`sl_no`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
