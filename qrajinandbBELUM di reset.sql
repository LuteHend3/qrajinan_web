-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 10:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrajinandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `details_transaksi`
--

CREATE TABLE `details_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `product` varchar(1000) NOT NULL,
  `kuantitas_transaksi` int(11) NOT NULL,
  `harga_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `status_transaksi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_transaksi`
--

INSERT INTO `details_transaksi` (`id_detail_transaksi`, `product`, `kuantitas_transaksi`, `harga_transaksi`, `id_transaksi`, `id_user`, `user`, `address`, `status_transaksi`) VALUES
(1, 'Batik Papua', 5, 375000, 1, 3, 'Tri Sulestiyawan', 'Jl. kakau no. 38', 'done'),
(2, 'Alat Musik Tradisional', 4, 600000, 2, 3, 'Tri Sulestiyawan', 'Jl. kakau no. 38', 'done'),
(3, 'Batik Papua', 5, 375000, 3, 4, 'Sony Lala', 'JL. kakatua no. 9', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(1000) NOT NULL,
  `icon_kategori` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `icon_kategori`) VALUES
(1, 'Batik', 'batik'),
(2, 'Aksesoris', 'aksesoris'),
(3, 'Miniatur', 'miniatur'),
(4, 'Alat musik tradisional', 'music'),
(5, 'Pakaian', 'clothing'),
(6, 'Gift & souvenirs', 'gift');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id_picture` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id_picture`, `picture`, `id_produit`) VALUES
(1, 'hqdefault.jpg', 1),
(2, 'gambar-Batik-Cendrawasih-.jpg', 1),
(3, '2948060750.jpg', 1),
(4, 'iadolado-alat-musik-tradisional-sulawesi-tenggara-.jpg', 2),
(5, 'bamboo_angklung-8-nada-bambu-putih_full03.jpg', 2),
(6, 'indexDRUm.jpg', 2),
(7, '001_001_530_1.jpg', 3),
(8, 'gelang-kaki-madura-alias-penggel.jpg', 3),
(9, 'Swarna-Heritage-1.jpg', 3),
(10, 'souvenir-pernikahan-tempelan-kulkas-pengantin-adat-tradisional-217256_image.jpg', 4),
(11, '7152-4.jpg', 4),
(12, 'KD-002_souvenir_pernikahan_kalender_abadi.jpg', 4),
(13, 'RUMAH ADAT KARO 4.jpg', 5),
(14, 'rumah-adat-4-500x500.jpg', 5),
(15, '108671_9083b605-1197-4054-9b3b-497ec632e1f7.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_product` varchar(1000) NOT NULL,
  `deskripsi_product` varchar(1000) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `thumbnail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_kategori`, `nama_product`, `deskripsi_product`, `harga_produk`, `stok_barang`, `id_picture`, `thumbnail`) VALUES
(1, 1, 'Batik Papua', 'Bahan Bagus', 75000, 110, 1, '2b77a-batik2bpapua2b3.jpg'),
(2, 4, 'Alat Musik Tradisional', 'Berbagai Macam Alat musik tradisional', 150000, 96, 2, '220px-COLLECTIE_TROPENMUSEUM_Enkelvellige_bekervormige_trom_TMnr_18-18.jpg'),
(3, 2, 'Aksesoris Tradisional', 'Berbagai macam Aksesoris Tradisional', 40000, 100, 3, 'indeACEHx.jpg'),
(4, 6, 'Souvenir Tradisional', 'Berbagai macam Souvenir Tradisional', 25000, 150, 4, 'sarung hp batik.jpg'),
(5, 3, 'Miniatur Tradisional', 'Berbagai Macam Miniatur Tradisional', 55000, 100, 5, '430414_ffabe119-808d-45f1-8e84-54e37ea45069.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `kuantitas_transaksi` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_transaksi` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_product`, `kuantitas_transaksi`, `tgl_transaksi`, `status_transaksi`, `id_user`) VALUES
(1, 1, 5, '2018-12-18 20:35:12', 'paid', 3),
(2, 2, 4, '2018-12-18 20:35:48', 'paid', 3),
(3, 1, 5, '2018-12-18 21:08:38', 'paid', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(1000) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `firstname`, `lastname`, `password`, `address`, `role`) VALUES
(1, 'andrewbelanda@gmail.com', 'Andrew', 'de Fretes', 'c4ca4238a0b923820dcc509a6f75849b', 'JL. Nindya Karya No. 9', 'admin'),
(2, 'denilson@gmail.com', 'Denilson', 'Mofu', 'c4ca4238a0b923820dcc509a6f75849b', 'Jl. Kasuari no. 77', 'admin'),
(3, 'Tri@gmail.com', 'Tri', 'Sulestiyawan', 'c4ca4238a0b923820dcc509a6f75849b', 'Jl. kakau no. 38', 'client'),
(4, 'sony@gmail.com', 'Sony', 'Onion', '202cb962ac59075b964b07152d234b70', 'JL. kakatua no. 9', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details_transaksi`
--
ALTER TABLE `details_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_user`),
  ADD KEY `details_transaksi_ibfk_2` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id_picture`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_picture` (`id_picture`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details_transaksi`
--
ALTER TABLE `details_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details_transaksi`
--
ALTER TABLE `details_transaksi`
  ADD CONSTRAINT `details_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
