<?php
$host = "localhost";
$user = "root";        // Ganti sesuai konfigurasi
$password = "Andre123";        // Ganti sesuai konfigurasi
$database = "portfolio";  // Ganti sesuai nama database

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
