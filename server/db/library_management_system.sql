-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 05:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_ID` int(10) NOT NULL,
  `isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `accession_number` varchar(10) NOT NULL,
  `date_receive` date NOT NULL,
  `author_number` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` int(5) NOT NULL,
  `edition` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` int(5) NOT NULL,
  `source_fund` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `publisher` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_place` varchar(50) NOT NULL,
  `copyright_year` varchar(4) NOT NULL,
  `year_published` varchar(4) NOT NULL,
  `category` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_description` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `tracing` varchar(50) DEFAULT NULL,
  `archive` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `isbn`, `accession_number`, `date_receive`, `author_number`, `author_lastname`, `author_firstname`, `title`, `copies`, `edition`, `volume`, `pages`, `source_fund`, `cost`, `publisher`, `publication_place`, `copyright_year`, `year_published`, `category`, `physical_description`, `subject`, `status`, `tracing`, `archive`) VALUES
(1, '978-1420968095', '546,2019', '2019-02-21', 'R546', 'Rizal', 'Jose', 'Noli Me Tangere', 6, 'I Edition', '', 0, 'Donation', '0.00', 'Berliner Buchdruckerei-Aktieng', 'Berlin, Germany', '1887', '1887', 'Filipiniana', '', NULL, 'Available', '', 0),
(2, '978-1451552058', '851,2016', '2016-09-07', 'S851', 'Shakespeare', 'William', 'Romeo and Juliet', 4, 'IV Edition', '', 0, 'Donation', '0.00', 'Simon & Schuster', 'CreateSpace Independent Publishing Platform', '1596', '1596', 'Fiction', '', NULL, 'Available', '', 0),
(3, '978-1510761384', '758,2021', '2021-04-13', 'J758', 'Janssen', 'Sarrah', 'The World Almanac and Book of Facts 2021', 1, 'IX Edition', '', 0, 'Donation', '0.00', 'World Almanac', 'United States', '2020', '2020', 'Reference', NULL, NULL, '0', '', 0),
(4, '978-0824831325', '364,2014', '2014-10-24', 'R364', 'Rizal', 'Jose', 'El Filibusterismo', 7, 'VI Edition', '', 0, 'Donation', '0.00', 'University of Hawaii Press', 'Ghent, Belgium', '1891', '1891', 'Filipiniana', '', NULL, 'Available', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `borrow_ID` int(10) NOT NULL,
  `book_ID` int(10) NOT NULL,
  `borrower_ID` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `copies` int(5) NOT NULL,
  `date_issued` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `returned_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL COMMENT 'Borrowed or Returned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`borrow_ID`, `book_ID`, `borrower_ID`, `title`, `copies`, `date_issued`, `due_date`, `returned_date`, `status`) VALUES
(1, 3, 8, 'The World Almanac and Book of Facts 2021', 1, '2023-05-25', '2023-05-28', NULL, 'Borrowed'),
(2, 1, 5, 'Noli Me Tangere', 1, '2023-05-13', '2023-05-17', NULL, 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `borrower_ID` int(10) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `name_extension` varchar(4) DEFAULT NULL,
  `sex` varchar(6) NOT NULL COMMENT 'Male or Female',
  `role` varchar(7) NOT NULL COMMENT 'Student or Teacher',
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 not active, 1 active',
  `deactivate` int(1) NOT NULL DEFAULT 0 COMMENT '0 no, 1 yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`borrower_ID`, `id_number`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `deactivate`) VALUES
(1, '115218060036', 'Banquillo', 'Rieza Marie', 'J', '', 'Female', 'Student', 1, 0),
(2, '546139921556', 'Barbaza', 'John Vincent', 'N', '', 'Male', 'Teacher', 1, 0),
(3, '361224985723', 'Hiponia', 'Roneilita', 'H', '', 'Female', 'Teacher', 1, 0),
(4, '115218060054', 'Miguel', 'Edvenson Jay', 'M', '', 'Male', 'Student', 1, 0),
(5, '201926584', 'Garfin', 'April Jane', 'A', '', 'Female', 'Student', 1, 0),
(6, '1568468896', 'Secugal', 'Kenrick Agustin', 'S', '', 'Male', 'Teacher', 1, 0),
(7, '548921321', 'Alison', 'Ramon', '', 'Jr', 'Male', 'Teacher', 1, 0),
(8, '54684071', 'Sabino', 'Rustia', 'B', '', 'Female', 'Student', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `library_admin`
--

CREATE TABLE `library_admin` (
  `admin_ID` int(3) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `name_extension` varchar(4) DEFAULT NULL,
  `sex` varchar(6) NOT NULL COMMENT 'Male or Female',
  `role` varchar(10) NOT NULL COMMENT 'Admin or Librarian',
  `status` varchar(10) NOT NULL COMMENT '0 not active, 1 active',
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_admin`
--

INSERT INTO `library_admin` (`admin_ID`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `username`, `password`) VALUES
(1, 'Banquillo', 'Rieza Marie', 'J', NULL, 'Female', 'Librarian', '1', 'librarian', 'library123'),
(2, 'Vagilidad', 'Rigel', NULL, NULL, 'Female', 'Librarian', '1', 'rigel.vagilidad', 'rigel12345'),
(3, 'Gallano', 'Leonil', NULL, NULL, 'Male', 'Admin', '1', 'leonil.gallano', 'leonil12345'),
(4, 'Miguel', 'Edvenson Jay', 'M', NULL, 'Male', 'Admin', '1', 'admin', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `admin_ID` int(10) NOT NULL,
  `borrower_ID` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`admin_ID`, `borrower_ID`, `date`, `time_in`, `time_out`) VALUES
(4, 0, '2023-05-16', '17:06:45', '17:07:02'),
(1, 0, '2023-05-16', '17:08:00', '17:08:15'),
(4, 0, '2023-05-16', '17:11:30', NULL),
(4, 0, '2023-05-17', '10:26:40', NULL),
(4, 0, '2023-05-18', '08:57:54', NULL),
(1, 0, '2023-05-18', '09:02:34', NULL),
(1, 0, '2023-05-18', '10:06:45', NULL),
(4, 0, '2023-05-20', '10:12:47', '11:30:00'),
(1, 0, '2023-05-20', '11:30:29', NULL),
(4, 0, '2023-05-20', '16:22:18', NULL),
(4, 0, '2023-05-22', '20:50:06', '20:50:55'),
(4, 0, '2023-05-23', '11:15:39', NULL),
(4, 0, '2023-05-23', '16:18:00', NULL),
(4, 0, '2023-05-23', '17:57:50', '18:29:03'),
(1, 0, '2023-05-23', '18:29:15', '20:06:02'),
(4, 0, '2023-05-23', '20:06:07', '22:15:55'),
(1, 0, '2023-05-23', '22:16:08', '22:22:35'),
(4, 0, '2023-05-23', '22:22:41', '22:30:53'),
(4, 0, '2023-05-23', '22:31:48', '22:31:57'),
(1, 0, '2023-05-23', '22:32:27', NULL),
(4, 0, '2023-05-23', '22:52:38', '23:00:15'),
(1, 0, '2023-05-24', '10:26:21', NULL),
(4, 0, '2023-05-24', '10:46:19', '10:56:14'),
(1, 0, '2023-05-24', '10:56:51', '13:35:05'),
(4, 0, '2023-05-24', '13:35:10', '14:32:44'),
(1, 0, '2023-05-24', '14:32:51', NULL),
(1, 0, '2023-05-25', '09:36:03', NULL),
(1, 0, '2023-05-25', '09:49:35', NULL),
(4, 0, '2023-05-28', '08:07:46', '08:09:54'),
(1, 0, '2023-05-28', '08:10:28', '13:20:23'),
(4, 0, '2023-05-28', '13:20:36', '13:31:49'),
(1, 0, '2023-05-28', '13:39:13', '13:54:30'),
(4, 0, '2023-05-28', '13:54:34', '13:55:39'),
(1, 0, '2023-05-28', '13:55:45', '15:56:20'),
(0, 8, '2023-05-28', '16:29:23', NULL),
(0, 8, '2023-05-28', '16:30:39', NULL),
(4, 0, '2023-05-28', '16:31:17', '16:34:59'),
(0, 5, '2023-05-28', '16:38:00', '16:38:20'),
(4, 0, '2023-05-28', '16:39:22', '16:53:26'),
(1, 0, '2023-05-28', '16:53:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`borrow_ID`),
  ADD KEY `FK book_ID` (`book_ID`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`borrower_ID`);

--
-- Indexes for table `library_admin`
--
ALTER TABLE `library_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrow_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `borrower_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library_admin`
--
ALTER TABLE `library_admin`
  MODIFY `admin_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `FK book_ID` FOREIGN KEY (`book_ID`) REFERENCES `books` (`book_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
