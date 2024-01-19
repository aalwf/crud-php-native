<?php
include "src/functions.php";
$taruna = query("SELECT * FROM taruna");

if (isset($_POST['search'])) {
    $taruna = search($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD PHP Native</title>

    <!-- Style Files -->
    <link rel="stylesheet" href="src/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/vendor/boxicons/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 m-auto">
                <h1 class="fw-bold text-center pt-5 text-success">Data Taruna RPL</h1>
                <p class="text-center">PHP Native CRUD</p>

                <div class="row">
                    <div class="col-2">
                        <a href="src/add.php" class="btn btn-success text-center mb-2"><i class='bx bx-plus-circle' style="line-height: 0;"></i> Tambah</a>
                    </div>
                    <div class="col-4">
                        <form action="" method="post">
                            <div class="input-group rounded">
                                <input type="text" class="form-control" placeholder="Cari.." aria-label="Search" aria-describedby="search-addon" name="keyword" autofocus autocomplete="off" />
                                <button class="input-group-text border-0" id="search-addon" name="search">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class='alert alert-danger d-none' id="alertFailed" role='alert'>
                    Data gagal ditambahkan!
                </div>
                <table class="table shadow-sm text-center align-middle" cellpadding="10">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIT</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($taruna as $tar) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $tar['nama']; ?></td>
                                <td><?= $tar['nit']; ?></td>
                                <td><?= $tar['jurusan']; ?></td>
                                <td><?= $tar['jenis_kelamin']; ?></td>
                                <td><?= $tar['email']; ?></td>
                                <td>
                                    <a href="src/edit.php?id=<?= $tar['id'] ?>" class="fs-4 text-primary">
                                        <i class='bx bx-edit-alt'></i>
                                    </a>
                                </td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#modal" type="button" class="fs-4 text-danger delete btn">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal" id="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Peringatan!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda akan menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="document.location = 'src/delete.php?id=<?= $tar['id'] ?>'" class="btn btn-danger delete">Delete</button>
                        <!-- <a href="" class="btn btn-danger">Delete</a> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function deleteAlert(bool) {
            if (bool === true) {
                document.querySelector("#alertSuccess").classList.remove('d-none');
                setTimeout(function() {}, 1500);
            } else {
                document.querySelector("#alertFailed").classList.remove('d-none');
                setTimeout(function() {
                    document.querySelector("#alertFailed").classList.add('d-none');
                }, 1500);
            }
        }
    </script>

    <!-- JS Files -->
    <script src="src/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>