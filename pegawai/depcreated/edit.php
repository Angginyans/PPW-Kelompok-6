<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Tiket Pesawat</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../header.php';
        ?>

        <div>
            <a href="index.php" class="btn-balik">Kembali</a>

            <?php
                include '../koneksi.php';

                $id = $_GET['id'];
                $querry = "SELECT * FROM pegawai WHERE id_pegawai='$id'";
                $result = mysqli_query($koneksi, $querry);
                $row = mysqli_fetch_assoc($result);
            ?>
            <form action="proses_edit.php" method="post">
                <p>ID Pegawai</p>
                <input type="text" name="id_pegawai" value="<?php echo $id; ?>">
                <p>Nama Pegawai</p>
                <input type="text" name="nama" value="<?php echo $row['nama_pegawai']; ?>">
                <p>Password</p>
                <input type="password" name="pass">
                <button type="submit" class="btn-kirim">Kirim</button>
            </form>
        </div>
    </body>
</html>
