<?php
session_start();
require_once('../server/koneksi.php');
$username = $connect->real_escape_string($_POST['username']);
$password = $connect->real_escape_string($_POST['password']);
$query = "SELECT * FROM user WHERE username = '$username'";
$result = $connect->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_name('loginUser');
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['telepon'] = $row['telepon'];
        if ($row['role'] == 'admin') {
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = true;
            echo "<script>alert('Login berhasil');</script>";
            header('Location: ../server/');
        } else {
            echo "<script>alert('Fitur Pemesanan Segera Datang!!!');
        window.location.href='../ibarbo-park/ticket.php';</script>";
        }
    } else {
        echo "<script>alert('Ups ID dan Password salah :(');
        window.location.href='../ibarbo-park/loginUser.php';</script>";
    }
} else {
    echo "<script>alert('Ups Username tidak ditemukan :(');
        window.location.href='../ibarbo-park/loginUser.php';</script>";
}
