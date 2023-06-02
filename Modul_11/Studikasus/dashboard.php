<?php
    include ("koneksi.php");

    if (isset($_POST['tambah_data'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
    
        $query = mysqli_query($koneksi, "INSERT INTO db_studikasus (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");
    
        if ($query) {
            $message = (object) [
                'type' => 'success',
                'text' => 'Berhasil menambah data'
            ];
            header("location: dasboard.php");
        } else {
            echo "Gagal tambah data";
        }
    }
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: loginpage.php");
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <title>Dashboard</title>

    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .box {
            width: 100%;
            padding: 50px;
            background-color: pink;
            box-shadow: 0px 0px 5px #000;
            border-radius: 40px;
        }

        .table {
            color: purple;
        }
        .table-striped>tbody>tr:nth-child(odd)>td {
            color: purple;
        }
    </style>
    
    <!-- Javascript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });

        function confirmLogout() {
            return confirm("Apakah anda ingin logout?");
        }

        function confirmDelete() {
            return confirm("Apakah anda ingin menghapus data?");
        }

        function confirmInsert() {
            return confirm("Apakah anda ingin menambahkan data?");
        }

        function confirmUpdate() {
            return confirm("Apakah anda ingin mengubah data?");
        }
    </script>
</head>

<body style=background:url("https://i.pinimg.com/originals/d2/0a/2b/d20a2bce9fce929f8f213c5962d0661e.jpg");>
    <div class="container mt-5">
        <div class="box">
            <div class="d-flex justify-content-end align-items-center">
                <div class="ms-3">
                    <form action="" method="post" onsubmit="return confirmLogout()">
                        <button class="btn btn-danger" type="submit" name="logout">
                        <span class="spinner-border spinner-border-sm"></span>
                        Logout
                        </button>
                    </form>
                </div>
            </div>
            <h2 class="text-center mb-5">Data Mahasiswa</h2>
            <div class="box">
                <a href="tambahdata.php" class="btn btn-primary mb-3" class="spinner-border spinner-border-sm">Tambah Data</a>
                </form>
                <table class="table table-striped mt-3" id="data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Menu</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * from mahasiswa");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nim']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="lihat.php?nim=<?php echo $d['nim']; ?>">Lihat</a>
                                    <a class="btn btn-secondary" href="edit.php?nim=<?php echo $d['nim']; ?>">Edit</a>
                                    <a class="btn btn-dark" href="hapus.php?nim=<?php echo $d['nim']; ?>" onclick="return confirmDelete()">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>