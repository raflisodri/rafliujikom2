-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 09:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Raflichan', 'Bogors', '0899211311', '2023-11-05 23:36:08', '2023-11-05 23:36:08'),
(2, 'indira putri s', 'di hati nya rafli', '08992213412', '2023-11-06 22:48:03', '2023-11-06 22:48:20'),
(3, 'rafli', 'Bandung', '08992213412', '2023-11-06 22:49:21', '2023-11-06 22:49:21'),
(4, 'Mr bean', 'Usa', '0892213331', '2023-11-06 22:49:45', '2023-11-06 22:49:45'),
(5, 'gisela', 'Bandung', '0899213413', '2023-11-06 22:50:21', '2023-11-06 22:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2023_11_06_035033_create_members_table', 1),
(26, '2023_11_06_041127_create_supliers_table', 1),
(27, '2023_11_06_042355_create_sepatus_table', 1),
(28, '2023_11_06_060735_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sepatus`
--

CREATE TABLE `sepatus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_suplier` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sepatus`
--

INSERT INTO `sepatus` (`id`, `id_suplier`, `nama`, `merk`, `jenis`, `stok`, `ukuran`, `warna`, `harga`, `created_at`, `updated_at`) VALUES
(1, '1', 'air Jordan', 'NIke', 'sport', 200, 45, 'biru', '10000000', '2023-11-05 23:35:50', '2023-11-06 22:47:47'),
(2, '5', 'Compas 1', 'Compas', 'Sports', 85, 45, 'putih', '1000000', '2023-11-06 20:48:08', '2023-11-06 22:53:51'),
(3, '2', 'A17', 'Aerostreet', 'Cozy', 10, 40, 'merah', '250000', '2023-11-06 20:49:08', '2023-11-06 22:52:10'),
(4, '5', 'A1990', 'Compas', 'Cozy', 30, 39, 'hijau', '100000', '2023-11-06 20:50:04', '2023-11-06 22:53:20'),
(5, '3', 'p-1990', 'Puma', 'Casual', 15, 45, 'putih', '3500000', '2023-11-06 22:55:33', '2023-11-06 22:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `nama`, `nama_perusahaan`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'rafli', 'Nike', 'Bogors', '0899211311', '2023-11-05 23:35:07', '2023-11-06 20:46:16'),
(2, 'indira', 'Aeorostreet', 'Bandung', '09234541346', '2023-11-06 20:46:29', '2023-11-06 20:46:29'),
(3, 'ella', 'Puma', 'Bandung', '0892213331', '2023-11-06 20:46:45', '2023-11-06 20:46:45'),
(4, 'gisela', 'Compass', 'Tni purn cicukang', '09234541346', '2023-11-06 20:47:04', '2023-11-06 20:47:04'),
(5, 'rahma', 'Compass', 'Tni purn cicukang', '0892213331', '2023-11-06 20:47:24', '2023-11-06 20:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_member` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sepatu` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_user`, `id_member`, `id_sepatu`, `tanggal`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(3, '3', '1', '1', '2023-11-07', 10, 100000000, '2023-11-06 22:47:32', '2023-11-06 22:47:32'),
(4, '3', '2', '2', '2023-11-07', 10, 10000000, '2023-11-06 22:51:25', '2023-11-06 22:51:25'),
(5, '3', '5', '3', '2023-11-07', 25, 6250000, '2023-11-06 22:52:10', '2023-11-06 22:52:10'),
(6, '3', '4', '4', '2023-11-07', 10, 1000000, '2023-11-06 22:53:20', '2023-11-06 22:53:20'),
(7, '3', '3', '2', '2023-11-07', 25, 25000000, '2023-11-06 22:53:51', '2023-11-06 22:53:51'),
(8, '3', '2', '5', '2023-11-07', 5, 17500000, '2023-11-06 22:55:55', '2023-11-06 22:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'rafli', 'rafli780', '$2y$10$4ZnZitxkhREejVxuooDyIudCD17/1ViHsloZfL.qh8vB.Q5U03DH.', 'admin', NULL, '2023-11-06 00:58:43', '2023-11-06 21:37:15'),
(3, 'indira', 'indira', '$2y$10$1YxFeuz5tqwfMUzgOJNjPehmpsDlYl0YigfW4d6r2QGD5Y6162kHS', 'admin', NULL, '2023-11-06 20:44:31', '2023-11-06 20:44:31'),
(4, 'christy', 'christy', '$2y$10$sda/bazmC.o.wop16W/1jeMCO3T0TWA2zzQHXM8vbDy7M1f87iPfO', 'kasir', NULL, '2023-11-06 20:44:47', '2023-11-06 20:44:47'),
(5, 'rahmat', 'rahmat', '$2y$10$nsTeZ60RUJcwTrCilWLDsesEwsr4EUGJunUQfRPrp6NFE8ehRIVgS', 'kasir', NULL, '2023-11-06 20:44:59', '2023-11-06 20:44:59'),
(6, 'aldi', 'aldi', '$2y$10$7bCM/EG3jODDGv2UGrifYegG3U0z2TkYMLkPyqsbJ7Stt1zIREErq', 'admin', NULL, '2023-11-06 20:45:50', '2023-11-06 20:45:50'),
(8, 'aldi', 'aldi12', '$2y$10$9it1ZhXzjSJLo2pOsOyeuOg4DqyHBk27GdPsPYGbNXuWNteNgMS4C', 'admin', NULL, '2023-11-07 01:46:25', '2023-11-07 01:46:25');

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
-- Indexes for table `members`
--
ALTER TABLE `members`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sepatus`
--
ALTER TABLE `sepatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sepatus`
--
ALTER TABLE `sepatus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
