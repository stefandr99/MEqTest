-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 10:47 AM
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
(37, 4, 1, 'Hey look! It\'s Something!', '2020-04-09', '2020-04-09 14:07:08'),
(48, 6, 25, 'fuck u dumb bitch', '2020-05-11', '2020-05-11 08:43:46'),
(49, 7, 25, 'fuck the idiot above me thats insulting the theory of cunt u fucking stupid faggot fuck you', '2020-05-11', '2020-05-11 09:35:26'),
(50, 6, 25, 'goddamn retard how about you shoot yourself', '2020-05-11', '2020-05-11 09:35:59'),
(51, 6, 25, '$$fuck you$$', '2020-05-11', '2020-05-11 09:36:23'),
(52, 7, 25, '$$ your probably a little bitch anyway so yea $$', '2020-05-11', '2020-05-11 09:37:28'),
(53, 7, 25, 'what the fuck whyd it do that to my messgae', '2020-05-11', '2020-05-11 09:37:45'),
(54, 8, 25, 'God, I hate minorities', '2020-05-11', '2020-05-11 09:38:34'),
(55, 6, 25, 'god must love you then', '2020-05-11', '2020-05-11 09:39:18'),
(56, 8, 1, 'Sample text', '2020-05-11', '2020-05-11 11:53:25'),
(58, 4, 53, 'asdasdd', '2020-05-13', '2020-05-13 09:02:54'),
(59, 9, 1, 'hello', '2020-05-18', '2020-05-18 07:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL DEFAULT 'No description available',
  `CONTENT` mediumtext NOT NULL,
  `PUBLIC` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`ID`, `ID_USER`, `NAME`, `DESCRIPTION`, `CONTENT`, `PUBLIC`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pythagorean Theorem', 'The Pythagorean theorem, also known as Pythagoras\' theorem, is a fundamental relation in Euclidean geometry among the three sides of a right triangle.', '<p>             The Pythagorean theorem, also known as Pythagoras\' theorem, is a fundamental relation in Euclidean geometry among the three sides of a right triangle. It states that the area of the square whose side is the hypotenuse (the side opposite the right angle) is equal to the sum of the areas of the squares on the other two sides.              <br><br>             This theorem can be written as an equation relating the lengths of the sides a, b and c, often called the \"Pythagorean equation\":         </p>         <div class=\"formula\">             $$ a^2 + b^2 = c^2 $$         </div>         <p style=\"font-weight: bold;\">Proof using similar triangles</p>         <p>This proof is based on the proportionality of the sides of two similar triangles, that is, upon the fact that the ratio of any two corresponding sides of similar triangles is the same regardless of the size of the triangles.</p>                  <div class=\"theory\">             <div class=\"figura\">                  <img src=\"data/post/1/triangle.png\" alt=\"\">             </div>                                <div class=\"formula\">                 $$ \\frac{BC}{AB} = \\frac{BH}{BC} \\ and \\ \\frac{AC}{AB} = \\frac{AH}{AC} $$             </div>             <div class=\"formula\">                 $$ BC^2 = AB \\times BH \\ and \\ AC^2 = AB \\times AH. $$             </div>             <div class=\"formula\">                 $$ BC^2 + AC^2 = AB \\times BH + AB \\times AH = AB \\times (AH + BH) = AB^2, $$             </div>             <div class=\"formula\">                 $$ BC^2 + AC^2 = AC^2 $$             </div>         </div>', 1, '2020-04-09', '2020-04-09 06:34:18'),
