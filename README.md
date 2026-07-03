# HỆ THỐNG QUẢN LÝ THƯ VIỆN

## Giới thiệu

Đây là website Quản lý Thư viện được xây dựng bằng PHP, MySQL và Bootstrap.

Hệ thống hỗ trợ quản lý sách, độc giả và mượn trả sách với giao diện thân thiện, dễ sử dụng.

---

## Công nghệ sử dụng

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- JavaScript

---

## Chức năng

### Người dùng

- Xem trang chủ
- Xem danh mục sách
- Xem chi tiết sách
- Đăng nhập
- Mượn sách
- Xem sách đã mượn
- Liên hệ

### Quản trị viên

- Dashboard
- Quản lý sách
  - Thêm sách
  - Sửa sách
  - Xóa sách
  - Tìm kiếm sách
- Quản lý độc giả
  - Thêm độc giả
  - Sửa độc giả
  - Xóa độc giả
- Quản lý mượn trả
- Báo cáo

---

## Cấu trúc thư mục

NHOM2-QLTHUVIEN-CUOIKY/
├── admin/
│   ├── books/
│   │   ├── add.php
│   │   ├── delete.php
│   │   ├── edit.php
│   │   └── index.php
│   │
│   ├── borrows/
│   │   ├── add.php
│   │   ├── index.php
│   │   └── return.php
│   │
│   ├── readers/
│   │   ├── add.php
│   │   ├── delete.php
│   │   ├── edit.php
│   │   └── index.php
│   │
│   ├── reports/
│   │
│   └── dashboard.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   ├── images/
│   │   ├── Bia.jpg
│   │   ├── book.png
│   │   ├── borrow.png
│   │   └── reader.png
│   │
│   └── js/
│       └── main.js
│
├── config/
│   └── database.php
│
├── database/
│   └── library.sql
│
├── includes/
│   ├── footer.php
│   └── header.php
│
├── user/
│   ├── borrow.php
│   ├── my-books.php
│   └── profile.php
│
├── AI_USAGE.md
├── book-detail.php
├── books.php
├── contact.php
├── index.php
├── login.php
├── logout.php
└── README.md

---

## Hướng dẫn cài đặt

1. Cài đặt XAMPP.
2. Copy project vào thư mục htdocs.
3. Khởi động Apache và MySQL.
4. Import cơ sở dữ liệu library_management.
5. Truy cập:


---

## GitHub

https://github.com/NghiaTran0202/Nhom2-QLThuVien-CuoiKy

---

## Thành viên

- Trần Trọng Nghĩa
- Nguyễn Hải Duy
- Đoàn Hoàng Hảo
- Ngô Chí Quyển