-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2019 lúc 03:30 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `home`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `url`) VALUES
(1, 'Le van Bac', 'album/products/5bbf04729c686.jpg', '1'),
(2, '', 'album/products/5bbd9fd12e998.jpg', '1'),
(4, 'sads', 'album/products/5bcac4774fc17.png', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(6, 'iphone', 'adsad'),
(7, 'Sam sung', ''),
(12, '	iphone', 'dzxcx'),
(13, '	Sam sung', 'sadas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `email`, `content`, `product_id`) VALUES
(6, 'pakcop@gmail.com', 'anhbac123', 13),
(8, 'thanhvien@gmail.com', 'ádasd', 15),
(12, 'thanhvien@gmail.com', 'Iphone này giá bao nhiu ạ!', 16),
(13, 'pakcop22799@gmail.com', 'asasas', 18),
(14, 'pakcop@gmail.com', 'hgggjh', 22),
(15, 'asdfasdf@sdfsdf.sdf', 'adsfasdf', 17),
(16, 'pakcop22799@gmail.com', 'ádfa', 17),
(17, 'nhanvien@gmail.com', 'san pham dep', 22),
(18, 'levanbac22071999@gmail.com', 'SẢn phẩm đẹp', 22),
(19, 'thanhvien@gmail.com', 'Rất đẹp', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `Name`, `email`, `phone_number`, `address`) VALUES
(1, 'Le van Bac', 'pakcop@gmail.com', 2147483647, 'sabdhas'),
(3, 'fsdgsdgfds', 'pakcop@gmail.com', 2147483647, '1'),
(4, 'bac', 'pakcop@gmail.com', 2147483647, 'ádsa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `detail` text,
  `list_price` int(11) DEFAULT '0',
  `sell_price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `product_name`, `detail`, `list_price`, `sell_price`, `image`, `status`, `views`) VALUES
(14, 1, 'Iphone 8 Plus 256GB1', 'Là sản phẩm đẹp đẽ', 34790000, 0, 'album/products/5bca27f9d0bbe.jpg', NULL, 5),
(16, 1, 'IPhone 7 64GB', '<p>dep</p>', 34790000, 0, 'album/products/5bca27ea1a6ce.jpg', NULL, 8),
(17, 1, 'Sam sung garaxy j7', 'Là sản phẩm đẹp đẽ', 14790000, 0, 'album/products/5bca24985610b.jpg', NULL, 3),
(18, 6, 'Galaxy J6 64GB', '', 14790000, 0, 'album/products/5bc0061d106b4.jpg', NULL, 39),
(19, 1, 'IPhone X 64GB', '', 34790000, 0, 'album/products/5bc006583bf75.png', NULL, 8),
(22, 7, 'Note 7', '', 14790000, 0, 'album/products/5bc006de3ae0d.jpg', NULL, 48),
(25, 1, 'samsung-galaxy-j4-plus', 'Sang Trọng lịch lãm', 30790000, 0, 'album/products/5bca211733897.jpg', NULL, 10),
(26, 7, 'samsung-galaxy-j4-plus', 'đẹp', 34790000, 0, 'album/products/5bca216385595.jpg', NULL, 23),
(27, 6, 'realme-2-pro', 'sdasdasd', 140000000, 0, 'album/products/5bca2843e9579.jpg', NULL, 21),
(28, 6, 'Iphone 8 Plus 256GB', 'Sản phẩm đẹp', 30790000, 0, 'album/products/5bcbd73dd3516.png', NULL, 11),
(32, 1, 'sdasd', 'ádasd', 34790000, 0, 'album/products/5bcbfe07d2952.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desccription` text,
  `url` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slideshows`
--

INSERT INTO `slideshows` (`id`, `image`, `desccription`, `url`, `status`, `order_number`) VALUES
(20, 'album/5bc5e4bf47808.jpg', '1', '1', 1, 4),
(23, 'album/5bc5e58cd4246.jpg', '1', '1', 1, 1),
(24, 'album/products/5bcbef090b26b.jpg', '5', '1', 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '1',
  `address` varchar(1000) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT '1',
  `phone_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `role`, `address`, `avatar`, `gender`, `phone_number`) VALUES
(25, 'pakcop@gmail.com', 'fsdgsdgfds', 'anhbac123\r\n', 500, NULL, 'album/avatar/5bcbff78823bb.jpg', 1, NULL),
(26, 'anhbac@gmail.com', '1234567', '$2y$10$7pzgaXPzzdfWLG.eKAEvj.YP0VzJwboI7XfbrHOVi37cJylC/Jygu', 1, NULL, 'album/avatar/5bdbbcfbde3dc.jpg', 1, NULL),
(27, 'Connhangheo@gmail.com', 'Lê Xuân Bắc', '$2y$10$t9XielFW1qFVcf3tUzkj8ueaxDviV2fFmUkRAgFI.2OZ5.giqENKW', 500, NULL, 'img/avatar/5bf4d5631010d.png', 1, NULL),
(28, 'hhhhh@gmail.com', 'levanbac', '$2y$10$Xp0PmfTwTYlxFk3qW84z8uYOXAZdEMIEoNuYF/MTpGtjzxc8R1Oia', 300, NULL, 'img/avatar/5bf4d662c329a.jpg', 1, NULL),
(29, 'baclvph06267@fpt.edu.vn', 'levanbac', '$2y$10$wVxDzQtuUB.U5hmTNrkzLe8hdFH7zudgZOExaurYHFx0F5Fv5Wzo2', 500, '1', 'img/avatar/5bf5560c22524.png', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_settings`
--

CREATE TABLE `web_settings` (
  `logo` varchar(255) NOT NULL,
  `hotline` varchar(11) DEFAULT NULL,
  `map` text,
  `email` varchar(255) DEFAULT NULL,
  `fb` text,
  `introduce` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `web_settings`
--

INSERT INTO `web_settings` (`logo`, `hotline`, `map`, `email`, `fb`, `introduce`) VALUES
('album/products/5bcbffba01917.png', '0969772859', '                                <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.964800112377!2d105.75570501688944!3d21.033038108140452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454c7ef0bf769%3A0x58d003b45977d1f7!2zVEdERCAtIEjhu5MgVMO5bmcgTeG6rXU!5e0!3m2!1svi!2s!4v1540086504816\" width=\"400\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>                            ', 'baclvph06267@gmail.com', 'baccop22799agmail', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
