-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 05:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meq`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_DOCUMENT` int(11) NOT NULL,
  `TEXT` varchar(1000) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `ID_USER`, `ID_DOCUMENT`, `TEXT`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu turpis egestas pretium aenean pharetra magna ac.', '2020-04-09', '2020-04-09 06:34:18'),
(4, 3, 1, '題ぼ夕変さド都並ユ残次過げ宇政ニ学妙はン発学フルユリ入東ごなだぜ握文コ業図ごま知支小レ型圧ニマ受劇ナヲユ行事布益るげ', '2020-04-09', '2020-04-09 06:34:18'),
(32, 1, 1, 'test $$ test 1+2+3^2_5 = \\frac{BC}{AB} $$ abc', '2020-04-09', '2020-04-09 12:23:11'),
(34, 1, 1, '<SCRIPT SRC=http://xss.rocks/xss.js></SCRIPT>', '2020-04-09', '2020-04-09 12:39:53'),
(37, 4, 1, 'Hey look! It\'s Something!', '2020-04-09', '2020-04-09 14:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DOCUMENT_PATH` varchar(500) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`ID`, `NAME`, `DOCUMENT_PATH`, `created_at`, `updated_at`) VALUES
(1, 'Pythagorean Theorem', '....postpage.php', '2020-04-09', '2020-04-09 06:34:18'),
(2, 'Another Theorem', '....\register.php', '2020-04-09', '2020-04-09 06:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `ID` int(11) NOT NULL,
  `ID_DOCUMENT` int(11) NOT NULL,
  `CONTENT` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`CONTENT`)),
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`ID`, `ID_DOCUMENT`, `CONTENT`, `created_at`, `updated_at`) VALUES
(1, 1, '[\r\n    {\r\n        \"title\":\"Zip line\", \r\n        \"description\":\"A zip line starts on a platform that is 40 meters above the ground. The anchor for the zip line is 198198198 horizontal meters from the base of the platform.\", \r\n        \"graphicpath\":\"css/resource/quiz/graphic1.png\",\r\n        \"question\":\"How long is the zip line?\",\r\n        \"answer\":\"202\"\r\n    },\r\n    {\r\n        \"title\":\"Treasure hunt\", \r\n        \"description\":\"Peter is making an \'X marks the spot\' flag for a treasure hunt. The flag is made of a square white flag with sides of 121212 centimeters. He will make the \'X\' by stretching red ribbon diagonally from corner to corner.\", \r\n        \"graphicpath\":\"\",\r\n        \"question\":\"How many centimeters of ribbon will Peter need to make the \'X\'?\",\r\n        \"answer\":\"34\"\r\n    }\r\n]', '2020-04-05', '2020-04-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL COMMENT 'password hash',
  `IMAGE_PATH` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `PASSWORD`, `IMAGE_PATH`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1234', 'css/resource/images/avatar1.png', '2020-04-09', '2020-04-09 06:34:18'),
(2, 'theLegend27', 'password', 'css/resource/images/avatar1.png', '2020-04-09', '2020-04-09 06:34:18'),
(3, 'daigo', 'jwong', 'css/resource/images/avatar2.png', '2020-04-09', '2020-04-09 06:34:18'),
(4, 'something', '$2y$10$ZgqniCYSwipmtLv9wFD7BeOG2.eTBP24nGmnW/z8qb1z1fVdSYdmO', NULL, '2020-04-09', '2020-04-09 06:34:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_DOCUMENT` (`ID_DOCUMENT`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DOCUMENT_PATH` (`DOCUMENT_PATH`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `ID_DOCUMENT` (`ID_DOCUMENT`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `documents` (`ID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `documents` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
