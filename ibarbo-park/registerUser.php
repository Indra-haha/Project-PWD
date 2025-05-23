<?php 
session_start();
if (isset($_SESSION['login'])) {
    header('Location: ../server/admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | IBARBO</title>
    <link rel="icon" href="images/logo-ibarbo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
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
    <div class="d-flex justify-content-center align-items-center my-5">
        <form action="../server/process_regis.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama_user" required placeholder="Enter your name">
            <br><br>
            <label for="nomor_hp">No HP:</label>
            <input type="tel" name="nomor_hp" id="nama_user" required placeholder="Enter your telephone number">
            <br><br>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required placeholder="Enter your username">
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="Enter your password">
            <br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required placeholder="Enter your confirm password">
            <br><br>
            <button type="submit">Register</button>
        </form>
        <p>Sudah punya Akun?</p>
        <a href="loginUser.php"><button>Login</button></a>
    </div>
</body>

</html>