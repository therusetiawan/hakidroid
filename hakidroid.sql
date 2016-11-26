-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2016 at 12:42 AM
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
  `uraian_desian_industri` text COLLATE utf8_unicode_ci NOT NULL,
  `contoh_fisik` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(16, '2016_11_15_090502_create_table_desain_industri_gambar_foto', 1);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desain_industri_dokumen_lain`
--
ALTER TABLE `desain_industri_dokumen_lain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desain_industri_gambar_foto`
--
ALTER TABLE `desain_industri_gambar_foto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desain_industri_pendesain`
--
ALTER TABLE `desain_industri_pendesain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konsultan_hki`
--
ALTER TABLE `konsultan_hki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
