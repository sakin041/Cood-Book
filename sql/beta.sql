-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 02:51 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileid` int(10) NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `folderid` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `userid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileid`, `filename`, `folderid`, `created`, `userid`) VALUES
(64, 'kruskal.cpp', 2, '2017-07-28 10:08:47', 1),
(65, 'prim.cpp', 2, '2017-07-28 10:08:47', 1),
(66, 'mul_newton.cpp', 2, '2017-07-28 10:09:14', 1),
(67, 'bfs.cpp', 3, '2017-07-28 10:11:07', 1),
(68, 'dfs.cpp', 3, '2017-07-28 10:11:07', 1),
(69, 'dijkstra.cpp', 3, '2017-07-28 10:11:07', 1),
(70, 'insertion.cpp', 3, '2017-07-28 10:11:07', 1),
(71, 'quick.cpp', 3, '2017-07-28 10:11:07', 1),
(72, 'bellman.cpp', 1, '2017-07-28 10:11:33', 1),
(73, 'bellman.txt', 1, '2017-07-28 10:11:33', 1),
(74, 'posCycle.txt', 1, '2017-07-28 10:11:33', 1),
(75, '01knapsack.cpp', 4, '2017-07-28 10:19:15', 1),
(76, 'activity.cpp', 4, '2017-07-28 10:19:15', 1),
(77, 'kruskal.cpp', 4, '2017-07-28 10:19:15', 1),
(78, 'lcs.cpp', 4, '2017-07-28 10:19:15', 1),
(79, 'prims.cpp', 4, '2017-07-28 10:19:15', 1),
(80, 'activity.cpp', 5, '2017-07-28 10:36:44', 1),
(81, 'divide.asm', 6, '2017-07-28 11:08:32', 1),
(82, 'ActivitySelection.cpp', 7, '2017-07-28 15:39:02', 2),
(83, 'JobSequencing.cpp', 7, '2017-07-28 15:39:02', 2),
(84, 'KnapSack.cpp', 7, '2017-07-28 15:39:02', 2),
(85, '01knapsack.cpp', 8, '2017-07-28 15:39:24', 2),
(86, 'activity.cpp', 8, '2017-07-28 15:39:24', 2),
(87, 'bst.cpp', 9, '2017-07-28 19:58:24', 2),
(88, 'index.php', 10, '2017-07-31 08:06:48', 2),
(89, 'private.xml', 10, '2017-07-31 08:08:41', 2),
(90, 'case check.asm', 11, '2017-07-31 08:10:13', 2),
(91, 'div.asm', 11, '2017-07-31 08:10:13', 2),
(92, 'divide - Copy.asm', 11, '2017-07-31 08:10:13', 2),
(93, 'divide.asm', 12, '2017-07-31 08:31:17', 2),
(94, 'div.asm', 12, '2017-07-31 08:37:16', 2),
(95, 'case check loop.asm', 9, '2017-07-31 08:37:53', 2),
(96, 'even odd.asm', 13, '2017-07-31 08:42:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `folderid` int(10) NOT NULL,
  `foldername` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `userid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`folderid`, `foldername`, `category`, `created`, `userid`) VALUES
(1, 'graph', 'public', '2017-07-27 19:36:03', 1),
(2, 'dp', 'public', '2017-07-27 21:05:40', 1),
(3, 'stack', 'public', '2017-07-27 21:06:15', 1),
(4, 'matrix', 'public', '2017-07-28 00:00:00', 1),
(5, 'yahoo!!', 'public', '2017-07-28 10:36:33', 1),
(6, 'monir', 'public', '2017-07-28 11:08:12', 1),
(7, 'fol one', 'public', '2017-07-28 15:38:43', 2),
(8, 'repack', 'public', '2017-07-28 15:39:12', 2),
(9, 'after snacks', 'public', '2017-07-28 19:58:10', 2),
(10, 'another', 'public', '2017-07-31 08:06:00', 2),
(11, 'foltest', 'public', '2017-07-31 08:09:52', 2),
(12, 'private1', 'private', '2017-07-31 08:31:06', 2),
(13, 'pri2', 'private', '2017-07-31 08:42:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `follower` int(10) NOT NULL,
  `followed` int(10) NOT NULL,
  `followdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`follower`, `followed`, `followdate`) VALUES
(1, 2, NULL),
(2, 1, NULL),
(3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `lid` int(10) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `fileid` int(10) DEFAULT NULL,
  `liketime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`lid`, `userid`, `fileid`, `liketime`) VALUES
(17, 2, 64, '2017-07-28 19:54:32'),
(18, 2, 80, '2017-07-28 19:54:57'),
(19, 2, 81, '2017-07-28 19:55:25'),
(20, 2, 73, '2017-07-28 19:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `company` varchar(20) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `pass`, `firstname`, `lastname`, `dob`, `gender`, `email`, `url`, `city`, `country`, `company`, `post`) VALUES
(1, 'steve', '1', 'Steve', 'Hale', '1990-12-30', 'female', '', '', 'New York', 'USA', '', 'full stack dev'),
(2, 'ahsan', '1', 'Ahsan', 'Habib', NULL, 'male', 'ahsan@gmail.com', '', 'Dhaka', 'BD', '', ''),
(3, 'scheid', '1', 'Victor', 'Scheid', '2017-07-18', 'male', 'VictorMScheid@dayrep.com', 'http://naturallawpac.com', 'California', 'USA', 'Record Bar Inc.', 'Dermatologist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `folderid` (`folderid`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`folderid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follower`,`followed`),
  ADD KEY `followed` (`followed`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `fileid` (`fileid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `folderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`folderid`) REFERENCES `folders` (`folderid`);

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`followed`) REFERENCES `users` (`userid`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`fileid`) REFERENCES `files` (`fileid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
