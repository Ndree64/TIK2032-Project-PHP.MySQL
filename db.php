<?php
$host = "localhost";
$user = "root";        // Ganti sesuai konfigurasi
$password = "";        // Ganti sesuai konfigurasi
$database = "portofolio";  // Ganti sesuai nama database

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
