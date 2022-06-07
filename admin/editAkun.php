<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require "func/func_akun.php";
    $id = $_GET['id'];
    $result = query("SELECT * from akun where id_akun = $id")[0];
    if (isset($_POST["submit"])){
        if(edit($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'akun.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah!');
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
        <input type="hidden" name="id" value="<?= $result["id_akun"]; ?>">
        <label for="namaDepan">Nama Depan </label><br>
        <input type="text" name="namaDepan" id="namaDepan" required value="<?= $result["namaDepan"];?>"><br>
        <label for="namaBelakang">Nama Belakang </label><br>
        <input type="text" name="namaBelakang" id="namaBelakang" required value="<?= $result["namaBelakang"];?>"><br>
        <label for="email">Email </label><br>
        <input type="email" name="email" id="email" required value="<?= $result["email"];?>"><br>
        <label for="password">Password </label><br>
        <input type="text" name="password" id="password" required value="<?= $result["password"];?>"><br><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
</body>
</html>