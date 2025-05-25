<?php
session_start();
require_once('../server/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPrimaryTabel = [
        'desdes' => 'kode',
        'tiket' => 'id',
        'fasilitasUmum' => 'idFasilitas',
        'fasilitasCombo' => 'id',
        'gamdes' => 'id'
    ];

    if (!isset($_POST['tabel']) || !array_key_exists($_POST['tabel'], $namaPrimaryTabel)) {
        die("❌ Invalid table specified.");
    }


    if (!isset($_POST['idStrong'])) {
        die("❌ No ID specified for update.");
    }

    $setParts = [];
    foreach ($_POST as $key => $value) {
        if ($key !== 'tabel' && $key !== 'id' && $value !== null) {
            $safeKey = mysqli_real_escape_string($connect, $key);
            $safeValue = mysqli_real_escape_string($connect, $value);
            $setParts[] = "`$safeKey` = '$safeValue'";
            $setClause = implode(", ", $setParts);
        }
    }

    if (empty($setParts)) {
        die("❌ No data to update.");
    }

    $setClause = implode(", ", $setParts);

    $query = "UPDATE {$_POST['tabel']} SET $setClause WHERE {$namaPrimaryTabel[$_POST['tabel']]} = '{$_POST['idStrong']}'";

    if (mysqli_query($connect, $query)) {
        header('Location: index.php');
        exit;
    } else {
        echo "❌ Gagal memperbarui data: " . mysqli_error($connect);
    }
}
