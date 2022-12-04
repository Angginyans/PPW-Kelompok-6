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
            <!-- <?php
            ?> -->
            <?php
                include '../koneksi.php';
                include 'db/middleware.php';
                $id = $_GET['id'];
                $querry = "SELECT * FROM pelanggan WHERE id_pelanggan='$id'";
                $result = mysqli_query($koneksi, $querry);
                $row = mysqli_fetch_assoc($result);
            ?>
            <form action="proses_edit.php" method="post">
                <?php if (isset($_GET['dbl'])){
                ?>
                    <input required type="hidden" name="id" value="<?= $row['id_pelanggan'] ?>">
                    <p>Nama Pelanggan</p>
                    <input required type="text" name="nama" value="<?= ($row['nama_pelanggan'] == $nama2) ? $row['nama_pelanggan'] : $nama2 ?>">
                    <p>Nomor Telepon</p>
                    <input required type="number" name="telefon" value="<?= ($row['nomor_telfon'] == $telp2) ? $row['nomor_telfon'] : $telp2 ?>">
                    <p>Email</p>
                    <input required type="email" name="email" value="<?= ($row['email'] == $email2) ? $row['email'] : $email2 ?>">
                    <p>Username</p>
                    <input required type="text" name="username" value="<?= ($row['username'] == $usr2) ? $row['username'] : $usr2 ?>">
                    <p>Password</p>
                    <input type="password" name="pass">
                    <button type="submit" class="btn-kirim">Kirim</button>
                <?php
                }else {
                ?>
                    <input required type="hidden" name="id" value="<?= $row['id_pelanggan'] ?>">
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
                    <button type="submit" class="btn-kirim">Kirim</button>
                <?php
                }
                ?>

            </form>
        </div>
    </body>
</html>
