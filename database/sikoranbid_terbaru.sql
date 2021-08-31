-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 06:21 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikoranbid`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Ketua Panitia'),
(2, 'Pengumpulan'),
(3, 'Bendahara'),
(4, 'Pendayagunaan'),
(5, 'Pendistribusian'),
(6, 'Sarana Prasarana');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `id_chat` int(11) NOT NULL,
  `pengirim` varchar(5) NOT NULL,
  `penerima` varchar(5) NOT NULL,
  `chat` text NOT NULL,
  `status` enum('D','R') NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`id_chat`, `pengirim`, `penerima`, `chat`, `status`, `tgl`, `jam`) VALUES
(17, '3', '', 'Woy', 'D', '2021-06-19', '12:10'),
(18, '2', '', 'Ada yang bisa di banting', 'D', '2021-06-19', '12:10'),
(19, '2', '', 'WKWKWK', 'D', '2021-06-19', '12:10'),
(20, '1', '', 'kakakaka', 'D', '2021-06-19', '12:10'),
(21, '1', '', 'oi', 'D', '2021-07-04', '09:08'),
(22, '1', '', 'apo akaba', 'D', '2021-07-04', '09:08'),
(23, '2', '', 'qqqqqqqqqq', 'D', '2021-07-04', '09:08'),
(24, '1', '', 'sscsvs', 'D', '2021-07-04', '09:09');

-- --------------------------------------------------------

--
-- Table structure for table `chat_personal`
--

CREATE TABLE `chat_personal` (
  `id_chat` int(11) NOT NULL,
  `pengirim` varchar(5) NOT NULL,
  `penerima` varchar(5) NOT NULL,
  `chat` text NOT NULL,
  `status` enum('D','R') NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_personal`
--

INSERT INTO `chat_personal` (`id_chat`, `pengirim`, `penerima`, `chat`, `status`, `tgl`, `jam`) VALUES
(1, '3', '2', 'oi', 'D', '2021-06-17', '07:45'),
(2, '2', '3', 'yo', 'D', '2021-06-17', '07:45'),
(3, '3', '2', 'gfnfgnb', 'D', '2021-06-17', '07:51'),
(4, '3', '2', 'fbfgbnfdbhv', 'D', '2021-06-17', '07:51'),
(5, '3', '2', 'bhgdfhvtrtr', 'D', '2021-06-17', '07:51'),
(6, '3', '2', 'rdbhsrtbh tr', 'D', '2021-06-17', '07:51'),
(7, '3', '2', 'dfgbdfgdfvgd', 'D', '2021-06-17', '07:51'),
(8, '2', '3', 'fhtnbdtfhnfbghd', 'D', '2021-06-17', '07:51'),
(9, '3', '2', 'ijsdlibvndsilbnfdiu', 'D', '2021-06-17', '07:52'),
(10, '2', '3', 'regfdbdfhwtrhtrh', 'D', '2021-06-17', '08:43'),
(11, '1', '4', 'iggui', 'D', '2021-07-29', '06:07'),
(12, '1', '4', 'ksdfvhkdsfjhgv jdskfhg sdkjf', 'D', '2021-07-29', '06:07'),
(13, '1', '4', 'sd,k ghdfsjkgh dfkj ghsdfljkhg d', 'D', '2021-07-29', '06:07'),
(14, '1', '4', 'sd,k ghdfsjkgh dfkj ghsdfljkhg d', 'D', '2021-07-29', '06:07'),
(15, '1', '4', 'sd,k ghdfsjkgh dfkj ghsdfljkhg d', 'D', '2021-07-29', '06:07'),
(16, '1', '4', 'sd,k ghdfsjkgh dfkj ghsdfljkhg d', 'D', '2021-07-29', '06:07'),
(17, '1', '4', 'c gvlisruh gsdluhif', 'D', '2021-07-29', '06:08');

-- --------------------------------------------------------

--
-- Table structure for table `detail_proker`
--

