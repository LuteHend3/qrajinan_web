-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 12:56 PM
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
-- Database: `smartshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `judul_ad` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `link_ad` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Ipong 69', 70, 56630, 1, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'done'),
(2, 'Ipong 69', 5, 4045, 2, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'done'),
(3, 'Ipong 69', 6, 4854, 3, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'done'),
(4, 'Ipong 69', 7, 5663, 4, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(5, 'Ipong 69', 9, 7281, 5, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(6, 'Ipong 69', 9, 7281, 6, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(7, 'Ipong 69', 9, 7281, 6, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(8, 'Ipong 69', 8, 6472, 7, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(9, 'Ipong 69', 1, 809, 8, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(10, 'Ipong 69', 1, 809, 9, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'ready'),
(11, 'Ipong 69', 10, 8090, 10, 3, 'emon ww', 'sadadaw', 'done');

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
(1, 'Smartphone', 'phone'),
(2, 'Smartcam', 'cam'),
(3, 'Laptop', 'laptop'),
(4, 'Smartwatch', 'watch'),
(5, 'Smartspeaker', 'speaker'),
(6, 'SmartVR', 'vr');

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
(1, 'GoogleBlue.jpg', 1),
(2, 'blue-iphone.jpg', 1),
(3, 'galaxy-s7-edge-black.png', 1),
(4, '61EsR4QA0PL._SL1500_.jpg', 2),
(5, 'oculus_rift_1.jpg', 2),
(6, '37103921_2281567541859811_2732584229530501120_n.jpg', 2),
(7, 'ac4_Wallpaper2_1920x1080.jpg', 3),
(8, 'ac4_Wallpaper3_1280x720.jpg', 3),
(9, 'ac4_Wallpaper4_1280x720.jpg', 3);

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
  `thumbnail` varchar(1000) NOT NULL,
  `promo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_kategori`, `nama_product`, `deskripsi_product`, `harga_produk`, `stok_barang`, `id_picture`, `thumbnail`, `promo`) VALUES
(1, 1, 'Ipong 69', 'uu', 809, 80, 1, 'etui-diztronic-matte-tpu-google-pixel-xl-alloy-grey.jpg', ''),
(2, 6, 'VR Boegil', 'XD', 6969, 69, 2, '61ahfXnBa0L._SX522_.jpg', ''),
(3, 6, 'Mek', 'nice', 1000, 6, 3, 'ac4_Wallpaper1_1920x1080.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `kuantitas_transaksi` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_transaksi` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produit`, `kuantitas_transaksi`, `tgl_transaksi`, `status_transaksi`, `id_user`) VALUES
(3, 1, 6, '2018-12-17 06:47:18', 'paid', 5),
(6, 1, 9, '2018-12-17 07:13:27', 'paid', 5),
(7, 1, 8, '2018-12-17 07:13:27', 'paid', 5),
(9, 1, 1, '2018-12-17 07:16:05', 'paid', 5),
(10, 1, 10, '2018-12-17 11:45:01', 'paid', 3);

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
(1, 'ajg@gmail.com', 'Ajg', 'Qnotl', 'c4ca4238a0b923820dcc509a6f75849b', 'Jl. memek', 'admin'),
(3, 'sans@gmail.com', 'emon', 'ww', 'c4ca4238a0b923820dcc509a6f75849b', 'sadadaw', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_transaksi`
--
ALTER TABLE `details_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_user`);

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
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details_transaksi`
--
ALTER TABLE `details_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_picture`) REFERENCES `pictures` (`id_picture`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
