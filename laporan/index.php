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
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
        ?>
        <h1 style="text-align: center; color: #d92139">404 Not Found</h1>
    </body>
</html>
<!-- Sudah Login -->
<?php
}else {
    include 'config/gate.php';

    if (gate($_SESSION['nama'])) {
    ?>
    <!-- Pegawai -->
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>Laporan Tiket Pesawat</title>
            <link rel="stylesheet" href="../gaya.css">
        </head>
        <body>
            <?php include '../config/header.php'; ?>
            <div style="margin-top: 20px; padding-top:20px">
                <table border="1" class="senter" width="100%">
                    <tr>
                        <th>Nomor</th>
                        <th>Transaksi</th>
                        <th>Pelanggan</th>
                        <th>Tindakan</th>
                    </tr>
                    <?php
                        include '../config/koneksi.php';
                        $nomor = 1;
                        $querry = "SELECT
                        pelanggan.nama_pelanggan as nama,
                        transaksi.id_transaksi as trx,
                        laporan.id_laporan as id
                        FROM laporan
                        INNER JOIN pelanggan ON pelanggan.id_pelanggan = laporan.id_pelanggan
                        INNER JOIN transaksi ON transaksi.id_transaksi = laporan.id_transaksi";
                        $results = mysqli_query($koneksi, $querry);
                        if (mysqli_num_rows($results)>0) {
                            while ($row = mysqli_fetch_assoc($results)) {
                                echo "
                                    <tr>
                                        <td>".$nomor++."</td>
                                        <td>".$row['trx']."</td>
                                        <td>".$row['nama']."</td>
                                        <td>
                                            <a class='btn-edit' href='detail.php?id=".$row['trx']."'>Lihat</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        }else {
                            echo "gagal";
                        }
                    ?>
                </table>
            </div>
        </body>
    </html>
    <?php
    }else {
    ?>
    <!-- Pelanggan -->
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>Tiket Pesawat</title>
            <link rel="stylesheet" href="../gaya.css">
        </head>
        <body>
            <?php
                include '../config/header.php';
            ?>
            <h1 style="text-align: center; color: #d92139">404 Not Found</h1>
        </body>
    </html>
    <?php
    }
?>

<?php
}
?>
