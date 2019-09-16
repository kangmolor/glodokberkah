<?php
require 'functions.php';

if(isset($_POST["register"])){
    if(register() > 0){
        echo "<script>
        alert('Registrasi Berhasil!');
        document.location.href='login.php';
        </script>";
    }else{
        echo mysqli_error($conn);
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="signform">
<h1>Registrasi</h1>
    <form action="" method="post">

        <div class="signforminput">
        <div class="tooltip"><label for="username">Username:</label>
        <span class="tooltiptext">
            <ul>
                <li>Panjang username 6-12 karakter</li>
                <li>Hanya menggunakan huruf dan angka</li>
                <li>Huruf kecil semua</li>
            </ul>
        </span>
        </div>
        <input type="text" name="username" id="username" pattern="[0-9a-z]{1,}" minlength="6" maxlength="12" required>

        <div class="tooltip"><label for="password">Password:</label>
        <span class="tooltiptext">
            <ul>
                <li>Panjang password 6-32 karakter</li>
                <li>Hanya menggunakan huruf dan angka</li>
            </ul>
        </span>
        </div>
        <input type="password" name="password" id="password" pattern="[0-9a-zA-Z]{1,}" minlength="6" maxlength="32" required>

        <label for="password2">Konfirmasi password:</label>
        <input type="password" name="password2" id="password2" pattern="[0-9a-zA-Z]{1,}" minlength="6" maxlength="32" required>
        </div>

        <div class="sign-form-submit"><button type="submit" name="register">Register</button></div>

    </form>
    <div class="log"><a href="login.php">Login</a> | <a href="index.php">Home</a></div>
</div>
</body>
</html>