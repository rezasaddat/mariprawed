-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Agu 2018 pada 15.37
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

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
-- Struktur dari tabel `ahp_kriteria`
--

CREATE TABLE `ahp_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `prioritas_kriteria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ahp_kriteria`
--

INSERT INTO `ahp_kriteria` (`id`, `nama_kriteria`, `prioritas_kriteria`) VALUES
(13, 'Harga', '0.49'),
(14, 'Domisili', '0.31'),
(15, 'Tema', '0.20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tempat_prawed`
--

CREATE TABLE `detail_tempat_prawed` (
  `id` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili`
--

CREATE TABLE `domisili` (
  `id` int(11) NOT NULL,
  `nama_domisili` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `domisili`
--

INSERT INTO `domisili` (`id`, `nama_domisili`) VALUES
(4, 'Bandung Selatan'),
(5, 'Bandung Utara'),
(6, 'Bandung Timur'),
(7, 'Bandung Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nama_tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id`, `nama_tema`) VALUES
(3, 'Islami'),
(4, 'Casual'),
(5, 'Formal'),
(6, 'Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_prawed`
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
  `rating` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_prawed`
--

INSERT INTO `tempat_prawed` (`id`, `id_tema`, `id_domisili`, `nama_tempat`, `alamat`, `kontak`, `keterangan`, `harga`, `rating`, `gambar`) VALUES
(1, 3, 4, 'praweding 1', 'alamat dummy', '081081', 'information dummy', '2000000', 50, '4f1168e165819afa7fcf904cdd39b91a.jpeg'),
(2, 4, 5, 'praweding 2', 'alamay dummy', '081081', 'information dummy', '1000000', 30, '7315ce801c5e1902f014b67c7e69a209.jpeg'),
(3, 5, 6, 'praweding 3', 'alamat dummy', '081081', 'information dummy', '1500000', 50, 'adbc31a2b1441fa2ace0bb274cce9ed6.jpeg'),
(4, 6, 7, 'praweding 4', 'alamat dummy', '081081', 'information dummy', '2500000', 40, '160b4a2835a2face2066340cbf707912.jpeg'),
(5, 3, 4, 'prawed 5', 'alamat dummy', '081081', 'information dummy', '2000000', 50, '743424e0c9e6bc7395b2180f1a05de0b.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin@mariprawed.com', '4297f44b13955235245b2497399d7a93', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ahp_kriteria`
--
ALTER TABLE `ahp_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_tempat_prawed`
--
ALTER TABLE `detail_tempat_prawed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tempat_prawed`
--
ALTER TABLE `tempat_prawed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ahp_kriteria`
--
ALTER TABLE `ahp_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_tempat_prawed`
--
ALTER TABLE `detail_tempat_prawed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tempat_prawed`
--
ALTER TABLE `tempat_prawed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
