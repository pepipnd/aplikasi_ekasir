-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2021 pada 08.15
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `pk_barang_id` int(3) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `fk_kategori_id` int(2) NOT NULL,
  `fk_satuan_id` int(2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`pk_barang_id`, `nama_barang`, `harga`, `fk_kategori_id`, `fk_satuan_id`, `stok`) VALUES
(1, 'Beras', 12000, 1, 2, 90),
(2, 'Kecap bango', 2000, 1, 4, 87),
(3, 'Garam', 5000, 1, 2, 75),
(4, 'Gula', 3000, 1, 2, 89),
(5, 'Aqua gelas', 34000, 2, 3, 99),
(8, 'paracetamol', 5000, 3, 4, 75),
(9, 'Oskadon', 7000, 3, 4, 88),
(10, 'Pecin', 2000, 1, 1, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kategori`
--

CREATE TABLE `data_kategori` (
  `pk_kategori_id` int(2) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kategori`
--

INSERT INTO `data_kategori` (`pk_kategori_id`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Kesehatan'),
(4, 'alat dapur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_member`
--

CREATE TABLE `data_member` (
  `pk_member_id` int(6) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tipe_member` enum('clasic','premium') NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_member`
--

INSERT INTO `data_member` (`pk_member_id`, `nama_member`, `alamat`, `no_hp`, `tipe_member`, `dibuat_pada`) VALUES
(1, 'Raisa', 'Tasikmalaya', '08976543246', 'clasic', '2021-06-13'),
(2, 'Dindin', 'Tasikmalaya', '089765335657', 'premium', '2021-06-13'),
(3, 'Hani', 'Tasikmalaya', '0876545678', 'clasic', '2021-06-13'),
(4, 'Kania', 'Tasikmalaya', '08976533567', 'premium', '2021-06-13'),
(6, 'pepi', 'tasik', '08996335548', 'clasic', '2021-06-13'),
(7, 'tina', 'tasik', '0897463822', 'premium', '2021-06-13'),
(8, 'kila', 'tasik', '089736456', 'premium', '2021-06-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_satuan`
--

CREATE TABLE `data_satuan` (
  `pk_satuan_id` int(2) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_satuan`
--

INSERT INTO `data_satuan` (`pk_satuan_id`, `nama_satuan`) VALUES
(1, 'pcs'),
(2, 'kg'),
(3, 'box'),
(4, 'saschet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `pk_transaksi_id` int(11) NOT NULL,
  `tipe_konsumen` enum('umum','member') NOT NULL,
  `fk_member_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`pk_transaksi_id`, `tipe_konsumen`, `fk_member_id`, `tanggal_transaksi`, `bayar`) VALUES
(1, 'umum', 0, '2021-06-13', 70000),
(2, 'member', 1, '2021-06-13', 56000),
(6, 'umum', 0, '0000-00-00', 50000),
(8, 'member', 1, '2021-06-13', 35000),
(10, 'member', 2, '2021-06-13', 50000),
(11, 'member', 1, '2021-06-13', 6000),
(12, 'member', 1, '2021-06-13', 30000),
(13, 'member', 2, '2021-06-13', 40000),
(15, 'member', 1, '2021-06-13', 5000),
(17, 'member', 1, '0000-00-00', 50000),
(19, 'member', 2, '2021-06-13', 10000),
(20, 'member', 1, '2021-06-13', 20000),
(21, 'umum', 0, '2021-07-21', 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `pk_detail_transaksi_id` int(11) NOT NULL,
  `fk_transaksi_id` int(11) NOT NULL,
  `fk_barang_id` int(3) NOT NULL,
  `kuantitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`pk_detail_transaksi_id`, `fk_transaksi_id`, `fk_barang_id`, `kuantitas`) VALUES
(1, 6, 1, 1),
(2, 6, 1, 1),
(3, 6, 2, 1),
(4, 6, 1, 2),
(5, 8, 5, 0),
(7, 10, 1, 3),
(8, 11, 4, 2),
(9, 12, 1, 2),
(10, 13, 1, 3),
(15, 15, 3, 1),
(16, 17, 1, 3),
(19, 19, 8, 2),
(21, 20, 1, 1),
(22, 20, 2, 2),
(24, 21, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`pk_barang_id`),
  ADD KEY `fk_kategori_id` (`fk_kategori_id`,`fk_satuan_id`),
  ADD KEY `fk_satuan_id` (`fk_satuan_id`);

--
-- Indeks untuk tabel `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`pk_kategori_id`);

--
-- Indeks untuk tabel `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`pk_member_id`);

--
-- Indeks untuk tabel `data_satuan`
--
ALTER TABLE `data_satuan`
  ADD PRIMARY KEY (`pk_satuan_id`);

--
-- Indeks untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`pk_transaksi_id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`pk_detail_transaksi_id`),
  ADD KEY `fk_transaksi_id` (`fk_transaksi_id`,`fk_barang_id`),
  ADD KEY `fk_barang_id` (`fk_barang_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `pk_barang_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `pk_kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_member`
--
ALTER TABLE `data_member`
  MODIFY `pk_member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_satuan`
--
ALTER TABLE `data_satuan`
  MODIFY `pk_satuan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `pk_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `pk_detail_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `data_barang_ibfk_1` FOREIGN KEY (`fk_kategori_id`) REFERENCES `data_kategori` (`pk_kategori_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `data_barang_ibfk_2` FOREIGN KEY (`fk_satuan_id`) REFERENCES `data_satuan` (`pk_satuan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`fk_barang_id`) REFERENCES `data_barang` (`pk_barang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`fk_transaksi_id`) REFERENCES `data_transaksi` (`pk_transaksi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
