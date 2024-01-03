-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`ID`, `username`, `password`) VALUES
(1, 'Nursalim', '$2y$10$ZmHNCktbPWhU.xh9NIEbmeAXNi7EkwYS/FuoG2dUyHRTtakaQU5/W'),
(5, 'harun', '12345'),
(6, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `ID` bigint(16) NOT NULL,
  `NIK` bigint(16) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Tempat` varchar(50) NOT NULL,
  `Tanggal_Lahir` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Agama` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Pekerjaan` varchar(50) NOT NULL,
  `Kewarganegaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`ID`, `NIK`, `Nama`, `Tempat`, `Tanggal_Lahir`, `Jenis_Kelamin`, `Alamat`, `Agama`, `Status`, `Pekerjaan`, `Kewarganegaraan`) VALUES
(20, 3214321432143214, 'Harun', 'Bogor', '2023-11-26', 'laki-laki', 'belwis mango', 'islam', 'Kawin', 'Mahasiswa', 'Indonesia'),
(21, 1234123412341234, 'shel', 'Bogor', '2023-11-26', 'Perempuan', 'asdadasd', 'islam', 'Kawin', 'Mahasiswa', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `IDS` bigint(16) NOT NULL,
  `NIKS` bigint(16) NOT NULL,
  `NamaS` varchar(50) NOT NULL,
  `TempatS` varchar(50) NOT NULL,
  `Tanggal_LahirS` varchar(50) NOT NULL,
  `Jenis_kelaminS` varchar(50) NOT NULL,
  `AlamatS` varchar(100) NOT NULL,
  `AgamaS` varchar(50) NOT NULL,
  `StatusS` varchar(50) NOT NULL,
  `PekerjaanS` varchar(50) NOT NULL,
  `KewarganegaraanS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`IDS`, `NIKS`, `NamaS`, `TempatS`, `Tanggal_LahirS`, `Jenis_kelaminS`, `AlamatS`, `AgamaS`, `StatusS`, `PekerjaanS`, `KewarganegaraanS`) VALUES
(20, 3214321432143214, 'Harun', 'Bogor', '2023-11-26', 'laki-laki', 'belwis mango', 'islam', 'Kawin', 'Mahasiswa', 'Indonesia'),
(21, 1234123412341234, 'shel', 'Bogor', '2023-11-26', 'Perempuan', 'asdadasd', 'islam', 'Kawin', 'Mahasiswa', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
  ADD PRIMARY KEY (`IDS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `ID` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `IDS` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
