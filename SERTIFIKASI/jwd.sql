-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2024 at 03:15 AM
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
-- Database: `jwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beasiswa`
--

CREATE TABLE `tbl_beasiswa` (
  `nim` int NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `ipk` float NOT NULL,
  `beasiswa` enum('Pertamina','LPDP','Djarum','KIPK') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `berkas` mediumblob,
  `status` varchar(50) DEFAULT 'Belum Diverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_beasiswa`
--

INSERT INTO `tbl_beasiswa` (`nim`, `nama`, `email`, `no_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status`) VALUES
(101, 'Enndas Brena', 'fiqhi.n08@gmail.com', '08938473322', '3', 3.7, 'KIPK', 0x313732313839353733305f696a617a61682e6a7067, 'Belum Diverifikasi'),
(105, 'Ananda Adyatama', 'noraliyou@gmail.con', '081234567890', '7', 3.1, 'LPDP', 0x313732313839353632365f39363239376364613265306266313164663436663633653139396564346533382e6a7067, 'Belum Diverifikasi'),
(110, 'Aina Zafira', 'ainazafira@gmail.com', '0892838723', '3', 3.8, 'Djarum', 0x313732313936323136365f736d73332e6a7067, 'Belum Diverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_beasiswa`
--
ALTER TABLE `tbl_beasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
