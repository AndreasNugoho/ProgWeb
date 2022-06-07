<?php
    $conn = mysqli_connect("localhost","root","","kohstore");

    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_array($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
    
        $nama_olahraga = htmlspecialchars($data['nama_olahraga']);
        $id_instruktur = htmlspecialchars($data['instruktur']);
        $video = htmlspecialchars($data['video']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $durasi = htmlspecialchars($data['durasi']);
        $peralatan = htmlspecialchars($data['peralatan']);
        // $gambar = htmlspecialchars($data['gambar']);
        $kesulitan = htmlspecialchars($data['kesulitan']);
        
        $gambar = upload();
        if( !$gambar ) {
            return false;
        }
    
        $query = "INSERT INTO olahraga VALUES('','$nama_olahraga','$id_instruktur','$video','$deskripsi','$durasi','$peralatan','$gambar','$kesulitan')";
        mysqli_query($conn,$query);
    
        return mysqli_affected_rows($conn);
    }

    function upload() {

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
    
        // cek apakah tidak ada gambar yang diupload
        if( $error === 4 ) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                  </script>";
            return false;
        }
    
        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
                  </script>";
            return false;
        }
    
        // cek jika ukurannya terlalu besar
        if( $ukuranFile > 10000000 ) {
            echo "<script>
                    alert('ukuran gambar terlalu besar!');
                  </script>";
            return false;
        }
    
        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = $namaFile;
        //$namaFileBaru .= '.';
        //$namaFileBaru .= $ekstensiGambar;
    
        move_uploaded_file($tmpName, 'img_upload/' . $namaFileBaru);
    
        return $namaFileBaru;
    }
    function edit($data){
        global $conn;
    
        $id_olahraga = $data["id"];
        $nama_olahraga = htmlspecialchars($data['nama_olahraga']);
        $id_instruktur = htmlspecialchars($data['instruktur']);
        $video = htmlspecialchars($data['video']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $durasi = htmlspecialchars($data['durasi']);
        $peralatan = htmlspecialchars($data['peralatan']);
        $kesulitan = htmlspecialchars($data['kesulitan']);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        if( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }
    
        $query = "UPDATE olahraga SET nama_olahraga = '$nama_olahraga',id_instruktur = '$id_instruktur',video = '$video',deskripsi = '$deskripsi',durasi = '$durasi',peralatan = '$peralatan',gambar = '$gambar',kesulitan = '$kesulitan' WHERE id_olahraga = $id_olahraga";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    
    }
    function hapus($id_olahraga){
        global $conn;
        mysqli_query($conn,"DELETE FROM olahraga WHERE id_olahraga=$id_olahraga");
    
        return mysqli_affected_rows($conn);
    }
?>