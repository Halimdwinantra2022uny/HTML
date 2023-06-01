<?php
    $value1 = 'Aji';
    $value2 = 'Aji Somplak';
    setcookie("username", $value1);
    setcookie("nama_lengkap", $value2, time()+3600); //loginnya expired 1 jam
    echo "<h2>Ini halaman untuk set cookie</h2>";
    echo "<h2>Klik <a href='cookies2.php'>disini </a> untuk mengecek cookies.";
?>