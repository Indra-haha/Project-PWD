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
<form action="process_edit.php" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap">
        <div class="d-flex justifity-content-start align-items-start flex-column">
            <?php
            $query = "DESC {$_POST['tabel']}";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['Field'] == 'id' || $row['Field'] == 'idFasilitas' || $row['Field'] == 'kode') {
                    $type = 'number';
                } else if ($row['Field'] == 'gambar') {
                    $type = 'file';
                } else if ($row['Field'] == 'deskripsi') {
                    $type = 'textarea';
                } else {
                    $type = 'text';
                }
            ?>
                <label for="<?= htmlspecialchars($row['Field']) ?>"><?= htmlspecialchars($row['Field']) ?></label>
                <input type="<?= $type ?>" name="<?= htmlspecialchars($row['Field']) ?>" placeholder="Enter" class="form-control">
            <?php
            }
            ?>
            <button type="submit">Ubah</button>
        </div>
    </form>
</body>
</html>