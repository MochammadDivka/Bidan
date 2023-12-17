-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 12:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xm_si`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `loginid` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `addr` varchar(500) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `updated_on` date NOT NULL,
  `last_login` date NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `loginid`, `password`, `fname`, `lname`, `gender`, `dob`, `no_telp`, `addr`, `notes`, `image`, `created_on`, `updated_on`, `last_login`, `delete_status`) VALUES
(1, 'admin', 'divkajr5@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'divka ', 'admin', 'Male', '2018-11-26', '9423979339', '<p>Maharashtra, India</p>\r\n', '<p>admin panel</p>\r\n', 'profile.jpg', '2018-04-30', '2019-10-15', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE `bidan` (
  `id_bidan` int(15) NOT NULL,
  `nama_bidan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `pengalaman` float(11,1) NOT NULL,
  `pembayaran_konsultasi` float(10,2) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidan`
--

INSERT INTO `bidan` (`id_bidan`, `nama_bidan`, `no_telp`, `loginid`, `password`, `status`, `pendidikan`, `pengalaman`, `pembayaran_konsultasi`, `delete_status`) VALUES
(1, 'Wury Astrida', '085232197185', 'wrastrida@gmail.com', 'abcd\r\n', 'Active', 'Sarjana Kebidanan', 8.0, 75.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kehamilan_sekarang`
--

CREATE TABLE `kehamilan_sekarang` (
  `id_kehamilan_sekarang` int(150) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `G` varchar(100) NOT NULL,
  `P` varchar(100) NOT NULL,
  `HPHT` varchar(255) NOT NULL,
  `HPL` varchar(255) NOT NULL,
  `muntah` varchar(255) NOT NULL,
  `pusing` varchar(255) NOT NULL,
  `nyeriperut` varchar(255) NOT NULL,
  `nafsu_makan` varchar(255) NOT NULL,
  `pendarahan` varchar(255) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `riwayatpenyakit_keluarga` varchar(255) NOT NULL,
  `kebiasaan` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `pasangansex_istri` varchar(255) NOT NULL,
  `pasangansex_suami` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_ulang`
--

CREATE TABLE `kunjungan_ulang` (
  `id_pasien` int(150) NOT NULL,
  `tgl_kunjungan_ulang` varchar(255) NOT NULL,
  `haid_tanggal` varchar(255) NOT NULL,
  `b.b` varchar(255) NOT NULL,
  `tek.darah` varchar(255) NOT NULL,
  `keluhan_efek_samping` varchar(255) NOT NULL,
  `keluhan_komplikasi` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `tanggal_kembali` varchar(255) NOT NULL,
  `kunjungan_ulangid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(25) NOT NULL,
  `nama_layanan` varchar(150) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `delete_status`) VALUES
(1, 'Ruang Pemeriksaan', 0),
(2, 'Ruang Persalinan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `manage_websiteid` int(11) NOT NULL,
  `business_name` varchar(600) NOT NULL,
  `business_email` varchar(600) NOT NULL,
  `business_web` varchar(500) NOT NULL,
  `portal_addr` varchar(500) NOT NULL,
  `addr` varchar(600) NOT NULL,
  `curr_sym` varchar(600) NOT NULL,
  `curr_position` varchar(500) NOT NULL,
  `front_end_en` varchar(500) NOT NULL,
  `date_format` date NOT NULL,
  `def_tax` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`manage_websiteid`, `business_name`, `business_email`, `business_web`, `portal_addr`, `addr`, `curr_sym`, `curr_position`, `front_end_en`, `date_format`, `def_tax`, `logo`) VALUES
(1, 'Mayuri K', 'mayuri.infospace@gmail.com', '#', '#', '<p>Maharashtra, India</p>\r\n', '$', 'right', '0', '0000-00-00', '0.20', 'logo for hospital system.png');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(150) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `kota` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `gol_darah` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `Umur` int(11) NOT NULL,
  `Agama` varchar(50) NOT NULL,
  `Pendidikan` varchar(255) NOT NULL,
  `Pekerjaan` varchar(255) NOT NULL,
  `Kawin` int(11) NOT NULL,
  `NamaS` varchar(255) NOT NULL,
  `UmurS` int(11) NOT NULL,
  `AgamaS` varchar(255) NOT NULL,
  `PendidikanS` varchar(255) NOT NULL,
  `PekerjaanS` varchar(255) NOT NULL,
  `TeleponS` varchar(15) NOT NULL,
  `KawinS` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik`
--

CREATE TABLE `pemeriksaan_fisik` (
  `id_pemeriksaan_fisik` int(150) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `bentuk_tubuh` varchar(255) NOT NULL,
  `kesadaran` varchar(255) NOT NULL,
  `mata` varchar(255) NOT NULL,
  `leher` varchar(255) NOT NULL,
  `payudara` varchar(255) NOT NULL,
  `paru` varchar(255) NOT NULL,
  `jantung` varchar(255) NOT NULL,
  `hati` varchar(255) NOT NULL,
  `suhu_badan` varchar(255) NOT NULL,
  `genitalia_luar_dalam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_kehamilan`
--

CREATE TABLE `pemeriksaan_kehamilan` (
  `id_pemeriksaan_kehamilan` int(150) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `tgl_pemeriksaan` varchar(255) NOT NULL,
  `bb` varchar(100) NOT NULL,
  `tekanandarah` varchar(255) NOT NULL,
  `tinggi_fundusuteri` varchar(255) NOT NULL,
  `umur_kehamilan` varchar(255) NOT NULL,
  `letakjanin` varchar(255) NOT NULL,
  `djj` varchar(255) NOT NULL,
  `oed` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `penyuluhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(150) NOT NULL,
  `type_pendaftaran` varchar(30) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `id_layanan` int(150) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `waktu_pendaftaran` time NOT NULL,
  `id_bidan` int(15) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `app_reason` text NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_kehamilan`
--

CREATE TABLE `perencanaan_kehamilan` (
  `id_perencanaan_kehamilan` int(150) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `jumlah_anak_hidup` int(11) NOT NULL,
  `keinginan_punya_anak_lagi` varchar(255) NOT NULL,
  `saat_ingin_punya_anak_lagi` date NOT NULL,
  `status_kehamilan_saat_ini` varchar(255) NOT NULL,
  `riwayat_komplikasi_kehamilan` varchar(255) NOT NULL,
  `sikap_pasangan_terhadap_KB` varchar(255) NOT NULL,
  `menjelaskan_resiko` varchar(255) NOT NULL,
  `metode_ganda_untuk_akseptor_KB_yang_resiko_option` varchar(255) NOT NULL,
  `metode_ganda_untuk_akseptor_KB_yang_resiko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` int(11) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kehamilan`
