-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3309
-- Thời gian đã tạo: Th12 20, 2023 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `suruchi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `stt` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `stt`) VALUES
(1, 'Hải Sản', 'rau-muc-nhap-khau-dong-lanh-450-550g-202312151112068127.webp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `old_price` int(10) NOT NULL DEFAULT 0,
  `img` varchar(200) NOT NULL,
  `describe1` text NOT NULL,
  `describe2` text NOT NULL,
  `view` int(10) NOT NULL,
  `bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `new` tinyint(1) NOT NULL DEFAULT 0,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `iddm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `old_price`, `img`, `describe1`, `describe2`, `view`, `bestseller`, `new`, `hot`, `iddm`) VALUES
(1, 'Râu mực nhập khẩu đông lạnh 450-550g', 189000, 225000, 'rau-muc-nhap-khau-dong-lanh-450-550g-202312151112068127.webp', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 54, 0, 1, 1, 1),
(47, 'Râu mực  ', 189000, 225000, 'rau-muc-nhap-khau-dong-lanh-450-550g-202312151112068127.webp', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 54, 0, 1, 1, 1),
(48, 'Râu mực nhập khẩu đông lạnh 450-550g', 189000, 225000, 'rau-muc-nhap-khau-dong-lanh-450-550g-202312151112068127.webp', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 54, 0, 1, 1, 1),
(49, 'Râu mực  ', 189000, 225000, 'rau-muc-nhap-khau-dong-lanh-450-550g-202312151112068127.webp', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 'Râu mực tươi ngon, có vị dai giòn, sật sật ăn đã miệng vô cùng. Râu mực là hải sản tạo nên nhiều món ăn thơm ngon vô cùng, được các bà nội trợ ưa chuộng và tin dùng, dùng làm nguyên liệu cho bữa ăn của cả nhà', 54, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `img`, `address`, `email`, `sdt`, `role`) VALUES
(14, 'nghia', '123', 'Nguyễn Hữu Nghĩa', 'Minions-1657511850-1187-1657511889.jpg', '209 QL13, phường 26, Q.Bình Thạnh, TP.HCM', 'nguyenhuunghia089@gmail.com', '0377318275', 1),
(17, 'minhthu', '123', 'Phan Thị Minh Thư', 'imager_65419.jpg', '', 'thuptmps27457@fpt.edu.vn', '', 1),
(18, 'ngoctran', '123', '', 'avatar.png', NULL, 'tranntnps26576@fpt.edu.vn', NULL, 1),
(19, 'huynh', '123', '', 'avatar.png', NULL, 'huynhnps27711@fpt.edu.vn', NULL, 1),
(20, 'duong', '123', '', 'avatar.png', NULL, 'duongtmps27840@fpt.edu.vn', NULL, 1),
(21, 'phat', '123', '', 'avatar.png', NULL, 'phathntps27741@fpt.edu.vn', NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dm_sp` (`iddm`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_dm_sp` FOREIGN KEY (`iddm`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
