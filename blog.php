<?php include 'db.php'; ?>
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
            <!-- Tombol tambah artikel dipindah ke pojok kanan bawah -->
        </div>
        <div align="center">
        <?php
        $query = "SELECT * FROM artikel ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 0) {
            echo '<div style="color:#888;font-size:1.2em;margin:48px 0;">Tidak ada artikel yang tersedia</div>';
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<article style="position:relative;display:flex;align-items:flex-start;justify-content:center;gap:24px;max-width:600px;margin:auto;">';
                // Tombol menu edit/hapus (tiga titik) di pojok kanan atas card
                echo '<div style="position:absolute;top:12px;right:12px;z-index:2;">';
                echo '<div style="position:relative;display:inline-block;">';
                echo '<button onclick="toggleMenu(\'menu-'.$row['id'].'\')" style="background:none;border:none;cursor:pointer;padding:4px 8px;font-size:1.7em;line-height:1;color:#888;" title="Menu">&#8942;</button>';
                echo '<div id="menu-'.$row['id'].'" class="menu-dropdown" style="display:none;position:absolute;right:0;top:28px;background:#fff;border:1px solid #ddd;border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,0.08);min-width:120px;">';
                echo '<a href="edit_article.php?id=' . $row['id'] . '" style="display:block;padding:10px 16px;color:#333;text-decoration:none;border-bottom:1px solid #eee;">Edit</a>';
                echo '<a href="delete_article.php?id=' . $row['id'] . '" onclick="return confirmDelete(event, this);" style="display:block;padding:10px 16px;color:#dc3545;text-decoration:none;">Hapus</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                // Foto di kiri, format 1:1
                if (!empty($row['foto'])) {
                    echo '<div style="flex-shrink:0;width:200px;height:200px;overflow:hidden;border-radius:10px;background:#f3f3f3;display:flex;align-items:center;justify-content:center;">';
                    echo '<img src="images/' . htmlspecialchars($row['foto']) . '" alt="Foto Artikel" style="width:100%;height:100%;object-fit:cover;">';
                    echo '</div>';
                } else {
                    echo '<div style="flex-shrink:0;width:200px;height:200px;overflow:hidden;border-radius:10px;background:#e0e0e0;display:flex;align-items:center;justify-content:center;color:#aaa;font-size:2em;">&#128196;</div>';
                }
                // Preview artikel di kanan
                echo '<div class="reveal" style="flex:1;">';
                echo '<h2 style="margin-top:0;">' . htmlspecialchars($row['judul']) . '</h2>';
                echo '<p>' . htmlspecialchars(substr($row['konten'], 0, 150)) . '... ';
                echo '<a href="article.php?id=' . $row['id'] . '">Baca Selengkapnya</a></p>';
                echo '</div>';
                echo '</article><br>';
            }
        }
        ?>
        </div>
        <!-- Tombol tambah artikel mengambang di kanan bawah -->
        <a href="add_article.php" 
           style="position:fixed;right:32px;bottom:100px;width:56px;height:56px;display:flex;align-items:center;justify-content:center;background:#007bff;color:#fff;font-size:2.2em;border-radius:50%;box-shadow:0 2px 8px rgba(0,0,0,0.18);text-decoration:none;z-index:1000;transition:background 0.2s;"
           title="Tambah Artikel"
           onmouseover="this.style.background='#0056b3';"
           onmouseout="this.style.background='#007bff';">
            <span style="font-size:2em;line-height:1;">&#43;</span>
        </a>
        <script>
        function toggleMenu(id) {
            // Tutup semua menu lain
            document.querySelectorAll('.menu-dropdown').forEach(function(menu) {
                if (menu.id !== id) menu.style.display = 'none';
            });
            // Toggle menu yang diklik
            var el = document.getElementById(id);
            if (el) el.style.display = (el.style.display === 'block') ? 'none' : 'block';
        }
        // Tutup menu jika klik di luar
        document.addEventListener('click', function(e) {
            if (!e.target.matches('button[onclick^="toggleMenu"]')) {
                document.querySelectorAll('.menu-dropdown').forEach(function(menu) {
                    menu.style.display = 'none';
                });
            }
        });

        // Alert konfirmasi hapus yang lebih bagus dan benar
        function confirmDelete(event, link) {
            event.preventDefault();
            // Custom confirm dialog
            let wrapper = document.createElement('div');
            wrapper.innerHTML = `
                <div id="customConfirmOverlay" style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:2000;display:flex;align-items:center;justify-content:center;">
                    <div style="background:#fff;padding:32px 28px 24px 28px;border-radius:12px;box-shadow:0 4px 24px rgba(0,0,0,0.13);max-width:90vw;text-align:center;">
                        <div style="font-size:2.5em;color:#dc3545;margin-bottom:12px;">&#9888;</div>
                        <div style="font-size:1.15em;margin-bottom:18px;">Yakin ingin menghapus artikel ini?<br><span style='color:#888;font-size:0.95em;'>(Tindakan ini tidak dapat dibatalkan)</span></div>
                        <button id="btnConfirmYes" style="background:#dc3545;color:#fff;padding:8px 24px;border:none;border-radius:6px;font-size:1em;margin-right:12px;cursor:pointer;">Hapus</button>
                        <button id="btnConfirmNo" style="background:#eee;color:#333;padding:8px 24px;border:none;border-radius:6px;font-size:1em;cursor:pointer;">Batal</button>
                    </div>
                </div>
            `;
            document.body.appendChild(wrapper);

            document.getElementById('btnConfirmYes').onclick = function() {
                document.body.removeChild(wrapper);
                window.location.href = link.getAttribute('href');
            };
            document.getElementById('btnConfirmNo').onclick = function() {
                document.body.removeChild(wrapper);
            };
            return false;
        }
        </script>
        <hr>
    </main>
    <footer>
        <p align="center">&copy; 2025 Andre Immanuel Porayou. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
