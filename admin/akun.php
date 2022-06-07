<?php
    session_start();
    if( !isset($_SESSION["admin"]) ) {
        header("Location: index.php");
        exit;
    }
    require 'func/func_akun.php';
    $result = mysqli_query($conn, "SELECT * FROM akun");

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
    <a href="tambahAkun.php">tambah data akun</a><br>
    <a href="logout.php">keluar</a><br>
    <table border="1" cellspacing="">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                        <?php $i =1;?>
                        <?php foreach($result as $row):?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['namaDepan']." ".$row['namaDepan'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td>
                                <a href="editAkun.php?id=<?= $row["id_akun"];?>"><i></i>Edit</a> |
                                <a href="hapusAkun.php?id=<?= $row["id_akun"];?>" onclick="return confirm('yakin?');"><i></i>Hapus</a> |
                            </td>  
                        </td>
                        <?php $i++; ?>
                        <?php endforeach;?>
            </tr>
        </tbody>
    </table>
</body>
</html>