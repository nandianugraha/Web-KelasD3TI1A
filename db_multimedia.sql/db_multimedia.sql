-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2011 at 06:36 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_multimedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `kelamin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `kelamin`, `user`, `password`) VALUES
(1, 'Agus Sumarna', 'sumarna@yahoo.com', 'pria', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Siera Nevada', 'siera@yahoo.com', 'Wanita', 'siera', '47c0abc24dd9c450577173afdd173d64');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_brt` int(3) NOT NULL AUTO_INCREMENT,
  `tgl` datetime NOT NULL,
  `penulis` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `head` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_brt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_brt`, `tgl`, `penulis`, `head`, `isi`, `gambar`) VALUES
(45, '2010-03-18 19:02:55', 'Agus', 'Sejarah Rahasia Kucing Persia', '<p class="MsoNormal" style="text-align: justify; line-height: 150%;"><span style="font-family: arial,helvetica,sans-serif;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: small; color: #000000;"> </span></span></span><span style="font-size: small; font-family: arial,helvetica,sans-serif; color: #000000;">Apa yang pertama kali anda pikirkan saat mendengarkan kucing persia. </span><span style="text-decoration: none; font-size: small; font-family: arial,helvetica,sans-serif; color: #000000;">Jika anda penggemar kucing</span><span style="font-size: small; font-family: arial,helvetica,sans-serif; color: #000000;"> pasti terbayang kucing yang cantik dan harganya mahal. Hmmm..sama saya juga dulu mungkin akan ngomong begitu. Walau sekarang tidak lagi. Ok berikut penjelasan singkat tentang sejarahnya. Jangan kecewa YA!</span></p>\r\n<p class="MsoNormal" style="text-align: justify; line-height: 150%;"><span style="font-size: small; font-family: arial,helvetica,sans-serif; color: #000000;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Awal mula terjadinya atau persilangan apa dari apakah kucing persia itu? sebenarnya tidak ada yang tahu. Masih misteri! Tapi menurut berita para pelaut, <span style="text-decoration: none;">kucing</span> ini muncul pada tahun 1500-an. Konon katanya, ras ini lahir hasil persilangan kucing anggora dengan kucing bulu panjang yang sudah kemungkinan punah yang berasal dari arab. Namun tidak sedikit yang bilang itu adalah kucing persilangan dari berbagai kucing di penjuru eropa.</span></p>\r\n<p class="MsoNormal" style="text-align: justify; line-height: 150%;"><span style="font-size: small; font-family: arial,helvetica,sans-serif; color: #000000;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Bahkan ada yang mengatakan itu dari Allien, hmm&hellip;.yang benar saja! Yah hanya itu informasi yang diketahui tentang asal muasalnya. Tapi yang paling memungkinkan adalah persilangan dari kucing anggora itu Nah, Lalu pada 1500an muncul pameran pemacakan kucing yang rame di Inggris. Sebenarnya tidak hanya di Negara ratu Elizabeth ini, namun mungkin di seluruh penjuru eropa. Tapi yang paling populer ya di inggris. Nah disanalah kemungkinan besar kucing persia pertama kali di kenal secara luas.</span></p>', './admin/gambar/kucing-persia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `tgl` datetime NOT NULL,
  `jml` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`tgl`, `jml`) VALUES
('2011-11-21 05:57:18', 785);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photo`
--

CREATE TABLE IF NOT EXISTS `gallery_photo` (
  `id_photo` int(4) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `gallery_photo`
--

INSERT INTO `gallery_photo` (`id_photo`, `gambar`, `keterangan`, `tanggal`) VALUES
(44, './admin/gallery_photo/cute cat.jpg', 'Imut', '2010-03-19 01:14:46'),
(45, './admin/gallery_photo/c12.jpg', 'Kucing Hamil', '2010-03-26 15:11:58'),
(43, './admin/gallery_photo/39580.gif', 'SSSsssttt...lagi Bobo. Jangan Di Ganggu...hehe', '2010-03-18 20:06:45'),
(38, './admin/gallery_photo/kucing-persia.jpg', 'woowww...keyeeen', '2010-03-16 15:58:23'),
(39, './admin/gallery_photo/38275.gif', 'Mpuus nya abiz mandi', '2010-03-16 15:58:09'),
(40, './admin/gallery_photo/gambarkucing.jpg', 'Meeooong....', '2010-03-16 15:57:56'),
(41, './admin/gallery_photo/Kapten.jpg', 'Kucing kapten...heheh', '2010-03-16 15:57:46'),
(42, './admin/gallery_photo/cat in scuba suit.jpg', 'Meong Nya Mau Nyelam Dulu Yach Cari Ikan Di Akuarium...hehehe', '2010-03-18 20:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_video`
--

CREATE TABLE IF NOT EXISTS `gallery_video` (
  `id_video` int(3) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `video` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `ukuran` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `gallery_video`
--

INSERT INTO `gallery_video` (`id_video`, `thumbnail`, `video`, `keterangan`, `ukuran`, `tanggal`) VALUES
(51, './admin/thumbnail/leptop.jpg', './admin/gallery_video/Funny cat water.flv', 'Video Kucing Mandi Di Kran', '13040132', '2010-03-25 18:17:24'),
(50, './admin/thumbnail/LaughingCat.jpg', './admin/gallery_video/Funny Cat Really.flv', 'Kumpulan Video Kucing Lucu', '8335305', '2010-03-25 18:16:30'),
(48, './admin/thumbnail/cat-brush.jpg', './admin/gallery_video/HappyBirthday.flv', 'Video kucing ulang tahun', '524140', '2010-03-25 18:14:31'),
(49, './admin/thumbnail/cat_guitar.jpg', './admin/gallery_video/funny surprised cat.flv', 'Video Kucing Terkejut', '740260', '2010-03-25 18:14:57'),
(55, './admin/img/preview.jpg', './admin/gallery_video/robocat.flv', 'Video robot kucing', '1288645', '2010-03-26 15:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
  `id_shout` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `web` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `waktu` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_shout`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=94 ;

--
-- Dumping data for table `shoutbox`
--

INSERT INTO `shoutbox` (`id_shout`, `nama`, `web`, `pesan`, `waktu`) VALUES
(87, 'Ayu Puspitasari', 'http://ri32.wordpress.com', 'kang agus kamana wae yeuuh...hehee', '2010-03-18 20:00:18'),
(88, 'Nindya Asih', 'http://ri32.wordpress.com', 'Numpang lewat aaah...', '2010-03-18 20:00:56'),
(86, 'Naila Larasati', 'http://ri32.wordpress.com', 'Agus...apa kabar nech?', '2010-03-18 19:59:29'),
(85, 'Pathona Destri Yhana', 'http://ri32.wordpress.com', 'haii say...semangat yach :). ntar kita ke gramed lagi yuuk', '2010-03-18 19:58:59'),
(89, 'Wahyu Manda Sari', 'http://ri32.wordpress.com', 'awak kengen nech', '2010-03-18 20:01:26'),
(90, 'Heti Purnamawati', 'http://labhouse.co.cc', 'gus jangan lupa sholat yach :)', '2010-03-18 20:02:06'),
(91, 'Dinda Anastasya', 'http://labhouse.co.cc', 'Agusss...jeleek :p', '2010-03-18 20:03:25'),
(92, 'Aisyah ', 'http://ri32.wordpress.com', 'Assalamualaikum kak Agus...apa kabarnya kak?', '2010-03-18 20:04:34'),
(93, 'Erna', 'http://erna.com', 'haloo', '2010-03-19 01:15:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
