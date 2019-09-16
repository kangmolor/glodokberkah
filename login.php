<?php
session_start();

require 'functions.php';
if(isset($_SESSION['login'])){
    header("Location:index.php");
}

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            // membuat session
            $_SESSION["login"] = true;

            header("Location:index.php");
            exit;
        }
    }$error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/G.png" type="image/gif" sizes="16x16">
</head>
<body>
    <div class="signform">
    <h1>Login</h1>
    <?php
    if(isset($error)):?>
    <div class="notice">Username / Password SALAH!!!</div>
    <?php endif;?>
    <form action="" method="post">
        <div class="signforminput">
            <label for="username">Pusername :</label>
            <input class="info" type="text" name="username" id="username" pattern="[0-9a-z]{1,}" required>

            <label for="password">Password :</label>
            <input type="password" name="password" id="password" pattern="[0-9a-z]{1,}" required>
        </div>

        <div class="sign-form-submit"><button type="submit" name="submit">Login</button></div>
    </form>
    <div class="log"><a href="register.php">Register</a> | <a href="index.php">Home</a></div>
</div>
</body>
</html>