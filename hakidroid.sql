-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2016 at 12:11 AM
-- Server version: 5.7.16-0ubuntu0.16.10.1
-- PHP Version: 7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hakidroid`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `telepon_fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `kewarganegaraan`, `npwp`, `alamat`, `email`, `no_hp`, `telepon_fax`, `api_token`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Anjasmoro Adi Nugroho', 'WNI', '00112233', 'Magelang', 'anjasmoro.adi29@gmail.com', '085601004454', '001122', 'icvcQNUcQ2w2JvJWP8JOhtJKPdMdk2epQcNCNjg90Uxj3QormGeRRiQvZWUQ', NULL, '$2y$10$PuH0A9eUP/vZA3wyAJ/OduafKrBe4WfrxEg7hvFnP8bsbLljMs.Wy', '2016-11-23 09:59:18', '2016-11-23 09:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `desain_industri`
--

CREATE TABLE `desain_industri` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `nomor_permohonan` text COLLATE utf8_unicode_ci NOT NULL,
  `biodata_id` int(10) UNSIGNED NOT NULL,
  `konsultan_hki` tinyint(1) NOT NULL,
  `konsultan_hki_id` int(10) UNSIGNED NOT NULL,
  `judul_desain_industri` text COLLATE utf8_unicode_ci NOT NULL,
  `hak_prioritas` tinyint(1) NOT NULL,
  `negara` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_penerimaan_permohonan_pertama_kali` date DEFAULT NULL,
  `nomor_prioritas` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kelas_desain_industri` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lampiran_surat_kuasa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lampiran_surat_pernyataan_pengalihan_hak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lampiran_bukti_pemilikan_hak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lampiran_bukti_prioritas_dan_terjemahan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lampiran_dokumen_desain_industri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uraian_desain_industri` text COLLATE utf8_unicode_ci,
  `contoh_fisik` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desain_industri`
--

