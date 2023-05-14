-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2023 pada 00.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banksampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nia` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` enum('Master-admin','Admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nia`, `nama`, `telepon`, `email`, `password`, `level`) VALUES
('adm-230502', 'administrator     ', '081222333123', 'admin@gmail.org', 'admin123', 'Master-admin'),
('adm-230503', 'David maulana ', '032111444540', 'internets420@gmail.com', 'admin123', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `nin` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `rt` int(1) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `saldo` int(8) DEFAULT NULL,
  `sampah` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`nin`, `nama`, `rt`, `alamat`, `telepon`, `email`, `password`, `saldo`, `sampah`) VALUES
('NSB1712001', 'Ihsmi  ', 2, 'Jl. murai 8, C.45/4', '085617287718', 'ihsmiica@gmail.com', 'user123', 43500, 1),
('NSB1712002', 'Sabrina   ', 4, 'Jl. murai 8, C.45/4', '085617287718', 'sabrina123@gmail.com', '12345678', 18, 0),
('NSB2305003', 'David maulana', 2, 'Kp Jati', '032111444540', 'aditya@gmail.com', 'admin123', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `jenis_sampah` varchar(15) NOT NULL,
  `satuan` enum('KG','PC','LT') NOT NULL,
  `harga` int(5) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `deskripsi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`jenis_sampah`, `satuan`, `harga`, `gambar`, `deskripsi`) VALUES
('HVS', 'KG', 9000, 'hvs.png', 'Semua Jenis HVS'),
('kaleng ', 'KG', 3000, 'Pocari_Sweat_Kaleng_Dus_ISI_24.jpg', 'semua jenis kaleng'),
('Kardus ', 'KG', 8000, 'kardus.jpg', 'Semua Jenis Kardus'),
('Logam', 'KG', 2500, '1-SPAREPART.png', 'Semua jenis logam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(5) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `nin` varchar(10) NOT NULL,
  `jenis_sampah` varchar(15) NOT NULL,
  `berat` int(4) NOT NULL,
  `harga` int(6) NOT NULL,
  `total` int(8) NOT NULL,
  `nia` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `setor`
--

INSERT INTO `setor` (`id_setor`, `tanggal_setor`, `nin`, `jenis_sampah`, `berat`, `harga`, `total`, `nia`) VALUES
(26, '2023-05-05', 'NSB1712001', 'HVS', 1, 9000, 9000, 'admin123'),
(27, '2023-05-10', 'NSB1712001', 'HVS', 3, 9000, 27000, 'adm-23050'),
(28, '2023-05-11', 'NSB1712001', 'Logam', 3, 2500, 7500, 'adm-23050'),
(29, '2023-05-31', 'NSB1712002', 'kaleng ', 39, 25009, 9, 'adm-23050'),
(30, '2023-04-01', 'NSB2305004', 'HVS', 3, 9000, 50000, 'adm-23050'),
(32, '2023-05-31', 'NSB1712002', 'kaleng ', 39, 25009, 9, 'adm-23050');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarik`
--

CREATE TABLE `tarik` (
  `id_tarik` int(3) NOT NULL,
  `tanggal_tarik` date NOT NULL,
  `nin` varchar(10) NOT NULL,
  `saldo` int(7) NOT NULL,
  `jumlah_tarik` int(7) NOT NULL,
  `nia` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nia`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`nin`);

--
-- Indeks untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`jenis_sampah`);

--
-- Indeks untuk tabel `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indeks untuk tabel `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`id_tarik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tarik`
--
ALTER TABLE `tarik`
  MODIFY `id_tarik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
