<?php
session_start();
include 'koneksi.php';

// Proses login dari halaman Pemesanan
if (isset($_GET['tx']) && isset($_GET['username'])) {
    $usr = $_GET['username'];
    $tx = $_GET['tx'];
    $query = "SELECT * FROM pelanggan WHERE username = '$usr'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $row['id_pelanggan'];
    $_SESSION['nama'] = $row['nama_pelanggan'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['telpon'] = $row['nomor_telfon'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];

    header("Location: ../pemesanan/index.php?tx=".$tx);

// Proses Login dari halaman Register
}elseif (isset($_GET['username'])) {
    $usr = $_GET['username'];
    $query = "SELECT * FROM pelanggan WHERE username = '$usr'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $row['id_pelanggan'];
    $_SESSION['nama'] = $row['nama_pelanggan'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['telpon'] = $row['nomor_telfon'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];

    header('Location: ../index.php');

// Proses Login dari halaman Login
}else {
    $usr = $_POST['username'];
    $pass = $_POST['pass'];

    // Auth Pegawai
    $pg = getPegawai($usr);

    //Auth Pelanggan
    $pl = getPelanggan($usr);

    if (!empty($usr) && !empty($pass)) {

        if (empty($pg['nama_pegawai']) && empty($pl['email']) && empty($pl['username'])) {
            header("Location: ../login/index.php?notreg&username=".urlencode($usr));
        }else {
            if ($usr == $pg['nama_pegawai'] && $pass == $pg['password']) {
                $_SESSION['id'] = $pg['id_pegawai'];
                $_SESSION['nama'] = $pg['nama_pegawai'];
                $_SESSION['nama_pegawai'] = $pg['nama_pegawai']; //untuk header laporan&pemesanan
                $_SESSION['nama'] = $pg['nama_pegawai']; //untuk header laporan&pemesanan
                $_SESSION['password'] = $pg['password'];
                header('Location: ../index.php');
            }elseif ($usr != $pl['email'] && $usr != $pl['username']) {
                header("Location: ../login/index.php?wrgem&username=".urlencode($usr));
            }elseif ($pass != $pl['password']) {
                header("Location: ../login/index.php?wrgpas&username=".urlencode($usr));
            }else {
                $_SESSION['id'] = $pl['id_pelanggan'];
                $_SESSION['nama'] = $pl['nama_pelanggan'];
                $_SESSION['email'] = $pl['email'];
                $_SESSION['telpon'] = $pl['nomor_telfon'];
                $_SESSION['username'] = $pl['username'];
                $_SESSION['password'] = $pl['password'];

                header('Location: ../index.php');
            }
        }
    }else {
        header("Location: ../login/index.php?null&username=".urlencode($usr));
    }

}

function getPegawai($x){
    include 'koneksi.php';
    $query = "SELECT * FROM pegawai WHERE nama_pegawai = '$x'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getPelanggan($x){
    include 'koneksi.php';
    $query = "SELECT * FROM pelanggan WHERE email = '$x' OR username = '$x'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
