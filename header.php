<?php require_once('baglan.php'); ?>

<?php

$sorgu = $db -> prepare('select * from ayarlar order by id desc limit 1');
$sorgu -> execute();

if($sorgu -> rowCount()){
  foreach($sorgu as $satir){
    $logo = $satir['logo'];
  }
} else {
  echo 'Data Bulunamadı';
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <link rel="stylesheet" href="css/style.css">

  <title>Hello, world!</title>
</head>

<body>

  <!-- Menü Section Start -->
  <section id="menu">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="<?php echo substr($logo,3); ?>" alt="" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sample.php">Hakkımda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                    Hizmetler
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="sample.php">Web Tasarım Hizmeti</a>
                    <a class="dropdown-item" href="sample.php">Grafik Tasarım Hizmeti</a>
                    <a class="dropdown-item" href="sample.php">Dijital Pazarlama Hizmeti</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="iletisim.php">İletişim</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- Menü Section End -->