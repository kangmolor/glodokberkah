<?php
include '../../../functions.php';

$id=$_POST['id'];
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$merk=$_POST['merk'];
$harga=$_POST['harga'];
$stock=$_POST['stock'];
$gambar=$_POST['gambar'];
$deskripsi=$_POST['deskripsi'];

$sql = "insert into barang values('','$id','$nama','$kategori','$merk','$harga','$stock','$gambar','$deskripsi')";
$query = mysqli_query($koneksi,$sql);

if($query == true){
    echo 'Data barang telah berhasil di masukan ke database! <a href="../../../dashboard/">Kembali!</a>';
}else{
    echo 'gagal';
    var_dump($sql);
}

?>