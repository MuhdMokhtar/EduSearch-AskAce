-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql106.infinityfree.com
-- Generation Time: Jun 20, 2023 at 11:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34466141_edusearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(4) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `AdminEmail` varchar(200) NOT NULL,
  `AdminPassword` varchar(300) NOT NULL,
  `AdminContact` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ComplaintID` int(4) NOT NULL,
  `UserID` int(4) NOT NULL,
  `ExpertID` int(4) NOT NULL,
  `ComplaintType` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `ExpertID` int(4) NOT NULL,
  `ExpertName` varchar(200) NOT NULL,
  `ExpertEmail` varchar(200) NOT NULL,
  `ContactInfo` varchar(20) NOT NULL,
  `ExpertProfilePic` varchar(200) NOT NULL,
  `ExpertPassword` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `ExpertiseID` int(4) NOT NULL,
  `ExpertID` int(4) NOT NULL,
  `ExpertEmail` varchar(200) NOT NULL,
  `ResearchArea` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` int(4) NOT NULL,
  `UserID` int(4) NOT NULL,
  `PostTitle` varchar(100) NOT NULL,
  `PostContent` varchar(1000) NOT NULL,
  `PostStatus` varchar(10) NOT NULL,
  `PostDate` datetime NOT NULL,
  `ExpertID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `UserID`, `PostTitle`, `PostContent`, `PostStatus`, `PostDate`, `ExpertID`) VALUES
(3001, 1001, 'How to answer Web Engineering Question', 'I have a  question regarding web engineering process. Please help me as i don\'t know what i am doing. ', 'Accepted', '2023-06-14 21:43:52', 2001),
(3002, 1002, 'OOP Java Swing Help', 'I am experiencing a problem with Java swing and i need some help to rectify it.', 'Accpeted', '2023-06-14 21:49:46', 2001),
(3003, 1002, 'Malaysian Studies Colonism era question.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Accepted', '2023-06-14 22:26:05', 2001),
(3004, 1002, 'Testing posting with PHP MYSQL', 'I am currently trying to test my new feature of my php mysql project, but i am unsure of it capabilities.', 'Accepted', '2023-06-15 02:13:22', 2001),
(3019, 1001, 'This is a testing post', 'The data you see here is mot relevant and is made for testing use only. Please disregard this message.', 'Accepted', '2023-06-15 11:53:44', 2001);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `PublicationID` int(4) NOT NULL,
  `ExpertID` int(4) NOT NULL,
  `PbTitle` varchar(20) NOT NULL,
  `PbAuthors` varchar(20) NOT NULL,
  `PublicationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(4) NOT NULL,
  `ExpertID` int(4) NOT NULL,
  `PostID` int(4) NOT NULL,
  `UserID` int(4) NOT NULL,
  `RatingVal` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` int(4) NOT NULL,
  `AdminID` int(4) NOT NULL,
  `ReportType` varchar(100) NOT NULL,
  `NumOfReport` int(10) NOT NULL,
  `ReportStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useractivity`
--

CREATE TABLE `useractivity` (
  `ActivityID` int(4) NOT NULL,
  `NumOfPost` int(10) NOT NULL,
  `CommentActivity` varchar(100) NOT NULL,
  `LikesActivity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(4) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `Phone`) VALUES
(1001, 'Muhammad', 'muhammad@gmail.com', '123', ''),
(1002, 'Deylan', 'deylan@gmail.com', '123456', '01234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ComplaintID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ExpertID` (`ExpertID`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`ExpertID`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`ExpertiseID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`PublicationID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `useractivity`
--
ALTER TABLE `useractivity`
  ADD PRIMARY KEY (`ActivityID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ComplaintID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `ExpertID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `ExpertiseID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3022;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `PublicationID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useractivity`
--
ALTER TABLE `useractivity`
  MODIFY `ActivityID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
