  <!-- Footer Section Start -->
  <footer id="footer" class="bg-dark text-white">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-3">
          <img src="<?php echo substr($logo, 3); ?>" alt=""><br>
          <small><?php echo $satir['tanitim']; ?></small> <br>
          <a href="<?php echo $satir['facebook']; ?>" target="_blank" style="font-size:22px;"><i class="bi bi-facebook"></i></a>
          <a href="<?php echo $satir['instagram']; ?>" target="_blank" style="font-size:22px;"><i class="bi bi-instagram"></i></a>
          <a href="<?php echo $satir['twitter']; ?>" target="_blank" style="font-size:22px;"><i class="bi bi-twitter"></i></a>
          <a href="<?php echo $satir['whatsapp']; ?>" target="_blank" style="font-size:22px;"><i class="bi bi-whatsapp"></i></a>
        </div>
        <div class="col-md-3">
          <h4>Hizmetler</h4>

          <?php
          $sorgu2 = $db->prepare('select * from sayfalar order by baslik desc');
          $sorgu2->execute();

          if ($sorgu2->rowCount()) {
            foreach ($sorgu2 as $satir2) {
              echo '<a href="sample.php?id=' . $satir2['id'] . '" style="font-size:14px;">' . $satir2['baslik'] . '</a><br>';
            }
          }
          ?>

        </div>
        <div class="col-md-3">
          <h4>İletişim</h4>
          <small><?php echo $satir['adres']; ?></small> <br>
          <small><?php echo $satir['telefon']; ?></small> <br>
          <small><?php echo $satir['email']; ?></small>
        </div>
        <div class="col-md-3">
          <h4>E-Bülten Üyelik</h4>
          <small>Yeni blog yazıları ve duyurular hakkında bilgi almak için üye olun.</small>

          <form method="post">
            <div class="form-group">
              <input type="email" name="ebulten" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success w-100" name="uyeolbuton">Üye Ol</button>
            </div>
          </form>

          <?php
          if (isset($_POST['uyeolbuton'])) {
            $sorgu = $db->prepare('insert into ebulten(ebulten) values(?)');
            $sorgu->execute(array($_POST['ebulten']));

            if ($sorgu->rowCount()) {
              echo 'Kayıt Başarılı';
            } else {
              'Hata Oluştu';
            }
          }
          ?>

        </div>
      </div>
      <div class="row pb-2">
        <div class="col-12 text-white text-center">
          <small>
            <?php echo $satir['copy'] . ' - ' . date('Y'); ?>
          </small>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  </body>

  </html>