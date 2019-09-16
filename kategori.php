<?php 
require "functions.php";

$kategori = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $kategori ?></title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/G.png" type="image/gif" sizes="16x16">
</head>
<body>
<?php require 'assets/navbar.php'; ?>
    <div class="container">
    <?php require 'assets/sidebar.php'; ?>
        <div class="main">
        <?php
        
        $query = query("SELECT barang.kode_barang, detailbarang.gambar,detailbarang.nama_barang, detailbarang.merk, barang.harga_jual FROM detailbarang INNER JOIN barang ON detailbarang.kode_barang = barang.kode_barang WHERE kategori LIKE'$kategori'");

        foreach($query as $row){
        ?>
        <a href="detail.php">
            <div class="etalase">
                <img src="<?=$row[1]?>" alt="" width="300"><br>
                <div class="infobarang">
                    <?=$row[2]?><br>
                    <?=$row[3]?><br>
                    <?=number_format($row[4])?>
                </div>
            </div>
        </a>
        <?php } ?>
        </div>
    <div class="clear"></div>
    </div>
    
<?php require 'assets/footer.php'; ?>
</body>
</html>