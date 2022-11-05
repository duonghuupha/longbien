-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 03:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `longbien`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `document_all`
-- (See below for the actual view)
--
CREATE TABLE `document_all` (
`id` varchar(13)
,`title` mediumtext
,`type` varchar(11)
,`category` mediumtext
);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_book`
--

CREATE TABLE `tbldm_book` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_book`
--

INSERT INTO `tbldm_book` (`id`, `title`, `user_id`, `status`, `create_at`) VALUES
(1, 'Sách tự nhiên - xã hội', 1, 0, '2022-07-24 22:22:58'),
(2, 'Sách xã hội - nhân văn', 1, 0, '2022-07-24 22:24:14'),
(3, 'Sách giáo khoa', 1, 0, '2022-07-24 22:24:40'),
(4, 'Sách tham khảo', 1, 0, '2022-07-24 22:24:52'),
(5, 'Thơ, truyện', 1, 0, '2022-07-24 22:25:46'),
(6, 'Sách, báo', 1, 0, '2022-07-24 22:25:18'),
(7, 'Truyện cổ tích', 1, 0, '2022-11-03 23:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_book_manu`
--

CREATE TABLE `tbldm_book_manu` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_book_manu`
--

INSERT INTO `tbldm_book_manu` (`id`, `title`, `user_id`, `status`, `create_at`) VALUES
(1, 'Nhà xuất bản giáo dục', 1, 0, '2022-07-24 22:25:56'),
(2, 'Nhà xuất bản lao động', 1, 0, '2022-07-24 22:26:04'),
(3, 'Nhà xuất bản quân hội', 1, 0, '2022-07-24 22:26:12'),
(4, 'Nhà xuất bản đại học quốc gia', 1, 0, '2022-07-24 22:26:26'),
(5, 'Nhà xuất bản phụ nữ', 1, 0, '2022-07-24 22:26:40'),
(6, 'Nhà xuất bản kim đồng', 1, 0, '2022-07-24 22:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_department`
--

CREATE TABLE `tbldm_department` (
  `id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `physical_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `class_study` int(11) NOT NULL,
  `is_default` int(11) NOT NULL,
  `is_function` int(11) NOT NULL COMMENT '1 la hieu bo,  2 la chuc nang',
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_department`
--

INSERT INTO `tbldm_department` (`id`, `year_id`, `physical_id`, `title`, `class_study`, `is_default`, `is_function`, `user_id`, `create_at`, `status`) VALUES
(1, 2, 1, 'Lớp 6A1', 1, 1, 0, 1, '2022-07-14 00:42:41', 0),
(2, 2, 2, 'Lớp 6A2', 1, 1, 0, 1, '2022-07-14 00:43:04', 0),
(3, 2, 3, 'Lớp 6A3', 1, 1, 0, 1, '2022-07-14 00:43:19', 0),
(4, 2, 4, 'Lớp 6A4', 1, 1, 0, 1, '2022-07-14 00:43:47', 0),
(5, 2, 5, 'Lớp 6A5', 1, 1, 0, 1, '2022-07-14 00:44:28', 0),
(6, 2, 6, 'Lớp 6A6', 1, 1, 0, 1, '2022-10-07 03:54:48', 0),
(19, 2, 7, 'Lớp 6A7', 1, 1, 0, 1, '2022-10-07 03:56:04', 0),
(20, 2, 8, 'Lớp  6A8', 1, 1, 0, 1, '2022-10-07 03:56:16', 0),
(21, 2, 9, 'Lớp 7A1', 1, 1, 0, 1, '2022-10-07 03:56:32', 0),
(22, 2, 10, 'Lớp 7A2', 1, 1, 0, 1, '2022-10-07 03:56:49', 0),
(23, 2, 11, 'Lớp 7A3', 1, 1, 0, 1, '2022-10-07 03:57:03', 0),
(24, 2, 12, 'Lớp 7A4', 1, 1, 0, 1, '2022-10-07 03:57:17', 0),
(25, 2, 13, 'Lớp 7A5', 1, 1, 0, 1, '2022-10-07 03:57:53', 0),
(26, 2, 14, 'Lớp 7A6', 1, 1, 0, 1, '2022-10-07 03:58:07', 0),
(27, 2, 15, 'Lớp 8A1', 1, 1, 0, 1, '2022-10-07 03:58:23', 0),
(28, 2, 16, 'Lớp 8A2', 1, 1, 0, 1, '2022-10-07 03:58:34', 0),
(29, 2, 17, 'Lớp 8A3', 1, 1, 0, 1, '2022-10-07 03:58:53', 0),
(30, 2, 18, 'Lớp 8A4', 1, 1, 0, 1, '2022-10-07 03:59:09', 0),
(31, 2, 19, 'Lớp 8A5', 1, 1, 0, 1, '2022-10-07 03:59:21', 0),
(32, 2, 20, 'Lớp 8A6', 1, 1, 0, 1, '2022-10-07 03:59:35', 0),
(33, 2, 21, 'Lớp 9A1', 1, 1, 0, 1, '2022-10-07 04:01:01', 0),
(34, 2, 22, 'Lớp 9A2', 1, 1, 0, 1, '2022-10-07 04:01:10', 0),
(35, 2, 23, 'Lớp 9A3', 1, 1, 0, 1, '2022-10-07 04:01:19', 0),
(36, 2, 25, 'Lớp 9A4', 1, 1, 0, 1, '2022-10-07 04:01:26', 0),
(37, 2, 26, 'Lớp 9A5', 1, 1, 0, 1, '2022-10-07 04:01:35', 0),
(38, 2, 27, 'Lớp 9A6', 1, 1, 0, 1, '2022-10-07 04:01:42', 0),
(39, 2, 28, 'Lớp 9A7', 1, 1, 0, 1, '2022-10-07 04:01:49', 0),
(40, 2, 29, 'Phòng thực hành vật lý', 0, 0, 2, 1, '2022-10-22 20:00:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_document`
--

CREATE TABLE `tbldm_document` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_document`
--

INSERT INTO `tbldm_document` (`id`, `parent_id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 0, 'Phòng giáo dục', 1, '2022-07-20 23:56:25', 0),
(2, 1, 'Kế hoạch', 1, '2022-07-20 20:34:54', 0),
(3, 1, 'Quyết định', 1, '2022-07-20 20:35:06', 0),
(4, 1, 'Công văn', 1, '2022-07-20 20:36:34', 0),
(5, 1, 'Hướng dẫn', 1, '2022-07-20 20:38:41', 0),
(6, 1, 'Văn bản khác', 1, '2022-07-20 20:38:53', 0),
(7, 2, 'Kế hoạch tháng', 1, '2022-07-20 23:56:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_equipment`
--

CREATE TABLE `tbldm_equipment` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_equipment`
--

INSERT INTO `tbldm_equipment` (`id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 'Máy móc thiết bị văn phòng phổ biến', 1, '2022-07-13 21:48:22', 0),
(2, 'Máy móc, thiết bị phục vụ hoạt động chung của cơ quan, tổ chức, đơn vị', 1, '2022-07-13 21:48:43', 0),
(3, 'Máy móc, thiết bị chuyên dùng', 1, '2022-07-13 21:48:56', 0),
(4, 'Máy móc thiết bị khác', 1, '2022-07-13 21:50:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_job`
--

CREATE TABLE `tbldm_job` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_teacher` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_job`
--

INSERT INTO `tbldm_job` (`id`, `title`, `user_id`, `is_teacher`, `create_at`, `status`) VALUES
(1, 'Giáo viên', 1, 1, '2022-07-11 15:35:31', 0),
(2, 'Phó hiệu trưởng', 1, 0, '2022-07-11 15:35:51', 0),
(3, 'Hiệu trưởng', 1, 0, '2022-07-11 15:35:59', 0),
(4, 'Bảo vệ', 1, 0, '2022-07-11 15:36:06', 0),
(5, 'Hành chính nhân sự', 1, 0, '2022-07-11 15:36:15', 0),
(6, 'Kế toán', 1, 0, '2022-07-11 15:36:20', 0),
(7, 'Thủ quỹ', 1, 0, '2022-07-11 15:36:24', 0),
(8, 'Văn thư', 1, 0, '2022-07-11 15:36:29', 0),
(9, 'Nhân viên', 1, 0, '2022-07-11 15:36:36', 0),
(10, 'Nhân viên CNTT', 1, 0, '2022-07-11 15:36:42', 0),
(11, 'Tạp vụ', 1, 0, '2022-09-10 16:18:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_level`
--

CREATE TABLE `tbldm_level` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_level`
--

INSERT INTO `tbldm_level` (`id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 'Trung cấp', 1, '2022-07-11 15:24:44', 0),
(2, 'Cao đẳng', 1, '2022-07-11 15:25:28', 0),
(3, 'Đại học', 1, '2022-07-11 15:30:25', 0),
(4, 'Thạc sĩ', 1, '2022-07-11 15:30:38', 0),
(5, 'Tiến sĩ', 1, '2022-07-11 15:30:45', 0),
(6, 'Phó giáo sư', 1, '2022-07-11 15:30:56', 0),
(7, 'Giáo sư', 1, '2022-07-11 15:31:04', 1),
(8, 'Trung học phổ thông 1', 1, '2022-07-12 17:02:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_people`
--

CREATE TABLE `tbldm_people` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_people`
--

INSERT INTO `tbldm_people` (`id`, `title`) VALUES
(2, 'Kinh'),
(3, 'Tày'),
(4, 'Thái'),
(5, 'Hoa'),
(6, 'Khơ-me'),
(7, 'Mường'),
(8, 'Nùng'),
(9, 'Hmông'),
(10, 'Dao'),
(11, 'Gia-rai'),
(12, 'Ngái'),
(13, 'Ê-đê'),
(14, 'Ba-na'),
(15, 'Xơ-đăng'),
(16, 'Sán Chay'),
(17, 'Cơ-ho'),
(18, 'Chăm'),
(19, 'Sán Dìu'),
(20, 'Hrê'),
(21, 'Mnông'),
(22, 'Ra-glai'),
(23, 'Xtiêng'),
(24, 'Bru-Vân Kiều'),
(25, 'Thổ'),
(26, 'Giáy'),
(27, 'Cơ-tu'),
(28, 'Gié-Triêng'),
(29, 'Mạ'),
(30, 'Khơ-mú'),
(31, 'Co'),
(32, 'Ta-ôi'),
(33, 'Chơ-ro'),
(34, 'Kháng'),
(35, 'Xinh-mun'),
(36, 'Hà Nhì'),
(37, 'Chu-ru'),
(38, 'Lào'),
(39, 'La Chi'),
(40, 'La Ha'),
(41, 'Phù Lá'),
(42, 'La Hủ'),
(43, 'Lự'),
(44, 'Lô Lô'),
(45, 'Chứt'),
(46, 'Mảng'),
(47, 'Pà Thẻn'),
(48, 'Cơ Lao'),
(49, 'Cống'),
(50, 'Bố Y'),
(51, 'Si La'),
(52, 'Pu Péo'),
(53, 'Brâu'),
(54, 'Ơ Đu'),
(55, 'Rơ-măm');

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_physical_room`
--

CREATE TABLE `tbldm_physical_room` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `region` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_physical_room`
--

INSERT INTO `tbldm_physical_room` (`id`, `title`, `region`, `floor`, `user_id`, `create_at`, `status`) VALUES
(1, 'Phòng A101', 1, 1, 1, '2022-07-13 23:30:54', 0),
(2, 'Phòng A102', 1, 1, 1, '2022-07-13 23:30:54', 0),
(3, 'Phòng A103', 1, 1, 1, '2022-07-13 23:30:54', 0),
(4, 'Phòng A104', 1, 1, 1, '2022-07-13 23:30:54', 0),
(5, 'Phòng A105', 1, 1, 1, '2022-07-13 23:30:54', 0),
(6, 'Phòng A106', 1, 1, 1, '2022-07-13 23:30:54', 0),
(7, 'Phòng A107', 1, 1, 1, '2022-07-13 23:30:54', 0),
(8, 'Phòng A108', 1, 1, 1, '2022-07-13 23:30:54', 0),
(9, 'Phòng A109', 1, 1, 1, '2022-07-13 23:30:54', 0),
(10, 'Phòng A110', 1, 1, 1, '2022-07-13 23:30:54', 0),
(11, 'Phòng A111', 1, 1, 1, '2022-07-13 23:30:54', 0),
(12, 'Phòng A112', 1, 1, 1, '2022-07-13 23:30:54', 0),
(13, 'Phòng A201', 1, 2, 1, '2022-07-13 23:30:54', 0),
(14, 'Phòng A202', 1, 2, 1, '2022-07-13 23:30:54', 0),
(15, 'Phòng A203', 1, 2, 1, '2022-07-13 23:30:54', 0),
(16, 'Phòng A204', 1, 2, 1, '2022-07-13 23:30:54', 0),
(17, 'Phòng A205', 1, 2, 1, '2022-07-13 23:30:54', 0),
(18, 'Phòng A206', 1, 2, 1, '2022-07-13 23:30:54', 0),
(19, 'Phòng A207', 1, 2, 1, '2022-07-13 23:30:54', 0),
(20, 'Phòng A208', 1, 2, 1, '2022-07-13 23:30:54', 0),
(21, 'Phòng A301', 1, 3, 1, '2022-10-07 04:00:05', 0),
(22, 'Phòng A302', 1, 3, 1, '2022-10-07 04:00:10', 0),
(23, 'Phòng A303', 1, 3, 1, '2022-10-07 04:00:16', 0),
(24, 'Phòng A303', 1, 3, 1, '2022-10-07 04:00:22', 0),
(25, 'Phòng A304', 1, 3, 1, '2022-10-07 04:00:27', 0),
(26, 'Phòng A305', 1, 3, 1, '2022-10-07 04:00:32', 0),
(27, 'Phòng A306', 1, 3, 1, '2022-10-07 04:00:39', 0),
(28, 'Phòng A307', 1, 3, 1, '2022-10-07 04:00:44', 0),
(29, 'Phòng A308', 1, 1, 1, '2022-10-22 20:00:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_quanlity`
--

CREATE TABLE `tbldm_quanlity` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_quanlity`
--

INSERT INTO `tbldm_quanlity` (`id`, `title`, `create_at`, `status`) VALUES
(1, 'Kiểm định chất lượng giai đoạn 2022 - 2027', '2022-09-26 16:37:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_quanlity_criteria`
--

CREATE TABLE `tbldm_quanlity_criteria` (
  `id` int(11) NOT NULL,
  `quanlity_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_quanlity_criteria`
--

INSERT INTO `tbldm_quanlity_criteria` (`id`, `quanlity_id`, `standard_id`, `title`) VALUES
(1, 1, 1, 'Tiêu chí 1: Quyết định thành lập hội đồng trường'),
(3, 1, 1, 'Tiêu chí 2: Kế hoạch thực hiện nhiệm vụ năm học'),
(4, 1, 3, 'Tiêu chí 1: Hồ sơ dự giờ của ban giám hiệu'),
(5, 1, 3, 'Tiêu chí 2: Sổ điểm học sinh');

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_quanlity_standard`
--

CREATE TABLE `tbldm_quanlity_standard` (
  `id` int(11) NOT NULL,
  `quanlity_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_quanlity_standard`
--

INSERT INTO `tbldm_quanlity_standard` (`id`, `quanlity_id`, `title`) VALUES
(1, 1, 'Tiêu chuẩn 1:  Hồ sơ quản lý'),
(3, 1, 'Tiêu chuẩn 2:  Công tác chuyên môn');

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_realtion`
--

CREATE TABLE `tbldm_realtion` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_realtion`
--

INSERT INTO `tbldm_realtion` (`id`, `title`) VALUES
(1, 'Bố'),
(2, 'Mẹ'),
(3, 'Ông'),
(4, 'Bà'),
(5, 'Anh'),
(6, 'Chị'),
(7, 'Em'),
(8, 'Cô'),
(9, 'Dì'),
(10, 'Chú'),
(11, 'Bác'),
(12, 'Cậu'),
(13, 'Mợ');

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_subject`
--

CREATE TABLE `tbldm_subject` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `set_point` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_subject`
--

INSERT INTO `tbldm_subject` (`id`, `title`, `user_id`, `create_at`, `set_point`, `status`) VALUES
(1, 'Toán', 1, '2022-08-29 00:11:43', 1, 0),
(2, 'Tin học', 1, '2022-08-29 00:11:40', 1, 0),
(3, 'Ngữ văn', 1, '2022-08-29 00:11:36', 1, 0),
(4, 'Lịch sử', 1, '2022-08-29 00:11:32', 1, 0),
(5, 'Sinh học', 1, '2022-08-29 00:11:29', 1, 0),
(6, 'Hóa học', 1, '2022-08-29 00:11:26', 1, 0),
(7, 'Địa lý', 1, '2022-08-29 00:11:23', 1, 0),
(8, 'Vật  lý', 1, '2022-08-29 00:11:20', 1, 0),
(9, 'Giáo dục thể chất', 1, '2022-08-29 00:10:38', 1, 0),
(10, 'Kế toán - Tài chính', 1, '2022-07-11 23:03:36', 0, 0),
(11, 'Quản lý giáo dục', 1, '2022-07-11 23:03:47', 0, 0),
(12, 'Bảo vệ', 1, '2022-07-11 23:03:52', 0, 0),
(13, 'Công nghệ thông tin', 1, '2022-07-11 23:04:02', 0, 0),
(14, 'Công nghệ', 1, '2022-08-29 01:42:27', 1, 0),
(15, 'Ngoại ngữ (Tiếng Anh)', 1, '2022-10-07 02:46:03', 1, 0),
(16, 'Nghệ thuật (Mỹ thuật)', 1, '2022-10-07 02:49:56', 1, 0),
(17, 'Nghệ thuật (Âm nhạc)', 1, '2022-10-07 02:50:09', 1, 0),
(18, 'Giáo dục công dân', 1, '2022-10-07 02:51:22', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_utensils`
--

CREATE TABLE `tbldm_utensils` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_utensils`
--

INSERT INTO `tbldm_utensils` (`id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 'Đồ dùng Vật Lý', 1, '2022-07-13 21:55:51', 0),
(2, 'Đồ dùng Hóa Học', 1, '2022-07-13 21:56:28', 0),
(3, 'Đồ dùng Địa lý', 1, '2022-07-13 21:58:18', 0),
(4, 'Đồ dùng Sinh học', 1, '2022-07-13 21:58:29', 0),
(5, 'Đồ dùng GDTC', 1, '2022-07-13 21:58:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_works`
--

CREATE TABLE `tbldm_works` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_works`
--

INSERT INTO `tbldm_works` (`id`, `group_id`, `title`, `create_at`, `status`) VALUES
(1, 4, 'Tài chính', '2022-10-01 23:58:37', 1),
(2, 4, 'Chuyên môn', '2022-10-01 23:58:09', 1),
(3, 4, 'Mô hình trường học điện tử', '2022-10-01 23:58:20', 1),
(4, 4, 'Văn thư lưu trữ', '2022-10-01 23:58:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_works_group`
--

CREATE TABLE `tbldm_works_group` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_works_group`
--

INSERT INTO `tbldm_works_group` (`id`, `title`, `create_at`, `status`) VALUES
(4, 'Hồ sơ kiêm tra công vụ năm học 2022-2023', '2022-10-01 23:51:00', 1),
(5, 'Hồ sơ kiểm tra mô hình trường học điện tử năm học 2022-2023', '2022-10-02 00:20:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldm_years`
--

CREATE TABLE `tbldm_years` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_years`
--

INSERT INTO `tbldm_years` (`id`, `title`, `active`, `user_id`, `create_at`, `status`) VALUES
(1, 'Năm học 2000 - 2001', 0, 1, '2022-07-11 18:28:39', 1),
(2, 'Năm học 2022-2023', 1, 1, '2022-07-12 17:05:30', 0),
(3, 'Năm học 2023-2022', 0, 1, '2022-07-12 17:06:35', 1),
(4, 'Năm học 2023-2024', 0, 1, '2022-07-12 21:34:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`id`, `code`, `user_id`, `year_id`, `create_at`) VALUES
(1, 1665727701, 59, 2, '2022-10-14 13:08:21'),
(2, 1665744816, 58, 2, '2022-10-15 23:43:08');

--
-- Triggers `tbl_assign`
--
DELIMITER $$
CREATE TRIGGER `del_assign_detail_after_del_assign` AFTER DELETE ON `tbl_assign` FOR EACH ROW DELETE FROM tbl_assign_detail WHERE tbl_assign_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_detail`
--

CREATE TABLE `tbl_assign_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_assign_detail`
--

INSERT INTO `tbl_assign_detail` (`id`, `code`, `subject_id`, `department`, `create_at`) VALUES
(1, 1665727701, 18, '38,39,37', '2022-10-14 00:00:00'),
(4, 1665744816, 8, '39,38,37,36', '2022-10-15 23:43:08'),
(5, 1665744816, 1, '32,31,30', '2022-10-15 23:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attend`
--

CREATE TABLE `tbl_attend` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `number_page` int(11) NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `code`, `cate_id`, `manu_id`, `title`, `content`, `number_page`, `author`, `image`, `type`, `file`, `status`, `user_id`, `create_at`, `stock`) VALUES
(1, 24208023, 1, 1, 'Bài Tập Tiếng Anh Lớp 8 - Không Đáp Án (2020)', 'Bài Tập Tiếng Anh 8 được biên soạn dưới dạng vở bài tập, dựa theo sách giáo khoa Tiếng Anh 8 của Bộ Giáo Dục và Đào Tạo.\r\nBài Tập Tiếng Anh 8 là tập hợp các bài tập thực hành về từ vựng (vocabulary), ngữ pháp (grammar), đàm thoại (conversation) và đọc hiểu (reading comprehension), nhằm giúp học sinh luyện tập các nội dung trọng tâm của bài học. Các bài tập được biên soạn theo từng đơn vị bài học (Unit), gồm hai phần A và B có nội dung tương ứng với các phần bài học trong sách giáo khoa.\r\nSau phần bài tập của mỗi đơn vị bài học có một bài kiểm tra (Test For Unit), sau 4 đơn vị bài học có bài tự kiểm tra (Test Yourself) được soạn như bài kiểm tra một tiết và sau Unit 8 và Unit 16 có hai bài kiểm tra học kì nhằm giúp các em ôn luyện và củng cố kiến thức đã học.', 128, 'Mai Lan Hương, Nguyễn Thanh Loan', '1658719665_img_library.jpg', 1, '1658719665_file_library.jpg', 0, 1, '2022-07-26 22:35:43', 12),
(2, 51823420, 3, 1, 'Sách giáo khoa học sinh toán 6 tập 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 115, 'Nhóm  tác giả chân trời sáng tạo', '1658857260_img_library.png', 2, '1658857260_file_library.pdf', 0, 1, '2022-08-30 09:48:58', 0),
(3, 48664542, 1, 1, 'Sách giáo khoa tin học 6 - tập 1', 'Làm quen với máy tính', 120, 'Nhóm tác giả kết nối tri thức', '', 1, '', 0, 1, '2022-10-30 22:22:12', 10),
(4, 84327607, 1, 1, 'Pythton rất là cơ bản', 'Hiện nay, Python là một trong những ngôn ngữ lập trình\r\nđang được chú ý bởi tính đa dạng về ứng dụng, thư viện\r\nphong phú và cộng đồng đông đảo.', 92, 'Võ Duy Tuấn', '', 2, '1667490712_file_library.pdf', 0, 1, '2022-11-03 22:51:52', 0),
(5, 89255879, 2, 1, 'Sách giáo khoa ngữ văn 6 tập 1', 'Sách giáo khoa ngữ văn 6 tập 1', 120, 'Nhóm tác giả kết nối tri thức', '', 1, '', 0, 1, '2022-11-03 22:53:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_loan`
--

CREATE TABLE `tbl_book_loan` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `sub_book` int(11) NOT NULL,
  `date_loan` datetime NOT NULL,
  `date_return` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_book_loan`
--

INSERT INTO `tbl_book_loan` (`id`, `code`, `user_create`, `user_id`, `student_id`, `book_id`, `sub_book`, `date_loan`, `date_return`, `status`, `create_at`) VALUES
(1, 1667407156, 1, 0, 1097, 1, 1, '2022-11-02 23:39:16', '0000-00-00 00:00:00', 0, '2022-11-02 23:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_read`
--

CREATE TABLE `tbl_book_read` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `time_read` datetime NOT NULL,
  `info_read` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_return`
--

CREATE TABLE `tbl_book_return` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `sub_book` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 la thu hoi; 2 la khoi phuc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_change_class`
--

CREATE TABLE `tbl_change_class` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `year_id_from` int(11) NOT NULL,
  `department_id_from` int(11) NOT NULL,
  `year_id_to` int(11) NOT NULL,
  `department_id_to` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_change_class`
--

INSERT INTO `tbl_change_class` (`id`, `student_id`, `year_id_from`, `department_id_from`, `year_id_to`, `department_id_to`, `content`, `create_at`) VALUES
(1, 52, 2, 1, 2, 2, 'Thay đổi nguyện vọng học ngoại ngữ', '2022-10-12 16:20:12'),
(2, 52, 2, 2, 2, 1, 'Chuyển nhầm', '2022-10-12 16:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_change_device`
--

CREATE TABLE `tbl_change_device` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `physical_from_id` int(11) NOT NULL,
  `physical_to_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `sub_device` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_change_point`
--

CREATE TABLE `tbl_change_point` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `point_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` float NOT NULL,
  `status` int(11) NOT NULL,
  `user_app` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_change_point`
--

INSERT INTO `tbl_change_point` (`id`, `code`, `point_id`, `user_id`, `point`, `status`, `user_app`, `content`, `file`, `create_at`) VALUES
(3, 1667441967, 1, 58, 8, 1, 58, 'Kiểm tra  lại', '', '2022-11-03 09:19:27'),
(4, 1667441990, 2, 58, 7, 2, 1, 'Chấm lại bài', '', '2022-11-03 22:27:47'),
(6, 1667466869, 3, 58, 8, 1, 1, 'Chấm  lại bài', '1667466869_change_point.xlsx', '2022-11-03 22:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department_loan`
--

CREATE TABLE `tbl_department_loan` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_loan` int(11) NOT NULL,
  `date_loan` datetime NOT NULL,
  `date_return` datetime NOT NULL,
  `department_id` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_devices`
--

CREATE TABLE `tbl_devices` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `depreciation` float NOT NULL,
  `year_work` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Sử dụng để kiểm soát việc import dữ liệu từ file'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_devices`
--

INSERT INTO `tbl_devices` (`id`, `code`, `title`, `cate_id`, `origin`, `price`, `depreciation`, `year_work`, `image`, `description`, `stock`, `status`, `user_id`) VALUES
(26, 12345678, 'Máy tính giáo viên Core I5', 0, 'Việt Nam', 14020000, 20, 2022, '', '', 15, 1, 0),
(27, 12345679, 'Máy tính học sinh Core I3', 1, 'Việt Nam', 14020000, 20, 2023, '', '', 10, 1, 0),
(28, 12345680, 'Bảng tương tác thông minh', 0, 'Việt Nam', 14020000, 20, 2024, '', '', 10, 1, 0),
(29, 12345681, 'Samsung smart tivi 5 inch', 0, 'Việt Nam', 14020000, 20, 2025, '', '', 17, 1, 0),
(30, 12345682, 'Máy chiếu siêu gần Hitachi', 0, 'Việt Nam', 14020000, 20, 2026, '', '', 10, 1, 0),
(31, 12345683, 'Máy chiếu đa năng kỹ thuật số Panasonic', 0, 'Việt Nam', 14020000, 20, 2027, '', '', 14, 1, 0),
(32, 12345684, 'Máu tin Canon LBP151DW', 0, 'Việt Nam', 14020000, 20, 2028, '', '', 15, 1, 0),
(33, 12345685, 'Loa Microlap M108', 3, 'Việt Nam', 14020000, 20, 2029, '', '', 10, 1, 0),
(34, 12345686, 'Thiết bị trợ giảng, mic gài', 0, 'Việt Nam', 14020000, 20, 2030, '', '', 10, 1, 0),
(35, 48320702, 'Đàn organ Yamaha 670s', 3, 'Trung quốc', 19020000, 20, 2022, '', '', 10, 1, 0),
(61, 66254515, 'asdfasdf', 1, 'asdf', 23452300, 21, 2134, '', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_device_import`
--

CREATE TABLE `tbl_device_import` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date_import` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_device_import`
--

INSERT INTO `tbl_device_import` (`id`, `code`, `date_import`, `user_id`, `source`, `notes`, `create_at`) VALUES
(2, 1666374036, '2022-10-22', 1, 'Mua sắm tập trung', '', '2022-10-22 00:40:36');

--
-- Triggers `tbl_device_import`
--
DELIMITER $$
CREATE TRIGGER `del_import_device_detail_after_del_import_device` AFTER DELETE ON `tbl_device_import` FOR EACH ROW DELETE FROM tbl_device_import_detail WHERE tbl_device_import_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_device_import_detail`
--

CREATE TABLE `tbl_device_import_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_device_import_detail`
--

INSERT INTO `tbl_device_import_detail` (`id`, `code`, `device_id`, `quantily`) VALUES
(4, 1666374036, 32, 5),
(5, 1666374036, 31, 4),
(6, 1666374036, 26, 5),
(7, 1666374036, 29, 7);

--
-- Triggers `tbl_device_import_detail`
--
DELIMITER $$
CREATE TRIGGER `update_stock_device_after_insert_import_device` AFTER INSERT ON `tbl_device_import_detail` FOR EACH ROW UPDATE tbl_devices SET stock = (stock + new.quantily) WHERE tbl_devices.id = new.device_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock_devices_after_del_import_device` AFTER DELETE ON `tbl_device_import_detail` FOR EACH ROW UPDATE tbl_devices SET stock = (stock - old.quantily) WHERE tbl_devices.id = old.device_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_device_repair`
--

CREATE TABLE `tbl_device_repair` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date_repair` date NOT NULL,
  `agency` text COLLATE utf8_unicode_ci NOT NULL,
  `file_bb` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_device_repair`
--

INSERT INTO `tbl_device_repair` (`id`, `code`, `date_repair`, `agency`, `file_bb`, `user_id`, `create_at`) VALUES
(4, 1667369884, '2022-11-02', 'Công ty NTHH Ngọc Đạt', '1667369884_repair.png', 1, '2022-11-02 13:18:04');

--
-- Triggers `tbl_device_repair`
--
DELIMITER $$
CREATE TRIGGER `del_repair_detail_after_del_repair` AFTER DELETE ON `tbl_device_repair` FOR EACH ROW DELETE FROM tbl_device_repair_detail WHERE tbl_device_repair_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_device_repair_detail`
--

CREATE TABLE `tbl_device_repair_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `sub_device` int(11) NOT NULL,
  `content_error` text COLLATE utf8_unicode_ci NOT NULL,
  `content_repair` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_device_repair_detail`
--

INSERT INTO `tbl_device_repair_detail` (`id`, `code`, `device_id`, `sub_device`, `content_error`, `content_repair`) VALUES
(9, 1667369884, 31, 1, 'Demo', 'Demo'),
(10, 1667369884, 26, 1, 'DEmo', 'Demi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_in`
--

CREATE TABLE `tbl_document_in` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `number_in` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `number_dc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_dc` date NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_share` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_document_in`
--

INSERT INTO `tbl_document_in` (`id`, `code`, `cate_id`, `number_in`, `date_in`, `number_dc`, `date_dc`, `title`, `content`, `user_id`, `user_share`, `create_at`, `file`, `status`) VALUES
(4, 1666972114, 1, 1, '2022-10-28', '01/KH-UBND', '2022-10-01', 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, '', '2022-10-28 22:48:34', '1666972114_document_in.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_out`
--

CREATE TABLE `tbl_document_out` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `number_dc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_dc` date NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `location_to` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_share` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_document_out`
--

INSERT INTO `tbl_document_out` (`id`, `code`, `cate_id`, `number_dc`, `date_dc`, `title`, `content`, `file`, `location_to`, `user_id`, `user_share`, `type`, `status`, `create_at`) VALUES
(1, 1658653214, 7, '01/KH-THCSLB', '2022-07-05', 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1658652330_document_out.docx', '', 1, '4,3', 2, 1, '2022-07-24 16:00:14'),
(2, 1663468886, 3, '01/QĐ-THCSLB', '2022-07-24', 'Section 1.10.33 of de Finibus Bonorum et Malorum', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium', '1658673421_document_out.html', 'THCS Long Biên', 1, '3', 1, 1, '2022-09-18 09:41:26'),
(3, 1666972747, 1, '01/QĐ-THCSLB', '2022-10-27', 'Traducció de H. Rackham de 1914', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.', '1666972747_document_out.xlsx', 'THCS Long Biên', 1, '', 1, 0, '2022-10-28 22:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_export`
--

CREATE TABLE `tbl_export` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `physical_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_export`
--

INSERT INTO `tbl_export` (`id`, `code`, `year_id`, `physical_id`, `create_at`) VALUES
(9, 1657388721, 2, 1, '2022-08-29 01:46:26'),
(10, 1657388764, 2, 3, '2022-10-20 11:32:34');

--
-- Triggers `tbl_export`
--
DELIMITER $$
CREATE TRIGGER `del_export_dettail_after_del_export` AFTER DELETE ON `tbl_export` FOR EACH ROW DELETE FROM tbl_export_detail WHERE tbl_export_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_export_detail`
--

CREATE TABLE `tbl_export_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `sub_device` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 là phân bổ; 1 là luân chuyển; 2 là thu hồi',
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_export_detail`
--

INSERT INTO `tbl_export_detail` (`id`, `code`, `device_id`, `sub_device`, `status`, `create_at`) VALUES
(24, 1657388721, 31, 1, 0, '2022-08-29 01:46:26'),
(25, 1657388721, 26, 1, 0, '2022-08-29 01:46:26'),
(26, 1657388764, 34, 1, 0, '2022-10-20 11:32:34'),
(27, 1657388764, 26, 2, 0, '2022-10-20 11:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_role`
--

CREATE TABLE `tbl_group_role` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `roles` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_group_role`
--

INSERT INTO `tbl_group_role` (`id`, `code`, `title`, `roles`, `status`, `create_at`) VALUES
(1, 1663899640, 'Giáo viên', '6,8,9,10,52,52_1,52_2,52_3,11,55,55_1,55_2,55_3,13,14,18,19,25,25_6,28,31,31_6,33,37,39,40,40_5,43,43_5,56,5,5_1,5_2,5_3', 1, '2022-10-31 09:17:48'),
(2, 1664127781, 'Hành chính nhân sự', '1,2,2_1,2_2,2_3,3,3_1,3_2,3_3,4,4_5,6,7,7_1,7_2,7_3,8,8_1,8_2,8_3,9,9_1,9_2,9_3,10,11,12,12_1,12_2,12_3,12_4,12_5,13,14,14_1,14_2,14_3,14_4,14_5,15,16,17,19,20,20_1,20_2,20_3,20_4,21,22,23,24,25,25_1,25_6,26,27,27_1,28,29,29_1,29_2,29_3,29_4,30,31,31_1', 1, '2022-09-26 01:04:09'),
(3, 1665055113, 'Quản trị', '1,2,2_1,2_2,2_3,3,3_1,3_2,3_3,4,4_5,6,7,7_1,7_2,7_3,8,8_1,8_2,8_3,9,9_1,9_2,9_3,10,50,51,51_1,51_2,51_3,52,52_1,52_2,52_3,11,53,54,55,55_1,55_2,55_3,12,12_1,12_2,12_3,12_4,12_5,13,14,14_1,14_2,14_3,14_4,14_5,15,16,17,18,18_7,19,20,20_1,20_2,20_3,20_4,21,22,23,24,25,25_1,25_6,26,27,27_1,28,29,29_1,29_2,29_3,29_4,30,31,31_1,31_6,32,32_1,33,34,34_1,34_2,34_3,35,35_1,35_2,35_3,36,37,37_1,38,38_1,39,40,40_5,41,41_5,42,42_5,43,43_5,44,44_5,45,45_5,46,46_5,47,48,48_1,48_2,48_3,49,49_1,49_2,49_3,56,57,57_1,57_2,57_3,5,5_1,5_2,5_3', 1, '2022-10-06 18:22:50'),
(4, 1665055629, 'Hiệ trưởng', '1,2,2_1,2_2,2_3,3,3_1,3_2,3_3,4,4_5,6,8,9,10,50,51,51_1,51_2,51_3,52,52_1,52_2,52_3,11,53,54,55,55_1,55_2,55_3,12,12_1,13,14,15,16,17,18,18_7,19,20,24,25,26,27,28,29,31,32,33,34,35,37,38,39,40,40_5,41,41_5,42,42_5,43,43_5,44,44_5,45,45_5,46,46_5,56,57,57_1,57_2,57_3,5', 1, '2022-10-06 18:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans`
--

CREATE TABLE `tbl_loans` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_loan` int(11) NOT NULL,
  `date_loan` datetime NOT NULL,
  `date_return` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 la mượn; 1 là trả hết, 2 là trả một phần, 3 là đặt lịch trước',
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `tbl_loans`
--
DELIMITER $$
CREATE TRIGGER `del_loans_detail_after_del_loans` AFTER DELETE ON `tbl_loans` FOR EACH ROW DELETE FROM tbl_loans_detail WHERE tbl_loans_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans_detail`
--

CREATE TABLE `tbl_loans_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `sub_device` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_return` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notify`
--

CREATE TABLE `tbl_notify` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_read` int(11) NOT NULL,
  `readed` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_notify`
--

INSERT INTO `tbl_notify` (`id`, `user_id`, `user_read`, `readed`, `title`, `link`, `create_at`) VALUES
(9, 3, 1, 1, 'Trao đổi / ý kiến công việc', 'http://localhost:81/longbien/tasks/detail?id=7', '2022-07-17 00:34:23'),
(15, 1, 4, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=13', '2022-07-18 16:20:28'),
(21, 1, 4, 0, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=17', '2022-08-26 10:31:10'),
(24, 1, 60, 0, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=1', '2022-10-19 03:37:47'),
(25, 1, 60, 0, 'Cập nhật nội dung công việc', 'http://localhost:81/longbien/tasks/detail?id=1', '2022-10-21 10:01:26'),
(26, 1, 60, 0, 'Cập nhật nội dung công việc', 'http://localhost:81/longbien/tasks/detail?id=1', '2022-10-21 10:01:26'),
(27, 1, 0, 0, 'Bạn có văn bản mới: The standard Lorem Ipsum passage, used since the 1500s', 'http://localhost:81/longbien/document_in', '2022-10-28 22:48:34'),
(28, 1, 0, 0, 'Bạn có văn bản mới: Traducció de H. Rackham de 1914', 'http://localhost:81/longbien/document_out', '2022-10-28 22:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personel`
--

CREATE TABLE `tbl_personel` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `level_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_personel`
--

INSERT INTO `tbl_personel` (`id`, `code`, `fullname`, `gender`, `birthday`, `level_id`, `job_id`, `subject`, `phone`, `address`, `avatar`, `description`, `status`, `email`) VALUES
(154, 1234567890, 'Nguyễn Thị Diệu Thúy', 2, '1975-07-01', 5, 3, '3', '0984520496', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thuyhao7574@gmail.com'),
(155, 1234567891, 'Cao Thị Phương Anh', 2, '1985-07-01', 3, 1, '1,2,8', '0977901007', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'caophuonganh240185@gmail.com'),
(156, 1234567892, 'Mai Hoài Thanh', 2, '1969-07-01', 3, 1, '3', '0854239888', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'maihoaithanh142@gmail.com'),
(157, 1234567893, 'Tô Thị Kim Thoa', 2, '1985-07-01', 4, 1, '3', '0975537983', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thoattk112@gmail.com'),
(158, 1234567894, 'Nguyễn Tuấn Hiệp', 1, '1999-07-01', 2, 1, '3', '0333586599', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hiep280599@gmail.com'),
(159, 1234567895, 'Dương Thị Hồng Nhung', 2, '1981-07-01', 4, 1, '3,18', '0915565493', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'tamanh2007@gmail.com'),
(160, 1234567896, 'Ngô Thị Thủy', 2, '1987-07-01', 4, 1, '3', '0982883920', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thuynep298@gmail.com'),
(161, 1234567897, 'Nguyễn Thị Bích Thuận', 2, '1988-07-01', 3, 1, '3,18', '0904601455', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thuanlongbien2018@gmail.com'),
(162, 1234567898, ' Trần Thị Giang', 2, '1991-07-01', 3, 1, '3', '0978573351', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'tranthigiangps@gmail.com'),
(163, 1234567899, 'Vũ Thị Hồng Tính', 2, '1980-07-01', 3, 1, '3,4', '0352124756', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hoachampa1980@gmail.com'),
(164, 1234567900, 'Nguyễn Thị Thanh Hoài', 2, '1998-07-01', 3, 1, '4', '0339606757', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thanhhoai300598@gmail.com'),
(165, 1234567901, 'Vũ Thị Giang', 2, '1993-07-01', 3, 1, '4', '0986510502', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'vuthigiang1234567@gmail.com'),
(166, 1234567902, 'Dương Mỹ Linh', 2, '1996-07-01', 3, 1, '3', '0336022162', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'duongmylinh.edu@gmail.com'),
(167, 1234567903, 'Nguyễn Thị Thu Trang', 2, '1997-07-01', 3, 1, '3', '0383903181', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'Nguyenthithutranghpu@gmail.com'),
(168, 1234567904, 'Trần Thị Hương Ly', 2, '1998-07-01', 3, 1, '3', '0355025151', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'lytran.longbien@gmail.com'),
(169, 1234567905, 'Trần Thúy An', 2, '1988-07-01', 4, 1, '3', '0983389586', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thuyantran1988@gmail.com'),
(170, 1234567906, 'Phạm Thị Thanh Thủy', 2, '1998-07-01', 3, 1, '18', '0384790112', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'Tthanhthuy1109@gmail.com'),
(171, 1234567907, 'Phạm Thị Hương', 2, '1985-07-01', 3, 1, '1,7', '0974009702', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'huongpham7585th@gmail.com'),
(172, 1234567908, 'Bùi Thị Trang', 2, '1988-07-01', 4, 1, '7', '0968533830', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'btrang166@gmail.com'),
(173, 1234567909, 'Hoàng Thanh Tuấn', 1, '1984-07-01', 3, 1, '17', '0982341618', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hoangthanhtuan197@gmail.com'),
(174, 1234567910, 'Phạm Ngọc Trực', 1, '1980-07-01', 2, 1, '16', '0943659695', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'trucden2@gmail.com'),
(175, 1234567911, ' Trần Thị Đậu', 2, '1987-07-01', 3, 1, '9', '0989122669', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'tueminh2711@gmail.com'),
(176, 1234567912, ' Phạm Cao Thắng', 1, '1988-07-01', 3, 1, '9', '0943966445', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'phamcaothang89@gmail.com'),
(177, 1234567913, 'Nguyễn Xuân Trường', 1, '1997-07-01', 3, 1, '9', '0363616754', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'truongtuson97@gmail.com'),
(178, 1234567914, 'Nguyễn Diệu Linh', 2, '1993-07-01', 2, 1, '3', '0356119317', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'linhvan37@gmail.com'),
(179, 1234567915, 'Đoàn Thị Lê', 2, '1987-07-01', 4, 1, '15', '0973895594', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'danledl87@gmail.com'),
(180, 1234567916, 'Nguyễn Thị Hiền', 2, '1976-07-01', 3, 1, '15', '0977942775', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hienhaund@gmail.com'),
(181, 1234567917, 'Nguyễn Thu Hằng', 2, '1994-07-01', 4, 1, '15', '0967976498', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hang3255@gmail.com'),
(182, 1234567918, 'Lê Hà Chi', 2, '1997-07-01', 4, 1, '15', '0966131611', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'lehachi5697@gmail.com'),
(183, 1234567919, 'Trần Thị Liên', 2, '1976-07-01', 3, 1, '15', '0795021268', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'lienanh0898@gmail.com'),
(184, 1234567920, 'Đinh Thị Thanh Chà', 2, '1973-07-01', 3, 1, '1,8', '0943973466', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'dinhthanhcha@gmail.com'),
(185, 1234567921, 'Trần Xuân Thành', 1, '1973-07-01', 3, 1, '1,2', '0965616432', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thanhaimo@gmail.com'),
(186, 1234567922, 'Phạm Thị Hiền', 2, '1978-07-01', 3, 1, '1,8', '0987172512', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'phamhiennd1978@gmail.com'),
(187, 1234567923, 'Chu Thị Thu', 2, '1991-07-01', 3, 1, '1', '0394324792', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'chuthu6868.edu@gmail.com'),
(188, 1234567924, 'Vũ Thị Bích Ngọc', 2, '1992-07-01', 3, 1, '1', '0364342499', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'vungoc01@gmail.com'),
(189, 1234567925, 'Nguyễn Thị Thanh Thúy', 2, '1984-07-01', 3, 1, '1,2', '0975274364', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'nguyenthithanhthuy26101984@gmail.com'),
(190, 1234567926, 'Thẩm T Minh Phương', 2, '1981-07-01', 3, 1, '1', '0963028737', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thamminhphuong@gmail.com'),
(191, 1234567927, 'Đào Hồng Liên', 2, '2000-07-01', 3, 1, '1', '0355417910', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'daohonglien1102@gmail.com'),
(192, 1234567928, 'Đào Thị Thu', 2, '1984-07-01', 3, 1, '1,8', '0932243038', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hungthutb2007@gmail.com'),
(193, 1234567929, 'Bùi Văn Hùng', 1, '1986-07-01', 3, 1, '1', '0989292889', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'hungbui.2509@gmail.com'),
(194, 1234567930, 'Nguyễn Hoàng Quân', 1, '1982-07-01', 3, 1, '1,8', '0988777856', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'quandungmyan@gmail.com'),
(195, 1234567931, 'Nguyễn Thị Loan', 2, '1990-07-01', 3, 1, '8', '0374537264', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'nguyenloan23041990@gmail.com'),
(196, 1234567932, 'Đào Thị Thanh Mai', 2, '1979-07-01', 3, 1, '5,6', '0989921678', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'thanhmaithcslb@gmail.com'),
(197, 1234567933, 'Nguyễn Thị Thanh Mai', 2, '1991-07-01', 4, 1, '6', '0966236816', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'nguyenthanhmai201191@gmail.com'),
(198, 1234567934, 'Quách Anh Tú', 1, '1990-07-01', 2, 1, '2', '0962348322', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'itc2saidong@gmail.com'),
(199, 1234567935, 'Nguyễn Hải Linh', 2, '1995-07-01', 3, 1, '1', '0979698648', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'nguyenhailinh0309@gmail.com'),
(200, 1234567936, 'Đào Thị Thanh Bình', 2, '1970-07-01', 3, 9, '', '0912950286', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'daothanhbinh1970@gmail.com'),
(201, 1234567937, 'Nguyễn Thị Mai Hoa', 2, '1983-07-01', 3, 9, '', '0987654321', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'demo@gmail.com'),
(202, 1234567938, 'Nguyễn Thị Hiền', 2, '1986-07-01', 1, 9, '', '0985126080', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'chunghienlinh@gmail.com'),
(203, 1234567939, 'Nguyễn Thị Thanh', 2, '1986-07-01', 3, 9, '', '0987654321', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'demo@gmail.com'),
(204, 1234567940, 'Lưu Thị Thu Huyền', 2, '1988-07-01', 2, 1, '', '0933332107', 'THCS Long Biên, phường Long Biên, Quận Long Biên, TP Hà Nội', '', '', 1, 'bongtom291803@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proof`
--

CREATE TABLE `tbl_proof` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `code_proof` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `file_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_proof`
--

INSERT INTO `tbl_proof` (`id`, `code`, `code_proof`, `criteria_id`, `title`, `file`, `file_link`, `create_at`, `user_id`, `status`) VALUES
(11, 1667578118, 'H01.01.01', 4, 'Biên bản dự giờ của hiệu trưởng', '', '4_1', '2022-11-04 23:17:55', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quanlity_role`
--

CREATE TABLE `tbl_quanlity_role` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `quanlity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `criteria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returns_device`
--

CREATE TABLE `tbl_returns_device` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `year_id` int(11) NOT NULL,
  `physical_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `sub_device` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 chua duyet, 1 da duyet, 2 Tu choi, 3 phuc hoi',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `functions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_position` int(11) NOT NULL,
  `icon` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `parent_id`, `title`, `link`, `functions`, `order_position`, `icon`) VALUES
(1, 0, 'Lịch làm việc', '#', '', 2, 'calendar'),
(2, 1, 'Nhóm công việc', 'group_task', '1,2,3', 1, ''),
(3, 1, 'Công việc', 'tasks', '1,2,3', 2, ''),
(4, 1, 'Lịch công tác', 'weekly', '5', 3, ''),
(5, 56, 'Lịch báo giảng', 'calendars', '1,2,3', 2, 'calendar-check-o'),
(6, 0, 'Văn bản', '#', '', 4, 'book'),
(7, 6, 'Danh mục', 'document_cate', '1,2,3', 1, ''),
(8, 6, 'Văn bản đến', 'document_in', '1,2,3', 2, ''),
(9, 6, 'Văn bản đi', 'document_out', '1,2,3', 3, ''),
(10, 0, 'Kiểm định CL', '#', '', 5, 'balance-scale'),
(11, 0, 'Hồ sơ công việc', '#', '', 6, 'briefcase'),
(12, 0, 'Nhân sự', 'personal', '1,2,3,4,5', 7, 'users'),
(13, 0, 'Học sinh', '#', '', 8, 'graduation-cap'),
(14, 13, 'Thông tin học sinh', 'student', '1,2,3,4,5', 1, ''),
(15, 13, 'Phân lớp', 'student_change', '', 2, ''),
(16, 13, 'Chuyển lớp', 'change_class', '', 3, ''),
(17, 13, 'Lên lớp', 'up_class', '', 4, ''),
(18, 13, 'Sổ điểm', 'student_point', '7', 5, ''),
(19, 0, 'Trang thiết bị', '#', '', 9, 'cubes'),
(20, 19, 'Thông tin thiết bị', 'devices', '1,2,3,4', 1, ''),
(21, 19, 'Nhập kho', 'import_device', '', 2, ''),
(22, 19, 'Phân bổ', 'export_device', '', 3, ''),
(23, 19, 'In mã thiết bị', 'qrcode_device', '', 4, ''),
(24, 19, 'Luân chuyển thiết bị', 'change_device', '', 5, ''),
(25, 19, 'Mượn - trả', 'loans', '1,6', 6, ''),
(26, 19, 'Sửa chữa nâng cấp', 'repair', '1,2,3', 7, ''),
(27, 19, 'Thu hồi - Khôi phục', 'returns', '1', 8, ''),
(28, 0, 'Đồ dùng dạy học', '#', '', 10, 'flask'),
(29, 28, 'Thông tin', 'gear', '1,2,3,4', 1, ''),
(30, 28, 'In mã đồ dùng', 'gear_code', '', 2, ''),
(31, 28, 'Mượn - trả', 'gear_loans', '1,6', 3, ''),
(32, 28, 'Thu hồi - Khôi phục', 'gear_return', '1', 4, ''),
(33, 0, 'Thư viện', '#', '', 11, 'book'),
(34, 33, 'Danh mục', 'lib_cate', '1,2,3', 1, ''),
(35, 33, 'Quản lý đầu sách', 'library', '1,2,3', 2, ''),
(36, 33, 'In mã đầu sách', 'lib_code', '', 3, ''),
(37, 33, 'Mượn - trả', 'lib_loans', '1', 4, ''),
(38, 33, 'Thu hồi - khôi phục', 'lib_return', '1', 5, ''),
(39, 0, 'Báo  cáo - Thống kê', '#', '', 12, 'bar-chart'),
(40, 39, 'Lịch báo giảng', '#', '5', 1, ''),
(41, 39, 'Văn bản', 'report_document', '5', 2, ''),
(42, 39, 'Nhân sự', 'report_personel', '5', 3, ''),
(43, 39, 'Học sinh', '#', '5', 4, ''),
(44, 39, 'Trang thiết bị', 'report_device', '5', 5, ''),
(45, 39, 'Đồ dùng dạy học', '#', '5', 6, ''),
(46, 39, 'Thư viện', '#', '5', 7, ''),
(47, 0, 'Quản lý người dùng', '#', '', 13, 'user'),
(48, 47, 'Quản lý người dùng', 'users', '1,2,3', 1, ''),
(49, 47, 'Nhóm quyền sử dụng', 'group_role', '1,2,3', 2, ''),
(50, 10, 'Danh mục', 'quanlity_cate', '', 1, ''),
(51, 10, 'Phân quyền tiêu chí', 'quanlity_role', '1,2,3', 2, ''),
(52, 10, 'Quản lý minh chứng', 'proof', '1,2,3', 3, ''),
(53, 11, 'Danh mục', '#', '', 1, ''),
(54, 11, 'Phân quyền danh mục', '#', '', 2, ''),
(55, 11, 'Quản lý hồ sơ', 'works', '1,2,3', 3, ''),
(56, 0, 'Chuyên môn', '#', '', 3, 'calendar-check-o'),
(57, 56, 'Phân công giáo viên', 'assign', '1,2,3', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `lesson_export` int(11) NOT NULL,
  `date_study` date NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `code`, `user_id`, `user_create`, `lesson`, `subject_id`, `department_id`, `lesson_export`, `date_study`, `title`, `create_at`) VALUES
(6, 1666766871, 58, 58, 1, 8, 36, 1, '2022-10-26', 'Cộng vận tốc', '2022-10-26 13:47:51'),
(7, 1666773709, 58, 58, 2, 8, 37, 2, '2022-10-26', 'Khúc xạ ánh sáng', '2022-10-26 15:41:49'),
(8, 1666773963, 58, 58, 3, 8, 38, 1, '2022-10-26', 'Cộng vận tốc', '2022-10-26 15:46:03');

--
-- Triggers `tbl_schedule`
--
DELIMITER $$
CREATE TRIGGER `del_device_gear_department_loan_after_del_schedule` AFTER DELETE ON `tbl_schedule` FOR EACH ROW BEGIN
DELETE FROM tbl_loans WHERE tbl_loans.code = old.code;
DELETE FROM tbl_utensils_loan WHERE tbl_utensils_loan.code = old.code;
DELETE FROM tbl_department_loan WHERE tbl_department_loan.code = old.code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `code` bigint(20) NOT NULL,
  `code_csdl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `people_id` int(11) NOT NULL,
  `religion` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `dep_temp` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Sử dụng đề kiểm soát việ import dữ liệu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `code`, `code_csdl`, `fullname`, `gender`, `birthday`, `people_id`, `religion`, `address`, `image`, `status`, `dep_temp`, `user_id`) VALUES
(48, 190275010638, '3818124653', 'Nguyễn Văn An', 1, '2011-08-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(49, 976348024604, '0117728286', 'Vũ Bình An', 1, '2011-07-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(50, 233197562622, '0117727220', 'Nguyễn Diệp Anh', 2, '2011-07-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(51, 212370244514, '0118429933', 'Nhâm Phương Anh', 2, '2011-03-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(52, 865747660679, '3817688742', 'Trần Đức Anh', 1, '2011-10-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(53, 821548090768, '0118464791', 'Lê Khả Quốc Bảo', 1, '2011-09-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(54, 131504432593, '3618473744', 'Nguyễn Huy Bình', 1, '2011-11-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(55, 141080860784, '0169223139', 'Phạm Mai Chi', 2, '2011-04-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(56, 458106865140, '0117728423', 'Nguyễn Quốc Đạt', 1, '2011-11-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(57, 237874411208, '0117727217', 'Dương Minh Đức', 1, '2011-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(58, 119194504799, '0117727676', 'Lê Anh Đức', 1, '2011-10-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(59, 683419483613, '0117727483', 'Nguyễn Thanh Hà', 2, '2011-05-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(60, 760926829781, '0117726942', 'Nguyễn Yên Hà', 2, '2011-05-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(61, 735185409184, '4017727560', 'Đặng Mai Hoàn', 2, '2011-06-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(62, 224333032548, '0117726973', 'Ngô Ngọc Hưng', 1, '2011-08-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(63, 921435544143, '0169223149', 'Nguyễn Gia Khải', 1, '2011-04-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(64, 437829841541, '0117727580', 'Ngô Quốc Khánh', 1, '2011-09-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(65, 984349683441, '4017727608', 'Nguyễn Đăng Khoa', 1, '2011-08-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(66, 178357202310, '0134467283', 'Phạm Minh Khuê', 2, '2011-11-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(67, 712607951247, '0117727094', 'Đào Chí Kiên', 1, '2011-05-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(68, 174132956580, '2717727514', 'Đỗ Tùng Lâm', 1, '2011-10-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(69, 266427817393, '0117727146', 'Thẩm Bảo Lâm', 1, '2011-08-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(70, 811057309763, '0117727024', 'Thẩm Tuệ Lâm', 2, '2011-03-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(71, 629356949147, '3415273527', 'Ngô Khánh Linh', 2, '2011-03-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(72, 489597379382, '0117727552', 'Nguyễn Lê Thủy Linh', 2, '2011-11-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(73, 340026504362, '0117727504', 'Trần Hà Linh', 2, '2011-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(74, 853634573940, '0117727495', 'Trần Phương Linh', 2, '2011-03-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(75, 337903234159, '2717728391', 'Đỗ Như Mai', 2, '2011-12-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(76, 607221800712, '0117728361', 'Ngô Vũ Xuân Mai', 2, '2011-06-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(77, 734396183131, '0117727347', 'Lê Anh Minh', 1, '2011-12-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(78, 771720132751, '0117902201', 'Ngô Trần Tuấn Minh', 1, '2011-05-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(79, 346200622757, '0117728158', 'Đỗ Uyên My', 2, '2011-04-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(80, 227281060702, '0117727826', 'Hà Thị Phương Nga', 2, '2011-12-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(81, 606473031460, '3617727640', 'Nguyễn Gia Như', 2, '2011-12-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(82, 616844531496, '0117727408', 'Ngô Hải Phong', 1, '2011-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(83, 524036904504, '0117728379', 'Nguyễn Minh Phương', 2, '2011-11-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(84, 775734887815, '5603360307', 'Nguyễn Minh Quân', 1, '2011-07-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(85, 166094706536, '2709940846', 'Vương Thị Tân', 2, '2011-05-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(86, 169181222398, '0117727536', 'Nguyễn Hương Trà', 2, '2011-07-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(87, 171983425509, '0117727444', 'Trần Hương Trà', 2, '2011-02-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(88, 620442543813, '0169223174', 'Đinh Nguyễn Huyền Trang', 2, '2011-12-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(89, 601664968736, '0169223178', 'Lê Thanh Trúc', 2, '2011-09-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(90, 161040599629, '3417727491', 'Hà Tuấn Trung', 1, '2011-10-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(91, 254686290572, '0117726954', 'Nguyễn Ngọc Tú', 1, '2011-04-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(92, 438269234583, '0117728387', 'Đỗ Trọng Duy Tuấn', 1, '2011-10-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(93, 422411786607, '0117727603', 'Nguyễn Trần Bảo Vy', 2, '2011-10-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(94, 948709498041, '0117727283', 'Lê Hải Yến', 2, '2011-12-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(95, 660160665748, '0117745930', 'Đinh Nguyễn Khánh An', 2, '2011-07-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(96, 925028552509, '0117728189', 'Hoàng Hải Anh', 1, '2011-05-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(97, 483416731205, '3300777166', 'Mai Hải Anh', 2, '2011-02-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(98, 758031206528, '3517727599', 'Trần Đức Anh', 1, '2011-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(99, 115990758688, '0117726965', 'Lưu Quốc Bảo', 1, '2011-11-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(100, 989848422241, '0169223136', 'Trần Gia Bảo', 1, '2011-03-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(101, 144558404268, '0117728250', 'Đặng Thái Bình', 1, '2011-09-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(102, 684510957669, '0117675232', 'Đặng Bảo Châu', 2, '2011-12-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(103, 375854672219, '0117727509', 'Hoàng Nguyễn Minh Châu', 2, '2011-02-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(104, 715346308344, '2417728009', 'Tô Minh Châu', 2, '2011-04-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(105, 875049648173, '0161166148', 'Lê Thùy Chi', 2, '2011-06-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(106, 759445880391, '0117727090', 'Trần Phương Chi', 2, '2011-06-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(107, 505331048194, '0149284502', 'Hứa Ngọc Thùy Dung', 2, '2011-03-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(108, 198148429725, '0117728127', 'Lê Minh Dương', 1, '2011-12-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(109, 890653443386, '0117727464', 'Nguyễn Minh Dương', 1, '2011-04-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(110, 119901946205, '0117779645', 'Hoàng Linh Đan', 2, '2011-08-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(111, 646611909446, '1934509475', 'Lý Hà Hải Đăng', 1, '2011-06-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(112, 239642249547, '0117728262', 'Hoàng Minh Đức', 1, '2011-05-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(113, 576612577427, '0117727170', 'Nguyễn Minh Đức', 1, '2011-05-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(114, 378429610331, '0117727363', 'Nguyễn Ngân Giang', 2, '2011-12-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(115, 303113071408, '0117904574', 'Phạm Ngân Giang', 2, '2011-10-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(116, 656711664778, '3417728242', 'Vũ Hương Giang', 2, '2011-11-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(117, 913692069038, '0117727193', 'Lương Gia Hân', 2, '2011-09-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(118, 808449997666, '0117727004', 'Thân Ngọc Bảo Hân', 2, '2011-06-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(119, 824467244655, '0169223147', 'Lê Ngọc Hiếu', 2, '2011-11-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(120, 154169137706, '0117670658', 'Lê Chấn Hưng', 1, '2011-01-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(121, 950995786509, '0117727383', 'Nguyễn Gia Linh', 2, '2011-09-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(122, 275233702713, '0117887543', 'Nguyễn Quang Minh', 1, '2011-10-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(123, 621002903761, '0117727428', 'Nguyễn Tuấn Minh', 1, '2011-07-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(124, 406140794841, '0150236495', 'Trần Phạm Trà My', 2, '2011-10-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(125, 272940486439, '0117727213', 'Trần Yến My', 2, '2011-04-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(126, 488396007662, '0118456586', 'Phạm Gia Nam', 1, '2011-02-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(127, 472552210926, '2517674437', 'Trần Linh Nga', 2, '2011-03-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(128, 798024716362, '0117727201', 'Nguyễn Khánh Ngọc', 2, '2011-02-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(129, 245795197468, '3030224121', 'Tô Thảo Nguyên', 2, '2011-10-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(130, 937144612626, '0169223159', 'Vũ Minh Nguyệt', 2, '2011-07-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(131, 983039010390, '0117727071', 'Nguyễn Đặng Phương Nhi', 2, '2011-08-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(132, 407662596904, '0169223162', 'Nguyễn Lâm Nhi', 2, '2011-07-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(133, 620763801055, '0117727258', 'Nguyễn Chí Phong', 1, '2011-08-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(134, 426622376700, '0117727158', 'Lưu San San', 2, '2011-07-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(135, 519951874543, '0117727075', 'Giáp Tiến Thành', 1, '2011-01-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(136, 868772893484, '0117787371', 'Đinh Phương Thảo', 2, '2011-04-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(137, 959433581406, '0169223172', 'Nguyễn Thủy Tiên', 2, '2011-05-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(138, 507995621514, '0117727174', 'Nguyễn Yến Trang', 2, '2011-09-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(139, 730642392411, '0169223179', 'Nguyễn Anh Tú', 1, '2011-08-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(140, 684216992392, '0117727079', 'Vũ Hoàng Anh Tuấn', 1, '2011-07-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(141, 824693304096, '0117726950', 'Nguyễn Như Ý', 2, '2011-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(142, 988201545447, '0134535796', 'Tiêu Trúc An', 2, '2011-07-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(143, 635074663215, '0134477154', 'Trần Thùy An', 2, '2011-03-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(144, 357436568921, '0117728162', 'Nguyễn Hoàng Anh', 1, '2011-05-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(145, 284934214786, '0117727049', 'Nguyễn Vi Anh', 2, '2011-01-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(146, 448401934567, '0169223137', 'Vũ Nguyễn Gia Bảo', 1, '2011-11-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(147, 112862367291, '0117728306', 'Ngô Thành Công', 1, '2011-08-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(148, 973736467534, '0169223140', 'Nguyễn Bá Công', 1, '2011-09-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(149, 586051357854, '0117728094', 'Nguyễn Mạnh Cường', 1, '2011-10-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(150, 151023392461, '0117727088', 'Nguyễn Ngọc Diệp', 2, '2011-11-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(151, 553112410864, '0117727387', 'Nguyễn Trọng Dũng', 1, '2011-07-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(152, 871265999149, '0117727375', 'Lâm Thị Thúy Dương', 2, '2011-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(153, 684572259869, '0117727182', 'Nguyễn Đăng Dương', 1, '2011-11-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(154, 618937020691, '0117728309', 'Ngô Tiến Đạt', 1, '2011-08-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(155, 521419072673, '0134477173', 'Lê Hải Đăng', 1, '2011-12-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(156, 201128932365, '0117727672', 'Nguyễn Hương Giang', 2, '2011-08-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(157, 932837374547, '0117727371', 'Phạm Huy Hùng', 1, '2011-09-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(158, 599507500958, '0117727102', 'Vũ Ngọc Huyền', 2, '2011-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(159, 733378466216, '0117779622', 'Đinh Quang Hưng', 1, '2011-12-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(160, 269782306073, '0117727331', 'Nguyễn Minh Hương', 2, '2011-07-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(161, 837027998114, '0117727660', 'Lê Duy Khánh', 1, '2011-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(162, 278096313320, '0117727774', 'Dương Vũ Lam Khuê', 2, '2011-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(163, 980718507059, '0117727448', 'Thẩm Nguyễn Tùng Lâm', 1, '2011-01-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(164, 201161162437, '0169223151', 'Đào Tố Linh', 2, '2011-09-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(165, 577126877968, '0117727057', 'Hoàng Bảo Linh', 2, '2011-05-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(166, 121470135444, '0117727185', 'Nguyễn Phương Linh', 2, '2011-09-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(167, 963510502412, '2717727696', 'Nguyễn Tùng Linh', 2, '2011-08-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(168, 799432057175, '0149193888', 'Hoàng Thành Bảo Long', 1, '2011-08-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(169, 382638643149, '0169223152', 'Trần Đức Long', 1, '2011-08-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(170, 241850381168, '0149284280', 'Bùi Khánh Ly', 2, '2011-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(171, 670927806412, '0117728371', 'Nguyễn Trà Mi', 2, '2011-06-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(172, 571142072653, '0141376523', 'Trần Mai Hà Minh', 2, '2011-06-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(173, 540148846563, '0117727846', 'Vũ Bình Minh', 1, '2011-06-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(174, 849951550387, '0117728383', 'Nguyễn Hoàng Nam', 1, '2011-08-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(175, 811744877724, '0117727189', 'Lâm Quỳnh Nga', 2, '2011-04-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(176, 481594412866, '0117727632', 'Nguyễn Tuệ Nhi', 2, '2011-12-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(177, 665962355260, '0169223163', 'Phạm Đình Phúc', 1, '2011-12-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(178, 427886435950, '2417728020', 'Trần Thị Minh Phương', 2, '2011-12-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(179, 922884092114, '0117728147', 'Đỗ Nhật Quang', 1, '2011-01-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(180, 451577664608, '0117670960', 'Chu Hoàng An Tâm', 2, '2011-05-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(181, 840818768615, '0133489124', 'Phạm Đức Thiện', 1, '2011-08-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(182, 568661558733, '0117728254', 'Đặng Thị Đoan Trang', 2, '2011-12-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(183, 453093029584, '0117883395', 'Nguyễn Cẩm Tú', 2, '2011-10-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(184, 788333727476, '0117727850', 'Ngô Bảo Tuấn', 1, '2011-03-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(185, 776564140032, '3017728290', 'Chu Đức Tùng', 1, '2011-08-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(186, 956526804270, '0134509320', 'Đinh Võ Xuân Vinh', 1, '2011-10-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(187, 179667489731, '3517728143', 'Phan Thị Khánh An', 2, '2011-02-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(188, 254850971689, '0117727712', 'Hoàng Ngọc Minh Anh', 2, '2011-02-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(189, 994225353319, '0117727797', 'Nguyễn Lương Hải Anh', 2, '2011-03-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(190, 219183217310, '0117727471', 'Trần Quỳnh Anh', 2, '2011-03-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(191, 601205992028, '0117727084', 'Lương Tuệ Châu', 2, '2011-07-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(192, 242865678871, '0117727729', 'Đàm Tiến Dũng', 1, '2011-10-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(193, 983952989055, '0117720866', 'Hoàng Anh Duy', 1, '2011-06-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(194, 563242577875, '0117727644', 'Lưu Đức Duy', 1, '2011-11-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(195, 443434333083, '0169223146', 'Nguyễn Anh Duy', 1, '2011-01-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(196, 843989764300, '0117728298', 'Vũ Ngọc Duy', 1, '2011-05-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(197, 856990122897, '0117727879', 'Bùi Thu Giang', 2, '2011-07-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(198, 601675754080, '0117727532', 'Nguyễn Thảo Hà Giang', 2, '2011-10-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(199, 469943810597, '0117728451', 'Bùi Vũ Đức Hiếu', 1, '2011-06-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(200, 380092346128, '0117727150', 'Hoàng Quốc Huy', 1, '2011-08-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(201, 650679580727, '0118456128', 'Lê Quang Huy', 1, '2011-09-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(202, 532415495468, '0117788974', 'Bùi Hữu Gia Hưng', 1, '2011-10-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(203, 883115982683, '0117727138', 'Nguyễn Đỗ Vĩnh Hưng', 1, '2011-02-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(204, 213425459523, '3317728431', 'Phạm Thu Hương', 2, '2011-11-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(205, 419912222748, '0117727741', 'Đinh Vĩnh Khang', 1, '2011-01-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(206, 373321031392, '0117903505', 'Nguyễn Bảo Khang', 1, '2011-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(207, 250972699620, '0117727106', 'Nguyễn Hoài Linh', 2, '2011-01-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(208, 369773949055, '0117727122', 'Ngô Thế Long', 1, '2011-03-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(209, 403370934035, '0117728350', 'Bùi Quang Minh', 1, '2011-10-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(210, 913025322235, '0117728227', 'Lê Kim Ngân', 2, '2011-03-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(211, 663851638639, '0169223155', 'Nguyễn Trần Nghĩa', 1, '2011-04-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(212, 967254600723, '0169223158', 'Thẩm Vũ Bảo Ngọc', 2, '2011-04-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(213, 619675770318, '0117674235', 'Bùi Kim Oanh', 2, '2011-08-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(214, 922748332636, '0118429387', 'Nguyễn Hải Phong', 1, '2011-12-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(215, 328841836359, '0117727440', 'Nguyễn Thu Phương', 2, '2011-06-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(216, 955426665070, '0117726969', 'Trần Bảo Phương', 2, '2011-04-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(217, 243031500471, '0117727737', 'Nguyễn Minh Quân', 1, '2011-10-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(218, 358855714256, '0169223166', 'Vũ Thị Diễm Thanh', 2, '2011-12-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(219, 261510217306, '0117728057', 'Nguyễn Phương Thảo', 2, '2011-10-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(220, 278962508678, '0117728427', 'Nguyễn Hà Trang', 2, '2011-04-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(221, 625380723869, '0169223177', 'Phạm Nguyễn Mai Trang', 2, '2011-07-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(222, 926481985326, '7917728025', 'Phạm Quỳnh Trang', 2, '2011-01-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(223, 741789837247, '0117727356', 'Vũ Nguyễn Huyền Trang', 2, '2011-12-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(224, 247385839810, '0117728335', 'Lưu Diễm Uyên', 2, '2011-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(225, 877933926388, '0117727823', 'Nguyễn Phương Uyên', 2, '2011-08-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(226, 932766966828, '0117727318', 'Đinh Quốc Việt', 1, '2011-03-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(227, 305067764644, '0117903529', 'Doãn An Vy', 2, '2011-04-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(228, 201075141663, '0118486987', 'Trần Gia Vỹ', 1, '2011-04-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(335, 532026538823, '3317728435', 'Nguyễn Phương Anh', 2, '2011-08-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(336, 862897750775, '0117727656', 'Đinh Tùng Bách', 1, '2011-12-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(337, 160179982243, '0117728420', 'Nguyễn Hoàng Dương', 1, '2011-12-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(338, 998964437248, '1920907581', 'Nguyễn Quang Dương', 1, '2010-10-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(339, 956685092564, '0117727525', 'Vũ Tùng Dương', 1, '2011-10-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(340, 795442630345, '0117728185', 'Hoàng Tiến Đạt', 1, '2011-09-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(341, 724581722365, '0117727379', 'Lưu Mạnh Đức', 1, '2011-08-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(342, 321252003767, '0117727793', 'Nguyễn Ngọc Hà', 2, '2011-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(343, 941196998247, '2717728447', 'Nguyễn Thu Hằng', 2, '2011-06-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(344, 140236888539, '0117727912', 'Lưu Trung Hiếu', 1, '2011-08-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(345, 420160858499, '2417727842', 'Trịnh Hữu Hoàng', 1, '2011-07-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(346, 427722327694, '0117727909', 'Lưu Ánh Hồng', 2, '2011-03-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(347, 299375818784, '0117727500', 'Nguyễn Tuấn Hùng', 1, '2011-12-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(348, 184924788870, '0118025713', 'Ngô Kiến Huy', 1, '2011-12-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(349, 589399963036, '0117728317', 'Nguyễn Đăng Huy', 1, '2011-10-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(350, 131842267518, '2469223148', 'Nguyễn Đình Huy', 1, '2011-11-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(351, 560789159502, '3417728016', 'Phạm Thị Thanh Huyền', 2, '2011-03-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(352, 728663736813, '0117727336', 'Dương Hạo Lam', 2, '2011-06-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(353, 603747484128, '0117727830', 'Chu Ngọc Linh', 2, '2011-09-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(354, 402882102620, '0117727325', 'Đinh Phương Linh', 2, '2011-08-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(355, 593242630856, '3069223153', 'Mạc Thanh Mai', 2, '2011-09-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(356, 291935546809, '0117728049', 'Vũ Quỳnh Mai', 2, '2011-01-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(357, 807659565257, '0117727973', 'Vũ Hà My', 2, '2011-11-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(358, 866592314071, '0117727818', 'Đinh Minh Ngọc', 2, '2011-10-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(359, 501231621280, '0169223156', 'Hoàng Ánh Ngọc', 2, '2011-03-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(360, 371346979301, '0117728106', 'Ngô Phương Ngọc', 2, '2011-06-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(361, 716371011529, '0117727997', 'Nguyễn Bích Ngọc', 2, '2011-11-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(362, 343299791898, '0117727680', 'Dương Minh Nhật', 1, '2011-11-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(363, 289923632962, '0169223160', 'Nguyễn Châu Nhi', 2, '2011-03-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(364, 815183636469, '0169223161', 'Nguyễn Hồng Yến Nhi', 2, '2011-01-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(365, 357270268959, '0117728165', 'Tạ Hiền Nhi', 2, '2011-12-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(366, 366086494098, '0117728258', 'Bùi Khánh Như', 2, '2011-11-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(367, 254527326725, '0117727130', 'Thẩm Gia Như', 2, '2011-09-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(368, 363300979228, '0117683614', 'Nguyễn Anh Quân', 1, '2011-10-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(369, 224667268105, '2717728313', 'Vũ Phương Thanh', 2, '2011-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(370, 270344542314, '0117727664', 'Trần Hương Thảo', 2, '2011-11-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(371, 611945692465, '0169223170', 'Nguyễn Thu Thủy', 2, '2011-08-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(372, 927423052360, '0169223171', 'Đào Thủy Tiên', 2, '2011-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(373, 753560798855, '3117727896', 'Nguyễn Huyền Trang', 2, '2011-03-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(374, 155341595978, '0117727688', 'Dương Quang Trung', 1, '2011-04-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(375, 489136477061, '1769223181', 'Nguyễn Trang Uyên', 2, '2011-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(376, 164399556328, '0117728139', 'Nguyễn Hà Vân', 2, '2011-04-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(377, 115723408339, '0169223182', 'Nguyễn Như Ý', 2, '2011-06-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(378, 702287124692, '3817727785', 'Lê Xuân Bảo An', 1, '2011-09-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(379, 699277158366, '0117727037', 'Nguyễn Duy An', 1, '2011-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(380, 601161199606, '0117728073', 'Đặng Quỳnh Anh', 2, '2011-07-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(381, 455554687760, '0117728077', 'Khuất Thế Anh', 1, '2011-10-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(382, 324294565670, '2617728346', 'Lê Phương Anh', 2, '2011-02-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(383, 380688073223, '0117727875', 'Nguyễn Hà Anh', 2, '2011-04-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(384, 392698802471, '0117727556', 'Nguyễn Quang Anh', 1, '2011-12-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(385, 716925989036, '0117727522', 'Nguyễn Trần Trung Anh', 1, '2011-02-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(386, 261072906208, '3617727733', 'Trần Thái Bảo', 1, '2011-10-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(387, 196338384380, '0117727757', 'Đàng Phương Chi', 2, '2011-12-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(388, 454471780905, '0117727749', 'Nguyễn Lê Hải Đăng', 1, '2011-07-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(389, 926210282268, '0117727016', 'Trần Thị Hương Giang', 2, '2011-04-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(390, 622944761752, '3617727965', 'Bùi Gia Hân', 1, '2011-02-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(391, 558448722884, '5141381078', 'Phạm Gia Huân', 1, '2011-08-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(392, 761960113501, '0117727745', 'Hoàng Đức Huy', 1, '2011-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(393, 545239794656, '0117727479', 'Vũ Tuấn Hưng', 1, '2011-06-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(394, 894477428561, '3617728135', 'Tống Lan Hương', 2, '2011-10-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(395, 269252996110, '0117728119', 'Trần Bảo Khánh', 2, '2011-04-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(396, 304734181863, '0117728154', 'Trần Ngọc Khánh', 2, '2011-04-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(397, 147745817820, '3642657221', 'Nguyễn Ánh Linh', 2, '2011-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(398, 634643206788, '0118434505', 'Quách Phương Linh', 2, '2011-10-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(399, 819508620170, '6617728399', 'Tạ Bảo Long', 1, '2011-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(400, 154904205847, '0117986170', 'Nguyễn Phương Ly', 2, '2011-10-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(401, 767016984666, '0117727807', 'Phạm Hoàng Phương Mai', 2, '2011-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(402, 200142759081, '0117728177', 'Đinh Công Minh', 1, '2011-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(403, 678233059649, '4617728037', 'Nguyễn Hoàng Tuyết Ngân', 2, '2011-08-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(404, 350211665796, '0117781695', 'Nguyễn Đắc Nguyên', 1, '2011-01-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(405, 653644806779, '0117727917', 'Kiều Thị Yến Nhi', 2, '2011-07-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(406, 507016956538, '0117727648', 'Thẩm Linh Nhi', 2, '2011-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(407, 393112003575, '3517727668', 'Đỗ Thị Kim Nhung', 2, '2011-03-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(408, 471277814978, '3317728231', 'Đỗ Hồng Phú', 1, '2011-09-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(409, 761699536631, '0117727178', 'Trần Minh Quang', 1, '2011-05-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(410, 841226502281, '0117727789', 'Hoàng Minh Quân', 1, '2011-05-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(411, 687221196011, '3417728403', 'Lê Thị Hồng Quý', 2, '2011-10-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(412, 209510152822, '0134467290', 'Cao Đức Tài', 1, '2011-06-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(413, 783537530398, '0169223165', 'Nguyễn Đức Thắng', 1, '2011-07-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(414, 362932629279, '0117728235', 'Huỳnh Minh Tiến', 1, '2011-05-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(415, 232934047694, '0169223173', 'Hoàng Thùy Trâm', 2, '2011-02-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(416, 652503160084, '0117727420', 'Lê Minh Hồng Triết', 1, '2011-07-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(417, 243043233749, '0117728001', 'Phan Thanh Tùng', 1, '2011-06-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(418, 111186067852, '0117727937', 'Đỗ Ngọc Bảo Uyên', 2, '2011-03-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(419, 188125743246, '0117728455', 'Dương Tuấn Anh', 1, '2011-03-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(420, 696447669966, '0117728459', 'Nguyễn Đức Anh', 1, '2011-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(421, 171230665146, '0134477157', 'Nguyễn Trâm Anh', 2, '2011-07-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(422, 626877565366, '0117727612', 'Nguyễn Yến Anh', 2, '2011-05-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(423, 394146425754, '0117727892', 'Đinh Duy Bảo', 1, '2011-10-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(424, 982764984586, '2517727961', 'Nguyễn Quốc Bảo', 1, '2011-08-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(425, 317476910933, '0117727126', 'Hoàng Thẩm Minh Châu', 2, '2011-12-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(426, 789175874591, '0169223143', 'Lưu Tiến Dũng', 1, '2011-07-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(427, 822659323527, '3600588159', 'Mai Quốc Duy', 1, '2011-11-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(428, 919563506775, '0117727884', 'Nguyễn Hoàng Quốc Đạt', 1, '2011-02-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(429, 343656572619, '0117727352', 'Nguyễn Hải Đăng', 1, '2011-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(430, 533593996365, '0117727166', 'Trần Thẩm Minh Đức', 1, '2011-09-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(431, 223587599856, '0117728173', 'Nguyễn Quang Huy', 1, '2011-07-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(432, 517078784687, '0117727803', 'Đặng Thanh Huyền', 2, '2011-02-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(433, 908360677469, '0117728266', 'Hoàng Thu Huyền', 2, '2011-09-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(434, 243615885874, '0117727708', 'Đào Duy Khoa', 1, '2011-06-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(435, 935331675847, '0142449895', 'Vũ Tùng Lâm', 1, '2011-05-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(436, 876380236449, '0117728085', 'Lưu Phương Linh', 2, '2011-11-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(437, 329861970376, '0117727460', 'Nguyễn Hà Linh', 2, '2011-10-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(438, 126824854739, '0117728201', 'Vũ Lưu Khánh Linh', 2, '2011-01-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(439, 183471571945, '0117728443', 'Hoàng Khánh Ly', 2, '2011-11-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(440, 636754156225, '0163658359', 'Bùi Thế Mạnh', 1, '2011-07-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(441, 676521193958, '3517727245', 'Nguyễn Bảo Minh', 1, '2011-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(442, 148499060069, '0117727404', 'Nguyễn Quang Minh', 1, '2011-11-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(443, 798245781458, '0117727765', 'Nguyễn Ngọc Hà My', 2, '2011-06-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(444, 513016647201, '0117896965', 'Nguyễn Phương Nhi', 2, '2011-05-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(445, 423841240375, '0117727929', 'Hoàng Gia Phong', 1, '2011-10-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(446, 605770936020, '0117727862', 'Lương Thu Phương', 2, '2011-01-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(447, 683612126297, '1969223164', 'Phan Hà Phương', 2, '2011-05-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(448, 190605876930, '0117728278', 'Đặng Quốc Quang', 1, '2011-12-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(449, 195775795307, '0169223168', 'Bạch Thanh Thảo', 2, '2011-04-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(450, 949114393930, '0117727719', 'Hoàng Phương Thảo', 2, '2011-03-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(451, 762288476808, '0117728065', 'Vũ Phương Thảo', 2, '2011-11-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(452, 419439854070, '3717727933', 'Nguyễn Minh Thư', 2, '2011-06-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(453, 360316036005, '0133768735', 'Vũ Minh Tiến', 1, '2011-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(454, 579996511556, '1769223175', 'Nguyễn Huyền Trang', 2, '2011-02-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(455, 989707401459, '0117728098', 'Nguyễn Huyền Trang', 2, '2011-11-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(456, 583554793822, '0169223180', 'Hà Thu Uyên', 2, '2011-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(457, 511989854153, '2769223183', 'Lê Hoàng Yến', 2, '2011-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(458, 649361350104, '0134477156', 'Nguyễn Đức Anh', 1, '2011-08-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(459, 149843554149, '0142449880', 'Nguyễn Lê Tuấn Anh', 1, '2011-04-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(460, 779160501227, '0117727567', 'Nguyễn Ngọc Anh', 2, '2011-08-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(461, 943132666396, '0117728343', 'Nguyễn Hoàng Bảo Châu', 1, '2010-11-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(462, 757157650673, '3417728181', 'Bùi Văn Chiến', 1, '2011-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(463, 617359665468, '0117728061', 'Lưu Phương Dung', 2, '2011-03-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(464, 712190006626, '0142657483', 'Hà Mạnh Dũng', 1, '2011-06-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(465, 187898392861, '0117727811', 'Hoàng Thùy Dương', 2, '2011-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(466, 274537489992, '0169223144', 'Ngô Thị Thuỳ Dương', 2, '2011-02-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(467, 553107367997, '0117727487', 'Nguyễn Minh Đạt', 1, '2011-10-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(468, 144025175238, '0117727596', 'Nguyễn Thành Đạt', 1, '2011-04-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(469, 589598547024, '0169223142', 'Phạm Minh Đức', 1, '2011-08-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(470, 215714757615, '0117727340', 'Nguyễn Thị Gia Hân', 2, '2011-11-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(471, 190737548306, '0117728219', 'Vũ Minh Hiếu', 1, '2011-12-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(472, 747697925952, '0117727969', 'Phạm Minh Hoàng', 1, '2011-02-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(473, 908399288219, '3317728338', 'Vũ Minh Hoàng', 1, '2011-11-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(474, 517862792085, '0117728013', 'Lưu Giang Huy', 1, '2011-03-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(475, 507427995899, '0117727769', 'Trần Thu Huyền', 2, '2010-05-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(476, 934441192465, '0118134655', 'Tạ Trung Kiên', 1, '2011-03-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(477, 803283368775, '0117728363', 'Nguyễn Mai Lan', 2, '2011-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(478, 471624614483, '0117728169', 'Đinh Tuấn Linh', 1, '2011-04-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(479, 799883778596, '0134467287', 'Nguyễn Tân Hà Linh', 2, '2011-11-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(480, 631683054152, '0117728131', 'Trần Phương Linh', 2, '2011-11-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(481, 989888796753, '0117727232', 'Trần Thanh Mai', 2, '2011-09-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(482, 598616243521, '0117727620', 'Trần Thị Tuyết Mai', 2, '2011-07-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(483, 828913255050, '0117727684', 'Nguyễn Anh Minh', 1, '2011-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(484, 337695528459, '2217727857', 'Nguyễn Hoàng Nhất Minh', 1, '2011-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(485, 413555960461, '0117727925', 'Trịnh Bình Minh', 1, '2011-11-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(486, 874701758505, '3369223154', 'Hoàng Hải Nam', 1, '2011-10-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(487, 864124454003, '0118472797', 'Lê Hoàng Thảo Phương', 2, '2011-11-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(488, 168536432674, '1769223167', 'Bùi Chí Thành', 1, '2011-07-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(489, 806214046182, '5617727888', 'Lê Quý Thịnh', 1, '2011-01-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(490, 898691100524, '0117727571', 'Hoàng Anh Thư', 2, '2011-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(491, 803768220165, '0117728081', 'Nguyễn Anh Thư', 2, '2011-02-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(492, 841012694868, '0117727041', 'Nguyễn Đức Tiến', 1, '2011-08-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(493, 830667378243, '2517727839', 'Đỗ Huyền Trang', 2, '2011-09-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(494, 824513122082, '0117726957', 'Nguyễn Vũ Mai Trang', 2, '2011-12-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(495, 541129429872, '0117727920', 'Hoàng Cẩm Tú', 2, '2011-09-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(496, 424893547487, '0117728223', 'Nguyễn Đức Tuấn', 1, '2011-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(497, 731930270620, '0117727020', 'Nguyễn Hoàng Vũ', 1, '2011-08-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(498, 987586567140, '0117728699', 'Đoàn Lan Anh', 2, '2010-09-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(499, 230664971827, '0117729231', 'Đỗ Phương Anh', 2, '2010-01-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(500, 587260183501, '0118204784', 'Đỗ Quốc Kỳ Anh', 1, '2010-04-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(501, 410050261894, '0117728830', 'Hoàng Phương Anh', 2, '2010-07-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(502, 229744124368, '0117897658', 'Lại Đức Anh', 1, '2010-07-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(503, 304688463681, '0117728672', 'Lưu Việt Anh', 1, '2010-01-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(504, 413998943585, '0117728674', 'Nguyễn Hà Anh', 2, '2010-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(505, 600865726105, '0134437843', 'Nguyễn Quang Anh', 1, '2010-01-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(506, 399575267535, '0117729001', 'Trần Gia Bảo', 1, '2010-06-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(507, 488169706300, '0117728810', 'Vi Khánh Chi', 2, '2010-09-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(508, 732162657383, '0117729208', 'Đỗ Việt Đức', 1, '2010-02-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(509, 824577035375, '0117678395', 'Nguyễn Minh Đức', 1, '2010-01-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(510, 597689709229, '0117728660', 'Nguyễn Vũ Minh Đức', 1, '2010-07-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(511, 613440669398, '0117728790', 'Vũ Hương Giang', 2, '2010-02-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(512, 179869285070, '0117729212', 'Đỗ Nguyễn Ngân Hà', 2, '2010-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(513, 296893380451, '0117729029', 'Võ Ngọc Hà', 2, '2010-04-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(514, 674975270182, '0134557525', 'Phạm Bảo Hân', 2, '2010-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(515, 608238004755, '0117729343', 'Lưu Nam Huy', 1, '2010-09-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(516, 832485362145, '0117729129', 'Nguyễn Gia Huy', 1, '2010-10-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(517, 983925529116, '0117728567', 'Lê Gia Hưng', 1, '2010-03-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(518, 266184384418, '0117728916', 'Đinh Dương Gia Khánh', 1, '2010-03-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(519, 873830137723, '3017729608', 'Nguyễn Minh Khánh', 2, '2010-07-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(520, 179645160755, '0134467459', 'Nguyễn Phúc Lâm', 1, '2010-07-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(521, 434956996037, '2761152985', 'Nguyễn Thị Khánh Linh', 2, '2010-05-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(522, 895607914010, '0134437963', 'Trần Bảo Linh', 2, '2010-10-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(523, 301744639767, '0117782580', 'Nguyễn Cao Sơn Lĩnh', 1, '2010-10-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(524, 779798318993, '0117729718', 'Trần Văn Lực', 1, '2010-07-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(525, 459681191978, '0117897438', 'Nguyễn Ngọc Ly', 2, '2010-10-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(526, 121838247333, '0148518577', 'Đỗ Tuấn Minh', 1, '2010-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(527, 167702904409, '0117755593', 'Lê Hà My', 2, '2010-04-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(528, 737830550574, '3617728559', 'Lê Hải Nam', 1, '2010-01-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(529, 687472825345, '0134467510', 'Hoàng Bảo Ngọc', 2, '2010-03-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(530, 596314709348, '0117729352', 'Chu Yến Nhi', 2, '2010-09-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(531, 465388432751, '0129193209', 'Nguyễn Vũ Thảo Nhi', 2, '2010-08-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(532, 994342581181, '3817729272', 'Nguyễn Khoa Phát', 1, '2010-10-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(533, 667042627214, '4617870838', 'Huỳnh Kim Gia Phú', 1, '2010-12-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(534, 933151796457, '0117728518', 'Đỗ Nguyên Phương', 2, '2010-09-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(535, 569852830770, '4017729698', 'Nguyễn Hà Phương', 2, '2010-08-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(536, 628417023054, '0117728522', 'Trần Minh Phương', 2, '2010-09-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(537, 341472537410, '0118252159', 'Nguyễn Huy Quang', 1, '2010-06-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(538, 300979871152, '0117728475', 'Chu Minh Quân', 1, '2010-07-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(539, 707908976253, '0117906509', 'Lê Nguyễn Minh Quân', 1, '2010-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(540, 734872197005, '4217897517', 'Trần Trúc Quỳnh', 2, '2010-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(541, 427072755513, '0117926309', 'Nguyễn Bảo Sơn', 1, '2010-06-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(542, 336870542638, '3017755603', 'Đào Ngọc Thảo', 2, '2010-01-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(543, 504835512293, '0117729824', 'Trần Phương Thảo', 2, '2010-04-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(544, 665226753628, '0117729437', 'Nguyễn Đức Thuận', 1, '2010-09-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(545, 746294308702, '3817729284', 'Mai Xuân Thủy', 1, '2010-12-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(546, 898244009541, '0117728479', 'Nguyễn Anh Thư', 2, '2010-06-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(547, 789863041448, '0117729255', 'Hà Anh Tú', 1, '2010-01-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(548, 833954934344, '0117728483', 'Nguyễn Đức Tuấn', 1, '2010-11-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(549, 500681760705, '0117728703', 'Đinh Tường Vy', 2, '2010-03-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(550, 800896035967, '0117729097', 'Nguyễn Hà An', 2, '2010-05-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(551, 180774478863, '3117729101', 'Phạm Nguyễn Bảo An', 1, '2010-05-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(552, 636656042180, '0117728678', 'Nguyễn Phương Anh', 2, '2010-01-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(553, 412212707330, '0117728691', 'Nguyễn Minh Ánh', 2, '2010-11-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(554, 808015313297, '0117729247', 'Đinh Gia Bảo', 1, '2010-02-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(555, 306557215699, '0134467369', 'Trần Thanh Bình', 1, '2010-06-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(556, 280172652593, '0117729005', 'Nguyễn Minh Chi', 2, '2010-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(557, 844111739123, '0117729197', 'Đinh Tuấn Cường', 1, '2010-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(558, 909880637272, '0143997036', 'Phạm Tuấn Dương', 1, '2010-03-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(559, 467969427007, '0117717196', 'Phạm Minh Đức', 1, '2010-01-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(560, 882787400945, '3618457506', 'Phạm Quang Hà', 1, '2010-09-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(561, 795277159469, '0117728993', 'Đinh Vân Hải', 2, '2010-12-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(562, 849448731246, '0117728612', 'Nguyễn Thúy Hiền', 2, '2010-08-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(563, 932432903359, '0117728908', 'Vũ Minh Hiếu', 1, '2010-05-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(564, 427051253401, '0117728620', 'Vũ Minh Hoàng', 1, '2010-01-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(565, 650361484048, '3617729339', 'Nguyễn Huy Hùng', 1, '2010-01-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(566, 700271901183, '0150301742', 'Đỗ Gia Huy', 1, '2010-12-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(567, 842644050229, '0134203022', 'Lê Gia Huy', 1, '2010-07-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(568, 823753992941, '0134202932', 'Đàm Phan Hưng', 1, '2010-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(569, 988600066879, '0117678436', 'Trần Ngọc Hưng', 1, '2010-07-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(570, 608591266382, '0117729628', 'Trần Thùy Linh', 2, '2010-05-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(571, 450646852834, '0117728588', 'Vũ Phi Long', 1, '2010-10-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(572, 641145688306, '0117728545', 'Nguyễn Đức Minh', 1, '2010-04-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(573, 408934532743, '3517728888', 'Trần Bình Minh', 1, '2010-03-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(574, 144114169787, '0136382057', 'Vũ Gia Minh', 1, '2010-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(575, 437722077387, '0117728980', 'Lương Thùy Ngân', 2, '2010-11-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(576, 554127028672, '3317729316', 'Đỗ Bảo Ngọc', 2, '2010-03-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(577, 342117166674, '0117728502', 'Lương Minh Ngọc', 2, '2010-07-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(578, 581853099255, '3317728989', 'Nguyễn Khánh Ngọc', 2, '2010-01-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(579, 764331830542, '0117728514', 'Trần Minh Ngọc', 2, '2010-04-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(580, 573608124688, '0117729175', 'Trần Kim Nhân', 1, '2010-04-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(581, 659034369635, '0117729072', 'Trần Khánh Nhi', 2, '2010-03-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(582, 951033253302, '2417729870', 'Phạm Thị Quỳnh Như', 2, '2010-03-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(583, 445140784963, '0133981300', 'Ngô Xuân Bảo Phúc', 1, '2009-11-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(584, 920790064138, '0117729466', 'Hoàng Mai Phương', 2, '2010-02-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(585, 638724018238, '0118221597', 'Phạm Minh Quang', 1, '2010-03-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(586, 337680094420, '0117728471', 'Trần Đặng Phúc Quang', 1, '2010-07-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(587, 224123821872, '3160909567', 'Dương Phương Thanh', 2, '2010-03-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(588, 905459149500, '0117729259', 'Trần Thanh Thảo', 2, '2010-01-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(589, 127891038559, '0136064645', 'Phạm Đào Anh Thư', 2, '2010-05-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(590, 769571868567, '2717729705', 'Ngô Hà Thy', 2, '2010-07-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(591, 871509336229, '0117729828', 'Dương Thùy Trang', 2, '2010-05-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(592, 549993309390, '0117897731', 'Hoàng Vũ Bảo Trân', 2, '2010-08-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(593, 503458900923, '0133459544', 'Lưu Huy Tú', 1, '2010-11-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(594, 814919211236, '0118472298', 'Bùi Huy Việt', 1, '2010-10-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(595, 287983195619, '2717728747', 'Nguyễn Thế Tiểu Vũ', 1, '2010-09-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(596, 950043121766, '0117728751', 'Đỗ Tường Vy', 2, '2010-03-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(597, 890150622549, '0117729235', 'Tống Vân Anh', 2, '2010-08-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(598, 659771792832, '0117728853', 'Lê Ngọc Bích', 2, '2010-08-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(599, 221326453034, '0117728632', 'Đỗ Minh Châu', 2, '2010-11-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(600, 129226973118, '0133983083', 'Nguyễn Đoàn Bảo Châu', 2, '2010-08-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(601, 908710419538, '0140938016', 'Hoàng Quỳnh Chi', 2, '2010-11-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(602, 592147598006, '0117729807', 'Đinh Việt Cường', 1, '2010-10-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(603, 821627952048, '3317823608', 'Nguyễn Tiến Dũng', 1, '2010-10-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(604, 927862166975, '0117729510', 'Phạm Tiến Dũng', 1, '2010-03-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(605, 949151135501, '0148302831', 'Nguyễn Văn Duy', 1, '2010-05-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(606, 499699379390, '0117728818', 'Đỗ Hương Giang', 2, '2010-08-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(607, 210105509051, '0117728794', 'Nguyễn Minh Giang', 1, '2010-07-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0);
INSERT INTO `tbl_student` (`id`, `code`, `code_csdl`, `fullname`, `gender`, `birthday`, `people_id`, `religion`, `address`, `image`, `status`, `dep_temp`, `user_id`) VALUES
(608, 842848866194, '0117728935', 'Phạm Vũ Bắc Hải', 1, '2010-09-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(609, 721476674066, '0117729117', 'Lương Minh Hằng', 2, '2010-10-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(610, 733843537747, '0117729121', 'Nguyễn Ngọc Hân', 2, '2010-07-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(611, 328967009963, '0117729125', 'Lương Văn Quang Huy', 1, '2010-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(612, 273914438823, '0117729656', 'Ngô Đức Huy', 1, '2010-03-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(613, 979960134618, '3317728563', 'Trịnh Thị Thu Hương', 2, '2010-08-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(614, 479855234240, '0117897774', 'Nguyễn Gia Khánh', 1, '2010-05-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(615, 259126838068, '0117728571', 'Nguyễn Ngọc Khánh', 2, '2010-06-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(616, 711071965098, '0134437859', 'Đỗ Sao Khuê', 2, '2010-11-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(617, 514496052771, '0117729141', 'Hoàng Trung Kiên', 1, '2010-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(618, 217838248438, '0150237927', 'Nguyễn Phúc Lai', 1, '2010-03-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(619, 397962790041, '0150342280', 'Nguyễn Diệu Linh', 2, '2010-08-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(620, 959888588825, '0134075925', 'Nguyễn Huyền Linh', 2, '2010-11-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(621, 938719726254, '0117728579', 'Nguyễn Trương Phương Linh', 2, '2010-04-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(622, 933584879416, '0117728866', 'Phạm Hải Linh', 2, '2010-12-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(623, 999850417721, '0117729741', 'Tăng Phương Linh', 2, '2010-12-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(624, 274181346673, '0117728871', 'Vũ Khánh Linh', 2, '2010-04-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(625, 179333184151, '0149284575', 'Trần Nguyễn Thị Kim Mai', 2, '2010-12-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(626, 481342443248, '0117728884', 'Nguyễn Ngọc Minh', 2, '2010-08-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(627, 691511531859, '0117728542', 'Nguyễn Tuấn Minh', 1, '2010-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(628, 825601108722, '0117728892', 'Nguyễn Bảo Nam', 1, '2010-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(629, 464617921042, '0117728510', 'Thẩm Khánh Ngọc', 2, '2010-11-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(630, 631450938857, '0117729077', 'Lương Tố Như', 2, '2010-12-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(631, 556153717043, '0117729874', 'Nguyễn Tiến Phát', 1, '2010-04-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(632, 661345359273, '0117729034', 'Nguyễn Hà Phương', 2, '2010-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(633, 667223400063, '3617897700', 'Phạm Việt Quang', 1, '2010-02-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(634, 990518278160, '0117729040', 'Lương Tú Quyên', 2, '2010-12-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(635, 159405319629, '0170284320', 'Nguyễn Minh Thanh', 2, '2021-03-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(636, 988040540683, '0117728779', 'Bùi Phương Thảo', 2, '2010-02-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(637, 311616132811, '0134467526', 'Nguyễn Phương Thảo', 2, '2010-04-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(638, 528011736985, '0140691007', 'Lê Thanh Thủy', 2, '2010-09-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(639, 372103743895, '0117728727', 'Hoàng Anh Toàn', 1, '2010-06-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(640, 576478013535, '0117729060', 'Phạm Khánh Toàn', 1, '2010-12-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(641, 681719032381, '0117729145', 'Nguyễn Phương Trang', 2, '2010-01-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(642, 494595368457, '0117728735', 'Nguyễn Minh Trí', 1, '2010-06-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(643, 203834507560, '2517729158', 'Chu Lâm Tuyền', 2, '2010-04-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(644, 548557584054, '3717729296', 'Lê Minh Vũ', 1, '2010-05-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(645, 632604745509, '0117728755', 'Nguyễn Thảo Xuân', 2, '2010-06-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(646, 257959623245, '0117729660', 'Chu Quỳnh Anh', 2, '2010-10-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(647, 300180449425, '3517729820', 'Lưu Hà Anh', 2, '2010-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(648, 661395650748, '0150748590', 'Nguyễn Đào Nguyên Anh', 2, '2010-04-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(649, 896282229797, '0117729376', 'Nguyễn Hoàng Anh', 1, '2010-12-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(650, 679556439178, '0117729790', 'Nguyễn Tuấn Anh', 1, '2010-09-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(651, 857558872093, '0117729541', 'Phạm Bảo Nam Anh', 1, '2010-06-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(652, 382376248586, '0117729239', 'Nguyễn Ngọc Ánh', 2, '2010-08-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(653, 372635475585, '0117729799', 'Nguyễn Vũ Gia Bảo', 1, '2010-09-16', 7, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(654, 165684179845, '0117729368', 'Đinh Ngọc Chi', 2, '2010-07-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(655, 788383818398, '0117729678', 'Lê Mỹ Dung', 2, '2010-07-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(656, 744462729157, '0142462820', 'Hoàng Trung Dũng', 1, '2010-04-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(657, 551407806346, '0117729506', 'Nguyễn Đại Dũng', 1, '2010-08-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(658, 889291186674, '0117729200', 'Nguyễn Trung Dũng', 1, '2010-10-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(659, 410001145382, '3317729757', 'Phạm Đức Duy', 1, '2010-04-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(660, 438140305266, '0117729017', 'Đinh Thành Đạt', 1, '2010-05-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(661, 597366694756, '3817729772', 'Đỗ Thị Vân Hà', 2, '2010-06-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(662, 164370158397, '0117729777', 'Bùi Gia Hân', 2, '2010-11-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(663, 501017673646, '0117729332', 'Hoàng Minh Hiếu', 1, '2010-01-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(664, 672035827062, '0117729526', 'Thân Việt Hoàng', 1, '2010-06-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(665, 357212561310, '0117728911', 'Trương Khánh Huyền', 2, '2010-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(666, 508033809735, '0150638487', 'Đào Duy Khánh', 1, '2009-06-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(667, 319417219159, '3617729616', 'Vũ Thị Ngọc Lan', 2, '2010-04-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(668, 494697996723, '0148518595', 'Nguyễn Thị Hoài Linh', 2, '2010-01-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(669, 609352474398, '0117728876', 'Đỗ Anh Minh', 1, '2010-09-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(670, 281085010767, '0117729490', 'Ngô Tuấn Minh', 1, '2010-01-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(671, 790528134420, '0117729308', 'Nguyễn Nhật Minh', 1, '2010-06-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(672, 839050682050, '0117729494', 'Lương Thảo My', 2, '2010-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(673, 594300081797, '0117729312', 'Bạch Quỳnh Nga', 2, '2010-03-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(674, 845803695924, '0118432800', 'Nguyễn Trung Nghĩa', 1, '2010-06-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(675, 786610082072, '0117728759', 'Đào Khánh Ngọc', 2, '2010-08-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(676, 863817698915, '0134505687', 'Lý Nhất Ngôn', 1, '2010-02-20', 19, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(677, 880870064159, '0117729458', 'Hoàng Vũ Yến Nhi', 2, '2010-05-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(678, 994104215078, '0817729591', 'Vũ Khánh Nhi', 2, '2010-08-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(679, 694973999724, '0117729690', 'Nguyễn Đức Phong', 1, '2010-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(680, 434371030130, '0117729470', 'Nguyễn Minh Quân', 1, '2010-08-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(681, 633478740132, '3341411548', 'Hoàng Thị Thanh Thảo', 2, '2010-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(682, 880372947166, '0134467527', 'Nguyễn Thu Thuỷ', 2, '2010-05-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(683, 988967541883, '0117729832', 'Lê Bảo Trang', 2, '2010-12-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(684, 179342736954, '0142660023', 'Nguyễn Đức Trí', 1, '2010-08-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(685, 142018386161, '2717729153', 'Vũ Vương Trung', 1, '2010-09-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(686, 648179869367, '0117728739', 'Bùi Anh Tú', 1, '2010-01-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(687, 580821723883, '0117729839', 'Vũ Tuấn Việt', 1, '2010-09-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(688, 372028553244, '2417897654', 'Đoàn Trần Mai Anh', 2, '2010-05-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(689, 373366870827, '0117728837', 'Nguyễn Bá Anh', 1, '2010-05-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(690, 865656746540, '0117729109', 'Nguyễn Huyền Anh', 2, '2010-08-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(691, 738656831122, '0117729794', 'Vũ Hoàng Anh', 1, '2010-01-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(692, 324560596834, '0117729551', 'Nguyễn Ngọc Ánh', 2, '2009-08-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(693, 440031162650, '0117729555', 'Đới Nguyên Bảo', 1, '2010-06-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(694, 747920314431, '3666889290', 'Vũ Gia Bảo', 1, '2010-09-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(695, 133220209034, '0117729364', 'Nguyễn Đức Bình', 1, '2010-06-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(696, 176071050256, '0134477181', 'Phạm Đình Thanh Cao', 1, '2009-04-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(697, 281619002036, '0117729802', 'Mạc Kim Chi', 2, '2010-07-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(698, 474475441269, '0117729360', 'Nguyễn Quang Dũng', 1, '2010-12-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(699, 941474159973, '0117729686', 'Trần Đình Duy', 1, '2010-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(700, 450846781693, '0136382053', 'Trịnh Thùy Dương', 2, '2010-04-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(701, 445298691617, '0117729633', 'Vũ Văn Đông', 1, '2010-08-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(702, 923242406531, '0117729022', 'Thẩm Thiên Đức', 1, '2010-12-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(703, 980406717957, '0117729215', 'Lương Minh Hằng', 2, '2010-10-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(704, 552697164372, '0117728904', 'Nguyễn Trung Hiếu', 1, '2010-04-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(705, 826810257037, '3617729737', 'Phạm Gia Huy', 1, '2010-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(706, 204604691731, '0117729882', 'Trần Gia Huy', 1, '2010-10-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(707, 937148236860, '0117729648', 'Vũ Thanh Huyền', 2, '2010-04-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(708, 355611162360, '0117729604', 'Vũ Gia Hưng', 1, '2010-12-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(709, 292654380748, '0117729564', 'Trần Nguyên Hưởng', 1, '2010-01-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(710, 500379221857, '0117728862', 'Nguyễn Hà Phương Linh', 2, '2010-09-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(711, 543029701025, '0117728957', 'Lưu Bảo Long', 1, '2010-07-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(712, 880480119453, '0117728961', 'Lưu Gia Long', 1, '2010-07-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(713, 342713885056, '2717729722', 'Đinh Thị Khánh Ly', 2, '2010-09-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(714, 325728009851, '0136382070', 'Nguyễn Hương Ly', 2, '2010-03-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(715, 605182735614, '0117729304', 'Hoàng Ngọc Mai', 2, '2010-04-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(716, 615070860046, '0141406858', 'Bùi Nhật Minh', 1, '2010-06-25', 7, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(717, 896454515983, '0117728964', 'Đỗ Quang Minh', 1, '2010-12-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(718, 630784031217, '0117729844', 'Nguyễn Anh Minh', 1, '2010-11-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(719, 896230576813, '0117729848', 'Trần Quang Minh', 1, '2010-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(720, 586529163250, '3034504761', 'Nguyễn Hà My', 2, '2010-07-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(721, 400027344550, '0117729583', 'Hoàng Thị Nghĩa', 2, '2010-06-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(722, 518412152005, '4617729587', 'Lê Thị Bảo Ngọc', 2, '2010-05-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(723, 825099180458, '3717729324', 'Nguyễn Minh Nhật', 1, '2010-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(724, 608867525582, '0117729595', 'Nguyễn Trường Phát', 1, '2010-07-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(725, 286654805319, '0150343866', 'Tống Công Phúc', 1, '2010-08-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(726, 443383916254, '0117729263', 'Nguyễn Minh Quân', 1, '2010-03-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(727, 350053599900, '0117729048', 'Nguyễn Minh Thái', 1, '2010-04-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(728, 494814778752, '0117729056', 'Tạ Thanh Thúy', 2, '2010-06-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(729, 286974748739, '0117897782', 'Đỗ Anh Thư', 2, '2010-02-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(730, 152593466210, '0117729288', 'Hoàng Thị Bảo Trâm', 2, '2010-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(731, 823375898862, '0117729836', 'Ngô Đức Trung', 1, '2010-08-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(732, 816210770598, '0151129729', 'Nguyễn Thanh Tú', 1, '2010-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(733, 406396280937, '0117729426', 'Vũ Anh Tuấn', 1, '2010-09-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(734, 137188422028, '0117728487', 'Đỗ Thanh Vinh', 1, '2010-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(735, 917652488977, '0117729816', 'Hoàng Việt Anh', 1, '2010-04-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(736, 648286793913, '3517729534', 'Nguyễn Đức Anh', 1, '2010-07-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(737, 569141709073, '0117729537', 'Nguyễn Quốc Đức Anh', 1, '2010-08-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(738, 262776623725, '0117729664', 'Trần Hoàng Hà Anh', 2, '2010-01-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(739, 876887722202, '0117729243', 'Phí Tùng Bách', 1, '2010-04-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(740, 771895393932, '0140938220', 'Trần Hùng Cường', 1, '2010-03-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(741, 412956201112, '0117729682', 'Nguyễn Tiến Dũng', 1, '2010-12-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(742, 810636099478, '0117729009', 'Hoàng Khánh Duy', 1, '2010-07-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(743, 315255610219, '0117729766', 'Hoàng Tiến Đạt', 1, '2010-08-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(744, 984032641348, '0117729514', 'Trần Trung Đức', 1, '2010-12-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(745, 567359600596, '0117729769', 'Lâm Phương Giang', 2, '2010-05-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(746, 617116198960, '0117729640', 'Vũ Hoàng Hải', 1, '2010-07-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(747, 360846138743, '0141405555', 'Phạm Bảo Hân', 2, '2010-07-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(748, 508584798979, '0117729522', 'Đinh Trung Hiếu', 1, '2010-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(749, 947992149186, '0150177987', 'Nguyễn Trung Hiếu', 1, '2010-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(750, 511173255394, '0117729652', 'Lâm Chấn Huy', 1, '2010-02-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(751, 468522917323, '0217729890', 'Hoàng Thị Nguyên Khánh', 2, '2010-10-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(752, 541333676938, '0118204316', 'Lê Đình Lâm', 1, '2010-11-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(753, 615773362319, '0117729478', 'Nguyễn Phương Linh', 2, '2010-06-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(754, 358236925380, '3817729624', 'Trần Phương Linh', 2, '2010-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(755, 310981161346, '0117729894', 'Đinh Tuấn Long', 1, '2010-10-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(756, 275420756531, '0117729482', 'Nguyễn Hải Long', 1, '2010-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(757, 735088919700, '0117729745', 'Nguyễn Khánh Ly', 2, '2010-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(758, 268348332728, '0150638480', 'Hoàng Đức Mạnh', 1, '2009-11-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(759, 495708914905, '0117729749', 'Đinh Công Minh', 1, '2010-03-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(760, 795337997397, '0117729753', 'Lưu Tạ Tường Minh', 1, '2010-05-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(761, 163162663319, '0117728880', 'Nguyễn Hoàng Nhật Minh', 1, '2010-10-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(762, 464494270195, '0149284148', 'Trần Thái Minh', 1, '2010-03-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(763, 982355325181, '2717729853', 'Nguyễn Thị Trà My', 2, '2010-08-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(764, 870884426336, '0141268357', 'Vũ Văn Nam', 1, '2008-09-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(765, 650992242374, '0134477187', 'Hoàng Trọng Nghĩa', 1, '2010-12-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(766, 151005827404, '0117729861', 'Đỗ Gia Bảo Ngọc', 2, '2010-12-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(767, 439819272849, '0117729865', 'Ngô Bích Ngọc', 2, '2010-04-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(768, 924100484519, '0117729380', 'Nguyễn Quang Nguyên', 1, '2010-09-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(769, 841365779393, '0117728953', 'Nguyễn Thành Nhân', 1, '2010-09-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(770, 635215800894, '0117729328', 'Nguyễn Ngọc Nhi', 2, '2010-07-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(771, 973035861016, '0134467523', 'Phạm Đăng Phú', 1, '2010-04-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(772, 187148395021, '0117728707', 'Vũ Hồng Sơn', 1, '2010-04-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(773, 896893293768, '0134467528', 'Nguyễn Trần Anh Thư', 2, '2010-02-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(774, 125894798497, '1717729384', 'Bùi Nguyễn Quỳnh Trang', 2, '2010-12-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(775, 999310950662, '0117729411', 'Nguyễn Thu Trang', 2, '2010-12-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(776, 325306045444, '0117729150', 'Phạm Đức Trung', 1, '2010-03-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(777, 878143957478, '0117729292', 'Trần Mạnh Trường', 1, '2010-04-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(778, 426788422122, '0134467531', 'Trần Anh Tú', 1, '2010-01-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(779, 134538782631, '0134467532', 'Trần Anh Tuấn', 1, '2010-01-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(780, 659140189318, '0117729430', 'Thẩm Khánh Vân', 2, '2010-07-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(781, 172946762624, '0150636957', 'Đặng Hà Anh', 2, '2009-10-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(782, 771272996074, '0150636975', 'Lê Quỳnh Anh', 2, '2009-12-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(783, 309452889159, '0150636978', 'Ngô Hải Anh', 2, '2009-09-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(784, 332455571872, '0150636965', 'Vũ Công Tuấn Anh', 1, '2009-08-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(785, 703946893156, '0150636990', 'Vũ Hải Anh', 2, '2009-11-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(786, 341441198561, '0150636979', 'Lưu Văn Cương', 1, '2009-12-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(787, 876458109008, '0150636956', 'Bùi Đức Dũng', 1, '2009-03-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(788, 182409478718, '0150636961', 'Lê Chí Dũng', 1, '2009-09-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(789, 157631471891, '0150636982', 'Đỗ Quang Duy', 1, '2009-10-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(790, 982442200494, '0150636945', 'Lương Ánh Dương', 2, '2009-04-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(791, 604258866667, '0150636976', 'Lê Quyền Anh Đức', 1, '2009-09-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(792, 160694770622, '0150636955', 'Nguyễn Trung Đức', 1, '2009-05-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(793, 332760526328, '0150636954', 'Vũ Minh Đức', 1, '2009-05-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(794, 855854881722, '0150636988', 'Nguyễn Hương Giang', 2, '2009-11-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(795, 712271210013, '0150636983', 'Trần Trung Hiếu', 1, '2009-03-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(796, 709624592182, '0150636993', 'Lỗ Hữu Hoàng', 1, '2009-11-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(797, 318212236895, '0150636980', 'Hoàng Nguyễn Gia Huy', 1, '2009-01-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(798, 982074718033, '0150636971', 'Trần Gia Huy', 1, '2009-02-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(799, 497933632179, '0150636987', 'Lê Thị Thu Huyền', 2, '2009-10-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(800, 387380873719, '0150636967', 'Đinh Trung Kiên', 1, '2009-11-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(801, 569375754892, '0150636984', 'Lưu Chi Lan', 2, '2009-09-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(802, 543917965155, '0150636966', 'Hoàng Tiến Lâm', 1, '2009-09-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(803, 240891833497, '0150636962', 'Lâm Hà Linh', 2, '2009-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(804, 195258051140, '0150636972', 'Nguyễn Khánh Linh', 2, '2009-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(805, 609205218507, '0150636946', 'Vũ Khánh Linh', 2, '2009-12-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(806, 348759318487, '0150636948', 'Nguyễn Đức Minh', 1, '2009-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(807, 957194239216, '0150636958', 'Vũ Trà My', 2, '2009-09-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(808, 705833063232, '0150636952', 'Nguyễn Hải Nam', 1, '2009-10-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(809, 906558677190, '0150422829', 'Vũ Hữu Bảo Nam', 1, '2009-03-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(810, 758200229990, '0150636959', 'Đỗ Yến Nhi', 2, '2009-03-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(811, 238108753239, '0150636968', 'Lê Khởi Phong', 1, '2009-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(812, 591507595019, '0150636986', 'Lê Ngọc Phong', 1, '2009-05-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(813, 576047233938, '0150636963', 'Nguyễn Thành Phúc', 1, '2009-01-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(814, 118470173593, '0150636947', 'Đoàn Vũ Nhật Phương', 2, '2009-12-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(815, 352093777407, '0150636985', 'Hoàng Thị Nam Thanh', 2, '2009-12-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(816, 294115702396, '0150636969', 'Vũ Đình Thành', 1, '2009-03-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(817, 716808326927, '0150636949', 'Đinh Phương Thảo', 2, '2009-08-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(818, 553890625761, '0150636960', 'Lương Diệu Thảo', 2, '2009-06-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(819, 798631497250, '0150636991', 'Hoàng Thu Thủy', 2, '2009-03-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(820, 746122890047, '0150636964', 'Nguyễn Quỳnh Trang', 2, '2009-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(821, 188907226665, '0150636973', 'Đinh Minh Trường', 1, '2009-10-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(822, 431072535733, '0150636974', 'Ninh Quang Trường', 1, '2009-10-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(823, 171243623563, '0150636977', 'Tăng Minh Tuấn', 1, '2009-07-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(824, 130230822419, '0150636950', 'Vũ Gia Tuấn', 1, '2009-10-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(825, 545835353988, '0150636981', 'Lưu Diệp Vi', 2, '2009-04-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(826, 537557343409, '0150636989', 'Nguyễn Phương Vy', 2, '2009-11-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(827, 420357594273, '0150636951', 'Trần Hải Yến', 2, '2009-05-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(828, 216285512124, '0141268465', 'Trần Thị Phương Anh', 2, '2008-02-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(829, 119328837096, '0150638464', 'Trương Thị Tú Anh', 2, '2009-08-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(830, 695484878066, '0150638477', 'Vũ Hà Anh', 2, '2009-12-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(831, 244066347488, '0150638460', 'Dương Thanh Nguyên Bảo', 1, '2009-05-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(832, 785102372279, '0150638485', 'Nguyễn Gia Bảo', 1, '2009-11-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(833, 819262908201, '0150638488', 'Vũ Quang Bảo', 1, '2009-03-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(834, 750009262365, '0150638473', 'Nguyễn Thị Hà Chi', 2, '2009-12-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(835, 419775147081, '0150638470', 'Nguyễn Tùng Chi', 2, '2009-12-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(836, 633995509248, '0150638490', 'Hoàng Phú Cường', 1, '2009-06-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(837, 892277774213, '0150638502', 'Nguyễn Thành Đạt', 1, '2009-03-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(838, 270785386457, '0150638478', 'Nguyễn Minh Đức', 1, '2009-09-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(839, 336253314309, '0150638465', 'Bùi Hương Giang', 2, '2009-06-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(840, 476143006407, '0150638479', 'Vũ Thu Hà', 2, '2009-11-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(841, 924222063092, '0150638471', 'Nguyễn Minh Hằng', 2, '2009-12-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(842, 746604182873, '0150638500', 'Đinh Thanh Hiền', 2, '2009-04-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(843, 719446433658, '0150638474', 'Nguyễn Hoàng Hiệp', 1, '2009-12-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(844, 468452320480, '3855368520', 'Lê Thị Ngọc Hoa', 2, '2009-01-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(845, 673181727012, '0150638467', 'Phạm Mạnh Hùng', 1, '2009-06-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(846, 731358911486, '0150638451', 'Hoàng Gia Huy', 1, '2009-10-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(847, 452152562440, '0150638468', 'Cao Việt Hưng', 1, '2009-10-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(848, 524736875059, '0150638486', 'Đặng Mạnh Hưng', 1, '2009-09-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(849, 665233766286, '0150638459', 'Nguyễn Tiến Lâm', 1, '2009-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(850, 661159037985, '0150638461', 'Trần Anh Lân', 1, '2009-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(851, 771760210423, '0150638456', 'Đỗ Thị Thùy Linh', 2, '2009-10-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(852, 594610419871, '0150638455', 'Đỗ Thị Hương Mai', 2, '2009-06-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(853, 263248451204, '0150638476', 'Nguyễn Thị Ngọc Mai', 2, '2009-01-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(854, 725192824759, '0150638453', 'Nguyễn Hoàng Minh', 1, '2009-02-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(855, 179217200231, '0150638475', 'Nguyễn Trà My', 2, '2009-03-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(856, 451350947185, '0150638466', 'Ngô Yến Ngọc', 2, '2009-01-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(857, 636709913729, '0150638462', 'Trần Minh Ngọc', 2, '2009-01-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(858, 329153858040, '0150638498', 'Vũ Hà Ngọc', 2, '2009-07-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(859, 175637780887, '0150638463', 'Nguyễn Mai Phương', 2, '2009-08-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(860, 773185336066, '0150638492', 'Nguyễn Tùng Quân', 1, '2009-02-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(861, 308164734556, '0150638458', 'Nguyễn Tiến Tài', 1, '2009-08-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(862, 861229227824, '0150638452', 'Nguyễn Hồng Thái', 2, '2009-04-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(863, 123802783363, '0150638493', 'Nguyễn Thanh Thảo', 2, '2009-05-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(864, 974613271599, '0150638469', 'Chu Thị Ngọc Thu', 2, '2009-08-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(865, 605999560350, '0150638489', 'Nguyễn Phương Thúy', 2, '2009-04-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(866, 941607347134, '0150638454', 'Nguyễn Thị Thanh Trà', 2, '2009-09-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(867, 684608455965, '0150638457', 'Đặng Quỳnh Trang', 2, '2009-06-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(868, 372143460927, '0150638494', 'Phạm Yến Trang', 2, '2009-11-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(869, 229661295393, '0150638472', 'Trần Phú Vương', 1, '2009-09-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(870, 672724787261, '0150638871', 'Nguyễn Bình Khánh An', 2, '2009-09-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(871, 694283025947, '0150638868', 'Hoàng Thị Hải Anh', 2, '2009-10-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(872, 271791467165, '0150638906', 'Nguyễn Việt Anh', 1, '2009-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(873, 612253895909, '0150638891', 'Thẩm Ngọc Anh', 2, '2009-01-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(874, 162330934947, '0150638895', 'Huỳnh Gia Bảo', 1, '2009-08-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(875, 588475793631, '0150638869', 'Đỗ Gia Bảo Châu', 2, '2009-03-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(876, 316570456150, '0150638881', 'Nguyễn Trần Việt Dũng', 1, '2009-12-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(877, 128938390009, '0150638898', 'Đàm Quỳnh Đan Đan', 2, '2009-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(878, 138888438006, '0150638892', 'Nguyễn Tuấn Đạt', 1, '2009-12-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(879, 723598192148, '0150638874', 'Đặng Lê Hải Đăng', 1, '2009-04-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(880, 228668630207, '0150638885', 'Nguyễn Minh Đức', 1, '2009-02-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(881, 593769487963, '0150638907', 'Nguyễn Thanh Hùng Đức', 1, '2009-04-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(882, 134174828187, '0150638886', 'Lưu Hoàng Hải', 1, '2009-01-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(883, 656480162034, '0150638904', 'Nguyễn Ngọc Hải', 1, '2009-11-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(884, 144245229593, '0150638884', 'Hoàng Trung Hiếu', 1, '2008-09-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(885, 462171419226, '0150638888', 'Nguyễn Trung Hiếu', 1, '2009-11-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(886, 435015767681, '0150638893', 'Nguyễn Thị Ngọc Hoa', 2, '2009-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(887, 840024239133, '0150638899', 'Hoàng Anh Huy', 1, '2009-07-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(888, 165278895609, '0150638889', 'Nguyễn Hải Huyền Hương', 2, '2009-02-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(889, 671043594956, '0150638882', 'Nguyễn Đức Long', 1, '2009-07-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(890, 233438125324, '0153601979', 'Ngô Đức Lương', 1, '2008-07-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(891, 873405815839, '0150638879', 'Lê Ngọc Khánh Ly', 2, '2009-10-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(892, 455854849078, '0150638875', 'Đàng Gia Minh', 1, '2009-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(893, 553444414383, '0150638894', 'Đặng Đình Nam', 1, '2009-12-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(894, 505052986111, '0150638866', 'Nguyễn Minh Ngọc', 2, '2009-09-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(895, 607031781925, '0150638896', 'Vũ Lưu Bảo Ngọc', 2, '2009-08-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(896, 945342022305, '0150638909', 'Nguyễn Huy Phong', 1, '2009-01-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(897, 980755020383, '0150638872', 'Dương Khánh Phương', 2, '2009-12-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(898, 309250433507, '0150638901', 'Nguyễn Việt Quang', 1, '2009-06-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(899, 385555041630, '0150638877', 'Đinh Trung Quân', 1, '2009-03-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(900, 540869383498, '0150638867', 'Lê Trần Mạnh Quỳnh', 1, '2009-03-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(901, 858836716057, '0150638910', 'Chu Phương Thảo', 2, '2009-12-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(902, 567076463763, '0150638873', 'Nguyễn Cường Thịnh', 1, '2009-02-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(903, 564700792929, '0150638902', 'Vũ Đặng Anh Thư', 2, '2009-09-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(904, 295762521645, '0150638880', 'Lâm Đặng Phương Trang', 2, '2009-09-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(905, 139027249731, '0150638876', 'Ngô Hải Trang', 2, '2009-03-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(906, 199811972126, '0150638878', 'Nguyễn Ngọc Khánh Trang', 2, '2009-02-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(907, 995461874306, '0150638903', 'Vũ Minh Trâu', 1, '2009-07-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(908, 785990582171, '0150638911', 'Nguyễn Cẩm Tú', 2, '2009-12-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(909, 930182904535, '0150638887', 'Cù Ngọc Tuân', 1, '2009-12-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(910, 654307603786, '0150638908', 'Lê Anh Tuấn', 1, '2009-08-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(911, 770469634082, '0150638900', 'Lưu Phương Vy', 2, '2009-06-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(912, 840661074836, '0150638905', 'Vũ Như Ý', 2, '2009-07-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(913, 893179960463, '0150638883', 'Trần Bảo Yến', 2, '2009-07-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(914, 234337673230, '0117969796', 'Lê Ngọc Ánh', 2, '2009-11-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(915, 382155266879, '0171576450', 'Đỗ Trọng Kim Phú', 1, '2009-10-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(916, 450738241890, '0150639026', 'Đinh Duy Anh', 1, '2009-09-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(917, 227216713201, '0150638998', 'Nguyễn Ngọc Anh', 2, '2009-07-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(918, 115334680094, '0150639020', 'Nguyễn Thảo Anh', 2, '2009-06-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(919, 460947315863, '0150639000', 'Nguyễn Thị Bảo Anh', 2, '2009-02-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(920, 596899444884, '0150639017', 'Trần Thị Nguyệt Anh', 2, '2009-09-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(921, 167573588983, '0150638990', 'Vũ Phương Kỳ Anh', 2, '2009-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(922, 116638491323, '0150639001', 'Bùi Ngọc Ánh', 2, '2009-01-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(923, 991345883388, '0150639002', 'Nguyễn Ngọc Ánh', 2, '2009-07-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(924, 642414768648, '0150639023', 'Nguyễn Hoàng Bách', 1, '2009-12-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(925, 840208988534, '0150639022', 'Lâm Chí Bảo', 1, '2009-05-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(926, 615940618534, '0150639027', 'Nguyễn Tiến Dũng', 1, '2009-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(927, 844203316070, '0150639005', 'Trần Thùy Dương', 2, '2009-02-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(928, 194475563501, '0150639004', 'Trần Trường Giang', 1, '2009-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(929, 749805861615, '0150638986', 'Nguyễn Minh Hải', 1, '2009-03-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(930, 709430039796, '0150638988', 'Phạm Thanh Hằng', 2, '2009-06-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(931, 177325914054, '0150638987', 'Nguyễn Minh Hoàng', 1, '2009-03-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(932, 208209554039, '0150639019', 'Trần Gia Huy', 1, '2009-08-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(933, 784763839963, '0150639008', 'Trần Quang Huy', 1, '2009-06-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(934, 198387904669, '0150639018', 'Phạm Đăng Khôi', 1, '2009-08-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(935, 653850987915, '0150639007', 'Vũ Quang Lâm', 1, '2009-11-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(936, 688201646520, '0150638989', 'Nguyễn Phương Linh', 2, '2009-05-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(937, 806459780473, '0150639202', 'Phạm Thùy Linh', 2, '2009-12-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(938, 558064911599, '0150639203', 'Nguyễn Gia Long', 1, '2009-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(939, 464408014300, '0150639015', 'Đỗ Tiến Minh', 1, '2009-10-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(940, 424799446619, '0150638985', 'Ngô Nhật Minh', 1, '2009-06-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(941, 321611699359, '0150638984', 'Nguyễn Duy Minh', 1, '2009-01-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(942, 461797266133, '0153600744', 'Nguyễn Nhật Minh', 1, '2009-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(943, 820972665474, '0150638982', 'Trần Bùi Trà My', 2, '2009-01-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(944, 457459747556, '0150639016', 'Nguyễn Hoàng Nam', 1, '2009-07-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(945, 260689830775, '0150639024', 'Lê Quỳnh Nga', 2, '2009-05-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(946, 239862046098, '0150638991', 'Đỗ Thị Bảo Ngọc', 2, '2009-04-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(947, 375629247926, '0150639012', 'Ngô Kiều Oanh', 2, '2009-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(948, 625058372432, '0150639006', 'Ngô Minh Quân', 1, '2009-07-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(949, 391049640889, '0150639028', 'Phạm Hồng Quân', 1, '2009-11-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(950, 781799932320, '0150639013', 'Nguyễn Trang Quỳnh', 2, '2009-09-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(951, 531101498823, '0150639021', 'Nguyễn Phú Thái', 1, '2009-08-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(952, 630154057880, '0153601297', 'Hoàng Thuỳ Trang', 2, '2009-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(953, 489286446417, '0150639025', 'Nguyễn Lương Trung', 1, '2009-10-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(954, 590328591447, '0150638992', 'Hoàng Quân Trường', 1, '2009-09-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(955, 499530643052, '0150639010', 'Nguyễn Nhật Trường', 1, '2009-11-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(956, 129699674040, '0150639011', 'Tô Đình Tú', 1, '2009-05-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(957, 437855473763, '0150639003', 'Trần Anh Tú', 1, '2009-06-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(958, 256354340678, '0150638996', 'Nguyễn Anh Tuấn', 1, '2009-12-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(959, 913081888674, '0150638980', 'Nguyễn Hồng Vân', 2, '2009-06-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(960, 548059041377, '0150638993', 'Trần Hải Yến', 2, '2009-01-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(961, 451773618456, '0171576773', 'Trần Nữ Gia Linh', 2, '2009-05-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(962, 836185319642, '0150639304', 'Lâm Đặng Tuấn Anh', 1, '2009-06-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(963, 125582037906, '0150639280', 'Lê Tú Anh', 2, '2009-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(964, 133389978981, '0150639296', 'Nguyễn Minh Anh', 2, '2009-03-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(965, 500112298042, '0150639289', 'Thẩm Thế Anh', 1, '2009-09-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(966, 513131899410, '0150639301', 'Vũ Gia Bình', 1, '2009-02-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(967, 715652135871, '0150287826', 'Hà Bảo Châu', 2, '2009-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(968, 483294674117, '0150639297', 'Tăng Giang Châu', 2, '2009-03-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(969, 543083218463, '0150639298', 'Lưu Hiền Chi', 2, '2009-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(970, 987049339028, '0150639311', 'Ngô Quỳnh Chi', 2, '2009-10-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(971, 909140242846, '0150639299', 'Thẩm Đức Dũng', 1, '2009-07-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(972, 404100308227, '0150639272', 'Lưu Đức Duy', 1, '2009-07-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(973, 314842897648, '0150639302', 'Lưu Ánh Dương', 2, '2009-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(974, 911138059458, '0150639312', 'Đỗ Thành Đạt', 1, '2009-03-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(975, 291274332045, '0150639286', 'Thẩm Tuấn Đạt', 1, '2009-09-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(976, 124734927920, '0150639314', 'Hoàng Văn Hiển', 1, '2009-07-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(977, 535850941313, '0150639275', 'Lê Gia Huy', 1, '2009-11-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(978, 251369619989, '0150639278', 'Hà Khánh Huyền', 2, '2009-07-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(979, 703662990640, '0150639306', 'Lâm Gia Khánh', 1, '2009-10-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(980, 768864426749, '0150669338', 'Nguyễn Trung Kiên', 1, '2009-05-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(981, 630046589860, '0150639285', 'Nguyễn Hải Lâm', 1, '2009-02-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(982, 755797497359, '0150639281', 'Nguyễn Tùng Lâm', 1, '2009-12-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(983, 237291486870, '0150639287', 'Đinh Mai Linh', 2, '2009-10-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(984, 648874638508, '0150639288', 'Nguyễn Diệu Linh', 2, '2009-09-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(985, 244467215294, '0150639270', 'Vũ Hà Linh', 2, '2009-09-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(986, 890536718418, '0150639293', 'Vũ Khánh Linh', 2, '2009-03-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(987, 972448411728, '0150639273', 'Vũ Thảo Ly', 2, '2009-12-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(988, 149144580100, '0150639294', 'Nguyễn Thị Phương Mai', 2, '2009-06-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(989, 735233167863, '0150639300', 'Nguyễn Nhật Minh', 1, '2009-03-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(990, 802103017348, '0150639276', 'Phạm Ngọc Hà Minh', 1, '2009-03-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(991, 789050729004, '0150639282', 'Trịnh Huyền Minh', 2, '2009-11-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(992, 187697394482, '0150639310', 'Nguyễn Khắc Trà My', 2, '2009-10-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(993, 862752796499, '0150639307', 'Nguyễn Thị Kim Ngân', 2, '2009-02-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(994, 877456338176, '0150639292', 'Nguyễn Minh Ngọc', 2, '2009-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(995, 660988301652, '0150639271', 'Nguyễn Thẩm Tú Ngọc', 2, '2009-12-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(996, 633415104580, '0150639295', 'Thẩm Thanh Ngọc', 2, '2009-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(997, 521822130603, '0150639290', 'Trần Thái Ngọc', 2, '2009-01-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(998, 813614968479, '0150639309', 'Phạm Khôi Nguyên', 1, '2009-04-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(999, 796722184547, '0150639279', 'Trần Khôi Nguyên', 1, '2009-10-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1000, 196720812813, '0150639313', 'Đinh Yến Nhi', 2, '2009-11-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1001, 387546117583, '0150639283', 'Trần Hồng Nhung', 2, '2009-07-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1002, 405010899436, '0150639308', 'Lương Hà Phương', 2, '2009-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1003, 143665665896, '0150639315', 'Nguyễn Ngọc Hà Phương', 2, '2009-01-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1004, 746166385974, '0150639274', 'Trần Phương Thảo', 2, '2009-12-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1005, 697290496126, '0150639291', 'Nguyễn Bùi Đức Thịnh', 1, '2009-01-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1006, 810783415842, '0150639316', 'Nguyễn Quỳnh Trang', 2, '2009-01-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1007, 791401053231, '0150639303', 'Hoàng Minh Triết', 1, '2009-12-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1008, 444271653481, '0150639284', 'Lương Minh Triết', 1, '2009-03-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1009, 345048761497, '0150639277', 'Nguyễn Quốc Việt', 1, '2009-07-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1010, 145207160236, '0170949103', 'Nguyễn Đức Long', 1, '2009-09-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1011, 790886834578, '0150639534', 'Đinh Phương Anh', 2, '2009-02-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1012, 501097783888, '0150639556', 'Hoàng Hiền Anh', 2, '2009-08-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1013, 650698796592, '0150639555', 'Hoàng Quỳnh Anh', 2, '2009-08-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1014, 503622245860, '0150639561', 'Lê Thị Hà Anh', 2, '2009-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1015, 485548494847, '0150639541', 'Nguyễn Đoàn Hoàng Anh', 1, '2009-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1016, 311594685856, '0150639549', 'Nguyễn Hà Anh', 2, '2009-12-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1017, 656184617190, '0150639533', 'Nguyễn Ngọc Anh', 2, '2009-05-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1018, 126192736472, '0150639538', 'Vũ Trâm Anh', 2, '2009-10-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1019, 534323749033, '0150639545', 'Bùi Quốc Bảo', 1, '2009-10-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1020, 126719974583, '0150639520', 'Nguyễn Bảo Châu', 2, '2009-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1021, 864455757367, '0150639543', 'Nguyễn Ngọc Minh Châu', 2, '2009-07-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1022, 388836557024, '0150639521', 'Đào Diệp Chi', 2, '2009-11-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1023, 807655184146, '0150639544', 'Đặng Quỳnh Chi', 2, '2009-10-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1024, 972092446731, '0150639523', 'Phạm Hà Chi', 2, '2009-06-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1025, 360278162180, '0150639519', 'Trịnh Liên Chi', 2, '2009-09-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1026, 121522018171, '0150639530', 'Dương Hồng Chuyên', 1, '2009-07-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1027, 918108196116, '0150639542', 'Nguyễn Hoàng Dương', 1, '2009-04-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1028, 214697653768, '0150639537', 'Đàm Tiến Đạt', 1, '2009-12-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1029, 893364242330, '0153601517', 'Hà Minh Đức', 1, '2009-05-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1030, 565283741855, '0150639540', 'Đỗ Minh Hà', 2, '2009-03-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1031, 800757883849, '0150639535', 'Nguyễn Thanh Hằng', 2, '2009-03-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1032, 254516093041, '0150639522', 'Trần Mai Hiền', 2, '2009-01-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1033, 596453169634, '0150639547', 'Mai Trung Hiếu', 1, '2009-05-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1034, 385058810649, '0150639539', 'Phạm Gia Huy', 1, '2009-09-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1035, 368408042415, '0150639563', 'Nguyễn Thanh Huyền', 2, '2009-07-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1036, 433571226145, '0150639551', 'Lê Thiết Gia Hưng', 1, '2009-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1037, 264399360160, '0150639558', 'Phạm Duy Kiên', 1, '2009-04-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1038, 150123127795, '0150639548', 'Phạm Thùy Linh', 2, '2009-12-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1039, 267527816560, '0150639527', 'Vũ Khánh Linh', 2, '2009-12-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1040, 720648150791, '0150639517', 'Lê Minh Long', 1, '2009-07-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1041, 504636544093, '0150639529', 'Lê Nguyên Vũ Long', 1, '2009-04-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1042, 556866869623, '0150639516', 'Lê Tuấn Long', 1, '2009-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1043, 122003163992, '0150639552', 'Hoàng Hà Khánh Ly', 2, '2009-12-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1044, 606668478441, '0150639550', 'Thân Ngọc Diệu Ly', 2, '2009-08-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1045, 595362459110, '0150639557', 'Vương Phú Nam', 1, '2009-11-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1046, 936948868274, '0150639559', 'Trần Huy Phong', 1, '2009-03-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1047, 200437814112, '0150639518', 'Trần Tuấn Phong', 1, '2009-02-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1048, 907836731952, '0153601699', 'Phạm Đức Hải Phương', 1, '2009-04-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1049, 495563518233, '0150639531', 'Lê Đức Quang', 1, '2009-11-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1050, 746112598106, '0150639553', 'Vũ Hồng Minh Quang', 1, '2009-01-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1051, 273719881871, '0150639546', 'Mai Anh Quân', 1, '2009-08-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1052, 904225937943, '0150639554', 'Lưu Thanh Thảo', 2, '2009-02-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1053, 256202180853, '0150639560', 'Nguyễn Đức Khánh Toàn', 1, '2009-08-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1054, 475605644477, '0150639528', 'Nguyễn Như Tuấn', 1, '2009-04-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1055, 449099184089, '0150639536', 'Nguyễn Hải Yến', 2, '2009-02-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1056, 532575633627, '0141268272', 'Bùi Đức Anh', 1, '2008-05-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1057, 171730850495, '0141268273', 'Hoàng Quỳnh Anh', 2, '2008-12-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1058, 285355261029, '0141268278', 'Đinh Thùy Dương', 2, '2008-01-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1059, 729210272824, '0141268281', 'Đào Tuấn Đạt', 1, '2008-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1060, 121410839944, '0141268280', 'Trần Thành Đạt', 1, '2008-08-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0);
INSERT INTO `tbl_student` (`id`, `code`, `code_csdl`, `fullname`, `gender`, `birthday`, `people_id`, `religion`, `address`, `image`, `status`, `dep_temp`, `user_id`) VALUES
(1061, 918268790191, '0141268283', 'Hoàng Văn Đô', 1, '2008-02-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1062, 870294241990, '0141268284', 'Đinh Phương Đông', 1, '2008-06-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1063, 476614325761, '0141268286', 'Nguyễn Mạnh Hậu', 1, '2008-10-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1064, 796612955090, '0141268290', 'Đỗ Nhật Huy', 1, '2008-03-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1065, 840179616865, '0141268291', 'Lưu Quang Huy', 1, '2008-01-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1066, 830926021402, '0141268287', 'Nguyễn Bá Thành Huy', 1, '2008-10-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1067, 186307164509, '0141268289', 'Trần Gia Huy', 1, '2008-10-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1068, 720101539505, '0141268292', 'Ngô Việt Khang', 1, '2008-05-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1069, 241399825262, '0141268293', 'Nguyễn Ngọc Khánh', 1, '2008-07-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1070, 967331036003, '0141268294', 'Nguyễn Đức Kiên', 1, '2008-04-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1071, 708501911282, '0141268295', 'Lưu Hà Phương Linh', 2, '2008-11-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1072, 130283974122, '0141268297', 'Trương Khánh Linh', 2, '2008-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1073, 826987301057, '0141268298', 'Nguyễn Hồng Lĩnh', 1, '2008-06-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1074, 447571102415, '0141268299', 'Dương Ngô Bảo Long', 1, '2008-10-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1075, 938002718146, '0141268300', 'Nguyễn Phi Long', 1, '2008-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1076, 462385051395, '0141268303', 'Lê Đức Lương', 1, '2008-06-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1077, 410561350848, '0141268304', 'Lương Nguyễn Duy Minh', 1, '2008-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1078, 804369449180, '0141268307', 'Nguyễn Nhật Minh', 1, '2008-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1079, 742358100819, '0141268308', 'Tạ Tuấn Nghĩa', 1, '2008-07-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1080, 752593100075, '0141268309', 'Hồ Nguyễn Bảo Ngọc', 2, '2008-12-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1081, 911657223769, '0141268310', 'Đặng Ngọc Nhân', 1, '2008-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1082, 303285398377, '0144762544', 'Đỗ Khánh Phát', 1, '2008-01-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1083, 176904718694, '0141268311', 'Vũ Đức Phú', 1, '2008-07-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1084, 921088829484, '0141268312', 'Vũ Yến Phương', 2, '2008-11-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1085, 758969881748, '', 'Nguyễn Minh Quang', 1, '2008-02-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1086, 563521507369, '0141268315', 'Nguyễn Phương Thanh', 2, '2008-04-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1087, 428442277716, '0141268316', 'Đinh Thị Phương Thảo', 2, '2008-04-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1088, 291069656564, '0141268317', 'Nguyễn Quang Thắng', 1, '2008-06-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1089, 781678611654, '0141268318', 'Hoàng Anh Thịnh', 1, '2008-12-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1090, 899848809781, '0141268319', 'Đỗ Bảo Thy', 2, '2008-06-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1091, 656148103428, '0141268320', 'Ngô Đức Toàn', 1, '2008-10-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1092, 155804221666, '0141268321', 'Nguyễn Minh Trí', 1, '2008-04-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1093, 321660820188, '0141268322', 'Tạ Quốc Triệu', 1, '2008-07-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1094, 412693685366, '0141268323', 'Vũ Thành Trung', 1, '2008-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1095, 179036751472, '0141268324', 'Vũ Thu Xuân', 2, '2008-03-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1096, 146205087498, '0141268326', 'Nguyễn Trần Bảo An', 1, '2008-08-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1097, 930540348223, '0141268328', 'Bạch Quỳnh Anh', 2, '2008-09-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1098, 659829119003, '0141268329', 'Hoàng Ngọc Phương Anh', 2, '2008-10-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1099, 987116674416, '0141268330', 'Hoàng Việt Anh', 1, '2008-03-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1100, 466076551820, '0118082209', 'Nguyễn Văn Huy Anh', 1, '2008-12-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1101, 454228194226, '0141268331', 'Nguyễn Việt Anh', 1, '2008-11-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1102, 403330066432, '0141268332', 'Phạm Việt Anh', 1, '2008-11-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1103, 678138297419, '0141268334', 'Hoàng Gia Bảo', 1, '2008-07-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1104, 256333044205, '0141268335', 'Lưu Quỳnh Chi', 2, '2008-09-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1105, 173277256907, '0141268337', 'Nguyễn Tiến Đạt', 1, '2008-01-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1106, 874407776872, '0141268338', 'Trần Thu Hà', 2, '2008-02-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1107, 327207600549, '0141268339', 'Trần Hoàng Hải', 1, '2008-07-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1108, 726138973882, '0141268340', 'Nguyễn Mạnh Hoàng', 1, '2008-01-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1109, 876007166973, '0141268341', 'Đồng Quang Huy', 1, '2008-09-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1110, 271885673812, '0141268343', 'Nguyễn Công Huy', 1, '2008-03-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1111, 127566602594, '0141268344', 'Trần Đức Huy', 1, '2008-05-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1112, 250520663380, '0141268345', 'Trần Gia Huy', 1, '2008-11-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1113, 854264939865, '0141268346', 'Nguyễn Nam Khánh', 1, '2008-05-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1114, 886392772253, '0141268347', 'Thẩm Đức Khánh', 1, '2008-07-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1115, 387284472288, '0141268348', 'Trần Diệu Linh', 2, '2008-12-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1116, 129805755605, '0141268349', 'Dương Vân Ly', 2, '2008-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1117, 661172895151, '0141268350', 'Phạm Ngọc Mai', 2, '2008-09-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1118, 183315376612, '0141268351', 'Lương Đức Mạnh', 1, '2008-12-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1119, 273319393412, '0141268352', 'Lương Nhật Minh', 1, '2008-11-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1120, 528176331815, '0141268358', 'Huỳnh Yến Nhi', 2, '2008-05-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1121, 932259656112, '0141268359', 'Ngô An Phú', 1, '2008-06-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1122, 640683483379, '0141268360', 'Nguyễn Bá Phúc', 1, '2008-05-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1123, 830178860402, '0141268361', 'Nguyễn Minh Quang', 1, '2008-12-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1124, 488623084900, '0141268362', 'Nguyễn Như Quỳnh', 2, '2008-01-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1125, 730162725641, '0141268363', 'Nguyễn Chí Thanh', 1, '2008-07-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1126, 495152758188, '0141268364', 'Trần Văn Thành', 1, '2008-10-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1127, 400806320496, '0141268365', 'Nguyễn Thị Minh Thảo', 2, '2008-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1128, 497866040564, '0141268366', 'Nguyễn Đức Thắng', 1, '2008-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1129, 892169250307, '0141268367', 'Vũ Duy Tiến', 1, '2008-04-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1130, 117754870138, '0141268368', 'Bùi Huyền Trang', 2, '2008-01-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1131, 406155392174, '0141268369', 'Vũ Anh Tuấn', 1, '2008-05-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1132, 135444674566, '0141268370', 'Hoàng Quốc Việt', 1, '2008-06-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1133, 385448728794, '0162194917', 'Phạm Chung Việt', 1, '2021-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1134, 130803290276, '0141268371', 'Cao Huyền Anh', 2, '2008-09-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1135, 699342330021, '0141268373', 'Nguyễn Vũ Hiền Anh', 2, '2008-11-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1136, 665251179384, '0141268372', 'Tống Mai Anh', 2, '2008-12-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1137, 378641342736, '0141268374', 'Trần Gia Bảo', 1, '2008-10-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1138, 452772604644, '0141268375', 'Phạm Nhật Bằng', 1, '2008-12-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1140, 900119967999, '0141268376', 'Nguyễn Việt Dũng', 1, '2008-06-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1142, 876411506916, '0141268377', 'Nguyễn Hải Đăng', 1, '2008-09-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1143, 528491874042, '0141268378', 'Tống Hương Giang', 2, '2008-11-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1144, 782444751960, '0141268379', 'Nguyễn Vũ Hà', 1, '2008-01-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1145, 340805302567, '0141268381', 'Vũ Nguyên Hạo', 1, '2008-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1146, 903822982085, '0141268382', 'Đỗ Minh Hằng', 2, '2008-03-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1147, 125875765993, '0141268383', 'Nguyễn Gia Hân', 2, '2008-08-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1148, 845830174311, '0141268384', 'Lê Minh Hiếu', 1, '2008-11-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1149, 799092038830, '0141268385', 'Bùi Sỹ Hoàng', 1, '2008-12-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1150, 621675502653, '0141268386', 'Thẩm Gia Huy', 1, '2008-12-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1151, 599841846707, '0141268387', 'Nguyễn Ngọc Khánh', 2, '2008-08-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1152, 713061978537, '0141268388', 'Chu Quỳnh Lâm', 2, '2008-04-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1153, 921593182236, '0141268389', 'Chu Huyền Linh', 2, '2008-06-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1154, 360950454441, '0141268390', 'Nguyễn Hà Linh', 2, '2008-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1155, 855694367370, '0141268391', 'Đào Đức Long', 1, '2008-08-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1156, 674656112904, '0141268302', 'Nguyễn Tuấn Long', 1, '2008-01-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1157, 669719648315, '0141268392', 'Thẩm Thành Long', 1, '2008-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1158, 351080097448, '0141268393', 'Trần Tiến Minh', 1, '2008-09-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1159, 562613597309, '0141268394', 'Tạ Hà My', 2, '2008-12-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1160, 989089011711, '0141268395', 'Nguyễn Đức Nam', 1, '2008-09-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1161, 220887965403, '0141268396', 'Trần Ngọc Nam', 1, '2008-08-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1162, 790193931899, '0141268397', 'Phạm Thu Ngân', 2, '2008-07-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1163, 146159463931, '0141268398', 'Chu Yến Ngọc', 2, '2008-10-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1164, 436870446313, '0141268400', 'Hoàng Gia Bảo Ngọc', 2, '2008-08-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1165, 209033380096, '0141268401', 'Nguyễn Khôi Nguyên', 1, '2008-11-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1166, 662413620710, '0141268403', 'Trần Anh Quân', 1, '2008-10-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1167, 214649865257, '0141268404', 'Trần Thị Lệ Quyên', 2, '2008-01-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1168, 205466156803, '0141268405', 'Lê Hiểu Quỳnh', 2, '2008-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1169, 625787881815, '0141268406', 'Bùi Dương Anh Tuấn', 1, '2008-02-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1170, 338091395300, '0141268407', 'Đinh Minh Văn', 1, '2008-08-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1171, 904499588135, '0141268408', 'Nguyễn Thanh Vân', 2, '2008-12-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1172, 552134767040, '0141268409', 'Hoàng Đức Việt', 1, '2008-04-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1173, 417203804055, '0141268411', 'Nguyễn Đinh Vũ', 1, '2008-04-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1174, 389111485722, '0141268413', 'Ngô Hải Yến', 2, '2008-07-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1175, 694988400190, '0141268414', 'Nguyễn Thị Bảo Yến', 2, '2008-02-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1176, 714936359056, '0133280559', 'Nguyễn Trung Nguyên', 1, '2008-06-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1177, 443261354076, '0141268416', 'Lê Hà Anh', 2, '2008-08-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1178, 858365737704, '0141268417', 'Nguyễn Hồng Anh', 2, '2008-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1179, 827503359971, '0141268418', 'Nguyễn Tuấn Anh', 1, '2008-02-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1180, 707454396237, '0141268419', 'Nguyễn Vũ Mai Anh', 2, '2008-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1181, 880772967926, '0141268420', 'Quách Ngọc Anh', 2, '2008-07-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1182, 814885378937, '0141268421', 'Nguyễn Gia Bách', 1, '2008-02-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1183, 277714262037, '0140693747', 'Nguyễn Thị Minh Châu', 2, '2008-06-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1184, 839993185507, '0141268422', 'Phan Ngọc Diệp', 2, '2008-06-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1185, 162654181001, '0141268424', 'Lê Việt Dũng', 1, '2008-09-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1186, 535018627190, '0141268425', 'Vũ Hoàng Đức', 1, '2008-02-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1187, 138987595449, '0141268426', 'Nguyễn Mai Hà', 2, '2008-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1188, 443308803643, '0141268427', 'Nguyễn Trúc Hà', 2, '2008-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1189, 983858058275, '0141268428', 'Hoàng Minh Hải', 1, '2008-07-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1190, 843695595383, '0141268430', 'Trần Gia Hân', 2, '2008-09-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1191, 754338200856, '0141268431', 'Nguyễn Như Hiếu', 1, '2008-11-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1192, 907086737215, '0170166013', 'Lê Quang Huy', 1, '2008-10-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1193, 725502177039, '0141268432', 'Đỗ Tuấn Hưng', 1, '2008-07-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1194, 561253653445, '0141268433', 'Nguyễn Thị Minh Hương', 2, '2008-09-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1195, 181080559909, '0141268434', 'Đào Nguyên Khang', 1, '2008-05-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1196, 285500327605, '0141268435', 'Nguyễn Trọng Minh Khang', 1, '2008-12-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1197, 863349652947, '0141268436', 'Hoàng Gia Khánh', 1, '2008-04-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1198, 989811755102, '0141268437', 'Tạ Duy Khánh', 1, '2008-06-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1199, 750352446492, '0141268438', 'Vũ Nguyễn Minh Khánh', 1, '2008-08-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1200, 461044188600, '0141268439', 'Bùi Tuấn Kiệt', 1, '2008-11-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1201, 453611198423, '0141268440', 'Nguyễn Trường Lâm', 1, '2008-11-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1202, 779350721555, '0141268442', 'Đàm Thị Phương Linh', 2, '2008-01-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1203, 703991690146, '0141268443', 'Nguyễn Trần Bảo Linh', 2, '2008-06-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1204, 172647261496, '0141268444', 'Nguyễn Duy Long', 1, '2008-02-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1205, 993606240579, '0141268445', 'Đỗ Ngọc Mai', 2, '2008-01-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1206, 542258289072, '0141268446', 'Đinh Tiến Mạnh', 1, '2008-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1207, 265403398541, '0141268448', 'Nguyễn Tiến Nhật', 1, '2008-06-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1208, 158535453371, '0141268450', 'Nguyễn Quỳnh Như', 2, '2008-10-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1209, 694643820005, '0141268451', 'Nguyễn An Phương', 2, '2008-10-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1210, 643105850403, '0141268452', 'Nguyễn Thu Phương', 2, '2008-04-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1211, 962902746081, '0141268453', 'Nguyễn Duy Thịnh', 1, '2008-11-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1212, 968526169677, '0141268454', 'Hoàng Anh Thư', 2, '2008-09-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1213, 400246616008, '0141268455', 'Phạm Đình Thức', 1, '2008-09-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1214, 990516998146, '0141268457', 'Đỗ Thùy Trang', 2, '2008-10-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1215, 955204294785, '0141268458', 'Nguyễn Thị Huyền Trang', 2, '2008-04-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1216, 751457424130, '0141268459', 'Nguyễn Hoàng Tùng', 1, '2008-06-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1217, 796546565464, '0141268461', 'Lê Hoàng Việt', 1, '2008-04-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1218, 515638283640, '0141268462', 'Vũ Hoàng Yến', 2, '2008-12-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1219, 717803885576, '0141268464', 'Thẩm Quỳnh Anh', 2, '2008-09-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1220, 711953334173, '0141268467', 'Nguyễn Thị Vân Dung', 2, '2008-11-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1221, 466894073982, '0141268468', 'Phạm Quang Dũng', 1, '2008-03-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1222, 510159765770, '0141268470', 'Hoàng Tiến Đạt', 1, '2008-03-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1223, 401583487987, '0141268471', 'Lưu Chu Minh Đức', 1, '2008-01-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1224, 248502874008, '0141268473', 'Lê Ngọc Hà', 2, '2008-01-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1225, 836960575817, '0141268474', 'Ngô Mai Hương', 2, '2008-12-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1226, 491743660350, '0141268475', 'Lê Ngọc Khuê', 2, '2008-06-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1227, 221238662271, '0141268478', 'Lê Khánh Linh', 2, '2008-01-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1228, 403399474596, '0141268479', 'Nguyễn Bảo Linh', 2, '2008-08-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1229, 931020491872, '0139356942', 'Phạm Gia Linh', 2, '2008-05-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1230, 747119854559, '0141268480', 'Trần Trịnh Diệu Linh', 2, '2008-08-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1231, 798219200306, '0141268482', 'Vũ Hà Linh', 2, '2008-06-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1232, 868925785047, '0141268484', 'Lưu Quang Minh', 1, '2008-11-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1233, 497527095568, '0141268485', 'Nguyễn Tiến Hoàng Minh', 1, '2008-10-30', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1234, 748128954039, '0141268486', 'Thẩm Đức Minh', 1, '2008-09-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1235, 288040631323, '0141268488', 'Trần Đức Minh', 1, '2008-04-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1236, 386194087228, '0141268489', 'Nguyễn Trà My', 2, '2008-05-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1237, 238721961560, '0117731582', 'Nguyễn Minh Ngọc', 2, '2008-01-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1238, 438108565358, '0141268492', 'Võ Hoàng Minh Ngọc', 2, '2008-09-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1239, 760472287328, '0141268493', 'Trịnh Khôi Nguyên', 1, '2008-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1240, 869433867525, '0141268494', 'Đoàn Thiện Nhân', 1, '2008-10-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1241, 493295658674, '0141268496', 'Đặng Long Nhật', 1, '2008-06-17', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1242, 966824032411, '0141268497', 'Lê Dạ Yến Nhi', 2, '2008-11-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1243, 349862096189, '0141268499', 'Lâm Gia Như', 2, '2008-02-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1244, 567454848660, '0141268500', 'Lưu Minh Ngọc Như', 2, '2008-12-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1245, 529018818197, '0141268501', 'Nguyễn Minh Ngọc Như', 2, '2008-10-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1246, 752186050591, '0141268502', 'Võ Minh Phương', 2, '2008-11-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1247, 755325577037, '0141268504', 'Nguyễn Anh Quân', 1, '2008-03-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1248, 904541079966, '0156285714', 'Vũ Như Quỳnh', 2, '2008-05-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1249, 220366885462, '0141268505', 'Nguyễn Thành Thịnh', 1, '2008-08-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1250, 452812782947, '0141334673', 'Nguyễn Huy Toàn', 1, '2008-09-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1251, 757023079369, '0141268507', 'Nguyễn Mai Trang', 2, '2008-05-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1252, 362502266444, '0141268509', 'Lê Minh Trí', 1, '2008-10-07', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1253, 365219985929, '0141268511', 'Bùi Khánh Triết', 1, '2008-05-20', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1254, 961165769790, '0141268512', 'Lương Thanh Trúc', 2, '2008-10-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1255, 767567247390, '0141268513', 'Nguyễn Xuân Trường', 1, '2008-11-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1256, 662890039203, '0141268514', 'Lê Thị Phương Uyên', 2, '2008-11-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1257, 806233263529, '0141268515', 'Nguyễn Thị Phương Uyên', 2, '2008-09-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1258, 846201827445, '0141268516', 'Tạ Thanh Vân', 2, '2008-08-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1259, 334334618086, '0141268518', 'Nguyễn Quý Hoàng Việt', 1, '2008-05-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1260, 668388980316, '0141268519', 'Lê Phương Vy', 2, '2008-03-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1261, 222158597911, '0141268520', 'Đỗ Lê Việt Anh', 1, '2008-08-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1262, 653033727008, '0141268521', 'Đỗ Mai Anh', 2, '2008-06-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1263, 625456998650, '0141268522', 'Trần Đức Minh Anh', 1, '2008-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1264, 855429326764, '0141268523', 'Vũ Đức Việt Anh', 1, '2008-05-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1265, 439947049748, '0141268524', 'Nguyễn Thế Bảo', 1, '2008-11-15', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1266, 578919165976, '0141268526', 'Trịnh Bùi Gia Bảo', 1, '2008-05-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1267, 461662946824, '0141268529', 'Lương Khánh Duy', 1, '2008-03-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1268, 709680147339, '0155292095', 'Bùi Khắc Dư', 1, '2008-09-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1269, 207565429868, '0141268531', 'Phạm Thành Đạt', 1, '2008-11-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1270, 903188750187, '0141268532', 'Hoàng Xuân Hào', 1, '2008-02-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1271, 511677931876, '0141268533', 'Lê Ngọc Hân', 2, '2008-11-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1272, 295557364413, '0141268534', 'Trần Thu Hiền', 2, '2008-11-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1273, 581710416783, '0141268535', 'Nguyễn Huy Hoàng', 1, '2008-06-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1274, 597673596976, '0155287350', 'Tống Thị Hồng', 2, '2008-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1275, 902558002998, '0141268537', 'Đỗ Phùng Gia Huy', 1, '2008-08-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1276, 238691527888, '0141268538', 'Tô Gia Hưng', 1, '2008-06-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1277, 557373534131, '0141268539', 'Nguyễn Mai Lan', 2, '2008-09-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1278, 325595292001, '0141268540', 'Nguyễn Đức Thiên Lâm', 1, '2008-02-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1279, 480375378638, '0141268541', 'Hoàng Bảo Linh', 1, '2008-10-19', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1280, 278076936825, '0141268542', 'Phí Ngọc Linh', 2, '2008-06-10', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1281, 532586661613, '0141268543', 'Hà Minh Long', 1, '2008-07-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1282, 664173583903, '0141268545', 'Nguyễn Hoàng Phi Long', 1, '2008-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1283, 137418280172, '0141268547', 'Lưu Trà My', 2, '2008-09-03', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1284, 685723919384, '0141268550', 'Nguyễn Bảo Ngọc', 2, '2008-09-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1285, 801304042814, '0141408065', 'Hoàng Vũ Phong', 1, '2008-02-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1286, 153115099622, '0141268552', 'Khương Hoàng Mai Phương', 2, '2008-09-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1287, 280116960810, '0141268554', 'Lê Vũ Hà Phương', 2, '2008-08-31', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1288, 851204182470, '0155291647', 'Tống Thị Phượng', 2, '2008-10-26', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1289, 875701876457, '0141268558', 'Nguyễn Minh Thành', 1, '2008-07-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1290, 857301895784, '0141268562', 'Phạm Bảo Uyên', 2, '2008-09-27', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1291, 214836301952, '0141268563', 'Nguyễn Thành Vinh', 1, '2008-12-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1292, 743424230127, '0141268564', 'Lê Nguyễn Hà Vy', 2, '2008-09-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1293, 690267866945, '0141268565', 'Nguyễn Thị Hải Yến', 2, '2008-02-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1294, 933662270992, '0141268567', 'Hoàng Thị Thu An', 2, '2008-12-02', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1295, 170876162032, '0141268568', 'Nguyễn Hoàng Diệu An', 2, '2008-10-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1296, 820442329430, '0170285372', 'Đỗ Đức Anh', 1, '2008-03-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1297, 606828303659, '0141268569', 'Lưu Đức Anh', 1, '2008-11-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1298, 503328892945, '0141268572', 'Hoàng Việt Bách', 1, '2008-08-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1299, 212997844065, '0141268573', 'Phạm Gia Bảo', 1, '2008-07-16', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1300, 141869425677, '0141268574', 'Lương Tiến Dũng', 1, '2008-12-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1301, 269816280758, '0141268575', 'Phạm Tiến Đức', 1, '2008-09-05', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1302, 408972484842, '0141268576', 'Nguyễn Quang Hà', 1, '2008-01-22', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1303, 730613268127, '0141268577', 'Trần Ngọc Hà', 2, '2008-11-11', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1304, 491247405624, '0141268578', 'Võ Nam Hải', 1, '2008-03-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1305, 647485263720, '0141268580', 'Vũ Thanh Hiền', 2, '2008-12-01', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1306, 675393996822, '0141268581', 'Nguyễn Hoàng Hiệp', 1, '2008-06-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1307, 901173792597, '0141268583', 'Nguyễn Thu Hoài', 2, '2008-02-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1308, 668221689877, '0141268585', 'Hoàng Quang Huy', 1, '2008-07-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1309, 848645597649, '0141268586', 'Trần Ngọc Huy', 1, '2008-09-23', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1310, 802034367039, '0141268587', 'Nguyễn Quốc Hưng', 1, '2008-01-24', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1311, 930788210590, '0141268588', 'Nguyễn Phạm Việt Khôi', 1, '2008-10-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1312, 461150904041, '0141268590', 'Nguyễn Bảo Lam', 1, '2008-10-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1313, 631923990508, '0155292558', 'Phạm Trần Mai Lan', 2, '2008-08-29', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1314, 637805987687, '0141268591', 'Đinh Hương Linh', 2, '2008-11-25', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1315, 990552225364, '0141268596', 'Đoàn Đức Long', 1, '2008-02-08', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1316, 964213046655, '0141268598', 'Nguyễn Đức Lương', 1, '2008-09-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1317, 771688460219, '0141268599', 'Vũ Cẩm Ly', 2, '2008-07-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1318, 263967664400, '0141268600', 'Đinh Thị Hải Ngân', 2, '2008-08-18', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1319, 174563108175, '0141268602', 'Trần Trọng Nghĩa', 1, '2008-04-21', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1320, 766402269064, '0141268605', 'Vũ Yến Nhi', 2, '2008-11-04', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1321, 780021527950, '0141268606', 'Trần Thị Nhung', 2, '2008-01-06', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1322, 289511578970, '0141268609', 'Bùi Thị Đoan Trang', 2, '2008-06-12', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1323, 821820304078, '0141268612', 'Nguyễn Minh Trúc', 2, '2008-12-09', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1324, 546004047467, '0141268613', 'Nguyễn Cẩm Tú', 2, '2008-02-28', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1325, 323597477502, '0141268614', 'Phạm Quang Vinh', 1, '2008-10-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1326, 390143335076, '0141268616', 'Nguyễn Anh Vũ', 1, '2008-05-13', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0),
(1327, 801438057303, '3600898960', 'Lê Khánh Duy', 1, '2008-01-14', 2, 1, 'Long Biên - Hà Nội', '', 1, 0, 0);

--
-- Triggers `tbl_student`
--
DELIMITER $$
CREATE TRIGGER `del_student_realtion_after_del_student` AFTER DELETE ON `tbl_student` FOR EACH ROW DELETE FROM tbl_student_relation WHERE tbl_student_relation.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_class`
--

CREATE TABLE `tbl_student_class` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student_class`
--

INSERT INTO `tbl_student_class` (`id`, `student_id`, `year_id`, `department_id`, `create_at`) VALUES
(1, 48, 2, 1, '2022-10-07 03:40:09'),
(2, 49, 2, 1, '2022-10-07 03:40:09'),
(3, 50, 2, 1, '2022-10-07 03:40:09'),
(4, 51, 2, 1, '2022-10-07 03:40:10'),
(5, 52, 2, 1, '2022-10-07 03:40:10'),
(6, 53, 2, 1, '2022-10-07 03:40:10'),
(7, 54, 2, 1, '2022-10-07 03:40:10'),
(8, 55, 2, 1, '2022-10-07 03:40:10'),
(9, 56, 2, 1, '2022-10-07 03:40:10'),
(10, 57, 2, 1, '2022-10-07 03:40:10'),
(11, 58, 2, 1, '2022-10-07 03:40:10'),
(12, 59, 2, 1, '2022-10-07 03:40:10'),
(13, 60, 2, 1, '2022-10-07 03:40:10'),
(14, 61, 2, 1, '2022-10-07 03:40:10'),
(15, 62, 2, 1, '2022-10-07 03:40:11'),
(16, 63, 2, 1, '2022-10-07 03:40:11'),
(17, 64, 2, 1, '2022-10-07 03:40:11'),
(18, 65, 2, 1, '2022-10-07 03:40:11'),
(19, 66, 2, 1, '2022-10-07 03:40:11'),
(20, 67, 2, 1, '2022-10-07 03:40:11'),
(21, 68, 2, 1, '2022-10-07 03:40:11'),
(22, 69, 2, 1, '2022-10-07 03:40:11'),
(23, 70, 2, 1, '2022-10-07 03:40:11'),
(24, 71, 2, 1, '2022-10-07 03:40:11'),
(25, 72, 2, 1, '2022-10-07 03:40:12'),
(26, 73, 2, 1, '2022-10-07 03:40:12'),
(27, 74, 2, 1, '2022-10-07 03:40:12'),
(28, 75, 2, 1, '2022-10-07 03:40:12'),
(29, 76, 2, 1, '2022-10-07 03:40:12'),
(30, 77, 2, 1, '2022-10-07 03:40:12'),
(31, 78, 2, 1, '2022-10-07 03:40:12'),
(32, 79, 2, 1, '2022-10-07 03:40:12'),
(33, 80, 2, 1, '2022-10-07 03:40:12'),
(34, 81, 2, 1, '2022-10-07 03:40:13'),
(35, 82, 2, 1, '2022-10-07 03:40:13'),
(36, 83, 2, 1, '2022-10-07 03:40:13'),
(37, 84, 2, 1, '2022-10-07 03:40:13'),
(38, 85, 2, 1, '2022-10-07 03:40:13'),
(39, 86, 2, 1, '2022-10-07 03:40:13'),
(40, 87, 2, 1, '2022-10-07 03:40:13'),
(41, 88, 2, 1, '2022-10-07 03:40:13'),
(42, 89, 2, 1, '2022-10-07 03:40:13'),
(43, 90, 2, 1, '2022-10-07 03:40:13'),
(44, 91, 2, 1, '2022-10-07 03:40:14'),
(45, 92, 2, 1, '2022-10-07 03:40:14'),
(46, 93, 2, 1, '2022-10-07 03:40:14'),
(47, 94, 2, 1, '2022-10-07 03:40:14'),
(48, 95, 2, 2, '2022-10-07 03:43:39'),
(49, 96, 2, 2, '2022-10-07 03:43:39'),
(50, 97, 2, 2, '2022-10-07 03:43:39'),
(51, 98, 2, 2, '2022-10-07 03:43:39'),
(52, 99, 2, 2, '2022-10-07 03:43:39'),
(53, 100, 2, 2, '2022-10-07 03:43:39'),
(54, 101, 2, 2, '2022-10-07 03:43:39'),
(55, 102, 2, 2, '2022-10-07 03:43:39'),
(56, 103, 2, 2, '2022-10-07 03:43:39'),
(57, 104, 2, 2, '2022-10-07 03:43:39'),
(58, 105, 2, 2, '2022-10-07 03:43:40'),
(59, 106, 2, 2, '2022-10-07 03:43:40'),
(60, 107, 2, 2, '2022-10-07 03:43:40'),
(61, 108, 2, 2, '2022-10-07 03:43:40'),
(62, 109, 2, 2, '2022-10-07 03:43:40'),
(63, 110, 2, 2, '2022-10-07 03:43:40'),
(64, 111, 2, 2, '2022-10-07 03:43:40'),
(65, 112, 2, 2, '2022-10-07 03:43:40'),
(66, 113, 2, 2, '2022-10-07 03:43:40'),
(67, 114, 2, 2, '2022-10-07 03:43:40'),
(68, 115, 2, 2, '2022-10-07 03:43:40'),
(69, 116, 2, 2, '2022-10-07 03:43:41'),
(70, 117, 2, 2, '2022-10-07 03:43:41'),
(71, 118, 2, 2, '2022-10-07 03:43:41'),
(72, 119, 2, 2, '2022-10-07 03:43:41'),
(73, 120, 2, 2, '2022-10-07 03:43:41'),
(74, 121, 2, 2, '2022-10-07 03:43:41'),
(75, 122, 2, 2, '2022-10-07 03:43:41'),
(76, 123, 2, 2, '2022-10-07 03:43:41'),
(77, 124, 2, 2, '2022-10-07 03:43:41'),
(78, 125, 2, 2, '2022-10-07 03:43:41'),
(79, 126, 2, 2, '2022-10-07 03:43:41'),
(80, 127, 2, 2, '2022-10-07 03:43:42'),
(81, 128, 2, 2, '2022-10-07 03:43:42'),
(82, 129, 2, 2, '2022-10-07 03:43:42'),
(83, 130, 2, 2, '2022-10-07 03:43:42'),
(84, 131, 2, 2, '2022-10-07 03:43:42'),
(85, 132, 2, 2, '2022-10-07 03:43:42'),
(86, 133, 2, 2, '2022-10-07 03:43:42'),
(87, 134, 2, 2, '2022-10-07 03:43:42'),
(88, 135, 2, 2, '2022-10-07 03:43:42'),
(89, 136, 2, 2, '2022-10-07 03:43:43'),
(90, 137, 2, 2, '2022-10-07 03:43:43'),
(91, 138, 2, 2, '2022-10-07 03:43:43'),
(92, 139, 2, 2, '2022-10-07 03:43:43'),
(93, 140, 2, 2, '2022-10-07 03:43:43'),
(94, 141, 2, 2, '2022-10-07 03:43:43'),
(95, 142, 2, 3, '2022-10-07 03:51:13'),
(96, 143, 2, 3, '2022-10-07 03:51:13'),
(97, 144, 2, 3, '2022-10-07 03:51:14'),
(98, 145, 2, 3, '2022-10-07 03:51:14'),
(99, 146, 2, 3, '2022-10-07 03:51:14'),
(100, 147, 2, 3, '2022-10-07 03:51:14'),
(101, 148, 2, 3, '2022-10-07 03:51:14'),
(102, 149, 2, 3, '2022-10-07 03:51:14'),
(103, 150, 2, 3, '2022-10-07 03:51:14'),
(104, 151, 2, 3, '2022-10-07 03:51:14'),
(105, 152, 2, 3, '2022-10-07 03:51:14'),
(106, 153, 2, 3, '2022-10-07 03:51:14'),
(107, 154, 2, 3, '2022-10-07 03:51:14'),
(108, 155, 2, 3, '2022-10-07 03:51:15'),
(109, 156, 2, 3, '2022-10-07 03:51:15'),
(110, 157, 2, 3, '2022-10-07 03:51:15'),
(111, 158, 2, 3, '2022-10-07 03:51:15'),
(112, 159, 2, 3, '2022-10-07 03:51:15'),
(113, 160, 2, 3, '2022-10-07 03:51:15'),
(114, 161, 2, 3, '2022-10-07 03:51:15'),
(115, 162, 2, 3, '2022-10-07 03:51:15'),
(116, 163, 2, 3, '2022-10-07 03:51:15'),
(117, 164, 2, 3, '2022-10-07 03:51:16'),
(118, 165, 2, 3, '2022-10-07 03:51:16'),
(119, 166, 2, 3, '2022-10-07 03:51:16'),
(120, 167, 2, 3, '2022-10-07 03:51:16'),
(121, 168, 2, 3, '2022-10-07 03:51:16'),
(122, 169, 2, 3, '2022-10-07 03:51:16'),
(123, 170, 2, 3, '2022-10-07 03:51:16'),
(124, 171, 2, 3, '2022-10-07 03:51:16'),
(125, 172, 2, 3, '2022-10-07 03:51:16'),
(126, 173, 2, 3, '2022-10-07 03:51:16'),
(127, 174, 2, 3, '2022-10-07 03:51:17'),
(128, 175, 2, 3, '2022-10-07 03:51:17'),
(129, 176, 2, 3, '2022-10-07 03:51:17'),
(130, 177, 2, 3, '2022-10-07 03:51:17'),
(131, 178, 2, 3, '2022-10-07 03:51:17'),
(132, 179, 2, 3, '2022-10-07 03:51:17'),
(133, 180, 2, 3, '2022-10-07 03:51:17'),
(134, 181, 2, 3, '2022-10-07 03:51:17'),
(135, 182, 2, 3, '2022-10-07 03:51:17'),
(136, 183, 2, 3, '2022-10-07 03:51:18'),
(137, 184, 2, 3, '2022-10-07 03:51:18'),
(138, 185, 2, 3, '2022-10-07 03:51:18'),
(139, 186, 2, 3, '2022-10-07 03:51:18'),
(140, 187, 2, 4, '2022-10-07 03:52:43'),
(141, 188, 2, 4, '2022-10-07 03:52:43'),
(142, 189, 2, 4, '2022-10-07 03:52:44'),
(143, 190, 2, 4, '2022-10-07 03:52:44'),
(144, 191, 2, 4, '2022-10-07 03:52:44'),
(145, 192, 2, 4, '2022-10-07 03:52:44'),
(146, 193, 2, 4, '2022-10-07 03:52:44'),
(147, 194, 2, 4, '2022-10-07 03:52:44'),
(148, 195, 2, 4, '2022-10-07 03:52:44'),
(149, 196, 2, 4, '2022-10-07 03:52:44'),
(150, 197, 2, 4, '2022-10-07 03:52:44'),
(151, 198, 2, 4, '2022-10-07 03:52:44'),
(152, 199, 2, 4, '2022-10-07 03:52:44'),
(153, 200, 2, 4, '2022-10-07 03:52:44'),
(154, 201, 2, 4, '2022-10-07 03:52:45'),
(155, 202, 2, 4, '2022-10-07 03:52:45'),
(156, 203, 2, 4, '2022-10-07 03:52:45'),
(157, 204, 2, 4, '2022-10-07 03:52:45'),
(158, 205, 2, 4, '2022-10-07 03:52:45'),
(159, 206, 2, 4, '2022-10-07 03:52:45'),
(160, 207, 2, 4, '2022-10-07 03:52:45'),
(161, 208, 2, 4, '2022-10-07 03:52:45'),
(162, 209, 2, 4, '2022-10-07 03:52:45'),
(163, 210, 2, 4, '2022-10-07 03:52:46'),
(164, 211, 2, 4, '2022-10-07 03:52:46'),
(165, 212, 2, 4, '2022-10-07 03:52:46'),
(166, 213, 2, 4, '2022-10-07 03:52:46'),
(167, 214, 2, 4, '2022-10-07 03:52:46'),
(168, 215, 2, 4, '2022-10-07 03:52:46'),
(169, 216, 2, 4, '2022-10-07 03:52:46'),
(170, 217, 2, 4, '2022-10-07 03:52:46'),
(171, 218, 2, 4, '2022-10-07 03:52:46'),
(172, 219, 2, 4, '2022-10-07 03:52:46'),
(173, 220, 2, 4, '2022-10-07 03:52:46'),
(174, 221, 2, 4, '2022-10-07 03:52:46'),
(175, 222, 2, 4, '2022-10-07 03:52:47'),
(176, 223, 2, 4, '2022-10-07 03:52:47'),
(177, 224, 2, 4, '2022-10-07 03:52:47'),
(178, 225, 2, 4, '2022-10-07 03:52:47'),
(179, 226, 2, 4, '2022-10-07 03:52:47'),
(180, 227, 2, 4, '2022-10-07 03:52:47'),
(181, 228, 2, 4, '2022-10-07 03:52:47'),
(182, 335, 2, 5, '2022-10-07 04:05:56'),
(183, 336, 2, 5, '2022-10-07 04:05:57'),
(184, 337, 2, 5, '2022-10-07 04:05:57'),
(185, 338, 2, 5, '2022-10-07 04:05:57'),
(186, 339, 2, 5, '2022-10-07 04:05:57'),
(187, 340, 2, 5, '2022-10-07 04:05:57'),
(188, 341, 2, 5, '2022-10-07 04:05:57'),
(189, 342, 2, 5, '2022-10-07 04:05:57'),
(190, 343, 2, 5, '2022-10-07 04:05:57'),
(191, 344, 2, 5, '2022-10-07 04:05:57'),
(192, 345, 2, 5, '2022-10-07 04:05:57'),
(193, 346, 2, 5, '2022-10-07 04:05:57'),
(194, 347, 2, 5, '2022-10-07 04:05:57'),
(195, 348, 2, 5, '2022-10-07 04:05:57'),
(196, 349, 2, 5, '2022-10-07 04:05:58'),
(197, 350, 2, 5, '2022-10-07 04:05:58'),
(198, 351, 2, 5, '2022-10-07 04:05:58'),
(199, 352, 2, 5, '2022-10-07 04:05:58'),
(200, 353, 2, 5, '2022-10-07 04:05:58'),
(201, 354, 2, 5, '2022-10-07 04:05:58'),
(202, 355, 2, 5, '2022-10-07 04:05:58'),
(203, 356, 2, 5, '2022-10-07 04:05:58'),
(204, 357, 2, 5, '2022-10-07 04:05:58'),
(205, 358, 2, 5, '2022-10-07 04:05:58'),
(206, 359, 2, 5, '2022-10-07 04:05:58'),
(207, 360, 2, 5, '2022-10-07 04:05:59'),
(208, 361, 2, 5, '2022-10-07 04:05:59'),
(209, 362, 2, 5, '2022-10-07 04:05:59'),
(210, 363, 2, 5, '2022-10-07 04:05:59'),
(211, 364, 2, 5, '2022-10-07 04:05:59'),
(212, 365, 2, 5, '2022-10-07 04:05:59'),
(213, 366, 2, 5, '2022-10-07 04:05:59'),
(214, 367, 2, 5, '2022-10-07 04:05:59'),
(215, 368, 2, 5, '2022-10-07 04:05:59'),
(216, 369, 2, 5, '2022-10-07 04:05:59'),
(217, 370, 2, 5, '2022-10-07 04:05:59'),
(218, 371, 2, 5, '2022-10-07 04:05:59'),
(219, 372, 2, 5, '2022-10-07 04:06:00'),
(220, 373, 2, 5, '2022-10-07 04:06:00'),
(221, 374, 2, 5, '2022-10-07 04:06:00'),
(222, 375, 2, 5, '2022-10-07 04:06:00'),
(223, 376, 2, 5, '2022-10-07 04:06:00'),
(224, 377, 2, 5, '2022-10-07 04:06:00'),
(225, 378, 2, 6, '2022-10-07 04:07:06'),
(226, 379, 2, 6, '2022-10-07 04:07:06'),
(227, 380, 2, 6, '2022-10-07 04:07:06'),
(228, 381, 2, 6, '2022-10-07 04:07:06'),
(229, 382, 2, 6, '2022-10-07 04:07:06'),
(230, 383, 2, 6, '2022-10-07 04:07:06'),
(231, 384, 2, 6, '2022-10-07 04:07:06'),
(232, 385, 2, 6, '2022-10-07 04:07:07'),
(233, 386, 2, 6, '2022-10-07 04:07:07'),
(234, 387, 2, 6, '2022-10-07 04:07:07'),
(235, 388, 2, 6, '2022-10-07 04:07:07'),
(236, 389, 2, 6, '2022-10-07 04:07:07'),
(237, 390, 2, 6, '2022-10-07 04:07:07'),
(238, 391, 2, 6, '2022-10-07 04:07:07'),
(239, 392, 2, 6, '2022-10-07 04:07:07'),
(240, 393, 2, 6, '2022-10-07 04:07:07'),
(241, 394, 2, 6, '2022-10-07 04:07:07'),
(242, 395, 2, 6, '2022-10-07 04:07:07'),
(243, 396, 2, 6, '2022-10-07 04:07:07'),
(244, 397, 2, 6, '2022-10-07 04:07:07'),
(245, 398, 2, 6, '2022-10-07 04:07:07'),
(246, 399, 2, 6, '2022-10-07 04:07:08'),
(247, 400, 2, 6, '2022-10-07 04:07:08'),
(248, 401, 2, 6, '2022-10-07 04:07:08'),
(249, 402, 2, 6, '2022-10-07 04:07:08'),
(250, 403, 2, 6, '2022-10-07 04:07:08'),
(251, 404, 2, 6, '2022-10-07 04:07:08'),
(252, 405, 2, 6, '2022-10-07 04:07:08'),
(253, 406, 2, 6, '2022-10-07 04:07:08'),
(254, 407, 2, 6, '2022-10-07 04:07:08'),
(255, 408, 2, 6, '2022-10-07 04:07:08'),
(256, 409, 2, 6, '2022-10-07 04:07:08'),
(257, 410, 2, 6, '2022-10-07 04:07:08'),
(258, 411, 2, 6, '2022-10-07 04:07:08'),
(259, 412, 2, 6, '2022-10-07 04:07:08'),
(260, 413, 2, 6, '2022-10-07 04:07:08'),
(261, 414, 2, 6, '2022-10-07 04:07:08'),
(262, 415, 2, 6, '2022-10-07 04:07:09'),
(263, 416, 2, 6, '2022-10-07 04:07:09'),
(264, 417, 2, 6, '2022-10-07 04:07:09'),
(265, 418, 2, 6, '2022-10-07 04:07:09'),
(266, 419, 2, 19, '2022-10-07 04:13:13'),
(267, 420, 2, 19, '2022-10-07 04:13:14'),
(268, 421, 2, 19, '2022-10-07 04:13:14'),
(269, 422, 2, 19, '2022-10-07 04:13:14'),
(270, 423, 2, 19, '2022-10-07 04:13:14'),
(271, 424, 2, 19, '2022-10-07 04:13:14'),
(272, 425, 2, 19, '2022-10-07 04:13:14'),
(273, 426, 2, 19, '2022-10-07 04:13:14'),
(274, 427, 2, 19, '2022-10-07 04:13:14'),
(275, 428, 2, 19, '2022-10-07 04:13:14'),
(276, 429, 2, 19, '2022-10-07 04:13:14'),
(277, 430, 2, 19, '2022-10-07 04:13:14'),
(278, 431, 2, 19, '2022-10-07 04:13:14'),
(279, 432, 2, 19, '2022-10-07 04:13:14'),
(280, 433, 2, 19, '2022-10-07 04:13:14'),
(281, 434, 2, 19, '2022-10-07 04:13:14'),
(282, 435, 2, 19, '2022-10-07 04:13:14'),
(283, 436, 2, 19, '2022-10-07 04:13:15'),
(284, 437, 2, 19, '2022-10-07 04:13:15'),
(285, 438, 2, 19, '2022-10-07 04:13:15'),
(286, 439, 2, 19, '2022-10-07 04:13:15'),
(287, 440, 2, 19, '2022-10-07 04:13:15'),
(288, 441, 2, 19, '2022-10-07 04:13:15'),
(289, 442, 2, 19, '2022-10-07 04:13:15'),
(290, 443, 2, 19, '2022-10-07 04:13:15'),
(291, 444, 2, 19, '2022-10-07 04:13:15'),
(292, 445, 2, 19, '2022-10-07 04:13:15'),
(293, 446, 2, 19, '2022-10-07 04:13:15'),
(294, 447, 2, 19, '2022-10-07 04:13:15'),
(295, 448, 2, 19, '2022-10-07 04:13:15'),
(296, 449, 2, 19, '2022-10-07 04:13:15'),
(297, 450, 2, 19, '2022-10-07 04:13:16'),
(298, 451, 2, 19, '2022-10-07 04:13:16'),
(299, 452, 2, 19, '2022-10-07 04:13:16'),
(300, 453, 2, 19, '2022-10-07 04:13:16'),
(301, 454, 2, 19, '2022-10-07 04:13:16'),
(302, 455, 2, 19, '2022-10-07 04:13:16'),
(303, 456, 2, 19, '2022-10-07 04:13:16'),
(304, 457, 2, 19, '2022-10-07 04:13:16'),
(305, 458, 2, 20, '2022-10-07 04:14:38'),
(306, 459, 2, 20, '2022-10-07 04:14:38'),
(307, 460, 2, 20, '2022-10-07 04:14:38'),
(308, 461, 2, 20, '2022-10-07 04:14:38'),
(309, 462, 2, 20, '2022-10-07 04:14:38'),
(310, 463, 2, 20, '2022-10-07 04:14:38'),
(311, 464, 2, 20, '2022-10-07 04:14:38'),
(312, 465, 2, 20, '2022-10-07 04:14:38'),
(313, 466, 2, 20, '2022-10-07 04:14:38'),
(314, 467, 2, 20, '2022-10-07 04:14:38'),
(315, 468, 2, 20, '2022-10-07 04:14:39'),
(316, 469, 2, 20, '2022-10-07 04:14:39'),
(317, 470, 2, 20, '2022-10-07 04:14:39'),
(318, 471, 2, 20, '2022-10-07 04:14:39'),
(319, 472, 2, 20, '2022-10-07 04:14:39'),
(320, 473, 2, 20, '2022-10-07 04:14:39'),
(321, 474, 2, 20, '2022-10-07 04:14:39'),
(322, 475, 2, 20, '2022-10-07 04:14:39'),
(323, 476, 2, 20, '2022-10-07 04:14:39'),
(324, 477, 2, 20, '2022-10-07 04:14:39'),
(325, 478, 2, 20, '2022-10-07 04:14:39'),
(326, 479, 2, 20, '2022-10-07 04:14:39'),
(327, 480, 2, 20, '2022-10-07 04:14:39'),
(328, 481, 2, 20, '2022-10-07 04:14:39'),
(329, 482, 2, 20, '2022-10-07 04:14:39'),
(330, 483, 2, 20, '2022-10-07 04:14:40'),
(331, 484, 2, 20, '2022-10-07 04:14:40'),
(332, 485, 2, 20, '2022-10-07 04:14:40'),
(333, 486, 2, 20, '2022-10-07 04:14:40'),
(334, 487, 2, 20, '2022-10-07 04:14:40'),
(335, 488, 2, 20, '2022-10-07 04:14:40'),
(336, 489, 2, 20, '2022-10-07 04:14:40'),
(337, 490, 2, 20, '2022-10-07 04:14:40'),
(338, 491, 2, 20, '2022-10-07 04:14:40'),
(339, 492, 2, 20, '2022-10-07 04:14:40'),
(340, 493, 2, 20, '2022-10-07 04:14:40'),
(341, 494, 2, 20, '2022-10-07 04:14:40'),
(342, 495, 2, 20, '2022-10-07 04:14:40'),
(343, 496, 2, 20, '2022-10-07 04:14:40'),
(344, 497, 2, 20, '2022-10-07 04:14:41'),
(345, 498, 2, 21, '2022-10-07 04:16:34'),
(346, 499, 2, 21, '2022-10-07 04:16:34'),
(347, 500, 2, 21, '2022-10-07 04:16:34'),
(348, 501, 2, 21, '2022-10-07 04:16:34'),
(349, 502, 2, 21, '2022-10-07 04:16:34'),
(350, 503, 2, 21, '2022-10-07 04:16:34'),
(351, 504, 2, 21, '2022-10-07 04:16:34'),
(352, 505, 2, 21, '2022-10-07 04:16:34'),
(353, 506, 2, 21, '2022-10-07 04:16:34'),
(354, 507, 2, 21, '2022-10-07 04:16:34'),
(355, 508, 2, 21, '2022-10-07 04:16:34'),
(356, 509, 2, 21, '2022-10-07 04:16:34'),
(357, 510, 2, 21, '2022-10-07 04:16:34'),
(358, 511, 2, 21, '2022-10-07 04:16:34'),
(359, 512, 2, 21, '2022-10-07 04:16:35'),
(360, 513, 2, 21, '2022-10-07 04:16:35'),
(361, 514, 2, 21, '2022-10-07 04:16:35'),
(362, 515, 2, 21, '2022-10-07 04:16:35'),
(363, 516, 2, 21, '2022-10-07 04:16:35'),
(364, 517, 2, 21, '2022-10-07 04:16:35'),
(365, 518, 2, 21, '2022-10-07 04:16:35'),
(366, 519, 2, 21, '2022-10-07 04:16:35'),
(367, 520, 2, 21, '2022-10-07 04:16:35'),
(368, 521, 2, 21, '2022-10-07 04:16:35'),
(369, 522, 2, 21, '2022-10-07 04:16:35'),
(370, 523, 2, 21, '2022-10-07 04:16:35'),
(371, 524, 2, 21, '2022-10-07 04:16:35'),
(372, 525, 2, 21, '2022-10-07 04:16:36'),
(373, 526, 2, 21, '2022-10-07 04:16:36'),
(374, 527, 2, 21, '2022-10-07 04:16:36'),
(375, 528, 2, 21, '2022-10-07 04:16:36'),
(376, 529, 2, 21, '2022-10-07 04:16:36'),
(377, 530, 2, 21, '2022-10-07 04:16:36'),
(378, 531, 2, 21, '2022-10-07 04:16:36'),
(379, 532, 2, 21, '2022-10-07 04:16:36'),
(380, 533, 2, 21, '2022-10-07 04:16:36'),
(381, 534, 2, 21, '2022-10-07 04:16:36'),
(382, 535, 2, 21, '2022-10-07 04:16:36'),
(383, 536, 2, 21, '2022-10-07 04:16:36'),
(384, 537, 2, 21, '2022-10-07 04:16:36'),
(385, 538, 2, 21, '2022-10-07 04:16:36'),
(386, 539, 2, 21, '2022-10-07 04:16:36'),
(387, 540, 2, 21, '2022-10-07 04:16:36'),
(388, 541, 2, 21, '2022-10-07 04:16:37'),
(389, 542, 2, 21, '2022-10-07 04:16:37'),
(390, 543, 2, 21, '2022-10-07 04:16:37'),
(391, 544, 2, 21, '2022-10-07 04:16:37'),
(392, 545, 2, 21, '2022-10-07 04:16:37'),
(393, 546, 2, 21, '2022-10-07 04:16:37'),
(394, 547, 2, 21, '2022-10-07 04:16:37'),
(395, 548, 2, 21, '2022-10-07 04:16:37'),
(396, 549, 2, 21, '2022-10-07 04:16:37'),
(397, 550, 2, 22, '2022-10-07 04:18:07'),
(398, 551, 2, 22, '2022-10-07 04:18:07'),
(399, 552, 2, 22, '2022-10-07 04:18:07'),
(400, 553, 2, 22, '2022-10-07 04:18:07'),
(401, 554, 2, 22, '2022-10-07 04:18:08'),
(402, 555, 2, 22, '2022-10-07 04:18:08'),
(403, 556, 2, 22, '2022-10-07 04:18:08'),
(404, 557, 2, 22, '2022-10-07 04:18:08'),
(405, 558, 2, 22, '2022-10-07 04:18:08'),
(406, 559, 2, 22, '2022-10-07 04:18:08'),
(407, 560, 2, 22, '2022-10-07 04:18:08'),
(408, 561, 2, 22, '2022-10-07 04:18:08'),
(409, 562, 2, 22, '2022-10-07 04:18:08'),
(410, 563, 2, 22, '2022-10-07 04:18:08'),
(411, 564, 2, 22, '2022-10-07 04:18:08'),
(412, 565, 2, 22, '2022-10-07 04:18:08'),
(413, 566, 2, 22, '2022-10-07 04:18:08'),
(414, 567, 2, 22, '2022-10-07 04:18:08'),
(415, 568, 2, 22, '2022-10-07 04:18:08'),
(416, 569, 2, 22, '2022-10-07 04:18:09'),
(417, 570, 2, 22, '2022-10-07 04:18:09'),
(418, 571, 2, 22, '2022-10-07 04:18:09'),
(419, 572, 2, 22, '2022-10-07 04:18:09'),
(420, 573, 2, 22, '2022-10-07 04:18:09'),
(421, 574, 2, 22, '2022-10-07 04:18:09'),
(422, 575, 2, 22, '2022-10-07 04:18:09'),
(423, 576, 2, 22, '2022-10-07 04:18:09'),
(424, 577, 2, 22, '2022-10-07 04:18:09'),
(425, 578, 2, 22, '2022-10-07 04:18:09'),
(426, 579, 2, 22, '2022-10-07 04:18:10'),
(427, 580, 2, 22, '2022-10-07 04:18:10'),
(428, 581, 2, 22, '2022-10-07 04:18:10'),
(429, 582, 2, 22, '2022-10-07 04:18:10'),
(430, 583, 2, 22, '2022-10-07 04:18:10'),
(431, 584, 2, 22, '2022-10-07 04:18:10'),
(432, 585, 2, 22, '2022-10-07 04:18:10'),
(433, 586, 2, 22, '2022-10-07 04:18:10'),
(434, 587, 2, 22, '2022-10-07 04:18:10'),
(435, 588, 2, 22, '2022-10-07 04:18:10'),
(436, 589, 2, 22, '2022-10-07 04:18:10'),
(437, 590, 2, 22, '2022-10-07 04:18:10'),
(438, 591, 2, 22, '2022-10-07 04:18:11'),
(439, 592, 2, 22, '2022-10-07 04:18:11'),
(440, 593, 2, 22, '2022-10-07 04:18:11'),
(441, 594, 2, 22, '2022-10-07 04:18:11'),
(442, 595, 2, 22, '2022-10-07 04:18:11'),
(443, 596, 2, 22, '2022-10-07 04:18:11'),
(444, 597, 2, 23, '2022-10-07 04:20:14'),
(445, 598, 2, 23, '2022-10-07 04:20:14'),
(446, 599, 2, 23, '2022-10-07 04:20:14'),
(447, 600, 2, 23, '2022-10-07 04:20:15'),
(448, 601, 2, 23, '2022-10-07 04:20:15'),
(449, 602, 2, 23, '2022-10-07 04:20:15'),
(450, 603, 2, 23, '2022-10-07 04:20:15'),
(451, 604, 2, 23, '2022-10-07 04:20:15'),
(452, 605, 2, 23, '2022-10-07 04:20:15'),
(453, 606, 2, 23, '2022-10-07 04:20:15'),
(454, 607, 2, 23, '2022-10-07 04:20:15'),
(455, 608, 2, 23, '2022-10-07 04:20:15'),
(456, 609, 2, 23, '2022-10-07 04:20:15'),
(457, 610, 2, 23, '2022-10-07 04:20:15'),
(458, 611, 2, 23, '2022-10-07 04:20:15'),
(459, 612, 2, 23, '2022-10-07 04:20:16'),
(460, 613, 2, 23, '2022-10-07 04:20:16'),
(461, 614, 2, 23, '2022-10-07 04:20:16'),
(462, 615, 2, 23, '2022-10-07 04:20:16'),
(463, 616, 2, 23, '2022-10-07 04:20:16'),
(464, 617, 2, 23, '2022-10-07 04:20:16'),
(465, 618, 2, 23, '2022-10-07 04:20:16'),
(466, 619, 2, 23, '2022-10-07 04:20:16'),
(467, 620, 2, 23, '2022-10-07 04:20:16'),
(468, 621, 2, 23, '2022-10-07 04:20:16'),
(469, 622, 2, 23, '2022-10-07 04:20:17'),
(470, 623, 2, 23, '2022-10-07 04:20:17'),
(471, 624, 2, 23, '2022-10-07 04:20:17'),
(472, 625, 2, 23, '2022-10-07 04:20:17'),
(473, 626, 2, 23, '2022-10-07 04:20:17'),
(474, 627, 2, 23, '2022-10-07 04:20:17'),
(475, 628, 2, 23, '2022-10-07 04:20:17'),
(476, 629, 2, 23, '2022-10-07 04:20:17'),
(477, 630, 2, 23, '2022-10-07 04:20:17'),
(478, 631, 2, 23, '2022-10-07 04:20:17'),
(479, 632, 2, 23, '2022-10-07 04:20:18'),
(480, 633, 2, 23, '2022-10-07 04:20:18'),
(481, 634, 2, 23, '2022-10-07 04:20:18'),
(482, 635, 2, 23, '2022-10-07 04:20:18'),
(483, 636, 2, 23, '2022-10-07 04:20:18'),
(484, 637, 2, 23, '2022-10-07 04:20:18'),
(485, 638, 2, 23, '2022-10-07 04:20:18'),
(486, 639, 2, 23, '2022-10-07 04:20:18'),
(487, 640, 2, 23, '2022-10-07 04:20:18'),
(488, 641, 2, 23, '2022-10-07 04:20:18'),
(489, 642, 2, 23, '2022-10-07 04:20:19'),
(490, 643, 2, 23, '2022-10-07 04:20:19'),
(491, 644, 2, 23, '2022-10-07 04:20:19'),
(492, 645, 2, 23, '2022-10-07 04:20:19'),
(493, 646, 2, 24, '2022-10-07 08:17:47'),
(494, 647, 2, 24, '2022-10-07 08:17:47'),
(495, 648, 2, 24, '2022-10-07 08:17:47'),
(496, 649, 2, 24, '2022-10-07 08:17:47'),
(497, 650, 2, 24, '2022-10-07 08:17:47'),
(498, 651, 2, 24, '2022-10-07 08:17:48'),
(499, 652, 2, 24, '2022-10-07 08:17:48'),
(500, 653, 2, 24, '2022-10-07 08:17:48'),
(501, 654, 2, 24, '2022-10-07 08:17:48'),
(502, 655, 2, 24, '2022-10-07 08:17:48'),
(503, 656, 2, 24, '2022-10-07 08:17:48'),
(504, 657, 2, 24, '2022-10-07 08:17:48'),
(505, 658, 2, 24, '2022-10-07 08:17:48'),
(506, 659, 2, 24, '2022-10-07 08:17:48'),
(507, 660, 2, 24, '2022-10-07 08:17:48'),
(508, 661, 2, 24, '2022-10-07 08:17:48'),
(509, 662, 2, 24, '2022-10-07 08:17:48'),
(510, 663, 2, 24, '2022-10-07 08:17:48'),
(511, 664, 2, 24, '2022-10-07 08:17:49'),
(512, 665, 2, 24, '2022-10-07 08:17:49'),
(513, 666, 2, 24, '2022-10-07 08:17:49'),
(514, 667, 2, 24, '2022-10-07 08:17:49'),
(515, 668, 2, 24, '2022-10-07 08:17:49'),
(516, 669, 2, 24, '2022-10-07 08:17:49'),
(517, 670, 2, 24, '2022-10-07 08:17:49'),
(518, 671, 2, 24, '2022-10-07 08:17:49'),
(519, 672, 2, 24, '2022-10-07 08:17:49'),
(520, 673, 2, 24, '2022-10-07 08:17:49'),
(521, 674, 2, 24, '2022-10-07 08:17:49'),
(522, 675, 2, 24, '2022-10-07 08:17:49'),
(523, 676, 2, 24, '2022-10-07 08:17:50'),
(524, 677, 2, 24, '2022-10-07 08:17:50'),
(525, 678, 2, 24, '2022-10-07 08:17:50'),
(526, 679, 2, 24, '2022-10-07 08:17:50'),
(527, 680, 2, 24, '2022-10-07 08:17:50'),
(528, 681, 2, 24, '2022-10-07 08:17:50'),
(529, 682, 2, 24, '2022-10-07 08:17:50'),
(530, 683, 2, 24, '2022-10-07 08:17:50'),
(531, 684, 2, 24, '2022-10-07 08:17:50'),
(532, 685, 2, 24, '2022-10-07 08:17:51'),
(533, 686, 2, 24, '2022-10-07 08:17:51'),
(534, 687, 2, 24, '2022-10-07 08:17:51'),
(535, 688, 2, 25, '2022-10-07 08:20:44'),
(536, 689, 2, 25, '2022-10-07 08:20:44'),
(537, 690, 2, 25, '2022-10-07 08:20:44'),
(538, 691, 2, 25, '2022-10-07 08:20:44'),
(539, 692, 2, 25, '2022-10-07 08:20:44'),
(540, 693, 2, 25, '2022-10-07 08:20:45'),
(541, 694, 2, 25, '2022-10-07 08:20:45'),
(542, 695, 2, 25, '2022-10-07 08:20:45'),
(543, 696, 2, 25, '2022-10-07 08:20:45'),
(544, 697, 2, 25, '2022-10-07 08:20:45'),
(545, 698, 2, 25, '2022-10-07 08:20:45'),
(546, 699, 2, 25, '2022-10-07 08:20:45'),
(547, 700, 2, 25, '2022-10-07 08:20:45'),
(548, 701, 2, 25, '2022-10-07 08:20:45'),
(549, 702, 2, 25, '2022-10-07 08:20:45'),
(550, 703, 2, 25, '2022-10-07 08:20:45'),
(551, 704, 2, 25, '2022-10-07 08:20:46'),
(552, 705, 2, 25, '2022-10-07 08:20:46'),
(553, 706, 2, 25, '2022-10-07 08:20:46'),
(554, 707, 2, 25, '2022-10-07 08:20:46'),
(555, 708, 2, 25, '2022-10-07 08:20:46'),
(556, 709, 2, 25, '2022-10-07 08:20:46'),
(557, 710, 2, 25, '2022-10-07 08:20:46'),
(558, 711, 2, 25, '2022-10-07 08:20:46'),
(559, 712, 2, 25, '2022-10-07 08:20:46'),
(560, 713, 2, 25, '2022-10-07 08:20:46'),
(561, 714, 2, 25, '2022-10-07 08:20:46'),
(562, 715, 2, 25, '2022-10-07 08:20:46'),
(563, 716, 2, 25, '2022-10-07 08:20:46'),
(564, 717, 2, 25, '2022-10-07 08:20:47'),
(565, 718, 2, 25, '2022-10-07 08:20:47'),
(566, 719, 2, 25, '2022-10-07 08:20:47'),
(567, 720, 2, 25, '2022-10-07 08:20:47'),
(568, 721, 2, 25, '2022-10-07 08:20:47'),
(569, 722, 2, 25, '2022-10-07 08:20:47'),
(570, 723, 2, 25, '2022-10-07 08:20:47'),
(571, 724, 2, 25, '2022-10-07 08:20:47'),
(572, 725, 2, 25, '2022-10-07 08:20:47'),
(573, 726, 2, 25, '2022-10-07 08:20:47'),
(574, 727, 2, 25, '2022-10-07 08:20:48'),
(575, 728, 2, 25, '2022-10-07 08:20:48'),
(576, 729, 2, 25, '2022-10-07 08:20:48'),
(577, 730, 2, 25, '2022-10-07 08:20:48'),
(578, 731, 2, 25, '2022-10-07 08:20:48'),
(579, 732, 2, 25, '2022-10-07 08:20:48'),
(580, 733, 2, 25, '2022-10-07 08:20:48'),
(581, 734, 2, 25, '2022-10-07 08:20:48'),
(582, 735, 2, 26, '2022-10-07 08:57:12'),
(583, 736, 2, 26, '2022-10-07 08:57:12'),
(584, 737, 2, 26, '2022-10-07 08:57:12'),
(585, 738, 2, 26, '2022-10-07 08:57:12'),
(586, 739, 2, 26, '2022-10-07 08:57:12'),
(587, 740, 2, 26, '2022-10-07 08:57:12'),
(588, 741, 2, 26, '2022-10-07 08:57:12'),
(589, 742, 2, 26, '2022-10-07 08:57:12'),
(590, 743, 2, 26, '2022-10-07 08:57:12'),
(591, 744, 2, 26, '2022-10-07 08:57:12'),
(592, 745, 2, 26, '2022-10-07 08:57:12'),
(593, 746, 2, 26, '2022-10-07 08:57:12'),
(594, 747, 2, 26, '2022-10-07 08:57:13'),
(595, 748, 2, 26, '2022-10-07 08:57:13'),
(596, 749, 2, 26, '2022-10-07 08:57:13'),
(597, 750, 2, 26, '2022-10-07 08:57:13'),
(598, 751, 2, 26, '2022-10-07 08:57:13'),
(599, 752, 2, 26, '2022-10-07 08:57:13'),
(600, 753, 2, 26, '2022-10-07 08:57:13'),
(601, 754, 2, 26, '2022-10-07 08:57:13'),
(602, 755, 2, 26, '2022-10-07 08:57:13'),
(603, 756, 2, 26, '2022-10-07 08:57:13'),
(604, 757, 2, 26, '2022-10-07 08:57:14'),
(605, 758, 2, 26, '2022-10-07 08:57:14'),
(606, 759, 2, 26, '2022-10-07 08:57:14'),
(607, 760, 2, 26, '2022-10-07 08:57:14'),
(608, 761, 2, 26, '2022-10-07 08:57:14'),
(609, 762, 2, 26, '2022-10-07 08:57:14'),
(610, 763, 2, 26, '2022-10-07 08:57:14'),
(611, 764, 2, 26, '2022-10-07 08:57:14'),
(612, 765, 2, 26, '2022-10-07 08:57:14'),
(613, 766, 2, 26, '2022-10-07 08:57:14'),
(614, 767, 2, 26, '2022-10-07 08:57:14'),
(615, 768, 2, 26, '2022-10-07 08:57:15'),
(616, 769, 2, 26, '2022-10-07 08:57:15'),
(617, 770, 2, 26, '2022-10-07 08:57:15'),
(618, 771, 2, 26, '2022-10-07 08:57:15'),
(619, 772, 2, 26, '2022-10-07 08:57:15'),
(620, 773, 2, 26, '2022-10-07 08:57:15'),
(621, 774, 2, 26, '2022-10-07 08:57:15'),
(622, 775, 2, 26, '2022-10-07 08:57:15'),
(623, 776, 2, 26, '2022-10-07 08:57:15'),
(624, 777, 2, 26, '2022-10-07 08:57:15'),
(625, 778, 2, 26, '2022-10-07 08:57:16'),
(626, 779, 2, 26, '2022-10-07 08:57:16'),
(627, 780, 2, 26, '2022-10-07 08:57:16'),
(628, 781, 2, 27, '2022-10-07 08:57:41'),
(629, 782, 2, 27, '2022-10-07 08:57:41'),
(630, 783, 2, 27, '2022-10-07 08:57:42'),
(631, 784, 2, 27, '2022-10-07 08:57:42'),
(632, 785, 2, 27, '2022-10-07 08:57:42'),
(633, 786, 2, 27, '2022-10-07 08:57:42'),
(634, 787, 2, 27, '2022-10-07 08:57:42'),
(635, 788, 2, 27, '2022-10-07 08:57:42'),
(636, 789, 2, 27, '2022-10-07 08:57:42'),
(637, 790, 2, 27, '2022-10-07 08:57:42'),
(638, 791, 2, 27, '2022-10-07 08:57:42'),
(639, 792, 2, 27, '2022-10-07 08:57:42'),
(640, 793, 2, 27, '2022-10-07 08:57:42'),
(641, 794, 2, 27, '2022-10-07 08:57:43'),
(642, 795, 2, 27, '2022-10-07 08:57:43'),
(643, 796, 2, 27, '2022-10-07 08:57:43'),
(644, 797, 2, 27, '2022-10-07 08:57:43'),
(645, 798, 2, 27, '2022-10-07 08:57:43'),
(646, 799, 2, 27, '2022-10-07 08:57:43'),
(647, 800, 2, 27, '2022-10-07 08:57:43'),
(648, 801, 2, 27, '2022-10-07 08:57:43'),
(649, 802, 2, 27, '2022-10-07 08:57:43'),
(650, 803, 2, 27, '2022-10-07 08:57:43'),
(651, 804, 2, 27, '2022-10-07 08:57:43'),
(652, 805, 2, 27, '2022-10-07 08:57:44'),
(653, 806, 2, 27, '2022-10-07 08:57:44'),
(654, 807, 2, 27, '2022-10-07 08:57:44'),
(655, 808, 2, 27, '2022-10-07 08:57:44'),
(656, 809, 2, 27, '2022-10-07 08:57:44'),
(657, 810, 2, 27, '2022-10-07 08:57:44'),
(658, 811, 2, 27, '2022-10-07 08:57:44'),
(659, 812, 2, 27, '2022-10-07 08:57:44'),
(660, 813, 2, 27, '2022-10-07 08:57:44'),
(661, 814, 2, 27, '2022-10-07 08:57:45'),
(662, 815, 2, 27, '2022-10-07 08:57:45'),
(663, 816, 2, 27, '2022-10-07 08:57:45'),
(664, 817, 2, 27, '2022-10-07 08:57:45'),
(665, 818, 2, 27, '2022-10-07 08:57:45'),
(666, 819, 2, 27, '2022-10-07 08:57:45'),
(667, 820, 2, 27, '2022-10-07 08:57:45'),
(668, 821, 2, 27, '2022-10-07 08:57:45'),
(669, 822, 2, 27, '2022-10-07 08:57:45'),
(670, 823, 2, 27, '2022-10-07 08:57:45'),
(671, 824, 2, 27, '2022-10-07 08:57:46'),
(672, 825, 2, 27, '2022-10-07 08:57:46'),
(673, 826, 2, 27, '2022-10-07 08:57:46'),
(674, 827, 2, 27, '2022-10-07 08:57:46'),
(675, 828, 2, 28, '2022-10-07 08:59:37'),
(676, 829, 2, 28, '2022-10-07 08:59:37'),
(677, 830, 2, 28, '2022-10-07 08:59:37'),
(678, 831, 2, 28, '2022-10-07 08:59:37'),
(679, 832, 2, 28, '2022-10-07 08:59:37'),
(680, 833, 2, 28, '2022-10-07 08:59:37'),
(681, 834, 2, 28, '2022-10-07 08:59:37'),
(682, 835, 2, 28, '2022-10-07 08:59:38'),
(683, 836, 2, 28, '2022-10-07 08:59:38'),
(684, 837, 2, 28, '2022-10-07 08:59:38'),
(685, 838, 2, 28, '2022-10-07 08:59:38'),
(686, 839, 2, 28, '2022-10-07 08:59:38'),
(687, 840, 2, 28, '2022-10-07 08:59:38'),
(688, 841, 2, 28, '2022-10-07 08:59:38'),
(689, 842, 2, 28, '2022-10-07 08:59:38'),
(690, 843, 2, 28, '2022-10-07 08:59:38'),
(691, 844, 2, 28, '2022-10-07 08:59:38'),
(692, 845, 2, 28, '2022-10-07 08:59:38'),
(693, 846, 2, 28, '2022-10-07 08:59:39'),
(694, 847, 2, 28, '2022-10-07 08:59:39'),
(695, 848, 2, 28, '2022-10-07 08:59:39'),
(696, 849, 2, 28, '2022-10-07 08:59:39'),
(697, 850, 2, 28, '2022-10-07 08:59:39'),
(698, 851, 2, 28, '2022-10-07 08:59:39'),
(699, 852, 2, 28, '2022-10-07 08:59:39'),
(700, 853, 2, 28, '2022-10-07 08:59:39'),
(701, 854, 2, 28, '2022-10-07 08:59:39'),
(702, 855, 2, 28, '2022-10-07 08:59:40'),
(703, 856, 2, 28, '2022-10-07 08:59:40'),
(704, 857, 2, 28, '2022-10-07 08:59:40'),
(705, 858, 2, 28, '2022-10-07 08:59:40'),
(706, 859, 2, 28, '2022-10-07 08:59:40'),
(707, 860, 2, 28, '2022-10-07 08:59:40'),
(708, 861, 2, 28, '2022-10-07 08:59:40'),
(709, 862, 2, 28, '2022-10-07 08:59:40'),
(710, 863, 2, 28, '2022-10-07 08:59:40'),
(711, 864, 2, 28, '2022-10-07 08:59:41'),
(712, 865, 2, 28, '2022-10-07 08:59:41'),
(713, 866, 2, 28, '2022-10-07 08:59:41'),
(714, 867, 2, 28, '2022-10-07 08:59:41'),
(715, 868, 2, 28, '2022-10-07 08:59:41'),
(716, 869, 2, 28, '2022-10-07 08:59:41'),
(717, 870, 2, 29, '2022-10-07 09:00:38'),
(718, 871, 2, 29, '2022-10-07 09:00:39'),
(719, 872, 2, 29, '2022-10-07 09:00:39'),
(720, 873, 2, 29, '2022-10-07 09:00:39'),
(721, 874, 2, 29, '2022-10-07 09:00:39'),
(722, 875, 2, 29, '2022-10-07 09:00:39'),
(723, 876, 2, 29, '2022-10-07 09:00:39'),
(724, 877, 2, 29, '2022-10-07 09:00:39'),
(725, 878, 2, 29, '2022-10-07 09:00:39'),
(726, 879, 2, 29, '2022-10-07 09:00:39'),
(727, 880, 2, 29, '2022-10-07 09:00:39'),
(728, 881, 2, 29, '2022-10-07 09:00:39'),
(729, 882, 2, 29, '2022-10-07 09:00:40'),
(730, 883, 2, 29, '2022-10-07 09:00:40'),
(731, 884, 2, 29, '2022-10-07 09:00:40'),
(732, 885, 2, 29, '2022-10-07 09:00:40'),
(733, 886, 2, 29, '2022-10-07 09:00:40'),
(734, 887, 2, 29, '2022-10-07 09:00:40'),
(735, 888, 2, 29, '2022-10-07 09:00:40'),
(736, 889, 2, 29, '2022-10-07 09:00:40'),
(737, 890, 2, 29, '2022-10-07 09:00:40'),
(738, 891, 2, 29, '2022-10-07 09:00:40'),
(739, 892, 2, 29, '2022-10-07 09:00:40'),
(740, 893, 2, 29, '2022-10-07 09:00:41'),
(741, 894, 2, 29, '2022-10-07 09:00:41'),
(742, 895, 2, 29, '2022-10-07 09:00:41'),
(743, 896, 2, 29, '2022-10-07 09:00:41'),
(744, 897, 2, 29, '2022-10-07 09:00:41'),
(745, 898, 2, 29, '2022-10-07 09:00:41'),
(746, 899, 2, 29, '2022-10-07 09:00:41'),
(747, 900, 2, 29, '2022-10-07 09:00:41'),
(748, 901, 2, 29, '2022-10-07 09:00:41'),
(749, 902, 2, 29, '2022-10-07 09:00:41'),
(750, 903, 2, 29, '2022-10-07 09:00:42'),
(751, 904, 2, 29, '2022-10-07 09:00:42'),
(752, 905, 2, 29, '2022-10-07 09:00:42'),
(753, 906, 2, 29, '2022-10-07 09:00:42'),
(754, 907, 2, 29, '2022-10-07 09:00:42'),
(755, 908, 2, 29, '2022-10-07 09:00:42'),
(756, 909, 2, 29, '2022-10-07 09:00:42'),
(757, 910, 2, 29, '2022-10-07 09:00:42'),
(758, 911, 2, 29, '2022-10-07 09:00:42'),
(759, 912, 2, 29, '2022-10-07 09:00:42'),
(760, 913, 2, 29, '2022-10-07 09:00:43'),
(761, 914, 2, 29, '2022-10-07 09:00:43'),
(762, 915, 2, 29, '2022-10-07 09:00:43'),
(763, 916, 2, 30, '2022-10-07 14:47:36'),
(764, 917, 2, 30, '2022-10-07 14:47:36'),
(765, 918, 2, 30, '2022-10-07 14:47:36'),
(766, 919, 2, 30, '2022-10-07 14:47:36'),
(767, 920, 2, 30, '2022-10-07 14:47:36'),
(768, 921, 2, 30, '2022-10-07 14:47:36'),
(769, 922, 2, 30, '2022-10-07 14:47:36'),
(770, 923, 2, 30, '2022-10-07 14:47:36'),
(771, 924, 2, 30, '2022-10-07 14:47:36'),
(772, 925, 2, 30, '2022-10-07 14:47:36'),
(773, 926, 2, 30, '2022-10-07 14:47:36'),
(774, 927, 2, 30, '2022-10-07 14:47:36'),
(775, 928, 2, 30, '2022-10-07 14:47:37'),
(776, 929, 2, 30, '2022-10-07 14:47:37'),
(777, 930, 2, 30, '2022-10-07 14:47:37'),
(778, 931, 2, 30, '2022-10-07 14:47:37'),
(779, 932, 2, 30, '2022-10-07 14:47:37'),
(780, 933, 2, 30, '2022-10-07 14:47:37'),
(781, 934, 2, 30, '2022-10-07 14:47:37'),
(782, 935, 2, 30, '2022-10-07 14:47:37'),
(783, 936, 2, 30, '2022-10-07 14:47:37'),
(784, 937, 2, 30, '2022-10-07 14:47:37'),
(785, 938, 2, 30, '2022-10-07 14:47:38'),
(786, 939, 2, 30, '2022-10-07 14:47:38'),
(787, 940, 2, 30, '2022-10-07 14:47:38'),
(788, 941, 2, 30, '2022-10-07 14:47:38'),
(789, 942, 2, 30, '2022-10-07 14:47:38'),
(790, 943, 2, 30, '2022-10-07 14:47:38'),
(791, 944, 2, 30, '2022-10-07 14:47:38'),
(792, 945, 2, 30, '2022-10-07 14:47:38'),
(793, 946, 2, 30, '2022-10-07 14:47:38'),
(794, 947, 2, 30, '2022-10-07 14:47:38'),
(795, 948, 2, 30, '2022-10-07 14:47:38'),
(796, 949, 2, 30, '2022-10-07 14:47:39'),
(797, 950, 2, 30, '2022-10-07 14:47:39'),
(798, 951, 2, 30, '2022-10-07 14:47:39'),
(799, 952, 2, 30, '2022-10-07 14:47:39'),
(800, 953, 2, 30, '2022-10-07 14:47:39'),
(801, 954, 2, 30, '2022-10-07 14:47:39'),
(802, 955, 2, 30, '2022-10-07 14:47:39'),
(803, 956, 2, 30, '2022-10-07 14:47:39'),
(804, 957, 2, 30, '2022-10-07 14:47:39'),
(805, 958, 2, 30, '2022-10-07 14:47:39'),
(806, 959, 2, 30, '2022-10-07 14:47:40'),
(807, 960, 2, 30, '2022-10-07 14:47:40'),
(808, 961, 2, 30, '2022-10-07 14:47:40'),
(809, 962, 2, 31, '2022-10-07 14:48:08'),
(810, 963, 2, 31, '2022-10-07 14:48:08'),
(811, 964, 2, 31, '2022-10-07 14:48:08'),
(812, 965, 2, 31, '2022-10-07 14:48:09'),
(813, 966, 2, 31, '2022-10-07 14:48:09'),
(814, 967, 2, 31, '2022-10-07 14:48:09'),
(815, 968, 2, 31, '2022-10-07 14:48:09'),
(816, 969, 2, 31, '2022-10-07 14:48:09'),
(817, 970, 2, 31, '2022-10-07 14:48:09'),
(818, 971, 2, 31, '2022-10-07 14:48:09'),
(819, 972, 2, 31, '2022-10-07 14:48:09'),
(820, 973, 2, 31, '2022-10-07 14:48:09'),
(821, 974, 2, 31, '2022-10-07 14:48:09'),
(822, 975, 2, 31, '2022-10-07 14:48:09'),
(823, 976, 2, 31, '2022-10-07 14:48:10'),
(824, 977, 2, 31, '2022-10-07 14:48:10'),
(825, 978, 2, 31, '2022-10-07 14:48:10'),
(826, 979, 2, 31, '2022-10-07 14:48:10'),
(827, 980, 2, 31, '2022-10-07 14:48:10'),
(828, 981, 2, 31, '2022-10-07 14:48:10'),
(829, 982, 2, 31, '2022-10-07 14:48:10'),
(830, 983, 2, 31, '2022-10-07 14:48:10'),
(831, 984, 2, 31, '2022-10-07 14:48:10'),
(832, 985, 2, 31, '2022-10-07 14:48:10'),
(833, 986, 2, 31, '2022-10-07 14:48:11'),
(834, 987, 2, 31, '2022-10-07 14:48:11'),
(835, 988, 2, 31, '2022-10-07 14:48:11'),
(836, 989, 2, 31, '2022-10-07 14:48:11'),
(837, 990, 2, 31, '2022-10-07 14:48:11'),
(838, 991, 2, 31, '2022-10-07 14:48:11'),
(839, 992, 2, 31, '2022-10-07 14:48:11'),
(840, 993, 2, 31, '2022-10-07 14:48:11'),
(841, 994, 2, 31, '2022-10-07 14:48:12'),
(842, 995, 2, 31, '2022-10-07 14:48:12'),
(843, 996, 2, 31, '2022-10-07 14:48:12'),
(844, 997, 2, 31, '2022-10-07 14:48:12'),
(845, 998, 2, 31, '2022-10-07 14:48:12'),
(846, 999, 2, 31, '2022-10-07 14:48:12'),
(847, 1000, 2, 31, '2022-10-07 14:48:12'),
(848, 1001, 2, 31, '2022-10-07 14:48:12'),
(849, 1002, 2, 31, '2022-10-07 14:48:12'),
(850, 1003, 2, 31, '2022-10-07 14:48:12'),
(851, 1004, 2, 31, '2022-10-07 14:48:12'),
(852, 1005, 2, 31, '2022-10-07 14:48:13'),
(853, 1006, 2, 31, '2022-10-07 14:48:13'),
(854, 1007, 2, 31, '2022-10-07 14:48:13'),
(855, 1008, 2, 31, '2022-10-07 14:48:13'),
(856, 1009, 2, 31, '2022-10-07 14:48:13'),
(857, 1010, 2, 31, '2022-10-07 14:48:13'),
(858, 1011, 2, 32, '2022-10-07 14:48:34'),
(859, 1012, 2, 32, '2022-10-07 14:48:34'),
(860, 1013, 2, 32, '2022-10-07 14:48:34'),
(861, 1014, 2, 32, '2022-10-07 14:48:34'),
(862, 1015, 2, 32, '2022-10-07 14:48:34'),
(863, 1016, 2, 32, '2022-10-07 14:48:34'),
(864, 1017, 2, 32, '2022-10-07 14:48:34'),
(865, 1018, 2, 32, '2022-10-07 14:48:34'),
(866, 1019, 2, 32, '2022-10-07 14:48:35'),
(867, 1020, 2, 32, '2022-10-07 14:48:35'),
(868, 1021, 2, 32, '2022-10-07 14:48:35'),
(869, 1022, 2, 32, '2022-10-07 14:48:35'),
(870, 1023, 2, 32, '2022-10-07 14:48:35'),
(871, 1024, 2, 32, '2022-10-07 14:48:35'),
(872, 1025, 2, 32, '2022-10-07 14:48:35'),
(873, 1026, 2, 32, '2022-10-07 14:48:35'),
(874, 1027, 2, 32, '2022-10-07 14:48:35'),
(875, 1028, 2, 32, '2022-10-07 14:48:35'),
(876, 1029, 2, 32, '2022-10-07 14:48:35'),
(877, 1030, 2, 32, '2022-10-07 14:48:35'),
(878, 1031, 2, 32, '2022-10-07 14:48:36'),
(879, 1032, 2, 32, '2022-10-07 14:48:36'),
(880, 1033, 2, 32, '2022-10-07 14:48:36'),
(881, 1034, 2, 32, '2022-10-07 14:48:36'),
(882, 1035, 2, 32, '2022-10-07 14:48:36'),
(883, 1036, 2, 32, '2022-10-07 14:48:36'),
(884, 1037, 2, 32, '2022-10-07 14:48:36'),
(885, 1038, 2, 32, '2022-10-07 14:48:36'),
(886, 1039, 2, 32, '2022-10-07 14:48:36'),
(887, 1040, 2, 32, '2022-10-07 14:48:36'),
(888, 1041, 2, 32, '2022-10-07 14:48:36'),
(889, 1042, 2, 32, '2022-10-07 14:48:36'),
(890, 1043, 2, 32, '2022-10-07 14:48:36'),
(891, 1044, 2, 32, '2022-10-07 14:48:37'),
(892, 1045, 2, 32, '2022-10-07 14:48:37'),
(893, 1046, 2, 32, '2022-10-07 14:48:37'),
(894, 1047, 2, 32, '2022-10-07 14:48:37'),
(895, 1048, 2, 32, '2022-10-07 14:48:37'),
(896, 1049, 2, 32, '2022-10-07 14:48:37'),
(897, 1050, 2, 32, '2022-10-07 14:48:37'),
(898, 1051, 2, 32, '2022-10-07 14:48:37'),
(899, 1052, 2, 32, '2022-10-07 14:48:37'),
(900, 1053, 2, 32, '2022-10-07 14:48:37'),
(901, 1054, 2, 32, '2022-10-07 14:48:37'),
(902, 1055, 2, 32, '2022-10-07 14:48:37'),
(903, 1056, 2, 33, '2022-10-07 14:49:04'),
(904, 1057, 2, 33, '2022-10-07 14:49:04'),
(905, 1058, 2, 33, '2022-10-07 14:49:04'),
(906, 1059, 2, 33, '2022-10-07 14:49:05'),
(907, 1060, 2, 33, '2022-10-07 14:49:05'),
(908, 1061, 2, 33, '2022-10-07 14:49:05'),
(909, 1062, 2, 33, '2022-10-07 14:49:05'),
(910, 1063, 2, 33, '2022-10-07 14:49:05'),
(911, 1064, 2, 33, '2022-10-07 14:49:05'),
(912, 1065, 2, 33, '2022-10-07 14:49:05'),
(913, 1066, 2, 33, '2022-10-07 14:49:05'),
(914, 1067, 2, 33, '2022-10-07 14:49:05'),
(915, 1068, 2, 33, '2022-10-07 14:49:05'),
(916, 1069, 2, 33, '2022-10-07 14:49:05'),
(917, 1070, 2, 33, '2022-10-07 14:49:05'),
(918, 1071, 2, 33, '2022-10-07 14:49:05'),
(919, 1072, 2, 33, '2022-10-07 14:49:05'),
(920, 1073, 2, 33, '2022-10-07 14:49:06'),
(921, 1074, 2, 33, '2022-10-07 14:49:06'),
(922, 1075, 2, 33, '2022-10-07 14:49:06'),
(923, 1076, 2, 33, '2022-10-07 14:49:06'),
(924, 1077, 2, 33, '2022-10-07 14:49:06'),
(925, 1078, 2, 33, '2022-10-07 14:49:06'),
(926, 1079, 2, 33, '2022-10-07 14:49:06'),
(927, 1080, 2, 33, '2022-10-07 14:49:06'),
(928, 1081, 2, 33, '2022-10-07 14:49:06'),
(929, 1082, 2, 33, '2022-10-07 14:49:06'),
(930, 1083, 2, 33, '2022-10-07 14:49:06'),
(931, 1084, 2, 33, '2022-10-07 14:49:06'),
(932, 1085, 2, 33, '2022-10-07 14:49:07'),
(933, 1086, 2, 33, '2022-10-07 14:49:07'),
(934, 1087, 2, 33, '2022-10-07 14:49:07'),
(935, 1088, 2, 33, '2022-10-07 14:49:07'),
(936, 1089, 2, 33, '2022-10-07 14:49:07'),
(937, 1090, 2, 33, '2022-10-07 14:49:07'),
(938, 1091, 2, 33, '2022-10-07 14:49:07'),
(939, 1092, 2, 33, '2022-10-07 14:49:07'),
(940, 1093, 2, 33, '2022-10-07 14:49:07'),
(941, 1094, 2, 33, '2022-10-07 14:49:07'),
(942, 1095, 2, 33, '2022-10-07 14:49:07'),
(943, 1096, 2, 34, '2022-10-07 14:49:29'),
(944, 1097, 2, 34, '2022-10-07 14:49:29'),
(945, 1098, 2, 34, '2022-10-07 14:49:29'),
(946, 1099, 2, 34, '2022-10-07 14:49:29'),
(947, 1100, 2, 34, '2022-10-07 14:49:29'),
(948, 1101, 2, 34, '2022-10-07 14:49:29'),
(949, 1102, 2, 34, '2022-10-07 14:49:29'),
(950, 1103, 2, 34, '2022-10-07 14:49:29'),
(951, 1104, 2, 34, '2022-10-07 14:49:29'),
(952, 1105, 2, 34, '2022-10-07 14:49:29'),
(953, 1106, 2, 34, '2022-10-07 14:49:29'),
(954, 1107, 2, 34, '2022-10-07 14:49:29'),
(955, 1108, 2, 34, '2022-10-07 14:49:30'),
(956, 1109, 2, 34, '2022-10-07 14:49:30'),
(957, 1110, 2, 34, '2022-10-07 14:49:30'),
(958, 1111, 2, 34, '2022-10-07 14:49:30'),
(959, 1112, 2, 34, '2022-10-07 14:49:30'),
(960, 1113, 2, 34, '2022-10-07 14:49:30'),
(961, 1114, 2, 34, '2022-10-07 14:49:30'),
(962, 1115, 2, 34, '2022-10-07 14:49:30'),
(963, 1116, 2, 34, '2022-10-07 14:49:30'),
(964, 1117, 2, 34, '2022-10-07 14:49:30'),
(965, 1118, 2, 34, '2022-10-07 14:49:30'),
(966, 1119, 2, 34, '2022-10-07 14:49:30'),
(967, 1120, 2, 34, '2022-10-07 14:49:31'),
(968, 1121, 2, 34, '2022-10-07 14:49:31'),
(969, 1122, 2, 34, '2022-10-07 14:49:31'),
(970, 1123, 2, 34, '2022-10-07 14:49:31'),
(971, 1124, 2, 34, '2022-10-07 14:49:31'),
(972, 1125, 2, 34, '2022-10-07 14:49:31'),
(973, 1126, 2, 34, '2022-10-07 14:49:31'),
(974, 1127, 2, 34, '2022-10-07 14:49:31'),
(975, 1128, 2, 34, '2022-10-07 14:49:31'),
(976, 1129, 2, 34, '2022-10-07 14:49:31'),
(977, 1130, 2, 34, '2022-10-07 14:49:31'),
(978, 1131, 2, 34, '2022-10-07 14:49:31'),
(979, 1132, 2, 34, '2022-10-07 14:49:31'),
(980, 1133, 2, 34, '2022-10-07 14:49:32'),
(981, 1134, 2, 35, '2022-10-07 18:19:05'),
(982, 1135, 2, 35, '2022-10-07 18:19:05'),
(983, 1136, 2, 35, '2022-10-07 18:19:05'),
(984, 1137, 2, 35, '2022-10-07 18:19:05'),
(985, 1138, 2, 35, '2022-10-07 18:19:05'),
(986, 1140, 2, 35, '2022-10-07 18:19:05'),
(987, 1142, 2, 35, '2022-10-07 18:19:05'),
(988, 1143, 2, 35, '2022-10-07 18:19:05'),
(989, 1144, 2, 35, '2022-10-07 18:19:05'),
(990, 1145, 2, 35, '2022-10-07 18:19:05'),
(991, 1146, 2, 35, '2022-10-07 18:19:05'),
(992, 1147, 2, 35, '2022-10-07 18:19:05'),
(993, 1148, 2, 35, '2022-10-07 18:19:05'),
(994, 1149, 2, 35, '2022-10-07 18:19:06'),
(995, 1150, 2, 35, '2022-10-07 18:19:06'),
(996, 1151, 2, 35, '2022-10-07 18:19:06'),
(997, 1152, 2, 35, '2022-10-07 18:19:06'),
(998, 1153, 2, 35, '2022-10-07 18:19:06'),
(999, 1154, 2, 35, '2022-10-07 18:19:06'),
(1000, 1155, 2, 35, '2022-10-07 18:19:06'),
(1001, 1156, 2, 35, '2022-10-07 18:19:06'),
(1002, 1157, 2, 35, '2022-10-07 18:19:06'),
(1003, 1158, 2, 35, '2022-10-07 18:19:06'),
(1004, 1159, 2, 35, '2022-10-07 18:19:06'),
(1005, 1160, 2, 35, '2022-10-07 18:19:06'),
(1006, 1161, 2, 35, '2022-10-07 18:19:06'),
(1007, 1162, 2, 35, '2022-10-07 18:19:06'),
(1008, 1163, 2, 35, '2022-10-07 18:19:06'),
(1009, 1164, 2, 35, '2022-10-07 18:19:06'),
(1010, 1165, 2, 35, '2022-10-07 18:19:07'),
(1011, 1166, 2, 35, '2022-10-07 18:19:07'),
(1012, 1167, 2, 35, '2022-10-07 18:19:07'),
(1013, 1168, 2, 35, '2022-10-07 18:19:07'),
(1014, 1169, 2, 35, '2022-10-07 18:19:07'),
(1015, 1170, 2, 35, '2022-10-07 18:19:07'),
(1016, 1171, 2, 35, '2022-10-07 18:19:07'),
(1017, 1172, 2, 35, '2022-10-07 18:19:07'),
(1018, 1173, 2, 35, '2022-10-07 18:19:07'),
(1019, 1174, 2, 35, '2022-10-07 18:19:07'),
(1020, 1175, 2, 35, '2022-10-07 18:19:07'),
(1021, 1176, 2, 35, '2022-10-07 18:19:07'),
(1022, 1177, 2, 36, '2022-10-07 18:19:40'),
(1023, 1178, 2, 36, '2022-10-07 18:19:40'),
(1024, 1179, 2, 36, '2022-10-07 18:19:41'),
(1025, 1180, 2, 36, '2022-10-07 18:19:41'),
(1026, 1181, 2, 36, '2022-10-07 18:19:41'),
(1027, 1182, 2, 36, '2022-10-07 18:19:41'),
(1028, 1183, 2, 36, '2022-10-07 18:19:41'),
(1029, 1184, 2, 36, '2022-10-07 18:19:41'),
(1030, 1185, 2, 36, '2022-10-07 18:19:41'),
(1031, 1186, 2, 36, '2022-10-07 18:19:41'),
(1032, 1187, 2, 36, '2022-10-07 18:19:41'),
(1033, 1188, 2, 36, '2022-10-07 18:19:41'),
(1034, 1189, 2, 36, '2022-10-07 18:19:41'),
(1035, 1190, 2, 36, '2022-10-07 18:19:41'),
(1036, 1191, 2, 36, '2022-10-07 18:19:41'),
(1037, 1192, 2, 36, '2022-10-07 18:19:41'),
(1038, 1193, 2, 36, '2022-10-07 18:19:41'),
(1039, 1194, 2, 36, '2022-10-07 18:19:41'),
(1040, 1195, 2, 36, '2022-10-07 18:19:41'),
(1041, 1196, 2, 36, '2022-10-07 18:19:42'),
(1042, 1197, 2, 36, '2022-10-07 18:19:42'),
(1043, 1198, 2, 36, '2022-10-07 18:19:42'),
(1044, 1199, 2, 36, '2022-10-07 18:19:42'),
(1045, 1200, 2, 36, '2022-10-07 18:19:42'),
(1046, 1201, 2, 36, '2022-10-07 18:19:42'),
(1047, 1202, 2, 36, '2022-10-07 18:19:42'),
(1048, 1203, 2, 36, '2022-10-07 18:19:42'),
(1049, 1204, 2, 36, '2022-10-07 18:19:42'),
(1050, 1205, 2, 36, '2022-10-07 18:19:42'),
(1051, 1206, 2, 36, '2022-10-07 18:19:42'),
(1052, 1207, 2, 36, '2022-10-07 18:19:42'),
(1053, 1208, 2, 36, '2022-10-07 18:19:42'),
(1054, 1209, 2, 36, '2022-10-07 18:19:43'),
(1055, 1210, 2, 36, '2022-10-07 18:19:43'),
(1056, 1211, 2, 36, '2022-10-07 18:19:43'),
(1057, 1212, 2, 36, '2022-10-07 18:19:43'),
(1058, 1213, 2, 36, '2022-10-07 18:19:43'),
(1059, 1214, 2, 36, '2022-10-07 18:19:43'),
(1060, 1215, 2, 36, '2022-10-07 18:19:43'),
(1061, 1216, 2, 36, '2022-10-07 18:19:43'),
(1062, 1217, 2, 36, '2022-10-07 18:19:43'),
(1063, 1218, 2, 36, '2022-10-07 18:19:43'),
(1064, 1219, 2, 37, '2022-10-07 18:20:03'),
(1065, 1220, 2, 37, '2022-10-07 18:20:03'),
(1066, 1221, 2, 37, '2022-10-07 18:20:03'),
(1067, 1222, 2, 37, '2022-10-07 18:20:03'),
(1068, 1223, 2, 37, '2022-10-07 18:20:03'),
(1069, 1224, 2, 37, '2022-10-07 18:20:03'),
(1070, 1225, 2, 37, '2022-10-07 18:20:03'),
(1071, 1226, 2, 37, '2022-10-07 18:20:04'),
(1072, 1227, 2, 37, '2022-10-07 18:20:04'),
(1073, 1228, 2, 37, '2022-10-07 18:20:04'),
(1074, 1229, 2, 37, '2022-10-07 18:20:04'),
(1075, 1230, 2, 37, '2022-10-07 18:20:04'),
(1076, 1231, 2, 37, '2022-10-07 18:20:04'),
(1077, 1232, 2, 37, '2022-10-07 18:20:04'),
(1078, 1233, 2, 37, '2022-10-07 18:20:04'),
(1079, 1234, 2, 37, '2022-10-07 18:20:04'),
(1080, 1235, 2, 37, '2022-10-07 18:20:04'),
(1081, 1236, 2, 37, '2022-10-07 18:20:04'),
(1082, 1237, 2, 37, '2022-10-07 18:20:04'),
(1083, 1238, 2, 37, '2022-10-07 18:20:04'),
(1084, 1239, 2, 37, '2022-10-07 18:20:04'),
(1085, 1240, 2, 37, '2022-10-07 18:20:04'),
(1086, 1241, 2, 37, '2022-10-07 18:20:05'),
(1087, 1242, 2, 37, '2022-10-07 18:20:05'),
(1088, 1243, 2, 37, '2022-10-07 18:20:05'),
(1089, 1244, 2, 37, '2022-10-07 18:20:05'),
(1090, 1245, 2, 37, '2022-10-07 18:20:05'),
(1091, 1246, 2, 37, '2022-10-07 18:20:05'),
(1092, 1247, 2, 37, '2022-10-07 18:20:05'),
(1093, 1248, 2, 37, '2022-10-07 18:20:05'),
(1094, 1249, 2, 37, '2022-10-07 18:20:05'),
(1095, 1250, 2, 37, '2022-10-07 18:20:05'),
(1096, 1251, 2, 37, '2022-10-07 18:20:05'),
(1097, 1252, 2, 37, '2022-10-07 18:20:06'),
(1098, 1253, 2, 37, '2022-10-07 18:20:06'),
(1099, 1254, 2, 37, '2022-10-07 18:20:06'),
(1100, 1255, 2, 37, '2022-10-07 18:20:06'),
(1101, 1256, 2, 37, '2022-10-07 18:20:06'),
(1102, 1257, 2, 37, '2022-10-07 18:20:06'),
(1103, 1258, 2, 37, '2022-10-07 18:20:06'),
(1104, 1259, 2, 37, '2022-10-07 18:20:06'),
(1105, 1260, 2, 37, '2022-10-07 18:20:06'),
(1106, 1261, 2, 38, '2022-10-07 18:20:30'),
(1107, 1262, 2, 38, '2022-10-07 18:20:30'),
(1108, 1263, 2, 38, '2022-10-07 18:20:30'),
(1109, 1264, 2, 38, '2022-10-07 18:20:30'),
(1110, 1265, 2, 38, '2022-10-07 18:20:30'),
(1111, 1266, 2, 38, '2022-10-07 18:20:30'),
(1112, 1267, 2, 38, '2022-10-07 18:20:30'),
(1113, 1268, 2, 38, '2022-10-07 18:20:30'),
(1114, 1269, 2, 38, '2022-10-07 18:20:30'),
(1115, 1270, 2, 38, '2022-10-07 18:20:30'),
(1116, 1271, 2, 38, '2022-10-07 18:20:31'),
(1117, 1272, 2, 38, '2022-10-07 18:20:31'),
(1118, 1273, 2, 38, '2022-10-07 18:20:31'),
(1119, 1274, 2, 38, '2022-10-07 18:20:31'),
(1120, 1275, 2, 38, '2022-10-07 18:20:31'),
(1121, 1276, 2, 38, '2022-10-07 18:20:31'),
(1122, 1277, 2, 38, '2022-10-07 18:20:31'),
(1123, 1278, 2, 38, '2022-10-07 18:20:31'),
(1124, 1279, 2, 38, '2022-10-07 18:20:31'),
(1125, 1280, 2, 38, '2022-10-07 18:20:31'),
(1126, 1281, 2, 38, '2022-10-07 18:20:31'),
(1127, 1282, 2, 38, '2022-10-07 18:20:31'),
(1128, 1283, 2, 38, '2022-10-07 18:20:31'),
(1129, 1284, 2, 38, '2022-10-07 18:20:31'),
(1130, 1285, 2, 38, '2022-10-07 18:20:32'),
(1131, 1286, 2, 38, '2022-10-07 18:20:32'),
(1132, 1287, 2, 38, '2022-10-07 18:20:32'),
(1133, 1288, 2, 38, '2022-10-07 18:20:32'),
(1134, 1289, 2, 38, '2022-10-07 18:20:32'),
(1135, 1290, 2, 38, '2022-10-07 18:20:32'),
(1136, 1291, 2, 38, '2022-10-07 18:20:32'),
(1137, 1292, 2, 38, '2022-10-07 18:20:32'),
(1138, 1293, 2, 38, '2022-10-07 18:20:32'),
(1139, 1294, 2, 39, '2022-10-07 18:20:44'),
(1140, 1295, 2, 39, '2022-10-07 18:20:44'),
(1141, 1296, 2, 39, '2022-10-07 18:20:44'),
(1142, 1297, 2, 39, '2022-10-07 18:20:44'),
(1143, 1298, 2, 39, '2022-10-07 18:20:44'),
(1144, 1299, 2, 39, '2022-10-07 18:20:44'),
(1145, 1300, 2, 39, '2022-10-07 18:20:44'),
(1146, 1301, 2, 39, '2022-10-07 18:20:45'),
(1147, 1302, 2, 39, '2022-10-07 18:20:45'),
(1148, 1303, 2, 39, '2022-10-07 18:20:45'),
(1149, 1304, 2, 39, '2022-10-07 18:20:45'),
(1150, 1305, 2, 39, '2022-10-07 18:20:45'),
(1151, 1306, 2, 39, '2022-10-07 18:20:45'),
(1152, 1307, 2, 39, '2022-10-07 18:20:45'),
(1153, 1308, 2, 39, '2022-10-07 18:20:45'),
(1154, 1309, 2, 39, '2022-10-07 18:20:45'),
(1155, 1310, 2, 39, '2022-10-07 18:20:45'),
(1156, 1311, 2, 39, '2022-10-07 18:20:45'),
(1157, 1312, 2, 39, '2022-10-07 18:20:45'),
(1158, 1313, 2, 39, '2022-10-07 18:20:45'),
(1159, 1314, 2, 39, '2022-10-07 18:20:46'),
(1160, 1315, 2, 39, '2022-10-07 18:20:46'),
(1161, 1316, 2, 39, '2022-10-07 18:20:46'),
(1162, 1317, 2, 39, '2022-10-07 18:20:46'),
(1163, 1318, 2, 39, '2022-10-07 18:20:46'),
(1164, 1319, 2, 39, '2022-10-07 18:20:46'),
(1165, 1320, 2, 39, '2022-10-07 18:20:46'),
(1166, 1321, 2, 39, '2022-10-07 18:20:46'),
(1167, 1322, 2, 39, '2022-10-07 18:20:46'),
(1168, 1323, 2, 39, '2022-10-07 18:20:47'),
(1169, 1324, 2, 39, '2022-10-07 18:20:47'),
(1170, 1325, 2, 39, '2022-10-07 18:20:47'),
(1171, 1326, 2, 39, '2022-10-07 18:20:47'),
(1172, 1327, 2, 39, '2022-10-07 18:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_point`
--

CREATE TABLE `tbl_student_point` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `type_point` int(11) NOT NULL,
  `point` float NOT NULL,
  `year_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student_point`
--

INSERT INTO `tbl_student_point` (`id`, `code`, `student_id`, `user_id`, `subject_id`, `type_point`, `point`, `year_id`, `semester`, `create_at`) VALUES
(1, 1667441638, 1200, 58, 8, 1, 8, 2, 1, '2022-11-03 09:13:58'),
(2, 1667441673, 1200, 58, 8, 5, 6, 2, 1, '2022-11-03 09:14:33'),
(3, 1667466774, 1202, 58, 8, 5, 8, 2, 1, '2022-11-03 16:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_relation`
--

CREATE TABLE `tbl_student_relation` (
  `id` int(11) NOT NULL,
  `code` bigint(20) NOT NULL,
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student_relation`
--

INSERT INTO `tbl_student_relation` (`id`, `code`, `relation`, `fullname`, `year`, `phone`, `job`) VALUES
(1, 123456789101, 'Bố', 'Đào Văn C', 1988, '0987654315', 'Tự do'),
(2, 123456789101, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654321', 'Tự do'),
(3, 123456789102, 'Bố', 'Đào Văn C', 1988, '0987654316', 'Tự do'),
(4, 123456789102, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654322', 'Tự do'),
(5, 123456789103, 'Bố', 'Đào Văn C', 1988, '0987654317', 'Tự do'),
(6, 123456789103, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654323', 'Tự do'),
(7, 123456789104, 'Bố', 'Đào Văn C', 1988, '0987654318', 'Tự do'),
(8, 123456789104, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654324', 'Tự do'),
(9, 123456789105, 'Bố', 'Đào Văn C', 1988, '0987654319', 'Tự do'),
(10, 123456789105, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654325', 'Tự do'),
(11, 123456789106, 'Bố', 'Đào Văn C', 1988, '0987654320', 'Tự do'),
(12, 123456789106, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654326', 'Tự do'),
(13, 123456789107, 'Bố', 'Đào Văn C', 1988, '0987654321', 'Tự do'),
(14, 123456789107, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654327', 'Tự do'),
(15, 123456789108, 'Bố', 'Đào Văn C', 1988, '0987654322', 'Tự do'),
(16, 123456789108, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654328', 'Tự do'),
(17, 123456789109, 'Bố', 'Đào Văn C', 1988, '0987654323', 'Tự do'),
(18, 123456789109, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654329', 'Tự do'),
(19, 123456789110, 'Bố', 'Đào Văn C', 1988, '0987654324', 'Tự do'),
(20, 123456789110, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654330', 'Tự do'),
(21, 123456789111, 'Bố', 'Đào Văn C', 1988, '0987654325', 'Tự do'),
(22, 123456789111, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654331', 'Tự do'),
(23, 123456789112, 'Bố', 'Đào Văn C', 1988, '0987654326', 'Tự do'),
(24, 123456789112, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654332', 'Tự do'),
(25, 123456789113, 'Bố', 'Đào Văn C', 1988, '0987654327', 'Tự do'),
(26, 123456789113, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654333', 'Tự do'),
(27, 123456789114, 'Bố', 'Đào Văn C', 1988, '0987654328', 'Tự do'),
(28, 123456789114, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654334', 'Tự do'),
(29, 123456789115, 'Bố', 'Đào Văn C', 1988, '0987654329', 'Tự do'),
(30, 123456789115, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654335', 'Tự do'),
(31, 123456789116, 'Bố', 'Đào Văn C', 1988, '0987654330', 'Tự do'),
(32, 123456789116, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654336', 'Tự do'),
(33, 123456789117, 'Bố', 'Đào Văn C', 1988, '0987654331', 'Tự do'),
(34, 123456789117, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654337', 'Tự do'),
(35, 123456789118, 'Bố', 'Đào Văn C', 1988, '0987654332', 'Tự do'),
(36, 123456789118, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654338', 'Tự do'),
(37, 123456789119, 'Bố', 'Đào Văn C', 1988, '0987654333', 'Tự do'),
(38, 123456789119, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654339', 'Tự do'),
(39, 123456789120, 'Bố', 'Đào Văn C', 1988, '0987654334', 'Tự do'),
(40, 123456789120, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654340', 'Tự do'),
(41, 123456789101, 'Bố', 'Đào Văn C', 1988, '0987654315', 'Tự do'),
(42, 123456789101, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654321', 'Tự do'),
(43, 123456789102, 'Bố', 'Đào Văn C', 1988, '0987654316', 'Tự do'),
(44, 123456789102, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654322', 'Tự do'),
(45, 123456789103, 'Bố', 'Đào Văn C', 1988, '0987654317', 'Tự do'),
(46, 123456789103, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654323', 'Tự do'),
(47, 123456789104, 'Bố', 'Đào Văn C', 1988, '0987654318', 'Tự do'),
(48, 123456789104, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654324', 'Tự do'),
(49, 123456789105, 'Bố', 'Đào Văn C', 1988, '0987654319', 'Tự do'),
(50, 123456789105, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654325', 'Tự do'),
(51, 123456789106, 'Bố', 'Đào Văn C', 1988, '0987654320', 'Tự do'),
(52, 123456789106, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654326', 'Tự do'),
(53, 123456789107, 'Bố', 'Đào Văn C', 1988, '0987654321', 'Tự do'),
(54, 123456789107, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654327', 'Tự do'),
(55, 123456789108, 'Bố', 'Đào Văn C', 1988, '0987654322', 'Tự do'),
(56, 123456789108, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654328', 'Tự do'),
(57, 123456789109, 'Bố', 'Đào Văn C', 1988, '0987654323', 'Tự do'),
(58, 123456789109, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654329', 'Tự do'),
(59, 123456789110, 'Bố', 'Đào Văn C', 1988, '0987654324', 'Tự do'),
(60, 123456789110, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654330', 'Tự do'),
(61, 123456789111, 'Bố', 'Đào Văn C', 1988, '0987654325', 'Tự do'),
(62, 123456789111, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654331', 'Tự do'),
(63, 123456789112, 'Bố', 'Đào Văn C', 1988, '0987654326', 'Tự do'),
(64, 123456789112, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654332', 'Tự do'),
(65, 123456789113, 'Bố', 'Đào Văn C', 1988, '0987654327', 'Tự do'),
(66, 123456789113, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654333', 'Tự do'),
(67, 123456789114, 'Bố', 'Đào Văn C', 1988, '0987654328', 'Tự do'),
(68, 123456789114, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654334', 'Tự do'),
(69, 123456789115, 'Bố', 'Đào Văn C', 1988, '0987654329', 'Tự do'),
(70, 123456789115, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654335', 'Tự do'),
(71, 123456789116, 'Bố', 'Đào Văn C', 1988, '0987654330', 'Tự do'),
(72, 123456789116, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654336', 'Tự do'),
(73, 123456789117, 'Bố', 'Đào Văn C', 1988, '0987654331', 'Tự do'),
(74, 123456789117, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654337', 'Tự do'),
(75, 123456789118, 'Bố', 'Đào Văn C', 1988, '0987654332', 'Tự do'),
(76, 123456789118, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654338', 'Tự do'),
(77, 123456789119, 'Bố', 'Đào Văn C', 1988, '0987654333', 'Tự do'),
(78, 123456789119, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654339', 'Tự do'),
(79, 123456789120, 'Bố', 'Đào Văn C', 1988, '0987654334', 'Tự do'),
(80, 123456789120, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654340', 'Tự do'),
(81, 123456789101, 'Bố', 'Đào Văn C', 1988, '0987654315', 'Tự do'),
(82, 123456789101, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654321', 'Tự do'),
(83, 123456789102, 'Bố', 'Đào Văn C', 1988, '0987654316', 'Tự do'),
(84, 123456789102, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654322', 'Tự do'),
(85, 123456789103, 'Bố', 'Đào Văn C', 1988, '0987654317', 'Tự do'),
(86, 123456789103, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654323', 'Tự do'),
(87, 123456789104, 'Bố', 'Đào Văn C', 1988, '0987654318', 'Tự do'),
(88, 123456789104, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654324', 'Tự do'),
(89, 123456789105, 'Bố', 'Đào Văn C', 1988, '0987654319', 'Tự do'),
(90, 123456789105, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654325', 'Tự do'),
(91, 123456789106, 'Bố', 'Đào Văn C', 1988, '0987654320', 'Tự do'),
(92, 123456789106, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654326', 'Tự do'),
(93, 123456789107, 'Bố', 'Đào Văn C', 1988, '0987654321', 'Tự do'),
(94, 123456789107, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654327', 'Tự do'),
(95, 123456789108, 'Bố', 'Đào Văn C', 1988, '0987654322', 'Tự do'),
(96, 123456789108, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654328', 'Tự do'),
(97, 123456789109, 'Bố', 'Đào Văn C', 1988, '0987654323', 'Tự do'),
(98, 123456789109, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654329', 'Tự do'),
(99, 123456789110, 'Bố', 'Đào Văn C', 1988, '0987654324', 'Tự do'),
(100, 123456789110, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654330', 'Tự do'),
(101, 123456789111, 'Bố', 'Đào Văn C', 1988, '0987654325', 'Tự do'),
(102, 123456789111, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654331', 'Tự do'),
(103, 123456789112, 'Bố', 'Đào Văn C', 1988, '0987654326', 'Tự do'),
(104, 123456789112, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654332', 'Tự do'),
(105, 123456789113, 'Bố', 'Đào Văn C', 1988, '0987654327', 'Tự do'),
(106, 123456789113, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654333', 'Tự do'),
(107, 123456789114, 'Bố', 'Đào Văn C', 1988, '0987654328', 'Tự do'),
(108, 123456789114, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654334', 'Tự do'),
(109, 123456789115, 'Bố', 'Đào Văn C', 1988, '0987654329', 'Tự do'),
(110, 123456789115, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654335', 'Tự do'),
(111, 123456789116, 'Bố', 'Đào Văn C', 1988, '0987654330', 'Tự do'),
(112, 123456789116, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654336', 'Tự do'),
(113, 123456789117, 'Bố', 'Đào Văn C', 1988, '0987654331', 'Tự do'),
(114, 123456789117, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654337', 'Tự do'),
(115, 123456789118, 'Bố', 'Đào Văn C', 1988, '0987654332', 'Tự do'),
(116, 123456789118, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654338', 'Tự do'),
(117, 123456789119, 'Bố', 'Đào Văn C', 1988, '0987654333', 'Tự do'),
(118, 123456789119, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654339', 'Tự do'),
(119, 123456789120, 'Bố', 'Đào Văn C', 1988, '0987654334', 'Tự do'),
(120, 123456789120, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654340', 'Tự do');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_work` date NOT NULL,
  `time_work` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_main` int(11) NOT NULL,
  `user_share` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 cong viec moi; 1 cong vice bi xoa, 2 dang xu ly, 3 hoan thanh',
  `create_at` datetime NOT NULL,
  `is_display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`id`, `code`, `group_id`, `title`, `content`, `date_work`, `time_work`, `user_id`, `user_main`, `user_share`, `file`, `status`, `create_at`, `is_display`) VALUES
(1, 1666125467, 1, 'asdf', 'asdf', '2022-10-19', 1, 1, 60, '60', '', 0, '2022-10-21 10:01:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_comment`
--

CREATE TABLE `tbl_task_comment` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_group`
--

CREATE TABLE `tbl_task_group` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_task_group`
--

INSERT INTO `tbl_task_group` (`id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 'Demo', 1, '2022-10-19 03:35:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_up_class`
--

CREATE TABLE `tbl_up_class` (
  `id` int(11) NOT NULL,
  `year_from` int(11) NOT NULL,
  `department_from` int(11) NOT NULL,
  `year_to` int(11) NOT NULL,
  `department_to` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hr_id` int(11) NOT NULL,
  `group_role_id` int(11) NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `is_change` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `code`, `username`, `password`, `active`, `last_login`, `token`, `info_login`, `hr_id`, `group_role_id`, `avatar`, `is_change`) VALUES
(1, 1, 'admin', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 1, '2022-11-04 23:11:08', 'd9432fcc488a7c17808511b3f237fb38f7a541c7', '127.0.0.1-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0', 0, 0, '', 0),
(10, 1665086234, 'huyenltt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 204, 1, '', 0),
(11, 1665086258, 'thanhnt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 203, 2, '', 0),
(12, 1665086266, 'hiennt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 202, 2, '', 0),
(13, 1665086275, 'hoantm', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 201, 2, '', 0),
(14, 1665086282, 'binhdtt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 200, 2, '', 0),
(15, 1665086299, 'linhnh', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 199, 1, '', 0),
(16, 1665086307, 'tuqa', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '2022-10-12 08:36:43', 'caaf997aa6e113db1ed59c1a9fd6fb063d2037f0', '127.0.0.1-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', 198, 1, '', 1),
(17, 1665086313, 'maintt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 197, 1, '', 0),
(18, 1665086320, 'maidtt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 196, 1, '', 0),
(19, 1665086326, 'loannt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 195, 1, '', 0),
(20, 1665086335, 'quannh', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 194, 1, '', 0),
(21, 1665086343, 'hungbv', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 193, 1, '', 0),
(22, 1665086349, 'thudt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 192, 1, '', 0),
(23, 1665086356, 'liendh', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 191, 1, '', 0),
(24, 1665086361, 'phuongttm', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 190, 1, '', 0),
(25, 1665086379, 'thuyntt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 189, 1, '', 0),
(26, 1665086387, 'ngocvtb', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 188, 1, '', 0),
(27, 1665086398, 'thuct', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 187, 1, '', 0),
(28, 1665086407, 'hienpt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 186, 1, '', 0),
(29, 1665086417, 'thanhtx', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 185, 1, '', 0),
(30, 1665086434, 'chadtt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 184, 1, '', 0),
(31, 1665086443, 'lientt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 183, 1, '', 0),
(32, 1665086451, 'chilh', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 182, 1, '', 0),
(33, 1665086472, 'hangnt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 181, 1, '', 0),
(34, 1665086519, 'hienant', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 180, 1, '', 0),
(35, 1665086527, 'ledt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 179, 1, '', 0),
(36, 1665086536, 'linhnd', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 178, 1, '', 0),
(37, 1665086545, 'truongnx', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 177, 1, '', 0),
(38, 1665086553, 'thangpc', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 176, 1, '', 0),
(39, 1665086563, 'dautt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 175, 1, '', 0),
(40, 1665086573, 'trucpn', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 174, 1, '', 0),
(41, 1665086582, 'tuanht', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 173, 1, '', 0),
(42, 1665086589, 'trangbt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 172, 1, '', 0),
(43, 1665086627, 'huongpt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 171, 1, '', 0),
(44, 1665086636, 'thuyptt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 170, 1, '', 0),
(45, 1665086643, 'antt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 169, 1, '', 0),
(46, 1665086653, 'lytth', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 168, 1, '', 0),
(47, 1665086661, 'trangntt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 167, 1, '', 0),
(48, 1665086670, 'linhdm', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 166, 1, '', 0),
(49, 1665086686, 'giangvt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 165, 1, '', 0),
(50, 1665086700, 'hoaintt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 164, 1, '', 0),
(51, 1665086709, 'tinhvth', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 163, 1, '', 0),
(52, 1665086718, 'giangtt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 162, 1, '', 0),
(53, 1665086727, 'thuanntb', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 161, 1, '', 0),
(54, 1665086735, 'thuynt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 160, 1, '', 0),
(55, 1665086745, 'nhungdth', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 159, 1, '', 0),
(56, 1665086757, 'hiepnt', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 158, 1, '', 0),
(57, 1665086779, 'thoattk', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 157, 1, '', 0),
(58, 1665086787, 'thanhmh', '61d6504733ca7757e259c644acd085c4dd471019', 1, '2022-11-03 22:30:03', 'aef0ecda19afaaf31cd0fb75ad46409cb65b8f3b', '127.0.0.1-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0', 156, 1, '', 1),
(59, 1665086795, 'anhctp', '61d6504733ca7757e259c644acd085c4dd471019', 1, '2022-10-16 00:23:26', '208aa5aaa1bc321925c6604b6101d5f3d88435aa', '127.0.0.1-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', 155, 1, '', 1),
(60, 1665086803, 'thuyntd', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '0000-00-00 00:00:00', '', '', 154, 4, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utensils`
--

CREATE TABLE `tbl_utensils` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Sủ dụng để kiểm soát việc import từ file'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_utensils`
--

INSERT INTO `tbl_utensils` (`id`, `code`, `cate_id`, `title`, `image`, `content`, `stock`, `status`, `create_at`, `user_id`) VALUES
(1, 38163453, 3, 'Quả địa cầu', '1661189454_38163453.png', 'Quả địa cầu là một mô hình ba chiều mô phỏng Trái Đất (quả địa cầu mặt đất hay quả địa cầu địa lý) hay các thiên thể khác như hành tinh, ngôi sao hay vệ tinh tự nhiên.', 5, 0, '2022-08-23 01:22:17', 0),
(2, 12345678, 1, 'Quả  cầu vật lý', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(3, 12345679, 1, 'Bản đồ Việt Nam', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(4, 12345680, 1, 'Ảnh mô phỏng hệ thống hô hấp của người', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(5, 12345681, 1, 'Bản đồ địa lý châu âu', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 9, 0, '2022-08-23 23:15:23', 0),
(6, 12345682, 1, 'Bản đồ địa lý châu á', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 9, 0, '2022-08-23 23:15:23', 0),
(7, 12345683, 1, 'Bản đồ địa lý châu phi', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 9, 0, '2022-08-23 23:15:23', 0),
(8, 12345684, 1, 'Bản đồ địa lý chây mỹ', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 10, 0, '2022-08-23 23:15:23', 0),
(9, 12345685, 1, 'Bản đồ địa lý châu úc', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 9, 0, '2022-08-23 23:15:23', 0),
(10, 12345686, 1, 'Kính lúp', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(11, 12345687, 1, 'Lăng kính', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(12, 12345688, 1, 'Kính hiển vi', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(13, 12345689, 1, 'Mô hình cơ quan tiêu hóa của người', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(14, 12345690, 1, 'Bộ thí nghiệm hóa học', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(15, 12345691, 1, 'Bộ thí nghiệm vật lý - Lục đẩy Acsimet', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(16, 12345692, 1, 'Bộ thí nghiệm vật lý - Khúc xạ ánh sáng', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(17, 12345693, 1, 'Bộ thí nghiệm vật lý - Lục từ và từ trường', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(18, 12345694, 1, 'Bộ thí nghiệ vật lý - Dao động và sóng', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(19, 12345695, 1, 'Bảng tuần hoàn các nguyên tố hóa học', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:15:23', 0),
(20, 12345696, 1, 'Mô hình hệ tuần hoàn của người', '', 'Hỗ trợ tương tác trực quan cho nội dung bài học', 4, 0, '2022-08-23 23:17:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utensils_imp`
--

CREATE TABLE `tbl_utensils_imp` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date_import` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_utensils_imp`
--

INSERT INTO `tbl_utensils_imp` (`id`, `code`, `date_import`, `user_id`, `source`, `notes`, `create_at`) VALUES
(1, 1666848975, '2022-10-27', 1, 'Tự mua sắm', '', '2022-10-27 12:46:16');

--
-- Triggers `tbl_utensils_imp`
--
DELIMITER $$
CREATE TRIGGER `del_utensils_detail_after_del_utensils` AFTER DELETE ON `tbl_utensils_imp` FOR EACH ROW DELETE FROM tbl_utensils_imp_detail WHERE tbl_utensils_imp_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utensils_imp_detail`
--

CREATE TABLE `tbl_utensils_imp_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `utensils_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_utensils_imp_detail`
--

INSERT INTO `tbl_utensils_imp_detail` (`id`, `code`, `utensils_id`, `quantily`) VALUES
(6, 1666848975, 6, 5),
(7, 1666848975, 5, 5),
(8, 1666848975, 7, 5),
(9, 1666848975, 9, 5),
(10, 1666848975, 8, 6);

--
-- Triggers `tbl_utensils_imp_detail`
--
DELIMITER $$
CREATE TRIGGER `update_stock_utenslis_after_insert_import_utensils` AFTER INSERT ON `tbl_utensils_imp_detail` FOR EACH ROW UPDATE tbl_utensils SET stock = (stock + new.quantily) WHERE tbl_utensils.id = new.utensils_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock_uutensils_after_del_import_utensils` AFTER DELETE ON `tbl_utensils_imp_detail` FOR EACH ROW UPDATE tbl_utensils SET stock = (stock - old.quantily) WHERE tbl_utensils.id = old.utensils_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utensils_loan`
--

CREATE TABLE `tbl_utensils_loan` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_loan` int(11) NOT NULL,
  `date_loan` datetime NOT NULL,
  `date_return` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 la mượn; 1 là trả hết, 2 là trả một phần, 3 là đặt lịch trước',
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_utensils_loan`
--

INSERT INTO `tbl_utensils_loan` (`id`, `code`, `user_id`, `user_loan`, `date_loan`, `date_return`, `content`, `notes`, `status`, `create_at`) VALUES
(4, 1666773709, 58, 58, '2022-10-26 00:00:00', '2022-10-26 00:00:00', 'Phục vụ công tác giảng dạy \r\n                                môn Vật  lý: Khúc xạ ánh sáng', '', 0, '2022-10-26 15:41:49');

--
-- Triggers `tbl_utensils_loan`
--
DELIMITER $$
CREATE TRIGGER `del_utensils_loan_detail_after_del_utensils_loan` AFTER DELETE ON `tbl_utensils_loan` FOR EACH ROW DELETE FROM tbl_utensils_loan_detail WHERE tbl_utensils_loan_detail.code = old.code
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utensils_loan_detail`
--

CREATE TABLE `tbl_utensils_loan_detail` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `utensils_id` int(11) NOT NULL,
  `sub_utensils` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_return` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_utensils_loan_detail`
--

INSERT INTO `tbl_utensils_loan_detail` (`id`, `code`, `utensils_id`, `sub_utensils`, `status`, `date_return`) VALUES
(4, 1666773709, 16, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utensils_return`
--

CREATE TABLE `tbl_utensils_return` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `utensils_id` int(11) NOT NULL,
  `sub_utensils` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 la thu hoi; 2 la khoi phuc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_works`
--

CREATE TABLE `tbl_works` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `works_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `file_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_works`
--

INSERT INTO `tbl_works` (`id`, `code`, `works_id`, `title`, `content`, `file`, `file_link`, `user_id`, `create_at`, `status`) VALUES
(6, 1667583461, '1,2', 'Kế hoạch thực hiện nhiệm vụ năm học 2022-2023', 'Kế hoạch thực hiện nhiệm vụ năm học 2022-2023', '', '3_2', 1, '2022-11-05 00:38:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_works_role`
--

CREATE TABLE `tbl_works_role` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `works` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_works_role`
--

INSERT INTO `tbl_works_role` (`id`, `code`, `user_id`, `works`, `status`, `create_at`) VALUES
(1, 1664698412, 3, '2,3,4', 1, '2022-10-03 09:37:38');

-- --------------------------------------------------------

--
-- Structure for view `document_all`
--
DROP TABLE IF EXISTS `document_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `document_all`  AS SELECT concat(`tbl_document_in`.`id`,'_1') AS `id`, `tbl_document_in`.`title` AS `title`, 'Văn bản đến' AS `type`, (select `tbldm_document`.`title` from `tbldm_document` where `tbldm_document`.`id` = `tbl_document_in`.`cate_id`) AS `category` FROM `tbl_document_in` WHERE `tbl_document_in`.`status` = 0 union all select concat(`tbl_document_out`.`id`,'_2') AS `id`,`tbl_document_out`.`title` AS `title`,'Văn bản đi' AS `type`,(select `tbldm_document`.`title` from `tbldm_document` where `tbldm_document`.`id` = `tbl_document_out`.`cate_id`) AS `category` from `tbl_document_out` where `tbl_document_out`.`status` = 0  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldm_book`
--
ALTER TABLE `tbldm_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_book_manu`
--
ALTER TABLE `tbldm_book_manu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_department`
--
ALTER TABLE `tbldm_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_document`
--
ALTER TABLE `tbldm_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_equipment`
--
ALTER TABLE `tbldm_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_job`
--
ALTER TABLE `tbldm_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_level`
--
ALTER TABLE `tbldm_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_people`
--
ALTER TABLE `tbldm_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_physical_room`
--
ALTER TABLE `tbldm_physical_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_quanlity`
--
ALTER TABLE `tbldm_quanlity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_quanlity_criteria`
--
ALTER TABLE `tbldm_quanlity_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_quanlity_standard`
--
ALTER TABLE `tbldm_quanlity_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_realtion`
--
ALTER TABLE `tbldm_realtion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_subject`
--
ALTER TABLE `tbldm_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_utensils`
--
ALTER TABLE `tbldm_utensils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_works`
--
ALTER TABLE `tbldm_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_works_group`
--
ALTER TABLE `tbldm_works_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldm_years`
--
ALTER TABLE `tbldm_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assign_detail`
--
ALTER TABLE `tbl_assign_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_loan`
--
ALTER TABLE `tbl_book_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_read`
--
ALTER TABLE `tbl_book_read`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_return`
--
ALTER TABLE `tbl_book_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_change_class`
--
ALTER TABLE `tbl_change_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_change_device`
--
ALTER TABLE `tbl_change_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_change_point`
--
ALTER TABLE `tbl_change_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department_loan`
--
ALTER TABLE `tbl_department_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_devices`
--
ALTER TABLE `tbl_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_device_import`
--
ALTER TABLE `tbl_device_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_device_import_detail`
--
ALTER TABLE `tbl_device_import_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_device_repair`
--
ALTER TABLE `tbl_device_repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_device_repair_detail`
--
ALTER TABLE `tbl_device_repair_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_document_in`
--
ALTER TABLE `tbl_document_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_document_out`
--
ALTER TABLE `tbl_document_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_export`
--
ALTER TABLE `tbl_export`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_export_detail`
--
ALTER TABLE `tbl_export_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_role`
--
ALTER TABLE `tbl_group_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loans_detail`
--
ALTER TABLE `tbl_loans_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_personel`
--
ALTER TABLE `tbl_personel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_proof`
--
ALTER TABLE `tbl_proof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quanlity_role`
--
ALTER TABLE `tbl_quanlity_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_returns_device`
--
ALTER TABLE `tbl_returns_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_point`
--
ALTER TABLE `tbl_student_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_relation`
--
ALTER TABLE `tbl_student_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task_comment`
--
ALTER TABLE `tbl_task_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task_group`
--
ALTER TABLE `tbl_task_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_up_class`
--
ALTER TABLE `tbl_up_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_utensils`
--
ALTER TABLE `tbl_utensils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_utensils_imp`
--
ALTER TABLE `tbl_utensils_imp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_utensils_imp_detail`
--
ALTER TABLE `tbl_utensils_imp_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_utensils_loan`
--
ALTER TABLE `tbl_utensils_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_utensils_loan_detail`
--
ALTER TABLE `tbl_utensils_loan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_utensils_return`
--
ALTER TABLE `tbl_utensils_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_works`
--
ALTER TABLE `tbl_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_works_role`
--
ALTER TABLE `tbl_works_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldm_book`
--
ALTER TABLE `tbldm_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbldm_book_manu`
--
ALTER TABLE `tbldm_book_manu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldm_department`
--
ALTER TABLE `tbldm_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbldm_document`
--
ALTER TABLE `tbldm_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbldm_equipment`
--
ALTER TABLE `tbldm_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldm_job`
--
ALTER TABLE `tbldm_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbldm_level`
--
ALTER TABLE `tbldm_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbldm_people`
--
ALTER TABLE `tbldm_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbldm_physical_room`
--
ALTER TABLE `tbldm_physical_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbldm_quanlity`
--
ALTER TABLE `tbldm_quanlity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbldm_quanlity_criteria`
--
ALTER TABLE `tbldm_quanlity_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldm_quanlity_standard`
--
ALTER TABLE `tbldm_quanlity_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldm_realtion`
--
ALTER TABLE `tbldm_realtion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbldm_subject`
--
ALTER TABLE `tbldm_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbldm_utensils`
--
ALTER TABLE `tbldm_utensils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldm_works`
--
ALTER TABLE `tbldm_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldm_works_group`
--
ALTER TABLE `tbldm_works_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldm_years`
--
ALTER TABLE `tbldm_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_assign_detail`
--
ALTER TABLE `tbl_assign_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_book_loan`
--
ALTER TABLE `tbl_book_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_book_read`
--
ALTER TABLE `tbl_book_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_book_return`
--
ALTER TABLE `tbl_book_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_change_class`
--
ALTER TABLE `tbl_change_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_change_device`
--
ALTER TABLE `tbl_change_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_change_point`
--
ALTER TABLE `tbl_change_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_department_loan`
--
ALTER TABLE `tbl_department_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_devices`
--
ALTER TABLE `tbl_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_device_import`
--
ALTER TABLE `tbl_device_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_device_import_detail`
--
ALTER TABLE `tbl_device_import_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_device_repair`
--
ALTER TABLE `tbl_device_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_device_repair_detail`
--
ALTER TABLE `tbl_device_repair_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_document_in`
--
ALTER TABLE `tbl_document_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_document_out`
--
ALTER TABLE `tbl_document_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_export`
--
ALTER TABLE `tbl_export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_export_detail`
--
ALTER TABLE `tbl_export_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_group_role`
--
ALTER TABLE `tbl_group_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_loans_detail`
--
ALTER TABLE `tbl_loans_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_personel`
--
ALTER TABLE `tbl_personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tbl_proof`
--
ALTER TABLE `tbl_proof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_quanlity_role`
--
ALTER TABLE `tbl_quanlity_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_returns_device`
--
ALTER TABLE `tbl_returns_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1388;

--
-- AUTO_INCREMENT for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1173;

--
-- AUTO_INCREMENT for table `tbl_student_point`
--
ALTER TABLE `tbl_student_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student_relation`
--
ALTER TABLE `tbl_student_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_task_comment`
--
ALTER TABLE `tbl_task_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_task_group`
--
ALTER TABLE `tbl_task_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_up_class`
--
ALTER TABLE `tbl_up_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_utensils`
--
ALTER TABLE `tbl_utensils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_utensils_imp`
--
ALTER TABLE `tbl_utensils_imp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_utensils_imp_detail`
--
ALTER TABLE `tbl_utensils_imp_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_utensils_loan`
--
ALTER TABLE `tbl_utensils_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_utensils_loan_detail`
--
ALTER TABLE `tbl_utensils_loan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_utensils_return`
--
ALTER TABLE `tbl_utensils_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_works`
--
ALTER TABLE `tbl_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_works_role`
--
ALTER TABLE `tbl_works_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
