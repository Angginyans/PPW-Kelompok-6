<?php
include '../../config/koneksi.php';
include 'function.php';
session_start();


// Belom login
if (!isset($_SESSION['id'])) {
    $id_rute = $_GET['rute'];
    $id_tix = $_GET['tiket'];
    $seat = $_POST['kursi'];
    $class = $_POST['kelas'];
    $harga = setHarga($_POST['harga']);
    $s = getSeat($koneksi, $id_rute);
    if ($s['nomor_kursi'] != $seat) {
        $qry = "INSERT INTO tiket (id_tiket, id_rute, nomor_kursi, kelas, harga) VALUES ('$id_tix', '$id_rute', '$seat', '$class', '$harga')";
        mysqli_query($koneksi, $qry);
        header("Location: ../../daftar/index.php?tx=".$id_tix);
    }else {
        header("Location: ../tiket.php?rute=".$id_rute."&booked=".$s['nomor_kursi']);
    }
}
else { // Sudah login
    $id_rute = $_GET['rute'];
    $id_tix = $_GET['tiket'];
    $seat = $_POST['kursi'];
    $class = $_POST['kelas'];
    $harga = setHarga($_POST['harga']);
    $s = getSeat($koneksi, $id_rute);
    if ($s['nomor_kursi'] != $seat) {
        $qry = "INSERT INTO tiket (id_tiket, id_rute, nomor_kursi, kelas, harga) VALUES ('$id_tix', '$id_rute', '$seat', '$class', '$harga')";
        mysqli_query($koneksi, $qry);
        header("Location: ../index.php?tx=".$id_tix);
    }else {
        header("Location: ../tiket.php?rute=".$id_rute."&booked=".$s['nomor_kursi']);
    }
}
