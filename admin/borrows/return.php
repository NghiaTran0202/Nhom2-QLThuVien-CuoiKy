<?php

require_once '../../config/database.php';

$id = $_GET['id'] ?? 0;


$sql = "SELECT * FROM borrows WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$borrow = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$borrow){
    die("Không tìm thấy phiếu mượn.");
}


if($borrow['status'] == "Đang mượn"){

    // Cập nhật trạng thái
    $updateBorrow = $conn->prepare("
        UPDATE borrows
        SET status='Đã trả'
        WHERE id=?
    ");

    $updateBorrow->execute([$id]);

    // Tăng số lượng sách
    $updateBook = $conn->prepare("
        UPDATE books
        SET quantity = quantity + 1
        WHERE id = ?
    ");

    $updateBook->execute([$borrow['book_id']]);

}

header("Location: index.php");
exit();

?>