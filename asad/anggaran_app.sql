-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2019 at 02:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anggaran_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ang_pendapatan`
--

CREATE TABLE `ang_pendapatan` (
  `penda_id` int(11) NOT NULL,
  `penda_nama` text NOT NULL,
  `penda_harga` text NOT NULL,
  `penda_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ang_pengeluaran`
--

CREATE TABLE `ang_pengeluaran` (
  `penge_id` int(11) NOT NULL,
  `penge_nama` text NOT NULL,
  `penge_harga` text NOT NULL,
  `penge_jumlah` int(11) NOT NULL,
  `penge_total` int(11) NOT NULL,
  `penge_ket` text NOT NULL,
  `penge_tipe` enum('habis_pakai','aset_tetap','bahan_material','cetak_pengadaan','jasa_kantor','makan_minum','pemeliharaan','alat_mesin','kendaraan','dinas_luar') NOT NULL,
  `penge_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ang_realisasi`
--

CREATE TABLE `ang_realisasi` (
  `real_id` int(11) NOT NULL,
  `real_nama` text NOT NULL,
  `real_harga` text NOT NULL,
  `real_jumlah` int(11) NOT NULL,
  `real_total` int(11) NOT NULL,
  `real_ket` text NOT NULL,
  `real_tipe` enum('habis_pakai','aset_tetap','bahan_material','cetak_pengadaan','jasa_kantor','makan_minum','pemeliharaan','alat_mesin','kendaraan','dinas_luar') NOT NULL,
  `real_image_proof` text NOT NULL,
  `real_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ang_realisasi`
--

INSERT INTO `ang_realisasi` (`real_id`, `real_nama`, `real_harga`, `real_jumlah`, `real_total`, `real_ket`, `real_tipe`, `real_image_proof`, `real_tanggal`) VALUES
(24, 'Belanja pengeluaran terbaik hihi', '100000', 2019, 2147483647, 'ini yang dibutuhkan', 'bahan_material', 'Screenshot_from_2019-11-14_14-02-03.png', '2019-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ang_pendapatan`
--
ALTER TABLE `ang_pendapatan`
  ADD PRIMARY KEY (`penda_id`);

--
-- Indexes for table `ang_pengeluaran`
--
ALTER TABLE `ang_pengeluaran`
  ADD PRIMARY KEY (`penge_id`);

--
-- Indexes for table `ang_realisasi`
--
ALTER TABLE `ang_realisasi`
  ADD PRIMARY KEY (`real_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ang_pendapatan`
--
ALTER TABLE `ang_pendapatan`
  MODIFY `penda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ang_pengeluaran`
--
ALTER TABLE `ang_pengeluaran`
  MODIFY `penge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ang_realisasi`
--
ALTER TABLE `ang_realisasi`
  MODIFY `real_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
