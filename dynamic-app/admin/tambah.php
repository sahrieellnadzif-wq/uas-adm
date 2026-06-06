<?php
session_start();

include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../assets/uploads/".$gambar
    );

    mysqli_query($conn,"
    
    INSERT INTO berita
    (judul, isi, gambar)

    VALUES

    ('$judul','$isi','$gambar')
    
    ");

    echo "
    <script>
    alert('Berita berhasil ditambah');
    window.location='dashboard.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Berita</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-white p-10">

<h1 class="text-5xl font-bold mb-10">
➕ TAMBAH BERITA
</h1>

<form
method="POST"
enctype="multipart/form-data"
class="max-w-2xl"
>

<input
type="text"
name="judul"
placeholder="Judul berita"
class="w-full p-4 rounded-xl text-black mb-5"
required
>

<textarea
name="isi"
placeholder="Isi berita"
class="w-full p-4 rounded-xl text-black mb-5 h-60"
required
></textarea>

<input
type="file"
name="gambar"
class="mb-5"
required
>

<button
name="submit"
class="bg-cyan-500 px-8 py-4 rounded-xl"
>
UPLOAD BERITA
</button>

</form>

</body>
</html>