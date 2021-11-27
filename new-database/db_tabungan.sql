-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2021 at 08:21 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(97, 1),
(98, 2),
(99, 3),
(100, 30),
(106, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_siswa`
--

CREATE TABLE `tb_kelas_siswa` (
  `id_ksiswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas_siswa`
--

INSERT INTO `tb_kelas_siswa` (`id_ksiswa`, `nis`, `id_tahun`, `id_ruang`, `keterangan`, `created_at`) VALUES
(1, 1212, 3, 62, 'Naik Kelas', '2021-11-25 22:57:06'),
(4, 1212, 1, 56, 'Pendaftaran Baru', '2021-11-26 05:26:18'),
(5, 1234, 3, 56, 'Pendaftaran Baru', '2021-11-26 06:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(1) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `name`, `description`) VALUES
(1, 'Adminstrator', 'Hak Akses Adminstrator'),
(2, 'Operator', 'Hak Akses Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(1) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `ruang` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `id_kelas`, `ruang`) VALUES
(56, 97, 'A'),
(57, 97, 'B'),
(58, 97, 'C'),
(62, 98, 'A'),
(63, 98, 'B'),
(64, 98, 'C'),
(69, 99, 'A'),
(72, 99, 'B'),
(73, 100, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(4) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` int(10) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `nama_ortu` varchar(64) NOT NULL,
  `kontak_orangtua` varchar(13) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_ortu`, `kontak_orangtua`, `is_active`, `created_at`) VALUES
(0, 'Danes', 'L', 'Ambon', 947782800, 'Jakarta', 'Bambang', '081234521234', 1, 1636119256),
(1212, 'Wiro', 'L', '2iwiwi', 1613062800, 'WW', 'AAA', '012123', 1, 1590504640),
(1234, 'Evandra Kusumawijaya', 'L', 'Banyumas', 1089738000, 'Karangklesem', 'Sukarno', '081244445555', 1, 1635078532),
(1235, 'Farel Dinata', 'L', 'Banyumas', 1121706000, 'Teluk', 'Wardhana', '182199988898', 1, 1635078610),
(4545, 'Nikol', 'P', 'Banyumas', 791658000, 'Jalan Masjid Purwokerto', 'Jatmiko', '085675342145', 1, 1637897138),
(5254, 'Ammarazka Dita Airlangga', 'L', 'Purwokerto', 1218412800, 'Purwokerto', 'Adi Putranto K', '085821232121', 1, 1590502162),
(5255, 'Anjaska Fairuz Athallah', 'L', 'Banyumas', 1233507600, 'Banyumas', 'Januar Dwi Ekosasi', '085722123212', 1, 1590503029),
(5257, 'Aqila Nada Dien', 'L', 'Banyumas', 1224262800, 'Banyumas', 'Sugeng Budiono', '085822127212', 1, 1590503373),
(5258, 'Ashwin Bhagaskara Yusharma', 'L', 'Purwokerto', 1233507600, 'Purwokerto', 'Asih Yuswantopo', '085212312121', 1, 1590504094),
(5259, 'Atha Novinzana Hafeedin', 'P', 'Perempuan', 1223658000, 'Purwokerto', 'Kristadi', '085877721321', 1, 1590499898),
(5265, 'deni', 'L', 'banyumas', 1591894800, 'purwokerto', 'heri', '085291044498', 1, 1636084937),
(5282, 'Anggara Bintang Pradana', 'L', 'Purbalingga', 1248998400, 'Purbalingga', 'Anas Saeful B', '085721232121', 1, 1590502434),
(5286, 'Athir Rayya Nadhifa', 'P', 'Banyumas', 1214067600, 'Banyumas', 'Nurkhana', '085821212121', 1, 1590505306),
(5287, 'Aulia Kanaya Pangesti', 'P', 'Jogjakarta', 1225299600, 'Purwokerto', 'Triyono', '085112121122', 1, 1590500100),
(5291, 'Chira Nur Athifa', 'P', 'Purwokerto', 1227718800, 'Purwokerto', 'Nur Imanullah', '08772221242', 1, 1590500212),
(5329, 'Galih Satria Mahardika', 'L', 'Purwokerto', 1220202000, 'Purwokerto', 'Teguh Santoso', '085761212112', 1, 1590500904),
(5349, 'Athaya Zevania Mutiarani', 'L', 'Purwokerto', 1232384400, 'Banyumas', 'Mugiharto', '085721212121', 1, 1590505151),
(5384, 'Ade Dharma Putra', 'L', 'Purwokerto', 1218387600, 'Purwokerto', 'Bagas Waskito', '085877777777', 1, 1590499494),
(5385, 'Aflahul Hendyana Burhan', 'L', 'Banyumas', 1245283200, 'Banyumas', 'Tmbras Burhani', '085772122121', 1, 1590501814),
(5386, 'Aiman Ash-Shidqi', 'L', 'Gombong', 1197824400, 'Gombong', 'Dwi Nur Handoyo', '08577777777', 1, 1590499676),
(5393, 'Davina Azalia Rachmi', 'P', 'Banyumas', 1211648400, 'Banyumas', 'Lukman Rosidi', '085222123423', 1, 1590500409),
(5394, 'Desta Shafa Mawanda', 'P', 'Bengkulu', 1207933200, 'Banyumas', 'Delimawan Prabowo', '085777221121', 1, 1590500655),
(5397, 'Farrel Asykar Ramadhan', 'L', 'Banyumas', 1221152400, 'Banyumas', 'Teguh Santoso', '085772124422', 1, 1590500725),
(5917, 'Almira Pavita Sumarah', 'P', 'Jakarta', 1260576000, 'Purwokerto', 'Sumarah', '086877772123', 1, 1590499785);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `nis` int(4) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  `nip` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`nis`, `saldo`, `nip`) VALUES
(0, 0, NULL),
(1212, 1313000, NULL),
(1234, 510000, NULL),
(1235, 20000, '1123123123'),
(5254, 311000, NULL),
(5257, 0, NULL),
(5259, 12000, '10307280288'),
(5265, 100000, NULL),
(5397, 15000, '10307280288'),
(5917, 1000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(9) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `tahun`, `is_active`) VALUES
(1, '2020/2021', 0),
(3, '2021/2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nis` int(4) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `kredit_debet` enum('kredit','debet') NOT NULL,
  `nominal` float DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `nip` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nis`, `tanggal`, `kredit_debet`, `nominal`, `saldo`, `nip`) VALUES
(1, 1212, '1590506713', 'kredit', 1000, 1000, '10307280281'),
(2, 1212, '1590507156', 'kredit', 2000, 3000, NULL),
(3, 1212, '1590507334', 'debet', 1000, 2000, '10307280281'),
(4, 1212, '1590507347', 'kredit', 2000, 4000, NULL),
(5, 5254, '1590507806', 'kredit', 10000, 10000, NULL),
(6, 5254, '1590507816', 'kredit', 1000, 11000, NULL),
(7, 5259, '1590511450', 'kredit', 10000, 10000, '10307280288'),
(8, 5259, '1590512650', 'kredit', 1000, 11000, '10307280288'),
(9, 5259, '1590512672', 'kredit', 2000, 13000, '10307280288'),
(10, 5259, '1590513500', 'kredit', 1000, 14000, NULL),
(11, 1212, '1590513509', 'debet', 1000, 3000, '10307280281'),
(12, 5917, '1590513597', 'kredit', 10000, 10000, '10307280288'),
(13, 5259, '1590513606', 'debet', 1000, 13000, '10307280288'),
(14, 5917, '1590513614', 'debet', 9000, 1000, '10307280288'),
(15, 5259, '1590513643', 'debet', 9000, 4000, '10307280288'),
(16, 5259, '1590514625', 'kredit', 4000, 8000, '10307280288'),
(17, 1212, '1590516243', 'kredit', 0, 3000, NULL),
(18, 1212, '1590516245', 'kredit', 0, 3000, NULL),
(19, 1212, '1590516245', 'kredit', 0, 3000, NULL),
(20, 1212, '1590516247', 'kredit', 0, 3000, NULL),
(21, 1212, '1590516247', 'kredit', 0, 3000, NULL),
(22, 1212, '1590516247', 'kredit', 0, 3000, NULL),
(23, 1212, '1590516247', 'kredit', 0, 3000, NULL),
(24, 1212, '1590516259', 'kredit', 10000, 13000, NULL),
(25, 5259, '1606242978', 'debet', 0, 8000, '10307280288'),
(26, 5254, '1606242994', 'debet', 0, 11000, '10307280281'),
(27, 1212, '1606628823', 'kredit', 0, 13000, NULL),
(28, 1212, '1606628824', 'kredit', 0, 13000, NULL),
(29, 5259, '1606638093', 'kredit', 2000, 10000, '10307280288'),
(30, 5259, '1606638204', 'kredit', 3000, 13000, '10307280288'),
(31, 5397, '1606638256', 'kredit', 1000, 1000, '10307280288'),
(32, 5397, '1606638267', 'kredit', 9000, 10000, '10307280288'),
(33, 5397, '1606638278', 'kredit', 5000, 15000, '10307280288'),
(34, 5397, '1606638475', 'debet', 5000, 10000, '10307280288'),
(35, 1212, '1606647536', 'kredit', 0, 13000, NULL),
(36, 5917, '1606647659', 'kredit', 0, 1000, NULL),
(37, 5259, '1606647800', 'kredit', 0, 13000, NULL),
(38, 5397, '1606647825', 'kredit', 0, 10000, NULL),
(39, 1212, '1606647891', 'kredit', 0, 13000, NULL),
(40, 5259, '1606647934', 'kredit', 0, 13000, NULL),
(41, 5259, '1606648045', 'kredit', 0, 13000, NULL),
(42, 1212, '1606649302', 'kredit', 0, 13000, NULL),
(43, 5259, '1606649793', 'debet', 0, 13000, '10307280288'),
(44, 5259, '1606650576', 'debet', 1000, 12000, '10307280288'),
(45, 5259, '1606652326', 'kredit', 0, 12000, '10307280288'),
(46, 5397, '1606652338', 'kredit', 0, 10000, '10307280288'),
(47, 5397, '1606652512', 'kredit', 10000, 20000, '10307280288'),
(48, 5397, '1606652527', 'debet', 5000, 15000, '10307280288'),
(49, 1234, '1635078556', 'kredit', 10000, 10000, '1123123123'),
(50, 1235, '1635078633', 'kredit', 20000, 20000, '1123123123'),
(51, 1234, '1636021039', 'kredit', 100000, 110000, '1123123123'),
(52, 5265, '1636085587', 'kredit', 100000, 100000, NULL),
(53, 1212, '1636119338', 'kredit', 500000, 513000, NULL),
(54, 1212, '1637846010', 'debet', 200000, 313000, '10307280281'),
(55, 1212, '1637846074', 'kredit', 200000, 513000, NULL),
(56, 1212, '1637846278', 'kredit', 200000, 713000, NULL),
(57, 5254, '1637852589', 'kredit', 200000, 211000, NULL),
(58, 5254, '1637852761', 'kredit', 100000, 311000, NULL),
(59, 1212, '1637898561', 'kredit', 200000, 913000, NULL),
(60, 1212, '1637905154', 'kredit', 100000, 1013000, NULL),
(61, 1212, '1637905250', 'debet', 200000, 813000, '10307280288'),
(62, 1212, '1637908031', 'kredit', 200000, 1013000, '10307280288'),
(63, 1212, '1637908336', 'kredit', 200000, 1213000, '10307280288'),
(64, 1234, '1637908363', 'kredit', 200000, 310000, '10307280288'),
(65, 1234, '1637908705', 'kredit', 200000, 510000, NULL),
(66, 1212, '1637908741', 'kredit', 100000, 1313000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `nip` varchar(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `id_ruang` int(1) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `last_login` varchar(255) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `role`, `nip`, `name`, `id_ruang`, `email`, `password`, `is_active`, `last_login`, `created_at`) VALUES
(1, 1, '', 'Admin', 0, 'admin@gmail.com', '$2y$10$2u.y6pYuLqBmxFhbIYonwe.7ZCtPzdekJmtgVP.bQCpjIvOLMihDm', 1, NULL, '1590491992'),
(30, 2, '10307280288', 'Novita Candrawati', 56, 'novita@gmail.com', '$2y$10$2u.y6pYuLqBmxFhbIYonwe.7ZCtPzdekJmtgVP.bQCpjIvOLMihDm', 1, NULL, '1590492009'),
(31, 2, '10307280281', 'Fery Kurniawan', 57, 'feri@gmail.com', '$2y$05$QVSf1LjL0SD1p68KYIz2IuCczqL/6FoFi7GLC67Q1IfwwNq55rch6', 1, NULL, '1590496930'),
(32, 2, '10307280282', 'Arini Rosidah', 58, 'arini@gmail.com', '$2y$05$b0sP3t2fLHMuiazrO5di3OX8SRcZh6.VHUhvXRusmI5oognXIFwDS', 1, NULL, '1590496992'),
(34, 1, NULL, 'Adi Purnomo', NULL, 'adipurnomo@gmail.com', '$2y$05$q3UFZVw06AHJJTstZXRnF.UlN2K6ntKKxYef2om9BpxEts4TMfvpG', 1, NULL, '1606627961'),
(35, 2, '1123123123', 'Operator', 62, 'operator@gmail.com', '$2y$05$3MEauscbXM5zTBEM8fXYcOqVQquJZTUT3YrjNN3oXT8GWy6RpWkIK', 1, NULL, '1606631314'),
(37, 1, '', 'Yusup Sugiarto', 0, 'abuparadise17@gmail.com', '$2y$05$zj8uPS.xkpNqUnH3FMZh1uwZesyZA4/ar/WqZlmdeQxPWZQWfyc5q', 1, NULL, '1635071726');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kelas` (`kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_kelas_siswa`
--
ALTER TABLE `tb_kelas_siswa`
  ADD PRIMARY KEY (`id_ksiswa`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nis` (`nis`,`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`,`nip`,`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_kelas_siswa`
--
ALTER TABLE `tb_kelas_siswa`
  MODIFY `id_ksiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD CONSTRAINT `tb_ruang_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD CONSTRAINT `tb_tabungan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tb_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
