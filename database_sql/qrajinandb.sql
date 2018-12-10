-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2018 pada 08.21
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(0, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(0, '', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_product`
--

CREATE TABLE `order_product` (
  `id_order_product` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `singel_price` decimal(13,2) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(10) NOT NULL,
  `id_toko` int(10) NOT NULL,
  `id_warna` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `stock` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_photos`
--

CREATE TABLE `product_photos` (
  `id_product_photos` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `path` varchar(255) NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(10) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `visi_misi_toko` text NOT NULL,
  `alamat_toko` text NOT NULL,
  `kodepos_toko` varchar(255) NOT NULL,
  `provinsi_toko` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(60) NOT NULL,
  `nama_pertama_user` varchar(255) NOT NULL,
  `nama_terakhir_user` varchar(255) NOT NULL,
  `tanggal_lahir_user` date NOT NULL,
  `alamat_user` text NOT NULL,
  `kodepos_user` varchar(255) NOT NULL,
  `provinsi_user` varchar(255) NOT NULL,
  `phone_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(10) NOT NULL,
  `code_warna` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order_product`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_warna` (`id_warna`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`id_product_photos`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id_order_product` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `id_product_photos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna` (`id_warna`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `product_photos`
--
ALTER TABLE `product_photos`
  ADD CONSTRAINT `product_photos_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
