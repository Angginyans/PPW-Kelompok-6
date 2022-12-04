<?php
session_start();
if (isset($_SESSION['id'])) {
include '../config/koneksi.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
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
                <input required type="text" name="nama" value="<?= $row['nama_pelanggan'] ?>">
                <p>Nomor Telepon</p>
                <input required type="number" name="telefon" value="<?= $row['nomor_telfon'] ?>">
                <p>Email</p>
                <input required type="email" name="email" value="<?= $row['email'] ?>">
                <p>Username</p>
                <input required type="text" name="username" value="<?= $row['username'] ?>">
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
