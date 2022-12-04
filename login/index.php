<?php
session_start();
if (!isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Masuk Pelanggan</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
            include '../config/db/middleware.php';
            include '../config/db/mid_login.php';
        ?>
        <div class="form-center">
            <form action="../config/proses_login.php" method="post">
                <p>Username</p>
                <input type="text" name="username" value="<?= isset($ac)?$ac:'' ?>">
                <p>Password</p>
                <input type="password" name="pass">
                <button type="submit" class="zenter btn-kirim">Masuk</button>
            </form>
        </div>
    </body>
</html>
<?php
} else {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Masuk Pelanggan</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
            include '../config/db/mid_login.php';
        ?>
        <div class="form-center">
            <p>Anda sudah login. Silahkan <a href="../index.php" class="text-decoration:none; color: #000;">ke Beranda</a></p>
        </div>
    </body>
</html>
<?php
}
?>
