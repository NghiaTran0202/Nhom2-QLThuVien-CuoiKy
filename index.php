<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thư Viện</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">


</head>

<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/images/logo.png" alt="Logo" width="30" height="30" class="me-2 rounded-circle">
            Quản Lý Thư Viện
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        Trang chủ
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="books.php">
                        Thư mục sách
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        ADMIN
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                        Liên hệ
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>


<section class="hero text-center text-white">

    <div class="container">

        <h1 class="display-4 fw-bold">
            HỆ THỐNG QUẢN LÝ THƯ VIỆN
        </h1>

        <p class="lead mt-3">
            Quản lý sách, độc giả và hoạt động mượn trả sách
            một cách nhanh chóng và hiệu quả.
        </p>

        <a href="books.php"
           class="btn btn-warning btn-lg mt-3">

            Xem thư mục sách

        </a>

    </div>

</section>


<section class="container my-5">

    <h2 class="text-center mb-4">
        Giới Thiệu Thư Viện
    </h2>

    <p class="text-center">
        Thư viện là nơi lưu trữ và cung cấp nhiều đầu sách
        thuộc các lĩnh vực Công nghệ Thông tin, Kinh tế,
        Ngoại ngữ và Kỹ năng mềm, hỗ trợ sinh viên trong
        học tập và nghiên cứu.
    </p>

</section>


<section class="container my-5">

<h2 class="text-center mb-4">
Chức Năng Chính
</h2>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<div class="card-body text-center">

<img src="assets/images/book.png" class="feature-img">

<h4 class="mt-3">
Quản lý sách
</h4>

<p>
Thêm, sửa, xóa và cập nhật thông tin sách.
</p>

</div>
</div>

</div>

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<div class="card-body text-center">

<img src="assets/images/reader.png" class="feature-img">

<h4 class="mt-3">
Quản lý độc giả
</h4>

<p>
Lưu trữ thông tin người đọc trong thư viện.
</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<div class="card-body text-center">

<img src="assets/images/borrow.png" class="feature-img">

<h4 class="mt-3">
Quản lý mượn trả
</h4>

<p>
Theo dõi lịch sử mượn và trả sách.
</p>

</div>

</div>

</div>

</div>

</section>




<footer class="bg-dark text-white py-4">

    <div class="container text-center">

        <h5>
            Hệ Thống Quản Lý Thư Viện
        </h5>

        <p>
            Hỗ trợ quản lý thư viện hiệu quả và hiện đại.
        </p>

        <p class="mb-0">
            © 2026 Quản Lý Thư Viện
        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>