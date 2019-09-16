<?php
session_start();
include '../../../functions.php';
$kode = $_POST['kode'];
$iduser = $_POST['iduser'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$kecamatan = $_POST['kecamatan'];
$desa = $_POST['desa'];
$kodepos = $_POST['kodepos'];

$sql = "update alamat_user set
    kodeAlamat = '$kode',
    idUser =    '$iduser',
    provinsi = '$provinsi',
    kota = '$kota',
    kecamatan = '$kecamatan',
    deskel = '$desa',
    kodepos = '$kodepos'
";

$query = mysqli_query($koneksi,$sql);

if($query == true){
    echo 'Data barang telah berhasil diedit ke database! <a href="../../../profile/">Kembali!</a>';
}else{
    echo 'gagal';
    var_dump($sql);
}
?>
