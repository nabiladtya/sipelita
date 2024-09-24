-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 06:11 AM
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
-- Database: `sipelita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_lpj`
--

CREATE TABLE `tb_pengajuan_lpj` (
  `no_pengajuan` int(255) NOT NULL,
  `nama_pemohon` varchar(20) NOT NULL,
  `nip` int(20) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `tgl_kegiatan_selesai` date NOT NULL,
  `kegiatan` varchar(30) NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '''Pending'', ''Approved'', ''Rejected''	',
  `waktu_pengajuan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengajuan_lpj`
--

INSERT INTO `tb_pengajuan_lpj` (`no_pengajuan`, `nama_pemohon`, `nip`, `no_telp`, `email`, `tgl_kegiatan`, `tgl_kegiatan_selesai`, `kegiatan`, `uraian_kegiatan`, `status`, `waktu_pengajuan`) VALUES
(39, 'nabil adityaaaa', 2147483647, 2147483647, 'ronie@gmail.com', '2024-09-25', '2024-09-25', 'rapat', 'qeeedddd', 'Approved', '2024-09-22 17:26:17'),
(40, 'numa', 2147483647, 2147483647, 'ronie@gmail.com', '2024-09-26', '2024-09-27', 'rapat', 'qeeedddd', 'Rejected', '2024-09-22 17:37:02'),
(41, 'ilham', 2147483647, 2147483647, 'nabiladtya22@gmail.com', '2024-09-23', '2024-09-25', 'fa', 'tr', 'Pending', '2024-09-22 22:41:08'),
(42, 'ilham', 2147483647, 2147483647, 'nabiladtya22@gmail.com', '2024-09-23', '2024-09-25', 'fa', 'tr', 'Pending', '2024-09-22 22:41:09'),
(43, 'ilham', 2147483647, 2147483647, 'nabiladtya22@gmail.com', '2024-09-23', '2024-09-25', 'fa', 'tr', 'Approved', '2024-09-23 03:45:59'),
(44, 'riwinoto', 2147483647, 2147483647, 'jadsdsa@gmail.com', '2024-09-23', '2024-10-11', 'rapat', 'poltek', 'Approved', '2024-09-23 04:44:10'),
(45, 'riski', 121, 81221, 'nabiladitya737@gmail.com', '2024-09-23', '2024-09-25', 'lomba', '17 san', 'Pending', '2024-09-23 03:28:26'),
(46, 'comel', 121, 81221, 'nabiladitya737@gmail.com', '2024-09-23', '2024-09-23', 'ww', 'ww', 'Pending', '2024-09-23 03:31:08'),
(47, 'asra', 121, 81221, 'nabiladitya737@gmail.com', '2024-09-23', '2024-09-26', 'lomba', '73833', 'Pending', '2024-09-23 08:36:19'),
(48, 'abdul', 233213311, 98277282, 'nabiladitya737@gmail.com', '2024-09-23', '2024-09-26', 'lomba', '17san makan kerupuk', 'Approved', '2024-09-23 09:51:07'),
(49, 'riski', 121, 81221, 'nabiladitya737@gmail.com', '2024-09-23', '2024-09-26', 'ytyytt', 'haiahaai', 'Pending', '2024-09-23 10:01:05'),
(50, 'riski', 121, 81221, 'nabiladitya737@gmail.com', '2024-09-25', '2024-10-04', 'ytyytt', 'haiahaai', 'Pending', '2024-09-23 10:01:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengajuan_lpj`
--
ALTER TABLE `tb_pengajuan_lpj`
  ADD PRIMARY KEY (`no_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengajuan_lpj`
--
ALTER TABLE `tb_pengajuan_lpj`
  MODIFY `no_pengajuan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
