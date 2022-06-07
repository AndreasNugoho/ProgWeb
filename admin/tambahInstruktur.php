<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require "func/func_instruktur.php";
    if (isset($_POST["submit"])){
        if (tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'instruktur.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'instruktur.php';
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
    <h1>Tambah Instruktur</h1>
    <form action="" method="POST">
        <label for="nama_instruktur">Nama Instruktur </label><br>
        <input type="text" name="nama_instruktur" id="nama_instruktur" required><br><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
</body>
</html>