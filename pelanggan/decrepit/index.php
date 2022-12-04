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
                    <th>Nama Pelanggan</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Tindakan</th>
                </tr>
                <?php
                    include '../koneksi.php';
                    $nomor = 1;
                    $querry = "SELECT * FROM pelanggan";
                    $results = mysqli_query($koneksi, $querry);
                    if (mysqli_num_rows($results)>0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo "
                                <tr>
                                    <td>".$nomor++."</td>
                                    <td>".$row['nama_pelanggan']."</td>
                                    <td>".$row['nomor_telfon']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['username']."</td>
                                    <td>
                                        <a class='btn-edit' href='edit.php?id=".$row['id_pelanggan']."'>Edit</a>
                                        <a class='btn-hapus' href='hapus.php?id=".$row['id_pelanggan']."' onclick='javascript:return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Delete</a>
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
