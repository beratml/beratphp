<?php require_once('header.php'); ?>

<?php
$id = $_GET['id'];
$sorgu = $db->prepare("select * from sayfalar where id=$id");
$sorgu->execute();
$satir = $sorgu->fetch();
?>

<!-- Yazı Ekleme Start -->
<section id="yaziEkle">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Sayfa Düzenle</h2>
            </div>
        </div>
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="baslik" class="form-control" value="<?php echo $satir['baslik']; ?>">
                </div>
                <div class="form-group">
                    <textarea name="icerik" rows="10" class="form-control"><?php echo $satir['icerik']; ?></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <label><small>Meta (Sayfa) Açıklaması</small></label>
                    <textarea name="meta" rows="4" class="form-control"><?php echo $satir['meta']; ?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <img src="<?php echo $satir['foto']; ?>" class="img-fluid mb-2">
                    <input type="file" name="foto">
                </div>
                <div class="form-group">
                    <label><small>Yayın Durumu</small></label>
                    <select name="durum" class="form-control">
                        <?php
                        if ($satir['durum'] == 'taslak') {
                            $durum = "Taslak";
                        } else if ($satir['durum'] == 'yayinlandi') {
                            $durum = "Yayınlandı";
                        } else {
                            $durum = "Seçiniz";
                        }
                        ?>

                        <option value="<?php echo $satir['durum']; ?>"><?php echo $durum; ?></option>
                        <option value="taslak">Taslak</option>
                        <option value="yayinlandi">Yayınlandı</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><small>Görsel Alt Metni</small></label>
                    <input type="text" name="fotoalt" class="form-control" value="<?php echo $satir['fotoalt']; ?>">
                </div>
                <div class="form-group">
                    <label><small>Sayfa Başlığı</small></label>
                    <input type="text" name="seotitle" class="form-control" value="<?php echo $satir['seotitle']; ?>">
                </div>
                <div class="form-group">
                    <label><small>Yayın Tarihi</small></label>
                    <input type="date" name="tarih" class="form-control" value="<?php echo $satir['tarih']; ?>">
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

                    if(move_uploaded_file($_FILES['foto']['tmp_name'],$yuklenecekfoto)){
                        $sorgu = $db -> prepare('update sayfalar set baslik=?, icerik=?, meta=?, foto=?, durum=?, fotoalt=?, seotitle=?, tarih=? where id=?');
                        $sorgu -> execute(array($baslik,$icerik,$meta,$yuklenecekfoto,$durum,$fotoalt,$seotitle,$tarih,$id));
                        
                        if($sorgu -> rowCount()){
                            echo '<div class="alert alert-success">Kayıt Güncellendi</div>';
                            echo '<meta http-equiv="refresh" content="3; url=sayfalar.php">';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu!!!</div>';
                            echo '<meta http-equiv="refresh" content="3; url=sayfalar.php">';
                        }
                    }
                }
                ?>
            </div>
        </form>
    </div>
</section>
<!-- Yazı Ekleme End -->




<?php require_once('footer.php'); ?>