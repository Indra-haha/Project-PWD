<?php
session_start();
require_once('../server/koneksi.php');
$name = $_POST['nama'];
$nomor_hp = $_POST['nomor_hp'];

$username = $connect->real_escape_string($_POST['username']);
$password = $connect->real_escape_string($_POST['password']);
$confirm_password = $connect->real_escape_string($_POST['confirm_password']);
if ($password !== $confirm_password) {
    echo "<script>alert('Password tidak sama');</script>";
    echo "<script>window.location.href = '../registerUser.php';</script>";
    exit();
}
$queryChecking = "SELECT * FROM user WHERE username = '$username'";
$result = $connect->query($queryChecking);
if ($result->num_rows > 0) {
    echo "<script> alert('Username sudah terdaftar!'); 
    window.location.href='../ibarbo-park/loginUser.php';</script>";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $queryInsert = "INSERT INTO user (username, password, nama, telepon) VALUES ('$username', '$hashed_password', '$name', '$nomor_hp')";

    if ($connect->query($queryInsert) == TRUE) {
        echo "<script>alert('Registrasi berhasil, silahkan login');
        window.location.href='../ibarbo-park/loginUser.php';</script>";
    } else {
        echo "Error: " . $queryInsert . "<br>" . $connect->error;
    }
}

?>