CREATE TABLE `detail_proker` (
  `id_detail_proker` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `item` text NOT NULL,
  `keterangan` text NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_proker`
--

INSERT INTO `detail_proker` (`id_detail_proker`, `id_proker`, `item`, `keterangan`, `qty`, `status`) VALUES
(1, 1, '', '', 5, ''),
(2, 1, '', '', 5, ''),
(3, 1, '', 'untuk ini', 3, ''),
(4, 1, '', 'untuk ini', 3, ''),
(5, 1, '', 'untuk ini', 3, ''),
(6, 1, 'dsvshgv df', 'untuk ini', 3, ''),
(7, 1, '', 'untuk ini', 3, ''),
(10, 2, 'Makan siang', 'wcgaewr v', 6, '1'),
(11, 2, 'asca', 'asca', 4, '1'),
(12, 2, 'asca', 'asca', 4, '1'),
(13, 2, 'asca', 'asca', 4, '1'),
(14, 2, 'makan malam', 'asasa', 4, '1'),
(15, 0, 'Makan siang', 'safcasf', 6, '0'),
(19, 5, 'makanan', 'siang', 10, '1'),
(20, 5, 'PC', '', 10, '1'),
(21, 5, 'fd', 'fd', 7, '1'),
(22, 9, 'PC', '-', 3, '1'),
(23, 9, 'Pemateri', '-', 2, '1'),
(24, 9, 'Makan sisang', '-', 40, '3'),
(25, 9, 'MC', '-', 2, '3'),
(26, 9, 'Honor panitia', 'OK', 2, '1'),
(27, 9, 'Ruangan', '-', 1, '3'),
(28, 9, 'Snack', '-', 20, '3'),
(29, 9, 'Sound System', '-', 1, '1'),
(30, 9, 'Camera', '-', 1, '3'),
(31, 9, 'Honor Pemateri', '', 2, '3'),
(33, 10, 'Tenaga kerja', '', 10, '1'),
(34, 10, 'Meja', '', 5, '3'),
(35, 10, 'Tenda', '', 5, '1'),
(36, 10, 'Makan siang', '', 15, '1'),
(37, 10, 'Snack', '', 15, '1'),
(38, 10, 'Buku', '', 10, '1'),
(39, 10, 'Pena', '', 10, '1'),
(40, 10, 'Laptop', '', 2, '1'),
(41, 10, 'Kursi', '', 1, '1'),
(42, 10, 'Transportasi', '', 1, '3'),
(43, 13, 'Makan siang', '', 5, '1'),
(44, 13, 'tenaga kerja', '', 3, '1'),
(45, 13, 'ATK', '', 5, '1'),
(46, 13, 'Meja', '', 2, '1'),
(47, 13, 'Mobil', '', 2, '1'),
(48, 13, 'tenda', '', 1, '1'),
(49, 13, 'Kotak Infak', '', 1, '1'),
(50, 14, 'tenda', '', 1, '3'),
(51, 14, 'sdm', 'tambahan tenaga kerja', 5, '1'),
(52, 14, 'transportasi', '', 2, '1'),
(53, 14, 'snack', 'kosumsi', 30, '3'),
(54, 14, 'hotel', 'tempat acara', 1, '1'),
(55, 14, 'kursi', '', 100, '1'),
(56, 14, 'meja', '', 1, '1'),
(57, 14, 'spanduk', '', 2, '1'),
(58, 14, 'minuman', '', 5, '1'),
(59, 14, 'laptop', '', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(15) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `tgl`, `jam`, `jenis`, `keterangan`, `jumlah`) VALUES
(9, '2021-05-21', '08:48', 'Uang Keluar', 'BPJSTK', '312000'),
(11, '2021-04-07', '09:58', 'Uang Masuk', 'dvbgdsfgn d', '8000'),
(12, '2021-05-21', '10:26', 'Uang Masuk', 'ddffd', '80000'),
(14, '2021-05-21', '10:40', 'Uang Masuk', 'erghyre', '60000'),
(15, '2021-09-10', '10:40', 'Uang Masuk', '5hj65ujrut', '50000'),
(16, '2021-05-04', '10:41', 'Uang Masuk', 'sdbsdgb dg', '60000'),
(17, '2021-06-03', '10:42', 'Uang Masuk', 'dsihgviuogf', '60000'),
(18, '2021-05-21', '10:53', 'Uang Masuk', 'kfymyt,myu', '80000'),
(19, '2021-05-21', '11:09', 'Uang Keluar', 'xnzna', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_proker`
--

CREATE TABLE `komentar_proker` (
  `id_komentar_proker` int(11) NOT NULL,
  `id_proker` varchar(5) NOT NULL,
  `status` varchar(5) NOT NULL,
  `catatan` text NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_proker`
--

INSERT INTO `komentar_proker` (`id_komentar_proker`, `id_proker`, `status`, `catatan`, `tgl`, `jam`) VALUES
(1, '1', '1', 'ddddd', '', ''),
(2, '1', '3', 'sdbdxf', '', ''),
(3, '1', '1', '', '', ''),
(4, '1', '3', '', '', ''),
(5, '2', '1', 'aaaaaaaa', '2021-06-25', '22:26'),
(6, '2', '3', 'ooooookkkkkkkkkkk', '2021-06-25', '22:28'),
(7, '1', '5', 'mohon segera di distribusikan', '2021-06-25', '22:32'),
(8, '2', '5', 'Mohon segera diselesaikan', '2021-06-25', '22:32'),
(9, '2', '5', 'mohon segera di distribusikan', '2021-06-25', '23:09'),
(10, '2', '6', '', '2021-06-26', '00:29'),
(11, '2', '6', 'sss', '2021-06-26', '00:48'),
(12, '2', '6', 'ddd', '2021-06-26', '00:49'),
(13, '2', '7', '', '2021-06-26', '00:49'),
(14, '2', '6', '', '2021-06-26', '00:51'),
(15, '2', '8', '', '2021-06-26', '00:51'),
(16, '2', '9', '', '2021-06-26', '00:54'),
(17, '2', '6', '', '2021-06-26', '00:58'),
(18, '2', '8', '', '2021-06-26', '01:00'),
(19, '2', '9', '', '2021-06-26', '01:01'),
(20, '2', '6', '', '2021-06-26', '01:01'),
(21, '2', '8', 'sdcsd', '2021-06-26', '01:02'),
(22, '2', '9', '', '2021-06-26', '01:03'),
(23, '2', '5', '', '2021-06-26', '01:03'),
(24, '2', '6', '', '2021-06-26', '01:03'),
(25, '2', '7', '', '2021-06-26', '01:06'),
(26, '2', '6', '', '2021-06-26', '01:06'),
(27, '2', '8', '', '2021-06-26', '01:06'),
(28, '2', '10', '', '2021-06-26', '01:06'),
(29, '2', '11', '', '2021-06-26', '01:07'),
(30, '2', '5', '', '2021-06-26', '01:09'),
(31, '3', '1', 'vsdv', '2021-06-26', '01:12'),
(32, '3', '3', '', '2021-06-26', '01:13'),
(33, '3', '5', '', '2021-06-26', '01:16'),
(34, '3', '6', '', '2021-06-26', '01:18'),
(35, '3', '6', '', '2021-06-26', '01:19'),
(36, '3', '7', '', '2021-06-26', '01:21'),
(37, '3', '6', '', '2021-06-26', '01:21'),
(38, '3', '7', '', '2021-06-26', '01:23'),
(39, '2', '6', 'OK', '2021-07-02', '10:50'),
(40, '2', '8', '', '2021-07-02', '10:51'),
(41, '2', '9', 's', '2021-07-02', '10:52'),
(42, '2', '5', 'sd', '2021-07-02', '10:52'),
(43, '2', '6', '', '2021-07-02', '13:45'),
(44, '2', '7', '', '2021-07-02', '13:51'),
(45, '2', '6', '', '2021-07-02', '13:52'),
(46, '2', '8', '', '2021-07-02', '14:14'),
(47, '2', '10', 'OK', '2021-07-02', '14:14'),
(48, '2', '11', 'OK', '2021-07-02', '14:14'),
(49, '4', '2', 'apaan ini', '2021-07-04', '20:11'),
(50, '5', '1', 'OK', '2021-07-04', '20:12'),
(51, '5', '3', 'lanjut', '2021-07-04', '20:12'),
(52, '5', '5', 'mohon segera di distribusikan', '2021-07-04', '20:14'),
(53, '5', '5', 'ddd', '2021-07-04', '20:25'),
(54, '5', '5', 'w', '2021-07-04', '20:26'),
(55, '5', '6', 'ok', '2021-07-04', '20:31'),
(56, '5', '7', '56', '2021-07-04', '20:38'),
(57, '5', '6', 'e', '2021-07-04', '20:38'),
(58, '5', '8', 'dsds', '2021-07-04', '20:39'),
(59, '5', '9', 'sds', '2021-07-04', '20:39'),
(60, '5', '5', 'sds', '2021-07-04', '20:39'),
(61, '5', '6', 'ssdf', '2021-07-04', '20:40'),
(62, '5', '8', 'd', '2021-07-04', '20:41'),
(63, '5', '10', 'sd', '2021-07-04', '20:41'),
(64, '5', '11', 'sw', '2021-07-04', '20:41'),
(65, '5', '5', 'sd', '2021-07-04', '20:42'),
(66, '5', '6', '', '2021-07-04', '20:42'),
(67, '5', '7', '', '2021-07-04', '20:42'),
(68, '5', '6', '', '2021-07-04', '20:42'),
(69, '5', '8', '', '2021-07-04', '20:42'),
(70, '5', '10', '', '2021-07-04', '20:42'),
(71, '5', '11', '', '2021-07-04', '20:42'),
(72, '6', '2', 'vdv dsfb', '2021-07-08', '16:47'),
(73, '6', '2', 'sscvds', '2021-07-08', '16:55'),
(74, '8', '1', '', '2021-07-08', '17:18'),
(75, '8', '3', '', '2021-07-08', '17:18'),
(76, '9', '1', 'OK', '2021-07-08', '17:21'),
(77, '9', '3', 'Sip', '2021-07-08', '17:22'),
(78, '9', '5', 'cepat ya', '2021-07-08', '17:31'),
(79, '9', '6', '', '2021-07-09', '19:48'),
(80, '9', '7', '', '2021-07-09', '20:27'),
(81, '9', '6', '', '2021-07-09', '20:30'),
(82, '9', '7', '', '2021-07-09', '20:32'),
(83, '9', '6', '', '2021-07-09', '20:32'),
(84, '9', '7', '', '2021-07-09', '21:06'),
(85, '9', '6', '', '2021-07-09', '21:08'),
(86, '10', '1', '', '2021-07-09', '22:38'),
(87, '10', '3', 'sip', '2021-07-09', '22:40'),
(88, '10', '5', '', '2021-07-09', '22:44'),
(89, '10', '6', '', '2021-07-09', '23:29'),
(90, '10', '6', '', '2021-07-09', '23:51'),
(91, '10', '8', '', '2021-07-10', '00:00'),
(92, '10', '10', '', '2021-07-10', '00:02'),
(93, '10', '11', '', '2021-07-10', '00:02'),
(94, '10', '7', '', '2021-07-10', '08:51'),
(95, '10', '6', '', '2021-07-10', '08:57'),
(96, '12', '2', 'apaan ini', '2021-07-11', '21:50'),
(97, '12', '1', 'dsdfnbd', '2021-07-11', '21:51'),
(98, '12', '4', 'sss', '2021-07-11', '21:52'),
(99, '13', '1', 'ok', '2021-07-11', '21:54'),
(100, '13', '3', 'd', '2021-07-11', '21:54'),
(101, '13', '5', '', '2021-07-11', '21:57'),
(102, '13', '6', '', '2021-07-11', '22:00'),
(103, '13', '8', '', '2021-07-11', '22:05'),
(104, '13', '10', '', '2021-07-11', '22:06'),
(105, '13', '11', '', '2021-07-11', '22:06'),
(106, '7', '1', '', '2021-07-25', '22:36'),
(107, '7', '4', '', '2021-07-25', '22:36'),
(108, '7', '1', '', '2021-07-25', '22:39'),
(109, '7', '4', '', '2021-07-25', '22:40'),
(110, '14', '2', 'fgkjgmghjmg', '2021-08-17', '22:06'),
(111, '14', '1', 'ok', '2021-08-17', '22:07'),
(112, '14', '4', 'bvcnc', '2021-08-17', '22:08'),
(113, '14', '1', '', '2021-08-17', '22:08'),
(114, '14', '3', '', '2021-08-17', '22:09'),
(115, '14', '5', 'oke', '2021-08-17', '22:15'),
(116, '14', '6', '', '2021-08-17', '22:23'),
(117, '14', '7', '', '2021-08-17', '22:30'),
(118, '14', '6', '', '2021-08-17', '22:30'),
(119, '14', '8', '', '2021-08-17', '22:35'),
(120, '14', '10', '', '2021-08-17', '22:36'),
(121, '14', '11', '', '2021-08-17', '22:36'),
(122, '10', '7', '', '2021-08-22', '09:23'),
(123, '9', '7', '', '2021-08-22', '09:30'),
(124, '9', '6', '', '2021-08-22', '09:31');

-- --------------------------------------------------------

--
-- Table structure for table `kotak_infaq`
--

CREATE TABLE `kotak_infaq` (
  `id_kotak` int(11) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kotak_infaq`
--

INSERT INTO `kotak_infaq` (`id_kotak`, `lokasi`, `alamat`) VALUES
(2, 'disana se', 'disini jo');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_proker`
--

CREATE TABLE `laporan_proker` (
  `id_laporan` int(11) NOT NULL,
  `id_proker` varchar(5) NOT NULL,
  `laporan` text NOT NULL,
  `evaluasi` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_proker`
--

INSERT INTO `laporan_proker` (`id_laporan`, `id_proker`, `laporan`, `evaluasi`, `file`) VALUES
(3, '5', 'bagini', 'bagitu', '210704084150161100130_SilviaNetriAzhari.pdf'),
(4, '5', 'sddsf', 'sdfsdgf', '210704084306161100130_SilviaNetriAzhari.pdf'),
(5, '10', 'eh', 'bfd', '210710120228STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(6, '13', 'ok', 'sip', '210711100655STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(7, '14', 'ok', 'no', '210817103657Rekapitulasi SIMBANGDA Based Evidence Per SKPD Per 31 Juli 2021.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `muzaki`
--

CREATE TABLE `muzaki` (
  `id_muzaki` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muzaki`
--

INSERT INTO `muzaki` (`id_muzaki`, `nama`, `alamat`, `nohp`) VALUES
(2, 'Hamid Sss', 'Padang ss', '4444'),
(3, 'Ucok Baba', 'Maransi', '081212121212'),
(4, 'Andika', 'aie pacah', '0895735'),
(6, 'Yogi', 'disana', '0912212'),
(7, 'Udin penyok', 'padang city', '081122334455');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_sapras` varchar(5) NOT NULL,
  `id_detail_proker` varchar(5) NOT NULL,
  `dipinjamkan` int(11) NOT NULL,
  `tgl_peminjaman` varchar(25) NOT NULL,
  `tgl_dikembalikan` varchar(25) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendistribusian_proker`
--

CREATE TABLE `pendistribusian_proker` (
  `id_pendistribusian` int(11) NOT NULL,
  `id_detail_proker` varchar(5) NOT NULL,
  `id_bidang_terlibat` varchar(5) NOT NULL,
  `keterangan_pendistribusian` text NOT NULL,
  `id_data_support` varchar(5) NOT NULL,
  `disetujui` varchar(25) NOT NULL,
  `file_support` text NOT NULL,
  `qty_sapras` varchar(5) NOT NULL,
  `biaya_satuan` decimal(15,0) NOT NULL,
  `catatan_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendistribusian_proker`
--

INSERT INTO `pendistribusian_proker` (`id_pendistribusian`, `id_detail_proker`, `id_bidang_terlibat`, `keterangan_pendistribusian`, `id_data_support`, `disetujui`, `file_support`, `qty_sapras`, `biaya_satuan`, `catatan_bidang`) VALUES
(49, '24', '3', '-', '', '500000', '210709093840padi.jpg', '40', '5000000', ''),
(50, '27', '6', '-', '2', '1', '210709093116Capture.PNG', '1', '0', ''),
(51, '22', '2', '-', '', '0', '', '3', '0', ''),
(52, '23', '2', '-dd', '', '0', '', '2', '0', ''),
(53, '26', '3', 'OK', '', '60000', '210729120926kochenk.jpg', '2', '60000', ''),
(54, '25', '3', '-', '', '130000', '210729120821kochenk.jpg', '2', '60000', ''),
(55, '28', '6', '-', '2', '20', '210709093617Capture.PNG', '20', '0', ''),
(56, '30', '6', '-', '2', '1', '210709091008STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '1', '0', ''),
(57, '29', '2', '-', '', '', '', '1', '0', ''),
(58, '31', '5', '', '', '', '', '2', '0', ''),
(59, '33', '4', 'bisa melobi', '', '', '', '10', '0', ''),
(60, '34', '6', 'cepat ya', '5', '5', '210807091139padi.jpg', '2', '0', ''),
(61, '35', '3', '', '', '111111111', '210709115644STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '5', '2000000', ''),
(62, '36', '3', '', '', '50000', '210709115907STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '15', '15000', ''),
(63, '37', '3', '', '', '50000', '210710083404Capture.PNG', '15', '5000', 'dsde'),
(64, '38', '3', '', '', '384', '210710083706', '10', '2000', 'fasdfsd'),
(65, '39', '3', '', '', '2312', '', '10', '2000', ''),
(66, '40', '3', 'ppppppp', '', '424', '210710084024kwitasni.jpg', '2', '6000', ''),
(67, '41', '1', 'tamnu', '', '', '', '1', '0', ''),
(68, '42', '6', 'mohon segera di penuhi', '7', '1', '210807092223kochenk.jpg', '1', '0', ''),
(69, '43', '3', '-', '', '750000', '', '5', '150000', ''),
(70, '44', '4', 'Untuk kelancaran acara', '', '', '', '3', '0', ''),
(71, '45', '3', '', '', '', '', '5', '50000', ''),
(72, '46', '6', '', '5', '', '', '2', '0', 'c'),
(73, '47', '6', '', '7', '', '', '2', '0', ''),
(74, '48', '6', '', '6', '', '', '1', '0', 'tidak ada'),
(75, '49', '2', '', '', '', '', '1', '0', ''),
(76, '50', '6', '', '6', '1', '', '1', '0', ''),
(77, '51', '4', 'tambahan tenaga kerja', '', '', '', '5', '0', ''),
(78, '52', '6', '', '7', '2', '', '2', '0', ''),
(79, '53', '3', 'kosumsi', '', '50000', '210817103349padi.jpg', '30', '100000', ''),
(80, '54', '6', 'tempat acara', '6', '1', '', '1', '0', ''),
(81, '55', '6', '', '2', '100', '', '100', '0', 'kurang'),
(82, '56', '6', '', '2', '1', '', '1', '0', ''),
(83, '57', '6', '', '2', '2', '', '2', '0', ''),
(84, '58', '3', '', '', '', '', '5', '0', ''),
(85, '59', '6', '', '2', '2', '', '2', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `id_bidang` varchar(5) NOT NULL,
  `item` text NOT NULL,
  `keterangan` text NOT NULL,
  `harga_satuan` int(16) NOT NULL,
  `qty` int(5) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `file` text NOT NULL,
  `status` varchar(5) NOT NULL,
  `komentar_kp` text NOT NULL,
  `komentar_bendahara` text NOT NULL,
  `kwitansi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_bidang`, `item`, `keterangan`, `harga_satuan`, `qty`, `jenis`, `file`, `status`, `komentar_kp`, `komentar_bendahara`, `kwitansi`) VALUES
(1, '2', 'STRUKTUR ORGANISASI SMPN ', 'scsd', 12, 21, '', '210710093341STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '1', 'd', 'd', ''),
(2, '2', 'STRUKTUR ORGANISASI SMPN ', 'bla bla bla', 1408, 1, '', '210710094509STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '4', 's', 'sdv', ''),
(4, '2', 'Untuk beli ini dan beli i', 'sss', 56000, 2, 'Sewa', '210710103259STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '0', '', 'sg', ''),
(5, '2', '1212', 'eqweqwqqqqqqqqqqq', 12, 9, 'Sewa', '210710110341STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '0', '', '', ''),
(6, '2', 'Kotak infak', 'karena kotak kami kurang', 50000, 4, 'Beli', '210711100839STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '1', 'ok', '', ''),
(7, '2', 'Kotak lagi', 'eror', 1000, 40, 'Beli', '210711101055STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf', '4', '', 'ok', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_detail_proker` varchar(5) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `qty` int(5) NOT NULL,
  `biaya` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_detail_proker`, `tanggal`, `keterangan`, `qty`, `biaya`) VALUES
(1, '5', '2021-06-17', 'untuk pembeelian untuk acara besar dari proker pengadaan kotak 100 unit', 100, '15000'),
(2, '7', '2021-06-17', 'untuk pembeelian untuk acara besar dari proker pengadaan kotak 100 unit', 20, '10000'),
(3, '', '2021-07-10', 'Pengadaan STRUKTUR ORGANISASI SMPN  oleh Pengumpulan', 1, '1408'),
(4, '', '2021-07-10', 'Pengadaan STRUKTUR ORGANISASI SMPN  oleh Pengumpulan', 1, '1408'),
(5, '', '2021-07-10', 'Pengadaan Untuk beli ini dan beli i oleh Pengumpulan', 2, '56000'),
(6, '', '2021-07-10', 'Pengadaan Untuk beli ini dan beli i oleh Pengumpulan', 2, '56000'),
(7, '', '2021-07-10', 'Pengadaan Untuk beli ini dan beli i oleh Pengumpulan', 2, '56000'),
(8, '', '2021-07-11', 'Pengadaan Kotak lagi oleh Pengumpulan', 40, '1000'),
(9, '26', '2021-07-29', 'Pembelian item Honor panitia', 0, '4000'),
(10, '24', '2021-07-29', 'Pembelian item Makan sisang', 0, '500000'),
(11, '26', '2021-07-29', 'Pembelian item Honor panitia', 0, '60000'),
(12, '35', '2021-07-29', 'Pembayaran Tenda', 0, '111111111'),
(13, '34', '2021-08-07', 'Pembayaran Meja', 0, '0'),
(14, '42', '2021-08-07', 'Pembayaran Transportasi', 0, '1'),
(15, '34', '2021-08-07', 'Pembayaran Meja', 0, '5'),
(16, '42', '2021-08-07', 'Pembayaran Transportasi', 0, '1'),
(17, '27', '2021-08-07', 'Pembayaran Ruangan', 0, '1'),
(18, '28', '2021-08-07', 'Pembayaran Snack', 0, '20'),
(19, '30', '2021-08-07', 'Pembayaran Camera', 0, '1'),
(20, '50', '2021-08-17', 'Pembayaran tenda', 0, '1'),
(21, '55', '2021-08-17', 'Pembayaran kursi', 0, '100'),
(22, '54', '2021-08-17', 'Pembayaran hotel', 0, '1'),
(23, '52', '2021-08-17', 'Pembayaran transportasi', 0, '2'),
(24, '59', '2021-08-17', 'Pembayaran laptop', 0, '2'),
(25, '57', '2021-08-17', 'Pembayaran spanduk', 0, '2'),
(26, '56', '2021-08-17', 'Pembayaran meja', 0, '1'),
(27, '59', '2021-08-17', 'Pembayaran laptop', 0, '2'),
(28, '53', '2021-08-17', 'Pembayaran snack', 0, '50000'),
(29, '31', '2021-08-22', 'Pembayaran Honor Pemateri', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id_pengumpulan` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` decimal(20,0) NOT NULL,
  `file` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `tgl_infaq` date NOT NULL,
  `jam_infaq` varchar(10) NOT NULL,
  `id_muzaki` varchar(5) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumpulan`
--

INSERT INTO `pengumpulan` (`id_pengumpulan`, `jenis`, `nama`, `alamat`, `keterangan`, `jumlah`, `file`, `status`, `tgl_infaq`, `jam_infaq`, `id_muzaki`, `catatan`) VALUES
(3, 'Infaq / Sedekah', '', '', '', '900000', '210517051446sia_diklat.PNG', '1', '2021-05-17', '05:14:00', '', ''),
(4, 'Zakat', '', '', 'Sakat A', '4574634', '210517053647logoandroid.PNG', '2', '2021-05-17', '05:17:00', '', ''),
(5, 'Infaq / Sedekah', '', '', 'Pembayyaran Ini', '800000', '210517054018spp_kemenag.PNG', '2', '2021-05-17', '05:39', '', ''),
(10, 'Zakat', '', '', 'Donasi bulanan Muzaki atas nama Ucok Baba bulan Mei 2021', '60000', '210529104125himasi.jpg', '1', '2021-05-29', '10:41', '3', ''),
(11, 'Dana Lainnya', '', '', 'Donasi bulanan Muzaki atas nama Andika bulan Mei 2021', '90000', '210529104254logoandroid.PNG', '1', '2021-05-29', '10:42', '4', ''),
(12, 'Dana Lainnya', '', '', 'Donasi bulanan Muzaki atas nama Hamid Sss bulan Mei 2021', '5000', '210529104634mapala1.jpg', '2', '2021-05-29', '10:46', '2', ''),
(13, 'Infaq / Sedekah', '', '', 'infak ini lagi', '50000', '210603103447Capture.PNG', '1', '2021-06-03', '10:30', '', ''),
(14, 'Zakat', '', '', 'Donasi bulanan Muzaki atas nama Ucok Baba bulan Juni 2021', '60000', '210603105234Capture.PNG', '0', '2021-06-03', '22:52', '3', ''),
(15, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nAndika ', '50000', '210604083520Capture.PNG', '0', '2021-06-04', '08:35', '4', ''),
(16, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nAndika ', '40000', '210604083704Capture.PNG', '2', '2021-06-04', '08:36', '4', ''),
(17, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nYogi ', '5000000', '210604083718Capture.PNG', '1', '2021-06-04', '08:37', '6', ''),
(18, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nHamid Sss ', '60000', '210604091204Capture.PNG', '1', '2021-06-04', '09:11', '2', ''),
(19, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nUdin penyok ', '9000000', '210604092951Capture.PNG', '1', '2021-06-04', '09:29', '7', ''),
(20, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nHamid Sss ', '500000', '210702120520Capture.PNG', '2', '2021-07-02', '12:04', '2', ''),
(21, 'Infaq / Sedekah', '', '', 'dari situ', '500000', '210711092336kochenk.jpg', '1', '2021-07-11', '09:22', '', ''),
(22, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nUdin penyok ', '50000000', '210711092833kwitasni.jpg', '1', '2021-07-11', '09:28', '7', ''),
(23, 'Infaq / Sedekah', '', '', 'sedekah disana', '50000', '210817095714kochenk.jpg', '0', '2021-08-17', '09:56', '', ''),
(24, 'Infaq / Sedekah', '', '', 'Donasi dari Muzaki \r\nUcok Baba ', '500000', '210817100108padi.jpg', '1', '2021-08-17', '10:00', '3', ''),
(25, 'Infaq / Sedekah', 'qqqqqqqq', 'eeeeeeeeee', 'untuk ini', '4000000', '210827105547kochenk.jpg', '1', '2021-08-27', '10:42', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_pengumpul`
--

CREATE TABLE `petugas_pengumpul` (
  `id_petugas_pengumpul` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas_pengumpul`
--

INSERT INTO `petugas_pengumpul` (`id_petugas_pengumpul`, `nama`, `alamat`, `nohp`, `jenis`) VALUES
(1, 'Hamid  S', 'Maransi City', '000000', 'Dana Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id_proker` int(11) NOT NULL,
  `id_bidang` varchar(5) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `nama_proker` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(2) NOT NULL,
  `catatan` text NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `proposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id_proker`, `id_bidang`, `kategori`, `nama_proker`, `keterangan`, `status`, `catatan`, `tgl`, `jam`, `proposal`) VALUES
(1, '2', 'Diusulkan', 'bukak stand disana', 'ok', '5', '', '', '', ''),
(2, '2', 'Diusulkan', 'Bla bla', ' bla bla bla', '11', '', '2021-06-25', '22:23', ''),
(4, '2', 'Diusulkan', 'beli PC', '10 unit', '2', '', '2021-07-04', '20:10', ''),
(5, '2', 'Diusulkan', 'beli PC', '5', '12', '', '2021-07-04', '20:11', ''),
(7, '2', 'Diusulkan', 'vdsvsd', 'vsdvdsv', '4', '', '2021-07-08', '17:13', '210708051307STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(8, '2', 'Diusulkan', 'berbr', 'trfds', '3', '', '2021-07-08', '17:13', '210708051325STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(9, '2', 'Diusulkan', 'Uji coba terakhir', 'merupakan uji coba yang terakhir sebelum persentasi', '6', '', '2021-07-08', '17:20', '210708052032STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(10, '2', 'Diusulkan', 'Gerai Zakat', 'gerai zakat', '7', '', '2021-07-09', '22:37', '210709103725STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(11, '2', 'Ditentukan', 'Bla', 'bla', '1', '', '2021-07-10', '09:18', '210710091839STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(12, '2', 'Diusulkan', 'Proker rekam video', 'untuk merekam program', '4', '', '2021-07-11', '21:47', '210711094731STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(13, '2', 'Diusulkan', 'AAAA', 'BBB', '12', '', '2021-07-11', '21:53', '210711095354STRUKTUR ORGANISASI SMPN 4 BATANG ANAI.pdf'),
(14, '2', 'Diusulkan', 'sunat masal', 'acara ini sebagai bagian dari proker pengumpulan', '6', '', '2021-08-17', '22:05', '210817100507Rekapitulasi SIMBANGDA Based Evidence Per SKPD Per 31 Juli 2021(1).pdf'),
(15, '2', 'Diusulkan', 'sdfsd', 'fsdfsdfsdf', '0', '', '2021-08-22', '09:41', '210822094120Rekapitulasi SIMBANGDA Based Evidence Per SKPD Per 31 Juli 2021(1).pdf'),
(16, '2', 'Diusulkan', 'sdjccbdsj', 'sdfw ovif', '0', '', '2021-08-24', '22:22', '210824102206Rekapitulasi SIMBANGDA Based Evidence Per SKPD Per 31 Juli 2021(2).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sarana_prasarana`
--

CREATE TABLE `sarana_prasarana` (
  `id_sapras` int(11) NOT NULL,
  `nama_sapras` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarana_prasarana`
--

INSERT INTO `sarana_prasarana` (`id_sapras`, `nama_sapras`, `keterangan`, `stok`) VALUES
(2, 'Kursi', 'untuk acara besar', 110),
(3, 'PC', 'elok', 10),
(4, 'Laptop', '-', 10),
(5, 'Meja', '-', 20),
(6, 'Ruanangan', '-', 1),
(7, 'Mobil', 'Ayla', 1),
(8, 'Pickup', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `id_bidang` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `id_bidang`, `username`, `password`) VALUES
(1, 'Yogi', '', '1', '11', '11'),
(7, 'Febri Andika P', '', '2', '22', '22'),
(8, 'Hamid Septian', '', '3', '33', '33'),
(9, 'Idul', '', '4', '44', '44'),
(10, 'Faisal Maryono', '', '5', '55', '55'),
(11, 'Ghino', '', '6', '66', '66');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `chat_personal`
--
ALTER TABLE `chat_personal`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `detail_proker`
--
ALTER TABLE `detail_proker`
  ADD PRIMARY KEY (`id_detail_proker`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `komentar_proker`
--
ALTER TABLE `komentar_proker`
  ADD PRIMARY KEY (`id_komentar_proker`);

--
-- Indexes for table `kotak_infaq`
--
ALTER TABLE `kotak_infaq`
  ADD PRIMARY KEY (`id_kotak`);

--
-- Indexes for table `laporan_proker`
--
ALTER TABLE `laporan_proker`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `muzaki`
--
ALTER TABLE `muzaki`
  ADD PRIMARY KEY (`id_muzaki`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pendistribusian_proker`
--
ALTER TABLE `pendistribusian_proker`
  ADD PRIMARY KEY (`id_pendistribusian`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id_pengumpulan`);

--
-- Indexes for table `petugas_pengumpul`
--
ALTER TABLE `petugas_pengumpul`
  ADD PRIMARY KEY (`id_petugas_pengumpul`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indexes for table `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  ADD PRIMARY KEY (`id_sapras`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chat_personal`
--
ALTER TABLE `chat_personal`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_proker`
--
ALTER TABLE `detail_proker`
  MODIFY `id_detail_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komentar_proker`
--
ALTER TABLE `komentar_proker`
  MODIFY `id_komentar_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `kotak_infaq`
--
ALTER TABLE `kotak_infaq`
  MODIFY `id_kotak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan_proker`
--
ALTER TABLE `laporan_proker`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `muzaki`
--
ALTER TABLE `muzaki`
  MODIFY `id_muzaki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pendistribusian_proker`
--
ALTER TABLE `pendistribusian_proker`
  MODIFY `id_pendistribusian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `petugas_pengumpul`
--
ALTER TABLE `petugas_pengumpul`
  MODIFY `id_petugas_pengumpul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  MODIFY `id_sapras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
