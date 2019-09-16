<?php
session_start();
include '../functions.php';
$iduser = $_GET['user'];

$sql = "SELECT * FROM alamat_user where idUser='$iduser'";
$query = mysqli_query($koneksi,$sql);
$row = mysqli_fetch_array($query);

//kode kodeAlamat dinamis
$sqlkode = "select max(idUser) from user";
$query = mysqli_query($koneksi,$sqlkode);
$data = mysqli_fetch_array($query);

if($data){
    $nilai = substr($data[0],1);
    $kode = (int) $nilai;

    //tambahkan sebanyak +1
    $kode = $kode + 1;
    $kode_auto = "A" .str_pad($kode, 4, "0", STR_PAD_LEFT);
}else{
    $kode_auto = "A0001";
}
?>
<form action="../aksi/crud/profile/alamat.php" method="post">
    <input type="text" name="kode" id=""  value="<?= $kode_auto ?>" readonly>
    <input type="text" name="iduser" value="<?= $iduser ?>" readonly>
    <input type="text" name="provinsi" id=""  value="<?= $row['provinsi'] ?>">
    <input type="text" name="kota" id=""  value="<?= $row['kota'] ?>">
    <input type="text" name="kecamatan" id=""  value="<?= $row['kecamatan'] ?>">
    <input type="text" name="kelurahan" id=""  value="<?= $row['deskel'] ?>">
    <input type="number" name="kodepos" id=""  value="<?= $row['kodepos'] ?>">


    <button type="submit">Simpan!</button>
</form>