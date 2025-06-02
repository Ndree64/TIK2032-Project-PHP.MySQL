<?php
include 'db.php';

$judul = "Artikel Tidak Ditemukan";
$konten = "<p>Artikel yang dimaksud tidak tersedia.</p>";

// Ambil data berdasarkan ID dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM artikel WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $judul = htmlspecialchars($row['judul']);
        $konten = nl2br(htmlspecialchars($row['konten']));

        $konten = str_ireplace("apa itu SNBP?", "<strong>apa itu SNBP?</strong>", $konten);
        $konten = str_ireplace("Persyaratan SNBP", "<strong>Persyaratan SNBP</strong>", $konten);
        $konten = str_ireplace("Tahapan SNBP", "<strong>Tahapan SNBP</strong>", $konten);
        $konten = str_ireplace("Keunggulan SNBP", "<strong>Keunggulan SNBP</strong>", $konten);

        $konten = str_ireplace("Apa itu SNBT?", "<strong>Apa itu SNBT?</strong>", $konten);
        $konten = str_ireplace("Materi Ujian SNBT", "<strong>Materi Ujian SNBT</strong>", $konten);
        $konten = str_ireplace("Tips Sukses SNBT", "<strong>Tips Sukses SNBT</strong>", $konten);

        $konten = str_ireplace("Apa itu KIP-K?", "<strong>Apa itu KIP-K?</strong>", $konten);
        $konten = str_ireplace("Manfaat KIP-K", "<strong>Manfaat KIP-K</strong>", $konten);
        $konten = str_ireplace("Syarat Pendaftaran KIP-K", "<strong>Syarat Pendaftaran KIP-K</strong>", $konten);
        $konten = str_ireplace("Cara mendaftar KIP-K", "<strong>Cara mendaftar KIP-K</strong>", $konten);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - <?php echo $judul; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo $judul; ?></h1>
        <div>
            <a href="index.html">Home</a>
            <a href="gallery.html">Gallery</a>
            <a href="blog.php">Blog</a>
            <a href="contact.html">Contact</a>
        </div>
    </header>

    <main>
        <div class="reveal">
            <?php echo $konten; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Andre Immanuel Porayou. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
