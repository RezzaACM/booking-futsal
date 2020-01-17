-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2020 pada 16.09
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_futsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_jadwal`
--

CREATE TABLE `mt_jadwal` (
  `id` int(11) NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `lapangan_id` int(11) NOT NULL,
  `jam_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_jadwal`
--

INSERT INTO `mt_jadwal` (`id`, `tgl_jadwal`, `lapangan_id`, `jam_id`, `status`) VALUES
(1, '2019-12-26', 4, 1, 1),
(2, '2019-12-26', 4, 2, 0),
(3, '2019-12-27', 4, 2, 1),
(4, '2019-12-27', 7, 1, 1),
(5, '2019-12-26', 4, 1, 1),
(6, '2020-01-08', 7, 1, 1),
(7, '2020-01-08', 4, 14, 1),
(8, '2020-01-15', 7, 1, 1),
(9, '2020-01-16', 4, 10, 1),
(10, '2020-01-17', 4, 10, 1),
(11, '2020-01-15', 7, 20, 1),
(12, '2020-01-16', 4, 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_lapangan`
--

CREATE TABLE `mt_lapangan` (
  `id` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_lapangan`
--

INSERT INTO `mt_lapangan` (`id`, `kode`, `nama`, `harga`, `status`, `deskripsi`) VALUES
(4, 'RK-001', 'San Siro', 120000, 0, '1'),
(7, 'RK-002', 'Santiago Bernab', 120000, 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_pelanggan`
--

CREATE TABLE `mt_pelanggan` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_pelanggan`
--

INSERT INTO `mt_pelanggan` (`id`, `username`, `password`, `nama`, `alamat`, `no_telp`, `email`, `status`) VALUES
(19, 'rezzaacm', '81dc9bdb52d04dc20036dbd8313ed055', 'Funky Reza', 'Villa Mutiara Serpong D3/26', '081779104418', 'Rezza1207@gmail.com', 1),
(20, 'perasetiyoo', 'bca4c1acd694944716e28c6250ac287a', 'Ari prasetyo', '', '081283657196', 'mamajangkung@gmail.c', 1),
(21, 'penca', '76905f1a8a757fb68c5c99c3c36b6050', 'penca', '123123123', '123123', 'penca@gmail.com', 1),
(22, 'alza123', 'da77384fd0b140f635d52a39a1c1170e', 'alza', 'lalaland', '08179289', 'alza@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_transaksi`
--

CREATE TABLE `mt_transaksi` (
  `kd_invoice` varchar(15) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_transaksi`
--

INSERT INTO `mt_transaksi` (`kd_invoice`, `tgl_invoice`, `id_pelanggan`, `id_lapangan`, `id_jadwal`, `lama_sewa`, `total_harga`, `status_bayar`) VALUES
('RF-202001141', '2020-01-14', 19, 4, 9, 2, 240000, 1),
('RF-202001141142', '2020-01-14', 19, 4, 10, 2, 240000, 0),
('RF-202001151143', '2020-01-15', 22, 4, 12, 2, 240000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_waktu`
--

CREATE TABLE `mt_waktu` (
  `id` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_waktu`
--

INSERT INTO `mt_waktu` (`id`, `jam`) VALUES
(1, '08:00:00'),
(2, '09:00:00'),
(5, '10:00:00'),
(6, '11:00:00'),
(7, '12:00:00'),
(8, '13:00:00'),
(9, '14:00:00'),
(10, '15:00:00'),
(11, '16:00:00'),
(12, '17:00:00'),
(13, '18:00:00'),
(14, '19:00:00'),
(16, '21:00:00'),
(17, '22:00:00'),
(20, '20:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mt_jadwal`
--
ALTER TABLE `mt_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mt_lapangan`
--
ALTER TABLE `mt_lapangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `mt_pelanggan`
--
ALTER TABLE `mt_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mt_transaksi`
--
ALTER TABLE `mt_transaksi`
  ADD PRIMARY KEY (`kd_invoice`);

--
-- Indeks untuk tabel `mt_waktu`
--
ALTER TABLE `mt_waktu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mt_jadwal`
--
ALTER TABLE `mt_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mt_lapangan`
--
ALTER TABLE `mt_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mt_pelanggan`
--
ALTER TABLE `mt_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mt_waktu`
--
ALTER TABLE `mt_waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
