<?php

require_once '../config/database.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$book = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$book){
    die("Không tìm thấy sách.");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $borrow_date = $_POST["borrow_date"];
    $return_date = $_POST["return_date"];

    // Kiểm tra độc giả đã tồn tại chưa
    $check = $conn->prepare("SELECT id FROM readers WHERE email=?");
    $check->execute([$email]);

    if($check->rowCount() > 0){

        $reader = $check->fetch(PDO::FETCH_ASSOC);
        $reader_id = $reader["id"];

    }else{

        $insertReader = $conn->prepare("
            INSERT INTO readers(fullname,email,phone)
            VALUES(?,?,?)
        ");

        $insertReader->execute([
            $fullname,
            $email,
            $phone
        ]);

        $reader_id = $conn->lastInsertId();

    }

    // Lưu phiếu mượn
    $insertBorrow = $conn->prepare("
        INSERT INTO borrows
        (reader_id,book_id,borrow_date,return_date,status)
        VALUES(?,?,?,?,?)
    ");

    $insertBorrow->execute([
        $reader_id,
        $book["id"],
        $borrow_date,
        $return_date,
        "Đang mượn"
    ]);

    // Giảm số lượng sách
    $updateBook = $conn->prepare("
        UPDATE books
        SET quantity = quantity - 1
        WHERE id = ? AND quantity > 0
    ");

    $updateBook->execute([$book["id"]]);

    header("Location: ../books.php?success=1");
    exit();

}

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Mượn Sách</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">

 Phiếu Mượn Sách

</h2>

<form method="POST">

<div class="mb-3">

<label>Tên sách</label>

<input
type="text"
class="form-control"
value="<?= $book["title"] ?>"
readonly>

</div>

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
class="form-control"
required>

</div>

<div class="mb-3">

<label>Số điện thoại</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Ngày mượn</label>

<input
type="date"
name="borrow_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Ngày trả</label>

<input
type="date"
name="return_date"
class="form-control"
required>

</div>

<button
class="btn btn-success">

📚 Xác Nhận Mượn

</button>

<a href="../books.php"
class="btn btn-secondary">

⬅ Quay Lại

</a>

</form>

</div>

</body>

</html>