-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 08, 2018 lúc 08:19 PM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_migrations`
--

CREATE TABLE `tbl_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_migrations`
--

INSERT INTO `tbl_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `password`, `email`, `avatar`, `phone`, `address`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Đức Hồng', '$2y$10$NSL9KYIqt0n/AnIOUO3/XubhpJHhOgo77tvtInyJOPLW48IlHOqZ6', 'vuduchong@gmail.com', '/public/admin/avatar/_MG_1352.jpg', '0987654321', 'Cẩm Phả', 'admin', NULL, 'rJnRQgYFuY7CDhV2JPqxqzELwaoNsycB39vcEfiQRYJFPPIhRYOzPsDCinQb', NULL, '2018-07-06 09:18:00'),
(26, 'bsdbsdb', '$2y$10$UAdOqeK8Pv4PbMQKy6gWLOwjMjfhfuZmU3bBMyJJ28wDn6GaNtjEi', 'karaoke@gmail.com', '/public/admin/avatar/photo.jpg', '646436', 'bsdbsdb', 'mod', NULL, NULL, '2018-07-08 09:07:50', '2018-07-08 10:53:49'),
(27, 'gagasg', '$2y$10$Z.EjxiKv0C.J5cqvupiaEuF8enEAFfCXwI1V4QHI.vxmcRVjVC7GK', 'vuesvsavas@gmail.com', '/public/admin/avatar/conditional-rendering-vuejs.jpg', '326236', 'gdsg', 'mod', NULL, NULL, '2018-07-08 09:08:02', '2018-07-08 10:54:09'),
(28, 'hsdhsdh', '$2y$10$qR7BHwelaauLWHmcvGgpFu6AsHzJ0zW668buV3HP8KYsadu2awAEa', 'tegshdshsdhsdhdsh@gmail.com', '/public/admin/avatar/xsihAO.jpg', '63636', 'đshsdg', 'mod', NULL, NULL, '2018-07-08 09:08:12', '2018-07-08 10:54:12'),
(29, 'váhsdhsdhsd', '$2y$10$fR8AaqVC2izfZAfB93lKyux3vcVKEHgs.P7skptIKtffxl9IdvKta', 'hsdhsdhsdh@gmail.com', '/public/admin/avatar/Capture.JPG', '734734734', 'sdhsdhsdh', 'mod', NULL, NULL, '2018-07-08 09:08:37', '2018-07-08 10:54:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_password_resets`
--
ALTER TABLE `tbl_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `user_unique` (`name`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
