<?php
    session_start();
    require 'func/func.php';
    $result = mysqli_query($conn, 'SELECT * FROM instruktur');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koh Fitness</title>
    <link rel="stylesheet" href="style_instruktur.css">
    <script href="asset/cek.js"></script>
    <script src="asset/cari.js"></script>


</head>
<body>
    <header class="header responsive-wrapper">
        <div class="header-left">
            <img src="img/desain mini proj-01.png" alt="" srcset="" width="270px" height="50%">	
        </div>
        <div class="header-middle">

        </div>
        <div class="header-right">
            <nav class="header-nav">
                <a href="index.php" class="header-link">Home</a>
                <a href="instruktur.php" class="header-link">Instruktur</a>
                <a href="about.php" class="header-link">About</a>
                <?php if (isset($_SESSION['login'])):?>
                    <a href="logout.php" class="header-link header-link--button">Logout</a>
                <?php else:?>
                    <a href="login.php" class="header-link header-link--button">Login</a>
                <?php endif;?>
            </nav>
            
        </div>
    </header>
    <content>
        <div class="judul">
            <h1>Instruktur</h1>
        </div>
        <?php $i = 1;?>
        <?php foreach ($result as $row):?>
            <div class="gallery">
                <div class="article-author">
                    <div class="article-author-img">
                        <img src="https://assets.codepen.io/285131/author-3.png" />
                    </div>
                    <div class="article-author-info">
                        <dl>
                            <dt><?= $row["nama_instruktur"]?></dt>
                        </dl>
                    </div>
                </div>
            </div>
        <?php $i++;?>
        <?php endforeach;?>
    </content>

            <!-- <script href="asset/script.js"></script> -->
            <script src="asset/cari.js"></script>



    <!-- <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer> -->


</body>
</html>
