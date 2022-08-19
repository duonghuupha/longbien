-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 06:15 PM
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
(6, 'Sách, báo', 1, 0, '2022-07-24 22:25:18');

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
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_department`
--

INSERT INTO `tbldm_department` (`id`, `year_id`, `physical_id`, `title`, `class_study`, `is_default`, `user_id`, `create_at`, `status`) VALUES
(1, 2, 1, 'Lớp 6A1', 1, 1, 1, '2022-07-14 00:42:41', 0),
(2, 2, 2, 'Lớp 6A2', 1, 1, 1, '2022-07-14 00:43:04', 0),
(3, 2, 3, 'Lớp 6A3', 1, 1, 1, '2022-07-14 00:43:19', 0),
(4, 2, 4, 'Lớp 6A4', 1, 1, 1, '2022-07-14 00:43:47', 0),
(5, 2, 5, 'Lớp 6A5', 1, 1, 1, '2022-07-14 00:44:28', 0),
(6, 2, 6, 'Phòng Hiệu trưởng', 0, 0, 1, '2022-07-14 00:44:55', 0),
(7, 4, 1, 'Lớp 6A1', 1, 1, 1, '2022-08-18 00:29:24', 1),
(8, 4, 2, 'Lớp 6A2', 1, 1, 1, '2022-08-18 00:29:24', 1),
(9, 4, 3, 'Lớp 6A3', 1, 1, 1, '2022-08-18 00:29:25', 1),
(10, 4, 4, 'Lớp 6A4', 1, 1, 1, '2022-08-18 00:29:25', 1),
(11, 4, 5, 'Lớp 6A5', 1, 1, 1, '2022-08-18 00:29:25', 1),
(12, 4, 1, 'Lớp 6A1', 1, 1, 1, '2022-08-18 00:32:05', 0),
(13, 4, 2, 'Lớp 6A2', 1, 1, 1, '2022-08-18 00:32:05', 0),
(14, 4, 3, 'Lớp 6A3', 1, 1, 1, '2022-08-18 00:32:05', 0),
(15, 4, 4, 'Lớp 6A4', 1, 1, 1, '2022-08-18 00:32:06', 0),
(16, 4, 5, 'Lớp 6A5', 1, 1, 1, '2022-08-18 00:32:06', 0),
(17, 4, 6, 'Lớp 7A1', 1, 1, 1, '2022-08-18 00:33:17', 0);

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
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_job`
--

