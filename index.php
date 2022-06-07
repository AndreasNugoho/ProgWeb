<?php
    require 'func/func.php';
    $result = mysqli_query($conn, 'SELECT * FROM olahraga');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koh Fitness</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header">
            <img src="img/header-baru-01.png" alt="">
                <ul>
                    <li><a href="workout.html">WORKOUT</a></li>
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
        <h3>
            NEWS
        </h3>
        <div class="berita">
            <a href="https://health.detik.com/kebugaran/d-5909387/ingin-cantik-sampai-tua-catat-saran-sehat-anindita-hidayat" target="_blank">
                <img src="https://akcdn.detik.net.id/community/media/visual/2022/01/21/anindita-hidayat-7_169.jpeg?w=700&q=90" alt="foto_anin" class="gambar1">
            </a>
            <div class="desc">Ingin Cantik Sampai Tua? Catat Saran Sehat Anindita Hidayat</div>
        </div>
        <div class="berita">
            <a href="https://health.detik.com/kebugaran/d-5895442/weight-training-manfaat-dan-cara-melakukan-latihan-beban-yang-efektif" target="_blank">
                <img src="https://akcdn.detik.net.id/community/media/visual/2021/10/05/tempat-gym-kembali-beroperasi-1_169.jpeg?w=700&q=90" alt="Cinque Terre" class="gambar2">
            </a>
            <div class="desc">Weight Training: Manfaat dan Cara Melakukan Latihan Beban</div>
        </div>
        <div class="berita">
            <a href="https://www.viva.co.id/bola/liga-indonesia/1462455-persija-esports-resmi-didirikan-dengan-pembentukan-tim-valorant" target="_blank">
                <img src="https://thumb.viva.co.id/media/frontend/thumbs3/2022/03/31/6245029d4fb51-persija-esports-tim-valorant_1265_711.jpg" alt="Cinque Terre" class="gambar3">
            </a>
            <div class="desc">Persija Esports Resmi Didirikan dengan Pembentukan Tim Valorant</div>
        </div>

    </header>
    <content>
        <div>
        <h3>WORKOUT</h3>

        <?php $i = 1;?>
        <?php foreach ($result as $row):?>
            <div class="workout">
                <a href="detail.php?id=<?= $row["id_olahraga"];?>">
                <img alt="1" src="admin/img_upload/<?= $row["gambar"]; ?>" class="gambar3"/>
                <div class="desc"><?= $row['nama_olahraga'];?></div>
            </div>
        <?php $i++;?>
        <?php endforeach;?>
    </content>
            <div class="more"> 
                <a href="workout.html">MORE WORKOUT </a>
            </div>
    <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer>
</body>
</html>
