<?php
session_start();
if (isset($_SESSION['id'])) {
include '../config/koneksi.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id'";
$rsl = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($rsl);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Pelanggan | Tiket Pesawat</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
            include '../config/db/middleware.php';
        ?>
        <div class="form-center">
            <form action="proses_edit.php" method="post">
                <input required type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                <p>Nama Pelanggan</p>
                <input required type="text" name="nama" value="<?= $row['nama_pegawai'] ?>">
                <p>Password</p>
                <input type="password" name="pass">
                <button type="submit" class="zenter btn-kirim">Ubah</button>
            </form>
        </div>
    </body>
</html>
<?php
}else {
    echo "Anda Belum Login, silahkan Login <a href='http://localhost/raja_tgs/login/index.php'>Di sini</a>";
}
