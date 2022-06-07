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
    
        $namaDepan =htmlspecialchars($data["namaDepan"]);
        $namaBelakang =htmlspecialchars($data["namaBelakang"]);
        $email =htmlspecialchars($data["email"]);
        $password =htmlspecialchars($data["password"]);
    
        $query = "INSERT INTO akun VALUES ('','$namaDepan','$namaBelakang','$email','$password')";
        mysqli_query($conn,$query);
    
        return mysqli_affected_rows($conn);
    }
    function edit($data){
        global $conn;
    
        $id_akun = $data["id"];
        $namaDepan =htmlspecialchars($data["namaDepan"]);
        $namaBelakang =htmlspecialchars($data["namaBelakang"]);
        $email =htmlspecialchars($data["email"]);
        $sandi =htmlspecialchars($data["password"]);
    
        $query = "UPDATE akun SET namaDepan = '$namaDepan',namaBelakang = '$namaDepan',email = '$email',password = '$sandi' WHERE id_akun = $id_akun";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    
    }
    function hapus($id_akun){
        global $conn;
        mysqli_query($conn,"DELETE FROM akun WHERE id_akun=$id_akun");
    
        return mysqli_affected_rows($conn);
    }
?>