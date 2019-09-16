<?php
session_start();
include '../../functions.php';
if(isset($_SESSION['admin'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo 'Anda tidak mengedit apapun <a href="index.php">Kembali!</a>';
    }
    $query = mysqli_query($koneksi,"select * from barang where id=$id");
    $row = mysqli_fetch_array($query);
    ?>
    <form action="../../aksi/crud/barang/edit.php" method="post">
        <input type="hidden" name="id" id="" value='<?= $row['id'] ?>' required>
        <input type="hidden" name="idbrg" id="" value='<?= $row['idBarang'] ?>' required>
        <label for="">nama</label>
        <input type="text" name="nama" id="" value='<?= $row['namaBarang'] ?>' required>
        <br>
        <label for="">kategori</label>
        <input type="text" name="kategori" id="" value='<?= $row['kategori'] ?>' required>
        <br>
        <label for="">merk</label>
        <input type="text" name="merk" id="" value='<?= $row['merk'] ?>' required>
        <br>
        <label for="">harga</label>
        <input type="number" name="harga" id="" value='<?= $row['harga'] ?>' required>
        <br>
        <label for="">stok</label>
        <input type="number" name="stock" id="" value='<?= $row['stock'] ?>' required>
        <br>
        <label for="">gamabr</label>
        <input type="text" name="gambar" id="" value='<?= $row['gambar'] ?>' required>
        <br>
        <label for="">deskripsi</label>
        <br>       
        <textarea name="deskripsi" id="" cols="30" rows="10" required>
        <?= $row['deskripsi'] ?>
        </textarea>
        <br>
        <button type="submit">submit</button>
    </form>

<?php 
} else { 
    echo 'Sesi kamu sudah habis, silakan login. <a href="login.php">Login!</a>';
} ?>