-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 03:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `akses`) VALUES
(1, 'Admin Log', 1),
(2, 'Manajer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_brgKeluar` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `cabang` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `unit` varchar(30) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `harga_brg` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_brgKeluar`, `id_barang`, `cabang`, `tanggal_keluar`, `unit`, `stok_keluar`, `harga_brg`) VALUES
(1, 'BR10000001', 'Karawang', '2022-05-07', 'BBC', 5, 20000),
(2, 'BR10000002', 'Karawang', '2022-05-08', 'Stie pertiwi', 10, 2000),
(3, 'BR10000003', 'Pondok gede', '2022-05-08', 'BBC', 50, 150000),
(4, 'BR10000002', 'Karawang', '2022-05-24', 'Stie pertiwi', 10, 2000),
(7, 'BR8363737', 'Cikarang', '2022-05-25', 'Stie pertiwi', 10, 2000),
(12, 'BR8363737', 'Cililitan', '2022-05-24', 'BBC', 10, 150000),
(13, 'BR8363737', 'Karawang', '2022-05-27', 'Stie pertiwi', 5, 550000),
(15, 'BR10000001', 'Karawang', '2022-05-27', 'Stie pertiwi', 5, 150000),
(16, 'BR10000001', 'Karawang', '2022-05-27', 'Stie pertiwi', 5, 150000);

--
-- Triggers `tbl_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `tbl_barang_keluar` FOR EACH ROW BEGIN
UPDATE  tbl_data_barang SET stok_brg = stok_brg - NEW.stok_keluar WHERE id_barang = NEW.id_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_brgMasuk` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `hrg_barang` varchar(30) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `id_supplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_brgMasuk`, `id_barang`, `tgl_masuk`, `hrg_barang`, `stok_masuk`, `id_supplier`) VALUES
(1, 'BR10000001', '2022-05-07', '4000', 10, '2'),
(2, 'BR10000001', '2022-05-17', '4000', 5, '1'),
(3, 'BR10000002', '2022-05-07', '7000', 30, '1'),
(4, 'BR10000002', '2022-05-09', '7000', 5, '1'),
(5, 'BR10000003', '2022-05-08', '150000', 200, '1'),
(6, 'BR10000002', '2022-05-25', '7000', 5, '1'),
(10, 'BR837347488', '2022-05-26', '8000', 10, '2'),
(11, 'BR8363737', '2022-05-24', '450000', 5, '1'),
(14, 'BR10000001', '2022-05-27', '8000', 5, '1'),
(15, 'BR10000001', '2022-05-27', '8000', 5, '1'),
(16, 'BR10000001', '2022-06-21', '5000', 5, '6');

--
-- Triggers `tbl_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_barang` AFTER INSERT ON `tbl_barang_masuk` FOR EACH ROW BEGIN
INSERT INTO tbl_data_barang SET id_barang = NEW.id_barang,
stok_brg = NEW.stok_masuk
ON DUPLICATE KEY UPDATE stok_brg = stok_brg + NEW.stok_masuk;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_barang`
--

CREATE TABLE `tbl_data_barang` (
  `id_barang` varchar(30) NOT NULL,
  `nama_brg` varchar(225) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `hrg_brg` int(11) NOT NULL,
  `stok_brg` int(11) NOT NULL,
  `satuan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_barang`
--

INSERT INTO `tbl_data_barang` (`id_barang`, `nama_brg`, `id_kategori`, `hrg_brg`, `stok_brg`, `satuan`) VALUES
('BR0000111', 'Router Wifi', '1', 250000, 0, 'Buah'),
('BR10000001', 'Bannerrr', '1', 4001, 5, 'Meter'),
('BR10000002', 'PC1A', '2', 4000, 0, 'Pcs'),
('BR10000003', 'Print', '1', 7000, 150, 'Pcs'),
('BR8363737', 'Meja', '--Pilih Kategori--', 450000, 35, 'Item'),
('BR837347488', 'Kursi', '1', 8000, 0, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Alat & Bahan'),
(2, 'Buku atau Modul');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `perusahaan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `no_tlp`, `alamat`, `perusahaan`) VALUES
(1, 'Jajang', '087757898899', 'KP. segaran rt 01/rw06', 'PT. Bersinar Sinar'),
(5, 'Didin Sanjaya', '08976546756', 'Jl. Rawamangun jakarta timur No, 01', 'PT. Berkah selalu'),
(8, 'jini', '08976546756', 'Kabupaten bekasi jawa barat', 'PT. Maju Tak Mundur'),
(10, 'Diki', '08976546756', 'Kabupaten bekasi jawa barat', 'PT. Suka Suka Saya'),
(13, 'Friska Tarigan ', '089672626898', 'Bojongsari pebayuran bekasi', 'PT. Residu Sinar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `hak_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `jenis_kelamin`, `password`, `tgl_masuk`, `image`, `hak_akses`) VALUES
(14, 'Fahmi sovi shobandi', 'fahmi01', 'Laki-laki', 'cae55bba2bdb58141037032e450b9372', '2022-06-22', NULL, 1),
(15, 'Diki Setiawan', 'diki101', 'Laki-laki', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-22', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_brgKeluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_brgMasuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_data_barang`
--
ALTER TABLE `tbl_data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_brgKeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_brgMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD CONSTRAINT `tbl_barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_data_barang` (`id_barang`);

--
-- Constraints for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD CONSTRAINT `tbl_barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_data_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
