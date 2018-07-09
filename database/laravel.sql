-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2018 lúc 06:19 PM
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
  `status` tinyint(1) DEFAULT '0',
  `role` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `password`, `email`, `avatar`, `phone`, `address`, `status`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Đức Hồng', '$2y$10$amKMNRNJML3oYP7l/aUlJOCAc44gK211qM45RX.mssgBtN4wVgNvO', 'vuduchong@gmail.com', '/public/admin/avatar/_MG_1352.jpg', '0987654321', 'Cẩm Phả', 1, 'admin', NULL, 'yUARby2sgZFLzg7oXJQ9zNvuKWl0C7i38iyeFINbqRN9z7t28XXHpdIgXlNc', NULL, '2018-07-09 08:51:45'),
(26, 'bsdbsdb', '$2y$10$U4/2j/Y5epXvjgM/KN8iG.eqGz6pFM1bKgYRfi5c3RwvcdgEZxgNG', 'karaoke@gmail.com', '/public/admin/avatar/photo.jpg', '646436', 'bsdbsdb', 1, 'mod', NULL, NULL, '2018-07-08 09:07:50', '2018-07-09 08:53:10'),
(27, 'gagasg', '$2y$10$ZiZxoH2C7Uq0WvpoOlvfGu9WnXFMuG7/Q7uyGV1/fC9ZLuCIjImsm', 'vuesvsavas@gmail.com', '/public/admin/avatar/conditional-rendering-vuejs.jpg', '326236', 'gdsg', 1, 'mod', NULL, NULL, '2018-07-08 09:08:02', '2018-07-09 08:15:54'),
(28, 'hsdhsdh', '$2y$10$i7Fp9BzwbxZLf4.jPqPrye88kpUvuWg82NjloOaVSn.2L/8CKeVe.', 'tegshdshsdhsdhdsh@gmail.com', '/public/admin/avatar/xsihAO.jpg', '63636', 'đshsdg', 1, 'mod', NULL, NULL, '2018-07-08 09:08:12', '2018-07-09 08:15:59'),
(29, 'váhsdhsdhsd', '$2y$10$A7nQQVWqa48w15Uw/ke0teF0Z2kQtzV2Mgj/TkJWUCnXhNu0j0DQq', 'hsdhsdhsdh@gmail.com', '/public/admin/avatar/Capture.JPG', '734734734', 'sdhsdhsdh', 1, 'admin', NULL, NULL, '2018-07-08 09:08:37', '2018-07-09 08:51:38'),
(30, 'bsbsdh62366236', '$2y$10$5gYVZz1mR54beCMZWAAhhOSebTN4naVnwBPn5exuUsE6EUodhVMjW', 'flashasasb@gmail.com', '/public/admin/avatar/Adobe-Flash-icon.png', '236236236', 'bsdbdsb', 1, 'mod', NULL, NULL, '2018-07-08 19:15:12', '2018-07-09 08:53:06'),
(31, 'gasgasgags', '$2y$10$je8ocZbY/USG6hMt7KYa0uhGoAUnJqUT.b1gCK/dCtbSW7tZGjAWG', 'vuegasgasg@gmail.com', '/public/admin/avatar/conditional-rendering-vuejs.jpg', '326236', 'gsdgsdg', 1, 'admin', NULL, NULL, '2018-07-08 19:35:49', '2018-07-09 08:15:47');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
