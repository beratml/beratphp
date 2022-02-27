<?php require_once('header.php'); ?>

<!-- Reklam Section Start -->
<section id="reklam">
    <div class="container">
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="file" name="gorsel">
                </div>
                <div class="form-group">
                    <input type="text" name="link" placeholder="Reklam Linkini Girin" class="form-control">
                </div>
                <div class="form-group">
                    <select name="reklamalani" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="Banner">Banner</option>
                        <option value="Sidebar">Sidebar</option>
                        <option value="Yaziici">Yazı İçi</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="ucret" class="form-control" placeholder="Ücreti Girin">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <small><label>Başlangıç Tarihi</label></small>
                    <input type="date" name="baslangic" class="form-control">
                </div>
                <div class="form-group">
                    <small><label>Bitiş Tarihi</label></small>
                    <input type="date" name="bitis" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="firma" placeholder="Reklam Veren Firma" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="reklambutonu">Kaydet</button>
                </div>
            </div>
            <?php
            if (isset($_POST['reklambutonu'])) {
                $dizin = "../img/";
                $yuklenecekfoto = $dizin . $_FILES['gorsel']['name'];
                $link = $_POST['link'];
                $reklamalani = $_POST['reklamalani'];
                $ucret = $_POST['ucret'];
                $baslangic = $_POST['baslangic'];
                $bitis = $_POST['bitis'];
                $firma = $_POST['firma'];

                if(move_uploaded_file($_FILES['gorsel']['tmp_name'],$yuklenecekfoto)){
                    $sorgu = $db -> prepare('insert into reklam(gorsel,link,reklamalani,ucret,baslangic,bitis,firma) values(?,?,?,?,?,?,?)');
                    $sorgu -> execute(array($yuklenecekfoto,$link,$reklamalani,$ucret,$baslangic,$bitis,$firma));

                    if($sorgu -> rowCount()){
                        echo '<div class="alert alert-success">Kayıt Başarılı</div><meta http-equiv="refresh" content="2; url=reklam.php">';
                    } else {
                        echo '<div class="alert alert-danger">Hata Oluştu</div><meta http-equiv="refresh" content="2; url=reklam.php">';
                    }
                }
            }
            ?>
        </form>
    </div>
</section>
<!-- Reklam Section End -->
<br>

<!-- Reklamlar Listesi Section Start -->
<section id="adslist">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Reklam Görseli</th>
                            <th>Reklam Alanı</th>
                            <th>Ücreti</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Firma</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $sorgu = $db -> prepare('select * from reklam order by id desc');
                        $sorgu -> execute();

                        if($sorgu -> rowCount()){
                            foreach($sorgu as $satir){
                                ?>
                                    <tr>
                                        <td class="w-25"><img src="<?php echo $satir['gorsel']; ?>" class="img-fluid"></td>
                                        <td><?php echo $satir['reklamalani']; ?></td>
                                        <td><?php echo $satir['ucret']; ?></td>
                                        <td><?php echo $satir['baslangic']; ?></td>
                                        <td><?php echo $satir['bitis']; ?></td>
                                        <td><?php echo $satir['firma']; ?></td>
                                        <td>
                                            <a href="reklamduzenle.php?id=<?php echo $satir['id']; ?>">
                                            <button class="btn btn-warning">Düzenle</button></a>
                                        </td>
                                        <td>
                                            <a href="reklamsil.php?id=<?php echo $satir['id']; ?>">
                                            <button class="btn btn-danger">Sil</button></a>
                                        </td>
                    </tr>

                                <?php
                            }
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Reklamlar Listesi Section End -->
<?php require_once('footer.php'); ?>