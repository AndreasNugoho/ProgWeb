<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require "func/func_olahraga.php";
    $instruktur = query("SELECT * FROM instruktur");

    if (isset($_POST["submit"])){
        if (tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'olahraga.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'olahraga.php';
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
    <h1>Tambah Olahraga</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_olahraga">Nama Olahraga</label><br>
        <input type="text" name="nama_olahraga" id="nama_olahraga" required><br><br>
        <select name="instruktur">
                    <option value="">- Pilih Nama Instruktur -</option>
                    <?php $i = 0; ?>
                    <?php foreach ($instruktur as $row):?>
                        <option value="<?php echo $row['id_instruktur']?>"><?php echo $row['nama_instruktur']?></option>
                    <?php $i++; ?>
                    <?php endforeach;?>        
                </select><br><br>
        <label for="video">Video </label><br>
        <input type="text" name="video" id="video" required placeholder="dalam bentuk link"><br>
        <!-- <label for="deskripsi">Deskripsi </label><br>
        <input type="text" name="deskripsi" id="deskripsi" required><br> -->
        <label for="deskripsi">Deskripsi</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="20"></textarea><br>
        <label for="durasi">Durasi </label><br>
        <input type="text" name="durasi" id="durasi" required><br>
        <label for="peralatan">Peralatan </label><br>
        <input type="text" name="peralatan" id="peralatan" required><br>
        <label for="gambar">Gambar</label><br>
        <input type="file" name="gambar" id="gambar" required><br><br>
        <select name="kesulitan" >
                <option value="">Pilih jenis kesulitan</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
        </select><br><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
</body>
</html>