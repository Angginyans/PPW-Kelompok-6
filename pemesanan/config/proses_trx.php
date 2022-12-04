<?php
include '../../config/koneksi.php';
session_start();

$usr =$_SESSION['id'];
$tx = $_GET['tx'];
$date = $_POST['date_order'];

$sql = "SELECT COUNT(id_pemesanan) FROM pemesanan";
$rsl = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($rsl);
$max = ++$row["COUNT(id_pemesanan)"];

$trx = "SELECT COUNT(id_transaksi) FROM transaksi";
$zrl = mysqli_query($koneksi, $trx);
$ruw = mysqli_fetch_assoc($zrl);
$mux = ++$ruw["COUNT(id_transaksi)"];

$fap = "SELECT COUNT(id_laporan) FROM laporan";
$bap = mysqli_query($koneksi, $fap);
$guw = mysqli_fetch_assoc($bap);
$mex = ++$guw["COUNT(id_laporan)"];

if (isset($usr)) {
    $order = "INSERT INTO pemesanan (id_pemesanan, id_pelanggan, id_tiket, tanggal_pesan) VALUES ('$max','$usr', '$tx','$date')";
    mysqli_query($koneksi, $order);

    $date_trx = date("Y-m-d H:i:s");
    $trx = "INSERT INTO transaksi (id_transaksi, id_pemesanan, tanggal_transaksi) VALUES ('$mux','$max', '$date_trx')";
    mysqli_query($koneksi, $trx);

    $lap = "INSERT INTO laporan (id_laporan, id_transaksi, id_pelanggan) VALUES ('$mex','$mux', '$usr')";
    mysqli_query($koneksi, $lap);

    header('Location: ../index.php');
}
// else {
//     header('Location: ../../login/index.php');
// }
