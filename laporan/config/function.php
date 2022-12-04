<?php
function getTrx($a, $y){
    $qry = "SELECT * FROM transaksi WHERE id_transaksi = '$y'";
    $sql = mysqli_query($a,$qry);
    $row = mysqli_fetch_assoc($sql);
    return $row;
}
function getPemesan($a, $x){
    $qry = "SELECT
    pelanggan.nama_pelanggan as nama_pelanggan,
    pemesanan.tanggal_pesan as tanggal
    FROM pemesanan INNER JOIN pelanggan
    ON pelanggan.id_pelanggan = pemesanan.id_pelanggan
    WHERE pemesanan.id_pemesanan = $x
    ";
    $sql = mysqli_query($a,$qry);
    $row = mysqli_fetch_assoc($sql);
    return $row;
}
function getTiket($a, $x){
    $qry = "SELECT
    pelanggan.nama_pelanggan as nama_pelanggan,
    rute.jam_berangkat as jam,
    rute.asal_rute as asal,
    rute.tujuan_rute as tujuan,
    rute.maskapai as maskapai,
    tiket.nomor_kursi as kursi,
    tiket.kelas as kelas,
    tiket.harga as harga
    FROM pemesanan
    INNER JOIN pelanggan ON pelanggan.id_pelanggan = pemesanan.id_pelanggan
    INNER JOIN tiket ON tiket.id_tiket = pemesanan.id_tiket
    INNER JOIN rute ON rute.id_rute = tiket.id_rute
    WHERE pemesanan.id_tiket = '$x'
    ";
    $sql = mysqli_query($a,$qry);
    $row = mysqli_fetch_assoc($sql);
    return $row;
}
function rupiah($x){
    $rupiah = "Rp".number_format($x,0,",",".").",-";
    return $rupiah;
}
?>
