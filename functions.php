<?php
$conn = mysqli_connect("localhost","root","","online_shop");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

function register(){
    global $conn;

    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    // cek apakah user sudah terdaftar
    $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username udah ada');
        </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script>
        alert('Konfirmasi tidak sesuai');
        </script>";
        return false;
    }
    $sqlkode = "SELECT max(id_user) from user";
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

    // encrypt
    $password = password_hash($password,PASSWORD_DEFAULT);

    // Memassukan dalam database
    mysqli_query($conn,"INSERT INTO user VALUES('$kode_auto','$username','$password','2')");
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT barang.kode_barang, detailbarang.gambar,detailbarang.nama_barang, detailbarang.merk, barang.harga_jual FROM detailbarang INNER JOIN barang ON detailbarang.kode_barang WHERE
    nama LIKE '%$keyword%' OR
    nik LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    warna LIKE '%$keyword%'
    ";
    return query($query);
}

?>