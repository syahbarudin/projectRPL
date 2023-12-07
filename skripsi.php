<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
    

    // Proses unggahan berkas
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Cek apakah berkas sudah ada
    if (file_exists($targetFile)) {
        echo "Mohon maaf, berkas sudah ada.";
        $uploadOk = 0;
    }

    // Batasi tipe berkas yang diizinkan (contoh: pdf, doc, docx)
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "Hanya berkas PDF, DOC, dan DOCX yang diizinkan.";
        $uploadOk = 0;
    }

    // Cek ukuran berkas (contoh: maksimal 5 MB)
    if ($_FILES["file"]["size"] > 5000000) {
        echo "Ukuran berkas terlalu besar. Maksimal 5 MB.";
        $uploadOk = 0;
    }

    // Proses unggah jika semua syarat terpenuhi
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // Simpan informasi ke database
            $sql = "INSERT INTO files (name, file_path) VALUES ('$name', '$targetFile')";
            $conn->exec($sql);
            echo "Berkas berhasil diunggah dan informasi disimpan ke database.";
        } else {
            echo "Terjadi kesalahan saat mengunggah berkas.";
        }
    }
}

// Tutup koneksi
$conn = null;
?>
<?php require("header.php") ?>
<body>
    <div class="form-table">
    <h2>Upload File</h2>
    <form action="skripsi.php" method="post" enctype="multipart/form-data">
        
        <label for="file">Unggah Berkas:</label>
        <input type="file" name="file" accept=".pdf, .doc, .docx">

        <button type="submit" name="submit" class="button">Unggah</button>
    </form>
</body>
</html>
