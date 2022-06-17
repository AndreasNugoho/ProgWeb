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
    <link rel="stylesheet" href="asset/style_akun.css">
</head>
<body>

    <header class="header responsive-wrapper">
        <div class="header-left">
            <img src="../img/desain mini proj-01.png" alt="" srcset="" width="270px" height="50%">	
        </div>
        <div class="header-middle">

        </div>
        <div class="header-right">
            <nav class="header-nav">
                <a href="akun.php" class="header-link">Akun</a>
                <a href="instruktur.php" class="header-link">Instruktur</a>
                <a href="olahraga.php" class="header-link">Olahraga</a>
                <?php if (isset($_SESSION['login'])):?>                    
                    <a href="login.php" class="header-link header-link--button">Login</a>
                <?php else:?>
                    <a href="logout.php" class="header-link header-link--button">Logout</a>
                <?php endif;?>
            </nav>
            
        </div>
            <div class="cari-container">
                <input class="cari-input" type="text" placeholder="Search" id="keyword">
            </div>            
    </header>

    <!-- <table border="1" cellspacing="">
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
    </table> -->
    <div class="tambah">
        <a href="tambahAkun.php">tambah data</a>
    </div>
    <table class="table-fill">
        <thead>
        <tr>
            <th class="text-left">No</th>
            <th class="text-left">Nama Lengkap</th>
            <th class="text-left">Email</th>
            <th class="text-left">Password</th>
            <th class="text-left">Action</th>
        </tr>
        </thead>
        <tbody class="table-hover">
            <?php $i =1;?>
            <?php foreach($result as $row):?>
            <tr>
                <td class="text-left"><?php echo $i;?></td>
                <td class="text-left"><?php echo $row['namaDepan']." ".$row['namaDepan'];?></td>
                <td class="text-left"><?php echo $row['email'];?></td>
                <td class="text-left"><?php echo $row['password'];?></td>
                <td class="text-left">
                    <a href="editAkun.php?id=<?= $row["id_akun"];?>"><i></i>Edit</a> |
                    <a href="hapusAkun.php?id=<?= $row["id_akun"];?>" onclick="return confirm('yakin?');"><i></i>Hapus</a> |
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach;?>
        </tbody>
    </table>

</body>
</html>