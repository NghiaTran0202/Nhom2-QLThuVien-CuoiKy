<?php

session_start();

if(!isset($_SESSION["user"])){
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f3f6fb;
}

.navbar{
    background:#212529;
}

.navbar-brand{
    font-size:28px;
    font-weight:bold;
}

.dashboard-title{
    font-size:42px;
    color:#0d6efd;
    font-weight:bold;
}

.dashboard-img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:.3s;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.2);
}

.card-body{
    padding:0;
}

.card-body h3{
    margin-top:20px;
    color:#0d6efd;
    font-size:42px;
    font-weight:bold;
}

.card-body p{
    margin-bottom:25px;
    font-size:20px;
}

.action-btn{
    padding:15px;
    font-size:18px;
    font-weight:bold;
    border-radius:12px;
    transition:.3s;
}

.action-btn:hover{
    transform:scale(1.05);
}

</style>

</head>

<body>

<nav class="navbar navbar-dark">

<div class="container">

<span class="navbar-brand">

📚 Trang Quản Trị Thư Viện

</span>

<div>

<a href="../index.php" class="btn btn-warning">

🏠 Trang Chủ

</a>

<a href="../logout.php" class="btn btn-danger">

🚪 Đăng Xuất

</a>

</div>

</div>

</nav>

<div class="container mt-5">

<h2 class="dashboard-title text-center">

📊 Dashboard Quản Trị

</h2>

<div class="alert alert-primary text-center">

👋 Xin chào
<b><?= $_SESSION["user"] ?></b>

</div>

<h5 class="text-center text-secondary mb-4">

📅 <span id="clock"></span>

</h5>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card shadow">

<img src="../assets/images/admin/quanlysach.jpg" class="dashboard-img">

<div class="card-body text-center">

<h3>500</h3>

<p>Tổng số sách</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow">

<img src="../assets/images/admin/docgia.jpg" class="dashboard-img">

<div class="card-body text-center">

<h3>120</h3>

<p>Độc giả</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow">

<img src="../assets/images/admin/muon.webp" class="dashboard-img">

<div class="card-body text-center">

<h3>320</h3>

<p>Lượt mượn</p>

</div>

</div>

</div>

</div>

<div class="row mt-4">

<div class="col-md-3 mb-3">

<a href="books/index.php" class="btn btn-primary w-100 action-btn">

📚 Quản lý sách

</a>

</div>

<div class="col-md-3 mb-3">

<a href="readers/index.php" class="btn btn-success w-100 action-btn">

👨‍🎓 Quản lý độc giả

</a>

</div>

<div class="col-md-3 mb-3">

<a href="borrows/index.php" class="btn btn-warning w-100 action-btn">

🔄 Mượn trả sách

</a>

</div>

<div class="col-md-3 mb-3">

<a href="reports/index.php" class="btn btn-danger w-100 action-btn">

📈 Báo cáo

</a>

</div>

</div>

</div>

<script>

function updateClock(){
    document.getElementById("clock").innerHTML =
    new Date().toLocaleString("vi-VN");
}

updateClock();

setInterval(updateClock,1000);

</script>

</body>

</html>