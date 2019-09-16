<?php 
$id = $_GET["no"];
include 'functions.php';
session_start();
if(empty($_SESSION['login'])){?>
    <a href="login.php">Login</a> or
    <a href="register.php">Register</a>
    
    <?php 
    } else {?>
    <a href="logout.php">Logout!</a>
    <?php } 
?>
