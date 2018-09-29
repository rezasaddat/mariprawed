-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 03:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
-- Table structure for table `ahp_kriteria`
--

CREATE TABLE `ahp_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `prioritas_kriteria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahp_kriteria`
--

INSERT INTO `ahp_kriteria` (`id`, `nama_kriteria`, `prioritas_kriteria`) VALUES
(13, 'Harga', '0.49'),
(14, 'Domisili', '0.31'),
(15, 'Tema', '0.20');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tempat_prawed`
--

CREATE TABLE `detail_tempat_prawed` (
  `id` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `rating` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_prawed`
--

INSERT INTO `tempat_prawed` (`id`, `id_tema`, `id_domisili`, `nama_tempat`, `alamat`, `kontak`, `keterangan`, `harga`, `rating`, `gambar`) VALUES
(6, 5, 5, 'Taman Pinus Hutan Raya Juanda', 'Kompleks Tahura Jl. Ir. H.Djuanda', '0222515895', 'Taman Hutan Raya Ir. H. Djuanda merupakan kawasan konservasi yang terpadu antara alam sekunder dengan hutan tanaman yang terletak di Kota Bandung, Indonesia. Luasnya mencapai 590 hektare membentang dari kawasan Dago Pakar sampai Maribaya', '500000', 50, 'dbc9cd484c21542c1d85b7172a41dcfa.JPG'),
(7, 4, 4, 'Ranca Upas', 'Jl. Raya Ciwidey', '0227808996', 'Ranca Upas atau Kampung Cai Ranca Upas adalah salah satu bumi perkemahan di Bandung, Jawa Barat, Indonesia. Terletak di Jalan Raya Ciwidey Patenggang KM. 11, Alam Endah, Ciwidey Kabupaten Bandung, dengan jarak sekitar 50 km dari pusat Kota Bandung', '500000', 50, '630256f29fef7b52481d578b6999bb4c.jpg'),
(8, 4, 5, 'Hutan Cikole', 'Lembang', '02282782441', 'Salah satu sisi Eksotisme Tempat Wisata di Bandung yang jadi buruan wisatawan adalah keindahan alamnya yang masih natural dan berhawa sejuk, dan Wisata Hutan Pinus adalah satu diantaranya.', '200000', 50, '88567256d65df43b193a9f23a75f863d.JPG'),
(9, 4, 5, 'Braga', 'Jalan Braga', '', 'adalah nama sebuah jalan utama di kota Bandung, Indonesia. Nama jalan ini cukup dikenal sejak masa pemerintahan Hindia Belanda. Sampai saat ini nama jalan tersebut tetap dipertahankan sebagai salah satu maskot dan objek wisata kota Bandung yang dahulu dikenal sebagai Parijs van Java.', '', 50, 'bc1fa436b401469ae811b338b34979a0.jpg'),
(10, 4, 5, 'D Café', 'Jalan Dago Pakar Utara', '085102677787', '', '500000', 50, '198863eb87c95d0f8ea6186717b56921.JPG'),
(11, 5, 5, 'L’societe Cafe and Bar', 'Jl. Ir. H.Djuanda No.106', '0222512638', '', '700000', 50, '806a2d7b50d1eb740e167e2b48469b39.JPG'),
(12, 4, 5, 'Stone Garden', 'Citatah Padalarang', '', '', '250000', 50, '5d3723f69a1c3139e4186ddbe6ca9aca.JPG'),
(13, 4, 5, 'Little White', 'Jl. Lodaya No.11A', '0227302602', '', '500000', 50, 'b2f89cfdf46791f03a6514c9ab93bb34.JPG'),
(14, 5, 5, 'Secret Garden', 'Jl. Gunung Agung 12', '0222038367', '', '200000', 50, '9586d18caeb369fb4d779bac2d5dface.JPG'),
(15, 6, 5, 'Congo Café', 'Jl. Rancakendal', '0222531065', '', '500000', 50, 'f1f5b6026f0b13ece237eab6b8452d29.JPG'),
(16, 5, 7, 'Tebing Keraton', 'Lembang Ciburial', '', 'Tebing Keraton atau Tebing Karaton merupakan sebuah tebing yang berada di dalam kawasan Taman Hutan Raya Ir. H. Djuanda. Tebing ini terletak di Kampung Ciharegem Puncak, Desa Ciburial, Bandung, Jawa Barat, Indonesia', '250000', 50, '8615e02d592b97fea6f1a063ea570c94.JPG'),
(18, 4, 7, 'Deranch', 'Jl. Maribaya No.17', '0222785865', 'Peternakan ramah keluarga yang dilengkapi kuda poni & berkuda, permainan anak-anak, hewan ternak, & restoran.', '500000', 40, '7bfaa63f1c791f6c8b904abc263c8008.JPG'),
(19, 5, 7, 'Dusun Bambu', 'Jl. Kolonel Masturi Situ Lembang', '02282782020', '', '500000', 50, 'ddd4940e34ec1d597168675d936ac2cc.JPG'),
(20, 3, 7, 'Floating Market', 'Jl. Grand Hotel No.33E', '0222787766', '', '500000', 40, '0adc6924857c1200b9242dc91e46830c.JPG'),
(21, 5, 7, 'Sapu Lidi', 'Jalan Sersan Bajuri', '0222786915', '', '500000', 30, '1363c663af94a121c18cf1dfe9aeb22a.jpg'),
(22, 5, 5, 'The Parlor', 'Jl. Rancakendal', '02220454439', '', '', 30, '367b740d0a2a055de0e1c65969824d45.JPG'),
(23, 5, 5, 'Victoria Gueshouse', 'Jl. Sukaresmi No.4-6', '0222043718', '', '500000', 30, '7ba2675a125e282077f3e69521291362.JPG'),
(24, 4, 5, 'Treehouse Café', 'Jl. Hasanudin No.5', '0222533648', '', '500000', 20, 'fa115254a6a425f628a80b67bb154e77.JPG'),
(25, 4, 7, 'Maribaya', 'Lembang Kabupaten Bandung Barat Jawa Barat 40391', '', '', '250000', 20, '427cff7a74bbdf9ed9d949020ebbad47.jpg'),
(27, 4, 5, 'Coloni Café', 'Jl. Sumatera No.31', '0222503262', 'none', '500000', 20, '5cb664bb97a3984bc4a6569b6c3bf1c3.jpg'),
(28, 6, 5, 'Kalpa Tree Café', 'Jl. Kiputih No.37', '02264402875', '', '700000', 20, '5762a417c85fbe8c7cddedb4b7ae7598.jpg'),
(29, 3, 5, 'Kawah Putih', 'Ciwidey Jawa Barat', '', '', '500000', 20, '63522c855f6aa13b8a5fdb348239f8fd.jpg'),
(30, 4, 5, 'Maja House', 'Jl. Terusan Sersan Bajuri No.72', '0222788196', '', '500000', 10, '4791ac332bb9cb367bf3f954c9ef8584.JPG'),
(31, 4, 5, 'Kebun The Walini', 'Ciwidey Jawa Barat', '', '', '', 10, 'b9eafe8d6d1daad202df391eb32de557.jpg'),
(32, 5, 5, 'Imah Seniman', 'Jalan Kolonel Masturi No.8', '0222787768', '', '500000', 10, '47d7135a8d43ced2d691e28e7a4d47e6.JPG'),
(33, 5, 5, 'Rocca Café', 'Jl. Progo No.16', '', '', '500000', 10, '6ffd5be0fb94fa784a9edc2bcbb762f3.JPG'),
(34, 5, 4, 'Welfed', 'Jl. Sersan Bajuri', '', '', '700000', 10, '80618b1ede9c4890f6ac6ec529d91141.JPG'),
(35, 5, 5, 'Lutung Kasarung', 'Lembang', '', '', '1000000', 10, '429d15dc429be9863c6f7b38e58ae2f6.jpg'),
(36, 4, 5, 'Paris Van Java', 'Jl. Sukajadi', '', '', '0', 10, 'f9d2f70ff7c08286ad026cd30aaa302e.JPG'),
(37, 4, 7, 'Sindang Reret', 'Jl. Raya Cikole KM. 22', '', '', '500000', 10, '889346db9934f764e16e23f5c413278a.JPG'),
(40, 4, 5, 'Cups Coffe Shop', 'Jl. Trunojoyo No.25', '', '', '500000', 10, 'bedc668f52758f6b29bdfa2880bd7337.JPG'),
(41, 3, 5, 'Gedung Sate', 'Jl. Diponegoro No.22', '', '', '', 10, '31a154bf7fbbf851b8e78cd54ba5ce2c.jpg'),
(42, 4, 5, 'Goldstar 360 Café', 'Jl. Dangdeur Indah No.2b', '', '', '500000', 10, 'f492c3f1b4e7df7c5c02f3f1ace3c454.jpg'),
(43, 4, 7, 'Kampung Daun', 'Jalan Sersan Bajuri', '', '', '500000', 10, '9aa6bf42504f660e3d902d599f868bbd.jpg'),
(44, 4, 5, 'Kota Mini Lembang', 'Lembang', '', '', '500000', 10, 'b74611c4cd0aca2f45e4225249684d61.jpg'),
(45, 4, 5, 'Shusi Thei', 'Jl. Sumatera No.9', '', '', '700000', 10, 'a4a2dca79bb5010e66b9beb195a934fe.JPG'),
(46, 4, 5, 'The Peak', 'Jl. Desa Karawangi No. 388A', '', '', '500000', 10, '5e823e86c971ebb380804ebb3129bdc3.JPG'),
(47, 3, 7, 'Jadul Village', 'Jl. Terusan Sersan Bajuri No.45', '', '', '700000', 30, '956f44b8c0f8a8f86502aa1c61eb36b0.jpg'),
(48, 4, 4, 'Situ Patengan', 'Ciwidey Jawa Barat', '', '', '500000', 0, 'cd26b6640f3da665e36ef2581072ba17.JPG'),
(49, 4, 4, 'Tangkuban Perahu', 'Lembang Jawa Barat', '', '', '500000', 20, '7a57747390a161245a045ec5cf7df34e.JPG'),
(50, 3, 4, 'Kebun Teh Lembang', 'Lembang Ciburial', '', '', '', 20, '1278b0c506abe910c7cf1b95de10435b.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin@mariprawed.com', '4297f44b13955235245b2497399d7a93', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahp_kriteria`
--
ALTER TABLE `ahp_kriteria`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ahp_kriteria`
--
ALTER TABLE `ahp_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_tempat_prawed`
--
ALTER TABLE `detail_tempat_prawed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
