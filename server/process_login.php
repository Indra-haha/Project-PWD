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
        if($row['role'] == 'admin'){
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = true;
            echo "<script>alert('Login berhasil');</script>";
            header ('Location: ../server/');
        } else {
            $_SESSION['role'] = 'user';
            echo "<script>alert('Fitur Pemesanan Segera Datang!!!');</script>";
            header ('Location: ../ibarbo-park/ticket.php');
        }
    } else {
        echo "<script>alert('Password salah');</script>";
        header ('Location: ../ibarbo-park/loginUser.php');
    }
} else {
    echo "<script>alert('Username tidak terdaftar');</script>";
    header ('Location: ../ibarbo-park/loginUser.php');
}
?>