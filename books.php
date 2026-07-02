<?php
session_start();
require_once 'config/database.php';

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$sql = "SELECT * FROM books WHERE 1";
$params = [];

if($search != ""){
    $sql .= " AND (title LIKE ? OR author LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if($category != ""){
    $sql .= " AND category = ?";
    $params[] = $category;
}

$sql .= " ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->execute($params);

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

$cats = $conn->query("SELECT DISTINCT category FROM books")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Danh Sách Sách</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#eef3f8;
}

.navbar{
    background:#0d6efd;
}

.card{
    border:none;
    border-radius:18px;
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.2);
}

.card img{
    height:250px;
    object-fit:cover;
    border-radius:18px 18px 0 0;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand">

THƯ VIỆN ONLINE

</a>

<div>

<a href="user/my-books.php" class="btn btn-warning me-2">

 Lịch Sử Mượn

</a>

<a href="index.php" class="btn btn-light">

 Trang Chủ

</a>

</div>

</div>

</nav>

<div class="container mt-4">

<h2 class="text-center mb-4">

 Thư Mục Sách

</h2>

<form method="GET" class="row mb-4">

<div class="col-md-5">

<input
type="text"
name="search"
class="form-control"
placeholder="🔍 Tìm tên sách hoặc tác giả..."
value="<?= htmlspecialchars($search) ?>">

</div>

<div class="col-md-4">

<select
name="category"
class="form-select">

<option value="">Tất cả thể loại</option>

<?php foreach($cats as $c): ?>

<option
value="<?= $c['category'] ?>"
<?= $category == $c['category'] ? 'selected' : '' ?>>

<?= $c['category'] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-3">

<button class="btn btn-primary w-100">

 Tìm Kiếm

</button>

</div>

</form>

<div class="row">

<?php foreach($books as $book): ?>

<div class="col-lg-3 col-md-6 mb-4">

<div class="card shadow">

<?php
$random = rand(1,1000000);
?>

<img
src="https://picsum.photos/300/400?random=<?= $random ?>"
class="card-img-top"
alt="<?= htmlspecialchars($book['title']) ?>">

<div class="card-body text-center">

<h5><?= htmlspecialchars($book['title']) ?></h5>

<p>

<b>Tác giả</b><br>

<?= htmlspecialchars($book['author']) ?>

</p>

<p>

<b>Thể loại</b><br>

<?= htmlspecialchars($book['category']) ?>

</p>

<p>

<b>Số lượng:</b>

<?= $book['quantity'] ?>

</p>

<?php if($book['quantity'] > 0): ?>

<span class="badge bg-success">

Còn sách

</span>

<?php else: ?>

<span class="badge bg-danger">

Hết sách

</span>

<?php endif; ?>

<div class="d-grid gap-2 mt-3">

<a href="book-detail.php?id=<?= $book['id'] ?>"
class="btn btn-primary">

 Chi Tiết

</a>

<a href="user/borrow.php?id=<?= $book['id'] ?>"
class="btn btn-success">

 Mượn Ngay

</a>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</body>

</html>