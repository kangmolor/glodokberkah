<?php
session_start();
include '../functions.php';
if(empty($_SESSION['login_masuk'])){
    header('location:../login.php');
}
$sql = "select * from user where username='$_SESSION[username]' ";
$query = mysqli_query($koneksi,$sql);
$row = mysqli_fetch_array($query);
if(empty($row['namaLengkap']))
{
    echo 'Lengkapi data diri anda, <a href="data.php">disini</a>';
} 
else if(empty($row['kodeAlamat']))
 {?>
     <?= "Tips! simpan data alamat anda sebelum berbelanja."?> <a href="alamat.php?user=<?= $row['idUser'] ?>">disini</a>
 <?php } 


?>

<h1>Halo, <?= $_SESSION['username']; ?></h1>
<a href="../logout.php">logout</a>
<a href="data.php">Ubah Profile</a>
<a href="alamat.php?user=<?= $row['idUser'] ?>">Ubah Alamat</a>