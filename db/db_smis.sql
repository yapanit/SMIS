-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 05:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smis`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminacc`
--

CREATE TABLE `adminacc` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cog` blob NOT NULL,
  `cor` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studacc`
--

CREATE TABLE `studacc` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studacc`
--

INSERT INTO `studacc` (`stud_id`, `username`, `password`, `email`, `fname`, `mname`, `lname`, `contact`, `sex`, `age`, `address`) VALUES
(1, 'yaps', '123456789', 'johnmelvintinapay456@gmail.com', 'John melvin', 'Binga', 'Tinapay', 2147483647, 'Male', 21, 'Blk 65 L 5 Brgy. Hugo perez Golden horizon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminacc`
--

CREATE TABLE `tbl_adminacc` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminacc`
--

INSERT INTO `tbl_adminacc` (`admin_id`, `fname`, `lname`, `username`, `password`, `email`, `contact`) VALUES
(1, 'Tristan', 'Sangangbayan', 'itan', 'itan', 'sangangbayant@gmail.com', '09072203266'),
(2, 'John Melvin', 'Tinapy', 'yaps', 'yaps', 'johnmelvintinapay456@gmail.com', '09366885142'),
(3, 'Jan Marco', 'Migalbio', 'migalbio', 'migalbio', 'migalbiogm@gmail.com', '09499521761'),
(4, 'Joseph John', 'Samarita', 'opet', 'opet', 'jesamarita22@gmail.com', '09662559939'),
(5, 'Francis Jeff', 'Valencia', 'francis', 'francis', 'mr-jheff1999@gmail.com', '09385929304');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admintrash`
--

CREATE TABLE `tbl_admintrash` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studacc`
--

CREATE TABLE `tbl_studacc` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `bdate` date NOT NULL,
  `bplace` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `cstatus` varchar(20) NOT NULL,
  `mother` varchar(200) NOT NULL,
  `mcontact` varchar(12) NOT NULL,
  `father` varchar(200) NOT NULL,
  `fcontact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studacc`
--

INSERT INTO `tbl_studacc` (`stud_id`, `username`, `password`, `fname`, `mname`, `lname`, `address`, `zip`, `contact`, `email`, `sex`, `age`, `bdate`, `bplace`, `religion`, `nationality`, `cstatus`, `mother`, `mcontact`, `father`, `fcontact`) VALUES
(1, 'itan', 'itan', 'Tristan', 'Martinez', 'Sangangbayan', 'Harasan Indang Cavite', '4122', '09072203266', 'sangangbayant@gmail.com', 'Male', 19, '2000-08-11', 'Trece Martires City', 'Catholic', 'Filipino', 'Single', 'Marilou M. Sangangbayan', '09087695048', 'Emilio M. Sangangbayan', '09193404122'),
(2, 'yaps', '123456789', 'John Melvin ', 'Binga', 'Tinapay', 'Perez', '4109', '09366885142', 'johnmelvintinapay456@gmail.com', 'Male', 21, '2022-06-06', 'Makati City', 'Roman Catholic', 'Filipino', 'Single', 'Sanaria Tinapay', '09265404606', 'Jonathan Tinapay', '09755732108');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studtrash`
--

CREATE TABLE `tbl_studtrash` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `bdate` date NOT NULL,
  `bplace` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `cstatus` varchar(20) NOT NULL,
  `mother` varchar(200) NOT NULL,
  `mcontact` varchar(12) NOT NULL,
  `father` varchar(200) NOT NULL,
  `fcontact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `stud_num` bigint(20) NOT NULL,
  `course` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `gpa` decimal(10,2) NOT NULL,
  `s_type` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminacc`
--
ALTER TABLE `adminacc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studacc`
--
ALTER TABLE `studacc`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_adminacc`
--
ALTER TABLE `tbl_adminacc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_admintrash`
--
ALTER TABLE `tbl_admintrash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studacc`
--
ALTER TABLE `tbl_studacc`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tbl_studtrash`
--
ALTER TABLE `tbl_studtrash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminacc`
--
ALTER TABLE `adminacc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studacc`
--
ALTER TABLE `studacc`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_adminacc`
--
ALTER TABLE `tbl_adminacc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admintrash`
--
ALTER TABLE `tbl_admintrash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_studacc`
--
ALTER TABLE `tbl_studacc`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_studtrash`
--
ALTER TABLE `tbl_studtrash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
