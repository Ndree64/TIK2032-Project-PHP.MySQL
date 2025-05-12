<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID artikel tidak ditemukan.");
}

$id = intval($_GET['id']);
$query = "SELECT * FROM artikel WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 0) {
    die("Artikel tidak ditemukan.");
}

$artikel = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= htmlspecialchars($artikel['judul']) ?> - Blog</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
<header>
  <h1 align="center"><?= htmlspecialchars($artikel['judul']) ?></h1>
  <hr>
  <div align="center">
    <a href="index.html">Home</a>
    <a href="gallery.html">Gallery</a>
    <a href="blog.php" class="active">Blog</a>
    <a href="contact.html">Contact</a>
  </div>
</header>

<main>
  <article>
    <p><small>Dipublikasikan: <?= date('d M Y', strtotime($artikel['tanggal'])) ?></small></p>
    <p><?= nl2br(htmlspecialchars($artikel['konten'])) ?></p>
  </article>
</main>

<footer>
  <p align="center">&copy; 2025 Andre Immanuel Porayou. All rights reserved.</p>
</footer>
<script src="script.js"></script>
</body>
</html>
