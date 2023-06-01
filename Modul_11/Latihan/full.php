<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>

<body>
    <h3>Data Mahasiswa</h3>
    <h5>Menambahkan data mahasiswa</h5>
    <form action="tambah_aksi_full.php" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>

    <h5>Menampilkan Data Mahasiswa</h5>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Menu</th>
        </tr>
        <?php
        include("koneksi.php");
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * from mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NIM']; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['Alamat']; ?></td>
                <td>
                    <a href="lihat.php?nim=<?php echo $d['NIM']; ?>">Lihat</a>
                    <a href="edit.php?nim=<?php echo $d['NIM']; ?>">Edit</a>
                    <a href="hapus.php?nim=<?php echo $d['NIM']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>