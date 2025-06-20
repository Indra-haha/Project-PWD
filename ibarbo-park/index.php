<?php
session_start();
require_once('../server/koneksi.php');
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
    <title>Home | IBARBO</title>
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
    <?php require('views/top-bar.php') ?>
    <div class="bg-content-c rubik-font" style="height:auto; top:60px;">
        <img src="images/index.jpg" alt="" style="width:100%;" class="d-flex">
        <h2 class="p-0 m-4 mt-5 text-center text-warna-primary">
            Welcome to Ibarbo Park
        </h2>
        <div class="m-3 mx-5 text-center text-warna-primary">
            Selamat datang! Kami dengan senang hati menyambut kedatangan Anda di tempat yang penuh keceriaan. Nikmati suasana segar dan beragam aktivitas seru yang kami tawarkan. Jangan lewatkan kesempatan untuk melepas penat dan menciptakan kenangan indah bersama keluarga dan teman-teman. Kami tunggu kehadiran Anda untuk merasakan sendiri keindahan dan keceriaan di taman rekreasi kami!
        </div>
        <h2 class="p-0 m-4 mt-5 pb-3 text-center text-warna-primary">
            Explore Our Destination
        </h2>
        <div class="d-flex column-gap-5 row-gap-5 justify-content-center flex-wrap" style="width:100%;">
            <?php
            $query = "SELECT * FROM maingambar";
            $result = mysqli_query($connect, $query);
            $resultFix = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($resultFix as $value) {
                $image_data = $value['gambar']; // Assuming 'gambar' is the binary data
                $image_type = "image/jpeg";
            ?>
                <div class="m-0 p-0 text-center position-relative">
                    <a href="detail.php?detail=<?= htmlspecialchars($value['id'])?>" class="d-flex text-decoration-none text-orange about rounded-circle">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($image_data); ?>" alt="aviary" style="width:280px;height:280px;" class="d-flex rounded-circle shadow-lg">
                        <h3 class="p-2 position-absolute justify-content-center d-flex align-items-center" style="width:100%;height:100%;"><?= htmlspecialchars($value['keterangan'])?></h3>
                        <p class="p-2 position-absolute justify-content-center d-flex align-items-center" style="width:100%;height:120%;">Click Me</p>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <h2 class="p-0 m-4 mt-5 pb-3 text-center text-warna-primary">
            On Instagram
        </h2>
        <div class="d-flex column-gap-4 row-gap-4 justify-content-center flex-wrap" style="width:100%;">
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJrPpcqywfu/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/1.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJl1ThdT3wa/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA%3D%3D" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/2.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJeodbrSPf3/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA%3D%3D" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/3.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJQsGSFR0IR/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/4.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJog5yGSq6U/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA%3D%3D" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/5.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0 ">
                <a href="https://www.instagram.com/reel/DJLvblLRltQ/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA%3D%3D" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/6.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJsazhjTq3h/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA%3D%3D" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/7.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
            <div class="m-0 p-0">
                <a href="https://www.instagram.com/reel/DJimda5TFFW/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA%3D%3D" target="_blank">
                    <video width="280" height="560" class="shadow-lg">
                        <source src="videos/8.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
        </div>
        <h2 class="p-0 m-4 mt-5 text-center text-warna-primary">
            Get Me Now
        </h2>
        <div class="d-flex justify-content-center flex-wrap column-gap-5 row-gap-3" style="width:100%;">
            <?php
            $query = "SELECT * FROM tiket";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
            }
            $getTiket = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($getTiket as $tiket) {
            ?>
                <div class="mb-5 p-0 text-center position-relative">
                    <a href="ticket.php?tiket=<?= htmlspecialchars($tiket['id']) ?>" class="d-flex text-decoration-none text-orange about rounded-5">
                        <img src="data:image/jpeg;base64,<?= base64_encode($tiket['gambar']) ?>" alt="tiket-<?= htmlspecialchars($tiket['id']) ?>" style="width:auto;height:200px;" class="d-flex rounded-5 shadow-lg">
                        <h3 class="p-2 position-absolute justify-content-center d-flex align-items-center" style="width:100%;height:140%;"><?= htmlspecialchars($tiket['id']) ?></h3>
                        <p class="p-2 position-absolute justify-content-center d-flex align-items-center" style="width:100%;height:170%;">Click For Order</p>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php require('views/bottom-bar.php') ?>
    <script src="behavior.js "></script>
</body>

</html>