<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "sistem_informasi";

$koneksi = mysqli_connect($server, $user, $pass, $db);

if (!$koneksi) {
    die("CONNECTION failed".mysqli_connect_error());
}
