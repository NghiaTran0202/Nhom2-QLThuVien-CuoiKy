<?php

require_once '../../config/database.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM readers WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$reader = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$reader){
    die("Không tìm thấy độc giả.");
}

if(isset($_POST['update'])){

    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);

    $sql = "UPDATE readers
            SET fullname=?,
                email=?,
                phone=?
            WHERE id=?";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $fullname,
        $email,
        $phone,
        $id
    ]);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Sửa Độc Giả</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<a href="../dashboard.php"
class="navbar-brand">

📚 Quản Lý Thư Viện

</a>

</div>

</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-7">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>

Sửa Độc Giả

</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>

Họ và tên

</label>

<input
type="text"
name="fullname"
class="form-control"
value="<?= htmlspecialchars($reader['fullname']) ?>"
required>

</div>

<div class="mb-3">

<label>

Email

</label>

<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($reader['email']) ?>">

</div>

<div class="mb-3">

<label>

Số điện thoại

</label>

<input
type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($reader['phone']) ?>">

</div>

<div class="d-grid gap-2">

<button
type="submit"
name="update"
class="btn btn-warning">

Cập Nhật

</button>

<a href="index.php"
class="btn btn-secondary">

Quay Lại

</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>