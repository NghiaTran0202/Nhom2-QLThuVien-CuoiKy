<?php

session_start();

require_once 'config/database.php';

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users
            WHERE username = ?";

    $stmt = $conn->prepare($sql);

    $stmt->execute([$username]);

    $user = $stmt->fetch();

    if($user){

        if($password == $user["password"]){

            $_SESSION["user"] =
            $user["username"];

            header(
                "Location: admin/dashboard.php"
            );

            exit();

        }

    }

    $message =
    "Sai tên đăng nhập hoặc mật khẩu";

}

?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Đăng Nhập</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h3 class="text-center">

                    Đăng Nhập

                </h3>

                <?php if($message != ""): ?>

                <div class="alert alert-danger">

                    <?= $message ?>

                </div>

                <?php endif; ?>

                <form method="POST">

                    <div class="mb-3">

                        <label>

                            Username

                        </label>

                        <input
                            type="text"
                            name="username"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <button
                        class="btn btn-primary w-100">

                        Đăng Nhập

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

</body>

</html>