<?php
include "functions.php";

$id = $_GET['id'];

if (delete($id) > 0) {
    echo "<script>
            alert('Data taruna berhasil di hapus!');
            document.location.href = '../index.php';
        </script>";
} else {
    echo "<script>
            alert('Data taruna berhasil di hapus!');
        </script>";
}
