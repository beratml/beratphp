<?php

session_start();

if (!isset($_SESSION['user'])) {
  die('Giriş Yetkiniz Yoktur');
}

require_once('baglan.php');

$sorgu_yorum = $db ->prepare('select count(*) from yorumlar where adminonay=0 ');
$sorgu_yorum->execute();
$yeni_yorum = $sorgu_yorum->fetchColumn();


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.css">

  <!-- Style Css -->
  <link rel="stylesheet" href="../css/style.css">

  <!-- CK Editor 4 Cdn -->
  <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>

  <title>Hello, world!</title>
</head>

<body>

  <!-- Menü Section Start -->
  <section id="adminNav">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 bg-dark py-3" style="height: 100vh;">
          <img src="../img/ari-bilgi-beyaz.png" class="img-fluid">
          <ul class="p-0 mt-4">
            <li><a href="dashboard.php">Başlangıç</a></li>
            <li><a href="sayfalar.php">Sayfalar</a></li>
            <li><a href="yazilar.php">Yazılar</a></li>
            <li><a href="yorumlar.php">Yorumlar</a> <small class="text-white"><span class="badge badge-danger"><?php echo $yeni_yorum; ?></span></small></li>
            <li><a href="kategori.php">Kategoriler</a></li>
            <li><a href="mesajlar.php">Mesajlar</a></li>
            <li><a href="ebultenuye.php">E-Bülten Üyeler</a></li>
            <li><a href="sidebar.php">Sidebar Ayarlar</a></li>
            <li><a href="reklam.php">Reklam Ayarları</a></li>
            <li><a href="ayarlar.php">Ayarlar</a></li>
            <li><a href="logout.php">Çıkış</a></li>
          </ul>
        </div>
        <div class="col-md-10 py-3" style="height: 100vh;">