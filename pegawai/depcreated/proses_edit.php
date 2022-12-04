<?php
include '../koneksi.php';

$id = $_POST['id_pegawai'];
$nama = $_POST['nama'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id'";
$rsl = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_row($rsl);

if (empty($pass)) {
    $pas = $row[2];
}else {
    $pas = $_POST['pass'];
}

$querry = "UPDATE pegawai SET id_pegawai = '$id', nama_pegawai = '$nama', password = '$pas' WHERE id_pegawai = '$id'";
mysqli_query($koneksi, $querry);
header('location: index.php?id_pegawai='.$id);
