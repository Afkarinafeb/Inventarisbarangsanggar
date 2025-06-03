-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2025 at 11:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsanggar`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int NOT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `sekolah` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','selesai') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_peminjam`, `sekolah`, `nama_barang`, `jumlah`, `kondisi`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(5, 'Intan', 'SMKN 1 Probolinggo', 'Bendera Merah putih', 7, '7', '2024-03-12', '2024-05-07', 'selesai'),
(7, '-', 'SMKN 1 Probolinggo', 'Bendera Pramuka', 9, '9', '2025-05-13', '2025-05-23', 'dipinjam'),
(8, '-', 'SMKN 1 Probolinggo', 'Bendera Morse', 12, '12', '2025-05-01', '2025-05-22', 'dipinjam'),
(9, '-', 'SMKN 1 Probolinggo', 'Tongkat Smaphore', 13, '13', '2025-05-09', '2025-05-08', 'dipinjam'),
(10, '-', 'SMKN 1 Probolinggo', 'Bendera Smaphore', 56, '55', '2025-05-15', '2025-05-15', 'dipinjam'),
(11, '-', 'SMKN 1 Probolinggo', 'Tali 5 meter', 38, '38', '2025-05-16', '2025-05-17', 'dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
