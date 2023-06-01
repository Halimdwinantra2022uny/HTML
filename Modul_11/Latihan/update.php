<?php
    include "koneksi.php";
    $nim = $_POST['NIM'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET Nama='$nama', Alamat='$alamat' WHERE NIM='$nim'");

    header("location:full.php?pesan=update");
?>