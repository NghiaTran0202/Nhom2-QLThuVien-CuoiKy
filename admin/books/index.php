<?php

require_once '../../config/database.php';

$keyword = '';

if(isset($_GET['keyword']) && !empty($_GET['keyword'])){

    $keyword = trim($_GET['keyword']);

    $sql = "SELECT * FROM books
            WHERE title LIKE ?
            OR author LIKE ?
            OR category LIKE ?";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        "%$keyword%",
        "%$keyword%",
        "%$keyword%"
    ]);

}else{

    $sql = "SELECT * FROM books ORDER BY id ASC";

    $stmt = $conn->query($sql);

}

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Quản Lý Sách</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<a href="../dashboard.php"
class="navbar-brand">

 Quản Lý Thư Viện

</a>

</div>

</nav>

<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-3">

<h2>Thư Mục Sách</h2>

<a href="add.php"
class="btn btn-success">

Thêm Sách

</a>

</div>

<form method="GET" class="mb-4">

<div class="input-group">

<input
type="text"
name="keyword"
class="form-control"
placeholder="Tìm kiếm sách, tác giả hoặc thể loại..."
value="<?= htmlspecialchars($keyword) ?>">

<button
type="submit"
class="btn btn-primary">

Tìm Kiếm

</button>

<a href="index.php"
class="btn btn-secondary">

Làm Mới

</a>

</div>

</form>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Tên Sách</th>
<th>Tác Giả</th>
<th>Thể Loại</th>
<th>Số Lượng</th>
<th>Thao Tác</th>

</tr>

</thead>

<tbody>

<?php if(count($books) > 0): ?>

<?php foreach($books as $book): ?>

<tr>

<td><?= $book['id'] ?></td>

<td><?= htmlspecialchars($book['title']) ?></td>

<td><?= htmlspecialchars($book['author']) ?></td>

<td><?= htmlspecialchars($book['category']) ?></td>

<td><?= $book['quantity'] ?></td>

<td>

<a href="edit.php?id=<?= $book['id'] ?>"
class="btn btn-warning btn-sm">

Sửa

</a>

<a href="delete.php?id=<?= $book['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Bạn có chắc muốn xóa sách này không?')">

Xóa

</a>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="6" class="text-center">

Không tìm thấy sách.

</td>

</tr>

<?php endif; ?>

</tbody>

</table>

<a href="../dashboard.php"
class="btn btn-secondary">

Quay Lại Dashboard

</a>

</div>

</body>

</html>