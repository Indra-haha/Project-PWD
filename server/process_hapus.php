<?php
require_once('../server/koneksi.php');
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}
if ($_POST['tabel'] == 'desdes'){
    $kode = $_POST['kode'];
    $query2 = "DELETE FROM gamdes WHERE kode='$kode'";
    $query = "DELETE FROM desdes WHERE kode='$kode'";
    $result2 = mysqli_query($connect, $query2);
    $result = mysqli_query($connect, $query);
    if ($result && $result2) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
} else if ($_POST['tabel'] == 'tiket') {
    $jenisTiket = $_POST['jenisTiket'];
}

?>
