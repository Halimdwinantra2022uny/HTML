<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'") or die();
    $no = 1;
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        color: #A459D1;
    }

    .container {
        width: 100%;
        padding: 20px;
        background-color: #472D2D;
        box-shadow: 0px 0px 5px #fff;
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
        width: 90%;
        padding: 80px;
        background-color: #000000;
        box-shadow: 0px 0px 0px #fff;
        border-radius: 0px;
        background: transparent;
        border: none;
    }
    </style>
    
    <!-- Javascript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
        function confirmUpdate() {
            return confirm("Apakah anda ingin mengubah data?");
        }
    </script>
</head>
<body style=background:url("https://i.pinimg.com/originals/d2/0a/2b/d20a2bce9fce929f8f213c5962d0661e.jpg");>
    <div class="container-fluid">
        <div class="container">
            <div class="teks">
                <h1>
                    Update Data Mahasiswa milik <?= $data['nama'] ?>
                </h1>
            </div>
        </div>
        <div class="container">
        <a href="dasboard.php" class= "btn btn-primary">Lihat Semua Data</a>
        <div class="container p-5 my-5 bg-dark">
            <?php
            $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die();
            $no = 1;
            while($d = mysqli_fetch_array($data)) {
                ?>
            <form action="update.php" method="post" onsubmit="return confirmUpdate()">
                <input type="hidden" name="id" value="<?php echo $d['id'] ?> ">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="NIM" value="<?php echo $d['nim'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="Nama" value="<?php echo $d['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" cols="30" rows="10" name="alamat" id="Alamat" required><?php echo $d['alamat'] ?></textarea>
                    </div>
                    <div class="flex">
                        <button class="btn btn-primary" type="submit" name="update">
                            Perbarui
                        </button>
                        <a href="dashboard.php" class="btn btn-danger">Batal</a>
                    </div>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>