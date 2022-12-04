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

            <form action="proses_tambah.php" method="post">
                <p>ID Pegawai</p>
                <input type="text" name="id_pegawai">
                <p>Nama Pegawai</p>
                <input type="text" name="nama">
                <p>Password</p>
                <input type="password" name="pass">
                <button type="submit" class="btn-kirim">Kirim</button>
            </form>
        </div>
    </body>
</html>
