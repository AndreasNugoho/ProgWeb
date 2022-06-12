<?php
    require 'func/func.php';
    $result = query("SELECT * FROM olahraga");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koh Fitness</title>
    <link rel="stylesheet" href="sytle_workout.css">
</head>
<body>
    <header>
        <div class="header">
            <img src="img/header-baru-01.png" alt="">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                </ul>
                <div class="cari">
                    <table class="cariElemen">
                        <tr>
                            <td>
                                <input type="text" placeholder="search" class="cariKolom"> 
                            </td>
                        </tr>
                    </table>
                </div>
        </div>
    </header>
    <content>
        <div>
            <h3>WORKOUT</h3>
            <?php $i = 1;?>
            <?php foreach ($result as $row):?>
                <div class="workout">
                    <a href="detail.php?id=<?= $row["id_olahraga"];?>">
                    <img alt="1" src="admin/img_upload/<?= $row["gambar"]; ?>" class="gambar5"/>
                    <div class="desc"><?= $row['nama_olahraga'];?></div>
                </div>
            <?php $i++;?>
            <?php endforeach;?>
        </div>
    </content>

    <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer>
</body>
</html>
