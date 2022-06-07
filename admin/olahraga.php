<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require 'func/func_olahraga.php';
    $result = mysqli_query($conn, "SELECT * FROM olahraga INNER JOIN instruktur ON olahraga.id_instruktur = instruktur.id_instruktur");
    $arr = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Akun</title>
</head>
<body>
    <a href="tambahOlahraga.php">tambah data olahraga</a><br>
    <a href="olahraga.php">olahraga</a>
    <table border="1" cellspacing="">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Olahraga</th>
                <th>Nama instruktur</th>
                <th>video</th>
                <th>Deskripsi</th>
                <th>Durasi</th>
                <th>Peralatan</th>
                <th>Gambar</th>
                <th>Kesulitan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                        <?php $i =1;?>
                        <?php foreach($result as $row):?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['nama_olahraga'];?></td>
                            <td><?php echo $row['nama_instruktur'];?></td>
                            <td><?php echo $row['video'];?></td>
                            <td><?php echo $row['deskripsi'];?></td>
                            <td><?php echo $row['durasi'];?></td>
                            <td><?php echo $row['peralatan'];?></td>
                            <td><?php echo $row['gambar'];?></td>
                            <td><?php echo $row['kesulitan'];?></td>
                            <td>
                                <a href="editOlahraga.php?id=<?= $row["id_olahraga"];?>"><i></i>Edit</a> |
                                <a href="hapusOlahraga.php?id=<?= $row["id_olahraga"];?>" onclick="return confirm('yakin?');"><i></i>Hapus</a> |
                            </td>  
                        </td>
                        <?php $i++; ?>
                        <?php endforeach;?>
            </tr>
        </tbody>
    </table>
</body>
</html>