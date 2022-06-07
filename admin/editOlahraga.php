<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require "func/func_olahraga.php";
    $id = $_GET['id'];
    $id_ins = query("SELECT id_instruktur FROM olahraga WHERE id_olahraga = '$id'")[0];
    $instruktur = query("SELECT * FROM instruktur ");
    $result = query("SELECT * FROM olahraga WHERE id_olahraga = '$id'")[0];

    if (isset($_POST["submit"])){
        if (edit($_POST) > 0){
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
    <title>Edit Akun</title>
</head>
<body>
    <h1>Edit Olahraga</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $result["id_olahraga"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $result["gambar"]; ?>">
        <label for="nama_olahraga">Nama Olahraga</label><br>
        <input type="text" name="nama_olahraga" id="nama_olahraga" required value="<?= $result["nama_olahraga"]; ?>"><br><br>
        <select name="instruktur">
                    <option value="">- Pilih Nama Instruktur -</option>
                    <?php $i = 0; ?>
                    <?php foreach ($instruktur as $row):?>
                        <option value="<?php echo $row['id_instruktur']?>"<?php if($row['id_instruktur'] == $id_ins['id_instruktur']) echo 'selected="selected"'?>><?php echo $row['nama_instruktur']?></option>
                       
                    <?php $i++; ?>
                    <?php endforeach;?>        
                </select><br><br>
        <label for="video">Video </label><br>
        <input type="text" name="video" id="video" required placeholder="dalam bentuk link" value="<?= $result["video"]; ?>"><br>
        <label for="deskripsi">Deskripsi </label><br>
        <input type="text" name="deskripsi" id="deskripsi" required value="<?= $result["deskripsi"]; ?>"><br>
        <label for="durasi">Durasi </label><br>
        <input type="text" name="durasi" id="durasi" required value="<?= $result["durasi"]; ?>"><br>
        <label for="peralatan">Peralatan </label><br>
        <input type="text" name="peralatan" id="peralatan" required value="<?= $result["peralatan"]; ?>"><br>
        <label for="gambar">Gambar :</label> <br>
		<img src="img_upload/<?= $result['gambar']; ?>" width="40"> <br>
		<input type="file" name="gambar" id="gambar"><br><br>
        <select name="kesulitan" >
            <option value="">Pilih jenis kesulitan</option>
            <option value="Beginner" <?php if($result['kesulitan'] == 'Beginner'){echo 'selected="selected"';}?>>Beginner</option>
            <option value="Intermediate" <?php if($result['kesulitan'] == 'Intermediate'){echo 'selected="selected"';}?>>Intermediate</option>
            <option value="Advanced" <?php if($result['kesulitan'] == 'Advanced'){echo 'selected="selected"';}?>>Advanced</option>
        </select><br><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
</body>
</html>