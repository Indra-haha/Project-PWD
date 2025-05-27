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
    <div class="m-auto d-flex justify-content-center mt-5 " >
        <form action="process_insert.php" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap border py-3 px-5 rounded-3">
            <div class="d-flex justifity-content-start align-items-start flex-column">
                <input type="hidden" name="tabel" value="<?= htmlspecialchars($_POST['tabel']) ?>">
                <?php
                $query = "DESC {$_POST['tabel']}";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['Field'] == 'id' || $row['Field'] == 'kode') {
                        $type = 'number';
                    } else if ($row['Field'] == 'gambar') {
                        $type = 'file';
                    } else if ($row['Field'] == 'deskripsi') {
                        $type = 'textarea';
                    } else {
                        $type = 'text';
                    }
                ?>
                    <label for="<?= htmlspecialchars($row['Field']) ?>" class="mb-2 mt-3 mx-2 text-capitalize"><?= htmlspecialchars($row['Field']) ?></label>
                    <input type="<?= $type ?>" name="<?= htmlspecialchars($row['Field']) ?>" placeholder="Enter" class="form-control p-2" required>
                <?php
                }
                ?>
                <div class="d-flex my-5 jutify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary px-3 py-2 mx-5">Insert</button>
                    <a href="index.php" class="text-decoration-none ">Kembali</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>