(2, 1, 'Fibonacci Formula', 'The Fibonacci formula is used to generate Fibonacci in a recursive sequence.', '<p> The Fibonacci formula is used to generate Fibonacci in a recursive sequence. To recall, the series which is generated by adding the previous two terms is called a Fibonacci series. The first and second term of the Fibonacci series is set as 0 and 1 and it continues till infinity. Observe the following Fibonacci series: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34….                       <p>The Fibonacci Formula is given as </p>         <div class=\"formula\"> $$ F_n = F_{n–1} + F_{n–2} $$ </div>     ', 1, '2020-04-09', '2020-04-09 06:34:18'),
(25, 1, 'The Theory Of Cunt', 'The Theory Of Cunt is a theory founded upon the phenomenon of Cunts', 'The Theory Of Cunt is a theory founded upon the phenomenon of Cunts. Cunts, meaning vaginal canals.&nbsp;<div><br></div><div>The theory suggests that Cunts are the all great blessing of the entire universe, from beginning to end. Cunts bare children, creating entirely new individual special lives to be released into the world. After the life grows, they too begin seeking out Cunts to create life force with.&nbsp;</div><div><br></div><div>Cunts are not merely the biological process upon which living organisms are created. Cunts also encompass and envelop our entire existence; whether that be in our own realities or physical reality itself.&nbsp;</div><div><br></div><div>For example: Cunts do not resemble geometry, geometry resembles Cunts, as cosmic Cunts gave birth to the universe and everything in it thus making shapes possible. From a tunnel to a water bottle, there is always a loose construct that reminds us of our mother: the Cunt. In our day to day lives, we are reminded of human Cunts, the human Cunts guide our subconscious to become a better person in life so that we may end up coming in union with another human to use their Cunt.</div><div><br></div><div>The cycle of reproduction has gone through countless generations of humans. We are all born, acquire some Cunt, grow old, die, and let our children repeat. Our generation and time is temporary, but yet again... this same idea is delineated within a Cunt. Our enjoyment of being inside a Cunt only lasts so long, and so the short term pleasure ends; both for sex and for an infants time in the womb.&nbsp;</div><div><br></div><div>The Cunt represents all forms of beauty in the universe and it\'s origin. It guides us in everything even when we do not realize it.</div>', 1, '2020-05-11', '2020-05-11 09:20:14'),
(26, 1, 'test', '1+2=33+4=55+6=7', '1+2=3<div>3+4=5</div><div>5+6=7</div>', 1, '2020-05-11', '2020-05-11 09:58:58'),
(53, 4, 'aa', 'lalala $$123$$$$\\frac{BC}{AB} = \\frac{BH}{BC} \\ and \\ \\frac{AC}{AB} = \\frac{AH}{AC}$$$$vbvbvb$$$$551$$ xdxd', '$$123$$<div style=\"text-align: center;\">$$asdasdasd$$</div><div style=\"text-align: right;\">$$vbvbvb$$</div><div style=\"text-align: left;\">$$551$$</div>', 1, '2020-05-13', '2020-05-13 08:56:07'),
(55, 10, 'Maths', 'Dracula este titlul unui roman scris în anul 1897 de autorul irlandez Bram Stoker', '<i><b>Dracula</b></i> este titlul unui roman scris în anul <a href=\"https://ro.wikipedia.org/wiki/1897\" title=\"1897\">1897</a> de autorul irlandez <a href=\"https://ro.wikipedia.org/wiki/Bram_Stoker\" title=\"Bram Stoker\">Bram Stoker</a>. Personajul principal al romanului este contele <a href=\"https://ro.wikipedia.org/wiki/Dracula\" class=\"mw-redirect mw-disambig\" title=\"Dracula\">Dracula</a> (Graf Dracula), devenit unul dintre cei mai renumiți <a href=\"https://ro.wikipedia.org/wiki/Vampir\" class=\"mw-redirect\" title=\"Vampir\">vampiri</a> din literatură. Bram Stoker l-a folosit pe <a href=\"https://ro.wikipedia.org/wiki/Vlad_%C8%9Aepe%C8%99\" title=\"Vlad Țepeș\">Vlad Țepeș</a> ca sursă de inspirație pentru romanul <i>Dracula</i>. Tot Bram Stoker a avut ideea să asocieze legenda domnitorului muntean cu <a href=\"https://ro.wikipedia.org/wiki/Liliac\" class=\"mw-disambig\" title=\"Liliac\">liliacul</a> hematofag (<i><a href=\"https://ro.wikipedia.org/w/index.php?title=Desmodus_rotundus&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Desmodus rotundus — pagină inexistentă\">Desmodus rotundus</a></i>) numit și „Vampir”. Romanul a fost de mai multe ori transpus pe ecran, iar rolul contelui jucat de actori ca: <a href=\"https://ro.wikipedia.org/w/index.php?title=Max_Schreck&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Max Schreck — pagină inexistentă\">Max Schreck</a>, <a href=\"https://ro.wikipedia.org/wiki/Christopher_Lee\" title=\"Christopher Lee\">Christopher Lee</a>, <a href=\"https://ro.wikipedia.org/wiki/Bela_Lugosi\" class=\"mw-redirect\" title=\"Bela Lugosi\">Bela Lugosi</a>, <a href=\"https://ro.wikipedia.org/wiki/Klaus_Kinski\" title=\"Klaus Kinski\">Klaus Kinski</a> și <a href=\"https://ro.wikipedia.org/wiki/Gary_Oldman\" title=\"Gary Oldman\">Gary Oldman</a>.\r\n', 1, '2020-05-13', '2020-05-13 13:04:55'),
(58, 4, 'asdasd', 'fdfasfdasf', 'fdfasfdasf', 0, '2020-05-18', '2020-05-18 08:20:40'),
(59, 4, 'xdxdxd', 'xdxdxdxd', 'xdxdxdxd', 0, '2020-05-18', '2020-05-18 08:20:48');

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
(2, 2, 'Quiz', '[\r\n    {\r\n        \"title\":\"Sequence\", \r\n        \"description\":\"Try applying the formula\", \r\n        \"graphicpath\":\"\",\r\n        \"question\":\"Find the next number in the Fibonacci series 0, 1, 1, 2, 3, 5, 8, 13,…… ?\",\r\n        \"answer\":\"21\"\r\n    }\r\n]', '0000-00-00', '2020-04-18 11:14:44'),
(41, 55, 'Quiz', '[]', '2020-05-13', '2020-05-13 13:04:55'),
(44, 58, 'Quiz', '[]', '2020-05-18', '2020-05-18 08:20:40'),
(45, 59, 'Quiz', '[]', '2020-05-18', '2020-05-18 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL COMMENT 'password hash',
  `IMAGE_PATH` longtext DEFAULT '\\data\\user\\default\\defaultavatar.png',
  `score` int(11) NOT NULL,
  `ROLE` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'admin=1, user=0, banned=-1',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `PASSWORD`, `IMAGE_PATH`, `score`, `ROLE`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1234', 'data\\user\\default\\defaultavatar.png', 0, 1, '2020-04-09', '2020-04-09 06:34:18'),
(2, 'theLegend27', 'password', 'data\\user\\default\\defaultavatar.png', 0, 0, '2020-04-09', '2020-04-09 06:34:18'),
(3, 'daigo', 'jwong', 'data\\user\\3\\avatar.png', 0, 0, '2020-04-09', '2020-04-09 06:34:18'),
(4, 'something', '$2y$10$ZgqniCYSwipmtLv9wFD7BeOG2.eTBP24nGmnW/z8qb1z1fVdSYdmO', '', 8, 1, '2020-04-09', '2020-04-09 06:34:18'),
(5, 'tudor', '$2y$10$zr9b60lhgdBalATyPXRfbugGmK3xUnidkExlMScISbxSiRF4O6DJq', 'data\\user\\default\\defaultavatar.png', 0, 0, '2020-04-20', '2020-04-20 13:28:16'),
(6, 'niggerkiller', '$2y$10$UGrWYmHpyr2em1kerR6w8.4JmQRjXIlAvg4jbgTwB4x9fvuvs9RFu', 'data\\user\\default\\defaultavatar.png', 0, -1, '2020-05-11', '2020-05-11 09:43:19'),
(7, 'parrygodsuckspenis', '$2y$10$USPZv9Gjc37Hdx6C4pX54OHJVOMlw.uTrF4XBXaVpq6FyWMSIbgmG', 'data\\user\\default\\defaultavatar.png', 0, -1, '2020-05-11', '2020-05-11 10:34:20'),
(8, 'fisfis', '$2y$10$YKcgfmAe5nO02.ybQr4dGuDMeycDOee13/aMnhL.zT2BsUTx9mk1y', 'data\\user\\default\\defaultavatar.png', 0, 0, '2020-05-11', '2020-05-11 10:38:18'),
(9, 'stefan', '$2y$10$U1MZH8DMoNabJ5Z3djlvvO1xiZcyZb2E3LRePUIuDcgMBMxQN8VT6', 'data\\user\\default\\defaultavatar.png', 0, 1, '2020-05-12', '2020-05-12 13:28:08'),
(10, 'Kvaran Kupus', '$2y$10$cQrXfgKU7lk1YERdGIgbOuRXKWZTxIkiMg8q0.NNeKouQEL0TqH..', 'data\\user\\default\\defaultavatar.png', 0, 0, '2020-05-13', '2020-05-13 13:02:59');

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
  ADD KEY `quizzes_ibfk_1` (`ID_DOCUMENT`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `documents` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
