<?php
$username = "root";
$password = "1234";
$host = "localhost";
$database = "projectibarbo";

$connect = new mysqli($server, $username, $password, $database);

if($connect->connect_error)
{
    die ("koneksi gagal : ". $connect->connect_error);
}
// echo "koneksi berhasil";
?>