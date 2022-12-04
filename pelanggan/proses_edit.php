<?php
include '../config/koneksi.php';
include '../config/db/sql.php';

if (empty($password)) {
    $pas = $ruw[5];
}else {
    $pas = $_POST['pass'];
}
// var_dump(empty($h));
if ($ruw[3] == $email && $ruw[4] == $username) {
    if (strlen($telefon) <= 10) {
        $query = "UPDATE pelanggan SET id_pelanggan = '$id', nama_pelanggan = '$nama', nomor_telfon = '$telefon', email = '$email', username = '$username', password = '$pas' WHERE id_pelanggan = '$id'";
        mysqli_query($koneksi, $query);
        header('location: index.php');
    }else {
        $arr = array('nama' => $nama, 'telp' => $telefon, 'email' => $email, 'usr' => $username, 'pass' => $pass);
        $jsn = json_encode($arr);
        header("Location:index.php?id=".$id."&dbl&nama=".urlencode($nama)."&telp=".urlencode($telefon)."&email=".urlencode($email)."&username=".urlencode($username));
    }
}elseif (empty($h) || empty($l) && $ruw[0] == $id) {
    $query = "UPDATE pelanggan SET id_pelanggan = '$id', nama_pelanggan = '$nama', nomor_telfon = '$telefon', email = '$email', username = '$username', password = '$pas' WHERE id_pelanggan = '$id'";
    mysqli_query($koneksi, $query);
    header('location: index.php');
}elseif ($h['email'] == $email || $l['username'] == $username && $ruw[0] == $id) {
    header("Location:index.php?err");
}
