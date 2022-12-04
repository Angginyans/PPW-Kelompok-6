<?php
if(isset($_GET['null'])){
    $msg = "Username dan Password tidak boleh kosong";
    echo "
    <div class='error'>
        <p>".nl2br($msg)."</p>
    </div>
    ";
    $ss = $_SERVER['REQUEST_URI'];
    $exp = explode("&", $ss);
    $account = explode("=", $exp[1]);
    $ac = $account[1];
}elseif (isset($_GET['wrgem'])) {
    $msg = "Username atau Email salah";
    echo "
    <div class='error'>
        <p>".nl2br($msg)."</p>
    </div>
    ";
    $ss = $_SERVER['REQUEST_URI'];
    $exp = explode("&", $ss);
    $account = explode("=", $exp[1]);
    if (str_contains($account[1], '%40')) {
        $ac = str_replace("%40", "@", $account[1]);
    }elseif (str_contains($account[1], '+')) {
        $ac = str_replace("+", " ", $account[1]);
    }else {
        $ac = $account[1];
    }
}elseif (isset($_GET['wrgpas'])) {
    $msg = "Password salah";
    echo "
    <div class='error'>
        <p>".nl2br($msg)."</p>
    </div>
    ";
    $ss = $_SERVER['REQUEST_URI'];
    $exp = explode("&", $ss);
    $account = explode("=", $exp[1]);
    $ac = $account[1];
}elseif (isset($_GET['notreg'])) {
    $msg = "Email atau Username tidak terdaftar";
    echo "
    <div class='error'>
        <p>".nl2br($msg)."</p>
    </div>
    ";
}

// $nama1 = explode("=", $exp[2]);
// $nama2 = $nama1[1];
// $telp1 = explode("=", $exp[3]);
// $telp2 = $telp1[1];
// $m1 = explode("=", $exp[4]);
// $email1 = str_replace("%40", "@", $m1);
// $email2 = $email1[1];
// $usr1 = explode("=", $exp[5]);
// $usr2 = $usr1[1];
