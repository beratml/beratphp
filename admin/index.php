<?php
session_start();
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

  <title>Hello, world!</title>
</head>

<body>

  <!-- Admin Login Start -->
  <section id="login">
    <div class="container">
      <div class="row" style="height: 70vh;">
        <div class="col-md-4 mx-auto my-auto bg-light p-4">
          <img src="../img/ari-bilgi.png" class="img-fluid">
          <form method="post" class="mt-3">
            <div class="form-group">
              <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adınız">
            </div>
            <div class="form-group">
              <input type="password" name="sifre" class="form-control" placeholder="Şifreniz">
            </div>
            <div class="form-group">
              <input type="submit" value="Giriş" class="btn btn-success w-100">
            </div>
          </form>
          <?php
          if ($_POST) {
            $kadi = $_POST['kadi'];
            $sifre = $_POST['sifre'];
            if ($kadi == 'Admin' && $sifre == '123') {
              $_SESSION['user'] = $kadi;
              echo '<div class="alert alert-success">Kullanıcı Adı ve Şifreniz Doğru</div>';
              echo '<meta http-equiv="refresh" content="2; url=dashboard.php">';
            } else {
              echo '<div class="alert alert-danger">Kullanıcı Adı ve/veya Şifreniz Yanlış</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Admin Login End -->






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>