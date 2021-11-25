-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2021 pada 11.08
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'layle', 'aku', '27c3dfce458baa39ac0f15bf5ece8bef');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alat`
--

CREATE TABLE `tb_alat` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `keterangan` varchar(11) NOT NULL,
  `berakhir` date NOT NULL,
  `baru` date NOT NULL,
  `foto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alat`
--

INSERT INTO `tb_alat` (`kode`, `nama`, `vendor`, `jenis`, `keterangan`, `berakhir`, `baru`, `foto`) VALUES
('26/99/13/01/04-16/001', 'Water Samplerrrr', 'Unilever', 'Lab', 'Ya', '2021-11-15', '2021-11-16', ''),
('26/99/13/01/07-16/002', 'Kamera Digital', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/07-21/001', 'Particle Counter HTI Detector Air Quality Monitor', '', 'Lab', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/07-21/002', 'Gas Detector 4 in 1 Dan Sampling Pump Bosean BH4S ', '', 'Inspeksi', '', '2021-11-26', '2021-11-27', ''),
('26/99/13/01/07-21/003', 'Magnetic Field Meter Gauss Tesla TENMARS TM-191 EM', '', 'Inspeksi', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/08-16/002', 'Kamera Digital', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/08-21/001', 'GPS Garmin 66S GPSMAP 66 STAM', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/08-21/002', 'GPS Garmin 66S', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/08-21/003', 'Kamera Digital', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/09-21/001', 'Pengadaan Staplex', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/12-18/001', 'Pembelian drone untuk project RPLT', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/12-20/001', 'Gas Analyzer', '', 'Lab', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/01/12-20/002', 'Air Sampler Impinger', '', 'Lab', '', '2021-11-26', '2021-11-27', ''),
('26/99/13/02/03-13/001', 'Magnetic Particle Inspection', '', 'Inspeksi', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/02/03-16/002', 'Earth Tester', '', 'Inspeksi', '', '2021-11-18', '2021-11-19', ''),
('26/99/13/02/03-16/004', 'Ultrasonic Thickness Gauge', '', 'Inspeksi', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/02/03-16/006', 'Insulation Tester', '', 'Inspeksi', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/02/03-16/008', 'GPS', '', 'Survey', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/02/07-21/001', 'Pengadaan Alat Hardness Tester', '', 'Inspeksi', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/02/12-17/001', 'Earth Clamp Tester', '', 'Inspeksi', '', '0000-00-00', '0000-00-00', ''),
('26/99/13/03/09-16/001', 'GENSET 60KVA', '', 'Lab', '', '0000-00-00', '0000-00-00', ''),
('asdsa', 'asd', 'faf', 'ya', 'Lab', '2021-11-18', '2021-11-10', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
