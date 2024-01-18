<?php
include "functions.php";

$id = $_GET['id'];

$tar = query("SELECT * FROM taruna WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD PHP Native</title>

    <!-- Style Files -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href=vendor/boxicons/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="" method="post" class="form-control mt-5 p-4">
                    <h1 class="fw-bold text-center my-3 text-success">Tambah Data Taruna RPL</h1>
                    <div class='alert alert-success d-none' id="alertSuccess" role='alert'>
                        Data berhasil diubah!
                    </div>
                    <div class='alert alert-danger d-none' id="alertFailed" role='alert'>
                        Data gagal diubah!
                    </div>
                    <input type="hidden" name="id" value="<?= $tar['id'] ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Taruna</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $tar['nama'] ?>">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="nit" class="form-label">NIT</label>
                            <input type="text" class="form-control" id="nit" name="nit" value="<?= $tar['nit'] ?>">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" value="<?= $tar['jenis_kelamin'] ?>">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $tar['jurusan'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $tar['email'] ?>" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="../index.php" name="submit" class="btn text-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($_POST['submit'])) : ?>
        <script>
            if (<?= edit($_POST) ?> > 0) {
                document.querySelector("#alertSuccess").classList.remove('d-none');
                setTimeout(function() {
                    document.location.href = "../index.php";
                }, 1000);
            } else {
                document.querySelector("#alertFailed").classList.remove('d-none');
                setTimeout(function() {
                    document.querySelector("#alertFailed").classList.add('d-none');
                }, 1500);
            }
        </script>
    <?php endif; ?>

    <!-- JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>