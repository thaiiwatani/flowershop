-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2017 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shophoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `user`, `pass`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuchoa`
--

CREATE TABLE `danhmuchoa` (
  `idDM` int(11) NOT NULL,
  `tenDM` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `ghichu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `danhmuchoa`
--

INSERT INTO `danhmuchoa` (`idDM`, `tenDM`, `stt`, `trangthai`, `ghichu`) VALUES
(9, 'Hoa Tươi ngày Valentine', 4, 1, 'Hoa ngày tình nhân'),
(7, 'Hoa sinh nhật', 2, 1, 'Hoa ngày sinh nhật'),
(8, 'Hoa văn phòng', 3, 1, 'Hoa gửi văn phòng'),
(6, 'Hoa cưới', 1, 1, 'Hoa ngày cưới'),
(10, 'Hoa tươi ngày 8-3', 5, 1, 'Hoa ngày quốc tế phụ nữ'),
(11, 'Hoa cắm giỏ', 7, 1, 'Hoa cắm giỏ'),
(12, 'Hoa Tươi ngày 20-10', 8, 1, 'Phục vụ ngày phụ nữ Việt Nam'),
(13, '`日本のはな', 2, 1, '日本のはな\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa`
--

CREATE TABLE `hoa` (
  `idhoa` int(11) NOT NULL,
  `tenhoa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idDM` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `chitiet` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoa`
--

INSERT INTO `hoa` (`idhoa`, `tenhoa`, `idDM`, `dongia`, `trangthai`, `chitiet`, `hinhanh`) VALUES
(1, 'Hoa bó', 9, 400000, 1, 'Gồm 20 bông hoa hồng', '1333538711.jpg'),
(2, 'Hoa tặng mẹ', 10, 200000, 1, 'Hoa dành tặng mẹ', '1333594982.jpg'),
(3, 'Lãng hoa sinh nhật', 7, 500000, 1, 'Hồng đỏ kết hợp với bi trắng tạo nên 1 món quà sinh nhật thật ý nghĩa dành cho người thân và bạn bè.', '1333595482.jpg'),
(4, 'Hoa cúc sinh nhật', 7, 300000, 1, 'Cầu cúc - đồng tiền mang lại sự may mắn cho người nhận.', '1333595879.jpg'),
(5, 'Hoa sinh nhật hồng, ly', 7, 400000, 1, 'Hoa Hồng, Lily Bách Hợp', '1333596553.jpg'),
(8, 'Văn phòng', 8, 400000, 1, 'Hoa tươi văn phòng , mỗi tuần là một kiểu dáng mới và màu sắc khác nhau ( giá trên không bao gồm bìn', '1333599244.jpg'),
(7, 'Văn phòng 02', 8, 250000, 1, 'Hồng,đồng tiền,cẩm chướng,búp sen...(không bao gồm bình hoa)', '1333596907.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idHD` int(11) NOT NULL,
  `idKH` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` datetime NOT NULL,
  `dongia` float NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thanhtoan` bit(1) NOT NULL,
  `idkhuyenmai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `idHD` int(11) NOT NULL,
  `idhoa` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idKH` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `idkhuyenmai` int(11) NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `chietkhau` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `idtintuc` int(11) NOT NULL,
  `tieude` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `username` (`user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Chỉ mục cho bảng `danhmuchoa`
--
ALTER TABLE `danhmuchoa`
  ADD PRIMARY KEY (`idDM`),
  ADD UNIQUE KEY `tenDM` (`tenDM`),
  ADD KEY `STT` (`stt`);

--
-- Chỉ mục cho bảng `hoa`
--
ALTER TABLE `hoa`
  ADD PRIMARY KEY (`idhoa`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idHD`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`idHD`,`idhoa`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idKH`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `user_2` (`user`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`idkhuyenmai`),
  ADD UNIQUE KEY `hinhanh` (`hinhanh`),
  ADD UNIQUE KEY `hinhanh_2` (`hinhanh`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idtintuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `danhmuchoa`
--
ALTER TABLE `danhmuchoa`
  MODIFY `idDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `hoa`
--
ALTER TABLE `hoa`
  MODIFY `idhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idKH` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `idkhuyenmai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idtintuc` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
