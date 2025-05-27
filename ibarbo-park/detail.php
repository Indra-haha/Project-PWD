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
    <title>Destination | IBARBO</title>
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
    <?php require('views/top-bar.php');
    require_once('../server/koneksi.php');
    $queryUmum = "SELECT * FROM desdes WHERE kode = {$_GET['detail']}";
    $resultUmum = mysqli_query($connect, $queryUmum);
    $result = mysqli_fetch_all($resultUmum, MYSQLI_ASSOC);
    $hitung = 0;

    ?>
    <div class="bg-content-c d-flex flex-wrap rubik-font " style="width:100%;">
        <div class="d-flex my-3 column-gap-5 row-gap-0 justify-content-center flex-wrap" style="width:100%;">
            <?php
            foreach ($result as $key => $value) {
                $hitung++;
                $image_data = $value['gambar'];  // Assuming 'gambar' is the binary data
                $image_type = "image/jpeg";
                $queryDetail = "SELECT d.nama, d.gambar, d.deskripsi, g.gambar, g.deskripsiDetail FROM gamdes g 
                            JOIN desdes d ON g.kode = d.kode 
                            WHERE g.kode = {$value['kode']}";
                $resultDetail = mysqli_query($connect, $queryDetail);
                $result2 = mysqli_fetch_all($resultDetail, MYSQLI_ASSOC);
            ?>
                <div class="mx-0 py-3 text-center position-relative d-flex">
                    <div class="py-2" style="width:50%;">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($image_data); ?>" alt="" style="width:65%;transform:rotate(358deg)" class="shadow-lg rounded-4">
                    </div>
                    <div class="d-block justify-content-center align-items-center pt-3" style="width:50%;">
                        <h2 class="align-items-center px-5 pt-1 pb-2 text-warna-primary text-start"><?= htmlspecialchars($value['nama']) ?></h2>
                        <p class="d-flex align-items-center px-5 py-3 pb-5 mb-2 text-warna-secondary text-start"><?= htmlspecialchars($value['deskripsi']) ?></p>
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-wrap column-gap-5 row-gap-3 my-3">
                    <?php
                    foreach ($result2 as $key2 => $value2) {
                        $image_data_detail = $value2['gambar']; // Assuming 'gambar' is the binary data
                        $image_type_detail = "image/jpeg";
                    ?>

                        <div class="flex-column mb-5 p-0 text-center detail d-flex text-orange rounded-5">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($image_data_detail); ?>" alt="detail" style="width:auto;height:200px;" class="rounded-5 shadow-lg">
                            <p class="d-flex p-2 justify-content-center align-items-center fw-semibold" style="width:100%;height:auto;"><?= htmlspecialchars($value2['deskripsiDetail']) ?></p>
                        </div>

                    <?php
                    } ?>
                </div>
            <?php
            } ?>
        </div>
    </div>

    <?php require('views/bottom-bar.php') ?>

    <script src="behavior.js "></script>
</body>

</html>=