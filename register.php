<?php
    require 'func/func.php';
    if( isset($_POST["register"]) ) {

        if( registrasi($_POST) > 0 ) {
            echo "<script>
                    alert('user baru berhasil ditambahkan!');
                  </script>";
        } else {
            echo mysqli_error($conn);
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
</head>
<body>
    <h1>Daftar Akun</h1>
    <form action="" method="post" enctype="multipart/form">
        <label for="namaDepan">Nama Depan </label><br>
        <input type="text" name="namaDepan" id="namaDepan" placeholder="Nama Depan" required><br>
        <label for="namaBelakang">Nama Belakang </label><br>
        <input type="text" name="namaBelakang" id="namaBelakang" placeholder="Nama Depan" required><br>
        <label for="username">Email </label><br>
        <input type="email" name="email" id="email" placeholder="Email" required><br>
        <label for="password" >Confrim Password </label><br>
        <input type="password" placeholder="Password" id="password" name="password" required><span></span><br>
        <label for="confirm_password" >Confrim Password </label><br>
        <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required><br>
        <br><button type="submit" name="register">Daftar</button>
    </form>
    <script src="asset/cek.js" type="text/javascript"></script>


</body>
</html>