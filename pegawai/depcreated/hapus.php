<?php
include '../koneksi.php';

$id = $_GET['id_pegawai'];
$query = "DELETE FROM pegawai WHERE id_pegawai = '$id'";

mysqli_query($koneksi, $query);
header('location: index.php');
