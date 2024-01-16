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
