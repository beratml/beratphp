<?php require_once('header.php'); ?>

<!-- Sayfa Ekleme Start -->
<section id="sayfaEkla">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Sayfa Ekle</h2>
            </div>
        </div>
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="baslik" class="form-control" placeholder="Başlık Ekleyin">
                </div>
                <div class="form-group">
                    <textarea name="icerik" rows="10" class="form-control" placeholder="Sayfa İçeriğini Ekleyin"></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <textarea name="meta" rows="4" class="form-control" placeholder="Meta Açıklaması Girin"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="file" name="foto">
                </div>
                <div class="form-group">
                    <select name="durum" class="form-control">
                        <option value="">Yayın Durumu</option>
                        <option value="taslak">Taslak</option>
                        <option value="yayinlandi">Yayınlandı</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="fotoalt" placeholder="Görsel Alt Etiketi Girin" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="seotitle" class="form-control" placeholder="Sayfa Başlığı Girin">
                </div>
                <div class="form-group">
                    <input type="date" name="tarih" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="btn btn-success w-100">
                </div>
                <?php
                if ($_POST) {
                    $dizin = "../img/";
                    $yuklenecekfoto = $dizin . $_FILES['foto']['name'];
                    $baslik = $_POST['baslik'];
                    $icerik = $_POST['icerik'];
                    $meta = $_POST['meta'];
                    $durum = $_POST['durum'];
                    $fotoalt = $_POST['fotoalt'];
                    $seotitle = $_POST['seotitle'];
                    $tarih = $_POST['tarih'];

                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecekfoto)) {
                        $sorgu = $db -> prepare('insert into sayfalar(baslik,icerik,meta,foto,durum,fotoalt,seotitle,tarih) values(?,?,?,?,?,?,?,?)');
                        $sorgu -> execute(array($baslik,$icerik,$meta,$yuklenecekfoto,$durum,$fotoalt,$seotitle,$tarih));

                        if($sorgu -> rowCount()){
                            echo '<div class="alert alert-success">Kayıt Eklendi</div>';
                            echo '<meta http-equiv="refresh" content="2; url=sayfalar.php">';
                        } else{
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                            echo '<meta http-equiv="refresh" content="2; url=sayfalar.php">';
                        }
                    }
                }
                ?>
            </div>
        </form>
    </div>
</section>
<!-- Sayfa Ekleme End -->


<?php require_once('footer.php'); ?>