<?php
    session_start();

    require 'func/func.php';



    if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT email FROM akun WHERE id_akun = $id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if( $key === hash('sha256', $row['email']) ) {
            $_SESSION['login'] = true;
        }
    }

    if( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    if( isset($_POST["login"]) ) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email'");
    
        // cek username
        if( mysqli_num_rows($result) === 1 ) {
    
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,$row['password'])){
                $_SESSION["login"] = true;

                if( isset($_POST['remember']) ) {
                    // buat cookie
                    setcookie('id', $row['id_akun'], time()+60000);
                    setcookie('key', hash('sha256', $row['email']), time()+60000);
                }
                header("Location: index.php");
                exit;
            }else{
                $error = true;
            }
        }else {
            $eror = true;
        }
    
    
    }


        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>userlogin</title>
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
    <content class="responsive-wrap">
        <h1>
            LOGIN AKUN
        </h1>
        <h3><a href="register.php">Daftar Akun</a></h3>
        <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">password salah</p>
        <?php endif; ?>
        <?php if( isset($eror) ) : ?>
        <p style="color: red; font-style: italic;">email tidak terdaftar</p>
        <?php endif; ?>
        <form action="" method="POST" >
            <label for="username" class="form-label">Email </label><br>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required><br>
            <label for="password" class="form-label">Password </label><br>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter username" required><br><br>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label><br>
            <button type="submit" name="login" id="login">Login</button>
        </form>
    </content>
</body>
</html>