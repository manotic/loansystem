-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 07:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mikopo`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) NOT NULL,
  `groupid` int(10) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `groupid`, `adminid`, `status`, `description`) VALUES
(1, 3, 'user@user.com', 'ACCEPTED', 'fhfhdrtrtrt');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `groupname` varchar(100) NOT NULL,
  `shortname` varchar(10) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `groupemail` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `postaddress` varchar(50) NOT NULL,
  `contactphone` varchar(50) NOT NULL,
  `contactname` varchar(20) NOT NULL,
  `groupadminid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `shortname`, `phonenumber`, `groupemail`, `location`, `postaddress`, `contactphone`, `contactname`, `groupadminid`) VALUES
(7, 'KILEBO KILIMO GROUP', 'KKG', '0745484525', 'group@example.com', 'KIBASILA, UPANGA MASHARIKI, ILALA, DAR ES SALAAM', 'P.O.BOX 3565 DAR ES SALAAM', '0742215532', 'JOE DOE', 'user@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `group_activities`
--

CREATE TABLE `group_activities` (
  `id` int(10) NOT NULL,
  `group_activity` varchar(100) NOT NULL,
  `adminid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_activities`
--

INSERT INTO `group_activities` (`id`, `group_activity`, `adminid`) VALUES
(10, 'USAFIRISHAJI', 'user@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `activities` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL,
  `education` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `firstname`, `lastname`, `gender`, `email`, `phonenumber`, `address`, `activities`, `position`, `education`, `password`, `adminid`, `role`, `status`) VALUES
(3, 'ABASI', 'MUSSA', 'MALE', 'member@example.com', '0745484525', 'MSALATO, KEKO, DAR ES SALAAM', 'BODABODA', 'MEMBER', 'CERTIFICATES', '5f4dcc3b5aa765d61d8327deb882cf99', 'user@user.com', 'member', 'ACCEPTED'),
(4, 'GJjhbjhgdf', 'hfdhhf', 'MALE', 'thdf@jjgjg.fgg', '0745484525', 'MSALATO, KEKO, DAR ES SALAAM', 'MJASIRIAMALI', 'MEMBER', 'O LEVEL', '5f4dcc3b5aa765d61d8327deb882cf99', 'user@user.com', 'member', 'NOT SET'),
(5, 'Joe', 'Doe', 'MALE', 'tyrhx@hy.fdf', '0745484525', 'MSALATO, KEKO, DAR ES SALAAM', 'BODABODA', 'SECRETARY', 'UNIVERSITY', '5f4dcc3b5aa765d61d8327deb882cf99', 'user@user.com', 'member', 'ACCEPTED'),
(6, 'Ezy', 'Joe', 'FEMAILE', 'gfhg@ttgt.gfd', '0745484525', 'MSALATO, KEKO, DAR ES SALAAM', 'MJASIRIAMALI', 'CHAIRPERSON', 'SECONDARY', '5f4dcc3b5aa765d61d8327deb882cf99', 'user@user.com', 'member', 'REJECTED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(4, '', '', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(8, 'John', 'Doe', 'user@user.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_activities`
--
ALTER TABLE `group_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_activities`
--
ALTER TABLE `group_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
