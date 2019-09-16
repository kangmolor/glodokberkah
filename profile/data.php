<?php
session_start();
include '../functions.php';
$user = $_SESSION['username'];
$sql = "select * from user where username='$user'";
$query = mysqli_query($koneksi,$sql);
$row = mysqli_fetch_array($query);
?>
<form action="../aksi/crud/profile/data.php" method="post">
    <input type="hidden" name="id"  value="<?= $row['id'] ?>">
    <input type="hidden" name="iduser" value="<?= $row['idUser'] ?>">
    <input type="text" name="username" value="<?= $row['username'] ?>" disabled>
    <input type="nama" name="nama"  value="<?= $row['namaLengkap'] ?>">
    <input type="hidden" name="kode"  value="<?= $row['KodeAlamat'] ?>">
    <input type="date" name="tgllahir" value="<?= $row['tglLahir'] ?>">
    <select name="jk" id="" value="<?= $row['jenisKelamin'] ?>">
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
        
    </select>
    <input type="number" name="hp" id="" value="<?= $row['noHP'] ?>">
    <button type="submit">Simpan</button>
</form>