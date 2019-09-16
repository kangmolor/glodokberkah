<?php
session_start();
include '../../functions.php';
if(isset($_SESSION['admin'])){
    ?>
<a href="add.php">add</a>
<table border='1'>
    <thead>
        <th>No</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>merk</th>
        <th>harga</th>
        <th>stock</th>
        <th>gambar</th>
        <th>deskripsi</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, 'select * from barang');
        while($row = mysqli_fetch_array($query)){?>
        <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['idBarang'] ?></td>
        <td><?= $row['namaBarang'] ?></td>
        <td><?= $row['kategori'] ?></td>
        <td><?= $row['merk'] ?></td>
        <td><?= $row['harga'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td><?= $row['gambar'] ?></td>
        <td> 
            <textarea name="" id="" cols="45" rows="10"><?= $row['deskripsi'] ?></textarea>
        </td>
        <td><a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
        <a onclick="return confirm('Apakah anda yakin data ini akan dihapus?')" href="delete.php?id=<?= $row['id'] ?>">Hapus</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php 
} else { 
    echo 'Sesi kamu sudah habis, silakan login. <a href="login.php">Login!</a>';
} ?>