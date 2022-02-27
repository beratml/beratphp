<?php require_once('header.php'); ?>


<?php
$sorgu = $db -> prepare('select * from ayarlar order by id desc limit 1');
$sorgu -> execute();
$satir = $sorgu -> fetch();

if($sorgu -> rowCount()){
    $banner = $satir['iletisimbanner'];
    $harita = $satir['harita'];

} else {
    echo 'Data Bulunamadı';
}
?>


<!-- İletişim Banner Section Start -->
<section id="iletisimBanner" class="py-5" style="background-image: url('<?php echo substr($banner,3); ?>'); background-size:cover; background-repeat:no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 lead">İletişim</h1>
            </div>
        </div>
    </div>
</section>
<!-- İletişim Banner Section End -->

<!-- İletişim Bilgileri Section Start -->
<section id="iletisimBilgileri" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">Veri tabanından ikon,başlık ve bilgi gelecek</div>
        </div>
    </div>
</section>
<!-- İletişim Bilgileri Section End -->

<!-- İletişim Form Section Start -->
<section id="form" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="adiniz">Adınız</label>
                                <input type="text" name="adiniz" id="adiniz" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="soyadiniz">Soyadınız</label>
                                <input type="text" name="soyadiniz" id="soyadiniz" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Posta Adresiniz</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="konu">Konu</label>
                        <input type="text" name="konu" id="konu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mesaj">Mesajınız</label>
                        <textarea name="mesaj" id="mesaj" rows="5" class="form-control" placeholder="Mesajınızı Lütfen Buraya Yazınız"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">
                            <?php
                            echo 'Güvenlik Kodu: 5+10=?' ;
                            ?>
                        </label>
                        <input type="text" name="gkod" class="form-control w-50" placeholder="İşlemin Sonucu">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-purple">Gönder</button>
                    </div>
                </form>

                <?php
                if ($_POST) {
                    $adiniz = $_POST['adiniz'];
                    $soyadiniz = $_POST['soyadiniz'];
                    $email = $_POST['email'];
                    $konu = $_POST['konu'];
                    $mesaj = $_POST['mesaj'];
                    $gkod = $_POST['gkod'];

                    if($gkod == 15){
                        $sorgu = $db->prepare('insert into mesajlar(adiniz,soyadiniz,email,konu,mesaj) values(?,?,?,?,?)');
                        $sorgu->execute(array($adiniz, $soyadiniz, $email, $konu, $mesaj));
    
                        if ($sorgu->rowCount()) {
                            echo '<div class="alert alert-success">Mesajınız Başarıyla İletildi.</div>';
                        } else {
                            echo '<div class="alert alert-danger">Mesaj Gönderirken Hata Oluştu. Lütfen Tekrar Deneyiniz.</div>';
                        }
                    } else {
                        echo 'Güvenlik Kodu hatalı. Lütfen Tekrar Deneyin';
                        echo '<meta http-equiv="refresh" content="5; url=iletisim.php">';
                    }
                }
                ?>

            </div>
            <div class="col-md-6">
                <?php echo $harita; ?>
            </div>
        </div>
    </div>
</section>
<!-- İletişim Form Section End -->



<?php require_once('footer.php'); ?>