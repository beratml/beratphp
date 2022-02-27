<?php require_once('header.php'); ?>

<!-- Ayarlar Section Start -->
<section id="ayarlar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Site Ayarları</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adres"><small>Adres</small></label>
                                <input type="text" name="adres" id="adres" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefon"><small>Telefon</small></label>
                                <input type="tel" name="telefon" id="telefon" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email"><small>E-Posta Adresi</small></label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="harita"><small>Harita Ekle</small></label>
                                <textarea name="harita" id="harita" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanitim"><small>Kısa Tanıtım Yazısı</small></label>
                                <textarea name="tanitim" id="tanitim" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="logo"><small>Logo Ekle</small></label>
                                <input type="file" name="logo" id="logo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="blogbanner"><small>Blog Banner Ekle</small></label>
                                <input type="file" name="blogbanner" id="blogbanner">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="iletisimbanner"><small>İletişim Banner Ekle</small></label>
                                <input type="file" name="iletisimbanner" id="iletisimbanner">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="facebook"><small>Facebook Profili</small></label>
                                <input type="text" name="facebook" id="facebook" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="instagram"><small>Instagram Profili</small></label>
                                <input type="text" name="instagram" id="instagram" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="twitter"><small>Twitter Profili</small></label>
                                <input type="text" name="twitter" id="twitter" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="whatsapp"><small>Whatsapp Profili</small></label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="analitik"><small>Google Analytics Kodu</small></label>
                                <textarea name="analitik" id="analitik" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="konsol"><small>Google Search Console</small></label>
                                <textarea name="konsol" id="konsol" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pixel"><small>Facebook Pixel Kodu</small></label>
                                <textarea name="pixel" id="pixel" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="copy"><small>Copyright Alanı</small></label>
                                <input type="text" name="copy" id="copy" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
                
                <?php
                if ($_POST) {
                    $adres = $_POST['adres'];
                    $telefon = $_POST['telefon'];
                    $email = $_POST['email'];
                    $harita = $_POST['harita'];
                    $tanitim = $_POST['tanitim'];
                    $dizin = "../img/";
                    $logo = $dizin . $_FILES['logo']['name'];
                    $blogbanner = $dizin . $_FILES['blogbanner']['name'];
                    $iletisimbanner = $dizin . $_FILES['iletisimbanner']['name'];
                    $facebook = $_POST['facebook'];
                    $instagram = $_POST['instagram'];
                    $twitter = $_POST['twitter'];
                    $whatsapp = $_POST['whatsapp'];
                    $analitik = $_POST['analitik'];
                    $konsol = $_POST['konsol'];
                    $pixel = $_POST['pixel'];
                    $copy = $_POST['copy'];

                    $foto1 = move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
                    $foto2 = move_uploaded_file($_FILES['blogbanner']['tmp_name'], $blogbanner);
                    $foto3 = move_uploaded_file($_FILES['iletisimbanner']['tmp_name'], $iletisimbanner);

                    if (isset($foto1) && isset($foto2) && isset($foto3)) {
                        $sorgu = $db->prepare('insert into ayarlar(adres,telefon,email,harita,tanitim,logo,blogbanner,iletisimbanner,facebook,instagram,twitter,whatsapp,analitik,konsol,pixel,copy) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

                        $sorgu->execute(array($adres, $telefon, $email, $harita, $tanitim, $logo, $blogbanner, $iletisimbanner, $facebook, $instagram, $twitter, $whatsapp, $analitik, $konsol, $pixel, $copy));

                        if ($sorgu->rowCount()) {
                            echo '<div class="alert alert-success">Kayıtlar Girildi</div>';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>
<!-- Ayarlar Section End -->




<?php require_once('footer.php'); ?>