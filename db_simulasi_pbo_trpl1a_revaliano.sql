-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:47 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_trpl1a_revaliano`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ishigami Senku', 'SMAN 1 Ishigami', 99.99, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Asagiri Gen', 'SMA Kerajaan Sains', 88.50, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Merdeka', NULL, NULL, NULL, NULL),
(3, 'Ooki Taiju', 'SMAN 1 Ishigami', 75.00, 250000.00, 'Reguler', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Ogawa Yuzuriha', 'SMAN 1 Ishigami', 86.25, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Merdeka', NULL, NULL, NULL, NULL),
(5, 'Kaseki', 'SMK Desa Ishigami', 92.00, 250000.00, 'Reguler', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Suika', 'SMP Desa Ishigami', 80.10, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Merdeka', NULL, NULL, NULL, NULL),
(7, 'Francois', 'Akademi Kuliner Internasional', 95.50, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Kohaku', 'SMA Desa Ishigami', 89.00, 150000.00, 'Prestasi', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Utama', 'Kejuaraan Bela Diri', 'Nasional', NULL, NULL),
(9, 'Chrome', 'SMA Kerajaan Sains', 94.50, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Kimia', 'Nasional', NULL, NULL),
(10, 'Shishio Tsukasa', 'SMA Primadona', 98.00, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'MMA Juara Bertahan', 'Internasional', NULL, NULL),
(11, 'Hyouga', 'SMA Elite Pertahanan', 91.20, 150000.00, 'Prestasi', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Utama', 'Tombak Seni Tradisional', 'Nasional', NULL, NULL),
(12, 'Saionji Ukyo', 'Akademi Panahan Garuda', 93.75, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus Merdeka', 'Panahan Kontemporer', 'Internasional', NULL, NULL),
(13, 'Nanami Ryusui', 'SMA Maritim Dunia', 96.00, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Regata Layar Yacht', 'Internasional', NULL, NULL),
(14, 'Kinro', 'SMA Penjaga Desa', 85.50, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus Merdeka', 'Turnamen Anggar', 'Provinsi', NULL, NULL),
(15, 'Ginro', 'SMA Penjaga Desa', 78.00, 350000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus Kedinasan', NULL, NULL, 'SK-101/IK-PERTAHANAN/2026', 'Kementerian Pertahanan'),
(16, 'Nikitani Yo', 'Akademi Kepolisian RI', 82.40, 350000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Kedinasan', NULL, NULL, 'SK-404/IK-POLRI/2026', 'Kepolisian Negara Republik Indonesia'),
(17, 'Hanada Nikita', 'SMA Olahraga Nasional', 84.15, 350000.00, 'Kedinasan', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Kedinasan', NULL, NULL, 'SK-202/IK-MENPORA/2026', 'Kementerian Pemuda dan Olahraga'),
(18, 'Hokutozai', 'Akademi Sumo Regional', 80.00, 350000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Kedinasan', NULL, NULL, 'SK-303/IK-SOSIAL/2026', 'Kementerian Sosial'),
(19, 'Chelsea Monchel', 'SMA Geografi Nusantara', 95.00, 350000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus Kedinasan', NULL, NULL, 'SK-707/IK-BIG/2026', 'Badan Informasi Geospasial'),
(20, 'Dr. Xeno', 'Akademi Antariksa Amerika', 99.50, 350000.00, 'Kedinasan', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Kedinasan', NULL, NULL, 'SK-001/IK-NASA/2026', 'Badan Riset dan Inovasi Nasional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
