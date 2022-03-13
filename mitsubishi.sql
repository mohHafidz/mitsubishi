-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 04:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitsubishi`
--

-- --------------------------------------------------------

--
-- Table structure for table `antri`
--

CREATE TABLE `antri` (
  `id` int(11) NOT NULL,
  `mobilmasuk` time NOT NULL,
  `antrian` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_rekap`
--

CREATE TABLE `data_rekap` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `waktu_selesai` time NOT NULL,
  `cuci` varchar(255) NOT NULL,
  `mobilmasuk` time NOT NULL,
  `antrian` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `namaPE` varchar(255) NOT NULL,
  `namaSA` varchar(255) NOT NULL,
  `stall` varchar(255) NOT NULL,
  `estimasi` time NOT NULL,
  `stallin` time NOT NULL,
  `stallout` time NOT NULL,
  `FCin` time NOT NULL,
  `FCout` time NOT NULL,
  `cuciin` time NOT NULL,
  `cuciout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rekap`
--

INSERT INTO `data_rekap` (`id`, `tanggal`, `ket`, `waktu_selesai`, `cuci`, `mobilmasuk`, `antrian`, `plat`, `namaPE`, `namaSA`, `stall`, `estimasi`, `stallin`, `stallout`, `FCin`, `FCout`, `cuciin`, `cuciout`) VALUES
(45, '2022-01-23', '', '19:11:00', 'TC', '09:50:00', 1, 'F1196DN', 'Ikbal Maulana', 'Sarah', 'stall 3', '14:30:00', '19:10:00', '19:11:00', '19:11:00', '19:11:00', '00:00:00', '00:00:00'),
(46, '2022-01-23', '', '19:20:00', 'C', '12:00:00', 2, 'BK5456AB', 'Mohamad Farham', 'Ridwan Firdaus Setiawan', 'stall 5', '15:00:00', '19:19:00', '19:19:00', '19:19:00', '19:19:00', '19:19:00', '19:20:00'),
(47, '2022-01-25', '', '12:36:00', 'TC', '09:00:00', 1, 'F1196DN', 'Agus Azahra Alpian', 'Sarah', 'stall 2', '14:00:00', '20:08:00', '00:00:00', '00:00:00', '12:36:00', '00:00:00', '00:00:00'),
(48, '2022-02-05', '', '13:38:00', 'C', '13:00:00', 2, 'F1196DN', 'Ariswanto', 'Sarah', 'stall 6', '14:00:00', '10:46:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(49, '2022-03-07', '', '09:17:00', 'C', '19:00:00', 2, 'F1196DN', 'Asep Sehudin', 'Herman P Sihotang', 'stall 3', '15:00:00', '15:28:00', '00:00:00', '10:48:00', '00:00:00', '10:48:00', '00:00:00'),
(50, '2022-03-09', 'final checker', '16:58:00', 'TC', '00:00:00', 11, 'b4252462ab', 'Ariswanto', 'Sarah', 'stall 3', '19:00:00', '16:53:00', '16:53:00', '16:53:00', '00:00:00', '00:00:00', '00:00:00'),
(51, '2022-03-09', 'final checker', '17:03:00', 'TC', '12:00:00', 14, 'd2452452da', 'Agus Azahra Alpian', 'Ridwan Firdaus Setiawan', 'stall 4', '14:00:00', '17:02:00', '17:03:00', '17:03:00', '17:03:00', '00:00:00', '00:00:00'),
(52, '2022-03-10', 'cuci', '10:21:00', 'C', '13:00:00', 3, 'dk13413bg', 'Ariswanto', 'Embib Muhammad Ishak', 'stall 1', '15:00:00', '08:54:00', '09:18:00', '10:20:00', '10:20:00', '10:21:00', '10:21:00'),
(53, '2022-03-10', 'cuci', '17:51:00', 'C', '10:00:00', 3, 'f1196dn', 'Alga Pranata Putra', 'Sarah', 'stall 1', '13:00:00', '12:54:00', '16:31:00', '16:51:00', '16:56:00', '19:58:00', '17:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_sementara`
--

CREATE TABLE `data_sementara` (
  `id` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `jenis_service` varchar(100) NOT NULL,
  `cuci` varchar(255) NOT NULL,
  `status_car` varchar(255) NOT NULL,
  `mobilmasuk` time NOT NULL,
  `antrian` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `namaPE` varchar(255) NOT NULL,
  `namaSA` varchar(255) NOT NULL,
  `stall` varchar(255) NOT NULL,
  `estimasi` time NOT NULL,
  `stallin` time NOT NULL,
  `stallout` time NOT NULL,
  `FCin` time NOT NULL,
  `FCout` time NOT NULL,
  `cuciin` time NOT NULL,
  `cuciout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sementara`
--

INSERT INTO `data_sementara` (`id`, `ket`, `jenis_service`, `cuci`, `status_car`, `mobilmasuk`, `antrian`, `plat`, `namaPE`, `namaSA`, `stall`, `estimasi`, `stallin`, `stallout`, `FCin`, `FCout`, `cuciin`, `cuciout`) VALUES
(86, '', 'SVC', 'C', '', '12:00:00', 20, 'b4313bk', 'Ariswanto', 'Embib Muhammad Ishak', 'stall 2', '17:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(87, 'final checker', 'SVC', 'TC', 'pengerjaan telah selesai dari  stall 2', '13:14:00', 19, 'bk95785ab', 'Ikbal Maulana', 'Ridwan Firdaus Setiawan', 'stall 2', '15:00:00', '14:13:00', '14:13:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(88, '', 'SVC', 'C', '', '10:00:00', 15, 'ad1196dn', 'Alga Pranata Putra', 'Sarah', 'stall 4', '16:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(89, '', 'Please insert keterangan', 'Please insert keterangan', '', '17:00:00', 90, 'h13513ab', '', 'Please insert nama sevice advisor', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antri`
--
ALTER TABLE `antri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekap`
--
ALTER TABLE `data_rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sementara`
--
ALTER TABLE `data_sementara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antri`
--
ALTER TABLE `antri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `data_rekap`
--
ALTER TABLE `data_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `data_sementara`
--
ALTER TABLE `data_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
