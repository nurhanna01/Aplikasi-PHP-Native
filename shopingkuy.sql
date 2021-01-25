-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 06:12 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopingkuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kategori_produk` varchar(30) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `ukuran_produk` varchar(50) NOT NULL,
  `harga_produk` float NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori_produk`, `nama_produk`, `jenis_produk`, `ukuran_produk`, `harga_produk`, `deskripsi_produk`, `stok_produk`, `gambar_produk`) VALUES
(6, 'pakaian', 'Outer/Cardigan', 'pakaian remaja', 'L', 65000, 'Super recommended cardigan yg satu ini, dgn harga PROMO tunggu apalagi yuk buruan ORDER!\r\n\r\nLd : 100 - 110 cm\r\nPb : 90 cm', 20, '60093425792cc.jpg'),
(7, 'elektronik', 'Samsung A21', 'Samrtphone', '720x1080', 2300000, 'Galaxy A20 diotaki chipset Exynos 7884 besutan Samsung dengan clock speed 1,6 GHz yang diapdu dengan RAM 3 GB dan memori internal 32 GB yang bisa diekspansi hingga 512 GB. Ponsel ini dibekali baterai cukup besar yakni 4.000 m', 40, '600934ee22370.jpg'),
(8, 'pakaian', 'Celana Panjang', 'celana jeans wanita', 'L', 75000, 'Deskripsi :\r\nCelana Panjang Jeans Pria\r\nMerk : DC /CHEAP MONDAY/ LEVIS /RR\r\nBahan : Jeans Stricth( Melar)/Slim/Karet/Pencil ', 20, '6009383cdc9a8.jpg'),
(9, 'pakaian', 'Kaos Custom Distro Baju Pria Wanita', 'Katun Combed 30S', 'XL', 75000, 'Tanyakan Stok Yang Tersedia Terlebih Dahulu Sebelum Melakukan Order!\r\nJangan Lupa Klik Ikuti/Follow Toko Kami Untuk Mengetahui Stok Terupdate!\r\n\r\nLUSHIRT, Supplier Jersey Top Grade AAA & Ori Terlengkap Se-Jakarta\r\nMenyediakan Jersey Man, Ladies, Retro, Celana, Kaos Kaki, Kids & Jacket, Hoodie, Varsity, Baselayer, Dll', 30, '6009395d4b384.jpg'),
(10, 'elektronik', 'Acome Speaker Bluetooth 5.0 Jam Alarm LED Display ', '-', 'Diameter 45mm dan 40mm', 75000, ' Spesifikasi\r\n      - Bluetooth version		        : Bluetooth 5.0 \r\n      - Working distance		        : <10M \r\n      - Output power 			: 5W \r\n      - Speaker specifications	: 45mm \r\n      - Frequency response range	: 40HZ - 18KHZ \r\n      - Signal to noise ratio		: >75dB \r\n      - Battery capacity		        : 1200 mAh 3.7V \r\n      - Play time			        : 5 Hours \r\n      - Charging time			: 3 Hours \r\n      - Power input			        : DC 5V 1A \r\n      - Product size			        : 145 x 68.5 x 54.5mm \r\n      - Product weight			: 315g', 30, '600e4d4811e6e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','pelanggan') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `nama`, `alamat`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Nur Hanna', 'sumbar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `fk_user` (`user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
