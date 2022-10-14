-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2022 lúc 11:56 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elcit`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_20_052646_create_tbl_brand', 1),
(5, '2021_08_03_070245_tbl_room', 1),
(6, '2021_08_03_072054_tbl_software', 2),
(7, '2021_08_13_060938_tbl_version', 3),
(8, '2021_08_26_073005_tbl_schedule', 4),
(9, '2021_09_01_071712_tbl_detail_semester', 5),
(10, '2021_09_07_031218_tbl_subject', 6),
(11, '2021_09_09_104019_tbl_ds_tkb', 7),
(12, '2021_09_21_071500_tbl_chucvu', 8),
(13, '2021_10_01_015613_tbl_nhomhp', 9),
(14, '2021_10_29_070200_tbl_dki_phong', 10),
(15, '2021_12_01_152311_tbl_suco', 11),
(16, '2021_12_04_160058_tbl_namhoc', 12),
(17, '2021_12_04_160656_tbl_suco', 13),
(18, '2021_12_04_160714_tbl_namhoc', 13),
(19, '2021_12_05_133804_tbl_hocphan', 14),
(20, '2021_12_06_060144_tbl_lophp', 15),
(21, '2021_12_09_144618_tbl_nhomth', 16),
(22, '2021_12_18_180313_tbl_tuan', 17);

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
-- Cấu trúc bảng cho bảng `tbl_buoi`
--

CREATE TABLE `tbl_buoi` (
  `id_buoi` int(11) NOT NULL,
  `buoi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_buoi`
--

INSERT INTO `tbl_buoi` (`id_buoi`, `buoi`) VALUES
(1, 'Sáng'),
(2, 'Chiều'),
(3, 'Tối');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `chucvu_id` int(10) UNSIGNED NOT NULL,
  `ten_chucvu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`chucvu_id`, `ten_chucvu`, `created_at`, `updated_at`) VALUES
