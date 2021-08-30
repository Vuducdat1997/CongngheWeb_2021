-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2021 lúc 06:17 AM
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
-- Cơ sở dữ liệu: `habico`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tin Thương Hiệu', 0, 'tin-thuong-hieu', '0', '2021-08-29 08:52:05', '2021-08-29 08:52:05'),
(3, 'Tin Doanh Nghiệp', 0, 'tin-doanh-nghiep', '0', '2021-08-29 08:54:07', '2021-08-29 08:54:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `type`, `name`, `menu_url`, `menu_order`, `page_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'news', 'GIỚI THIỆU', 'about-us', '2', 2, 0, '2021-08-18 01:14:30', '2021-08-27 13:20:40'),
(2, 'news', 'HOME', '/', '1', 2, 0, '2021-08-27 13:19:54', '2021-08-27 13:19:54'),
(3, 'news', 'TIN TỨC', 'news', '3', 2, 0, '2021-08-27 13:23:29', '2021-08-27 13:23:29'),
(4, 'news', 'SẢN PHẨM', 'products', '4', 2, 0, '2021-08-27 13:24:09', '2021-08-27 13:24:09'),
(5, 'news', 'TUYỂN DỤNG', NULL, '5', 2, 0, '2021-08-27 13:24:41', '2021-08-27 13:24:41'),
(6, 'news', 'CỔ ĐÔNG', 'shareholder', '6', 2, 0, '2021-08-27 13:25:29', '2021-08-27 13:25:29'),
(7, 'category', 'LIÊN HỆ', 'contact-us', '7', 2, 0, '2021-08-29 09:03:04', '2021-08-29 09:03:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_08_17_103946_slide', 4),
(17, '2021_06_01_085356_settings', 10),
(18, '2021_08_18_161344_upload', 11),
(20, '2021_08_19_085937_product', 12),
(32, '2021_05_24_091424_photogroups', 19),
(33, '2021_08_17_145334_categories', 19),
(35, '2021_05_24_091403_photos', 21),
(36, '2021_05_24_091331_menus', 22),
(38, '2021_08_17_102010_role', 23),
(40, '2014_10_12_000000_create_users_table', 24),
(41, '2021_08_17_153031_news', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `view_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `categories_id`, `user_id`, `title`, `desc`, `details`, `slug`, `image`, `status`, `featured`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Giới thiệu bản thân', '<p>Giới thiệu bản thân</p>', '<p>Giới thiệu bản thân</p>', 'gioi-thieu-ban-than', 'r1PN_1.jpg', 0, 0, NULL, '2021-08-29 08:56:02', '2021-08-29 08:56:02'),
(2, 2, 2, 'Giới thiệu bản thân', '<p>Giới thiệu bản thân</p>', '<p>Giới thiệu bản thân</p>', 'gioi-thieu-ban-than', 'pjyR_2.jpg', 0, 0, NULL, '2021-08-29 08:56:27', '2021-08-29 08:56:27'),
(3, 2, 2, 'Giới thiệu bản thân', '<p>Giới thiệu bản thân</p>', '<p>Giới thiệu bản thân</p>', 'gioi-thieu-ban-than', 'p8su_3.jpg', 0, 0, NULL, '2021-08-29 08:56:47', '2021-08-29 08:56:47'),
(4, 2, 2, 'Giới thiệu bản thân', '<p>Giới thiệu bản thân</p>', '<p>Giới thiệu bản thân</p>', 'gioi-thieu-ban-than', 'cHDB_4.jpg', 0, 0, NULL, '2021-08-29 08:57:06', '2021-08-29 08:57:06'),
(5, 2, 2, 'Giới thiệu bản thân', '<p>Giới thiệu bản thân</p>', '<p>Giới thiệu bản thân</p>', 'gioi-thieu-ban-than', 'MC5H_abc.jpg', 0, 0, NULL, '2021-08-29 08:57:47', '2021-08-29 08:57:47'),
(11, 3, 2, 'abcde', '<p>abcde</p>', '<p>abcde</p>', 'abcde', '7VUT_abc.jpg', 0, 0, NULL, '2021-08-18 01:43:31', '2021-08-18 01:43:31'),
(12, 3, 2, 'BIA HÀ NỘI CÔNG BỐ DANH SÁCH KHÁCH HÀNG MAY MẮN TRÚNG THƯỞNG  ĐỢT 1 CHƯƠNG TRÌNH KHUYẾN MẠI “BỪNG SẮC HÈ CÙNG BIA HÀ NỘI”', '<p>okk</p>', '<p>okk</p>', 'bia-ha-noi-cong-bo-danh-sach-khach-hang-may-man-trung-thuong-dot-1-chuong-trinh-khuyen-mai-bung-sac-he-cung-bia-ha-noi', 'N8u7_new2.JPG', 0, 0, NULL, '2021-08-27 15:21:45', '2021-08-27 15:21:45'),
(13, 3, 2, 'BIA HÀ NỘI CÔNG BỐ DANH SÁCH KHÁCH HÀNG MAY MẮN TRÚNG THƯỞNG ĐỢT 1 CHƯƠNG TRÌNH KHUYẾN MẠI “BỪNG SẮC HÈ CÙNG BIA HÀ NỘI”', '<p>dsdsd</p>', '<p>dsdssd</p>', 'bia-ha-noi-cong-bo-danh-sach-khach-hang-may-man-trung-thuong-dot-1-chuong-trinh-khuyen-mai-bung-sac-he-cung-bia-ha-noi', 'CUP0_new2.JPG', 0, 0, NULL, '2021-08-27 15:22:25', '2021-08-27 15:22:25'),
(14, 3, 2, 'Bia Sài Gòn', '<p>Bia Sài Gòn</p>', '<p>Bia Sài Gòn</p>', 'bia-sai-gon', 't8oE_newdetail2.png', 0, 0, NULL, '2021-08-27 18:17:56', '2021-08-27 18:17:56'),
(15, 3, 2, 'Tin nóng hổi', '<p>Tin nóng hổi</p>', '<p>Tin nóng hổi</p>', 'tin-nong-hoi', 'nwwC_habeco-nangtamvithe.jpg', 0, 0, NULL, '2021-08-27 18:18:37', '2021-08-27 18:18:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `photogroups`
--

CREATE TABLE `photogroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `photogroups_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plastic_box` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concentration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `banner`, `logo`, `title`, `describe`, `content`, `capacity`, `plastic_box`, `concentration`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ZM6n_bold-banner.png', 'xatu_trucbach-logo.png', 'Trúc Bạch', 'Bia Trúc Bạch', '<p>Được đặt theo tên hồ Trúc Bạch – một địa danh gắn liền với mảnh đất nghìn năm văn hiến Thăng Long – Hà Nội, Trúc Bạch là loại bia nội đầu tiên của Việt Nam khi sản phẩm này ra đời vào năm 1958.</p>\n\n<p>Dòng bia cao cấp được kết tinh từ những nguyên liệu nhập khẩu tốt nhất như hoa bia Saaz – một trong bốn loại hoa bia quý tộc của thế giới được trồng duy nhất tại thung lũng Zatec, Cộng hòa Séc; và lúa mạch vụ xuân thu hoạch từ những vùng nguyên liệu nổi tiếng của Pháp và Cộng hòa Séc.</p>\n\n<p>Với người uống, Bia Trúc Bạch được ví như một tác phẩm nghệ thuật. Dòng bia màu vàng óng và trong suốt như mật ong. Khi rót, bọt bia trắng, dày, xốp, và tai nghe tiếng bọt từ từ tan ra “êm” và “mịn”. Đặc biệt, khi uống, bia có vị đắng nhẹ, vị đắng này từ từ chuyển sang vị ngọt dịu của mạch nha thượng hạng. Vị bia độc đáo này là kết quả của quá trình lên men tự nhiên dài ngày, lâu gấp 2 – 3 lần so với các loại bia thông thường.</p>\n\n<p>Nhằm đáp ứng tốt hơn nhu cầu của người tiêu dùng, cuối năm 2014, bên cạnh sản phẩm Bia chai Trúc Bạch 330ml, HABECO đã đưa thêm ra thị trường sản phẩm Bia lon Trúc Bạch&nbsp;330ml.</p>\n\n<p>HABECO tin tưởng rằng với vị thế là một kiệt tác bia, Trúc Bạch xứng đáng trở thành một biểu tượng và niềm tự hào của ngành đồ uống Việt Nam. Với nồng độ cồn 5.1%, Trúc Bạch hiện đứng đầu dòng bia dành cho phân khúc cao cấp của HABECO.</p>', '355ml', '20 bottles', '4.8%', 'd13o_trucbach.png', '0', '2021-08-19 04:08:57', '2021-08-28 08:55:24'),
(2, 'Xncy_bold-banner.png', 'Ko5O_trucbach-logo.png', 'Bia Hà Nội', 'Bia Hà Nội', '<p>Bia Hà Nội</p>', 'Bia Hà Nội', 'Bia Hà Nội', 'Bia Hà Nội', 'DaoR_trucbach.png', '0', '2021-08-28 00:37:55', '2021-08-28 00:37:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'user', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zalo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `favicon`, `facebook`, `youtube`, `mail`, `zalo`, `created_at`, `updated_at`) VALUES
(1, 'Habeco', 'logo.png', 'favicon.png', 'facebook.com/vumanhdung.dhtl', 'youtube.com', 'dungshinichi99@gmail.com', '0386132297', NULL, NULL),
(2, 'Habeco', 'logo.png', 'favicon.png', 'facebook.com/vumanhdung.dhtl', 'youtube.com', 'dungshinichi99@gmail.com', '0386132297', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `active_status`, `created_at`, `updated_at`) VALUES
(2, 'pG5j_4.jpg', '0', '2021-08-27 20:11:12', '2021-08-27 20:11:12'),
(4, 'dHfX_abc.jpg', '0', '2021-08-27 20:12:49', '2021-08-27 20:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `upload`
--

CREATE TABLE `upload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `upload`
--

INSERT INTO `upload` (`id`, `name`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Thông tin cổ đôngg', 'i0nn_Bai_2_01_Mo_so_phep_bien_doi_co_ban.pdf', '2021-08-18 09:43:00', '2021-08-18 09:47:36'),
(2, 'Vũ Mạnh Dũng', 'DZHV_Nội dung công việc.docx', '2021-08-18 09:50:22', '2021-08-18 09:50:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ehELBRDeGfLjGRwLa7SkK.4BPFrCS72aHmiul3Yu323m5CK2xw2WS', '', 0, NULL, NULL, NULL),
(3, 2, 'users', 'users@gmail.com', NULL, '$2y$10$Q8WTvqvq0YOzlftiFFRrSudx6tcwBPG7mDtVmKB67OTUaj/ckyKJK', '', 0, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_category` (`page_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_categories` (`categories_id`),
  ADD KEY `news_users` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `photogroups`
--
ALTER TABLE `photogroups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_photogroups` (`photogroups_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_users` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `photogroups`
--
ALTER TABLE `photogroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `upload`
--
ALTER TABLE `upload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menu_category` FOREIGN KEY (`page_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `news_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photo_photogroups` FOREIGN KEY (`photogroups_id`) REFERENCES `photogroups` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_users` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
