-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2023 lúc 07:15 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlatm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cayatm`
--

CREATE TABLE `cayatm` (
  `maCay` int(11) NOT NULL,
  `maNH` int(11) NOT NULL,
  `tenCay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kinhDo` double NOT NULL,
  `viDo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cayatm`
--

INSERT INTO `cayatm` (`maCay`, `maNH`, `tenCay`, `diaChi`, `kinhDo`, `viDo`) VALUES
(7, 1, '4 MÁY ATM VIETINBANK', '2QMP+GWX, Đ. Ngô Quyền.', 105.78740813489367, 10.03395557468458),
(8, 4, 'Vietcombank - Atm', '612 Đ. 30 Tháng 4, Hưng Lợi, Ninh Kiều', 105.764128957789, 10.015659910165413),
(9, 4, 'Sense City ATM Vietcombank', '36 Phan Đình Phùng', 105.78599131460894, 10.034538710477474);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duong`
--

CREATE TABLE `duong` (
  `maDuong` int(11) NOT NULL,
  `tenDuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duong_px`
--

CREATE TABLE `duong_px` (
  `maDuong` int(11) NOT NULL,
  `maPX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucphi`
--

CREATE TABLE `mucphi` (
  `mucphi` int(11) NOT NULL,
  `maNH1` int(11) NOT NULL,
  `maNH2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhang`
--

CREATE TABLE `nganhang` (
  `maNH` int(11) NOT NULL,
  `tenNH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soNha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kinhDo` double NOT NULL,
  `viDo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhang`
--

INSERT INTO `nganhang` (`maNH`, `tenNH`, `soNha`, `kinhDo`, `viDo`) VALUES
(1, 'Vietinbank', '2QF Ba Tháng Hai, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', 105.76641845703125, 10.023510932922363),
(2, 'TPBank', '135 Đ. Trần Hưng Đạo, An Phú, Ninh Kiều, Cần Thơ 270000, Việt Nam', 105.77552032470703, 10.035680770874023),
(3, 'Navibank', '28 Hùng Vương, An Hội, Ninh Kiều, Cần Thơ, Việt Nam', 105.77877807617188, 10.045315742492676),
(4, 'Vietcombank', '420-420A Đ. 30 Tháng 4, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', 105.7691650390625, 10.021735191345215),
(5, 'Sacombank', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_gd`
--

CREATE TABLE `phong_gd` (
  `maPhong` int(11) NOT NULL,
  `maNH` int(11) NOT NULL,
  `maDuong` int(11) NOT NULL,
  `diaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenPhong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kinhDo` double NOT NULL,
  `viDo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_gd`
--

INSERT INTO `phong_gd` (`maPhong`, `maNH`, `maDuong`, `diaChi`, `tenPhong`, `kinhDo`, `viDo`) VALUES
(7, 5, 0, '168C Ba Tháng Hai, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam', 'Sacombank Ngân Hàng TMCP Sài Gòn Thương Tín - Chi Nhánh Cần Thơ', 105.7677230834961, 10.025291442871094),
(8, 4, 0, '2Q5P+283, Hưng Phú, Cái Răng, Cần Thơ, Việt Nam', 'Vietcombank Cần Thơ - PGD Nam Cần Thơ', 105.78582000732422, 10.00759506225586);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongxa`
--

CREATE TABLE `phuongxa` (
  `maPX` int(11) NOT NULL,
  `maQH` int(11) NOT NULL,
  `tenPX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `maQH` int(11) NOT NULL,
  `tenQH` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cayatm`
--
ALTER TABLE `cayatm`
  ADD PRIMARY KEY (`maCay`),
  ADD KEY `fk_nh2` (`maNH`);

--
-- Chỉ mục cho bảng `duong`
--
ALTER TABLE `duong`
  ADD PRIMARY KEY (`maDuong`);

--
-- Chỉ mục cho bảng `duong_px`
--
ALTER TABLE `duong_px`
  ADD PRIMARY KEY (`maDuong`,`maPX`);

--
-- Chỉ mục cho bảng `mucphi`
--
ALTER TABLE `mucphi`
  ADD PRIMARY KEY (`maNH1`,`maNH2`),
  ADD KEY `maNH2` (`maNH2`);

--
-- Chỉ mục cho bảng `nganhang`
--
ALTER TABLE `nganhang`
  ADD PRIMARY KEY (`maNH`);

--
-- Chỉ mục cho bảng `phong_gd`
--
ALTER TABLE `phong_gd`
  ADD PRIMARY KEY (`maPhong`),
  ADD KEY `fk_nh_pgd` (`maNH`);

--
-- Chỉ mục cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  ADD PRIMARY KEY (`maPX`),
  ADD KEY `fk_qh` (`maQH`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`maQH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cayatm`
--
ALTER TABLE `cayatm`
  MODIFY `maCay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `duong`
--
ALTER TABLE `duong`
  MODIFY `maDuong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nganhang`
--
ALTER TABLE `nganhang`
  MODIFY `maNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phong_gd`
--
ALTER TABLE `phong_gd`
  MODIFY `maPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  MODIFY `maPX` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `maQH` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cayatm`
--
ALTER TABLE `cayatm`
  ADD CONSTRAINT `fk_nh` FOREIGN KEY (`maNH`) REFERENCES `nganhang` (`maNH`),
  ADD CONSTRAINT `fk_nh2` FOREIGN KEY (`maNH`) REFERENCES `nganhang` (`maNH`);

--
-- Các ràng buộc cho bảng `duong_px`
--
ALTER TABLE `duong_px`
  ADD CONSTRAINT `fk_dg` FOREIGN KEY (`maDuong`) REFERENCES `duong` (`maDuong`),
  ADD CONSTRAINT `fk_px` FOREIGN KEY (`maPX`) REFERENCES `phuongxa` (`maPX`);

--
-- Các ràng buộc cho bảng `mucphi`
--
ALTER TABLE `mucphi`
  ADD CONSTRAINT `mucphi_ibfk_1` FOREIGN KEY (`maNH1`) REFERENCES `nganhang` (`maNH`),
  ADD CONSTRAINT `mucphi_ibfk_2` FOREIGN KEY (`maNH2`) REFERENCES `nganhang` (`maNH`);

--
-- Các ràng buộc cho bảng `phong_gd`
--
ALTER TABLE `phong_gd`
  ADD CONSTRAINT `fk_nh_pgd` FOREIGN KEY (`maNH`) REFERENCES `nganhang` (`maNH`);

--
-- Các ràng buộc cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  ADD CONSTRAINT `fk_qh` FOREIGN KEY (`maQH`) REFERENCES `quanhuyen` (`maQH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
