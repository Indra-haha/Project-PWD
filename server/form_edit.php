<?php
session_start();
require_once('../server/koneksi.php');

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}
$id = isset($_POST['id']) ? $_POST['id'] : '';
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
    <div id="mainTiket" class="position-relative flex-wrap d-flex justify-content-center align-items-center p-0 m-0 rubik-font" style="width:100%;height:100vh;">
        <table class="p-5 table table-hover rubik-font d-flex justify-content-center align-items-center" style="width:500px;">
            <?php
            $namaPrimaryTabel = [
                'desdes' => 'nama',
                'tiket' => 'jenisTiket',
                'fasilitasumum' => 'id',
                'fasilitascombo' => 'id',
                'gamdes' => 'id'
            ];

            $query = "SELECT * FROM {$_POST['tabel']} WHERE {$namaPrimaryTabel[$_POST['tabel']]} = '{$_POST['id']}'";
            $result = mysqli_query($connect, $query);
            $getData = mysqli_fetch_assoc($result);
            foreach ($getData as $key => $value) {
            ?>
                <tr>
                    <?php
                    if ($key == 'gambar') {
                    ?>
                        <th class="text-start p-2 py-4 text-capitalize"><?= htmlspecialchars($key) ?></th>
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($value) ?>" alt="" style="width:300px;" class="py-4"></td>
                    <?php
                    } else {
                    ?>
                        <th class="text-start p-2 py-4 text-capitalize"><?= htmlspecialchars($key) ?></th>
                        <td class="text-start p-2 py-4 text-capitalize"><?= htmlspecialchars($value) ?></td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            } ?>
        </table>
        <form action="process_edit.php" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap py-3 px-5 rounded-3 mx-5">
            <div class="d-block justifity-content-start align-items-center d-block mx-3">
                <input type="hidden" name="tabel" value="<?= htmlspecialchars($_POST['tabel']) ?>">
                <?php
                $query = "DESC {$_POST['tabel']}";
                $result = mysqli_query($connect, $query);
                $namaPrimaryTabel = [
                    'desdes' => 'kode',
                    'tiket' => 'jenisTiket',
                    'fasilitasumum' => 'id',
                    'fasilitascombo' => 'id',
                    'gamdes' => 'id'
                ];
                $queryValue = "SELECT * FROM {$_POST['tabel']} WHERE {$namaPrimaryTabel[$_POST['tabel']]} = '{$_POST['id']}'";
                $resultValue = mysqli_query($connect, $queryValue);
                $resultValueFetch = mysqli_fetch_assoc($resultValue);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['Field'] == 'id' || $row['Field'] == 'kode' || $row['Field'] == 'jenisTiket') {
                        $type = 'hidden';
                ?>
                        <input type="<?= $type ?>" name="id" placeholder="Enter" class="form-control p-2" value="<?= htmlspecialchars($_POST['id']) ?>">

                    <?php
                    } else if ($row['Field'] == 'gambar') {
                        $type = 'file';
                    ?>
                        <div class="d-block mx-3 my-3">
                            <label for="<?= htmlspecialchars($row['Field']) ?>" class="text-capitalize fw-semibold my-3 mx-2"><?= htmlspecialchars($row['Field']) ?></label>
                            <input type="<?= $type ?>" name="<?= htmlspecialchars($row['Field']) ?>" placeholder="Enter" class="form-control p-2" >
                        </div>
                    <?php
                    } else if ($row['Field'] == 'deskripsi') {
                        $type = 'textarea';
                    ?>
                        <div class="d-block mx-3 my-3">
                            <label for="<?= htmlspecialchars($row['Field']) ?>" class="text-capitalize fw-semibold my-3 mx-2"><?= htmlspecialchars($row['Field']) ?></label>
                            <input type="<?= $type ?>" name="<?= htmlspecialchars($row['Field']) ?>" placeholder="Enter" class="form-control p-2" >
                        </div>
                    <?php
                    } else if ($row['Field'] == 'hargaWeekend' || $row['Field'] == 'hargaWeekday') {
                        $type = 'number';
                    ?>
                        <div class="d-block mx-3 my-3">
                            <label for="<?= htmlspecialchars($row['Field']) ?>" class="text-capitalize fw-semibold my-3 mx-2"><?= htmlspecialchars($row['Field']) ?></label>
                            <input type="<?= $type ?>" name="<?= htmlspecialchars($row['Field']) ?>" placeholder="Enter" class="form-control p-2">
                        </div>
                    <?php
                    } else {
                        $type = 'text';
                    ?>
                        <div class="d-block mx-3 my-3">
                            <label for="<?= htmlspecialchars($row['Field']) ?>" class="text-capitalize fw-semibold my-3 mx-2"><?= htmlspecialchars($row['Field']) ?></label>
                            <input type="<?= $type ?>" name="<?= htmlspecialchars($row['Field']) ?>" placeholder="Enter" class="form-control p-2">
                        </div>
                <?php
                    }
                }
                ?>
                <div class="d-flex justify-content-around align-items-center my-5">
                    <button type="submit" class="btn btn-primary px-4 py-2">Ubah</button>
                    <a href="index.php" class="text-decoration-none">Kembali</a>
                </div>
            </div>
        </form>
</body>

</html>