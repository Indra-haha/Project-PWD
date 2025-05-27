<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket | IBARBO</title>
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
    <div class="d-block justify-content-center align-items-center rubik-font bg-content-c text-warna-primary" style="width:100%;">
        <div class="d-flex flex-wrap justify-content-center align-items-center p-5 rounded-5 mx-5" style="width:100%;max-width:1200px;">
            <?php
            if (!isset($_GET) || empty($_GET)) {
                $query = "SELECT id, gambar FROM tiket";
                $result = mysqli_query($connect, $query);
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $d) {
            ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($d['gambar']) ?>" alt="<?= $d['id'] ?>" style="width:500px;hight:100%;" class="rounded-5 shadow-lg m-3">

                <?php } ?>
        </div>
    <?php
            } else { ?>
        <div class="d-flex flex-wrap justify-content-center align-items-center p-5 rounded-5 column-gap-4" style="width:100%;">
            <?php
                $query = "SELECT gambar, hargaWeekday, hargaWeekend FROM tiket WHERE id = '{$_GET['tiket']}'";
                $result = mysqli_query($connect, $query);
                $data = mysqli_fetch_assoc($result);
            ?>
            <div>
                <img src="data:image/jpeg;base64,<?= base64_encode($data['gambar']) ?>" alt="Ticket Image" style="width:500px;hight:100%;" class="rounded-5 shadow-lg">
            </div>
            <div class="d-block p-3 justify-content-center align-items-center" style="width:300px;">
                <h2 class="pb-1">Hak Akses</h2>
                <?php
                $query = "SELECT fasilitas FROM fasilitasUmum";
                $result = mysqli_query($connect, $query);
                $fasilitas = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($fasilitas as $f) {
                ?>
                    <p class="font-16 py-1"><?= $f['fasilitas'] ?></p>
                <?php }
                $query = "SELECT fasilitas FROM fasilitasCombo WHERE jenisTiket = '{$_GET['tiket']}'";
                $result = mysqli_query($connect, $query);
                $fasilitasCombo = mysqli_fetch_all($result, MYSQLI_ASSOC);
                if (empty($fasilitasCombo)) { ?>
                    <p class="font-16 fw-semibold py-1">Tidak ada fasilitas tambahan untuk tiket ini.</p>
                <?php
                } else if (count($fasilitasCombo) > 0) { ?>
                    <h3 class="pb-1">Fasilitas Tambahan</h3>
                <?php } ?>
                <div class="d-flex">
                    <?php
                    foreach ($fasilitasCombo as $fc) {
                    ?>
                        <p class="font-16 py-1 px-2 text-center"><?= $fc['fasilitas'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="d-block mx-5 my-5">
                <div class="py-2 justify-content-center align-items-center fw-semibold text-center font-20">Weekday</div>
                <button class="btn btn-primary px-5 py-3 font-20"><?= htmlspecialchars($data['hargaWeekday']) ?></button>
            </div>
            <div class="d-block mx-5 my-5">
                <div class="py-2 justify-content-center align-items-center fw-semibold text-center font-20">Weekday</div>
                <button class="btn btn-secondary px-5 py-3 font-20"><?= htmlspecialchars($data['hargaWeekend']) ?></button>
            </div>
        </div>
    <?php
            } ?>
    </div>
    <?php require('views/bottom-bar.php') ?>
    <script src="behavior.js "></script>
</body>

</html>