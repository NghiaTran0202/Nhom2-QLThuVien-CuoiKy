<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Báo Cáo Thống Kê</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">

    Báo Cáo Thống Kê

</h2>

<div class="row">

    <div class="col-md-4">

        <div class="card text-center shadow">

            <div class="card-body">

                <h3>500</h3>

                <p>Tổng Sách</p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card text-center shadow">

            <div class="card-body">

                <h3>120</h3>

                <p>Độc Giả</p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card text-center shadow">

            <div class="card-body">

                <h3>320</h3>

                <p>Lượt Mượn</p>

            </div>

        </div>

    </div>

</div>


</div>
<?php

require_once '../../config/database.php';

$totalBooks = $conn->query(
    "SELECT COUNT(*) FROM books"
)->fetchColumn();

$totalReaders = $conn->query(
    "SELECT COUNT(*) FROM readers"
)->fetchColumn();

$totalBorrows = $conn->query(
    "SELECT COUNT(*) FROM borrows"
)->fetchColumn();

$returnedBooks = $conn->query(
    "SELECT COUNT(*) FROM borrows
     WHERE status = 'Đã trả'"
)->fetchColumn();

$borrowingBooks = $conn->query(
    "SELECT COUNT(*) FROM borrows
     WHERE status = 'Đang mượn'"
)->fetchColumn();

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Báo Cáo Thống Kê</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">

 Báo Cáo Thống Kê Thư Viện

</h2>

<table class="table table-bordered">

<tr>

<th>Tổng Số Sách</th>

<td><?= $totalBooks ?></td>

</tr>

<tr>

<th>Tổng Độc Giả</th>

<td><?= $totalReaders ?></td>

</tr>

<tr>

<th>Tổng Phiếu Mượn</th>

<td><?= $totalBorrows ?></td>

</tr>

<tr>

<th>Sách Đang Mượn</th>

<td><?= $borrowingBooks ?></td>

</tr>

<tr>

<th>Sách Đã Trả</th>

<td><?= $returnedBooks ?></td>

</tr>

</table>

<a href="../dashboard.php"
   class="btn btn-secondary">

Quay Lại Dashboard

</a>

</div>

</body>

</html>

</body>

</html>