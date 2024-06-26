-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost: 3306
-- Thời gian đã tạo: Th6 26, 2024 lúc 06:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `iddonhang` int(100) NOT NULL,
  `iduser` int(100) NOT NULL,
  `idsp` int(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `iddonhang`, `iduser`, `idsp`, `soluong`) VALUES
(220, 198, 23, 4, 1),
(221, 199, 23, 28, 1),
(222, 199, 23, 5, 4),
(223, 200, 30, 7, 1),
(224, 201, 30, 99, 1),
(225, 201, 30, 92, 1),
(226, 201, 30, 7, 1),
(227, 202, 21, 129, 1),
(228, 203, 21, 129, 1),
(229, 204, 21, 129, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Váy đầm'),
(2, 'Áo nữ'),
(3, 'Quần nữ'),
(4, 'Áo khoác nữ'),
(14, 'Yếm'),
(15, 'Phụ kiện'),
(16, 'Áo dài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `iduser` int(100) NOT NULL,
  `tongtien` int(100) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `ngaymua` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diachi` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `iduser`, `tongtien`, `trangthai`, `ngaymua`, `diachi`, `sdt`) VALUES
(197, 30, 230, 'Đã thanh toán', '2024-06-22 09:07:40', 'Gia Lai', '987679876'),
(198, 23, 598, 'Đã thanh toán', '2024-06-22 13:03:48', 'Vân Canh - Quy Nhơn - Bình Định', '877676845'),
(199, 23, 1295, 'Đã thanh toán', '2024-06-22 13:06:57', 'Vân Canh - Quy Nhơn - Bình Định', '877676845'),
(200, 30, 200, 'Đã thanh toán', '2024-06-22 13:08:06', 'Gia Lai', '987679876'),
(201, 30, 919, 'Đã thanh toán', '2024-06-26 13:59:43', 'Gia Lai', '987679876'),
(202, 21, 100, 'Đã thanh toán', '2024-06-26 15:08:58', 'Quy Nhơn - Bình Định', '123456789'),
(203, 21, 100, 'Đã thanh toán', '2024-06-26 15:09:15', 'Quy Nhơn - Bình Định', '123456789'),
(204, 21, 100, 'Đã thanh toán', '2024-06-26 15:09:42', 'Quy Nhơn - Bình Định', '123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `giasp` int(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `size` text NOT NULL,
  `mau` varchar(100) NOT NULL,
  `iddanhmuc` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `giasp`, `hinhanh`, `soluong`, `size`, `mau`, `iddanhmuc`) VALUES
(3, 'Quần ngắn YEYA ống rộng lưng cao', 89, 'img/1.jpg', 991, 'M', 'Hồng', 3),
(4, 'Đầm trắng', 399, 'img/5.jpg', 486, 'M', 'Trắng', 1),
(5, 'Áo sơ mi Lovito kiểu tay phồng cột dây', 299, 'img/6.jpg', 385, 'M', 'Xanh lam ', 2),
(6, 'Áo thun nữ cộc tay nhún eo vạt chéo xoắn Eo Cổ Tròn', 180, 'img/7.jpg', 999, 'L', 'Đen', 2),
(7, 'Áo sơ mi Hàn Quốc dáng rộng kẻ sọc ', 200, 'img/8.jpg', 968, 'L', 'Xanh dương', 2),
(8, 'Đầm dạ hội', 299, 'img/9.jpg', 99498, 'L', 'Đen ', 1),
(18, 'Áo trễ vai phối bèo tay ngắn kiểu sơ mi', 75, 'img/13.jpg', 939, 'M', 'Đen', 2),
(24, 'Váy Babydoll Tơ Tầng NƠ', 299, 'img/18.jpg', 999, 'L', 'Trắng', 1),
(25, 'Váy xốp dự tiệc trễ vai phong cách tiểu thư siêu xinh ', 100, 'img/19.jpg\r\n', 185, 'M', 'Trắng', 1),
(26, 'Đầm váy babydoll trễ vai dáng ngắn công chúa kiểu áo trễ vai tay bồng', 199, 'img/20.jpg', 160, 'M', 'Hồng ', 1),
(27, 'Váy Tafta Trễ Vai Xoe 3 Tầng Voan Đính Viền Bèo Trắng Đính Tag Nơ', 199, 'img/21.jpg', 869, 'L', 'Trắng', 1),
(28, 'Quần ống loe nữ cạp cao dáng dài', 99, 'img/22.png\r\n', 986, 'M', 'Đen', 3),
(31, 'Áo Khoác Bóng Chày Ấm Áp', 200, 'img/25.png', 700, 'XL', 'Trắng', 4),
(52, 'Đầm Thiết Kế Cổ Yếm Tay Bồng Nơ', 200, 'img/29.jpg', 499, 'M', 'Hồng', 1),
(53, 'Đầm Dự Tiệc Thiết Kế Chất Liệu Voan Dáng Dài Bèo Tầng + Áo Choàng Sang Trọng Dáng Tiểu Thư', 370, 'img/30.jpg', 599, 'M', 'Trắng Kem', 1),
(54, 'Đầm Dự Tiệc Trễ Vai Dáng Dài Cúp Ngực, Váy Thiết Kế Dáng Xoè Tiểu', 390, 'img/31.jpg', 958, 'M', 'Trắng', 1),
(55, 'Váy nhung đầm nhung trễ vai kèm nơ lệch xinh xắn cá tính', 400, 'img/32.jpg', 488, 'M', 'Đen', 1),
(56, 'Đầm Yếm Denim Xếp Ly Màu Hồng Xinh Xắn Cho Nữ', 230, 'img/33.jpg', 890, 'M', 'Hồng', 14),
(57, 'Áo kiểu Lovito nơ sau xếp nếp màu trơn', 170, 'img/34.jpg', 150, 'M', 'Be ', 2),
(58, 'Áo sơ mi Lovito cài nút màu trơn', 195, 'img/35.jpg', 120, 'M', 'xanh dương', 2),
(59, 'Váy Cổ Yếm, Đầm Trắng Chất Xốp In Hoa 2 Kiểu Dáng Xoè, Tay Bồng', 680, 'img/36.jfif', 990, 'L', 'Trắng', 1),
(60, 'Váy Trễ Vai Voan 2 Lớp Dáng Xoè Nữ Màu Trắng', 169, 'img/37.jfif', 980, 'L', 'Trắng', 1),
(61, 'Váy công chúa cổ yếm 3 tầng bánh bèo bồng bềnh, Đầm voan trắng 2 lớp tiểu thư điệu đà đi chơi đi tiệ', 289, 'img/38.jfif', 210, 'M', 'Trắng', 1),
(63, 'Đầm voan hai lớp cổ yếm đính nơ hở vai tay bồng dáng ngắn xoè - Váy nữ đẹp phong cách tiểu thư bánh ', 610, 'img/41.jfif', 107, 'M', 'Trắng', 1),
(64, 'Váy dự tiệc chất liệu Tafta xinh xắn, đầm thiết kế trễ vai đính nơ cổ', 420, 'img/40.jfif', 100, 'L', 'Trắng đen', 1),
(65, 'Đầm 2 dây nữ dáng babydoll dễ thương đi chơi, đi biển may 2 lớp cẩn thận', 700, 'img/42.jfif', 200, 'L', 'Vàng nhạt', 1),
(66, 'Đầm Thiết Kế Cổ Yếm Tay Bồng Nơ Đá 2 Lớp, Váy Dáng Xoè Chất Liệu Voan Tơ Sang Chảnh', 390, 'img/43.jfif', 298, 'M', 'Hồng', 1),
(67, 'Váy cúp ngực mặc 2 kiểu kèm ghim đá chất liệu Tafta, đầm dự tiệc phong cách tiểu thư cực xinh', 230, 'img/44.jfif', 900, 'M', 'Đen', 1),
(68, 'Áo Kiểu Bèo Tay Dài Bồng Bềnh Nữ Tính YUMI BÁN SỈ A25', 95, 'img/45.jfif', 300, 'XL', 'Đen', 2),
(69, 'Áo babydoll tay bồng BÈO TẦNG phong cách Hàn Quốc vạt cánh tiên ', 200, 'img/46.jfif', 998, 'M', 'Trắng', 2),
(70, 'Áo Croptop Rút Dây Hình Trái Tim Romantic', 80, 'img/47.jfif', 120, 'M', 'Trắng', 2),
(71, 'Áo Thun Croptop PURSEZO áo kiểu nữ', 99, 'img/48.jfif', 190, 'M', 'Trắng', 2),
(72, 'Áo thun XINLANYASHE tay ngắn thiết kế mới năng động thời trang trẻ trung', 78, 'img/49.jfif', 290, 'M', 'Hồng', 2),
(73, 'Áo nữ dài tay chất LEN GÂN - Áo kiểu CRT Dây Choàng Cổ Phối Rút Eo điệu đà A55', 89, 'img/50.jfif', 999, 'M', 'Đen', 2),
(74, 'Áo trễ vai nữ áo lệch vai tà xéo vải thun tăm', 170, 'img/51.jfif', 800, 'M', 'Đen', 2),
(75, 'Áo sơ mi nữ hàn quốc cộc tay 3 mầu rút dây 2 bên , buộc nơ xinh kute , áo kiểu dáng rộng tiểu thư bá', 200, 'img/52.jfif', 900, 'M', 'Xanh', 2),
(76, 'Áo thun dệt kim sọc ngắn tay Hàn Quốc ', 300, 'img/53.jfif', 290, 'M', 'Trắng', 2),
(77, 'Quần ống rộng bảng to thắt dây lưng thanh lịch ', 190, 'img/54.jfif', 200, 'M', 'Đen', 3),
(78, 'Hàn quốc sweet academy phong cách quần âu nữ 2023 mùa thu mới quần ống rộng đơn giản đa năng', 280, 'img/55.jfif', 0, 'L', 'Trắng', 3),
(79, 'Quần túi kiểu ống rộng cột dây', 100, 'img/56.jfif', 99, 'L', 'Trắng', 3),
(80, 'Quần Jean Cạp Cao Ống Rộng Hack Dáng, Quần Bò Ống Suông Cao Cấp', 299, 'img/57.jfif', 100, 'S', 'Xanh', 3),
(81, 'Quần dài ống rộng phong cách nhật hàn cổ điển cho nữ', 199, 'img/58.jfif', 187, 'L', 'Hồng', 3),
(82, 'Quần Kaki Nữ Ống Rộng Túi Hộp Cargo 3 Màu Cá Tính, Quần Suông Ống Rộng Túi Hộp', 300, 'img/59.jfif', 999, 'L', 'Trắng', 3),
(83, 'Quần bò ống rộng DH12', 370, 'img/60.jfif', 700, 'L', 'Xám', 3),
(84, 'Áo Khoác Nỉ Tay Bồng Dáng Rộng Hàn Quốc - Khoác Cardigan Dáng tay Bồng Họa Tiết Kẻ', 590, 'img/61.jfif', 899, 'XL', 'Trắng', 4),
(85, 'Áo khoác blazer croptop dáng ngắn dài tay ulzzang', 600, 'img/62.jfif', 550, 'XL', 'Be', 4),
(86, 'ÁO khoác nữ lửng croptop', 399, 'img/63.jfif', 921, 'XL', 'Đen', 4),
(87, 'Áo Khoác Jeans KYUBI Form Rộng Tay Bồng ', 620, 'img/64.jfif', 210, 'XL', 'Xanh', 4),
(88, 'Áo khoác blazer nữ dáng ngắn màu trơn có đệm vai form vừa phong cách thanh lịch', 380, 'img/65.jfif', 399, 'XL', 'Đen', 4),
(89, 'Áo khoác nữ A.244, Áo khoác blazer nữ dài tay sắn gấu pha be cách điệu 2 cúc vạt tròn cực xinh', 245, 'img/66.jfif', 899, 'XL', 'Xanh nhạt', 4),
(90, 'Áo khoác Cardigan dáng ngắn, Áo Cardigan len nữ, Áo khoác croptop nữ chất len mỏng ', 620, 'img/67.jfif', 999, 'XL', 'Trắng', 4),
(92, 'Áo khoác dạ tweed thu đông nữ thanh lịch', 399, 'img/69.jfif', 96, 'XL', 'Xanh lam nhạt', 4),
(94, 'Áo khoác nỉ croptop Hàn dáng rộng, áo hoodie nữ siêu xinh', 250, 'img/71.jfif', 788, 'XL', 'Xanh than', 4),
(95, 'Yếm Denim Xếp Ly Màu Hồng Xinh Xắn Cho Nữ', 210, 'img/70.jfif', 104, 'M', 'Hồng', 14),
(96, 'Quần Yếm chất kaki 2 màu Trắng Đen 1 Dây Chéo Ống Đứng Phong Cách Năng Động Hàn Quốc', 230, 'img/72.jfif', 94, 'M', 'Trắng', 14),
(97, 'Yếm chỉ nổi logo trắng PC', 299, 'img/73.jfif', 299, 'XL', 'Đen', 14),
(98, 'Sét yếm buộc eo phối váy trắng', 315, 'img/74.jfif', 798, 'XL', 'Đen', 14),
(99, 'Set Váy Yếm Nữ Denim Kèm Áo - Halinh Shop - Yếm 2 Dây Bò Mềm Chun Sau Dáng Xoè Dài Kèm Áo Crt Cổ Cao', 320, 'img/75.jfif', 598, 'XL', 'Đen', 14),
(101, 'Mũ/Nón Lưỡi Trai Cotton Hở Chóp Thời Trang Hàn Quốc Dành Cho Nữ thêu chữ DYJ', 109, 'img/77.jfif', 98, 'XL', 'Trắng', 15),
(102, 'Mũ Bucket Tai Bèo Domino Thiết Kế Cá Tính Năng Động Viền Tua Rua ', 199, 'img/78.jfif', 996, 'XL', 'Hồng', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `hoten`, `username`, `password`, `diachi`, `sdt`, `email`) VALUES
(21, 'Chủ Shop', 'admin', '$2y$10$AP7CgvJSpBBoHi9ikv2MWOgtP58nikP0jfBmAw/fWlelOgpPN1HZu', 'Quy Nhơn - Bình Định', '123456789', '4girls@gmail.com'),
(23, 'Trần Yến Như', 'nhu', '$2y$10$nAoOXUHkcSB8aC6KbVV4uuGCygxnwyTqqOiGY55Wb5WBeVZBaaXiC', 'Vân Canh - Quy Nhơn - Bình Định', '877676845', 'tranyennhiqn77@gmail.com'),
(24, 'Nguyễn Thị Lệ Huyền', 'huyen', '$2y$10$1eFJcG5xU3GClAS6p4hZeuqU4bevyLXjTZ7LmFxGmyItrxPZ08jQa', 'Quãng Ngãi', '765456222', 'huyen12@gmail.com'),
(25, 'Lê Thị Su Na', 'na', '$2y$10$RTnGsnMBTtQwg7WjEb8N5OBS6tXgrz.7ltVc6AULHfOZuBjwddAbe', 'Sông Cầu - Phú Yên', '93671476', 'lethisuna@gmail.com'),
(30, 'Bùi Thị Diệu', 'thidieu', '$2y$10$rtC1vrqKaXzpKE8O0LZL9eJFbU7aRJeYOTTFgW6zyZiD8EPYETAHS', 'Gia Lai', '987679876', 'thidieu12@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
