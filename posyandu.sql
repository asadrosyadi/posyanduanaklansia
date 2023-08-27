-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 07:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `kk_anak` varchar(16) NOT NULL,
  `nik_anak` varchar(16) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `nama_orang_tua` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `kk_anak`, `nik_anak`, `nama_anak`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `nama_orang_tua`) VALUES
(1, '3515179803221434', '3515171607980002', 'Mohammad As\'ad Rosyadi', 'Sidoarjo', '1998-07-16', 'Laki-Laki', 'Kholidul Azhar'),
(2, '098765432345678_', '1234567890987654', 'Abu Khodijah', 'Balben', '1945-08-17', 'Perempuan', 'bapak');

-- --------------------------------------------------------

--
-- Table structure for table `lansia`
--

CREATE TABLE `lansia` (
  `id_lansia` int(11) NOT NULL,
  `nik_lansia` varchar(16) NOT NULL,
  `kk_lansia` varchar(16) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `nama_lansia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lansia`
--

INSERT INTO `lansia` (`id_lansia`, `nik_lansia`, `kk_lansia`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `nama_lansia`) VALUES
(1, '5645568768799899', '0000112343545656', 'Madinah', '1974-08-19', 'Perempuan', 'Mbah paijo'),
(2, '0989058498435094', '0974358435869306', 'Makkah', '2000-06-17', 'Laki-Laki', 'Mbah Paimin');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `lansia_id` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_skrng` date NOT NULL,
  `usia` int(11) NOT NULL,
  `bb` double NOT NULL,
  `tb` double NOT NULL,
  `tensi` text NOT NULL,
  `keluhan` text NOT NULL,
  `obat_diberikan` text NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `lansia_id`, `tgl_lahir`, `jenis_kelamin`, `tgl_skrng`, `usia`, `bb`, `tb`, `tensi`, `keluhan`, `obat_diberikan`, `saran`) VALUES
(1, 1, '1974-08-19', 'Perempuan', '0000-00-00', 49, 50, 135, '112', 'butuh uang', 'uang 1 jt', 'kasih dana dong'),
(2, 2, '2000-06-17', 'Laki-Laki', '2023-08-20', 23, 32, 112, '154', 'kantong kering', 'isi dompet dong', 'isi ulang uang merah di dompet'),
(3, 2, '2000-06-17', 'Laki-Laki', '0000-00-00', 23, 34, 123, '150', 'kantong kering lagi', 'uang merah 1000 digit', 'kasih uang merah atau biru'),
(4, 1, '1974-08-19', 'Perempuan', '2023-08-21', 49, 45, 123, '34', 'pusing', 'oskadon', 'oskadong ga mempan maunya uang');

-- --------------------------------------------------------

--
-- Table structure for table `penimbangan`
--

CREATE TABLE `penimbangan` (
  `id_penimbangan` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_skrng` date NOT NULL,
  `usia` int(11) NOT NULL,
  `bb` double NOT NULL,
  `tb` double NOT NULL,
  `lingkar_kepala` double NOT NULL,
  `lingkar_lengan` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penimbangan`
--

INSERT INTO `penimbangan` (`id_penimbangan`, `anak_id`, `tgl_lahir`, `jenis_kelamin`, `tgl_skrng`, `usia`, `bb`, `tb`, `lingkar_kepala`, `lingkar_lengan`, `ket`) VALUES
(1, 1, '1998-07-16', 'Laki-Laki', '2023-08-19', 25, 54, 164, 15, 10, '-'),
(2, 1, '1998-07-16', 'Laki-Laki', '2023-08-20', 25, 54, 164, 15, 11, '-'),
(3, 2, '1945-08-17', 'Perempuan', '2023-08-19', 78, 90, 196, 18, 15, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_users`, `name`, `username`, `image`, `password`, `level_id`, `is_active`, `date_created`) VALUES
(1, 'Admin', 'admin', 'Fine-Day-Press-Wallpaper3A.jpg', '$2y$10$KCGfI4Htsth8LBUvkeHueuiZ8ax1cuwTMlgNELjh4oXpR.SMLXm92', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `lansia`
--
ALTER TABLE `lansia`
  ADD PRIMARY KEY (`id_lansia`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`id_penimbangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lansia`
--
ALTER TABLE `lansia`
  MODIFY `id_lansia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `id_penimbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
