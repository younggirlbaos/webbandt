-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 11:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dt`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
`h_ma` int(5) NOT NULL,
  `h_ngayban` date DEFAULT NULL,
  `n_ma` int(5) DEFAULT NULL,
  `k_ma` int(5) DEFAULT NULL,
  `s_ma` int(5) DEFAULT NULL,
  `h_gia` int(10) DEFAULT NULL,
  `h_soluong` int(5) DEFAULT NULL,
  `h_thantien` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
`k_ma` int(5) NOT NULL,
  `k_hoTen` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `k_email` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `k_matKhau` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `k_sdt` text COLLATE utf8_vietnamese_ci,
  `k_diachi` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE IF NOT EXISTS `mathang` (
`m_ma` int(5) NOT NULL,
  `m_name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`m_ma`, `m_name`) VALUES
(1, 'Ä‘iá»‡n thoáº¡i'),
(2, 'laptop'),
(3, 'Phá»¥ kiá»‡n'),
(4, 'mÃ¡y áº£nh');

-- --------------------------------------------------------

--
-- Table structure for table `nhanhieu`
--

CREATE TABLE IF NOT EXISTS `nhanhieu` (
`nh_ma` int(5) NOT NULL,
  `nh_name` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhanhieu`
--

INSERT INTO `nhanhieu` (`nh_ma`, `nh_name`) VALUES
(1, 'samsung'),
(2, 'iphone'),
(3, 'lenovo'),
(4, 'vivo'),
(5, 'huawei'),
(6, 'sony'),
(7, 'canon'),
(8, 'msi'),
(9, 'acer'),
(10, 'xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE IF NOT EXISTS `nhanvien` (
`n_ma` int(5) NOT NULL,
  `n_hoTen` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `n_gioiTinh` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `n_ngaySinh` date DEFAULT NULL,
  `n_diachi` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `n_sdt` text COLLATE utf8_vietnamese_ci,
  `n_username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `n_password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `n_chucvu` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`n_ma`, `n_hoTen`, `n_gioiTinh`, `n_ngaySinh`, `n_diachi`, `n_sdt`, `n_username`, `n_password`, `n_chucvu`) VALUES
(1, 'nopd', 'nam', '2002-01-13', 'quy nhon', '2222222', 'nopd', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
`s_ma` int(5) NOT NULL,
  `s_ten` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `s_hinh` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `s_mathang` int(5) DEFAULT NULL,
  `s_nhanhieu` int(5) NOT NULL,
  `s_gia` int(10) DEFAULT NULL,
  `s_soluong` int(5) DEFAULT NULL,
  `s_mota` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`s_ma`, `s_ten`, `s_hinh`, `s_mathang`, `s_nhanhieu`, `s_gia`, `s_soluong`, `s_mota`) VALUES
(13, 'Iphone 13 pro', 'image-removebg-preview-15.png', 1, 2, 25000000, 10, ''),
(14, 'iphone 13 ', 'iphone-13-pink-select-2021.webp', 1, 2, 18000000, 10, ''),
(15, 'Macbook pro 13 inch', 'MacBookPro-2020-M1-SpaceGray.jpg', 2, 2, 30000000, 10, ''),
(16, 'Sony a7 iv', 'sony-alpha-a7m4.jpg', 4, 6, 40000000, 5, ''),
(17, 'airpod pro', 'Tai nghe Apple AirPods Pro.png', 3, 2, 3000000, 20, ''),
(18, 'Samsung galaxy s22 ultra', 'samsung_galaxy_s22_ultra_-_black_721a96a9cea54cc3be0ffa7fe2e14b0f.webp', 1, 1, 24000000, 10, ''),
(19, 'samsung s22+', 'image-removebg-preview-7.png', 1, 1, 17000000, 10, ''),
(20, 'Huawei p50', 'huawei-p50-pro-extra.webp', 1, 5, 23000000, 10, ''),
(21, 'MSI gf75', '30959_laptop_msi_gf75_thin_9rcx_432vn_1.jpg', 2, 8, 27000000, 5, ''),
(22, 'Canon m50', 'canon-eos-m50-kit-1545mm-den(2).jpg', 4, 7, 20000000, 7, ''),
(23, 'Acer nitro 5', '2086_laptopaz_acer_eagle_an515_57_1.jpg', 2, 9, 18000000, 7, ''),
(24, 'Airpod 3', 'image-removebg-preview_637702417485579178.png', 3, 2, 29000000, 5, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
 ADD PRIMARY KEY (`h_ma`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
 ADD PRIMARY KEY (`k_ma`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
 ADD PRIMARY KEY (`m_ma`);

--
-- Indexes for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
 ADD PRIMARY KEY (`nh_ma`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
 ADD PRIMARY KEY (`n_ma`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
 ADD PRIMARY KEY (`s_ma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
MODIFY `h_ma` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
MODIFY `k_ma` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
MODIFY `m_ma` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
MODIFY `nh_ma` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
MODIFY `n_ma` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
MODIFY `s_ma` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
