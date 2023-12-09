<?php require("header.php") ?>

<body>

    <style>
        body {
            background: url(light.jpg);
            
            
            background-size: cover;
            background-repeat: no-repeat;
        }
        
        
        
    </style>
    <div class="transparent-form">
    <h2>Form Login</h2>
    <form action="login.php" method="post"  autocomplete="off">
        <label for="nim">nim:</label>
        <input type="text" name="nim" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
            <button type="submit" class="button">
                Login</button>
            <a href="daftar.php" class="secondary-button">
                Daftar</a>
        </form>

</body>

</html>
<?php

include "koneksi.php";

    // Tangkap data dari formulir
    $nim = $_POST['nim'] ?? 'none';
    $password = $_POST['password'] ?? 'none';

    // Cek keberadaan pengguna dalam database
    $sql = "SELECT * FROM users WHERE nim='$nim'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        // Pengguna ditemukan, verifikasi kata sandi
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])) {
            header("Location: home.php");
            exit();
        } else {
            if(isset($_POST['submit'])) {
                echo "Pengguna tidak ditemukan";
            }
        }
    } else {
        if(isset($_POST['submit'])) {
            echo "Pengguna tidak ditemukan";
        }
    }

?>