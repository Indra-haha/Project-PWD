<?php
session_start();
require_once('../server/koneksi.php');

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}

$query = "SELECT * FROM desdes";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}
$getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <div class="position-sticky d-flex justify-content-center align-items-center rubik-font bg-content-c p-0" style="width:100%;top:0;z-index:1000;">
        <div class="d-flex justify-content-start align-items-center d-flex p-0 mx-5" style="width:100%;">
            <img src="../ibarbo-park/images/logo-ibarbo.png" alt="logo" class="p-2 m-0" style="width:80px;">
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
            <a href="../server/logout.php" class="admin text-decoration-none px-3 py-2 rounded-2 fw-semibold">Logout</a>
        </div>
    </div>
    <div class="position-relative flex-wrap d-flex mt-5" style="width:100%;height:100vh;overflow-y:auto;">
        <table class="mx-5 table table-hover rubik-font d-flex">
            <tr class="my-2 justify-content-center align-items-center">
                <th class="text-center p-2">Kode</th>
                <th class="text-center p-2">Nama</th>
                <th class="text-center p-2">Gambar</th>
                <th class="text-center p-2">Deskripsi</th>
                <th class="text-center p-2">Ubah</th>
            </tr>
            <?php
            foreach ($getData as $key => $value) {
                $kode = $value['kode'];
                $nama = $value['nama'];
                $gambar = $value['gambar'];
                $deskripsi = $value['deskripsi'];
                $gambar = base64_encode($value['gambar']);
            ?>
                <tr class="my-5 align-items-center justify-content-center">
                    <td class="text-center px-2 align-middle"><?= $kode ?></td>
                    <td class="text-center px-2 align-middle"><?= $nama ?></td>
                    <td class="px-2 align-middle"><img src="data:image/jpeg;base64,<?= $gambar ?>" alt="Gambar" width="100"></td>
                    <td class="px-2 align-middle"><?= $deskripsi ?></td>
                    <th class="px-2 align-middle d-flex justify-content-center rubik-font">
                        <form action="form_edit.php" method="POST">
                            <input type="hidden" name="kode" value="<?= htmlspecialchars($kode) ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
                            <input type="hidden" name="deskripsi" value="<?= htmlspecialchars($deskripsi) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-edit.svg" alt="edit" class="p-2">
                            </button>
                            </input>
                        </form>
                        <form action="process_hapus.php" method="POST">
                            <input type="hidden" name="kode" value="<?= htmlspecialchars($kode) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-remove.svg" alt="remove" class="p-2">
                            </button>
                            </input>
                        </form>
                    </th>
                </tr>
            <?php
            } ?>
            <tr>
                <td class="text-center px-2 align-middle">
                    <a href="form_insert.php">
                        <img src="../ibarbo-park/images/logo-add.svg" alt="add" class="p-2">
                    </a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </div>
</body>

</html>