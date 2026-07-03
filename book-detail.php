<?php

require_once 'config/database.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$book = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$book){
    die("Không tìm thấy sách!");
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Chi Tiết Sách</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#eef3f8;
}

.card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.card img{
    height:500px;
    object-fit:cover;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand">

THƯ VIỆN ONLINE

</a>

<a href="books.php" class="btn btn-light">

 Quay lại

</a>

</div>

</nav>

<div class="container mt-5">

<div class="card">

<div class="row">

<div class="col-md-5">

<?php
if(!empty($book['image'])){
?>

<img
src="assets/images/books/<?= htmlspecialchars($book['image']) ?>"
class="img-fluid w-100">

<?php
}else{
?>

<img
src="https://picsum.photos/500/700?random=<?= $book['id'] ?>"
class="img-fluid w-100">

<?php
}
?>

</div>

<div class="col-md-7 p-4">

<h2>

<?= htmlspecialchars($book['title']) ?>

</h2>

<hr>

<p>

<b>Tác giả:</b>

<?= htmlspecialchars($book['author']) ?>

</p>

<p>

<b>Thể loại:</b>

<?= htmlspecialchars($book['category']) ?>

</p>

<p>

<b>Số lượng:</b>

<?= $book['quantity'] ?>

</p>

<?php
if(isset($book['description'])){
?>

<p>

<b>Mô tả:</b><br>

<?= nl2br(htmlspecialchars($book['description'])) ?>

</p>

<?php
}
?>

<?php
if($book['quantity']>0){
?>

<span class="badge bg-success fs-6">

Còn sách

</span>

<?php
}else{
?>

<span class="badge bg-danger fs-6">

Hết sách

</span>

<?php
}
?>

<div class="mt-4">

<a href="user/borrow.php?id=<?= $book['id'] ?>"
class="btn btn-success btn-lg">
 Mượn Ngay
</a>
<a href="books.php"
class="btn btn-secondary btn-lg">
 Quay Lại
</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>