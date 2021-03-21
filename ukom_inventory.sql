-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 07:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom_inventory`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_stok` (IN `id_inv` INT, IN `jml_inv` INT)  BEGIN
UPDATE inventaris SET jumlah_inventaris = jml_inv WHERE id_inventaris = id_inv;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cek_jml_pinjaman` (`peminjam_id` INT(11)) RETURNS VARCHAR(191) CHARSET utf8mb4 BEGIN
DECLARE jumlah int;
SELECT COUNT(id_peminjaman) INTO jumlah FROM peminjaman WHERE id_peminjam = peminjam_id;
IF(jumlah > 0) THEN 
RETURN CONCAT("Anda sudah Meminjam sebanyak ", jumlah, " kali");
ELSE 
RETURN "Anda belum pernah melakukan Peminjaman";
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjaman`
--

CREATE TABLE `detail_pinjaman` (
  `id_detail_pinjaman` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pinjaman`
--

INSERT INTO `detail_pinjaman` (`id_detail_pinjaman`, `id_inventaris`, `jumlah_pinjaman`, `id_peminjaman`, `deleted_at`) VALUES
(1, 1, 100, 1, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_pinjaman_view`
-- (See below for the actual view)
--
CREATE TABLE `detail_pinjaman_view` (
`id_detail_pinjaman` int(11)
,`id_inventaris` int(11)
,`jumlah_pinjaman` int(11)
,`id_peminjaman` int(11)
,`tanggal_peminjaman` date
,`tanggal_kembali` date
,`id_peminjam` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `kode_inventaris` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_inventaris` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_inventaris` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_register_inventaris` date NOT NULL,
  `jumlah_inventaris` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `kode_inventaris`, `nama_inventaris`, `keterangan_inventaris`, `tanggal_register_inventaris`, `jumlah_inventaris`, `id_jenis`, `id_ruang`, `id_user`, `deleted_at`) VALUES
(1, 'INV/1/210322122320/1/1', 'PCB', 'baik', '2021-03-22', 20, 1, 1, 1, '2021-03-21 17:30:28'),
(2, 'INV/2/210322122338/1/1', 'Kipas', 'GOOd', '2021-03-22', 2, 1, 1, 1, '2021-03-21 17:24:24'),
(3, 'INV/3/210322123040/1/1', 'Kipas', 'nice', '2021-03-22', 100, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis` int(11) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
(1, 'Electrical', 1, 'barang electric');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'pengunjung');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `activities` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `id_level`, `activities`, `time`) VALUES
(1, 1, 1, 'melakukan login', '00:23:20');

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
(13, '2021_03_02_171024_create_failed_jobs_table', 1),
(14, '2021_03_02_171024_create_jenis_table', 1),
(15, '2021_03_02_171024_create_password_resets_table', 1),
(16, '2021_03_02_171024_create_petugas_table', 1),
(17, '2021_03_02_171024_create_ruangan_table', 1),
(18, '2021_03_02_171024_create_users_table', 1),
(35, '2021_03_02_171631_create_failed_jobs_table', 2),
(36, '2021_03_02_171631_create_jenis_table', 2),
(37, '2021_03_02_171631_create_level_table', 2),
(38, '2021_03_02_171631_create_password_resets_table', 2),
(39, '2021_03_02_171631_create_petugas_table', 2),
(40, '2021_03_02_171631_create_ruangan_table', 2),
(41, '2021_03_02_171631_create_users_table', 2),
(42, '2021_03_02_171633_add_foreign_keys_to_petugas_table', 2),
(169, '2021_03_02_175019_create_detail_pinjaman_table', 3),
(170, '2021_03_02_175019_create_inventaris_table', 3),
(171, '2021_03_02_175019_create_jenis_table', 3),
(172, '2021_03_02_175019_create_level_table', 3),
(173, '2021_03_02_175019_create_log_table', 3),
(174, '2021_03_02_175019_create_peminjam_table', 3),
(175, '2021_03_02_175019_create_peminjaman_table', 3),
(176, '2021_03_02_175019_create_petugas_table', 3),
(177, '2021_03_02_175019_create_ruangan_table', 3),
(178, '2021_03_02_175021_add_foreign_keys_to_detail_pinjaman_table', 3),
(179, '2021_03_02_175021_add_foreign_keys_to_inventaris_table', 3),
(180, '2021_03_02_175021_add_foreign_keys_to_log_table', 3),
(181, '2021_03_02_175021_add_foreign_keys_to_peminjaman_table', 3),
(182, '2021_03_02_175021_add_foreign_keys_to_petugas_table', 3),
(213, '2021_03_03_020707_create_detail_pinjaman_table', 4),
(214, '2021_03_03_020707_create_inventaris_table', 4),
(215, '2021_03_03_020707_create_jenis_table', 4),
(216, '2021_03_03_020707_create_level_table', 4),
(217, '2021_03_03_020707_create_log_table', 4),
(218, '2021_03_03_020707_create_peminjam_table', 4),
(219, '2021_03_03_020707_create_peminjaman_table', 4),
(220, '2021_03_03_020707_create_pengunjung_table', 4),
(221, '2021_03_03_020707_create_petugas_table', 4),
(222, '2021_03_03_020707_create_ruangan_table', 4),
(223, '2021_03_03_020709_add_foreign_keys_to_detail_pinjaman_table', 4),
(224, '2021_03_03_020709_add_foreign_keys_to_inventaris_table', 4),
(225, '2021_03_03_020709_add_foreign_keys_to_log_table', 4),
(226, '2021_03_03_020709_add_foreign_keys_to_peminjaman_table', 4),
(310, '2021_03_03_021227_create_detail_pinjaman_table', 5),
(311, '2021_03_03_021227_create_inventaris_table', 5),
(312, '2021_03_03_021227_create_jenis_table', 5),
(313, '2021_03_03_021227_create_level_table', 5),
(314, '2021_03_03_021227_create_log_table', 5),
(315, '2021_03_03_021227_create_peminjaman_table', 5),
(316, '2021_03_03_021227_create_pengunjung_table', 5),
(317, '2021_03_03_021227_create_petugas_table', 5),
(318, '2021_03_03_021227_create_ruangan_table', 5),
(319, '2021_03_03_021229_add_foreign_keys_to_detail_pinjaman_table', 5),
(320, '2021_03_03_021229_add_foreign_keys_to_inventaris_table', 5),
(321, '2021_03_03_021229_add_foreign_keys_to_log_table', 5),
(322, '2021_03_03_021229_add_foreign_keys_to_peminjaman_table', 5),
(351, '2021_03_03_022957_create_detail_pinjaman_table', 6),
(352, '2021_03_03_022957_create_inventaris_table', 6),
(353, '2021_03_03_022957_create_jenis_table', 6),
(354, '2021_03_03_022957_create_level_table', 6),
(355, '2021_03_03_022957_create_log_table', 6),
(356, '2021_03_03_022957_create_peminjaman_table', 6),
(357, '2021_03_03_022957_create_pengunjung_table', 6),
(358, '2021_03_03_022957_create_petugas_table', 6),
(359, '2021_03_03_022957_create_ruangan_table', 6),
(360, '2021_03_03_022959_add_foreign_keys_to_detail_pinjaman_table', 6),
(361, '2021_03_03_022959_add_foreign_keys_to_inventaris_table', 6),
(362, '2021_03_03_022959_add_foreign_keys_to_log_table', 6),
(363, '2021_03_03_022959_add_foreign_keys_to_peminjaman_table', 6),
(364, '2021_03_03_022959_add_foreign_keys_to_petugas_table', 6),
(721, '2021_03_04_003156_create_detail_pinjaman_table', 7),
(722, '2021_03_04_003156_create_inventaris_table', 7),
(723, '2021_03_04_003156_create_jenis_table', 7),
(724, '2021_03_04_003156_create_level_table', 7),
(725, '2021_03_04_003156_create_log_table', 7),
(726, '2021_03_04_003156_create_peminjam_table', 7),
(727, '2021_03_04_003156_create_peminjaman_table', 7),
(728, '2021_03_04_003156_create_ruangan_table', 7),
(1104, '2014_10_12_000000_create_users_table', 8),
(1105, '2014_10_12_100000_create_password_resets_table', 8),
(1106, '2019_08_19_000000_create_failed_jobs_table', 8),
(1261, '2021_03_04_104628_create_detail_pinjaman_table', 9),
(1262, '2021_03_04_104628_create_inventaris_table', 9),
(1263, '2021_03_04_104628_create_jenis_table', 9),
(1264, '2021_03_04_104628_create_level_table', 9),
(1265, '2021_03_04_104628_create_log_table', 9),
(1266, '2021_03_04_104628_create_peminjam_table', 9),
(1267, '2021_03_04_104628_create_peminjaman_table', 9),
(1268, '2021_03_04_104628_create_ruangan_table', 9),
(1269, '2021_03_04_104628_create_user_table', 9),
(1270, '2021_03_04_104629_add_foreign_keys_to_detail_pinjaman_table', 9),
(1271, '2021_03_04_104629_add_foreign_keys_to_inventaris_table', 9),
(1272, '2021_03_04_104629_add_foreign_keys_to_log_table', 9),
(1273, '2021_03_04_104629_add_foreign_keys_to_peminjaman_table', 9),
(1274, '2021_03_04_104629_add_foreign_keys_to_user_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(11) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `nip`, `alamat`) VALUES
(1, 'lara', 181910309, 'jl.bebek');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` tinyint(4) NOT NULL,
  `id_peminjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_inventaris`, `jumlah_pinjaman`, `tanggal_peminjaman`, `tanggal_kembali`, `status_peminjaman`, `approval`, `id_peminjam`) VALUES
(1, 1, 20, '2021-03-03', '2021-04-03', 'pending', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruangan` int(11) NOT NULL,
  `keterangan_ruangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kode_ruangan`, `keterangan_ruangan`) VALUES
