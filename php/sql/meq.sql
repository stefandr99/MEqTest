-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 03:30 PM
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

DROP TABLE `comments`;
DROP TABLE `quizzes`;
DROP TABLE `documents`;
DROP TABLE `users`;

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
(37, 4, 1, 'Hey look! It\'s Something!', '2020-04-09', '2020-04-09 14:07:08'),
(43, 4, 2, 'aaa', '2020-04-20', '2020-04-20 12:25:14'),
(44, 5, 2, 'waddup', '2020-04-20', '2020-04-20 12:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL DEFAULT 1,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL DEFAULT 'No description available',
  `CONTENT` mediumtext NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`ID`, `NAME`, `DESCRIPTION`, `CONTENT`, `created_at`, `updated_at`) VALUES
(1, 'Pythagorean Theorem', 'The Pythagorean theorem, also known as Pythagoras\' theorem, is a fundamental relation in Euclidean geometry among the three sides of a right triangle.', '<p>             The Pythagorean theorem, also known as Pythagoras\' theorem, is a fundamental relation in Euclidean geometry among the three sides of a right triangle. It states that the area of the square whose side is the hypotenuse (the side opposite the right angle) is equal to the sum of the areas of the squares on the other two sides.              <br><br>             This theorem can be written as an equation relating the lengths of the sides a, b and c, often called the \"Pythagorean equation\":         </p>         <div class=\"formula\">             $$ a^2 + b^2 = c^2 $$         </div>         <p style=\"font-weight: bold;\">Proof using similar triangles</p>         <p>This proof is based on the proportionality of the sides of two similar triangles, that is, upon the fact that the ratio of any two corresponding sides of similar triangles is the same regardless of the size of the triangles.</p>                  <div class=\"theory\">             <div class=\"figura\">                  <img src=\"data/post/1/triangle.png\" alt=\"\">             </div>                                <div class=\"formula\">                 $$ \\frac{BC}{AB} = \\frac{BH}{BC} \\ and \\ \\frac{AC}{AB} = \\frac{AH}{AC} $$             </div>             <div class=\"formula\">                 $$ BC^2 = AB \\times BH \\ and \\ AC^2 = AB \\times AH. $$             </div>             <div class=\"formula\">                 $$ BC^2 + AC^2 = AB \\times BH + AB \\times AH = AB \\times (AH + BH) = AB^2, $$             </div>             <div class=\"formula\">                 $$ BC^2 + AC^2 = AC^2 $$             </div>         </div>', '2020-04-09', '2020-04-09 06:34:18'),
(2, 'Fibonacci Formula', 'The Fibonacci formula is used to generate Fibonacci in a recursive sequence.', '<p> The Fibonacci formula is used to generate Fibonacci in a recursive sequence. To recall, the series which is generated by adding the previous two terms is called a Fibonacci series. The first and second term of the Fibonacci series is set as 0 and 1 and it continues till infinity. Observe the following Fibonacci series: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34….                       <p>The Fibonacci Formula is given as </p>         <div class=\"formula\"> $$ F_n = F_{n–1} + F_{n–2} $$ </div>     ', '2020-04-09', '2020-04-09 06:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `ID` int(11) NOT NULL,
  `ID_DOCUMENT` int(11) NOT NULL,
  `QUIZ_TITLE` varchar(50) DEFAULT 'Quiz',
  `CONTENT` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`CONTENT`)),
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`ID`, `ID_DOCUMENT`, `QUIZ_TITLE`, `CONTENT`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quiz', '[\r\n    {\r\n        \"title\":\"Zip line\", \r\n        \"description\":\"A zip line starts on a platform that is 40 meters above the ground. The anchor for the zip line is 198198198 horizontal meters from the base of the platform.\", \r\n        \"graphicpath\":\"data/quiz/1/graphic1.png\",\r\n        \"question\":\"How long is the zip line?\",\r\n        \"answer\":\"202\"\r\n    },\r\n    {\r\n        \"title\":\"Treasure hunt\", \r\n        \"description\":\"Peter is making an \'X marks the spot\' flag for a treasure hunt. The flag is made of a square white flag with sides of 121212 centimeters. He will make the \'X\' by stretching red ribbon diagonally from corner to corner.\", \r\n        \"graphicpath\":\"\",\r\n        \"question\":\"How many centimeters of ribbon will Peter need to make the \'X\'?\",\r\n        \"answer\":\"34\"\r\n    }\r\n]', '2020-04-05', '2020-04-05 00:00:00'),
(2, 2, 'Quiz', '[\r\n    {\r\n        \"title\":\"Sequence\", \r\n        \"description\":\"Try applying the formula\", \r\n        \"graphicpath\":\"\",\r\n        \"question\":\"Find the next number in the Fibonacci series 0, 1, 1, 2, 3, 5, 8, 13,…… ?\",\r\n        \"answer\":\"21\"\r\n    }\r\n]', '0000-00-00', '2020-04-18 11:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL COMMENT 'password hash',
  `IMAGE_PATH` longtext DEFAULT 'data\\user\\default\\defaultavatar.png',
  `SCORE` int(5) NOT NULL DEFAULT 0,
  `ADMIN` BOOLEAN NOT NULL DEFAULT FALSE,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `PASSWORD`, `IMAGE_PATH`, `ADMIN`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1234', 'data\\user\\default\\defaultavatar.png', TRUE, '2020-04-09', '2020-04-09 06:34:18'),
(2, 'theLegend27', 'password', 'data\\user\\default\\defaultavatar.png', FALSE, '2020-04-09', '2020-04-09 06:34:18'),
(3, 'daigo', 'jwong', 'data\\user\\3\\avatar.png', FALSE, '2020-04-09', '2020-04-09 06:34:18'),
(4, 'something', '$2y$10$ZgqniCYSwipmtLv9wFD7BeOG2.eTBP24nGmnW/z8qb1z1fVdSYdmO', 'data\\user\\default\\defaultavatar.png', FALSE, '2020-04-09', '2020-04-09 06:34:18'),
(5, 'tudor', '$2y$10$zr9b60lhgdBalATyPXRfbugGmK3xUnidkExlMScISbxSiRF4O6DJq', 'data\\user\\default\\defaultavatar.png', FALSE, '2020-04-20', '2020-04-20 13:28:16');

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
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
