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
                <h1><?= $result["nama_olahraga"]; ?></h1>
            </div>
        <div>
            <!-- <div class="workout">
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
            <main class="responsive-wrap">
            <div class="judul">
                <h1>Video</h1>
            </div>
            <div>

            <?php
                $i = 0;
                $video = $result['video'];
                $pecah = explode(",", $video);
            ?>
            <?php if (isset($_SESSION['login'])):?>
                belum
            <?php else:?>
                <?php foreach ($pecah as $cek):
                $cek =  explode(",", $video);?>
                <div class="video">
                    <iframe src="<?php echo $cek[$i]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="desc_video"><?php echo $result["nama_olahraga"]." - ".$i; ?></div>
                </div>
                <?php    
                $i++;
                endforeach;?>
            <?php endif;?>

        </div> -->
        <article class="post">
        <div>
            <div class="absolute-bg" style="background-image: url('admin/img_upload/<?= $result["gambar"]; ?>');"></div>
        </div>
        <div class="post__container">
            <span class="post__category">Koh Fitness</span>
            
            <div class="post__content">
            <header>
                <time class="post__time"><?= $result["kesulitan"]; ?></time>
                <h1 class="post__header"><span>Visiting</span> <span>the</span> <span>beach</span></h1>
            </header>
            
            <p class="post__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a augue justo. In mollis erat in elit tempus, feugiat luctus ex sollicitudin. Maecenas euismod tortor dolor, vel blandit augue aliquam sit amet. Vestibulum et eros mollis, laoreet nisi ac, condimentum sapien. Aliquam nec nunc enim.</p>
            </div>
            <div class="post__link">
            <a href="#">Older Posts</a>
            </div>
        </div>
        </article>
    </content>


    <!-- <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer> -->
</body>
</html>