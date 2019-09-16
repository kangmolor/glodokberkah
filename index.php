<?php
session_start();
require 'functions.php';

$jumlahdataperhalaman = 3;
$jumlahdata = count(query("SELECT kode_barang FROM detailbarang"));
$jumlahhalaman = ceil($jumlahdata/$jumlahdataperhalaman);
$halamanaktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;


        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glodok Berkah</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/G.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono:400,500,700&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
    <?php require 'assets/sidebar.php'; ?>
        <div class="main">
        <div class="menu">
        <?php
        require 'assets/navbar.php';


        if(empty($_SESSION['login'])){?>
        <div class="sign">
            <div class="loginbtn"><a href="login.php">Login</a></div>
            <div class="registerbtn"><a href="register.php">Register</a></div>
        </div>

        <?php } else {?>
        <div class="logoutbtn"><a href="logout.php">Logout</a></div>
        <?php } ?>    

        </div>
        
        <!-- pagination -->
        <!-- <div class="paginations">
<?php if($halamanaktif > 1) { ?>
<a class="pagination" href="?halaman=<?=$halamanaktif - 1?>">&laquo PREVIOUS</a>
<?php }else{ ?>
<a class="pagination disabled" href="?halaman=<?=$halamanaktif - 1?>">&laquo PREVIOUS</a>
<?php } ?>

<?php for($i = 1; $i <= $jumlahhalaman ;$i++) : ?>
<?php if($i == $halamanaktif) : ?>
    <a class="pagination activated-pagination" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
<?php else: ?>
    <a class="pagination" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
<?php endif; ?>
<?php endfor; ?>

<?php if($halamanaktif < $jumlahhalaman) { ?>
<a class="pagination" href="?halaman=<?=$halamanaktif + 1?>">NEXT &raquo</a>
<?php }else{ ?>
<a class="pagination disabled" href="?halaman=<?=$halamanaktif + 1?>">NEXT &raquo</a>
<?php } ?>
    </div> -->
    <div class="spacing">
        
        <?php
        $query = query("SELECT barang.kode_barang, detailbarang.gambar,detailbarang.nama_barang, detailbarang.merk, barang.harga_jual FROM detailbarang INNER JOIN barang ON detailbarang.kode_barang = barang.kode_barang LIMIT $awaldata, $jumlahdataperhalaman");
        foreach($query as $row){
            ?>
        <a href="detail.php">
            <div class="etalase">
                <img src="<?=$row['gambar']?>" alt="" width="300" height='200'><br>
                <div class="infobarang">
                <b><?=$row['nama_barang']?></b><br>
                <?=$row['merk']?><br>
                <div class="price">Rp.<?=number_format($row['harga_jual'])?></div>
            </div>
        </div>
        </a>
        <?php } ?>
    </div>
</div>
    <div class="clear"></div>
    </div>
    
<?php require 'assets/footer.php'; ?>
</body>
</html>