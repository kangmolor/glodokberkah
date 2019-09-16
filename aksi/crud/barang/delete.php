<?php
session_start();
include '../../functions.php';
if(isset($_SESSION['admin'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo 'Anda tidak mengedit apapun <a href="index.php">Kembali!</a>';
    }

$sql = "delete from barang where id=$id ";
$query = mysqli_query($koneksi,$sql);

if($query == true){
    echo 'Data barang telah dihapus! <a href="index.php">Kembali!</a>';
}else{
    echo 'gagal';
    var_dump($sql);
}
} else { 
    echo 'Sesi kamu sudah habis, silakan login. <a href="../../login.php">Login!</a>';
} ?>

