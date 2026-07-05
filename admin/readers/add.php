<?php

require_once '../../config/database.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $fullname=$_POST["fullname"];

    $email=$_POST["email"];

    $phone=$_POST["phone"];

    $sql="INSERT INTO readers(fullname,email,phone)

          VALUES(?,?,?)";

    $stmt=$conn->prepare($sql);

    $stmt->execute([

        $fullname,

        $email,

        $phone

    ]);

    header("Location: index.php");

    exit();

}

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Thêm Độc Giả</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"

rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Thêm Độc Giả</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Họ tên</label>

<input

type="text"

name="fullname"

class="form-control"

required>

</div>

<div class="mb-3">

<label>Email</label>

<input

type="email"

name="email"

class="form-control">

</div>

<div class="mb-3">

<label>Số điện thoại</label>

<input

type="text"

name="phone"

class="form-control">

</div>

<button

type="submit"

class="btn btn-success">

Lưu

</button>

<a

href="index.php"

class="btn btn-secondary">

Quay Lại

</a>

</form>

</div>

</div>

</div>

</body>

</html>