INSERT INTO `tbldm_job` (`id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 'Giáo viên', 1, '2022-07-11 15:35:31', 0),
(2, 'Phó hiệu trưởng', 1, '2022-07-11 15:35:51', 0),
(3, 'Hiệu trưởng', 1, '2022-07-11 15:35:59', 0),
(4, 'Bảo vệ', 1, '2022-07-11 15:36:06', 0),
(5, 'Hành chính nhân sự', 1, '2022-07-11 15:36:15', 0),
(6, 'Kế toán', 1, '2022-07-11 15:36:20', 0),
(7, 'Thủ quỹ', 1, '2022-07-11 15:36:24', 0),
(8, 'Văn thư', 1, '2022-07-11 15:36:29', 0),
(9, 'Nhân viên', 1, '2022-07-11 15:36:36', 0),
(10, 'Nhân viên CNTT', 1, '2022-07-11 15:36:42', 0),
(11, 'Tạp vụ', 1, '2022-07-11 15:38:36', 0);

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
(20, 'Phòng A208', 1, 2, 1, '2022-07-13 23:30:54', 0);

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldm_subject`
--

INSERT INTO `tbldm_subject` (`id`, `title`, `user_id`, `create_at`, `status`) VALUES
(1, 'Toán', 1, '2022-07-11 23:01:41', 0),
(2, 'Tin học', 1, '2022-07-11 23:02:27', 0),
(3, 'Ngữ văn', 1, '2022-07-11 23:02:34', 0),
(4, 'Lịch sử', 1, '2022-07-11 23:02:41', 0),
(5, 'Sinh học', 1, '2022-07-11 23:02:48', 0),
(6, 'Hóa học', 1, '2022-07-11 23:02:53', 0),
(7, 'Địa lý', 1, '2022-07-11 23:03:01', 0),
(8, 'Vật  lý', 1, '2022-07-11 23:03:08', 0),
(9, 'Giáo dục thể chất', 1, '2022-07-11 23:03:24', 0),
(10, 'Kế toán - Tài chính', 1, '2022-07-11 23:03:36', 0),
(11, 'Quản lý giáo dục', 1, '2022-07-11 23:03:47', 0),
(12, 'Bảo vệ', 1, '2022-07-11 23:03:52', 0),
(13, 'Công nghệ thông tin', 1, '2022-07-11 23:04:02', 0);

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
(1, 'Năm học 2000 - 2001', 0, 1, '2022-07-11 18:28:39', 0),
(2, 'Năm học 2022-2023', 1, 1, '2022-07-12 17:05:30', 0),
(3, 'Năm học 2023-2022', 0, 1, '2022-07-12 17:06:35', 0),
(4, 'Năm học 2023-2024', 0, 1, '2022-07-12 21:34:25', 1);

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
(2, 51823420, 3, 1, 'Sách giáo khoa học sinh toán 6 tập 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 115, 'Nhóm  tác giả chân trời sáng tạo', '1658857260_img_library.png', 1, '1658857260_file_library.pdf', 0, 1, '2022-07-27 00:41:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_loan`
--

CREATE TABLE `tbl_book_loan` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
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

INSERT INTO `tbl_book_loan` (`id`, `code`, `user_id`, `student_id`, `book_id`, `sub_book`, `date_loan`, `date_return`, `status`, `create_at`) VALUES
(1, 1659689584, 3, 0, 1, 1, '2022-08-05 15:53:04', '2022-08-05 22:35:47', 1, '2022-08-05 15:53:04'),
(4, 1659690783, 0, 1, 1, 2, '2022-08-05 16:13:03', '2022-08-05 22:41:06', 1, '2022-08-05 16:13:03'),
(5, 1659973534, 3, 0, 1, 1, '2022-08-08 22:45:34', '2022-08-09 22:32:57', 1, '2022-08-08 22:45:34'),
(6, 1659977770, 4, 0, 1, 3, '2022-08-08 23:56:10', '2022-08-08 23:57:49', 1, '2022-08-08 23:56:10');

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
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

--
-- Dumping data for table `tbl_change_device`
--

INSERT INTO `tbl_change_device` (`id`, `code`, `year_id`, `physical_from_id`, `physical_to_id`, `device_id`, `sub_device`, `create_at`) VALUES
(6, 1657388764, 3, 1, 3, 34, 1, '2022-07-10 00:46:04');

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_devices`
--

INSERT INTO `tbl_devices` (`id`, `code`, `title`, `cate_id`, `origin`, `price`, `depreciation`, `year_work`, `image`, `description`, `stock`, `status`) VALUES
(26, 12345678, 'Máy tính giáo viên Core I5', 0, 'Việt Nam', 14020000, 20, 2022, '', '', 10, 1),
(27, 12345679, 'Máy tính học sinh Core I3', 1, 'Việt Nam', 14020000, 20, 2023, '', '', 10, 1),
(28, 12345680, 'Bảng tương tác thông minh', 0, 'Việt Nam', 14020000, 20, 2024, '', '', 10, 1),
(29, 12345681, 'Samsung smart tivi 5 inch', 0, 'Việt Nam', 14020000, 20, 2025, '', '', 10, 1),
(30, 12345682, 'Máy chiếu siêu gần Hitachi', 0, 'Việt Nam', 14020000, 20, 2026, '', '', 10, 1),
(31, 12345683, 'Máy chiếu đa năng kỹ thuật số Panasonic', 0, 'Việt Nam', 14020000, 20, 2027, '', '', 10, 1),
(32, 12345684, 'Máu tin Canon LBP151DW', 0, 'Việt Nam', 14020000, 20, 2028, '', '', 10, 1),
(33, 12345685, 'Loa Microlap M108', 3, 'Việt Nam', 14020000, 20, 2029, '', '', 10, 1),
(34, 12345686, 'Thiết bị trợ giảng, mic gài', 0, 'Việt Nam', 14020000, 20, 2030, '', '', 10, 1);

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
(1, 1658402593, 7, 1, '2022-07-21', '01/KH-PGD', '2022-07-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, '', '2022-07-21 18:23:13', '1658402593_document_in.xlsx', 0),
(2, 1658404340, 7, 2, '2022-07-21', '02/KH-PGD', '2022-07-04', ' The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 1, '4,3', '2022-07-21 23:01:11', '1658404340_document_in.html', 0),
(3, 1658673151, 7, 3, '2022-07-24', '03/KH-PGD', '2022-07-05', '1914 translation by H. Rackham', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire', 1, '3', '2022-07-24 21:32:31', '1658673151_document_in.html', 0);

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
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_document_out`
--

INSERT INTO `tbl_document_out` (`id`, `code`, `cate_id`, `number_dc`, `date_dc`, `title`, `content`, `file`, `location_to`, `user_id`, `user_share`, `status`, `create_at`) VALUES
(1, 1658653214, 7, '01/KH-THCSLB', '2022-07-05', 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1658652330_document_out.docx', '', 1, '4,3', 0, '2022-07-24 16:00:14'),
(2, 1658673421, 3, '01/QĐ-THCSLLB', '2022-07-24', 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\"', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium', '1658673421_document_out.html', '', 1, '3', 0, '2022-07-24 21:37:01');

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
(9, 1657388721, 3, 1, '2022-07-10 00:45:21'),
(10, 1657388764, 3, 3, '2022-07-10 00:46:04');

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
(19, 1657388721, 26, 1, 0, '2022-07-10 00:45:21'),
(20, 1657388721, 29, 1, 2, '2022-07-10 00:45:21'),
(21, 1657388721, 31, 1, 0, '2022-07-10 00:45:21'),
(22, 1657388721, 34, 1, 1, '2022-07-10 00:45:21'),
(23, 1657388764, 34, 1, 0, '2022-07-10 00:46:04');

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
-- Dumping data for table `tbl_loans`
--

INSERT INTO `tbl_loans` (`id`, `code`, `user_id`, `user_loan`, `date_loan`, `date_return`, `content`, `notes`, `status`, `create_at`) VALUES
(1, 1656351812, 1, 3, '2022-06-28 00:00:00', '2022-06-28 23:50:28', 'Phục vụ công tác giảng dạy', '', 1, '2022-06-28 00:43:32'),
(5, 1656435154, 1, 3, '2022-06-28 00:00:00', '2022-06-29 22:18:41', 'Phục vụ công tác giảng dạy', '', 1, '2022-06-28 23:52:34'),
(6, 1656435374, 1, 3, '2022-06-28 00:00:00', '2022-06-29 22:18:35', 'Phục vụ công tác giảng dạy', '', 1, '2022-06-28 23:56:14'),
(7, 1656435926, 3, 3, '2022-06-29 00:05:26', '2022-06-29 00:05:51', 'Phục vụ hội nghị', '', 1, '2022-06-29 00:05:26'),
(8, 1656515905, 1, 4, '2022-06-29 22:18:25', '2022-06-29 22:30:24', 'Phục vục công tác giảng dạy', '', 1, '2022-06-29 22:18:25'),
(9, 1656517357, 1, 4, '2022-06-29 22:42:37', '2022-06-29 23:12:46', 'Phục vụ công tác giảng dạy', '', 1, '2022-06-29 22:42:37'),
(10, 1656526338, 1, 4, '2022-06-30 01:12:18', '2022-06-30 01:12:35', 'Phục vụ công tác giảng dạy', '', 1, '2022-06-30 01:12:18'),
(11, 1656598271, 1, 4, '2022-06-30 21:11:11', '2022-06-30 21:11:20', 'Phục vụ công tác giảng dạy', '', 1, '2022-06-30 21:11:11');

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

--
-- Dumping data for table `tbl_loans_detail`
--

INSERT INTO `tbl_loans_detail` (`id`, `code`, `device_id`, `sub_device`, `status`, `date_return`) VALUES
(1, 1656351812, 33, 2, 1, '2022-06-28 23:36:21'),
(2, 1656351812, 34, 1, 1, '2022-06-28 23:50:28'),
(4, 1656435154, 34, 1, 1, '2022-06-29 22:18:41'),
(5, 1656435374, 33, 2, 1, '2022-06-29 22:18:35'),
(6, 1656435926, 31, 2, 1, '2022-06-29 00:05:51'),
(7, 1656515905, 34, 2, 1, '2022-06-29 22:30:24'),
(8, 1656515905, 34, 1, 1, '2022-06-29 22:30:24'),
(9, 1656517357, 34, 1, 1, '2022-06-29 23:12:46'),
(10, 1656526338, 34, 2, 1, '2022-06-30 01:12:35'),
(11, 1656526338, 34, 1, 1, '2022-06-30 01:12:34'),
(12, 1656598271, 34, 1, 1, '2022-06-30 21:11:16'),
(13, 1656598271, 34, 2, 1, '2022-06-30 21:11:20');

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
(8, 1, 3, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=7', '2022-07-17 00:09:50'),
(9, 3, 1, 1, 'Trao đổi / ý kiến công việc', 'http://localhost:81/longbien/tasks/detail?id=7', '2022-07-17 00:34:23'),
(10, 1, 3, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=8', '2022-07-18 00:21:13'),
(11, 1, 3, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=9', '2022-07-18 00:21:38'),
(12, 1, 3, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=10', '2022-07-18 00:21:54'),
(13, 1, 3, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=11', '2022-07-18 07:06:37'),
(14, 1, 3, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=12', '2022-07-18 07:11:06'),
(15, 1, 4, 1, 'Bạn có công việc mới', 'http://localhost:81/longbien/tasks/detail?id=13', '2022-07-18 16:20:28'),
(16, 1, 3, 1, 'Bạn có văn bản mới', 'http://localhost:81/longbien/document_in', '2022-07-24 21:32:31'),
(17, 1, 3, 1, 'Bạn có văn bản mới: Section 1.10.33 of \"de Finibus Bonorum et Malorum\"', 'http://localhost:81/longbien/document_out', '2022-07-24 21:37:01');

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
(102, 1234567890, 'Nguyễn Văn A', 1, '1991-01-19', 0, 0, '', '0987654321', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(103, 2147483647, 'Lê Thị B', 2, '1992-01-19', 0, 0, '', '0987654322', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(104, 1234567892, 'Trần Văn C', 1, '1993-01-19', 0, 0, '', '0987654323', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(105, 1234567893, 'Đào Thị Quỳnh D', 2, '1994-01-19', 0, 0, '', '0987654324', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(106, 1234567894, 'Hoàng Văn E', 1, '1995-01-19', 0, 0, '', '0987654325', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(107, 1234567895, 'Nguyễn Văn A', 1, '1996-01-19', 0, 0, '', '0987654326', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(108, 1234567896, 'Lê Thị B', 2, '1997-01-19', 0, 0, '', '0987654327', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(109, 1234567897, 'Trần Văn C', 1, '1998-01-19', 0, 0, '', '0987654328', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(110, 1234567898, 'Đào Thị Quỳnh D', 2, '1999-01-19', 0, 0, '', '0987654329', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(111, 1234567899, 'Hoàng Văn E', 1, '2000-01-19', 0, 0, '', '0987654330', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(112, 1234567900, 'Nguyễn Văn A', 1, '2001-01-19', 0, 0, '', '0987654331', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(113, 1234567901, 'Lê Thị B', 2, '2002-01-19', 0, 0, '', '0987654332', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(114, 1234567902, 'Trần Văn C', 1, '2003-01-19', 0, 0, '', '0987654333', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(115, 1234567903, 'Đào Thị Quỳnh D', 2, '2004-01-19', 0, 0, '', '0987654334', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(116, 1234567904, 'Hoàng Văn E', 1, '2005-01-19', 0, 0, '', '0987654335', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(117, 1234567905, 'Nguyễn Văn A', 1, '2006-01-19', 0, 0, '', '0987654336', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(118, 1234567906, 'Lê Thị B', 2, '2007-01-19', 0, 0, '', '0987654337', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(119, 1234567907, 'Trần Văn C', 1, '2008-01-19', 0, 0, '', '0987654338', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(120, 1234567908, 'Đào Thị Quỳnh D', 2, '2009-01-19', 0, 0, '', '0987654339', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(121, 1234567909, 'Hoàng Văn E', 1, '2010-01-19', 0, 0, '', '0987654340', 'Số 234, Đội Cấn, Ba Đình Hà Nội', '', '', 1, 'webmasterzero19@gmail.com'),
(122, 1234567910, 'Nguyễn Phương Anh', 1, '2011-01-19', 4, 1, '4', '0987654341', 'Số 234, Đội Cấn, Ba Đình Hà Nội', 'index.jpg', '', 1, 'webmasterzero19@gmail.com');

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
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_returns_device`
--

INSERT INTO `tbl_returns_device` (`id`, `code`, `create_at`, `year_id`, `physical_id`, `device_id`, `sub_device`, `status`, `user_id`) VALUES
(3, 1657388813, '2022-07-10 00:46:53', 3, 1, 29, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `code` bigint(20) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `people_id` int(11) NOT NULL,
  `religion` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `dep_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `code`, `fullname`, `gender`, `birthday`, `people_id`, `religion`, `address`, `image`, `status`, `dep_temp`) VALUES
(104, 123456789101, 'Nguyễn Văn A', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(105, 123456789102, 'Lê Thị B', 2, '2010-05-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(106, 123456789103, 'Đào Văn C', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(107, 123456789104, 'Hoàng Kiều D', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(108, 123456789105, 'Nguyễn Văn A', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(109, 123456789106, 'Lê Thị B', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(110, 123456789107, 'Đào Văn C', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(111, 123456789108, 'Hoàng Kiều D', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(112, 123456789109, 'Nguyễn Văn A', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(113, 123456789110, 'Lê Thị B', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(114, 123456789111, 'Đào Văn C', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(115, 123456789112, 'Hoàng Kiều D', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(116, 123456789113, 'Nguyễn Văn A', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(117, 123456789114, 'Lê Thị B', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(118, 123456789115, 'Đào Văn C', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(119, 123456789116, 'Hoàng Kiều D', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(120, 123456789117, 'Nguyễn Văn A', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(121, 123456789118, 'Lê Thị B', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(122, 123456789119, 'Đào Văn C', 1, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0),
(123, 123456789120, 'Hoàng Kiều D', 2, '2010-04-12', 2, 1, 'Đào Xuyên - Đa Tốn - Gia Lâm - Hà Nội', '', 1, 0);

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
(12, 104, 2, 1, '2022-08-17 00:46:14'),
(13, 105, 2, 1, '2022-08-17 00:46:14'),
(14, 106, 2, 1, '2022-08-17 00:46:14'),
(15, 107, 2, 1, '2022-08-17 00:46:14'),
(16, 108, 2, 1, '2022-08-17 00:46:14'),
(17, 109, 2, 1, '2022-08-17 00:46:15'),
(18, 110, 2, 1, '2022-08-17 00:46:15'),
(19, 111, 2, 1, '2022-08-17 00:46:15'),
(20, 112, 2, 1, '2022-08-17 00:46:15'),
(21, 113, 2, 1, '2022-08-17 00:46:15'),
(22, 114, 2, 1, '2022-08-17 00:46:15'),
(23, 115, 2, 1, '2022-08-17 00:46:15'),
(24, 116, 2, 1, '2022-08-17 00:46:15'),
(25, 117, 2, 1, '2022-08-17 00:46:15'),
(26, 118, 2, 1, '2022-08-17 00:46:15'),
(27, 119, 2, 1, '2022-08-17 00:46:15'),
(28, 120, 2, 1, '2022-08-17 00:46:15'),
(29, 121, 2, 1, '2022-08-17 00:46:16'),
(30, 122, 2, 1, '2022-08-17 00:46:16'),
(31, 123, 2, 1, '2022-08-17 00:46:16'),
(32, 104, 4, 17, '2022-08-18 16:39:51'),
(33, 105, 4, 17, '2022-08-18 16:39:51'),
(34, 106, 4, 17, '2022-08-18 16:39:51'),
(35, 107, 4, 17, '2022-08-18 16:39:51'),
(36, 108, 4, 17, '2022-08-18 16:39:51'),
(37, 109, 4, 17, '2022-08-18 16:39:51'),
(38, 110, 4, 17, '2022-08-18 16:39:51'),
(39, 111, 4, 17, '2022-08-18 16:39:51'),
(40, 112, 4, 17, '2022-08-18 16:39:51'),
(41, 113, 4, 17, '2022-08-18 16:39:51'),
(42, 114, 4, 17, '2022-08-18 16:39:51'),
(43, 115, 4, 17, '2022-08-18 16:39:51'),
(44, 116, 4, 17, '2022-08-18 16:39:51'),
(45, 117, 4, 17, '2022-08-18 16:39:51'),
(46, 118, 4, 17, '2022-08-18 16:39:51'),
(47, 119, 4, 17, '2022-08-18 16:39:51'),
(48, 120, 4, 17, '2022-08-18 16:39:51'),
(49, 121, 4, 17, '2022-08-18 16:39:51'),
(50, 122, 4, 17, '2022-08-18 16:39:51'),
(51, 123, 4, 17, '2022-08-18 16:39:51');

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
(207, 123456789101, 'Bố', 'Đào Văn C', 1988, '0987654315', 'Tự do'),
(208, 123456789101, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654321', 'Tự do'),
(209, 123456789102, 'Bố', 'Đào Văn C', 1988, '0987654316', 'Tự do'),
(210, 123456789102, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654322', 'Tự do'),
(213, 123456789104, 'Bố', 'Đào Văn C', 1988, '0987654318', 'Tự do'),
(214, 123456789104, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654324', 'Tự do'),
(215, 123456789105, 'Bố', 'Đào Văn C', 1988, '0987654319', 'Tự do'),
(216, 123456789105, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654325', 'Tự do'),
(217, 123456789106, 'Bố', 'Đào Văn C', 1988, '0987654320', 'Tự do'),
(218, 123456789106, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654326', 'Tự do'),
(219, 123456789107, 'Bố', 'Đào Văn C', 1988, '0987654321', 'Tự do'),
(220, 123456789107, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654327', 'Tự do'),
(221, 123456789108, 'Bố', 'Đào Văn C', 1988, '0987654322', 'Tự do'),
(222, 123456789108, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654328', 'Tự do'),
(223, 123456789109, 'Bố', 'Đào Văn C', 1988, '0987654323', 'Tự do'),
(224, 123456789109, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654329', 'Tự do'),
(225, 123456789110, 'Bố', 'Đào Văn C', 1988, '0987654324', 'Tự do'),
(226, 123456789110, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654330', 'Tự do'),
(227, 123456789111, 'Bố', 'Đào Văn C', 1988, '0987654325', 'Tự do'),
(228, 123456789111, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654331', 'Tự do'),
(229, 123456789112, 'Bố', 'Đào Văn C', 1988, '0987654326', 'Tự do'),
(230, 123456789112, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654332', 'Tự do'),
(231, 123456789113, 'Bố', 'Đào Văn C', 1988, '0987654327', 'Tự do'),
(232, 123456789113, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654333', 'Tự do'),
(233, 123456789114, 'Bố', 'Đào Văn C', 1988, '0987654328', 'Tự do'),
(234, 123456789114, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654334', 'Tự do'),
(235, 123456789115, 'Bố', 'Đào Văn C', 1988, '0987654329', 'Tự do'),
(236, 123456789115, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654335', 'Tự do'),
(237, 123456789116, 'Bố', 'Đào Văn C', 1988, '0987654330', 'Tự do'),
(238, 123456789116, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654336', 'Tự do'),
(239, 123456789117, 'Bố', 'Đào Văn C', 1988, '0987654331', 'Tự do'),
(240, 123456789117, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654337', 'Tự do'),
(241, 123456789118, 'Bố', 'Đào Văn C', 1988, '0987654332', 'Tự do'),
(242, 123456789118, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654338', 'Tự do'),
(243, 123456789119, 'Bố', 'Đào Văn C', 1988, '0987654333', 'Tự do'),
(244, 123456789119, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654339', 'Tự do'),
(245, 123456789120, 'Bố', 'Đào Văn C', 1988, '0987654334', 'Tự do'),
(246, 123456789120, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654340', 'Tự do'),
(249, 123456789103, 'Bố', 'Đào Văn C', 1988, '0987654317', 'Tự do'),
(250, 123456789103, 'Mẹ', 'Nguyễn Thị C', 1988, '0987654323', 'Tự do');

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
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`id`, `code`, `group_id`, `title`, `content`, `date_work`, `time_work`, `user_id`, `user_main`, `user_share`, `file`, `status`, `create_at`) VALUES
(1, 1657910229, 1, 'Đoạn Lorem Ipsum chuẩn, được sử dụng từ những năm 1500', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2022-07-16', 1, 1, 1, '4,3', '1657910229_tasks.zip', 3, '2022-07-16 12:35:49'),
(6, 1657984619, 1, '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.', '2022-07-16', 1, 1, 3, '', '', 3, '2022-07-16 23:32:27'),
(7, 1657991390, 1, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2022-07-17', 1, 1, 3, '', '', 3, '2022-07-17 00:34:23'),
(8, 1658078473, 1, 'The standard Lorem Ipsum passage, used since the 1500s', '', '2022-07-18', 1, 1, 3, '', '', 2, '2022-07-18 00:21:13'),
(9, 1658078498, 1, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '', '2022-07-18', 1, 1, 3, '', '', 2, '2022-07-18 00:21:38'),
(10, 1658078514, 1, '1914 translation by H. Rackham', '', '2022-07-18', 1, 1, 3, '', '', 2, '2022-07-18 00:21:54'),
(11, 1658102797, 1, 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '', '2022-07-18', 2, 1, 3, '', '', 2, '2022-07-18 07:06:37'),
(12, 1658103065, 1, '1914 translation by H. Rackham', '', '2022-07-19', 1, 1, 3, '', '', 2, '2022-07-18 07:11:05'),
(13, 1658136028, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '', '2022-07-18', 1, 1, 4, '', '', 2, '2022-07-18 16:20:28');

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

--
-- Dumping data for table `tbl_task_comment`
--

INSERT INTO `tbl_task_comment` (`id`, `task_id`, `user_id`, `content`, `file`, `create_at`) VALUES
(1, 1, 1, 'Tiếp nhận công việc', '', '2022-07-16 01:42:52'),
(2, 1, 1, ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', '2022-07-16 12:16:22'),
(3, 1, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', '', '2022-07-16 12:17:28'),
(4, 1, 1, 'xcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '1657948857_comment_task.zip', '2022-07-16 12:20:57'),
(5, 0, 1, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '', '2022-07-16 12:35:08'),
(6, 1, 1, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '', '2022-07-16 12:35:49'),
(7, 6, 3, 'Tiếp nhận công việc', '', '2022-07-16 23:07:14'),
(9, 6, 3, 'No one rejects, dislikes, or avoids pleasure itself', '', '2022-07-16 23:23:01'),
(10, 6, 1, 'Cần điều chỉnh lại các nội dung trong báo cáo được đánh dấu trong file đính kèm', '', '2022-07-16 23:27:11'),
(11, 6, 3, 'Đã cập nhật điều chỉnh nội dung báo báo theo yêu cầu', '', '2022-07-16 23:28:00'),
(12, 6, 1, 'Đã đọc báo báo. Duyệt nội dung báo báo', '', '2022-07-16 23:29:13'),
(14, 6, 3, 'Đã hoàn thành công việc', '', '2022-07-16 23:31:19'),
(15, 6, 3, 'Đã hoàn thành công việc', '', '2022-07-16 23:32:27'),
(16, 7, 3, 'Tiếp nhận công việc', '', '2022-07-17 00:33:49'),
(17, 7, 3, 'Đã  hoàn thành công việc', '', '2022-07-17 00:34:23'),
(18, 8, 3, 'Tiếp nhận công việc', '', '2022-07-18 00:22:12'),
(19, 9, 3, 'Tiếp nhận công việc', '', '2022-07-18 00:22:16'),
(20, 10, 3, 'Tiếp nhận công việc', '', '2022-07-18 00:22:19'),
(21, 11, 3, 'Tiếp nhận công việc', '', '2022-07-18 07:06:47'),
(22, 12, 3, 'Tiếp nhận công việc', '', '2022-07-18 07:11:10'),
(23, 13, 4, 'Tiếp nhận công việc', '', '2022-07-18 16:20:36');

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
(1, 'Công việc hàng ngày', 1, '2022-07-14 01:24:25', 0),
(2, 'Công việc phát sinh', 1, '2022-07-14 01:21:10', 0),
(3, 'Công tác tuyển sinh', 1, '2022-07-14 01:21:29', 0),
(4, 'Công tác kỷ niệm 20 tháng 11', 1, '2022-07-14 01:21:57', 1);

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

--
-- Dumping data for table `tbl_up_class`
--

INSERT INTO `tbl_up_class` (`id`, `year_from`, `department_from`, `year_to`, `department_to`, `create_at`) VALUES
(1, 2, 1, 4, 17, '2022-08-18 22:36:53');

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
  `avatar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `code`, `username`, `password`, `active`, `last_login`, `token`, `info_login`, `hr_id`, `avatar`) VALUES
(1, 1, 'admin', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 1, '2022-08-17 00:53:23', '54df0f7137ab4e42083b03f34dde4fd03fe8f6ac', '127.0.0.1-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 0, ''),
(3, 1655827342, 'anv', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '2022-07-24 21:22:15', '7ccf03f57ad8ad7ee4d23677d6019989346d8f82', '::1-Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 122, ''),
(4, 1656510163, 'ctv', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 1, '2022-07-18 16:20:17', '84fcb6631bd620f883dfea66af45fa19b5c545e2', '::1-Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 104, '');

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
-- Indexes for table `tbldm_years`
--
ALTER TABLE `tbldm_years`
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
-- Indexes for table `tbl_devices`
--
ALTER TABLE `tbl_devices`
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
-- Indexes for table `tbl_returns_device`
--
ALTER TABLE `tbl_returns_device`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldm_book`
--
ALTER TABLE `tbldm_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldm_book_manu`
--
ALTER TABLE `tbldm_book_manu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldm_department`
--
ALTER TABLE `tbldm_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbldm_realtion`
--
ALTER TABLE `tbldm_realtion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbldm_subject`
--
ALTER TABLE `tbldm_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbldm_utensils`
--
ALTER TABLE `tbldm_utensils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldm_years`
--
ALTER TABLE `tbldm_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_book_loan`
--
ALTER TABLE `tbl_book_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_change_class`
--
ALTER TABLE `tbl_change_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_change_device`
--
ALTER TABLE `tbl_change_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_devices`
--
ALTER TABLE `tbl_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_document_in`
--
ALTER TABLE `tbl_document_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_document_out`
--
ALTER TABLE `tbl_document_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_export`
--
ALTER TABLE `tbl_export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_export_detail`
--
ALTER TABLE `tbl_export_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_loans_detail`
--
ALTER TABLE `tbl_loans_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_personel`
--
ALTER TABLE `tbl_personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `tbl_returns_device`
--
ALTER TABLE `tbl_returns_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_student_relation`
--
ALTER TABLE `tbl_student_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_task_comment`
--
ALTER TABLE `tbl_task_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_task_group`
--
ALTER TABLE `tbl_task_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_up_class`
--
ALTER TABLE `tbl_up_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
