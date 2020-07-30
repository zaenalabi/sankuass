-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2019 at 02:36 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sankuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `kd_tugas` int(10) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `review` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kd_tugas`, `judul`, `review`) VALUES
(70, 60, 'kalkulus', 'css2-help-sheet.pdf'),
(71, 61, 'kalkulus', 'css3-cheat-sheet.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `detail_makul`
--

CREATE TABLE `detail_makul` (
  `id` int(11) NOT NULL,
  `nim_fkid` varchar(12) NOT NULL,
  `makul_fkid` varchar(11) NOT NULL,
  `dosen_fkid` varchar(11) NOT NULL,
  `kelas_fkid` int(11) NOT NULL,
  `prodi_fkid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(11) NOT NULL,
  `nama depan` varchar(20) NOT NULL,
  `nama belakang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama depan`, `nama belakang`) VALUES
('1234567', 'Agung', 'Prihatmojo'),
('2345678', 'Pambudi', 'Bambang');

-- --------------------------------------------------------

--
-- Table structure for table `jadwaluas`
--

CREATE TABLE `jadwaluas` (
  `kd_jadwal` int(10) NOT NULL,
  `kd_makul` varchar(11) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `kd_prodi` varchar(11) NOT NULL,
  `tgl_keterlambatan` varchar(10) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `ruang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwaluas`
--

INSERT INTO `jadwaluas` (`kd_jadwal`, `kd_makul`, `kelas`, `kd_prodi`, `tgl_keterlambatan`, `waktu`, `ruang`) VALUES
(30, 'FTI001', '', 'FTI', '07/15/2019', '12:00 -  13:00', 'aula al\'ala'),
(31, 'FMI008', '', 'FMI', '07/18/2019', '10:00 - 11:30', 'ruang fastikom lt.2'),
(33, 'FTI010', '', 'FTI', '07/15/2019', '08:30 - 10:00', 'aula al\'ala'),
(47, 'FAR001', '', 'FAR', '1970/01/01', '12:00 -  13:00', 'aula al\'ala'),
(48, 'FAR002', '', 'FTS', '1970/01/01', '12:00 -  13:00', 'aula al\'ala'),
(49, 'FMI001', '', 'FAR', '1970/01/01', '08:30 - 10:00', 'aula al\'ala');

-- --------------------------------------------------------

--
-- Table structure for table `keterlambatan`
--

CREATE TABLE `keterlambatan` (
  `kd_keterlambatan` int(10) NOT NULL,
  `kd_pengawasUas` int(11) DEFAULT NULL,
  `kd_jadwal` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `kd_makul` varchar(20) NOT NULL,
  `tgl_keterlambatan` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterlambatan`
--

INSERT INTO `keterlambatan` (`kd_keterlambatan`, `kd_pengawasUas`, `kd_jadwal`, `user_id`, `kd_makul`, `tgl_keterlambatan`, `keterangan`, `status`) VALUES
(1358, NULL, 30, 2, 'FTI001', '2019-07-22', 'terjebak macet', 1),
(1360, NULL, 30, 20, 'FTI001', '2019-07-23', 'Ketiduran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `thang` varchar(5) DEFAULT NULL,
  `semester` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `user_id`, `nama_depan`, `nama_belakang`, `thang`, `semester`) VALUES
('2015150003', 24, 'ali', 'idrus', '2016', '6'),
('2015150048', 21, 'alan ', 'yudha aditama', '2015', '8'),
('2015150049', 20, 'Muhammad', 'Anggun Suhada', '2015', '8'),
('2015150052', 22, 'Altan', 'Asea', '2015', '1'),
('2015150054', 2, 'zaenal', 'abidin', '2015', '8'),
('29015150002', 23, 'chiko', 'jeriko', '2014', '9');

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE `makul` (
  `kd_makul` varchar(11) NOT NULL,
  `kd_prodi` varchar(11) NOT NULL,
  `nama_makul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makul`
--

INSERT INTO `makul` (`kd_makul`, `kd_prodi`, `nama_makul`) VALUES
('FAR001', 'FAR', 'Teknologi Informasi Arsitektur'),
('FAR002', 'FAR', 'Teknologi Bahan'),
('FAR003', 'FAR', 'Perancangan Rumah Sederhana'),
('FAR004', 'FAR', 'Teknik Komunikasi Arsitektur'),
('FAR005', 'FAR', 'Teknologi Bahan'),
('FAR006', 'FAR', 'Mekanika Teknik'),
('FAR007', 'FAR', 'Arsitektur Islam Nusantara'),
('FAR008', 'FAR', 'Bangunan Konservasi'),
('FAR009', 'FAR', 'Pengantar Permukiman'),
('FAR010', 'FAR', 'Komputer Grafis Terkini'),
('FMI001', 'FMI', 'Kecakapan Antar Personal'),
('FMI002', 'FMI', 'Statistik'),
('FMI003', 'FMI', 'Sistem Operasi'),
('FMI004', 'FMI', 'Perancangan Basis Data'),
('FMI005', 'FMI', 'Aljabar Linear dan Matriks'),
('FMI006', 'FMI', 'Technopreneurship'),
('FMI007', 'FMI', 'Pemrograman Mobile'),
('FMI008', 'FMI', 'E Commerce'),
('FMI009', 'FMI', 'Keamanan Komputer dan Jaringan'),
('FMI010', 'FMI', 'Proyek Pengembangan Aplikasi'),
('FTI001', 'FTI', 'Kalkulus 2'),
('FTI002', 'FTI', 'Matematika Diskrit'),
('FTI003', 'FTI', 'Logika Informatika'),
('FTI004', 'FTI', 'MPPL'),
('FTI005', 'FTI', 'Pengolahan Citra Digital'),
('FTI006', 'FTI', 'IMK'),
('FTI007', 'FTI', 'Pemrograman Web'),
('FTI008', 'FTI', 'Keamanan Komputer'),
('FTI009', 'FTI', 'Jaringan Komputer'),
('FTI010', 'FTI', 'STKI'),
('FTM001', 'FTM', 'Bahasa Inggris Teknik'),
('FTM002', 'FTM', 'Fluida Thermal'),
('FTM003', 'FTM', 'Gambar Teknik dan Mesin'),
('FTM004', 'FTM', 'Mekanika Kekuatan Bahan'),
('FTM005', 'FTM', 'Elemen Mesin'),
('FTM006', 'FTM', 'Pneumatik Hidrolik'),
('FTM007', 'FTM', 'Pengujian Bahan'),
('FTM008', 'FTM', 'Perancangan Teknik'),
('FTM009', 'FTM', 'CAM'),
('FTM010', 'FTM', 'Ekonomi Teknik'),
('FTS001', 'FTS', 'Komputer Teknik Sipil'),
('FTS002', 'FTS', 'Hukum Pembangunan'),
('FTS003', 'FTS', 'Metodologi Penelitian'),
('FTS004', 'FTS', 'Drainase Perkotaan'),
('FTS005', 'FTS', 'Rekayasa Lalu Lintas'),
('FTS006', 'FTS', 'Pelabuhan Laut'),
('FTS007', 'FTS', 'Lapangan Terbang'),
('FTS008', 'FTS', 'Hukum Pembangunan'),
('FTS009', 'FTS', 'Rekayasa Jalan Kereta Api'),
('FTS010', 'FTS', 'Struktur Jembatan');

-- --------------------------------------------------------

--
-- Table structure for table `pengawasuas`
--

CREATE TABLE `pengawasuas` (
  `kd_pengawasUas` varchar(15) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawasuas`
--

INSERT INTO `pengawasuas` (`kd_pengawasUas`, `nama_depan`, `nama_belakang`) VALUES
('W01', 'ahmad', 'nasirudin'),
('W02', 'ANGGI', 'AVANTO'),
('W04', 'SAIFU', 'ROHMAN');

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk`
--

CREATE TABLE `petunjuk` (
  `id` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petunjuk`
--

INSERT INTO `petunjuk` (`id`, `judul`, `konten`) VALUES
(1, 'PETUNJUK', '<p style=\"text-align: left;\"><strong>Ini adalah alur yang dilakukan oleh mahasiswa</strong></p>\r\n<ol>\r\n<li>mahasiswa melakukan login di sistem sankuas</li>\r\n<li>mahasiswa mengisi form keterlambatan di menu keterlambatan</li>\r\n<li>mahasiswa menunggu sebentar , setelah di acc bisa menunjukan bukti acc dan bisa mengikuti ujian bersyarat</li>\r\n<li>mahasiswa mengecek di menu tugas, apakah tugas sudah di berikan atau belum</li>\r\n<li>setelah tugas turun , mahasiswa memenuhi tugas untuk mereview buku dan mengumpulkan buku tersebut ke perpus fastikom</li>\r\n<li>mahasiswa bisa mencetak data tugas yg dikumpulkan untuk bukti telah mengumpulkan</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `nama_prodi`, `keterangan`) VALUES
('FAR', 'Arsitektur', NULL),
('FMI', 'Manajemen Informatika', NULL),
('FTI', 'Teknik Informatika', NULL),
('FTM', 'Teknik Mesin', NULL),
('FTS', 'Teknik Sipil', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `favicon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `metatext` varchar(225) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'SANKUAS', 'member.png', 'admin.png', 'fastikompak@gmail.com', '081906515912', '', 'https://facebook.com/', 'https://instagram.com/', 'sanksi keterlambatan', 'Susanto ganteng banget', 'Susanto ganteng'),
(2, 'SANKUAS', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Administrator adalah'),
(2, 'Mahasiswa', 'Member adalah'),
(3, 'PengawasUas', 'dsafdasf'),
(4, 'PetugasPerpus', 'dsafdasf'),
(5, 'Dosen', 'dsafdasf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_login` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `activation_code` varchar(50) NOT NULL,
  `forgotten_password_code` varchar(50) NOT NULL,
  `forgotten_password_time` datetime NOT NULL,
  `remember_code` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `id_role`, `id_login`, `password`, `first_name`, `last_name`, `email`, `phone`, `photo`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '12345', '$2y$05$WGJb.tDgy7jIhte7sxWGFe4nV/wiBVr7DbSApg2M.W5v1IcoVSWVa', 'admin', 'istrator', 'admin@admin.com', '081906515912', '1526456245974.png', '', '', '2019-06-02 00:00:00', '', '2019-06-25 00:00:00', '2019-07-23 10:23:34', 1),
(2, 2, '2015150054', '$2y$05$I/LMp0RtjGQYzpt.HVVJw.Z1y68BCD871T3jvl6K8wHuQxxsK1pLy', 'Member', 'Andi', 'member@gmail.com', '09876545678', '1526517213176.png', '', '', '2019-06-11 00:00:00', '', '2018-05-16 14:31:53', '2019-07-23 07:00:45', 1),
(19, 4, '', '$2y$05$dpSjCTcEsrisoSCIUl8qluxwrSQb8hNeCCYZ.iRlxC5tJrSk3Zv5.', '', '', 'perpusfast@mail.com', '', '', '', '', '2019-06-19 00:00:00', '', '2019-05-23 20:42:19', '2019-06-10 00:00:00', 1),
(20, 2, '2015150049', '$2y$05$fckOHyelGL72Gdaj5HWM9.n8ubZMHqWRUXeP6jNvFzc8hpkXiev42', 'Muhammad', 'wahyu', 'biss@key.com', '', '', '', '', '2019-06-13 00:00:00', '', '2019-06-18 21:02:26', '2019-07-25 07:26:06', 1),
(21, 2, '2015150048 	', '$2y$05$e37YnB5WyAaZaejNvoGJmuLM/y0TPc2FYSz.U512P5u5DAua2I9b2', 'alan yudha', 'adhitama', 'alan@gmail.com', '', '', '', '', '2019-06-04 00:00:00', '', '2019-06-25 20:25:43', '2019-06-25 21:17:53', 1),
(22, 2, '2015150052', '$2y$05$65o8L9QcWBNGj8IzLx9GmuGYvy8K4rnNGTcw4UDV7n9ItUepfLFBa', 'ahmad', 'ghofir', 'abc@gmail.com', '', '', '', '', '0000-00-00 00:00:00', '', '2019-06-26 13:40:49', '0000-00-00 00:00:00', 1),
(24, 2, '2015150003', '$2y$05$keVJR207DufhbAx15CC3XOO9YdXNraR75UwFOnfd/A2glnJU0ZwsG', '', '', 'alidrus@mail.com', '', '', '', '', '0000-00-00 00:00:00', '', '2019-06-26 22:55:41', '0000-00-00 00:00:00', 1),
(25, 2, '2015150048', '$2y$05$.H87IeKe.QrlaV7TLIEKHOePdI6sjvtQskwGqOQGkQI6DNH2QqB.2', '', '', 'alan@adithama.com', '', '', '', '', '0000-00-00 00:00:00', '', '2019-07-08 07:21:12', '2019-07-23 08:58:17', 1),
(28, 2, '2015150047', '$2y$05$fckOHyelGL72Gdaj5HWM9.n8ubZMHqWRUXeP6jNvFzc8hpkXiev42', 'altan asea', 'habie', 'altan@mail.com', '', '', '', '', '0000-00-00 00:00:00', '', '2019-07-08 07:55:06', '2019-07-23 07:13:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id`, `judul`, `konten`) VALUES
(1, 'Tentang Aplikasi', '<p style=\"text-align: center;\"><strong>Selamat datang di Sistem Sanksi keterlambatan UAS</strong></p>\r\n<p>Ini adalah aplikasi Sistem Sanksi UAS untuk Fakultas Teknik dan Ilmu Komputer dibuat untuk memenuhi tugas kp pada tahun 2018</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, 'qe', 1, '2019-05-07'),
(2, 'ae1cb41299010b3b8246367699aee5', 11, '2019-05-18'),
(3, 'eb32efbea15f105b6c011fa0189bca', 11, '2019-05-18'),
(4, 'c5a6e4050afe03f9c5380dbd4543db', 11, '2019-05-18'),
(5, '8e47736d33aed55952de397055782a', 11, '2019-05-18'),
(6, '5fa8d7d316219be20c821ca0616b02', 11, '2019-05-18'),
(7, '7bf74031842cecf94a80f0cafa3d52', 11, '2019-05-18'),
(8, 'b85188b2ddddd5314e783237d7e6b0', 11, '2019-05-18'),
(9, '751fe7ffbe1ed045ea09e5c7effda0', 11, '2019-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `kd_tugas` int(10) NOT NULL,
  `kd_keterlambatan` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `kd_dosen` int(11) DEFAULT NULL,
  `kd_makul` varchar(20) NOT NULL,
  `tgl_keterlambatan` date DEFAULT NULL,
  `tgl_tugas` date DEFAULT NULL,
  `tema` varchar(100) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`kd_tugas`, `kd_keterlambatan`, `user_id`, `kd_dosen`, `kd_makul`, `tgl_keterlambatan`, `tgl_tugas`, `tema`, `status`) VALUES
(60, 1358, 2, NULL, 'FTI001', '2019-07-22', '2019-07-24', 'cari buku contoh pernerapan kalkulus', 1),
(61, 1360, 20, NULL, 'FTI001', '2019-07-23', '2019-07-25', 'cari buku contoh pernerapan kalkulus', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kd_tugas` (`kd_tugas`),
  ADD UNIQUE KEY `id_buku` (`id_buku`);

--
-- Indexes for table `detail_makul`
--
ALTER TABLE `detail_makul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_fkid` (`kelas_fkid`),
  ADD KEY `prodi_fkid` (`prodi_fkid`),
  ADD KEY `makul_fkid` (`makul_fkid`,`dosen_fkid`,`kelas_fkid`,`prodi_fkid`) USING BTREE,
  ADD KEY `detail_makul_ibfk_1` (`dosen_fkid`),
  ADD KEY `nim_fkid` (`nim_fkid`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwaluas`
--
ALTER TABLE `jadwaluas`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_prodi` (`kd_prodi`),
  ADD KEY `kd_kelas` (`kelas`) USING BTREE,
  ADD KEY `jadwaluas_ibfk_2` (`kd_makul`);

--
-- Indexes for table `keterlambatan`
--
ALTER TABLE `keterlambatan`
  ADD PRIMARY KEY (`kd_keterlambatan`),
  ADD UNIQUE KEY `kd_jadwal` (`kd_jadwal`,`user_id`),
  ADD KEY `kd_pengawasUas` (`kd_pengawasUas`),
  ADD KEY `kd_makul` (`kd_makul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`kd_makul`),
  ADD KEY `makul_ibfk_1` (`kd_prodi`);

--
-- Indexes for table `pengawasuas`
--
ALTER TABLE `pengawasuas`
  ADD PRIMARY KEY (`kd_pengawasUas`);

--
-- Indexes for table `petunjuk`
--
ALTER TABLE `petunjuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id_login` (`id_login`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`kd_tugas`),
  ADD KEY `kd_keterlambatan` (`kd_keterlambatan`),
  ADD KEY `kd_dosen` (`kd_dosen`),
  ADD KEY `kd_makul` (`kd_makul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `detail_makul`
--
ALTER TABLE `detail_makul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwaluas`
--
ALTER TABLE `jadwaluas`
  MODIFY `kd_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `keterlambatan`
--
ALTER TABLE `keterlambatan`
  MODIFY `kd_keterlambatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1361;

--
-- AUTO_INCREMENT for table `petunjuk`
--
ALTER TABLE `petunjuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `kd_tugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_makul`
--
ALTER TABLE `detail_makul`
  ADD CONSTRAINT `detail_makul_ibfk_1` FOREIGN KEY (`dosen_fkid`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION,
  ADD CONSTRAINT `detail_makul_ibfk_2` FOREIGN KEY (`makul_fkid`) REFERENCES `makul` (`kd_makul`) ON DELETE NO ACTION,
  ADD CONSTRAINT `detail_makul_ibfk_3` FOREIGN KEY (`nim_fkid`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `makul`
--
ALTER TABLE `makul`
  ADD CONSTRAINT `makul_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
