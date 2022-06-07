<?php
    session_start();
    require 'func/func.php';
    if( isset($_SESSION["admin"]) ) {
        header("Location: akun.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ADMIN</title>
</head>
<body>
    <h1>
        LOGIN ADMIN
    </h1>
    <form action="" method="post">
        <label for="username" class="form-label">Username </label><br>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required><br>
        <label for="password" class="form-label">Password </label><br>
        <input type="password" name="password" id="username" class="form-control" placeholder="password" required><br><br>
        <button type="submit" name="submit" id="save">Save</button>
    </form>
    <?php
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ambil = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and password='$password'");
        if (mysqli_num_rows($ambil) ===1){
            $_SESSION['admin'] = mysqli_fetch_assoc($ambil);
            echo '<div class="alert alert-info">Login Sukses</div>';
            echo "<meta http-equiv='refresh' content='1; url=akun.php'>";
        }
    }
    ?>
</body>
</html>