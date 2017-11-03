-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2017 at 11:16 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `degrees` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `degrees`) VALUES
(1, 'Under-Graduate'),
(2, 'Post-Graduate');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `teacher_assigned` varchar(255) NOT NULL,
  `students` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `teacher_assigned`, `students`, `subjects`) VALUES
(2, 'Noman grp', 'Noman Javed', '', ''),
(3, 'none', '', '', ''),
(6, 'justice league', 'faizan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `department`, `email`, `contact`, `group_name`, `image`, `thumbnail`) VALUES
(3, 'Junaidsss', 'Computer Science', 'janaid@namal.edu.pk', '03234938688', 'Noman grp', '', ''),
(4, 'faizan', 'Computer Science', 'faizanshahid0334@gmail.com', '03234938688', 'justice league', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uob` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `uob`, `year`, `email`, `contact`, `group_name`, `department`, `degree`, `image`, `thumbnail`) VALUES
(3, 'Junaid updates', '15026444', 'Year-1', 'faizans2015@namal.edu.pk', '03234938688', 'Noman grp', 'Electrical-Engineering', '', '', ''),
(4, 'Sheharyar sssss', '15026388', 'Year-3', 'sheharyar@gmail.com', '03234938688', 'Noman grp', 'Computer Science', 'Under-Graduate', '', ''),
(6, 'Waleed Khan', '15026401', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(8, 'Usman Farooq', '15026343', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'justice league', 'Computer Science', 'Under-Graduate', '', ''),
(9, 'Usman Farooq', '15026344', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Post-Graduate', '', ''),
(10, 'Usman Farooq', '15026345', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(11, 'Usman Farooq', '15026346', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(12, 'Usman Farooq', '15026347', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(13, 'Usman Farooq', '15026348', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(14, 'Usman Farooq', '15026349', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Post-Graduate', '', ''),
(15, 'Usman Farooq', '15026350', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(16, 'SS updated', '12345432', 'Year-2', 'sheharyar@gmail.com', '03234938688', 'justice league', 'Computer Science', 'Under-Graduate', '', ''),
(19, 'Sheharyar Saleem', '12345934', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'justice league', 'Computer Science', 'Post-Graduate', '', ''),
(20, 'Sheharyar updated', '32345990', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'justice league', 'Electrical-Engineering', 'Under-Graduate', '', ''),
(21, 'Sheharyar Saleem', '12345944', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'none', 'Computer Science', 'Under-Graduate', '', ''),
(22, 'Sheharyar Saleem', '35026388', 'Year-1', 'sheharyar@gmail.com', '03234938688', 'justice league', 'Computer Science', 'Post-Graduate', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `yearly`
--

CREATE TABLE `yearly` (
  `id` int(11) NOT NULL,
  `years` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearly`
--

INSERT INTO `yearly` (`id`, `years`) VALUES
(1, 'Year-1'),
(2, 'Year-2'),
(3, 'Year-3'),
(4, 'Year-4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearly`
--
ALTER TABLE `yearly`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `yearly`
--
ALTER TABLE `yearly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
