-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 03:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_phase1`
--

CREATE TABLE `assign_phase1` (
  `assign_phase1_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `evaluator` int(11) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_phase1`
--

INSERT INTO `assign_phase1` (`assign_phase1_id`, `group_id`, `evaluator`, `marker`) VALUES
(3, 4, 21, 0),
(4, 8, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assign_phase2`
--

CREATE TABLE `assign_phase2` (
  `assign_phase2_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `evaluator` int(11) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_phase2`
--

INSERT INTO `assign_phase2` (`assign_phase2_id`, `group_id`, `evaluator`, `marker`) VALUES
(3, 4, 21, 0),
(4, 8, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assign_proposal`
--

CREATE TABLE `assign_proposal` (
  `assign_proposal_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `evaluator` int(11) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_proposal`
--

INSERT INTO `assign_proposal` (`assign_proposal_id`, `group_id`, `evaluator`, `marker`) VALUES
(4, 4, 21, 0),
(5, 7, 21, 0),
(6, 8, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `supervisor`, `student`, `sender`, `marker`) VALUES
(14, 'Assalam o Alikum respected maam\r\n', 28, 31, 'student', 0),
(15, 'I have a query about our project\r\n\r\n', 28, 31, 'student', 0),
(16, 'can we arrange meeting?', 28, 31, 'student', 0),
(17, 'Yes why not', 28, 31, 'supervisor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `dates_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`dates_id`, `startdate`, `enddate`) VALUES
(1, '2020-06-14', '2020-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `evaluate_phase1`
--

CREATE TABLE `evaluate_phase1` (
  `evaluate_phase1_id` int(11) NOT NULL,
  `ph1_marks` int(3) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `marker` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluate_phase1`
--

INSERT INTO `evaluate_phase1` (`evaluate_phase1_id`, `ph1_marks`, `remarks`, `marker`, `user_id`, `group_id`) VALUES
(9, 99, 'evaluated', 0, 23, 4),
(10, 88, 'Good', 0, 24, 4),
(11, 99, 'evaluated', 0, 31, 8),
(12, 75, 'Pass', 1, 32, 8),
(13, 66, 'Pass', 0, 33, 8);

-- --------------------------------------------------------

--
-- Table structure for table `evaluate_phase2`
--

CREATE TABLE `evaluate_phase2` (
  `evaluate_phase2_id` int(11) NOT NULL,
  `ph2_marks` int(3) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `marker` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluate_phase2`
--

INSERT INTO `evaluate_phase2` (`evaluate_phase2_id`, `ph2_marks`, `remarks`, `marker`, `user_id`, `group_id`) VALUES
(8, 90, 'j', 0, 23, 4),
(9, 90, 'hh', 0, 24, 4),
(10, 91, 'good', 1, 31, 8),
(11, 90, 'good', 1, 32, 8),
(12, 90, 'pass', 0, 33, 8);

-- --------------------------------------------------------

--
-- Table structure for table `evaluate_proposal`
--

CREATE TABLE `evaluate_proposal` (
  `evaluate_proposal_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `marker` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluate_proposal`
--

INSERT INTO `evaluate_proposal` (`evaluate_proposal_id`, `status`, `remarks`, `marker`, `group_id`) VALUES
(3, 'Approved', 'Pass', 0, 4),
(4, 'Approved', 'sdg', 1, 7),
(5, 'Approved', 'Fair', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `username`, `email`, `contact`, `domain`, `date_created`) VALUES
(6, 'Humayuon', 'humayuon@cuilahore.edu.pk', 3060423224, 'Web Development', '2020-06-16 16:54:06'),
(8, 'Bilal', 'bilal@cuilahore.edu.pk', 2145698745, 'Machine learning', '2020-06-16 17:39:36'),
(9, 'Hamad', 'hamad@cuilahore.edu.pk', 3254987546, 'Machine learning', '2020-06-16 18:11:33'),
(10, 'Abid', 'abid@cuilahore.edu.pk', 3060423229, 'App development', '2020-06-16 18:14:42'),
(11, 'Shaista', 'shaista@cuilahore.edu.pk', 2145698745, 'App development', '2020-07-26 23:00:54'),
(12, 'Imran', 'imran@cuilahore.edu.pk', 3254987546, 'Machine learning', '2020-07-26 23:01:29'),
(13, 'Kanwal', 'kanwal@cuilahore.edu.pk', 3060423224, 'Web development', '2020-07-26 23:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `groupp`
--

CREATE TABLE `groupp` (
  `group_id` int(11) NOT NULL,
  `project_title` varchar(50) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupp`
--

INSERT INTO `groupp` (`group_id`, `project_title`, `project_description`, `date_created`, `user_id`) VALUES
(4, 'FYP management system', 'zzz', '2020-06-16 18:16:32', 23),
(5, 'Play Games', 'dgb', '2020-07-26 00:43:59', 27),
(6, 'Online education', 'xcvbd', '2020-07-26 00:44:33', 26),
(7, 'World Cup', 'xzvbn', '2020-07-26 00:45:10', 25),
(8, 'Word Search', 'word search website', '2020-07-26 23:06:53', 31);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `group_id`, `user_id`, `date_added`) VALUES
(6, 4, 23, '2020-06-16 18:16:32'),
(7, 4, 24, '2020-06-16 18:16:56'),
(8, 5, 27, '2020-07-26 00:43:59'),
(9, 6, 26, '2020-07-26 00:44:33'),
(10, 7, 25, '2020-07-26 00:45:10'),
(11, 8, 31, '2020-07-26 23:06:54'),
(12, 8, 32, '2020-07-26 23:07:17'),
(13, 8, 33, '2020-07-26 23:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `phase1`
--

CREATE TABLE `phase1` (
  `phase1_id` int(11) NOT NULL,
  `upload_file` blob NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase1`
--

INSERT INTO `phase1` (`phase1_id`, `upload_file`, `date_uploaded`, `user_id`, `marker`) VALUES
(4, 0x506861736520312e646f6378, '2020-06-16 19:04:34', 23, 0),
(5, 0x53657175656e6365204469616772616d2e646f6378, '2020-07-26 23:18:39', 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phase1dates`
--

CREATE TABLE `phase1dates` (
  `phase1dates_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase1dates`
--

INSERT INTO `phase1dates` (`phase1dates_id`, `startdate`, `enddate`) VALUES
(1, '2020-07-01', '2020-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `phase2`
--

CREATE TABLE `phase2` (
  `phase2_id` int(11) NOT NULL,
  `upload_file` blob NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase2`
--

INSERT INTO `phase2` (`phase2_id`, `upload_file`, `date_uploaded`, `user_id`, `marker`) VALUES
(3, 0x506861736520322e646f6378, '2020-06-20 17:32:14', 23, 0),
(4, 0x546573742043617365732e646f6378, '2020-07-26 23:18:57', 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phase2dates`
--

CREATE TABLE `phase2dates` (
  `phase2dates_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase2dates`
--

INSERT INTO `phase2dates` (`phase2dates_id`, `startdate`, `enddate`) VALUES
(1, '2020-07-12', '2020-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposal_id` int(11) NOT NULL,
  `upload_file` varchar(50) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `marker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposal_id`, `upload_file`, `date_uploaded`, `user_id`, `marker`) VALUES
(5, 'Proposal.docx', '2020-06-16 18:19:14', 23, 0),
(6, 'summary.docx', '2020-07-26 01:26:10', 27, 0),
(7, 'summary.docx', '2020-07-26 23:08:33', 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `email`, `password`, `access`, `date_created`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', 5, '2020-06-14 00:00:00'),
(19, 'Humayuon', 'humayuon@cuilahore.edu.pk', '1234', 1, '2020-06-16 18:12:18'),
(20, 'Bilal', 'bilal@cuilahore.edu.pk', '1234', 3, '2020-06-16 18:12:40'),
(21, 'Hamad', 'hamad@cuilahore.edu.pk', '1234', 4, '2020-06-16 18:13:51'),
(22, 'Abid', 'abid@cuilahore.edu.pk', '1234', 3, '2020-06-16 18:15:04'),
(23, 'Zinneera Waheed', 'zinneerawaheed@cuilahore.edu.pk', '1234', 2, '2020-06-16 18:16:08'),
(24, 'Bisma Ahmad', 'bisma@cuilahore.edu.pk', '1234', 2, '2020-06-16 18:16:56'),
(25, 'Fahad', 'fahad@cuilahore.edu.pk', '1234', 2, '2020-07-26 00:36:12'),
(26, 'Fatima', 'fatima@cuilahore.edu.pk', '1234', 2, '2020-07-26 00:36:42'),
(27, 'Farwah', 'farwah@cuilahore.edu.pk', '1234', 2, '2020-07-26 00:37:20'),
(28, 'Shaista', 'shaista@cuilahore.edu.pk', '1234', 3, '2020-07-26 23:02:45'),
(29, 'Kanwal', 'kanwal@cuilahore.edu.pk', '1234', 3, '2020-07-26 23:03:55'),
(30, 'Imran', 'imran@cuilahore.edu.pk', '1234', 4, '2020-07-26 23:04:17'),
(31, 'Hamza', 'hamza@gmail.com', '1234', 2, '2020-07-26 23:06:06'),
(32, 'Fehman', 'fehman@gmail.com', '1234', 2, '2020-07-26 23:07:16'),
(33, 'Rabia', 'rabia@gmail.com', '1234', 2, '2020-07-26 23:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `select_supervisor`
--

CREATE TABLE `select_supervisor` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `select_supervisor`
--

INSERT INTO `select_supervisor` (`id`, `supervisor_id`, `group_id`, `user_id`) VALUES
(4, 20, 4, 23),
(5, 20, 5, 27),
(6, 20, 6, 26),
(7, 28, 8, 31);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `username`, `email`, `contact`, `date_created`) VALUES
(6, 'Bisma Ahmad', 'bisma@cuilahore.edu.pk', 3045612879, '2020-06-16 18:01:29'),
(7, 'Zinneera Waheed', 'zinneerawaheed@cuilahore.edu.pk', 3164484336, '2020-06-16 18:02:02'),
(8, 'Zoha Bilal', 'zohabilal@cuilahore.edu.pk', 3164484336, '2020-06-16 18:02:21'),
(9, 'Farwah', 'farwah@cuilahore.edu.pk', 3045612879, '2020-06-16 18:02:48'),
(10, 'Fatima', 'fatima@cuilahore.edu.pk', 3045612879, '2020-06-16 18:03:05'),
(11, 'Fahad', 'fahad@cuilahore.edu.pk', 3060423224, '2020-06-16 18:03:28'),
(12, 'Fehman', 'fehman@gmail.com', 3045612879, '2020-07-26 23:04:45'),
(13, 'Rabia', 'rabia@gmail.com', 12032564789, '2020-07-26 23:05:10'),
(14, 'Hamza', 'hamza@gmail.com', 2315647895, '2020-07-26 23:05:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_phase1`
--
ALTER TABLE `assign_phase1`
  ADD PRIMARY KEY (`assign_phase1_id`),
  ADD KEY `FK` (`group_id`) USING BTREE;

--
-- Indexes for table `assign_phase2`
--
ALTER TABLE `assign_phase2`
  ADD PRIMARY KEY (`assign_phase2_id`),
  ADD KEY `FK` (`group_id`) USING BTREE;

--
-- Indexes for table `assign_proposal`
--
ALTER TABLE `assign_proposal`
  ADD PRIMARY KEY (`assign_proposal_id`),
  ADD KEY `FK` (`group_id`) USING BTREE;

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor` (`supervisor`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`dates_id`);

--
-- Indexes for table `evaluate_phase1`
--
ALTER TABLE `evaluate_phase1`
  ADD PRIMARY KEY (`evaluate_phase1_id`),
  ADD KEY `FK` (`group_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `evaluate_phase2`
--
ALTER TABLE `evaluate_phase2`
  ADD PRIMARY KEY (`evaluate_phase2_id`),
  ADD KEY `FK` (`group_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `evaluate_proposal`
--
ALTER TABLE `evaluate_proposal`
  ADD PRIMARY KEY (`evaluate_proposal_id`),
  ADD UNIQUE KEY `FK` (`group_id`) USING BTREE;

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `groupp`
--
ALTER TABLE `groupp`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `FK` (`user_id`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `FK` (`group_id`) USING BTREE,
  ADD KEY `FK1` (`user_id`) USING BTREE;

--
-- Indexes for table `phase1`
--
ALTER TABLE `phase1`
  ADD PRIMARY KEY (`phase1_id`),
  ADD KEY `FK` (`user_id`) USING BTREE;

--
-- Indexes for table `phase1dates`
--
ALTER TABLE `phase1dates`
  ADD PRIMARY KEY (`phase1dates_id`);

--
-- Indexes for table `phase2`
--
ALTER TABLE `phase2`
  ADD PRIMARY KEY (`phase2_id`),
  ADD KEY `FK` (`user_id`) USING BTREE;

--
-- Indexes for table `phase2dates`
--
ALTER TABLE `phase2dates`
  ADD PRIMARY KEY (`phase2dates_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposal_id`),
  ADD KEY `FK` (`user_id`) USING BTREE;

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `select_supervisor`
--
ALTER TABLE `select_supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`group_id`) USING BTREE,
  ADD KEY `Fk1` (`user_id`) USING BTREE,
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_phase1`
--
ALTER TABLE `assign_phase1`
  MODIFY `assign_phase1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assign_phase2`
--
ALTER TABLE `assign_phase2`
  MODIFY `assign_phase2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assign_proposal`
--
ALTER TABLE `assign_proposal`
  MODIFY `assign_proposal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `dates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluate_phase1`
--
ALTER TABLE `evaluate_phase1`
  MODIFY `evaluate_phase1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `evaluate_phase2`
--
ALTER TABLE `evaluate_phase2`
  MODIFY `evaluate_phase2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `evaluate_proposal`
--
ALTER TABLE `evaluate_proposal`
  MODIFY `evaluate_proposal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `groupp`
--
ALTER TABLE `groupp`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phase1`
--
ALTER TABLE `phase1`
  MODIFY `phase1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phase1dates`
--
ALTER TABLE `phase1dates`
  MODIFY `phase1dates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phase2`
--
ALTER TABLE `phase2`
  MODIFY `phase2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phase2dates`
--
ALTER TABLE `phase2dates`
  MODIFY `phase2dates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `select_supervisor`
--
ALTER TABLE `select_supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_phase1`
--
ALTER TABLE `assign_phase1`
  ADD CONSTRAINT `assign_phase1_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_phase2`
--
ALTER TABLE `assign_phase2`
  ADD CONSTRAINT `assign_phase2_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_proposal`
--
ALTER TABLE `assign_proposal`
  ADD CONSTRAINT `assign_proposal_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluate_phase1`
--
ALTER TABLE `evaluate_phase1`
  ADD CONSTRAINT `evaluate_phase1_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluate_phase1_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluate_phase2`
--
ALTER TABLE `evaluate_phase2`
  ADD CONSTRAINT `evaluate_phase2_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluate_phase2_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluate_proposal`
--
ALTER TABLE `evaluate_proposal`
  ADD CONSTRAINT `evaluate_proposal_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groupp`
--
ALTER TABLE `groupp`
  ADD CONSTRAINT `groupp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phase1`
--
ALTER TABLE `phase1`
  ADD CONSTRAINT `phase1_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phase2`
--
ALTER TABLE `phase2`
  ADD CONSTRAINT `phase2_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `select_supervisor`
--
ALTER TABLE `select_supervisor`
  ADD CONSTRAINT `select_supervisor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `select_supervisor_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groupp` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
