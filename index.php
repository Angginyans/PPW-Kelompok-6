<?php
session_start();
// Belum Login
if (!isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Tiket Pesawat</title>
        <link rel="stylesheet" href="gaya.css">
    </head>
    <body>
        <?php
            include 'config/header.php';
        ?>
        <h1 style="text-align: center; color: teal">Selamat Datang di Sistem Informasi Pemesanan Tiket Pesawat</h1>
        <p style="text-align: center; color: teal">Silahkan daftar akun anda terlebih dahulu sebelum melakukan pemesanan</p>
    </body>
</html>
<!-- Sudah Login -->
<?php
}else {
    function gate($n){
        include 'config/koneksi.php';
        $sql = "SELECT * from pegawai WHERE nama_pegawai = '$n'";
        $qry = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_assoc($qry);
        if (isset($row['nama_pegawai']) == $n) {
            return true;
        }else {
            return false;
        }
    }
    // Cek Pegawai
    if (gate($_SESSION['nama'])) {
    ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>Tiket Pesawat</title>
                <link rel="stylesheet" href="gaya.css">
            </head>
            <body>
                <?php
                    include 'config/header.php';
                ?>
                <h1 style="text-align: center; color: #d92139">Selamat datang di Sistem Penjualan Tiket Pesawat.</h1>
                <p style="text-align: center; color: #d92139">Silahkan klik menu Laporan untuk melihat laporan transaksi pemesanan tiket pesawat</p>
            </body>
        </html>
    <?php
    }else {
    ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>Tiket Pesawat</title>
                <link rel="stylesheet" href="gaya.css">
            </head>
            <body>
                <?php
                    include 'config/header.php';
                ?>
                <h1 style="text-align: center; color: #d92139">Selamat datang di Sistem Penjualan Tiket Pesawat.</h1>
                <p style="text-align: center; color: #d92139">Silahkan klik menu Pemesanan untuk melakukan pemesanan tiket pesawat</p>
            </body>
        </html>
    <?php
    }
}
?>
