-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2026 pada 14.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_area_parkir`
--

CREATE TABLE `tb_area_parkir` (
  `id_area` int(11) NOT NULL,
  `nama_area` varchar(50) DEFAULT NULL,
  `kapasitas` int(5) DEFAULT NULL,
  `terisi` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_area_parkir`
--

INSERT INTO `tb_area_parkir` (`id_area`, `nama_area`, `kapasitas`, `terisi`) VALUES
(2, 'Area A1', 10, 1),
(4, 'Area A2', 15, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `plat_nomor` varchar(15) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `plat_nomor`, `jenis_kendaraan`, `warna`, `id_user`) VALUES
(1, 'D 1234 FD', 'Motor', 'Hitam', 1),
(3, 'D 4566 FG', 'Motor', 'Putih', 1),
(4, 'D 5263 FN', 'Motor', 'Hitam', 1),
(5, 'F 1234 BFD', 'Motor', 'Hitam', 1),
(6, 'D 4534 FGF', 'Motor', 'Hitam', 1),
(7, 'D 4566 FG', 'Motor', 'Putih', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log_aktivitas`
--

CREATE TABLE `tb_log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `aktivitas` varchar(100) DEFAULT NULL,
  `waktu_aktivitas` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_log_aktivitas`
--

INSERT INTO `tb_log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu_aktivitas`) VALUES
(1, 1, 'Menghapus user ID: 4', NULL),
(2, 2, 'Input kendaraan BK 1945 ML', NULL),
(3, 2, 'Input kendaraan BK 1107 LAB', NULL),
(4, 2, 'Masuk Kendaraan: BK 1945 ML', NULL),
(5, 2, 'Masuk Kendaraan: BK 1945 ML', NULL),
(6, 2, 'Masuk Kendaraan: BK 1945 ML', '2026-01-25 02:37:53'),
(7, 2, 'Masuk: BK 1945 ML', '2026-01-25 02:47:49'),
(8, 2, 'Keluar ID: 6', '2026-01-25 02:58:17'),
(9, 2, 'Masuk: BK 1107 LAB', '2026-01-25 02:58:54'),
(10, 1, 'Masuk: D 1234 FD', '2026-02-07 18:24:14'),
(11, 1, 'Masuk: D 4566 FG', '2026-02-07 18:24:34'),
(12, 2, 'Keluar ID: 2', '2026-02-07 18:24:53'),
(13, 2, 'Keluar ID: 1', '2026-02-07 18:24:56'),
(14, 1, 'Masuk: D 4566 FG', '2026-02-07 21:38:51'),
(15, 1, 'Keluar ID: 3', '2026-02-07 21:38:56'),
(16, 1, 'Masuk: D 5263 FN', '2026-02-07 21:39:39'),
(17, 2, 'Keluar ID: 4', '2026-02-07 21:47:46'),
(18, 1, 'Masuk: F 1234 BFD', '2026-02-09 21:27:09'),
(19, 1, 'Masuk: D 4534 FGF', '2026-02-10 15:59:23'),
(20, 2, 'Masuk: D 4566 FG', '2026-02-25 08:47:37'),
(21, 2, 'Buka Palang ID Transaksi : 3', '2026-03-09 22:07:31'),
(22, 2, 'Buka Palang ID Transaksi : 4', '2026-03-09 23:12:46'),
(23, 2, 'Buka Palang ID Transaksi : 4', '2026-03-09 23:19:13'),
(24, 2, 'Buka Palang ID Transaksi : 1', '2026-03-10 00:48:22'),
(25, 2, 'Buka Palang ID Transaksi : 1', '2026-03-10 00:48:42'),
(26, 2, 'Buka Palang ID Transaksi : 2', '2026-03-10 00:49:02'),
(27, 2, 'Buka Palang ID Transaksi : 4', '2026-03-15 22:15:54'),
(28, 2, 'Buka Palang ID Transaksi : 2', '2026-03-15 22:39:34'),
(29, 2, 'Buka Palang ID Transaksi : 1', '2026-03-15 22:42:25'),
(30, 2, 'Buka Palang ID Transaksi : 4', '2026-03-29 23:53:19'),
(31, 2, 'Buka Palang ID Transaksi : 5', '2026-04-01 11:17:06'),
(32, 2, 'Buka Palang ID Transaksi : 5', '2026-04-01 11:18:07'),
(33, 2, 'Buka Palang ID Transaksi : 5', '2026-04-01 11:18:53'),
(34, 2, 'Buka Palang ID Transaksi : 3', '2026-04-01 21:25:04'),
(35, 2, 'Buka Palang ID Transaksi : 9', '2026-04-01 21:32:40'),
(36, 2, 'Buka Palang ID Transaksi : 12', '2026-04-02 16:30:20'),
(37, 2, 'Buka Palang ID Transaksi : 10', '2026-04-03 10:07:46'),
(38, 2, 'Buka Palang ID Transaksi : 10', '2026-04-03 10:08:22'),
(39, 2, 'Buka Palang ID Transaksi : 10', '2026-04-03 10:09:02'),
(40, 2, 'Buka Palang ID Transaksi : 2', '2026-04-03 11:19:23'),
(41, 2, 'Buka Palang ID Transaksi : 3', '2026-04-03 13:45:10'),
(42, 2, 'Buka Palang ID Transaksi : 7', '2026-04-03 14:38:12'),
(43, 2, 'Buka Palang ID Transaksi : 11', '2026-04-03 15:10:42'),
(44, 2, 'Buka Palang ID Transaksi : 13', '2026-04-03 15:42:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int(11) NOT NULL,
  `jenis_kendaraan` enum('motor','mobil','lainnya','') DEFAULT NULL,
  `tarif_per_jam` decimal(10,0) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `jenis_kendaraan`, `tarif_per_jam`, `status`) VALUES
(14, 'motor', 2000, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `plat_nomor` varchar(255) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `checkin_time` datetime NOT NULL,
  `checkout_time` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT 0,
  `fee` int(11) DEFAULT 0,
  `status` enum('IN','OUT','DONE') DEFAULT 'IN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `plat_nomor`, `card_id`, `checkin_time`, `checkout_time`, `duration`, `fee`, `status`) VALUES
(11, '', '0', '2026-04-03 15:09:04', '2026-04-03 15:10:29', 1, 2000, 'DONE'),
(13, '', '0ABCD555', '2026-04-03 15:32:57', '2026-04-03 15:41:31', 1, 2000, 'DONE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','petugas','owner','') DEFAULT NULL,
  `status_aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `role`, `status_aktif`) VALUES
(1, 'Administrator Sistem', 'admin', '12345', 'admin', 1),
(2, 'Petugas Lapangan', 'petugas', '12345', 'petugas', 1),
(3, 'Pemilik Parkir', 'owner', '12345', 'owner', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_area_parkir`
--
ALTER TABLE `tb_area_parkir`
  ADD PRIMARY KEY (`id_area`);

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_area_parkir`
--
ALTER TABLE `tb_area_parkir`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD CONSTRAINT `tb_kendaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD CONSTRAINT `tb_log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
