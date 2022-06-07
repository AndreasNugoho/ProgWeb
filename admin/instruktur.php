<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require 'func/func_instruktur.php';
    $result = query("SELECT * FROM instruktur");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="tambahInstruktur.php">tambah data instruktur</a>
<table border="1" cellspacing="">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Instruktur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                        <?php $i =1;?>
                        <?php foreach($result as $row):?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['nama_instruktur'];?></td>
                            <td>
                                <a href="editInstruktur.php?id=<?= $row["id_instruktur"];?>"><i></i>Edit</a> |
                                <a href="hapusInstruktur.php?id=<?= $row["id_instruktur"];?>" onclick="return confirm('yakin?');"><i></i>Hapus</a> |
                            </td>  
                        </td>
                        <?php $i++; ?>
                        <?php endforeach;?>
            </tr>
        </tbody>
    </table>
</body>
</html>