(0, 'ADMIN', NULL, NULL),
(1, 'Giảng viên', NULL, NULL),
(2, 'CB sắp lịch TH', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_computer`
--

CREATE TABLE `tbl_computer` (
  `computer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `computer_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_computer`
--

INSERT INTO `tbl_computer` (`computer_id`, `room_id`, `computer_name`) VALUES
(17, 32, 'Máy 1'),
(18, 32, 'Máy 2'),
(19, 32, 'Máy 3'),
(20, 32, 'Máy 4'),
(21, 32, 'Máy 5'),
(22, 32, 'Máy 6'),
(23, 32, 'Máy 7'),
(24, 32, 'Máy 8'),
(25, 32, 'Máy 9'),
(26, 32, 'Máy 10'),
(27, 32, 'Máy 11'),
(28, 32, 'Máy 12'),
(29, 32, 'Máy 13'),
(30, 32, 'Máy 14'),
(31, 32, 'Máy 15'),
(32, 32, 'Máy 16'),
(33, 32, 'Máy 17'),
(34, 32, 'Máy 18'),
(35, 32, 'Máy 19'),
(88, 32, 'Máy 20'),
(141, 35, 'Máy 1'),
(142, 35, 'Máy 2'),
(143, 35, 'Máy 3'),
(144, 35, 'Máy 4'),
(145, 35, 'Máy 5'),
(146, 35, 'Máy 6'),
(147, 35, 'Máy 7'),
(148, 35, 'Máy 8'),
(149, 35, 'Máy 9'),
(150, 35, 'Máy 10'),
(151, 35, 'Máy 11'),
(152, 35, 'Máy 12'),
(153, 35, 'Máy 13'),
(154, 35, 'Máy 14'),
(155, 35, 'Máy 15'),
(156, 35, 'Máy 16'),
(157, 35, 'Máy 17'),
(158, 35, 'Máy 18'),
(159, 35, 'Máy 19'),
(160, 35, 'Máy 20'),
(161, 35, 'Máy 21'),
(162, 35, 'Máy 22'),
(163, 35, 'Máy 23'),
(164, 35, 'Máy 24'),
(165, 35, 'Máy 25'),
(166, 35, 'Máy 26'),
(167, 35, 'Máy 27'),
(168, 35, 'Máy 28'),
(169, 35, 'Máy 29'),
(170, 35, 'Máy 30'),
(171, 35, 'Máy 31'),
(172, 35, 'Máy 32'),
(173, 35, 'Máy 33'),
(174, 35, 'Máy 34'),
(175, 35, 'Máy 35'),
(176, 35, 'Máy 36'),
(177, 35, 'Máy 37'),
(178, 35, 'Máy 38'),
(179, 35, 'Máy 39'),
(180, 35, 'Máy 40'),
(181, 35, 'Máy 41'),
(182, 35, 'Máy 42'),
(183, 35, 'Máy 43'),
(184, 35, 'Máy 44'),
(185, 35, 'Máy 45'),
(186, 35, 'Máy 46'),
(187, 35, 'Máy 47'),
(188, 35, 'Máy 48'),
(189, 35, 'Máy 49'),
(190, 35, 'Máy 50'),
(191, 36, 'Máy 1'),
(192, 36, 'Máy 2'),
(193, 36, 'Máy 3'),
(194, 36, 'Máy 4'),
(195, 36, 'Máy 5'),
(196, 36, 'Máy 6'),
(197, 36, 'Máy 7'),
(198, 36, 'Máy 8'),
(199, 36, 'Máy 9'),
(200, 36, 'Máy 10'),
(201, 36, 'Máy 11'),
(202, 36, 'Máy 12'),
(203, 36, 'Máy 13'),
(204, 36, 'Máy 14'),
(205, 36, 'Máy 15'),
(206, 36, 'Máy 16'),
(207, 36, 'Máy 17'),
(208, 36, 'Máy 18'),
(209, 36, 'Máy 19'),
(210, 36, 'Máy 20'),
(211, 36, 'Máy 21'),
(212, 36, 'Máy 22'),
(213, 36, 'Máy 23'),
(214, 36, 'Máy 24'),
(215, 36, 'Máy 25'),
(216, 36, 'Máy 26'),
(217, 36, 'Máy 27'),
(218, 36, 'Máy 28'),
(219, 36, 'Máy 29'),
(220, 36, 'Máy 30'),
(221, 36, 'Máy 31'),
(222, 36, 'Máy 32'),
(223, 36, 'Máy 33'),
(224, 36, 'Máy 34'),
(225, 36, 'Máy 35'),
(226, 36, 'Máy 36'),
(227, 36, 'Máy 37'),
(228, 36, 'Máy 38'),
(229, 36, 'Máy 39'),
(230, 36, 'Máy 40'),
(231, 36, 'Máy 41'),
(232, 36, 'Máy 42'),
(233, 36, 'Máy 43'),
(234, 36, 'Máy 44'),
(235, 36, 'Máy 45'),
(236, 36, 'Máy 46'),
(237, 36, 'Máy 47'),
(238, 36, 'Máy 48'),
(239, 36, 'Máy 49'),
(240, 36, 'Máy 50'),
(241, 37, 'Máy 1'),
(242, 37, 'Máy 2'),
(243, 37, 'Máy 3'),
(244, 37, 'Máy 4'),
(245, 37, 'Máy 5'),
(246, 37, 'Máy 6'),
(247, 37, 'Máy 7'),
(248, 37, 'Máy 8'),
(249, 37, 'Máy 9'),
(250, 37, 'Máy 10'),
(251, 37, 'Máy 11'),
(252, 37, 'Máy 12'),
(253, 37, 'Máy 13'),
(254, 37, 'Máy 14'),
(255, 37, 'Máy 15'),
(256, 37, 'Máy 16'),
(257, 37, 'Máy 17'),
(258, 37, 'Máy 18'),
(259, 37, 'Máy 19'),
(260, 37, 'Máy 20'),
(261, 37, 'Máy 21'),
(262, 37, 'Máy 22'),
(263, 37, 'Máy 23'),
(264, 37, 'Máy 24'),
(265, 37, 'Máy 25'),
(266, 37, 'Máy 26'),
(267, 37, 'Máy 27'),
(268, 37, 'Máy 28'),
(269, 37, 'Máy 29'),
(270, 37, 'Máy 30'),
(271, 37, 'Máy 31'),
(272, 37, 'Máy 32'),
(273, 37, 'Máy 33'),
(274, 37, 'Máy 34'),
(275, 37, 'Máy 35'),
(276, 37, 'Máy 36'),
(277, 37, 'Máy 37'),
(278, 37, 'Máy 38'),
(279, 37, 'Máy 39'),
(280, 37, 'Máy 40'),
(281, 37, 'Máy 41'),
(282, 37, 'Máy 42'),
(283, 37, 'Máy 43'),
(284, 37, 'Máy 44'),
(285, 37, 'Máy 45'),
(286, 37, 'Máy 46'),
(287, 37, 'Máy 47'),
(288, 37, 'Máy 48'),
(289, 37, 'Máy 49'),
(290, 37, 'Máy 50'),
(291, 38, 'Máy 1'),
(292, 38, 'Máy 2'),
(293, 38, 'Máy 3'),
(294, 38, 'Máy 4'),
(295, 38, 'Máy 5'),
(296, 38, 'Máy 6'),
(297, 38, 'Máy 7'),
(298, 38, 'Máy 8'),
(299, 38, 'Máy 9'),
(300, 38, 'Máy 10'),
(301, 38, 'Máy 11'),
(302, 38, 'Máy 12'),
(303, 38, 'Máy 13'),
(304, 38, 'Máy 14'),
(305, 38, 'Máy 15'),
(306, 38, 'Máy 16'),
(307, 38, 'Máy 17'),
(308, 38, 'Máy 18'),
(309, 38, 'Máy 19'),
(310, 38, 'Máy 20'),
(311, 38, 'Máy 21'),
(312, 38, 'Máy 22'),
(313, 38, 'Máy 23'),
(314, 38, 'Máy 24'),
(315, 38, 'Máy 25'),
(316, 38, 'Máy 26'),
(317, 38, 'Máy 27'),
(318, 38, 'Máy 28'),
(319, 38, 'Máy 29'),
(320, 38, 'Máy 30'),
(321, 38, 'Máy 31'),
(322, 38, 'Máy 32'),
(323, 38, 'Máy 33'),
(324, 38, 'Máy 34'),
(325, 38, 'Máy 35'),
(326, 38, 'Máy 36'),
(327, 38, 'Máy 37'),
(328, 38, 'Máy 38'),
(329, 38, 'Máy 39'),
(330, 38, 'Máy 40'),
(331, 38, 'Máy 41'),
(332, 38, 'Máy 42'),
(333, 38, 'Máy 43'),
(334, 38, 'Máy 44'),
(335, 38, 'Máy 45'),
(336, 38, 'Máy 46'),
(337, 38, 'Máy 47'),
(338, 38, 'Máy 48'),
(339, 38, 'Máy 49'),
(340, 38, 'Máy 50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_semester`
--

CREATE TABLE `tbl_detail_semester` (
  `detail_semester_id` int(10) UNSIGNED NOT NULL,
  `schedule_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_semester`
--

INSERT INTO `tbl_detail_semester` (`detail_semester_id`, `schedule_id`, `week`, `created_at`, `updated_at`) VALUES
(363, '33', 'Tuần 1', NULL, NULL),
(364, '33', 'Tuần 2', NULL, NULL),
(365, '33', 'Tuần 3', NULL, NULL),
(366, '33', 'Tuần 4', NULL, NULL),
(367, '33', 'Tuần 5', NULL, NULL),
(368, '33', 'Tuần 6', NULL, NULL),
(369, '33', 'Tuần 7', NULL, NULL),
(370, '33', 'Tuần 8', NULL, NULL),
(371, '33', 'Tuần 9', NULL, NULL),
(372, '33', 'Tuần 10', NULL, NULL),
(373, '33', 'Tuần 11', NULL, NULL),
(374, '33', 'Tuần 12', NULL, NULL),
(375, '33', 'Tuần 13', NULL, NULL),
(376, '33', 'Tuần 14', NULL, NULL),
(377, '33', 'Tuần 15', NULL, NULL),
(378, '33', 'Tuần 16', NULL, NULL),
(379, '33', 'Tuần 17', NULL, NULL),
(380, '33', 'Tuần 18', NULL, NULL),
(381, '33', 'Tuần 19', NULL, NULL),
(382, '33', 'Tuần 20', NULL, NULL),
(401, '35', 'Tuần 1', NULL, NULL),
(402, '35', 'Tuần 2', NULL, NULL),
(403, '35', 'Tuần 3', NULL, NULL),
(404, '35', 'Tuần 4', NULL, NULL),
(405, '35', 'Tuần 5', NULL, NULL),
(406, '35', 'Tuần 6', NULL, NULL),
(407, '35', 'Tuần 7', NULL, NULL),
(408, '35', 'Tuần 8', NULL, NULL),
(409, '35', 'Tuần 9', NULL, NULL),
(410, '35', 'Tuần 10', NULL, NULL),
(411, '35', 'Tuần 11', NULL, NULL),
(412, '35', 'Tuần 12', NULL, NULL),
(413, '35', 'Tuần 13', NULL, NULL),
(414, '35', 'Tuần 14', NULL, NULL),
(415, '35', 'Tuần 15', NULL, NULL),
(416, '35', 'Tuần 16', NULL, NULL),
(417, '35', 'Tuần 17', NULL, NULL),
(418, '35', 'Tuần 18', NULL, NULL),
(419, '36', 'Tuần 1', NULL, NULL),
(420, '36', 'Tuần 2', NULL, NULL),
(421, '36', 'Tuần 3', NULL, NULL),
(422, '36', 'Tuần 4', NULL, NULL),
(423, '36', 'Tuần 5', NULL, NULL),
(424, '36', 'Tuần 6', NULL, NULL),
(425, '36', 'Tuần 7', NULL, NULL),
(426, '36', 'Tuần 8', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dki_phong`
--

CREATE TABLE `tbl_dki_phong` (
  `dki_phong_id` int(10) UNSIGNED NOT NULL,
  `detail_semester_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_thu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_buoi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gio_bd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gio_kt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dki_phong`
--

INSERT INTO `tbl_dki_phong` (`dki_phong_id`, `detail_semester_id`, `room_id`, `id_thu`, `id_buoi`, `gio_bd`, `gio_kt`, `nhom_id`) VALUES
(573, '419', '35', '7', '1', '07:00', '11:30', 33),
(574, '420', '35', '7', '1', '07:00', '11:30', 33),
(575, '421', '35', '7', '1', '07:00', '11:30', 33),
(576, '422', '35', '7', '1', '07:00', '11:30', 33),
(577, '423', '35', '7', '1', '07:00', '11:30', 33),
(578, '424', '35', '7', '1', '07:00', '11:30', 33),
(579, '425', '35', '7', '1', '07:00', '11:30', 33),
(580, '426', '35', '7', '1', '07:00', '11:30', 33),
(589, '419', '32', '2', '1', '07:00', '11:30', 37),
(590, '420', '32', '2', '1', '07:00', '11:30', 37),
(591, '421', '32', '2', '1', '07:00', '11:30', 37),
(592, '422', '32', '2', '1', '07:00', '11:30', 37),
(593, '423', '32', '2', '1', '07:00', '11:30', 37),
(594, '424', '32', '2', '1', '07:00', '11:30', 37),
(595, '425', '32', '2', '1', '07:00', '11:30', 37),
(596, '426', '32', '2', '1', '07:00', '11:30', 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ds_tkb`
--

CREATE TABLE `tbl_ds_tkb` (
  `ds_tkb_id` int(10) UNSIGNED NOT NULL,
  `week` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoc_ki` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buoi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hocky`
--

CREATE TABLE `tbl_hocky` (
  `hocky_id` int(11) NOT NULL,
  `hocky` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hocky`
--

INSERT INTO `tbl_hocky` (`hocky_id`, `hocky`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hocphan`
--

CREATE TABLE `tbl_hocphan` (
  `hocphan_id` int(10) UNSIGNED NOT NULL,
  `mahp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhp` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hocphan`
--

INSERT INTO `tbl_hocphan` (`hocphan_id`, `mahp`, `tenhp`) VALUES
(1, 'CT175', 'Lý Thuyết Đồ Thị'),
(4, 'TN033', 'Tin học căn bản'),
(5, 'CT179', 'Quản trị hệ thống'),
(6, 'CT180', 'Cơ sở dữ liệu'),
(7, 'CT182', 'Ngôn ngữ mô hình hóa'),
(8, 'CT428', 'Lập trình Web'),
(9, 'CT272', 'Thương mại điện tử - CNTT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khoa`
--

CREATE TABLE `tbl_khoa` (
  `khoa_id` int(11) NOT NULL,
  `ma_khoa` text NOT NULL,
  `ten_khoa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khoa`
--

INSERT INTO `tbl_khoa` (`khoa_id`, `ma_khoa`, `ten_khoa`) VALUES
(1, 'CNTT', 'Công nghệ thông tin'),
(2, 'CN', 'Công nghệ'),
(3, 'TN', 'Tự nhiên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lophp`
--

CREATE TABLE `tbl_lophp` (
  `sttlophp` int(10) UNSIGNED NOT NULL,
  `namhoc_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hocky_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahp_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tietbd_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotiet_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `macb_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lophp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lophp`
--

INSERT INTO `tbl_lophp` (`sttlophp`, `namhoc_lophp`, `hocky_lophp`, `mahp_lophp`, `tietbd_lophp`, `sotiet_lophp`, `thu_lophp`, `macb_lophp`, `status_lophp`) VALUES
(16, '2', '3', '6', '1', '5', '7', '2', 1),
(17, '2', '3', '6', '1', '5', '7', '4', 0),
(18, '2', '3', '6', '1', '5', '7', '2', 1),
(19, '2', '3', '7', '1', '5', '4', '7', 1),
(20, '2', '3', '6', '1', '5', '2', '7', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_namhoc`
--

CREATE TABLE `tbl_namhoc` (
  `namhoc_id` int(10) UNSIGNED NOT NULL,
  `namhoc` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_namhoc`
--

INSERT INTO `tbl_namhoc` (`namhoc_id`, `namhoc`) VALUES
(1, '2020-2021'),
(2, '2021-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhomhp`
--

CREATE TABLE `tbl_nhomhp` (
  `nhomhp_id` int(10) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhomhp_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahocphan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhomhp`
--

INSERT INTO `tbl_nhomhp` (`nhomhp_id`, `user_id`, `nhomhp_status`, `nhom`, `mahocphan`, `subject_id`, `subject_name`, `soluong`, `updated_at`, `created_at`) VALUES
(1, '2', '0', '01', 'CT172', '3', 'Toán rời rạc', 40, NULL, NULL),
(2, '4', '0', '03', 'CT175', '2', 'Lý thuyết đồ thị', 50, NULL, NULL),
(3, '4', '1', '02', 'CT175', '2', 'Lý thuyết đồ thị', 60, NULL, NULL),
(6, '2', '1', '02', 'CT272', '4', 'Thương mại điện tử', 24, NULL, NULL),
(10, '4', '1', '12', 'CT179', '6', 'Quản trị hệ thống', 60, NULL, NULL),
(11, '2', '0', '23', 'CT179', '6', 'Quản trị hệ thống', 60, NULL, NULL),
(12, '4', '1', '43', 'CT272', '4', 'Thương mại điện tử', 28, NULL, NULL),
(13, '2', '0', '2', 'CT175', '2', 'Lý thuyết đồ thị', 50, NULL, NULL),
(14, '2', '0', '05', 'CT175', '2', 'Lý thuyết đồ thị', 60, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhomth`
--

CREATE TABLE `tbl_nhomth` (
  `nhom_id` int(10) UNSIGNED NOT NULL,
  `sttlophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahp_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `namhoc_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hocky_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tietbd_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotiet_lophp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ycpm` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_dki` int(11) NOT NULL,
  `sttphong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhomth`
--

INSERT INTO `tbl_nhomth` (`nhom_id`, `sttlophp`, `mahp_lophp`, `namhoc_lophp`, `hocky_lophp`, `tietbd_lophp`, `sotiet_lophp`, `soluong`, `ycpm`, `check_dki`, `sttphong`) VALUES
(33, '16', '6', '2', '3', '1', '5', '50', '24', 1, '35'),
(34, '16', '6', '2', '3', '1', '5', '50', '24', 0, NULL),
(35, '18', '6', '2', '3', '1', '5', '50', '24', 0, NULL),
(36, '19', '7', '2', '3', '1', '5', '50', '9', 0, NULL),
(37, '20', '6', '2', '3', '1', '5', '50', '9', 1, '32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_roles` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_roles`, `name`) VALUES
(1, 'ADMIN'),
(2, 'GiangVien'),
(3, 'CanBoTKB'),
(4, 'CanBoKT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pc_quantity` int(11) NOT NULL,
  `cpu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `pc_quantity`, `cpu`, `ram`, `ghichu`, `created_at`, `updated_at`) VALUES
(32, 'Phòng 1', 60, 'Core i7 Tiger Lake 4 nhân, 8 luồng', '4GB', 'không máy lạnh', NULL, NULL),
(35, 'Phòng 2', 60, 'Core i5 Tiger Lake 4 nhân, 8 luồng', '8GB', 'Có máy lạnh', NULL, NULL),
(36, 'Phòng 3', 80, 'Core i7 Tiger Lake 4 nhân, 8 luồng', '8GB', 'Khong', NULL, NULL),
(37, 'Phòng 4', 50, 'Core i7 Tiger Lake 4 nhân, 8 luồng', '8GB', '', NULL, NULL),
(38, 'Phòng 5', 100, 'Core i7 Tiger Lake 4 nhân, 8 luồng', '8GB', 'Khong', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_room_details`
--

CREATE TABLE `tbl_room_details` (
  `room_details_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `software_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_room_details`
--

INSERT INTO `tbl_room_details` (`room_details_id`, `room_id`, `software_id`) VALUES
(93, 32, '9'),
(94, 32, '12'),
(96, 38, '8'),
(97, 38, '12'),
(98, 38, '13'),
(99, 32, '13'),
(102, 35, '12'),
(103, 38, '9'),
(104, 38, '10'),
(105, 36, '12'),
(106, 32, '25'),
(108, 38, '25'),
(109, 32, '8'),
(110, 35, '8'),
(111, 35, '9'),
(112, 35, '24'),
(113, 36, '24'),
(114, 37, '24'),
(115, 37, '9'),
(137, 35, '25'),
(138, 36, '8'),
(139, 36, '13'),
(140, 36, '10'),
(141, 36, '9'),
(144, 35, '26'),
(145, 32, '26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `hoc_ki` int(11) NOT NULL,
  `week_quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nam_hoc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `hoc_ki`, `week_quantity`, `nam_hoc`, `schedule_status`, `created_at`, `updated_at`) VALUES
(33, 1, '20', '2', 0, NULL, NULL),
(35, 2, '18', '2', 0, NULL, NULL),
(36, 3, '8', '2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_software`
--

CREATE TABLE `tbl_software` (
  `software_id` int(10) UNSIGNED NOT NULL,
  `software_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `software_version` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_software`
--

INSERT INTO `tbl_software` (`software_id`, `software_name`, `software_version`, `ghichu`, `created_at`, `updated_at`) VALUES
(8, 'DevC', '1.4', 'Trống', NULL, NULL),
(9, 'Pencil', '2.3', 'Trống', NULL, NULL),
(10, 'Power Design', '3.4', 'Trống', NULL, NULL),
(12, 'Netbean', '2.3', 'Trống', NULL, NULL),
(13, 'Visual studio code', '2.4', 'Trống', NULL, NULL),
(24, 'SQL Server Management Studio', '17.3', 'Trống', NULL, NULL),
(25, 'Office 2008', '20.2', 'Trống', NULL, NULL),
(26, 'Elipse', '5.0', 'Trống', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `mahocphan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `mahocphan`, `subject_name`, `created_at`, `updated_at`) VALUES
(2, 'CT175', 'Lý thuyết đồ thị', NULL, NULL),
(3, 'CT172', 'Toán rời rạc', NULL, NULL),
(4, 'CT272', 'Thương mại điện tử', NULL, NULL),
(5, 'CT180', 'Cơ sở dữ liệu', NULL, NULL),
(6, 'CT179', 'Quản trị hệ thống', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suco`
--

CREATE TABLE `tbl_suco` (
  `suco_id` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidungkhacphuc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichukhac` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayphananh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaykhacphuc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_suco`
--

INSERT INTO `tbl_suco` (`suco_id`, `noidung`, `trangthai`, `noidungkhacphuc`, `ghichukhac`, `ngayphananh`, `ngaykhacphuc`, `id_user`, `room_id`) VALUES
(8, 'Máy 08 mở không lên', '1', 'Lỗi Win', 'Đã cài lại win', '17/12/2021', '17/12/2021', '2', 32),
(9, 'May 05 bi hong', '0', 'Trống', 'Trống', '20/12/2021', 'Trống', '2', 35),
(10, 'May 09 hong', '1', 'da khac phuc', 'loi cpu', '20/12/2021', '20/12/2021', '2', 32),
(11, 'máy 6 mở không lên', '1', 'lỗi win', 'đã cài lại win', '22/12/2021', '22/12/2021', '2', 35),
(12, 'may 1 hu', '1', 'Loi CPU', 'Da thay CPU', '22/12/2021', '22/12/2021', '7', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thu`
--

CREATE TABLE `tbl_thu` (
  `id_thu` int(11) NOT NULL,
  `thu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_thu`
--

INSERT INTO `tbl_thu` (`id_thu`, `thu`) VALUES
(1, 'Thứ 2\r\n'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tinhthanhpho`
--

CREATE TABLE `tbl_tinhthanhpho` (
  `matp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `name_city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `tbl_tinhthanhpho`
--

INSERT INTO `tbl_tinhthanhpho` (`matp`, `name_city`, `type`) VALUES
('01', 'Thành phố Hà Nội', 'Thành phố Trung ương'),
('02', 'Tỉnh Hà Giang', 'Tỉnh'),
('04', 'Tỉnh Cao Bằng', 'Tỉnh'),
('06', 'Tỉnh Bắc Kạn', 'Tỉnh'),
('08', 'Tỉnh Tuyên Quang', 'Tỉnh'),
('10', 'Tỉnh Lào Cai', 'Tỉnh'),
('11', 'Tỉnh Điện Biên', 'Tỉnh'),
('12', 'Tỉnh Lai Châu', 'Tỉnh'),
('14', 'Tỉnh Sơn La', 'Tỉnh'),
('15', 'Tỉnh Yên Bái', 'Tỉnh'),
('17', 'Tỉnh Hoà Bình', 'Tỉnh'),
('19', 'Tỉnh Thái Nguyên', 'Tỉnh'),
('20', 'Tỉnh Lạng Sơn', 'Tỉnh'),
('22', 'Tỉnh Quảng Ninh', 'Tỉnh'),
('24', 'Tỉnh Bắc Giang', 'Tỉnh'),
('25', 'Tỉnh Phú Thọ', 'Tỉnh'),
('26', 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
('27', 'Tỉnh Bắc Ninh', 'Tỉnh'),
('30', 'Tỉnh Hải Dương', 'Tỉnh'),
('31', 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
('33', 'Tỉnh Hưng Yên', 'Tỉnh'),
('34', 'Tỉnh Thái Bình', 'Tỉnh'),
('35', 'Tỉnh Hà Nam', 'Tỉnh'),
('36', 'Tỉnh Nam Định', 'Tỉnh'),
('37', 'Tỉnh Ninh Bình', 'Tỉnh'),
('38', 'Tỉnh Thanh Hóa', 'Tỉnh'),
('40', 'Tỉnh Nghệ An', 'Tỉnh'),
('42', 'Tỉnh Hà Tĩnh', 'Tỉnh'),
('44', 'Tỉnh Quảng Bình', 'Tỉnh'),
('45', 'Tỉnh Quảng Trị', 'Tỉnh'),
('46', 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
('48', 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
('49', 'Tỉnh Quảng Nam', 'Tỉnh'),
('51', 'Tỉnh Quảng Ngãi', 'Tỉnh'),
('52', 'Tỉnh Bình Định', 'Tỉnh'),
('54', 'Tỉnh Phú Yên', 'Tỉnh'),
('56', 'Tỉnh Khánh Hòa', 'Tỉnh'),
('58', 'Tỉnh Ninh Thuận', 'Tỉnh'),
('60', 'Tỉnh Bình Thuận', 'Tỉnh'),
('62', 'Tỉnh Kon Tum', 'Tỉnh'),
('64', 'Tỉnh Gia Lai', 'Tỉnh'),
('66', 'Tỉnh Đắk Lắk', 'Tỉnh'),
('67', 'Tỉnh Đắk Nông', 'Tỉnh'),
('68', 'Tỉnh Lâm Đồng', 'Tỉnh'),
('70', 'Tỉnh Bình Phước', 'Tỉnh'),
('72', 'Tỉnh Tây Ninh', 'Tỉnh'),
('74', 'Tỉnh Bình Dương', 'Tỉnh'),
('75', 'Tỉnh Đồng Nai', 'Tỉnh'),
('77', 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
('79', 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
('80', 'Tỉnh Long An', 'Tỉnh'),
('82', 'Tỉnh Tiền Giang', 'Tỉnh'),
('83', 'Tỉnh Bến Tre', 'Tỉnh'),
('84', 'Tỉnh Trà Vinh', 'Tỉnh'),
('86', 'Tỉnh Vĩnh Long', 'Tỉnh'),
('87', 'Tỉnh Đồng Tháp', 'Tỉnh'),
('89', 'Tỉnh An Giang', 'Tỉnh'),
('91', 'Tỉnh Kiên Giang', 'Tỉnh'),
('92', 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
('93', 'Tỉnh Hậu Giang', 'Tỉnh'),
('94', 'Tỉnh Sóc Trăng', 'Tỉnh'),
('95', 'Tỉnh Bạc Liêu', 'Tỉnh'),
('96', 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tuan`
--

CREATE TABLE `tbl_tuan` (
  `tuan_id` int(10) UNSIGNED NOT NULL,
  `tuan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tuan`
--

INSERT INTO `tbl_tuan` (`tuan_id`, `tuan`) VALUES
(1, 'Tuần 1'),
(2, 'Tuần 2'),
(3, 'Tuần 3'),
(4, 'Tuần 4'),
(5, 'Tuần 5'),
(6, 'Tuần 6'),
(7, 'Tuần 7'),
(8, 'Tuần 8'),
(9, 'Tuần 9'),
(10, 'Tuần 10'),
(11, 'Tuần 11'),
(12, 'Tuần 12'),
(13, 'Tuần 13'),
(14, 'Tuần 14'),
(15, 'Tuần 15'),
(16, 'Tuần 16'),
(17, 'Tuần 17'),
(18, 'Tuần 18'),
(19, 'Tuần 19'),
(20, 'Tuần 20'),
(21, 'Tuần 21'),
(22, 'Tuần 22'),
(23, 'Tuần 23'),
(24, 'Tuần 24'),
(25, 'Tuần 25'),
(26, 'Tuần 26'),
(27, 'Tuần 27'),
(28, 'Tuần 28'),
(29, 'Tuần 29'),
(30, 'Tuần 30'),
(31, 'Tuần 31'),
(32, 'Tuần 32'),
(33, 'Tuần 33'),
(34, 'Tuần 34'),
(35, 'Tuần 35'),
(36, 'Tuần 36'),
(37, 'Tuần 37'),
(38, 'Tuần 38'),
(39, 'Tuần 39'),
(40, 'Tuần 40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `id_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(118) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_chucvu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `id_user`, `user_email`, `user_name`, `user_password`, `user_phone`, `user_address`, `khoa`, `id_chucvu`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'tantranstst@gmail.com', 'Tan Tran-ADMIN', 'e10adc3949ba59abbe56e057f20f883e', '00123456789', 'Tỉnh Đồng Tháp', 'Công nghệ thông tin', 0, NULL, NULL),
(2, 'tvbb0908', 'THTan@gmail.com', 'Tran Van B', 'e10adc3949ba59abbe56e057f20f883e', '1234556', 'Tỉnh Bạc Liêu', 'Công nghệ thông tin', 1, NULL, NULL),
(4, 'nvab1708', 'nva@gmail.com', 'Nguyễn Văn A', 'e10adc3949ba59abbe56e057f20f883e', '09863378475', 'Thành phố Cần Thơ', 'Công nghệ thông tin', 1, NULL, NULL),
(5, 'ttpb512', 'tbb@gmail.com', 'Tran Thanh Phong', 'e10adc3949ba59abbe56e057f20f883e', '+8449583948', 'Tỉnh Phú Yên', 'Công nghệ thông tin', 1, NULL, NULL),
(6, 'tvtb1708', 'TVT@gmail.com', 'Tran Van Thanh', 'e10adc3949ba59abbe56e057f20f883e', '0695748373', 'Tỉnh Vĩnh Phúc', 'Công nghệ thông tin', 2, NULL, NULL),
(7, 'phucbao', 'tpb@gmail.com', 'Trần Phúc Bảo', 'e10adc3949ba59abbe56e057f20f883e', '0986340387', 'Thành phố Cần Thơ', 'Công nghệ thông tin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_version`
--

CREATE TABLE `tbl_version` (
  `version_id` int(10) UNSIGNED NOT NULL,
  `version_number` float NOT NULL,
  `software_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_version`
--

INSERT INTO `tbl_version` (`version_id`, `version_number`, `software_id`, `created_at`, `updated_at`) VALUES
(74, 2.5, '11', NULL, NULL),
(76, 6.8, '8', NULL, NULL),
(77, 6.3, '8', NULL, NULL),
(78, 5.9, '8', NULL, NULL),
(80, 2, '9', NULL, NULL),
(81, 1.1, '13', NULL, NULL),
(82, 2.5, '13', NULL, NULL),
(95, 1, '10', NULL, NULL),
(96, 2.5, '10', NULL, NULL),
(97, 3.2, '10', NULL, NULL),
(98, 1.1, '12', NULL, NULL),
(99, 2, '12', NULL, NULL),
(100, 4, '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tbl_buoi`
--
ALTER TABLE `tbl_buoi`
  ADD PRIMARY KEY (`id_buoi`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`chucvu_id`);

--
-- Chỉ mục cho bảng `tbl_computer`
--
ALTER TABLE `tbl_computer`
  ADD PRIMARY KEY (`computer_id`);

--
-- Chỉ mục cho bảng `tbl_detail_semester`
--
ALTER TABLE `tbl_detail_semester`
  ADD PRIMARY KEY (`detail_semester_id`);

--
-- Chỉ mục cho bảng `tbl_dki_phong`
--
ALTER TABLE `tbl_dki_phong`
  ADD PRIMARY KEY (`dki_phong_id`);

--
-- Chỉ mục cho bảng `tbl_ds_tkb`
--
ALTER TABLE `tbl_ds_tkb`
  ADD PRIMARY KEY (`ds_tkb_id`);

--
-- Chỉ mục cho bảng `tbl_hocky`
--
ALTER TABLE `tbl_hocky`
  ADD PRIMARY KEY (`hocky_id`);

--
-- Chỉ mục cho bảng `tbl_hocphan`
--
ALTER TABLE `tbl_hocphan`
  ADD PRIMARY KEY (`hocphan_id`);

--
-- Chỉ mục cho bảng `tbl_khoa`
--
ALTER TABLE `tbl_khoa`
  ADD PRIMARY KEY (`khoa_id`);

--
-- Chỉ mục cho bảng `tbl_lophp`
--
ALTER TABLE `tbl_lophp`
  ADD PRIMARY KEY (`sttlophp`);

--
-- Chỉ mục cho bảng `tbl_namhoc`
--
ALTER TABLE `tbl_namhoc`
  ADD PRIMARY KEY (`namhoc_id`);

--
-- Chỉ mục cho bảng `tbl_nhomhp`
--
ALTER TABLE `tbl_nhomhp`
  ADD PRIMARY KEY (`nhomhp_id`);

--
-- Chỉ mục cho bảng `tbl_nhomth`
--
ALTER TABLE `tbl_nhomth`
  ADD PRIMARY KEY (`nhom_id`);

--
-- Chỉ mục cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Chỉ mục cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Chỉ mục cho bảng `tbl_room_details`
--
ALTER TABLE `tbl_room_details`
  ADD PRIMARY KEY (`room_details_id`);

--
-- Chỉ mục cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Chỉ mục cho bảng `tbl_software`
--
ALTER TABLE `tbl_software`
  ADD PRIMARY KEY (`software_id`);

--
-- Chỉ mục cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Chỉ mục cho bảng `tbl_suco`
--
ALTER TABLE `tbl_suco`
  ADD PRIMARY KEY (`suco_id`);

--
-- Chỉ mục cho bảng `tbl_thu`
--
ALTER TABLE `tbl_thu`
  ADD PRIMARY KEY (`id_thu`);

--
-- Chỉ mục cho bảng `tbl_tinhthanhpho`
--
ALTER TABLE `tbl_tinhthanhpho`
  ADD PRIMARY KEY (`matp`);

--
-- Chỉ mục cho bảng `tbl_tuan`
--
ALTER TABLE `tbl_tuan`
  ADD PRIMARY KEY (`tuan_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `tbl_version`
--
ALTER TABLE `tbl_version`
  ADD PRIMARY KEY (`version_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_buoi`
--
ALTER TABLE `tbl_buoi`
  MODIFY `id_buoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  MODIFY `chucvu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_computer`
--
ALTER TABLE `tbl_computer`
  MODIFY `computer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_semester`
--
ALTER TABLE `tbl_detail_semester`
  MODIFY `detail_semester_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT cho bảng `tbl_dki_phong`
--
ALTER TABLE `tbl_dki_phong`
  MODIFY `dki_phong_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=597;

--
-- AUTO_INCREMENT cho bảng `tbl_ds_tkb`
--
ALTER TABLE `tbl_ds_tkb`
  MODIFY `ds_tkb_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_hocky`
--
ALTER TABLE `tbl_hocky`
  MODIFY `hocky_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_hocphan`
--
ALTER TABLE `tbl_hocphan`
  MODIFY `hocphan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_khoa`
--
ALTER TABLE `tbl_khoa`
  MODIFY `khoa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_lophp`
--
ALTER TABLE `tbl_lophp`
  MODIFY `sttlophp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_namhoc`
--
ALTER TABLE `tbl_namhoc`
  MODIFY `namhoc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_nhomhp`
--
ALTER TABLE `tbl_nhomhp`
  MODIFY `nhomhp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_nhomth`
--
ALTER TABLE `tbl_nhomth`
  MODIFY `nhom_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_room_details`
--
ALTER TABLE `tbl_room_details`
  MODIFY `room_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_software`
--
ALTER TABLE `tbl_software`
  MODIFY `software_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_suco`
--
ALTER TABLE `tbl_suco`
  MODIFY `suco_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_thu`
--
ALTER TABLE `tbl_thu`
  MODIFY `id_thu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_tuan`
--
ALTER TABLE `tbl_tuan`
  MODIFY `tuan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_version`
--
ALTER TABLE `tbl_version`
  MODIFY `version_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
