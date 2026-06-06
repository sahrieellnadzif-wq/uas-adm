<?php
session_start();

include '../config/koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $query = mysqli_query($conn,"
    SELECT * FROM admin
    WHERE username='$username'
    AND password='$password'
    ");

    if(mysqli_num_rows($query)>0){

        $_SESSION['login']=true;

        header("Location: dashboard.php");

    } else {

        echo "
        <script>
        alert('Username atau Password salah!');
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Neural News Login</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{
    margin:0;
    height:100vh;
    overflow:hidden;
    background:
    radial-gradient(circle at top left,#00ffff22,transparent 30%),
    radial-gradient(circle at bottom right,#ff00ff22,transparent 30%),
    linear-gradient(135deg,#050816,#0f172a,#020617);
    font-family:Arial;
}

.bg-animation{
    position:absolute;
    width:200%;
    height:200%;
    background:
    repeating-linear-gradient(
        45deg,
        transparent,
        transparent 40px,
        rgba(255,255,255,0.03) 40px,
        rgba(255,255,255,0.03) 80px
    );
    animation:moveBg 15s linear infinite;
}

@keyframes moveBg{
    from{
        transform:translate(0,0);
    }
    to{
        transform:translate(-200px,-200px);
    }
}

.login-box{
    position:relative;
    width:420px;
    padding:50px;
    border-radius:30px;
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,0.1);

    box-shadow:
    0 0 20px rgba(0,255,255,0.2),
    0 0 50px rgba(0,255,255,0.1);

    z-index:2;
}

.glow{
    position:absolute;
    width:300px;
    height:300px;
    background:cyan;
    filter:blur(120px);
    opacity:0.15;
    border-radius:50%;
}

.glow1{
    top:-100px;
    left:-100px;
}

.glow2{
    bottom:-100px;
    right:-100px;
    background:magenta;
}

.input{
    width:100%;
    padding:18px;
    margin-bottom:20px;
    border:none;
    outline:none;
    border-radius:16px;
    background:rgba(255,255,255,0.08);
    color:white;
    font-size:16px;
}

.input::placeholder{
    color:#cbd5e1;
}

.input:focus{
    background:rgba(255,255,255,0.15);
    box-shadow:0 0 20px cyan;
}

.btn{
    width:100%;
    padding:18px;
    border:none;
    border-radius:16px;
    background:linear-gradient(90deg,cyan,#00bfff);
    color:white;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.03);
    box-shadow:0 0 30px cyan;
}

.center{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.title{
    color:white;
    font-size:50px;
    font-weight:900;
    margin-bottom:10px;
    text-align:center;
}

.subtitle{
    color:#94a3b8;
    text-align:center;
    margin-bottom:40px;
}

</style>

</head>

<body>

<div class="bg-animation"></div>

<div class="glow glow1"></div>
<div class="glow glow2"></div>

<div class="center">

<div class="login-box">

<h1 class="title">
🧠 NEURALS
</h1>

<p class="subtitle">
Future News Administration System
</p>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
class="input"
required
>

<input
type="password"
name="password"
placeholder="Password"
class="input"
required
>

<button class="btn" name="login">
LOGIN SYSTEM
</button>

</form>

</div>

</div>

</body>
</html>