<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Lihat Detail Data</title>
    <style>
        *{
            margin: 0;
            padding: 8px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            color: #A459D1;
        } 
        .container{
            width: 100%;
            padding: 40px;
            background-color: #472D2D;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
            justify-content: center;
            align-item: center;
        }
        .teks{
            text-align: center;
        }
        .container-fluid{
            justify-content: center;
            align-item: center;
            width: 100%;
            padding: 83px;
            background-color: #FCC8D1;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 0px;
        }
    </style>
</head>
<body style=background:url("https://i.pinimg.com/originals/d2/0a/2b/d20a2bce9fce929f8f213c5962d0661e.jpg");>
    <div class="container-fluid">
        <div class="container">
            <div class="teks">
                <h1 style="font-size:5vw">Detail Data</h1>
            </div>
        </div>
        <br>
        <br>
        <div class="container p-5 my-5 bg-dark">
        <?php
                include ("koneksi.php");
                $nim = $_GET['nim'];
                $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                    <table>
                        <tr>
                            <td style="font-size:2vw">NIM</td>
                            <td style="font-size:2vw">: <?php echo $d['nim'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-size:2vw">Nama</td>
                            <td style="font-size:2vw">: <?php echo $d['nama'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-size:2vw">Alamat</td>
                            <td style="font-size:2vw">: <?php echo $d['alamat'] ?></td>
                        </tr>
                        <tr></tr>
                    </table>
                    <?php
                } ?>
            <div class="teks">
            <a href="dashboard.php" class="btn btn-success btn-lg">Klik Disini Untuk Kembali ke menu Awal</a>
            </div>
        </div>
    </div>
</body>
</html>