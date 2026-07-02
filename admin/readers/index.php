<?php

require_once '../../config/database.php';

$sql = "SELECT * FROM readers";
$stmt = $conn->query($sql);
$readers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="UTF-8">
<title>Quản Lý Độc Giả</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">

<h2>Danh Sách Độc Giả</h2>

<a href="add.php" class="btn btn-success">
    Thêm Độc Giả
</a>

</div>

<table class="table table-bordered">

<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Họ Tên</th>
    <th>Email</th>
    <th>SĐT</th>
    <th>Thao Tác</th>
</tr>
</thead>

<tbody>

<?php foreach($readers as $reader): ?>

<tr>
    <td><?= $reader['id'] ?></td>
    <td><?= $reader['fullname'] ?></td>
    <td><?= $reader['email'] ?></td>
    <td><?= $reader['phone'] ?></td>

    <td>
        <a href="edit.php?id=<?= $reader['id'] ?>"
           class="btn btn-warning btn-sm">
            Sửa
        </a>

        <a href="delete.php?id=<?= $reader['id'] ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Bạn có chắc muốn xóa?')">
            Xóa
        </a>
    </td>
</tr>

<?php endforeach; ?>

</tbody>

</table>

<a href="../dashboard.php" class="btn btn-secondary">
    Quay Lại Dashboard
</a>

</div>

</body>
</html>