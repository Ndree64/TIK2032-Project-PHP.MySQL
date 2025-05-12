<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Personal Portfolio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1 align="center">Blog</h1>
        <hr>
        <div align="center">
            <a href="index.html">Home</a>
            <a href="gallery.html">Gallery</a>
            <a href="blog.php">Blog</a>
            <a href="contact.html">Contact</a>
        </div>
    </header>
    <main>
        <br>
        <div align="center">
        <?php
        $query = "SELECT * FROM artikel ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<article>';
            echo '<div class="reveal">';
            echo '<h2>' . htmlspecialchars($row['judul']) . '</h2>';
            echo '<p>' . htmlspecialchars(substr($row['konten'], 0, 150)) . '... ';
            echo '<a href="artikel.php?id=' . $row['id'] . '">Baca Selengkapnya</a></p>';
            echo '</div>';
            echo '</article><br>';
        }
        ?>
        </div>
        <hr>
    </main>
    <footer>
        <p align="center">&copy; 2025 Andre Immanuel Porayou. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
