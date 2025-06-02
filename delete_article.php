<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: blog.php");
    exit;
}

$id = intval($_GET['id']);

// Hapus foto dari folder jika ada
$result = mysqli_query($conn, "SELECT foto FROM artikel WHERE id=$id");
if ($result && $row = mysqli_fetch_assoc($result)) {
    if (!empty($row['foto'])) {
        $fotoPath = __DIR__ . '/images/' . $row['foto'];
        if (file_exists($fotoPath)) {
            @unlink($fotoPath);
        }
    }
}

// Hapus artikel dari database
mysqli_query($conn, "DELETE FROM artikel WHERE id=$id");

header("Location: blog.php");
exit;
