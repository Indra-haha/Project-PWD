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
    <div class="login position-absolute"></div>
    <div class="position-relative d-flex justify-content-center align-items-center p-0 m-0 rubik-font" style="width:100%;height:100vh;">
        <div class="d-block justify-content-center align-items-center px-4 py-4 rounded-3 bg-content-c" style="width:320px;">
            <form action="../server/process_login.php" method="POST" class="mb-2">
                <div class="d-block justify-content-center align-items-center p-2">
                    <div class="justify-content-center align-items-center d-flex mb-0" style="width:100%;">
                        <img src="images/logo-ibarbo.png" alt="" style="width:80px;" class="justify-content-center d-block mx-2">
                        <h4 class="text-center text-warna-primary align-items-center mx-2 d-block" style="width:100%;">Log In</h2>
                    </div>
                    <div class="d-flex mt-2 mb-4 justify-content-center text-center" style="width:100%;">
                        Login using your account
                    </div>
                    <div class="justify-content-center align-items-center d-block my-1" style="width:100%;">
                        <label for="username" class="mb-2">Username :</label>
                        <input type="text" name="username" id="username" class="form-control justify-content-center" required>
                    </div>
                    <div class="justify-content-center align-items-center d-block my-2" style="width:100%;">
                        <label for="password" class="mb-2">Password :</label>
                        <input type="password" name="password" class="form-control justify-content-center" id="password" required>
                    </div>
                    <div class="justify-content-center align-items-center d-flex" style="width:100%;">
                        <label for="remember" class="mx-3">Remember Me</label>
                        <input type="checkbox" name="remember" id="remember">
                    </div>

                </div>
                <div class="justify-content-center align-items-center d-flex my-1 rounded-2" style="width:100%;">
                    <button type="submit" class="login py-1 d-block rounded-2 border border-0 fw-bold" style="width:100%;">LOGIN</button>
                </div>
            </form>
            <div class="justify-content-center align-items-center d-flex" style="width:100%;">
                <p class="mx-2 d-block fw-normal" style="width:100%;">Belum punya?</p>
                <a href="registerUser.php" class="login py-1 d-block text-decoration-none fw-semibold text-center rounded-2" style="width:100%;">Registrasi
                </a>
            </div>

        </div>
    </div>

</body>

</html>