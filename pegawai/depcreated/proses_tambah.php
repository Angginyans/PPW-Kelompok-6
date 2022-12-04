<?php
include '../koneksi.php';

$id = $_POST['id_pegawai'];
$nama = $_POST['nama'];
$pass = $_POST['pass'];

$querry = "INSERT INTO pegawai (id_pegawai, nama_pegawai, password) VALUES ('$id', '$nama', '$pass')";

mysqli_query($koneksi, $querry);
header('location: index.php');
