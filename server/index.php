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
    <div id="mainDestinationAdmin" class="position-sticky d-flex justify-content-center align-items-center rubik-font bg-content-c p-0" style="width:100%;top:0;z-index:1000;">
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
    <div class="position-fixed d-flex flex-column" style="z-index:9999">
        <a href="#mainDestinationAdmin" class="text-decoration-none px-3 py-2">Dashboard Destination</a>
        <a href="#destinationAdmin" class="text-decoration-none px-3 py-2">Destination Explain</a>
        <a href="#detailDestinationAdmin" class="text-decoration-none px-3 py-2">Detail Destination</a>
        <a href="#mainTiket" class="text-decoration-none px-3 py-2">Main Ticket</a>
        <a href="#detailTiket" class="text-decoration-none px-3 py-2">Detail Tiket</a>
    </div>
    <div id="mainTiket" class="position-relative flex-wrap d-flex mt-5" style="width:100%;height:auto;overflow-y:auto;">
        <table class="mx-5 table table-hover rubik-font d-flex">
            <tr class="my-2 justify-content-center align-items-center">
                <th class="text-center p-2">Kode</th>
                <th class="text-center p-2">Nama</th>
                <th class="text-center p-2">Gambar</th>
                <th class="text-center p-2">Deskripsi</th>
                <th class="text-center p-2">Changes</th>
                <th class="text-center p-2">Remove</th>
            </tr>
            <?php
            $query = "SELECT * FROM desdes";
            $result = mysqli_query($connect, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
            }
            $getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($getData as $key => $value) {
            ?>
                <tr class="my-5 align-items-center justify-content-center">
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['kode']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['nama']) ?></td>
                    <td class="px-2 align-middle"><img src="data:image/jpeg;base64,<?= base64_encode($value['gambar']) ?>" alt="Gambar" width="100"></td>
                    <td class="px-2 align-middle"><?= htmlspecialchars($value['deskripsi']) ?></td>
                    <td class="px-2 align-middle d-flex justify-content-center rubik-font">
                        <form action="form_edit.php" method="POST">
                            <input type="hidden" name="tabel" value="desdes">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['nama']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-edit.svg" alt="edit" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                    <td class="px-2 align-middle justify-content-center">
                        <form action="process_hapus.php" method="POST">
                            <input type="hidden" name="tabel" value="desdes">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['kode']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-remove.svg" alt="remove" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                </tr>
            <?php
            } ?>
            <tr>
                <td class="text-center px-2 align-middle">
                    <form action="form_insert.php" method="POST">
                        <input type="hidden" name="tabel" value="desdes">
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
    <div class="position-relative flex-wrap d-flex mt-5" style="width:100%;height:auto;overflow-y:auto;">
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
            $query = "SELECT g.id, g.kode, d.nama, g.deskripsiDetail, g.gambarDetail FROM gamdes g JOIN desdes d WHERE g.kode = d.kode";
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
                    <td class="text-center px-2 align-middle"><img src="data:image/jpeg;base64,<?= base64_encode($value['gambarDetail']) ?>" alt="Gambar" width="100"></td>
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
    <div class="position-relative flex-wrap d-flex mt-5" style="width:100%;height:auto;overflow-y:auto;">
        <table class="mx-5 table table-hover rubik-font d-flex">
            <tr class="my-2 justify-content-center align-items-center">
                <th class="text-center p-2">Jenis Tiket</th>
                <th class="text-center p-2">Harga Weekday</th>
                <th class="text-center p-2">Harga Weekend</th>
                <th class="text-center p-2">Gambar</th>
                <th class="text-center p-2">Changes</th>
                <th class="text-center p-2">Remove</th>
            </tr>
            <?php
            $query = "SELECT * FROM tiket";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
            }
            $getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($getData as $key => $value) {

            ?>
                <tr class="my-5 align-items-center justify-content-center">
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['id']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['hargaWeekday']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['hargaWeekday']) ?></td>
                    <td class="text-center px-2 align-middle"><img src="data:image/jpeg;base64,<?= base64_encode($value['gambar']) ?>" alt="Gambar" width="100"></td>
                    <td class="px-2 align-middle font-15justify-content-center">
                        <form action="form_edit.php" method="POST">
                            <input type="hidden" name="tabel" value="tiket">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-edit.svg" alt="edit" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                    <td class="px-2 align-middle justify-content-center">
                        <form action="process_hapus.php" method="POST">
                            <input type="hidden" name="tabel" value="tiket">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-remove.svg" alt="remove" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                </tr>
            <?php
            } ?>
            <tr>
                <td class="text-center px-2 align-middle">
                    <form action="form_insert.php" method="POST">
                        <input type="hidden" name="tabel" value="tiket">
                        <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                            <img src="../ibarbo-park/images/logo-add.svg" alt="add" class="p-2">
                        </button>
                    </form>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="position-relative flex-wrap d-flex mt-5" style="width:100%;height:auto;overflow-y:auto;">
        <table class="mx-5 table table-hover rubik-font d-flex">
            <tr class="my-2 justify-content-center align-items-center">
                <th class="text-center p-2">Id</th>
                <th class="text-center p-2">Fasilitas</th>
                <th class="text-center p-2">Changes</th>
                <th class="text-center p-2">Remove</th>
            </tr>
            <?php
            $query = "SELECT * FROM fasilitasUmum";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
            }
            $getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($getData as $key => $value) {
            ?>
                <tr class="my-2 justify-content-center align-items-center">
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['idFasilitas']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['fasilitas']) ?></td>
                    <td class="px-2 align-middle font-15justify-content-center">
                        <form action="form_edit.php" method="POST">
                            <input type="hidden" name="tabel" value="fasilitasumum">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['idFasilitas']) ?>">
                            <input type="hidden" name="fasilitas" value="<?= htmlspecialchars($value['fasilitas']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-edit.svg" alt="edit" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                    <td class="text-center px-2 align-middle">
                        <form action="process_hapus.php" method="POST">
                            <input type="hidden" name="tabel" value="fasilitasumum">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['idFasilitas']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-remove.svg" alt="remove" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
            <tr class="my-2 justify-content-center align-items-center">
                <td class="text-center px-2 align-middle">
                    <form action="form_insert.php" method="POST">
                        <input type="hidden" name="tabel" value="fasilitasumum">
                        <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                            <img src="../ibarbo-park/images/logo-add.svg" alt="add" class="p-2">
                        </button>
                    </form>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="position-relative flex-wrap d-flex mt-5" style="width:100%;height:auto;overflow-y:auto;">
        <table class="mx-5 table table-hover rubik-font d-flex">
            <tr class="my-2 justify-content-center align-items-center">
                <th class="text-center p-2">Id</th>
                <th class="text-center p-2">Jenis Tiket</th>
                <th class="text-center p-2">Fasilitas</th>
                <th class="text-center p-2">Changes</th>
                <th class="text-center p-2">Remove</th>
            </tr>
            <?php
            $query = "SELECT * FROM fasilitasCombo";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
            }
            $getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($getData as $key => $value) {
            ?>
                <tr class="my-2 justify-content-center align-items-center">
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['id']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['jenisTiket']) ?></td>
                    <td class="text-center px-2 align-middle"><?= htmlspecialchars($value['fasilitas']) ?></td>
                    <td td class="text-center px-2 align-middle">
                        <form action="form_edit.php" method="POST">
                            <input type="hidden" name="tabel" value="fasilitasCombo">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>">
                            <input type="hidden" name="jenisTiket" value="<?= htmlspecialchars($value['jenisTiket']) ?>">
                            <input type="hidden" name="fasilitas" value="<?= htmlspecialchars($value['fasilitas']) ?>">
                            <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                                <img src="../ibarbo-park/images/logo-edit.svg" alt="edit" class="p-2">
                            </button>
                            </input>
                        </form>
                    </td>
                    <td td class="text-center px-2 align-middle">
                        <form action="process_hapus.php" method="POST">
                            <input type="hidden" name="tabel" value="fasilitasCombo">
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
             <tr class="my-2 justify-content-center align-items-center">
                <td class="text-center px-2 align-middle">
                    <form action="form_insert.php" method="POST">
                        <input type="hidden" name="tabel" value="fasilitasCombo">
                        <button type="submit" class="admin-buttonUbah d-block px-2 p-2 border-0 bg-transparent" style="height:100%;">
                            <img src="../ibarbo-park/images/logo-add.svg" alt="add" class="p-2">
                        </button>
                    </form>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</body>

</html>