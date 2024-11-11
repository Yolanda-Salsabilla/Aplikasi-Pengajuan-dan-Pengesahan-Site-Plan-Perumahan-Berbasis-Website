-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2024 pada 21.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporanakhir_yol`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('yolandasalsabilaa@gmail.com|127.0.0.1', 'i:3;', 1722177308),
('yolandasalsabilaa@gmail.com|127.0.0.1:timer', 'i:1722177308;', 1722177308);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumens`
--

CREATE TABLE `dokumens` (
  `id_dokumens` bigint(20) UNSIGNED NOT NULL,
  `persetujuans_id` bigint(20) UNSIGNED NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumens`
--

INSERT INTO `dokumens` (`id_dokumens`, `persetujuans_id`, `dokumen`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1722174741_akta.pdf', '0', '2024-07-28 13:36:51', '2024-07-28 13:52:21'),
(2, 2, NULL, '0', '2024-07-28 13:37:46', '2024-07-28 13:37:46'),
(3, 3, NULL, '0', '2024-07-28 14:21:35', '2024-07-28 14:21:35'),
(4, 4, NULL, '0', '2024-07-28 14:23:30', '2024-07-28 14:23:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `historys`
--

CREATE TABLE `historys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `historys`
--

INSERT INTO `historys` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'a telah mengirimkan pengajuan dengan nama perumahan = asd', '2024-07-28 13:36:51', '2024-07-28 13:36:51'),
(2, 'a telah mengirimkan pengajuan dengan nama perumahan = asd', '2024-07-28 13:37:46', '2024-07-28 13:37:46'),
(3, 'a telah mengubah pengajuan dengan nama perumahan = asd', '2024-07-28 13:40:18', '2024-07-28 13:40:18'),
(4, 'a telah mengubah pengajuan dengan nama perumahan = asdsadasdasdasdasd', '2024-07-28 13:40:28', '2024-07-28 13:40:28'),
(5, 'a telah mengubah pengajuan dengan nama perumahan = asdsadasdasd', '2024-07-28 13:40:36', '2024-07-28 13:40:36'),
(6, 'a telah mengubah pengajuan dengan nama perumahan = asdfghjkl;', '2024-07-28 13:41:28', '2024-07-28 13:41:28'),
(7, 'a telah mengubah pengajuan dengan nama perumahan = 12345', '2024-07-28 13:41:38', '2024-07-28 13:41:38'),
(8, 'YOLANDA SALSABILLA telah mengirimkan pengajuan dengan nama perumahan = Griya Sarjana Sejahtera', '2024-07-28 14:21:35', '2024-07-28 14:21:35'),
(9, 'YOLANDA SALSABILLA telah mengirimkan pengajuan dengan nama perumahan = Griya Kencana Sejahtera', '2024-07-28 14:23:30', '2024-07-28 14:23:30'),
(10, 'YOLANDA SALSABILLA telah mengubah pengajuan dengan nama perumahan = Griya Sarjana Sejahtera', '2024-07-28 14:37:20', '2024-07-28 14:37:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_29_180244_create_pengajuans_table', 1),
(5, '2024_05_29_180309_create_persetujuans_table', 1),
(6, '2024_05_29_180351_create_pengesahans_table', 1),
(7, '2024_05_29_180430_create_dokumens_table', 1),
(8, '2024_05_29_180452_create_historys_table', 1),
(9, '2024_07_10_104034_tambahttdstaff', 1),
(10, '2024_07_10_212210_namapengembang', 1),
(11, '2024_07_11_025831_changenamapengembang', 1),
(12, '2024_07_11_030045_changenamaperencana', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id_pengajuans` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_perumahan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `permohonan_pengesahan` varchar(255) NOT NULL,
  `sbu` varchar(255) NOT NULL,
  `surat_ktp` varchar(255) NOT NULL,
  `npwp_perusahaan` varchar(255) NOT NULL,
  `akta` varchar(255) NOT NULL,
  `sspt_pbblunas` varchar(255) NOT NULL,
  `sertif` varchar(255) NOT NULL,
  `slujk` varchar(255) NOT NULL,
  `dok_lingkungan` varchar(255) NOT NULL,
  `siup_situ_nib` varchar(255) NOT NULL,
  `info_pupr` varchar(255) NOT NULL,
  `statusadmin` tinyint(1) NOT NULL DEFAULT 0,
  `statusteknis` tinyint(1) NOT NULL DEFAULT 0,
  `rancangan_steplan` varchar(255) NOT NULL,
  `rancangan_potongan` varchar(255) NOT NULL,
  `denah` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `ttd_perencana` varchar(255) NOT NULL,
  `keterangan_admin` varchar(255) DEFAULT NULL,
  `keterangan_teknis` varchar(255) DEFAULT NULL,
  `ket_update_administrasi` tinyint(1) NOT NULL DEFAULT 0,
  `ket_update_teknis` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_perencana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuans`
--

INSERT INTO `pengajuans` (`id_pengajuans`, `users_id`, `nama_perumahan`, `alamat`, `tipe`, `Jumlah`, `latitude`, `longitude`, `tanggal_masuk`, `permohonan_pengesahan`, `sbu`, `surat_ktp`, `npwp_perusahaan`, `akta`, `sspt_pbblunas`, `sertif`, `slujk`, `dok_lingkungan`, `siup_situ_nib`, `info_pupr`, `statusadmin`, `statusteknis`, `rancangan_steplan`, `rancangan_potongan`, `denah`, `lokasi`, `ttd_perencana`, `keterangan_admin`, `keterangan_teknis`, `ket_update_administrasi`, `ket_update_teknis`, `created_at`, `updated_at`, `nama_perencana`) VALUES
(1, 4, 'asdfghjkl;', 'asd', '54 M²', 1231231, -6.21945458, 106.76448094, '2010-12-12', '1722173811_permohonan_pengesahan.pdf', '1722173811_sbu.pdf', '1722173811_surat_ktp.pdf', '1722173811_npwp_perusahaan.pdf', '1722173811_akta.pdf', '1722173811_sspt_pbblunas.pdf', '1722173811_sertif.pdf', '1722173811_slujk.pdf', '1722173811_dok_lingkungan.pdf', '1722173811_siup_situ_nib.pdf', '1722173811_info_pupr.pdf', 1, 1, '1722173811_rancangan_steplan.png', '1722173811_rancangan_potongan.png', '1722173811_denah.png', '1722173811_lokasi.png', '1722173811_ttd_perencana.png', 'asdadsa', 'qawsedfghjkl', 1, 1, '2024-07-28 13:36:51', '2024-07-28 13:50:45', 'asdsss'),
(2, 4, '12345', 'asd', '60 M²', 123123, -6.20750887, 106.78525197, '2001-12-12', '1722173866_permohonan_pengesahan.pdf', '1722173866_sbu.pdf', '1722173866_surat_ktp.pdf', '1722173866_npwp_perusahaan.pdf', '1722173866_akta.pdf', '1722173866_sspt_pbblunas.pdf', '1722173866_sertif.pdf', '1722173866_slujk.pdf', '1722173866_dok_lingkungan.pdf', '1722173866_siup_situ_nib.pdf', '1722173866_info_pupr.pdf', 0, 1, '1722173866_rancangan_steplan.png', '1722173866_rancangan_potongan.png', '1722173866_denah.png', '1722173866_lokasi.png', '1722173866_ttd_perencana.png', 'awsdfghujik', 'qawserfgyjik', 1, 1, '2024-07-28 13:37:46', '2024-07-28 13:51:30', 'assd'),
(3, 5, 'Griya Sarjana Sejahtera', 'ogan ilir', '60 M²', 90, -6.19214970, 106.78799855, '2024-07-29', '1722176495_permohonan_pengesahan.pdf', '1722176495_sbu.pdf', '1722176495_surat_ktp.pdf', '1722176495_npwp_perusahaan.pdf', '1722176495_akta.pdf', '1722176495_sspt_pbblunas.pdf', '1722176495_sertif.pdf', '1722176495_slujk.pdf', '1722176495_dok_lingkungan.pdf', '1722176495_siup_situ_nib.pdf', '1722176495_info_pupr.pdf', 0, 0, '1722176495_rancangan_steplan.png', '1722176495_rancangan_potongan.png', '1722176495_denah.png', '1722176495_lokasi.png', '1722176495_ttd_perencana.png', 'sertifikat akta tanah tidak valid dan kurang lengkap', 'sedang di proses', 1, 0, '2024-07-28 14:21:35', '2024-07-28 14:48:51', 'SOFYAN, S.T., M.T., IAI'),
(4, 5, 'Griya Kencana Sejahtera', 'Kel. Timbangan, Kec. Indralaya Utara, Kab. Ogan Ilir', '60 M²', 100, -6.19744013, 106.80979954, '2024-07-30', '1722176610_permohonan_pengesahan.pdf', '1722176610_sbu.pdf', '1722176610_surat_ktp.pdf', '1722176610_npwp_perusahaan.pdf', '1722176610_akta.pdf', '1722176610_sspt_pbblunas.pdf', '1722176610_sertif.pdf', '1722176610_slujk.pdf', '1722176610_dok_lingkungan.pdf', '1722176610_siup_situ_nib.pdf', '1722176610_info_pupr.pdf', 1, 1, '1722176610_rancangan_steplan.png', '1722176610_rancangan_potongan.png', '1722176610_denah.png', '1722176610_lokasi.png', '1722176610_ttd_perencana.png', NULL, 'Diproses', 0, 0, '2024-07-28 14:23:30', '2024-07-28 14:26:26', 'SOFYAN, S.T., M.T., IAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengesahans`
--

CREATE TABLE `pengesahans` (
  `id_pengesahans` bigint(20) UNSIGNED NOT NULL,
  `persetujuans_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_selesai` date NOT NULL,
  `proses_pengesahan` tinyint(1) NOT NULL DEFAULT 0,
  `dokumen_resmi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengesahans`
--

INSERT INTO `pengesahans` (`id_pengesahans`, `persetujuans_id`, `users_id`, `tgl_selesai`, `proses_pengesahan`, `dokumen_resmi`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2024-07-28', 1, '1722177106_akta.pdf', '2024-07-28 13:36:51', '2024-07-28 14:31:46'),
(2, 2, 4, '2024-07-28', 1, '1722177160_akta.pdf', '2024-07-28 13:37:46', '2024-07-28 14:32:40'),
(3, 3, 5, '2024-07-28', 0, NULL, '2024-07-28 14:21:35', '2024-07-28 14:21:35'),
(4, 4, 5, '2024-07-28', 1, '1722177177_siujk.pdf', '2024-07-28 14:23:30', '2024-07-28 14:32:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persetujuans`
--

CREATE TABLE `persetujuans` (
  `id_persetujuans` bigint(20) UNSIGNED NOT NULL,
  `pengajuans_id` bigint(20) UNSIGNED NOT NULL,
  `ttd_kabid` varchar(255) DEFAULT NULL,
  `ttd_kadin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ttd_staff` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persetujuans`
--

INSERT INTO `persetujuans` (`id_persetujuans`, `pengajuans_id`, `ttd_kabid`, `ttd_kadin`, `created_at`, `updated_at`, `ttd_staff`) VALUES
(1, 1, 'signatures/66a652036cbac.png', 'signatures/66a6523154de6.png', '2024-07-28 13:36:51', '2024-07-28 14:14:09', 'signatures/66a64d19b6dc1.png'),
(2, 2, 'signatures/66a65206d448c.png', 'signatures/66a6523517d28.png', '2024-07-28 13:37:46', '2024-07-28 14:14:13', NULL),
(3, 3, NULL, NULL, '2024-07-28 14:21:35', '2024-07-28 14:21:35', NULL),
(4, 4, NULL, NULL, '2024-07-28 14:23:30', '2024-07-28 14:27:06', 'signatures/66a6553a97e4b.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vmCz6lGRdXhNn3hme6CAR7tIdF3ABydb6VRvsFVg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFVFR2hyd1p4bEtPOFl3NUg2VlhNSWl0TjFweTFpdlBEZExKbkd0YSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1722180341);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `asosiasi` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `ttd_pengembang` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `email_verified_at`, `password`, `nama_perusahaan`, `alamat`, `asosiasi`, `kontak`, `ttd_pengembang`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-07-28 13:35:09', '$2y$12$ygBc3cwP6cdhOPGdIkCreOaYJM3FaXUzT30TUjyp022JIBdHJKSnK', NULL, NULL, NULL, NULL, NULL, 'admin', 'dWM4IwS2e4AHtViYnDRcF3HkVup4tVyAinvqlN7fx7Ieo5KqQazBTs3UWITt', '2024-07-28 13:35:10', '2024-07-28 13:35:10'),
(2, 'kabid', 'kabid@gmail.com', '2024-07-28 13:35:10', '$2y$12$LaLvaM76QVY3FA2TTWBBduR7ykKBPydex1rcsC27go2ojuiIYWAOq', NULL, NULL, NULL, NULL, NULL, 'kabid', '3CkmOHi0X2x0dFijFY4QaccIZIOQ6zPLUCPRhEioLfzupmGNtuew4XuKG7Yz', '2024-07-28 13:35:10', '2024-07-28 13:35:10'),
(3, 'kadin', 'kadin@gmail.com', '2024-07-28 13:35:10', '$2y$12$SwAUfNLQh8zWUZgAKyl8muczH7tFXqJoJ.n2goO9LYHRVVE5/Eyeu', NULL, NULL, NULL, NULL, NULL, 'kadin', '86SOV2oDLv5D0dvc7xS0Zz6JGIV4tML4bHOIT7iEv5XX9Dr67N7Cb53ec0MG', '2024-07-28 13:35:10', '2024-07-28 13:35:10'),
(4, 'a', 'a@gmail.com', NULL, '$2y$12$eWKuSxIBtfGlObRhzX/NyOr8eFQTH5lngqvu6itF104Q1SOCOP/Tm', 'asd', 'asd', 'asd', '12313', 'signatures/66a64ab61152b.png', 'user', NULL, '2024-07-28 13:35:33', '2024-07-28 13:42:14'),
(5, 'YOLANDA SALSABILLA', 'nailalkautsar.propertindo@gmail.com', NULL, '$2y$12$7z36CGo3QAeNRhrudZvbR.M3mbhu/hBv6.oiuINEZ5byUafh8/YHK', 'PT. NAIL AL-KAUTSAR', 'ogan ilir', 'REI', '089502641477', 'signatures/66a6538c7ffe2.png', 'user', NULL, '2024-07-28 14:18:24', '2024-07-28 14:19:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id_dokumens`),
  ADD KEY `dokumens_persetujuans_id_foreign` (`persetujuans_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `historys`
--
ALTER TABLE `historys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id_pengajuans`),
  ADD KEY `pengajuans_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `pengesahans`
--
ALTER TABLE `pengesahans`
  ADD PRIMARY KEY (`id_pengesahans`),
  ADD KEY `pengesahans_persetujuans_id_foreign` (`persetujuans_id`),
  ADD KEY `pengesahans_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `persetujuans`
--
ALTER TABLE `persetujuans`
  ADD PRIMARY KEY (`id_persetujuans`),
  ADD KEY `persetujuans_pengajuans_id_foreign` (`pengajuans_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id_dokumens` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `historys`
--
ALTER TABLE `historys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id_pengajuans` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengesahans`
--
ALTER TABLE `pengesahans`
  MODIFY `id_pengesahans` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `persetujuans`
--
ALTER TABLE `persetujuans`
  MODIFY `id_persetujuans` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD CONSTRAINT `dokumens_persetujuans_id_foreign` FOREIGN KEY (`persetujuans_id`) REFERENCES `persetujuans` (`id_persetujuans`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengesahans`
--
ALTER TABLE `pengesahans`
  ADD CONSTRAINT `pengesahans_persetujuans_id_foreign` FOREIGN KEY (`persetujuans_id`) REFERENCES `persetujuans` (`id_persetujuans`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengesahans_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persetujuans`
--
ALTER TABLE `persetujuans`
  ADD CONSTRAINT `persetujuans_pengajuans_id_foreign` FOREIGN KEY (`pengajuans_id`) REFERENCES `pengajuans` (`id_pengajuans`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
