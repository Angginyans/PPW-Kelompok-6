<?php
function rupiah($x){
    $rupiah = "Rp".number_format($x,0,",",".").",-";
    return $rupiah;
}
function getPemesan($x, $y){
    $qry = "SELECT
    rute.jam_berangkat as jam,
    rute.asal_rute as asal,
    rute.tujuan_rute as tujuan,
    rute.maskapai as maskapai,
    tiket.nomor_kursi as kursi,
    tiket.kelas as kelas,
    tiket.harga as harga,
    pemesanan.tanggal_pesan as tanggal
    FROM pemesanan
    INNER JOIN tiket ON tiket.id_tiket = pemesanan.id_tiket
    INNER JOIN rute ON rute.id_rute = tiket.id_rute
    WHERE id_pelanggan = '$y'
    ";
    $sql = mysqli_query($x,$qry);
    return $sql;
}


function setHarga($n){
    $d = str_replace('Rp', '', $n);
    $e = str_replace('.', '', $d);
    $g = str_replace(',', '', $e);
    $f = str_replace('-', '', $g);
    return intval($f);
}
function getSeat($k, $ir){
    $sql = "SELECT * FROM tiket WHERE id_rute = $ir";
    $qry = mysqli_query($k, $sql);
    $row = mysqli_fetch_assoc($qry);
    return $row;
}
?>
