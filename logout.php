
<?php
session_start();

if (isset($_SESSION['username'])) {
    // Hapus semua variabel sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Redirect ke halaman login atau halaman lain setelah logout
    header("Location: login.php");
    exit();
} else {
    // Jika tidak ada sesi, kembali ke halaman login
    header("Location: login.php");
    exit();
}

?>
