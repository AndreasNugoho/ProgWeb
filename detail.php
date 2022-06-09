<?php
    require 'func/func.php';
    $id = $_GET['id'];
    $result = query("SELECT * FROM olahraga JOIN instruktur ON instruktur.id_instruktur = olahraga.id_instruktur WHERE id_olahraga = '$id'")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koh Fitness</title>
    <link rel="stylesheet" href="style_hitt.css">
</head>
<body>
    <header>
        <div class="header">
            <img src="img/header-baru-01.png" alt="">

                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
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

            <h3><?= $result["nama_olahraga"]; ?></h3>
            <div class="workout">
                <a href="hitt.html">
                    <img src="admin/img_upload/<?= $result["gambar"]; ?>" alt="Cinque Terre" class="gambar1" >
                </a>
            <div class="desc">
                <table>
                    <tr>
                        <td><b>Deskripsi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                        <td><?= $result["deskripsi"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Instruktur&nbsp;&nbsp;:</b></td>
                        <td><?= $result["nama_instruktur"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Level Olahraga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                        <td><?= $result["kesulitan"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Peralatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                        <td><?= $result["peralatan"]; ?></td>
                    </tr>
                </table>
                </div>
            </div>
            <h3>VIDEO</h4>
            <?php
                $i = 0;
                $video = $result['video'];
                $pecah = explode(",", $video);
            ?>
            <?php foreach ($pecah as $cek):
                $cek =  explode(",", $video);?>
                <div class="video">
                    <iframe src="<?php echo $cek[$i]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="desc_video"><?php echo $result["nama_olahraga"]." - ".$i; ?></div>
                </div>
            <?php    
                $i++;
            endforeach;?>
        </div>
    </content>


    <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer>
</body>
</html>