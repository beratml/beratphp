<?php require_once('header.php'); ?>

<?php
$id2 = $_GET['id'];
$sorgu2 = $db->prepare('select * from kategoriler where id=?');
$sorgu2->execute(array($id2));
$satir2 = $sorgu2->fetch();
?>

<!-- Kategori Ekleme ve Listeleme -->

<section id="kategori">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Kategoriler</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="katadi" class="form-control" value="<?php echo $satir2['katadi']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="katmeta" rows="5" class="form-control"><?php echo $satir2['katmeta']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" name="tarih" class="form-control" value="<?php echo $satir2['tarih']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kaydet" class="btn btn-success w-100">
                    </div>
                </form>

                <?php
                if ($_POST) {
                    $katadi = $_POST['katadi'];
                    $katmeta = $_POST['katmeta'];
                    $tarih = $_POST['tarih'];

                    $sorgu = $db->prepare('update kategoriler set katadi=?, katmeta=?, tarih=? where id=?');
                    $sorgu->execute(array($katadi, $katmeta, $tarih, $id2));

                    if ($sorgu->rowCount()) {
                        echo '<div class="alert alert-success">Kayıt Güncellendi</div>';
                    } else {
                        echo '<div class="alert alert-danger">Hata Oluştu</div>';
                    }
                }
                ?>

            </div>
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori Adı</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sorgu = $db->prepare('select * from kategoriler order by katadi asc');
                        $sorgu->execute();

                        if ($sorgu->rowCount()) {
                            foreach ($sorgu as $satir) {
                        ?>
                                <tr>
                                    <td><?php echo $satir['id']; ?></td>
                                    <td><?php echo $satir['katadi']; ?></td>
                                    <td><a href="kategoriduzenle.php?id=<?php echo $satir['id']; ?>">
                                    <button class="btn btn-warning">Düzenle</button></a></td>
                                    <td><a href="kategorisil.php?id=<?php echo $satir['id']; ?>">
                                    <button class="btn btn-danger">Sil</button></a></td>
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


<?php require_once('footer.php'); ?>