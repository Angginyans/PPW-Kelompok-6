<?php
if (isset($_GET['tx'])) {
    if(isset($_GET['msg'])){
        $msg = "Pastikan: \r\n - Nomor tidak lebih dari 10 Digit\r\n - Nama tidak lebih dari 30 Karakter\r\n - Username tidak lebih dari 10 Karakter\r\n - Password tidak lebih dari 10 Karakter";
        echo "
        <div class='error'>
            <p>".nl2br($msg)."</p>
        </div>
        ";
        $ss = $_SERVER['REQUEST_URI'];
        $exp = explode("&", $ss);
        $nama = explode("=", $exp[2]);
        $telp = explode("=", $exp[3]);
        $m = explode("=", $exp[4]);
        $email = str_replace("%40", "@", $m);
        $usr = explode("=", $exp[5]);
    }elseif (isset($_GET['errem'])) {
        $msg = "Email telah terdaftar";
        echo "
        <div class='error'>
            <p>".nl2br($msg)."</p>
        </div>
        ";
        $ss = $_SERVER['REQUEST_URI'];
        $exp = explode("&", $ss);
        $nama = explode("=", $exp[2]);
        $telp = explode("=", $exp[3]);
        $m = explode("=", $exp[4]);
        $email = str_replace("%40", "@", $m);
        $usr = explode("=", $exp[5]);
    }elseif (isset($_GET['errus'])) {
        $msg = "Username telah terdaftar";
        echo "
        <div class='error'>
            <p>".nl2br($msg)."</p>
        </div>
        ";
        $ss = $_SERVER['REQUEST_URI'];
        $exp = explode("&", $ss);
        $nama = explode("=", $exp[2]);
        $telp = explode("=", $exp[3]);
        $m = explode("=", $exp[4]);
        $email = str_replace("%40", "@", $m);
        $usr = explode("=", $exp[5]);
    }
}else {
    if(isset($_GET['msg'])){
        $msg = "Pastikan: \r\n - Nomor tidak lebih dari 10 Digit\r\n - Nama tidak lebih dari 30 Karakter\r\n - Username tidak lebih dari 10 Karakter\r\n - Password tidak lebih dari 10 Karakter";
        echo "
        <div class='error'>
            <p>".nl2br($msg)."</p>
        </div>
        ";
        $ss = $_SERVER['REQUEST_URI'];
        $exp = explode("&", $ss);
        $nama = explode("=", $exp[1]);
        $telp = explode("=", $exp[2]);
        $m = explode("=", $exp[3]);
        $email = str_replace("%40", "@", $m);
        $usr = explode("=", $exp[4]);
    }elseif (isset($_GET['errem'])) {
        $msg = "Email telah terdaftar";
        echo "
        <div class='error'>
            <p>".nl2br($msg)."</p>
        </div>
        ";
        $ss = $_SERVER['REQUEST_URI'];
        $exp = explode("&", $ss);
        $nama = explode("=", $exp[1]);
        $telp = explode("=", $exp[2]);
        $m = explode("=", $exp[3]);
        $email = str_replace("%40", "@", $m);
        $usr = explode("=", $exp[4]);
    }elseif (isset($_GET['errus'])) {
        $msg = "Username telah terdaftar";
        echo "
        <div class='error'>
            <p>".nl2br($msg)."</p>
        </div>
        ";
        $ss = $_SERVER['REQUEST_URI'];
        $exp = explode("&", $ss);
        $nama = explode("=", $exp[1]);
        $telp = explode("=", $exp[2]);
        $m = explode("=", $exp[3]);
        $email = str_replace("%40", "@", $m);
        $usr = explode("=", $exp[4]);
    }
}
