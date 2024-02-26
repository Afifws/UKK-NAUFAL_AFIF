<?php
require 'koneksi.php';
require 'cek.php';

if(isset($_POST['username'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(kotas.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed; 
        }
        .btn {
            background-color: #8acaff;
            border-radius: 20px;
            color: black;
            font-weight: bold;
            text-decoration: none;
            margin: 10px;
            font-size: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <section>
        <div style="text-align: center;font-size: 120px;color: white; margin-top: 140px; font-weight:bold;">Kasir</div>
        <div style="text-align: center; color: white; font-size: 25px;margin-top: 25px;">Welcome Admin</div>
        <div style="text-align: center; margin-top: 70px;">
            <a href="dpenjualan.php" class="btn">Masuk</a>
        </div>
    </section>
</body>
</html>
