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
            <!-- Untuk middl -->
            <?php
                include 'db/middleware.php';
            ?>
            <form action="proses_tambah.php" method="post">
                <p>Nama Pelanggan</p>
                <input required type="text" name="nama" value="<?= str_replace("+", " ", $nama[1]) ?>">
                <p>Nomor Telepon</p>
                <input required type="number" name="telefon" value="<?= str_replace("+", " ", $telp[1]) ?>">
                <p>Email</p>
                <input required type="email" name="email" value="<?= str_replace("+", " ", $email[1]) ?>">
                <p>Username</p>
                <input required type="text" name="username" value="<?= str_replace("+", " ", $usr[1]) ?>">
                <p>Password</p>
                <input required type="password" name="pass">
                <button required type="submit" class="btn-kirim">Kirim</button>
            </form>
        </div>
    </body>
</html>
