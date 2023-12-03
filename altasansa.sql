-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 11:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `altasansa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `nume`, `prenume`, `email`, `password`) VALUES
(0, 'admin', 'admin', 'admin@altasansa.ro', 'admin'),
(1, 'Mascaliuc', 'Iasmina', 'iasmina.mascaliuc03@e-uvt.ro', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productNAME` varchar(255) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `gen` varchar(255) NOT NULL,
  `pret` float NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `nume`, `gen`, `pret`, `img`) VALUES
(51, 'Șapcă Champion', 'barbati', 129.99, 'https://img01.ztat.net/article/spp-media-p1/dfb0640e0c2e47a78f6d7eedc2729665/47e1cf6376224a14bb514e60d2512cc3.jpg?imwidth=1800&filter=packshot'),
(55, 'Tricou Champion', 'barbati', 89.99, 'https://img01.ztat.net/article/spp-media-p1/ec2df6d24857476e9c6d0e8d0f79b752/24cfbcecbe854ac6af4fe9b4fe531432.jpg?imwidth=1800&filter=packshot'),
(56, 'Tricou Nike', 'barbati', 109.99, 'https://img01.ztat.net/article/spp-media-p1/ff13550baf7541f48134fe34e24c6cfc/a948a5dd8a9242e3aa9355d8623fcead.jpg?imwidth=1800&filter=packshot'),
(57, 'Rochie Calvin Klein', 'femei', 139.99, 'https://img01.ztat.net/article/spp-media-p1/553c19fae8d64ac4b5265f60c6a647de/f629fe4ccfae4690add39977931b6dd9.jpg?imwidth=1800&filter=packshot'),
(58, 'Fustă Calvin Klein', 'femei', 329.99, 'https://img01.ztat.net/article/spp-media-p1/0f563609324e4fe9966c171e807ff44b/59fd3b06640e4d5d9bef784e942b665d.jpg?imwidth=1800&filter=packshot'),
(59, 'Pantaloni Adidas', 'femei', 189.99, 'https://img01.ztat.net/article/spp-media-p1/da0ee648231f47479c9b90f483873a48/81f5969d17a04c21b4f281cea2a6faf4.jpg?imwidth=1800&filter=packshot');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
