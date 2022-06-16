<?php
    session_start();
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
    <link rel="stylesheet" href="style_coba.css">
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
                <a href="about.php" class="header-link">About</a>
                <?php if (isset($_SESSION['login'])):?>
                    <a href="logout.php" class="header-link header-link--button">Logout</a>
                <?php else:?>
                    <a href="login.php" class="header-link header-link--button">Login</a>
                <?php endif;?>
            </nav>
            
        </div>
            <div class="cari-container">
                <input class="cari-input" type="text" placeholder="Search" id="keyword">
            </div>            
    </header>
        <main class="responsive-wrap">
        <div class="judul">
            <h1>Workout</h1>
        </div>
        <article class="video-sec-wrap">
			<div class="video-sec">
				<ul class="video-sec-middle" id="vid-grid">

                    <?php $i = 1;?>
                    <?php foreach ($result as $row):?>

                        <li class="thumb-wrap"><a href="detail.php?id=<?= $row["id_olahraga"];?>">
						<img class="thumb" src="admin/img_upload/<?= $row["gambar"]; ?>" alt="">
						<div class="thumb-info">
							<p class="thumb-title"><?= strtoupper($row["nama_olahraga"]); ?></p>
                            <p class="thumb-user"><?= $row["kesulitan"]; ?></p>
						</div>
					    </a></li>
                    <?php $i++;?>
                    <?php endforeach;?>

				</ul>
                    <!-- <a href="workout.php" class="video-showmore">MORE WORKOUT </a> -->
                </div>
		</article>
        

        </div>
    </content>
            <script>
                function cek() {
                    alert("anda harus login!");
                }
            </script>
            <!-- <script href="asset/script.js"></script> -->
            <script src="asset/cari.js"></script>



    <!-- <footer>
        <a href="https://www.instagram.com/_khutut/" target="_blank">©2022 Koh Group Inc.</a>
    </footer> -->


</body>
</html>
