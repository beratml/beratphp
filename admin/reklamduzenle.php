<?php require_once('header.php'); ?>


<?php
$id = $_GET['id'];
$sorgu = $db->prepare('select * from reklam where id=?');
$sorgu->execute(array($id));
$satir = $sorgu->fetch();
?>

<!-- Reklam Section Start -->
<section id="reklam">
    <div class="container">
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <img src="<?php echo $satir['gorsel']; ?>" alt="" class="w-25">
                    <input type="file" name="gorsel">
                </div>
                <div class="form-group">
                    <input type="text" name="link" class="form-control" value="<?php echo $satir['link']; ?>">
                </div>
                <div class="form-group">
                    <select name="reklamalani" class="form-control">
                        <option value="<?php echo $satir['reklamalani']; ?>"><?php echo $satir['reklamalani']; ?></option>
                        <option value="Banner">Banner</option>
                        <option value="Sidebar">Sidebar</option>
                        <option value="Yazı içi">Yazı İçi</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="ucret" class="form-control" value="<?php echo $satir['ucret']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <small><label>Başlangıç Tarihi</label></small>
                    <input type="date" name="baslangic" class="form-control" value="<?php echo $satir['baslangic']; ?>">
                </div>
                <div class="form-group">
                    <small><label>Bitiş Tarihi</label></small>
                    <input type="date" name="bitis" class="form-control" value="<?php echo $satir['bitis']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="firma" class="form-control" value="<?php echo $satir['firma']; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="reklambutonu">Kaydet</button>
                </div>
            </div>
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
                            <th>Link</th>
                            <th>Reklam Alanı</th>
                            <th>Ücreti</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Firma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="25%"><img src="<?php echo $satir['gorsel']; ?>" class="w-50"></td>
                            <td><?php echo $satir['link']; ?></td>
                            <td><?php echo $satir['reklamalani']; ?></td>
                            <td><?php echo $satir['ucret']; ?></td>
                            <td><?php echo $satir['baslangic']; ?></td>
                            <td><?php echo $satir['bitis']; ?></td>
                            <td><?php echo $satir['firma']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <?php
                if (isset($_POST['reklambutonu'])) {
                    $dizin = "../img/";
                    $yuklenecekfoto = $dizin . $_FILES['gorsel']['name'];  // veya $foto = "../img/".$_FILES['gorsel']['name'];
                    $link = $_POST['link'];
                    $reklamalani = $_POST['reklamalani'];
                    $ucret = $_POST['ucret'];
                    $baslangic = $_POST['baslangic'];
                    $bitis = $_POST['bitis'];
                    $firma = $_POST['firma'];

                    if (move_uploaded_file($_FILES['gorsel']['tmp_name'], $yuklenecekfoto)) {
                        $sorgu_rekduzenle = $db->prepare('update reklam set gorsel=?,link=?,reklamalani=?,ucret=?,baslangic=?,bitis=?,firma=? where id=?');
                        $sorgu_rekduzenle->execute(array($yuklenecekfoto, $link, $reklamalani, $ucret, $baslangic, $bitis, $firma, $id));

                        if ($sorgu_rekduzenle->rowCount()) {
                            echo '<div class="alert alert-success text-center">Kayıt Güncellendi</div> <meta http-equiv="refresh" content="2; url=reklamduzenle.php?id='.$id.'">';
                        } else {
                            echo '<div class="alert alert-danger text-center">Hata Oluştu</div> <meta http-equiv="refresh" content="2; url=reklamduzenle.php?id='.$id.'">';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Reklamlar Listesi Section End -->






<?php require_once('footer.php'); ?>