<?php
include '../koneksi.php';
include 'db/sql.php';

if (empty($z)) {
    if (empty($h) && empty($l)) {
        if (strlen($telefon) <= 10) {
            $query = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, nomor_telfon, email, username, password) VALUES ('$str', '$nama', $telefon, '$email', '$username', '$password')";
            mysqli_query($koneksi, $query);
            header('location: index.php');
        }else {
            $arr = array('nama' => $nama, 'telp' => $telefon, 'email' => $email, 'usr' => $username, 'pass' => $pass);
            $jsn = json_encode($arr);
            header("Location:tambah.php?msg&nama=".urlencode($nama)."&telp=".urlencode($telefon)."&email=".urlencode($email)."&username=".urlencode($username));
        }
    }else {
        $arr = array('nama' => $nama, 'telp' => $telefon, 'email' => $email, 'usr' => $username, 'pass' => $pass);
        $jsn = json_encode($arr);
        header("Location:tambah.php?msg&nama=".urlencode($nama)."&telp=".urlencode($telefon)."&email=".urlencode($email)."&username=".urlencode($username));
    }
}else {
    die("Mohon Maaf data sudah ada");
}
