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
            <a href="tambah.php" class="btn-tambah">Tambah</a>
            <table border="1" class="senter" width="100%">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Pegawai</th>
                    <th>Tindakan</th>
                </tr>
                <?php
                    include '../koneksi.php';
                    $nomor = 1;
                    $querry = "SELECT * FROM pegawai";
                    $results = mysqli_query($koneksi, $querry);
                    if (mysqli_num_rows($results)>0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo "
                                <tr>
                                    <td>".$nomor++."</td>
                                    <td>".$row['nama_pegawai']."</td>
                                    <td>
                                        <a class='btn-edit' href='edit.php?id=".$row['id_pegawai']."'>Edit </a>
                                        <a class='btn-hapus' href='hapus.php?id_pegawai=".$row['id_pegawai']."' onclick='javascript:return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'> Hapus</a>
                                    </td>
                                </tr>
                            ";
                        }
                    }
                ?>
            </table>
        </div>
    </body>
</html>
