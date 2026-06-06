<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn,"
SELECT * FROM berita
WHERE id='$id'
");

$data = mysqli_fetch_array($query);

unlink("../assets/uploads/".$data['gambar']);

mysqli_query($conn,"
DELETE FROM berita
WHERE id='$id'
");

header("Location: ../index.php");
?>