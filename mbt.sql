-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2025 pada 09.33
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
-- Database: `mbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengingat`
--

CREATE TABLE `pengingat` (
  `id` int(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengingat`
--

INSERT INTO `pengingat` (`id`, `email`, `date`, `judul`, `deskripsi`) VALUES
(1, 'fityaawanda@gmail.com', '2025-04-15', 'Jadwal Imunisasi	', 'Datang ke posyandu pukul 08.00'),
(2, 'arimbi@gmail.com', '2025-05-10', 'Jadwal Melahirkan', 'di RSA kabupaten Bojonegoro'),
(3, 'eva@gmail.com', '2025-06-06', 'Tindik', 'di RSUD Dr. Sosodoro'),
(4, 'fityaawanda@gmail.com', '2025-05-01', 'kesaktian pancasila', 'libur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`nama`, `email`, `password`) VALUES
('Arimbi Puspitasari', 'arimbi@gmail.com', '0'),
('Evva', 'eva@gmail.com', '1'),
('Awanda fitya Zahra', 'fityaawanda@gmail.com', '081231');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengingat`
--
ALTER TABLE `pengingat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengingat`
--
ALTER TABLE `pengingat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
