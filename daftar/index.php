<?php
session_start();
if (!isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Daftar Customer</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php include '../config/header.php'; include '../config/db/middleware.php'; ?>
        <div class="form-center">
            <?php include 'form.php' ?>
        </div>
    </body>
</html>
<?php
}else {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Daftar Customer</title>
        <link rel="stylesheet" href="../gaya.css">
    </head>
    <body>
        <?php
            include '../config/header.php';
            include '../config/db/middleware.php';
        ?>
        <div class="form-center">
            <p>Terima kasih anda sudah login. Silahkan <a href="../index.php" class="text-decoration:none; color: #000;">menuju Beranda</a></p>
        </div>
    </body>
</html>

<?php
}
?>
