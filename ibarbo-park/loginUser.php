<?php
session_start();

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
    <div class="d-flex justify-content-center align-items-center login" style="width:100%;">
        <div class="d-block my-5 justify-content-center align-items-center z" style="width:320px;">
            <form action="../server/process_login.php" method="POST">
                <div class="d-block justify-content-center align-items-center">
                    <img src="images/logo-ibarbo.png" alt="" style="width:100px;" class="my-5">
                    <input type="text" name="username" id="username" class="form-control" required placeholder="Username">
                    <br>
                    <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
                    <br>
                    <label for="remember">Remember Me</label>
                    <input type="checkbox" name="remember" id="remember">
                </div>
                <div>
                    <button type="submit">Login</button>
                    <p>Belum punya Akun?</p>
                    <a href="registerUser.php"><button>Registrasi</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>