<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: blog.php");
    exit;
}

$id = intval($_GET['id']);
$message = '';

// Ambil data artikel
$result = mysqli_query($conn, "SELECT * FROM artikel WHERE id=$id");
if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: blog.php");
    exit;
}
$artikel = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $konten = mysqli_real_escape_string($conn, $_POST['konten']);
    $foto = $artikel['foto'];

    // Handle upload foto baru jika ada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "images/";
        $foto = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $foto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE artikel SET judul='$judul', konten='$konten', foto='$foto' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: blog.php");
        exit;
    } else {
        $message = "Gagal mengedit artikel: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container" style="max-width:1000px;margin:48px auto;">
        <div class="card" style="padding:48px 40px 36px 40px;">
            <h2 class="text-center">Edit Artikel</h2>
            <?php if ($message) echo "<p class='info'>$message</p>"; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" id="judul" name="judul" class="form-control" required value="<?php echo htmlspecialchars($artikel['judul']); ?>" style="font-size:1.35em;padding:20px;width:100%;">
                </div>
                <div class="form-group">
                    <label for="konten">Konten:</label>
                    <textarea id="konten" name="konten" rows="24" class="form-control" required style="font-size:1.15em;padding:20px;min-height:320px;width:100%;resize:vertical;"><?php echo htmlspecialchars($artikel['konten']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Foto (opsional):</label>
                    <?php if (!empty($artikel['foto'])): ?>
                        <div style="margin-bottom:8px;">
                            <img src="images/<?php echo htmlspecialchars($artikel['foto']); ?>" alt="Foto Artikel" style="max-width:120px;max-height:80px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
                </div>
                <div class="form-group text-center" style="margin-top:20px;">
                    <button type="submit" class="btn btn-primary" style="background:#007bff;border:none;padding:10px 28px;border-radius:6px;font-size:1em;transition:background 0.2s;box-shadow:0 2px 6px rgba(0,0,0,0.07);cursor:pointer;">
                        &#9998; Simpan Perubahan
                    </button>
                    <a href="blog.php" class="btn btn-secondary" style="background:#f44336;color:#fff;padding:10px 28px;border-radius:6px;font-size:1em;text-decoration:none;display:inline-block;margin-left:10px;transition:background 0.2s;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
                        &#10005; Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
