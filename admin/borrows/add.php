<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Tạo Phiếu Mượn</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-5">


<h2>
    Tạo Phiếu Mượn
</h2>

<form>

    <div class="mb-3">

        <label>
            Tên Độc Giả
        </label>

        <input
            type="text"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>
            Tên Sách
        </label>

        <input
            type="text"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>
            Ngày Mượn
        </label>

        <input
            type="date"
            class="form-control">

    </div>

    <button
        class="btn btn-success">

        Lưu Phiếu

    </button>

</form>


</div>
<?php

require_once '../../config/database.php';

$readers = $conn->query("SELECT * FROM readers")->fetchAll(PDO::FETCH_ASSOC);
$books = $conn->query("SELECT * FROM books")->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $reader_id = $_POST['reader_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];

    $sql = "INSERT INTO borrows
            (reader_id, book_id, borrow_date, return_date, status)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $reader_id,
        $book_id,
        $borrow_date,
        $return_date,
        'Đang mượn'
    ]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Tạo Phiếu Mượn</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">Tạo Phiếu Mượn</h2>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Độc Giả
</label>

<select name="reader_id"
class="form-select">

<?php foreach($readers as $reader): ?>

<option value="<?= $reader['id'] ?>">

<?= $reader['fullname'] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Sách
</label>

<select name="book_id"
class="form-select">

<?php foreach($books as $book): ?>

<option value="<?= $book['id'] ?>">

<?= $book['title'] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Ngày Mượn
</label>

<input type="date"
name="borrow_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Ngày Trả
</label>

<input type="date"
name="return_date"
class="form-control"
required>

</div>

<button type="submit"
class="btn btn-success">

Lưu Phiếu Mượn

</button>

<a href="index.php"
class="btn btn-secondary">

Quay Lại

</a>

</form>

</div>

</body>

</html>
</body>

</html>
