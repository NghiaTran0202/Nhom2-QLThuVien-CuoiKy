<?php

require_once '../../config/database.php';

$sql = "SELECT borrows.*,
               readers.fullname,
               books.title
        FROM borrows
        JOIN readers
        ON borrows.reader_id = readers.id
        JOIN books
        ON borrows.book_id = books.id";

$stmt = $conn->query($sql);

$borrows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Quản Lý Mượn Trả</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">

    <h2>Danh Sách Mượn Sách</h2>

    <a href="add.php"
       class="btn btn-success">

        Tạo Phiếu Mượn

    </a>

</div>

<table class="table table-bordered table-hover">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Độc Giả</th>
            <th>Sách</th>
            <th>Ngày Mượn</th>
            <th>Ngày Trả</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>

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

                <?php if($row['status'] == 'Đang mượn'): ?>

                    <span class="badge bg-warning text-dark">
                        Đang mượn
                    </span>

                <?php else: ?>

                    <span class="badge bg-success">
                        Đã trả
                    </span>

                <?php endif; ?>

            </td>

            <td>

                <?php if($row['status'] == 'Đang mượn'): ?>

                    <<?php if($row['status']=="Đang mượn"){ ?>

<a href="return.php?id=<?= $row['id'] ?>"
class="btn btn-primary btn-sm"
onclick="return confirm('Xác nhận trả sách?')">

Trả Sách

</a>

<?php }else{ ?>

<span class="badge bg-success">

Đã trả

</span>

<?php } ?>

                <?php else: ?>

                    <button class="btn btn-secondary btn-sm"
                            disabled>

                        Hoàn Thành

                    </button>

                <?php endif; ?>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<a href="../dashboard.php"
   class="btn btn-secondary">

    Quay Lại Dashboard

</a>

</div>

</body>

</html>