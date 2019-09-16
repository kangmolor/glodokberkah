<?php
session_start();
include '../functions.php';
if(isset($_SESSION['admin'])){
    ?>
<a href="barang">Data Barang</a>
<table>
    <thead>
        <th>No</th>
        <th>User</th>
        <th>Pass</th>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, 'select * from admin');
        while($row = mysqli_fetch_array($query)){?>
        <td><?= $no++ ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['password'] ?></td>
        <?php } ?>
    </tbody>
</table>
<?php 
} else { 
    echo 'Sesi kamu sudah habis, silakan login. <a href="../login.php">Login!</a>';
} ?>