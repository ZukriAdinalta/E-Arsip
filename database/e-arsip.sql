-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2022 pada 21.51
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_arsip` varchar(12) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_arsip` varchar(255) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `id_kategori`, `no_arsip`, `nama_file`, `deskripsi`, `file_arsip`, `id_dep`, `id_user`, `ukuran_file`, `tgl_upload`, `tgl_update`) VALUES
(1, 2, '20220224-240', 'Surat Keluar Dari Lurah', 'Surat Keluar Dari Lurah', '1645688417_6df413175a4f53308330.pdf', 2, 5, 75, '2022-02-24', '2022-02-24'),
(4, 1, '20220226-291', 'Surat Masuk Dari Lurah', 'Surat Masuk Dari Lurah', '1645861438_630977c6c4739ff059b0.pdf', 2, 9, 75, '2022-02-26', '2022-02-26'),
(5, 7, '20220226-209', 'Sertifikat Rumah', 'Isi sertifikat rumah ini menjamin perlindungan hukum bagi pihak pemegang sehingga pihak lain tidak bisa mengakui hak atas tanah tersebut.', '1645863719_4a670af5a5f67835b6ac.pdf', 2, 9, 75, '2022-02-26', '2022-02-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dep`
--

CREATE TABLE `tbl_dep` (
  `id_dep` int(11) NOT NULL,
  `nama_dep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dep`
--

INSERT INTO `tbl_dep` (`id_dep`, `nama_dep`) VALUES
(1, 'Keuangan'),
(2, 'Humas'),
(5, 'Pemasaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Surat Masuk'),
(2, 'Surat Keluar'),
(3, 'Berkas Kerja'),
(4, 'Surat Keputusan'),
(5, 'Arsip Umum'),
(6, 'Berkas Kesehatan'),
(7, 'Berkas Internal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_dep`, `created_at`, `updated_at`) VALUES
(1, 'zukri adinalta', 'kumabbj@gmail.com', '$2y$10$wPRa./pNfPdwktvgrWFeOuhOtQsLzo9Bki0gTImUf3oDHFTca0RLO', 1, 'profile1.png', 1, NULL, NULL),
(5, 'Oktavia Pratama', 'adekurniawan1493@gmail.com', '$2y$10$wPRa./pNfPdwktvgrWFeOuhOtQsLzo9Bki0gTImUf3oDHFTca0RLO', 2, '1645610190_07255bfe1ddf1f819f76.jpg', 2, NULL, NULL),
(9, 'Andre Surtiawan', 'andresurtiawan98@gmail.com', '$2y$10$wPRa./pNfPdwktvgrWFeOuhOtQsLzo9Bki0gTImUf3oDHFTca0RLO', 1, '1645790076_a46646c9c27a6714e705.jpg', 1, '2022-02-25', '2022-02-26'),
(10, 'Desnando', 'oktaaman352@gmail.com', '$2y$10$yPa5.K9MTbi6GlNpLYRwOOVymr7kMFFjk1JjD7T6jHQeJfPt7OmWy', 2, '1645866715_ee8808be051de98df209.jpg', 5, '2022-02-26', '2022-02-26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `tbl_dep`
--
ALTER TABLE `tbl_dep`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_dep`
--
ALTER TABLE `tbl_dep`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