--

CREATE TABLE `riwayat_kehamilan` (
  `id_riwayat_kehamilan` int(150) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `id_pasien` int(150) NOT NULL,
  `APIAH` varchar(255) NOT NULL,
  `umur_anak` varchar(255) NOT NULL,
  `jk_anak` varchar(100) NOT NULL,
  `cara_persalinan` varchar(255) NOT NULL,
  `penolong_persalinan` varchar(255) NOT NULL,
  `tempat_persalinan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `e_id` int(21) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email_config`
--

INSERT INTO `tbl_email_config` (`e_id`, `name`, `mail_driver_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encrypt`) VALUES
(1, 'xiemedical.id', 'smtp.gmail.com', 587, 'xiemedical.id@gmail.com', 'edin fkhh xtvc ictb', 'sdsad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createddateandtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id_bidan`);

--
-- Indexes for table `kehamilan_sekarang`
--
ALTER TABLE `kehamilan_sekarang`
  ADD PRIMARY KEY (`id_kehamilan_sekarang`),
  ADD KEY `patienid` (`id_pasien`);

--
-- Indexes for table `kunjungan_ulang`
--
ALTER TABLE `kunjungan_ulang`
  ADD PRIMARY KEY (`kunjungan_ulangid`),
  ADD KEY `patienid` (`id_pasien`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`manage_websiteid`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `loginid` (`loginid`);

--
-- Indexes for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  ADD PRIMARY KEY (`id_pemeriksaan_fisik`),
  ADD KEY `patientid` (`id_pasien`);

--
-- Indexes for table `pemeriksaan_kehamilan`
--
ALTER TABLE `pemeriksaan_kehamilan`
  ADD PRIMARY KEY (`id_pemeriksaan_kehamilan`),
  ADD KEY `patientid` (`id_pasien`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `midwifeid` (`id_bidan`),
  ADD KEY `patientid` (`id_pasien`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `perencanaan_kehamilan`
--
ALTER TABLE `perencanaan_kehamilan`
  ADD PRIMARY KEY (`id_perencanaan_kehamilan`),
  ADD KEY `patientid` (`id_pasien`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient_id` (`id_pasien`),
  ADD KEY `id_proses` (`id_proses`) USING BTREE;

--
-- Indexes for table `riwayat_kehamilan`
--
ALTER TABLE `riwayat_kehamilan`
  ADD PRIMARY KEY (`id_riwayat_kehamilan`),
  ADD KEY `patientid` (`id_pasien`);

--
-- Indexes for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidan`
--
ALTER TABLE `bidan`
  MODIFY `id_bidan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kehamilan_sekarang`
--
ALTER TABLE `kehamilan_sekarang`
  MODIFY `id_kehamilan_sekarang` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kunjungan_ulang`
--
ALTER TABLE `kunjungan_ulang`
  MODIFY `kunjungan_ulangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `manage_websiteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  MODIFY `id_pemeriksaan_fisik` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemeriksaan_kehamilan`
--
ALTER TABLE `pemeriksaan_kehamilan`
  MODIFY `id_pemeriksaan_kehamilan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `perencanaan_kehamilan`
--
ALTER TABLE `perencanaan_kehamilan`
  MODIFY `id_perencanaan_kehamilan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riwayat_kehamilan`
--
ALTER TABLE `riwayat_kehamilan`
  MODIFY `id_riwayat_kehamilan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `e_id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kehamilan_sekarang`
--
ALTER TABLE `kehamilan_sekarang`
  ADD CONSTRAINT `kehamilan_sekarang_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kunjungan_ulang`
--
ALTER TABLE `kunjungan_ulang`
  ADD CONSTRAINT `kunjungan_ulang_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  ADD CONSTRAINT `pemeriksaan_fisik_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaan_kehamilan`
--
ALTER TABLE `pemeriksaan_kehamilan`
  ADD CONSTRAINT `pemeriksaan_kehamilan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_4` FOREIGN KEY (`id_bidan`) REFERENCES `bidan` (`id_bidan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_5` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Constraints for table `perencanaan_kehamilan`
--
ALTER TABLE `perencanaan_kehamilan`
  ADD CONSTRAINT `perencanaan_kehamilan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_kehamilan`
--
ALTER TABLE `riwayat_kehamilan`
  ADD CONSTRAINT `riwayat_kehamilan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
