-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 11:38 PM
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
-- Database: `lawancovid`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `IDDept` int(11) NOT NULL,
  `Nama_Dept` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`IDDept`, `Nama_Dept`) VALUES
(1, 'Accounting'),
(2, 'IT'),
(4, 'Marketing'),
(5, 'Sales'),
(6, 'Produksi'),
(7, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `IDKaryawan` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `NoKTP` varchar(20) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Kota_Tinggal` varchar(20) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `Department` int(11) DEFAULT NULL,
  `Kota_Penempatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`IDKaryawan`, `Nama`, `NoKTP`, `Telp`, `Kota_Tinggal`, `Tanggal_lahir`, `Tanggal_Masuk`, `Department`, `Kota_Penempatan`) VALUES
(1, 'ROBBY IHZA MAHENDRA', '3522622584455285', '62522548878', 'Bojonegoro', '2000-05-16', '2023-10-05', 2, 'Surabaya'),
(3, 'Budi Cahyono', '3522277451000000', '6285766222241', 'Jombang', '2000-10-08', '2023-12-05', 2, 'Surabaya'),
(4, 'Ina Cahyani', '3525852563322006', '6285766222241', 'Jombang', '2012-10-08', '2023-12-05', 2, 'Surabaya'),
(5, 'Dodik Mulyanto', '3525852563300001', '6285766222241', 'Bojonegoro', '2002-11-01', '2023-12-09', 2, 'Surabaya'),
(6, 'Idham Gunawan', '3522578962257552', '62856989698', 'Malang', '2002-02-05', '2022-12-02', 4, 'Surabaya'),
(7, 'Tulus Nuryanto', '3552254547500003', '62584668522', 'Malang', '2002-01-20', '2022-02-11', 6, 'Surabaya'),
(8, 'Denny Cakmet', '3255568743655000', '62856685522', 'Bandung', '2001-05-05', '2021-02-12', 4, 'Surabaya'),
(9, 'Reza Baskoro', '3598558544415852', '62852145665', 'Bali', '1975-04-17', '2009-05-12', 7, 'Surabaya'),
(10, 'Rendi Yudhistira', '3522458574560001', '628566988555', 'Palu', '2004-03-23', '2024-01-11', 5, 'Nganjuk'),
(11, 'Heru Siregar', '3599877463300001', '628569896989', 'Palembang', '2003-02-01', '2024-02-02', 6, 'Jakarta'),
(12, 'Jena Handayani', '3551123368700001', '628555988548', 'Jakarta', '2004-05-04', '2019-02-19', 1, 'Surabaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`IDDept`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`IDKaryawan`),
  ADD KEY `Department` (`Department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `IDDept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `IDKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `department` (`IDDept`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
