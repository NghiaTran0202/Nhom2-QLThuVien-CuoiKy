<?php

require_once '../config/database.php';

$sql = "SELECT
            borrows.id,
            readers.fullname,
            books.title,
            borrows.borrow_date,
            borrows.return_date,
            borrows.status
        FROM borrows
        JOIN readers
            ON borrows.reader_id = readers.id
        JOIN books
            ON borrows.book_id = books.id
        ORDER BY borrows.id DESC";

$stmt = $conn->query($sql);
$borrows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Lịch Sử Mượn</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">

📚 Lịch Sử Mượn Sách

</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Người Mượn</th>
<th>Tên Sách</th>
<th>Ngày Mượn</th>
<th>Ngày Trả</th>
<th>Trạng Thái</th>

</tr>

</thead>

<tbody>

<?php foreach($borrows as $row): ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['fullname'] ?></td>

<td><?= $row['title'] ?></td>

<td><?= $row['borrow_date'] ?></td>

<td><?= $row['return_date'] ?></td>

<td>

<?php if($row['status']=="Đang mượn"): ?>

<span class="badge bg-warning text-dark">

Đang mượn

</span>

<?php else: ?>

<span class="badge bg-success">

Đã trả

</span>

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<a href="../books.php" class="btn btn-primary">

⬅ Quay Lại Danh Sách Sách

</a>

</div>

</body>

</html>