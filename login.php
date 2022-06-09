<?php
        session_start();

    if( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    require 'func/func.php';

    if( isset($_POST["login"]) ) {
        extract($_POST);

        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email'");
    
        // cek username
        if( mysqli_num_rows($result) === 1 ) {
    
            // cek password
            $row = mysqli_fetch_assoc($result);
            var_dump($row);
            if (password_verify($password,$row['password'])){
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }else{
                $error = true;
            }
        }
    
    
    }


        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userlogin</title>
</head>
<body>
    <h1>
        LOGIN AKUN
    </h1>
    <h3><a href="register.php">Daftar Akun</a></h3>
    <?php if( isset($error) ) : ?>
	    <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>
    <form action="" method="POST" >
        <label for="username" class="form-label">Email </label><br>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required><br>
        <label for="password" class="form-label">Password </label><br>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required><br><br>
        <input type="checkbox" name="remember" id="remember">
		<label for="remember">Remember me</label><br>
        <button type="submit" name="login" id="login">Save</button>
    </form>
</body>
</html>