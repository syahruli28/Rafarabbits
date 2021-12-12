-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2020 pada 05.22
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rafarabbits`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(3) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `email_admin` varchar(25) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username_admin`, `email_admin`, `password_admin`) VALUES
(7, 'aqil', 'rafarabbitsadmin@gmail.co', '$2y$10$LuN.sT4wBRu9Q6rPYniMxOoaY59JC9PkmW2pugXIuXzatkgetEmg.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_antrian_pemesanan`
--

CREATE TABLE `tb_antrian_pemesanan` (
  `id_pemesanan` varchar(21) NOT NULL,
  `nama_lengkap_pemesan` varchar(85) NOT NULL,
  `alamat_lengkap_pemesan` varchar(255) NOT NULL,
  `no_wa_pemesan` varchar(15) NOT NULL,
  `list_pembelian` text NOT NULL,
  `total_pembayaran` int(35) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `batas_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_antrian_pemesanan`
--

INSERT INTO `tb_antrian_pemesanan` (`id_pemesanan`, `nama_lengkap_pemesan`, `alamat_lengkap_pemesan`, `no_wa_pemesan`, `list_pembelian`, `total_pembayaran`, `tanggal_pemesanan`, `batas_pembayaran`) VALUES
('boM-11279607-08-2020', 'Ramadhan Ambon', 'asdsjhdfkjhskjdfhjshdfjasdsjhdfkjhskjdfhjshdfjasdsjhdfkjhskjdfhjshdfjasdsjhdfkjhskjdfhjshdfjasdsjhdfkjhskjdfhjshdfj', '123123123123123', '                                                        Netherland                            1                            Rp 120.000,\r\n\r\n                                                        English Anggora                             1                            Rp 145.000,\r\n\r\n                                                    ', 265000, '2020-08-07 16:13:02', '2020-08-09 16:13:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dagangan`
--

CREATE TABLE `tb_dagangan` (
  `id_data` int(3) NOT NULL,
  `nama_hewan` varchar(85) NOT NULL,
  `gambar_hewan` varchar(64) NOT NULL,
  `catatan_tambahan` varchar(225) NOT NULL,
  `harga_hewan` int(35) NOT NULL,
  `ketersediaan` varchar(12) NOT NULL,
  `tanggal_ubah` varchar(12) NOT NULL,
  `jenis_makanan` varchar(50) DEFAULT NULL,
  `aksesoris` varchar(50) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dagangan`
--

INSERT INTO `tb_dagangan` (`id_data`, `nama_hewan`, `gambar_hewan`, `catatan_tambahan`, `harga_hewan`, `ketersediaan`, `tanggal_ubah`, `jenis_makanan`, `aksesoris`, `id_kategori`) VALUES
(6, 'Netherland', 'kelinci1.jpg', 'anakan, betina dan jantan', 120000, 'Ada', '2020/08/06', '-', '-', 1),
(7, 'Netherland', 'kelinci2.jpg', 'Anakan, Jantan', 130000, 'Ada', '2020/08/08', '-', '-', 2),
(8, 'English Anggora ', 'kelinci3.jpg', 'Anakan, Jantan, Albino', 145000, 'Ada', '2020/08/08', '-', '-', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kelinci'),
(2, 'Hamster'),
(7, 'Kucing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan_selesai`
--

CREATE TABLE `tb_pesanan_selesai` (
  `id_pembayaran` varchar(64) NOT NULL,
  `total_pembayaran` int(25) NOT NULL,
  `tanggal_pembayaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan_selesai`
--

INSERT INTO `tb_pesanan_selesai` (`id_pembayaran`, `total_pembayaran`, `tanggal_pembayaran`) VALUES
('Krz-9609308-08-2020', 400000, '08/08/2020'),
('trC-20814809-08-2020', 700000, '09/08/2020');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_antrian_pemesanan`
--
ALTER TABLE `tb_antrian_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `tb_dagangan`
--
ALTER TABLE `tb_dagangan`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pesanan_selesai`
--
ALTER TABLE `tb_pesanan_selesai`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_dagangan`
--
ALTER TABLE `tb_dagangan`
  MODIFY `id_data` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
