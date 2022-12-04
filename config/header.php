<head>
    <script src="https://kit.fontawesome.com/698436603f.js" crossorigin="anonymous"></script>
</head>
<header class="marjin">
            <div class="grid text-center" style="--bs-columns: 18; --bs-gap: .5rem;">
                <div class="fa-regular" style="grid-column: span 14;">Sistem - Informasi</div>
            </div>
            <div class="grid text-center" style="--bs-columns: 18; --bs-gap: .5rem;">
                <div class="fa-regular" style="grid-column: span 14;">Kelompok 6</div>
            </div>
    <h3 class="txt-center">Pemesanan Tiket Pesawat</h3>
    <?php
        $url = $_SERVER['PHP_SELF'];
        $explode = explode("/", $url);
        if ($explode[2]=="index.php") {
    ?>
            <ul class="jstfy">
                <li class="jstfy-link active"><a class="fa-regular" href="index.php">Dashboard </a></li>
                <?php
                    if (isset($_SESSION['nama_pegawai'])) {
                        ?>
                        <li class="jstfy-link"><a class="fa-regular" href="laporan/index.php">Laporan</a></li>
                        <?php
                    }else {
                        ?>
                        <li class="jstfy-link"><a class="fa-regular" href="pemesanan/index.php">  Pemesanan</a></li>
                        <?php
                    }
                ?>
                <?php
                    if (isset($_SESSION['id'])) {
                ?>
                    <li class="dropdown jstfy-link">
                        <a href="../pelanggan/index.php" class="dropbtn"><?= $_SESSION['nama'] ?></a>
                        <div class="dropdown-content">
                            <a href="pelanggan/index.php">Profil</a>
                            <a href="config/logout.php">Keluar</a>
                        </div>
                    </li>
                <?php
                    }else {
                ?>
                    <li class="dropdown jstfy-link">
                        <a class="fa-regular fa-user" href="#" class="dropbtn">  Daftar / Masuk</a>
                        <div class="dropdown-content">
                            <a href="daftar/index.php">Daftar</a>
                            <a href="login/index.php">Masuk</a>
                        </div>
                    </li>
                <?php
                    }
                ?>
            </ul>
    <?php
        } elseif ($explode[2]=="daftar") {
    ?>
            <ul class="jstfy">
                <li class="jstfy-link"><a class="fa-regular" href="../index.php">Dashboard</a></li>
                <li class="jstfy-link"><a class="fa-regular" href="../pemesanan/index.php">Pemesanan</a></li>
                <?php
                    if (!isset($_SESSION['id'])) {
                ?>
                <li class="dropdown jstfy-link active">
                    <a class="fa-regular fa-user" href="#" class="dropbtn"> Daftar / Masuk</a>
                    <div class="dropdown-content">
                        <a href="../daftar/index.php" class="active-content">Daftar</a>
                        <a href="../login/index.php">Masuk</a>
                    </div>
                </li>
                <?php
                    }else {
                ?>
                <li class="dropdown jstfy-link">
                    <a href="../pelanggan/index.php" class="dropbtn"><?= $_SESSION['nama'] ?></a>
                    <div class="dropdown-content">
                        <a href="../pelanggan/index.php">Profil</a>
                        <a href="../config/logout.php">Keluar</a>
                    </div>
                </li>

                <?php
                    }
                ?>
            </ul>
    <?php
        } elseif ($explode[2]=="login") {
    ?>
            <ul class="jstfy">
                <li  class="jstfy-link"><a class="fa-regular" href="../index.php">Dashboard</a></li>
                <li class="jstfy-link"><a class="fa-regular" href="../pemesanan/index.php">Pemesanan</a></li>
                <?php
                    if (!isset($_SESSION['id'])) {
                ?>
                <li class="dropdown jstfy-link active">
                    <a class="fa-regular fa-user" href="#" class="dropbtn"> Daftar / Masuk</a>
                    <div class="dropdown-content">
                        <a href="../daftar/index.php">Daftar</a>
                        <a href="../login/index.php" class="active-content">Masuk</a>
                    </div>
                </li>
                <?php
                    }else {
                ?>
                <li class="dropdown jstfy-link">
                    <a href="../pelanggan/index.php" class="dropbtn"><?= $_SESSION['nama'] ?></a>
                    <div class="dropdown-content">
                        <a href="../pelanggan/index.php">Profil</a>
                        <a href="../config/logout.php">Keluar</a>
                    </div>
                </li>

                <?php
                    }
                ?>
            </ul>
    <?php
        } elseif ($explode[2]=="pelanggan") {
    ?>
        <ul class="jstfy">
            <li class="jstfy-link"><a class="fa-regular" href="../index.php">Dashboard</a></li>
            <li class="jstfy-link"><a class="fa-regular" href="../pemesanan/index.php">Pemesanan</a></li>
            <li class="dropdown jstfy-link">
                <a href="../pelanggan/index.php" class="dropbtn active"><?= $row['nama_pelanggan'] ?></a>
                <div class="dropdown-content">
                    <a href="../pelanggan/index.php" class="active-content">Profil</a>
                    <a href="../config/logout.php">Keluar</a>
                </div>
            </li>
        </ul>
    <?php
        } elseif ($explode[2]=="pemesanan") {
    ?>
            <ul class="jstfy">
                <li class="jstfy-link"><a class="fa-regular" href="../index.php">Dashboard</a></li>
                <li class="jstfy-link active"><a class="fa-regular" href="index.php">Pemesanan</a></li>
                <?php
                    if (isset($_SESSION['id'])) {
                ?>
                    <li class="dropdown jstfy-link">
                        <a href="../pelanggan/index.php" class="dropbtn"><?= $_SESSION['nama'] ?></a>
                        <div class="dropdown-content">
                            <a href="../pelanggan/index.php">Profil</a>
                            <a href="../config/logout.php">Keluar</a>
                        </div>
                    </li>
                <?php
                    }else {
                ?>
                    <li class="dropdown jstfy-link">
                        <a class="fa-regular fa-user" href="#" class="dropbtn"> Daftar / Masuk</a>
                        <div class="dropdown-content">
                            <a href="../daftar/index.php">Daftar</a>
                            <a href="../login/index.php">Masuk</a>
                        </div>
                    </li>
                <?php
                    }
                ?>
            </ul>
    <?php
        } elseif ($explode[2]=="laporan") {
    ?>
            <ul class="jstfy">
                <li class="jstfy-link"><a class="fa-regular" href="../index.php">Dashboard</a></li>
                <?php
                    if (isset($_SESSION['nama_pegawai'])) {
                        ?>
                        <li class="jstfy-link active"><a class="fa-regular" href="index.php">Laporan</a></li>
                        <?php
                    }else {
                        ?>
                        <li class="jstfy-link"><a class="fa-regular" href="../pemesanan/index.php">Pemesanan</a></li>
                        <?php
                    }
                ?>
                <?php
                    if (isset($_SESSION['id'])) {
                ?>
                    <li class="dropdown jstfy-link">
                        <a href="../pegawai/index.php" class="dropbtn"><?= $_SESSION['nama'] ?></a>
                        <div class="dropdown-content">
                            <a href="../pegawai/index.php">Profil</a>
                            <a href="../config/logout.php">Keluar</a>
                        </div>
                    </li>
                <?php
                    }else {
                ?>
                    <li class="dropdown jstfy-link">
                        <a class="fa-regular fa-user" href="#" class="dropbtn"> Daftar / Masuk</a>
                        <div class="dropdown-content">
                            <a href="../daftar/index.php">Daftar</a>
                            <a href="../login/index.php">Masuk</a>
                        </div>
                    </li>
                <?php
                    }
                ?>
            </ul>
    <?php
        }elseif ($explode[2]=="pegawai") {
    ?>
            <ul class="jstfy">
                <li class="jstfy-link"><a class="fa-regular" href="../index.php">Dashboard</a></li>
                <li class="jstfy-link"><a class="fa-regular" href="../laporan/index.php">Laporan</a></li>
                <li class="dropdown jstfy-link">
                    <a href="#" class="dropbtn active"><?= $row['nama_pegawai'] ?></a>
                    <div class="dropdown-content">
                        <a href="../pelanggan/index.php" class="active-content">Profil</a>
                        <a href="../config/logout.php">Keluar</a>
                    </div>
                </li>
            </ul>
    <?php
        }
    ?>
</header>
