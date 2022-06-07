<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require "func/func_instruktur.php";
    $id = $_GET['id'];
    $result = query("SELECT * from instruktur where id_instruktur = $id")[0];
    if (isset($_POST["submit"])){
        if(edit($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'instruktur.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah!');
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
    <title>Edit Instruktur</title>
</head>
<body>
    <h1>Edit Instruktur</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $result["id_instruktur"]; ?>">
        <label for="nama_instruktur">Nama Instruktur</label><br>
        <input type="text" name="nama_instruktur" id="nama_instruktur" required value="<?= $result["nama_instruktur"];?>"><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
</body>
</html>