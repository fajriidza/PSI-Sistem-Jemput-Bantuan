-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2019 pada 12.52
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jemput_bantuan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `lokasi`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '', '$2y$10$QEv.lPPoJiAoVQS1YHHhpuvFtjtXVB211KJu25j87iUMe2I/fol9m', '2018-12-01 03:54:03', '2018-12-01 03:54:03'),
(2, 'Admin Kulon Progo', 'adminkulonprogo@admin.com', '3401', '$2y$10$MUMJkIeLZyQFh5kna4GjiO.RJOw9aeNI/CBQgqIN0VYU2eA.CjopS', '2019-06-19 07:46:44', '2019-06-19 07:50:14'),
(3, 'Admin Bantul', 'adminbantul@admin.com', '3402', '$2y$10$98F7RpeSLYBTgvnOB4Uk6.kzm8DTR3yXt.I4WJfG5AgUTfyQfIHzu', '2019-06-19 07:51:43', '2019-06-19 07:51:43'),
(4, 'Admin Gunung Kidul', 'admingunungkidul@admin.com', '3403', '$2y$10$j2JyXMLy5SymEwLPDDCf.uLeNj06ngKymhl82gjVUjaze/7Hq/KT6', '2019-06-19 07:53:03', '2019-06-19 07:53:03'),
(5, 'Admin Sleman', 'adminsleman@admin.com', '3404', '$2y$10$QLltSpY2Y1x/pZF53TJS5Oyqc0qN1Rtpfif857n/5J.Gwt8ZRyvmu', '2019-06-19 07:54:17', '2019-06-19 07:54:17'),
(6, 'Admin Yogyakarta', 'adminyogyakarta@admin.com', '3471', '$2y$10$tiyFXDW.3vyZ8GKv./AtaeVhQC3cvhs9Kr0cshfoOGkkdZCQ5vimK', '2019-06-19 07:55:12', '2019-06-19 07:55:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencana`
--

CREATE TABLE `bencana` (
  `id` int(150) NOT NULL,
  `nama_bencana` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi_bencana` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `waktu_berakhir` date NOT NULL,
  `admin_id` int(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `bencana`
--

INSERT INTO `bencana` (`id`, `nama_bencana`, `deskripsi_bencana`, `gambar`, `lokasi_id`, `waktu_berakhir`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 'Gunung merapi meletus', 'Merapi meletus dini hari', 'urUFbMBekb.jpg', '3404170', '2018-08-30', 5, '2019-07-21 13:15:47', '2019-07-21 06:15:47'),
(3, 'Banjir', 'Banjir karena hujan berkepanjangan', 'bJS9C9RDcx.jpeg', '3404040', '2019-05-05', 5, '2019-07-21 13:17:04', '2019-07-21 06:17:04'),
(4, 'Banjir', 'Banjir dikarenakan sungai meluap', 'Rbp0h02J8U.jpg', '3404030', '2017-02-01', 5, '2019-07-21 13:17:34', '2019-07-21 06:17:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categoris`
--

CREATE TABLE `categoris` (
  `id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categoris`
--

INSERT INTO `categoris` (`id`, `kategori_nama`) VALUES
('1', 'Sandang'),
('2', 'Pangan'),
('3', 'Papan'),
('4', 'Obat-obatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `districts`
--

CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `districts`
--

INSERT INTO `districts` (`id`, `regency_id`, `name`, `jarak`) VALUES
('3401010', '3401', 'TEMON', 13),
('3401020', '3401', 'WATES', 7),
('3401030', '3401', 'PANJATAN', 9),
('3401040', '3401', 'GALUR', 16),
('3401050', '3401', 'LENDAH', 11),
('3401060', '3401', 'SENTOLO', 8.8),
('3401070', '3401', 'PENGASIH', 3.2),
('3401080', '3401', 'KOKAP', 11),
('3401090', '3401', 'GIRIMULYO', 15),
('3401100', '3401', 'NANGGULAN', 10),
('3401110', '3401', 'KALIBAWANG', 31),
('3401120', '3401', 'SAMIGALUH', 3.7),
('3402010', '3402', 'SRANDAKAN', 14),
('3402020', '3402', 'SANDEN', 12),
('3402030', '3402', 'KRETEK', 14),
('3402040', '3402', 'PUNDONG', 10),
('3402050', '3402', 'BAMBANG LIPURO', 7),
('3402060', '3402', 'PANDAK', 6.4),
('3402070', '3402', 'BANTUL', 3.4),
('3402080', '3402', 'JETIS', 6.1),
('3402090', '3402', 'IMOGIRI', 8.2),
('3402100', '3402', 'DLINGO', 20),
('3402110', '3402', 'PLERET', 17),
('3402120', '3402', 'PIYUNGAN', 24),
('3402130', '3402', 'BANGUNTAPAN', 18),
('3402140', '3402', 'SEWON', 9.8),
('3402150', '3402', 'KASIHAN', 11),
('3402160', '3402', 'PAJANGAN', 7),
('3402170', '3402', 'SEDAYU', 16),
('3403010', '3403', 'PANGGANG', 29),
('3403011', '3403', 'PURWOSARI', 1.4),
('3403020', '3403', 'PALIYAN', 12),
('3403030', '3403', 'SAPTO SARI', 22),
('3403040', '3403', 'TEPUS', 23),
('3403041', '3403', 'TANJUNGSARI', 16),
('3403050', '3403', 'RONGKOP', 29),
('3403051', '3403', 'GIRISUBO', 34),
('3403060', '3403', 'SEMANU', 7.2),
('3403070', '3403', 'PONJONG', 14),
('3403080', '3403', 'KARANGMOJO', 10),
('3403090', '3403', 'WONOSARI', 1),
('3403100', '3403', 'PLAYEN', 9.2),
('3403110', '3403', 'PATUK', 16),
('3403120', '3403', 'GEDANG SARI', 30),
('3403130', '3403', 'NGLIPAR', 12),
('3403140', '3403', 'NGAWEN', 23),
('3403150', '3403', 'SEMIN', 23),
('3404010', '3404', 'MOYUDAN', 20),
('3404020', '3404', 'MINGGIR', 17),
('3404030', '3404', 'SEYEGAN', 8.8),
('3404040', '3404', 'GODEAN', 12),
('3404050', '3404', 'GAMPING', 12),
('3404060', '3404', 'MLATI', 5.2),
('3404070', '3404', 'DEPOK', 10),
('3404080', '3404', 'BERBAH', 20),
('3404090', '3404', 'PRAMBANAN', 27),
('3404100', '3404', 'KALASAN', 12),
('3404110', '3404', 'NGEMPLAK', 16),
('3404120', '3404', 'NGAGLIK', 7.2),
('3404130', '3404', 'SLEMAN', 3),
('3404140', '3404', 'TEMPEL', 9.2),
('3404150', '3404', 'TURI', 12),
('3404160', '3404', 'PAKEM', 14),
('3404170', '3404', 'CANGKRINGAN', 21),
('3471010', '3471', 'MANTRIJERON', 5.8),
('3471020', '3471', 'KRATON', 4.7),
('3471030', '3471', 'MERGANGSAN', 4.2),
('3471040', '3471', 'UMBULHARJO', 1.7),
('3471050', '3471', 'KOTAGEDE', 2.8),
('3471060', '3471', 'GONDOKUSUMAN', 3.3),
('3471070', '3471', 'DANUREJAN', 4.5),
('3471080', '3471', 'PAKUALAMAN', 2.4),
('3471090', '3471', 'GONDOMANAN', 3.1),
('3471100', '3471', 'NGAMPILAN', 3.8),
('3471110', '3471', 'WIROBRAJAN', 4.9),
('3471120', '3471', 'GEDONG TENGEN', 4.5),
('3471130', '3471', 'JETIS', 5.1),
('3471140', '3471', 'TEGALREJO', 6.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(150) NOT NULL,
  `kode_donasi` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `pemilik_id` int(10) NOT NULL,
  `kurir_id` int(50) DEFAULT NULL,
  `bencana_id` int(150) NOT NULL,
  `nama_donasi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_donasi` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_donasi` int(50) NOT NULL,
  `lokasi_id` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lokasi_gudang` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi_donasi` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jadwal_jemput` date DEFAULT NULL,
  `waktu_jemput` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `kode_donasi`, `pemilik_id`, `kurir_id`, `bencana_id`, `nama_donasi`, `jenis_donasi`, `jumlah_donasi`, `lokasi_id`, `lokasi_gudang`, `latitude`, `longitude`, `deskripsi_donasi`, `status`, `jadwal_jemput`, `waktu_jemput`, `created_at`, `updated_at`) VALUES
(7, '040720194381', 24, NULL, 1, NULL, '1', 100, '3404110', '3404', NULL, NULL, '10 seragam sekolah', 'Telah Dijemput', '2019-07-06', '12:12:00', '2019-07-04 09:47:31', '2019-07-06 00:12:41'),
(8, '040720199586', 24, NULL, 1, NULL, '2', 10, '3404110', NULL, NULL, NULL, 'tes', 'Telah Dijemput', NULL, NULL, '2019-07-04 10:23:12', '2019-07-04 10:23:12'),
(9, '040720199020', 24, NULL, 1, NULL, '28', 1, '3404110', NULL, NULL, NULL, 'tes', 'Telah Dijemput', NULL, NULL, '2019-07-04 11:19:33', '2019-07-04 11:19:33'),
(10, '060720198181', 27, NULL, 1, NULL, '18', 10, '3404110', NULL, NULL, NULL, '10 kardus', 'Telah Dijemput', NULL, NULL, '2019-07-06 01:33:54', '2019-07-06 01:33:54'),
(11, '060720196290', 28, NULL, 1, NULL, '33', 100, '3404110', '3404', NULL, NULL, '100 obat', 'Telah Dijemput', '2019-12-12', '12:12:00', '2019-07-06 11:55:20', '2019-07-06 11:56:17'),
(12, '060720192549', 28, NULL, 1, NULL, '8', 10, '3404110', '3404', NULL, NULL, '10', 'Telah Dijemput', '2018-02-19', '07:00:00', '2019-07-06 12:09:04', '2019-07-09 18:31:58'),
(13, '070720198546', 24, NULL, 1, NULL, '1', 15, '3404110', NULL, NULL, NULL, '15', 'Telah Dijemput', NULL, NULL, '2019-07-06 17:00:00', '2018-07-06 22:58:01'),
(14, '070720194759', 24, NULL, 1, NULL, '4', 10, '3404110', '3404', NULL, NULL, '10', 'Telah Dijemput', '2019-12-12', '12:12:00', '2019-07-07 01:26:19', '2019-07-07 01:33:03'),
(15, '080720195588', 29, NULL, 0, NULL, '4', 5, NULL, NULL, '-7.689110804056511', '110.40428280830383', 'jaket Kulit', 'Komitmen', NULL, NULL, '2019-07-07 21:32:16', '2019-07-07 21:32:16'),
(16, '080720191979', 29, NULL, 0, NULL, '8', 10, NULL, NULL, NULL, NULL, 'semoga berkah', 'Komitmen', NULL, NULL, '2019-07-07 21:32:46', '2019-07-07 21:32:46'),
(17, '080720196780', 29, NULL, 0, NULL, '19', 1, NULL, NULL, NULL, NULL, 'tenda dom', 'Komitmen', NULL, NULL, '2019-07-07 21:33:04', '2019-07-07 21:33:04'),
(18, '100720196860', 30, NULL, 0, NULL, '6', 10, NULL, NULL, NULL, NULL, 'Rok panjang putih abu-abu', 'Komitmen', NULL, NULL, '2019-07-09 18:01:19', '2019-07-09 18:01:19'),
(19, '100720197160', 31, NULL, 0, NULL, '9', 100, NULL, NULL, NULL, NULL, '100 Karung beras 10Kg', 'Menunggu', NULL, NULL, '2019-07-09 18:03:30', '2019-07-09 18:03:30'),
(20, '100720195515', 31, NULL, 0, NULL, '19', 5, NULL, NULL, NULL, NULL, 'Tenda besarrr', 'Menunggu', NULL, NULL, '2019-07-09 18:04:36', '2019-07-09 18:04:36'),
(21, '100720194699', 31, NULL, 0, NULL, '13', 10, NULL, NULL, NULL, NULL, '10 pack ikan sarden', 'Menunggu', NULL, NULL, '2019-07-09 18:06:31', '2019-07-09 18:06:31'),
(22, '100720194244', 31, NULL, 0, NULL, '23', 5, NULL, NULL, NULL, NULL, '5 pack alkohol 20cc', 'Menunggu', NULL, NULL, '2019-07-09 18:07:33', '2019-07-09 18:07:33'),
(23, '100720198686', 32, NULL, 0, NULL, '13', 20, NULL, NULL, NULL, NULL, '20 kardus indomie goreng', 'Menunggu', NULL, NULL, '2019-07-09 18:10:36', '2019-07-09 18:10:36'),
(24, '100720197052', 32, NULL, 0, NULL, '20', 10, NULL, NULL, NULL, NULL, '10 terpal ukuran 4x5', 'Menunggu', NULL, NULL, '2019-07-09 18:11:04', '2019-07-09 18:11:04'),
(25, '100720194721', 32, NULL, 0, NULL, '14', 15, NULL, NULL, NULL, NULL, '15 kaleng susu rasa coklat dan vanilla', 'Menunggu', NULL, NULL, '2019-07-09 18:11:39', '2019-07-09 18:11:39'),
(26, '100720194262', 32, NULL, 0, NULL, '1', 30, NULL, NULL, NULL, NULL, '30 seragam SMA', 'Menunggu', NULL, NULL, '2019-07-09 18:12:03', '2019-07-09 18:12:03'),
(27, '100720193310', 33, NULL, 0, NULL, '19', 3, NULL, NULL, NULL, NULL, '3 tenda dom', 'Komitmen', NULL, NULL, '2019-07-09 18:16:47', '2019-07-09 18:16:47'),
(28, '100720199010', 33, NULL, 0, NULL, '28', 20, NULL, NULL, NULL, NULL, '20 dos vitamin C', 'Komitmen', NULL, NULL, '2019-07-09 18:17:30', '2019-07-09 18:17:30'),
(29, '100720191274', 33, NULL, 0, NULL, '16', 27, NULL, NULL, NULL, NULL, '27 pak kopi hitam', 'Komitmen', NULL, NULL, '2019-07-09 18:18:09', '2019-07-09 18:18:09'),
(30, '100720191980', 33, NULL, 0, NULL, '2', 25, NULL, NULL, NULL, NULL, '25 pasang baju tidur perempuan dan laki-laki', 'Komitmen', NULL, NULL, '2019-07-09 18:18:48', '2019-07-09 18:18:48'),
(31, '100720191027', 34, NULL, 0, NULL, '4', 15, NULL, NULL, NULL, NULL, '15jaket untuk menghangatkan tubuh', 'Komitmen', NULL, NULL, '2019-07-09 18:21:58', '2019-07-09 18:21:58'),
(32, '100720197593', 34, NULL, 0, NULL, '23', 10, NULL, NULL, NULL, NULL, '10 pak alkohol', 'Komitmen', NULL, NULL, '2019-07-09 18:22:25', '2019-07-09 18:22:25'),
(33, '100720199714', 34, NULL, 0, NULL, '10', 15, NULL, NULL, NULL, NULL, '15 roti tawar', 'Komitmen', NULL, NULL, '2019-07-09 18:22:56', '2019-07-09 18:22:56'),
(34, '210720198836', 24, NULL, 2, NULL, '2', 10, '3404170', NULL, '-7.687813653019741', '110.41324138641357', '10 Baju Tidur', 'Komitmen', NULL, NULL, '2019-07-21 06:31:00', '2019-07-21 06:31:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama_gudang` varchar(150) NOT NULL,
  `lokasi_id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`id`, `nama_gudang`, `lokasi_id`, `alamat`) VALUES
('3401', 'Gudang Kulon Progo', '3401', 'Kulon Progo'),
('3402', 'Gudang Bantul', '3402', 'Bantul'),
('3403', 'Gudang Gunung Kidul', '3403', 'Gunung Kidul'),
('3404', 'Gudang Sleman', '3404', 'Sleman'),
('3471', 'Gudang Yogyakarta', '3471', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kategori`
--

CREATE TABLE `jenis_kategori` (
  `id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoris` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kategori` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jenis_kategori`
--

INSERT INTO `jenis_kategori` (`id`, `id_categoris`, `jenis_kategori`, `nilai_item`) VALUES
('1', '1', 'Seragam Sekolah', 2.3),
('10', '2', 'Roti', 35),
('11', '2', 'Makanan kaleng', 23.3),
('12', '2', 'Biskuit', 23.3),
('13', '2', 'Makanan instan', 23.3),
('14', '2', 'Susu', 23.3),
('15', '2', 'Teh', 1.75),
('16', '2', 'Kopi', 1.75),
('17', '2', 'Bumbu dapur', 1.75),
('18', '2', 'Air mineral', 36),
('19', '3', 'Tenda', 70.1),
('2', '1', 'Baju tidur', 2.3),
('20', '3', 'Terpal', 35),
('21', '4', 'Kassa', 1.75),
('22', '4', 'Obat luka', 1.75),
('23', '4', 'Alkohol', 2.8),
('24', '4', 'Perban', 1.75),
('25', '4', 'Antibiotik', 1.75),
('26', '4', 'Obat diare', 1.75),
('27', '4', 'Aspirin', 1.75),
('28', '4', 'Vitamin', 1.75),
('29', '4', 'Paracetamol', 1.75),
('3', '1', 'Kaos', 2.3),
('30', '4', 'Obat batuk', 1.75),
('31', '4', 'Salep', 1.75),
('32', '4', 'Minyak kayu putih', 1.75),
('33', '4', 'Obat untuk alergi', 1.75),
('4', '1', 'Jaket', 2),
('5', '1', 'Celana', 2.3),
('6', '1', 'Rok', 2.3),
('7', '1', 'Sarung', 2.3),
('8', '1', 'Selimut', 7),
('9', '2', 'Beras', 2.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi_tugas` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `alamat`, `no_hp`, `lokasi_tugas`, `created_at`, `updated_at`) VALUES
(1, 'Fajri Idza Inayah', 'jalan genjeaaaa', '434345', '3404', '2019-07-07 06:14:14', '2019-07-01 08:54:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakar`
--

CREATE TABLE `pakar` (
  `id` int(50) NOT NULL,
  `variable` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `batas_atas` int(100) NOT NULL,
  `batas_bawah` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pakar`
--

INSERT INTO `pakar` (`id`, `variable`, `batas_atas`, `batas_bawah`, `created_at`, `updated_at`) VALUES
(1, 'Jarak', 25, 5, '2019-07-07 13:35:57', '2019-07-06 17:00:00'),
(2, 'Item', 120, 20, '2019-07-07 13:36:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `regencies`
--

INSERT INTO `regencies` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `no_hp`, `alamat`, `lokasi_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'Fajri Idza Inayah', '7899877', 'Jl Kaliurang KM 14.5', '3404110', 'donatur1@donate.com', NULL, '$2y$10$o3Gn4uIuhv5eveXws69q7.1mpVAcB6ex7Dg5SzzLblu9dGtF8wp6W', '3THsfhvbRrbGeTgYbqY3GVDMdU1GCx1waazCfqXpJ2iy6Gqo45HWyhWc3uuC', '2019-05-24 19:59:10', '2019-05-24 19:59:10'),
(25, 'donatur', '3232', 'Kota yogja', '3471020', 'donatur2@donate.com', NULL, '$2y$10$IFO0sk//8b9YAhAqDcayo.fY13o5EyDYVWxE/YDpnNFIki.gculxS', NULL, '2019-07-02 09:31:37', '2019-07-02 09:31:37'),
(26, 'donatur3', 'sadsdasda', 'adssadasd', '3402090', 'donatur3@donate.com', NULL, '$2y$10$.WnMFARDVRaL1uIv86txgOIqvsdlrZ6z8DwfsAawuMAXyHXB2ACTe', 'y31DfGwzNgYVtY1tucBxTbFqD82oVeUyrVySqrsWXzui1jS5kQmJiw81581y', '2019-07-02 09:32:26', '2019-07-02 09:32:26'),
(27, 'donatur4', '323232', 'yeeahh', '3404120', 'donatur4@donate.com', NULL, '$2y$10$t/gh5xKdlDNZOSjPA7lZn.5E/SNhHtqoTxOJuMwf8rwO8GLAqPRP2', 'pJT1BWAxHYmgaYFVjiHZw2hrgwabzE0zKkhBf5vodgzzYQpbwLWRGy02ZXKo', '2019-07-06 01:33:14', '2019-07-06 01:33:14'),
(28, 'donatur5', '232', 'saddsa', '3404090', 'donatur5@donate.com', NULL, '$2y$10$dB6IcVFk9/mGZCcD4KgunOSWGxs9Gth2K0nabr0Mpn4ROpNtZ6SnS', NULL, '2019-07-06 11:54:44', '2019-07-06 11:54:44'),
(29, 'Faza Nur Azizi', '081228558865', 'Nglanjaran , Sardonoharjo,Ngaglik,Sleman', '3404160', 'faza.azizi.faz@gmail.com', NULL, '$2y$10$C8Q4HtVlWXbIy17lxaV2h..fn0/pvtFDVbozmtQn3o80V5Otvklva', 'NapbgIqhkavbTOnPXdRp8aEjIUKuANuJIoxiP8Nr6gVsE8ovKTOcmzG2F1pm', '2019-07-07 21:30:49', '2019-07-07 21:30:49'),
(30, 'Hirzin Fathoni', '085264487241', 'Perumahan Pastika Concat', '3404130', 'hirzinfathoni@donate.com', NULL, '$2y$10$pYWP/Wjo8BKF7aoxuumaaO2lSTnu0lS2UQSbvJdHjW01iRNfVOjHC', 'F6mfc0Ds7xOu2vXnjA2PFG0myDaey8uTin9OzGmJMC2lo9FscPSzD9tMvuUU', '2019-07-09 17:59:33', '2019-07-09 17:59:33'),
(31, 'Donatebantul', '002827', 'Mbantul', '3402040', 'donatebantul@donate.com', NULL, '$2y$10$KeFSJj76mIQsTWHdumEFGubgkif193HynC..TBdQhpi7BbF9igER2', 'h9oMDrOZAjw2qRpG1xsoAlFKZgM7VnGTXeZOk4bo4XiVkjyvRmnqDPvYkE1V', '2019-07-09 18:02:42', '2019-07-09 18:02:42'),
(32, 'Indah Pangestuti', '081228558865', 'Cokrodipan, Wates, Kulonprogo', '3401020', 'IndahP@gmail.com', NULL, '$2y$10$axsSTpC4m9nOuUQFzZRI0ulgKy8xNFhsxLNHgbnyiiseVxsd80PE2', 'puLQNeDU6qHBa3ZVoQIEQFt92wL3BxpHpcUEaEINcSsj4Wi4p1Ti0ciJyzz6', '2019-07-09 18:09:38', '2019-07-09 18:09:38'),
(33, 'Ibnu Haidar', '081227664889', 'Purwosari no 40, Turi, Sleman, Yogyakarta', '3404150', 'IbnuH@gmail.com', NULL, '$2y$10$wsW92JznLY9bSFoNr37oT.LlmDWRzsx6ph8TniLYeKFtoxdv.SjYS', '3NKJDIOMhhS9EeccFOZFGcZIZ3rcSb4tU9W8nSTn58sl3EkAdan2Y9knXmgb', '2019-07-09 18:15:57', '2019-07-09 18:15:57'),
(34, 'Dwiko Lim', '081223445667', 'candirejo, minggir, sleman, yogyakarta', '3404020', 'DwikoN@gmail.com', NULL, '$2y$10$Vh6YAnpKLoazfkcivU3nQOVN2NVHiZcEKAn7G8vgxu/aYaB9j5sEm', '4EeytsfdIWtFwvFIVCHkIyP7t51MU7PR434yDCH0bFwO0tUTkLWMR0rhWQKl', '2019-07-09 18:20:55', '2019-07-09 18:20:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `lokasi` (`lokasi`) USING BTREE;

--
-- Indeks untuk tabel `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_id_index` (`regency_id`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi` (`lokasi_id`),
  ADD KEY `pemilik` (`pemilik_id`),
  ADD KEY `bencana` (`bencana_id`),
  ADD KEY `jenis_donasi` (`jenis_donasi`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- Indeks untuk tabel `jenis_kategori`
--
ALTER TABLE `jenis_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_kategori_id_categoris` (`id_categoris`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `lokasi` (`lokasi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`lokasi_id`) REFERENCES `regencies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
