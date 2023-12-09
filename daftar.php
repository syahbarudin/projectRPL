<?php
error_reporting(E_ALL);
include_once "koneksi.php";

if (isset($_POST['submit']))
{
    

    $nim = $_POST['nim'] ?? 'none';
    $email = $_POST['email'] ?? 'none';
    $prodi = $_POST['prodi'] ?? 'none';
    $kelas = $_POST['kelas'] ?? 'none';
    $telp = $_POST['telp'] ?? 'none';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Masukkan data ke database
    $sql = "INSERT INTO users (nim, email, password, prodi, kelas, telp) 
    VALUES ('$nim', '$email', '$password', '$prodi', '$kelas', '$telp')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: ".$sql."<br>". $conn->error;
    }


}
?>
<?php require("header.php") ?>

<body>

    <style>
        body {
            background: url(neon.jpg);
            color: yellow;
            background-size: cover;
            background-repeat: no-repeat;
        }

    </style>
    <div class="transparent-form">
    <h2>Form Pendaftaran</h2>
    <form action="" method="post" autocomplete="off">
        <label for="nim">Nim:</label>
        <input type="text" name="nim" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <label for="prodi">Program Studi:</label>
        <input type="text" name="prodi" required>
        
        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" required>
        
        <label for="telp">No.Telp/HP:</label>
        <input type="text" name="telp" required>
        
        <button type="submit" class="button">Daftar</button>
    </form>
    

</body>

</html>

