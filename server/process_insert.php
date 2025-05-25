<?php
session_start();
require_once('../server/koneksi.php');
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPrimaryTabel = [
        'desdes' => 'kode',
        'tiket' => 'jenisTiket',
        'fasilitasUmum' => 'idFasilitas',
        'fasilitasCombo' => 'id',
        'gamdes' => 'id'
    ];
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_data = file_get_contents($gambar_tmp);
    
        // Prepare statement
        $stmt = $connect->prepare("INSERT INTO desdes (kode, nama, gambar, deskripsi) VALUES (?, ?, ?, ?)");
        
        // Bind parameters:
        // s = string (kode)
        // s = string (nama)
        // b = blob (gambar)
        // s = string (deskripsi)
        $stmt->bind_param("ssbs", $kode, $nama, $null, $deskripsi);
    
        // Kirim data blob secara manual ke parameter ke-3 (indeks 2)
        $stmt->send_long_data(2, $gambar_data);
    
        if ($stmt->execute()) {
            echo "<alert>Data berhasil disimpan.</alert>";
            header ('Location: index.php');
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        echo "Gambar belum diupload atau error.";
    }
}

?>
