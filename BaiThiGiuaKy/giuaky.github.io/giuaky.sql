-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2021 lúc 11:21 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giuaky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `id_bomon` int(12) NOT NULL,
  `ten_bomon` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `id_khoa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`id_bomon`, `ten_bomon`, `id_khoa`) VALUES
(1, 'Toán', 1),
(2, 'Lập trình Java', 1),
(4, 'Học máy', 3),
(5, 'Cơ sở dữ liệu ', 1),
(7, 'Lập trình Mobile', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `can_bo`
--

CREATE TABLE `can_bo` (
  `id_canbo` int(12) NOT NULL,
  `ho_ten` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `chuc_vu` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `dt_coquan` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `dt_canhan` int(11) NOT NULL,
  `id_bomon` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `can_bo`
--

INSERT INTO `can_bo` (`id_canbo`, `ho_ten`, `chuc_vu`, `dt_coquan`, `email`, `dt_canhan`, `id_bomon`) VALUES
(1, 'Nguyễn Thanh Tùng', 'Trưởng khoa', 1249812, 'tung@edu.vn', 12414551, 1),
(2, 'Nguyễn Thị Thu Phương', 'Phó Khoa', 1249812, 'tung@edu.vn', 12414551, 1),
(3, 'Nguyễn Khánh Linh', 'Trợ lý Khoa', 1249812, 'tung@edu.vn', 12414551, 1),
(4, 'Nguyễn Hữu Thắng', 'Trợ lý Khoa', 1249812, 'tung@edu.vn', 12414551, 2),
(5, 'Nguyễn Hữu Thọ', 'Trưởng bộ môn', 1249812, 'tung@edu.vn', 12414551, 2),
(6, 'Vũ Văn Duy', 'Nhân viên', 21414898, 'duy@edu.vn', 1521351, 1),
(7, 'Nguyễn Hữu Thắng', 'Phó khoa', 1242451, 'thang@edu.vn', 12415, 1),
(8, 'Vũ Văn Đức', 'Trưởng khoa', 1241512, 'duc@edu.vn', 15215123, 4),
(9, 'Nguyễ Minh Chiều', 'Phó Khoa ', 1241521, 'chieu@gmail.com', 14515121, 4),
(10, 'Bùi Trung Đức', 'Trợ lý khoa', 21414898, 'thang@edu.vn', 15215123, 5),
(11, 'Lê Văn Đức', 'Phó khoa', 1241251, 'duy@edu.vn', 1521351, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(12) NOT NULL,
  `ten_khoa` varchar(30) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `ten_khoa`) VALUES
(1, 'Công nghệ thông tin'),
(3, 'Trí tuệ nhân tạo'),
(10, 'Công nghệ phần mềm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `name_user` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `pass_user` varchar(30) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `pass_user`) VALUES
(1, 'admin', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`id_bomon`),
  ADD KEY `id_khoa` (`id_khoa`);

--
-- Chỉ mục cho bảng `can_bo`
--
ALTER TABLE `can_bo`
  ADD PRIMARY KEY (`id_canbo`),
  ADD KEY `id_bomon` (`id_bomon`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `id_bomon` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `can_bo`
--
ALTER TABLE `can_bo`
  MODIFY `id_canbo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD CONSTRAINT `id_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`);

--
-- Các ràng buộc cho bảng `can_bo`
--
ALTER TABLE `can_bo`
  ADD CONSTRAINT `id_bomon` FOREIGN KEY (`id_bomon`) REFERENCES `bomon` (`id_bomon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
