<?php
    session_start();
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
    <link rel="stylesheet" href="style_detail.css">
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
    <main class="responsive-wrap">
            <div class="judul">
                <h1>WORKOUT</h1>
            </div>
    <article class="post">
    <div>
        <div class="absolute-bg" style="background-image: url('admin/img_upload/<?= $result["gambar"]; ?>');"></div>
    </div>
    <div class="post-container">
        
        <div class="post-konten">
        <header>
            <time class="post-kesulitan"><?= $result["kesulitan"]; ?></time>
            <h1 class="post-nama"><?= $result["nama_olahraga"]; ?></h1>
        </header>
        <p class="post-text">Required: <?= $result["peralatan"];?></p>
        <p class="post-text"><?= $result["deskripsi"]; ?></p>
                <div class="article-author">
                    <div class="article-author-img">
                        <img src="https://assets.codepen.io/285131/author-3.png" />
                    </div>
                    <div class="article-author-info">
                        <dl>
                            <dt><?= $result["nama_instruktur"]?></dt>
                            <dt>Instruktur</dt>
                        </dl>
                    </div>
                </div>
            </div>
    </div>
    </article>
    <div class="judul">
        <h1>VIDEO</h1>
    </div>

        <?php
            ?>
            <?php if (isset($_SESSION['login'])):?>
                <main class="responsive-wrap">
                <article class="video-sec-wrap">
                    <div class="video-sec">
                        <ul class="video-sec-middle" id="vid-grid">
                            <?php 
                            $i = 0;
                            $video = $result['video'];
                            $pecah = explode(",", $video);
                            foreach ($pecah as $cek):
                            $cek =  explode(",", $video);?>

                                <li class="thumb-wrap">
                                <iframe src="<?php echo $cek[$i]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                                <div class="thumb-info">
                                    <!-- <p class="thumb-title"><?= strtoupper($row["nama_olahraga"]); ?></p> -->
                                    <p class="thumb-user"><?php echo $result["nama_olahraga"]." - ".$i;?></p>
                                </div>
                                </li>
                            <?php $i++;?>
                            <?php endforeach;?>

                        </ul>
                        </div>
                </article>
                </main>
            <?php else:?>
                <div class="judul-det">
                    <h1>ANDA BELUM LOGIN!!!</h1>
                </div>
            <?php endif;?>

    </main>
    </content>


    <!-- <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer> -->
</body>
</html>