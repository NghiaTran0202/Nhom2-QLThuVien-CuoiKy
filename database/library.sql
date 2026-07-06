-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 04, 2026 lúc 11:05 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `library_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `quantity`, `image`) VALUES
(7, 'Thiết Kế Web', 'Đoàn Hoàng Hào', 'CNTT', 20, 'web.jpg'),
(8, 'Thiết Kế Web', 'Ngô Chí Quyền', 'CNTT', 20, 'web.jpg'),
(9, 'những đứa trẻ tăng động', 'Nguyễn Hải Duy', 'HIPHOP', 3, 'hiphop.jpg'),
(10, 'Nghĩa nè', 'Trần Trọng Nghĩa', 'Khoa học', 3, 'science.jpg'),
(11, 'Nguyễn Hải Duy', 'Nguyễn Hải Duy', 'Đại học', 2, NULL),
(12, 'Trần Trọng Nghĩa', 'Trần Trọng Nghĩa', 'Lớp 1', 3, NULL),
(13, 'Đoàn Hoàng Hảo', 'Đoàn Hoàng Hảo', 'lớp 2', 2, NULL),
(14, 'Đoàn Hoàng Hảo', 'Đoàn Hoàng Hảo', 'Lập Trình web', 1, NULL),
(15, 'sadsad', 'Đoàn Hoàng Hảo', 'Đại học', 0, NULL),
(16, 'nhóm2 ', 'Nguyễn Hải Duy', 'Lập Trình web', 2, NULL),
(17, 'sadas', 'Nguyễn Hải Duy', 'Đại học', 2, '1783147444_java.jpg'),
(18, 'dfgdfg', 'Nguyễn Hải Duy', 'Lập Trình web', 2, '1783147526_hiphop.jpg'),
(19, '123', 'Nguyễn Hải Duy', 'Lập Trình web', 2, '1783147915_hiphop.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `borrows`
--

CREATE TABLE `borrows` (
  `id` int(11) NOT NULL,
  `reader_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `borrows`
--

INSERT INTO `borrows` (`id`, `reader_id`, `book_id`, `borrow_date`, `return_date`, `status`) VALUES
(1, 1, 9, '2026-07-01', '2026-07-10', 'Đã trả'),
(2, 2, 6, '2026-07-02', '2026-07-11', 'Đang mượn'),
(3, NULL, 9, '3244-04-23', '0024-03-31', 'Đang mượn'),
(4, 3, 9, '0000-00-00', '0234-04-23', 'Đã trả'),
(5, 3, 10, '0003-03-21', '0321-02-02', 'Đã trả'),
(6, 3, 10, '0012-03-12', '0123-03-12', 'Đã trả'),
(7, 3, 10, '0032-04-02', '0324-04-02', 'Đã trả'),
(8, 3, 10, '0000-00-00', '0003-02-02', 'Đã trả'),
(9, 3, 10, '0000-00-00', '0312-12-23', 'Đã trả'),
(10, 3, 15, '1232-03-12', '0123-03-12', 'Đang mượn'),
(11, 5, 15, '1414-03-12', '0000-00-00', 'Đang mượn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `readers`
--

CREATE TABLE `readers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `readers`
--

INSERT INTO `readers` (`id`, `fullname`, `email`, `phone`) VALUES
(1, 'Nguyễn Hải Duy', 'duy@gmail.com', '0901234567'),
(2, 'Trần Trọng Nghĩa', 'nghia@gmail.com', '0912345678'),
(4, 'sda', '24210501007@student.bdu.edu.vn', '2434'),
(5, 'sda', 'dfsfsdf@fdsf', '2434');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '123456', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `readers`
--
ALTER TABLE `readers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