INSERT INTO `desain_industri` (`id`, `tanggal_permohonan`, `tanggal_penerimaan`, `nomor_permohonan`, `biodata_id`, `konsultan_hki`, `konsultan_hki_id`, `judul_desain_industri`, `hak_prioritas`, `negara`, `tanggal_penerimaan_permohonan_pertama_kali`, `nomor_prioritas`, `kelas_desain_industri`, `lampiran_surat_kuasa`, `lampiran_surat_pernyataan_pengalihan_hak`, `lampiran_bukti_pemilikan_hak`, `lampiran_bukti_prioritas_dan_terjemahan`, `lampiran_dokumen_desain_industri`, `uraian_desain_industri`, `contoh_fisik`, `created_at`, `updated_at`) VALUES
(2, '2016-11-25', '2016-11-25', '', 1, 0, 1, 'Desain Industri', 0, NULL, NULL, NULL, 'Batik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-25 02:14:48', '2016-11-25 02:14:48'),
(3, '2016-11-26', '2016-11-26', '', 1, 0, 1, 'Go Cook Your Self', 0, NULL, NULL, NULL, 'Software', 'Surat_Kuasa_1_2016112611290539.pdf', 'Surat_Pernyataan_Pengalihan_Hak_1_2016112611290597.pdf', NULL, 'Bukti_Prioritas_dan_Terjemahan1_2016112611290519.pdf', 'Dokumen_Desain_Industri1_2016112611290537.pdf', 'Gambar_Desain_Industri1_2016112611290586.pdf', 'Contoh_Fisik1_201611261129058.png', '2016-11-26 04:29:05', '2016-11-26 04:29:05'),
(4, '2016-11-26', '2016-11-26', '', 1, 0, 1, 'Go Cook Your Self', 1, 'Indonesia', '2016-12-09', '0001', 'Software', 'Surat_Kuasa_1_2016112614283142.pdf', 'Surat_Pernyataan_Pengalihan_Hak_1_2016112614283177.pdf', 'Bukti_Pemilikan_Hak1_2016112614283123.pdf', 'Bukti_Prioritas_dan_Terjemahan1_2016112614283125.pdf', 'Dokumen_Desain_Industri1_2016112614283113.pdf', 'Uraian_Desain_Industri1_2016112614283182.pdf', 'Contoh_Fisik1_2016112614283199.png', '2016-11-26 07:28:31', '2016-11-26 07:28:31'),
(5, '2016-11-26', '2016-11-26', '', 1, 0, 1, 'Go Cook Your Self', 1, 'Indonesia', '2016-12-09', '0001', 'Software', 'Surat_Kuasa_1_2016112614291126.pdf', 'Surat_Pernyataan_Pengalihan_Hak_1_2016112614291149.pdf', 'Bukti_Pemilikan_Hak1_2016112614291153.pdf', 'Bukti_Prioritas_dan_Terjemahan1_2016112614291172.pdf', 'Dokumen_Desain_Industri1_2016112614291113.pdf', 'Uraian_Desain_Industri1_201611261429116.pdf', 'Contoh_Fisik1_2016112614291179.png', '2016-11-26 07:29:11', '2016-11-26 07:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `desain_industri_dokumen_lain`
--

CREATE TABLE `desain_industri_dokumen_lain` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_dokumen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desain_industri_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `desain_industri_gambar_foto`
--

CREATE TABLE `desain_industri_gambar_foto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_gambar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desain_industri_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desain_industri_gambar_foto`
--

INSERT INTO `desain_industri_gambar_foto` (`id`, `nama_gambar`, `file_gambar`, `desain_industri_id`, `created_at`, `updated_at`) VALUES
(1, 'Gambar_Desain_Industri1_2016112614291275.png', 'Gambar_Desain_Industri1_2016112614291275.png', 5, '2016-11-26 07:29:12', '2016-11-26 07:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `desain_industri_pendesain`
--

CREATE TABLE `desain_industri_pendesain` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `desain_industri_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desain_industri_pendesain`
--

INSERT INTO `desain_industri_pendesain` (`id`, `nama`, `kewarganegaraan`, `desain_industri_id`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Izzuddin, M. Cs.,', 'Indonesia', 5, '2016-11-26 07:29:11', '2016-11-26 07:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `konsultan_hki`
--

CREATE TABLE `konsultan_hki` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_konsultan_hki` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `nama_badan_hukum` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_badan_hukum` text COLLATE utf8_unicode_ci NOT NULL,
  `nomor_badan_hukum` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telepon_fax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `konsultan_hki`
--

INSERT INTO `konsultan_hki` (`id`, `nama_konsultan_hki`, `alamat`, `nama_badan_hukum`, `alamat_badan_hukum`, `nomor_badan_hukum`, `email`, `telepon_fax`, `created_at`, `updated_at`) VALUES
(1, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2016_11_15_090115_create_table_biodata', 1),
(12, '2016_11_15_090145_create_tabe_konsultan_hki', 1),
(13, '2016_11_15_090227_create_table_desain_industri', 1),
(14, '2016_11_15_090302_create_table_desain_industri_pendesain', 1),
(15, '2016_11_15_090346_create_table_desain_industri_dokumen_lain', 1),
(16, '2016_11_15_090502_create_table_desain_industri_gambar_foto', 1),
(17, '2016_11_26_143239_create_table_paten', 2),
(18, '2016_11_26_143317_create_table_paten_inventor', 2),
(19, '2016_11_26_143405_create_table_paten_hak_prioritas', 2),
(20, '2016_11_26_143435_create_table_paten_dokumen_lain', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paten`
--

CREATE TABLE `paten` (
  `id` int(10) UNSIGNED NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `paten_sederhana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permohonan_paten_nomor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `konsultan_hki` tinyint(1) NOT NULL,
  `judul_invensi` text COLLATE utf8_unicode_ci NOT NULL,
  `paten_pecahan_nomor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hak_prioritas` tinyint(1) NOT NULL,
  `surat_kuasa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surat_pengalihan_hak_atas_penemuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bukti_pemilikan_hak_atas_penemuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bukti_penunjukan_negara_tujuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dokumen_prioritas_terjemahan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dokumen_permohonan_paten_internasional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sertifikat_penyimpanan_jasad_renik_terjemahan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uraian_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `klaim_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstrak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paten`
--

INSERT INTO `paten` (`id`, `biodata_id`, `tanggal_permohonan`, `paten_sederhana`, `permohonan_paten_nomor`, `konsultan_hki`, `judul_invensi`, `paten_pecahan_nomor`, `hak_prioritas`, `surat_kuasa`, `surat_pengalihan_hak_atas_penemuan`, `bukti_pemilikan_hak_atas_penemuan`, `bukti_penunjukan_negara_tujuan`, `dokumen_prioritas_terjemahan`, `dokumen_permohonan_paten_internasional`, `sertifikat_penyimpanan_jasad_renik_terjemahan`, `uraian_file`, `klaim_file`, `abstrak`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-11-26', 'Paten Sederhana', '', 1, 'SmartCity', NULL, 0, 'Surat_Kuasa1_2016112616434163.pdf', 'Surat_Pengalihan_Hak_Atas_Penemuan1_2016112616434168.pdf', 'Bukti_Pemilikan_Hak_Atas_Penemuan1_2016112616434115.pdf', 'Bukti_Penunjukan_Negara_Tujuan1_2016112616434159.pdf', 'Dokumen_Prioritas_Terjemahan1_2016112616434170.pdf', 'Dokumen_Permohonan_Paten_Internasional1_2016112616434175.pdf', 'Sertifikat_Penyimpanan_Jasad_Renik_Terjemahan1_2016112616434147.pdf', 'Uraian_File1_2016112616434138.pdf', 'KlaimF_ile1_2016112616434181.pdf', NULL, NULL, '2016-11-26 09:43:41', '2016-11-26 09:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `paten_dokumen_lain`
--

CREATE TABLE `paten_dokumen_lain` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_dokumen_lain` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_dokumen_lain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paten_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paten_dokumen_lain`
--

INSERT INTO `paten_dokumen_lain` (`id`, `nama_dokumen_lain`, `file_dokumen_lain`, `paten_id`, `created_at`, `updated_at`) VALUES
(1, 'Dokumen_Lain1_2016112616434276.pdf', 'Dokumen_Lain1_2016112616434276.pdf', 1, '2016-11-26 09:43:42', '2016-11-26 09:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `paten_hak_prioritas`
--

CREATE TABLE `paten_hak_prioritas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_penerimaan_permohonan` date NOT NULL,
  `nomor_prioritas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paten_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paten_inventor`
--

CREATE TABLE `paten_inventor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paten_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paten_inventor`
--

INSERT INTO `paten_inventor` (`id`, `nama`, `kewarganegaraan`, `paten_id`, `created_at`, `updated_at`) VALUES
(1, 'Bintang Muhammad', 'Indonesia', 1, '2016-11-26 09:43:41', '2016-11-26 09:43:41'),
(2, 'Heru Setiawan', 'Indonesia', 1, '2016-11-26 09:43:41', '2016-11-26 09:43:41'),
(3, 'Anjasmoro Adi Nugroho', 'Indonesia', 1, '2016-11-26 09:43:41', '2016-11-26 09:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desain_industri`
--
ALTER TABLE `desain_industri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desain_industri_biodata_id_foreign` (`biodata_id`),
  ADD KEY `desain_industri_konsultan_hki_id_foreign` (`konsultan_hki_id`);

--
-- Indexes for table `desain_industri_dokumen_lain`
--
ALTER TABLE `desain_industri_dokumen_lain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desain_industri_dokumen_lain_desain_industri_id_foreign` (`desain_industri_id`);

--
-- Indexes for table `desain_industri_gambar_foto`
--
ALTER TABLE `desain_industri_gambar_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desain_industri_gambar_foto_desain_industri_id_foreign` (`desain_industri_id`);

--
-- Indexes for table `desain_industri_pendesain`
--
ALTER TABLE `desain_industri_pendesain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desain_industri_pendesain_desain_industri_id_foreign` (`desain_industri_id`);

--
-- Indexes for table `konsultan_hki`
--
ALTER TABLE `konsultan_hki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `paten`
--
ALTER TABLE `paten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paten_dokumen_lain`
--
ALTER TABLE `paten_dokumen_lain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paten_dokumen_lain_paten_id_foreign` (`paten_id`);

--
-- Indexes for table `paten_hak_prioritas`
--
ALTER TABLE `paten_hak_prioritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paten_hak_prioritas_paten_id_foreign` (`paten_id`);

--
-- Indexes for table `paten_inventor`
--
ALTER TABLE `paten_inventor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paten_inventor_paten_id_foreign` (`paten_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `desain_industri`
--
ALTER TABLE `desain_industri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `desain_industri_dokumen_lain`
--
ALTER TABLE `desain_industri_dokumen_lain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desain_industri_gambar_foto`
--
ALTER TABLE `desain_industri_gambar_foto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `desain_industri_pendesain`
--
ALTER TABLE `desain_industri_pendesain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `konsultan_hki`
--
ALTER TABLE `konsultan_hki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `paten`
--
ALTER TABLE `paten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paten_dokumen_lain`
--
ALTER TABLE `paten_dokumen_lain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paten_hak_prioritas`
--
ALTER TABLE `paten_hak_prioritas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paten_inventor`
--
ALTER TABLE `paten_inventor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desain_industri`
--
ALTER TABLE `desain_industri`
  ADD CONSTRAINT `desain_industri_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `desain_industri_konsultan_hki_id_foreign` FOREIGN KEY (`konsultan_hki_id`) REFERENCES `konsultan_hki` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desain_industri_dokumen_lain`
--
ALTER TABLE `desain_industri_dokumen_lain`
  ADD CONSTRAINT `desain_industri_dokumen_lain_desain_industri_id_foreign` FOREIGN KEY (`desain_industri_id`) REFERENCES `desain_industri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desain_industri_gambar_foto`
--
ALTER TABLE `desain_industri_gambar_foto`
  ADD CONSTRAINT `desain_industri_gambar_foto_desain_industri_id_foreign` FOREIGN KEY (`desain_industri_id`) REFERENCES `desain_industri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desain_industri_pendesain`
--
ALTER TABLE `desain_industri_pendesain`
  ADD CONSTRAINT `desain_industri_pendesain_desain_industri_id_foreign` FOREIGN KEY (`desain_industri_id`) REFERENCES `desain_industri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paten_dokumen_lain`
--
ALTER TABLE `paten_dokumen_lain`
  ADD CONSTRAINT `paten_dokumen_lain_paten_id_foreign` FOREIGN KEY (`paten_id`) REFERENCES `paten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paten_hak_prioritas`
--
ALTER TABLE `paten_hak_prioritas`
  ADD CONSTRAINT `paten_hak_prioritas_paten_id_foreign` FOREIGN KEY (`paten_id`) REFERENCES `paten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paten_inventor`
--
ALTER TABLE `paten_inventor`
  ADD CONSTRAINT `paten_inventor_paten_id_foreign` FOREIGN KEY (`paten_id`) REFERENCES `paten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
