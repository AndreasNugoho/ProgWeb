<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require "func/func_akun.php";
    if (isset($_POST["submit"])){
        if (tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'akun.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'akun.php';
                </script>
            ";
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
</head>
<body>
    <h1>Isi Akun</h1>
    <form action="" method="POST">
        <label for="namaDepan">Nama Depan </label><br>
        <input type="text" name="namaDepan" id="namaDepan" required><br>
        <label for="namaBelakang">Nama Belakang </label><br>
        <input type="text" name="namaBelakang" id="namaBelakang" required><br>
        <label for="email">Email </label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password </label><br>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
</body>
</html>