(1, 'rpl', 1, 'lab rpl 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `password_user`, `nama_user`, `id_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aheng', '$2y$10$lglnvTC1YZddaKz9.unPtOY0KcPhrKUS2CxRaGOMQxE1T5rIU4v.6', 'ahehong', 1, NULL, NULL, NULL),
(2, 'rara', '$2y$10$ICThONLi5M3HLR3XMvRveOAl3ECaRoJn9RbNqzNPk6w1rHql0Y5q2', 'raraja', 2, NULL, NULL, NULL),
(3, 'joe', '$2y$10$.QuvQCCyPWk/gj6xq8436uwG74RcskvLu32DpCB6dIP0BOM89gUiO', 'joce', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `detail_pinjaman_view`
--
DROP TABLE IF EXISTS `detail_pinjaman_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pinjaman_view`  AS  select `detail_pinjaman`.`id_detail_pinjaman` AS `id_detail_pinjaman`,`detail_pinjaman`.`id_inventaris` AS `id_inventaris`,`detail_pinjaman`.`jumlah_pinjaman` AS `jumlah_pinjaman`,`detail_pinjaman`.`id_peminjaman` AS `id_peminjaman`,`peminjaman`.`tanggal_peminjaman` AS `tanggal_peminjaman`,`peminjaman`.`tanggal_kembali` AS `tanggal_kembali`,`peminjaman`.`id_peminjam` AS `id_peminjam` from (`detail_pinjaman` join `peminjaman` on(`detail_pinjaman`.`id_peminjaman` = `peminjaman`.`id_peminjaman`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD PRIMARY KEY (`id_detail_pinjaman`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD UNIQUE KEY `inventaris_kode_inventaris_unique` (`kode_inventaris`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_peminjam` (`id_peminjam`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD UNIQUE KEY `kode_ruangan` (`kode_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_username_user_unique` (`username_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  MODIFY `id_detail_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1275;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD CONSTRAINT `detail_pinjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `detail_pinjaman_ibfk_2` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
