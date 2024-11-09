-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 04:06 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` text,
  `title` text,
  `price` int DEFAULT NULL,
  `image` text,
  `quantity` int DEFAULT NULL,
  `author` text,
  `isbn` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_email`, `title`, `price`, `image`, `quantity`, `author`, `isbn`) VALUES
(1, 'rue@gmail.com', 'Database Principles', 1500, 'img1.jpg', 1, 'Don Gosselin', '9780538745840'),
(3, 'rut1@gmail.com', 'System analysis and design', 1650, 'img3.jpg', 1, 'Jhon w.Satzinger', '9781111534158'),
(7, '', 'SQL Server Programming 2012', 1250, 'img5.jpg', 1, 'Paul Atkinson, Robert Viera', '9780735658226');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` text COLLATE utf8mb4_general_ci NOT NULL,
  `lname` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `ULevel` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `fname`, `lname`, `email`, `password`, `ULevel`) VALUES
(1, 'Phil', 'Coulson', 'pCoulson@gmail.com', '$2y$10$ovNLXhOldz/6ldP.4EZ.2Oe9FywUtSbvcldELnjQViAr.CUKyHZRO', 'Admin'),
(2, 'Daisy', 'Jonson', 'dJonson@gmail.com', '$2y$10$L/pVqeJPthi/l5xnssoK.OmB0REygaBWt2ucsXGciv3d4JuVnEJ5S', 'Admin'),
(3, 'Leo', 'Fitz', 'lFitz', '$2y$10$0EOR3CkKOn/z6kKFezzT2etcQug73bKu7uJ1tU1QlhqrGizg7whwC', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblaorder`
--

DROP TABLE IF EXISTS `tblaorder`;
CREATE TABLE IF NOT EXISTS `tblaorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `book_id` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

DROP TABLE IF EXISTS `tblbooks`;
CREATE TABLE IF NOT EXISTS `tblbooks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` text,
  `title` text,
  `author` text,
  `price` int DEFAULT NULL,
  `isbn` text,
  `quantity` int DEFAULT NULL,
  `Ulevel` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `img`, `title`, `author`, `price`, `isbn`, `quantity`, `Ulevel`) VALUES
(11, 'img1.jpg', 'Database Principles', 'Don Gosselin', 1500, '9780538745840', 4, 'added'),
(10, 'img5.jpg', 'SQL Server Programming 2012', 'Paul Atkinson, Robert Viera', 1250, '9780735658226', 5, 'added'),
(9, 'img4.jpg', 'Pro C# 9 with .Net 5', 'Andrew Troelsen, Philip Japikse', 2000, '9781484269381', 5, 'added'),
(8, 'img2.jpg', 'Php programming with mysql', 'Andre Troelsen', 800, '9780538745840', 5, 'added'),
(7, 'img3.jpg', 'System analysis and design', 'Jhon w.Satzinger', 1650, '9781111534158', 3, 'added'),
(6, 'img1.jpg', 'Database Principles', 'Don Gosselin', 1500, '9780538745840', 4, 'added'),
(5, 'img5.jpg', 'SQL Server Programming 2012', 'Paul Atkinson, Robert Viera', 1250, '9780735658226', 5, 'added'),
(4, 'img4.jpg', 'Pro C# 9 with .Net 5', 'Andrew Troelsen, Philip Japikse', 2000, '9781484269381', 5, 'added'),
(3, 'img2.jpg', 'Php programming with mysql', 'Andre Troelsen', 800, '9780538745840', 5, 'pending'),
(2, 'img3.jpg', 'System analysis and design', 'Jhon w.Satzinger', 1650, '9781111534158', 3, 'added'),
(1, 'img1.jpg', 'Database Principles', 'Don Gosselin', 1500, '9780538745840', 4, 'added'),
(12, 'img3.jpg', 'System analysis and design', 'Jhon w.Satzinger', 1650, '9781111534158', 3, 'added'),
(13, 'img2.jpg', 'Php programming with mysql', 'Andre Troelsen', 800, '9780538745840', 5, 'added'),
(14, 'img4.jpg', 'Pro C# 9 with .Net 5', 'Andrew Troelsen, Philip Japikse', 2000, '9781484269381', 5, 'added'),
(35, 'img6.jpg', 'taff', 'bwak', 234, '12345678', 3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FName` text COLLATE utf8mb4_general_ci NOT NULL,
  `LName` text COLLATE utf8mb4_general_ci NOT NULL,
  `Email` text COLLATE utf8mb4_general_ci NOT NULL,
  `Password` text COLLATE utf8mb4_general_ci NOT NULL,
  `ULevel` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FName`, `LName`, `Email`, `Password`, `ULevel`) VALUES
(1, 'Kyle', 'Doe', 'KyleDoe@gmail.com', '$2y$10$psavEIbDXXDU2A3Np/H0ReIO5Cmw4rn5wV701W96pmRRYjt5b37Sy', 'admin'),
(3, 'Toby', 'Ramsey', 'TRamsey@gmail.com', '$2y$10$gnorjtGdJ/DvtjypM3vD.OR7QmzneulhFKMdGpXl/cfU5drhK694S', 'user'),
(4, 'Katlin', 'Smith', 'kSmith@hotmail.com', '$2y$10$gnorjtGdJ/DvtjypM3vD.OR7QmzneulhFKMdGpXl/cfU5drhK694S', 'user'),
(5, 'Jason', 'Wright', 'JWright@gmail.com', '$2y$10$gnorjtGdJ/DvtjypM3vD.OR7QmzneulhFKMdGpXl/cfU5drhK694S', 'user'),
(8, 'toby', 'rams', 'rotyb@gmail', '$2y$10$ErfN5YidEkzQMR7LHtfGCuwoZthO8ZE8R.jSQJQg4pcSJNOZOer2i', 'user'),
(9, 'Toby', 'Green', 'tGreen@gmail.com', '$2y$10$Zdr7KijVYAp0e4gN3ezo3.Wmv6aFsmpReXp97eC81sWkUVOgugSTq', 'pending'),
(10, 'Jemma', 'Simmons', 'jSimmons@gmail.com', '$2y$10$B1ocjeb.6P9gSghP7KCpru.kXRJutIYtODOYO.W5nAgj5PTennG4a', 'pending'),
(11, 'Tommy', 'Egan', 'tEgan@gmail.com', '$2y$10$HYdcEUuVvStTBz2g01FqVuqW.gQMSDArczpgY8UBGKI/iY5mk87ne', 'pending'),
(17, 'taffy', 'Bwakura', 'bwakura16@gmail.com', '$2y$10$KhRrNEE88Yvd1P.b4Le/weN28xSRQMh0fcPXbx/IelDfFHADcQGN6', 'user'),
(20, 'Rue', 'Masango', 'rue@gmail.com', '$2y$10$NYjrFiamPMPScVlPwD2DFOHOr3HdoMYVM2sxzhnpPbJkSE6UDLi5O', 'user'),
(21, 'rutendo', 'masango', 'rue1@gmail.com', '$2y$10$gWJ2I7ApEhuKeiBCPRzO8.A.HSobJI3njbKDrHeo3.8ruWOKKkfNW', 'pending'),
(22, 'rut', 'masango', 'rut1@gmail.com', '$2y$10$WDVwA3VZ/kSLXXJafqntou.z66EcrZmYNRW5XpTlx5Zraf4iqsEDC', 'user'),
(23, 'rue', 'mas', 'ruemas@gmail.com', '$2y$10$h9RwvBBw0sE7.1t/71IFLOb9bZy8MpH7kAQMmPhhoRxYWfE/4MKki', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
