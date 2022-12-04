<?php
session_start();
// Belum Login
if (!isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Pemesanan Tiket Pesawat</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
        ?>
        <div class="notif">
            <p>Belum punya akun? Daftar <a href="../daftar/index.php" class="a-hrep">disini</a></p>
        </div>
        <table border="1" class="senter" style="margin-top: 20px">
            <tr>
                <th>Nomor</th>
                <th>Maskapai</th>
                <th>Keberangkatan</th>
                <th>Kedatangan</th>
                <th>Jam Keberangkatan</th>
                <th>Harga</th>
                <th>Pemesanan</th>
            </tr>
            <?php
                include '../config/koneksi.php';
                $nomor = 1;
                $querry = "SELECT * FROM rute";
                $results = mysqli_query($koneksi, $querry);
                include 'config/function.php';
                if (mysqli_num_rows($results)>0) {
                    while ($row = mysqli_fetch_assoc($results)) {
                        echo "
                            <tr>
                                <td style='text-align: center;'>".$nomor++."</td>
                                <td>".ucwords($row['maskapai'])."</td>
                                <td>".ucwords($row['asal_rute'])."</td>
                                <td>".ucwords($row['tujuan_rute'])."</td>
                                <td style='text-align: center;'>".$row['jam_berangkat']."</td>
                                <td style='text-align: center;'>".rupiah($row['harga'])."</td>
                                <td style='text-align: center;'><a href='tiket.php?rute=".$row['id_rute']."' class='btn-book'>Booking</a></td>
                            </tr>
                        ";
                    }
                }
            ?>
        </table>
    </body>
</html>
<!-- Sudah Login -->
<?php
}
else {
    // Login lewat pemesanan
    if (isset($_GET['tx'])) {
?>
<!-- HTML Here -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Pemesanan Tiket Pesawat</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/koneksi.php';
            include '../config/header.php';
            include 'config/function.php';

            $id_tx = $_GET['tx'];
            $qry = "SELECT * FROM tiket WHERE id_tiket = '$id_tx'";
            $sql = mysqli_query($koneksi, $qry);
            $row = mysqli_fetch_assoc($sql);

            $id_rt = $row['id_rute'];
            $qry1 = "SELECT * FROM rute WHERE id_rute = '$id_rt'";
            $sql1 = mysqli_query($koneksi,$qry1);
            $row1 = mysqli_fetch_assoc($sql1);
        ?>
        <div class="form-center" style="margin-top: 20px">
            <form action="config/proses_trx.php?tx=<?= $id_tx ?>" method="post" class="flex-row">
                <div class="flex-row-item">
                    <label class="labelu">Maskapai</label>
                    <input class="inputto" type="text" name="maskapai" disabled value="<?= ucwords($row1['maskapai']) ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Jam Keberangkatan</label>
                    <input class="inputto" type="text" name="jam" disabled value="<?= ucwords($row1['jam_berangkat']) ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Keberangkatan</label>
                    <input class="inputto" type="text" name="berangkat" disabled value="<?= ucwords($row1['asal_rute']) ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Kedatangan</label>
                    <input class="inputto" type="text" name="pass" disabled value="<?= ucwords($row1['tujuan_rute']) ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Kursi</label>
                    <input class="inputto" type="text" name="kursi" disabled value="<?= $row['nomor_kursi'] ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Kelas</label>
                    <input class="inputto" type="text" name="kelas" disabled value="<?= $row['kelas'] ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Harga</label>
                    <input class="inputto" type="text" name="harga" disabled value="<?= rupiah($row['harga']) ?>">
                </div>
                <div class="flex-row-item">
                    <label class="labelu">Tanggal pesan</label>
                    <input class="inputto" type="text" name="date_order" id="datepicker">
                </div>
                <button type="submit" class="zenter btn-kirim-book">Selanjutnya</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
            $( function() {
                $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'}).val();
            } );
        </script>
    </body>
</html>
<?php
    // Login tanpa pemesanan
    } else {
?>
<!-- HTML here -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Pemesanan Tiket Pesawat</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
            include 'config/function.php';

        ?>
        <h1 style="text-align: center; color: #d92139">Tiket anda</h1>
        <table border="1" class="senter" style="margin-top: 20px">
            <tr>
                <th>Nomor</th>
                <th>Tanggal berangkat</th>
                <th>Maskapai</th>
                <th>Keberangkatan</th>
                <th>Kedatangan</th>
                <th>Jam Keberangkatan</th>
                <th>Nomor Kursi</th>
            </tr>
            <?php
                include '../config/koneksi.php';
                $nomor = 1;
                $s = getPemesan($koneksi, $_SESSION['id']);
                if (mysqli_num_rows($s)>0) {
                    while ($row = mysqli_fetch_assoc($s)) {
                        echo "
                            <tr>
                                <td style='text-align: center;'>".$nomor++."</td>
                                <td>".date('d F Y', strtotime($row['tanggal']))."</td>
                                <td>".ucwords($row['maskapai'])."</td>
                                <td>".ucwords($row['asal'])."</td>
                                <td>".ucwords($row['tujuan'])."</td>
                                <td style='text-align: center;'>".$row['jam']."</td>
                                <td style='text-align: center;'>".$row['kursi']."</td>
                            </tr>
                        ";
                    }
                }
            ?>
        </table>
        <h1 style="text-align: center; color: #d92139">Lihat jadwal lain</h1>
        <table border="1" class="senter" style="margin-top: 20px">
            <tr>
                <th>Nomor</th>
                <th>Maskapai</th>
                <th>Keberangkatan</th>
                <th>Kedatangan</th>
                <th>Jam Keberangkatan</th>
                <th>Harga</th>
                <th>Pemesanan</th>
            </tr>
            <?php
                $nomor = 1;
                $querry = "SELECT * FROM rute";
                $results = mysqli_query($koneksi, $querry);
                if (mysqli_num_rows($results)>0) {
                    while ($row = mysqli_fetch_assoc($results)) {
                        echo "
                            <tr>
                                <td style='text-align: center;'>".$nomor++."</td>
                                <td>".ucwords($row['maskapai'])."</td>
                                <td>".ucwords($row['asal_rute'])."</td>
                                <td>".ucwords($row['tujuan_rute'])."</td>
                                <td style='text-align: center;'>".$row['jam_berangkat']."</td>
                                <td style='text-align: center;'>".rupiah($row['harga'])."</td>
                                <td style='text-align: center;'><a href='tiket.php?rute=".$row['id_rute']."' class='btn-book'>Booking</a></td>
                            </tr>
                        ";
                    }
                }
            ?>
        </table>
    </body>
</html>

<?php
    }
}
?>
