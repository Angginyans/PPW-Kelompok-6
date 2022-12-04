<?php
if (isset($_GET['tx'])) {
?>
<form action="../config/proses_daftar.php?tx=<?= $_GET['tx']?>" method="post">
    <p>Nama Pelanggan Pemesan</p>
    <input required type="text" name="nama" value="<?= isset($nama[1])?str_replace("+", " ", $nama[1]):'' ?>">
    <p>Nomor Telepon</p>
    <input required type="number" name="telefon" value="<?= isset($telp[1])?str_replace("+", " ", $telp[1]):'' ?>">
    <p>Email</p>
    <input required type="email" name="email" value="<?= isset($email[1])?str_replace("+", " ", $email[1]):'' ?>">
    <p>Username</p>
    <input required type="text" name="username" value="<?= isset($usr[1])?str_replace("+", " ", $usr[1]):'' ?>">
    <p>Password</p>
    <input required type="password" name="pass">
    <button required type="submit" class="zenter btn-kirim">Daftar</button>
</form>
<?php
}else {
?>
<form action="../config/proses_daftar.php" method="post">
    <p>Nama Pelanggan</p>
    <input required type="text" name="nama" value="<?= isset($nama[1])?str_replace("+", " ", $nama[1]):'' ?>">
    <p>Nomor Telepon</p>
    <input required type="number" name="telefon" value="<?= isset($telp[1])?str_replace("+", " ", $telp[1]):'' ?>">
    <p>Email</p>
    <input required type="email" name="email" value="<?= isset($email[1])?str_replace("+", " ", $email[1]):'' ?>">
    <p>Username</p>
    <input required type="text" name="username" value="<?= isset($usr[1])?str_replace("+", " ", $usr[1]):'' ?>">
    <p>Password</p>
    <input required type="password" name="pass">
    <button required type="submit" class="zenter btn-kirim">Daftar</button>
</form>
<?php
}
?>
