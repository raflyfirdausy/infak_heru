-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2022 at 03:37 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infak_heru`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_identitas`
--

CREATE TABLE `m_identitas` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(255) DEFAULT NULL,
  `pondok` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT 'HERU',
  `prov` varchar(255) DEFAULT NULL,
  `kab` varchar(255) DEFAULT NULL,
  `kec` varchar(255) DEFAULT NULL,
  `kel` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_identitas`
--

INSERT INTO `m_identitas` (`id`, `nama_aplikasi`, `pondok`, `logo`, `copyright`, `prov`, `kab`, `kec`, `kel`, `alamat`, `telp`, `email`, `website`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SiPotek', NULL, 'logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-20 23:35:39', NULL, NULL),
(2, 'SiPotek', NULL, 'logo_20220421161046.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 16:10:46', NULL, NULL),
(3, 'SiPotek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 16:12:55', NULL, NULL),
(4, 'SiPotek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 16:15:55', NULL, NULL),
(5, 'SiPotek', NULL, 'logo_20220421161708.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 16:17:08', NULL, NULL),
(6, 'SiPotek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 16:17:24', NULL, NULL),
(7, 'SiPotek', NULL, 'logo_20220421162032.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 16:20:32', NULL, NULL),
(8, 'SiPotek', NULL, 'logo_20220422132954.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-22 13:29:54', NULL, NULL),
(9, 'SiPotek', NULL, 'logo_20220422133150.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-22 13:31:50', NULL, NULL),
(10, 'SiPotek', NULL, 'logo_20220517005529.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-17 00:55:29', NULL, NULL),
(11, 'Si Infak', NULL, 'infaq.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-19 22:19:47', NULL, NULL),
(12, 'Si Infak', 'Nama Pondok', NULL, 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-07 01:17:54', NULL, NULL),
(13, 'Si Infak', 'Nama Pondok', 'logo_20220607011828.png', 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-07 01:18:29', NULL, NULL),
(14, 'Si Infak', 'Nama Pondok', NULL, 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-07 01:18:53', NULL, NULL),
(15, 'Si Infak', 'Pondok\r\nPesantren Baitul Quran Asy-Syuyuti', 'logo_20220608010737.png', 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-08 01:07:37', NULL, NULL),
(16, 'Si InfakX', 'PondokPesantren Baitul Quran Asy-Syuyuti', NULL, 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-08 21:40:32', NULL, NULL),
(17, 'Si Infak', 'PondokPesantren Baitul Quran Asy-Syuyuti', NULL, 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-08 21:40:38', NULL, NULL),
(18, 'Si Infak', 'PondokPesantren Baitul Quran Asy-Syuyuti', 'logo_20220608214047.png', 'HERU', 'Jawa Tengah', 'Banyumas', 'SOKARAJA', 'Klahang', 'Klahang RT 05/02 , kecamatan sokaraja, kab. Banyumas', '085773232714', 'rafly.firdausy@gmail.com', 'https://rafly.id', '2022-06-08 21:40:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis`
--

CREATE TABLE `m_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `m_jenis`
--

INSERT INTO `m_jenis` (`id`, `nama`, `keterangan`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Contoh Jenis Infak', 'Contoh Keterangan', '1', '2022-06-08 03:17:54', '2022-06-08 03:20:15', NULL),
(5, 'Contoh Lain 2', 'Oke mantap', '1', '2022-06-08 03:18:25', '2022-06-08 03:19:19', '2022-06-08 03:19:19'),
(6, 'Jenis Lainnya', 'Oke mantap', '1', '2022-06-08 03:20:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_rekening`
--

CREATE TABLE `m_rekening` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_bin DEFAULT 'AKTIF' COMMENT 'AKTIF | TIDAK_AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `m_rekening`
--

