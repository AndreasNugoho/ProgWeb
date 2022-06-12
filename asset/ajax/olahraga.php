<?php
    require '../../func/func.php';
    $keyword = $_GET['keyword'];
    $olahraga = query("SELECT * FROM olahraga WHERE  nama_olahraga LIKE '%$keyword%'");

?>
                <?php $i = 1;?>
                <?php foreach ($olahraga as $row):?>
                    <div class="workout">
                        <a href="detail.php?id=<?= $row["id_olahraga"];?>">
                        <img alt="1" src="admin/img_upload/<?= $row["gambar"]; ?>" class="gambar3"/>
                        <div class="desc"><?= $row['nama_olahraga'];?></div>
                    </div>
                <?php $i++;?>
                <?php endforeach;?>
