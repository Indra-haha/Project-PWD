<?php
session_start();
require_once('../server/koneksi.php');
if (!isset($_SESSION['login'])) {
    header('Location: ../ibarbo-park/index.php');
    exit();
}
echo "<script>alert('Login berhasil');</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | IBARBO</title>
    <link rel="icon" href="../ibarbo-park/images/logo-ibarbo.png" type="image/x-icon">
    <link rel="stylesheet" href="../ibarbo-park/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="position-sticky d-flex justify-content-center align-items-center rubik-font bg-content-c p-0" style="width:100%;height:60px;top:0;">
        <div class="d-flex justify-content-start align-items-center d-flex p-0 mx-5" style="width:100%;">
            <img src="../ibarbo-park/images/logo-ibarbo.png" alt="logo" class="p-0 m-0" style="width:80px;">
        </div>
        <div class="d-flex align-items-center p-0" style="width:300px;">
            <div class="d-flex align-items-baseline justify-content-end" style="width:100%;">
                <div class="text-warna-primary fw-bold text-uppercase font-20 mx-5">
                    <?= $_SESSION['nama'] ?>
                </div>
                <div class="text-warna-primary fw-semibold text-uppercase font-15">
                    <?= $_SESSION['role'] ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mx-5">
            <a href="../server/logout.php" class="admin text-decoration-none px-3 py-2 rounded-2">Logout</a>
        </div>
    </div>

</body>

</html>