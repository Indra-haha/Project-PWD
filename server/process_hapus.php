<?php
require_once('../server/koneksi.php');
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: ../ibarbo-park/index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPrimaryTabel = [
        'desdes' => 'kode',
        'tiket' => 'jenisTiket',
        'fasilitasUmum' => 'idFasilitas',
        'fasilitasCombo' => 'id',
        'gamdes' => 'id'
    ];
    $query = "DELETE FROM {$_POST['tabel']} WHERE {$namaPrimaryTabel[$_POST['tabel']]} = '{$_POST['id']}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
}