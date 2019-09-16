<?php
include '../../../functions.php';
session_start();
if(empty($_SESSION['user'])){
    header('location:../../../profile/');
}

$id = $_POST['id'];
$iduser = $_POST['iduser'];
$nama = $_POST['nama'];
$tgllahir = $_POST['tgllahir'];
$kode = $_POST['kode'];
$jk = $_POST['jk'];
$hp = $_POST['hp'];

$sql = "update user set 
    namaLengkap = '$nama',
    tglLahir = '$tgllahir',
    jenisKelamin = '$jk',
    noHP = '$hp' where id='$id'
";
$query = mysqli_query($koneksi,$sql);

if($query == true){
    echo 'Data barang telah berhasil diedit ke database! <a href="../../../profile/">Kembali!</a>';
}else{
    echo 'gagal';
    var_dump($sql);
}

?>