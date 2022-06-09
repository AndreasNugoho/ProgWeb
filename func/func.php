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
    function registrasi($data) {
        global $conn;
    
        $namaDepan = strtolower(stripslashes($data["namaDepan"]));
        $namaBelakang = strtolower(stripslashes($data["namaBelakang"]));
        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
    
        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT email FROM akun WHERE email = '$email'");
    
        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('email sudah terdaftar!')
                  </script>";
            return false;
        }
    
    
        // cek konfirmasi password
        // if( $password !== $password2 ) {
        //     echo "<script>
        //             alert('konfirmasi password tidak sesuai!');
        //           </script>";
        //     return false;
        // }
    
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO akun VALUES('', '$namaDepan','$namaBelakang','$email','$password')");
    
        return mysqli_affected_rows($conn);
    
    }

?>