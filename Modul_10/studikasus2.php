<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login S2</title>
    <style>
     *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        color: #000000;
    }
    </style>
    
</head>
<body bgcolor="675D50">
    <font color="#000000">
        <h1 align="center" >
            "Halo Bang"
        </h1> 
    </font>
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['login'])) {
        echo "<h1>Selamat Datang, ". $_SESSION['login'] ."</h1><br>";
        echo "<h2>Halaman ini bisa tampil jika berhasil login. Ini adalah HOME (beranda) kamu.</h2><br>";
        echo "<h2>Klik <a href='studikasus3.php'>disini (studikasus3.php)</a> untuk logout (keluar)</h2><br>";
    } else {
        die ("<h2>Anda belum login! Anda harus login dahulu!<a href='studikasus1.php'>disini</h2></a");
    }
?>