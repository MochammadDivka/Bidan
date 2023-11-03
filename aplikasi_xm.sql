-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 08:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi xm`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_patients`
--

CREATE TABLE `detail_patients` (
  `id_detail_patients` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Category` enum('A/I') NOT NULL,
  `Weight` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Bb` int(11) NOT NULL,
  `Temp` int(11) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Complaint` varchar(225) NOT NULL,
  `Diagnosis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id_mc` int(11) NOT NULL,
  `id_midwife` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `midwife`
--

CREATE TABLE `midwife` (
  `id_midwife` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `No.Telp` int(25) NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id_patient` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Address` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `No.Telp` int(11) NOT NULL,
  `Gender` enum('L/P') NOT NULL,
  `Dob` date NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `id_detail_user` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `No.Telp` int(25) NOT NULL,
  `Email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_patients`
--
ALTER TABLE `detail_patients`
  ADD PRIMARY KEY (`id_detail_patients`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail_user`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id_mc`);

--
-- Indexes for table `midwife`
--
ALTER TABLE `midwife`
  ADD PRIMARY KEY (`id_midwife`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_patients`
--
ALTER TABLE `detail_patients`
  MODIFY `id_detail_patients` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id_mc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `midwife`
--
ALTER TABLE `midwife`
  MODIFY `id_midwife` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
