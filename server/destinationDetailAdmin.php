<?php
session_start();
require_once('../server/koneksi.php');

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}

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
<?php require('views/header.php') ?>
    <div class="position-relative flex-wrap d-flex mt-5 pt-3" style="width:100%;height:auto;overflow-y:auto;">
        <table class="mx-5 table table-hover rubik-font d-flex">
            <tr class="my-5 align-items-center justify-content-center">
                <th class="text-center p-2">Id</th>
                <th class="text-center p-2">Nama</th>
                <th class="text-center p-2">Gambar Detail</th>
                <th class="text-center p-2">Deskripsi Gambar</th>
                <th class="text-center p-2">Changes</th>
                <th class="text-center p-2">Remove</th>
            </tr>
            <?php
            $query = "SELECT g.id, g.kode, d.nama, g.deskripsiDetail, g.gambar FROM gamdes g JOIN desdes d WHERE g.kode = d.kode";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
            }
            $getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($getData as $key => $value) {
            ?>
                <tr class="my-5 align-items-center justify-content-center">
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['id']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['nama']) ?></td>
                    <td class="text-center px-2 align-middle"><img src="data:image/jpeg;base64,<?= base64_encode($value['gambar']) ?>" alt="Gambar" width="100"></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['deskripsiDetail']) ?></td>
                    <td class="px-2 align-middle justify-content-center">
                        <form action="form_edit.php" method="POST">
                            <input type="hidden" name="tabel" value="gamdes">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-edit.svg" alt="edit" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                    <td class="px-2 align-middle justify-content-center">
                        <form action="process_hapus.php" method="POST">
                            <input type="hidden" name="tabel" value="gamdes">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-remove.svg" alt="remove" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
            <tr>
                <td class="text-center px-2 align-middle">
                    <form action="form_insert.php" method="POST">
                        <input type="hidden" name="tabel" value="gamdes">
                        <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                            <img src="../ibarbo-park/images/logo-add.svg" alt="add" class="p-2">
                        </button>
                    </form>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</body>

</html>