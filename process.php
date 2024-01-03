<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desa";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){
    die("koneksi gagal:".mysqli_connect_error());
}
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}
?>
