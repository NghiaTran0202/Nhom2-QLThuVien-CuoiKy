<?php

require_once '../../config/database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO books
    (title,author,category,quantity)

    VALUES(?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $title,
        $author,
        $category,
        $quantity
    ]);

    header(
        "Location: index.php"
    );

    exit();

}

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Thêm Sách</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Thêm Sách</h2>

<form method="POST">

<div class="mb-3">

<label>Tên Sách</label>

<input
type="text"
name="title"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Tác Giả</label>

<input
type="text"
name="author"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Thể Loại</label>

<input
type="text"
name="category"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Số Lượng</label>

<input
type="number"
name="quantity"
class="form-control"
required>

</div>

<button
class="btn btn-success">

Lưu

</button>

<a href="index.php"
class="btn btn-secondary">

Quay Lại

</a>
</form>
</div>

</body>

</html>
