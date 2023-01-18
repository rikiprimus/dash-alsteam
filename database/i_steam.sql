-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2022 pada 16.00
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_steam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_history`
--

CREATE TABLE `is_history` (
  `id_history` varchar(9) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jenis_kendaraan` varchar(6) NOT NULL,
  `no_plat_kendaraan` varchar(8) NOT NULL,
  `biaya_pegawai` int(7) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_history`
--

INSERT INTO `is_history` (`id_history`, `tanggal`, `nama_pelanggan`, `nama_pegawai`, `jenis_kendaraan`, `no_plat_kendaraan`, `biaya_pegawai`, `harga`) VALUES
('TR-00001', '2022-08-26', 'Jamal', 'Fikri', 'Motor', 'B3509ERF', 5000, 15000),
('TR-00002', '2022-08-26', 'Fikri', 'Greg', 'Motor', 'B4239KFM', 5000, 10000),
('TR-00003', '2022-08-26', 'Cika', 'Fikri', 'Motor', 'B4067KMA', 5000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_layanan`
--

CREATE TABLE `is_layanan` (
  `id_layanan` int(2) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `jenis_kendaraan` enum('Mobil','Motor') NOT NULL,
  `biaya_pegawai` int(7) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_layanan`
--

INSERT INTO `is_layanan` (`id_layanan`, `nama_layanan`, `jenis_kendaraan`, `biaya_pegawai`, `harga`) VALUES
(1, 'Layanan Motor Biasa', 'Motor', 5000, 10000),
(2, 'Layanan Motor Spesial', 'Motor', 5000, 15000),
(3, 'Layanan Mobil Biasa', 'Mobil', 15000, 25000),
(4, 'Layanan Mobil Spesial', 'Mobil', 30000, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_pegawai`
--

CREATE TABLE `is_pegawai` (
  `id_pegawai` int(2) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `alamat_pegawai` varchar(70) NOT NULL,
  `telp_pegawai` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_pegawai`
--

INSERT INTO `is_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `telp_pegawai`) VALUES
(1, 'Fikri', 'Jalan Tanah Koja', '08729377922'),
(8, 'Greg', 'Jalan Musika nitra', '08927923802'),
(10, 'Mustika', 'Jalan Mutia', '08173823882'),
(11, 'Niko', 'Jalan Tanah Koja 1', '08923823698');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_transaksi`
--

CREATE TABLE `is_transaksi` (
  `id_transaksi` varchar(9) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `pegawai` int(2) NOT NULL,
  `no_plat_kendaraan` varchar(8) NOT NULL,
  `layanan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_transaksi`
--

INSERT INTO `is_transaksi` (`id_transaksi`, `tanggal`, `nama_pelanggan`, `pegawai`, `no_plat_kendaraan`, `layanan`) VALUES
('TR-00001', '2022-08-26', 'Jamal', 1, 'B3509ERF', 2),
('TR-00002', '2022-08-26', 'Fikri', 8, 'B4239KFM', 1),
('TR-00003', '2022-08-26', 'Cika', 1, 'B4067KMA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_user`
--

CREATE TABLE `is_user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(13) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_user`
--

INSERT INTO `is_user` (`id_user`, `username`, `password`, `nama_user`, `hak_akses`) VALUES
(1, 'ricky', '56ea8b83122449e814e0fd7bfb5f220a', 'Ricky Primus', 'admin'),
(2, 'aldi', '5cf15fc7e77e85f5d525727358c0ffc9', 'Muhammad Aldi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `is_history`
--
ALTER TABLE `is_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `is_layanan`
--
ALTER TABLE `is_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `is_pegawai`
--
ALTER TABLE `is_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `is_transaksi`
--
ALTER TABLE `is_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `is_transaksi_ibfk_1` (`layanan`),
  ADD KEY `pegawai` (`pegawai`);

--
-- Indeks untuk tabel `is_user`
--
ALTER TABLE `is_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `is_layanan`
--
ALTER TABLE `is_layanan`
  MODIFY `id_layanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `is_pegawai`
--
ALTER TABLE `is_pegawai`
  MODIFY `id_pegawai` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `is_user`
--
ALTER TABLE `is_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `is_transaksi`
--
ALTER TABLE `is_transaksi`
  ADD CONSTRAINT `is_transaksi_ibfk_1` FOREIGN KEY (`layanan`) REFERENCES `is_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
