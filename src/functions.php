<?php

// Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "php_crud");

// Query data dari table taruna
// $result = mysqli_query($db, "SELECT * FROM taruna");
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Menambahkan data taruna menggunakan method POST
function insert($data)
{
    global $db;
    $nama = htmlspecialchars($data['nama']);
    $nit = htmlspecialchars($data['nit']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $jk = htmlspecialchars($data['jenis_kelamin']);
    $email = htmlspecialchars($data['email']);

    $query = "INSERT INTO taruna VALUES (NULL, '$nama', '$nit', '$jurusan', '$jk', '$email')";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Menghapus data taruna menggunakan method GET
function delete($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM taruna WHERE id = $id");

    return mysqli_affected_rows($db);
}

// Edit data taruna menggunakan method GET
function edit($data)
{
    global $db;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nit = htmlspecialchars($data['nit']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $jk = htmlspecialchars($data['jenis_kelamin']);
    $email = htmlspecialchars($data['email']);

    $query = "UPDATE taruna SET
                nama = '$nama',
                nit = '$nit',
                jurusan = '$jurusan',
                jenis_kelamin = '$jk',
                email = '$email'
              WHERE id = $id
    ";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Searching Function
function search($keyword)
{
    $query = "SELECT * FROM taruna
                WHERE
              nama LIKE '%$keyword%' OR
              nit LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%' OR
              jenis_kelamin LIKE '%$keyword%' OR
              email LIKE '%$keyword%'
    ";
    return query($query);
}

// Registration Function
function registration($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // Cek konfirmasi password
    if ($password !== $password2) {
        return false;
    }

    // Cek Username sama
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Menambahkan user ke dalam database
    mysqli_query($db, "INSERT INTO users VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($db);
}
