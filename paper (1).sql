-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2019 at 05:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paper`
--

-- --------------------------------------------------------

--
-- Table structure for table `paper1`
--

CREATE TABLE `paper1` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `paper_type` text NOT NULL,
  `journal_name` varchar(25) NOT NULL,
  `volume` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper1`
--

INSERT INTO `paper1` (`id`, `author`, `paper_type`, `journal_name`, `volume`, `year`) VALUES
(8, 'Rajaram Singh', 'Fortnight', 'Punjab Kesari', '2', '2005'),
(9, 'Raman', 'raghava', 'gitanjali', '2015', '5'),
(20, 'Karan', 'Singare', 'jkdfs', '2016', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper1`
--
ALTER TABLE `paper1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paper1`
--
ALTER TABLE `paper1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
