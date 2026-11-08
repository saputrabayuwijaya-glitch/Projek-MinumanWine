-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2026 at 01:10 PM
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
-- Database: `sistem_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `Id_detail` char(10) NOT NULL,
  `Id_penjualan` char(10) DEFAULT NULL,
  `Id_produk` char(10) DEFAULT NULL,
  `jumlah` char(10) DEFAULT NULL,
  `Sub_Total` decimal(15,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`Id_detail`, `Id_penjualan`, `Id_produk`, `jumlah`, `Sub_Total`) VALUES
('Be9003', 'WE2993', 'MD39300', '90', 0.0000000),
('DT001', 'PEN001', 'PR001', '16', 976.0000000),
('DT003', 'PJ001', 'PR001', '2', 500000.0000000),
('DT004', 'PJ001', 'PR002', '1', 500000.0000000),
('DT006', 'PJ003', 'PR004', '2', 800000.0000000),
('iii9999', 'kl0000', 'hg777', '800', 0.0000000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_Pelanggan` char(11) NOT NULL,
  `No_Akun` varchar(50) DEFAULT NULL,
  `Nama_Pelanggan` varchar(255) NOT NULL,
  `Pengiriman_Alamat` text DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `No_Akun`, `Nama_Pelanggan`, `Pengiriman_Alamat`, `ALAMAT`) VALUES
('B002', '091125', 'Lutfia Indriani', 'Rawa ', 'kp melayu'),
('P001', '008782286', 'Saputra Bayu Wijaya', 'rawa bebek', 'Tokyo'),
('TO9292', 'HW', 'sila', 'kebon ', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `Id_Penjualan` char(10) NOT NULL,
  `Id_Pelanggan` char(10) DEFAULT NULL,
  `Id_Petugas` char(10) DEFAULT NULL,
  `Metode_Pembayaran` varchar(30) DEFAULT NULL,
  `Metode_Pengiriman` varchar(30) DEFAULT NULL,
  `Total_Jumlah` decimal(10,2) DEFAULT NULL,
  `Tanggal_Pengiriman` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`Id_Penjualan`, `Id_Pelanggan`, `Id_Petugas`, `Metode_Pembayaran`, `Metode_Pengiriman`, `Total_Jumlah`, `Tanggal_Pengiriman`) VALUES
('9202800', '2889', '7337', 'Transfer', 'COD', 18.00, '2026-03-19'),
('PEN001', 'P001', 'PE001', 'Transfer/COD', 'Kurir lokal khusus Wine', 16.00, '1983-12-09'),
('PJ001', 'PL001', 'PT001', 'Transfer Bank', 'JNE', 1500000.00, '2025-01-05'),
('PJ002', 'PL002', 'PT002', 'Cash', 'POS Indonesia', 750000.00, '2025-01-06'),
('PJ003', 'PL003', 'PT003', 'E-Wallet', 'SiCepat', 1200000.00, '2025-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `Id_Petugas` char(10) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`Id_Petugas`, `Nama`, `username`, `password`) VALUES
('BI1419', 'Saputra Bayu Wijaya', 'Admin', '0192023a7bbd73250516f069df18b500'),
('IO903', 'Saputra Bayu', NULL, NULL),
('PE001', 'Stevan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id_Produk` char(10) NOT NULL,
  `Deskripsi_Produk` text NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Dept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Deskripsi_Produk`, `Harga`, `Dept`) VALUES
('PR001', 'CH Haut Brion 1971', 41.00, '7'),
('PR002', 'CH Mounton Rothschild 1971', 44.00, '7'),
('PR003', 'Ch Ducn Beauculla 270', 70.00, '7'),
('PR004', 'Ch Boychevelle 270', 35.00, '7'),
('PR005', 'Ch Mngausx 270', 65.00, '7'),
('PR006', 'Ch Lafite 270', 75.00, '7'),
('PR007', 'Ch Latter 266', 84.00, '7'),
('PR008', 'Ch Ground Larose 261', 64.00, '7'),
('PR009', 'Ch Busca Besicellan 270', 76.00, '7'),
('WU8282', 'Mangga', 27889.00, '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`Id_detail`),
  ADD KEY `Id_Penjualan` (`Id_penjualan`),
  ADD KEY `Id_produk` (`Id_produk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`Id_Penjualan`),
  ADD KEY `Id_Pelanggan` (`Id_Pelanggan`),
  ADD KEY `Id_Petugas` (`Id_Petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`Id_Petugas`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_Produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
