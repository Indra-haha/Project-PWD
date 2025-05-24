<?php
session_start();
require_once('../server/koneksi.php');

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode']; // Tambahkan input ini di form HTML
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_data = file_get_contents($gambar_tmp);

        $stmt = $connect->prepare("UPDATE desdes SET nama = ?, gambar = ?, deskripsi = ? WHERE kode = ?");
        $stmt->bind_param("sbss", $nama, $null, $deskripsi, $kode);
        $null = null; // diperlukan untuk placeholder blob
        $stmt->send_long_data(1, $gambar_data);

        if ($stmt->execute()) {
            header('Location: admin.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {

        $stmt = $connect->prepare("UPDATE desdes SET nama = ?, deskripsi = ? WHERE kode = ?");
        $stmt->bind_param("sss", $nama, $deskripsi, $kode);

        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
