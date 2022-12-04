<?php
session_start();
// Belum Login
if (!isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Jadwal Pesawat</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
        ?>
        <h1 class="txt-center">Jadwal Keberangkatan</h1>
        <table border="1" class="senter">
            <tr>
                <th>Nomor</th>
                <th>Maskapai</th>
                <th>Keberangkatan</th>
                <th>Kedatangan</th>
                <th>Jam Keberangkatan</th>
            </tr>
            <?php
                include '../config/koneksi.php';
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
// else {
?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Jadwal Pesawat</title>
        <link rel="stylesheet" href="gaya.css">
    </head>
    <body> -->
        <!-- <?php
            // include '../config/header.php';
        ?> -->
    <!-- </body>
</html> -->
<!-- <?php
// }
?> -->
