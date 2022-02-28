-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 11:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `invoice`, `nama`, `qty`, `harga`, `sub_total`, `tanggal`) VALUES
(37, 'CF2202240001', 'black coffe', 3, 10000, 30000, '2022-02-24'),
(38, 'CF2202240001', 'vanila coffe latte', 2, 7000, 14000, '2022-02-24'),
(39, 'CF2202240001', 'roti bakar', 1, 5000, 5000, '2022-02-24'),
(40, 'CF2202240001', 'risol', 1, 7000, 7000, '2022-02-24'),
(41, 'CF2202240001', 'roti bakar', 1, 5000, 5000, '2022-02-24'),
(42, 'CF2202240001', 'vanila coffe latte', 2, 7000, 14000, '2022-02-24'),
(43, 'CF2202270001', 'air mineral', 1, 3000, 3000, '2022-02-27'),
(44, 'CF2202270001', 'roti bakar', 1, 5000, 5000, '2022-02-27'),
(45, 'CF2202270001', 'mendoan', 2, 5000, 10000, '2022-02-27'),
(46, 'CF2202270001', 'coklat panas', 1, 5000, 5000, '2022-02-27'),
(47, 'CF2202270001', 'vanila coffe latte', 1, 7000, 7000, '2022-02-27'),
(48, 'CF2202270001', 'black coffe', 1, 10000, 10000, '2022-02-27'),
(49, 'CF2202270001', 'tahu', 1, 3000, 3000, '2022-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `qty`, `jenis`, `gambar`) VALUES
(1, 'vanila coffe latte', 7000, 7, 'minuman', 'minuman.png'),
(2, 'roti bakar', 5000, 8, 'makanan', 'makanan.png'),
(3, 'risol', 7000, 10, 'makanan', 'makanan.png'),
(4, 'black coffe', 10000, 9, 'minuman', 'minuman.png'),
(9, 'mendoan', 5000, 98, 'makanan', 'makanan.png'),
(10, 'tahu', 3000, 99, 'makanan', 'makanan.png'),
(11, 'air mineral', 3000, 99, 'minuman', 'minuman.png'),
(12, 'coklat panas', 5000, 99, 'minuman', 'minuman.png');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembukuan`
--

CREATE TABLE `pembukuan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `atas_nama` varchar(200) DEFAULT NULL,
  `no_meja` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `warna`, `code`) VALUES
(1, 'abu-abu', 'bg-secondary'),
(2, 'hitam', 'bg-dark'),
(3, 'merah', 'bg-danger'),
(4, 'biru', 'bg-primary'),
(5, 'Kuning', 'bg-warning'),
(6, 'Hijau', 'bg-success');

-- --------------------------------------------------------

--
-- Table structure for table `tema_default`
--

CREATE TABLE `tema_default` (
  `id` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_tombol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema_default`
--

INSERT INTO `tema_default` (`id`, `id_tema`, `id_tombol`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tombol`
--

CREATE TABLE `tombol` (
  `id` int(11) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tombol`
--

INSERT INTO `tombol` (`id`, `warna`, `code`) VALUES
(1, 'Abu-abu', 'btn-secondary'),
(2, 'Hitam', 'btn-dark'),
(3, 'Merah', 'btn-danger'),
(4, 'Biru', 'btn-primary'),
(5, 'Kuning', 'btn-warning'),
(6, 'Hijau', 'btn-success');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `sandi` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `no_hp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `sandi`, `nama`, `alamat`, `foto`, `no_hp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Magelang', 'default1.png', 123456789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembukuan`
--
ALTER TABLE `pembukuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tema_default`
--
ALTER TABLE `tema_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tombol`
--
ALTER TABLE `tombol`
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
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembukuan`
--
ALTER TABLE `pembukuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tema_default`
--
ALTER TABLE `tema_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tombol`
--
ALTER TABLE `tombol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
