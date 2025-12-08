-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2025 at 03:28 PM
-- Server version: 10.5.29-MariaDB
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stonebon_highcharts`
--

-- --------------------------------------------------------

--
-- Table structure for table `dari_excel`
--

CREATE TABLE `dari_excel` (
  `id` int(7) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telepon` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dari_excel`
--

INSERT INTO `dari_excel` (`id`, `nama`, `email`, `telepon`) VALUES
(1, 'setiawan', 'setiawan@stonebont.com', '81340643737'),
(2, 'ani hidayati', 'ani@gmail.com', '81351771268'),
(3, 'Inna Zulaikha', 'inna@gmail.com', '81582342192'),
(10, 'zerina', 'zerina@gmail.com', '81340643763'),
(39, 'Amildudin', 'amiludin@gmail.com', '85465432891'),
(40, 'Cantika N', 'cantika@gmail.com', '99876546373'),
(41, 'Joko S', 'joko@gmail.com', '87658766546'),
(42, 'Azmi', 'azmi@gmail.com', '87665765459');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dari_excel`
--
ALTER TABLE `dari_excel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dari_excel`
--
ALTER TABLE `dari_excel`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
