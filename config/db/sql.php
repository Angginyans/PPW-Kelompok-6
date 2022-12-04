<?php
$sql = "SELECT COUNT(id_pelanggan) FROM pelanggan";
$rsl = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($rsl);
$max = ++$row["COUNT(id_pelanggan)"]; // output: 2
$str = strval($max);

$x = "SELECT * FROM pelanggan WHERE id_pelanggan = '$max'";
$y = mysqli_query($koneksi, $x);
$z = mysqli_fetch_assoc($y);

$id = $_POST['id'];
$nama = $_POST['nama'];
$telefon = intval($_POST['telefon']);
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['pass'];

$e = "SELECT * FROM pelanggan WHERE email = '$email'";
$k = mysqli_query($koneksi, $e);
$h = mysqli_fetch_assoc($k);

$u = "SELECT * FROM pelanggan WHERE username = '$username'";
$g = mysqli_query($koneksi, $u);
$l = mysqli_fetch_assoc($g);

$skl = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
$rzl = mysqli_query($koneksi, $skl);
$ruw = mysqli_fetch_row($rzl);
