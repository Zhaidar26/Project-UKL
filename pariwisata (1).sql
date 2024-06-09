-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tanggal_keberangkatan` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah_kamar` int(111) NOT NULL,
  `banyak_anggota` int(111) NOT NULL,
  `transportasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `id`, `tanggal_keberangkatan`, `tanggal_kembali`, `jumlah_kamar`, `banyak_anggota`, `transportasi`) VALUES
(1, 0, '2024-05-23', '2024-05-24', 1, 2, 'pesawat'),
(2, 0, '2024-05-23', '2024-05-24', 1, 2, 'kapal'),
(3, 0, '2024-05-24', '2024-05-25', 1, 4, 'pesawat'),
(4, 0, '2024-05-26', '2024-05-27', 1, 2, 'kapal'),
(6, 0, '2024-05-27', '2024-05-28', 1, 1, ''),
(7, 0, '2024-05-27', '2024-05-28', 1, 1, 'kapal'),
(8, 0, '2024-05-27', '2024-05-28', 2, 4, 'bus'),
(9, 0, '2024-05-27', '2024-05-28', 2, 4, 'pesawat'),
(10, 0, '2024-05-28', '2024-05-29', 1, 1, 'bus'),
(11, 0, '2024-05-28', '2024-05-30', 1, 1, 'kapal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'user', 'user', 'user'),
(2, 'admin', 'admin', 'admin'),
(4, 'z.haidar_i', 'zhaidar', 'admin'),
(5, 'zhafif', 'zhafif', 'user'),
(9, 'fauzan', 'fauzan', 'user'),
(10, 'josie', 'josie', 'admin'),
(11, 'alan', 'alan', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
