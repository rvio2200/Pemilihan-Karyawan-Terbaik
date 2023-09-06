-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 09:58 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama_lengkap`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', 'Admin'),
(2, 'Area Coordinator', 'areacoordinator@gmail.com', 'arco12345', 'Area Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `nama_alternatif`, `position`) VALUES
(1, 'Karyawan 1', 'SMD/GT'),
(2, 'Karyawan 2', 'SMD/GT'),
(3, 'Karyawan 3', 'SMD/GT'),
(4, 'Karyawan 4', 'SMD/GT'),
(5, 'Karyawan 5', 'SMD/GT'),
(6, 'Karyawan 6', 'SMD/GT'),
(7, 'Karyawan 7', 'SMD/GT'),
(8, 'Karyawan 8', 'SMD/GT'),
(9, 'Karyawan 9', 'SMD/GT'),
(10, 'Karyawan 10', 'SMD/GT'),
(11, 'Karyawan 11', 'SMD/GT'),
(12, 'Karyawan 12', 'SMD/GT'),
(13, 'Karyawan 13', 'SMD/GT'),
(14, 'Karyawan 14', 'SMD/GT'),
(15, 'Karyawan 15', 'SMD/GT'),
(16, 'Karyawan 16', 'SMD/GT'),
(17, 'Karyawan 17', 'SMD/GT'),
(18, 'Karyawan 18', 'SMD/GT'),
(19, 'Karyawan 19', 'SMD/GT'),
(20, 'Karyawan 20', 'TFA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `tipe_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(11, 'Product Knowledge', 1, 'Benefit'),
(12, 'Administrasi', 1, 'Benefit'),
(13, 'Ontime Reporting', 1, 'Benefit'),
(14, 'Komunikasi & Koordinasi (Team & Dist)', 1, 'Benefit'),
(15, 'Komunikasi & Koordinasi (Nestle Team)', 1, 'Benefit'),
(16, 'Inisiatif', 1, 'Benefit'),
(17, 'Negosiasi', 1, 'Benefit'),
(18, 'Kepemimpinan (Leadership)', 1, 'Benefit'),
(19, 'Integritas', 1, 'Benefit'),
(20, 'Problem Solving', 1, 'Benefit'),
(21, 'Stabilitas Emosi', 1, 'Benefit'),
(22, 'Fast Responses', 1, 'Benefit'),
(23, 'Motivasi Prestasi', 1, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(30) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_periode`
--

INSERT INTO `tbl_periode` (`id_periode`, `nama_periode`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Q1 - 2023', '2023-01-01', '2023-03-31'),
(2, 'Q2 - 2023', '2023-04-01', '2023-06-30'),
(3, 'Q3 - 2023', '2023-07-01', '2023-09-30'),
(4, 'Q4 - 2023', '2023-10-01', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai_subkriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai_subkriteria`) VALUES
(7, 11, 'Baik Sekali', 5),
(8, 11, 'Baik', 4),
(9, 11, 'Cukup', 3),
(10, 11, 'Kurang', 2),
(11, 11, 'Kurang Sekali', 1),
(12, 12, 'Baik Sekali', 5),
(13, 12, 'Baik', 4),
(14, 12, 'Cukup', 3),
(15, 12, 'Kurang', 2),
(16, 12, 'Kurang Sekali', 1),
(17, 13, 'Baik Sekali', 5),
(18, 13, 'Baik', 4),
(19, 13, 'Cukup', 3),
(20, 13, 'Kurang', 2),
(21, 13, 'Kurang Sekali', 1),
(22, 14, 'Baik Sekali', 5),
(23, 14, 'Baik', 4),
(24, 14, 'Cukup', 3),
(25, 14, 'Kurang', 2),
(26, 14, 'Kurang Sekali', 1),
(27, 15, 'Baik Sekali', 5),
(28, 15, 'Baik', 4),
(29, 15, 'Cukup', 3),
(30, 15, 'Kurang', 2),
(31, 15, 'Kurang Sekali', 1),
(32, 16, 'Baik Sekali', 5),
(33, 16, 'Baik', 4),
(34, 16, 'Cukup', 3),
(35, 16, 'Kurang', 2),
(36, 16, 'Kurang Sekali', 1),
(37, 17, 'Baik Sekali', 5),
(38, 17, 'Baik', 4),
(39, 17, 'Cukup', 3),
(40, 17, 'Kurang', 2),
(41, 17, 'Kurang Sekali', 1),
(42, 18, 'Baik Sekali', 5),
(43, 18, 'Baik', 4),
(44, 18, 'Cukup', 3),
(45, 18, 'Kurang', 2),
(46, 18, 'Kurang Sekali', 1),
(47, 19, 'Baik Sekali', 5),
(48, 19, 'Baik', 4),
(49, 19, 'Cukup', 3),
(50, 19, 'Kurang', 2),
(51, 19, 'Kurang Sekali', 1),
(52, 20, 'Baik Sekali', 5),
(53, 20, 'Baik', 4),
(54, 20, 'Cukup', 3),
(55, 20, 'Kurang', 2),
(56, 20, 'Kurang Sekali', 1),
(57, 21, 'Baik Sekali', 5),
(58, 21, 'Baik', 4),
(59, 21, 'Cukup', 3),
(60, 21, 'Kurang', 2),
(61, 21, 'Kurang Sekali', 1),
(62, 22, 'Baik Sekali', 5),
(63, 22, 'Baik', 4),
(64, 22, 'Cukup', 3),
(65, 22, 'Kurang', 2),
(66, 22, 'Kurang Sekali', 1),
(67, 23, 'Baik Sekali', 5),
(68, 23, 'Baik', 4),
(69, 23, 'Cukup', 3),
(70, 23, 'Kurang', 2),
(71, 23, 'Kurang Sekali', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_periode`
--
ALTER TABLE `tbl_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_periode`
--
ALTER TABLE `tbl_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
