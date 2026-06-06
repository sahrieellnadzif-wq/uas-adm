<?php
include 'config/koneksi.php';

$kategori = isset($_GET['kategori'])
? $_GET['kategori']
: 'Home';

if($kategori == 'Home'){

    $query = mysqli_query($conn,"
    SELECT * FROM berita
    ORDER BY id DESC
    ");

}else{

    $query = mysqli_query($conn,"
    SELECT * FROM berita
    WHERE kategori='$kategori'
    ORDER BY id DESC
    ");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>NEURAL NEWS</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:
    radial-gradient(circle at top left,#00ffff22,transparent 20%),
    radial-gradient(circle at bottom right,#ff00ff22,transparent 20%),
    linear-gradient(135deg,#020617,#050816,#0f172a);

    color:white;

    font-family:Arial;

    overflow-x:hidden;
}

/* TOGGLE */

.toggle-btn{

    position:fixed;

    top:20px;
    left:20px;

    width:60px;
    height:60px;

    border-radius:18px;

    background:rgba(255,255,255,0.08);

    backdrop-filter:blur(20px);

    display:flex;

    justify-content:center;
    align-items:center;

    font-size:28px;

    cursor:pointer;

    z-index:2000;

    transition:0.3s;
}

.toggle-btn:hover{

    transform:scale(1.05);

    box-shadow:0 0 20px cyan;
}

/* SIDEBAR */

.sidebar{

    position:fixed;

    top:0;
    left:-300px;

    width:270px;
    height:100vh;

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(20px);

    border-right:1px solid rgba(255,255,255,0.08);

    transition:0.4s;

    z-index:1000;

    padding:25px;

    display:flex;

    flex-direction:column;
}

.sidebar.active{
    left:0;
}

/* LOGO */

.logo{

    font-size:42px;

    font-weight:900;

    margin-top:70px;

    margin-bottom:40px;

    background:linear-gradient(90deg,cyan,white,#ff00ff);

    -webkit-background-clip:text;

    -webkit-text-fill-color:transparent;
}

/* MENU */

.menu{

    flex:1;
}

.menu a{

    display:flex;

    align-items:center;

    gap:12px;

    text-decoration:none;

    color:white;

    font-size:15px;

    padding:14px 16px;

    border-radius:14px;

    margin-bottom:10px;

    transition:0.3s;
}

.menu a:hover{

    background:rgba(255,255,255,0.08);

    transform:translateX(8px);
}

/* PROFILE */

.profile{

    background:rgba(255,255,255,0.05);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:18px;

    padding:14px;

    display:flex;

    align-items:center;

    gap:12px;
}

.profile img{

    width:55px;
    height:55px;

    border-radius:50%;

    border:2px solid cyan;

    object-fit:cover;
}

.profile h3{

    font-size:15px;

    margin-bottom:3px;
}

.profile p{

    font-size:12px;

    color:#94a3b8;

    margin-bottom:8px;
}

.edit-btn{

    display:inline-block;

    background:cyan;

    color:black;

    padding:6px 12px;

    border-radius:10px;

    text-decoration:none;

    font-size:12px;

    font-weight:bold;
}

/* CONTENT */

.content{

    padding:100px 40px 40px 40px;
}

/* HERO */

.hero{

    margin-bottom:60px;

    text-align:center;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;
}

.hero h1{

    font-size:80px;

    line-height:1;

    margin-bottom:20px;

    background:linear-gradient(90deg,cyan,white,#ff00ff);

    -webkit-background-clip:text;

    -webkit-text-fill-color:transparent;
}

.hero p{

    color:#94a3b8;

    font-size:22px;
}

/* NEWS GRID */

.grid-news{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(320px,1fr));

    gap:30px;
}

/* CARD */

.card{

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:28px;

    overflow:hidden;

    transition:0.4s;
}

.card:hover{

    transform:
    translateY(-10px)
    scale(1.02);

    box-shadow:
    0 0 30px rgba(0,255,255,0.2);
}

.card img{

    width:100%;
    height:230px;

    object-fit:cover;
}

.card-content{

    padding:24px;

    display:flex;

    flex-direction:column;

    height:320px;
}

.category{

    color:cyan;

    font-size:14px;

    margin-bottom:12px;
}

.card h2{

    font-size:28px;

    margin-bottom:15px;

    line-height:1.2;
}

.desc{

    flex:1;

    color:#94a3b8;

    line-height:1.8;

    font-size:15px;
}

/* BUTTON */

.button-area{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-top:20px;
}

.btn{

    display:inline-block;

    background:cyan;

    color:black;

    padding:12px 20px;

    border-radius:12px;

    text-decoration:none;

    font-weight:bold;

    transition:0.3s;
}

.btn:hover{

    transform:scale(1.05);

    box-shadow:0 0 20px cyan;
}

.delete-icon{

    width:34px;

    height:34px;

    border-radius:10px;

    background:rgba(255,255,255,0.08);

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    text-decoration:none;

    font-size:14px;

    transition:0.3s;
}

.delete-icon:hover{

    background:rgba(255,255,255,0.15);
}

/* MOBILE */

@media(max-width:768px){

    .hero h1{
        font-size:52px;
    }

    .hero p{
        font-size:18px;
    }

    .content{
        padding:100px 20px;
    }

}

</style>

</head>

<body>

<!-- TOGGLE -->

<div class="toggle-btn" onclick="toggleSidebar()">
☰
</div>

<!-- SIDEBAR -->

<div class="sidebar" id="sidebar">

<div class="logo">
NEURAL
</div>

<div class="menu">

<a href="index.php?kategori=Home">
🏠 Home
</a>

<a href="index.php?kategori=Trending">
🔥 Trending
</a>

<a href="index.php?kategori=Technology">
💻 Technology
</a>

<a href="index.php?kategori=AI">
🤖 AI
</a>

<a href="admin/dashboard.php">
⚡ Dashboard
</a>

</div>

<!-- PROFILE -->

<div class="profile">

<img src="https://i.pravatar.cc/150">

<div>

<h3>
Sahrieell Neural
</h3>

<p>
AI News Founder
</p>

<a href="#" class="edit-btn">
Edit
</a>

</div>

</div>

</div>

<!-- CONTENT -->

<div class="content">

<div class="hero">

<h1>
THE FUTURE OF NEWS
</h1>

<p>
International futuristic cyberpunk AI media platform.
</p>

</div>

<!-- NEWS -->

<div class="grid-news">

<?php while($data=mysqli_fetch_array($query)) { ?>

<div class="card">

<img
src="assets/uploads/<?php echo $data['gambar']; ?>"
>

<div class="card-content">

<div class="category">
<?php echo $data['kategori']; ?>
</div>

<h2>
<?php echo $data['judul']; ?>
</h2>

<p class="desc">

<?php
echo substr(strip_tags($data['isi']),0,120);
?>

...

</p>

<div class="button-area">

<a
href="berita.php?id=<?php echo $data['id']; ?>"
class="btn"
>
Read More
</a>

<a
href="admin/hapus.php?id=<?php echo $data['id']; ?>"
onclick="return confirm('Yakin hapus berita ini?')"
class="delete-icon"
>
🗑
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

<script>

function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("active");

}

</script>

</body>
</html>