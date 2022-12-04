<?php
session_start();
// Belum Login
if (!isset($_SESSION['id'])) {
    if (!isset($_GET['booked'])) {
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
                <?php
                    include '../config/koneksi.php';

                    $id = $_GET['rute'];
                    $qry = "SELECT * FROM rute WHERE id_rute = '$id'";
                    $sql = mysqli_query($koneksi,$qry);
                    $row = mysqli_fetch_assoc($sql);

                    $ctt = "SELECT COUNT(id_tiket) FROM tiket";
                    $qqq = mysqli_query($koneksi, $ctt);
                    $r = mysqli_fetch_assoc($qqq);
                    $mx = ++$r["COUNT(id_tiket)"];
                    $ide = strval($mx);

                    function rupiah($x){
                        $rupiah = "Rp".number_format($x,0,",",".").",-";
                        return $rupiah;
                    }
                ?>
                <div class="form-center" style="margin-top: 20px;">
                    <form action="config/proses_pesan.php?rute=<?=$id?>&tiket=<?=$ide?>" method="post" class="flex-row">
                        <div class="flex-row-item">
                            <label class="labelu">Maskapai</label>
                            <input class="inputto" type="text" name="maskapai" disabled value="<?= ucwords($row['maskapai']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Jam Keberangkatan</label>
                            <input class="inputto" type="text" name="jam" disabled value="<?= ucwords($row['jam_berangkat']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Keberangkatan</label>
                            <input class="inputto" type="text" name="berangkat" disabled value="<?= ucwords($row['asal_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kedatangan</label>
                            <input class="inputto" type="text" name="pass" disabled value="<?= ucwords($row['tujuan_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kursi</label>
                            <!-- <input class="inputto" type="text" name="kursi"> -->

                            <select name="kursi">
                                <option label="">-- Pilih Kursi --</option>
                            <?php
                                for ($i=1; $i <= 60 ; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                            ?>
                            </select>

                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Harga</label>
                            <input class="inputto" type="text" id="harga" name="harga" readonly value="<?= rupiah($row['harga']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kelas</label>
                            <select name="kelas" id="kelas" onchange="proses()">
                                <option label="">-- Pilih Kelas --</option>
                                <option value="first class">First Class</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="ekonomi">Ekonomi</option>
                            </select>
                            <!-- <input class="inputto" type="text" name="kelas"> -->
                        </div>
                        <div class="flex-row-item">
                            <button type="submit" class="btn-kirim-book" style="margin: 20px auto">Pesan</button>
                        </div>
                    </form>
                </div>


                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <!-- <script src="config/jq.min.js"></script> -->
                <script src="config/skrip.js"></script>
            </body>
        </html>
<?php
    }else {
?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>Gagal Booking Tiket Pesawat</title>
                <link rel="stylesheet" href="../gaya.css">
            </head>
            <body>
                <?php
                    include '../config/header.php';
                ?>
                <div class="notif">
                    <p>Belum punya akun? Daftar <a href="../daftar/index.php" class="a-hrep">disini</a></p>
                </div>
                <div class="notif-red">
                    <p>Kursi nomor <?= $_GET['booked']?> telah dipesan, silahkan cari kursi yang lain</p>
                </div>
                <?php
                    include '../config/koneksi.php';


                    $id = $_GET['rute'];
                    $qry = "SELECT * FROM rute WHERE id_rute = '$id'";
                    $sql = mysqli_query($koneksi,$qry);
                    $row = mysqli_fetch_assoc($sql);

                    $ctt = "SELECT COUNT(id_tiket) FROM tiket";
                    $qqq = mysqli_query($koneksi, $ctt);
                    $r = mysqli_fetch_assoc($qqq);
                    $mx = ++$r["COUNT(id_tiket)"];
                    $ide = strval($mx);

                    function rupiah($x){
                        $rupiah = "Rp".number_format($x,0,",",".").",-";
                        return $rupiah;
                    }
                ?>
                <div class="form-center" style="margin-top: 20px;">
                    <form action="config/proses_pesan.php?rute=<?=$id?>&tiket=<?=$ide?>" method="post" class="flex-row">
                        <div class="flex-row-item">
                            <label class="labelu">Maskapai</label>
                            <input class="inputto" type="text" name="maskapai" disabled value="<?= ucwords($row['maskapai']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Jam Keberangkatan</label>
                            <input class="inputto" type="text" name="jam" disabled value="<?= ucwords($row['jam_berangkat']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Keberangkatan</label>
                            <input class="inputto" type="text" name="berangkat" disabled value="<?= ucwords($row['asal_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kedatangan</label>
                            <input class="inputto" type="text" name="pass" disabled value="<?= ucwords($row['tujuan_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kursi</label>
                            <select name="kursi">
                                <option label="">-- Pilih Kursi --</option>
                            <?php
                                for ($i=1; $i <= 60 ; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                            ?>
                            </select>

                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Harga</label>
                            <input class="inputto" type="text" id="harga" name="harga" readonly value="<?= rupiah($row['harga']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kelas</label>
                            <select name="kelas" id="kelas" onchange="proses()">
                                <option label="">-- Pilih Kelas --</option>
                                <option value="first class">First Class</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="ekonomi">Ekonomi</option>
                            </select>
                            <!-- <input class="inputto" type="text" name="kelas"> -->
                        </div>
                        <div class="flex-row-item">
                            <button type="submit" class="btn-kirim-book" style="margin: 20px auto">Pesan</button>
                        </div>
                    </form>
                </div>


                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <!-- <script src="config/jq.min.js"></script> -->
                <script src="config/skrip.js"></script>
            </body>
        </html>
<?php
    }
?>



<!-- Sudah Login -->
<?php
}
else {
    // Tidak booking
    if (!isset($_GET['booked'])) {
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
                    include '../config/koneksi.php';

                    $id = $_GET['rute'];
                    $qry = "SELECT * FROM rute WHERE id_rute = '$id'";
                    $sql = mysqli_query($koneksi,$qry);
                    $row = mysqli_fetch_assoc($sql);

                    $ctt = "SELECT COUNT(id_tiket) FROM tiket";
                    $qqq = mysqli_query($koneksi, $ctt);
                    $r = mysqli_fetch_assoc($qqq);
                    $mx = ++$r["COUNT(id_tiket)"];
                    $ide = strval($mx);

                    function rupiah($x){
                        $rupiah = "Rp".number_format($x,0,",",".").",-";
                        return $rupiah;
                    }
                ?>
                <div class="form-center" style="margin-top: 20px;">
                    <form action="config/proses_pesan.php?rute=<?=$id?>&tiket=<?=$ide?>" method="post" class="flex-row">
                        <div class="flex-row-item">
                            <label class="labelu">Maskapai</label>
                            <input class="inputto" type="text" name="maskapai" disabled value="<?= ucwords($row['maskapai']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Jam Keberangkatan</label>
                            <input class="inputto" type="text" name="jam" disabled value="<?= ucwords($row['jam_berangkat']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Keberangkatan</label>
                            <input class="inputto" type="text" name="berangkat" disabled value="<?= ucwords($row['asal_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kedatangan</label>
                            <input class="inputto" type="text" name="pass" disabled value="<?= ucwords($row['tujuan_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kursi</label>
                            <!-- <input class="inputto" type="text" name="kursi"> -->

                            <select name="kursi">
                                <option label="">-- Pilih Kursi --</option>
                            <?php
                                for ($i=1; $i <= 60 ; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                            ?>
                            </select>

                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Harga</label>
                            <input class="inputto" type="text" id="harga" name="harga" readonly value="<?= rupiah($row['harga']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kelas</label>
                            <select name="kelas" id="kelas" onchange="proses()">
                                <option label="">-- Pilih Kelas --</option>
                                <option value="first class">First Class</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="ekonomi">Ekonomi</option>
                            </select>
                            <!-- <input class="inputto" type="text" name="kelas"> -->
                        </div>
                        <div class="flex-row-item">
                            <button type="submit" class="btn-kirim-book" style="margin: 20px auto">Pesan</button>
                        </div>
                    </form>
                </div>


                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <!-- <script src="config/jq.min.js"></script> -->
                <script src="config/skrip.js"></script>
            </body>
        </html>
<?php
    }else {
?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>Gagal Booking Tiket Pesawat</title>
                <link rel="stylesheet" href="../gaya.css">
            </head>
            <body>
                <?php
                    include '../config/header.php';
                ?>
                <div class="notif">
                    <p>Belum punya akun? Daftar <a href="../daftar/index.php" class="a-hrep">disini</a></p>
                </div>
                <div class="notif-red">
                    <p>Kursi nomor <?= $_GET['booked']?> telah dipesan, silahkan cari kursi yang lain</p>
                </div>
                <?php
                    include '../config/koneksi.php';


                    $id = $_GET['rute'];
                    $qry = "SELECT * FROM rute WHERE id_rute = '$id'";
                    $sql = mysqli_query($koneksi,$qry);
                    $row = mysqli_fetch_assoc($sql);

                    $ctt = "SELECT COUNT(id_tiket) FROM tiket";
                    $qqq = mysqli_query($koneksi, $ctt);
                    $r = mysqli_fetch_assoc($qqq);
                    $mx = ++$r["COUNT(id_tiket)"];
                    $ide = strval($mx);

                    function rupiah($x){
                        $rupiah = "Rp".number_format($x,0,",",".").",-";
                        return $rupiah;
                    }
                ?>
                <div class="form-center" style="margin-top: 20px;">
                    <form action="config/proses_pesan.php?rute=<?=$id?>&tiket=<?=$ide?>" method="post" class="flex-row">
                        <div class="flex-row-item">
                            <label class="labelu">Maskapai</label>
                            <input class="inputto" type="text" name="maskapai" disabled value="<?= ucwords($row['maskapai']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Jam Keberangkatan</label>
                            <input class="inputto" type="text" name="jam" disabled value="<?= ucwords($row['jam_berangkat']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Keberangkatan</label>
                            <input class="inputto" type="text" name="berangkat" disabled value="<?= ucwords($row['asal_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kedatangan</label>
                            <input class="inputto" type="text" name="pass" disabled value="<?= ucwords($row['tujuan_rute']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kursi</label>
                            <select name="kursi">
                                <option label="">-- Pilih Kursi --</option>
                            <?php
                                for ($i=1; $i <= 60 ; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                }
                            ?>
                            </select>

                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Harga</label>
                            <input class="inputto" type="text" id="harga" name="harga" readonly value="<?= rupiah($row['harga']) ?>">
                        </div>
                        <div class="flex-row-item">
                            <label class="labelu">Kelas</label>
                            <select name="kelas" id="kelas" onchange="proses()">
                                <option label="">-- Pilih Kelas --</option>
                                <option value="first class">First Class</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="ekonomi">Ekonomi</option>
                            </select>
                            <!-- <input class="inputto" type="text" name="kelas"> -->
                        </div>
                        <div class="flex-row-item">
                            <button type="submit" class="btn-kirim-book" style="margin: 20px auto">Pesan</button>
                        </div>
                    </form>
                </div>


                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <!-- <script src="config/jq.min.js"></script> -->
                <script src="config/skrip.js"></script>
            </body>
        </html>
<?php
    }
?>
<?php
}
?>
