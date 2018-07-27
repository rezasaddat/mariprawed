-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2018 at 02:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariprawed`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tempat_prawed`
--

CREATE TABLE `detail_tempat_prawed` (
  `id` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tempat_prawed`
--

INSERT INTO `detail_tempat_prawed` (`id`, `id_tempat`, `gambar`) VALUES
(1, 3, '0c5548b648ae63ee7b364d749c9690bc.jpg'),
(2, 3, '787c24b5e01a3088fb1574b56a76657b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id` int(11) NOT NULL,
  `nama_domisili` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id`, `nama_domisili`) VALUES
(4, 'Bandung Selatan'),
(5, 'Bandung Utara'),
(6, 'Bandung Timur'),
(7, 'Bandung Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nama_tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `nama_tema`) VALUES
(3, 'Islami'),
(4, 'Casual'),
(5, 'Formal'),
(6, 'Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_prawed`
--

CREATE TABLE `tempat_prawed` (
  `id` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_domisili` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `keterangan` longtext NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_prawed`
--

INSERT INTO `tempat_prawed` (`id`, `id_tema`, `id_domisili`, `nama_tempat`, `alamat`, `kontak`, `keterangan`, `harga`, `gambar`) VALUES
(3, 3, 4, 'Tempat prawed bandung selatan', 'nama jalan di bandung', '081081', 'informasi tempat', '1,231,231', 'b1ff489c0b06f436f93f84e2703127a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tempat_prawed`
--
ALTER TABLE `detail_tempat_prawed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_prawed`
--
ALTER TABLE `tempat_prawed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tempat_prawed`
--
ALTER TABLE `detail_tempat_prawed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempat_prawed`
--
ALTER TABLE `tempat_prawed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
