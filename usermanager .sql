-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usermanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `userscathedrals`
--

CREATE TABLE `userscathedrals` (
  `User_ID` int(4) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `User_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userscathedrals`
--

INSERT INTO `userscathedrals` (`User_ID`, `Username`, `User_Password`) VALUES
(1, 'Rahul', '$2y$10$pcZ5Vu.aFP5e9T0tf7Iuguj9OHTDrfmGaYKfV6HspfJ24MnvJXawy'),
(2, 'Vivek', '$2y$10$tmbEbM2jUVttIgf8dpZ2J.ms.rc7iU/26xwYCZtPSfoKs51Ji2SV2'),
(3, 'Anirban', '$2y$10$Jv.KEsIp7meTkOiJBbbSMuH0qfZIojzyE35GasIhp32OXPHxLbx6W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userscathedrals`
--
ALTER TABLE `userscathedrals`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userscathedrals`
--
ALTER TABLE `userscathedrals`
  MODIFY `User_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
