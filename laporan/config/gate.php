<?php

function gate($n){
    include '../config/koneksi.php';

    $sql = "SELECT * from pegawai WHERE nama_pegawai = '$n'";
    $qry = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($qry);
    if (isset($row['nama_pegawai']) == $n) {
        return true;
    }else {
        return false;
    }
}

?>
