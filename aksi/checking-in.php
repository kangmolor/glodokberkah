<?php
session_start();
include '../functions.php';
$user = $_POST['username'];
$pass = $_POST['password'];

//pengecekan saat ingin masuk. admin or user.
$sqlcek = "SELECT * FROM admin where username = '$user'";
$query1 = mysqli_query($koneksi,$sqlcek);
$row = mysqli_fetch_array($query1);

if(isset($row['levelAdmin'])){
    $sql = "SELECT * from admin where username='$user' and password='$pass'";
}else{
    $sql = "SELECT * from user where username='$user' and password='$pass'";
}

$query = mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query) > 0){
    // cek admin atau bukan.
    $row = mysqli_fetch_array($query);
    if(isset($row['levelAdmin'])){
        if($row['levelAdmin'] == '1'){
            $_SESSION['admin'] = 'true';
            header('location:../dashboard/index.php');
        }
    }else if(isset($row['idUser'])){
        $_SESSION['username'] = $row['username'];
        $_SESSION['user'] = 'true';
        header('location:../profile/index.php');
    }
    $_SESSION['login_masuk'] = 'true';
}else{
    echo "gagal";
    var_dump($sql);
}
?>