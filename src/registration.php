<?php
include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD PHP Native</title>

    <!-- Style Files -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="" method="post" class="mt-5 p-4 form-control">
                    <h1 class="fw-bold text-center my-3 text-success">Registration</h1>
                    <p class="text-center mb-3">Fill out the form to register to our event</p>

                    <div class='alert alert-success d-none' id="alertSuccess" role='alert'>
                        User baru berhasil ditambahkan!
                    </div>
                    <div class='alert alert-danger d-none' id="alertFailed" role='alert'>
                        User gagal ditambahkan!
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your Username.." required>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password..">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm your password..">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-full" name="register">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($_POST['register'])) : ?>
        <script>
            if (<?= registration($_POST) ?> > 0) {
                document.querySelector("#alertSuccess").classList.remove('d-none');
                setTimeout(function() {
                    document.location.href = "login.php";
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