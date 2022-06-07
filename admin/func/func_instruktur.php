<?php
    $conn = mysqli_connect("localhost","root","","kohstore");

    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    function tambah($data){
        global $conn;
    
        $nama_instruktur =htmlspecialchars($data["nama_instruktur"]);
    
        $query = "INSERT INTO instruktur VALUES ('','$nama_instruktur')";
        mysqli_query($conn,$query);
    
        return mysqli_affected_rows($conn);
    }
    function edit($data){
        global $conn;
    
        $id_instruktur = $data["id"];
        $nama_instruktur =htmlspecialchars($data["nama_instruktur"]);

    
        $query = "UPDATE instruktur SET nama_instruktur = '$nama_instruktur' WHERE id_instruktur = $id_instruktur";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    
    }
    function hapus($id_instruktur){
        global $conn;
        mysqli_query($conn,"DELETE FROM instruktur WHERE id_instruktur=$id_instruktur");
    
        return mysqli_affected_rows($conn);
    }
?>  