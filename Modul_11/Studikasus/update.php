<?php
    include "koneksi.php";
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat' WHERE id='$id'");

    header("location:dashboard.php?pesan=update");
?>