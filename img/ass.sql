-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 10:59 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass`
--

-- --------------------------------------------------------

--
-- Table structure for table `hdct`
--

CREATE TABLE `hdct` (
  `id_hdct` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `id_hd` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `id_sp` int(11) DEFAULT NULL,
  `sl` int(100) NOT NULL,
  `gia` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `hdct`
--

INSERT INTO `hdct` (`id_hdct`, `id_hd`, `id_sp`, `sl`, `gia`) VALUES
('1', '1', 10, 1, 100000),
('2', '1', 9, 6, 10),
('3', '2', 10, 1, 100000),
('4', '2', 9, 1, 10),
('5', '3', 10, 1, 100000),
('6', '3', 9, 1, 10),
('7', '4', 10, 7, 100000),
('8', '4', 9, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `id_kh` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `ngaymua` date DEFAULT NULL,
  `note` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `tong` int(100) NOT NULL,
  `id_trangthai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `id_kh`, `ngaymua`, `note`, `tong`, `id_trangthai`) VALUES
('1', '7', '2018-08-09', 'ưewqeqwe', 100060, 3),
('2', '7', '2018-08-09', 'ưqewqeqwe', 100010, 3),
('3', '7', '2018-08-09', 'ưqewqeqwe', 100010, 3),
('4', '1', '2018-08-10', 'ewwqeqwewqeqw', 700090, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `tenkh` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `sdt` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `email` varchar(15) COLLATE utf32_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `tenkh`, `diachi`, `sdt`, `email`, `pass`) VALUES
('1', 'dien', 'áafsaf', '123', 'dienntph06483@f', '202cb962ac59075b964b07152d234b70'),
('2', 'Thúy', 'afasfasfas', '12345', 'diennt@gmail.co', '827ccb0eea8a706c4c34a16891f84e7b'),
('3', 'Dien', 'efewfsdfsdf', '0123', 'dienntph06483@f', 'eb62f6b9306db575c2d596b1279627a4'),
('4', 'Thúy', 'dsdsad', '12345', 'dienntph06483@f', '827ccb0eea8a706c4c34a16891f84e7b'),
('5', 'Thúy', 'sadsadsadsadsad', '12345', 'dienntph06483@f', '827ccb0eea8a706c4c34a16891f84e7b'),
('6', '21213', '1', '1', 'dienntph06483@f', 'c4ca4238a0b923820dcc509a6f75849b'),
('7', '1', 'rewrewrew', 'thedien', 'diennt@gmail.co', 'dbcc258b69ac2ee21848dbdb9ce03cb2'),
('8', 'Thúy', 'wqw', '12345', 'diennt@gmail.co', '52ec538941f82416e7ce1caf283a765f'),
('9', '1a', '1', '1', '1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id_loaisp` int(100) NOT NULL,
  `tenloaisp` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id_loaisp`, `tenloaisp`) VALUES
(1, 'Nước giải khát'),
(2, 'Bia'),
(3, 'Rượu'),
(4, 'Nước ngọt'),
(5, 'Nước trái cây'),
(6, 'Cafe'),
(7, 'Trà đá');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(100) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_loaisp` int(100) NOT NULL,
  `chitiet` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sl` int(100) NOT NULL,
  `gia` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `tensp`, `hinhanh`, `id_loaisp`, `chitiet`, `sl`, `gia`) VALUES
(1, 'Nước mía', 'anh1.jpg', 4, '<p><strong><em>Nước m&iacute;a rất l&agrave; ngon vậy h&atilde;y đến với ch&uacute;ng t&ocirc;i nha nha nha</em></strong></p>\r\n', 300, 3000),
(2, 'Bia mát', 'anh0.jpg', 5, 'Các bạn phải đến với chúng tôi nhất định phải đến với chúng tôi đấy', 109, 200),
(3, 'Bia đá', 'anh2.jpg', 6, 'Bia đá rất mátvì vậy đến với chúng tôi', 150, 150),
(4, 'Bia đá', 'hinh-anh-sexy-15.jpg', 7, 'Bia đá rất mát giải khát cho mùa hè nóng bức vì vậy hãy đến với công ty của chúng tôi', 150, 10000),
(6, 'Bia đá1', 'anh dep hinh nen 1.jpg', 3, 'Hãy đến với chúng tôi nha nha', 200, 10000),
(7, 'Bia đá', 'anh0.jpg', 4, 'Nước mía ngon lắm hãy đến uống ở cửa hàng chúng tôi', 150, 1000000),
(8, 'Bia đá', 'secret-garden-da-lat.jpg', 4, 'Nước mía ngon lắm phải không ạ vậy hãy đến với chúng tôi', 212, 50),
(9, 'Bia đá', 'anh0.jpg', 2, 'adasdsadsa', 274, 10),
(10, 'Bia mát', 'photo-2-1497930230363-0-0-496-800-crop-1497930470492.jpg', 5, 'Nước rất là ngon vì vậy hãy uống thật nhiều và đến cửa hàng của chúng tôi', 100, 100000),
(11, 'Bia đá', 'anh2.jpg', 4, 'Mua hang de', 250, 10),
(12, 'Bia đá', 'anh dep hinh nen 1.jpg', 4, '<p><strong><em>wqewqewqewqe</em></strong></p>\r\n', 150, 10),
(13, 'wqewqe', 'anh0.jpg', 3, '<p><strong>weqweqwewqeqw</strong></p>\r\n', 200, 20000),
(14, 'sadasdasd', '31695912_221903751899942_8465146305784578048_n.jpg', 4, '<p><strong>sadsdsadsadsad</strong></p>', 150, 10);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(100) NOT NULL,
  `tenslide` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `tenslide`) VALUES
(1, 'anhslide0.jpg'),
(2, 'anhslide1.jpg'),
(3, 'anhslide2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `id_trangthai` int(100) NOT NULL,
  `trangthai` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`id_trangthai`, `trangthai`) VALUES
(1, 'Chưa thanh toán'),
(2, 'Đang giao hàng'),
(3, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phanquyen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `phanquyen`) VALUES
(1, 'dien', '52ec538941f82416e7ce1caf283a765f', 1),
(2, 'the12', '38dac77cae03c0100cd41bbaf07c053e', 0),
(3, 'thedien', '13aab48a27e0c385f90f5b168ef923e9', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hdct`
--
ALTER TABLE `hdct`
  ADD PRIMARY KEY (`id_hdct`),
  ADD KEY `FK_hdct_hoadon` (`id_hd`),
  ADD KEY `FK_hdct_sanpham` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `FK_hoadon_khachhang` (`id_kh`),
  ADD KEY `id_trangthai` (`id_trangthai`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id_trangthai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id_loaisp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `id_trangthai` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hdct`
--
ALTER TABLE `hdct`
  ADD CONSTRAINT `FK_hdct_hoadon` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`),
  ADD CONSTRAINT `FK_hdct_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_hoadon_khachhang` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`),
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_trangthai`) REFERENCES `trangthai` (`id_trangthai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
