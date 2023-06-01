<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login S3</title>
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
    <img src="https://wallup.net/wp-content/uploads/2015/07/Cat-head-on-the-desk.jpg"width=550px
    style="display: block;margin-left: auto;margin-right: auto; width=300px;border:5px solid #576CBC">
    <font color="#674188">
        <h2 align="center">
            "Sampai berjumpa kembali "
        </h2> 
    </font>
</body>
</html>
<!-- Merupakan form php -->
<?php
    session_start();
    if (isset($_SESSION['login'])) {
        unset($_SESSION);
        session_destroy();
        echo "<h1> Kamu sudah berhasil logout/Keluar</h1>";
        echo "<h1>Klik <a href='studikasus1.php'>disini</a> untuk login lagi.<br> Kamu tidak dapat masuk ke 
        <a href='studikasus2.php'>HOME (beranda) </a> lagi.</h2>";
    }
?>