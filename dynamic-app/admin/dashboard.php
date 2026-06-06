<?php
session_start();

include '../config/koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

$query = mysqli_query($conn,"
SELECT * FROM berita
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Neural Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- ICON -->

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>

<style>

body{

    background:
    radial-gradient(circle at top left,#00ffff22,transparent 20%),
    radial-gradient(circle at bottom right,#ff00ff22,transparent 20%),
    linear-gradient(135deg,#020617,#050816,#0f172a);

    color:white;

    font-family:Arial;
}

.glass{

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,0.08);
}

.card{

    transition:0.4s;
}

.card:hover{

    transform:translateY(-5px);

    box-shadow:
    0 0 25px rgba(0,255,255,0.15);
}

.delete-btn{

    width:55px;
    height:55px;

    border-radius:18px;

    background:#ef4444;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:22px;

    transition:0.3s;
}

.delete-btn:hover{

    transform:scale(1.08);

    box-shadow:0 0 20px #ef4444;
}

.add-btn{

    background:cyan;

    color:black;

    padding:15px 25px;

    border-radius:18px;

    font-weight:bold;

    transition:0.3s;
}

.add-btn:hover{

    transform:scale(1.05);

    box-shadow:0 0 20px cyan;
}

</style>

</head>

<body class="p-10">

<!-- HEADER -->

<div class="flex justify-between items-center mb-10">

<div>

<h1 class="text-6xl font-black mb-2">
🧠 DASHBOARD
</h1>

<p class="text-zinc-400">
Manage futuristic AI news platform
</p>

</div>

<a
href="tambah.php"
class="add-btn"
>
+ Tambah Berita
</a>

</div>

<!-- NEWS -->

<div class="grid gap-6">

<?php while($data=mysqli_fetch_array($query)) { ?>

<div class="glass card rounded-3xl p-6 flex items-center gap-6">

<!-- IMAGE -->

<img
src="../assets/uploads/<?php echo $data['gambar']; ?>"
class="w-52 h-36 object-cover rounded-2xl"
>

<!-- CONTENT -->

<div class="flex-1">

<p class="text-cyan-400 mb-2 text-sm">
<?php echo $data['kategori']; ?>
</p>

<h2 class="text-3xl font-bold mb-3">
<?php echo $data['judul']; ?>
</h2>

<p class="text-zinc-400 leading-relaxed">

<?php
echo substr(strip_tags($data['isi']),0,140);
?>

...

</p>

</div>

<!-- DELETE -->

<a
href="hapus.php?id=<?php echo $data['id']; ?>"
onclick="return confirm('Yakin hapus berita ini?')"
class="delete-btn"
>

<i class="fa-solid fa-trash"></i>

</a>

</div>

<?php } ?>

</div>

</body>
</html>