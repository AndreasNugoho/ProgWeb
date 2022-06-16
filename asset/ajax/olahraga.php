<?php
    require '../../func/func.php';
    $keyword = $_GET['keyword'];
    $olahraga = query("SELECT * FROM olahraga JOIN instruktur ON instruktur.id_instruktur = olahraga.id_instruktur WHERE  nama_olahraga  LIKE '%$keyword%' OR nama_instruktur LIKE '%$keyword%' OR kesulitan LIKE '%$keyword%' ");
    // var_dump($olahraga);
?>
                <?php $i = 1;?>
                <?php foreach ($olahraga as $row):?>
                    <li class="thumb-wrap" id="container"><a href="detail.php?id=<?= $row["id_olahraga"];?>">
						<img class="thumb" src="admin/img_upload/<?= $row["gambar"]; ?>" alt="">
						<div class="thumb-info" >
                        <p class="thumb-title"><?= strtoupper($row["nama_olahraga"]); ?></p>
						<p class="thumb-user"><?= $row["kesulitan"]; ?></p>
						</div>
					</a></li>
                <?php $i++;?>
                <?php endforeach;?>
