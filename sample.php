<?php require_once('header.php'); ?>

<!-- Blog Yazısını Çeken Modül Start -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sorgu_blog = $db->prepare('select * from yazilar where id=?');
    $sorgu_blog->execute(array($id));
    $satir_blog = $sorgu_blog->fetch();
?>
<!-- Blog Yazısını Çeken Modül End -->

    <!-- Blog Yazı İçerik Start -->
    <section id="blogYazi" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <main>
                        <img src="<?php echo substr($satir_blog['foto'], 3); ?>" class="w-100">
                        <small>
                            <?php
                            echo 'Kategori: ' . $satir_blog['kategori'] . ' / ' . 'Yayınlanma Tarihi: ' . $satir_blog['tarih'];
                            ?>
                        </small>
                        <h1 class="mt-4 text-danger"><?php echo $satir_blog['baslik']; ?></h1>
                        <span class="text-justify">
                            <?php echo $satir_blog['icerik']; ?>
                        </span>

                        <h5>Yorumlar</h5>
                        <!-- Yorum Çekme Modülü Start -->
                        <?php
                        $sorgu_yorum = $db -> prepare("select * from yorumlar where adminonay=1 && yazino = $id  order by id desc");
                        $sorgu_yorum -> execute();

                        if($sorgu_yorum -> rowCount()){
                            foreach($sorgu_yorum as $satir_yorum){
                                $adi = $satir_yorum['adiniz'];
                                $yorum = $satir_yorum['yorum'];
                            ?>
                                
                                <strong><?php echo $adi; ?></strong>
                                <p><?php echo $yorum; ?></p>
                            <?php                                
                            }
                        }
                        ?>
                        <!-- Yorum Çekme Modülü End -->
                        <form method="post" class="mt-5">
                            <h5>Yorum Yazın</h5>
                            <div class="form-group">
                                <input type="text" name="adiniz" class="form-control w-75" placeholder="Adınız Soyadınız">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control w-75" placeholder="E-Posta Adresiniz">
                            </div>
                            <div class="form-group">
                                <textarea name="yorum" rows="4" class="form-control w-75" placeholder="Yorumunuz"></textarea>
                                <input type="checkbox" name="onay" value="true"> <label><small class="text-muted">KVKK Gereği Tüm Pazarlama Süreçlerini Onaylıyorum.</small></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark" name="yorumbuton">Gönder</button>
                            </div>
                        </form>

                        <?php 
                            if(isset($_POST['yorumbuton'])){
                                $sorgu_form = $db->prepare('insert into yorumlar(adiniz,email,yorum,onay,yazino,adminonay) values(?,?,?,?,?,?)');
                                $sorgu_form->execute(array($_POST['adiniz'], $_POST['email'], $_POST['yorum'], $_POST['onay'], $id, '0'))   ;
                            
                                if ($sorgu_form -> rowCount()) {
                                    echo '<div class="alert alert-success form-control w-75">Yorumunuz Admin Onayına Gönderildi.</div>';
                                } else {
                                    echo '<div class="alert alert-danger form-control w-75">Hata Oluştu!</div>';
                                }
                            }
                        ?>

                    </main>
                </div>
                            
                <?php require_once('sidebar.php'); ?>
            </div>
        </div>
    </section>
    <!-- Blog Yazı İçerik End -->
<?php

}
?>

    

<?php require_once('footer.php'); ?>