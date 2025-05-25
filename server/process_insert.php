<?php
session_start();
require_once('../server/koneksi.php');

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tabel = $_POST['tabel'];
    $kolom = [];
    $nilai = [];

    // Ambil data dari POST kecuali 'tabel', 'id', 'submit', dan 'gambar' (karena gambar di-handle file upload)
    foreach ($_POST as $key => $value) {
        if ($key != 'tabel' && $key != 'id' && $key != 'submit' && $key != 'gambar') {
            $kolom[] = "`" . $key . "`";
            $nilai[] = "'" . mysqli_real_escape_string($connect, $value) . "'";
        }
    }

    // Tangani upload file gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $gambarData = file_get_contents($_FILES['gambar']['tmp_name']);
        $gambarDataEscaped = mysqli_real_escape_string($connect, $gambarData);

        $kolom[] = "`gambar`";  // kolom BLOB di database
        $nilai[] = "'$gambarDataEscaped'";
    }

    // Susun query INSERT
    $kolomStr = implode(", ", $kolom);
    $nilaiStr = implode(", ", $nilai);
    $query = "INSERT INTO `$tabel` ($kolomStr) VALUES ($nilaiStr)";

    // Eksekusi query
    if (mysqli_query($connect, $query)) {
        // Redirect ke halaman index atau halaman lain setelah sukses
        header('Location: index.php');
        exit();
    } else {
        echo "❌ Gagal menyimpan data: " . mysqli_error($connect);
    }
}
?>
