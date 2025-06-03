<?php
session_start();
require_once('../server/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaPrimaryTabel = [
        'desdes' => 'nama',
        'tiket' => 'jenisTiket',
        'fasilitasumum' => 'id',
        'fasilitascombo' => 'id',
        'gamdes' => 'id'
    ];

    $numericPrimaryKeys = ['id']; // Kolom primary key bertipe numeric

    $tabel = $_POST['tabel'] ?? null;
    $id = $_POST['id'] ?? null;

    if (!$tabel || !isset($namaPrimaryTabel[$tabel])) {
        die("❌ Tabel tidak valid.");
    }

    if (!$id) {
        die("❌ ID tidak ditentukan.");
    }

    $primaryKey = $namaPrimaryTabel[$tabel];

    // Buat klausa WHERE sesuai tipe primary key (numeric atau string)
    if (in_array($primaryKey, $numericPrimaryKeys)) {
        $id = (int)$id; // cast ke int kalau numeric
        $whereClause = "`$primaryKey` = $id";
    } else {
        $id = mysqli_real_escape_string($connect, $id);
        $whereClause = "`$primaryKey` = '$id'";
    }

    $setClause = '';
    $first = true;

    foreach ($_POST as $key => $value) {
        if (in_array($key, ['tabel', 'id'])) {
            continue;
        }

        if (trim($value) === '') {
            continue;
        }

        // Escape string untuk query
        $escapedValue = mysqli_real_escape_string($connect, $value);

        if ($first) {
            $setClause .= "`$key` = '$escapedValue'";
            $first = false;
        } else {
            $setClause .= ", `$key` = '$escapedValue'";
        }
    }

    // Upload gambar, simpan binary langsung ke DB (tipe BLOB)
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $gambarData = file_get_contents($_FILES['gambar']['tmp_name']);
        $gambarEscaped = mysqli_real_escape_string($connect, $gambarData);
        if (!$first) {
            $setClause .= ", `gambar` = '$gambarEscaped'";
        } else {
            $setClause .= "`gambar` = '$gambarEscaped'";
            $first = false;
        }
    }

    if ($setClause === '') {
        die("❌ Tidak ada data yang diperbarui.");
    }

    $query = "UPDATE `$tabel` SET $setClause WHERE $whereClause";

    if (mysqli_query($connect, $query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "❌ Gagal update data: " . mysqli_error($connect);
    }
}
?>
