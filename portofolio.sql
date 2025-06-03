-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 01:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `konten`, `foto`) VALUES
(5, 'SNBP - Seleksi Masuk PTN Tanpa Tes Tertulis', 'apa itu SNBP?\r\n\r\nSeleksi Nasional Berdasarkan Prestasi (SNBP) adalah jalur seleksi masuk Perguruan Tinggi Negeri (PTN) di Indonesia yang tidak menggunakan tes tertulis, melainkan mempertimbangkan prestasi akademik dan non-akademik siswa selama di sekolah. SNBP menggantikan SNMPTN sebagai jalur seleksi undangan dan memberikan kesempatan bagi siswa berprestasi untuk melanjutkan pendidikan ke jenjang yang lebih tinggi.\r\n\r\nPersyaratan SNBP\r\n1. Siswa kelas 12 yang akan lulus pada tahun berjalan.\r\n2. Memiliki nilai rapor yang konsisten.\r\n3. Setiap sekolah memiliki kuota tertentu berdasarkan akreditasi sekolah.\r\n4. Siswa yang pernah mengulang di tingkat sekolah menengah atas tidak diperbolehkan mengikuti SNBP.\r\n5. Untuk jurusan seni dan olahraga, siswa harus mengunggah portofolio sesuai ketentuan (jika diperlukan).\r\n\r\nTahapan SNBP\r\n1. Sekolah melakukan pemeringkatan berdasarkan nilai akademik dan mempertimbangkan prestasi lain.\r\n2. Siswa yang memenuhi kriteria mendaftar melalui portal resmi SNPMB.\r\n3. Siswa dapat memilih hingga dua program studi di PTN yang berbeda atau sama.\r\n4. Hasil seleksi diumumkan berdasarkan evaluasi oleh PTN yang dituju.\r\n\r\nKeunggulan SNBP\r\n1. Siswa tidak perlu mengikuti ujian tertulis sehingga dapat lebih fokus pada prestasi akademik.\r\n2. Memberikan apresiasi bagi siswa yang memiliki rekam jejak akademik dan non-akademik yang baik.\r\n3. Membantu siswa untuk mendapatkan kepastian lebih cepat terkait perguruan tinggi yang dituju.\r\n\r\nDengan memahami SNBP, siswa dapat mempersiapkan diri lebih baik untuk mendapatkan peluang masuk PTN favorit mereka.', 'snbp.png'),
(6, 'SNBT - Seleksi Nasional Berbasis Tes', 'Apa Itu SNBT?\r\nSeleksi Nasional Berbasis Tes (SNBT) adalah salah satu jalur seleksi masuk Perguruan Tinggi Negeri (PTN) yang diselenggarakan oleh pemerintah melalui Lembaga Tes Masuk Perguruan Tinggi (LTMPT). SNBT menggantikan sistem Seleksi Bersama Masuk Perguruan Tinggi Negeri (SBMPTN) dengan beberapa perubahan signifikan, terutama dalam materi tes dan sistem penilaian. SNBT dirancang untuk lebih mengukur potensi dan kemampuan kognitif peserta, bukan hanya pengetahuan akademik semata.\r\n\r\nMateri Ujian SNBT\r\n1. Tes Potensi Skolastik (TPS)\r\n   - Penalaran Umum\r\n   - Pemahaman Bacaan dan Menulis\r\n   - Pengetahuan dan Pemahaman Umum\r\n   - Pengetahuan Kuantitatif\r\n2. Tes Literasi\r\n   - Literasi dalam Bahasa Indonesia\r\n   - Literasi dalam Bahasa Inggris\r\n3. Penalaran Matematika\r\n\r\nTips Sukses Menghadapi SNBT\r\n1. Rutin berlatih soal-soal TPS untuk meningkatkan kemampuan logika dan penalaran.\r\n2. Perbanyak membaca untuk memperkuat kemampuan literasi, baik dalam Bahasa Indonesia maupun Bahasa Inggris.\r\n3. Kuasai konsep dasar matematika untuk menghadapi soal penalaran matematika.\r\n4. Ikuti try out SNBT secara berkala untuk mengukur kesiapan dan membiasakan diri dengan format ujian.\r\n5. Kelola waktu belajar dan saat ujian dengan baik agar lebih efisien dan tidak panik.\r\n\r\nSNBT adalah kesempatan emas untuk meraih impian kuliah di PTN favoritmu. Dengan persiapan yang matang dan strategi yang tepat, kamu bisa menghadapi SNBT dengan penuh percaya diri. Selamat belajar dan semoga sukses! 💪', 'snbt.png'),
(7, 'KIPK - Kartu Indonesia Pintar Kuliah ', 'Apa Itu KIP-K?\r\nKartu Indonesia Pintar Kuliah (KIP-K) adalah program bantuan biaya pendidikan dari pemerintah yang ditujukan bagi mahasiswa berprestasi namun memiliki keterbatasan ekonomi. Tujuan utama dari KIP-K adalah memastikan bahwa setiap anak Indonesia memiliki kesempatan yang sama untuk menempuh pendidikan tinggi tanpa terhalang oleh masalah biaya.\r\n\r\nManfaat KIP-K\r\n1. Pembiayaan Kuliah Penuh\r\nPenerima KIP-K akan mendapatkan pembiayaan kuliah secara penuh hingga lulus, sesuai ketentuan yang berlaku.\r\n2. Bantuan Biaya Hidup\r\nMahasiswa juga akan menerima bantuan biaya hidup yang besarannya disesuaikan dengan wilayah tempat mereka menempuh pendidikan.\r\n3. Berlaku di PTN dan PTS\r\nKIP-K dapat digunakan di Perguruan Tinggi Negeri (PTN) maupun Perguruan Tinggi Swasta (PTS) yang telah bekerja sama dengan pemerintah.\r\n\r\nSyarat Pendaftaran KIP-K\r\n1. Merupakan lulusan SMA/SMK/MA tahun berjalan atau maksimal dua tahun sebelumnya.\r\n2. Berasal dari keluarga kurang mampu, dibuktikan dengan:\r\n   - Terdaftar dalam Data Terpadu Kesejahteraan Sosial (DTKS), atau\r\n   - Memiliki bukti kondisi ekonomi lainnya yang sah dan valid.\r\n3. Telah diterima di perguruan tinggi (PTN atau PTS) melalui jalur SNBP, SNBT, atau seleksi mandiri.\r\n4. Melampirkan dokumen pendukung seperti:\r\n   - Kartu Keluarga (KK)\r\n   - KTP\r\n   - Bukti penghasilan orang tua/wali\r\n\r\nCara Mendaftar KIP-K\r\n1. Daftar melalui situs resmi KIP-K\r\nAkses laman pendaftaran resmi dan buat akun.\r\n2. Isi data lengkap\r\nMasukkan data pribadi, akademik, dan kondisi ekonomi secara benar dan jujur.\r\n3. Proses validasi oleh pemerintah\r\nData yang telah diinput akan diverifikasi oleh sistem dan pihak berwenang.\r\n4. Pengumuman hasil seleksi\r\nJika lolos, mahasiswa akan mendapatkan bantuan KIP-K dan dapat menggunakannya untuk membiayai perkuliahan.\r\n\r\nKIP-K adalah solusi nyata bagi calon mahasiswa dari keluarga kurang mampu untuk tetap bisa melanjutkan pendidikan tinggi. Dengan adanya program ini, keterbatasan ekonomi tidak lagi menjadi penghalang bagi mahasiswa yang memiliki semangat dan prestasi.\r\n\r\nJika kamu memenuhi syarat, jangan ragu untuk mendaftar!\r\nManfaatkan kesempatan ini untuk meraih masa depan yang lebih cerah. ✨🎓', 'kipk.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
