-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2011 at 07:50 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `devidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanja`
--

CREATE TABLE IF NOT EXISTS `keranjang_belanja` (
  `kd_penjualan` varchar(30) default NULL,
  `produkID` varchar(10) default '0',
  `jml_pesan` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_belanja`
--

INSERT INTO `keranjang_belanja` (`kd_penjualan`, `produkID`, `jml_pesan`) VALUES
('24072010001827', '2334', 1),
('24072010001827', 'hiu', 1),
('24072010002036', '2334', 1),
('24072010002036', 'MCSharp', 1),
('24072010005154', '111', 1),
('24072010005616', '111', 1),
('24072010005616', '2334', 1),
('21072010012915', '2334', 1),
('21072010012915', 'hiu', 1),
('19072010192221', 'asdfgh', 1),
('19072010192221', 'hiu', 1),
('18092010012606', 'hiu', 1),
('29102011025917', '111', 1),
('29102011214417', '111', 1),
('30102011101218', '111', 1),
('30102011110333', 'hiu', 1),
('08112011235925', '111', 1),
('09112011000134', 'hiu', 1),
('09112011000255', 'asdfgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_anggota`
--

CREATE TABLE IF NOT EXISTS `mst_anggota` (
  `id` bigint(20) NOT NULL auto_increment,
  `nip` varchar(100) character set latin1 NOT NULL,
  `no_anggota` char(15) collate latin1_general_ci NOT NULL default '00',
  `no_ktp` char(15) character set latin1 default NULL,
  `nama_lengkap` varchar(100) character set latin1 default NULL,
  `alamat` varchar(100) character set latin1 default NULL,
  `provinsi` varchar(100) character set latin1 NOT NULL,
  `kota` varchar(50) character set latin1 default NULL,
  `alamat_email` varchar(50) character set latin1 default NULL,
  `photo` varchar(100) character set latin1 default NULL,
  `keterangan` tinytext character set latin1,
  `waktu` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `telepon` char(20) character set latin1 default NULL,
  `kata_kunci` char(20) character set latin1 default NULL,
  `tempat_lahir` varchar(100) character set latin1 default NULL,
  `tanggal_lahir` date default NULL,
  `pekerjaan` varchar(100) character set latin1 default NULL,
  `status` enum('Kawin','Belum Kawin','Lain-lain') character set latin1 default NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') character set latin1 default NULL,
  `aktivasi` tinyint(1) default '0',
  `golongan` varchar(10) character set latin1 default NULL,
  `jabatan` varchar(20) character set latin1 default NULL,
  `status_pegawai` tinyint(1) NOT NULL default '1',
  `asal_sekolah` varchar(100) character set latin1 NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `nama_bank` varchar(50) character set latin1 NOT NULL,
  `rekening` varchar(100) character set latin1 NOT NULL,
  `atas_nama` varchar(100) character set latin1 NOT NULL,
  `jumlah_transfer` varchar(30) character set latin1 NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `no_order` varchar(30) character set latin1 NOT NULL,
  `simpanan` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mst_anggota`
--

INSERT INTO `mst_anggota` (`id`, `nip`, `no_anggota`, `no_ktp`, `nama_lengkap`, `alamat`, `provinsi`, `kota`, `alamat_email`, `photo`, `keterangan`, `waktu`, `telepon`, `kata_kunci`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `status`, `jenis_kelamin`, `aktivasi`, `golongan`, `jabatan`, `status_pegawai`, `asal_sekolah`, `gaji`, `nama_bank`, `rekening`, `atas_nama`, `jumlah_transfer`, `tanggal_transfer`, `no_order`, `simpanan`) VALUES
(2, '123', '004', '343223455', 'asep', 'aaaaaaaa', '', 'bandung', 'x_monox@yahoo.co.id', 'atol shine.JPG', 'aaaaa', '2010-07-22 22:13:36', '4433', '123', 'Bandung', '1950-01-01', 'Mahasiswa', 'Kawin', 'Laki-laki', 1, 'A', 'Anggota', 1, '', 3000000, '', '', '', '', '0000-00-00', '', 0),
(3, '23332', '005', '332221123', 'Dede', 'asdas asdas d', '', 'Bandung', 'yulius@yahoo.com', 'Lighthouse.jpg', 'asdasd  daas das', '2011-10-30 10:09:04', '0228939993', 'dede', 'Jakarta', '1986-04-01', 'Mahasiswa', 'Kawin', 'Laki-laki', 1, 'A', 'Anggota', 1, '', 1855977, '', '', '', '', '0000-00-00', '', 200001),
(7, '', '2806001', '2343242', 'Mr. Direktur', 'Jl. Babakan Jeruk II', '1', 'bandung', 'nanang@yahoo.com', 'nenek.jpg', 'asdasd', '2010-06-28 22:05:38', '0228939993', '123', 'Jakarta', '2005-01-01', 'aa', 'Kawin', 'Laki-laki', 1, NULL, NULL, 0, '', 0, 'Mandiri', '33333333333', '', '', '0000-00-00', '', 0),
(8, '', '0107002', '332221123', 'Yulius', 'Jl. Babakan Jeruk II', '1', 'bandung', 'yulius@yahoo.com', 'Penguins.jpg', 'asdasd', '2010-09-18 00:34:18', '0228939993', '123', 'Jakarta', '1950-01-01', 'Mahasiswa', 'Kawin', 'Laki-laki', 1, NULL, NULL, 0, '', 0, 'Mandiri', '33333333333', 'Kiki', '2000000', '2010-09-18', '18092010012606', 0),
(9, '', '0107003', '', '', '', '1', '', '', NULL, '', '2010-07-01 18:04:05', '', '', '', '1950-01-01', '', 'Kawin', 'Laki-laki', 1, NULL, NULL, 0, '', 0, '', '', '', '', '0000-00-00', '', 0),
(10, '', '0407004', '1111', 'asep', '', '1', '', 'asep@gmail.com', 'Jellyfish.jpg', '', '2010-07-04 10:45:02', '', '123', '', '1950-01-01', '', 'Kawin', 'Laki-laki', 1, NULL, NULL, 0, '', 0, '', '', '', '', '0000-00-00', '', 0),
(15, '', '0407005', '1111', 'gggg', 'Jl. tarogong', '1', 'Bandung', 'yulius@yahoo.com', 'Chrysanthemum.jpg', 'adasda', '2010-07-04 18:31:04', '0228939993', 'ggg', 'Bandung', '1964-01-01', 'Mahasiswa', 'Kawin', 'Laki-laki', 1, NULL, NULL, 0, '', 0, 'Mandiri', '232435454 6565656', '', '', '0000-00-00', '', 0),
(13, '162526625', '006', '1111', 'gggg', 'ggggggggggg', 'gggg', 'ggg', 'jihan@yahoo.com', 'Penguins.jpg', 'ggg', '2010-07-04 11:12:47', 'gg', '123', 'gggg', '1950-01-01', '', 'Kawin', 'Laki-laki', 0, 'A', 'pegawai', 1, '', 6000000, '', '', '', '', '0000-00-00', '', 0),
(16, '12300', '007', '929993000049', 'Devianti', 'Jl. Cimahi', 'Jawa Barat', 'Cimahi', 'devianti_pp@yahoo.co.id', 'football_5.jpg', '', '2011-10-30 10:11:57', '022920099388', '123', 'Cimahi', '1980-04-01', '', 'Belum Kawin', 'Perempuan', 1, 'A', 'Manager', 1, 'Unas Pasim', 3000000, '', '', '', '', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_barang`
--

CREATE TABLE IF NOT EXISTS `mst_barang` (
  `id` int(11) NOT NULL auto_increment,
  `kode_brg` char(10) character set latin1 NOT NULL,
  `nama_barang` varchar(100) character set latin1 default NULL,
  `harga` bigint(20) default NULL,
  `jumlah` int(11) default NULL,
  `waktu` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `keterangan` text character set latin1,
  `lama_cicilan` tinyint(4) default NULL,
  `diskon` decimal(11,0) default NULL,
  `kode_kategori` tinyint(4) default NULL,
  `gambar` varchar(100) character set latin1 default NULL,
  PRIMARY KEY  (`id`,`kode_brg`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mst_barang`
--

INSERT INTO `mst_barang` (`id`, `kode_brg`, `nama_barang`, `harga`, `jumlah`, `waktu`, `keterangan`, `lama_cicilan`, `diskon`, `kode_kategori`, `gambar`) VALUES
(1, '111', 'tv 14', 150000, 5, '2011-11-08 23:59:30', '233444', 3, 20, 5, 'football_legend_2.jpg'),
(2, '2334', 'panasonic kulkas', 200000, 0, '2010-07-19 18:19:41', '33333', 3, 10, 1, 'air terjun.jpg'),
(3, 'hiu', 'kulkas', 2700000, 6, '2011-11-09 00:01:38', 'dfnkjdsfls', 10, 5, 1, NULL),
(4, 'asdf', 'dasd', 1500000, 6, '2010-06-12 18:25:41', 'asfdzhd', 4, 20, 1, 'nenek.jpg'),
(5, 'asdfgh', 'vcxvdsvf', 5678654, 1, '2011-11-09 00:07:49', 'atretyyery', 4, 30, 3, 'Hydrangeas.jpg'),
(6, '333', 'DDD', 0, 10, '2010-07-15 18:51:14', 'asda dasd asdas', 0, 0, 7, 'Chrysanthemum.jpg'),
(7, 'PNS0393LE', 'Lemari Panasonic ', 300000, 10, '2010-07-15 18:51:14', 'asdas dasda ', 12, 10, 1, 'atol shine.JPG'),
(8, 'MCSharp', 'Msin cuci', 150000, 3, '2010-07-23 22:57:02', 'sssss', 12, 20, 2, 'afternoon shadow.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kategori`
--

CREATE TABLE IF NOT EXISTS `mst_kategori` (
  `kode_kategori` tinyint(4) NOT NULL auto_increment,
  `nama_kategori` varchar(100) character set latin1 default NULL,
  PRIMARY KEY  (`kode_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mst_kategori`
--

INSERT INTO `mst_kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'LEMARI ES'),
(2, 'MESIN CUCI'),
(3, 'MICROWAVE'),
(5, 'TELEVISI');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `ORDER_KODE` varchar(50) NOT NULL default '',
  `ORDER_NO_ANGGOTA` varchar(30) NOT NULL,
  `ORDER_TGL` datetime NOT NULL default '0000-00-00 00:00:00',
  `ORDER_TOTAL` int(12) NOT NULL default '0',
  `ORDER_STATUS` varchar(12) NOT NULL default '',
  `ORDER_KIRIM` varchar(12) NOT NULL default '',
  `bukti_transfer` varchar(255) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  PRIMARY KEY  (`ORDER_KODE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ORDER_KODE`, `ORDER_NO_ANGGOTA`, `ORDER_TGL`, `ORDER_TOTAL`, `ORDER_STATUS`, `ORDER_KIRIM`, `bukti_transfer`, `keuntungan`) VALUES
('21072010012915', '004', '2010-07-19 19:19:40', 0, '0', '0', '', 0),
('19072010192221', '004', '2010-07-19 19:51:46', 0, '0', '0', '', 0),
('18092010012606', '0107002', '2010-09-18 01:26:21', 0, '1', '1', '', 0),
('30102011101218', '007', '2011-10-30 10:53:34', 0, '1', '1', '', 0),
('08112011235925', '004', '2011-11-08 23:59:30', 0, '0', '0', '', 0),
('09112011000134', '004', '2011-11-09 00:01:38', 0, '0', '0', '', 0),
('09112011000255', '004', '2011-11-09 00:07:49', 0, '0', '0', '', 2271462);

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE IF NOT EXISTS `t_bank` (
  `KD_BANK` tinyint(4) NOT NULL auto_increment,
  `NM_BANK` varchar(20) NOT NULL,
  `ATAS_NAMA` varchar(25) NOT NULL,
  `REKENING` varchar(20) NOT NULL,
  PRIMARY KEY  (`KD_BANK`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`KD_BANK`, `NM_BANK`, `ATAS_NAMA`, `REKENING`) VALUES
(2, 'Bank BNI', 'Hilma', '0109006294');

-- --------------------------------------------------------

--
-- Table structure for table `t_cicilan`
--

CREATE TABLE IF NOT EXISTS `t_cicilan` (
  `no_anggota` varchar(5) character set latin1 collate latin1_general_ci NOT NULL,
  `cicilan` int(11) NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY  (`no_anggota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_cicilan`
--

INSERT INTO `t_cicilan` (`no_anggota`, `cicilan`, `gaji`, `tanggal`) VALUES
('004', 64, 1055730, '2010-07-19 19:51:46'),
('007', 2, 2960000, '2011-10-30 10:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `t_informasi`
--

CREATE TABLE IF NOT EXISTS `t_informasi` (
  `id` int(11) NOT NULL auto_increment,
  `judul` varchar(100) character set latin1 default NULL,
  `isi` text character set latin1,
  `gambar` varchar(100) character set latin1 default NULL,
  `waktu` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_informasi`
--

INSERT INTO `t_informasi` (`id`, `judul`, `isi`, `gambar`, `waktu`) VALUES
(1, 'apa yaaaaaaaaa.................', 'ya gitu ajaaaaaaaaaaaaa ssaffsfas', NULL, '2010-06-03 13:18:59'),
(3, 'Hilma Pusing', 'adgjkl;''', NULL, '2010-06-03 16:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `t_provinsi`
--

CREATE TABLE IF NOT EXISTS `t_provinsi` (
  `id` int(11) NOT NULL auto_increment,
  `nama_provinsi` varchar(255) NOT NULL,
  `ongkos_kirim` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_provinsi`
--

INSERT INTO `t_provinsi` (`id`, `nama_provinsi`, `ongkos_kirim`) VALUES
(1, 'Jawa barat', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `nik` varchar(15) NOT NULL default '',
  `nama_pegawai` varchar(30) NOT NULL default '',
  `username` varchar(30) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `alamat_pegawai` text NOT NULL,
  `telepon` varchar(20) default NULL,
  `email` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`nik`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`nik`, `nama_pegawai`, `username`, `password`, `alamat_pegawai`, `telepon`, `email`) VALUES
('A001', 'Mas adimin', 'admin', '123', 'Jl. Babakan Jeruk II', '229939939', 'admin@gmail.com'),
('123', 'Yulius', 'user', 'user', 'Jl. Suci', '8377389', 'yulius@javan.co.id');
