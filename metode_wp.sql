-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 07:31 AM
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
  `position` varchar(30) NOT NULL,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `nama_alternatif`, `position`, `vektor_s`, `vektor_v`, `ranking`) VALUES
(1, 'Karyawan 1', 'SMD/GT', 3.8930794206457, 0.054380854311402, 6),
(2, 'Karyawan 2', 'SMD/GT', 4.1397033813153, 0.05782584482553, 1),
(3, 'Karyawan 3', 'SMD/GT', 3.9801912045791, 0.055597683643412, 4),
(4, 'Karyawan 4', 'SMD/GT', 4, 0.055874384707397, 2),
(5, 'Karyawan 5', 'SMD/GT', 2.767965501212, 0.038664592317881, 19),
(6, 'Karyawan 6', 'SMD/GT', 4, 0.055874384707397, 3),
(7, 'Karyawan 7', 'SMD/GT', 3.7430702254466, 0.052285436440852, 8),
(8, 'Karyawan 8', 'SMD/GT', 3, 0.041905788530548, 18),
(9, 'Karyawan 9', 'SMD/GT', 3.067128184032, 0.042843475025375, 17),
(10, 'Karyawan 10', 'SMD/GT', 3.7245337973611, 0.052026508562364, 9),
(11, 'Karyawan 11', 'SMD/GT', 3.4992982259749, 0.048880283821009, 14),
(12, 'Karyawan 12', 'SMD/GT', 3.661148149856, 0.051141100048957, 10),
(13, 'Karyawan 13', 'SMD/GT', 3.6430174161795, 0.05088783915184, 11),
(14, 'Karyawan 14', 'SMD/GT', 2.5643591201294, 0.035820497001508, 20),
(15, 'Karyawan 15', 'SMD/GT', 3.7430702254466, 0.052285436440852, 7),
(16, 'Karyawan 16', 'SMD/GT', 3.4505640360441, 0.048199535601859, 16),
(17, 'Karyawan 17', 'SMD/GT', 3.6101599008478, 0.050428865788797, 13),
(18, 'Karyawan 18', 'SMD/GT', 3.6363773426536, 0.050795086646172, 12),
(19, 'Karyawan 19', 'SMD/GT', 3.9801912045791, 0.055597683643412, 5),
(21, 'Karyawan 20', 'TFA', 3.485297890143, 0.048684718783432, 15);

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

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`, `id_periode`) VALUES
(1, 1, 11, 8, 2),
(2, 1, 12, 14, 2),
(3, 1, 13, 18, 2),
(4, 1, 14, 23, 2),
(5, 1, 15, 28, 2),
(6, 1, 16, 33, 2),
(7, 1, 17, 37, 2),
(8, 1, 18, 43, 2),
(9, 1, 19, 48, 2),
(10, 1, 20, 54, 2),
(11, 1, 21, 58, 2),
(12, 1, 22, 63, 2),
(13, 1, 23, 68, 2),
(79, 2, 11, 8, 2),
(80, 2, 12, 13, 2),
(81, 2, 13, 17, 2),
(82, 2, 14, 23, 2),
(83, 2, 15, 28, 2),
(84, 2, 16, 33, 2),
(85, 2, 17, 38, 2),
(86, 2, 18, 43, 2),
(87, 2, 19, 47, 2),
(88, 2, 20, 53, 2),
(89, 2, 21, 58, 2),
(90, 2, 22, 63, 2),
(91, 2, 23, 68, 2),
(118, 3, 11, 8, 2),
(119, 3, 12, 14, 2),
(120, 3, 13, 18, 2),
(121, 3, 14, 23, 2),
(122, 3, 15, 28, 2),
(123, 3, 16, 33, 2),
(124, 3, 17, 37, 2),
(125, 3, 18, 43, 2),
(126, 3, 19, 48, 2),
(127, 3, 20, 53, 2),
(128, 3, 21, 58, 2),
(129, 3, 22, 63, 2),
(130, 3, 23, 68, 2),
(131, 4, 11, 8, 2),
(132, 4, 12, 13, 2),
(133, 4, 13, 18, 2),
(134, 4, 14, 23, 2),
(135, 4, 15, 28, 2),
(136, 4, 16, 33, 2),
(137, 4, 17, 38, 2),
(138, 4, 18, 43, 2),
(139, 4, 19, 48, 2),
(140, 4, 20, 53, 2),
(141, 4, 21, 58, 2),
(142, 4, 22, 63, 2),
(143, 4, 23, 68, 2),
(144, 5, 11, 9, 2),
(145, 5, 12, 14, 2),
(146, 5, 13, 18, 2),
(147, 5, 14, 23, 2),
(148, 5, 15, 30, 2),
(149, 5, 16, 36, 2),
(150, 5, 17, 40, 2),
(151, 5, 18, 44, 2),
(152, 5, 19, 49, 2),
(153, 5, 20, 54, 2),
(154, 5, 21, 59, 2),
(155, 5, 22, 64, 2),
(156, 5, 23, 68, 2),
(157, 6, 11, 8, 2),
(158, 6, 12, 13, 2),
(159, 6, 13, 18, 2),
(160, 6, 14, 23, 2),
(161, 6, 15, 28, 2),
(162, 6, 16, 33, 2),
(163, 6, 17, 38, 2),
(164, 6, 18, 43, 2),
(165, 6, 19, 48, 2),
(166, 6, 20, 53, 2),
(167, 6, 21, 58, 2),
(168, 6, 22, 63, 2),
(169, 6, 23, 68, 2),
(183, 7, 11, 8, 2),
(184, 7, 12, 14, 2),
(185, 7, 13, 18, 2),
(186, 7, 14, 23, 2),
(187, 7, 15, 28, 2),
(188, 7, 16, 34, 2),
(189, 7, 17, 38, 2),
(190, 7, 18, 43, 2),
(191, 7, 19, 48, 2),
(192, 7, 20, 54, 2),
(193, 7, 21, 58, 2),
(194, 7, 22, 63, 2),
(195, 7, 23, 68, 2),
(196, 8, 11, 9, 2),
(197, 8, 12, 14, 2),
(198, 8, 13, 19, 2),
(199, 8, 14, 24, 2),
(200, 8, 15, 29, 2),
(201, 8, 16, 34, 2),
(202, 8, 17, 39, 2),
(203, 8, 18, 44, 2),
(204, 8, 19, 49, 2),
(205, 8, 20, 54, 2),
(206, 8, 21, 59, 2),
(207, 8, 22, 64, 2),
(208, 8, 23, 69, 2),
(209, 9, 11, 9, 2),
(210, 9, 12, 14, 2),
(211, 9, 13, 19, 2),
(212, 9, 14, 24, 2),
(213, 9, 15, 29, 2),
(214, 9, 16, 34, 2),
(215, 9, 17, 39, 2),
(216, 9, 18, 44, 2),
(217, 9, 19, 49, 2),
(218, 9, 20, 54, 2),
(219, 9, 21, 58, 2),
(220, 9, 22, 64, 2),
(221, 9, 23, 69, 2),
(222, 10, 11, 7, 2),
(223, 10, 12, 14, 2),
(224, 10, 13, 18, 2),
(225, 10, 14, 23, 2),
(226, 10, 15, 28, 2),
(227, 10, 16, 34, 2),
(228, 10, 17, 38, 2),
(229, 10, 18, 43, 2),
(230, 10, 19, 48, 2),
(231, 10, 20, 54, 2),
(232, 10, 21, 58, 2),
(233, 10, 22, 64, 2),
(234, 10, 23, 68, 2),
(235, 11, 11, 7, 2),
(236, 11, 12, 13, 2),
(237, 11, 13, 18, 2),
(238, 11, 14, 25, 2),
(239, 11, 15, 28, 2),
(240, 11, 16, 33, 2),
(241, 11, 17, 38, 2),
(242, 11, 18, 43, 2),
(243, 11, 19, 48, 2),
(244, 11, 20, 54, 2),
(245, 11, 21, 60, 2),
(246, 11, 22, 64, 2),
(247, 11, 23, 68, 2),
(248, 12, 11, 8, 2),
(249, 12, 12, 13, 2),
(250, 12, 13, 18, 2),
(251, 12, 14, 23, 2),
(252, 12, 15, 28, 2),
(253, 12, 16, 33, 2),
(254, 12, 17, 39, 2),
(255, 12, 18, 43, 2),
(256, 12, 19, 48, 2),
(257, 12, 20, 53, 2),
(258, 12, 21, 59, 2),
(259, 12, 22, 64, 2),
(260, 12, 23, 69, 2),
(261, 13, 11, 8, 2),
(262, 13, 12, 12, 2),
(263, 13, 13, 18, 2),
(264, 13, 14, 23, 2),
(265, 13, 15, 28, 2),
(266, 13, 16, 34, 2),
(267, 13, 17, 39, 2),
(268, 13, 18, 43, 2),
(269, 13, 19, 48, 2),
(270, 13, 20, 54, 2),
(271, 13, 21, 59, 2),
(272, 13, 22, 64, 2),
(273, 13, 23, 68, 2),
(287, 14, 11, 8, 2),
(288, 14, 12, 13, 2),
(289, 14, 13, 20, 2),
(290, 14, 14, 25, 2),
(291, 14, 15, 30, 2),
(292, 14, 16, 34, 2),
(293, 14, 17, 39, 2),
(294, 14, 18, 44, 2),
(295, 14, 19, 49, 2),
(296, 14, 20, 55, 2),
(297, 14, 21, 57, 2),
(298, 14, 22, 66, 2),
(299, 14, 23, 70, 2),
(300, 15, 11, 8, 2),
(301, 15, 12, 13, 2),
(302, 15, 13, 18, 2),
(303, 15, 14, 23, 2),
(304, 15, 15, 28, 2),
(305, 15, 16, 33, 2),
(306, 15, 17, 38, 2),
(307, 15, 18, 44, 2),
(308, 15, 19, 48, 2),
(309, 15, 20, 54, 2),
(310, 15, 21, 58, 2),
(311, 15, 22, 64, 2),
(312, 15, 23, 68, 2),
(313, 16, 11, 8, 2),
(314, 16, 12, 12, 2),
(315, 16, 13, 18, 2),
(316, 16, 14, 23, 2),
(317, 16, 15, 28, 2),
(318, 16, 16, 33, 2),
(319, 16, 17, 38, 2),
(320, 16, 18, 43, 2),
(321, 16, 19, 48, 2),
(322, 16, 20, 54, 2),
(323, 16, 21, 60, 2),
(324, 16, 22, 66, 2),
(325, 16, 23, 67, 2),
(326, 17, 11, 8, 2),
(327, 17, 12, 15, 2),
(328, 17, 13, 18, 2),
(329, 17, 14, 23, 2),
(330, 17, 15, 28, 2),
(331, 17, 16, 33, 2),
(332, 17, 17, 37, 2),
(333, 17, 18, 44, 2),
(334, 17, 19, 48, 2),
(335, 17, 20, 54, 2),
(336, 17, 21, 58, 2),
(337, 17, 22, 64, 2),
(338, 17, 23, 68, 2),
(339, 18, 11, 7, 2),
(340, 18, 12, 14, 2),
(341, 18, 13, 19, 2),
(342, 18, 14, 22, 2),
(343, 18, 15, 28, 2),
(344, 18, 16, 34, 2),
(345, 18, 17, 37, 2),
(346, 18, 18, 44, 2),
(347, 18, 19, 48, 2),
(348, 18, 20, 54, 2),
(349, 18, 21, 58, 2),
(350, 18, 22, 65, 2),
(351, 18, 23, 67, 2),
(352, 19, 11, 8, 2),
(353, 19, 12, 12, 2),
(354, 19, 13, 18, 2),
(355, 19, 14, 23, 2),
(356, 19, 15, 28, 2),
(357, 19, 16, 33, 2),
(358, 19, 17, 39, 2),
(359, 19, 18, 43, 2),
(360, 19, 19, 48, 2),
(361, 19, 20, 53, 2),
(362, 19, 21, 58, 2),
(363, 19, 22, 63, 2),
(364, 19, 23, 68, 2),
(365, 21, 11, 9, 2),
(366, 21, 12, 14, 2),
(367, 21, 13, 18, 2),
(368, 21, 14, 24, 2),
(369, 21, 15, 29, 2),
(370, 21, 16, 32, 2),
(371, 21, 17, 38, 2),
(372, 21, 18, 44, 2),
(373, 21, 19, 48, 2),
(374, 21, 20, 54, 2),
(375, 21, 21, 58, 2),
(376, 21, 22, 64, 2),
(377, 21, 23, 68, 2);

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
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `tbl_periode`
--
ALTER TABLE `tbl_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
