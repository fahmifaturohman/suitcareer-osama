-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 08:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pj_suit`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '2014_10_12_000000_create_users_table', 1),
(31, '2014_10_12_100000_create_password_resets_table', 1),
(32, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2022_09_06_075049_create_roleuser', 1),
(35, '2022_09_21_032911_create_profil', 1),
(36, '2022_09_22_105153_create_tbl_request', 1),
(37, '2022_09_29_104447_create_tbl_candidate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `id_users`, `nama_perusahaan`, `alamat`, `email`, `kontak`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 3, 'PT Awan Teknologi Inovasi', 'Lampung', 'fahmi@gmail.com', 'contact@cloudtech.id', 'Perusahaan kami bergerak pada bidang pembuatan aplikasi CRM, ORM dll', 'PT Awan Teknologi Inovasi.png', '2022-12-24 06:27:39', '2022-12-24 06:27:39'),
(2, 5, 'PT Tibo Jaya', 'Bandar Lampung', 'tibo@gmail.com', 'contact@tibo.id', 'peruahaan berkerk dibidang pengembangan aplikasi', 'PT Tibo Jaya.png', '2022-12-25 08:30:21', '2022-12-25 08:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `roleuser`
--

CREATE TABLE `roleuser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE `tbl_candidate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `id_request` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_candidate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_candidate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_candidate` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lamar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`id`, `id_users`, `id_request`, `nama_candidate`, `phone`, `email`, `alamat`, `cv`, `note_candidate`, `status_candidate`, `created_at`, `updated_at`) VALUES
(9, 5, 4, 'Bastian', '087676792982', 'bastian@gmail.com', 'Medan', 'file_cv/18082021143513.pdf', NULL, 'ddd', '2022-12-28 01:27:59', '2023-01-19 07:21:46'),
(10, 5, 4, 'Hendri', '087877658787', 'hendri@gmail.com', 'Jakarta', 'file_cv/B789 PTA LAMPUNG fix.pdf', NULL, 'lamar', '2022-12-28 01:29:13', '2022-12-28 01:29:13'),
(11, 5, 5, 'Fahmi', '087898987676', 'fahmi@gmail.com', 'Bandar Lampung', 'file_cv/SPPD PTA (22-23 des 2021).pdf', NULL, 'lamar', '2022-12-28 01:29:44', '2022-12-28 01:29:44'),
(12, 5, 5, 'Jonatan', '08789292232', 'jonatn@mail.com', 'Bandar Lampung', 'file_cv/rTc6oCb80YE2l8SyzKax2NDdtcT3WEZRGAFvjVEa-6 Seleksi Kompetensi dasar.pdf', NULL, 'ee', '2022-12-28 01:37:44', '2023-01-19 07:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pendukung` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_kebutuhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','proses','sukses') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `id_users`, `nama_perusahaan`, `kebutuhan`, `file_pendukung`, `deskripsi_kebutuhan`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'alfamart', 'programer', 'alfamart.pdf', 'programer java', 'pending', NULL, '2020-09-29 16:36:23', '2022-12-28 03:42:40'),
(2, 1, 'alfamart', 'desain', 'alfamart.pdf', 'desai corel', 'pending', NULL, '2022-09-29 17:08:55', '2022-09-29 17:08:55'),
(3, 3, 'PT Sysware Indonesia', 'Web Programmer', 'PT Sysware Indonesia.pdf', 'dibutuhkan web programmer untuk bekerja ditempat user (onsite)\r\nlulusan minimal d3\r\npengelaman 1 tahun', 'proses', 6, '2022-12-29 12:48:50', '2023-01-01 14:33:27'),
(4, 5, 'PT Tibo Jaya', 'System Engineer', 'PT Tibo Jaya.pdf', 'Dibutuhkan System Engineer Penempatan Jakarta\r\nPersyaratan :\r\nLulusan D3/S1\r\nPria/Wanita\r\nBerpengalaman Minimal 1 Tahun', 'sukses', 6, '2022-12-25 09:45:09', '2022-12-27 03:03:59'),
(5, 5, 'PT Tibo Jaya', 'Web Programmer', 'PT Tibo Jaya.zip', 'Dibutuhkan Web Programmer Internal untuk penempatan kanor pusat di Kemayoran, Jakarata Pusat, Jakarta\r\nPersyaratan :\r\nLulusan D3/S1 Teknik Informatika/Manajemen Informatika\r\nMampu Menguasai, Php Framework (laravel, Codeigniter4, Microframwork), Framework CSS (Bootstrap, Tailwind), Javascript\r\nMempunya Logic yang Bagus\r\nFrash graduete dipersialhakan\r\n\r\nKeunungan :\r\nAsuransi (BPJS)\r\nGaji (7jt)\r\nBonus (Tergantung Project)', 'sukses', 6, '2022-12-25 10:29:09', '2022-12-27 03:08:01'),
(6, 5, 'PT Tibo Jaya', 'Designer', 'PT Tibo Jaya.pdf', 'Minimal Lulusan d3\r\nPengalaman 1 Tahun dibidangnya\r\nMampu menguasai adobe photoshop, corelDraw', 'proses', 6, '2023-01-09 08:47:36', '2023-01-09 10:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level_user` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `level_user`) VALUES
(1, 'alfamart', 'alfamart@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2022-09-29 16:34:59', '2022-09-29 16:34:59', 2),
(2, 'admin', 'admin@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2022-09-29 16:37:51', '2022-09-29 16:37:51', 1),
(3, 'fahmi', 'fahmi@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2022-12-24 06:16:08', '2022-12-24 06:16:08', 2),
(4, 'admin2', 'admi2@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2022-12-24 06:19:01', '2022-12-24 06:19:01', 1),
(5, 'tibo', 'tibo@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2022-12-24 18:14:11', '2022-12-24 18:14:11', 2),
(6, 'elisa', 'elisa@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2022-12-25 07:36:08', '2022-12-25 07:36:08', 1),
(7, 'fikri', 'fikri@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2023-01-09 03:22:16', '2023-01-09 03:22:16', 2),
(8, 'dora', 'dora@gmail.com', '$2y$10$yPg4umRnXirQfgmoVUN0huZ1TFkd1CmoEnM6CX5Ru3x1dZ0ZYQ1cG', NULL, '2023-01-09 04:23:21', '2023-01-09 04:23:21', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cadidate`
-- (See below for the actual view)
--
CREATE TABLE `view_cadidate` (
`id_candidate` bigint(20) unsigned
,`id` bigint(20) unsigned
,`id_users` bigint(20) unsigned
,`id_request` bigint(20) unsigned
,`nama_candidate` varchar(191)
,`phone` varchar(191)
,`email` varchar(191)
,`alamat` varchar(191)
,`cv` varchar(191)
,`note_candidate` text
,`status_candidate` text
,`created_at` timestamp
,`updated_at` timestamp
,`nama_perusahaan` varchar(191)
,`kebutuhan` varchar(191)
,`deskripsi_kebutuhan` text
,`admin_id` int(10)
,`status` enum('pending','proses','sukses')
);

-- --------------------------------------------------------

--
-- Structure for view `view_cadidate`
--
DROP TABLE IF EXISTS `view_cadidate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cadidate`  AS SELECT `a`.`id` AS `id_candidate`, `a`.`id` AS `id`, `a`.`id_users` AS `id_users`, `a`.`id_request` AS `id_request`, `a`.`nama_candidate` AS `nama_candidate`, `a`.`phone` AS `phone`, `a`.`email` AS `email`, `a`.`alamat` AS `alamat`, `a`.`cv` AS `cv`, `a`.`note_candidate` AS `note_candidate`, `a`.`status_candidate` AS `status_candidate`, `a`.`created_at` AS `created_at`, `a`.`updated_at` AS `updated_at`, `b`.`nama_perusahaan` AS `nama_perusahaan`, `b`.`kebutuhan` AS `kebutuhan`, `b`.`deskripsi_kebutuhan` AS `deskripsi_kebutuhan`, `b`.`admin_id` AS `admin_id`, `b`.`status` AS `status` FROM (`tbl_candidate` `a` left join `tbl_request` `b` on(`a`.`id_request` = `b`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_id_users_foreign` (`id_users`);

--
-- Indexes for table `roleuser`
--
ALTER TABLE `roleuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_candidate_id_users_foreign` (`id_users`),
  ADD KEY `tbl_candidate_id_request_foreign` (`id_request`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_request_id_users_foreign` (`id_users`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roleuser`
--
ALTER TABLE `roleuser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD CONSTRAINT `tbl_candidate_id_request_foreign` FOREIGN KEY (`id_request`) REFERENCES `tbl_request` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_candidate_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
