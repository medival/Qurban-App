-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2021 pada 13.59
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

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
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(97, 1),
(98, 2),
(99, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_siswa`
--

CREATE TABLE `tb_kelas_siswa` (
  `id_ksiswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas_siswa`
--

INSERT INTO `tb_kelas_siswa` (`id_ksiswa`, `nis`, `id_tahun`, `id_ruang`, `keterangan`, `created_at`) VALUES
(17, 4321, 10, 56, 'Siswa Baru', '2021-11-29 12:41:40'),
(18, 4321, 11, 63, 'Naik Kelas', '2021-11-29 12:44:38'),
(19, 1212, 11, 57, 'Siswa Baru', '2021-11-29 12:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `name`, `description`) VALUES
(1, 'Adminstrator', 'Hak Akses Adminstrator'),
(2, 'Operator', 'Hak Akses Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `ruang` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `id_kelas`, `ruang`) VALUES
(56, 97, 'A'),
(57, 97, 'B'),
(58, 97, 'C'),
(62, 98, 'A'),
(63, 98, 'B'),
(64, 98, 'C'),
(69, 99, 'A'),
(72, 99, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `nama_ortu` varchar(64) NOT NULL,
  `kontak_orangtua` varchar(13) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_ortu`, `kontak_orangtua`, `is_active`, `created_at`) VALUES
(1212, 'Wiro', 'L', '2iwiwi', 1613062800, 'WW', 'AAA', '012123', 1, 1590504640),
(1234, 'Evandra Kusumawijaya', 'L', 'Banyumas', 1089738000, 'Karangklesem', 'Sukarno', '081244445555', 1, 1635078532),
(1235, 'Farel Dinata', 'L', 'Banyumas', 1121706000, 'Teluk', 'Wardhana', '182199988898', 1, 1635078610),
(4321, 'Lionel Messi', 'L', 'Purwokerto', 1075680000, 'Purwokerto', 'Lionel', '086565656534', 1, 1638189450),
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
-- Struktur dari tabel `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `nis` int(11) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `nip` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`nis`, `saldo`, `nip`) VALUES
(1212, 300000, '10307280281'),
(4321, 100000, '10307280288');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(9) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `tahun`, `is_active`) VALUES
(10, '2021/2022', 0),
(11, '2022/2023', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `kredit_debet` enum('kredit','debet') NOT NULL,
  `nominal` float DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `nip` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nis`, `tanggal`, `kredit_debet`, `nominal`, `saldo`, `nip`) VALUES
(72, 4321, '1638189732', 'kredit', 200000, 200000, NULL),
(73, 4321, '1638189767', 'debet', 100000, 100000, '10307280288'),
(74, 1212, '1638189941', 'kredit', 500000, 500000, NULL),
(75, 1212, '1638189960', 'debet', 200000, 300000, '10307280281');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nip` varchar(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `last_login` varchar(255) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
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
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kelas` (`kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_kelas_siswa`
--
ALTER TABLE `tb_kelas_siswa`
  ADD PRIMARY KEY (`id_ksiswa`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD UNIQUE KEY `tahun` (`tahun`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nis` (`nis`,`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`,`nip`,`id_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas_siswa`
--
ALTER TABLE `tb_kelas_siswa`
  MODIFY `id_ksiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kelas_siswa`
--
ALTER TABLE `tb_kelas_siswa`
  ADD CONSTRAINT `tb_kelas_siswa_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`),
  ADD CONSTRAINT `tb_kelas_siswa_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id_ruang`),
  ADD CONSTRAINT `tb_kelas_siswa_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD CONSTRAINT `tb_ruang_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD CONSTRAINT `tb_tabungan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tb_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
