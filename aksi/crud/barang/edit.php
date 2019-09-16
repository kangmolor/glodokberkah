<?php
include '../../../functions.php';

$id = $_POST['id'];
$idbrg=$_POST['idbrg'];
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$merk=$_POST['merk'];
$harga=$_POST['harga'];
$stock=$_POST['stock'];
$gambar=$_POST['gambar'];
$deskripsi=$_POST['deskripsi'];

$sql = "update barang set idBarang='$idbrg',namaBarang='$nama',kategori='$kategori',merk='$merk',harga='$harga',stock='$stock',gambar='$gambar',deskripsi='$deskripsi' where id='$id' ";
$query = mysqli_query($koneksi,$sql);

if($query == true){
    echo 'Data barang telah berhasil diedit ke database! <a href="../../../dashboard/">Kembali!</a>';
}else{
    echo 'gagal';
    var_dump($sql);
}

?>