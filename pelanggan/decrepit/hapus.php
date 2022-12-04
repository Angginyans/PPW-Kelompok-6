<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM pelanggan WHERE id_pelanggan = '$id'";

mysqli_query($koneksi, $query);
header('location: index.php');