INSERT INTO `m_rekening` (`id`, `nama_bank`, `atas_nama`, `no_rekening`, `keterangan`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'BRI', 'Rafli Firdausy Irawan', '123123123', 'MANTAP', '1', '2022-06-07 01:31:58', '2022-06-07 01:37:05', NULL, 'AKTIF'),
(2, 'BRI', 'Rafli Firdausy Irawan', '123123123', 'MANTAP', '4', '2022-06-07 01:32:22', '2022-06-08 21:41:06', NULL, 'NON_AKTIF'),
(3, 'BNI', 'Pondok', '1234567890324', 'TestingX', '1', '2022-06-07 01:40:27', '2022-06-07 01:45:54', NULL, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'KEPALA_APOTEK | PETUGAS | DONATUR',
  `nama` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `prov` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kab` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kec` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kel` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `is_verified` varchar(255) COLLATE utf8mb4_bin DEFAULT 'TIDAK',
  `verified_by` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `email`, `password`, `level`, `nama`, `no_hp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `prov`, `kab`, `kec`, `kel`, `kodepos`, `is_verified`, `verified_by`, `verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'heru@gmail.com', '4297f44b13955235245b2497399d7a93', 'KEPALA_PONDOK', 'HeruX', '0857260965150', 'PEREMPUAN', 'BANYUMASX', '1998-07-30', 'KRISTEN', 'JAWA TENGAHX', 'BANYUMASX', 'SOKARAJAX', 'KLAHANGX', '531810', 'YA', '1', '2022-06-05 13:35:12', '2022-06-07 02:33:06', '2022-06-08 01:06:43', NULL),
(2, 'ellax@gmail.com', 'e14678ed4409fd7dec4d9999669f5b51', 'KEPALA_PONDOK', 'RAFLI FIRDAUSY IRAWAN', '99999999', 'LAKI-LAKI', 'BANYUMAS', '2022-06-06', 'ISLAM', 'SOKARAJA', 'Banyumas', NULL, 'KLAHANG', '53181', 'BELUM', '1', '2022-06-07 03:03:27', '2022-06-07 03:03:27', '2022-06-07 04:27:33', NULL),
(3, 'ella@gmail.com', '4297f44b13955235245b2497399d7a93', 'KEPALA_PONDOK', 'RAFLI FIRDAUSY IRAWAN', '88888', 'PEREMPUAN', 'PURBALINGGA', '2022-06-07', 'ISLAM', 'JAWA TENGAH', 'Banyumas', 'Sokaraja', 'KLAHANG', '53181', 'BELUM', '1', '2022-06-07 03:06:53', '2022-06-07 03:06:53', '2022-06-07 04:27:35', NULL),
(4, 'rafly@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'PETUGAS', 'RAFLY', '085726096515', 'LAKI-LAKI', 'BANYUMAS', '2022-06-07', 'ISLAM', 'JAWA TENGAH', 'Banyumas', 'Sokaraja', 'KLAHANG', '53181', 'YA', '1', '2022-06-07 04:34:05', '2022-06-07 04:34:05', '2022-06-07 04:34:26', NULL),
(5, 'raflyx@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'DONATUR', 'RAFLI FIRDAUSY IRAWAN', '085726096515', 'LAKI-LAKI', 'PURBALINGGA', '2022-06-06', 'KRISTEN', 'JAWA TENGAH', 'Banyumas', 'SOKARAJA', 'KLAHANGX', '53181', 'YA', '1', '2022-06-07 04:34:55', '2022-06-07 04:34:55', NULL, NULL),
(6, 'dida@gmail.com', '4297f44b13955235245b2497399d7a93', NULL, 'DIDA', '085726096515', 'PEREMPUAN', 'BANYUMAS', '2022-06-08', 'ISLAM', 'JAWA TENGAH', 'Banyumas', 'Sokaraja', 'KLAHANG', '53181', 'BELUM', NULL, NULL, '2022-06-08 01:26:38', NULL, NULL),
(7, 'mama@gmail.com', '4297f44b13955235245b2497399d7a93', 'DONATUR', 'RAFLI FIRDAUSY IRAWAN', '085726096515', 'PEREMPUAN', 'BANYUMAS', '2022-06-06', 'ISLAM', 'JAWA TENGAH', 'Banyumas', 'Sokaraja', 'KLAHANG', '53181', 'YA', NULL, NULL, '2022-06-08 01:28:36', '2022-06-08 01:42:14', NULL),
(8, 'bapak@gmail.com', '4297f44b13955235245b2497399d7a93', 'DONATUR', 'SITI NURWATI', '085726096515', 'PEREMPUAN', 'PURBALINGGA', '2022-06-06', 'ISLAM', 'JAWA TENGAH', 'Banyumas', 'Sokaraja', 'KLAHANG', '53181', 'YA', NULL, NULL, '2022-06-08 01:31:27', '2022-06-08 01:42:12', NULL),
(9, 'irawan@gmail.com', '4297f44b13955235245b2497399d7a93', 'DONATUR', 'RAFLI FIRDAUSY IRAWAN', '085726096515', 'LAKI-LAKI', 'PURBALINGGA', '2022-06-07', 'ISLAM', 'JAWA TENGAH', 'Banyumas', 'Sokaraja', 'KLAHANG', '53181', 'YA', NULL, NULL, '2022-06-08 01:32:10', '2022-06-08 01:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_infak`
--

CREATE TABLE `tr_infak` (
  `id` int(11) NOT NULL,
  `id_donatur` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_petugas` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `id_jenis` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tgl_mutasi` date NOT NULL,
  `status_verified` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '0' COMMENT 'PENDING| ACC | TOLAK',
  `nominal` float NOT NULL,
  `jenis_mutasi` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'MASUK | KELUAR',
  `keterangan` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'BERISI FILE FOTO',
  `rek_no` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `rek_bank` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `rek_nama` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `catatan_petugas` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tr_infak`
--

INSERT INTO `tr_infak` (`id`, `id_donatur`, `id_petugas`, `id_jenis`, `tgl_mutasi`, `status_verified`, `nominal`, `jenis_mutasi`, `keterangan`, `bukti`, `rek_no`, `rek_bank`, `rek_nama`, `catatan_petugas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7', '', '6', '2022-06-08', 'PENDING', 500000, 'MASUK', 'Contoh keterangan', 'bukti_20220608042529.jpeg', '123123123', 'BRI', 'Rafli Firdausy Irawan', NULL, '2022-06-08 04:25:29', NULL, NULL),
(2, '8', '', '6', '2022-06-08', 'ACC', 500000, 'MASUK', 'Contoh keterangan', 'bukti_20220608123112.png', '123123123', 'BRI', 'Rafli Firdausy Irawan', NULL, '2022-06-08 04:25:59', '2022-06-08 12:31:12', NULL),
(3, '7', '1', '6', '2022-06-08', 'ACC', 500000, 'MASUK', 'Contoh keterangan', 'bukti_20220608042718.jpeg', '123123123', 'BRI', 'Rafli Firdausy Irawan', 'OKE DI TERIMA', '2022-06-08 04:27:18', '2022-06-08 22:33:54', NULL),
(4, '7', '1', '6', '2022-06-07', 'ACC', 5009, 'MASUK', 'MantapXX', 'bukti_20220608123032.jpeg', '1234567890324', 'BNI', 'Pondok', 'Oke di terima', '2022-06-08 04:28:04', '2022-06-08 22:31:14', NULL),
(5, NULL, '1', NULL, '2022-06-08', 'ACC', 100000, 'KELUAR', 'OKE MANTAP', NULL, NULL, NULL, NULL, NULL, '2022-06-08 19:55:27', '2022-06-08 20:02:17', NULL),
(6, NULL, '1', NULL, '2022-06-08', 'ACC', 12345, 'KELUAR', 'MANTAPXX', NULL, NULL, NULL, NULL, NULL, '2022-06-08 20:06:37', '2022-06-08 20:32:11', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtr_infak`
-- (See below for the actual view)
--
CREATE TABLE `vtr_infak` (
`id` int(11)
,`id_donatur` varchar(255)
,`id_petugas` varchar(255)
,`id_jenis` varchar(255)
,`tgl_mutasi` date
,`status_verified` varchar(255)
,`nominal` float
,`jenis_mutasi` varchar(255)
,`keterangan` varchar(255)
,`bukti` varchar(255)
,`rek_no` varchar(255)
,`rek_bank` varchar(255)
,`rek_nama` varchar(255)
,`catatan_petugas` varchar(255)
,`created_at` datetime
,`updated_at` datetime
,`deleted_at` datetime
,`nama_donatur` varchar(255)
,`nama_petugas` varchar(255)
,`nama_jenis` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vtr_infak`
--
DROP TABLE IF EXISTS `vtr_infak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtr_infak`  AS SELECT `tr_infak`.`id` AS `id`, `tr_infak`.`id_donatur` AS `id_donatur`, `tr_infak`.`id_petugas` AS `id_petugas`, `tr_infak`.`id_jenis` AS `id_jenis`, `tr_infak`.`tgl_mutasi` AS `tgl_mutasi`, `tr_infak`.`status_verified` AS `status_verified`, `tr_infak`.`nominal` AS `nominal`, `tr_infak`.`jenis_mutasi` AS `jenis_mutasi`, `tr_infak`.`keterangan` AS `keterangan`, `tr_infak`.`bukti` AS `bukti`, `tr_infak`.`rek_no` AS `rek_no`, `tr_infak`.`rek_bank` AS `rek_bank`, `tr_infak`.`rek_nama` AS `rek_nama`, `tr_infak`.`catatan_petugas` AS `catatan_petugas`, `tr_infak`.`created_at` AS `created_at`, `tr_infak`.`updated_at` AS `updated_at`, `tr_infak`.`deleted_at` AS `deleted_at`, `m_user`.`nama` AS `nama_donatur`, `petugas`.`nama` AS `nama_petugas`, `m_jenis`.`nama` AS `nama_jenis` FROM (((`tr_infak` left join `m_user` on((`m_user`.`id` = `tr_infak`.`id_donatur`))) left join `m_user` `petugas` on((`petugas`.`id` = `tr_infak`.`id_petugas`))) left join `m_jenis` on((`m_jenis`.`id` = `tr_infak`.`id_jenis`))) WHERE isnull(`tr_infak`.`deleted_at`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_identitas`
--
ALTER TABLE `m_identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenis`
--
ALTER TABLE `m_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_rekening`
--
ALTER TABLE `m_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_infak`
--
ALTER TABLE `tr_infak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_identitas`
--
ALTER TABLE `m_identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_jenis`
--
ALTER TABLE `m_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_rekening`
--
ALTER TABLE `m_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tr_infak`
--
ALTER TABLE `tr_infak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
