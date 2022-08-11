-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 03:39 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yamaha_kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ym_jadwal`
--

CREATE TABLE `ym_jadwal` (
  `ID_jadwal` bigint(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ID_menu` bigint(20) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ym_jadwal`
--

INSERT INTO `ym_jadwal` (`ID_jadwal`, `tanggal`, `ID_menu`, `ID_user`) VALUES
(3, '2022-07-12', 10, 3),
(5, '2022-07-13', 9, 1),
(6, '2022-07-13', 12, 1),
(7, '2022-07-18', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ym_jadwaltampilan`
--

CREATE TABLE `ym_jadwaltampilan` (
  `ID_JadwalTampilan` bigint(20) NOT NULL,
  `ID_Tampilan` int(11) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ym_jadwaltampilan`
--

INSERT INTO `ym_jadwaltampilan` (`ID_JadwalTampilan`, `ID_Tampilan`, `Tanggal`) VALUES
(2, 16, '2022-07-25'),
(3, 17, '2022-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `ym_menu`
--

CREATE TABLE `ym_menu` (
  `ID_menu` bigint(20) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ym_menu`
--

INSERT INTO `ym_menu` (`ID_menu`, `nama`, `jenis`) VALUES
(2, 'Lalapan', '0'),
(4, 'Rawon', '0'),
(5, 'Pecel', '0'),
(6, 'Nasi kuning', '0'),
(7, 'Nasi Putih', '0'),
(8, 'Geprek', '0'),
(9, 'Es Teh', '1'),
(10, 'Teh Hangat', '1'),
(12, 'Capucino', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ym_tampilan`
--

CREATE TABLE `ym_tampilan` (
  `ID_tampilan` int(11) NOT NULL,
  `teks` longtext,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ym_tampilan`
--

INSERT INTO `ym_tampilan` (`ID_tampilan`, `teks`, `image`) VALUES
(16, 'selamat datang di kantin Yamaha Manufacture', '1658394128-5df9e59f4c8b0.jpg'),
(17, 'selamat datang di yamaha', '1658722238-swap-e1618475092393.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ym_user`
--

CREATE TABLE `ym_user` (
  `ID_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ym_user`
--

INSERT INTO `ym_user` (`ID_user`, `nama`, `username`, `password`, `status`) VALUES
(1, 'administrasi', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '1'),
(3, 'taufik', 'taufik', 'adcd7048512e64b48da55b027577886ee5a36350', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ym_useradmin`
--

CREATE TABLE `ym_useradmin` (
  `ID_UserAdmin` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ym_jadwal`
--
ALTER TABLE `ym_jadwal`
  ADD PRIMARY KEY (`ID_jadwal`);

--
-- Indexes for table `ym_jadwaltampilan`
--
ALTER TABLE `ym_jadwaltampilan`
  ADD PRIMARY KEY (`ID_JadwalTampilan`);

--
-- Indexes for table `ym_menu`
--
ALTER TABLE `ym_menu`
  ADD PRIMARY KEY (`ID_menu`);

--
-- Indexes for table `ym_tampilan`
--
ALTER TABLE `ym_tampilan`
  ADD PRIMARY KEY (`ID_tampilan`) USING BTREE;

--
-- Indexes for table `ym_user`
--
ALTER TABLE `ym_user`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indexes for table `ym_useradmin`
--
ALTER TABLE `ym_useradmin`
  ADD PRIMARY KEY (`ID_UserAdmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ym_jadwal`
--
ALTER TABLE `ym_jadwal`
  MODIFY `ID_jadwal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ym_jadwaltampilan`
--
ALTER TABLE `ym_jadwaltampilan`
  MODIFY `ID_JadwalTampilan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ym_menu`
--
ALTER TABLE `ym_menu`
  MODIFY `ID_menu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ym_tampilan`
--
ALTER TABLE `ym_tampilan`
  MODIFY `ID_tampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ym_user`
--
ALTER TABLE `ym_user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ym_useradmin`
--
ALTER TABLE `ym_useradmin`
  MODIFY `ID_UserAdmin` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
