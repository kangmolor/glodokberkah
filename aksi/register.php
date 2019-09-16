<?php
session_start();
include '../functions.php';



$username = $_POST['username'];
$password = $_POST['password1'];
$verify = $_POST['password2'];
if($password == $verify){   
    //kode idUser dinamis
        $sqlkode = "select max(id_user) from user";
        $query = mysqli_query($conn,$sqlkode);
        $data = mysqli_fetch_array($query);
        
        if($data){
            $nilai = substr($data[0],1);
            $kode = (int) $nilai;

            //tambahkan sebanyak +1
            $kode = $kode + 1;
            $kode_auto = "U" .str_pad($kode, 4, "0", STR_PAD_LEFT);
        }else{
            $kode_auto = "U0001";
        }
    //insert user
    $sql = "insert into user(id_user,username,password) values ('','$kode_auto','$username','$password') ";
    $query = mysqli_query($conn,$sql);
    if($query == TRUE){
        echo "Berhasil daftar! silakan login <a href='../login.php'>Kembali!</a>";
        
    }else{
    echo 'gagal';
    var_dump($sql);
    }
}else{
    echo 'password tidak sama! <a href="../register.php">Kembali</a> ';
}
?>