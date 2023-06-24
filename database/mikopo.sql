-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 04:54 PM
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
  `amount` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `groupid`, `adminid`, `amount`, `status`, `description`) VALUES
(7, 8, 'group@example.com', 75788515, 'IN REVIEW', NULL);

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
(8, 'Group name', 'GPN', '0745484525', 'group@example.com', 'This is the location', 'This is the address', '0742215532', 'Contact Person', 'group@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `group_activities`
--

CREATE TABLE `group_activities` (
  `id` int(10) NOT NULL,
  `group_activity` varchar(100) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `adminid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_activities`
--

INSERT INTO `group_activities` (`id`, `group_activity`, `file_name`, `adminid`) VALUES
(20, 'USAFIRISHAJI', 'Calum Scott No matter what6490661060ea5.txt', 'group@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
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

INSERT INTO `group_members` (`id`, `firstname`, `lastname`, `birthdate`, `gender`, `email`, `phonenumber`, `address`, `activities`, `position`, `education`, `password`, `adminid`, `role`, `status`) VALUES
(8, 'First', 'Member', '1998-04-20', 'MALE', 'member1@example.com', '0745484525', 'p.o.box 254', 'BODABODA', 'MEMBER', 'SECONDARY', '5f4dcc3b5aa765d61d8327deb882cf99', 'group@example.com', 'member', 'ACCEPTED'),
(9, 'Second', 'Member', '1998-06-02', 'MALE', 'member2@example.com', '0745484525', 'p.o.box 254', 'BODABODA', 'MEMBER', 'SECONDARY', '5f4dcc3b5aa765d61d8327deb882cf99', 'group@example.com', 'member', 'ACCEPTED'),
(10, 'Second', 'Member', '2001-02-20', 'MALE', 'member3@example.com', '0745484525', 'p.o.box 254', 'MJASIRIAMALI', 'CHAIRPERSON', 'UNIVERSITY', '5f4dcc3b5aa765d61d8327deb882cf99', 'group@example.com', 'member', 'ACCEPTED'),
(11, 'Fourth', 'Member', '1998-04-20', 'FEMAILE', 'member4@example.com', '0745484525', 'MSALATO, KEKO, DAR ES SALAAM', 'MJASIRIAMALI', 'MEMBER', 'A-LEVEL', '5f4dcc3b5aa765d61d8327deb882cf99', 'group@example.com', 'member', 'GHSDG'),
(12, 'Fifth', 'Member', '1999-01-04', 'FEMAILE', 'member5@example.com', '0745484525', 'MSALATO, KEKO, DAR ES SALAAM', 'BODABODA', 'SECRETARY', 'CERTIFICATES', '5f4dcc3b5aa765d61d8327deb882cf99', 'group@example.com', 'member', 'ACCEPTED');

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
(4, 'Admin', '', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(10, 'Joe', 'Doe', 'joe@doe.com', '1a1dc91c907325c69271ddf0c944bc72', 'user'),
(11, 'Joe', 'Doe', 'group@example.com', '1a1dc91c907325c69271ddf0c944bc72', 'user');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `group_activities`
--
ALTER TABLE `group_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
