<?php

include 'config/koneksi.php';

$id = $_GET['id'];

/* tambah views */

mysqli_query($conn,"
UPDATE berita
SET views = views + 1
WHERE id='$id'
");

/* ambil berita */

$query = mysqli_query($conn,"
SELECT * FROM berita
WHERE id='$id'
");

$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
<?php echo $data['judul']; ?>
</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{

    background:
    radial-gradient(circle at top left,#00ffff22,transparent 20%),
    radial-gradient(circle at bottom right,#ff00ff22,transparent 20%),
    linear-gradient(135deg,#020617,#050816,#0f172a);

    color:white;

    font-family:Arial;

    padding:40px;
}

.container{

    max-width:1000px;

    margin:auto;

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:30px;

    overflow:hidden;
}

img{

    width:100%;

    height:500px;

    object-fit:cover;
}

.content{

    padding:40px;
}

.category{

    color:cyan;

    margin-bottom:15px;

    font-size:14px;
}

h1{

    font-size:52px;

    margin-bottom:20px;

    line-height:1.1;
}

.meta{

    display:flex;

    gap:20px;

    color:#94a3b8;

    margin-bottom:30px;
}

.text{

    line-height:2;

    color:#d1d5db;

    font-size:18px;
}

.back{

    position:fixed;

    top:20px;
    left:20px;

    background:white;

    color:black;

    padding:12px 18px;

    border-radius:12px;

    text-decoration:none;

    font-weight:bold;
}

</style>

</head>

<body>

<a href="index.php" class="back">
← Back
</a>

<div class="container">

<img
src="assets/uploads/<?php echo $data['gambar']; ?>"
>

<div class="content">

<div class="category">
<?php echo $data['kategori']; ?>
</div>

<h1>
<?php echo $data['judul']; ?>
</h1>

<div class="meta">

<span>
👁 <?php echo $data['views']; ?> Views
</span>

<span>
❤️ <?php echo $data['likes']; ?> Likes
</span>

</div>

<div class="text">

<?php echo nl2br($data['isi']); ?>

</div>

</div>

</div>

</body>
</html>
